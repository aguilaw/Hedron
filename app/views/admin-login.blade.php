<!DOCTYPE  HTML>
<html>
	<head>
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">	
	</head>
	<body>
		<div id="wrap">
	<div class="container">
		
		
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h1>Login</h1>
					</div><!--end heading -->
						<div class="panel-body">

							<form action={{ action('AdminController@VerifyLogin') }}  method="post" role="form">
								<div class="form-group">
					    			<label for="exampleInputEmail1">Email address</label>
					    			<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
					  			</div>
					  			<div class="form-group">
					    			<label for="exampleInputPassword1">Password</label>
					    			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							  	</div>
					  			<button type="submit" class="btn btn-default">Submit</button>
							</form>
				</div><!--end panel body -->
				
			</div><!--end panel -->
		</div><!--end column -->
		</div><!--end row -->
		
	</div><!--end container -->
	</body>
</html>