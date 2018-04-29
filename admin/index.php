<?php
require('../includes/config.php');
require('../includes/functions.php');
define("DS",DIRECTORY_SEPARATOR);
define("ADMIN_PATH",__DIR__);
define('INCLUDE_PATH',ADMIN_PATH.DS."includes".DS);
/*define('CSS_PATH',APP_PATH.DS."assets".DS.'css'.DS);
define('JS_PATH',APP_PATH.DS."assets".DS.'js'.DS);
echo CSS_PATH;*/

    /*
        * includes files as array
        * define include folder path 
    */
$includes = array('header.php','navbar.php','dashboard.php');
foreach($includes as $include){
   require (INCLUDE_PATH.$include);
}

require_once INCLUDE_PATH.'footer.php';



