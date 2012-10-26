<?php

//------------ DESENVOLUPAMENT
define('INSTALL_BASE', '/srv/www/agora/');               // Directori base de la instal·lació d'Àgora ($BASE_AGORA)

//------------ INTEGRACIÓ
//define('INSTALL_BASE', '/dades/eduphp/agora-moodle/'); // Directori base de la instal·lació d'Àgora ($BASE_AGORA)

//------------ ACCEPTACIÓ i FORMACIÓ
//define('INSTALL_BASE', '/dades/agora-moodle/');        // Directori base de la instal·lació d'Àgora ($BASE_AGORA) 	

//------------ PRODUCCIÓ
//define('INSTALL_BASE', '/dades/');                     // Directori base de la instal·lació d'Àgora ($BASE_AGORA) 	


//----- PART COMUNA
require_once(INSTALL_BASE . 'html/config/env-config.php');

unset($CFG);
global $CFG;

$CFG = new stdClass();

$CFG->dbtype = $agora['moodle']['dbtype'];
$CFG->dbhost = $agora['moodle']['dbhost'];
$CFG->dbpass = $agora['moodle']['userpwd'];
$CFG->prefix = $agora['moodle2']['prefix'];

$CFG->admin = 'admin';

$CFG->dboptions = array (
    'dbpersist' => true,
    'dbsocket' => false,
    'dbport' => ''
);

$CFG->langotherroot = dirname(__FILE__) . '/lang/';

$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode

$CFG->passwordsaltalt1 = '';
$CFG->passwordsaltmain = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';

/*
  @ini_set('display_errors', '1'); // NOT FOR PRODUCTION SERVERS!

  $CFG->debug = 38911;  // DEBUG_DEVELOPER // NOT FOR PRODUCTION SERVERS!
  $CFG->debugdisplay = true;   // NOT FOR PRODUCTION SERVERS!
  if (isset($_REQUEST['debug']) && $_REQUEST['debug']=='true') {
  $CFG->dblogerror = true;
  $CFG->debug = 2047;
  }

  // You can specify a comma separated list of user ids that that always see
  // debug messages, this overrides the debug flag in $CFG->debug and $CFG->debugdisplay
  // for these users only.
  $CFG->debugusers = '2';
*/

require_once(dirname(__FILE__) . '/site-config.php');
require_once(dirname(__FILE__) . '/settings.php');
require_once(dirname(__FILE__) . '/lib/setup.php');

