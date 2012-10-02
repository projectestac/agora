<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnblock.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display an existing Zikula block.
 *
 * The block is choosen by its id.
 *
 * The block state is ignored, so even deactivated blocks
 * can be shown.
 *
 * The block specific parameters can be overwritten,
 * considering they are known.
 *
 * Available parameters:
 *   - id        id of block to be displayed
 *   - name      title of block to be displayed
 *   - title     Overwrites block title
 *   - position  Overwrites position (l,c,r)
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   TBD
 *
 *
 * @author   Andreas Stratmann
 * @author   J�rg Napp
 * @since    03/05/23
 * @param    array    $params      All attributes passed to this function from the template
 * @param    object   &$smarty     Reference to the Smarty object
 * @return   string   the block
 */
function smarty_function_pnblock($params, &$smarty)
{
    $bid      = isset($params['bid'])      ? (int)$params['bid'] : 0;
    $name     = isset($params['name'])     ? $params['name']     : null;
    $title    = isset($params['title'])    ? $params['title']    : null;
    $position = isset($params['position']) ? $params['position'] : null;
    $assign   = isset($params['assign'])   ? $params['assign']   : null;

    // unset the variables for the function, leaving the ones for the block
    unset($params['bid']);
    unset($params['name']);
    unset($params['title']);
    unset($params['position']);
    unset($params['assign']);

    if (!$bid) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnblock', 'bid')));
        return false;
    }

    //  render the block
    $blockinfo = pnBlockGetInfo($bid);

    // overwrite block title
    if ($title) {
        $blockinfo['title'] = $title;
    }

    if ($position) {
        $blockinfo['position'] = $position;
    }

    $blockinfo['bid'] = $bid; // bid is not return by BlockGetInfo.

    // Overwrite block specific config vars.
    // Only the new style is supported.
    if (count($params) > 0) {
        $_vars = pnBlockVarsFromContent($blockinfo['content']);
        $_vars = array_merge($_vars, $params);
        $blockinfo['content'] = pnBlockVarsToContent($_vars);
    }

    // We need the module name.
    $modinfo = pnModGetInfo($blockinfo['mid']);
    if (!is_array($modinfo) || !isset($modinfo['name'])) {
        $modinfo = array('name' => 'core');
    }

    // show the block and capture its contents
    $content = pnBlockShow($modinfo['name'], $blockinfo['bkey'], $blockinfo);

    if ($assign) {
        $smarty->assign($assign, $content);
    } else {
        return $content;
    }
}
