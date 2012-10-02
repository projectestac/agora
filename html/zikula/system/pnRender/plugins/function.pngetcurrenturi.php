<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pngetcurrenturi.php 27940 2009-12-20 10:54:02Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to obtain current URI
 *
 * This function obtains the current request URI.
 * Unlike the API function pngetcurrenturi, the results of this function are already
 * sanitized to display, so it should not be passed to the pnvarprepfordisplay modifier.
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *   - and any additional ones to override for the current request
 *
 * Example
 *   <!--[pngetcurrenturi]-->
 *   <!--[pngetcurrenturi lang='de']-->
 *
 * @author       Mark West
 * @since        10/01/2005
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the current URI
 */
function smarty_function_pngetcurrenturi($params, &$smarty)
{
    $assign = null;
    if (isset($params['assign'])) {
        $assign = $params['assign'];
        unset($params['assign']);
    }

    $result = htmlspecialchars(pnGetCurrentURI($params));

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
