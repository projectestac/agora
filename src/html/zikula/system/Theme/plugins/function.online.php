<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.online.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to to display the current date and time
 *
 * Example
 * <!--[online]-->
 *
 * @author       Andreas Röderer (Thorashh)
 * @since        08/28/2005
 * @see          function.online.php::smarty_function_online()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      format       Date and time format
 * @return       string      how many users are online
 */
function smarty_function_online($params, &$smarty)
{
    $pntable = pnDBGetTables();

    $sessioninfocolumn = $pntable['session_info_column'];

    $activetime = DateUtil::getDatetime(time() - (pnConfigGetVar('secinactivemins') * 60));

    $where = "WHERE $sessioninfocolumn[lastused] > '$activetime' AND $sessioninfocolumn[uid] = '0'";
    $numguests = DBUtil::selectObjectCount('session_info', $where, 'ipaddr', true);
    $returned_value = _fn('There is %s guest online.', 'There are %s guests online.', $numguests,$numguests);

    $where = "WHERE $sessioninfocolumn[lastused] > '$activetime' AND $sessioninfocolumn[uid] > 0";
    $numusers = DBUtil::selectObjectCount('session_info', $where, 'uid', true);
    $returned_value .= _fn('There is %s registered user online.', 'There are %s registered users online.', $numusers,$numusers);
    
    return $returned_value;
    
}
