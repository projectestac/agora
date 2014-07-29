<?php
require_once('../../../config.php');
require_once($CFG->dirroot.'/local/rcommon/WebServices/BooksStructure.php');

header('Content-Type: text/xml; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon,26 Jul 1997 05:00:00 GMT');
echo '<?xml version="1.0" encoding="UTF-8"?>';


$publisher_books = $DB->get_records('rcommon_publisher');

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

echo '<publishers>';
foreach ($publisher_books as $publisher){
    $success = false;
    $fail_description = "";
    try {
        $client = get_marsupial_ws_client($publisher);
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
        echo '<publisher id="'.$publisher->id.'" state="1">';
        echo get_string('good_connection', 'local_rcommon');
    } else {
        echo '<publisher id="'.$publisher->id.'" state="0">';
        echo get_string('bad_connection', 'local_rcommon').': '.$fail_description;
    }
    echo '</publisher>';
}
echo '</publishers>';
