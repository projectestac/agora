<?php
/**
 * Define a note as mached
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Redirect to the user main page
*/
function iw_messages_ajax_marca($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	if (!SecurityUtil::checkPermission('iw_messages::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	if (!pnUserLoggedIn()) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('You are not allowed to do this action', $dom)));
	}
	$ids = FormUtil::getPassedValue('ids', -1, 'GET');
	if ($ids == -1) {
		AjaxUtil::error('no block id');
	}
	$ids_array = explode('$',$ids);
	foreach ($ids_array as $id) {
		if ($id != '') {
   			// get a message information
			$note = pnModAPIFunc('iw_messages', 'user', 'get',
			                      array('msgid' => $id,
										'uid' => pnUserGetVar('uid')));
			if ($note == false) {
        			LogUtil::registerError('unable to get message info for msgid=' . DataUtil::formatForDisplay($id));
        			AjaxUtil::output();
			}
			//Change the note flag in database
			$status = pnModAPIFunc('iw_messages', 'user', 'check',
			                        array('msgid' => $id,
									      'uid' => pnUserGetVar('uid')));
			if (!$status) {
        			LogUtil::registerError('unable check/uncheck message for msgid=' . DataUtil::formatForDisplay($id));
			} else {
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				pnModFunc('iw_main', 'user', 'userSetVar',
						   array('module' => 'iw_main_block_flagged',
							     'name' => 'have_flags',
								 'value' => 'me',
								 'sv' => $sv));
			}
		}
	}
	AjaxUtil::output(array('ids' => $ids));
}

/**
 * Define a note as mached
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Redirect to the user main page
*/
function iw_messages_ajax_mark($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	if (!SecurityUtil::checkPermission('iw_messages::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	if (!pnUserLoggedIn()) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('You are not allowed to do this action', $dom)));
	}
	$msg_id = FormUtil::getPassedValue('msg_id', -1, 'GET');
	if ($msg_id == -1) {
		AjaxUtil::error('no msg id');
	}
	// get a message information
	$note = pnModAPIFunc('iw_messages', 'user', 'get',
	                      array('msgid' => $msg_id,
								'uid' => pnUserGetVar('uid')));
	if ($note == false) {
			AjaxUtil::error('unable to get message info for msgid=' . DataUtil::formatForDisplay($msg_id));
	}
	//Change the note flag in database
	$status = pnModAPIFunc('iw_messages', 'user', 'check',
	                        array('msgid' => $msg_id,
								  'uid' => pnUserGetVar('uid')));
	if (!$status) {
			AjaxUtil::error('unable check/uncheck message for msgid=' . DataUtil::formatForDisplay($msg_id));
	} else {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar',
		           array('module' => 'iw_main_block_flagged',
						 'name' => 'have_flags',
						 'value' => 'me',
						 'sv' => $sv));
	}
	AjaxUtil::output(array('msg_id' => $msg_id));
}

/**
 * Delete a message
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note, the topic that is viewing the user and the information of the saved mode
 * @return:	Thue if success
*/
function iw_messages_ajax_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	if (!SecurityUtil::checkPermission('iw_messages::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	if (!pnUserLoggedIn()) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('You are not allowed to do this action', $dom)));
	}
	$ids = FormUtil::getPassedValue('ids', -1, 'GET');
	$qui = FormUtil::getPassedValue('qui', -1, 'GET');
	if ($ids == -1 || $qui == -1) {
		AjaxUtil::error('no id');
	}
	$ids_array = explode('$', $ids);
	foreach ($ids_array as $id) {
		if ($id != '') {
   			// get a message information
			$note = pnModAPIFunc('iw_messages', 'user', 'get',
			                      array('msgid' => $id,
									    'uid' => pnUserGetVar('uid')));
			if ($note == false) {
        			AjaxUtil::error('unable to get message info for msgid=' . DataUtil::formatForDisplay($id));
			}
			//Change the note flag in database
			$status = pnModAPIFunc('iw_messages', 'user', 'delete',
			                        array('msgid' => $id,
										  'uid' => pnUserGetVar('uid'),
										  'qui' => $qui));
			if (!$status) {
        			AjaxUtil::error('unable delete message for msgid=' . DataUtil::formatForDisplay($id));
			}
		}
	}
	AjaxUtil::output(array('ids' => $ids));
}

/**
 * get the users who have the first leter like the parameter
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   value to search for
 * @return:	A list of users
*/
function iw_messages_ajax_autocompleteUser($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	if (!SecurityUtil::checkPermission('iw_messages::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	if (!pnUserLoggedIn()) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('You are not allowed to do this action', $dom)));
	}
	$value = FormUtil::getPassedValue('value', -1, 'GET');
	$pos = strrpos($value,',');
	$newValue = ($pos > 0) ? substr($value, $pos - strlen($value) + 1) : $value;
	$usersString = '';
	if ($newValue != '') {
		$users = pnModAPIFunc('iw_messages', 'user', 'getUsers',
		                       array('value' => $newValue));
		$usersList = '$$';
		foreach ($users as $user) {
			$usersList .= $user['uid'].'$$';
		}
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$usersNames = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
		                         array('sv' => $sv,
									   'info' => 'ncc',
									   'list' => $usersList));
		foreach ($users as $user) {
			$userName = substr($user['uname'], strlen($newValue), strlen($user['uname']));
			$usersString .= "<div><a style=\"cursor: pointer;\" onclick=\"add('" . $value.$userName . "')\">" . $user['uname'] . " - " . $usersNames[$user['uid']] . "</a></div>";
		}
	}
	AjaxUtil::output(array('users' => $usersString));
}

function iw_messages_ajax_view($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	if (!SecurityUtil::checkPermission('iw_messages::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$inici = FormUtil::getPassedValue('inici', -1, 'GET');
	$rpp = FormUtil::getPassedValue('rpp', -1, 'GET');
	$inicisend = FormUtil::getPassedValue('inicisend', -1, 'GET');
	$rppsend = FormUtil::getPassedValue('rppsend', -1, 'GET');
	$filtersend = FormUtil::getPassedValue('filtersend', -1, 'GET');
	$filter = FormUtil::getPassedValue('filter', -1, 'GET');
	$content = pnModFunc('iw_messages', 'user', 'view',
	                      array('inici' => $inici,
								'rpp' => $rpp,
								'inicisend' => $inicisend,
								'rppsend' => $rppsend,
								'filtersend' => $filtersend,
								'filter' => $filter));
	AjaxUtil::output(array('content' => $content));
}

function iw_messages_ajax_display($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	if (!SecurityUtil::checkPermission('iw_messages::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$msgid = FormUtil::getPassedValue('msgid', -1, 'GET');
	if ($msgid == -1) {
		AjaxUtil::error('no msg id');
	}
	
	$qui = FormUtil::getPassedValue('qui', -1, 'GET');
	if ($qui == -1) {
		AjaxUtil::error('no who value');
	}
	$inici = FormUtil::getPassedValue('inici', -1, 'GET');
	$rpp = FormUtil::getPassedValue('rpp', -1, 'GET');
	$inicisend = FormUtil::getPassedValue('inicisend', -1, 'GET');
	$rppsend = FormUtil::getPassedValue('rppsend', -1, 'GET');
	$filtersend = FormUtil::getPassedValue('filtersend', -1, 'GET');
	$filter = FormUtil::getPassedValue('filter', -1, 'GET');
	$content = pnModFunc('iw_messages', 'user', 'display',
	                      array('msgid' => $msgid,
							    'uid' => $qui,
								'inici' => $inici,
								'rpp' => $rpp,
								'inicisend' => $inicisend,
								'rppsend' => $rppsend,
								'filtersend' => $filtersend,
								'filter' => $filter));

	AjaxUtil::output(array('content' => $content));
}

function iw_messages_ajax_displaysend($args)
{
	$dom = ZLanguage::getModuleDomain('iw_messages');
	if (!SecurityUtil::checkPermission('iw_messages::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$msgid = FormUtil::getPassedValue('msgid', -1, 'GET');
	if ($msgid == -1) {
		AjaxUtil::error('no msg id');
	}
	$qui = FormUtil::getPassedValue('qui', -1, 'GET');
	if ($qui == -1) {
		AjaxUtil::error('no who value');
	}
	$uid = FormUtil::getPassedValue('uid', -1, 'GET');
	if ($uid == -1) {
		AjaxUtil::error('no user id');
	}
	$inici = FormUtil::getPassedValue('inici', -1, 'GET');
	$rpp = FormUtil::getPassedValue('rpp', -1, 'GET');
	$inicisend = FormUtil::getPassedValue('inicisend', -1, 'GET');
	$rppsend = FormUtil::getPassedValue('rppsend', -1, 'GET');
	$filtersend = FormUtil::getPassedValue('filtersend', -1, 'GET');
	$filter = FormUtil::getPassedValue('filter', -1, 'GET');
	$content = pnModFunc('iw_messages', 'user', 'displaysend',
	                      array('msgid' => $msgid,
								'qui' => $qui,
								'uid' => $uid,
								'inici' => $inici,
								'rpp' => $rpp,
								'inicisend' => $inicisend,
								'rppsend' => $rppsend,
								'filtersend' => $filtersend,
								'filter' => $filter));
	AjaxUtil::output(array('content' => $content));
}