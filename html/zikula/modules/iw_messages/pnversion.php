<?php
 /**
 * Load the module version information
 *
 * @author		Albert PÃ©rez Monfort (intraweb@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_messages');
$modversion['name'] = 'iw_messages';
$modversion['version'] = '2.0';
$modversion['description'] = __('Allow to send private messages between users', $dom);
$modversion['displayname']    = __('IWMessages', $dom);
$modversion['url']    = __('iw_messages', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Richard Tirtadji & Albert Pérez Monfort';
$modversion['contact'] = 'rtirtadji@hotmail.com & aperezm@xtec.es';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_messages::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
											'minversion' => '1.3',
											'maxversion' => '',
											'status' => PNMODULE_DEPENDENCY_REQUIRED));
