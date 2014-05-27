<?php

    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->dirroot.'/blocks/rcommon/WebServices/BooksStructure/get_books_structure.php');

    $publisher_books = $DB->get_records_sql ('SELECT pub.name AS name, pub.id AS id, pub.username AS username , pub.password AS password, pub.urlwsbookstructure AS url, count(b.id) AS books
    		FROM {rcommon_publisher} pub
    		LEFT JOIN {rcommon_books} b ON pub.id = b.publisherid
    		GROUP BY pub.name, pub.id, pub.username, pub.password, pub.urlwsbookstructure
    		ORDER BY pub.name');


    $soap_options = array(
        'trace' => 1,
        'connection_timeout' => 120,
        'exceptions' => true,
        'cache_wsdl'=>WSDL_CACHE_NONE
    );

    if (!empty($CFG->proxytype) && $CFG->proxytype == 'HTTP' && !empty($CFG->proxyhost)){
        $soap_options['proxy_host'] = $CFG->proxyhost;
        if (!empty($CFG->proxyport)){
            $soap_options['proxy_port'] = $CFG->proxyport;
        }
        if (!empty($CFG->proxyuser)){
            $soap_options['proxy_login'] = $CFG->proxyuser;
        }
        if (!empty($CFG->proxypassword)){
            $soap_options['proxy_password'] = $CFG->proxypassword;
        }
    }

    echo '<ul>';
    foreach ($publisher_books as $publisher){
        $success = false;
        $fail_description = "";
        try {
            $client = new SoapClient($publisher->url.'?wsdl', $soap_options);
            $namespace = rcommond_wdsl_parser($publisher->url.'?wsdl');

            $auth = array('User' => $publisher->username, 'Password' => $publisher->password);
            $header = new SoapHeader($namespace, "WSEAuthenticateHeader", $auth);
            $client->__setSoapHeaders(array($header));

            $params = new stdClass();
            $params->IdCentro = @new SoapVar($CFG->center, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
            $response = $client->__soapCall("ObtenerTodos", array($params));

            if (isset($response->ObtenerTodosResult)) {
                $success = $response->ObtenerTodosResult->Codigo == 1;
                $fail_description = $response->ObtenerTodosResult->Descripcion;
            }
        } catch (Exception $e){
            $fail_description = $e->getMessage();
        } catch (SoapFault $e){
            $fail_description = $e->getMessage();
        }

        if($success){
            echo '<li><span style="color:green">'.$publisher->name.' ('.$publisher->books.') - '.'<span style="font-size:small">'.get_string('good_connection', 'block_rcommon').'</span></span></li>';
        } else {
            echo '<li><span style="color:red">'.$publisher->name.' ('.$publisher->books.') - '.'<span style="font-size:small">'.get_string('bad_connection', 'block_rcommon').': '.$fail_description.'</span></span></li>';
        }
    }
    echo '</ul>';
