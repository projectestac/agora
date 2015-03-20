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

// Decide if creating cron files or update files
if (isset($_REQUEST['update'])) {

    /* Params for update Services files */

    // $num_exec: if present, moodle URL have repetitions
    $num_exec = (isset($_REQUEST['num_exec']) && is_numeric($_REQUEST['num_exec'])) ? $_REQUEST['num_exec'] : 1;

    // $new_version: if present, an special URL is added to updateMoodle.txt
    $new_version = (isset($_REQUEST['new_version'])) ? true : false;
    $intranet_modules = (isset($_REQUEST['intranet_modules'])) ? true : false;


    /* MOODLE 2 update file */

    // get services array where key value is activedId
    $schools = getAllSchools('activedId', 'asc', 'moodle2', '1');

    $schools_var = '';
    foreach ($schools as $school) {
        if ($new_version) {
            $schools_var .= $agora['server']['html'] . $school['school_dns'] . "/moodle/admin/index.php?confirmupgrade=1&confirmrelease=1&autopilot=1&confirmplugincheck=1&lang=ca&cache=0\n";
        }
        for ($i = 0; $i < $num_exec; $i++) {
            $schools_var .= $agora['server']['html'] . $school['school_dns'] . "/moodle/admin/index.php?lang=ca&autopilot=1\n";
        }
    }

    echo '<b>File name: updateMoodle2.txt</b><br />';
    echo str_replace("\n", '<br />', $schools_var);

    $filename = '../../adminInfo/updateMoodle2.txt';

    saveVarToFile($filename, $schools_var);


    /* ZIKULA update file */

    $schools = getAllSchools('activedId', 'asc', 'intranet', '1');

    $schools_var = '';
    foreach ($schools as $school) {
        $schools_var .= $agora['server']['html'] . $school['school_dns'] . "/intranet/upgrade.php\n";
        if ($intranet_modules) {
            $schools_var .= $agora['server']['html'] . $school['school_dns'] . "/intranet/upgradeModules.php\n";
        }
    }

    echo '<br /><br />';
    echo '<b>File name: updateIntranet.txt</b><br />';
    echo str_replace("\n", '<br />', $schools_var);

    $filename = '../../adminInfo/updateIntranet.txt';

    saveVarToFile($filename, $schools_var);



    /* NODES update file */

    $schools = getAllSchools('activedId', 'asc', 'nodes', '1');

    $schools_var = '';
    foreach ($schools as $school) {
        $schools_var .= $agora['server']['html'] . $school['school_dns'] . "/wp-admin/upgrade.php?step=1\n";
    }

    echo '<br /><br />';
    echo '<b>File name: updateNodes.txt</b><br />';
    echo str_replace("\n", '<br />', $schools_var);

    $filename = '../../adminInfo/updateNodes.txt';

    saveVarToFile($filename, $schools_var);


} else {

    /* MOODLE 2 CRONFILE */

    $schools = getAllSchools('activedId', 'asc', 'moodle2', '1');

    $schools_var = '';
    foreach ($schools as $school) {
        $schools_var .= $agora['server']['html'] . $school['school_dns'] . "/moodle/admin/cron.php\n";
    }

    echo '<b>File name: cronMoodle2.txt</b><br />';
    echo str_replace("\n", '<br />', $schools_var);

    $filename = '../../adminInfo/cronMoodle2.txt';

    saveVarToFile($filename, $schools_var);


    /* INTRANET CRONFILE */

    $schools = getAllSchools('activedId', 'asc', 'intranet', '1');

    $schools_var = '';
    foreach ($schools as $school) {
        $schools_var .= $agora['server']['html'] . $school['school_dns'] . "/intranet/iwcron.php\n";
    }

    echo '<br /><br />';
    echo '<b>File name: cronIntranet.txt</b><br />';
    echo str_replace("\n", '<br />', $schools_var);

    $filename = '../../adminInfo/cronIntranet.txt';

    saveVarToFile($filename, $schools_var);
}

/**
 * Save content of var into a file
 *
 * @author Toni Ginard
 *
 * @param $filename: path to file in filesystem
 * @param $schools_var: data to save to file
 *
 * @return boolean true if successful
 */
function saveVarToFile($filename = null, $schools_var = '') {

    // Open $filename in append mode
    if (!$handle = fopen($filename, 'w')) {
        echo "Cannot open file ($filename)<br />";
        return false;
    }

    if (fwrite($handle, $schools_var) === false) {
        echo "Cannot write to file ($filename)<br />";
        fclose($handle);
        return false;
    }

    fclose($handle);
    return true;
}
