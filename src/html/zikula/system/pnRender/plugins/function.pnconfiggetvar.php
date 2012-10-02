<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnconfiggetvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get configuration variable
 *
 * This function obtains a configuration variable from the Zikula system.
 *
 * Note that the results should be handled by the pnvarprepfordisplay or the
 * pnvarprephtmldisplay modifier before being displayed.
 *
 *
 * Available parameters:
 *   - name:     The name of the config variable to obtain
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   Welcome to <!--[pnconfiggetvar name='sitename']-->!
 *
 *
 * @author       Andreas Stratmann
 * @since        03/05/19
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        bool        $html        (optional) If true then result will be treated as html content
 * @param        string      $assign      (optional) If set then result will be assigned to this template variable
 * @param        string      $default     (optional) The default value to return if the config variable is not set
 * @return       string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_pnconfiggetvar($params, &$smarty)
{
    $name      = isset($params['name'])    ? $params['name']    : null;
    $default   = isset($params['default']) ? $params['default'] : null;
    $html      = isset($params['html'])    ? $params['html']    : null;
    $assign    = isset($params['assign'])  ? $params['assign']  : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnconfiggetvar', 'name')));
        return false;
    }

    $result = pnConfigGetVar($name, $default);

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        if (is_bool($html) && $html) {
            return DataUtil::formatForDisplayHTML($result);
        } else {
            return DataUtil::formatForDisplay($result);
        }
    }
}
