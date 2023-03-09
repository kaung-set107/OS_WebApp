<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>K-Shop</title>
<!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<link rel='stylesheet' id='wsl-widget-css'  href='https://mdbcdn.b-cdn.net/wp-content/plugins/wordpress-social-login/assets/css/style.css?ver=5.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='compiled.css-css'  href='https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/compiled-4.19.2.min.css?ver=4.19.2' type='text/css' media='all' />


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<!-- <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/nucleo/css/nucleo.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard/assets/css/argon.min.css?v=1.2.0"> -->

</head>

<body>

	<!-- Header -->
	<div class="container-fluid" id="header">
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand " href="#">
				<img src="images/K.png" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="{{ url('/') }}">Home </a>
					</li>
				@if(Auth::check())
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/order/pending') }}">My Order</a>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/login') }}">My Order</a>
					</li>
				@endif
			@if(Auth::check())
					<li class="nav-item dropdown">
				
                <a
                    type="button"
                    class="text-white border-0 dropdown-toggle nav-link"
                    data-toggle="dropdown"
                >
                    User Setting
			</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><img
                    src="{{ asset(Auth::user()->image) }}"
                    style="max-width: 50px;margin-left: 60px; border-radius: 60px"
                    alt=""
                    class="mb-1"
                /> <br>{{ Auth::user()->name }}</a>
                    <a  class="dropdown-item" href="{{ url('/profile') }}">Edit Profile</a>
										<a class="dropdown-item" href="{{ url('/changepassword') }}">Change Password</a>
                    <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                </div>
            
			</li>
			@else
<li class="nav-item dropdown">
				
                <a
                    type="button"
                    class="text-white border-0 dropdown-toggle nav-link"
                    data-toggle="dropdown"
                >
                    User
			</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                    <a class="dropdown-item" href="{{ url('/register') }}">Register</a>
                    
                </div>
            
			</li>
			@endif

					@if(Auth::check())
			<li class="nav-item">
						<a class="nav-link " href="{{ url('/cart') }}">
							Cart
							<small class="badge badge-danger">{{ $cart_count }}</small>
						</a>
					</li>

					@else
	<li class="nav-item">
						<a class="nav-link " href="{{ url('/login') }}">
							Cart
							<small class="badge badge-danger">{{ $cart_count }}</small>
						</a>
					</li>
					@endif
				
					
				</ul>
				<form action="{{ url('/search') }}" method="get" class="form-inline">
					<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Product" aria-label="Search">
					<button class="btn btn-sm btn-warning" type="submit">Search</button>
				</form>
			</div>
		</nav>
		<div class="container mt-1">
			<div class="row">
				<div class="col-md-6 mt-3">
					<h3>Welcome From Shopping Website</h3>
					<p>
                                              Online stores are usually available 24 hours a day, and many consumers in Western countries have Internet access both at work and at home.
                                        </p>
					@if(!Auth::check())
					<a href="{{ url('/register') }}" class="btn btn-sm btn-outline-warning text-dark">SignUp</a>
					<a href="{{ url('/login') }}" class="btn btn-sm btn-warning">Login</a>
					@endif

				</div>
				<div class="col-md-6 text-center">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/images/shop2.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/images/shop6.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/images/shop5.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
	<div class="">
		<ol class="carousel-indicators">
    <li id="s1" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li id="s1" data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li id="s1" data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
	</div>
</div>
</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End Header -->
	<div class="container mt-5">
		<div class="row">
			<!-- For Category and Information -->
			<div class="col-md-4">
				@if(Auth::check())
				<div class="card mb-3">
				
					<div class="card-body">
						<ul class="list-group">
		
						<a href="{{ url('/cart') }}" style="text-decoration:none;">
						<li class="list-group-item bg-warning text-white rounded">
								My Cart List
							</li>
						</a>
							
							<a href="{{ url('/order/pending') }}" style="text-decoration:none;">
								<li class="list-group-item bg-info text-white mt-2 rounded">
								 Pending Order List
							</li>
							</a>
									
							<a href="{{ url('/order/complete') }}" style="text-decoration:none;">
		<li class="list-group-item bg-success text-white mt-2 rounded">
								Complete Order List
							</li>
							</a>
							
				
							<!-- <a href="{{ url('/profile') }}" style="text-decoration:none;">
							<li class="list-group-item bg-danger text-white mt-2">
								Your Profile Info
							</li>
							</a> -->

							
						</ul>
					</div>
				</div>
				@endif
				<div class="card">
					    <div class="card-header bg-dark">
        <h3 class="text-white">All Category</h3>
    </div>
					<div  class="card-body " id="cat1">
						<ul class="list-group" >
							
							@foreach($category as $c)
							<a href="{{ url('/product/category/'.$c->slug) }} " >
	<li class="list-group-item text-dark" id="cat">
                                                              {{$c->name}}
                                                                <span class="badge badge-warning float-right text-dark">{{ $c->product_count }}</span>
                                                        </li>
							</a>
						
							@endforeach
						</ul>
					</div>
				</div>
			</div>
<div class="col-md-8">
		@yield('content')

</div>

	

		</div>

		<script type="text/javascript">
			document.getElementById('alert').innerHTML=`@include('user.error')`; 
setTimeout(function() {document.getElementById('alert').innerHTML='';},3000);
		</script>
</body>

</html>