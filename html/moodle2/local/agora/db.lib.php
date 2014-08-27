<?php

/**
 * Connecta a una base de dades configurada dins la taula at_db_connect
 *
 * @param string shortname de la taula que vulguem consultar
 * @return  moodle_database
 */
function external_db($shortname){
	global $DB, $DBHANDLERS;

	//Es comprova si en la cache de handlers ja existeix el solicitat
	if (!isset($DBHANDLERS)) $DBHANDLERS = array();
	if(isset($DBHANDLERS[$shortname])) return $DBHANDLERS[$shortname];
	//if(array_key_exists($shortname, $DBHANDLERS)) return $DBHANDLERS[$shortname];

	$db_record = get_db_info($shortname);

	if(!$db_record){
		$DBHANDLERS[$shortname] = false;
		return false;
	}

	$options = array();
	$options['dbpersist'] = $db_record->persist;

	//Per ara només farem servir aquestes, per ampliar-ho caldria afegir aquest paràmetre a la taula
	$library = 'native';

	if (!$handler = moodle_database::get_driver_instance($db_record->type, $library, true)) {
		throw new dml_exception('dbdriverproblem', "Unknown driver $library/$db_record->type");
	}

	try {
		if($handler->connect($db_record->host, $db_record->username, $db_record->password, $db_record->name, $db_record->prefix, $options)){
			$DBHANDLERS[$shortname] = $handler;
		} else {
			return false;
		}
	} catch (Exception $e) {
		print_error('Error connecting external DB '.$shortname);
		return false;
	}

	return $handler;
}

function get_db_info($shortname){
	global $agora, $school_info;
	$db_record = new StdClass();
	switch($shortname){
		case 'intranet':
			$db_record->host = $agora['intranet']['host'];
			$db_record->username = $agora['intranet']['username'];
			$db_record->password = $agora['intranet']['userpwd'];
			$db_record->name = $agora['intranet']['userprefix'] . $school_info['id_intranet'];
			$db_record->prefix = $agora['intranet']['prefix'];
			$db_record->persist = false;
			$db_record->type = $agora['intranet']['dbtype'];
			break;
		case 'wordpress':
			$db_record->host = $school_info['dbhost_nodes'];
			$db_record->username = $agora['nodes']['username'];
			$db_record->password = $agora['nodes']['userpwd'];
			$db_record->name = $agora['nodes']['userprefix'] . $school_info['id_nodes'];
			$db_record->prefix = $agora['nodes']['prefix'] . '_';
			$db_record->persist = false;
			$db_record->type = $agora['intranet']['dbtype'];
			break;
		default:
			return false;
	}
	
	return $db_record;
}
