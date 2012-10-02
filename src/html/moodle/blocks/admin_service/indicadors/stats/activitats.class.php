<?php
/**
 * Mostra les escriptures i lectures per a les diferents activitats segons la forquilla actual
 */
class activitats extends stat_base {
	function nom () {
		//return get_string ('activitat_activitats','admupc');
		return "Registre de les activitats";
	}
	
	function descripcio () {
		//return get_string ('activitat_activitats_desc','admupc');
		return "Aquest indicador conté les lectures i escriptures que es realitzen " .
				"mensualment sobre les activitats dels cursos.";
	}
	
	/**
	 * tracta el formulari. S'executa abans de printar res per pantalla
	 * @return Boolean (fals si retorna error, true si be)
	 */
	function tractament () {
		
	}
	
	/**
	 * mostra el contingut de la estadística
	 * @param: dades de la selecció de temps
	 */
	function contingut ($forq) {
		global $CFG, $USER;
		
		
		
		if(!isset($USER->id) || $USER->id == -1){
			print_error('chooseenv','block_admin_service');			
		}
		
		
		
		
		
		//get_recordset_sql($sql)
		//llegenda
		//x-dades (quad,campus,assig) (format [Compacte, Ampliat])
		$mes_fi=date('n',$forq->fi);
		$day_fi=date('t',$forq->fi);
		$any_fi=date('Y',$forq->fi);
		$mes_inici=date('n',$forq->inici);
		//$hoy_inici=date('j',$forq->inici);
		$any_inici=date('Y',$forq->inici);
		
		/*if ($mes_inici==$mes_fi) {
				$forq->inici = mktime(0,0,0,$mes_inici-1,$hoy_inici,$any_inici);
		}*/
		/**
		 * Agregat mensual. Per tant forçem el principi i la fi de mes especificat
		 */
		//print_object($forq);
		$forq->inici = mktime(0,0,0,$mes_inici,1,$any_inici);
		$forq->fi = mktime(23,59,59,$mes_fi,$day_fi,$any_fi);
		//print_object($forq);
		$cas = $forq->quad.'|'.$forq->campus;
		$format = 'C';
		
		if($forq->quad == 'Agregar'){
			$forq->quad = -2;
		}
		if($forq->campus == 'Agregar'){
			$forq->campus = -2;
		}
		if($forq->quad == 'Tots'){
			$forq->quad = -1;
		}
		if($forq->campus == 'Tots'){
			$forq->campus = -1;
		}
		$cas = $forq->quad.'|'.$forq->campus;
		$format = 'C';
		
		/*if(isset($forq->suport) && ($forq->suport != '---')){
			$cas='-3|-3';	
			
		}*/
		
	
		//mirem els filtres
		$filtres = array();
		if (optional_param('fetform')) {
			$moduls = array('assignment', 'calendar', 'chat', 'choice', 'forum', 'glossary', 'journal', 
		'label', 'lesson', 'message', 'quiz', 'resource', 'scorm', 'survey', 'wiki', 'workshop', 'data', 'blog', 'lams', 'grade');
			/*$mods = array('forum','glossary','label','lesson','quiz','wiki',
			'assignment','calendar','chat','choice','data','internalmail','journal',
			'resource','scorm','survey','workshop');*/
			$checks = array();
			foreach ($moduls as $mod) {
				if (optional_param('v'.$mod)) $filtres[] = $mod;
			}
			
			/*if (optional_param('vglossary')) $filtres[] = 'glossary';
			if (optional_param('vlabel')) $filtres[] = 'label';
			if (optional_param('vlesson')) $filtres[] = 'lesson';
			if (optional_param('vquiz')) $filtres[] = 'quiz';
			if (optional_param('vwiki')) $filtres[] = 'wiki';
			if (optional_param('vassignment')) $filtres[] = 'assignment';
			if (optional_param('vcalendar')) $filtres[] = 'calendar';
			if (optional_param('vchat')) $filtres[] = 'chat';
			if (optional_param('vchoice')) $filtres[] = 'choice';
			if (optional_param('vdata')) $filtres[] = 'data';
			if (optional_param('vinternalmail')) $filtres[] = 'internalmail';
			if (optional_param('vjournal')) $filtres[] = 'journal';
			if (optional_param('vresource')) $filtres[] = 'resource';
			if (optional_param('vscorm')) $filtres[] = 'scorm';
			if (optional_param('vsurvey')) $filtres[] = 'survey';
			if (optional_param('vworkshop')) $filtres[] = 'workshop';*/
		}
		
		$filtre='';
		if (optional_param('fetform') and count($filtres)<count($moduls)) {
			$filtre = " AND module IN ('".implode("','",$filtres)."') ";
		}
		
		
		//casos d'aministrador
		switch ($cas) {
			case '-2|-2':
				//1-mostrar per tota la plataforma (-2,-2,X)(A)
			/*	$query = "SELECT module,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY module ORDER BY module";*/
				$query = "SELECT module,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY module ORDER BY module";
				$format = 'A';
				//$head = array('data','module','rd','wr');
				$head = array('module','rd','wr');
				break;
			case '-1|-1':
				//2-mostrar tots els campus i tots els quadrimestres (-1,-1,X)(C)
			/*	$query = "SELECT module, campus, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY campus,year,quat,module ORDER BY year,quat,campus,module";*/
				$query = "SELECT module, campus, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY campus,year,quat,module ORDER BY year,quat,campus,module";
				//$head = array('data','quad','campus','module','rd','wr');
				$head = array('quad','campus','module','rd','wr');
				break;
			case '-1|-2':
				//3-mostrar tots els quadrimestres pero l'agregat dels campus (-1,-2,X)(C)
			/*	$query = "SELECT module, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY year,quat,module ORDER BY year,quat,module";*/
				$query = "SELECT module, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY year,quat,module ORDER BY year,quat,module";
				//$head = array('data','quad','module','rd','wr');
				$head = array('quad','module','rd','wr');
				break;
			case '-2|-1':
				//4-mostrar tots els campus però agregat per quadri (-2,-1,X)(C)
			/*	$query = "SELECT module, campus,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY campus,module ORDER BY campus,module";*/
				$query = "SELECT module, campus,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY campus,module ORDER BY campus,module";
				//$head = array('data','campus','module','rd','wr');
				$head = array('campus','module','rd','wr');
				break;
			case '-3|-3':
				//mostrar els de suport atenea
				if($forq->suport == -2){//parlem de la categoria
				/*	$query = "SELECT module, campus,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
							"WHERE categoryid=22 AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
							"GROUP BY campus,module ORDER BY campus,module";*/
					$query = "SELECT module, campus,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
							"WHERE categoryid=22 AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
							"GROUP BY campus,module ORDER BY campus,module";
				}else{
					/*$query = "SELECT module, campus,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
							"WHERE courseid={$forq->suport} AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
							"GROUP BY campus,module ORDER BY campus,module";*/
					$query = "SELECT module, campus,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
							"WHERE courseid={$forq->suport} AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
							"GROUP BY campus,module ORDER BY campus,module";
				}
				$head = array('campus','module','rd','wr');
				break;
			default:
				//5-mostrar per un campus tots els quadrimetres (-1,N,X)(C)
				if ($forq->quad == -1) {
				/*	$query = "SELECT module, campus, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' $filtre" .
						"GROUP BY campus,year,quat,module ORDER BY year,quat,module";*/
					$query = "SELECT module, campus, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' $filtre" .
						"GROUP BY campus,year,quat,module ORDER BY year,quat,module";
					//$head = array('quad','campus','module','rd','wr');
					$head = array('quad','campus','module','rd','wr');
					break;
				}
				//6-mostrar per un campus l'agregat dels quadrimestres (-2,N,X)
				if ($forq->quad == -2) {
				/*	$query = "SELECT module, campus,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' $filtre" .
						"GROUP BY campus,module ORDER BY module";*/
					$query = "SELECT module, campus,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' $filtre" .
						"GROUP BY campus,module ORDER BY module";
					$head = array('data','campus','module','rd','wr');
					break;
				}
				//7-mostrar per un quadrimestre tots els campus (N,-1,X)(C)
				if ($forq->campus == -1) {
				/*	$query = "SELECT module, campus, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' $filtre" .
						"GROUP BY campus,year,quat,module ORDER BY campus,module";*/
					$query = "SELECT module, campus, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' $filtre" .
						"GROUP BY campus,year,quat,module ORDER BY campus,module";
					//$head = array('data','quad','campus','module','rd','wr');
					$head = array('quad','campus','module','rd','wr');
					break;
				}
				//8-mostrar per un quadrimestre l'agregat dels campus (N,-2,X)
				if ($forq->campus == -2) {
				/*	$query = "SELECT module, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' $filtre" .
						"GROUP BY year,quat,module ORDER BY module";*/
					$query = "SELECT module, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' $filtre" .
						"GROUP BY year,quat,module ORDER BY module";
					//$head = array('data','quad','module','rd','wr');
					$head = array('quad','module','rd','wr');
					break;
				}
				//casos administrador i gestor
				//9-mostrar per un campus i quadri l'agregat (N,N,-2)(A)
				if ($forq->assig == -2) {
				/*	$query = "SELECT module, campus, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' $filtre" .
						"GROUP BY campus,year,quat,module ORDER BY module";*/
					$query = "SELECT module, campus, year,quat,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' $filtre" .
						"GROUP BY campus,year,quat,module ORDER BY module";
					//$head = array('data','quad','campus','module','rd','wr');
					$head = array('quad','campus','module','rd','wr');
					break;
				}
				//10-mostrar per un campus i quadri totes les assignatures (N,N,-1)(C)
				if ($forq->assig == -1) {
				/*	$query = "SELECT module, campus, year,quat,courseid,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' $filtre" .
						"GROUP BY campus,year,quat,courseid,module ORDER BY courseid,module";*/
					$query = "SELECT module, campus, year,quat,courseid,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' $filtre" .
						"GROUP BY campus,year,quat,courseid,module ORDER BY courseid,module";
					//$head = array('data','quad','campus','course','module','rd','wr');
					$head = array('quad','campus','course','module','rd','wr');
					break;
				}
				
				//casos profe, admin i gestor
				//11-mostrar per un campus i quadri una assignatura (N,N,N)(A)
				/*$query = "SELECT module, campus, year,quat,courseid,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' $filtre" .
						"AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' AND courseid={$forq->assig}" .
						"GROUP BY campus,year,quat,courseid,module ORDER BY module";*/
				$query = "SELECT module, campus, year,quat,courseid,sum(read) as rd, sum(write) as wr FROM {$CFG->prefix}analytics_{$USER->id}_mod " .
						"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' $filtre" .
						"AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' AND courseid={$forq->assig}" .
						"GROUP BY campus,year,quat,courseid,module ORDER BY module";
				//$head = array('data','quad','campus','course','module','rd','wr');
				$head = array('quad','campus','course','module','rd','wr');
				break;
		}
		
		//executem la query
	//	echo $query.'<br/>';
	//ens connectem a la base de dades local
		
		$result = get_recordset_sql($query);
		$data = array();
		//$dates_sql = array();
		$courses = array();
		while ($res = recordset_fetch ($result)) {
			//print_object($res);
			//posem la data a la primera posicio
			$row = array();
			if ($head[0]=='data') $row[] = date("Y/m/d", $forq->inici);
			//mirem si posem el quadrimestre
			if (in_array('quad',$head)) {
				$quad = '';
				if (isset($res->quat) && $res->quat) {
					$quad= $res->year.'-'.$res->quat;
				}
				$row[] = $quad;
			}
			//mirem si tenim campus
			if (in_array('campus',$head)) {
				$campus = '';
				if (isset($res->campus)) {
					$campus = $res->campus;
				}
				$row[] = $campus;
			}
			if (in_array('course',$head)) {
				$c = '';
				if (isset($res->courseid) && $res->courseid && is_numeric($res->courseid)) {
					if (isset($courses[$res->courseid])) {
						$c = $courses[$res->courseid];
					} else {
						$c= get_assig_shortname ($res->courseid);
						if ($c) {
							$courses[$res->courseid] = $c;
						}
					}
				}
				$row[] = $c;
			}
			//$row[] = $res->module;
			$row[] = get_string($res->module,'block_admin_service');
			$row[] = $res->rd;
			$row[] = $res->wr;
			
			//$dates_sql[] = $res;
			
			$data[] = $row;
		}
		recordset_close($result);
		//passem a montar els resultats en taula
		//echo '<table border="1">';
		obre_taula();
		
		//print_object ($data);
		
		//echo '<tr><th>'.implode('</th><th>',$head).'</th></tr>';
		$cap = array();
		foreach ($head as $h) {
			$cap[] = get_string($h,'block_admin_service');
		}
		afegeix_capcalera($cap);
		
		foreach ($data as $row) {
			//mirem si la posem o no
			$posa = true;
			foreach ($row as $field) {
				if (!$field) {
					if ($field!==0 && $field!=='0') $posa = false;
				}
			}
			if ($posa) {
				//echo '<tr>';
				//echo '<tr><td>'.implode('</td><td>',$row).'</td></tr>';
				//echo '</tr>';
				afegeix_fila($row);
			}
		}
		
		/*switch ($format) {
			case 'C':
				//mostra tota la informació dels mòduls en una fila
				//selectors (campus, quadri...) + modul1 lectura + modul2 lectura+.....
				$rows = array();
				
				break;
			case 'A':
		}*/
		//echo '</table>';
		tanca_taula();
		
		//print_object($dates_sql);
	}
	
	/**
	 * algunes estadistiques nomes es mostren a vegades
	 * @return boolean o int (0=invisible, 1=visible, 2=visible pero no lincable)
	 */
	function visible () {
		return true;
	}
	
	/**
	 * If is gestor only show Month/Year
	 *
	 * @return Boolean
	 */
	function mostra_dia(){
		/*if (isgestor()) {
			return false;
		}
		return true;*/
		return false;
	}
	
	/**
	 * retorna el formulari associat a l'indicador
	 */
	function form () {
		$url = get_current_stat_url();
		echo '<form action="'.$url.'" method="post">';
		/*$mods = array('forum','glossary','label','lesson','quiz','wiki',
			'assignment','calendar','chat','choice','data','internalmail','journal',
			'resource','scorm','survey','workshop');*/
		$mods = array('forum','glossary','label','lesson','quiz','wiki',
			'assignment','calendar','chat','choice','data','grade','journal',
			'resource','scorm','survey','workshop');
		$checks = array();
		foreach ($mods as $mod) {
			$checks[$mod] = (optional_param('v'.$mod) || !optional_param('fetform'))?'checked="checked"':'';
		}
		
		/*$checks[] = (optional_param('vforum') || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] = (optional_param('vglossary',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vlabel',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vlesson',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vquiz',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vwiki',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vassignment',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vcalendar',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vchat',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vchoice',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vdata',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vinternalmail',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vjournal',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vresource',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vscorm',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vsurvey',true) || !optional_param('fetform'))?'checked="checked"':'';
		$checks[] =  (optional_param('vworkshop',true) || !optional_param('fetform'))?'checked="checked"':'';*/
		
		$num = 1;
		echo '<table border="0"><tr>';
		foreach ($mods as $mod) {
			echo '<td><input type="checkbox" name="v'.$mod.'" '.$checks[$mod].'/>'.get_string($mod,'block_admin_service').'</td>';				
			if ($num%6==0) echo '</tr><tr>';
			$num++;
		}
		
		
		while ($num%6!=0) {
			echo '<td>&nbsp;</td>';
			$num++;
		}
	
		echo '</tr></table>';
		
		/*echo '<input type="checkbox" name="vglossary" '.$checks[1].'/>Glossaries';
		echo '<input type="checkbox" name="vlabel" '.$checks[2].'/>Labels';
		echo '<input type="checkbox" name="vlesson" '.$checks[3].'/>Lessons';
		echo '<input type="checkbox" name="vquiz" '.$checks[4].'/>Quizs';
		echo '<input type="checkbox" name="vwiki" '.$checks[5].'/>Wikis';
		echo '<input type="checkbox" name="vassignment" '.$checks[6].'/>Assignments';
		echo '<input type="checkbox" name="vcalendar" '.$checks[7].'/>Calendars';
		echo '<input type="checkbox" name="vchat" '.$checks[8].'/>Chats';
		echo '<input type="checkbox" name="vchoise" '.$checks[9].'/>Choise';
		echo '<input type="checkbox" name="vdata" '.$checks[10].'/>Datas';
		echo '<input type="checkbox" name="vinternalmail" '.$checks[11].'/>Internalmails';
		echo '<input type="checkbox" name="vjournal" '.$checks[12].'/>Journal';
		echo '<input type="checkbox" name="vresource" '.$checks[13].'/>Resource';
		echo '<input type="checkbox" name="vscorm" '.$checks[14].'/>Scorm';
		echo '<input type="checkbox" name="vsurvey" '.$checks[15].'/>Survey';
		echo '<input type="checkbox" name="vworkshop" '.$checks[16].'/>Workshops';*/
		echo '<input type="hidden" name="fetform" value="si"/><br/>';
		
				//boto per seleccionar/desseleccionar tot
		echo '<script language="JavaScript" type="text/javascript">' .
				'function borra(valor){
					for(var i=0;i<'.sizeof($mods).';i++){' .
					//'alert(document.forms[0].elements[i].name);'.
					'document.forms[0].elements[i].checked = valor;' .
					'}' .
					'document.reload();'.
					'return false;'.
				'}' .
				'</script>';
		echo 'Selecciona: <a href="javascript:borra(1)">Totes les activitats</a>&nbsp;&nbsp;<a href="javascript:borra(0)">Cap activitat</a>';
	echo '&nbsp;&nbsp;<input type="submit" value="Filtra"/>';
		echo '</form>';
	}
	
}
?>