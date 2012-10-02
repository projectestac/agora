<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnusergetvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get a user variable
 *
 * This function obtains a user-specific variable from the Zikula system.
 *
 * Note that the results should be handled by the pnvarprepfordisplay of the
 * pnvarprephtmldisplay modifiers before being displayed.
 *
 *
 * Available parameters:
 *   - name:    The name of the variable being requested
 *   - uid:     The user id to obtain the variable for - this parameter is optional
 *   - assign:  If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[pnusergetvar name='user_icq' uid=1|pnvarprepfordisplay]-->
 *
 *
 * @author       Mark West
 * @since        23/10/2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $name        The name of the parameter being requested
 * @param        integer     $uid         The user id to obtain the variable for - this parameter is optional
 * @return       string      The user variable
 */
function smarty_function_pnusergetvar($params, &$smarty)
{
    $assign  = isset($params['assign'])  ? $params['assign']   : null;
    $default = isset($params['default']) ? $params['default']  : null;
    $name    = isset($params['name'])    ? $params['name']     : null;
    $uid     = isset($params['uid'])     ? (int)$params['uid'] : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnusergetvar', 'name')));
        return false;
    }

    if ($uid) {
        $result = pnUserGetVar($name, $uid, $default);
    } else {
        $result = pnUserGetVar($name, -1, $default);
    }

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
