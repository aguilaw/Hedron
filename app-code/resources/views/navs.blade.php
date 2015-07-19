@if (!Auth::guest())
<nav class="span_5_of_9 navbar-admin">
	<ul class="">
	<!-- <li><a href="{{ url('/auth/login') }}">Login</a></li> -->
	<li class="span_2_of_5"><a href="{{ url('/admin/artworks') }}">Artworks</a></li>
	<li class="span_2_of_5"><a href="{{ url('/admin/posts') }}">Posts</a></li>
	<li class="span_2_of_5"><a href="{{ url('/admin/users') }}">Users</a></li>
	<li class="span_2_of_5 dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
			<li><a href={{ route('getlogout_path') }}>Logout</a></li>
		</ul>
	</li>
	</ul>
</nav>
@endif
<nav class="navbar span_9_of_9 group main-nav">
	<a class="" href="/">

		<img class="logo" src= {{ asset('images/brand/hedro_logo.png') }}>
	</a>

	<ul class="navbar-nav underline">
		<li class="nav-link"><a href="{{ url('/') }}">Home</a></li>
		<li class="nav-link"><a href="{{ url('/work') }}">Work</a></li>
		<li class="nav-link"><a href="{{ url('/about') }}">About</a></li>

		<li class="nav-link"><a href="{{ url('/contact') }}">Contact</a></li>
	</ul>
	<ul class="navbar-social underline">


		<li><a href="http://one-hedron.tumblr.com/"><i class="fa  fa-tumblr"></i></a></li>
		<li><a><i class="fa   fa-facebook-square"></i></a></li>
		<li><a><i class="fa  fa-instagram"></i></a></li>
	</ul>
</nav>
