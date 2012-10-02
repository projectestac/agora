<?php
/**
 * Scapes special chars: ', " and \n
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param:	string to scape
 * @return:	the new string scaped
*/
function iw_agendas_user_prepara_etiqueta($args)
{
	$text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : date("m"), 'POST');
	// Replace apostrofe with &acute;
	$text = str_replace("\r", '',str_replace('\'','&acute;',$text));
	// Replace double aprostrofe with &quot;		
	$text = str_replace('"','&quot;',$text);
	// Replace returns with <br />
	$text = preg_replace('/(?<!>)\n/', "<br />", $text);
	return $text;
}

/**
 * User main entrance
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param:	The main values of position in the agendas: month, year, agenda identity...
 * @return:	Redirect to main page
*/
function iw_agendas_user_main($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'REQUEST');
	$llistat = FormUtil::getPassedValue('llistat', isset($args['llistat']) ? $args['llistat'] : null, 'REQUEST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');
	$agenda = FormUtil::getPassedValue('agenda', isset($args['agenda']) ? $args['agenda'] : null, 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'REQUEST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$odaid = $daid;
	$gdaid = 0;
	if ($daid == 0) {
		$usability = pnModFunc('iw_agendas', 'user', 'getGdataFunctionsUsability');
		if ($usability === true) {
			//if user use gCalendar integration and daid is zero get the gCalendar default
			$defaultCalendar = pnModAPIFunc('iw_agendas','user','getGCalendarUserDefault');
			$gdaid = $defaultCalendar['daid'];
		}
	}
	if ($gdaid == 0) {$gdaid = $daid;}
	// get user uid
	$user = (pnUserGetVar('uid') == '') ? '-1' : pnUserGetVar('uid');
	if ($user == '-1') {
		$daid = 0;
		$llistat = 0;
	}
	if ($user > 0) {
		//get if the sincronization has been made recently
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$exists = pnModApiFunc('iw_main', 'user', 'userVarExists',
							    array('name' => 'sincroGCalendar',
									  'module' => 'iw_agendas',
									  'uid' => $user,
									  'sv' => $sv));
		$usability = pnModFunc('iw_agendas', 'user', 'getGdataFunctionsUsability');
		//check if user wants gCalendar
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$gCalendarUse = pnModApiFunc('iw_main', 'user', 'userVarExists',
									  array('name' => 'gCalendarUse',
											'module' => 'iw_agendas',
											'uid' => pnUserGetVar('uid'),
											'sv' => $sv));
		if (!$exists &&  $gCalendarUse) {
			if ($usability === true) {
				pnModFunc('iw_agendas', 'user', 'gCalendar');
			} else {
				LogUtil::registerError ($usability);
			}
		}
	}
	// If there is a selected agenda, use it
	if (isset($agenda)) $daid = $agenda;
	// Array with the names of the months
	$nom_mes = array(__('January', $dom),
					 __('February', $dom),
					 __('March', $dom),
					 __('April', $dom),
					 __('May', $dom),
					 __('June', $dom),
					 __('July', $dom),
					 __('August', $dom),
					 __('September', $dom),
					 __('October', $dom),
					 __('November', $dom),
					 __('December', $dom));
	// Array with the names of the months plus the corresponding article
	$nom_mes_article = array(__('January of', $dom),
							 __('February of', $dom),
							 __('March of', $dom),
							 __('April of', $dom),
							 __('May of', $dom),
							 __('June of', $dom),
							 __('July of', $dom),
							 __('August of', $dom),
							 __('September of', $dom),
							 __('October of', $dom),
							 __('November of', $dom),
							 __('December of', $dom));
	// Array with the days of the week
	$nom_dia = array(__('Sunday', $dom),
					 __('Monday', $dom),
					 __('Tuesday', $dom),
					 __('Wednesday', $dom),
					 __('Thursday', $dom),
					 __('Friday', $dom),
					 __('Saturday', $dom),
					 __('Sunday', $dom));
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas', false);
	// Get the color configuration and assign them to the pnRender object
	$colors = explode('|', pnModGetVar('iw_agendas', 'colors'));
	$pnRender->assign('colors', $colors);
	//Passem a format timestamp la data seleccionada i calculem els nombre de dies que té el mes en la data seleccionada
	$primerdiames = mktime(0, 0, 0, $mes, 1, $any);
	$diesmes = date("t", $primerdiames);
	if ($dia != '') { //Actualitzem els canvis de mes i d'any
		if ($dia == 0) {$mes--; $dia = 31;}
		if ($dia > $diesmes) {$mes++; $dia = 1;}
	}
	if ($mes == 0) {$mes = 12; $any = $any - 1;}
	if ($mes == 13) {$mes = 1; $any =  $any + 1;}
	//Recalculem el nombre de dies del mes per si s'han produï¿œt canvis en la fase anterior
	$primerdiames = mktime(0, 0, 0, $mes, 1, $any);
	$diesmes = date("t", $primerdiames);
	if (isset($dia) && $dia > $diesmes) {$dia = $diesmes;}
	// Numeric representation of the first day of the month in the week: 0 (for Sunday) through 6 (for Saturday)
	$first_day = date("w", mktime(0, 0, 0, $mes, 1, $any));
	// The Sunday must be number 7 (for us, Sunday is the last day of the week, not the first)
	if ($first_day == 0) {$first_day = 7;}
	//Check the access of the user in the agenda
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
						   array('daid' => $daid,
								 'grup' => $nomcamp['grup'],
								 'resp' => $nomcamp['resp'],
								 'activa' => $nomcamp['activa']));
	if ($te_acces == 0) {
		LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	//get all users information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
							array('sv' => $sv,
								  'info' => 'ncc'));
	//Quan un usuari entra a qualsevol agenda abans de les 10 del matï¿œ s'esborren totes les anotacions caducades
	if (date('H',time()) < 10 &&
		is_numeric(pnModGetVar('iw_agendas', 'caducadies')) &&
		$caducadies = pnModGetVar('iw_agendas', 'caducadies') > 0) {
		pnModAPIFunc('iw_agendas', 'user', 'esborra_caducades');
	}
	//Mirem el darrer mode de vista que ha fer servit l'usuari i ho posem a la variable llistat
	((!isset($llistat) || $llistat == '') && pnUserLoggedIn()) ? $llistat = pnModAPIFunc('iw_agendas', 'user', 'getvista',
																						  array('daid' => $daid)) : "";
	//Si el parï¿œmetre mode no val res, agafa el mode de visualitzaciï¿œ de l'agenda escollit des de la configuraciï¿œ del mï¿œdul
	(!isset($llistat)) ? $llistat = pnModGetVar('iw_agendas', 'vista') : "";
    // Add the options, the calendar and the agenda selector
	$menu = pnModFunc('iw_agendas', 'user', 'menu',
					   array('mes' => $mes,
							 'any' => $any,
							 'llistat' => $llistat,
							 'dia' => $dia,
							 'daid' => $daid));
	$pnRender->assign('menu', $menu);
	//get all the events for the month
	if ($dia == 0) {
		//Personal agenda
		//get the content from personal agenda and shared agendas where user is subscribed
		$events = pnModAPIFunc('iw_agendas', 'user', 'getEvents',
								array('month' => $mes,
									  'year' => $any,
									  'daid' => $daid));
		$eventsArray = array();
		foreach ($events as $event) {
			$eventsArray[] = $event;
		}
	} else {
		$events = pnModAPIFunc('iw_agendas', 'user', 'getEvents',
								array('month' => $mes,
									  'year' => $any,
									  'daid' => $daid,
									  'day' => $dia));
	}
	//get all the agendas where the user can access  
	$agendas = pnModFunc('iw_agendas', 'user', 'getUserAgendas');
	$pos = 0;
	// Showing the calendar in calendar format
	if (($llistat == -1 || $llistat == 0) && !$dia != 0) {
		for ($i = 1; $i < 33; $i++) {
			// Get the number of the day, from 0 (sunday) to 6 (saturday)
			$day = (date("w", mktime(0, 0, 0, $mes, $i,$any)) + 7) % 7;
			// Check if it's a working day or not
			$festiu = pnModFunc('iw_agendas', 'user', 'festiu',
								 array('dia' => $i,
									   'mes' => $mes,
									   'any' => $any));
			// If it's Saturday, Sunday or non-working day set diferent colors
			$days[$i]['linkcolor'] = ($day == 6 || $day == 0 || $festiu['festiu']) ? $colors[6] : $colors[5];
			$days[$i]['bgcolor'] = ($day == 6 || $day == 0 || $festiu['festiu']) ? $colors[8] : $colors[9];
			// Check whether the day is today - Set a diferent background color
			if (date('d') == $i && date('m') == $mes && date('Y') == $any) $days[$i]['bgcolor'] = $colors[10];
			// This loops makes always 32 iterations. This control whether is necessary to iterate or no, for months of 28, 29 and 30 days
			if ($i <= $diesmes) {
				// If it's a non-working day
				if ($festiu['etiqueta'] != "") {
					$festiu['etiqueta'] = pnModFunc('iw_agendas', 'user', 'prepara_etiqueta',
													 array('text' => $festiu['etiqueta']));
					$days[$i]['popup'] = " onmouseout=\"nd();\" onmouseover=\"overlib(<div style=\'padding:5px;\'>'" . $festiu['etiqueta'] . "</div>',CAPTION,'<div style=\'padding:5px;\'>".$nom_dia[date("w",mktime(0,0,0,$mes,$i,$any))] . " " . $i . "/" . $mes . "/" . $any . "</div>',BGCOLOR,'#316ac5',TIMEOUT,100000,DELAY,200,WIDTH,200)\")";
				}else $days[$i]['popup'] = "";
				//get the notes for the current day from eventsArray
				$anot_dia = array();
				$final = mktime(23, 59, 59, $mes, $i, $any);
				while ($eventsArray[$pos]['data'] < $final && $pos < count($eventsArray)) {
					array_push($anot_dia, $eventsArray[$pos]);
					$pos++;
				}
				// Process the events
				$k = 0;
				foreach ($anot_dia as $anot_dia1) {
					if ($te_acces == 4 || ($te_acces == 3 && $anot_dia1['usuari'] == $user) || $anot_dia1['completa'] == 0) {
						// If the event is finished/completed
						$days[$i][$k]['bgcolortext'] = ($anot_dia1['completa'] == 1 || (strpos($anot_dia1['completedByUser'], '$'.$user.'$') !== false && $daid == 0)) ? $colors[14] : $colors[13];
						// Get the agenda from where the note comes from
						if ($agendas[$anot_dia1['daid']]['color'] == '') {
							// Set a default color
							$userColor = '#FFFFFF';
							// Get gCalendar user color 
							$posit = strpos($agendas[$anot_dia1['daid']]['gColor'],'|'.$user.'$');
							$userColor = ($posit > 0) ? substr($agendas[$anot_dia1['daid']]['gColor'],$posit - 7,7) : '';
							$agendas[$anot_dia1['daid']]['color'] = $userColor;
						}
						$days[$i][$k]['agenda'] = $agendas[$anot_dia1['daid']];
						// Check whether the event has been modified (shared agendas)
						$days[$i][$k]['modified'] = $anot_dia1['modified'];
						if ($anot_dia1['gCalendarEventId'] != '') {
							$days[$i][$k]['gCalendar'] = true;
						}
						// Check whether the event has been deleted (shared agendas)
						$days[$i][$k]['deleted'] = $anot_dia1['deleted'];
						// get the agenda identity
						$days[$i][$k]['aid'] = $anot_dia1['aid'];
						// Check whether the event is new (not already seen)
						$days[$i][$k]['hourcolor'] = (strpos($anot_dia1['nova'], '$'.$user.'$') !== false && $daid == 0) ? $colors[11] : $colors[12];
						// If the event is not for whole day, show the hour						
						if (!$anot_dia1['totdia']) {
							$days[$i][$k]['hour'] = ($anot_dia1['tasca'] == 1) ? __('Task', $dom).' - '.$anot_dia1['nivell'] : date('H:i', $anot_dia1['data']);
						} else {
							$days[$i][$k]['hour'] = (!$anot_dia1['tasca']) ? __('All day', $dom) : __('Task', $dom);
						}
						// Preparing the popup window
						$contingut = '';
						for($j = 2; $j < 7; $j++) {
							$c = 'c' . $j;
							$tc = 'tc' . $j;
							if ($days[$i][$k]['agenda'][$c] != '' ||
								$days[$i][$k]['agenda'][$tc] == 3 ||
								$days[$i][$k]['agenda'][$tc] == 4) {
								if ($days[$i][$k]['agenda']['daid'] > 0) {
									$contingut .= '<fieldset><legend>' . $days[$i][$k]['agenda'][$c] . '</legend>';
								}
								if ($days[$i][$k]['agenda'][$tc] != 3 &&
									$days[$i][$k]['agenda'][$tc] != 4) {
									$contingut .= ($anot_dia1[$c] != "") ? $anot_dia1[$c] : "---";
								}
								if ($days[$i][$k]['agenda'][$tc] == 3) {$contingut .= $usersInfo[$anot_dia1['usuari']];}
								if ($days[$i][$k]['agenda'][$tc] == 4) {$contingut .= $usersInfo[$anot_dia1['usuari']].__(' on ', $dom).date('d/m/Y',$anot_dia1['dataanota']).__(' at ', $dom).date('H:i',$anot_dia1['dataanota']);}
								if ($days[$i][$k]['agenda']['daid'] > 0) {
									$contingut .= '</fieldset>';
								}
							}
						}
						if ($days[$i][$k]['agenda']['daid'] > 0 && $user != '-1') {
								$contingut .= '<div style="text-align: right;">' . $days[$i][$k]['agenda']['nom_agenda'] . '</div>';
						}
						// Prepare the popup removing invalid characters
						if (isset($anot_dia1['c1']) || isset($anot_dia1['c2']) || isset($anot_dia1['c3'])) {
							$days[$i][$k]['popuptitle'] = pnModFunc('iw_agendas', 'user', 'prepara_etiqueta',
																	 array('text' => $anot_dia1['c1']));
							$days[$i][$k]['popupcontent'] = pnModFunc('iw_agendas', 'user', 'prepara_etiqueta',
																	   array('text' => $contingut));

							$days[$i][$k]['popupimage'] = "modules/" . pnModGetName() . "/pnimages/mesinfo.gif";
						}
						// Show the file is there is anyone
						if ($anot_dia1['fitxer'] != '') {
							$days[$i][$k]['filename'] = $anot_dia1['fitxer'];
							$days[$i][$k]['filetitle'] = $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))] . " " . $i . "/" . $mes . "/" . $any;
							$days[$i][$k]['filecontent'] = $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))];
							// Get file extension
							$fileExtension = strtolower(substr(strrchr($anot_dia1['fitxer'], "."), 1));
							// get file icon
							$ctypeArray = pnModFunc('iw_main', 'user', 'getMimetype',
													 array('extension' => $fileExtension));
							$days[$i][$k]['fileIcon'] = $ctypeArray['icon'];

						}
						$days[$i][$k]['images'] = pnModFunc('iw_agendas', 'user', 'icons',
															 array('agenda' => $agendas[$anot_dia1['daid']],
																   'accessLevel' => $te_acces,
																   'note' => $anot_dia1,
																   'daid' => $daid,
																   'mes' => $mes,
																   'any' => $any));
						// Pass the text
						$days[$i][$k]['text'] = nl2br($anot_dia1['c1']);
						$k++;
					}
				}
			}
		}
		if ($te_acces >= 2 && (strpos($agendas[$daid]['gAccessLevel'], '$owne|' . $user.'$') !== false || $agendas[$daid]['gCalendarId'] == '')) {
			$pnRender->assign('canAdd', true);
		}
		$pnRender->assign('gdaid', $gdaid);
		$pnRender->assign('odaid', $odaid);
		$pnRender->assign('mes', $mes);
		$pnRender->assign('mesAnt', $mes - 1);
		$pnRender->assign('any', $any);
		$pnRender->assign('nom_mes', $nom_mes[$mes - 1]);
		$pnRender->assign('nom_dia', $nom_dia);
		$pnRender->assign('month', $mes);
		$pnRender->assign('year', $any);
		$pnRender->assign('daysofthemonth', $diesmes); // Number of days of the month
		$pnRender->assign('first_day', $first_day);
		$pnRender->assign('days', $days);
		$pnRender->assign('calendar', true); // The presence of this variable is used in the template to set the view mode
	} else {
		$nomcamp = $agendas[$daid];
		// Showing the calendar in a list format
		// Build the table headers
		$i = 1;
		if (empty($dia)) {$headers[] = __('Date', $dom);} // Only show the day column when there's no day selected
		$headers[] = __('Time', $dom); // Hour column
		while ($nomcamp['c' . $i] != '') {
			$headers[] = $nomcamp['c' . $i];
			$i++;
		}
		if ($user != '-1') {$headers[] = __('Options', $dom);} // Options column
		// Get the events
		if (isset($dia) && $dia >= 1) {
			$pnRender->assign('dia', $dia);
			$pnRender->assign('dayName', $nom_dia[date('w', mktime(0, 0, 0, $mes, $dia, $any))]);
			$pnRender->assign('monthName', $nom_mes_article[$mes - 1]);
		}
		$registres = $events;
		// No events
		if (empty($registres)) {
			if ($dia != 0) {
				$pnRender->assign('message', __('There are no events on this date', $dom));
			} else {
				$pnRender->assign('message', __('There are no events in the agenda', $dom));
			}
		}
		// Process the events
		$i = 0;
		foreach ($registres as $registre) {
			if ($te_acces == 4 || ($te_acces == 3 && $registre['usuari'] == $user) || $registre['completa'] == 0) {
				$rows[$i]['aid'] = $registre['aid'];
				$rows[$i]['daid'] = $registre['daid'];
				// Day of the week
				$diasetmana = date('w', $registre['data']);
				// Check whether it's non-working day
				$festiu = pnModFunc('iw_agendas', 'user', 'festiu',
									 array('dia' => date('d', $registre['data']),
										   'mes' => date('m', $registre['data']),
										   'any' => date('Y', $registre['data'])));
				// Set the colors according to the type of day
				if ($diasetmana == 6 || $diasetmana == 0 || $festiu['festiu']) {
					$rows[$i]['linkcolor'] = $colors[6];
					$rows[$i]['bgcolor'] = $colors[8];
				} else {
					$rows[$i]['linkcolor'] = $colors[5];
					$rows[$i]['bgcolor'] = $colors[9];
				}
				// Special background color for the current day
				if (date('d/m/Y') == date('d/m/Y', $registre['data'])) {$rows[$i]['bgcolor'] = $colors[10];}
				if ($registre['completa'] == 0 || $te_acces == 4) {
					// Check wether it's finished/completed
					$rows[$i]['textbgcolor'] = ($registre['completa'] == 1 || (strpos($registre['completedByUser'], '$'.$user.'$') !== false && $daid == 0)) ? $colors[14] : $colors[13];
					// Check whether the event is new (not already seen)
					$rows[$i]['hourcolor'] = (strpos($registre['nova'], '$'.$user.'$') !== false && $daid == 0) ? $colors[11] : $colors[12];
					// First column: the date (only shown when there's no day selected
					if (empty($dia) || $dia == 0) {
						$rows[$i]['date'] = date('d/m/Y',$registre['data']);
						$rows[$i]['dia'] = date('d',$registre['data']);
					}
					// Second column: the hour or a message
					if (!$registre['totdia']) {
						$rows[$i]['hour'] = ($registre['tasca'] == 1) ? __('Task', $dom) . ' - ' . $registre['nivell'] : date('H:i', $registre['data']);
					} else {
						$rows[$i]['hour'] = (!$registre['tasca']) ? __('All day', $dom): __('Task expiration', $dom);
					}
					if ($registre['gCalendarEventId'] != '') {
						$rows[$i]['gCalendar'] = true;
					}
					// Get the agenda from where the note comes from
					if ($agendas[$registre['daid']]['color'] == '') {
						// Set a default color
						$userColor = '#FFFFFF';
						// Get gCalendar user color 
						$posit = strpos($agendas[$registre['daid']]['gColor'], '|' . $user . '$');
						$userColor = ($posit > 0) ? substr($agendas[$registre['daid']]['gColor'], $posit - 7, 7) : '';
						$agendas[$registre['daid']]['color'] = $userColor;
					}		
					// Check whether the event has been modified (shared agendas)
					$rows[$i]['modified'] = $registre['modified'];
					// Check whether the event has been deleted (shared agendas)
					$rows[$i]['deleted'] = $registre['deleted'];
					// Get the fields
					$j = 1;
					while ($nomcamp['c' . $j] != '') {
						if ($registre['c' . $j] == '' && $nomcamp['tc' . $j] != 3 && $nomcamp['tc' . $j] != 4) {$registre['c' . $j] = '---';}
						switch ($nomcamp['tc' . $j]) {
							case 3:
								$registre['c' . $j] = $usersInfo[$registre['usuari']];
								break;
							case 4:
								$registre['c' . $j] = $usersInfo[$registre['usuari']] . '<br>' . date('d/m/y', $registre['dataanota']) . '<br>' . date('H:i', $registre['dataanota']);
								break;
						}
						$rows[$i][$j] = nl2br($registre['c' . $j]);
						$j++;
					}
					if ($daid == 0) {
						$contingut = '';
						for($j = 2; $j < 7; $j++) {
							$c = 'c' . $j;
							$tc = 'tc' . $j;
							if ($agendas[$registre['daid']][$c] != '') {
								if ($agendas[$registre['daid']]['daid'] > 0) {
									$contingut .= '<fieldset><legend> ' . $agendas[$registre['daid']][$c] . '</legend>';
								}
								if ($agendas[$registre['daid']][$tc] != 3 &&
									$agendas[$registre['daid']][$tc] != 4) {
									$contingut .= ($registre[$c] != "") ? $registre[$c] : "---";
								}
								if ($agendas[$registre['daid']][$tc] == 3) {$contingut .= $usersInfo[$registre['usuari']];}
								if ($agendas[$registre['daid']][$tc] == 4) {$contingut .= $usersInfo[$registre['usuari']] . __(' on ', $dom).date('d/m/Y', $registre['dataanota']) . __(' at ', $dom).date('H:i', $registre['dataanota']);}
								$contingut .= '</fieldset>';
							}
						}
						if ($agendas[$registre['daid']]['daid'] > 0  && $user != '-1') {
							$contingut .= '<div style="text-align: right;"><span style="border: 2px solid ' . $agendas[$registre['daid']]['color'] . '; padding: 0px 5px 0px 5px;">' . $agendas[$registre['daid']]['nom_agenda'] . '</span></div>';
						}
						$rows[$i][2] = nl2br($contingut);
					}
					if ($registre['fitxer'] != '') {
						$rows[$i]['filename'] = $registre['fitxer'];
						$rows[$i]['filetitle'] = $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))] . " " . $i . "/" . $mes . "/" . $any;
						$rows[$i]['filecontent'] = $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))];
						// Get file extension
						$fileExtension = strtolower(substr(strrchr($registre['fitxer'], "."), 1));
						// get file icon
						$ctypeArray = pnModFunc('iw_main', 'user', 'getMimetype',
												 array('extension' => $fileExtension));
						$rows[$i]['fileIcon'] = $ctypeArray['icon'];
					} else {
						$rows[$i]['filename'] = "";
					}
					$rows[$i]['images'] = pnModFunc('iw_agendas', 'user', 'icons',
													 array('agenda' => $agendas[$registre['daid']],
														   'accessLevel' => $te_acces,
														   'note' => $registre,
														   'daid' => $daid,
														   'mes' => $mes,
														   'any' => $any,
														   'imatge' => $imatge,
														   'marcar' => $marcar));
				}
				$i++;
			}
		}
		$pnRender->assign('headers', $headers);
		$pnRender->assign('rows', $rows);
	}
	// Process the tasks
	if (pnUserLoggedIn()) {
		$tasques = pnModAPIFunc('iw_agendas', 'user', 'getalltasques',
								 array('mes' => $mes,
									   'any' => $any));
	}
	//Inform that the user has seen the notes in the current period 
	if ($daid == 0 && pnUserLoggedIn()) {
		$lid = pnModAPIFunc('iw_agendas', 'user', 'novesa0',
							 array('mes' => $mes,
								   'any' => $any));
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar',
				   array('module' => 'iw_main_block_news',
						 'name' => 'have_news',
						 'value' => 'ag',
						 'sv' => $sv));
	}
	//Posa la vista de l'agenda que l'usuari hagi triat
	if (!$dia != 0 && pnUserLoggedIn()) {
		pnModAPIFunc('iw_agendas', 'user', 'vista',
					  array('vista' => $llistat,
							'daid' => $daid));
	}
	return $pnRender->fetch('iw_agendas_user_main.htm');
}

/**
 * Get note icons for managment
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	The values that define a specific note
 * @return:	A string with the icons images and links
*/
function iw_agendas_user_icons($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$agenda = FormUtil::getPassedValue('agenda', isset($args['agenda']) ? $args['agenda'] : null, 'POST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$accessLevel = FormUtil::getPassedValue('accessLevel', isset($args['accessLevel']) ? $args['accessLevel'] : null, 'POST');
	$note = FormUtil::getPassedValue('note', isset($args['note']) ? $args['note'] : null, 'POST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$user = pnUserGetVar('uid');
	// Check wether it's protected
	$imatgeprotegida = ($note['protegida'] == 1) ? 'nocandau.gif' : 'candau.gif';
	$protegida = ($note['protegida'] == 1) ? __('Delete protection against automatic deletion for this event', $dom) : __('Protected? ', $dom);
	if ($note['completa'] == 1 || (strpos($note['completedByUser'], '$' . $user . '$') !== false && $daid == 0)) {
		$imatge = ($daid != 0) ? 'mostra.gif' : 'ncompleta.gif';
		$marcar = ($daid != 0) ? __('Show', $dom) : __('Mark as not completed', $dom);
	} else {
		$imatge = ($daid != 0) ? 'amaga.gif' : 'completa.gif';
		$marcar = ($daid != 0) ? __('Hide', $dom) : __('Mark as completed', $dom);
	}
	if ((strpos($agenda['gAccessLevel'],'$owne|'.$user.'$') !== false || $agenda['gAccessLevel'] == '')  && ($accessLevel == 4 || ($accessLevel == 3 && $note['usuari'] == $user)) && ($note['daid'] == 0 || $daid > 0)) {
		$icons = "<a href=index.php?module=iw_agendas&amp;func=editar&amp;mes=" . $mes . "&amp;any=" . $any . "&amp;aid=" . $note['aid'] . "&amp;daid=" . $note['daid'] . " title='" . __('Edit', $dom)."'><img src=\"modules/iw_agendas/pnimages/editar.gif\" alt='".__('Edit', $dom)."'></a>";
	}
	if ((strpos($agenda['gAccessLevel'],'$owne|'.$user.'$') !== false || $agenda['gAccessLevel'] == '' || $daid == 0) && ($accessLevel == 4 || ($accessLevel == 3 && $note['usuari'] == $user) || ($daid == 0 && $user !='-1'))) {
		if ($note['rid'] > 0) {
			$icons .= "<a href=index.php?module=iw_agendas&amp;func=esborra&amp;mes=" . $mes . "&amp;any=" . $any . "&amp;aid=" . $note['aid'] . "&amp;daid=" . $daid." title='" . __('Delete', $dom) . "'><img src=\"modules/iw_agendas/pnimages/del.gif\" alt='" . __('Delete', $dom) . "'></a>";
		} else {
			$icons .= "<a href=\"javascript:deleteNote(" . $note['aid'] . "," . $daid.")\" title='" . __('Delete', $dom) . "' ><img src=\"modules/" . pnModGetName() . "/pnimages/del.gif\" alt='" . __('Delete', $dom) . "'></a>";
		}
	}
	if ($accessLevel == 4 || ($accessLevel == 3 && $note['usuari'] == $user) || ($daid == 0 && $user != '-1')) {
		if ($note['gCalendarEventId'] == '' || $daid == 0) {
			$icons .= "<a href=\"javascript:completeNote(".$note['aid'] . "," . $daid.")\" title='" . $marcar . "' id=\"acompletedIcon_" . $note['aid'] . "\" ><img id=\"completedIcon_" . $note['aid'] . "\" src=\"modules/iw_agendas/pnimages/" . $imatge . "\" alt='" . $marcar . "'></a>";
		}
	}
	if ((strpos($agenda['gAccessLevel'], '$owne|' . $user . '$') !== false || $agenda['gAccessLevel'] == '') && ($accessLevel == 4 || ($accessLevel == 3 && $note['usuari'] == $user) && ($note['daid'] == 0 || $daid > 0))) {
		$icons .= "<a href=\"javascript:protectNote(" . $note['aid'] . "," . $daid . ")\" title=\"" . $protegida . "\" id=\"aprotectedIcon_" . $note['aid'] . "\" ><img id=\"protectedIcon_" . $note['aid'] . "\" src=\"modules/iw_agendas/pnimages/" . $imatgeprotegida . "\" alt='" . $protegida . "'></a>";
	}
	// If it's a shared agenda, show the icon to copy to personal agenda
	if ($note['daid'] > 0 && $user != '-1') {
		$icons .= "<a href=index.php?module=iw_agendas&amp;func=meva&amp;mes=" . $mes . "&amp;any=" . $any . "&amp;aid=" . $note['aid'] . "&amp;daid=" . $daid . " title='" . __('Send register to my personal agenda', $dom) . "'><img src=\"modules/iw_agendas/pnimages/meva.gif\" alt='" . __('Send register to my personal agenda', $dom) . "'></a>";
	}
	return $icons;
}

/**
 * Check the type of access of the user into the agenda
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Array with the agenda identity, the groups string access, the managers stringf acces and the agenda state
 * @return:	0 - No access
		1 - Read only
		2 - Write
		3 - Manage own
		4 - Manage all
*/
function iw_agendas_user_te_acces($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
	$resp = FormUtil::getPassedValue('resp', isset($args['resp']) ? $args['resp'] : null, 'POST');
	$activa = FormUtil::getPassedValue('activa', isset($args['activa']) ? $args['activa'] : null, 'POST');
	// Needed argument
	if (!isset($daid) || !is_numeric($daid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	if ($daid != 0 && ($grup == null || $resp == null || $activa == null)) {
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								array('daid' => $daid));
		if ($agenda == false) {
			LogUtil::registerError (__('The agenda was not found', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
		}
		$grup = $agenda['grup'];
		$resp = $agenda['resp'];
		$activa = $agenda['activa'];
	}
	// if agenda is not active deny access
	if ($activa == 0 && $daid != 0) {
		return 0;
	}
	//if user is an agenda manager or is a personal agenda return 4
	if (strpos($resp, '$' . pnUserGetVar('uid') . '$') !== false || $daid == 0) {
		if (pnUserLoggedIn()) {return 4;}
	}
	//if user is not registered and the group 0 can access the agenda items are only readtable
	if ((!pnUserLoggedIn() && strpos($grup, '$-1|') !== false) || $daid == 0) {
		return 1;
	}
	// get user groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllUserGroups',
						 array('sv' => $sv));
	$accessType = 0;
	foreach ($groups as $group) {
		$pos = strpos($grup, '$'.$group['id'].'|');
		if ($pos !== false) {
			$access = substr($grup, $pos + 1, strlen($group['id']) + 2);
			$accessArray = explode('|', $access);
			if ($accessType < $accessArray[1]) {
				$accessType = $accessArray[1];
			}
		}
	}
	return $accessType;
}

/**
 * Show the module information
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_agendas_user_module() {
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas',false);
	$module = pnModFunc('iw_main', 'user', 'module_info',
						 array('module_name' => 'iw_agendas',
							   'type' => 'user'));
	$pnRender->assign('module', $module);
	return $pnRender->fetch('iw_agendas_user_module.htm');
}

/**
 * Compose the user menu depending on which agendas can access
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Agenda identity and mounht and year position
 * @return	The user menu
 */
function iw_agendas_user_menu($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : date("d"), 'REQUEST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'REQUEST');
	$llistat = FormUtil::getPassedValue('llistat', isset($args['llistat']) ? $args['llistat'] : null, 'REQUEST');
	$purga = FormUtil::getPassedValue('purga', isset($args['purga']) ? $args['purga'] : null, 'REQUEST');
	$reduced = FormUtil::getPassedValue('reduced', isset($args['reduced']) ? $args['reduced'] : 0, 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$odaid = $daid;
	$gdaid = 0;
	if ($daid == 0) {
		$usability = pnModFunc('iw_agendas', 'user', 'getGdataFunctionsUsability');
		if ($usability === true) {
			//if user use gCalendar integration and daid is zero get the gCalendar default
			$defaultCalendar = pnModAPIFunc('iw_agendas','user','getGCalendarUserDefault');
			$gdaid = $defaultCalendar['daid'];
		}
	}
	$user = pnUserGetVar('uid');
	if ($gdaid == 0) {$gdaid = $daid;}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas', false);
	// If it's a shared agenda, get the data and check the perms
	if ($daid != 0) {
		// Get the agenda data
		$registre = pnModApiFunc('iw_agendas', 'user', 'getAgenda',
							      array('daid' => $daid));
    		//Comprovem que la consulta anterior ha tornat amb resultats
		if ($registre == false) {
			return pnSessionSetVar('errormsg', __('Event not found', $dom));
		}
	}
	// Check whether the user can access the agenda
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
						   array('daid' => $daid,
								 'grup' => $registre['grup'],
								 'resp' => $registre['resp'],
								 'activa' => $registre['activa']));
	// If the user has no access, show an error message and stop execution
	if ($te_acces == 0) {
		LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	// Pass the name of the agenda to the template
	if ($daid == 0) {
		$pnRender->assign('agendaname', __('Personal', $dom));
	} else {
		$pnRender->assign('agendaname', $registre['nom_agenda']);
	}
	$pnRender->assign('daid', $daid);
	if (pnUserLoggedIn()) {
		//get the agendas where the user is subscribed
		$subs = pnModApiFunc('iw_agendas','user','getUserSubscriptions');
	}
	$subsArray = array();
	foreach ($subs as $sub) {
		array_push($subsArray,$sub['daid']);
	}
	//get all the agendas where the user can access  
	$agendas = pnModFunc('iw_agendas', 'user', 'getUserAgendas');
	$pnRender->assign('color', $agendas[$daid]['color']);
	$i = 0;
	$ipr = 3;
	foreach ($agendas as $agenda) {
		if ($agenda['color'] == '') {
			// Set a default color
			$userColor = '#FFFFFF';
			// Get gCalendar user color 
			$pos = strpos($agenda['gColor'],'|'.$user.'$');
			$userColor = ($pos > 0) ? substr($agenda['gColor'],$pos - 7,7) : '';
			$agenda['color'] = $userColor;
		}
		$newdiv = ($i % $ipr == 0) ? 1 : 0;
		$enddiv = ($i % $ipr == $ipr - 1 || $i == count($agendas) - 1) ? 1 : 0;
		$i++;
		$subs = (!in_array($agenda['daid'], $subsArray)) ? 0 : 1;
		$gCalendar = ($agenda['gCalendarId'] == '') ? 0 : 1;
		$name = (strlen($agenda['nom_agenda']) > 13) ? mb_strimwidth($agenda['nom_agenda'], 0, 13, '...') : $agenda['nom_agenda'];
		$agendasArray[] = array('nom_agenda' => $name,
								'fullName' => $agenda['nom_agenda'],
								'daid' => $agenda['daid'],
								'color' => $agenda['color'],
								'subs' => $subs,
								'newdiv' => $newdiv,
								'enddiv' => $enddiv,
								'gCalendar' => $gCalendar);
	}
	// Pass the array of agendas to the template
	$pnRender->assign('agendas', $agendasArray);
	// Build an array with the months and pass it to the template
	$months = array(array('id' => 1,
						  'name' => __('January', $dom)),
					array('id' => 2,
						  'name' => __('February', $dom)),
					array('id' => 3,
						  'name' => __('March', $dom)),
					array('id' => 4,
						  'name' => __('April', $dom)),
					array('id' => 5,
						  'name' => __('May', $dom)),
					array('id' => 6,
						  'name' => __('June', $dom)),
					array('id' => 7,
						  'name' => __('July', $dom)),
					array('id' => 8,
						  'name' => __('August', $dom)),
					array('id' => 9,
						  'name' => __('September', $dom)),
					array('id' => 10,
						  'name' => __('October', $dom)),
					array('id' => 11,
						  'name' => __('November', $dom)),
					array('id' => 12,
						  'name' => __('December', $dom)));
	$pnRender->assign('months', $months);
	// Build an array with the years and pass it to the template
	for ($i = 2000; $i < 2040; $i++) {$years[] = array('id' => $i,
													   'name' => $i);}
	$pnRender->assign('years', $years);
	// Set default values: current month and year
	if (!isset($mes)) {$mes = date("m");}
	if (!isset($any)) {$any = date("Y");}
	$pnRender->assign('mes', $mes);
	$pnRender->assign('any', $any);
	$pnRender->assign('list', $llistat); // This must be a hidden param in the form
	// Get the info of the agenda select and the month and year selects
	if (pnUserLoggedIn()) {
		// Check whether the user has been subscribed to any agendas
		$pnRender->assign('subscriptions', pnModAPIFunc('iw_agendas', 'user', 'avissubscripcio'));
		// The user has been notified. Remove the notification indicator
		pnModAPIFunc('iw_agendas','user','treuavis');
		// The agenda admin must see usage info
		if ($te_acces == 4) {
			$nombrenotes = pnModAPIFunc('iw_agendas', 'user', 'comptanotes',
										 array('daid' => $daid));
			$maxnotes = pnModGetVar('iw_agendas', 'maxnotes');
			$avislimits = pnModAPIFunc('iw_agendas', 'user', 'avislimits',
										array('daid' => $daid));
			// If the user has achieved the maximum number of notes, increase the counter
			if (($nombrenotes >= $maxnotes) && ($maxnotes != 0)) {
				pnModAPIFunc('iw_agendas', 'user', 'pujaavis',
							  array('daid' => $daid,
									'value' => $avislimits + 1));
			}
			// If the user has accessed main agenda page more than 10 times, show a form inviting to delete notes and reset the variable
			if ($avislimits >= 10 || $purga == 1) {
				$pnRender->assign('dia', $dia);
				$pnRender->assign('purga', true);
				$pnRender->assign('delete_previous', date('d/m/Y', time() - 60 * 24 * 60 * 60), 10, 10);
				pnModAPIFunc('iw_agendas', 'user', 'pujaavis',
							  array('daid' => $daid,
									'value' => 0));
			}
		}
	}
	// Get the options (the user menu)
	if ($te_acces >= 2 && (strpos($registre['gAccessLevel'], '$owne|' . $user . '$') !== false || $registre['gCalendarId'] == '')) {
		// User logged in and is personal agenda or is admin => New annotation
		$user_menu[] = array('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'nova',
																	array('mes' => $mes,
																		  'any' => $any,
																		  'dia' => $dia,
																		  'tasca' => 0,
																		  'daid' => $gdaid,
																		  'odaid' => $odaid))),
																		  'text' => __('Insert a new event', $dom));
		if ($daid == 0) {
			// Is personal agenda => Add new task link
    		$user_menu[] = array ('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'nova',
    																	 array('mes' => $mes,
																			   'any' => $any,
																			   'dia' => $dia,
																			   'tasca' => 1,
																			   'daid' => 0))),
																			   'text' => __('Add a new task', $dom));
		}
	}
	if ($llistat == '1' ||
		!isset($llistat)) { // Show calendar or list
		$user_menu[] = array('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'main',
																	array('mes' => $mes,
																		  'any' => $any,
																		  'llistat' => -1,
																		  'daid' => $daid))),
																		  'text' => __('Calendar view', $dom));
	} else {
		$user_menu[] = array('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'main',
																	array('mes' => $mes,
																		  'any' => $any,
																		  'llistat' => 1,
																		  'daid' => $daid))),
																		  'text' => __('List view', $dom));
	}
	if ($daid > 0) {
		// Shared agenda
		if ($te_acces == 4 && $registre['gCalendarId'] == '') {
			// User is admin => Link to subscribe everybody who can access
			$user_menu[] = array('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'substots',
																		array('mes' => $mes,
																			  'any' => $any,
																			  'daid' => $daid))),
																			  'text' => __('Subscribe automaticaly everybody with access to this agenda', $dom));
		}
	}
	if (pnModFunc('iw_agendas', 'user', 'getGdataFunctionsUsability') === true && ($daid == 0 || $registre['gCalendarId'] != '')) {
		$user_menu[] = array('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'removeGCalendarUseVar',
																	array('mes' => $mes,
																		  'any' => $any,
																		  'daid' => $daid))),
																		  'text' => __('Refresh', $dom));
	}
	if (pnModGetVar('iw_agendas', 'calendariescolar') == 1) {
		// Schoolar calendar available => Show link
		$user_menu[] = array('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'cescolar',
																	array('mes' => $mes,
																		  'any' => $any,
																		  'daid' => $daid))),
																		  'text' => __('School calendar', $dom));
	}
	if ($te_acces == 4 && (strpos($registre['gAccessLevel'], '$owne|' . $user . '$') !== false || $registre['gCalendarId'] == '')) {
		// User logged in and is personal agenda or is admin
		$maxnotes = pnModGetVar('iw_agendas', 'maxnotes');
		if ($maxnotes != 0) { // There's a limit on the amount of annotations
			$percentage = round($nombrenotes * 100 / $maxnotes);
			$width_usage = ($percentage > 100) ? 100 : $percentage;
		}
		$user_menu[] = array('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'main',
																	array('mes' => $mes,
																		  'any' => $any,
																		  'daid' => $daid,
																		  'purga' => 1))),
																		  'text' => __('Delete events previous to given date', $dom));
	}
	$pnRender->assign('number_of_notes', $nombrenotes);
	$pnRender->assign('width_usage', $width_usage);
	$pnRender->assign('percentage', $percentage);
	$pnRender->assign('export', $export);
	$pnRender->assign('user_menu', $user_menu);
	$pnRender->assign('reduced', $reduced);
	$today = array('month' => date('m'),
					'year' => date('Y'));
	$pnRender->assign('today', $today);
	// If the module is being monitored, add the visit
	if (pnModAvailable('iw_visits') && pnModIsHooked('iw_visits', 'iw_agendas')) {
		pnModAPIFunc('iw_visits', 'user', 'visit');
	}
	return $pnRender->fetch('iw_agendas_user_menu.htm');
}

/**
 * get all the agendas where the user can access
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @return	An array with the agendas identities and names where the user can access
 */
function iw_agendas_user_getUserAgendas()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$agendas = array();
	// Get the data of all the agendes
	$registres = pnModAPIFunc('iw_agendas', 'user', 'getAllAgendas');
	//return empty if user is not login or there not agendas defined
	if (empty($registres)) {
		return $agendas;
	}
	// Build an array with all the agendas that the user can access
	$agendas = array(array('daid' => 0,
						   'nom_agenda' => __('Personal', $dom),
						   'color' => '#FFFFFF',
						   'c1' => __('Event', $dom),
						   'c2' => __('More information', $dom),
						   'c3' => '',
						   'c4' => '',
						   'c5' => '',
						   'c6' => ''));
	$uid = (pnUserLoggedIn()) ? pnUserGetVar('uid') : '-1';
	// get user groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllUserGroups',
						 array('sv' => $sv));
	foreach ($registres as $agenda) {
		if ($agenda['activa'] == 1) {
			//check if the user can access the agenda as manager
			if (strpos($agenda['resp'], '$' . $uid . '$') !== false) {
				//can access the agenda
				$agendas[$agenda['daid']] = $agenda;
			} else {
				if ($uid > 0) {
					//check if the user in the groups access
					foreach ($groups as $group) {
						if (strpos($agenda['grup'], '$' . $group['id'] . '|') !== false) {
							$agendas[$agenda['daid']] = $agenda;
						}
					}
				} else {
					if (strpos($agenda['grup'], '$-1|') !== false) {
						$agendas[$agenda['daid']] = $agenda;
					}
				}
			}
		}
	}
	if (count($agendas) <= 1) {
		$agendas = array();
	}
	return $agendas;
}
/**
 * return the information associated to a holiday
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	Information about the day requested
 * @return	An array with the holiday information
 */
function iw_agendas_user_festiu($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : date("d"), 'POST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if (strlen($dia) == 1) {$dia = '0'.$dia;}
	if (strlen($mes) == 1) {$mes = '0'.$mes;}
	$festiussempre = pnModGetVar('iw_agendas', 'festiussempre');
	$altresfestius = pnModGetVar('iw_agendas', 'altresfestius');
	$retorn = false;
	$etiqueta = '';
	//Mirem si el dia estï¿œ dins dels sempre festius
	$pos = strpos($festiussempre,'$'.$dia.$mes.'|');
	if ($pos != 0) {
		$retorn = true;
		$etiqueta = strstr(str_replace('\'', '&acute;', $festiussempre), '$' . $dia . $mes . '|');
		$pos1 = strpos($etiqueta,'$$');
		$etiqueta = ($pos1 != 0) ? substr($etiqueta, 6, $pos1 - 6) : substr($etiqueta, 6, -1);
	}
	//Mirem si el dia estï¿œ dins dels altres festius
	$pos1 = strpos($altresfestius,'$'.$dia.$mes.$any.'|');
	if ($pos1 != 0) {
		$retorn = true;
		$etiqueta = strstr(str_replace('\'', '&acute;', $altresfestius), '$' . $dia . $mes . $any . '|');
		$pos1 = strpos($etiqueta,'$$');
		$etiqueta = ($pos1 != 0) ? substr($etiqueta, 10, $pos1-10) : substr($etiqueta, 10, -1);
	}
	$valors = array('festiu' => $retorn,
					'etiqueta' => $etiqueta);
	return $valors;
}

/**
 * Creates the form for new annotations
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the day where to add the note and the agenda
 * @return	The form fields
 */
function iw_agendas_user_nova($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : date("d"), 'REQUEST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'REQUEST');
	$dia1 = FormUtil::getPassedValue('dia1', isset($args['dia1']) ? $args['dia1'] : date("d"), 'REQUEST');
	$mes1 = FormUtil::getPassedValue('mes1', isset($args['mes1']) ? $args['mes1'] : date("m"), 'REQUEST');
	$any1 = FormUtil::getPassedValue('any1', isset($args['any1']) ? $args['any1'] : date("Y"), 'REQUEST');
	$tasca = FormUtil::getPassedValue('tasca', isset($args['tasca']) ? $args['tasca'] : 0, 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'REQUEST');
	$odaid = FormUtil::getPassedValue('odaid', isset($args['odaid']) ? $args['odaid'] : 0, 'REQUEST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ) || !pnUserLoggedIn()) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas',false);
	// Get the agenda definition only for shared agendas. This refers to table "agenda_def"
	if ($daid == 0) {
		// Personal agenda and agenda of non-registered. First 2 fields are special.
		if ($tasca == 0) { 
			$fields[] = array ('desc' => __('Event', $dom),
							   'value' => "<textarea type=\"text\" name=\"c1\" id=\"c1\" rows=\"6\" cols=\"40\" /></textarea>");
		} else { 
			$fields[] = array ('desc' => __('Task', $dom),
							   'value' => "<textarea type=\"text\" name=\"c1\" id=\"c1\" rows=\"6\" cols=\"40\" /></textarea>");
		}

		$fields[] = array ('desc' => __('More information', $dom),
					'value' => "<textarea type=\"text\" name=\"c2\" id=\"c2\" rows=\"6\" cols=\"40\" /></textarea>");

		// In case attaches ies permitted in personal agendas
		$pnRender->assign('attachpermitted', pnModGetVar('iw_agendas', 'adjuntspersonals')); 
	} else {
		// Shared agenda
		// Get the shared agenda definition
		$agendadef = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								   array('daid' => $daid));

		// Check whether the user can access to the agenda
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $agendadef['daid'],
									 'grup' => $agendadef['grup'],
									 'resp' => $agendadef['resp'],
									 'activa' => $agendadef['activa']));
		if ($te_acces < 2) {
			LogUtil::registerError (__('You are not allowed to do that', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
		}

		if ($agendadef['gCalendarId'] != '') {
			$pnRender->assign('gCalendar', true);
		}
		$pnRender->assign('attachpermitted', $agendadef['adjunts']);
		// Put fields c1 to c6 in an array
		for ($i = 1; $i < 7; $i++) {
			if (!empty($agendadef['c' . $i])) {
				$c = 'c' . $i; // Field name
				$tc = 'tc' . $i; // Field type
				$op = 'op' . $i; // Field options
				switch($agendadef[$tc]) {
					// The field type defines the input type of the form
					case '1': // Type = text
						$value = "<input type=\"text\" name=\"" . $c . "\" id=\"" . $c . "\" size=\"50\"/>";
						break;
					case '2': // Type = textarea
						$value = "<textarea name=\"" . $c . "\" id=\"" . $c . "\" rows=\"6\" cols=\"30\" /></textarea>";
						break;
					case '3': // Type = not an input field
						//get user info
						$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
						$value = "<span>" . pnModFunc('iw_main', 'user', 'getUserInfo',
													   array('sv' => $sv,
															 'uid' => pnUserGetVar('uid'),
															 'info' => 'nc')) . "</span>";
						break;
					case '4': // Type = not an input field
						$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
						$value = "<span>" . pnModFunc('iw_main', 'user', 'getUserInfo',
													   array('sv' => $sv,
															 'uid' => pnUserGetVar('uid'),
															 'info' => 'nc')) . __('on', $dom) . date('d/m/Y') . __('at',$dom) . date('H:i') . "</span>";
						break;
					case '5': // Type = select
						$options = explode('-', $agendadef[$op]);
						$value = "<select name=\"" . $c . "\" id=\"" . $c . "\">";
						foreach ($options as $option) {
							$value .= "<option value=\"$option\">$option</option>";
						}
						$value .= "</select>";
						break;
				}
				$fields[] = array ('order' => $i,
								   'desc'  => $agendadef[$c],
								   'value' => $value);
			}
		}
	}
	$pnRender->assign('fields', $fields);
	// The form is shared for annotations and tasks. This particularizes depending on the $tasca param
	if ($tasca == 0) {
		// Not a task
		$acciosubmit = __('Create event', $dom);
		$msg_no_nota = __("You haven't written the event", $dom);
		$title = ($daid == 0) ? __('Insert a new event', $dom) . " => <em>" . __('Personal', $dom) . "</em>" : __('Insert a new event', $dom) . " => <em>" . $agendadef['nom_agenda'] . "</em>";
		$date = __('Date', $dom);
	} else {
		// It's a task
		$acciosubmit = __('Create task', $dom);
		$msg_no_nota = __("You haven't written the task", $dom);
		$title = __('Add a new task', $dom);
		$date = __('Expiry date ', $dom);
		//Creem un array preparat per un MultiSelect amb els nivells de prioritat d'una tasca
		$nivells_MS = array(array('id' => 0,
								  'name' => '0'),
							array('id' => 1,
								  'name' => '1'),
							array('id' => 2,
								  'name' => '2'),
							array('id' => 3,
								  'name' => '3'),
							array('id' => 4,
								  'name' => '4'),
							array('id' => 5,
								  'name'=>'5'));	
	}
	$pnRender->assign('task', $tasca);
	$pnRender->assign('acciosubmit', $acciosubmit);
	$pnRender->assign('msg_no_nota', $msg_no_nota);	
	$pnRender->assign('title', $title);	
	$pnRender->assign('date', $date);
	$pnRender->assign('extensions', pnModGetVar('iw_main','extensions'));
	$pnRender->assign('maxattachsize', pnModGetVar('iw_main','maxsize'));
	$pnRender->assign('selectedday', $dia);
	$pnRender->assign('selectedmonth', $mes);
	$pnRender->assign('selectedyear', $any);
	$pnRender->assign('daid', $daid);
	$pnRender->assign('odaid', $odaid);
	// Build the menu and pass it to the template
	$pnRender->assign('menu', pnModFunc('iw_agendas', 'user', 'menu',
										 array('mes' => $mes,
											   'any' => $any,
											   'dia' => $dia,
											   'daid' => $daid,
											   'reduced' => 1)));
	//Passem a format timestamp la data seleccionada i calculem els nombre de dies que tï¿œ el mes en la data seleccionada
	$primerdiames = mktime(0, 0, 0, $mes, 1, $any);
	$diesmes = date("t",$primerdiames);
	if ($dia > $diesmes) {$dia = 1;}
	if ($daid > 0) {$dia = 0;}
	//Omplim un multiselect amb els dies del mes
	$dies_MS[] = array('id' => 0,
						'name' => '');
	for($i = 1; $i < 32; $i++) {
		$h = $i;
		if ($i == 0) {$h = '00';}
		if (strlen($i) == 1) {$h = '0' . $i;}
		$dies_MS[] = array('id' => $h,
							'name' => $h);
	 }
	//Creem un array preparat per un MultiSelect amb els noms dels mesos
	$mesos_MS = array(array('id' => 1,
							'name' => __('January', $dom)),
					  array('id' => 2,
							'name' => __('February', $dom)),
					  array('id' => 3,
							'name' => __('March', $dom)),
					  array('id' => 4,
							'name'=> __('April', $dom)),
					  array('id' => 5,
							'name' => __('May', $dom)),
					  array('id' => 6,
							'name' => __('June', $dom)),
					  array('id' => 7,
							'name' => __('July', $dom)),
					  array('id' => 8,
							'name' => __('August', $dom)),
					  array('id' => 9,
							'name' => __('September', $dom)),
					  array('id' => 10,
							'name' => __('October', $dom)),
					  array('id' => 11,
							'name'=> __('November', $dom)),
					  array('id' => 12,
							'name' => __('December', $dom)));
	//Omplim un multiselect amb els anys disponibles
	for($i = date('Y'); $i < date('Y') + 50; $i++) {
		$anys_MS[] = array('id' => $i,
					'name' => $i);
	}
	//Omplim un multiselect amb les hores del dia
	for($i = 0; $i < 24; $i++) {
		$h = $i;
		if ($i == 0) {$h = '00';}
		if (strlen($i) == 1) {$h = '0' . $i;}
		$hores_MS[] = array('id' => $h,
							'name' => $h);
	}
	//Omplim un multiselect amb els minuts
	for($i = 0; $i < 12; $i++) {
		$m = $i * 5;
		if ($i == 0) {$m = '00';}
		if (strlen($m) == 1) {$m = '0'.$m;}
		$minuts_MS[] = array('id' => $m,
							 'name' => $m);
	}
	//Creem un array preparat per un MultiSelect amb les possibilitats de repeticiï¿œ
	$repes_MS = array(array('id' => 0,
							'name' => ''),
					  array('id' => 1,
							'name' => __('Daily', $dom)),
					  array('id' => 2,
							'name' => __('Weekly', $dom)),
					  array('id' => 3,
							'name' => __('Monthly', $dom)),
					  array('id' => 4,
							'name' => __('Every year', $dom)),
					  array('id' => 5,
							'name'=>__('Every (days)', $dom)));																
	// Pass the values to the template
	$pnRender->assign('dies_MS', $dies_MS);	
	$pnRender->assign('mesos_MS', $mesos_MS);	
	$pnRender->assign('anys_MS', $anys_MS);	
	$pnRender->assign('hores_MS', $hores_MS);	
	$pnRender->assign('minuts_MS', $minuts_MS);	
	$pnRender->assign('nivells_MS', $nivells_MS);
	$pnRender->assign('repes_MS', $repes_MS);
	return $pnRender->fetch('iw_agendas_user_new.htm');
}

/**
 * get the values recevied from the form to create a new agenda
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the agenda
 * @return	True if success and false otherwise
 */
function iw_agendas_user_crear($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$diatriat = FormUtil::getPassedValue('diatriat', isset($args['diatriat']) ? $args['diatriat'] : null, 'REQUEST');
	$mestriat = FormUtil::getPassedValue('mestriat', isset($args['mestriat']) ? $args['mestriat'] : null, 'REQUEST');
	$anytriat = FormUtil::getPassedValue('anytriat', isset($args['anytriat']) ? $args['anytriat'] : null, 'REQUEST');
	$horatriada = FormUtil::getPassedValue('horatriada', isset($args['horatriada']) ? $args['horatriada'] : null, 'REQUEST');
	$minuttriat = FormUtil::getPassedValue('minuttriat', isset($args['minuttriat']) ? $args['minuttriat'] : null, 'REQUEST');
	$diatriat1 = FormUtil::getPassedValue('diatriat1', isset($args['diatriat1']) ? $args['diatriat1'] : null, 'REQUEST');
	$mestriat1 = FormUtil::getPassedValue('mestriat1', isset($args['mestriat1']) ? $args['mestriat1'] : null, 'REQUEST');
	$anytriat1 = FormUtil::getPassedValue('anytriat1', isset($args['anytriat1']) ? $args['anytriat1'] : null, 'REQUEST');
	$horatriada1 = FormUtil::getPassedValue('horatriada1', isset($args['horatriada1']) ? $args['horatriada1'] : null, 'REQUEST');
	$minuttriat1 = FormUtil::getPassedValue('minuttriat1', isset($args['minuttriat1']) ? $args['minuttriat1'] : null, 'REQUEST');
	$c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'REQUEST');
	$c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'REQUEST');
	$c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'REQUEST');
	$c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'REQUEST');
	$c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'REQUEST');
	$c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'REQUEST');
	$totdia = FormUtil::getPassedValue('totdia', isset($args['totdia']) ? $args['totdia'] : null, 'REQUEST');
	$repes = FormUtil::getPassedValue('repes', isset($args['repes']) ? $args['repes'] : null, 'REQUEST');
	$repesdies = FormUtil::getPassedValue('repesdies', isset($args['repesdies']) ? $args['repesdies'] : null, 'REQUEST');
	$diatriatrep = FormUtil::getPassedValue('diatriatrep', isset($args['diatriatrep']) ? $args['diatriatrep'] : null, 'REQUEST');
	$mestriatrep = FormUtil::getPassedValue('mestriatrep', isset($args['mestriatrep']) ? $args['mestriatrep'] : null, 'REQUEST');
	$anytriatrep = FormUtil::getPassedValue('anytriatrep', isset($args['anytriatrep']) ? $args['anytriatrep'] : null, 'REQUEST');
	$tasca = FormUtil::getPassedValue('tasca', isset($args['tasca']) ? $args['tasca'] : null, 'REQUEST');
	$nivell = FormUtil::getPassedValue('nivell', isset($args['nivell']) ? $args['nivell'] : null, 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
	$odaid = FormUtil::getPassedValue('odaid', isset($args['odaid']) ? $args['odaid'] : 0, 'REQUEST');
	$oculta = FormUtil::getPassedValue('oculta', isset($args['oculta']) ? $args['oculta'] : null, 'REQUEST');
	$protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'REQUEST');
	$fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'REQUEST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_agendas', 'user', 'main'));
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas',false);
	// Comprovem que l'usuari pugui accedir a l'agenda
	if ($daid != 0) {
		//Estem entrant a una agenda multiusuari
		//Carreguem les dades de l'agenda
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								array('daid' => $daid));
		if ($daid=='-1') {$agenda['daid']='-1';}

		// Check whether the user can access the agenda
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $agenda['daid'],
									 'grup' => $agenda['grup'],
									 'resp' => $agenda['resp'],
									 'activa' => $agenda['activa']));
		if ($te_acces < 2) {
			LogUtil::registerError (__('You are not allowed to do that', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
		}
	}
	// comprovem que la data sigui correcta
	if (!checkdate($mestriat,$diatriat,$anytriat)) {$dataerror = true;}
	$error = false;
	if ($dataerror) {
		$pnRender->assign('title', __('Agenda administration', $dom));
		$pnRender->assign('error', __('Incorrect date', $dom));
		$error = true;
	}
	//Comprovem que s'han complimentat les dades requerides del formulari
	//En aquests cas nomï¿œs ï¿œs obligat posar l'anotaciï¿œ a l'agenda
	if (empty($c1) && !$error) {
		$errorMsg = (!isset($tasca)) ? __('You haven\'t written the event', $dom) : __('You haven\'t written the task', $dom);
		$pnRender->assign('title', __('Agenda administration', $dom));
		$pnRender->assign('error', $errorMsg);
		$error = true;
	}
	//Si hi ha anotacions amb repeticiï¿œ comprovem que les dades siguin correctes
	if ($repes > 0 && !$error) {
		//verifiquem que la data fins a la repeticiï¿œ sigui correcta
		if (!checkdate($mestriatrep,$diatriatrep,$anytriatrep)) {$dataerror = true;}
		$data = mktime(0, 0, 0, $mestriat, $diatriat, $anytriat);
		$datarep = mktime(0, 0, 0, $mestriatrep, $diatriatrep, $anytriatrep);
		if ($datarep <= $data) {$dataerror = true;}
		if ($dataerror) {
			$pnRender->assign('title', __('Agenda administration', $dom));
			$pnRender->assign('error', __('Ending date of repetitions is incorrect. Please verify it', $dom));
			$error = true;
		}
		if ($repes == 5 && (!isset($repesdies) || !is_numeric($repesdies)) && !$error) {
			$pnRender->assign('title', __('Agenda administration', $dom));
			$pnRender->assign('error', __('Number of days for repetition is incorrect', $dom));
			$error = true;
		}
	}
	$data = mktime($horatriada, $minuttriat, 0, $mestriat, $diatriat, $anytriat);
	$data1 = mktime($horatriada1, $minuttriat1, 0, $mestriat1, $diatriat1, $anytriat1);
	$datarepe = mktime($horatriada, $minuttriat, 0, $mestriatrep, $diatriatrep, $anytriatrep);
	if ($repes == 0) {$datarepe = $data;}
	if ($_FILES['fitxer']['name'] != "" && ($agenda['adjunts'] == 1 || ($daid == 0 && pnModGetVar('iw_agendas', 'adjuntspersonals') == 1)) && !$error) {
		$folder = pnModGetVar('iw_agendas','urladjunts');
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$update = pnModFunc('iw_main', 'user', 'updateFile',
							 array('sv' => $sv,
								   'folder' => $folder,
								   'file' => $_FILES['fitxer']));
		//the function returns the error string if the update fails and and empty string if success
		if ($update['msg'] != '') {
			$nom_fitxer = '';
			$pnRender->assign('error', __('File size incorrect. Maximum size is ', $dom) . pnModGetVar('iw_main','maxsize') . ' ' . __('bits.', $dom));
			$error = true;
		} else {
			$nom_fitxer = $update['fileName'];
		}
	}
	if ($error) {
		$pnRender->assign('url', array ('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'nova',
																			array('horatriada' => $horatriada,
																				  'minuttriat' => $minuttriat,
																				  'mes' => $mestriat,
																				  'dia'=> $diatriat, 
																				  'any' => $anytriat,
																				  'horatriada1' => $horatriada1,
																				  'minuttriat1' => $minuttriat1,
																				  'mes1' => $mestriat1,
																				  'dia1'=> $diatriat1, 
																				  'any1' => $anytriat1, 
																				  'c1' => $c1,
																				  'c2' => $c2,
																				  'c3' => $c3,
																				  'c4' => $c4,
																				  'c5' => $c5,
																				  'c6' => $c6,
																				  'totdia' => $totdia,
																				  'tasca' => $tasca,
																				  'nivell' => $nivell, 					
																				  'repes' => $repes,
																				  'repesdies' => $repesdies,
																				  'diarep' => $diatriatrep,
																				  'mesrep' => $mestriatrep,
																				  'anyrep' => $anytriatrep,
																				  'daid' => $daid,
																				  'odaid' => $odaid,
																				  'oculta' => $oculta,
																				  'protegida' => $protegida))),
										  'desc' => __('Back to previous form', $dom)));
		return $pnRender->fetch('iw_agendas_user_error.htm');
	}
	while ($data <= $datarepe) {
		switch($repes) {
			case 0:
				$data = $datarepe + 1;
				break;
			case 1:
				//repeteix a diari fins a la data seleccionada
				$data = $data + (60 * 60 * 24) * $passat;
				$passat = 1;
				break;
			case 2:
				//repeteix setmanalment fins a la data seleccionada
				$data = $data + (60 * 60 * 24 * 7) * $passat;
				$passat = 1;
				break;
			case 3:
				//repeteix el mateix dia de cada mes fins a la data seleccionada
				if ($passat == 0) {
					$mestriat1 = $mestriat;
					$anytriat1 = $anytriat;
				}
				$diatriat1 = $diatriat;
				$mestriat1 = $mestriat1 + $passat;
				if ($mestriat1 == 13) {
					$mestriat1 = 1;
					$anytriat1 = $anytriat1 + 1;
				}
				//Comprovem que la data que estem a punt d'escriure realment existeix per mesos amb diferent nombre de dies
				//De no ser aixï¿œ anem a buscar l'ï¿œltim dia del mes
				while (!checkdate($mestriat1, $diatriat1, $anytriat1)) {
					$diatriat1 = $diatriat1 - 1;
				}
				$data = mktime(1, 1, 1, $mestriat1, $diatriat1, $anytriat1);
				$passat = 1;
				break;
			case 4:
				//Repeteix el mateix dia de cada any fins a la data seleccionada
				if ($passat == 0) {
					$anytriat1 = $mestriat;
					$anytriat1 = $anytriat;
				}
				$diatriat1 = $diatriat;
				$mestriat1 = $mestriat;
				$anytriat1 = $anytriat1 + $passat;
				//comprovem que la data que estem a punt d'escriure realment existeix per si estem a
				//darrer dia de febrer en un any biciest
				while (!checkdate($mestriat1, $diatriat1, $anytriat1)) {$diatriat1 = $diatriat1 - 1;}
				$data = mktime(1, 1, 1, $mestriat1, $diatriat1, $anytriat1);
				$passat = 1;
				break;
			case 5:
				//repeteix cada el nombre de dies especificat
				$data = $data + (60 * 60 * 24 * $repesdies) * $passat;
				$passat = 1;
				break;
		}
		if ($daid > 0 && $agenda['gCalendarId'] == '') {
			$subscrits = pnModAPIFunc('iw_agendas', 'user', 'getsubscrits',
									   array('daid' => $daid));
			$subscritString = '$';
			foreach ($subscrits as $subscrit) {
				$subscritString .= '$' . $subscrit['uid'] . '$';
			}
		}
		//If it is necessary create the nota into google
		if ($daid > 0 && $agenda['gCalendarId'] != '') {
			$usability = pnModFunc('iw_agendas', 'user', 'getGdataFunctionsUsability');
			//check if user wants gCalendar
			$userSettings = pnModFunc('iw_agendas','user','getUserGCalendarSettings');
			if ($userSettings['gCalendarUse']) {
				if ($usability === true) {
					//Load required classes
					require_once 'Zend/Loader.php';
					Zend_Loader::loadClass('Zend_Gdata');
					Zend_Loader::loadClass('Zend_Gdata_AuthSub');
					Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
					Zend_Loader::loadClass('Zend_Gdata_HttpClient');
					Zend_Loader::loadClass('Zend_Gdata_Calendar');
					//@var string Location of AuthSub key file.  include_path is used to find this
					$_authSubKeyFile = null; // Example value for secure use: 'mykey.pem'
					//@var string Passphrase for AuthSub key file.
					$_authSubKeyFilePassphrase = null;
					$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;
					if (!isset($_SESSION['sessionToken']) && !isset($_GET['token'])) {
						try{
							$client = Zend_Gdata_ClientLogin::getHttpClient($userSettings['gUserName'], base64_decode($userSettings['gUserPass']), $service);
						} catch(exception $e) {
							$authSubUrl = pnModFunc('iw_agendas', 'user', 'getAuthSubUrl');
							return pnRedirect(pnModURL('iw_webbox', 'user', 'main',
														array('url' => str_replace('&', '*', str_replace('?', '**', $authSubUrl)))));
						}
					} else {
						$client = pnModFunc('iw_agendas', 'user', 'getAuthSubHttpClient');
					}
					$service = new Zend_Gdata_Calendar($client);
					//Protect correct format for dateStart and dataEnd
					if ($data1 < $data) {$data1 = $data;}
					// Create a new entry using the calendar service's magic factory method
					$event= $service->newEventEntry();
					// Populate the event with the desired information
					// Note that each attribute is crated as an instance of a matching class
					$event->title = $service->newTitle($c1);
					$event->where = array($service->newWhere($c3));
					$event->content = $service->newContent($c4);
					// Set the date using RFC 3339 format.
					$startDate = date('Y-m-d',$data);
					$endDate = date('Y-m-d',$data1);
					$when = $service->newWhen();
					if ($totdia == 0) {
						$tzOffset = ($userSettings['tzOffset'] == '') ? '+02': $userSettings['tzOffset'];
						//protect correct time format
						if ($data1 == $data) {
							$time = mktime($horatriada, $minuttriat, 0, $mestriat, $diatriat, $anytriat);
							$time1 = mktime($horatriada1, $minuttriat1, 0, $mestriat, $diatriat, $anytriat);
							$startTime = $horatriada . ':' . $minuttriat;
							$endTime = $horatriada1 . ':' . $minuttriat1;
							if ($time > $time1 || $horatriada1 == '' || $minuttriat1 == '') {
								$endTime = date('H:i' , $time + 1.5 * 60 * 60);
							}
						} else {
							$startTime = $horatriada . ':' . $minuttriat;
							$endTime = $horatriada1 . ':' . $minuttriat1;
						}
						$when->startTime = "{$startDate}T{$startTime}:00.000{$tzOffset}:00";
						$when->endTime = "{$endDate}T{$endTime}:00.000{$tzOffset}:00";
					} else {
						$when->startTime = "$startDate";
						$when->endTime = "$endDate";
					}
					$event->when = array($when);
					$calendarURL = str_replace(Zend_Gdata_Calendar::CALENDAR_FEED_URI . '/default/', "", $agenda['gCalendarId']); 
					$calendarURL = 'http://www.google.com/calendar/feeds/' . $calendarURL . '/private/full';
					// Upload the event to the calendar server
					// A copy of the event as it is recorded on the server is returned
					try {
						$newEvent = $service->insertEvent($event, $calendarURL);
					} catch (Zend_Gdata_App_Exception $e) {
						LogUtil::registerError (__('Error produced during gCalendar\'s event creation', $dom));
						return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
													array('mes' => $mestriat,
														  'any' => $anytriat,
														  'daid' => $odaid)));
					}
					$gCalendarEventId = $newEvent->id;
				} else {
					LogUtil::registerError ($usability);
				}
			}
			// Prepare hidden values
			$_POST['c2'] = ($totdia == 1) ? __('All day', $dom) : __('Foreseen time to finish', $dom) . ': ' . $horatriada1 . ':' . $minuttriat1;
			$_POST['c5'] = $userSettings['gUserName'];
		}
		//Es crida la funció API amb les dades extretes del formulari
		if ($data <= $datarepe || $repes == 0) {
			if (!isset($lid) || $lid == 0) {$init = true;}
			$lid = pnModAPIFunc('iw_agendas', 'user', 'crear',
								 array('dia' => date('d', $data),
									   'mes' => date('m', $data),
									   'any' => date('Y', $data),
									   'minut' => $minuttriat,
									   'hora' => $horatriada,
									   'horatriada1' => $horatriada1,
									   'minuttriat1' => $minuttriat1,
									   'mes1' => $mestriat1,
									   'dia1'=> $diatriat1, 
									   'any1' => $anytriat1, 
									   'c1' => $c1,
									   'c2' => $c2,
									   'c3' => $c3,
									   'c4' => $c4,
									   'c5' => $c5,
									   'c6' => $c6,
									   'totdia' => $totdia,
									   'tasca' => $tasca,
									   'nivell' => $nivell,
									   'rid' => $rid,
									   'daid' => $daid,
									   'nova' => $subscritString,
									   'oculta' => $oculta,
									   'fitxer' => $nom_fitxer,
									   'gCalendarEventId' => $gCalendarEventId,
									   'protegida' => $protegida));
			if ($init) {
				$rid = $lid;
				$init = false;
			}
		}
  	}
	if ($lid != false) {
		if ($missatge_estat == "") {$missatge_estat = __('New event created', $dom);}
		//Success
		LogUtil::registerStatus ($missatge_estat);
	}
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mestriat,
									  'any' => $anytriat,
									  'daid' => $odaid)));
}

/**
 * set a note as complete or incomplete
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	Information about the anotation
 * @return	True if success and false otherwise
 */
function iw_agendas_user_completa($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid) || !is_numeric($aid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	$anotacio = pnModAPIFunc('iw_agendas', 'user', 'get',
							  array('aid' => $aid));
	//Agafem les dades de l'agenda
	//Cridem la funció de l'API de l'usuari que ens retornarÃ  la informació del registre demanat
	if ($anotacio == false) {
		LogUtil::registerError (__('Event not found', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	//Comprovem que l'usuari pugui accedir a l'agenda
	if ($daid != 0) {
		//Estem entrant a una agenda multiusuari
		//Carreguem les dades de l'agenda
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								array('daid' => $daid));
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $daid,
									 'grup' => $agenda['grup'],
									 'resp' => $agenda['resp'],
									 'activa' => $agenda['activa']));
		// If the user has no access, show an error message and stop execution
		if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != pnUserGetVar('uid'))) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
		}
		$oculta = $anotacio['completa'];
	} else {
		// check if the user is modifying his/her note
		if ($anotacio['usuari'] != pnUserGetVar('uid')) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
		}
	}
	if ($anotacio['daid'] == $daid) {
		//Es crida la funció API amb les dades extretes del formulari
		//$lid = pnModAPIFunc('iw_agendas', 'user', 'completa', array('aid' => $aid));
		$completa = ($anotacio['completa'] == 1) ? 0 : 1;
		$items = array('completa' => $completa);
		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
							 array('aid' => $aid,
								   'daid' => $daid,
								   'items' => $items));
		if ($lid != false) {
			//Success
			LogUtil::registerStatus (__('Event status (completed/not completed) updated', $dom));
		}
  	} else {
		$uid = pnUserGetVar('uid');
		$completedByUser = ($anotacio['completedByUser'] == '')? '$' : $anotacio['completedByUser'];

		if (strpos($completedByUser, '$' . $uid . '$') !== false) {
			$completedByUser = str_replace('$' . $uid . '$', '', $completedByUser);
		} else {
			$completedByUser .= '$' . $uid . '$';
		}
		$items = array('completedByUser' => $completedByUser);
		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
							 array('aid' => $aid,
								   'daid' => $daid,
								   'items' => $items));
		if ($lid != false) {
			//Success
			LogUtil::registerStatus (__('Event status (completed/not completed) updated', $dom));
		}
	}
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mes,
									  'any' => $any,
									  'dia' => $dia,
									  'daid' => $daid)));
}

/**
 * Delete a note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the anotation
 * @return	True if success and false otherwise
 */
function iw_agendas_user_esborra($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');
	$confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
	$rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');
	$repes = FormUtil::getPassedValue('repes', isset($args['repes']) ? $args['repes'] : null, 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid) || !is_numeric($aid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas',false);
	//Cridem la funció de l'API de l'usuari que ens retornaró la informació del registre demanat
	$registre = pnModAPIFunc('iw_agendas', 'user', 'get',
							  array('aid' => $aid));
	if ($registre == false) {
		LogUtil::registerError (__('Event not found', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	//Comprovem que l'usuari pugui accedir a l'agenda
	if ($daid != 0) {
		//Estem entrant a una agenda multiusuari
		//Carreguem les dades de l'agenda
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								array('daid' => $daid));
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $daid,
									 'grup' => $agenda['grup'],
									 'resp' => $agenda['resp'],
									 'activa' => $agenda['activa']));
		// If the user has no access, show an error message and stop execution
		if ($te_acces < 3 || ($te_access == 3 && $registre['usuari'] != pnUserGetVar('uid'))) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('mes' => $mes,
											  'any' => $any,
											  'dia' => $dia,
											  'daid' => $daid)));
		}
	}
	//Si ha arribat fins aquÃ­ podrÃ  esborrar el registre de l'agenda
	//Demanem confirmació per l'esborrament del registre, si no s'ha demanat abans
	if (empty($confirmation)) {
		// Check for repetitions
		$repes = pnModAPIFunc('iw_agendas', 'user', 'comptarepes',
							   array('aid' => $aid,
									 'rid' => $registre['rid']));
		// Get the menu
		$pnRender->assign('menu', pnModFunc('iw_agendas', 'user', 'menu',
											 array('reduced' => 1)));
		// Title of the page
		if ($registre['tasca'] == 0) {
			$pnRender->assign('title', __('Delete the agenda', $dom));
		} else {
			$pnRender->assign('title', __('Delete task', $dom));
		}
		// Title for the annotation
   		if ($registre['tasca'] == 0) {
			$pnRender->assign('notetitlec1', __('Event', $dom));
		} else {
			$pnRender->assign('notetitlec1', __('Task', $dom));
		}
		// Content of the annotation
		$pnRender->assign('notecontentc1', nl2br($registre['c1']));
		$pnRender->assign('notecontentc2', nl2br($registre['c2']));
		// Date title
		if ($registre['tasca'] == 0 ) {
			$pnRender->assign('datetitle', __('Date', $dom).': ');
		} else {
			$pnRender->assign('datetitle', __('Expiry date ', $dom).': ');
		}
		// Date
		$pnRender->assign('date', date('d/m/Y',$registre['data']));
		$pnRender->assign('repes', $repes);
		$pnRender->assign('registre', $registre);
		$pnRender->assign('dia', $dia);
		$pnRender->assign('mes', $mes);
		$pnRender->assign('any', $any);
		$pnRender->assign('daid', $daid);
		return $pnRender->fetch('iw_agendas_user_delete.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_agendas', 'user', 'main',
													   array('mes' => $mes,
															 'any' => $any,
															 'dia' => $dia,
															 'daid' => $daid)));
	}
	if ($registre['daid'] == $daid) {
		if ($daid == 0) {
			// check that user is really deleting his/her note
			if ($registre['usuari'] != pnUserGetVar('uid')) {
				LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
				return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
											array('mes' => $mes,
												  'any' => $any,
												  'dia' => $dia,
												  'daid' => $daid)));
			}
			//Only in personal agendas the notes are deleted from database
			if (pnModAPIFunc('iw_agendas', 'user', 'delete',
							  array('aid' => $aid))) {
				pnModAPIFunc('iw_agendas', 'user', 'change',
							  array('aid' => $aid,
									'type' => 2));
				//Success
				LogUtil::registerStatus (__('The agenda has been deleted', $dom));
			}
			if ($repes != 0) {
				//Cridem la funciï¿œ API que farï¿œ l'esborrament dels registres repetits
				if (pnModAPIFunc('iw_agendas', 'user', 'deleterepes',
								  array('rid' => $rid,
										'aid' => $aid))) {
					//Success
					LogUtil::registerStatus (__('Repeated events deleted', $dom));
				}
			}
			//comprova si tï¿œ fitxer adjunt i si encara ï¿œs requerit per alguna anotaciï¿œ
			if ($registre['fitxer'] != '') {
				$n_fitxers = pnModAPIFunc('iw_agendas', 'user', 'n_fitxers',
										   array('fitxer' => $registre['fitxer']));
				if ($n_fitxers == 0 && file_exists(pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_agendas', 'urladjunts').'/'.$registre['fitxer'])) {
					$folder = pnModGetVar('iw_agendas', 'urladjunts');
					$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
					$delete = pnModFunc('iw_main', 'user', 'deleteFile',
										 array('sv' => $sv,
											   'folder' => $folder,
											   'fileName' => $registre['fitxer']));
				}
			}
		} else {
			//in this case the note is deleted wend it expires
			//with the value deleted = 1 users can see the label deleted in personal agendas but the note is not
			//visible in shared agenda
			$items = array('deleted' => 1,
						'protegida' => 0);
			$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
								 array('aid' => $aid,
									   'daid' => $daid,
									   'items' => $items));
			if ($lid != false) {
				//Success
				LogUtil::registerStatus (__('The agenda has been deleted', $dom));
			}
			if ($repes != 0) {
				//Cridem la funciï¿œ API que farï¿œ l'esborrament dels registres repetits per aquest usuari
				if (pnModAPIFunc('iw_agendas', 'user', 'editNote',
								  array('aid' => $aid,
										'daid' => $daid,
										'items' => $items,
										'rid' => $rid))) {
					//Success
					LogUtil::registerStatus (__('Repeated events deleted', $dom));
				}
			}
		}
  	} else {
		$uid = pnUserGetVar('uid');
		$deletedByUser = ($anotacio['deletedByUser'] == '')? '$' : $anotacio['deletedByUser'];
		$deletedByUser .= '$'.$uid.'$';
		$items = array('deletedByUser' => $deletedByUser);
		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
							 array('aid' => $aid,
								   'daid' => $daid,
								   'items' => $items));
		if ($lid != false) {
			//Success
			LogUtil::registerStatus (__('The agenda has been deleted', $dom));
		}
		if ($repes != 0) {
			//Cridem la funciï¿œ API que farï¿œ l'esborrament dels registres repetits per aquest usuari
			if (pnModAPIFunc('iw_agendas', 'user', 'deleteRepesInUser',
							  array('rid' => $rid))) {
				//Success
				LogUtil::registerStatus (__('Repeated events deleted', $dom));
			}
		}
	}
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mes,
									  'any' => $any,
									  'dia' => $dia,
									  'daid' => $daid)));
}

/**
 * Delete a note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the anotation
 * @return	True if success and false otherwise
 */
function iw_agendas_user_deleteNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
	if (!SecurityUtil::checkPermission('iw_agendas::', '::', ACCESS_READ)) {
		return DataUtil::formatForDisplayHTML(__('Sorry! No authorization to access this module.', $dom));
	}
	$uid = pnUserGetVar('uid');
	// Get the note
	$note = pnModAPIFunc('iw_agendas', 'user', 'get',
						  array('aid' => $aid));
	if ($note == false) {
		return __('Event not found', $dom);
	}
	// Check if user can access the note
	if ($daid != 0) {
		// Shared agenda
		// Get agenda information
		$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								array('daid' => $daid));

		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $daid,
									 'grup' => $agenda['grup'],
									 'resp' => $agenda['resp'],
									 'activa' => $agenda['activa']));
		// If the user has no access, show an error message and stop execution
		if ($te_acces < 3 || ($te_access == 3 && $note['usuari'] != $uid)) {
			return __('You are not allowed to administrate the agendas', $dom);
		}
	} else {
		if ($note['daid'] > 0) {
			// Get agenda information
			$agenda = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
									array('daid' => $note['daid']));
		}
	}
	$deleted = '';
	if ($note['daid'] == $daid) {
		if ($daid == 0) {
			// Check if user is trying to delete an ouw note
			if ($note['usuari'] != pnUserGetVar('uid')) {
				return __('You are not allowed to administrate the agendas', $dom);
			}
			// Only in personal agendas the notes are deleted from database
			if (pnModAPIFunc('iw_agendas', 'user', 'delete',
							  array('aid' => $aid))) {
				// Success
				$deleted = $aid;
			}
			// Check if it has got attached file and if it is needed in other notes
			if ($note['fitxer'] != '') {
				$n_fitxers = pnModAPIFunc('iw_agendas', 'user', 'n_fitxers',
										   array('fitxer' => $note['fitxer']));
				if ($n_fitxers == 0 && file_exists(pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_agendas', 'urladjunts') . '/' . $note['fitxer'])) {
					$folder = pnModGetVar('iw_agendas', 'urladjunts');
					$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
					$delete = pnModFunc('iw_main', 'user', 'deleteFile',
										 array('sv' => $sv,
											   'folder' => $folder,
											   'fileName' => $note['fitxer']));
				}
			}
		} else {
			// in this case the note is deleted wend it expires
			// with the value deleted = 1 users can see the label deleted in personal agendas but the note is not
			// visible in shared agenda
			if (strpos($agenda['gAccessLevel'],'$owne|'.$uid.'$') !== false || $agenda['gAccessLevel'] == '') {
				$deletedByUser = ($note['deletedByUser'] == '') ? '$' : $note['deletedByUser'];
				$deletedByUser .= (strpos($agenda['gAccessLevel'], '$owne|' . $uid . '$') !== false) ? '$' . $uid . '$' : $deletedByUser;
				$items = array('deleted' => 1,
								'deletedByUser' => $deletedByUser,
								'protegida' => 0);
				$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
									 array('aid' => $aid,
										   'daid' => $daid,
										   'items' => $items));
				if ($lid != false) {
					// Success
					$deleted = $aid;
				}
			} else {
				return __('You are not allowed to administrate the agendas', $dom);
			}
		}
  	} else {
		$deletedShared = ($note['gCalendarEventId'] != '' && strpos($agenda['gAccessLevel'], '$owne|' . $uid . '$') !== false) ? 1 : 0;
		$deletedByUser = ($note['deletedByUser'] == '')? '$' : $note['deletedByUser'];
		$deletedByUser .= '$' . $uid . '$';
		$items = array('deletedByUser' => $deletedByUser,
						'deleted' => $deletedShared,
						'protegida' => 0);
		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
							 array('aid' => $aid,
								   'daid' => $daid,
								   'items' => $items));
		if ($lid != false) {
			//Success
			$deleted = $aid;
		}
	}
	//delete the gCalendar notes
	$usability = pnModFunc('iw_agendas', 'user', 'getGdataFunctionsUsability');
	if ($usability === true && $note['gCalendarEventId'] != '' && strpos($agenda['gAccessLevel'],'$owne|'.$uid.'$') !== false) {
		$userSettings = pnModFunc('iw_agendas','user','getUserGCalendarSettings');
		// Load required classes
		require_once 'Zend/Loader.php';
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_AuthSub');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Gdata_HttpClient');
		Zend_Loader::loadClass('Zend_Gdata_Calendar');
		// @var string Location of AuthSub key file.  include_path is used to find this
		$_authSubKeyFile = null; // Example value for secure use: 'mykey.pem'
		// @var string Passphrase for AuthSub key file.
		$_authSubKeyFilePassphrase = null;
		$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;
		if (!isset($_SESSION['sessionToken']) && !isset($_GET['token'])) {
			try{
				$client = Zend_Gdata_ClientLogin::getHttpClient($userSettings['gUserName'], base64_decode($userSettings['gUserPass']), $service);
			} catch(exception $e) {
				$authSubUrl = pnModFunc('iw_agendas', 'user', 'getAuthSubUrl');
				return pnRedirect(pnModURL('iw_webbox', 'user', 'main',
											array('url' => str_replace('&', '*', str_replace('?', '**', $authSubUrl)))));
			}
		} else {
			$client = pnModFunc('iw_agendas', 'user', 'getAuthSubHttpClient');
		}
		$gdataCal = new Zend_Gdata_Calendar($client);
		try { 
		    $event = $gdataCal->getCalendarEventEntry($note['gCalendarEventId']);
		} catch (Zend_Gdata_App_Exception $e) {
		    $error = true;
		}
		if (!$error) {
			try { 
		    	$event->delete();
			} catch (Zend_Gdata_App_Exception $e) {
			    return __('You are not allowed to administrate the agendas', $dom);
			}
		} else {
			//LogUtil::registerError(_AGENDESERRORDELETINGGCALENDARNOTE);
		}
	}
	return $aid;
}

/**
 * Builds and shows the schoolar calendar
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the current date
 * @return	The schoolar calendar
 */
function iw_agendas_user_cescolar($args)
{
    $dom = ZLanguage::getModuleDomain('iw_agendas');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas', false);
	// Check whether the administrator has deactivated the schoolar calendar
	if (pnModGetVar('iw_agendas', 'calendariescolar') == 0) {
		LogUtil::registerError (__('The scholar calendar is not actived', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	// Get an array with the names of the months
	$month_names = array(__('September', $dom),
						 __('October', $dom),
						 __('November', $dom),
						 __('December', $dom),
						 __('January', $dom),
						 __('February', $dom),
						 __('March', $dom),
						 __('April', $dom),
						 __('May', $dom),
						 __('June', $dom),
						 __('July', $dom),
						 __('August', $dom));
	// Get an array with the order of the months. If you change this, you MUST modify the previous array accordingly.
	// Anyway there futher issues to resolv.
	$month_order = array(9, 10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 8);
	// Get an array with the names of the week abbreviated
	$day_names_abbr = array(__('Mo', $dom),
							__('Tu', $dom),
							__('We', $dom),
							__('Th', $dom),
							__('Fr', $dom),
							__('Sa', $dom),
							__('Su', $dom));
	// Get an array with the names of the week
	$day_names = array(__('Monday', $dom),
					   __('Tuesday', $dom),
					   __('Wednesday', $dom),
					   __('Thursday', $dom),
					   __('Friday', $dom),
					   __('Saturday', $dom),
					   __('Sunday', $dom));
	// Get the color configuration
	$colors = explode('|',pnModGetVar('iw_agendas', 'colors'));
	// Get the menu and pass it to the template
	$pnRender->assign('menu', pnModFunc('iw_agendas', 'user', 'menu',
										 array('mes' => $mes,
											   'any' => $any,
											   'dia' => $dia,
											   'daid' => $daid)));
	// Get the years of the schoolar year (Example: 2008-2009)
	$year = pnModGetVar('iw_agendas', 'inicicurs');
	if ($year == '') {
		$year = (date('m') > 7) ? date('Y') : date('Y') - 1;
	}
	$next_year = $year + 1;
	// Title for the calendar
	$pnRender->assign('title', __('School calendar of course ', $dom).' '.$year.'-'.$next_year);
	// Build an array with the data of every day of the year, the day of the week of the first day of the month and the number of days of the week
	for ($t = 0; $t < 12; $t++) {
		// One iteration per month
		// Get the month
		$month = $month_order[$t];
		// On January (month 1), increase the year
		if ($month == 1) {$year = $next_year;}
		// Calculate the number of days of the month (28 to 31)
		$days_month = date("t", mktime(0, 0, 0, $month, 1, $year));
		// Numeric representation of the first day of the month in the week: 0 (for Sunday) through 6 (for Saturday)
		$first_day = date("w", mktime(0, 0, 0, $month, 1, $year));
		// The Sunday must be number 7 (for us, Sunday is the last day of the week, not the first)
		if ($first_day == 0) {$first_day = 7;}
		// Offset correction for smarty loop
		$first_day -= 1;
		// Get the info of the days (one iteration per day)
		for($i = 1; $i <= $days_month; $i++) {
			// Check whether this day belongs to any defined period, so it will be shown in a predetermined color
			$periode = pnModFunc('iw_agendas', 'user', 'periode',
								  array('dia' => $i,
										'mes' => $month,
										'any' => $year));
			// Include the periode color in the array (all the days look the same)
			$days[$month][$i]['bgcolor'] = ($periode['dins']) ? $periode['color'] : $colors[9];
			$days[$month][$i]['label'] = ($periode['dins']) ? $periode['etiqueta'] : '';
			// Check whether it's a non-working day
			$festiu = pnModFunc('iw_agendas', 'user', 'festiu',
								 array('dia' => $i,
									   'mes' => $month,
									   'any' => $year));
			// Change the color and the label if necessary
			if ($festiu['festiu']) { 
				$days[$month][$i]['bgcolor'] = $colors[8];
				$days[$month][$i]['label'] = $festiu['etiqueta']; 
			}
			// Check whether it's weekend
			$day_of_the_week = date("w", mktime(0, 0, 0, $month, $i, $year));
			if ($day_of_the_week == 0) $day_of_the_week = 7;
			// Change the color if necessary
			if ($day_of_the_week == 6 || $day_of_the_week == 7) {
				$days[$month][$i]['bgcolor'] = $colors[8];
			}
			// Check whether the day is today
			if (date('d') == $i &&
				date('m') == $month &&
				date('Y') == $year) {
				$days[$month][$i]['bgcolor'] = $colors[10];
			}
			// Check whether there's any info associated to this day
			$information = pnModFunc('iw_agendas', 'user', 'info',
									  array('dia' => $i,
											'mes' => $month,
											'any' => $year));
			if ($information != '') {
				$days[$month][$i]['info'] = $information;
			}
			// Build the date to be shown in the caption of the popup window
			$days[$month][$i]['caption'] = $day_names[$day_of_the_week - 1]."&nbsp;&nbsp;&nbsp;$i/$month/$year";
		}
		// Build the data array for the template. This operation must be done here.
		$days[$month]['days_month'] = $days_month;
		$days[$month]['first_day'] = $first_day;
		$days[$month]['year'] = $year;
		$days[$month]['day_name_abbr_color'] = $colors[3];
		$days[$month]['day_name_abbr_bgcolor'] = $colors[2];
	}
	// Pass the calendar data to the template
	$pnRender->assign('days', $days);
	$pnRender->assign('month_names', $month_names);
	$pnRender->assign('day_names_abbr', $day_names_abbr);
	$pnRender->assign('month_names_color', $colors[1]);
	$pnRender->assign('month_names_bgcolor', $colors[0]);
	// Get the legends of the periods of the schoolar calendar
	if (pnModGetVar('iw_agendas', 'llegenda') == 1) {
		$periodes = explode('$$', substr(pnModGetVar('iw_agendas', 'periodes'), 0, strlen(pnModGetVar('iw_agendas', 'periodes')) - 1));
		array_shift($periodes);
		if (count($periodes) > 0)	{
			foreach ($periodes as $periode) {
				$legends[] = array('color' => substr($periode, -7),
							 	   'desc'  => substr($periode, 17, -7));
			}
		}
	}
	$pnRender->assign('legends', $legends);
	// Show the legends of the informative icons
	if (pnModGetVar('iw_agendas', 'infos') == 1) {
		// Check if there are any
		// Remove the trailing $ and get the data in an array
		$informations = explode('$$', substr(pnModGetVar('iw_agendas', 'informacions'), 0, strlen(pnModGetVar('iw_agendas', 'informacions')) - 1));
		// First element is empty
		array_shift($informations);
		// Build an array with the informations
		foreach ($informations as $information) {
			$infos[] = array ('day' => substr($information, 0, 2),
							  'month' => substr($information, 2, 2),
							  'year' => substr($information, 4, 4),
							  'info' => substr($information, 9));
		}
	}
	$pnRender->assign('infos', $infos);
	// Get the additional comments
	$pnRender->assign('comments', nl2br(pnModGetVar('iw_agendas', 'comentaris')));
	// Get the "about this module" info
	$about = array('desc' => __('About this module', $dom),
				   'url' => pnModURL('iw_agendas', 'user', 'module'));
	$pnRender->assign('about', $about);
	return $pnRender->fetch('iw_agendas_user_cescolar.htm');
}

/**
 * Edit an agenda event
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the current event
 * @return	return user to the agenda
 */
function iw_agendas_user_editar($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'GET');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'GET');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'GET');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'GET');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'GET');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas',false);
	// Default value
	if (!isset($aid) || !is_numeric($aid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	// Get the info of the annotation
	$anotacio = pnModAPIFunc('iw_agendas', 'user', 'get',
							  array('aid' => $aid));
	if ($anotacio == false) {
		LogUtil::registerError (__('Event not found', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	//Check if the user connected has made the note
	$a = ($anotacio['usuari'] == pnUserGetVar('uid')) ? true : false;
	// Get the agenda ID
	$daid = $anotacio['daid'];
	// Get menÃº
	$menu = pnModFunc('iw_agendas', 'user', 'menu',
					   array('mes' => $mes,
							 'any' => $any,
							 'dia' => $dia,
							 'daid' => $daid));
	$pnRender->assign('menu', $menu);
	// Personal agenda or non-registered agenda
	if ($daid == 0) {
		if ($anotacio['tasca'] == 0) {
			$nomcamp['c1'] = __('Event', $dom);
			$nomcamp['tc1'] = 2;
		} else {
			$nomcamp['c1'] = __('Task', $dom);
			$nomcamp['tc1'] = 2;
		}
		$nomcamp['c2'] = __('More information', $dom);
		$nomcamp['tc2'] = 2;
		// Check if the user can modify the note
		if (!$a) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
		}
		$pnRender->assign('attachpermitted', pnModSetVar('iw_agendas', 'adjuntspersonals'));
	} else { // Shared agenda
		// Get the definition of the agenda
		$nomcamp = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								 array('daid' => $daid));
		//Check the access of the user in the agenda
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $daid,
									 'grup' => $nomcamp['grup'],
									 'resp' => $nomcamp['resp'],
									 'activa' => $nomcamp['activa']));
		if (!($te_acces == 4 || ($te_acces == 3 && $a))) {
			LogUtil::registerError (__('You are not allowed to do that', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
		}
		$pnRender->assign('attachpermitted', $nomcamp['adjunts']);
	}
	// Create a month days array
	for ($i = 1; $i < 32; $i++) {
		$dies_MS[] = array('id' => $i,
							'name' => $i);
	}
	// Create an array with the month's names
	$mesos_MS = array(array('id' => 1,
							'name'=>__('January', $dom)),
					  array('id' => 2,
							'name' => __('February', $dom)),
					  array('id' => 3,
							'name' => __('March', $dom)),
					  array('id' => 4,
							'name' => __('April', $dom)),
					  array('id' => 5,
							'name' => __('May', $dom)),
					  array('id' => 6,
							'name' => __('June', $dom)),
					  array('id' => 7,
							'name' => __('July', $dom)),
					  array('id' => 8,
							'name' => __('August', $dom)),
					  array('id' => 9,
							'name' => __('September', $dom)),
					  array('id' => 10,
							'name' => __('October', $dom)),
					  array('id' => 11,
							'name' => __('November', $dom)),
					  array('id' => 12,
							'name' => __('December', $dom)));
	//Creem un array preparat per un MultiSelect amb els nivells de prioritat d'una tasca
	$nivells_MS = array(array('id' => 0,
							  'name' => '0'),
						array('id' => 1,
							  'name' => '1'),
						array('id' => 2,
							  'name' => '2'),
						array('id' => 3,
							  'name' => '3'),
						array('id' => 4,
							  'name' => '4'),
						array('id' => 5,
							  'name' => '5'));
	//Omplim un multiselect amb els anys disponibles
	for($i = date('Y', $anotacio['data']); $i < date('Y', $anotacio['data']) + 50; $i++) {
		$anys_MS[] = array('id' => $i,
						   'name' => $i);
	}
	//Omplim un multiselect amb les hores del dia
	for ($i = 0; $i < 24; $i++) {
		$h = $i;
		if ($i == 0) {$h = '00';}
		if (strlen($i) == 1) {$h = '0' . $i;}
		$hores_MS[] = array('id' => $h,
							'name' => $h);
	}
	//Omplim un multiselect amb els minuts
	for ($i = 0; $i < 12; $i++) {
		$m = $i * 5;
		if ($i == 0) {$m = '00';}
		if (strlen($m) == 1) {$m = '0' . $m;}
		$minuts_MS[] = array('id' => $m,
							 'name' => $m);
	}
	// Pass the data to the template
	$pnRender->assign('dies_MS', $dies_MS);
	$pnRender->assign('mesos_MS', $mesos_MS);
	$pnRender->assign('anys_MS', $anys_MS);
	$pnRender->assign('nivells_MS', $nivells_MS);
	$pnRender->assign('hores_MS', $hores_MS);
	$pnRender->assign('minuts_MS', $minuts_MS);
	$pnRender->assign('aid', $aid);
	$pnRender->assign('daid', $daid);
	$pnRender->assign('oculta', $oculta);
	// The form is shared for annotations and tasks. This particularizes depending on the $tasca param
	if ($anotacio['tasca'] == 0) {	// Not a task
		$acciosubmit = __('Create event', $dom);
		$msg_no_nota = __("You haven't written the event", $dom);
		$title = __('Edit event', $dom);
		$date = __('Date', $dom);
	} else { // It's a task
		$acciosubmit = __('Create task', $dom);
		$msg_no_nota = __("You haven't written the task", $dom);
		$title = __('Edit task', $dom);
		$date = __('Expiry date ', $dom);
		// Create priority array
		$nivells_MS = array(array('id' => 0,
								  'name' => '0'),
							array('id' => 1,
								  'name' => '1'),
							array('id' => 2,
								  'name' => '2'),
							array('id' => 3,
								  'name' => '3'),
							array('id' => 4,
								  'name' => '4'),
							array('id' => 5,
								  'name' => '5'));
	}
	$pnRender->assign('date', $date);	
	$pnRender->assign('title', $title);
	$pnRender->assign('extensions', pnModGetVar('iw_main','extensions'));
	$pnRender->assign('maxattachsize', pnModGetVar('iw_main','maxsize'));
	$pnRender->assign('selectedday', date("d", $anotacio['data']));
	$pnRender->assign('selectedmonth', date("m", $anotacio['data']));
	$pnRender->assign('selectedyear', date("Y", $anotacio['data']));
	$pnRender->assign('selectedhour', date("H", $anotacio['data']));
	$pnRender->assign('selectedminute', date("i", $anotacio['data']));
	$pnRender->assign('file', $anotacio['fitxer']);
	$pnRender->assign('task', $anotacio['tasca']);
	$pnRender->assign('protegida', $anotacio['protegida']);
	$pnRender->assign('nivell', $anotacio['nivell']);
	$pnRender->assign('totdia', $anotacio['totdia']);
	// get user info
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userfullname = pnModFunc('iw_main', 'user', 'getUserInfo',
							   array('sv' => $sv,
									 'uid' => pnUserGetVar('uid'),
									 'info' => 'nc'));
	for($i = 1; $i < 6; $i++) {
		if (!empty($nomcamp['c'.$i])) {
			$opts_array = array();
			if (isset($nomcamp['op'.$i])) { 
				$opts = explode('-', $nomcamp['op'.$i]);
				foreach ($opts as $opt) $opts_array[] = array('id' => $opt,
															  'value' => $opt);
			}
			if ($nomcamp['tc'.$i] == 3) {
				$value = $userfullname; 
			}else if ($nomcamp['tc'.$i] == 4) {
				$value = $userfullname . __(' on ', $dom) . date("d/m/Y", $anotacio['dataanota']) . __(' at ', $dom) . date("H:i", $anotacio['dataanota']); 
			} else {
				$value = $anotacio['c' . $i];
			}
			$fields[] = array ('desc' => $nomcamp['c' . $i],
							   'value' => $value,
							   'type'	=> $nomcamp['tc' . $i],
							   'opts'	=> $opts_array);
		}
	}
	$pnRender->assign('fields', $fields);
	// Check if the agenda have repeats
	$repes = pnModAPIFunc('iw_agendas', 'user', 'comptarepes',
						   array('aid' => $aid,
								 'rid' => $anotacio['rid']));
	if ($repes > 0) {
		$quines_MS = array(array('id' => 1,
								 'name' => __('Only this event', $dom)),
						   array('id' => 2,
								 'name' => __('This event and its repetitions', $dom)));
		$pnRender->assign('quines_MS', $quines_MS);
	}
	if ($anotacio['tasca'] == 0) {
		$pnRender->assign('acciosubmit', __('Modify event', $dom));
	} else {
		$pnRender->assign('acciosubmit', __('Modify task', $dom));
	}
	return $pnRender->fetch('iw_agendas_user_edit.htm');
}

/**
 * get the values of the information icon
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	Information about needed day
 * @return	return the icon information values
 */
function iw_agendas_user_info($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if (strlen($dia) == 1) {$dia = '0' . $dia;}
	if (strlen($mes) == 1) {$mes = '0' . $mes;}
	$informacions = pnModGetVar('iw_agendas','informacions');
	$informacio = '';
	// Check if the dia have notes
	$pos = strpos($informacions, '$' . $dia . $mes . $any . '|');
	if ($pos != 0) {
		$retorn = true;
		$informacio = strstr($informacions, '$' . $dia . $mes . $any . '|');
		$pos1 = strpos($informacio, '$$');
		$informacio = ($pos1 != 0) ? substr($informacio, 10, $pos1 - 10) : substr($informacio, 10, -1);
	}
	return $informacio;
}

/**
 * update values
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the note
 * @return	return true if success and false otherwise
 */
function iw_agendas_user_modifica($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
	$diatriat = FormUtil::getPassedValue('diatriat', isset($args['diatriat']) ? $args['diatriat'] : null, 'POST');
	$mestriat = FormUtil::getPassedValue('mestriat', isset($args['mestriat']) ? $args['mestriat'] : null, 'POST');
	$anytriat = FormUtil::getPassedValue('anytriat', isset($args['anytriat']) ? $args['anytriat'] : null, 'POST');
	$horatriada = FormUtil::getPassedValue('horatriada', isset($args['horatriada']) ? $args['horatriada'] : null, 'POST');
	$minuttriat = FormUtil::getPassedValue('minuttriat', isset($args['minuttriat']) ? $args['minuttriat'] : null, 'POST');
	$c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
	$c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
	$c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
	$c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
	$c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
	$c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
	$totdia = FormUtil::getPassedValue('totdia', isset($args['totdia']) ? $args['totdia'] : null, 'POST');
	$nivell = FormUtil::getPassedValue('nivell', isset($args['nivell']) ? $args['nivell'] : null, 'POST');
	$tasca = FormUtil::getPassedValue('tasca', isset($args['tasca']) ? $args['tasca'] : null, 'POST');
	$quines = FormUtil::getPassedValue('quines', isset($args['quines']) ? $args['quines'] : null, 'POST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
	$oculta = FormUtil::getPassedValue('oculta', isset($args['oculta']) ? $args['oculta'] : null, 'POST');
	$protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
	$copia = FormUtil::getPassedValue('copia', isset($args['copia']) ? $args['copia'] : null, 'POST');
    $fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
    $sure = FormUtil::getPassedValue('sure', isset($args['sure']) ? $args['sure'] : null, 'POST');
    $new_file = FormUtil::getPassedValue('new_file', isset($args['new_file']) ? $args['new_file'] : null, 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_agendas', 'user', 'main'));
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas',false);
	//check the date
	if (!checkdate($mestriat, $diatriat, $anytriat)) {
		LogUtil::registerError (__('Incorrect date', $dom).': '.$diatriat.'/'.$mestriat.'/'.$anytriat);
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
									array('mes' => $mes,
										  'any' => $any,
										  'dia' => $dia,
										  'daid' => $daid)));
	}
	//Agafem les dades que ens falten de l'anotaciï¿œ
	$registre = pnModAPIFunc('iw_agendas', 'user', 'get',
							  array('aid' => $aid));
	if ($registre == false) {
		LogUtil::registerError (__('Event not found', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	//Check if user can access the agenda
	if ($daid != 0) {
		// Shared agenda or gCalendar agenda
		// Get agenda information
		$nomcamp = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								 array('daid' => $daid));
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $daid,
									 'grup' => $nomcamp['grup'],
									 'resp' => $nomcamp['resp'],
									 'activa' => $nomcamp['activa']));

		// If the user has no access, show an error message and stop execution
		if ($te_acces < 3 || ($te_access == 3 && $registre['usuari'] != pnUserGetVar('uid'))) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('mes' => $mestriat,
											  'any' => $anytriat,
											  'dia' => $dia,
											  'daid' => $daid)));
		}
	} else {
		// Check if user can delete the note
		if ($registre['usuari'] != pnUserGetVar('uid')) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('mes' => $mestriat,
											  'any' => $anytriat,
											  'dia' => $dia,
											  'daid' => $daid)));
		}
	}
	// Verify values. Only the main information is required
	if (empty($c1)) {
		LogUtil::registerError (__("You haven't written the event", $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	if ($sure == 1) {
		$folder = pnModGetVar('iw_agendas','urladjunts');
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$delete = pnModFunc('iw_main', 'user', 'deleteFile',
							 array('sv' => $sv,
								   'folder' => $folder,
								   'fileName' => $registre['fitxer']));
		if ($delete) {$fitxer = '';}
	}
	if ($_FILES['fitxer']['name'] != "" && $new_file == 1) {
		$folder = pnModGetVar('iw_agendas','urladjunts');
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$update = pnModFunc('iw_main', 'user', 'updateFile',
							 array('sv' => $sv,
								   'folder' => $folder,
								   'file' => $_FILES['fitxer']));
		// The function returns the error string if the update fails and and empty string if success
		if ($update['msg'] != '') {
			$fitxer = '';
			$pnRender->assign('error', __('File size incorrect. Maximum size is ', $dom).pnModGetVar('iw_main','maxsize').' '.__('bits.', $dom));
			$pnRender->assign('url', array ('url' => pnVarPrepForDisplay(pnModURL('iw_agendas', 'user', 'editar',
																				   array('horatriada' => $horatriada,
																					     'minuttriat' => $minuttriat,
																						 'mes' => $mestriat,
																						 'dia' => $diatriat,
																						 'any' => $anytriat,
																						 'c1' => $c1,
																						 'c2' => $c2,
																						 'c3' => $c3,
																						 'c4' => $c4,
																						 'c5' => $c5,
																						 'c6' => $c6,
																						 'totdia' => $totdia,
																						 'repes' => $repes,
																						 'repesdies' => $repesdies,
																						 'diarep' => $diatriatrep,
																						 'mesrep' => $mestriatrep,
																						 'anyrep' => $anytriatrep,
																						 'daid' => $daid,
																						 'aid' => $aid,
																						 'oculta' => $oculta,
																						 'protegida' => $protegida))),
											  'desc' => __('Back to previous form', $dom)));
			return $pnRender->fetch('iw_agendas_user_error.htm');
		} else {
			$fitxer = $update['fileName'];
		}
	}
	if ($totdia) {
		$horatriada = 23;
		$minuttriat = 59;
	}
	$data = mktime($horatriada,$minuttriat,0,$mestriat,$diatriat,$anytriat);
	//Comprovem si es tracta de la cï¿œpia d'una nota. En aquest cas enviem la nota a la funciï¿œ meva amb la variable adaid a l'agenda actual
	if ($copia == 1) {
		$subscrits = pnModAPIFunc('iw_agendas', 'user', 'getsubscrits',
								   array('daid' => $daid));
		$subscritString = '$';
		foreach ($subscrits as $subscrit) {
			$subscritString .= '$' . $subscrit['uid'] . '$';
		}
		//Es crida la funciï¿œ API amb les dades extretes del formulari
		$lid = pnModAPIFunc('iw_agendas', 'user', 'crear',
							 array('dia' => date('d', $data),
								   'mes' => date('m',$data),
								   'any' => date('Y',$data),
								   'c1' => $c1,
								   'c2' => $c2,
								   'c3' => $c3,
								   'c4' => $c4,
								   'c5' => $c5,
								   'c6' => $c6,
								   'minut' => $minuttriat,
								   'hora' => $horatriada,
								   'totdia' => $totdia,
								   'tasca' => $tasca,
								   'nivell' => $nivell,
								   'rid' => $rid,
								   'daid' => $daid,
								   'nova' => $subscritString,
								   'oculta' => $oculta,
								   'fitxer' => $nom_fitxer,
								   'protegida' => $protegida));
		if ($lid != false) {
			//Success
			LogUtil::registerStatus (__('New event created', $dom));
		}
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
									array('mes' => $mestriat,
										  'any' => $anytriat,
										  'dia' => $dia,
										  'daid' => $daid)));
	}
	//A modify means to show the modify label in users personal agendas
	if (!isset($quines) || $quines <= 1) {
		$items = array('c1' => $c1,
					   'c2' => $c2,
					   'c3' => $c3,
					   'c4' => $c4,
					   'c5' => $c5,
					   'c6' => $c6,
					   'data' => $data,
					   'nivell' => $nivell,
					   'totdia' => $totdia,
					   'dataanota' => time(),
					   'rid' => '-1',
					   'vcalendar' => 0,
					   'protegida' => $protegida,
					   'fitxer' => $fitxer,
					   'modified' => 1);
		//modify of a simple entry
   		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
   							 array('aid' => $aid,
								   'items' => $items,
								   'daid' => $daid));
	} else {
		//modify of a multiple entry
		$lid = pnModAPIFunc('iw_agendas', 'user', 'modificamulti',
							 array('aid' => $aid,
								   'dia' => $diatriat,
								   'mes' => $mestriat,
								   'any' => $anytriat,
								   'c1' => $c1,
								   'c2' => $c2,
								   'c3' => $c3,
								   'c4' => $c4,
								   'c5' => $c5,
								   'c6' => $c6,
								   'minut' => $minuttriat,
								   'hora' => $horatriada,
								   'totdia' => $totdia,
								   'daid' => $daid,
								   'fitxer' => $fitxer,
								   'protegida' => $protegida));
	}
	if ($lid != false) {
		//Success
		LogUtil::registerStatus (__('Event updated', $dom));
	}
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mestriat,
									  'any' => $anytriat,
									  'dia' => $dia,
									  'daid' => $daid)));
}

/**
 * set a note as protected by auto deletion or set off the protection
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	Information about the note to change
 * @return	return true if success and false otherwise
 */
function iw_agendas_user_protegida($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'GET');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'GET');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'GET');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'GET');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'GET');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Get note information
	$anotacio = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $aid));
	if ($anotacio == false) {
		LogUtil::registerError (__('Event not found', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	//Check if user can access the agenda
	if ($daid != 0) {
		//Estem entrant a una agenda multiusuari
		//Carreguem les dades de l'agenda
		$nomcamp = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								 array('daid' => $anotacio['daid']));
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $nomcamp['daid'],
									 'grup' => $nomcamp['grup'],
									 'resp' => $nomcamp['resp'],
									 'activa' => $nomcamp['activa']));
		// If the user has no access, show an error message and stop execution
		if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != pnUserGetVar('uid'))) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('mes' => $mes,
											  'any' => $any,
											  'dia' => $dia,
											  'daid' => $daid)));
		}
	} else {
		//Check if it is a authorized user
		if ($anotacio['usuari'] != pnUserGetVar('uid')) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('mes' => $mes,
											  'any' => $any,
											  'dia' => $dia,
											  	  'daid' => $daid)));
		}
	}
	$protegida = ($anotacio['protegida'] == 1) ? 0 : 1;
	$items = array('protegida' =>$protegida);
	$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
						 array('aid' => $aid,
							   'daid' => $daid,
							   'items' => $items));
	if ($lid != false) {
		//Success
		LogUtil::registerStatus (__('Protection status updated', $dom));
	}
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mes,
									  'any' => $any,
									  'dia' => $dia,
									  'daid' => $daid)));
}
/**
 * send a copy to the user personal agenda
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the note to copy
 * @return	return true if success and false otherwise
 */
function iw_agendas_user_meva($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');
	$adaid = FormUtil::getPassedValue('adaid', isset($args['adaid']) ? $args['adaid'] : null, 'REQUEST');
	$nova = FormUtil::getPassedValue('nova', isset($args['nova']) ? $args['nova'] : null, 'REQUEST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($aid) || !is_numeric($aid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$registre = pnModAPIFunc('iw_agendas', 'user', 'get', array('aid' => $aid));
	if ($registre == false) {
		LogUtil::registerError (__('Event not found', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
									array('mes' => $mes,
										  'any' => $any,
										  'dia' => $dia,
										  'daid' => $daid)));
	}
	//Estem entrant a una agenda multiusuari
	//Carreguem les dades de l'agenda
	$nomcamp = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
							 array('daid' => $registre['daid']));
	//Check if user can access the agenda
	if ($daid != 0) {
		// Check whether the user can access the agenda for this action
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $nomcamp['daid'],
									 'grup' => $nomcamp['grup'],
									 'resp' => $nomcamp['resp'],
									 'activa' => $nomcamp['activa']));
		// If the user has no access, show an error message and stop execution
		if ($te_acces == 0) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('mes' => $mes,
											  'any' => $any,
											  'dia' => $dia,
											  'daid' => $daid)));
		}
	} else {
		if ($registre['usuari'] != pnUserGetVar('uid')) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main', 
										array('mes' => $mes,
											  'any' => $any,
											  'dia' => $dia,
											  'daid' => $daid)));
		}
	}
	$data = $registre['data'];
	$totdia = $registre['totdia'];
	//get all the agendas where the user can acces
	$registresagendes = pnModFunc('iw_agendas', 'user', 'getUserAgendas');
	//Creem un array preparat per un MultiSelect amb les agendes a les quals tï¿œ accï¿œs l'usuari i, a mï¿œs, n'ï¿œs responsable
	$agendas = array(array('id' => 0,
						   'name' => __('Personal', $dom),
						   'desc' => __('Personal', $dom)));
	foreach ($registresagendes as $registreagenda) {
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $registreagenda['daid'],
									 'grup' => $registreagenda['grup'],
									 'resp' => $registreagenda['resp'],
									 'activa' => $registreagenda['activa']));
		if ($te_acces > 1 && $registreagenda['daid'] != $daid && $registreagenda['daid'] != 0) {
			$agendas[] = array('id' => $registreagenda['daid'],
							   'name' => $registreagenda['nom_agenda'],
							   'desc' => $registreagenda['descriu']);
		}
		if ($adaid == $registreagenda['daid']) {$nom_agenda = $registreagenda['nom_agenda'];}
	}
	if (count($agendas) >= 1 && !isset($adaid) && $nova == 0 && $daid != 0) {
		// Create output object
		$pnRender = pnRender::getInstance('iw_agendas',false);
		// Create and pass the menu
		$pnRender->assign('menu', pnModFunc('iw_agendas', 'user', 'menu',
											   array('mes' => $mes,
													 'any' => $any,
													 'dia' => $dia,
													 'daid' => $daid)));
		// Hidden params
	 	$pnRender->assign('aid', $aid);
	 	$pnRender->assign('mes', $mes);
	 	$pnRender->assign('any', $any);
	 	$pnRender->assign('dia', $dia);
	 	$pnRender->assign('daid', $daid);
		// Shown params
	 	$pnRender->assign('datevalue', date('d/m/Y', $registre['data']));
		if ($registre['totdia']) {
			$pnRender->assign('hourvalue', __('All day', $dom));
		} else {
			$pnRender->assign('hourvalue', date('H:i', $registre['data']));
		}
	 	$pnRender->assign('notevaluec1', $registre['c1']);
	 	$pnRender->assign('notevaluec2', $registre['c2']);
	 	$pnRender->assign('selectvalues', $agendas);
		return $pnRender->fetch('iw_agendas_user_selectagenda.htm');
	}
	if ($daid == 0) {
		$adaid = array(0);
	}
	$lid = pnModAPIFunc('iw_agendas', 'user', 'meva',
						 array('adaid' => $adaid,
							   'aid' => $aid));
	if ($lid != false) {
		//Success
		LogUtil::registerStatus (__('Event moved to other agendas', $dom));
	}
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mes,
									  'any' => $any,
									  'dia' => $dia,
									  'daid' => $daid)));
}

/**
 * get the period for a specific day
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	Information about the day
 * @return	return the period information
 */
function iw_agendas_user_periode($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//separem els perï¿œodes
	$dins = false;
	$dataenviada = mktime(12, 12, 0, $mes, $dia, $any);
	$periode0 = pnModGetVar('iw_agendas', 'periodes');
	$periodes = explode('$$', substr($periode0, 0, strlen($periode0) - 1));
	array_shift($periodes);
	foreach ($periodes as $periode1) {
		$inici = mktime(1, 1, 0, substr($periode1, 2, 2),substr($periode1, 0, 2),substr($periode1, 4, 4));
		$final = mktime(23, 50, 0, substr($periode1, 10, 2),substr($periode1, 8, 2),substr($periode1, 12, 4));
		if ($dataenviada > $inici && $dataenviada < $final) {
			$dins = true;
			$color = substr($periode1,-6);
			$etiqueta = substr($periode1,17,-7);
		}
	}
	$period = array('dins' => $dins,
					'color' => $color,
					'etiqueta' => $etiqueta);
	return $period;
}

/**
 * change user subscription into a aganda
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	Information about the agenda
 * @return	return true if success and false otherwise
 */
function iw_agendas_user_subs($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$agenda = FormUtil::getPassedValue('agenda', isset($args['agenda']) ? $args['agenda'] : 0, 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Comprovem que l'usuari pugui accedir a l'agenda
	if ($agenda != 0) {
		//Estem entrant a una agenda multiusuari
		//Carreguem les dades de l'agenda
		$agendaInfo = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
									array('daid' => $agenda));
		//Check if user can really access the agenda
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $agenda,
									 'grup' => $agendaInfo['grup'],
									 'resp' => $agendaInfo['resp'],
									 'activa' => $agendaInfo['activa']));
		if ($te_acces == 0) {
			return false;
		}
	}
	//get the agendas where the user is subscribed
	$subs = pnModApiFunc('iw_agendas','user','getUserSubscriptions');
	$subsArray = array();
	foreach ($subs as $sub) {
		array_push($subsArray,$sub['daid']);
	}
	$lid = (!in_array($agenda, $subsArray)) ? pnModAPIFunc('iw_agendas', 'user', 'subsalta',
															array('daid' => $agenda)) : pnModAPIFunc('iw_agendas', 'user', 'subsbaixa',
																									  array('daid' => $agenda));
	if (!$lid) {
		return false;
	}
	return true;
}

/**
 * Download a file
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	name of the file that have to be downloaded
 * @return:	The file required
*/
function iw_agendas_user_download($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	// Get the parameters
	$aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'GET');
	$fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fileName) || !isset($aid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//get record
	$registre = pnModAPIFunc('iw_agendas', 'user', 'get',
							  array('aid' => $aid));
	if ($registre == false) {
		LogUtil::registerError (__('Event not found', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main'));
	}
	if ($registre['daid'] != 0) {
		//Check if user can really access the agenda as a manager
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $registre['daid']));
		if ($te_acces < 1) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('dia' => $dia,
											  'mes' => $mes,
											  'daid'=>$daid)));
		}
	} else {
		if ($registre['usuari'] != pnUserGetVar('uid')) {
			LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('dia' => $dia,
											  'mes' => $mes,
											  'daid'=>$daid)));
		}
	}
	$fileNameInServer = pnModGetVar('iw_agendas','urladjunts').'/'.$fileName;
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	return pnModFunc('iw_main', 'user', 'downloadFile',
					  array('fileName' => $fileName,
							'fileNameInServer' => $fileNameInServer,
							'sv' => $sv));
}

/**
 * Subscribe automatically to agenda to all users who can access the agenda
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat) i Toni Ginard Lladó (aginard@xtec.cat)
 * @param	Information about the agenda
 * @return	return the form needed to subscribe users
 */
function iw_agendas_user_substots($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'REQUEST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas',false);
	// Get the menu
	$pnRender->assign('menu', pnModFunc('iw_agendas', 'user', 'menu',
										   array('mes' => $mes,
												 'any' => $any,
												 'dia' => $dia,
												 'daid'=>$daid)));
	//Check if user can really access the agenda as a manager
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
						   array('daid' => $daid));
	if ($te_acces != 4) {
		LogUtil::registerError (__('You are not allowed to administrate the agendas', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
									array('dia' => $dia,
										  'mes' => $mes,
										  'daid'=>$daid)));
	}
	// Subscribed users
	$subscrits = pnModAPIFunc('iw_agendas', 'user', 'getsubscrits',
							   array('daid' => $daid,
									 'quins' => "-1"));
	// Unsubscribed users (people who has unsubscribed theirselves)
	$donatsdebaixa = pnModAPIFunc('iw_agendas', 'user', 'getsubscrits',
								   array('daid' => $daid,
										 'quins' => "1"));
	// Users who can acces to the shared agenda
	$tenenacces = pnModAPIFunc('iw_agendas', 'user', 'gettenenacces',
								array('daid' => $daid));
	//get all users information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
							array('sv' => $sv,
								  'info' => 'ccn'));
	$subscribedusersvalue = array();
	foreach ($subscrits as $subscrit) {
		$subscribedusersvalue[] = $usersInfo[$subscrit['uid']];
	}
	//Mostrem els usuaris que s'han donat de baixa expressament de l'agenda
	$force_subscription = array();
	if (count($donatsdebaixa) > 0) {
		foreach ($donatsdebaixa as $essubscrit) {
			$force_subscription[] = array('name' => $usersInfo[$essubscrit['uid']],
										  'uid' => $essubscrit['uid']);
		}
	}
	// Get the users to subscribe
	$to_subscribe = array();
	foreach ($tenenacces as $essubscrit) {
		if (!in_array(array('name' => $usersInfo[$essubscrit['uid']], 'uid' => $essubscrit['uid']), $to_subscribe) &&
				!in_array(array('name' => $usersInfo[$essubscrit['uid']], 'uid' => $essubscrit['uid']), $force_subscription) &&
				!in_array($usersInfo[$essubscrit['uid']], $subscribedusersvalue)) {
			$to_subscribe[] = array('name' => $usersInfo[$essubscrit['uid']],
									'uid' => $essubscrit['uid']);
		}
	}
	$pnRender->assign('subscribedusersvalue', $subscribedusersvalue);
	$pnRender->assign('to_subscribe', $to_subscribe);
	$pnRender->assign('force_subscription', $force_subscription);
	$pnRender->assign('submitvalue', __('Subscribe them', $dom));
	$pnRender->assign('to_subscribe', $to_subscribe);
	// Hidden parameters
	$pnRender->assign('daid', $daid);
	$pnRender->assign('mes', $mes);
	$pnRender->assign('any', $any);
	$pnRender->assign('dia', $dia);
	return $pnRender->fetch('iw_agendas_user_subscribeall.htm');
}

/**
 * Delete the notes older than a given date
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	Date needed
 * @return	true if success and false otherwise
 */
function iw_agendas_user_esborraantigues($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	$esborraanterior = FormUtil::getPassedValue('esborraanterior', isset($args['esborraanterior']) ? $args['esborraanterior'] : null, 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_agendas', 'user', 'main',
													   array('mes' => $mes,
															 'any' => $any,
															 'daid' => $daid)));
	}
	$dia1 = substr($esborraanterior, 0, 2);
	$mes1 = substr($esborraanterior, 3, 2);
	$any1 = substr($esborraanterior, 6, 4);
	if (!checkdate($mes1, $dia1, $any1)) {
		LogUtil::registerError (__('Incorrect date', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
									array('mes' => $mes,
										  'any' => $any,
										  'daid' => $daid)));
	}
	if (mktime(0, 0, 0, $mes1, $dia1, $any1) > time()) {
		LogUtil::registerError (__('Future events cannot be deleted', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
									array('mes' => $mes,
										  'any' => $any,
										  'daid' => $daid)));
	}
	//Comprovem que l'usuari pugui accedir a l'agenda
	if ($daid != 0) {
		//Estem entrant a una agenda multiusuari
		//Carreguem les dades de l'agenda
		$nomcamp = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
								 array('daid' => $daid));
		//Comprovem que l'usuari realment tingui accï¿œs a l'agenda
		$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
							   array('daid' => $daid,
									 'grup' => $nomcamp['grup'],
									 'resp' => $nomcamp['resp'],
									 'activa' => $nomcamp['activa']));
		if ($te_acces < 4) {
			LogUtil::registerError (__('You are not allowed to do that', $dom));
			return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
										array('mes' => $mes,
											  'any' => $any,
											  'daid' => $daid)));
		}
	}
 	//esborrem les anotacions anteriors a la data enviada
	$lid = pnModAPIFunc('iw_agendas', 'user', 'esborraantigues',
						 array('daid' => $daid,
							   'antigues' => $esborraanterior));
	if ($lid != false) {
		//Success
		LogUtil::registerStatus (__('Previous events to selected date deleted', $dom));
	}
	//Retorna havent acabat el procï¿œs satisfactï¿œriament
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mes,
									  'any' => $any,
									  'daid' => $daid)));	
}

/**
 * Create the subscription to a group of users into the agenda
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	agenda identity and user to subscribe
 * @return	true if success and false otherwise
 */
function iw_agendas_user_subscriuauto($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
	$tenenacces = FormUtil::getPassedValue('tenenacces', isset($args['tenenacces']) ? $args['tenenacces'] : array(), 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : array(), 'POST');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_agendas', 'user', 'main',
													   array('mes' => $mes,
															 'any' => $any,
															 'daid' => $daid)));
	}
	// Needed argument
	if (!isset($daid) || !is_numeric($daid) || $daid == 0) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get agenda information
	$nomcamp = pnModAPIFunc('iw_agendas', 'user', 'getAgenda',
							 array('daid' => $daid));
	//Check if user can access the agenda
	$te_acces = pnModFunc('iw_agendas', 'user', 'te_acces',
						   array('daid' => $daid,
								 'grup' => $nomcamp['grup'],
								 'resp' => $nomcamp['resp'],
								 'activa' => $nomcamp['activa']));
	if ($te_acces < 4) {
		LogUtil::registerError (__('You are not allowed to do that', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
									array('mes' => $mes,
										  'any' => $any,
										  'daid' => $daid)));
	}
	$users = array_merge($tenenacces, $uid);
	$lid = pnModAPIFunc('iw_agendas', 'user', 'subsAltaMulti',
						 array('daid' => $daid,
 							   'users' => $users));
	if ($lid != false) {
		//Success
		LogUtil::registerStatus (__('Automatic subscription completed succesfully', $dom));
	}
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mes,
									  'any' => $any,
									  'dia' => $dia,
									  'daid' => $daid)));
}

/**
 * get the user notes from Google calendar (Gdata Zend functions are necessary)
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	
 * @return	
 */
function iw_agendas_user_gCalendar()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// get user uid
	$user = (pnUserGetVar('uid') == '') ? '-1' : pnUserGetVar('uid');
	$usability = pnModFunc('iw_agendas', 'user', 'getGdataFunctionsUsability');
	if ($usability !== true) {
		return LogUtil::registerError($usability, 403);
	}
	//Load required classes
	require_once 'Zend/Loader.php';
	Zend_Loader::loadClass('Zend_Gdata');
	Zend_Loader::loadClass('Zend_Gdata_AuthSub');
	Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
	Zend_Loader::loadClass('Zend_Gdata_HttpClient');
	Zend_Loader::loadClass('Zend_Gdata_Calendar');
	//@var string Location of AuthSub key file.  include_path is used to find this
	$_authSubKeyFile = null; // Example value for secure use: 'mykey.pem'
	//@var string Passphrase for AuthSub key file.
	$_authSubKeyFilePassphrase = null;
	$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;
	$userSettings = pnModFunc('iw_agendas', 'user', 'getUserGCalendarSettings');
	if (!isset($_SESSION['sessionToken']) && !isset($_GET['token'])) {
		try{
			$client = Zend_Gdata_ClientLogin::getHttpClient($userSettings['gUserName'], base64_decode($userSettings['gUserPass']), $service);
		} catch(exception $e) {
			$authSubUrl = pnModFunc('iw_agendas', 'user', 'getAuthSubUrl');
			return pnRedirect(pnModURL('iw_webbox', 'user', 'main',
										array('url' => str_replace('&', '*', str_replace('?', '**', $authSubUrl)))));
		}
	} else {
		$client = pnModFunc('iw_agendas', 'user', 'getAuthSubHttpClient');
	}
	try{
		$gdataCal = new Zend_Gdata_Calendar($client);
	} catch(exception $e) {
		LogUtil::registerError (__('Connection with Google failed. Imposible to synchronize the agenda', $dom));
		return false;
	}
	//get user calendars
	try{
		$calFeed = $gdataCal->getCalendarListFeed();
	} catch(exception $e) {
		LogUtil::registerError (__('Connection with Google failed. Imposible to synchronize the agenda', $dom));
		return false;
	}
	$gCalendarsIdsArray = array();
	foreach ($calFeed as $calendar) {
		$gCalendarsIdsArray[] = $calendar->id;
	}
	// Get all existing google calendars stored in database. We need them to know if the received google calendars exists or not
	$gAgendas = pnModAPIFunc('iw_agendas', 'user', 'getAllAgendas',
							  array('gAgendas' => 1,
									'gCalendarsIdsArray' => $gCalendarsIdsArray));
	$gCalendarsIdsArray = array();
	foreach ($gAgendas as $g) {
		$gIds[$g['gCalendarId']] = $g; 
	}
	$existingCalendar = array();
	// Create or edit the calendars if it were necessary
	foreach ($calFeed as $calendar) {
		//sincronize calendars
		$id = $calendar->id;
		$resp = '$' . $user . '$';
		$accessLevel = '$' . substr($calendar->accessLevel->value, 0, 4) . '|' . $user . '$';
		$color = '$' . $calendar->color->value . '|' . $user . '$';
		// Create a calendar array based on the calendar id
		$existingCalendar["$id"] = 1;
		if (!array_key_exists("$id",$gIds)) {
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$agenda = pnModAPIFunc('iw_agendas', 'admin', 'create',
									array('nom_agenda' => $calendar->title,
										  'descriu' => $calendar->summary->text,
										  'c1' => __('What',$dom),
										  'c2' => __('End',$dom),
										  'c3' => __('Where',$dom),
										  'c4' => __('Content',$dom),
										  'c5' => __('Author',$dom),
										  'tc1' => 1,
										  'tc2' => 1,
										  'tc3' => 1,
										  'tc4' => 2,
										  'tc5' => 1,
										  'activa' => 1,
										  'adjunts' => 0,
										  'protegida' => 1,
										  'gColor' => '$'.$color,
										  'color' => '',
										  'gCalendarId' => $id,
										  'gAccessLevel' => '$'.$accessLevel,
										  'resp' => '$'.$resp,
										  'sv' => $sv));
			// add new agenda into the array in case the agenda is created recently
			$gIds["$id"] = $agenda;
		} else {		
			if ($gIds["$id"]['nom_agenda'] != $calendar->title ||
				$gIds["$id"]['descriu'] != $calendar->summary->text ||
				strpos($gIds["$id"]['gColor'], $color) === false ||
				strpos($gIds["$id"]['resp'], $resp) === false ||
				strpos($gIds["$id"]['gAccessLevel'],$accessLevel) === false) {
				if (strpos($gIds["$id"]['gAccessLeve l'], $accessLevel) === false) {
					// Change the gCalendar access level
					$pos = strpos($gIds["$id"]['gAccessLevel'], '|' . $user . '$');
					$userAccessLevel = ($pos > 0) ? substr($gIds["$id"]['gAccessLevel'], $pos - 5, (int)strlen($user) + 7) : '';
					$newAccessLevelString = ($pos > 0) ? str_replace($userAccessLevel,$accessLevel,$gIds["$id"]['gAccessLevel']) : $gIds["$id"]['gAccessLevel'] . $accessLevel;
				}
				if (strpos($gIds["$id"]['gColor'],$color) === false) {
					// Change the gCalendar access level
					$pos = strpos($gIds["$id"]['gColor'],'|'.$user.'$');
					$userColor = ($pos > 0) ? substr($gIds["$id"]['gColor'], $pos - 8, (int)strlen($user) + 10) : '';
					$newColorString = ($pos > 0) ? str_replace($userColor, $color, $gIds["$id"]['gColor']) : $gIds["$id"]['gColor'] . $color;
				}
				$resp = (strpos($gIds["$id"]['resp'],$resp) === false) ? $resp : '';
				$items = array('nom_agenda' => $calendar->title,
								'descriu' => $calendar->summary->text,
								'gColor' => $newColorString,
								'resp' => $gIds["$id"]['resp'] . $resp,
								'gAccessLevel' => $newAccessLevelString);
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				pnModAPIFunc('iw_agendas', 'admin', 'editAgenda',
							  array('daid' => $gIds["$id"]['daid'],
									'items' => $items,
									'sv' => $sv));
			}
		}
	}
	// Get data from google for 2 months ago and 4 future months more or less
	$time = time();
	$beginDate = $time - 2*30*24*60*60;
	$endDate = $time + 4*30*24*60*60;
	$beginOndate = date('Y-m-d',$beginDate);
	$endOnDate = date('Y-m-d', $endDate);
	//get all the google notes
	$gCalendarNotes = pnModAPIFunc('iw_agendas','user','getAllGCalendarNotes',
									array('beginDate' => $beginDate,
										  'endDate' => $endDate,
										  'gIds' => $gIds));
	foreach ($calFeed as $calendar) {		
		$id = $calendar->id;
		$query = $gdataCal->newEventQuery();
		$calFeed = $gdataCal->getCalendarListFeed();
		$gUser = str_replace(Zend_Gdata_Calendar::CALENDAR_FEED_URI.'/default/', "", $id); // kind of dirty way to get the info, nut it lokks working :)
		$query->setUser($gUser);
		$query->setVisibility('private');
		$query->setProjection('full');
		$query->setOrderby('starttime');
		$query->setStartMin($beginOndate);
		$query->setStartMax($endOnDate);
		$eventFeed = array();
		if ($calendar->accessLevel->value == 'owner' ||
		    $calendar->accessLevel->value == 'editor' ||
		    $calendar->accessLevel->value == 'read') {
			$eventFeed = $gdataCal->getCalendarEventFeed($query);
		}
		foreach ($eventFeed as $event) {
			foreach ($event->when as $when) {
				$startTime = $when->startTime;
				$day = substr($startTime, 8, 2);
				$month = substr($startTime, 5, 2);
				$year = substr($startTime, 0, 4);
				$hour = substr($startTime, 11, 2);
				$minute = substr($startTime, 14, 2);
				
				
				
				$startTime = gmmktime($hour, $minute, 0, $month, $day, $year);
				
				
				
				
				$day = date('d', $startTime);
				$month = date('m', $startTime);
				$year = date('Y', $startTime);
				$hour = date('H', $startTime);
				$minute = date('i', $startTime);
				$endTime = $when->endTime;
				$dayEnd = substr($endTime, 8, 2);
				$monthEnd = substr($endTime, 5, 2);
				$yearEnd = substr($endTime, 0, 4);
				$hourEnd = substr($endTime, 11, 2);
				$minuteEnd = substr($endTime, 14, 2);
				$endTime = gmmktime($hourEnd, $minuteEnd, 0, $monthEnd, $dayEnd, $yearEnd);
				$dayEnd = date('d',$endTime);
				$monthEnd = date('m',$endTime);
				$yearEnd = date('Y',$endTime);
				$hourEnd = date('H',$endTime);
				$minuteEnd = date('i',$endTime);
				$allDay = (($minute == '' || $minute == '00') && ($hour == '' || $hour == '23') && ($minuteEnd == '' || $minuteEnd == '00') && ($hourEnd == '' || $hourEnd == '00')) ? 1 : 0;
				$end = ($allDay == 0) ? __('Foreseen time to finish', $dom) . ': ' . $hourEnd . ':' . $minuteEnd : __('All day', $dom);
				if (!array_key_exists("$event->id", $gCalendarNotes)) {
					//create item
					$lid = pnModAPIFunc('iw_agendas', 'user', 'crear',
										 array('dia' => $day,
											   'mes' => $month,
											   'any' => $year,
											   'c1' => $event->title,
											   'c2' => $end,
											   'c3' => $event->where[0]->valueString,
											   'c4' => $event->content,
											   'c5' => $event->author[0]->email->text,
											   'c6' => '',
											   'minut' => $minute,
											   'hora' => $hour,
											   'totdia' => $allDay,
											   'tasca' => 0,
											   'nivell' => 0,
											   'rid' => '-1',
											   'daid' => $gIds["$id"]['daid'],
											   'nova' => '$$'.$user.'$',
											   'oculta' => 0,
											   'fitxer' => '',
											   'origen' => '',
											   'gCalendarEventId' => $event->id,
											   'protegida' => 0));
				} else {
					$existing["$event->id"] = 1;
					$item = $gCalendarNotes["$event->id"];
					if ($allDay) {
						$hour = 23;
						$minute = 59;
					}
					$data = mktime($hour,$minute,0,$month,$day,$year);
					//check if item has changed. If it has changed it is updated
					if ($item['c1'] != $event->title ||
						$item['data'] != $data ||
						$item['c2'] != $end ||
						$item['c3'] != $event->where[0]->valueString ||
						$item['c4'] != $event->content) {	
						$items = array('c1' => $event->title,
									   'c2' => $end,
									   'c3' => $event->where[0]->valueString,
									   'c4' => $event->content,
									   'data' => $data,
									   'totdia' => $allDay,
									   'origen' => $calendar->title,
									   'totdia' => $allDay);
						//modify of a simple entry
				   		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
				   							 array('aid' => $item['aid'],
												   'items' => $items,
												   'daid' => $item['daid']));
					}
					//delete event from gCalendar if it were necessary
					if ($item['deleted'] == 1) {
						//delete of a simple entry
						try { 
					    	$event->delete();
						} catch (Zend_Gdata_App_Exception $e) {
						    return __('You are not allowed to administrate the agendas', $dom);
						}
					}
				}
			}
		}
	}
	// Delete the calendars where user can't access any more
	$diff = array_diff_key($gIds, $existingCalendar);
	foreach ($diff as $d) {
		if ($resp == '$') {
			// Nobody else needs the calendar and it is deleted
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			pnModAPIFunc('iw_agendas', 'admin', 'delete',
						  array('daid' => $d['daid'],
								'sv' => $sv));
		} else {
			// The user access to the calendar is deleted
			$items = array('gColor' => $newColorString,
							'resp' => $resp,
							'gAccessLevel' => $newAccessLevelString);
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			pnModAPIFunc('iw_agendas','admin','editAgenda',
						  array('daid' => $d['daid'],
								'items' => $items,
								'sv' => $sv));
		}
	}
	// set as deleted the not existing gCalendar notes
	$diff = array_diff_key($gCalendarNotes, $existing);
	foreach ($diff as $d) {
		if (strpos($gAgendas[$d['daid']]['gAccessLevel'], '$free|' . $user . '$') === false) {
			$items = array('deleted' => 1,
							'protegida' => 0);
			$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
								 array('aid' => $d['aid'],
									   'daid' => $d['daid'],
									   'items' => $items));
		}
	}
	//save that the sincronization has been made
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar',
			   array('uid' => $user,
					 'name' => 'sincroGCalendar',
					 'module' => 'iw_agendas',
					 'sv' => $sv,
					 'value' => '1',
					 'lifetime' => $userSettings['gRefreshTime'] * 60));
	//get all notes from gCalendar that has been created without connexion and create them
	$notesNotInGCalendar = pnModAPIFunc('iw_agendas','user','getAllGCalendarNotes',
										 array('beginDate' => $beginDate,
											   'endDate' => $endDate,
											   'gIds' => $gIds,
											   'notInGCalendar' => 1));
	foreach ($notesNotInGCalendar as $note) {
		$data = $note['data'];
		$data1 = $note['data1'];
		//Protect correct format for dateStart and dataEnd
		if ($data1 < $data) {$data1 = $data;}
		// Create a new entry using the calendar service's magic factory method
		$event = $gdataCal->newEventEntry();
		// Populate the event with the desired information
		// Note that each attribute is crated as an instance of a matching class
		$event->title = $gdataCal->newTitle($note['c1']);
		$event->where = array($gdataCal->newWhere($note['c3']));
		$event->content = $gdataCal->newContent($note['c4']);
		// Set the date using RFC 3339 format.
		$startDate = date('Y-m-d',$data);
		$endDate = date('Y-m-d',$data1);
		$when = $gdataCal->newWhen();
		if ($note['totdia'] == 0) {
			$tzOffset = ($userSettings['tzOffset'] == '') ? '+02': $userSettings['tzOffset'];
			//protect correct time format
			$startTime = date('H:i',$data);
			$endTime = date('H:i',$data1);
			$when->startTime = "{$startDate}T{$startTime}:00.000{$tzOffset}:00";
			$when->endTime = "{$endDate}T{$endTime}:00.000{$tzOffset}:00";
		} else {
			$when->startTime = "$startDate";
			$when->endTime = "$endDate";
		}
		$event->when = array($when);
		$calendarURL = str_replace(Zend_Gdata_Calendar::CALENDAR_FEED_URI . '/default/', "", $gAgendas[$note['daid']]['gCalendarId']); 
		$calendarURL = 'http://www.google.com/calendar/feeds/' . $calendarURL . '/private/full'; 
		// Upload the event to the calendar server
		// A copy of the event as it is recorded on the server is returned
		try {
			$newEvent = $gdataCal->insertEvent($event, $calendarURL);
		} catch (Zend_Gdata_App_Exception $e) {
			return __('Error produced during gCalendar\'s event creation', $dom);
		}
		$gCalendarEventId = $newEvent->id;
		// Edit note gCalendarEventId
		$items = array('gCalendarEventId' => $gCalendarEventId);
		//modify of a simple entry
   		$lid = pnModAPIFunc('iw_agendas', 'user', 'editNote',
   							 array('aid' => $note['aid'],
								   'items' => $items,
								   'daid' => $note['daid']));
	}
	return true;
}

function iw_agendas_user_getAuthSubUrl($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$next = pnModFunc('iw_agendas', 'user', 'getCurrentUrl');
	//$next = 'http://localhost:7777/zikula/index.php?module=Agendes';
	$scope = 'http://www.google.com/calendar/feeds/';
	$session = true;
	$secure = false;
	return Zend_Gdata_AuthSub::getAuthSubTokenUri($next, $scope, $secure, $session);
}

/**
 * Returns the full URL of the current page, based upon env variables
 * 
 * Env variables used:
 * $_SERVER['HTTPS'] = (on|off|)
 * $_SERVER['HTTP_HOST'] = value of the Host: header
 * $_SERVER['SERVER_PORT'] = port number (only used if not http/80,https/443)
 * $_SERVER['REQUEST_URI'] = the URI after the method of the HTTP request
 *
 * @return string Current URL
 */
function iw_agendas_user_getCurrentUrl()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Filter php_self to avoid a security vulnerability.
	$php_request_uri = htmlentities(substr($_SERVER['REQUEST_URI'], 0, strcspn($_SERVER['REQUEST_URI'], "\n\r")), ENT_QUOTES);
	$protocol = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';
	$host = $_SERVER['HTTP_HOST'];
	$port = ($_SERVER['SERVER_PORT'] != '' && (($protocol == 'http://' && $_SERVER['SERVER_PORT'] != '80') || ($protocol == 'https://' && $_SERVER['SERVER_PORT'] != '443'))) ? ':' . $_SERVER['SERVER_PORT'] : '';
	return $protocol . $host . $port . $php_request_uri;
}

function iw_agendas_user_getAuthSubHttpClient()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//global $_SESSION, $_GET, $_authSubKeyFile, $_authSubKeyFilePassphrase;
	$client = new Zend_Gdata_HttpClient();
	if ($_authSubKeyFile != null) {
		// set the AuthSub key
		$client->setAuthSubPrivateKeyFile($_authSubKeyFile, $_authSubKeyFilePassphrase, true);
	}
	if (!isset($_SESSION['sessionToken']) && isset($_GET['token'])) {
		$_SESSION['sessionToken'] = Zend_Gdata_AuthSub::getAuthSubSessionToken($_GET['token'], $client);
	}
	$client->setAuthSubToken($_SESSION['sessionToken']);
	return $client;
}

function iw_agendas_user_getUserGCalendarSettings()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$uid = pnUserGetVar('uid');
	// get if user is using gCalendar sincronization
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$gCalendarUse = pnModApiFunc('iw_main', 'user', 'userVarExists',
							      array('name' => 'gCalendarUse',
										'module' => 'iw_agendas',
										'uid' => pnUserGetVar('uid'),
										'sv' => $sv));
	if ($gCalendarUse) {
		//get Google username
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$gUserName = pnModFunc('iw_main', 'user', 'userGetVar',
								array('uid' => $uid,
									  'name' => 'gUserName',
									  'module' => 'iw_agendas',
									  'sv' => $sv));
		$gUserName = (strpos($gUserName,'@gmail.com') === false) ? $gUserName.'@gmail.com' : $gUserName;
		//get Google user password
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$gUserPass = pnModFunc('iw_main', 'user', 'userGetVar',
								array('uid' => $uid,
									  'name' => 'gUserPass',
									  'module' => 'iw_agendas',
									  'sv' => $sv));
		//get Google user password
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$gRefreshTime = pnModFunc('iw_main', 'user', 'userGetVar',
								   array('uid' => $uid,
										 'name' => 'gRefreshTime',
										 'module' => 'iw_agendas',
										 'sv' => $sv,
										 'nult' => true));
		$gRefreshTime = ($gRefreshTime < 15) ? 15 : $gRefreshTime;
	}
	$userGCalendarSettings = array('gCalendarUse' => $gCalendarUse,
								   'gUserName' => $gUserName,
								   'gUserPass' => $gUserPass,
								   'gRefreshTime' => $gRefreshTime);																
	return $userGCalendarSettings;
}

function iw_agendas_user_getGdataFunctionsAvailability()
{
	//return false;
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$zendGdataFuncAvailable = false;
	if (include_once 'Zend/Loader.php') {
		if (include_once('Zend/Gdata/App.php')) {
			$zendGdataFuncAvailable = true;
		}
	}
	return $zendGdataFuncAvailable;
}

function iw_agendas_user_getGdataFunctionsUsability()
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if (!pnUserLogIn()) {
		return __('The synchronization with gCalendar is only posible with validated users', $dom);
	}
	$usability = false;
	$gdataFunctionsAvailability = pnModFunc('iw_agendas', 'user', 'getGdataFunctionsAvailability');
	$settings = pnModFunc('iw_agendas', 'user', 'getUserGCalendarSettings');
	if ($settings['gCalendarUse']) {
		$gCalendarUse = true;
	} else {
		return false;
	}
	//check if google user name is set	
	if ($settings['gUserName'] == '') {
		return __('Synchronization with gCalendar failed. You must indicate your Google username', $dom);
	}
	$usability = $gdataFunctionsAvailability * $gCalendarUse * pnModGetVar('iw_agendas','allowGCalendar');
	return (boolean)$usability;
}

function iw_agendas_user_removeGCalendarUseVar($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'GET');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'GET');
	$daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'GET');
	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$result = pnModFunc('iw_main', 'user', 'userDelVar',
						 array('uid' => pnUserGetVar('uid'),
							   'name' => 'sincroGCalendar',
							   'module' => 'iw_agendas',
							   'sv' => $sv));
	return pnRedirect(pnModURL('iw_agendas', 'user', 'main',
								array('mes' => $mes,
									  'any' => $any,
									  'daid' => $daid)));																				
}

function iw_agendas_user_getCalendarContent($args)
{
	$dom = ZLanguage::getModuleDomain('iw_agendas');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
	// Security check
	if (!pnSecAuthAction(0, "iw_agendas:calendarblock:", $blockinfo['title']."::", ACCESS_READ)) { 
		return; 
	}
	$user = (pnUserLoggedIn()) ? pnUserGetVar('uid') : '-1';
	// Get the month and the year
	if ($mes != null) {
		$month = $mes;
		$year = $any;
		if ($month == 0) {$month = 12; $year = $year - 1;}
		if ($month == 13) {$month = 1; $year = $year + 1;}
	} else {
		$month = date('m');
		$year = date('Y');
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_agendas', false);
	// Get an array with the names of the months
	$month_names = array(__('January', $dom),
						 __('February', $dom),
						 __('March', $dom),
						 __('April', $dom),
						 __('May', $dom),
						 __('June', $dom),
						 __('July', $dom),
						 __('August', $dom),
						 __('September', $dom),
						 __('October', $dom),
						 __('November', $dom),
						 __('December', $dom));
	// Get an array with the names of the week
	$day_names = array(__('Sunday', $dom),
					   __('Monday', $dom),
					   __('Tuesday', $dom),
					   __('Wednesday', $dom),
					   __('Thursday', $dom),
					   __('Friday', $dom),
					   __('Saturday', $dom));
	// Get an array with the names of the week abbreviated
	$day_names_abbr = array(__('Mo', $dom),
							__('Tu', $dom),
							__('We', $dom),
							__('Th', $dom),
							__('Fr', $dom),
							__('Sa', $dom),
							__('Su', $dom));
	// Get the color configuration
	$colors = explode('|', pnModGetVar('iw_agendas', 'colors'));
	// Calculate the number of days of the month (28 to 31)
	$days_month = date("t", mktime(0, 0, 0, $month, 1, $year));
	// Numeric representation of the first day of the month in the week: 0 (for Sunday) through 6 (for Saturday)
	$first_day = date("w", mktime(0, 0, 0, $month, 1, $year));
	// The Sunday must be number 7 (for us, Sunday is the last day of the week, not the first)
	if ($first_day == 0) {$first_day = 7;}
	//get the content from personal agenda and shared agendas where user is subscribed
	$events = pnModAPIFunc('iw_agendas', 'user', 'getEvents',
							array('month' => $month,
								  'year' => $year,
								  'daid' => 0));
	$eventsArray = array();
	foreach ($events as $event) {
		$eventsArray[] = $event;
	}
	//get all the agendas where the user can access  
	$agendas = pnModFunc('iw_agendas', 'user', 'getUserAgendas');
	$pos = 0;
	// Get the info of the days (one iteration per day)
	for ($i = 1; $i <= $days_month; $i++) {
		//get the notes for the current day from eventsArray
		$days[$i]['content'] = '';
		$final = mktime(23, 59, 59, $month, $i, $year);
		while ($eventsArray[$pos]['data'] < $final && $pos < count($eventsArray)) {
			$data = ($eventsArray[$pos]['totdia'] == 1) ? __('All day', $dom) : date('H.i', $eventsArray[$pos]['data']);
			$tasca = ($eventsArray[$pos]['tasca']) ? __('Task', $dom).' - '.$eventsArray[$pos]['nivell'] : '';
			$tipus = ($tasca) ? $tasca : $data;
			// Get the agenda from where the note comes from
			$agenda = ($eventsArray[$pos]['daid'] > 0) ? $agendas[$eventsArray[$pos]['daid']] : '';
			$agendaText = (isset($agenda['nom_agenda']) && $agenda['nom_agenda'] != '') ? " <span style=\'background-color:" . $agenda['color'] . "; border: 1px solid #000\'>" : '';
			$days[$i]['content'] .= "<div style=\'float: left;\'><strong>" . $tipus . '</strong> &nbsp;</div><div>' . $eventsArray[$pos]['c1'] . $agendaText;
			if (pnUserLoggedIn() && $agenda['nom_agenda'] != '') {
				$days[$i]['content'] .= ' <font size="-2">(<strong>' . $agenda['nom_agenda'] . '</strong>)</font>';
			}
			$days[$i]['content'] .= '</span><div>';
			$pos++;
		}
		
		while ($eventsArray[$pos]['data'] < $final && $pos < count($eventsArray)) {
			$data = ($eventsArray[$pos]['totdia'] == 1) ? __('All day', $dom) : date('H.i', $eventsArray[$pos]['data']);
			// Get the agenda from where the note comes from
			$agenda = ($eventsArray[$pos]['daid'] > 0) ? $agendas[$eventsArray[$pos]['daid']] : '';
			$agendaText = (isset($agenda['nom_agenda']) && $agenda['nom_agenda'] != '') ? " <span style=\'background-color:" . $agenda['color'] . "; border: 1px solid #000\'>" : '';
			$days[$i]['content'] .= "<div style=\'float: left;\'><strong>" . $data . '</strong> &nbsp;</div><div>' . $eventsArray[$pos]['c1'] . $agendaText;
			if (pnUserLoggedIn() && $agenda['nom_agenda'] != '') {
				$days[$i]['content'] .= ' <font size="-2">(<strong>' . $agenda['nom_agenda'] . '</strong>)</font>';
			}
			$days[$i]['content'] .= '</span><div>';
			$pos++;
		}
		
		if ($days[$i]['content'] == '') {
			$days[$i]['content'] = __('There are no events on this date', $dom).'<br />';
			$days[$i]['haveContent'] = false;
		} else {
			$days[$i]['haveContent'] = true;
		}
		$days[$i]['content'] = pnModFunc('iw_agendas', 'user', 'prepara_etiqueta',
										  array('text' => $days[$i]['content']));
		// Check whether this day belongs to any defined period, so it will be shown in a predetermined color
		$periode = pnModFunc('iw_agendas', 'user', 'periode',
							  array('dia' => $i,
									'mes' => $month,
									'any' => $year));
		// Include the periode color in the array (all the days look the same)
		if ($periode['dins']) {
			$days[$i]['bgcolor'] = $periode['color'];
			$days[$i]['color'] = $colors[5];
			$days[$i]['label'] = pnModFunc('iw_agendas', 'user', 'prepara_etiqueta',
											array('text' => $periode['etiqueta'])) . '<br /><br />';
		} else {
			$days[$i]['bgcolor'] = $colors[9]; // Default color (background color of the table)
		}
		// Check whether it's a non-working day
		$festiu = pnModFunc('iw_agendas', 'user', 'festiu',
							 array('dia' => $i,
								   'mes' => $month,
								   'any' => $year));
		// Change the color and the label if necessary
		if ($festiu['festiu']) { 
			$days[$i]['bgcolor'] = $colors[8];
			$days[$i]['color'] = $colors[6];
			$days[$i]['label'] = pnModFunc('iw_agendas', 'user', 'prepara_etiqueta',
											array('text' => $festiu['etiqueta'])) . '<br /><br />';
		}
		// Check whether it's weekend
		$day_of_the_week = date("w", mktime(0, 0, 0, $month, $i, $year));
		// Change the color if necessary
		if ($day_of_the_week == 6 || $day_of_the_week == 0) {
			$days[$i]['color'] = $colors[6];
			$days[$i]['bgcolor'] = $colors[8];
		}
		// Check whether the day is today
		if (date('d') == $i && date('m') == $month && date('Y') == $year) {
			$days[$i]['bgcolor'] = $colors[10];
		}
		// Check whether there's any info associated to this day
		$information = pnModFunc('iw_agendas', 'user', 'info',
								  array('dia' => $i,
										'mes' => $month,
										'any' => $year));
		if ($information != '') {
			$days[$i]['info'] = pnModFunc('iw_agendas', 'user', 'prepara_etiqueta',
										   array('text' => $information));
		}
		// Build the date to be shown in the caption of the popup window
		$days[$i]['caption'] = $day_names[$day_of_the_week]."&nbsp;&nbsp;$i/$month/$year";
	}
	// Pass the data to the template
	$pnRender->assign('colors', $colors);
	$pnRender->assign('month', (int)$month);
	$pnRender->assign('previous_month', (int)$month - 1);
	$pnRender->assign('next_month', (int)$month + 1);
	$pnRender->assign('year', $year);
	$pnRender->assign('first_day', $first_day);
	$pnRender->assign('days_month', $days_month);
	$pnRender->assign('month_name', $month_names[(int)$month - 1]);
	$pnRender->assign('day_names_abbr', $day_names_abbr);
	$pnRender->assign('days', $days);
	return $pnRender->fetch('iw_agendas_block_calendar.htm');
}
/**
 * get the notes of a user for a vcalendar format
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param	totes for all the notes or only future notes
 * @return	a file for vcalendar format
 */
/*
function iw_agendas_user_vcalendar($args)
{
	$dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'GET');
	$mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'GET');
	$any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'GET');
	$totes = FormUtil::getPassedValue('totes', isset($args['totes']) ? $args['totes'] : null, 'GET');

	if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Get all the notes for a user
	$registres = pnModAPIFunc('iw_agendas', 'user', 'getEvents', array('inici' => 1,
											'final' => 999999999999999999999999999999));
	if (empty($registres)) {
		if ($totes!=0) {
			//Success
			LogUtil::registerError (__('There are no events in the agenda', $dom));
		} else {
			//Success
			LogUtil::registerError (__('All existing events have been exported to vcalendar', $dom));
		}
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main', array('mes' => $mes,
											'any' => $any,
											'dia' => $dia,
											'daid' => 0)));
	}

	//tenim dades a l'agenda i construim el fitxer vcs
	//generem el fitxer on escriurem les dades a exportar
	$fitxer = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_agendas', 'urladjunts').'/'.pnUserGetVar('uname').date('dmY').'.vcs';

	$f = fopen($fitxer,'w');

	foreach ($registres as $registre) {
		//preparem l'hora de l'anotaciï¿œ
		if ($registre['totdia'] == 1) {
			$inici = date(Ymd,$registre['data'])."T000000\r\n";
			$final = date(Ymd,$registre['data'])."T240000\r\n";
		} else {
			$inici = date(Ymd,$registre['data'])."T".date(Hi,$registre['data'])."00\r\n";
			$final = date(Ymd,$registre['data'])."T".date(Hi,$registre['data'] + (60 * 60))."00\r\n";
		}
		fwrite($f,"BEGIN:VCALENDAR\r\n");
		fwrite($f,"PRODID:Intraweb\r\n");
		fwrite($f,"BEGIN:VEVENT\r\n");

		//Si ï¿œs la data lï¿œmit d'una tasca ho indiquem
		$tasca = ($registre['tasca'] == 1) ? 'Lï¿œMIT TASCA ->' : '';

		fwrite($f,"SUMMARY;ENCODING=QUOTED-PRINTABLE:".$tasca.str_replace("\r\n",'=0D=0A',$registre['c1'])."\r\n");
		if ($registre['c2']!='') {fwrite($f,"DESCRIPTION;ENCODING=QUOTED-PRINTABLE:".str_replace("\r\n",'=0D=0A',$registre['c2'])."\r\n");}
		fwrite($f,"DTSTART:".$inici);
		fwrite($f,"DTEND:".$final);
		fwrite($f,"END:VEVENT\r\n");
		fwrite($f,"END:VCALENDAR\r\n\r\n");
	}
	fclose($f);

	//Comprovem que el fitxer s'hagi creat amb ï¿œxit
	if (!is_file($fitxer)) {
		//Success
		LogUtil::registerError (__('An error has ocurred while creating VCS file. If the problem persists, please contact the administrator', $dom));
		return pnRedirect(pnModURL('iw_agendas', 'user', 'main', array('mes' => $mes,
																		'any' => $any,
																		'dia' => $dia,
																		'daid' => 0)));
	}

	//Marquem les anotacions com a passades a vcalendar
	pnModAPIFunc('iw_agendas','user','vcalendar');
	
	//Gather relevent info about file
	$len = filesize($fitxer);
	$filename = basename($fitxer);
	$file_extension = strtolower(substr(strrchr($filename,"."),1));
	$ctype = "VCALENDAR/vcs";
	//Begin writing headers
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public"); 
	header("Content-Description: File Transfer");

	//Use the switch-generated Content-Type
	header("Content-Type: $ctype");
	
	//Force the download
	$header = "Content-Disposition: attachment; filename=".$filename.";";
	header($header);
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".$len);
	@readfile($fitxer);

	//Esborra el fitxer del servidor
	unlink($fitxer);
	exit;
}
*/
