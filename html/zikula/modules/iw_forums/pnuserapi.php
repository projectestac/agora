<?php
/**
 * Gets all the forums created
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the items information
*/
function iw_forums_userapi_getall($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : pnUserGetVar('uid'), 'POST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	}else{
		$requestByCron = true;
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forums_def_column'];
	if (SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_ADMIN) && $filter != 1) {
		$where = '';
	} else {
		$uid = (!pnUserLoggedIn() && !$requestByCron) ? '-1' : $uid;
		//get all the forums where the user can access because is group member or forum moderator
		if($uid != '-1'){
			// get all user groups
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$groups = pnModAPIFunc('iw_main','user','getAllUserGroups', array('sv' => $sv,
																				'uid' => $uid));
			$sqlWhere = "$c[actiu]=1 AND (";
			foreach($groups as $group){
				//create the select restrictive sql command
				$groupsList .= "$c[grup] like '%$".$group['gid']."|1$%' OR
								$c[grup] like '%$".$group['gid']."|2$%' OR
								$c[grup] like '%$".$group['gid']."|3$%' OR
								$c[grup] like '%$".$group['gid']."|4$%' OR ";
			}
			$sqlWhere .= substr($groupsList,0,-3);
		}else{
			$sqlWhere = "$c[actiu]=1 AND ($c[grup] like '%$-1|1$%'";
		}
		$or = (trim(substr($groupsList,0,-3)) === '') ? '' : " OR ";
		if($uid != '-1'){
			$sqlWhere .= $or."$c[mod] like '%$".$uid."$%')";
		}else{
			$sqlWhere .= ')';
		}
	}
	$where = $sqlWhere;
	$orderby = "$c[nom_forum]";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_forums_def', $where, $orderby, '-1', '-1', 'fid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get a forum
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Identity of the forum
 * @return:	And array with the forum information
*/
function iw_forums_userapi_get($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');

	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = DBUtil::selectObjectByID('iw_forums_def', $fid, 'fid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Get the number of messages into a forum or topic and the number of them that the user haven't seen
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Identity of the forum
 * @return:	And array with the information
*/
function iw_forums_userapi_compta_msg($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : 0, 'POST');
	$tots = FormUtil::getPassedValue('tots', isset($args['tots']) ? $args['tots'] : 0, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : pnUserGetVar('uid'), 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	$u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	}else{
		$requestByCron = true;
	}
	$registres = array();
	if($uid != pnUserGetVar('uid') && !$requestByCron){
		return $registres;
	}
	//check if user can access the forum
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	if(pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid,
														'uid' => $uid,
														'sv' => $sv)) < 1){
		return LogUtil::registerPermissionError();
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forums_msg_column'];
	$c = $pntable['iw_forums_msg_column'];
	$userFilter = ($u > 0) ? " AND $c[usuari] = $u" : '';
	$temaFilter = ($tots == 1) ? '' :  " AND $c[ftid]=$ftid";
	$where = "$c[fid]=$fid" . $temaFilter . $userFilter;
	$where1 = "$c[llegit] LIKE '%$" . $uid . "$%' AND $c[fid]=$fid" . $temaFilter . $userFilter;
	$where2 = "$c[marcat] LIKE '%$" . $uid . "$%' AND $c[fid]=$fid" . $temaFilter . $userFilter;
	$items = DBUtil::selectObjectArray('iw_forums_msg', $where, '', '-1', '-1', 'fmid');
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	$nmsg = count($items);
	if($u == null || $u == 0){
		// get the number of topics
		$where = "$c[ftid]=$ftid AND $c[fid]=$fid AND $c[idparent]=0";
		$topics = DBUtil::selectObjectArray('iw_forums_msg', $where, '', '-1', '-1', 'fmid');
		// error message and return
		if ($topics === false) {
			return LogUtil::registerError (__('Error! Could not load items.', $dom));
		}
		$nparent = count($topics);
	} else {
		$nparent = $nmsg;
	}
	$uread = DBUtil::selectObjectArray('iw_forums_msg', $where1, '', '-1', '-1', 'fmid');
	// error message and return
	if ($uread === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	$nmsgno = count($uread);
	$nollegits = $nmsg - $nmsgno;
	$checked = DBUtil::selectObjectArray('iw_forums_msg', $where2, '', '-1', '-1', 'fmid');
	// error message and return
	if ($checked === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	$marcats = count($checked);
	$registres = array('nmsg' => $nmsg,
						'nollegits' => $nollegits,
						'marcats' => $marcats,
						'nparent' => $nparent);
	//print_r($registres);
	//Retornem la matriu plena de registres
	return $registres;
}

/**
 * Get the number of topics into a forum
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Identity of the forum
 * @return:	The number of topics
*/
function iw_forums_userapi_compta_temes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 1){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}

	$pntable = pnDBGetTables();

	$c = $pntable['iw_forums_temes_column'];

	$where = "$c[fid]=$fid";
	$items = DBUtil::selectObjectArray('iw_forums_temes', $where, '', '-1', '-1', 'ftid');

	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	return count($items);
}

/**
 * Get a topic
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Identity of the forum and the topic
 * @return:	An array with the topic information
*/
function iw_forums_userapi_get_tema($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid) || !isset($ftid) || !is_numeric($ftid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 1){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}

	$items = DBUtil::selectObjectByID('iw_forums_temes', $ftid, 'ftid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Get a message
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Identity of the forum and the message
 * @return:	An array with the message information
*/
function iw_forums_userapi_get_msg($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid) || !isset($fmid) || !is_numeric($fmid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 1){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}

	$items = DBUtil::selectObjectByID('iw_forums_msg', $fmid, 'fmid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Get all the topics in a forum
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Identity of the forum
 * @return:	An array with all the topics into a forum
*/
function iw_forums_userapi_get_temes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'POST');
	$forumtriat = FormUtil::getPassedValue('forumtriat', isset($args['forumtriat']) ? $args['forumtriat'] : null, 'POST');
	if($forumtriat != null){
		$fid = $forumtriat;
	}
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 1){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//get forum information
	$forum = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($forum == false) {
		$pnRender -> assign('msg',__('The forum upon which the ation had to be carried out hasn\'t been found', $dom));
		return $pnRender -> fetch('iw_forums_user_noacces.htm');		
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forums_temes_column'];
	$where = "$c[fid]=$fid";	
	$orderBy = "$c[order] asc, $c[data] desc";
	$items = DBUtil::selectObjectArray('iw_forums_temes', $where, $orderBy, '-1', '-1', 'ftid');
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	foreach($items as $item){
		if ($item['last_time'] == 0) {
			$last_post_exists = false;
			$lastdate = 0;
			$lasttime = 0;
		}else {
			$last_post_exists = true;
			$lastdate = date('d/m/y', $item['last_time']);
			$lasttime = date('H.i', $item['last_time']);
		}

		$n_msg = pnModAPIFunc('iw_forums', 'user', 'compta_msg', array('ftid'=>$item['ftid'],
																		'fid'=>$fid,
																		'u' => $u));
		$n_msg_no_llegits = $n_msg['nollegits'];
		$marcats = $n_msg['marcats'];
		$n_msg = $n_msg['nmsg'];
		$itemsArray[] = array('ftid' => $item['ftid'],
								'titol' => $item['titol'],
								'descriu' => $item['descriu'],
								'usuari' => $item['usuari'],
								'data' => date('d/m/y',$item['data']),
								'hora' => date('H.i', $item['data']),
								'lastdate' => $lastdate,
								'lasttime' => $lasttime,
								'lastuser' => $item['last_user'],
								'last_post_exists' => $last_post_exists,
								'n_msg' => $n_msg,
								'n_msg_no_llegits' => $n_msg_no_llegits,
								'marcats' => $marcats);
		
	}
	return $itemsArray;
}

/**
 * Get the names of the attached files to a forum
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Identity of the forum
 * @return:	And array with the files names
*/
function iw_forums_userapi_get_adjunts($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 4){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}

	$registres = array();

	//Connectem amb la Base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();

	$t = $pntable['iw_forums_msg'];
	$c = $pntable['iw_forums_msg_column'];

	//Fem la consulta que recollirï¿œ els registres ordenats per nom
	$sql = "SELECT $c[adjunt]
		FROM $t
		WHERE $c[fid]=$fid";
            
	$registre = $dbconn -> Execute($sql);

	//Comprovem que la consulta hagi estat amb ï¿œxit
	if ($dbconn->ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while reading records from the data base', $dom));
	}

	//Recorrem els registres i els posem dins de la matriu
	for (; !$registre->EOF; $registre -> MoveNext()) {
		list($adjunt) = $registre -> fields;
		$registres[] = array('adjunt' => $adjunt);
	}

	//Tanquem la connexiï¿œ a la base de dades
	$registre -> Close();
    
	//Retornem la matriu plena de registres
	return $registres;
}

/**
 * Create a new topic in database
 * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Topic information
 * @return:	identity of the topic created if success and false otherwise
*/
function iw_forums_userapi_crear_tema($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : '', 'POST');
	$titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid) || !isset($titol)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 3){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}

	$item = array('fid' => $fid,
			'titol' => $titol,
			'usuari' => pnUserGetVar('uid'),
			'descriu' => $descriu,
			'data' => time());

	if (!DBUtil::insertObject($item, 'iw_forums_temes', 'ftid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}


	// Let any hooks know that we have created a new item
	pnModCallHooks('item', 'create', $item['ftid'], array('module' => 'iw_forums'));

	return $item['ftid'];
}

function iw_forums_userapi_getall_msg($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
	$tots = FormUtil::getPassedValue('tots', isset($args['tots']) ? $args['tots'] : null, 'POST');
	$usuari = FormUtil::getPassedValue('usuari', isset($args['usuari']) ? $args['usuari'] : null, 'POST');
	$idparent = FormUtil::getPassedValue('idparent', isset($args['idparent']) ? $args['idparent'] : null, 'POST');
	$inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
	$indent = FormUtil::getPassedValue('indent', isset($args['indent']) ? $args['indent'] : null, 'POST');
	$rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'POST');
	$oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 1){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	$registres = array();
	// Connectem amb la Base de dades
	list($dbconn) = pnDBGetConn();
	$pntable = pnDBGetTables();
	$t = $pntable['iw_forums_msg'];
	$c = $pntable['iw_forums_msg_column'];
	// Filtering: only show the messages sent by $usuari
	//$filter_user = (isset($usuari) && $usuari != null) ? $usuari : 0;
	$filter_user = ($usuari != null && $usuari > 0) ? " AND $c[usuari]=$usuari" : '';
	// Condition to select the topic
	$tema = (isset($tots) && $tots == 1) ? "" : " $c[ftid] = $ftid AND ";
	$inici = $inici - 1;
	$ordre = ($idparent == 0) ? "$c[lastdate] desc, $c[data] desc limit $inici, $rpp" : "$c[data] asc";
	$parent = (!isset($idparent)) ? '' : " AND $c[idparent]=$idparent";
	if($filter_user != ''){
		$parent = '';
	}
	$where = $tema . "$c[fid]=$fid" . $parent . $filter_user;
	$ordreby = ($idparent == 0) ? "$c[lastdate] desc, $c[data] desc" : "$c[data] asc";
	$registre = DBUtil::selectObjectArray('iw_forums_msg', $where, $ordreby, $inici, $rpp, 'fmid');
	
	//Recorrem els registres i els posem dins de la matriu
	foreach($registre as $r){
		// Set the id of the origen of the thread
		if ($idparent == 0) $oid = $r['fmid'];
		// Put the message in the array to be returned
		$indentValue = ($filter_user != '') ? 0 : $indent;
		$registres[] = array('fmid' => $r['fmid'],
								'usuari' => $r['usuari'],
								'titol' => $r['titol'],
								'data' => $r['data'],
								'llegit' => $r['llegit'],
								'missatge' => $r['missatge'],
								'adjunt' => $r['adjunt'],
								'icon' => $r['icon'],
								'marcat' => $r['marcat'],
								'indent' => $indentValue,
								'oid' => $oid);
		if($filter_user == ''){
			// Recursive call to get all the replies to a message
			$listmessages = pnModAPIFunc('iw_forums', 'user', 'getall_msg', array('ftid' => $ftid,
																					'fid' => $fid,
																					'usuari' => $usuari,
																					'indent' => $indent + 30,
																					'idparent' => $r['fmid'],
																					'oid' => $oid,
																					'tots' => $tots));		
			// Copy the replies to the all messages array
			foreach ($listmessages as $message) {
				if ($filter_user != 0) { // Filtering
					if ($filter_user == $message['usuari']) // Show only when the message is written by the selected used
						$registres[] = array('fmid' => $message['fmid'],
												'usuari' => $message['usuari'],
												'titol' => $message['titol'],
												'data' => $message['data'],
												'llegit' => $message['llegit'],
												'missatge' => $message['missatge'],
												'adjunt' => $message['adjunt'],
												'icon' => $message['icon'],
												'marcat' => $message['marcat'],
												'indent' => 0,
												'oid' => $message['oid']);
				}else
					$registres[] = array('fmid' => $message['fmid'],
											'usuari' => $message['usuari'],
											'titol' => $message['titol'],
											'data' => $message['data'],
											'llegit' => $message['llegit'],
											'missatge' => $message['missatge'],
											'adjunt' => $message['adjunt'],
											'icon' => $message['icon'],
											'marcat' => $message['marcat'],
											'indent' => $message['indent'],
											'oid' => $message['oid']);
			}
		}
	}
	//Retornem la matriu plena de registres
	return $registres;
}

/*
Funciï¿œ que posa a l'usuari com que ha llegit el missatge
*/
function iw_forums_userapi_llegit($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	//Avoid that unregistered user to be updated as reader
	if (!pnUserLoggedIn()){return true;}
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$llegit = FormUtil::getPassedValue('llegit', isset($args['llegit']) ? $args['llegit'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//Comprovem que els valors han arribat
	if (!isset($fmid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_forums_msg'];
	$c = &$pntable['iw_forums_msg_column'];
	$llegit = $llegit . '$' . pnUserGetVar('uid') . '$';
	$sql = "UPDATE $t
			SET $c[llegit] = '$llegit'
			WHERE $c[fmid]=$fmid;";
	$registre = $dbconn -> Execute($sql);   
	if ($dbconn -> ErrorNo() != 0) {
		return LogUtil::registerError (__('The modification of the users who have read the message has failed', $dom));
	}
	//Tanquem la connexiï¿œ a la base de dades
	$registre -> Close();
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
Delete a message in a forum
*/
function iw_forums_userapi_del_msg($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//check needed values
	if (!isset($fmid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//get message
	$item = pnModAPIFunc('iw_forums','user','get_msg',array('fmid' => $fmid));
	if ($item == false) {
		return LogUtil::registerError (__('No messages have been found', $dom));
	}
	//get forum information
	$registre = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $item['fid']));
	if($registre == false){
		LogUtil::registerError (__('The forum upon which the ation had to be carried out hasn\'t been found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'user', 'main'));		
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $item['fid']));
	if($access < 2){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	$moderator = ($access == 4) ? true: false;
	//Check if user can delete the message
	if(!$moderator && (time() > $item['data'] + 60 * $registre['msgDelTime'] || $item['usuari'] != pnUserGetVar('uid'))){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Delete the note content
	if (!DBUtil::deleteObjectByID('iw_forums_msg', $fmid, 'fmid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	//Update de last time and user in forum topic
	$updated = pnModAPIFunc('iw_forums', 'user', 'updateLast', array('ftids' => array($item['ftid'])));	
	//success
	return true;
}

/*
Moves a message and all its replies between topics and forums
*/
function iw_forums_userapi_mou($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$noutema = FormUtil::getPassedValue('noutema', isset($args['noutema']) ? $args['noutema'] : null, 'POST');
	$nouforum = FormUtil::getPassedValue('nouforum', isset($args['nouforum']) ? $args['nouforum'] : null, 'POST');
	$ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//Comprovem que els valors han arribat
	if (!isset($fmid)||!isset($noutema)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 4){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//check if user can access the forum where the messages are going to be moved
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $noutema));
	if($access < 4){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn = pnDBGetConn(true);
	$pntable = pnDBGetTables();
	$t = $pntable['iw_forums_msg'];
	$c = $pntable['iw_forums_msg_column'];
  	// Update message clicked. Change idparent to 0
	$sql = "UPDATE $t
			SET $c[fid]='".(int)pnVarPrepForStore($nouforum)."',
			$c[ftid]='".(int)pnVarPrepForStore($noutema)."', $c[idparent]=0
			WHERE $c[fmid]='$fmid';";
	$registre = $dbconn->Execute($sql);   
	if ($dbconn -> ErrorNo() != 0) {
		return LogUtil::registerError (__('The transfer of the message has failed', $dom));
	}
	// Get the rest messages to move (the replies)
	$listmessages = pnModAPIFunc('iw_forums', 'user', 'getall_msg', array('ftid' => $ftid,
										'fid' => $fid,
										'indent' => 0,
										'idparent' => $fmid,
										'oid' => 0,
										'tots' => 1));
	// Update the replies
	foreach ($listmessages as $message) {
		$sql = "UPDATE $t
				SET $c[fid]='".(int)pnVarPrepForStore($nouforum)."',
				$c[ftid]='".(int)pnVarPrepForStore($noutema)."'
				WHERE $c[fmid]='".$message['fmid']."';";
		$registre = $dbconn -> Execute($sql);			
		if ($dbconn -> ErrorNo() != 0) {
			return LogUtil::registerError (__('The transfer of the message has failed', $dom));
		}
	}
	//Tanquem la connexiÃ³ a la base de dades
	$registre->Close();
	//Update de last time and user in forum topic
	$updated = pnModAPIFunc('iw_forums', 'user', 'updateLast', array('ftids' => array($ftid, $noutema)));
	//success
	return true;
}

/*
 Funciï¿œ que esborra un tema d'un fï¿œrum
*/
function iw_forums_userapi_deltema($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	// Arguments check
	if (!isset($ftid) || !isset($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Cridem la funciï¿œ get que retorna les dades
	$link = pnModAPIFunc('iw_forums', 'user', 'get_tema', array('ftid' => $ftid,
																'fid' => $fid));
	//Comprovem que el registre efectivament existeix i, per tant, es podrï¿œ esborrar
	if ($link == false) {
		return LogUtil::registerError (__('No messages have been found', $dom));
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 4){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Connectem a la base de dades
	list($dbconn) = pnDBGetConn();
	$pntable = pnDBGetTables();
	$t = $pntable['iw_forums_temes'];
	$c = $pntable['iw_forums_temes_column'];
	$t2 = $pntable['iw_forums_msg'];
	$c2 = $pntable['iw_forums_msg_column'];
	//get messages files
	$files = pnModAPIFunc('iw_forums', 'user', 'get_adjunts', array('fid' => $fid));
	//delete messages files
	foreach($files as $file){
		unlink(pnModGetVar('iw_main','documentRoot') . '/' . pnModGetVar('iw_forums','urladjunts') . '/' . $file['adjunt']);
	}
	// Message deletion
	$sql = "DELETE FROM $t2 WHERE $c2[ftid]='".(int)pnVarPrepForStore($ftid)."';";
	$registre = $dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while deleting the message', $dom));
	}
	//Esborrem el registre
	$sql = "DELETE FROM $t WHERE $c[ftid]='".(int)pnVarPrepForStore($ftid)."';";
	$registre=$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while deleting the message', $dom));
	}
	$registre->Close();
	//Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
	return true;
}

/*
Create a new msg
*/
function iw_forums_userapi_crear_msg($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
	$titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
	$titolmsg = FormUtil::getPassedValue('titolmsg', isset($args['titolmsg']) ? $args['titolmsg'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$ftid0 = FormUtil::getPassedValue('ftid0', isset($args['ftid0']) ? $args['ftid0'] : null, 'POST');
	$ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
	$adjunt = FormUtil::getPassedValue('adjunt', isset($args['adjunt']) ? $args['adjunt'] : null, 'POST');
	$icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'POST');
	$idparent = FormUtil::getPassedValue('idparent', isset($args['idparent']) ? $args['idparent'] : null, 'POST');
	$oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'POST');
	if($ftid0 != null){
		$ftid = $ftid0;
	}
	if($titolmsg != null){
		$titol = $titolmsg;
	}
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 2){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Comprova que el tÃ­tol del missatge i el contingut del mateix hagin arribat
	if(!isset($titol)||!isset($msg)){
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$item = array('fid' => $fid,
					'ftid' =>	$ftid,
					'titol' => $titol,
					'usuari' => pnUserGetVar('uid'),
					'missatge' => $msg,
					'llegit' => "$$" .pnUserGetVar('uid') . "$",
					'data' => time(),
					'adjunt' => $adjunt,
					'icon' => $icon,
					'marcat' => '$',
					'idparent' => $idparent,
					'lastdate' => time());
	if (!DBUtil::insertObject($item, 'iw_forums_msg', 'fmid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	if(isset($oid) && $oid != 0){
		$pntable = pnDBGetTables();
		$c = $pntable['iw_forums_msg_column'];
		$where = "$c[fmid]=$oid";
		$items = array('lastdate' => time());
		if (!DBUTil::updateObject ($items, 'iw_forums_msg', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}		
	}
	//Update de last time and user in forum topic
	$updated = pnModAPIFunc('iw_forums', 'user', 'updateLast', array('ftids' => array($ftid)));
	//Retorna el id del nou registre que s'acaba d'introduir
	return $item['fmid'];
}

/*
 * update the last user and last time in topic table
 * 
 */
function iw_forums_userapi_updateLast($args){
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$ftids = FormUtil::getPassedValue('ftids', isset($args['ftids']) ? $args['ftids'] : null, 'POST');
	//get last message in topic
	$pntable = pnDBGetTables();
	foreach($ftids as $ftid){
		$c = $pntable['iw_forums_msg_column'];
		$where = "$c[ftid] = $ftid";
		$orderby = "$c[data] desc";
		// get the objects from the db
		$items = DBUtil::selectObjectArray('iw_forums_msg', $where, $orderby, '0', '1', 'ftid');
		// Check for an error with the database code, and if so set an appropriate
		// error message and return
		if ($items === false) {
			return LogUtil::registerError (__('Error! Could not load items.', $dom));
		}
		//update topic last time and user information
		$c = $pntable['iw_forums_temes_column'];
		$where = "$c[ftid]=$ftid";
		$items = array('last_time' => $items[$ftid]['data'],
						'last_user' => $items[$ftid]['usuari']);
		if (!DBUTil::updateObject ($items, 'iw_forums_temes', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}
	return true;
}

/*
FunciÃ³ que esborra el fitxer adjunt a un missatge
*/
function iw_forums_userapi_del_adjunt($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	 //Comprova que el tÃ­tol del missatge i el contingut del mateix hagin arribat
	if (!isset($fmid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Agafem les dades del missatge
	$missatge= pnModAPIFunc('iw_forums', 'user', 'get_msg', array('fmid' => $fmid));
	if ($missatge == false) {
		return LogUtil::registerError (__('No messages have been found', $dom));	
	}
	//Carreguem la informaciÃ³ del fÃ³rum
	$registre = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $missatge['fid']));
	if($registre == false){
		LogUtil::registerError (__('The forum upon which the ation had to be carried out hasn\'t been found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'user', 'main'));		
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $missatge['fid']));
	if($access < 2){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Comprovem que l'usuari sigui moderador del fï¿œrum i pugui editar el missatge
	$moderator = ($access == 4) ? true : false;
	if(!$moderator && (time() > $missatge['data'] + 60 * $registre['msgDelTime'] || $missatge['usuari'] != pnUserGetVar('uid'))){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Esborrem el fitxer adjunt del servidor
	$esborrat = unlink(pnModGetVar('iw_main','documentRoot') . '/' . pnModGetVar('iw_forums','urladjunts') . '/' .$missatge['adjunt']);
	if($esborrat){
		//Esborrem la informaciï¿œ de la base de dades
		//Connectem amb la base de dades
		list($dbconn) = pnDBGetConn();
		$pntable =& pnDBGetTables();
		$t = $pntable['iw_forums_msg'];
		$c = &$pntable['iw_forums_msg_column'];
		//Inserim el registre a la base de dades
		$sql = "UPDATE $t
				SET $c[adjunt]=''
				WHERE $c[fmid]=$fmid";
		$registre = $dbconn -> Execute($sql);
		if ($dbconn -> ErrorNo() != 0) {
			return LogUtil::registerError (__('An error has occurred while editing the message', $dom).$sql);
		}
		$registre -> Close();
	}
	//Retorna el id del nou registre que s'acaba d'introduir
	return $fmid;
}

/*
Funciï¿œ que retorna una matriu amb la informaciï¿œ de tots els usuaris que han participat en el fï¿œrum
*/
function iw_forums_userapi_getremitents($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$tots = FormUtil::getPassedValue('tots', isset($args['tots']) ? $args['tots'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$registres = array();
	//Connectem amb la Base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_forums_msg'];
	$c = $pntable['iw_forums_msg_column'];
	$tema = ($tots != null && $tots == 1) ? "" : ' ' . $c['ftid'] . '=' . $ftid . ' AND ';
	//Fem la consulta que recollirï¿œ els registres ordenats per nom
	$sql = "SELECT $c[usuari]
			FROM $t
			WHERE " . $tema . " $c[fid]=$fid";
	$registre = $dbconn -> Execute($sql);
	//Comprovem que la consulta hagi estat amb ï¿œxit
	if ($dbconn->ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while reading records from the data base', $dom));
	}
	$usuaris1 = array();
	//Recorrem els registres i els posem dins de la matriu
	for (; !$registre -> EOF; $registre -> MoveNext()) {
		list($usuari) = $registre -> fields;
		if (!in_array($usuari, $usuaris1)) {
			$registres[] = array('usuari' => $usuari);
		}
		$usuaris1[] = $usuari;
	}
	//Tanquem la connexiï¿œ a la base de dades
	$registre -> Close();
	//Retornem la matriu plena de registres
	return $registres;
}

/*
Funciï¿œ que marca o treu la marca d'un missatge
*/
function iw_forums_userapi_marcat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$marcat = FormUtil::getPassedValue('marcat', isset($args['marcat']) ? $args['marcat'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//Comprovem que els valors han arribat
	if (!isset($fmid)||!isset($marcat)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_forums_msg'];
	$c = &$pntable['iw_forums_msg_column'];
	$sql = "UPDATE $t
			SET $c[marcat] = '$marcat'
			WHERE $c[fmid]=$fmid";
	$registre = $dbconn -> Execute($sql);   
	if ($dbconn -> ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while checking/unchecking a message', $dom));
	}
	//Tanquem la connexiï¿œ a la base de dades
	$registre -> Close();
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
Funciï¿œ que modifica un missatge
*/
function iw_forums_userapi_update_msg($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
	$titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$adjunt = FormUtil::getPassedValue('fadjunt', isset($args['fadjunt']) ? $args['fadjunt'] : null, 'POST');
	$icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'POST');
	$idparent = FormUtil::getPassedValue('idparent', isset($args['idparent']) ? $args['idparent'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//Carreguem la informaciï¿œ del fï¿œrum
	$registre = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if($registre == false){
		LogUtil::registerError (__('The forum upon which the ation had to be carried out hasn\'t been found', $dom));
		return pnRedirect(pnModURL('iw_forums', 'user', 'main'));		
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 2){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Agafem les dades del missatge
	$missatge = pnModAPIFunc('iw_forums', 'user', 'get_msg', array('fmid' => $fmid));
	if ($missatge == false) {
		return LogUtil::registerError (__('No messages have been found', $dom));
	}
	//Comprovem que l'usuari sigui moderador del fï¿œrum i pugui editar el missatge
	$moderator = ($access == 4) ? true : false;
	if(!$moderator && (time() > $missatge['data'] + 60 * $registre['msgEditTime'] || $missatge['usuari'] != pnUserGetVar('uid'))){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Comprova que el tï¿œtol del missatge i el contingut del mateix hagin arribat
	if (!isset($titol)||!isset($msg)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Connectem amb la base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_forums_msg'];
	$c = &$pntable['iw_forums_msg_column'];
	$msg=str_replace("'","&#039;",$msg);
	$titol=str_replace("'","&#039;",$titol);
	//Inserim el registre a la base de dades
	$sql = "UPDATE $t
			SET $c[titol]='$titol',$c[missatge]='$msg',$c[icon]='$icon',$c[adjunt]='$adjunt'
			WHERE $c[fmid]=$fmid";
	$registre = $dbconn -> Execute($sql);
	if ($dbconn -> ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while editing the message', $dom));
	}
	$registre -> Close();
	//Retorna el id del nou registre que s'acaba d'introduir
	return $fmid;
}

/*
Funciï¿œ que retorna si un missatge ï¿œs pare o no ho ï¿œs
*/
function iw_forums_userapi_is_parent($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//Comprovaciï¿œ de seguretat. Si falla retorna una matriu buida
	$registres = array();
	//Connectem amb la Base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_forums_msg'];
	$c = $pntable['iw_forums_msg_column'];
	//Fem la consulta que recollirï¿œ el nombre de temes dins d'un fï¿œrum
	$sql = "SELECT count(1)
			FROM $t
			WHERE $c[idparent]=$fmid";
	$registre = $dbconn -> Execute($sql);
	//Comprovem que la consulta hagi estat amb ï¿œxit
	if ($dbconn -> ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while reading records from the data base', $dom));
	}
	list($nmsg) = $registre -> fields;
	//Comprovem que la consulta hagi estat amb ï¿œxit
	if ($dbconn -> ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while reading records from the data base', $dom));
	}
	//Tanquem la connexiï¿œ a la base de dades
	$registre -> Close();
	//Retornem la matriu plena de registres
	if($nmsg > 0){
		return true;
	}else{
		return false;
	}

}

/*
	Gets all the unread messages in a forum topic
	@param $fid:		forum id
	@return:			Array with all the messages ordered
*/
function iw_forums_userapi_getall_msg_unread($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$registres = array();
	// Connectem amb la Base de dades
	list($dbconn) = pnDBGetConn();
	$pntable = pnDBGetTables();
	$t = $pntable['iw_forums_msg'];
	$c = $pntable['iw_forums_msg_column'];
	// Query to get all the messages for the current level
	$sql = "SELECT $c[fmid], $c[llegit]
			FROM $t
			WHERE $c[fid]=$fid AND $c[llegit] NOT LIKE '%$".pnUserGetVar('uid')."$%';";
	$registre = $dbconn -> Execute($sql);
	//Comprovem que la consulta hagi estat amb ï¿œxit
	if ($dbconn->ErrorNo() != 0) {
		return LogUtil::registerError (__('An error has occurred while reading records from the data base', $dom));
	}
	//Recorrem els registres i els posem dins de la matriu
	for (; !$registre->EOF; $registre->MoveNext()) {
		list ($fmid, $llegit) = $registre->fields;
		$registres[] = array('fmid' => $fmid,
								'llegit' => $llegit);
	}
	//Tanquem la connexiï¿œ a la base de dades
	$registre -> Close();
	//Retornem la matriu plena de registres
	return $registres;
}

/*
FunciÃ³ que modifica la posiciÃ³ d'un tema del fÃ³rum
*/
function iw_forums_userapi_put_order($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$ordre = FormUtil::getPassedValue('ordre', isset($args['ordre']) ? $args['ordre'] : null, 'POST');
	$ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//Comprovem que els valors han arribat
	if ($ftid == null || $ordre == null) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Cridem la funciï¿œ get de l'API que ens retornarï¿œ les dades de l'entrada al menï¿œ
	$forum = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	//Comprovem que la consulta anterior ha tornat amb resultats
	if ($forum == false) {
		return LogUtil::registerError (__('The forum upon which the ation had to be carried out hasn\'t been found', $dom));
	}
	//check if user can access the forum
	$access = pnModFunc('iw_forums', 'user', 'access', array('fid' => $fid));
	if($access < 4){
		return LogUtil::registerError (__('You can\'t access the forum', $dom));
	}
	//Connectem amb la Base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_forums_temes'];
	$c = $pntable['iw_forums_temes_column'];
	//Fem la consulta a la base de dades de la modificaciï¿œ de les dades
	$sql = "UPDATE $t
			SET $c[order] = '" . pnVarPrepForStore($ordre) . "'
			WHERE $c[ftid] = '".(int)pnVarPrepForStore($ftid)."'";
	$registre = $dbconn -> Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		return LogUtil::registerError (_FORUMSMODIFICACIOORDREERROR);
	}
	//Tanquem la connexiï¿œ a la base de dades
	$registre -> Close();
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/**
 * Gets all the notes where that the user has flagged for a forum
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Identity of the forum where to search the messages
 * @return:	And array with the items information
*/
function iw_forums_userapi_getFlagged($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forums::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forums_msg_column'];
	$where = "$c[marcat] like '%$".pnUserGetVar('uid')."$%' AND $c[fid]=$fid";
	$orderby = "$c[data] desc";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_forums_msg', $where, $orderby, '-1', '-1', 'fmid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}