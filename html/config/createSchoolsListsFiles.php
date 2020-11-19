<?php

/**
 * Purpose of file: Create files containing URL used via cron. Two of these files (updateMoodle2 and updateNodes) can
 *  be used when a major upgrade is going to be done in software versions. The other two files (cronMoodle2 and
 *  cronNodes) must be recreated periodically to add and remove schools and are used for maintenance in sites.
 *
 * @param update: if present, update files are created. Otherwise, cron files are created.
 * @param num_exec: Combined with param "update", if present when creating updateMoodle file, repeats standard URL for
 *                      update. Default value is 1.
 * @param new_version: Combined with param "update", if present when creating updateMoodle file, adds a special URL to
 *                      update major version of moodle. Default value is false (don't add special URL).
 * @param only_name: Combined with param "update", lists only DNS names of services
 * @param service: if present, instead of creating cron files in server, returns the contents of the cron file of the
 *                      requested service
 * @param level: if present, filter the list of URL to include only the one that have the amount of activity set to that
 *                      level. Supported values: 'all', 'level1', 'level2', 'level3', 'level4', 'level5'
 * @param show_totals: if present, show the number of visits before the cron URL
 */

require_once('dblib-mysql.php');
require_once('cronslib.php');

$args = get_webargs();

// Update files params
$update = isset($args['update']); // Just check existence
$numexec = (isset($args['num_exec']) && is_numeric($args['num_exec'])) ? $args['num_exec'] : 1;
$newversion = isset($args['new_version']); // Just check existence
$onlyname = isset($args['only_name']);  // Just check existence

// Cron files params
$getService = $args['service'] ?? false;
$level = strtolower($args['level'] ?? 'all');
$showTotals = isset($args['show_totals']);  // Just check existence

// Ensure $level has an allowed value
$allowed_levels = ['all', 'level1', 'level2', 'level3', 'level4', 'level5'];
if (!in_array($level, $allowed_levels)) {
    $level = 'all';
}

// Ensure $getService has an allowed value
$allowed_services = ['moodle2', 'nodes'];
if (!in_array($getService, $allowed_services)) {
    $getService = '';
}

const ACCESS_THRESHOLD_L1 = 90000;
const ACCESS_THRESHOLD_L2 = 10000;
const ACCESS_THRESHOLD_L3 = 3000;
const ACCESS_THRESHOLD_L4 = 30;

$countDays = 3; // count 3 days before
$startingDay = 1; // starting 1 day before

// Decide if creating cron files or "update" files
if ($update) {

    /* MOODLE 2 update file */
    $schools = getServices(false, 'activedId', 'asc', 'moodle2', '1');

    $schoolsvar = '';
    if (is_array($schools)) {
        foreach ($schools as $school) {
            if ($onlyname) {
                $schoolsvar .= $school['dns'] . "\n";
            } else {
                if ($newversion) {
                    $schoolsvar .= $agora['server']['html'] . $school['dns'] .
                        "/moodle/admin/index.php?confirmupgrade=1&confirmrelease=1&autopilot=1&confirmplugincheck=1&lang=ca&cache=0\n";
                }
                for ($i = 0; $i < $numexec; $i++) {
                    $schoolsvar .= $agora['server']['html'] . $school['dns'] . "/moodle/admin/index.php?lang=ca&autopilot=1\n";
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

    $services = [
        [
            'name' => 'moodle2',
            'url' => '/moodle/admin/cron.php?forcecron=1',
            'file' => 'cronMoodle2.txt',
        ],
        [
            'name' => 'nodes',
            'url' => '/wp-cron.php',
            'file' => 'cronNodes.txt',
        ],
    ];

    foreach ($services as $service) {

        // Only content of a given service is requested. Ignore the rest
        if ($service['name'] != $getService) {
            continue;
        }

        $schools = getServices(true, 'activedId', 'asc', $service['name'], '1');

        $servers = []; // List of database servers (Array)
        $unorderedList = []; // Cron list as it comes from database (Array)
        $groupedList = []; // Cron list with items grouped by database server (Array)
        $orderedList = ''; // Cron list with items ordered to separate Moodle instances in the same server (String)

        if (is_array($schools)) {

            // 3 days count, starting 1 day ago
            $schoolsTotals = getServicesTotals(true, 'activedId', 'asc', $service['name'], '1', $countDays, $startingDay);

            foreach ($schools as $school) {

                if (!in_array($school['dbhost'], $servers)) {
                    array_push($servers, $school['dbhost']);
                }

                $total = (isset($schoolsTotals[$school['code']]) && intval($schoolsTotals[$school['code']]['total'])) ? intval($schoolsTotals[$school['code']]['total']) : 0;
                $baseURL = getInstanceBaseURL($service['name'], $school['type']);

                // Add the client to the list if it fulfills the activity requirement
                switch ($level) {

                    case 'level1':
                        // Every 10 minutes
                        if ($total >= ACCESS_THRESHOLD_L1) {
                            if (!in_array($school['dbhost'], $unorderedList)) {
                                array_push($unorderedList, [
                                    'total' => $total,
                                    'url' => $baseURL . $school['dns'] . $service['url'],
                                    'dbhost' => $school['dbhost'],
                                ]);
                            }
                        }
                        break;

                    case 'level2':
                        // Every 20 minutes
                        if (($total < ACCESS_THRESHOLD_L1) && ($total >= ACCESS_THRESHOLD_L2)) {
                            if (!in_array($school['dbhost'], $unorderedList)) {
                                array_push($unorderedList, [
                                    'total' => $total,
                                    'url' => $baseURL . $school['dns'] . $service['url'],
                                    'dbhost' => $school['dbhost'],
                                ]);
                            }
                        }
                        break;

                    case 'level3':
                        // Every 60 minutes
                        if (($total < ACCESS_THRESHOLD_L2) && ($total >= ACCESS_THRESHOLD_L3)) {
                            if (!in_array($school['dbhost'], $unorderedList)) {
                                array_push($unorderedList, [
                                    'total' => $total,
                                    'url' => $baseURL . $school['dns'] . $service['url'],
                                    'dbhost' => $school['dbhost'],
                                ]);
                            }
                        }
                        break;

                    case 'level4':
                        // Three times a day
                        if (($total < ACCESS_THRESHOLD_L3) && ($total >= ACCESS_THRESHOLD_L4)) {
                            if (!in_array($school['dbhost'], $unorderedList)) {
                                array_push($unorderedList, [
                                    'total' => $total,
                                    'url' => $baseURL . $school['dns'] . $service['url'],
                                    'dbhost' => $school['dbhost'],
                                ]);
                            }
                        }
                        break;

                    case 'level5':
                        // Once a day
                        if ($total < ACCESS_THRESHOLD_L4) {
                            if (!in_array($school['dbhost'], $unorderedList)) {
                                array_push($unorderedList, [
                                    'total' => $total,
                                    'url' => $baseURL . $school['dns'] . $service['url'],
                                    'dbhost' => $school['dbhost'],
                                ]);
                            }
                        }
                        break;

                    case 'all':
                        if (!in_array($school['dbhost'], $unorderedList)) {
                            array_push($unorderedList, [
                                'total' => $total,
                                'url' => $baseURL . $school['dns'] . $service['url'],
                                'dbhost' => $school['dbhost'],
                            ]);
                        }
                        break;
                }
            }

        }

        // Group URL by database host
        foreach ($unorderedList as $item) {
            if (isset($groupedList[$item['dbhost']])) {
                // Add item to array
                array_push($groupedList[$item['dbhost']], ['url' => $item['url'], 'total' => $item['total']]);
            } else {
                // Create array and add item
                $groupedList[$item['dbhost']] = [['url' => $item['url'], 'total' => $item['total']]];
            }
        }

        // Build an string with the cron URL ordered in order to distance cron executions in the same database server
        while (!empty($groupedList)) {
            foreach ($servers as $server) {
                if (!empty($groupedList[$server])) {
                    if ($showTotals) {
                        // Show the number of visits plus the URL
                        $item = array_shift($groupedList[$server]);
                        $orderedList .= $item['total'] . ' ' . $item['url'] . "\n";
                    } else {
                        // Shown only the URL
                        $orderedList .= array_shift($groupedList[$server])['url'] . "\n";
                    }
                } else {
                    // Remove empty item
                    unset($groupedList[$server]);
                }
            }
        }

        if (empty($getService)) {
            saveVarToFile($service['file'], $orderedList, false);
        } else {
            saveVarToFile($service['file'], $orderedList, true);
        }
    }
}

/**
 * Save content of var into a file
 *
 * @param string $filename
 * @param string $schoolsVar
 * @param bool $screenOnly
 *
 * @return boolean true if successful
 * @author Toni Ginard
 */
function saveVarToFile(string $filename, string $schoolsVar, $screenOnly = false) {

    global $agora;

    if ($screenOnly) {
        echo $schoolsVar;
        return true;
    } else {
        cli_print_line('<br />');
        cli_print_line('<strong>File name: ' . $filename . '</strong><br />');
        cli_print_line(str_replace("\n", "\n<br />", $schoolsVar));
    }

    // Code commented because it is no longer used
    /*
    $path = $agora['server']['root'] . $agora['server']['datadir'] . 'adminInfo/';

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

    if (fwrite($handle, $schoolsVar) === false) {
        cli_print_line("Cannot write to file ($filename)<br />");
        fclose($handle);
        return false;
    }

    fclose($handle);
    */

    return true;
}

/**
 * Builds the base URL of the instance (https://domain/basedir/)
 *
 * @param $serviceName string (Possible values: 'moodle2' or 'nodes')
 * @param $schoolType integer
 *
 * @return string
 * @author Toni Ginard
 */
function getInstanceBaseURL(string $serviceName, int $schoolType) {

    global $agora;

    $url = '';

    switch ($schoolType) {

        case SERVEIEDUCATIU_TYPE_ID:
            $url .= $agora['server']['se-url'];
            break;

        case EOI_TYPE_ID:
            $url .= $agora['server']['eoi'];
            break;

        case PROJECTES_TYPE_ID:
            $url .= $agora['server']['projectes'];
            break;

        default:
            $url .= ('moodle2' == $serviceName) ? $agora['server']['server'] : $agora['server']['nodes'];
    }

    $url .= $agora['server']['base'];

    return $url;
}
