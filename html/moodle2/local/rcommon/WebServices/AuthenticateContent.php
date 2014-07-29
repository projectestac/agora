<?php

require_once($CFG->dirroot.'/local/rcommon/wslib.php');
require_once($CFG->dirroot.'/local/rcommon/locallib.php');

/**
 * Web Service to authenticate users credentials
 * @param object $data -> mod values
 * @return obj -> web service response
 */
function AuthenticateUserContent($data, $usr_creden = false, $showurl = true){
    global $CFG, $DB, $USER;

        $from = optional_param('from', '', PARAM_TEXT);

        if (!isset($data->bookid)||($book = $DB->get_record('rcommon_books', array('id' => $data->bookid))) == false){
            print_error(get_string('nobookid','local_rcommon'));
            //save error on bd
        } elseif (($publisher = $DB->get_record('rcommon_publisher', array('id' => $book->publisherid))) == false){
            print_error(get_string('nopublisher','local_rcommon'));
            //save error on bd
        }
		if(!$usr_creden){
        	$usr_creden = credentials::get_by_user_isbn($USER->id, $book->isbn);
		}

        if (!$usr_creden){
			// Moved $url variable to use it also in the else clause and changed the default behavior
            /*set url*/
            if (isset($_SERVER)) {
                $SERVER_NAME = $_SERVER['SERVER_NAME'];
                $SERVER_PORT = $_SERVER['SERVER_PORT'];
                $SCRIPT_NAME = $_SERVER['REQUEST_URI'];
                $HTTPS = isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : (isset($HTTP_SERVER_VARS['HTTPS']) ? $HTTP_SERVER_VARS['HTTPS'] : 'off');
            } elseif (isset($HTTP_SERVER_VARS)) {
                $SERVER_NAME = $HTTP_SERVER_VARS['SERVER_NAME'];
                $SERVER_PORT = $HTTP_SERVER_VARS['SERVER_PORT'];
                $SCRIPT_NAME = $HTTP_SERVER_VARS['REQUEST_URI'];
                $HTTPS = isset($HTTP_SERVER_VARS['HTTPS']) ? $HTTP_SERVER_VARS['HTTPS'] : 'off';
            }
            if ($SERVER_PORT == 80) {
                $SERVER_PORT = '';
            } else {
                $SERVER_PORT = ':' . $SERVER_PORT;
            }
            if ($HTTPS == '1' || $HTTPS == 'on') {
                $SCHEME = 'https';
            } else {
                $SCHEME = 'http';
            }
            $url  = "$SCHEME://$SERVER_NAME$SERVER_PORT$SCRIPT_NAME";

            redirect($CFG->wwwroot.'/local/rcommon/formInsert.php?url='.base64_encode($url).'&isbn='.$book->isbn);
            exit;
            //save error on bd
        }
        elseif ($data->activityid != 0 && ($activ = $DB->get_record('rcommon_books_activities', array('id' => $data->activityid))) == false){
            print_error('noactivity','local_rcommon');
            //save error on bd
        }
        //look for the group if he has anyone assigned
        $grupo = $DB->get_recordset_sql("SELECT GRUPO.id
                        FROM {user} USERS
                        JOIN {role_assignments} ra ON ra.userid = USERS.id
                        JOIN {role} r ON ra.roleid = r.id
                        JOIN {context} con ON ra.contextid = con.id
                        JOIN {course} COURSE ON COURSE.id = con.instanceid
                        AND con.contextlevel =50
                        JOIN {groups} GRUPO ON GRUPO.courseid = COURSE.id
                        JOIN {groups_members} MEMBER ON MEMBER.groupid = GRUPO.id
                        AND MEMBER.userid = USERS.id
                        WHERE COURSE.id = {$data->course}
                        AND USERS.id = {$USER->id}");

        foreach ($grupo as $grp) {
            $grupoid = $grp->id;
        }

        try {

            $client = get_marsupial_ws_client($publisher, true);

            $params = new stdClass();
            $params->Credencial = new SoapVar($usr_creden->credentials, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $params->ISBN = new SoapVar($book->isbn, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $params->IdUsuario = new SoapVar($usr_creden->euserid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            //$params->NombreApe = new SoapVar($USER->firstname." ".$USER->lastname, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");

            //convert rcommon_teacherroles to array
            $rcommon_teacherroles = explode(',', get_config('rcommon','teacherroles'));
            //get user role

            // To avoid problems because in some cases the courseid was null
            $context = context_course::instance($data->course);

            $iduserrole = array();
            if ($roles = get_user_roles($context, $USER->id)) {
                foreach ($roles as $role) {
                    $iduserrole = $role->roleid;
                }
            }
            //set role string
            $rolestring = "ESTUDIANTE";
            if (in_array($iduserrole, $rcommon_teacherroles)){
                $rolestring = "PROFESOR";
            }
            //check if the web service is prepared to receive rol parameter
            $parsed_wsdl = rcommon_get_wsdl($publisher->urlwsauthentication.'?wsdl');
            if (textlib::strpos($parsed_wsdl, 'name="Rol"') && $rolestring == "PROFESOR"){
                $params->Rol = new SoapVar($rolestring, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            }

            $params->IdCurso = new SoapVar($data->course, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $centerid = (isset($CFG->center)) ? $CFG->center : '';
            $params->IdCentro = new SoapVar($centerid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $params->URLResultado = new SoapVar("$CFG->wwwroot/mod/rcontent/WebServices/wsSeguimiento.php", XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $params->IdContenidoLMS = new SoapVar($data->id, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $unitid=(isset($unit->code))?$unit->code:'';
            $params->IdUnidad = new SoapVar($unitid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $activid=(isset($activ->code))?$activ->code:'';
            $params->IdActividad = new SoapVar($activid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");

            //he has assigned a group
            if (isset($grupoid)) {
                $params->IdGrupo = new SoapVar($grupoid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            }

            $response = $client->__soapCall("AutenticarUsuarioContenido", array($params));
        } catch (Exception $e) {
            echo '<script type="text/javascript">window.alert("' . get_string('bad_wsdl_connection', 'local_rcommon') . '"); history.go(-1);</script>';
            echo $OUTPUT->notification(get_string('bad_wsdl_connection', 'local_rcommon'));
            die();
        }

        //test the response to set parameters name to the standars
        foreach ($response->AutenticarUsuarioContenidoResult as $key => $value) {
        	switch(textlib::strtolower($key)) {
        		case "descripcion":
        			$response->AutenticarUsuarioContenidoResult->Descripcion = $value;
        		    break;
        		case "codigo":
        			$response->AutenticarUsuarioContenidoResult->Codigo = $value;
        			break;
        		case "url":
        			$response->AutenticarUsuarioContenidoResult->URL = $value;
        			break;
        	}
        }

        log_to_file("wsAutenthication request: ".$client->__getLastRequest());
        log_to_file("wsAutenthication response: ".$client->__getLastResponse());

        //check if there are any response error
        if ($response->AutenticarUsuarioContenidoResult->Codigo <= 0 ) {
            //test if isset the url
            //
            $urlok =  false;
            $message  =  "Instance ID: ".$data->id.", Text: ".get_string('wsautenticationerror',$data->module=='check_credentials'?'rcontent':$data->module).", Code: ".$response->AutenticarUsuarioContenidoResult->Codigo.", Detail: ".$response->AutenticarUsuarioContenidoResult->Descripcion;
            if (isset($response->AutenticarUsuarioContenidoResult->URL)) {
                $urlok = ", URL: ".test_ws_url($response->AutenticarUsuarioContenidoResult->URL);
            }

            if($urlok){
                $message  .= ", URL: ".$urlok;
            }

            rcommon_ws_error('AuthenticateUserContent', $message, $data->module, $data->cmid, $data->course);

            $msg="";

            if($urlok && $showurl) {
                $msg='<br><br>'.@get_string('urlmoreinfo','local_rcommon',$response->AutenticarUsuarioContenidoResult->URL);
                echo '<script type="text/javascript" language"javascript">window.open("'.$response->AutenticarUsuarioContenidoResult->URL.'","","fullscreen=yes,toolbar=yes,menubar=yes,scrollbars=yes,resizable=yes");</script>';
            } else {
            	return $response;
            }

            //set the description to show
            $desctext = get_string('error_code_'.$response->AutenticarUsuarioContenidoResult->Codigo, 'local_rcommon');
            if (textlib::substr($desctext, 0, 2) == '[['){
            	  $desctext = $response->AutenticarUsuarioContenidoResult->Codigo;
            }

            print_error(get_string('error_authentication','local_rcommon').$response->AutenticarUsuarioContenidoResult->Codigo.', '.$desctext.$msg);
        } else{
        	//print_r($response);
            return $response;
        }
}
