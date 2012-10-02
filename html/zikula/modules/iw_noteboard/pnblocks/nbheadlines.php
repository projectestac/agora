<?php
/**
 * initialise block
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 */
function iw_noteboard_nbheadlinesblock_init()
{
	//Sentï¿œncia de seguretat
	pnSecAddSchema('iw_noteboard:nbheadlinesBlock:', 'Block title::');
}

/**
 * get information on block
 *
 * @author       Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return       array       The block information
 */
function iw_noteboard_nbheadlinesblock_info()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	//Values
	return array('text_type' => 'nbheadlines',
					'module' => 'iw_noteboard',
					'text_type_long' => __('Show the NoteBoard headlines', $dom),
					'allow_multiple' => true,
					'form_content' => false,
					'form_refresh' => false,
					'show_preview' => true);
}

/**
 * Gets headlines information
 *
 * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 */
function iw_noteboard_nbheadlinesblock_display($row)
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard:nbheadlinesBlock:', $row['title']."::", ACCESS_READ)) {
		return false;
	}

	$uid = pnUserGetVar('uid');

	if(!isset($uid)){
		$uid = '-1';
	}

	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'nbheadlines',
																		'module' => 'iw_noteboard',
																		'uid' => $uid,
																		'sv' => $sv));

	if($exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$s = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
																'name' => 'nbheadlines',
																'module' => 'iw_noteboard',
																'sv' => $sv,
																'nult' => true));
		$row['content'] = $s;
		return themesideblock($row);
	}

	$pnRender = pnRender::getInstance('iw_noteboard',false);

	//Cridem la funciï¿œ API que retornarï¿œ la informaciï¿œ dels tï¿œtulars de les notï¿œcies
	$registres = pnModAPIFunc('iw_noteboard', 'user', 'getalltitulars');

	// Get all users information needed
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersFullname = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'nc',
																			'sv' => $sv));

	foreach ($registres as $registre) {
		$permisos = pnModAPIFunc('iw_noteboard', 'user', 'permisos', array('uid' => $uid));
		//separem la llista de grups que tenen accï¿œs a la notï¿œcia i ho posem en una matriu
		$grups_acces = explode('$',$registre['destinataris']);
		$esta_en_grups_acces = array_intersect($grups_acces,$permisos['grups']);
		$pos = strpos($registre['no_mostrar'],'$'.$uid.'$');
		if(($registre['verifica'] == 1 &&
			count($esta_en_grups_acces) >= 1 &&
			$pos == 0)){
			if($registre['tid'] == 0){
				$tema = __('Not classified', $dom);
				$registre['tid'] = -1;
			}else{
				//Recollim el nom del tema
				$temes = pnModAPIFunc('iw_noteboard', 'user', 'gettema', array('tid' => $registre['tid']));
				
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				if(pnModFunc('iw_main', 'user', 'isMember', array('uid' => pnUserGetVar('uid'),
																	'gid' => $temes['grup'],
																	'sv' => $sv))){
					$tema = $temes['nomtema'];
				}else{
					$tema = __('Not classified', $dom);
				}
			}
			if($tema == ""){$tema = __('Topic not found', $dom);}

			$n++;
			$bgcolor = ($n % 2 == 0)? pnModGetVar('iw_noteboard','colorrow1') : pnModGetVar('iw_noteboard','colorrow2');
			$titulars[] = array('tid' => $registre['tid'],
								'nid' => $registre['nid'],
								'titular' => DataUtil::formatForDisplayHTML($registre['titular']),
								'tema' => $tema,
								'bgcolor' => $bgcolor,
								'informa' => $usersFullname[$registre['informa']]);
			$en_te = true;
		}
	}

	if(!$en_te){return false;}
	$pnRender -> assign('titulars', $titulars);
	$pnRender -> assign('notRegisteredSeeRedactors', pnModGetVar('iw_noteboard','notRegisteredSeeRedactors'));
	$pnRender -> assign('loggedIn', pnUserLoggedIn());

	$s = $pnRender -> fetch('iw_noteboard_block_headlines.htm');

	//Copy the block information into user vars
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
														'name' => 'nbheadlines',
														'module' => 'iw_noteboard',
														'sv' => $sv,
														'value' => $s,
														'lifetime' => '500'));	

	$row['content'] = $s;
	return themesideblock($row);	
}