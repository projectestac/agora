<?php

function moodle_connect($version = '2') {

    global $CFG, $agora;

    if ($version == '1') {
        if (array_key_exists('user', $agora['moodle'])) {
                $dbuser = $agora['moodle']['user'];
                $dbpass = $agora['moodle']['userpwd'];
                $dbname = $agora['moodle']['dbname'];
        } else {
                $dbuser = $CFG->dbuser;
                $dbpass = $CFG->dbpass;
                $dbname = $CFG->dbname;
        }
    } elseif ($version == '2') {
        $dbuser = $CFG->dbuser;
        $dbpass = $CFG->dbpass;
        $dbname = $CFG->dbname;
    }

    $con = oci_pconnect($dbuser, $dbpass, $dbname);

    return $con;
}

/**
 * Close specified Moodle connection
 *
 * @param con The Moodle database connection
 * @return TRUE on success or FALSE on failure.
 */
function moodle_disconnect($con) {
    return oci_close($con);
}

/**
 * Replace $textOrig string to $new string at specified Moodle version
 * 
 * @param type $dns  schoold dns
 * @param type $school_id  schema identifier (X on usuX)
 * @param type $school_database database
 * @param type $textOrig old string to replace
 * @param type $textTarg new string
 * @return type Boolean
 */
function replaceMoodle($version, $prefix, $textOrig, $textTarg) {

    echo "Replacing '<strong>$textOrig</strong>' by '<strong>$textTarg</strong>'<br />";

    if (!($con = moodle_connect($version))) {
        echo 'No s\'ha pogut connectar a la base de dades del Moodle ' . $version;
        return false;
    }

    // Get all tables
    $sql = 'SELECT table_name FROM user_tables WHERE table_name like \'' . strtoupper($prefix) . '%\' ';
    $stmt = oci_parse($con, $sql);
    $tables = array();
    if (!oci_execute($stmt, OCI_DEFAULT))
        return false;
    while (oci_fetch($stmt)) {
        $tables[] = oci_result($stmt, 'TABLE_NAME');
    }

    // Get all columns
    foreach ($tables as $table) {
        echo '<br>Replacing ' . $table . '...';
        $sql = 'SELECT column_name, data_type FROM user_tab_columns WHERE table_name = \'' . $table . '\' ';
        $stmt = oci_parse($con, $sql);
        $columns = array();
        if (!oci_execute($stmt, OCI_DEFAULT))
            return false;
        while (oci_fetch($stmt)) {
            $columns[] = array('column_name' => oci_result($stmt, 'COLUMN_NAME'),
                'data_type' => oci_result($stmt, 'DATA_TYPE')
            );
        }

        // Replace only CLOB and VARCHAR
        foreach ($columns as $column) {
            if ($column['data_type'] == 'CLOB' || $column['data_type'] == 'VARCHAR2') {
                $sql = 'UPDATE ' . $table . ' SET ' . $column['column_name'] . ' = replace(' . $column['column_name'] . ', \'' . $textOrig . '\', \'' . $textTarg . '\') WHERE ' . $column['column_name'] . ' LIKE \'%' . $textOrig . '%\' ';
                $stmt = oci_parse($con, $sql);
                $columns = array();
                if (!oci_execute($stmt, OCI_DEFAULT)) {
                    $e = oci_error($stmt);
                    echo '<br />&nbsp;&nbsp;&nbsp;<strong style="color:red">ERROR</strong>: ' . $e['message'];
                    continue;
                }
            }
        }
    }

    // Commit the changes
    $r = oci_commit($con);
    if (!$r) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }

    moodle_disconnect($con);

    return true;
}
