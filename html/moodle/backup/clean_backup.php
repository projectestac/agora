<?php
	//AFEGIT XTEC - Fitxer afegit
	
	require_once('../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->libdir.'/formslib.php');
    require_once('backup_scheduled.php');
    require_once('lib.php');
    require_once('backuplib.php');
    
    global $CFG;
    
    // Clean all courses
		
	if (isloggedin()){
		
		admin_externalpage_setup('clean_backup');
		admin_externalpage_print_header();
					
		print_heading(get_string('clean_backup','backup'));
		print_simple_box_start();
		
		if (isset($_GET['clean'])){
			$courses = get_courses();
			$starttime = time();
			echo '<p>'.get_string('cleaning_backups','backup').'</p>';
			echo '<ul>';
			foreach($courses as $course){
				$sche_preferences = schedule_backup_course_configure($course,$starttime);
				if ($sche_preferences->backup_keep) {
					echo '<li>';
					$status = schedule_backup_course_delete_old_files($sche_preferences,$starttime);
					echo '</li>';
				}
			}
			echo '</ul>';
		}else{
			// Advice
			echo '<p>'.get_string('clean_advice','backup').'</p>';
			echo '<div style="text-align:center;"><input value="'.get_string('clean_accept','backup').'" type="button" onclick="window.location.href=\''.$CFG->wwwroot.'/backup/clean_backup.php?clean=1\'" ></div>';
		}
		print_simple_box_end();
	}else{
		$courses = get_courses();
		$starttime = time();
		echo '<p>'.get_string('cleaning_backups','backup').'</p>';
		echo '<ul>';
		foreach($courses as $course){
			$sche_preferences = schedule_backup_course_configure($course,$starttime);
			if ($sche_preferences->backup_keep) {
				echo '<li>';
				$status = schedule_backup_course_delete_old_files($sche_preferences,$starttime);
				echo '</li>';
			}
		}
		echo '</ul>';
	}

