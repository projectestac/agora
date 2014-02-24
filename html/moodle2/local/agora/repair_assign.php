<?php

require_once('../../config.php');
require_once('repair.lib.php');

require_login();

$courseid = optional_param('courseid',false,PARAM_INT);
$execute = optional_param('execute',false,PARAM_BOOL);

repair_duplicate_assign($courseid, $execute);