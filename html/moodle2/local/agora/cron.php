<?php

require_once('scripts/scripts.lib.php');

mtrace("Executing Agora cron...","\n");
// 2013.07.02 @aginard - Removal of temp files and dirs older than one day
mtrace("Deleting files from temp directory...","\n");

$tempdir = $CFG->tempdir;

define('SECONDS_IN_A_DAY', 86400);
define('NOW', time());

if (is_dir($tempdir)) {

    // Using PHP object for iteration
    $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($tempdir), RecursiveIteratorIterator::CHILD_FIRST);

    for ($dir->rewind(); $dir->valid(); $dir->next()) {
        if ($dir->getBasename() != '.'){
            if (is_file($dir->getPathname()) && (NOW - filemtime($dir->getPathname()) > SECONDS_IN_A_DAY)) {
                unlink($dir->getPathname());
                mtrace('File ' . $dir->getPathname() . ' deleted',"\n");
            }
            // Conditions are tested from left to right and execution stops when any of them is false
            elseif (is_dir($dir->getPathname()) && is_writable($dir->getPathname()) && rmdir($dir->getPathname())) {
                // rmdir only removes empty directories. Upon failure, an E_WARNING is emitted.
                mtrace('Empty directory ' . $dir->getPathname() . ' deleted',"\n");
            }
         }
    }
}

scripts_execute_crons();

require_once('adware/lib.php');
detect_adware_cron();

mtrace("Agora cron done.","\n");