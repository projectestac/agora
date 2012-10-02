<?PHP // $Id: index.php,v 1.1 2003/09/30 02:45:19 moodler Exp $

/// This page lists all the instances of NEWMODULE in a particular course
/// Replace NEWMODULE with the name of your module

	require_once("../../../../config.php");
	require_once "../../../../lib/dmllib.php";
	
    include_once "../../lib.php";

	require_login();
    if (!isadmin()) {
    	print_error('chooseenv','block_admin_service');
    }

    /*cris: preparem lentorn es a dir posem a adm les dades de connexio que ha triat lusuari*/
    $entorn = optional_param('entorn');
    if($entorn){
 		if(!preparar_entorn($entorn)){
    		print_error('noconfenv','block_admin_service');    
    	} 
    }
    
  $strindicadorss = get_string("modulenameplural", 'block_admin_service');
    $strconsult = get_string('consult_smoodle', 'block_admin_service');
    $title = get_string("rendiment",'block_admin_service');
    $nav_array = build_navigation(array(array('name'=>$title, 'link'=>'../index.php', 'type'=>'misc'),array('name'=>$strconsult, 'link'=>null, 'type'=>'misc')));
    print_header($ADM->site->shortname.": ". $strindicadorss,$ADM->site->fullname,$nav_array);

    print_heading($strconsult); 
  

//FUNCTIONS FOR THIS CONSULT
 $indform = optional_param('indform');
		$mes=date("n");
	$hoy=date("j");
	$any=date("Y");
	//print_object($indform);
	$table_consult->wrap = array ('nowrap');
	$table_consult->align = array ('center');
	$table_consult->width = '80%';
	//$timeInitial = $mes - 4;
	//$timeInitialAny = $any;
	$connexions = array();
	$connexions = entorns_disponibles();	
	
	$form ="<TABLE BORDER=\"0\" WIDTH=\"99%\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" >";
	$form.="<TR>";

	//$form.='<TD colspan="2">'.get_string('consult_smoodle', 'block_admin_service').'</TD></TR>';
	$form.='<tr><td colspan="2">&nbsp;</td></tr>';
	$form.= '<tr><td align="right"><b>'.get_string('select_clients','block_admin_service').'</b></td>';
	
	if($connexions){
		$form.= '<td align="left"><form action="view.php" method="post">' .
			'<select name="entorn" onChange="this.parentNode.submit();">';
		$form.='<option value="-1">'.get_string('select_clients','block_admin_service').'</option>';
		foreach($connexions as $connexio){
			$sel = ($connexio->id == $entorn)?' selected="selected"':'';
			$form.= '<option value="'.$connexio->id.'"'.$sel.'>'. $connexio->nom_client.'</option>';
		}
		$form.='</select>';
		$form.='</form>';
		$form.='</td>';
	}else{
		$form.= '<td align="left">'.get_string('noentornconfig','block_admin_service').'</td>';
	}
	$form.='<tr><td colspan="2">&nbsp;</td></tr><tr>';
	//$form.='<TD colspan="2">'.get_string('log_sessions', 'block_admin_service').'</TD></TR>';

	
	$form.='<TR><TD align="right">'.get_string('date','block_admin_service').':</td><td align="left">';			
	$form.='<FORM METHOD="POST" ACTION="view.php?id=1&option=tot">';
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
	/*if($timeInitial < 2){
		$timeInitialAny = $any-1;
	}*/
	for ($i=2006;$i<=date("Y") ;$i++){
		if($i == $any){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';	
	$form.='</TD></TR>';
	
	$form.='</TABLE><p>';
	$form.='<INPUT type ="submit" name= "indform[button]" value="'.get_string('search').'">
	<INPUT type ="hidden" name= "entorn" value="'.$entorn.'"><br />
	  		</FORM>';
	$row = array ($form);
	$rows[]=$row;
	$table_consult->data = $rows;
	$table_consult->width = '40%';
	print_table($table_consult);
	print_cerca($indform,$hoy,$mes,$any);
	    print_footer();
	    

function print_cerca($indform,$hoy,$mes,$any){
	global $CFG,$ADM;
	
	if (isset ($indform['button'])){
		//han demanat fer la consulta
		//	for($i=0;$i<=23;$i++){
		//ens cal haver seleccionat previament un entorn
		if (!isset ($ADM->entorn_actual)){
			print_error('chooseenv','block_admin_service');
		}
			
		$resultat = array();
		$rows = array();
	
		$mes = date ("m", mktime(0,0,0,$indform['mes_ini'],1,$indform['any_ini']));
		$start_time = $indform['any_ini'].'-'.$mes.'-'.$indform['dia_ini'];
				//$start_time = mktime(0,0,0,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				//$end_time = $indform['any_ini'].'-'.$indform['mes_ini'].'-'.$indform['dia_ini'].' 23:59:59';
				//$end_time = mktime(23,59,59,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				$resultat = calcularDades($start_time);
				if($resultat){
					
					foreach($resultat as $result){
						//$resultat = calcularReadWriteDiari($indform["module"],$start_time,$end_time);
						$row = array ($result->time_executed, $result->smoodle, $result->spostgres);
						$rows[]=$row;
					}
				}
			//}
			$table_consult = new stdClass;
			$table_consult->head= array (get_string('date', 'block_admin_service'), get_string('smoodle','block_admin_service'), get_string('spostgres','block_admin_service'));
			$table_consult->wrap = array ('nowrap','','');
			$table_consult->align = array ('center','center','center');
			$table_consult->data = $rows;
			$table_consult->width = '40%';
			print_table($table_consult);

	}
	
	
}	    
	    
function calcularDades($start_time){
	global $ADM,$CFG;
	$select = "select id,smoodle,spostgres, TO_CHAR(time_executed,'DD-MM-YYYY HH24:MI') as time_executed from {$CFG->prefix}analytics_{$ADM->entorn_actual->id}_sessions where time_executed >= to_date('00:00:00 $start_time', 'HH24:MI:SS yyyy-mm-dd')  and time_executed <= to_date('23:59:59 $start_time', 'HH24:MI:SS yyyy-mm-dd') order by time_executed asc";
	return get_records_sql($select);
	
}	    
?>