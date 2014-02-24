<?php

require_once('../../config.php');
require_once('repair.lib.php');

$courseid = optional_param('courseid',false,PARAM_INT);
$execute = optional_param('execute',false,PARAM_BOOL);

repair_not_erased_activities($courseid,$execute);