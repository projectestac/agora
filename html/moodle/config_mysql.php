<?php

unset($CFG);
$CFG = new stdClass();

$CFG->dbtype    = 'mysql';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle19';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'agora';
$CFG->prefix    = 'ml_';
$CFG->dbpersist = false;

$CFG->passwordsaltmain = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';

$CFG->wwwroot  = 'http://agora/agora/moodle';
$CFG->dirroot  = '/srv/www/agora/html/moodle';
$CFG->dataroot = '/srv/www/agora/moodledata/usu_mysql';

$CFG->directorypermissions = 02777;

$CFG->admin = 'admin';

$CFG->useatria = false;
$CFG->center = 0;

$CFG->noreplyaddress = 'noreply@agora.xtec.cat';

include_once("$CFG->dirroot/lib/setup.php");

