<?php

require_once('agora_script_base.class.php');

class script_repair_duplicated_course_completions extends agora_script_base{

	public $title = 'Repair duplicated Course completions';
	public $info = "Deletes Course completions by deleting the identic";
	public $cron = false;
	protected $test = true;

	protected function params(){
		$params = array();
		$params['courseid'] = optional_param('courseid', false, PARAM_INT);
		return $params;
	}

	protected function _execute($params = array(), $execute = true){
		global $DB;

		$courseid = $params['courseid'];

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
				$complets = $DB->get_records('course_completions', $params, 'timestarted DESC');

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
							$DB->delete_records('course_completions', array('id'=>$complet->id));
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
}