<?php

//Repara la duplicació de funcions
function repair_duplicated_course_sections($courseid = false){
	global $DB;

	//Serveix per poder tenir duplicats
	$concat = $DB->sql_concat('course','section');
	if($courseid){
		$sql = "SELECT $concat as coursesect, course, section, count(*) as count
				FROM {course_sections} WHERE course = $courseid
				GROUP BY course, section
				HAVING ( COUNT(*) > 1 )";
	} else {
		$sql = "SELECT $concat as coursesect, course, section, count(*) as count
				FROM {course_sections}
				GROUP BY course, section
				HAVING ( COUNT(*) > 1 )";		
	}
	$duplicates = $DB->get_records_sql($sql);
	mtrace (count($duplicates).' seccions duplicades', '<br/>');

	foreach($duplicates as $duplicate){
		$params = array('course'=>$duplicate->course, 'section' => $duplicate->section);
		$sections = $DB->get_records('course_sections', $params, 'id DESC');
		mtrace("Curs {$duplicate->course} section {$duplicate->section} duplicats {$duplicate->count}", '<br/>');
		$count = $duplicate->count;
		$sql_last = "SELECT MAX(section) FROM {course_sections} WHERE course = :course";
		$last_section = $DB->get_field_sql($sql_last, array('course'=>$duplicate->course));
		mtrace('Last: '.$last_section, '<br/>');
		foreach($sections as $section){
			if(empty($section->sequence)){
				if($count > 1){
					mtrace("--> DELETE {$section->id}", '<br/>');
					$DB->delete_records('course_sections', array('id'=>$section->id));
					$count--;
				} else {
					mtrace("--> ULTIM, no fem res {$section->id}", '<br/>');
				}
			} else {
				if($count > 1){
					mtrace("--> MOVE NO BUIT {$section->id}", '<br/>');
					$last_section++;
					$DB->set_field('course_sections', 'section', $last_section, array('id'=>$section->id));
					$count--;
				} else {
					mtrace("--> ULTIM NO BUIT, no fem res {$section->id}", '<br/>');
				}
				
			}
		}
		
	}	
}

function repair_indexes(){
	global $DB;

	$dbman = $DB->get_manager();
    // Define index course_section (unique) to be added to course_sections
    $table = new xmldb_table('course_sections');
    $index = new xmldb_index('course_section', XMLDB_INDEX_UNIQUE, array('course', 'section'));
    // Conditionally launch add index course_section
    if (!$dbman->index_exists($table, $index)) {
        $dbman->add_index($table, $index);
    }
}