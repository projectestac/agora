<?php session_start();

// @aginard: this file is an stand-alone script to fix charset problems in MySQL
// tables. Must be removed when all databases are fixed.

global $ZConfig, $agora;
require_once 'config/config.php';

// In production put all logs together
if ($agora['server']['enviroment'] == 'PRO') {
    $logfile = $agora['server']['root'] . $agora['intranet']['datadir'] . '/' . $ZConfig['Multisites']['siteFilesFolder'] . '/upgrade-charset.txt';
} else {
    $logfile = $ZConfig['Multisites']['filesRealPath'] . '/' . $ZConfig['Multisites']['siteFilesFolder'] . '/upgrade-charset.txt';
}

$dbname = $ZConfig['DBInfo']['databases']['default']['dbname'];
$f = fopen($logfile, "a") or die('Error en obrir el fitxer de text.');
$nodebug = (isset($_REQUEST['nodebug'])) ? true : false;
$pass = (isset($_REQUEST['pass'])) ? $_REQUEST['pass'] : false;

// Security check
if ($pass) {
    $pass = md5($pass);
    $_SESSION['loggedin'] = ($pass == $agora['config']['xtecadmin']) ? true : false;
}

// Not logged, so show login form
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] === false)) {
    show_login_form();
    exit(0);
}

// Use buffering in order to show text as soon as it is available
if (ob_get_level() == 0) {
    ob_start();
}

if ($nodebug === false) {
    echo '<div style="font-weight:bold;">Debug mode</div>';
}

fwrite($f, "===============\n");
fwrite($f, date('c', time()) . ' - Correcció de la codificació de la base de dades de la intranet: ' . $ZConfig['DBInfo']['databases']['default']['dbname'] . "\n\n");

if (!$con = connectdb()) {
    fwrite($f, 'connection failed' . "\n");
}

require_once('Encoding.php');

// Set database charset to UTF-8
$sql = "ALTER DATABASE $dbname DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
if ($nodebug) {
    mysql_query($sql, $con);
} else {
    echo $sql . '<br>';
}

// Get all tables
$sql = "SHOW TABLES";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
}

while ($taula = mysql_fetch_array($result, MYSQL_NUM)) {
    // Tables to skip
    if ($taula[0] == 'zk_IWstats' || $taula[0] == 'IWstats' ||
            $taula[0] == 'zk_IWstats_summary' || $taula[0] == 'IWstats_summary' ||
            $taula[0] == 'zk_counter' || $taula[0] == 'zk_stats_date' ||
            $taula[0] == 'zk_categories_mapobj' || $taula[0] == 'categories_mapobj' ||
            $taula[0] == 'zk_session_info' || $taula[0] == 'session_info') {
        continue;
    }

    // Get all columns
    $sql = 'SHOW COLUMNS FROM ' . $taula[0];
    if (!$result1 = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    }
    $columns = array();
    while ($rscolumn = mysql_fetch_array($result1, MYSQL_NUM)) {
        $columns[] = array('column_name' => $rscolumn[0],
            'data_type' => $rscolumn[1],
        );
    }

    // Replace only text and varchar
    $toFix = false;
    $columnsToFix = array();
    foreach ($columns as $column) {
        if (strpos($column['data_type'], "varchar") !== false || strpos($column['data_type'], "text") !== false) {
            $toFix = true;
            $columnsToFix[] = $column['column_name'];
        }
    }

    if ($toFix) {
        $sql = 'SELECT * FROM ' . $taula[0];
        if (!$result2 = mysql_query($sql, $con)) {
            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        }

        while ($registres = mysql_fetch_array($result2, MYSQL_ASSOC)) {
            foreach ($registres as $key => $registre) {
                if (in_array($key, $columnsToFix)) {
                    if (preg_match('/^a:\d+:{.*?}$/', $registre) && !is_serialized($registre)) {
                        $registreUTF = Encoding::fixUTF8($registre);
                        $matches = '';
                        $matchesSubString = '';
                        $offset = 0;
                        while (preg_match('/s:\d+:"(\w*\s*)*"/iu', $registreUTF, $matches, PREG_OFFSET_CAPTURE, $offset)) {
                            $offset = $matches[0][1] + 1;
                            preg_match('/"(\w*\s*)*"/iu', $matches[0][0], $matchesSubString, PREG_OFFSET_CAPTURE, 1);
                            $newString = 's:' . (mb_strlen(Encoding::toLatin1($matchesSubString[0][0])) - 2) . ':' . Encoding::toUTF8($matchesSubString[0][0]);
                            $newRegister = explode($matches[0][0], $registreUTF);
                            $registreUTF = implode($newString, $newRegister);
                        }
                    } else {
                        $registreUTF = Encoding::fixUTF8($registre);
                    }
                    $sql = "UPDATE " . $taula[0] . " SET $key  = '" . addslashes($registreUTF) . "' WHERE $key = '" . addslashes($registre) . "'";
                    if ($nodebug) {
                        mysql_query($sql, $con);
                    } else {
                        echo $sql . '<br>';
                    }
                }
            }
        }

        $sql = 'ALTER TABLE ' . $taula[0] . ' CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;';
        if ($nodebug) {
            mysql_query($sql, $con);
        } else {
            echo $sql . '<br>';
        }
        echo "Taula <strong>$taula[0]</strong> completada!<br />";
        flush();
        ob_flush();
    }
}

echo "Operation completed successfully!";
ob_end_flush();


function connectdb() {

    global $ZConfig;

    if (!$con = mysql_connect($ZConfig['DBInfo']['databases']['default']['hostmigrate'] . ':' . $ZConfig['DBInfo']['databases']['default']['portmigrate'], 
                              $ZConfig['DBInfo']['databases']['default']['user'], 
                              $ZConfig['DBInfo']['databases']['default']['password'])) {
        return false;
    }

    mysql_set_charset('utf8', $con);

    if (!mysql_select_db($ZConfig['DBInfo']['databases']['default']['dbname'], $con)) {
        echo "No s'ha pogut connectar a la base de dades";
        return false;
    }

    return $con;
}

// checks if a value is serialized
function is_serialized($data) {
    $data_unserialized = @unserialize($data);
    if ($data === 'b:0;' || $data_unserialized !== false) {
        return true;
    } else {
        return false;
    }
}

// Shows login form
function show_login_form() {
    echo '<form action="fix.php" method="post">' . "\n";
    echo '<div>Contrasenya d\'administraci&oacute;: <input id="pass" type="password" name="pass" size="25" maxlength="40" /></div>' . "\n";
    echo '<input type="submit" value="Entra" />' . "\n";
    echo '</form>';
}
