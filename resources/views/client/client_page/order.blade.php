@extends('client.client_layout.app')
@section('style')
@endsection
@section('page-content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('frontend/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Order</span></p>
            <h1 class="mb-0 bread">My Order</h1>
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
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                            @foreach($order_items as $items)
                            @foreach($items as $key=>$item)
						      <tr class="text-center alert" role="alert">
						        
						        
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
					          	</div>
					          </td>
						        
						        <td class="total">INR {{$item['price'] * $item['quantity']}}.00/-</td>
						      </tr>
                              @endforeach
                              @endforeach

                              <tr>
                                <th>
                                    <a href="{{route('get.invoice')}}" class="btn btn-primary">Get Invoice</a>
                                </th>
                              </tr>
                              
                            </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
                            
    				</div>
    				
    		</div>
			</section>
        @endsection

