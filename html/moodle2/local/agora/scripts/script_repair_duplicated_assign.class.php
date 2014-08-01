<?php

require_once('agora_script_base.class.php');

class script_repair_duplicated_assign extends agora_script_base{

	public $title = 'Repair duplicated Assignments';
	public $info = "Deletes duplicate assignments merging into one";
	public $cron = false;
	protected $test = true;

	protected function params(){
		$params = array();
		$params['courseid'] = optional_param('courseid', false, PARAM_INT);
		return $params;
	}

	protected function _execute($params = array(), $execute = true){
		global $DB, $CFG;
		require_once($CFG->dirroot.'/mod/assign/locallib.php');
		require_once($CFG->dirroot.'/mod/assign/lib.php');
		require_once($CFG->dirroot.'/course/lib.php');

		$courseid = $params['courseid'];

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
				$this->merge_assign_course_section($duplicate->name, $duplicate->course, $duplicate->section, $execute);
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

	private function merge_assign_course_section($name, $courseid, $section, $execute = false){
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
				if($this->compare_assign($original_assign, $assign, $assign_plugin_config)){
					$cm = get_coursemodule_from_instance('assign', $assign->id, 0, false, MUST_EXIST);
					$context = context_module::instance($cm->id);
					if($this->compare_cm($original_cm, $cm)){
						$this->merge_assign($first_assign, $assign, $original_context, $context, $execute);
					}
				}
			}
		}
	}

	private function merge_assign($original_assign, $assign, $original_context, $context, $execute = false){
		mtrace("----> OK: Assign {$assign->id}", '<br/>');
		if($this->merge_assign_submissions($original_assign->id, $assign->id, $original_context->id, $context->id, $execute)){
			mtrace("------> OK: Submissions", '<br/>');
		} else {
			return false;
		}

		if($this->merge_assign_grades($original_assign->id, $assign->id, $original_context->id, $context->id, $execute)){
			mtrace("------> OK: Grades", '<br/>');
			if($execute){
				$this->update_assign_grades($original_assign);
				mtrace('Done!','<br>');
			} else mtrace('not executing','<br>');
		} else {
			return false;
		}

		//Files
		if($this->merge_files('mod_assign','intro',$original_context->id, $context->id)){
			//Cleaning
			if($execute){
				delete_course_module($context->instanceid);
				mtrace('Done!','<br>');
			} else mtrace('not executing','<br>');
		}
	}

	private function compare_assign($original, $compare, $config){
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

	private function compare_cm($original, $compare){
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

	private function merge_assign_submissions($originalid, $assignid, $original_contextid, $contextid, $execute = false){
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
					if($this->compare_submissions($original_submission, $submission)){
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

					if(!$this->merge_assignsubmission_file($original_submission, $submission, $original_contextid, $contextid, $execute)){
						return false;
					}

					if(!$this->merge_assignsubmission_onlinetext($original_submission, $submission, $original_contextid, $contextid, $execute)){
						return false;
					}

					if(!$this->merge_assign_comments($original_submission, $submission, $original_contextid, $contextid)){
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
						$this->move_files('assignsubmission_file', 'submission_files', $original_contextid, $contextid, $submission->id, $submission->id, $execute);
						$DB->set_field('assignsubmission_onlinetext', 'assignment', $originalid, array('submission'=>$submission->id));
						$this->move_files('assignsubmission_onlinetext', 'submissions_onlinetext', $original_contextid, $contextid, $submission->id, $submission->id, $execute);
						mtrace('Done!','<br>');
					} else mtrace('not executing','<br>');
				}
			}
		}
		return true;
	}

	private function merge_assignsubmission_file($original_submission, $submission, $original_contextid, $contextid, $execute = false){
		global $DB;

		$original_file = $DB->get_record('assignsubmission_file',array('submission'=>$original_submission->id));
		$submission_file = $DB->get_record('assignsubmission_file',array('submission'=>$submission->id));
		if($original_file || $submission_file){
			mtrace("--------> Merging assignsubmission_file", '<br/>');
			if($original_file->numfiles == $submission_file->numfiles){
				//Files: 'assignsubmission_file'=>'submission_files'
				if($this->merge_files('assignsubmission_file', 'submission_files', $original_contextid, $contextid, $original_submission->id, $submission->id, $execute)){
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

	private function merge_assignsubmission_onlinetext($original_submission, $submission, $original_contextid, $contextid, $execute=false){
		global $DB;

		$original_onlinetext = $DB->get_record('assignsubmission_onlinetext',array('submission'=>$original_submission->id));
		$submission_onlinetext = $DB->get_record('assignsubmission_onlinetext',array('submission'=>$submission->id));
		if($original_onlinetext || $submission_onlinetext){
			mtrace("--------> Merging assignsubmission_onlinetext", '<br/>');
			if($original_onlinetext->onlinetext == $submission_onlinetext->onlinetext &&
				$original_onlinetext->onlineformat == $submission_onlinetext->onlineformat){
				//Files: 'assignsubmission_onlinetext'=>'submissions_onlinetext'
				if($this->merge_files('assignsubmission_onlinetext', 'submissions_onlinetext', $original_contextid, $contextid, $original_submission->id, $submission->id, $execute)){
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

	private function merge_assign_comments($original_submission, $submission, $original_contextid, $contextid){
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

	private function compare_submissions($original, $compare){
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


	private function merge_files($component, $filearea, $new_contextid, $compare_contextid, $new_itemid = 0, $compare_itemid = 0, $execute = false){
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

	private function move_files($component, $filearea, $new_contextid, $old_contextid, $new_itemid = 0, $old_itemid = 0, $execute = false){
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

	private function merge_assign_grades($originalid, $assignid, $original_contextid, $contextid, $execute = false){
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
					if($this->compare_grades($original_grade, $grade)){
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

					if(!$this->merge_assignfeedback_file($original_grade, $grade, $original_contextid, $contextid, $execute)){
						return false;
					}

					if(!$this->merge_assignfeedback_comments($original_grade, $grade, $execute)){
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
						$this->move_files('assignfeedback_file', 'feedback_files', $original_contextid, $contextid, $grade->id, $grade->id, $execute);
						$DB->set_field('assignfeedback_comments', 'assignment', $originalid, array('grade'=>$grade->id));
						mtrace('Done!','<br>');
					} else mtrace('not executing','<br>');
				}
			}
		}
		return true;
	}

	private function merge_assignfeedback_file($original_grade, $grade, $original_contextid, $contextid, $execute = false){
		global $DB;

		$original_file = $DB->get_record('assignfeedback_file',array('grade'=>$original_grade->id));
		$feedback_file = $DB->get_record('assignfeedback_file',array('grade'=>$grade->id));
		if($original_file || $feedback_file){
			mtrace("------> Merging assignfeedback_file", '<br/>');
			if($original_file->numfiles == $original_file->numfiles){
				//Files: 'assignfeedback_file'=>'feedback_files'
				if($this->merge_files('assignfeedback_file', 'feedback_files', $original_contextid, $contextid, $original_grade->id, $grade->id, $execute)){
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

	private function merge_assignfeedback_comments($original_grade, $grade, $execute = false){
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

	private function update_assign_grades($assign){
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

	private function compare_grades($original, $compare){
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

}