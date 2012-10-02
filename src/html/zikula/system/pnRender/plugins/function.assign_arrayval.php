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
 * assign an array key to the specified value
 *
 * @author	Robert Gasch
 * @version     $Id: function.assign_arrayval.php 27067 2009-10-21 17:20:35Z drak $
 * @param	array           the array we wish to get an element from 
 * @param	key 		the array key we wish to retrieve
 * @param	assign          the smarty variable to assign the result to 
 */ 
function smarty_function_assign_arrayval ($params, &$smarty) 
{
    $array  = isset($params['array'])  ? $params['array']  : array();
    $key    = isset($params['key'])    ? $params['key']    : '';
    $assign = isset($params['assign']) ? $params['assign'] : $key;

    $val = isset($array[$key]) ? $array[$key] : null;
    $smarty->assign($assign, $val);
}