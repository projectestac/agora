<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);


// 2013.07.02 @aginard - Removal of temp files and dirs older than one day

echo "Deleting files from temp directory...\n";

$tempdir = $CFG->tempdir;

define('SECONDS_IN_A_DAY', 86400);
define('NOW', mktime());

if (is_dir($tempdir)) {

    // Using PHP object for iteration
    $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($tempdir), RecursiveIteratorIterator::CHILD_FIRST);

    for ($dir->rewind(); $dir->valid(); $dir->next()) {
        if ($dir->getBasename() != '.'){
            if (is_file($dir->getPathname()) && (NOW - filemtime($dir->getPathname()) > SECONDS_IN_A_DAY)) {
                unlink($dir->getPathname());
                echo 'File ' . $dir->getPathname() . " deleted\n";
            } 
            // Conditions are tested from left to right and execution stops when any of them is false        
            elseif (is_dir($dir->getPathname()) && is_writable($dir->getPathname()) && rmdir($dir->getPathname())) {
                // rmdir only removes empty directories. Upon failure, an E_WARNING is emitted.
                echo 'Empty directory ' . $dir->getPathname() . " deleted\n";
            }
         }
    }
}


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


