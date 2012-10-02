<?php
function smarty_function_iwforumsusermenulinks($params, &$smarty)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');	
	// check the access level for the user for the forum
	$access = (isset($params['fid'])) ? pnModFunc('iw_forums', 'user', 'access', array('fid' => $params['fid'])) : false;

	// set some defaults
	if (!isset($params['start'])) {
		$params['start'] = '[';
	}
	if (!isset($params['end'])) {
		$params['end'] = ']';
	}
	if (!isset($params['seperator'])) {
		$params['seperator'] = '| ';
	}
	if (!isset($params['class'])) {
		$params['class'] = 'pn-menuitem-title';
	}

	if(isset($params['fmid']) && $params['fmid'] > 0){
		//get message information
		$message = pnModAPIFunc('iw_forums', 'user', 'get_msg', array('fmid' => $params['fmid']));
		if($message == false){
			LogUtil::registerError (__('No messages have been found', $dom));
			return pnRedirect(pnModURL('iw_forums', 'user', 'main'));

		}		
	}

	$forumsusermenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m5']) && $access > 1) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'nou_msg',
						array('inici' => $params['inici'],
							'fid' => $params['fid'],
							'ftid' => $params['ftid'],
							'u' => $params['u'],
							'fmid' => $params['fmid'],
							'oid' => $params['oid']))) . "\">" . __('Reply to the message',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m6']) && $access > 0 && pnUserLoggedIn()) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'lectors',
						array('inici' => $inici,
							'fid' => $params['fid'],
							'ftid' => $params['ftid'],
							'u' => $params['u'],
							'fmid' => $params['fmid'],
							'oid' => $params['oid']))) . "\">" . __('Who has read the message?',$dom) . "</a> " . $params['seperator'];
	}
	
	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m1']) && $access > 2 && $params['ftid'] == null) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'nou_tema',
						array('fid' => $params['fid'],
							'u' => $params['u'],
							'inici' => $params['inici']))) . "\">" . __('Create a new topic',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m2']) && $access > 1) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'nou_msg',
						array('fid' => $params['fid'],
							'inici' => $params['inici'],
							'u' => $params['u'],
							'ftid' => $params['ftid']))) . "\">" . __('Send a new message',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m3'])) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'main',
						array('inici' => $params['inici']))) . "\">" . __('View the forum list',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && (isset($params['m4']) && $access > 0) || ($params['ftid'] != null && $access >0)) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'forum',
						array('inici' => $params['inici'],
							'u' => $params['u'],
							'fid' => $params['fid']))) . "\">" . __('Return to the list of topics and messages', $dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m7']) && $access > 0) {
		if($params['fmid'] != 0){
			$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'llista_msg',
						array('inici' => $params['inici'],
							'fid' => $params['fid'],
							'u' => $params['u'],
							'ftid' => $params['ftid']))) . "\">" . __('Return to the message list',$dom) . "</a> " . $params['seperator'];
		}
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m8']) && $access > 0) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'msg',
						array('inici' => $params['inici'],
							'fid' => $params['fid'],
							'ftid' => $params['ftid'],
							'u' => $params['u'],
							'fmid' => $params['fmid'],
							'oid' => $params['oid']))) . "\">" . __('Return to the message',$dom) . "</a> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m9']) && $access > 0 && pnUserLoggedIn()) {
		if ($params['ftid'] == null){
			$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'llegits',
							array('inici' => $params['inici'],
								'fid' => $params['fid']))) . "\">" . __('Check all messages as read',$dom) . "</a> " . $params['seperator'];
		}else{
			$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'llegits',
							array('inici' => $params['inici'],
								'ftid' => $params['ftid'],
								'u' => $params['u'],
								'fid' => $params['fid']))) . "\">" . __('Check all messages as read',$dom) . "</a> " . $params['seperator'];
		}
	}
/*
	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m10']) && $access > 0) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'printallmsg',
						array('inici' => $params['inici'],
							'fid' => $params['fid'],
							'ftid' => $params['ftid'],
							'u' => $params['u']))) . "\">" . _FORUMSIMPRIMIR . "</a> " . $params['seperator'];
	}
*/
/*
	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m11']) && $access > 0 && pnUserLoggedIn()) {
		$forumsusermenulinks .= "<a onClick=\"javascript:printer()\" style=\"cursor:pointer\">". _FORUMSIMPRIMIRMSG . "</a> " . $params['seperator'];
	}
*/
/*
	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m12']) && $access > 0 && pnUserLoggedIn() && strpos($message['marcat'],'$'.pnUserGetVar('uid').'$') == 0) {
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'marca',
							array('inici' => $params['inici'],
								'm' => 1,
								'fid' => $params['fid'],
								'ftid' => $params['ftid'],
								'fmid' => $params['fmid'],
								'u' => $params['u'],
								'msg' => 1,
								'oid' => $params['oid']))) . "\">" . _FORUMSMARCAMSG . "</a> " . $params['seperator'];
	}
*/
/*	
	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m13']) && $access > 0 && pnUserLoggedIn() && strpos($message['marcat'],'$'.pnUserGetVar('uid').'$') != 0){
		$forumsusermenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_forums', 'user', 'marca',
							array('inici' => $params['inici'],
								'm' => 0,
								'fid' => $params['fid'],
								'ftid' => $params['ftid'],
								'fmid' => $params['fmid'],
								'u' => $params['u'],
								'msg' => 1,
								'oid' => $params['oid']))) . "\">" . _FORUMSDESMARCAMSG . "</a> " . $params['seperator'];
	}
*/
	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m12']) && $access > 0 && pnUserLoggedIn() && strpos($message['marcat'],'$'.pnUserGetVar('uid').'$') == 0) {
		$forumsusermenulinks .= "<span style=\"cursor: pointer;\" id=\"markText".$params['fmid']."\"><a onclick=\"javascript:mark(".$params['fid'].",".$params['fmid'].")\">" . __('Check the message',$dom) . "</a></span> " . $params['seperator'];
	}

	if (SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_READ) && isset($params['m13']) && $access > 0 && pnUserLoggedIn() && strpos($message['marcat'],'$'.pnUserGetVar('uid').'$') != 0) {
		$forumsusermenulinks .= "<span style=\"cursor: pointer;\" id=\"markText".$params['fmid']."\"><a onclick=\"javascript:mark(".$params['fid'].",".$params['fmid'].")\">" . __('Uncheck the message',$dom) . "</a></span> " . $params['seperator'];
	}

	$forumsusermenulinks = substr($forumsusermenulinks, 0, -2);

	$forumsusermenulinks .= $params['end'] . "</span>\n";

	return $forumsusermenulinks;
}
