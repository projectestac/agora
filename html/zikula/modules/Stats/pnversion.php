<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

$dom = ZLanguage::getModuleDomain('Stats');
$modversion['name']           = 'Stats';
$modversion['displayname']    = __('Stats', $dom);
$modversion['url']    = __('statistics', $dom);
$modversion['description']    = __('Display site statistics.', $dom);
$modversion['version'] = '2.3';
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/install.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 1;
$modversion['author'] = 'Mark West';
$modversion['contact'] = 'http://www.markwest.me.uk';
$modversion['securityschema'] = array('Stats::' => '::');
$modversion['dependencies']    = array(array('modname'    => 'Sniffer', 
                                             'minversion' => '1.1',
                                             'maxversion' => '',
                                             'status'     => PNMODULE_DEPENDENCY_REQUIRED));
