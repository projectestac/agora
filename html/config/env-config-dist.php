<?php

	global $agora;

	// Admin database access info (MySQL)
	$agora['admin']['username']    = 'root';          // Nom d'usuari
	$agora['admin']['userpwd']     = 'agora';         // Contrasenya
	$agora['admin']['database']    = 'adminagora';    // Base de dades
	$agora['admin']['host']        = 'localhost';     // Nom del servidor de bases de dades
	$agora['admin']['port']        = '3306';          // Port del servidor de bases de dades

	// Schools Moodle database access info (Oracle)
	$agora['moodle']['userpwd']    = 'agora';         // Contrasenya que tenen tots els esquemes
	$agora['moodle']['database']   = 'XE';            // Base de dades (tal i com està definida al tnsnames) de l'esquema anterior (sense el número)
	$agora['moodle']['dbnumber']   = '';              // Número de la primera base de dades de l'aplicació; a acceptació 1 i a producció 3
	$agora['moodle']['datadir']    = 'moodledata/';   // Directori de dades d'usuari del moodle

	// Schools Moodle 2 config info
	$agora['moodle2']['datadir']   = 'moodledata/moodle2/';   // Directori de dades d'usuari del moodle2

	// Schools intranet database access info (MySQL)
	$agora['intranet']['username'] = 'root';          // Usuari/ària per accedir a les bases de dades de les intranets
	$agora['intranet']['userpwd']  = 'agora';         // Contrasenya de l'usuari/ària anterior
	$agora['intranet']['host']     = 'localhost';     // Servidor de la base de dades
	$agora['intranet']['datadir']  = 'zkdata/';       // Directori de dades d'usuari de la intranet

    // Schools WordPress database access info (MySQL)
	$agora['nodes']['username'] = 'root';             // Usuari/ària per accedir a les bases de dades
	$agora['nodes']['userpwd']  = 'agora';            // Contrasenya de l'usuari/ària anterior
	$agora['nodes']['datadir']  = 'wpdata/';          // Directori de dades d'usuari

    // Environment vars	
	$agora['server']['root']       = '/srv/www/agora/';  // Directori base de la instal·lació d'Àgora ($BASE_AGORA)
	$agora['server']['server']     = 'http://agora';     // URL base del servidor
	//$agora['server']['marsupial']  = 'http://agora-virtual.educat1x1.cat';   // URL base del servidor per utilitzar els mòduls de marsupial
    $agora['server']['marsupial'] = $agora['server']['server'];
	$agora['server']['base']       = '/agora/';          // Context de l'aplicació (és a dir, el que cal escriure després del servidor per accedir a l'aplicació). En el cas d'acceptació agora-moodle i a producció res.
	$agora['server']['cgi_base']   = '/cgi-bin/';        // Context dels CGI (és a dir, el que cal escriure després del servidor per accedir als CGI).
	$agora['server']['userprefix'] = 'usu';              // Prefix dels esquemes dels usuaris de base de dades que s'han creat. Així, per exemple, si s'han creat usuaris de l'estil USUx (com ara USU1, USU2...), el prefix és USU.
	$agora['server']['enviroment'] = 'LOCAL';            // Referent a l'entorn (INT, ACC, PRO)

	// Load vars common in all environments
	include_once $agora['server']['root'].'html/config/config.php';

