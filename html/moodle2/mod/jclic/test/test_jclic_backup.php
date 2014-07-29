<?php

define('CLI_SCRIPT', 1);
require_once('../../../config.php');
require_once($CFG->dirroot . '/backup/util/includes/backup_includes.php');

// It's necessary to add $CFG->keeptempdirectoriesonbackup = true; to config.php

$course_module_to_backup = 86; // Set this to one existing choice cmid in your dev site home=86; work=39
$user_doing_the_backup   = 2; // Set this to the id of your admin accouun

$bc = new backup_controller(backup::TYPE_1ACTIVITY, $course_module_to_backup, backup::FORMAT_MOODLE,
                            backup::INTERACTIVE_NO, backup::MODE_GENERAL, $user_doing_the_backup);
$bc->execute_plan();
