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
// La realitzaci� d'aquest m�dul ha estat possible gr�cies a una llic�ncia
// retribu�da concedida pel Departament d'Educaci� de la Generalitat de
// Catalunya (DOGC n�m.: 4182 de 26.7.2004).
// --------------------------------------------------------------------------
// Prop�sit del fitxer:
//      Funcions API de l'usuari del m�dul de reserves
// --------------------------------------------------------------------------

/*
  Funci� que retorna una matriu amb la informaci� de tots els espais o equips per reservar
 */
function iw_bookings_userapi_getall($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    $orderby = "space_name";
    $recordset = DBUtil::selectObjectArray('iw_bookings_spaces', '', $orderby, '-1', '-1', 'sid');

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($recordset === false) {
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }

    // Return the items
    return $recordset;
}

//END getall


/*
  Funci� que retorna la informaci� d'un espai o equip a partir de la seva �dentitat
 */

function iw_bookings_userapi_get($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return false;
    }

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');

    //Comprovem que el par�metre hagi arribat correctament
    if (!isset($sid) || !is_numeric($sid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }
    $where = "sid = '" . (int) pnVarPrepForStore($sid) . "'";
    $registre = DBUtil::selectObject('iw_bookings_spaces', $where);


    //Retormem una matriu amb la informaci�
    return $registre;
}

// END get


/*
  Funci� que retorna les hores en un marc horari
 */

function iw_bookings_userapi_getall_hores($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

    //Comprovaci� de seguretat. Si falla retorna una matriu buida
    $registres = array();
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return $registres;
    }

    $pntable = pnDBGetTables();
    $column = $pntable['iw_timeframes_column'];
    $where = "$column[mdid] = " . pnVarPrepForStore($mdid);
    $orderBy = "$column[start]";
    $items = DBUtil::selectObjectArray('iw_timeframes', $where, $orderBy);

    //$items = DBUtil::selectObjectArray('iw_timeframes', 'mdid='.$mdid, $orderby);
    foreach ($items as $item) {
        $registres[] = array(
            'hora' => date('H:i', strtotime($item['start'])) . " - " . date('H:i', strtotime($item['end'])),
            'descriu' => $item['descriu']);
    }

    //Retornem la matriu plena de registres
    return $registres;
}

//END getall_hores


/*
  Funci� que recull les hores d'una franja hor�ria i les retorna en una matriu preparades per un camp MultiSelect
 */

function iw_bookings_userapi_getall_hores_MS($args) {
    $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

    //Comprovaci� de seguretat. Si falla retorna una matriu buida
    $registres = array();
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return $registres;
    }

    $orderby = "start";
    $items = DBUtil::selectObjectArray('iw_timeframes', 'mdid=' . $mdid, $orderby);

    foreach ($items as $item) {
        $registres[] = array(
            'id' => date('H:i', strtotime($item['start'])) . " - " . date('H:i', strtotime($item['end'])),
            'name' => date('H:i', strtotime($item['start'])) . " - " . date('H:i', strtotime($item['end'])));
    }

    //Retornem la matriu plena de registres
    return $registres;
}

/*
  funci� que retorna una matriu amb els noms dels marcs horari i les
  seves identitats o una matriu buida en cas d'error o de no trobar marcs horari
 */

function iw_bookings_userapi_marcs($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    //Comprovaci� de seguretat. Si falla retorna una matriu buida
    $regs = array();

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    $items = DBUtil::selectObjectArray('iw_timeframes_def', '', 'nom_marc');
    $regs[] = array('id' => '0', 'name' => '');
    foreach ($items as $item) {
        $regs[] = array('id' => $item[mdid], 'name' => $item[nom_marc]);
    }
    return $regs;
}

function iw_bookings_userapi_fer_reserva($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'GET');
    $final = FormUtil::getPassedValue('final', isset($args['final']) ? $args['final'] : null, 'GET');
    $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'GET');
    $profe = FormUtil::getPassedValue('usr', isset($args['usr']) ? $args['usr'] : null, 'GET');

    //Comprova que la identitat de l'espai de reserva efectivament hagi arribat
    if ((!isset($sid))) {
        return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
    }
    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADD)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }
    // Get day of week
    $dow = date("w", DateUtil::makeTimeStamp($inici));
    $item = array('sid' => $sid,
        'user' => $profe,
        'usrgroup' => $grup,
        'start' => $inici,
        'end' => $final,
        'dayofweek' => $dow,
        'temp' => 0);
    if (!DBUtil::insertObject($item, 'iw_bookings', 'bid')) {
        LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
        return false;
    }

    // Return the id of the newly created item to the calling process
    return $item['bid'];
}

/**
 * Calcula la data inicial de la setmana a la qual pertany una determinada data
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @args The date (a MySQL timestamp or a string)
 * @return	the start date of the week
 */
function iw_bookings_userapi_getWeek($args) {
    $TheDate = FormUtil::getPassedValue('date', isset($args['date']) ? $args['date'] : null, 'GET');
    $format = FormUtil::getPassedValue('format', isset($args['format']) ? $args['format'] : null, 'GET');

    $week = array();

    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return $week;
    }

    $avui = DateUtil::makeTimestamp($TheDate);
    $dow = date("w", $avui);
    ($dow == 0) ? $dow = 7 : ""; // If sunday
    $fields = explode('-', $TheDate);


    if ($format == 'ymd') {
        $week[start] = DateUtil::getDatetime_NextDay((1 - $dow), '%Y-%m-%d', $fields[0], $fields[1], $fields[2]);
        $week[end] = DateUtil::getDatetime_NextDay((7 - $dow), "%Y-%m-%d %H:%M:%S", $fields[0], $fields[1], $fields[2], 23, 59, 59);
    } else {
        $week[start] = DateUtil::getDatetime_NextDay((1 - $dow), '%d-%m-%y', $fields[0], $fields[1], $fields[2]);
        $week[end] = DateUtil::getDatetime_NextDay((7 - $dow), "%d-%m-%y", $fields[0], $fields[1], $fields[2]);
    }
    return $week;
}

/**
 * Calculate dates for date navigation purposes
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @args The date (a MySQL timestamp or a string)
 * @return	array. Fields: nextweek, preweek, nextmonth, prevmonth
 */
function iw_bookings_userapi_getJumpDates($args) {
    $TheDate = FormUtil::getPassedValue('date', isset($args['date']) ? $args['date'] : null, 'GET');

    $result = array();
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return false;
    }

    $fields = explode('-', $TheDate);

    $result[nextweek] = DateUtil::getDatetime_NextWeek(1, '%d-%m-%y', $fields[0], $fields[1], $fields[2]);
    $result[prevweek] = DateUtil::getDatetime_NextWeek(-1, '%d-%m-%y', $fields[0], $fields[1], $fields[2]);
// ATENCI�: versi� 1.0 de zikula error a la funci� DateUtil::getDatetime_NextMonth. Nom�s canvia de dia
    $result[nextmonth] = DateUtil::getDatetime_NextMonth(1, '%d-%m-%y', $fields[0], $fields[1], $fields[2]);
    $result[prevmonth] = DateUtil::getDatetime_NextMonth(-1, '%d-%m-%y', $fields[0], $fields[1], $fields[2]);

    return $result;
}

/*
  Funci� que fa una reserva a la base da dades
 */

function iw_bookings_userapi_get_bookingInfo($args) {

    $result = array();
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return $result;
    }

    $bid = FormUtil::getPassedValue('bid', isset($args['bid']) ? $args['bid'] : null, 'GET');

    $pntable = pnDBGetTables();
    $c = $pntable['iw_bookings_column'];

    $bInfo = DBUtil::selectObject('iw_bookings', "$c[bid]=" . $bid);
    $result = $bInfo;

    $rs = DBUtil::selectObjectArray('iw_bookings', "$c[bkey]=" . $bInfo['bkey'], 'bid');
    $result['count'] = count($rs) - 1; // Num grouped bookings

    return $result;
}

/*
  Funci� que retorna la informaci� de totes les reserves puntuals fetes en un espai o equip
 */

function iw_bookings_userapi_getall_reserves($args) {
    //Comprovaci� de seguretat. Si falla retorna una matriu buida
    $registres = array();

    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return $registres;
    }

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $startp = FormUtil::getPassedValue('from', isset($args['from']) ? $args['from'] : null, 'GET');
    $endp = FormUtil::getPassedValue('to', isset($args['to']) ? $args['to'] : null, 'GET');
    $dow = FormUtil::getPassedValue('dw', isset($args['dw']) ? $args['dw'] : null, 'GET');

    $pntable = pnDBGetTables();

    $t = $pntable['iw_bookings'];
    $t1 = $pntable['iw_bookings_spaces'];
    $c = $pntable['iw_bookings_column'];
    $c1 = $pntable['iw_bookings_spaces_column'];

    ($sid == -1) ? $espai = '' : $espai = "$t.$c[sid]" . "='" . $sid . "' AND ";
    (empty($dow)) ? $dayofweek = '' : $dayofweek = "$c[dayofweek]" . "='" . $dow . "' AND ";
    $sql = "SELECT $c[start],$c[bid],$c[user],$c[end],$c[usrgroup],$c[temp],$t.$c[sid],$c[reason],$c[dayofweek]
			FROM $t,$t1 
			WHERE ($espai $c[start] BETWEEN '" . $startp . "' AND '" . $endp . "' AND $c[cancel]=0 AND $c1[active]=1 AND $t.$c[sid]=$t1.$c1[sid])
			ORDER BY DATE_FORMAT($c[start], '%H:%i:%s')";

    $rs = DBUtil::executeSQL($sql);

    //Recorrem els registres i els posem dins de la matriu
    for (; !$rs->EOF; $rs->MoveNext()) {
        list($start, $bid, $user, $end, $usrgroup, $temp, $sid, $reason, $dayofweek) = $rs->fields;
        //Comprovaci� de seguretat
        if (SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
            $items[] = array('inici' => $start,
                'final' => $end,
                'bid' => $bid,
                'usuari' => $user,
                'grup' => $usrgroup,
                'temp' => $temp,
                'sid' => $sid,
                'motiu' => $reason,
                'dayofweek' => $dayofweek);
        }
    }

    //Retornem la matriu plena de registres
    return $items;
}

// END getall_reserves


/*
  Funci� per comprovar si un espai est� ocupat en el moment que es fa una reserva.
  Si l'espai est� acupat retorna dades i sin� retorna una variable buida
 */

function iw_bookings_userapi_reservat($args) {
    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : null, 'GET');
    $end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : null, 'GET');

    $startTime = date('H:i:s', strtotime($start));
    $endTime = date('H:i:s', strtotime($end));

    $registres = array();

    //Comprovaci� de seguretat. Si falla retorna una matriu buida
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return $registres;
    }

    // Get day of week
    $dow = date("w", DateUtil::makeTimeStamp($start));

    $pntable = pnDBGetTables();
    $c = $pntable['iw_bookings_column'];

    /* $where =" WHERE ($c[sid]= '". pnVarPrepForStore($sid). "' AND $c[dayofweek]= '". pnVarPrepForStore($dow). "'
      AND ((DATE_FORMAT($c[start], '%H:%i:%s') >= '" . pnVarPrepForStore($startTime) . "'
      AND DATE_FORMAT($c[start], '%H:%i:%s')<'".pnVarPrepForStore($endTime)."')
      OR (DATE_FORMAT($c[end],   '%H:%i:%s') > '" . pnVarPrepForStore($startTime) . "'
      AND DATE_FORMAT($c[end],   '%H:%i:%s') <='".pnVarPrepForStore($endTime)."')
      OR (DATE_FORMAT($c[start], '%H:%i:%s')<'" . pnVarPrepForStore($startTime) . "'
      AND DATE_FORMAT($c[end],   '%H:%i:%s')>'".pnVarPrepForStore($endTime)."'))
      AND $c[cancel]=0 AND $c[temp]=1)
      OR
      ($c[sid]= '". pnVarPrepForStore($sid). "'
      AND (($c[start] >= '" . pnVarPrepForStore($start) . "' AND $c[start]<'".pnVarPrepForStore($end)."')
      OR ($c[end] > '" . pnVarPrepForStore($start) . "' AND $c[end] <='".pnVarPrepForStore($end)."')
      OR ($c[start]<'" . pnVarPrepForStore($start) . "' AND $c[end]>'".pnVarPrepForStore($end)."')) AND $c[cancel]=0 AND $c[temp]=0)"; */

    $where = " WHERE ($c[sid]= '" . pnVarPrepForStore($sid) . "'
			AND (($c[start] >= '" . pnVarPrepForStore($start) . "' AND $c[start]<'" . pnVarPrepForStore($end) . "')
			OR ($c[end] > '" . pnVarPrepForStore($start) . "' AND $c[end] <='" . pnVarPrepForStore($end) . "')
			OR ($c[start]<'" . pnVarPrepForStore($start) . "' AND $c[end]>'" . pnVarPrepForStore($end) . "')) AND $c[cancel]=0)";

    $items = DBUtil::selectObjectArray('iw_bookings', $where);

    return $items;
}

// END reservat


/*
  Funci� que fa una reserva a la base da dades
 */

function iw_bookings_userapi_reserva($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : null, 'GET');
    $end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : null, 'GET');
    $group = FormUtil::getPassedValue('usrgroup', isset($args['usrgroup']) ? $args['usrgroup'] : null, 'GET');
    $user = FormUtil::getPassedValue('user', isset($args['user']) ? $args['user'] : null, 'GET');
    $reason = FormUtil::getPassedValue('reason', isset($args['reason']) ? $args['reason'] : null, 'GET');
    $nsessions = FormUtil::getPassedValue('nsessions', isset($args['nsessions']) ? $args['nsessions'] : null, 'GET');
    $nbooking = FormUtil::getPassedValue('nbooking', isset($args['nbooking']) ? $args['nbooking'] : null, 'GET');
    $admin = FormUtil::getPassedValue('admin', isset($args['admin']) ? $args['admin'] : null, 'GET');
    $notPreferent = FormUtil::getPassedValue('notPreferent', isset($args['notPreferent']) ? $args['notPreferent'] : 0, 'GET');

    //Comprova que la identitat de l'espai de reserva efectivament hagi arribat
    if ((!isset($sid))) {
        return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
    }
    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADD)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }

    // Identificates grouped bookings: has the same day of week and time during n consecutive weeks
    $key = DBUtil::selectFieldMax('iw_bookings', 'bid') + 1;
    if (empty($nbooking))
        $nbooking = $key;

    // Get day of week
    $dow = date("w", DateUtil::makeTimeStamp($start));
    ($dow == 0) ? $dow = 7 : "";
    $temp = ($admin && $notPreferent == 0) ?  1 : 0;
    $item = array('sid' => $sid,
        'user' => $user,
        'usrgroup' => $group,
        'start' => $start,
        'end' => $end,
        'reason' => $reason,
        'dayofweek' => $dow,
        'bkey' => $nbooking,
        'temp' => $temp);
    if (!DBUtil::insertObject($item, 'iw_bookings', 'bid')) {
        LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
        return false;
    }

    // Return the id of the newly created item to the calling process
    return $nbooking;
}

/**
 * Esborra una o un conjunt de reserves
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @arg bid booking id
 * @arg eraseAll bool. If true delete all grouped bookings
 * @arg bookingKey. Identifies a grouped booking
 * @return result from the delete operation
 */
function iw_bookings_userapi_anulla($args) {
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return $registres;
    }

    $bid = FormUtil::getPassedValue('bid', isset($args['bid']) ? $args['bid'] : null, 'GET');
    $multiple = FormUtil::getPassedValue('eraseAll', isset($args['eraseAll']) ? $args['eraseAll'] : null, 'GET');
    $bookingKey = FormUtil::getPassedValue('bookingKey', isset($args['bookingKey']) ? $args['bookingKey'] : null, 'GET');

    if ($multiple) {
        $pntable = pnDBGetTables();
        $c = $pntable['iw_bookings_column'];
        $where = "$c[bkey]=" . $bookingKey;
        return DBUtil::deleteWhere('iw_bookings', $where);
    } else {
        return DBUtil::deleteObjectByID('iw_bookings', $bid, 'bid');
    }
}

/*
  Funci� que agafa la informaci� de les reserves que han estat anul�lades
 */

function iw_bookings_userapi_anullades($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    //Comprovaci� de seguretat. Si falla retorna una matriu buida
    $registres = array();

    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return $registres;
    }

    extract($args);

    //Connectem amb la base de dades
    list($dbconn) = pnDBGetConn();
    $pntable = & pnDBGetTables();

    $t = $pntable['iw_bookings'];
    $c = $pntable['iw_bookings_column'];

    ($sid == -1) ? $espai = '' : $espai = $c[sid] . '=' . $sid . ' AND ';

    $sql = "SELECT $c[bid],$c[user],$c[start],$c[end],$c[usrgroup],$c[temp] FROM $t WHERE $espai $c[anulla]=1 ORDER BY $c[start]";

    $registre = $dbconn->Execute($sql);

    //Comprovem que la consulta hagi estat amb �xit
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('An error has occurred while getting registers from the data base. Please, contact webmaster', $dom));
        return false;
    }

    //Recorrem els registres i els posem dins de la matriu
    for (; !$registre->EOF; $registre->MoveNext()) {
        list($bid, $usuari, $inici, $final, $grup, $temp) = $registre->fields;
        //Comprovaci� de seguretat
        if (SecurityUtil::checkPermission('iw_bookings::', "$usuari::$sid", ACCESS_READ)) {
            $registres[] = array('inici' => $inici, 'final' => $final, 'bid' => $bid, 'usuari' => $usuari, 'grup' => $grup, 'temp' => $temp);
        }
    }
    //Tanquem la BD
    $registre->Close();

    //Retornem la matriu plena de registres
    return $registres;
}

//END anullades


/*
  Funci� que esborra les reserves antigues i actualitza les reserves temporals
 */

function iw_bookings_userapi_esborra_antigues($args) {

    $dom = ZLanguage::getModuleDomain('iw_bookings');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');

    if (pnModGetVar('iw_bookings', 'NTPtime')) {
        // NTP time diference correction
        $now = DateUtil::getDatetime(DateUtil::makeTimestamp() + SessionUtil::getVar('timeOffset'));
    } else {
        // The server date
        $now = DateUtil::getDatetime();
    }

    $pntable = pnDBGetTables();
    $c = $pntable['iw_bookings_column'];

    ($sid == -1) ? $espai = '' : $espai = "$c[sid]" . "='" . $sid . "' AND ";

    $where = "$espai $c[end]< '" . $now . "' AND $c[temp] <> 1";

    DBUtil::deleteWhere('iw_bookings', $where);

    return true;
}

/**
 * Get time from NTP server
 * @author 	Tony Bhimani http://www.xenocafe.com/tutorials/php/ntp_time_synchronization/index.php
 * @adapted	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	the NTP server in timestamp format
 */
function iw_bookings_userapi_getNTPDate() {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }

    // ntp time servers to contact
    // we try them one at a time if the previous failed (failover)
    // if all fail then wait till tomorrow
    //$time_servers = array("pool.ntp.org");
    $time_servers = array("nist1.datum.com",
        "time.nist.gov"); //,"time-a.timefreq.bldrdoc.gov","utcnist.colorado.edu");
    // a flag and number of servers
    $valid_response = false;
    $ts_count = sizeof($time_servers);

    // time adjustment
    // you will need to change this value for your region (seconds)
    $time_adjustment = 0;
    for ($i = 0; $i < $ts_count; $i++) {
        $time_server = $time_servers[$i];
        $fs = @fsockopen("www.xtec.cat", 80);
        if ($fs) { // Has Internet connection. If false, avoid response delay
            $fp = fsockopen($time_server, 37, $errno, $errstr, 1); //15 seconds timeout for socket connection
            $data = NULL;
            while (!feof($fp)) {
                $data .= fgets($fp, 128);
            }
            fclose($fp);
            fclose($fs);
            // we have a response...is it valid? (4 char string -> 32 bits)
            if (strlen($data) != 4) {
;
            } else {
                $valid_response = true;
                break;
            }
        }
    }
    $result = 0;
    if ($valid_response) {
        // time server response is a string - convert to numeric
        $NTPtime = ord($data{0}) * pow(256, 3) + ord($data{1}) * pow(256, 2) + ord($data{2}) * 256 + ord($data{3});
        // convert the seconds to the present date & time
        $TimeFrom1990 = $NTPtime - 2840140800;
        $result = $TimeFrom1990 + 631152000;
    } else {
        LogUtil::registererror(__('Can\'t obtain NTP servers time', $dom));
    }
    return $result;
}

?>
