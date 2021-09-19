<?php
define("DS",DIRECTORY_SEPARATOR);
define("ADMIN_PATH",__DIR__);
define('INCLUDE_PATH',ADMIN_PATH.DS."includes".DS);

$includes = ['config.file','dashboard','footer'];
foreach($includes as $include){
   require (INCLUDE_PATH.$include.'.php');
}
