<?php

/**
 * Admin main page
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return	List of the available spaces or equipements
 */
function iw_bookings_admin_main(){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$pnRender = pnRender::getInstance('iw_bookings', false);

    //Call getall i que retornar� la informaci�
    $items = pnModAPIFunc('iw_bookings','user','getall');	

    //Are defined booking locations?
    (empty($items))?$hi_ha_espais=false:$hi_ha_espais=true;

    foreach ($items as $item) {
		//Si la descripci� de l'espai arriba buida hi posem uns guions per tal que la taula no quedi lletja		
		(empty($item['description']))?$item['description']='---':"";
		
		//Recollim el nom del marc horari
		$marc=pnModAPIFunc('iw_bookings','admin','nom_marc',array('mdid' => $item['mdid']));

		(!empty($marc))?$item['mdid']=$marc:$item['mdid']="---";
		//Si les observacions arriben buides hi posem uns guions per tal que la taula no quedi lletja
		($item['vertical']==1)?$item['vertical']=__('Column',$dom):$item['vertical']=__('Row', $dom);
		if (pnModGetVar('iw_bookings', 'showcolors')) { $color = $item['color'];} else {$color = "#FFFFFF";}
		$espais[]=array('sid'=>$item['sid'],'nom_espai'=>$item['space_name'],'descriu'=>$item['description'],'vertical'=>$item['vertical'],
	                	'actiu'=>$item['active'],'mdid'=>$item['mdid'],'color'=>$color);
    }
    $pnRender->assign('espais',$espais);
    $pnRender->assign('hi_ha_espais',$hi_ha_espais);

    return $pnRender->fetch('iw_bookings_admin_main.htm');
} //END main


/**
 * Show the module information
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return	The module information
 */
function iw_bookings_admin_module(){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_bookings', 'type' => 'admin'));

	$pnRender = pnRender::getInstance('iw_bookings',false);
	$pnRender -> assign('module', $module);
    return $pnRender->fetch('iw_bookings_admin_module.htm');
} 

/*
Shows current module configuration and allows modify it
*/
function iw_bookings_admin_conf() {
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$sv = pnModFunc('iw_main','user','genSecurityValue');
	$grups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																'less' => pnModGetVar('iw_myrole', 'rolegroup')));
	
	//Omplim el nombre de setmanes vista per fer les reserves
    if (empty($grups)) {
		return LogUtil::registerError (__('No groups found', $dom));
    }    

	// Create output object
	$pnRender = pnRender::getInstance('iw_bookings',false);

	$pnRender->assign('grups',$grups);
	$pnRender->assign('grup',pnModGetVar('iw_bookings', 'group'));
	$pnRender->assign('setmanes',pnModGetVar('iw_bookings', 'weeks'));
	$pnRender->assign('capsetmana',pnModGetVar('iw_bookings', 'weekends')); //
	$pnRender->assign('taula',pnModGetVar('iw_bookings', 'month_panel'));
	$pnRender->assign('delantigues',pnModGetVar('iw_bookings', 'eraseold'));
	$pnRender->assign('mostracolors',pnModGetVar('iw_bookings', 'showcolors'));
    $pnRender->assign('NTPtime', pnModGetVar('iw_bookings', 'NTPtime'));

	return $pnRender->fetch('iw_bookings_admin_conf.htm');
} //END conf


/*
Apply configuration module changes
Funció que fa efectiva la modificació de la configuraci� del m�dul
*/
function iw_bookings_admin_conf_modifica($args)
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');
	
	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
	$setmanes = FormUtil::getPassedValue('setmanes', isset($args['setmanes']) ? $args['setmanes'] : null, 'POST');
	$taula = FormUtil::getPassedValue('taula', isset($args['taula']) ? $args['taula'] : null, 'POST');
	$capsetmana = FormUtil::getPassedValue('capsetmana', isset($args['capsetmana']) ? $args['capsetmana'] : null, 'POST');
	$delantigues = FormUtil::getPassedValue('delantigues', isset($args['delantigues']) ? $args['delantigues'] : null, 'POST');
	$mostracolors = FormUtil::getPassedValue('mostracolors', isset($args['mostracolors']) ? $args['mostracolors'] : null, 'POST');
	$NTPtime = FormUtil::getPassedValue('NTPtime', isset($args['NTPtime']) ? $args['NTPtime'] : null, 'POST');

	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_bookings', 'admin', 'main'));
    }
	
    if (!isset($grup)) {
		$grup = 0;
	}
    if (!is_numeric($setmanes)) {
		$setmanes=1;
	}

    pnModSetVar('iw_bookings', 'group', $grup); //grup
   	pnModSetVar('iw_bookings', 'weeks',  $setmanes); // setmanes
   	pnModSetVar('iw_bookings', 'month_panel', $taula); // taula_mes
    pnModSetVar('iw_bookings', 'weekends', $capsetmana);  // capssetmana
   	pnModSetVar('iw_bookings', 'eraseold', $delantigues); // delantigues
    pnModSetVar('iw_bookings', 'showcolors', $mostracolors); // mostracolors
    pnModSetVar('iw_bookings', 'NTPtime', $NTPtime); // mostracolors


	LogUtil::registerStatus(__('Configuration updated', $dom));
    pnRedirect(pnModURL('iw_bookings', 'admin', 'main'));

    return true;
} // END conf_modifica


/**
 * Show the form needed to create a new space or equipement to book
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return	The creation form
 */
function iw_bookings_admin_new(){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
	$m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');

	//Get space information for edition purposes
	if(!empty($sid)){
	    //Get register information
	    $registre = pnModAPIFunc('iw_bookings','user','get',array('sid' => $sid));
	    if ($registre == false) {
	        return LogUtil::registerError(__('Error! Could not load module.', $dom));
	    }
	
		//Fill in values
	    $nom_espai=$registre['space_name'];
	    $descriu=$registre['description'];
	    $actiu=$registre['active'];
	    $vertical=$registre['vertical'];
	    $mdid=$registre['mdid'];
	    $color=$registre['color'];
	}

    //Func marcs: Check for existing time frames.
    //If exists, returns an array with timeframe's names 
    //otherwise, an empty array.
    $marcs=pnModApiFunc('iw_bookings','admin','marcs');

	(empty($marcs))?$hi_ha_marcs=false:$hi_ha_marcs=true;

	switch ($m) {
		case 'n':
			$accio=__('Add a new booking', $dom);
			$acciosubmit=__('Create the room or equipment', $dom);
		break;
		case 'e':
			$accio=__('Edit room or equipment', $dom);
			$acciosubmit=__('Update', $dom);
		break;
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_bookings',false);

	$pnRender->assign('nom_espai',$nom_espai);
	$pnRender->assign('descriu',$descriu);
	$pnRender->assign('color',$color);	
	$pnRender->assign('actiu',$actiu);
	$pnRender->assign('hi_ha_marcs',$hi_ha_marcs);
	$pnRender->assign('marcs',$marcs);
	$pnRender->assign('mdid',$mdid);
	$pnRender->assign('vertical',$vertical);
	$pnRender->assign('m',$m);
	$pnRender->assign('accio',$accio);
	$pnRender->assign('acciosubmit',$acciosubmit);	
	$pnRender->assign('sid',$sid);	

    return $pnRender->fetch('iw_bookings_admin_new.htm');
} //END new


/*
Funció que comprova que les dades enviades des del formulari de creaci� d'un
nou espai s'ajusten al que ha de ser i envia l'ordre de crear el registre a la
funció new de l'API

Validate space form info and call the API function "new" 
*/
function iw_bookings_admin_create($args)
{
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$nom_espai = FormUtil::getPassedValue('nom_espai', isset($args['nom_espai']) ? $args['nom_espai'] : null, 'POST');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');
	$actiu = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'POST');
	$color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'POST');
	$vertical = FormUtil::getPassedValue('vertical', isset($args['vertical']) ? $args['vertical'] : null, 'POST');
	$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
	$m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');

	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::generateAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_bookings', 'admin', 'main'));
	}

    (empty($mdid))?$vertical=0:"";
    
	($actiu=='on')? $actiu=1:$actiu=0;
	($vertical=='on')? $vertical=1:$vertical=0;

	if($m=='n'){
    	//Es crida la funció API amb les dades extretes del formulari
	    if (pnModAPIFunc('iw_bookings','admin','create',
						  array('nom_espai' => $nom_espai,
								'descriu' => $descriu,
								'actiu' => $actiu,
								'mdid' => $mdid,
								'vertical' => $vertical,
								'color'=>$color))) {
    	    //S'ha creat l'espai de reserva correctament
			//success
			LogUtil::registerStatus (__('A new room or equipment to book has been created', $dom));
	    }
	}
	else {
    	if(pnModAPIFunc('iw_bookings','admin','update',
						  array('sid' => $sid,
								'nom_espai' => $nom_espai,
								'descriu' => $descriu,
								'actiu' => $actiu,
								'mdid' => $mdid,
								'vertical' => $vertical,
								'color'=>$color))) {
			//La modificaci� s'ha fet amb �xit
			// Success
			LogUtil::registerStatus (__('Room or equipment updated', $dom));
     	}
	}
    pnRedirect(pnModURL('iw_bookings', 'admin', 'main'));

    //Retorna havent acabat el proc�s satisfact�riament
    return true;
} // END create


/*
Funció que fa l'esborrament d'un espai o equip
*/
function iw_bookings_admin_delete($args)
{ 
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'REQUEST');
	$confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
	}

    //Cridem la funci� de l'API de l'usuari que ens retornar� la inforamci� del
    //registre demanat
    $registre = pnModAPIFunc('iw_bookings','user','get',array('sid' => $sid));

    if ($registre == false) {
		LogUtil::registerError (__('The room or equipment was not found', $dom));
		return true;
    }

	$pnRender = pnRender::getInstance('iw_bookings', false);

    //Demanem confirmaci� per l'esborrament del registre, si no s'ha demanat abans
    if (empty($confirmation)) {
    	//Afegim el men� de l'administrador
	    $pnRender->assign('nom_espai',$registre['space_name']);
		$pnRender->assign('sid',$sid);
		return $pnRender->fetch('iw_bookings_admin_del.htm');		
    }

    //L'usuari ha confirmat l'esborrament del registre i procedim a fer-ho efectiu
	// After user confirmation proceed with the space deletion
	// Confirm authorisation code
	if (!SecurityUtil::generateAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_bookings', 'admin', 'main'));
	}

    //Cridem la funci� API que far� l'esborrament del registre
    if (pnModAPIFunc('iw_bookings','admin','delete',array('sid' => $sid))) {
        //L'esborrament ha estat un �xit i ho notifiquem
        LogUtil::registerStatus (__('Room or equipment deleted', $dom).": ".$registre['space_name']);
    }

    //Enviem a l'usuari a la taula d'espais i equipaments per reservar
    pnRedirect(pnModURL('iw_bookings', 'admin', 'main'));

    //Retornem el valor true ja que l'esborrament ha estat possible
    return true;
} //END delete


/*
Funció que mostra la taula de les reserves temporals
*/
function iw_bookings_admin_mostra_taula($arg){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

 	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
	}

	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
	$vertical = FormUtil::getPassedValue('vertical', isset($args['vertical']) ? $args['vertical'] : null, 'GET');

    //Array amb els noms dels dies de la setmana
	$dies=array(__('Monday', $dom),__('Tuesday', $dom),__('Wednesday', $dom),__('Thursday', $dom),__('Friday', $dom));

	$pnRender = pnRender::getInstance('iw_bookings', false);

	// Get space info
    $espai = pnModAPIFunc('iw_bookings','user','get',array('sid' => $sid));

    //D'entrada farem que les taules es mostrin de forma horitzontal. Despr�s, si
    //hi ha un marc horari definit canviarem al que correspongui

    $vertical=0;

    //Comprovem si la taula est� lligada a un marc horari i si aquest marc horari
    //no ha estat esborrat

     if($espai['mdid']!=0){
        //Busquem les franges hor�ries
        $franges=pnModAPIFunc('iw_bookings','user','getall_hores',array('mdid' => $espai['mdid']));
        if (!empty($franges)){
			$vertical=$espai['vertical'];
		}
     }

   //Carreguem les funcions GUI de l'usuari
    if (!pnModLoad('iw_bookings', 'user')) {
        return LogUtil::registerError(__('Error! Could not load module.', $dom), 403);
    }

	//Es crida la funció API que retorna les reserves temporals de l'espai que volem reservar
	$temporals = pnModAPIFunc('iw_bookings','user','getall_reserves',array('sid' => $sid, 'temporal'=>1));

    //Generem la taula amb el format corresponent
    if ($vertical!=1){
		//Taula en format horitzontal
		$taula=array();
		$d=0;
        foreach ($dies as $dia){
			$i++;
			//Busquem l'hora i dia de la reserva i ho passem a format timestamp
			if ($i>=date("w")){
				$today = DateUtil::getDatetime_NextDay($i-date("w"),'%Y-%m-%d');
			}else{
				$today = DateUtil::getDatetime_NextDay($i+7-date("w"),'%Y-%m-%d');
			}

			$tomorrow = DateUtil::getDatetime(DateUtil::makeTimestamp($today)+24*3600, '%Y-%m-%d');

			//Es crida la funci� API que retorna les reserves puntuals de l'espai que volem reservar
            
			$registres=array();
			//Afegim les reserves temporals a la matriu registres fent la correcci� de la data
			foreach($temporals as $temporal){

				//Mirem que coincideixi el dia de la setmana
				if($temporal['dayofweek']== $i) { 
					$registres[] = array('inici' => $temporal['inici'],
										'final' => $temporal['final'],
										'bid' => $temporal['bid'],
										'usuari' => $temporal['usuari'],
										'grup' => $temporal['grup'],
										'dow' => $dies[$i-1],
										'temp' => $temporal['temp']);
				}
			}

			//Reordenem la matriu de registres
			sort($registres);

            if (!empty($registres)){
				$nr=0;
                foreach ($registres as $registre) {
					$registre['data']=$registre['dow'];
					$registre['inici']=date('H:i', strtotime($registre['inici'])); 
					$registre['final']=date('H:i', strtotime($registre['final']));
					$registre['usuari']=pnModFunc('iw_main','user','getUserInfo', 
												  array('uid' => $registre['usuari'], 
												  		 'sv' => pnModFunc('iw_main','user','genSecurityValue'), 
														 'info'=> 'ncc'));
	                $taula[$d][$nr]= $registre;
					$nr++; //Incrementem l'�ndex de reserves del dia
				}
				$d++;  //Incrementem el dia
            }
        } // foreach $dies
		$pnRender->assign('numdies',count($taula));
		$pnRender->assign('record',$taula);

    }else{ // format vertical
        //Creem la cap�alera de la taula amb els dies de la setmana i les dates
        $dies_data=array();
        foreach ($dies as $dia){
            $i++;
			if ($i>=date("w")){
				$today = DateUtil::getDatetime_NextDay($i-date("w"),'%Y-%m-%d');
			}else{
				$today = DateUtil::getDatetime_NextDay($i+7-date("w"),'%Y-%m-%d');
			}
			//$dies_data[$i-1]=DateUtil::formatDatetime($today,'%d/%m/%y');
        }
        //Generem les franges horàries amb les corresponents reserves
		$i=0; $f=0;
        foreach ($franges as $franja){
			$horari[$i]['hi']=substr($franja['hora'],0,5);
			$horari[$i]['hf']= substr($franja['hora'],-5);
			$i++;
            $j=0;
			$d=0;

            foreach ($dies as $dia){
                $registre1 = array(); 
				$j++;

				//Afegim a la matriu registre1 les dades de les reserves temporals amb hores d'inici i final coincidents
				
				foreach($temporals as $temporal){
					//Mirem que coincideixi el dia de la setmana
					if($temporal['dayofweek']== $j 
					&&(date('H:i', strtotime($temporal['inici']))==substr($franja['hora'],0,5))
					&&(date('H:i', strtotime($temporal['final']))==substr($franja['hora'],-5))){
						$registre1 = array('inici' => $temporal['inici'],
										'final' => $temporal['final'],
										'bid' => $temporal['bid'],
										'grup' => $temporal['grup'],
										'temp' => $temporal['temp'],
										'usuari'=> pnModFunc('iw_main','user','getUserInfo', 
												   array('uid' => $temporal['usuari'], 
														'sv' => pnModFunc('iw_main','user','genSecurityValue'), 
														'info'=> 'ncc')));
					}
				}//die();
				$taula[$f][$d]=$registre1;
                if(empty($registre1)){
					$taula[$f][$d]['usuari']=" - ";
                }
				// Incrementem el dia de la setmana 
				// Increase the day of week
				$d++;
            }
			// Passem a la seg�ent franja hor�ria
			// Next timeframe
			$f++;
        }
		$pnRender->assign('franges', $franges);
		$pnRender->assign('horari',$horari);
		$pnRender->assign('record',$taula);
    }

	$pnRender->assign('vertical',$vertical);
	$pnRender->assign('sid',$sid);
	$pnRender->assign('dies',$dies);
    return $pnRender->fetch('iw_bookings_admin_taula.htm');
} //END mostra_taula


/*
Funci� que retorna el formulari per a les assignacions temporals (permanents)
*/
function iw_bookings_admin_formulari_assigna($arg){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
	$dow = FormUtil::getPassedValue('dow', isset($args['dow']) ? $args['dow'] : null, 'GET');
	$period = FormUtil::getPassedValue('fh', isset($args['fh']) ? $args['fh'] : null, 'GET');

 	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
	}

    //Es crida la funci� API que retorna les dades de l'espai que volem reservar
    $espai = pnModAPIFunc('iw_bookings','user','get',array('sid' => $sid));

    if($espai['mdid']!=0){
    	//Busquem les franges hor�ries i les tornem en forma de matriu per un MultiSelect
        $franges=pnModAPIFunc('iw_bookings','user','getall_hores_MS', array('mdid' => $espai['mdid']));
     }	
	($period>= 0)?$period = $franges[$period]['id']:$period =null;
    //Constru�m l'array dels dies per el formulari

    $dia=array(array('id'=>'1','name'=>__('Monday', $dom)),
               array('id'=>'2','name'=>__('Tuesday', $dom)),
               array('id'=>'3','name'=>__('Wednesday', $dom)),
               array('id'=>'4','name'=>__('Thursday', $dom)),
               array('id'=>'5','name'=>__('Friday', $dom)));

    $hora=array(array('id'=>'0','name'=>'08'),
                array('id'=>'1','name'=>'09'),
                array('id'=>'2','name'=>'10'),
                array('id'=>'3','name'=>'11'),
                array('id'=>'4','name'=>'12'),
                array('id'=>'5','name'=>'13'),
                array('id'=>'6','name'=>'14'),
                array('id'=>'7','name'=>'15'),
                array('id'=>'8','name'=>'16'),
                array('id'=>'9','name'=>'18'),
                array('id'=>'10','name'=>'19'),
                array('id'=>'11','name'=>'20'),
                array('id'=>'12','name'=>'21'),
                array('id'=>'13','name'=>'22'));

    $minut=array(array('id'=>'0','name'=>'00'),
                array('id'=>'1','name'=>'05'),
                array('id'=>'2','name'=>'10'),
                array('id'=>'3','name'=>'15'),
                array('id'=>'4','name'=>'20'),
                array('id'=>'5','name'=>'25'),
                array('id'=>'6','name'=>'30'),
                array('id'=>'7','name'=>'35'),
                array('id'=>'8','name'=>'40'),
                array('id'=>'9','name'=>'45'),
                array('id'=>'10','name'=>'50'),
                array('id'=>'11','name'=>'55'));
  
	//Busquem la llista del professorat del centre
	$sv = pnModFunc('iw_main','user','genSecurityValue');
	//Agafem els grups de la preperats per un MultiSelect
	$professorat = pnModFunc('iw_main', 'user', 'getMembersGroup', array('gid' => pnModGetVar('iw_bookings', 'group'), 'sv' => $sv));
	sort($professorat);
    if (empty($professorat)){
		return LogUtil::registerError(__('Permanent bookings are not possible as long as the group is empty. Please check module configuration', $dom), 403);
    }

	$pnRender = pnRender::getInstance('iw_bookings', false);

	$pnRender->assign('dayofweek',$dow);
	$pnRender->assign('period',$period);
	$pnRender->assign('dayofweek1',$dow+1);
    $pnRender->assign('franges',$franges);    
    $pnRender->assign('dia',$dia);
    $pnRender->assign('hora',$hora);
    $pnRender->assign('minut',$minut);
    $pnRender->assign('sid', $sid);
	$pnRender->assign('professorat',$professorat);

	return $pnRender->fetch('iw_bookings_admin_assigna_frm.htm');
} // END formulari_assigna


/*
Funci� que filtra les dades de les reserves temporals abans d'entrar-les a la base de dades
*/
function iw_bookings_admin_reserva($arg){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

	// Security check
	if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
	}
    
	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
	$profe = FormUtil::getPassedValue('profe', isset($args['profe']) ? $args['profe'] : null, 'POST');
	$inici_h = FormUtil::getPassedValue('inici_h', isset($args['inici_h']) ? $args['inici_h'] : null, 'POST');
	$inici_m = FormUtil::getPassedValue('inici_m', isset($args['inici_m']) ? $args['inici_m'] : null, 'POST');
	$final_h = FormUtil::getPassedValue('final_h', isset($args['final_h']) ? $args['final_h'] : null, 'POST');
	$final_m = FormUtil::getPassedValue('final_m', isset($args['final_m']) ? $args['final_m'] : null, 'POST');
	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
	$period = FormUtil::getPassedValue('hora', isset($args['hora']) ? $args['hora'] : null, 'POST');
	$finish_date = FormUtil::getPassedValue('date', isset($args['date']) ? $args['date'] : null, 'POST');

   //Confirmaci� del codi d'autoritzaci�.
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_bookings', 'admin', 'main'));
    }

    $dies=array('',__('Monday', $dom),__('Tuesday', $dom),__('Wednesday', $dom),__('Thursday', $dom),__('Friday', $dom));

    // Comprovem que s'han complimentat el camp grup en el formulari
    if (empty($grup)) {
		LogUtil::registerError(__('You must specify a group', $dom));
		pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
	    return true;
    }

    // Comprovem que s'han complimentat el camp usuari en el formulari
    if (empty($profe)) {
		LogUtil::registerError(__('You must specify a user for preferential booking', $dom));
		pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
	    return true;
    }
    
    // Check if finsh_date is selected and is higger than actual date
    if (empty($finish_date)){
        LogUtil::registerError(__('You must specify a finish date', $dom));
		pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
	    return true;
    }else{
        $finish_date = strtotime($finish_date);
        if($finish_date < strtotime('today')){
            LogUtil::registerError(__('Finish date is minnor than actual date', $dom));
    		pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
    	    return true;
        }    
    }    
    
    // 

	//Busquem l'hora i dia de la reserva i ho passem a format timestamp
	if ($dia>=date("w")){
		$bookingDate = DateUtil::getDatetime_NextDay($dia-date("w"), '%Y-%m-%d');
	}else{
		$bookingDate = DateUtil::getDatetime_NextDay($dia+7-date("w"), '%Y-%m-%d');
	}

    if(empty($period)){
	    $start_hour=$inici_h.':'.$inici_m;
		$end_hour=$final_h.':'.$final_m;
    }
	else {
		$start_hour = pnVarPrepForStore(substr($period,0,5));
		$end_hour = substr($period, -5);	
	} 

	//Check if start time period is minor than end time, otherwise triggers an error
	if ($start_hour>=$end_hour) {
		LogUtil::registerError($start_hour.__('Finish time is earlier than start time', $dom).$end_hour);
		pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
	    return true;
	}
	
	// Booking date and time 
	$start = $bookingDate." ".$start_hour;
	$end = $bookingDate." ".$end_hour;

	//Check for booking disponibility. 
	$occupied = pnModAPIFunc('iw_bookings','admin','reservat',array('sid' => $sid,'inici'=>$start,'final'=>$end));

	if($occupied){
		//The requested booking isn't available
		LogUtil::registerError(__('Chosen time for preferential booking is occupied', $dom));
		pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
	    return true;
	}
    // Insert booking into DB
	$success = pnModAPIFunc('iw_bookings','admin','fer_reserva',array('sid' => $sid,'inici'=>$start,'final'=>$end,'grup'=>$grup,'profe'=>$profe,'finish_date'=>$finish_date));

	if(!$success){
		// DB booking insertion hasn't worked properly
		//Hi ha hagut algun error a l'hora d'introduir la reserva a la BD
		LogUtil::registerError(__('Booking failed', $dom));
		pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
	    return true;

	}
	pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
	return true;
// Si es vol que aparegui informaci� de la reserva realitzada 
/*	$pnRender = pnRender::getInstance('iw_bookings', false);

	// Inform user: success in booking action
	$pnRender->assign('sid',$sid);	
	$pnRender->assign('diareserva',$dies[$dia]);
	$pnRender->assign('horainici',$start_hour);
	$pnRender->assign('horafinal',$end_hour);
	$pnRender->assign('grup',$grup);

    return $pnRender->fetch('iw_bookings_admin_reserva.htm');
*/
} //END reserva


/*
Funci� per a l'anul�laci� d'una reserva de la base de dades
*/
function iw_bookings_admin_anulla($arg){
	$dom = ZLanguage::getModuleDomain('iw_bookings');
	
    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
	$bid = FormUtil::getPassedValue('bid', isset($args['bid']) ? $args['bid'] : null, 'GET');

    if (!pnSecAuthAction(0, 'iw_bookings::', '::', ACCESS_ADMIN)) {
  		LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
		pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna', array('sid'=> $sid)));
	    return true;  
	}
    
    //Sense m�s pre�mbuls eliminem la reserva de la base de dades
    $anullat = pnModAPIFunc('iw_bookings','admin','anulla',array('bid' => $bid));

    if(!$anullat){
        LogUtil::registerError(__('An error has occurred while deleting the register', $dom));
        return true;
    }
    LogUtil::registerStatus(__('Preferential booking cancelled', $dom));
    pnRedirect(pnModURL('iw_bookings', 'admin', 'assigna',array('sid'=>$sid)));
	return true;
}


/*
Funci� que buida la taula de les reserves d'un determinat espai o equip. Demana confirmaci�
*/
function iw_bookings_admin_buida($args){
	$dom = ZLanguage::getModuleDomain('iw_bookings');

    //Recollim els par�metres per poder fer l'esborrament de l'espai
    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'REQUEST');
	$confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
	$authid = FormUtil::getPassedValue('authid', isset($args['authid']) ? $args['authid'] : null, 'POST');

    //Cridem la funci� de l'API de l'usuari que ens retornar� la informaci� del
    //registre demanat
    $registre = pnModAPIFunc('iw_bookings','user','get',array('sid' => $sid));

    if ($registre == false) {
  		LogUtil::registerError(__('The room or equipment was not found', $dom));
		pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid'=> $sid)));
	    return true; 
    }
	
    //Comprovaci� de seguretat
    if (!pnSecAuthAction(0, 'iw_bookings::', "::", ACCESS_ADMIN)) {
  		LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
		pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid'=> $sid)));
	    return true;
    }

	$pnRender = pnRender::getInstance('iw_bookings', false);

    //Demanem confirmaci� per l'esborrament del registre, si no s'ha demanat abans
    if (empty($confirmation)) {
    	//Afegim el men� de l'administrador
	    $pnRender->assign('nom_espai',$registre['space_name']);
		$pnRender->assign('sid',$sid);
		return $pnRender->fetch('iw_bookings_admin_emptyspace.htm');		
    }

    //L'usuari ha confirmat l'esborrament del registre i procedim a fer-ho efectiu
   //Confirmaci� del codi d'autoritzaci�.
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_bookings', 'admin', 'assigna',array('sid' => $sid)));
    }

    //Cridem la funci� API que far� l'esborrament del registre
    if (pnModAPIFunc('iw_bookings','admin','buida',array('sid' => $sid))) {
        //L'esborrament ha estat un �xit i ho notifiquem
        LogUtil::registerStatus(__('Table emptied', $dom));
    }

    //Enviem a l'usuari a la taula d'espais i equipaments per reservar
    pnRedirect(pnModURL('iw_bookings', 'user', 'assigna',array('sid' => $sid)));

    //Retornem el valor true ja que l'esborrament ha estat possible
    return true;
}


function iw_bookings_admin_deleteAllBookings()
{
    pnModAPIFunc('iw_bookings','admin','deleteAllBookings'); 
    pnRedirect(pnModURL('iw_bookings', 'admin', 'main'));

    return true;
}
?>
