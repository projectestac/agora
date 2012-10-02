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


  $strindicadorss = get_string("modulenameplural", 'block_admin_service');
    $strconsult = get_string('log_activitats', 'block_admin_service');
    $title = get_string("rendiment",'block_admin_service');
    $nav_array = build_navigation(array(array('name'=>$title, 'link'=>'../index.php', 'type'=>'misc'),array('name'=>$strconsult, 'link'=>null, 'type'=>'misc')));
    print_header($ADM->site->shortname.": ". $strindicadorss,$ADM->site->fullname,$nav_array);

    print_heading($strconsult); 
    
/*	echo '<br />';
	print_simple_box_start( 'center', '90%', '', '20');
	
	$path= $CFG->dataroot.'/activitat_sessions';
	$fitxers = dir_files ($path);
	sort($fitxers);
	foreach($fitxers as $fitxer){
		//muntem el link	
		$fila =link_to_popup_window ($CFG->wwwroot.'/mod/admin_upc/importacio/file_admupc.php?file=/activitat_sessions/'.$fitxer, "Fitxer",
	                                          $fitxer,600, 800, 'missatge','none',true);
		$row=  array($fila);
		$rows[]=$row;
	}
		echo'<br />';
 	//Montem la taula per els usuaris que treballen concurrentment
	$table->head= array ('Fitxers');
	$table->wrap = array ('nowrap');
	$table->align = array ('left');
	$table->data = $rows;
	$table->width = '60%';
	print_table($table);
	
	echo'<br />';
	print_simple_box_end();
	
		
/// Finish the page

    print_footer();*/

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
		
	
	$form ="<TABLE BORDER=\"0\" WIDTH=\"99%\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" >";
	$form.="<TR>";
	$form.='<TD colspan="2">'.get_string('log_activitats', 'block_admin_service').'</TD></TR>';

	
	$form.='<TR><TD width="50%" align="right">'.get_string('date','block_admin_service').':</td><td align="left">';		
	$form.='<FORM METHOD="POST" ACTION="view.php?id=1&option=tot">';
	/*$form.='<SELECT name= "indform[dia_ini]">';
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
	$form.='</SELECT>';*/
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
	for ($i=2010;$i<=date("Y") ;$i++){
		if($i == $any){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';	
	$form.='</TD></TR>';
	
	$form.='<TR><TD width="50%" align="right">'.get_string('server_name','block_admin_service').':</td><td align="left">';
	$form.='<SELECT name= "indform[be]">';
	$be = 0;
	if (isset ($indform['button'])){
		$be = $indform['be'];
	}
	if($be == 0){
		$form.='<OPTION SELECTED VALUE="0">'.get_string('all','block_admin_service').'</OPTION>';
		$form.='<OPTION VALUE="1">'.get_field('analytics', 'server_name', 'nom', 'ADMIN_SERVER').'</OPTION>';
		$form.='<OPTION VALUE="2">'.get_field('analytics', 'server_name', 'nom', 'ADMIN_SERVER2').'</OPTION>';
	}else if ($be == 1){
		$form.='<OPTION VALUE="0">'.get_string('all','block_admin_service').'</OPTION>';
		$form.='<OPTION SELECTED VALUE="1">'.get_field('analytics', 'server_name', 'nom', 'ADMIN_SERVER').'</OPTION>';
		$form.='<OPTION VALUE="2">'.get_field('analytics', 'server_name', 'nom', 'ADMIN_SERVER2').'</OPTION>';
	}else if ($be == 2){
		$form.='<OPTION VALUE="0">'.get_string('all','block_admin_service').'</OPTION>';
		$form.='<OPTION VALUE="1">'.get_field('analytics', 'server_name', 'nom', 'ADMIN_SERVER').'</OPTION>';
		$form.='<OPTION SELECTED VALUE="2">'.get_field('analytics', 'server_name', 'nom', 'ADMIN_SERVER2').'</OPTION>';
	}
	$form.='</SELECT>';	
	$form.='</TD></TR>';
	$form.='</TABLE><p>';
	$form.='<INPUT type ="submit" name= "indform[button]" value="'.get_string('search').'">
	  		</FORM>';
	//<INPUT type ="hidden" name= "entorn" value="'.$entorn.'"><br />
	
	$row = array ($form);
	$rows[]=$row;
	$table_consult->data = $rows;
	$table_consult->width = '60%';
	print_table($table_consult);
	print_cerca($indform,$hoy,$mes,$any);
	print_footer();
	    

function print_cerca($indform,$hoy,$mes,$any){
	global $CFG;
	
	
	if (isset ($indform['button'])){
		//han demanat fer la consulta
		//	for($i=0;$i<=23;$i++){
		//print_object($indform);
		$rows = array();
		$be = false;
		if ($indform['be'] == 1){
			$be = get_field('analytics', 'server_name', 'nom', 'ADMIN_SERVER');
		}else if ($indform['be'] == 2){
			$be = get_field('analytics', 'server_name', 'nom', 'ADMIN_SERVER2');
		}
		 	$mes = date ("m", mktime(0,0,0,$indform['mes_ini'],1,$indform['any_ini']));
			//$start_time = $indform['any_ini'].'-'.$indform['mes_ini'].'-'.$indform['dia_ini'];
			$dia = date ("t", mktime(0,0,0,$indform['mes_ini'],1,$indform['any_ini']));
			//$dia++;//Fin de dia
			$start_time = '00:00:00 01/'.$mes.'/'.$indform['any_ini'];
			$mes = date ("m", mktime(0,0,0,$indform['mes_ini']+1,1,$indform['any_ini']));
			$end_time = '00:00:00 01/'.$mes.'/'.$indform['any_ini'];
			//	$start_time = mktime(0,0,0,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
			//	$end_time = mktime(23,59,59,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				$resultat = calcularDades($start_time, $end_time, $be);
				if($resultat){
					foreach($resultat as $result){
						//$resultat = calcularReadWriteDiari($indform["module"],$start_time,$end_time);
						$row = array ($result->time_executed, $result->server_name, $result->postgres,$result->idle,$result->c1, $result->c5, $result->c15);
						$rows[]=$row;
					}
				}
			//}
			$table_consult = new stdClass;
			$table_consult->head= array (get_string('date', 'block_admin_service'), get_string('server_name','block_admin_service'),get_string('postgres','block_admin_service'), get_string('idle', 'block_admin_service'),get_string('c1', 'block_admin_service'),get_string('c5', 'block_admin_service'),get_string('c15', 'block_admin_service'));
			$table_consult->wrap = array ('nowrap','');
			$table_consult->align = array ('center','center','center','center','center','center');
			$table_consult->data = $rows;
			$table_consult->width = '60%';
			print_table($table_consult);

	}
	
	
}	    
	    
function calcularDades($start_time, $end_time, $be = false){
	global $CFG;
	if ($be){
		$select = "select id, postgres,idle,c1,c5,c15,server_name, TO_CHAR(time_executed,'DD-MM-YYYY HH24:MI:SS') as time_executed from {$CFG->prefix}analytics_sessions where server_name = '$be' and time_executed >= to_date('$start_time', 'HH24:MI:SS dd/mm/yyyy') and time_executed < to_date('$end_time', 'HH24:MI:SS dd/mm/yyyy') order by time_executed asc";
	}else{
		$select = "select id, postgres,idle,c1,c5,c15,server_name, TO_CHAR(time_executed,'DD-MM-YYYY HH24:MI:SS') as time_executed from {$CFG->prefix}analytics_sessions where time_executed >= to_date('$start_time', 'HH24:MI:SS dd/mm/yyyy') and time_executed < to_date('$end_time', 'HH24:MI:SS dd/mm/yyyy') order by time_executed asc";	
	}
	return get_records_sql($select);
}	    
?>
