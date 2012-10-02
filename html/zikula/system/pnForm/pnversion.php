<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2007, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 19260 2006-06-12 13:08:15Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author      Jorn Wildt
 * @package     Zikula_System_Modules
 * @subpackage  pnForm
 */

$modversion['name']           = 'pnForm';
$modversion['displayname']    = __('Forms manager');
$modversion['description']    = __("Provides a framework for standardised presentation of the site's forms.");
//! module name that appears in URL
$modversion['url']            = __('pnforms');
$modversion['version']        = '1.1';

$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'The Zikula development team';
$modversion['contact']        = 'http://www.zikula.org/';

$modversion['securityschema'] = array('pnRender::' => '::');
