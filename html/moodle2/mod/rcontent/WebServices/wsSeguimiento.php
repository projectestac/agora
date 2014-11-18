<?php

require_once('../../../config.php');
require_once('wsSeguimiento.lib.php');
require_once($CFG->dirroot . '/local/rcommon/wslib.php');

class wsSeguimiento{

    private $user = false;
    private $password = false;

    function WSEAuthenticateHeader($header){
        log_to_file("wsSeguimiento header: " . serialize($header));
        $header = rcommon_object_to_array_lower($header);
        $this->user = isset($header['user']) ? $header['user'] : false;
        $this->password = isset($header['password']) ? $header['password'] : false;
    }

    function ResultadoDetalleExtendido($Resultado) {
        if (!$this->user || !$this->password) {
            $ret = generate_error("Autenticacion", "", "ResultadoDetalleExtendido");
        } else {
            global $HTTP_RAW_POST_DATA;
            log_to_file("wsSeguimiento XMLrequest: " . $HTTP_RAW_POST_DATA);
            log_to_file("wsSeguimiento request: " . serialize($Resultado));
            $ret = get_ResultadoDetalleExtendido($Resultado->ResultadoExtendido, $this->user, $this->password);
        }

        log_to_file("wsSeguimiento response: " . serialize($ret));
        return $ret;
    }
}

if (isset($_REQUEST['wsdl']) || isset($_REQUEST['WSDL'])) {
    header('Content-type: text/xml');
    include_once("$CFG->dirroot/mod/rcontent/WebServices/wsSeguimiento_wsdl.php");
} else {
    ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache

    $classmap = array('SeguimientoExtendido' => 'SeguimientoExtendido',
                        'Resultado' => 'Resultado',
                        'DetalleResultado' => 'DetalleResultado',
                        'RespuestaResultadoExtendido' => 'RespuestaResultadoExtendido',
                        'ResultadoDetalleExtendidoResponse' => 'ResultadoDetalleExtendidoResponse');
    $server = new SoapServer("$CFG->wwwroot/mod/rcontent/WebServices/wsSeguimiento.php?wsdl");

    $server->setClass("wsSeguimiento");
    //$server->addFunction("ResultadoDetalleExtendido");
    $server->addFunction(SOAP_FUNCTIONS_ALL);

    $server->handle();
}
