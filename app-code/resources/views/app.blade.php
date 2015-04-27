<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hedron</title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	{{-- Google Fonts --}}

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	@yield('quick-styles')
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Hedron</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('/about') }}">About</a></li>
					<li><a href="{{ url('/work') }}">Work</a></li>
					<li><a href="{{ url('/contact') }}">Contact</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					{{-- Adds Admin links when user is logged in--}}
					@if (!Auth::guest())
						<!-- <li><a href="{{ url('/auth/login') }}">Login</a></li> -->
						<li><a href="{{ url('/admin/artworks') }}">Artworks</a></li>
						<li><a href="{{ url('/admin/posts') }}">Posts</a></li>
						<li><a href="{{ url('/admin/users') }}">Users</a></li>
						<li><a href= {{ route('registerUser_path')}} >Register</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href={{ route('getlogout_path') }}>Logout</a></li>
							</ul>
						</li>
					@else
						<li>Social media</li>
					@endif
				</ul>
			</div>
		</div>

	</nav>
	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
