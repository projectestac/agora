<?php
/**
 * Mostra les escriptures i lectures per a les diferents activitats segons la forquilla actual
 */
class accessos extends stat_base {
	function nom () {
		//return get_string ('activitat_activitats','admupc');
		return "Registre d'accessos";
	}
	
	function descripcio () {
		//return get_string ('activitat_activitats_desc','admupc');
		//return "Aquest indicador mostra els usuaris no únics al curs de qualsevol tipus d'usuari";
		$miss = "Aquest indicador mostra els usuaris que han accedit a les assignatures.
			Diferenciats per les visites totals i visites úniques que corresponen a usuaris únics.<br/>
			Això significa que no hi ha repetits en el nombre d'usuaris que entren en un curs durant un tot un dia"; 
		return $miss;
	}
	
	/**
	 * mostra el contingut de la estadística
	 * @param: dades de la selecció de temps
	 */
	function contingut ($forq) {
		
		global $CFG,$USER;
		
		if(!isset($USER->id) || $USER->id == -1){
			print_error('chooseenv','block_admin_service');
		}
		
		//print_object ($forq);
		//get_recordset_sql($sql)
		//llegenda
		//x-dades (quad,campus,assig) (format [Compacte, Ampliat])
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
		/*
		if(isset($forq->suport) && ($forq->suport != '---')){
			$cas='-3|-3';	
			
		}*/
		
		//casos d'aministrador
		switch ($cas) {
		case '-2|-2':
			//1-mostrar per tota la plataforma (-2,-2,X)(A)
			/*$query = "SELECT sum(logins) as vs, sum(logins_unicos) as vsu, sum(guest_logins) as glog, sum(logins_racofib) as racolog FROM {$CFG->prefix}site " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} ";*/
			/*$query = "SELECT sum(logins) as vs, sum(logins_unicos) as vsu, sum(guest_logins) as glog FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_site " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} ";*/
			$query = "SELECT sum(logins) as vs, sum(logins_unicos) as vsu, sum(guest_logins) as glog FROM {$CFG->prefix}analytics_{$USER->id}_site " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} ";
			$format = 'A';
			$head = array('vs','vsu','glog');
			break;
		case '-1|-1':
			//2-mostrar tots els campus i tots els quadrimestres (-1,-1,X)(C)
			/*$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} " .
					"GROUP BY campus,year,quat,courseid ORDER BY year,quat,campus,courseid";*/
			/*$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} " .
					"GROUP BY campus,year,quat,courseid ORDER BY year,quat,campus,courseid";*/
			$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} " .
					"GROUP BY campus,year,quat,courseid ORDER BY year,quat,campus,courseid";
			
			$head = array('quad','campus','course','vs','vsu');
			break;
		case '-1|-2':
			//3-mostrar tots els quadrimestres pero l'agregat dels campus (-1,-2,X)(C)
			/*$query = "SELECT courseid, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} " .
					"GROUP BY year,quat,courseid ORDER BY year,quat,courseid";*/
			/*$query = "SELECT courseid, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} " .
					"GROUP BY year,quat,courseid ORDER BY year,quat,courseid";*/
			$query = "SELECT courseid, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} " .
					"GROUP BY year,quat,courseid ORDER BY year,quat,courseid";
			
			$head = array('quad','course','vs','vsu');
			break;
		case '-2|-1':
			//4-mostrar tots els campus però agregat per quadri (-2,-1,X)(C)
			/*$query = "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} " .
					"GROUP BY campus,courseid ORDER BY campus,courseid";*/
			/*$query = "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} " .
					"GROUP BY campus,courseid ORDER BY campus,courseid";*/
			$query = "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} " .
					"GROUP BY campus,courseid ORDER BY campus,courseid";
			$head = array('campus','course','vs','vsu');
			break;
		case '-3|-3':
			//mostrar els de suport atenea
			if($forq->suport == -2){
				/*$query =  "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM  {$CFG->prefix}assig " .
						"WHERE categoryid=22 AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY courseid,campus ORDER BY courseid,campus";*/
				/*$query =  "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM  {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
						"WHERE categoryid=22 AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY courseid,campus ORDER BY courseid,campus";*/
				$query =  "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM  {$CFG->prefix}analytics_{$USER->id}_assig " .
						"WHERE categoryid=22 AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY courseid,campus ORDER BY courseid,campus";
			}else{
			/*	$query =  "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM  {$CFG->prefix}assig " .
						"WHERE courseid={$forq->suport} AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY courseid,campus ORDER BY courseid,campus";*/
				/*$query =  "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM  {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
						"WHERE courseid={$forq->suport} AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY courseid,campus ORDER BY courseid,campus";*/
				$query =  "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM  {$CFG->prefix}analytics_{$USER->id}_assig " .
						"WHERE courseid={$forq->suport} AND time_start>={$forq->inici} AND time_end<={$forq->fi} $filtre" .
						"GROUP BY courseid,campus ORDER BY courseid,campus";
			}
			$head = array('campus','course','vs','vsu');
			break;
		default:
			//5-mostrar per un campus tots els quadrimetres (-1,N,X)(C)
			if ($forq->quad == -1) {
			/*	$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}'" .
					"GROUP BY campus,year,quat,courseid ORDER BY year,quat,courseid";*/
				/*$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}'" .
					"GROUP BY campus,year,quat,courseid ORDER BY year,quat,courseid";*/
				$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}'" .
					"GROUP BY campus,year,quat,courseid ORDER BY year,quat,courseid";
				$head = array('data','quad','campus','course','vs','vsu');
				break;
			}
			//6-mostrar per un campus l'agregat dels quadrimestres (-2,N,X)
			if ($forq->quad == -2) {
			/*	$query = "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}'" .
					"GROUP BY campus,courseid ORDER BY courseid";*/
				/*$query = "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}'" .
					"GROUP BY campus,courseid ORDER BY courseid";*/
				$query = "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}'" .
					"GROUP BY campus,courseid ORDER BY courseid";
				$head = array('campus','course','vs','vsu');
				break;
			}
			//7-mostrar per un quadrimestre tots els campus (N,-1,X)(C)
			if ($forq->campus == -1) {
				/*$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}'" .
					"GROUP BY campus,year,quat,courseid ORDER BY campus,courseid";*/
			/*	$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}'" .
					"GROUP BY campus,year,quat,courseid ORDER BY campus,courseid";*/
				$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}'" .
					"GROUP BY campus,year,quat,courseid ORDER BY campus,courseid";
				$head = array('quad','campus','course','vs','vsu');
				break;
			}
			//8-mostrar per un quadrimestre l'agregat dels campus (N,-2,X)
			if ($forq->campus == -2) {
			/*	$query = "SELECT courseid, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}'" .
					"GROUP BY year,quat,courseid ORDER BY courseid";*/
				/*$query = "SELECT courseid, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}'" .
					"GROUP BY year,quat,courseid ORDER BY courseid";*/
				$query = "SELECT courseid, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}'" .
					"GROUP BY year,quat,courseid ORDER BY courseid";
				$head = array('quad','course','vs','vsu');
				break;
			}
			//casos administrador i gestor
			//9-mostrar per un campus i quadri l'agregat (N,N,-2)(A)
			if ($forq->assig == -2) {
			/*	$query = "SELECT campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' " .
					"GROUP BY campus,year,quat ORDER BY vs";*/
				/*$query = "SELECT campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' " .
					"GROUP BY campus,year,quat ORDER BY vs";*/
				$query = "SELECT campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' " .
					"GROUP BY campus,year,quat ORDER BY vs";
				$head = array('quad','campus','vs','vsu');
				break;
			}
			//10-mostrar per un campus i quadri totes les assignatures (N,N,-1)(C)
			if ($forq->assig == -1) {
			/*	$query = "SELECT campus, year,quat,courseid,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' " .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";*/
				/*$query = "SELECT campus, year,quat,courseid,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' " .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";*/
				$query = "SELECT campus, year,quat,courseid,sum(visites) as vs, sum(visites_uniques) as vsu  FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' " .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";
				$head = array('quad','campus','course','vs','vsu');
				break;
			}
			
			//casos profe, admin i gestor
			//11-mostrar per un campus i quadri una assignatura (N,N,N)(A)
		/*	$query = "SELECT campus, year,quat,courseid,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' " .
					"AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' AND courseid={$forq->assig}" .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";*/
			/*$query = "SELECT campus, year,quat,courseid,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->entorn_nom}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' " .
					"AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' AND courseid={$forq->assig}" .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";*/
			$query = "SELECT campus, year,quat,courseid,sum(visites) as vs, sum(visites_uniques) as vsu FROM {$CFG->prefix}analytics_{$USER->id}_assig " .
					"WHERE time_start>={$forq->inici} AND time_end<={$forq->fi} AND campus='{$forq->campus}' " .
					"AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' AND courseid={$forq->assig}" .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";
			$head = array('quad','campus','course','vs','vsu');
			break;
		}
		
		//executem la query
		//print_object($forq);
//echo $query.'<br/>';	
		
		//aquestes consultes van sobre la base de dades local
		
		$result = get_recordset_sql($query);
		$data = array();
		//$dates_sql = array();
		$courses = array();
		
		while ($res = recordset_fetch ($result)) {
			//echo 'entro al bucle';
			//print_object($res);
			//posem la data a la primera posicio
			$row = array();
			if ($head[0]=='data') $row[] = date("Y/m/d", $forq->inici);
			//$row[] = date("Y/m/d", $forq->inici);
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
			$row[] = $res->vs;
			$row[] = $res->vsu;
			
			if (in_array('glog',$head)) {
				$row[] = $res->glog;
			}
			
	
			//$row[] = $res->gs;
			//$row[] = $res->mx;
			
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
		return isadmin();
	}
	
}
?>