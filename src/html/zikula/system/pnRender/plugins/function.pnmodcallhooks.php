<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnmodcallhooks.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function call hooks
 *
 * This function calls a specific module function.  It returns whatever the return
 * value of the resultant function is if it succeeds.
 * Note that in contrast to the API function pnmodcallhooks you need not to load the
 * module with pnModLoad.
 *
 *
 * Available parameters:
 * - 'hookobject' the object the hook is called for - either 'item' or 'category'
 * - 'hookaction' the action the hook is called for - one of 'create', 'delete', 'transform', or 'display'
 * - 'hookid'     the id of the object the hook is called for (module-specific)
 * - 'assign'     If set, the results are assigned to the corresponding variable instead of printed out
 * - all remaining parameters are passed to the pnModCallHooks API via the extrainfo array
 *
 * Example
 * <!--[pnmodcallhooks hookobject='item' hookaction='modify' hookid=$tid $modname='ThisModule' $objectid=$tid]-->
 *
 * @author       Mark West
 * @since        26/04/2004
 * @see          function.pnmodcallhooks.php::smarty_function_pnmodcallhooks()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the results of the module function
 */
function smarty_function_pnmodcallhooks($params, &$smarty)
{
    $assign     = isset($params['assign'])     ? $params['assign']        : null;
    $hookid     = isset($params['hookid'])     ? $params['hookid']        : '';
    $hookaction = isset($params['hookaction']) ? $params['hookaction']    : null;
    $hookobject = isset($params['hookobject']) ? $params['hookobject']    : null;
    $implode    = isset($params['implode'])    ? (bool)$params['implode'] : true;

    // avoid sending these to pnModCallHooks
    unset($params['hookobject']);
    unset($params['hookaction']);
    unset($params['hookid']);
    unset($params['assign']);
    unset($params['implode']);

    if (!$hookobject) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnmodcallhooks', 'hookobject')));
        return false;
    }
    if (!$hookaction) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnmodcallhooks', 'hookaction')));
        return false;
    }
    if (!$hookid) {
        $hookid = '';
    }

    // create returnurl if not supplied (= this page)
    if (!isset($params['returnurl']) || empty($params['returnurl'])) {
        $params['returnurl'] = str_replace('&amp;', '&', 'http://' . pnGetHost() . pnGetCurrentUri());
    }

    // if the implode flag is true then we must always assign the result to a template variable
    // outputing the erray is no use....
    if (!$implode) {
        $assign = 'hooks';
    }

    $result = pnModCallHooks($hookobject, $hookaction, $hookid, $params, $implode);

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
