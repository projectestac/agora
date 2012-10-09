<?php

//------------ DESENVOLUPAMENT
define('INSTALL_BASE', '/srv/www/agora/');       // Directori base de la instal·lació d'Àgora ($BASE_AGORA)

	
//------------ INTEGRACIÓ
/*
define('INSTALL_BASE', '/dades/eduphp/agora-moodle/');       // Directori base de la instal·lació d'Àgora ($BASE_AGORA)
*/


//------------ ACCEPTACIÓ
/*
define('INSTALL_BASE', '/dades/agora-moodle/');       // Directori base de la instal·lació d'Àgora ($BASE_AGORA) 	
*/

	
//------------ PRODUCCIÓ
/*
define('INSTALL_BASE', '/dades/');       // Directori base de la instal·lació d'Àgora ($BASE_AGORA) 	
*/
	


//----- PART COMUNA
	include_once(INSTALL_BASE.'html/config/env-config.php');
	
	unset($CFG);

	$CFG->dbtype    = $agora['moodle']['dbtype'];
	$CFG->dbhost    = $agora['moodle']['dbhost'];
	$CFG->dbpass    = $agora['moodle']['userpwd'];
	$CFG->dbpersist = false;
	$CFG->prefix    = $agora['moodle']['prefix'];

	$CFG->dirroot   = INSTALL_BASE.'html/'.MOODLE_DIRROOT;
	$CFG->admin     = 'admin';
	
	$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode
	if (isset($_REQUEST['debug']) && $_REQUEST['debug']=='true'){
  		$CFG->dblogerror = true;
  		$CFG->debug = 2047;
	}
	
    include_once(INSTALL_BASE.'/html/'.MOODLE_DIRROOT.'/site-config.php');
    include_once(INSTALL_BASE.'/html/'.MOODLE_DIRROOT.'/settings.php');

    require_once("$CFG->dirroot/lib/setup.php");
