@extends('admin.dashboardMaster')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded mx-0 p-4">
        <div class="col-12 d-flex justify-content-between align-items-start">
            <h3 class="h3 heading">Add New Categories</h3>
            <a href="{{route('categories.index')}}">
                <button type="button" class="btn btn2 m-2">All Categories <i class="fa-solid fa-reply-all"></i></button>
            </a>
        </div>
        <div class="col-12">
            <div class="bg-light rounded h-100">
                @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Category Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="category_image" class="form-label">Category Image:</label>
                        <input type="file" class="form-control p-2 mt-1" name="category_image" id="category_image">
                        <img class="rounded d-inline mt-2" alt="" style="width: 100px; height:100px;" src="" alt="No Image" id="show_category_image"> 
                    </div>
                     <button type="submit" class="btn btn2 mt-3">Add Category</button>
                                
                </form>
            </div>
        </div>
    </div>
</div>
@endsection