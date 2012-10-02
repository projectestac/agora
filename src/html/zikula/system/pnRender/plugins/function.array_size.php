<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.array_size.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * array_size
 *
 * @author    Robert Gasch
 * @version     $Id: function.array_size.php 27368 2009-11-02 20:19:51Z mateo $
 * @param    name        the variable name we wish to assign
 * @param    value        the value we wish to assign to the named variable
 * @param    html        wether or not to pnVarPrepHTMLDisplay the value
 */
function smarty_function_array_size($params, &$smarty)
{
    $val = 0;
    if (is_array($params['array'])) {
        $val = count($params['array']);
    }

    if ($params['assign']) {
        $smarty->assign($params['assign'], $val);
    } else {
        return $val;
    }
    return;
}
