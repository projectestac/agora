<?php

function get_all_scripts($param = false) {
	global $CFG;

	$basedir = $CFG->dirroot.'/local/agora/scripts/';
	$scripts_files = glob ($basedir.'script_*.class.php');
	$scripts = array();
	foreach ($scripts_files as $script_path) {
		require_once ($script_path);
		$file = str_replace($basedir, '', $script_path);
		$class = str_replace('.class.php', '', $file);
		$script = new $class();
		// Asked for cron
		if ($param == 'cron' && $script->cron) {
			$scripts[$class] = $script;
			continue;
		}

		if ($param == 'cli' && $script->cli) {
			$scripts[$class] = $script;
			continue;
		}

		if ($param == 'api' && $script->cli && $script->api) {
			$scripts[$class] = $script;
			continue;
		}

		if ($script->is_visible()) {
			$scripts[$class] = $script;
			continue;
		}
	}
	return $scripts;
}

function scripts_execute_crons() {
	$scripts = get_all_scripts('cron');
	if (!empty($scripts)) {
		mtrace('Executing Àgora Scripts crons...');
		foreach ($scripts as $script) {
			$script->cron();
		}
		mtrace('Àgora Scripts crons done!');
	}
}

function scripts_execute_script($scriptclass) {
	require_once($scriptclass.'.class.php');
	$script = new $scriptclass();
	$action = optional_param('action', false, PARAM_TEXT);
	return $script->execute_web($action);
}


function scripts_cli_execute_script($scriptclass) {
	if (!file_exists($scriptclass.'.class.php')) {
		mtrace('Script '.$scriptclass.' not found');
		return false;
	}
	require_once($scriptclass.'.class.php');
	$script = new $scriptclass();
	return $script->execute_cli();
}

function scripts_cli_get_params($scriptclass) {
	if (!file_exists($scriptclass.'.class.php')) {
		mtrace('Script '.$scriptclass.' not found');
		return false;
	}
	require_once($scriptclass.'.class.php');
	$script = new $scriptclass();
	$params = $script->params();
	foreach ($params as $key => $value) {
		mtrace(" --$key");
	}
}


function scripts_list_scripts() {
	global $OUTPUT;
	$scripts = get_all_scripts();
	echo $OUTPUT->box_start('generalbox');
	echo '<ul>';
	foreach ($scripts as $script_name => $script) {
		echo "<li><strong><a href=\"?script=$script_name\">$script->title:</a></strong> <i>$script->info</i></li>";
	}
	echo '</ul>';
	echo $OUTPUT->box_end();
}

function scripts_cli_list_scripts() {
	$scripts = get_all_scripts('cli');
	foreach ($scripts as $script_name => $script) {
		mtrace("- $script->title ($script_name): $script->info");
	}
}

function scripts_api_list_scripts() {
	$scripts = get_all_scripts('api');
	$actions = array();
	foreach ($scripts as $script_name => $script) {
        $action = new StdClass();
        $action->action = $script_name;
        $action->title = $script->title;
        $action->description = $script->info;
        $scriptclass = new $script_name();
		$action->params = array_keys($scriptclass->params());
        $actions[] = $action;
	}
	return $actions;
}