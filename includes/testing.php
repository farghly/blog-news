<?php
use PHPUnit\tests\Framework\TestCase;
class testing extends TestCase{
    /** @test */
  public function hello(){
      echo "Hello";
  }
}

 $hello = new testing();
 $hello->hello();