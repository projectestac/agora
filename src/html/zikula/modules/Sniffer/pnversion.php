<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 4 2009-11-09 12:38:09Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Sniffer
 */

$dom = ZLanguage::getModuleDomain('Sniffer');

$modversion['name']           = 'Sniffer';
$modversion['url']	      = __('sniffer', $dom);
$modversion['displayname']    = __('Sniffer', $dom);
$modversion['description']    = __('Browser detection and information.', $dom);
$modversion['version']        = '1.2';
$modversion['changelog']      = 'pndocs/CHANGES';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = '';
$modversion['license']        = 'pndocs/LICENSE';
$modversion['official']       = 1;
$modversion['author']         = 'Mark West';
$modversion['contact']        = 'http://www.zikula.org/';
$modversion['securityschema'] = array('Sniffer::' => '::');
