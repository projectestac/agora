<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);


// XTEC: Upgrade automatically assignments to assigns
// 2013.05.02 @jmiro227

echo "\nUpgrading assignments...\n";

require_once($CFG->dirroot . '/'.$CFG->admin.'/tool/assignmentupgrade/locallib.php');
require_once($CFG->dirroot . '/course/lib.php');

$current = 1;

$assignmentids = tool_assignmentupgrade_load_all_upgradable_assignmentids();

$total = count($assignmentids);

foreach ($assignmentids as $assignmentid) {

    echo "Upgrading assignment $assignmentid ($current of $total)...";

    list($summary, $success, $log) = tool_assignmentupgrade_upgrade_assignment($assignmentid);

    $current += 1;

    if ($success) { echo "Success.\n"; }
    else { echo "Fail: $log.\n"; }
    
}


