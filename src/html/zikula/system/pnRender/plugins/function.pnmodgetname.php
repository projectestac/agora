<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnmodgetname.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to the topmost module name
 *
 * This function currently returns the name of the current top-level
 * module, false if not in a module.
 *
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding
 *               variable instead of printed out
 *
 * Example
 *   <!--[pnmodgetname|pnvarprepfordisplay]-->
 *
 *
 * @author       Jörg Napp
 * @since        18. Jan. 2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The module variable
 */
function smarty_function_pnmodgetname ($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign'] : null;

    $result = pnModGetName();

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
