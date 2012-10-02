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
 * Purpose of file:  Shows the content of a note in a bloc
 *
 * @package      Intraweb_Modules
 * @subpackage   iw_forms
 * @version      $Id: formnote.php
 * @author       Albert Pérez Monfort
 * @link         http://phobos.xtec.cat/intraweb  The Intraweb Project Home Page
 * @copyright    Copyright (C) 2010 by the Intraweb Project Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

function iw_forms_formnoteblock_init()
{
    pnSecAddSchema("iw_forms:formnoteblock:", "Note identity::");
}

function iw_forms_formnoteblock_info()
{
    $dom = ZLanguage::getModuleDomain('iw_forms');
    return array('text_type' => 'FormNote',
		  		 'func_edit' => 'formnote_edit',
		  		 'func_update' => 'formnote_update',
				 'module' => 'iw_forms',
				 'text_type_long' => __('Display the content of a note in a block', $dom),
				 'allow_multiple' => true,
				 'form_content' => false,
				 'form_refresh' => false,
				 'show_preview' => true );
}

/**
 * Show the list of forms for choosed categories
 * @autor:	Albert Pérez Monfort
 * return:	The list of forms
*/
function iw_forms_formnoteblock_display($blockinfo)
{
	// Security check
	if (!pnSecAuthAction(0, "iw_forms:formnoteblock:", $blockinfo['url'] . "::", ACCESS_READ)) { 
		return; 
	}
	// Check if the module is available
	if(!pnModAvailable('iw_forms')){
		return;
	}
    $content = explode('$$$$$$$[parameter]$$$$$$$', $blockinfo['content']);
    if ($content[1] == 1) $blockinfo['title'] = '';
	$uid = (pnUserLoggedIn()) ? pnUserGetVar('uid') : '-1';
	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists',
						    array('name' => 'formNoteBlock'.$blockinfo['bid'],
											'module' => 'iw_forms',
											'uid' => $uid,
											'sv' => $sv));
	if ($exists) {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$s = pnModFunc('iw_main', 'user', 'userGetVar',
						array('uid' => $uid,
							  'name' => 'formNoteBlock'.$blockinfo['bid'],
							  'module' => 'iw_forms',
							  'sv' => $sv,
							  'nult' => true));
	    // get note
	    $note = pnModAPIFunc('iw_forms', 'user', 'getNote',
						      array('fmid' => $blockinfo['url']));
	    //check user access to this form
	    $access = pnModFunc('iw_forms', 'user', 'access',
	                         array('fid' => $note['fid']));
	    if ($access['level'] < 2) {
		    return false;
	    }
	    //Get item
	    $form = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition',
		    				  array('fid' => $note['fid']));
	    if ($form == false) {
		    return false;
	    }
	    if ($content[0] == '') {
		    return false;
	    }
 	    if ($form['skincss'] != '') {
		    $skincssurl = '<link rel="stylesheet" href="' . $form['skincss'] . '" type="text/css" />';
	    }
 	    // Create output object
	    $pnRender = pnRender::getInstance('iw_forms', false);
	    $pnRender->assign('contentBySkin', pnvarprephtmldisplay(stripslashes($s)));
	    $pnRender->assign('skincssurl', $skincssurl);
	    $s = $pnRender -> fetch('iw_forms_block_formNote.htm');
	    // Populate block info and pass to theme
	    $blockinfo['content'] = $s;
    	return themesideblock($blockinfo);
	}
	// get note
	$note = pnModAPIFunc('iw_forms', 'user', 'getNote',
						  array('fmid' => $blockinfo['url']));
	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access',
	                     array('fid' => $note['fid']));
	if ($access['level'] < 2) {
		return false;
	}
	//Get item
	$form = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition',
						  array('fid' => $note['fid']));
	if ($form == false) {
		return false;
	}
	if ($content[0] == '') {
		return false;
	}
	$noteContent = pnModAPIFunc('iw_forms', 'user', 'getAllNoteContents',
								 array('fid' => $note['fid'],
								       'fmid' => $note['fmid']));
	if ($note['annonimous'] == 0 && ($uid != '-1' || ($uid == '-1' && $form['unregisterednotusersview'] == 0))) {
		$userName = pnUserGetVar('uname',$note['user']);
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$photo = pnModFunc('iw_main', 'user', 'getUserPicture',
							array('uname' => $userName,
								  'sv' => $sv));
		$user = ($note['user'] != '') ? $note['user'] : '-1';
	} else {
		$user = '';
		$userName = '';
		$photo = '';
	}
	$contentBySkin = str_replace('[$user$]', $userName, $content[0]);
	$contentBySkin = str_replace('[$time$]', date('H.i', $note['time']), $contentBySkin);
	$contentBySkin = str_replace('[$noteId$]', $note['fmid'], $contentBySkin);
	$contentBySkin = str_replace('[$formId$]', $note['fid'], $contentBySkin);
	$contentBySkin = str_replace('[$date$]', date('d/m/Y', $note['time']), $contentBySkin);
	if ($photo != '') {
		$photo = '<img src="'. pnGetBaseURL() .'index.php?module=iw_forms&func=getFile&fileName=' . $photo . '" />';
	}
	$contentBySkin = str_replace('[$avatar$]', $photo, $contentBySkin);
	foreach ($noteContent as $key => $value) {
		$contentBySkin = str_replace('[$' . $key . '$]', nl2br($value['content']), $contentBySkin);
		$contentBySkin = str_replace('[%' . $key . '%]', $value['fieldName'], $contentBySkin);
	}
	$contentBySkin = ($note['publicResponse']) ? str_replace('[$reply$]', $note['renote'], $contentBySkin) : str_replace('[$reply$]', '', $contentBySkin);
    // this set of changes are required in case the field contents was edited because using Javascript some special chars are modified 
	$contentBySkin = str_replace('|per|', '%', $contentBySkin);
    $contentBySkin = str_replace('|par|', '#', $contentBySkin);
    $contentBySkin = str_replace('|int|', '?', $contentBySkin);
    $contentBySkin = str_replace('|amp|', '&', $contentBySkin);
    // load the template defined in the form definition
	if ($form['skincss'] != '') {
		$skincssurl = '<link rel="stylesheet" href="' . $form['skincss'] . '" type="text/css" />';
	}
    $isValidator = ($access['level'] == 7) ? 1 : 0;
    $isAdministrator = (SecurityUtil::checkPermission('blocks::', "::", ACCESS_ADMIN)) ? 1 : 0;
	// create output object
	$pnRender = pnRender::getInstance('iw_forms', false);
	$pnRender->assign('contentBySkin', pnvarprephtmldisplay(stripslashes($contentBySkin)));
	$pnRender->assign('skincssurl', $skincssurl);
    $pnRender->assign('isValidator', $isValidator);
    $pnRender->assign('isAdministrator', $isAdministrator);    
    $pnRender->assign('fmid', $blockinfo['url']);
    $pnRender->assign('bid', $blockinfo['bid']);
    $pnRender->assign('fid', $note['fid']);
	$s = $pnRender -> fetch('iw_forms_block_formNote.htm');
	// copy the block information into user vars
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar',
			   array('uid' => $uid,
					 'name' => 'formNoteBlock' . $blockinfo['bid'],
					 'module' => 'iw_forms',
					 'sv' => $sv,
					 'value' => $s,
					 'lifetime' => '300'));
	// Populate block info and pass to theme
	$blockinfo['content'] = $s;
	return themesideblock($blockinfo);
}

function formnote_update($blockinfo)
{
	// Security check
	if (!pnSecAuthAction(0, "iw_forms:formnoteblock:", $blockinfo['url'] . "::", ACCESS_ADMIN)) { 
		return; 
	}
	$fmid = $blockinfo['fmid'];
	$blockContent = $blockinfo['blockContent'];
    $blockHideTitle = (isset($blockinfo['blockHideTitle']) && $blockinfo['blockHideTitle'] == 1) ? 1 : 0;
	$blockinfo['content'] = "$blockContent" . '$$$$$$$[parameter]$$$$$$$' . $blockHideTitle;
	$blockinfo['url'] = "$fmid";
	return $blockinfo;
}

function formnote_edit($blockinfo)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!pnSecAuthAction(0, "iw_forms:formnoteblock:", $blockinfo['url'] . "::", ACCESS_ADMIN)) {
		return; 
	}
	$fmid = $blockinfo['url'];
    $content = explode('$$$$$$$[parameter]$$$$$$$', $blockinfo['content']);
    $checked = ($content[1] == 1) ? "checked" : "";
	$blockContent = stripslashes($content[0]);
	$sortida = '<tr><td valign="top">' . __('Identity of the note that must be schown', $dom).'</td><td>'."<input type=\"text\" name=\"fmid\" size=\"5\" maxlength=\"5\" value=\"$fmid\" />"."</td></tr>\n";
    $sortida .= '<tr><td valign="top">' . __('Hide block title', $dom).'</td><td>' . "<input type=\"checkbox\" name=\"blockHideTitle\"" . $checked . " value=\"1\" />" . "</td></tr>\n";
	$sortida .= '<tr><td valign="top">' . __('Block content', $dom).'</td><td>' . "<textarea name=\"blockContent\" rows=\"5\" cols=\"70\">" . $blockContent . "</textarea>"."</td></tr>\n";
	$sortida .= '<tr><td colspan=\"2\" valign="top"><div class="pn-informationmsg">' . __("[\$formId\$] =>Identity of the form, [\$noteId\$] =>Identity of the note, [%id%] => Title of the field, [\$id\$] => Content of the field, [\$user\$] => Username, [\$date\$] => Note creation date, [\$time\$] => Note creation time, [\$avatar\$] => User avatar, [\$reply\$] => Reply to the user if the reply is public", $dom) . "</div></td><tr>\n";
	return $sortida;
}