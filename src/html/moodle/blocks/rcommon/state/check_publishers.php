<?php

    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->dirroot.'/blocks/rcommon/WebServices/BooksStructure/get_books_structure.php');
    
    $publisher_books = get_records_sql ('SELECT pub.name AS name, pub.id AS id, pub.username AS username , pub.password AS password, pub.urlwsbookstructure AS url, count(b.id) AS books FROM '.$CFG->prefix.'rcommon_publisher pub LEFT JOIN '.$CFG->prefix.'rcommon_books b ON pub.id=b.publisherid GROUP BY pub.name, pub.id, pub.username, pub.password, pub.urlwsbookstructure ORDER BY pub.name');
    $publishers_check = array();
    foreach ($publisher_books as $pub){
        try{
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
            $client = @new soapclient($pub->url.'?wsdl', $options);
// *********** ORIGINAL
            //$client = @new soapclient($pub->url.'?wsdl', array('trace' => 1, 'connection_timeout' => 120));
// ************* FI
            $auth = array('User' => $pub->username, 'Password' => $pub->password);
            $namespace=rcommond_wdsl_parser($pub->url.'?wsdl');
            $header = new SoapHeader($namespace, "WSEAuthenticateHeader", $auth);
            $client->__setSoapHeaders(array($header)); 
            $params->IdCentro = @new SoapVar($CFG->center, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $response = $client->__soapCall("ObtenerTodos", array($params));
            if (isset($response->ObtenerTodosResult)){
                $publishers_check[$pub->id]['code'] = $response->ObtenerTodosResult->Codigo;
                $publishers_check[$pub->id]['description'] = $response->ObtenerTodosResult->Descripcion;
            } else{
                $publishers_check[$pub->id]['code'] = 0;
                $publishers_check[$pub->id]['description'] = '';                
            }
        } catch (Exception $e){
            $publishers_check[$pub->id]['code'] = 0;
            $publishers_check[$pub->id]['description'] = $e->faultstring;
        }
    }
    
    $result = '<ul>';
    foreach ($publisher_books as $publisher){
            if($publishers_check[$publisher->id]['code'] != '1'){
                    $result .= '<li><span style="color:red">'.$publisher->name.' ('.$publisher->books.') - '.'<span style="font-size:small">'.get_string('bad_connection', 'blocks/rcommon').': '.$publishers_check[$publisher->id]['description'].'</span></span></li>';
            }else{
                    $result .= '<li><span style="color:green">'.$publisher->name.' ('.$publisher->books.') - '.'<span style="font-size:small">'.get_string('good_connection', 'blocks/rcommon').'</span></span></li>';
            }
    }
    $result .= '</ul>';

    echo $result;
