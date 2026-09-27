@extends('admin.dashboardMaster')
@section('content')
<!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-user fa-3x heading"></i>
                            <div class="ms-3">
                                <p class="mb-2 heading">Total clients</p>
                                <h6 class="mb-0">{{count($clients)}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            @php
                                $totalSales = 0;
                                foreach($orders as $order){
                                    $totalSales += $order->total;
                                }
                            @endphp                            
                            <i class="fa fa-chart-bar fa-3x heading"></i>
                            <div class="ms-3">
                                <p class="mb-2 heading">Total Sale</p>
                                <h6 class="mb-0">{{$totalSales}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-ticket fa-3x heading"></i>
                            <div class="ms-3">
                                <p class="mb-2 heading">Today Orders</p>
                                <h6 class="mb-0">{{count($orders)}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                           <i class="fa fa-chart-pie fa-3x heading"></i>
                            <div class="ms-3">
                                <p class="mb-2 heading">Panding Orders</p>
                                <h6 class="mb-0 ">{{count($panding_orders)}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 heading">Calender</h6>
                                <a href="" class="heading">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 heading">To Do List</h6>
                            </div>
                            <form action="{{route('todos.store')}}" method="post">
                                @csrf
                            <div class="d-flex mb-2 heading">
                                <input class="form-control bg-transparent" type="text" placeholder="Enter task" name="todo">
                                <button type="submit" class="btn ms-2 btn2">Add</button>
                            </div>
                        </form>
                        @foreach($todos as $todo)
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>{{$todo->todo}}</span>
                                        <form action="{{route('todos.destroy',$todo->id)}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger" type="submit"><i class="fa fa-times"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
            <!-- Widgets End -->
@endsection 
