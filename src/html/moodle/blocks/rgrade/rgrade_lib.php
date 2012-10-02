<?php
require_once("$CFG->dirroot/mod/rcontent/locallib.php");

$ENUM_STATUS = array(
		"FINALIZADO", "POR_CORREGIR", "CORREGIDO");

$ENUM_SCORES = array(
		"AVERAGE", "BEST_ATTEMPT", "LAST_ATTEMPT", "FIRST_ATTEMPT");

/**
 *
 * Devuelve un array con el Id y Name de todos los libros del curso
 * @param int $courseid
 */
function rgrade_get_all_books($courseid) {

	global $CFG;

	$sql = "SELECT b.id, b.name
	FROM {$CFG->prefix}rcontent c
	INNER JOIN {$CFG->prefix}rcommon_books b
	ON c.bookid = b.id
	WHERE c.course = $courseid
	GROUP BY b.id, b.name
	ORDER BY b.name ASC";

	return get_records_sql($sql);
}

/**
 *
 * Devuelve, si existe en el curso, el par <id,Name> del libro con id $bookid
 * @param int $courseid
 * @param int $bookid
 */
function rgrade_get_book_from_course($courseid, $bookid) {

	if(empty($courseid) || empty($bookid)){

		return;
	}

	$books = rgrade_get_all_books($courseid);
	if(empty($books)){
		return;
	}

	if(!isset($books[$bookid])){
		return;
	}

	return $books[$bookid];
}

/**
 *
 * Devuelve un array<id, name, code> con todas las unidades del libro
 * @param int $bookid
 */
function rgrade_get_units_from_book($bookid){

	global $CFG;

	$sql = "select id, name, code from  {$CFG->prefix}rcommon_books_units
	where bookid = $bookid order by sortorder, timecreated";

	return get_records_sql($sql);
}

/**
 *
 * Devuelve la cadena internacionalizada dentro del módulo rcontent
 * @param string $key
 */
function rgrade_get_string($key, $args = null){
	return get_string($key, 'blocks/rgrade', $args);
}

function _rgrade_get_rol_student_restriction($courseid){

	global $CFG;

	$context = get_context_instance(CONTEXT_COURSE, $courseid);
	$roles = rgrade_get_student_roles_sql();

	return "JOIN (
	SELECT DISTINCT ra.userid
	FROM {$CFG->prefix}role_assignments ra
	WHERE ra.roleid IN ($roles)
	AND ra.contextid = {$context->id}
	) roles ON roles.userid = u.id ";
}

/**
 * Devuelve un recordset con todos los estudiantes de un curso
 *
 * @param int $courseid
 */
function rgrade_get_all_students($courseid){

	global $CFG;

	$sql = "SELECT u.id, u.lastname, u.firstname FROM {$CFG->prefix}user u ";
	$sql .= _rgrade_get_rol_student_restriction($courseid);
	$sql .="ORDER BY u.lastname, u.firstname, u.id";

	return get_recordset_sql($sql);
}

function rgrade_check_capability($c) {

	global $COURSE;

	$context = get_context_instance(CONTEXT_COURSE, $COURSE->id);

	return has_capability($c, $context);
}

/**
 *
 * Devuelve un recordset con todos los grupos y sus estudiants de un curso
 *
 * @param int $courseid
 */
function rgrade_get_groups_studentsid($courseid){

	global $CFG;

	$sql = "SELECT u.id as userid, g.id as groupid, g.name as groupname
	FROM {$CFG->prefix}user u
	JOIN {$CFG->prefix}groups_members gm ON gm.userid = u.id
	JOIN {$CFG->prefix}groups g ON g.id = gm.groupid ";

	$sql .= _rgrade_get_rol_student_restriction($courseid);

	$sql .="ORDER BY g.id, u.lastname, u.firstname";

	return get_recordset_sql($sql);
}


/**
 * Devuelve un cadena con los IDS de todos los roles de estudiante separados
 * por coma.
 * Ejemplo: 3,8
 */
function rgrade_get_student_roles_sql(){
	$roles = get_roles_with_capability('moodle/legacy:student');

	return implode(',', array_keys($roles));
}

/**
 *
 * Devuelve un libro por ID
 * @param int $bookid
 */
function rgrade_get_book($bookid){
	if(!$bookid){
		return;
	}

	return get_record('rcommon_books', 'id', $bookid);
}

/**
 * Devuelve el timestamp de una fecha en formato dd/mm/yy
 *
 * http://www.php.net/manual/en/datetime.formats.date.php
 * Las fechas en los formatos m/d/y o d-m-y no son ambiguas al observar
 * el separador entre los distintos componentes: si el separador es una barra (/),
 * se asume el formato americano m/d/y; mientras que si el separador es un guión (-)
 * o un punto (.), se asume el formato europeo d-m-y.
 *
 * @param string $sDate
 *
 */
function rgrade_get_time($sDate){
	$sDate = str_replace("/", "-", $sDate);
	return strtotime($sDate);
}

/**
 *
 * Devuelve el recordset con el listado de todos los grades filtrados por
 * curso,libro, unidades, usuarios, grupo, estados y fechas de inicio y fin
 *
 * @param int $courseid
 * @param int $bookid
 * @param int/array $unitid
 * @param int/array $userid
 * @param int $groupid
 * @param string/array $state
 * @param string $begin
 * @param string $end
 */
function rgrade_get_grades($courseid, $bookid, $unitid = null,
$groupid = null, $userid, $state = null, $begin = null, $end = null) {

	global $CFG;

	$sql = "SELECT g.id, g.userid, g.unitid, g.activityid, g.grade/g.maxgrade as grade,
	g.starttime, g.totaltime , g.attempt, g.urlviewresults, g.comments, g.status
	FROM {$CFG->prefix}rcontent_grades g
	INNER JOIN {$CFG->prefix}rcontent rc ON rc.id = g.rcontentid ";

	$sql .= "WHERE rc.course = $courseid AND rc.bookid = $bookid ";

	$sql .= _rgrade_add_where_restriction("g.unitid", $unitid, "AND");
	$sql .= _rgrade_add_where_restriction("g.userid", $userid, "AND");
	$sql .= _rgrade_add_where_restriction("g.status", $state, "AND");

	if($begin){
		$tbegin = rgrade_get_time($begin);
		$sql .= "AND g.starttime >= $tbegin ";
	}

	if($end){
		$tend = rgrade_get_time($end);
		$sql .= "AND g.starttime <= $tend " ;
	}

	// Sólo filtramos que el usuario pertenezca al grupo (NO rol)
	if($groupid) {
		$sql .= "AND EXISTS (
		SELECT gm.userid FROM {$CFG->prefix}groups_members gm
		WHERE gm.userid = g.userid and gm.groupid = $groupid
		) ";
	}

	$sql .=	"ORDER BY g.userid, g.unitid, g.activityid, g.attempt";

	return get_recordset_sql($sql);
}

function rgrade_get_counts($courseid, $bookid, $groupid = null,
$studentid = null, $state = null, $begin = null, $end = null) {

	global $CFG;

	$sql = "select g.unitid, g.activityid, count(*) as total ".
			"from {$CFG->prefix}rcontent_grades g ".
			"inner join {$CFG->prefix}rcontent rc on rc.id = g.rcontentid ";

	$sql .= "where rc.course = $courseid and rc.bookid = $bookid ";

	if($state) {
		$sql .= "and g.status = '$state' ";
	}

	if($begin) {
		$tbegin = rgrade_get_time($begin);
		$sql .= "and g.starttime >= $tbegin ";
	}

	if($end) {
		$tend = rgrade_get_time($end);
		$sql .= "and g.starttime <= $tend " ;
	}

	if($studentid && !empty($studentid)){
		$sql .= _rgrade_add_where_restriction("g.userid", $studentid, "AND");
	}
	// Sólo filtramos que el usuario pertenezca al grupo (no rol)
	else if($groupid) {
		$sql .= "AND EXISTS (
		SELECT gm.userid FROM {$CFG->prefix}groups_members gm
		WHERE gm.userid = g.userid and gm.groupid = $groupid
		) ";
	}

	$sql .= "group by g.unitid, g.activityid ";

	return get_recordset_sql($sql);
}

/**
 *
 * Devuelve un array con los id de la unidades con orden mayor de los últimos
 * 100 grades de un curso, libro y opcionalmente grupo.
 *
 * @param int $courseid
 * @param int $bookid
 * @param int $groupid
 *
 */
function rgrade_last_units_with_grades($courseid, $bookid, $groupid = null) {

	global $CFG;

	$sql =
	"select u.id, u.sortorder ".
	"from {$CFG->prefix}rcontent_grades g ".
	"inner join {$CFG->prefix}rcontent rc ON rc.id = g.rcontentid ".
	"and rc.course = $courseid and rc.bookid = $bookid ".
	"inner join {$CFG->prefix}rcommon_books_units u ON g.unitid = u.id ";

	$sql .= "WHERE rc.course = $courseid AND rc.bookid = $bookid ";

	// Sólo filtramos que el usuario pertenezca al grupo (no rol)
	if($groupid) {
		$sql .= "and exists (
		select gm.userid FROM {$CFG->prefix}groups_members gm
		where gm.userid = g.userid and gm.groupid = $groupid
		) ";
	}

	$sql .=	"order by g.id desc";

	$rs = get_recordset_sql($sql, 0, 100);

	if (!$rs) {
		return null;
	}

	$toreturn = array();

	while($unit = rs_fetch_next_record($rs)) {

		$oU = $unit->sortorder;

		if(!$toreturn[0]){
			$toreturn[0] = $unit;
			continue;
		}

		$o0 = $toreturn[0]->sortorder;
		if($o0 == $oU){
			continue;
		}

		if(!$toreturn[1]){;
			$toreturn[1] = $unit;
			continue;
		}

		$o1 = $toreturn[1]->sortorder;
		if($o1 == $oU){
			continue;
		}

		if($oU > $o0 || $oU > $o1){
			$toreturn[($o0 < $o1) ? 0 : 1] = $unit;
		}
	}
	rs_close($rs);

	if(!$toreturn[0]){
		return array();
	}

	if(!$toreturn[1]){
		return array($toreturn[0]->id);
	}

	$o0 = $toreturn[0]->sortorder;
	$o1 = $toreturn[1]->sortorder;

	if($o0 == $o1){
		return array($toreturn[0]->id);
	}

	if($o0 > $o1){
		return array($toreturn[1]->id, $toreturn[0]->id);
	}

	return array($toreturn[0]->id, $toreturn[1]->id);
}

/**
 *
 * Devuelve una cadena con la restriccion equal o IN de una propiedad y valor
 * Opcionalmente se puede añadir la operacion AND, OR
 *
 * @param string $param
 * @param string/int/array $value
 * @param string $op (operación)
 *
 */
function _rgrade_add_where_restriction($param, $value, $op = ''){
	if(empty($value)) {
		return "";
	}

	if(is_array($value)){

		foreach($value as &$v) {
			$v = "'$v'";
		}

		return "$op $param IN (" . implode(',', $value) . ") ";
	}

	return	"$op $param = '$value' ";
}

/**
 *
 * Devuelve todas las actividades de un libro y opcionalmente unidad
 *
 * @param int $bookid
 * @param int $unitid
 */
function rgrade_get_recordset_activities($bookid, $unitid = null) {

	global $CFG;

	$sql = "SELECT a.*, u.code as unitcode, u.name as unitname
	FROM {$CFG->prefix}rcommon_books_activities a
	INNER JOIN {$CFG->prefix}rcommon_books_units u ON a.unitid = u.id
	WHERE a.bookid = $bookid ";

	if($unitid) {
		$sql .= " and a.unitid = $unitid ";
	}

	$sql .=	"ORDER BY u.sortorder, a.sortorder, a.timecreated";

	return get_recordset_sql($sql);
}

/**
 * Retorna un JSON con un mensaje de error.
 *
 * @param string $message
 */
function rgrade_json_error($message){

	$data = array();
	$data['error'] = true;
	$data['message'] = $message;

	echo json_encode($data);
	exit;
}

/**
 * Devuelve el recordset con el listado de todos los grades por ID
 *
 * @param <array, int> $ids
 */
function rgrade_get_grades_by_id($ids){
	global $CFG;

	$sql = "SELECT g.* FROM {$CFG->prefix}rcontent_grades g WHERE " .
	_rgrade_add_where_restriction("g.id", $ids);

	return get_recordset_sql($sql);
}


/**
 * Actualiza la puntuación y comentario de un grade
 * Devuelve el objeto modificado
 *
 * See function rcontent_update_grade_instance in mod/rcontent/locallib.php
 */
function rgrade_update_grade($grade, $txtgrade, $comments){

	if(!$grade){
		return false;
	}

	$update=new stdClass();
	$update->id=$grade->id;
	$update->grade=round($txtgrade,2);
	$update->comments=$comments;
	$update->timemodified = time();

	//Compatibilidad con rcontent/report. Actualizamos estado POR_CORREGIR
	if ($grade->status == "POR_CORREGIR") {
		$update->status = "CORREGIDO";
	}

	$ok = update_record('rcontent_grades', $update);
	if (!$ok) {
		return false;
	}

	// Update GRADES - Use mod/rcontent/locallib.php
	if($grade->rcontentid) {
		$rcontent = get_record('rcontent','id', $grade->rcontentid);
		rcontent_update_grades($rcontent,$grade->userid);
	}

	return get_record('rcontent_grades', 'id', $grade->id);
}