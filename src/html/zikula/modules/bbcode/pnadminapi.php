<?php
// $Id: pnadminapi.php 217 2009-11-12 17:06:36Z herr.vorragend $
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

/**
 * @package Zikula_Utility_Modules
 * @subpackage bbcode
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function bbcode_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('bbcode');

    $links = array();
    if (SecurityUtil::checkPermission('bbcode::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('bbcode', 'admin', 'main'),    'text' => __('Start', $dom),  'title' => __('Start', $dom));
        $links[] = array('url' => pnModURL('bbcode', 'admin', 'config'),  'text' => __('Settings', $dom),  'title' => __('Settings', $dom));
    }
    return $links;
}
