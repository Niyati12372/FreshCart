<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="heading"></i>FRESH CART <i class="fa-solid fa-cart-shopping"></i></h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                       <img class="rounded-circle d-inline me-lg-2 mt-2" alt="" style="width: 40px; height:40px;" src="{{url('upload/admin_images/'.Auth::user()->profile_image)}}"> 
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 heading">{{Auth::user()->name}}</h6>
                        <span class="heading">Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('admin.dashboard')}}" class="nav-item nav-link {{(request()->is('admin/dashboard'))?'active':''}} "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('categories.index')}}" class="nav-item nav-link {{(request()->is('categories'))?'active':''}} "><i class="fa-solid fa-layer-group me-2"></i>Categories</a>
                    <a href="{{route('products.index')}}" class="nav-item nav-link {{(request()->is('products'))?'active':''}} "><i class="fa-brands fa-product-hunt me-2 "></i>Products</a>
                    <a href="{{route('all.orders')}}" class="nav-item nav-link {{(request()->is('admin/orders'))?'active':''}} "><i class="fa-solid fa-ticket me-2 "></i>Orders</a>
                    
                    
                    </div>
                </div>
            </nav>
        </div>