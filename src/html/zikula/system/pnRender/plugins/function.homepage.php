<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.homepage.php 27243 2009-10-28 15:08:41Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Plugin to return the homepage address
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[homepage]-->
 * *
 * @author       Drak
 * @since        22/10/2009
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the base URL of the site
 */
function smarty_function_homepage($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign'] : null;

    $result = htmlspecialchars(pnGetHomepageURL());

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
