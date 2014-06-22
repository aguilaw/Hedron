<?php

switch ($page) {
	case 'dashboard':
		
		break;
	case 'users':
		if (isset($_POST['submitted'])==1){
			$first =mysqli_real_escape_string($dbc,$_POST['first']);
			$last =mysqli_real_escape_string($dbc,$_POST['last']);
			
			if($_POST['password'] != ''){
				if($_POST['password'] == $_POST['passwordv']){
					$password = " password= SHA1('$_POST[password]'),";
					$verify = TRUE;
				}
				else{
					$verify = FALSE;
				}	
			}
			else {
				$verify = FALSE;
			}
			if (isset($_POST['id']) != ''){
				$action = 'updated';
				$q= "UPDATE users SET first = '$first', last= '$last',email= '$_POST[email]', $password status = '$_POST[status]' WHERE id = $_GET[id]";
				$r = mysqli_query($dbc, $q);
			}
			else{
				$action ='added';
				
				$q = "INSERT INTO users ( first, last, email, password, status) VALUE ('$first', '$last', '$_POST[email]', SHA1('$_POST[password]'), '$_POST[status]')";
				if($verify == TRUE){
					$r = mysqli_query($dbc, $q);
				}
			}
			
			if($r){
				$message='<p class="alert alert-success">User was '.$action.'!</p>';
			}
			else{
				$message= '<p class="alert alert-danger">User Could not be '.$action.' because '.mysqli_error($dbc);
				if($verify ==FALSE){$message.= '<p class="alert alert-danger">Passwords do not match and/or empty</p>';}
				$message.= '<p class="alert alert-warning">Query:'.$q.'</p>';
			}
		}
		
		if(isset($_GET['id'])){ $opened = data_user($dbc, $_GET['id']); }
		
		break;
	case 'pages':
		if (isset($_POST['submitted'])==1){
			$title =mysqli_real_escape_string($dbc,$_POST['title']);
			$label =mysqli_real_escape_string($dbc,$_POST['label']);
			$header=mysqli_real_escape_string($dbc,$_POST['header']);
			$body =mysqli_real_escape_string($dbc,$_POST['body']);
			
			if (isset($_POST['id']) != ''){
				$action = 'updated';
				$q= "UPDATE pages SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
			}
			else{
				$action ='added';
				$q = "INSERT INTO pages ( user, slug, label, title, header, body) VALUE ($_POST[user], '$_POST[slug]', '$label', '$title', '$header', '$body')";
			}
			
			$r = mysqli_query($dbc, $q);
			
			if($r){
				$message='<p class="alert alert-success">Page was '.$action.'!</p>';
			}
			else{
				$message= '<p class="alert alert-danger">Page Could not be '.$action.' because '.mysqli_error($dbc);
				$message.= '<p class="alert alert-warning">Query:'.$q.'</p>';
			}
		}
		
		if(isset($_GET['id'])){ $opened = data_page($dbc, $_GET['id']); }
		break;
	case 'settings':
		if (isset($_POST['submitted'])==1){
			$label =mysqli_real_escape_string($dbc,$_POST['label']);
			$value =mysqli_real_escape_string($dbc,$_POST['value']);
			
			
			if (isset($_POST['id']) != ''){
				$action = 'updated';
				$q= "UPDATE settings SET id = '$_POST[id]', label = '$label',value = '$value' WHERE id = '$_POST[openedId]'";
				$r = mysqli_query($dbc, $q);
			}
			
			
			if($r){
				$message='<p class="alert alert-success">Setting was '.$action.'!</p>';
			}
			else{
				$message= '<p class="alert alert-danger">Setting Could not be '.$action.' because '.mysqli_error($dbc);
				

			}
		}
		break;
	
	default:
		
		break;
}

?>