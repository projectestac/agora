<?PHP // $Id: index.php,v 1.1 2003/09/30 02:45:19 moodler Exp $

/// This page lists all the instances of NEWMODULE in a particular course
/// Replace NEWMODULE with the name of your module

    require_once("../../../../config.php");
    include_once "../../lib.php";	

	require_login();
    if (!isadmin()) {
    	print_error('chooseenv','block_admin_service');
    }
    $indform = optional_param('indform');
  
/// Get all required strings

         /*cris: preparem lentorn es a dir posem a adm les dades de connexio que ha triat lusuari*/
    $entorn = optional_param('entorn');
    if($entorn){
 		if(!preparar_entorn($entorn)){
    		print_error('noconfenv','block_admin_service');    
    	}
    }
    
    $strindicadorss = get_string("modulenameplural", 'block_admin_service');
    $strconsult = get_string('loginsko', 'block_admin_service');
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
	
	$connexions = array();
	$connexions = entorns_disponibles();
	
	$form ="<TABLE BORDER=\"0\" WIDTH=\"99%\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" >";
	$form.="<TR>";
	$form.='<TD colspan="3">'.get_string('loginsko', 'block_admin_service').'</TD></TR>';
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
	$form.='<tr><td colspan="3">&nbsp;</td></tr>';
	$form.='<TR><TD align=right>'.get_string('gran_all_from','block_admin_service').'</TD><TD align="left">';			
	$form.='<FORM METHOD="POST" ACTION="index.php?id=1&option=tot">';
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
	$form.='</SELECT>';
	$form.='</TD><TD align="left">';
	$form.='<tr><td colspan="3"><INPUT type ="hidden" name= "indform[tot]"">
			<INPUT type ="submit" name= "indform[button]" value="'.get_string('search').'">
			<INPUT type ="hidden" name= "entorn" value="'.$entorn.'"><br />
			</FORM>';
	$form.='</TD></TR>';		
	$form.='</TABLE>';
	$row = array ($form);
	$rows[]=$row;
	$table_consult->data = $rows;
	print_table($table_consult);
	print_cerca($indform,$hoy,$mes,$any);
	

function print_cerca($indform,$hoy,$mes,$any){
	global $CFG, $ADM;
	
	if (isset ($indform['button'])){
			//si no s'ha seleccionat un entorn generem un error
		if (!isset ($ADM->entorn_actual)){
			print_error('chooseenv','block_admin_service');
		}
		$rows= array();
		$results = array();
			if (isset ($indform['tot'])){
				$now = mktime(23,59,59,$indform['mes_fin'],$indform['dia_fin'],$indform['any_fin']);
				$start_time = mktime(0,0,0,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				//Es la query per treure els logins del usuaris en el periode de temps determinat.
				//$query= "SELECT userid, COUNT(*) as times FROM {$CFG->prefix}log WHERE time BETWEEN $start_time AND $now AND action = 'login' GROUP BY userid ORDER BY times DESC";
			//	$query= "SELECT * FROM {$CFG->prefix}log WHERE time BETWEEN $start_time AND $now AND action = 'masseslogins' ORDER BY time ASC";
				//echo $query;
				//$results = get_records_sql($query);
				
				
				if(generic_connect()){
					$prefix = generic_prefix();
					$query="SELECT * FROM {$prefix}log WHERE time BETWEEN $start_time AND $now AND action = 'masseslogins' ORDER BY time ASC";
					$consulta = generic_query($query);
					while($usuari = generic_fetch($consulta)){
						$results[]=$usuari;							
					}
				}else
					print_error('connectionproblem','block_admin_service');
				
				
				if ($results){
					switch($indform['granul']){
					
					case 1:
						foreach($results as $result){	
							$iter=mktime(date("G",$result->time),0,0,date("n",$result->time),date("j",$result->time),date("Y",$result->time));		
							if (!isset($resultats[$iter])){
								$resultats[$iter]->logat = 1;/*
								$resultats[$now2]->backends = 0;
								$resultats[$now2]->maxims = array();
								$resultats[$now2]->maxims[] = 0;
								$resultats[$now2]->datas = array();
								$resultats[$now2]->datas[]= 0;*/
							}else {
								$resultats[$iter]->logat =$resultats[$iter]->logat +1;
								/*$resultats[$iter]->backends =$resultats[$iter]->backends +$result->number_backends;
								$resultats[$iter]->maxims[]=$result->number_backends;
								$resultats[$iter]->datas[]= date("Y/m/d G:i",$result->time);*/
							}
						}
						echo'<br />';
						//unset($resultats[$now2]);
						if ($resultats) ksort($resultats);
						//print_object($resultats);
						foreach ($resultats as $d => $result){
							$h=date('G',$d);
							//$franja = $temp[0].' '.get_string('of','block_admin_service').' '.$h.'-'.($h+1);
							$franja = date("Y/m/d", $d).' '.get_string('of','block_admin_service').' '.$h.'-'.($h+1);
							//$q=$result->backends/$div;
							if(isset($result->logat)){
								$row = array ($franja,$result->logat);
							}
							$rows[]=$row;
						}
										
						break;
					
					
					
					case 2:$table_consult->head= array (get_string('date','block_admin_service'), get_string('number_backends','block_admin_service'), get_string('max','block_admin_service'), get_string('hour','block_admin_service'));
						
						foreach($results as $result){	
						$iter=mktime(0,0,0,date("n",$result->time),date("j",$result->time),date("Y",$result->time));		
								if (!isset($resultats[$iter])){
									$resultats[$iter]->logat = 1;
									
								}else {
									$resultats[$iter]->logat =$resultats[$iter]->logat +1;
								}
						}
						//print_object($resultats);
						//$i = 0;
						if ($resultats) ksort($resultats);
						//print_object($resultats);
						foreach ($resultats as $d => $result){
							$row = array (date("Y/m/d", $d),$result->logat);
							$rows[]=$row;
						//	$i++;
		
						}
		
						
						/*
						El tractament per els rows d'informació per poder printa tots el usuaria que han fet logins en l'Atenea.
						foreach($results as $result){
							if(!$dades = get_user_info_from_db('id',$result->userid)){
								$nom = get_string('not_found','block_admin_service');
							}else{
								$nom = $dades->firstname.' '.$dades->lastname;
		 						$nom = '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$consulta->id.'">'.$nom.'</a>';
							}
		 					$row = array ($nom,$result->times);
		 					$rows[]=$row;
						}*/
						echo'<br />';
							
					break;
					default:
					break;
					}//Fin del Switch
				}else{
					$rows = array();
				}
				$table_consult = new stdClass;
				$table_consult->head= array (get_string('date', 'block_admin_service'), get_string('times', 'block_admin_service'));
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
