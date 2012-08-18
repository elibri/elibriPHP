<?php

require_once(dirname(__FILE__) . '/../elibriPHP.php');
require_once('PHPUnit/Framework/TestCase.php');

class ElibriDictTest extends PHPUnit_Framework_TestCase {
   
   public function testElibriDictionary() {
      $form = ElibriDictProductFormCode::byCode("BA");
      $this->assertEquals("książka", $form->name["pl"]);
      $this->assertEquals("book", $form->name["en"]);
      $this->assertEquals("BOOK", $form->const_name);
      $this->assertEquals("BA", $form->onix_code);
   }
}
?>
