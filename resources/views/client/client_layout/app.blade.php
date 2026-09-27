<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  </head>
  <body>

  	<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+91 93284 16026</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">freshcart@gmail.com</span>
                        
					    </div>
                        <div class="reg d-flex flex-1 justify-end align-items-center">
                        @if (Route::has('login'))
                            <nav class="flex flex-1 justify-end">
                                @auth
                                    <!-- <a
                                        href="{{ url('/dashboard') }}"
                                        class="text-white mr-2"
                                    >
                                        Dashboard
                                    </a> -->
                                    <a href="{{route('profile.edit')}}" class="text-white mr-2" >
                                <img class="rounded-circle me-lg-2 d-inline" alt="" id="show-image" src="{{url('upload/client_images/'.Auth::user()->profile_image)}}" style="width:30px; height:30px;"> 
                                        {{ __('Profile') }}
                                    </a>
                                    <a href="{{route('order')}}" class="text-white mr-2" > My Order</a>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf

                                        <a href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();"class="text-white mr-2"
                                                >
                                                            
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="text-white mr-2"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="text-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                            @endif
                        </div>
			              </div>
		              </div>
		            </div>
              </div>
            </div>
            @include('client.client_component.navbar')
            @yield('page-content')
            @include('client.client_component.footer')
            
  <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('frontend/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('frontend/js/google-map.js')}}"></script>
  <script src="{{asset('frontend/js/main.js')}}"></script>

    <script type="text/JavaScript">
        $(document).ready(function(){
            $('#profile-image').change(function(e){
                var reader = new FileReader()
                reader.onload = function(e){
                    $('#show-image').attr('src', e.target.result)
                }

                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>
    <script type="text/javascript">
        $(".add-to-cart").click(function(e){
            e.preventDefault();
            var productId = $(this).data("product-id");
            var productQty = 1;
            $.ajax({
                url: "{{route('add.to.cart')}}",
                method : "POST",
                data :{
                    _token : '{{csrf_token()}}',
                    product_id : productId,
                    quantity : productQty
                },
                success: function(response){
                    window.location.reload()
                    alert("product added to cart successfully")
                    console.log(response)
                },
                error: function(xhr,status,error){
                    if(xhr.status === 401){
                        window.location.href = '/login';
                    }
                    console.error(xhr.responseText)
                }
            })
        })

    </script>
    <script type="text/javascript">
        $(".delete-item").click(function(e){
            e.preventDefault()
            if(confirm("Do you really want to delete?")){
                $.ajax({
                    url:"{{route('delete.to.cart')}}",
                    method:"DELETE",
                    data:{
                        _token:'{{csrf_token()}}',
                        id:$(this).data('product-id')
                    },
                    success:function(response){
                        window.location.reload();
                    }
                })
            }
        })
    </script>

    @yield('scripts')
  </body>
</html>