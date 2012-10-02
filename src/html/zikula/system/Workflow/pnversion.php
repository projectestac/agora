<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2006, Zikula Software Foundation
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Workflow
 */

$modversion['name']           = 'Workflow';
$modversion['displayname']    = __('Workflow manager');
$modversion['description']    = __('Provides a workflow engine, and an interface for designing and administering workflows comprised of actions and events.');
//! module name that appears in URL
$modversion['url']            = __('workflow');
$modversion['version']        = '1.1';

$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/manual.html';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/copying.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Drak';
$modversion['contact']        = 'drak@hostnuke.com';

$modversion['securityschema'] = array('Workflow::' => '::');
