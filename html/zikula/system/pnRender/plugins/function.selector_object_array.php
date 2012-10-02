<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.selector_object_array.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

function smarty_function_selector_object_array ($params, &$smarty)
{
    $selectedValue  = (isset($params['selectedValue'])  ? $params['selectedValue']  : 0);
    $defaultValue   = (isset($params['defaultValue'])   ? $params['defaultValue']   : 0);
    $defaultText    = (isset($params['defaultText'])    ? $params['defaultText']    : '');
    $allValue       = (isset($params['allValue'])       ? $params['allValue']       : 0);
    $allText        = (isset($params['allText'])        ? $params['allText']        : '');
    $field          = (isset($params['field'])          ? $params['field']          : 'id');
    $displayField   = (isset($params['displayField'])   ? $params['displayField']   : 'name');
    $displayField2  = (isset($params['displayField2'])  ? $params['displayField2']  : '');
    $fieldSeparator = (isset($params['fieldSeparator']) ? $params['fieldSeparator'] : ', ');
    $name           = (isset($params['name'])           ? $params['name']           : 'selector');
    $class          = (isset($params['class'])          ? $params['class']          : '');
    $where          = (isset($params['where'])          ? $params['where']          : '');
    $sort           = (isset($params['sort'])           ? $params['sort']           : '');
    $modname        = (isset($params['modname'])        ? $params['modname']        : '');
    $submit         = (isset($params['submit'])         ? $params['submit']         : false);
    $disabled       = (isset($params['disabled'])       ? $params['disabled']       : false);
    $multipleSize   = (isset($params['multipleSize'])   ? $params['multipleSize']   : 1);

    // get all but force execution of new query for object get
    if (!$where) {
        $where = ' ';
    }

    Loader::loadClass('HtmlUtil');
    return HtmlUtil::getSelector_ObjectArray ($modname, $class, $name, $field, $displayField, $where, $sort,
                                              $selectedValue, $defaultValue, $defaultText, $allValue, $allText,
                                              $displayField2, $submit, $disabled, $fieldSeparator, $multipleSize);
}
