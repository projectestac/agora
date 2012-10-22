<?php

define('MOODLE_PREFIX', 'ml');
define('MOODLE2_PREFIX', 'm2');
define('INTRANET_PREFIX', 'zk_');
define('STATS_PREFIX', '');

define('SECONDS_IN_A_WEEK', '604800');
define('SECONDS_IN_AN_HOUR', '3600');
define('SECONDS_IN_90_DAYS', '7776000');
define('SECONDS_IN_30_DAYS', '2592000');

include_once('env-config.php');
include_once('dblib-mysql.php');

date_default_timezone_set('Europe/Madrid');

// Params to allow execution of stats of only one service
$doIntranet = true;
$doMoodle = true;
$doMoodle2 = true;
if (isset($_REQUEST['onlyIntranet'])) {
    $doMoodle = false;
    $doMoodle2 = false;
}
if (isset($_REQUEST['onlyMoodle'])) {
    $doIntranet = false;
    $doMoodle2 = false;
}
if (isset($_REQUEST['onlyMoodle2'])) {
    $doIntranet = false;
    $doMoodle = false;
}

// Get optional params or set default values
$year = (isset($_REQUEST['year']) && $_REQUEST['year'] != '') ? sprintf("%04d", $_REQUEST['year']) : date('Y', strtotime("-1 day"));
$month = (isset($_REQUEST['month']) && $_REQUEST['month'] != '') ? sprintf("%02d", $_REQUEST['month']) : date('m', strtotime("-1 day"));
$day = (isset($_REQUEST['day']) && $_REQUEST['day'] != '') ? sprintf("%02d", $_REQUEST['day']) : date('d', strtotime("-1 day"));

// Calculate the day of the week
$dayofweek = date('N', mktime(13, 00, 00, $month, $day, $year));

// Calculate the timestamp of the last second of the month we're getting the stats
$timestampofstats = mktime(23, 59, 59, $month, $day, $year); // Timestamp of the day
$daysofmonth = date('t', $timestampofstats); // Number of days of the month
$timestampofmonth = mktime(23, 59, 59, $month, $daysofmonth, $year);

$allSchools = getAllSchoolsDBInfo(true);

foreach ($allSchools as $school) {
    echo '<br>' . $school['service'] . '<br>';
    if (($school['service'] == 'moodle') && $doMoodle) {
        process_moodle_stats($school, $year, $month, $day, $dayofweek, $daysofmonth, $timestampofmonth);
    } else if (($school['service'] == 'intranet') && $doIntranet) {
        process_intranet_stats($school, $year, $month, $day, $timestampofmonth);
    } else if (($school['service'] == 'moodle2') && $doMoodle2) {
        process_moodle2_stats($school, $year, $month, $day, $dayofweek, $daysofmonth, $timestampofmonth);
    }
}

echo '<p>FET!</p>';




/* INTRANET */

/**
 * Obte les estadistiques d'una intranet i les desa a la taula d'agoraPortal
 *
 * @param school           Array amb les dades del centre
 * @param year             Any del que es volen obtenir les estadistiques
 * @param month            Mes del que es volen obtenir les estadistiques
 * @param day              Dia del que es volen obtenir les estadistiques
 * @param timestampofmonth Timestamp del darrer segon del mes del que es volen obtenir les estadistiques
 *
 * @return bool false si hi ha un error recuperable i acaba l'script si es irrecuperable
 */
function process_intranet_stats($school, $year, $month, $day, $timestampofmonth) {

    global $agora;

    $day_usage = getSchoolIntranetStats_DayUsage($school, $year, $month, $day);
    $month_usage = getSchoolIntranetStats_MonthUsage($school, $year, $month, (int) $day);
    $month_usage = $month_usage + $day_usage;
    $month_users = getSchoolIntranetStats_MonthUsers($school, $timestampofmonth);

    // Connecta a adminagora
    if (!($statsCon = opendb())) {
        print 'No s\'ha pogut connectar a la base de dades de les estadístiques';
        exit();
    }

    $date = $year . $month;

    // Consulta que comprova si el registre del mes del centre ja existeix o no
    $sql = "SELECT yearmonth FROM " . STATS_PREFIX . "agoraportal_intranet_stats_day WHERE yearmonth=$date AND clientcode='" . $school['code'] . "'";

    // Executa la consulta
    if ($qry = mysql_query($sql, $statsCon)) {
        // INSERT: Si no hi ha cap registre, el crea
        if (mysql_num_rows($qry) == 0) {
            $sql = "INSERT INTO " . STATS_PREFIX . "agoraportal_intranet_stats_day
                        (clientcode, yearmonth, clientDNS, total, users, d" . (int) $day . ")
                        VALUES ('" . $school['code'] . "', $date, '" . $school['dns'] . "', $month_usage, $month_users, $day_usage)";
        }
        // UPDATE: Si el registre ja existeix, l'actualitza
        else {
            $sql = "UPDATE " . STATS_PREFIX . "agoraportal_intranet_stats_day 
                        SET total = $month_usage,
                        users = $month_users,
                        d" . (int) $day . " = $day_usage
                        WHERE clientcode = '" . $school['code'] . "' AND yearmonth = '$date'";
        }

        echo '<p>' . $sql . '</p>';

        // Executa la consulta anterior
        if (!mysql_query($sql, $statsCon)) {
            print mysql_error() . '<br />';
        }
    }

    mysql_close($statsCon);
}

/**
 * Obte el nombre de clics d'un dia d'una intranet i el retorna
 *
 * @param school        Array amb les dades del centre
 * @param year          Any del que es volen obtenir les estadistiques
 * @param month         Mes del que es volen obtenir les estadistiques
 * @param day           Dia del que es volen obtenir les estadistiques
 *
 * @return bool false si hi ha un error i el nombre de clics si no n'hi ha
 */
function getSchoolIntranetStats_DayUsage($school, $year, $month, $day) {

    if (!($con = connect_intranet($school))) {
        print '<br>No s\'ha pogut connectar a la base de dades de la intranet del centre ' . $school['dns'];
        return false;
    }

    // Mira si el modul Stats esta actiu
    $stats_active = false;
    $sql = 'SELECT `pn_state` FROM ' . INTRANET_PREFIX . 'modules WHERE `pn_name` = \'Stats\'';

    if ($qry = mysql_query($sql, $con)) {
        if ($data = mysql_fetch_array($qry)) {
            if ($data['pn_state'] == 3) {
                $stats_active = true;
            }
        }
    }

    // Mira si el modul IWstats esta actiu
    $iwstats_active = false;
    $sql = 'SELECT `pn_state` FROM ' . INTRANET_PREFIX . 'modules WHERE `pn_name` = \'IWstats\'';
    if ($qry = mysql_query($sql, $con)) {
        if ($data = mysql_fetch_array($qry)) {
            if ($data['pn_state'] == 3) {
                $iwstats_active = true;
            }
        }
    }

    // Valor predefinit
    $hits = 0;

    $date = $day . $month . $year;

    // Si el modul IWstats esta actiu, agafa les dades d'aquest mòdul
    if ($iwstats_active) {
        // Obte les dades del modul IWstats
        $max = "$year-$month-$day 23:59:59"; // Format datetime del MySQL: 2011-05-02 17:02:55
        $min = "$year-$month-$day 00:00:00";
        $sql = 'SELECT count(*) AS total FROM ' . INTRANET_PREFIX . 'IWstats WHERE iw_datetime > \'' . $min . '\' AND iw_datetime < \'' . $max . '\'';
        if ($qry = mysql_query($sql, $con)) {
            if (mysql_num_rows($qry) == 0) {
                $hits = 0;
            } else {
                $hits = mysql_result($qry, 0, 0);
            }
        }
    } else {
        // Si el modul IWstats esta inactiu i Stats esta actiu, agafa les dades d'aquest mòdul
        if ($stats_active) {
            // Obte les dades del modul Stats
            $sql = 'SELECT pn_hits FROM ' . INTRANET_PREFIX . 'stats_date WHERE pn_date=' . $date;
            if ($qry = mysql_query($sql, $con)) {
                if (mysql_num_rows($qry) == 0) {
                    $hits = 0;
                } else {
                    $hits = mysql_result($qry, 0, 0);
                }
            }
        }
    }

    mysql_close($con);

    return $hits;
}

/**
 * Obte la suma de clics de tot un mes d'una intranet exceptuant el dia actual i la retorna
 *
 * @param school        Array amb les dades del centre
 * @param year          Any del que es volen obtenir les estadistiques
 * @param month         Mes del que es volen obtenir les estadistiques
 * @param clientcode    Codi del centre
 *
 * @return int  El nombre de clics
 */
function getSchoolIntranetStats_MonthUsage($school, $year, $month, $day) {

    global $agora;

    // Connecta a adminagora
    if (!($statsCon = opendb())) {
        print 'No s\'ha pogut connectar a la base de dades de les estadístiques';
        exit();
    }

    $date = $month . $year;
    $clientcode = $school['code'];

    for ($i = 1; $i < 32; $i++) {
        if ($i != $day) {
            $days_array[] = 'd' . $i;
        }
    }

    $days2sum = implode(' + ', $days_array); // d1 + d2 + d3 ...

    $sql = "SELECT $days2sum
                FROM " . STATS_PREFIX . "agoraportal_intranet_stats_day
                WHERE yearmonth = '$year$month' AND clientcode = '$clientcode'";

    if ($qry = mysql_query($sql, $statsCon)) {
        if (mysql_num_rows($qry) == 0) {
            $value = 0;
        } else {
            $value = mysql_result($qry, 0, 0);
        }
    } else {
        $value = 0;
    }

    mysql_close($statsCon);

    return $value;
}

/**
 * Obte el nombre d'usuaris d'una intranet i el retorna
 *
 * @param school           Array amb les dades del centre
 * @param timestampofmonth Timestamp del darrer segon del mes del que es volen obtenir les estadistiques
 *
 * @return int El nombre de clics d'usuaris i false en cas d'error
 */
function getSchoolIntranetStats_MonthUsers($school, $timestampofmonth) {

    if (!($con = connect_intranet($school))) {
        print '<br>No s\'ha pogut connectar a la base de dades de la intranet del centre ' . $school['dns'];
        return false;
    }

    // Construeix la data de referència. A la BBDD és un datetime (format: 1970-01-01 00:00:00)
    $regdate = date("Y-m-d H:i:s", $timestampofmonth);

    $sql = 'SELECT count(`pn_uid`) FROM ' . INTRANET_PREFIX . 'users where `pn_user_regdate` <= \'' . $regdate . '\'';

    if ($qry = mysql_query($sql, $con)) {
        if (mysql_num_rows($qry) == 0) {
            $value = 0;
        } else {
            $value = mysql_result($qry, 0, 0);
        }
    } else {
        $value = 0;
    }

    mysql_close($con);

    return $value;
}

/* MOODLE 1.9 */

/**
 * Obte les estadistiques d'un moodle 1.9 i les desa a la taula d'Agoraportal
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
        print 'No s\'ha pogut connectar a la base de dades del Moodle del centre ' . $school['dns'];
        return false;
    }

    if (!($statsCon = opendb())) {
        print 'No s\'ha pogut connectar a la base de dades de les estadístiques';
        exit();
    }

    // DAY STATS
    $hours = Array();
    $total = 0;
    for ($hour = 0; $hour < 24; $hour++) {
        $count = getSchoolMoodleStats_HourAccess($con, $year, $month, $day, $hour, MOODLE_PREFIX);
        if (empty($count)) {
            $count = 0;
        }
        $hours[$hour] = $count;
        $total += $count;
    }

    $date = $year . $month . $day;
    $diskConsume = getDiskConsume($statsCon, $school['code'], 'moodle');

    // Consulta que comprova si el registre del mes del centre ja existeix o no
    $sql = "SELECT date FROM " . STATS_PREFIX . "agoraportal_moodle_stats_day WHERE date=$date AND clientcode='" . $school['code'] . "'";

    if ($qry = mysql_query($sql, $statsCon)) {
        if (mysql_num_rows($qry) == 0) { //INSERT
            $sql = "INSERT INTO " . STATS_PREFIX . "agoraportal_moodle_stats_day
                (clientcode, date, clientDNS, total, h0, h1, h2, h3, h4, h5 ,h6, h7, h8, h9, h10, h11, h12,
                h13, h14, h15, h16, h17, h18, h19, h20, h21, h22, h23, diskConsume)
                VALUES ('" . $school['code'] . "', $date, '" . $school['dns'] . "', $total, $hours[0], $hours[1],$hours[2], $hours[3],
                $hours[4], $hours[5], $hours[6], $hours[7], $hours[8], $hours[9], $hours[10],
                $hours[11], $hours[12], $hours[13], $hours[14], $hours[15], $hours[16],
                $hours[17], $hours[18], $hours[19], $hours[20], $hours[21], $hours[22],
                $hours[23], '$diskConsume')";
        } else {    //UPDATE
            $sql = "UPDATE " . STATS_PREFIX . "agoraportal_moodle_stats_day SET
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
                diskConsume = '$diskConsume'
                WHERE clientcode = '" . $school['code'] . "' AND date = '$date'";
        }

        // Executa la consulta anterior
        if (!mysql_query($sql, $statsCon)) {
            print mysql_error() . '<br/>';
        }
    }

    echo "<p>$sql</p>";

    $users = getSchoolMoodleStats_Users($con);
    $lastaccess = getSchoolMoodleStats_LastAccess($con);


    // WEEK STATS
    if ($dayofweek == 7) {

        // Calculate the timestamp of the last second of the week we're getting the stats
        $timestampofweek = mktime(23, 59, 59, $month, $day, $year);

        $courses = getSchoolMoodleStats_Courses($con, $timestampofweek, MOODLE_PREFIX);
        $activities = getSchoolMoodleStats_Activities($con, $timestampofweek, MOODLE_PREFIX);
        $totalaccess = getSchoolMoodleStats_TotalWeekAccess($con, $year, $month, $day, MOODLE_PREFIX);

        $date = date('Ymd', (mktime(00, 00, 00, $month, $day, $year) - 518400)); // 518400 = 6 dies
        // Comprova si el registre ja existeix
        $sql = "SELECT date FROM " . STATS_PREFIX . "agoraportal_moodle_stats_week WHERE date='$date' AND clientcode='" . $school['code'] . "'";

        if ($qry = mysql_query($sql, $statsCon)) {
            if (mysql_num_rows($qry) == 0) // INSERT
                $sql = "INSERT INTO " . STATS_PREFIX . "agoraportal_moodle_stats_week
                            (clientcode, clientDNS, date, users, courses, activities, lastaccess, lastaccess_date, lastaccess_user, total_access)
                            VALUES ('" . $school['code'] . "', '" . $school['dns'] . "', '$date', '$users', '$courses', '$activities',
                                    '" . $lastaccess['lastaccess'] . "', '" . $lastaccess['lastaccessdate'] . "',
                                    '" . $lastaccess['lastaccessuser'] . "', '$totalaccess')";
            else  // UPDATE
                $sql = "UPDATE " . STATS_PREFIX . "agoraportal_moodle_stats_week SET
                            clientcode      = '" . $school['code'] . "',
                            users           = '$users',
                            courses         = '$courses',
                            activities      = '$activities',
                            lastaccess      = '" . $lastaccess['lastaccess'] . "',
                            lastaccess_date = '" . $lastaccess['lastaccessdate'] . "',
                            lastaccess_user = '" . $lastaccess['lastaccessuser'] . "',
                            total_access    = '$totalaccess'
                            WHERE clientcode = '" . $school['code'] . "' AND date = '$date'";
            // EXECUTE
            if (!mysql_query($sql, $statsCon))
                print mysql_error() . "<br/>";
        }

        echo '<p>' . $sql . '</p>';
    }


    // MONTH STATS
    $date = $year . $month;

    $courses = getSchoolMoodleStats_Courses($con, $timestampofmonth, MOODLE_PREFIX);
    $activities = getSchoolMoodleStats_Activities($con, $timestampofmonth, MOODLE_PREFIX);
    $totalaccess = getSchoolMoodleStats_TotalMonthAccess($con, $year, $month, $daysofmonth, MOODLE_PREFIX);

    $sql = "SELECT yearmonth FROM " . STATS_PREFIX . "agoraportal_moodle_stats_month WHERE yearmonth='$date' AND clientcode='" . $school['code'] . "'";

    if ($qry = mysql_query($sql, $statsCon)) {
        if (mysql_num_rows($qry) == 0) //INSERT
            $sql = "INSERT INTO " . STATS_PREFIX . "agoraportal_moodle_stats_month
                (clientcode, yearmonth, clientDNS, users, courses, activities, lastaccess, lastaccess_date,
                lastaccess_user, total_access, diskConsume)
                VALUES ('" . $school['code'] . "', $date, '" . $school['dns'] . "', $users, $courses, $activities,
                '" . $lastaccess['lastaccess'] . "', '" . $lastaccess['lastaccessdate'] . "',
                '" . $lastaccess['lastaccessuser'] . "', $totalaccess, '$diskConsume')";
        else    //UPDATE
            $sql = "UPDATE " . STATS_PREFIX . "agoraportal_moodle_stats_month SET
                users = $users,
                courses = $courses,
                activities = $activities,
                lastaccess = '" . $lastaccess['lastaccess'] . "',
                lastaccess_date = '" . $lastaccess['lastaccessdate'] . "',
                lastaccess_user = '" . $lastaccess['lastaccessuser'] . "',
                total_access = $totalaccess,
                diskConsume = '$diskConsume'
                WHERE clientcode = '" . $school['code'] . "' AND yearmonth = '$date'";
        //EXECUTE
        if (!mysql_query($sql, $statsCon))
            print mysql_error() . '<br/>';
    }

    echo '<p>' . $sql . '</p>';

    mysql_close($statsCon);
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

    $sql = 'SELECT count(ID) AS total FROM ' . $prefix . 'log WHERE time > ' . $min . ' AND time < ' . $max . ' ';
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

    $sql = 'SELECT count(ID) AS total FROM ' . $prefix . 'log WHERE time>' . $min . ' AND time<' . $max . ' ';
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

    $sql = 'SELECT count(ID) AS total FROM ' . $prefix . 'log WHERE time>' . $min . ' AND time<' . $max . ' ';
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
 * Obte el nombre d'usuaris no esborrats d'un moodle i els retorna
 *
 * @param con           Connexio a la base de dades
 *
 * @return int El nombre d'usuaris
 */
function getSchoolMoodleStats_Users($con) {

    $sql = 'SELECT count(ID) as users FROM ' . MOODLE_PREFIX . 'user WHERE confirmed=1 AND deleted=0';

    $stmt = oci_parse($con, $sql);
    $value = '';

    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $value = oci_result($stmt, 'USERS');
        }
    }
    if (empty($value)) {
        $value = 0;
    }

    return $value;
}

/**
 * Obte la data del darrer accés a un moodle i l'usuari que ha fet aquest
 * accés i els retorna
 *
 * @param con           Connexio a la base de dades
 *
 * @return array Les dades del darrer accés
 */
function getSchoolMoodleStats_LastAccess($con) {

    $sql = 'SELECT lastaccess, username FROM ' . MOODLE_PREFIX . 'user WHERE username!=\'xtecadmin\' AND username!=\'guest\' AND confirmed=1 AND deleted=0 ORDER BY lastaccess DESC ';
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

/**
 * Obte el nombre de cursos d'un moodle i el retorna
 *
 * @param con          Connexio a la base de dades
 * @param timestamp    Timestamp del moment en que es volen obtenir les estadistiques
 *
 * @return int El nombre de cursos
 */
function getSchoolMoodleStats_Courses($con, $timestamp, $prefix) {

    $sql = 'SELECT count(ID) as courses FROM ' . $prefix . 'course where timecreated < ' . $timestamp;
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

    $sql = 'SELECT to_char(substr(modinfo, 0, 50)) as modinfo FROM ' . $prefix . 'course where timecreated < ' . $timestamp;
    $stmt = oci_parse($con, $sql);

    if (oci_execute($stmt, OCI_DEFAULT)) {
        $value = 0;
        while (oci_fetch($stmt)) {
            $modinfo = oci_result($stmt, 'MODINFO');
            $activities_ar = explode(':', $modinfo, 3);
            if (sizeof($activities_ar) == 3) {
                $value += $activities_ar[1];
            }
        }
    }

    if (empty($value)) {
        $value = 0;
    }

    return $value;
}

/* MOODLE 2 */

/**
 * Obte les estadistiques d'un moodle 2 i les desa a la taula d'Agoraportal
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
function process_moodle2_stats($school, $year, $month, $day, $dayofweek, $daysofmonth, $timestampofmonth) {

    if (!($con = connect_moodle($school))) {
        print 'No s\'ha pogut connectar a la base de dades del Moodle 2 del centre ' . $school['dns'];
        return false;
    }

    if (!($statsCon = opendb())) {
        print 'No s\'ha pogut connectar a la base de dades de les estadístiques';
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
    $users = getSchoolMoodle2Stats_Users($con, $year, $month, $daysofmonth);
    $diskConsume = getDiskConsume($statsCon, $school['code'], 'moodle2');

    // Consulta que comprova si el registre del mes del centre ja existeix o no
    $sql = "SELECT date FROM " . STATS_PREFIX . "agoraportal_moodle2_stats_day WHERE date='$date' AND clientcode='" . $school['code'] . "'";
    if ($qry = mysql_query($sql, $statsCon)) {
        if (mysql_num_rows($qry) == 0) { //INSERT
            $sql = "INSERT INTO " . STATS_PREFIX . "agoraportal_moodle2_stats_day
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
        } else {    //UPDATE
            $sql = "UPDATE " . STATS_PREFIX . "agoraportal_moodle2_stats_day SET
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
        if (!mysql_query($sql, $statsCon)) {
            print mysql_error() . '<br/>';
        }
    }

    echo "<p>$sql</p>";

    $lastaccess = getSchoolMoodle2Stats_LastAccess($con);


    // WEEK STATS
    if ($dayofweek == 7) {

        // Calculate the timestamp of the last second of the week we're getting the stats
        $timestampofweek = mktime(23, 59, 59, $month, $day, $year);

        $courses = getSchoolMoodleStats_Courses($con, $timestampofweek, MOODLE2_PREFIX);
        $activities = getSchoolMoodleStats_Activities($con, $timestampofweek, MOODLE2_PREFIX);
        $totalaccess = getSchoolMoodleStats_TotalWeekAccess($con, $year, $month, $day, MOODLE2_PREFIX);

        $date = date('Ymd', (mktime(00, 00, 00, $month, $day, $year) - 518400)); // 518400 = 6 dies
        // Comprova si el registre ja existeix
        $sql = "SELECT date FROM " . STATS_PREFIX . "agoraportal_moodle2_stats_week WHERE date=$date AND clientcode='" . $school['code'] . "'";

        if ($qry = mysql_query($sql, $statsCon)) {
            if (mysql_num_rows($qry) == 0) // INSERT
                $sql = "INSERT INTO " . STATS_PREFIX . "agoraportal_moodle2_stats_week
                            (clientcode, clientDNS, date, usersactive, courses, activities, lastaccess, lastaccess_date, lastaccess_user, total_access)
                            VALUES ('" . $school['code'] . "', '" . $school['dns'] . "', '$date', 
                                    '" . $users['active'] . "', '$courses', '$activities',
                                    '" . $lastaccess['lastaccess'] . "', '" . $lastaccess['lastaccessdate'] . "',
                                    '" . $lastaccess['lastaccessuser'] . "', '$totalaccess')";
            else  // UPDATE
                $sql = "UPDATE " . STATS_PREFIX . "agoraportal_moodle2_stats_week SET
                            clientcode      = '" . $school['code'] . "',
                            usersactive     = '" . $users['active'] . "',
                            courses         = '$courses',
                            activities      = '$activities',
                            lastaccess      = '" . $lastaccess['lastaccess'] . "',
                            lastaccess_date = '" . $lastaccess['lastaccessdate'] . "',
                            lastaccess_user = '" . $lastaccess['lastaccessuser'] . "',
                            total_access    = '$totalaccess'
                            WHERE clientcode = '" . $school['code'] . "' AND date = '$date'";
            // EXECUTE
            if (!mysql_query($sql, $statsCon))
                print mysql_error() . "<br/>";
        }

        echo '<p>' . $sql . '</p>';
    }


    // MONTH STATS
    $date = $year . $month;

    $courses = getSchoolMoodleStats_Courses($con, $timestampofmonth, MOODLE2_PREFIX);
    $activities = getSchoolMoodleStats_Activities($con, $timestampofmonth, MOODLE2_PREFIX);
    $totalaccess = getSchoolMoodleStats_TotalMonthAccess($con, $year, $month, $daysofmonth, MOODLE2_PREFIX);

    $sql = "SELECT yearmonth FROM " . STATS_PREFIX . "agoraportal_moodle2_stats_month WHERE yearmonth=$date AND clientcode='" . $school['code'] . "'";

    if ($qry = mysql_query($sql, $statsCon)) {
        if (mysql_num_rows($qry) == 0) //INSERT
            $sql = "INSERT INTO " . STATS_PREFIX . "agoraportal_moodle2_stats_month
                (clientcode, yearmonth, clientDNS, usersactive, usersactivelast30days, 
                courses, activities, lastaccess, lastaccess_date,
                lastaccess_user, total_access, diskConsume)
                VALUES ('" . $school['code'] . "', $date, '" . $school['dns'] . "', 
                '" . $users['active'] . "', '" . $users['activelast30days'] . "', '$courses', '$activities',
                '" . $lastaccess['lastaccess'] . "', '" . $lastaccess['lastaccessdate'] . "',
                '" . $lastaccess['lastaccessuser'] . "', '$totalaccess', '$diskConsume')";
        else    //UPDATE
            $sql = "UPDATE " . STATS_PREFIX . "agoraportal_moodle2_stats_month SET
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
        //EXECUTE
        if (!mysql_query($sql, $statsCon))
            print mysql_error() . '<br/>';
    }

    echo '<p>' . $sql . '</p>';

    mysql_close($statsCon);
    oci_close($con);
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
function getSchoolMoodle2Stats_Users($con, $year, $month, $daysofmonth) {

    $now = mktime();
    $max = mktime(23, 59, 59, $month, $daysofmonth, $year);
    if ($now < $max) { // Protection against late executions
        $max = $now;
    }
    $min = $max - SECONDS_IN_90_DAYS;
    $users = array ('total' => 0, 'nodelsus' => 0, 'active' => 0, 'activelast90days' => 0, 'activelast30days' => 0);

    $sql = 'SELECT count(ID) as users FROM ' . MOODLE2_PREFIX . 'user';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['total'] = oci_result($stmt, 'USERS');
        }
    }
    
    $sql = 'SELECT count(ID) as users FROM ' . MOODLE2_PREFIX . 'user WHERE suspended=0 AND deleted=0';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['nodelsus'] = oci_result($stmt, 'USERS');
        }
    }
    
    $sql = 'SELECT count(ID) as users FROM ' . MOODLE2_PREFIX . 'user WHERE confirmed=1 AND suspended=0 AND deleted=0 AND firstaccess<>0';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['active'] = oci_result($stmt, 'USERS');
        }
    }
    
    $sql = 'SELECT count(ID) as users FROM ' . MOODLE2_PREFIX . 'user WHERE confirmed=1 AND suspended=0 AND deleted=0 AND firstaccess<>0 AND firstaccess between ' .$min.' and '.$max.' ';
    $stmt = oci_parse($con, $sql);
    if (oci_execute($stmt, OCI_DEFAULT)) {
        if (oci_fetch($stmt)) {
            $users['activelast90days'] = oci_result($stmt, 'USERS');
        }
    }
    
    $min = $max - SECONDS_IN_30_DAYS;
    $sql = 'SELECT count(ID) as users FROM ' . MOODLE2_PREFIX . 'user WHERE confirmed=1 AND suspended=0 AND deleted=0 AND firstaccess<>0 AND firstaccess between ' .$min.' and '.$max.' ';
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
function getSchoolMoodle2Stats_LastAccess($con) {

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


/**
 * Obté la quota utilitzada per un determinat servei
 * 
 * @param statsCon    Connexió a la base de dades d'estadístiques
 * @param clientCode
 * @param service     Valors possibles: 'intranet', 'moodle', 'moodle2'
 * 
 * @return string     La quota utilitzada en KB
 */
function getDiskConsume ($statsCon, $clientCode, $service) {

    // Set initial value
    $diskConsume = '0';
    
    $sql = 'SELECT cs.diskConsume
            FROM ' . STATS_PREFIX . 'agoraportal_client_services as cs
            LEFT JOIN ' . STATS_PREFIX . 'agoraportal_clients c ON cs.clientId = c.clientId
            LEFT JOIN ' . STATS_PREFIX . 'agoraportal_services s ON cs.serviceId = s.serviceId
            WHERE c.clientCode=\''.$clientCode.'\' AND s.serviceName=\''.$service.'\'';

    if (!$resul = mysql_query($sql, $statsCon)) {
        // En cas d'error, retorna 0
        return '0';
    }

	if ($arr_resul = mysql_fetch_array($resul)) {
        $diskConsume = $arr_resul['diskConsume'];
    }
    
    mysql_free_result($resul);

    return $diskConsume;
}




