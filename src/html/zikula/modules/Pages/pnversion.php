<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 411 2010-04-23 16:02:49Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Pages
 */

$dom = ZLanguage::getModuleDomain('Pages');

$modversion['name']           = 'Pages';
$modversion['displayname']    = __('Static pages', $dom);
$modversion['description']    = __('Manager of the static pages of the site.', $dom);
$modversion['oldnames']       = array('Sections');
//! this defines the module's url
$modversion['url']            = __('pages', $dom);
$modversion['version']        = '2.4.1';

$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/install.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'The Zikula Development Team';
$modversion['contact']        = 'http://www.zikula.org/';

$modversion['securityschema'] = array('Pages::'         => 'Page name::Page ID',
                                      'Pages:category:' => 'Category ID::');
