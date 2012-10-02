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
    $indform = optional_param('indform');
  // Get all required strings

       /*cris: preparem lentorn es a dir posem a adm les dades de connexio que ha triat lusuari*/
    $entorn = optional_param('entorn');
    if($entorn){
 		if(!preparar_entorn($entorn)){
    		print_error('noconfenv','block_admin_service');   
    	} 
    }
    
    
    $strindicadorss = get_string("modulenameplural", 'block_admin_service');
    $strconsult = get_string('activity', 'block_admin_service');
    $title = get_string("rendiment", 'block_admin_service');


    $nav_array = build_navigation(array(array('name'=>$title, 'link'=>'../index.php', 'type'=>'misc'),array('name'=>$strconsult, 'link'=>null, 'type'=>'misc')));
    print_header($ADM->site->shortname.": ". $strindicadorss,$ADM->site->fullname,$nav_array);
    
    print_heading($strconsult);  
	
	
	echo'<br />';
	//Agafen el dia actual de la consulta.$
	//D'aquesta manera poden mostar millor la informació.	
	$mes=date("n");
	$hoy=date("j");
	$any=date("Y");
	//print_object($indform);
	$table_consult->wrap = array ('nowrap');
	$table_consult->align = array ('center');
	$table_consult->width = '80%';
	$timeInitial = $mes - 4;
	$timeInitialAny = $any;
	
	
	$connexions = array();
	$connexions = entorns_disponibles();
	
	
	$form ="<TABLE BORDER=\"0\" WIDTH=\"99%\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" >";
	$form.="<TR>";
	$form.='<TD colspan="3">'.get_string('activity', 'block_admin_service').'</TD></TR>';
	
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
	
	$form.='<TR><TD align=right>'.get_string('date','block_admin_service').' : &nbsp;</TD><TD align="left">';			
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
	for ($i=$timeInitial;$i<=12 ;$i++){
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
	if($timeInitial < 2){
		$timeInitialAny = $any-1;
	}
	for ($i=$timeInitialAny;$i<=date("Y") ;$i++){
		if($i == $any){
			$form.='<OPTION SELECTED VALUE="'.$i.'">'.$i.'</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
		}
	}	
	$form.='</SELECT>';	
	$form.='</TD></TR><TR><TD align=right>'.get_string('module','block_admin_service').' : &nbsp;</TD>';
	$form.='<TD align=left><SELECT name="indform[module]">';
	$moduls = array('tot','assignment', 'calendar', 'chat', 'choice', 'forum', 'glossary', 'journal', 
	'label', 'lesson', 'message', 'quiz', 'resource', 'scorm', 'survey', 'wiki', 'workshop', 'data', 'blog', 'lams', 'grade');
	foreach ($moduls as $modul){
		if ($indform['module']== $modul){
			$form.='<OPTION  SELECTED VALUE="'.$modul.'">'.$modul.'</OPTION>';
		}else if (!isset($indform['module']) && $modul == 'tot') {
			$form.='<OPTION SELECTED VALUE ="tot">tot</OPTION>';
		}else{
			$form.='<OPTION VALUE="'.$modul.'">'.$modul.'</OPTION>';
		}
	}
	$form.='</SELECT></TD><TD align="left">';
	@$posiblechecked = ($indform["each_hour"]=="on") ? 'checked':' ';
	$form.='<INPUT TYPE="checkbox" name="indform[each_hour]" '.$posiblechecked.'>'.get_string('do_it_for_each_hour','block_admin_service').'</TD></TR>';
	$form.='</TABLE><p>';
	$form.='<INPUT type ="submit" name= "indform[button]" value="'.get_string('search').'">
	<INPUT type ="hidden" name= "entorn" value="'.$entorn.'"><br />
	  		</FORM>';
	$row = array ($form);
	$rows[]=$row;
	$table_consult->data = $rows;
	print_table($table_consult);
	print_cerca($indform,$hoy,$mes,$any);
	

function print_cerca($indform,$hoy,$mes,$any){
	global $CFG;
	
///// Miguel Angel Quintero
	if (isset ($indform['each_hour'])&&isset ($indform['button'])){
		$rows=array();
		if ($indform['module']=="tot"){
			for($i=0;$i<=23;$i++){
				$start_time = mktime($i,0,0,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				$end_time = mktime($i,59,59,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				$totalitat = array('assignment','calendar','chat','choice','data','forum','grades',
				'glossary','journal','label','lesson','quiz','resource','scorm','survey','wiki','workshop','grade');
				foreach ($totalitat as $total){
					$resultat = calcularReadWriteDiari($total,$start_time,$end_time);
					if ($resultat->read!=0 || $resultat->write!=0){
						$row = array (date("Y/m/d", $start_time) . ' de'.$i.':00  a '.$i.':59',$total,$resultat->read,$resultat->write);
						$rows[]=$row;
					}
				}
			}
		}else{	
			for($i=0;$i<=23;$i++){
				$start_time = mktime($i,0,0,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				$end_time = mktime($i,59,59,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
				$resultat = calcularReadWriteDiari($indform["module"],$start_time,$end_time);
				if ($resultat->read!=0 || $resultat->write!=0){
					$row = array (date("Y/m/d", $start_time) . ' de '.$i.':00 a '.$i.':59',$indform["module"],$resultat->read,$resultat->write);
					$rows[]=$row;
				}
			}
		}
		$table_consult = new stdClass;
		$table_consult->head= array (get_string('date', 'block_admin_service'), get_string('module','block_admin_service'), get_string('reads', 'block_admin_service'),get_string('writes','block_admin_service'));
		$table_consult->wrap = array ('nowrap','');
		$table_consult->align = array ('center','center','center','center');
		$table_consult->data = $rows;
		$table_consult->width = '80%';
		print_table($table_consult);
	}
	if (!isset ($indform['each_hour'])&&isset ($indform['button'])){
		$end_time = mktime(23,59,59,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
		$start_time = mktime(0,0,0,$indform['mes_ini'],$indform['dia_ini'],$indform['any_ini']);
		$rows=array();
		if ($indform['module']=="tot"){
			$totalitat = array('assignment','calendar','chat','choice','data','forum','grades',
			'glossary','journal','label','lesson','quiz','resource','scorm','survey','wiki','workshop','grade');
			foreach ($totalitat as $total){
				$resultat = calcularReadWriteDiari($total,$start_time,$end_time);
				if ($resultat->read!=0 || $resultat->write!=0){
					$row = array (date("Y/m/d", $start_time). ' de 0:00 a 23:59',$total,$resultat->read,$resultat->write);
					$rows[]=$row;
				}
			}
		}else{
			$resultat = calcularReadWriteDiari($indform['module'],$start_time,$end_time);
				if ($resultat->read!=0 || $resultat->write!=0){
					$row = array (date("Y/m/d", $start_time) . ' de 0:00 a 23:59',$indform['module'],$resultat->read,$resultat->write);
					$rows[]=$row;
				}
		}	
		$table_consult = new stdClass;
		$table_consult->head= array (get_string('date', 'block_admin_service'), get_string('module','block_admin_service'),get_string('reads', 'block_admin_service'),get_string('writes','block_admin_service'));
		$table_consult->wrap = array ('nowrap','');
		$table_consult->align = array ('center','center','center','center');
		$table_consult->data = $rows;
		$table_consult->width = '80%';
		print_table($table_consult);		
	}


}
	
	
/// Finish the page

    print_footer();

//Funcion
function calcularReadWriteDiari ($module, $dataini, $datafi) {
	global $ADM;
	//print_object($ADM);
	if (!isset ($ADM->entorn_actual)){
		print_error('chooseenv','block_admin_service');
	}
	if(generic_connect()){
		$prefix = generic_prefix();
			switch ($module) {
				case 'forum':
					$like->write = 'add%';
					//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action = 'view discussion' AND action = 'view forum'<br/>";
					//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action = '$like->write'";
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'view discussion' OR action = 'view forum')");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->write'");
					break;
				case 'glossary':
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'view' OR action = 'view entry')");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'add' OR action = 'add entry' OR action = 'add comment')");
					break;
				case 'journal':
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'view' OR action = 'view responses')");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'add' OR action = 'add entry')");
					break;
				case 'lesson':
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'view' OR action = 'start')");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = 'add'");
					break;
				case 'message':
					$like->read = 'read';
					$like->write = 'write';
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->read'");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->write'");
					break;
				case 'quiz':
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'view' OR action = 'start attempt' OR action = 'attempt')");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = 'add'");
					break;
				case 'survey':
					$like->read = 'view form';
					$like->write = 'add';
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->read'");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->write'");
					break;
				case 'wiki':
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'diff' OR action = 'edit' OR action = 'info')");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = 'add'");
					break;
				case 'workshop':
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND (action = 'view' OR action = 'submit' OR action = 'assessments' OR action = 'assess')");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = 'add'");
					break;
				case 'blog':
					$like->read = 'blog view';
					$like->write = 'blog add';
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->read'");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->write'");
					break;
				case 'grade':
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = 'view'");
		//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action = 'view'";
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND
		(action = 'import' OR action = 'edit')");
		//	print_object($result);
		//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'import' OR action LIKE 'edit')";
					break;
				/*Casos amb regstres iguals*/
				case 'assignment':
				case 'calendar':
				case 'chat':
				case 'choice':
				case 'internalmail':
				case 'label':
				case 'resource':
				case 'scorm':
				case 'data':
				case 'lams':
				default:
					$like->read = 'view';
					$like->write = 'add';
					//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->read'<br/>";
					//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->write'";
					$result->read = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->read'");
					$result->write = generic_count_records_select("{$prefix}log", "time BETWEEN $dataini AND $datafi AND module = '$module'   AND action = '$like->write'");
					break;
			}
	}else{
		print_error('connectionproblem','block_admin_service');
	}
	//echo '<br/>m:'.$module.' c:'.$courseid.' ini:'.$dataini.' end'.$datafi.' read: '.$result->read.' write:'.$result->write;
	return $result;
}
//Fin Funcion

?>
