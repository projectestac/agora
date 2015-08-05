<?php

/**
 * Purpose of file: create 4 files containing URL used via cron. Two of these
 * files (updateMoodle2 and updateIntranet) are used when a major upgrade is
 * going to be done in software versions. The other two files (cronMoodle2 and
 * cronIntranet) must be recreated everyday to add and remove schools and are
 * used for maintenance in sites.
 *
 * @param update: if present, update files are created. Otherwise, cron files
 *                 are created.
 * @param num_exec: if present when creating updateMoodle file, repeats
 *                   standard URL for update. Default value is 1.
 * @param new_version: if present when creating updateMoodle file, adds a
 *                      special URL to update major version of moodle. Default
 *                      value is false (don't add special URL).
 */
include('dblib-mysql.php');
include('cronslib.php');

$args = get_webargs();

// Decide if creating cron files or update files
if (isset($args['update'])) {

    /* Params for update Services files */

    // $numexec: if present, moodle URL have repetitions
    $numexec = (isset($args['num_exec']) && is_numeric($args['num_exec'])) ? $args['num_exec'] : 1;

    // $newversion: if present, an special URL is added to updateMoodle.txt
    $newversion = (isset($args['new_version'])) ? true : false;
    $onlyname = (isset($args['only_name'])) ? true : false;


    /* MOODLE 2 update file */
    $schools = getAllSchools('activedId', 'asc', 'moodle2', '1');

    $schoolsvar = "";
    foreach ($schools as $school) {
        if ($onlyname) {
            $schoolsvar .= $school['school_dns'] . "\n";
        } else {
            if ($newversion) {
                $schoolsvar .= $agora['server']['html'] . $school['school_dns'] .
                    "/moodle/admin/index.php?confirmupgrade=1&confirmrelease=1&autopilot=1&confirmplugincheck=1&lang=ca&cache=0\n";
            }
            for ($i = 0; $i < $numexec; $i++) {
                $schoolsvar .= $agora['server']['html'] . $school['school_dns'] .
                    "/moodle/admin/index.php?lang=ca&autopilot=1\n";
            }
        }
    }

    saveVarToFile('updateMoodle2.txt', $schoolsvar);


    /* ZIKULA update file */
    $schools = getAllSchools('activedId', 'asc', 'intranet', '1');

    $schoolsvar = "";
    foreach ($schools as $school) {
        if ($onlyname) {
            $schoolsvar .= $school['school_dns'] . "\n";
        } else {
            $schoolsvar .= $agora['server']['html'] . $school['school_dns'] . "/intranet/upgradeModules.php\n";
        }
    }

    saveVarToFile('updateIntranet.txt', $schoolsvar);


    /* NODES update file */
    $schools = getAllSchools('activedId', 'asc', 'nodes', '1');

    $schoolsvar = '';
    foreach ($schools as $school) {
        if ($onlyname) {
            $schoolsvar .= $school['school_dns'] . "\n";
        } else {
            $schoolsvar .= $agora['server']['html'] . $school['school_dns'] . "/wp-admin/upgrade.php?step=1\n";
        }
    }

    saveVarToFile('updateNodes.txt', $schoolsvar);

} else {

    /* MOODLE 2 CRONFILE */
    $schools = getAllSchools('activedId', 'asc', 'moodle2', '1');

    $schoolsvar = "";
    foreach ($schools as $school) {
        $schoolsvar .= $agora['server']['html'] . $school['school_dns'] . "/moodle/admin/cron.php\n";
    }

    saveVarToFile('cronMoodle2.txt', $schoolsvar);


    /* INTRANET CRONFILE */
    $schools = getAllSchools('activedId', 'asc', 'intranet', '1');

    $schoolsvar = '';
    foreach ($schools as $school) {
        $schoolsvar .= $agora['server']['html'] . $school['school_dns'] . "/intranet/iwcron.php\n";
    }

    saveVarToFile('cronIntranet.txt', $schoolsvar);
}

/**
 * Save content of var into a file
 *
 * @author Toni Ginard
 *
 * @param $filename: path to file in filesystem
 * @param $schoolsvar: data to save to file
 *
 * @return boolean true if successful
 */
function saveVarToFile($filename = null, $schoolsvar = "") {
    $path = '../../adminInfo/';

    cli_print_line('<br />');
    cli_print_line('<b>File name: '.$filename.'</b><br />');
    cli_print_line(str_replace("\n", "\n<br />", $schoolsvar));

    if (!is_dir($path)) {
        // Create syncdir if it doesn't exist
        $old = umask(0);
        if (@mkdir($path, 0777)) {
            cli_print_line("$path directory created<br/>");
        }
        umask($old);
    }

    if (!is_dir($path)) {
        cli_print_line("Directory $path does not exist<br/>");
        return false;
    }
    $filename = $path.$filename;

    // Open $filename in append mode
    if (!$handle = fopen($filename, 'w')) {
        cli_print_line("Cannot open file ($filename)<br />");
        return false;
    }

    if (fwrite($handle, $schoolsvar) === false) {
        cli_print_line("Cannot write to file ($filename)<br />");
        fclose($handle);
        return false;
    }

    fclose($handle);
    return true;
}
