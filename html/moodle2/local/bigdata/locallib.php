<?php

class bigdata {

	private $file;
	private $roles;
	private $modules;

	function __construct($filepath, $escola, $roles){
		$this->file = new bigdata_filemanager($filepath, $escola);
		$this->roles = $roles;

		// Platform common export
		$this->modules = $this->add_data('modules', null, 'id, name', true);
		$this->add_data_select('role', 'id IN ('.implode(',', $this->roles).')', null, 'id, shortname');
	}

	public function export_course($courseid) {
		global $CFG, $USER, $DB;

		@set_time_limit(0);
        raise_memory_limit(MEMORY_EXTRA);

		$course = $DB->get_record('course', array('id' => $courseid), 'id, fullname');
		if (!$course) {
			throw Exception('coursenotfound');
			return false;
		}
		$this->file->add($course, 'course');
		unset($course);
		$coursecontext = context_course::instance($courseid);

		// User and roles. User only userid, it's not needed to export anything
		$role_assignments = $this->add_data_select('role_assignments', 'roleid IN ('.implode(',', $this->roles).') AND contextid = :contextid', array('contextid' => $coursecontext->id), 'id, roleid, contextid, userid', true);

		// Log
		$this->add_data('log', array('course' => $courseid), 'id, time, userid, course, module, cmid, action');

		// Context
		$this->add_data('context', array('path' => $coursecontext->path), 'id, contextlevel, instanceid');
		$this->add_data_select('context', "path LIKE '$coursecontext->path/%'", null, 'id, contextlevel, instanceid');

		// Activities
		$this->add_data('course_modules', array('course' => $courseid), 'id, course, module, instance, added');
		foreach ($this->modules as $module) {
			switch($module->name){
				case 'book':
				case 'glossary':
				case 'survey':
				case 'wiki':
					$fields = 'id, course, name, timecreated, timemodified';
					break;
				case 'assignment':
					$fields = 'id, course, name, timeavailable, timemodified';
					break;
				case 'assign':
					$fields = 'id, course, name, timemodified'; // timeavailable no existeix...
					break;
				case 'chat': // Not enabled in agora
					$fields = "";
					// $fields = 'id, course, name, timemodified';
					break;
				case 'choice':
					$fields = 'id, course, name, timeopen, timeclose, timemodified';
					break;
				case 'lesson':
					$fields = 'id, course, name, available, timemodified';
					break;
				case 'quiz':
					$fields = 'id, course, name, timeopen, timecreated, timemodified';
					break;
				case 'scorm':
					$fields = 'id, course, name, timeopen, timemodified';
					break;
				case 'data':
				case 'jclic':
				case 'qv':
				case 'eoicampus':
					$fields = 'id, course, name';
					break;
				case 'resource':
				case 'folder':
				case 'page':
				case 'url':
				case 'forum':
				case 'workshop':
				default:
					$fields = 'id, course, name, timemodified';
					break;
			}

			if (!empty($fields)) {
				$this->add_data($module->name, array('course' => $courseid), $fields);
			}
		}

		$sql = "SELECT asub.id, asub.userid, asub.timecreated from {assignment_submissions} asub
				JOIN {assign} a ON a.id = asub.assignment
				WHERE a.course = :course";
		$this->add_data_sql('assign_submissions', $sql, array('course' => $courseid));

		$sql = "SELECT asub.id, asub.userid, asub.timecreated from {assign_submission} asub
				JOIN {assignment} a ON a.id = asub.assignment
				WHERE a.course = :course";
		$this->add_data_sql('assignment_submissions', $sql, array('course' => $courseid));

		// Files
		$sql = "SELECT f.id, f.filename, f.userid, f.status, f.timecreated, f.timemodified from {files} f
				JOIN {context} c ON c.id = f.contextid
				WHERE (c.path = :path OR c.path LIKE '$coursecontext->path/%') AND f.filename != '.'";
		$this->add_data_sql('files', $sql, array('path'=> $coursecontext->path));

		$this->file->close();
		return true;
	}

	private function add_data($table, $conditions = null, $fields = "", $return = false){
		global $DB;

		$data = $DB->get_records($table, $conditions, 'id', $fields);
		$this->add_data_array($table, $data);

		if ($return) {
			return $data;
		}
	}

	private function add_data_select($table, $select  = "", $params = null, $fields = "", $return = false){
		global $DB;

		$data = $DB->get_records_select($table, $select, $params, 'id', $fields);
		$this->add_data_array($table, $data);

		if ($return) {
			return $data;
		}
	}

	private function add_data_sql($table, $sql, $params, $return = false){
		global $DB;

		$data = $DB->get_records_sql($sql, $params);
		$this->add_data_array($table, $data);

		if ($return) {
			return $data;
		}
	}

	private function add_data_array($table, $array, $return = false){
		foreach($array as $data) {
			$this->file->add($data, $table);
		}

		if ($return) {
			return $array;
		}
	}
}

class bigdata_filemanager{
	private $handler;
	private $filepath;
	private $escola;

	function __construct($filepath, $escola){
		$this->filepath = $filepath;
		$this->escola = $escola;
		$this->reset();
	}

	private function reset() {
		$this->handler = fopen($this->filepath, "w+");
		fwrite($this->handler, '');
	}

	private function open() {
		$this->handler = fopen($this->filepath, "a+");
		if (!$this->handler) {
			throw new Exception('Cannot open file '.$this->filepath);
		}
	}

	function close() {
		fclose($this->handler);
	}

	function add($object, $table) {
		$this->open();
		$object->table = $table;
		$object->school = $this->escola;
		$text = json_encode($object);
		return fwrite($this->handler, $text."\n");
	}


}
