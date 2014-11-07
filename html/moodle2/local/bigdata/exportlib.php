<?php

class bigdata {

	private $file;
	private $courses;
	private $courses_context;
	private $roles;
	private $users;
	private $tablefields;
	private $modules;

	function __construct($profileid) {
		global $DB;

		$profile = $DB->get_record('bigdata_profiles', array('id' => $profileid));

		if (empty($profile->courses)) {
			$courses = $DB->get_fieldset_select('course', 'id', '1=1 ORDER BY id');
		} else {
			$courses = explode(',', $profile->courses);
		}
		foreach ($courses as $course) {
			$this->courses[$course] = $course;
			$this->courses_context[$course] = $DB->get_records('context', array('contextlevel' => '50', 'instanceid' => $course), '', 'id, instanceid as course, path');
		}

		if (empty($profile->roles)) {
			$roles = array_keys(get_all_roles());
		} else {
			$roles = explode(',', $profile->roles);
		}
		foreach ($roles as $role) {
			$this->roles[$role] = $role;
		}

		$select = 'roleid IN ('.implode(',', $this->roles).') AND contextid IN ('.implode(',', array_keys($this->courses_context)).')';
		if (!empty($profile->excludedusers)) {
			$excludedusers = explode(',', $profile->excludedusers);
			$select .= ' AND userid NOT IN ('.implode(',', $excludedusers).')';
		}
		$users = $DB->get_fieldset_select('role_assignments', 'userid', $select);
		foreach ($users as $userid) {
			$this->users[$userid] = $userid;
		}


		$this->tablefields = array();
		if (!empty($profile->tablefields)) {
			$tablefields = explode(',', $profile->tablefields);
			foreach ($tablefields as $tablefield) {
				list($table, $field) = explode('.', $tablefield, 2);
				if (!isset($this->tablefields[$table])) {
					$this->tablefields[$table] = array();
				}
				$this->tablefields[$table][$field] = $field;
			}
		}
	}

	public function export($filepath, $filename, $escola) {
		$this->file = new bigdata_filemanager($filepath, $filename, $escola);

		$success = true;
		// Platform common export
		/* $this->modules = $this->add_data('modules', null, 'id, name', true);
		$this->add_data_select('role', 'id IN ('.implode(',', $this->roles).')', null, 'id, shortname');
		foreach ($this->courses as $course) {
			try {
				$success = $success && $bigdata->export_course($course);
			} catch (Exception $e) {
				echo $e->getMessage();
				throw $e;
				$success = false;
			}
		}*/

		// Selected tables
		foreach ($this->tablefields as $table => $fields){
			$this->add_data_new($table, $fields);
		}

		$this->file->close();

		return $success;
	}

	public function export_course($courseid) {
		global $CFG, $DB;

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
		$this->add_data_select('role_assignments', 'roleid IN ('.implode(',', $this->roles).') AND contextid = :contextid',
			array('contextid' => $coursecontext->id), 'id, roleid, contextid, userid', true);

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
		$this->add_data_sql('files', $sql, array('path' => $coursecontext->path));

		return true;
	}

	private function check_user($data) {
		if (!empty($this->users)) {
			$id = false;
			if (isset($data->userid)) {
				$id = $data->userid;
			} else if (isset($data->user)) {
				$id = $data->user;
			}
			if ($id && !isset($this->users[$id])) {
				return false;
			}
		}
		return true;
	}

	private function check_course($data) {
		$id = false;
		if (isset($data->courseid)) {
			$id = $data->courseid;
		} else if (isset($data->course)) {
			$id = $data->course;
		}
		if ($id && !isset($this->courses[$id])) {
			return false;
		}
		return true;
	}

	private function check_role($data) {
		$id = false;
		if (isset($data->roleid)) {
			$id = $data->roleid;
		} else if (isset($data->role)) {
			$id = $data->role;
		}
		if ($id && !isset($this->roles[$id])) {
			return false;
		}
		return true;
	}

	private function check_context($data) {
		$id = false;
		if (isset($data->contextid)) {
			$id = $data->contextid;
		} else if (isset($data->context)) {
			$id = $data->context;
		}
		if ($id) {
			if (isset($this->courses_context[$id])) {
				return true;
			}
			$context = context::instance_by_id($id, IGNORE_MISSING);
			if(!$context) {
				return false;
			}
			$parents = $context->get_parent_context_ids();
			foreach ($parents as $parent) {
				if (isset($this->courses_context[$parent])) {
					return true;
				}
			}
			return false;
		}
		return true;
	}

	private function add_data_new($table, $fields) {
		global $DB;

		$rs = $DB->get_recordset($table);
		$fields['id'] = 'id';
		foreach ($rs as $record) {
			// Exclude users
			if (!$this->check_user($record)) {
				continue;
			}

			// Only selected courses
			if (!$this->check_course($record)) {
				continue;
			}

			if (!$this->check_role($record)) {
				continue;
			}

			if (!$this->check_context($record)) {
				continue;
			}

			// Unset not selected fields
			$rowarray = (array) $record;
			foreach ($rowarray as $fieldname => $unused) {
				if (!isset($fields[$fieldname])) {
					unset($record->$fieldname);
				}
			}
			$this->file->add($record, $table);
		}
		$rs->close();
	}

	private function add_data($table, $conditions = null, $fields = "", $return = false) {
		global $DB;

		$data = $DB->get_records($table, $conditions, 'id', $fields);
		$this->add_data_array($table, $data);

		if ($return) {
			return $data;
		}
	}

	private function add_data_select($table, $select  = "", $params = null, $fields = "", $return = false) {
		global $DB;

		$data = $DB->get_records_select($table, $select, $params, 'id', $fields);
		$this->add_data_array($table, $data);

		if ($return) {
			return $data;
		}
	}

	private function add_data_sql($table, $sql, $params, $return = false) {
		global $DB;

		$data = $DB->get_records_sql($sql, $params);
		$this->add_data_array($table, $data);

		if ($return) {
			return $data;
		}
	}

	private function add_data_array($table, $array, $return = false) {
		foreach ($array as $data) {
			// Do not add excluded users
			if (!$this->check_user($data)) {
				continue;
			}
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
	private $filename;
	private $escola;

	function __construct($filepath, $filename, $escola) {
		$this->filepath = $filepath;
		$this->filename = $filename;
		$this->escola = $escola;
		$this->reset();
	}

	private function reset() {
		$this->handler = fopen($this->filepath.'/'.$this->filename.'.tmp', "w+");
		fwrite($this->handler, '');
	}

	private function open() {
		$this->handler = fopen($this->filepath.'/'.$this->filename.'.tmp', "a+");
		if (!$this->handler) {
			throw new Exception('Cannot open file '.$this->filepath);
		}
	}

	function close() {
		fclose($this->handler);

		global $CFG;
		require_once("$CFG->libdir/filestorage/tgz_packer.php");
		$zp = new tgz_packer();
		$files = array($this->filename.'.tmp' => $this->filepath.'/'.$this->filename.'.tmp');
		$zp->archive_to_pathname($files, $this->filepath.'/'.$this->filename.'_'.$this->escola.'_'.date('Ymd_Hi').'.tgz');
	}

	function add($object, $table) {
		$this->open();
		$object->table = $table;
		$object->school = $this->escola;
		$text = json_encode($object);
		return fwrite($this->handler, $text."\n");
	}


}
