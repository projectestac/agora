<?php
/*
Funciï¿œ que crea un nou grup
*/
function iw_groups_adminapi_create($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	//Agafem els arguments enviats
	extract($args);

	// Argument opcional
	if (!isset($descriu)) {$descriu = '';}

	//Comprova que el nom grup hagi arribat
	if ((!isset($nom_grup))) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_groups::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//Connectem amb la base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();

	$t = pnConfigGetVar('prefix').'_groups';

	//Agafem el id de la taula
	$nouId = $dbconn -> GenId($t);

	//Inserim el registre a la base de dades
	$sql = "INSERT INTO $t (pn_gid, pn_name, pn_description) VALUES ($nouId,'" . pnVarPrepForStore($nom_grup) . "','".pnVarPrepForStore($descriu)."')";
	$dbconn -> Execute($sql);

	if ($dbconn -> ErrorNo() != 0) {
		return pnSessionSetVar('errormsg', __('An error has occurred while creating the group', $dom));
	}

	//Agafa el valor Id del registre que s'acaba d'introduir
	$idgrup = $dbconn -> PO_Insert_ID($t);
	
	//Retorna el id del nou registre que s'acaba d'introduir
	return $idgrup;
}

/*
 Funciï¿œ que esborra un grup, les dades del mateix i buida els seus membres
*/
function iw_groups_adminapi_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	//Recollim els parï¿œmetres enviats
	extract($args);

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_groups::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//Comprovem que el parï¿œmetre identitat hagi arribat
	if (!isset($gid)) {
		return pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Cridem la funciï¿œ get que retorna les dades
	$link = pnModAPIFunc('iw_groups', 'user', 'get', array('gid' => $gid));
	//Comprovem que el registre efectivament existeix i, per tant, es podrï¿œ esborrar
	if ($link == false) {
		return pnSessionSetVar('statusmsg', _GRUPSESPAINOVALID);
	}

	//Connectem a la base de dades
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();

	//Esborrem el registre de la taula de grups
	$t = pnConfigGetVar('prefix').'_groups';
	$sql = "DELETE FROM $t WHERE pn_gid = '".(int)pnVarPrepForStore($gid)."'";
	$dbconn -> Execute($sql);
	if ($dbconn -> ErrorNo() != 0) {
		pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
	}

	//Esborrem els membres del grup
	$t = pnConfigGetVar('prefix').'_group_membership';
	$sql = "DELETE FROM $t WHERE pn_gid = '".(int)pnVarPrepForStore($gid)."'";
	$dbconn -> Execute($sql);
	if ($dbconn -> ErrorNo() != 0) {
		pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
	}

	//Esborrem les dades informatives del grup
	$t = $pntable['iw_groups_def'];
	$c = &$pntable['iw_groups_def_column'];
	$sql = "DELETE FROM $t WHERE $c[idgrup] = '".(int)pnVarPrepForStore($gid)."'";
	$dbconn -> Execute($sql);
   	if ($dbconn -> ErrorNo() != 0) {
		pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
	}

	//Tanquem la BD
	$dbconn -> Close();
	
	//Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
	return true;
}

/*
Funciï¿œ que modifica un grup de la base de dades
*/
function iw_groups_adminapi_update($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	//Recullem els valors que s'han enviat
	extract($args);

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_groups::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//Comprovem que els valors han arribat
	if ((!isset($gid)) || (!isset($nom_grup) || $nom_grup == '')) {
		return pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	
	//Cridem la funciï¿œ get de l'API que ens retornarï¿œ les dades del grup
	$link = pnModAPIFunc('iw_groups', 'user', 'get', array('gid' => $gid));
	//Comprovem que la consulta anterior ha tornat amb resultats
	if ($link == false) {
		return pnSessionSetVar('errormsg', __('The group where the action had to be carried out hasn\'t been found', $dom));
	}
    
	//Establim connexiï¿œ amb la base de dades
	$dbconn =& pnDBGetConn(true);

	$t = pnConfigGetVar('prefix').'_groups';

	//Fem la consulta a la base de dades de la modificaciï¿œ de les dades
	$sql = "UPDATE $t
		SET pn_name='".pnVarPrepForStore($nom_grup)."',
			pn_description='".pnVarPrepForStore($descriu)."'
		WHERE pn_gid = '".(int)pnVarPrepForStore($gid)."'";

	$dbconn -> Execute($sql);
	if ($dbconn -> ErrorNo() != 0) {
		return pnSessionSetVar('errormsg',__('The modification of the group has failed', $dom));
	}

	//Informem que el procï¿œs s'ha acabat amb ï¿œxit
	return true;
}



























function iw_groups_adminapi_nombre($args)
{
    $dom = ZLanguage::getModuleDomain('iw_groups');
	extract($args);
    //Comprovaciï¿œ de seguretat. Si falla retorna una variable buida
    if (!pnSecAuthAction(0, 'iw_groups::', '::', ACCESS_ADMIN)) {
        return $registres;
    }
    //Connectem amb la BD
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $t = $pntable['grups_membres'];
	$c = &$pntable['grups_membres_column'];
	
    $sql = "SELECT count(1) FROM $t where $c[detic_sgid]=$sgid";
	$registre = $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while trying to select records in the database. Contact with the intranet administrator', $dom));
        return false;
    }

    list($nombre) = $registre->fields;
    
	//Tanquem la BD
    $registre->Close();
    
    //Retornem la matriu plena de registres
    return $nombre;
}

/*
Funciï¿œ que retorna els tipus de subgrups en un MultiSelect
*/

function iw_groups_adminapi_tipus_MS($args)
{
    $dom = ZLanguage::getModuleDomain('iw_groups');
	//Comprovaciï¿œ de seguretat. Si falla retorna una variable buida
    if (!pnSecAuthAction(0, 'iw_groups::', '::', ACCESS_ADMIN)) {
        return $registres;
    }

	extract($args);
	
    //Connectem amb la BD
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
    
	
    $t = $pntable['grups_tipus'];
	$c = &$pntable['grups_tipus_column'];
	
    $sql = "SELECT $c[tgid],$c[nom_tipus] FROM $t order by $c[nom_tipus]";
	$registre = $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while trying to select records in the database. Contact with the intranet administrator', $dom));
        return false;
    }

    $registres[] = array('id'=>'0','name' => '');

    //Recorrem els registres i els posem dins de la matriu
    for (; !$registre->EOF; $registre->MoveNext()) {
        list($tgid,$nom_tipus) = $registre->fields;
		if($tipus==$tgid){
			$selected=1;
		}else{
			$selected=0;		
		}

        //Comprovaciï¿œ de seguretat
        if (pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
            $registres[] = array('id'=>$tgid,'name' => $nom_tipus,'selected'=>$selected);
        }
    }
    
	//Tanquem la BD
    $registre->Close();
    
    //Retornem la matriu plena de registres
    return $registres;
}


/*
 Funciï¿œ que esborra els membres seleccionats d'un grup
*/
function iw_groups_adminapi_esborra_membres($args)
{

    $dom = ZLanguage::getModuleDomain('iw_groups');
	list($uid,$gid,$uid1,$gid1) = pnVarCleanFromInput('uid','gid','gid1','uid1');

    //Recollim els parï¿œmetres enviats
    extract($args);

    //Comprovem que el parï¿œmetre identitat hagi arribat
    if (!isset($gid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
        pnSessionSetVar('errormsg', __('You aren\'t allowed to administer the groups', $dom));
        return false;
    }

    //Connectem a la base de dades
    list($dbconn) = pnDBGetConn();
    $pntable =& pnDBGetTables();

	$t = pnConfigGetVar('prefix').'_group_membership';

    $t1 = $pntable['grups_membres'];
	$c1 = &$pntable['grups_membres_column'];

		
    //Esborrem el registre de la taula de membres dels grups
	foreach ($uid as $id){
	    $sql = "DELETE FROM $t WHERE pn_gid = '".(int)pnVarPrepForStore($gid)."' and pn_uid='".(int)pnVarPrepForStore($id)."'";
    	$dbconn->Execute($sql);
	    if ($dbconn->ErrorNo() != 0) {
    	    pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
        	return false;
	    }

	}

    //Repetim el procï¿œs per al grup de la dreta
	foreach ($uid1 as $id){
	    $sql = "DELETE FROM $t WHERE pn_gid = '".(int)pnVarPrepForStore($gid1)."' and pn_uid='".(int)pnVarPrepForStore($id)."'";
    	$dbconn->Execute($sql);
	    if ($dbconn->ErrorNo() != 0) {
    	    pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
        	return false;
	    }
	}

	//Tanquem la BD
    $dbconn->Close();
		
    //Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
    return true;
}

/*
 Funciï¿œ que copia els usuari d'un grup en un altre
*/
function iw_groups_adminapi_afegeix_membres($args)
{

    $dom = ZLanguage::getModuleDomain('iw_groups');
	list($uid,$gid) = pnVarCleanFromInput('uid','gid');

    //Recollim els parï¿œmetres enviats
    extract($args);

    //Comprovem que el parï¿œmetre identitat hagi arribat
    if (!isset($gid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
        pnSessionSetVar('errormsg', __('You aren\'t allowed to administer the groups', $dom));
        return false;
    }

    //Connectem a la base de dades
    list($dbconn) = pnDBGetConn();

	$t = pnConfigGetVar('prefix').'_group_membership';
	
    //Esborrem el registre de la taula de membres dels grups
	foreach ($uid as $id){
		//Comprovem si l'usuari ï¿œs o no membre del grup. En cas de ja ser-ho no el tornarem a posar
		$es_membre=pnModAPIFunc('iw_groups','admin','es_membre',array('gid'=>$gid,'uid'=>$id));
		if(!$es_membre){
		    $sql = "INSERT INTO $t (pn_gid,pn_uid) VALUES ('".(int)pnVarPrepForStore($gid)."','" . $id . "')";
		   	$dbconn->Execute($sql);
	    	if ($dbconn->ErrorNo() != 0) {
    	    	pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
	        	return false;
		    }
		}
	}
	
	//Tanquem la BD
    $dbconn->Close();
	
    //Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
    return true;
}


/*
Funciï¿œ que comprova si un usuari ï¿œs membre o no d'un grup i retorna true o false
*/
function iw_groups_adminapi_es_membre($args){

    $dom = ZLanguage::getModuleDomain('iw_groups');
	list($uid,$gid) = pnVarCleanFromInput('uid','gid');

    //Recollim els parï¿œmetres enviats
    extract($args);

    //Comprovem que el parï¿œmetre identitat hagi arribat
    if (!isset($gid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
        pnSessionSetVar('errormsg', __('You aren\'t allowed to administer the groups', $dom));
        return false;
    }

    //Connectem a la base de dades
    list($dbconn) = pnDBGetConn();

	$t = pnConfigGetVar('prefix').'_group_membership';

    $sql = "SELECT COUNT(1) FROM $t WHERE pn_gid=".(int)pnVarPrepForStore($gid)." and pn_uid=" .(int)pnVarPrepForStore($uid)." and pn_gid<>0";
	$registre = $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while trying to select records in the database. Contact with the intranet administrator', $dom));
        return false;
    }

    list($nombre) = $registre->fields;
    
	//Tanquem la BD
    $registre->Close();

	if($nombre>0){return true;}else{return false;}	
}

/*
 Funciï¿œ que mou els membres d'un grup a un altre
*/
function iw_groups_adminapi_mou_membres($args)
{
    $dom = ZLanguage::getModuleDomain('iw_groups');
	list($uid,$gid,$gid1) = pnVarCleanFromInput('uid','gid','gid1');

    //Recollim els parï¿œmetres enviats
    extract($args);

    //Comprovem que el parï¿œmetre identitat hagi arribat
    if ($gid==0||$gid1==0) {
        pnSessionSetVar('errormsg', __('Incorrect action during the group change', $dom));
        return false;
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
        pnSessionSetVar('errormsg', __('You aren\'t allowed to administer the groups', $dom));
        return false;
    }

    //Connectem a la base de dades
    list($dbconn) = pnDBGetConn();
    $pntable =& pnDBGetTables();

    //Esborrem el registre de la taula de membres dels grups
	foreach ($uid as $id){
		//Comprovem si l'usuari ï¿œs o no membre del grup. En cas de ja ser-ho no el tornarem a posar
		$es_membre = pnModAPIFunc('iw_groups', 'admin', 'es_membre', array('gid' => $gid1,
											'uid' => $id));
		$t = pnConfigGetVar('prefix').'_group_membership';
		if(!$es_membre){
			$sql = "UPDATE $t SET pn_gid=$gid1 where pn_uid=$id and pn_gid=$gid";
			$dbconn -> Execute($sql);
			if ($dbconn -> ErrorNo() != 0) {
				return pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
			}
		} else {
			$sql = "DELETE FROM $t WHERE pn_gid = '".(int)pnVarPrepForStore($gid)."' and pn_uid='".(int)pnVarPrepForStore($id)."'";
			$dbconn->Execute($sql);
			if ($dbconn->ErrorNo() != 0) {
				return pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
	    		}
		}
	}
	
	//Tanquem la BD
	$dbconn->Close();
	
	//Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
	return true;
}


/*
Funciï¿œ que recull el nom d'un tipus
*/
function iw_groups_adminapi_nom_tipus($args){
    $dom = ZLanguage::getModuleDomain('iw_groups');
	list($tgid) = pnVarCleanFromInput('tgid');

    //Agafem els arguments enviats
    extract($args);

    list($dbconn) = pnDBGetConn();
    $pntable =& pnDBGetTables();

	//Enviem les dades informatives del grup a la base de dades
    $t = $pntable['grups_tipus'];
	$c = &$pntable['grups_tipus_column'];

    //Comprovem que el parï¿œmetre identitat hagi arribat
    if (!isset($tgid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
        pnSessionSetVar('errormsg', __('You aren\'t allowed to administer the groups', $dom));
        return false;
    }

    $sql = "SELECT $c[nom_tipus] FROM $t WHERE $c[tgid]=".(int)pnVarPrepForStore($tgid);
	$registre = $dbconn->Execute($sql);
	
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while trying to select records in the database. Contact with the intranet administrator', $dom));
        return false;
    }

    list($nom_tipus) = $registre->fields;
    
	//Tanquem la BD
    $registre->Close();

	return $nom_tipus;
}

/*
Funciï¿œ que crea un nou subgrup
*/
 
function iw_groups_adminapi_createsubgrup($args)
{
    $dom = ZLanguage::getModuleDomain('iw_groups');
	//Agafem els arguments enviats
    extract($args);

    // Argument opcional
	if (!isset($descriu)) {$descriu = '';}

    //Comprova que el nom grup hagi arribat
    if ((!isset($nom_subgrup))) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
        pnSessionSetVar('errormsg', __('You aren\'t allowed to administer the groups', $dom));
        return false;
    }

    //Connectem amb la base de dades
    list($dbconn) = pnDBGetConn();
    $pntable =& pnDBGetTables();

    $t = $pntable['iw_groups_def'];
	$c = &$pntable['iw_groups_def_column'];
	
    //Agafem el id de la taula
    $nouId = $dbconn->GenId($t);

    //Inserim el registre a la base de dades
    $sql = "INSERT INTO $t ($c[gid],$c[subgrup],$c[descriu],$c[tipus],$c[idmare]) VALUES ($nouId,'" . pnVarPrepForStore($nom_subgrup) . "','".pnVarPrepForStore($descriu)."','".pnVarPrepForStore($tipus)."','".pnVarPrepForStore($gid)."')";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while creating the subgroup', $dom));
        return false;
    }

    //Agafa el valor Id del registre que s'acaba d'introduir
    $idsubgrup = $dbconn->PO_Insert_ID($t);

    //Retorna el id del nou registre que s'acaba d'introduir
    return $idsubgrup;
}

/*
 Funciï¿œ que esborra un grup, les dades del mateix i buida els seus membres
*/
function iw_groups_adminapi_deletes($args)
{
    $dom = ZLanguage::getModuleDomain('iw_groups');
	//Recollim els parï¿œmetres enviats
    extract($args);

    //Comprovem que el parï¿œmetre identitat hagi arribat
    if (!isset($sgid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Carreguem l'API de l'usuari per carregar les dades del registre
    if (!pnModAPILoad('iw_groups', 'user')) {
        pnSessionSetVar('errormsg',__('Error! Could not load module.', $dom));
        return false;
    }

    //Cridem la funciï¿œ get que retorna les dades
    $link = pnModAPIFunc('iw_groups','user','get_def',array('gid' => $sgid));
                         
    //Comprovem que el registre efectivament existeix i, per tant, es podrï¿œ esborrar
    if ($link == false) {
        pnSessionSetVar('statusmsg', _GRUPSESPAINOVALID);
        return false;
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_groups::', "::", ACCESS_ADMIN)) {
        pnSessionSetVar('errormsg', __('You aren\'t allowed to administer the groups', $dom));
        return false;
    }

    //Connectem a la base de dades
    list($dbconn) = pnDBGetConn();
    $pntable =& pnDBGetTables();

    //Esborrem el registre de la taula de grups
    $t = $pntable['iw_groups_def'];
	$c = &$pntable['iw_groups_def_column'];

    $t1 = $pntable['grups_membres'];
	$c1 = &$pntable['grups_membres_column'];	
    
	//Esborrem el subgrup
    $sql = "DELETE FROM $t WHERE $c[gid] = '".(int)pnVarPrepForStore($sgid)."'";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
        return false;
    }
		
	//Esborrem els membres del subgrup
    $sql = "DELETE FROM $t1 WHERE $c1[detic_sgid]='".(int)pnVarPrepForStore($sgid)."'";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while trying to delete a record from the data base', $dom));
        return false;
    }

    //Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
    return true;
}
