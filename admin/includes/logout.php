<?php session_start(); ?>
<?php

session_destroy();
/*$_SESSION['username']  = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname']  = null;
$_SESSION['password']  = null;
$_SESSION['user_role'] = null;
$_SESSION['user_image']= null;*/
header("location:../../login.php");
?>