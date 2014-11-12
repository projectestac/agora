<?php

require( dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php' );
require_once(dirname(__FILE__).'/scripts.lib.php');

$scripts = get_all_scripts();
$actions = array();
foreach ($scripts as $scriptname => $script) {
    $action = new StdClass();
    $action->action = $scriptname;
    $action->title = $script->title;
    $action->description = $script->info;
    $scriptclass = new $scriptname();
	$action->params = array_keys($scriptclass->params());
    $actions[] = $action;
}
echo json_encode($actions);
