<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\product;
use App\models\Category;


class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $products = product::all();
        return view('admin.admin-page.products.all',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.admin-page.products.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
            'name' => 'required',
            'price' => 'required | numeric',
            'quantity' => 'required | integer',
            'category_id' => 'required | exists:categories,id',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = null;
        if($request->file('product_image')){
            $file = $request->file('product_image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/product-images'),$fileName);
        }


        product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'product_image' => $fileName
        ]);
        return redirect()->route('products.index')->with('success','product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = product::find($id);
        return view('products.show-product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.admin-page.products.edit',compact('categories','product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = product::find($id);
        $oldImage = 'upload/product-images/'.$product->product_image;
        $request -> validate([
            'name' => 'required',
            'price' => 'required | numeric',
            'quantity' => 'required | integer',
            'category_id' => 'required | exists:categories,id',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileName = $product->product_image;
        if($request->file('product_image')){
            if($product->product_image){
                unlink($oldImage);
            }
            $file = $request->file('product_image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/product-images'), $fileName);
        }
         $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'product_image' => $fileName
        ]);
        return redirect()->route('products.index')->with('success','product update successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = product::find($id);
        $oldImage = 'upload/product-images/'.$product->product_image;
        if($product->product_image){
            unlink($oldImage);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success','product deleted successfully');
    }
}
