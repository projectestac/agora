<?php

function get_all_scripts($param = false){
	global $CFG;

	$basedir = $CFG->dirroot.'/local/agora/scripts/';
	$scripts_files = glob ($basedir.'script_*.class.php');
	$scripts = array();
	foreach ($scripts_files as $script_path) {
		require_once ($script_path);
		$file = str_replace($basedir,'',$script_path);
		$class = str_replace('.class.php','',$file);
		$script = new $class();
		// Asked for cron
		if($param == 'cron' && $script->cron){
			$scripts[$class] = $script;
			continue;
		}

		if($script->is_visible()){
			$scripts[$class] = $script;
			continue;
		}
	}
	return $scripts;
}

function scripts_execute_crons(){
	$scripts = get_all_scripts('cron');
	if(!empty($scripts)){
		mtrace('Executing Àgora Scripts crons...');
		foreach ($scripts as $script) {
			$script->cron();
		}
		mtrace('Àgora Scripts crons done!');
	}
}

function scripts_execute_script($scriptclass){
	global $CFG;
	require_once($scriptclass.'.class.php');
	$script = new $scriptclass();
	$action = optional_param('action',false,PARAM_TEXT);
	return $script->execute_web($action);
}

function scripts_list_scripts(){
	global $OUTPUT;
	$scripts = get_all_scripts();
	echo $OUTPUT->box_start('generalbox');
	echo '<ul>';
	foreach($scripts as $script_name => $script){
		echo "<li><strong><a href=\"?script=$script_name\">$script->title:</a></strong> <i>$script->info</i></li>";
	}
	echo '</ul>';
	echo $OUTPUT->box_end();
}