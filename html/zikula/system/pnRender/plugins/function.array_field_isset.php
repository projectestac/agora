<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.array_field_isset.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function check if an array subscript is set
 *
 * @author       Andreas Stratmann
 * @since        03/05/19
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        array       $array       The array we wish to check 
 * @param        field       string       The string name of the array subscript we wish to check
 * @param        assign      string       The variable to assign the result to (optional)
 * @return       bool                     Wheather or not the array subscript is set 
 */
function smarty_function_array_field_isset($params, &$smarty)
{
    $array       = isset($params['array'])       ? $params['array']        : null;
    $field       = isset($params['field'])       ? $params['field']        : null;
    $returnValue = isset($params['returnValue']) ? $params['returnValue']  : null;
    $assign      = isset($params['assign'])      ? $params['assign']       : null;

    if ($array === null) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('array_field_isset', 'array')));
        return false;
    }

    if ($field === null) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('array_field_isset', 'field')));
        return false;
    }

    $result = isset($array[$field]);
    if ($result && $returnValue) {
        $result = $array[$field];
    }

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
