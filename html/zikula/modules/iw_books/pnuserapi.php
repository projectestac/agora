<?php
// ----------------------------------------------------------------------
// Copyright (C) 2006 per Jordi Fons
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
// Autor del fitxer original: Jordi Fons (jfons@iespfq.org)
// --------------------------------------------------------------------------
// Prop�sit del fitxer:
//      Funcions API de l'usuari del m�dul llibres
// --------------------------------------------------------------------------


function iw_books_userapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('iw_books');
	$pntable = pnDBGetTables();
	$c = $pntable['iw_books_column'];
	
	extract($args);

	// Optional arguments.
	if (!isset($args['startnum'])) {
		$args['startnum'] = 0;
	}
	if (!isset($args['numitems'])) {
		$args['numitems'] = -1;
	}

	if ((!isset($args['startnum'])) ||
	(!isset($args['numitems']))) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$items = array();

	// Security check
	if (!SecurityUtil::checkPermission('iw_books::', '::', ACCESS_READ)) {
		return $items;
	}

	// We now generate a where-clause
	$sql = ($any) ? " WHERE ".$c[any]." = '$any' " : " WHERE ".$c[any]." = '1'";
	if ($materia != "TOT") $sql .= " AND ".$c[codi_mat]." = '$materia' ";
	if ($lectura != '1') $sql .= " AND ".$c[lectura]." != 1 ";
	if ($etapa != "TOT") $sql .= " AND ".$c[etapa]." LIKE '%$etapa%'";
	if ($materia != "TOT") $sql .= " AND ".$c[codi_mat]." = '$materia'";
	if ($nivell !="") $sql .= " AND (".$c[nivell]." = '$nivell' OR ".$c[nivell]." = '')" ;
	
	$where   = $sql;

	//$orderBy = 'any, optativa, lectura, codi_mat, etapa DESC, nivell, avaluacio ' );
	$orderBy = ' '.$c[any].', '. $c[optativa].', '.$c[lectura].', '.$c[codi_mat].', '.$c[etapa].' DESC, '.$c[nivell].', '.$c[avaluacio].' ' ;

	$items = DBUtil::selectObjectArray ('iw_books', $where, $orderBy, $args['startnum'], $args['numitems']);

	// Return the items
	return $items;

}



function iw_books_userapi_get($args)
{
    $dom = ZLanguage::getModuleDomain('iw_books');
	extract($args);

    if (!isset($args['tid']) || !is_numeric($args['tid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $permFilter = array();
    $permFilter[] = array('realm' => 0,
                          'component_left'   => 'iw_books',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'name',
                          'instance_middle'  => '',
                          'instance_right'   => 'tid',
                          'level'            => ACCESS_EDIT);

    $item = DBUtil::selectObjectByID ('iw_books', $args['tid'], 'tid', null);

    //print_r($item);
    // Return the item array
    return $item;
	
}


function iw_books_userapi_countitems()
{
    return DBUtil::selectObjectCount ('iw_books');
}


function iw_books_userapi_countitemsmat()
{
    return DBUtil::selectObjectCount ('iw_books_materies');
}



function iw_books_userapi_countitemsselect($args)
{
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_books_column'];
	
	extract($args);

	$sql_eta = "";
	if ($etapa != "TOT")
	$sql_eta = " and ".$c[etapa]."  LIKE '%$etapa%' ";

	$sql_mat = "";
	if ($materia != "TOT")
	$sql_mat = " and ".$c[codi_mat]." = '$materia' ";

	
	$sql_lect = "";
	if ($lectura == 1){
		$sql_lect = "";
	}else{
	 	$sql_lect = " and ".$c[lectura]." != 1 ";
	}

	if ($flag == 'admin')
	$sql_lect = "";

	$sql_niv = "";
	if ($nivell != "")
	$sql_niv = " and ".$c[nivell]." = '$nivell'";

	$sql = " ".$c[any]." = '$any' "
	. $sql_eta . $sql_niv . $sql_mat . $sql_lect;
	 
	$where = $sql;
	
	//echo $sql;
	return DBUtil::selectObjectCount ('iw_books', $where);
}



function iw_books_userapi_cursacad($args)
{
	extract($args);
	$any2 = $any+1;
	$curs = $any."-".substr($any2,2,2);

	return $curs;
}


function iw_books_userapi_reble($args)
{
	extract($args);
	
	$output = '';
	$all = pnModGetVar('iw_books', 'nivells');
	$all = explode('|', $all);
	foreach ($all as $item){
		$level = explode('#',$item);		
		if (trim($level['0']) == $nivell){
			$output = trim($level['1']); 
			break;
		}		
	}
	return $output;
}


// Torna un array amb 'codi_mat' i 'materia'
// L'utilitzem per crear el selector múltiple de tria de matèria
function iw_books_userapi_materies($args)
{
    $dom = ZLanguage::getModuleDomain('iw_books');
	extract($args);
	
	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$materiestable  = $pntable['iw_books_materies'];
	$materiescolumn = &$pntable['iw_books_materies_column'];

	$items = array();
	$sql_nou = "";
	if (isset($nou) and $nou==1){
		$items[''] = '---------';
		$sql_nou = "WHERE $materiescolumn[codi_mat] != 'TOT'";
	}
	
    if (isset($tots) and $tots == true) {
		$items['TOT'] =  'Totes' ;
	}

	$sql = "SELECT $materiescolumn[tid],
	$materiescolumn[codi_mat],
	$materiescolumn[materia]
              FROM $materiestable ".
	$sql_nou ."
          ORDER BY $materiescolumn[materia]";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0) {
		//pnSessionSetVar('errormsg', $sql. __('Error! Could not load items.', $dom));
		pnSessionSetVar('errormsg', __('Error! Could not load items.', $dom));
		return false;
	}

	for (; !$result->EOF; $result->MoveNext()) {
		list($tid, $codi_mat, $materia) = $result->fields;
		$items[$codi_mat] = $materia;
	}

	$result->Close();
	return $items;
}


/*
 Torna nom de la matèria a partir del codi passat
 */
function iw_books_userapi_nommateria($args)
{
	extract($args);

	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$materiestable  = $pntable['iw_books_materies'];
	$materiescolumn = &$pntable['iw_books_materies_column'];

	$sql = "SELECT $materiescolumn[materia]
              FROM $materiestable
             WHERE $materiescolumn[codi_mat] = '$codi_mat'";

	$result =&$dbconn->Execute($sql);

	if (!$result->EOF){
		list($materia) = $result->fields;
		$torna = $materia;
	}

	$result->Close();
	
	return $torna;
}


function iw_books_userapi_getall_mat($args)
{
    $dom = ZLanguage::getModuleDomain('iw_books');
	extract($args);

	// Optional arguments.
	if (!isset($startnum)) {
		$startnum = 1;
	}
	if (!isset($numitems)) {
		$numitems = -1;
	}

	if ((!isset($startnum)) ||
	(!isset($numitems))) {
		pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
		return false;
	}

	$items = array();

	if (!pnSecAuthAction(0, 'iw_books::', '::', ACCESS_READ)) {
		return $items;
	}

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$materiestable  = $pntable['iw_books_materies'];
	$materiescolumn = &$pntable['iw_books_materies_column'];

	$sql = "SELECT $materiescolumn[tid],
	$materiescolumn[codi_mat],
	$materiescolumn[materia]
            FROM $materiestable 
            ORDER BY $materiescolumn[codi_mat]";

	$result = $dbconn->SelectLimit($sql, $numitems, $startnum-1);

	if ($dbconn->ErrorNo() != 0) {
		//pnSessionSetVar('errormsg'.$sql, __('Error! Could not load items.', $dom));
		pnSessionSetVar('errormsg', __('Error! Could not load items.', $dom));
		return false;
	}

	for (; !$result->EOF; $result->MoveNext()) {
		list($tid, $codi_mat, $materia, $optativa, $gestor) = $result->fields;
		if (pnSecAuthAction(0, 'iw_books::', "$autor::$tid", ACCESS_READ)) {
			$items[] = array('tid'       => $tid,
                             'codi_mat'  => $codi_mat,
                             'materia'   => $materia);
		}
	}

	$result->Close();

	return  $items;
}


function iw_books_userapi_get_mat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_books');
	extract($args);

    if (!isset($args['tid']) || !is_numeric($args['tid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $permFilter = array();
    $permFilter[] = array('realm' => 0,
                          'component_left'   => 'iw_books',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'name',
                          'instance_middle'  => '',
                          'instance_right'   => 'tid',
                          'level'            => ACCESS_EDIT);

    $item = DBUtil::selectObjectByID ('iw_books_materies', $args['tid'], 'tid', null);

    // Return the item array
    return $item;
	
}


function iw_books_userapi_plans($args)
{
	extract($args);
	
	$plans = explode("|",pnModGetVar('iw_books', 'plans') );
	
	if (isset($tots) and $tots == true) {
		$data['TOT'] =  'Tots' ;
	}
	
	for ($i=0; $i<count($plans) ; $i++) {
		$descrip = explode("#",$plans[$i]);
		$data[trim($descrip[0])] = trim($descrip[1]);
	}
	 
	return $data;
}


function iw_books_userapi_plansselec($args)
{
	extract($args);

	$plans = explode("|",pnModGetVar('iw_books', 'plans') );
	$selec = explode("|",$etapa) ;

	for ($i=0; $i<count($plans) ; $i++) {
		$descrip = explode("#",$plans[$i]);
		$valor = 0;
		if (array_search(trim($descrip[0]), $selec) > -1)
		$valor = 1;

		$data[] = array('id'=>trim($descrip[0]), 'name' => trim($descrip[1]), 'selected' => $valor);
	}
	return $data;
}


function iw_books_userapi_descriplans($args)
{

	extract($args);
	$torna = "";
	$plans = explode("|",pnModGetVar('iw_books', 'plans') );
	for ($i=0; $i<count($plans) ; $i++) {
		$descrip = explode("#",$plans[$i]);
		if (trim($descrip[0]) == trim($etapa)){
			$torna = $descrip[1];
			break;
			//}else{
			//    $torna = "Codi inexistent";
		}
	}
	return $torna;
}

function iw_books_userapi_llistaplans($args)
{
	extract($args);
	$torna = "";
	$plans = explode("|",pnModGetVar('iw_books', 'plans') );
	for ($i=0; $i<count($plans) ; $i++) {
		$descrip = explode("#",$plans[$i]);
		$torna .= $descrip[0]."=".$descrip[1]." | ";
	}
	return $torna;
}


function iw_books_userapi_nivellsselec($args)
{
	extract($args);

	$nivells = explode("|",pnModGetVar('iw_books', 'nivells') );
	$selec = explode("|",$nivell) ;

	for ($i=0; $i<count($nivells) ; $i++) {
		$descrip = explode("#",$nivells[$i]);
		$valor = 0;
		if (array_search(trim($descrip[0]), $selec) > -1)
		$valor = 1;

		$data[] = array('id'=>trim($descrip[0]), 'name' => trim($descrip[1]), 'selected' => $valor);
	}
	return $data;
}
/*
function iw_books_userapi_nivells($args)

{
	extract($args);
*/
	/*
	if (!isset($blanc)) {
		$blanc = 0;
	}
	if ($blanc == 1){
		$data[''] =  '---' ;		
	}
*//*
	if (isset($blanc) and $blanc == true) {
		$data[''] =  '---' ;
	}
	
	$darrer_nivell = pnModGetVar('iw_books', 'darrer_nivell');
	
	for ($i=1; $i<=$darrer_nivell ; $i++){
		$data[$i] = pnModAPIFunc('iw_books', 'user', 'reble', array('nivell' => $i)) ;
	}

	return $data;
}*/

function iw_books_userapi_nivells($args)
{
	extract($args);
	
	$nivells = explode("|",pnModGetVar('iw_books', 'nivells') );
	
	if (isset($blanc) and $blanc == true) {
		$data[''] =  'Tots' ;
	}
	for ($i=0; $i<count($nivells) ; $i++) {
		$descrip = explode("#",$nivells[$i]);
		$data[trim($descrip[0])] = trim($descrip[1]);
	}
	 
	return $data;
}

function iw_books_userapi_descrinivells($args)
{

	extract($args);
	$torna = "";
	$nivells = explode("|",pnModGetVar('iw_books', 'nivells') );
	for ($i=0; $i<count($nivells) ; $i++) {
		$descrip = explode("#",$nivells[$i]);
		if (trim($descrip[0]) == trim($nivell)){
			$torna = $descrip[1];
			break;
			//}else{
			//    $torna = "Codi inexistent";
		}
	}
	return $torna;
}
function iw_books_userapi_llistanivells($args)
{
	extract($args);
	$torna = "";
	$nivells = explode("|",pnModGetVar('iw_books', 'nivells') );
	for ($i=0; $i<count($nivells) ; $i++) {
		$descrip = explode("#",$nivells[$i]);
		$torna .= $descrip[0]."=".$descrip[1]." | ";
	}
	return $torna;
}

/*
 Torna  un array amb tots els anys existents a la tala llibres
 */
function iw_books_userapi_anys($args)
{

	extract($args);

	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$llibrestable = $pntable['iw_books'];
	$llibrescolumn = &$pntable['iw_books_column'];

	$sql = "SELECT DISTINCT $llibrescolumn[any]
            FROM $llibrestable";

	$result =& $dbconn->Execute($sql);


	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', 'error');
		return false;
	}

	for (; !$result->EOF; $result->MoveNext()) {
		list($anytria) = $result->fields;
		$cursacad = pnModAPIFunc('iw_books', 'user', 'cursacad', array('any' => $anytria));
		$data[trim($anytria)] =  $cursacad ;
	}

	$result->Close();

	return $data;
}


?>
