<?php
// THIS MODULE IS NOT ABSOLUTELY FINISHED

 /**
 * Load the module version information
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @author		Josep FerrÃ ndiz FarrÃ© (jferran6@xtec.cat)
 * @return		The version information
 */
$dom=ZLanguage::getModuleDomain('iw_timeFrames'); 
$modversion['name'] = 'iw_TimeFrames';
$modversion['version'] = '2.0';
$modversion['description'] = __('Allows to set timetables frames.', $dom);
$modversion['displayname'] = __('TimeFrames', $dom);
$modversion['url'] = __('iw_timeFrames', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort & Josep Ferràndiz Farré';
$modversion['contact'] = 'aperezm@xtec.cat / jferran6@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_TimeFrames::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
											'minversion' => '1.3',
											'maxversion' => '',
											'status' => PNMODULE_DEPENDENCY_REQUIRED));
?>
