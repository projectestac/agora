<?php
/**
 * @link http://www.zikula.com
 * @version $Id: pnuserapi.php 22139 2008-08-01 17:57:16Z markwest $
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
Funciï¿œ que recull tots els registres de marcs definits de la BD
*/
function iw_TimeFrames_userapi_getall($args)
{
    $dom=ZLanguage::getModuleDomain('iw_timeFrames');
	//Comprovaciï¿œ de seguretat. Si falla retorna una matriu buida
    $registres = array();
	// Security check
	if (!SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}
	
	$orderby = "nom_marc";
	$items = DBUtil::selectObjectArray('iw_timeframes_def', '', $orderby, '-1', '-1', 'mdid');
	foreach ($items as $item){
		$registres[] = array(
						'mdid'=> $item['mdid'],
						'nom_marc'=> $item['nom_marc'], 
						'descriu'=>$item['descriu']);
	}
   //Retornem la matriu plena de registres
    return $registres;
}

/*
Funciï¿œ que recull la informaciï¿œ especifica d'un registre
*/
function iw_TimeFrames_userapi_get($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

	if (!SecurityUtil::checkPermission('iw_TimeFrames::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

    if (!isset($mdid) || !is_numeric($mdid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

	$item = DBUtil::selectObjectByID('iw_timeframes_def',$mdid, 'mdid');

    return $item;
}

/*
Funciï¿œ que recull tots els registres d'hores d'un marc horari de la BD
*/
function iw_TimeFrames_userapi_getall_horari($args)
{
    
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

    //Comprovaciï¿œ de seguretat. Si falla retorna una matriu buida
    $registres = array();
    if (!pnSecAuthAction(0, 'iw_TimeFrames::', '::', ACCESS_READ)) {
        return $registres;
    }
	
	$orderby = "start";
	$items = DBUtil::selectObjectArray('iw_timeframes', 'mdid='.$mdid, $orderby);
	foreach ($items as $item){
		$registres[] = array(
						'hid'=> $item['hid'],
						'hora'=> date('H:i', strtotime($item['start']))." - ". date('H:i', strtotime($item['end'])),
						'descriu'=>$item['descriu']);
	}

    //Retornem la matriu plena de registres
    return $registres;
}

/*
Funciï¿œ que recull la informaciï¿œ d'una hora especï¿œfica d'un marc horari
*/
function iw_TimeFrames_userapi_get_hour($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');

    if (!isset($hid) || !is_numeric($hid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

	$tablename = 'iw_timeframes';
	$where ="hid =".$hid;
	$item = DBUtil::selectObject($tablename, $where);
	
	if (!empty($item)){
		return $item;
	}else {
		return false;
	}
}
?>
