<?php
class Locator{
    static public function pageLocation($location){
      return header("location:".$location.".php");
   }
   static public function pageLocationSpecial($location){
       return header("location:".$location);
   }
}
?>