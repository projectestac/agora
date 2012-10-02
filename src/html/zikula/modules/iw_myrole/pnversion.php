<?php
 /**
 * Load the module version information
 *
 * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_myrole');
$modversion['name'] = 'iw_myrole';
$modversion['version'] = '2.0';
$modversion['description'] = __('Allow users to change their roles or groups.', $dom);
$modversion['displayname'] = __('myRole', $dom);
$modversion['url']=__('iw_myrole', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort & Josep Ferràndiz Farré';
$modversion['contact'] = 'aperezm@xtec.es & jferran6@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_myrole::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
						'minversion' => '1.0',
						'maxversion' => '',
						'status' => PNMODULE_DEPENDENCY_REQUIRED));
