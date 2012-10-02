<?php
 /**
 * Load the module version information
 *
 * @author		Fèlix Casanellas (fcasanel@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_chat');
$modversion['name'] = 'iw_chat';
$modversion['version'] = '0.1';
$modversion['description'] = __('Create chat rooms', $dom);
$modversion['displayname']    = __('IWChat', $dom);
$modversion['url'] = __('iw_chat', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Fèlix Casanellas';
$modversion['contact'] = 'fcasanel@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_chat::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
                                          'minversion' => '2.0',
                                          'maxversion' => '',
                                          'status' => PNMODULE_DEPENDENCY_REQUIRED));
