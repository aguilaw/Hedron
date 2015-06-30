<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hedron</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet">-->
	<link href="{{ asset('/css/global.css') }}" rel="stylesheet">
	<link href="{{ asset('/fonts/fontface-styles.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Rock+Salt|Roboto:200,400,300,500' rel='stylesheet' type='text/css'>



	{{-- Google Fonts --}}

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	@yield('quick-styles')
</head>
<body onload="setupBlocks()">
	<div  class="page-container">
		@if (!Auth::guest())
		<nav class="span_5_of_9 navbar-admin">
			<ul class="">
			<!-- <li><a href="{{ url('/auth/login') }}">Login</a></li> -->
			<li class="span_1_of_5"><a href="{{ url('/admin/artworks') }}">Artworks</a></li>
			<li class="span_1_of_5"><a href="{{ url('/admin/posts') }}">Posts</a></li>
			<li class="span_1_of_5"><a href="{{ url('/admin/users') }}">Users</a></li>
			<li class="span_1_of_5 dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href={{ route('getlogout_path') }}>Logout</a></li>
				</ul>
			</li>
			</ul>
		</nav>
		@endif

		<nav class="navbar span_9_of_9 group main-nav">
			<a class="navbar-brand" href="/">
				<img class="logo-condensed span_3_of_9" src= {{ asset('images/brand/bunny_vector.svg') }}>
				<img class="logo span_1_of_9" src= {{ asset('images/brand/logo_noface_dark.png') }}>

			</a>

			<ul class="navbar-nav underline span_4_of_9">
				<li class="span_1_of_4"><a href="{{ url('/') }}">Home</a></li>
				<li class="span_1_of_4"><a href="{{ url('/work') }}">Work</a></li>
				<li class="span_1_of_4"><a href="{{ url('/about') }}">About</a></li>

				<li class="span_1_of_4"><a href="{{ url('/contact') }}">Contact</a></li>
			</ul>
			<!--<ul class="navbar-social">


				<li><a><i class="fa  fa-tumblr"></i></a></li>
				<li><a><i class="fa   fa-facebook-square"></i></a></li>
				<li><a><i class="fa  fa-youtube"></i></a></li>
			</ul> -->
		</nav>
		@section('header')
		<header class="page-header span_9_of_9 underline">
			<div class="span_5_of_9 center">
				<div class="speech-bubble post-bubble ">
					@yield('header-mssg')

				</div>
				<span><img class="hedron-head" src="{{ asset('images/brand/hedron_head_small.png') }}" alt="Hedron" ></span>
			</div>
		</header>
		@show
			@yield('content')
	</div>
	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src={{ asset('/js/production.min.js') }}></script>
	@yield('afterjs')
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
</body>
</html>
