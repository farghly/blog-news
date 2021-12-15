<?php 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','loca_pro');


try{
    $connect = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->exec('SET NAMES "utf8"');
}catch(PDOException $e){
    echo 'Unable to connect'.$e->getmessage();
}

