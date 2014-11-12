<?php

function get_all_scripts() {
	$basedir = dirname(__FILE__).'/';

	$scriptsfiles = glob ($basedir.'script_*.class.php');
	$scripts = array();
	foreach ($scriptsfiles as $scriptpath) {
		require_once($scriptpath);
		$file = str_replace($basedir, '', $scriptpath);
		$class = str_replace('.class.php', '', $file);
		$script = new $class();
		$scripts[$class] = $script;
	}
	return $scripts;
}

function scripts_execute_script($scriptclass) {
	$basedir = dirname(__FILE__).'/';
	if (!file_exists($basedir.$scriptclass.'.class.php')) {
		echo 'Script '.$scriptclass.' not found';
		return false;
	}
	require_once($scriptclass.'.class.php');
	$script = new $scriptclass();
	return $script->execute();
}
