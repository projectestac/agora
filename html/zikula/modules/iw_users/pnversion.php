<?php
 /**
 * Load the module version information
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom=ZLanguage::getModuleDomain('iw_users'); 
$modversion['name'] = 'iw_users';
$modversion['version'] = '2.0';
$modversion['description'] = __('Improves the chances of users of the module', $dom);
$modversion['displayname'] = __('Extra users', $dom);
$modversion['url'] = __('iw_users', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort';
$modversion['contact'] = 'aperezm@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_users::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
										  'minversion' => '1.1',
										  'maxversion' => '',
										  'status' => PNMODULE_DEPENDENCY_REQUIRED));
