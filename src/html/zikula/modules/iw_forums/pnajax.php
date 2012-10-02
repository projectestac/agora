<?php
/**
 * Change the users in select list
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Redirect to the user main page
*/
function iw_forums_ajax_chgUsers($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	if (!SecurityUtil::checkPermission('iw_forums::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$gid = FormUtil::getPassedValue('gid', -1, 'GET');
	if ($gid == -1) {
		LogUtil::registerError('no group id');
		AjaxUtil::output();
	}

   	// get group members
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupMembers = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
																			'gid' => $gid));

	asort($groupMembers);
	
	if (empty($groupMembers)) {
        	LogUtil::registerError('unable to get group members or group is empty for gid=' . DataUtil::formatForDisplay($gid));
	}

	$pnRender = pnRender::getInstance('iw_forums',false);
	$pnRender -> assign ('groupMembers',$groupMembers);
	$pnRender -> assign ('action','chgUsers');
	$content = $pnRender -> fetch('iw_forums_admin_ajax.htm');
	AjaxUtil::output(array('content' => $content));

}

/**
 * Change the characteristics of a forum definition
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the forum and the value to change
 * @return:	the new value in database
*/
function iw_forums_ajax_modifyForum($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	if (!SecurityUtil::checkPermission('iw_forums::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$fid = FormUtil::getPassedValue('fid', -1, 'GET');
	if ($fid == -1) {
		LogUtil::registerError('no forum id');
		AjaxUtil::output();
	}

	$char = FormUtil::getPassedValue('char', -1, 'GET');
	if ($char == -1) {
		LogUtil::registerError('no char defined');
		AjaxUtil::output();
	}


	//Get agenda information
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Forum not found', $dom)));
	}

	$value = ($item[$char]) ? 0 : 1;


	//change value in database
	$items = array($char => $value);

	if(!pnModApiFunc('iw_forums', 'admin', 'update', array('fid' => $fid,
									'items' => $items))){
		LogUtil::registerError('Error');
		AjaxUtil::output();
	}

	AjaxUtil::output(array('fid' => $fid));

}

/**
 * Change the characteristics of a forum definition
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the forum and the value to change
 * @return:	the field row new value in database
*/
function iw_forums_ajax_changeContent($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	if (!SecurityUtil::checkPermission('iw_forums::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$fid = FormUtil::getPassedValue('fid', -1, 'GET');
	if ($fid == -1) {
		LogUtil::registerError('no fid id');
		AjaxUtil::output();
	}

	$item = pnModFunc('iw_forums', 'admin', 'getCharsContent', array('fid' => $fid));
//	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
/*	if ($item == false) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Forum not found', $dom)));
	}
*/
	$pnRender = pnRender::getInstance('iw_forums',false);
	$pnRender -> assign('forum', $item);
	$content = $pnRender -> fetch('iw_forums_admin_mainChars.htm');

	AjaxUtil::output(array('content' => $content,
					'fid' => $fid));

}

/**
 * Define a message as marked
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the message
 * @return:	Redirect to the user main page
*/
function iw_forums_ajax_mark($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	if (!SecurityUtil::checkPermission('iw_forums::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	if(!pnUserLoggedIn()){
		AjaxUtil::error(DataUtil::formatForDisplayHTML(_IWFORUMSNOTALLOWEDTODOTHISACTION));
	}

	$fid = FormUtil::getPassedValue('fid', -1, 'GET');
	if ($fid == -1) {
		AjaxUtil::output('no forum id');
	}

	$fmid = FormUtil::getPassedValue('fmid', -1, 'GET');
	if ($fmid == -1) {
		AjaxUtil::output('no message id');
	}

	//get forum information
	$forum = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($forum == false) {
		AjaxUtil::output(__('The forum upon which the ation had to be carried out hasn\'t been found', $dom));
	}

	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 1){
		AjaxUtil::output(__('You can\'t access the forum', $dom));
	}

	//get message information
	$registre = pnModAPIFunc('iw_forums', 'user', 'get_msg', array('fmid' => $fmid));
	if($registre == false){
		AjaxUtil::output(__('No messages have been found', $dom));
	}

	$marcat = (strpos($registre['marcat'],'$'.pnUserGetVar('uid').'$') === false) ? $registre['marcat'].'$'.pnUserGetVar('uid').'$' : str_replace('$'.pnUserGetVar('uid').'$','',$registre['marcat']);

	$m = (strpos($registre['marcat'],'$'.pnUserGetVar('uid').'$') === false) ? 1 : 0;

	$ha_marcat = pnModAPIFunc('iw_forums', 'user', 'marcat', array('marcat' => $marcat,
									'fmid' => $fmid));;	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('module' => 'iw_main_block_flagged',
								'name' => 'have_flags',
								'value' => 'fo',
								'sv' => $sv));

	$markText = ($m == 0) ? __("Check the message",$dom) : __('Uncheck the message', $dom);

	$markText = "<span style=\"cursor: pointer;\" id=\"markText\"><a onclick=\"javascript:mark(" . $fid . "," . $fmid . ")\">" . $markText . "</a></span>";
	$modid = pnModGetIDFromName('iw_main');
    $blocks = pnModAPIFunc('Blocks', 'user', 'getall',
                            array('modid' => $modid));
	if (!empty($blocks)) {
	    $reloadFlags = ($blocks[0]['active'] == 1) ? true : false;
	} else {
		$reloadFlags = false;
	}
	AjaxUtil::output(array('fmid' => $fmid,
							'm' => $m,
							'markText' => $markText,
	                        'reloadFlags' => $reloadFlags));
}

/**
 * Delete the access to a group in a forum
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the forum and the group id to delete
 * @return:	the new value in database
*/
function iw_forums_ajax_deleteGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	if (!SecurityUtil::checkPermission('iw_forums::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$fid = FormUtil::getPassedValue('fid', -1, 'GET');
	if ($fid == -1) {
		AjaxUtil::error('no forum id');
	}
	$gid = FormUtil::getPassedValue('gid', -10, 'GET');
	if ($gid == -10) {
		AjaxUtil::error('no group id');
	}

	//Get item
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		AjaxUtil::error(__('Forum not found', $dom));
	}
	
	$groupString = str_replace('$'.$gid.'$','',$item['grup']);

	$items = array('grup' => $groupString);
	if (!pnModAPIFunc('iw_forums', 'admin', 'update', array('fid' => $fid,
															'items' => $items))){
		AjaxUtil::error('error deleting group');
   	}


	AjaxUtil::output(array('gid' => $gid,
							'fid' => $fid));
}

/**
 * Delete a forum moderator
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the forum and the user id to delete
 * @return:	the new value in database
*/
function iw_forums_ajax_deleteModerator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	if (!SecurityUtil::checkPermission('iw_forums::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$fid = FormUtil::getPassedValue('fid', -1, 'GET');
	if ($fid == -1) {
		AjaxUtil::error('no forum id');
	}
	$id = FormUtil::getPassedValue('id', -1, 'GET');
	if ($gid == -1) {
		AjaxUtil::error('no user id');
	}

	//Get item
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		AjaxUtil::error(__('Forum not found', $dom));
	}

	$respString = str_replace('$'.$id.'$','',$item['mod']);

	$items = array('mod' => $respString);
	if (!pnModAPIFunc('iw_forums', 'admin', 'update', array('fid' => $fid,
															'items' => $items))) {
		AjaxUtil::error('error deleting moderator');
   	}


	AjaxUtil::output(array('id' => $id,
							'fid' => $fid));
}

/**
 * Open a msg content
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the message
 * @return:	The message content
*/
function iw_forums_ajax_openMsg($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	if (!SecurityUtil::checkPermission('iw_forums::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$fid = FormUtil::getPassedValue('fid', -1, 'GET');
	if ($fid == -1) {
		AjaxUtil::output('no forum id');
	}

	$fmid = FormUtil::getPassedValue('fmid', -1, 'GET');
	if ($fmid == -1) {
		AjaxUtil::output('no message id');
	}
	$ftid = FormUtil::getPassedValue('ftid', -1, 'GET');
	$u = FormUtil::getPassedValue('u', -1, 'GET');
	$oid = FormUtil::getPassedValue('oid', -1, 'GET');
	$inici = FormUtil::getPassedValue('inici', -1, 'GET');

	//get forum information
	$forum = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($forum == false) {
		AjaxUtil::output(__('The forum upon which the ation had to be carried out hasn\'t been found', $dom));
	}

	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 1){
		AjaxUtil::output(__('You can\'t access the forum', $dom));
	}
	
	//get message information
	$registre = pnModAPIFunc('iw_forums', 'user', 'get_msg', array('fmid' => $fmid));
	if($registre == false){
		AjaxUtil::output(__('No messages have been found', $dom));
	}
	$content = pnModFunc('iw_forums', 'user', 'openMsg', array('fid' => $fid,
																'fmid' => $fmid,
																'ftid' => $ftid,
																'u' => $u,
																'oid' => $oid,
																'inici' => $inici));
	AjaxUtil::output(array('fmid' => $fmid,
							'content' => $content));
}