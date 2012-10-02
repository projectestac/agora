<?php
 /**
 * Load the module version information
 *
 * @author		Albert Perez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom=ZLanguage::getModuleDomain('iw_menu');
$modversion['name'] = 'iw_menu';
$modversion['version'] = '1.0';
$modversion['description'] = __('Provides an interface to manage fully customizable menu', $dom);
$modversion['displayname']    = __('Menu', $dom);
$modversion['url']    = __('iw_menu', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Pérez Monfort, Toni Ginard Lladó & Pau Ferrer Ocaña';
$modversion['contact'] = 'aperez16@xtec.cat, aginard@xtec.cat & pferre22@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_menu::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
						'minversion' => '2.0',
						'maxversion' => '',
						'status' => PNMODULE_DEPENDENCY_REQUIRED));

/* TODO:
 * Active/Inactive by cliking on the bulb light
 * Make move-level more intuitive (drag'n'drop)
 * Configure width of the menus
 * Revision of the style CSS and div-itis
 * Separate CSS menu from CSS admin
 */

