<?php

/**
 * Zikula Application Framework
 *
 * @package	XTEC advMailer
 * @author	Francesc Bassas i Bullich
 * @license	GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Get available admin panel links
 *
 * @author Francesc Bassas i Bullich
 * @return array array of admin links
 */
function advMailer_adminapi_getlinks()
{
    $links = array();

    if (SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('advMailer', 'admin', 'testconfig'), 'text' => __('Test current settings'));
    }
    if (SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('advMailer', 'admin', 'modifyconfig'), 'text' => __('Settings'));
    }

    return $links;
}