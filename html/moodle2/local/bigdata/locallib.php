<?php

class bigdata {

	public static function export_course($course, $roles) {
		global $CFG, $USER, $DB;

		@set_time_limit(0);
        raise_memory_limit(MEMORY_EXTRA);

		require_once($CFG->dirroot . '/backup/util/includes/backup_includes.php');

		$course = $DB->get_record('course', array('id' => $course));
		if (!$course) {
			throw Exception('coursenotfound');
			return false;
		}

        $userid = (isset($USER->id) && $USER->id != 0) ? $USER->id : 0;  // TODO: Put some user

		$bc = new backup_controller(backup::TYPE_1COURSE, $course->id, backup::FORMAT_MOODLE,
				backup::INTERACTIVE_NO, backup::MODE_SAMESITE, $userid);

		/*$settings = $bc->get_plan()->get_settings();
        foreach ($settings as $setting) {
            $name = $setting->get_name().'<br/>';
            echo $name;
        }*/
		self::set_backupsettings($bc);

		$backupid       = $bc->get_backupid();
		$backupbasepath = $bc->get_plan()->get_basepath();

		$bc->execute_plan();

		$results = $bc->get_results();

		$file = $results['backup_destination'];

		$bc->destroy();

		return array($file, $backupid);

	}

	private static function set_backupsettings(&$bc) {
		global $CFG;
		require_once($CFG->dirroot . '/backup/util/includes/backup_includes.php');
		$settings = array(
			'users' => 1,
			'anonymize' => 1,
			'role_assignments' => 1,
			'activities' => 1,
			'blocks' => 1,
			'filters' => 1,
			'comments' => 1,
			'badges' => 1,
			'calendarevents' => 1,
			'userscompletion' => 1,
			'logs' => 1,
			'grade_histories' => 1,
			'questionbank' => 1
		);

		foreach ($settings as $name => $value) {
			try {
				$setting = $bc->get_plan()->get_setting($name);
				if ($setting->get_status() == backup_setting::NOT_LOCKED) {
					$setting->set_value($value);
				}
			} catch (Exception $e) {
				continue;
			}
		}
	}

}
