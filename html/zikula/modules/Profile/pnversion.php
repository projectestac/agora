<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 105 2010-02-05 17:08:33Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 */

$dom = ZLanguage::getModuleDomain('Profile');

$modversion['name']           = 'Profile';
$modversion['oldnames']       = array('Your_Account', 'Members_List');
$modversion['displayname']    = __('Profile manager', $dom);
$modversion['description']    = __("Provides a personal account control panel for each registered user, an interface to administer the personal information items displayed within it, and a registered users list functionality. Works in close unison with the 'Users' module.", $dom);
//! module name that appears in URL
$modversion['url']            = __('profile', $dom);
$modversion['version']        = '1.5.2';

$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = true;
$modversion['profile']        = true;
$modversion['author']         = 'Mateo Tibaquirá, Mark West, Franky Chestnut';
$modversion['contact']        = 'http://nestormateo.com/, http://www.markwest.me.uk/, http://dev.pnconcept.com/';

$modversion['securityschema'] = array('Profile::' => '::',
                                      'Profile::item' => 'DynamicUserData PropertyName::DynamicUserData PropertyID',
                                      'Profile:Members:' => '::',
                                      'Profile:Members:recent' => '::',
                                      'Profile:Members:online' => '::');
