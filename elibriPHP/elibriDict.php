<?php


//! Klasa pomocnicza mapująca kod ONIX-a na String-a
class ElibriDictAtom {

  //! kod ONIX-a
  public $onix_code;

  //! opis pola 
  public $name;

  //! nazwa stałej
  public $const_name;
  
  //! Konstruuj obiekt
  function __construct($onix_code, $name, $const_name) {
    
    $this->onix_code = $onix_code;
    $this->name = $name;
    $this->const_name = $const_name;
  }
}

//! Klasa pomocnicza mapująca kody ONIX-a na String-i
class ElibriDictElement {

  private $atoms;

  //! kostruktor
  protected function __construct($atoms = array()) {
    $this->atoms = $atoms;
  }
  
  //! Zwróć wszystkie mapowania
  function getAll() {
    return $this->atoms;
  }

  //! Znajdź mapowanie po kodzie
  function atomByCode($code) {

    foreach ($this->atoms as $key=>$val)
      if ($val->onix_code == $code)
        return $val;

    return null;
  }
  

}

?>
