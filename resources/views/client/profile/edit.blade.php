@extends('client.client_layout.app')
@section('page-content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('frontend/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Profile</span></p>
            <h1 class="mb-0 bread">Profile</h1>
          </div>
        </div>
    </div>
</div>
<x-app-layout>
<div class="py-12">
    <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"> -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('client.profile.partials.update-profile-information-form')
            </div>
        </div>
        
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('client.profile.partials.update-password-form')
            </div>
        </div>
        
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('client.profile.partials.delete-user-form')
            </div>
        </div>
    <!-- </div> -->
</div>
</x-app-layout>

@endsection

