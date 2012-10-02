<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 26422 2009-08-28 15:29:44Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage PendingContent
 */

// get translation domain for this module
$dom = ZLanguage::getModuleDomain('PendingContent');

$modversion['name']           = 'PendingContent';
$modversion['displayname']    = __('Pending Content', $dom);
$modversion['url']            = __('pendingcontent', $dom);
$modversion['description']    = __('Display any unapproved content items.', $dom);
$modversion['version']        = '1.1';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'PendingContent Development Team';
$modversion['contact']        = 'http://code.zikula.org/pendingcontent/';
$modversion['securityschema'] = array('pendingcontent::' => '::');
