<?php

/* * ********************************************************************* */
/* IWmoodle                  (Version.php)                             */
/* * ********************************************************************* */
$dom = ZLanguage::getModuleDomain('IWmoodle');
$modversion['name'] = 'Moodle2';  //Module name
$modversion['version'] = '2.0';  //Version number
$modversion['description'] = __('Integration of Moodle2 into PostNuke', $dom);  //Module description
$modversion['credits'] = '';  //Credits file
$modversion['url'] = __('IWmoodle', $dom);
$modversion['help'] = 'pndocs/readme.txt';  //Help file
$modversion['changelog'] = '';  //Change log file
$modversion['license'] = 'pndocs/license.txt';  //License file
$modversion['official'] = '0';  //Official PostNuke Approved Module 1 = yes, 0 = no
$modversion['author'] = 'Albert Pérez Monfort';  //Author
$modversion['contact'] = 'aperezm@xtec.cat';  //The authors website or contact email address
$modversion['admin'] = 1;
$modversion['securityschema'] = array('IWmoodle::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
        'minversion' => '2.0',
        'maxversion' => '',
        'status' => PNMODULE_DEPENDENCY_REQUIRED));
