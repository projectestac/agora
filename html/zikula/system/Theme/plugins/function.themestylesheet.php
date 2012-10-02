<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.userlinks.php 22615 2007-08-18 10:26:02Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to provide access to a theme stylesheet
 * 
 * @author       Mark West
 * @author       J�rg Napp
 * @since         12. Feb. 2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The tag
 * @deprecated
 */
function smarty_function_themestylesheet($params, &$smarty)
{
    $smarty->trigger_error(__f('%s: This plugin is deprecated. Please remove the tag from any page templates.', 'themestylesheet'));
    return false;
}
