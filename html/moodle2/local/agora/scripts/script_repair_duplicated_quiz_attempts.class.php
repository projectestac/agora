<?php

require_once('agora_script_base.class.php');

class script_repair_duplicated_quiz_attempts extends agora_script_base{

	public $title = 'Repair duplicated quiz attempts';
	public $info = "Repair duplicated quiz attempts";
	public $cron = false;
	protected $test = false;

	public function params(){
		$params = array();
		$params['courseid'] = optional_param('courseid', false, PARAM_INT);
		return $params;
	}

	protected function _execute($params = array(), $execute = true){
		global $DB;

		$courseid = $params['courseid'];

		//Serveix per poder tenir duplicats
		$concat = $DB->sql_concat('quiz', 'userid', 'attempt');
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
				$sqlparams = array('quiz'=>$duplicate->quiz, 'userid' => $duplicate->userid, 'attempt' => $duplicate->attempt);
				$attempts = $DB->get_records('quiz_attempts', $sqlparams, 'timestart DESC');

				mtrace("Quiz {$duplicate->quiz} userid {$duplicate->userid} attempt {$duplicate->attempt} duplicats {$duplicate->count}", '<br/>');
				$count = $duplicate->count;

				$sql_last = "SELECT MAX(attempt) FROM {quiz_attempts} WHERE quiz = :quiz AND userid = :userid";
				$last_attempt = $DB->get_field_sql($sql_last, array('quiz'=>$duplicate->quiz, 'userid' => $duplicate->userid));
				foreach($attempts as $attempt){
					if($count > 1){
						$last_attempt++;
						mtrace("-->$count MOVE {$attempt->id} to $last_attempt", '<br/>');
						$DB->set_field('quiz_attempts', 'attempt', $last_attempt, array('id'=>$attempt->id));
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
}