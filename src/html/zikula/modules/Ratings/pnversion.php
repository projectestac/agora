<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 17 2010-04-02 23:47:55Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

$dom = ZLanguage::getModuleDomain('Ratings');
$modversion['name']           = 'Ratings';
$modversion['displayname']    = __('Ratings', $dom);
$modversion['description']    = __('Rate Zikula items.', $dom);
$modversion['url'] = __(/*!module name that appears in URL*/'ratings', $dom);
$modversion['version'] = '2.2';

$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';

$modversion['official'] = true;

$modversion['author'] = 'Jim McDonald';
$modversion['contact'] = 'http://www.mcdee.net/';

$modversion['securityschema'] = array('Ratings::' => 'Module name:Rating type:Item ID');
