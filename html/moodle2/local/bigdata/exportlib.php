<?php

class bigdata {

    private $file;
    private $courses;
    private $coursescontext;
    private $roles;
    private $users;
    private $exportfields;
    private $foreignkeys;
    private $tablefields;
    private $possibleextrafields;
    private $profilename;


    function __construct($profileid) {
        global $DB;

        $profile = $DB->get_record('bigdata_profiles', array('id' => $profileid));
        if (!$profile) {
            throw new Exception('Profile not found');
        }

        $this->profilename = $profile->name;

        if (empty($profile->courses)) {
            $courses = $DB->get_fieldset_select('course', 'id', '1=1 ORDER BY id');
        } else {
            $courses = explode(',', $profile->courses);
        }

        foreach ($courses as $course) {
            $this->courses[$course] = $course;
            $context = $DB->get_record('context', array('contextlevel' => '50', 'instanceid' => $course), 'id, instanceid as course, path');
            $this->coursescontext[$context->id] = $context;
        }

        if (empty($profile->roles)) {
            $roles = array_keys(get_all_roles());
        } else {
            $roles = explode(',', $profile->roles);
        }
        foreach ($roles as $role) {
            $this->roles[$role] = $role;
        }

        $select = 'roleid IN ('.implode(',', $this->roles).') AND contextid IN ('.implode(',', array_keys($this->coursescontext)).')';
        if (!empty($profile->excludedusers)) {
            $excludedusers = explode(',', $profile->excludedusers);
            $select .= ' AND userid NOT IN ('.implode(',', $excludedusers).')';
        }
        $users = $DB->get_fieldset_select('role_assignments', 'userid', $select);
        foreach ($users as $userid) {
            $this->users[$userid] = $userid;
        }


        $this->exportfields = array();
        if (!empty($profile->tablefields)) {
            $exportfields = explode(',', $profile->tablefields);
            foreach ($exportfields as $tablefield) {
                list($table, $field) = explode('.', $tablefield, 2);
                if (!isset($this->exportfields[$table])) {
                    $this->exportfields[$table] = array();
                }
                $this->exportfields[$table][$field] = $field;
            }
        }

        $this->load_database();
        $this->possibleextrafields = array('course', 'courseid', 'role', 'roleid', 'context', 'contextid', 'user', 'userid');
    }

    public function export($filepath, $filename, $escola) {
        $this->file = new bigdata_filemanager($filepath, $filename.'_'.$this->profilename , $escola);

        // Export Selected tables
        foreach ($this->exportfields as $table => $fields) {
            $this->add_data($table, $fields);
        }

        $this->file->close();

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
            if ($id !== false && !isset($this->users[$id])) {
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
        if ($id !== false && !isset($this->courses[$id])) {
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
        if ($id !== false && !isset($this->roles[$id])) {
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
            if (isset($this->coursescontext[$id])) {
                return true;
            }
            $context = context::instance_by_id($id, IGNORE_MISSING);
            if (!$context) {
                return false;
            }
            $parents = $context->get_parent_context_ids();
            foreach ($parents as $parent) {
                if (isset($this->coursescontext[$parent])) {
                    return true;
                }
            }
            return false;
        }
        return true;
    }

    private function add_data($table, $fields) {
        global $DB;

        // Special queries
        switch ($table) {
            case 'course':
                $rs = $DB->get_recordset_select($table, 'id IN ('.implode(',', $this->courses).')', null, 'id');
                break;
            case 'user': // No needed but still have it
                $rs = $DB->get_recordset_select($table, 'id IN ('.implode(',', $this->users).')', null, 'id');
                break;
            case 'role':
                $rs = $DB->get_recordset_select($table, 'id IN ('.implode(',', $this->roles).')', null, 'id');
                break;
            case 'files':
                $rs = $DB->get_recordset_select($table, "filename != '.'", null, 'id');
                break;
            case 'context':
                foreach ($this->coursescontext as $coursecontext) {
                    $rs = $DB->get_recordset_select($table, 'path LIKE ? OR path = ?', array($coursecontext->path.'/%', $coursecontext->path), 'id');
                    $this->add_records($table, $fields, $rs);
                }
                return;
                break;
            default:
                // Get possible joins
                if (isset($this->foreignkeys[$table])) {
                    $fks = $this->foreignkeys[$table];
                    $i = 2;
                    $joins = array();
                    $extrafields = array();
                    foreach ($fks as $field => $fk) {
                        $efs = array();
                        foreach ($this->possibleextrafields as $ef) {
                            if (isset($this->tablefields[$fk->reftable][$ef])) {
                                $efs[] = 't'.$i.'.'.$ef;
                            }
                        }
                        if (!empty($efs)) {
                            $extrafields = array_merge($extrafields, $efs);
                            if (!$fk->notnull) {
                                $left = 'LEFT';
                            } else {
                                $left = "";
                            }
                            $joins[] = 'LEFT JOIN {'.$fk->reftable.'} t'.$i.' ON t1.'.$field.' = t'.$i.'.'.$fk->reffield;
                            $i++;
                        }
                    }
                    $extraf = implode(',', $extrafields);
                    if (!empty($extraf)) {
                        $sql = 'SELECT t1.*, '.$extraf.' FROM {'.$table.'} t1 '.implode(' ', $joins). ' ORDER BY t1.id';
                        $rs = $DB->get_recordset_sql($sql);
                    }
                }
                break;
        }

        if (!isset($rs)) {
            $rs = $DB->get_recordset($table, null, 'id');
        }

        $this->add_records($table, $fields, $rs);
    }

    private function add_records($table, $fields, $rs) {

        $fields['id'] = 'id';
        foreach ($rs as $record) {
            // Exclude non related data
            if (!$this->check_user($record) ||
                !$this->check_course($record) ||
                !$this->check_role($record) ||
                !$this->check_context($record)) {
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

    private function load_database() {
        global $CFG, $DB;
        require_once($CFG->libdir.'/ddllib.php');

        $this->foreignkeys = array();

        $xmldirs = array();
        $dbdirectories = get_db_directories();

        foreach ($dbdirectories as $path) {
            if (file_exists($path)) {
                $xmldbfile = new xmldb_file($path. '/install.xml');
                if ($xmldbfile->fileExists()) {
                    $xmldirs[$path] = $xmldbfile;
                }
            }
        }
        // Sort by key
        ksort($dbdirectories);

        $dbman = $DB->get_manager();

        if ($xmldirs) {
            foreach ($xmldirs as $xmldbfile) {
                $loaded = $xmldbfile->loadXMLStructure();
                if (!$loaded || !$xmldbfile->isLoaded()) {
                    continue;
                }
                // Arriving here, everything is ok, get the XMLDB structure
                $structure = $xmldbfile->getStructure();
                if ($xmldbtables = $structure->getTables()) {
                    foreach ($xmldbtables as $xmldbtable) {
                        if (!$dbman->table_exists($xmldbtable)) {
                            continue;
                        }
                        $tablename = $xmldbtable->getName();

                        $columns = $DB->get_columns($tablename);
                        $columnsclean = array();
                        foreach ($columns as $key => $unused) {
                            $columnsclean[$key] = $key;
                        }
                        $this->tablefields[$tablename] = $columnsclean;

                        // Do not load the foreign keys if the table is not going to be exported
                        if (!isset($this->exportfields[$tablename])) {
                            continue;
                        }

                        if ($keys = $xmldbtable->getKeys()) {
                            $tablekeys = array();
                            foreach ($keys as $key) {
                                // We are only interested in foreign keys.
                                if (!in_array($key->getType(), array(XMLDB_KEY_FOREIGN, XMLDB_KEY_FOREIGN_UNIQUE))) {
                                    continue;
                                }

                                $reftable = $key->getRefTable();
                                if (!$dbman->table_exists($reftable)) {
                                    continue;
                                }

                                // Work out the SQL to find key violations.
                                $keyfields = $key->getFields();
                                $reffields = $key->getRefFields();
                                $joinconditions = array();
                                $nullnessconditions = array();
                                $params = array();
                                foreach ($keyfields as $i => $field) {
                                    if (!$dbman->field_exists($reftable, $reffields[$i])) {
                                        continue;
                                    }
                                    $xmldbfield = $xmldbtable->getField($field);
                                    // Do not load the references to the main tables
                                    if (in_array($reftable, array('user', 'course', 'context', 'role'))) {
                                        continue;
                                    }
                                    $tablekey = new StdClass();
                                    $tablekey->reftable = $reftable;
                                    $tablekey->reffield = $reffields[$i];
                                    $tablekey->default = $xmldbfield->getDefault();
                                    $tablekey->notnull = $xmldbfield->getNotNull();
                                    $tablekeys[$field] = $tablekey;
                                }
                            }

                            if (!empty($tablekeys)) {
                                $this->foreignkeys[$tablename] = $tablekeys;
                            }
                        }
                    }
                }
            }
        }
    }

    // *************** OLD **************** //
    public function old_export($filepath, $filename, $escola) {

        $this->file = new bigdata_filemanager($filepath, $filename.'_'.$this->profilename, $escola);

        $success = true;

        // Platform common export
        $this->add_data_old('modules', null, 'id, name', true);
        $this->add_data_select('role', 'id IN ('.implode(',', $this->roles).')', null, 'id, shortname');

        foreach ($this->courses as $course) {
            try {
                $success = $success && $this->export_course($course);
            } catch (Exception $e) {
                echo $e->getMessage();
                throw $e;
                $success = false;
            }
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
        $this->add_data_old('log', array('course' => $courseid), 'id, time, userid, course, module, cmid, action');

        // Context
        $this->add_data_old('context', array('path' => $coursecontext->path), 'id, contextlevel, instanceid');
        $this->add_data_select('context', "path LIKE '$coursecontext->path/%'", null, 'id, contextlevel, instanceid');

        // Activities
        $this->add_data_old('course_modules', array('course' => $courseid), 'id, course, module, instance, added');
        $modules = $DB->get_fieldset_select('modules', 'name', "");
        foreach ($modules as $module) {
            switch($module){
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
                $this->add_data_old($module, array('course' => $courseid), $fields);
            }
        }

        $sql = "SELECT asub.id, asub.userid, asub.timecreated from {assignment_submissions} asub
                JOIN {assign} a ON a.id = asub.assignment
                WHERE a.course = :course";
        $this->add_data_sql('assignment_submissions', $sql, array('course' => $courseid));

        $sql = "SELECT asub.id, asub.userid, asub.timecreated from {assign_submission} asub
                JOIN {assignment} a ON a.id = asub.assignment
                WHERE a.course = :course";
        $this->add_data_sql('assign_submission', $sql, array('course' => $courseid));

        // Files
        $sql = "SELECT f.id, f.filename, f.userid, f.status, f.timecreated, f.timemodified from {files} f
                JOIN {context} c ON c.id = f.contextid
                WHERE (c.path = :path OR c.path LIKE '$coursecontext->path/%') AND f.filename != '.'";
        $this->add_data_sql('files', $sql, array('path' => $coursecontext->path));

        return true;
    }

    private function add_data_old($table, $conditions = null, $fields = "", $return = false) {
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
    // *************** END OLD **************** //
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
        $this->handler = fopen($this->filepath.'/'.$this->filename.'.json', "w+");
        fwrite($this->handler, '');
    }

    private function open() {
        $this->handler = fopen($this->filepath.'/'.$this->filename.'.json', "a+");
        if (!$this->handler) {
            throw new Exception('Cannot open file '.$this->filepath);
        }
    }

    public function close() {
        global $CFG;

        fclose($this->handler);

        require_once("$CFG->libdir/filestorage/tgz_packer.php");
        $zp = new tgz_packer();
        $files = array($this->filename.'.json' => $this->filepath.'/'.$this->filename.'.json');
        $zp->archive_to_pathname($files, $this->filepath.'/'.$this->filename.'_'.$this->escola.'_'.date('Ymd_Hi').'.tgz');

        unlink($this->filepath.'/'.$this->filename.'.json');
    }

    public function add($object, $table) {
        $this->open();
        $object->table = $table;
        $text = json_encode($object);
        return fwrite($this->handler, $text."\n");
    }


}
