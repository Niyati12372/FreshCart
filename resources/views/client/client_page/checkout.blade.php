@extends('client.client_layout.app')
@section('page-content')
<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>checkout</span></p>
            <h1 class="mb-0 bread">checkout</h1>
          </div>
        </div>
    </div>
</div>
@php
    $subtotal=0;
    foreach(session('cart') as $item){
        $subtotal += $item['price'] * $item['quantity'];
    }
@endphp
<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
				<form action="{{route('checkout')}}" class="billing-form" method="post">
                    @csrf
				    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">FirtName</label>
	                  <input type="text" class="form-control" placeholder="" name="firstName">
	                </div>
	              </div>
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" placeholder="" name="lastName">
	                </div>
                </div>
                
		            
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" class="form-control" placeholder="House number and street name" name="street_address">
	                </div>
		            </div>
		            <!-- <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
	                </div>
		            </div> -->
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control" placeholder="" name="city">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" placeholder="" name="zip_code">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" placeholder="" name="phone">
	                </div>
	              </div>
	              <!-- <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
                </div> -->
                <!-- <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label>
										</div>
									</div>
                </div>-->
	            </div>
            </div>
            <div class="col-xl-5">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>INR {{$subtotal}}.00/-</span>
                            </p>
                            <p class="d-flex">
                                <span>Delivery</span>
                                <span>INR 0.00</span>
                            </p>
                            <p class="d-flex">
                                <span>Discount</span>
                                <span>INR 0.00</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>INR {{$subtotal}}.00/-</span>
                            </p>
                        </div> 
                        <input type="hidden" value="{{$subtotal}}" name="subtotal">
                    </div>
                    <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="pyment_method" class="mr-2"> Cash On Delivery</label>
											</div>
										</div>
									</div>
									<div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="" name="accept_terms" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><button class="btn btn-primary py-3 px-4" type="submit">Place an order</button></p>
					            </div>
                            </div>
	                    </div>
                    </div> 
                </form><!-- END -->
                </div>
            </div>
        </section>
    @endsection