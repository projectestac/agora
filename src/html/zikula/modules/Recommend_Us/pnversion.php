<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 338 2009-11-09 09:49:45Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Recommend_Us
 */

$dom = ZLanguage::getModuleDomain('Recommend_Us');
$modversion['name']           = 'Recommend_Us';
$modversion['displayname']    = __('Recommend Us', $dom);
//! module URL must be different to displayname
$modversion['url']    = __('recommend_us', $dom);
$modversion['description']    = __('Recommend site/Send articles Module.', $dom);
$modversion['version'] = '1.2';
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = '';
$modversion['changelog'] = '';
$modversion['license'] = '';
$modversion['official'] = 1;
$modversion['author'] = 'Mark West';
$modversion['contact'] = 'http://www.markwest.me.uk/';
$modversion['securityschema'] = array('Recommend us::' => '::');
