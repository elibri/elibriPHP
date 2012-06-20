<?php

$spec = Pearfarm_PackageSpec::create(array(Pearfarm_PackageSpec::OPT_BASEDIR => dirname(__FILE__)))
             ->setName('elibriPHP')
             ->setChannel('elibri.com.pl/system/pear')
             ->setSummary('Biblioteka abstrahująca dostęp do API elibri')
             ->setDescription('Źródła do projektu znajdziesz pod adresem https://github.com/elibri/elibriPHP,
                               dokumentację pod adresem http://elibri.com.pl/system/doc/php/, 
                               kanał PEAR pod adresem http://elibri.com.pl/system/pear/')
             ->setReleaseVersion('0.1.2')
             ->setReleaseStability('beta')
             ->setApiVersion('3.0.1')
             ->setApiStability('beta')
             ->setLicense(Pearfarm_PackageSpec::LICENSE_MIT)
             ->setNotes('Rozszerzona lista języków')
             ->addMaintainer('lead', 'Tomasz Meka', '', 'kontakt@elibri.com.pl')
             ->addFilesRegex("/elibriPHP\/.*php$/", $role= "php")
             ->addFilesRegex("/tests\//", $role= "test")
             ->addFilesRegex("/examples\/.*php$/", $role= "php")
             ->addFilesSimple("elibriPHP.php", $role= "php", array('baseinstalldir' => "/"))
             ->addFilesRegex("/html\//", $role= "doc")
             //->addGitFiles()
             //->addExecutable('Elibri.php')
             ;
