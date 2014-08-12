<?php

require_once('agora_script_base.class.php');

class script_repair_duplicated_course_sections extends agora_script_base{

	public $title = 'Repair duplicated course sections';
	public $info = "Deletes duplicated course sections deleting the one that is empty";
	public $cron = false;
	protected $test = false;

	protected function params(){
		$params = array();
		$params['courseid'] = optional_param('courseid', false, PARAM_INT);
		return $params;
	}

	protected function _execute($params = array(), $execute = true){
		global $DB;

		$courseid = $params['courseid'];
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
				$sqlparams = array('course'=>$duplicate->course, 'section' => $duplicate->section);
				$sections = $DB->get_records('course_sections', $sqlparams, 'id DESC');
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

}