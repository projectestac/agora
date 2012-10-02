<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.userwelcome.php 27234 2009-10-27 20:08:18Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the welcome message
 *
 * Example
 * <!--[userwelcome]-->
 *
 * @author       Mark West
 * @since        21/10/03
 * @see          function.userwelcome.php::smarty_function_userwelcome()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the welcome message
 */
function smarty_function_userwelcome($params, &$smarty)
{
    if (pnUserLoggedIn()) {
        $username = pnUserGetVar('uname');
    } else {
        $username = __('anonymous guest');
    }

    return __f('Welcome, %s!', $username);
}
