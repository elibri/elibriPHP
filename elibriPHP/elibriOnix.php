<?php

//! @defgroup private Klasy pomocniczne
//! @{
//! Klasy pomocniczne, do których nie będzie bezpośrednio dostępu
//! @}


//! Klasa pomocnicza abstrahująca dostęp do struktur xml-a
//! @ingroup private
class FirstNodeValue {

  public static function get($parentNode, $tagName, $convertToInt=FALSE) {
    $tag = $parentNode->getElementsByTagName($tagName);
    if ($tag->length > 0) {
      if ($convertToInt) {
        return intval($tag->item(0)->nodeValue);
      } else {
        return $tag->item(0)->nodeValue;
      }
    }
  }
}

//! Klasa abstrahująca wiadomość ONIX
class ElibriOnixMessage {
  
  //! Wewnętrzny numer wersji używanego XML-a
  public $elibri_dialect;

  //! Lista zwróconych produktów - ElibriProduct
  public $products = array();

  //! Nagłówek wiadomości - ElibriHeader
  public $header;

  //! @brief parsuje wiadomość ONIX
  //! @param String $source wiadomość ONIX
  //! @return instancję ElibriOnixMessage 
  public static function parse($source) {
    $doc = new DOMDocument();
    $doc->loadXML($source);
    
    $message = new ElibriOnixMessage();
    $message->elibri_dialect = FirstNodeValue::get($doc, "Dialect");
    
    $xheader = $doc->getElementsByTagName("Header");
    if ($xheader->length == 1) {
      $message->header = new ElibriHeader($xheader);
    }
    
    foreach ($doc->getElementsByTagName("Product") as $xml_fragment) {
      $message->products[] = new ElibriProduct($xml_fragment);
    }
  
    return $message;
  }

}


//! Informacja o wydawnictwie
class ElibriPublisherInfo {
  
  //! wewnętrzne Id wydawnictwo w eLibri
  public $publisher_id;

  //! nazwa wydawnictwa
  public $name;

  //! liczba produktów 
  public $products_count;

  //! nazwa firmy
  public $company_name;

  //! NIP 
  public $nip;

  //! ulica i numer domu
  public $street;

  //! miasto
  public $city;

  //! kod pocztowy
  public $zip_code;

  //! telefon (1)
  public $phone1;

  //! telefon (2)
  public $phone2;

  //! strona www
  public $www;

  //! adres E-mail wydawnictwa
  public $email; 


  //! parsowanie xml-a zwróconego przez ElibriAPI::getPublishersList()
  public static function parse($source) {  
    $result = new SimpleXMLElement($source);
    $publishers = array();
    foreach ($result->publisher as $v) {
      $publishers[] = new ElibriPublisherInfo($v);
    }
    return $publishers;
  }

  //! kontruktor otrzymujący fragment xml-a
  function __construct($xml_fragment) {
    $this->publisher_id =(string) $xml_fragment["id"];
    $this->name = (string) $xml_fragment["name"];
    $this->company_name = (string) $xml_fragment["company_name"];
    $this->nip = (string) $xml_fragment["nip"];
    $this->street = (string) $xml_fragment["street"];
    $this->city = (string) $xml_fragment["city"];
    $this->zip_code = (string) $xml_fragment["zip_code"];
    $this->phone1 = (string) $xml_fragment["phone1"];
    $this->phone2 = (string) $xml_fragment["phone2"];
    $this->www = (string) $xml_fragment["www"];
    $this->email = (string) $xml_fragment["email"];
    $this->products_count = (string) $xml_fragment->products["count"];
  }
}


//! Klasa abstrahuje informację o jednym produkcie, zwracane przez ElibriAPI::getPublisherProducts 
class ElibriPublisherProduct {

  //! Tytuł produktu 
  public $title;

  //! RecordReference produktu
  public $record_reference;
  
  //! Parsuj informację zwracaną przez ElibriAPI::getPublisherProducts
  public static function parse($source) {
    $result = new SimpleXMLElement($source);
    $products = array();
    foreach ($result->products->product as $v) {
      $products[] = new ElibriPublisherProduct($v);
    }
    return $products;
  }

  //! konstruuj obiekt na podstawie danych w xml-u
  function __construct($xml_fragment) {
    $this->title = (string) $xml_fragment["title"];
    $this->record_reference = (string) $xml_fragment["record_reference"];
  }


}

//! Klasa pomocnicza reprezentująca informacja o kolejce
class ElibriQueue {

  //! nazwa kolejki
  public $name;

  //! liczba produktów w kolejce
  public $product_count;  

  //! prosty konstruktor
  function __construct($xml_fragment) {
    $this->name = (string) $xml_fragment["name"];
    $this->product_count = (string) $xml_fragment["products_count"];
  }

  //! parsowanie xml-a zwracanego przez API
  public static function parse($source) {
    $xml = new SimpleXMLElement($source);

    $queues = array();
    foreach ($xml->queue as $v) {
      $queues[] = new ElibriQueue($v);
    }

    return $queues;
  }

}
//! Klasa macierzysta dla obiektów, które przechowują informację o id w systemie eLibri i dacie stworzenia/ostatniej aktualizacji
class ElibriAnnotatedObject {
  //! numeryczne ID w systemie eLibri - dotyczy tego konkretnego wpisu, tej wartości nie można używać do kojarzenia autorów
  public $id;

  //! data ostatniej aktualizacji - instanca DateTime
  public $datestamp;

  //! data ostatniej aktualizacji - String w formacie YYYYMMDDTHHMM, np. 20111201T1805 (1.12.2011 18:05)
  public $datestamp_before_type_cast;

  function __construct($xml_fragment) {
    if ($xml_fragment->getAttribute("sourcename")) {
      $source_and_id = explode(":", $xml_fragment->getAttribute("sourcename"));
      $this->id = $source_and_id[1];
    }
    $this->datestamp_before_type_cast = $xml_fragment->getAttribute("datestamp");
    if ($this->datestamp_before_type_cast) {
      $d = $this->datestamp_before_type_cast;
      $this->datestamp = new DateTime(substr($d, 0, 4) . "-" . substr($d, 4, 2) . "-" . substr($d, 6, 2) . " " . substr($d, 9, 2) . ":" . substr($d, 11, 2));
    }
  }

}

//! Reprezentacja produktu
class ElibriProduct {
  
  //! fizyczna forma produktu (kod ONIX) - patrz ElibriDictProductFormCode
  public $product_form;
  
  //! fizyczna forma produktu jako String, np. 'BOOK' - patrz ElibriDictProductFormCode
  public $product_form_name;
  
  //! informacja, czy produkt jest pakietem. W tej chwili tylko wartość '00' - produkt samodzielny
  public $product_composition;

  //! wysokość - w milimetrach
  public $height;

  //! szerokość - w milimetrach
  public $width;

  //! grubość - w milimetrach
  public $thickness;

  //! waga - w gramach
  public $weight;

  //! EAN produktu - NULL, jeśli taki sam, jak ISBN13 ($isbn13)
  public $ean;

  //! ISBN13 produktu (bez myślników)
  public $isbn13;

  //! ISBN13 produktu (z myślnikami)
  public $isbn13_with_hyphens;

  //! ISSN produktu (bez myślników), NULL jeżeli nie istnieje
  public $issn;
  
  //! ISSN produktu (z myślnikami), NULL jeżeli nie istnieje 
  public $issn_with_hyphens;
  
  //! ilość stron
  public $number_of_pages;
  
  //! Numer wydania, jako string
  public $edition_statement;

  //! Liczba ilustracji
  public $number_of_illustrations;


  //! czas trwania nagrania - jeśli jest to audiobook, w minutach
  public $duration;

  //! wielkość pliku - w megabajtach
  public $file_size;

  //! nazwa wydawnictwa
  public $publisher_name;

  //! numeryczne ID wydawnictwa w bazie eLibri
  public $publisher_id;

  //! miasto publikacji
  public $city_of_publication;

  //! @brief nazwa imprintu, jeśli książka jest wydana pod imprintem
  //! jeśli to pole jest uzupełnione, to proszę tą właśnie nazwę pokazywać jako
  //! nazwę wydawnictwa klientowi końcowemu
  public $imprint_name;

  //! zalecany minimalny wiek czytelnika
  public $reading_age_from;
  
  //! zalecany maksymalny wiek czytelnika
  public $reading_age_to;

  //! Treść spisu treści, instancja ElibriTextContent
  public $table_of_contents;

  //! Opis książki, instancja ElibriTextContent
  public $description;

  //! Krótki opis, instanca ElibriTextContent
  public $short_description;

  //! Lista recenzji - lista instancji ElibriTextContent
  public $reviews = array();

  //! Lista fragmentów - lista instancji ElibriTextContent
  public $excerpts = array();

  //! Lista serii, do których należy produkt, lista dwuelementowych list, gdzie pierwszy element jest nazwą serii, a drugi element numerem w serii (opcjonalnie)
  public $series = array();

  //! Lista nazwa serii
  public $series_names = array();

  //! Informacja o okładce - instancja ElibriSupportingResource, patrz również $supporting_resources
  public $front_cover;

  //! Tytuł - String
  public $title;

  //! Podtytuł książki
  public $subtitle;

  //! Tytuł produktu na poziomie kolekcji
  public $collection_title;

  //! Numer na poziomie kolekcji
  public $collection_part;

  //! Pełen tytuł tytułu
  public $full_title;

  //! tytuł oryginału
  public $original_title;

  //! tytuł handlowy
  public $trade_title;

  //! @brief Informacja o dacie wydania w postaci listy wartości. Może być pusta, albo zawiera tylko rok, albo rok i miesiąc, albo rok, miesiąc i dzień wydania, 
  //! w zależności od posiadanych informacji. Uwzględnia datę końca wyłączności, tzn. jeśli produkt jest sprzedawany na wyłączność przez jakiś czas, to
  //! ta data uwzględia ten okres i jest równa końcowi okresu wyłączności
  public $parsed_publishing_date = array();
 
  //! Data premiery - instancja ElibriPublishingDate. Nie uwzględnia wyłączności sprzedaży
  public $publishing_date;

  //! Jeśli $parsed_publishing_date składa się z trzech elementów (czyli ma informację o dokładnej dacie), to pole $premiere 
  //! reprezentuje tą informację w postaci instancji DateTime
  public $premiere;

  //! RecordReference - jednoznaczny identyfikator książki, jedyny, który ma gwarancje niezmienności 
  public $record_reference;

  public $notification_type;

  //! w wyjątkowej sytuacji, gdy rekord zostanie wykasowany, w tym polu znajdzie się informacja o przyczynie usunięcia rekordu
  public $deletion_text;
  
  //! rodzaj okładki, np. twarda
  public $cover_type;

  //! cena okładkowa
  public $cover_price;

  //! stawka VAT
  public $vat;

  //! symbol PKWiU
  public $pkwiu;

  //! flaga bool, czy dla produktu istnieje podgląd
  public $preview_exists;
  
  //! \brief status wydawniczy - wartość String - jedna z: 'announced', 'preorder', 'published', 'out_of_print' 
  //! \details 
  //! \li 'announced' - informacja o produkcie jest szczątkowa, ale wydawnictwo zdecydowało się ją opublikować. Można taką informację umieścić w dziale zapowiedzi.
  //! \li 'preorder' - dane o rekordzie są kompletne. Jeśli masz zaufanie do wydawcy, to możesz uruchamiać przedsprzedaż
  //! \li 'published' - książka została opublikowana
  //! \li 'out_of_print' - wydawca wyraził przekonanie, że nakład książki jest wyczerpany, choć w dalszym ciągu książka może być dostępna w hurcie 
  public $current_state;
  
  //! Produkty o identycznej treści, ale innej formie fizycznej (lista instancji ElibriRelatedProduct)
  public $related_products = array();

  //! Informacja o dostępności produktów w sieci dystrybucji (lista instancji ElibriSupplyDetail)
  public $supply_details = array();
  
  //! Lista twórców związanych z książką - lista instancji ElibriContributor
  public $contributors = array();

  //! Lista języków, w jakich napisana jest książka, lista instancji ElibriLanguage
  public $languages = array();

  //! Lista kategorii, do których należy produkt - lista instancji  ElibriSubject
  public $subjects = array();

  //! Lista plików towarzyszących produktowi - patrz również $cover_cover, lista instancji  ElibriSupportingResource
  public $supporting_resources = array();

  //! Informacje o wydawnictwie - instanja ElibriPublisher, patrz też $publisher_id i $publisher_name
  public $publisher;

  //! kod ONIX-a, patrz $current_state
  public $publishing_status;

  //! Tablica identyfikatorów produktów w hurtowniach, w postaci tabeli asociacyjnej nazwa hurtowni => identyfikator
  public $proprietary_identifiers = array();

  //! Czy produkt jest sprzedawany na  wyłączność w jeden sieci na jakiś czas? true albo false
  public $sales_restrictions;

  //! Jeśli produkt będzie sprzedawany na wyłączność, to tutaj znajdziesz szczegółowe informacje, instancja ElibriSalesRestriction
  public $sales_restrictions_info;

  //! Czy sprzedaż produktu jest ograniczona do teresu Polski? (flaga bool)
  public $sale_restricted_to_poland;

  //! Czy licencja jest nieograniczona czasowo (tylko produkty elektroniczne, bool)
  public $unlimited_licence;

  //! Data końca licencji na sprzedaż w formacie YYYYMMDD (tylko produkty elektroniczne, jeśli $unlimited_licence jest False)
  public $licence_limited_to_before_type_cast;

  //! Data końca licencji na sprzedaż jako Array(rok, miesiąc, dzień) - (tylko produkty elektroniczne, jeśli $unlimited_licence jest False)
  public $parsed_licence_limited_to;

  //! Data końca licencji na sprzedaż, jako instancja DateTime, (tylko produkty elektroniczne, jeśli $unlimited_licence jest False)
  public $licence_limited_to;

  //! Dostępne formaty elektronicznych produktów (lista z wyborem wartości: MOBI, EPUB, PDF, MP3)
  public $digital_formats;
 
  //! Sposób zabezpieczenia pliku (tylko elektroniczne produktu). Możliwe wartości: WATERMARK, DRM, NONE
  public $technical_protection;
 
  //! Czy istnieje informacja o możliwości udostępnienia fragmentu książki (tylko produkty elektroniczne - flaga bool)
  public $excerpt_info;

  //! Jeśli $excerpt_info jest True, to flaga $excerpt_publishing_allowed zawiera informację, czy wydawca zgadza się na opublikowanie fragmentu e-booka
  public $excerpt_publishing_allowed;

  //! Jeśli $excerpt_publishing_allowed, to flaga $excerpt_publishing_with_limit zawiera informcję, czy wydawca nałożył limit na wielkość publikowanego materiału
  public $excerpt_publishing_with_limit;

  //! Jeśli $excerpt_publishing_with_limit jest True, to w polu $excerpt_limit_quantity jest informacja na temat limitu co do ilości publikowanego materiału
  public $excerpt_limit_quantity;

  //! Jednostka miary, w którym wyrażona jest liczba w polu $excerpt_limit_quantity (w tej chwili CHARACTERS lub PERCENTAGE)
  public $excerpt_limit_unit;

  //! Informacje o fragmentach (dotyczy produktów cyfrowych) - lista instancji ElibriExcerptInfo
  public $excerpt_infos = array();

  //! Informacje o plikach master (dotyczy produktów cyfrowych) - lista instancji ElibriFileInfo
  public $file_infos = array();

  //! Lista identyfikatorów - patrz pola $ean, $isbn, $proprietary_identifiers
  private $identifiers = array();

  //! Tytuły produktu - lista instancji ElibriTitleDetail
  private $title_details = array();

  //! Dodatkowe liczby opisujące książkę - patrz page_count, duration, file_size
  private $extents = array();

  //! Wiek czytelnika - partz pola $reading_age_from i $reading_age_to
  private $audience_ranges = array();

  //! Lista wszystkich tekstów towarzyszących produktowi - patrz  $table_of_contents, $description, $short_description, $reviews, $excerpts 
  private $text_contents = array();

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->record_reference = FirstNodeValue::get($xml_fragment, "RecordReference");
    $this->notification_type = FirstNodeValue::get($xml_fragment, "NotificationType");
    $this->deletion_text = FirstNodeValue::get($xml_fragment, "DeletionText");
    $this->cover_type = FirstNodeValue::get($xml_fragment, "CoverType");
    $this->cover_price = FirstNodeValue::get($xml_fragment, "CoverPrice");
    $this->vat = FirstNodeValue::get($xml_fragment, "Vat", true);
    $this->pkwiu = FirstNodeValue::get($xml_fragment, "PKWiU");
    $this->isbn13_with_hyphens = FirstNodeValue::get($xml_fragment, "HyphenatedISBN");
    $this->preview_exists = (FirstNodeValue::get($xml_fragment, "preview_exists") == "true");
    $this->city_of_publication = FirstNodeValue::get($xml_fragment, "CityOfPublication");
      
    //product identifiers
    foreach ($xml_fragment->getElementsByTagName("ProductIdentifier") as $product_identifier_element) {
      $pid = new ElibriProductIdentifier($product_identifier_element);
      $this->identifiers[] = $pid;
      if ($pid->proprietary) {
        $this->proprietary_identifiers[$pid->type_name] = $pid->value;
      } else {
        $this->{strtolower($pid->identifier_type)} = $pid->value; //ean, isbn13
      }
    }

    //descriptive detail
    if ($xml_fragment->getElementsByTagName("DescriptiveDetail")->length > 0) {
      $this->parseDescriptiveDetail($xml_fragment->getElementsByTagName("DescriptiveDetail")->item(0));
    } 
      
    //collateral
    if ($xml_fragment->getElementsByTagName("CollateralDetail")->length > 0) {
      $this->parseCollateralDetail($xml_fragment->getElementsByTagName("CollateralDetail")->item(0));
    } 
      
    //publishing detail
    if ($xml_fragment->getElementsByTagName("PublishingDetail")->length > 0) {
      $this->parsePublishingDetail($xml_fragment->getElementsByTagName("PublishingDetail")->item(0));
    }
      
    //related material
    if ($xml_fragment->getElementsByTagName("RelatedMaterial")->length>0) {
      $xrelated = $xml_fragment->getElementsByTagName("RelatedMaterial")->item(0);
        
      //related material products
      foreach ($xrelated->getElementsByTagName("RelatedProduct") as $xrelated) {
        $this->related_products[] = new ElibriRelatedProduct($xrelated);
      }
    } 

    $this->computeState();      

    $this->checkLicence($xml_fragment);

    //Supply detail
    $xsupplys = $xml_fragment->getElementsByTagName("SupplyDetail");
    foreach ($xsupplys as $xsupply) {
      $supply = new ElibriSupplyDetail($xsupply);
      $this->supply_details[] = $supply;
    } 

    foreach ($xml_fragment->getElementsByTagName("excerpt") as $node) {
      $excerpt_info = new ElibriExcerptInfo($node);
      $this->excerpt_infos[] = $excerpt_info;
    }

    foreach ($xml_fragment->getElementsByTagName("master") as $node) {
      $file_info = new ElibriFileInfo($node);
      $this->file_infos[] = $file_info;
    }

  }


  private function checkLicence($xml_fragment) {
    if ($xml_fragment->getElementsByTagName("SaleNotRestricted")->length > 0) {
      $this->unlimited_licence = True;
    } elseif ($xml_fragment->getElementsByTagName("SaleRestrictedTo")->length > 0) {
      $this->unlimited_licence = False;
      $this->licence_limited_to_before_type_cast = FirstNodeValue::get($xml_fragment, "SaleRestrictedTo");
      $this->parsed_licence_limited_to = ElibriPublishingDate::parseDate($this->licence_limited_to_before_type_cast, 'YYYYMMDD');
      $this->licence_limited_to =  new DateTime($this->parsed_licence_limited_to[0] . "-" . 
                                                $this->parsed_licence_limited_to[1] . "-" . $this->parsed_licence_limited_to[2]);
    }
  }

  private function parsePublishingDetail($publishing_node) {

    if ($publishing_node->getElementsByTagName("Imprint")->length > 0) {
      $imprint = new ElibriImprint($publishing_node->getElementsByTagName("Imprint")->item(0));
      $this->imprint_name = $imprint->name;
    }

    if ($publishing_node->getElementsByTagName("Publisher")->length > 0) {
      $publisher = new ElibriPublisher($publishing_node->getElementsByTagName("Publisher")->item(0));
      $this->publisher_id = $publisher->id;
      $this->publisher = $publisher;
      $this->publisher_name = $publisher->name;
    }

    $this->publishing_status = $publishing_node->getElementsByTagName("PublishingStatus")->item(0)->nodeValue;
        
    //publishing date
    if ($publishing_node->getElementsByTagName("PublishingDate")->length > 0) {
      $this->publishing_date = new ElibriPublishingDate($publishing_node->getElementsByTagName("PublishingDate")->item(0));
      $this->parsed_publishing_date = $this->publishing_date->parsed;
      if (count($this->parsed_publishing_date) == 3) {
        $this->premiere = new DateTime($this->parsed_publishing_date[0] . "-" . $this->parsed_publishing_date[1] . "-" . $this->parsed_publishing_date[2]);
      }
    }
        
    //publishing det restrictions
    if ($publishing_node->getElementsByTagName("SalesRestriction")->length > 0) {
      $this->sales_restrictions_info = new ElibriSalesRestriction($publishing_node->getElementsByTagName("SalesRestriction")->item(0));
      $this->sales_restrictions = true;
      $this->parsed_publishing_date = ElibriPublishingDate::parseDate($this->sales_restrictions_info->end_date, 'YYYYMMDD');
      $this->premiere = $this->sales_restrictions_info->end_date_as_datetime;
    } else {
      $this->sales_restrictions = false;
    }

    //ograniczenia terytorialne
    $this->sale_restricted_to_poland = False;
    if (FirstNodeValue::get($publishing_node, "CountriesIncluded") == "PL") {
      $this->sale_restricted_to_poland = True;
    }
  }

  private function parseCollateralDetail($collateral_node) {
     foreach ($collateral_node->getElementsByTagName("TextContent") as $xml_fragment) {
        $textcontent = new ElibriTextContent($xml_fragment);
        switch ($textcontent->type) {
          case ElibriDictOtherTextType::TABLE_OF_CONTENTS: $this->table_of_contents = $textcontent; break;
          case ElibriDictOtherTextType::MAIN_DESCRIPTION: $this->description = $textcontent; break;
          case ElibriDictOtherTextType::SHORT_DESCRIPTION: $this->short_description = $textcontent; break;
          case ElibriDictOtherTextType::REVIEW: $this->reviews[] = $textcontent; break;
          case ElibriDictOtherTextType::EXCERPT: $this->excerpts[] = $textcontent; break;
        }
        $this->text_contents[] = $textcontent;
      }
            
      //supporting resources
      foreach ($collateral_node->getElementsByTagName("SupportingResource") as $xml_fragment) {
        $resource = new ElibriSupportingResource($xml_fragment);
        if ($resource->content_type == ElibriDictResourceContentType::FRONT_COVER) { 
          $this->front_cover = $resource;
        }
        $this->supporting_resources[] = $resource;
      }
  }
  
  private function parseDescriptiveDetail($descriptive_detail) {
    $this->product_composition = FirstNodeValue::get($descriptive_detail, "ProductComposition");
    $this->product_form = FirstNodeValue::get($descriptive_detail, "ProductForm");
    $this->product_form_name = ElibriDictProductFormCode::byCode($this->product_form)->const_name;
        
    //wymiary produktu
    foreach ($descriptive_detail->getElementsByTagName("Measure") as $xml_fragment) {
      $msr = new ElibriMeasure($xml_fragment);
      $this->{strtolower($msr->type_name)} = $msr->measurement; //setting height, width, thickness, weight properties
    }

    $colls = $descriptive_detail->getElementsByTagName("Collection");
    foreach ($colls as $coll) {
      $collection = new ElibriCollection($coll);
      $titleDet = $coll->getElementsByTagName("TitleDetail")->item(0);
      $tDet = new ElibriTitleDetail($titleDet);
      $this->series[] = array($tDet->elements[0]->title, $tDet->elements[0]->part_number);
      $this->series_names[] = $tDet->elements[0]->title;
    }
        
    //titles
    foreach ($descriptive_detail->childNodes as $xml_fragment) {
      if ($xml_fragment instanceof DOMElement && $xml_fragment->tagName == "TitleDetail") { //find only immediatly children
        $title_detail = new ElibriTitleDetail($xml_fragment);

        if ($title_detail->type == ElibriDictTitleType::DISTINCTIVE_TITLE) {
          //w wyjątkowych sytuacjach książka może mieć tylko tytuł na poziomie kolekcji
          if ($title_detail->product_level()) {
            $this->title = $title_detail->product_level()->title;
            $this->subtitle = $title_detail->product_level()->subtitle;
          }
          if ($title_detail->collection_level()) {
            $this->collection_title = $title_detail->collection_level()->title;
            $this->collection_part = $title_detail->collection_level()->part_number;
          }

          $this->full_title = $title_detail->full_title();

        } else if ($title_detail->type == ElibriDictTitleType::ORIGINAL_TITLE) {
          $this->original_title = $title_detail->full_title();
        } else if ($title_detail->type ==  ElibriDictTitleType::DISTRIBUTORS_TITLE) {
          $this->trade_title = $title_detail->full_title();
        }
        $this->title_details[] = $title_detail;
      }
    }

    //descriptive detail - contributor
    foreach ($descriptive_detail->getElementsByTagName("Contributor") as $xml_fragment) {
      $this->contributors[] = new ElibriContributor($xml_fragment);
    }
        
    //descriptive detail - edition statement
    $this->edition_statement = FirstNodeValue::get($descriptive_detail, "EditionStatement");
        
    //descriptive details - langage
    foreach ($descriptive_detail->getElementsByTagName("Language") as $xml_fragment) {
      $this->languages[] = new ElibriLanguage($xml_fragment);
    }
        
    //descriptive detail - extent
    foreach ($descriptive_detail->getElementsByTagName("Extent") as $xml_fragment) {
      $extent = new ElibriExtent($xml_fragment);
      if ($extent->type == ElibriDictExtentType::PAGE_COUNT) $this->number_of_pages = $extent->value;
      if ($extent->type == ElibriDictExtentType::FILE_SIZE) $this->file_size = $extent->value;
      if ($extent->type == ElibriDictExtentType::DURATION) $this->duration = $extent->value;
      $this->extents[] = $extent;
    }

    //descriptive detail - number of illustrations
    $this->number_of_illustrations = FirstNodeValue::get($descriptive_detail, "NumberOfIllustrations");
        
    //descriptive detail - subject
    foreach ($descriptive_detail->getElementsByTagName("Subject") as $xml_fragment) {
      $this->subjects[] = new ElibriSubject($xml_fragment);
    }
        
    //descriptive detail - audience range
    foreach ($descriptive_detail->getElementsByTagName("AudienceRange") as $xml_fragment) {
       $audience = new ElibriAudienceRange($xml_fragment);

       $this->audience_ranges[$audience->precision_name] = $audience;

       if ($audience->precision == ElibriDictAudienceRangePrecision::FROM) {
         $this->reading_age_from = $audience->value;
       } else if ($audience->precision == ElibriDictAudienceRangePrecision::TO) {
         $this->reading_age_to = $audience->value;
       }
    }

    //formaty plików
    if ($descriptive_detail->getElementsByTagName("ProductFormDetail")->length > 0) {
      $this->digital_formats = array();
      foreach ($descriptive_detail->getElementsByTagName("ProductFormDetail") as $xml_fragment) {
         $code = $xml_fragment->nodeValue;
         $atom = ElibriDictProductFormDetail::byCode($code);
         $this->digital_formats[] = str_replace("MOBIPOCKET", "MOBI", $atom->const_name);
      }
    }
    //zabezpiecznie
    $protection = FirstNodeValue::get($descriptive_detail, "EpubTechnicalProtection");
    if ($protection) {
      $this->technical_protection = ElibriDictEpubTechnicalProtection::byCode($protection)->const_name;
    }

    //informacje o fragmencie
    if ($descriptive_detail->getElementsByTagName("EpubUsageConstraint")->length > 0) {
      $this->excerpt_info = True;
      $status = FirstNodeValue::get($descriptive_detail, "EpubUsageStatus");
      if ($status == ElibriDictEpubUsageStatus::PROHIBITED) {
        $this->excerpt_publishing_allowed = False;   
      } else {
        $this->excerpt_publishing_allowed = True;
        if ($status == ElibriDictEpubUsageStatus::LIMITED) {
          $this->excerpt_publishing_with_limit = True;
          $excerpt_limitation_dom = $descriptive_detail->getElementsByTagName("EpubUsageLimit")->item(0);
          $this->excerpt_limit_quantity = FirstNodeValue::get($excerpt_limitation_dom, "Quantity");
          $this->excerpt_limit_unit = ElibriDictEpubUsageUnit::byCode(FirstNodeValue::get($excerpt_limitation_dom, "EpubUsageUnit"))->const_name;
        } else {
          $this->excerpt_publishing_with_limit = False;
        }
      }
    } else {
      $this->excerpt_info = False;
    }
    
    //issn
    $collection_identifiers = $descriptive_detail->getElementsByTagName("CollectionIdentifier");
    foreach ($collection_identifiers as $collection_identifier) {
    	if (FirstNodeValue::get($collection_identifier, "CollectionIDType") == "02") {
	    	//CollectionIDType == 02 oznacza, że w polu IDValue znajduje się ISSN
    		$issn = FirstNodeValue::get($collection_identifier, "IDValue");
    		if ($issn) {
    			$this->issn_with_hyphens = $issn;
    			$this->issn = preg_replace('/[^0-9xX]/', '', $issn);
    			break;
    		}
    	}
    }
    
  }

  private function computeState() {
    if ($this->notification_type == "01") {
      $this->current_state = 'announced';
    } else if ($this->notification_type == "02") {
      $this->current_state = 'preorder';
    } else {
      if ($this->publishing_status == "04") {
        $this->current_state = 'published';
      } else if ($this->publishing_status == "07") {
        $this->current_state = 'out_of_print';
      }
    }
  }

  //! Jeśli produkt nie ma żadnego autora, to ta metoda zwróci true, inaczej false
  function no_contributors() {
   return  (count($this->contributors) == 0);
  }
  

  //! Jeśli autorzy nie są wymienieni z nazwisko, to zwróć true (praca zbiorowa)
  function unnamed_persons() {
    return (count($this->contributors) && (isset($this->contributors[0]->unnamed_persons)));
  }
  
  function translators() {

    $res = array();
    foreach ($this->contributors as $c) {
      if ($c->role == ElibriDictContributorRole::TRANSLATOR) $res[] = $c->person_name;
    }

    return $res;
  }


  function authors() {
    
    $res = array();
    if ($this->unnamed_persons()) $res[] = "praca zbiorowa"; 
    else {
      foreach ($this->contributors as $c)
        if ($c->role == ElibriDictContributorRole::AUTHOR) $res[] = $c->person_name;
    }
    
    return $res;
  }
}


//! Identyfikator produktu (ISBN, EAN, numer produktu w hurtowniach)
class ElibriProductIdentifier {
  
  //! rodzaj identyfikatora (kod ONIX) - patrz ElibriDictProductIDType
  public $type;

  //! Jeśli typ indenfikatora jest PROPRIETARY, to wartość ta określa nazwę właściciela numeru produktu
  public $type_name;

  //! wartość
  public $value;

  //! rodzaj identyfikatora jako String - np 'PROPRIETARY', 'EAN', 'ISBN13'
  public $identifier_type;

  //! Flaga bool, czy jest to identyfikator hurtowni
  public $proprietary;
    
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->type = $xml_fragment->getElementsByTagName("ProductIDType")->item(0)->nodeValue;
    $this->value = $xml_fragment->getElementsByTagName("IDValue")->item(0)->nodeValue;
    $this->proprietary = ($this->type == ElibriDictProductIDType::PROPRIETARY);
    $this->type_name = FirstNodeValue::get($xml_fragment, "IDTypeName");
    $this->identifier_type = ElibriDictProductIDType::byCode($this->type)->const_name;
  }

}
//! @brief Klasa reprezentująca wymiary produktu
//! @ingroup private
class ElibriMeasure {
    
  //! kategoria wymiaru (kod ONIX) - patrz ElibriDictMeasureType
  public $type;

  //! wartość liczbowa
  public $measurement;

  //! jednostka (używane są mm i gr)
  public $unit;

  //! kategoria wymiaru jako string ('WIDTH', 'HEIGHT', 'DEPTH', 'WEIGHT')
  public $type_name;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->type = $xml_fragment->getElementsByTagName("MeasureType")->item(0)->nodeValue;
    $this->measurement = intval($xml_fragment->getElementsByTagName("Measurement")->item(0)->nodeValue);
    $this->unit = $xml_fragment->getElementsByTagName("MeasureUnitCode")->item(0)->nodeValue;
    $this->type_name = ElibriDictMeasureType::byCode($this->type)->const_name;
  }
}
  
//! Klasa reprezentująca jeden poziom tytułu lub serii
class ElibriTitleElement {

  //! poziom tytułu  (kod ONIX) - patrz ElibriDictTitleElementLevel
  public $level;

  //! część
  public $part_number;

  //! tytuł
  public $title;

  //! podtytuł
  public $subtitle;
 

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->level = $xml_fragment->getElementsByTagName("TitleElementLevel")->item(0)->nodeValue;
    $this->title = $xml_fragment->getElementsByTagName("TitleText")->item(0)->nodeValue;
    $this->part_number = FirstNodeValue::get($xml_fragment, "PartNumber");
    $this->subtitle = FirstNodeValue::get($xml_fragment, "Subtitle");
  }
  
  //! Pełna treść tytułu
  function full_title() {
    $res=$this->title;
      
    if (isset($this->subtitle)) {
      if (substr($res,strlen($res)-1, 1) != ".") {
        $res .= ".";
      }
      $res .= " " . $this->subtitle;
    } 
       
    if (isset($this->part_number)) {
      if (is_numeric($this->part_number)) { 
        $pn = "#".$this->part_number;
      } else {
        $pn = $this->part_number;
      }
      $res .= " (".$pn.")";
     }
    return $res;
       
  }
}
  
//! klasa abstrahująca tytuł jeden z tytułów książki (tytuł właściwy, oryginalny, handlowy)
class ElibriTitleDetail {
    
  //! typ tytułu (kod ONIX) - patrz ElibriDictTitleType
  public $type;

  //! składowe tytułu - lista instancji ElibriTitleElement
  public $elements = array();

  //! typ tytułu jako String - 'DISTINCTIVE_TITLE', 'ORIGINAL_TITLE', 'DISTRIBUTORS_TITLE'
  public $type_name;
    
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->type = $xml_fragment->getElementsByTagName("TitleType")->item(0)->nodeValue;
    $this->type_name = ElibriDictTitleType::byCode($this->type)->const_name;
    
    foreach ($xml_fragment->getElementsByTagName("TitleElement") as $title_element) {
      $this->elements[] = new ElibriTitleElement($title_element);
     }
  }


  //! @brief pełen tytuł
  //! @return String - pełne brzmienie tytułu
  function full_title() {
    $res = "";
    $clt = $this->collection_level_title();
    if (isset($clt)) { 
      $res .= $clt;
    }
      
    $plt = $this->product_level_title();
    if (isset($plt)) {
      if ($res != "") {
        if (substr($res,strlen($res)-1, 1) != ".") {
          $res .= ".";
        }
        $res .= " " . $plt;
      } else {
        $res = $plt;
      }
    }
    return $res;
  }
    
  //! @brief instancja tytułu - na poziomie produktu
  //! @return instancja ElibriTitleElement albo NULL
  function product_level() {
    foreach ($this->elements as $el) {
      if ($el->level == ElibriDictTitleElementLevel::PRODUCT) return $el;
    }
    return NULL;
  }
   
  //! @brief pełen tytuł z poziomu produktu
  //! @return String albo NULL, jeśli brakuje danych
  function product_level_title() {
    $cl = $this->product_level();
    if (isset($cl)) return $cl->full_title(); else return NULL;
  }
    
  //! @brief instancja tytułu - poziom kolekcji
  //! @return instancja ElibriTitleElement albo NULL
  function collection_level() {
    foreach ($this->elements as $el) {
      if ($el->level == ElibriDictTitleElementLevel::COLLECTION) return $el;
    }
    return NULL;
  }
    
  //! @brief pełen tytuł z poziomu kolekcji
  //! @return String albo NULL, jeśli brakuje tytułu na poziomie kolekcji
  function collection_level_title() {
    $cl = $this->collection_level();
    if (isset($cl)) return $cl->full_title(); else return NULL;
  }
}

//! Informacja o kolekcji - czyli jak gdyby serii, która jest częścią tytułu
class ElibriCollection {
  
  //! zawsze '10' - patrz ElibriDictCollectionType   
  public $type;

  //! instance ElibriTitleDetail
  public $title_detail;

  //! zawsze 'PUBLISHER_COLLECTION'
  public $type_name;
    
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->type = $xml_fragment->getElementsByTagName("CollectionType")->item(0)->nodeValue;
    $this->title_detail = new ElibriTitleDetail($xml_fragment->getElementsByTagName("TitleDetail")->item(0));
    $this->type_name = ElibriDictCollectionType::byCode($this->type)->const_name;
  }


  //! Pełen tytuł kolekcji
  function full_title() {
    if (isset($this->title_detail)) {
      return $this->title_detail->full_title();
    }
  }
}
  
//! Klasa reprezentująca osoby tworzące książkę (autor, rysownik itd)
class ElibriContributor extends ElibriAnnotatedObject {
    
  //! numer kolejny
  public $number;

  //! rola (kod ONIX) - patrz ElibriDictContributorRole
  public $role;

  //! pełne imię i nazwisko osoby - pole to zawsze jest obecne
  public $person_name;

  //! dotyczy tylko tłumacza - z jakiego języka nastąpiło tłumaczenie
  public $from_language;

  //! tytuł naukowy
  public $titles_before_names;

  //! imię
  public $names_before_key;

  //! prefix nazwiska (von, van)
  public $prefix_to_key;

  //! nazwisko
  public $key_names;

  //! postfix nazwiska (najczęściej określenie zakonu, np. OP)
  public $names_after_key;

  //! biogram osoby
  public $biographical_note;

  //! true, jeśli praca zbiorowa
  public $unnamed_persons;
  
  //! rola w postaci Stringa - np. 'AUTHOR'
  public $role_name;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {

    parent::__construct($xml_fragment);

    $this->number = FirstNodeValue::get($xml_fragment, "SequenceNumber");
    $this->role = FirstNodeValue::get($xml_fragment, "ContributorRole");
    $this->role_name = ElibriDictContributorRole::byCode($this->role)->const_name;
    if ($this->role == ElibriDictContributorRole::TRANSLATOR) {
      $this->from_language = FirstNodeValue::get($xml_fragment, "FromLanguage");
    }
    $this->person_name = FirstNodeValue::get($xml_fragment, "PersonName");
    $this->titles_before_names = FirstNodeValue::get($xml_fragment, "TitlesBeforeNames");
    $this->names_before_key = FirstNodeValue::get($xml_fragment, "NamesBeforeKey");
    $this->prefix_to_key = FirstNodeValue::get($xml_fragment, "PrefixToKey");
    $this->key_names = FirstNodeValue::get($xml_fragment, "KeyNames");
    $this->names_after_key = FirstNodeValue::get($xml_fragment, "NamesAfterKey");
    $this->biographical_note = FirstNodeValue::get($xml_fragment, "BiographicalNote");
    $this->unnamed_persons = FirstNodeValue::get($xml_fragment, "UnnamedPersons");
  }
}
 
//! Język, w jakim jest napisana książka 
class ElibriLanguage {
    
  //! kontekst, w jakim występuje informacja o języku (kod ONIX) - patrz  ElibriDictLanguageRole
  public $role;
  
  //! kod języka
  public $code;

  //! kontekst w postaci Stringa - np. 'LANGUAGE_OF_TEXT'
  public $role_name;

  //! język - po polsku - patrz ElibriDictLanguageCode, np. 'polski'
  public $language;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->role = $xml_fragment->getElementsByTagName("LanguageRole")->item(0)->nodeValue;
    $this->code = $xml_fragment->getElementsByTagName("LanguageCode")->item(0)->nodeValue;
    $this->role_name = ElibriDictLanguageRole::byCode($this->role)->const_name;
    $this->language = ElibriDictLanguageCode::byCode($this->code)->name["pl"];
  }
}

//! Dodatkowe wartości liczbowe opisujące produkt
class ElibriExtent {
    
  //! rodzaj wartości (kod ONIX) - patrz ElibriDictExtentType
  public $type;

  //! wartość liczbowa
  public $value;

  //! jednostka, w której jest wyrażona watość (kod ONIX) - patrz ElibriDictExtentUnit
  public $unit;
   
  //! rodzaj wartości jako String, np. 'PAGE_COUNT' 
  public $type_name;

  //! jednostka, jako String, np. 'PAGES'
  public $unit_name;
    
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->type = FirstNodeValue::get($xml_fragment, "ExtentType");
    $this->value = FirstNodeValue::get($xml_fragment, "ExtentValue");
    $this->unit = FirstNodeValue::get($xml_fragment, "ExtentUnit");

    $this->type_name = ElibriDictExtentType::byCode($this->type)->const_name;
    $this->unit_name = ElibriDictExtentUnit::byCode($this->unit)->const_name;

  }
}

//! Klasa abstrahująca kategorię, do której został przypisany produkt
class ElibriSubject {
    
  public $scheme_identifier;
  public $scheme_name;
  public $scheme_version;
  public $code;
  public $heading_text;
  public $main_subject;
 
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->main_subject = FirstNodeValue::get($xml_fragment, "MainSubject");
    $this->scheme_identifier = FirstNodeValue::get($xml_fragment, "SubjectSchemeIdentifier");
    $this->scheme_name = FirstNodeValue::get($xml_fragment, "SubjectSchemeName");
    $this->scheme_version = FirstNodeValue::get($xml_fragment, "SubjectSchemeVersion");
    $this->code = FirstNodeValue::get($xml_fragment, "SubjectCode");
    $this->heading_text = FirstNodeValue::get($xml_fragment, "SubjectHeadingText");
  }
}
 
//! Wiek czytelnika - od .. do
class ElibriAudienceRange {
    
  //! Tylko '18' - wiek czytelnika (kod ONIX) - patrz ElibriDictAudienceRangeQualifier
  public $qualifier;

  //! '03' lub '04'  (kod ONIX) - patrz ElibriDictAudienceRangePrecision
  public $precision;

  //! wartość (wiek)
  public $value;
 
  //! stała - tylko 'READING_AGE'
  public $precision_name;

  //! stała: 'FROM' albo 'TO'
  public $qulifier_name;
    
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->qualifier = $xml_fragment->getElementsByTagName("AudienceRangeQualifier")->item(0)->nodeValue;
    $this->qulifier_name = ElibriDictAudienceRangeQualifier::byCode($this->qualifier)->const_name;
    $this->precision = $xml_fragment->getElementsByTagName("AudienceRangePrecision")->item(0)->nodeValue;
    $this->precision_name = ElibriDictAudienceRangePrecision::byCode($this->precision)->const_name;
    $this->value = $xml_fragment->getElementsByTagName("AudienceRangeValue")->item(0)->nodeValue;
  }
}

//! @brief Klasa reprezentuje teksty towarzyszące produktowi
class ElibriTextContent extends ElibriAnnotatedObject {
    
  //! rodzaj tekstu (kod ONIX) - patrz ElibriDictOtherTextType
  public $type;

  //! autor - tylko w przypadku recenzji
  public $author;

  //! treść
  public $text;

  //! rodzaj tekstu jako string, np. 'MAIN_DESCRIPTION'
  public $type_name;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    parent::__construct($xml_fragment);

    $this->type = FirstNodeValue::get($xml_fragment, "TextType");
    $this->type_name = ElibriDictOtherTextType::byCode($this->type)->const_name;
    $this->text = trim(FirstNodeValue::get($xml_fragment, "Text")); 
    $this->author = FirstNodeValue::get($xml_fragment, "TextAuthor");
  }
}
  
//! @brief Klasa reprezentuje pliki dołączone do produktu, np. okładka
class ElibriSupportingResource extends ElibriAnnotatedObject {

  //! rodzaj zawartości (kod ONIX) - patrz ElibriDictResourceContentType
  public $content_type;

  //! ograniczenia w rozpowszechnianiu - w tej chwili tylko '00' - bez ograniczeń (kod ONIX) - patrz ElibriDictContentAudience
  public $audience;

  //! typ zawartości: audio, tekst, obrazek (kod ONIX) - patrz ElibriDictResourceMode
  public $mode;

  //! zawsze '02' - plik do ściągnięcia (kod ONIX) - patrz ElibriDictResourceForm
  public $form;

  //! URL z plikiem - do ściągnięcia
  public $link;
   
  //! rodzaj zawartości - jako string, np. 'FRONT_COVER'
  public $content_type_name;

  //! w tej chwili zawsze 'UNRESTRICTED'
  public $audience_name;

  //! rodzaj zawartości jako string, np. 'AUDIO'
  public $mode_name;

  //! zawsze 'DOWNLOADABLE_FILE'
  public $form_name;
    
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    parent::__construct($xml_fragment);

    $this->content_type = $xml_fragment->getElementsByTagName("ResourceContentType")->item(0)->nodeValue;
    $this->content_type_name = ElibriDictResourceContentType::byCode($this->content_type)->const_name;
    $this->audience = $xml_fragment->getElementsByTagName("ContentAudience")->item(0)->nodeValue;
    $this->audience_name = ElibriDictContentAudience::byCode($this->audience)->const_name;
    $this->mode = $xml_fragment->getElementsByTagName("ResourceMode")->item(0)->nodeValue;
    $this->mode_name = ElibriDictResourceMode::byCode($this->mode)->const_name;
    $this->form = $xml_fragment->getElementsByTagName("ResourceVersion")->item(0)->getElementsByTagName("ResourceForm")->item(0)->nodeValue;
    $this->form_name = ElibriDictResourceForm::byCode($this->form)->const_name;
    $this->link = $xml_fragment->getElementsByTagName("ResourceVersion")->item(0)->getElementsByTagName("ResourceLink")->item(0)->nodeValue;
  }   
}
  
//! Klasa reprezentująca nazwę imprintu
class ElibriImprint {

  //! Nazwa imprintu
  public $name;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->name = FirstNodeValue::get($xml_fragment, "ImprintName");
  }
}
  
//! Klasa reprezentująca nazwę wydawnictwa
class ElibriPublisher {
    
  //! rola wydawnictwa - w tej chwili tylko '01' - główny wydawca (kod ONIX)
  public $role;
 
  //! nazwa wydawnictwa
  public $name;

  //! numeryczne ID wydawnictwa w systemie eLibri
  public $id;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {

    $this->role = FirstNodeValue::get($xml_fragment, "PublishingRole");
    $this->name = FirstNodeValue::get($xml_fragment, "PublisherName");
    $identifier_nodes = $xml_fragment->getElementsByTagName("PublisherIdentifier");
    if ($identifier_nodes->length > 0) {
      $this->id = FirstNodeValue::get($xml_fragment->getElementsByTagName("PublisherIdentifier")->item(0), "IDValue", true);
    }
  }
}
  
class ElibriPublishingDate {
   
  public $role;
  public $format;
  public $date;
    
  public $format_name;
  public $parsed;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->role = FirstNodeValue::get($xml_fragment, "PublishingDateRole");
    $this->format = FirstNodeValue::get($xml_fragment, "DateFormat");
    $this->date = FirstNodeValue::get($xml_fragment, "Date");

    $this->format_name = ElibriDictDateFormat::byCode($this->format)->const_name;
    $this->parsed =  ElibriPublishingDate::parseDate($this->date, $this->format_name);
  }

  public static function parseDate($date, $format) {
    switch ($format) {
      case 'YYYYMMDD': return array(substr($date, 0, 4), substr($date,4,2), substr($date, 6, 2)); 
      case 'YYYYMM': return array(substr($date, 0, 4), substr($date, 4, 2)); 
      case 'YYYY': return array(substr($date, 0, 4)); 
    }
  }

}

//! Informacja o restrykcji w sprzedaży, np. dwutygodniowej wyłączności w empiku
class ElibriSalesRestriction {
 
  //! Rodzaj wyłączności (kod ONIX) - patrz ElibriDictSalesRestrictionType (zawsze RETAILER_EXCLUSIVE = '04')
  public $type;

  //! Nazwa sieci, która posiada wyłączność
  public $outlet_name;

  //! Data końca wyłączności, jako YYYYMMDD
  public $end_date;

  //! Data końca wyłączności, jako instancja DateTime
  public $end_date_as_datetime;

  //! Rodzaj wyłączności jako String - zawsze RETAILER_EXCLUSIVE 
  public $type_name;
 
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->type = $xml_fragment->getElementsByTagName("SalesRestrictionType")->item(0)->nodeValue;
    $this->type_name = ElibriDictSalesRestrictionType::byCode($this->type)->const_name;
    $this->outlet_name = $xml_fragment->getElementsByTagName("SalesOutlet")->item(0)->getElementsByTagName("SalesOutletName")->item(0)->nodeValue;
    $this->end_date = $xml_fragment->getElementsByTagName("EndDate")->item(0)->nodeValue;
    $this->end_date_as_datetime = new DateTime(substr($this->end_date, 0, 4) . "-" . substr($this->end_date, 4, 2) . "-" . substr($this->end_date, 6, 2));
  }
}


//! Klasa reprezentująca informację o fragmencie utworu (produkty cyfrowe)
class ElibriExcerptInfo {
  //! wielkość pliku w bajtach
  public $file_size; 

  //! rodzaj pliku, przybiera następujące wartości: mobi_excerpt, epub_excerpt, pdf_excerpt, mp3_excerpt
  public $file_type;

  //! numeryczne id pliku w elibri
  public $id;

  //! md5 pliku
  public $md5;

  //! data ostatniej zmiany pliku
  public $updated_at;

  //! link do pliku
  public $link;

  function __construct($node) {
     $this->file_size = $node->getAttribute("file_size");
     $this->file_type = $node->getAttribute("file_type");
     $this->id = $node->getAttribute("id");
     $this->md5 = $node->getAttribute("md5");
     $this->updated_at = new DateTime($node->getAttribute("updated_at"));
     $this->link = $node->nodeValue;
  }
}

//! Klasa reprezentująca informację o plikach master (produkty cyfrowe)
class ElibriFileInfo {
  //! wielkość pliku w bajtach
  public $file_size;

  //! rodzaj pliku, przybiera następujące wartości: mobi, epub, pdf, mp3_in_zip
  public $file_type;

  //! numeryczne id pliku w elibri
  public $id;

  //! md5 pliku
  public $md5;

  //! data ostatniej zmiany pliku
  public $updated_at;

  function __construct($node) {
     $this->file_size = $node->getAttribute("file_size");
     $this->file_type = $node->getAttribute("file_type");
     $this->id = $node->getAttribute("id");
     $this->md5 = $node->getAttribute("md5");
     $this->updated_at = new DateTime($node->getAttribute("updated_at"));
  }
}


class ElibriRelatedProduct {
    
  public $relation_code;
  public $identifiers = array();
  public $isbn13;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->relation_code = FirstNodeValue::get($xml_fragment, "ProductRelationCode");
    $ids = $xml_fragment->getElementsByTagName("ProductIdentifier");

    foreach ($ids as $prid) {
      $pid = new ElibriProductIdentifier($prid);
      $this->identifiers[] = $pid;
    }

    foreach ($this->identifiers as $rid) {
      if ($rid->identifier_type == "ISBN13") {
        $this->isbn13=$rid->value;
      }
    }
  }
}
 
//! Klasa reprezentuje cenę książki w kanale dystrybucji 
class ElibriPrice {
    
  public $type;
  public $type_name;
  public $minimum_order_quantity;
  public $amount;
  public $currency_code;
  public $printed_on_product;
  public $printed_on_product_name;
  public $position_on_product;
  public $tax_type;
  public $tax_rate_percent;
  public $vat;
    
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->type = FirstNodeValue::get($xml_fragment, "PriceType");
    $this->type_name = ElibriDictPriceTypeCode::byCode($this->type)->const_name;
    $this->minimum_order_quantity = FirstNodeValue::get($xml_fragment, "MinimumOrderQuantity", true);
    $this->amount = floatval($xml_fragment->getElementsByTagName("PriceAmount")->item(0)->nodeValue);
    $this->tax_type = intval($xml_fragment->getElementsByTagName("Tax")->item(0)->getElementsByTagName("TaxType")->item(0)->nodeValue);
    $this->tax_rate_percent = intval($xml_fragment->getElementsByTagName("Tax")->item(0)->getElementsByTagName("TaxRatePercent")->item(0)->nodeValue);

    if ($this->tax_type == 1) {
      $this->vat = $this->tax_rate_percent;
    }

    $this->currency_code = FirstNodeValue::get($xml_fragment, "CurrencyCode");
    $this->printed_on_product = FirstNodeValue::get($xml_fragment, "PrintedOnProduct");
    if ($this->printed_on_product) {
      $this->printed_on_product_name = ElibriDictPricePrintedOnProduct::byCode($this->printed_on_product)->const_name;
    }

  }
}
  

//! Klasa reprezentująca identyfikator dostawcy 
class ElibriSupplierIdentifier {
  
  public $type;
  public $type_name;
  public $value;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->type = FirstNodeValue::get($xml_fragment, "SupplierIDType");
    $this->type_name = FirstNodeValue::get($xml_fragment, "IDTypeName");
    $this->value = FirstNodeValue::get($xml_fragment, "IDValue");
  }
} 
  
//! Klasa reprezentująca dostawcę
class ElibriSupplier {
    
  public $role;
  public $identifiers = array();
  public $name;
  public $telephone_numer;
  public $email_address;
  public $website;
    
  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->role = FirstNodeValue::get($xml_fragment, "SupplierRole");
        
    foreach ($xml_fragment->getElementsByTagName("SupplierIdentifier") as $xsupid) {
      $this->identifiers[] = new ElibriSupplierIdentifier($xsupid);
    }
        
    $this->name =  FirstNodeValue::get($xml_fragment, "SupplierName");
    $this->telephone_number = FirstNodeValue::get($xml_fragment, "TelephoneNumber");
    $this->email_address =  FirstNodeValue::get($xml_fragment, "EmailAddress");
    if ($xml_fragment->getElementsByTagName("Website")->length > 0) {
      $this->website = $xml_fragment->getElementsByTagName("Website")->item(0)->getElementsByTagName("WebsiteLink")->item(0)->nodeValue;
    }
  }

  function nip() {
    foreach ($this->identifiers as $id)
      if ($id->type_name=='NIP') return $id->value;
    return NULL;
  }
}
  
//! Klasa reprezentująca informację o dostępnej ilości produktu
class ElibriStockQuantityCoded {
    
  public $code_type;
  public $code;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    if ($xml_fragment->length > 0) {
      $this->code_type = FirstNodeValue::get($xml_fragment->item(0), "StockQuantityCodeType");
      $this->code = FirstNodeValue::get($xml_fragment->item(0), "StockQuantityCode");
    }
  }
    
} 
  
class ElibriSupplyDetail {
    
  public $relation_code;
  public $supplier;
  public $product_availability;

  //! Jedna z wartości ElibriDictProductAvailabilityType
  public $product_availability_name;
  public $pack_quantity;
  public $price;
  public $on_hand;
  public $quatity_coded;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $supplier = new ElibriSupplier($xml_fragment->getElementsbyTagName("Supplier")->item(0));

    $this->supplier = $supplier;
        
    $this->product_availability = FirstNodeValue::get($xml_fragment, "ProductAvailability");
    $this->product_availability_name = ElibriDictProductAvailabilityType::byCode($this->product_availability)->const_name;
        
    $xstock = $xml_fragment->getElementsByTagName("Stock")->item(0);
	  
    if ($xstock) {
        $this->quantity_coded = new ElibriStockQuantityCoded($xstock->getElementsByTagName("StockQuantityCoded"));	    
        if ($xstock->getElementsByTagName("OnHand")->length > 0) {
          $this->on_hand = FirstNodeValue::get($xstock, "OnHand", true);
        }       
    }

    $this->pack_quantity = FirstNodeValue::get($xml_fragment, "PackQuantity", true);
    $this->price = new ElibriPrice($xml_fragment->getElementsByTagName("Price")->item(0));
  }
}

//! Klasa reprezentująca dane osoby wysyłającej z nagłówka ONIX
class ElibriSender {
    
  //! Nadawca wiadomości 
  public $sender_name;

  //! Osoba kontaktowa
  public $contact_name;
  
  //! E-mail kontaktowy
  public $email_address;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->sender_name = FirstNodeValue::get($xml_fragment, "SenderName");
    $this->contact_name = FirstNodeValue::get($xml_fragment, "ContactName");
    $this->email_address = FirstNodeValue::get($xml_fragment, "EmailAddress");
  }
    
}

//! Klasa reprezentująca dane nagłówka ONIX
class ElibriHeader {
    
  //! Data i czas wygenerowania wiadomości
  public $sent_date_time;

  //! instancja ElibriSender
  public $sender;

  //! Konstruuj obiekt na bazie fragmentu xml-a
  function __construct($xml_fragment) {
    $this->sender = new ElibriSender($xml_fragment->item(0)->getElementsByTagName("Sender")->item(0));
    $this->sent_date_time = FirstNodeValue::get($xml_fragment->item(0), "SentDateTime");
  }
}
  
?>
