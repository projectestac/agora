<?php

define('INSTALL_BASE', dirname(dirname(dirname(__FILE__))));
define('MOODLE_BASE', dirname(__FILE__));
require_once(INSTALL_BASE . '/html/config/env-config.php');

unset($CFG);
global $CFG;

$CFG = new stdClass();

$CFG->dbtype = $agora['moodle2']['dbtype'];
$CFG->dbhost = $agora['moodle2']['dbhost'];
$CFG->dbpass = $agora['moodle2']['userpwd'];
$CFG->prefix = $agora['moodle2']['prefix'];

$CFG->admin = 'admin';

$CFG->dboptions = array (
    'dbpersist' => true,
    'dbsocket' => false,
    'dbport' => ''
);
$CFG->langotherroot = MOODLE_BASE . '/lang/';

$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode

$CFG->passwordsaltalt1 = '';
$CFG->passwordsaltmain = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';

require_once(MOODLE_BASE . '/site-config.php');
require_once(MOODLE_BASE . '/settings.php');
require_once(MOODLE_BASE . '/lib/setup.php');

