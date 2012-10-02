<?PHP // $Id: index.php,v 1.1 2003/09/30 02:45:19 moodler Exp $

/// This page lists all the instances of NEWMODULE in a particular course
/// Replace NEWMODULE with the name of your module

	require_once("../../../../config.php");
    require_once "../../lib.php";	
    
    //cris
    require_once "../lib.php";

	require_login();
    if (!isadmin()) {
    	print_error('chooseenv','block_admin_service');
    }


    $indform = optional_param('indform');
    $option = optional_param('option');
    $dial = optional_param('dial');
    $mesl = optional_param('mesl');
    $anyl = optional_param('anyl');
    $datafin = optional_param('datafin');
    $dataini = optional_param('dataini');
    $granul = optional_param('granul');
    
    /*cris: preparem lentorn es a dir posem a adm les dades de connexio que ha triat lusuari*/
    $entorn = optional_param('entorn');

	if($entorn){
 		if(!preparar_entorn($entorn)){
    		print_error('noconfenv','block_admin_service');    
    	}
    }
  
/// Get all required strings

    $strindicadorss = get_string("modulenameplural", 'block_admin_service');
    $strconsult = get_string('actius', 'block_admin_service');
    $title = get_string("rendiment",$ADM->modul);

    $nav_array = build_navigation(array(array('name'=>$title, 'link'=>'../index.php', 'type'=>'misc'),array('name'=>$strconsult, 'link'=>null, 'type'=>'misc')));
    print_header($ADM->site->shortname.": ". $strindicadorss,$ADM->site->fullname,$nav_array);
        
	print_heading($strconsult); 
	
	
	echo'<br />';
	//Agafen el dia actual de la consulta.
	//D'aquesta manera poden mostar millor la informació.	
	$mes=date("n");
	$hoy=date("j");
	$any=date("Y");
	
	$table_consult->wrap = array ('nowrap');
	$table_consult->align = array ('center');
	$table_consult->width = '80%';
	
	/**
	 * parametros que pasamos al mostrar la consulta con info extra.
	 */

	if($option == 'print_info'){
		$indform['button']='Cerca';
		$indform['dia_fin']= date('j', $datafin);
		$indform['mes_fin']= date('n', $datafin);
		$indform['any_fin']= date('Y', $datafin);
		
		$indform['any_ini']= $anyl;	
		$indform['mes_ini']= $mesl;
		$indform['dia_ini']= $dial;

		$indform['granul']= $granul;
	}else{
		/**
		 * Actualizacion de las BD.
		 */
		/*$actualizacion = get_records('indicadors_cron', 'time_start', 0);
		echo 'hola';
		echo count($actualizacion);
		foreach ($actualizacion as $act) {
			$ant = $act->id - 1;
			$query= "update mdl_indicadors_cron set time_start = (select time from mdl_indicadors_cron i where id =$ant) where id = $act->id ;";
			echo $query;
			execute_sql($query);	
		}*/
		
	}	
	
	$connexions = array();
	$connexions = entorns_disponibles();
	
	
	$form ="<TABLE BORDER=\"0\" WIDTH=\"99%\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" >";
	
	$form.="<TR>";
	$form.='<TD colspan="3">'.get_string('actius', 'block_admin_service').'</TD></TR>';
	$form.='<tr><td colspan="3">&nbsp;</td></tr>';
	$form.= '<tr><td align="right"><b>'.get_string('select_clients','block_admin_service').'</b></td>';
	
	if($connexions){
		$form.= '<td align="left"><form action="index.php" method="post">' .
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
	
	$form.='<td>&nbsp;</td></tr>';
	$form.='<FORM METHOD="POST" ACTION="index.php?id=1&option=tot">';
	$form.='<tr><td>&nbsp;</td></tr>';
	$form.='<TR><TD align=right>'.get_string('gran_all_from','block_admin_service').'</TD><TD align="left">';			
	
	
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
	$form.='</TD><TD></TD></TR><TR><TD align=right>';
	$form.=get_string('gran_all_to', 'block_admin_service');
	$form.='</TD><TD align="left">';
	$form.='<SELECT name= "indform[dia_fin]">';
	if (isset ($indform['button'])){
		$hoy = $indform['dia_fin'];
	}
	for ($i=1;$i<=31 ;$i++){
		if($i == $hoy){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';
	$form.='<SELECT name= "indform[mes_fin]">';
	if (isset ($indform['button'])){
		$mes = $indform['mes_fin'];
	}
	for ($i=1;$i<=12 ;$i++){
		if($i == $mes){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.get_string(date('F',mktime(0,0,0,$mes,$hoy,$any)),'block_admin_service').'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.get_string(date('F',mktime(0,0,0,$i,1,$any)),'block_admin_service').'</OPTION>';
		}
	}	
	$form.='</SELECT>';
	$form.='<SELECT name= "indform[any_fin]">';
	if (isset ($indform['button'])){
		$any = $indform['any_fin'];
	}
	for ($i=2006;$i<=date("Y") ;$i++){
		if($i == $any){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';
	$form.='</TD></TR><TR><TD align=right>';
	$form.= get_string('gran_all_with', 'block_admin_service');
	$form.='</TD><TD align="left">';
	$form.='<SELECT name= "indform[granul]">';
	if (isset ($indform['button'])){
		/*if($indform['granul']==3){
			$form.='<OPTION VALUE="1">'.get_string('total').'</OPTION>';
			$form.='<OPTION VALUE="2">'.get_string('month', 'block_admin_service').'</OPTION>';
			//$form.='<OPTION SELECTED VALUE="3">'.get_string('year', 'block_admin_service').'</OPTION>';
		}else*/
		if($indform['granul']===2){
			$form.='<OPTION VALUE="1">'.get_string('total').'</OPTION>';
			$form.='<OPTION SELECTED VALUE="2">'.get_string('month', 'block_admin_service').'</OPTION>';
			//$form.='<OPTION VALUE="3">'.get_string('year', 'block_admin_service').'</OPTION>';
		}else{	
			$form.='<OPTION SELECTED VALUE="1">'.get_string('total').'</OPTION>';
			$form.='<OPTION VALUE="2">'.get_string('month', 'block_admin_service').'</OPTION>';
			//$form.='<OPTION VALUE="3">'.get_string('year', 'block_admin_service').'</OPTION>';			
		}	
	}else{
		$form.='<OPTION SELECTED VALUE="1">'.get_string('total').'</OPTION>';
		$form.='<OPTION VALUE="2">'.get_string('month', 'block_admin_service').'</OPTION>';
		//$form.='<OPTION VALUE="3">'.get_string('year', 'block_admin_service').'</OPTION>';	
	}
	$form.='</SELECT>';
	$form.='</TD><TD>';
	$form.='<tr><td colspan="3"><INPUT type ="hidden" name= "indform[tot]"">
			<INPUT type ="submit" name= "indform[button]" value="'.get_string('search').'"><br />
			<INPUT type ="hidden" name= "entorn" value="'.$entorn.'">
			</FORM>';
	$form.='</TD></TR>';		
	$form.='</TABLE>';
	$row = array ($form);
	$rows[]=$row;
	$table_consult->data = $rows;
	print_table($table_consult);

	if($option === 'print_info'){
		print_simple_box_start( 'center', '90%', '', '20');
		$indform['button']='Cerca';
		$indform['tot']='tot';
		include_once("cat_view.php");
		print_cerca($indform,$hoy,$mes,$any);
		print_simple_box_end();	
		
	}else{
		print_cerca($indform,$hoy,$mes,$any);
	}
	

function print_cerca($indform,$hoy,$mes,$any){
	global $ADM,$CFG;	
	
	if (isset ($indform['button'])){
		
		
		//si no s'ha seleccionat un entorn generem un error
		if (!isset ($ADM->entorn_actual)){
			print_error('chooseenv','block_admin_service');
		}
			$rows = array();
			if (isset ($indform['tot'])){
				$now = mktime(23,59,59,$indform['mes_fin'],$indform['dia_fin'],$indform['any_fin']);
				$start_time = mktime(0,0,0,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				//LA QUERY:
				//select userid, count(*) from mdl_log where time between 1158019261 and 1158852392 group by userid
				//select userid from mdl_log where time between 1158019261 and 1158852392 group by userid
				
				
				//print_object($results);
				switch($indform['granul']){
				
				case 1:
					//Primera Seleccion. Usuarios diferentes en el Atenea 4.2.
					if(generic_connect()){
						$prefix = generic_prefix();
						$results1 = array();
						$query= "SELECT userid,count(*) FROM {$prefix}log WHERE time BETWEEN $start_time AND $now GROUP BY userid";
						$consulta = generic_query($query);
						while($usuari = generic_fetch($consulta)){
								$results1[]=$usuari;							
						}
					}else
						print_error('connectionproblem','block_admin_service');
						
					
					//$tmp =split('/',$result->datas[$i]);
					$dataini= $start_time;
					$datafin= $now;
					$datas = 'De '.$indform['dia_ini'].'/'.$indform['mes_ini'].'/'.$indform['any_ini'].' a '.$indform['dia_fin'].'/'.$indform['mes_fin'].'/'.$indform['any_fin'];
					//$res = '<a href="'.$CFG->wwwroot.'/blocks/admin_service/rendiment/consult_actius/index.php?id=1&option=print_info&dial='.$indform['dia_ini'].'&mesl='.$indform['mes_ini'].'&anyl='.$indform['any_ini'].'&dataini='.$dataini.'&datafin='.$datafin.'&granul='.$indform['granul'].'&count='.count($results1).'&entorn='.$ADM->entorn_actual->id.'">'.count($results1).'</a>';
					$res = count($results1);
					$row = array ($datas,$res);
					$rows[]=$row;	
					
					break;
				
				case 2:
					while ($start_time<= $now){
						$next = $start_time + (3600*24);
					
						$dataini= $start_time;
						$datafin= $next;
						
						
						if(generic_connect()){
							$prefix = generic_prefix();
							$results = array();
							$query="SELECT userid,count(*) FROM {$prefix}log WHERE time BETWEEN $start_time AND $next GROUP BY userid";
							$consulta = generic_query($query);
							while($usuari = generic_fetch($consulta)){
								
								$results[]=$usuari;							
							}
						}else
							print_error('connectionproblem','block_admin_service');
						
							if(!$results){
							$results = array();
						}
								
						//$res = '<a href="'.$CFG->wwwroot.'/blocks/admin_service/rendiment/consult_actius/index.php?id=1&option=print_info&dial='.$indform['dia_ini'].'&mesl='.$indform['mes_ini'].'&anyl='.$indform['any_ini'].'&dataini='.$dataini.'&datafin='.$datafin.'&granul='.$indform['granul'].'&count='.count($results).'&entorn='.$ADM->entorn_actual->id.'">'.count($results).'</a>';
						$res = count($results);
						$row = array (date("Y/m/d", $start_time),$res);
						$rows[]=$row;	
						
						$start_time = $next;
					}
					echo'<br />';
					break;
				
				default:
					break;
				}//Fin del Switch
				
				$table_consult->head= array (get_string('date', 'block_admin_service'), get_string('users'));
				$table_consult->wrap = array ('nowrap','');
				$table_consult->align = array ('center','center');
				$table_consult->data = $rows;
				$table_consult->width = '80%';
				print_table($table_consult);		
				
			}	
	}
}
/// Finish the page
    print_footer();

?>
