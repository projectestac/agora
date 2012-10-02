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

function smarty_function_selector_field_array ($params, &$smarty)
{
    $selectedValue = isset($params['selectedValue']) ? $params['selectedValue'] : 0;
    $allText       = isset($params['allText'])       ? $params['allText']       : '';
    $allValue      = isset($params['allValue'])      ? $params['allValue']      : 0;
    $defaultText   = isset($params['defaultText'])   ? $params['defaultText']   : '';
    $defaultValue  = isset($params['defaultValue'])  ? $params['defaultValue']  : 0;
    $selectedValue = isset($params['selectedValue']) ? $params['selectedValue'] : '';
    $field         = isset($params['field'])         ? $params['field']         : 'id';
    $modname       = isset($params['modname'])       ? $params['modname']       : '';
    $name          = isset($params['name'])          ? $params['name']          : '';
    $table         = isset($params['table'])         ? $params['table']         : '';
    $where         = isset($params['where'])         ? $params['where']         : '';
    $sort          = isset($params['sort'])          ? $params['sort']          : '';
    $submit        = isset($params['submit'])        ? $params['submit']        : 0;
    $distinct      = isset($params['distinct'])      ? $params['distinct']      : 0;
    $assocKey      = isset($params['assocKey'])      ? $params['assocKey']      : '';
    $disabled      = isset($params['disabled'])      ? $params['disabled']      : 0;
    $truncate      = isset($params['truncate'])      ? $params['truncate']      : 0;
    $multipleSize  = isset($params['multipleSize'])  ? $params['multipleSize']  : 1;

    Loader::loadClass('HtmlUtil');
    return HtmlUtil::getSelector_FieldArray ($modname, $table, $name, $field, $where, $sort,
                                             $selectedValue, $defaultValue, $defaultText, $allValue, $allText, $assocKey,
                                             $distinct, $submit, $disabled, $truncate, $multipleSize);
}
