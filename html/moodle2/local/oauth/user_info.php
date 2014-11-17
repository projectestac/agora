<?php

require_once '../../config.php';
require_once __DIR__.'/lib.php';

$server = oauth_get_server();
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
	$server->getResponse()->send();
	die();
}


$token = $server->getAccessTokenData(OAuth2\Request::createFromGlobals());
if (isset($token['user_id']) && !empty($token['user_id'])) {

	$request = OAuth2\Request::createFromGlobals();
	$response = new OAuth2\Response();
	$scopeRequired = 'user_info';
	if (!$server->verifyResourceRequest($request, $response, $scopeRequired)) {
	  	// if the scope required is different from what the token allows, this will send a "401 insufficient_scope" error
	  	$response->send();
	}

	$user = $DB->get_record('user', array('id'=>$token['user_id']), 'id,auth,username,idnumber,firstname,lastname,email,lang,country,phone1,address,description');
	add_to_log(SITEID, 'oauth', 'user_info', 'local/oauth/user_info.php', 'ok', 0, $user->id);
	echo json_encode($user);
} else {
	$server->getResponse()->send();
}
