<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: encodeurl.php 69 2009-12-05 10:28:06Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * form custom url string
 *
 * @author Mark West
 * @return string custom url string
 */
function Profile_userapi_encodeurl($args)
{
    // check we have the required input
    if (!isset($args['modname']) || !isset($args['func']) || !isset($args['args'])) {
        return LogUtil::registerArgsError();
    }

    if (!isset($args['type'])) {
        $args['type'] = 'user';
    }

    // create an empty string ready for population
    $vars = '';

    // let the core handled everything except the view function
    if ($args['func'] == 'view' && (isset($args['args']['uname']) || isset($args['args']['uid']))) {
        isset($args['args']['uname']) ? $vars = $args['args']['uname'] : $vars = $args['args']['uid'];
    } else {
        return false;
    }

    if (isset($args['args']['page'])) {
        $vars .= "/{$args['args']['page']}";
    }

    // construct the custom url part
    return $args['modname'] . '/' . $args['func'] . '/' . $vars;
}
