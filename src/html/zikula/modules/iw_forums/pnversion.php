<?php
 /**
 * Load the module version information
 *
 * @author		Albert Pï¿œrez Monfort (intraweb@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_forums');
$modversion['name'] = 'iw_forums';
$modversion['version'] = '2.0';
$modversion['description'] = __('Creation, managment and use of forums', $dom);
$modversion['displayname']    = __('IWForums', $dom);
$modversion['url'] = __('iw_forums', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort i Toni Ginard Lladó';
$modversion['contact'] = 'aperez16@xtec.cat, aginard@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_forums::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
											'minversion' => '1.1',
											'maxversion' => '',
											'status' => PNMODULE_DEPENDENCY_REQUIRED));
