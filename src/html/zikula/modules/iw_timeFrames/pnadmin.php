<?php
/**
 * @link http://www.zikula.com
 * @version $Id: pnadmin.php 22139 2008-08-01 17:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @project intraweb (intraweb@xtec.cat)
 * @subpackage iw_timeFrames
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
 */

// --------------------------------------------------------------------------
// Propï¿œsit del fitxer:
//      Funcions d'administraciï¿œ del mï¿œdul iw_timeFrames
// --------------------------------------------------------------------------

/*
funció principal de l'administrador
*/

function iw_timeFrames_admin_main()
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$pnRender = pnRender::getInstance('iw_timeFrames', false);
	$frames=array();
    //Cridem la funció API anomenada getall i que retornarï¿œ la informació
    $frames = pnModAPIFunc('iw_timeFrames','user','getall',array());

    //Per si no hi ha marcs definits
    (empty($frames))? $hihamarcs = false :  $hihamarcs = true;

	$pnRender->assign('hi_ha_marcs', $hihamarcs);
	$pnRender-> assign('marcs', $frames);
    return $pnRender->fetch('iw_timeframes_admin_main.htm');
}

function iw_timeFrames_admin_module(){

	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_timeFrames',false);
	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_timeFrames', 'type' => 'admin'));
	$pnRender -> assign('module', $module);

    return $pnRender->fetch('iw_timeframes_admin_module.htm');
}


/*
funció que presenta el formulari des d'on es demanen la dades del nou marc que es vol crear
*/

function iw_timeFrames_admin_new(){

	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
	$m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');

	$pnRender = pnRender::getInstance('iw_timeFrames',false);

	if(!empty($mdid)){
	    //Agafem les dades del registre a editar
	    $registre = pnModAPIFunc('iw_timeFrames','user','get',array('mdid' => $mdid));
	    if (empty($registre)) {
	       return LogUtil::registerError(__('Error! Could not load module.', $dom));
	    }
	
		//posem els valors dels camps
	    $nom_marc=$registre['nom_marc'];
	    $descriu=$registre['descriu'];
	}

	switch ($m) {
		case 'n': //new
			$accio=__('Add new timeFrame', $dom);
			$acciosubmit=__('Creates the timeFrame', $dom);
		break;
		case 'e': //edit
			$accio=__('Edit the TimeFrame', $dom);
			$acciosubmit=__('Change', $dom);
		break;
	}
        $modinfo = pnModGetInfo(pnModGetIDFromName($modname));

        $key = SessionUtil::getVar('rand') . strtolower($modinfo['name']);

	$pnRender-> assign('nom_marc', $nom_marc);
	$pnRender-> assign('m', $m);
	$pnRender-> assign('mdid', $mdid);
	$pnRender-> assign('descriu', $descriu);
	$pnRender-> assign('acciosubmit', $acciosubmit);    $pnRender->assign('accio',$accio);

    return $pnRender->fetch('iw_timeframes_admin_new.htm');
}


/*
funció que comprova que les dades enviades des del formulari de creaciï¿œ d'un
nou marc horari s'ajusten al que ha de ser i envia l'ordre de crear el registre
*/
function iw_timeFrames_admin_create($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
	$m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');
	$nom_marc = FormUtil::getPassedValue('nom_marc', isset($args['nom_marc']) ? $args['nom_marc'] : null, 'POST');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');

    //confirmació del codi d'autoritzaciï¿œ.
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_timeFrames', 'admin', 'main'));
    }

	if($m=='n'){
    	//Es crida la funció API amb les dades extretes del formulari
	    if (pnModAPIFunc('iw_timeFrames','admin','create',array('nom_marc' => $nom_marc,'descriu' => $descriu))) {
			//success
			LogUtil::registerStatus (__('We have created a new timeFrame.', $dom));
	    }
	}
	else {
    	if(pnModAPIFunc('iw_timeFrames','admin','update',array('nom_marc' => $nom_marc,'descriu' => $descriu, 'mdid'=> $mdid))) {
			// Success
			LogUtil::registerStatus (__('timeFrame was updated', $dom));
    	}
	}
    pnRedirect(pnModURL('iw_timeFrames', 'admin', 'main'));
    //Retorna havent acabat el procï¿œs satisfactï¿œriament
    return true;
}

/*
funció que gestiona l'esborrament d'un marc horari i envia les dades a la funció API corresponent per fer l'ordre efectiva
*/
function iw_timeFrames_admin_delete($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'REQUEST');
	$confirmacio = FormUtil::getPassedValue('confirmacio', isset($args['confirmacio']) ? $args['confirmacio'] : null, 'POST');
	$mode = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');
	$referenced = FormUtil::getPassedValue('r', isset($args['r']) ? $args['r'] : null, 'REQUEST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

    //Cridem la funció de l'API de l'usuari que ens retornarï¿œ la informació del registre demanat
    $registre = pnModAPIFunc('iw_timeFrames', 'user', 'get',
                              array('mdid' => $mdid));
	$pnRender = pnRender::getInstance('iw_timeFrames',false);

    if (empty($registre)) {
        return LogUtil::registerError(__('Can not find the timeFrame over which do the action.', $dom). " mdid - ". $mdid);
    }
    
    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_timeFrames::Item', "$registre[nom_marc]::$mdid", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom));
    }
    //Demanem confirmació per l'esborrament del registre, si no s'ha demanat abans
    if (empty($confirmacio) and empty ($referenced)) {
		$pnRender->assign('mdid',$mdid);
        $pnRender->assign('nom_marc', $registre['nom_marc']);
		return $pnRender->fetch('iw_timeframes_admin_del.htm');
    }

    //L'usuari ha confirmat l'esborrament del registre i procedim a fer-ho efectiu
	// Check if frame is referenced in bookings module
	if (empty ($referenced)){	
		$referenced = pnModAPIfunc('iw_timeFrames','admin','referenced', array('mdid' => $mdid));
		if ($referenced){

			$pnRender->assign('referenced',$referenced);
			$pnRender->assign('mdid',$mdid);
    		$pnRender->assign('nom_marc', $registre['nom_marc']);
			return $pnRender->fetch('iw_timeframes_admin_del.htm');
		}
	}
    //confirmació del codi de seguretat
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_timeFrames', 'admin', 'main'));
    }

   	//Cridem la funció API que farï¿œ l'esborrament del registre
	if (pnModAPIFunc('iw_timeFrames','admin','delete',array('mdid' => $mdid, 'm'=> $mode))) {
        //L'esborrament ha estat un ï¿œxit i ho notifiquem
        pnSessionSetVar('statusmsg',__('Has been deleted the timeFrame', $dom));
    }

    //Enviem a l'usuari a la taula de marcs horari
    pnRedirect(pnModURL('iw_timeFrames', 'admin', 'main'));

    //Retornem el valor true ja que l'esborrament ha estat possible
    return true;
}

/* ---------------------------------------------------------------------------------------------------------*\
 *												HORES 														* 
\* ---------------------------------------------------------------------------------------------------------*/

/*
Funció que mostra la informació d'un marc horari
*/
function iw_timeFrames_admin_timetable(){
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

    //Cridem la funció de l'API de l'usuari que ens retornarà la informació del registre demanat
    $item = pnModAPIFunc('iw_timeFrames', 'user', 'get',
                          array('mdid' => $mdid));

	$horari = pnModAPIFunc('iw_timeFrames', 'user', 'getall_horari',
	                        array('mdid'=>$mdid));
	!empty($horari)?$hi_ha_hores = true : $hi_ha_hores = false;
	$hasbookings = pnModApiFunc('iw_timeFrames', 'admin', 'hasbookings',
	                             array('mdid'=>$mdid));

	$pnRender = pnRender::getInstance('iw_timeFrames',false);
	$pnRender->assign('nom_marc',$item['nom_marc']);
	$pnRender->assign('horari',$horari);
	$pnRender->assign('hi_ha_hores',$hi_ha_hores);
	$pnRender->assign('hasbookings',$hasbookings);
	$pnRender->assign('mdid',$mdid);

	return $pnRender->fetch('iw_timeframes_admin_timetables.htm');
}

/*
funció que presenta el formulari des d'on es demanen la dades per introduir una nova hora en el marc horari
*/

function iw_timeFrames_admin_new_hour($args){

	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
	$mode = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');
	$hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');

	// Mirar si existeixen reserves que facin referï¿œncia a aquest marc horari
	if (pnModAPIFunc('iw_timeFrames','admin','hasbookings',array('mdid'=>$mdid))){
		return LogUtil::registerError(__('Operation unavailable. There are reservations on this time frame.', $dom));
	}

	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}
    
	//Contruim les matrius d'hores i minuts
	$hora=array(array('id'=>'08','name'=>'08'),
                array('id'=>'09','name'=>'09'),
                array('id'=>'10','name'=>'10'),
                array('id'=>'11','name'=>'11'),
                array('id'=>'12','name'=>'12'),
                array('id'=>'13','name'=>'13'),
                array('id'=>'14','name'=>'14'),
                array('id'=>'15','name'=>'15'),
                array('id'=>'16','name'=>'16'),
                array('id'=>'17','name'=>'17'),
                array('id'=>'18','name'=>'18'),
                array('id'=>'19','name'=>'19'),
                array('id'=>'20','name'=>'20'),
                array('id'=>'21','name'=>'21'),
                array('id'=>'22','name'=>'22'));

	$minut=array(array('id'=>'00','name'=>'00'),
                array('id'=>'05','name'=>'05'),
                array('id'=>'10','name'=>'10'),
                array('id'=>'15','name'=>'15'),
                array('id'=>'20','name'=>'20'),
                array('id'=>'25','name'=>'25'),
                array('id'=>'30','name'=>'30'),
                array('id'=>'35','name'=>'35'),
                array('id'=>'40','name'=>'40'),
                array('id'=>'45','name'=>'45'),
                array('id'=>'50','name'=>'50'),
                array('id'=>'55','name'=>'55'));
	$pnRender = pnRender::getInstance('iw_timeFrames',false);
	$nova_hora = false;
	$editmode = false;
	switch ($mode) {
		case 'n': //new
			$accio=__('New time', $dom);
			$acciosubmit=__('Add time at timeFrame ', $dom);
			$nova_hora = true;
		break;
		case 'e': //edit
			$accio=__('Edit the TimeFrame', $dom);
			$acciosubmit=__('Change', $dom);
			$editmode = true;
			$period = pnModAPIFunc('iw_timeFrames','user','get_hour',array('hid' => $hid));
  			if ($period == false) {
      			return LogUtil::registerError(__('Can not find the timeFrame over which do the action.', $dom));
  			}
			$pnRender->assign('starth',date('H', strtotime($period['start'])));
			$pnRender->assign('startm',date('i', strtotime($period['start'])));
			$pnRender->assign('endh',date('H', strtotime($period['end'])));
			$pnRender->assign('endm',date('i', strtotime($period['end'])));
			$pnRender->assign('descriu',$period['descriu']);
			$pnRender->assign('hid',$hid);
		break;
		return logUtil::registerError(__('Error! Could not load module.', $dom));
	}
	$horari = pnModAPIFunc('iw_timeFrames','user','getall_horari',array('mdid'=>$mdid));
	!empty($horari)?$hi_ha_hores = true : $hi_ha_hores = false;
	$item = pnModAPIFunc('iw_timeFrames','user','get',array('mdid' => $mdid));

	$pnRender->assign('accio',$accio);
	$pnRender->assign('acciosubmit',$acciosubmit);
	$pnRender->assign('nom_marc',$item['nom_marc']);
	$pnRender->assign('hores',$hora);
	$pnRender->assign('minuts',$minut);
	$pnRender->assign('hi_ha_hores',$hi_ha_hores);
	$pnRender->assign('horari',$horari);
	$pnRender->assign('mdid',$mdid);
	$pnRender->assign('nova_hora',$nova_hora);
	$pnRender->assign('editmode',$editmode);
								
	return $pnRender->fetch('iw_timeframes_admin_timetables.htm');
}

/*
funció que comprova que les dades enviades des del formulari de creaciï¿œ d'una
nova hora per un marc horari s'ajusten al que ha de ser i envia l'ordre
de crear el registre a la funció new_hora de l'API
*/
function iw_timeFrames_admin_create_hour($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	// Mirar si existeixen reserves que facin referï¿œncia a aquest marc horari
	if (pnModAPIFunc('iw_timeFrames','admin','hasbookings',array('mdid'=>$mdid))){
		return LogUtil::registerError(__('Operation unavailable. There are reservations on this time frame.', $dom));
	}

	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
	$hora_i = FormUtil::getPassedValue('hora_i', isset($args['hora_i']) ? $args['hora_i'] : null, 'POST');
	$hora_f = FormUtil::getPassedValue('hora_f', isset($args['hora_f']) ? $args['hora_f'] : null, 'POST');
	$minut_i = FormUtil::getPassedValue('minut_i', isset($args['minut_i']) ? $args['minut_i'] : null, 'POST');
	$minut_f = FormUtil::getPassedValue('minut_f', isset($args['minut_f']) ? $args['minut_f'] : null, 'POST');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');


   //confirmació del codi d'autoritzaciï¿œ.
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_timeFrames', 'admin', 'main'));
    }

    //Construim la franja horï¿œria i comprovem que l'hora inicial sigui mï¿œs petita que la hora final
    $hora_inicial=$hora_i.':'.$minut_i;
    $hora_final=$hora_f.':'.$minut_f;

    if ($hora_inicial>=$hora_final) {
		pnSessionSetVar('errormsg', __('The time allocated is not correct.', $dom));
		pnRedirect(pnModURL('iw_timeFrames','admin','new_hour',array('mdid'=>$mdid, 'm'=> 'n')));
		return true;
    }

	// Check for overlaping time periods
 	$overlap =  pnModAPIFunc('iw_timeFrames','admin','overlap',array('mdid' => $mdid,'start'=>$hora_inicial,'end'=>$hora_final));
	if ($overlap) {
		LogUtil::registerError(__('Warning! The new time is overlaps with some of the existing ones.', $dom));
	}
   
    //Insert new time into DB
    $lid = pnModAPIFunc('iw_timeFrames','admin','create_hour',array('mdid' => $mdid,'start'=>$hora_inicial,'end'=>$hora_final, 'descriu'=>$descriu));

    if ($lid != false) {
        //S'ha creat una nova hora dins del marc horari
        pnSessionSetVar('statusmsg', __('Have created a new time in timeFrame', $dom));
    }
	$horari = pnModAPIFunc('iw_timeFrames','user','getall_horari',array('mdid'=>$mdid));
	!empty($horari)?$hi_ha_hores = true : $hi_ha_hores = false;
    pnRedirect(pnModURL('iw_timeFrames', 'admin', 'timetable',array('mdid'=>$mdid)));
	
    //Retorna havent acabat el procï¿œs satisfactï¿œriament
    return true;

}

/*
funció que presenta el formulari que ens mostra l'horari i informació de l'hora que es vol esborrar
*/
function iw_timeFrames_admin_delete_hour($args)
{
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	// Mirar si existeixen reserves que facin referï¿œncia a aquest marc horari
	if (pnModAPIFunc('iw_timeFrames','admin','hasbookings',array('mdid'=>$mdid))){
		return LogUtil::registerError(__('Operation unavailable. There are reservations on this time frame.', $dom));
	}

	$hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
	$confirmacio = FormUtil::getPassedValue('c', isset($args['c']) ? $args['c'] : null, 'GET');

    //Cridem la funció de l'API de l'usuari que ens retornarï¿œ la informació del registre demanat

    $theHour = pnModAPIFunc('iw_timeFrames','user','get_hour',array('hid' => $hid));

    if ($theHour == false) {
       return LogUtil::registerError(__('Can not find the timeFrame over which do the action.', $dom));
    }

    //Comprovaciï¿œ de seguretat
    if (!pnSecAuthAction(0, 'iw_timeFrames::Item', "$registre[nom_marc]::$mdid", ACCESS_DELETE)) {
        return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom));
    }

    //Demanem confirmació per l'esborrament del registre, si no s'ha demanat abans
    if (empty($confirmacio)) {
		$horari = pnModAPIFunc('iw_timeFrames','user','getall_horari',array('mdid'=>$mdid));
	 	$item = pnModAPIFunc('iw_timeFrames','user','get',array('mdid' => $mdid));

		$pnRender = pnRender::getInstance('iw_timeFrames',false);

		$pnRender->assign('nom_marc',$item['nom_marc']);
		$pnRender->assign('start',date('H:i', strtotime($theHour['start'])));
		$pnRender->assign('end',date('H:i', strtotime($theHour['end'])));
		$pnRender->assign('horari',$horari);
		$pnRender->assign('mdid',$mdid);
		$pnRender->assign('hid',$hid);
									
		return $pnRender->fetch('iw_timeframes_admin_deletehour.htm');
	}
    //L'usuari ha confirmat l'esborrament del registre i procedim a fer-ho efectiu
    //Cridem la funció API que farà l'esborrament del registre
    if (pnModAPIFunc('iw_timeFrames','admin','delete_hour',array('hid' => $hid))) {
        //L'esborrament ha estat un ï¿œxit i ho notifiquem
        pnSessionSetVar('statusmsg',__('Was deleted the time in timeFrame', $dom));
    }

    //Enviem a l'usuari a la taula amb les hores del marc horari
    pnRedirect(pnModURL('iw_timeFrames', 'admin', 'timetable',array('mdid'=>$mdid)));

    //Retornem el valor true ja que l'esborrament ha estat possible
    return true;
}

/*
funció que presenta el formulari que ens mostra i permet editar les dades d'una hora que es vol modificar
*/
function iw_timeFrames_admin_edit_hour($args){

	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	$hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}

	// Mirar si existeixen reserves que facin referï¿œncia a aquest marc horari
	if (pnModAPIFunc('iw_timeFrames','admin','hasbookings',array('mdid'=>$mdid))){
		return LogUtil::registerError(__('Operation unavailable. There are reservations on this time frame.', $dom));
	}

	
	$period = pnModAPIFunc('iw_timeFrames','user','get_hour',array('hid' => $hid));
    if ($period == false) {
       return LogUtil::registerError(__('Can not find the timeFrame over which do the action.', $dom));
    }

	pnRedirect(pnModURL('iw_timeFrames', 'admin', 'new_hour',array('mdid'=>$mdid, 'hid'=> $hid, 'm'=> 'e')));
	return true;
}

/*
funció que comprova que les dades enviades des del formulari de modificaciï¿œ d'una
hora per un marc horari s'ajusten al que ha de ser i envia l'ordre d'actualitzar el registre
*/

function iw_timeFrames_admin_update_hour($args){
	$dom=ZLanguage::getModuleDomain('iw_timeFrames');
	// Security check
	if (!SecurityUtil::checkPermission('iw_timeFrames::', "::", ACCESS_EDIT)) {
		return LogUtil::registerError(__('Not authorized to manage timeFrames.', $dom), 403);
	}
	$hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'POST');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
	$hora_i = FormUtil::getPassedValue('hora_i', isset($args['hora_i']) ? $args['hora_i'] : null, 'POST');
	$hora_f = FormUtil::getPassedValue('hora_f', isset($args['hora_f']) ? $args['hora_f'] : null, 'POST');
	$minut_i = FormUtil::getPassedValue('minut_i', isset($args['minut_i']) ? $args['minut_i'] : null, 'POST');
	$minut_f = FormUtil::getPassedValue('minut_f', isset($args['minut_f']) ? $args['minut_f'] : null, 'POST');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');

	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_TImeFrames', 'admin', 'horari',array('mdid'=>$mdid)));
    }

    //Construim la franja horï¿œria i comprovem que l'hora inicial sigui mï¿œs petita que la hora final
    $start=$hora_i.':'.$minut_i;
    $end=$hora_f.':'.$minut_f;

    if ($start>=$end) {
		pnSessionSetVar('errormsg', __('The time allocated is not correct.', $dom));
		pnRedirect(pnModURL('iw_timeFrames','admin','timetable',array('mdid'=>$mdid)));
		return true;
    }
    
	// Check for overlaping time periods
 	$overlap =  pnModAPIFunc('iw_timeFrames','admin','overlap',array('mdid' => $mdid,'start'=>$start,'end'=>$end, 'hid'=> $hid));
	if ($overlap) {
		LogUtil::registerError(__('Warning! The new time is overlaps with some of the existing ones.', $dom));
	}
 
    //Insert new time into DB
    $lid = pnModAPIFunc('iw_timeFrames','admin','update_hour',
						array('mdid' => $mdid,'start'=>$start,'end'=>$end, 'descriu'=>$descriu, 'hid'=> $hid));

    if (!empty ($lid)) {
        //S'ha creat una nova hora dins del marc horari
        pnSessionSetVar('statusmsg', __('Has changed the time.', $dom));
    }
	$horari = pnModAPIFunc('iw_timeFrames','user','getall_horari',array('mdid'=>$mdid));
	!empty($horari)?$hi_ha_hores = true : $hi_ha_hores = false;
    pnRedirect(pnModURL('iw_timeFrames', 'admin', 'timetable',array('mdid'=>$mdid)));

    //Retorna havent acabat el procï¿œs satisfactï¿œriament
    return true;	
}
?>
