<?php

/**
 * Open a connection to the administration database
 *
 * @return Connection handler
 */
global $ZConfig;

function opendb() {
    require_once('config/config.php');
    if (!$con = mysql_connect($ZConfig['DBInfo']['databases']['default']['host'] . ':' . '80', $ZConfig['DBInfo']['databases']['default']['user'], $ZConfig['DBInfo']['databases']['default']['password']))
        return false;
    if (!mysql_select_db($ZConfig['DBInfo']['databases']['default']['dbname'], $con))
        return false;
    return $con;
}

if (!$con = opendb())
    die('connection failed');

$commands = array();
$prefix = 'zk';

//******* esborrem taules no necessàries
$tables = array($prefix . '_' . 'iw_chat_msg',
    $prefix . '_' . 'iw_chat_rooms',
    $prefix . '_' . 'iw_moodle',
    $prefix . '_' . 'stats_date',
    $prefix . '_' . 'stats_hour',
    $prefix . '_' . 'stats_month',
    $prefix . '_' . 'stats_week',
    $prefix . '_' . 'iw_noteboard_public',
    $prefix . '_' . 'iw_users_aux',
    $prefix . '_' . 'iw_users_import',
    $prefix . '_' . 'referer',
);

foreach ($tables as $table) {
    $sql = "DROP TABLE $table";
    if (!$result = mysql_query($sql, $con)) {
        // die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
}

//******* buidem taules la informació de les quals no es necessita
$tables = array($prefix . '_' . 'IWstats',
);

foreach ($tables as $table) {
    $sql = "TRUNCATE TABLE $table";
    if (!$result = mysql_query($sql, $con)) {
        // die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
}

//******* esborrar mòduls de la taula modules
$modulesToDelete = array('iw_groups',
    'iw_chat',
    'iw_timeFrames',
    'iw_moodle',
    'Referers',
    'Stats',
    'Sniffer',
    'Tour',
    'bbcode',
    'bbsmile',
    'advMailer',
    'dpCaptcha',
);

foreach ($modulesToDelete as $module) {
    $sql = "DELETE FROM {$prefix}_modules WHERE pn_name='" . $module . "'";
    if (!$result = mysql_query($sql, $con)) {
        // die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
}

// eliminem el prefix de totes les taules i substituim les cadenes iw_ per IW
$sql = "show tables";

if (!$result = mysql_query($sql, $con)) {
    die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
}

while ($fila = mysql_fetch_array($result, MYSQL_NUM)) {
    $newname = str_replace($prefix . '_', '', $fila[0]);
    $newname = str_replace('iw_', 'IW', $newname);
    $newname = str_replace('_def', '_definition', $newname);

    if ($newname != $fila[0]) {
        $commands[] = "RENAME TABLE " . $fila[0] . " TO " . $newname;
    }

    $sql = 'SHOW COLUMNS FROM ' . $fila[0];
    if (!$result1 = mysql_query($sql, $con)) {
        die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
    $columns = array();
    while ($fila1 = mysql_fetch_array($result1, MYSQL_NUM)) {
        $columns[] = array('column_name' => $fila1[0],
            'data_type' => $fila1[1],
        );
    }

    // Replace only text and varchar
    foreach ($columns as $column) {
        if (strpos($column['data_type'], "varchar") !== false || $column['data_type'] == "text" || $column['data_type'] == "longtext") {
            // prevent serialized fields
            $sql = "select $column[column_name] from $fila[0] where $column[column_name] like '%iw_%'";
            if (!$result2 = mysql_query($sql, $con)) {
                die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
            }
            $value = mysql_fetch_row($result2);
            if ($value != '') {
                if (is_serialized($value[0])) {
                    $array = unserialize($value[0]);
                    $newArray = rec_array_replace('iw_', 'IW', $array);
                    if ($column['column_name'] == 'pn_content' && $column['data_type'] == "longtext") {
                        $newArray = rec_array_replace('[', 'index.php?module=', $newArray);
                        $newArray = rec_array_replace(']', '', $newArray);
                    }
                    $arraySerialized = serialize($newArray);
                    $sql = 'UPDATE ' . $fila[0] . ' SET ' . $column['column_name'] . ' = \'' . mysql_real_escape_string($arraySerialized) . '\' WHERE ' . $column['column_name'] . '=\'' . mysql_real_escape_string($value[0]) . '\'';
                    if (!$result2 = mysql_query($sql, $con)) {
                        die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
                    }
                } else {
                    $sql = 'UPDATE ' . $fila[0] . ' SET ' . $column['column_name'] . ' = replace(' . $column['column_name'] . ', \'iw_\', \'IW\') WHERE ' . $column['column_name'] . ' LIKE \'%iw_%\' ';
                    if (!$result2 = mysql_query($sql, $con)) {
                        die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
                    }
                }
            }
        }
    }
}

// delete IWmain_Block_IwNotice bloc if exists
$commands[] = "DELETE FROM blocks WHERE pn_bkey='IwNotice'";

foreach ($modulesToDelete as $module) {
    $commands[] = "DELETE FROM modules WHERE pn_name='" . $module . "'";
}

$commands[] = "UPDATE blocks SET pn_bkey = 'IWnews' WHERE pn_bkey = 'iwnews'";
$commands[] = "UPDATE blocks SET pn_filter = 'a:0:{}'";

// modifiquem el mòdul Modules per Extensions en el menú horitzontal
$commands[] = 'UPDATE IWmenu SET iw_url = replace(iw_url, \'module=Modules\', \'module=Extensions\') WHERE iw_url LIKE \'%module=Modules%\' ';
$commands[] = 'UPDATE IWvhmenu SET iw_url = replace(iw_url, \'module=Modules\', \'module=Extensions\') WHERE iw_url LIKE \'%module=Modules%\' ';

foreach ($commands as $sql) {
    if (!$result = mysql_query($sql, $con)) {
        //die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
}

// clean module_vars data preventing duplicated values and unnecessary modules
$vars_entries = array();
$deleteFrom = array('Stats',
    'Referers',
    'IWchat',
);
$commands = array();
$sql = "SELECT * from module_vars order by pn_modname";
if (!$result = mysql_query($sql, $con)) {
    //die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
}
while ($fila = mysql_fetch_array($result, MYSQL_NUM)) {
    if (!in_array($fila[1], $deleteFrom)) {
        $vars_entries[$fila[1] . $fila[2]] = array('modname' => $fila[1],
            'name' => $fila[2],
            'value' => $fila[3],
        );
    }
}

$commands[] = "TRUNCATE module_vars";
$entry = 'INSERT INTO module_vars (`pn_modname`, `pn_name`, `pn_value`) VALUES ';
foreach ($vars_entries as $oneentry) {
    $entry .= "('" . mysql_real_escape_string($oneentry['modname']) . "','" . mysql_real_escape_string($oneentry['name']) . "','" . mysql_real_escape_string($oneentry['value']) . "'),";
}
// set SimplePie plugin system as installed
$commands[] = $entry . "('/Plugin','systemplugin.simplepie','" . 'a:2:{s:5:"state";i:1;s:7:"version";s:5:"1.2.1";}' . "');";

foreach ($commands as $sql) {
    if (!$result = mysql_query($sql, $con)) {
        //die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
}

// launch zikula upgrader
header('location:upgrade.php');

// checks if a value is serialized
function is_serialized($data) {
    $data = @unserialize($data);
    if ($data === false) {
        return false;
    } else {
        return true;
    }
}

// change a value from an array recurvissily
function rec_array_replace($find, $replace, $array) {
    if (!is_array($array)) {
        return str_replace($find, $replace, $array);
    }
    $newArray = array();
    foreach ($array as $key => $value) {
        $newArray[$key] = rec_array_replace($find, $replace, $value);
    }
    return $newArray;
}