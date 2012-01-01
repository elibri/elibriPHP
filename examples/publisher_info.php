<?php
  //korzystaj z lokalnej kopii, jeśli istnieje
  if (file_exists(dirname(__FILE__) . '/../elibriPHP.php')) {
    require_once(dirname(__FILE__) . '/../elibriPHP.php');
  } else {
    require_once('elibriPHP.php');
  }
 
  $login = getenv('ELIBRI_API_LOGIN');
  $password = getenv('ELIBRI_API_PASSWORD');

  $api = new ElibriAPI($login, $password);

  $publisher_list = $api->getPublishersList();

  print "W systemie eLibri znajduje się: " . count($publisher_list) . " wydawnictw\n\n";

  print "Dane pierwszego wydawnictwa:\n";

  //wyświetl dane pierwszego wydawnictwa
  $p = $publisher_list[0];
  print "  ID: {$p->publisher_id}\n";
  print "  Nazwa wydawnictwa: {$p->name}\n";
  print "  Nazwa firmy: {$p->company_name}\n";
  print "  NIP: {$p->nip}\n";
  print "  Ulica: {$p->street}\n";
  print "  Miasto: {$p->city}\n";
  print "  Kod pocztowy: {$p->zip_code}\n";
  print "  Telefon (1): {$p->phone1}\n";
  print "  Telefon (2): {$p->phone2}\n";
  print "  www: {$p->www}\n";
  print "  E-mail: {$p->email}\n";
  print "  Liczba produktów: {$p->products_count}\n\n";

  print "Lista produktów\n";
  $products = $api->getPublisherProducts($p->publisher_id);
  //$products to tablica instancji ElibriPublisherProduct
  foreach ($products as $product) {
    print "   {$product->record_reference} - {$product->title}\n";
  };

  $first_product = $products[0];
  $product_data = $api->getProduct($first_product->record_reference);
  //$product_data to instancja ElibriOnixMessage
  print "Zwrócony został produkt: {$product_data->products[0]->full_title}\n";

  $product_data = $api->getProduct("ea5782b2b67263943052");
  print "Zwrócony został produkt: {$product_data->products[0]->full_title}\n";


?>
