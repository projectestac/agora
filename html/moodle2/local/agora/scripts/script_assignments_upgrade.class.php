<?php

require_once('agora_script_base.class.php');

class script_assignments_upgrade extends agora_script_base{

	public $title = 'Assignments upgrade';
	public $info = "Upgrades all assignments to the new version";
	public $cron = true;
	protected $test = false;

	protected function _execute($params = array(), $execute = true){
		global $CFG, $DB;

		// XTEC: Upgrade automatically assignments to assigns
		// 2013.05.02 @jmiro227

		mtrace("Upgrading assignments...","\n");

		require_once($CFG->dirroot . '/'.$CFG->admin.'/tool/assignmentupgrade/locallib.php');
		require_once($CFG->dirroot . '/course/lib.php');

		$current = 1;
		$assignmentids = tool_assignmentupgrade_load_all_upgradable_assignmentids();
		$total = count($assignmentids);
		$error = false;
		foreach ($assignmentids as $assignmentid) {

		    mtrace("Upgrading assignment $assignmentid ($current of $total)...","\n");

		    $current++;

		    try {
			    list($summary, $success, $log) = tool_assignmentupgrade_upgrade_assignment($assignmentid);

			    if ($success) {
			    	mtrace("Success","\n");
			    } else {
			    	mtrace("Fail: $log","\n");
			    	$error = true;
			   	}
		    } catch(Exception $e) {
		    	$error = true;
				mtrace("ERROR upgrading assignment $assignmentid: ".$e->getMessage(), "\n");
				$assignment = $DB->get_record('assignment',array('id' => $assignmentid));
				$this->repair_duplicated_course_sections($assignment->course);
		    }
		}
		return !$error;
	}

	private function repair_duplicated_course_sections($course){
		require_once('script_repair_duplicated_course_sections.class.php');
		$script = new script_repair_duplicated_course_sections();
		$params['courseid'] = $course;
		$script->execute($params);
	}

	protected function can_be_executed($params = array()){
		global $CFG;
		require_once($CFG->dirroot . '/'.$CFG->admin.'/tool/assignmentupgrade/locallib.php');
		$assignmentids = tool_assignmentupgrade_load_all_upgradable_assignmentids();
		$total = count($assignmentids);
		mtrace($total. ' assignments to upgrade');
		return $total > 0;
	}

	protected function _cron(){
		return $this->_execute();
	}
}