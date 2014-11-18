<?php

global $agora;

// Environment vars
$agora['server']['root']       = dirname(dirname(dirname(__FILE__))).'/';  // Directori base de la instal·lació d'Àgora ($BASE_AGORA)
$agora['server']['server']     = 'http://agora';     // URL base del servidor
$agora['server']['marsupial']  = 'http://agora-virtual.educat1x1.cat';   // URL base del servidor per utilitzar els mòduls de marsupial
$agora['server']['base']       = '/agora/';          // Context de l'aplicació (és a dir, el que cal escriure després del servidor per accedir a l'aplicació). En el cas d'acceptació agora-moodle i a producció res.
$agora['server']['cgi_base']   = '/cgi-bin/';        // Context dels CGI (és a dir, el que cal escriure després del servidor per accedir als CGI).
$agora['server']['docs']       = 'moodledata/';      // Context dels CGI (és a dir, el que cal escriure després del servidor per accedir als CGI).
$agora['server']['userprefix'] = 'usu';              // Prefix dels esquemes dels usuaris de base de dades que s'han creat. Així, per exemple, si s'han creat usuaris de l'estil USUx (com ara USU1, USU2...), el prefix és USU.
$agora['server']['enviroment'] = 'LOCAL';            // Referent a l'entorn (INT, ACC, PRO, FRM)

// Admin database access info (MySQL)
$agora['admin']['username']    = 'root';          // Nom d'usuari
$agora['admin']['userpwd']     = 'agora';         // Contrasenya
$agora['admin']['database']    = 'adminagora';    // Base de dades
$agora['admin']['host']        = 'localhost';     // Nom del servidor de bases de dades
$agora['admin']['port']        = '3306';          // Port del servidor de bases de dades
$agora['admin']['datadir']     = $agora['server']['docs'] . 'portaldata/';  // Directori de dades d'usuari

// Schools Moodle 2 config info
$agora['moodle2']['userpwd']   = 'agora';         // Contrasenya que tenen tots els esquemes
$agora['moodle2']['database']  = 'XE';            // Base de dades (tal i com està definida al tnsnames) de l'esquema anterior (sense el número)
$agora['moodle2']['dbnumber']  = '';              // Número de la primera base de dades de l'aplicació; a acceptació en blanc i a producció 3
$agora['moodle2']['datadir']   = $agora['server']['docs'] . 'moodle2/';  // Directori de dades d'usuari del moodle2
$agora['moodle2']['memcache_servers'] = '127.0.0.1';

// Schools intranet database access info (MySQL)
$agora['intranet']['username'] = 'root';          // Usuari/ària per accedir a les bases de dades de les intranets
$agora['intranet']['userpwd']  = 'agora';         // Contrasenya de l'usuari/ària anterior
$agora['intranet']['host']     = 'localhost';     // Servidor de la base de dades
$agora['intranet']['datadir']  = 'zkdata/';       // Directori de dades d'usuari de la intranet

// Schools WordPress database access info (MySQL)
$agora['nodes']['username']    = 'root';          // Usuari/ària per accedir a les bases de dades
$agora['nodes']['userpwd']     = 'agora';         // Contrasenya de l'usuari/ària anterior
$agora['nodes']['datadir']     = $agora['server']['docs'] . 'wpdata/';  // Directori de dades d'usuari

// Load vars common in all environments
include_once $agora['server']['root'].'html/config/config.php';

