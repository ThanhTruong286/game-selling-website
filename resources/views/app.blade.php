<?php
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\HomeController;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Hopi Home</title>

		<link rel="icon" type="image/png" href="{{ asset('/img/star.png') }}">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
	<!-- include header's code -->
	@include('partials.header')
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="{{ route('home')}}">Home</a></li>
						<li><a href="{{ route('store.index') }}">Store</a></li>
						<li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <?php 
                        $categories = new HomeController();
                        $category = $categories->getCategory();
                        ?>
                        @foreach($category as $value)
						<li><a href="{{ url('categories/' . $value->slug) }}">{{ $value->name }}</a></li>
                        @endforeach
						<li><a href="{{ route('categories.add') }}">Add New Categories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        @yield('content', 'Default content')<!-- main content here -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
		<!-- include footer's code -->
		@include('partials.footer')
		<!-- jQuery Plugins -->
		<script src="{{ asset('/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/slick.min.js') }}"></script>
		<script src="{{ asset('/js/nouislider.min.js') }}"></script>
		<script src="{{ asset('/js/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('/js/main.js') }}"></script>
	</body>
</html>
