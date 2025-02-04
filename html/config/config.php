<?php

// Params common in all environments

// Params for Moodle 2
$agora['moodle2']['dbtype'] = 'pgsql'; // oci (Oracle), mysql, pgsql
$agora['moodle2']['prefix'] = 'm2'; // Moodle 2.x tables prefix (only 2 chars)
$agora['moodle2']['port'] = '5432';
$agora['moodle2']['username'] = $agora['server']['userprefix'];
$agora['moodle2']['diskusagefile'] = 'quotaUsageMoodle.txt';
$agora['moodle2']['repository_files'] = '/repository/files/'; // Folder for uploading big files in Moodle
$agora['moodle2']['userprefix'] = $agora['server']['userprefix']; // All services need to have the same variable name
$agora['moodle2']['localmuc'] = $agora['server']['localdatadir'] . 'localmuc'; // MUC elements in web server (not shared)

// Params for WordPress
$agora['nodes']['dbtype'] = 'mysql';
$agora['nodes']['prefix'] = 'wp';
$agora['nodes']['userprefix'] = $agora['server']['userprefix'];
$agora['nodes']['diskusagefile'] = 'quotaUsageNodes.txt';

// General vars
$agora['server']['school_information'] = match ($agora['server']['enviroment']) {
    'INT', 'ACC', 'PRE' => 'https://preproduccio.aplicacions.ensenyament.gencat.cat/pls/xtec/agora_dades_centre?p_codi_centre=',
    default => 'https://aplicacions.gestioeducativa.gencat.cat/ords/pls/xtec/agora_dades_centre?p_codi_centre=',
};

$agora['server']['html'] = $agora['server']['server'] . $agora['server']['base'];
$agora['server']['uploads'] = $agora['server']['root'] . $agora['server']['datadir'] . 'uploads/'; // Temp directory for uploading big files. Files will be moved to each moodledata.

// Database Connection Cache
$agora['cachecon']['dir'] = $agora['server']['root'] . $agora['server']['localdatadir'] . 'syncdata/';
$agora['cachecon']['file'] = 'allSchools.php';

// xtecadmin email
$agora['xtecadmin']['mail'] = 'agora@xtec.invalid';

// Proxy settings
$agora['proxy']['host'] = '';
$agora['proxy']['port'] = '';
$agora['proxy']['user'] = '';
$agora['proxy']['pass'] = '';

// Constants used elsewhere
define('WWWROOT', $agora['server']['server'] . $agora['server']['base']);

// Type Ids for secondary domains
const SERVEIEDUCATIU_TYPE_ID = 5;
const EOI_TYPE_ID = 6;
const PROJECTES_TYPE_ID = 12;