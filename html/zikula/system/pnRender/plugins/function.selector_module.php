<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.selector_module.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * selector_module: generate a PN Module selector
 *
 * @author    Robert Gasch
 * @param    name        The name of the selector tag
 * @param    selectedValue    The currently selected value
 * @param    defaultValue    The default value (only used if no selectedValue is supplied)
 * @param    defaultText    Text to go with the default value
 * @param    includeAll    Wether or not to include an 'All' selector
 * @param    allText        Text to go with the 'All' select value
 *
 */
function smarty_function_selector_module ($params, &$smarty)
{
    $name          = isset($params['name'])          ? $params['name']          : 'defaultselectorname';
    $selectedValue = isset($params['selectedValue']) ? $params['selectedValue'] : 0;
    $defaultValue  = isset($params['defaultValue'])  ? $params['defaultValue']  : 0;
    $defaultText   = isset($params['defaultText'])   ? $params['defaultText']   : null;
    $includeAll    = isset($params['includeAll'])    ? $params['includeAll']    : false;
    $allText       = isset($params['allText'])       ? $params['allText']       : null;
    $submit        = isset($params['submit'])        ? $params['submit']        : false;
    $disabled      = isset($params['disabled'])      ? $params['disabled']      : false;
    $multipleSize  = isset($params['multipleSize'])  ? $params['multipleSize']  : 1;

    Loader::loadClass('HtmlUtil');
    return HtmlUtil::getSelector_PNModule ($name, $selectedValue, $defaultValue, $defaultText, $includeAll, $allText, 
                                           $submit, $disabled, $multipleSize);
}
