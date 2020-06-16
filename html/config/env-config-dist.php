<?php

global $agora;

// Environment vars
$agora['server']['root'] = dirname(dirname(dirname(__FILE__))) . '/'; // Directori base de la instal·lació d'Àgora ($BASE_AGORA)
$agora['server']['server'] = 'https://agora-aws.xtec.cat'; // URL base general
$agora['server']['nodes'] = 'https://agora-aws.xtec.cat'; // URL base per als Nodes
$agora['server']['se-url'] = 'https://agora-aws-se.xtec.cat'; // URL base per als Serveis Educatius
$agora['server']['projectes'] = 'https://agora-aws-projectes.xtec.cat'; // URL base per als Projectes
$agora['server']['base'] = '/'; // Context de l'aplicació (és a dir, el que cal escriure després del servidor per accedir a l'aplicació)
$agora['server']['datadir'] = 'data/'; // Directori arrel de dades d'usuari (compartit entre servidors)
$agora['server']['localdatadir'] = 'localdata/'; // Directori arrel de dades d'usuari locals (local a cada servidor)
$agora['server']['temp'] = ''; // Ubicació alternativa pels directoris temporals del moodledata
$agora['server']['userprefix'] = 'usu'; // Prefix dels esquemes dels usuaris de base de dades que s'han creat. Així, per exemple, si s'han creat usuaris de l'estil USUx (com ara USU1, USU2...), el prefix és USU.
$agora['server']['enviroment'] = 'LOCAL'; // Entorn (INT, ACC, PRO, FRM)
$agora['server']['school_information'] = 'https://aplicacions.ensenyament.gencat.cat/pls/xtec/agora_dades_centre?p_codi_centre=';

// Admin database access info (MySQL)
$agora['admin']['username'] = 'root';
$agora['admin']['userpwd'] = 'agora';
$agora['admin']['database'] = 'adminagora';
$agora['admin']['host'] = 'localhost';
$agora['admin']['port'] = '3306';
$agora['admin']['datadir'] = $agora['server']['datadir'] . 'portaldata/';

// Moodle database access info (Postgres)
$agora['moodle2']['userpwd'] = 'agora'; // Contrasenya que tenen tots els esquemes
$agora['moodle2']['datadir'] = $agora['server']['datadir'] . 'moodledata/';
$agora['moodle2']['memcache_servers'] = '127.0.0.1';
$agora['moodle2']['redis_servers'] = '127.0.0.1';
$agora['moodle2']['memcached_session_servers'] = '';
$agora['moodle2']['redis_session_servers'] = '';

// WordPress database access info (MySQL)
$agora['nodes']['username'] = 'root'; // Usuari per accedir a totes les bases de dades
$agora['nodes']['userpwd'] = 'agora';
$agora['nodes']['datadir'] = $agora['server']['datadir'] . 'wpdata/';

// SMTP params
$agora['mail']['server'] = '';
$agora['mail']['username'] = '';
$agora['mail']['userpwd'] = '';
$agora['mail']['reply'] = 'notificacions@educaciodigital.cat';

// Other passwords
$agora['xtecadmin']['password'] = '6142bfd56a583d891f0b1dcdbb2a9ef8';
$agora['opcache']['password'] = 'agora';

// Load vars common in all environments
include_once $agora['server']['root'] . 'html/config/config.php';
