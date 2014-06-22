<?php
//setup file;


//
error_reporting(0);
#database connection
include('../config/connection.php');

#constants
DEFINE('D_TEMPLATE','template');

# invlude functions
include ('functions/data.php');
include ('functions/template.php');
include('functions/sandbox.php');
# Site Setup

$debug = data_setting_value($dbc, 'debug-status');
$site_title = 'AtomCMS';



if (isset($_GET['page'])){ #set $pageid to equal the value given in the URL
	
	$page = $_GET['page'];
	
}else{$page="dashboard";}

#page setup
include('config/queries.php');

	
						

#user Setup
$user= data_user($dbc,$_SESSION['username']);	
	
?>