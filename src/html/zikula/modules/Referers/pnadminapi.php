<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Referers
 */

/**
 * delete all referers
 *
 * @return   bool           true on success, false on failure
 */
function Referers_adminapi_delete($args)
{
    $dom = ZLanguage::getModuleDomain('Referers');
    // Security check
    if (!SecurityUtil::checkPermission('Referers::', '::', ACCESS_DELETE)) {
        return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
    }

    // truncate the table
    if (!DBUtil::truncateTable('referer')) {
        return LogUtil::registerError(__('Error! Sorry! Deletion attempt failed.', $dom));
    }

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function Referers_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('Referers');
    $links = array();

    pnModLangLoad('Pages', 'admin');

    if (SecurityUtil::checkPermission('Referers::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('Referers', 'admin', 'view'), 'text' => __('View referers', $dom));
    }
    if (SecurityUtil::checkPermission('Referers::', '::', ACCESS_DELETE)) {
        $links[] = array('url' => pnModURL('Referers', 'admin', 'delete'), 'text' => __('Reset referers', $dom));
    }
    if (SecurityUtil::checkPermission('Referers::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Referers', 'admin', 'modifyconfig'), 'text' => __('Settings', $dom));
    }

    return $links;
}
