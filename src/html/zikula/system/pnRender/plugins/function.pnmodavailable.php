<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnmodavailable.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to check for the availability of a module
 *
 * This function calls pnModAvailable to determine if a Zikula module is
 * is available. True is returned if the module is available, false otherwise.
 * The result can also be assigned to a template variable.
 *
 * Available parameters:
 *   - modname:  The well-known name of a module to execute a function from (required)
 *   - assign:   The name of a variable to which the results are assigned
 *
 * Examples
 *   <!--[pnmodavailable modname="News"]-->
 *
 *   <!--[pnmodavailable modname="foobar" assign="myfoo"]-->
 *   <!--[if $myfoo]-->.....<!--[/if]-->
 *
 *
 * @author       Michael Nagy
 * @since        20/1/2005
 * @see          function.pnmodavailable.php::smarty_function_pnmodavailable()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       bool        true if the module is available; false otherwise
 */
function smarty_function_pnmodavailable ($params, &$smarty)
{
    $assign  = isset($params['assign'])  ? $params['assign']  : null;
    $mod     = isset($params['mod'])     ? $params['mod']     : null;
    $modname = isset($params['modname']) ? $params['modname'] : null;

    // minor backwards compatability fix
    if ($mod) {
        $modname = $mod;
    }

    $result = pnModAvailable($modname);

    if ($assign)  {
         $smarty->assign($assign, $result);
    } else {
         return $result;
    }
}
