<?php

require_once 'config/env-config.php';
require_once 'config/dblib-mysql.php';

global $agora, $state, $preparedStmts;

// Check if works.php is polled by BigIP because behavior will change
$origen = $_GET['origen'] ?? '';
$isBigIP = ($origen == 'bigip') ? true : false;

$state = '';
$nodeok = false;
$nodesToTest = [];
$m2ToTest = [];
$preparedStmts = [];

if ($isBigIP) {
    // Get info from allSchools.php file in web server
    $allschools_file = $agora['dbsource']['dir'] . '/allSchools.php';

    if (!file_exists($allschools_file)) {
        echo 'KO: El fitxer ' . $allschools_file . ' no existeix';
    }

    require_once($allschools_file);

    foreach ($schools as $school) {
        if (isset($school['dbhost_nodes']) && !in_array($school['dbhost_nodes'], $nodesToTest)) {
            $nodesToTest[$school['id_nodes']] = $school['dbhost_nodes'];
        }
        if (isset($school['dbhost_moodle2']) && !in_array(strtoupper($school['dbhost_moodle2']), $m2ToTest)) {
            $m2ToTest[$school['id_moodle2']] = strtoupper($school['dbhost_moodle2']);
        }
    }
} else {
    // Get info from admin database
    $isok = checkAdminDatabase(); // Check connection
    if (!$isok) {
        $state = '<br>La connexió a la base de dades d\'administració ha fallat (MySQL - ' . $agora['admin']['host'] . '). <span style="color:red">No es pot comprovar si les instàncies Oracle i els servidors MySQL funcionen correctament.</span>';
    } else {
        // Get the list of the schools to test
        // Get one nodes per MySQL server and one moodle per Oracle instance to check connection to each one
        $nodesToTest = getServicesToTest('nodes');
        $m2ToTest = getServicesToTest('moodle2');

        if (empty($nodesToTest) && empty($m2ToTest)) {
            $isok = false;
            $state .= '<br>La consulta a la base de dades d\'administració ha fallat (MySQL - ' . $agora['admin']['host'] . '). <span style="color:red">No es pot comprovar si les instàncies Oracle i els servidors MySQL funcionen correctament.</span>';
        }
    }

    // Check File system for portal
    $dirToCheck = $agora['server']['root'] . $agora['admin']['datadir'] . 'data/';
    if (!is_writable($dirToCheck)) {
        $isok = false;
        $state .= "<br>El directori de dades del <strong>portal</strong> ($dirToCheck), o bé no està muntat o bé no té permís d'escriptura.<br>";
    }
}

// Connect to the first school of each server with nodes service to check that the MySQL servers are working
foreach ($nodesToTest as $schoolid => $dbhost) {
    if (!checkNodesDatabase(array('id' => $schoolid, 'dbhost' => $dbhost))) {
        $isok = false;
        $state .= '<br>El servidor MySQL "' . $dbhost . '" no funciona correctament.<br>';
    } elseif ($isBigIP) {
        $nodeok = true;
        break;
    }

    // Check File systems for Nodes
    $dirToCheck = $agora['server']['root'] . $agora['nodes']['datadir'] . $agora['nodes']['userprefix'] . $schoolid . '/';
    if (!is_writable($dirToCheck)) {
        $isok = false;
        $state .= "<br>El directori de dades de <strong>Nodes</strong> ($dirToCheck), o bé no està muntat o bé no té permís d'escriptura.<br>";
    }
}

if (($isBigIP && !$nodeok) || (!$isBigIP)) {
    // Connect to the first school of each database instance to check that the Oracle databases (for Moodle) are working
    foreach ($m2ToTest as $schoolid => $database) {
        if (!checkMoodleDatabase(array('id' => $schoolid, 'dbhost' => $database))) {
            $isok = false;
            $state .= '<br>La instància Oracle "' . $database . '" no funciona correctament.<br>';
        } elseif ($isBigIP) {
            $nodeok = true;
            break;
        }

        // Check File systems for Moodle
        $dirToCheck = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle2']['userprefix'] . $schoolid . '/';
        // $dirToCheck = $agora['server']['root'] . get_filepath_moodle($schoolid) . '/';
        if (!is_writable($dirToCheck)) {
            $isok = false;
            $state .= "<br>El directori de dades de <strong>Moodle</strong> ($dirToCheck), o bé no està muntat o bé no té permís d'escriptura.<br>";
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
 * @return Boolean True if the database is working; false otherwise.
 * @author Sara Arjona Tellez (sarjona@xtec.cat)
 *
 */
function checkAdminDatabase()
{
    try {
        $con = get_dbconnection('admin');
        if ($con) {
            $con->close();
        }
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }

    return false;
}

/**
 * To check if the specified Moodle database is working
 *
 * @param $school database school information for connecting
 *
 * @return Boolean True if the database is working; false otherwise.
 * @author Sara Arjona Tellez (sarjona@xtec.cat)
 * @author Toni Ginard
 *
 */
function checkMoodleDatabase($school)
{
    global $agora, $state, $preparedStmts;
    $isok = false;

    $con = connect_moodle($school);

    // If connection was established successfully, check access to tables
    if ($con) {

        if (!in_array('check_moodle', $preparedStmts)) {
            $query = 'SELECT count(*) AS total FROM ' . $agora['moodle2']['prefix'] . 'course WHERE category = 0';
            if (pg_prepare($con, 'check_moodle', $query)) {
                array_push($preparedStmts, 'check_moodle');
            }
        }

        $result = pg_execute($con, 'check_moodle', []);

        if ($result === false) {
            $state .= '<br />No s\'ha pogut accedir a la taula ' . $agora['moodle2']['prefix'] . 'course de l\'usuari ' . $agora['moodle2']['userprefix'] . $school['id'] . '.';
        }

        $value = (int)pg_fetch_assoc($result)['total'];

        if ($value > 0) {
            $isok = true;
        } else {
            $state .= '<br />No s\'han trobat registres a la taula ' . $agora['moodle2']['prefix'] . 'course de l\'usuari ' . $agora['moodle2']['userprefix'] . $school['id'] . '.';
        }

        disconnect_moodle($con);
    }

    return $isok;
}

/**
 * To check if the specified Nodes database is working
 *
 * @param $school database school information for connecting
 *
 * @return Boolean True if the database is working; false otherwise.
 * @author Sara Arjona Tellez (sarjona@xtec.cat)
 * @author Toni Ginard
 *
 */
function checkNodesDatabase($school)
{
    global $agora, $state;
    $isok = false;

    $con = connect_nodes($school);

    if ($con) {
        $sql = 'SELECT `option_value` FROM `' . $agora['nodes']['prefix'] . '_options` LIMIT 0, 1';

        $pid = $con->get_field($sql, 'option_value');
        if (!empty($pid)) {
            $isok = true;
        } else {
            $state .= '<br>No s\'ha pogut accedir a la taula options de la base de dades ' . $agora['nodes']['userprefix'] . $school['id'] . '.';
            $state .= '<br>' . $con->get_error();
        }

        $con->close();
    } else {
        $state .= '<br>No s\'ha pogut connectar a la base de dades ' . $agora['nodes']['userprefix'] . $school['id'] . '.';
    }

    return $isok;
}
