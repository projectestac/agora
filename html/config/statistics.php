<?php

const MOODLE2_PREFIX = 'm2';
const NODES_PREFIX = 'wp_';

const SECONDS_IN_A_WEEK = '604800';
const SECONDS_IN_AN_HOUR = '3600';
const SECONDS_IN_A_DAY = '86400';
const SECONDS_IN_90_DAYS = '7776000';
const SECONDS_IN_30_DAYS = '2592000';

require_once 'env-config.php';
require_once 'dblib-mysql.php';
require_once 'dbmanager.php';
require_once 'cronslib.php';

$args = get_webargs();

date_default_timezone_set('Europe/Madrid');

// Params to allow execution of stats of only one service
if (!empty($args['only'])) {
    $doonly = $args['only'];
} else {
    $doonly = false;
    if (isset($args['onlyMoodle'])) {
        $doonly = 'Moodle';
    }
    if (isset($args['onlyNodes'])) {
        $doonly = 'Nodes';
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

$services = getServices(true, 'dns', 'asc', 'all', 'active');

global $prepared_stmts;
$prepared_stmts = [];

foreach ($services as $school) {
    if (!empty($doonly) && ($doonly !== $school['service'])) {
        // Ignore the service
        continue;
    }

    cli_print_line('<br />' . $school['service'] . '<br />');

    switch ($school['service']) {
        case 'Moodle':
            process_moodle_stats($school, $year, $month, $day, $dayofweek, $daysofmonth, $timestampofmonth);
            break;
        case 'Nodes':
            process_nodes_stats($school, $year, $month, $day, $daysofmonth);
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
    $hours = [];
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
    $users = getSchoolMoodleStats_Users($con, $year, $month, $daysofmonth, MOODLE2_PREFIX);
    $diskConsume = getDiskConsume($school['code'], 'moodle');
    $userlogin = getSchoolMoodleStats_UserLogin($con, $year, $month, $day, 1, MOODLE2_PREFIX);
    $coursesActive = getSchoolMoodleStats_ActiveCourses($con, $year, $month, $day, 1, MOODLE2_PREFIX);

    // Consulta que comprova si el registre del mes del centre ja existeix o no
    $sql = "SELECT date FROM portal.agoraportal_moodle2_stats_day WHERE date='$date' AND clientcode='" . $school['code'] . "'";
    $rows = $statsCon->count_rows($sql);
    if ($rows !== false) {
        if ($rows == 0) {
            // INSERT
            $sql = "INSERT INTO portal.agoraportal_moodle2_stats_day
                (clientcode, date, clientDNS, total, h0, h1, h2, h3, h4, h5 ,h6, h7, h8, h9, h10, h11, h12, h13, h14, h15, h16, h17, h18, h19, h20, h21, h22, h23,
                userstotal, usersnodelsus, usersactive, usersactivelast90days, usersactivelast30days, diskConsume, userlogin, coursesactive)
                VALUES ('" . $school['code'] . "', $date, '" . $school['dns'] . "', $total, $hours[0], $hours[1], $hours[2], $hours[3], $hours[4], $hours[5], 
                $hours[6], $hours[7], $hours[8], $hours[9], $hours[10], $hours[11], $hours[12], $hours[13], $hours[14], $hours[15], $hours[16], $hours[17], 
                $hours[18], $hours[19], $hours[20], $hours[21], $hours[22], $hours[23], " . $users['total'] . ", " . $users['nodelsus'] . ", " . $users['active'] .
                ", " . $users['activelast90days'] . ", " . $users['activelast30days'] . ", '$diskConsume', '$userlogin', '$coursesActive')";
        } else {
            // UPDATE
            $sql = "UPDATE portal.agoraportal_moodle2_stats_day SET
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
                diskConsume = '$diskConsume',
                userlogin = '$userlogin',
                coursesactive = '$coursesActive'
                WHERE clientcode = '" . $school['code'] . "' AND date = '$date'";
        }

        // Executa la consulta anterior
        if (!$statsCon->execute_query($sql)) {
            cli_print_line($statsCon->get_error() . '<br />');
        }
    }

    cli_print_line("<p>$sql</p>");

    $lastaccess = getSchoolMoodleStats_LastAccess($con, MOODLE2_PREFIX);


    // WEEK STATS
    if ($dayofweek == 7) {

        // Calculate the timestamp of the last second of the week we're getting the stats
        $timestampofweek = mktime(23, 59, 59, $month, $day, $year);

        $courses = getSchoolMoodleStats_Courses($con, $timestampofweek, MOODLE2_PREFIX);
        $coursesActive = getSchoolMoodleStats_ActiveCourses($con, $year, $month, $day, 7, MOODLE2_PREFIX);
        $activities = getSchoolMoodleStats_Activities($con, $timestampofweek, MOODLE2_PREFIX);
        $totalaccess = getSchoolMoodleStats_TotalWeekAccess($con, $year, $month, $day, MOODLE2_PREFIX);
        $userlogin = getSchoolMoodleStats_UserLogin($con, $year, $month, $day, 7, MOODLE2_PREFIX);

        $date = date('Ymd', (mktime(00, 00, 00, $month, $day, $year) - 518400)); // 518400 = 6 dies
        // Comprova si el registre ja existeix
        $sql = "SELECT date FROM portal.agoraportal_moodle2_stats_week WHERE date=$date AND clientcode='" . $school['code'] . "'";

        $rows = $statsCon->count_rows($sql);
        if ($rows !== false) {
            if ($rows == 0) {
                // INSERT
                $sql = "INSERT INTO portal.agoraportal_moodle2_stats_week (clientcode, clientDNS, date, usersactive, courses, coursesactive, activities, lastaccess, lastaccess_date, 
                                                                    lastaccess_user, total_access, userlogin)
                        VALUES ('" . $school['code'] . "', '" . $school['dns'] . "', '$date', '" . $users['active'] . "', '$courses', '$coursesActive', '$activities', '" .
                    $lastaccess['lastaccess'] . "', '" . $lastaccess['lastaccessdate'] . "', '" . $lastaccess['lastaccessuser'] . "', '$totalaccess', '$userlogin')";
            } else {
                // UPDATE
                $sql = "UPDATE portal.agoraportal_moodle2_stats_week SET
                            clientcode      = '" . $school['code'] . "',
                            usersactive     = '" . $users['active'] . "',
                            courses         = '$courses',
                            activities      = '$activities',
                            lastaccess      = '" . $lastaccess['lastaccess'] . "',
                            lastaccess_date = '" . $lastaccess['lastaccessdate'] . "',
                            lastaccess_user = '" . $lastaccess['lastaccessuser'] . "',
                            total_access    = '$totalaccess',
                            userlogin       = '$userlogin',
                            coursesactive   = '$coursesActive'
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
    $coursesActive = getSchoolMoodleStats_ActiveCourses($con, $year, $month, $day, 0, MOODLE2_PREFIX);
    $activities = getSchoolMoodleStats_Activities($con, $timestampofmonth, MOODLE2_PREFIX);
    $totalaccess = getSchoolMoodleStats_TotalMonthAccess($con, $year, $month, $daysofmonth, MOODLE2_PREFIX);
    $userlogin = getSchoolMoodleStats_UserLogin($con, $year, $month, $day, 0, MOODLE2_PREFIX);

    $sql = "SELECT yearmonth FROM portal.agoraportal_moodle2_stats_month WHERE yearmonth=$date AND clientcode='" . $school['code'] . "'";

    $rows = $statsCon->count_rows($sql);
    if ($rows !== false) {
        if ($rows == 0) {
            // INSERT
            $sql = "INSERT INTO portal.agoraportal_moodle2_stats_month (clientcode, yearmonth, clientDNS, usersactive, usersactivelast30days, courses, coursesactive, 
                                                                 activities, lastaccess, lastaccess_date, lastaccess_user, total_access, diskConsume, userlogin)
                    VALUES ('" . $school['code'] . "', $date, '" . $school['dns'] . "', '" . $users['active'] . "', '" . $users['activelast30days'] .
                "', '$courses', '$coursesActive', '$activities', '" . $lastaccess['lastaccess'] . "', '" . $lastaccess['lastaccessdate'] .
                "', '" . $lastaccess['lastaccessuser'] . "', '$totalaccess', '$diskConsume', '$userlogin')";
        } else {
            // UPDATE
            $sql = "UPDATE portal.agoraportal_moodle2_stats_month SET
                usersactive           = '" . $users['active'] . "',
                usersactivelast30days = '" . $users['activelast30days'] . "',
                courses               = '$courses',
                activities            = '$activities',
                lastaccess            = '" . $lastaccess['lastaccess'] . "',
                lastaccess_date       = '" . $lastaccess['lastaccessdate'] . "',
                lastaccess_user       = '" . $lastaccess['lastaccessuser'] . "',
                total_access          = '$totalaccess',
                diskConsume           = '$diskConsume',
                userlogin             = '$userlogin',
                coursesactive         = '$coursesActive'
                WHERE clientcode = '" . $school['code'] . "' AND yearmonth = '$date'";
        }
        if (!$statsCon->execute_query($sql)) {
            cli_print_line($statsCon->get_error() . '<br />');
        }
    }

    cli_print_line('<p>' . $sql . '</p>');

    $statsCon->close();

    disconnect_moodle($con);

    global $prepared_stmts;
    $prepared_stmts = [];
}

/**
 * Obte el nombre d'accessos d'un moodle en una franja d'una hora en una
 * data determinada i els retorna
 *
 * @param $con
 * @param $year
 * @param $month
 * @param $day
 * @param $hour
 * @param $prefix
 *
 * @return int El nombre d'accessos
 */
function getSchoolMoodleStats_HourAccess($con, $year, $month, $day, $hour, $prefix) {
    // Converteix a timestamp
    $max = mktime($hour, 59, 59, $month, $day, $year);
    $min = $max - SECONDS_IN_AN_HOUR;

    global $prepared_stmts;

    if (!in_array('MoodleStats_Access', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS total FROM ' . $prefix . 'logstore_standard_log WHERE timecreated > $1 AND timecreated < $2';
        if (pg_prepare($con, 'MoodleStats_Access', $query)) {
            array_push($prepared_stmts, 'MoodleStats_Access');
        }
    }

    $result = pg_execute($con, 'MoodleStats_Access', [$min, $max]);

    return (!$result) ? 0 : (int)pg_fetch_assoc($result)['total'];
}

/**
 * Obte el nombre d'accessos d'un moodle durant una setmana i els retorna
 *
 * @param $con
 * @param $year
 * @param $month
 * @param $day
 * @param $prefix
 *
 * @return int El nombre d'accessos
 */
function getSchoolMoodleStats_TotalWeekAccess($con, $year, $month, $day, $prefix) {
    $max = mktime(23, 59, 59, $month, $day, $year);
    $min = $max - SECONDS_IN_A_WEEK;

    global $prepared_stmts;

    if (!in_array('MoodleStats_Access', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS total FROM ' . $prefix . 'logstore_standard_log WHERE timecreated > $1 AND timecreated < $2';
        if (pg_prepare($con, 'MoodleStats_Access', $query)) {
            array_push($prepared_stmts, 'MoodleStats_Access');
        }
    }

    $result = pg_execute($con, 'MoodleStats_Access', [$min, $max]);

    return (!$result) ? 0 : (int)pg_fetch_assoc($result)['total'];
}

/**
 * Obte el nombre d'accessos d'un moodle durant tot un mes i els retorna
 *
 * @param $con
 * @param $year
 * @param $month
 * @param $daysofmonth  Nombre de dies del mes que es volen obtenir les estadistiques
 * @param $prefix
 *
 * @return int El nombre d'accessos
 */
function getSchoolMoodleStats_TotalMonthAccess($con, $year, $month, $daysofmonth, $prefix) {
    $max = mktime(23, 59, 59, $month, $daysofmonth, $year);
    $min = mktime(0, 0, 0, $month, 1, $year);

    global $prepared_stmts;

    if (!in_array('MoodleStats_Access', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS total FROM ' . $prefix . 'logstore_standard_log WHERE timecreated > $1 AND timecreated < $2';
        if (pg_prepare($con, 'MoodleStats_Access', $query)) {
            array_push($prepared_stmts, 'MoodleStats_Access');
        }
    }

    $result = pg_execute($con, 'MoodleStats_Access', [$min, $max]);

    return (!$result) ? 0 : (int)pg_fetch_assoc($result)['total'];
}

/**
 * Obte el nombre de cursos d'un moodle i el retorna
 *
 * @param $con
 * @param $timestamp
 * @param $prefix
 * @return int El nombre de cursos
 */
function getSchoolMoodleStats_Courses($con, $timestamp, $prefix) {
    global $prepared_stmts;

    if (!in_array('MoodleStats_Courses', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS total FROM ' . $prefix . 'course WHERE timecreated < $1';
        if (pg_prepare($con, 'MoodleStats_Courses', $query)) {
            array_push($prepared_stmts, 'MoodleStats_Courses');
        }
    }

    $result = pg_execute($con, 'MoodleStats_Courses', [$timestamp]);

    return (!$result) ? 0 : (int)pg_fetch_assoc($result)['total'];
}

/**
 * Obte el nombre d'activitats d'un moodle i el retorna
 *
 * @param $con
 * @param $timestamp
 * @param $prefix
 *
 * @return int El nombre d'activitats
 */
function getSchoolMoodleStats_Activities($con, $timestamp, $prefix) {
    global $prepared_stmts;

    if (!in_array('MoodleStats_Activities', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS total FROM ' . $prefix . 'course_modules WHERE added < $1';
        if (pg_prepare($con, 'MoodleStats_Activities', $query)) {
            array_push($prepared_stmts, 'MoodleStats_Activities');
        }
    }

    $result = pg_execute($con, 'MoodleStats_Activities', [$timestamp]);

    return (!$result) ? 0 : (int)pg_fetch_assoc($result)['total'];
}

/**
 * Obte la quantitat de userlogins en un dia
 *
 * @param $con         Connexio a la base de dades
 * @param $year        Any en el que es calculen les estadístiques
 * @param $month       Mes en el que es calculen les estadístiques
 * @param $daysofmonth Nombre de dies que té el mes en el que es calculen les estadístiques
 * @param $howmanydays Nombre de dies que té en compte. 0: Tot el mes
 * @param $prefix
 *
 * @return int Xifra de userlogins
 */
function getSchoolMoodleStats_UserLogin($con, $year, $month, $daysofmonth, $howmanydays, $prefix) {
    global $prepared_stmts;

    // User login  during the last day
    if (!in_array('MoodleStats_UserLogin', $prepared_stmts)) {
        $query = 'SELECT COUNT(DISTINCT(userid)) as total FROM ' . $prefix . 'logstore_standard_log WHERE timecreated BETWEEN $1 AND $2 AND eventname = \'\core\event\user_loggedin\'';

        if (pg_prepare($con, 'MoodleStats_UserLogin', $query)) {
            array_push($prepared_stmts, 'MoodleStats_UserLogin');
        }
    }

    $now = time();
    $max = mktime(23, 59, 59, $month, $daysofmonth, $year);
    if ($now < $max) { // Protection against late executions
        $max = $now;
    }

    if ($howmanydays) {
        $min = $max - (SECONDS_IN_A_DAY * $howmanydays);
    } else {
        $min = $max - (SECONDS_IN_A_DAY * $daysofmonth);
    }

    $result = pg_execute($con, 'MoodleStats_UserLogin', [$min, $max]);

    return (!$result) ? 0 : (int)pg_fetch_assoc($result)['total'];
}


/**
 * Obte la quantitat de cursos actius en un dia
 *
 * @param $con         Connexio a la base de dades
 * @param $year        Any en el que es calculen les estadístiques
 * @param $month       Mes en el que es calculen les estadístiques
 * @param $daysofmonth Nombre de dies que té el mes en el que es calculen les estadístiques
 * @param $howmanydays Nombre de dies que té en compte. 0: Tot el mes
 * @param $prefix
 *
 * @return int Xifra de cursos actius
 */
function getSchoolMoodleStats_ActiveCourses($con, $year, $month, $daysofmonth, $howmanydays, $prefix) {
    global $prepared_stmts;

    if (!in_array('MoodleStats_CoursesActive', $prepared_stmts)) {
        $query = 'SELECT COUNT(DISTINCT(courseid)) as total FROM ' . $prefix . 'logstore_standard_log WHERE timecreated BETWEEN $1 AND $2 AND eventname = \'\core\event\course_viewed\'';
        if (pg_prepare($con, 'MoodleStats_CoursesActive', $query)) {
            array_push($prepared_stmts, 'MoodleStats_CoursesActive');
        }
    }

    $now = time();
    $max = mktime(23, 59, 59, $month, $daysofmonth, $year);
    if ($now < $max) { // Protection against late executions
        $max = $now;
    }

    $min = ($howmanydays) ? $max - (SECONDS_IN_A_DAY * $howmanydays) : $max - (SECONDS_IN_A_DAY * $daysofmonth);

    $result = pg_execute($con, 'MoodleStats_CoursesActive', [$min, $max]);

    return (!$result) ? 0 : (int)pg_fetch_assoc($result)['total'];
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
 * @param $prefix
 *
 * @return array Conte un element amb cada una de les dades anteriors
 */
function getSchoolMoodleStats_Users($con, $year, $month, $daysofmonth, $prefix) {
    $users = ['total' => 0, 'nodelsus' => 0, 'active' => 0, 'activelast90days' => 0, 'activelast30days' => 0];

    global $prepared_stmts;

    // Total users

    if (!in_array('MoodleStats_Users', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS users FROM ' . $prefix . 'user';
        if (pg_prepare($con, 'MoodleStats_Users', $query)) {
            array_push($prepared_stmts, 'MoodleStats_Users');
        }
    }

    $result = pg_execute($con, 'MoodleStats_Users', []);
    $users['total'] = (!$result) ? 0 : (int)pg_fetch_assoc($result)['users'];

    // Users nor suspended neither deleted

    if (!in_array('MoodleStats_UsersNoDelSus', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS users FROM ' . $prefix . 'user WHERE suspended=0 AND deleted=0';
        if (pg_prepare($con, 'MoodleStats_UsersNoDelSus', $query)) {
            array_push($prepared_stmts, 'MoodleStats_UsersNoDelSus');
        }
    }

    $result = pg_execute($con, 'MoodleStats_UsersNoDelSus', []);
    $users['nodelsus'] = (!$result) ? 0 : (int)pg_fetch_assoc($result)['users'];

    // Active users

    if (!in_array('MoodleStats_UsersActive', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS users FROM ' . $prefix . 'user WHERE confirmed=1 AND suspended=0 AND deleted=0 AND firstaccess<>0';
        if (pg_prepare($con, 'MoodleStats_UsersActive', $query)) {
            array_push($prepared_stmts, 'MoodleStats_UsersActive');
        }
    }

    $result = pg_execute($con, 'MoodleStats_UsersActive', []);
    $users['active'] = (!$result) ? 0 : (int)pg_fetch_assoc($result)['users'];

    // Users active during the last 90 days

    if (!in_array('MoodleStats_UsersActiveDuringDays', $prepared_stmts)) {
        $query = 'SELECT count(ID) AS users FROM ' . $prefix . 'user WHERE confirmed=1 AND suspended=0 AND deleted=0 AND firstaccess<>0 AND lastaccess BETWEEN $1 AND $2';
        if (pg_prepare($con, 'MoodleStats_UsersActiveDuringDays', $query)) {
            array_push($prepared_stmts, 'MoodleStats_UsersActiveDuringDays');
        }
    }

    $now = time();
    $max = mktime(23, 59, 59, $month, $daysofmonth, $year);
    if ($now < $max) { // Protection against late executions
        $max = $now;
    }
    $min = $max - SECONDS_IN_90_DAYS;

    $result = pg_execute($con, 'MoodleStats_UsersActiveDuringDays', [$min, $max]);
    $users['activelast90days'] = (!$result) ? 0 : (int)pg_fetch_assoc($result)['users'];

    // Users active during the last 30 days

    $min = $max - SECONDS_IN_30_DAYS;

    $result = pg_execute($con, 'MoodleStats_UsersActiveDuringDays', [$min, $max]);
    $users['activelast30days'] = (!$result) ? 0 : (int)pg_fetch_assoc($result)['users'];

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
function getSchoolMoodleStats_LastAccess($con, $prefix) {
    global $prepared_stmts;

    if (!in_array('MoodleStats_LastAccess', $prepared_stmts)) {
        $query = 'SELECT lastaccess, username FROM ' . $prefix . 'user WHERE username!=\'xtecadmin\' AND username!=\'guest\' AND confirmed=1 AND suspended=0 AND deleted=0 ORDER BY lastaccess DESC';
        if (pg_prepare($con, 'MoodleStats_LastAccess', $query)) {
            array_push($prepared_stmts, 'MoodleStats_LastAccess');
        }
    }

    $result = pg_execute($con, 'MoodleStats_LastAccess', []);

    if (!$result) {
        $data = [
            'lastaccess' => 0,
            'lastaccessdate' => '01/01/1970 00:00:00',
            'lastaccessuser' => '',
        ];
    } else {
        $rs = pg_fetch_assoc($result);
        $data = [
            'lastaccess' => $rs['lastaccess'],
            'lastaccessdate' => date("d/m/o H:i:s", $rs['lastaccess']),
            'lastaccessuser' => $rs['username'],
        ];
    }

    return $data;
}


/* NODES */

/**
 * Obte les estadistiques d'un espai Nodes i les desa a la taula d'agoraportal
 *
 * @param school           Array amb les dades del centre
 * @param year             Any del que es volen obtenir les estadistiques
 * @param month            Mes del que es volen obtenir les estadistiques
 * @param day              Dia del que es volen obtenir les estadistiques
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
    $sql = "SELECT date FROM portal.agoraportal_nodes_stats_day WHERE date=$date AND clientcode='" . $school['code'] . "'";

    $rows = $statsCon->count_rows($sql);
    if ($rows !== false) {
        if ($rows == 0) {
            // INSERT
            $sql = "INSERT INTO portal.agoraportal_nodes_stats_day (clientcode, clientDNS, date, total, posts, userstotal, usersactive, usersactivelast30days, usersactivelast90days, diskConsume)
                VALUES ('" . $school['code'] . "', '" . $school['dns'] . "', $date, $numAccessDay, $numPostsDay, " . $users['total'] . ", " . $users['active'] . ", "
                . $users['activelast30days'] . ", " . $users['activelast90days'] . ", $diskConsume)";
        } else {
            // UPDATE
            $sql = "UPDATE portal.agoraportal_nodes_stats_day SET
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
    $sql = "SELECT yearmonth FROM portal.agoraportal_nodes_stats_month WHERE yearmonth=$yearmonth AND clientcode='" . $school['code'] . "'";

    $rows = $statsCon->count_rows($sql);
    if ($rows !== false) {
        if ($rows == 0) {
            // INSERT
            $sql = "INSERT INTO portal.agoraportal_nodes_stats_month (clientcode, clientDNS, yearmonth, total, posts, userstotal, usersactive, lastactivity, diskConsume)
                VALUES ('" . $school['code'] . "', '" . $school['dns'] . "', $yearmonth, $numAccessMonth, $numPostsMonth, " . $users['total'] . ", " . $users['active'] . ", "
                . "'$lastActivity', $diskConsume)";
        } else {
            // UPDATE
            $sql = "UPDATE portal.agoraportal_nodes_stats_month SET
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

    return true;
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

    $users = array('total' => 0, 'active' => 0, 'activelast30days' => 0, 'activelast90days' => 0);

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
    $max = date('Y-m-d H:i:s', $max_ts);

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
function getDiskConsume($clientCode, $service) {
    $sql = 'SELECT i.used_quota
            FROM instances i
            LEFT JOIN clients c ON i.client_id = c.id
            LEFT JOIN services s ON i.service_id = s.id
            WHERE c.code=\'' . $clientCode . '\' AND s.name=\'' . $service . '\'';

    try {
        $statsCon = get_dbconnection('admin');
    } catch (Exception $e) {
        return '0';
    }

    $rows = $statsCon->get_rows($sql);
    if ($rows !== false) {
        // INSERT: Si no hi ha cap registre, el crea.
        if (count($rows) > 0) {
            return array_shift($rows)->used_quota;
        }
    }

    // En cas d'error, retorna 0
    return 0;
}
