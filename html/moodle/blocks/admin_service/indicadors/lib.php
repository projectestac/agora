<?php
//funcions auxiliar que seran globals

/**
 * Fa fetch
 */
function recordset_fetch (&$rs) {
    if ($rs) {
        if ($record = $rs->FetchRow()) {
            if ($record) {
                $res = (object) $record;
                return $res;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/**
 * tanca la connexió
 */
function recordset_close (&$rs) {
	if ($rs) $rs->Close();
}

/**
 * retorna el shortname d'una assig o fals
 * @param int $courseid
 * @return String o fals
 */
function get_assig_shortname ($courseid) {
	$res = '';
	$rec = get_record ('course_upc','id_course',$courseid);
	if ($rec) {
		$res.= $rec->centre.'-'.$rec->assignatura;
		if ($rec->metacurs) $res.= '-MC'.$rec->metacurs;
		$res.= '-CU'.$rec->curs;
	}
	return $res;
}

//funcions logiques

/**
 * retorna la forquilla actual
 * @return forquilla
 */
function get_forquilla () {
	global $USER;
	return $USER->forquilla;
}

/**
 * configura la forquilla de temps
 */
function configura_forquilla () {
	global $USER;
	//captura d'una forquilla per post
	/*Array
		(
		    [indform] => Array
		        (
		            [dia_ini] => 1
		            [mes_ini] => 5
		            [any_ini] => 2006
		            [dia_fin] => 8
		            [mes_fin] => 12
		            [any_fin] => 2008
		            [granul] => 1
		            [tot] => 
		        )
		
		    [selquad] => 85
		    [selcampus] => FIB
		    [selassig] => 12950
		)*/
		
		
		
	if (!isset($USER->forquilla)) $USER->forquilla = new stdClass;
	
	//mirem si vol redefinir els timestamps
	$indform = optional_param ('indform');
	if ($indform) {
		//Comprobació del dia de final de mes
		$any_cmp = $indform['any_fin'];
		$mes_cmp = $indform['mes_fin'];
		$hoy_cmp = $indform['dia_fin'];
		if ($mes_cmp == 2){
			if($hoy_cmp > 28){
				$indform['dia_fin'] = date('t', mktime(0,0,0,$mes_cmp,1,$any_cmp));
			}
		}else if ($hoy_cmp == 31){
			$indform['dia_fin'] = date('t', mktime(0,0,0,$mes_cmp,1,$any_cmp));
		}
		
		$USER->forquilla->fi = mktime(23,59,59,$indform['mes_fin'],$indform['dia_fin'],$indform['any_fin']);
		$USER->forquilla->inici = mktime(0,0,0,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
		$USER->forquilla->gra = (isset($indform['granul']))?$indform['granul']:1;
	} else {
		//si no te stamps, els posem
		if (!isset($USER->forquilla->fi)) $USER->forquilla->fi = time();
		if (!isset($USER->forquilla->inici)) $USER->forquilla->inici = mktime(0,0,0,date('n',$USER->forquilla->fi),1,date('Y',$USER->forquilla->fi));
		//time()-90*24*3600;
		$USER->forquilla->gra = 1;
	}
	//mirem les opreacions especials
	$mes = optional_param('mes');
	if ($mes) {
		//agafem el nombre de dies els mesos d'inici i fi
		$mes_fi=date('n',$USER->forquilla->fi);
		$hoy_fi=date('j',$USER->forquilla->fi);
		$any_fi=date('Y',$USER->forquilla->fi);
		$mes_inici=date('n',$USER->forquilla->inici);
		$hoy_inici=date('j',$USER->forquilla->inici);
		$any_inici=date('Y',$USER->forquilla->inici);
		//echo "$dies_fi+$dies_inici";
		switch ($mes) {
			case 'mes':
				$USER->forquilla->fi = mktime(23,59,59,$mes_fi+1,$hoy_fi,$any_fi);
				$USER->forquilla->inici = mktime(0,0,0,$mes_inici+1,$hoy_inici,$any_inici);
				break;
			case 'menys':
				$USER->forquilla->fi = mktime(23,59,59,$mes_fi-1,$hoy_fi,$any_fi);
				$USER->forquilla->inici = mktime(0,0,0,$mes_inici-1,$hoy_inici,$any_inici);
				break;
		}
	}
	
	//si seleccionen suport antea o qualsevol curs daquesta categoria ens quedem amb ell
	//si no esta definida es la primera vegada la inicialitzem
	if(!isset($USER->forquilla->suport))$USER->forquilla->suport = -1;
	//mirem si no es la primera vegad i ens arriba un valor
		$selcat = optional_param('selcat');
		if($selcat){
			$USER->forquilla->campus = -3;
			$USER->forquilla->quad = -3;
			$USER->forquilla->suport = $selcat;
		}
	if($USER->forquilla->suport == -1){
	
	//mirem si vol redefinir el campus
	$selquad = optional_param('selquad');
	if ($selquad) {
		if (is_numeric($selquad) && $selquad>=0) {
			$USER->forquilla->quadid = $selquad;
			$selquad_row = get_record ('course_categories','id',$selquad);
			if ($selquad_row) $selquad = $selquad_row->name;
		} else {
			//ha posat tots o agregat
			$USER->forquilla->quadid = false;
		}
		$USER->forquilla->quad = $selquad;
	}
	$selcampus = optional_param('selcampus');
	if ($selcampus) {
		if (is_numeric($selcampus) && $selcampus>=0) {
			$USER->forquilla->campusid = $selcampus;
			$selcampus_row = get_record ('course_categories','id',$selcampus);
			if ($selcampus_row) {
				$selcampus = strtoupper($selcampus_row->name);
				//si es numéric, mana sobre el quadrimestre també (gestor)
				$selquad_row = get_record ('course_categories','id',$selcampus_row->parent);
				if ($selquad_row) {
					$USER->forquilla->quad = $selquad_row->name;
					$USER->forquilla->quadid = $selquad_row->id;
				}
			}
		} else {
			$USER->forquilla->campusid = false;
		}
		$USER->forquilla->campus = $selcampus;
	}
	
	$selassig = optional_param('selassig');
	if ($selassig) {
		$USER->forquilla->assig = $selassig;
		//l'assingatura ens ho indica tot
		if (is_numeric($selassig) && $selassig>0) {
			$assig = get_record ('course','id',$selassig);
			if ($assig) {
				$selcampus_row = get_record ('course_categories','id',$assig->id);
				if ($selcampus_row) {
					$USER->forquilla->campus = strtoupper($selcampus_row->name);
					$selquad_row = get_record ('course_categories','id',$selcampus_row->parent);
					if ($selquad_row) {
						$USER->forquilla->quad = $selquad_row->name;
						$USER->forquilla->quadid = $selquad_row->id;
					}
				}
			}
		}
	}
	
	//cris: originalment aquests dos valors estaven inicialitzats a -3 
	//alguns valors per si algun cas
	if (!isset($USER->forquilla->campus)) $USER->forquilla->campus = -2;
	if (!isset($USER->forquilla->quad)) $USER->forquilla->quad = -2;
	
	//mantenim algunes coherencies
	if ($USER->forquilla->campus<0) $USER->forquilla->campusid = false;
	if ($USER->forquilla->quad <0) $USER->forquilla->quadid = false;
	if ($USER->forquilla->campusid == false) $USER->forquilla->quadid = false;
	//echo 'forquilla ini';
	//print_object($USER->forquilla);
	if ($USER->forquilla->campusid == false && !isadmin()) {
		if (isgestor()) {
			//echo 'isgestor';
			//print_object($USER->forquilla);
			//en cas que sigui gestor i no ens passi un campus, n'hi posem un
			$campus = get_campus_gestor(false,false);
			//echo 'campus';
			//print_object($campus);
			$quadcamp = get_quadscampus ($campus);
			//echo 'quad';
			//print_object($quadcamp);
			$ids = array_keys($quadcamp);
			$selcampus = $ids[0];
			if ($selcampus) {
				if (is_numeric($selcampus) && $selcampus>=0) {
					$USER->forquilla->campusid = $selcampus;
					$selcampus_row = get_record ('course_categories','id',$selcampus);
					if ($selcampus_row) {
						$selcampus = strtoupper($selcampus_row->name);
						//si es numéric, mana sobre el quadrimestre també (gestor)
						$selquad_row = get_record ('course_categories','id',$selcampus_row->parent);
						if ($selquad_row) {
							$USER->forquilla->quad = $selquad_row->name;
							$USER->forquilla->quadid = $selquad_row->id;
						}
					}
				} else {
					$USER->forquilla->campusid = false;
				}
				$USER->forquilla->campus = $selcampus;
			}
		} elseif (isteacherinanycourse()) {
			//es profe, nomes posem les seves assigns en un desplegable
			//agafem la llista de les assignatures
			if ($teachers = get_records('user_teachers', 'userid', $USER->id, '', 'course desc')) {
		        $asign = array_pop($teachers);
				$selassig = $asign->id;
				$USER->forquilla->assig = $selassig;
				//l'assingatura ens ho indica tot
				if (is_numeric($selassig) && $selassig>0) {
					$assig = get_record ('course','id',$selassig);
					if ($assig) {
						$selcampus_row = get_record ('course_categories','id',$assig->id);
						if ($selcampus_row) {
							$USER->forquilla->campus = strtoupper($selcampus_row->name);
							$selquad_row = get_record ('course_categories','id',$selcampus_row->parent);
							if ($selquad_row) {
								$USER->forquilla->quad = $selquad_row->name;
								$USER->forquilla->quadid = $selquad_row->id;
							}
						}
					}
				}
		    }
			
		}
	} else {
		if ($USER->forquilla->campus == false) {
			$USER->forquilla->campus = -2;
			$USER->forquilla->quad = -2;
		}
	}
	
	//montem els qadrimestre bé
	if (!is_numeric($USER->forquilla->quad)) {
		$parts = explode('-',$USER->forquilla->quad);
		if (count($parts)>1) {
			$USER->forquilla->quadany = $parts[0];
			$USER->forquilla->quadquad = $parts[1];
		}
	}
	}//fi del meu if
	
	if (!isset($USER->forquilla->assig)) {
		$USER->forquilla->assig = false;
	}
	
	
}

/**
 * retorna la url a l'stat actual
 * @param String $params: els parametres per GET
 * @return String
 */
function get_current_stat_url ($params=false) {
	global $CFG;
	$res = $CFG->wwwroot.'/blocks/admin_service/indicadors/index.php';
	$stat = optional_param ('stat');
	if ($stat) {
		$res.='?stat='.$stat;
		if ($params) $res.='&amp;'.$params;
	} else {
		if ($params) $res.='?'.$params;
	}
	return $res;
}

//funcions grafiques

/**
 * importa prototype
 */
function importa_prototype () {
	global $CFG;
	echo '<script type="text/javascript" src="' .$CFG->wwwroot.
		'/blocks/admin_service/indicadors/js/prototype.js"></script>';
	echo '<script type="text/javascript" src="' .$CFG->wwwroot.
		'/blocks/admin_service/indicadors/js/controls.js"></script>';
}


/*
 * retorna la part del formulari destinada a seleccionar lentorn que es vol consultar
 * 
 */

function get_selector_entorns(){
	global $USER;
	$connexions = array();
	$connexions = entorns_disponibles();
	$text = '<table><tr><td>';
		$text .= '<b>'.get_string('select_clients','block_admin_service').'</b><td>';
	if($connexions){
		
		$text.= '<td>' .
				'<select name="entorn" >';
		$text.='<option value="-1">'.get_string('select_clients','block_admin_service').'</option>';
		foreach($connexions as $connexio){
			$sel = ($connexio->id == $USER->id)?' selected="selected"':'';
			$text.= '<option value="'.$connexio->id.'"'.$sel.'>'. $connexio->nom_client.'</option>';
		}
		
	}else{
		//encara no tenim cap entorn configurat
		$text .= '<td>'.get_string('noentornconfig','block_admin_service').'</td>';
	}
	$text.='</select>';
	$text.= '</td></tr></table>';
	return $text;
}

/**
 * retorna la part del formulari destinada a seleccionar la forquilla de temps
 * @return String
 */
function get_selector_temps () {
	global $USER;
	
	$mes=date("n",$USER->forquilla->inici);
	$hoy=date("j",$USER->forquilla->inici);
	$any=date("Y",$USER->forquilla->inici);
	
	$mes_fi=date("n",$USER->forquilla->fi);
	$hoy_fi=date("j",$USER->forquilla->fi);
	$any_fi=date("Y",$USER->forquilla->fi);

	$indform = optional_param ('indform');
	//print_object($indform);
	
	$form = $res = '<h3>Dates:</h3><br/>'.get_string('gran_all_from','block_admin_service');			
	//$form.='<FORM METHOD="POST" ACTION="index.php?id=1&option=tot">';
	$form.='<SELECT name= "indform[dia_ini]">';
	if (isset ($indform['button'])){
		$hoy = $indform['dia_ini'];
	}
	for ($i=1;$i<=31 ;$i++){
		
		if($i == $hoy){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';
	$form.='<SELECT name= "indform[mes_ini]">';
	if (isset ($indform['button'])){
		$mes = $indform['mes_ini'];
	}
	for ($i=1;$i<=12 ;$i++){
		if($i == $mes){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.get_string(date("F",mktime(0,0,0,$mes,$hoy,$any)), 'block_admin_service').'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.get_string(date("F",mktime(0,0,0,$i,1,$any)), 'block_admin_service').'</OPTION>';
		}
	}	
	$form.='</SELECT>';
	$form.='<SELECT name= "indform[any_ini]">';
	if (isset ($indform['button'])){
		$any = $indform['any_ini'];
	}
	for ($i=2006;$i<=date("Y") ;$i++){
		if($i == $any){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';	
	$form.='<br/>';
	$form.=get_string('gran_all_to', 'block_admin_service');
	$form.='<SELECT name= "indform[dia_fin]">';
	if (isset ($indform['button'])){
		$hoy_fi = $indform['dia_fin'];
	}
	for ($i=1;$i<=31 ;$i++){
		if($i == $hoy_fi){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';
	$form.='<SELECT name= "indform[mes_fin]">';
	if (isset ($indform['button'])){
		$mes_fi = $indform['mes_fin'];
	}
	for ($i=1;$i<=12 ;$i++){
		if($i == $mes_fi){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.get_string(date('F',mktime(0,0,0,$mes_fi,$hoy_fi,$any_fi)),'block_admin_service').'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.get_string(date('F',mktime(0,0,0,$i,1,$any_fi)),'block_admin_service').'</OPTION>';
		}
	}	
	$form.='</SELECT>';
	$form.='<SELECT name= "indform[any_fin]">';
	if (isset ($indform['button'])){
		$any_fi = $indform['any_fin'];
	}
	for ($i=2006;$i<=date("Y") ;$i++){
		if($i == $any_fi){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';
	$form.='<br/>';
	/*$form.= get_string('gran_all_with', 'block_admin_service');
	$form.='<SELECT name= "indform[granul]">';
	if (isset ($indform['button'])){
		if($indform['granul']==3){
			$form.='<OPTION VALUE="1">'.get_string('day', 'block_admin_service').'</OPTION>';
			$form.='<OPTION VALUE="2">'.get_string('month', 'block_admin_service').'</OPTION>';
			//$form.='<OPTION SELECTED VALUE="3">'.get_string('year', 'block_admin_service').'</OPTION>';
		}else if($indform['granul']==2){
			$form.='<OPTION VALUE="1">'.get_string('day', 'block_admin_service').'</OPTION>';
			$form.='<OPTION SELECTED VALUE="2">'.get_string('month', 'block_admin_service').'</OPTION>';
			//$form.='<OPTION VALUE="3">'.get_string('year', 'block_admin_service').'</OPTION>';
		}else{	
			$form.='<OPTION SELECTED VALUE="1">'.get_string('day', 'block_admin_service').'</OPTION>';
			$form.='<OPTION VALUE="2">'.get_string('month', 'block_admin_service').'</OPTION>';
			//$form.='<OPTION VALUE="3">'.get_string('year', 'block_admin_service').'</OPTION>';			
		}	
	}else{
		$form.='<OPTION VALUE="1">'.get_string('day', 'block_admin_service').'</OPTION>';
		$form.='<OPTION SELECTED VALUE="2">'.get_string('month', 'block_admin_service').'</OPTION>';
		//$form.='<OPTION VALUE="3">'.get_string('year', 'block_admin_service').'</OPTION>';	
	}
	$form.='</SELECT>';*/
	$form.='<br/>';
	$form.='<INPUT type ="hidden" name= "indform[tot]"">';
	//$form.='<INPUT type ="submit" name= "indform[button]" value="'.get_string('search').'"><br />';
	//$form.='</FORM>';
	
	return $form;
}

/**
 * retorna el selector de filtres
 * @return String
 */
function get_selector_filtres () {
	global $CFG,$USER;
	
	
	
	$forq = get_forquilla();
	//si es admin mostra un quadri / tot els campus / mostrar filtre assigs
	//si es gestor un quadri + campus seus / mostrar filtre assigs
	//si es profe només assigs
	$res = '<h3>Filtre:</h3>';
	$ajaxurl = $CFG->wwwroot.'/blocks/admin_service/indicadors/selector.php';
	$ajaxurl = 'selector.php';
	if (isadmin()) {
		//posem el chachi selector de quadri amb campus anidad amb assig anidad
		//agafem la llista dels quadri i hi afegim el de tots
		$quads = get_records("course_categories","parent",0);
		
		//les seleccions
		if (isset($forq->quad)) {
			$selquad= $forq->quad;
			$totsquad= ($forq->quad==-1)?' selected':'';
			$agrquad= ($forq->quad==-2)?' selected':'';
			
		} else {
			$selquad='';
			$totsquad='';
			$agrquad='';
		}
		$res.= '<div id="selector_principal">';
		$res.= 'Selecció de quadrimestre: <select id="sq" name="selquad" ' .
				'onChange="carregaElement (\'selassig\',\''.$ajaxurl.'\',' .
						'\'elquad=\'+this.value+\'&elcamp=\'+document.getElementById(\'sc\').value);">';
		
		$res.= '<option value="-2"'.$agrquad.'>Agregat</option>';
		$res.= '<option value="-1"'.$totsquad.'>Tots</option>';
		
		$primer = -1;
		foreach ($quads as $qkey => $qnom) {
			if (preg_match('/[0-9]*\\/[0-9]*\\-[0-0]*/',$qnom->name)) {
				$sel = ($selquad==$qnom->name)?' selected':'';
				$res.= '<option'.$sel.' value="'.$qkey.'">'.$qnom->name.'</option>';
				if ($primer<0) $primer = $qkey;
			}
		}
		$res.= '</select>';

		//agafem els campus
		if (isset($forq->quad)) {
			$selcampus= $forq->campus;
			$totscampus= ($forq->campus==-1)?' selected':'';
			$agrcampus= ($forq->campus==-2)?' selected':'';
		} else {
			$selcampus='';
			$totscampus='';
			$agrcampus='';
		}
		$campus = get_records ('course_categories','parent',$primer);
		$res.="<div id=\"selcampus\">\n";
		//selector campus buit a l'inici (a dins hi haura el de assig)
		$res.= 'Selecció de campus: <select id="sc" name="selcampus" ' .
				'onChange="carregaElement (\'selassig\',\''.$ajaxurl.'\',' .
						'\'elcamp=\'+this.value+\'&elquad=\'+document.getElementById(\'sq\').value);">';
		$res.= '<option value="-2"'.$agrcampus.'>Agregat</option>';
		$res.= '<option value="-1"'.$totscampus.'>Tots</option>';
		foreach ($campus as $camp){
			$nom = strtoupper($camp->name);
			$sel = ($selcampus==$nom)?' selected':'';
			$res.= '<option value="'.$nom.'"'.$sel.'>'.$nom.'</option>';
		}
		$res.= "</select>\n";
		$res.='<div id="selassig">';
		//selector campus buit a l'inici (a dins hi haura el de assig)
		$res.= '</div>';
		$res.= '</div>';
		//posem l'script per veure l'assig
		if ($selcampus!=-2 && $selcampus!=-1 && $selquad!=-2 &&  $selquad!=-1) {
			$res.= '<script type="text/javascript">
						carregaElement (\'selassig\',\''.$ajaxurl.'\',' .
							'\'elcamp=\'+document.getElementById(\'sc\').value' .
							'+\'&elquad=\'+document.getElementById(\'sq\').value+\'&elassig='.$forq->assig.'\');
							</script>';
		}
		
		//selector per a suport i documentació atenea
		$suport = get_records ('course','category',22);//agafo tots els cursos de la categoria 22
		if (isset($forq->suport)) {
			$selcat= $forq->suport;
		} else {
			$selcat='';
		}
		$res.= '</div>';
		$res.="<div id=\"selespecial\">\n";
		$res.= 'Categoria: <select id="ss" name="selcat" ' .
				'onChange="visible_indicadors(\'selector_principal\',(this.value==-1));">';
		$selecciona = ($selcat == -1)?'selected':'';
		$res.= '<option value="-1" '.$selecciona.'>------</option>';
		$nomcatsuport = get_record('course_categories','id',22);//agafo el nom de la categoria pare
		$selecciona = ($selcat == -2)?'selected':'';
		$res.= '<option value="-2" '.$selecciona.'>'.$nomcatsuport->name.'</option>';
		foreach ($suport as $sprt){
			$sel = ($selcat==$sprt->id)?' selected':'';
			$res.= '<option value="'.$sprt->id.'"'.$sel.'>'.$sprt->fullname.'</option>';
		}
		
		$res.= '<script type="text/javascript">
						visible_indicadors(\'selector_principal\',(document.getElementById(\'ss\').value==-1));
					</script>';
		
		$res.= "</select>\n";
		$res.= '</div>';
		
	} elseif (isgestor()) {
		//posem el chachi selector de quadri+campus amb l'assig anidada
		//agafem la llista de campus del gestor
		$campus = get_campus_gestor(false,false);
		$campus = get_quadscampus ($campus);
		
		if (isset($forq->campusid)) {
			$selcampus= $forq->campusid;
		} else {
			$selcampus='';
		}
		
		$res.= 'Selecció de campus/quatrimestre: <select id="sqi" name="selcampus" onChange="carregaElement (\'selassig\',\''.$ajaxurl.'\',\'selcampus=\'+this.value);">';
		//$res.= '<option value="-1">Tots</option>';
		foreach ($campus as $id=>$nom){
			$sel = ($selcampus==$id)?' selected':'';
			$res.= '<option value="'.$id.'"'.$sel.'>'.$nom.'</option>';
		}
		$res.= '</select>';
		$res.='<div id="selassig">';
		//selector campus buit a l'inici (a dins hi haura el de assig)
		$res.= '</div>';
		$res.= '<script type="text/javascript">
					carregaElement (\'selassig\',\''.$ajaxurl.'\',' .
						'\'selcampus=\'+document.getElementById(\'sqi\').value+\'&elassig='.$forq->assig.'\');
						</script>';
	} elseif (isteacherinanycourse()) {
		//es profe, nomes posem les seves assigns en un desplegable
		//agafem la llista de les assignatures
		$profes = get_rols_profes ();
		$profes[] = get_rol_coordinador(false);
		$teachers = get_records_select ('role_assignments',"userid=$USER->id AND roleid IN ('".implode("','",$profes)."')");
		//$teachers = get_records('user_teachers', 'userid', $USER->id, '', 'id, course')
		if ($teachers) {
	        $course = array();
	        foreach ($teachers as $teacher) {
	            $ctx = get_record ('context','id',$teacher->contextid);
	            if ($ctx && $ctx->contextlevel==CONTEXT_COURSE) {
	        		$course[$teacher->course] = $ctx->instanceid;
	            }
	        }
	        $courseids = implode(',', $course);
	    	$courses = get_records_list('course', 'id', $courseids, 'id');
	    	
	    	$res.= 'Selecció d\'assignatura: <select name="selassig">';
			//$res.= '<option value="-1">Totes</option>';
			foreach ($courses as $curs){
				//agafem el course_upc
				$cupc = get_record ('course_upc','id_course',$curs->id);
				if ($cupc) {
					$res.= '<option value="'.$curs->id.'">'.$cupc->anyacad.'-'.
						$cupc->quatrimestre.' '.$cupc->centre.': '.$curs->fullname.'</option>';
				}
			}
			$res.= '</select>';
	    }
		
	}
	return $res;
}

/**
 * retorna un assiciatiu de id => nom de les categories i campus
 * @param $campus: array de noms de campus
 * @param $primer=false: nomes retorna el nom del primer (sense id)
 * @return array associatiu id=>nom
 */
function get_quadscampus ($campus) {
	global $CFG;
	if (!is_array($campus)) $campus = array($campus);
	array_walk($campus,'metoupper');
	$sel = 'name in (\''.implode("','",$campus).'\')';
	//print_object ($campus);
	$cats = get_records_select('course_categories', $sel, 'id desc');
	$parents = array();
	//print_object ($cats);
	$res = array();
	foreach ($cats as $cat) {
		if (!isset($parent[$cat->parent])) {
			$p = get_record ('course_categories','id',$cat->parent);
			if ($p) {
				$parents[$cat->parent] = $p->name;
			} else {
				$parents[$cat->parent] = '';
			}
		}
		$res[$cat->id] = $parents[$cat->parent].': '.$cat->name;
	}
	
	return $res;
}
/**
 * funcio auxiliar per fer strtoupper a un array amb array_walk
 */
function metoupper (&$val) {
	$val = strtoupper($val);
}
/**
 * retorna el gra i la forquilla de temps actuals de forma visual
 * @return String
 */
function print_forquilla ($dia = true) {
	global $USER;
	
	if(!isset($USER->id))$USER->id = -1;
	if(!isset($USER->entorn_nom)){
		$USER->entorn_nom = get_string('noentorn','block_admin_service');
		
	}
	
	
	
	$forquilla = get_forquilla();
	//echo 'laforquilla inicial';
	//print_object($forquilla);
	echo '<table border="0" width="100%" align="center"><tr>';
	//echo '<td align="right"><a href="'.get_current_stat_url('mes=menys').'">MES<BR/>ANTERIOR<BR/>&lt;&lt;&lt;</a></td>';
	echo '<td widht="100%" align="center">';
	//echo '<b>'.get_string('gran_all_from','block_admin_service').'</b>'.userdate($forquilla->inici).'<br/>';
	//echo '<b>'.get_string('gran_all_to', 'block_admin_service').'</b>'.userdate($forquilla->fi).'<br/>';
	if ($dia){
		echo '<b>'.get_string('gran_all_from','block_admin_service').'</b>'.userdate($forquilla->inici, get_string('strftimedaydate')).'<br/>';
		echo '<b>'.get_string('gran_all_to', 'block_admin_service').'</b>'.userdate($forquilla->fi, get_string('strftimedaydate')).'<br/>';	
	}else{
		echo '<b>'.get_string('gran_all_from','block_admin_service').'</b>'.userdate($forquilla->inici, get_string('strftimemonthyear')).'<br/>';
		echo '<b>'.get_string('gran_all_to', 'block_admin_service').'</b>'.userdate($forquilla->fi, get_string('strftimemonthyear')).'<br/>';
	}
	
	
	if($forquilla->suport == -1){
		if ($forquilla->campus==-2) $forquilla->campus = 'Agregar';
		if ($forquilla->campus==-1) $forquilla->campus = 'Tots';
		echo '<b>'.get_string('campus','block_admin_service').':</b> '.$forquilla->campus.'<br/>';
		if ($forquilla->quad==-2) $forquilla->quad = 'Agregar';
		if ($forquilla->quad==-1) $forquilla->quad = 'Tots';
		echo '<b>Quadrimestre:</b> '.$forquilla->quad.'<br/>';
	} else {
		//busco el nom del curs o de la categoria
		if($forquilla->suport == -2){
			$nomcatsuport = get_record('course_categories','id',22);
			$nomsuport = $nomcatsuport->name;	
		}else{
			$nomcurssuport = get_record('course','category',22,'id',$forquilla->suport);
			$nomsuport = $nomcurssuport->fullname;
		}
		echo '<b>Especials:&nbsp;</b>'.stripslashes($nomsuport).'';
	}
	//imprimim a on estem connectats
	if($USER->id && $USER->id != -1)
		echo '</br><b>Entorn:</b> '.$USER->entorn_nom.'</br>';
		//echo get_selector_entorns();
	else
		echo '</br><b>Entorn:</b> No hi ha cap entorn seleccionat</br>';
	
	
	echo '</td>';
	//echo '<td align="left"><a href="'.get_current_stat_url('mes=mes').'">MES<BR/>SEGÜENT<BR/>&gt;&gt;&gt;</a></td>';
	echo '</tr>';
	echo '</table>';
	
}

/**
 * obre la taula
 */
function obre_taula () {
	echo "\n".
			'<table width="80%" border="0" align="center"  ' .
			'cellpadding="5" cellspacing="1" class="generaltable" >';
}

/**
 * afegeix una fila a la taula
 * @param $data
 */
function afegeix_fila ($data) {
	echo '<tr class="r1">';
	echo '<td  align="center" nowrap="nowrap"  class="cell c0">'
		.implode('</td><td  align="center" nowrap="nowrap"  class="cell c0">',$data).'</td>';
	echo "</tr>\n";
	//print_object($data);
}

/**
 * afegeix una capçalera a la taula
 */
function afegeix_capcalera ($data) {
	echo '<tr class="r0">';
	echo '<th valign="top"  align="center" nowrap="nowrap" class="header c0">'
		.implode('</th><th valign="top"  align="center" nowrap="nowrap" class="header c0">',$data).'</th>';
	echo "</tr>\n";
}
/**
 * tanca la taula
 */
function tanca_taula () {
	echo "</table>\n";
}

?>