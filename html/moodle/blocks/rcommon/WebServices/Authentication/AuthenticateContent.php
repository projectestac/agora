<?php

require_once($CFG->dirroot.'/blocks/rcommon/WebServices/lib.php');


/**
 * Web Service to authenticate users credentials
 * @param object $data -> mod values
 * @return obj -> web service response
 */
// MARSUPIAL ************* AFEGIT -> New functionality to manage credentials
// 2012.06.06 @mmartinez
function AuthenticateUserContent($data, $usr_creden = false, $showurl = true){
// ************ ORIGINAL
//function AuthenticateUserContent($data){
// ************ FI	

    global $CFG, $USER, $SESSION;

    //try { 
// MARSUPIAL *************** AFEGIT -> take a get parameter to control when come from atria
        $from = optional_param('from', '', PARAM_RAW);
//************* END
        if (!isset($data->bookid)||($book = get_record('rcommon_books', 'id', $data->bookid)) == false){
            error(get_string('nobookid','blocks/rcommon'));
            //save error on bd 
        }
        elseif (($publisher = get_record('rcommon_publisher', 'id', $book->publisherid)) == false){
            error(get_string('nopublisher','blocks/rcommon'));
            //save error on bd
        }
// MARSUPIAL ************ MODIFICAT -> New functionality to manage credentials
// 2012.06.06 @mmartinez
        $usr_creden = (!$usr_creden)? get_record_sql("SELECT * FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn='".$book->isbn."' AND euserid='".$USER->id."'", true): $usr_creden;
		
		if ($usr_creden && empty($usr_creden->credentials)){
			delete_records('rcommon_user_credentials', 'id', $usr_creden->id);
			$usr_creden = false;
		}
		
        if (!$usr_creden){
// ************* ORIGINAL
		//elseif (($usr_creden = get_record_sql("SELECT * FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn='".$book->isbn."' AND euserid='".$USER->id."'",true)) == false){
// ************* FI
// MARSUPIAL *************** AFEGIT -> when we don't found credentials call to atriaSync function
// MARSUPIAL ********** AFEGIT -> Use the new variable "useatria"
// 2011.09.19 @mmartinez

// MARSUPIAL ********** MODIFICAT -> Moved $url variable to use it also in the else clause and changed the default behavior if $CFG->useatria is not specified to make the module compatible backwards
// 2011.09.20 @sarjona


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
// MARSUPIAL ************* DELETED -> Authenticate method take out Atria Sync
// 2012.09.03 @mmartinez
        	/*if ((!isset($CFG->useatria) || $CFG->useatria) && $from != "atria"){
                // ********** ORIGINAL
                /*
        	if (isset($CFG->useatria) && $CFG->useatria && $from != "atria"){
                */
                // ********** FI
	// ********** ORIGINAL
            //if ($from != "atria"){
	// ********** FI
                /*include("$CFG->dirroot/atria/atria.php"); 
                $url .= "&from=atria";
                /*call atria function*/
                /*atriaSync($url,$USER->id,$book->isbn,$data->course);
                if (($usr_creden = get_record_sql("SELECT * FROM {$CFG->prefix}rcommon_user_credentials WHERE isbn='".$book->isbn."' AND euserid='".$USER->id."'",true)) == false){
                    error(get_string('nocredentials','blocks/rcommon'));
                }
            }else{*/
// **************** FI
        	
// MARSUPIAL ********** MODIFICAT -> Redirect to form to let user write its own credential if it's not found in database
// 2011.09.20 @sarjona
// MARSUPIAL ********** MODIFICAT -> Use moodle core function to do the redirect
// 2011.09.21 @mmartinez
//MARSUPIAL *********** MODIFICAT -> Insert form key
                redirect($CFG->wwwroot.'/blocks/rcommon/formInsert.php?id='.$USER->id.'&url='.base64_encode($url).'&isbn='.$book->isbn);
//********** ORIGINAL
                //redirect($CFG->wwwroot.'/atria/atriaFormInsert.php?id='.$USER->id.'&url='.base64_encode($url).'&isbn='.$book->isbn);
//********** FI
//********** ORIGINAL
                //echo '<script>document.location.href="'.$CFG->wwwroot.'/atria/atriaFormInsert.php?id='.$USER->id.'&url='.  base64_encode($url).'&isbn='.$book->isbn.'";</script>';
//********** FI
                exit;
                // ********** ORIGINAL
                /*
            	error(get_string('nocredentials','blocks/rcommon'));
            	save error on bd
                */
                // ********** FI
            //}
//*********** END
        }
    //    elseif (($auth_creden = get_record('rcommon_wsauth_credentials', 'wsurl', $usr_creden->urlwsauthentication)) == false){
    //        error('wsurl not found.');
    //    }
        elseif ($data->unitid != 0 && ($unit = get_record('rcommon_books_units', 'id', $data->unitid)) == false){
            error(get_string('nounit','blocks/rcommon'));
            //save error on bd
        }
        elseif ($data->activityid != 0 && ($activ = get_record('rcommon_books_activities', 'id', $data->activityid)) == false){
            error('noactivity','blocks/rcommon');
            //save error on bd
        }
        //look for the group if he has anyone assigned
        $grupo = get_recordset_sql("SELECT GRUPO.id
                        FROM {$CFG->prefix}user USERS
                        JOIN {$CFG->prefix}role_assignments ra ON ra.userid = USERS.id
                        JOIN {$CFG->prefix}role r ON ra.roleid = r.id
                        JOIN {$CFG->prefix}context con ON ra.contextid = con.id
                        JOIN {$CFG->prefix}course COURSE ON COURSE.id = con.instanceid
                        AND con.contextlevel =50
                        JOIN {$CFG->prefix}groups GRUPO ON GRUPO.courseid = COURSE.id
                        JOIN {$CFG->prefix}groups_members MEMBER ON MEMBER.groupid = GRUPO.id
                        AND MEMBER.userid = USERS.id
                        WHERE COURSE.id ={$data->course}
                        AND USERS.id ={$USER->id}");
            
        while ($grp = rs_fetch_next_record($grupo))  
        {
            $grupoid = $grp->id;
        } 
        
// MARSUPIAL ************ AFEGIT -> Added proxy option
// 2012.08.30 @mmartinez
        $options = array('trace' => 1);
        if ($CFG->proxytype == 'HTTP' && !empty($CFG->proxyhost)){
        	$options['proxy_host'] = $CFG->proxyhost;        	
        	if (!empty($CFG->proxyport)){
        		$options['proxy_port'] = $CFG->proxyport;
        	}
        	if (!empty($CFG->proxyuser)){
        		$options['proxy_login'] = $CFG->proxyuser;
        	}
        	if (!empty($CFG->proxypassword)){
        		$options['proxy_password'] = $CFG->proxypassword;
        	}
        }
// ************* FI
        
// MARSUPIAL *********** MODIFICAT -> Added proxy option
// 2012.08.30 @mmartinez        
        $client = new soapclient($publisher->urlwsauthentication.'?wsdl', $options);
// *********** ORIGINAL
		//$client = new soapclient($publisher->urlwsauthentication.'?wsdl', array('trace' => 1));
// ************* FI

        $auth = array('User' => $publisher->username, 'Password' => $publisher->password);
        
        $namespace=rcommond_wdsl_parser($publisher->urlwsauthentication.'?wsdl');

        $header = new SoapHeader($namespace, "WSEAuthenticateHeader", $auth);
        $client->__setSoapHeaders(array($header)); 
       
        $params->Credencial = new SoapVar($usr_creden->credentials, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        $params->ISBN = new SoapVar($book->isbn, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        $params->IdUsuario = new SoapVar($usr_creden->euserid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        //$params->NombreApe = new SoapVar($USER->firstname." ".$USER->lastname, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        
//MARSUPIAL ********** AFEGIT -> Send role parameter depending on the roles seleccted in the roles lists of the settings
//2011.05.16 @mmartinez
        //convert rcommon_studentroles to array
        $rcommon_teacherroles = split(",", $CFG->rcommon_teacherroles);
        //get user role
//MARSUPIAL ********** MODIFICAT -> To avoid problems because in some cases the courseid was null
//2011.09.16 @sarjona
        $context = get_context_instance(CONTEXT_COURSE,$data->course);
//************** ORIGINAL
        /* $context = get_context_instance(CONTEXT_COURSE,$SESSION->cal_course_referer);*/
//************** FI
		$iduserrole = array();
		if ($roles = get_user_roles($context, $USER->id)) {
		    foreach ($roles as $role) {
		        $iduserrole = $role->roleid;
		    }
		}
		//set role string
		$rolestring="ESTUDIANTE";
        if (in_array($iduserrole, $rcommon_teacherroles)){
        	$rolestring = "PROFESOR";
        }
        //check if the web service is prepared to receive rol parameter
        $parsed_wsdl = rcommon_get_wsdl($publisher->urlwsauthentication.'?wsdl');
        if (strpos($parsed_wsdl, 'name="Rol"') && $rolestring == "PROFESOR"){
            $params->Rol = new SoapVar($rolestring, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        }
//*********** FI

        $params->IdCurso = new SoapVar($data->course, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        $centerid=(isset($CFG->center))?$CFG->center:'';
        $params->IdCentro = new SoapVar($centerid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        $params->URLResultado = new SoapVar("$CFG->wwwroot/mod/rcontent/WebServices/WsSeguimiento/wsSeguimiento.php", XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        $params->IdContenidoLMS = new SoapVar($data->id, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        $unitid=(isset($unit->code))?$unit->code:'';
        $params->IdUnidad = new SoapVar($unitid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        $activid=(isset($activ->code))?$activ->code:'';
        $params->IdActividad = new SoapVar($activid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");

        //he has assigned a group
        if (isset($grupoid))
            $params->IdGrupo = new SoapVar($grupoid, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
    
        $response = $client->__soapCall("AutenticarUsuarioContenido", array($params));
        
        //test the response to set parameters name to the standars
        foreach ($response->AutenticarUsuarioContenidoResult as $key=>$value){
        	switch(strtolower($key)){
        		case "descripcion":
        			$response->AutenticarUsuarioContenidoResult->Descripcion=$value;
        		    break;
        		case "codigo":
        			$response->AutenticarUsuarioContenidoResult->Codigo=$value;
        			break;
        		case "url":
        			$response->AutenticarUsuarioContenidoResult->URL=$value;
        			break;
        	}
        	
        }
        
        log_to_file("wsAutenthication request: ".$client->__getLastRequest(),'rcommon_tracer');
        log_to_file("wsAutenthication response: ".$client->__getLastResponse(),'rcommon_tracer');
        
        //echo("REQUEST: " . $client->__getLastRequest() . "\n<br><br>RESPONSE: ".$client->__getLastResponse()."<br><br>");
        //print_r($response); 
        
        /*//check if the response is empty
        if (!isset($response->AutenticarUsuarioContenidoResult->Codigo)||empty($response->AutenticarUsuarioContenidoResult)){ 
            $tmpresponse=rcommon_xml2array($client->__getLastResponse());
            if(count($tmpresponse['S:Envelope']['S:Body']['ns2:AutenticarUsuarioContenidoResponse']['AutenticarUsuarioContenidoResult'])==3){
                $response->AutenticarUsuarioContenidoResult->Codigo=$tmpresponse['S:Envelope']['S:Body']['ns2:AutenticarUsuarioContenidoResponse']['AutenticarUsuarioContenidoResult']['Codigo']['value'];
                $response->AutenticarUsuarioContenidoResult->Descripcion=$tmpresponse['S:Envelope']['S:Body']['ns2:AutenticarUsuarioContenidoResponse']['AutenticarUsuarioContenidoResult']['Descripcion']['value'];
                $response->AutenticarUsuarioContenidoResult->Url=$tmpresponse['S:Envelope']['S:Body']['ns2:AutenticarUsuarioContenidoResponse']['AutenticarUsuarioContenidoResult']['URL']['value'];
            }else{
                error('Error: empty response');
            }
        }*/
        
        //check if there are any response error
        if ($response->AutenticarUsuarioContenidoResult->Codigo <= 0 ){

            //test if isset the url
            $urlok='';
            if (isset($response->AutenticarUsuarioContenidoResult->URL)){
			          $curl=curl_init();        
				        curl_setopt($curl, CURLOPT_URL, $response->AutenticarUsuarioContenidoResult->URL);     
				        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				        curl_setopt($curl, CURLOPT_HEADER, false);    
				        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);  
				        
// MARSUPIAL ************ AFEGIT -> Added proxy option
// 2012.08.30 @mmartinez
				        if ($CFG->proxytype == 'HTTP' && !empty($CFG->proxyhost)){
				        	curl_setopt($curl, CURLOPT_PROXY, $CFG->proxyhost);
				        	if (!empty($CFG->proxyport)){
				        		curl_setopt($curl, CURLOPT_PROXYPORT, $CFG->proxyport);
				        	}
				        	if (!empty($CFG->proxyuser)){
				        		curl_setopt($curl, CURLOPT_PROXYUSERPWD, $CFG->proxyuser . ':' . $CFG->proxypassword);
				        	}
				        }
// ************** FI
				        $urlok = curl_exec($curl);
				        curl_close($curl);
            }
            
            //save error on bd
            $tmp = new stdClass();
            $tmp->time      =  time();
            $tmp->userid    =  $USER->id;
            $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
            $tmp->course    =  $data->course;
            $tmp->module    =  $data->module;
            $tmp->cmid      =  $data->cmid;
            $tmp->action    =  "wsautenticationerror";
            $tmp->url       =  $_SERVER['REQUEST_URI'];
            $tmp->info      =  str_replace("'","''","Instance ID: ".$data->id.", Text: ".get_string('wsautenticationerror',$data->module).", Code: ".$response->AutenticarUsuarioContenidoResult->Codigo.", Detail: ".$response->AutenticarUsuarioContenidoResult->Descripcion);
            if ($urlok)
                $tmp->info      =  $tmp->info.", URL: ".$response->AutenticarUsuarioContenidoResult->URL;
                
            insert_record("rcommon_errors_log",$tmp);
            
            $msg="";

            if($urlok && $showurl)
            {
                $msg='<br><br>'.@get_string('urlmoreinfo','blocks/rcommon',$response->AutenticarUsuarioContenidoResult->URL);
                echo '<script type="text/javascript" language"javascript">window.open("'.$response->AutenticarUsuarioContenidoResult->URL.'","","fullscreen=yes,toolbar=yes,menubar=yes,scrollbars=yes,resizable=yes");</script>';
            } else {
            	return $response;
            }
            
            //set the description to show
            $desctext = get_string('error_code_'.$response->AutenticarUsuarioContenidoResult->Codigo, 'blocks/rcommon');
            if (substr($desctext, 0, 2) == '[['){
            	  $desctext = $response->AutenticarUsuarioContenidoResult->Codigo;
            }
            
            error(get_string('error_authentication','blocks/rcommon').$response->AutenticarUsuarioContenidoResult->Codigo.', '.$desctext.$msg);
        }
        else{
        	//print_r($response);
            return $response;
        }
    /*}
    catch(Exception $fault) {
    	  //print_r($client->__getLastRequest());  //debug mode
    	  //print_r($client->__getLastResponse());  //debug mode
        //echo "Error: ". $fault->getMessage();  //debug mode
        //save error on bd
        $tmp = new stdClass();
        $tmp->time      =  time();
        $tmp->userid    =  $USER->id;
        $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
        $tmp->course    =  $data->course;
        $tmp->module    =  $data->module;
        $tmp->cmid      =  $data->cmid;
        $tmp->action    =  "wsautenticationerror";
        $tmp->url       =  $_SERVER['REQUEST_URI'];
        $tmp->info      =  $fault->getMessage();
        insert_record("rcommon_errors_log",$tmp);
    } */   
}

?>
