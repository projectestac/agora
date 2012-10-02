<?php



require_once ('../../../config.php');
require_once ('../lib.php');
require_once ('lib.php');
//require_once ($CFG->dirroot.'/lib/formslib.php');



require_login();

if (!isadmin()) {
	print_error('onlyadmin','block_admin_service');
}

$entorn = optional_param('entorn');
$nou = optional_param('nou');
$escull = optional_param('escull');
$id = optional_param('id');
$sel = optional_param('select');




global $CFG;

$form = new form_service();

//variable on deixarem tota la informació que volem al formulari
if(!isset($cfg_params))
$cfg_params = array();

$novisible = false;
//montem el formulari del config



//mirem les accions

if ($form->is_cancelled()) {
		$novisible = true;
	$form->basic();
} 
else if($form->salvar()){
	
	$fromform = &$form->get_dades();
	
	/*foreach($fromform as $camp =>$valor){
		$dades[$camp] = $valor;
	}
	if($dades[id_dos])
	$dades[id] = $dades[id_dos];*/
	
	if($fromform['id_dos'])
		$fromform['id'] = $fromform['id_dos'];
	
	
	$resultat = &$form->save($fromform);
	
	if($resultat){
		$entorn = &$form->dades_entorn($resultat['id']);
	
		if($entorn){
			$entorn->id = $resultat['id'];
			$mform = &$form->camps_entorn($entorn,false);
			$mform = &$form->add_modify_button();
		}
		else
			print_error('nodades','block_admin_service');
	}else{
		//print_error('No es poden guardar les dades. Torna-ho a intentar');
		print_error('nosavedades','block_admin_service');
		
		$mform = &$form->camps_entorn($fromform,true);
		$mform = &$form->add_action_buttons();
	}
	//$mform = &$form->add_action_buttons();
	
}
else if($form->modificar()){
	$fromform = &$form->get_dades();
	$entorn = &$form->dades_entorn($fromform['id_un']);

	if($entorn){
		$mform = &$form->camps_entorn($entorn,true,true);
	//if($entorn->nom_client == 'SERVER' || $entorn->nom == 'ADMIN_SERVER'){
		//		$mform = &$form->add_accept_button();
		//}else{
			$mform = &$form->add_action_buttons ();
		//}
		//$mform = &$form->add_action_buttons();
	}
	else
		//print_error('problemes al recuperar les dades');
		print_error('nodades','block_admin_service');
}
else if($nou){
	$mform = &$form->camps_entorn(null,true);
	$mform = &$form->add_action_buttons();
}

else if($escull){
	$fromform = &$form->get_dades();
	$entorn = &$form->dades_entorn($fromform['id_entorn']);
	if($entorn){
		$mform = &$form->camps_entorn($entorn,false);
	//if($entorn->nom_client == 'SERVER' || $entorn->nom == 'ADMIN_SERVER'){
		//		$mform = &$form->add_accept_button();
		//}else{
			$mform = &$form->add_modify_button ();
		//}
		//$mform = &$form->add_modify_button ();
	}
	else
		//print_error('problemes al recuperar les dades');
		print_error('nodades','block_admin_service');
}else if($sel){
	//vinc del link
	$entorn = &$form->dades_entorn($sel);
	if($entorn){
		$mform = &$form->camps_entorn($entorn,false);
//	if($entorn->nom_client == 'SERVER' || $entorn->nom == 'ADMIN_SERVER'){
//				$mform = &$form->add_accept_button();
//		}else{
			$mform = &$form->add_modify_button ();
//		}
		//$mform = &$form->add_modify_button ();
	}
	else
		//print_error('problemes al recuperar les dades');
		print_error('nodades','block_admin_service');
}
else{
	$novisible = true;
	$form->basic();
}


/*
if($nou || $form->modificar() ){
	$mform = &$form->add_action_buttons();
}else if($form->salvar() || $escull){
	$mform = &$form->add_modify_button ();
}*/


print_header('Analytics', get_string('config','block_admin_service'),nav_upc("<a href=\"index.php\">".get_string('config','block_admin_service')."</a>"));
if($novisible){
	print_heading(get_string('estatserveis','block_admin_service'));
	$form->estat_serveis();
}
//print_heading('Paràmetres de configuració');
$form->display();
print_footer();

?>