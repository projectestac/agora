<?php
/** ----------------------------------------------------------------------
 *  LICENSE
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License (GPL)
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WIthOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  To read the license please visit http://www.gnu.org/copyleft/gpl.html
 *  ----------------------------------------------------------------------
 *  Original Author of  Robert Gasch
 *  Author Contact: r.gasch@chello.nl, robert.gasch@value4business.com
 *  Purpose of file: generate a PN group selector
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * selector_countries: generate a country list selector
 *
 * @author = "Robert Gasch
 * @param = "name" = The name of the selector tag
 * @param = "selectedValue" = The currently selected value
 * @param = "defaultValue" = The default value (only used if no selectedValue is supplied)
 * @param = "defaultText" = Text to go with the default value
 */ 

function smarty_function_selector_countries($params, &$smarty) 
{
    $allValue         = isset($params['allValue'])         ? $params['allValue']         : 0;
    $allText          = isset($params['allText'])          ? $params['allText']          : '';
    $defaultValue     = isset($params['defaultValue'])     ? $params['defaultValue']     : 0;
    $defaultText      = isset($params['defaultText'])      ? $params['defaultText']      : '';
    $disabled         = isset($params['disabled'])         ? $params['disable']          : false;
    $multipleSize     = isset($params['multipleSize'])     ? $params['multipleSize']     : 1;
    $name             = isset($params['name'])             ? $params['name']             : 'defautlselectorname';
    $selectedValue    = isset($params['selectedValue'])    ? $params['selectedValue']    : 0;
    $submit           = isset($params['submit'])           ? $params['submit']           : false;

    Loader::loadClass('HtmlUtil');
    return HtmlUtil::getSelector_Countries ($name, $selectedValue, $defaultValue, $defaultText, $allValue, $allText, $submit, $disabled, $multipleSize);
}
