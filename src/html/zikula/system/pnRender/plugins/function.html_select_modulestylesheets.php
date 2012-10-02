<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.html_select_modulestylesheets.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display a drop down list of module stylesheets
 *
 * Available parameters:
 *   - modname   The module name to show the styles for
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *   - id:       ID for the control
 *   - name:     Name for the control
 *   - exclude   Comma seperated list of files to exclude (optional)
 *   - selected: Selected value
 *
 *
 * @author       Mark West
 * @since        24 July 2005
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_html_select_modulestylesheets($params, &$smarty)
{
    if (!isset($params['modname'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('html_select_modulestylesheets', 'modname')));
        return false;
    }

    if (isset($params['exclude'])) {
        $exclude = explode(',', trim($params['exclude']));
    } else {
        $exclude = array();
    }

    $modstyleslist = pnModAPIFunc('Admin', 'admin', 'getmodstyles', array('modname' => $params['modname'], 'exclude' => $exclude));

    require_once $smarty->_get_plugin_filepath('function','html_options');
    $output = smarty_function_html_options(array('values'  => $modstyleslist,
                                                 'output'  => $modstyleslist,
                                                 'selected' => isset($params['selected']) ? $params['selected'] : null,
                                                 'name'     => isset($params['name'])     ? $params['name']     : null,
                                                 'id'       => isset($params['id'])       ? $params['id']       : null),
                                                 $smarty);

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $output);
    } else {
        return $output;
    }
}
