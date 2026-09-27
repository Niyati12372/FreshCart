@extends('admin.dashboardMaster')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded mx-0 p-4">
        <div class="col-12 d-flex justify-content-between align-items-start">
            <h3 class="h3 heading">All Categories</h3>
            <a href="{{route('categories.create')}}"> 
                <button type="button" class="btn btn2 m-2">Add Categories <i class="fa-solid fa-plus ms-2"></i></button>
            </a>
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
                                            <th scope="col">Category Image</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key=>$category)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td><img class="rounded mt-2" alt="" style="width: 100px; height:100px; object-fit:cover;" src="{{url('upload/category_images/'.$category->category_image)}}"> </td>
                                            <td>{{$category->name}}</td>
                                            
                                            <td>
                                                <a href="{{route('categories.edit',$category->id)}}" class="heading">Edit <i class="fa-solid fa-pen-to-square heading"></i></a>
                                                |
                                                <form action="{{route('categories.destroy',$category->id)}}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger">Delete
                                                    <i class="fa-solid fa-trash"></i>

                                                </button>
                                            </td>
                                        </tr>
                                       @endforeach 
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</div>
</div>
@endsection