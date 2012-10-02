<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.selector_module_tables.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * selector_module_tables: generate a PN Module table selector
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

function smarty_function_selector_module_tables ($params, &$smarty)
{
    $modname       = isset($params['modname'])       ? $params['modname']        : null;
    $name          = isset($params['name'])          ? $params['name']           : null;
    $selectedValue = isset($params['selectedValue']) ? $params['selectedValue']  : 0;
    $defaultValue  = isset($params['defaultValue'])  ? $params['defaultValue']   : 0;
    $defaultText   = isset($params['defaultText'])   ? $params['defaultText']    : '';
    $remove        = isset($params['remove'])        ? $params['remove']         : false;
    $nStripChars   = isset($params['nStripChars'])   ? $params['nStripChars']    : 0;
    $submit        = isset($params['submit'])         ? $params['submit']       : false;
    $disabled      = isset($params['disabled'])       ? $params['disabled']     : false;
    $multipleSize  = isset($params['multipleSize'])   ? $params['multipleSize'] : 1;

    Loader::loadClass('HtmlUtil');
    return HtmlUtil::getSelector_ModuleTables ($modname, $name, $selectedValue, $defaultValue, $defaultText, 
                                               $submit, $remove, $disabled, $nStripChars, $multipleSize);
}
