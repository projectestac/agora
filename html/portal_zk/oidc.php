<?php

// Code for internal Moodle oAuth2 plugin.
$data = http_build_query($_GET);
$uri = $_GET['state'];

$returnurl = explode('wantsurl=', $uri)[1];
$returnurl = urldecode($returnurl);
$baseurl = explode('/moodle/&', $returnurl)[0];

header('Location: ' . $baseurl . '/moodle/admin/oauth2callback.php?' . $data);

// Code for moodle-auth_oidc plugin.
/*
require_once dirname(__DIR__) . '/config/env-config.php';
require_once dirname(__DIR__, 2) . '/localdata/syncdata/allSchools.php';

global $agora, $schools;

$code = substr($_POST['state'], 7, 8);

$nompropi = '';
foreach ($schools as $key => $value) {
    if ($value['clientCode'] === $code) {
        $nompropi = $key;
        break;
    }
}

$data = http_build_query($_POST);

header('Location: ' . $agora['server']['server'] . '/' . $nompropi . '/moodle/auth/oidc/?' . $data);
*/