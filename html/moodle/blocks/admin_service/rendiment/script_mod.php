<?php
/**
 * Created on 27/04/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 * @author david.castro
 * @package rendiment
 */

require_once ('../../../config.php');
require_once ('../lib.php');
set_time_limit(0);
@raise_memory_limit('512M');
//require_once ('lib.php');



//recollim l'entorn que cal carregar
$id = optional_param('entorn');
preparar_entorn($id);




//Record de dates.
//Timestamp del ayer
//$now = mktime(1,0,0,date("n")-1, 1,date ("Y"));
$index = mktime(1,0,0,date("n")-1, 1,date ("Y"));

//$index = 1247397984;//---->
//$index = mktime(1,0,0,9, 12,date ("Y"));
/*
$data->any = date ("Y", $now); //2007
$data->mes = date ("n", $now); //4 -->Abril
$data->dia = date ("j", $now); //1-31
*/

//$now = time();
//$index = 1230817558;

//for para todos los meses.
//while ( $index < $now ) {
//echo '<br>'.$index.'<br>';

//<<<<<<<<<<<<<<
//$now = 1201820450;
//Abril
//$now = 1207001061;
//Mayo
//$now = 1209994516;
//Junio
//$now = 1212672916;
//Enero 2009
//$now = 1232016183;
//febrero 2009
//$now = 1234679712;
//Marzo 2009
//$now = 1237110294;
//>>>>>>>>>>>>>>

$data->any = date ("Y", $index); 
$data->mes = date ("n", $index);
/*cris

$data->any = date ("Y", $now); 
$data->mes = date ("n", $now);
*/
//Sabem el nombre de dies del mes anterior
//$data->dia = date ("t", mktime(0,0,0,$data->mes-1,1,$data->any));

$data->dia = date ("t", mktime(0,0,0,$data->mes,1,$data->any));
/*cris
$data->dia = date ("t", mktime(0,0,0,$data->mes,1,$data->any));
*/

//Record d'informacio.
$row->categoryid = 'NULL';
$row->year = 'NULL';
$row->quat = 'NULL';
$row->campus = 'NULL';
$row->courseid = 'NULL';
$row->module = 'NULL';
$row->read = 0;
$row->write = 0;
$row->time_start = mktime(0,0,0,$data->mes,1,$data->any);
$row->time_end = mktime(23,59,59,$data->mes,$data->dia,$data->any);

echo '<br/>';echo "\n";
echo '--------------------------Nuevo Mes Modulos----------------------------------';
echo '<br/>';echo "\n";
echo 'any:'.date("Y", $row->time_start).' mes:'.date("n", $row->time_start).' dia:'.date("j", $row->time_start).' hora:'.date("H:i:s", $row->time_start);
echo '<br/>';echo "\n";
echo 'any:'.date("Y", $row->time_end).' mes:'.date("n", $row->time_end).' dia:'.date("j", $row->time_end).' hora:'.date("H:i:s", $row->time_end);
echo '<br/>';echo "\n";
echo 'Comienzo en:'.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time());
echo "\n";
//Agafen els identificadors dels cursos diferents en el perio de temps


//conexio generica a la taula que toqui
if(generic_connect()){
	
	echo '<br>connectat';
	//ens connectem a una bd que no es la local cal que busquem el prefix que fa servir
	$prefix = generic_prefix();
	
	$query= "SELECT course as id, count(*) FROM {$prefix}log WHERE time BETWEEN $row->time_start AND $row->time_end GROUP BY course";
	echo $query;
	//$courses = get_recordset_sql($query);
	$courses = generic_query($query);
	//Informacio del guest
	//$guest = get_record('user', 'username', 'guest');
	$query = "SELECT * FROM {$prefix}user WHERE username='guest'";
	print_object($query);
	$guest = generic_query_fetch ($query);
	
	
	//rs_fetch_next_record($courses);
	//print_object($CFG);
	//Tractem tots el cursos
	while ($course = generic_fetch($courses)){
	//while ($course = rs_fetch_next_record($courses)) {
		//Saltem els cursos de no assignatures.
		if ($course->id == 0 || $course->id == 1) continue;
		//Informacio del curs. Preparem la informacio rellevant
	
	//comentem la course upc	
		//$curs_upc = get_record ('course_upc', 'id_course', $course->id);
	/*	$query_curs_upc = "SELECT * FROM {$prefix}course_upc where id_course={$course->id}"; 
		$curs_upc = generic_query_fetch($query_curs_upc);
		echo 'consulta curs_upc';
		print_object($curs_upc);
		//$row->categoryid = get_field('course', 'category', 'id', $course->id);
		$query_rowcategoryid = "SELECT category FROM {$prefix}course WHERE id ={$course->id}";
		$row->categoryid = generic_query_fetch($query_rowcategoryid);
		
		$row->year = $curs_upc->anyacad;
		$row->quat = $curs_upc->quatrimestre;
		$row->campus = $curs_upc->centre;
		$row->courseid = $course->id;*/
		//Calculem la informacio rellevant.
		$query_rowcategoryid = "SELECT category FROM {$prefix}course WHERE id ={$course->id}";
		$categoryid = generic_query_fetch($query_rowcategoryid);
		$row->categoryid = $categoryid->category; 
		$row->courseid = $course->id;
		//Moduls actius
		$moduls = array('assignment', 'calendar', 'chat', 'choice', 'forum', 'glossary', 'journal', 
		'label', 'lesson', 'message', 'quiz', 'resource', 'scorm', 'survey', 'wiki', 'workshop', 'data', 'blog', 'lams', 'grade');
		/*$moduls = array('assignment', 'calendar', 'chat', 'choice', 'forum', 'glossary', 'internalmail', 'journal', 
		'label', 'lesson', 'message', 'quiz', 'resource', 'scorm', 'survey', 'wiki', 'workshop', 'data', 'blog', 'lams', 'grade');*/
		//$moduls = array('grade');
	
		//Informacio dels moduls.
	
		foreach ($moduls as $mod) {
			$r = calcularReadWrite($mod, $row->courseid, $row->time_start, $row->time_end);
			$row->read = $r->read;
			$row->write = $r->write;
			$row->module = $mod;
			if ($row->read != 0 || $row->write != 0){
				//Insetem la informacio.
				
					//canvi: les taules ja no van per nom sino per id
				//$nom_entorn = nom_entorn($id);
				//if (insert_record("analytics_{$nom_entorn}_mod", $row)){
				if (insert_record("analytics_{$id}_mod", $row)){
					//print_object($row);
					echo '<br>insertat!!!</br>';
				}else{
					echo '<br>no s\'ha pogut insertar</br>';	
				}
					/*	if (insert_record('mod', $row)){
						//print_object($row);
					}*/
					//print_object($row);
			}else{
				echo '<br>no hi ha res a insertar';
				
			}
			/*echo '<br/>';
			echo 'mod'.$mod;
			print_object($row);*/
		}
	}
}else{
	print_error('connectionproblem','block_admin_service');	
}
//rs_close($courses);
echo '<br/>';echo "\n";
echo 'Acabo en:'.date("Y", time()).' mes:'.date("n", time()).' dia:'.date("j", time()).' hora:'.date("H:i:s", time());
echo '<br/>';echo "\n";
echo '--------------------------Fin Mes ----------------------------------';
echo '<br/>';echo "\n";


//Para todos los meses
//$index = $row->time_end+1;//+$data->dia;
//}


function calcularReadWrite ($module, $courseid, $dataini, $datafi) {
	$nom_entorn = nom_entorn($id);
	$prefix = generic_prefix();
	switch ($module) {
		case 'forum':
			$like->write = 'add%';
			//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE 'view discussion' AND action LIKE 'view forum'<br/>";
			//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->write'";
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'view discussion' OR action LIKE 'view forum')");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->write'");
			break;
		case 'glossary':
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'view' OR action LIKE 'view entry')");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'add' OR action LIKE 'add entry' OR action LIKE 'add comment')");
			break;
		case 'journal':
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'view' OR action LIKE 'view responses')");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'add' OR action LIKE 'add entry')");
			break;
		case 'lesson':
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'view' OR action LIKE 'start')");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE 'add'");
			break;
		case 'message':
			$like->read = 'read';
			$like->write = 'write';
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->read'");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->write'");
			break;
		case 'quiz':
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'view' OR action LIKE 'start attempt' OR action LIKE 'attempt')");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE 'add'");
			break;
		case 'survey':
			$like->read = 'view form';
			$like->write = 'add';
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->read'");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->write'");
			break;
		case 'wiki':
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'diff' OR action LIKE 'edit' OR action LIKE 'info')");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE 'add'");
			break;
		case 'workshop':
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'view' OR action LIKE 'submit' OR action LIKE 'assessments' OR action LIKE 'assess')");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE 'add'");
			break;
		/*case 'blog':
			$like->read = 'blog view';
			$like->write = 'blog add';
			$result->read = count_records_select("log", "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->read'");
			$result->write = count_records_select("log", "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->write'");
			break;*/
		case 'grade':
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE 'view'");
//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE 'view'";
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND
(action LIKE 'import' OR action LIKE 'edit')");
//	print_object($result);
//echo "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND (action LIKE 'import' OR action LIKE 'edit')";
			break;
		/*Casos amb regstres iguals*/
		case 'assignment':
		case 'blog':		
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
			$result->read = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->read'");
			$result->write = generic_count_records_select($prefix.'log', "time BETWEEN $dataini AND $datafi AND module = '$module' AND course = $courseid AND action LIKE '$like->write'");
			break;
	}
	//echo '<br/>m:'.$module.' c:'.$courseid.' ini:'.$dataini.' end'.$datafi.' read: '.$result->read.' write:'.$result->write;
	return $result;
}

?>
