<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnblockgetinfo.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to obtain the a block variable
 *
 * Note: If the name parameter is not set then the assign parameter must be set since there is an array of
 * block variables available.
 *
 * Available parameters:
 *   - bid: the block id
 *   - name: If set the name of the parameter to get otherwise the entire block array is assigned to the template
 *   - assign: If set, the results are assigned to the corresponding variable instead of printed out
 *
 *
 * @author       Mark West
 * @since        17.03.2005
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the variables content
 */
function smarty_function_pnblockgetinfo($params, &$smarty)
{
    $bid    = isset($params['bid'])    ? (int)$params['bid'] : 0;
    $name   = isset($params['name'])   ? $params['name']     : null;
    $assign = isset($params['assign']) ? $params['assign']   : null;

    if (!$bid) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnblockgetinfo', 'bid')));
    }

    // get the block info array
    $blockinfo = pnBlockGetInfo($bid);

    if ($name) {
        if ($assign) {
            $smarty->assign($assign, $blockinfo[$name]);
        } else {
            return $blockinfo[$name];
        }
    } else {
        // handle the full blockinfo array
        if ($assign) {
            $smarty->assign($assign, $blockinfo);
        } else {
            $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified to get the full block information.', array('pnblockgetinfo', 'assign')));
        }
    }

    return;
}
