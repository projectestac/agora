<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 400 2010-01-01 14:27:28Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Reviews
 */

$dom = ZLanguage::getModuleDomain('Reviews');

$modversion['name']           = 'Reviews';
$modversion['displayname']    = __('Reviews system', $dom);
$modversion['description']    = __('Reviews system module', $dom);
//! this defines the module's url
$modversion['url']            = __('reviews', $dom);
$modversion['version']        = '2.4';

$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/install.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Mark West';
$modversion['contact']        = 'http://www.markwest.me.uk/';

$modversion['securityschema'] = array('Reviews::' => 'Review name::Review ID');
