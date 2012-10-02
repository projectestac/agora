<?php
 /**
 * Load the module version information
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_jclic');
$modversion['name'] = 'iw_jclic';
$modversion['version'] = '2.0';
$modversion['description'] = __('Statement', $dom);
$modversion['displayname']    = __('JClic', $dom);
$modversion['url'] = __('iw_jclic', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort';
$modversion['contact'] = 'aperezm@xtec.es';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_jclic::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
											'minversion' => '1.1',
											'maxversion' => '',
											'status' => PNMODULE_DEPENDENCY_REQUIRED));
