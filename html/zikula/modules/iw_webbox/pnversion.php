<?php
 /**
 * Load the module version information
 *
 * @author		Albert Pï¿œrez Monfort (intraweb@xtec.cat)
 * @return		The version information
 */
$dom=ZLanguage::getModuleDomain('iw_webbox'); 
$modversion['name'] = 'iw_webbox';
$modversion['version'] = '2.0';
$modversion['description'] = __('Description', $dom);
$modversion['displayname']    = __('Webbox', $dom);
$modversion['url']    = __('iw_webbox', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort (intraweb@xtec.cat)';
$modversion['contact'] = 'http://phobos.xtec.cat/intraweb';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_webbox::' => '::');
