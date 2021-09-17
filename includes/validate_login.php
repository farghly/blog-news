<?php
include("../includes/config.php"); ?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
  $user_email     = $_POST['user_email'];
  $password       = $_POST['user_password'];
  $password       = SHA1($password);
  $query          = $connect->query("SELECT *FROM authors WHERE author_email='$user_email' And author_password='$password'");  
//$query->bindValue(':user_email', $_POST['user-emai']);

  $getresult  = $query->fetch(PDO::FETCH_ASSOC);
  if(!$getresult){
      echo 'failed';
  }
     
     $author_id     = $getresult['author_id'];
     $author_status = $getresult['author_status'];
     $db_email      = $getresult['author_email'];
     $db_pass       = $getresult['author_password'];
     $db_role       = $getresult['author_role'];
    if($user_email === $db_email && $password ===$db_pass && $author_status=='1'&&($db_role === "admin" || $db_role === "author")){
        $_SESSION['author_id']        = $getresult['author_id'];
        $_SESSION['author_email']    = $db_email;
        $_SESSION['author_password'] = $db_pass;
        $_SESSION['author_role']     = $db_role;
        $_SESSION['message_success']="Welcome to ".$_SESSION['author_role'];
        header("Location:../admin/");
    }elseif($user_email === $db_email && $password ===$db_pass && $author_status=='0'){
        $_SESSION['active_account']="You must active account by admin";
        header("location:../login.php");
    }else{
       $_SESSION['error_login']="Error in email or password";
        header("location:../login.php"); 
    }
            
     
}


