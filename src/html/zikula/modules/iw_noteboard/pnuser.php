<?php
/**
 * Show the list of notes that an user can read
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the topic that is viewing the user, the id of the note and if the user is in the saved mode
 * @return:	The list of notes that the user can read
*/
function iw_noteboard_user_main($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get the parameters
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'GET');
	$tema = FormUtil::getPassedValue('tema', isset($args['tema']) ? $args['tema'] : 0, 'REQUEST');
	$saved = FormUtil::getPassedValue('saved', isset($args['saved']) ? $args['saved'] : null, 'REQUEST');
	$marked = FormUtil::getPassedValue('marked', isset($args['marked']) ? $args['marked'] : 0, 'REQUEST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// get user identity
	$uid = pnUserGetVar('uid');
	if($uid == ''){$uid = '-1';}

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => $uid));

	// Get all current groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$allgroups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																	'plus' => __('Unregistered', $dom)));
	//get notes from shared noteboards
	$currentuser_groups = $permissions['grups'];

	array_walk($currentuser_groups, 'iw_noteboard_user_groupidtonamemd5', $allgroups);
	$str_groups = "";
	foreach ($currentuser_groups as $user_group){
		$str_groups .= "&g[]=".$user_group;
	}

	// Display shared noteboard notes
	$shared_urls = pnModAPIFunc('iw_noteboard','user','getallSharedURL');
	foreach ($shared_urls as $shared){
		$url = $shared['url'].$str_groups;
		$rss_content = pnModAPIFunc('iw_noteboard', 'user', 'display_rss', array("url" => $url));
	}

	// Get all the notes that have been sended
	if(isset($saved) && 
		$saved == 1 && 
		$permissions['potverificar']){
		$registres = pnModAPIFunc('iw_noteboard', 'user', 'getallcaducated', array('tema' => $tema,
																					'nid' => $nid));
	}else{
		$registres = pnModAPIFunc('iw_noteboard', 'user', 'getall', array('tema' => $tema,
																			'nid' => $nid,
																			'marked' => $marked));
		$saved = 0;
	}

	if(pnUserLoggedIn()){
		// Get the list of topics
		$temes = pnModAPIFunc('iw_noteboard', 'user', 'getalltemes');
		$temes_MS[] = array('id' => '0',
					'name' => __('All the topics', $dom));
		$temes_MS[] = array('id' => '-1',
					'name'=>__('Not classified', $dom));

		foreach($temes as $untema){
			//Check if user can see the thopic
			$isInArray = in_array($untema['grup'],$permissions['grups']);
			if($isInArray || $permissions['potverificar']){
				$temes_MS[] = array('id' => $untema['tid'],
									'name' => $untema['nomtema']);
			}
		}

		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$havist = pnModFunc('iw_main', 'user', 'userGetVar', array('module' => 'iw_noteboard',
																	'name' => 'viewed',
																	'sv' => $sv));
	}

	$vistes = '$';

	$shareds = pnModAPIFunc('iw_noteboard', 'user', 'getallSharedURL');
	$sharedsArray = array();
	foreach($shareds as $shared){
		$parsed_url = parse_url($shared['url']);
		$start = strpos($parsed_url['query'], "sid=") + 4;
		$sid = substr($parsed_url['query'], $start);
		$base_url=substr($shared['url'],0, strpos($shared['url'], "?"));
		//$sharedsArray[$sid] = $shared['name'];
		$sharedsArray[$sid] = array("name"=>$shared['descriu'], "base_url"=>$base_url);
	}

	foreach ($registres as $registre) {
		// insert the list of groups that have access to the note into an array
		$grups_acces = explode('$',$registre['destinataris']);

		$esta_en_grups_acces = array_intersect($grups_acces,$permissions['grups']);
		$pos = strpos($registre['no_mostrar'],'$'.$uid.'$');

		if(isset($saved) && 
			$saved == 1 &&
			$permissions['potverificar']){
			$pos = 0;
		}

		$marca = (strpos($registre['marca'],'$'.$uid.'$') != 0)? 1 : 0;
		if(pnUserLoggedIn()){
			$tema_anotacio = pnModAPIFunc('iw_noteboard', 'user', 'gettema', array('tid' => $registre['tid']));
		}

		if((($registre['verifica'] == 1 &&
			(count($esta_en_grups_acces) >= 1 ||
			$uid == $registre['informa'])) ||
			$permissions['potverificar']) &&
			$pos == 0){
			// Calc the colour for the list row
			if($registre['verifica'] == 0){
				$bgcolor = 'lightgrey';
			}else{
				$n++;
				$pos = 0;
				if($n % 2 == 0){
					$pos = strpos($havist,'$'.$registre['nid'].'$');
					$bgcolor = ($pos == 0 && pnUserLoggedIn() && $saved == 0) ? pnModGetVar('iw_noteboard','colornewrow1') : pnModGetVar('iw_noteboard','colorrow1');
				}else{
					$pos = strpos($havist,'$'.$registre['nid'].'$');
					$bgcolor = ($pos == 0 && pnUserLoggedIn() && $saved == 0) ? pnModGetVar('iw_noteboard','colornewrow2') : pnModGetVar('iw_noteboard','colorrow2');
				}
			}

			$acces_tema = false;

			//Check if user can see the thopic
			$isInArray = in_array($tema_anotacio['grup'],$permissions['grups']);
			if($isInArray || $registre['potverificar'] || $tema_anotacio['grup'] == 0){
				$acces_tema = true;
			}

			$comentaris_array = array();

			// Get the comments associated to a note
			$comentaris = pnModAPIFunc('iw_noteboard', 'user', 'getallcomentaris', array('ncid' => $registre['nid']));
			
			foreach($comentaris as $comentari){
				if($comentari['verifica'] == 0){
					$bgcolorcomentari = 'lightgrey';
				}else{
					$bgcolorcomentari = $bgcolor;
				}
				$usersList .= $comentari['informa'].'$$';
				$comentaris_array[] = array('nid' => $comentari['nid'],
											'noticia' => DataUtil::formatForDisplayHTML($comentari['noticia']),
											'verifica' => $comentari['verifica'],
											'bgcolorcomentari' => $bgcolorcomentari,
											'data' => date('d/m/y',$comentari['data']),
											'hora' => date('H:i',$comentari['data']),
											'usuari' => $usersFullname[$comentari['informa']],
											'id_user_informa' => $comentari['informa'],
											'id_user' => $uid);
			}

			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$photo = pnModFunc('iw_main', 'user', 'getUserPicture', array('uname' => pnUserGetVar('uname',$registre['informa']),
																			'sv' => $sv));

			// The user can edit their notes
			$pot_editar = false;
			if(($permissions['nivell'] > 4 &&
				$registre['informa'] == $uid &&
				$registre['verifica'] == 1) ||
				($permissions['nivell'] == 7 &&
				$registre['verifica'] == 1) &&
				$registre['sharedFrom'] == ''){
				$pot_editar = true;
			}
			
			// The user can delete his/her notes
			$pot_esborrar=false;
			if(($permissions['nivell'] > 5 &&
				$registre['informa'] == $uid) ||
				$permissions['nivell'] == 7 &&
				$registre['sharedFrom'] == ''){
				$pot_esborrar = true;
			}

			// Get file extension
			$fileExtension = strtolower(substr(strrchr($registre['fitxer'],"."),1));

			// get file icon
			$ctypeArray = pnModFunc('iw_main', 'user', 'getMimetype', array('extension' => $fileExtension));
			$fileIcon = $ctypeArray['icon'];

			$edited = '';

			if($registre['edited'] != '' &&
					pnModGetVar('iw_noteboard','editPrintAfter') != '-1' && 
					$registre['data'] + pnModGetVar('iw_noteboard','editPrintAfter') * 60 < $registre['edited']){
				$edited = date('d/m/y H:i',$registre['edited']);
			}

			$informa = ($registre['sharedFrom'] === '') ? $registre['informa'] : $sharedsArray[$registre['sharedFrom']][name];
			$usersList .= $registre['informa'].'$$';
			if ($registre['sharedFrom']!=null) $created_by=$sharedsArray[$registre['sharedFrom']]['name'];
			else $created_by=$informa;

			$anotacions[] = array('nid' => $registre['nid'],
									'bgcolor' => $bgcolor,
									'data' => date('d/m/y H:i',$registre['data']),
									'acces_tema' => $acces_tema,
									'tema_anotacio' => $tema_anotacio['nomtema'],
									'noticia' => DataUtil::formatForDisplayHTML($registre['noticia']),
									'mes_info' => $registre['mes_info'],
									'text' => $registre['text'],
									'textfitxer' => $registre['textfitxer'],
									'fitxer' => $registre['fitxer'],
									'fileIcon' => $fileIcon,
									'informa' => $informa,
									'photo' => $photo,
									'verifica' => $registre['verifica'],
									'pot_editar' => $pot_editar,
									'pot_esborrar' => $pot_esborrar,
									'admet_comentaris' => $registre['admet_comentaris'],
									'n_comentaris' => count($comentaris),
									'comentaris' => $comentaris_array,
									'marca' => $marca,
									'edited' => $edited,
									'created_by' => $created_by,
									'created_by_url' => $sharedsArray[$registre['sharedFrom']]['base_url'],
									'edited_by' => pnUserGetVar('uname',$registre['edited_by']),
									'public' => $registre['public']);
			$vistes .= '$'.$registre['nid'].'$';
		}
	}

	if($saved != 1 && pnUserLoggedIn()){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');

		if($tema == 0 && $nid == 0 && $marked == 0 && pnModGetVar('iw_noteboard','multiLanguage') == 0){
			pnModFunc('iw_main', 'user', 'userSetVar', array('module' => 'iw_noteboard',
																'name' => 'viewed',
																'value' => $vistes,
																'sv' => $sv));
		}else{
			pnModFunc('iw_main', 'user', 'userSetVar', array('module' => 'iw_noteboard',
																'name' => 'viewed',
																'value' => $havist.$vistes,
																'sv' => $sv));
		}

		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userDelVar', array('module' => 'iw_main_block_news',
															'name' => 'news',
															'sv' => $sv));
	}
	
	// Count the use of the module
	if (pnModAvailable('iw_visits') &&
		pnModIsHooked('iw_visits', 'iw_noteboard')){
		// Insert the record
		pnModAPIFunc('iw_visits', 'user', 'visita');
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$users = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'ccn',
																	'sv' => $sv,
																	'list' => $usersList));

	$pnRender -> assign('temes_MS', $temes_MS);
	$pnRender -> assign('users', $users);
	$pnRender -> assign('tema', $tema);
	$pnRender -> assign('saved', $saved);
	$pnRender -> assign('permisos', $permissions);
	$pnRender -> assign('saved', $saved);	
	$pnRender -> assign('anotacions', $anotacions);
	$pnRender -> assign('loggedIn', pnUserLoggedIn());
	$pnRender -> assign('notRegisteredSeeRedactors', pnModGetVar('iw_noteboard','notRegisteredSeeRedactors'));
	$pnRender -> assign('publicAllowed', pnModGetVar('iw_noteboard','public'));
	$pnRender -> assign('publicSharedURL', pnModGetVar('iw_noteboard','publicSharedURL'));
	$pnRender -> assign('showSharedURL', pnModGetVar('iw_noteboard','showSharedURL'));

	return $pnRender -> fetch('iw_noteboard_user_main.htm');
}

/**
 * Get a file from a server folder even it is out of the public html directory
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	name of the file that have to be gotten
 * @return:	The file information
*/
function iw_noteboard_user_getFile($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// File name with the path
	$fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	return pnModFunc('iw_main', 'user', 'getFile', array('fileName' => $fileName,
								'sv' => $sv));
}

/**
 * Download a file
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	name of the file that have to be downloaded
 * @return:	The file required
*/
function iw_noteboard_user_download($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get the parameters
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'GET');
	$fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if (!isset($fileName) || !isset($nid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$uid = pnUserGetVar('uid');
	if($uid == ''){$uid = '-1';}

	// Get the record information
	$registre = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));
	if ($registre == false) {
		LogUtil::registerError (__('The note has not been found', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));		}

	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => $uid));

	//Check if user really can access to note and file
	$grups_acces = explode('$',$registre['destinataris']);
	$esta_en_grups_acces = array_intersect($grups_acces,$permissions['grups']);
	if((($registre['verifica'] == 1 &&
			(count($esta_en_grups_acces) >= 1 ||
			$uid == $registre['informa'])) ||
			$permissions['potverificar']) &&
			$pos == 0){
		// user can download the file
		$fileNameInServer = pnModGetVar('iw_noteboard','attached').'/'.$fileName;
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		return pnModFunc('iw_main', 'user', 'downloadFile', array('fileName' => $fileName,
										'fileNameInServer' => $fileNameInServer,
										'sv' => $sv));
	}else{
		// user can't download the file because he/she hasn't access to the note
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
}

/**
 * Show the information about the module
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The information about this module
*/
function iw_noteboard_user_module()
{
	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_noteboard',
									'type' => 'user'));
	$pnRender -> assign('module', $module);
	return $pnRender -> fetch('iw_noteboard_user_module.htm');
}

/**
 * Show the form needed to create a new note
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the topic that is viewing the user and if the user is in the saved mode
 * @return:	The values input in the form
*/
function iw_noteboard_user_nova($args)
{
    $dom = ZLanguage::getModuleDomain('iw_noteboard');
	$m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'REQUEST');
    $nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'REQUEST');
    $saved = FormUtil::getPassedValue('saved', isset($args['saved']) ? $args['saved'] : null, 'REQUEST');
    $tema = FormUtil::getPassedValue('tema', isset($args['tema']) ? $args['tema'] : null, 'REQUEST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	if(isset($nid)){		// Get the record information
		$registre = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));
		if ($registre == false) {
			LogUtil::registerError (__('The note has not been found', $dom));
			return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));			}
	}

	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));
	if(!$permissions['potverificar']){	
		$saved = 0;
	}

	if(!$permissions['potverificar'] || ($m != 'c' && $m != 'v' && $m != 'e')){
		if(empty($permissions) ||
			$permissions['nivell'] < 3){
			LogUtil::registerError (__('You are not allowed to do this action', $dom));
			return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
		}

		if(empty($permissions) ||
			($permissions['nivell'] < 5 &&
				$m == 'e') ||
			($permissions['nivell'] < 7 &&
				$registre['informa'] != pnUserGetVar('uid') && $m == 'e')){
			LogUtil::registerError (__('You are not allowed to do this action', $dom));
			return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
		}
	}

	switch($m){
		case 'v':
			if(!$permissions['potverificar']){
				LogUtil::registerError (__('You are not allowed to do this action', $dom));
				return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
			}
			$submit = __('Validate', $dom);
			$titol = __('Validate a note', $dom);
			$permissions['verifica'] = 1;
			break;
		case 'e':
			$titol = __('Modify the configuration', $dom);
			$submit = __('Modify', $dom);
			$permissions['verifica'] = 1;			
			break;
		case 'n':
			$titol = __('Add a note', $dom);
			$submit = __('Send', $dom);
	}

	$temes = pnModAPIFunc('iw_noteboard', 'user', 'getalltemes');

	foreach($temes as $tema1){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		if(pnModFunc('iw_main', 'user', 'isMember', array('uid' => pnUserGetVar('uid'),
									'gid' => $tema1['grup'],
									'sv' => $sv)) || 	
			SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_ADMIN)){
			$temes_MS[] = array('id' => $tema1['tid'],
						'name' => $tema1['nomtema']);
		}
	}
	
	$data = date('d/m/y',time());

	$language = pnusergetlang();

	if(isset($nid)){
		$noticia = $registre['noticia'];
		if($saved != 1){
			$data = date('d/m/y', $registre['data']);
			$caduca = $registre['caduca'];			
			$titulin = $registre['titulin'];
			$titulout = $registre['titulout'];
		}
		$titular = $registre['titular'];
		$mes_info = $registre['mes_info'];
		$text = $registre['text'];
		$fitxer = $registre['fitxer'];
		$textfitxer = $registre['textfitxer'];
		$destinataris = $registre['destinataris'];
		$admet_comentaris = $registre['admet_comentaris'];
		$verifica = $registre['verifica'];
		$tid = $registre['tid'];
		$language = $registre['lang'];
		$public = $registre['public'];
		if($m == 'c'){
			// update the record in the database
			$lid = pnModAPIFunc('iw_noteboard', 'user', 'update', array('data' => $registre['data'],
																		'nid' => $nid,
																		'noticia' => $noticia,
																		'caduca' => time(),
																		'titular' => $titular,
																		'titulin' => $titulin,
																		'titulout' => $titulout,
																		'mes_info' => $mes_info,
																		'text' => $text,
																		'fitxer' => $fitxer,
																		'textfitxer' => $textfitxer,
																		'destinataris' => $destinataris,
																		'admet_comentaris' => $admet_comentaris,
																		'verifica' => $verifica,
																		'v' => $v,
																		'tema' => $tema,
																		'saved' => $saved,
																		'm' => 'c',
																		'tid' => $tid,
																		'language' => $language,
																		'public' => $public));
		
			if ($lid != false) {
				//Uptated Successfully
				//LogUtil::registerStatus (__('Expiration of the note has been forced. Now the note is accessible from the link <strong>Show the stored notes (expired)</strong>', $dom));
			}
			return pnRedirect(pnModURL('iw_noteboard', 'user', 'main', array('tema' => $tema)));
		}
	
	}

	if($registre['informa'] != pnUserGetVar('uid') &&
		$permissions == 5 &&
		$m == 'e'){
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}

	if($caduca == ''){$caduca = time() + pnModGetVar('iw_noteboard','caducitat')*24*60*60;}
	if($titulin == ''){$titulin = time();}
	if($titulout == ''){$titulout = time() + 5*24*60*60;}
	if($mes_info == ''){$mes_info = 'http://';}
	if($text == ''){$text = __('More information', $dom);}
	$extensions = pnModGetVar('iw_main','extensions');
	if($textfitxer == ''){$textfitxer = __('More information', $dom);}	

	if($permissions['nivell'] > 3 || $permissions['potverificar']){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																		'plus' => __('Unregistered', $dom)));
		$grupsModVar = pnModGetVar('iw_noteboard','grups');
		$marcatModVar = pnModGetVar('iw_noteboard','marcat');
		foreach($groups as $group){
			if(strpos($grupsModVar,'$'.$group['id'].'$') != 0){
				if(empty($destinataris)){
					$select = (strpos($marcatModVar,'$'.$group['id'].'$') != 0) ? 'checked' : '';
				}else{
					$select = (strpos($destinataris,'$'.$group['id'].'$') != 0) ? 'checked' : '';
				}			
				$grups_array[] = array('name' => $group['name'],
										'id' => $group['id'],
										'select' => $select);
			}
		}
		$tria = true;
	}else{
		$tria = false;
	}
	$pnRender -> assign('temes_MS', $temes_MS);
	$pnRender -> assign('verifica', $permissions['verifica']);
	$pnRender -> assign('data', $data);
	$pnRender -> assign('caduca', date('d/m/y',$caduca));
	$pnRender -> assign('titulin', date('d/m/y',$titulin));
	$pnRender -> assign('titulout', date('d/m/y',$titulout));
	$pnRender -> assign('mes_info', $mes_info);
	$pnRender -> assign('text', $text);
	$pnRender -> assign('extensions', $extensions);
	$pnRender -> assign('textfitxer', $textfitxer);
	$pnRender -> assign('m', $m);
	$pnRender -> assign('titular', $titular);
	$pnRender -> assign('noticia', $noticia);
	$pnRender -> assign('admet_comentaris', $admet_comentaris);
	$pnRender -> assign('fitxer', $fitxer);
	$pnRender -> assign('titol', $titol);
	$pnRender -> assign('submit', $submit);
	$pnRender -> assign('nid', $nid);
	$pnRender -> assign('tema', $tema);
	$pnRender -> assign('tid', $tid);
	$pnRender -> assign('grups_array', $grups_array);
	$pnRender -> assign('tria', $tria);
	$pnRender -> assign('saved', $saved);
	$pnRender -> assign('multiLanguage', pnModGetVar('iw_noteboard','multiLanguage'));
	$pnRender -> assign('language', $language);
	$pnRender -> assign('publicAllowed', pnModGetVar('iw_noteboard','public'));
	$pnRender -> assign('public', $public);

	return $pnRender -> fetch('iw_noteboard_user_nova.htm');
}

/**
 * Convert the items of specified array to md5 (it's used with array_walk function)
 * @author: Sara Arjona Tï¿œllez (sarjona@xtec.cat)
 * @param:	value the identifier of the group  
 * @param:	key   
 * @return:	The array after apply md5 function to the name of the group
*/
function iw_noteboard_user_groupidtonamemd5(&$value, $key, $allgroups){
	if ($value!='') $value=md5($allgroups[$value]['name']);
}

/**
 * Create the RSS content with all the notes of a noteboard
 * @author: Sara Arjona Tï¿œllez (sarjona@xtec.cat)
 * @param:	args   
 * @return:	The XML with the context of the noteboard
*/
function iw_noteboard_user_rss($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get the parameters
	$sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');	
	$request_groups = FormUtil::getPassedValue('g', isset($args['g']) ? $args['g'] : null, 'GET');	

	// Security check
	if (pnModGetVar('iw_noteboard', 'publicSharedURL')!=$sid) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// get user identity
	$uid = pnUserGetVar('uid');
	if($uid == ''){$uid = '-1';}

	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => $uid));
	
	// Security recipients groups check
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$allgroups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv, 'plus' => __('Unregistered', $dom)));

	// Get all the notes
	$registres = pnModAPIFunc('iw_noteboard', 'user', 'getall', array('tema' => $tema,
										'nid' => $nid,
										'public' => 1));
	foreach ($registres as $registre) {
		//Check if user can see the topic
		$note_groups = explode('$', substr($registre['destinataris'],2,-1));

		array_walk($note_groups, 'iw_noteboard_user_groupidtonamemd5', $allgroups);

		$group_intersect = array_uintersect($request_groups, $note_groups, "strcasecmp");
		if (sizeof($group_intersect)>0){
			$edited = '';	
			if($registre['edited'] != ''){
				$edited = date('d/m/y H:i',$registre['edited']);
			}
			$registreArray[] = array('nid' => $registre['nid'],
							'titular' => $registre['titular'],
							'titulin' => $registre['titulin'],
							'titulout' => $registre['titulout'],
							'caduca' => $registre['caduca'],
							'data' => time(),
							'noticia' => DataUtil::formatForDisplayHTML($registre['noticia']),
							'mes_info' => $registre['mes_info'],
							'text' => $registre['text'],
							'textfitxer' => $registre['textfitxer'],
							'fitxer' => $registre['fitxer'],
							'edited' => $registre['edited'],
							'language' => $registre['language'],
							'literalGroups' => $registre['literalGroups']);
		}		
	}

	//Gather relevent info about file
	$ctype="text/xml";
	//Begin writing headers
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public"); 
	header("Content-Description: File Transfer");
	
	//Use the switch-generated Content-Type
	header("Content-Type: $ctype");
	//Force the download
	$xml = '<?xml version="1.0" encoding="ISO-8859-15"?>';
	$xml .= '<rss version="2.0">';
	$xml .= '<channel>';
	$xml .= "<title>".pnConfigGetVar('sitename')."</title>";
	$xml .= "<link><![CDATA[".pnGetBaseURL()."?module=iw_noteboard&amp;func=rss&amp;sid=$sid]]></link>";
	$xml .= "<description>Notes compartides del tauler</description>";
	$xml .= "<language>ca</language>";
//	$xml .= "<docs>http://ca.wikipedia.org/wiki/RSS</docs>";
	foreach($registreArray as $registre){
		$xml .= "<item>";
		$xml .= "<title><![CDATA[".$registre['titular']."]]></title>";
		$xml .= "<description><![CDATA[".$registre['noticia']."]]></description>";
		$xml .= "<pubDate>".$registre['edited']."</pubDate>";
		if ($registre['mes_info'] != 'http://' && $registre['mes_info'] != '') $xml .= "<link>".$registre['mes_info']."</link>";
		$xml .= "<author>".$registre['informa']."</author>";
		$xml .= "<category>".$registre['tema_anotacio']."</category>";
		//Afegit
			$xml .= "<shared_id>".$registre['nid']."</shared_id>";
			$xml .= "<data>".$registre['data']."</data>";
			$xml .= "<caduca>".$registre['caduca']."</caduca>";
//			$xml .= "<noticia><![CDATA[".$registre['noticia']."]]></noticia>";
			$xml .= "<mes_info>".$registre['mes_info']."</mes_info>";
			$xml .= "<text>".$registre['text']."</text>";
			$xml .= "<caduca>".$registre['caduca']."</caduca>";
//			$xml .= "<titular><![CDATA[".$registre['titular']."]]></titular>";
			$xml .= "<titulin>".$registre['titulin']."</titulin>";
			$xml .= "<titulout>".$registre['titulout']."</titulout>";
			$xml .= "<fitxer>".$registre['fitxer']."</fitxer>";
			$xml .= "<textfitxer>".$registre['textfitxer']."</textfitxer>";
			$xml .= "<language>".$registre['language']."</language>";
			$xml .= "<edited>".$registre['edited']."</edited>";
			$xml .= "<shared_from>".$sid."</shared_from>";
			$xml .= "<literal_groups><![CDATA[".$registre['literalGroups']."]]></literal_groups>";
		//final
		$xml .= "</item>";
	}

	$xml .= "</channel>";
	$xml .= "</rss>";
	echo $xml;
	exit;
}


/**
 * Receive the information from the form and create a new entry in the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the values sended from the form
 * @return:	Thue if success
*/
function iw_noteboard_user_crear($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
	$noticia = FormUtil::getPassedValue('noticia', isset($args['noticia']) ? $args['noticia'] : null, 'POST');
	$data = FormUtil::getPassedValue('data', isset($args['data']) ? $args['data'] : null, 'POST');
	$caduca = FormUtil::getPassedValue('caduca', isset($args['caduca']) ? $args['caduca'] : null, 'POST');
	$titular = FormUtil::getPassedValue('titular', isset($args['titular']) ? $args['titular'] : null, 'POST');
	$titulin = FormUtil::getPassedValue('titulin', isset($args['titulin']) ? $args['titulin'] : null, 'POST');
	$titulout = FormUtil::getPassedValue('titulout', isset($args['titulout']) ? $args['titulout'] : null, 'POST');
	$mes_info = FormUtil::getPassedValue('mes_info', isset($args['mes_info']) ? $args['mes_info'] : null, 'POST');
	$text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
	$fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
	$textfitxer = FormUtil::getPassedValue('textfitxer', isset($args['textfitxer']) ? $args['textfitxer'] : null, 'POST');
	$destinataris = FormUtil::getPassedValue('destinataris', isset($args['destinataris']) ? $args['destinataris'] : null, 'POST');
	$admet_comentaris = FormUtil::getPassedValue('admet_comentaris', isset($args['admet_comentaris']) ? $args['admet_comentaris'] : null, 'POST');
	$verifica = FormUtil::getPassedValue('verifica', isset($args['verifica']) ? $args['verifica'] : null, 'POST');
	$tema = FormUtil::getPassedValue('tema', isset($args['tema']) ? $args['tema'] : null, 'POST');
	$tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');
	$language = FormUtil::getPassedValue('language', isset($args['language']) ? $args['language'] : null, 'POST');
	$public = FormUtil::getPassedValue('public', isset($args['public']) ? $args['public'] : null, 'POST');

	//gets the attached file array
	$fileName = $_FILES['fitxer']['name'];

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard', false);
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'user', 'main'));
	}

	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));

	// Separate the groups with the dolar symbol
	$toUsers = $destinataris;
	if(!empty($destinataris)){
		$desti1 = '$$';
		for ($i = 0; $i < 100; $i++) {
			if (isset($destinataris[$i])) {
				$desti1 .= $destinataris[$i].'$';
			}
        }
		$destinataris = $desti1;
		if($public == 1){
			// Get current user groups
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$allGroupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
			$desti1 = '$$';
			foreach($toUsers as $dest){
				$desti1 .= ($dest != 0) ? $allGroupsInfo[$dest].'$' : '0$';
			}
			$literalGroups = $desti1;
		}else{
			$literalGroups = '';
		}
	}

	// If user can select the groups that are going to receive the note
	if($permissions['nivell'] < 4 && 
		pnModGetVar('iw_noteboard','repperdefecte') == 1){
		$destinataris = pnModGetVar('iw_noteboard','marcat');
	}
	
	if($permissions['nivell'] < 4 &&
		pnModGetVar('iw_noteboard','repperdefecte') == 0){
		$destinataris = pnModGetVar('iw_noteboard','grups');
	}
	
	if($permissions['nivell'] < 4 &&
		pnModGetVar('iw_noteboard','repperdefecte') == 2){
		$destinataris = '$$';
	}

	$dataerror = false;
	// check the date values
	if(!empty($caduca)){
		$dia = substr($caduca,0,2);
		$mes = substr($caduca,3,2);
		$any = '20'.substr($caduca,-2);
		$caduca = mktime('23','59','00',$mes,$dia,$any);
	}

	if(!empty($titulin)){
		$dia = substr($titulin,0,2);
		$mes = substr($titulin,3,2);
		$any = '20'.substr($titulin,-2);
		$titulin = mktime('00','00','00',$mes,$dia,$any);
	}

	if(!empty($titulout)){
		$dia = substr($titulout,0,2);
		$mes = substr($titulout,3,2);
		$any = '20'.substr($titulout,-2);
		$titulout = mktime('23','59','00',$mes,$dia,$any);
	}

	// check the needed values
	$nom_fitxer =  (empty($fileName)) ? '' : $fileName;

	// update the attached file to the server
	if($fileName != ''){
		$folder = pnModGetVar('iw_noteboard','attached');
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$update = pnModFunc('iw_main', 'user', 'updateFile', array('sv' => $sv,
										'folder' => $folder,
										'file' => $_FILES['fitxer']));
		//the function returns the error string if the update fails and and empty string if success
		if($update['msg'] != ''){
			LogUtil::registerError ($update['msg'].' '.__('Probably the note have been sent without the attached file', $dom));
			$nom_fitxer = '';
		}else{
			$nom_fitxer = $update['fileName'];
		}
  	}

	// create a new record
	$lid = pnModAPIFunc('iw_noteboard', 'user', 'crear', array('noticia' => $noticia,
																'data' => $data,
																'caduca' => $caduca,
																'titular' => $titular,
																'titulin' => $titulin,
																'titulout' => $titulout,
																'mes_info' => $mes_info,
																'text' => $text,
																'fitxer' => $nom_fitxer,
																'textfitxer' => $textfitxer,
																'destinataris' => $destinataris,
																'admet_comentaris' => $admet_comentaris,
																'verifica' => $verifica,
																'tid' => $tid,
																'language' => $language,
																'public' => $public,
																'literalGroups' => $literalGroups));

	if (!$lid) {
		// error
		return LogUtil::registerError (__('The note has been created successfully', $dom));
	}

	// Creation successfully. Inform to user in case the note needs verification
	if($permissions['verifica'] == 1){
		LogUtil::registerStatus (__('The note has been created successfully', $dom));
	}else{
		LogUtil::registerStatus (__('The note has been sent successfully, but is waiting for administrator\'s validation.', $dom));
	}

	//Delete users headlines var. This renoval the block information
	if($titular != ''){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule', array('name' => 'nbheadlines',
									'module' => 'iw_noteboard',
									'sv' => $sv));
	}

	// redirect user to noteboard main page
	return pnRedirect(pnModURL('iw_noteboard', 'user', 'main', array('tema' => $tema)));
}

/**
 * Receive the information from the form and update a entry in the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the values sended from the form
 * @return:	Thue if success
*/
function iw_noteboard_user_update($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
	$noticia = FormUtil::getPassedValue('noticia', isset($args['noticia']) ? $args['noticia'] : null, 'POST');
	$data = FormUtil::getPassedValue('data', isset($args['data']) ? $args['data'] : null, 'POST');
	$caduca = FormUtil::getPassedValue('caduca', isset($args['caduca']) ? $args['caduca'] : null, 'POST');
	$titular = FormUtil::getPassedValue('titular', isset($args['titular']) ? $args['titular'] : null, 'POST');
	$titulin = FormUtil::getPassedValue('titulin', isset($args['titulin']) ? $args['titulin'] : null, 'POST');
	$titulout = FormUtil::getPassedValue('titulout', isset($args['titulout']) ? $args['titulout'] : null, 'POST');
	$mes_info = FormUtil::getPassedValue('mes_info', isset($args['mes_info']) ? $args['mes_info'] : null, 'POST');
	$text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
	$fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
	$textfitxer = FormUtil::getPassedValue('textfitxer', isset($args['textfitxer']) ? $args['textfitxer'] : null, 'POST');
	$destinataris = FormUtil::getPassedValue('destinataris', isset($args['destinataris']) ? $args['destinataris'] : null, 'POST');
	$admet_comentaris = FormUtil::getPassedValue('admet_comentaris', isset($args['admet_comentaris']) ? $args['admet_comentaris'] : null, 'POST');
	$verifica = FormUtil::getPassedValue('verifica', isset($args['verifica']) ? $args['verifica'] : null, 'POST');
	$tema = FormUtil::getPassedValue('tema', isset($args['tema']) ? $args['tema'] : null, 'POST');
	$tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');
	$v = FormUtil::getPassedValue('v', isset($args['v']) ? $args['v'] : null, 'POST');
	$saved = FormUtil::getPassedValue('saved', isset($args['saved']) ? $args['saved'] : null, 'POST');
	$modremitent = FormUtil::getPassedValue('modremitent', isset($args['modremitent']) ? $args['modremitent'] : null, 'POST');
	$segur = FormUtil::getPassedValue('segur', isset($args['segur']) ? $args['segur'] : null, 'POST');
	$new_file = FormUtil::getPassedValue('new_file', isset($args['new_file']) ? $args['new_file'] : null, 'POST');
	$language = FormUtil::getPassedValue('language', isset($args['language']) ? $args['language'] : null, 'POST');
	$public = FormUtil::getPassedValue('public', isset($args['public']) ? $args['public'] : null, 'POST');

	//get the file name
	$fileName = $_FILES['fitxer']['name'];

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'user', 'main'));
	}

	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));

	// Get the record information
	$registre = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));
	if ($registre == false) {
		LogUtil::registerError (__('The note has not been found', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));		}

	if(!$permissions['potverificar']){
		if(empty($permissions) ||
			($permissions['nivell'] < 5 &&
				$m == 'e') ||
			($permissions['nivell'] < 7 &&
				$registre['informa'] != pnUserGetVar('uid'))){
			LogUtil::registerError (__('You are not allowed to do this action', $dom));
			return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
		}
	}

	$toUsers = $destinataris;
	// Separate the groups with the dolar symbol
	if(!empty($destinataris)){
		$desti1 = '$$';
		foreach($destinataris as $dest){
			$desti1 .= $dest.'$';
		}
		$destinataris = $desti1;

		// Separate the groups with the dolar symbol
		if($public == 1){
			// Get current user groups
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$allGroupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
			$desti1 = '$$';
			foreach($toUsers as $dest){
				$desti1 .= ($dest != 0) ? $allGroupsInfo[$dest].'$' : '0$';
			}
			$literalGroups = $desti1;
		}else{
			$literalGroups = '';
		}
	}

	if(!$permissions['potverificar']){
		// if user can select the groups that are going to see the note
		if($permissions['nivell'] < 4 && 
			pnModGetVar('iw_noteboard','repperdefecte') == 1){
			$destinataris = pnModGetVar('iw_noteboard','marcat');
		}

		if($permissions['nivell'] < 4 &&
			pnModGetVar('iw_noteboard','repperdefecte') == 0){
			$destinataris =	pnModGetVar('iw_noteboard','grups');
		}

		if($permissions['nivell'] < 4 &&
			pnModGetVar('iw_noteboard','repperdefecte') == 2){
			$destinataris = '$$';
		}
	}

	// check the date values
	if(!empty($data)){
		$dia = substr($data,0,2);
		$mes = substr($data,3,2);
		$any = '20'.substr($data,-2);
		$data = mktime('00','00','00',$mes,$dia,$any);
	}
		
	if(!empty($caduca)){
		$dia = substr($caduca,0,2);
		$mes = substr($caduca,3,2);
		$any = '20'.substr($caduca,-2);
		$caduca = mktime('00','00','00',$mes,$dia,$any);
	}

	if(!empty($titulin)){
		$dia = substr($titulin,0,2);
		$mes = substr($titulin,3,2);
		$any = '20'.substr($titulin,-2);
		$titulin = mktime('00','00','00',$mes,$dia,$any);
	}

	if(!empty($titulout)){
		$dia = substr($titulout,0,2);
		$mes = substr($titulout,3,2);
		$any = '20'.substr($titulout,-2);
		$titulout = mktime('00','00','00',$mes,$dia,$any);
	}

	if($segur == 1){
		$folder = pnModGetVar('iw_noteboard','attached');
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$delete = pnModFunc('iw_main', 'user', 'deleteFile', array('sv' => $sv,
										'folder' => $folder,
										'fileName' => $registre['fitxer']));
		if($delete){$fitxer = '';}
	}

	//If there is attached file updates it
	if($fileName != '' && $new_file == '1'){
		$folder = pnModGetVar('iw_noteboard','attached');
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$update = pnModFunc('iw_main', 'user', 'updateFile', array('sv' => $sv,
										'folder' => $folder,
										'file' => $_FILES['fitxer']));
		//the function returns the error string if the update fails and and empty string if success
		if($update['msg'] != ''){
			LogUtil::registerError ($update['msg'].' '.__('Probably the note have been sent without the attached file', $dom));
		}
		$fileName = $update['fileName'];
  	}

	if($fileName == '' && $fitxer != ''){$fileName = $fitxer;}

	// Update a note
	$lid = pnModAPIFunc('iw_noteboard', 'user', 'update', array('data' => $data,
																'nid' => $nid,
																'noticia' => $noticia,
																'caduca' => $caduca,
																'titular' => $titular,
																'titulin' => $titulin,
																'titulout' => $titulout,
																'mes_info' => $mes_info,
																'text' => $text,
																'fitxer' => $fileName,
																'textfitxer' => $textfitxer,
																'destinataris' => $destinataris,
																'admet_comentaris' => $admet_comentaris,
																'verifica' => $verifica,
																'v' => $v,
																'tid' => $tid,
																'saved' => $saved,
																'modremitent' => $modremitent,
																'language' => $language,
																'public' => $public,
																'literalGroups' => $literalGroups));

	if ($lid != false) {
		//The note has been modified
		LogUtil::registerStatus (__('The note has been modified', $dom));
		//Delete users headlines var. This renoval the block information
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModApiFunc('iw_main', 'user', 'usersVarsDelModule', array('name' => 'nbheadlines',
										'module' => 'iw_noteboard',
										'sv' => $sv));
	}
  
	// Redirect user to main page
	return pnRedirect(pnModURL('iw_noteboard', 'user', 'main', array('tema' => $tema,
																		'saved' => $saved)));
}

/**
 * Show a form that allow to create a comment associate with a note
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note where a comment is going to be created
 * @return:	The form
*/
function iw_noteboard_user_comenta($args){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'GET');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
	if (!empty($objectid)) {
		$nid = $objectid;
	}

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	// get a note informtion
	$registre = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));
   	if ($registre == false) {
		LogUtil::registerError (__('The note has not been found', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}

	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));
	if(empty($permissions) ||
		$permissions['nivell'] < 2){
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}
	$security = pnSecGenAuthKey();

	$pnRender -> assign('security', $security);
	$pnRender -> assign('nid', $nid);	
	$pnRender -> assign('textnota', DataUtil::formatForDisplayHTML($registre['noticia']));
	$pnRender -> assign('titol', __('Send the comment', $dom));
	$pnRender -> assign('submit', __('Send the comment', $dom));
	$pnRender -> assign('m', 'n');
	$pnRender -> assign('verifica', $permissions['verifica']);	

	return $pnRender -> fetch('iw_noteboard_user_comenta.htm');
}

/**
 * Receive the information from the form and create a new comment for a note
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the values sended from the form
 * @return:	Thue if success
*/
function iw_noteboard_user_comenta_crear($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    	$noticia = FormUtil::getPassedValue('noticia', isset($args['noticia']) ? $args['noticia'] : null, 'POST');
    	$data = FormUtil::getPassedValue('data', isset($args['data']) ? $args['data'] : null, 'POST');
    	$verifica = FormUtil::getPassedValue('verifica', isset($args['verifica']) ? $args['verifica'] : null, 'POST');
    	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'user', 'main'));
	}

	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));
	if(empty($permissions) ||
		$permissions['nivell'] < 2){
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}

	// create a comment
	$lid = pnModAPIFunc('iw_noteboard', 'user', 'crear', array('noticia' => $noticia,
									'data' => time(),
									'verifica' => $verifica,
									'ncid' => $nid));

	if ($lid != false) {
		// creation succesfully
		if($permissions['verifica'] == 1){
			LogUtil::registerStatus (__('A new comment has been created', $dom));
		}else{
			LogUtil::registerStatus (__('The comment has been sent successfully, but is waiting for administrator\'s validation.', $dom));
		}
	}

	return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
}

/**
 * Show a form needed to modify a comment
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the comment
 * @return:	The form
*/
function iw_noteboard_user_editacomentari($args){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'GET');
    	$v = FormUtil::getPassedValue('v', isset($args['v']) ? $args['v'] : null, 'GET');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

   	// get comment information
	$registre = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));
	if ($registre == false) {
		LogUtil::registerError (__('The note has not been found', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}

   	// get note information
	$note = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $registre['ncid']));
	if ($note == false) {
		LogUtil::registerError (__('The note has not been found', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}


	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));

	if(empty($permissions) ||
			$permissions['nivell'] < 5 ||
			($permissions['nivell'] < 7 &&
			$registre['informa'] != pnUserGetVar('uid'))){
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}

	if(isset($v) &&
		$v!=''){
		if(!$permissions['potverificar']){
			LogUtil::registerError (__('You are not allowed to do this action', $dom));
			return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
		}
		$submit = __('Validate', $dom);
		$titol = __('Comment validation', $dom);
	}else{
		$titol = __('Modify a comment', $dom);
		$submit = __('Modify', $dom);
	}

	$verifica = 1;

	if($registre['informa'] != pnUserGetVar('uid') &&
		$permissions == 5){
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}

	$security = pnSecGenAuthKey();

	$pnRender -> assign('security', $security);
	$pnRender -> assign('titol', $titol);
	$pnRender -> assign('submit', $submit);
	$pnRender -> assign('m', 'e');
	$pnRender -> assign('textnota', DataUtil::formatForDisplayHTML($note['noticia']));
	$pnRender -> assign('noticia', $registre['noticia']);
	$pnRender -> assign('nid', $nid);	
	$pnRender -> assign('verifica', $permissions['verifica']);

	return $pnRender -> fetch('iw_noteboard_user_comenta.htm');
}

/**
 * Receive the information from the form and modify the comment
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the values sended from the form
 * @return:	Thue if success
*/
function iw_noteboard_user_updatecomentari($args){
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'POST');
    	$v = FormUtil::getPassedValue('v', isset($args['v']) ? $args['v'] : null, 'POST');
    	$noticia = FormUtil::getPassedValue('noticia', isset($args['noticia']) ? $args['noticia'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_noteboard', 'user', 'main'));
	}

   	// get a note information
	$registre = pnModAPIFunc('iw_noteboard', 'user', 'get', array('nid' => $nid));

	// Get the user permissions in noteboard
	$permissions = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => pnUserGetVar('uid')));
	if(empty($permissions) ||
			$permissions['nivell'] < 5 ||
			($permissions['nivell'] < 7 &&
			$registre['informa'] != pnUserGetVar('uid'))){
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}


	// get the comment information
	$lid = pnModAPIFunc('iw_noteboard', 'user', 'updatecomentari', array('nid' => $nid,
										'noticia' => $noticia,
										'verifica' => 1));

	if ($lid != false) {
		// Update successfully
		LogUtil::registerStatus (__('The comment has been modified', $dom));
	}

	return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
}

/**
 * Show the list of users that have seen a note
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the note and the topic that is been viewed
 * @return:	The list of users that have seen a note
*/
function iw_noteboard_user_hanvist($args)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Get parameters from whatever input we need
    	$nid = FormUtil::getPassedValue('nid', isset($args['nid']) ? $args['nid'] : null, 'GET');
    	$tema = FormUtil::getPassedValue('tema', isset($args['tema']) ? $args['tema'] : null, 'GET');

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	if(!pnUserLoggedIn()){
		LogUtil::registerError (__('You are not allowed to do this action', $dom));
		return pnRedirect(pnModURL('iw_noteboard', 'user', 'main'));
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_noteboard',false);
	
	$registres = pnModAPIFunc('iw_noteboard', 'user', 'hanvist', array('nid' => $nid));

	$pnRender -> assign('registres', $registres);
	$pnRender -> assign('tema', $tema);

	return $pnRender -> fetch('iw_noteboard_user_hanvist.htm');
}
