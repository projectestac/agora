<?PHP // $Id: index.php,v 1.1 2003/09/30 02:45:19 moodler Exp $

/// This page lists all the instances of NEWMODULE in a particular course
/// Replace NEWMODULE with the name of your module

    require_once("../../../config.php");
    //require_once("lib.php");
    include_once "../lib.php";
    //cris la meva
   // require_once("../config/lib.php");

    //optional_param($id);   // course

	require_login();
    if (!isadmin()) {
    	print_error('chooseenv','block_admin_service');
    }

   /* $entorn = optional_param('entorn');
    if($entorn)
    	preparar_entorn($entorn);*/
    
    
/// Get all required strings
	$strindicadorss = get_string("modulenameplural", 'block_admin_service');
	$title = get_string("rendiment",'block_admin_service');
    $nav_array = build_navigation(array(array('name'=>$title, 'link'=>null, 'type'=>'misc')));
    print_header($ADM->site->shortname.": ". $strindicadorss,$ADM->site->fullname,$nav_array);
   
    print_heading($title);                              
                                                          
/// Print the list of instances (your module will probably extend this)
	echo'<br />';
 	echo'<br />';
 	echo'<br />';
 	
 /* seleccio de lentorn
	
 	$selector =  "Escull l'entorn:&nbsp;<select value=\"entorn\">";
 	$entorns = entorns_disponibles();
	foreach($entorns as $entorn){
	 	$selector .= "<option value=".$entorn->id.">".$entorn->nom."</option>";
	}
 	$selector .= '</selector>';
 	
 	$row  = array($selector);

*/
	/*$connexions = array();
	$connexions = entorns_disponibles();*/
	
	/*$text = '<table><tr><td><b>'.get_string('select_clients','block_admin_service').'</b><td>';
	$text.= '<td><form action="index.php" method="post">' .
			'<select name="entorn" onChange="this.parentNode.submit();">';
	$text.='<option value="-1">'.get_string('select_clients','block_admin_service').'</option>';
	foreach($connexions as $connexio){
		$sel = ($connexio->id == $entorn)?' selected="selected"':'';
		$text.= '<option value="'.$connexio->id.'"'.$sel.'>'. $connexio->nom_client.'</option>';
	}
	$text.='</select>';
	$text.='</form>';
	$text.= '</td></tr></table>';
	$row = array($text);*/
	//$rows[] = $row;
/*------fi seleccio entorn---*/

 	
 	//print_object ($CFG);
 	//$row = array('<a href="./consult_log/index.php?id=1&entorn='.$entorn.'">'.get_string('logins', 'block_admin_service').'</a>');
 	$row = array('<a href="./consult_log/index.php">'.get_string('logins', 'block_admin_service').'</a>');
 	$rows[]=$row;
 	
 	//23/01/08: Nuevas consultas de usuarios no logados
 	//$row = array('<a href="./consult_loginko/index.php?id=1&entorn='.$entorn.'">'.get_string('loginsko', 'block_admin_service').'</a>');
 	$row = array('<a href="./consult_loginko/index.php">'.get_string('loginsko', 'block_admin_service').'</a>');
 	$rows[]=$row;
 	//$row = array('<a href="./consult_loginuserko/index.php?id=1&entorn='.$entorn.'">'.get_string('loginsuserko', 'block_admin_service').'</a>');
 	$row = array('<a href="./consult_loginuserko/index.php">'.get_string('loginsuserko', 'block_admin_service').'</a>');
	//23/01/08: Nuevas consultas de usuarios no logados -->FIN
 	
 	$rows[]=$row;
 	//$row = array('<a href="'.$CFG->wwwroot.'/mod/admin_upc/rendiment/consult_conc/index.php?id=1">'.get_string('concurrents', 'block_admin_service') .'</a>');
 	//$rows[]=$row;
 	//$row = array('<a href="./consult_actius/index.php?id=1&entorn='.$entorn.'">'.get_string('actius', 'block_admin_service') .'</a>');
 	$row = array('<a href="./consult_actius/index.php">'.get_string('actius', 'block_admin_service') .'</a>');
 	$rows[]=$row;
 	//$row = array('<a href="'.$CFG->wwwroot.'/mod/admin_upc/rendiment/consult_activ/view.php?id=1&option=dia">'.get_string('activitats', 'block_admin_service').'</a>');
 	//$rows[]=$row;
 	//$row = array('<a href="http://stan.upc.es/sessions/">Consulta log d\'Activitat</a>');
 	//$row = array('<a href="./consult_log_activ/view.php?id=1&entorn='.$entorn.'">Consulta log d\'Activitat</a>');
 	$row = array('<a href="./consult_log_activ/view.php">Consulta log d\'Activitat</a>');
 	$rows[]=$row;
 	//Nuevo Indicador Diario de Actividades. Sólo permite ver por dia. Es el complemento a los indicadores por Mes de actividades.
 	//$row = array('<a href="./consult_diari_activ/index.php?id=1&entorn='.$entorn.'">Consulta Indicadors diaris d\'Activitat</a>');
 	$row = array('<a href="./consult_diari_activ/index.php">Consulta Indicadors diaris d\'Activitat</a>');
 	$rows[]=$row;
 	//nou indicador sessions moodle de cada instancia de la infraestrucutrfa
 	//$row = array('<a href="./consult_log_sessions/view.php?id=1&entorn='.$entorn.'">Consulta Sessions Moodle de les instàncies</a>');
 	$row = array('<a href="./consult_log_sessions/view.php">Consulta Sessions Moodle de les instàncies</a>');
 	$rows[]=$row;
 	
 	$table->wrap = array ('nowrap');
	$table->align = array ('center');
	$table->data = $rows;
	$table->width = '80%';
	print_table($table);

    print_footer();

?>