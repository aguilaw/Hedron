<?php 

#start A session
session_start();


#database connection
include('../config/connection.php');

if($_POST){
	$q = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = sha1('$_POST[password]')";
	$r = mysqli_query($dbc,$q);	
	
	
	if (mysqli_num_rows($r)==1){
		$_SESSION['username']=$_POST['email'];
		header('Location: index.php');
		
	}
}
?>

<!DOCTYPE  HTML>
<html>
	<head>
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
				
		<?php include('config/css.php');?>
		<?php include('config/js.php');?>		
	</head>
	<body>
		<div id="wrap">
			<?php //include(D_TEMPLATE.'/navigation.php');?>
	<div class="container">
		
		
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h1>Login</h1>
					</div><!--end heading -->
						<div class="panel-body">
							<?php 
							
								if($_POST){
									 echo $_POST['email'];
									echo "<BR>";								
								}
							
							?>
							<form action="login.php"  method="post" role="form">
								<div class="form-group">
					    			<label for="exampleInputEmail1">Email address</label>
					    			<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
					  			</div>
					  			<div class="form-group">
					    			<label for="exampleInputPassword1">Password</label>
					    			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							  	</div>
					  
								  	<!--<div class="checkbox">
								    <label>
								      <input type="checkbox"> Check me out
								    </label>
								  </div>
								 -->
					  			<button type="submit" class="btn btn-default">Submit</button>
							</form>
				</div><!--end panel body -->
				
			</div><!--end panel -->
		</div><!--end column -->
		</div><!--end row -->
		
	</div><!--end container -->
	 	<?php //include(D_TEMPLATE.'/footer.php');?>
	 	<?php //if($debug == 1){
	 		//include('widgets/debug.php');
	 	 //} ?>
	</body>
</html>