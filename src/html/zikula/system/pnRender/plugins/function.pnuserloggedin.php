<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnuserloggedin.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to determine whether the current user is logged in
 *
 * This function will return true if that is true and false otherwise
 *
 * available parameters:
 *  - assign      if set, the loggedin status will be assigned to this variable
 *
 * @author   Jörg Napp
 * @since    23 March 06
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   bool   the logged in status
 */
function smarty_function_pnuserloggedin($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign'] : null;

    $return = pnUserLoggedIn();

    if ($assign) {
        $smarty->assign($assign, $return);
    } else {
        return $return;
    }
}
