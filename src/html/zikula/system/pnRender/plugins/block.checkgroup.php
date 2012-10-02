<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: block.checkgroup.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Blocks
 */

/**
 * Smarty block to implement group checks in a template
 *
 * available parameters:
 *  - component   the component under test
 *  - instance    the instance under test
 *  - level       the level of access required
 *
 * Example
 * <!--[checkgroup gid='1']-->
 * do some stuff now we have permission
 * <!--[/checkgroup]-->
 *
 * @author   Andre Bergues
 * @since    9 april 2008
 * @param    array    $params     All attributes passed to this function from the template
 * @param    string   $content    The content between the block tags
 * @param    object   $smarty     Reference to the Smarty object
 * @return   mixed    the content if permission is held, null if no permissions is held (or on the opening tag), false on an error
 */
function smarty_block_checkgroup($params, $content, &$smarty)
{
	// check if there is something between the tags
    if (is_null($content)) {
        return;
    }

    // check our input
    if (!isset($params['gid'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_block_checkgroup', 'component')));
        return false;
    }

    $uid = SessionUtil::getVar('uid');
    if (empty($uid)) {
        return;
    }

    if (!pnModAPIFunc('Groups', 'user', 'isgroupmember', array('uid' => $uid, 'gid' => $params['gid']))){
		return;
	}

    return $content;
}
