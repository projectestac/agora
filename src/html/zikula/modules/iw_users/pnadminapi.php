<?php
/**
 * Create a new user in table iw_users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   user values
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_create($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if (!isset($args['uid'])) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = $args;
	if (!DBUtil::insertObject($items, 'iw_users', 'suid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $items['suid'];
}

/**
 * Create a new user in table users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   user values
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_createUser($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$nom = FormUtil::getPassedValue('nom', isset($args['nom']) ? $args['nom'] : null, 'POST');
	$cognom1 = FormUtil::getPassedValue('cognom1', isset($args['cognom1']) ? $args['cognom1'] : null, 'POST');
	$cognom2 = FormUtil::getPassedValue('cognom2', isset($args['cognom2']) ? $args['cognom2'] : null, 'POST');
	$pass = FormUtil::getPassedValue('pass', isset($args['pass']) ? $args['pass'] : null, 'POST');
	$uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : null, 'POST');
	$email = FormUtil::getPassedValue('email', isset($args['email']) ? $args['email'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if ($uname == null || $pass == null || $email == null) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$method = pnModGetVar('Users', 'hash_method', 'sha1');
	$methodNumberArray = pnModAPIFunc('Users','user','gethashmethods', array('reverse' => false));
	$methodNumber = $methodNumberArray[$method];
	$password = DataUtil::hash($pass, $method);
	$items = array('uname' => $uname,
					'pass' => $password,
					'name' => $nom.' '.$cognom1.' '.$cognom2,
					'email' => $email,
					'activated' => 1,
					'hash_method' => $methodNumber,
					'user_regdate' => date("Y-m-d H:i:s", time()));
	if (!DBUtil::insertObject($items, 'users', 'uid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created user to the calling process
	return $items['uid'];
}

/**
 * Input the user in the initial group
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   user id and group id
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_addUserToGroup($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if ($uid == null) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//if it is a single group and it is not an array
	if(!is_array($gid)){
		$groups = explode('|',substr($gid,0,-1));
	}else{
		$groups = $gid;
	}
	foreach($groups as $g){
		$items = array('uid' => $uid,
						'gid' => $g);
		if (!DBUtil::insertObject($items, 'group_membership')) {
			return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		}
	}
	// Return the id of the newly created user to the calling process
	return true;
}

/**
 * Update the users information
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args array with the users information
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_updateUser($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$nom = FormUtil::getPassedValue('nom', isset($args['nom']) ? $args['nom'] : null, 'POST');
	$cognom1 = FormUtil::getPassedValue('cognom1', isset($args['cognom1']) ? $args['cognom1'] : null, 'POST');
	$cognom2 = FormUtil::getPassedValue('cognom2', isset($args['cognom2']) ? $args['cognom2'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if (!isset($args['uid'])) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	foreach($uid as $u){
		$items = array('nom' => $nom[$u],
						'cognom1' => $cognom1[$u],
						'cognom2' => $cognom2[$u]);
		$pntable = pnDBGetTables();
		$c = $pntable['iw_users_column'];
		$where = "$c[uid] = $u";
		if (!DBUTil::updateObject ($items, 'iw_users', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}
	return true;
}

/**
 * Delete the users selected
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args array with the users identity
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_deleteIWUser($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if (!isset($args['uid'])) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	foreach($uid as $u){
		if($u == pnUserGetVar('uid')){
			LogUtil::registerError (__('You can not remove yourself', $dom));
		}else{
			if (!DBUtil::deleteObjectByID('iw_users', $u, 'uid')) {
				return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
			}
		}
	}
	return true;
}

/**
 * Delete the users selected
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args array with the users identity
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_deleteUserGroups($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if (!isset($args['uid'])) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	foreach($uid as $u){
		if($u == pnUserGetVar('uid')){
			LogUtil::registerError (__('You can not remove yourself', $dom));
		}else{
			if (!DBUtil::deleteObjectByID('group_membership', $u, 'uid')) {
				return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
			}
		}
	}
	return true;
}

/**
 * Delete the users selected
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args array with the users identity
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_deleteUsers($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if (!isset($args['uid'])) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	foreach($uid as $u){
		if($u == pnUserGetVar('uid')){
			LogUtil::registerError (__('You can not remove yourself', $dom));
		}else{
			if (!DBUtil::deleteObjectByID('users', $u, 'uid')) {
				return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
			}
	        // Let other modules know we have deleted an item
	        pnModCallHooks('item', 'delete', $u, array('module' => 'Users'));
		}
	}
	return true;
}

/**
 * Delete the user groups
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args the user identity
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_deleteUserFromGroups($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if (!isset($args['uid'])) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	if (!DBUtil::deleteObjectByID('group_membership', $uid, 'uid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	return true;
}

/**
 * Delete an users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args user identity
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_deleteUser($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if (!isset($args['uid'])) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	if (!DBUtil::deleteObjectByID('user_data', $uid, 'uda_uid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	if (!DBUtil::deleteObjectByID('users', $uid, 'uid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	if (!DBUtil::deleteObjectByID('iw_users', $uid, 'uid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}		
	return true;
}

/**
 * Delete auxiliar tables saga and users
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_truncateTables()
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	if (!DBUtil::truncateTable('iw_users_aux')) return false;
	if (!DBUtil::truncateTable('iw_users_import')) return false;
	return true;
}

/**
 * Copy iw_users table into users_aux table
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	True if success and false otherwise
*/
function iw_users_adminapi_copyTables()
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$users = pnModAPIFunc('iw_users', 'user', 'getAll', array('inici' => 0,
																'numitems' => 1000000000));
	if($users == false){
		return false;
	}
	foreach($users as $user){
		if (!DBUtil::insertObject($user, 'iw_users_aux', 'suid')) {
			return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		}
	}
	return true;
}


/*
Funcio que crea un nou usuari des de la base de dades de SAGA
*/
function iw_users_adminapi_createImport($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Agafem els arguments enviats
	extract($args);
	//Comprova que la id de l'usuari a SAGA hagi arribat
	if ((!isset($id))) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	//Connectem amb la base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
	$c = &$pntable['iw_users_import_column'];
	//Agafem el id de la taula
	$nouId = $dbconn->GenId($t);
	//Inserim el registre a la base de dades
	$sql = "INSERT INTO
			$t ($c[suid],$c[accio],$c[id],$c[nom],$c[cognom1],$c[cognom2],$c[login],$c[email],$c[contrasenya],$c[grup])
		VALUES
			($nouId,
				'" . pnVarPrepForStore($accio) . "',
				'" . pnVarPrepForStore($id) . "',
				'" . pnVarPrepForStore($nom) . "',
				'" . pnVarPrepForStore($cognom1) . "',
				'" . pnVarPrepForStore($cognom2) . "',
				'" . pnVarPrepForStore($nom_u) . "',
				'" . pnVarPrepForStore($email) . "',
				'" . pnVarPrepForStore($contrasenya) . "',
				'" . pnVarPrepForStore($grup) . "')";
	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _USUARISMODIFICACIOERROR);
		return false;
	}
	//Retorna el id del nou registre que s'acaba d'introduir
	return true;
}

/*
Funcio que dÃ³na com a bons els registres iguals a les taules de SAGA i a la d'usuaris de la intranet
*/
function iw_users_adminapi_primer_filtre($args)
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Agafem els arguments enviats
	extract($args);
	// Get all users info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersUname = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'l',
																		'sv' => $sv));
	//Connectem amb la base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
	$c = $pntable['iw_users_import_column'];
	$t1 = $pntable['iw_users_aux'];
	$c1 = $pntable['iw_users_aux_column'];
	$sql = "SELECT $c[id],$c[nom],$c[cognom1],$c[cognom2],$c[login] FROM $t";
	$registre = $dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _USUARISPRIMERFILTREERROR);
		return false;
	}
	//Recorrem els registres i comparem les taules
	for (; !$registre->EOF; $registre->MoveNext()) {
		list($id,$nom,$cognom1,$cognom2,$login) = $registre->fields;
		$sql1="SELECT $c1[uid],$c1[id],$c1[nom],$c1[cognom1],$c1[cognom2] FROM $t1 WHERE $c1[id]='$id'";
		$registre1 = $dbconn->Execute($sql1);
		if ($dbconn->ErrorNo() != 0) {
			pnSessionSetVar('errormsg', _USUARISPRIMERFILTREERROR);
			return false;
		}
		list($uid,$id1,$nom1,$cognom11,$cognom21) = $registre1->fields;
		if(isset($id1)){
			//les dades estan a les dues taules
			//Comprovem si les dades sï¿œn idï¿œntiques
			$identiques = 1;
			if($nom == $nom1 && $cognom1 == $cognom11 && $cognom2 == $cognom21 && ($login == $usersUname[$uid] || $login == "")){$identiques = -1;}
			//Posem el valor acciï¿œ de les dues taules a -1 o a 1 segons el valor d'idï¿œntiques
			$sql2 = "UPDATE $t,$t1 SET $t.$c[accio]=$identiques,$t1.$c1[accio]=$identiques WHERE $t.$c[id]='$id' AND $t1.$c1[id]='$id'";
			$dbconn->Execute($sql2);
			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', $sql2);
				//pnSessionSetVar('errormsg', _USUARISPRIMERFILTREERRORx);
				return false;
			}
		}
	}
	//Retorna true ja que el procï¿œs ha estat satisfactori
	return true;
}

/*
Funciï¿œ que modifica el camp acciï¿œ de les taules auxiliar d'usuaris i SAGA
*/
function iw_users_adminapi_modificaaccio($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Recullem els valors que s'han enviat
	extract($args);
	//Comprovem que els valors han arribat
	if (!isset($valor) || !isset($suid)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	if($taula==1){
		$t = $pntable['iw_users_import'];
		$c = $pntable['iw_users_import_column'];
	}else{
		$t = $pntable['iw_users_aux'];
		$c = $pntable['iw_users_aux_column'];
	}

	//Modifiquem les dades de l'acciï¿œ a les taules
	if(isset($uid)){
		$sql = "UPDATE $t SET $c[accio] = $valor WHERE $c[uid] = $uid";
	}else{
		$sql = "UPDATE $t SET $c[accio] = $valor WHERE $c[suid] = $suid";
	}

	$dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISMODIFICACIOACCIOERROR);
		return false;
	}
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
Funciï¿œ que retorna el nombre de conflictes que hi ha a les taules de SAGA i de la intranet
*/
function iw_users_adminapi_conflictes()
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_aux'];
	$c = &$pntable['iw_users_aux_column'];
	$t1 = $pntable['iw_users_import'];
	$c1 = &$pntable['iw_users_import_column'];
	//Fem la consulta a la base de dades de la Intranet
	$sql = "SELECT COUNT(*) FROM $t WHERE $c[accio]=0 OR $c[accio]=1";
	$registre = $dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISRECOMPTECONFLICTESERROR);
		return false;
	}
	list($intranet) = $registre->fields;
	//Fem la consulta a la base de dades de la SAGA
	$sql = "SELECT COUNT(*) FROM $t1 WHERE $c1[accio]=0 OR $c1[accio]=1";
	$registre=$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISRECOMPTECONFLICTESERROR);
		return false;
	}
	list($saga) = $registre->fields;
	//Fem la consulta dels registres que estan a SAGA i no a la Intranet
	$sql = "SELECT COUNT(*) FROM $t1 WHERE $c1[accio]=0";
	$registre=$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISRECOMPTECONFLICTESERROR);
		return false;
	}
	list($saganointranet) = $registre->fields;
	//Fem la consulta dels registres que estan a la Intranet i no a SAGA
	$sql = "SELECT COUNT(*) FROM $t WHERE $c[accio]=0";
	$registre=$dbconn->Execute($sql);
	if($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISRECOMPTECONFLICTESERROR);
		return false;
	}
	list($intranetnosaga) = $registre->fields;
	//Fem la consulta dels registres que estan a les dues taules perï¿œ que tenen les dades diferents
	$sql = "SELECT COUNT(*) FROM $t WHERE $c[accio]=1";
	$registre=$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISRECOMPTECONFLICTESERROR);
		return false;
	}
	list($diferents) = $registre->fields;
	//Fem la consulta de les ordres que estan pendents d'execuciï¿œ
	$sql = "SELECT COUNT(*) FROM $t WHERE $c[accio]<>0 AND $c[accio]<>1 AND $c[accio]<>-4 AND $c[accio]<>-2 AND $c[accio]<>-1";
	$registre=$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISRECOMPTECONFLICTESERROR);
		return false;
	}
	list($ordres0) = $registre->fields;
	$sql = "SELECT COUNT(*) FROM $t1 WHERE $c1[accio]<>0 AND $c1[accio]<>1 AND $c1[accio]<>-1 AND $c1[accio]<>-7";
	$registre=$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISRECOMPTECONFLICTESERROR);
		return false;
	}
	list($ordres1) = $registre->fields;
	$ordres = $ordres0 + $ordres1;
	$valors = array('intranet' => $intranet,
					'saga' => $saga,
					'saganointranet' => $saganointranet,
					'intranetnosaga' => $intranetnosaga,
					'diferents' => $diferents,
					'ordres' => $ordres);
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return $valors;
}

/*
 Funciï¿œ que retorna una matriu amb la informaciï¿œ dels usuaris a gestionar
 */
function iw_users_adminapi_get_gestio($args)
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	extract($args);
	//Comprovaciï¿œ de seguretat. Si falla retorna una matriu buida
	$registres = array();
	//Connectem amb les bases de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
	$c = $pntable['iw_users_import_column'];
	$t1 = $pntable['iw_users_aux'];
	$c1 = $pntable['iw_users_aux_column'];
	switch($subpas){
		case '1':
			$sql="SELECT $t.$c[suid],$t1.$c1[suid],$t1.$c1[uid],$t.$c[nom],$t.$c[cognom1],$t.$c[cognom2],$t1.$c1[nom],$t1.$c1[cognom1],$t1.$c1[cognom2],$t.$c[login],$t.$c[email] FROM $t,$t1 WHERE $t.$c[accio]=1 AND $t1.$c1[accio]=1 AND $t.$c[id]=$t1.$c1[id]";
			break;
		case '2':
			$sql="SELECT $c[suid],$c[suid],$c[uid],$c[nom],$c[cognom1],$c[cognom2],$c[nom],$c[cognom1],$c[cognom2],$c[login],$c[email],$c[contrasenya],$c[grup] FROM $t WHERE $c[accio]=0";
			break;
		case '3':
			$sql= "SELECT $c1[suid],$c1[suid],$c1[uid],$c1[nom],$c1[cognom1],$c1[cognom2],$c1[nom],$c1[cognom1],$c1[cognom2] FROM $t1 WHERE $c1[accio]=0";
			break;
		case '4':
			$sql="SELECT $c[suid],$c[suid],$c[uid],$c[nom],$c[cognom1],$c[cognom2],$c[nom],$c[cognom1],$c[cognom2],$c[login],$c[email],$c[contrasenya] FROM $t WHERE $c[accio]=-7";
			break;
	}
	$registre = $dbconn->SelectLimit($sql, (int)$numitems, (int)$inici-1);
	//Comprovem que la consulta hagi estat amb ï¿œxit
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _SELECTFAILED);
		return false;
	}
	//Recorrem els registres i els posem dins de la matriu
	for (; !$registre->EOF; $registre->MoveNext()) {
		list($suids,$suidi,$uid,$noms,$cognom1s,$cognom2s,$nomi,$cognom1i,$cognom2i,$login,$email,$contrasenya,$grup) = $registre->fields;
		$registres[] = array('suids' => $suids,
								'suidi' => $suidi,
								'uid' => $uid,
								'noms' => $noms,
								'cognom1s' => $cognom1s,
								'cognom2s' => $cognom2s,
								'nomi' => $nomi,
								'cognom1i' => $cognom1i,
								'cognom2i' => $cognom2i,
								'login' => $login,
								'email' => $email,
								'contrasenya' => $contrasenya,
								'grup' => $grup);
	}
	//Retornem la matriu plena de registres
	return $registres;
}

/*
Funciï¿œ que modifica el camp acciï¿œ de les taules auxiliar d'usuaris i SAGA
*/
function iw_users_adminapi_modificasaga($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Recullem els valors que s'han enviat
	extract($args);
	//Comprovem que els valors han arribat
	if (!isset($valor) || !isset($suid)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
	$c = $pntable['iw_users_import_column'];
	//Modifiquem les dades de l'acciï¿œ a les taules
	$sql = "UPDATE
				$t
			SET
		       	$c[login] ='". $login."',
				$c[email] ='". $email."',
				$c[contrasenya]='".$contrasenya."',
				$c[grup]='".$grup."',
				$c[uid]='".$uid."',
				$c[accio]='".$valor."'
			WHERE
				$c[suid] = $suid";

	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISMODIFICACIOTAULASAGAERROR);
		return false;
	}
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
Funciï¿œ que modifica les dades d'un usuari
*/
function iw_users_adminapi_modifica($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Recullem els valors que s'han enviat
	extract($args);
	//Comprovem que els valors han arribat
	if (!isset($uid) && !isset($id)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	//Cridem la funciï¿œ get de l'API que ens retornarï¿œ les dades de l'usuari
	if($origen=='saga'){
		$link = pnModAPIFunc('iw_users', 'user', 'get',array('id' => $id));
	}else{
		$link = pnModAPIFunc('iw_users', 'user', 'get',array('uid' => $uid));
	}
	//Comprovem que la consulta anterior ha tornat amb resultats
	if ($link == false){
		pnSessionSetVar('errormsg', __('Could not find the user on which do the action.', $dom));
		return false;
	}
	//Comprovacions de seguretat
	if (!pnSecAuthAction(0, 'iw_users::', "::", ACCESS_ADMIN)) {
		pnSessionSetVar('errormsg', __('Not authorized to manage users.', $dom));
		return false;
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users'];
	$c = &$pntable['iw_users_column'];
	//Modifiquem les dades d'un usuari
	if($origen == 'saga'){
		if($login != ""){
			$canvi_login = pnModAPIFunc('iw_users', 'admin', 'modificacontrasenya', array('uid' => $link['uid'],
																							'nomusuari' => $login));
		}		$sql = "UPDATE
				$t
				SET
					$c[nom] = '" . pnVarPrepForStore($nom) . "',
					$c[cognom1] = '" . pnVarPrepForStore($cognom1) . "',
					$c[cognom2] = '" . pnVarPrepForStore($cognom2) . "' 
				WHERE
					$c[id] = '".pnVarPrepForStore($id)."'";
	}else{
		$sql = "UPDATE
				$t
				SET
					$c[nom] = '" . pnVarPrepForStore($nom) . "',
					$c[id] = '".pnVarPrepForStore($id)."',
					$c[cognom1] = '" . pnVarPrepForStore($cognom1) . "',
					$c[cognom2] = '" . pnVarPrepForStore($cognom2) . "'
				WHERE
					$c[uid] = '".(int)pnVarPrepForStore($uid)."'";
	}
	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISMODIFICACIOERROR);
		return false;
	}
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
Funciï¿œ que modifica les dades de connexiï¿œ d'un usuari
*/
function iw_users_adminapi_modificacontrasenya($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Recullim els valors que s'han enviat
	extract($args);
	//Comprovem que els valors han arribat
	if (!isset($userId)) {
		return pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Cridem la funciï¿œ get de l'API que ens retornarï¿œ les dades de l'anotaciï¿œ
	$link = pnModAPIFunc('iw_users', 'admin', 'get_dades', array('suid' => $userId));
	//Comprovem que la consulta anterior ha tornat amb resultats
	if ($link == false) {
		return pnSessionSetVar('errormsg', __('Could not find the user on which do the action.', $dom));
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = pnConfigGetVar('prefix').'_users';
	//Modifiquem les dades d'un usuari
	if($contrasenya != ''){
		$method = pnModGetVar('Users', 'hash_method', 'sha1');
		$methodNumberArray = pnModAPIFunc('Users','user','gethashmethods', array('reverse' => false));
		$methodNumber = $methodNumberArray[$method];
		$sql = "UPDATE
				$t
			SET
	       		$t.pn_pass = '" . pnVarPrepForStore($contrasenya) . "',
				$t.pn_uname = '". pnVarPrepForStore($nomusuari) . "',
				$t.pn_email = '". pnVarPrepForStore($email) . "',
				$t.pn_hash_method = '". pnVarPrepForStore($methodNumber) . "'
			WHERE
				$t.pn_uid = '".(int)pnVarPrepForStore($userId)."'";
	}else{
		$sql = "UPDATE
				$t
			SET
				$t.pn_uname = '". pnVarPrepForStore($nomusuari) . "',
				$t.pn_email = '". pnVarPrepForStore($email) . "'
			WHERE
				$t.pn_uid = '".(int)pnVarPrepForStore($userId)."'";
	}
	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _USUARISMODIFICACIOERROR);
		return false;
	}
 	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
 Funciï¿œ que esborra un usuari/ï¿œria de la  base de dades
*/
function iw_users_adminapi_esborra_registre($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Recollim els parï¿œmetres enviats
	extract($args);
	//Comprovem que el parï¿œmetre identitat hagi arribat
	if (!isset($suid)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	//Connectem a la base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = pnConfigGetVar('prefix').'_users';
	//Esborrem el registre
	$sql = "DELETE FROM
				$t
			WHERE
				$t.pn_uid = '".(int)pnVarPrepForStore($uid)."'";
	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _USUARISESBORRAMENTERROR);
		return false;
	}
	if($taula==1){
		$t = $pntable['iw_users_import'];
		$c = $pntable['iw_users_import_column'];
	}else{
		$t = $pntable['iw_users_aux'];
		$c = $pntable['iw_users_aux_column'];
	}
	//Esborrem el registre
	$sql = "DELETE FROM
				$t
			WHERE
				$c[suid] = '".(int)pnVarPrepForStore($suid)."'";
	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _USUARISESBORRAMENTERROR);
		return false;
	}
 	//Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
	return true;
}

/*
Funciï¿œ que fa reset dels canvis fets
*/
function iw_users_adminapi_fesreset($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Recullem els valors que s'han enviat
	extract($args);
	//Comprovem que els valors han arribat
	if (!isset($quins)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
	$c = $pntable['iw_users_import_column'];
	$t1 = $pntable['iw_users_aux'];
	$c1 = $pntable['iw_users_aux_column'];
	switch($quins){
		case 1:			$sql0 = "UPDATE
					$t
				SET
					$c[accio] = 1
				WHERE
					$c[accio] = -2 OR $c[accio]= 2";
			$dbconn->Execute($sql0);
			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg',_USUARISMODIFICACIOACCIOERROR);
				return false;
			}
			$sql = "UPDATE
					$t1
				SET
					$c1[accio] = 1
				WHERE
					$c1[accio] = -2 OR $c1[accio]= 2";
			break;
		case 2:
			$sql0 = "UPDATE
					$t
				SET
					$c[accio] = 0
				WHERE
					$c[accio] = 3 OR $c[accio]=-3 OR $c[accio]=4";
			$dbconn->Execute($sql0);
			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg',_USUARISMODIFICACIOACCIOERROR);
				return false;
			}
			$sql = "UPDATE
					$t1
				SET
					$c1[accio] = 0
				WHERE $c1[accio]=-4";
			break;
		case 3:
			$sql = "UPDATE
					$t1
				SET
					$c1[accio] = 0
				WHERE $c1[accio] = 5 OR $c1[accio]=-5";
			break;
	}
	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISMODIFICACIOACCIOERROR);
		return false;	}
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
Funciï¿œ que fa reset a una ordre
*/
function iw_users_adminapi_fesresetuna($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Recullem els valors que s'han enviat
	extract($args);
	//Comprovem que els valors han arribat
	if (!isset($quins) || !isset($taula)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	//Agafem la informaciï¿œ de la dada passada
	$registre = pnModAPIFunc('iw_users', 'admin', 'get_dades', array('suid' => $quins,
																		'taula' => $taula));
	if ($registre == false){
		pnSessionSetVar('statusmsg', __('Could not find the user on which do the action.', $dom));
		return false;
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
   	$c = $pntable['iw_users_import_column'];
	$t1 = $pntable['iw_users_aux'];
   	$c1 = $pntable['iw_users_aux_column'];
	switch($registre['accio']){
		case 2: //Fa reset als registres que estaven a les dues taules perï¿œ que tenien diferï¿œncies en les seves dades
			$sql = "UPDATE
					$t,$t1
				SET
					$c[accio] = 1, $c1[accio] = 1
				WHERE
					$c[id]=".$registre['id']." and $c1[id]=".$registre['id'];
			break;
		case -2: //Fa reset als registres que estaven a les dues taules perï¿œ que tenien diferï¿œncies en les seves dades
			$sql = "UPDATE
					$t,$t1
				SET
					$c[accio] = 1, $c1[accio] = 1
				WHERE $c[id]=".$registre['id']." and $c1[id]=".$registre['id'];
			break;
		case 3:
			$sql = "UPDATE
					$t
				SET
					$c[accio] = 0
				WHERE
					$c[suid] = ".$registre['suid'];
			break;
		case -3:
			$sql = "UPDATE
					$t
				SET
					$c[accio] = 0
				WHERE
					$c[suid] = ".$registre['suid'];
			break;
		case 4:			$sql = "UPDATE
					$t
				SET
					$c[accio] = 0
				WHERE
					$c[suid] = ".$registre['suid'];
			break;
		case 5:
			$sql = "UPDATE
					$t1
				SET
					$c1[accio] = 0
				WHERE
					$c1[suid] = ".$registre['suid'];
			break;
		case -5:
			$sql = "UPDATE
					$t1
				SET
					$c1[accio] = 0
				WHERE
					$c1[suid] = ".$registre['suid'];
			break;
		default:
	    		return true;
			break;
	}
	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISMODIFICACIOACCIOERROR);
		return false;
	}
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
Funciï¿œ que retorna la informaciï¿œ d'un usuari
*/
function iw_users_adminapi_get_dades($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	extract($args);
	//Comprovem que el parï¿œmetre hagi arribat correctament
	if (!isset($suid)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	$registres=array();
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	if($taula == 1){
		$t = $pntable['iw_users_import'];
		$c = $pntable['iw_users_import_column'];		//Mira la informaciï¿œ del dia demanat
		$sql = "SELECT
				$c[id], $c[suid], $c[uid], $c[nom], $c[cognom1], $c[cognom2], $c[accio], $c[login], $c[email], $c[contrasenya], $c[grup]
			FROM
				$t
			WHERE
				$c[suid]= '".(int)pnVarPrepForStore($suid)."'";	}else{
		$t = $pntable['iw_users_aux'];
		$c = $pntable['iw_users_aux_column'];
		//Mira la informaciï¿œ del dia demanat
		$sql = "SELECT
				$c[id], $c[suid], $c[uid], $c[nom], $c[cognom1], $c[cognom2], $c[accio]
			FROM
				$t
			WHERE
				$c[suid]= '".(int)pnVarPrepForStore($suid)."'";
	}
	$registre =& $dbconn->Execute($sql);
	//Comprovem que la consulta hagi estat exitosa
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _SELECTFAILED);
		return false;
	}
	list($id,$suid,$uid,$nom,$cognom1,$cognom2,$accio,$login, $email, $contrasenya,$grup) = $registre->fields;
	//Comprovaciï¿œ de seguretat
	$registres = array('id' => $id,
						'suid' => $suid,
						'uid' => $uid,
						'nom' => $nom,
						'cognom1' => $cognom1,
						'cognom2' => $cognom2,
						'accio' => $accio,
						'login' => $login,
						'email' => $email,
						'contrasenya' => $contrasenya,
						'grup' => $grup);

	//Retornem la matriu plena de registres
	return $registres;
}

/*
Funciï¿œ que fa reset a una ordre
*/

function iw_users_adminapi_capaccio($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Recullem els valors que s'han enviat
	extract($args);
	//Comprovem que els valors han arribat
	if (!isset($quins)) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
	$c = $pntable['iw_users_import_column'];
	$t1 = $pntable['iw_users_aux'];	$c1 = $pntable['iw_users_aux_column'];
	switch($quins){
		case 1: //Fa reset als registres que estaven a les dues taules perï¿œ que tenien diferï¿œncies en les seves dades
			$sql = "UPDATE
					$t
				SET
					$c[accio] = -2
				WHERE
					$c[accio]=1";
			$dbconn->Execute($sql);
			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg',_USUARISMODIFICACIOACCIOERROR);
				return false;
			}
			$sql = "UPDATE
					$t1
				SET
					$c1[accio] = -2
				WHERE
					$c1[accio]=1";
			break;
		case 2: //Fa reset als registres que estaven a les dues taules perï¿œ que tenien diferï¿œncies en les seves dades
			$sql = "UPDATE
					$t
				SET
					$c[accio] = -3
				WHERE
					$c[accio]=0";
			break;
		case 3: //Fa reset als registres que estaven a les dues taules perï¿œ que tenien diferï¿œncies en les seves dades
			$sql = "UPDATE
					$t1
				SET
					$c1[accio] = -5
				WHERE
					$c1[accio]=0";
			break;
		default:
			return true;
			break;
	}
    $dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg',_USUARISMODIFICACIOACCIOERROR);
		return false;
	}
	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}

/*
Funcio que buida les taules auxiliars de SAGA i d'usuaris
*/
function iw_users_adminapi_buida_taules($args)
{
	//Agafem els arguments enviats
	extract($args);
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Connectem amb la base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
	//esborrem les dades
	$sql = "TRUNCATE TABLE $t";
 	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _USUARISBUIDATTAULAERROR);
		return false;
	}
	$t = $pntable['iw_users_aux'];
	//esborrem les dades
	$sql = "TRUNCATE TABLE $t";
	$dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _USUARISBUIDATTAULAERROR);
		return false;
	}
	//Retorna el id del nou registre que s'acaba d'introduir
	return true;
}

/*
 Funciï¿œ que retorna una matriu amb la informaciï¿œ de les ordres a portar a termes
 */
function iw_users_adminapi_get_ordres($args)
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	extract($args);
	//Comprovaciï¿œ de seguretat. Si falla retorna una matriu buida
	$registres = array();
	//Connectem amb les bases de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['iw_users_import'];
	$c = $pntable['iw_users_import_column'];
	$t1 = $pntable['iw_users_aux'];
	$c1 = $pntable['iw_users_aux_column'];
	$sql = "SELECT
			$c[suid], $c[uid], $c[nom], $c[cognom1], $c[cognom2], $c[accio], $c[grup], $c[login]
		FROM
			$t
		WHERE
			$c[accio]<>0 AND $c[accio]<>1 AND $c[accio]<>-7 AND $c[accio]<>-1";

	$registre1 = $dbconn->SelectLimit($sql, (int)$numitems, (int)$inici-1);
	//Comprovem que la consulta hagi estat amb ï¿œxit
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _SELECTFAILED);
		return false;
	}
	//Recorrem els registres i els posem dins de la matriu
	for(; !$registre1->EOF; $registre1->MoveNext()) {
		list($suids,$uids,$noms,$cognom1s,$cognom2s,$accios,$grup,$login) = $registre1->fields;
		$registres[] = array('suids' => $suids,
								'uids' => $uids,
								'noms' => $noms,
								'cognom1s' => $cognom1s,
								'cognom2s' => $cognom2s,
								'accios' => $accios,
								'grup' => $grup,
								'login' => $login,
								'suidi' => '',
								'uidi' => '',
								'nomi' => '',
								'cognom1i' => '',
								'cognom2i' => '',
								'accioi' => '');
	}
	$sql = "SELECT
				$c1[suid], $c1[uid], $c1[nom], $c1[cognom1], $c1[cognom2], $c1[accio]
			FROM
				$t1
			WHERE
				$c1[accio]<>0 AND $c1[accio]<>1 AND $c1[accio]<>-4 AND $c1[accio]<>-2 AND $c1[accio]<>-1";
	$registre2 = $dbconn->SelectLimit($sql, (int)$numitems, (int)$inici-1);
	//Comprovem que la consulta hagi estat amb ï¿œxit
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _SELECTFAILED);
		return false;
	}
	//Recorrem els registres i els posem dins de la matriu
	for (; !$registre2->EOF; $registre2->MoveNext()) {
		list($suidi,$uidi,$nomi,$cognom1i,$cognom2i,$accioi) = $registre2->fields;
		$registres[] = array('suids' => '',
								'uids' => '',
								'noms' => '',
								'cognom1s' => '',
								'cognom2s' => '',
								'accios' => '',
								'grup' => '',
								'suidi' => $suidi,
								'uidi' => $uidi,
								'nomi' => $nomi,
								'cognom1i' => $cognom1i,
								'cognom2i' => $cognom2i,
								'accioi' => $accioi);
	}
	//Retornem la matriu plena de registres
	return $registres;
}