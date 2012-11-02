<?php

/**
 * TODO: Review strings (some of them are directly here instead of in the lang file.
 */



function import19_restore($filename, $courseid = false){
    global $OUTPUT, $CFG, $DB, $USER, $agora;

    require_once($CFG->dirroot . '/backup/util/includes/backup_includes.php');
    require_once($CFG->dirroot . '/backup/moodle2/backup_plan_builder.class.php');
    require_once($CFG->dirroot . '/backup/util/includes/restore_includes.php');
    require_once($CFG->dirroot . '/backup/util/ui/import_extensions.php');
    require_once($CFG->dirroot . '/backup/util/output/output_controller.class.php');

    $tmpdir = $CFG->tempdir . '/backup';
    if (!check_dir_exists($tmpdir, true, true)) {
        print_error('El directori temporal '.$tmpdir.' no es pot escriure');
    }

    $origin = $CFG->dataroot.$agora['moodle2']['repository_files']. $filename;
    if (!file_exists($origin)){
        // The name of the backup created is different from the one specified so it's necessary to search the correct one
        $filenamestart = substr($filename, 0, strrpos($filename, '-', -1));
        $origin = exec('ls '.$CFG->dataroot.$agora['moodle2']['repository_files'].$filenamestart.'-*');
    }

    $userid = $USER->id;

    $fb = get_file_packer();
    $filepath = restore_controller::get_tempdir_name($courseid, $userid);
    if(!$fb->extract_to_pathname($origin, "$tmpdir/$filepath/")){
        print_error('No es pot descomprimir el fitxer '.$origin);
    }

    try{
        if(!$courseid){
            // Create importing category
            if(!$restorecat = $DB->get_field('course_categories','id' ,array('name'=>'Moodle 1.9','parent'=>0))){
                    $cat = new StdClass();
                    $cat->name = 'Moodle 1.9';
                    $cat->description = "Cursos traspassats del Moodle 1.9 d'Àgora";  
                    $cat->parent = 0;
                    $cat->sortorder = 0;
                    $cat->visible = 0;
                    $cat->depth = 1;

                    $restorecat = $DB->insert_record('course_categories', $cat);
                    $DB->set_field('course_categories','path','/'.$restorecat,array('id'=>$restorecat));
                    echo $OUTPUT->notification('Creada categoria \''.$cat->name.'\'', 'notifysuccess');

            }

            // Create new course
            $target = backup::TARGET_NEW_COURSE ;
            list($fullname, $shortname) = restore_dbops::calculate_course_names(0, get_string('restoringcourse', 'backup'), get_string('restoringcourseshortname', 'backup'));
            $courseid = restore_dbops::create_new_course($fullname, $shortname, $restorecat);
            echo $OUTPUT->notification('Creat curs', 'notifysuccess');
        } else {
            $target = backup::TARGET_EXISTING_ADDING ;
            echo $OUTPUT->notification('Curs existent, afegint informació', 'notifysuccess');
        }

        $transaction = $DB->start_delegated_transaction();
        // Restore backup into course
            $controller = new restore_controller($filepath, $courseid, 
                            backup::INTERACTIVE_NO, backup::MODE_IMPORT, $userid, $target);
            if ($controller->get_status() == backup::STATUS_REQUIRE_CONV) {
                    echo $OUTPUT->notification('Convertint des de 1.9', 'notifysuccess');
            $controller->convert();
        }
        if ($controller->get_status() == backup::STATUS_SETTING_UI) {
            $controller->finish_ui();
        }
            $controller->execute_precheck();
            $controller->execute_plan();
            // Commit
            $transaction->allow_commit();
    }catch(Exception $e){
            print_error('No s\'ha pogut importar el curs '.$e->getMessage());
    }

    echo $OUTPUT->notification('La importació ha acabat correctament', 'notifysuccess');

    $courseurl = new moodle_url('/course/view.php', array('id'=>$courseid));

    echo $OUTPUT->continue_button($courseurl);
    return true;

}

/**
 * Called from backup/restorefile.php to show the courses in Moodle 1.9
 * @global type $CFG
 * @global type $USER
 * @global type $OUTPUT
 * @global type $PAGE
 * @global type $agora
 * @global type $school_info
 * @param type $contextid
 * @return type 
 */
function import19_course_selector($contextid){
	global $CFG, $USER, $OUTPUT, $PAGE, $agora, $school_info;
        
	$html = '';
	$dbconn = import19_connect_moodle19_db();
	if($dbconn){
            // Look for the user in Moodle 1.9 tables
            $user19 = $dbconn->get_record('user',array('username'=>$USER->username));
            if (empty($user19)){
                    // If user not found, look for the idnumber
                    $user19 = $dbconn->get_record('user',array('idnumber'=>$USER->idnumber));
            }
            if (is_siteadmin() || !empty($user19)){
                // Get user19 role in Moodle 1.9
                $sql = "SELECT count(*) AS total FROM {role} r, {role_assignments} ra WHERE r.shortname='admin' AND r.id=ra.roleid AND ra.contextid=1 AND ra.userid=$user19->id";
                $isadmin19 = $dbconn->get_field_sql($sql) == 1;
                $courses = array();
                if (is_siteadmin() || $isadmin19){
                    $sql = "SELECT c.id, c.shortname, c.fullname, cat.name AS catname, cat.parent AS catparent
                                    FROM {course} c, {course_categories} cat 
                                    WHERE cat.id = c.category ORDER BY cat.parent DESC";
                    $courses = $dbconn->get_records_sql($sql);
                } else if ($user19) {
                    $sql = "SELECT c.id, c.shortname, c.fullname, cat.name AS catname, cat.parent AS catparent
                                    FROM {course} c, {context} ctx, {role_assignments} ra, {role} r, {course_categories} cat 
                                    WHERE  r.shortname ='editingteacher' AND r.id=ra.roleid AND ra.userid=$user19->id 
                                    AND ra.contextid = ctx.id AND ctx.instanceid = c.id AND cat.id = c.category ORDER BY cat.parent DESC";
                    $courses = $dbconn->get_records_sql($sql);
                }

                $categories = array();
                if($courses){
                    // Create table
                    $shortnamestr = get_string('shortname');
                    $fullnamestr = get_string('fullname');
                    $categorystr = get_string('category');

                    $table = new html_table();
                    $table->head = array ('', $shortnamestr, $fullnamestr, $categorystr);
                    $table->align = array ('left','left','left','left');
                    $table->width = '90%';

                    foreach($courses as $course){
                        $catname = $course->catname;
                        $parent = $course->catparent;
                        while($parent > 0){
                            if(!isset($categories[$parent])){
                                $cat = $dbconn->get_record('course_categories',array('id'=>$parent),'name, parent');
                                if($cat){
                                        $categories[$parent] = new StdClass();
                                        $categories[$parent]->name = $cat->name;
                                        $categories[$parent]->parent  = $cat->parent;
                                } else {
                                        $categories[$parent] = new StdClass();
                                        $categories[$parent]->name = '';
                                        $categories[$parent]->parent  = 0;
                                }
                            }
                            if(!empty($categories[$parent]->name)){
                                    $catname = $categories[$parent]->name . ' ► '.$catname;
                            }
                            $parent = $categories[$parent]->parent;
                        }

                        if(isset($catname)){
                            $checkbok = "<input type='radio' value='$course->id' name='importid'>";
                            $url = $CFG->wwwroot19.'/course/view.php?id='.$course->id;
                            $table->data[] = array ($checkbok,
                                                    '<a href="'.$url.'" target="_blank">'.$course->shortname.'</a>',
                                                            $course->fullname,
                                                            $catname
                                                            );
                        }
                    }

                    $html .= html_writer::start_tag('div', array('class'=>'import-course-selector backup-restore'));
                    $html .= html_writer::start_tag('div', array('class'=>'import19 backup-section'));

                    //$html .= $OUTPUT->heading(get_string('import19','local_agora'),2,'header');

                    $html .= html_writer::start_tag('form', array('method'=>'post', 'action'=>$CFG->wwwroot.'/local/agora/import19/bridge.php'));

                    $html .= html_writer::start_tag('div', array('class'=>'detail-pair'));
                    $html .= html_writer::tag('label',get_string('selectacourse', 'backup'),array('class'=>'detail-pair-label'));
                    $html .= html_writer::start_tag('div', array('class'=>'detail-pair-value'));
                    $html .= html_writer::tag('div', get_string('totalcoursesearchresults', 'backup', count($courses)));
                    $html .= html_writer::table($table);
                    $html .= html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'contextid', 'value'=>$contextid));
                    $html .= html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>'sesskey', 'value'=>sesskey()));
                    $html .= html_writer::empty_tag('input', array('type'=>'submit', 'value'=>get_string('continue')));
                    $html .= html_writer::end_tag('div');
                    $html .= html_writer::end_tag('div');

                    $html .= html_writer::end_tag('form');

                    $html .= html_writer::end_tag('div');
                    $html .= html_writer::end_tag('div');
                }
            } else {
		return $OUTPUT->notification(get_string('import19_nocourses', 'local_agora'));
            }
	}else{
		return $OUTPUT->notification(get_string('import19_nodbconnect', 'local_agora'));
	}
	return $html;
}
		

/**
 * Connect to Moodle 1.9 database
 */
function import19_connect_moodle19_db() {
    global $DB, $CFG, $agora;

    $library = 'native';
    if (!$handler = moodle_database::get_driver_instance($CFG->dbtype, $library, true)) {
        throw new dml_exception('dbdriverproblem', "Unknown driver $library/" . $CFG->dbtype);
    }

    try {
        if (is_agora()) {
            $handler->connect($agora['moodle']['dbhost'], $CFG->dbuser, $agora['moodle']['userpwd'], $CFG->dbname, $agora['moodle']['prefix'], $CFG->dboptions);
        } else {
            $handler->connect($agora['moodle']['dbhost'], $agora['moodle']['user'], $agora['moodle']['userpwd'], $agora['moodle']['dbname'], $agora['moodle']['prefix'], $CFG->dboptions);
        }
    } catch (moodle_exception $e) {
        echo 'Caught exception: ', $e->getMessage();
        return false;
    }
    return $handler;
}
