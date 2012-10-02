<?php
// ----------------------------------------------------------------------
// Copyright (C) 2004 per Albert P�rez Monfort
//      Generalitat de Catalunya
//      Departament d'Educaci�
//      Grup de treball Intranet de centres
// ----------------------------------------------------------------------
// Aquest programa fa �s de les funcions de l'API de PostNuke
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// --------------------------------------------------------------------------
// Llic�ncia
//
// Aquest programa �s de software lliure. Pot redistribuir-lo i/o modificar-lo
// sota els termes de la Llic�ncia P�blica General de GNU segons est� publicada
// per la Free Software Foundation, b� de la versi� 2 de l'esmentada Llic�ncia
// o b� (segons la seva elecci�) de qualsevol versi� posterior.
//
// Aquest programa es distribueix amb l'esperan�a que sigui �til, per� sense
// cap garantia, fins i tot sense la garantia MERCANTIL impl�cita o sense
// garantir la conveni�ncia per a un prop�sit particular. Consulti la Llic�ncia
// General de GNU per a m�s detalls.
//
// Pots trobar la Llic�ncia a http://www.gnu.org/copyleft/gpl.html
// --------------------------------------------------------------------------
// Autor del fitxer original: Albert P�rez Monfort (aperez16@xtec.cat)
// --------------------------------------------------------------------------
// Prop�sit del fitxer:
//      Funcions API d'administraci� del m�dul de reserves
// --------------------------------------------------------------------------

/*
Create a new space or equipment to book
*/
 
function iw_bookings_adminapi_create($args){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$descriu   = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');
	$nom_espai = FormUtil::getPassedValue('nom_espai', isset($args['nom_espai']) ? $args['nom_espai'] : null, 'GET');
	$actiu     = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'GET');
	$mdid      = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
	$color     = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'GET');
	$vertical  = FormUtil::getPassedValue('vertical', isset($args['vertical']) ? $args['vertical'] : null, 'GET');


    // Argument optional
	if (!isset($descriu)) {
		$descriu = '';
	}

    //Check space o equipment name is set
    if ((!isset($args['nom_espai']))) {
        return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom), 403);
    }
	//Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	$item = array('space_name' => $nom_espai,
				  'active' => $actiu,
				  'mdid' => $mdid,
				  'description' => $descriu,
				  'color' => $color,
				  'vertical' => $vertical);


	if (!DBUtil::insertObject($item, 'iw_bookings_spaces', 'sid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}

	// Return the id of the newly created item to the calling process
	return $item['sid'];
}


/*
Update or modify space or equipment info
*/
function iw_bookings_adminapi_update($args){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$sid       = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
	$nom_espai = FormUtil::getPassedValue('nom_espai', isset($args['nom_espai']) ? $args['nom_espai'] : null, 'GET');
	$descriu   = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');
	$actiu     = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'GET');
	$mdid      = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
	$color     = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'GET');
	$vertical  = FormUtil::getPassedValue('vertical', isset($args['vertical']) ? $args['vertical'] : null, 'GET');

    //Check params
    if ((!isset($sid)) ||
        (!isset($nom_espai))) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // Check valid space
    $exist = pnModAPIFunc('iw_bookings', 'user','get',array('sid' => $sid));

    //Comprovem que la consulta anterior ha tornat amb resultats
    if ($exist == false) {
		return LogUtil::registerError (__('The room or equipment was not found', $dom));
    }
   
    //Comprovacions de seguretat
    if (!pnSecAuthAction(0, 'iw_bookings::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

	$where = "sid = ".$sid;
	$item = array('space_name'=> $nom_espai,
                  'description' => $descriu,
                  'active' => $actiu,
                  'mdid' => $mdid,
                  'vertical' =>$vertical ,
                  'color' => $color);			

	if (!DBUTil::updateObject ($item, 'iw_bookings_spaces', $where)) {
		return LogUtil::registerError (__('An error has occurred while modifying the room or equipment', $dom));
	}

    //Informem que el proc�s s'ha acabat amb �xit
    return true;
}


/*
 Funci� que esborra un espai o equip per reserva de la base de dades
*/
function iw_bookings_adminapi_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
	}

    //Comprovem que el par�metre identitat hagi arribat
    if (!isset($sid) || !is_numeric($sid)) {
        return LogUtil::registerError ( __('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    //Check if space exist 
    $exist = pnModAPIFunc('iw_bookings','user','get',array('sid' => $sid)); 
    if ($exist == false) {
       LogUtil::registerError (__('The room or equipment was not found', $dom));
    }

	// Delete record
	if (!DBUtil::deleteObjectByID('iw_bookings_spaces', $sid, 'sid')) {
		return LogUtil::registerError ( __('An error has occurred while deleting the register', $dom));
	}

	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_bookings');
	$pnRender->clear_cache(null, $sid);

	//delete the anotations insert in this agenda
	$pntables = pnDBGetTables();

	$c = $pntables['iw_bookings_column'];
	$where = "$c[sid]=$sid";
	if (!DBUtil::deleteWhere ('iw_bookings', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

    return true;
}


/*
funci� que retorna una matriu amb els noms dels marcs horari i les
seves identitats o una matriu buida en cas d'error o de no trobar marcs horari
*/
function iw_bookings_adminapi_marcs($args)
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');

    //Comprovaci� de seguretat. Si falla retorna una matriu buida
    $regs = array();

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$items = DBUtil::selectObjectArray('iw_timeframes_def','','nom_marc');
    $regs[] = array('id' => '0','name' => '');
    foreach ($items as $item) {
		$regs[] = array('id' => $item[mdid],'name' => $item[nom_marc]);
    }

	return $regs;
}


/*
Funci� que retorna el nom d'un marc horari a partir de la seva identitat
*/
function iw_bookings_adminapi_nom_marc($args)
{	
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	return DBUtil::selectField('iw_timeframes_def', 'nom_marc','mdid ='. $mdid);
}


/*
Funci� per comprovar si un espai est� ocupat en el moment que es fa una reserva temporal.
Si l'espai est� acupat retorna dades i sin� retorna una variable buida
*/
function iw_bookings_adminapi_reservat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$sid   = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
	$start = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'GET');
	$end = FormUtil::getPassedValue('final', isset($args['final']) ? $args['final'] : null, 'GET');
 
	$startTime =date('H:i:s', strtotime($start));
	$endTime =date('H:i:s', strtotime($end));

    //Comprovaci� de seguretat. Si falla retorna una matriu buida
    if (!pnSecAuthAction(0, 'iw_bookings::', '::', ACCESS_READ)) {
        return $registres;
    }

	// Get day of week
	$dow = date("w", DateUtil::makeTimeStamp($start));

	$pntable = pnDBGetTables();
    $c = $pntable['iw_bookings_column'];
	
	$where =" WHERE $c[sid]= '". pnVarPrepForStore($sid). "' AND $c[dayofweek]= '". pnVarPrepForStore($dow). "'
			AND ((DATE_FORMAT($c[start], '%H:%i:%s') >= '" . pnVarPrepForStore($startTime) . "' 
			AND DATE_FORMAT($c[start], '%H:%i:%s')<'".pnVarPrepForStore($endTime)."')  
			OR (DATE_FORMAT($c[end],   '%H:%i:%s') > '" . pnVarPrepForStore($startTime) . "' 
			AND DATE_FORMAT($c[end],   '%H:%i:%s') <='".pnVarPrepForStore($endTime)."') 
			OR (DATE_FORMAT($c[start], '%H:%i:%s')<'" . pnVarPrepForStore($startTime) . "' 
			AND DATE_FORMAT($c[end],   '%H:%i:%s')>'".pnVarPrepForStore($endTime)."')) 
			AND $c[cancel]=0";

 	$items = DBUtil::selectObjectCount( 'iw_bookings', $where);
	
	return $items;

} // END reservat


/*
Funci� que fa una reserva temporal a la base da dades
*/
function iw_bookings_adminapi_fer_reserva($args)
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
	$inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'GET');
	$final = FormUtil::getPassedValue('final', isset($args['final']) ? $args['final'] : null, 'GET');
	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'GET');
	$profe = FormUtil::getPassedValue('profe', isset($args['profe']) ? $args['profe'] : null, 'GET');
	$finish_date = FormUtil::getPassedValue('finish_date', isset($args['finish_date']) ? $args['finish_date'] : null, 'GET');

    //Comprova que la identitat de l'espai de reserva efectivament hagi arribat
    if ((!isset($sid))) {
        return LogUtil::registerError( __('Error! Could not do what you wanted. Please check your input.', $dom));
    }
	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
	}
	// Get day of week 
	$dow = date("w", DateUtil::makeTimeStamp($inici));
	// Do a booking for every week until finish date
	$i = 0;
	while((strtotime($inici.' + '.$i.' weeks'))<=(strtotime(date('d-m-Y', $finish_date).' + 24 hours'))){
        $item = array('sid'=> $sid,
				  'user' => $profe,
				  'usrgroup' => $grup,
				  'start' => date('Y-m-d H:i:s', strtotime($inici.' + '.$i.' weeks')),
				  'end' => date('Y-m-d H:i:s', strtotime($final.' + '.$i.' weeks')),
				  'dayofweek'=> $dow,
				  'temp' => 0);
	    if (!DBUtil::insertObject($item, 'iw_bookings', 'bid')) {
		LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		return false;
        }
        $i++;	    
	}
	
	
	
	// Return the id of the last created item to the calling process
	return $item['bid'];
}


/*
Funci� que anul�la una reserva temporal de la base de dades
*/
function iw_bookings_adminapi_anulla($args)
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');
	$bid = FormUtil::getPassedValue('bid', isset($args['bid']) ? $args['bid'] : null, 'GET');

    //Comprovem que el par�metre id efectivament hagi arribat
    if (!isset($bid)) {
        LogUtil::registerError( __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Comprovaci� de seguretat
    if (!pnSecAuthAction(0, 'iw_bookings::', '::', ACCESS_ADMIN)) {
        LogUtil::registerError( __('You are not allowed to administrate the bookings', $dom));
        return false;
    }

	if (!DBUtil::deleteObjectByID( 'iw_bookings', pnVarPrepForStore($bid), 'bid')){
		return false;
	}else{
 	   //Retornem true ja que el proc�s ha finalitzat amb �xit
 	   return true;
	}
}


/*
 Funci� que esborra un espai o equipament de reserva de la base de dades
*/
function iw_bookings_adminapi_buida($args)
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');
	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');

    //Comprovem que el par�metre id efectivament hagi arribat
    if (!isset($sid)) {
        LogUtil::registerError( __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    //Cridem la funci� get que retorna les dades
    $link = pnModAPIFunc('iw_bookings','user','get',array('sid' => $sid));

    //Comprovem que el registre efectivament existeix i, per tant, es podr� esborrar
    if ($link == false) {
        LogUtil::registerError( __('The room or equipment was not found', $dom));
        return false;
    }

    //Comprovaci� de seguretat
    if (!pnSecAuthAction(0, 'iw_bookings::', "::", ACCESS_ADMIN)) {
        LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
        return false;
    }

    $pntables = pnDBGetTables();
    $c   = $pntables['iw_bookings_column'];
    $where    = "WHERE $c[sid]=" .$sid;
    if (!DBUtil::deleteWhere ('iw_bookings', $where)){
		return false;
	}else{
 	   //Retornem true ja que el proc�s ha finalitzat amb �xit
 	   return true;
	}
}


//Funci� que esborra totes les reserves i deixa buides les taules
function iw_bookings_adminapi_deleteAllBookings()
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');

    //Comprovaci� de seguretat
    if (!pnSecAuthAction(0, 'iw_bookings::', "::", ACCESS_ADMIN)) {
        LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
        return false;
    }
	DbUtil::deleteWhere('iw_bookings','true');

    // Success
    return true;
}

?>
