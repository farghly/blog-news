<?php
define("DS",DIRECTORY_SEPARATOR);
define("APP_PATH",__DIR__);
define('INCLUDE_PATH',APP_PATH.DS."includes".DS);

$includes = array('config','functions','header','body');
foreach($includes as $include){
   require (INCLUDE_PATH.$include.'.php');
}

require_once 'includes/footer.php';



