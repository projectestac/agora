
<?php
/**
 * Delete a note from an agenda
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	true if success
*/
function iw_agendas_ajax_deleteNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$aid = FormUtil::getPassedValue('aid', -1, 'GET');
	if ($aid == -1) {
		AjaxUtil::error('no note id');
	}
	$daid = FormUtil::getPassedValue('daid', -1, 'GET');
	if ($daid == -1) {
		AjaxUtil::error('not agenda id');
	}
	$deleted = pnModFunc('iw_agendas', 'user', 'deleteNote',
						  array('aid' => $aid,
								'daid' => $daid));
	if(!is_numeric($deleted)){
		AjaxUtil::error($deleted);
	}
	AjaxUtil::output(array('aid' => $deleted));
}

/**
 * Protect a note agains autotical deletion
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note and the id of the agenda
 * @return:	identity of the note and new state
*/
function iw_agendas_ajax_protectNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$aid = FormUtil::getPassedValue('aid', -1, 'GET');
	if ($aid == -1) {
		AjaxUtil::error('no note id');
	}
	$daid = FormUtil::getPassedValue('daid', -1, 'GET');
	if ($daid == -1) {
		AjaxUtil::error('not agenda id');
	}
	//get the note
	$note = pnModAPIFunc('iw_agendas', 'user', 'get',
						  array('aid' => $aid));
	if ($note == false) {
		AjaxUtil::error(__('Event not found', $dom));
	}
	if($note['daid'] != 0){
		//Estem entrant a una agenda multiusuari
		//Carreguem les dades de l'agenda
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								array('daid' => $note['daid']));
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $agenda['daid'],
									 'grup' => $agenda['grup'],
									 'resp' => $agenda['resp'],
									 'activa' => $agenda['activa']));
	}
	if (strpos($agenda['gAccessLevel'], '$owne|' . pnUserGetVar('uid') . '$') === false &&
		$agenda['gAccessLevel'] != '') {
		AjaxUtil::error(__('You are not allowed to administrate the agendas', $dom));
	} else {
		//Check if user can access the agenda
		if ($daid != 0) {
			// If the user has no access, show an error message and stop execution
			if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != pnUserGetVar('uid'))) {
				AjaxUtil::error(__('You are not allowed to administrate the agendas', $dom));
			}
		} else {
			//Comprovem si l'usuari estÃ  protegint realment la seva a notaciÃ³
			if ($note['usuari'] != pnUserGetVar('uid')) {
				AjaxUtil::error(__('You are not allowed to administrate the agendas', $dom));
			}
		}
	}
	$protegida = ($note['protegida'] == 1) ? 0 : 1;
	$items = array('protegida' => $protegida);
	// Edit note and set it as protected
	$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
						 array('aid' => $aid,
							   'daid' => $daid,
							   'items' => $items));
	if (!$lid) {
		AjaxUtil::error(_AGENDESACTIONERROR);
	}
	$alt = ($protegida == 1) ? __('Delete protection against automatic deletion for this event', $dom) : __('Protected? ', $dom);
	AjaxUtil::output(array('aid' => $aid,
						   'protected' => $protegida,
						   'alt' => $alt));
}

/**
 * Change the state of a note to complete or uncomplete
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note and the id of the agenda
 * @return:	identity of the note and new state
*/
function iw_agendas_ajax_completeNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$aid = FormUtil::getPassedValue('aid', -1, 'GET');
	if ($aid == -1) {
		LogUtil::registerError('no note id');
		AjaxUtil::output();
	}
	$daid = FormUtil::getPassedValue('daid', -1, 'GET');
	if ($daid == -1) {
		LogUtil::registerError('not agenda id');
		AjaxUtil::output();
	}
	//get the note
	$note = pnModAPIFunc('iw_agendas', 'user', 'get',
						  array('aid' => $aid));
	if ($note == false) {
		LogUtil::registerError(__('Event not found', $dom));
		AjaxUtil::output();
	}
	// Get the color configuration and assign them to the pnRender object
	$colors = explode('|', pnModGetVar('iw_agendas', 'colors'));
	//Comprovem que l'usuari pugui accedir a l'agenda
	if ($daid != 0) {
		//Estem entrant a una agenda multiusuari
		//Carreguem les dades de l'agenda
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								array('daid' => $daid));
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $daid,
									 'grup' => $agenda['grup'],
									 'resp' => $agenda['resp'],
									 'activa' => $agenda['activa']));
		// If the user has no access, show an error message and stop execution
		if ($te_acces < 3 || ($te_access == 3 && $note['usuari'] != pnUserGetVar('uid'))) {
			LogUtil::registerError(__('You are not allowed to administrate the agendas', $dom));
			AjaxUtil::output();
		}
		//$oculta = $note['completa'];
	}
	if ($note['daid'] == $daid) {
		$completa = ($note['completa'] == 1) ? 0 : 1;
		$items = array('completa' => $completa);
		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
							 array('aid' => $aid,
								   'daid' => $daid,
								   'items' => $items));
		if (!$lid) {
			LogUtil::registerError(_AGENDESACTIONERROR);
			AjaxUtil::output();
		}
  	} else {
		$uid = pnUserGetVar('uid');
		$completedByUser = ($note['completedByUser'] == '')? '$' : $note['completedByUser'];
		if(strpos($completedByUser, '$'.$uid.'$') !== false){
			$completedByUser = str_replace('$'.$uid.'$','',$completedByUser);
			$completa = 0;
		} else {
			$completedByUser .= '$'.$uid.'$';
			$completa = 1;
		}
		$items = array('completedByUser' => $completedByUser);
		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
							 array('aid' => $aid,
								   'daid' => $daid,
								   'items' => $items));
		if (!$lid) {
			//Success
			//LogUtil::registerStatus (__('Protection status updated', $dom));
			LogUtil::registerError(_AGENDESACTIONERROR);
			AjaxUtil::output();
		}
	}
	if ($completa == 1) {
		$alt = ($daid != 0) ? __('Show', $dom) : __('Mark as not completed', $dom);
		$bgcolor = $colors[14];
	} else {
		$alt = ($daid != 0) ? __('Hide', $dom) : __('Mark as completed', $dom);
		$bgcolor = $colors[13];
	}
	AjaxUtil::output(array('aid' => $aid,
						   'completed' => $completa,
						   'daid' => $daid,
						   'alt' => $alt,
						   'bgcolor' => '#' . $bgcolor));
}

/**
 * Change the characteristics of a agenda definition
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the agenda and the value to change
 * @return:	the new value in database
*/
function iw_agendas_ajax_modifyAgenda($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$daid = FormUtil::getPassedValue('daid', -1, 'GET');
	if ($daid == -1) {
		LogUtil::registerError('no agenda id');
		AjaxUtil::output();
	}
	$char = FormUtil::getPassedValue('char', -1, 'GET');
	if ($char == -1) {
		LogUtil::registerError('no char defined');
		AjaxUtil::output();
	}
	//Get agenda information
	$item = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
						  array('daid' => $daid));
	if ($item == false) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('The agenda was not found', $dom)));
	}
	$value = ($item[$char]) ? 0 : 1;
	//change value in database
	$items = array($char => $value);
	if(!pnModApiFunc('iw_agendas', 'admin', 'editAgenda',
					  array('daid' => $daid,
							'items' => $items))){
		LogUtil::registerError('Error');
		AjaxUtil::output();
	}
	AjaxUtil::output(array('daid' => $daid));
}

/**
 * Change the characteristics of a agenda definition
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the agenda and the value to change
 * @return:	the field row new value in database
*/
function iw_agendas_ajax_changeContent($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$daid = FormUtil::getPassedValue('daid', -1, 'GET');
	if ($daid == -1) {
		LogUtil::registerError('no agenda id');
		AjaxUtil::output();
	}
	$item = pnModFunc('iw_agendas', 'admin', 'getCharsContent',
					   array('daid' => $daid));
	$pnRender = pnRender::getInstance('iw_agendas', false);
	$pnRender->assign('agenda', $item);
	$content = $pnRender->fetch('iw_agendas_admin_mainChars.htm');
	AjaxUtil::output(array('content' => $content,
						   'daid' => $daid));
}

/**
 * Change the users in select list
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note
 * @return:	Redirect to the user main page
*/
function iw_agendas_ajax_chgUsers($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$gid = FormUtil::getPassedValue('gid', -1, 'GET');
	if ($gid == -1) {
		LogUtil::registerError('no group id');
		AjaxUtil::output();
	}
   	// get group members
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupMembers = pnModFunc('iw_main', 'user', 'getMembersGroup',
							   array('sv' => $sv,
									 'gid' => $gid));
	asort($groupMembers);
	if (empty($groupMembers)) {
        LogUtil::registerError('unable to get group members or group is empty for gid=' . DataUtil::formatForDisplay($gid));
	}
	$pnRender = pnRender::getInstance('iw_agendas', false);
	$pnRender->assign ('groupMembers',$groupMembers);
	$pnRender->assign ('action','chgUsers');
	$content = $pnRender->fetch('iw_agendas_admin_ajax.htm');
	AjaxUtil::output(array('content' => $content));
}

/**
 * Change the color for zn agenda definition
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the agenda and the color value
 * @return:	the new value in database
*/
function iw_agendas_ajax_modifyColor($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$daid = FormUtil::getPassedValue('daid', -1, 'GET');
	if ($daid == -1) {
		LogUtil::registerError('no agenda id');
		AjaxUtil::output();
	}
	$color = FormUtil::getPassedValue('color', -1, 'GET');
	if ($color == -1) {
		LogUtil::registerError('no color defined');
		AjaxUtil::output();
	}
	//Get agenda information
	$item = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
						  array('daid' => $daid));
	if ($item == false) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('The agenda was not found', $dom)));
	}
	//change value in database
	$items = array('color' => $color);
	if(!pnModApiFunc('iw_agendas', 'admin', 'editAgenda',
					  array('daid' => $daid,
							'items' => $items))){
		LogUtil::registerError('Error');
		AjaxUtil::output();
	}
	AjaxUtil::output();
}

/**
 * Change the month information in calendar
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   month, year and agenda identity
 * @return:	the new month information
*/
function iw_agendas_ajax_changeMonth($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$daid = FormUtil::getPassedValue('daid', -1, 'GET');
	if ($daid == -1) {
		LogUtil::registerError('no agenda id');
		AjaxUtil::output();
	}
	$mes = FormUtil::getPassedValue('mes', -1, 'GET');
	if ($mes == -1) {
		LogUtil::registerError('no month defined');
		AjaxUtil::output();
	}
	$any = FormUtil::getPassedValue('any', -1, 'GET');
	if ($any == -1) {
		LogUtil::registerError('no year defined');
		AjaxUtil::output();
	}
	$content = pnModFunc('iw_agendas', 'user', 'main',
						  array('mes' => $mes,
								'any' => $any,
								'daid' => $daid));
	AjaxUtil::output(array('content' => $content));
}

/**
 * Subscribe an user to an agenda
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   month, year and agenda identity
 * @return:	the new month information
*/
function iw_agendas_ajax_subs($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_READ)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$daidSubs = FormUtil::getPassedValue('daidSubs', -1, 'GET');
	if ($daidSubs == -1) {
		LogUtil::registerError('no agenda id');
	}
	$mes = FormUtil::getPassedValue('mes', -1, 'GET');
	if ($mes == -1) {
		LogUtil::registerError('no month defined');
	}
	$any = FormUtil::getPassedValue('any', -1, 'GET');
	if ($any == -1) {
		LogUtil::registerError('no year defined');
	}
	$subs = pnModFunc('iw_agendas', 'user', 'subs',
					   array('agenda' => $daidSubs));
	if(!$subs){
		LogUtil::registerError('error subscribing agenda');
	}
	$content = pnModFunc('iw_agendas', 'user', 'main',
						  array('mes' => $mes,
								'any' => $any,
								'daid' => 0));
	AjaxUtil::output(array('content' => $content));
}

/**
 * Change the content of the calendar block
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   the month and year to show
 * @return:	the calendar block content
*/
function iw_agendas_ajax_calendarBlockMonth($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!pnSecAuthAction(0, "iw_agendas:calendarblock:", $blockinfo['title']."::", ACCESS_READ)) { 
		AjaxUtil::error(DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom)));
	}
	$month = FormUtil::getPassedValue('month', -1, 'GET');
	if ($month == -1) {
		LogUtil::registerError('no month defined');
	}
	$year = FormUtil::getPassedValue('year', -1, 'GET');
	if ($year == -1) {
		LogUtil::registerError('no year defined');
	}
	$content = pnModFunc('iw_agendas', 'user', 'getCalendarContent',
						  array('mes' => $month,
								'any' => $year));
	AjaxUtil::output(array('content' => $content));
}