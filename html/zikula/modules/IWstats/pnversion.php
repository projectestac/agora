<?php

$dom = ZLanguage::getModuleDomain('IWstats');
$modversion['name'] = 'IWstats';
$modversion['displayname'] = __('IWstats', $dom);
$modversion['url'] = __('IWstats', $dom);
$modversion['description'] = __('Display site statistics.', $dom);
$modversion['version'] = '0.2';
$modversion['official'] = 0;
$modversion['admin'] = 1;
$modversion['securityschema'] = array('IWstats::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
        'minversion' => '1.1',
        'maxversion' => '',
        'status' => PNMODULE_DEPENDENCY_REQUIRED));