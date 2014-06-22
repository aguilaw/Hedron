<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <link rel="shortcut icon" href=".\favicon.ico"> -->
	<title>Hedron|Admin</title>
	<!-- Font Awesome-->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- J query-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
    
     <script type="text/JavaScript" src={{ asset("assets/js/diagonalManipulation.js") }}></script>
    
    
	{{-- Google Fonts --}}
	<link href='http://fonts.googleapis.com/css?family=Monoton|Mrs+Sheppards|Orbitron:500,400,700|' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,300,600,700|Allerta+Stencil|Source+Code+Pro:300,500,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href={{ asset("assets/css2/overallStyles.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css2/AdminStyles.css") }}>
    @yield('specific-styles')     
</head>

<body>
<nav class="nav" role="navigation">
	<ul class="nav-buttons">		
		<li ><a href={{ action('UpdatesController@UpdateNew')}}>Updates</a></li>	
		<li ><a href={{ action('ImagesController@ImageNew')}}>Images</a></li>
	</ul>
	<ul class="user-grp">
		<li id="logout"><a href={{ action('AdminController@Logout') }} >Log Out</a></li>
		<li class="user">{{ Session::get('user') }}</li>
	</ul>
	
</nav><!-- END Nav-->	

<div class="rnd-box body-wrap">
	<div class="items-wrap">
		<h2>All @yield('type-pl') </h2>
		<a class="ui" href=@yield('type-create') > 
            <i class="fa fa-plus"></i>  New @yield('type') </a>
		<br>
		<ul class="items-list" id="items-list">
        
            @yield('type-list')
            
		</ul>
	</div>
    
        @yield('form')
        
</div>
@yield('js')

</body>
</html>