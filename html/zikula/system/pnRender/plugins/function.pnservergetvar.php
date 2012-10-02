<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnservergetvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get module variable
 *
 * This function obtains a server-specific variable from the system.
 *
 * Note that the results should be handled by the pnvarprepfordisplay of the
 * pnvarprephtmldisplay modifiers before being displayed.
 *
 *
 * Available parameters:
 *   - name:     The name of the module variable to obtain
 *
 * Example
 *   <!--[pnservergetvar name='PHP_SELF']-->
 *
 *
 * @author       Mark West
 * @since        1/9/2005
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $assign      (optional) If set then result will be assigned to this template variable
 * @param        string      $default     (optional) The default value to return if the server variable is not set
 * @return       string      The module variable
 */
function smarty_function_pnservergetvar($params, &$smarty)
{
    $assign  = isset($params['assign'])  ? $params['assign']  : null;
    $default = isset($params['default']) ? $params['default'] : null;
    $name    = isset($params['name'])    ? $params['name']    : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnservergetvar', 'name')));
        return false;
    }

    $result = pnServerGetVar($name, $default);

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return DataUtil::formatForDisplay($result);
    }
}
