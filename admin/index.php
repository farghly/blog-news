<?php
require('../includes/config.php');
require('../includes/functions.php');
define("DS",DIRECTORY_SEPARATOR);
define("ADMIN_PATH",__DIR__);
define('INCLUDE_PATH',ADMIN_PATH.DS."includes".DS);

$includes = ['header','navbar','dashboard','footer'];
foreach($includes as $include){
   require (INCLUDE_PATH.$include.'.php');
}



