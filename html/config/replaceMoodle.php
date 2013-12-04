<?php

require_once('env-config.php');

$dns = (isset($_REQUEST['dns'])) ? $_REQUEST['dns'] : '';
$version = (isset($_REQUEST['version'])) ? $_REQUEST['version'] : '1';
$textOrig = (isset($_REQUEST['textorig'])) ? $_REQUEST['textorig'] : $agora['server']['server'] . $agora['server']['base'] . '$nomcentre/moodle/';
$textTarg = (isset($_REQUEST['texttarg'])) ? $_REQUEST['texttarg'] : $agora['server']['server'] . $agora['server']['base'] . '$nomcentre/antic/';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Canvi d'URL al Moodle</title>
    <meta charset="UTF-8" />
</head>
<body style="padding:5px 25px 5px 25px;">
    <h1 style="text-align:center;">Canvi d'URL al Moodle</h1>
    
<?php
if (empty($dns)) { // Show form
?>
        <form action="replaceMoodle.php" method="post">
        Llista de noms propis separats per comes: <br />
        <textarea name="dns" rows="5" cols="80" placeholder="Exemple: usu1, usu2, usu3"></textarea>
        <br /><br />
        Text origen (el que s'ha de canviar): 
        <input type="text" name="textorig" value="<?php echo $textOrig ?>" size="50" />
        <br />
        Text destí (el nou valor)
        <input type="text" name="texttarg" value="<?php echo $textTarg ?>" size="50" />
        <br />
        <div style="font-weight:bold; margin: 10px 30px 10px 30px;">
            ATENCIÓ: <em>$nomcentre</em> és un text variable que serà substituït 
            pel nom propi del centre. Això permet canviar un URL personalitzat a 
            molts centres simultàniament.
        </div>
        <br />
        <input type="radio" name="version" value="1" checked="checked" />Executa al Moodle 1.9
        <br />
        <input type="radio" name="version" value="2" />Executa al Moodle 2
        <br /><br />
        <input type="submit" />
        </form>

<?php
} else { // Do the work
    require_once('dblib-mysql.php');

    $dns_array = explode(',', $dns);
    $prefix = ($version == '1') ? $agora['moodle']['prefix'] : $agora['moodle2']['prefix'];

    foreach ($dns_array as $dns) {
        // Get service connection data ($dns is checked for security in getSchoolDBInfo)
        $dns = trim($dns);
        $school = getSchoolDBInfo($dns);

        $oldText = str_replace('$nomcentre', $dns, $textOrig);
        $newText = str_replace('$nomcentre', $dns, $textTarg);

        if (is_array($school) && (array_key_exists('id_moodle', $school) || array_key_exists('id_moodle2', $school))) {
            
            $result = replaceMoodle($dns, $school['id_moodle2'], $school['database_moodle2'], $prefix, $oldText, $newText);
            
            if ($result) {
                echo "<div style=\"font-weight:bold;\">S'ha executat correctament el canvi de text al centre $dns</div>";
            } else {
                echo "<div style=\"font-weight:bold; color:red;\">El canvi de text no ha finalitzat correctament al centre $dns</div>";
            }

        } else {
            echo '<div>No s\'ha pogut fer el canvi d\'URL. Les causes possibles 
                són: (1) el centre especificat no existeix, (2) el centre no té
                assignada cap base de dades pels serveis Moodle o Moodle 2 i (3)
                no s\'ha pogut connectar a la base de dades d\'administració.</div>';
        }
    }
}
?>

</body>
</html>    

<?php
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
function replaceMoodle($dns, $school_id, $school_database, $prefix, $old, $new){

    global $agora;
    
    print_r('<br /><br />########### <strong>'.$dns.':</strong> Replacing \'<strong>'.$old.'</strong>\' by \'<strong>'.$new.'</strong>\'');
    $school = array();
    $school['id'] = $school_id;
    $school['database'] = $school_database;
    
    if (!($con = connect_moodle($school))) {
        print 'No s\'ha pogut connectar a la base de dades del Moodle del centre ' . $dns;
        return false;
    }

    // Get all tables
    $sql = 'SELECT table_name FROM user_tables WHERE table_name like \''.strtoupper($prefix).'%\' ';
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
                    echo '<br />&nbsp;&nbsp;&nbsp;<strong style="color:red">ERROR</strong>: '.$e['message'];
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
