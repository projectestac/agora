<!DOCTYPE html>
<html>
    <head>
        <title>Altes massives al Moodle 2 d'&Agrave;gora</title>
        <meta charset="utf-8" />
    </head>
    <body>

<?php
$schoolCodes = (isset($_REQUEST['schoolCodes'])) ? $_REQUEST['schoolCodes'] : '';

if (empty($schoolCodes)) { // Show form
?>

    <form action="createServices.php" method="post">
        <div>
            <p>Aquest script crea el servei Moodle 2 per als codis de centre que s'indiquin. Punts a tenir en compte:</p>
            <ul>
                <li>El client ha d'existir a la taula agoraportal_clients</li>
                <li>El codi de centre ha de ser una lletra seguida de 7 números</li>
                <li>Si el centre té Moodle 1.9, es crearà el Moodle 2 en el mateix usuari</li>
                <li>Si el centre no té Moodle 1.9, es buscarà la propera BD lliure (sense cap Moodle)</li>
                <li>Si l'usuari no disposa de les taules del Moodle 2, l'script informa de que no s'ha trobat la taula m2user</li>
                <li>Es creen contrasenyes aleatòries per a l'admin del Moodle</li>
                <li>Es desa un registre d'accions a la taula <strong>agoraportal_autoregisterlog</strong> d'adminagora (es crea automàticament)</li>
            </ul>
        </div>      
        <div>Llista de codis de centre separats per comes: </div>
        <textarea name="schoolCodes" rows="10" cols="80" placeholder="Exemple: a8000000, a8000001, a8000002"></textarea><br />
        <input type="submit" />
    </form>

<?php
} else { // Do the work

    $clientCodes = explode(',', $schoolCodes);
    global $agora;

    foreach ($clientCodes as $clientCode) {
        // Check code validity
        $clientCode = (checkCode(trim($clientCode))) ? trim($clientCode) : '';
        if (!$clientCode) {
            echo "El codi <strong>$clientCode</strong> no és vàlid.<br />";
            continue;
        }

        // Pas 1: Connectar a la base de dades
        require ('env-config.php');
        $dbc = mysqli_connect($agora['admin']['host'], $agora['admin']['username'], $agora['admin']['userpwd'], $agora['admin']['database'], $agora['admin']['port']);
        $dbc->set_charset('utf8');


        // Pas 2: Obtenir l'id dels serveis moodle i moodle2
        $sql = "SELECT serviceId FROM agoraportal_services WHERE serviceName='moodle'";
        $res = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $serviceIdMdl = $row['serviceId'];

        $sql = "SELECT serviceId FROM agoraportal_services WHERE serviceName='moodle2'";
        $res = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $serviceIdMdl2 = $row['serviceId'];


        // Pas 3: Obtenir les dades del client (taula clients)
        $sql = "SELECT clientId, clientDNS, clientName, clientAddress, clientCity FROM agoraportal_clients WHERE clientCode='$clientCode'";
        $res = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if ($row !== null) {
            $clientId = $row['clientId'];
            $clientDNS = $row['clientDNS'];
            $clientName = str_replace("'", "''", $row['clientName']);
            $clientAddress = str_replace("'", "''", $row['clientAddress']);
            $clientCity = str_replace("'", "''", $row['clientCity']);
        } else {
            echo "El centre amb codi <strong>$clientCode</strong> no apareix a la taula <strong>agoraportal_clients</strong>. Per tant, no es crea el seu servei.<br />";
            continue;
        }


        // Pas 4: Comprovar que el centre encara no té Moodle 2
        $sql = "SELECT activedId, serviceDB FROM agoraportal_client_services 
                WHERE serviceId = $serviceIdMdl2 AND clientId = $clientId";
        $res = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if ($row !== null) {
            echo "El centre <strong>$clientName</strong> ja disposa de Moodle 2. Per tant, no es crea el seu servei.<br />";
            continue;
        }


        // Pas 5: Obtenir l'id del Moodle o de la propera BD lliure (activedId)
        $sql = "SELECT activedId, serviceDB FROM agoraportal_client_services 
                WHERE serviceId = $serviceIdMdl AND clientId = $clientId";
        $res = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $dbChecked = $dbUser = $dbName = false;
        if ($row !== null) {
            // S'ha obtingut la Id del Moodle 1.9
            $activedId = $row['activedId'];
            // Comprova si la BD està disponible i obté les dades de connexió
            $connResult = checkConnection($activedId);
            if ($connResult !== false) {
                $dbChecked = true;
                $dbUser = $connResult['dbuser'];
                $dbName = $connResult['dbname'];
            }
        } else {
            // No hi ha Moodle 1.9, es busca el proper forat lliure
            $sql = "SELECT DISTINCT activedId FROM agoraportal_client_services 
                    WHERE serviceId = $serviceIdMdl OR serviceId = $serviceIdMdl2 AND state <> 0 AND activedId <> 0
                    ORDER BY activedId";
            $res = mysqli_query($dbc, $sql);
            $curIndex = 1;
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                if ($curIndex == $row['activedId']) {
                    $curIndex++;
                } else {
                    // Comprova si la BD està disponible i obté les dades de connexió
                    $connResult = checkConnection($curIndex);
                    if ($connResult !== false) {
                        $dbChecked = true;
                        $dbUser = $connResult['dbuser'];
                        $dbName = $connResult['dbname'];
                        break;
                    }
                }
            }
            $activedId = $curIndex;
            // Si la clàusula if sempre ha estat certa, cal comprovar la BD
            if (!$dbChecked) {
                $connResult = checkConnection($activedId);
                if ($connResult !== false) {
                    $dbChecked = true;
                    $dbUser = $connResult['dbuser'];
                    $dbName = $connResult['dbname'];
                }
            }
        }
        // Si no ha pogut connectar a la base de dades, prova el següent centre
        if (!$dbChecked) {
            echo "No s'ha pogut connectar a l'usuari corresponent a <strong>activedId = $activedId</strong><br />";
            continue;
        }


        // Pas 6: Crear una contrasenya
        $password = createRandomPass();
        $passwordEnc = md5($password);


        // Pas 7: Fer els canvis a les taules del Moodle 2
        $prefix = $agora['moodle2']['prefix'];
        $adminId = 2;
        // Query to update admin password
        $sqls['user'] = "
            UPDATE $prefix" . "user
            SET password='$passwordEnc',
                firstname='Administrador/a',
                lastname='$clientCode',
                email='$clientCode@xtec.cat',
                institution='" . mb_substr($clientName, 0, 39) . "',
                address='$clientAddress',
                city='" . mb_substr($clientCity, 0, 119) . "'
            WHERE id=$adminId
            ";
        // Query to force change of password of user admin
        $sqls['user_preferences'] = "
            UPDATE $prefix" . "user_preferences
            SET value=1
            WHERE name='auth_forcepasswordchange' AND userid=$adminId
            ";
        // Query to update site name and site description
        $sqls['course'] = "
            UPDATE $prefix" . "course
            SET	fullname='$clientName',
                shortname='$clientDNS',
                summary='Moodle del centre $clientName'
            WHERE id=1
            ";
        // Query to update the cookie name
        $sqls['config'] = "
            UPDATE $prefix" . "config
            SET value='moodle" . "$clientId'
            WHERE name='sessioncookie'
            ";
        // Execute the queries
        foreach ($sqls as $key => $sql) {
            // Actual execution
            $result = executeSQL($sql, $dbUser, $dbName);
            // Error check
            if (is_string($result)) {
                echo $result;
                break; // Si falla una consulta, ja no en prova més
            } else {
                echo "S'ha actualitzat la taula <strong>$key</strong> del Moodle 2 del centre <strong>$clientName</strong> amb nom propi <strong>$clientDNS</strong><br />";
            }
        }


        // Pas 8: Crear el servei a client_services
        $sql = "INSERT INTO agoraportal_client_services
                (serviceId, clientId, serviceDB, state, activedId, contactProfile, timeCreated, diskSpace)
                VALUES ($serviceIdMdl2, $clientId, '$dbName', 1, '$activedId', 'Alta automàtica', UNIX_TIMESTAMP(), 2000)";
        if (mysqli_query($dbc, $sql) === true) {
            echo "S'ha creat el servei Moodle 2 per al centre <strong>$clientDNS</strong><br />";
        } else {
            echo "No s'ha pogut crear el servei Moodle 2 per al centre <strong>$clientDNS</strong><br />";
        }


        // Pas 9: Desar les dades a la taula de registre
        $sql = "CREATE TABLE IF NOT EXISTS agoraportal_autoregisterlog (
                    Id int(11) NOT NULL AUTO_INCREMENT,
                    clientId int(11) NOT NULL DEFAULT 0,
                    clientCode varchar(10) NOT NULL DEFAULT '',
                    password varchar(50) NOT NULL DEFAULT '',
                    dbUser varchar(10) NOT NULL DEFAULT '',
                    dbName varchar(10) NOT NULL DEFAULT '',
                    clientDNS varchar(50) NOT NULL DEFAULT '',
                    clientName varchar(150) NOT NULL DEFAULT '',
                    clientAddress varchar(150) NOT NULL DEFAULT '',
                    clientCity varchar(50) NOT NULL DEFAULT '',
                    timeCreated varchar(25) NOT NULL DEFAULT '',
                    PRIMARY KEY (`Id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        if (mysqli_query($dbc, $sql) !== true) {
            echo "S'ha produït un error en crear la taula <strong>agoraportal_autoregisterlog</strong><br />";
        }
        $sql = "INSERT INTO agoraportal_autoregisterlog
                (clientId, clientCode, password, dbUser, dbName, clientDNS, clientName, clientAddress, clientCity, timecreated)
                VALUES ($clientId, '$clientCode', '$password', '$dbUser', '$dbName', '$clientDNS', '$clientName', '$clientAddress', '$clientCity', now())";
        if (mysqli_query($dbc, $sql) !== true) {
            echo "S'ha produït un error en introduir un registre la taula <strong>agoraportal_autoregisterlog</strong><br />";
        }

        // Comença un servei nou
        echo '<br />';
        
        mysqli_close($dbc);
    }
}

/**
 * Check correct format value of school code
 * 
 * @param string $clientCode
 * @return string $clientCode or bool false
 */
function checkCode($clientCode) {
    $pattern = '/^[abce]\d{7}$/'; // Matches a1234567
    if (preg_match($pattern, $clientCode)) {
        return $clientCode;
    }
    return false;
}


/**
 * Check connection to Oracle database
 * 
 * @param type $id
 * @return bool false if error, array if success
 */
function checkConnection($id) {
    
    global $agora;
    
    $dbUser = $agora['moodle2']['userprefix'] . $id;
    $prefix = strtoupper($agora['moodle2']['prefix']);

    if (empty($agora['moodle2']['dbnumber'])) {
        $offset = '';
    } else {
        $dbNumber = (int) $agora['moodle2']['dbnumber'];    
        $offset = floor($id / 200) + (($id % 200) == 0 ? ($dbNumber - 1) : $dbNumber);       
        $offset = ($offset > 1) ? (string) $offset : '';
    }

    $dbName = $agora['moodle2']['database'] . $offset;

    $connect = oci_pconnect($dbUser, $agora['moodle2']['userpwd'], $dbName);
    
    if ($connect === false) {
        echo "No s'ha pogut connectar a l'usuari <strong>$dbUser</strong> de la instància <strong>$dbName</strong><br />";
        return false;
    } else {
        $sql = "select table_name from user_tables where table_name='$prefix"."USER'";
        $stid = oci_parse($connect, $sql);
        $result = oci_execute($stid);
        $row = oci_fetch_array($stid);
        oci_close($connect);
        if (!isset($row['TABLE_NAME'])) {
            echo "No s'ha trobat la taula <strong>$prefix"."USER</strong> a l'usuari <strong>$dbUser</strong> de la base de dades <strong>$dbName</strong><br />";
            return false;
        }
        return array('dbuser' => $dbUser, 'dbname' => $dbName);
    }
}


/**
 * Create random password
 *
 * @return string The password
 */
function createRandomPass() {

        // Chars allowed in password
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz023456789";

        // Sets the seed for rand function
        srand((float) microtime() * 1000000);

        for ($i = 0, $pass = ''; $i < 8; $i++) {
            $num = rand() % strlen($chars);
            $pass = $pass . substr($chars, $num, 1);
        }

        return $pass;
}


/**
 * Execute a given query
 *
 * @global type $agora
 * @param type $sql
 * @param type $dbUser
 * @param type $dbName
 * @return boolean true if success, string if error
 */
function executeSQL($sql, $dbUser, $dbName) {

    global $agora;

    $connect = oci_pconnect($dbUser, $agora['moodle2']['userpwd'], $dbName);

    if ($connect === false) {
        return "No s'ha pogut connectar a l'usuari <strong>$dbUser</strong> de la base de dades <strong>$dbName</strong><br />";
    } else {
        $stid = oci_parse($connect, $sql);
        if ($stid === false) {
            $return = "No s'ha pogut parsejar l'sql <strong>$sql</strong> a l'usuari <strong>$dbUser</strong> de la base de dades <strong>$dbName</strong><br />";
        } else {
            $result = oci_execute($stid);
            $return = ($result) ? true : "No s'ha pogut executar l'sql <strong>$sql</strong> a l'usuari <strong>$dbUser</strong> de la base de dades <strong>$dbName</strong><br />";
        }
        oci_close($connect);
        return $return;
    }
}
?>

    </body>
</html>
