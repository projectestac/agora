<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.themelist.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display a drop down list of themes
 *
 * This plugin as been superceded by html_select_themes
 *
 * @author       Mark West
 * @since        26 October 2005
 * @deprecated
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_themelist($params, &$smarty)
{
    require_once $smarty->_get_plugin_filepath('function','html_select_themes');

    return smarty_function_html_select_themes($params, $smarty);
}
