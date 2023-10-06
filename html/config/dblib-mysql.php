<?php

/**
 * Check if the specified DNS is valid to avoid security problems
 *
 * @param string $dns
 * @return boolean True if specified DNS is correct; false otherwise
 */
function isValidDNS(string $dns): bool {
    if (strlen($dns) > 30 || !preg_match("/^[a-z0-9-_]+$/", $dns)) {
        return false;
    }
    return true;
}

/**
 * Returns if the current URL is in the selected domain or not.
 *
 * @param string $domain Domain to compare
 * @return bool
 */
function is_in_domain(string $domain): bool {
    $length = strlen($_SERVER['HTTP_HOST']);
    $start = $length * -1; // Negative

    return substr($domain, $start) === $_SERVER['HTTP_HOST'];
}

/**
 * Set Àgora global variables for the URL domain. In case the user is
 * accessing to a wrong domain, do a redirect to the right domain.
 *
 * @param string $domain
 * @return void
 */
function set_domain_and_redirect(string $domain) {
    global $agora;

    $agora['server']['server'] = $domain;
    $agora['server']['html'] = $domain . $agora['server']['base'];

    // Check if the domain in the URL is the correct and redirect if not.
    if (!defined('CLI_SCRIPT') && !is_in_domain($domain)) {
        $url = rtrim($agora['server']['html'], '/') . $_SERVER['REQUEST_URI'];
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $url);
        exit;
    }
}

/**
 * Get an array with all the services totals with optional date limits
 * Returns an array with clientCode as key
 *
 * @param bool $codeletter false means code will be 08000000
 *                         true  means code will be a8000000
 * @param string $order
 * @param string $desc
 * @param string $service
 * @param string|array $state
 * @param int $countdays
 * @param int $startingday
 * @return array|bool
 */
function getServicesTotals(bool   $codeletter = false, string $order = 'dns', string $desc = 'asc',
                           string $service = 'all', string $status = 'all', int $countdays = 0, int $startingday = 0) {

    $values = $conditions = [];

    if ($service !== 'all') {
        $conditions[] = "s.name='$service'";
    }

    if ($status !== 'all') {
        if (is_array($status)) {
            $conditions[] = "i.status IN ('" . implode("', '", $status) . "')";
        } else {
            $conditions[] = "i.status='$status'";
        }
    }

    if ($countdays) {
        $sum = $startingday + $countdays;
        $conditions[] = "date BETWEEN date_format(date_sub(now(), INTERVAL $sum DAY),'%Y%m%d') AND date_format(date_sub(now(), INTERVAL $startingday DAY),'%Y%m%d')";
    }

    $where = (empty($conditions)) ? '' : 'WHERE ' . implode(' AND ', $conditions);

    require_once 'dbmanager.php';

    if ($service === 'Moodle') {
        $service = 'moodle2';
    }
    if ($service === 'Nodes') {
        $service = 'nodes';
    }

    $sql = "SELECT SUM(sd.total) as total, i.db_id, c.code
        FROM instances i
        LEFT JOIN clients c ON i.client_id = c.id
        LEFT JOIN client_types t ON c.type_id = t.id
        LEFT JOIN services s ON s.id = i.service_id
        LEFT JOIN portal.agoraportal_" . $service . "_stats_day sd ON c.code = sd.clientcode
        $where
        GROUP BY i.db_id, c.code
        ORDER BY $order $desc";

    if (!$results = get_rows_from_db($sql)) {
        return false;
    }

    foreach ($results as $row) {
        // Transform client code if required (a8000000 -> 08000000)
        if (!$codeletter) {
            $clientCode = transformClientCode($row->code);
        } else {
            $clientCode = $row->code;
        }

        $values[$clientCode] = [
            'id' => $row->db_id,
            'code' => $clientCode,
            'total' => $row->total,
        ];
    }

    return $values;
}

/**
 * Get an array with all the services.
 *
 * @param bool $codeletter false means code will be 08000000
 *                         true  means code will be a8000000
 * @param string $order
 * @param string $desc
 * @param string $service
 * @param string|array $state
 *
 * @return array|bool
 */
function getServices(bool   $codeletter = false, string $order = 'clients.dns', string $desc = 'asc',
                     string $service = 'all', $status = 'all') {

    $values = $conditions = [];

    if ($service !== 'all') {
        $conditions[] = "s.name='$service'";
    }

    if ($status !== 'all') {
        if (is_array($status)) {
            $conditions[] = "i.status IN ('" . implode("', '", $status) . "')";
        } else {
            $conditions[] = "i.status='$status'";
        }
    }

    $where = (empty($conditions)) ? '' : 'WHERE ' . implode(' AND ', $conditions);

    require_once 'dbmanager.php';

    $sql = "SELECT i.db_id, i.db_host, i.status, i.quota, i.used_quota, c.id, c.code, c.dns, c.old_dns, c.url_type, c.host, c.old_host, c.type_id, s.name
            FROM instances i
            LEFT JOIN clients c ON i.client_id = c.id
            LEFT JOIN client_types t ON c.type_id = t.id
            LEFT JOIN services s ON s.id = i.service_id
            $where
            ORDER BY $order $desc";

    if (!$results = get_rows_from_db($sql)) {
        return false;
    }

    foreach ($results as $row) {
        $diskPercent = getDiskPercent($row->used_quota, $row->quota);

        // Transform client code if required (a8000000 -> 08000000)
        if (!$codeletter) {
            $clientCode = transformClientCode($row->code);
        } else {
            $clientCode = $row->code;
        }

        $values[] = [
            'id' => $row->db_id,
            'dbhost' => $row->db_host,
            'state' => $row->status,
            'diskPercent' => $diskPercent,
            'code' => $clientCode,
            'dns' => $row->dns,
            'old_dns' => $row->old_dns,
            'type' => $row->type_id,
            'url_host' => $row->host,
            'old_url_host' => $row->old_host,
            'url_type' => $row->url_type,
            'service' => $row->name,
        ];
    }

    return $values;
}

/**
 * Populates global array school_info with the connection information of the school.
 *
 * @param string $service Name of the service (nodes, moodle2)
 * @return string Nom propi of the school
 */
function getSchoolInfo(string $service): string {
    global $agora, $school_info;
    $school_info = [];

    // Debug code
    $debugenabled = $_GET['debug'] ?? 'off';
    define('DEBUG_ENABLED', $debugenabled);
    xtec_debug("DEBUG ENABLED: $debugenabled");
    // End debug

    // Get the "nom propi" of the school from the URL
    $centre = '';
    if (isset($_REQUEST['ccentre'])) {
        $centre = $_REQUEST['ccentre'];
    } else if (defined('CLI_SCRIPT') && isset($_SERVER['argv'])) {
        $argvs = $_SERVER['argv'];
        foreach ($argvs as $arg) {
            $parts = explode('=', $arg);
            if ($parts[0] === '--ccentre') {
                $centre = $parts[1];
            }
        }
    }

    // "Nom propi" is mandatory
    if (empty($centre)) {
        if (defined('CLI_SCRIPT')) {
            echo 'Center ' . $centre . ' not found in URL';
            echo "\nerror\n";
        } else {
            header('Location: ' . WWWROOT . 'error.php?s=' . mb_strtolower($service) . '&dns=' . $centre);
        }
        exit;
    }

    // Check the variable received via GET. Ensure it has an allowed value
    if (!isValidDNS($centre)) {
        if (defined('CLI_SCRIPT')) {
            echo 'DNS ' . $centre . ' not valid!';
            echo "\nerror\n";
        } else {
            $service_dir = ($service === 'Nodes') ? 's=' : 's=' . mb_strtolower($service);
            header('Location: ' . WWWROOT . 'error.php?' . $service_dir . '&dns=' . $centre);
        }
        exit;
    }

    // Connection cache: Load file with connection info of all clients
    if (file_exists($agora['cachecon']['dir'] . $agora['cachecon']['file'])) {
        include_once($agora['cachecon']['dir'] . $agora['cachecon']['file']);

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

    // When loading only a specific service, empty the array if the school has not that service. This must be done
    //  after the cache is checked to take into account the case of the recently activated services.
    if ($service === 'Moodle' && (!isset($school_info['id_moodle']) || $school_info['id_moodle'] === '')) {
        $school_info = [];
    } elseif ($service === 'Nodes' && (!isset($school_info['id_nodes']) || $school_info['id_nodes'] === '')) {
        $school_info = [];
    }

    // If cache fails, retrieve from Database
    if (empty($school_info)) {
        $school_info = getSchoolFromDB($centre);
        // Debug info
        if (!empty($school_info)) {
            $school_info['source'] = 'DB';
        }
    }

    // Check for special types to set proper flags
    $agora['iseoi'] = isset($school_info['type']) && ($school_info['type'] === (string)EOI_TYPE_ID);
    $agora['isServeiEducatiu'] = isset($school_info['type']) && ($school_info['type'] === (string)SERVEIEDUCATIU_TYPE_ID);
    $agora['isProjecte'] = isset($school_info['type']) && ($school_info['type'] === (string)PROJECTES_TYPE_ID);

    // If a new_dns param is present, redirect to the new DNS
    if (!empty($school_info['new_dns'])) {
        $newDNS = $school_info['new_dns'];
        if (defined('CLI_SCRIPT')) {
            echo 'Center ' . $centre . ' has new address: ' . $newDNS;
            echo "\nerror\n";
        } else {
            if ($agora['isServeiEducatiu'] && isset($agora['server']['se-url'])) {
                $newaddress = $agora['server']['se-url'] . $agora['server']['base'] . $newDNS . '/';
            } elseif ($agora['isProjecte'] && isset($agora['server']['projectes'])) {
                $newaddress = $agora['server']['projectes'] . $agora['server']['base'] . $newDNS . '/';
            } elseif ($agora['iseoi'] && isset($agora['server']['eoi'])) {
                $newaddress = $agora['server']['eoi'] . $agora['server']['base'] . $newDNS . '/';
            } else {
                $newaddress = $agora['server']['server'] . $agora['server']['base'] . $newDNS . '/';
            }
            if ($service === 'Moodle') {
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
            if ($service === 'Moodle') {
                $new_url_host .= 'moodle/';
            }
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $new_url_host);
        }
        exit;
    }

    // At this point, if there is no school information, abort
    if (empty($school_info['id_' . strtolower($service)])) {
        if (defined('CLI_SCRIPT')) {
            echo 'Center ' . $centre . ' not found in database';
            echo "\nerror\n";
        } else {
            $service_dir = ($service === 'Nodes') ? 's=' : 's=' . strtolower($service);
            header('Location: ' . WWWROOT . 'error.php?' . $service_dir . '&dns=' . $centre);
        }
        exit;
    }

    // At this point, $school_info[] should contain connection data

    // Change URL domain for Serveis Educatius (Valid for Moodle and Nodes)
    if ($agora['isServeiEducatiu'] && isset($agora['server']['se-url'])) {
        set_domain_and_redirect($agora['server']['se-url']);
    }

    // Change URL domain for EOI (Valid for Moodle and Nodes)
    if ($agora['iseoi'] && isset($agora['server']['eoi'])) {
        set_domain_and_redirect($agora['server']['eoi']);
    }

    // Change dURL domain for Projectes (Valid for Moodle and Nodes)
    if ($agora['isProjecte'] && isset($agora['server']['projectes'])) {
        set_domain_and_redirect($agora['server']['projectes']);
    }

    // Nodes can have a different domain (only for Nodes)
    if (($service === 'Nodes') && isset($agora['server']['nodes']) && !$agora['isServeiEducatiu'] && !$agora['isProjecte'] &&
        !$agora['iseoi']) {
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
    if (!empty($school_info['url_type']) && ($school_info['url_type'] === 'subdomain') && !empty($school_info['url_host'])) {
        $agora['server']['server'] = 'https://' . $school_info['url_host'];
        $agora['server']['html'] = 'https://' . $school_info['url_host'] . $agora['server']['base'];

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
 * Get the information of the specified school from the database.
 *
 * @param string $dns nom propi
 * @return array with the schools information
 */
function getSchoolFromDB(string $dns): array {

    require_once 'dbmanager.php';

    $sql = "SELECT c.id, c.code, c.type_id, c.url_type, c.host, s.name, i.db_id, i.status, i.db_host, i.quota, i.used_quota
            FROM instances i
            LEFT JOIN clients c ON i.client_id = c.id
            LEFT JOIN services s ON i.service_id = s.id
            WHERE (i.status = 'active' OR i.status = 'blocked') AND c.dns = '$dns';";

    $results = get_rows_from_db($sql);
    $value = [];

    if ($results) {
        foreach ($results as $row) {
            // The following values are present in all rows. There's no need to override them.
            if (empty($value['code'])) {
                // Transform client code (a8000000 -> 08000000)
                $value['code'] = transformClientCode($row->code);
            }

            if (empty($value['type'])) {
                $value['type'] = $row->type_id;
            }

            if (empty($value['url_type'])) {
                $value['url_type'] = $row->url_type;
            }

            if (empty($value['url_host'])) {
                $value['url_host'] = $row->host;
            }

            // Now, the values that are different in every iteration
            $diskPercent = getDiskPercent($row->used_quota, $row->quota);
            $serviceName = mb_strtolower($row->name);

            $value['id_' . $serviceName] = $row->db_id;
            $value['dbhost_' . $serviceName] = $row->db_host;
            $value['diskPercent_' . $serviceName] = $diskPercent;
            $value['state_' . $serviceName] = $row->status;
        }
    }

    // Get new DNS
    $sql = "SELECT c.dns
            FROM clients c
            WHERE c.status = 'active' AND c.old_dns = '$dns';";

    $results = get_rows_from_db($sql);
    if ($results && $row = array_shift($results)) {
        $value['new_dns'] = $row->dns;
    }

    // Get new domain
    if (isset($_SERVER['HTTP_HOST'])) {
        $http_host = $_SERVER['HTTP_HOST'];
        $sql = "SELECT c.host
            FROM clients c
            WHERE c.status = 'active' AND c.old_host = '$http_host';";

        $results = get_rows_from_db($sql);
        if ($results && $row = array_shift($results)) {
            $value['new_url_host'] = $row->dns;
        }
    }

    return $value;
}

/**
 * Prints a message if DEBUG_ENABLED is on
 */
function xtec_debug($string) {
    if (DEBUG_ENABLED === 'on') {
        print "<pre>$string</pre>\n\r";
    }
}

/**
 * Get diskConsume and diskSpace.
 *
 * @param string $dns
 * @param string $service
 *
 * @return array|bool
 */
function getDiskInfo(string $dns, string $service) {
    if (!isValidDNS($dns)) {
        return false;
    }

    require_once 'dbmanager.php';

    $sql = 'SELECT s.name, i.quota, i.used_quota
            FROM clients c, instances i, services s
            WHERE c.id = i.client_id AND i.service_id = s.id AND (i.status = "active" OR i.status ="blocked")
            AND c.dns = "' . $dns . '"';

    $results = get_rows_from_db($sql);
    if (!$results) {
        return false;
    }

    $value = [];
    foreach ($results as $row) {
        if ($row->name === $service) {
            $value['used_quota'] = $row->used_quota;
            $value['quota'] = $row->quota;
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
 * @return int disk percentage (without decimals)
 */
function getDiskPercent(int $used_quota, int $quota): int {
    if ($quota !== 0) {
        return round(($used_quota / $quota) * 100);
    }
    return 0;
}

/**
 * Convert a code starting with a letter to a code starting with a number
 * and viceversa.
 *
 * @param string $clientCode
 * @param string $type
 *
 * @return string Client code transformed
 */
function transformClientCode(string $clientCode, string $type = 'letter2num'): string {
    if ($type === 'letter2num') {
        $pattern = '/^[abce]\d{7}$/'; // Matches a1234567
        if (preg_match($pattern, $clientCode)) {
            // Convert clientcode beginning with a letter to clientcode beginning with a number.
            $search = ['a', 'b', 'c', 'e'];
            $replace = ['0', '1', '2', '4'];
            $clientCode = str_replace($search, $replace, $clientCode);
        }
    } elseif ($type === 'num2letter') {
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