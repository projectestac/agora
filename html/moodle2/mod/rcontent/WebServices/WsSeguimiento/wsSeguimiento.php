<?php

include('../../../../config.php');
require_once($CFG->dirroot . '/blocks/rcommon/WebServices/lib.php');

//echo $defWSDL;
//print_r(GetWSDLSeguimiento());
//return;

class TiposEstado {

//MARSUPIAL ********* MODIFICAT -> Add POR_CORREGIR and CORREGIDO
//2011.05.17 @mmartinez
    public $Tipos = array("NO_INICIADO" => "NO_INICIADO", "INCOMPLETO" => "INCOMPLETO", "FINALIZADO" => "FINALIZADO", "POR_CORREGIR" => "POR_CORREGIR", "CORREGIDO" => "CORREGIDO");

//********** ORIGINAL
    //public $Tipos = array("NO_INI" => "NO_INICIADO", "INCOPL" => "INCOMPLETO", "FINALIZADO" => "FINALIZADO");
//********** FI
}

class ErroresSeguimiento {
    /*    public $errores = array("UsrNoExisteEnCurso" => array("Error" => "1004", "Descripcion" => "El usuario no pertenece al curso"),
      "ValoresObligatorios" => array("Error" => "1006", "Descripcion" => "Faltan valores obligatorios"),
      "ValidarUnidadActividad" => array("Error" => "1007", "Descripcion" => "Error al validar la unidad y actividad."),
      "GuardarGrades" => array("Error" => "1008", "Descripcion" => "Error al guardar los resultados en el LMS."),
      "GuardarGradesDetail" => array("Error" => "1009", "Descripcion" => "Error al guardar los detalles del resultado en el LMS."),
      "Autenticacion" => array("Error" => "1010", "Descripcion" => "Autenticación incorrecta. El usuario que solicita acceso a este método del servicio Web no es correcto."),
      "UnidadInvalida" => array("Error" => "1011", "Descripcion" => "Se ha recibido un código de unidad no valido."),
      "ActividadInvalida" => array("Error" => "1012", "Descripcion" => "Se ha recibido un código de actividad no valida."),
      "CentroInvalido" => array("Error" => "1013", "Descripcion" => "El código del centro no es válido."),
      "SinPermisosGuardarSeguimiento" => array("Error" => "1014", "Descripcion" => "El usuario no tiene permisos para guardar seguimientos."));
     */

    public $errores = array("UsrNoExisteEnCurso" => array("Error" => "1004", "Descripcion" => ""),
        "ValoresObligatorios" => array("Error" => "1006", "Descripcion" => ""),
        "ValidarUnidadActividad" => array("Error" => "1007", "Descripcion" => ""),
        "GuardarGrades" => array("Error" => "1008", "Descripcion" => ""),
        "GuardarGradesDetail" => array("Error" => "1009", "Descripcion" => ""),
        "Autenticacion" => array("Error" => "1010", "Descripcion" => ""),
        "UnidadInvalida" => array("Error" => "1011", "Descripcion" => ""),
        "ActividadInvalida" => array("Error" => "1012", "Descripcion" => ""),
        "CentroInvalido" => array("Error" => "1013", "Descripcion" => ""),
        "SinPermisosGuardarSeguimiento" => array("Error" => "1014", "Descripcion" => ""),
        "EstadoInvalido" => array("Error" => "1015", "Descripcion" => "Estat incorrecte. El valor de l'estat &eacute;s incorrecte"),
//MARSUPIAL ********** AFEGIT -> Add new text string for invalid idContenidoLMS
//09/01/2014 . @naseq
        "InvalidIdContenidoLMS" => array("Error" => "1016", "Descripcion" => "S'ha rebut un idContenidoLMS no v&agrave;lid"));

//*********** FI
//fill descriptions errors
    public function __construct() {
        $this->errores["UsrNoExisteEnCurso"]["Descripcion"] = get_string('usrnotexists', 'rcontent');
        $this->errores["ValoresObligatorios"]["Descripcion"] = get_string('mandatoryvalues', 'rcontent');
        $this->errores["ValidarUnidadActividad"]["Descripcion"] = get_string('validatingunitactivity', 'rcontent');
        $this->errores["GuardarGrades"]["Descripcion"] = get_string('savegrade', 'rcontent');
        $this->errores["GuardarGradesDetail"]["Descripcion"] = get_string('savedetailsgrade', 'rcontent');
        $this->errores["Autenticacion"]["Descripcion"] = get_string('authentication', 'rcontent');
        $this->errores["UnidadInvalida"]["Descripcion"] = get_string('invalidunit', 'rcontent');
        $this->errores["ActividadInvalida"]["Descripcion"] = get_string('invalidactivity', 'rcontent');
        $this->errores["CentroInvalido"]["Descripcion"] = get_string('invalidcenter', 'rcontent');
        $this->errores["SinPermisosGuardarSeguimiento"]["Descripcion"] = get_string('permitskeeptrack', 'rcontent');
//MARSUPIAL ********** AFEGIT -> Add new text string for invalid idContenidoLMS
//09/01/2014 . @naseq
        $this->errores["InvalidIdContenidoLMS"]["Descripcion"] = get_string('invalididcontenidolms', 'rcontent');
//*********** FI
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
}

class RespuestaResultadoExtendido {
    public $Resultado;
    public $DetalleError;
}

class ResultadoDetalleExtendidoResponse {
    public $ResultadoDetalleExtendidoResult;
}

//MARSUPIAL ************ MODIFICAT -> Extra control to prevend posible notifications display
//2011.10.19 @mmartinez
function valid_result_details($ResultExt) {
//*********** ORIGINAL
//function valid_result_details(ResultadoExtendido $ResultExt)
// ********** FI
    try {
        $validado = true;
// MARSUPIAL *********** AFEGIT-> Fixed bug when there was just 1 detail
// 2011.11.03 #mmartinez
        if (!is_array($ResultExt->Detalles)) {
            $ResultExt->Detalles = array(0 => $ResultExt->Detalles);
        }
// ************ FI
        //at least one result should come or detail
        if (!isset($ResultExt->Detalles) && !isset($ResultExt->Resultado)) {
            $validado = false;
            log_to_file('wsSeguimiento: failed do to and empty response');
        } else {
//MARSUPIAL *********** ELIMINAT -> Status test changed to a alone function for control the error better
//2011.05.18 @mmartinez
            //valid result
            /* if (isset($ResultExt->Resultado))
              {
              //if (!isset($ResultExt->Resultado->Calificacion) )
              //    $validado = false;

              //specified only if a state, we validate that is a defined
              if ($validado && isset($ResultExt->Resultado->Estado))
              {
              $estados = new TiposEstado();
              $valorvalido = false;

              foreach($estados->Tipos as $est)
              {
              if ($est == $ResultExt->Resultado->Estado)
              $valorvalido = true;
              }
              $validado = $valorvalido;
              }
              } */
//********** FI

            //Details valid
// MARSUPIAL *********** MODIFICAT -> Fixed bug when details arrive empty
// 2012.01.09 @mmartinez
            if (isset($ResultExt->Detalles) && isset($ResultExt->Detalles[0]->DetalleResultado)) {
// *********** ORIGINAL
                //if (isset($ResultExt->Detalles))
// ********** FI
// MARSUPIAL *********** AFEGIT -> wsTrack check that DetalleResultado is always a array
// 2012.01.10 @mmartinez
                if (!is_array($ResultExt->Detalles[0]->DetalleResultado)) {
                    $ResultExt->Detalles[0]->DetalleResultado = array($ResultExt->Detalles[0]->DetalleResultado);
                }
// ********** FI
//********** MODIFICAT MARSUPIAL - Added property DetalleResultado
                foreach ($ResultExt->Detalles[0]->DetalleResultado as $Det) {
//**********
// MARSUPIAL *********** MODIFICAT -> Change obligatory field from Calificacion to Descripcion
                    if ($validado && (!isset($Det->IdDetalle) || !isset($Det->Descripcion))) {
// ********** ORIGINAL
                        // if ( $validado && (!isset($Det->IdDetalle) || !isset($Det->Calificacion)) )
// ********** FI
                        $validado = false;
                    }
                }
            }
        }
    } catch (Exception $e) {
        $validado = false;
        throw new SoapFault($e->getCode(), $e->getMessage());
        //throw new SoapFault($errSeg->errores["UsrIncorrecto"]["Error"], $errSeg->errores["UsrIncorrecto"]["Descripcion"]);
    }

    return $validado;
}

//MARSUPIAL ********** AFEGIT -> New function to control that the status value is correct
//2011.05.18 @mmartinez
//MARSUPIAL ********** MODIFICAT -> Extra control to prevend posible notifications display
//2011.10.19 @mmartinez
function valid_status_result($ResultExt) {
//************ ORIGINAL
//function valid_status_result(ResultadoExtendido $ResultExt){
//************ FI

    try {
        $validado = true;

        //valid result
        if (isset($ResultExt->Resultado)) {

            //specified only if a state, we validate that is a defined
            if ($validado && isset($ResultExt->Resultado->Estado)) {
                $estados = new TiposEstado();
                $valorvalido = false;
                foreach ($estados->Tipos as $est) {
                    if ($est == $ResultExt->Resultado->Estado)
                        $valorvalido = true;
                }
                $validado = $valorvalido;
            }
        }
    } catch (Exception $e) {
        $validado = false;
        throw new SoapFault($e->getCode(), $e->getMessage());
        //throw new SoapFault($errSeg->errores["UsrIncorrecto"]["Error"], $errSeg->errores["UsrIncorrecto"]["Descripcion"]);
    }

    return $validado;
}

//********** FI

function ResultadoDetalleExtendido($Resultado) {
    global $CFG, $USER, $DB;
    global $HTTP_RAW_POST_DATA;

    set_time_limit(0);

    log_to_file("wsSeguimiento request: " . $HTTP_RAW_POST_DATA);

    try {
        $errSeg = new ErroresSeguimiento();

        $ret2 = new ResultadoDetalleExtendidoResponse();
        $ret2->ResultadoDetalleExtendidoResult = new RespuestaResultadoExtendido();
//MARSUPIAL ********** AFEGIT -> Added new condition to check IdContenidoLMS
//09/01/2014 . @naseq
//Query Original
        $rcontent = $DB->get_record('rcontent', array('id' => $Resultado->ResultadoExtendido->idContenidoLMS));
        if (isset($rcontent->id) && !empty($rcontent->id)) { //validar idContenidoLMS
//*********** FI
            ////MARSUPIAL ********** AFEGIT -> Validating activity, unit and content in case of forzarGuardar = 1
            //06/02/2014 . @naseq
            if ((property_exists($Resultado->ResultadoExtendido, 'ForzarGuardar') || $Resultado->ResultadoExtendido->ForzarGuardar == 1)) {
                $real_rcontent = get_real_rcontent($Resultado->ResultadoExtendido);
                if($real_rcontent){
                    $rcontent = $real_rcontent;
                    $Resultado->ResultadoExtendido->idContenidoLMS = $rcontent->id;
                    log_to_file('ForzarGuardar changed idContenidoLMS to '.$rcontent->id);
                }
            }
            //*********** FI
            if (UserAuthentication($HTTP_RAW_POST_DATA, $Resultado->ResultadoExtendido)) {
                if ($CFG->center == $Resultado->ResultadoExtendido->idCentro) {
                    $val = $Resultado->ResultadoExtendido;

                    //Valid mandatory
                    if (!isset($val->idUsuario) || !isset($val->idContenidoLMS) || !valid_result_details($val)) {
                        $ret2 = generate_error($errSeg->errores["ValoresObligatorios"]["Error"], $errSeg->errores["ValoresObligatorios"]["Descripcion"], "ResultadoDetalleExtendido");

                        /*
                          //error description
                          $DetErr = new TipoDetalleError();
                          $DetErr->Codigo =  $errSeg->errores["ValoresObligatorios"]["Error"];
                          $DetErr->Descripcion =  $errSeg->errores["ValoresObligatorios"]["Descripcion"];

                          $ret2->ResultadoDetalleExtendidoResult->Resultado = "KO";
                          $ret2->ResultadoDetalleExtendidoResult->DetalleError = $DetErr;
                         */
                    }
//MARSUPIAL ************* AFEGIT -> Call to the new function for control status
//2011.05.18 @mmartinez
                    else if (!valid_status_result($val)) {
                        $ret2 = generate_error($errSeg->errores["EstadoInvalido"]["Error"], $errSeg->errores["EstadoInvalido"]["Descripcion"], "ResultadoDetalleExtendido");
                    }
//*********** FI
                    else {
                        //seek rcontent data
                        //MARSUPIAL ********** ELIMINAT -> This two lines has been eliminated because they are added before userAuthentication.
                        //This changes has been made to add error code 1016(Invalid IdContenidoLMS).
                        //09/01/2014 . @naseq
                        /* $query = "SELECT * FROM {rcontent} where id = " . $Resultado->ResultadoExtendido->idContenidoLMS;
                          $rcontent = $DB->get_record_sql($query, array(), IGNORE_MULTIPLE); */
                        //*********** FI
                        $cm = get_coursemodule_from_instance('rcontent', $rcontent->id, $rcontent->course);
                        $contextmodule = context_module::instance($cm->id);

                        if (valid_user($Resultado->ResultadoExtendido->idUsuario, $rcontent->course)) {
                            if (has_capability('mod/rcontent:savetrack', $contextmodule, $Resultado->ResultadoExtendido->idUsuario)) {
                                $unidadid = 0;
                                $actividadid = 0;
                                if ($val = valid_unit_activity($Resultado->ResultadoExtendido, $unidadid, $actividadid, $ret2)) {

                                    //prepare to insert/modify rcontent_grade
                                    $instance = new stdClass;

                                    /// userid
                                    $instance->userid = $Resultado->ResultadoExtendido->idUsuario;
                                    /// rcontentid
                                    $instance->rcontentid = $Resultado->ResultadoExtendido->idContenidoLMS;
                                    /// unitid
                                    if (isset($unidadid) && !empty($unidadid)) {
                                        $instance->unitid = $unidadid;
                                    } else {
                                        $unidadid = 0;
                                        $instance->unitid = 0;
                                    }
                                    /// activityid
                                    if (isset($actividadid) && !empty($actividadid)) {
                                        $instance->activityid = $actividadid;
                                    } else {
                                        $actividadid = 0;
                                        $instance->activityid = 0;
                                    }
                                    /// sumweights
                                    if (isset($Resultado->ResultadoExtendido->SumaPesos)) {
                                        $instance->sumweights = $Resultado->ResultadoExtendido->SumaPesos;
                                    } else {
                                        $instance->sumweights = 100;
                                    }
                                    /// timemodified
                                    $instance->timemodified = time();

                                    if (!empty($Resultado->ResultadoExtendido->Resultado)) {

                                        require_once("$CFG->dirroot/mod/rcontent/lib.php");
//MARSUPIAL ********** ELIMINAT -> It can't be here
//2011.06.02 @mmartinez
                                        //rcontent_update_grades($rcontent,$rcontent->userid);
//********** FI
                                        $dat_result = $Resultado->ResultadoExtendido->Resultado;

                                        /// status
                                        $estados = new TiposEstado();
                                        if (isset($dat_result->Estado)) {
                                            $instance->status = strtoupper($estados->Tipos[$dat_result->Estado]);
                                        } else {
                                            $instance->status = strtoupper($estados->Tipos["FINALIZADO"]);
                                        }
                                        /// comments
                                        $instance->comments = $dat_result->Observaciones;
                                        /// grade
                                        if (isset($dat_result->Calificacion)) {
                                            $instance->grade = $dat_result->Calificacion;
                                        }
                                        /// mingrade
                                        if (isset($dat_result->MinCalificacion)) {
                                            $instance->mingrade = $dat_result->MinCalificacion;
                                        } else {
                                            $instance->mingrade = 0;
                                        }
                                        /// maxgrade
                                        if (isset($dat_result->MaxCalificacion)) {
                                            $instance->maxgrade = $dat_result->MaxCalificacion;
                                        } else {
                                            $instance->maxgrade = 100;
                                        }
                                        /// attempt
                                        if (isset($dat_result->Intentos)) {
                                            $instance->attempt = $dat_result->Intentos;
                                        } else {
                                            $instance->attempt = 1;
                                        }
                                        /// maxattempts
                                        if (isset($dat_result->MaxIntentos)) {
                                            $instance->maxattempts = $dat_result->MaxIntentos;
                                        } else {
                                            $instance->maxattempts = 1;
                                        }
                                        /// starttime
                                        if (isset($dat_result->FechaHoraInicio)) {
                                            $instance->starttime = $dat_result->FechaHoraInicio;
                                        }
                                        /// totaltime
                                        if (isset($dat_result->Duracion)) {
                                            $instance->totaltime = $dat_result->Duracion;
                                        }
                                        /// maxtotaltile
                                        if (isset($dat_result->MaxDuracion)) {
                                            $instance->maxtotaltime = $dat_result->MaxDuracion;
                                        }
                                        ///urlviewresults
                                        if (isset($dat_result->URLVerResultados)) {
                                            $instance->urlviewresults = $dat_result->URLVerResultados;
                                        }


                                        $select = array('userid' => $Resultado->ResultadoExtendido->idUsuario,
                                                        'rcontentid' => $Resultado->ResultadoExtendido->idContenidoLMS,
                                                        'unitid' => $unidadid,
                                                        'activityid' => $actividadid,
                                                        'attempt' => $instance->attempt);

                                        //MARSUPIAL *********** ELIMINAT -> Not check the FechaHoraInicio field
                                        //2011.12.19 @abertranb
                                        //if (isset($detalle->FechaHoraInicio))
                                        //    $select = $select. ' AND starttime='. $detalle->FechaHoraInicio;
                                        // ********** FI

                                        $resultid = 0;
                                        if (!$rcont_gradeid = $DB->get_field('rcontent_grades', 'id', $select)) {
                                            $instance->timecreated = time();
                                            $resultid = $DB->insert_record('rcontent_grades', $instance);
                                            if ($resultid !== false) {
                                                $instance->id = $resultid;
                                            }
                                        } else {
                                            $instance->id = $rcont_gradeid;
                                            $resultid = $rcont_gradeid;
                                            $DB->update_record('rcontent_grades', $instance);
                                        }
//MARSUPIAL *********** AFEGIT -> Moved here to update grades after update rcontent_grades
//2011.06.02 @mmartinez
                                        rcontent_update_grades($rcontent, $USER->id);
//********** FI
                                        if ($resultid > 0) {
                                            $ret2->ResultadoDetalleExtendidoResult->Resultado = 'OK';
                                        } else {
                                            $ret2 = generate_error($errSeg->errores["GuardarGrades"]["Error"], $errSeg->errores["GuardarGrades"]["Descripcion"], "ResultadoDetalleExtendido",$cm->id);

                                            /*
                                              //descripcion de error
                                              $DetErr = new TipoDetalleError();
                                              $DetErr->Codigo =  "-103";
                                              $DetErr->Descripcion =  "Error al crear/modificar rcontent_grades ";

                                              $ret2->ResultadoDetalleExtendidoResult->Resultado = "KO";
                                              $ret2->ResultadoDetalleExtendidoResult->DetalleError = $DetErr;


                                              global $USER;
                                              //save error on bd
                                              $tmp = new stdClass();
                                              $tmp->time      =  time();
                                              $tmp->userid    =  $USER->id;
                                              $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
                                              //$tmp->course    =  $data->course;
                                              $tmp->module    =  'rcontent';
                                              //$tmp->cmid      =  $data->cmid;
                                              $tmp->action    =  "ResultadoDetalleExtendidoerror";
                                              $tmp->url       =  $_SERVER['REQUEST_URI'];
                                              $tmp->info      =  'Error ResultadoDetalleExtendido: C&oacute;digo: '.$ret2->ResultadoDetalleExtendidoResult->DetalleError->Codigo.' - '.$ret2->ResultadoDetalleExtendidoResult->DetalleError->Descripcion;

                                              $DB->insert_record("rcommon_errors_log", $tmp);
                                             */
                                        }
                                    }
// MARSUPIAL *********** MODIFICAT - Fixed bug on save details when call to DetalleResultado property
// 2012.01.09 @mmartinez
                                    if (!is_array($Resultado->ResultadoExtendido->Detalles[0]->DetalleResultado)) {
                                        $Resultado->ResultadoExtendido->Detalles[0]->DetalleResultado = array($Resultado->ResultadoExtendido->Detalles[0]->DetalleResultado);
                                    }

                                    if (isset($Resultado->ResultadoExtendido->Detalles) && isset($Resultado->ResultadoExtendido->Detalles[0]->DetalleResultado)) {
                                        foreach ($Resultado->ResultadoExtendido->Detalles[0]->DetalleResultado as $detalle) {
// ********** ORIGINAL
                                            //********** MODIFICAT MARSUPIAL - Added property DetalleResultado
                                            //if (isset($Resultado->ResultadoExtendido->Detalles) && isset($Resultado->ResultadoExtendido->Detalles[0]->DetalleResultado))
                                            //{
                                            //foreach($Resultado->ResultadoExtendido->Detalles->DetalleResultado as $detalle)
                                            //********** FI
// ********** FI
                                            //prepare to insert/modify rcontent_grade_details
                                            $instance = new stdClass;

                                            /// userid
                                            if (isset($Resultado->ResultadoExtendido->idUsuario)) {
                                                $instance->userid = $Resultado->ResultadoExtendido->idUsuario;
                                            }
                                            /// rcontentid
                                            if (isset($Resultado->ResultadoExtendido->idContenidoLMS)) {
                                                $instance->rcontentid = $Resultado->ResultadoExtendido->idContenidoLMS;
                                            }
                                            /// unitid
                                            if (isset($unidadid)) {
                                                $instance->unitid = $unidadid;
                                            }
                                            /// activityid
                                            if (isset($actividadid)) {
                                                $instance->activityid = $actividadid;
                                            }
                                            /// timemodified
                                            $instance->timemodified = time();
                                            /// grade
                                            if (isset($detalle->Calificacion)) {
                                                $instance->grade = $detalle->Calificacion;
                                            }
                                            /// mingrade
                                            if (isset($detalle->MinCalificacion)) {
                                                $instance->mingrade = $detalle->MinCalificacion;
                                            } else {
                                                $instance->mingrade = 0;
                                            }
                                            /// maxgrade
                                            if (isset($detalle->MaxCalificacion)) {
                                                $instance->maxgrade = $detalle->MaxCalificacion;
                                            } else {
                                                $instance->maxgrade = 100;
                                            }
                                            /// attempt
                                            if (isset($detalle->Intentos)) {
                                                $instance->attempt = $detalle->Intentos;
                                            } else {
                                                $instance->attempt = 1;
                                            }
                                            /// maxattempts
                                            if (isset($detalle->MaxIntentos)) {
                                                $instance->maxattempts = $detalle->MaxIntentos;
                                            } else {
                                                $instance->maxattempts = 1;
                                            }
                                            /// starttime
                                            if (isset($detalle->FechaHoraInicio)) {
                                                $instance->starttime = $detalle->FechaHoraInicio;
                                            }
                                            /// totaltime
                                            if (isset($detalle->Duracion)) {
                                                $instance->totaltime = $detalle->Duracion;
                                            }
                                            /// maxtotaltime
                                            if (isset($detalle->MaxDuracion)) {
                                                $instance->maxtotaltime = $detalle->MaxDuracion;
                                            }
                                            /// detailid
                                            if (isset($detalle->IdDetalle)) {
                                                $instance->code = $detalle->IdDetalle;
                                            }
                                            /// detailtypeid
                                            if (isset($detalle->IdTipoDetalle)) {
                                                $instance->typeid = strtoupper($detalle->IdTipoDetalle);
                                            } else {
                                                $instance->typeid = 'PREGUNTA';
                                            }
                                            /// description
                                            if (isset($detalle->Descripcion)) {
                                                $instance->description = $detalle->Descripcion;
                                            }
                                            /// weight
                                            if (isset($detalle->Peso)) {
                                                $instance->weight = $detalle->Peso;
                                            } else {
                                                $instance->weight = 1;
                                            }
                                            /// urlviewresults
                                            if (isset($detalle->URLVerResultados)) {
                                                $instance->urlviewresults = $detalle->URLVerResultados;
                                            }

                                            $select = array('userid' => $Resultado->ResultadoExtendido->idUsuario,
                                                            'rcontentid' => $Resultado->ResultadoExtendido->idContenidoLMS,
                                                            'unitid' => $unidadid,
                                                            'activityid' => $actividadid,
                                                            'code' => $detalle->IdDetalle,
                                                            'attempt' => $instance->attempt);

                                            //MARSUPIAL *********** ELIMINAT -> Not check the FechaHoraInicio field
                                            //2011.12.19 @abertranb
                                            //if (isset($detalle->FechaHoraInicio))
                                            //    $select = $select. ' AND starttime='. $detalle->FechaHoraInicio;
                                            // ********** FI

                                            if (!$rcont_gradeid = $DB->get_field('rcontent_grades_details', 'id', $select)) {
                                                $instance->timecreated = time();
                                                $resultid = $DB->insert_record('rcontent_grades_details', $instance);
                                                if ($resultid !== false) {
                                                    $instance->id = $resultid;
                                                }
                                            } else {
                                                $instance->id = $rcont_gradeid;
                                                $resultid = $rcont_gradeid;
                                                $DB->update_record('rcontent_grades_details', $instance);
                                            }
                                        }

                                        if ($resultid > 0) {
                                            $ret2->ResultadoDetalleExtendidoResult->Resultado = 'OK';
                                        } else {
                                            $ret2 = generate_error($errSeg->errores["GuardarGradesDetail"]["Error"], $errSeg->errores["GuardarGradesDetail"]["Descripcion"], "ResultadoDetalleExtendido",$cm->id);

                                            /*
                                              //descripcion de error
                                              $DetErr = new TipoDetalleError();
                                              $DetErr->Codigo =  "-104";
                                              $DetErr->Descripcion =  "Error al crear/modificar rcontent_grades_details.";

                                              $ret2->ResultadoDetalleExtendidoResult->Resultado = "KO";
                                              $ret2->ResultadoDetalleExtendidoResult->DetalleError = $DetErr;


                                              global $USER;
                                              //save error on bd
                                              $tmp = new stdClass();
                                              $tmp->time      =  time();
                                              $tmp->userid    =  $USER->id;
                                              $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
                                              //$tmp->course    =  $data->course;
                                              $tmp->module    =  'rcontent';
                                              //$tmp->cmid      =  $data->cmid;
                                              $tmp->action    =  "ResultadoDetalleExtendidoerror";
                                              $tmp->url       =  $_SERVER['REQUEST_URI'];
                                              $tmp->info      =  'Error ResultadoDetalleExtendido: C&oacute;digo: '.$ret2->ResultadoDetalleExtendidoResult->DetalleError->Codigo.' - '.$ret2->ResultadoDetalleExtendidoResult->DetalleError->Descripcion;

                                              $DB->insert_record("rcommon_errors_log", $tmp);
                                             */
                                        }
                                    }
                                }
                            } else {
                                $ret2 = generate_error($errSeg->errores["SinPermisosGuardarSeguimiento"]["Error"], $errSeg->errores["SinPermisosGuardarSeguimiento"]["Descripcion"] . " - " . get_string('user', 'rcontent') . ": {$Resultado->ResultadoExtendido->idUsuario}", "ResultadoDetalleExtendido",$cm->id);
                            }
                        } else {
                            $ret2 = generate_error($errSeg->errores["UsrNoExisteEnCurso"]["Error"], $errSeg->errores["UsrNoExisteEnCurso"]["Descripcion"] . " - " . get_string('user', 'rcontent') . ": {$Resultado->ResultadoExtendido->idUsuario} - " . get_string('course', 'rcontent') . ": {$rcontent->course}", "ResultadoDetalleExtendido",$cm->id);
                        }
                    }
                } else {
                    $ret2 = generate_error($errSeg->errores["CentroInvalido"]["Error"], $errSeg->errores["CentroInvalido"]["Descripcion"] . " - " . get_string('center', 'rcontent') . ": {$CFG->center} - {$Resultado->ResultadoExtendido->idCentro}", "ResultadoDetalleExtendido",$cm->id);
                }
            } else {
                $ret2 = generate_error($errSeg->errores["Autenticacion"]["Error"], $errSeg->errores["Autenticacion"]["Descripcion"], "ResultadoDetalleExtendido",$cm->id);

                /*
                  //descripcion de error
                  $DetErr = new TipoDetalleError();
                  $DetErr->Codigo =  "-101";
                  $DetErr->Descripcion =  "Autenticación incorrecta. El usuario que solicita acceso a este método del servicio Web no es correcto.";

                  $ret2->ResultadoDetalleExtendidoResult->Resultado = "KO";
                  $ret2->ResultadoDetalleExtendidoResult->DetalleError = $DetErr;


                  global $USER;
                  //save error on bd
                  $tmp = new stdClass();
                  $tmp->time      =  time();
                  $tmp->userid    =  $USER->id;
                  $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
                  //$tmp->course    =  $data->course;
                  //$tmp->module    =  $data->module;
                  //$tmp->cmid      =  $data->cmid;
                  $tmp->action    =  "ResultadoDetalleExtendidoerror";
                  $tmp->url       =  $_SERVER['REQUEST_URI'];
                  $tmp->info      =  'Error ResultadoDetalleExtendido: C&oacute;digo: '.$ret2->ResultadoDetalleExtendidoResult->DetalleError->Codigo.' - '.$ret2->ResultadoDetalleExtendidoResult->DetalleError->Descripcion;

                  $DB->insert_record("rcommon_errors_log", $tmp);
                 */
            }
//*********** FI
//MARSUPIAL ********** AFEGIT -> Added new condition to check IdContenidoLMS
//09/01/2014 . @naseq
        } else {
            $ret2 = generate_error($errSeg->errores["InvalidIdContenidoLMS"]["Error"], $errSeg->errores["InvalidIdContenidoLMS"]["Descripcion"], "ResultadoDetalleExtendido",$cm->id);
        }
//*********** FI
    } catch (Exception $e) {
        $ret2 = generate_error($e->getCode(), $e->getMessage(), "ResultadoDetalleExtendido",$cm->id);

        /*
          //descripcion de error
          $DetErr = new TipoDetalleError();
          $DetErr->Codigo =  $e->getCode();
          $DetErr->Descripcion =  $e->message;

          $ret2->ResultadoDetalleExtendidoResult->Resultado = "KO";
          $ret2->ResultadoDetalleExtendidoResult->DetalleError = $DetErr;
         */

        //throw new SoapFault($errSeg->errores["UsrIncorrecto"]["Error"], $errSeg->errores["UsrIncorrecto"]["Descripcion"]);
    }
    log_to_file("wsSeguimiento response: " . serialize($ret2));
    return $ret2;
}

//
//  return true if user is in course
//
function valid_user($userid, $courseid) {
    global $CFG, $DB;

    $select = "SELECT DISTINCT c.id AS curseid, u.id AS userid
               FROM {course} c
               LEFT OUTER JOIN {context} cx ON c.id = cx.instanceid
               LEFT OUTER JOIN {role_assignments} ra ON cx.id = ra.contextid
               LEFT OUTER JOIN {user} u ON ra.userid = u.id
               WHERE cx.contextlevel = '50'
               AND c.id = {$courseid}
               AND u.id = {$userid}";

    return ($DB->get_record_sql($select, array(), IGNORE_MULTIPLE) != false);
}

//
//  retorn true o false, $unidad param if unit was found
//
function valid_unit($ResultExt, $book, $rcontent, &$unidad) {
    global $CFG, $DB;

    try {
        //busco la unidad por unitid del rcontent, excepto cuando está presente el parámetro ForzarGuardar y es 1
        if ($rcontent->unitid != 0 && (!property_exists($ResultExt, 'ForzarGuardar') || $ResultExt->ForzarGuardar != 1)) {
            $unidad = $DB->get_record_sql("SELECT * FROM {rcommon_books_units} where id = {$rcontent->unitid}", array(), IGNORE_MULTIPLE);

            //si rcontent tiene una unidad especifica
            //error si ha llegado desde ws o no son iguales
            if ($unidad && (!isset($ResultExt->idUnidad) || ($unidad->code != $ResultExt->idUnidad)))
                return false;
        }

        if (isset($ResultExt->idUnidad)) {
            //buscamos la unidad por codigo
            if ($unidad == false)
                $unidad = $DB->get_record_sql("SELECT * FROM {rcommon_books_units} where bookid = {$book->id} AND code = '{$ResultExt->idUnidad}'", array(), IGNORE_MULTIPLE);

            //si existe la unidad pero cambia el orden o el titulo
// MARSUPIAL ************ MODIFICAT -> Just update if no isset unit/actividad title or no isset unit/activity order
// 2012.03.12 @sarjona
            $actualizar_unidad = $unidad && ((empty($unidad->name) && !empty($ResultExt->UnidadTitulo)) || (empty($unidad->sortorder) && !empty($ResultExt->UnidadOrden)));
// *********** ORIGINAL
            //$actualizar_unidad = $unidad && ((isset($ResultExt->UnidadTitulo) && $unidad->name != $ResultExt->UnidadTitulo)
            //|| (isset($ResultExt->UnidadOrden) && $unidad->sortorder != $ResultExt->UnidadOrden));
// *********** FI

            if ($book->structureforaccess == 1) {
                //si no se ha encontrado la unidad o
                //se ha encontrado pero cambia el nombre o orden llamamos al ws
                if ($unidad == false || $actualizar_unidad) {
// XTEC ************ MODIFICAT -> When recive a non stored unit/activity and call to the book structure ws just get the structure of the selected book, not all the catalog for this publisher
// 2012.03.01 @mmartinez
                    $publisher = $DB->get_record('rcommon_publisher', array('id' => $book->publisherid));
                    get_book_structure($publisher->urlwsbookstructure, $publisher->username, $publisher->password, $book->isbn);
// ************ ORIGINAL
                    //get_all_books_structure($book->publisherid, $book->isbn);
// ************ FI
// XTEC ************ MODIFICAT -> Fixed bug in the processing of received unit/activity title when it's diferent from the stored one
// 2012.03.01 @mmartinez
                    // si aun no tenemos la info de la unidad la buscamos
                    if ($unidad == false) {
                        $unidad = $DB->get_record_sql("SELECT * FROM {rcommon_books_units} where bookid = {$rcontent->bookid} AND code = '{$ResultExt->idUnidad}'", array(), IGNORE_MULTIPLE);
                    }

                    //volvemos a comprobar si coincide el t�tulo o no
// MARSUPIAL ************ MODIFICAT -> Just update if no isset unit/actividad title or no isset unit/activity order
// 2012.03.12 @sarjona
                    $actualizar_unidad = $unidad && ((empty($unidad->name) && !empty($ResultExt->UnidadTitulo)) || (empty($unidad->sortorder) && !empty($ResultExt->UnidadOrden)));
// *********** ORIGINAL
                    //$actualizar_unidad = $unidad && ((isset($ResultExt->UnidadTitulo) && $unidad->name != $ResultExt->UnidadTitulo)
                    //|| (isset($ResultExt->UnidadOrden) && $unidad->sortorder != $ResultExt->UnidadOrden));
// *********** FI
// ************ ORIGINAL
                    //get_all_books_structure($book->publisherid, $book->isbn);
                    //obtengo los nuevos datos de la unidad
                    //$unidad = $DB->get_record_sql("SELECT * FROM {rcommon_books_units} where bookid = {$rcontent->bookid} AND code = '{$ResultExt->idUnidad}'");
                    //desactivo para que no actualice
                    //$actualizar_unidad = false;
// ************ FI
                }
            }

            //si no se ha encontrado la unidad o cambia el nombre
            if ($unidad == false || $actualizar_unidad) {
                $instance->bookid = $book->id;
                $instance->code = $ResultExt->idUnidad;

// MARSUPIAL ************ MODIFICAT -> Just update if no isset unit/actividad title or no isset unit/activity order
// 2012.03.12 @sarjona
                $instance->name = isset($unidad) && !empty($unidad->name) ? $unidad->name : (!empty($ResultExt->UnidadTitulo) ? $ResultExt->UnidadTitulo : $ResultExt->idUnidad);
// *********** ORIGINAL
                //$instance->name = isset($ResultExt->UnidadTitulo)? $ResultExt->UnidadTitulo : $ResultExt->idUnidad;
// *********** FI
// MARSUPIAL ************ MODIFICAT -> Just update if no empty unit/actividad summary
// 2012.03.12 @sarjona
                $instance->summary = isset($unidad) && !empty($unidad->summary) ? $unidad->summary : $instance->name;
// *********** ORIGINAL
//                $instance->summary = $instance->name;
// *********** FI
// MARSUPIAL ************ MODIFICAT -> Just update if no isset unit/actividad title or no isset unit/activity order
// 2012.03.12 @sarjona
                $instance->sortorder = isset($unidad) && !empty($unidad->sortorder) ? $unidad->sortorder : (!empty($ResultExt->UnidadOrden) ? $ResultExt->UnidadOrden : 0);
// ************ ORIGINAL
                //$instance->sortorder = isset($ResultExt->UnidadOrden)? $ResultExt->UnidadOrden : 0;
// ************ FI
                $instance->timemodified = time();

                //si no existe la unidad
                if ($unidad == false) {
                    $instance->timecreated = time();

                    $unid = $DB->insert_record('rcommon_books_units', $instance);
                    log_to_file("wsSeguimiento: function valid_activity - Add new unit " . (($unid) ? 'OK' : 'KO (instance:' . serialize($instance) . ')'));

                    //obtiene el registro
                    $unidad = $DB->get_record_sql("SELECT * FROM {rcommon_books_units} where id = " . $unid, array(), IGNORE_MULTIPLE);
                }
                // si el titulo o el orden a cambiado actualizamod el registro
                else {
                    $instance->id = $unidad->id;

                    $up = $DB->update_record('rcommon_books_units', $instance);
                    log_to_file("wsSeguimiento: function valid_activity - Update unit " . (($up) ? 'OK' : 'KO (instance:' . serialize($instance) . ')'));
                }
            }
        }

        return true;
    } catch (Exception $e) {
        return false;
    }
}

//
//  retorn true o false, $actividad param if activity was found
//
function valid_activity($ResultExt, $book, $rcontent, $unidad, &$actividad) {
    global $CFG, $DB;

    try {
        //busco la actividad por actividadid del rcontent, excepto cuando está presente el parámetro ForzarGuardar y es igual a 1
        if ($rcontent->activityid != 0 && (!property_exists($ResultExt, 'ForzarGuardar') || $ResultExt->ForzarGuardar != 1)) {
            $actividad = $DB->get_record('rcommon_books_activities',  array('id' => $rcontent->activityid));

            //if rcontent has a specific activity
            //error if you come from or are not equal ws
            if ($actividad && (!isset($ResultExt->idActividad) || $actividad->code != $ResultExt->idActividad))
                return false;
        }

        if (isset($ResultExt->idActividad)) {
            //buscamos la unidad por codigo
            if (!$actividad) {
                $actividad = $DB->get_record('rcommon_books_activities', array('unitid' => $unidad->id, 'code' => $ResultExt->idActividad), '*', IGNORE_MULTIPLE);
            }

            //si existe la unidad pero cambia el orden o el titulo
// MARSUPIAL ************ MODIFICAT -> Just update if no isset unit/actividad title or no isset unit/activity order
// 2012.03.12 @sarjona
            $actualizar_actividad = $actividad && ((empty($activitat->name) && !empty($ResultExt->ActividadTitulo)) || (empty($activitat->sortorder) && !empty($ResultExt->ActividadOrden)));
// *********** ORIGINAL
            //$actualizar_actividad = $actividad && ((isset($ResultExt->ActividadTitulo) && $actividad->name != $ResultExt->ActividadTitulo)
            //|| (isset($ResultExt->ActividadOrden) && $actividad->sortorder != $ResultExt->ActividadOrden));
// *********** FI
            if ($book->structureforaccess == 1) {
                //si no se ha encontrado la unidad o
                //se ha encontrado pero cambia el nombre o orden llamamos al ws
                if (!$actividad || $actualizar_actividad) {
// XTEC ************ MODIFICAT -> When recive a non stored unit/activity and call to the book structure ws just get the structure of the selected book, not all the catalog for this publisher
// 2012.03.01 @mmartinez
                    $publisher = $DB->get_record('rcommon_publisher', array('id' => $book->publisherid));
                    get_book_structure($publisher->urlwsbookstructure, $publisher->username, $publisher->password, $book->isbn);
// ************ ORIGINAL
                    //get_all_books_structure($book->publisherid, $book->isbn);
// ************ FI
// XTEC ************ MODIFICAT -> Fixed bug in the processing of received unit/activity title when it's diferent from the stored one
// 2012.03.01 @mmartinez
                    //obtengo los nuevos datos de la actividad
                    if (!$actividad) {
                        $actividad = $DB->get_record('rcommon_books_activities', array('unitid' => $unidad->id, 'code' => $ResultExt->idActividad), '*',  IGNORE_MULTIPLE);
                    }
                    //y vuelvo a comprobar si coincide el t�tulo o no
// MARSUPIAL ************ MODIFICAT -> Just update if no isset unit/actividad title or no isset unit/activity order
// 2012.03.12 @sarjona
                    $actualizar_actividad = $actividad && ((empty($activitat->name) && !empty($ResultExt->ActividadTitulo)) || (empty($activitat->sortorder) && !empty($ResultExt->ActividadOrden)));
// *********** ORIGINAL
                    //$actualizar_actividad = $actividad && ((isset($ResultExt->ActividadTitulo) && $actividad->name != $ResultExt->ActividadTitulo)
                    //|| (isset($ResultExt->ActividadOrden) && $actividad->sortorder != $ResultExt->ActividadOrden));
// *********** FI
// ************ ORIGINAL
                    //obtengo los nuevos datos de la actividad
                    //$actividad = $DB->get_record_sql($select, array(), IGNORE_MULTIPLE);
                    //desactivo para que no actualice
                    //$actualizar_actividad = false;
// ************ FI
                }
            }


            //si no se ha encontrado la unidad o cambia el nombre
            if ($actividad == false || $actualizar_actividad) {
                $instance->bookid = $book->id;
                $instance->unitid = $unidad->id;
                $instance->code = $ResultExt->idActividad;
// MARSUPIAL ************ MODIFICAT -> Just update if no isset unit/actividad title or no isset unit/activity order
// 2012.03.12 @sarjona
                $instance->name = isset($actividad) && !empty($actividad->name) ? $actividad->name : (!empty($ResultExt->ActividadTitulo) ? $ResultExt->ActividadTitulo : $ResultExt->idActividad);
// *********** ORIGINAL
                //$instance->name= isset($ResultExt->ActividadTitulo)? $ResultExt->ActividadTitulo : $ResultExt->idActividad;
// *********** FI
// MARSUPIAL ************ MODIFICAT -> Just update if no empty unit/actividad summary
// 2012.03.12 @sarjona
                $instance->summary = isset($actividad) && !empty($actividad->summary) ? $actividad->summary : $instance->name;
// *********** ORIGINAL
//                $instance->summary = $instance->name;
// *********** FI
// MARSUPIAL ************ MODIFICAT -> Just update if no isset unit/actividad title or no isset unit/activity order
// 2012.03.12 @sarjona
                $instance->sortorder = isset($actividad) && !empty($actividad->sortorder) ? $actividad->sortorder : (!empty($ResultExt->ActividadOrden) ? $ResultExt->ActividadOrden : 0);
// ************ ORIGINAL
                //$instance->sortorder = isset($ResultExt->ActividadOrden )? $ResultExt->ActividadOrden : 0;
// ************ FI

                $instance->timemodified = time();

                //if activity not found
                if ($actividad == false) {
                    $instance->timecreated = time();

                    $add = $DB->insert_record('rcommon_books_activities', $instance);
                    log_to_file("wsSeguimiento: function valid_activity - Add new activity " . (($add) ? 'OK' : 'KO (instance:' . serialize($instance) . ')'));

                    $actividad = $DB->get_record('rcommon_books_activities', array('unitid' => $unidad->id, 'code' => $ResultExt->idActividad), '*',  IGNORE_MULTIPLE);
                }
                // if the title or order to update the register changed
                else {
                    $instance->id = $actividad->id;

                    $up = $DB->update_record('rcommon_books_activities', $instance);
                    log_to_file("wsSeguimiento: function valid_activity - Update activity " . (($up) ? 'OK' : 'KO (instance:' . serialize($instance) . ')'));
                }
            }
        }

        return true;
    } catch (Exception $e) {
        log_to_file("wsSeguimiento: function valid_activity - Exception = " . serialize($e));
        return false;
    }
}

function valid_unit_activity($ResultExt, &$unidadid, &$actividadid, &$err) {
    global $CFG, $DB;
    require_once($CFG->dirroot . '/blocks/rcommon/WebServices/BooksStructure/get_books_structure.php');
    //require_once('../../../../blocks/rcommon/WebServices/BooksStructure/get_books_structure.php');

    try {
        $errSeg = new ErroresSeguimiento();

        //search rcontent
        $rcontent = $DB->get_record('rcontent', array('id' => $ResultExt->idContenidoLMS));

        //search book
        if ($book = $DB->get_record('rcommon_books', array('id' => $rcontent->bookid))) {

            if (valid_unit($ResultExt, $book, $rcontent, $unidad)) {
//MARSUPIAL *********** MODIFICAT -> Extra control to prevend posible notifications display
//2011.10.19 @mmartinez
                $unidadid = (isset($unidad->id)) ? $unidad->id : $unidadid;
//********** ORIGINAL
                //$unidadid = $unidad->id;
//********** FI
                if (valid_activity($ResultExt, $book, $rcontent, $unidad, $actividad)) {
//MARSUPIAL *********** MODIFICAT -> Extra control to prevend posible notifications display
//2011.10.19 @mmartinez
                    $actividadid = (isset($actividad->id)) ? $actividad->id : $actividadid;
//********** ORIGINAL
                    //$actividadid = $actividad->id;
//********** FI
                    return true;
                }
                else
                    $err = generate_error($errSeg->errores["ActividadInvalida"]["Error"], $errSeg->errores["ActividadInvalida"]["Descripcion"] . $ResultExt->idActividad . " - " . $actividad->code, "valid_activity");
            }
            else
                $err = generate_error($errSeg->errores["UnidadInvalida"]["Error"], $errSeg->errores["UnidadInvalida"]["Descripcion"] . $ResultExt->idUnidad . " - " . $unidad->code, "valid_unit");
        }

        return false;
    } catch (Exception $e) {
        //throw new SoapFault($e->getCode(), $e->message);
    }
}

function UserAuthentication($post_data, $ResultExt) {
    global $CFG, $DB;

    $auth = false;

    try {
        if (isset($ResultExt->idContenidoLMS)) {
            if ($bookid = $DB->get_field('rcontent', 'bookid' ,array('id' => $ResultExt->idContenidoLMS))) {
                if ($publisherid = $DB->get_field('rcommon_books', 'publisherid', array('id' => $bookid))) {
                    $post = rcommon_xml2array($post_data);

                    $keys = array("Envelope", "Header", "WSEAuthenticateHeader", "User", "value");
                    if ($valor = rcommond_findarrayvalue($post, $keys)) {
                        //if (isset($post["soapenv:Envelope"]["soapenv:Header"]["seg:WSEAuthenticateHeader"]["seg:User"]["value"]))
//********** MODIFICAT MARSUPIAL - changed validation table to rcommon_publisher
                        if ($track_credent = $DB->get_record('rcommon_publisher',array('id' => $publisherid))) {
//**********
                            $keys = array("Envelope", "Header", "WSEAuthenticateHeader", "User", "value");
                            $user_pub = rcommond_findarrayvalue($post, $keys);
                            //$user_pub = $post["soapenv:Envelope"]["soapenv:Header"]["seg:WSEAuthenticateHeader"]["seg:User"]["value"];

                            $keys = array("Envelope", "Header", "WSEAuthenticateHeader", "Password", "value");
                            $pwr_pub = rcommond_findarrayvalue($post, $keys);
                            //$pwr_pub = $post["soapenv:Envelope"]["soapenv:Header"]["seg:WSEAuthenticateHeader"]["seg:Password"]["value"];

                            if ($track_credent->username == $user_pub && $track_credent->password == $pwr_pub)
                                $auth = true;
                        }
                    }
                }
            }
        }

        return $auth;
    } catch (Exception $e) {
        return false;
    }
}

function get_real_rcontent($ResultadoExtendido){
    global $DB;

    log_to_file("Forzar Guardar");

    $rcontentoriginalid = $ResultadoExtendido->idContenidoLMS;
    $rcontent_original = $DB->get_record('rcontent',array('id'=>$rcontentoriginalid));

    // Original rcontent not found
    if(!$rcontent_original)  return false;

    log_to_file('Original rcontenid:'.$rcontentoriginalid);

    // Search BOOK
    $book = $DB->get_record('rcommon_books',array('id'=>$rcontent_original->bookid));
    // Book ID not found
    if(!$book) return false;
    log_to_file('bookid:'.$book->id);

    // Search UNIT
    $unitcode = is_string($ResultadoExtendido->idUnidad) ? $ResultadoExtendido->idUnidad:0;
    if($unitcode) {
        $unit = $DB->get_record('rcommon_books_units',array('code'=>$unitcode, 'bookid'=>$book->id));
        // Unit Code not found
        if(!$unit) return false;
    } else {
        // No unit provided, the real rcontent is the original
        return false;
    }
    log_to_file('unit:'.$unit->code.'-'.$unit->id);

    // Search ACTIVITY
    $activitycode = is_string($ResultadoExtendido->idActividad) ? $ResultadoExtendido->idActividad:0;
    if($activitycode){
        $activity = $DB->get_record('rcommon_books_activities',array('code'=>$activitycode, 'unitid'=>$unit->id, 'bookid'=>$book->id));
        // Activity Code not found
        if(!$activity) return false;
        if($rcontent_original->unitid == $unit->id && $rcontent_original->activityid == $activity->id){
            // Unit and activity match, the real rcontent is the original
            return false;
        }
        log_to_file('activity:'.$activity->code.'-'.$activity->id);
    } else if($rcontent_original->unitid == $unit->id) {
         // Unit match but No activity provided, the real rcontent is the original
         return false;
    }

    $rcontents = false;
    // ALL OK Searching for real Rcontent with activity
    if($activitycode) {
        $rcontents = $DB->get_records('rcontent', array('bookid'=>$book->id, 'unitid'=>$unit->id, 'activityid'=>$activity->id), 'id');
    }
    if(!$rcontents) {
        // Not found with activity Searching for real Rcontent without activity
        $rcontents = $DB->get_records('rcontent', array('bookid'=>$book->id, 'unitid'=>$unit->id), 'id');
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

    return false;
}

function generate_error($codError, $descError, $functionError, $cmid = null) {
    global $DB, $USER, $COURSE;
    try {
        $ret_error = new ResultadoDetalleExtendidoResponse();
        $ret_error->ResultadoDetalleExtendidoResult = new RespuestaResultadoExtendido();

        //error description
        $DetErr = new TipoDetalleError();
        $DetErr->Codigo = $codError;
        $DetErr->Descripcion = $descError;

        $ret_error->ResultadoDetalleExtendidoResult->Resultado = "KO";
        $ret_error->ResultadoDetalleExtendidoResult->DetalleError = $DetErr;


        global $USER;
        //save error on bd
        $tmp = new stdClass();
        $tmp->time = time();
        $tmp->userid = $USER->id;
        $tmp->ip = $_SERVER['REMOTE_ADDR'];
        $tmp->course    =  isset($COURSE->id) ? $COURSE->id : null;
        $tmp->module = 'rcontent';
        $tmp->cmid      =  $cmid;
        $tmp->action = $functionError . "_error";
        $tmp->url = $_SERVER['REQUEST_URI'];
//MARSUPIAL *********** MODIFICAT -> Fixed bug when inserting data in rcommon_errors_log
//2012.03.26 @sarjona
        $tmp->info = addslashes('Error ' . $functionError . ': ' . get_string('code', 'rcontent') . ': ' . $ret_error->ResultadoDetalleExtendidoResult->DetalleError->Codigo . ' - ' . $ret_error->ResultadoDetalleExtendidoResult->DetalleError->Descripcion);
//********** ORIGINAL
//      $tmp->info      =  'Error '.$functionError.': '.get_string('code','rcontent').': '.$ret_error->ResultadoDetalleExtendidoResult->DetalleError->Codigo.' - '.$ret_error->ResultadoDetalleExtendidoResult->DetalleError->Descripcion;
//********** FI
        $DB->insert_record("rcommon_errors_log", $tmp);

        log_to_file("wsSeguimiento failed: " . $descError);
    } catch (Exception $f) {

    }

    return $ret_error;
}

function generate_wsdl() {
    global $CFG;

    if (!is_file("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl") ||
            filemtime("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl") < 1379462400) { // It's necessary to update WSDL after of 2013/09/18 to add ForzarGuardar parameter
        log_to_file("wsSeguimiento: WSDL no exists");
        $strwsdl = '<?xml version="1.0" encoding="utf-8"?>
<wsdl:definitions xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:tm="http://microsoft.com/wsdl/mime/textMatching/" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:mime="http://schemas.xmlsoap.org/wsdl/mime/" xmlns:tns="http://educacio.gencat.cat/agora/seguimiento/" xmlns:s="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/" xmlns:http="http://schemas.xmlsoap.org/wsdl/http/" targetNamespace="http://educacio.gencat.cat/agora/seguimiento/" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/">
  <wsdl:types>
    <s:schema elementFormDefault="qualified" targetNamespace="http://educacio.gencat.cat/agora/seguimiento/">
    <s:element name="WSEAuthenticateHeader" type="tns:WSEAuthenticateHeader" />
    <s:complexType name="WSEAuthenticateHeader">
    <s:sequence>
      <s:element minOccurs="0" maxOccurs="1" name="User" type="s:string" />
      <s:element minOccurs="0" maxOccurs="1" name="Password" type="s:string" />
    </s:sequence>
    <s:anyAttribute />
    </s:complexType>
    <s:element name="ResultadoDetalleExtendido">
        <s:complexType>
          <s:sequence>
            <s:element minOccurs="0" maxOccurs="1" name="ResultadoExtendido" type="tns:SeguimientoExtendido" />
          </s:sequence>
        </s:complexType>
      </s:element>
      <s:complexType name="SeguimientoExtendido">
        <s:sequence>
          <s:element minOccurs="1" maxOccurs="1" name="idUsuario" type="s:string" />
          <s:element minOccurs="1" maxOccurs="1" name="idContenidoLMS" type="s:string" />
          <s:element minOccurs="1" maxOccurs="1" name="idCentro" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="idUnidad" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="UnidadTitulo" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="UnidadOrden" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="idActividad" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="ActividadTitulo" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="ActividadOrden" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="ForzarGuardar" type="tns:TipoForzarGuardar" />
          <s:element minOccurs="0" maxOccurs="1" name="Resultado" type="tns:Resultado" />
          <s:element minOccurs="0" maxOccurs="1" name="Detalles" type="tns:ArrayOfDetalleResultado" />
          <s:element minOccurs="0" maxOccurs="1" default="100" name="SumaPesos" type="s:long" />
        </s:sequence>
      </s:complexType>
      <s:simpleType name="TipoForzarGuardar">
        <s:restriction base="s:int">
          <s:enumeration value="0"/>
          <s:enumeration value="1"/>
      </s:restriction>
      </s:simpleType>
      <s:complexType name="Resultado">
        <s:sequence>
          <s:element minOccurs="0" maxOccurs="1" name="FechaHoraInicio" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="Duracion" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="MaxDuracion" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" default="0" name="MinCalificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" name="Calificacion" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" default="100" name="MaxCalificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" default="1" name="Intentos" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" default="1" name="MaxIntentos" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" default="FINALIZADO" name="Estado" type="tns:TipoEstado" />
          <s:element minOccurs="0" maxOccurs="1" name="Observaciones" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="URLVerResultados" type="s:string" />
        </s:sequence>
      </s:complexType>
      <s:simpleType name="TipoEstado">
        <s:restriction base="s:string">
          <s:enumeration value="NO_INICIADO" />
          <s:enumeration value="INCOMPLETO" />
          <s:enumeration value="FINALIZADO" />';
//MARSUPIAL ********* AFEGIT -> Add POR_CORREGIR and CORREGIDO
//2011.05.17 @mmartinez
        $strwsdl .= '<s:enumeration value="POR_CORREGIR" />
          <s:enumeration value="CORREGIDO" />';
//*********** FI
        $strwsdl .= '</s:restriction>
      </s:simpleType>
      <s:simpleType name="TipoDetalle">
        <s:restriction base="s:string">
          <s:enumeration value="PREGUNTA" />
          <s:enumeration value="COMPETENCIA" />
        </s:restriction>
      </s:simpleType>
      <s:complexType name="ArrayOfDetalleResultado">
        <s:sequence>
          <s:element minOccurs="0" maxOccurs="unbounded" name="DetalleResultado" nillable="true" type="tns:DetalleResultado" />
        </s:sequence>
      </s:complexType>
      <s:complexType name="DetalleResultado">
        <s:sequence>
          <s:element minOccurs="1" maxOccurs="1" name="IdDetalle" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="IdTipoDetalle" type="tns:TipoDetalle" />
          <s:element minOccurs="1" maxOccurs="1" name="Descripcion" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="FechaHoraInicio" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="Duracion" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="MaxDuracion" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="MinCalificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" name="Calificacion" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="MaxCalificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" name="Intentos" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" name="MaxIntentos" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" default="1" name="Peso" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" name="URLVerResultados" type="s:string" />
        </s:sequence>
      </s:complexType>
      <s:element name="ResultadoDetalleExtendidoResponse">
        <s:complexType>
          <s:sequence>
            <s:element minOccurs="0" maxOccurs="1" name="ResultadoDetalleExtendidoResult" type="tns:RespuestaResultadoExtendido" />
          </s:sequence>
        </s:complexType>
      </s:element>
      <s:complexType name="RespuestaResultadoExtendido">
        <s:sequence>
          <s:element minOccurs="1" maxOccurs="1" name="Resultado" type="tns:TipoResultado" />
          <s:element minOccurs="0" maxOccurs="1" name="DetalleError" type="tns:TipoDetalleError" />
        </s:sequence>
      </s:complexType>
      <s:simpleType name="TipoResultado">
        <s:restriction base="s:string">
          <s:enumeration value="OK" />
          <s:enumeration value="KO" />
        </s:restriction>
      </s:simpleType>
      <s:complexType name="TipoDetalleError">
        <s:sequence>
          <s:element minOccurs="1" maxOccurs="1" name="Codigo" type="s:string" />
          <s:element minOccurs="1" maxOccurs="1" name="Descripcion" type="s:string" />
          <s:element minOccurs="1" maxOccurs="1" name="Observaciones" type="s:string" />
        </s:sequence>
      </s:complexType>
    </s:schema>
  </wsdl:types>
  <wsdl:message name="ResultadoDetalleExtendidoWSEAuthenticateHeader">
    <wsdl:part name="WSEAuthenticateHeader" element="tns:WSEAuthenticateHeader" />
  </wsdl:message>
  <wsdl:message name="ResultadoDetalleExtendidoSoapIn">
    <wsdl:part name="parameters" element="tns:ResultadoDetalleExtendido" />
  </wsdl:message>
  <wsdl:message name="ResultadoDetalleExtendidoSoapOut">
    <wsdl:part name="parameters" element="tns:ResultadoDetalleExtendidoResponse" />
  </wsdl:message>
  <wsdl:portType name="SeguimientoSoap">
    <wsdl:operation name="ResultadoDetalleExtendido">
      <wsdl:input message="tns:ResultadoDetalleExtendidoSoapIn" />
      <wsdl:output message="tns:ResultadoDetalleExtendidoSoapOut" />
    </wsdl:operation>
  </wsdl:portType>
  <wsdl:binding name="SeguimientoSoap" type="tns:SeguimientoSoap">
    <soap:binding transport="http://schemas.xmlsoap.org/soap/http" />
    <wsdl:operation name="ResultadoDetalleExtendido">
      <soap:operation soapAction="http://educacio.gencat.cat/agora/seguimiento/ResultadoDetalleExtendido" style="document" />
      <wsdl:input>
        <soap:body use="literal" />
        <soap:header message="tns:ResultadoDetalleExtendidoWSEAuthenticateHeader" part="WSEAuthenticateHeader" use="literal" />
      </wsdl:input>
      <wsdl:output>
        <soap:body use="literal" />
      </wsdl:output>
    </wsdl:operation>
  </wsdl:binding>
  <wsdl:binding name="SeguimientoSoap12" type="tns:SeguimientoSoap">
    <soap12:binding transport="http://schemas.xmlsoap.org/soap/http" />
    <wsdl:operation name="ResultadoDetalleExtendido">
      <soap12:operation soapAction="http://educacio.gencat.cat/agora/seguimiento/ResultadoDetalleExtendido" style="document" />
      <wsdl:input>
        <soap12:body use="literal" />
        <soap12:header message="tns:ResultadoDetalleExtendidoWSEAuthenticateHeader" part="WSEAuthenticateHeader" use="literal" />
      </wsdl:input>
      <wsdl:output>
        <soap12:body use="literal" />
      </wsdl:output>
    </wsdl:operation>
  </wsdl:binding>
  <wsdl:service name="Seguimiento">
    <wsdl:port name="SeguimientoSoap" binding="tns:SeguimientoSoap">
      <soap:address location="' . $CFG->wwwroot . '/mod/rcontent/WebServices/WsSeguimiento/wsSeguimiento.php" />
    </wsdl:port>
    <wsdl:port name="SeguimientoSoap12" binding="tns:SeguimientoSoap12">
      <soap12:address location="' . $CFG->wwwroot . '/mod/rcontent/WebServices/WsSeguimiento/wsSeguimiento.php" />
    </wsdl:port>
  </wsdl:service>
</wsdl:definitions>';
        if (!is_dir("$CFG->dataroot/1")) {
            mkdir("$CFG->dataroot/1");
        }
        if (!is_dir("$CFG->dataroot/1/WebServices")) {
            mkdir("$CFG->dataroot/1/WebServices");
        }
        if (!is_dir("$CFG->dataroot/1/WebServices/WsSeguimiento")) {
            mkdir("$CFG->dataroot/1/WebServices/WsSeguimiento");
        }
        $f = fopen("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl", "w");
        fwrite($f, $strwsdl);
        fclose($f);
        log_to_file("wsSeguimiento: WSDL created");
    }
}

/* test is isset the wsdl file if not create it */
generate_wsdl();

// MARSUPIAL ************ ADDED to avoid the problems with multi-installation
// 2011.06.28 @sarjona
if (isset($_REQUEST['wsdl']) || isset($_REQUEST['WSDL'])) {
    header('Content-type: text/xml');
    $wsdl = file_get_contents("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl");
    print($wsdl);
} else {
    ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache

    $classmap = array('SeguimientoExtendido' => "SeguimientoExtendido", 'Resultado' => "Resultado",
        'DetalleResultado' => "DetalleResultado", 'RespuestaResultadoExtendido' => "RespuestaResultadoExtendido",
        "ResultadoDetalleExtendidoResponse" => "ResultadoDetalleExtendidoResponse");
    $server = new SoapServer("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl");

    $server->addFunction("ResultadoDetalleExtendido");

    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

    $server->handle();
}
/********** ORIGINAL
ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache

$classmap = array('SeguimientoExtendido' => "SeguimientoExtendido", 'Resultado' => "Resultado",
'DetalleResultado' => "DetalleResultado", 'RespuestaResultadoExtendido' => "RespuestaResultadoExtendido",
"ResultadoDetalleExtendidoResponse" => "ResultadoDetalleExtendidoResponse");

$server = new SoapServer("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl");

$server->addFunction("ResultadoDetalleExtendido");

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

$server->handle();
 */
//********** FI