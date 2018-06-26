<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'BERGWERK Resources Slider',
    'description' => 'Renders page media resources recursively in fluid for slide use.',
    'category' => 'plugin',
    'author' => 'BERGWERK',
  	'author_email' => 'technik@bergwerk.ag',
  	'author_company' => 'BERGWERK Werbeagentur GmbH',
  	'state' => 'stable',
    'version' => '1.1.5',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.0-7.6.99',
            'bwrk_utility' => '2.0.2-2.9.99'
        ),
        'conflicts' => array(),
        'suggests' => array()
    )
);