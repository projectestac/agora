<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnmodgetvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get module variable
 *
 * This function obtains a module-specific variable from the Zikula system.
 *
 * Note that the results should be handled by the pnvarprepfordisplay of the
 * pnvarprephtmldisplay modifiers before being displayed.
 *
 *
 * Available parameters:
 *   - module:   The well-known name of a module from which to obtain the variable
 *   - name:     The name of the module variable to obtain
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[pnmodgetvar module='Example' name='foobar' assign='foobarOfExample']-->
 *
 *
 * @author       Andreas Stratmann
 * @since        03/05/19
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        bool        $html        (optional) If true then result will be treated as html content
 * @param        string      $assign      (optional) If set then result will be assigned to this template variable
 * @param        string      $default     (optional) The default value to return if the config variable is not set
 * @return       string      The module variable
 */
function smarty_function_pnmodgetvar($params, &$smarty)
{
    $assign  = isset($params['assign'])  ? $params['assign']     : null;
    $default = isset($params['default']) ? $params['default']    : null;
    $module  = isset($params['module'])  ? $params['module']     : null;
    $html    = isset($params['html'])    ? (bool)$params['html'] : false;
    $name    = isset($params['name'])    ? $params['name']       : null;

    if (!$module) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnmodgetvar', 'module')));
        return false;
    }

    if (!$name && !$assign) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnmodgetvar', 'name')));
        return false;
    }

    if (!$name) {
        $result = pnModGetVar($module);
    } else {
        $result = pnModGetVar($module, $name, $default);
    }

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        if ($html) {
            return DataUtil::formatForDisplayHTML($result);
        } else {
            return DataUtil::formatForDisplay($result);
        }
    }
}
