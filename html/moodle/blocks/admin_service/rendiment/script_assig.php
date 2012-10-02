<?php
/**
 * Created on 26/04/2007
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
set_time_limit(0);
@raise_memory_limit('256M');
//require_once ('lib.php');




//recollim l'entorn que cal carregar
$id = optional_param('entorn');
preparar_entorn($id);



//Record de dates.
//Timestamp del ayer
$now = time();
//$now = 1249125984;//---->
 
//$now = 1184405054;
//$now = 1184491454;
//$now = 1229316502;


$now = $now-(24*60*60);

$data->any = date ("Y", $now); //2007
$data->mes = date ("n", $now); //4 -->Abril
$data->dia = date ("j", $now); //1-31

/*
//Para hacerlo para Todo.
//$now = time();1157065199
//TIME INICI_ANT: 31/08/2006 23:59:59
//$index = 1157065199;
//TIME INICI: 31/01/2007 23:59:59
$index = 1204671600;//1202166000;//1201906800;
//TIME : Ara
$now = $index+1*24*3600;//time();


$index = 1230798683
*/
//for para todos los dias.
//$index = 1230798683;
//while ( $index < $now ) {

//$data->any = date ("Y", $index); 
//$data->mes = date ("n", $index);
//$data->dia = date ("j", $index);


//Record d'informacio.
$row->categoryid = 'NULL';
$row->year = 'NULL';
$row->quat = 'NULL';
$row->campus = 'NULL';
$row->courseid = 'NULL';
$row->visites = 0;
$row->visites_uniques = 0;
$row->guest = 0;
$row->max = 0;
$row->time_max = mktime(0,0,0,$data->mes,$data->dia,$data->any);
$row->time_start = mktime(0,0,0,$data->mes,$data->dia,$data->any);
$row->time_end = mktime(23,59,59,$data->mes,$data->dia,$data->any);

echo '<br/>';
echo "\n";
echo '---------------------------------Nuevo Dia Assigs----------------------------------';
echo "\n";
echo '<br/>';
echo 'any:'.date("Y", $row->time_start).' mes:'.date("n", $row->time_start).' dia:'.date("j", $row->time_start).' hora:'.date("H:i:s", $row->time_start);
echo '<br/>';echo "\n";
echo 'any:'.date("Y", $row->time_end).' mes:'.date("n", $row->time_end).' dia:'.date("j", $row->time_end).' hora:'.date("H:i:s", $row->time_end);
echo '<br/>';echo "\n";
echo 'Comienzo en:'.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time());
echo "\n";


//conexio generica a la taula que toqui
if(generic_connect()){
	echo '<br>connectat';
	//ens connectem a una bd que no es la local cal que busquem el prefix que fa servir
	$prefix = generic_prefix();

	
	//Agafen els identificadors dels cursos diferents en el perio de temps
	//$query= "SELECT course as id, count(*) FROM {$CFG->prefix}log WHERE time BETWEEN $row->time_start AND $row->time_end GROUP BY course";
	$query= "SELECT course as id, count(*) FROM {$prefix}log WHERE time BETWEEN $row->time_start AND $row->time_end GROUP BY course";
	$courses = generic_query($query);
	
	//$courses = get_records_sql($query);
	//Informacio del guest
	//$guest = get_record('user', 'username', 'guest');
	
	$query = "SELECT * FROM {$prefix}user WHERE username='guest'";
	
	$guest = generic_query_fetch ($query);
	
	
	//Tractem tots el cursos
	$numcourses = 0;
	//foreach ($courses as $course) {
	while ($course = generic_fetch($courses)){
		//Saltem els cursos de no assignatures.
		if ($course->id == 0 || $course->id == 1) continue;
		//Informacio del curs. Preparem la informacio rellevant
		
		
		
		//$curs_upc = get_record ('course_upc', 'id_course', $course->id);
		
		
	/*	$query_curs_upc = "SELECT * FROM {$prefix}course_upc where id_course={$course->id}"; 
		print_object($query_curs_upc);
		$curs_upc = generic_query_fetch($query_curs_upc);
		print_object($curs_upc);
		//$row->categoryid = get_field('course', 'category', 'id', $course->id);
		$query_rowcategoryid = "SELECT category FROM {$prefix}course WHERE id ={$course->id}";
		$row->categoryid = generic_query_fetch($query_rowcategoryid);
		
		$row->year = $curs_upc->anyacad;
		$row->quat = $curs_upc->quatrimestre;
		$row->campus = $curs_upc->centre;
		$row->courseid = $course->id;*/
		//Calculem la informacio rellevant.
		//Usuaris registrats 
		//Dos en un, visites usuaris registrats i visites usuaris registrats uniques!!
		$query_rowcategoryid = "SELECT category FROM {$prefix}course WHERE id ={$course->id}";
		$categoryid = generic_query_fetch($query_rowcategoryid);
		$row->categoryid = $categoryid->category; 
		//print_object($row->categoryid);
		$row->courseid = $course->id;
		$query= "SELECT count(distinct userid) as id, count(*) as visites FROM {$prefix}log WHERE time BETWEEN $row->time_start AND $row->time_end AND module = 'course' AND course = $row->courseid AND action LIKE 'view%' AND userid <> $guest->id";
		//$log_aux = get_record_sql($query);
		$log_aux = generic_query_fetch ($query);
		print_object($log_aux);
		
		$row->visites = $log_aux->visites;
		$row->visites_uniques = $log_aux->id;
		//Usuaris guests
		$row->guest = generic_count_records_select($prefix.'log',"time BETWEEN $row->time_start AND $row->time_end AND module = 'course' AND course = $row->courseid AND action LIKE 'view%' AND userid = $guest->id");
		//Maxim d'usuaris per hora
		$row->max = 0;
		for ($i = 0; $i < 24; $i++) {
			//echo '<br/>la i:'.$i.' it <br/>';
			$start = mktime($i,0,0,$data->mes,$data->dia,$data->any);
			$end = mktime($i,59,59,$data->mes,$data->dia,$data->any);
			$count = generic_count_records_select($prefix.'log', "time BETWEEN $start AND $end AND module = 'course' AND course = $row->courseid AND action LIKE 'view%'");
			if($count > $row->max){
				//echo 'canvio :'.$row->max.' por:'.$count.'</br>';
				$row->max = $count;
				$row->time_max = $start;
			}
		}
		if ($row->visites != 0 || $row->visites_uniques != 0 || $row->guest != 0){
			//Insetem la informacio.
			$numcourses++;
			/*if (insert_record('assig', $row)){
				//print_object($row);
			}*/
			//$nom_entorn = nom_entorn($id);
			//canvi les taules ja no van per nom sino per id
			//if (insert_record("analytics_{$nom_entorn}_assig", $row)){
			if (insert_record("analytics_{$id}_assig", $row)){
				//print_object($row);
				echo '<br>insertat!!!</br>';
			}else{
				echo '<br>no s\'ha pogut insertar</br>';	
			}
			
			
			//print_object($row);
		}
	}
	
	//final de la conexio
	//tanquem la conexio fent una nova funcio de close generic
	generic_close();
	
	
	echo '<br/>';echo "\n";
	echo 'Acabo en:'.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time());
	echo '<br/>';echo "\n";
	echo '--------------------------Fin Dia Assigs ----------------------------------';
	echo '<br/>';echo "\n";
}else{
	print_error('connectionproblem','block_admin_service');	
}

//$max = get_field_sql("SELECT max(id) FROM mdl_indicadors_log");
//print_object($max);
//print_object($numcourses);
//set_field('indicadors_log', 'time_end_assig', time(), 'id', $max);
//set_field('indicadors_log', 'time_count_assig', $numcourses, 'id', $max);

//Para todo
//$index = $row->time_end+1;
//}

 
 
?>
