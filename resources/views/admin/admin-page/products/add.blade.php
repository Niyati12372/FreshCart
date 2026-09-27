@extends('admin.dashboardMaster')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded mx-0 p-4">
        <div class="col-12 d-flex justify-content-between align-items-start">
            <h3 class="h3 heading">Add New Products</h3>
            <a href="{{route('products.index')}}">
                <button type="button" class="btn btn2 m-2">All Products <i class="fa-solid fa-reply-all"></i></button></button>
            </a>
        </div>
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="productName">
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Product Price</label>
                        <div class="input-group">
                            <span class="input-group-text">INR</span>
                            <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" id="quantity">
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Select Category</label>
                        <select class="form-select mb-3" name="category_id" aria-label="Default select example">
                            <option selected="" value="{{Null}}">No One select</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="product_image" class="form-label">Product Image</label>
                        <input type="file" class="form-control p-2 mt-1" name="product_image" id="product_image">
                        <img class="rounded d-inline mt-2" alt="" style="width: 100px; height:100px;" src="" alt="No Image" id="show_product_image"> 
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description">Product Description</textarea>
                    </div>

                     <button type="submit" class="btn btn2">Add Product</button>
                                
                </form>
            </div>
        </div>
    </div>
</div>
@endsection