@extends('client.client_layout.app')
@section('page-content')
<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Log In</span></p>
            <h1 class="mb-0 bread">Log In</h1>
          </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section">

    <div class="container">
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form method="POST" action="{{ route('login') }}" class=" p-5 contact-form bg-light">
                @csrf
                    <div class="form-group">
                        <x-input-label for="username" :value="__('Username')" />
                        <input type="text" class="form-control" placeholder="Your Username" name="username">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="password" :value="__('Password')" />
                        <input type="password" class="form-control" placeholder="Your Password" name="password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                <input type="submit" value="Log In" class="btn btn-primary py-2 px-5">
              
                </div>
                </form>
            </div>
            <div class="col-md-6 d-flex">
                <!-- <div  style="background-image: url('frontend/images/login.jpg'); width:300px height:300px"></div> -->
                 <img src="./frontend/images/login.jpg" alt="">
            </div>
        </div>
    </div>
</section>
@endsection