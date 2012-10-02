<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnsessionsetvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to set a session variable
 *
 * This function sets a session-specific variable in the Zikula system.
 *
 * Note that the results should be handled by the pnvarprepfordisplay or the
 * pnvarprephtmldisplay modifiers before being displayed.
 *
 *
 * Available parameters:
 *   - name:    The name of the session variable to obtain
 *   - value:   The value for the session variable
 *   - assign:  If set, the result is assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[pnsessionsetvar name='foo' value='bar']-->
 *
 *
 * @author       Mark West
 * @since        13/12/2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $name        The name of the session variable to obtain
 * @return       null
 */
function smarty_function_pnsessionsetvar($params, &$smarty)
{
    $assign  = isset($params['assign'])  ? $params['assign']  : null;
    $name    = isset($params['name'])    ? $params['name']    : null;
    $value   = isset($params['value'])   ? $params['value']   : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnsessionsetvar', 'name')));
        return false;
    }

    if (!$value) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnsessionsetvar', 'value')));
        return false;
    }

    $result = SessionUtil::setVar($name, $value);

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
