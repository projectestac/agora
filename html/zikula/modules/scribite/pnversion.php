<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnversion.php 208 2009-12-16 09:05:52Z hilope $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage scribite!
 */

$dom = ZLanguage::getModuleDomain('scribite');

$modversion['name'] = 'scribite';
$modversion['displayname'] = 'scribite!';
$modversion['url'] = 'scribite';
$modversion['version'] = '4.1';
$modversion['description'] = 'WYSIWYG for Zikula';
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/scribite!-documentation-eng.pdf';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'sven schomacker aka hilope';
$modversion['contact'] = 'http://code.zikula.org/scribite/';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('scribite::' => 'Modulename::');

