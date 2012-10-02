<?php
/**
 * Hide/show the information of an activity
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the activity
 * @return:	the activity id but with hanges in database
*/
function iw_jclic_ajax_hideShow($args){
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	if (!SecurityUtil::checkPermission('iw_jclic::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$jid = FormUtil::getPassedValue('jid', -1, 'GET');
	if ($jid == -1) {
		AjaxUtil::error('no activity id');
	}

   	// get activity
	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		AjaxUtil::error (__('Could not find the allocation requested', $dom));
	}

	$extended = (strpos($jclic['extended'], '$'.pnUserGetVar('uid').'$') !== false) ? str_replace('$'.pnUserGetVar('uid').'$','',$jclic['extended']) : $jclic['extended'].'$'.pnUserGetVar('uid').'$';
	$extendedState = (strpos($jclic['extended'], '$'.pnUserGetVar('uid').'$') !== false) ? 0 : 1;

	$items = array('extended' => $extended);
	$edited = pnModAPIFunc('iw_jclic', 'user', 'update', array('jid' => $jid,
																'items' => $items));
	if(!$edited){
		AjaxUtil::error (__('There was an error in editing the property', $dom));
	}

	$pnRender = pnRender::getInstance('iw_jclic',false);
	$activityArray = pnModFunc('iw_jclic', 'user', 'getActivityContent', array('jid' => $jclic['jid']));
	$activityArray['extended'] =  $extendedState;
	$pnRender -> assign ('activity', $activityArray);
	$content = $pnRender -> fetch('iw_jclic_user_assignedContent.htm');
	
	
	AjaxUtil::output(array('jid' => $jid,
							'content' => $content));
}

/**
 * Hide/show the results for an activity
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the activity
 * @return:	the activity id but with hanges in database
*/
function iw_jclic_ajax_results($args){
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	if (!SecurityUtil::checkPermission('iw_jclic::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$jid = FormUtil::getPassedValue('jid', -1, 'GET');
	if ($jid == -1) {
		AjaxUtil::error('no activity id');
	}

	$uid = FormUtil::getPassedValue('uid', -1, 'GET');
	if ($uid == -1) {
		$uid = pnUserGetVar('uid');
		$correct = 0;
	}else{
		$correct = 1;
	}
	
	if(!is_numeric($uid)){
		$uid = pnUserGetVar('uid');
		$correct = 0;
	}
	
   	// get activity
	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		AjaxUtil::error (__('Could not find the allocation requested', $dom));
	}

	$pnRender = pnRender::getInstance('iw_jclic',false);
	$resultsArray = pnModFunc('iw_jclic', 'user', 'results', array('jid' => $jid,
																	'uid' => $uid,
																	'all' => 1,
																	'correct' => $correct,
																	'scoreToOptain' => $jclic['scoreToOptain'],
																	'solvedToOptain' => $jclic['solvedToOptain']));
	
	$pnRender -> assign ('results', $resultsArray);
	$pnRender -> assign ('jid', $jid);
	$pnRender -> assign ('correct', $correct);
	$pnRender -> assign ('uid', $uid);
	$content = $pnRender -> fetch('iw_jclic_user_results.htm');
	
	AjaxUtil::output(array('jid' => $jid,
							'content' => $content,
							'uid' => $uid,
							'correct' => $correct));
}

/**
 * Edit the notes observations or the answares to users who has made activities
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the activity id and user id
 * @return:	Show the observations or renotes contents forms
*/
function iw_jclic_ajax_editCorrectContent($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	if (!SecurityUtil::checkPermission('iw_jclic::', '::', ACCESS_ADD)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$jid = FormUtil::getPassedValue('jid', -1, 'GET');
	if ($jid == -1) {
		AjaxUtil::error('no activity id');
	}

	$uid = FormUtil::getPassedValue('uid', -1, 'GET');
	if ($uid == -1) {
		AjaxUtil::error('no user id');
	}

	$do = FormUtil::getPassedValue('do', -1, 'GET');
	if ($do == -1) {
		AjaxUtil::error('no action defined');
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		AjaxUtil::error (__('Could not find the allocation requested', $dom));
	}

	//check user access this assignament
	if($jclic['user'] != pnUserGetVar('uid')){
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	//get user session
	$session = pnModAPIFunc('iw_jclic','user','getUserSession',array('key' => $jid,
																		'user_id' => $uid));

	if ($session == false) {
		//Create session user
		pnModAPIFunc('iw_jclic', 'user', 'createUser', array('user_id' => $uid,
																'key' => $jid));
	}
	
	$pnRender = pnRender::getInstance('iw_jclic',false);
	$pnRender -> assign('do', 'edit');
	$pnRender -> assign('uid', $uid);
	$pnRender -> assign('jid', $jid);

	if($do == 'observations'){
		$pnRender -> assign('content', $session[$uid]['observations']);
		$content = $pnRender -> fetch('iw_jclic_user_correctObs.htm');
	}
	if($do == 'renotes'){
		$pnRender -> assign('content', $session[$uid]['renotes']);
		$content = $pnRender -> fetch('iw_jclic_user_correctRenotes.htm');
	}

	AjaxUtil::output(array('jid' => $jid,
							'uid' => $uid,
							'content' => $content,
							'toDo' => $do));
}

/**
 * update the notes observations or the answares to writers
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Change the observations or renotes contents
*/
function iw_jclic_ajax_submitValue($args)
{
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	if (!SecurityUtil::checkPermission('iw_jclic::', '::', ACCESS_ADD)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}


	$jid = FormUtil::getPassedValue('jid', -1, 'GET');
	if ($jid == -1) {
		AjaxUtil::error('no activity id');
	}

	$uid = FormUtil::getPassedValue('uid', -1, 'GET');
	if ($uid == -1) {
		AjaxUtil::error('no user id');
	}

	$do = FormUtil::getPassedValue('do', -1, 'GET');
	if ($do == -1) {
		AjaxUtil::error('no action defined');
	}

	$value = FormUtil::getPassedValue('value', -1, 'GET');
	if ($value == -1) {
		AjaxUtil::error('no value defined');
	}

	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		AjaxUtil::error (__('Could not find the allocation requested', $dom));
	}

	//check user access this assignament
	if($jclic['user'] != pnUserGetVar('uid')){
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	//submit values
	$submited = pnModAPIFunc('iw_jclic', 'user', 'submitValue', array('content' => utf8_decode($value),
																		'jid' => $jid,
																		'user_id' => $uid,
																		'toDo' => $do));
	if($submited == false){
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('An error occurred while editing the content', $dom)));
	}

	$pnRender = pnRender::getInstance('iw_jclic',false);
	$pnRender -> assign('do', 'print');

	$session['uid'] = $uid;
	$jclic['jid'] =$jid;
	
	if($do == 'observations'){
		$session['observations'] = utf8_decode($value);
		$pnRender -> assign('session', $session);
		$pnRender -> assign('jclic', $jclic);
		$content = $pnRender -> fetch('iw_jclic_user_correctObs.htm');
	}
	if($do == 'renotes'){
		$session['renotes'] = utf8_decode($value);
		$pnRender -> assign('session', $session);
		$pnRender -> assign('jclic', $jclic);
		$content = $pnRender -> fetch('iw_jclic_user_correctRenotes.htm');
	}

	AjaxUtil::output(array('uid' => $uid,
							'content' => $content,
							'toDo' => $do));
}

/**
 * Delete all the information about an activity
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the activity
 * @return:	the activity id removed from database
*/
function iw_jclic_ajax_delete($args){
	$dom = ZLanguage::getModuleDomain('iw_jclic');
	if (!SecurityUtil::checkPermission('iw_jclic::', '::', ACCESS_ADD)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$jid = FormUtil::getPassedValue('jid', -1, 'GET');
	if ($jid == -1) {
		AjaxUtil::error('no activity id');
	}

  	// get activity
	//get jclic activity
	$jclic = pnModAPIFunc('iw_jclic', 'user', 'get', array('jid' => $jid));
	if ($jclic == false) {
		AjaxUtil::error (__('Could not find the allocation requested', $dom));
	}

	//Check if user can delete the assignament
	if($jclic['user'] != pnUserGetVar('uid')){
		AjaxUtil::error(__('Sorry! No authorization to access this module.', $dom));
	}

	//delete all the users
	if(!pnModAPIFunc('iw_jclic', 'user', 'delUsers', array('jid' => $jid))){
		AjaxUtil::error (__('Unable to delete users associated with the allocation', $dom));
	}
	
	//delete all the session
	if(!pnModAPIFunc('iw_jclic', 'user', 'delSessions', array('jid' => $jid))){
		AjaxUtil::error (__('Unable to delete sessions related to the allocation', $dom));
	}
	
	//delete the assignament
	if(!pnModAPIFunc('iw_jclic', 'user', 'delAssignament', array('jid' => $jid))){
		AjaxUtil::error (__('Failed to delete the allocation', $dom));
	}
	
	//if the assignament have an associated file, delete it
	if($jclic['file'] != ''){
		unlink(pnModGetVar('iw_main','documentRoot') . '/' . pnModGetVar('iw_jclic','jclicUpdatedFiles') . '/' . $jclic['file']);
	}
	
	AjaxUtil::output(array('jid' => $jid));
}