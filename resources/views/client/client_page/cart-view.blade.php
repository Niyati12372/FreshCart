@extends('client.client_layout.app')
@section('style')
@endsection
@section('page-content')

<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                            @if($cart)
                            @foreach($cart as $key=>$item)
						      <tr class="text-center">
						        <td>
                                    <a href="#"><span class="text-danger delete-item" data-product-id="{{$key}}" style="font-size:1.5em; cursor:pointer;"><i class="fa fa-trash"></i></span></a>
                                </td>
						        
						        <td class="image-prod">
                                    <div class="img" style="background-image:url({{asset('upload/product-images/'.$item['productImage'])}});"></div>
                                </td>
						        
						        <td class="product-name">
						        	<h3>{{$item['name']}}</h3>
						        	<p>Far far away, behind the word mountains, far from the countries</p>
						        </td>
						        
						        <td class="price">{{$item['price']}}</td>
						        
						        <td class="quantity">
						        	<div class="input-group d-flex align-items-center">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="{{$item['quantity']}}" min="1" max="100">
                                    <p class="d-flex flex-column ml-2 mb-0">
                                        <span class="btn-increase" data-product-id="{{$key}}"><i class="fa-solid fa-caret-up"></i></span>
                                        <span class="btn-decrease" data-product-id="{{$key}}"><i class="fa-solid fa-caret-down"></i></span>
                                    </p>
					          	</div>
					          </td>
						        
						        <td class="total">INR {{$item['price'] * $item['quantity']}}.00/-</td>
						      </tr>
                              @endforeach
                              @else
                              <tr class="alert" role="alert">
                                <td colspan="6">
                                    <img src="{{asset('upload/empty_cart.jpg')}}" alt="" width="100%">
                                    <p class="text-center"><a href="{{route('shop')}}">Add Product</a></p>
                                </td>
                            </tr>
                              @endif
                            </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
                            @php
                                $subtotal = 0;
                                foreach($cart as $item){
                                    $subtotal += $item['price'] * $item['quantity'];
                                }
                            @endphp
                            <div class="row justify-content-end">
                                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                                <div class="cart-total mb-3">
                                <h3>Cart Totals</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>INR {{$subtotal}}.00/-</span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span>$0.00</span>
                                </p>
                                <p class="d-flex">
                                    <span>Discount</span>
                                    <span>$0.00</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>INR {{$subtotal}}.00/-</span>
                                </p>
    				</div>
    				<p><a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
                </div>
    		</div>
			</section>
        @endsection

@section('scripts')
    <script type="text/javascript">
        $(".btn-increase").click(function(e){
            e.preventDefault();
            $.ajax({
                url:"{{route('increase.qty')}}",
                method:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    id:$(this).data('product-id')
                },
                success:function(response){
                    console.log(response)
                    window.location.reload();
                }
            })
        })
        $(".btn-decrease").click(function(e){
            e.preventDefault();
            $.ajax({
                url:"{{route('decrease.qty')}}",
                method:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    id: $(this).data('product-id')
                },
                success:function(response){
                    console.log(response)
                    window.location.reload();
                }
            })
        })
    </script>
@endsection