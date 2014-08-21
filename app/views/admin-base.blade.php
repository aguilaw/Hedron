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
    
    
	{{-- Google Fonts --}}
	<link href='http://fonts.googleapis.com/css?family=Monoton|Mrs+Sheppards|Orbitron:500,400,700|' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,300,600,700|Allerta+Stencil|Source+Code+Pro:300,500,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href={{ asset("assets/css2/overallStyles.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css2/AdminStyles.css") }}>
    @yield('specific-styles')     
</head>

<body>
<div class="fade-black">
<nav class="nav" role="navigation">
	<ul class="nav-buttons">		
		<li ><a class="nav-bttn"  href={{ action('UpdatesController@MakeNewUpdate')}}>Updates</a></li>	
		<li ><a class="nav-bttn" href={{ action('ImagesController@MakeNewImage')}}>Images</a></li>
        <li ><a class="nav-bttn" href={{ action('UsersController@MakeNewUser')}}>Users</a></li>
        <li ><a class="nav-bttn" href={{ action('PagesController@ShowHome')}}>Hedron Home</a></li>
	</ul>
	<ul class="user-grp">
		<li class="user">{{ Auth::user()->lname." , ".Auth::user()->fname }} </li>
        <a href={{ action('AdminController@Logout') }} >
        <i class="fa fa-sign-out"></i>Log Out
        </a>
	</ul>
</nav><!-- END Nav-->

<!-- The main bos that wraps all the contents of the admin pages-->
<div class="rnd-box body-wrap">
<!-- List containing all the item of type X-->
	<div class="items-wrap">
		<h2>All @yield('type-pl') </h2>
		<a class="ui" href=@yield('type-create') > 
            <i class="fa fa-plus"></i>  New @yield('type') </a>
		<br>
		<ul class="items-list" id="items-list">
            @yield('type-list')
		</ul>
	</div>
<!-- A form uniqhe to each item type-->
     @if(Session::has('message'))
        <b>{{Session::get('message')}}</b>
        <br>
    @endif
    
    @if($errors->any())
        @foreach($errors->all() as $error)
        {{$error}}
        <br>
        @endforeach
    @endif
    
        @yield('form')    
</div>
<script type="text/JavaScript" src={{ asset("assets/js/adminPagesEvents.js") }}></script>
@yield('js')
</div>
</body>
</html>