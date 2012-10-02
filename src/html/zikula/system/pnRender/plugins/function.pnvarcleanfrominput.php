<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnvarcleanfrominput.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to obtain form variable
 *
 * this plugin obtains the variable from the input namespace. It removes any preparsing
 * done by PHP to ensure that the string is exactly as expected, without any escaped characters.
 * it also removes any HTML tags that could be considered dangerous to the Zikula system's security.
 *
 * Available parameters:
 *   - name: the name of the parameter
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 *
 * @author       J�rg Napp
 * @since        08.03.2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the variables content
 */
function smarty_function_pnvarcleanfrominput($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign'] : null;
    $name   = isset($params['name'])   ? $params['name']   : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnvarcleanfrominput', 'name')));
        return false;
    }

    $result = FormUtil::getPassedValue($name);

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
