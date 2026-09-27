<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\product;
use App\models\Category;
use Illuminate\Support\Facades\Redirect;
use App\models\order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced; 
use PDF;


class ClientController extends Controller
{
    //
    public function shopView(){
        $allCategory = Category::all();
        $allProducts = product::all();
        return view('client.client_page.shop',compact('allCategory','allProducts'));
    }
    public function categoryView($id){
        $allCategory = Category::all();
        $allProducts = product::where('category_id',$id)->get();
        return view('client.client_page.shop',compact('allCategory','allProducts'));

    }
    public function productView($id){
        $allproduct = product::find($id);
        $relproduct = product::where('category_id',$allproduct->category_id)->get();
        return view('client.client_page.single-product',compact('allproduct','relproduct'));
    }
    public function addToCart(Request $request){
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::find($productId);

        if(!$product){
            return response()->json(['error'=>'product not found'],404);
        }
        $cart = session()->get('cart',[]);
        if(isset($cart[$productId])){
            $cart[$productId]['quantity'] += $quantity;
        }
        else{
            $cart[$productId]=[
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'productImage' => $product->product_image 
            ];
        }
        session()->put('cart',$cart);
        $totalQuantity = 0;
        foreach($cart as $cartItem){
            $totalQuantity += $cartItem['quantity'];
        }
        return response()->json(['message'=>'Cart updated','cartCount'=>$totalQuantity],200);
    }
    public function cartView(){
        $cart = session()->get('cart');
        return view('client.client_page.cart-view',compact('cart'));
    }
    public function increaseQuantity(Request $request){
        $cartId = $request->input('id');
        $cart = session()->get('cart');
        if(isset($cart[$cartId])){
            $cart[$cartId]['quantity'] += 1;
            session()->put('cart',$cart);
            $totalQuantity = 0;
            foreach($cart as $cartItem){
                $totalQuantity += $cartItem['quantity'];
            }
        }
        return response()->json(['message'=> 'cart updated','cartCount'=>$totalQuantity],200);
    }
    public function decreaseQuantity(Request $request){
        $cartId = $request->input('id');
        $cart = session()->get('cart');
        if(isset($cart[$cartId])){
            $cart[$cartId]['quantity'] -= 1;
            session()->put('cart',$cart);
            $totalQuantity = 0;
            foreach($cart as $cartItem){
                $totalQuantity += $cartItem['quantity'];
            }
        }
        return response()->json(['message'=> 'cart updated','cartCount'=>$totalQuantity],200);
    }
    public function deleteToCart(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Product successfully deleted');
        }
    }
    public function checkout()
    {
        return view('client.client_page.checkout');
    }
    public function checkoutpost(Request $request){
        $order = new order;
        $user_id = Auth::user()->id;
        $request->validate([
            'firstName' =>'required',
            'lastName' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'pyment_method' => 'required',
        ]);

        $cart = session()->get('cart');
        $totalPrice = 0;
        foreach($cart as $cartItem){
            $totalPrice += $cartItem['quantity'] * $cartItem['price'];
        }

        
            $order->user_id = $user_id;
            $order->first_name =$request->firstName;
            $order->last_name=$request->lastName;
            $order->street_address=$request->street_address;
            $order->city=$request->city;
            $order->zip_code=$request->zip_code;
            $order->phone=$request->phone;
            $order->email=Auth::user()->email;
            $order->payment_method = $request->pyment_method;
            $order->total=$totalPrice;
            $order->order_items=serialize($cart);
            $order->save();
        

        session()->forget('cart');
        Mail::to(Auth::user())->send(new OrderPlaced($order));
        return Redirect::to('/shop');
    }
    public function orderView(){
        $user_id = Auth::user()->id;
        $order = order::where('user_id',$user_id)->where('status','panding')->get();
        $order_items=[];
        foreach ($order as $key => $items) {
            $order_items[$key] = unserialize($order[$key]->order_items);
            # code...
        }
        return view('client.client_page.order',compact('order_items'));
    } 

    public function getInvoice(){
        $user = Auth::user();
        $order = order::where('user_id',$user->id)->where('status', 'panding')->get();
        $order_items = [];
        foreach($order as $key => $items){
            $order_items[$key] = unserialize($order[$key]->order_items);
        }
        $pdf = PDF::loadview('client.client_page.invoice',compact('order_items','order'));
        return $pdf->download('invoice.pdf');
    }

}
?>
