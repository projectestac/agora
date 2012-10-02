<?php
 /**
 * Load the module version information
 *
 * @author		Fèlix Casanellas (felix.casanellas@gmail.com)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('Export');
$modversion['name'] = 'Export';
$modversion['version'] = '0.1';
$modversion['description'] = __('Allow to export module\'s content from a Zikula\'s installation to another', $dom);
$modversion['displayname']    = __('Export', $dom);
$modversion['url'] = __('Export', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Fèlix Casanellas';
$modversion['contact'] = 'felix.casanellas@gmail.com';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_agendas::' => '::');
