<?php

function repair_not_erased_activities($courseid = false, $execute = false){
	global $DB, $CFG;
	require_once($CFG->dirroot.'/course/lib.php');
	if($courseid){
		mtrace ('Seleccionat el curs '.$courseid, '<br/>');
		$sql = "SELECT cm.id, cm.section, cm.course, cs.sequence
			FROM {course_modules} cm, {course_sections} cs
			WHERE cm.course = $courseid AND cs.id = cm.section AND cs.course = $courseid";
	} else {
		$sql = "SELECT cm.id, cm.section, cm.course, cs.sequence
			FROM {course_modules} cm, {course_sections} cs
			WHERE cs.id = cm.section";
	}
	$cms = $DB->get_recordset_sql($sql);
	if ($cms->valid()) {
		foreach($cms as $cm){
			$sequence = explode(',',$cm->sequence);
			if(!in_array($cm->id, $sequence)){
				mtrace("Orphaned {$cm->id} on course {$cm->course} on section {$cm->section}",'<br>');
				if($execute){
					delete_course_module($cm->id);
					mtrace('Done!','<br>');
				} else mtrace('not executing','<br>');
			}
		}
	}
	$cms->close();
}

function agora_repair_gradebook($courseid = false){
	global $CFG, $DB;
	require_once($CFG->libdir.'/gradelib.php');
	require_once($CFG->dirroot.'/mod/assign/lib.php');
	require_once($CFG->dirroot.'/mod/assign/locallib.php');

	if($courseid){
		mtrace ('Seleccionat el curs '.$courseid, '<br/>');
	    $params = array('moduletype'=>'assign','courseid'=>$courseid);
	    $sql = 'SELECT a.*, cm.idnumber as cmidnumber, a.course as courseid
	            FROM {assign} a, {course_modules} cm, {modules} m
	            WHERE m.name=:moduletype AND m.id=cm.module AND cm.instance=a.id AND a.course=:courseid';
	} else {
		$params = array('moduletype'=>'assign');
    	$sql = 'SELECT a.*, cm.idnumber as cmidnumber, a.course as courseid
            FROM {assign} a, {course_modules} cm, {modules} m
            WHERE m.name=:moduletype AND m.id=cm.module AND cm.instance=a.id';
	}

    if ($assignments = $DB->get_records_sql($sql,$params)) {
    	$num_assign = count($assignments);
    	mtrace("Trobats $num_assign",'<br/>');
    	$i = 0;
		foreach ($assignments as $assign) {
    		$params = array(
    					'courseid'=> (int)$assign->courseid,
    					'itemtype' => 'mod',
    					'itemmodule' => 'assign',
    					'iteminstance' => $assign->id,
    					'itemnumber' => 0);
	    	if (!$grade_items = grade_item::fetch_all($params)) {
	    		$i++;
	            assign_grade_item_update($assign);
	        }
	    }
	    mtrace("Fets $i",'<br/>');
	}

}

function repair_duplicate_assign($courseid = false, $execute = false){
	global $DB, $CFG;
	require_once($CFG->dirroot.'/mod/assign/locallib.php');
	require_once($CFG->dirroot.'/mod/assign/lib.php');
	require_once($CFG->dirroot.'/course/lib.php');
	//Serveix per poder tenir duplicats
	$concat = $DB->sql_concat('a.name', 'cm.course', 'cm.section');
	if($courseid){
		mtrace ('Seleccionat el curs '.$courseid, '<br/>');
		$sql = "SELECT $concat as acs, a.name, cm.course, cm.section, count(*) as count
			FROM {course_modules} cm, {modules} m, {assign} a
			WHERE m.name = 'assign' AND m.id = cm.module AND a.id = cm.instance
				AND cm.course = $courseid
			GROUP BY cm.course, cm.section, a.name
			HAVING ( COUNT(*) > 1 )
			ORDER BY cm.course, cm.section, a.name";
	} else {
		$sql = "SELECT $concat as acs, a.name, cm.course, cm.section, count(*) as count
				FROM {course_modules} cm, {modules} m, {assign} a
				WHERE m.name = 'assign' AND m.id = cm.module AND a.id = cm.instance
				GROUP BY cm.course, cm.section, a.name
				HAVING ( COUNT(*) > 1 )
				ORDER BY cm.course, cm.section, a.name";
	}
	$duplicates = $DB->get_records_sql($sql);
	mtrace (count($duplicates).' assign duplicats', '<br/>');
	if(count($duplicates) > 0){
		foreach($duplicates as $duplicate){
			agora_merge_assign_course_section($duplicate->name, $duplicate->course, $duplicate->section, $execute);
		}
		$duplicates = $DB->get_records_sql($sql);
		mtrace (count($duplicates).' assign duplicats', '<br/>');
	}

	if(count($duplicates) == 0){
		mtrace('OK: ja no hi ha assign duplicats', '<br/>');
		return true;
	} else {
		mtrace('ERROR: Encara queden assign duplicats', '<br/>');
		return false;
	}
}

function agora_merge_assign_course_section($name, $courseid, $section, $execute = false){
	global $DB, $CFG;
	require_once($CFG->libdir.'/gradelib.php');
	require_once($CFG->libdir.'/completionlib.php');

	$params = array('name'=>$name, 'course' => $courseid, 'section' => $section);
	$sql = "SELECT a.*
			FROM {course_modules} cm, {modules} m, {assign} a
			WHERE m.name = 'assign' AND m.id = cm.module AND a.id = cm.instance
				AND cm.course = :course AND cm.section = :section AND a.name = :name
				ORDER BY timemodified DESC";
	$assigns = $DB->get_records_sql($sql, $params);

	$count = count($assigns);
	mtrace("Course {$courseid}  section {$section} name '{$name}' duplicats {$count}", '<br/>');
	$first_assign = array_shift($assigns);
	mtrace("--> First assign {$first_assign->id}", '<br/>');

	$original_assign = (array) $first_assign;
	unset($original_assign['id']);
	unset($original_assign['timemodified']);

	$concat = $DB->sql_concat('plugin', 'subtype', 'name');
	$assign_plugin_config_sql = "SELECT $concat as psn, value FROM {assign_plugin_config} WHERE assignment = :assignment";
	$assign_plugin_config = $DB->get_records_sql_menu($assign_plugin_config_sql,array('assignment'=>$first_assign->id));

	$original_cm = get_coursemodule_from_instance('assign', $first_assign->id, 0, false, MUST_EXIST);
    $original_context = context_module::instance($original_cm->id);

	$original_assign = array_merge($original_assign, $assign_plugin_config);
	if($original_assign){
		foreach($assigns as $assign){
			$assign_plugin_config = $DB->get_records_sql_menu($assign_plugin_config_sql,array('assignment'=>$assign->id));
			if(agora_compare_assign($original_assign, $assign, $assign_plugin_config)){
				$cm = get_coursemodule_from_instance('assign', $assign->id, 0, false, MUST_EXIST);
				$context = context_module::instance($cm->id);
				if(agora_compare_cm($original_cm, $cm)){
					agora_merge_assign($first_assign, $assign, $original_context, $context, $execute);
				}
			}
		}
	}
}

function agora_merge_assign($original_assign, $assign, $original_context, $context, $execute = false){
	mtrace("----> OK: Assign {$assign->id}", '<br/>');
	if(agora_merge_assign_submissions($original_assign->id, $assign->id, $original_context->id, $context->id, $execute)){
		mtrace("------> OK: Submissions", '<br/>');
	} else {
		return false;
	}

	if(agora_merge_assign_grades($original_assign->id, $assign->id, $original_context->id, $context->id, $execute)){
		mtrace("------> OK: Grades", '<br/>');
		if($execute){
			agora_update_assign_grades($original_assign);
			mtrace('Done!','<br>');
		} else mtrace('not executing','<br>');
	} else {
		return false;
	}

	//Files
	if(agora_merge_files('mod_assign','intro',$original_context->id, $context->id)){
		//Cleaning
		if($execute){
			delete_course_module($context->instanceid);
			mtrace('Done!','<br>');
		} else mtrace('not executing','<br>');
	}
}

function agora_compare_assign($original, $compare, $config){
	$compare = (array)$compare;
	$compare = array_merge($compare, $config);
	$compareid = $compare['id'];
	unset($compare['id']);
	unset($compare['timemodified']);
	foreach($original as $key => $value){
		if($key == 'intro'){
			if(isset($compare[$key]) && strip_tags($compare[$key]) != strip_tags($value)){
				// Ja no son iguals...
				mtrace("----> Assign {$compareid} DIFFER on key $key : {$compare[$key]} != $value ... skipping...", '<br/>');
				return false;
			}
		} else if(isset($compare[$key]) && $compare[$key] != $value){
			// Ja no son iguals...
			mtrace("----> Assign {$compareid} DIFFER on key $key : {$compare[$key]} != $value ... skipping...", '<br/>');
			return false;
		}
		// Paràmetre comparat, l'esborrem i després mirarem si està buit per saber si queda algun sense comparar...
		unset($compare[$key]);
	}
	return empty($compare);
}

function agora_compare_cm($original, $compare){
	$original = (array)$original;
	$compare = (array)$compare;
	unset($compare['id']);
	unset($original['id']);
	unset($compare['instance']);
	unset($original['instance']);
	unset($compare['added']);
	unset($original['added']);
	unset($compare['visible']);
	unset($original['visible']);
	unset($compare['visibleold']);
	unset($original['visibleold']);
	foreach($original as $key => $value){
		if(isset($compare[$key]) && $compare[$key] != $value){
			// Ja no son iguals...
			mtrace("----> CM DIFFER on key $key : {$compare[$key]} != $value ... skipping...", '<br/>');
			return false;
		}
		// Paràmetre comparat, l'esborrem i després mirarem si està buit per saber si queda algun sense comparar...
		unset($compare[$key]);
	}
	return empty($compare);
}

function agora_merge_assign_submissions($originalid, $assignid, $original_contextid, $contextid, $execute = false){
	global $DB;
	$fields = 'userid,timecreated,timemodified,status,groupid,id';

	$original = $DB->get_records('assign_submission',array('assignment'=>$originalid),'',$fields);


	$assign_submissions = $DB->get_records('assign_submission',array('assignment'=>$assignid),'',$fields);
	if(!empty($assign_submissions)){
		mtrace("------> Merging submissions", '<br/>');
		foreach($assign_submissions as $userid =>$submission){
			$update = false;
			if(isset($original[$userid])){
				mtrace("------> Merging submissions for user $userid");
				$original_submission = $original[$userid];
				if(agora_compare_submissions($original_submission, $submission)){
					mtrace("--> EQUALS!", '<br/>');
				} else {
					if($submission->timecreated == $original_submission->timecreated &&
						$submission->groupid == $original_submission->groupid && $original_submission->status == 'draft'){
						$update = true;
					} else {
						print_object($original_submission);
						print_object($submission);
						mtrace("--> DIFFER, skipping...", '<br/>');
						return false;
					}
				}

				if(!agora_merge_assignsubmission_file($original_submission, $submission, $original_contextid, $contextid, $execute)){
					return false;
				}

				if(!agora_merge_assignsubmission_onlinetext($original_submission, $submission, $original_contextid, $contextid, $execute)){
					return false;
				}

				if(!agora_merge_assign_comments($original_submission, $submission, $original_contextid, $contextid)){
					return false;
				}

				if($update){
					mtrace("------> DIFFER on status, {$original_submission->status} => {$submission->status} updating...", '<br/>');
					if($execute){
						$original_submission->timemodified = $submission->timemodified;
						$original_submission->status = $submission->status;
						$DB->update_record('assign_submission',$original_submission);
						mtrace('Done!','<br>');
					} else mtrace('not executing','<br>');
				}

				//Cleaning
				//$DB->delete_records('assign_submission',array('id'=>$submission->id));
			} else {
				mtrace("------> New submission for user $userid", '<br/>');
				if($execute){
					//NEW, move it to the original
					$DB->set_field('assign_submission', 'assignment', $originalid, array('id'=>$submission->id));
					$DB->set_field('assignsubmission_file', 'assignment', $originalid, array('submission'=>$submission->id));
					agora_move_files('assignsubmission_file', 'submission_files', $original_contextid, $contextid, $submission->id, $submission->id, $execute);
					$DB->set_field('assignsubmission_onlinetext', 'assignment', $originalid, array('submission'=>$submission->id));
					agora_move_files('assignsubmission_onlinetext', 'submissions_onlinetext', $original_contextid, $contextid, $submission->id, $submission->id, $execute);
					mtrace('Done!','<br>');
				} else mtrace('not executing','<br>');
			}
		}
	}
	return true;
}

function agora_merge_assignsubmission_file($original_submission, $submission, $original_contextid, $contextid, $execute = false){
	global $DB;

	$original_file = $DB->get_record('assignsubmission_file',array('submission'=>$original_submission->id));
	$submission_file = $DB->get_record('assignsubmission_file',array('submission'=>$submission->id));
	if($original_file || $submission_file){
		mtrace("--------> Merging assignsubmission_file", '<br/>');
		if($original_file->numfiles == $submission_file->numfiles){
			//Files: 'assignsubmission_file'=>'submission_files'
			if(agora_merge_files('assignsubmission_file', 'submission_files', $original_contextid, $contextid, $original_submission->id, $submission->id, $execute)){
				//$DB->delete_records('assignsubmission_file',array('submission'=>$submission->id));
				mtrace("------> EQUALS!", '<br/>');
			} else {
				mtrace("------> FILES DIFFER, skipping...!", '<br/>');
				return false;
			}
		} else {
			print_object($original_file);
			print_object($submission_file);
			mtrace("---------> DIFFER, skipping...", '<br/>');
			return false;
		}
	}
	return true;
}

function agora_merge_assignsubmission_onlinetext($original_submission, $submission, $original_contextid, $contextid, $execute=false){
	global $DB;

	$original_onlinetext = $DB->get_record('assignsubmission_onlinetext',array('submission'=>$original_submission->id));
	$submission_onlinetext = $DB->get_record('assignsubmission_onlinetext',array('submission'=>$submission->id));
	if($original_onlinetext || $submission_onlinetext){
		mtrace("--------> Merging assignsubmission_onlinetext", '<br/>');
		if($original_onlinetext->onlinetext == $submission_onlinetext->onlinetext &&
			$original_onlinetext->onlineformat == $submission_onlinetext->onlineformat){
			//Files: 'assignsubmission_onlinetext'=>'submissions_onlinetext'
			if(agora_merge_files('assignsubmission_onlinetext', 'submissions_onlinetext', $original_contextid, $contextid, $original_submission->id, $submission->id, $execute)){
				//$DB->delete_records('assignsubmission_onlinetext',array('submission'=>$submission->id));
				mtrace("------> EQUALS!", '<br/>');
			} else {
				mtrace("------> FILES DIFFER, skipping...!", '<br/>');
				return false;
			}
		} else {
			print_object($original_onlinetext);
			print_object($submission_onlinetext);
			mtrace("---------> DIFFER, skipping...", '<br/>');
			return false;
		}
	}
	return true;
}

function agora_merge_assign_comments($original_submission, $submission, $original_contextid, $contextid){
	global $DB;

	$params = array('commentarea'=>'assignsubmission_comments',
					'itemid' => $original_submission->id,
					'contextid' => $original_contextid);

	$original_comment = $DB->get_record('comments', $params);

	$params = array('commentarea'=>'assignsubmission_comments',
					'itemid' => $submission->id,
					'contextid' => $contextid);
	$submission_comment = $DB->get_record('comments', $params);
	if($original_comment || $submission_comment){
		mtrace("--------> Merging assign_comments", '<br/>');
		if($original_comment->content == $submission_comment->content &&
			$original_comment->format == $submission_comment->format &&
			$original_comment->userid == $submission_comment->userid &&
			$original_comment->timecreated == $submission_comment->timecreated){
			mtrace("------> EQUALS!", '<br/>');
		} else {
			print_object($original_comment);
			print_object($submission_comment);
			mtrace("---------> DIFFER, skipping...", '<br/>');
			return false;
		}
	}
	return true;
}

function agora_compare_submissions($original, $compare){
	$compare = (array) $compare;
	$original = (array) $original;
	unset($compare['timemodified']);
	unset($original['timemodified']);
	unset($compare['id']);
	unset($original['id']);
	foreach($original as $key => $value){
		if(!isset($compare[$key]) || $compare[$key] != $value){
			// Ja no son iguals...
			return false;
		}
		// Paràmetre comparat, l'esborrem i després mirarem si està buit per saber si queda algun sense comparar...
		unset($compare[$key]);
	}
	return empty($compare);
}


function agora_merge_files($component, $filearea, $new_contextid, $compare_contextid, $new_itemid = 0, $compare_itemid = 0, $execute = false){
	global $DB;
	$fs = get_file_storage();
    $compare = $fs->get_directory_files($compare_contextid,$component,$filearea,$compare_itemid,'/',true);

	if($compare){
		mtrace("=========> Getting files $component/$filearea for $compare_contextid", '<br/>');
		foreach($compare as $file){
			$pathhash = $fs->get_pathname_hash($new_contextid, $component, $filearea, $new_itemid, $file->get_filepath(), $file->get_filename());
			$newfile = $fs->get_file_by_hash($pathhash);
			if($newfile){
				if($newfile->get_contenthash() == $file->get_contenthash()){
					mtrace("=========> EQUALS to $pathhash", '<br/>');
					//DELETE
					//$file->delete();
				} else {
					mtrace("=========> DIFFER to $pathhash", '<br/>');
					//DO NOTHING
					return false;
				}
			} else {
				mtrace("=========> MOVE to $new_contextid / $new_itemid", '<br/>');
				//MOVE
				if($execute){
					$filerecord = new stdClass();
		            $filerecord->contextid = $new_contextid;
		            $filerecord->itemid = $new_itemid;
		            $fs->create_file_from_storedfile($filerecord, $file);
					mtrace('Done!','<br>');
				} else mtrace('not executing','<br>');
			}
		}
	}
	return true;
}

function agora_move_files($component, $filearea, $new_contextid, $old_contextid, $new_itemid = 0, $old_itemid = 0, $execute = false){
	$fs = get_file_storage();
    $old_files = $fs->get_directory_files($old_contextid,$component,$filearea,$old_itemid,'/',true);
    mtrace("=========> Moving files $component/$filearea for $old_contextid / $old_itemid", '<br/>');
    foreach($old_files as $file){
    	//MOVE
    	mtrace("=========> MOVE to $new_contextid / $new_itemid", '<br/>');
    	if($execute){
			$filerecord = new stdClass();
	        $filerecord->contextid = $new_contextid;
	        $filerecord->itemid = $new_itemid;
	        $fs->create_file_from_storedfile($filerecord, $file);
			mtrace('Done!','<br>');
		} else mtrace('not executing','<br>');
    }
}

function agora_merge_assign_grades($originalid, $assignid, $original_contextid, $contextid, $execute = false){
	global $DB;
	$fields = 'userid,timecreated,timemodified,grader,grade,locked,mailed,extensionduedate,id';

	$original = $DB->get_records('assign_grades',array('assignment'=>$originalid), '', $fields);
	$assign_grades = $DB->get_records('assign_grades',array('assignment'=>$assignid), '', $fields);
	if(!empty($assign_grades)){
		mtrace("------> Merging grades", '<br/>');
		foreach($assign_grades as $userid =>$grade){
			$update = false;
			if(isset($original[$userid])){
				mtrace("------> Merging grades for user $userid", '<br/>');
				$original_grade = $original[$userid];
				if(agora_compare_grades($original_grade, $grade)){
					//Només es diferent el temps, l'actualitzo...
					if($grade->timemodified > $original_grade->timemodified){
						$update = true;
					}
					mtrace("------> EQUALS!", '<br/>');
				} else {
					if($grade->timecreated == $original_grade->timecreated &&
						$grade->grader == $original_grade->grader &&
						$grade->locked == $original_grade->locked &&
						$grade->mailed == $original_grade->mailed &&
						$grade->extensionduedate == $original_grade->extensionduedate){
						if($grade->timemodified > $original_grade->timemodified){
							$update = true;
						}
					} else {
						print_object($original_grade);
						print_object($grade);
						mtrace("------> DIFFER, skipping...", '<br/>');
						return false;
					}
				}

				if(!agora_merge_assignfeedback_file($original_grade, $grade, $original_contextid, $contextid, $execute)){
					return false;
				}

				if(!agora_merge_assignfeedback_comments($original_grade, $grade, $execute)){
					return false;
				}

				//Updating...
				if($update){
					mtrace("------> DIFFER on grade, updating...", '<br/>');
					if($execute){
						$original_grade->timemodified = $grade->timemodified;
						$original_grade->grade = $grade->grade;
						$DB->update_record('assign_grades',$original_grade);
						mtrace('Done!','<br>');
					} else mtrace('not executing','<br>');
				}

				//Cleaning
				//$DB->delete_records('assign_grades',array('id'=>$delete_grade));
			} else {
				//NEW, move it to the original
				mtrace("------> New grade for user $userid", '<br/>');
				if($execute){
					$DB->set_field('assign_grades', 'assignment', $originalid, array('id'=>$grade->id));
					$DB->set_field('assignfeedback_file', 'assignment', $originalid, array('grade'=>$grade->id));
					agora_move_files('assignfeedback_file', 'feedback_files', $original_contextid, $contextid, $grade->id, $grade->id, $execute);
					$DB->set_field('assignfeedback_comments', 'assignment', $originalid, array('grade'=>$grade->id));
					mtrace('Done!','<br>');
				} else mtrace('not executing','<br>');
			}
		}
	}
	return true;
}

function agora_merge_assignfeedback_file($original_grade, $grade, $original_contextid, $contextid, $execute = false){
	global $DB;

	$original_file = $DB->get_record('assignfeedback_file',array('grade'=>$original_grade->id));
	$feedback_file = $DB->get_record('assignfeedback_file',array('grade'=>$grade->id));
	if($original_file || $feedback_file){
		mtrace("------> Merging assignfeedback_file", '<br/>');
		if($original_file->numfiles == $original_file->numfiles){
			//Files: 'assignfeedback_file'=>'feedback_files'
			if(agora_merge_files('assignfeedback_file', 'feedback_files', $original_contextid, $contextid, $original_grade->id, $grade->id, $execute)){
				//$DB->delete_records('assignfeedback_file',array('grade'=>$grade->id));
				mtrace("------> EQUALS!", '<br/>');
			} else {
				mtrace("------> FILES DIFFER, skipping...!", '<br/>');
				return false;
			}
		} else {
			print_object($original_file);
			print_object($feedback_file);
			mtrace("------> DIFFER, skipping...", '<br/>');
			return false;
		}
	}
	return true;
}

function agora_merge_assignfeedback_comments($original_grade, $grade, $execute = false){
	global $DB;

	$original_comments = $DB->get_record('assignfeedback_comments',array('grade'=>$original_grade->id));
	$feedback_comments = $DB->get_record('assignfeedback_comments',array('grade'=>$grade->id));
	if($original_comments || $feedback_comments){
		mtrace("------> Merging assignfeedback_comments");
		if(strip_tags($original_comments->commenttext) == strip_tags($feedback_comments->commenttext) &&
			$original_comments->commentformat == $feedback_comments->commentformat){
			mtrace("--> EQUALS!", '<br/>');
			//$DB->delete_records('assignfeedback_comments',array('grade'=>$grade->id));
		} else {
			if(empty($feedback_comments->commenttext) && !empty($original_comments->commenttext)){
				mtrace("--> Empty comment, updating...", '<br/>');
				if($execute){
					$DB->set_field('assignfeedback_comments', 'commenttext', $original_comments->commenttext, array('id'=>$original_comments->id));
					mtrace('Done!','<br>');
				} else mtrace('not executing','<br>');
			} else if(empty($original_comments->commenttext) && !empty($feedback_comments->commenttext)){
				mtrace("--> Empty comment, ok...", '<br/>');
			} else {
				print_object($original_comments);
				print_object($feedback_comments);
				mtrace("--> DIFFER, skipping...", '<br/>');
				return false;
			}
		}
	}
	return true;
}

function agora_update_assign_grades($assign){
	global $CFG, $DB;
	require_once($CFG->libdir.'/gradelib.php');

	$cm = get_coursemodule_from_instance('assign', $assign->id, 0, false, MUST_EXIST);
    $context = context_module::instance($cm->id);
	$assignment = new assign($context, null, null);
    $assignment->set_instance($assign);
    $grades = $assignment->get_user_grades_for_gradebook(0);

	$assign->cmidnumber = $cm->idnumber;

	if ($grades) {
        foreach($grades as $k=>$v) {
            if ($v->rawgrade == -1) {
                $grades[$k]->rawgrade = null;
            }
        }
        assign_grade_item_update($assign, $grades);
    } else {
        assign_grade_item_update($assign);
    }

}

function agora_compare_grades($original, $compare){
	$compare = (array) $compare;
	$original = (array) $original;
	unset($compare['id']);
	unset($original['id']);
	unset($compare['timemodified']);
	unset($original['timemodified']);
	foreach($original as $key => $value){
		if(!isset($compare[$key]) || $compare[$key] != $value){
			// Ja no son iguals...
			return false;
		}
		// Paràmetre comparat, l'esborrem i després mirarem si està buit per saber si queda algun sense comparar...
		unset($compare[$key]);
	}
	return empty($compare);
}

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