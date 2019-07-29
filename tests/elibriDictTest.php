<?php

require_once(dirname(__FILE__) . '/../elibriPHP.php');

use PHPUnit\Framework\TestCase;

class ElibriDictTest extends TestCase {
   
   public function testElibriDictionary() {
      $form = ElibriDictProductFormCode::byCode("BA");
      $this->assertEquals("książka", $form->name["pl"]);
      $this->assertEquals("book", $form->name["en"]);
      $this->assertEquals("BOOK", $form->const_name);
      $this->assertEquals("BA", $form->onix_code);
   }
}
?>
