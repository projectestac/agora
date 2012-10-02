<?php
/** ----------------------------------------------------------------------
 *  LICENSE
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License (GPL)
 *  as published by the Free Software Foundation, either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  To read the license please visit http://www.gnu.org/copyleft/gpl.html
 *  ----------------------------------------------------------------------
 *  Copyright: Robert Gasch
 *  @package Zikula_Value_Addons
 *  @subpackage Thumbnail
 *  ----------------------------------------------------------------------
 */

$dom = ZLanguage::getModuleDomain('Thumbnail');
$modversion['name']           = 'Thumbnail';
//! module url in lowercase must be different to module name
$modversion['url']            = __('thumbnail', $dom);
$modversion['displayname']    = __('Thumbnail', $dom);
$modversion['description']    = __('Provides thumbnail generation facilities via userapi functions.', $dom);
$modversion['version']        = '1.2.1';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 0;
$modversion['author']         = 'Robert Gasch';
$modversion['contact']        = 'rgasch@gmail.com';
$modversion['admin']          = 1;
$modversion['securityschema'] = array('Thumbnail::' => '::');
