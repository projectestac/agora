<?php
define('CLI_SCRIPT', true);
require_once('../../../config.php');

$ccentre  = optional_param('ccentre','',PARAM_TEXT);
echo "root: ".$CFG->wwwroot."\n";
echo "ccentre: ".$ccentre."\n";
die();
