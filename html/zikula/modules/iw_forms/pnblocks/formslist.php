<?php
// $Id: forms.php
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
 * iw_forms block
 * 
 * The iw_forms block provides a list of the forms where user can access 
 *
 * Purpose of file:  Create a block with the forms where the user can access
 *
 * @package      Intraweb_Modules
 * @subpackage   iw_agendas
 * @version      $Id: calendar.php
 * @author       Albert PÃ©rez Monfort
 * @link         http://phobos.xtec.cat/intraweb  The Intraweb Project Home Page
 * @copyright    Copyright (C) 2004 by the Intraweb Project Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

function iw_forms_formslistblock_init()
{
    pnSecAddSchema("iw_forms:formslistblock:", "Block title::");
}

function iw_forms_formslistblock_info()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
    return array('text_type' => 'FormsList',
				 'func_edit' => 'formslist_edit',
				 'func_update' => 'formslist_update',
				 'module' => 'iw_forms',
				 'text_type_long' => __('Display the list of forms where you can access the user', $dom),
				 'allow_multiple' => true,
				 'form_content' => false,
				 'form_refresh' => false,
				 'show_preview' => true );
}

/**
 * Show the list of forms for choosed categories
 * @autor:	Albert PÃ©rez Monfort
 * return:	The list of forms
*/
function iw_forms_formslistblock_display($blockinfo)
{
	// Security check
	if (!pnSecAuthAction(0, "iw_forms:formslistblock:", $blockinfo['title']."::", ACCESS_READ)) { 
		return; 
	} 
	// Check if the module is available
	if(!pnModAvailable('iw_forms')){
		return;
	}
	$uid = (pnUserLoggedIn()) ? pnUserGetVar('uid') : '-1';
	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists',
	                        array('name' => 'formsListBlock'.$blockinfo['bid'],
								  'module' => 'iw_forms',
								  'uid' => $uid,
								  'sv' => $sv));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$have_flags = pnModFunc('iw_main', 'user', 'userGetVar',
	                         array('uid' => $uid,
								   'name' => 'have_flags',
								   'module' => 'iw_main_block_flagged',
								   'sv' => $sv));
	if($exists && $have_flags != 'fr'){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$s = pnModFunc('iw_main', 'user', 'userGetVar',
		                array('uid' => $uid,
							  'name' => 'formsListBlock'.$blockinfo['bid'],
							  'module' => 'iw_forms',
							  'sv' => $sv,
							  'nult' => true));
		$blockinfo['content'] = $s;
		return themesideblock($blockinfo);
	}
	//get all the active forms
	$forms = pnModAPIFunc('iw_forms', 'user', 'getAllForms',
	                       array('user' => 1));
	//get all the groups of the user
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userGroups = pnModFunc('iw_main', 'user', 'getAllUserGroups',
	                         array('uid' => $uid,
								   'sv' => $sv));
	foreach($userGroups as $group){
		$userGroupsArray[] = $group['id'];
	}
	$flagged = pnModAPIFunc('iw_forms', 'user', 'getWhereFlagged');
	$validation = pnModAPIFunc('iw_forms', 'user', 'getWhereNeedValidation');
	$values = explode('---', $blockinfo['url']);
	//get categories
	$cats = explode('|', $values[0]);
	$catsString = '$';
	foreach($cats as $cat){
		if($cat != ''){
			$catsString .= '$' . $cat . '$';
		}
	}
	//Filter the forms where the user can access
	foreach($forms as $form){
		if($catsString == '$' || strpos($catsString, '$' . $form['cid'] . '$') != false){
			$access = pnModFunc('iw_forms', 'user', 'access',
			                     array('fid' => $form['fid'],
									   'userGroups' => $userGroupsArray));
			if($access['level'] != 0){
				$isFlagged = (array_key_exists($form['fid'], $flagged)) ? 1 : 0;
				$needValidation = (array_key_exists($form['fid'], $validation)) ? 1 : 0;
				$new = pnModFunc('iw_forms', 'user', 'makeTimeForm', $form['new']);
				$new = mktime(23, 59, 00,substr($new, 3, 2), substr($new, 0, 2), substr($new, 6, 2));
				$newLabel = ($new > time()) ? true : false;
                $formShortName = (strlen($form['formName']) > 17) ?   $formShortName = mb_strimwidth($form['formName'], 0, 18, '...') : $formShortName = $form['formName'];
				$formName = ($values[1] == 1) ? $formShortName : $form['formName'];
				//Whit all the information create the array to output
				$forms_array[] = array('formName' => $formName,
									   'title' => $form['title'],
									   'accessLevel' => $access['level'],
									   'closeableInsert' => $form['closeableInsert'],
									   'isFlagged' => $isFlagged,
									   'needValidation' => $needValidation,
									   'closeInsert' => $form['closeInsert'],
									   'newLabel' => $newLabel,
									   'defaultValidation' => $access['defaultValidation'],
									   'fid' => $form['fid']);
			}
		}
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms', false);
	$pnRender -> assign('forms' , $forms_array);
	$pnRender -> assign('listBox', $values[1]);
	$s = $pnRender -> fetch('iw_forms_block_formsList.htm');
	//Copy the block information into user vars
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar',
	           array('uid' => $uid,
					 'name' => 'formsListBlock' . $blockinfo['bid'],
					 'module' => 'iw_forms',
					 'sv' => $sv,
					 'value' => $s,
					 'lifetime' => '750'));

	// Populate block info and pass to theme
	$blockinfo['content'] = $s;
	return themesideblock($blockinfo);
}

function formslist_update($blockinfo)
{
	// Security check
	if (!pnSecAuthAction(0, "iw_forms:formslistblock:", $blockinfo['title'] . "::", ACCESS_ADMIN)) { 
		return; 
	}
	$url = $blockinfo['categories'] . '---' . $blockinfo['listBox'];
	$blockinfo['url'] = "$url";
	return $blockinfo;
}

function formslist_edit($blockinfo)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!pnSecAuthAction(0, "iw_forms:formslistblock:", $blockinfo['title'] . "::", ACCESS_ADMIN)) {
		return; 
	}
	$values = explode('---', $blockinfo['url']);
	$categoriesValue = (!empty($values[0])) ? $values[0] : '';
	$listBox = $values[1];
	$checked = ($listBox == 1) ? 'checked' : '';
	$sortida = '<tr><td valign="top">' . __('Identities of the categories to show (default is all)', $dom) . '</td><td>' . "<input type=\"text\" name=\"categories\" size=\"50\" maxlength=\"50\" value=\"$categoriesValue\" />" . "</td></tr>\n";
	$sortida .= '<tr><td valign="top">' . __('Show forms into a list', $dom) . '</td><td>' . "<input type=\"checkbox\" name=\"listBox\"  value=\"1\" $checked />" . "</td></tr>\n";
	return $sortida;
}

/**
 *
 * @param string $string String to "search" from
 * @param int $index Index of the letter we want.
 * @return string The letter found on $index.
 */
function charAt($string, $index){
    if($index < mb_strlen($string)){
        return mb_substr($string, $index, 1);
    }
    else{
        return -1;
    }
}