<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: ezcomments.php 69 2009-12-05 10:28:06Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
*/

/**
 * Section to show the latest comments of an user
 *
 * @author Mateo Tibaquira
 * @param  integer   numitems   number of comments to show
 * @return array of comments
 */
function Profile_sectionapi_ezcomments($args)
{
    // validates an the uid parameter
    if (!isset($args['uid']) || empty($args['uid'])) {
        return false;
    }

    // assures the number of items to retrieve
    if (!isset($args['numitems']) || empty($args['numitems'])) {
        $args['numitems'] = 5;
    }
    // only approved comments
    $args['status'] = 0;

    return pnModAPIFunc('EZComments', 'user', 'getall', $args);
}
