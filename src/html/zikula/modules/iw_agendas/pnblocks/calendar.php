<?php
// $Id: calendar.php
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html

/**
 * iw_agendas module
 * 
 * The iw_agendas module provides a agenda system for PostNuke 
 *
 * Purpose of file:  Create a block with the periodes of the schoolar
 *                    calendar and the special days
 *
 * @package      Intraweb_Modules
 * @subpackage   iw_agendas
 * @version      $Id: calendar.php
 * @author       Albert Pérez Monfort
 * @author       Toni Ginard
 * @link         http://phobos.xtec.cat/intraweb  The Intraweb Project Home Page
 * @copyright    Copyright (C) 2004 by the Intraweb Project Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

function iw_agendas_calendarblock_init()
{
    pnSecAddSchema("iw_agendas:calendarblock:", "Block title::");
}

function iw_agendas_calendarblock_info()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
    return array('text_type' => 'Calendar',
                 'module' => 'iw_agendas',
                 'text_type_long' => __('Calendar', $dom),
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true );
}

/**
 * Show the month calendar into a bloc
 * @autor:	Albert Pérez Monfort
 * @autor:	Toni Ginard Lladó
 * param:	The month and the year to show
 * return:	The calendar content
*/
function iw_agendas_calendarblock_display($blockinfo)
{
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
	// Security check
	if (!pnSecAuthAction(0, "iw_agendas:calendarblock:", $blockinfo['title']."::", ACCESS_READ)) { 
		return; 
	} 
	// Check if the module is available
	if(!pnModAvailable('iw_agendas')){
		return;
	}
	$user = (pnUserLoggedIn()) ? pnUserGetVar('uid') : '-1';
	//get the calendar saved in the user vars.
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'calendar',
																		'module' => 'iw_agendas',
																		'uid' => $user,
																		'sv' => $sv));
	if($exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$s = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $user,
																'name' => 'calendar',
																'module' => 'iw_agendas',
																'sv' => $sv,
																'nult' => true));
		$blockinfo['content'] = $s;
		return themesideblock($blockinfo);
	}
	$s = pnModFunc('iw_agendas', 'user', 'getCalendarContent', array('mes' => $mes,
																		'any' => $any));
	//Copy the block information into user vars
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $user,
														'name' => 'calendar',
														'module' => 'iw_agendas',
														'sv' => $sv,
														'value' => $s,
														'lifetime' => '700'));
	//Copy the block information into user vars
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $user,
														'name' => 'month',
														'module' => 'iw_agendas',
														'sv' => $sv,
														'value' => $month));
	// Populate block info and pass to theme
	$blockinfo['content'] = $s;
	return themesideblock($blockinfo);
}
