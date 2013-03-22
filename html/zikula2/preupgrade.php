<?php

/**
 * Open a connection to the administration database
 *
 * @return Connection handler
 */
global $ZConfig;

function connectdb() {
    require_once('config/config.php');
    if (!$con = mysql_connect($ZConfig['DBInfo']['databases']['default']['host'] . ':' . '80', $ZConfig['DBInfo']['databases']['default']['user'], $ZConfig['DBInfo']['databases']['default']['password']))
        return false;
    if (!mysql_select_db($ZConfig['DBInfo']['databases']['default']['dbname'], $con))
        return false;
    return $con;
}

if (!$con = connectdb())
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
    $prefix . '_' . 'counter',
);

foreach ($tables as $table) {
    $sql = "DROP TABLE $table";
    if (!$result = mysql_query($sql, $con)) {
        // die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
}

//******* buidem taules la informació de les quals no es necessita
$tables = array($prefix . '_' . 'session_info',
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
    'Thumbnail',
    'Downloads',
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
$commands[] = 'TRUNCATE TABLE hooks';


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
    'Thumbnail',
//    'Downloads',
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

// activate the module IWdocmanager
//*** Conserve Download module tables for security reasons ***/
// add module in modules table
$sql = "INSERT INTO `modules` (`pn_name`, `pn_type`, `pn_displayname`, `pn_url`, `pn_description`, `pn_directory`, `pn_version`, `pn_state`, `pn_securityschema`) VALUES
('IWdocmanager', 2, 'Gestió de documents', 'documents', 'Mòdul de gestió documental i control de versions.', 'IWdocmanager', '0.0.1', 3, 'a:1:{s:14:\"IWdocmanager::\";s:2:\"::\";}');";
if (!$result = mysql_query($sql, $con)) {
    die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
}
// add default module vars
// get module Downloads folder var current value
$sql = "select pn_value from module_vars where pn_modname='Downloads' AND pn_name='upload_folder'";
if (!$result = mysql_query($sql, $con)) {
    die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
}
$value = mysql_fetch_row($result);

$sql = "INSERT INTO module_vars (`pn_modname`, `pn_name`, `pn_value`) VALUES
    ('IWdocmanager','documentsFolder','" . $value[0] . "'),
    ('IWdocmanager','notifyMail',''),
    ('IWdocmanager','editTime','30'),
    ('IWdocmanager','deleteTime','20');";
if (!$result = mysql_query($sql, $con)) {
    die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (!$result = mysql_query($sql, $con)) {
    die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (!$result = mysql_query($sql, $con)) {
    die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
}

// transer data from module Downloads to the module IWdocmanager
// get add transfer categories
$document_categories = array();
$sql = "SELECT * from downloads_categories order by pn_cid";
if (!$result = mysql_query($sql, $con)) {
    die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
}
while ($fila = mysql_fetch_array($result, MYSQL_NUM)) {
    $document_categories[] = array('categoryId' => $fila[0],
        'parentId' => $fila[1],
        'categoryName' => $fila[2],
        'description' => $fila[3],
    );
}

if (!empty($document_categories)) {
    $sql = 'INSERT INTO IWdocmanager_categories (`categoryId`, `parentId`, `categoryName`, `description`, `active`, `groups`, `groupsAdd`) VALUES ';
    foreach ($document_categories as $oneentry) {
        $sql .= "(" . mysql_real_escape_string($oneentry['categoryId']) . "," . mysql_real_escape_string($oneentry['parentId']) . ",'" . mysql_real_escape_string($oneentry['categoryName']) . "','" . mysql_real_escape_string($oneentry['description']) . "',1,'a:0:{}','a:0:{}'),";
    }
    // remove last , from sql string
    $sql = substr($sql, 0, strlen($sql) - 1);
    $sql .= ';';

    if (!$result = mysql_query($sql, $con)) {
        die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
}


// get and transfer documents information
$documents = array();
$sql = "SELECT * from downloads_downloads order by pn_lid";
if (!$result = mysql_query($sql, $con)) {
    die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
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
        die('Error: ' . $sql . ' - ERROR: ' . mysql_error());
    }
}


// change links of module Downloads to IWdocmanager
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