<?php

require_once 'config/env-config.php';
require_once 'config/dblib-mysql.php';

global $agora, $state;

$state = '';
$nodeok = false;

// Check if works.php is polled by BigIP because behavior will change
$origen = (isset($_GET['origen'])) ? $_GET['origen'] : '';
$isBigIP = ($origen == 'bigip') ? true : false;

// Get the list of DB arrays to connect
$zkToTest = array();
$m2ToTest = array();

if ($isBigIP) {
    // Get info from allSchools.php file in web server
    require_once '../syncdata/allSchools.php';
    foreach ($schools as $school) {
        if (isset($school['dbhost_intranet']) && !in_array($school['dbhost_intranet'], $zkToTest)) {
            $zkToTest[$school['id_intranet']] = array('dbhost' => $school['dbhost_intranet'], 'zkversion' => $school['version_intranet']);
        }
        if (isset($school['database_moodle']) && !in_array(strtoupper($school['database_moodle']), $m2ToTest)) {
            $m2ToTest[$school['id_moodle']] = strtoupper($school['database_moodle']);
        }
    }
} else {
    // Get info from admin database
    $isok = checkAdminDatabase(); // Check connection
    if (!$isok) {
        $state = '<br>La connexi&oacute; a la base de dades d\'administraci&oacute; ha fallat (MySQL - ' . $agora['admin']['host'] . '). <span style="color:red">No es pot comprovar si les inst&agrave;ncies Oracle i els servidors MySQL funcionen correctament.</span>';
    }

    // Get the list of the schools to test
    if ($isok) {
        // Get one intranet per MySQL server and one moodle per Oracle instance to check connection to each one
        $zkToTest = getServicesToTest('intranet');
        $m2ToTest = getServicesToTest('moodle2');

        if (empty($zkToTest) && empty($m2ToTest)) {
            $isok = false;
            $state .= '<br>La consulta a la base de dades d\'administraci&oacute; ha fallat (MySQL - ' . $agora['admin']['host'] . '). <span style="color:red">No es pot comprovar si les inst&agrave;ncies Oracle i els servidors MySQL funcionen correctament.</span>';
        }
    }
}

// Connect to the first school of each server with intranet service to check that the MySQL servers are working
foreach ($zkToTest as $schoolid => $data) {
    if (!checkIntranetDatabase(array('id' => $schoolid, 'dbhost' => $data['dbhost'], 'zkversion' => $data['zkversion']))) {
        $isok = false;
        $state .= '<br>El servidor MySQL "' . $data['dbhost'] . '" no funciona correctament.<br>';
    } elseif ($isBigIP) {
        $nodeok = true;
        break;
    }
}

if (($isBigIP && !$nodeok) || (!$isBigIP)) {
    // Connect to the first school of each database instance to check that the Oracle databases (for Moodle) are working
    foreach ($m2ToTest as $schoolid => $database) {
        if (!checkMoodleDatabase(array('id' => $schoolid, 'database' => $database))) {
            $isok = false;
            $state .= '<br>La inst&agrave;ncia Oracle "' . $database . '" no funciona correctament.<br>';
        } elseif ($isBigIP) {
            $nodeok = true;
            break;
        }
    }
}

// Report status
if (!$isBigIP && $isok) {
    echo 'Aplicacio:OK';
} else {
    // Admin database is not ok, but result might not be an error
    if ($isBigIP && $nodeok) {
        echo 'Node:OK';
    }
    echo $state;
}

/**
 * To check if the admin database is working 
 * 
 * @author Sara Arjona Tellez (sarjona@xtec.cat)
 * 
 * @return Boolean True if the database is working; false otherwise.
 */
function checkAdminDatabase() {
    $con = opendb();
    if ($con) {
        disconnectdb($con);
        return true;
    } else {
        return false;
    }
}

/**
 * To check if the specified Moodle database is working 
 * 
 * @author Sara Arjona Tellez (sarjona@xtec.cat)
 * @author Toni Ginard
 * 
 * @param $school database school information for connecting
 * 
 * @return Boolean True if the database is working; false otherwise.
 */
function checkMoodleDatabase($school) {
    global $agora, $state;
    $isok = false;

    $con = connect_moodle($school);

    // If connection was established successfully, check access to tables
    if ($con) {
        $sql = 'SELECT count(*) FROM ' . $agora['moodle2']['prefix'] . 'course WHERE category = 0';

        $stmt = oci_parse($con, $sql);

        if (!oci_execute($stmt, OCI_DEFAULT)) {
            return false;
        }

        while (oci_fetch($stmt)) {
            $result = oci_result($stmt, 1);
            if (is_numeric($result) && $result > 0) {
                $isok = true;
            } else {
                $state .= '<br>No s\'ha pogut accedir a la taula ' . $agora['moodle2']['prefix'] . 'course de l\'usuari ' . $agora['moodle2']['userprefix'] . $school['id'] . '.';
            }
        }

        disconnect_moodle($con);
    } else {
        $state .= '<br>No s\'ha pogut connectar a la inst&agrave;ncia ' . $school['database'] . ' (usuari ' . $agora['moodle2']['userprefix'] . $school['id'] . ')';
    }

    return $isok;
}

/**
 * To check if the specified Intranet database is working 
 * 
 * @author Sara Arjona Tellez (sarjona@xtec.cat)
 * @author Toni Ginard
 * 
 * @param $school database school information for connecting
 * 
 * @return Boolean True if the database is working; false otherwise.
 */
function checkIntranetDatabase($school) {
    global $agora, $state;
    $isok = false;

    $con = connect_intranet($school);

    if ($con) {
        if ($school['zkversion'] == '128') {
            $sql = 'SELECT `pn_pid` as pid FROM `' . $agora['intranet']['prefix'] . '_group_perms` LIMIT 0, 1';
        } else {
            $sql = 'SELECT `pid` FROM `group_perms` LIMIT 0, 1';
        }

        if (!$result = mysql_query($sql)) {
            $state .= '<br>S\'ha produ&iuml;t un error MySQL: ' . mysql_error();
            return false;
        }

        if ($row = mysql_fetch_assoc($result)) {
            $pid = $row['pid'];
            if (!empty($pid)) {
                $isok = true;
            } else {
                $state .= '<br>No s\'ha pogut accedir a la taula group_perms de la base de dades ' . $agora['intranet']['userprefix'] . $school['id'] . '.';
            }
        }

        disconnect_intranet($con);
    } else {
        $state .= '<br>No s\'ha pogut connectar a la bases de dades ' . $agora['intranet']['userprefix'] . $school['id'] . '.';
    }

    return $isok;
}
