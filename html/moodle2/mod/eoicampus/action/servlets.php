<?php

//error_reporting(E_ALL);

header('Content-type: text/xml');

// XTEC ********** MODIFICAT - Changed code to get data from web service
// 2011.07.22 @mmartinez

$required_parameters = array ('xml'   => FILTER_UNSAFE_RAW,
                              'host'  => FILTER_UNSAFE_RAW);

//validate required parameters
foreach ($required_parameters as $param=>$filter){
	if (!isset($_REQUEST[$param]) || empty($_REQUEST[$param]) || !$_REQUEST[$param] = filter_var($_REQUEST[$param], $filter)){
		header("HTTP/1.0 400 Bad Request - Parameters required");
		die;
	}
	
}

try {
	//set web services client
	$ws_client = new soapclient($_REQUEST['host'], array('trace'      => 1,
	                                                     'cache_wsdl' => WSDL_CACHE_NONE));
} catch (Exception $e) {
	header("HTTP/1.1 401 No Autorizado - ".$e->getMessage());
	die;	
}
	
try {
	//set web services call parameters
	$ws_params          = new stdClass();
	$ws_params->iStr    = new SoapVar('<![CDATA['.$_REQUEST['xml'].']]>', XSD_STRING);
	$ws_params->level   = new SoapVar('', XSD_STRING);
	$ws_params->lang    = new SoapVar('', XSD_STRING);
	$ws_params->profile = new SoapVar('', XSD_STRING);
	$ws_params->centre  = new SoapVar('', XSD_STRING);
	//echo " ";
	
	//$a_ws_params = array ('iStr' => '<![CDATA['.$_REQUEST['xml'].']]>', 'level' => '', 'lang' => '', 'profile' => '', 'centre' => '');
	
	//call web services method
	//$ws_response = $ws_client->__soapCall('getPathways',$a_ws_params);
	$ws_response = $ws_client->getPathways($ws_params);
	
	//$last_resp = error_get_last();
	
} catch (SoapFault $e) {
	 $ws_xmlresponse = html_entity_decode(@$ws_client->__getLastResponse());
	 
	 if (empty($ws_xmlresponse)){
	 	 header("HTTP/1.0 500 Internal Server Error - ".$e->faultstring);
	     die;
	 }
	 $startpos = strpos($ws_xmlresponse, "<getPathwaysReturn>");
	 if ($startpos === false){
	 	 header("HTTP/1.0 500 Internal Server Error.");
	     die;
	 }
	 $ws_xmlresponse = substr($ws_xmlresponse, $startpos+strlen("<getPathwaysReturn>"));
	 $endpos = strpos($ws_xmlresponse, "</getPathwaysReturn>");
     if ($startpos === false || $endpos === false){
	 	 header("HTTP/1.0 500 Internal Server Error..");
	     die;
	 }
	 $ws_response = substr($ws_xmlresponse, 0, $endpos);
}

if (empty($ws_response)){
	header("HTTP/1.0 500 Internal Server Error...");
	die;
}

echo $ws_response;

//just for debug
/*echo '<br><br>-----------------------------------------------------------------<br>';
echo '<pre>WS RESPONSE: '; print_r($ws_response);  echo '</pre>';
echo '<pre>WS XML REQUEST: '; print_r($ws_client->__getLastRequest());  echo '</pre>';
echo '<pre>WS XML RESPONSE: '; print_r($ws_client->__getLastResponse());  echo '</pre>';
echo '-----------------------------------------------------------------<br>';
echo '<pre>GET: '; print_r($_GET);  echo '</pre>';
echo '<pre>POST: '; print_r($_POST);  echo '</pre>';
echo '<pre>REQUEST: '; print_r($_REQUEST);  echo '</pre>';*/


// *********** ORIGINAL
/*if($GLOBALS["HTTP_RAW_POST_DATA"]){
    $my_xml = $GLOBALS["HTTP_RAW_POST_DATA"];
} else if ($HTTP_RAW_POST_DATA){
  $my_xml = $HTTP_RAW_POST_DATA;
} else{
  $level = $_REQUEST['level'];
  $my_xml="<"."?xml version=\"1.0\" encoding=\"UTF-8\" ?".">\n<item><level>"+$level+"</level><types><type>learning</type></types></item>";
}

$host = $_REQUEST['host'];
$port = $_REQUEST['port'];
$path = $_REQUEST['path'];
/*$level = $_REQUEST['level'];
$my_xml="<"."?xml version=\"1.0\" encoding=\"UTF-8\" ?".">\n<item><level>$level</level><types><type>learning</type></types></item>";*/

/*echo eoicampus_call_servlet($host, $port, $path, $my_xml);

function eoicampus_call_servlet($host, $port, $servlet, $params="" ){
   $result="";

   $ch = curl_init();
   $url = $host.":".$port.$servlet;
   //$url = "http://phobos.xtec.cat/eoicampus/moodledsv/mod/eoicampus/result.xml";
   //$url = "http://sara.bichis.org/eoicampus.xml";
   curl_setopt ($ch, CURLOPT_URL, $url);
   curl_setopt ($ch, CURLOPT_HEADER, 0);
   curl_setopt ($ch, CURLOPT_TIMEOUT, 20);
   curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml")); 
   if (!empty($params)) curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
   $result = curl_exec ($ch);
   curl_close ($ch);
   return $result;
}

/*echo '<'.'?xml version="1.0" encoding="UTF-8" ?'.'>';
echo '<entries>
  <pathway id="1">
    <title>Crime</title>
    <description>In this pathway you will read and listen to various short news items on crime and do a series of voc</description>
    <image>bferran/images/crime.jpg</image>
    <level>5</level>
  </pathway>

  <pathway id="3">
    <title>Disruptive Children</title>
    <description>In this pathway you will learn vocabulary related to the topic of disruptive behaviour and classroomadsfas</description>
    <image>aadroer/images/discipline.jpg</image>
    <level>6</level>
  </pathway>
</entries>';*/

?>
