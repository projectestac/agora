<?php
define('CLI_SCRIPT', 1);
require_once('../../../config.php');
require_once($CFG->dirroot.'/backup/util/helper/convert_helper.class.php');

convert_helper::to_moodle2_format('refcourse', 'moodle1');
