<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnusergetidfromname.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the user id for a given user
 *
 * This function will return the user ID for a given username
 *
 * available parameters:
 *  - uname       the username return the id for
 *  - assign      if set, the language will be assigned to this variable
 *
 * @author   Mark West
 * @since    14 Nov. 05
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   string   the user ID
 */
function smarty_function_pnusergetidfromname($params, &$smarty)
{
    $assign  = isset($params['assign'])  ? $params['assign']  : null;
    $uname   = isset($params['uname'])   ? $params['uname']    : null;

    if (!$uname) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnusergetidfromname', 'uname')));
        return false;
    }

    $return = pnUserGetIDFromName($uname);

    if ($assign) {
        $smarty->assign($assign, $return);
    } else {
        return $return;
    }
}
