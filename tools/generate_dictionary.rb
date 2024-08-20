$KCODE = "UTF-8"

require 'yaml'

module Elibri
  module ONIX
    module Dict
      module Release_3_0;
        extend self

        class Base
          attr_reader :onix_code, :name, :const_name
        end

        def dump_dictionary(f, klass, klass_name)
           f.puts "//! @brief Słownik"
           f.puts "//! @ingroup dictionaries"
           f.puts "class ElibriDict#{klass_name} extends  ElibriDictElement {"
           f.puts
           f.puts "  private static $instance;"
           f.puts
           klass::ALL.each do |dict_item|
             if dict_item.const_name
                f.puts "  //! #{dict_item.name['pl']}"
                f.puts "  const #{dict_item.const_name} = '#{dict_item.onix_code}';"
                f.puts
             end
           end
           f.puts
           f.puts "  protected function __construct() {"
           f.puts"      parent::__construct(array("
           klass::ALL.each do |dict_item|
             entry = " " * 10
             entry << "new ElibriDictAtom('#{dict_item.onix_code}', "
             entry << "array('pl' => '#{dict_item.name['pl'].to_s.gsub("'", '\\\\\'')}', 'en' => '#{dict_item.name['en'].to_s.gsub("'", '\\\\\'')}'), "
             if dict_item.const_name
               entry << "'#{dict_item.const_name}'),\n"
             else
               entry << "NULL),\n"
             end
             f.puts entry
           end
           f.puts "      ));\n\n"
           f.puts "   }"
           f.puts
           f.puts  "  //! zwaca zawsze tą samą instancję obiektu, metoda wykorzystywana wewnętrznie"
           f.puts  "  protected static function getInstance() {"
           f.puts  "    if (empty(self::$instance)) {"
           f.puts  "       self::$instance = new ElibriDict#{klass_name}();"
           f.puts  "    }"
           f.puts  "    return self::$instance;"
           f.puts  "  }"
           f.puts
           f.puts  "  //! zwraca mapowanie dla kodu ONIX-a przekazanego w parametrze $code"
           f.puts  "  public static function byCode($code) {"
           f.puts  "    return self::getInstance()->atomByCode($code);"
           f.puts  "  }"
           f.puts  "}"

        end

        def dump_header(f, dictionaries)
          f.puts "<?php"
          f.puts "//this is generated file"
          f.puts "//please do not modify directly"
          f.puts "//to regenarate run 'ruby tools/generate_dictionary.rb'"

          f.puts "//! @defgroup dictionaries Słowniki"
          f.puts "//! @{"
          f.puts "//! Słowniki mapują kody ONIX-a na stałe i Stringi, w celu zwiększenia czytelności kodu"
          f.puts "//! @}"
          f.puts
        end

        def dump_footer(f)
          f.puts "?>"
        end

        def load_and_generate_php
          serialized_path = File.join(File.dirname(__FILE__), "serialized", "*.yml")
          serialized_path = File.expand_path(serialized_path)

          dictionaries = []
          Dir[serialized_path].each do |file|
            klass_name = File.basename(file, '.yml') # 'ResourceMode'
            klass = Class.new(Elibri::ONIX::Dict::Release_3_0::Base)
            const_set(klass_name, klass)
            klass.const_set(:ALL, YAML::unsafe_load_file(file))
            dictionaries << [klass, klass_name]
          end
          open(File.join(File.dirname(__FILE__), "../elibriPHP/elibriDefinitions.php"), "w") do |f|
            dump_header(f, dictionaries);
            dictionaries.each do |klass, klass_name|
              dump_dictionary(f, klass, klass_name)
            end
            dump_footer(f)
          end
        end

      end

      Release_3_0.load_and_generate_php

    end
  end
end
