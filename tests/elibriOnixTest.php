<?php

require_once(dirname(__FILE__) . '/../elibriPHP.php');
use PHPUnit\Framework\TestCase;

class ElibriOnixTest extends TestCase {

  public function load($s, $idx = 0) {
    $xml = file_get_contents(dirname(__FILE__) . "/xml/".$s);
    $m = ElibriOnixMessage::parse($xml);
    return $m->products[$idx];
  }

  public function test_audience_range() {

    $product = $this->load("onix_audience_range_example.xml");
    $this->assertEquals(7, $product->reading_age_from);
    $this->assertEquals(10, $product->reading_age_to);

  }

  public function test_contributors() {

    $product = $this->load("onix_contributors_example.xml");

    $this->assertFalse($product->no_contributors());
    $this->assertFalse($product->unnamed_persons());

    $cont1 = $product->contributors[0];
    $cont2 = $product->contributors[1];

    $this->assertEquals(255, $cont1->id);
    $this->assertEquals("20111104T0905", $cont1->datestamp_before_type_cast);
    $this->assertEquals(new DateTime("2011-11-04 09:05"), $cont1->datestamp);

    $this->assertEquals("AUTHOR", $cont1->role_name);
    $this->assertEquals("Św. Tomasz z Akwinu", $cont1->person_name);

    $this->assertEquals(array("Św. Tomasz z Akwinu"), $product->authors());

    $this->assertTrue(isset($cont1->biographical_note) && (strlen($cont1->biographical_note) > 0));

    $this->assertEquals("TRANSLATOR", $cont2->role_name);
    $this->assertEquals("prof. ks. Henryk von Hausswolff OP", $cont2->person_name);
    $this->assertEquals(array("prof. ks. Henryk von Hausswolff OP"), $product->translators());

  }

  public function test_no_contributors() {

    $product = $this->load("onix_no_contributors_example.xml");

    $this->assertTrue($product->no_contributors());
    $this->assertFalse($product->unnamed_persons());

    $this->assertEquals(0, count($product->authors()));

  }


  public function test_collective_work() {
    $product = $this->load("onix_collective_work_example.xml");

    $this->assertFalse($product->no_contributors());
    $this->assertTrue($product->unnamed_persons());
    $this->assertEquals(array("praca zbiorowa"), $product->authors());
  }

  public function test_edition_number() {
    $product = $this->load("onix_edition_example.xml");

    $this->assertEquals("wyd. 3, poprawione", $product->edition_statement);

    $this->assertEquals(ElibriDictEditionType::LARGE_TYPE_EDITION, $product->edition_type);
    $this->assertEquals("LTE", $product->edition_type);

    $this->assertEquals("LARGE_TYPE_EDITION", $product->edition_type_name);
    $this->assertEquals("edycja z powiększoną czcionką", $product->edition_type_description);
  }


  public function test_elibri_extensions() {
    $product = $this->load("onix_elibri_extensions_example.xml");

    $this->assertEquals("twarda z obwolutą", $product->cover_type);
    $this->assertEquals(12.99, $product->cover_price);
    $this->assertEquals(5, $product->vat);
    $this->assertEquals("PROMO 20", $product->additional_trade_information);
    $this->assertEquals("58.11.1", $product->pkwiu);
  }

  public function test_ebook_extent() {

    $product = $this->load("onix_ebook_extent_example.xml");

    $this->assertEquals(150, $product->number_of_pages);
    $this->assertEquals(12, $product->number_of_illustrations);
    $this->assertEquals(1.22, $product->file_size);
  }


  public function test_audiobook_extent() {

    $product = $this->load("onix_audiobook_extent_example.xml");

    $this->assertEquals(340, $product->duration);
  }

  public function test_languages() {
    $product = $this->load("onix_languages_example.xml");

    $this->assertEquals("polski", $product->languages[0]->language);
    $this->assertEquals("LANGUAGE_OF_TEXT", $product->languages[0]->role_name);
    $this->assertEquals(ElibriDictLanguageRole::LANGUAGE_OF_TEXT, $product->languages[0]->role);

    $this->assertEquals("angielski", $product->languages[1]->language);
    $this->assertEquals("LANGUAGE_OF_ABSTRACTS", $product->languages[1]->role_name);
    $this->assertEquals(ElibriDictLanguageRole::LANGUAGE_OF_ABSTRACTS, $product->languages[1]->role);

  }

  public function test_measurements() {
    $product = $this->load("onix_measurement_example.xml");

    $this->assertEquals(195, $product->height);   //mm
    $this->assertEquals(125, $product->width);    //mm
    $this->assertEquals(20, $product->thickness); //mm
    $this->assertEquals(90, $product->weight);    //gr
  }

  public function test_product_form() {
    $product = $this->load("onix_product_form_example.xml");

    $this->assertEquals("00", $product->product_composition);

    $this->assertEquals("BA", $product->product_form);
    $this->assertEquals(ElibriDictProductFormCode::BOOK, $product->product_form);
    $this->assertEquals("BOOK", $product->product_form_name);
  }

  public function test_publisher_info() {
    $product = $this->load("onix_publisher_info_example.xml");

    $this->assertEquals("G+J Gruner+Jahr Polska", $product->publisher_name);
    $this->assertEquals(14, $product->publisher_id);
    $this->assertEquals("National Geographic", $product->imprint_name);
    $this->assertEquals("Warszawa", $product->city_of_publication);
  }

  public function test_onix_record_identifiers() {
    $product = $this->load("onix_record_identifiers_example.xml");

    $this->assertEquals("fdb8fa072be774d97a97", $product->record_reference);
    $this->assertEquals("9788324799992", $product->isbn13);
    $this->assertEquals($product->isbn13, $product->isbn13_with_hyphens);
    $this->assertEquals("9788324788882", $product->ean);
    $this->assertEquals($product->proprietary_identifiers, array("Olesiejuk" => "355006"));
  }

  public function test_sale_restrictions() {

    $product = $this->load("onix_sale_restrictions_example.xml");

    $this->assertTrue($product->sales_restrictions);
    $this->assertEquals(array(2012, 7, 22), $product->parsed_publishing_date);

  }

  public function test_series_memberships() {
    $product = $this->load("onix_series_memberships_example.xml");

    $this->assertEquals("9788324799992", $product->isbn13);
    $this->assertEquals(NULL, $product->ean);

    $this->assertEquals($product->series_names, array("Lektury szkolne", "Dla Bystrzaków"));

    $this->assertEquals("Lektury szkolne", $product->series[0][0]);
    $this->assertEquals("2", $product->series[0][1]);

    $this->assertEquals("Dla Bystrzaków", $product->series[1][0]);
    $this->assertEquals("1", $product->series[1][1]);
  }

  public function test_supporting_resources() {
    $product = $this->load("onix_supporting_resources_example.xml");

    $this->assertEquals(3, count($product->supporting_resources));

    $this->assertEquals($product->supporting_resources[0], $product->front_cover);

    $this->assertEquals("FRONT_COVER", $product->supporting_resources[0]->content_type_name);
    $this->assertEquals("IMAGE", $product->supporting_resources[0]->mode_name);
    $this->assertEquals("DOWNLOADABLE_FILE", $product->supporting_resources[0]->form_name);

    $this->assertEquals("http://elibri.com.pl/sciezka/do/pliku.png", $product->front_cover->link);
    $this->assertEquals(new DateTime("2011-12-01 18:05"), $product->front_cover->datestamp);
    $this->assertEquals(667, $product->front_cover->id);

    $this->assertEquals("SAMPLE_CONTENT", $product->supporting_resources[1]->content_type_name);
    $this->assertEquals("TEXT", $product->supporting_resources[1]->mode_name);
    $this->assertEquals("DOWNLOADABLE_FILE", $product->supporting_resources[1]->form_name);

    $this->assertEquals("WIDGET", $product->supporting_resources[2]->content_type_name);
    $this->assertEquals("TEXT", $product->supporting_resources[2]->mode_name);
    $this->assertEquals("EMBEDDABLE_APPLICATION", $product->supporting_resources[2]->form_name);

    $this->assertTrue($product->preview_exists);
  }


  public function test_texts() {

    $product = $this->load("onix_texts_example.xml");

    $this->assertEquals("1. Wprowadzenie<br/>2. Rozdział pierwszy<br/>[...]", $product->table_of_contents->text);
    $this->assertEquals("20111204T1215", $product->table_of_contents->datestamp_before_type_cast);
    $this->assertEquals(new DateTime("2011-12-04 12:15"), $product->table_of_contents->datestamp);
    //sprawdźmy, czy na pewno nie ma błędu z interpretacją formatu
    $this->assertEquals("04.12.2011 12:15", $product->table_of_contents->datestamp->format('d.m.Y H:i'));
    $this->assertEquals(133, $product->table_of_contents->id);

    $this->assertEquals(1, count($product->reviews));
    $this->assertEquals("Recenzja książki<br/>[...]", $product->reviews[0]->text);
    $this->assertEquals("Jan Kowalski", $product->reviews[0]->author);

    $this->assertEquals("20111204T1218", $product->reviews[0]->datestamp_before_type_cast);
    $this->assertEquals(new DateTime("2011-12-04 12:18"), $product->reviews[0]->datestamp);
    $this->assertEquals(134, $product->reviews[0]->id);

    $this->assertEquals("Opis książki<br/>[...]", $product->description->text);
    $this->assertEquals("20111204T1225", $product->description->datestamp_before_type_cast);
    $this->assertEquals(new DateTime("2011-12-04 12:25"), $product->description->datestamp);
    $this->assertEquals(135, $product->description->id);

    $this->assertEquals(1, count($product->excerpts));
    $this->assertEquals("Fragment książki<br/>[...]", $product->excerpts[0]->text);
    $this->assertEquals("20111204T1235", $product->excerpts[0]->datestamp_before_type_cast);
    $this->assertEquals(new DateTime("2011-12-04 12:35"), $product->excerpts[0]->datestamp);
    $this->assertEquals(136, $product->excerpts[0]->id);

  }

  public function test_titles() {

    $product = $this->load("onix_titles_example.xml");

    $this->assertEquals("Nothing to Envy: Ordinary Lives in North Korea", $product->original_title);
    $this->assertEquals("Światu nie mamy czego zazdrościć. Zwyczajne losy mieszkańców Korei Północnej.", $product->full_title);
    $this->assertEquals("Światu nie mamy czego zazdrościć.", $product->title);
    $this->assertEquals("Zwyczajne losy mieszkańców Korei Północnej.", $product->subtitle);
    $this->assertEquals("ŚWIATU NIE MAMY CZEGO ZAZDROŚCIĆ.", $product->trade_title);
  }


  public function test_titles_with_collection() {
    $product = $this->load("onix_title_with_collection_example.xml");

    $this->assertEquals($product->full_title, "Thorgal (#33). Statek-Miecz");
    $this->assertEquals("Statek-Miecz", $product->title);
    $this->assertEquals("Thorgal", $product->collection_title);
    $this->assertEquals("33", $product->collection_part);
  }

  public function test_announced_state() {
    $product = $this->load("onix_announced_product_example.xml");
    $this->assertEquals("01", $product->notification_type);
    $this->assertEquals("02", $product->publishing_status);
    $this->assertEquals("announced", $product->current_state);
    $this->assertEquals(array(2011), $product->parsed_publishing_date);
    $this->assertFalse(isset($product->premiere)); //nieznana jest dokładna data premiery
    $this->assertFalse($product->sales_restrictions);
  }

  public function test_preorder_state() {
    $product = $this->load("onix_preorder_product_example.xml");
    $this->assertEquals("02", $product->notification_type);
    $this->assertEquals("02", $product->publishing_status);
    $this->assertEquals('preorder', $product->current_state);
    $this->assertEquals(array(2011, 2, 10), $product->parsed_publishing_date);
    $this->assertEquals(new DateTime("2011-02-10"), $product->premiere);
    $this->assertFalse($product->sales_restrictions);
  }

  public function test_published_state() {
    $product = $this->load("onix_published_product_example.xml");
    $this->assertEquals("03", $product->notification_type);
    $this->assertEquals("04", $product->publishing_status);
    $this->assertEquals('published', $product->current_state);
    $this->assertEquals(array(2011, 2), $product->parsed_publishing_date);
    $this->assertFalse(isset($product->premiere));
    $this->assertFalse($product->sales_restrictions);
  }

  public function test_out_of_print_state() {
    $product = $this->load("onix_out_of_print_product_example.xml");
    $this->assertEquals("03", $product->notification_type);
    $this->assertEquals("07", $product->publishing_status);
    $this->assertEquals('out_of_print', $product->current_state);
    $this->assertEquals(array(), $product->parsed_publishing_date);
    $this->assertFalse(isset($product->premiere));
    $this->assertFalse($product->sales_restrictions);
  }

  public function test_territorial_rights() {
    $pl_product = $this->load("onix_territorial_rights_example.xml", 0);
    $this->assertTrue($pl_product->sale_restricted_to_poland);

    $world_product = $this->load("onix_territorial_rights_example.xml", 1);
    $this->assertFalse($world_product->sale_restricted_to_poland);
  }

  public function test_licence_information() {
    $product = $this->load("onix_unlimited_book_sample_example.xml");
    $this->assertTrue($product->unlimited_licence);

    $product = $this->load("onix_epub_details_example.xml");
    $this->assertFalse($product->unlimited_licence);
    $this->assertEquals("20140307", $product->licence_limited_to_before_type_cast);
    $this->assertEquals(array('2014', '03', '07'), $product->parsed_licence_limited_to);
    $this->assertEquals(new DateTime("2014-03-07"), $product->licence_limited_to);
  }

  public function test_formats_and_protection() {
    $product = $this->load("onix_epub_details_example.xml");
    $this->assertEquals(array("EPUB", "MOBI"), $product->digital_formats);
    $this->assertEquals("WATERMARK", $product->technical_protection);
  }

  public function test_excerpt_info() {
    $product = $this->load("onix_epub_details_example.xml");
    $this->assertFalse($product->excerpt_info);

    $product = $this->load("onix_prohibited_book_sample_example.xml");
    $this->assertTrue($product->excerpt_info);
    $this->assertFalse($product->excerpt_publishing_allowed);

    $product = $this->load("onix_limited_book_sample_example.xml");
    $this->assertTrue($product->excerpt_info);
    $this->assertTrue($product->excerpt_publishing_allowed);
    $this->assertTrue($product->excerpt_publishing_with_limit);
    $this->assertEquals(10, $product->excerpt_limit_quantity);
    $this->assertEquals("PERCENTAGE", $product->excerpt_limit_unit);


    $product = $this->load("onix_unlimited_book_sample_example.xml");
    $this->assertTrue($product->excerpt_info);
    $this->assertTrue($product->excerpt_publishing_allowed);
    $this->assertFalse($product->excerpt_publishing_with_limit);

  }

  public function test_files_informations() {
    $product = $this->load("onix_ebook_with_files_example.xml");

    $this->assertEquals(2, count($product->excerpt_infos));
    $e = $product->excerpt_infos[0];

    $this->assertEquals(2100230, $e->file_size);
    $this->assertEquals("4b145ff46636b06f49225abdab70927f", $e->md5);
    $this->assertEquals("epub_excerpt", $e->file_type);
    $this->assertEquals(new DateTime("2012-12-30 15:18 +00:00"), $e->updated_at);
    $this->assertEquals("https://www.elibri.com.pl/excerpt/767/4b145ff46636b06f49225abdab70927f/fragment.epub", $e->link);
    $this->assertEquals(767, $e->id);

    $e = $product->excerpt_infos[1];

    $this->assertEquals(2100244, $e->file_size);
    $this->assertEquals("3b452923564374efebc5bfe1059f5fd2", $e->md5);
    $this->assertEquals("mobi_excerpt", $e->file_type);
    $this->assertEquals(new DateTime("2012-12-30 15:18 +00:00"), $e->updated_at);
    $this->assertEquals("https://www.elibri.com.pl/excerpt/768/3b452923564374efebc5bfe1059f5fd2/fragment.mobi", $e->link);
    $this->assertEquals(768, $e->id);


    $this->assertEquals(2, count($product->file_infos));

    $f = $product->file_infos[0];
    $this->assertEquals(4197382, $f->file_size);
    $this->assertEquals("e9353ce40eaa677f8c5d666c2f8bbb3f", $f->md5);
    $this->assertEquals("epub", $f->file_type);
    $this->assertEquals(new DateTime("2012-12-30 15:18 +00:00"), $f->updated_at);
    $this->assertEquals(765, $f->id);

    $f = $product->file_infos[1];
    $this->assertEquals(9177122, $f->file_size);
    $this->assertEquals("44452923564374efebc5bfe1059f5fb8", $f->md5);
    $this->assertEquals("mobi", $f->file_type);
    $this->assertEquals(new DateTime("2012-12-30 15:18 +00:00"), $f->updated_at);
    $this->assertEquals(766, $f->id);
  }

  public function test_thema() {
    $product = $this->load("onix_subjects_example.xml");

    $this->assertEquals(3, count($product->thema_subjects));

    $s1 = $product->thema_subjects[0];

    $this->assertEquals("JWCM", $s1->code);
    $this->assertEquals("Społeczeństwo i nauki społeczne / Działania wojenne i obronność / Siły zbrojne / Lotnictwo wojskowe i wojna w powietrzu", $s1->heading_text);

    $s2 = $product->thema_subjects[1];

    $this->assertEquals("1DTP", $s2->code);
    $this->assertEquals("Kwalifikatory geograficzne / Europa / Europa Wschodnia / Polska", $s2->heading_text);

    $s3 = $product->thema_subjects[2];

    $this->assertEquals("3MPBGH", $s3->code);
    $this->assertEquals("Kwalifikatory chronologiczne / od ok. 1500 do dzisiaj / XX wiek (ok. 1900–1999) " .
                         "/ 1. poł. XX wieku (ok. 1900–1950) / Dwudziestolecie międzywojenne (ok. 1919–1939) / ok. 1920–1929", $s3->heading_text);

    $this->assertEquals(array("wojna", "Europa wschodnia"), $product->keywords);
  }

  public function test_all_possible_tags() {
    $product = $this->load("all_possible_tags.xml");

    $this->assertEquals("miękka", $product->cover_type);
    $this->assertEquals(12.99, $product->cover_price);
    $this->assertNull($product->currrent_price_until);
    $this->assertNull($product->future_cover_price);
    $this->assertNull($product->future_price_from);

    $this->assertEquals(5, $product->vat);
    $this->assertEquals("58.11.1", $product->pkwiu);

    $this->assertEquals("fdb8fa072be774d97a97", $product->record_reference);

    $this->assertEquals("03", $product->notification_type);
    $this->assertEquals("Record had many errors", $product->deletion_text);

    $this->assertEquals("9788324799992", $product->isbn13);
    $this->assertEquals("9788324788882", $product->ean);

    $this->assertEquals("00", $product->product_composition);
    $this->assertEquals("BA", $product->product_form);

    $this->assertEquals(195, $product->height);
    $this->assertEquals(125, $product->width);
    $this->assertEquals(20, $product->thickness);
    $this->assertEquals(90, $product->weight);

    $this->assertEquals(1, count($product->series));
    $this->assertEquals($product->series[0][0], "Publisher series title");
    $this->assertEquals($product->series[0][1], "Vol. 1");

    $this->assertEquals("Original title", $product->original_title);
    $this->assertEquals("Trade title", $product->trade_title);
    $this->assertEquals($product->full_title, "Collection title (Vol. 1). Title. Subtitle (part 5)");

    $this->assertEquals(1, count($product->contributors));
    $c = $product->contributors[0];

    $this->assertEquals("B06", $c->role);
    $this->assertEquals("pol", $c->from_language);
    $this->assertEquals("prof. Henryk von Sienkiewicz Ibrahim", $c->person_name);
    $this->assertEquals("prof.", $c->titles_before_names);
    $this->assertEquals("Henryk", $c->names_before_key);
    $this->assertEquals("von", $c->prefix_to_key);
    $this->assertEquals("Sienkiewicz", $c->key_names);
    $this->assertEquals("Ibrahim", $c->names_after_key);
    $this->assertEquals("Sienkiewicz's biography", $c->biographical_note);

    $this->assertEquals("second edition", $product->edition_statement);

    $this->assertEquals(1, count($product->languages));
    $this->assertEquals("01", $product->languages[0]->role);
    $this->assertEquals("pol", $product->languages[0]->code);

    $this->assertEquals(250, $product->number_of_pages);
    $this->assertEquals(32, $product->number_of_illustrations);

    $this->assertEquals(2, count($product->subjects));
    $this->assertFalse(isset($product->subjects[1]->main_subject));

    $s = $product->subjects[0];

    $this->assertTrue(isset($s->main_subject));
    $this->assertEquals(24, $s->scheme_identifier);
    $this->assertEquals("elibri.com.pl", $s->scheme_name);
    $this->assertEquals("1.0", $s->scheme_version);
    $this->assertEquals("1110", $s->code);
    $this->assertEquals("Beletrystyka / Literatura popularna / Powieść historyczna", $s->heading_text);

    $this->assertEquals(7, $product->reading_age_from);
    $this->assertEquals(25, $product->reading_age_to);

    $bk = $product->reviews[0];
    $this->assertEquals("07", $bk->type);
    $this->assertEquals("Jan Kowalski", $bk->author);
    $this->assertEquals("This book is purely <strong>awesome!</strong>", trim($bk->text));

    $this->assertEquals(1, count($product->supporting_resources));

    $cvr = $product->supporting_resources[0];

    $this->assertEquals("01", $cvr->content_type);
    $this->assertEquals("03", $cvr->mode);
    $this->assertEquals("02", $cvr->form);
    $this->assertEquals("http://elibri.com.pl/path/to/file.png", $cvr->link);

    $this->assertEquals("National Geographic", $product->imprint_name);
    $this->assertEquals("GREG", $product->publisher_name);

    $this->assertEquals("04", $product->publishing_status);

    $this->assertEquals("01", $product->publishing_date->role);
    $this->assertEquals("05", $product->publishing_date->format);
    $this->assertEquals("2011", $product->publishing_date->date);

    $this->assertEquals("04", $product->sales_restrictions_info->type);
    $this->assertEquals("sklep.gildia.pl", $product->sales_restrictions_info->outlet_name);
    $this->assertEquals("20120722", $product->sales_restrictions_info->end_date);

    $this->assertEquals(2, count($product->related_products));

    $rp = $product->related_products[0];

    $this->assertEquals("24", $rp->relation_code);
    $this->assertEquals("9788324705818", $rp->isbn13);

    $rp = $product->related_products[1];
    $this->assertEquals("23", $rp->relation_code);
    $this->assertEquals("9788324799992", $rp->isbn13);


    $this->assertEquals(2, count($product->supply_details));

    $sd = $product->supply_details[0];

    $this->assertEquals("03", $sd->supplier->role);
    $this->assertEquals("5213359408", $sd->supplier->nip());
    $this->assertEquals("Gildia.pl", $sd->supplier->name);
    $this->assertEquals("22 631 40 83", $sd->supplier->telephone_number);
    $this->assertEquals("bok@gildia.pl", $sd->supplier->email_address);
    $this->assertEquals("http://gildia.pl", $sd->supplier->website);


    $this->assertEquals("21", $sd->product_availability);
    $this->assertEquals(1000, $sd->on_hand);
    $this->assertEquals(07, $sd->proximity);
    $this->assertEquals("MORE_THAN", $sd->proximity_name);

    $this->assertEquals(7, $sd->pack_quantity);

    $pr = $sd->prices[0];
    $this->assertEquals("02", $pr->type);
    $this->assertEquals(20, $pr->minimum_order_quantity);
    $this->assertEquals(12.99, $pr->amount);
    $this->assertEquals(7, $pr->vat);
    $this->assertEquals("PLN", $pr->currency_code);
    $this->assertEquals("02", $pr->printed_on_product);
  }

  public function test_audiobook() {
    $product = $this->load("audiobook.xml");

    $this->assertEquals(1, count($product->excerpt_infos));
    $e = $product->excerpt_infos[0];

    $this->assertEquals(2589928, $e->file_size);
    $this->assertEquals("0bf20c528f323dd2a6d91627ccddf52e", $e->md5);
    $this->assertEquals("mp3_excerpt", $e->file_type);
    $this->assertEquals(new DateTime("2019-07-12 21:58 +00:00"), $e->updated_at);
    $this->assertEquals("https://www.elibri.com.pl/excerpt/109048/0bf20c528f323dd2a6d91627ccddf52e/kwiaty-dla-algernona-fragment.mp3", $e->link);
    $this->assertEquals(109048, $e->id);

    $this->assertEquals(524, $product->duration);
    $this->assertEquals("AUDIO_DOWNLOADABLE_FILE", $product->product_form_name);
  }

  public function test_puzzle_extra_attributes() {
    $product = $this->load("onix_puzzle_example.xml");

    $this->assertEquals(25, $product->number_of_pieces);
  }

  public function test_board_game_extra_attributes() {
    $product = $this->load("onix_board_game_example.xml");

    $this->assertEquals(2, $product->players_number_from);
    $this->assertEquals(5, $product->players_number_to);
    $this->assertEquals(20, $product->playing_time_from);
    $this->assertNull($product->playing_time_to);
  }

  public function test_onix_with_unknow_dict_values() {
    $product = $this->load("unknow_fields.xml");

    #głównie chodzi o to, żeby parsowanie onix-a zakończyło się bez błędu
    $this->assertEquals("AL", $product->product_form);
  }

  public function test_onix_with_classification_and_production_country() {
    $product = $this->load("onix_cn_production_country_example.xml");

    $this->assertEquals("4901", $product->cn_code);
    $this->assertEquals("DE", $product->country_of_manufacture);
  }

  public function test_future_price_change() {

    $product = $this->load("onix_future_price_change_example.xml");
    $this->assertEquals(12.99, $product->cover_price);
    $this->assertEquals(new DateTime("2022-03-31"), $product->currrent_price_until);

    $this->assertEquals(13.99, $product->future_cover_price);
    $this->assertEquals(new DateTime("2022-04-01"), $product->future_price_from);



  }

}


?>
