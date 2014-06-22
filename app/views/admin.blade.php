<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <link rel="shortcut icon" href=".\favicon.ico"> -->
	<title>Hedron|Admin</title>
	<!-- Font Awesome-->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- overall styling -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/JavaScript" src="assets/js/button.js"></script>
	{{-- Google Fonts --}}
	<link href='http://fonts.googleapis.com/css?family=Monoton|Mrs+Sheppards|Orbitron:500,400,700|' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,300,600,700|Allerta+Stencil|Source+Code+Pro:300,500,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href={{ asset("assets/css2/overallStyles.css")}}>
		<link rel="stylesheet" href={{ asset("assets/css2/AdminStyles.css")}}>
</head>

<body>
<nav class="nav" role="navigation">
	<ul class="nav-buttons">		
		<li ><a href="?page=dashboard">Dashboard</a></li>
		<li ><a href="?page=pages">Images</a></li>
		<li ><a href="?page=users">Updates</a></li>
		<li ><a href="?page=settings">Settings</a></li>		
	</ul>
	<ul class="user-grp">
		<li id="logout"><a href={{ action('AdminController@Logout') }} >Log Out</a></li>
		<li class="user">{{ $admin->lname}} , {{ $admin->fname }}</li>
	</ul>
	
</nav><!-- END Nav-->	

<div class="rnd-box body-wrap">
	<div class="items-wrap">
		<h2>All images</h2>
		<a class="ui" href="?page=pages"><i class="fa fa-plus"></i>  New Image</a>
		<br>
		<ul class="items-list">
			<li>
				<p>Title</p>
				<p>Image Thumbnail</p>
				<hr>
			</li>
		</ul>
	</div>				
		<form class="forms" action ="index.php?page=pages&id=" method ="post" role="form">
			<label for="title">Title:</label>
			<input class="input" type="text" name="title" id="title" value="" placeholder="Title">
			<br>
			<label for="date">Date:</label>
			<input class="input" type="text" name="date" id="date" value="" placeholder="MM-DD-YYYY">
			<br>
			<label for="tools">Tools:</label>
			<input class="input" type="text" name="tools" id="tools" value="" placeholder="">
			<br>
			<label for="type">Type:</label>
			<input class="input" type="text" name="type" id="type" value="" placeholder="">
			<br>
			<label for="desc">Description:</label>
			<br>
			<textarea class="input"  name="desc" id="desc" rows="20" columns="40"></textarea>
			<br>
			<input class="" type="checkbox" name="featured" id="featured">
			Featured
			<hr>
			<label for="width">Width:</label>
				<input class="static-info" type="text" name="type" id="type" value="px" readonly>
			<label for="height">Height:</label>
				<input class="static-info" type="text" name="type" id="type" value="px" readonly>
			<br>
			<label for="width">File Size:</label>
				<input class="static-info" type="text" name="type" id="type" value="Kb" readonly>
			<label for="width">Extension:</label>
				<input class="static-info" type="text" name="type" id="type" value=".PNG" readonly>
		</form>
	<div class="image-pos-wrap">
		<div class="diag-top"></div>
		<br>
		<br>
		<label for="pos-x">BG Pos X (%):</label>
			<input class="img-pos" type="number" name="pos-x" id="pos-x" value="" readonly>
		<label for="pos-y">BG Pos Y (%):</label>
			<input class="img-pos" type="number" name="pos-y" id="pos-y" value="" readonly>
		<br><br>
		<label for="right">Before Pos Right (%):</label>
			<input class="img-pos" type="number" name="pos-right" id="pos-right" value="" readonly>
		<br>
	</div>
	<input class="submit" type="submit" name="submit" id="submit" value="Update Image">
		

</div>

</body>
</html>