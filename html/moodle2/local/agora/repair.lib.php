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

function repair_duplicated_course_completions($courseid = false){
	global $DB;
	//Serveix per poder tenir duplicats
	$concat = $DB->sql_concat('userid', 'course');
	//
	if($courseid){
		mtrace ('Seleccionat el curs '.$courseid, '<br/>');
		$sql = "SELECT $concat as uc, userid, course, count(*) as count
				FROM {course_completions}
				WHERE course = $courseid
				GROUP BY userid, course
				HAVING ( COUNT(*) > 1 )
				ORDER BY userid";
	} else {
		$sql = "SELECT $concat as uc, userid, course, count(*) as count
				FROM {course_completions}
				GROUP BY userid, course
				HAVING ( COUNT(*) > 1 )
				ORDER BY userid";
	}

	$duplicates = $DB->get_records_sql($sql);
	mtrace (count($duplicates).' course completions duplicats', '<br/>');
	if(count($duplicates) > 0){
		foreach($duplicates as $duplicate){
			$params = array('course'=>$duplicate->course, 'userid' => $duplicate->userid);
			$complets = $DB->get_records('course_completions', $params, 'timestart DESC');

			mtrace("Course {$duplicate->course} userid {$duplicate->userid} duplicats {$duplicate->count}", '<br/>');
			$count = $duplicate->count;

			$first = false;
			foreach($complets as $complet){
				if(!$first){
					$first = $complet;
					mtrace("-->$count PRIMER, no fem res {$complet->id}", '<br/>');
				} else {
					// Si son iguals amb el primer... podem esborrar
					if($first->timeenrolled == $complet->timeenrolled &&
						$first->timestarted == $complet->timestarted &&
						$first->timecompleted == $complet->timecompleted &&
						$first->timereaggregate == $complet->timereaggregate) {
						mtrace("-->$count DELETE {$complet->id}", '<br/>');
						//$DB->delete_records('course_completions', array('id'=>$complet->id));
					} else {
						mtrace("-->$count DIFERENT, no fem res... :-( {$complet->id}", '<br/>');
					}
				}
				$count--;
			}
		}

		$duplicates = $DB->get_records_sql($sql);
		mtrace (count($duplicates).' course completions duplicats', '<br/>');
	}

	if(count($duplicates) == 0){
		mtrace('OK: ja no hi ha course completions duplicats', '<br/>');
		return true;
	} else {
		mtrace('ERROR: Encara queden course completions duplicats', '<br/>');
		return false;
	}
}


function repair_duplicated_quiz_attempts($courseid = false){
	global $DB;
	//Serveix per poder tenir duplicats
	$concat = $DB->sql_concat('quiz', 'userid', 'attempt');
	//
	if($courseid){
		mtrace ('Seleccionat el curs '.$courseid, '<br/>');
		$sql = "SELECT $concat as qua, qa.quiz, qa.userid, qa.attempt, count(*) as count
				FROM {quiz_attempts} qa, {course_modules} cm, {modules} m
				WHERE m.name = 'quiz' AND cm.module = m.id AND cm.instance = qa.quiz AND cm.course = $courseid
				GROUP BY qa.quiz, qa.userid, qa.attempt
				HAVING ( COUNT(*) > 1 )
				ORDER BY qa.quiz, qa.userid";
	} else {
		$sql = "SELECT $concat as qua, quiz, userid, attempt, count(*) as count
				FROM {quiz_attempts}
				GROUP BY quiz, userid, attempt
				HAVING ( COUNT(*) > 1 )
				ORDER BY quiz, userid";
	}

	$duplicates = $DB->get_records_sql($sql);
	mtrace (count($duplicates).' quiz attempts duplicats', '<br/>');
	if(count($duplicates) > 0){
		foreach($duplicates as $duplicate){
			$params = array('quiz'=>$duplicate->quiz, 'userid' => $duplicate->userid, 'attempt' => $duplicate->attempt);
			$attempts = $DB->get_records('quiz_attempts', $params, 'timestart DESC');

			mtrace("Quiz {$duplicate->quiz} userid {$duplicate->userid} attempt {$duplicate->attempt} duplicats {$duplicate->count}", '<br/>');
			$count = $duplicate->count;

			$sql_last = "SELECT MAX(attempt) FROM {quiz_attempts} WHERE quiz = :quiz AND userid = :userid";
			$last_attempt = $DB->get_field_sql($sql_last, array('quiz'=>$duplicate->quiz, 'userid' => $duplicate->userid));
			foreach($attempts as $attempt){
				if($count > 1){
					$last_attempt++;
					mtrace("-->$count MOVE {$attempt->id} to $last_attempt", '<br/>');
					//$DB->set_field('quiz_attempts', 'attempt', $last_attempt, array('id'=>$attempt->id));
					$count--;
				} else {
					mtrace("-->$count ULTIM, no fem res {$attempt->id}", '<br/>');
				}
			}
		}

		$duplicates = $DB->get_records_sql($sql);
		mtrace (count($duplicates).' quiz attempts duplicats', '<br/>');
	}

	if(count($duplicates) == 0){
		mtrace('OK: ja no hi ha quiz attempts duplicats', '<br/>');
		return true;
	} else {
		mtrace('ERROR: Encara queden quiz attempts duplicats', '<br/>');
		return false;
	}
}

//Repara la duplicació de funcions
function repair_duplicated_course_sections($courseid = false){
	global $DB;

	//Serveix per poder tenir duplicats
	$concat = $DB->sql_concat('course','section');
	if($courseid){
		mtrace ('Seleccionat el curs '.$courseid, '<br/>');
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
	if(count($duplicates) > 0){
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
						mtrace("--> DELETE buit {$section->id}", '<br/>');
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

		$duplicates = $DB->get_records_sql($sql);
		mtrace (count($duplicates).' seccions duplicades', '<br/>');
	}

	if(count($duplicates) == 0){
		mtrace('OK: ja no hi ha seccions duplicades', '<br/>');
		return true;
	} else {
		mtrace('ERROR: Encara queden seccions duplicades', '<br/>');
		return false;
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