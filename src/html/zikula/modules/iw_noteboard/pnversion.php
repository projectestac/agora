<?php
 /**
 * Load the module version information
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_noteboard');
$modversion['name'] ='iw_noteboard';
$modversion['version'] = '2.0';
$modversion['description'] = __('Provides a system to send small pieces of information to selected users. It has file support.', $dom);
$modversion['displayname']    = __('NoteBoard', $dom);
$modversion['url']=__('iw_noteboard',$dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort';
$modversion['contact'] = 'aperezm@xtec.es';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_noteboard::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
											'minversion' => '1.3',
											'maxversion' => '',
											'status' => PNMODULE_DEPENDENCY_REQUIRED));
