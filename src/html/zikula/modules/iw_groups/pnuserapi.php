<?php
/*
Funciï¿œ que recull tots els registres de la BD
*/
function iw_groups_userapi_getall($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	extract($args);
    
	//Comprovaciï¿œ de seguretat. Si falla retorna una matriu buida
	$registres = array();

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_groups::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//Connectem amb la BD
	$dbconn =& pnDBGetConn(true);

	$t = pnConfigGetVar('prefix').'_groups';

	//Fem la consulta que recollirï¿œ els registres ordenats pel nom del grup
	$sql = "SELECT pn_gid, pn_name, pn_description FROM $t ORDER BY pn_name";
            
	$registre = $dbconn -> Execute($sql);

	if ($dbconn->ErrorNo() != 0) {
		return pnSessionSetVar('errormsg', __('An error has occurred while trying to select records in the database. Contact with the intranet administrator', $dom));
	}

	//Recorrem els registres i els posem dins de la matriu
	for (; !$registre -> EOF; $registre -> MoveNext()) {
		list($pn_gid, $pn_name, $pn_description) = $registre->fields;
		//Comprovaciï¿œ de seguretat
        	$registres[] = array('pn_gid' => $pn_gid,
					'pn_name' => $pn_name,
					'pn_description' => $pn_description);
	}

	//Tanquem la BD
	$registre -> Close();
    
	//Retornem la matriu plena de registres
	return $registres;
}

/*
Funciï¿œ que recull la informaciï¿œ especifica d'un registre
*/
function iw_groups_userapi_get($args)
{
    $dom = ZLanguage::getModuleDomain('iw_groups');
	extract($args);

    if (!isset($gid) || !is_numeric($gid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);

    $t = pnConfigGetVar('prefix').'_groups';

    $sql = "SELECT pn_gid, pn_name, pn_description FROM $t WHERE pn_gid = '".(int)pnVarPrepForStore($gid)."'";
    $registre =& $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while trying to select records in the database. Contact with the intranet administrator', $dom));
        return false;
    }

    list($pn_gid, $pn_name, $pn_description) = $registre->fields;
    $registre->Close();

    if (!pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
        return false;
    }
    $registre = array('gid' => $pn_gid,
			'nom_grup' => $pn_name,
			'description' => $pn_description);

    return $registre;
}

/*
Funciï¿œ que retorna els usuaris que no estan a cap grup
*/
function iw_groups_userapi_get_sense_grup()
{
    $dom = ZLanguage::getModuleDomain('iw_groups');
	$users = DBUtil::selectObjectArray('users', '', '', -1, -1, 'uid');
    // Check for a DB error
    if ($users === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }
	// get all users that are in any group
    $allUsersWithGroup = DBUtil::selectObjectArray('group_membership', '', '', -1, -1, 'uid');
    if ($allUsersWithGroup === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }
	$diff = array_diff_key($users,$allUsersWithGroup);
	$usersList = '$$';
	$registres = array();
	if(count($diff) > 0){
		foreach($diff as $user){
			$usersList .= $user['uid'].'$$';
		}
		//get all users information
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv,
																			'list' => $usersList,
																			'info' => 'ccn'));
		foreach($usersInfo as $key => $value){
			$registres[] = array('name' => $value,
									'id' => $key);
		}
	}
    return $registres;
}
