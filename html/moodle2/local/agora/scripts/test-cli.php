<?php
define('CLI_SCRIPT', true);
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
require_once("$CFG->libdir/clilib.php");

list($options, $unrecognized) = cli_get_params(array('ccentre'=>'false'));

echo "root: ".$CFG->wwwroot."\n";
echo "ccentre: ".$options['ccentre']."\n";

print_object($school_info);
die();
