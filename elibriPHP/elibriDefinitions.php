<?php
//this is generated file
//please do not modify directly
//to regenarate run 'ruby tools/generate_dictionary.rb'
//! @defgroup dictionaries Słowniki
//! @{
//! Słowniki mapują kody ONIX-a na stałe i Stringi, w celu zwiększenia czytelności kodu
//! @}

//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictResourceMode extends  ElibriDictElement {

  private static $instance;

  //! audio
  const AUDIO = '02';

  //! obrazek
  const IMAGE = '03';

  //! tekst
  const TEXT = '04';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('02', array('pl' => 'audio', 'en' => 'audio'), 'AUDIO'),
          new ElibriDictAtom('03', array('pl' => 'obrazek', 'en' => 'image'), 'IMAGE'),
          new ElibriDictAtom('04', array('pl' => 'tekst', 'en' => 'text'), 'TEXT'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictResourceMode();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictProductIDType extends  ElibriDictElement {

  private static $instance;

  //! własnościowy
  const PROPRIETARY = '01';

  //! EAN
  const EAN = '03';

  //! ISBN-13
  const ISBN13 = '15';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'własnościowy', 'en' => 'proprietary'), 'PROPRIETARY'),
          new ElibriDictAtom('03', array('pl' => 'EAN', 'en' => 'EAN'), 'EAN'),
          new ElibriDictAtom('15', array('pl' => 'ISBN-13', 'en' => 'ISBN-13'), 'ISBN13'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductIDType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictDateFormat extends  ElibriDictElement {

  private static $instance;

  //! RRRRMMDD
  const YYYYMMDD = '00';

  //! RRRRMM
  const YYYYMM = '01';

  //! RRRR
  const YYYY = '05';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'RRRRMMDD', 'en' => 'YYYYMMDD'), 'YYYYMMDD'),
          new ElibriDictAtom('01', array('pl' => 'RRRRMM', 'en' => 'YYYYMM'), 'YYYYMM'),
          new ElibriDictAtom('05', array('pl' => 'RRRR', 'en' => 'YYYY'), 'YYYY'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictDateFormat();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictResourceContentType extends  ElibriDictElement {

  private static $instance;

  //! okładka (przód)
  const FRONT_COVER = '01';

  //! okładka (tył)
  const BACK_COVER = '02';

  //! wywiad z autorem
  const AUTHOR_INTERVIEW = '11';

  //! fragment książki czytany przez autora
  const AUTHOR_READING = '13';

  //! fragment książki lub audiobook-a
  const SAMPLE_CONTENT = '15';

  //! recenzja
  const REVIEW = '17';

  //! mediapack
  const PRESS_RELEASE = '24';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'okładka (przód)', 'en' => 'front cover'), 'FRONT_COVER'),
          new ElibriDictAtom('02', array('pl' => 'okładka (tył)', 'en' => 'back cover'), 'BACK_COVER'),
          new ElibriDictAtom('11', array('pl' => 'wywiad z autorem', 'en' => 'author interview'), 'AUTHOR_INTERVIEW'),
          new ElibriDictAtom('13', array('pl' => 'fragment książki czytany przez autora', 'en' => 'author reading'), 'AUTHOR_READING'),
          new ElibriDictAtom('15', array('pl' => 'fragment książki lub audiobook-a', 'en' => 'sample content'), 'SAMPLE_CONTENT'),
          new ElibriDictAtom('17', array('pl' => 'recenzja', 'en' => 'review'), 'REVIEW'),
          new ElibriDictAtom('24', array('pl' => 'mediapack', 'en' => 'press release'), 'PRESS_RELEASE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictResourceContentType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictContributorRole extends  ElibriDictElement {

  private static $instance;

  //! autor
  const AUTHOR = 'A01';

  //! współautor
  const GHOSTWRITER = 'A02';

  //! scenarzysta
  const SCENARIST = 'A03';

  //! pomysłodawca
  const ORIGINATOR = 'A10';

  //! ilustrator
  const ILLUSTRATOR = 'A12';

  //! fotograf
  const PHOTOGRAPHER = 'A13';

  //! autor wstępu
  const AUTHOR_OF_PREFACE = 'A15';

  //! rysownik
  const DRAWER = 'A35';

  //! projektant okładki
  const COVER_DESIGNER = 'A36';

  //! tusz/kolor
  const INKED_OR_COLORED_BY = 'A40';

  //! redaktor
  const EDITOR = 'B01';

  //! korektor
  const REVISOR = 'B02';

  //! tłumacz
  const TRANSLATOR = 'B06';

  //! redaktor naczelny
  const EDITOR_IN_CHIEF = 'B11';

  //! lektor
  const READ_BY = 'E07';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('A01', array('pl' => 'autor', 'en' => 'author'), 'AUTHOR'),
          new ElibriDictAtom('A02', array('pl' => 'współautor', 'en' => 'ghostwriter'), 'GHOSTWRITER'),
          new ElibriDictAtom('A03', array('pl' => 'scenarzysta', 'en' => 'scenarist'), 'SCENARIST'),
          new ElibriDictAtom('A10', array('pl' => 'pomysłodawca', 'en' => 'originator'), 'ORIGINATOR'),
          new ElibriDictAtom('A12', array('pl' => 'ilustrator', 'en' => 'illustrator'), 'ILLUSTRATOR'),
          new ElibriDictAtom('A13', array('pl' => 'fotograf', 'en' => 'photographer'), 'PHOTOGRAPHER'),
          new ElibriDictAtom('A15', array('pl' => 'autor wstępu', 'en' => 'author of preface'), 'AUTHOR_OF_PREFACE'),
          new ElibriDictAtom('A35', array('pl' => 'rysownik', 'en' => 'drawer'), 'DRAWER'),
          new ElibriDictAtom('A36', array('pl' => 'projektant okładki', 'en' => 'cover designer'), 'COVER_DESIGNER'),
          new ElibriDictAtom('A40', array('pl' => 'tusz/kolor', 'en' => 'inked or colored by'), 'INKED_OR_COLORED_BY'),
          new ElibriDictAtom('B01', array('pl' => 'redaktor', 'en' => 'editor'), 'EDITOR'),
          new ElibriDictAtom('B02', array('pl' => 'korektor', 'en' => 'revisor'), 'REVISOR'),
          new ElibriDictAtom('B06', array('pl' => 'tłumacz', 'en' => 'translator'), 'TRANSLATOR'),
          new ElibriDictAtom('B11', array('pl' => 'redaktor naczelny', 'en' => 'editor-in-chief'), 'EDITOR_IN_CHIEF'),
          new ElibriDictAtom('E07', array('pl' => 'lektor', 'en' => 'read by'), 'READ_BY'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictContributorRole();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictResourceForm extends  ElibriDictElement {

  private static $instance;

  //! plik do pobrania
  const DOWNLOADABLE_FILE = '02';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('02', array('pl' => 'plik do pobrania', 'en' => 'downloadable file'), 'DOWNLOADABLE_FILE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictResourceForm();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictAudienceRangeQualifier extends  ElibriDictElement {

  private static $instance;

  //! wiek czytelnika
  const READING_AGE = '18';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('18', array('pl' => 'wiek czytelnika', 'en' => 'reading age'), 'READING_AGE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictAudienceRangeQualifier();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictLanguageCode extends  ElibriDictElement {

  private static $instance;


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('afr', array('pl' => 'afrikaans', 'en' => 'afrikaans'), NULL),
          new ElibriDictAtom('ara', array('pl' => 'arabski', 'en' => 'arabic'), NULL),
          new ElibriDictAtom('arm', array('pl' => 'armeński', 'en' => 'Armenian'), NULL),
          new ElibriDictAtom('aze', array('pl' => 'azerbejdżański', 'en' => 'Azerbaijani'), NULL),
          new ElibriDictAtom('bel', array('pl' => 'białoruski', 'en' => 'Belarusian'), NULL),
          new ElibriDictAtom('ben', array('pl' => 'bengalski', 'en' => 'Bengali'), NULL),
          new ElibriDictAtom('bos', array('pl' => 'bośniacki', 'en' => 'Bosnian'), NULL),
          new ElibriDictAtom('bul', array('pl' => 'bułgarski', 'en' => 'Bulgarian'), NULL),
          new ElibriDictAtom('che', array('pl' => 'czeczeński', 'en' => 'Chechen'), NULL),
          new ElibriDictAtom('chi', array('pl' => 'chiński', 'en' => 'Chinese'), NULL),
          new ElibriDictAtom('csb', array('pl' => 'kaszubski', 'en' => 'Kashubian'), NULL),
          new ElibriDictAtom('cze', array('pl' => 'czeski', 'en' => 'Czech'), NULL),
          new ElibriDictAtom('dan', array('pl' => 'duński', 'en' => 'Danish'), NULL),
          new ElibriDictAtom('dut', array('pl' => 'niederlandzki; flamandzki', 'en' => 'Dutch'), NULL),
          new ElibriDictAtom('egy', array('pl' => 'egipski', 'en' => 'Egyptian'), NULL),
          new ElibriDictAtom('eng', array('pl' => 'angielski', 'en' => 'English'), NULL),
          new ElibriDictAtom('epo', array('pl' => 'Esperanto', 'en' => 'Esperanto'), NULL),
          new ElibriDictAtom('fin', array('pl' => 'fiński', 'en' => 'Finnish'), NULL),
          new ElibriDictAtom('fre', array('pl' => 'francuski', 'en' => 'French'), NULL),
          new ElibriDictAtom('ger', array('pl' => 'niemiecki', 'en' => 'German'), NULL),
          new ElibriDictAtom('gle', array('pl' => 'irlandzki', 'en' => 'Irish'), NULL),
          new ElibriDictAtom('heb', array('pl' => 'hebrajski', 'en' => 'Hebrew'), NULL),
          new ElibriDictAtom('hin', array('pl' => 'hindi', 'en' => 'Hindi'), NULL),
          new ElibriDictAtom('hrv', array('pl' => 'chorwacki', 'en' => 'Croatian'), NULL),
          new ElibriDictAtom('hun', array('pl' => 'węgierski', 'en' => 'Hungarian'), NULL),
          new ElibriDictAtom('ira', array('pl' => 'irański', 'en' => 'Iranian languages'), NULL),
          new ElibriDictAtom('ita', array('pl' => 'włoski', 'en' => 'Italian'), NULL),
          new ElibriDictAtom('jpn', array('pl' => 'japoński', 'en' => 'Japanese'), NULL),
          new ElibriDictAtom('lat', array('pl' => 'łaciński', 'en' => 'Latin'), NULL),
          new ElibriDictAtom('lav', array('pl' => 'łotewski', 'en' => 'Latvian'), NULL),
          new ElibriDictAtom('lit', array('pl' => 'litewski', 'en' => 'Lithuanian'), NULL),
          new ElibriDictAtom('ltz', array('pl' => 'luksemburski', 'en' => 'Luxembourgish; Letzeburgesch'), NULL),
          new ElibriDictAtom('mol', array('pl' => 'mołdawski', 'en' => 'Moldavian'), NULL),
          new ElibriDictAtom('mon', array('pl' => 'mongolski', 'en' => 'Mongolian'), NULL),
          new ElibriDictAtom('nap', array('pl' => 'neapolitański', 'en' => 'Neapolitan'), NULL),
          new ElibriDictAtom('nep', array('pl' => 'nepalski', 'en' => 'Nepali'), NULL),
          new ElibriDictAtom('nor', array('pl' => 'norweski', 'en' => 'Norwegian'), NULL),
          new ElibriDictAtom('per', array('pl' => 'perski', 'en' => 'Persian'), NULL),
          new ElibriDictAtom('pol', array('pl' => 'polski', 'en' => 'Polish'), NULL),
          new ElibriDictAtom('por', array('pl' => 'portugalski', 'en' => 'Portuguese'), NULL),
          new ElibriDictAtom('rum', array('pl' => 'rumuński', 'en' => 'Romanian'), NULL),
          new ElibriDictAtom('rus', array('pl' => 'rosyjski', 'en' => 'Russian'), NULL),
          new ElibriDictAtom('slo', array('pl' => 'słowacki', 'en' => 'Slovak'), NULL),
          new ElibriDictAtom('slv', array('pl' => 'słoweński', 'en' => 'Slovenian'), NULL),
          new ElibriDictAtom('spa', array('pl' => 'hiszpański', 'en' => 'Spanish'), NULL),
          new ElibriDictAtom('srp', array('pl' => 'serbski', 'en' => 'Serbian'), NULL),
          new ElibriDictAtom('swe', array('pl' => 'szwedzki', 'en' => 'Swedish'), NULL),
          new ElibriDictAtom('syr', array('pl' => 'syryjski', 'en' => 'Syriac'), NULL),
          new ElibriDictAtom('tur', array('pl' => 'turecki', 'en' => 'Turkish'), NULL),
          new ElibriDictAtom('ukr', array('pl' => 'ukraiński', 'en' => 'Ukrainian'), NULL),
          new ElibriDictAtom('vie', array('pl' => 'wietnamski', 'en' => 'Vietnamese'), NULL),
          new ElibriDictAtom('alb', array('pl' => 'albański', 'en' => 'Albanian'), NULL),
          new ElibriDictAtom('baq', array('pl' => 'baskijski', 'en' => 'Basque'), NULL),
          new ElibriDictAtom('est', array('pl' => 'estoński', 'en' => 'Estonian'), NULL),
          new ElibriDictAtom('gre', array('pl' => 'grecki nowożytny', 'en' => 'Greek, Modern (1453-)'), NULL),
          new ElibriDictAtom('geo', array('pl' => 'gruziński', 'en' => 'Georgian'), NULL),
          new ElibriDictAtom('ice', array('pl' => 'islandzki', 'en' => 'Icelandic'), NULL),
          new ElibriDictAtom('yid', array('pl' => 'jidisz', 'en' => 'Yiddish'), NULL),
          new ElibriDictAtom('cat', array('pl' => 'kataloński', 'en' => 'Catalan'), NULL),
          new ElibriDictAtom('kor', array('pl' => 'koreański', 'en' => 'Korean'), NULL),
          new ElibriDictAtom('mac', array('pl' => 'macedoński', 'en' => 'Macedonian'), NULL),
          new ElibriDictAtom('arm', array('pl' => 'armeński', 'en' => 'Armenian'), NULL),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictLanguageCode();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictSalesRestrictionType extends  ElibriDictElement {

  private static $instance;

  //! sprzedaż z wyłącznością dla detalisty
  const RETAILER_EXCLUSIVE = '04';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('04', array('pl' => 'sprzedaż z wyłącznością dla detalisty', 'en' => 'retailer exclusive'), 'RETAILER_EXCLUSIVE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictSalesRestrictionType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictExtentUnit extends  ElibriDictElement {

  private static $instance;

  //! strony
  const PAGES = '03';

  //! minuty
  const MINUTES = '05';

  //! megabajty
  const MEGABYTES = '19';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('03', array('pl' => 'strony', 'en' => 'pages'), 'PAGES'),
          new ElibriDictAtom('05', array('pl' => 'minuty', 'en' => 'minutes'), 'MINUTES'),
          new ElibriDictAtom('19', array('pl' => 'megabajty', 'en' => 'megabytes'), 'MEGABYTES'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictExtentUnit();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictPublishingStatusCode extends  ElibriDictElement {

  private static $instance;

  //! nieokreślony
  const UNSPECIFIED = '00';

  //! anulowany
  const CANCELLED = '01';

  //! nadchodzący
  const FORTHCOMING = '02';

  //! w sprzedaży
  const ACTIVE = '04';

  //! nakład wyczerpany
  const OUT_OF_PRINT = '07';

  //! niedostępny
  const UNAVAILABLE = '08';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'nieokreślony', 'en' => 'unspecified'), 'UNSPECIFIED'),
          new ElibriDictAtom('01', array('pl' => 'anulowany', 'en' => 'cancelled'), 'CANCELLED'),
          new ElibriDictAtom('02', array('pl' => 'nadchodzący', 'en' => 'forthcoming'), 'FORTHCOMING'),
          new ElibriDictAtom('04', array('pl' => 'w sprzedaży', 'en' => 'active'), 'ACTIVE'),
          new ElibriDictAtom('07', array('pl' => 'nakład wyczerpany', 'en' => 'out of print'), 'OUT_OF_PRINT'),
          new ElibriDictAtom('08', array('pl' => 'niedostępny', 'en' => 'inactive'), 'UNAVAILABLE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictPublishingStatusCode();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictMeasureType extends  ElibriDictElement {

  private static $instance;

  //! wysokość
  const HEIGHT = '01';

  //! szerokość
  const WIDTH = '02';

  //! grubość
  const THICKNESS = '03';

  //! masa
  const WEIGHT = '08';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'wysokość', 'en' => 'height'), 'HEIGHT'),
          new ElibriDictAtom('02', array('pl' => 'szerokość', 'en' => 'width'), 'WIDTH'),
          new ElibriDictAtom('03', array('pl' => 'grubość', 'en' => 'thickness'), 'THICKNESS'),
          new ElibriDictAtom('08', array('pl' => 'masa', 'en' => 'weight'), 'WEIGHT'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictMeasureType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictProductAvailabilityType extends  ElibriDictElement {

  private static $instance;

  //! na stanie
  const IN_STOCK = '21';

  //! niedostępne
  const NOT_AVAILABLE = '40';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('21', array('pl' => 'na stanie', 'en' => 'in stock'), 'IN_STOCK'),
          new ElibriDictAtom('40', array('pl' => 'niedostępne', 'en' => 'not available'), 'NOT_AVAILABLE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductAvailabilityType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictPriceTypeCode extends  ElibriDictElement {

  private static $instance;

  //! sugerowana cena detaliczna brutto
  const RRP_WITH_TAX = '02';

  //! sugerowana cena detaliczna netto
  const RRP_WITHOUT_TAX = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('02', array('pl' => 'sugerowana cena detaliczna brutto', 'en' => 'RRP including tax'), 'RRP_WITH_TAX'),
          new ElibriDictAtom('01', array('pl' => 'sugerowana cena detaliczna netto', 'en' => 'RRP excluding tax'), 'RRP_WITHOUT_TAX'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictPriceTypeCode();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictProductFormCode extends  ElibriDictElement {

  private static $instance;

  //! książka
  const BOOK = 'BA';

  //! e-book
  const EBOOK = 'EA';

  //! nagranie audio
  const AUDIO_RECORDING = 'AA';

  //! kaseta magnetofonowa
  const AUDIO_CASSETTE = 'AB';

  //! audio CD
  const AUDIO_CD = 'AC';

  //! audio DVD
  const AUDIO_DVD = 'AI';

  //! mapa
  const SHEET_MAP = 'CA';

  //! mapa składana
  const SHEET_MAP_FOLDED = 'CB';

  //! mapa płaska
  const SHEET_MAP_FLAT = 'CC';

  //! mapa w rolce
  const SHEET_MAP_ROLLED = 'CD';

  //! inny format kartograficzny
  const OTHER_CARTOGRAPHIC = 'CZ';

  //! kalendarz
  const CALENDAR = 'PC';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('BA', array('pl' => 'książka', 'en' => 'book'), 'BOOK'),
          new ElibriDictAtom('EA', array('pl' => 'e-book', 'en' => 'e-book'), 'EBOOK'),
          new ElibriDictAtom('AA', array('pl' => 'nagranie audio', 'en' => 'audio recording'), 'AUDIO_RECORDING'),
          new ElibriDictAtom('AB', array('pl' => 'kaseta magnetofonowa', 'en' => 'audio cassette'), 'AUDIO_CASSETTE'),
          new ElibriDictAtom('AC', array('pl' => 'audio CD', 'en' => 'CD-audio'), 'AUDIO_CD'),
          new ElibriDictAtom('AI', array('pl' => 'audio DVD', 'en' => 'DVD-audio'), 'AUDIO_DVD'),
          new ElibriDictAtom('CA', array('pl' => 'mapa', 'en' => 'sheet map'), 'SHEET_MAP'),
          new ElibriDictAtom('CB', array('pl' => 'mapa składana', 'en' => 'sheet map / folded'), 'SHEET_MAP_FOLDED'),
          new ElibriDictAtom('CC', array('pl' => 'mapa płaska', 'en' => 'sheet map / flat'), 'SHEET_MAP_FLAT'),
          new ElibriDictAtom('CD', array('pl' => 'mapa w rolce', 'en' => 'sheet map / rolled'), 'SHEET_MAP_ROLLED'),
          new ElibriDictAtom('CZ', array('pl' => 'inny format kartograficzny', 'en' => 'other cartographic'), 'OTHER_CARTOGRAPHIC'),
          new ElibriDictAtom('PC', array('pl' => 'kalendarz', 'en' => 'calendar'), 'CALENDAR'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductFormCode();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictSubjectSchemeIdentifier extends  ElibriDictElement {

  private static $instance;

  //! własnościowy
  const PROPRIETARY = '24';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('24', array('pl' => 'własnościowy', 'en' => 'proprietary'), 'PROPRIETARY'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictSubjectSchemeIdentifier();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictPublishingDateRole extends  ElibriDictElement {

  private static $instance;

  //! data publikacji
  const PUBLICATION_DATE = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'data publikacji', 'en' => 'publication date'), 'PUBLICATION_DATE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictPublishingDateRole();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictLanguageRole extends  ElibriDictElement {

  private static $instance;

  //! język tekstu
  const LANGUAGE_OF_TEXT = '01';

  //! język oryginału
  const LANGUAGE_OF_ORIGINAL = '02';

  //! język streszczenia
  const LANGUAGE_OF_ABSTRACTS = '03';

  //! język ścieżki audio (CD/DVD)
  const LANGUAGE_OF_AUDIO_TRACK = '08';

  //! język napisów (CD/DVD)
  const LANGUAGE_OF_SUBTITLES = '09';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'język tekstu', 'en' => 'language of text'), 'LANGUAGE_OF_TEXT'),
          new ElibriDictAtom('02', array('pl' => 'język oryginału', 'en' => 'language of original'), 'LANGUAGE_OF_ORIGINAL'),
          new ElibriDictAtom('03', array('pl' => 'język streszczenia', 'en' => 'language of abstracts'), 'LANGUAGE_OF_ABSTRACTS'),
          new ElibriDictAtom('08', array('pl' => 'język ścieżki audio (CD/DVD)', 'en' => 'language of audio track (CD/DVD)'), 'LANGUAGE_OF_AUDIO_TRACK'),
          new ElibriDictAtom('09', array('pl' => 'język napisów (CD/DVD)', 'en' => 'language of subtitles(CD/DVD)'), 'LANGUAGE_OF_SUBTITLES'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictLanguageRole();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictContentAudience extends  ElibriDictElement {

  private static $instance;

  //! brak ograniczeń
  const UNRESTRICTED = '00';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'brak ograniczeń', 'en' => 'unrestricted'), 'UNRESTRICTED'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictContentAudience();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictPricePrintedOnProduct extends  ElibriDictElement {

  private static $instance;

  //! nie
  const NO = '01';

  //! tak
  const YES = '02';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'nie', 'en' => 'false'), 'NO'),
          new ElibriDictAtom('02', array('pl' => 'tak', 'en' => 'true'), 'YES'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictPricePrintedOnProduct();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictUnnamedPersons extends  ElibriDictElement {

  private static $instance;

  //! opracowanie zbiorowe
  const VARIOUS_AUTHORS = '04';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('04', array('pl' => 'opracowanie zbiorowe', 'en' => 'various authors'), 'VARIOUS_AUTHORS'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictUnnamedPersons();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictOtherTextType extends  ElibriDictElement {

  private static $instance;

  //! opis produktu
  const MAIN_DESCRIPTION = '03';

  //! spis treści
  const TABLE_OF_CONTENTS = '04';

  //! recenzja
  const REVIEW = '07';

  //! fragment książki
  const EXCERPT = '14';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('03', array('pl' => 'opis produktu', 'en' => 'description'), 'MAIN_DESCRIPTION'),
          new ElibriDictAtom('04', array('pl' => 'spis treści', 'en' => 'table of contents'), 'TABLE_OF_CONTENTS'),
          new ElibriDictAtom('07', array('pl' => 'recenzja', 'en' => 'review text'), 'REVIEW'),
          new ElibriDictAtom('14', array('pl' => 'fragment książki', 'en' => 'excerpt'), 'EXCERPT'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictOtherTextType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictProductRelationType extends  ElibriDictElement {

  private static $instance;

  //! produkty są podobne (mogą zainteresować klienta)
  const SIMILAR_PRODUCTS = '23';

  //! produkty to faksymile (kopia lub dodruk)
  const FACSIMILES = '24';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('23', array('pl' => 'produkty są podobne (mogą zainteresować klienta)', 'en' => 'products are similar'), 'SIMILAR_PRODUCTS'),
          new ElibriDictAtom('24', array('pl' => 'produkty to faksymile (kopia lub dodruk)', 'en' => 'products are facsimiles'), 'FACSIMILES'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductRelationType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictSupplierRole extends  ElibriDictElement {

  private static $instance;

  //! sprzedaż wydawnictwa do detalu
  const PUB_TO_RET = '01';

  //! wyłączny dystrybutor wydawnictwa
  const PUB_EXL_DIST = '02';

  //! dystrybutor wydawnictwa bez prawa wyłączności
  const PUB_NON_EXL_DIST = '03';

  //! hurtownia książek
  const WHOLESALER = '04';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'sprzedaż wydawnictwa do detalu', 'en' => 'publisher to retailers'), 'PUB_TO_RET'),
          new ElibriDictAtom('02', array('pl' => 'wyłączny dystrybutor wydawnictwa', 'en' => 'publisher\'s exclusive distributor to retailers'), 'PUB_EXL_DIST'),
          new ElibriDictAtom('03', array('pl' => 'dystrybutor wydawnictwa bez prawa wyłączności', 'en' => 'publisher\'s non-exclusive distributor to retailers'), 'PUB_NON_EXL_DIST'),
          new ElibriDictAtom('04', array('pl' => 'hurtownia książek', 'en' => 'Wholesaler'), 'WHOLESALER'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictSupplierRole();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictTitleElementLevel extends  ElibriDictElement {

  private static $instance;

  //! produkt
  const PRODUCT = '01';

  //! kolekcja
  const COLLECTION = '02';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'produkt', 'en' => 'product'), 'PRODUCT'),
          new ElibriDictAtom('02', array('pl' => 'kolekcja', 'en' => 'collection'), 'COLLECTION'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictTitleElementLevel();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictAudienceRangePrecision extends  ElibriDictElement {

  private static $instance;

  //! od
  const FROM = '03';

  //! do
  const TO = '04';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('03', array('pl' => 'od', 'en' => 'from'), 'FROM'),
          new ElibriDictAtom('04', array('pl' => 'do', 'en' => 'to'), 'TO'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictAudienceRangePrecision();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictExtentType extends  ElibriDictElement {

  private static $instance;

  //! ilość stron
  const PAGE_COUNT = '00';

  //! czas trwania
  const DURATION = '09';

  //! rozmiar pliku
  const FILE_SIZE = '22';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'ilość stron', 'en' => 'page count'), 'PAGE_COUNT'),
          new ElibriDictAtom('09', array('pl' => 'czas trwania', 'en' => 'duration'), 'DURATION'),
          new ElibriDictAtom('22', array('pl' => 'rozmiar pliku', 'en' => 'file size'), 'FILE_SIZE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictExtentType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictNotificationType extends  ElibriDictElement {

  private static $instance;

  //! wczesne powiadomienie
  const EARLY_NOTIFICATION = '01';

  //! późne powiadomienie
  const ADVANCED_NOTIFICATION = '02';

  //! powiadomienie o publikacji
  const CONFIRMED_ON_PUBLICATION = '03';

  //! usunięcie rekordu
  const DELETE = '05';

  //! uaktualnienie tylko informacji o dostępności
  const UPDATE_SUPPLY_DETAIL_ONLY = '12';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'wczesne powiadomienie', 'en' => 'early notification'), 'EARLY_NOTIFICATION'),
          new ElibriDictAtom('02', array('pl' => 'późne powiadomienie', 'en' => 'advanced notification'), 'ADVANCED_NOTIFICATION'),
          new ElibriDictAtom('03', array('pl' => 'powiadomienie o publikacji', 'en' => 'notification confirmed on publication'), 'CONFIRMED_ON_PUBLICATION'),
          new ElibriDictAtom('05', array('pl' => 'usunięcie rekordu', 'en' => 'delete'), 'DELETE'),
          new ElibriDictAtom('12', array('pl' => 'uaktualnienie tylko informacji o dostępności', 'en' => 'update - SupplyDetail only'), 'UPDATE_SUPPLY_DETAIL_ONLY'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictNotificationType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictAvailability extends  ElibriDictElement {

  private static $instance;

  //! Na stanie
  const IN_STOCK = '21';

  //! niedostępne
  const NOT_AVAILABLE = '40';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('21', array('pl' => 'Na stanie', 'en' => 'In Stock'), 'IN_STOCK'),
          new ElibriDictAtom('40', array('pl' => 'niedostępne', 'en' => 'Not available'), 'NOT_AVAILABLE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictAvailability();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictCollectionType extends  ElibriDictElement {

  private static $instance;

  //! kolekcja wydawnictwa
  const PUBLISHER_COLLECTION = '10';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('10', array('pl' => 'kolekcja wydawnictwa', 'en' => 'publisher collection'), 'PUBLISHER_COLLECTION'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictCollectionType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictTitleType extends  ElibriDictElement {

  private static $instance;

  //! tytuł
  const DISTINCTIVE_TITLE = '01';

  //! tytuł w języku oryginału
  const ORIGINAL_TITLE = '03';

  //! tytuł wydawcy
  const DISTRIBUTORS_TITLE = '10';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'tytuł', 'en' => 'distinctive title'), 'DISTINCTIVE_TITLE'),
          new ElibriDictAtom('03', array('pl' => 'tytuł w języku oryginału', 'en' => 'title in original language'), 'ORIGINAL_TITLE'),
          new ElibriDictAtom('10', array('pl' => 'tytuł wydawcy', 'en' => 'distributor\'s title'), 'DISTRIBUTORS_TITLE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictTitleType();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
?>
