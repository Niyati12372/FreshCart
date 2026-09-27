@extends('admin.dashboardMaster')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded mx-0 p-4">
        <div class="p-4 d-flex justify-content-between align-items-start">
            <h3 class="h3 heading">All Products</h3>
            <a href="{{route('products.create')}}"> 
                <button type="button" class="btn btn2 m-2">Add Product <i class="fa-solid fa-plus ms-2"></i></button>
            </a>
        </div>
        @if($message = Session::get('success'))
                   <div class="alert alert-success">
                       <p>{{$message}}</p>
                   </div>
                @endif
                    <div class="bg-light rounded p-4">
                        <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $key=>$product)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td><img class="rounded mt-2" alt="" style="width: 100px; height:100px; object-fit:cover;" src="{{url('upload/product-images/'.$product->product_image)}}"> </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>
                                                <a href="{{route('products.edit',$product->id)}}" class="heading">Edit <i class="fa-solid fa-pen-to-square heading"></i></a>
                                                |
                                                <form action="{{route('products.destroy',$product->id)}}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger">Delete<i class="fa-solid fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                       @endforeach 
                                    </tbody>
                                </table>
                            </div>
                    </div>
            
    </div>
</div>
@endsection