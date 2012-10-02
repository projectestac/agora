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
 *  Purpose of file: assign the specified smarty variable
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */
 
/**
 * assign_concat
 *
 * @author	Robert Gasch
 * @version     $Id: function.assign_concat.php 27368 2009-11-02 20:19:51Z mateo $
 * @param	1..10           the 1st through 10th value we wish to assign
 * @param	name		the variable name we wish to assign
 * @param	html		wether or not to pnVarPrepHTMLDisplay the value
 */ 
function smarty_function_assign_concat($params, &$smarty) 
{
    if (!$params['name']) {
        $smarty->trigger_error(__f('Invalid %1$s passed to %2$s.', array('name', 'assign_concat')));
        return false;
    }

    $txt = '';
    for ($i=1; $i<10; $i++) {
        $txt .= isset($params[$i]) ? $params[$i] : '';
    }

    if (isset($params['html']) && $params['html']) {
        $smarty->assign($params['name'], DataUtil::formatForDisplayHTML($txt));
    } else {
        $smarty->assign($params['name'], $txt);
    }
    return;
}
