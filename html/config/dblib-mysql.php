<?php

/**
 * Calculate the used disk percentage.
 *
 * @param float $diskConsume
 * @param float $diskSpace
 *
 * @return int disk disk percentage (without decimals)
 */
function getDiskPercent($diskConsume, $diskSpace) {
    if ($diskSpace != 0) {
        return round((($diskConsume / 1024) / $diskSpace) * 100);
    }
    return 0;
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
    $sql = 'SELECT c.clientId, c.clientCode, cs.activedId, cs.serviceDB, cs.dbHost, c.clientDNS, s.serviceName, c.clientOldDNS, c.typeId, cs.diskSpace, cs.diskConsume, cs.version
			FROM agoraportal_clients c, agoraportal_client_services cs, agoraportal_services s
			WHERE c.clientId = cs.clientId AND cs.serviceId = s.serviceId AND cs.state = "1"
			ORDER BY c.clientDNS';

    $results = get_rows_from_db($sql);
    if (!$results) {
        return false;
    }

    foreach ($results as $row) {

        $diskPercent = getDiskPercent($row->diskConsume, $row->diskSpace);

        // Transform client code if required (a8000000 -> 08000000)
        if (!$codeletter) {
            $clientCode = transformClientCode($row->clientCode);
        } else {
            $clientCode = $row->clientCode;
        }

        $values[] = array(
            'id' => $row->activedId,
            'code' => $clientCode,
            'dbhost' => $row->dbHost,
            'database' => $row->serviceDB,
            'dns' => $row->clientDNS,
            'type' => $row->typeId,
            'service' => $row->serviceName,
            'old_dns' => $row->clientOldDNS,
            'diskPercent' => $diskPercent,
            'version' => $row->version);
    }

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

    $results = get_rows_from_db($sql);

    if (!$results) {
        return array('msg' => 'No s\'han pogut carregar les dades dels centres.');
    } else {
        foreach ($results as $row) {
            $values[$row->activedId] = array(
                'school_id' => $row->activedId,
                'school_code' => $row->clientCode,
                'school_user' => $row->uname,
                'school_user_profile' => $row->contactProfile,
                'school_address' => $row->clientAddress,
                'school_pwd' => $row->pass,
                'school_city' => $row->clientCity,
                'school_posta_code' => $row->clientPC,
                'school_country' => $row->clientCountry,
                'school_name' => $row->clientName,
                'school_dns' => $row->clientDNS,
                'school_typeid' => $row->typeId,
                'school_typename' => $row->typeName,
                'school_locationid' => $row->locationId,
                'school_locationname' => $row->locationName,
                'dbhost' => $row->dbHost,
                'service' => $row->serviceId,
                'database' => $row->serviceDB,
                'observations' => $row->observations,
                'annotations' => $row->annotations,
                'state' => $row->state,
                'school_address' => $row->clientAddress,
                'timecreated' => $row->timeCreated,
                'timemodified' => $row->timeEdited,
                'educat' => $row->educat);
        }
    }
    return $values;
}

/**
 * Check if the specified DNS is valid to avoid security problems
 * @param type $dns
 * @return type boolean True if specified DNS is correct; false otherwise
 */
function isValidDNS($dns) {
    if (strlen($dns) > 30 || !preg_match("/^[a-z0-9-_]+$/", $dns)) {
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

    if (!isValidDNS($dns)) {
        return false;
    }

    $sql = 'SELECT c.clientId, c.clientCode, cs.activedId, cs.serviceDB, cs.dbHost, c.typeId, s.serviceName, cs.diskSpace, cs.diskConsume
			FROM agoraportal_clients c, agoraportal_client_services cs, agoraportal_services s
			WHERE c.clientId = cs.clientId AND cs.serviceId = s.serviceId AND cs.state = "1"
			AND c.clientDNS = "' . $dns . '"';

    $results = get_rows_from_db($sql);
    if (!$results) {
        return false;
    }

    $value = array();
    $clientCode = '';
    foreach ($results as $row) {
        $clientCode = $row->clientCode;
        $diskPercent = getDiskPercent($row->diskConsume, $row->diskSpace);
        $service = $row->serviceName;

        if ($service == 'marsupial') {
            $value['is_' . $service] = 1;
        }

        $value['id_' . $service] = $row->activedId;
        $value['dbhost_' . $service] = $row->dbHost;
        $value['database_' . $service] = $row->serviceDB;
        $value['diskPercent_' . $service] = $diskPercent;

        // Transform client code if required (a8000000 -> 08000000)
        if (!$codeletter) {
            $clientCode = transformClientCode($row->clientCode);
        } else {
            $clientCode = $row->clientCode;
        }

        // Do not overwrite type
        if (empty($value['type'])){
            $value['type'] = $row->typeId;
        }
    }

    // Get clientCode
    if (!empty($clientCode)) {
        $value['clientCode'] = $clientCode;
    }

    // Get new DNS
    $sql = 'SELECT c.clientDNS
			FROM agoraportal_clients c
			WHERE c.clientState = "1" AND c.clientOldDNS = "' . $dns . '"';

    $results = get_rows_from_db($sql);
    if ($results && $row = array_shift($results)) {
        $value['new_dns'] = $row->clientDNS;
    }

    return $value;
}

function getSchoolInfo($service) {
    global $agora;

    // Debug code
    $debugenabled = isset($_GET['debug']) ? $_GET['debug']: 'off';
    define('DEBUG_ENABLED', $debugenabled);
    xtec_debug("DEBUG ENABLED: $debugenabled");
    // End debug

    // Get info from cookie if exists
    $iscli = false;
    $centre = false;
    if (isset($_REQUEST['ccentre'])) {
        $centre = $_REQUEST['ccentre'];
    } else if (defined('CLI_SCRIPT')) {
        if (isset($_SERVER['argv'])) {
            $argvs = $_SERVER['argv'];
            foreach ($argvs as $arg) {
                $parts = explode('=', $arg);
                if ($parts[0] == '--ccentre') {
                    $centre = $parts[1];
                }
            }
        }
    }

    if (empty($centre)) {
        school_error($service);
    }

    global $school_info;
    $school_info = getSchoolInfoFromFile($centre, 1, $service);
    if (!$school_info || !isset($school_info['id_'.$service]) || empty($school_info['id_'.$service])) {
        if (defined('CLI_SCRIPT')) {
            echo 'Center '.$centre.' not enabled';
            echo "\nerror\n";
        } else {
            if ($service == 'intranet' && isset($school_info['id_nodes']) && !empty($school_info['id_nodes'])) {
                header('location: '.WWWROOT.$_REQUEST['ccentre']);
            } else {
                header('location: '.WWWROOT.'error.php?s='.$service.'&dns='.$_REQUEST['ccentre']);
            }
        }
        exit(0);
    }
    xtec_debug($school_info['source']);

    return $centre;
}

// Envia a una pàgina d'error
function school_error($service) {
    if (defined('CLI_SCRIPT')) {
        echo 'Center '.$centre.' not enabled';
        echo "\nerror\n";
    } else {
        header('location: '.WWWROOT.'error.php?s='.$service.'&dns='.$_REQUEST['ccentre']);
    }
    exit(0);
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

    if (!isValidDNS($dns)) {
        return false;
    }

    // If cookie is present load it and return
    if (isset($_COOKIE[$agora['server']['cookie']])) {
        $cookie = $_COOKIE[$agora['server']['cookie']];
        if (isValidCookie($cookie)) {
            $data = explode('__', $cookie);
            if (count($data) == 16 && $data[0] == $dns) {
                $school_info['clientCode'] = $data[1];
                $school_info['is_marsupial'] = $data[2];
                $school_info['id_moodle2'] = $data[3];
                $school_info['database_moodle2'] = $data[4];
                $school_info['diskPercent_moodle2'] = $data[5];
                $school_info['id_intranet'] = $data[6];
                $school_info['database_intranet'] = $data[7];
                $school_info['dbhost_intranet'] = $data[8];
                $school_info['diskPercent_intranet'] = $data[9];
                $school_info['version_intranet'] = $data[10];
                $school_info['id_nodes'] = $data[11];
                $school_info['database_nodes'] = $data[12];
                $school_info['dbhost_nodes'] = $data[13];
                $school_info['diskPercent_nodes'] = $data[14];

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
            if (isset($schools[$dns])) {
                $school_info = $schools[$dns];
            }
        }

        if (isset($school_info)) {
            // Redirect to New DNS directly
            if (!empty($school_info['new_dns'])) {
                redirectNewDNS($centre, $school_info['new_dns'], $service);
            }

            // Debug info
            $school_info['source'] = 'allSchools';
            if (isset($service)) {
                if ($service == 'moodle2' && !isset($school_info['id_moodle2'])) {
                    $school_info = null;
                } else if ($service == 'intranet' && !isset($school_info['id_intranet']) && !isset($school_info['id_nodes'])) {
                    $school_info = null;
                } else if ($service == 'nodes' && !isset($school_info['id_nodes'])) {
                    $school_info = null;
                }
            }
        }
    }

    // If error or other source specified, retrieve from Database
    if (!isset($school_info) || empty($school_info)) {
        $school_info = getSchoolDBInfo($dns);

        // Redirect to New DNS directly
        if (!empty($school_info['new_dns'])) {
            redirectNewDNS($centre, $school_info['new_dns'], $service);
        }

        // Debug info
        $school_info['source'] = 'DB';
    }

    // Set cookie only if there is information (a moodle or a zikula)
    if (isset($school_info) && ( !empty($school_info['id_moodle2']) ||
                                 !empty($school_info['id_intranet']) ||
                                 !empty($school_info['id_nodes'])
                                )) {

        $bodycookie = $dns
                . '__' . (isset($school_info['clientCode']) ? $school_info['clientCode'] : '')
                . '__' . (isset($school_info['is_marsupial']) ? $school_info['is_marsupial'] : '')
                . '__' . (isset($school_info['id_moodle2']) ? $school_info['id_moodle2'] : '')
                . '__' . (isset($school_info['database_moodle2']) ? $school_info['database_moodle2'] : '')
                . '__' . (isset($school_info['diskPercent_moodle2']) ? $school_info['diskPercent_moodle2'] : '')
                . '__' . (isset($school_info['id_intranet']) ? $school_info['id_intranet'] : '')
                . '__' . (isset($school_info['database_intranet']) ? $school_info['database_intranet'] : '')
                . '__' . (isset($school_info['dbhost_intranet']) ? $school_info['dbhost_intranet'] : '')
                . '__' . (isset($school_info['diskPercent_intranet']) ? $school_info['diskPercent_intranet'] : '')
                . '__' . (isset($school_info['version_intranet']) ? $school_info['version_intranet'] : '')
                . '__' . (isset($school_info['id_nodes']) ? $school_info['id_nodes'] : '')
                . '__' . (isset($school_info['database_nodes']) ? $school_info['database_nodes'] : '')
                . '__' . (isset($school_info['dbhost_nodes']) ? $school_info['dbhost_nodes'] : '')
                . '__' . (isset($school_info['diskPercent_nodes']) ? $school_info['diskPercent_nodes'] : '');

        // Add hash to the text for the cookie
        $cookiesalt = $agora['admin']['username'] . substr($agora['admin']['userpwd'], 0, 3);
        $bodycookie .= '__h_' . md5($bodycookie . $cookiesalt);

        //TODO: Mirar si es pot posar un temps de cookie no infinit
        setcookie($agora['server']['cookie'], $bodycookie, 0, '/');
    }

    return $school_info;
}

function redirectNewDNS($oldDNS, $newDNS, $service) {
    if (defined('CLI_SCRIPT')) {
        echo 'Center '.$oldDNS.' has new address: '.$newDNS;
        echo "\nerror\n";
    } else {
        $newadress = WWWROOT . $newDNS.'/'.$service;
        header('location: '.WWWROOT.'error.php?newaddress='.$newadress);
    }
    exit(0);
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
    if (DEBUG_ENABLED == 'on') {
        print "<pre>$string</pre>\n\r";
    }
}

/**
 * Get diskConsume and diskSpace
 *
 * @param dns
 */
function getDiskInfo($dns, $service) {
    if (!isValidDNS($dns)) {
        return false;
    }

    $sql = 'SELECT s.serviceName, cs.diskSpace, cs.diskConsume
			FROM agoraportal_clients c, agoraportal_client_services cs, agoraportal_services s
			WHERE c.clientId = cs.clientId AND cs.serviceId = s.serviceId AND cs.state = "1"
			AND c.clientDNS = "' . $dns . '"';

    $results = get_rows_from_db($sql);
    if (!$results) {
        return false;
    }

    $value = array();
    foreach ($results as $row) {
        if ($row->serviceName == $service) {
            $value['diskConsume'] = $row->diskConsume;
            $value['diskSpace'] = $row->diskSpace;
        }
    }

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
    $start = $length * -1; // negative
    return (substr($haystack, $start) === $needle);
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

    $schools = array();
    if ($service == 'nodes') {
        // Get the list of intranets to test
        $sql = 'SELECT dbHost, min(activedId) as id
                FROM `agoraportal_client_services` c
                LEFT JOIN `agoraportal_services` s ON c.serviceId = s.serviceId
                WHERE serviceName = \'' . $service . '\'
                AND activedId !=0
                GROUP BY dbHost';

        $results = get_rows_from_db($sql);
        if (!$results) {
            return false;
        }

        foreach ($results as $row) {
            $schools[$row->id] = $row->dbHost;
        }
    } else if ($service == 'moodle2') {
        // Get the list of Moodles to test
        $sql = 'SELECT serviceDB, min(activedId) as id
                FROM `agoraportal_client_services` c
                LEFT JOIN `agoraportal_services` s ON c.serviceId = s.serviceId
                WHERE serviceName = \'' . $service . '\'
                AND activedId !=0
                GROUP BY serviceDB';

        $results = get_rows_from_db($sql);
        if (!$results) {
            return false;
        }

        foreach ($results as $row) {
            $schools[$row->id] = $row->serviceDB;
        }
    } else if ($service == 'intranet') {
        // DEPRECATED
        // Get the list of intranets to test
        $sql = 'SELECT dbHost, min(activedId) as id
                FROM `agoraportal_client_services` c
                LEFT JOIN `agoraportal_services` s ON c.serviceId = s.serviceId
                WHERE serviceName = \'' . $service . '\'
                AND activedId !=0
                GROUP BY dbHost';

        $results = get_rows_from_db($sql);
        if (!$results) {
            return false;
        }

        foreach ($results as $row) {
            $sql = 'SELECT c.version
                    FROM `agoraportal_client_services` c
                    LEFT JOIN `agoraportal_services` s ON c.serviceId = s.serviceId
                    WHERE s.serviceName = \'' . $service . '\'
                    AND c.activedId = ' . $row->id . '
                    AND c.dbHost = \'' . $row->dbHost . '\'';

            $results2 = get_rows_from_db($sql);
            if ($results2 && $row2 = array_shift($results2)) {
                $schools[$row->id] = array('dbhost' => $row->dbHost, 'zkversion' => $row2->version);
            } else {
                return false;
            }
        }
    }

    return $schools;
}

/**
 * Checks param extraFunc, associated to a client. Returns true if value
 * is 'moodle2' and false otherwise.
 *
 * @param string $clientCode
 * @return boolean
 */
function checkExtraFunc($clientCode) {

    $sql = 'SELECT extraFunc
            FROM `agoraportal_clients`
            WHERE clientCode = \'' . $clientCode . '\'';

    $results = get_rows_from_db($sql);
    if ($results && $row = array_shift($results)) {
        if ($row->extraFunc == 'moodle2') {
            return true;
        }
    }
    return false;
}

/**
 * Format bytes to human readable
 *
 * @param float $size
 * @return string
 */
function formatBytes($size, $precision = 2) {
    $base = log($size) / log(1024);
    $suffixes = array('', 'k', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}


/* ************ NEW DB MANAGER ************* */
/**
 * Get a DB conection for the specified service
 * @param  string $service  accepted values: admin, nodes, intranet, moodle/moodle2
 * @param  string $schoolid id of the school
 * @param  string $host     host to connect (or db in moodle)
 * @return mixed            created connection already conected
 */
function get_dbconnection($service, $schoolid = "", $host = "") {
    require_once('env-config.php');
    global $agora;

    static $con = array();

    if (empty($service)) {
        return false;
    }

    if ($service == 'admin') {
        $schoolid = 'admin';
    } else if (empty($host)) {
        return false;
    }

    if (empty($schoolid)) {
        return false;
    }

    if (!isset($con[$service])) {
        $con[$service] = array();
    }

    if (!isset($con[$service][$schoolid])) {
        switch($service) {
            case 'intranet':
                $parts = explode(':', $host, 2);
                $host = $parts[0];
                $port = isset($parts[1]) ? $parts[1]: "";
                $user = $agora['intranet']['username'];
                $password = $agora['intranet']['userpwd'];
                $database = $agora['intranet']['userprefix'] . $schoolid;
                $con[$service][$schoolid] = new agora_dbmanager($host, $user, $password, $database, $port);
                break;
            case 'nodes':
                $parts = explode(':', $host, 2);
                $host = $parts[0];
                $port = isset($parts[1]) ? $parts[1]: "";
                $user = $agora['nodes']['username'];
                $password = $agora['nodes']['userpwd'];
                $database = $agora['nodes']['userprefix'] . $schoolid;
                $con[$service][$schoolid] = new agora_dbmanager($host, $user, $password, $database, $port);
                break;
            case 'admin':
                $schoolid = 'admin';
                $host = $agora['admin']['host'];
                $port = $agora['admin']['port'];
                $user = $agora['admin']['username'];
                $password = $agora['admin']['userpwd'];
                $database = $agora['admin']['database'];
                $con[$service][$schoolid] = new agora_dbmanager($host, $user, $password, $database, $port);
                break;
            case 'moodle':
            case 'moodle2':
                $user = $agora['moodle2']['userprefix'] . $schoolid;
                $database = $host;
                $password = $agora['moodle2']['userpwd'];
                $con[$service][$schoolid] = oci_pconnect($user, $password, $database);
                break;
            default:
                return false;
        }
    }
    return $con[$service][$schoolid];
}

/**
 * New MYSQL Manager, contruction has to be done though get_dbconnection
 */
class agora_dbmanager{

    private $connection = false;
    private $host, $user, $password, $database, $port;

    public function __construct($host, $user, $password, $database, $port = false) {
        if (empty($host)) {
            $host = null; // localhost
        }
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
        try {
            $this->connect();
        } catch (Exception $e) {
            // throw new Exception($e->getMessage()); //DEBUG
            throw new Exception('Cannot connect to ' . $database);
        }
    }

    /**
     * Connecto to the DB
     * @return [type] [description]
     */
    private function connect() {
        if ($this->connection) {
            return;
        }

        if ($this->port) {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);
        } else {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        }

        if ($this->connection->connect_error) {
            $error = $this->connection->connect_error;
            $this->connection = false;
            throw new Exception ($error);
        }
    }

    /**
     * Rows selected in an array of objects
     * @param  string $sql to execute
     * @return array  with the rows objects
     */
    public function get_rows($sql) {
        $result = $this->execute_query($sql);
        if (!$result) {
            return false;
        }

        $results = array();
        while ($obj = $result->fetch_object()) {
            $results[] = $obj;
        }
        $result->close();

        return $results;
    }

    /**
     * Get a row in the database
     * @param  string $sql to execute
     * @return object row of false
     */
    public function get_row($sql) {
        $rows = $this->get_rows($sql);
        if ($rows && $data = array_shift($rows)) {
            return $data;
        }
        return false;
    }

    /**
     * Get a field in the database
     * @param  string $sql to execute
     * @param  string $fieldname to get
     * @return mixed value of false
     */
    public function get_field($sql, $fieldname) {
        $data = $this->get_row($sql);
        if ($data && isset($data->$fieldname)) {
            return $data->$fieldname;
        }
        return false;
    }

    /**
     * Number of rows on the query
     * @param  string $sql to execute
     * @return int     Number of rows returned
     */
    public function count_rows($sql) {
        $rows = $this->execute_query($sql);
        if (!$rows) {
            return false;
        }
        return $rows->num_rows;
    }

    /**
     * Executes a raw query (for inserts and updates)
     * @param  string $sql query
     * @return mysqli_result with the return
     */
    public function execute_query($sql) {
        try {
            $this->connect();
        } catch (Exception $e) {
            return false;
            throw new Exception ('Cannot connect to ' . $this->database);
        }

        if (!$result = $this->connection->query($sql)) {
            return false;
        }

        return $result;
    }

    /**
     * Get last error from db query
     * @return string with error
     */
    public function get_error() {
        return $this->connection->error;
    }

    /**
     * Close DB connection
     */
    public function close() {
        if ($this->connection) {
            $this->connection->close();
            $this->connection = false;
        }
    }
}

/**** SOME WARPPINGS  ***********/

/**
 * Get rows from Admin database
 * @param  string $sql to execute
 * @return array, false with the rows returned in objects
 */
function get_rows_from_db($sql) {
    try {
        $db = get_dbconnection('admin');
        $results = $db->get_rows($sql);
        $db->close();
        return $results;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Open a connection to the specified Moodle instance and return it
 *
 * @param school        Array with the school information (id and database)
 *
 * @return A connection handler or FALSE on error.
 */
function connect_moodle($school) {
    try {
        $con = get_dbconnection('moodle', $school['id'], $school['database']);
        return $con;
    } catch (Exception $e) {
        return false;
    }
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

/**
 * Open a connection to the specified Intranet database and return it
 *
 * @param school        Array with the school information (database)
 *
 * @return Connection handler
 */
function connect_intranet($school) {
    try {
        $con = get_dbconnection('intranet', $school['id'], $school['dbhost']);
        return $con;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Open a connection to the specified Nodes database and return it
 *
 * @param school        Array with the school information (database)
 *
 * @return Connection handler
 */
function connect_nodes($school) {
    try {
        $con = get_dbconnection('nodes', $school['id'], $school['dbhost']);
        return $con;
    } catch (Exception $e) {
        return false;
    }
}