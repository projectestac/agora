<?php


function get_marsupial_ws_client($publisher, $auth_content = false) {
    // This call must be included to ensure the WSDL loading
    libxml_disable_entity_loader(false);

    $wsdl = $auth_content ? $publisher->urlwsauthentication : $publisher->urlwsbookstructure;

    $options = get_marsupial_soap_options();
    $client = @new soapclient($wsdl.'?wsdl', $options);

    $auth = array('User' => $publisher->username, 'Password' => $publisher->password);

    $namespace = rcommon_get_wsdl_namespace($wsdl.'?wsdl');

    $header = new SoapHeader($namespace, "WSEAuthenticateHeader", $auth);
    $client->__setSoapHeaders(array($header));

    return $client;
}

function get_marsupial_soap_options($debug = true, $timeout = 120) {
    global $CFG;

    $options = array('connection_timeout' => $timeout);

    if ($debug) {
        $options['trace'] = 1;
    }
    if (isset($CFG->proxytype) && $CFG->proxytype == 'HTTP' && isset($CFG->proxyhost) && !empty($CFG->proxyhost)) {
        $options['proxy_host'] = $CFG->proxyhost;
        if (!empty($CFG->proxyport)) {
            $options['proxy_port'] = $CFG->proxyport;
        }
        if (!empty($CFG->proxyuser)) {
            $options['proxy_login'] = $CFG->proxyuser;
        }
        if (!empty($CFG->proxypassword)) {
            $options['proxy_password'] = $CFG->proxypassword;
        }
    }
    return $options;
}

function get_marsupial_center($error = true) {
    global $CFG;
    if (isset($CFG->center) && !empty($CFG->center)) {
        return $CFG->center;
    } else {
        if ($error) {
            print_error(get_string("centernotfound", "local_rcommon"));
        } else {
            return false;
        }
    }
}


/**
 * Get WSDL contents
 */
function rcommon_get_wsdl($urlwdsl, $timeout = 20) {
	global $CFG;

	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $urlwdsl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);


	if (!empty($CFG->proxytype) && $CFG->proxytype == 'HTTP' && !empty($CFG->proxyhost)) {
		curl_setopt($curl, CURLOPT_PROXY, $CFG->proxyhost);
		if (!empty($CFG->proxyport)) {
			curl_setopt($curl, CURLOPT_PROXYPORT, $CFG->proxyport);
		}
		if (!empty($CFG->proxyuser)) {
			curl_setopt($curl, CURLOPT_PROXYUSERPWD, $CFG->proxyuser . ':' . $CFG->proxypassword);
		}
	}

    $contents = curl_exec($curl);
    curl_close($curl);

    return $contents;
}

/**
 * Parse WSDL to get namespaces
 * @param string $urlwdsl
 * @return string -> wdsl namespaces
 */
function rcommon_get_wsdl_namespace($urlwdsl) {
    try {
        $wsdlcontents = rcommon_get_wsdl($urlwdsl);
        $xml = simplexml_load_string($wsdlcontents);
        return (string)$xml['targetNamespace'];
    } catch (Exception $e) {
        return false;
    }
}

function rcommon_object_to_array_lower($value, $recursive = false) {
    if (is_array($value)) {
        $array = $value;
    } else if (is_object($value)) {
        $array = (array) $value;
    } else {
        return $value;
    }

    $array_ret = array();
    foreach ($array as $key => $value) {
        if ($recursive) {
            $array_ret[strtolower($key)] = rcommon_object_to_array_lower($value, $recursive);
        } else {
            $array_ret[strtolower($key)] = $value;
        }

    }
    return $array_ret;
}

function test_ws_url($url) {
    try {
        $urlok = rcommon_get_wsdl($url);
        if ($urlok) {
            return $url;
        }
    } catch(Exception $e){
        return false;
    }
    return false;
}


/** ERROR HANDLING **/
function log_to_file($info, $notused = null) {
    try {
        $data_store_log = get_config('rcommon', 'data_store_log');
        $tracer = get_config('rcommon', 'tracer');
        if  ($tracer == 'checked' && !empty($data_store_log)) {
        	$data_store_log .= "/1";

        	//Escribimos en un fichero de texto los mensajes de errores
        	if (!is_dir($data_store_log)) {
        		mkdir($data_store_log);
        	}
        	$data_store_log .= "/log_rcommon";
        	if (!is_dir($data_store_log)) {
        		mkdir($data_store_log);
        	}

            if ($handle = @fopen($data_store_log."/LogRcommon.log", "a")) {
                $content = "\r\n".date("Y-m-d H:i:s")." - Data: ".$info;
                @fwrite($handle, $content);
                @fclose($handle);
            }
        }
    } catch(Exception $e){
        return;
    }

}

function rcommon_ws_error($function, $message, $module = 'rcommon', $cmid = 0, $course = false) {
    global $USER, $COURSE, $DB;

    $error_message = 'Error '.$function.': '. $message;
    log_to_file($error_message);

    try {
        $record = new stdClass();
        $record->time      =  time();
        $record->userid    =  isset($USER->id) ? $USER->id : 0;
        $record->ip        =  $_SERVER['REMOTE_ADDR'];
        $record->module    =  $module;
        $course            =  $course ? $course : isset($COURSE->id) ? $COURSE->id : 0;
        $record->course    =  $course != SITEID ? $course : 0;
        $record->cmid      =  $cmid ? $cmid : 0;
        $record->action    =  $function.'_error';
        $record->url       =  $_SERVER['REQUEST_URI'];
        $record->info      =  $error_message;
        $DB->insert_record('rcommon_errors_log', $record);
    } catch(Exception $e){
        log_to_file("function rcommon_ws_error - Exception = " . $e->getMessage());
    }

    return $error_message;
}

function is_associative_array($array) {
    if (!is_array($array) || empty($array)) {
        return false;
    }

    $keys = array_keys($array);
    return array_keys($keys) !== $keys;
}