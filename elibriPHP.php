<?php

  //ustaw domyślną strefę czasową
  if (!ini_get("date.timezone")) {
    date_default_timezone_set("Europe/Warsaw"); 
  }
  require_once 'elibriPHP/elibriDict.php';
  require_once 'elibriPHP/elibriDefinitions.php';
  require_once 'elibriPHP/elibriOnix.php';
  require_once 'elibriPHP/elibriAPI.php';
?>
