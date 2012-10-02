<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 27323 2009-11-01 08:09:23Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage legal
 */

$dom = ZLanguage::getModuleDomain('legal');

$modversion['name']           = 'legal';
$modversion['displayname']    = __('Legal info manager', $dom);
$modversion['description']    = __("Provides an interface for managing the site's 'Terms of use', 'Privacy statement' and 'Accessibility statement'.", $dom);
//! module name that appears in URL
$modversion['url']            = __('legalmod', $dom);
$modversion['version']        = '1.3';

$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/install.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Michael M. Wechsler';
$modversion['contact']        = 'michael@thelaw.com';

$modversion['securityschema'] = array('legal::' => '::',
                                      'legal::termsofuse' => '::',
                                      'legal::privacy' => '::',
                                      'legal::accessibilitystatement' => '::');
