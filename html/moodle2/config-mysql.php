<?php

define('AGORA_BASE', 'agora');
define('INSTALL_BASE', '/srv/www/' . AGORA_BASE . '/'); 

require_once(INSTALL_BASE . 'html/config/env-config.php');

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle2';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'agora';
$CFG->prefix    = 'ml_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => 0,
);

$CFG->wwwroot   = 'http://agora/'.AGORA_BASE.'/moodle2';
$CFG->dataroot  = INSTALL_BASE .'moodledata/moodle2/usu_mysql';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->langotherroot = dirname(__FILE__) . '/lang/';

$CFG->passwordsaltalt1 = '';
$CFG->passwordsaltmain = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';

$school_info = array('clientCode' => 0);

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

require_once(dirname(__FILE__) . '/settings.php');
require_once(dirname(__FILE__) . '/lib/setup.php');

