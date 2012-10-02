<?php
require_once($CFG->dirroot . '/filter/wiris/wrs_config.php');

$formula = $CFG->wirisformulaeditorenabled;
$cas = $CFG->wiriscasenabled;

if (!$formula && !$cas) {
	$output = 'WIRIS editor and WIRIS cas are not installed';
} else if (!$formula) {
	$output = 'WIRIS editor is not installed';
} else if (!$cas) {
	$output = 'WIRIS cas is not installed';
} else {
	$output = '';
}

$settings->add(new admin_setting_heading('filter_wirisheading', 'WIRIS Filter Settings', $output));

if ($formula) {
	$settings->add(new admin_setting_configcheckbox('filter_wiris_editor_enable', 'WIRIS editor', '', '1'));
}

if ($cas) {
    //XTEC ************ AFEGIT - Add link to Wiris quizzes installation
    //2011.11.16 - sarjona
    $help = isset($CFG->filter_wiris_plugin_list)?'':'<a href="'.$CFG->wwwroot.'/wiris-quizzes/installdb.php">Wiris quizzes</a>';
    $settings->add(new admin_setting_configcheckbox('filter_wiris_cas_enable', 'WIRIS cas', $help, '1'));

    //************ ORIGINAL
    /*
    $settings->add(new admin_setting_configcheckbox('filter_wiris_cas_enable', 'WIRIS cas', '', '1'));
    */
    //************ FI       
}

if (isset($CFG->filter_wiris_plugin_list)) {
	$pluginList = unserialize($CFG->filter_wiris_plugin_list);
	foreach ($pluginList as $plugin) {
		$settings->add(new admin_setting_configcheckbox($plugin['keyword'], $plugin['title'], '', $plugin['enabledByDefault']));
	}        
}

// Clearing cache.

if (isset($CFG->filter_wiris_clear_cache) && $CFG->filter_wiris_clear_cache) {
	$directory = opendir($CFG->dataroot . '/' . $CFG->wirisimagedir);
	
	if ($directory !== false) {
		$file = readdir($directory);
		
		while ($file !== false) {
			$filePath = $CFG->dataroot . '/' . $CFG->wirisimagedir . '/' . $file;
		
			if (is_file($filePath)) {
				unlink($filePath);
			}
			
			$file = readdir($directory);
		}
	}

	// Disabling the cache clearing for the next request.
	$record = get_record('config', 'name', 'filter_wiris_clear_cache');
	
	if ($record) {
		$dataObject = new stdClass();
		$dataObject->id = $record->id;
		$dataObject->value = 0;
		
		update_record('config', $dataObject);
	}
	
	$CFG->filter_wiris_clear_cache = false;
}

$settings->add(new admin_setting_configcheckbox('filter_wiris_clear_cache', 'Clear cache', '', '0'));
