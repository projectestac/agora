<?php
/**
 * Define a note as marked
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Redirect to the user main page
*/
function iw_noteboard_ajax_marca($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	if (!SecurityUtil::checkPermission('iw_noteboard::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	if(!pnUserLoggedIn()){
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('You are not allowed to do this action', $dom)));
	}
	$nid = FormUtil::getPassedValue('nid', -1, 'GET');
	if ($nid == -1) {
		LogUtil::registerError('no block id');
		AjaxUtil::output();
	}
   	// get a note information
	$note = pnModAPIFunc('iw_noteboard', 'user', 'get',
                            array('nid' => $nid));
	if ($note == false) {
        	LogUtil::registerError('unable to get note info for nid=' . DataUtil::formatForDisplay($nid));
        	AjaxUtil::output();
	}
	if (strpos($note['marca'],'$'.pnUserGetVar('uid').'$')!=0) {
		$marca = str_replace('$'.pnUserGetVar('uid').'$','',$note['marca']);
	} else {
		$marca = $note['marca'].'$'.pnUserGetVar('uid').'$';		
	}
	// Delete or create the mark
	$lid = pnModAPIFunc('iw_noteboard', 'user', 'marca',
                            array('nid' => $nid,
							      'marca' => $marca));
	if (!$lid) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('The action has failed', $dom)));
	} else {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar',
                    array('module' => 'iw_main_block_flagged',
					      'name' => 'have_flags',
						  'value' => 'ta',
						  'sv' => $sv));
	}
	AjaxUtil::output(array('nid' => $nid));
}

/**
 * Hide a note of a user
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Redirect to the user main page
*/
function iw_noteboard_ajax_hide($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	if (!SecurityUtil::checkPermission('iw_noteboard::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	if(!pnUserLoggedIn()){
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('You are not allowed to do this action', $dom)));
	}
	$nid = FormUtil::getPassedValue('nid', -1, 'GET');
	if ($nid == -1) {
		LogUtil::registerError('no block id');
		AjaxUtil::output();
	}
   	// get a note information
	$note = pnModAPIFunc('iw_noteboard', 'user', 'get',
                            array('nid' => $nid));
	if ($note == false) {
        	LogUtil::registerError('unable to get note info for nid=' . DataUtil::formatForDisplay($nid));
        	AjaxUtil::output();
	}
	// add the user as the hide note list
	$no_mostrar = $note['no_mostrar'].'$'.pnUserGetVar('uid').'$';
	// delete the user as a signed note
	$marca = str_replace('$'.pnUserGetVar('uid').'$','',$note['marca']);
	// hide a note for a user
	$lid = pnModAPIFunc('iw_noteboard', 'user', 'no_mostrar',
                            array('nid' => $nid,
							      'no_mostrar' => $no_mostrar,
								  'marca' => $marca));
	if(!$lid){
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('The action has failed', $dom)));
	}
	//Delete users headlines var. This renoval the block information
	if($note['titular'] != ''){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'userDelVar', array('name' => 'nbheadlines',
									'module' => 'iw_noteboard',
									'uid' => pnUserGetVar('uid'),
									'sv' => $sv));
	}
	AjaxUtil::output(array('nid' => $nid));
}

/**
 * Force the caducity of a note
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Redirect to the user main page
*/
function iw_noteboard_ajax_save($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	if (!SecurityUtil::checkPermission('iw_noteboard::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos',
                                    array('uid' => pnUserGetVar('uid')));
	// Security check
	if (!$permissions['potverificar']) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('You are not allowed to do this action', $dom)));
	}
	$nid = FormUtil::getPassedValue('nid', -1, 'GET');
	if ($nid == -1) {
		LogUtil::registerError('no block id');
		AjaxUtil::output();
	}
   	// get a note information
	$note = pnModAPIFunc('iw_noteboard', 'user', 'get',
                            array('nid' => $nid));
	if ($note == false) {
        	LogUtil::registerError('unable to get note info for nid=' . DataUtil::formatForDisplay($nid));
        	AjaxUtil::output();
	}
	$security=pnSecGenAuthKey();
	$save = pnModFunc('iw_noteboard', 'user', 'nova',
                        array('nid' => $nid,
                              'm' => 'c',
                              'authid' => $security));
	if (!$save) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('The action has failed', $dom)));
	}
	//Delete users headlines var. This renoval the block information
	if($note['titular'] != ''){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule', array('name' => 'nbheadlines',
																	'module' => 'iw_noteboard',
																	'sv' => $sv));
	}
	AjaxUtil::output(array('nid' => $nid));
}

/**
 * Delete a note
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note, the topic that is viewing the user and the information of the saved mode
 * @return:	Thue if success
*/
function iw_noteboard_ajax_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	if (!SecurityUtil::checkPermission('iw_noteboard::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$nid = FormUtil::getPassedValue('nid', -1, 'GET');
	if ($nid == -1) {
		LogUtil::registerError('no block id');
		AjaxUtil::output();
	}
   	// get a note information
	$note = pnModAPIFunc('iw_noteboard', 'user', 'get',
                            array('nid' => $nid));
	if ($note == false) {
        	LogUtil::registerError('unable to get note info for nid=' . DataUtil::formatForDisplay($nid));
        	AjaxUtil::output();
	}
	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos',
                                    array('uid' => pnUserGetVar('uid')));
	if ($permissions['nivell'] < 6) {
		LogUtil::registerError(__('You are not allowed to do this action', $dom));
		AjaxUtil::output();
	}
	if ($note['informa'] != pnUserGetVar('uid') &&
		$permissions['nivell'] == 6) {
		LogUtil::registerError(__('You are not allowed to do this action', $dom));
		AjaxUtil::output();
	}
	// Check if the note have comments. In this case can't be deleted until the comments not be deleted
	$comentaris = pnModAPIFunc('iw_noteboard', 'user', 'getallcomentaris',
                                array('ncid' => $nid));
	if (!empty($comentaris)) {
		LogUtil::registerError(__('The note cannot be deleted because it has comments. Remove the comments previously.', $dom));
		AjaxUtil::output();
	}
	$fileName = $note['fitxer'];
	// Proceed with the record deletion
	if (pnModAPIFunc('iw_noteboard', 'user', 'delete',
                        array('nid' => $nid))) {
		// Deletion successfully
		LogUtil::registerStatus (__('The note has been deleted', $dom));
		// Delete the attached file in case it exists
		if ($fileName != '') {
			$folder = pnModGetVar('iw_noteboard','attached');
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$delete = pnModFunc('iw_main', 'user', 'deleteFile',
                                    array('sv' => $sv,
										  'folder' => $folder,
										  'fileName' => $fileName));
		}
	} else {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('The action has failed', $dom)));
	}
	//Delete users headlines var. This renoval the block information
	if ($note['titular'] != '') {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule',
                        array('name' => 'nbheadlines',
						      'module' => 'iw_noteboard',
							  'sv' => $sv));
	}
	AjaxUtil::output(array('nid' => $nid));
}

/**
 * Delete a topic
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the topic id
 * @return	true if the topic have been deleted
 */
function iw_noteboard_ajax_deletetopic($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	if (!SecurityUtil::checkPermission('iw_noteboard::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	if (!SecurityUtil::confirmAuthKey()) {
		AjaxUtil::error(__('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
	}
	$tid = FormUtil::getPassedValue('tid', -1, 'GET');
	if ($tid == -1) {
		LogUtil::registerError('no topic id');
		AjaxUtil::output();
	}
   	// get a note information
	$topic = pnModAPIFunc('iw_noteboard', 'user', 'gettema',
                            array('tid' => $tid));
	if ($topic == false) {
        	LogUtil::registerError('unable to get topic info for tid=' . DataUtil::formatForDisplay($tid));
        	AjaxUtil::output();
	}	$lid = pnModAPIFunc('iw_noteboard', 'admin', 'esborra',
                            array('tid' => $tid));
	if (!$lid) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('The action has failed', $dom)));
	} else {
		// delete the record
		// Success
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule',
                        array('name' => 'nbtopics',
						      'module' => 'iw_noteboard',
							  'sv' => $sv));
	}
 	AjaxUtil::output(array('tid' => $tid));
}

/**
 * Delete a shared URL
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the shared id
 * @return	true if the topic have been deleted
 */
function iw_noteboard_ajax_deleteShared($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	if (!SecurityUtil::checkPermission('iw_noteboard::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	if (!SecurityUtil::confirmAuthKey()) {
		AjaxUtil::error(__('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
	}
	$pid = FormUtil::getPassedValue('pid', -1, 'GET');
	if ($pid == -1) {
		LogUtil::registerError('no shared id');
		AjaxUtil::output();
	}
   	// get a note information
	$shared = pnModAPIFunc('iw_noteboard', 'user', 'getShared',
                            array('pid' => $pid));
	if ($shared == false) {
        	LogUtil::registerError('unable to get shared info for pid=' . DataUtil::formatForDisplay($pid));
        	AjaxUtil::output();
	}	$lid = pnModAPIFunc('iw_noteboard', 'admin', 'delShared',
                            array('pid' => $pid));
	if (!$lid) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('The action has failed', $dom)));
	}
 	AjaxUtil::output(array('pid' => $pid));
}

/**
 * Regenerate a shared URL
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the shared id
 * @return	the new content for the url div information
 */
function iw_noteboard_ajax_regenSharedURL()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	if (!SecurityUtil::checkPermission('iw_noteboard::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$regenerated = pnModFunc('iw_noteboard', 'admin', 'regenerateShared');
	if ($regenerated == false) {
        	LogUtil::registerError('unable to regenerate shared URL');
        	AjaxUtil::output();
	}
	$pnRender = pnRender::getInstance('iw_noteboard',false);
	$pnRender->assign ('sid', pnModGetVar('iw_noteboard', 'publicSharedURL'));
	$content = $pnRender->fetch('iw_noteboard_admin_sharedURL.htm');
 	AjaxUtil::output(array('content' => $content));
}

/**
 * creata a new shared URL
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the shared id
 * @return	the new content for the url div information
 */
function iw_noteboard_ajax_createSharedURL()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	if (!SecurityUtil::checkPermission('iw_noteboard::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$public = FormUtil::getPassedValue('public', -1, 'GET');
	if ($public == -1) {
		LogUtil::registerError('no topic id');
		AjaxUtil::output();
	}
	$content = pnModFunc('iw_noteboard', 'admin', 'sharedOptions',
                            array('public' => $public));
	AjaxUtil::output(array('content' => $content));
}