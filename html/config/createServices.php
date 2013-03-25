<?php
$schoolCodes = (isset($_REQUEST['schoolCodes'])) ? $_REQUEST['schoolCodes'] : '';

if (empty($schoolCodes)) { // Show form
?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Altes massives a &Agrave;gora</title>
        </head>
        <body>
            <form action="createServices.php" method="post">
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
        // TODO: utilitzar aquest algorisme per millorar agoraportal
        $sql = "SELECT DISTINCT activedId FROM agoraportal_client_services WHERE serviceId = 2 OR serviceId = 4 AND state <> 0 AND activedId <> 0 ORDER BY activedId";
        $res = mysqli_query ($dbc, $sql);
        $curIndex = 1;
        $dbChecked = $dbUser = $dbName = false;
        while ($row = mysqli_fetch_array ($res, MYSQLI_ASSOC)) {
            if ($curIndex == $row['activedId']) {
                $curIndex++;
            } else {
                // Comprova si la BD està disponible
                $connResult = checkConnection ($curIndex);
                if ($connResult !== false) {
                    $dbChecked = true;
                    $dbUser = $connResult['dbuser'];
                    $dbName = $connResult['dbname'];
                    break;
                }
            }
        }
        var_dump($dbChecked);
        echo $dbUser;
        echo $dbName;
        echo $curIndex;

        // Pas 4: Crear el servei a client_services

        
        
        // Pas 5: Crear una contrasenya
        
        // Pas 6: Fer els canvis a les taules del Moodle 2
        
        // Pas 7: Desar les dades, sobre tot la contrasenya (fitxer o taula?)
        

        
        mysqli_close($dbc);
    }
}



    // CODI COPIAT D'AGORAPORTAL (per a referència)
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


/**
 * Check connection to Oracle database
 * 
 * @param type $id
 * @return bool false if error, array if success
 */
function checkConnection ($id) {
    
    global $agora;
    
    $dbUser = $agora['moodle']['username'] . $id;

    $dbNumber = (int) $agora['moodle']['dbnumber'];
    $offset = floor($id / 200) + (($id % 200) == 0 ? ($dbNumber - 1) : $dbNumber);
    $offset = ($offset > 1) ? (string) $offset : '';
    $dbName = $agora['moodle']['database'] . $offset;

    $connect = oci_pconnect($dbUser, $agora['moodle']['userpwd'], $dbName);
    
    if ($connect === false) {
        return false;
    } else {
        oci_close($connect);
        return array('dbuser' => $dbUser, 'dbname' => $dbName);
    }
}