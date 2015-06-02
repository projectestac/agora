<?php

require_once('config/env-config.php');
require_once('testlib/testlib.php');

$_REQUEST['ccentre'] = $centre = $agora['moodle2']['userprefix'] . 1;
require_once('moodle2/config.php');

$environment = $agora['server']['enviroment'];

checkOracle($agora['moodle2']['database'], $centre, $agora['moodle2']['userpwd'], $agora['moodle2']['prefix']);

test_mail($CFG->apligestaplic);

test_ldap(false, $environment);

test_memcache();

test_session();

//test_proxy('http://www.google.com');
//test_ftp('localhost');

test_cli(__DIR__.'/moodle2/admin/cli/cron.php --ccentre='.$centre);

global $school_info;

$dbname = $agora['nodes']['userprefix'] . $school_info['id_nodes'];
checkMySQL($school_info['dbhost_nodes'], 3306, $dbname, $agora['nodes']['username'], $agora['nodes']['userpwd'], 'users');

test_server();
