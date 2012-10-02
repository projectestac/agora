<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Referers
 */

$dom = ZLanguage::getModuleDomain('Referers');
$modversion['name']           = 'HTTP_Referers';
$modversion['displayname']    = __('HTTP Referers', $dom);
$modversion['url']    = __('HTTP_Referers', $dom);
$modversion['description']    = __('View HTTP referer statistics.', $dom);
$modversion['version'] = '2.1';
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = '';
$modversion['changelog'] = '';
$modversion['license'] = '';
$modversion['official'] = 1;
$modversion['author'] = 'The Zikula Development Team';
$modversion['contact'] = 'http://www.zikula.org/';
$modversion['securityschema'] = array('Referers::' => '::');
