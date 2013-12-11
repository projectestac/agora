<?php
//------------ DESENVOLUPAMENT
define('INSTALL_BASE', '/srv/www/agora/');               // Directori base de la instal·lació d'Àgora ($BASE_AGORA)
$dbname = 'XE';
$id = 4;


//----- PART COMUNA
require_once(INSTALL_BASE . 'html/config/env-config.php');

unset($CFG);

$CFG = new stdClass();
$CFG->isagora   = false;
$CFG->dbtype    = 'oci8po';
$CFG->dbhost    = $agora['moodle']['dbhost'];
$CFG->dbname    = $dbname;
$CFG->dbuser    = 'USU' . $id;
$CFG->dbpass    = $agora['moodle']['userpwd'];
$CFG->dbpersist = true;
$CFG->prefix    = $agora['moodle']['prefix'];

$CFG->wwwroot   = WWWROOT . 'moodle222';
$CFG->dirroot   = $agora['server']['root'] . 'html/moodle222';
$CFG->dataroot  = $agora['server']['root'] . $agora['moodle']['datadir'] . 'usu' . $id;
$CFG->admin     = 'admin';

$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode

$CFG->passwordsaltalt1 = '';
$CFG->passwordsaltmain = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';

require_once(dirname(__FILE__) . '/local/agora.php');

require_once("$CFG->dirroot/lib/setup.php");
