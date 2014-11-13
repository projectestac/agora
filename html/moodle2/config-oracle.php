<?php

define('AGORA_BASE', 'agora');
define('INSTALL_BASE', dirname(dirname(dirname(__FILE__))));
define('MOODLE_BASE', dirname(__FILE__));
require_once(INSTALL_BASE . 'html/config/env-config.php');

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'oci8po';
$CFG->dbhost    = '';
$CFG->dbname    = 'XE';
$CFG->dbuser    = 'usu_mdl2_single';
$CFG->dbpass    = 'agora';
$CFG->prefix    = 'm2';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => 0,
);

$CFG->wwwroot   = 'http://agora/'.AGORA_BASE.'/moodle2';
$CFG->dataroot  = INSTALL_BASE .'moodledata/moodle2/usu_oracle';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->langotherroot = MOODLE_BASE . '/lang/';

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

require_once(MOODLE_BASE . '/settings.php');
require_once(MOODLE_BASE . '/lib/setup.php');

