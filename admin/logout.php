<?php

#start Session
session_start();

unset($_SESSION['username']);

//session_destroy(); //sestroys all keys

header('location: login.php'); //redirect

?>