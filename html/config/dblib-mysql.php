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
 * Convert a code starting with a letter to a code starting begining with 
 * a number and viceversa.
 * 
 * @param string $clientCode
 * @param string $type
 * 
 * @return string Client code transformed
 */
function transformClientCode($clientCode, $type = 'letter2num') {
    if ($type == 'letter2num') {
        $pattern = '/^[abce]\d{7}$/'; // Matches a1234567
        if (preg_match($pattern, $clientCode)) {
            // Convert uname begining with a letter to uname begining with a number
            $search = array('a', 'b', 'c', 'e');
            $replace = array('0', '1', '2', '4');
            $clientCode = str_replace($search, $replace, $clientCode);
        }
    } elseif ($type == 'num2letter') {
        $pattern = '/^\d{8}$/'; // Matches 01234567
        if (preg_match($pattern, $clientCode)) {
            // Convert first number into a letter
            switch ($clientCode[0]) {
                case '0':
                    $clientCode[0] = 'a';
                    break;
                case '1':
                    $clientCode[0] = 'b';
                    break;
                case '2':
                    $clientCode[0] = 'c';
                    break;
                case '4':
                    $clientCode[0] = 'e';
                    break;
            }
        }
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
 * Check if the specified DNS is valid to avoid security problems
 * @param type $dns
 * @return type boolean True if specified DNS is correct; false otherwise
 */
function isValidDNS($dns){
    if (strlen($dns)>30 || !preg_match("/^[a-z0-9-]+$/", $dns)) {
        return false;
    }
    return true;
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

    if (!isValidDNS($dns)){
        return false;
    }

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
    $clientCode = '';
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $clientCode = $row['clientCode'];
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
    
    // Get clientCode
    if (!empty($clientCode)){
        $value['clientCode'] = $clientCode;
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

    if (!isValidDNS($dns)){
        return false;
    }

    // If cookie is present load it and return
    if (isset($_COOKIE[$agora['server']['cookie']])) {
        $cookie = $_COOKIE[$agora['server']['cookie']];
        if (isValidCookie($cookie)) {
            $data = explode('__', $cookie);
            if ($data[0] == $dns) {
                $school_info['clientCode'] = $data[1];
                $school_info['new_dns'] = $data[2];
                $school_info['id_moodle'] = $data[3];
                $school_info['database_moodle'] = $data[4];
                $school_info['diskPercent_moodle'] = $data[5];
                $school_info['is_marsupial'] = $data[6];
                $school_info['id_moodle2'] = $data[7];
                $school_info['database_moodle2'] = $data[8];
                $school_info['diskPercent_moodle2'] = $data[9];
                $school_info['id_intranet'] = $data[10];
                $school_info['database_intranet'] = $data[11];
                $school_info['dbhost_intranet'] = $data[12];
                $school_info['diskPercent_intranet'] = $data[13];
                $school_info['version_intranet'] = $data[14];
                $school_info['id_nodes'] = $data[15];
                $school_info['database_nodes'] = $data[16];
                $school_info['dbhost_nodes'] = $data[17];
                $school_info['diskPercent_nodes'] = $data[18];

                // Debug info
                $school_info['source'] = 'Cookie';

                return $school_info;
            }
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
                } else if ($service == 'moodle2' && !array_key_exists('id_moodle2', $school_info)) {
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
    if ((isset($school_info)) && 
        (!empty($school_info['id_moodle']) || !empty($school_info['id_moodle2']) || !empty($school_info['id_intranet']) || !empty($school_info['id_nodes']))) {

        $bodycookie = $dns 
                . '__' . (array_key_exists('clientCode', $school_info) ? $school_info['clientCode'] : '')
                . '__' . (isset($school_info['new_dns']) ? $school_info['new_dns'] : '')
                . '__' . (array_key_exists('id_moodle', $school_info) ? $school_info['id_moodle'] : '')
                . '__' . (array_key_exists('database_moodle', $school_info) ? $school_info['database_moodle'] : '')
                . '__' . (array_key_exists('diskPercent_moodle', $school_info) ? $school_info['diskPercent_moodle'] : '')
                . '__' . (array_key_exists('is_marsupial', $school_info) ? $school_info['is_marsupial'] : '')
                . '__' . (array_key_exists('id_moodle2', $school_info) ? $school_info['id_moodle2'] : '')
                . '__' . (array_key_exists('database_moodle2', $school_info) ? $school_info['database_moodle2'] : '')
                . '__' . (array_key_exists('diskPercent_moodle2', $school_info) ? $school_info['diskPercent_moodle2'] : '')
                . '__' . (array_key_exists('id_intranet', $school_info) ? $school_info['id_intranet'] : '')
                . '__' . (array_key_exists('database_intranet', $school_info) ? $school_info['database_intranet'] : '')
                . '__' . (array_key_exists('dbhost_intranet', $school_info) ? $school_info['dbhost_intranet'] : '')
                . '__' . (array_key_exists('diskPercent_intranet', $school_info) ? $school_info['diskPercent_intranet'] : '')
                . '__' . (array_key_exists('version_intranet', $school_info) ? $school_info['version_intranet'] : '')
                . '__' . (array_key_exists('id_nodes', $school_info) ? $school_info['id_nodes'] : '')
                . '__' . (array_key_exists('database_nodes', $school_info) ? $school_info['database_nodes'] : '')
                . '__' . (array_key_exists('dbhost_nodes', $school_info) ? $school_info['dbhost_nodes'] : '')
                . '__' . (array_key_exists('diskPercent_nodes', $school_info) ? $school_info['diskPercent_nodes'] : '');

        // Add hash to the text for the cookie
        $cookiesalt = $agora['admin']['username'] . substr($agora['admin']['userpwd'], 0, 3);
        $bodycookie .= '__h_' . md5($bodycookie . $cookiesalt);

        setcookie($agora['server']['cookie'], $bodycookie, 0, '/');
    }

    return $school_info;
}

/**
 * Check if cookie has been modified by user. This is not allowed and might be
 *  an attempt of unauthorized access.
 * 
 * @global type $agora
 * @param string $cookie
 * @return boolean 
 */
function isValidCookie($cookie) {

    global $agora;
    
    // Get cookie information
    $cookie = explode('__h_', $cookie);
    $cookiedata = $cookie[0];
    $cookiehash = $cookie[1];

    // Build hash in server side
    $cookiesalt = $agora['admin']['username'] . substr($agora['admin']['userpwd'], 0, 3);
    $cookiedata .= $cookiesalt;
    $serverhash = md5($cookiedata);

    // Compare cookie hash with server hash
    if ($serverhash == $cookiehash) {
        return true;
    } else {
        return false;
    }
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

    if (!isValidDNS($dns)){
        return false;
    }
    
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

    $con = oci_pconnect($agora['moodle2']['userprefix'] . $school['id'], $agora['moodle']['userpwd'], $school['database']);
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
 * @param string $service: the name of the service (intranet or moodle2)
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
            $sql = 'SELECT c.version
                    FROM `agoraportal_client_services` c
                    LEFT JOIN `agoraportal_services` s ON c.serviceId = s.serviceId
                    WHERE s.serviceName = \'' . $service . '\'
                    AND c.activedId = ' . $row['id'] . ' 
                    AND c.dbHost = \'' . $row['dbHost'] . '\'';

            if (!$result2 = mysql_query($sql)) {
                echo 'S\'ha produ&iuml;t un error MySQL: ' . mysql_error();
                mysql_close($con);
                return false;
            }

            if ($row2 = mysql_fetch_assoc($result2)) {
                $schools[$row['id']] = array('dbhost' => $row['dbHost'], 'zkversion' => $row2['version']);
            }
        }
    } elseif ($service == 'moodle2') {
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
function getMoodleDirrot($school_info, $service='moodle') {
    $moodle_dirroot = 'moodle';
    switch ($service) {
        case 'moodle':
            $moodle_dirroot = 'copiaseg';
            break;
        case 'moodle2':
            // If client has param 'extraFunc' with value 'moodle2', changes $moodle_dirroot 
            $moodle_dirroot = (checkExtraFunc(transformClientCode($school_info['clientCode'], 'num2letter'))) ? 'moodle2' : 'moodle';
            break;
    }
    return $moodle_dirroot;
}


/**
 * Checks param extraFunc, associated to a client. Returns true if value 
 * is 'moodle2' and false otherwise.
 *
 * @param string $clientCode
 * @return boolean 
 */
function checkExtraFunc($clientCode) {

    // Open DB connection to adminagora
    if (!$con = opendb()) {
        return false;
    }
    
    $return = false;

    $sql = 'SELECT extraFunc
            FROM `agoraportal_clients`
            WHERE clientCode = \'' . $clientCode . '\'';

    if (!$result = mysql_query($sql)) {
        echo 'S\'ha produ&iuml;t un error MySQL: ' . mysql_error();
    } else {
        if ($row = mysql_fetch_assoc($result)) {
            if ($row['extraFunc'] == 'moodle2') {
                $return = true;
            }
        }
    }

    mysql_close($con);
    return $return;
}

/**
 * Format bytes to human readable 
 *
 * @param float $size
 * @return string
 */
 

function formatBytes($size, $precision = 2)
{
    $base = log($size) / log(1024);
    $suffixes = array('', 'k', 'M', 'G', 'T');   

    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}
