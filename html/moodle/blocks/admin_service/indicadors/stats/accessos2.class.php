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
		return "Aquest indicador mostra els usuaris no únics al curs de qualsevol tipus d'usuari";
	}
	
	/**
	 * mostra el contingut de la estadística
	 * @param: dades de la selecció de temps
	 */
	function contingut ($forq) {
		global $CFG;
		//print_object ($forq);
		//get_recordset_sql($sql)
		//llegenda
		//x-dades (quad,campus,assig) (format [Compacte, Ampliat])
		$cas = $forq->quad.'|'.$forq->campus;
		$format = 'C';
		//casos d'aministrador
		switch ($cas) {
		case '-2|-2':
			//1-mostrar per tota la plataforma (-2,-2,X)(A)
			$query = "SELECT courseid,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} " .
					"GROUP BY courseid ORDER BY courseid";
			$format = 'A';
			$head = array('data','course','vs','vsu','gs','mx');
			break;
		case '-1|-1':
			//2-mostrar tots els campus i tots els quadrimestres (-1,-1,X)(C)
			$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} " .
					"GROUP BY campus,year,quat,courseid ORDER BY year,quat,campus,courseid";
			$head = array('data','quad','campus','course','vs','vsu','gs','mx');
			break;
		case '-1|-2':
			//3-mostrar tots els quadrimestres pero l'agregat dels campus (-1,-2,X)(C)
			$query = "SELECT courseid, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} " .
					"GROUP BY year,quat,courseid ORDER BY year,quat,courseid";
			$head = array('data','quad','course','vs','vsu','gs','mx');
			break;
		case '-2|-1':
			//4-mostrar tots els campus però agregat per quadri (-2,-1,X)(C)
			$query = "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} " .
					"GROUP BY campus,courseid ORDER BY campus,courseid";
			$head = array('data','campus','course','vs','vsu','gs','mx');
			break;
		default:
			//5-mostrar per un campus tots els quadrimetres (-1,N,X)(C)
			if ($forq->quad == -1) {
				$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx  FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} AND campus='{$forq->campus}'" .
					"GROUP BY campus,year,quat,courseid ORDER BY year,quat,courseid";
				$head = array('data','quad','campus','course','vs','vsu','gs','mx');
				break;
			}
			//6-mostrar per un campus l'agregat dels quadrimestres (-2,N,X)
			if ($forq->quad == -2) {
				$query = "SELECT courseid, campus,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} AND campus='{$forq->campus}'" .
					"GROUP BY campus,courseid ORDER BY courseid";
				$head = array('data','campus','course','vs','vsu','gs','mx');
				break;
			}
			//7-mostrar per un quadrimestre tots els campus (N,-1,X)(C)
			if ($forq->campus == -1) {
				$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx  FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}'" .
					"GROUP BY campus,year,quat,courseid ORDER BY campus,courseid";
				$head = array('data','quad','campus','course','vs','vsu','gs','mx');
				break;
			}
			//8-mostrar per un quadrimestre l'agregat dels campus (N,-2,X)
			if ($forq->campus == -2) {
				$query = "SELECT courseid, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx  FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} AND year='{$forq->quadany}' AND quat='{$forq->quadquad}'" .
					"GROUP BY year,quat,courseid ORDER BY courseid";
				$head = array('data','quad','course','vs','vsu','gs','mx');
				break;
			}
			//casos administrador i gestor
			//9-mostrar per un campus i quadri l'agregat (N,N,-2)(A)
			if ($forq->assig == -2) {
				$query = "SELECT courseid, campus, year,quat,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' " .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";
				$head = array('data','quad','campus','course','vs','vsu','gs','mx');
				break;
			}
			//10-mostrar per un campus i quadri totes les assignatures (N,N,-1)(C)
			if ($forq->assig == -1) {
				$query = "SELECT campus, year,quat,courseid,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx  FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} AND campus='{$forq->campus}' AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' " .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";
				$head = array('data','quad','campus','course','vs','vsu','gs','mx');
				break;
			}
			
			//casos profe, admin i gestor
			//11-mostrar per un campus i quadri una assignatura (N,N,N)(A)
			$query = "SELECT campus, year,quat,courseid,sum(visites) as vs, sum(visites_uniques) as vsu, sum(guest) as gs, MAX(max) as mx  FROM {$CFG->prefix}assig " .
					"WHERE time_start>{$forq->inici} AND time_end<{$forq->fi} AND campus='{$forq->campus}' " .
					"AND year='{$forq->quadany}' AND quat='{$forq->quadquad}' AND courseid={$forq->assig}" .
					"GROUP BY campus,year,quat,courseid ORDER BY courseid";
			$head = array('data','quad','campus','course','vs','vsu','gs','mx');
			break;
		}
		
		//executem la query
		//echo $query.'<br/>';
		$result = get_recordset_sql($query);
		$data = array();
		//$dates_sql = array();
		$courses = array();
		
		while ($res = recordset_fetch ($result)) {
			//print_object($res);
			//posem la data a la primera posicio
			$row = array();
			$row[] = date("Y/m/d", $forq->inici);
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
			$row[] = $res->gs;
			$row[] = $res->mx;
			
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
		return isadminps();
	}
	
}
?>