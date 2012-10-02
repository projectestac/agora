<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.user.php 27063 2009-10-21 16:48:48Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the user name
 *
 * Example
 * <!--[user]-->
 *
 * @author       Mark West
 * @since        21/10/03
 * @see          function.userwelcome.php::smarty_function_user()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the username
 */
function smarty_function_user($params, &$smarty)
{
    if (pnUserLoggedIn()) {
        $username = pnUserGetVar('uname');
    } else {
        $username = __('anonymous guest');
    }

    return DataUtil::formatForDisplayHTML($username);
}
