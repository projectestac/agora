<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: decodeurl.php 69 2009-12-05 10:28:06Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * decode the custom url string
 *
 * @author Mark West
 * @return bool true if successful, false otherwise
 */
function Profile_userapi_decodeurl($args)
{
    // check we actually have some vars to work with...
    if (!isset($args['vars'])) {
        return LogUtil::registerArgsError();
    }

    // let the core handled everything except the view function
    if (!isset($args['vars'][2]) || empty($args['vars'][2]) || $args['vars'][2] != 'view') {
        return false;
    }
    pnQueryStringSetVar('func', 'view');

    // identify the correct parameter to identify the user
    if (isset($args['vars'][3])) {
        if (is_numeric($args['vars'][3])) {
            pnQueryStringSetVar('uid', $args['vars'][3]);
        } else {
             pnQueryStringSetVar('uname', $args['vars'][3]);
        }
    }

    if (isset($args['vars'][4])) {
        pnQueryStringSetVar('page', $args['vars'][4]);
    }

    return true;
}
