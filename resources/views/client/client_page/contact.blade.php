@extends('client.client_layout.app')
@section('page-content')
<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>contact usg</span></p>
            <h1 class="mb-0 bread">contact us</h1>
          </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4 bg-light">
	            <p><span>Address:</span> Plot No 441/7,Near Sagar Hotel,Road No 4,Street No 82/8,Sachin-GIDC-394520.</p>
	        </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4 bg-light">
	            <p><span>Phone:</span> <br><a href="tel://1234567920">+91 93284 16026</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4 bg-light">
	            <p><span>Email:</span> <br><a href="mailto:info@yoursite.com">freshcart@gmail.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4 bg-light">
	            <p><span>Website:</span><br><a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9 ">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
            <img src="./frontend/images/login.jpg" alt="">
          </div>
        </div>
      </div>
    </section>

@endsection