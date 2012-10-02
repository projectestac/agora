<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  provide general information to the system
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost 
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------

$modversion['name'] 			= 'Downloads';
$modversion['displayname']      = 'Downloads';
$modversion['version'] 			= '2.4';
$modversion['description'] 		= 'Zikula File Management';
$modversion['help'] 			= 'pndocs/install.txt';
$modversion['credits'] 			= 'pndocs/credits.txt';
$modversion['changelog'] 		= 'pndocs/changelog.txt';
$modversion['license'] 			= 'pndocs/license.txt';
$modversion['official'] 		= 1;
$modversion['author'] 			= 'Sascha Jost';
$modversion['contact'] 			= 'http://www.cmods-dev.de';
$modversion['admin'] 			= 1;
$modversion['securityschema'] 	= array('Downloads::' 		  => '::',
										'Downloads::Category' => 'CategoryID::',
                                        'Downloads::Add'      => '::',
									    'Downloads::Modify'   => 'ID::', // not used
									    'Downloads::Item'     => 'ID::');
?>