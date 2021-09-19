<?php
define("DS",DIRECTORY_SEPARATOR);
define("APP_PATH",__DIR__);
define('INCLUDE_PATH',APP_PATH.DS."includes".DS);

$includes = ['config','functions','header','body','footer'];
foreach($includes as $include){
   require_once (INCLUDE_PATH.$include.'.php');
}



