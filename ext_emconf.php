<?php
$EM_CONF[$_EXTKEY] = array(
    'title'           => 'CrawlerCore',
    'description'     => 'Core crawler components',
    'category'        => 'plugin',
    'author'          => 'Stefan Bürk',
    'author_email'    => 'stefan.buerk@impactmedia.de',
    'dependencies'    => 'extbase,fluid',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'uploadfolder' => false,
    'author_company' => 'imp@ct.media GmbH',
    'version' => '0.0.1',
    'constraints' => array(
        'depends' => array(
            'typo3' => '8.7.13-9.5.99',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
    'autoload' => array(
        'psr-4'     => array('SBUERK\\CrawlerCore\\' => 'Classes'),
    ),
    '_md5_values_when_last_written' => 'a:9:{s:9:"ChangeLog";s:4:"691d";s:14:"ext_icon-1.gif";s:4:"1bdc";s:12:"ext_icon.png";s:4:"1bdc";s:14:"ext_tables.php";s:4:"f2fe";s:14:"ext_tables.sql";s:4:"5b48";s:16:"locallang_db.xml";s:4:"83fa";s:10:"README.txt";s:4:"ee2d";s:19:"doc/wizard_form.dat";s:4:"307d";s:20:"doc/wizard_form.html";s:4:"e542";}',
);