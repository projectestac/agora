<?php
// $Id: users
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
 * iw_users module
 * 
 * The iw_users improve the users managment 
 *
 * Purpose of file:  Create a block to welcome users during connexion
 * 
 * @package      Intraweb_Modules
 * @subpackage   iw_users
 * @version      $Id: users.php
 * @author       Albert Pérez Monfort
 * @link         http://phobos.xtec.cat/intraweb  The Intraweb Project Home Page
 * @copyright    Copyright (C) 2009 by the Intraweb Project Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

function iw_users_welcomeblock_init()
{
    pnSecAddSchema("iw_users:welcomeblock:", "Block title::");
}

function iw_users_welcomeblock_info()
{
	$dom=ZLanguage::getModuleDomain('iw_users');
    return array('text_type' => 'Welcome',
					'func_edit' => 'welcome_edit',
					'func_update' => 'welcome_update',
					'module' => 'iw_users',
					'text_type_long' => __('Show a welcome message wend user is in home page', $dom),
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
function iw_users_welcomeblock_display($blockinfo)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!pnSecAuthAction(0, "iw_users:welcomeblock:", $blockinfo['title']."::", ACCESS_READ)) { 
		return; 
	} 
	$baseURL = pnGetBaseURL();
	$baseURL .= 'index.php';
	if('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] != $baseURL){
		return;
	}
	// Check if the module is available
	if(!pnModAvailable('iw_users')){
		return;
	}
	$user = (pnUserLoggedIn()) ? pnUserGetVar('uid') : '-1';
	// Only for loggedin users
	if($user == '-1'){
		return;
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userName = pnModFunc('iw_main', 'user', 'getUserInfo', array('sv' => $sv,
																	'uid' => $user,
																	'info' => 'n'));									
	$values = explode('---', $blockinfo['url']);
	$hello = (!empty($values[0])) ? $values[0] : __('Hi', $dom);
	$welcome = (!empty($values[0])) ? $values[1] : __('welcome to the intranet', $dom);
	$date = $values[2];
	// Pass the data to the template
	$pnRender = pnRender::getInstance('iw_users',false);
	$pnRender -> assign('userName', $userName);
	$pnRender -> assign('hello', $hello);
	$pnRender -> assign('welcome', $welcome);
	$pnRender -> assign('date', $date);
	$pnRender -> assign('dateText', date('d/m/Y', time()));
	$pnRender -> assign('timeText', date('H.i', time()));
	$s = $pnRender -> fetch('iw_users_block_welcome.htm');
	// Populate block info and pass to theme
	$blockinfo['content'] = $s;
	return themesideblock($blockinfo);
}

function welcome_update($blockinfo)
{
	// Security check
	if (!pnSecAuthAction(0, "iw_users:welcomeblock:", $blockinfo['title']."::", ACCESS_ADMIN)) { 
		return; 
	}
	$url = $blockinfo['hello'] . '---' . $blockinfo['welcome'] . '---' . $blockinfo['date'];
	$blockinfo['url'] = "$url";
	return $blockinfo;
}

function welcome_edit($blockinfo)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!pnSecAuthAction(0, "iw_users:welcomeblock:", $blockinfo['title']."::", ACCESS_ADMIN)) {
		return; 
	}
	$values = explode('---', $blockinfo['url']);
	$hello = (!empty($values[0])) ? $values[0] : __('Hi', $dom);
	$welcome = (!empty($values[1])) ? $values[1] : __('welcome to the intranet', $dom);
	$date = $values[2];
	$checked = ($date == 1) ? 'checked' : '';
	$sortida = '<tr><td valign="top">' . __('Geeting',$dom) . '</td><td>'."<input type=\"text\" name=\"hello\" size=\"50\" maxlength=\"50\" value=\"$hello\" />"."</td></tr>\n";
	$sortida .= '<tr><td valign="top">' . __('Welcome text',$dom) . '</td><td>'."<input type=\"text\" name=\"welcome\" size=\"50\" maxlength=\"50\" value=\"$welcome\" />"."</td></tr>\n";
	$sortida .= '<tr><td valign="top">' . __('Include date and time',$dom) . '</td><td>'."<input type=\"checkbox\" name=\"date\"  value=\"1\" $checked />"."</td></tr>\n";
	return $sortida;
}