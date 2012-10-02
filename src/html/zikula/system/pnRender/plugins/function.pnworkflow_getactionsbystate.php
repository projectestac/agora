<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnworkflow_getactionsbystate.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the available workflow actions for the current item state
 */
function smarty_function_pnworkflow_getactionsbystate($params, &$smarty)
{
    if (!isset($params['schema'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnworkflow_getactionsbystate', 'schema')));
        return false;
    }

    if (!isset($params['module'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnworkflow_getactionsbystate', 'module')));
        return false;
    }

    if (!isset($params['state'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnworkflow_getactionsbystate', 'state')));
        return false;
    }

    $actions = WorkflowUtil::getActionsByState($params['schema'], $params['module'], $params['state']);
    $ak = array_keys($actions);
    $options = array();
    foreach($ak as $action) {
        $options[] = $action;
    }

    Loader::loadClass('HTMLUtil');
    return HtmlUtil::FormSelectMultipleSubmit($name, $options);
}
