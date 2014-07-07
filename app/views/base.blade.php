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
	<!-- overall styling -->
	<link rel="stylesheet" href={{ asset("assets/css2/overallStyles.css")}}>
    @yield('js')
    
     

	<script type="text/JavaScript" src={{ asset("assets/js/button.js")}}></script>
	{{-- Google Fonts --}}
	<link href='http://fonts.googleapis.com/css?family=Monoton|Mrs+Sheppards|Orbitron:500,400,700|' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,300,600,700|Allerta+Stencil|Source+Code+Pro:300,500,400,700' rel='stylesheet' type='text/css'>
	@yield('styles')
</head>
<body >    
		<nav class="nav">
			<a href="{{ url('home') }}" class="nav-bttn home">Home</a>
            <a href="{{ url('about') }}"  class="nav-bttn about">About</a>
            <a href="{{ url('gallery') }}" class="nav-bttn gallery">Gallery</a>
            <a href="{{ url('contact') }}"  class="nav-bttn contact">Contact</a>
		</nav>

	@yield('body')
    <footer class="footer">
	<i class="fa fa-facebook fa-2x foot-icon"></i>
	<i class="fa fa-twitter fa-2x foot-icon"></i>
	<i class="fa fa-tumblr fa-2x foot-icon"></i>
	<i class="fa fa-youtube fa-2x foot-icon"></i>
	</footer><!-- end footer-->


	
<script type="text/JavaScript" src={{ asset("assets/js/InfinitePagination.js") }}></script>
</body>
</html>