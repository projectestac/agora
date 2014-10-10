<?php

require_once('agora_script_base.class.php');

class script_repair_not_erased_activities extends agora_script_base{

	public $title = 'Repair not erased activities';
	public $info = "Erased activities that became orphaned in the past can be deleted";
	public $cron = false;
	public $cli = true;
	protected $test = true;

	public function params(){
		$params = array();
		$params['courseid'] = optional_param('courseid', false, PARAM_INT);
		return $params;
	}

	protected function _execute($params = array(), $execute = true){
		global $DB, $CFG;
		require_once($CFG->dirroot.'/course/lib.php');

		$courseid = $params['courseid'];

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
						course_delete_module($cm->id);
						mtrace('Done!','<br>');
					} else mtrace('not executing','<br>');
				}
			}
		}
		$cms->close();
	}
}