<?php
 /**
 * Load the module version information
 *
 * @author		Sara Arjona Tï¿œllez (sarjona@xtec.cat)
 * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_qv');
$modversion['name'] = 'iw_qv';
$modversion['version'] = '2.0';
$modversion['description'] = __('Allows assign assessments to users designated', $dom);
$modversion['displayname']    = __('Quaderns Virtuals', $dom);
$modversion['url']= __('iw_qv',$dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Sara Arjona Téllez';
$modversion['contact'] = 'sarjona@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_qv::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
										  'minversion' => '1.3',
										  'maxversion' => '',
										  'status' => PNMODULE_DEPENDENCY_REQUIRED));
