<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnversion.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

/**
 * Load the module version information
 *
 * @author		Albert Pérez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('Files');
$modversion['name'] = 'Files';
$modversion['version'] = '1.2';
$modversion['description'] = __('File manager for Zikula sites.', $dom);
$modversion['displayname'] = __('File Manager', $dom);
$modversion['url'] = __('files', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Albert Perez Monfort , Robert Barrera i Fèlix Casanellas';
$modversion['contact'] = 'aperezm@xtec.cat';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('Files::' => '::');
