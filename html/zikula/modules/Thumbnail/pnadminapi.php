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

/**
 * get available admin panel links
 *
 * @return array array of admin links
 */
function Thumbnail_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('Thumbnail');
    if (!SecurityUtil::checkPermission('Thumbnail::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    pnModLangLoad('Thumbnail', 'admin');

    $links = array();
    $links[] = array('url' => pnModURL('Thumbnail', 'admin', 'preferences'), 'text' => __('Thumbnail Module Preferences', $dom));
    $links[] = array('url' => pnModURL('Thumbnail', 'admin', 'settings'),    'text' => __('phpThumb Settings', $dom));
    $links[] = array('url' => pnModURL('Thumbnail', 'admin', 'check'),       'text' => __('Check Settings', $dom));

    return $links;
}
