<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.languagelist.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display a drop down list of languages
 *
 * This plugin as been superceded by html_select_languages
 *
 * @author       Mark West
 * @since        25 April 2004
 * @deprecated
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_languagelist($params, &$smarty)
{
    require_once $smarty->_get_plugin_filepath('function','html_select_languages');
    return smarty_function_html_select_languages($params, $smarty);
}
