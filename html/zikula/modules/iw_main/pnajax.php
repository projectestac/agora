<?php

/**
 * Delete all the information about an activity
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Id of the activity
 * @return:	the activity id removed from database
*/
function iw_main_ajax_change($args){
	$dom = ZLanguage::getModuleDomain('iw_main');
	if (!SecurityUtil::checkPermission('iw_main::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$chid = FormUtil::getPassedValue('chid', -1, 'GET');
	if ($chid == -1) {
		AjaxUtil::error('no change user id');
	}

	$toDo = FormUtil::getPassedValue('toDo', -1, 'GET');
	if ($toDo == -1) {
		AjaxUtil::error('no action defined');
	}
	
	if($toDo == 'ch'){
		//change the file name
	}
	
	$error = '';
	
	if($toDo == 'del'){
		//delete the file
		if(!pnModFunc('iw_main', 'user', 'deleteAvatar', array('avatarName' => substr($chid,0,-4),
																'extensions' => array('jpg','png','gif')))){
			$error = __('Error deleting avatar', $dom);
		}
		
		//delete the small picture
		pnModFunc('iw_main', 'user', 'deleteAvatar', array('avatarName' => substr($chid,0,-4).'_s',
															'extensions' => array('jpg','png','gif')));
	}else{
		$file_extension = strtolower(substr(strrchr($chid,"."),1));
		$formats =  '$jpg$$png$$gif$';
		$formats = str_replace('$'.$file_extension.'$','',$formats);
		$len = strlen($formats)-2;
		$formatsArray = explode('$$',substr($formats,1,$len));
		
		//change file name
		$changed = rename(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder').'/'.$chid, pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder').'/'.substr($chid,1,strlen($chid)));
		if($changed){
			pnModFunc('iw_main', 'user', 'deleteAvatar', array('avatarName' => substr($chid,1,-4),
																	'extensions' => $formatsArray));
		}else{
			$error = __('Error changing avatar', $dom);
		}
		
		//Change small pictures
		$chid_s = substr($chid,0,-4).'_s.'.$file_extension;
		rename(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder').'/'.$chid_s, pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_main', 'usersPictureFolder').'/'.substr($chid_s,1,strlen($chid_s)));
		pnModFunc('iw_main', 'user', 'deleteAvatar', array('avatarName' => substr($chid_s,1,-4),
															'extensions' => $formatsArray));
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('module' => 'iw_main_block_news',
														'name' => 'have_news',
														'value' => 'ch',
														'sv' => $sv));


	AjaxUtil::output(array('chid' => $chid,
							'error' => $error));
}


function iw_main_ajax_reloadNewsBlock(){
	$dom = ZLanguage::getModuleDomain('iw_main');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_main:newsBlock:', $row['title']."::", ACCESS_READ) || !pnUserLoggedIn()) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	$uid = pnUserGetVar('uid');

	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'news',
																		'module' => 'iw_main_block_news',
																		'uid' => $uid,
																		'sv' => $sv));

	if(!$exists){
		pnModFunc('iw_main', 'user', 'news');
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$have_news = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
																	'name' => 'have_news',
																	'module' => 'iw_main_block_news',
																	'sv' => $sv));


	if($have_news != '0'){
		pnModFunc('iw_main', 'user', 'news', array('where' => $have_news));

		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
															'name' => 'have_news',
															'module' => 'iw_main_block_news',
															'sv' => $sv,
															'value' => '0'));
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$news = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
																'name' => 'news',
																'module' => 'iw_main_block_news',
																'sv' => $sv,
																'nult' => true));

	$pnRender = pnRender::getInstance('iw_main',false);

	$pnRender -> assign('news', $news);
	$pnRender -> assign('ajax', 1);
	$content = $pnRender -> fetch('iw_main_block_iwnews.htm');

	AjaxUtil::output(array('content' => $content));
}




function iw_main_ajax_reloadFlaggedBlock(){
	$dom = ZLanguage::getModuleDomain('iw_main');
	// Security check
	if (!SecurityUtil::checkPermission('iw_main:flaggedBlock:', $row['title']."::", ACCESS_READ) || !pnUserLoggedIn()) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}

	//get the headlines saved in the user vars. It is renovate every 10 minutes

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'flagged',
																		'module' => 'iw_main_block_flagged',
																		'uid' => pnUserGetVar('uid'),
																		'sv' => $sv));

	$chars = 15;

	if(!$exists){
		pnModFunc('iw_main', 'user', 'flagged', array('where' => '',
														'chars' => $chars));
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$have_flags = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => pnUserGetVar('uid'),
																	'name' => 'have_flags',
																	'module' => 'iw_main_block_flagged',
																	'sv' => $sv));

	if($have_flags != '0'){
		pnModFunc('iw_main', 'user', 'flagged', array('where' => $have_flags,
														'chars' => $chars));

		//Posa la variable d'usuari have_news en blanc per no haver-la de tornar a llegir a la propera reiteraci�
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => pnUserGetVar('uid'),
															'name' => 'have_flags',
															'module' => 'iw_main_block_flagged',
															'sv' => $sv,
															'value' => '0'));
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$flags = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => pnUserGetVar('uid'),
																'name' => 'flagged',
																'module' => 'iw_main_block_flagged',
																'sv' => $sv,
																'nult' => true));

	$pnRender = pnRender::getInstance('iw_main',false);

	$pnRender -> assign('flags', $flags);
	$content = $pnRender -> fetch('iw_main_block_iwflagged.htm');

	AjaxUtil::output(array('content' => $content));
}
