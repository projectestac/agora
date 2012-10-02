<?php
/**
 * Created on 23/04/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 *
 * @author david.castro
 * @package rendiment
 * 
 */
require_once ('../../../config.php');
require_once ('../lib.php');
//require_once ('lib.php');
set_time_limit(0);
//Record de dates.


//recollim l'entorn que cal carregar
$id = optional_param('entorn');
preparar_entorn($id);

//Dia de Hoy
$now = time();
//$now = 1249125984; //---->
//Ayer a la misma Hora
$now = $now-(24*60*60);

$data->any = date ("Y", $now); //2007
$data->mes = date ("n", $now); //4 -->Abril
$data->dia = date ("j", $now); //1-31
print_object($data);
/*
//$now = time();
//$index = 1120646878;
$index =1200870000;

//for para todos los dias.
while ( $index < $now ) {
	

$data->any = date ("Y", $index); 
$data->mes = date ("n", $index);
$data->dia = date ("j", $index);
*/

//Record d'informacio.
$row->logins = 0;
$row->logins_unicos = 0;
$row->guest_logins = 0;
$row->uploads = 0;
$row->max = 0;
//$row->max2 = 0;
$row->time_max = mktime(0,0,0,$data->mes,$data->dia,$data->any);
$row->time_start = mktime(0,0,0,$data->mes,$data->dia,$data->any);
$row->time_end = mktime(23,59,59,$data->mes,$data->dia,$data->any);

echo '<br/>';echo "\n";
echo '--------------------------Nuevo Dia Site----------------------------------';
echo '<br/>';echo "\n";
echo 'any:'.date("Y", $row->time_start).' mes:'.date("n", $row->time_start).' dia:'.date("j", $row->time_start).' hora:'.date("H:i:s", $row->time_start);
echo '<br/>';echo "\n";
echo 'any:'.date("Y", $row->time_end).' mes:'.date("n", $row->time_end).' dia:'.date("j", $row->time_end).' hora:'.date("H:i:s", $row->time_end);
echo '<br/>';echo "\n";
echo 'Comienzo en:'.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time());

//$query= "SELECT * FROM {$CFG->prefix}log WHERE time BETWEEN $time_start AND $time_end";
//$results = get_records_sql($query);


//conexio generica a la taula que toqui
if(generic_connect()){
	echo '<br>connectat';
	//ens connectem a una bd que no es la local cal que busquem el prefix que fa servir
	$prefix = generic_prefix();

	//Informacio a emmagatzamar
	//aixo va sobre la local i volen anar contra la que ens connectem
	//$guest = get_record('user', 'username', 'guest');
	
	$query = "SELECT * FROM {$prefix}user WHERE username='guest'";
	print_object($query);
	$guest = generic_query_fetch ($query);
	
	//Anterior para calcular logins
	//$row->logins = count_records_select('log', "time BETWEEN $row->time_start AND $row->time_end AND module = 'user' AND action = 'login' AND userid <> $guest->id");
	//Dos en una logins y logins unicos!!
	//$query= "SELECT count(distinct userid) as id, count(*) as logins FROM {$CFG->prefix}log WHERE time BETWEEN $row->time_start AND $row->time_end AND module = 'user' AND action = 'login' AND userid <> $guest->id";
	$query= "SELECT count(distinct userid) as id, count(*) as logins FROM {$prefix}log WHERE time BETWEEN $row->time_start AND $row->time_end AND module = 'user' AND action = 'login' AND userid <> $guest->id";
	//$log_aux = get_record_sql($query);
	
	$log_aux = generic_query_fetch ($query);
	
	
	//print_object($log_aux);
	$row->logins = $log_aux->logins;
	$row->logins_unicos = $log_aux->id;
	
	$row->guest_logins = generic_count_records_select($prefix.'log',"time BETWEEN $row->time_start AND $row->time_end AND module = 'user' AND action = 'login' AND userid = $guest->id");
	$row->uploads = generic_count_records_select($prefix.'log',"time BETWEEN $row->time_start AND $row->time_end AND module = 'upload' AND action = 'upload'");
	
	
	print_object($row);
	
//	$row->guest_logins = count_records_select('log', "time BETWEEN $row->time_start AND $row->time_end AND module = 'user' AND action = 'login' AND userid = $guest->id");
//	$row->uploads = count_records_select('log', "time BETWEEN $row->time_start AND $row->time_end AND module = 'upload' AND action = 'upload'");
	
	for ($i = 0; $i < 24; $i++) {
		//echo '<br/>la i:'.$i.' it <br/>';
		$start = mktime($i,0,0,$data->mes,$data->dia,$data->any);
		$end = mktime($i,59,59,$data->mes,$data->dia,$data->any);
		//echo 'any:'.date("Y", $start).' mes:'.date("n", $start).' dia:'.date("j", $start).' hora:'.date("H:i:s", $start);
		//echo '<br/>';
		//echo 'any:'.date("Y", $end).' mes:'.date("n", $end).' dia:'.date("j", $end).' hora:'.date("H:i:s", $end);
		
		
		$count = generic_count_records_select($prefix.'log', "time BETWEEN $start AND $end AND module = 'user' AND action = 'login'");
		//$count = count_records_select('log', "time BETWEEN $start AND $end AND module = 'user' AND action = 'login'");
		if($count > $row->max){
			//echo 'canvio :'.$row->max.' por:'.$count.'</br>';
			$row->max = $count;
			$row->time_max = $start;
		}
		//$count = count_records_select('log', "time BETWEEN $start AND $end AND module = 'user' AND action = 'login' ");
		/*$query2= "SELECT count(distinct userid) as id, count(*) as logins FROM {$CFG->prefix}log WHERE time BETWEEN $start AND $end AND module = 'user' AND action = 'login'";
		$count = get_record_sql($query2);
		if($count->id > $row->max2){
			$row->max2 = $count->id;
		}*/
		
	}
	//print_object($row);
	//la taula indicadors_sit_upc és la de cada entorn mdl_analytics_xxx
	//canvi: les taules ja no van per nom sino per id
	//$nom_entorn = nom_entorn($id);
	//if (insert_record("analytics_{$nom_entorn}_site", $row)){
	if (insert_record("analytics_{$id}_site", $row)){
		//print_object($row);
		echo '<br>insertat!!!</br>';
	}else{
		echo '<br>no s\'ha pogut insertar</br>';	
	}
	
	//tanquem la conexio fent una nova funcio de close generic
	generic_close();
	//print_object($row);
	//echo date("d/m/Y",$row->time_start).";$row->logins;$row->logins_unicos;$row->guest_logins;$row->uploads;$row->max;$row->max2;".date("H:i",$row->time_max).";<br/>";
	
	echo '<br/>';echo "\n";
	echo 'Acabo en:'.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time());
	echo '<br/>';echo "\n";
	echo '--------------------------Fin Dia----------------------------------';
	echo '<br/>';echo "\n";
	
	//$max = get_field_sql("SELECT max(id) FROM mdl_indicadors_log");
	//print_object($max);
	//print_object($numcourses);
	//set_field('indicadors_log', 'time_end_site', time(), 'id', $max);
}else{
	print_error('connectionproblem','block_admin_service');	
}

/*
//Para todos los dias Final.
$index = $row->time_end+1;
}
*/
?>
