<?php
define("DS",DIRECTORY_SEPARATOR);
define("APP_PATH",__DIR__);
define('INCLUDE_PATH',APP_PATH.DS."includes".DS);
/*define('CSS_PATH',APP_PATH.DS."assets".DS.'css'.DS);
define('JS_PATH',APP_PATH.DS."assets".DS.'js'.DS);
echo CSS_PATH;*/

    /*
        * includes files as array
        * define include folder path 
    */

$includes = array('config.php','functions.php','header.php','body.php');
foreach($includes as $include){
   require (INCLUDE_PATH.$include);
}

require_once 'includes/footer.php';










