<?php

global $ZConfig;
require_once('config/config.php');

$preupgradeError = false;
$logfile = $ZConfig['Multisites']['filesRealPath'] . '/' . $ZConfig['Multisites']['siteFilesFolder'] . '/upgrade.txt';

$dbname = $ZConfig['DBInfo']['databases']['default']['dbname'];

$f = fopen($logfile, "a") or die('Error en obrir el fitxer de text.');

fwrite($f, "===============\n");
fwrite($f, date('c', time()) . ' - Actualització de la intranet: ' . $ZConfig['DBInfo']['databases']['default']['dbname'] . "\n\n");

if (!$con = connectdb()) {
    fwrite($f, 'connection failed' . "\n");
}

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
    $prefix . '_' . 'counter',
);

foreach ($tables as $table) {
    if (existsTable($dbname, $table, $f, $con)) {
        $sql = "DROP TABLE $table";
        if (!$result = mysql_query($sql, $con)) {
            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
            $preupgradeError = true;
        }
    }
}

//******* buidem taules la informació de les quals no es necessita
$tables = array($prefix . '_' . 'session_info',
);

foreach ($tables as $table) {
    if (existsTable($dbname, $table, $f, $con)) {
        $sql = "TRUNCATE TABLE $table";
        if (!$result = mysql_query($sql, $con)) {
            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
            $preupgradeError = true;
        }
    }
}

//******* esborrar mòduls de la taula modules
$modulesToDelete = array('iw_groups',
    'iw_chat',
    'iw_moodle',
    'Referers',
    'Stats',
    'Sniffer',
    'Tour',
    'bbcode',
    'bbsmile',
    'advMailer',
    'dpCaptcha',
    'Thumbnail',
    'Downloads',
);

if (existsTable($dbname, $prefix . '_modules', $f, $con) && existsTable($dbname, $prefix . '_blocks', $f, $con)) {
    foreach ($modulesToDelete as $module) {
        // get module id modid
        $sql = "SELECT pn_id from {$prefix}_modules WHERE pn_name='" . $module . "'";
        if (!$result = mysql_query($sql, $con)) {
            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
            $preupgradeError = true;
        }
        $value = mysql_fetch_row($result);

        if ($value != '') {
            // delete module active blocks
            $sql = "DELETE FROM {$prefix}_blocks WHERE pn_mid=$value[0]";
            if (!$result = mysql_query($sql, $con)) {
                fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                $preupgradeError = true;
            }
            // delete module in modules table
            $sql = "DELETE FROM {$prefix}_modules WHERE pn_name='" . $module . "'";
            if (!$result = mysql_query($sql, $con)) {
                fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                $preupgradeError = true;
            }
        }
    }
}

// eliminem el prefix de totes les taules i substituim les cadenes iw_ per IW
$sql = "show tables";

if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}

while ($fila = mysql_fetch_array($result, MYSQL_NUM)) {
    $newname = str_replace($prefix . '_', '', $fila[0]);
    $newname = str_replace('iw_', 'IW', $newname);
    $newname = preg_replace('/_def$/', '_definition', $newname);

    if ($newname != $fila[0]) {
        $commands[] = "RENAME TABLE " . $fila[0] . " TO " . $newname;
    }

    $sql = 'SHOW COLUMNS FROM ' . $fila[0];
    if (!$result1 = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
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
            $sql = "select $column[column_name] as columna from $fila[0] where $column[column_name] like '%iw\_%'";

            if (!$result2 = mysql_query($sql, $con)) {
                fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                $preupgradeError = true;
            }

            // Tables IWstats and IWstats_summary can contain a huge quantity of registers, so they need to processed specifically
            if ($fila[0] == $prefix . '_' . 'IWstats' || $fila[0] == $prefix . '_' . 'IWstats_summary') {
                $sql = 'UPDATE ' . $fila[0] . ' SET ' . $column['column_name'] . ' = replace(' . $column['column_name'] . ', \'iw_\', \'IW\') WHERE ' . $column['column_name'] . ' LIKE \'%iw_%\' ';
                if (!$result3 = mysql_query($sql, $con)) {
                    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                    $preupgradeError = true;
                }
            } else {
                while ($value = mysql_fetch_array($result2)) {
                    if (is_serialized($value['columna'])) {
                        $array = unserialize($value['columna']);
                        $newArray = rec_array_replace('iw_', 'IW', $array);
                        $newArray = rec_array_replace('Downloads', 'IWdocmanager', $newArray);

                        if ($column['column_name'] == 'pn_content' && $column['data_type'] == "longtext") {
                            $newArray = rec_array_replace('[', 'index.php?module=', $newArray);
                            $newArray = rec_array_replace(']', '', $newArray);
                        }
                        $arraySerialized = serialize($newArray);
                        $sql = 'UPDATE ' . $fila[0] . ' SET ' . $column['column_name'] . ' = \'' . mysql_real_escape_string($arraySerialized) . '\' WHERE ' . $column['column_name'] . '=\'' . mysql_real_escape_string($value[0]) . '\'';
                        if (!$result3 = mysql_query($sql, $con)) {
                            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                            $preupgradeError = true;
                        }
                    } else {
                        $sql = 'UPDATE ' . $fila[0] . ' SET ' . $column['column_name'] . ' = replace(' . $column['column_name'] . ', \'iw_\', \'IW\') WHERE ' . $column['column_name'] . ' LIKE \'%iw_%\' ';
                        if (!$result3 = mysql_query($sql, $con)) {
                            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                            $preupgradeError = true;
                        }
                    }
                }
            }
        }
    }
}

// delete IWmain_Block_IwNotice bloc if exists
if (existsField($dbname, $prefix . '_blocks', 'pn_bkey', $f, $con)) {
    $commands[] = "DELETE FROM blocks WHERE pn_bkey='IwNotice'";
    $commands[] = "UPDATE blocks SET pn_bkey = 'IWnews' WHERE pn_bkey = 'iwnews'";
    $commands[] = "UPDATE blocks SET pn_bkey = 'Messages' WHERE pn_bkey = 'messages'";
    $commands[] = "UPDATE blocks SET pn_bkey = 'LastWeblinks' WHERE pn_bkey = 'Lastweblinks'";
    $commands[] = "UPDATE blocks SET pn_bkey = 'MostPopularWeblinks' WHERE pn_bkey = 'mostpopularweblinks'";
    $commands[] = "UPDATE blocks SET pn_filter = 'a:0:{}'";
}

// rename theme name from IWbluegrace_agora to IWbluegraceAgora
$commands[] = "UPDATE module_vars SET pn_value='s:16:\"IWbluegraceAgora\";' WHERE pn_value LIKE '%IWbluegrace_agora%';";
$commands[] = "UPDATE themes SET pn_name = 'IWbluegraceAgora', pn_directory = 'IWbluegraceAgora' WHERE pn_name='IWbluegrace_agora';";

// modifiquem el mòdul Modules per Extensions en el menú horitzontal i l'enlla de sortida en el menú horitzontal
if (existsTable($dbname, $prefix . '_iw_menu', $f, $con)) {
    $commands[] = 'UPDATE IWmenu SET iw_url = replace(iw_url, \'module=Modules\', \'module=Extensions\') WHERE iw_url LIKE \'%module=Modules%\' ';
    $commands[] = 'UPDATE IWmenu SET iw_url = replace(iw_url, \'user.php?op=logout\', \'index.php?module=users&type=user&func=logout\') WHERE iw_url LIKE \'%user.php?op=logout%\' ';
}
if (existsTable($dbname, $prefix . '_iw_vhmenu', $f, $con)) {
    $commands[] = 'UPDATE IWvhmenu SET iw_url = replace(iw_url, \'module=Modules\', \'module=Extensions\') WHERE iw_url LIKE \'%module=Modules%\' ';
    $commands[] = 'UPDATE IWvhmenu SET iw_url = replace(iw_url, \'user.php?op=logout\', \'index.php?module=users&type=user&func=logout\') WHERE iw_url LIKE \'%user.php?op=logout%\' ';
}

$commands[] = 'TRUNCATE TABLE hooks';

foreach ($commands as $sql) {
    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
    }
}

// clean module_vars data preventing duplicated values and unnecessary modules
$vars_entries = array();
$deleteFrom = array('Admin_Messages',
    'advMailer',
    'bbcode',
    'bbsmile',
//  'Downloads',
    'IWchat',
    'IWgroups',
    'Referers',
    'Stats',
    'Thumbnail',
);

$commands = array();
if (existsField($dbname, 'module_vars', 'pn_modname', $f, $con)) {
    $sql = "SELECT * from module_vars order by pn_modname";
    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
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
        // in module Files the allowed extensions change the separation symbol of elements
        if ($oneentry['name'] == 'allowedExtensions' && $oneentry['modname'] == 'Files') {
            $oneentry['value'] = str_replace('|', ',', $oneentry['value']);
        }
        $entry .= "('" . mysql_real_escape_string($oneentry['modname']) . "','" . mysql_real_escape_string($oneentry['name']) . "','" . mysql_real_escape_string($oneentry['value']) . "'),";
    }

    // set SimplePie plugin system as installed
    $commands[] = $entry . "('/Plugin','systemplugin.simplepie','" . 'a:2:{s:5:"state";i:1;s:7:"version";s:5:"1.2.1";}' . "');";

    foreach ($commands as $sql) {
        if (!$result = mysql_query($sql, $con)) {
            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
            $preupgradeError = true;
        }
    }
}

// replace timeFrames for timeframes
$sql = "UPDATE modules set pn_name='IWtimeframes', pn_directory='IWtimframes', pn_url='IWtimframes', pn_securityschema='a:1:{s:14:\"IWtimeframes::\";s:2:\"::\";' WHERE pn_name='IWtimeFrames';";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}

// replace Admin_Messages for AdminMessages
$sql = "UPDATE modules set pn_name='AdminMessages', pn_directory='AdminMessages', pn_url='AdminMessages', pn_securityschema='a:1:{s:15:\"AdminMessages::\";s:25:\"message title::message id\";}' WHERE pn_name='Admin_Messages';";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}

// Replace new to newitem in scribite entries
if (existsTable($dbname, 'scribite', $f, $con)) {
    $sql = "SELECT pn_modfunc FROM scribite where pn_modfunc LIKE '%\"new\"%'";
    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
    }
    while ($fila = mysql_fetch_array($result, MYSQL_NUM)) {
        $array = unserialize($fila[0]);
        $newArray = rec_array_replace('new', 'newitem', $array);
        $arraySerialized = serialize($newArray);
        $sql = 'UPDATE scribite SET pn_modfunc = \'' . mysql_real_escape_string($arraySerialized) . '\' WHERE pn_modfunc=\'' . mysql_real_escape_string($fila[0]) . '\'';
        if (!$result3 = mysql_query($sql, $con)) {
            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
            $preupgradeError = true;
        }
    }
}

// activate the module IWdocmanager
//*** Keep Download module tables for security reasons ***/
// add module in modules table
if (!existsRegister($dbname, 'modules', 'pn_name', 'IWdocmanager', $f, $con)) {
    $sql = "INSERT INTO `modules` (`pn_name`, `pn_type`, `pn_displayname`, `pn_url`, `pn_description`, `pn_directory`, `pn_version`, `pn_state`, `pn_securityschema`) VALUES
    ('IWdocmanager', 2, 'Gestió de documents', 'documents', 'Mòdul de gestió documental i control de versions.', 'IWdocmanager', '0.0.1', 3, 'a:1:{s:14:\"IWdocmanager::\";s:2:\"::\";}');";
    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
    }
}

// add default module vars
// get module Downloads folder var current value
$sql = "select pn_value from module_vars where pn_modname='Downloads' AND pn_name='upload_folder'";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}
$value = mysql_fetch_row($result);

// remove documentroot directory from de string
$sql = "select pn_value from module_vars where pn_modname='IWmain' AND pn_name='documentRoot'";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}
$value1 = mysql_fetch_row($result);
$prevalue = unserialize($value[0]);
$prevalue1 = unserialize($value1[0]);
$prevalue = str_replace($prevalue1, '', $prevalue);
if (substr($prevalue, -1) == '/') {
    $prevalue = substr($prevalue, 0, strlen($prevalue) - 1);
}
if (substr($prevalue, 0, 1) == '/') {
    $prevalue = substr($prevalue, 1, strlen($prevalue));
}
$documentsFolder = serialize($prevalue);
if (!existsRegister($dbname, 'module_vars', 'pn_modname', 'IWdocmanager', $f, $con)) {
    $sql = "INSERT INTO module_vars (`pn_modname`, `pn_name`, `pn_value`) VALUES
        ('IWdocmanager','documentsFolder','" . $documentsFolder . "'),
        ('IWdocmanager','notifyMail','s:0:\"\";'),
        ('IWdocmanager','editTime','s:2:\"30\";'),
        ('IWdocmanager','deleteTime','s:2:\"20\";');";
    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
    }
}

// create module tables
$sql = "CREATE TABLE IF NOT EXISTS `IWdocmanager` (
  `documentId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL DEFAULT '0',
  `fileName` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `filesize` varchar(10) NOT NULL,
  `author` int(11) NOT NULL DEFAULT '0',
  `nClicks` int(11) NOT NULL DEFAULT '0',
  `validated` int(11) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `version` varchar(30) NOT NULL DEFAULT '',
  `documentName` varchar(200) NOT NULL DEFAULT '',
  `authorName` varchar(100) NOT NULL DEFAULT '',
  `documentLink` varchar(200) NOT NULL DEFAULT '',
  `fileOriginalName` varchar(100) NOT NULL DEFAULT '',
  `versioned` int(11) NOT NULL DEFAULT '0',
  `versionFrom` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`documentId`),
  KEY `author` (`author`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}

// create module tables
$sql = "CREATE TABLE IF NOT EXISTS `IWdocmanager_categories` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `groups` text NOT NULL,
  `nDocuments` int(11) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `parentId` int(11) NOT NULL DEFAULT '0',
  `nDocumentsNV` int(11) NOT NULL DEFAULT '0',
  `groupsAdd` text NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}

// transer data from module Downloads to the module IWdocmanager
// get add transfer categories
$document_categories = array();
$sql = "SELECT * from downloads_categories order by pn_cid";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}
while ($fila = mysql_fetch_array($result, MYSQL_NUM)) {
    $document_categories[] = array('categoryId' => $fila[0],
        'parentId' => $fila[1],
        'categoryName' => $fila[2],
        'description' => $fila[3],
    );
}

if (!empty($document_categories)) {
    if (!existsRegister($dbname, 'IWdocmanager_categories', 'categoryId', $document_categories[0]['categoryId'], $f, $con)) {
        $sql = 'INSERT INTO IWdocmanager_categories (`categoryId`, `parentId`, `categoryName`, `description`, `active`, `groups`, `groupsAdd`) VALUES ';
        foreach ($document_categories as $oneentry) {
            $sql .= "(" . mysql_real_escape_string($oneentry['categoryId']) . "," . mysql_real_escape_string($oneentry['parentId']) . ",'" . mysql_real_escape_string($oneentry['categoryName']) . "','" . mysql_real_escape_string($oneentry['description']) . "',1,'a:0:{}','a:0:{}'),";
        }
        // remove last , from sql string
        $sql = substr($sql, 0, strlen($sql) - 1);
        $sql .= ';';

        if (!$result = mysql_query($sql, $con)) {
            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
            $preupgradeError = true;
        }
    }
}


// get and transfer documents information
$documents = array();
$sql = "SELECT * from downloads_downloads order by pn_lid";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}
while ($fila = mysql_fetch_array($result, MYSQL_NUM)) {

    $lu_date = ($fila[3] != '0000-00-00 00:00:00') ? $fila[3] : $fila[8];

    $documents[] = array('documentId' => $fila[0],
        'categoryId' => $fila[1],
        'validated' => $fila[2],
        'pn_lu_date' => $lu_date,
        'documentName' => $fila[4],
        'fileName' => $fila[5],
        'fileOriginalName' => $fila[6],
        'description' => $fila[7],
        'pn_cr_date' => $fila[8],
        'nClicks' => $fila[10],
        'authorName' => $fila[11],
        'filesize' => $fila[12],
        'version' => $fila[13],
        'documentLink' => $fila[14],
    );
}

if (!empty($documents)) {
    $sql = 'INSERT INTO IWdocmanager (`documentId`,`categoryId`,`validated`,`pn_lu_date`,`documentName`,`fileName`,`fileOriginalName`,`description`,`pn_cr_date`,`nClicks`,`authorName`,`filesize`,`version`,`documentLink`) VALUES ';
    foreach ($documents as $oneentry) {
        $extension = getExtension($oneentry['fileOriginalName']);
        $sql .= "(" . mysql_real_escape_string($oneentry['documentId']) .
                "," . mysql_real_escape_string($oneentry['categoryId']) .
                "," . mysql_real_escape_string($oneentry['validated']) .
                ",'" . mysql_real_escape_string($oneentry['pn_lu_date']) .
                "','" . mysql_real_escape_string($oneentry['documentName']) .
                "','" . mysql_real_escape_string($oneentry['fileName']) .
                "','" . mysql_real_escape_string(formatPermalink(str_replace('.' . $extension, '', $oneentry['fileOriginalName']))) . '.' . $extension .
                "','" . mysql_real_escape_string($oneentry['description']) .
                "','" . mysql_real_escape_string($oneentry['pn_cr_date']) .
                "'," . mysql_real_escape_string($oneentry['nClicks']) .
                ",'" . mysql_real_escape_string($oneentry['authorName']) .
                "','" . mysql_real_escape_string($oneentry['filesize']) .
                "','" . mysql_real_escape_string($oneentry['version']) .
                "','" . mysql_real_escape_string($oneentry['documentLink']) .
                "'),";
    }
    // remove last , from sql string
    $sql = substr($sql, 0, strlen($sql) - 1);
    $sql .= ';';

    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
    }
}


// change links of module Downloads to IWdocmanager
// TODO:

if ($preupgradeError) {
    fwrite($f, "ERROR A LA PREPARACIÓ\n");
} else {
    fwrite($f, "OK\n");
}

fwrite($f, "===============\n");
fclose($f);

if (!$preupgradeError) {
    // launch zikula upgrader
    header('location:upgrade.php');
}

/**
 * Open a connection to the administration database
 *
 * @return Connection handler
 */
function connectdb() {

    global $ZConfig;

    if (!$con = mysql_connect($ZConfig['DBInfo']['databases']['default']['hostmigrate'].':'.$ZConfig['DBInfo']['databases']['default']['portmigrate'], $ZConfig['DBInfo']['databases']['default']['user'], $ZConfig['DBInfo']['databases']['default']['password']))
        return false;

    mysql_set_charset('utf8', $con);

    if (!mysql_select_db($ZConfig['DBInfo']['databases']['default']['dbname'], $con)) {
        echo "No s'ha pogut connectar a la base de dades";
        return false;
    }

    return $con;
}

function existsTable($dbname, $tablename, $f, $con) {

    $sql = "SELECT count(*)
            FROM information_schema.tables
            WHERE table_schema = '$dbname'
            AND table_name = '$tablename'";

    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        return false;
    } else {
        $values = mysql_fetch_array($result, MYSQL_NUM);
        return (bool) $values[0];
    }
}

function existsField($dbname, $tablename, $field, $f, $con) {

    $sql = "SELECT count(*)
            FROM information_schema.columns
            WHERE table_schema = '$dbname'
            AND table_name = '$tablename'
            AND column_name = '$field'";

    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        return false;
    } else {
        $values = mysql_fetch_array($result, MYSQL_NUM);
        return (bool) $values[0];
    }
}

function existsRegister($dbname, $tablename, $field, $register, $f, $con) {

    $sql = "SELECT count($field)
            FROM $dbname.$tablename
            WHERE $field = '$register'";

    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . " - El registre $register no existeix a la taula $tablename de la base de dades $dbname. \n\n");
        return false;
    } else {
        $values = mysql_fetch_array($result, MYSQL_NUM);
        return (bool) $values[0];
    }
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

// change a value from an array recurvissily
function rec_array_replace($find, $replace, $array) {
    if (!is_array($array)) {
        return str_replace($find, $replace, $array);
    }
    $newArray = array();
    foreach ($array as $key => $value) {
        $key = str_replace($find, $replace, $key);
        $newArray[$key] = rec_array_replace($find, $replace, $value);
    }
    return $newArray;
}

function formatPermalink($var) {
    // replace all chars $permasearch with the one in $permareplace
    $permasearch = explode(',', 'À,Á,Â,Ã,Å,à,á,â,ã,å,Ò,Ó,Ô,Õ,Ø,ò,ó,ô,õ,ø,È,É,Ê,Ë,è,é,ê,ë,Ç,ç,Ì,Í,Î,Ï,ì,í,î,ï,Ù,Ú,Û,ù,ú,û,ÿ,Ñ,ñ,ß,ä,Ä,ö,Ö,ü,Ü');
    $permareplace = explode(',', 'A,A,A,A,A,a,a,a,a,a,O,O,O,O,O,o,o,o,o,o,E,E,E,E,e,e,e,e,C,c,I,I,I,I,i,i,i,i,U,U,U,u,u,u,y,N,n,ss,ae,Ae,oe,Oe,ue,Ue');
    foreach ($permasearch as $key => $value) {
        $var = mb_ereg_replace($value, $permareplace[$key], $var);
    }

    $var = preg_replace("#(\s*\/\s*|\s*\+\s*|\s+)#", '-', strtolower($var));

    // final clean
    $permalinksseparator = '-';
    $var = mb_ereg_replace("[^a-z0-9_{$permalinksseparator}]", '', $var, "imsr");
    $var = preg_replace('/' . $permalinksseparator . '+/', $permalinksseparator, $var); // remove replicated separator
    $var = trim($var, $permalinksseparator);

    return $var;
}

function getExtension($filename) {
    $p = strrpos($filename, '.');
    if ($p !== false) {
        return substr($filename, $p + 1);
    }

    return '';
}