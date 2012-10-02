<?php
/**
 * Update the agenda information in the database
 * @author:   Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda identity and values
 * @return:	true if success and false otherwise
*/
function iw_agendas_adminapi_editAgenda($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	// Get agenda information
	$item = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $daid));
	if ($item == false) {
		return LogUtil::registerError (__('Agenda not found', $dom));
	}
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv)) || !SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)){
		// Security check
		if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
			return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
		}
	}
	// Needed argument
	if (!isset($daid) || !is_numeric($daid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_agendas_def_column'];
	$where = "$c[daid] = $daid";
	if (!DBUTil::updateObject ($items, 'iw_agendas_def', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * Create a new agenda in database
 * @author:   Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda identity and values
 * @return:	true if success and false otherwise
*/
function iw_agendas_adminapi_create($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$nom_agenda = FormUtil::getPassedValue('nom_agenda', isset($args['nom_agenda']) ? $args['nom_agenda'] : null, 'POST');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
	$c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
	$c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
	$c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
	$c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
	$c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
	$c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
	$tc1 = FormUtil::getPassedValue('tc1', isset($args['tc1']) ? $args['tc1'] : null, 'POST');
	$tc2 = FormUtil::getPassedValue('tc2', isset($args['tc2']) ? $args['tc2'] : null, 'POST');
	$tc3 = FormUtil::getPassedValue('tc3', isset($args['tc3']) ? $args['tc3'] : null, 'POST');
	$tc4 = FormUtil::getPassedValue('tc4', isset($args['tc4']) ? $args['tc4'] : null, 'POST');
	$tc5 = FormUtil::getPassedValue('tc5', isset($args['tc5']) ? $args['tc5'] : null, 'POST');
	$tc6 = FormUtil::getPassedValue('tc6', isset($args['tc6']) ? $args['tc6'] : null, 'POST');
	$op2 = FormUtil::getPassedValue('op2', isset($args['op2']) ? $args['op2'] : null, 'POST');
	$op3 = FormUtil::getPassedValue('op3', isset($args['op3']) ? $args['op3'] : null, 'POST');
	$op4 = FormUtil::getPassedValue('op4', isset($args['op4']) ? $args['op4'] : null, 'POST');
	$op5 = FormUtil::getPassedValue('op5', isset($args['op5']) ? $args['op5'] : null, 'POST');
	$op6 = FormUtil::getPassedValue('op6', isset($args['op6']) ? $args['op6'] : null, 'POST');
	$activa = FormUtil::getPassedValue('activa', isset($args['activa']) ? $args['activa'] : null, 'POST');
	$adjunts = FormUtil::getPassedValue('adjunts', isset($args['adjunts']) ? $args['adjunts'] : null, 'POST');
	$protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
	$color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'POST');
	$gCalendarId = FormUtil::getPassedValue('gCalendarId', isset($args['gCalendarId']) ? $args['gCalendarId'] : '', 'POST');
	$gAccessLevel = FormUtil::getPassedValue('gAccessLevel', isset($args['gAccessLevel']) ? $args['gAccessLevel'] : '', 'POST');
	$gColor = FormUtil::getPassedValue('gColor', isset($args['gColor']) ? $args['gColor'] : '', 'POST');
	$resp = FormUtil::getPassedValue('resp', isset($args['resp']) ? $args['resp'] : '', 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv)) || !SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ) || $gCalendarId == ''){
		// Security check
		if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
			return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
		}
	}
	// Needed argument
	if (!isset($nom_agenda)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//optional arguments
	if (!isset($descriu)) {$descriu = '';}
	$item = array('nom_agenda' => $nom_agenda,
					'descriu' => $descriu,
					'c1' => $c1,
					'c2' => $c2,
					'c3' => $c3,
					'c4' => $c4,
					'c5' => $c5,
					'c6' => $c6,
					'tc1' => $tc1,
					'tc2' => $tc2,
					'tc3' => $tc3,
					'tc4' => $tc4,
					'tc5' => $tc5,
					'tc6' => $tc6,
					'op2' => $op2,
					'op3' => $op3,
					'op4' => $op4,
					'op5' => $op5,
					'op6' => $op6,
					'activa' => $activa,
					'adjunts' => $adjunts,
					'protegida' => $protegida,
					'color' => $color,
					'gCalendarId' => $gCalendarId,
					'gAccessLevel' => $gAccessLevel,
					'gColor' => $gColor,
					'resp' => $resp);
	if (!DBUtil::insertObject($item, 'iw_agendas_def', 'daid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $item['daid'];
}

/**
 * delete an agenda in the data base and all the information associated with the agenda
 * @author:   Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	agenda identity
 * @return:	true if success and false otherwise
*/
function iw_agendas_adminapi_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	//Get form information
	$item = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $daid));
	if ($item == false) {
		LogUtil::registerError (__('Agenda not found', $dom));
	}
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv)) || !SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ) || $item['resp'] != '$$'.pnUserGetVar('uid').'$'){
		// Security check
		if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
			return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
		}
	}
	// Needed argument
	if (!isset($daid) || !is_numeric($daid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	if (!DBUtil::deleteObjectByID('iw_agendas_def', $daid, 'daid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_agendas');
	$pnRender -> clear_cache(null, $daid);
	//delete the anotations insert in this agenda
	$pntables = pnDBGetTables();
	$c = $pntables['iw_agendas_column'];
	$where = "$c[daid]=$daid";
	if (!DBUtil::deleteWhere ('iw_agendas', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	//delete the subscriptions to this agenda
	$c = $pntables['iw_agendas_subs_column'];
	$where = "$c[daid]=$daid";
	if (!DBUtil::deleteWhere ('iw_agendas_subs', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	return true;
}
