<?php

require_once('dblib-mysql.php');
require_once('cronslib.php');

// For command line invocation
$args = get_webargs();
if (defined('CLI_SCRIPT')) {
    $args['force'] = true;
}

$debugenabled = isset($args['debug']) ? $args['debug'] : 'off';

define('DEBUG_ENABLED', $debugenabled);
xtec_debug("DEBUG ENABLED: $debugenabled");

// Retrieve info
$allschools = getAllSchoolsDBInfo();

if (empty($allschools)) {
    exit(0);
}

// Match info per schools
$schools = array();
foreach ($allschools as $school) {
    $dns     = $school['dns'];
    $service = $school['service'];

    $schools[$dns]['id_'.$service]          = $school['id'];
    $schools[$dns]['dbhost_'.$service]      = $school['database']; // Deprecated
    $schools[$dns]['database_'.$service]    = $school['database'];
    $schools[$dns]['diskPercent_'.$service] = $school['diskPercent'];

    $schools[$dns]['clientCode'] = $school['code'];

    $schools[$dns]['type'] = $school['type'];

    // Add an element: key = previous DNS, value = current DNS. This will be
    //   used to show an info page explaining that the DNS has changed
    if (isset($school['old_dns']) && !empty($school['old_dns'])) {
        $schools[$school['old_dns']]['new_dns'] = $dns;
    }
}

// Generate strings to write
$schoolstr = '$schools = Array('."\n";
foreach ($schools as $dns => $school) {
    $schoolstr .= "'$dns' => Array(\n";
    foreach ($school as $key => $value) {
        $schoolstr .= "'$key' => '$value',\n";
    }
    $schoolstr .= "),\n";
}
$schoolstr .= ');';

$filename   = 'allSchools.php';;

// Show file in browser
if (isset($args["print"]) && $args["print"]) {
    echo '<h2>File: '.$filename.'</h2>';
    echo '<pre>'.$schoolstr.'</pre>';
}

// If accessed from a browser and exists an special param, force synchronization
if (isset($args['force']) && $args['force']) {

    $path = $agora['dbsource']['dir'];
    $tempfile = $path.$filename.'.tmp';
    if (!is_dir($path)) {
        // Create syncdir if it doesn't exist
        $old = umask(0);
        if (mkdir($agora['dbsource']['dir'], 0777)) {
            xtec_debug("$path directory created<br/>\n");
        }
        umask($old);
    }

    // Create the file
    $oldumask = umask(0);
    $fp = fopen($tempfile, 'w');
    umask($oldumask);
    fwrite($fp, "<?php\n$schoolstr\n");
    fclose($fp);

    $destfile = $path.$filename;
    xtec_debug('Temp file: '.$tempfile);
    xtec_debug('Written file: '.$destfile);
    $oldumask = umask(0);
    if (!rename($tempfile, $destfile)) {
        echo "Failed to rename $tempfile to $destfile\n";
    }
    umask($oldumask);
}