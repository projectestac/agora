<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnversion.php 75 2009-02-24 04:51:52Z mateo $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West [markwest]
 * @author     Mateo Tibaquira [mateo]
 * @author     Erik Spaan [espaan]
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

$dom = ZLanguage::getModuleDomain('News');

$modversion['name']        = 'News';
$modversion['displayname'] = __('News publisher', $dom);
$modversion['description'] = __('Provides the ability to publish and manage news articles contributed by site users, with support for news categories and various associated blocks.', $dom);
$modversion['version']     = '2.5.2';
//! this defines the module's url
$modversion['url']            = __('news', $dom);

$modversion['credits']     = 'pndocs/credits.txt';
$modversion['help']        = 'pndocs/install.txt';
$modversion['changelog']   = 'pndocs/changelog.txt';
$modversion['license']     = 'pndocs/license.txt';
$modversion['official']    = 1;
$modversion['author']      = 'Mark West, Mateo Tibaquira, Erik Spaan';
$modversion['contact']     = 'http://code.zikula.org/news';

$modversion['securityschema'] = array('News::' => 'Contributor ID::Article ID');
