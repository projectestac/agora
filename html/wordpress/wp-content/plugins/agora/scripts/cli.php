<?php
define('CLI_SCRIPT', true);
require( dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php' );
require_once(dirname(__FILE__).'/scripts.lib.php');
$script = get_cli_arg('s');

echo "Start server Time: ".date('r', time())."\n";

set_time_limit(0);
try{
    $success = scripts_execute_script($script);
} catch (Exception $e){
    $success = false;
    echo($e->getMessage());
}

echo "End server Time: ".date('r', time())."\n";

if ($success) {
	echo 'Script '.$script.' succeed';
	exit (0);
} else {
	echo 'Script '.$script.' failed';
	exit (-1);
}
