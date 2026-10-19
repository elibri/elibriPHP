# Generuje przykłady ONIX z gemu elibri_onix_examples, tak jak zwraca je API w dialekcie 3.0.2.
# Uruchom w kontekście aplikacji elibri_gui, np.:
#   cd ../elibri_gui && bin/rails runner ../elibriPHP/tools/generate_examples.rb /tmp/onix_examples
# a następnie skopiuj potrzebne pliki do tests/xml.

out = ARGV[0] or abort("usage: bin/rails runner generate_examples.rb OUTPUT_DIR")
FileUtils.mkdir_p(out)

ONIX::ProductExample.methods.grep(/^pl_onix_/).sort.each do |name|
  record = ONIX::ProductExample.prepare_example_record(ONIX::ProductExample.send(name))
  xml = ONIX::XmlGenerator.new(record, elibri_onix_dialect: '3.0.2', xml_variant: Elibri::XmlVariant::FULL_VARIANT,
                               export_headers: true, lan: Settings.editor.default_product_language,
                               availability_provider: ONIX::AvailabilityProvider::DefaultProvider.new(czytnix_infos: false)).onix
  File.write(File.join(out, "#{name.to_s.delete_prefix('pl_')}.xml"), xml)
end
