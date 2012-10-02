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
 * detic_agendes module
 * 
 * The detic_agendes module provides a agenda system for PostNuke 
 *
 * Purpose of file:  Create a block with the periodes of the schoolar
 *                    calendar and the special days
 *
 * @package      Intraweb_Modules
 * @subpackage   iw_agendes
 * @version      $Id: next.php
 * @author       Albert Pérez Monfort
 * @author       Toni Ginard
 * @link         http://phobos.xtec.cat/intraweb  The Intraweb Project Home Page
 * @copyright    Copyright (C) 2004 by the Intraweb Project Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

function iw_agendas_nextblock_init()
{
	pnSecAddSchema('iw_agendas:nextblock:', 'Block title::');
}

function iw_agendas_nextblock_info()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	return array('text_type' => 'Next',
					'func_edit' => 'agendas_edit',
					'func_update' => 'agendas_update',
					'module' => 'iw_agendas',
					'text_type_long' => __('Notes for the next days', $dom),
					'allow_multiple' => false,
					'form_content' => false,
					'form_refresh' => false,
					'show_preview' => true );

}


function iw_agendas_nextblock_display($blockinfo)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!pnSecAuthAction( 0 , 'iw_agendas:nextblock:' , $blockinfo['title']."::" ,ACCESS_READ)){ 
		return; 
	} 
	
	// Check if the module is available
	if (!pnModAvailable('iw_agendas')) {
		return;
	}
	$user = (pnUserLoggedIn()) ? pnUserGetVar('uid') : '-1';
	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'next',
																		'module' => 'iw_agendas',
																		'uid' => $user,
																		'sv' => $sv));
	if($exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$s = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $user,
																'name' => 'next',
																'module' => 'iw_agendas',
																'sv' => $sv,
																'nult' => true));
		$blockinfo['content'] = $s;
		return themesideblock($blockinfo);
	}

	// Get the pnRender object
	$pnRender =& new pnRender('iw_agendas');
	
	// Get the number of days in which the future events will be shown
	$days = $blockinfo['url'];
	
	// Get the annotations in the following days
	$texts = pnModAPIFunc('iw_agendas', 'user', 'getEvents', array('inici' => time(),
																	'final' => time() + $days * 24 * 60 *60));

	
	foreach($texts as $text){
		$datafield = str_replace("\r", '', str_replace('\'', '&acute;', $text['c1']));
		// replace any newlines that aren't preceded by a > with a <br />
		$datafield = preg_replace('/(?<!>)\n/', "<br />", $datafield);
		if ($text['tasca']){
			$title = __('Task', $dom).' - '.$text['nivell'];
		}else{
			$title = ($text['totdia'] == 1) ? __('All day',$dom) : date('H:i', $text['data']);
		}
		$date = date('d/m', $text['data']);
		
		$events[] = array('date' => $date,
							'title' => $title,
							'deleted' => $text['deleted'],
							'modified' => $text['modified'],
							'datafield' => $datafield);
	}

	if(count($texts) == 0){
		$events[] = array ('date' => '',
							'title' => '',
							'datafield' => __('There are no events in the agenda for the next ', $dom).' '.$days.' '.__(' days', $dom));
	}
	
	$pnRender -> assign('events' ,$events);
	$pnRender -> assign('days', $days);
	
	$s =  $pnRender -> fetch('iw_agendas_block_next.htm');

	//Copy the block information into user vars
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $user,
														'name' => 'next',
														'module' => 'iw_agendas',
														'sv' => $sv,
														'value' => $s,
														'lifetime' => '700'));

	$blockinfo['content'] = $s;
	return themesideblock($blockinfo);
}

function agendas_update($blockinfo)
{
	// Security check
	if (!pnSecAuthAction( 0 , 'iw_agendas:nextblock:' , "$blockinfo[title]::" ,ACCESS_ADMIN)){ 
		return; 
	} 

	$blockinfo['url'] = "$blockinfo[dies]";
	return $blockinfo;
}

function agendas_edit($blockinfo)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!pnSecAuthAction( 0 , 'iw_agendas:nextblock:' , "$blockinfo[title]::" ,ACCESS_ADMIN)){ 
		return; 
	}

	$diesvalor = (!empty($blockinfo['url'])) ? $blockinfo['url'] : '7';

	$sortida = '<tr><td valign="top">'.__('Number of days to show in the block', $dom).'</td><td>'."<input type=\"text\" name=\"dies\" size=\"5\" maxlength=\"255\" value=\"$diesvalor\" />"."</td></tr>\n";
	return $sortida;
}
