<?php

require_once 'dblib-mysql.php';
require_once 'dbmanager.php';
require_once 'cronslib.php';

// For command line invocation
$args = get_webargs();
if (defined('CLI_SCRIPT')) {
    $args['force'] = true;
}

$debugenabled = $args['debug'] ?? 'off';

define('DEBUG_ENABLED', $debugenabled);
xtec_debug("DEBUG ENABLED: $debugenabled");

// Retrieve info
$services = getServices(false, 'db_id', 'asc', 'all', ['active', 'blocked']);
if (empty($services)) {
    exit(0);
}

// Match info per schools
$schools = [];
foreach ($services as $school) {
    $dns = $school['dns'];
    $service = mb_strtolower($school['service']);

    $schools[$dns]['code'] = $school['code'];
    $schools[$dns]['type'] = $school['type'];
    $schools[$dns]['url_type'] = $school['url_type'];
    $schools[$dns]['url_host'] = $school['url_host'];

    $schools[$dns]['id_' . $service] = $school['id'];
    $schools[$dns]['dbhost_' . $service] = $school['dbhost'];
    $schools[$dns]['diskPercent_' . $service] = $school['diskPercent'];
    $schools[$dns]['status_' . $service] = $school['state'];

    // Add an element: key = previous DNS, value = current DNS.
    if (!empty($school['old_dns'])) {
        $schools[$school['old_dns']]['new_dns'] = $dns;
    }

    if (!empty($school['old_url_host'])) {
        $schools[$school['old_url_host']]['new_url_host'] = $school['url_host'];
    }
}

// Generate strings to write
$schoolstr = '$schools = [' . "\n";
foreach ($schools as $dns => $school) {
    $schoolstr .= "'$dns' => [\n";
    foreach ($school as $key => $value) {
        $schoolstr .= "'$key' => '$value',\n";
    }
    $schoolstr .= "],\n";
}
$schoolstr .= '];';

// Show file in browser
if (isset($args['print']) && $args['print']) {
    echo '<h2>File: ' . $agora['cachecon']['file'] . '</h2>';
    echo '<pre>' . $schoolstr . '</pre>';
}

// If accessed from a browser and exists an special param, force synchronization
if (isset($args['force']) && $args['force']) {

    $path = $agora['cachecon']['dir'];
    $tempfile = $path . $agora['cachecon']['file'] . '.tmp';
    if (!is_dir($path)) {
        // Create syncdir if it doesn't exist
        $old = umask(0);
        if (mkdir($agora['cachecon']['dir'], 0777)) {
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

    $destfile = $path . $agora['cachecon']['file'];
    xtec_debug('Temp file: ' . $tempfile);
    xtec_debug('Written file: ' . $destfile);

    $oldumask = umask(0);
    if (!rename($tempfile, $destfile)) {
        echo "Failed to rename $tempfile to $destfile\n";
    }
    umask($oldumask);
}