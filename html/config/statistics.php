<?php

define('MOODLE2_PREFIX', 'm2');
define('NODES_PREFIX', 'wp_');

define('SECONDS_IN_A_WEEK', '604800');
define('SECONDS_IN_AN_HOUR', '3600');
define('SECONDS_IN_90_DAYS', '7776000');
define('SECONDS_IN_30_DAYS', '2592000');

require_once('env-config.php');
require_once('dblib-mysql.php');
require_once('cronslib.php');

$args = get_webargs();

date_default_timezone_set('Europe/Madrid');

// Params to allow execution of stats of only one service

if (isset($args['only']) && !empty($args['only'])) {
    $doonly = $args['only'];
} else {
    $doonly = false;
    if (isset($args['onlyMoodle2'])) {
        $doonly = 'moodle2';
    }
    if (isset($args['onlyNodes'])) {
        $doonly = 'nodes';
    }
}

// Get optional params or set default values
$year = (isset($args['year']) && $args['year'] != '') ? sprintf("%04d", $args['year']) : date('Y', strtotime("-1 day"));
$month = (isset($args['month']) && $args['month'] != '') ? sprintf("%02d", $args['month']) : date('m', strtotime("-1 day"));
$day = (isset($args['day']) && $args['day'] != '') ? sprintf("%02d", $args['day']) : date('d', strtotime("-1 day"));

// Calculate the day of the week
$dayofweek = date('N', mktime(13, 00, 00, $month, $day, $year));

// Calculate the timestamp of the last second of the month we're getting the stats
$daysofmonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$timestampofmonth = mktime(23, 59, 59, $month, $daysofmonth, $year);

$services = getServices(true, 'clientDNS', 'asc', 'all', '1');

foreach ($services as $school) {
    if (isset($args['only']) && !empty($args['only']) && $args['only'] != $school['service']) {
        // Ignore the service
        continue;
    }

    cli_print_line('<br />' . $school['service'] . '<br />');

    switch($school['service']) {
        case 'moodle2':
            process_moodle_stats($school, $year, $month, $day, $dayofweek, $daysofmonth, $timestampofmonth);
            break;
        case 'nodes':
            process_nodes_stats($school, $year, $month, $day, $daysofmonth, $timestampofmonth);
            break;
    }
}

cli_print_line('<p>FET!</p>');


/* MOODLE 2 */

/**
 * Obte les estadistiques d'un espai moodle2 i les desa a la taula d'agoraportal
 *
 * @param school            Array amb les dades del centre
 * @param year              Any del que es volen obtenir les estadistiques
 * @param month             Mes del que es volen obtenir les estadistiques
 * @param day               Dia del que es volen obtenir les estadistiques
 * @param dayofweek         Dia de la setmana que es volen obtenir les estadistiques
 * @param daysofmonth       Nombre de dies del mes que es volen obtenir les estadistiques
 * @param timestampofmonth  Timestamp del darrer segon del mes del que es volen obtenir les estadistiques
 *
 * @return bool false si hi ha un error recuperable i acaba l'script si es irrecuperable
 */
function process_moodle_stats($school, $year, $month, $day, $dayofweek, $daysofmonth, $timestampofmonth) {

    if (!($con = connect_moodle($school))) {
        cli_print_line('No s\'ha pogut connectar a la base de dades del Moodle 2 del centre ' . $school['dns']);
        return false;
    }

    try {
        $statsCon = get_dbconnection('admin');
    } catch (Exception $e) {
        cli_print_line('No s\'ha pogut connectar a la base de dades de les estadístiques');
        exit();
    }

    // DAY STATS
    $hours = Array();
    $total = 0;
    for ($hour = 0; $hour < 24; $hour++) {
        $count = getSchoolMoodleStats_HourAccess($con, $year, $month, $day, $hour, MOODLE2_PREFIX);
        if (empty($count)) {
            $count = 0;
        }
        $hours[$hour] = $count;
        $total += $count;
    }

    $date = $year . $month . $day;
    $users = getSchoolMoodleStats_Users($con, $year, $month, $daysofmonth);
    $diskConsume = getDiskConsume($school['code'], 'moodle2');

    // Consulta que comprova si el registre del mes del centre ja existeix o no
    $sql = "SELECT date FROM agoraportal_moodle2_stats_day WHERE date='$date' AND clientcode='" . $school['code'] . "'";
    $rows = $statsCon->count_rows($sql);
    if ($rows !== false) {
        if ($rows == 0) {
            // INSERT
            $sql = "INSERT INTO agoraportal_moodle2_stats_day
                (clientcode, date, clientDNS, total, h0, h1, h2, h3, h4, h5 ,h6, h7, h8,
                h9, h10, h11, h12, h13, h14, h15, h16, h17, h18, h19, h20, h21, h22, h23,
                userstotal, usersnodelsus, usersactive, usersactivelast90days, usersactivelast30days,
                diskConsume)
                VALUES ('" . $school['code'] . "', $date, '" . $school['dns'] . "', $total,
                $hours[0], $hours[1],$hours[2], $hours[3], $hours[4], $hours[5],
                $hours[6], $hours[7], $hours[8], $hours[9], $hours[10], $hours[11],
                $hours[12], $hours[13], $hours[14], $hours[15], $hours[16], $hours[17],
                $hours[18], $hours[19], $hours[20], $hours[21], $hours[22], $hours[23],
                " . $users['total'] .", " . $users['nodelsus'] .", " . $users['active'] . ",
                " . $users['activelast90days'] .", " . $users['activelast30days'] .",
                '$diskConsume')";
        } else {
            // UPDATE
            $sql = "UPDATE agoraportal_moodle2_stats_day SET
                total = $total,
                h0 = $hours[0],
                h1 = $hours[1],
                h2 = $hours[2],
                h3 = $hours[3],
                h4 = $hours[4],
                h5 = $hours[5],
                h6 = $hours[6],
                h7 = $hours[7],
                h8 = $hours[8],
                h9 = $hours[9],
                h10 = $hours[10],
                h11 = $hours[11],
                h12 = $hours[12],
                h13 = $hours[13],
                h14 = $hours[14],
                h15 = $hours[15],
                h16 = $hours[16],
                h17 = $hours[17],
                h18 = $hours[18],
                h19 = $hours[19],
                h20 = $hours[20],
                h21 = $hours[21],
                h22 = $hours[22],
                h23 = $hours[23],
                userstotal  = " . $users['total'] . ",
                usersnodelsus = " . $users['nodelsus'] . ",
                usersactive = " . $users['active'] . ",
                usersactivelast90days = " . $users['activelast90days'] . ",
                usersactivelast30days = " . $users['activelast30days'] . ",
                diskConsume = '$diskConsume'
                WHERE clientcode = '" . $school['code'] . "' AND date = '$date'";
        }

        // Executa la consulta anterior
        if (!$statsCon->execute_query($sql)) {
            cli_print_line($statsCon->get_error() . '<br />');
        }
    }

    cli_print_line("<p>$sql</p>");

    $lastaccess = getSchoolMoodleStats_LastAccess($con);


    // WEEK STATS
    if ($dayofweek == 7) {

        // Calculate the timestamp of the last second of the week we're getting the stats
        $timestampofweek = mktime(23, 59, 59, $month, $day, $year);

        $courses = getSchoolMoodleStats_Courses($con, $timestampofweek, MOODLE2_PREFIX);
        $activities = getSchoolMoodleStats_Activities($con, $timestampofweek, MOODLE2_PREFIX);
        $totalaccess = getSchoolMoodleStats_TotalWeekAccess($con, $year, $month, $day, MOODLE2_PREFIX);

        $date = date('Ymd', (mktime(00, 00, 00, $month, $day, $year) - 518400)); // 518400 = 6 dies
        // Comprova si el registre ja existeix
        $sql = "SELECT date FROM agoraportal_moodle2_stats_week WHERE date=$date AND clientcode='" . $school['code'] . "'";

        $rows = $statsCon->count_rows($sql);
        if ($rows !== false) {
            if ($rows == 0) {
                // INSERT
                $sql = "INSERT INTO agoraportal_moodle2_stats_week
                            (clientcode, clientDNS, date, usersactive, courses, activities, lastaccess, lastaccess_date, lastaccess_user, total_access)
                            VALUES ('" . $school['code'] . "', '" . $school['dns'] . "', '$date',
                                    '" . $users['active'] . "', '$courses', '$activities',
                                    '" . $lastaccess['lastaccess'] . "', '" . $lastaccess['lastaccessdate'] . "',
                                    '" . $lastaccess['lastaccessuser'] . "', '$totalaccess')";
            } else {
                // UPDATE
                $sql = "UPDATE agoraportal_moodle2_stats_week SET
                            clientcode      = '" . $school['code'] . "',
                            usersactive     = '" . $users['active'] . "',
                            courses         = '$courses',
                            activities      = '$activities',
                            lastaccess      = '" . $lastaccess['lastaccess'] . "',
                            lastaccess_date = '" . $lastaccess['lastaccessdate'] . "',
                            lastaccess_user = '" . $lastaccess['lastaccessuser'] . "',
                            total_access    = '$totalaccess'
                            WHERE clientcode = '" . $school['code'] . "' AND date = '$date'";
            }
            // Executa la consulta anterior
            if (!$statsCon->execute_query($sql)) {
                cli_print_line($statsCon->get_error() . '<br />');
            }
        }

        cli_print_line('<p>' . $sql . '</p>');
    }


    // MONTH STATS
    $date = $year . $month;

    $courses = getSchoolMoodleStats_Courses($con, $timestampofmonth, MOODLE2_PREFIX);
    $activities = getSchoolMoodleStats_Activities($con, $timestampofmonth, MOODLE2_PREFIX);
    $totalaccess = getSchoolMoodleStats_TotalMonthAccess($con, $year, $month, $daysofmonth, MOODLE2_PREFIX);

    $sql = "SELECT yearmonth FROM agoraportal_moodle2_stats_month WHERE yearmonth=$date AND clientcode='" . $school['code'] . "'";

    $rows = $statsCon->count_rows($sql);
    if ($rows !== false) {
        if ($rows == 0) {
            // INSERT
            $sql = "INSERT INTO agoraportal_moodle2_stats_month
                (clientcode, yearmonth, clientDNS, usersactive, usersactivelast30days,
                courses, activities, lastaccess, lastaccess_date,
                lastaccess_user, total_access, diskConsume)
                VALUES ('" . $school['code'] . "', $date, '" . $school['dns'] . "',
                '" . $users['active'] . "', '" . $users['activelast30days'] . "', '$courses', '$activities',
                '" . $lastaccess['lastaccess'] . "', '" . $lastaccess['lastaccessdate'] . "',
                '" . $lastaccess['lastaccessuser'] . "', '$totalaccess', '$diskConsume')";
        } else {
            // UPDATE
            $sql = "UPDATE agoraportal_moodle2_stats_month SET
                usersactive           = '" . $users['active'] . "',
                usersactivelast30days = '" . $users['activelast30days'] . "',
                courses               = '$courses',
                activities            = '$activities',
                lastaccess            = '" . $lastaccess['lastaccess'] . "',
                lastaccess_date       = '" . $lastaccess['lastaccessdate'] . "',
                lastaccess_user       = '" . $lastaccess['lastaccessuser'] . "',
                total_access          = '$totalaccess',
                diskConsume           = '$diskConsume'
                WHERE clientcode = '" . $school['code'] . "' AND yearmonth = '$date'";
        }
        //EXECUTE
        if (!$statsCon->execute_query($sql)) {
            cli_print_line($statsCon->get_error() . '<br />');
        }
    }

    cli_print_line('<p>' . $sql . '</p>');

    $statsCon->close();
    oci_close($con);
}

/**
 * Obte el nombre d'accessos d'un moodle en una franja d'una hora en una
 * data determinada i els retorna
 *
 * @param con           Connexio a la base de dades
 * @param year          Any del que es volen obtenir les estadistiques
 * @param month         Mes del que es volen obtenir les estadistiques
 * @param day           Dia del que es volen obtenir les estadistiques
 * @param hour          Hora del dia del que es volen obtenir les estadistiques
 *
 * @return int El nombre d'accessos
 */
function getSchoolMoodleStats_HourAccess($con, $year, $month, $day, $hour, $prefix) {

    // Converteix a timestamp
    $max = mktime($hour, 59, 59, $month, $day, $year);
    $min = $max - SECONDS_IN_AN_HOUR;

    $sql = 'SELECT count(ID) AS total FROM ' . $prefix . 'logstore_standard_log WHERE timecreated > ' . $min . ' AND timecreated < ' . $max . ' ';
    $stmt = oci_parse($con, $sql);
    $value = '';

    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $value = oci_result($stmt, 'TOTAL');
        }
    }
    if (empty($value)) {
        $value = 0;
    }

    return $value;
}

/**
 * Obte el nombre d'accessos d'un moodle durant una setmana i els retorna
 *
 * @param con           Connexio a la base de dades
 * @param year          Any del que es volen obtenir les estadistiques
 * @param month         Mes del que es volen obtenir les estadistiques
 * @param day           Dia en que comença la setmana de la que es volen obtenir les estadistiques
 *
 * @return int El nombre d'accessos
 */
function getSchoolMoodleStats_TotalWeekAccess($con, $year, $month, $day, $prefix) {

    $max = mktime(23, 59, 59, $month, $day, $year);
    $min = $max - SECONDS_IN_A_WEEK;

    $sql = 'SELECT count(ID) AS total FROM ' . $prefix . 'logstore_standard_log WHERE timecreated > ' . $min . ' AND timecreated < ' . $max . ' ';
    $stmt = oci_parse($con, $sql);
    $value = '';

    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $value = oci_result($stmt, 'TOTAL');
        }
    }
    if (empty($value)) {
        $value = 0;
    }

    return $value;
}

/**
 * Obte el nombre d'accessos d'un moodle durant tot un mes i els retorna
 *
 * @param con           Connexio a la base de dades
 * @param year          Any del que es volen obtenir les estadistiques
 * @param month         Mes del que es volen obtenir les estadistiques
 * @param $daysofmonth  Nombre de dies del mes que es volen obtenir les estadistiques
 *
 * @return int El nombre d'accessos
 */
function getSchoolMoodleStats_TotalMonthAccess($con, $year, $month, $daysofmonth, $prefix) {

    $max = mktime(23, 59, 59, $month, $daysofmonth, $year);
    $min = mktime(0, 0, 0, $month, 1, $year);

    $sql = 'SELECT count(ID) AS total FROM ' . $prefix . 'logstore_standard_log WHERE timecreated > ' . $min . ' AND timecreated < ' . $max . ' ';
    $stmt = oci_parse($con, $sql);
    $value = '';

    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $value = oci_result($stmt, 'TOTAL');
        }
    }
    if (empty($value)) {
        $value = 0;
    }

    return $value;
}

/**
 * Obte el nombre de cursos d'un moodle i el retorna
 *
 * @param con          Connexio a la base de dades
 * @param timestamp    Timestamp del moment en que es volen obtenir les estadistiques
 *
 * @return int El nombre de cursos
 */
function getSchoolMoodleStats_Courses($con, $timestamp, $prefix) {

    $sql = 'SELECT count(ID) AS courses FROM ' . $prefix . 'course where timecreated < ' . $timestamp;
    $stmt = oci_parse($con, $sql);
    $value = '';

    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $value = oci_result($stmt, 'COURSES');
        }
    }

    if (empty($value)) {
        $value = 0;
    }

    return $value;
}

/**
 * Obte el nombre d'activitats d'un moodle i el retorna
 *
 * @param con          Connexio a la base de dades
 * @param timestamp    Timestamp del moment en que es volen obtenir les estadistiques
 *
 * @return int El nombre d'activitats
 */
function getSchoolMoodleStats_Activities($con, $timestamp, $prefix) {
    $sql = 'SELECT COUNT(*) AS count FROM ' . $prefix . 'course_modules WHERE added < ' . $timestamp;
    $stmt = oci_parse($con, $sql);

	$value = 0;
    if (oci_execute($stmt, OCI_DEFAULT)) {
        while (oci_fetch($stmt)) {
            $count = (int) oci_result($stmt, 'COUNT');
            $value += $count;
        }
    }

    return $value;
}

/**
 * Obte diverses xifres relatives als usuaris:
 *   userstotal: nombre de registres a la taula user
 *   usersnodelsus: nombre total exclosos els esborrats i els suspesos
 *   usersactive: nombre d'usuaris confirmats, no esborrats i no suspesos que
 *     han entrat almenys una vegada
 *   usersactivelast90days: nombre d'usuaris confirmats, no esborrats i no suspesos que
 *     han entrat almenys una vegada en els darrers 90 dies
 *   usersactivelast30days: nombre d'usuaris confirmats, no esborrats i no suspesos que
 *     han entrat almenys una vegada en els darrers 30 dies
 *
 * @param $con         Connexio a la base de dades
 * @param $year        Any en el que es calculen les estadístiques
 * @param $month       Mes en el que es calculen les estadístiques
 * @param $daysofmonth Nombre de dies que té el mes en el que es calculen les estadístiques
 *
 * @return array Conte un element amb cada una de les dades anteriors
 */
function getSchoolMoodleStats_Users($con, $year, $month, $daysofmonth) {

    $now = time();
    $max = mktime(23, 59, 59, $month, $daysofmonth, $year);
    if ($now < $max) { // Protection against late executions
        $max = $now;
    }
    $min = $max - SECONDS_IN_90_DAYS;
    $users = array ('total' => 0, 'nodelsus' => 0, 'active' => 0, 'activelast90days' => 0, 'activelast30days' => 0);

    $sql = 'SELECT count(ID) AS users FROM ' . MOODLE2_PREFIX . 'user';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['total'] = oci_result($stmt, 'USERS');
        }
    }

    $sql = 'SELECT count(ID) AS users FROM ' . MOODLE2_PREFIX . 'user WHERE suspended=0 AND deleted=0';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['nodelsus'] = oci_result($stmt, 'USERS');
        }
    }

    $sql = 'SELECT count(ID) AS users FROM ' . MOODLE2_PREFIX . 'user WHERE confirmed=1 AND suspended=0 AND deleted=0 AND firstaccess<>0';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['active'] = oci_result($stmt, 'USERS');
        }
    }

    $sql = 'SELECT count(ID) AS users FROM ' . MOODLE2_PREFIX . 'user WHERE confirmed=1 AND suspended=0 AND deleted=0 AND firstaccess<>0 AND lastaccess between ' .$min.' and '.$max.' ';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['activelast90days'] = oci_result($stmt, 'USERS');
        }
    }

    $min = $max - SECONDS_IN_30_DAYS;
    $sql = 'SELECT count(ID) AS users FROM ' . MOODLE2_PREFIX . 'user WHERE confirmed=1 AND suspended=0 AND deleted=0 AND firstaccess<>0 AND lastaccess between ' .$min.' and '.$max.' ';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['activelast30days'] = oci_result($stmt, 'USERS');
        }
    }

    return $users;
}

/**
 * Obté la data del darrer accés a un moodle i l'usuari que ha fet aquest
 *  accés i els retorna
 *
 * @param con  Connexio a la base de dades
 *
 * @return array Les dades del darrer accés
 */
function getSchoolMoodleStats_LastAccess($con) {

    $sql = 'SELECT lastaccess, username FROM ' . MOODLE2_PREFIX . 'user WHERE username!=\'xtecadmin\' AND username!=\'guest\' AND confirmed=1 AND suspended=0 AND deleted=0 ORDER BY lastaccess DESC ';
    $stmt = oci_parse($con, $sql);
    $values = array();

    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $value = '';
            $value = oci_result($stmt, 'LASTACCESS');
            if (empty($value)) {
                $value = 0;
            }
            $values['lastaccess'] = $value;
            $values['lastaccessdate'] = date("d/m/o H:i:s", $value);
            $values['lastaccessuser'] = oci_result($stmt, 'USERNAME');
        }
    }
    return $values;
}


/* NODES */

/**
 * Obte les estadistiques d'un espai Nodes i les desa a la taula d'agoraportal
 *
 * @param school           Array amb les dades del centre
 * @param year             Any del que es volen obtenir les estadistiques
 * @param month            Mes del que es volen obtenir les estadistiques
 * @param day              Dia del que es volen obtenir les estadistiques
 * @param timestampofmonth Timestamp del darrer segon del mes del que es volen obtenir les estadistiques
 *
 * @return bool false si hi ha un error recuperable i acaba l'script si es irrecuperable
 */
function process_nodes_stats($school, $year, $month, $day, $daysofmonth) {

    $date = $year . $month . $day;
    $yearmonth = $year . $month;

    // Get number of pages loaded in a given day
    $numAccessDay = getSchoolNodesStats_AccessDay($school, $year, $month, $day);

    // Get total number of pages loaded up to a given day
    $numAccessMonth = getSchoolNodesStats_AccessMonth($school, $year, $month, $daysofmonth);

    // Get number of posts published a given day
    $numPostsDay = getSchoolNodesStats_PostsDay($school, $year, $month, $day);

    // Get total number of posts published up to a given day
    $numPostsMonth = getSchoolNodesStats_PostsMonth($school, $year, $month, $daysofmonth);

    // Get users data: total, active and active last 30 and 90 days
    $users = getSchoolNodesStats_Users($school, $year, $month, $day);

    // Get last activity up to a given day
    $lastActivity = getSchoolNodesStats_LastActivity($school, $year, $month, $day);

    try {
        $statsCon = get_dbconnection('admin');
    } catch (Exception $e) {
        cli_print_line('No s\'ha pogut connectar a la base de dades de les estadístiques');
        exit();
    }

    // Get disk consume
    $diskConsume = (int)getDiskConsume($school['code'], 'nodes');

    // Insert or update stats_day
    $sql = "SELECT date FROM agoraportal_nodes_stats_day WHERE date=$date AND clientcode='" . $school['code'] . "'";

    $rows = $statsCon->count_rows($sql);
    if ($rows !== false) {
        if ($rows == 0) { // INSERT
            $sql = "INSERT INTO agoraportal_nodes_stats_day
                (clientcode, clientDNS, date, total, posts, userstotal, usersactive, usersactivelast30days, usersactivelast90days, diskConsume)
                VALUES ('" . $school['code'] . "', '" . $school['dns'] . "', $date, "
                    . "$numAccessDay, $numPostsDay, " . $users['total'] . ", " . $users['active'] . ", "
                    . $users['activelast30days'] . ", " . $users['activelast90days'] . ", $diskConsume)";
        } else  { // UPDATE
            $sql = "UPDATE agoraportal_nodes_stats_day SET
                total                 = $numAccessDay,
                posts                 = $numPostsDay,
                userstotal            = " . $users['total'] . ",
                usersactive           = " . $users['active'] . ",
                usersactivelast30days = " . $users['activelast30days'] . ",
                usersactivelast90days = " . $users['activelast90days'] . ",
                diskConsume           = $diskConsume
                WHERE clientcode = '" . $school['code'] . "' AND date = '$date'";
        }
        if (!$statsCon->execute_query($sql)) {
            cli_print_line($statsCon->get_error() . '<br />');
        }
    }

    cli_print_line('<p>' . $sql . '</p>');

    // Insert or update stats_month
    $sql = "SELECT yearmonth FROM agoraportal_nodes_stats_month WHERE yearmonth=$yearmonth AND clientcode='" . $school['code'] . "'";

    $rows = $statsCon->count_rows($sql);
    if ($rows !== false) {
        if ($rows == 0) { // INSERT
            $sql = "INSERT INTO agoraportal_nodes_stats_month
                (clientcode, clientDNS, yearmonth, total, posts, userstotal, usersactive, lastactivity, diskConsume)
                VALUES ('" . $school['code'] . "', '" . $school['dns'] . "',$yearmonth"
                    . "$numAccessMonth, $numPostsMonth, " . $users['total'] . ", " . $users['active'] . ", "
                    . "'$lastActivity', $diskConsume)";
        } else  { // UPDATE
            $sql = "UPDATE agoraportal_nodes_stats_month SET
                total        = $numAccessMonth,
                posts        = $numPostsMonth,
                userstotal   = " . $users['total'] . ",
                usersactive  = " . $users['active'] . ",
                lastactivity = '$lastActivity',
                diskConsume  = $diskConsume
                WHERE clientcode = '" . $school['code'] . "' AND yearmonth = '$yearmonth'";
        }
        if (!$statsCon->execute_query($sql)) {
            cli_print_line($statsCon->get_error() . '<br />');
        }
    }

    cli_print_line('<p>' . $sql . '</p>');

    $statsCon->close();
}

/**
 * Count the number of pages of WordPress loaded during a given day
 *
 * @param array $school
 * @param int $year
 * @param int $month
 * @param int $day
 *
 * @return int if successful, boolean false otherwise
 */
function getSchoolNodesStats_AccessDay($school, $year, $month, $day) {

    if (!($con = connect_nodes($school))) {
        cli_print_line('<br>No s\'ha pogut connectar a la base de dades de l\'espai Nodes del centre ' . $school['dns']);
        return false;
    }

    $sql = "SELECT count(stat_id) AS value FROM " . NODES_PREFIX . "stats WHERE datetime BETWEEN '$year-$month-$day 00:00:00' AND '$year-$month-$day 23:59:59'";

    if (!$value = $con->get_field($sql, 'value')) {
        $value = 0;
    }

    $con->close();

    return $value;
}

/**
 * Count the number of pages of WordPress loaded in a given month
 *
 * @param array $school
 * @param int $year
 * @param int $month
 * @param int $daysofmonth
 *
 * @return int if successful, boolean false otherwise
 */
function getSchoolNodesStats_AccessMonth($school, $year, $month, $daysofmonth) {

    if (!($con = connect_nodes($school))) {
        cli_print_line('<br>No s\'ha pogut connectar a la base de dades de l\'espai Nodes del centre ' . $school['dns']);
        return false;
    }

    $sql = "SELECT count(stat_id) AS value FROM " . NODES_PREFIX . "stats WHERE datetime BETWEEN '$year-$month-01 00:00:00' AND '$year-$month-$daysofmonth 23:59:59'";

    if (!$value = $con->get_field($sql, 'value')) {
        $value = 0;
    }

    $con->close();

    return $value;
}

/**
 * Count the number of items in the table wp_posts of WordPress created a given day
 *
 * @param array $school
 * @param int $year
 * @param int $month
 * @param int $day
 *
 * @return int if successful, boolean false otherwise
 */
function getSchoolNodesStats_PostsDay($school, $year, $month, $day) {

    if (!($con = connect_nodes($school))) {
        cli_print_line('<br>No s\'ha pogut connectar a la base de dades de l\'espai Nodes del centre ' . $school['dns']);
        return false;
    }

    $sql = "SELECT count(ID) AS value FROM " . NODES_PREFIX . "posts WHERE post_date BETWEEN '$year-$month-$day 00:00:00' AND '$year-$month-$day 23:59:59' AND post_type <> 'revision'";

    if (!$value = $con->get_field($sql, 'value')) {
        $value = 0;
    }

    $con->close();

    return $value;
}

/**
 * Count the number of records in the table wp_posts of WordPress created up to a given day
 *
 * @param array $school
 * @param int $year
 * @param int $month
 * @param int $day
 *
 * @return int if successful, boolean false otherwise
 */
function getSchoolNodesStats_PostsMonth($school, $year, $month, $daysofmonth) {

    if (!($con = connect_nodes($school))) {
        cli_print_line('<br>No s\'ha pogut connectar a la base de dades de l\'espai Nodes del centre ' . $school['dns']);
        return false;
    }

    $sql = "SELECT count(ID) AS value FROM " . NODES_PREFIX . "posts WHERE post_date BETWEEN '$year-$month-01 00:00:00' AND '$year-$month-$daysofmonth 23:59:59' AND post_type <> 'revision'";

    if (!$value = $con->get_field($sql, 'value')) {
        $value = 0;
    }

    $con->close();

    return $value;
}

/**
 * Count the number of users that meet these conditions:
 *  total: Number of records in the table wp_users
 *  active: Number of users not marked as spam
 *  activelast30days: Number of users who has logged in during the last 30 days
 *  activelast90days: Number of users who has logged in during the last 90 days
 *
 * @param array $school
 * @param int $year
 * @param int $month
 * @param int $day
 * @param int $daysofmonth
 *
 * @return array if successful, boolean false otherwise
 */
function getSchoolNodesStats_Users($school, $year, $month, $day) {

    if (!($con = connect_nodes($school))) {
        cli_print_line('<br>No s\'ha pogut connectar a la base de dades de l\'espai Nodes del centre ' . $school['dns']);
        return false;
    }

    $users = array ('total' => 0, 'active' => 0, 'activelast30days' => 0, 'activelast90days' => 0);

    // Count all users in the table
    $sql = "SELECT count(ID) AS value FROM " . NODES_PREFIX . "users";
    if (!$users['total'] = $con->get_field($sql, 'value')) {
        $users['total'] = 0;
    }

    // Count the users not marked as spam
    $sql = "SELECT count(ID) AS value FROM " . NODES_PREFIX . "users WHERE user_status = 0";
    if (!$users['active'] = $con->get_field($sql, 'value')) {
        $users['active'] = 0;
    }

    // Count the users not marked as spam that have logged in the last 30 days
    $now = time();
    $max_ts = mktime(23, 59, 59, $month, $day, $year);
    if ($now < $max_ts) { // Protection against late executions
        $max_ts = $now;
    }
    $min = date('Y-m-d H:i:s', $max_ts - SECONDS_IN_30_DAYS);
    $max = date ('Y-m-d H:i:s', $max_ts);

    $sql = "SELECT count(um.umeta_id) AS value FROM " . NODES_PREFIX . "users u "
            . "LEFT JOIN " . NODES_PREFIX . "usermeta um ON um.user_id = u.ID "
            . "WHERE u.user_status = 0 AND um.meta_key = 'last_activity' "
            . "AND STR_TO_DATE(um.meta_value, '%Y-%m-%d %H:%i:%s') BETWEEN '$min' AND '$max'";
    if (!$users['activelast30days'] = $con->get_field($sql, 'value')) {
        $users['activelast30days'] = 0;
    }

    // Count the users not marked as spam that have logged in the last 90 days
    $min = date('Y-m-d H:i:s', $max_ts - SECONDS_IN_90_DAYS);

    $sql = "SELECT count(um.umeta_id) AS value FROM " . NODES_PREFIX . "users u "
            . "LEFT JOIN " . NODES_PREFIX . "usermeta um ON um.user_id = u.ID "
            . "WHERE u.user_status = 0 AND um.meta_key = 'last_activity' "
            . "AND STR_TO_DATE(um.meta_value, '%Y-%m-%d %H:%i:%s') BETWEEN '$min' AND '$max'";
    if (!$users['activelast90days'] = $con->get_field($sql, 'value')) {
        $users['activelast90days'] = 0;
    }

    $con->close();

    return $users;
}

/**
 * Get the date of the last login in WordPress
 *
 * @param array $school
 * @param int $year
 * @param int $month
 * @param int $day
 *
 * @return int if successful, boolean false otherwise
 */
function getSchoolNodesStats_LastActivity($school, $year, $month, $day) {

    if (!($con = connect_nodes($school))) {
        cli_print_line('<br>No s\'ha pogut connectar a la base de dades de l\'espai Nodes del centre ' . $school['dns']);
        return false;
    }

    $sql = "SELECT MAX(meta_value) AS value FROM " . NODES_PREFIX . "usermeta WHERE meta_key = 'last_activity'";
    if (!$value = $con->get_field($sql, 'value')) {
        $value = 0;
    }

    $con->close();

    return $value;
}


/* COMMON */

/**
 * Obté la quota utilitzada per un determinat servei
 *
 * @param statsCon    Connexió a la base de dades d'estadístiques
 * @param clientCode
 * @param service     Valors possibles: 'intranet', 'nodes', 'moodle2'
 *
 * @return string     La quota utilitzada en KB
 */
function getDiskConsume ($clientCode, $service) {
    $sql = 'SELECT cs.diskConsume
            FROM agoraportal_client_services AS cs
            LEFT JOIN agoraportal_clients c ON cs.clientId = c.clientId
            LEFT JOIN agoraportal_services s ON cs.serviceId = s.serviceId
            WHERE c.clientCode=\''.$clientCode.'\' AND s.serviceName=\''.$service.'\'';

    try {
        $statsCon = get_dbconnection('admin');
    } catch (Exception $e) {
        return '0';
    }

    $rows = $statsCon->get_rows($sql);
    if ($rows !== false) {
        // INSERT: Si no hi ha cap registre, el crea
        if (count($rows) > 0) {
            return array_shift($rows)->diskConsume;
        }
    }

    // En cas d'error, retorna 0
    return 0;
}
