<?php



require_once ('../../../config.php');
require_once ('../lib.php');
require_once ('lib.php');
require_once ($CFG->libdir.'/ddllib.php');
//require_once ($CFG->dirroot.'/lib/formslib.php');



require_login();

if (!isadmin()) {
	error('Only the admin can use this page');
}

$entorn = optional_param('entorn');
$nou = optional_param('nou');
$escull = optional_param('escull');
$id = optional_param('id');
$sel = optional_param('select');



global $CFG;
//print_object($CFG);
$form = new form_service();

//variable on deixarem tota la informació que volem al formulari
if(!isset($cfg_params))
$cfg_params = array();


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
	
	if($fromform[id_dos])
		$fromform[id] = $fromform[id_dos];
	
	
	$resultat = &$form->save($fromform);
	
	if($resultat){
	
		$entorn = &$form->dades_entorn($resultat[id]);
		if($entorn){
			$entorn->id = $resultat[id];
			$mform = &$form->camps_entorn($entorn,false);
			$mform = &$form->add_modify_button();
		}
		else
			error('problemes al recuperar les dades');
	}else{
		error('No es poden guardar les dades. Torna-ho a intentar');
		
		$mform = &$form->camps_entorn($fromform,true);
		$mform = &$form->add_action_buttons();
	}
	//$mform = &$form->add_action_buttons();
	
}
else if($form->modificar()){
	$fromform = &$form->get_dades();
	$entorn = &$form->dades_entorn($fromform[id_un]);
	if($entorn){
		$mform = &$form->camps_entorn($entorn,true,true);
	if($entorn->nom_client == 'SERVER' || $entorn->nom == 'ADMIN_SERVER'){
				$mform = &$form->add_accept_button();
		}else{
			$mform = &$form->add_action_buttons ();
		}
		//$mform = &$form->add_action_buttons();
	}
	else
		error('problemes al recuperar les dades');
}
else if($nou){
	$mform = &$form->camps_entorn(null,true);
	$mform = &$form->add_action_buttons();
}

else if($escull){
	$fromform = &$form->get_dades();
	$entorn = &$form->dades_entorn($fromform[id_entorn]);
	if($entorn){
		$mform = &$form->camps_entorn($entorn,false);
	if($entorn->nom_client == 'SERVER' || $entorn->nom == 'ADMIN_SERVER'){
				$mform = &$form->add_accept_button();
		}else{
			$mform = &$form->add_modify_button ();
		}
		//$mform = &$form->add_modify_button ();
	}
	else
		error('problemes al recuperar les dades');
}else if($sel){
	//vinc del link
	$entorn = &$form->dades_entorn($sel);
	if($entorn){
		$mform = &$form->camps_entorn($entorn,false);
	if($entorn->nom_client == 'SERVER' || $entorn->nom == 'ADMIN_SERVER'){
				$mform = &$form->add_accept_button();
		}else{
			$mform = &$form->add_modify_button ();
		}
		//$mform = &$form->add_modify_button ();
	}
	else
		error('problemes al recuperar les dades');
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


print_header('Atenea Service', 'Configuració Entorns',nav_upc("<a href=\"index.php\">Configuració Entorns</a>"));
if($novisible){
print_heading('Estat dels serveis');
$form->estat_serveis();
}
//print_heading('Paràmetres de configuració');
$form->display();
echo 'Acciones a resolver';
$nom = 'putamadre';
echo 'Borrar tabla '.$CFG->prefix.'block_'.$nom;
borra_taules($nom);

echo 'Crear tabla '.$CFG->prefix.'block_'.$nom;
crea_taules($nom,'fam');

print_footer();

?>