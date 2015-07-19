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
		@section('navs')
			@include('navs')
		@show
		@section('header')
		<header class="page-header span_9_of_9">
			<div class="span_5_of_9 center">
				<div class="speech-bubble post-bubble ">
					@yield('header-mssg')

				</div>
			</div>
		</header>
		@show
		@yield('content')
		{{-- ONLY DISPLAY THE FOOTER IF NOT AND ADMINISTRATOR--}}
		@if (Auth::guest())
			@include('footer')
		@endif
	</div>

	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src={{ asset('/js/production.min.js') }}></script>
	@yield('afterjs')
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
</body>
</html>
