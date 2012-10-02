<?php
/**
 * get all agendas information
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	form identity and values
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_getAllAgendas($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$gAgendas = FormUtil::getPassedValue('gAgendas', isset($args['gAgendas']) ? $args['gAgendas'] : null, 'POST');
	$onlyShared = FormUtil::getPassedValue('onlyShared', isset($args['onlyShared']) ? $args['onlyShared'] : null, 'POST');
	$gCalendarsIdsArray = FormUtil::getPassedValue('gCalendarsIdsArray', isset($args['gCalendarsIdsArray']) ? $args['gCalendarsIdsArray'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_def_column'];
	$where = ($onlyShared == 1) ? "$c[gCalendarId] = ''" : "";
	if($gAgendas != null){
		$where = "(";
		foreach($gCalendarsIdsArray as $g){
			$where .= "$c[gCalendarId] = '$g' OR ";
		}
		$where = substr($where,0,-3);
		$where .= ") OR (";
		// to avoid where = '' in case $onlyShared is defined
		$where .= "$c[gCalendarId] <> '' AND $c[resp] LIKE '%$".pnUserGetVar('uid')."$%')";
	}
	$orderby = "$c[nom_agenda]";
	$items = DBUtil::selectObjectArray('iw_agendas_def', $where, $orderby, '-1', '-1', 'daid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * get an agenda information
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda identity
 * @return:	And array with the agenda information
*/
function iw_agendas_userapi_getAgenda($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_agendas::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if (!isset($daid) || !is_numeric($daid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = DBUtil::selectObjectByID('iw_agendas_def', $daid, 'daid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if($items === false){
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * get all the notes in the agenda for a specific period
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	events for the month
 * @return:	And array with the agenda notations information for the month
*/
function iw_agendas_userapi_getEvents($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	$month = FormUtil::getPassedValue('month', isset($args['month']) ? $args['month'] : null, 'POST');
	$year = FormUtil::getPassedValue('year', isset($args['year']) ? $args['year'] : null, 'POST');
	$day = FormUtil::getPassedValue('day', isset($args['day']) ? $args['day'] : null, 'POST');
	$inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
	$final = FormUtil::getPassedValue('final', isset($args['final']) ? $args['final'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if($inici == null || $final == null || $inici == '' || $final == ''){
		$inici = mktime(0, 0, 0, $month, 1, $year);
		//Calc the number of days of the month
		$nDays = date("t", $inici);
		$final = mktime(23, 59, 59, $month, $nDays, $year);
	}
	if(isset($day) && is_numeric($day) && $day != 0){
		$inici = mktime(0, 0, 0, $month, $day, $year);
		$final = mktime(23, 59, 59, $month, $day, $year);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$orderby = "$c[data], $c[totdia] desc";
	if($daid == 0){
		// personal agenda
		$uid = (!pnUserLoggedIn()) ? '-1': pnUserGetVar('uid');
		$where = "$c[data] BETWEEN $inici AND $final AND (($c[usuari]=$uid AND $c[daid]=0)";
		// Get the data of all the agendes
		$registres = pnModAPIFunc('iw_agendas', 'user', 'getAllAgendas');
		//Check if the user has access to the agendas. If true insert the agenda id into an array
		$agendas = array();
		foreach($registres as $registre){
			// Check whether the user can access the agenda
			$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $registre['daid'],
																			'grup' => $registre['grup'],
																			'resp' => $registre['resp'],
																			'activa' => $registre['activa']));

			if ($te_acces > 0 && $registre['activa'] == 1){array_push($agendas,$registre['daid']);}
		}
		//get agendas where the user is enroled
		if(pnUserLoggedIn()){
			$subscriptions = pnModAPIFunc('iw_agendas', 'user', 'getUserSubscriptions');
		}else{
			$subscriptions = $agendas;
			$notlogedin =" AND $c[deleted]=0";
		}
		$subsArray = array();
		foreach($subscriptions as $subs){
			$daidValue = (pnUserLoggedIn()) ? $subs['daid'] : $subs;
			array_push($subsArray, $daidValue);
		}
		//Makes an array intersection of the two arrays. User has access and he/she is subscribed
		$agendasArray = array_intersect($subsArray, $agendas);
		//for each subscription include a condition in where string
		foreach($agendasArray as $a){
			$subsString .= " OR ($c[daid]=$a AND $c[completa]=0 AND $c[deletedByUser] NOT LIKE '%$".$uid."$%'".$notlogedin.")";
		}
		$where .= $subsString.")";
	}else{
		//Agenda compartida
		$where = "$c[data] BETWEEN $inici AND $final AND $c[daid]=$daid AND $c[deleted]=0";
	}
	$items = DBUtil::selectObjectArray('iw_agendas', $where, $orderby, '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * get all the agendas where the user is subscribed
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	And array with agendas where the user is subscribed
*/
function iw_agendas_userapi_getUserSubscriptions($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if(!pnUserLoggedIn()){return $items;}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$uid = pnUserGetVar('uid');
	$where = "$c[uid]=$uid AND $c[daid]<>0 AND ($c[donadabaixa]=-1 OR $c[donadabaixa]=-2)";
	$items = DBUtil::selectObjectArray('iw_agendas_subs', $where, '', '-1', '-1', 'said');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if($items === false){
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	//return the items
	return $items;
}

/**
 * set the last visit type to the user in the agenda
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda identity
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_vista($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	$vista = FormUtil::getPassedValue('vista', isset($args['vista']) ? $args['vista'] : -1, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$uid = pnUserGetVar('uid');
	$where = "$c[uid]=$uid AND $c[daid]=$daid";
	$items = DBUtil::selectObjectArray('iw_agendas_subs', $where, '', '-1', '-1', 'said');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	if(count($items) == 0){
		$item = array('daid' => $daid,
						'uid' => $uid,
						'llistat' => $vista);
		if (!DBUtil::insertObject($item, 'iw_agendas_subs', 'said')) {
			return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		}
	}else{
		$item = array('llistat' => $vista);
		$where = "$c[daid]=$daid AND $c[uid]=$uid";
		if (!DBUTil::updateObject ($item, 'iw_agendas_subs', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}	return true;
}

/**
 * delete the notes older than a specific date
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda identity
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_esborraantigues($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	$antigues = FormUtil::getPassedValue('antigues', isset($args['antigues']) ? $args['antigues'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $items['daid']));
	// If the user has no access, show an error message and stop execution
	if($te_acces < 4){
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	$antiguestimestamp = mktime(0, 0, 0, substr($antigues, 3, 2), substr($antigues, 0, 2), substr($antigues, 6, 4));
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	if($daid == 0){
		$uid = pnUserGetVar('uid');
		$where = "$c[data]<=$antiguestimestamp AND $c[daid]=0 AND $c[usuari]=$uid";
	}else{
		$where = "$c[data]<=$antiguestimestamp AND $c[daid]=$daid";
	}
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	foreach($items as $item){
		//get item values
		$note = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $item['aid']));
		if (!DBUtil::deleteObjectByID('iw_agendas', $item['aid'], 'aid')) {
			return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
		}
		if($note['fitxer'] != ""){
			$folder = pnModGetVar('iw_agendas', 'urladjunts');
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$delete = pnModFunc('iw_main', 'user', 'deleteFile', array('sv' => $sv,
												'folder' => $folder,
												'fileName' => $note['fitxer']));
		}
	}
	return true;
}

/**
 * delete the caducied anotations of the agendas
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_esborra_caducades()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$caducadies = pnModGetVar('iw_agendas', 'caducadies');
	$datacaducades = time() - $caducadies * 60 * 60 * 24;
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$where = "$c[protegida]=0 AND $c[data]<=$datacaducades";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	foreach($items as $item){
		//get item values
		$note = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $item['aid']));
		if (!DBUtil::deleteObjectByID('iw_agendas', $item['aid'], 'aid')) {
			return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
		}
		if($note['fitxer'] != ""){
			$folder = pnModGetVar('iw_agendas', 'urladjunts');
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$delete = pnModFunc('iw_main', 'user', 'deleteFile', array('sv' => $sv,
												'folder' => $folder,
												'fileName' => $note['fitxer']));
		}
	}
	return true;
}

/**
 * set new anotations to 0
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	mounth and year visited
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_novesa0($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($mes) || !is_numeric($mes) || !isset($any) || !is_numeric($any)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$inici = mktime(0, 0, 0, $mes, 1, $any);
	$final = mktime(23, 59, 59, $mes, 31, $any);
	$uid = pnUserGetVar('uid');
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$where = "$c[data] BETWEEN $inici AND $final AND $c[nova] LIKE '%$".$uid."$%'";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	foreach($items as $item){
		$new = str_replace('$'.$uid.'$','',$item['nova']);
		$itemUpdated = array('nova' => $new);
		$where = "$c[aid]=".$item['aid'];
		if (!DBUTil::updateObject ($itemUpdated, 'iw_agendas', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}
	return true;
}

/**
 * get user tasks
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	mounth and year visited
 * @return:	An array with all the tasks
*/
function iw_agendas_userapi_getalltasques($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($mes) || !is_numeric($mes) || !isset($any) || !is_numeric($any)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$inici = mktime(0, 0, 0, $mes, 1, $any);
	$final = mktime(23, 59, 59, $mes, 31, $any);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$uid = pnUserGetVar('uid');
	$where = "($c[data] BETWEEN $inici AND $final AND $c[tasca]=1 AND $c[usuari]=$uid) OR ($c[data]<$inici AND $c[completa]=0 AND $c[tasca]=1 AND $c[usuari]=$uid)";
	$orderby = "$c[nom_agenda]";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, $orderby, '-1', '-1', 'daid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * set the avertisement about automatic subscriptions
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	An array with all the tasks
*/
function iw_agendas_userapi_treuavis(){
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$uid = pnUserGetVar('uid');
	$item = array('donadabaixa' => -1);
	$where = "$c[donadabaixa]=-2 AND $c[uid]=$uid";
	if (!DBUTil::updateObject ($item, 'iw_agendas_subs', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * get the number of anotacions in an agenda
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	The agenda identity
 * @return:	The number of anotations
*/
function iw_agendas_userapi_comptanotes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$uid = pnUserGetVar('uid');
	$where = ($daid == 0) ? "$c[usuari]=$uid AND $c[daid]=0" : "$c[daid]=$daid";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return count($items);
}

/**
 * Increase the number of advertisements of that there are too much anotations in the agenda
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	The agenda identity and the avertissements now
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_pujaavis($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$uid = pnUserGetVar('uid');
	$item = array('avisos' => $value);
	$where = "$c[daid]=$daid AND $c[uid]=$uid";
	if (!DBUTil::updateObject ($item, 'iw_agendas_subs', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * get the number of times that the user has been advertised about that there are too much anotations in the agenda
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	The agenda identity
 * @return:	The number of times
*/
function iw_agendas_userapi_avislimits($args){
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$uid = pnUserGetVar('uid');
	$where = "$c[daid]=$daid AND $c[uid]=$uid";
	$items = DBUtil::selectObjectArray('iw_agendas_subs', $where, '', '-1', '-1', 'daid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the value
	return $items[0]['avisos'];
}


/**
 * get the subscription status into an agenda
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	The agenda identity
 * @return:	True if the user is subscribed and false otherwise
*/
function iw_agendas_userapi_iosubs($args){
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($daid) || !is_numeric($daid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $daid));
	if($agenda == false){
		return LogUtil::registerError (__('Event not found', $dom));
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid,
																	'grup' => $agenda['grup'],
																	'resp' => $agenda['resp'],
																	'activa' => $agenda['activa']));
	// If the user has no access, show an error message and stop execution
	if ($te_acces == 0) {
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$uid = pnUserGetVar('uid');
	$where = "$c[daid]=$daid AND $c[uid]=$uid AND ($c[donadabaixa]=-1 OR $c[donadabaixa]=-2)";
	$items = DBUtil::selectObjectArray('iw_agendas_subs', $where, '', '-1', '-1', 'said');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	//retornem el valor adequat
	if(count($items) > 0){return true;}else{return false;}
}

/**
 * get the visualitation type for the user in the agenda
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	The agenda identity
 * @return:	The visual method
*/
function iw_agendas_userapi_getvista($args){
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($daid) || !is_numeric($daid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$uid = pnUserGetVar('uid');
	$where = "$c[daid]=$daid AND $c[uid]=$uid";
	$items = DBUtil::selectObjectArray('iw_agendas_subs', $where, '', '-1', '-1', 'daid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	//retornem el valor adequat
	return $items[$daid]['llistat'];
}

/**
 * edit a note information
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda identity
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_editNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($daid) || !is_numeric($daid) || !isset($aid) || !is_numeric($aid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$anotacio = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $aid));
	if ($anotacio == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid));
	// If the user has no access, show an error message and stop execution
	if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != pnUserGetVar('uid'))) {
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$where = ($rid == null) ? "$c[aid]=$aid" : "$c[rid]=$rid";
	if (!DBUTil::updateObject ($items, 'iw_agendas', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}	return true;
}

/**
 * get the information of a note
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	note identity
 * @return:	Array with the note information
*/
function iw_agendas_userapi_get($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid) || !is_numeric($aid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = DBUtil::selectObjectByID('iw_agendas', $aid, 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	//check if user can acces the note
	if($items['daid'] != 0){
		//get the agenda
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $items['daid']));
		if($agenda == false){
			return LogUtil::registerError (__('Event not found', $dom));
		}
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $items['daid'],
																		'grup' => $agenda['grup'],
																		'resp' => $agenda['resp'],
																		'activa' => $agenda['activa']));
		// If the user has no access, show an error message and stop execution
		if($te_acces == 0){
			return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		}
	}
	// Return the items
	return $items;
}

/**
 * set new anotations to 0
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	mounth and year visited
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_deleteRepesInUser($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($rid) || !is_numeric($rid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$uid = pnUserGetVar('uid');
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$where = "$c[rid] = $rid";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	foreach($items as $item){
		$where = "$c[aid]=$item[aid]";
		$deletedByUser = ($item['deletedByUser'] == '')? '$' : $item['deletedByUser'];
		$deletedByUser .= '$'.$uid.'$';
		$items = array('deletedByUser' => $deletedByUser);
		if (!DBUTil::updateObject ($items, 'iw_agendas', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}
	return true;
}

/**
 * delete a note
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	identity of the note
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid) || !is_numeric($aid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$anotacio = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $aid));
	if ($anotacio == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	if($anotacio['daid'] != 0){
		//get the agenda
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $anotacio['daid']));
		if($agenda == false){
			return LogUtil::registerError (__('Event not found', $dom));
		}
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $anotacio['daid'],
																	'grup' => $agenda['grup'],
																	'resp' => $agenda['resp'],
																	'activa' => $agenda['activa']));
	// If the user has no access, show an error message and stop execution
	if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != pnUserGetVar('uid'))) {
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	if (!DBUtil::deleteObjectByID('iw_agendas', $aid, 'aid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// Let any hooks know that we have deleted an item
	pnModCallHooks('item', 'delete', $args['aid'], array('module' => 'iw_agendas'));
	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_agendas');
	$pnRender->clear_cache(null, $nid);
	return true;
}

/**
 * get users who can access the agenda
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	identity of the agenda
 * @return:	and array with the users identity
*/
function iw_agendas_userapi_gettenenacces($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($daid) || !is_numeric($daid) || $daid == 0) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $daid));
	if($agenda == false){
		return LogUtil::registerError (__('Event not found', $dom));
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid,
																	'grup' => $agenda['grup'],
																	'resp' => $agenda['resp'],
																	'activa' => $agenda['activa']));
	// If the user has no access, show an error message and stop execution
	if($te_acces < 4){
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	//add the aganda's managers
	$managers = explode('$$',substr($agenda['resp'],2,-1));
	foreach($managers as $manager){
		$registres[] = array('uid' => $manager);
	}
	//add the users from the groups
	$groups = explode('$$',substr($agenda['grup'],2,-1));
	foreach($groups as $group){
		//get the groups members
		$groupId = explode('|',$group);
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$members = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
																			'gid' => $groupId[0]));
		foreach($members as $member){
				$registres[] = array('uid' => $member['id']);
		}
	}
	return $registres;
}

/**
 * Create a new item into an agenda
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda information
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_crear($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$hora = FormUtil::getPassedValue('hora', isset($args['hora']) ? $args['hora'] : null, 'POST');
	$minut = FormUtil::getPassedValue('minut', isset($args['minut']) ? $args['minut'] : null, 'POST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	$hora1 = FormUtil::getPassedValue('hora1', isset($args['hora1']) ? $args['hora1'] : null, 'POST');
	$minut1 = FormUtil::getPassedValue('minut1', isset($args['minut1']) ? $args['minut1'] : null, 'POST');
	$mes1 = FormUtil::getPassedValue('mes1', isset($args['mes1']) ? $args['mes1'] : null, 'POST');
	$dia1 = FormUtil::getPassedValue('dia1', isset($args['dia1']) ? $args['dia1'] : null, 'POST');
	$any1 = FormUtil::getPassedValue('any1', isset($args['any1']) ? $args['any1'] : null, 'POST');
	$totdia = FormUtil::getPassedValue('totdia', isset($args['totdia']) ? $args['totdia'] : null, 'POST');
	$tasca = FormUtil::getPassedValue('tasca', isset($args['tasca']) ? $args['tasca'] : null, 'POST');
	$nivell = FormUtil::getPassedValue('nivell', isset($args['nivell']) ? $args['nivell'] : null, 'POST');
	$c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
	$c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
	$c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
	$c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
	$c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
	$c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');
	$nova = FormUtil::getPassedValue('nova', isset($args['nova']) ? $args['nova'] : null, 'POST');
	$oculta = FormUtil::getPassedValue('oculta', isset($args['oculta']) ? $args['oculta'] : null, 'POST');
    $fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
	$origen = FormUtil::getPassedValue('origen', isset($args['origen']) ? $args['origen'] : null, 'POST');
	$gCalendarEventId = FormUtil::getPassedValue('gCalendarEventId', isset($args['gCalendarEventId']) ? $args['gCalendarEventId'] : null, 'POST');
	$protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($c1)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid));
	// If the user has no access, show an error message and stop execution
	if($te_acces < 2){
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	if (!isset($tasca)){$tasca = 0;}
	if (!isset($nivell)){$nivell = 0;}
	if (!isset($rid)){$rid = 0;}
	//generem la data a partir de les dades rebudes
	if($totdia){
		$hora = 23;
		$minut = 59;
	}
	$data = mktime($hora, $minut, 0, $mes, $dia, $any);
	$data1 = mktime($hora1, $minut1, 0, $mes1, $dia1, $any1);
	$items = array('data' => $data,
					'data1' => $data1,
					'totdia' => $totdia,
					'usuari' => pnUserGetVar('uid'),
					'tasca' => $tasca,
					'nivell' => $nivell,
					'c1' => $c1,
					'c2' => $c2,
					'c3' => $c3,
					'c4' => $c4,
					'c5' => $c5,
					'c6' => $c6,
					'rid' => $rid,
					'daid' => $daid,
					'dataanota' => time(),
					'nova' => $nova,
					'completa' => $oculta,
					'fitxer' => $fitxer,
					'origen' => $origen,
					'gCalendarEventId' => $gCalendarEventId,
					'protegida' => $protegida);
	if (!DBUtil::insertObject($items, 'iw_agendas', 'aid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Let any hooks know that we have created a new item.
	pnModCallHooks('item', 'create', $items['aid'], array('module' => 'iw_agendas'));
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$item = array('rid' => $items['rid']);
	$where = "$c[aid]=".$items['rid'];
	if (!DBUTil::updateObject ($item, 'iw_agendas', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $items['aid'];
}

/**
 * Copy a note to another agenda
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda information
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_meva($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
	$adaid = FormUtil::getPassedValue('adaid', isset($args['adaid']) ? $args['adaid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$note = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $aid));
	if ($note == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	if($note['daid'] != 0){
		//get the agenda
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $note['daid']));
		if($agenda == false){
			return LogUtil::registerError (__('Event not found', $dom));
		}
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $note['daid'],
																		'grup' => $agenda['grup'],
																		'resp' => $agenda['resp'],
																		'activa' => $agenda['activa']));
		// If the user has no access, show an error message and stop execution
		if ($te_acces < 1) {
			return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		}
	}
	//get all users information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv,
																		'info' => 'ncc'));
	//preparem el contingut de la icona amb informaciï¿œ addicional
	$j = 2;
	$c2x = '';
	$ha_passat = false;
	for($j = 2; $j < 7; $j++){
		$c = 'c'.$j;
		$tc = 'tc'.$j;
		if($agenda[$c] != "" && ($note[$c] != '' || $agenda[$tc] == 3 || $agenda[$tc]== 4)){
			$c2x .= '<fieldset><legend> ';
			$c2x .= $agenda[$c];
			$c2x .= ' </legend>';
			$c2x .= ($agenda[$tc] != 3 && $agenda[$tc] != 4 && $note[$c] == "") ? "---" : $note[$c];
			if($agenda[$tc] == 3){$c2x .= $usersInfo[$note['usuari']];}
			if($agenda[$tc] == 4){$c2x .= $usersInfo[$note['usuari']].__(' on ', $dom).date('d/m/Y',$note['dataanota']).__(' at ', $dom).date('H:i',$note['dataanota']);}
			$c2x .= '</fieldset>';
		}
	}
	foreach($adaid as $daid){
		//if it is a shared agenda check if user can write in it
		if($daid > 0){
			// Check whether the user can access the agenda for this action
			$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid));
			if($te_acces < 2){
				return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			}	

		}
		$subscrits = pnModAPIFunc('iw_agendas', 'user', 'getsubscrits', array('daid' => $daid));
		$subscritString = '$';
		foreach($subscrits as $subscrit){
			$subscritString .= '$'.$subscrit['uid'].'$';
		}
		$items = array('data' => $note['data'],
						'totdia' => $note['totdia'],
						'usuari' => pnUserGetVar('uid'),
						'tasca' => $note['tasca'],
						'nivell' => $note['nivell'],
						'c1' => $note['c1'],
						'c2' => $c2x,
						'daid' => $daid,
						'dataanota' => time(),
						'nova' => $subscritString,
						'completa' => $note['oculta'],
						'fitxer' => $note['fitxer'],
						'protegida' => $note['protegida'],
						'origenId' => $note['daid']);
		if(!DBUtil::insertObject($items, 'iw_agendas', 'aid')){
			return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		}
		// Let any hooks know that we have created a new item.
		pnModCallHooks('item', 'create', $items['aid'], array('module' => 'iw_agendas'));	
	}
	// Return true if success
	return true;
}

/**
 * Delete the repeated notes
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	note to delete and its repetitions
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_deleterepes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid) || !isset($rid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$anotacio = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $aid));
	if ($anotacio == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	if($anotacio['daid'] > 0){
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid));
		// If the user has no access, show an error message and stop execution
		if($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != pnUserGetVar('uid'))){
			return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		}
	}else{
		if($anotacio['usuari'] != pnUserGetVar('uid')){
			return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		}
	}
	if (!DBUtil::deleteObjectByID('iw_agendas', $rid, 'rid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	//Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
	return true;
}

/**
 * get the users subscribed to an agenda
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	identity to the agenda
 * @return:	An array with the users identities
*/
function iw_agendas_userapi_getsubscrits($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$quins = FormUtil::getPassedValue('quins', isset($args['quins']) ? $args['quins'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$quins =  (!isset($quins) || $quins == '-1') ? "$c[donadabaixa]=-1 OR $c[donadabaixa]=-2" : "$c[donadabaixa]=".$quins;
	$where = "$c[daid]=$daid AND (".$quins.")";
	$items = DBUtil::selectObjectArray('iw_agendas_subs', $where, '', '-1', '-1', 'said');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Update multiple notes
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	the note information
 * @return:	true if success and false otherwise
*/
function iw_agendas_userapi_modificamulti($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$hora = FormUtil::getPassedValue('hora', isset($args['hora']) ? $args['hora'] : null, 'POST');
	$minut = FormUtil::getPassedValue('minut', isset($args['minut']) ? $args['minut'] : null, 'POST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	$totdia = FormUtil::getPassedValue('totdia', isset($args['totdia']) ? $args['totdia'] : null, 'POST');
	$c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
	$c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
	$c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
	$c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
	$c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
	$c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
	$protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
    $fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid) || !isset($c1)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$anotacio = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $aid));
	if ($anotacio == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	if($anotacio['daid'] > 0){
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid));
		// If the user has no access, show an error message and stop execution
		if($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != pnUserGetVar('uid'))){
			return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		}
	}else{
		if($anotacio['usuari'] != pnUserGetVar('uid')){
			return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		}
	}
	//generem la data a partir de les dades rebudes
	if($totdia){
		$hora = 0;
		$minut = 0;
	}
	$data = mktime($hora,$minut,0,$mes,$dia,$any);
	//calculem l'increment de l'hora per incrementar-ho a tots els registres	
	$minutsmes = $minut - date('i',$anotacio['data']);
	$horesmes = $hora - date('H',$anotacio['data']);
	$segonsmes = $horesmes*60*60 + $minutsmes*60;
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$where = "$c[rid]=".$anotacio['rid'];
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	foreach($items as $item){
		$item1 = array('c1' => $c1,
						'c2' => $c2,
						'c3' => $c3,
						'c4' => $c4,
						'c5' => $c5,
						'c6' => $c6,
						'data' => $item['data'] + $segonsmes,
						'usuari' => pnUserGetVar('uid'),
						'dataanota' => time(),
						'totdia' => $totdia,
						'vcalendar' => 0,
						'protegida' => $protegida,
						'fitxer' => $fitxer);
		$where = "$c[aid]=".$item['aid'];
		if(!DBUTil::updateObject ($item1, 'iw_agendas', $where)){
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}
	return true;
}

/**
 * Count the number of notes multiple
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	the note identity
 * @return:	The number of repeated notes
*/
function iw_agendas_userapi_comptarepes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
    $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$anotacio = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $aid));
	if ($anotacio == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$where = "$c[rid]=".$anotacio['rid']." AND ".$anotacio['rid'].">0";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	//Retornem el nombre de repeticoins que hi ha
	//Restem u perquï¿œ nomï¿œs volem les repeticions i no la original
	return count($items) - 1;
}

/**
 * Set an user as unsubscribed to an agenda
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	the agenda  identity
 * @return:	True if success and false otherwise
*/
function iw_agendas_userapi_subsbaixa($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($daid) || $daid == 0) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$agenda = pnModAPIFunc('iw_agendas', 'user','getAgenda',array('daid' => $daid));
	if ($agenda == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid));
	// If the user has no access, show an error message and stop execution
	if($te_acces <= 0){
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$item = array('donadabaixa' => 1);
	$where = "$c[daid]=$daid AND $c[uid]=".pnUserGetVar('uid');
	if(!DBUTil::updateObject ($item, 'iw_agendas_subs', $where)){
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/**
 * Set an user as subscribed into an agenda
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	the agenda  identity
 * @return:	True if success and false otherwise
*/
function iw_agendas_userapi_subsalta($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($daid) || $daid == 0) {
		return;
		//return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$agenda = pnModAPIFunc('iw_agendas', 'user','getAgenda',array('daid' => $daid));
	if ($agenda == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid));
	// If the user has no access, show an error message and stop execution
	if($te_acces <= 0){
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	$uid = pnUserGetVar('uid');
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	$where = "$c[uid]=$uid AND $c[daid]=$daid";
	$item = DBUtil::selectObjectArray('iw_agendas_subs', $where, '', '-1', '-1', 'said');
	if(count($item) < 1){
		$items = array('daid' => $daid,
						'uid' => $uid,
						'donadabaixa' => '-1');
		if(!DBUtil::insertObject($items, 'iw_agendas_subs', 'said')){
			$error = true;
		}
	}else{
		$items = array('donadabaixa' => '-1');
		if(!DBUTil::updateObject ($items, 'iw_agendas_subs', $where)){
			$error = true;
		}
	}
	if ($error) {
		return LogUtil::registerError (__('An error has occurred while updating the subscription to the agenda', $dom));
	}
	return true;
}

/**
 * Subscribe multiple users into an agenda
 * @author:  	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	the agenda identity and the users array to subscribe
 * @return:	True if success and false otherwise
*/
function iw_agendas_userapi_subsAltaMulti($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$users = FormUtil::getPassedValue('users', isset($args['users']) ? $args['users'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($daid) || $daid == 0 || !isset($users)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$agenda = pnModAPIFunc('iw_agendas', 'user','getAgenda',array('daid' => $daid));
	if ($agenda == false) {
		return LogUtil::registerError (__('Event not found', $dom));
	}
	// Check whether the user can access the agenda for this action
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces', array('daid' => $daid));
	// If the user has no access, show an error message and stop execution
	if($te_acces != 4){
		return LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_subs_column'];
	foreach($users as $user){
		$where = "$c[uid]=$user AND $c[daid]=$daid";
		$item = DBUtil::selectObjectArray('iw_agendas_subs', $where, '', '-1', '-1', 'said');
		if(count($item) < 1){
			$items = array('daid' => $daid,
							'uid' => $user,
							'donadabaixa' => '-2');
			if(!DBUtil::insertObject($items, 'iw_agendas_subs', 'said')){
				$error = true;
			}
		}else{
			$items = array('donadabaixa' => '-2');
			if(!DBUTil::updateObject ($items, 'iw_agendas_subs', $where)){
				$error = true;
			}
		}
		if ($error) {
			return LogUtil::registerError (__('An error has occurred while updating the subscription to the agenda', $dom));
		}
	}
	return true;
}

/**
 * get the number of notes that needs an attached file
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	the file name
 * @return:	the number of notes that needs the attached file
*/
function iw_agendas_userapi_n_fitxers($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$where = "$c[fitxer]='$fitxer'";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	return count($items);
}

/**
 * get the agendas where the user has been subscribed
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	And array with the agendas where the user has been subscribed
*/
function iw_agendas_userapi_avissubscripcio()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$uid = pnUserGetVar('uid');
	$myJoin = array();
	$myJoin[] = array('join_table' => 'iw_agendas_subs',
						'join_field' => array('uid'),
						'object_field_name' => array('uid'),
						'compare_field_table' => 'daid',
						'compare_field_join' => 'daid');
	$myJoin[] = array('join_table' => 'iw_agendas_def',
						'join_field' => array(),
						'object_field_name' => array(),
						'compare_field_table' => 'daid',
						'compare_field_join' => 'daid');
	$pntables = pnDBGetTables();
	$ccolumn   = $pntables['iw_agendas_subs_column'];
	$ocolumn   = $pntables['iw_agendas_def_column'];
	$where = "b.$ocolumn[daid] = a.$ccolumn[daid] AND $ccolumn[donadabaixa] = '-2' AND $ccolumn[uid] = $uid";
	$items = DBUtil::selectExpandedObjectArray('iw_agendas_def', $myJoin, $where, '');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	return $items;
}

/**
 * get the number of new note for an user
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	The number of not seen notes
*/
function iw_agendas_userapi_new($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : pnUserGetVar('uid'), 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
			return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
		}
	}else{
		$requestByCron = true;
	}
	if(!pnUserLoggedIn() && !$requestByCron){
		return;
	}else{
		if($uid != pnUserGetVar('uid') && !$requestByCron){
			return $nombrevistes;
		}
	}
	$pntables = pnDBGetTables();
	$c = $pntables['iw_agendas_column'];
	$where = "$c[nova] like '%$".$uid."$%' AND $c[deleted] = 0";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', 'aid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	return count($items);
}

/**
 * get an agenda note that have google identity
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	note Google identity
 * @return:	And array with the note information
*/
function iw_agendas_userapi_getGoogleNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$gCalendarEventId = FormUtil::getPassedValue('gCalendarEventId', isset($args['gCalendarEventId']) ? $args['gCalendarEventId'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_agendas::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if ($gCalendarEventId == null) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = DBUtil::selectObjectByID('iw_agendas', $gCalendarEventId, 'gCalendarEventId');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if($items === false){
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * get all Google notes
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	future for only future notes
 * @return:	And array with the notes information
*/
function iw_agendas_userapi_getAllGCalendarNotes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$beginDate = FormUtil::getPassedValue('beginDate', isset($args['beginDate']) ? $args['beginDate'] : null, 'POST');
	$endDate = FormUtil::getPassedValue('endDate', isset($args['endDate']) ? $args['endDate'] : null, 'POST');
	$gIds = FormUtil::getPassedValue('gIds', isset($args['gIds']) ? $args['gIds'] : null, 'POST');
	$notInGCalendar = FormUtil::getPassedValue('notInGCalendar', isset($args['notInGCalendar']) ? $args['notInGCalendar'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_column'];
	$where = "(";
	if(!empty($gIds)){
		foreach($gIds as $g){
			$where .= "$c[daid] = " . $g[daid] . " OR ";
		}
		$where = substr($where,0,-3);
		$where .= ") AND (";
	}
	$simbol = ($notInGCalendar == null) ? '<>' : '=';
	$key = ($notInGCalendar == null) ? 'gCalendarEventId' : 'aid';
	$time = time();
	$where .= "$c[gCalendarEventId] ".$simbol." '' AND $c[data] BETWEEN $beginDate AND $endDate)";
	$items = DBUtil::selectObjectArray('iw_agendas', $where, '', '-1', '-1', $key);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * get user Google Default Calendar
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	future for only future notes
 * @return:	And array with the calendar information
*/
function iw_agendas_userapi_getGCalendarUserDefault()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_def_column'];
	$uid = pnUserGetVar('uid');
	//get Google username
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$gUserName = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
																	'name' => 'gUserName',
																	'module' => 'iw_agendas',
																	'sv' => $sv));	
	$gUserName = str_replace('@','%40',$gUserName);
	$where = "$c[gCalendarId] LIKE '%/".$gUserName."%' AND $c[resp] LIKE '%$".$uid."$%'";
	$items = DBUtil::selectObjectArray('iw_agendas_def', $where, '', '-1', '-1', '');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items[0];
}