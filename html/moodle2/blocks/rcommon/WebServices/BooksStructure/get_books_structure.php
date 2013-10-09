<?php
require_once($CFG->dirroot."/config.php"); 
require_once($CFG->dirroot.'/blocks/rcommon/WebServices/lib.php'); 

function get_all_books_structure($publisherid = 0, $isbn = '')
{
    global $CFG, $DB;

    set_time_limit(0);
    
    $ret = true;
    
    try
    {
        $select = "SELECT * FROM ".$CFG->prefix."rcommon_publisher";
        if ($publisherid != 0)
                $select = $select." WHERE id = ".$publisherid;
        
        if ($publishers = $DB->get_records_sql($select))
        {
            foreach($publishers as $pub)
            {
                echo "<br> - ".$pub->name;
                
                if ($pub->urlwsbookstructure != '')
                    $ret = $ret && get_books_structure_publisher($pub->id, $pub->urlwsbookstructure, $pub->username, $pub->password, $isbn);
            }
        }
        else
            $ret = false;
    }
    catch(Exception $fault) 
    {
        //echo "Error: ". $fault->getMessage();
        $ret = false;

        //test if isset the url
        global $USER;
        //save error on bd
        $tmp = new stdClass();
        $tmp->time      =  time();
        $tmp->userid    =  $USER->id;
        $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
        //$tmp->course    =  $data->course;
        //$tmp->module    =  $data->module;
        //$tmp->cmid      =  $data->cmid;
        $tmp->action    =  "get_all_books_structure_error";
        $tmp->url       =  $_SERVER['REQUEST_URI'];
        
        $tmp->info      =  'Error get_all_books_structure: '.$fault->getMessage();
            
        $DB->insert_record("rcommon_errors_log", $tmp);
    }    

    return $ret;    
}


function get_books_structure_publisher($publisherid, $wsurl_contenido, $user, $password, $isbn = '')
{
    global $CFG, $DB;
    set_time_limit(0);
    
    try
    {
        if ($ret = get_books($wsurl_contenido, $user, $password))
        {        
            if (isset($ret->ObtenerTodosResult->Codigo) == false)
            {
            	$resp_libros = rcommon_xml2array($ret);
                $keys = array("Envelope", "Body", "ObtenerTodosResponse", "ObtenerTodosResult", "Catalogo", "libros", "libro");
                $arraylibros = rcommond_findarrayvalue($resp_libros, $keys);
                
// MARSUPIAL ************ AFEGIT -> Fix bug, when there is just one received book
// 2011.09.29 @mmartinez
                if (!isset($arraylibros[0])){
                	$arraylibros = array(0 => $arraylibros);
                }
// *********** FI
                
                if ($arraylibros != ""){
	                //foreach($resp_libros["soap:Envelope"]["soap:Body"]["ObtenerTodosResponse"]["ObtenerTodosResult"]["Catalogo"]["libros"]["libro"] as $li)
	                foreach($arraylibros as $li)
	                {
	                	$instance = new stdClass();
	                    //$cod_isbn = $li["isbn"]["value"];
	                    $keys = array("isbn", "value");
	                    $cod_isbn = rcommond_findarrayvalue($li, $keys);
	
	                    //si se ha especificado un isbn guarda el libro
	                    if ($isbn == '' || $cod_isbn == $isbn)
	                    {
	
	                        //print_r("<br>ISBN: ".$li["isbn"]["value"]);
	                        print_r("<br>ISBN: ".$cod_isbn." -- ");
	                                                    
	                        //obtiene los datos del indice del libro
	                        $ret = get_book_structure($wsurl_contenido, $user, $password, $cod_isbn);
	
	                        if (isset($ret->ObtenerEstructuraResult->Codigo) == false)
	                        {
	                            
	                            //transforma xmlresponse a array
	                            $resp_indice = rcommon_xml2array($ret);
	                            

//MARSUPIAL *********** MODIFICAT -> Fixed bug, when there is just one unit 
//2011.10.17 @mmartinez
	                            //selecciona el array de unidades
                                $keys = array("Envelope", "Body", "ObtenerEstructuraResponse", "ObtenerEstructuraResult", "Libros", "libro", "unidades", "unidad");
	                            $unidades_xml = rcommond_findarrayvalue($resp_indice, $keys);
	                            
	                            if ($unidades_xml && !array_key_exists('0', $unidades_xml)){
                                	//echo "<br>-----------------<br>Units before: "; print_r($unidades_xml); echo "<br>-----------------";
                                	$unidades_xml = array($unidades_xml);
                                    //echo "<br>Units after:"; print_r($unidades_xml); echo "<br>-----------------<br>";
                                }
	                            
//*********** ORIGINAL
	                            /*$keys = array("Envelope", "Body", "ObtenerEstructuraResponse", "ObtenerEstructuraResult", "Libros", "libro", "unidades", "unidad", "id");
	                            $arrayvalue = rcommond_findarrayvalue($resp_indice, $keys);
	                            
	                            //selecciona el array de unidades dependiendo del numero de instancias  
	                            //if (isset($resp_indice["soap:Envelope"]["soap:Body"]["ObtenerEstructuraResponse"]["ObtenerEstructuraResult"]["Libros"]["libro"]["unidades"]["unidad"]["id"]))
	                            if ($arrayvalue != false)
	                            {
	                                $keys = array("Envelope", "Body", "ObtenerEstructuraResponse", "ObtenerEstructuraResult", "Libros", "libro", "unidades", "unidad");
	                                $unidades_xml = rcommond_findarrayvalue($resp_indice, $keys);
	                                //$unidades_xml = $resp_indice["soap:Envelope"]["soap:Body"]["ObtenerEstructuraResponse"]["ObtenerEstructuraResult"]["Libros"]["libro"]["unidades"];
	                            }
	                            else
	                            {
	                                $keys = array("Envelope", "Body", "ObtenerEstructuraResponse", "ObtenerEstructuraResult", "Libros", "libro", "unidades", "unidad");
	                                $unidades_xml = rcommond_findarrayvalue($resp_indice, $keys);
	                                //$unidades_xml = $resp_indice["soap:Envelope"]["soap:Body"]["ObtenerEstructuraResponse"]["ObtenerEstructuraResult"]["Libros"]["libro"]["unidades"]["unidad"];
	                            }*/
//*********** FI	
	                            
	                            // guarda los datos del libro
	                            
	                            //$instance->isbn = $li["isbn"]["value"];
	                            $keys = array("isbn", "value");
	                            $instance->isbn = rcommond_findarrayvalue($li, $keys);
	                            //$instance->name = str_replace("'", "''", $li["titulo"]["value"]);
	                            $keys = array("titulo", "value");
// MARSUPIAL ********** MODIFICAT -> Addslashes
// 2011.10.24 @mmartinez
	                            $instance->name = addslashes(rcommond_findarrayvalue($li, $keys));
// *********** ORIGINAL
                                //$instance->name = substr("'", "''", rcommond_findarrayvalue($li, $keys));
// *********** FI
//MARSUPIAL ********** AFEGIT -> Check that book name isn't large than 255 caracters
//2011.06.02 @mmartinez
                                if (strlen($instance->name) > 255){
                                	$instance->name = substr($instance->name, 0, 255);
                                }
//********* FI
	                            //$instance->summary = str_replace("'", "''", $li["titulo"]["value"]);
	                            $keys = array("titulo", "value");
// MARSUPIAL ********** MODIFICAT -> Addslashes
// 2011.10.24 @mmartinez
	                            $instance->summary = addslashes(rcommond_findarrayvalue($li, $keys));
// *********** ORIGINAL
                                //$instance->summary = substr("'", "''", rcommond_findarrayvalue($li, $keys));
// *********** FI
//MARSUPIAL ********** AFEGIT -> Check that book summary isn't large than 1024 caracters
//2011.06.02 @mmartinez
                                if (strlen($instance->summary) > 1024){
                                	$instance->summary = substr($instance->summary, 0, 1024);
                                }
//********* FI
	                            //$instance->format = str_replace("'", "''", $li["formato"]["value"]);
	                            $keys = array("formato", "value");
	                            $instance->format = strtolower(str_replace("'", "''", rcommond_findarrayvalue($li, $keys)));
	
//********** MODIFICAT MARSUPIAL - if there is no level saves
	                            
	                            //$level = $DB->get_record_sql("Select id FROM ".$CFG->prefix."rcommon_level WHERE code = '".$li["nivel"]["value"]."'");
	                            $keys = array("nivel", "value");
	                            $nivel_libro = rcommond_findarrayvalue($li, $keys);
	                            
//********** AFEGIT MARSUPIAL - if level is empty assign the default level 'SENSE NIVELL'
	                            
	                            if ($nivel_libro == null or $nivel_libro == '')
	                                $nivel_libro = 'SENSE NIVELL';
	
//********** 
	                            
	                            if ($level = $DB->get_record_sql("Select id FROM ".$CFG->prefix."rcommon_level WHERE code = '".$nivel_libro."'"))
	                            {
	                                $instance->levelid = $level->id;
	                            } else {
	                                //if the level does not exist create it
	                                unset($instance_level);
	                                
	                                $instance_level = new stdClass();
	                                $instance_level->name = $nivel_libro;
	                                $instance_level->code = $nivel_libro;
	                                $instance_level->timemodified = time();
	                                $instance_level->timecreated = time();
	
	                                $levelid = $DB->insert_record('rcommon_level', $instance_level);
	                            	$instance->levelid = $levelid;
	                            }
	//**********    
	                            $instance->publisherid = $publisherid;
	                            $instance->timemodified = time();
	                            $instance->structureforaccess = (count($unidades_xml) > 0)? 1 : 0;
	                            
	                            /*test that de abligatori fields aren't empty*/
	                            $obligatoryarray = array('isbn', 'levelid', 'format', 'summary');
	                            $obligatoryerror=false;
	                            foreach($obligatoryarray as $value){
	                            	if($instance->$value==''){
	                            		echo "KO! -- <span style='color: red;'>Obligatory parameter <b>".$value."</b> not found!</span>";
	                            		$obligatoryerror=true;
	                            	}
	                            }
	                            if ($obligatoryerror){
	                            	continue;
	                            }
	
	                            $select = "WHERE isbn='".$cod_isbn."'";
	
	                            if (!$regbook = $DB->get_record_sql('SELECT id FROM '.$CFG->prefix.'rcommon_books' .' '. $select))
	                            {
	                                $instance->timecreated = time();
	                                $bookid = $DB->insert_record('rcommon_books', $instance);
	                                echo "OK";
	                            }
	                            else
	                            {
	                                $instance->id = $regbook->id;
	                                $bookid = $regbook->id;
	                                $DB->update_record('rcommon_books', $instance);
	                                echo "OK";
	                            }
	
	                            
	                            //if exists units
	                            if ($unidades_xml != false)
	                            {
	                                //recorre las unidades                        
	                                foreach($unidades_xml as $un)
	                                {
	                                    //echo "<br>UNIDAD: <pre>"; print_r($un); echo "</pre>";
	                                    unset($instance);
	                                
	                                    $instance = new stdClass();
	                                    $instance->bookid = $bookid;
	                                    //$instance->code = $un["id"]["value"];
	                                    $keys = array("id", "value");
	                                    $instance->code = rcommond_findarrayvalue($un, $keys);
//MARSUPIAL *********** AFEGIT -> Check if $instance->code is empty and search directly in the array
//2011.10.14 @mmartinez
                                        if (empty($instance->code)){
                                        	$instance->code = (isset($un["id"]["value"]))? $un["id"]["value"]: '';
                                        }
//*********** FI
	                                    //$instance->name = str_replace("'", "''", $un["titulo"]["value"]);
	                                    $keys = array("titulo", "value");
// MARSUPIAL ********** MODIFICAT -> Addslashes
// 2011.10.24 @mmartinez	                                    
	                                    $instance->name = addslashes(rcommond_findarrayvalue($un, $keys));
// ********** ORIGINAL
                                        //$instance->name = substr("'", "''", rcommond_findarrayvalue($un, $keys));
// ********** FI
//MARSUPIAL ********** AFEGIT -> Check that unit name isn't large than 255 caracters
//2011.06.02 @mmartinez
		                                if (strlen($instance->name) > 200){
		                                	$instance->name = substr($instance->name, 0, 200);
		                                }
//********* FI
	                                    //$instance->summary = str_replace("'", "''", $un["titulo"]["value"]);
	                                    $keys = array("titulo", "value");
// MARSUPIAL ********** MODIFICAT -> Addslashes
// 2011.10.24 @mmartinez
	                                    $instance->summary = addslashes(rcommond_findarrayvalue($un, $keys));
// ********** ORIGINAL
                                        //$instance->summary = substr("'", "''", rcommond_findarrayvalue($un, $keys));
//********* FI
	                                    //
//MARSUPIAL ********** AFEGIT -> Check that unit summary isn't large than 1024 caracters
//2011.06.02 @mmartinez
		                                if (strlen($instance->summary) > 1024){
		                                	$instance->summary = substr($instance->summary, 0, 1024);
		                                }
//********* FI
	                                    //$instance->sortorder = $un["orden"]["value"];
	                                    $keys = array("orden", "value");
	                                    $instance->sortorder = rcommond_findarrayvalue($un, $keys);
	                                    $instance->timemodified = time();

//MARSUPIAL *********** MODIFICAT -> Take value from the prepared $instance var
//2011.10.14 @mmartinez
                                        $select = "WHERE bookid=".$bookid." AND code='".$instance->code."'";
//*********** ORIGINAL
	                                    /*$keys = array("id", "value");
	                                    $select = "WHERE bookid=".$bookid;

	                                    $select = $select." AND code='".rcommond_findarrayvalue($un, $keys)."'";
	                                    //$select = $select." AND code='".$un["id"]["value"]."'";*/
//********** FI
	
	                                    if (!$regunit = $DB->get_record_sql('SELECT id FROM '.$CFG->prefix.'rcommon_books_units' .' '. $select))
	                                    {
	                                    	//echo "<br>sql: SELECT id FROM {$CFG->prefix}rcommon_books_units ".$select." -> INSERT";
	                                        $instance->timecreated = time();
	                                        $unitid = $DB->insert_record('rcommon_books_units', $instance);
	                                    }
	                                    else
	                                    {
	                                    	//echo "<br>sql: SELECT id FROM {$CFG->prefix}rcommon_books_units ".$select." -> UPDATE";
	                                        $instance->id = $regunit->id;
	                                        $unitid = $regunit->id;
	                                        $DB->update_record('rcommon_books_units', $instance);
	                                    }
	                                    
//MARSUPIAL ********** MODIFICAT -> Fixed bug, when there is just one activity 
//2011.10.17 @mmartinez
                                        $actividades = rcommond_findarrayvalue($un, array("actividades", "actividad"));
                                        if ($actividades && !array_key_exists('0', $actividades)){
                                            //echo "<br>-----------<br>Activity before: "; print_r($actividades); echo "<br>----------";
                                	        $actividades = array($actividades);
                                            //echo "<br>Activity after: "; print_r($actividades);  echo "<br>----------<br>";
                                        }
//*********** ORIGINAL
                                        /*
                                        // si hay solo una actividad o no hay actividades
	                                    //if (isset($un["actividades"]["actividad"]["id"]) || !isset($un["actividades"]["actividad"]))
	                                    if (rcommond_findarrayvalue($un, array("actividades", "actividad", "id")) != false || rcommond_findarrayvalue($un, array("actividades", "actividad")) == false)
	                                    {
	                                        //$actividades = $un["actividades"];
	                                        $actividades = rcommond_findarrayvalue($un, array("actividades", "actividad"));
	                                    }
	                                    else
	                                    {
	                                        //$actividades = $un["actividades"]["actividad"];
	                                        $actividades = rcommond_findarrayvalue($un, array("actividades", "actividad"));
	                                    }
                                         */ 
//*********** FI
	                                    //if exists activities
	                                    if ($actividades != false)
	                                    {
	                                        //guarda las actividades de la unidad
	                                        //foreach($un["actividades"]["actividad"] as $act)
	                                        foreach($actividades as $act)
	                                        {
	                                            //print_r("<br> ACT. - ".$act["id"]["value"]."<br>");
	                                            unset($instance);

	                                            $instance = new stdClass();
	                                            $instance->bookid = $bookid;
	                                            $instance->unitid = $unitid;
	                                            //$instance->code = $act["id"]["value"];
	                                            $instance->code = rcommond_findarrayvalue($act, array("id", "value"));
	                                            //$instance->name= str_replace("'", "''", $act["titulo"]["value"]);
// MARSUPIAL ********** MODIFICAT -> Addslashes
// 2011.10.24 @mmartinez
	                                            $instance->name = addslashes(rcommond_findarrayvalue($act, array("titulo", "value")));
// *********** ORIGINAL
                                                //$instance->name= substr("'", "''", rcommond_findarrayvalue($act, array("titulo", "value")));
// *********** FI

//MARSUPIAL ********** AFEGIT -> Check that activity name isn't large than 255 caracters
//2011.06.02 @mmartinez

	                                            //echo "<br>--------------------------";
	                                            //echo "<br>str: "; print_r($instance->name);
                                                //echo "<br>strlen before: ".mb_strlen($instance->name);
				                                if (strlen($instance->name) > 200){				                                	
				                                	$instance->name = substr($instance->name, 0, 200);
				                                }
				                                //echo "<br>encoding: ".mb_internal_encoding();
				                                //echo "<br>str: "; print_r($instance->name);
				                                //echo "<br>strlen after: ".mb_strlen(trim($instance->name), 'UTF-8');
				                                //echo "<br>--------------------------<br>";
//********* FI
	                                            //$instance->summary = str_replace("'", "''", $act["titulo"]["value"]);
// MARSUPIAL ********** MODIFICAT -> Addslashes
// 2011.10.24 @mmartinez
	                                            $instance->summary = addslashes(rcommond_findarrayvalue($act, array("titulo", "value")));
// *********** ORIGINAL 
                                                //$instance->summary = substr("'", "''", rcommond_findarrayvalue($act, array("titulo", "value")));
//********* FI
//MARSUPIAL ********** AFEGIT -> Check that activity summary isn't large than 1024 caracters
//2011.06.02 @mmartinez
				                                if (strlen($instance->summary) > 1024){
				                                	$instance->summary = substr($instance->summary, 0, 1024);
				                                }
//********* FI
	                                            //$instance->sortorder = $act["orden"]["value"];
	                                            $instance->sortorder = rcommond_findarrayvalue($act, array("orden", "value"));
	                                            $instance->timemodified = time();
	
	                                            $select = "WHERE bookid=".$bookid;
	                                            $select = $select." AND unitid=".$unitid;
	                                            $select = $select." AND code='".$instance->code."'";
	                                            //$select = $select." AND code='".$act["id"]["value"]."'";
	
	                                            if (!$regactiv = $DB->get_record_sql('SELECT id FROM '.$CFG->prefix.'rcommon_books_activities' .' '. $select))
	                                            {
	                                                $instance->timecreated = time();
	                                                //echo "<br><br>"; print_r($instance); echo "<br><br>";
	                                                $activid = $DB->insert_record('rcommon_books_activities', $instance);
	                                            }
	                                            else
	                                            {
	                                                $instance->id = $regactiv->id;
	                                                $activid = $regactiv->id;
	                                                $DB->update_record('rcommon_books_activities', $instance);
	                                            }
	                                        }
	                                    }
	                                }
	                            }
	                            
	                        }
	                        else
	                        {
	                        	$urlok='';
	                        	if (isset($ret->ObtenerEstructuraResult->URL)){
							        $curl=curl_init();        
							        curl_setopt($curl, CURLOPT_URL, $ret->ObtenerEstructuraResult->URL);     
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
	                            
	                        	global $USER;
	                            //save error on bd
	                            $tmp = new stdClass();
	                            $tmp->time      =  time();
	                            $tmp->userid    =  $USER->id;
	                            $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
	                            //$tmp->course    =  $data->course;
	                            //$tmp->module    =  $data->module;
	                            //$tmp->cmid      =  $data->cmid;
	                            $tmp->action    =  "get_books_structure_publishererror";
	                            $tmp->url       =  $_SERVER['REQUEST_URI'];
	                            $tmp->info      =  'Error get_books_structure: C&oacute;digo: '.$ret->ObtenerEstructuraResult->Codigo.' - '.$ret->ObtenerEstructuraResult->Descripcion;
	                            if ($urlok)
	                                $tmp->info      =  $tmp->info.", URL: ".$response->ObtenerEstructuraResult->URL;
	                            
	                            $DB->insert_record("rcommon_errors_log", $tmp);
	                            
	                            echo "<br>".$tmp->info."<br>";
	
	                            continue;
	                            //print_error('Error get_book_structure: C&oacute;digo: '.$ret->ObtenerEstructuraResult->Codigo.' - '.$ret->ObtenerEstructuraResult->Descripcion);
	                        }
	                    }
	                }
	                
	                return true;
	              } else {
	              	 echo "<br><br>".get_string('nobooks','block_rcommon');
	              	 return true;
	              }
            }
            else
            {
                //test if isset the url
                $urlok='';
                if(isset($ret->ObtenerTodosResult->URL)){
				        $curl=curl_init();        
				        curl_setopt($curl, CURLOPT_URL, $ret->ObtenerTodosResult->URL);     
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
				
                global $USER;
                //save error on bd
                $tmp = new stdClass();
                $tmp->time      =  time();
                $tmp->userid    =  $USER->id;
                $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
                //$tmp->course    =  $data->course;
                //$tmp->module    =  $data->module;
                //$tmp->cmid      =  $data->cmid;
                $tmp->action    =  "get_books_structure_publishererror";
                $tmp->url       =  $_SERVER['REQUEST_URI'];
                
                $tmp->info      =  'Error get_books: Código: '.$ret->ObtenerTodosResult->Codigo.' - '.$ret->ObtenerTodosResult->Descripcion;
                if ($urlok)
                    $tmp->info      =  $tmp->info.", URL: ".$ret->ObtenerTodosResult->URL;               
                    
                $DB->insert_record("rcommon_errors_log", $tmp);
                
                echo "<br>".$tmp->info."<br>";

                return false;
                //print_error('Error get_books: C&oacute;digo: '.$ret->ObtenerTodosResult->Codigo.' - '.$ret->ObtenerTodosResult->Descripcion);
            }
        }
    }
    catch(Exception $fault) 
    {
        print_error('Error: '.$fault->getMessage());
        return false;
    }    
}



/**
 * Web Service to access digital content SM
 * @param none
 * @return obj -> web service response
 */
function get_books($wsurl_contenido, $user, $password)
{
    global $CFG, $DB;

    //echo "<br>Contenido Digital";

    try {
        if (isset($CFG->center))
        {
// MARSUPIAL ************ AFEGIT -> Added proxy option
// 2012.08.30 @mmartinez
        	$options = array('trace' => 1, 'connection_timeout' => 120);
// MARSUPIAL ************ MODIFICAT -> Check if params exists
// 2013.01.30 @abertranb
        	if (isset($CFG->proxytype) && $CFG->proxytype == 'HTTP' && isset($CFG->proxyhost) && !empty($CFG->proxyhost)){
// *********** ORIGINAL
//        	if ($CFG->proxytype == 'HTTP' && !empty($CFG->proxyhost)){
// ************* FI
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
            $client = @new soapclient($wsurl_contenido.'?wsdl', $options);
// *********** ORIGINAL
			//$client = @new soapclient($wsurl_contenido.'?wsdl', array('trace' => 1, 'connection_timeout' => 120 ));
// ************* FI
            $auth = array('User' => $user, 'Password' => $password);
            
            $namespace=rcommond_wdsl_parser($wsurl_contenido.'?wsdl');

            $header = new SoapHeader($namespace, "WSEAuthenticateHeader", $auth);
            $client->__setSoapHeaders(array($header)); 
        
            $params = new stdClass();
            $params->IdCentro = @new SoapVar($CFG->center, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");

            $response = $client->__soapCall("ObtenerTodos", array($params));
            
            log_to_file("get_books Request: ".$client->__getLastRequest(),'rcommon_tracer');
            log_to_file("get_books Response: ".$client->__getLastResponse(),'rcommon_tracer');
             
            //check if there are any response error
            if ($response->ObtenerTodosResult->Codigo <= 0)
            {
                return $response;
                //print_error('Error get_books: C&oacute;digo: '.$response->ObtenerTodosResult->Codigo.' - '.$response->ObtenerTodosResult->Descripcion);
            }
            else
            {
                //return $response;
                return $client->__getLastResponse();
            }
        } else {
            print_error(get_string("centernotfound", "block_rcommon"));
            Throw new Exception(get_string("centernotfound", "block_rcommon"));
        }

    }
    catch(Exception $fault) 
    //catch(SoapFault $fault) 
    {
        global $USER;

        //save error on bd
        $tmp = new stdClass();
        $tmp->time      =  time();
        $tmp->userid    =  $USER->id;
        $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
        //$tmp->course    =  $data->course;
        $tmp->module    =  'rcommon';
        //$tmp->cmid      =  $data->cmid;
        $tmp->action    =  "get_books_error";
        $tmp->url       =  $_SERVER['REQUEST_URI'];
        
        $tmp->info      =  'Error get_books: '.str_replace($fault->getMessage(), '\"', '');
            
        $DB->insert_record("rcommon_errors_log", $tmp);

        //error('Error get_books: '.$fault->getMessage());
        
        echo "<br>Error get_books: ". $fault->getMessage() . " -- ". $fault->getMessage();
        
        log_to_file("wsGetBooksStructure get_books() response error: ". $fault->getMessage(),'rcommon_tracer');
        
        //echo("<br><br>REQUEST: " . $client->__getLastRequest() . "\n<br><br>RESPONSE: ".$client->__getLastResponse()."<br><br>");
    }    
    
}


/**
 * Web Service to access digital content SM
 * @param none
 * @return obj -> web service response
 */
function get_book_structure($wsurl_contenido, $user, $password, $isbn)
{
    global $CFG, $USER, $DB;
    //echo "<br>Indice Libro: ".$wsurl_contenido."<br>";

    try {    
// MARSUPIAL ************ AFEGIT -> Added proxy option
// 2012.08.30 @mmartinez
    	$options = array('trace' => 1, 'connection_timeout' => 120);
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
        $client = @new soapclient($wsurl_contenido.'?wsdl', $options);
// *********** ORIGINAL
		//$client = @new soapclient($wsurl_contenido.'?wsdl', array('trace' => 1, 'connection_timeout' => 120));
// ************* FI

        $auth = array('User' => $user, 'Password' => $password);
        
        $namespace=rcommond_wdsl_parser($wsurl_contenido.'?wsdl');

        $header = new SoapHeader($namespace, "WSEAuthenticateHeader", $auth);
        $client->__setSoapHeaders(array($header)); 

        $params = new stdClass();
        $params->ISBN = @new SoapVar($isbn, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");

        $response = $client->__soapCall("ObtenerEstructura", array($params));

        log_to_file("wsget_books_structure Request: ".$client->__getLastRequest(),'rcommon_tracer');
        log_to_file("wsget_books_structure Response: ".$client->__getLastResponse(),'rcommon_tracer');
        
        //check if there are any response error
        if ($response->ObtenerEstructuraResult->Codigo <= 0)
        {
            //print_error('Error get_book_structure: C&oacute;digo: '.$response->ObtenerEstructuraResult->Codigo.' - '.$response->ObtenerEstructuraResult->Descripcion);
            return $response;
        }
        else
        {
            //return $response;
            return $client->__getLastResponse();
        }

    }
    catch(Exception $fault) {
        //echo "Error: ". $fault->getMessage();
        log_to_file("wsBookStructure: get_book_structure - Exception = ".$fault->getMessage(),'rcommon_tracer');
        echo "KO!";
        
        global $USER;
        //save error on bd
        $tmp = new stdClass();
        $tmp->time      =  time();
        $tmp->userid    =  $USER->id;
        $tmp->ip        =  $_SERVER['REMOTE_ADDR'];
        //$tmp->course    =  $data->course;
        $tmp->module    =  'rcommon';
        //$tmp->cmid      =  $data->cmid;
        $tmp->action    =  "get_book_structure_error";
        $tmp->url       =  $_SERVER['REQUEST_URI'];
        
        $tmp->info      =  'Error get_book_structure: '.addslashes($fault->getMessage());

        echo $tmp->info;
            
        $DB->insert_record("rcommon_errors_log", $tmp);
        
        //print_error('Error get_book_structure: '.$fault->getMessage());
    }    
    
}

  
?>
