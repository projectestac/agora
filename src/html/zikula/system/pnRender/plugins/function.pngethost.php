<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pngethost.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to obtain base URL for this site
 *
 * This function obtains the base URL for the site. The base url is defined as the
 * full URL for the site minus any file information  i.e. everything before the
 * 'index.php' from your start page.
 * Unlike the API function pngethost, the results of this function are already
 * sanitized to display, so it should not be passed to the pnvarprepfordisplay modifier.
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[pngethost]-->
 *
 *
 * @author       Mark West
 * @since        20/01/2005
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the base URL of the site
 */
function smarty_function_pngethost ($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign'] : null;

    $result = htmlspecialchars(pnGetHost());

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
