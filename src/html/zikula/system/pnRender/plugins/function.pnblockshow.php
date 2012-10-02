<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnblockshow.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to show a zikula block by blockinfo array or blockid.
 *
 * This function returns a zikula block by blockinfo array or blockid
 *
 * Available parameters:
 *   - module
 *   - blockname
 *   - block
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 *
 * @author       Sebastian Sch�rmann
 * @since        14.10.2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the zikula block
 */
function smarty_function_pnblockshow($params, &$smarty)
{
    $module    = isset($params['module'])    ? $params['module']    : null;
    $blockname = isset($params['blockname']) ? $params['blockname'] : null;
    $block     = isset($params['block'])     ? $params['block']     : null;
    $assign    = isset($params['assign'])    ? $params['assign']    : null;

    if (!$module) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnblockshow', 'module')));
        return;
    }

    if (!$blockname) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnblockshow', 'blockname')));
        return;
    }

    if (!$block) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnblockshow', 'id/info')));
        return;
    }

    if (!is_array($block)) {
        $output = pnBlockShow($module, $blockname, pnBlockGetInfo($block));
    } else {
        $vars   = pnBlockVarsFromContent($block['content']);
        $output = pnBlockShow($module, $blockname, $vars['content']);
    }

    if ($assign) {
        $smarty->assign($assign, $output);
    } else {
        return $output;
    }
}
