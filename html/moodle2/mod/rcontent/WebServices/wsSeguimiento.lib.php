<?php

require_once($CFG->dirroot . '/local/rcommon/wslib.php');
require_once($CFG->dirroot . '/local/rcommon/locallib.php');

class TiposEstado {
    private static $types = array(
        "NO_INICIADO" => "NO_INICIADO",
        "INCOMPLETO" => "INCOMPLETO",
        "FINALIZADO" => "FINALIZADO",
        "POR_CORREGIR" => "POR_CORREGIR",
        "CORREGIDO" => "CORREGIDO");

    static function Tipos($type) {
        $type = strtoupper($type);
        if (isset(self::$types[$type])) {
            return self::$types[$type];
        } else {
            return "NO_VALIDO";
        }
    }

    static function ValidType($type) {
        $type = strtoupper($type);
        return isset(self::$types[$type]);
    }
}

class ErroresSeguimiento {
    private static $errores = array("UsrNoExisteEnCurso" => 1004,
                                    "ValoresObligatorios" => 1006,
                                    "ValidarUnidadActividad" => 1007,
                                    "GuardarGrades" => 1008,
                                    "GuardarGradesDetail" => 1009,
                                    "Autenticacion" => 1010,
                                    "UnidadInvalida" => 1011,
                                    "ActividadInvalida" => 1012,
                                    "CentroInvalido" => 1013,
                                    "SinPermisosGuardarSeguimiento" => 1014,
                                    "EstadoInvalido" => 1015,
                                    "InvalidIdContenidoLMS" => 1016);

    static public function get_error_code($index) {
        if (isset(self::$errores[$index])) {
            return self::$errores[$index];
        } else {
            return 0;
        }
    }

    static public function get_error_description($index) {
        switch($index){
            case "UsrNoExisteEnCurso":
                return get_string('usrnotexists', 'rcontent');
                break;
            case "ValoresObligatorios":
                return get_string('mandatoryvalues', 'rcontent');
                break;
            case "ValidarUnidadActividad":
                return get_string('validatingunitactivity', 'rcontent');
                break;
            case "GuardarGrades":
                return get_string('savegrade', 'rcontent');
                break;
            case "GuardarGradesDetail":
                return get_string('savedetailsgrade', 'rcontent');
                break;
            case "Autenticacion":
                return get_string('authentication', 'rcontent');
                break;
            case "UnidadInvalida":
                return get_string('invalidunit', 'rcontent');
                break;
            case "ActividadInvalida":
                return get_string('invalidactivity', 'rcontent');
                break;
            case "CentroInvalido":
                return get_string('invalidcenter', 'rcontent');
                break;
            case "SinPermisosGuardarSeguimiento":
                return get_string('permitskeeptrack', 'rcontent');
                break;
            case "InvalidIdContenidoLMS":
                return get_string('invalididcontenidolms', 'rcontent');
                break;
        }
        return $index;
    }
}

class Resultado {

    public $FechaHoraInicio;
    public $Duracion;
    public $MaxDuracion;
    public $MinCalificacion;
    public $Calificacion;
    public $MaxCalificacion;
    public $Intentos;
    public $MaxIntentos;
    public $Estado;
    public $Observaciones;
    public $URLVerResultados;
}

class DetalleResultado {
    public $IdDetalle;
    public $IdTipoDetalle;
    public $Descripcion;
    public $FechaHoraInicio;
    public $Duracion;
    public $MaxDuracion;
    public $MinCalificacion;
    public $Calificacion;
    public $MaxCalificacion;
    public $Intentos;
    public $MaxIntentos;
    public $Peso;
    public $URLVerResultados;
}

class SeguimientoExtendido {
    public $idUsuario;
    public $idContenidoLMS;
    public $idCentro;
    public $idUnidad;
    public $idActividad;
    public $Resultado;
    public $Detalles;
    public $SumaPesos;
}

class TipoDetalleError {
    public $Codigo;
    public $Descripcion;
    public $Observaciones;

    function __construct($indexError, $extradescr = "") {
        $this->Codigo = ErroresSeguimiento::get_error_code($indexError);
        $this->Descripcion = ErroresSeguimiento::get_error_description($indexError);

        if (!empty($extradescr)) {
            $this->Descripcion .= " - " . $extradescr;
        }
    }
}

class RespuestaResultadoExtendido {
    public $Resultado;
    public $DetalleError;

    function setError($indexError, $extradescr = "") {
        $this->DetalleError = new TipoDetalleError($indexError, $extradescr);
        $this->Resultado = 'KO';
        return array($this->DetalleError->Codigo, $this->DetalleError->Descripcion);
    }

    function setOK(){
        $this->Resultado = 'OK';
    }
}

class ResultadoDetalleExtendidoResponse {
    public $ResultadoDetalleExtendidoResult;

    function __construct(){
        $this->ResultadoDetalleExtendidoResult = new RespuestaResultadoExtendido();
    }

    function getErrorDescription(){
        return $this->ResultadoDetalleExtendidoResult->getErrorDescription();
    }

    function setError($indexError, $extradescr = "") {
        return $this->ResultadoDetalleExtendidoResult->setError($indexError, $extradescr);
    }

    function setOK() {
        $this->ResultadoDetalleExtendidoResult->setOK();
    }
}

function valid_result_details($ResultExt) {
    // At least one result should come or detail
    if (!isset($ResultExt->Detalles) && !isset($ResultExt->Resultado)) {
        log_to_file('wsSeguimiento: failed do to and empty response');
        return false;
    }

    if (isset($ResultExt->Detalles)) {
        $detalles = $ResultExt->Detalles;

        // Take first detail
        if (is_array($detalles)) {
            $detalles = reset($detalles);
        }

        if (isset($detalles->DetalleResultado)) {
            $detalle_resultado = $detalles->DetalleResultado;

            // wsTrack check that DetalleResultado is always a array
            if (!is_array($detalle_resultado)) {
                $detalle_resultado = array($detalle_resultado);
            }


            //  Added property DetalleResultado
            foreach ($detalle_resultado as $det) {
                if (!isset($det->IdDetalle) || !isset($det->Descripcion)) {
                    return false;
                }
            }
        }
    }

    return true;
}

// New function to control that the status value is correct
function valid_status_result($ResultExt) {
    if (isset($ResultExt->Resultado)) {
        // Specified only if a state, we validate that is a defined
        if (isset($ResultExt->Resultado->Estado)) {
            return TiposEstado::ValidType($ResultExt->Resultado->Estado);
        }
    }
    return true;
}


function get_ResultadoDetalleExtendido($ResultadoExtendido, $user, $passwd) {
    global $CFG, $USER, $DB;
    set_time_limit(0);

    try {

        // Seek rcontent data
        $rcontent = $DB->get_record('rcontent', array('id' => $ResultadoExtendido->idContenidoLMS));
        if (!$rcontent) {
            return generate_error("InvalidIdContenidoLMS", $ResultadoExtendido->idContenidoLMS, "ResultadoDetalleExtendido");
        }

        // Search book
        $book = rcommon_book::get($rcontent->bookid);
        if (!$book) {
            return generate_error("LibroInvalido", $rcontent->bookid, "ResultadoDetalleExtendido");
        }

        //MARSUPIAL ********** AFEGIT -> Validating activity, unit and content in case of forzarGuardar = 1
        //06/02/2014 . @naseq
        if (isForzarGuardar($ResultadoExtendido)) {
            $real_rcontent = get_real_rcontent($ResultadoExtendido, $rcontent, $book->id);
            if($real_rcontent){
                $rcontent = $real_rcontent;
                $ResultadoExtendido->idContenidoLMS = $real_rcontent->id;
                log_to_file('ForzarGuardar changed idContenidoLMS to '.$ResultadoExtendido->idContenidoLMS);
            }
        }
        //*********** FI

        $cm = get_coursemodule_from_instance('rcontent', $rcontent->id, $rcontent->course);
        $contextmodule = context_module::instance($cm->id);

        if (!rcommon_book::check_auth($book->id, $user, $passwd)) {
            return generate_error("Autenticacion", "", "ResultadoDetalleExtendido", $cm->id);
        }

        if ($CFG->center != $ResultadoExtendido->idCentro) {
            return generate_error("CentroInvalido", get_string('center', 'rcontent') . ": {$CFG->center} - {$ResultadoExtendido->idCentro}", "ResultadoDetalleExtendido",  $cm->id);
        }

        // Valid mandatory
        if (!isset($ResultadoExtendido->idUsuario) || !isset($ResultadoExtendido->idContenidoLMS) || !valid_result_details($ResultadoExtendido)) {
            return generate_error("ValoresObligatorios", "", "ResultadoDetalleExtendido",  $cm->id);
        }

        if (!valid_status_result($ResultadoExtendido)) {
            return generate_error("EstadoInvalido", "", "ResultadoDetalleExtendido", $cm->id);
        }

        if (!valid_user($ResultadoExtendido->idUsuario, $rcontent->course)) {
            return generate_error("UsrNoExisteEnCurso", get_string('user', 'rcontent') . ": {$ResultadoExtendido->idUsuario} - " . get_string('course', 'rcontent') . ": {$rcontent->course}", "ResultadoDetalleExtendido",$cm->id);
        }

        if (!has_capability('mod/rcontent:savetrack', $contextmodule, $ResultadoExtendido->idUsuario)) {
            return generate_error("SinPermisosGuardarSeguimiento", get_string('user', 'rcontent') . ": {$ResultadoExtendido->idUsuario}", "ResultadoDetalleExtendido",$cm->id);
        }

        $unidad = valid_unit($ResultadoExtendido, $book, $rcontent->unitid);
        if (!$unidad) {
            return generate_error("UnidadInvalida", $ResultadoExtendido->idUnidad, "ResultadoDetalleExtendido");
        }
        $unidadid = isset($unidad->id) ? $unidad->id : 0;

        $actividad = valid_activity($ResultadoExtendido, $book, $rcontent->activityid, $unidadid);
        if (!$actividad) {
            return generate_error("ActividadInvalida", $ResultadoExtendido->idActividad, "ResultadoDetalleExtendido");
        }
        $actividadid = isset($actividad->id) ? $actividad->id : 0;

        // Prepare to insert/modify rcontent_grade
        $instance = new stdClass();
        $instance->userid = $ResultadoExtendido->idUsuario;
        $instance->rcontentid = $ResultadoExtendido->idContenidoLMS;
        $instance->unitid = $unidadid;
        $instance->activityid = $actividadid;
        $instance->sumweights = isset($ResultadoExtendido->SumaPesos) ? $ResultadoExtendido->SumaPesos : 100;
        $instance->timemodified = time();

        if (!empty($ResultadoExtendido->Resultado)) {

            require_once("$CFG->dirroot/mod/rcontent/lib.php");

            $dat_result = $ResultadoExtendido->Resultado;

			$status = isset($dat_result->Estado) ? $dat_result->Estado : "FINALIZADO";
            $instance->status = TiposEstado::Tipos($status);
            $instance->comments = isset($dat_result->Observaciones) ? $dat_result->Observaciones : "";
            $instance->mingrade = isset($dat_result->MinCalificacion) ? $dat_result->MinCalificacion : 0;
			$instance->maxgrade = isset($dat_result->MaxCalificacion) ? $dat_result->MaxCalificacion : 100;
			$instance->attempt = isset($dat_result->Intentos) ? $dat_result->Intentos : 1;
			$instance->maxattempts = isset($dat_result->MaxIntentos) ? $dat_result->MaxIntentos : 1;

			if (isset($dat_result->Calificacion))  $instance->grade = $dat_result->Calificacion;
            if (isset($dat_result->FechaHoraInicio))  $instance->starttime = $dat_result->FechaHoraInicio;
            if (isset($dat_result->Duracion))  $instance->totaltime = $dat_result->Duracion;
            if (isset($dat_result->MaxDuracion))  $instance->maxtotaltime = $dat_result->MaxDuracion;
            if (isset($dat_result->URLVerResultados))  $instance->urlviewresults = $dat_result->URLVerResultados;

            $select = array('userid' => $instance->userid,
                            'rcontentid' => $instance->rcontentid,
                            'unitid' => $instance->unitid,
                            'activityid' => $instance->activityid,
                            'attempt' => $instance->attempt);

            //MARSUPIAL *********** ELIMINAT -> Not check the FechaHoraInicio field
            //2011.12.19 @abertranb
            //if (isset($detalle->FechaHoraInicio))
            //    $select['starttime']= $detalle->FechaHoraInicio;
            // ********** FI

            if (!$rcont_gradeid = $DB->get_field('rcontent_grades', 'id', $select)) {
                $instance->timecreated = $instance->timemodified;
                $rcont_gradeid = $DB->insert_record('rcontent_grades', $instance);
            } else {
                $instance->id = $rcont_gradeid;
                $DB->update_record('rcontent_grades', $instance);
            }

            rcontent_update_grades($rcontent, $USER->id);

            if (!$rcont_gradeid) {
                return generate_error("GuardarGrades", "", "ResultadoDetalleExtendido",$cm->id);
            }
        }

        // Save details
        if (isset($ResultadoExtendido->Detalles)) {
            $detalles = $ResultadoExtendido->Detalles;
            if(is_array($detalles)) {
                $detalles = array_shift($detalles);
            }
        }

        if (isset($detalles) && isset($detalles->DetalleResultado)) {

            $detalles_resultado = $detalles->DetalleResultado;
			if (!is_array($detalles_resultado)) {
				$detalles_resultado = array($detalles_resultado);
			}

            foreach ($detalles_resultado as $detalle) {
                $instance = new stdClass ();
                $instance->userid = $ResultadoExtendido->idUsuario;
        		$instance->rcontentid = $ResultadoExtendido->idContenidoLMS;
				$instance->unitid = $unidadid;
                $instance->activityid = $actividadid;
                $instance->timemodified = time();

                $instance->mingrade = isset($detalle->MinCalificacion) ? $detalle->MinCalificacion : 0;
                $instance->maxgrade = isset($detalle->MaxCalificacion) ? $detalle->MaxCalificacion: 100;
                $instance->attempt = isset($detalle->Intentos) ? $detalle->Intentos : 1;
                $instance->maxattempts = isset($detalle->MaxIntentos) ?  $detalle->MaxIntentos : 1;
                $instance->typeid = isset($detalle->IdTipoDetalle) ? strtoupper($detalle->IdTipoDetalle) : 'PREGUNTA';
                $instance->weight = isset($detalle->Peso) ? $detalle->Peso : 1;

				if (isset($detalle->Calificacion))  $instance->grade = $detalle->Calificacion;
                if (isset($detalle->FechaHoraInicio))  $instance->starttime = $detalle->FechaHoraInicio;
                if (isset($detalle->Duracion))  $instance->totaltime = $detalle->Duracion;
                if (isset($detalle->MaxDuracion)) $instance->maxtotaltime = $detalle->MaxDuracion;
                if (isset($detalle->IdDetalle)) $instance->code = $detalle->IdDetalle;
                if (isset($detalle->Descripcion)) $instance->description = $detalle->Descripcion;
                if (isset($detalle->URLVerResultados))  $instance->urlviewresults = $detalle->URLVerResultados;

                $select = array('userid' => $instance->userid,
                                'rcontentid' => $instance->rcontentid,
                                'unitid' => $instance->activityid,
                                'activityid' => $actividadid,
                                'code' => $detalle->IdDetalle,
                                'attempt' => $instance->attempt);

                //MARSUPIAL *********** ELIMINAT -> Not check the FechaHoraInicio field
                //2011.12.19 @abertranb
                //if (isset($detalle->FechaHoraInicio))
                //    $select = $select. ' AND starttime='. $detalle->FechaHoraInicio;
                // ********** FI

                if (!$rcont_gradeid = $DB->get_field('rcontent_grades_details', 'id', $select)) {
                    $instance->timecreated = $instance->timemodified;
                    $rcont_gradeid = $DB->insert_record('rcontent_grades_details', $instance);
                } else {
                    $instance->id = $rcont_gradeid;
                    $DB->update_record('rcontent_grades_details', $instance);
                }

                if (!$rcont_gradeid) {
					return generate_error("GuardarGradesDetail", "", "ResultadoDetalleExtendido", $cm->id);
				}
            }
        }
    } catch (Exception $e) {
        return generate_error($e->getMessage(), "", "ResultadoDetalleExtendido", $cm->id);
    }

    $ret2 = new ResultadoDetalleExtendidoResponse();
    $ret2->setOK();
    return $ret2;
}

//  return true if user is in course
function valid_user($userid, $courseid) {
    global $DB;

    $select = "SELECT DISTINCT c.id AS curseid, u.id AS userid
               FROM {course} c
               LEFT OUTER JOIN {context} cx ON c.id = cx.instanceid
               LEFT OUTER JOIN {role_assignments} ra ON cx.id = ra.contextid
               LEFT OUTER JOIN {user} u ON ra.userid = u.id
               WHERE cx.contextlevel = :contextlevel AND c.id = :courseid AND u.id = :userid";

    return $DB->record_exists_sql($select, array('courseid'=>$courseid, 'userid' => $userid, 'contextlevel' => CONTEXT_COURSE));
}

function isForzarGuardar($ResultExt) {
    return property_exists($ResultExt, 'ForzarGuardar') && $ResultExt->ForzarGuardar == 1;
}

function valid_unit($resultext, $book, $rcontentunitid) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/local/rcommon/WebServices/BooksStructure.php');

    $unidad = false;

    try {
        // Busco la unidad por unitid del rcontent, cuando no hay que ForzarGuardar
        if ($rcontentunitid != 0 && !isForzarGuardar($resultext)) {
            $unidad = rcommon_unit::get($rcontentunitid);
            // Error Si rcontent tiene una unidad especifica y si no ha llegado desde ws o no son iguales
            if ($unidad && (!isset($resultext->idUnidad) || ($unidad->code != $resultext->idUnidad))) {
                return false;
            }
        }

        // Search the unit from the WS
        if (isset($resultext->idUnidad) && !empty($resultext->idUnidad)) {
            // Buscamos la unidad por codigo
            if (!$unidad) {
                $unidad = rcommon_unit::get_from_code($resultext->idUnidad, $book->id);
            }

            if ($book->structureforaccess == 1) {
                // Update if no isset unit/actividad title or no isset unit/activity order
                $update = $unidad && ((empty($unidad->name) && !empty($resultext->UnidadTitulo)) || (empty($unidad->sortorder) && !empty($resultext->UnidadOrden)));

                // Si no se ha encontrado la unidad o se ha encontrado pero cambia el nombre o orden llamamos al ws
                if (!$unidad || $update) {
                    $publisher = rcommon_publisher::get($book->publisherid);
                    get_book_structure($publisher, $book->isbn);

                    // Si aun no tenemos la info de la unidad la volvemos a buscar
                    if (!$unidad) {
                        $unidad = rcommon_unit::get_from_code($resultext->idUnidad, $book->id);
                    }
                }
            }

            // Unit not found, error raised
            if (!$unidad) {
                log_to_file("wsSeguimiento: function valid_unit - Unit not found. Unitcode: $resultext->idUnidad Bookid: $book->id");
                return false;
            }
            return $unidad;
        }
    } catch (Exception $e) {
        log_to_file("wsSeguimiento: function valid_unit - Exception = " . $e->getMessage());
        return false;
    }

    // No unit found but not specified
    return true;
}

//  retorn true o false, $actividad param if activity was found
function valid_activity($resultext, $book, $rcontentactivityid, $unidadid) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/local/rcommon/WebServices/BooksStructure.php');

    $actividad = false;

    try {
        // Busco la actividad por actividadid del rcontent, cuando no hay que ForzarGuardar
        if ($rcontentactivityid != 0 && !isForzarGuardar($resultext)) {
            $actividad = rcommon_activity::get($rcontentactivityid);

            // If rcontent has a specific activity error if you come from or are not equal ws
            if ($actividad && (!isset($resultext->idActividad) || $actividad->code != $resultext->idActividad)) {
                return false;
            }
        }

        // Search the activity from the WS
        if (isset($resultext->idActividad) && !empty($resultext->idActividad)) {
            // Buscamos la unidad por codigo
            if (!$actividad) {
                $actividad = rcommon_activity::get_from_code($resultext->idActividad, $unidadid, $book->id);
            }

            if ($book->structureforaccess == 1) {
                // Just update if no isset unit/actividad title or no isset unit/activity order
                $update = $actividad && ((empty($activitat->name) && !empty($resultext->ActividadTitulo)) || (empty($activitat->sortorder) && !empty($resultext->ActividadOrden)));

                // Si no se ha encontrado la unidad o se ha encontrado pero cambia el nombre o orden llamamos al ws
                if (!$actividad || $update) {
                    $publisher = rcommon_publisher::get($book->publisherid);
                    get_book_structure($publisher, $book->isbn);

                    // Obtengo los nuevos datos de la actividad
                    if (!$actividad) {
                        $actividad = rcommon_activity::get_from_code($resultext->idActividad, $unidadid, $book->id);
                    }
                }
            }

            // Activity not found, error raised
            if (!$actividad) {
                log_to_file("wsSeguimiento: function valid_activity - Activity not found. Activitycode: $resultext->idActividad Unitid: $unidadid Bookid: $book->id");
                return false;
            }
            return $actividad;
        }
    } catch (Exception $e) {
        log_to_file("wsSeguimiento: function valid_activity - Exception = " . $e->getMessage());
        return false;
    }

    // No activity found but not specified
    return true;
}

function get_real_rcontent($ResultadoExtendido, $rcontent_original, $bookid) {
    global $DB;

    log_to_file("Forzar Guardar");

    $rcontentoriginalid = $ResultadoExtendido->idContenidoLMS;
    log_to_file('Original rcontenid:'.$rcontentoriginalid);

    // Search UNIT
    $unit = false;
    if (isset($ResultadoExtendido->idUnidad) && !empty($ResultadoExtendido->idUnidad)) {
        $unit = rcommon_unit::get_from_code($ResultadoExtendido->idUnidad, $bookid);
    }
    if (!$unit) {
        // No unit provided, the real rcontent is the original
        return false;
    }
    log_to_file('unit:'.$unit->code.'-'.$unit->id);

    // Search ACTIVITY
    $activity = false;
    if (isset($ResultadoExtendido->idActividad) && !empty($ResultadoExtendido->idActividad)) {
        $activity = rcommon_activity::get_from_code($ResultadoExtendido->idActividad, $unit->id, $bookid);
    }
    if ($activity) {
        log_to_file('activity:'.$activity->code.'-'.$activity->id);
        if ($rcontent_original->unitid == $unit->id && $rcontent_original->activityid == $activity->id) {
            // Unit and activity match, the real rcontent is the original
            return $rcontent_original;
        }
    } else if($rcontent_original->unitid == $unit->id) {
         // Unit match but No activity provided, the real rcontent is the original
         return $rcontent_original;
    }

    $rcontents = false;
    // ALL OK Searching for real Rcontent with activity
    if ($activity) {
        $rcontents = $DB->get_records('rcontent', array('bookid'=>$bookid, 'unitid'=>$unit->id, 'activityid'=>$activity->id), 'id');
    }

    // Not found with activity Searching for real Rcontent without activity
    if(!$rcontents) {
        $rcontents = $DB->get_records('rcontent', array('bookid'=>$bookid, 'unitid'=>$unit->id), 'id');
    }

    // Something found, validating data
    if ($rcontents) {
        //Filter only the Rcontets with user access
        $filtered_rcontents = array();
        foreach($rcontents as $rcontent){
            if (valid_user($ResultadoExtendido->idUsuario, $rcontent->course)) {
                $cm = get_coursemodule_from_instance('rcontent', $rcontent->id, $rcontent->course);
                $contextmodule = context_module::instance($cm->id);
                if (has_capability('mod/rcontent:savetrack', $contextmodule, $ResultadoExtendido->idUsuario)) {
                    $filtered_rcontents[] = $rcontent;
                }
            }
        }

        if($filtered_rcontents) {
            if(count($filtered_rcontents) == 1){
                // Only one record, OK!
                return array_shift($filtered_rcontents);
            } else {
                log_to_file('Warning, more than one valid rcontent found');
                // More than one, try courses first
                foreach($rcontents as $rcontent){
                    if($rcontent->course == $rcontent_original->course){
                        // First with the same course
                        log_to_file('Returned the first with the same course');
                        return $rcontent;
                    }
                }

                log_to_file('All rcontents found outside the original course, returning the first');
                return array_shift($rcontents);
            }
        }
    }

    // Not found, no need to save nothing
    return false;
}

/**
 * Generates and error to return for the WS
 * @param  string $indexError    index on ErroresSeguimiento or message text
 * @param  string $functionError function that generates error
 * @param  integer $cmid          course module where the error ocurred
 * @return ResultadoDetalleExtendidoResponse                Error generated
 */
function generate_error($indexError, $extradescr, $functionError, $cmid = 0) {
    $ret_error = new ResultadoDetalleExtendidoResponse();
    list($codError, $descError) = $ret_error->setError($indexError, $extradescr);

    $message = get_string('code', 'rcontent') . ': ' . $codError . ' - ' . $descError;
    $info = rcommon_ws_error($functionError, $message, 'rcontent', $cmid);

    return $ret_error;
}