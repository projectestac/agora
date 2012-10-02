<?php
// THIS MODULE IS NOT ABSOLUTELY FINISHED

 /**
 * Load the module version information
 *
 * @author		Albert Pérez Monfort (aperezm@xtec.cat)
 * @author		Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_bookings');
$modversion['name'] = 'iw_bookings';
$modversion['version'] = '2.0';
$modversion['description'] = __('Allows the creation of items to be reserved', $dom);
$modversion['displayname'] = __('Bookings', $dom);
$modversion['url'] = __('iw_bookings', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort & Josep Ferràndiz Farré';
$modversion['contact'] = 'aperezm@xtec.cat / jferran6@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_bookings::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
						'minversion' => '2.0',
						'maxversion' => '',
						'status' => PNMODULE_DEPENDENCY_REQUIRED));
?>
