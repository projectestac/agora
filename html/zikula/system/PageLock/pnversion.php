<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage PageLock
 */

$modversion['name']           = 'PageLock';
$modversion['displayname']    = __('Page lock manager');
$modversion['description']    = __('Provides the ability to lock pages when they are in use, for content and access control.');
//! module name that appears in URL
$modversion['url']            = __('pagelock');
$modversion['version']        = '1.1';

$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/install.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Jorn Wildt';
$modversion['contact']        = 'http://www.elfisk.dk';

$modversion['securityschema'] = array('PageLock::' => '::');
