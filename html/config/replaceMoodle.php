<?php

/**
 * Steps to execute this script:
 * 1. Change the env-config.php with the correct environment information
 * 2. Review manualReplace or multiReplace function, with the string to replace 
 * and the connection data
 * 3. Add a call to manualReplace or multiReplace
 * 
 */

include_once('env-config.php');
include_once('dblib-mysql.php');

/**
 * Uncomment some of this calls to execute the replacing function (Step 3).
 */
//multiReplace();
//manualReplace();

/**
 * Update all specified schools from array of dns
 */
function multiReplace(){
$schools = array('usu1', 'usux', 'usu2');
    foreach ($schools as $school){
        $dns = $school;
        $oldURL = $agora['server']['server'].$agora['server']['base'].$dns.'/moodle/';
        $newURL = $agora['server']['server'].$agora['server']['base'].$dns.'/antic/';
        // Get data connection
        $school = getSchoolDBInfo($dns);
        if (array_key_exists('id_moodle', $school)){    
            replaceMoodle($dns, $school['id_moodle'], $school['database_moodle'], $oldURL, $newURL);
        } else{
            print_r('<br>El centre especificat ('.$dns.') no t&eacute; assignada cap base de dades pel servei Moodle');
        }    
    }
}

/**
 * Replace only specified school
 */
function manualReplace(){
    $school_dns = 'eoi2';
    $school_id = 2;
    $school_database = 'EOIMOODL';
    
    $oldURL = 'http://agora-eoi.xtec.cat/'.$school_dns.'/moodle/';
    $newURL = 'http://agora-eoi.xtec.cat/'.$school_dns.'/antic/';

    replaceMoodle($school_dns, $school_id, $school_database, $oldURL, $newURL);    
}

/**
 * Replace $old string to $new string at specified school with 'school_id' and 'database'
 * 
 * @param type $dns  schoold dns
 * @param type $school_id  schema identifier (X on usuX)
 * @param type $school_database database
 * @param type $old old string to replace
 * @param type $new new string
 * @return type Boolean
 */
function replaceMoodle($dns, $school_id, $school_database, $old, $new){
    global $agora;
    
    print_r('<br><br>################ <b>'.$dns.'</b> Replacing \''.$old.'\' by \''.$new.'\'');
    $school = array();
    $school['id'] = $school_id;
    $school['database'] = $school_database;
    
    if (!($con = connect_moodle($school))) {
        print 'No s\'ha pogut connectar a la base de dades del Moodle del centre ' . $dns;
        return false;
    }

    // Get all tables
    $sql = 'SELECT table_name FROM user_tables WHERE table_name like \''.strtoupper($agora['moodle']['prefix']).'%\' ';
    $stmt = oci_parse($con, $sql);
    $tables = array();
    if(!oci_execute($stmt, OCI_DEFAULT)) return false;
    while (oci_fetch($stmt)) {
        $tables[]=oci_result($stmt, 'TABLE_NAME');
    }

    // Get all columns
    foreach ($tables as $table){
        print_r('<br>Replacing '.$table.'...');
        $sql = 'SELECT column_name, data_type FROM user_tab_columns WHERE table_name = \''.$table.'\' ';
        $stmt = oci_parse($con, $sql);
        $columns = array();
        if(!oci_execute($stmt, OCI_DEFAULT)) return false;
        while (oci_fetch($stmt)) {
            $columns[]=array('column_name' => oci_result($stmt, 'COLUMN_NAME'),
                             'data_type'   => oci_result($stmt, 'DATA_TYPE')
                );
        }

        // Replace only CLOB and VARCHAR
        foreach ($columns as $column){
            if ($column['data_type'] == 'CLOB' || $column['data_type'] == 'VARCHAR2'){
                //print_r('&nbsp;&nbsp;<br>Updating '.$column['column_name'].'...');
                $sql = 'UPDATE '.$table.' SET '.$column['column_name'].' = replace('.$column['column_name'].', \''.$old.'\', \''.$new.'\') WHERE '.$column['column_name'].' LIKE \'%'.$old.'%\' ';
                $stmt = oci_parse($con, $sql);
                $columns = array();
                if(!oci_execute($stmt, OCI_DEFAULT)) {
                    $e = oci_error($stmt); 
                    echo '<br/>&nbsp;&nbsp;&nbsp;<b style="color:red">ERROR</b>: '.$e['message'];
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

    oci_close($con); 
    return true;
}
