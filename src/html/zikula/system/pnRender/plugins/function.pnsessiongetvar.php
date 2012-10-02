<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnsessiongetvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get a session variable
 *
 * This function obtains a session-specific variable from the Zikula system.
 *
 * Note that the results should be handled by the pnvarprepfordisplay or the
 * pnvarprephtmldisplay modifiers before being displayed.
 *
 *
 * Available parameters:
 *   - name:    The name of the session variable to obtain
 *   - assign:  If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[pnsessiongetvar name='foobar'|pnvarprepfordisplay]-->
 *
 *
 * @author       Mark West
 * @since        23/10/2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $name        The name of the session variable to obtain
 * @param        string      $default     (optional) The default value to return if the session variable is not set
 * @return       string      The session variable
 */
function smarty_function_pnsessiongetvar($params, &$smarty)
{
    $assign               = isset($params['assign'])               ? $params['assign']               : null;
    $default              = isset($params['default'])              ? $params['default']              : null;
    $name                 = isset($params['name'])                 ? $params['name']                 : null;
    $path                 = isset($params['path'])                 ? $params['path']                 : '/';
    $autocreate           = isset($params['autocreate'])           ? $params['autocreate']           : true;
    $overwriteExistingVar = isset($params['overwriteExistingVar']) ? $params['overwriteExistingVar'] : false;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnsessiongetvar', 'name')));
        return false;
    }

    $result = SessionUtil::getVar($name, $default, $path, $autocreate, $overwriteExistingVar);

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
