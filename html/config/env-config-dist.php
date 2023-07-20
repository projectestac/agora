<?php

global $agora;

// Environment vars
$agora['server']['root'] = dirname(dirname(dirname(__FILE__))) . '/'; // Directori base de la instal·lació d'Àgora ($BASE_AGORA)
$agora['server']['server'] = 'https://agora-aws.xtec.cat'; // URL base general
$agora['server']['nodes'] = 'https://agora-aws-nodes.xtec.cat'; // URL base per als Nodes
$agora['server']['se-url'] = 'https://agora-aws-se.xtec.cat'; // URL base per als Serveis Educatius
$agora['server']['projectes'] = 'https://agora-aws-projectes.xtec.cat'; // URL base per als Projectes
$agora['server']['eoi'] = 'https://agora-aws-eoi.xtec.cat'; // URL base per a les EOI
$agora['server']['base'] = '/'; // Context de l'aplicació (és a dir, el que cal escriure després del servidor per accedir a l'aplicació)
$agora['server']['datadir'] = 'data/'; // Directori arrel de dades d'usuari (compartit entre servidors)
$agora['server']['localdatadir'] = 'localdata/'; // Directori arrel de dades d'usuari locals (local a cada servidor)
$agora['server']['temp'] = ''; // Ubicació alternativa pels directoris temporals del moodledata
$agora['server']['userprefix'] = 'usu'; // Prefix dels esquemes dels usuaris de base de dades que s'han creat. Així, per exemple, si s'han creat usuaris de l'estil USUx (com ara USU1, USU2...), el prefix és USU.
$agora['server']['enviroment'] = 'LOCAL'; // Entorn (INT, ACC, PRO, FRM)
$agora['server']['school_information'] = 'https://aplicacions.ensenyament.gencat.cat/pls/xtec/agora_dades_centre?p_codi_centre=';

// Admin database access info (MySQL)
$agora['admin']['username'] = 'root';
$agora['admin']['userpwd'] = '';
$agora['admin']['database'] = 'portal';
$agora['admin']['host'] = 'localhost';
$agora['admin']['port'] = '3306';
$agora['admin']['datadir'] = $agora['server']['datadir'] . 'portaldata/';

// Moodle database access info (Postgres)
$agora['moodle2']['userpwd'] = '';
$agora['moodle2']['datadir'] = $agora['server']['datadir'] . 'moodledata/';
$agora['moodle2']['memcache_servers'] = '';
$agora['moodle2']['redis_servers'] = '127.0.0.1';
$agora['moodle2']['memcached_session_servers'] = '';
$agora['moodle2']['redis_session_servers'] = '127.0.0.1';

// WordPress database access info (MySQL)
$agora['nodes']['username'] = 'root'; // Usuari per accedir a totes les bases de dades
$agora['nodes']['userpwd'] = '';
$agora['nodes']['datadir'] = $agora['server']['datadir'] . 'wpdata/';

// WordPress Authentication Unique Keys and Salts.
$agora['nodes']['auth_key'] = 'g#N/2LMcmrPOV+}O]o^?5l+F';
$agora['nodes']['secure_auth_key'] = 'g#N/2LMcmrPOV+}O]o^?5l+F';
$agora['nodes']['logged_in_key'] = 'g#N/2LMcmrPOV+}O]o^?5l+F';
$agora['nodes']['nonce_key'] = 'g#N/2LMcmrPOV+}O]o^?5l+F';
$agora['nodes']['auth_salt'] = 'g#N/2LMcmrPOV+}O]o^?5l+F';
$agora['nodes']['secure_auth_salt'] = 'g#N/2LMcmrPOV+}O]o^?5l+F';
$agora['nodes']['logged_in_salt'] = 'g#N/2LMcmrPOV+}O]o^?5l+F';
$agora['nodes']['nonce_salt'] = 'g#N/2LMcmrPOV+}O]o^?5l+F';

// SMTP params
$agora['mail']['server'] = '';
$agora['mail']['username'] = '';
$agora['mail']['userpwd'] = '';
$agora['mail']['reply'] = 'notificacions@educaciodigital.cat';

// Password to reset xtecadmin
$agora['xtecadmin']['password'] = '';

// Google keys
$agora['recaptchapublickey'] = '';
$agora['recaptchaprivatekey'] = '';
$agora['google_api_key'] = ''; // API key for Google Calendar

// Load vars common in all environments
include_once $agora['server']['root'] . 'html/config/config.php';
