<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: block.securityutil_checkpermission_block.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Blocks
 */

/**
 * Smarty block to implement PN permissions checks in a template
 *
 * available parameters:
 *  - component   the component under test
 *  - instance    the instance under test
 *  - level       the level of access required
 *
 * Example
 * <!--[securityutil_checkpermission_block component='News::' instance='1::' level=ACCESS_COMMENT]-->
 * do some stuff now we have permission
 * <!--[/securityutil_checkpermission_block]-->
 *
 * @author   Mark West
 * @since    16 Feb 06
 * @param    array    $params     All attributes passed to this function from the template
 * @param    string   $content    The content between the block tags
 * @param    object   $smarty     Reference to the Smarty object
 * @return   mixed    the content if permission is held, null if no permissions is held (or on the opening tag), false on an error
 */
function smarty_block_securityutil_checkpermission_block($params, $content, &$smarty)
{
    if (is_null($content)) {
        return;
    }

    // check our input
    if (!isset($params['component'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_block_securityutil_checkpermission_block', 'component')));
        return false;
    }
    if (!isset($params['instance'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_block_securityutil_checkpermission_block', 'instance')));
        return false;
    }
    if (!isset($params['level'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_block_securityutil_checkpermission_block', 'level')));
        return false;
    }

    if (!SecurityUtil::checkPermission($params['component'], $params['instance'], constant($params['level']))) {
        return;
    }

    return $content;
}
