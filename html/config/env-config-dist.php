<?php

global $agora;

// Environment vars
$agora['server']['root']       = dirname(dirname(dirname(__FILE__))).'/';  // Directori base de la instal·lació d'Àgora ($BASE_AGORA)
$agora['server']['server']     = 'https://agora-aws.xtec.cat';     // URL base del servidor
$agora['server']['se-url']     = 'https://agora-aws-se.xtec.cat';   // URL base del servidor per Serveis Educatius
$agora['server']['projectes']  = 'https://agora-aws-projectes.xtec.cat';   // URL base del servidor per Projectes
$agora['server']['base']       = '/';          // Context de l'aplicació (és a dir, el que cal escriure després del servidor per accedir a l'aplicació). En el cas d'acceptació agora-moodle i a producció res.
$agora['server']['datadir']    = 'data/';            // Directori arrel de dades d'usuari
$agora['server']['temp']       = '';                 // Ubicació alternativa pels directoris temporals del moodledata
$agora['server']['userprefix'] = 'usu';              // Prefix dels esquemes dels usuaris de base de dades que s'han creat. Així, per exemple, si s'han creat usuaris de l'estil USUx (com ara USU1, USU2...), el prefix és USU.
$agora['server']['enviroment'] = 'LOCAL';            // Referent a l'entorn (INT, ACC, PRO, FRM)
$agora['server']['school_information'] = 'https://aplicacions.ensenyament.gencat.cat/pls/xtec/agora_dades_centre?p_codi_centre=';

// Admin database access info (MySQL)
$agora['admin']['username']    = 'root';          // Nom d'usuari
$agora['admin']['userpwd']     = 'agora';         // Contrasenya
$agora['admin']['database']    = 'adminagora';    // Base de dades
$agora['admin']['host']        = 'localhost';     // Nom del servidor de bases de dades
$agora['admin']['port']        = '3306';          // Port del servidor de bases de dades
$agora['admin']['datadir']     = $agora['server']['datadir'] . 'portaldata/'; // Directori de dades d'usuari

// Schools Moodle 2 config info
$agora['moodle2']['userpwd']   = 'agora';         // Contrasenya que tenen tots els esquemes
$agora['moodle2']['database']  = 'XE';            // Base de dades (tal i com està definida al tnsnames) de l'esquema anterior (sense el número)
$agora['moodle2']['dbnumber']  = '';              // Número de la primera base de dades de l'aplicació; a acceptació en blanc i a producció 3
$agora['moodle2']['datadir']   = $agora['server']['datadir'] . 'moodledata/';  // Directori de dades d'usuari del moodle2
$agora['moodle2']['memcache_servers'] = '127.0.0.1';
$agora['moodle2']['memcached_session_servers'] = '';
$agora['moodle2']['redis_session_servers'] = '';

// Schools WordPress database access info (MySQL)
$agora['nodes']['username']    = 'root';          // Usuari/ària per accedir a les bases de dades
$agora['nodes']['userpwd']     = 'agora';         // Contrasenya de l'usuari/ària anterior
$agora['nodes']['datadir']     = $agora['server']['datadir'] . 'wpdata/';  // Directori de dades d'usuari

// Load vars common in all environments
include_once $agora['server']['root'].'html/config/config.php';
