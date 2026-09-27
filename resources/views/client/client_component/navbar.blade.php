<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Fresh <span>Cart <i class="fa-solid fa-cart-shopping"></i></span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
		  @php
		  	$totalQuantity = 0;
			if(session('cart')){
				foreach(session('cart') as $item){
					$totalQuantity += $item['quantity'];
				}
			}
		@endphp
		

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Home</a></li>
	          <li class="nav-item "><a class="nav-link" href="{{route('shop')}}" >Shop</a></li>
	          <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="{{route('cart.view')}}" class="nav-link"><span class="icon-shopping_cart"></span>[{{$totalQuantity}}]</a></li>

	        </ul>
	      </div>
	    </div>
</nav>