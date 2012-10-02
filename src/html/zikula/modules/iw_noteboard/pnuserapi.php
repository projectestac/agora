<?php
/**
 * Gets all the notes created in the noteboard
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	$tema: it is used for filter the notes of a topyc
 *			$nid: if only a note is showed
 * @return:	And array with the items information
*/
function iw_noteboard_userapi_getall($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	$tema = FormUtil::getPassedValue('tema', isset($args['tema']) ? $args['tema'] : null, 'POST');
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
	$marked = FormUtil::getPassedValue('marked', isset($args['marked']) ? $args['marked'] : null, 'POST');
	$public = FormUtil::getPassedValue('public', isset($args['public']) ? $args['public'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if (!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))) {
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	if (!isset($nid)) {
		$time = time();
		if ($tema > 0) {
			$where = "$c[caduca] > $time AND $c[tid]=$tema";
		} elseif ($tema == '-1') {
			$where = "$c[caduca] > $time AND $c[tid]=0";
		} else {
			$where = "$c[caduca] > $time";
		}
		$orderby = "$c[edited] desc, $c[data] desc, $c[nid] desc";
	} else {
		$registre = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));
		if ($registre == false) {
			LogUtil::registerError (__('The note has not been found', $dom));
			return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));			}
		$where = "$c[nid]=$nid";
		$orderby = '';
	}
	if (isset($marked) && $marked == 1) {
		$where .= " AND $c[marca] like '%$".pnUserGetVar('uid')."$%'";
	}
	if (isset($public) && $public == 1) {
		$where .= " AND $c[public] = 1";
	}
	if (pnModGetVar('iw_noteboard','multiLanguage') == 1) {
		$where .= " AND ($c[lang]='".pnusergetlang()."' OR $c[lang] = '')";
	}
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_noteboard', $where, $orderby, '-1', '-1', 'nid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Gets all the topics defined in the noteboard
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	And array with the items information
*/
function iw_noteboard_userapi_getalltemes()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_topics_column'];
	$orderby = "$c[nomtema]";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_noteboard_topics', '', $orderby, '-1', '-1', 'tid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Create a new note into database
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	array with the note information
 * @return:	identity of the new record created or false if error
*/
function iw_noteboard_userapi_crear($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	extract($args);
	// Needed argument
	if (!isset($noticia)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Optional argument
	if (!isset($titular)) {
		$titular = '';
	}
	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos',
                                    array('uid' => pnUserGetVar('uid')));
	if (empty($permissions) ||
		$permissions['nivell'] < 3) {
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
	$informa = ($sharedFrom == '') ? pnUserGetVar('uid') : 0;
	$item = array('noticia' => $noticia,
					'data' => time(),
					'edited' => time(),
					'caduca' => $caduca,
					'titular' => $titular,
					'titulin' => $titulin,
					'titulout' => $titulout,
					'mes_info' => $mes_info,
					'text' => $text,
					'fitxer' => $fitxer,
					'textfitxer' => $textfitxer,
					'destinataris' => $destinataris,
					'admet_comentaris' => $admet_comentaris,
					'tid' => $tid,
					'informa' =>  $informa,
					'verifica' => $verifica,
					'no_mostrar' => '$',
					'marca' => '$',
					'ncid' => $ncid,
					'lang' => $language,
					'public' => $public,
					'literalGroups' => $literalGroups,
					'sharedFrom' => $sharedFrom,
					'sharedId' => $sharedId);
	if (!DBUtil::insertObject($item, 'iw_noteboard', 'nid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Let any hooks know that we have created a new item.
	pnModCallHooks('item', 'create', $item['nid'],
                    array('module' => 'iw_noteboard'));
	// Return the id of the newly created item to the calling process
	return $item['nid'];
}

/**
 * Gets the informacion of a note
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note
 * @return:	An array with the note information
*/
function iw_noteboard_userapi_get($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if (!isset($nid) || !is_numeric($nid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = DBUtil::selectObjectByID('iw_noteboard', $nid, 'nid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Delete a note from the database
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note
 * @return:	true if success and false if fails
*/
function iw_noteboard_userapi_delete($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Argument check 
	if (!isset($nid) || !is_numeric($nid)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Get the item
	$item = pnModAPIFunc('iw_noteboard', 'user', 'get',
                            array('nid' => $nid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}
	// check that user really can delete this the note
	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos',
                                    array('uid' => pnUserGetVar('uid')));
	if ($permissions['nivell'] < 6) {
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
	if ($item['informa'] != pnUserGetVar('uid') &&
		$permissions['nivell'] < 7) {
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
	if (!DBUtil::deleteObjectByID('iw_noteboard', $nid, 'nid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// Let any hooks know that we have deleted an item
	pnModCallHooks('item', 'delete', $args['nid'],
                    array('module' => 'iw_noteboard'));
	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_noteboard');
	$pnRender->clear_cache(null, $nid);
	return true;
}

/**
 * Update a note from the database
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note
 *			saved in case the note was expired
 * @return:	true if success and false if fails
*/
function iw_noteboard_userapi_update($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	extract($args);
	// Needed argument
	if (!isset($noticia) || !isset($nid) || !is_numeric($nid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Get the item
	$item = pnModAPIFunc('iw_noteboard', 'user', 'get',
                            array('nid' => $nid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}
	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos',
                                    array('uid' => pnUserGetVar('uid')));
	if (!$permissions['potverificar']){
		if (empty($permissions) ||
				$permissions['nivell'] < 5 ||
				($permissions['nivell'] < 7 &&
				$item['informa'] != pnUserGetVar('uid'))) {
			LogUtil::registerError (__('You are not allowed to do this action', $dom));
			return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
		}
	}
	$item = array('noticia' => $noticia,
					'caduca' => $caduca,
					'titular' => $titular,
					'titulin' => $titulin,
					'titulout' => $titulout,
					'mes_info' => $mes_info,
					'text' => $text,
					'fitxer' => $fitxer,
					'textfitxer' => $textfitxer,
					'destinataris' => $destinataris,
					'edited' => time(),
					'edited_by' => pnUserGetVar('uid'),
					'admet_comentaris' => $admet_comentaris,
					'tid' => $tid,
					'verifica' => $verifica,
					'lang' => $language,
					'public' => $public,
					'literalGroups' => $literalGroups);
	if (isset($saved) && $saved == 1) {
		if ($modremitent == 1) {
			$item['informa'] = pnUserGetVar('uid');
		}
		$item['no_mostrar'] = '$';
		$item['marca'] = '$';
		$item['data'] = time();
		$item['edited'] = '';
		$item['edited_by'] = time();
	}
	if ($m == 'c') {
		$item['marca'] = '$';
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$where = "$c[nid]=$nid";
	if (!DBUTil::updateObject ($item, 'iw_noteboard', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	//Put all users as they have not seen the note
	if (isset($saved) && $saved == 1) {
		$c = $pntable['iw_main_column'];
		// get all users who have seen the note
		$where = "$c[module] = 'iw_noteboard' 
					AND $c[name] = 'viewed'
					AND $c[value] like '%$".$nid."$%'";
		$items = DBUtil::selectObjectArray('iw_main', $where, '', '-1', '-1', 'id');
		// Check for an error with the database code, and if so set an appropriate
		// error message and return
		if ($items === false) {
			return LogUtil::registerError (__('Error! Could not load items.', $dom));
		}
		//Update the seen note for each user who have seen it
		foreach($items as $i) {
			$haveSeen = str_replace('$'.$nid.'$','',$i['value']);
			$item = array('value' => $haveSeen);
			$where = "$c[id]=$i[id]";
			if (!DBUTil::updateObject ($item, 'iw_main', $where)) {
				return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
			}
		}
	}
	return true;
}

/**
 * Get the characteristics of a topic
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the topic
 * @return:	The topic information
*/
function iw_noteboard_userapi_gettema($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');	
	$tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	extract($args);
	// Needed argument
	if (!isset($tid) || !is_numeric($tid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_topics_column'];
	$where = "$c[tid]=$tid";
	// get the objects from the db
	$item = DBUtil::selectObjectArray('iw_noteboard_topics', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($item === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the item
	return $item[0];
}

/**
 * Get all the comments associate with a note
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note
 * @return:	The topic information
*/
function iw_noteboard_userapi_getallcomentaris($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$ncid = FormUtil::getPassedValue('ncid', isset($args['ncid']) ? $args['ncid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if (!isset($ncid) || !is_numeric($ncid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$where = "$c[ncid]=$ncid";
	$orderby = "$c[data]";
	$items = DBUtil::selectObjectArray('iw_noteboard', $where, $orderby, '-1', '-1', 'nid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * update a comment
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note
 *			The comment text
 *			The validation value
 * @return:	True if success and false otherwise
*/
function iw_noteboard_userapi_updatecomentari($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
    $noticia = FormUtil::getPassedValue('noticia', isset($args['noticia']) ? $args['noticia'] : null, 'POST');
    $verifica = FormUtil::getPassedValue('verifica', isset($args['verifica']) ? $args['verifica'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Argument check 
	if (!isset($nid) || !is_numeric($nid)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Get the item
	$item = pnModAPIFunc('iw_noteboard', 'user', 'get',
                            array('nid' => $nid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}
	$item = array('noticia' => $noticia,
	        		'verifica' => $verifica);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$where = "$c[nid]=$nid";
	if (!DBUTil::updateObject ($item, 'iw_noteboard', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * Hide a note to an user
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note
 *			The string of hide notes of the user
 * @return:	True if success and false otherwise
*/
function iw_noteboard_userapi_no_mostrar($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
   	$no_mostrar = FormUtil::getPassedValue('no_mostrar', isset($args['no_mostrar']) ? $args['no_mostrar'] : null, 'POST');
   	$marca = FormUtil::getPassedValue('marca', isset($args['marca']) ? $args['marca'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	if (!pnUserLoggedIn()) {
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
	// Argument check 
	if (!isset($nid) || !is_numeric($nid) || !isset($no_mostrar)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Get the item
	$item = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}
	$item = array('no_mostrar' => $no_mostrar, 'marca' => $marca);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$where = "$c[nid]=$nid";
	if (!DBUTil::updateObject ($item, 'iw_noteboard', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * Mach a note with a flag
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note
 *			The string of mached notes by the user
 * @return:	True if success and false otherwise
*/
function iw_noteboard_userapi_marca($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
    $marca = FormUtil::getPassedValue('marca', isset($args['marca']) ? $args['marca'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	if (!pnUserLoggedIn()) {
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
	// Argument check 
	if (!isset($nid) || !is_numeric($nid) || !isset($marca)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Get the item
	$item = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}
	$item = array('marca' => $marca);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$where = "$c[nid]=$nid";
	if (!DBUTil::updateObject ($item, 'iw_noteboard', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * Get all the headlines of the notes
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	An array with the headlines information
*/
function iw_noteboard_userapi_getalltitulars()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$time = time();
	$where = "$c[titulin]<$time AND $c[titulout]>$time AND $c[titular]<>'' AND $c[caduca]>$time";
	$orderby = "$c[titulin] desc";
	if (pnModGetVar('iw_noteboard','multiLanguage') == 1) {
		$where .= " AND $c[lang]='".pnusergetlang()."' OR $c[lang] = ''";
	}
	$items = DBUtil::selectObjectArray('iw_noteboard', $where, $orderby, '-1', '-1', 'nid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get all the expired notes
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of topic
 * @return:	An array with the headlines information
*/
function iw_noteboard_userapi_getallcaducated($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	$tema = FormUtil::getPassedValue('tema', isset($args['tema']) ? $args['tema'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));
	if (empty($permissions) ||
			!$permissions['potverificar']){
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$time = time();
	if ($tema > 0) {
		$where = "$c[caduca] < $time AND $c[tid]=$tema AND $c[ncid]=0";
	} elseif ($tema == '-1') {
		$where = "$c[caduca] < $time AND $c[tid]=0 AND $c[ncid]=0";
	} else {
		$where = "$c[caduca] < $time AND $c[ncid]=0";
	}
	$orderby = "$c[data] desc,$c[nid] desc";
	$items = DBUtil::selectObjectArray('iw_noteboard', $where, $orderby, '-1', '-1', 'nid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get the number of notes that haven't been seen by an user
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	A string with the notes seen by the user
 * @return:	The number of notes that the user haven't seen
*/
function iw_noteboard_userapi_noves($args)
{
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : pnUserGetVar('uid'), 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if (!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))) {
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	} else {
		$requestByCron = true;
	}
	$nombrevistes = array();
	if ($uid != pnUserGetVar('uid') && !$requestByCron) {
		return $nombrevistes;
	}
	$nombre = 0;
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$registres = pnModAPIFunc('iw_noteboard', 'user', 'getall', array('sv' => $sv));
	//Check the user permisions
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$permisos = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => $uid,
																		'sv' => $sv));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$vistes = pnModFunc('iw_main', 'user', 'userGetVar', array('name' => 'viewed',
																'uid' => $uid,
																'module' => 'iw_noteboard',
																'sv' => $sv));
	foreach ($registres as $registre) {
		//separem la llista de grups que tenen accï¿œs a la notï¿œcia i ho posem en una matriu
		$grups_acces = explode('$',$registre['destinataris']);
		$esta_en_grups_acces = array_intersect($grups_acces,$permisos['grups']);
		if (($registre['verifica'] == 1 &&
			(count($esta_en_grups_acces) >= 1 ||
			$uid == $registre['informa'])) ||
			$permisos['potverificar']){
			//Comprovem si el registre estï¿œ dins del text
			$pos1 = strpos($registre['no_mostrar'],'$'.$uid.'$');
			$pos = strpos($vistes,'$'.$registre['nid'].'$');
			if ($pos1 == 0){
				($pos == 0 ? $nombre++:'');
			}
		}
	}
	$nombrevistes = array('nombre' => $nombre,
							'vistes' => $vistes);
	return $nombrevistes;
}

/**
 * Get the users that have seen the note
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	Id of the note
 * @return:	An array with the full names of the users that have seen the note
*/
function iw_noteboard_userapi_hanvist($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
	$no_mostrar = FormUtil::getPassedValue('no_mostrar', isset($args['no_mostrar']) ? $args['no_mostrar'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	if (!pnUserLoggedIn()) {
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
	// Argument check 
	if (!isset($nid) || !is_numeric($nid)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Get the item
	$item = pnModAPIFunc('iw_noteboard', 'user', 'get',
                            array('nid' => $nid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}
	$hanvist = $item['no_mostrar'];
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersFullname = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
                                array('info' => 'ccn',
                                        'sv' => $sv));
	$pntable = pnDBGetTables();
	$c = $pntable['iw_main_column'];	$where = "$c[value] like '$%".$nid."%$'";
	$items = DBUtil::selectObjectArray('iw_main', $where, '', '-1', '-1', 'id');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	foreach ($items as $item) {
		$registres[] = array('usuari' => $usersFullname[$item['uid']]);
	}

	//Delete the last characther because it is a $
	$hanvist=substr($hanvist,0,-1);
	//Unjoin the array elements and add them into the users full name array
	$hanvist=explode('$$',$hanvist);
	//Delete the first element of the array because it is nothing
	array_shift($hanvist);
	foreach ($hanvist as $hanvist1) {
		$registres[] = array('usuari' => $usersFullname[$hanvist1]);
	}
	//Reorder the array
	sort($registres);
	//Return the array with the users full names
	return $registres;
}

/**
 * Get the user permissions for the noteboard
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note
 *			The string of mached notes by the user
 * @return:	True if success and false otherwise
*/
function iw_noteboard_userapi_permisos($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : pnUserGetVar('uid'), 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if (!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))) {
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	} else {
		$requestByCron = true;
	}
	$nivell_permisos = array();
	//if user is not registered have a fixed permissions
	if (!pnUserLoggedIn() && !$requestByCron){
		$nivell_permisos = array('nivell' => 1,
									'verifica' => 2,
									'potverificar' => false,
									'grups' => array(0));
		//return not registered permissions
		return $nivell_permisos;
	}
	// Arguments needed
	if (!isset($uid) || ($uid != pnUserGetVar('uid') && !$requestByCron)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return $nivell_permisos;
	}
	$myJoin = array();
	$myJoin[] = array('join_table' => 'groups',
						'join_field' => array('gid'),
						'object_field_name' => array('gid'),
						'compare_field_table' => 'gid',
						'compare_field_join' => 'gid');
	$myJoin[] = array('join_table' => 'group_membership',
						'join_field' => array(),
						'object_field_name' => array(),
						'compare_field_table' => 'gid',
						'compare_field_join' => 'gid');
	$pntables = pnDBGetTables();
	$ccolumn   = $pntables['groups_column'];
	$ocolumn   = $pntables['group_membership_column'];
	$where = "b.$ocolumn[gid] = a.$ccolumn[gid] AND b.$ocolumn[uid] = $uid";
	$items = DBUtil::selectExpandedObjectArray('groups', $myJoin, $where, '');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
        	return $nivell_permisos;
	}
	$verifica = 2;
	$potverificar = false;
	$permisosModVar = pnModGetVar('iw_noteboard','permisos');
	$verificaModVar = pnModGetVar('iw_noteboard','verifica');
	$quiverificaModVar = pnModGetVar('iw_noteboard','quiverifica');
	foreach($items as $item) {
		// get user permissions level
		$permis = substr($permisosModVar,strpos($permisosModVar,'$'.$item['gid'].'-') + strlen($item['gid']) + 2,1);
		$verifica = (strpos($verificaModVar,'$'.$item['gid'].'$') != 0 && $verifica != 1) ? 0 : 1;
		if ($permis > $n_permisos){$n_permisos = $permis;}
		if ($quiverificaModVar == $item['gid']){$potverificar = true;}
		$grups[] = $item['gid'];
	}
	$nivell_permisos = array('nivell' => $n_permisos,
        					    'verifica' => $verifica,
		        		    	'potverificar' => $potverificar,
				        	    'grups' => $grups);
	return $nivell_permisos;
}

/**
 * Gets all the topics defined in the noteboard
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	And array with the items information
*/
function iw_noteboard_userapi_getallSharedURL()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_public_column'];
	$orderby = "$c[url]";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_noteboard_public', '', $orderby, '-1', '-1', 'pid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get the characteristics of a shared url
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the topic
 * @return:	The topic information
*/
function iw_noteboard_userapi_getShared($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$pid = FormUtil::getPassedValue('pid', isset($args['pid']) ? $args['pid'] : null, 'POST');
    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if ((!isset($pid) || !is_numeric($pid)) && !isset($sid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_public_column'];
	if ($sid == null) {
		$where = "$c[pid]=$pid";
	} else {
		$where = "$c[url] like '%".$sid."%'";
	}
	// get the objects from the db
	$item = DBUtil::selectObjectArray('iw_noteboard_public', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($item === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the item
	return $item[0];
}

/**
 * Check if a shared note exists
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the note in the shared noteboard and the shared noteboard sid
 * @return:	An array with the note information
*/
function iw_noteboard_userapi_sharedItemExists($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$sharedId = FormUtil::getPassedValue('sharedId', isset($args['sharedId']) ? $args['sharedId'] : null, 'POST');
    $sharedFrom = FormUtil::getPassedValue('sharedFrom', isset($args['sharedFrom']) ? $args['sharedFrom'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if (!isset($sharedId) || !is_numeric($sharedId) || !isset($sharedFrom)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$where = "$c[sharedId]=$sharedId AND $c[sharedFrom]='$sharedFrom'";
	// get the objects from the db
	$item = DBUtil::selectObjectArray('iw_noteboard', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($item === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	if (count($item) == 0){
		return false;
	} else {
		return array('edited' => $item[0]['edited'],
			        	'nid' => $item[0]['nid']);
	}
}

/**
 * Gets all the notes where that the user has flagged
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	And array with the items information
*/
function iw_noteboard_userapi_getFlagged()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_noteboard::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_noteboard_column'];
	$where = "$c[marca] like '%$".pnUserGetVar('uid')."$%'";
	$orderby = "$c[data] desc";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_noteboard', $where, $orderby, '-1', '-1', 'nid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get and display the RSS content with all the notes of a noteboard
 * @author: Sara Arjona Tï¿œllez (sarjona@xtec.cat)
 * @param:	args   
 * @return:	The XML with the context of the noteboard
*/
function iw_noteboard_userapi_display_rss($args)
{
		// Get the parameters
	$url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
	$parsed_url = parse_url($url);
	$start = strpos($parsed_url['query'], "sid=") + 4;
	$length =  strpos($parsed_url['query'], "&", $start + 1);
	if ($length === FALSE) $length = strlen($parsed_url['query']) - $start;
	else $length = $length - $start;
	$sid = substr($parsed_url['query'], $start, $length);
	// get user identity
	$uid = pnUserGetVar('uid');
	if ($uid == ''){$uid = '-1';}
	// Check if rss content already exists for current user
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists',
                            array('name' => 'rss_'.$sid,
							      'module' => 'iw_noteboard',
								  'uid' => $uid,
								  'sv' => $sv));
	if (!$exists) {
		//Get the rss content
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$rss_content = pnModAPIFunc('iw_noteboard', 'user', 'call_servlet',
                                        array('url' => $url,
										      'sv' => $sv));
		pnModAPIFunc('iw_noteboard', 'user', 'setdata',
                        array('xml' => $rss_content));	
		//Set 1 to cache var to indicate that it is not necessary a new sql request for some time
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar',
                    array('uid' => $uid,
					      'name' => 'rss_'.$sid,
						  'module' => 'iw_noteboard',
						  'sv' => $sv,
						  'value' => 1,
						  'lifetime' => '1500'));
	}
	return true;
}

/**
 * Open a socket to get the content of the specified URL 
 * @author: Sara Arjona Tï¿œllez (sarjona@xtec.cat)
 * @param:	args   
 * @return:	The XML with the context of the noteboard
*/
function iw_noteboard_userapi_call_servlet($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	if (!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		return LogUtil::registerError (_IWMAININFORMATIONNOTACCESS);
	}
	$url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
	if (!isset($url)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$result = "";
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_HEADER, 0);
	curl_setopt ($ch, CURLOPT_TIMEOUT, 20); 
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,1); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	if (!empty($params)) curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	$result = curl_exec ($ch);
	curl_close ($ch);
	return $result;	
}

function iw_noteboard_userapi_setdata($args){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get the parameters
	$xml = FormUtil::getPassedValue('xml', isset($args['xml']) ? $args['xml'] : null, 'POST');
	if (!isset($xml)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$doc = new DOMDocument();
	$doc->loadXML($xml);
	// Get current user groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$allGroupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
	$sharedIds = array();
	$items = $doc->getElementsByTagName("item");
	foreach ($items as $item) {
		$shared_id=$item->getElementsByTagName('shared_id')->item(0)->nodeValue;
		$shared_from=utf8_decode($item->getElementsByTagName('shared_from')->item(0)->nodeValue);
		$literal_groups=$item->getElementsByTagName('literal_groups')->item(0)->nodeValue;
		$noticia=utf8_decode($item->getElementsByTagName('description')->item(0)->nodeValue);
		$caduca=$item->getElementsByTagName('caduca')->item(0)->nodeValue;
		$titular=utf8_decode($item->getElementsByTagName('title')->item(0)->nodeValue);
		$titulin=utf8_decode($item->getElementsByTagName('titulin')->item(0)->nodeValue);
		$titulout=utf8_decode($item->getElementsByTagName('titulout')->item(0)->nodeValue);
		$mes_info=utf8_decode($item->getElementsByTagName('mes_info')->item(0)->nodeValue);
		$text=utf8_decode($item->getElementsByTagName('text')->item(0)->nodeValue);
		$nom_fitxer=utf8_decode($item->getElementsByTagName('nom_fitxer')->item(0)->nodeValue);
		$textfitxer=utf8_decode($item->getElementsByTagName('textfitxer')->item(0)->nodeValue);
		$language=$item->getElementsByTagName('language')->item(0)->nodeValue;
		$edited=$item->getElementsByTagName('edited')->item(0)->nodeValue;
		//Check if the item exists. If the item exists the function returns the creation date and the note identity
		$sharedItemExists = pnModAPIFunc('iw_noteboard', 'user', 'sharedItemExists',
                                            array('sharedId' => $shared_id,
											      'sharedFrom' => $shared_from));
		//adapt the groups that can access the note
		$groups = explode('$',substr($literal_groups,2,-1));
		$desti = '$$';
		foreach ($groups as $group) {
			if ($group == '0') {$desti .= '0$';}
			if ($key = array_search($group, $allGroupsInfo)) {
				$desti .= $key.'$';
			}
		}
		if (!$sharedItemExists) {
			//create the note
			pnModAPIFunc('iw_noteboard', 'user', 'crear',
                            array('noticia' => $noticia,
							      'data' => time(),
								  'caduca' => $caduca,
								  'titular' => $titular,
								  'titulin' => $titulin,
								  'titulout' => $titulout,
								  'mes_info' => $mes_info,
								  'text' => $text,
								  'fitxer' => $nom_fitxer,
								  'textfitxer' => $textfitxer,
				                  'destinataris' => $desti,
								  'admet_comentaris' => 0,
								  'verifica' => 1,
								  'tid' => $tid,
								  'language' => $language,
								  'public' => 0,
								  'literalGroups' => '',
								  'sharedFrom' => $shared_from,
								  'sharedId' => $shared_id));
		} else {
			//check if the note date is the older than the edited shared note
			if ($sharedItemExists['edited'] < $edited) {
				pnModAPIFunc('iw_noteboard', 'user', 'update',
                                array('data' => time(),
								      'nid' => $sharedItemExists['nid'],
									  'noticia' => $noticia,
									  'caduca' => $caduca,
									  'titular' => $titular,
									  'titulin' => $titulin,
									  'titulout' => $titulout,
									  'mes_info' => $mes_info,
									  'text' => $text,
									  'fitxer' => $nom_fitxer,
									  'textfitxer' => $textfitxer,
									  'destinataris' => $desti,
									  'admet_comentaris' => 0,
									  'verifica' => 1,
									  'tid' => $tid,
									  'language' => $language,
									  'public' => 0,
									  'literalGroups' => '',
									  'sharedFrom' => $shared_from,
									  'sharedId' => $shared_id));
			}
		}
		//include the notes into an array necessary to detect the notes deleted in shared noteboards
		array_push($sharedIds,$shared_id);
	}
	//get all the shared notes that cames from a specific noteboard
	//filter the deleted notes in shared noteboard
	//delete from the noteboard the deleted notes in shared noteboard
	return true;
}