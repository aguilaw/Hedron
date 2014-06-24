<!DOCTYPE  HTML>
<html>
	<head>
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">	
        <link rel="stylesheet" href={{ asset("assets/css2/overallStyles.css") }}>
        <link rel="stylesheet" href={{ asset("assets/css2/AdminStyles.css") }}>
        {{-- Google Fonts --}}
	<link href='http://fonts.googleapis.com/css?family=Monoton|Mrs+Sheppards|Orbitron:500,400,700|' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,300,600,700|Allerta+Stencil|Source+Code+Pro:300,500,400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="wrap">
            <h1>Admin Login</h1>
        <div class="rnd-box">
            <form class="login-box" action={{ action('AdminController@VerifyLogin') }}  method="post" role="form">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                <br>
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <br>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>		
        </div><!--end container -->
	</body>
</html>