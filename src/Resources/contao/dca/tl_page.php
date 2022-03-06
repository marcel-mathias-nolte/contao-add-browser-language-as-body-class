<?php

$GLOBALS['TL_DCA']['tl_page']['fields']['mmnDetectableLanguages'] = array
(
    'exclude'                 => true,
    'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
    'inputType'               => 'text',
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_page']['fields']['mmnFallbackLanguage'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(2) NOT NULL default 'en'"
);
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] .= ';{browser_language_detection_legend},mmnDetectableLanguages,mmnFallbackLanguage';
