<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pngetcurrenturl.php 27940 2009-12-20 10:54:02Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to obtain current URL for the page
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *   - and any additional ones to override for the current request
 *
 * Example
 *   <!--[pngetcurrenturl]-->
 *   <!--[pngetcurrenturl lang='de']-->
 *
 * @author       Mark West
 * @since        16/02/2006
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the current url of the page
 */
function smarty_function_pngetcurrenturl($params, &$smarty)
{
    $assign = null;
    if (isset($params['assign'])) {
        $assign = $params['assign'];
        unset($params['assign']);
    }

    $result = htmlspecialchars(pnGetCurrentURL($params));

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
