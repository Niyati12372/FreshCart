@extends('client.client_layout.app')
@section('page-content')
<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Register</span></p>
            <h1 class="mb-0 bread">Register</h1>
          </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section">

    <div class="container">
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form method="POST" action="{{ route('register') }}" class="bg-light p-5 contact-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Username" name="username">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password" name="password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Confirm Password" name="password_confirmation">
                    </div>
                    <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <input type="submit" value="Register" class="btn btn-primary py-2 px-5">
                </form>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <img src="./frontend/images/login.jpg" alt="">
        </div>
    </div>
</section>
@endsection