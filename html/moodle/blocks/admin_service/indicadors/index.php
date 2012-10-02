<?php
//aquest arxiu serveix per carregar scripts
require_once ('../../../config.php');
require_once ('../lib.php');
require_once ('lib.php');
//la de la configuració dels diferents entorns per consultar els entorns disponibles
//require_once('../config/lib.php');


global $USER;

//mirem els permisos
require_login();
if (!isadmin()) {
	print_error('chooseenv','block_admin_service');
}

//si no tenim cap stat vàlid, mostrem el selector
$stat = optional_param ('stat');
$entorn = optional_param('entorn');

if($entorn){
	$USER->entorn_nom = nom_entorn($entorn);
	$USER->id = $entorn;
}


if (!$stat) $stat = 'stat_base';


require_once ($CFG->dirroot.'/blocks/admin_service/indicadors/stats/list.php');

//carreguem l'stat

//carreguem la forquilla de temps (per si algun cas)
//print_object ($_POST);
configura_forquilla ();


if (!class_exists($stat)) $stat = 'stat_base';

//creem l'objecte stat
if (!class_exists($stat)) error ('No es pot accedir a l\'indicador');
$currstat = new $stat();





//comencem la interficie
//print_header();
$navigation = "<a href=\"index.php\">Indicadors</a>";
print_header_simple("Indicadors", "", nav_upc("$navigation "));
//print_header ('Scripts', '', $navigation);

//importem les llibreries prototype
importa_prototype ();

echo '<table border="0"><tr>';
echo '<td valign="top">';
//posem el llistat dels stats disponibles
print_simple_box_start('','150');

foreach ($ADM->stats as $st) {
	if ($st == '<hr>') {
		echo '<hr/>';
	} else {
		if (class_exists($st)) {
			$temp = new $st();
			//mirem la visibilitat
			if ($temp->visible()===2) {
				echo $temp->nom().'<br/>';
			} else {
				echo '<a href="index.php?stat='.$st.'">'.$temp->nom().'</a><br/>';
			}
		} else {
			if(strpos($st, '<')===false){
				echo get_string($st,'block_admin_service');
			}else{
				//Significa que esl un link directe
				echo $st;	
			}
		}
	}
}

print_simple_box_end();
echo '</td>';
echo '<td width="100%">';
//la forquilla
print_box_start();


//canvi1: el $currstat->mostra_dia() retorna false
print_forquilla();

//print_forquilla ($currstat->mostra_dia());
//print_object($USER->forquilla);
print_box_end();
//la informació
print_box_start();

echo '<h1>'.$currstat->nom().'</h1>';

echo '<p>'.$currstat->descripcio().'</p>';

echo '<p>'.$currstat->form().'</p>';
//print_object($currstat);
//el contingut de l'stat
echo $currstat->contingut(get_forquilla());

print_box_end();
echo '</td>';
echo '</tr></table>';

print_footer();

?>