<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Models\order; 
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function allOrders(){
        $orders = order::all();
        return view('admin.admin-page.orders',compact('orders'));
    }
    public function orderShiped($id){
        $order = order::find($id);
        $order->status = "shipped";
        $order->save();

        $user = User::find($order->user_id);

        Mail::to($user)->send(new OrderShipped($order));

        return back();
    }
}
