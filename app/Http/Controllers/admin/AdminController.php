<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use App\models\order;
use App\models\Todo;



class AdminController extends Controller
{
    //
    public function dashboard(){
        $clients = User::where('role','client')->get();
        $orders = order::all();
        $todos = Todo::all();
        $panding_orders = order::where('status','panding')->get();
        return view('admin.admin-page.dashboard',compact('clients','orders','todos','panding_orders'));  
    }

    public function store(Request $request){
        $request->validate([
            'todo' => 'required'
        ]);

        Todo::create($request->all());
        return back();
    }

    public function destroy(string $id){
        $todo = Todo::find($id);
        $todo->delete();
        return back();
    }
   
}
