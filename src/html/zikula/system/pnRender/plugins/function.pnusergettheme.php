<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnusergettheme.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to the current users theme
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 *
 * @author       Michael Nagy
 * @since        16.03.2005
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the variables content
 */
function smarty_function_pnusergettheme($params, &$smarty)
{
    $assign = isset($params['assign'])  ? $params['assign']  : null;

    $result = pnUserGetTheme();

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
