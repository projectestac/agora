<?php

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
    return ($serverhash == $cookiehash) ? true : false;
}

/**
 * Check if the client is of type "Servei Educatiu"
 * @return bool
 */
function isServeiEducatiu() {
    global $school_info;

    if (!$school_info) {
        getSchoolInfo('nodes');
    }

    return (isset($school_info['type']) && $school_info['type'] == SERVEIEDUCATIU_TYPE_ID) ? true : false;
}

/**
 * Check if the client is of type "EOI"
 * @return bool
 */
function isEOI() {
    global $school_info;

    if (!$school_info) {
        getSchoolInfo('nodes');
    }

    return (isset($school_info['type']) && $school_info['type'] == EOI_TYPE_ID) ? true : false;
}

/**
 * Check if the client is of type "projecte"
 * @return bool
 */
function isProjecte() {
    global $school_info;

    if (!$school_info) {
        getSchoolInfo('nodes');
    }

    return (isset($school_info['type']) && $school_info['type'] == PROJECTES_TYPE_ID) ? true : false;
}

/**
 * Returns if the current URL is in the selected domain
 * @param $domain to compare
 * @return bool
 */
function is_in_domain($domain) {
    $length = strlen($_SERVER['HTTP_HOST']);
    $start = $length * -1; // negative
    return substr($domain, $start) === $_SERVER['HTTP_HOST'];
}

/**
 * Get an array with all the services totals with optional date limits
 * Returns an array with clientCode as key
 *
 * @param bool $codeletter : false means code will be 08000000
 *                           true  means code will be a8000000
 * @param string $order
 * @param string $desc
 * @param string $service
 * @param string $state
 * @param int $countdays
 * @param int $startingday
 * @return array|bool
 */
function getServicesTotals($codeletter = false, $order = 'clientDNS', $desc = 'asc', $service = 'all', $state = 'all', $countdays = 0, $startingday = 0) {

    $values = $conditions = [];

    if ($service != 'all') {
        $conditions[] = "serviceName='$service'";
    }

    if ($state != 'all') {
        if (is_array($state)) {
            $conditions[] = "state IN ('" . implode("', '", $state) . "')";
        } else {
            $conditions[] = "state='$state'";
        }
    }

    $countdays = intval($countdays);
    $startingday = intval($startingday);

    if ($countdays) {
        $sum = $startingday + $countdays;
        $conditions[] = "date BETWEEN date_format(date_sub(now(), INTERVAL $sum DAY),'%Y%m%d') AND date_format(date_sub(now(), INTERVAL $startingday DAY),'%Y%m%d')";
    }

    $where = (empty($conditions)) ? '' : 'WHERE ' . implode(' AND ', $conditions);

    require_once 'dbmanager.php';

    $sql = "
    SELECT SUM(sd.total) as total, cs.activedId, c.clientCode
            FROM agoraportal_client_services cs
            LEFT JOIN agoraportal_clients c ON cs.clientID = c.clientID
            LEFT JOIN agoraportal_clientType t ON c.typeId = t.typeID
            LEFT JOIN agoraportal_services s ON s.serviceId = cs.serviceId
            LEFT JOIN agoraportal_" . $service . "_stats_day sd ON c.clientCode = sd.clientcode
            $where
            GROUP BY cs.activedId, c.clientCode
            ORDER BY $order $desc";

    $results = get_rows_from_db($sql);
    if (!$results) {
        return false;
    }

    foreach ($results as $row) {

        // Transform client code if required (a8000000 -> 08000000)
        if (!$codeletter) {
            $clientCode = transformClientCode($row->clientCode);
        } else {
            $clientCode = $row->clientCode;
        }

        $values[$clientCode] = [
            'id' => $row->activedId,
            'code' => $clientCode,
            'total' => $row->total,
        ];
    }

    return $values;
}

/**
 * Get an array with all the
 *
 * @param bool $codeletter: false means code will be 08000000
 *                          true  means code will be a8000000
 * @param string $order
 * @param string $desc
 * @param string $service
 * @param string $state
 *
 * @return array|bool
 */
function getServices($codeletter = false, $order = 'clientDNS', $desc = 'asc', $service = 'all', $state = 'all') {

    $values = $conditions = array();

    if ($service != 'all') {
        $conditions[] = "serviceName='$service'";
    }

    if ($state != 'all') {
        if (is_array($state)) {
            $conditions[] = "state IN ('" . implode("', '", $state) . "')";
        } else {
            $conditions[] = "state='$state'";
        }
    }

    $where = (empty($conditions)) ? '' : 'WHERE ' . implode(' AND ', $conditions);

    require_once 'dbmanager.php';

    $sql = "SELECT cs.activedId, cs.serviceDB, cs.dbHost, cs.state, cs.diskSpace, cs.diskConsume, c.clientId, c.clientCode, c.clientDNS, c.clientOldDNS, c.URLType, c.URLHost, c.OldURLHost, c.typeId, s.serviceName
            FROM agoraportal_client_services cs
            LEFT JOIN agoraportal_clients c ON cs.clientID = c.clientID
            LEFT JOIN agoraportal_clientType t ON c.typeId = t.typeID
            LEFT JOIN agoraportal_services s ON s.serviceId = cs.serviceId
            $where
            ORDER BY $order $desc";

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
            'database' => $row->serviceDB,
            'dbhost' => $row->dbHost,
            'state' => $row->state,
            'diskPercent' => $diskPercent,
            'code' => $clientCode,
            'dns' => $row->clientDNS,
            'old_dns' => $row->clientOldDNS,
            'type' => $row->typeId,
            'url_host' => $row->URLHost,
            'old_url_host' => $row->OldURLHost,
            'url_type' => $row->URLType,
            'service' => $row->serviceName
        );
    }

    return $values;
}

/**
 * Populates global array school_info with the connection information of the school
 *
 * @param $service Name of the service (nodes, moodle2)
 * @return string Nom propi of the school
 */
function getSchoolInfo($service) {

    global $agora, $school_info;
    $school_info = array();

    // Debug code
    $debugenabled = isset($_GET['debug']) ? $_GET['debug'] : 'off';
    define('DEBUG_ENABLED', $debugenabled);
    xtec_debug("DEBUG ENABLED: $debugenabled");
    // End debug

    // Get the "nom propi" of the school from the URL
    $centre = '';
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

    // The "nom propi" is mandatory
    if (empty($centre)) {
        if (defined('CLI_SCRIPT')) {
            echo 'Center ' . $centre . ' not found in URL';
            echo "\nerror\n";
        } else {
            header('Location: ' . WWWROOT . 'error.php?s=' . $service . '&dns=' . $centre);
        }
        exit(0);
    }

    // Check the variable received via GET. Ensure it has an allowed value
    if (!isValidDNS($centre)) {
        if (defined('CLI_SCRIPT')) {
            echo 'DNS ' . $centre . ' not valid!';
            echo "\nerror\n";
        } else {
            $service_dir = ( $service == 'nodes') ? "s=" : "s=$service";
            header('Location: ' . WWWROOT . 'error.php?' . $service_dir . '&dns=' . $centre);
        }
        exit(0);
    }

    // Cache level 1: If cookie is present load it
    if (isset($_COOKIE[$agora['server']['cookie']])) {
        $cookie = $_COOKIE[$agora['server']['cookie']];
        if (isValidCookie($cookie)) {
            $data = explode('__', $cookie);
            if ((count($data) == 21) && ($data[0] == $centre)) {
                $school_info['clientCode'] = $data[1];
                $school_info['type'] = $data[2];
                $school_info['url_type'] = $data[3];
                $school_info['url_host'] = $data[4];
                $school_info['id_moodle2'] = $data[5];
                $school_info['dbhost_moodle2'] = $data[6];
                $school_info['database_moodle2'] = $data[7];
                $school_info['diskPercent_moodle2'] = $data[8];
                $school_info['state_moodle2'] = $data[9];
                $school_info['id_intranet'] = $data[10];
                $school_info['database_intranet'] = $data[11];
                $school_info['dbhost_intranet'] = $data[12];
                $school_info['diskPercent_intranet'] = $data[13];
                $school_info['state_intranet'] = $data[14];
                $school_info['id_nodes'] = $data[15];
                $school_info['database_nodes'] = $data[16];
                $school_info['dbhost_nodes'] = $data[17];
                $school_info['diskPercent_nodes'] = $data[18];
                $school_info['state_nodes'] = $data[19];
                // Debug info
                $school_info['source'] = 'Cookie';
            }
        }
    }

    // Cache level 2: Load file with connection info of all clients
    if (empty($school_info) && file_exists($agora['dbsource']['dir'] . 'allSchools.php')) {
        include_once($agora['dbsource']['dir'] . 'allSchools.php');

        if (isset($schools[$centre])) {
            $school_info = $schools[$centre];
        } elseif (isset($schools[$_SERVER['HTTP_HOST']])) {
            $school_info = $schools[$_SERVER['HTTP_HOST']];
        }

        // Debug info
        if (!empty($school_info)) {
            $school_info['source'] = 'allSchools';
        }
    }

    // When loading only an specific service, empty the array if the school has not that service. This must be done
    //  after the cache is checked to take into account the case of the recently activated services.
    if ($service == 'moodle2' && (!isset($school_info['id_moodle2']) || $school_info['id_moodle2'] == '')) {
        $school_info = array();
    } elseif ($service == 'nodes' && (!isset($school_info['id_nodes']) || $school_info['id_nodes'] == '')) {
        $school_info = array();
    }

    // If cache fails, retrieve from Database
    if (empty($school_info)) {
        $school_info = getSchoolFromDB($centre);
        // Debug info
        if (!empty($school_info)) {
            $school_info['source'] = 'DB';
        }
    }

    // If a new_dns param is present, redirect to the new DNS
    if (!empty($school_info['new_dns'])) {
        $newDNS = $school_info['new_dns'];
        if (defined('CLI_SCRIPT')) {
            echo 'Center ' . $centre . ' has new address: ' . $newDNS;
            echo "\nerror\n";
        } else {
            if (isServeiEducatiu() && isset($agora['server']['se-url'])) {
                $newaddress = $agora['server']['se-url'] . $agora['server']['base'] . $newDNS . '/';
            } elseif (isProjecte() && isset($agora['server']['projectes'])) {
                $newaddress = $agora['server']['projectes'] . $agora['server']['base'] . $newDNS . '/';
            } elseif (isEOI() && isset($agora['server']['eoi'])) {
                $newaddress = $agora['server']['eoi'] . $agora['server']['base'] . $newDNS . '/';
            } else {
                $newaddress = $agora['server']['server'] . $agora['server']['base'] . $newDNS . '/';
            }
            if ($service == 'moodle2') {
                $newaddress .= 'moodle/';
            }
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $newaddress);
        }
        exit;
    }

    // If a new host is present, redirect to the new host
    if (!empty($school_info['new_url_host'])) {

        $new_url_host = 'https://' . $school_info['new_url_host'];

        if (defined('CLI_SCRIPT')) {
            echo 'Center ' . $centre . ' has new host: ' . $new_url_host;
            echo "\nerror\n";
        } else {
            $new_url_host .= $agora['server']['base'];
            if ($service == 'moodle2') {
                $new_url_host .= 'moodle/';
            }
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $new_url_host);
        }
        exit;
    }

    // At this point, if there is no school information, abort
    if (empty($school_info['id_' . $service])) {
        if (defined('CLI_SCRIPT')) {
            echo 'Center ' . $centre . ' not found in database';
            echo "\nerror\n";
        } else {
            $service_dir = ( $service == 'nodes') ? "s=" : "s=$service";
            header('Location: ' . WWWROOT . 'error.php?' . $service_dir . '&dns=' . $centre);
        }
        exit;
    }

    // At this point, $school_info[] should contain connection data

    // Check for special types to set proper flags
    $agora['iseoi'] = isset($school_info['type']) && ($school_info['type'] == EOI_TYPE_ID);
    $agora['isServeiEducatiu'] = isset($school_info['type']) && ($school_info['type'] == SERVEIEDUCATIU_TYPE_ID);
    $agora['isProjecte'] = isset($school_info['type']) && ($school_info['type'] == PROJECTES_TYPE_ID);

    // Set cookie for future requests
    if (!empty($school_info['id_moodle2']) || !empty($school_info['id_nodes'])) {

        $bodycookie = $centre
            . '__' . (isset($school_info['clientCode']) ? $school_info['clientCode'] : '')
            . '__' . (isset($school_info['type']) ? $school_info['type'] : '')
            . '__' . (isset($school_info['url_type']) ? $school_info['url_type'] : '')
            . '__' . (isset($school_info['url_host']) ? $school_info['url_host'] : '')
            . '__' . (isset($school_info['id_moodle2']) ? $school_info['id_moodle2'] : '')
            . '__' . (isset($school_info['dbhost_moodle2']) ? $school_info['dbhost_moodle2'] : '')
            . '__' . (isset($school_info['database_moodle2']) ? $school_info['database_moodle2'] : '')
            . '__' . (isset($school_info['diskPercent_moodle2']) ? $school_info['diskPercent_moodle2'] : '')
            . '__' . (isset($school_info['state_moodle2']) ? $school_info['state_moodle2'] : '')
            . '__' . (isset($school_info['id_intranet']) ? $school_info['id_intranet'] : '')
            . '__' . (isset($school_info['database_intranet']) ? $school_info['database_intranet'] : '')
            . '__' . (isset($school_info['dbhost_intranet']) ? $school_info['dbhost_intranet'] : '')
            . '__' . (isset($school_info['diskPercent_intranet']) ? $school_info['diskPercent_intranet'] : '')
            . '__' . (isset($school_info['state_intranet']) ? $school_info['state_intranet'] : '')
            . '__' . (isset($school_info['id_nodes']) ? $school_info['id_nodes'] : '')
            . '__' . (isset($school_info['database_nodes']) ? $school_info['database_nodes'] : '')
            . '__' . (isset($school_info['dbhost_nodes']) ? $school_info['dbhost_nodes'] : '')
            . '__' . (isset($school_info['diskPercent_nodes']) ? $school_info['diskPercent_nodes'] : '')
            . '__' . (isset($school_info['state_nodes']) ? $school_info['state_nodes'] : '');

        // Add hash to the text for the cookie
        $cookiesalt = $agora['admin']['username'] . substr($agora['admin']['userpwd'], 0, 3);
        $bodycookie .= '__h_' . md5($bodycookie . $cookiesalt);

        setcookie($agora['server']['cookie'], $bodycookie, time() + 3600, '/'); // Cookie expires in 1 hour
    }

    // Change default URL host for Serveis Educatius
    if ($agora['isServeiEducatiu'] && isset($agora['server']['se-url'])) {
        $agora['server']['server'] = $agora['server']['se-url'];
        $agora['server']['html'] = $agora['server']['server'] . $agora['server']['base'];

        // Check if the domain in the URL is the default for Serveis Educatius and redirect if not
        if (!defined('CLI_SCRIPT') && !is_in_domain($agora['server']['server'])) {
            $url = rtrim($agora['server']['html'], '/') . $_SERVER['REQUEST_URI'];
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $url);
            exit;
        }
    }

    // Change default URL host for EOI
    if ($agora['iseoi'] && isset($agora['server']['eoi'])) {
        $agora['server']['server'] = $agora['server']['eoi'];
        $agora['server']['html'] = $agora['server']['server'] . $agora['server']['base'];

        // Check if the domain in the URL is the default for Serveis Educatius and redirect if not
        if (!defined('CLI_SCRIPT') && !is_in_domain($agora['server']['server'])) {
            $url = rtrim($agora['server']['html'], '/') . $_SERVER['REQUEST_URI'];
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $url);
            exit;
        }
    }

    // Change default URL host for Projectes
    if ($agora['isProjecte'] && isset($agora['server']['projectes'])) {
        $agora['server']['server'] = $agora['server']['projectes'];
        $agora['server']['html'] = $agora['server']['server'] . $agora['server']['base'];

        // Check if the domain in the URL is the default for Projectes and redirect if not
        if (!defined('CLI_SCRIPT') && !is_in_domain($agora['server']['server'])) {
            $url = rtrim($agora['server']['html'], '/') . $_SERVER['REQUEST_URI'];
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $url);
            exit;
        }
    }

    // Nodes can have a different domain
    if (($service == 'nodes') && isset($agora['server']['nodes']) && !$agora['isServeiEducatiu'] && !$agora['isProjecte'] && !$agora['iseoi']) {
        $agora['server']['server'] = $agora['server']['nodes'];
        $agora['server']['html'] = $agora['server']['server'] . $agora['server']['base'];

        // Check if the domain in the URL is the default for Nodes and redirect if not
        if (!defined('CLI_SCRIPT') && !is_in_domain($agora['server']['server'])) {
            // Remove base URL (directory) from REQUEST_URI, remove duplicated double slashes (//) and avoid creating more
            $remove = rtrim($agora['server']['base'], '/');
            $url = rtrim($agora['server']['html'], '/') . str_replace($remove, '', str_replace('//', '/', $_SERVER['REQUEST_URI']));
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $url);
            exit;
        }
    }

    // Change the URL for schools that use a subdomain instead of a standard URL
    if (!empty($school_info['url_type']) && ($school_info['url_type'] == 'subdomain') && !empty($school_info['url_host'])) {
        $agora['server']['server'] = 'http://' . $school_info['url_host'];
        $agora['server']['html'] = 'http://' . $school_info['url_host'] . $agora['server']['base'];

        // Check if the domain in the URL is the default for Serveis Educatius and redirect if not
        if (!defined('CLI_SCRIPT') && !is_in_domain($agora['server']['server'])) {
            $remove = $agora['server']['base'] . $centre . '/';
            $url = $agora['server']['html'] . str_replace($remove, '', $_SERVER['REQUEST_URI']);
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $url);
            exit;
        }
    }

    xtec_debug($school_info['source']);

    return $centre;
}

/**
 * Get the information of the specified school from the database
 *
 * @param $dns school dns
 * @param $codeletter: false means code will be 08000000
 *                     true  means code will be a8000000
 *
 * @return array with the schools information
 */
function getSchoolFromDB($dns) {

    require_once 'dbmanager.php';

    $sql = "SELECT c.clientId, c.clientCode, c.typeId, c.URLType, c.URLHost, s.serviceName, cs.activedId, cs.state, cs.serviceDB, cs.dbHost, cs.diskSpace, cs.diskConsume
            FROM agoraportal_client_services cs
            LEFT JOIN agoraportal_clients c ON cs.clientId = c.clientId
            LEFT JOIN agoraportal_services s ON cs.serviceId = s.serviceId
            WHERE (cs.state = '1' OR cs.state = '-5' OR cs.state = '-6' OR cs.state = '-7') AND c.clientDNS = '$dns';";

    $results = get_rows_from_db($sql);
    $value = array();

    if ($results) {
        foreach ($results as $row) {
            // The following values are present in all rows. There's no need to override them.
            if (empty($value['clientCode'])) {
                // Transform client code (a8000000 -> 08000000)
                $value['clientCode'] = transformClientCode($row->clientCode);
            }

            if (empty($value['type'])) {
                $value['type'] = $row->typeId;
            }

            if (empty($value['URLType'])) {
                $value['url_type'] = $row->URLType;
            }

            if (empty($value['URLHost'])) {
                $value['url_host'] = $row->URLHost;
            }

            // Now, the values that are different in every iteration
            $diskPercent = getDiskPercent($row->diskConsume, $row->diskSpace);
            $serviceName = $row->serviceName;

            $value['id_' . $serviceName] = $row->activedId;
            $value['dbhost_' . $serviceName] = $row->dbHost;
            $value['database_' . $serviceName] = $row->serviceDB;
            $value['diskPercent_' . $serviceName] = $diskPercent;
            $value['state_' . $serviceName] = $row->state;
        }
    }

    // Get new DNS
    $sql = "SELECT c.clientDNS
            FROM agoraportal_clients c
            WHERE c.clientState = '1' AND c.clientOldDNS = '$dns';";

    $results = get_rows_from_db($sql);
    if ($results && $row = array_shift($results)) {
        $value['new_dns'] = $row->clientDNS;
    }

    // Get new domain
    if (isset($_SERVER['HTTP_HOST'])) {
        $http_host = $_SERVER['HTTP_HOST'];
        $sql = "SELECT c.URLHost
            FROM agoraportal_clients c
            WHERE c.clientState = '1' AND c.OldURLHost = '$http_host';";

        $results = get_rows_from_db($sql);
        if ($results && $row = array_shift($results)) {
            $value['new_url_host'] = $row->clientDNS;
        }
    }

    return $value;
}

/**
 * Get the string with School Information from Web Service
 * Demo string: a8000001$$nompropi$$Nom del Centre$$c. Carrer, 18-24$$Valldeneu$$00000
 *
 * @author Toni Ginard
 *
 * @global array $agora
 * @param string $uname Codi de centre
 * @return array
 */
function getSchoolFromWS($uname) {
    global $agora;
    $results = array('error' => 0, 'message' => '');

    // Get school info
    $unamenum = transformClientCode($uname, 'letter2num');
    $url = $agora['server']['school_information'] . $unamenum;

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 8);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $buffer = curl_exec($handle);
    curl_close($handle);

    // Get school Data
    $schooldata = '';
    if (empty($buffer)) {
        $results['error'] = 1;
        $results['message'] = 'No s\'ha pogut obtenir automàticament la informació del centre.
            Aquest error no és greu, però si persisteix durant dies, poseu-vos en contacte amb el SAU.';
    } else {
        $schooldata = utf8_encode($buffer);

        // Additional check. This error should never happen.
        if (strpos($schooldata, 'ERROR') !== false) {
            $results['error'] = 1;
            $results['message'] = "El codi de centre $unamenum no figura a la base de dades de centres de la XTEC. Poseu-vos en contacte amb el SAU.";
        } else {
            $results['message'] = $schooldata;
        }
    }

    return $results;
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
 * @param $service
 * @return array|bool
 */
function getDiskInfo($dns, $service) {
    if (!isValidDNS($dns)) {
        return false;
    }

    require_once 'dbmanager.php';

    $sql = 'SELECT s.serviceName, cs.diskSpace, cs.diskConsume
            FROM agoraportal_clients c, agoraportal_client_services cs, agoraportal_services s
            WHERE c.clientId = cs.clientId AND cs.serviceId = s.serviceId AND (cs.state = "1" OR cs.state ="-7")
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
 * Calculate the used disk percentage.
 *
 * @param int $diskConsume
 * @param int $diskSpace
 *
 * @return int disk disk percentage (without decimals)
 */
function getDiskPercent($diskConsume, $diskSpace) {
    if ($diskSpace != 0) {
        return round((((int)$diskConsume / 1024) / (int)$diskSpace) * 100);
    }
    return 0;
}

/**
 * Checks param extraFunc, associated to a client. Returns true if value
 * is 'moodle2' and false otherwise.
 *
 * @param string $clientCode
 * @return boolean
 */
function checkExtraFunc($clientCode) {

    require_once 'dbmanager.php';

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
 * @param int $precision Number of digits after the decimal point
 * @return string
 */
function formatBytes($size, $precision = 2) {
    $base = log($size) / log(1024);
    $suffixes = array('', 'k', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
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
