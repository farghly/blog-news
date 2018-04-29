
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">

        <!-- Import google fonts - Heading first/ text second -->
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Css files -->
        <!-- Icons -->
        <link href="admin/css/font-awesome.min.css" rel="stylesheet" />
       <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
      
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="assets/css/plugins.css" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="assets/css/login.css" rel="stylesheet" />
    
        
    </head>

   <body class="login-page">
<?php 
session_start();
function SessionDisplay($type,$message_name){
   if(isset($_SESSION[$message_name])):?>
    <div class="alert alert-<?php echo $type;?> text-center"><h4>
    <?php
    echo $_SESSION[$message_name];
    unset($_SESSION[$message_name]);
    ?>
    </h4>
    </div>          
<?php endif;}?>

<?php
    SessionDisplay('danger','active_account');   
    SessionDisplay('danger','error_login');   
?>
        <!-- Start login container -->
         <div class="container login-container">
            <div class="login-panel panel panel-default plain animated bounceIn">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title text-center">
                        <a href="#">
                        Dynamic logo
                            </a>
                    </h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal mt0" action="includes/validate_login.php" method="post" id="login-form" role="form">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="input-group input-icon">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" name="user_email" id="email" class="form-control"  placeholder="Your email ..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="input-group input-icon">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" name="user_password" id="password" class="form-control" placeholder="Your password" required>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group mb0">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                                <div class="checkbox-custom">
                                    <input type="checkbox" name="remember" id="remember" value="option">
                                    <label for="remember">Remember me ?</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 mb25">
                                <button class="btn btn-success pull-right" name="login" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                    <!--<div class="seperator">
                      
                        <hr>
                    </div>-->
                   <!-- <div class="social-buttons text-center mt5 mb5">
                        <a href="#" class="btn btn-primary btn-alt mr10">Sign in with <i class="fa fa-facebook s20 ml5 mr0"></i></a> 
                        <a href="#" class="btn btn-danger btn-alt ml10">Sign in with <i class="fa fa-google-plus s20 ml5 mr0"></i></a> 
                    </div>-->
                </div>
                
            </div>
            <!-- End .panel -->
        </div>
        <!-- End login container -->
       
   <!-- Bootstrap plugins -->
       
       <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/script.js"></script>
        
        
 
    </body>
</html>
 