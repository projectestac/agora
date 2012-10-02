<?php
 /**
 * Load the module version information
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom=ZLanguage::getModuleDomain('iw_vhmenu');
$modversion['name'] = 'iw_vhmenu';
$modversion['version'] = '2.0';
$modversion['description'] = __('Provides an interface to manage fully customizable JavaScript menu', $dom);
$modversion['displayname']    = __('VHMenu', $dom);
$modversion['url']    = __('iw_vhmenu', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort & Toni Ginard Lladó';
$modversion['contact'] = 'aperez16@xtec.cat & aginard@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_vhmenu::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
						'minversion' => '1.3',
						'maxversion' => '',
						'status' => PNMODULE_DEPENDENCY_REQUIRED));
