<?php

unset($CFG);
$CFG = new stdClass();

$CFG->dbtype    = 'oci8po';
$CFG->dbhost    = '';
$CFG->dbname    = 'XE';
$CFG->dbuser    = 'usu_mdl_single';
$CFG->dbpass    = 'agora';
$CFG->prefix    = 'ml';
$CFG->dbpersist = false;

$CFG->passwordsaltmain = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';

$CFG->wwwroot  = 'http://agora/agora/moodle';
$CFG->dirroot  = '/srv/www/agora/html/moodle';
$CFG->dataroot = '/srv/www/agora/moodledata';

$CFG->directorypermissions = 02777;

$CFG->admin = 'admin';

include_once("$CFG->dirroot/lib/setup.php");


