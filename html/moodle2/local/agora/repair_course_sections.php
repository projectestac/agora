<?php

require_once('../../config.php');
require_once('repair.lib.php');

$courseid = optional_param('courseid',false,PARAM_INT);

repair_duplicated_course_sections($courseid);