<?php

/**
 * Class Service_nodes
 * Describes a Nodes Service
 */
class Service_nodes extends Service {

    /**
     * Performs the actions to replace DNS in database
     * @param $oldDNS
     * @param $newDNS
     * @return Agora_Queues_Operation|false
     */
    public function replaceDNS($oldDNS, $newDNS) {
        global $agora;

        $urlbase = $agora['server']['html'];
        $urlbase = str_replace('http://', '://', $urlbase);
        $urlbase = str_replace('https://', '://', $urlbase);

        $params = array();
        $params['origin_url'] = $urlbase . $oldDNS . '/';

        return Agora_Queues_Operation::add('script_replace_url', $this->clientId, $this->serviceId, 0, $params);
    }

    /**
     * Calculates the activedId and serviceDB (got from twin) or free
     * @return int activedId
     */
    protected function getDBId() {
        $twin = Service::get_by_client_and_servicename($this->clientId, 'intranet');
        if ($twin && $twin->activedId > 0) {
            $this->activedId = $twin->activedId;
            $this->serviceDB = $twin->serviceDB;
            return $this->activedId;
        }

        $this->activedId = $this->calcFreeDatabase();
        return $this->activedId;
    }

    /**
     * Execute the operations to correctly enable the service
     * @param $password for admin
     * @return bool
     */
    protected function enable_service($password) {
        global $agora, $ZConfig;

        $client = $this->get_client();
        if (!$client->extraFunc) {
            return LogUtil::registerError("Falta indicar el tipus de plantilla al camp <strong>Funcionalitats addicionals</strong>");
        }

        $shortcode = $client->extraFunc;
        $template = ServiceTemplate::get_by_shortcode($shortcode);
        if (!$template) {
            return LogUtil::registerError("No s'ha trobat la plantilla indicada $shortcode");
        }

        $origin_url = $template->url;
        $origin_bd = $template->dbHost;

        $dbfile = $ZConfig['System']['datadir'] . '/nodes/master' . $shortcode . '.sql';
        $datafile = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['nodes']['userprefix'] . '1/repository/files/master' . $shortcode . '.zip';

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
        $currentSQL = "";
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
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                try {
                    $result = $this->executeSQL($currentSQL, true);
                } catch (Exception $e) {
                    return LogUtil::registerError(__f('L\'execució de l\'sql ha fallat: ' . $currentSQL . '. Error: ' . $e->getMessage()));
                }

                // Reset temp variable to empty
                $currentSQL = "";
            }
        }

        // Directory for the new site files
        $dbUser = $agora['nodes']['userprefix'] . $this->activedId;
        $targetDir = $agora['server']['root'] . $agora['nodes']['datadir'] . $dbUser . '/';

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

        // Generate a password for Moodle admin user
        $params = array();
        $params['password'] = md5($password); //Admin password en md5
        $params['clientName'] = $client->clientName;
        $params['clientAddress'] = $client->clientAddress;
        $params['clientCity'] = $client->clientCity;
        $params['clientPC'] = $client->clientPC; // Postal Code
        $params['clientDNS'] = $client->clientDNS;
        $params['clientCode'] = $client->clientCode;
        $params['origin_url'] = $origin_url;
        $params['origin_bd'] = $origin_bd;
        $operation = $this->addOperation('script_enable_service', $params, 5);
        if (!$operation) {
            return LogUtil::registerError('No s\'ha pogut afegir la operació d\'activació del servei');
        }
        SessionUtil::setVar('execOper', $operation->id);
        LogUtil::registerStatus('S\'està activant el servei... si no s\'activa aneu a les cues');
        return true;
    }

    /**
     * Connects to nodes database and returns the connection
     * @param $host
     * @param $dbid
     * @param bool|false $createDB
     * @return false|mysqli
     */
    public static function getDBConnection($host, $dbid, $createDB = false) {
        global $agora;

        $parts = explode(':', $host, 2);
        $host = $parts[0];
        $port = isset($parts[1]) ? $parts[1]: "";

        $username = $agora['nodes']['username'];
        $password = $agora['nodes']['userpwd'];
        $connect = new mysqli($host, $username, $password, '', (int)$port);
        if ($connect->connect_error) {
            $error = $connect->connect_error;
            return LogUtil::registerError($error);
        }
        $connect->set_charset('utf8');

        $db = $agora['intranet']['userprefix'] . $dbid;
        if (!$connect->select_db($db)) {
            if ($createDB) {
                $sql = "CREATE DATABASE IF NOT EXISTS $db DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
                if (!$connect->query($sql)) {
                    LogUtil::registerError("No s'ha pogut crear la base de dades $db en el servidor $host amb l'usuari " . $username);
                    LogUtil::registerError("SQL que ha fallat: $sql");
                    return false;
                }
            } else {
                LogUtil::registerError("No s'ha pogut seleccionar la base de dades $db en el servidor $host amb l'usuari " . $username . " i no s'ha intentat crear la base de dades.");
                return false;
            }
        }
        return $connect;
    }
}
