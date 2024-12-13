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
class ElibriDictAudienceCodeType extends  ElibriDictElement {

  private static $instance;

  //! kody ONIX
  const ONIX = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'kody ONIX', 'en' => 'ONIX audience codes'), 'ONIX'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictAudienceCodeType();
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
class ElibriDictAudienceCodeValue extends  ElibriDictElement {

  private static $instance;

  //! książka jest skierowana do ogólnego odbiorcy
  const GENERAL = '01';

  //! książka jest skierowana do dzieci
  const CHILDREN = '02';

  //! książka jest skierowana do młodzieży
  const YOUNG_ADULT = '03';

  //! książka edukacyjna (szkoły podstawowe i średnie)
  const EDUCATION = '04';

  //! podręcznik akademicki
  const HIGHER_EDUCATION = '05';

  //! książka dla profesjonalistów
  const EXPERTS = '06';

  //! edukacja dla dorosłych
  const ADULT_EDUCATION = '08';

  //! nauka języka obcego
  const SECOND_LANGUAGE_TEACHING = '09';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'książka jest skierowana do ogólnego odbiorcy', 'en' => 'general'), 'GENERAL'),
          new ElibriDictAtom('02', array('pl' => 'książka jest skierowana do dzieci', 'en' => 'children'), 'CHILDREN'),
          new ElibriDictAtom('03', array('pl' => 'książka jest skierowana do młodzieży', 'en' => 'young adult'), 'YOUNG_ADULT'),
          new ElibriDictAtom('04', array('pl' => 'książka edukacyjna (szkoły podstawowe i średnie)', 'en' => 'education'), 'EDUCATION'),
          new ElibriDictAtom('05', array('pl' => 'podręcznik akademicki', 'en' => 'higher education'), 'HIGHER_EDUCATION'),
          new ElibriDictAtom('06', array('pl' => 'książka dla profesjonalistów', 'en' => 'experts'), 'EXPERTS'),
          new ElibriDictAtom('08', array('pl' => 'edukacja dla dorosłych', 'en' => 'adult education'), 'ADULT_EDUCATION'),
          new ElibriDictAtom('09', array('pl' => 'nauka języka obcego', 'en' => 'second language teaching'), 'SECOND_LANGUAGE_TEACHING'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictAudienceCodeValue();
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
class ElibriDictContentAudience extends  ElibriDictElement {

  private static $instance;

  //! brak ograniczeń
  const UNRESTRICTED = '00';

  //! dla bibliotekarzy
  const LIBRARIANS = '04';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'brak ograniczeń', 'en' => 'unrestricted'), 'UNRESTRICTED'),
          new ElibriDictAtom('04', array('pl' => 'dla bibliotekarzy', 'en' => 'librarians'), 'LIBRARIANS'),
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
class ElibriDictContentDateRole extends  ElibriDictElement {

  private static $instance;

  //! data ostatniej aktualizacji
  const LAST_UPDATED = '17';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('17', array('pl' => 'data ostatniej aktualizacji', 'en' => 'last updated'), 'LAST_UPDATED'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictContentDateRole();
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
class ElibriDictContentSourceType extends  ElibriDictElement {

  private static $instance;

  //! media drukowane
  const PRINTED_MEDIA = '01';

  //! strona internetowa
  const WEBSITE = '02';

  //! radio
  const RADIO = '03';

  //! telewizja
  const TV = '04';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'media drukowane', 'en' => 'printed media'), 'PRINTED_MEDIA'),
          new ElibriDictAtom('02', array('pl' => 'strona internetowa', 'en' => 'website'), 'WEBSITE'),
          new ElibriDictAtom('03', array('pl' => 'radio', 'en' => 'radio'), 'RADIO'),
          new ElibriDictAtom('04', array('pl' => 'telewizja', 'en' => 'TV'), 'TV'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictContentSourceType();
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

  //! kompozytor
  const COMPOSER = 'A06';

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

  //! redaktor naukowy
  const EDITORIAL_COORDINATION = 'B15';

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
          new ElibriDictAtom('A06', array('pl' => 'kompozytor', 'en' => 'composer'), 'COMPOSER'),
          new ElibriDictAtom('A10', array('pl' => 'pomysłodawca', 'en' => 'originator'), 'ORIGINATOR'),
          new ElibriDictAtom('A12', array('pl' => 'ilustrator', 'en' => 'illustrator'), 'ILLUSTRATOR'),
          new ElibriDictAtom('A13', array('pl' => 'fotograf', 'en' => 'photographer'), 'PHOTOGRAPHER'),
          new ElibriDictAtom('A15', array('pl' => 'autor wstępu', 'en' => 'author of preface'), 'AUTHOR_OF_PREFACE'),
          new ElibriDictAtom('A35', array('pl' => 'rysownik', 'en' => 'drawer'), 'DRAWER'),
          new ElibriDictAtom('A36', array('pl' => 'projektant okładki', 'en' => 'cover designer'), 'COVER_DESIGNER'),
          new ElibriDictAtom('A40', array('pl' => 'tusz/kolor', 'en' => 'inked or colored by'), 'INKED_OR_COLORED_BY'),
          new ElibriDictAtom('B01', array('pl' => 'redaktor', 'en' => 'editor'), 'EDITOR'),
          new ElibriDictAtom('B15', array('pl' => 'redaktor naukowy', 'en' => 'editorial coordination by'), 'EDITORIAL_COORDINATION'),
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
class ElibriDictDateFormat extends  ElibriDictElement {

  private static $instance;

  //! RRRRMMDD
  const YYYYMMDD = '00';

  //! RRRRMM
  const YYYYMM = '01';

  //! RRRR
  const YYYY = '05';

  //! RRRRMMDDThhmm
  const YYYYMMDDTHHMM = '13';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'RRRRMMDD', 'en' => 'YYYYMMDD'), 'YYYYMMDD'),
          new ElibriDictAtom('01', array('pl' => 'RRRRMM', 'en' => 'YYYYMM'), 'YYYYMM'),
          new ElibriDictAtom('05', array('pl' => 'RRRR', 'en' => 'YYYY'), 'YYYY'),
          new ElibriDictAtom('13', array('pl' => 'RRRRMMDDThhmm', 'en' => 'YYYYMMDDThhmm'), 'YYYYMMDDTHHMM'),
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
class ElibriDictEditionType extends  ElibriDictElement {

  private static $instance;

  //! edycja z powiększoną czcionką
  const LARGE_TYPE_EDITION = 'LTE';

  //! wydanie krytyczne (z komentarzem)
  const CRITICAL_EDITION = 'CRI';

  //! wydanie dwujęzyczne
  const BILINGUAL_EDITION = 'BLL';

  //! reprint
  const FACSIMILE_EDITION = 'FAC';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('LTE', array('pl' => 'edycja z powiększoną czcionką', 'en' => 'large type edition'), 'LARGE_TYPE_EDITION'),
          new ElibriDictAtom('CRI', array('pl' => 'wydanie krytyczne (z komentarzem)', 'en' => 'critial edition'), 'CRITICAL_EDITION'),
          new ElibriDictAtom('BLL', array('pl' => 'wydanie dwujęzyczne', 'en' => 'bilingual edition'), 'BILINGUAL_EDITION'),
          new ElibriDictAtom('FAC', array('pl' => 'reprint', 'en' => 'facsimile edition'), 'FACSIMILE_EDITION'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictEditionType();
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
class ElibriDictEpubLicenseExpressionType extends  ElibriDictElement {

  private static $instance;

  //! ogólnodostępny dokument
  const HUMAN_READABLE = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'ogólnodostępny dokument', 'en' => 'human readable'), 'HUMAN_READABLE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictEpubLicenseExpressionType();
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
class ElibriDictEpubTechnicalProtection extends  ElibriDictElement {

  private static $instance;

  //! watermark
  const WATERMARK = '02';

  //! LCP
  const LCP = '06';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('02', array('pl' => 'watermark', 'en' => 'watermark'), 'WATERMARK'),
          new ElibriDictAtom('06', array('pl' => 'LCP', 'en' => 'LCP'), 'LCP'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictEpubTechnicalProtection();
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
class ElibriDictEpubUsageStatus extends  ElibriDictElement {

  private static $instance;

  //! bez ograniczeń
  const UNLIMITED = '01';

  //! obowiązuje ograniczenie
  const LIMITED = '02';

  //! zabronione
  const PROHIBITED = '03';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'bez ograniczeń', 'en' => 'unlimited'), 'UNLIMITED'),
          new ElibriDictAtom('02', array('pl' => 'obowiązuje ograniczenie', 'en' => 'limited'), 'LIMITED'),
          new ElibriDictAtom('03', array('pl' => 'zabronione', 'en' => 'prohibited'), 'PROHIBITED'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictEpubUsageStatus();
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
class ElibriDictEpubUsageType extends  ElibriDictElement {

  private static $instance;

  //! udostępnij fragment przed kupnem
  const PREVIEW = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'udostępnij fragment przed kupnem', 'en' => 'preview before purchase'), 'PREVIEW'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictEpubUsageType();
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
class ElibriDictEpubUsageUnit extends  ElibriDictElement {

  private static $instance;

  //! znaków
  const CHARACTERS = '02';

  //! procent
  const PERCENTAGE = '05';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('02', array('pl' => 'znaków', 'en' => 'characters'), 'CHARACTERS'),
          new ElibriDictAtom('05', array('pl' => 'procent', 'en' => 'percentage'), 'PERCENTAGE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictEpubUsageUnit();
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
class ElibriDictExtentUnit extends  ElibriDictElement {

  private static $instance;

  //! strony
  const PAGES = '03';

  //! minuty
  const MINUTES = '05';

  //! megabajty
  const MEGABYTES = '19';

  //! godziny
  const HOURS = '04';

  //! Godziny minuty sekundy
  const HHHMMSS = '16';

  //! Godziny minuty
  const HHHMM = '15';

  //! godziny
  const HHH = '14';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('03', array('pl' => 'strony', 'en' => 'pages'), 'PAGES'),
          new ElibriDictAtom('05', array('pl' => 'minuty', 'en' => 'minutes'), 'MINUTES'),
          new ElibriDictAtom('19', array('pl' => 'megabajty', 'en' => 'megabytes'), 'MEGABYTES'),
          new ElibriDictAtom('04', array('pl' => 'godziny', 'en' => 'hours'), 'HOURS'),
          new ElibriDictAtom('16', array('pl' => 'Godziny minuty sekundy', 'en' => 'Hours minutes seconds'), 'HHHMMSS'),
          new ElibriDictAtom('15', array('pl' => 'Godziny minuty', 'en' => 'Hours minutes'), 'HHHMM'),
          new ElibriDictAtom('14', array('pl' => 'godziny', 'en' => 'hours'), 'HHH'),
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
          new ElibriDictAtom('dut', array('pl' => 'niderlandzki; flamandzki', 'en' => 'Dutch'), NULL),
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
          new ElibriDictAtom('qlk', array('pl' => 'łemkowski', 'en' => 'Lemko'), NULL),
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
          new ElibriDictAtom('san', array('pl' => 'sanskryt', 'en' => 'Sanskrit'), NULL),
          new ElibriDictAtom('szl', array('pl' => 'śląski', 'en' => 'Silesian'), NULL),
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
class ElibriDictLanguageRole extends  ElibriDictElement {

  private static $instance;

  //! język tekstu
  const LANGUAGE_OF_TEXT = '01';

  //! język oryginału
  const LANGUAGE_OF_ORIGINAL = '02';

  //! język streszczenia
  const LANGUAGE_OF_ABSTRACTS = '03';

  //! język oryginalny (wydanie wielojęzyczne)
  const ORIGINAL_LANGUAGE_IN_MULTILANGUAGE_EDITION = '06';

  //! język tłumaczenia (wydanie wielojęzyczne)
  const TRANSLATED_LANGUAGE_IN_MULTILANGUAGE_EDITION = '07';

  //! język ścieżki audio (CD/DVD)
  const LANGUAGE_OF_AUDIO_TRACK = '08';

  //! język napisów (CD/DVD)
  const LANGUAGE_OF_SUBTITLES = '09';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'język tekstu', 'en' => 'language of text'), 'LANGUAGE_OF_TEXT'),
          new ElibriDictAtom('02', array('pl' => 'język oryginału', 'en' => 'language of original'), 'LANGUAGE_OF_ORIGINAL'),
          new ElibriDictAtom('03', array('pl' => 'język streszczenia', 'en' => 'language of abstracts'), 'LANGUAGE_OF_ABSTRACTS'),
          new ElibriDictAtom('06', array('pl' => 'język oryginalny (wydanie wielojęzyczne)', 'en' => 'original language (multilanguage edition)'), 'ORIGINAL_LANGUAGE_IN_MULTILANGUAGE_EDITION'),
          new ElibriDictAtom('07', array('pl' => 'język tłumaczenia (wydanie wielojęzyczne)', 'en' => 'translated language (multilanguage edition)'), 'TRANSLATED_LANGUAGE_IN_MULTILANGUAGE_EDITION'),
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
class ElibriDictNameIdentifier extends  ElibriDictElement {

  private static $instance;

  //! ORCID
  const ORCID = '21';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('21', array('pl' => 'ORCID', 'en' => 'ORCID'), 'ORCID'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictNameIdentifier();
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
class ElibriDictNameType extends  ElibriDictElement {

  private static $instance;

  //! prawdziwe imię i nazwisko
  const REAL_NAME = '04';

  //! imię i nazwisko postaci fikcyjnej
  const FICTIONAL_NAME = '07';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('04', array('pl' => 'prawdziwe imię i nazwisko', 'en' => 'real name'), 'REAL_NAME'),
          new ElibriDictAtom('07', array('pl' => 'imię i nazwisko postaci fikcyjnej', 'en' => 'fictional character name'), 'FICTIONAL_NAME'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictNameType();
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

  //! krótki opis (max. 350 znaków)
  const SHORT_DESCRIPTION = '02';

  //! krótki opis cyklu (max. 350 znaków)
  const SHORT_COLLECTION_DESCRIPTION = '16';

  //! deklaracja open access
  const OPEN_ACCESS_STATEMENT = '20';

  //! zawartość pudełka
  const LIST_OF_CONTENTS = '32';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('03', array('pl' => 'opis produktu', 'en' => 'description'), 'MAIN_DESCRIPTION'),
          new ElibriDictAtom('04', array('pl' => 'spis treści', 'en' => 'table of contents'), 'TABLE_OF_CONTENTS'),
          new ElibriDictAtom('07', array('pl' => 'recenzja', 'en' => 'review text'), 'REVIEW'),
          new ElibriDictAtom('14', array('pl' => 'fragment książki', 'en' => 'excerpt'), 'EXCERPT'),
          new ElibriDictAtom('02', array('pl' => 'krótki opis (max. 350 znaków)', 'en' => 'short description'), 'SHORT_DESCRIPTION'),
          new ElibriDictAtom('16', array('pl' => 'krótki opis cyklu (max. 350 znaków)', 'en' => 'short collection description'), 'SHORT_COLLECTION_DESCRIPTION'),
          new ElibriDictAtom('20', array('pl' => 'deklaracja open access', 'en' => 'open access statement'), 'OPEN_ACCESS_STATEMENT'),
          new ElibriDictAtom('32', array('pl' => 'zawartość pudełka', 'en' => 'list of contents'), 'LIST_OF_CONTENTS'),
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
class ElibriDictPriceDateRole extends  ElibriDictElement {

  private static $instance;

  //! data od
  const FROM_DATE = '14';

  //! data do
  const UNTIL_DATE = '15';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('14', array('pl' => 'data od', 'en' => 'from date'), 'FROM_DATE'),
          new ElibriDictAtom('15', array('pl' => 'data do', 'en' => 'until date'), 'UNTIL_DATE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictPriceDateRole();
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
class ElibriDictPricePositionOnProduct extends  ElibriDictElement {

  private static $instance;

  //! nieznana
  const UNKNOW = '00';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'nieznana', 'en' => 'unknow'), 'UNKNOW'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictPricePositionOnProduct();
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
class ElibriDictPriceTypeCode extends  ElibriDictElement {

  private static $instance;

  //! sugerowana cena detaliczna brutto
  const RRP_WITH_TAX = '02';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('02', array('pl' => 'sugerowana cena detaliczna brutto', 'en' => 'RRP including tax'), 'RRP_WITH_TAX'),
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
class ElibriDictProductAvailabilityType extends  ElibriDictElement {

  private static $instance;

  //! dostępny
  const AVAILABLE = '20';

  //! na stanie
  const IN_STOCK = '21';

  //! niedostępne
  const NOT_AVAILABLE = '40';

  //! jeszcze niedostępne
  const NOT_YET_AVAILABLE = '10';

  //! skontaktuj się z dostawcą
  const CONTACT_SUPPLIER = '99';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('20', array('pl' => 'dostępny', 'en' => 'available'), 'AVAILABLE'),
          new ElibriDictAtom('21', array('pl' => 'na stanie', 'en' => 'in stock'), 'IN_STOCK'),
          new ElibriDictAtom('40', array('pl' => 'niedostępne', 'en' => 'not available'), 'NOT_AVAILABLE'),
          new ElibriDictAtom('10', array('pl' => 'jeszcze niedostępne', 'en' => 'not yet available'), 'NOT_YET_AVAILABLE'),
          new ElibriDictAtom('99', array('pl' => 'skontaktuj się z dostawcą', 'en' => 'Contact supplier'), 'CONTACT_SUPPLIER'),
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
class ElibriDictProductClassificationType extends  ElibriDictElement {

  private static $instance;

  //! System WCO
  const CN = '01';

  //! Polska Klasyfikacja Wyrobów i Usług (2015)
  const PKWIU = '12';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'System WCO', 'en' => 'WCO Harmonized System'), 'CN'),
          new ElibriDictAtom('12', array('pl' => 'Polska Klasyfikacja Wyrobów i Usług (2015)', 'en' => 'Polish Classification of Products and Services (2015)'), 'PKWIU'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductClassificationType();
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
class ElibriDictProductComposition extends  ElibriDictElement {

  private static $instance;

  //! samodzielny produkt
  const SINGLE_COMPONENT_RETAIL_PRODUCT = '00';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'samodzielny produkt', 'en' => 'Single-component retail product'), 'SINGLE_COMPONENT_RETAIL_PRODUCT'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductComposition();
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
class ElibriDictProductContactRole extends  ElibriDictElement {

  private static $instance;

  //! Kontakt w sprawie bezpieczeństwa produktu
  const PRODUCT_SAFETY_CONTACT = '10';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('10', array('pl' => 'Kontakt w sprawie bezpieczeństwa produktu', 'en' => 'Product safety contact'), 'PRODUCT_SAFETY_CONTACT'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductContactRole();
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

  //! audiobook w formie pliku
  const AUDIO_DOWNLOADABLE_FILE = 'AJ';

  //! audiobook na płycie CD
  const AUDIO_CD = 'AC';

  //! audiobook na płycie DVD
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

  //! gra planszowa
  const GAME = 'ZE';

  //! puzzle
  const JIGSAW = 'ZJ';

  //! figurka
  const FIGURE = 'ZB';

  //! zabawka - pluszak
  const PLUSH_TOY = 'ZC';

  //! zabawka (również edukacyjna)
  const TOY = 'ZD';

  //! POD - okładka twarda
  const POD_HARDCOVER = 'PODH';

  //! POD - okładka miękka
  const POD_SOFTCOVER = 'PODS';

  //! e-book open access
  const OPEN_ACCESS = 'OPEN_ACCESS';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('BA', array('pl' => 'książka', 'en' => 'book'), 'BOOK'),
          new ElibriDictAtom('EA', array('pl' => 'e-book', 'en' => 'e-book'), 'EBOOK'),
          new ElibriDictAtom('AJ', array('pl' => 'audiobook w formie pliku', 'en' => 'audio recording file'), 'AUDIO_DOWNLOADABLE_FILE'),
          new ElibriDictAtom('AC', array('pl' => 'audiobook na płycie CD', 'en' => 'CD-audio'), 'AUDIO_CD'),
          new ElibriDictAtom('AI', array('pl' => 'audiobook na płycie DVD', 'en' => 'DVD-audio'), 'AUDIO_DVD'),
          new ElibriDictAtom('CA', array('pl' => 'mapa', 'en' => 'sheet map'), 'SHEET_MAP'),
          new ElibriDictAtom('CB', array('pl' => 'mapa składana', 'en' => 'sheet map / folded'), 'SHEET_MAP_FOLDED'),
          new ElibriDictAtom('CC', array('pl' => 'mapa płaska', 'en' => 'sheet map / flat'), 'SHEET_MAP_FLAT'),
          new ElibriDictAtom('CD', array('pl' => 'mapa w rolce', 'en' => 'sheet map / rolled'), 'SHEET_MAP_ROLLED'),
          new ElibriDictAtom('CZ', array('pl' => 'inny format kartograficzny', 'en' => 'other cartographic'), 'OTHER_CARTOGRAPHIC'),
          new ElibriDictAtom('PC', array('pl' => 'kalendarz', 'en' => 'calendar'), 'CALENDAR'),
          new ElibriDictAtom('ZE', array('pl' => 'gra planszowa', 'en' => 'board game'), 'GAME'),
          new ElibriDictAtom('ZJ', array('pl' => 'puzzle', 'en' => 'jigsaw'), 'JIGSAW'),
          new ElibriDictAtom('ZB', array('pl' => 'figurka', 'en' => 'doll or figure'), 'FIGURE'),
          new ElibriDictAtom('ZC', array('pl' => 'zabawka - pluszak', 'en' => 'plush toy'), 'PLUSH_TOY'),
          new ElibriDictAtom('ZD', array('pl' => 'zabawka (również edukacyjna)', 'en' => 'toy'), 'TOY'),
          new ElibriDictAtom('PODH', array('pl' => 'POD - okładka twarda', 'en' => 'pod hardcover book'), 'POD_HARDCOVER'),
          new ElibriDictAtom('PODS', array('pl' => 'POD - okładka miękka', 'en' => 'pod softcover book'), 'POD_SOFTCOVER'),
          new ElibriDictAtom('OPEN_ACCESS', array('pl' => 'e-book open access', 'en' => 'e-book open access'), 'OPEN_ACCESS'),
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
class ElibriDictProductFormDetail extends  ElibriDictElement {

  private static $instance;

  //! EPUB
  const EPUB = 'E101';

  //! PDF
  const PDF = 'E107';

  //! Mobipocket
  const MOBIPOCKET = 'E127';

  //! MP3
  const MP3 = 'A103';

  //! LPF
  const LPF = 'A113';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('E101', array('pl' => 'EPUB', 'en' => 'EPUB'), 'EPUB'),
          new ElibriDictAtom('E107', array('pl' => 'PDF', 'en' => 'PDF'), 'PDF'),
          new ElibriDictAtom('E127', array('pl' => 'Mobipocket', 'en' => 'Mobipocket'), 'MOBIPOCKET'),
          new ElibriDictAtom('A103', array('pl' => 'MP3', 'en' => 'MP3'), 'MP3'),
          new ElibriDictAtom('A113', array('pl' => 'LPF', 'en' => 'LPF'), 'LPF'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductFormDetail();
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
class ElibriDictProductFormFeatureType extends  ElibriDictElement {

  private static $instance;

  //! Ostrzeżenia dotyczące bezpieczeństwa zabawek
  const EU_TOY_SAFETY_HAZARD_WARNING = '13';

  //! Ilość elementów
  const NUMBER_OF_GAME_PIECES = '22';

  //! liczba graczy
  const GAME_PLAYERS = '23';

  //! Czas gry
  const GAME_PLAY_TIME = '24';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('13', array('pl' => 'Ostrzeżenia dotyczące bezpieczeństwa zabawek', 'en' => 'EU Toy Safety Hazard warning'), 'EU_TOY_SAFETY_HAZARD_WARNING'),
          new ElibriDictAtom('22', array('pl' => 'Ilość elementów', 'en' => 'Number of game pieces'), 'NUMBER_OF_GAME_PIECES'),
          new ElibriDictAtom('23', array('pl' => 'liczba graczy', 'en' => 'Game players'), 'GAME_PLAYERS'),
          new ElibriDictAtom('24', array('pl' => 'Czas gry', 'en' => 'Game play time'), 'GAME_PLAY_TIME'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProductFormFeatureType();
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

  //! wewnętrzny identyfikator
  const PROPRIETARY = '01';

  //! EAN
  const EAN = '03';

  //! ISBN-13
  const ISBN13 = '15';

  //! DOI
  const DOI = '06';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'wewnętrzny identyfikator', 'en' => 'proprietary'), 'PROPRIETARY'),
          new ElibriDictAtom('03', array('pl' => 'EAN', 'en' => 'EAN'), 'EAN'),
          new ElibriDictAtom('15', array('pl' => 'ISBN-13', 'en' => 'ISBN-13'), 'ISBN13'),
          new ElibriDictAtom('06', array('pl' => 'DOI', 'en' => 'DOI'), 'DOI'),
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
class ElibriDictProductRelationType extends  ElibriDictElement {

  private static $instance;

  //! produkty to faksymile (kopia lub dodruk)
  const FACSIMILES = '24';


  protected function __construct() {
      parent::__construct(array(
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
class ElibriDictProximity extends  ElibriDictElement {

  private static $instance;

  //! dokładnie
  const EXACTLY = '03';

  //! więcej niż
  const MORE_THAN = '07';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('03', array('pl' => 'dokładnie', 'en' => 'Exactly'), 'EXACTLY'),
          new ElibriDictAtom('07', array('pl' => 'więcej niż', 'en' => 'more than'), 'MORE_THAN'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictProximity();
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

  //! data, od której mogą być składane zamówienia
  const PREORDER_EMBARGO_DATE = '27';

  //! data, po której książka zostanie wycofana z rynku
  const OUT_OF_PRINT_DATE = '13';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'data publikacji', 'en' => 'publication date'), 'PUBLICATION_DATE'),
          new ElibriDictAtom('27', array('pl' => 'data, od której mogą być składane zamówienia', 'en' => 'preorder embargo date'), 'PREORDER_EMBARGO_DATE'),
          new ElibriDictAtom('13', array('pl' => 'data, po której książka zostanie wycofana z rynku', 'en' => 'out of print date'), 'OUT_OF_PRINT_DATE'),
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
class ElibriDictPublishingStatusCode extends  ElibriDictElement {

  private static $instance;

  //! nieokreślony
  const UNSPECIFIED = '00';

  //! anulowany
  const CANCELLED = '01';

  //! nadchodzący
  const FORTHCOMING = '02';

  //! publikacja wstrzymana
  const POSTPONED_INDEFINITELY = '03';

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
          new ElibriDictAtom('03', array('pl' => 'publikacja wstrzymana', 'en' => 'postponed indefinitely'), 'POSTPONED_INDEFINITELY'),
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
class ElibriDictResourceContentType extends  ElibriDictElement {

  private static $instance;

  //! okładka (przód)
  const FRONT_COVER = '01';

  //! okładka (tył)
  const BACK_COVER = '02';

  //! okładka 3D
  const FRONT_COVER_3D = '03';

  //! wywiad z autorem
  const AUTHOR_INTERVIEW = '11';

  //! fragment książki czytany przez autora
  const AUTHOR_READING = '13';

  //! fragment książki (plik mp3/jpg/png)
  const SAMPLE_CONTENT = '15';

  //! recenzja
  const REVIEW = '17';

  //! mediapack
  const PRESS_RELEASE = '24';

  //! okładka w dużej rozdzielczości (CMYK)
  const FULL_COVER = '29';

  //! interaktywny podgląd produktu
  const WIDGET = '16';

  //! zasady lub instrukcje gry
  const RULES_OR_INSTRUCTIONS = '46';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'okładka (przód)', 'en' => 'front cover'), 'FRONT_COVER'),
          new ElibriDictAtom('02', array('pl' => 'okładka (tył)', 'en' => 'back cover'), 'BACK_COVER'),
          new ElibriDictAtom('03', array('pl' => 'okładka 3D', 'en' => 'front cover 3D'), 'FRONT_COVER_3D'),
          new ElibriDictAtom('11', array('pl' => 'wywiad z autorem', 'en' => 'author interview'), 'AUTHOR_INTERVIEW'),
          new ElibriDictAtom('13', array('pl' => 'fragment książki czytany przez autora', 'en' => 'author reading'), 'AUTHOR_READING'),
          new ElibriDictAtom('15', array('pl' => 'fragment książki (plik mp3/jpg/png)', 'en' => 'sample content'), 'SAMPLE_CONTENT'),
          new ElibriDictAtom('17', array('pl' => 'recenzja', 'en' => 'review'), 'REVIEW'),
          new ElibriDictAtom('24', array('pl' => 'mediapack', 'en' => 'press release'), 'PRESS_RELEASE'),
          new ElibriDictAtom('29', array('pl' => 'okładka w dużej rozdzielczości (CMYK)', 'en' => 'full cover'), 'FULL_COVER'),
          new ElibriDictAtom('16', array('pl' => 'interaktywny podgląd produktu', 'en' => 'widget'), 'WIDGET'),
          new ElibriDictAtom('46', array('pl' => 'zasady lub instrukcje gry', 'en' => 'rules or instructions'), 'RULES_OR_INSTRUCTIONS'),
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
class ElibriDictResourceFileFeatureType extends  ElibriDictElement {

  private static $instance;

  //! md5
  const MD5 = '06';

  //! dokładny rozmiar pliku
  const EXACT_FILE_SIZE = '07';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('06', array('pl' => 'md5', 'en' => 'md5'), 'MD5'),
          new ElibriDictAtom('07', array('pl' => 'dokładny rozmiar pliku', 'en' => 'exact file size'), 'EXACT_FILE_SIZE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictResourceFileFeatureType();
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

  //! skrypt do zintegrowania ze stroną internetową
  const EMBEDDABLE_APPLICATION = '03';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('02', array('pl' => 'plik do pobrania', 'en' => 'downloadable file'), 'DOWNLOADABLE_FILE'),
          new ElibriDictAtom('03', array('pl' => 'skrypt do zintegrowania ze stroną internetową', 'en' => 'embeddable application'), 'EMBEDDABLE_APPLICATION'),
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
class ElibriDictResourceIDType extends  ElibriDictElement {

  private static $instance;

  //! wewnętrzny identyfikator
  const PROPRIETARY = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'wewnętrzny identyfikator', 'en' => 'proprietary'), 'PROPRIETARY'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictResourceIDType();
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
class ElibriDictResourceMode extends  ElibriDictElement {

  private static $instance;

  //! audio
  const AUDIO = '02';

  //! obrazek
  const IMAGE = '03';

  //! tekst
  const TEXT = '04';

  //! plik zip
  const MULTI_MODE = '06';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('02', array('pl' => 'audio', 'en' => 'audio'), 'AUDIO'),
          new ElibriDictAtom('03', array('pl' => 'obrazek', 'en' => 'image'), 'IMAGE'),
          new ElibriDictAtom('04', array('pl' => 'tekst', 'en' => 'text'), 'TEXT'),
          new ElibriDictAtom('06', array('pl' => 'plik zip', 'en' => 'multi mode'), 'MULTI_MODE'),
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
class ElibriDictResourceVersionFeatureType extends  ElibriDictElement {

  private static $instance;

  //! format pliku
  const FILE_FORMAT = '01';

  //! wartość hasha md5
  const MD5_HASH_VALUE = '06';

  //! rozmiar w bajtach
  const SIZE_IN_BYTES = '07';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'format pliku', 'en' => 'file format'), 'FILE_FORMAT'),
          new ElibriDictAtom('06', array('pl' => 'wartość hasha md5', 'en' => 'md5 hash value'), 'MD5_HASH_VALUE'),
          new ElibriDictAtom('07', array('pl' => 'rozmiar w bajtach', 'en' => 'size in bytes'), 'SIZE_IN_BYTES'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictResourceVersionFeatureType();
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
class ElibriDictSalesRightsType extends  ElibriDictElement {

  private static $instance;

  //! Produkt dopuszczony do sprzedaży w wymienionych krajach lub terytoriach
  const FOR_SALE_WITH_EXLUSIVE_RIGHTS = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'Produkt dopuszczony do sprzedaży w wymienionych krajach lub terytoriach', 'en' => 'For sale with exclusive rights in the specified countries or territories'), 'FOR_SALE_WITH_EXLUSIVE_RIGHTS'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictSalesRightsType();
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

  //! słowa kluczowe
  const KEYWORDS = '20';

  //! własnościowy
  const PROPRIETARY = '24';

  //! Kategoria Thema
  const THEMA = '93';

  //! Thema - kwantyfikator miejsca
  const THEMA_PLACE_QUALIFIER = '94';

  //! Thema - kwantyfikator języka
  const THEMA_LANGUAGE_QUALIFIER = '95';

  //! Thema - kwantyfikator czasowy
  const THEMA_TIME_PERIOD_QUALIFIER = '96';

  //! Thema - kwantyfikator edukacyjny
  const THEMA_EDUCATIONAL_PURPOSE_QUALIFIER = '97';

  //! Thema - kwantyfikator grupy docelowej
  const THEMA_SPECIAL_INTEREST_QUALIFIER = '98';

  //! Thema - kwantyfikator stylu
  const THEMA_STYLE_QUALIFIER = '99';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('20', array('pl' => 'słowa kluczowe', 'en' => 'keywords'), 'KEYWORDS'),
          new ElibriDictAtom('24', array('pl' => 'własnościowy', 'en' => 'proprietary'), 'PROPRIETARY'),
          new ElibriDictAtom('93', array('pl' => 'Kategoria Thema', 'en' => 'Thema Category'), 'THEMA'),
          new ElibriDictAtom('94', array('pl' => 'Thema - kwantyfikator miejsca', 'en' => 'Thema place qualifier'), 'THEMA_PLACE_QUALIFIER'),
          new ElibriDictAtom('95', array('pl' => 'Thema - kwantyfikator języka', 'en' => 'Thema language qualifier'), 'THEMA_LANGUAGE_QUALIFIER'),
          new ElibriDictAtom('96', array('pl' => 'Thema - kwantyfikator czasowy', 'en' => 'Thema time period qualifier'), 'THEMA_TIME_PERIOD_QUALIFIER'),
          new ElibriDictAtom('97', array('pl' => 'Thema - kwantyfikator edukacyjny', 'en' => 'Thema educational purpose qualifier'), 'THEMA_EDUCATIONAL_PURPOSE_QUALIFIER'),
          new ElibriDictAtom('98', array('pl' => 'Thema - kwantyfikator grupy docelowej', 'en' => 'Thema interest age / special interest qualifier'), 'THEMA_SPECIAL_INTEREST_QUALIFIER'),
          new ElibriDictAtom('99', array('pl' => 'Thema - kwantyfikator stylu', 'en' => 'Thema style qualifier'), 'THEMA_STYLE_QUALIFIER'),
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
class ElibriDictSupplierIDType extends  ElibriDictElement {

  private static $instance;

  //! Numer NIP
  const VAT_IDENTITY_NUMBER = '23';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('23', array('pl' => 'Numer NIP', 'en' => 'VAT Identity number'), 'VAT_IDENTITY_NUMBER'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictSupplierIDType();
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
class ElibriDictSupplierOwnCodeType extends  ElibriDictElement {

  private static $instance;

  //! klasyfikacja sprzedawcy
  const SUPPLIERS_SALES_CLASSIFICATION = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'klasyfikacja sprzedawcy', 'en' => 'supplier’s sales classification'), 'SUPPLIERS_SALES_CLASSIFICATION'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictSupplierOwnCodeType();
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

  //! Dystrybutor do klientów końcowych
  const RETAIL_NON_EXL_DIST = '11';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'sprzedaż wydawnictwa do detalu', 'en' => 'publisher to retailers'), 'PUB_TO_RET'),
          new ElibriDictAtom('11', array('pl' => 'Dystrybutor do klientów końcowych', 'en' => 'Non-exclusive distributor to end-customers'), 'RETAIL_NON_EXL_DIST'),
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
class ElibriDictTaxType extends  ElibriDictElement {

  private static $instance;

  //! vat
  const VAT = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'vat', 'en' => 'vat'), 'VAT'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictTaxType();
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
//! @brief Słownik
//! @ingroup dictionaries
class ElibriDictToySafetyHazardWarningType extends  ElibriDictElement {

  private static $instance;

  //! bez ostrzeżeń
  const NO_WARNING = '00';

  //! Posiada oznaczenie ‘CE’
  const CARRIES_CE_LOGO = '01';

  //! Posiada oznaczenie minimalnego wieku
  const CARRIES_MINIMUM_AGE_WARNING = '02';

  //! Posiada logo ‘Nie dla dzieci poniżej 3 roku życia‘
  const UNSUITABLE_FOR_CHILDREN_AGES_0_3 = '03';

  //! Zawiera ostrzeżenie o niebezpieczeństwie związane z dyrektywą UE w sprawie bezpieczeństwa zabawek
  const CARRIES_EU_TOY_SAFETY_WARNING = '04';

  //! Deklaracja zgodności
  const DECLARATION_OF_CONFORMITY_AVAILABLE = '07';

  //! Posiada oznaczenie ‘EN71’
  const CARRIES_EN71_LOGO = '08';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('00', array('pl' => 'bez ostrzeżeń', 'en' => 'No warning'), 'NO_WARNING'),
          new ElibriDictAtom('01', array('pl' => 'Posiada oznaczenie ‘CE’', 'en' => 'Carries ‘CE’ logo'), 'CARRIES_CE_LOGO'),
          new ElibriDictAtom('02', array('pl' => 'Posiada oznaczenie minimalnego wieku', 'en' => 'Carries minimum age warning'), 'CARRIES_MINIMUM_AGE_WARNING'),
          new ElibriDictAtom('03', array('pl' => 'Posiada logo ‘Nie dla dzieci poniżej 3 roku życia‘', 'en' => 'Carries EU Toy Safety Directive ‘Unsuitable for children ages 0–3’ warning logo'), 'UNSUITABLE_FOR_CHILDREN_AGES_0_3'),
          new ElibriDictAtom('04', array('pl' => 'Zawiera ostrzeżenie o niebezpieczeństwie związane z dyrektywą UE w sprawie bezpieczeństwa zabawek', 'en' => 'Carries EU Toy Safety Directive hazard warning'), 'CARRIES_EU_TOY_SAFETY_WARNING'),
          new ElibriDictAtom('07', array('pl' => 'Deklaracja zgodności', 'en' => 'Declaration of Conformity available'), 'DECLARATION_OF_CONFORMITY_AVAILABLE'),
          new ElibriDictAtom('08', array('pl' => 'Posiada oznaczenie ‘EN71’', 'en' => 'Carries ‘EN71’ logo'), 'CARRIES_EN71_LOGO'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictToySafetyHazardWarningType();
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

  //! Głos syntetyzowany - męski
  const SYNTHESISED_VOICE_MALE = '05';

  //! Głos syntetyzowany - kobiecy
  const SYNTHESISED_VOICE_FEMALE = '06';

  //! Głos syntetyzowany
  const SYNTHESISED_VOICE_UNSPECIFIED = '07';

  //! Głos syntetyzowany - bazujący na głosie aktora
  const SYNTHESISED_VOICE_BASED_ON_REAL_VOICE = '08';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('04', array('pl' => 'opracowanie zbiorowe', 'en' => 'various authors'), 'VARIOUS_AUTHORS'),
          new ElibriDictAtom('05', array('pl' => 'Głos syntetyzowany - męski', 'en' => 'Synthesised voice – male'), 'SYNTHESISED_VOICE_MALE'),
          new ElibriDictAtom('06', array('pl' => 'Głos syntetyzowany - kobiecy', 'en' => 'Synthesised voice – female'), 'SYNTHESISED_VOICE_FEMALE'),
          new ElibriDictAtom('07', array('pl' => 'Głos syntetyzowany', 'en' => 'Synthesised voice – female'), 'SYNTHESISED_VOICE_UNSPECIFIED'),
          new ElibriDictAtom('08', array('pl' => 'Głos syntetyzowany - bazujący na głosie aktora', 'en' => 'Synthesised voice – based on real voice'), 'SYNTHESISED_VOICE_BASED_ON_REAL_VOICE'),
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
class ElibriDictUnpricedItemType extends  ElibriDictElement {

  private static $instance;

  //! bezpłatnie
  const FREE_OF_CHARGE = '01';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'bezpłatnie', 'en' => 'free of charge'), 'FREE_OF_CHARGE'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictUnpricedItemType();
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
class ElibriDictWebsiteRole extends  ElibriDictElement {

  private static $instance;

  //! strona www wydawnictwa
  const PUBLISHER_WEBPAGE = '01';

  //! strona www wydawnictwa dotycząca określonej publikacji
  const PUBLISHER_WEBPAGE_FOR_SPECIFIED_WORK = '02';

  //! link do pełnej treści książki
  const FULL_CONTENT_LINK = '29';


  protected function __construct() {
      parent::__construct(array(
          new ElibriDictAtom('01', array('pl' => 'strona www wydawnictwa', 'en' => 'publisher\'s webpage'), 'PUBLISHER_WEBPAGE'),
          new ElibriDictAtom('02', array('pl' => 'strona www wydawnictwa dotycząca określonej publikacji', 'en' => 'publisher’s website for a specified work'), 'PUBLISHER_WEBPAGE_FOR_SPECIFIED_WORK'),
          new ElibriDictAtom('29', array('pl' => 'link do pełnej treści książki', 'en' => 'full content link'), 'FULL_CONTENT_LINK'),
      ));

   }

  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie
  protected static function getInstance() {
    if (empty(self::$instance)) {
       self::$instance = new ElibriDictWebsiteRole();
    }
    return self::$instance;
  }

  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code
  public static function byCode($code) {
    return self::getInstance()->atomByCode($code);
  }
}
?>
