<?php

require_once (dirname(dirname(__FILE__)) . '/config/dblib-mysql.php');

// Load params from URL
$debug_enabled = filter_input(INPUT_GET, 'debug', FILTER_SANITIZE_STRING); // Values: 'on', 'off', null (if not set)
$dbsource = filter_input(INPUT_GET, 'dbsource', FILTER_SANITIZE_NUMBER_INT); // Values: '1', '2', null (if not set)
$centre = filter_input(INPUT_GET, 'ccentre', FILTER_SANITIZE_STRING); // Values: "Nom propi", null (if not set)

if (!is_null($debug_enabled)) {
    define('DEBUG_ENABLED', $debug_enabled);
    xtec_debug("DEBUG ENABLED: $debug_enabled");
}
if (is_null($dbsource)) {
    $dbsource = $agora['dbsource']['defaulttype'];
    xtec_debug("Selected: $dbsource");
}
if (is_null($centre)) {
    // Error page
    header('location: ' . WWWROOT . 'error.php?s=nodes');
    exit(0);
}

/**
 * $dbsource possible values:
 * 1 = allSchools.php file (default)
 * 2 = Data base
 * */
$school_info = getSchoolInfoFromFile($centre, $dbsource, 'nodes');

// Debug code
xtec_debug($school_info['source']);

// Couldn't find school or service
if (($school_info === false) || !isset($school_info['id_nodes']) || empty($school_info['id_nodes'])) {
    header('location: ' . WWWROOT . 'error.php?s=nodes&dns=' . $centre);
    exit(0);
}

// There's a new "Nom propi"
if (!empty($school_info['new_dns'])) {
    $newadress = WWWROOT . $school_info['new_dns'];
    header('location: ' . WWWROOT . 'error.php?newaddress=' . $newadress);
    exit(0);
}

global $agora, $isAgora, $isBlocs;

$isAgora = true;
$isBlocs = false;

define('DB_NAME', $agora['nodes']['userprefix'] . $school_info['id_nodes']);
define('DB_HOST', $school_info['dbhost_nodes']);
define('WP_SITEURL', $agora['server']['html'] . $centre . '/');
define('UPLOADS', 'wp-content/uploads/' . $agora['nodes']['userprefix'] . $school_info['id_nodes']);

define('ENVIRONMENT', $agora['server']['enviroment']);
