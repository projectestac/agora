<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnmodishooked.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to check for the availability of a module
 *
 * This function calls pnModIsHooked to determine if two Zikula modules are
 * hooked together. True is returned if the modules are hooked, false otherwise.
 * The result can also be assigned to a template variable.
 *
 * Available parameters:
 *   - tmodname:  The well-known name of the hook module
 *   - smodname:  The well-known name of the calling module
 *   - assign:    The name of a variable to which the results are assigned
 *
 * Examples
 *   <!--[pnmodishooked tmodname='Ratings' smodname='News']-->
 *
 *   <!--[pnmodishooked tmodname='bar' smodname='foo' assign='barishookedtofoo']-->
 *   <!--[if $barishookedtofoo]-->.....<!--[/if]-->
 *
 *
 * @author       Mark West
 * @since        25/1/2005
 * @see          function.pnmodishooked.php::smarty_function_pnmodishooked()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       bool        true if the module is available; false otherwise
 */
function smarty_function_pnmodishooked($params, &$smarty)
{
    $assign   = isset($params['assign'])   ? $params['assign']   : null;
    $smodname = isset($params['smodname']) ? $params['smodname'] : null;
    $tmodname = isset($params['tmodname']) ? $params['tmodname'] : null;

    if (!$tmodname) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnmodishooked', 'tmodname')));
        return false;
    }

    if (!$smodname) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnmodishooked', 'smodname')));
        return false;
    }

    $result = pnModIsHooked($tmodname, $smodname);

    if ($assign) {
        $smarty->assign($params['assign'], $result);
    } else {
        return $result;
    }
}
