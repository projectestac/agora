<?php
/**
 * Created on 25/04/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 *
 * @author david.castro
 * @package rendiment
 */
 
require_once ('../../../config.php');
require_once ('../lib.php');
//require_once ($CFG->dirroot.'/mod/admin_upc/lib.php');
//require_once ($CFG->dirroot.'/mod/admin_upc/lib/wget.lib.php');

set_time_limit(0);

$obj = new stdClass();
$obj->time_start = time();
$obj->time_end_site = 0;
$obj->time_end_assig = 0;
$obj->time_count_assig = 0;
$obj->time_end_mod = 0;
$obj->time_count_mod = 0;


//per cada entorn que estigui configurat, executem el seu script

$connexions = array();
$connexions = entorns_disponibles();
foreach($connexions as $connexio){
	//print_object($connexio);
	
	echo 'Inicio del scripts: '.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time()).'<br/>';
	echo "\n";
	
	$url = $CFG->wwwroot.'/blocks/admin_service/rendiment/script_site.php?entorn='.$connexio->id;
	//echo $url;
	run_online_url ($url);
	echo 'Fin del script del site al tiempo: '.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time()).'<br/>';
	echo "\n";


	$url = $CFG->wwwroot.'/blocks/admin_service/rendiment/script_assig.php?entorn='.$connexio->id;
	run_online_url ($url);
	echo 'Fin del script de assig al tiempo: '.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time()).'<br/>';
	echo "\n";


if (date ("j", time())==='1'){
	$url = $CFG->wwwroot.'/blocks/admin_service/rendiment/script_mod.php?entorn='.$connexio->id;
	run_online_url ($url);
	echo 'Fin del script de mod al tiempo: '.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time()).'<br/>';
	echo "\n";
	//$max = get_field_sql("SELECT max(id) FROM mdl_indicadors_log");
	//set_field('indicadors_log', 'time_end_mod', time(), 'id', 2222);
}else{
	//$max = get_field_sql("SELECT max(id) FROM mdl_indicadors_log");
	//set_field('indicadors_log', 'time_end_mod', time(), 'id', $max);
}


echo 'FIN TOTAL';
echo "\n";
	
}

?>