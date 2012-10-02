<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package     Zikula_System_Modules
 * @subpackage  pnRender
 */

$modversion['name']           = 'pnRender';
$modversion['displayname']    = __('Rendering engine');
$modversion['description']    = __('Provides the core system with a Smarty-based engine to control content rendering and presentation.');
//! module name that appears in URL
$modversion['url']            = __('pnrender');
$modversion['version']        = '1.1';

$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'The Zikula development team';
$modversion['contact']        = 'http://www.zikula.org/';

$modversion['securityschema'] = array('pnRender::' => '::');
