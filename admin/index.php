<?php
$includes = ['config.file','dashboard','footer'];
foreach($includes as $include){
   require_once ('includes/'.$include.'.php');
}
