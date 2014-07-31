<?php

function agora_assignments_upgrade(){
	global $CFG, $DB;

	// XTEC: Upgrade automatically assignments to assigns
	// 2013.05.02 @jmiro227

	mtrace("Upgrading assignments...","\n");

	require_once($CFG->dirroot . '/'.$CFG->admin.'/tool/assignmentupgrade/locallib.php');
	require_once($CFG->dirroot . '/course/lib.php');

	$current = 1;
	$assignmentids = tool_assignmentupgrade_load_all_upgradable_assignmentids();
	$total = count($assignmentids);

	foreach ($assignmentids as $assignmentid) {

	    mtrace("Upgrading assignment $assignmentid ($current of $total)...","\n");

	    $current++;

	    try {
		    list($summary, $success, $log) = tool_assignmentupgrade_upgrade_assignment($assignmentid);

		    if ($success) {
		    	mtrace("Success","\n");
		    } else {
		    	mtrace("Fail: $log","\n");
		   	}
	    } catch(Exception $e) {
			mtrace("ERROR upgrading assignment $assignmentid: ".$e->getMessage(), "\n");
			$assignment = $DB->get_record('assignment',array('id' => $assignmentid));
			repair_duplicated_course_sections($assignment->course);
	    }
	}

}

function repair_course_sections_indexes(){
	global $DB;

	$dbman = $DB->get_manager();
    // Define index course_section (unique) to be added to course_sections
    $table = new xmldb_table('course_sections');
    $index = new xmldb_index('course_section', XMLDB_INDEX_UNIQUE, array('course', 'section'));
    // Conditionally launch add index course_section
    if (!$dbman->index_exists($table, $index)) {
        try{
        	$dbman->add_index($table, $index);
        	mtrace('Index added to course_sections', '<br/>');
        } catch (Exception $e) {
        	mtrace('ERROR: Index NOT added to course_sections', '<br/>');
        	mtrace($e->getMessage(), '<br/>');
        }
    } else {
    	mtrace('ERROR: Index already exists in course_sections', '<br/>');
    }
}