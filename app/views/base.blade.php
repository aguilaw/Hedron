<!-- app/views/example.blade.php -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <link rel="shortcut icon" href=".\favicon.ico"> -->
	<title>
		@yield('title')
	</title>
    <!-- J query-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
    
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<!-- Font Awesome-->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Latest compiled and minified JavaScript -->
    <!--
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	-->
    @yield('js')

	<script type="text/JavaScript" src={{ asset("assets/js/button.js")}}></script>
	{{-- Google Fonts --}}
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300|Orbitron:400,500,700' rel='stylesheet' type='text/css'>
    	<!-- overall styling -->
	<link rel="stylesheet" href={{ asset("assets/css2/importstyles.css")}}>
    @yield('styles')
</head>
<body >   
		@section('nav')
        <nav class="nav">
            
            <!--<li class="logo-block ">
                <div class="circle"><a class="logo-link" href="{{ url('home') }}"><img class="logo"  src="{{asset('/assets/Hedron_logo_Vector.svg')}}"></a></div>
            </li> -->
             <a href="{{ url('home') }}" ><img class="logo-sm" src={{asset("assets/logo_noface.png")}} ></a>
            <div class="social-block">
                <a class="fa fa-facebook  social"></a>
                <a class="fa fa-twitter social"></a>
                <a class="fa fa-tumblr social" href="http://one-hedron.tumblr.com/"></a>
                <a class="fa fa-youtube social" ></a>
            </div>
            <div class="nav-block">
                <a href="{{ url('home') }}" class="nav-bttn home">Home</a>
                <a href="{{ url('about') }}"  class="nav-bttn about">About</a>
                <a href="{{ url('gallery') }}" class="nav-bttn gallery">Gallery</a>
                <a href="{{ url('contact') }}"  class="nav-bttn contact">Contact</a>
            </div>
		</nav>
    @show
        @yield('body')
    @yield('end-js')
    <script type="text/JavaScript" src={{ asset("assets/js/bigtext.js") }}></script>
    <script type="text/JavaScript" src={{ asset("assets/js/OverallJS.js") }}></script>
	

</body>
</html>