<?php
/**
 * Zikula Application Framework
 *
 * @link http://www.zikula.org
 * @version $Id: Loader.class.php 22543 2007-07-31 12:50:09Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Simon Birtwistle simon@itbegins.co.uk
 * @package Zikula_Docs
 * @subpackage Tour
 */
// get transation domain
$dom = ZLanguage::getModuleDomain('Tour');

$modversion['name']             = 'Tour';
$modversion['displayname']      = __('Tour', $dom);
//!module name that appears in URL
$modversion['url']              = __('tour', $dom);
$modversion['description']      = __('First time configuration and Zikula Tour.', $dom);
$modversion['version']          = '1.2';
$modversion['credits']          = 'pndocs/credits.txt';
$modversion['help']             = 'pndocs/install.txt';
$modversion['changelog']        = 'pndocs/changelog.txt';
$modversion['license']          = 'pndocs/license.txt';
$modversion['official']         = 1;
$modversion['author']           = 'Simon Birtwistle';
$modversion['contact']          = 'http://www.itbegins.co.uk';
$modversion['admin']            = 0;
$modversion['securityschema']   = array();
