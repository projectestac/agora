<?php
require_once($CFG->dirroot . '/lib/adminlib.php');
require_once($CFG->dirroot . '/lib/dmllib.php');

function wrs_registerPlugin($keyword, $title, $module, $enabledByDefault) {
	$data = array(
		'keyword' => $keyword,
		'title' => $title, 
		'module' => $module,
		'enabledByDefault' => ($enabledByDefault) ? '1' : '0'
	);
	
	$record = get_record('config', 'name', 'filter_wiris_plugin_list');
	
	if ($record) {
		$list = unserialize($record->value);
		$list[] = $data;
		$serializedList = serialize($list);
		
		$dataObject = new stdClass();
		$dataObject->id = $record->id;
		$dataObject->value = $serializedList;
		
		update_record('config', $dataObject);
	}
	else {
		$serializedList = serialize(array($data));
		
		$dataObject = new stdClass();
		$dataObject->name = 'filter_wiris_plugin_list';
		$dataObject->value = $serializedList;
		
		insert_record('config', $dataObject);
	}
}
