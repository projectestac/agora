<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.selector_table_fields.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * selector_table_fields: generate a table-fields selector
 *
 * @author	Robert Gasch
 * @param	name		The name of the selector tag
 * @param	selectedValue	The currently selected value
 * @param	defaultValue	The default value (only used if no selectedValue is supplied)
 * @param	defaultText	Text to go with the default value
 * @param	includeAll	Wether or not to include an 'All' selector
 * @param	allText		Text to go with the 'All' select value
 *
 */

function smarty_function_selector_table_fields ($params, &$smarty)
{
    $modname        = (isset($params['modname'])        ? $params['modname']        : '');
    $tablename      = (isset($params['tablename'])      ? $params['tablename']      : '');
    $name           = (isset($params['name'])           ? $params['name']           : '');
    $selectedValue  = (isset($params['selectedValue'])  ? $params['selectedValue']  : 0);
    $defaultValue   = (isset($params['defaultValue'])   ? $params['defaultValue']   : 0);
    $defaultText    = (isset($params['defaultText'])    ? $params['defaultText']    : '');
    $submit         = (isset($params['submit'])         ? $params['submit']         : false);

    Loader::loadClass('HtmlUtil');
    return HtmlUtil::getSelector_TableFields ($modname, $tablename, $name, $selectedValue, $defaultValue, $defaultText, $submit);
}
