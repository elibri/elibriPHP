<?php
  //korzystaj z lokalnej kopii, jeśli istnieje
  if (file_exists(dirname(__FILE__) . '/../elibriPHP.php')) {
    require_once(dirname(__FILE__) . '/../elibriPHP.php');
  } else {
    require_once('elibriPHP.php');
  }
 
  function print_info($product, $label, $field) {
    if ($product->$field) {
      print "$label: {$product->$field}\n";
    }
  }

  $login = getenv('ELIBRI_API_LOGIN');
  $password = getenv('ELIBRI_API_PASSWORD');

  $api = new ElibriAPI($login, $password);

  //opcjonalnie - zapełnij kolejkę wszystkimi dostępnymi danymi
  //$api->refillAll();

  

  while ($message = $api->popQueue("meta", 2)) {
    foreach ($message->products as $product) {
       print "======================\n";

       print_info($product, "Identyfikator rekordu", "record_reference");
       print_info($product, "Forma produktu", 'product_form_name');
       //tytuły
       print_info($product, "Pełen tytuł", 'full_title');
       print_info($product, "Tytuł kolekcji", 'collection_title');
       print_info($product, "Numer w kolekcji", 'collection_part');
       print_info($product, "Tytuł", 'title');
       print_info($product, "Podtytuł", 'subtitle');
       print_info($product, "Tytuł originału", 'original_title');

       print_info($product, "ISBN-13", "isbn13");
       print_info($product, "EAN", "ean");

       print_info($product, "Status rekordu", "current_state");

       foreach ($product->contributors as $contr) {
         print strtolower($contr->role_name) . ": " . $contr->person_name . "\n";
       }

       $series_names = join(", ", $product->series_names);
       if ($series_names) {
         print "Serie: $series_names\n";
       }

       print_info($product, "Wydawnictwo", "publisher_name");
       print_info($product, "ID wydawnictwa", "publisher_id");
       print_info($product, "Nazwa imprintu", "imprint_name");
   
       //produkt z liczbach
       print_info($product, "Wysokość (w mm)", "height");
       print_info($product, "Szerokość (w mm)", "width");
       print_info($product, "Grubość (w mm)", 'thickness');
       print_info($product, "Waga (w gr)", "weight");      
       print_info($product, "Ilość stron", "number_of_pages");
       print_info($product, "Czas trwania nagrania (w min.)", "duration");
       print_info($product, "Wielkość pliku (w mb)", "file_size");
       print_info($product, "Wiek czytelnika od", "reading_age_from");
       print_info($product, "Wiek czytelnika do", "reading_age_to");
       print_info($product, "Stawka VAT", "vat");
       print_info($product, "PKWiU", 'pkwiu');
       print_info($product, "Cena okładkowa", "cover_price");
       print_info($product, "Numer wydania", "edition_statement");
       print_info($product, "Liczba ilustracji", "number_of_illustrations");
       print_info($product, "Okładka", 'cover_type');

       if ($product->description) {
         print "Opis: " . $product->description->text . "\n\n\n";
       }

       print "Link do okładki: " . $product->front_cover->link . "\n";

       print "Data publikacji: " . join("/", array_reverse($product->parsed_publishing_date)) . "\n";
       if ($product->premiere) {
          print "Premiera: " . $product->premiere->format('d.m.Y') . "\n";
       }
   
       foreach ($product->subjects as $subject) {
          print "Kategoria: {$subject->code} {$subject->heading_text}\n";
       }
    }
  }
?>
