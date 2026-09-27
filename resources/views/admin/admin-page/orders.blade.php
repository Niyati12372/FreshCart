@extends('admin.dashboardMaster')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded mx-0 p-4">
        <div class="col-12 d-flex justify-content-between align-items-start">
            <h3 class="h3 heading">All Orders</h3>
         </div>
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                    <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $key=>$order) 
                                        <tr>
                                        <td scope="col">{{$key+1}}</td>
                                        @php
                                            $date = date_create($order->created_at);
                                        @endphp
                                        <td scope="col">{{date_format($date,"F jS Y")}}</td>
                                        <td scope="col">{{$order->first_name}}{{$order->last_name}}</td>
                                        <td scope="col">{{$order->city}}</td>
                                        <td scope="col">{{$order->total}}</td>
                                        <td scope="col">
                                            <a href="{{route('order.shipped',$order->id)}}" class="{{($order->status == 'shipped') ? 'text-success' : 'text-warning'}}">{{$order->status}}  
                                            @if ($order->status == 'panding')
                                                <i class="fa-solid fa-check"></i>
                                            @elseif($order->status == 'shipped')
                                                <i class="fa-solid fa-check-double"></i>
                                            @endif
                                                </a>
                                        </td>
                                        <tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection