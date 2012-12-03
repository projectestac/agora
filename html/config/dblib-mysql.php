<?php

/**
 * Open a connection to the administration database
 *
 * @return Connection handler
 */
function opendb() {
    global $agora;
    require_once('env-config.php');

    $server = $agora['admin']['host'] . ':' . $agora['admin']['port'];

    if (!$con = mysql_connect($server, $agora['admin']['username'], $agora['admin']['userpwd']))
        return false;

    if (!mysql_select_db($agora['admin']['database'], $con))
        return false;

    return $con;
}

/**
 * Close a connection to the administration database
 *
 * @return boolean
 */
function disconnectdb($con) {
    return mysql_close($con);
}

/**
 * Calculate the used disk percentage.
 * 
 * @param float $diskConsume
 * @param float $diskSpace
 * 
 * @return int disk disk percentage (without decimals)
 */
function getDiskPercent($diskConsume, $diskSpace) {
    $diskPercent = 0;
    if ($diskSpace != 0) {
        $diskPercent = round((($diskConsume / 1024) / $diskSpace) * 100);
    }
    return $diskPercent;
}

/**
 * Convert code begining with a letter to code begining with a number
 * 
 * @param string $clientCode
 * 
 * @return string client code, replacing first letter for its number (a->0, b->1...)
 */
function transformClientCode($clientCode) {
    $pattern = '/^[abce]\d{7}$/'; // Matches a1234567
    if (preg_match($pattern, $clientCode)) {
        // Convert uname begining with a letter to uname begining with a number
        $search = array('a', 'b', 'c', 'e');
        $replace = array('0', '1', '2', '4');
        $clientCode = str_replace($search, $replace, $clientCode);
    }
    return $clientCode;
}

/**
 * Get all schools database information needed to connect
 *
 * @param $codeletter: false means code will be 08000000
 *                     true  means code will be a8000000
 *
 * @return Array with the schools information
 */
function getAllSchoolsDBInfo($codeletter = false) {
    if (!$con = opendb())
        return false;

    $sql = 'SELECT c.clientId, c.clientCode, cs.activedId, cs.serviceDB, cs.dbHost, c.clientDNS, s.serviceName, c.clientOldDNS, c.typeId, cs.diskSpace, cs.diskConsume, cs.version
			FROM agoraportal_clients c, agoraportal_client_services cs, agoraportal_services s
			WHERE c.clientId = cs.clientId AND cs.serviceId = s.serviceId AND cs.state = "1"
			ORDER BY c.clientDNS';

    if (!$result = mysql_query($sql, $con)) {
        return false;
    }

    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

        $diskPercent = getDiskPercent($row['diskConsume'], $row['diskSpace']);

        // Transform client code if required (a8000000 -> 08000000)
        if (!$codeletter) {
            $clientCode = transformClientCode($row['clientCode']);
        } else {
            $clientCode = $row['clientCode'];
        }

        $values[] = array(
            'id' => $row['activedId'],
            'code' => $clientCode,
            'dbhost' => $row['dbHost'],
            'database' => $row['serviceDB'],
            'dns' => $row['clientDNS'],
            'type' => $row['typeId'],
            'service' => $row['serviceName'],
            'old_dns' => $row['clientOldDNS'],
            'diskPercent' => $diskPercent,
            'version' => $row['version']);
    }
    mysql_close($con);

    return $values;
}

/**
 * Get school info from adminagora tables
 *  
 * @author aregi
 *
 * @param order     ordenation parameter of the result 
 * @param desc      ordenation of the result
 * @param service   service information requested
 * @param state     state of service requested
 *
 * @return school        Array with the schools information (database)
 */
function getAllSchools($order = 'school_id', $desc = 'asc', $service='all', $state='all') {

    require_once('env-config.php');

    $values = array();
    if (!isset($order) || $order == '') {
        $order = 'school_id';
    }
    if (!isset($desc) || $desc == '') {
        $desc = 'asc';
    }
    if (!isset($service) || $service == '') {
        $service = 'all';
    }

    $serviceSqlText = '';
    if ($service != 'all') {
        $serviceSqlText = " serviceName='$service' ";
    }

    $stateSqlText = '';
    if ($state != 'all') {
        if ($serviceSqlText == '') {
            $stateSqlTex = "state='$state' ";
        } else {
            $stateSqlText = " AND state='$state' ";
        }
    }

    $sql = "SELECT *
            FROM `agoraportal_client_services` s
            LEFT JOIN `agoraportal_clients` c ON s.clientID = c.clientID
            LEFT JOIN `users` u ON u.uname = c.clientCode
            LEFT JOIN `agoraportal_location` l ON c.locationId = l.locationId
            LEFT JOIN `agoraportal_clientType` t ON c.typeId = t.typeID
            LEFT JOIN `agoraportal_services` k ON k.serviceId = s.serviceId
            WHERE " . $serviceSqlText . " " . $stateSqlText . "
            ORDER BY " . $order . " " . $desc;

    if ($con = opendb()) {
        $stmt = mysql_query($sql, $con);
        if (!$stmt) {
            return array('msg' => 'No s\'han pogut carregar les dades dels centres.');
        } else {
            while ($row = mysql_fetch_array($stmt, MYSQL_ASSOC)) {
                $values[$row['activedId']] = array(
                    'school_id' => $row['activedId'],
                    'school_code' => $row["clientCode"],
                    'school_user' => $row["uname"],
                    'school_user_profile' => $row["contactProfile"],
                    'school_address' => $row["clientAddress"],
                    'school_pwd' => $row["pass"],
                    'school_city' => $row["clientCity"],
                    'school_posta_code' => $row["clientPC"],
                    'school_country' => $row["clientCountry"],
                    'school_name' => $row["clientName"],
                    'school_dns' => $row["clientDNS"],
                    'school_typeid' => $row["typeId"], 'school_typename' => $row["typeName"],
                    'school_locationid' => $row["locationId"],
                    'school_locationname' => $row["locationName"],
                    'dbhost' => $row["dbHost"],
                    'service' => $row["serviceId"],
                    'database' => $row["serviceDB"],
                    'observations' => $row["observations"],
                    'annotations' => $row["annotations"],
                    'state' => $row["state"],
                    'school_address' => $row["clientAddress"],
                    'timecreated' => $row["timeCreated"],
                    'timemodified' => $row["timeEdited"],
                    'educat' => $row["educat"]);
            }
        }
    }

    disconnectdb($con);
    return $values;
}

/**
 * Get the information of the specified school
 *
 * @param $dns school dns
 * @param $codeletter: false means code will be 08000000
 *                     true  means code will be a8000000
 * 
 * @return array with the schools information
 */
function getSchoolDBInfo($dns, $codeletter = false) {

    if (!$con = opendb()) {
        return false;
    }

    $sql = 'SELECT c.clientId, c.clientCode, cs.activedId, cs.serviceDB, cs.dbHost, c.typeId, s.serviceName, cs.diskSpace, cs.diskConsume
			FROM agoraportal_clients c, agoraportal_client_services cs, agoraportal_services s
			WHERE c.clientId = cs.clientId AND cs.serviceId = s.serviceId AND cs.state = "1"
			AND c.clientDNS = "' . $dns . '"';

    if (!$result = mysql_query($sql, $con)) {
        return false;
    }

    $value = array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

        $diskPercent = getDiskPercent($row['diskConsume'], $row['diskSpace']);
        $service = $row['serviceName'];

        if ($service == 'marsupial') {
            $value['is_' . $service] = 1;
        }

        $value['id_' . $service] = $row['activedId'];
        $value['dbhost_' . $service] = $row['dbHost'];
        $value['database_' . $service] = $row['serviceDB'];
        $value['diskPercent_' . $service] = $diskPercent;

        // Transform client code if required (a8000000 -> 08000000)
        if (!$codeletter) {
            $clientCode = transformClientCode($row['clientCode']);
        } else {
            $clientCode = $row['clientCode'];
        }

        // Do not overwrite type
        if (empty($value['type']))
            $value['type'] = $row['typeId'];
    }

    // Get new DNS
    $sql = 'SELECT c.clientDNS
			FROM agoraportal_clients c
			WHERE c.clientState = "1" AND c.clientOldDNS = "' . $dns . '"';

    if ($result = mysql_query($sql, $con)) {
        $row = mysql_fetch_assoc($result);
        $value['new_dns'] = $row['clientDNS'];
    }

    mysql_close($con);

    return $value;
}

/**
 * Variable $source can manage where to read connection info
 * 
 * @param dns
 * @param data source if there's no cookie. Possible values 1 or 2:
 *          1 = From all clients filenamed allSchools (default)
 *          2 = From database (used also in errors)
 * 
 * @return array Array with the school information
 */
function getSchoolInfoFromFile($dns, $source = 1, $service = null) {
    global $agora;

    // If cookie is present load it and return
    if (isset($_COOKIE[$agora['server']['cookie']])) {
        $data = explode('--', $_COOKIE[$agora['server']['cookie']]);
        if ($data[0] == $dns) {
            $school_info['type'] = $data[1];
            $school_info['id_moodle'] = $data[2];
            $school_info['database_moodle'] = $data[3];
            $school_info['id_intranet'] = $data[4];
            $school_info['database_intranet'] = $data[5];
            $school_info['new_dns'] = $data[6];
            $school_info['diskPercent_moodle'] = $data[7];
            $school_info['diskPercent_intranet'] = $data[8];
            $school_info['clientCode'] = $data[9];
            $school_info['is_marsupial'] = $data[10];
            $school_info['dbhost_intranet'] = $data[11];
            $school_info['id_moodle2'] = $data[12];
            $school_info['database_moodle2'] = $data[13];
            $school_info['diskPercent_moodle2'] = $data[14];

            // Debug info
            $school_info['source'] = 'Cookie';

            return $school_info;
        }
    }

    // If cookie not set or invalid, continue
    // Load file with connection info of all clients
    if ($source == 1) {
        if (file_exists($agora['dbsource']['dir'] . $agora['dbsource']['filename'])) {
            include_once($agora['dbsource']['dir'] . $agora['dbsource']['filename']);
            if (array_key_exists($dns, $schools)) {
                $school_info = $schools[$dns];
            }
        }

        if (isset($school_info)) {
            // Debug info
            $school_info['source'] = 'allSchools';
            if (isset($service)) {
                if ($service == 'moodle' && !array_key_exists('id_moodle', $school_info)) {
                    $school_info = null;
                } else if ($service == 'intranet' && !array_key_exists('id_intranet', $school_info)) {
                    $school_info = null;
                }
            }
        }
    }

    // If error or other source specified, retrieve from Database
    if (!isset($school_info)) {
        $school_info = getSchoolDBInfo($dns);
        // Debug info
        $school_info['source'] = 'DB';
    }

    // Set cookie only if there is information (a moodle or a zikula)
    if (isset($school_info) && (!empty($school_info['id_moodle']) || !empty($school_info['id_intranet']))) {

        $bodycookie = $dns . '--' . (array_key_exists('type', $school_info) ? $school_info['type'] : '')
                . '--' . (array_key_exists('id_moodle', $school_info) ? $school_info['id_moodle'] : '')
                . '--' . (array_key_exists('database_moodle', $school_info) ? $school_info['database_moodle'] : '')
                . '--' . (array_key_exists('id_intranet', $school_info) ? $school_info['id_intranet'] : '')
                . '--' . (array_key_exists('database_intranet', $school_info) ? $school_info['database_intranet'] : '')
                . '--' . (isset($school_info['new_dns']) ? $school_info['new_dns'] : '')
                . '--' . (array_key_exists('diskPercent_moodle', $school_info) ? $school_info['diskPercent_moodle'] : '')
                . '--' . (array_key_exists('diskPercent_intranet', $school_info) ? $school_info['diskPercent_intranet'] : '')
                . '--' . (array_key_exists('clientCode', $school_info) ? $school_info['clientCode'] : '')
                . '--' . (array_key_exists('is_marsupial', $school_info) ? $school_info['is_marsupial'] : '')
                . '--' . (array_key_exists('dbhost_intranet', $school_info) ? $school_info['dbhost_intranet'] : '')
                . '--' . (array_key_exists('id_moodle2', $school_info) ? $school_info['id_moodle2'] : '')
                . '--' . (array_key_exists('database_moodle2', $school_info) ? $school_info['database_moodle2'] : '')
                . '--' . (array_key_exists('diskPercent_moodle2', $school_info) ? $school_info['diskPercent_moodle2'] : '');

        setcookie($agora['server']['cookie'], $bodycookie, 0, '/');
    }

    return $school_info;
}

/**
 * Prints a message if DEBUG_ENABLED is on
 * 
 */
function xtec_debug($string) {
    if (DEBUG_ENABLED == 'on')
        print "<pre>$string</pre>\n\r";
}

/**
 * Get diskConsume and diskSpace 
 * 
 * @param dns
 */
function getDiskInfo($dns, $service) {
    if (!$con = opendb())
        return false;

    $sql = 'SELECT s.serviceName, cs.diskSpace, cs.diskConsume
			FROM agoraportal_clients c, agoraportal_client_services cs, agoraportal_services s
			WHERE c.clientId = cs.clientId AND cs.serviceId = s.serviceId AND cs.state = "1"
			AND c.clientDNS = "' . $dns . '"';

    if (!$result = mysql_query($sql, $con))
        return false;

    $value = array();

    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        if ($row['serviceName'] == $service) {
            $value['diskConsume'] = $row['diskConsume'];
            $value['diskSpace'] = $row['diskSpace'];
        }
    }

    mysql_close($con);
    return $value;
}

/**
 *
 * @param string $haystack
 * @param string $needle
 * @return boolean 
 */
function endsWith($haystack, $needle) {
    $length = strlen($needle);
    $start = $length * -1; //negative
    return (substr($haystack, $start) === $needle);
}

/* * ****** MOODLE ******* */

/**
 * Open a connection to the specified Moodle instance and return it
 *
 * @param school        Array with the school information (id and database)
 *
 * @return A connection handler or FALSE on error.
 */
function connect_moodle($school) {
    global $agora;

    $con = oci_pconnect($agora['moodle']['username'] . $school['id'], $agora['moodle']['userpwd'], $school['database']);
    return $con;
}

/**
 * Close specified Moodle connection
 *
 * @param con        The Moodle database connection
 *
 * @return Returns TRUE on success or FALSE on failure.
 */
function disconnect_moodle($con) {
    return oci_close($con);
}


/* * ****** INTRANET ******* */

/**
 * Open a connection to the specified Intranet database and return it
 *
 * @param school        Array with the school information (database)
 *
 * @return Connection handler
 */
function connect_intranet($school) {
    global $agora;

    $con = mysql_connect($school['dbhost'], $agora['intranet']['username'], $agora['intranet']['userpwd']);
    if (!mysql_select_db($agora['intranet']['userprefix'] . $school['id'], $con))
        return false;
    return $con;
}

/**
 * Close specified Intranet connection
 *
 * @param con       The Intranet database connection
 *
 * @return boolean  TRUE on success or FALSE on failure.
 */
function disconnect_intranet($con) {
    return mysql_close($con);
}

/**
 * Gets one intranet or Moodle per data base server. Returns the lowest ID.
 * 
 * @author aginard
 * 
 * @param string $service: the name of the service (intranet or moodle)
 * 
 * @return array list of schools
 */
function getServicesToTest($service) {

    // Open DB connection to adminagora
    if (!$con = opendb()) {
        return false;
    }

    if ($service == 'intranet') {
        // Get the list of intranets to test
        $sql = 'SELECT dbHost, min(activedId) as id
                FROM `agoraportal_client_services` c
                LEFT JOIN `agoraportal_services` s ON c.serviceId = s.serviceId
                WHERE serviceName = \'' . $service . '\'
                AND activedId !=0
                GROUP BY dbHost';

        if (!$result = mysql_query($sql)) {
            echo 'S\'ha produ&iuml;t un error MySQL: ' . mysql_error();
            mysql_close($con);
            return false;
        }

        while ($row = mysql_fetch_assoc($result)) {
            $schools[$row['id']] = $row['dbHost'];
        }
    } elseif ($service == 'moodle') {
        // Get the list of Moodles to test
        $sql = 'SELECT serviceDB, min(activedId) as id
                FROM `agoraportal_client_services` c
                LEFT JOIN `agoraportal_services` s ON c.serviceId = s.serviceId
                WHERE serviceName = \'' . $service . '\'
                AND activedId !=0
                GROUP BY serviceDB';

        if (!$result = mysql_query($sql)) {
            echo 'S\'ha produ&iuml;t un error MySQL: ' . mysql_error();
            mysql_close($con);
            return false;
        }

        while ($row = mysql_fetch_assoc($result)) {
            $schools[$row['id']] = $row['serviceDB'];
        }
    }

    mysql_close($con);

    return $schools;
}


/**
 * Get dirroot for specified service (depending on the Moodle services actived)
 * @param type $school_info
 * @param type $service
 * @return string 
 */

function getMoodleDirrot($school_info, $service='moodle'){
    $moodle_dirroot = 'moodle';
    switch ($service){
        case 'moodle':
            // If is enabled moodle2 service, moodle 1.9 is accessed by antic URL
            if (array_key_exists('id_moodle2', $school_info) && !empty($school_info['id_moodle2'])) $moodle_dirroot = 'antic';    
            break;
        case 'moodle2':
            break;
    }
    return $moodle_dirroot;
}
