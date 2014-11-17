<?php

require_once '../../config.php';
require_once __DIR__.'/lib.php';

$server = oauth_get_server();

// Handle a request for an OAuth2.0 Access Token and send the response to the client
$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();