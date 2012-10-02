<?php
/**
 * @link http://www.zikula.com
 * @version $Id: pnadminapi.php 22139 2008-08-01 17:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @project intraweb (intraweb@xtec.cat)
 * @subpackage iw_TimeFrames
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @author Josep Ferrï¿œndiz Farrï¿œ (jferran6@xtec.cat)
 */

// --------------------------------------------------------------------------
// Propï¿œsit del fitxer:
//      Funcions d'administraciï¿œ del mï¿œdul iw_TimeFrames
// --------------------------------------------------------------------------

/*
Funciï¿œ que crea un nou marc horari
*/
 
function iw_timeFrames_adminapi_create($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$nom_marc = FormUtil::getPassedValue('nom_marc', isset($args['nom_marc']) ? $args['nom_marc'] : null, 'GET');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');

    //Argument opcional
    if (!isset($descriu)) {
        $descriu = '';
    }

    //Comprova que el nom del marc horari hagi arribat
    if ((!isset($nom_marc))) {
        return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_TimeFrames::', "$nom_marc::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
    }
	$item = array('nom_marc' => $nom_marc,
				  'descriu' => $descriu);

	if (!DBUtil::insertObject($item, 'iw_timeframes_def', 'mdid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom)." nom_marc: ".$nom_marc);
	}

	// Return the id of the newly created item to the calling process
	return $item['mdid'];
}

/*
Funciï¿œ que modifica la definiciï¿œ d'un marc horari
*/
function iw_timeFrames_adminapi_update($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$nom_marc = FormUtil::getPassedValue('nom_marc', isset($args['nom_marc']) ? $args['nom_marc'] : null, 'GET');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

    //Comprovem que els valors han arribat
    if ((!isset($mdid)) || (!isset($nom_marc))) {
        return LogUtil::registerError ( __('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    //Carregem l'API de l'usuari per poder consultar les dades de l'espai que volem modificar
    if (!pnModAPILoad('iw_TimeFrames', 'user')) {
       return LogUtil::registerError ( __('Error! Could not load module.', $dom));
    }

    //Cridem la funciï¿œ get de l'API que ens retornarï¿œ les dades de l'espai
    $registre = pnModAPIFunc('iw_TimeFrames','user','get',array('mdid' => $mdid));

    //Comprovem que la consulta anterior ha tornat amb resultats
    if (empty($registre)) {
        return LogUtil::registerError (__('Can not find the timeFrame over which do the action.', $dom));
    }
    
    //Comprovacions de seguretat
    if (!pnSecAuthAction(0, 'iw_TimeFrames::', "$registre[nom_marc]::$mdid", ACCESS_EDIT)) {
        return LogUtil::registerError (__('Not authorized to manage timeFrames.', $dom));
    }

	$where="mdid=".$mdid;
	$item = array('nom_marc'=> $nom_marc, 
				  'descriu'=> $descriu);
		
	if (!DBUtil::updateObject($item, 'iw_timeframes_def', $where)){
		 return LogUtil::registerError (__('The modify of the frame time failed.', $dom). "-".$item['nom_marc']);
	}
    //Informem que el procï¿œs s'ha acabat amb ï¿œxit
    return true;
}

/*
Funciï¿œ que esborra un marc horari
*/
function iw_timeFrames_adminapi_delete($args){
    $dom=ZLanguage::getModuleDomain('iw_timeFrames');
	//Recollim els parï¿œmetres enviats
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
	$mode = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');

    //Comprovem que el parï¿œmetre id hagi arribat
    if (!isset($mdid)) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    //Carreguem l'API de l'usuari per carregar les dades del registre
    if (!pnModAPILoad('iw_TimeFrames', 'user')) {
        return LogUtil::registerError (__('Error! Could not load module.', $dom));
    }

    //Cridem la funciï¿œ get que retorna les dades
    $registre = pnModAPIFunc('iw_TimeFrames','user','get',array('mdid' => $mdid));
                         
    //Comprovem que el registre efectivament existeix i per tant, es podrï¿œ esborrar
    if (empty($registre)) {
        return LogUtil::registerError ( __('Can not find the timeFrame over which do the action.', $dom). " - ".$registre['nom_marc']);
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_TimeFrames::', "$registre[nom_marc]::$mdid", ACCESS_DELETE)) {
        return LogUtil::registerError (__('Not authorized to manage timeFrames.', $dom));
    }

	switch ($mode) {
		case 'all': //timetable not referenced in iw_bookings
			// falta esborrar totes les reserves
			$where = "mdid = ". $mdid;
			$rs = array();
			$rs = DBUtil::selectObjectArray('iw_bookings_spaces', $where);
			foreach ($rs as $item) {
				DBUtil::deleteWhere('iw_bookings', "sid=".$item['sid']);	
			}
		case 'keep': //keep bookings
 			$obj = array('mdid'=> 0);
			$where = "mdid = ". $mdid;
			DBUtil::updateObject ($obj, 'iw_bookings_spaces', $where);
		case 'noref': //delete all: timetable & bookings
			DBUtil::deleteWhere('iw_timeframes_def', "mdid=".$mdid);	
			DBUtil::deleteWhere('iw_timeframes', "mdid=".$mdid);
	}

    //Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
    return true;
}

/*
Mirem si existeix una referï¿œncia a aquest marc horari a les taula de reserves d'espais 
Check if exist any timetable reference in bookings_spaces table
*/
function iw_timeFrames_adminapi_referenced($args){
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	// Security check
	if (!SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$modid = pnModGetIDFromName('iw_bookings');
	$modinfo = pnModGetInfo($modid);

// comprovar si iw_bookings estï¿œ instalï¿œlat
	if ($modinfo['state']>1) {
		$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
		$tablename = 'iw_bookings_spaces';
		$where = 'mdid = '.$mdid;
		return (DBUtil::selectObjectCount( $tablename, $where) > 0);
	} else {
		return false;
	}
} 

/*
Check if exist any booking referencing a timeFrame
*/
function iw_timeFrames_adminapi_hasbookings($args){

	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null);//, 'GET');

if (empty($mdid)) {
	return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
}
	// Security check
	if (!SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$modid = pnModGetIDFromName('iw_bookings');
	$modinfo = pnModGetInfo($modid);

	// chek if iw_bookings module is installed -> state 2 or 3 
	if ($modinfo['state']>1) {
		$pntables = pnDBGetTables();
        $t1    = $pntables['iw_bookings'];
		$t2    = $pntables['iw_bookings_spaces'];
		$c1 = $pntables['iw_bookings_column'];
		$c2 = $pntables['iw_bookings_spaces_column'];

		$sql = "SELECT COUNT(*) "
        . " FROM $t1 INNER JOIN $t2 ON $t1.$c1[sid] = $t2.$c2[sid] "
        . " WHERE $t2.$c2[mdid]= ".$mdid; 

		$result = explode(")", DBUtil::executeSQL($sql));

		return $result[1]> 0;
	} else {
		return false;
	}
} 

// Verifica si una nova hora es superposa totalment o parcial amb alguna ja existent
function iw_timeFrames_adminapi_overlap($args){

	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	if (!SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
	$hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');
	$start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : null, 'GET');
	$end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : null, 'GET');
	$startf =date('H:i:s', strtotime($start));
	$endf =date('H:i:s', strtotime($end));

	// Obtain frame hours list sorted by start time
	$tablename = "iw_timeframes";
	$where = "mdid =".$mdid;
	$orderby = 'hid';
	$items = DBUtil::selectObjectArray( $tablename, $where, $orderby);

	foreach( $items as $item){
		if ($item['hid'] <> $hid){
			// coincideixen inici o final
			if (($startf == $item['start']) or ($endf == $item['end'])) { 
				return true;
			}
			// Coincideix en part o totalment amb una altra existent
			if ((($startf > $item['start']) and ($startf < $item['end'])) or (($endf > $item['start']) and ($endf < $item['end']))) {
				return true;
			}
			// La nova hora engloba alguna altra existent
			if (($startf <= $item['start']) and ($endf >= $item['end'])) { 
				return true;
			}
		}
	}
	return false;
}

/*
Funciï¿œ que crea una nova hora per un marc horari
*/
function iw_TimeFrames_adminapi_create_hour($args){

	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	if (!SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
	$start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : false, 'GET');
	$end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : false, 'GET');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : '', 'GET');

	if (!($start & $end)) {
		return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
	} else {
		$item = array ('mdid'=> pnVarPrepForStore($mdid),
					   'start'=> pnVarPrepForStore($start),
					   'end' => pnVarPrepForStore($end),
					   'descriu'=>  pnVarPrepForStore($descriu));
		$tablename = "iw_timeframes";
		$idcolumn = 'hid';
		DBUtil::insertObject($item, $tablename, $idcolumn);
		return DBUtil::getInsertID( $tablename, $idcolumn);
	}
}

/*
Funciï¿œ que esborra una hora en un marc horari
*/
function iw_TimeFrames_adminapi_delete_hour($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	if (!SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');

    //Comprovem que el parï¿œmetre id hagi arribat correctament
    if (!isset($hid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Carreguem l'API de l'usuari per carregar les dades del registre
    if (!pnModAPILoad('iw_TimeFrames', 'user')) {
        pnSessionSetVar('errormsg',__('Error! Could not load module.', $dom));
        return false;
    }

	DBUtil::deleteObjectByID( 'iw_timeframes', $hid, 'hid');

    //Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
    return true;
}


/*
Funciï¿œ que modifica una hora d'un marc horari
*/

function iw_TimeFrames_adminapi_update_hour($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	if (!SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');
	$start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : null, 'GET');
	$end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : null, 'GET');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');

    //Comprovem que els valors han arribat
    if ((!isset($hid))or(!isset($start)) or (!isset($end))) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Carregem l'API de l'usuari per poder consultar les dades de l'hora que volem modificar
    if (!pnModAPILoad('iw_TimeFrames', 'user')) {
        $output->Text(__('Error! Could not load module.', $dom));
        return $output->GetOutput();
    }

    //Cridem la funciï¿œ get de l'API que ens retornarï¿œ les dades de l'hora
    $registre = pnModAPIFunc('iw_TimeFrames','user','get_hour',array('hid' => $hid));

    //Comprovem que la consulta anterior ha tornat amb resultats
    if ($registre == false) {
        pnSessionSetVar('errormsg',__('Could not find the time over to do the action', $dom));
        return false;
    }

    //Comprovacions de seguretat
    if (!pnSecAuthAction(0, 'iw_TimeFrames::', "$registre[hora]::$hid", ACCESS_EDIT)) {
        pnSessionSetVar('errormsg', __('Not authorized to manage timeFrames.', $dom));
        return false;
    }

	$where="hid=".$hid;
	$item = array('start'=> $start, 'end'=> $end,'descriu'=> $descriu);
	$tablename = 'iw_timeframes';	
	if (!DBUtil::updateObject($item, $tablename, $where)){
		return LogUtil::registerError (__('The modify of the frame time failed.', $dom));
	}

    //Informem que el procï¿œs s'ha acabat amb ï¿œxit
    return true;
}
?>
