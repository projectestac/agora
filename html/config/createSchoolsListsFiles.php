<?php

/**
 * Purpose of file: create 4 files containing URL used via cron. Two of these files (updateMoodle2 and updateNodes) are used
 * when a major upgrade is going to be done in software versions. The other two files (cronMoodle2 and cronNodes) must be
 * recreated periodically to add and remove schools and are used for maintenance in sites.
 *
 * @param update: if present, update files are created. Otherwise, cron files are created.
 * @param num_exec: if present when creating updateMoodle file, repeats standard URL for update. Default value is 1.
 * @param new_version: if present when creating updateMoodle file, adds a special URL to update major version of moodle. Default
 *                      value is false (don't add special URL).
 * @param service: if present, instead of creating cron files, returns the contents of the cron file of the requested service
 *
 */
require_once('dblib-mysql.php');
require_once('cronslib.php');

$args = get_webargs();
$getservice = $args['service'] ?? false;
$getlevel = strtolower($args['level'] ?? 'all');

$levels = ['all', 'high', 'medium', 'low'];
if (!in_array($getlevel, $levels)) {
    $getlevel = 'all';
}

const ACCESS_THRESHOLD_HIGH = 50;
const ACCESS_THRESHOLD_LOW = 5;

$countdays = 3; // count 3 days before
$startingday = 1; // starting 1 day before

// Decide if creating cron files or update files
if (isset($args['update'])) {

    /* Params for update Services files */

    // $numexec: if present, moodle URL have repetitions
    $numexec = (isset($args['num_exec']) && is_numeric($args['num_exec'])) ? $args['num_exec'] : 1;

    // $newversion: if present, an special URL is added to updateMoodle.txt
    $newversion = isset($args['new_version']);
    $onlyname = isset($args['only_name']);

    /* MOODLE 2 update file */
    $schools = getServices(false, 'activedId', 'asc', 'moodle2', '1');

    $schoolsvar = '';
    if (is_array($schools)) {
        foreach ($schools as $school) {
            if ($onlyname) {
                $schoolsvar .= $school['school_dns'] . "\n";
            } else {
                if ($newversion) {
                    $schoolsvar .= $agora['server']['html'] . $school['dns'] .
                        "/moodle/admin/index.php?confirmupgrade=1&confirmrelease=1&autopilot=1&confirmplugincheck=1&lang=ca&cache=0\n";
                }
                for ($i = 0; $i < $numexec; $i++) {
                    $schoolsvar .= $agora['server']['html'] . $school['dns'] .
                        "/moodle/admin/index.php?lang=ca&autopilot=1\n";
                }
            }
        }
    }

    saveVarToFile('updateMoodle2.txt', $schoolsvar);

    /* NODES update file */
    $schools = getServices(false, 'activedId', 'asc', 'nodes', '1');

    $schoolsvar = '';
    if (is_array($schools)) {
        foreach ($schools as $school) {
            if ($onlyname) {
                $schoolsvar .= $school['dns'] . "\n";
            } else {
                $schoolsvar .= $agora['server']['html'] . $school['dns'] . "/wp-admin/upgrade.php?step=1\n";
            }
        }
    }

    saveVarToFile('updateNodes.txt', $schoolsvar);

} else {

    $services = array(
        array(
            'name' => 'moodle2',
            'url' => "/moodle/admin/cron.php\n",
            'file' => 'cronMoodle2.txt',
        ),
        array(
            'name' => 'nodes',
            'url' => "/wp-cron.php\n",
            'file' => 'cronNodes.txt',
        ),
    );

    foreach ($services as $service) {
        // Only content of a given service is requested. Ignore the other
        if ($getservice && $service['name'] != $getservice) {
            continue;
        };

        $schools = getServices(false, 'activedId', 'asc', $service['name'], '1');

        $schoolsvarHigh = '';
        $schoolsvarMedium = '';
        $schoolsvarLow = '';
        $schoolsvarAll = '';

        if (is_array($schools)) {

            // Get statistics for all $service['name'] services (nodes, moodle2)
            // 3 days count, starting 1 day ago
            if ('moodle2' == $service['name']) {
                $schoolsTotals = getServicesTotals(false, 'activedId', 'asc', $service['name'], '1', $countdays, $startingday);
            }

            foreach ($schools as $school) {
                // Select the server name according to the
                $schoolsvartmp = '';
                switch ($school['type']) {
                    case SERVEI_EDUCATIU_ID:
                        $schoolsvartmp .= $agora['server']['se-url'] . $agora['server']['base'];
                        break;
                    case PROJECTES_TYPE_ID:
                        $schoolsvartmp .= $agora['server']['projectes'] . $agora['server']['base'];
                        break;
                    default:
                        $schoolsvartmp .= $agora['server']['server'] . $agora['server']['base'];
                }
                $schoolsvartmp .= $school['dns'] . $service['url'];

                // Check if this school is in the array of the statistics and put in the high or the low list
                if ('moodle2' == $service['name']) {
                    if (isset($schoolsTotals[$school['code']]) && intval($schoolsTotals[$school['code']]['total']) >= ACCESS_THRESHOLD_HIGH) {
                        $schoolsvarHigh .= $schoolsvartmp;
                    } elseif (isset($schoolsTotals[$school['code']]) && intval($schoolsTotals[$school['code']]['total']) <= ACCESS_THRESHOLD_LOW) {
                        $schoolsvarLow .= $schoolsvartmp;
                    } else {
                        $schoolsvarMedium .= $schoolsvartmp;
                    }
                }

                // All schools
                $schoolsvarAll .= $schoolsvartmp;
            }
        }

        if ('all' == $getlevel || 'moodle2' != $service['name']) {
            saveVarToFile($service['file'], $schoolsvarAll, $getservice);
        } elseif ('moodle2' == $service['name']) {
            if ('all' == $getlevel || 'high' == $getlevel) {
                saveVarToFile($service['file'] . '_high', $schoolsvarHigh, $getservice);
            }
            if ('all' == $getlevel || 'medium' == $getlevel) {
                saveVarToFile($service['file'] . '_medium', $schoolsvarMedium, $getservice);
            }
            if ('all' == $getlevel || 'low' == $getlevel) {
                saveVarToFile($service['file'] . '_low', $schoolsvarLow, $getservice);
            }
        }
    }
}

/**
 * Save content of var into a file
 *
 * @param string filename: path to file in filesystem
 * @param string schoolsvar: data to save to file
 *
 * @return boolean true if successful
 * @author Toni Ginard
 *
 */
function saveVarToFile($filename = null, $schoolsvar = '', $getservice = false) {

    global $agora;

    $path = $agora['server']['root'] . $agora['server']['datadir'] . 'adminInfo/';

    if ($getservice) {
        echo $schoolsvar;
        return true;
    } else {
        cli_print_line("<br />");
        cli_print_line('<strong>File name: ' . $filename . '</strong><br />');
        cli_print_line(str_replace("\n", "\n<br />", $schoolsvar));
    }

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

    $filename = $path . $filename;

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
