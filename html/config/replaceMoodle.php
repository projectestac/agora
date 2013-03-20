<?php

$dns = (isset($_REQUEST['dns'])) ? $_REQUEST['dns'] : '';

if (empty($dns)) { // Show form
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Canvi d'URL als Moodles antics</title>
    </head>
    <body>
        <form action="replaceMoodle.php" method="post">
        Llista de noms propis separats per comes: <br />
        <textarea name="dns" rows="5" cols="80" placeholder="Exemple: usu1, usu2, usu3"></textarea><br />
        <input type="submit" />
        </form>
    </body>
    </html>    

<?php

} else { // Do the work
    
    require_once('env-config.php');
    require_once('dblib-mysql.php');
    
    $schools = explode(',', $dns);
    foreach ($schools as $school){
        $dns = trim($school);
        $oldURL = $agora['server']['server'] . $agora['server']['base'] . $dns . '/moodle/';
        $newURL = $agora['server']['server'] . $agora['server']['base'] . $dns . '/antic/';

        // Get service connection data ($dns is checked for security in getSchoolDBInfo)
        $school = getSchoolDBInfo($dns);
        if (is_array($school) && array_key_exists('id_moodle', $school)) {    
            replaceMoodle($dns, $school['id_moodle'], $school['database_moodle'], $oldURL, $newURL);
        } else {
            echo 'No s\'ha pogut fer el canvi d\'URL. Les causes possibles s&oacute;n: (1) 
                el centre especificat no existeix, (2) el centre no t&eacute; assignada cap 
                base de dades pel servei Moodle i (3) no s\'ha pogut connectar a la base
                de dades d\'administraci&oacute;.';
        }    
    }
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
