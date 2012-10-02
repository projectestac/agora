<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2003, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Errors
 */

$modversion['name']           = 'Errors';
$modversion['displayname']    = __('Error logger');
$modversion['description']    = __('Provides the core system of the site with error-logging capability.');
//! module name that appears in URL
$modversion['url']            = __('errorlogger');
$modversion['version']        = '1.1';

$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Brian Lindner <Furbo>';
$modversion['contact']        = 'furbo@sigtauonline.com';

$modversion['securityschema'] = array('Errors::' => '::');
