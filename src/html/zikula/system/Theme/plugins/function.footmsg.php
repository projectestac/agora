<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.footmsg.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the footer message
 *
 * Example
 * <!--[footmsg]-->
 *
 * @author       Mark West
 * @since        21/10/03
 * @see          function.footmsg.php::smarty_function_footmsg()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the footmsg
 * @deprecated
 */
function smarty_function_footmsg($params, &$smarty)
{
    $smarty->trigger_error(__f('%s: This plugin is deprecated. Please remove the tag from any page templates.', 'footmsg'));
    return false;
}
