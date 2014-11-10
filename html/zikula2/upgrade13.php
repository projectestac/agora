<?php

$pass = filter_input(INPUT_GET, 'pass', FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);

// Bootstrap loads config/config.php so fills in $ZConfig and $agora
include 'lib/bootstrap.php';

global $ZConfig, $agora;

// Security check
if (is_null($pass) || !$pass || ($pass != $agora['xtecadmin']['password'])) {
    echo 'Password check failed!';
    exit(0);
}

ini_set('mbstring.internal_encoding', 'UTF-8');
ini_set('default_charset', 'UTF-8');
mb_regex_encoding('UTF-8');
ini_set('memory_limit', '64M');
ini_set('max_execution_time', 86400);

// In production put all logs together
if ($agora['server']['enviroment'] == 'PRO') {
    $logfile = $agora['server']['root'] . $agora['intranet']['datadir'] . 'usu151' . '/' . $ZConfig['Multisites']['siteFilesFolder'] . '/upgrade.txt';
} else {
    $logfile = $ZConfig['Multisites']['filesRealPath'] . '/' . $ZConfig['Multisites']['siteFilesFolder'] . '/upgrade.txt';
}

$f = fopen($logfile, "a") or die('Error en obrir el fitxer de text.');

fwrite($f, "===============\n");
fwrite($f, date('c', time()) . ' - Actualització de la intranet: ' . $ZConfig['DBInfo']['databases']['default']['dbname'] . "\n\n");

if (!$con = connectdb()) {
    fwrite($f, 'connection failed' . "\n");
}

// General variables for preupgrade
$preupgradeError = false;
$dbname = $ZConfig['DBInfo']['databases']['default']['dbname'];
$commands = array();
$prefix = 'zk';

// Check if upgrade is already done
if (!existsTable($dbname, $prefix . '_' . 'users', $f, $con)) {
    fwrite($f, 'Update previously done' . "\n");
    fclose($f);
    mysql_close($con);
    echo 'Update previously done';
    exit(0);
}

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
$tables = array($prefix . '_' . 'session_info');

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

    foreach ($columns as $column) {
        // Replace only text and varchar
        if (strpos($column['data_type'], "varchar") !== false || $column['data_type'] == "text" || $column['data_type'] == "longtext") {

            // Table blocks is special because we want to do some extra work
            if ($fila[0] == $prefix . '_' . 'blocks') {
                // Select all columns
                $sql = "select $column[column_name] as columna from $fila[0]";
            } else {
                // Look for text "iw_"
                $sql = "select $column[column_name] as columna from $fila[0] where $column[column_name] like '%iw\_%'";
            }

            if (!$result2 = mysql_query($sql, $con)) {
                fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                $preupgradeError = true;
            }

            // No changes are necessary for tables IWstats and IWstats_summary, which can contain a huge quantity of registers
            if ($fila[0] != $prefix . '_' . 'IWstats' && $fila[0] != $prefix . '_' . 'IWstats_summary') {
                while ($value = mysql_fetch_array($result2)) {
/*		            if ($fila[0] == $prefix . '_' . 'blocks') {
						echo $value['columna'].'<br>';
					}
*/                  // Serialized values
                    if (is_serialized($value['columna'])) {
                        $array = unserialize($value['columna']);
                        $newArray = rec_array_replace('iw_', 'IW', $array);
                        $newArray = rec_array_replace('Downloads', 'IWdocmanager', $newArray);

                        if ($column['column_name'] == 'pn_content' && $column['data_type'] == "longtext") {
                            $newArray = rec_array_replace('[', '{', $newArray);
                            $newArray = rec_array_replace(']', '}', $newArray);
                            $newArray = rec_array_replace('index.php?module=IWdocmanager&func=newdownload', 'index.php?module=IWdocmanager&type=user&func=newDoc', $newArray);
                            $newArray = rec_array_replace('index.php?module=News&func=new', 'index.php?module=News&type=user&func=newitem', $newArray);
                            $newArray = rec_array_replace('index.php?module=Pages&type=admin&func=new', 'index.php?module=Pages&type=admin&func=newitem', $newArray);
                            $newArray = rec_array_replace('index.php?module=content&type=edit', 'index.php?module=Content&type=admin&func=main', $newArray);
                        }
                        $arraySerialized = serialize($newArray);
                        $sql = 'UPDATE ' . $fila[0] . ' SET ' . $column['column_name'] . ' = \'' . mysql_real_escape_string($arraySerialized) . '\' WHERE ' . $column['column_name'] . '=\'' . mysql_real_escape_string($value[0]) . '\'';
                        if (!$result3 = mysql_query($sql, $con)) {
                            fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                            $preupgradeError = true;
                        }
                    }
/*		            if ($fila[0] == $prefix . '_' . 'blocks') {
						echo $value['columna'].'<br>';
					}
*/              }
                // Serialized and Non-serialized values
                $sql = 'UPDATE ' . $fila[0] . ' SET ' . $column['column_name'] . ' = replace(' . $column['column_name'] . ', \'iw_\', \'IW\') WHERE ' . $column['column_name'] . ' LIKE \'%iw_%\' ';
                if (!$result3 = mysql_query($sql, $con)) {
                    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                    $preupgradeError = true;
                }
                // Update legacy component for News
                if ($fila[0] == $prefix . '_' . 'group_perms') {
                    $sql = "UPDATE $fila[0] SET pn_component = 'News::' WHERE pn_component = 'Stories::Story'";
                    if (!$result3 = mysql_query($sql, $con)) {
                        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
                        $preupgradeError = true;
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
    $commands[] = 'UPDATE IWmenu SET iw_url = replace(iw_url, \'index.php?module=IWgroups&type=admin\', \'index.php?module=Groups&type=admin\') WHERE iw_url LIKE \'%index.php?module=IWgroups&type=admin%\' ';
    $commands[] = 'UPDATE IWmenu SET iw_url = replace(iw_url, \'index.php?module=IWdocmanager&type=admin\', \'index.php?module=Downloads&type=admin\') WHERE iw_url LIKE \'%index.php?module=Downloads&type=admin%\' ';
}
if (existsTable($dbname, $prefix . '_iw_vhmenu', $f, $con)) {
    $commands[] = 'UPDATE IWvhmenu SET iw_url = replace(iw_url, \'module=Modules\', \'module=Extensions\') WHERE iw_url LIKE \'%module=Modules%\' ';
    $commands[] = 'UPDATE IWvhmenu SET iw_url = replace(iw_url, \'user.php?op=logout\', \'index.php?module=users&type=user&func=logout\') WHERE iw_url LIKE \'%user.php?op=logout%\' ';
    $commands[] = 'UPDATE IWvhmenu SET iw_url = replace(iw_url, \'index.php?module=IWgroups&type=admin\', \'index.php?module=Groups&type=admin\') WHERE iw_url LIKE \'%index.php?module=IWgroups&type=admin%\' ';
    $commands[] = 'UPDATE IWvhmenu SET iw_url = replace(iw_url, \'index.php?module=IWdocmanager&type=admin\', \'index.php?module=Downloads&type=admin\') WHERE iw_url LIKE \'%index.php?module=Downloads&type=admin%\' ';
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
$sql = "UPDATE modules set pn_name='IWtimeframes', pn_directory='IWtimeframes', pn_url='IWtimeframes', pn_securityschema='a:1:{s:14:\"IWtimeframes::\";s:2:\"::\";' WHERE pn_name='IWtimeFrames';";
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

// Activate the module IWdocmanager (Keep Download module tables as a backup)
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

// XTECMailer: Get adminmail from module vars table
$sql = "select pn_value from module_vars where pn_modname='/PNConfig' AND pn_name='adminmail'";
if (!$result = mysql_query($sql, $con)) {
    fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
    $preupgradeError = true;
}
$value = mysql_fetch_row($result);

// create module vars
if (!existsRegister($dbname, 'module_vars', 'pn_modname', 'XtecMailer', $f, $con)) {
    $sql = "INSERT INTO module_vars (`pn_modname`, `pn_name`, `pn_value`) VALUES
        ('XtecMailer','enabled','i:1;'),
        ('XtecMailer','idApp','s:5:\"AGORA\";'),
        ('XtecMailer','replyAddress','" . mysql_real_escape_string($value[0]) . "'),
        ('XtecMailer','sender','s:8:\"educacio\";'),
        ('XtecMailer','environment','" . serialize($agora['server']['enviroment']) . "'),
        ('XtecMailer','contenttype','i:2;'),
        ('XtecMailer','log','i:0;'),
        ('XtecMailer','debug','i:0;'),
        ('XtecMailer','logpath','s:0:\"\";'),
        ('/EventHandlers','XtecMailer','a:1:{i:0;a:3:{s:9:\"eventname\";s:29:\"module.mailer.api.sendmessage\";s:8:\"callable\";a:2:{i:0;s:20:\"XtecMailer_Listeners\";i:1;s:8:\"sendMail\";}s:6:\"weight\";i:10;}}');";
    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
    }
}

// activate the module XtecMailer
// add module in modules table
if (!existsRegister($dbname, 'modules', 'pn_name', 'XtecMailer', $f, $con)) {
    $sql = "INSERT INTO `modules` (`pn_name`, `pn_type`, `pn_displayname`, `pn_url`, `pn_description`, `pn_directory`, `pn_version`, `pn_state`, `pn_securityschema`) VALUES
    ('XtecMailer', 2, 'XtecMailer', 'XtecMailer', 'Amplia les funcionalitats del mòdul Mailer per poder enviar correu electrònic utilitzant el servei web de la XTEC', 'XtecMailer', '1.0.0', 3, 'a:1:{s:12:\"XtecMailer::\";s:2:\"::\";}');";
    if (!$result = mysql_query($sql, $con)) {
        fwrite($f, 'SQL: ' . substr($sql, 0, 70) . ' - ERROR: ' . mysql_error() . "\n\n");
        $preupgradeError = true;
    }
}
// END activate the module XtecMailer


if ($preupgradeError) {
    fwrite($f, "ERROR A LA PREPARACIÓ\n");
} else {
    fwrite($f, "OK\n");
}

fwrite($f, "===============\n");
fclose($f);
mysql_close($con);

if ($preupgradeError) {
    die ("ERROR A LA PREPARACIÓ\n");
}


// Upgrade start
ZLoader::addAutoloader('Users', 'system/Users/lib', '_');
include_once __DIR__.'/plugins/Doctrine/Plugin.php';
PluginUtil::loadPlugin('SystemPlugin_Doctrine_Plugin');
$eventManager = $core->getEventManager();
$eventManager->attach('core.init', 'upgrade_suppressErrors');

// load zikula core
define('_ZINSTALLVER', Zikula_Core::VERSION_NUM);
define('_Z_MINUPGVER', '1.2.0');

// Signal that upgrade is running.
$GLOBALS['_ZikulaUpgrader'] = array();

// include config file for retrieving name of temporary directory
$GLOBALS['ZConfig']['System']['multilingual'] = true;

$GLOBALS['ZConfig']['System']['Z_CONFIG_USE_OBJECT_ATTRIBUTION'] = false;
$GLOBALS['ZConfig']['System']['Z_CONFIG_USE_OBJECT_LOGGING'] = false;
$GLOBALS['ZConfig']['System']['Z_CONFIG_USE_OBJECT_META'] = false;

// Lazy load DB connection to avoid testing DSNs that are not yet valid (e.g. no DB created yet)
$dbEvent = new Zikula_Event('doctrine.init_connection', null, array('lazy' => true));
$connection = $eventManager->notify($dbEvent)->getData();

$columns = upgrade_getColumnsForTable($connection, 'modules');

if (in_array('pn_id', array_keys($columns))) {
    upgrade_columns($connection);
}

if (!isset($columns['capabilities'])) {
    Doctrine_Core::createTablesFromArray(array('Zikula_Doctrine_Model_HookArea', 'Zikula_Doctrine_Model_HookProvider', 'Zikula_Doctrine_Model_HookSubscriber', 'Zikula_Doctrine_Model_HookBinding', 'Zikula_Doctrine_Model_HookRuntime'));
    ModUtil::dbInfoLoad('Extensions', 'Extensions', true);
    DBUtil::changeTable('modules');
    ModUtil::dbInfoLoad('Blocks', 'Blocks', true);
    DBUtil::changeTable('blocks');
}

$installedVersion = upgrade_getCurrentInstalledCoreVersion($connection);

if (version_compare($installedVersion, '1.3.0-dev') === -1) {
    $GLOBALS['_ZikulaUpgrader']['_ZikulaUpgradeFrom12x'] = true;
}

$core->init(Zikula_Core::STAGE_ALL);

$action = FormUtil::getPassedValue('action', false, 'GETPOST');

// deactivate file based shorturls
if (System::getVar('shorturls') && System::getVar('shorturlstype')) {
    System::setVar('shorturls', false);
    System::delVar('shorturlstype');
    System::delVar('shorturlsext');
    LogUtil::registerError('You were using file based shorturls. This feature will no longer be supported. The shorturls were disabled. Directory based shorturls can be activated in the General settings manager.');
}

// Upgrade available modules
$modvars = DBUtil::selectObjectArray('module_vars');
foreach ($modvars as $modvar) {
    if ($modvar['value'] == '0' || $modvar['value'] == '1') {
        $modvar['value'] = serialize($modvar['value']);
        DBUtil::updateObject($modvar, 'module_vars');
    }
}

// force load the modules admin API
ModUtil::loadApi('Extensions', 'admin', true);

echo '<h2>' . __('Starting upgrade') . '</h2>' . "\n";
echo '<ul id="upgradelist" class="check">' . "\n";

$results = ModUtil::apiFunc('Extensions', 'admin', 'upgradeall');
if ($results) {
    foreach ($results as $modname => $result) {
        if ($result) {
            echo '<li class="passed">' . DataUtil::formatForDisplay($modname) . ' ' . __('upgraded') . '</li>' . "\n";
        } else {
            echo '<li class="failed">' . DataUtil::formatForDisplay($modname) . ' ' . __('not upgraded') . '</li>' . "\n";
        }
    }
}
echo '</ul>' . "\n";
if (!$results) {
    echo '<ul class="check"><li class="passed">' . __('No modules required upgrading') . '</li></ul>';
}

// wipe out the deprecated modules from Modules list.
$modTable = 'modules';
$sql = "DELETE FROM $modTable WHERE name = 'Header_Footer' OR name = 'AuthPN' OR name = 'pnForm' OR name = 'Workflow' OR name = 'pnRender'";
DBUtil::executeSQL($sql);

// store localized displayname and description for Extensions module
$extensionsDisplayname = __('Extensions');
$extensionsDescription = __('Manage your modules and plugins.');
$sql = "UPDATE modules SET name = 'Extensions', displayname = '{$extensionsDisplayname}', description = '{$extensionsDescription}' WHERE modules.name = 'Extensions'";
DBUtil::executeSQL($sql);

// regenerate the themes list
ModUtil::apiFunc('Theme', 'admin', 'regenerate');

// store the recent version in a config var for later usage. This enables us to determine the version we are upgrading from
System::setVar('Version_Num', Zikula_Core::VERSION_NUM);
System::setVar('language_i18n', ZLanguage::getLanguageCode());

// Relogin the admin user to give a proper admin link
SessionUtil::requireSession();

echo '<p class="z-statusmsg">' . __('Finished upgrade') . " - \n";

upgrade_clear_caches();
$url = sprintf('<a href="%s">%s</a>', ModUtil::url('Admin', 'admin', 'adminpanel'), DataUtil::formatForDisplay(System::getVar('sitename')));
echo __f('Go to the admin panel for %s', $url);

echo "</p>\n";


/**
 * Open a connection to the administration database
 *
 * @return Connection handler
 */
function connectdb() {

    global $ZConfig;

    if (!$con = mysql_connect($ZConfig['DBInfo']['databases']['default']['hostmigrate'] . ':' . $ZConfig['DBInfo']['databases']['default']['portmigrate'], $ZConfig['DBInfo']['databases']['default']['user'], $ZConfig['DBInfo']['databases']['default']['password'])) {
        return false;
    }

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

/**
 * Clear the Zikula cache.
 *
 * This function clear the zikula cache.
 *
 * @return void
 */
function upgrade_clear_caches()
{
    Zikula_View_Theme::getInstance()->clear_all_cache();
    Zikula_View_Theme::getInstance()->clear_compiled();
    Zikula_View_Theme::getInstance()->clear_cssjscombinecache();
    Zikula_View::getInstance()->clear_all_cache();
    Zikula_View::getInstance()->clear_compiled();
}

/**
 * Suppress errors event listener.
 *
 * @param Zikula_Event $event Event.
 *
 * @return void
 */
function upgrade_suppressErrors(Zikula_Event $event)
{
    if (!$event['stage'] == Zikula_Core::STAGE_CONFIG) {
        return;
    }

    error_reporting(~E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT);
    $GLOBALS['ZConfig']['System']['development'] = 0;
}

/**
 * Get current intalled version number
 *
 * @param object $connection PDO connection.
 *
 * @return string
 */
function upgrade_getCurrentInstalledCoreVersion($connection)
{
    $moduleTable = 'module_vars';

    $stmt = $connection->prepare("SELECT value FROM $moduleTable WHERE modname = 'ZConfig' AND name = 'Version_Num'");
    if (!$stmt->execute()) {
        die(__('FATAL ERROR: Cannot start, unable to determine installed Core version.'));
    }

    $result = $stmt->fetch(PDO::FETCH_NUM);
    return unserialize($result[0]);
}

/**
 * Get tables in database from current connection.
 *
 * @param object $connection PDO connection.
 * @param string $tableName  The name of the table.
 *
 * @return array
 */
function upgrade_getColumnsForTable($connection, $tableName)
{
    $tables = $connection->import->listTables();
    if (!$tables) {
        die(__('FATAL ERROR: Cannot start, unable access database.'));
    }

    try {
        return $connection->import->listTableColumns(($GLOBALS['ZConfig']['System']['prefix'] ? $GLOBALS['ZConfig']['System']['prefix'].'_' : '').$tableName);
    } catch (Exception $e) {
        // TODO - do something with the exception here?
    }
}

/**
 * Standardise table columns.
 *
 * @param PDOConnection $connection The PDO connection instance.
 *
 * @return void
 */
function upgrade_columns($connection)
{
//    $prefix = $GLOBALS['ZConfig']['System']['prefix'];

    $commands = array();
    $commands[] = "ALTER TABLE admin_category CHANGE pn_cid cid INT(11) NOT NULL AUTO_INCREMENT";
    $commands[] = "ALTER TABLE admin_category CHANGE pn_name name VARCHAR(32) NOT NULL";
    $commands[] = "ALTER TABLE admin_category CHANGE pn_description description VARCHAR(254) NOT NULL";

    $commands[] = "ALTER TABLE admin_module CHANGE pn_amid amid INT(11) NOT NULL AUTO_INCREMENT";
    $commands[] = "ALTER TABLE admin_module CHANGE pn_mid mid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE admin_module CHANGE pn_cid cid INT(11) DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE blocks CHANGE pn_bid bid INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE blocks CHANGE pn_bkey bkey VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_title title VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_content content LONGTEXT NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_url url LONGTEXT NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_mid mid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_filter filter LONGTEXT NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_active active TINYINT DEFAULT '1' NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_collapsable collapsable INT(11) DEFAULT '1' NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_defaultstate defaultstate INT(11) DEFAULT '1' NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_refresh refresh INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_last_update last_update DATETIME NOT NULL";
    $commands[] = "ALTER TABLE blocks CHANGE pn_language language VARCHAR(30) NOT NULL";

    $commands[] = "ALTER TABLE userblocks CHANGE pn_uid uid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE userblocks CHANGE pn_bid bid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE userblocks CHANGE pn_active active TINYINT DEFAULT '1' NOT NULL";
    $commands[] = "ALTER TABLE userblocks CHANGE pn_last_update last_update DATETIME";

    $commands[] = "ALTER TABLE block_positions CHANGE pn_pid pid INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE block_positions CHANGE pn_name name VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE block_positions CHANGE pn_description description VARCHAR(255) NOT NULL";

    $commands[] = "ALTER TABLE block_placements CHANGE pn_pid pid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE block_placements CHANGE pn_bid bid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE block_placements CHANGE pn_order sortorder INT(11) DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE group_membership CHANGE pn_gid gid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE group_membership CHANGE pn_uid uid INT(11) DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE groups CHANGE pn_gid gid INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE groups CHANGE pn_name name VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE groups CHANGE pn_gtype gtype TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE groups CHANGE pn_description description VARCHAR(200) NOT NULL";
    $commands[] = "ALTER TABLE groups CHANGE pn_prefix prefix VARCHAR(25) NOT NULL";
    $commands[] = "ALTER TABLE groups CHANGE pn_state state TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE groups CHANGE pn_nbuser nbuser INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE groups CHANGE pn_nbumax nbumax INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE groups CHANGE pn_link link INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE groups CHANGE pn_uidmaster uidmaster INT(11) DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE group_applications CHANGE pn_app_id app_id INT(11) NOT NULL AUTO_INCREMENT";
    $commands[] = "ALTER TABLE group_applications CHANGE pn_uid uid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE group_applications CHANGE pn_gid gid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE group_applications CHANGE pn_application application LONGBLOB NOT NULL";
    $commands[] = "ALTER TABLE group_applications CHANGE pn_status status TINYINT DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE hooks CHANGE pn_id id BIGINT AUTO_INCREMENT";
    $commands[] = "ALTER TABLE hooks CHANGE pn_object object VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE hooks CHANGE pn_action action VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE hooks CHANGE pn_smodule smodule VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE hooks CHANGE pn_stype stype VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE hooks CHANGE pn_tarea tarea VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE hooks CHANGE pn_tmodule tmodule VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE hooks CHANGE pn_ttype ttype VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE hooks CHANGE pn_tfunc tfunc VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE hooks CHANGE pn_sequence sequence INT(11) DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE modules CHANGE pn_id id INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE modules CHANGE pn_name name VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_type type TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_displayname displayname VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_url url VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_description description VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_regid regid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_directory directory VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_version version VARCHAR(10) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_official official TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_author author VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_contact contact VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_admin_capable admin_capable TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_user_capable user_capable TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_profile_capable profile_capable TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_message_capable message_capable TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_state state SMALLINT(6) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_credits credits VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_changelog changelog VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_help help VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_license license VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE modules CHANGE pn_securityschema securityschema TEXT NOT NULL";
    $commands[] = "UPDATE modules SET name = 'Extensions', displayname = 'Extensions', url = 'extensions', description = 'Manage your modules and plugins.', directory =  'Extensions', securityschema = 'a:1:{s:9:\"Extensions::\";s:2:\"::\";}' WHERE modules.name = 'Modules'";

    $commands[] = "ALTER TABLE module_vars CHANGE pn_id id INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE module_vars CHANGE pn_modname modname VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE module_vars CHANGE pn_name name VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE module_vars CHANGE pn_value value LONGTEXT";
    $commands[] = "UPDATE module_vars SET modname='Extensions' WHERE modname='Modules'";

    $commands[] = "ALTER TABLE module_deps CHANGE pn_id id INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE module_deps CHANGE pn_modid modid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE module_deps CHANGE pn_modname modname VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE module_deps CHANGE pn_minversion minversion VARCHAR(10) NOT NULL";
    $commands[] = "ALTER TABLE module_deps CHANGE pn_maxversion maxversion VARCHAR(10) NOT NULL";
    $commands[] = "ALTER TABLE module_deps CHANGE pn_status status TINYINT DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE group_perms CHANGE pn_pid pid INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE group_perms CHANGE pn_gid gid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE group_perms CHANGE pn_sequence sequence INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE group_perms CHANGE pn_realm realm INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE group_perms CHANGE pn_component component VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE group_perms CHANGE pn_instance instance VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE group_perms CHANGE pn_level level INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE group_perms CHANGE pn_bond bond INT(11) DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE search_stat CHANGE pn_id id INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE search_stat CHANGE pn_search search VARCHAR(50) NOT NULL";
    $commands[] = "ALTER TABLE search_stat CHANGE pn_count scount INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE search_stat CHANGE pn_date date DATE";

    $commands[] = "ALTER TABLE search_result CHANGE sres_id id INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE search_result CHANGE sres_title title VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE search_result CHANGE sres_text text LONGTEXT";
    $commands[] = "ALTER TABLE search_result CHANGE sres_module module VARCHAR(100)";
    $commands[] = "ALTER TABLE search_result CHANGE sres_extra extra VARCHAR(100)";
    $commands[] = "ALTER TABLE search_result CHANGE sres_created created DATETIME";
    $commands[] = "ALTER TABLE search_result CHANGE sres_found found DATETIME";
    $commands[] = "ALTER TABLE search_result CHANGE sres_sesid sesid VARCHAR(50)";

    $commands[] = "ALTER TABLE themes CHANGE pn_id id INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE themes CHANGE pn_name name VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_type type TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_displayname displayname VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_description description VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_regid regid INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_directory directory VARCHAR(64) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_version version VARCHAR(10) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_official official TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_author author VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_contact contact VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_admin admin TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_user user TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_system system TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_state state TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_credits credits VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_changelog changelog VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_help help VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_license license VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE themes CHANGE pn_xhtml xhtml TINYINT DEFAULT '1' NOT NULL";

    $commands[] = "ALTER TABLE users CHANGE pn_uid uid INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE users CHANGE pn_uname uname VARCHAR(25) NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_email email VARCHAR(60) NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_user_regdate user_regdate DATETIME DEFAULT '1970-01-01 00:00:00' NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_user_viewemail user_viewemail SMALLINT DEFAULT '0'";
    $commands[] = "ALTER TABLE users CHANGE pn_user_theme user_theme VARCHAR(64)";
    $commands[] = "ALTER TABLE users CHANGE pn_pass pass VARCHAR(128) NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_storynum storynum INT DEFAULT '10' NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_ublockon ublockon TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_ublock ublock TEXT NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_theme theme VARCHAR(255) NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_counter counter INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_activated activated TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_lastlogin lastlogin DATETIME DEFAULT '1970-01-01 00:00:00' NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_validfrom validfrom INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_validuntil validuntil INT(11) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE users CHANGE pn_hash_method hash_method TINYINT(4) DEFAULT '8' NOT NULL";

    $commands[] = "ALTER TABLE users_temp CHANGE pn_tid tid INT(11) AUTO_INCREMENT";
    $commands[] = "ALTER TABLE users_temp CHANGE pn_uname uname VARCHAR(25) NOT NULL";
    $commands[] = "ALTER TABLE users_temp CHANGE pn_email email VARCHAR(60) NOT NULL";
    $commands[] = "ALTER TABLE users_temp CHANGE pn_femail femail TINYINT(4) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE users_temp CHANGE pn_pass pass VARCHAR(128) NOT NULL";
    $commands[] = "ALTER TABLE users_temp CHANGE pn_dynamics dynamics LONGTEXT NOT NULL";
    $commands[] = "ALTER TABLE users_temp CHANGE pn_comment comment VARCHAR(254) NOT NULL";
    $commands[] = "ALTER TABLE users_temp CHANGE pn_type type TINYINT(4) DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE users_temp CHANGE pn_tag tag TINYINT(4) DEFAULT '0' NOT NULL";

    $commands[] = "ALTER TABLE session_info CHANGE pn_sessid sessid VARCHAR(40) NOT NULL";
    $commands[] = "ALTER TABLE session_info CHANGE pn_ipaddr ipaddr VARCHAR(32) NOT NULL";
    $commands[] = "ALTER TABLE session_info CHANGE pn_lastused lastused DATETIME DEFAULT '1970-01-01 00:00:00'";
    $commands[] = "ALTER TABLE session_info CHANGE pn_uid uid INT(11) DEFAULT '0'";
    $commands[] = "ALTER TABLE session_info CHANGE pn_remember remember TINYINT DEFAULT '0' NOT NULL";
    $commands[] = "ALTER TABLE session_info CHANGE pn_vars vars LONGTEXT NOT NULL";

    $commands[] = "ALTER TABLE `categories_category` CHANGE `cat_id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `cat_parent_id` `parent_id` INT(11) NOT NULL DEFAULT '1', CHANGE `cat_is_locked` `is_locked` TINYINT(4) NOT NULL DEFAULT '0', CHANGE `cat_is_leaf` `is_leaf` TINYINT(4) NOT NULL DEFAULT '0', CHANGE `cat_name` `name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `cat_value` `value` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `cat_sort_value` `sort_value` INT(11) NOT NULL DEFAULT '0', CHANGE `cat_display_name` `display_name` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `cat_display_desc` `display_desc` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `cat_path` `path` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `cat_ipath` `ipath` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `cat_status` `status` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A', CHANGE `cat_obj_status` `obj_status` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A', CHANGE `cat_cr_date` `cr_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `cat_cr_uid` `cr_uid` INT(11) NOT NULL DEFAULT '0', CHANGE `cat_lu_date` `lu_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `cat_lu_uid` `lu_uid` INT(11) NOT NULL DEFAULT '0'";
    $commands[] = "ALTER TABLE `categories_mapmeta` CHANGE  `cmm_id`  `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
CHANGE  `cmm_meta_id`  `meta_id` INT( 11 ) NOT NULL DEFAULT  '0',
CHANGE  `cmm_category_id`  `category_id` INT( 11 ) NOT NULL DEFAULT  '0',
CHANGE  `cmm_obj_status`  `obj_status` VARCHAR( 1 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  'A',
CHANGE  `cmm_cr_date`  `cr_date` DATETIME NOT NULL DEFAULT  '1970-01-01 00:00:00',
CHANGE  `cmm_cr_uid`  `cr_uid` INT( 11 ) NOT NULL DEFAULT  '0',
CHANGE  `cmm_lu_date`  `lu_date` DATETIME NOT NULL DEFAULT  '1970-01-01 00:00:00',
CHANGE  `cmm_lu_uid`  `lu_uid` INT( 11 ) NOT NULL DEFAULT  '0'";

    $commands[] = "ALTER TABLE `categories_mapobj` CHANGE `cmo_id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `cmo_modname` `modname` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `cmo_table` `tablename` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, CHANGE `cmo_obj_id` `obj_id` INT(11) NOT NULL DEFAULT '0', CHANGE `cmo_obj_idcolumn` `obj_idcolumn` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'id', CHANGE `cmo_reg_id` `reg_id` INT(11) NOT NULL DEFAULT '0', CHANGE `cmo_category_id` `category_id` INT(11) NOT NULL DEFAULT '0', CHANGE `cmo_obj_status` `obj_status` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A', CHANGE `cmo_cr_date` `cr_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `cmo_cr_uid` `cr_uid` INT(11) NOT NULL DEFAULT '0', CHANGE `cmo_lu_date` `lu_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `cmo_lu_uid` `lu_uid` INT(11) NOT NULL DEFAULT '0'";

    $commands[] = "ALTER TABLE `categories_registry` CHANGE `crg_id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `crg_modname` `modname` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `crg_table` `tablename` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `crg_property` `property` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `crg_category_id` `category_id` INT(11) NOT NULL DEFAULT '0', CHANGE `crg_obj_status` `obj_status` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A', CHANGE `crg_cr_date` `cr_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `crg_cr_uid` `cr_uid` INT(11) NOT NULL DEFAULT '0', CHANGE `crg_lu_date` `lu_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `crg_lu_uid` `lu_uid` INT(11) NOT NULL DEFAULT '0'";

    $commands[] = "ALTER TABLE `objectdata_attributes` CHANGE `oba_id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `oba_attribute_name` `attribute_name` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `oba_object_id` `object_id` INT(11) NOT NULL DEFAULT '0', CHANGE `oba_object_type` `object_type` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `oba_value` `value` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `oba_obj_status` `obj_status` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A', CHANGE `oba_cr_date` `cr_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `oba_cr_uid` `cr_uid` INT(11) NOT NULL DEFAULT '0', CHANGE `oba_lu_date` `lu_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `oba_lu_uid` `lu_uid` INT(11) NOT NULL DEFAULT '0'";

    $commands[] = "ALTER TABLE `objectdata_log` CHANGE `obl_id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `obl_object_type` `object_type` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `obl_object_id` `object_id` INT(11) NOT NULL DEFAULT '0', CHANGE `obl_op` `op` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `obl_diff` `diff` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obl_obj_status` `obj_status` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A', CHANGE `obl_cr_date` `cr_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `obl_cr_uid` `cr_uid` INT(11) NOT NULL DEFAULT '0', CHANGE `obl_lu_date` `lu_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `obl_lu_uid` `lu_uid` INT(11) NOT NULL DEFAULT '0'";

    $commands[] = "ALTER TABLE `objectdata_meta` CHANGE `obm_id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `obm_module` `module` VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `obm_table` `tablename` VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `obm_idcolumn` `idcolumn` VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `obm_obj_id` `obj_id` INT(11) NOT NULL DEFAULT '0', CHANGE `obm_permissions` `permissions` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_title` `dc_title` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_author` `dc_author` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_subject` `dc_subject` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_keywords` `dc_keywords` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_description` `dc_description` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_publisher` `dc_publisher` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_contributor` `dc_contributor` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_startdate` `dc_startdate` DATETIME NULL DEFAULT '1970-01-01 00:00:00', CHANGE `obm_dc_enddate` `dc_enddate` DATETIME NULL DEFAULT '1970-01-01 00:00:00', CHANGE `obm_dc_type` `dc_type` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_format` `dc_format` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_uri` `dc_uri` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_source` `dc_source` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_language` `dc_language` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_relation` `dc_relation` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_coverage` `dc_coverage` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_entity` `dc_entity` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_comment` `dc_comment` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_dc_extra` `dc_extra` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `obm_obj_status` `obj_status` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A', CHANGE `obm_cr_date` `cr_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `obm_cr_uid` `cr_uid` INT(11) NOT NULL DEFAULT '0', CHANGE `obm_lu_date` `lu_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00', CHANGE `obm_lu_uid` `lu_uid` INT(11) NOT NULL DEFAULT '0'";

    $commands[] = "DROP TABLE sc_anticracker";

    $commands[] = "DROP TABLE sc_log_event";

    $commands[] = "UPDATE module_vars SET modname = 'ZConfig' WHERE modname = '/PNConfig'";
    $silentCommands = array();
    $silentCommands[] = "ALTER TABLE message CHANGE pn_mid mid INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE pn_title title VARCHAR(100) NOT NULL DEFAULT  '',
CHANGE pn_content content LONGTEXT NOT NULL ,
CHANGE pn_date date INT(11) NOT NULL DEFAULT  '0',
CHANGE pn_expire expire INT(11) NOT NULL DEFAULT  '0',
CHANGE pn_active active INT(11) NOT NULL DEFAULT  '1',
CHANGE pn_view view INT(11) NOT NULL DEFAULT  '1',
CHANGE pn_language language VARCHAR(30) NOT NULL DEFAULT  ''";
    $silentCommands[] = "ALTER TABLE pagelock CHANGE plock_id id INT(11) NOT NULL AUTO_INCREMENT";
    $silentCommands[] = "ALTER TABLE pagelock CHANGE plock_name name VARCHAR(100) NOT NULL";
    $silentCommands[] = "ALTER TABLE pagelock CHANGE plock_cdate cdate DATETIME NOT NULL";
    $silentCommands[] = "ALTER TABLE pagelock CHANGE plock_edate edate DATETIME NOT NULL";
    $silentCommands[] = "ALTER TABLE pagelock CHANGE plock_session session VARCHAR(50) NOT NULL";
    $silentCommands[] = "ALTER TABLE pagelock CHANGE plock_title title VARCHAR(100) NOT NULL";
    $silentCommands[] = "ALTER TABLE pagelock CHANGE plock_ipno ipno VARCHAR(30) NOT NULL";

    // LONGBLOB is not supported by Doctrine 2
    $silentCommands[] = "ALTER TABLE workflows CHANGE debug debug LONGTEXT NULL DEFAULT NULL";
    $silentCommands[] = "ALTER TABLE group_applications CHANGE application application LONGTEXT NOT NULL";

    // Handle case of andreas08 themes on linux environments.
    $silentCommands[] = "UPDATE themes SET name = 'Andreas08', directory = 'Andreas08' WHERE name = 'andreas08'";
    $silentCommands[] = "UPDATE module_vars SET value = 's:9:\"Andreas08\";' WHERE modname = 'ZConfig' AND value ='s:9:\"andreas08\";'";

    foreach ($commands as $sql) {
        $stmt = $connection->prepare($sql);
        $stmt->execute();
    }

    foreach ($silentCommands as $sql) {
        $stmt = $connection->prepare($sql);
        try {
            $stmt->execute();
        } catch (Exception $e) {
            // Silent - trap and toss exceptions.
        }
    }
}
