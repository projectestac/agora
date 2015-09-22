<?php

require_once('testlib/testlib.php');

require_once('config/dblib-mysql.php');

// Find school with Moodle and Nodes, to check Oracle and MySQL connection
$schools = getAllSchoolsDBInfo();
foreach ($schools as $school) {
    if ($school['service'] === 'moodle2') {
    	foreach ($schools as $nodes_school) {
    		if ($nodes_school['dns'] === $school['dns'] && $nodes_school['service'] == 'nodes') {
        		$_REQUEST['ccentre'] = $centre = $school['dns'];
        		break;
        	}
        }
        if (!empty($centre)) {
        	break;
        }
    }
}
require_once('moodle2/config.php');

$environment = $agora['server']['enviroment'];

global $school_info;

checkOracle($school_info['database_moodle2'], $agora['moodle2']['username'] . $school_info['id_moodle2'], $agora['moodle2']['userpwd'], $agora['moodle2']['prefix']);

test_mail($CFG->apligestaplic, false, $CFG->apligestenv);

test_ldap(false, $environment);

test_memcache();

test_session();

//test_proxy('http://www.google.com');
//test_ftp('localhost');

test_cli(__DIR__.'/moodle2/admin/cli/cron.php --ccentre='.$centre);



$dbname = $agora['nodes']['userprefix'] . $school_info['id_nodes'];
checkMySQL($school_info['dbhost_nodes'], 3306, $dbname, $agora['nodes']['username'], $agora['nodes']['userpwd'], 'users');

test_server();