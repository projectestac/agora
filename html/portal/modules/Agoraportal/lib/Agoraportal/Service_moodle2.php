<?php

/**
 * Class Service_moodle2
 * Describes a Moodle2 Service
 */
class Service_moodle2 extends Service {

    /**
     * Performs the actions to replace DNS in database
     * @param $oldDNS
     * @param $newDNS
     * @return Agora_Queues_Operation|false
     */
    public function replaceDNS($oldDNS, $newDNS) {
        global $agora;

        $urlbase = $agora['server']['server'] . $agora['server']['base'];
        $urlbase = str_replace('http://', '://', $urlbase);
        $urlbase = str_replace('https://', '://', $urlbase);

        $params = array();
        $params['origintext'] = $urlbase . $oldDNS . '/moodle';
        $params['targettext'] = $urlbase . $newDNS . '/moodle';

        return Agora_Queues_Operation::add('script_replace_database_text', $this->clientId, $this->serviceId, $params, 0);
    }

    /**
     * Get a free activedId
     *
     * @return int activedId
     */
    protected function getDBId() {
        return $this->calcFreeDatabase();
    }

    /**
     * Execute the operation to correctly enable the service
     * @param $password for admin
     * @return bool
     */
    protected function enable_service($password) {

        $client = $this->get_client();

        global $agora, $ZConfig;

        if (!$client->extraFunc) {
            return LogUtil::registerError('Falta indicar la plantilla al camp <strong>Plantilla de Moodle</strong>');
        }

        // TODO: Definir un camp per contenir la plantilla a la taula client_services. De moment es fa una validació
        //       del shortcode contra la llista de maquetes de Nodes
        $shortcode = $client->extraFunc;
        $template = ServiceTemplate::get_by_shortcode($shortcode);
        if (!$template) {
            return LogUtil::registerError("No s'ha trobat la plantilla indicada $shortcode");
        }

        $dbfile = $ZConfig['System']['datadir'] . '/moodle/mastermoodle' . $shortcode . '.sql';
        $datafile = $ZConfig['System']['datadir'] . '/moodle/mastermoodle' . $shortcode . '.zip';

        if (!file_exists($dbfile)) {
            LogUtil::registerError("No s'ha trobat el fitxer de base de dades $dbfile");
            return false;
        }

        if (!file_exists($datafile)) {
            LogUtil::registerError("No s'ha trobat el fitxer de dades $datafile");
            return false;
        }

        // Import DB
        // Temporary variable, used to store current query
        $currentSQL = '';
        // Read in entire file
        $lines = file($dbfile);
        // Loop through each line
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || substr($line, 0, 3) == '/*!' || substr($line, 0, 1) == '#' || $line == '') {
                continue;
            }
            // Add this line to the current segment
            $currentSQL .= $line;
            // Detection of sentences: If is not an insert, if it has a semicolon at the end, it's the end of the query.
            // If it is an insert, the end of the query is ');', but there is an exception for '});', which is the end
            // of line in H5P definitions.
            // Note: this script is not able to create the database. It must previously exist.
            if ((substr($currentSQL, 0, 6) != 'INSERT') && (substr(trim($line), -1, 1) == ';')
                || ((substr($currentSQL, 0, 6) == 'INSERT') && (substr(trim($line), -2, 2) == ');') && (substr(trim($line), -3, 3) != '});'))) {
                try {
                    $this->executeSQL($currentSQL, true);
                } catch (Throwable $e) {
                    return LogUtil::registerError(__('L\'execució de l\'sql ha fallat: ' . $currentSQL . '. Error: ' . $e->getMessage()));
                }

                // Reset temp variable to empty
                $currentSQL = '';
            }
        }

        // Directory for the new site files
        $dbUser = $agora['nodes']['userprefix'] . $this->activedId;
        $targetDir = $agora['server']['root'] . $agora['moodle2']['datadir'] . $dbUser . '/';

        // If the directory doesn't exists, create it
        if (!file_exists($targetDir)) {
            $newDir = mkdir($targetDir, 0777, true);
            if ($newDir) {
                LogUtil::registerStatus(__f("S'ha creat el directori %s", $targetDir));
            } else {
                LogUtil::registerError(__f("El directori %s no existia i no s'ha pogut crear", $targetDir));
                return false;
            }
        }

        // Uncompress the files
        $zip = new ZipArchive();

        $resource = $zip->open($datafile);
        if (!$resource) {
            LogUtil::registerError(__f("No s'ha pogut obrir el fitxer de base de %s", $datafile));
            return false;
        }

        // Try to extract the file
        if (!$zip->extractTo($targetDir)) {
            LogUtil::registerError(__f("S'ha produït un error en descomprimir el fitxer %s al directori %s", array($datafile, $targetDir)));
            $zip->close();
            return false;
        }

        $zip->close();

        $params = [];
        $params['password'] = md5($password); // Generate a password for Moodle admin user
        $params['clientName'] = $client->clientName;
        $params['clientCode'] = $client->clientCode;
        $params['clientAddress'] = $client->clientAddress;
        $params['clientCity'] = $client->clientCity;
        $params['clientDNS'] = $client->clientDNS;

        $operation = $this->addOperation('script_enable_service', $params, 5);

        if (!$operation) {
            return LogUtil::registerError('No s\'ha pogut afegir la operació d\'activació del servei');
        }

        SessionUtil::setVar('execOper', $operation->id);

        LogUtil::registerStatus('S\'està activant el servei... si no s\'activa aneu a les cues');

        return true;
    }

    /**
     * Connects to moodle database and returns the connection
     * @param $db
     * @param $userid
     * @param bool|false $createDB
     * @return resource
     * @throws Exception
     */
    public static function getDBConnection($dbHost, $db, $userid, $createDB = false) {
        global $ZConfig, $agora;

        $user = $agora['moodle2']['userprefix'] . $userid;
        $pass = $agora['moodle2']['userpwd'];

        if ($agora['moodle2']['dbtype'] == 'oci') {
            if ($ZConfig['System']['pconnect']) {
                $connect = oci_pconnect($user, $pass, $db);
            } else {
                $connect = oci_connect($user, $pass, $db);
            }
            if (!$connect) {
                $e = oci_error();
                throw new Exception(htmlentities($e['message'] . " - $user - $db"));
            }
        }

        if ($agora['moodle2']['dbtype'] == 'pgsql') {
            $db = $user;
            if ($ZConfig['System']['pconnect']) {
                $connect = pg_pconnect("host=$dbHost dbname=$db user=$user password=$pass");
            } else {
                $connect = pg_connect("host=$dbHost dbname=$db user=$user password=$pass");
            }
            if (!$connect) {
                throw new Exception(htmlentities(pg_last_error($connect)) . " - $user - $db");
            }
        }

        return $connect;
    }

    /**
     * Executes a SQL into oracle database and return the results
     * @param $sql
     * @param bool|false $connect
     * @param bool|false $keepalive
     * @return array|bool
     * @throws Exception
     */
    public static function sql($sql, $connect = false, $keepalive = false) {
        if (!$connect) {
            return false;
        }

        global $agora;

        $values = [];

        if ($agora['moodle2']['dbtype'] == 'oci') {
            if (substr_count(strtolower(trim($sql)), 'insert') > 1
                || substr_count(strtolower(trim($sql)), 'update') > 1
                || substr_count(strtolower(trim($sql)), 'delete') > 1) {
                // for multiple inserts, updates and deletes in Oracle SQL
                $sql = "BEGIN $sql END;";
            }

            $results = oci_parse($connect, $sql);
            if (!$results) {
                $error = oci_error($connect);
                throw new Exception($error["message"]);
            }

            $r = oci_execute($results);
            if (!$r) {
                $error = oci_error($results);
                throw new Exception($error["message"]);
            }

            if (strtolower(substr(trim($sql), 0, 6)) == 'select') {
                oci_fetch_all($results, $values, 0, -1, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
            }
            oci_free_statement($results);
        }

        if ($agora['moodle2']['dbtype'] == 'pgsql') {
            $result = pg_query($connect, $sql);
            if ($result === false) {
                $error = pg_last_error($connect);
                throw(new Exception($error . ': ' . $sql));
            }

            if (strtolower(substr(trim($sql), 0, 6)) == 'select') {
                while (($row = pg_fetch_assoc($result)) !== false) {
                    $values[] = $row;
                }
            }

            pg_freeresult($result);
        }

        return $values;
    }

    /**
     * Closes connection with the database
     * @param $connect
     */
    public static function disconnectDB($connect) {
        if ($connect) {
            global $agora;

            if ($agora['moodle2']['dbtype'] == 'oci') {
                oci_close($connect);
            }

            if ($agora['moodle2']['dbtype'] == 'pgsql') {
                pg_close($connect);
            }
        }
    }

    //Actions
    /**
     * Restore XTECAdmin action
     * @return bool succeed
     */
    public function restoreXtecadmin() {
        $operation = $this->addExecuteOperation('script_restore_xtecadmin');
        if (!$operation->has_succeeded()) {
            return LogUtil::registerError('Ha fallat la restauració de l\'usuari xtecadmin. Error:' . $operation->get_message());
        }
        LogUtil::registerStatus('S\'ha restaurat l\'usuari xtecadmin del Moodle del centre');
        return true;
    }

    /**
     * Show the list of files of the data directory
     *
     * @author Toni Ginard
     */
    public function getDataDirectory() {
        $agora = AgoraPortal_Util::getGlobalAgoraVars();
        return $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle2']['userprefix'] . $this->activedId;
    }

    /**
     * Show the list of files of the data directory
     *
     * @author Toni Ginard
     */
    public function getDataDirectoryList() {
        $dataDir = $this->getDataDirectory();

        $this->printDataDir($dataDir);
    }
}
