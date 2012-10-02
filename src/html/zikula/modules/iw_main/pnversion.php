<?php
// THIS MODULE IS NOT ABSOLUTELY FINISHED

 /**
 * Load the module version information
 *
 * @author		Albert Pérez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_main');
$modversion['name'] = 'iw_main';
$modversion['version'] = '2.0';
$modversion['description'] = __('Module description', $dom);
$modversion['displayname'] = 'Intraweb';
$modversion['url'] = __('iw_main', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort & Robert Barrera';
$modversion['contact'] = 'aperezm@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_main::' => '::');

