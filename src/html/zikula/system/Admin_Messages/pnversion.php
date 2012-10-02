<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Admin_Messages
*/

$modversion['name']           = 'Admin_Messages';
$modversion['displayname']    = __('Admin messages manager');
$modversion['description']    = __("Provides a means of publishing, editing and scheduling special announcements from the site administrator.");
//! module name that appears in URL
$modversion['url']            = __('adminmessages');
$modversion['version']        = '2.2';

$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Mark West';
$modversion['contact']        = 'http://www.markwest.me.uk';

$modversion['securityschema'] = array('Admin_Messages::' => 'message title::message id');
