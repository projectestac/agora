<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 358 2009-11-11 13:46:21Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Quotes
*/

$vrdom = ZLanguage::getModuleDomain('Quotes');

$modversion['name']           = 'Quotes';
$modversion['displayname']    = __('Quotes', $vrdom);
$modversion['description']    = __('Random quotes', $vrdom);
$modversion['version']        = '2.3';
//! this defines the module's url
$modversion['url']            = __('quotes', $vrdom);
$modversion['changelog']      = '';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = '';
$modversion['license']        = '';
$modversion['official']       = 1;
$modversion['author']         = 'The Zikula Development Team';
$modversion['contact']        = 'http://www.zikula.org';

$modversion['securityschema'] = array('Quotes::' => 'Author name::Quote ID');
