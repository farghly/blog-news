<?php
$includes = ['config.file','dashboard','footer'];
foreach($includes as $include){
   require ('includes/'.$include.'.php');
}
