<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2007, Intraweb project team
 * @link http://phobos.xtec.cat/intraweb
 * @version $Id: 
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Intraweb_modules
 * @subpackage iw_groups
 */
$dom = ZLanguage::getModuleDomain('iw_groups'); 
$modversion['name'] = __('iw_groups', $dom);
$modversion['version'] = '2.0';
$modversion['description'] = __('Allow the creation, edition and removing of user groups', $dom);
$modversion['displayname'] = __('IW Groups', $dom);
$modversion['url'] = __('iw_groups', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort';
$modversion['contact'] = 'aperezm@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_groups::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
						'minversion' => '0.1',
						'maxversion' => '',
						'status' => PNMODULE_DEPENDENCY_REQUIRED));
