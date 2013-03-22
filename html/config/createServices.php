<?php
$schoolCodes = (isset($_REQUEST['schoolCodes'])) ? $_REQUEST['schoolCodes'] : '';

if (empty($schoolCodes)) { // Show form
?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Altes massives a Àgora</title>
        </head>
        <body>
            <form action="newSchools.php" method="post">
                Llista de codis de centre separats per comes: <br />
                <textarea name="schoolCodes" rows="5" cols="80" placeholder="Exemple: a8000000, a8000001, a8000002"></textarea><br />
                <input type="submit" />
            </form>
        </body>
    </html>    

<?php
} else { // Do the work
    
    $codes = explode(',', $schoolCodes);

    foreach ($codes as $code) {
        // Check code validity
        $code = (checkCode(trim($code))) ? trim($code) : '';
        if (!$code) {
            continue;
        }
        
        // Pas 0: Connectar a la base de dades
        require ('env-config.php');
        $dbc = mysqli_connect($agora['admin']['host'], $agora['admin']['username'], $agora['admin']['userpwd'], $agora['admin']['database'], $agora['admin']['port']);
        
        // Pas 1: Obtenir l'id del servei Moodle 2 ('moodle2')
        $sql = "SELECT serviceId FROM agoraportal_services WHERE serviceName='moodle2'";
        $res = mysqli_query ($dbc, $sql);
        $row = mysqli_fetch_array ($res, MYSQLI_ASSOC);
        $serviceId = $row['serviceId'];
        mysqli_free_result($res);
        
        // Pas 2: Obtenir l'id del client (taula clients)
        $sql = "SELECT clientId, clientDNS, clientName FROM agoraportal_clients WHERE clientCode='$code'";
        $res = mysqli_query ($dbc, $sql);
        $row = mysqli_fetch_array ($res, MYSQLI_ASSOC);
        $clientId = $row['clientId'];
        $clientDNS = $row['clientDNS'];
        $clientName = $row['clientName'];
        mysqli_free_result($res);     
        
        // Pas 3: Obtenir l'id de la propera BD lliure (activedId)

        
        
        // Pas 4: Calcular la instància de la base de dades
        
        // Pas 5: Crear el servei a client_services
        
        // Pas 6: Crear una contrasenya
        
        // Pas 7: Fer els canvis a les taules del Moodle 2
        
        // Pas 8: Desar les dades, sobre tot la contrasenya (fitxer o taula?)
        

        
        mysqli_close($dbc);
    }
}



    // CODI COPIAT D'AGORAPORTAL (per a referència)
/*
    public function getFreeDataBase($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Needed for connectExtDB
        $dbHost = $args['dbHost'];

        // Moodle and moodle2 use the same activeId, so must be treated as one 
        if (isset($args['serviceName']) && ($args['serviceName'] == 'moodle' || $args['serviceName'] == 'moodle2')) {
            // Get the list of moodle services of all the clients
            $moodleService = ModUtil::apiFunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => 'moodle'));
            $moodleServiceId = $moodleService['serviceId'];
            $moodleClientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('service' => $moodleServiceId,
                        'state' => -1));

            // Get the list of moodle2 services of all the clients
            $moodle2Service = ModUtil::apiFunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => 'moodle2'));
            $moodle2ServiceId = $moodle2Service['serviceId'];
            $moodle2ClientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('service' => $moodle2ServiceId,
                        'state' => -1));

            if (empty($moodleClientServices) && empty($moodle2ClientServices)) {
                return false;
            }

            // Initial values
            $databaseIds = array();
            $max = 0;

            // Get a list of activedId of moodle service
            foreach ($moodleClientServices as $service) {
                if ($service['activedId'] != 0) {
                    $databaseIds[] = $service['activedId'];
                    if ($service['activedId'] > $max) {
                        $max = $service['activedId'];
                    }
                }
            }

            // Add to the previous list the activedId of moodle2 service
            foreach ($moodle2ClientServices as $service) {
                if ($service['activedId'] != 0) {
                    $databaseIds[] = $service['activedId'];
                    if ($service['activedId'] > $max) {
                        $max = $service['activedId'];
                    }
                }
            }

            // Remove duplicates
            $databaseIds = array_unique($databaseIds);

            sort($databaseIds);
        } else {
            // get all services (all states)
            $items = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('service' => $args['serviceId'],
                        'state' => -1));
            if (!$items) {
                return false;
            }

            // get all the database used
            $databaseIds = array();
            $max = 0;
            foreach ($items as $item) {
                if ($item['activedId'] != 0) {
                    $databaseIds[] = $item['activedId'];
                    if ($item['activedId'] > $max) {
                        $max = $item['activedId'];
                    }
                }
            }

            sort($databaseIds);
        }

        // Look for next free ID
        $j = 0;
        // First, look for a free database (a gap in the list)
        for ($i = 0; $i < $max; $i++) {
            $j++;
            if ($databaseIds[$i] != $j) {
                $free = $j;
                break;
            }
        }

        // No luck, so let's try the following ID
        if ($j == $max) {
            $free = $max + 1;
        }

        // Get info of the service from its ID
        $serviceInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getService', array('serviceId' => $args['serviceId']));

        $connect = ModUtil::apiFunc('Agoraportal', 'user', 'connectExtDB', array('serviceName' => $serviceInfo['serviceName'],
                    'database' => $free,
                    'host' => $dbHost));

        if (!$connect) {
            return false;
        }

        return $free;
    }
*/


/*
    $clientServiceId = $args['clientServiceId'];
    // Needed argument

    if (!isset($clientServiceId) || !is_numeric($clientServiceId)) {
        return LogUtil::registerError($this->__('No s\'ha pogut carregar el que volíeu. Reviseu les dades'));
    }

    $item = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId));

    if ($item == false) {
        return LogUtil::registerError($this->__('No s\'ha trobat el servei'));
    }

    $serviceId = $item[$clientServiceId]['serviceId'];
    // Get the services
    $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
    $serviceName = $services[$serviceId]['serviceName'];

    $moodle = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $item[$clientServiceId]['clientId'],
                'serviceName' => 'moodle'));

    $moodle2 = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $item[$clientServiceId]['clientId'],
                'serviceName' => 'moodle2'));

    // in case of moodle2 take the same data base as moodle if exists
    if ($serviceName == 'moodle2' && !empty($moodle) && $moodle['activedId'] > 0) {
        $haveDB = true;
        $db = $moodle['activedId'];
    }

    // and the same for moodle
    if ($serviceName == 'moodle' && !empty($moodle2) && $moodle2['activedId'] > 0) {
        $haveDB = true;
        $db = $moodle2['activedId'];
    }

    if (!$haveDB) {
        // the client have not moodle active
        $db = ModUtil::apiFunc('Agoraportal', 'admin', 'getFreeDataBase', array('serviceId' => $serviceId,
                    'serviceName' => $serviceName));
        if (!$db) {
            LogUtil::registerError($this->__('No queda cap base de dades lliure'));
            return false;
        }
    }

    global $agora;
    $prefix = $agora[$serviceName]['prefix'];

    // Query to get admin id
    $sql = "SELECT id FROM {$prefix}user WHERE username='admin'";
    // Actual execution
    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $db,
                'sql' => $sql,
                'serviceName' => $serviceName,
            ));
    // Error check. Stop in case of error.
    if (!$result['success']) {
        return LogUtil::registerError($this->__('No s\'ha pogut executar la consulta: ' . $sql . '. Error: ' . $result['errorMsg']));
    } else {
        // Keep result
        $adminId = $result['values'][0]['ID'];
    }

    // Generate a password for Moodle admin user
    $password = $this->createRandomPass();
    $passwordEnc = md5($password);

    // Query to update admin password
    $sqls[] = "
        UPDATE {$prefix}user
        SET password='$passwordEnc',
            firstname='Administrador/a',
            lastname='" . str_replace("'", "''", $item[$clientServiceId]['clientName']) . "',
            email='" . str_replace("'", "''", $item[$clientServiceId]['clientCode']) . "@xtec.cat',
            institution='" . str_replace("'", "''", $item[$clientServiceId]['clientName']) . "',
            address='" . str_replace("'", "''", $item[$clientServiceId]['clientAddress']) . "',
            city='" . substr(str_replace("'", "''", $item[$clientServiceId]['clientCity']), 0, 20) . "'
        WHERE id=$adminId
        ";

    // Query to force change of password of user admin
    $sqls[] = "
        UPDATE {$prefix}user_preferences
        SET value=1
        WHERE name='auth_forcepasswordchange' AND userid=$adminId
        ";

    // Query to update site name and site description
    $sqls[] = "
        UPDATE {$prefix}course 
        SET	fullname='" . str_replace("'", "''", $item[$clientServiceId]['clientName']) . "',
            shortname='" . str_replace("'", "''", $item[$clientServiceId]['clientDNS']) . "',
            summary='Moodle del centre " . str_replace("'", "''", $item[$clientServiceId]['clientName']) . "'
        WHERE id=1
        ";

    // Query to update the cookie name
    $sessionPrefix = ($serviceName == 'moodle') ? 'mdl_' : 'moodle';
    $sqls[] = "
        UPDATE {$prefix}config 
        SET value='$sessionPrefix" . $item[$clientServiceId]['clientId'] . "' 
        WHERE name='sessioncookie'
        ";

    // Execute the querys
    foreach ($sqls as $sql) {
        // Actual execution
        $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $db,
                    'sql' => $sql,
                    'serviceName' => $serviceName,
                ));
        // Error check. Stop in case of error.
        if (!$result['success']) {
            return LogUtil::registerError($this->__('No s\'ha pogut executar la consulta: ' . $sql . '. Error: ' . $result['errorMsg']));
        }
    }

    return array('db' => $db, 'password' => $password);
 */

    
/**
 * Check correct format value of school code
 * 
 * @param string $code
 * @return string $code or bool false 
 */
function checkCode($code) {
    $pattern = '/^[abce]\d{7}$/'; // Matches a1234567
    if (preg_match($pattern, $code)) {
        return $code;
    }
    return false;
}