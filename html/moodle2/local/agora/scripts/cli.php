<?php
 define('CLI_SCRIPT', true);
define('CACHE_DISABLE_ALL', true);

require(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
require_once($CFG->libdir.'/clilib.php');      // cli only functions
require_once($CFG->libdir.'/adminlib.php');      // cli only functions
require_once('scripts.lib.php');

// now get cli options
list($options, $params) = cli_get_params(array('help'=>false, 'script'=>false),
                                               array('h'=>'help', 's'=>'script'));

$script = $options['script'];
if ($params) {
    $params = implode("\n  ", $params);
}

if ($options['help'] || !$script) {
    if ($script) {
    	echo "Params of the script $script:\n";
    	scripts_cli_get_params($script);
    } else {
    	    $help =
"Execute Agora operations

Options:
-h, --help            Print out this help
-s, --script          Script to execute

Example:
\$sudo -u www-data /usr/bin/php local/agora/scripts/cli.php

";

    echo $help;

    	echo "Avalaible Scripts:\n";
		scripts_cli_list_scripts();
	}
    die;
}


mtrace("Start server Time: ".date('r', time())."\n");

set_time_limit(0);
try{
    $success = scripts_cli_execute_script($script);
} catch (Exception $e){
    $success = false;
    mtrace($e->getMessage());
}

mtrace("End server Time: ".date('r', time())."\n");

if ($success) {
	mtrace('Script '.$script.' succeed');
	exit (0);
} else {
	mtrace('Script '.$script.' failed');
	exit (-1);
}


