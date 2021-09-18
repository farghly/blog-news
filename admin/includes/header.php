
<?php ob_start(); ?>
<?php session_start();
error_reporting(1);
header("Cache-Control:cache, store, must-revalidate"); // HTTP 1.1.
?>
<?php
if(!isset($_SESSION['author_email']) && !isset($_SESSION['author_password'])) {
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Admin Panel</title>
    <link rel="shortcut icon" href="img/favicon_3.png">
    <!-- Bootstrap Core CSS -->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
   <!--	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">-->
    <link rel="stylesheet" href="css/css_tag.css" type="text/css">
	<!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  >
	-->
    <!-- Custom CSS -->
    <link href="css/bootstrap-tagsinput.css" type="text/css" rel="stylesheet" />
	 <link href="css/style.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
	

    <!-- Morris Charts CSS -->

    <!-- Custom Fonts -->

    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$urldashborad =$_SERVER['HTTP_HOST']."/admin/";
$urldashboradindex =$_SERVER['HTTP_HOST']."/admin/index.php";
if($_SESSION['author_role']=="admin" && ($urldashborad==$link || $urldashboradindex==$link)):
?>

<?php endif; ?>
<?php 
 $url = $_SERVER['HTTP_HOST']."/admin/view_posts.php?source=add_post";
if(isset($_GET['p_id'])|| $link == $url) :?> 
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap-tagsinput.css" type="text/css">
 
 
<?php endif; ?>
<script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>

