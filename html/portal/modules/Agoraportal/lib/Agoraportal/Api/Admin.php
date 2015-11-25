<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

class Agoraportal_Api_Admin extends Zikula_AbstractApi {

    public static $operations_timeout = 1800; ///Half an hour

    /**
     * Insert a new client in the database
     * @author 		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param 		The client main properties
     * @return 		The new client identity if success and false otherwise
     */
    public function createClient($args) {
        // Security check
        if (!AgoraPortal_Util::isAdmin()) {
            //TODO: Protect correctly this function. It needs access from the AuthLDAP module in the first validation process
            //throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($args['clientName']) || !isset($args['clientDNS']) || !isset($args['clientCode'])) {
            return LogUtil::registerError($this->__('No s\'ha pogut carregar el que volíeu. Reviseu les dades'));
        }
        // Check if the client DNS exists or the client code exists
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_clients_column'];
        $where = "$c[clientCode]='$args[clientCode]' OR $c[clientDNS]='$args[clientDNS]'";
        $items = DBUtil::selectObjectArray('agoraportal_clients', $where, '', '0', '1', 'clientId');
        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }
        if (!empty($items)) {
            return LogUtil::registerError($this->__('Aquest client ja existeix. El DNS i el codi de client han de ser únics'));
        }
        //Create item
        $item = array('clientCode' => $args['clientCode'],
            'clientName' => $args['clientName'],
            'clientDNS' => $args['clientDNS'],
            'clientAddress' => $args['clientAddress'],
            'clientCity' => $args['clientCity'],
            'clientPC' => $args['clientPC'],
            'clientState' => $args['clientState'],
            'clientDescription' => $args['clientDescription']);
        if (!DBUtil::insertObject($item, 'agoraportal_clients', 'clientId')) {
            return LogUtil::registerError($this->__('L\'intent de creació ha fallat'));
        }

        //Loader::LoadClass('UserUtil');
        $idGroupClients = UserUtil::getGroupIdList('name=\'Clients\'');

        if (!isset($args['dontAddToGroup']) && !ModUtil::apiFunc('Groups', 'user', 'isgroupmember', array('gid' => $idGroupClients,
                    'uid' => UserUtil::getIdFromName($args['clientCode'])))) {
            if (UserUtil::getIdFromName($args['clientCode'])) {
                // add client to clients group which has the id 3
                if (!ModUtil::apiFunc('Groups', 'admin', 'adduser', array('gid' => $idGroupClients,
                            'uid' => UserUtil::getIdFromName($args['clientCode'])))) {
                    return LogUtil::registerError($this->__('El client no s\'ha pogut posar al grup de clients.'));
                }
            }
        }
        // Return the id of the newly created item to the calling process
        return $item['clientId'];
    }

    /**
     * Update a existing client
     * @author 		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param 		Client identity and new properties values
     * @return 		True if success and false otherwise
     */
    public function editClient($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // get client information
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClients', array('clientId' => $args['clientId']));
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_clients_column'];
        $where = "$c[clientId] = $args[clientId]";
        if (!DBUTil::updateObject($args['items'], 'agoraportal_clients', $where)) {
            return LogUtil::registerError($this->__('No s\'ha pogut actualitzar'));
        }
        return true;
    }

    /**
     * update a service for a given client
     * @author 		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param 		Client-service identity
     * @return 		True if success and false otherwise
     */
    public function editService($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        $clientServiceId = $args['clientServiceId'];

        // Needed argument
        if (!isset($clientServiceId) || !is_numeric($clientServiceId)) {
            return LogUtil::registerError($this->__('No s\'ha pogut carregar el que volíeu. Reviseu les dades'));
        }
        //Get item
        $item = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId));
        if ($item == false) {
            return LogUtil::registerError($this->__('No s\'ha trobat el servei'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_client_services_column'];
        $where = "$c[clientServiceId] = $clientServiceId";

        if (!DBUTil::updateObject($args['items'], 'agoraportal_client_services', $where)) {
            return LogUtil::registerError($this->__('No s\'ha pogut actualitzar'));
        }
        return true;
    }

    /**
     * remove a service for a given client
     * @author 		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param 		Client-service identity
     * @return 		True if success and false otherwise
     */
    public function deleteService($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        $clientServiceId = $args['clientServiceId'];
        // Needed argument
        if (!isset($clientServiceId) || !is_numeric($clientServiceId)) {
            return LogUtil::registerError($this->__('No s\'ha pogut carregar el que volíeu. Reviseu les dades'));
        }
        //Get item
        $item = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId));
        if ($item == false) {
            return LogUtil::registerError($this->__('No s\'ha trobat el servei'));
        }
        if (!DBUtil::deleteObjectByID('agoraportal_client_services', $clientServiceId, 'clientServiceId')) {
            return LogUtil::registerError($this->__('L\'intent d\'esborrament ha fallat'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('Agoraportal');
        $view->clear_cache(null, $clientServiceId);
        return true;
    }

    /**
     * Generic function to activate services. Does common operations and calls
     * specific function to complete the activation process
     *
     * @param array $args
     * @return boolean
     * @throws Zikula_Exception_Forbidden
     */
    public function activeService($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();

        // Needed argument
        $clientServiceId = $args['clientServiceId'];
        if (!isset($clientServiceId) || !is_numeric($clientServiceId)) {
            return LogUtil::registerError($this->__('Falta l\'Id del client-servei'));
        }

        // Needed argument
        $serviceName = strtolower($args['serviceName']);
        if (!isset($serviceName) || empty($serviceName)) {
            return LogUtil::registerError($this->__('Falta el nom del servei'));
        }

        // Get definition of the service
        $service = ModUtil::apiFunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => $serviceName));
        if (!is_array($service)) {
            return LogUtil::registerError($this->__('No s\'ha trobat el servei '.$serviceName));
        }

        $activeService_function = 'activeService_' . $serviceName;
        if (!method_exists($this, $activeService_function)) {
            return LogUtil::registerError('La funció d\'activació per al servei '.$serviceName.' no existeix.');
        }

        $serviceId = $service['serviceId'];

        // Get dbHost form the func params
        $dbHost = $args['dbHost'];

        // Get full client-service record
        $clientService = ModUtil::apiFunc('Agoraportal', 'user', 'getClientServiceById', array('clientServiceId' => $clientServiceId));
        if (!$clientService) {
            return LogUtil::registerError($this->__('No s\'ha trobat la informació del client-servei amb Id ' . $clientServiceId));
        }

        // Get full client record
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getClientById', array('clientId' => $clientService['clientId']));
        if (!$client) {
            return LogUtil::registerError($this->__('No s\'ha trobat la informació del client amb Id ' . $clientServiceId['clientId']));
        }

        // Get the actual Id
        $db = $this->getDBId($clientService, $serviceId, $client['clientId'], $serviceName, $dbHost);
        if (empty($db)) {
            return LogUtil::registerError($this->__('No queda cap base de dades lliure'));
        } else {
            LogUtil::registerStatus('Base de dades seleccionada '.$db);
        }

        // Get the database value depending on the service requested
        // In MySQL is DB name. In Oracle is Oracle instance.
        if ($serviceName == 'moodle2') {
            $serviceDB = ModUtil::apiFunc('Agoraportal', 'user', 'calcOracleInstance', array('database' => $db));
            if (empty($serviceDB)) {
                return LogUtil::registerError('No s\'ha pogut calcular la instància d\'Oracle corresponent');
            } else {
                LogUtil::registerStatus('Instància Oracle seleccionada '.$serviceDB);
            }
        } else {
            // This info is not necessary for other services
            $serviceDB = "";
        }

        // edit service information needed to execute activation
        $clientServiceEdited = ModUtil::apiFunc('Agoraportal', 'admin', 'editService',
                array('clientServiceId' => $clientServiceId,
                        'items' => array('serviceDB' => $serviceDB,
                                         'timeCreated' => time(),
                                         'activedId' => $db,
                                         'dbHost' => $dbHost,
                                         'state' => 1 // Force change to be able to execute CLI operations
                                        )
                    )
                );

        if (!$clientServiceEdited) {
            return LogUtil::registerError($this->__('Error en l\'edició del registre'));
        }

        $password = $this->createRandomPass();

        $result = $this->$activeService_function($db, $dbHost, $client, $service, $password);

        if (!$result) {
            // Fallback changes on error
            ModUtil::apiFunc('Agoraportal', 'admin', 'editService',
                array('clientServiceId' => $clientServiceId,
                        'items' => array('serviceDB' => $clientService['serviceDB'],
                                         'timeCreated' => $clientService['timeCreated'],
                                         'activedId' => $clientService['activedId'],
                                         'dbHost' => $clientService['dbHost'],
                                         'state' => $clientService['state']
                                        )
                    )
                );
            return LogUtil::registerError($this->__('S\'ha produït un error en la creació del servei.'));
        }

        // insert the action in logs table
        ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('clientCode' => $client['clientCode'],
            'actionCode' => 2,
            'action' => $this->__f('S\'ha aprovat la sol·licitud del servei %s', $serviceName)));

        $log = array();
        $log['clientId'] = $client['clientId'];
        $log['clientCode'] = $client['clientCode'];
        $log['serviceId'] = $serviceId;
        $log['clientServiceId'] = $clientServiceId;
        $log['password'] = $password;
        $log['clientDNS'] = $client['clientDNS'];
        $log['timeCreated'] = time();
        DBUtil::insertObject($log, 'agoraportal_enable_service_log');

        $return = array('serviceDB' => $serviceDB, 'password' => $password);
        if ($result !== true && is_numeric($result)) {
            SessionUtil::setVar('execOper', $result);
        }
        return $return;
    }

    /**
     * Get DB ID
     * @param  Object $clientService
     * @param  integer $serviceId   id of the desired service
     * @param  integer $clientId    id of the desirec client
     * @param  string $serviceName  name of the desired service
     * @param  string $dbHost       to connect
     * @return integer/false  with the database to connect
     */
    private function getDBId($clientService, $serviceId, $clientId, $serviceName, $dbHost) {
        $params = array('serviceId' => $serviceId, 'serviceName' => $serviceName, 'dbHost' => $dbHost);
        switch ($serviceName) {
            case 'nodes':
                // Look for the twin service
                $clientService = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientId,
                    'serviceName' => 'intranet'));
                break;
            case 'intranet':
                // Look for the twin service
                $clientService = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientId,
                    'serviceName' => 'nodes'));
                break;
            case 'marsupial':
                return 1;
        }

        // Get a DB Id
        if (!empty($clientService) && $clientService['activedId'] > 0) {
            // This client-service has already an Id assigned
            return $clientService['activedId'];
        } else {
            // Get the actual Id
            return ModUtil::apiFunc('Agoraportal', 'admin', 'getFreeDataBase', $params);
        }
    }

    /**
     * Activate moodle service. Each service have got its activation function.
     *
     * @author 	Albert Pérez Monfort (aperezm@xtec.cat)
     * @author 	Toni Ginard
     *
     * @param string Client-service identity
     *
     * @return  array if Ok / boolean if error
     */
    private function activeService_moodle2($db, $dbHost, $client, $service, $password) {

        // Generate a password for Moodle admin user
        $params = array();
        $params['password'] = md5($password);
        $params['clientName'] = $client['clientName'];
        $params['clientCode'] = $client['clientCode'];
        $params['clientAddress'] = $client['clientAddress'];
        $params['clientCity'] = $client['clientCity'];
        $params['clientDNS'] = $client['clientDNS'];
        $operation = ModUtil::apiFunc('Agoraportal', 'admin', 'addOperation',
                    array('operation' => 'script_enable_service',
                        'clientId' => $client['clientId'],
                        'serviceId' => $service['serviceId'],
                        'params' => $params
                    ));
        if (!$operation['id']) {
            LogUtil::registerError('No s\'ha pogut afegir la operació d\'activació del servei');
            return false;
        }
        LogUtil::registerStatus('S\'està activant el servei... si no s\'activa aneu a les cues');
        return $operation['id'];
    }

    /**
     * Activate intranet service. Each service have got its activation function
     *
     * @author 	Albert Pérez Monfort (aperezm@xtec.cat)
     * @author 	Toni Ginard
     *
     * @param string $clientServiceId
     * @param string Data base server including optional port
     *
     * @return 	array if Ok / boolean if error
     */
    private function activeService_intranet($db, $dbHost, $client, $service, $password) {
        global $agora;

        // Get the params
        $clientName = $client['clientName'];
        $clientCode = $client['clientCode'];

        // Generate a password for Intraweb admin user
        $passwordEnc = '1$$' . md5($password);

        $username = $agora['intranet']['userprefix'] . $db;

        $sql = array();

        $value = DataUtil::formatForStore(serialize($clientName));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='sitename'";

        $value = DataUtil::formatForStore(serialize($clientName));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='defaultpagetitle'";

        $value = DataUtil::formatForStore(serialize($clientCode . '@xtec.cat'));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='adminmail'";

        $value = DataUtil::formatForStore(serialize('ZKSID' . $db));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='sessionname'";

        $value = DataUtil::formatForStore(serialize(''));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='slogan'";

        $value = DataUtil::formatForStore(serialize('Intranet de ' . $clientName));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='defaultmetadescription'";

        $value = DataUtil::formatForStore(serialize(date('m/Y', time())));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='startdate'";

        $sql[] = "UPDATE users set pass='$passwordEnc', email='" . $clientCode . "@xtec.cat' WHERE uname='admin'";

        $value = DataUtil::formatForStore(serialize($agora['server']['root'] . $agora['intranet']['datadir'] . $username . '/data'));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='IWmain' AND name='documentRoot'";

        foreach ($sql as $oneSql) {
            $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $db,
                        'sql' => $oneSql,
                        'serviceName' => 'intranet',
                        'host' => $dbHost,
                    ));
            if (!$result['success']) {
                LogUtil::registerError($this->__('L\'execució de l\'sql ha fallat: ' . $oneSql . '. Error: ' . $result['errorMsg']));
                return false;
            }
        }

        return true;
    }

    /**
     * Activate nodes service
     *
     * @author Toni Ginard
     *
     * @return 	array with dummy value
     */
    private function activeService_nodes($db, $dbHost, $client, $service, $password) {

        global $agora, $ZConfig;

        if (!isset($client['extraFunc']) || empty($client['extraFunc'])) {
            return LogUtil::registerError($this->__("Falta indicar el tipus de plantilla al camp <strong>Funcionalitats addicionals</strong>"));
        }

        $templatekeyword = $client['extraFunc'];
        $templates = ModUtil::apiFunc('Agoraportal', 'user', 'getModelTypes', array('keyword' => $templatekeyword));
        $template = array_shift($templates);

        // If keyword provided by the user is not on the list, tell them and throw an error.
        if (empty($template)) {
            return LogUtil::registerError($this->__("No s'ha trobat la plantilla indicada $templatekeyword"));
        }

        $shortcode = $template['shortcode'];
        $origin_url = $template['url'];
        $origin_bd = $template['dbHost'];

        if (empty($shortcode)) {
            LogUtil::registerError($this->__("El codi curt de la plantilla indicada no està definit. Reviseu la configuració del mòdul."));
            return false;
        }

        $dbfile = $ZConfig['System']['datadir'] . '/nodes/master' . $shortcode . '.sql';
        $datafile = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['nodes']['userprefix'] . '1/repository/files/master' . $shortcode . '.zip';

        if (!file_exists($dbfile)) {
            LogUtil::registerError($this->__f("No s'ha trobat el fitxer de base de dades %s", $dbfile));
            return false;
        }

        if (!file_exists($datafile)) {
            LogUtil::registerError($this->__f("No s'ha trobat el fitxer de dades %s", $datafile));
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
                // Perform the query
                $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $db,
                        'sql' => $currentSQL,
                        'serviceName' => 'nodes',
                        'host' => $dbHost
                ));
                // Reset temp variable to empty
                $currentSQL = "";

                if (!$result['success']) {
                    LogUtil::registerError($this->__('L\'execució de l\'sql ha fallat: ' . $sql . '. Error: ' . $result['errorMsg']));
                    return false;
                }
            }
        }

        // Directory for the new site files
        $dbUser = $agora['nodes']['userprefix'] . $db;
        $targetDir = $agora['server']['root'] . $agora['nodes']['datadir'] . $dbUser . '/';

        // If the directory doesn't exists, create it
        if (!file_exists($targetDir)) {
            $newDir = mkdir($targetDir, 0777, true);
            if ($newDir) {
                LogUtil::registerStatus(__f("S'ha creat el directori %s", $targetDir));
            } else {
                LogUtil::registerError($this->__f("El directori %s no existia i no s'ha pogut crear", $targetDir));
                return false;
            }
        }

        // Uncompress the files
        $zip = new ZipArchive();

        $resource = $zip->open($datafile);
        if (!$resource) {
            LogUtil::registerError($this->__f("No s'ha pogut obrir el fitxer de base de %s", $datafile));
            return false;
        }

        // Try to extract the file
        if (!$zip->extractTo($targetDir)) {
            LogUtil::registerError($this->__f("S'ha produït un error en descomprimir el fitxer %s al directori %s", array($datafile, $targetDir)));
            $zip->close();
            return false;
        }

        $zip->close();

        // Generate a password for Moodle admin user
        $params = array();
        $params['password'] = md5($password); //Admin password en md5
        $params['clientName'] = $client['clientName'];
        $params['clientAddress'] = $client['clientAddress'];
        $params['clientCity'] = $client['clientCity'];
        $params['clientPC'] = $client['clientPC']; // Postal Code
        $params['clientDNS'] = $client['clientDNS'];
        $params['clientCode'] = $client['clientCode'];
        $params['origin_url'] = $origin_url;
        $params['origin_bd'] = $origin_bd;

        $operation = ModUtil::apiFunc('Agoraportal', 'admin', 'addOperation',
                array('operation' => 'script_enable_service',
                    'clientId' => $client['clientId'],
                    'serviceId' => $service['serviceId'],
                    'params' => $params
                ));

        if (!$operation['id']) {
            LogUtil::registerError('No s\'ha pogut afegir la operació d\'activació del servei');
            return false;
        }
        LogUtil::registerStatus('S\'està activant el servei... si no s\'activa aneu a les cues');
        return $operation['id'];
    }

    /**
     * Activate marsupial service.
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     *
     * @return 	array with dummy value
     */
    private function activeService_marsupial($db, $dbHost, $client, $service, $password) {
        return true;
    }

    /**
     *  Find free database number
     *
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @author     Toni Ginard
     *
     * @param  		Client-service identity
     *
     * @return 		The first available database or false if something is wrong
     */
    public function getFreeDataBase($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();

        // Needed for connectExtDB
        $dbHost = $args['dbHost'];

        // Moodle and moodle2 use the same activeId, so must be treated as one
        if (isset($args['serviceName']) && $args['serviceName'] == 'moodle2') {
            // Get the list of moodle2 services of all the clients. First step
            // is to get the service Id from the service definition. Second step
            // is get all the client-services with that Id.
            $moodle2Service = ModUtil::apiFunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => 'moodle2'));
            $moodle2ServiceId = $moodle2Service['serviceId'];
            $moodle2ClientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('service' => $moodle2ServiceId,
                        'state' => -1));

            if (empty($moodle2ClientServices)) {
                LogUtil::registerError($this->__('No s\'han obtingut dades de la taula clientServices'));
                return false;
            }

            // Initial values
            $databaseIds = array();
            $max = 0;

            // Get a list of activedId of moodle2 client-services
            foreach ($moodle2ClientServices as $service) {
                if ($service['activedId'] != 0) {
                    $databaseIds[] = $service['activedId'];
                    if ($service['activedId'] > $max) {
                        $max = $service['activedId'];
                    }
                }
            }

            sort($databaseIds);

        } else {
            // Get ID of service 'nodes'
            $nodes = ModUtil::apiFunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => 'nodes'));
            $idNodes = $nodes['serviceId'];

            // Get ID of service 'intranet'
            $intranet = ModUtil::apiFunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => 'intranet'));
            $idIntranet = $intranet['serviceId'];

            // Get all client services (all states) of service 'nodes'
            $allNodes = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('service' => $idNodes,
                        'state' => -1));
            if (!$allNodes) {
                LogUtil::registerError($this->__('No s\'ha trobat cap nodes'));
                return false;
            }

            // Get all client services (all states) of service 'intranet'
            $allIntranet = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('service' => $idIntranet,
                        'state' => -1));
            if (!$allIntranet) {
                LogUtil::registerError($this->__('No s\'ha trobat cap intranet'));
                return false;
            }

            // Get all the 'activedId' used (each 'activedId' is a database)
            $databaseIds = array();
            $max = 0;
            foreach ($allNodes as $item) {
                if ($item['activedId'] != 0) {
                    $databaseIds[] = $item['activedId'];
                    if ($item['activedId'] > $max) {
                        $max = $item['activedId'];
                    }
                }
            }

            foreach ($allIntranet as $item) {
                if ($item['activedId'] != 0) {
                    $databaseIds[] = $item['activedId'];
                    if ($item['activedId'] > $max) {
                        $max = $item['activedId'];
                    }
                }
            }

            $databaseIds = array_unique($databaseIds);

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
        $forceCreateDB = ($serviceInfo['serviceName']=='nodes');

        $connect = ModUtil::apiFunc('Agoraportal', 'user', 'connectExtDB', array('serviceName' => $serviceInfo['serviceName'],
                    'database' => $free,
                    'host' => $dbHost,
                    'forceCreateDB' => $forceCreateDB));

        if (!$connect) {
            LogUtil::registerError($this->__('No s\'ha pogut connectar a la base de dades. '
                    . 'Paràmetres passats a connectExtDB: servicename: '
                    . $serviceInfo['serviceName'] . ', database: ' . $free . ', host: ' . $dbHost));
            return false;
        }

        return $free;
    }

    /**
     * Update an existing service
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The service identity
     * @return     The first available database or false if something is wrong
     */
    public function updateService($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_services_column'];
        $where = "$c[serviceId] = $args[serviceId]";
        if (!DBUtil::updateObject($args['service'], 'agoraportal_services', $where)) {
            return LogUtil::registerError($this->__('No s\'ha pogut actualitzar'));
        }
        return true;
    }

    /**
     * Update a location
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The location identity
     * @return     Thue if success and false otherwise
     */
    public function editLocation($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // get location information
        $location = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations', array('locationId' => $args['locationId']));
        if (!$location) {
            return LogUtil::registerError($this->__('No s\'ha trobat el Servei Territorial'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_location_column'];
        $where = "$c[locationId] = $args[locationId]";
        $items = array('locationName' => $args['locationName']);
        if (!DBUtil::updateObject($items, 'agoraportal_location', $where)) {
            return LogUtil::registerError($this->__('No s\'ha pogut actualitzar'));
        }
        return true;
    }

    /**
     * Update a request type
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param      The request type information
     * @return     Thue if success and false otherwise
     */
    public function editRequestType($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // get location information
        $requestType = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes', array('requestTypeId' => $args['requestTypeId']));
        if (!$requestType) {
            return LogUtil::registerError($this->__('No s\'ha trobat el tipus de sol·licitud'));
        }
        $id = $args['requestTypeId'];
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_requestTypes_column'];
        $where = "$c[requestTypeId] = $id";
        $items = array('name' => $args['requestTypeName'], 'description' => $args['requestTypeDescription'], 'userCommentsText' => $args['requestTypeUserCommentsText']);
        if (!DBUtil::updateObject($items, 'agoraportal_requestTypes', $where)) {
            return LogUtil::registerError($this->__('No s\'ha pogut actualitzar'));
        }
        return true;
    }

    /**
     * Insert a new location
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The location parameters
     * @return     Thue new location identity if success and false otherwise
     */
    public function addNewLocation($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // Check if the client DNS exists or the client code exists
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_location_column'];
        //Create item
        $item = array('locationName' => $args['locationName']);
        if (!DBUtil::insertObject($item, 'agoraportal_location', 'locationId')) {
            return LogUtil::registerError($this->__('L\'intent de creació ha fallat'));
        }
        // Return the id of the newly created item to the calling process
        return $item['locationId'];
    }

    /**
     * Insert a new relation request type - service
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param      The request type and service identification
     * @return     The request type identity if success and false otherwise
     */
    public function addNewRequestTypeService($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // Check if the client DNS exists or the client code exists
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_requestTypesServices_column'];
        //Create item
        $item = array('requestTypeId' => $args['requestTypeId'], 'serviceId' => $args['serviceId']);
        if (!DBUtil::insertObject($item, 'agoraportal_requestTypesServices')) {
            return LogUtil::registerError($this->__('L\'intent de creació ha fallat'));
        }
        // Return the id of the newly created item to the calling process
        return $item['requestTypeId'];
    }

    /**
     * Insert a new request type
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param      The request type parameters
     * @return     Thue new request type identity if success and false otherwise
     */
    public function addNewRequestType($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // Check if the client DNS exists or the client code exists
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_requestTypes_column'];
        //Create item
        $item = array('name' => $args['requestTypeName'], 'description' => $args['requestTypeDescription'], 'userCommentsText' => $args['requestTypeUserCommentsText']);
        if (!DBUtil::insertObject($item, 'agoraportal_requestTypes', 'requestTypeId')) {
            return LogUtil::registerError($this->__('L\'intent de creació ha fallat'));
        }
        // Return the id of the newly created item to the calling process
        return $item['requestTypeId'];
    }

    /**
     * Save model data to data base
     *
     * @author Toni Ginard
     * @param string shortcode
     * @param string keyword
     * @return Boolean false on error, int model ID on success
     * @throws Zikula_Exception_Forbidden
     */
    public function addNewModelType($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();

        $shortcode = $args['shortcode'];
        $keyword = $args['keyword'];
        $description = $args['description'];
        $url = $args['url'];
        $dbHost = $args['dbHost'];

        $item = array(
            'shortcode' => $shortcode,
            'keyword' => $keyword,
            'description' => $description,
            'url' => $url,
            'dbHost' => $dbHost
        );

        if (!DBUtil::insertObject($item, 'agoraportal_modelTypes', 'modelTypeId')) {
            return false;
        }

        // Return the id of the newly created item to the calling process
        return $item['modelTypeId'];
    }

    /**
     * Remove a location
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The location identity
     * @return     Thue if success and false otherwise
     */
    public function deleteLocation($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // get location information
        $location = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations', array('locationId' => $args['locationId']));
        if (!$location) {
            return LogUtil::registerError($this->__('No s\'ha trobat el Servei Territorial'));
        }
        if (!DBUtil::deleteObjectByID('agoraportal_location', $args['locationId'], 'locationId')) {
            return LogUtil::registerError($this->__('L\'intent d\'esborrament ha fallat'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('Agoraportal');
        $view->clear_cache(null, $args['locationId']);
        return true;
    }

    /**
     * Update a client type
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The type identity
     * @return     Thue if success and false otherwise
     */
    public function editType($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // get location information
        $location = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes', array('typeId' => $args['typeId']));
        if (!$location) {
            return LogUtil::registerError($this->__('No s\'ha trobat la tipologia'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_clientType_column'];
        $where = "$c[typeId] = $args[typeId]";
        $items = array('typeName' => $args['typeName']);
        if (!DBUtil::updateObject($items, 'agoraportal_clientType', $where)) {
            return LogUtil::registerError($this->__('No s\'ha pogut actualitzar'));
        }
        return true;
    }

    /**
     * Remove a relation between a request type and a service
     * @author     Aida Regi Cosculluela (aregi@xtec.cat)
     * @param      The request type and service identities
     * @return     Thue if success and false otherwise
     */
    public function deleteRequestTypeService($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();

        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_requestTypesServices_column'];

        $type = $args['requestTypeId'];
        $service = $args['serviceId'];
        $where = "$c[requestTypeId] = $type AND $c[serviceId] = $service";

        if (!DBUtil::deleteWhere('agoraportal_requestTypesServices', $where)) {
            return LogUtil::registerError($this->__('L\'intent d\'esborrament ha fallat'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('Agoraportal');
        $view->clear_cache(null, $args['requestTypeId']);
        return true;
    }

    /**
     * Remove a request type
     * @author     Aida Regi Cosculluela (aregi@xtec.cat)
     * @param      The request type identity
     * @return     Thue if success and false otherwise
     */
    public function deleteRequestType($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // get location information
        $requestType = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes', array('requestTypeId' => $requestTypeId));
        if (!$requestType) {
            return LogUtil::registerError($this->__('No s\'ha trobat el tipus de sol·licitud'));
        }
        if (!DBUtil::deleteObjectByID('agoraportal_requestTypes', $args['requestTypeId'], 'requestTypeId')) {
            return LogUtil::registerError($this->__('L\'intent d\'esborrament ha fallat'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('Agoraportal');
        $view->clear_cache(null, $args['requestTypeId']);
        return true;
    }

    /**
     * Remove a model type
     *
     * @author Toni Ginard
     * @param int modelTypeId
     * @return Bolean true if success, false otherwise
     */
    public function deleteModelType($args) {

        AgoraPortal_Util::requireAdmin();

        $modelTypeId = $args['modelTypeId'];

        // get location information
        $modelType = ModUtil::apiFunc('Agoraportal', 'user', 'getModelTypes', array('modelTypeId' => $modelTypeId));

        if (!$modelType) {
            return LogUtil::registerError($this->__('No s\'ha trobat la maqueta'));
        }

        if (!DBUtil::deleteObjectByID('agoraportal_modelTypes', $modelTypeId, 'modelTypeId')) {
            return LogUtil::registerError($this->__("No s'ha pogut esborrar la maqueta"));
        }

        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('Agoraportal');
        $view->clear_cache(null, $args['requestTypeId']);

        return true;
    }

    /**
     * Insert a new location
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The location parameters
     * @return     Thue new location identity if success and false otherwise
     */
    public function addNewType($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // Check if the client DNS exists or the client code exists
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_clientType_column'];
        //Create item
        $item = array('typeName' => $args['typeName']);
        if (!DBUtil::insertObject($item, 'agoraportal_clientType', 'typeId')) {
            return LogUtil::registerError($this->__('L\'intent de creació ha fallat'));
        }
        // Return the id of the newly created item to the calling process
        return $item['typeId'];
    }

    /**
     * Remove a client type
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The type identity
     * @return     Thue if success and false otherwise
     */
    public function deleteType($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        // get location information
        $location = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes', array('typeId' => $args['typeId']));
        if (!$location) {
            return LogUtil::registerError($this->__('No s\'ha trobat la tipologia de centre'));
        }
        if (!DBUtil::deleteObjectByID('agoraportal_clientType', $args['typeId'], 'typeId')) {
            return LogUtil::registerError($this->__('L\'intent d\'esborrament ha fallat'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('Agoraportal');
        $view->clear_cache(null, $args['typeId']);
        return true;
    }

    /**
     * Execute diferent actions to fix several configuration issues
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The client-service identity
     * @return     Thue if success and false otherwise
     */
    public function executeAction($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();

        $clientServiceId = FormUtil::getPassedValue('clientServiceId', isset($args['clientServiceId']) ? $args['clientServiceId'] : null, 'GETPOST');
        $action = FormUtil::getPassedValue('action', isset($args['action']) ? $args['action'] : null, 'GETPOST');

        // Needed argument
        if (!isset($clientServiceId) || !is_numeric($clientServiceId) || !isset($action) || !is_numeric($action)) {
            return LogUtil::registerError($this->__('No s\'ha pogut carregar el que volíeu. Reviseu les dades'));
        }
        //Get item
        $item = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId));
        $serviceId = $item[$clientServiceId]['serviceId'];
        $service = ModUtil::apiFunc($this->name, 'user', 'getService', array('serviceId' => $serviceId));
        $serviceName = $service['serviceName'];

        if ($item == false) {
            return LogUtil::registerError($this->__('No s\'ha trobat el servei'));
        }

        $activedId = $item[$clientServiceId]['activedId'];
        $dbHost = $item[$clientServiceId]['dbHost'];

        if ($action > 1) {
            $host = $item[$clientServiceId]['dbHost'];
        }

        global $agora;

        switch ($action) {
            case 1: //Restore XTECADMIN Moodle2
                $operation = ModUtil::apiFunc('Agoraportal', 'admin', 'addExecuteOperation',
                            array('operation' => 'script_restore_xtecadmin',
                                'clientId' => $item[$clientServiceId]['clientId'],
                                'serviceId' => $serviceId
                            ));
                if (!$operation['success']) {
                    return LogUtil::registerError($this->__('Ha fallat la restauració de l\'usuari xtecadmin. Error:' . $operation['result']));
                }
                LogUtil::registerStatus($this->__('S\'ha restaurat l\'usuari xtecadmin del Moodle del centre'));
                break;
            case 2: // Connect Zikula and Moodle
                break;

            case 3: // Create or delete Zikula super administrator
                $sql = "SELECT uid FROM users WHERE uname='xtecadmin'";
                $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                            'sql' => $sql,
                            'serviceName' => 'intranet',
                            'host' => $host,
                        ));

                if (!$result['success'])
                    return LogUtil::registerError($this->__('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $result['errorMsg']));

                if ($result['values'][0]["uid"] > 0) {
                    //delete all the user groups
                    $sql = "DELETE FROM group_membership
                    WHERE `uid`=" . $result['values'][0]["uid"];
                    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                                'sql' => $sql,
                                'serviceName' => 'intranet',
                                'host' => $host,
                            ));

                    if (!$result['success'])
                        return LogUtil::registerError($this->__('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $result['errorMsg']));

                    //the user exists and delete it
                    $sql = "DELETE FROM users WHERE uname = 'xtecadmin'";

                    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                                'sql' => $sql,
                                'serviceName' => 'intranet',
                                'host' => $host,
                            ));
                    if (!$result['success'])
                        return LogUtil::registerError($this->__('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $result['errorMsg']));
                    LogUtil::registerStatus($this->__('S\'ha esborrat l\'usuari xtecadmin del centre'));
                } else {
                    //the user doesn't exists and create it
                    $sql = "INSERT INTO users (uname, pass, email, activated)
                        VALUES ('xtecadmin','" . '1$$' . $agora['xtecadmin']['password']. "', '" . $agora['xtecadmin']['mail'] . "',1)";
                    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                                'sql' => $sql,
                                'serviceName' => 'intranet',
                                'host' => $host,
                            ));
                    if (!$result['success'])
                        return LogUtil::registerError($this->__('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $result['errorMsg']));

                    $sql = "SELECT uid FROM users WHERE uname='xtecadmin'";
                    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                                'sql' => $sql,
                                'serviceName' => 'intranet',
                                'host' => $host,
                            ));
                    if (!$result['success'])
                        return LogUtil::registerError($this->__('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $result['errorMsg']));

                    if ($result['values'][0]["uid"] > 0) {
                        //insert the user into admin group
                        $sql = "INSERT INTO group_membership (uid, gid) VALUES (" . $result['values'][0]["uid"] . ",2)";

                        $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                                    'sql' => $sql,
                                    'serviceName' => 'intranet',
                                    'host' => $host,
                                ));
                        if (!$result['success'])
                            return LogUtil::registerError($this->__('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $result['errorMsg']));
                    }
                    LogUtil::registerStatus($this->__('S\'ha creat correctament l\'usuari xtecadmin del centre.'));
                }
                break;

            case 4: // Create the first administrator permission
                //delete the sequence in the first position
                $sql = "DELETE FROM group_perms WHERE sequence < 1 OR pid = 1";
                $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                            'sql' => $sql,
                            'serviceName' => 'intranet',
                            'host' => $host,
                ));
                if (!$result['success']) {
                    return LogUtil::registerError($this->__('No s\'han pogut esborrar la seqüència amb valor 0.'));
                }

                //insert a new sequence
                //the user doesn't exists and create it
                $sql = "INSERT INTO group_perms (gid, sequence, component, instance, level, pid) VALUES (2,0,'::','::',800,1)";
                $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                            'sql' => $sql,
                            'serviceName' => 'intranet',
                            'host' => $host,
                ));
                if (!$result['success']) {
                    return LogUtil::registerError($this->__('No s\'han pogut crear la seqüència.'));
                }
                break;

            case 5: // Desactive all the portal blocks
                //update blocks table
                //the user doesn't exists and create it
                $sql = "UPDATE blocks SET active = 0";
                $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $activedId,
                            'sql' => $sql,
                            'serviceName' => 'intranet',
                            'host' => $host,
                        ));
                if (!$result['success']) {
                    return LogUtil::registerError($this->__('No s\'han pogut desactivar els blocs.'));
                }
                break;

            case 6: // Calculate consumed space in moodle2
            case 7: // Calculate consumed space in intranet
            case 8: // Calculate consumed space in nodes
                ModUtil::func('Agoraportal', 'user', 'calcUsedSpace', array('clientCode' => $item[$clientServiceId]['clientCode'],
                    'serviceId' => $item[$clientServiceId]['serviceId'],
                    'clientServiceId' => $clientServiceId));
                break;
        }

        return true;
    }

    /**
     * Get managers of a client. Relationship between clients' table and managers'
     * table is not done using clientID but clientCode.
     *
     * @author  Toni Ginard
     * @param   clientCode
     * @return  array containing one row per manager
     */
    public function getManagers($args) {
        // Security check
        AgoraPortal_Util::requireUser();

        // Check for mandatory parameter
        if (!isset($args['clientCode'])) {
            return array();
        }

        // Get managers from DB and return
        $where = 'clientCode = \'' . $args['clientCode'] . '\''; // Condition
        $join[] = array('join_table' => 'users',
            'join_field' => array('uname', 'email'),
            'object_field_name' => array('pn_uname', 'email'),
            'compare_field_table' => 'managerUName',
            'compare_field_join' => 'uname');

        $items = DBUtil::selectExpandedObjectArray('agoraportal_client_managers', $join, $where, 'managerUName', -1, -1, 'managerId');

        return $items;
    }

    /**
     * update a service for a given client
     * @author 		Albert Pérez Monfort (aperezm@xtec.cat)
     * @author      Aida Regi
     * @param 		Client-service identity
     * @return 		True if success and false otherwise
     */
    public function editRequest($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        $requestId = $args['requestId'];
        // Needed argument
        if (!isset($requestId) || !is_numeric($requestId)) {
            return LogUtil::registerError($this->__('No s\'ha pogut carregar el que volíeu. Reviseu les dades'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_request_column'];
        $where = "$c[requestId] = $requestId";

        if (!DBUtil::updateObject($args['items'], 'agoraportal_request', $where)) {
            return LogUtil::registerError($this->__('No s\'ha pogut actualitzar'));
        }
        return true;
    }

    /**
     * remove a request for a given client
     * @author 		Albert Pérez Monfort (aperezm@xtec.cat)
     * @author      Aida Regi
     * @param 		Client-service identity
     * @return 		True if success and false otherwise
     */
    public function deleteRequest($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();
        $clientRequestId = $args['requestId'];
        // Needed argument
        if (!isset($clientRequestId) || !is_numeric($clientRequestId)) {
            return LogUtil::registerError($this->__('No s\'ha pogut carregar el que volíeu. Reviseu les dades'));
        }
        //Get item

        if (!DBUtil::deleteObjectByID('agoraportal_request', $clientRequestId, 'requestId')) {
            return LogUtil::registerError($this->__('L\'intent d\'esborrament ha fallat'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('Agoraportal');
        $view->clear_cache(null, $clientRequestId);
        return true;
    }

    /**
     * remove a request for a given client
     * @author 		Albert Pérez Monfort (aperezm@xtec.cat)
     * @author      Aida Regi
     * @param 		Client-service identity
     * @return 		True if success and false otherwise
     */
    public function getInfodeleteRequest($args) {
        // Security check
        AgoraPortal_Util::requireAdmin();

        $clientRequestId = $args['requestId'];
        // Needed argument
        if (!isset($clientRequestId) || !is_numeric($clientRequestId)) {
            return LogUtil::registerError($this->__('No s\'ha pogut carregar el que volíeu. Reviseu les dades'));
        }

        //Get item
        $pntables = DBUtil::getTables();
        $c = $pntables['agoraportal_request_column'];
        $orderby = '';
        $where = '';

        $myJoin[] = array('join_table' => 'users',
            'join_field' => array('uname', 'email'),
            'object_field_name' => array('username', 'email'),
            'compare_field_table' => 'userId',
            'compare_field_join' => 'uid');
        $myJoin[] = array('join_table' => 'agoraportal_clients',
            'join_field' => array('clientCode', 'clientDNS', 'clientName', 'clientAddress', 'clientCity', 'clientPC', 'clientState'),
            'object_field_name' => array('clientCode', 'dns', 'clientName', 'clientAddress', 'clientCity', 'clientPC', 'clientState'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');
        $myJoin[] = array('join_table' => 'agoraportal_requestStates',
            'join_field' => array('name'),
            'object_field_name' => array('state'),
            'compare_field_table' => 'requestStateId',
            'compare_field_join' => 'requestStateId');
        $myJoin[] = array('join_table' => 'agoraportal_requestTypes',
            'join_field' => array('name'),
            'object_field_name' => array('type'),
            'compare_field_table' => 'requestTypeId',
            'compare_field_join' => 'requestTypeId');
        $myJoin[] = array('join_table' => 'agoraportal_services',
            'join_field' => array('serviceName'),
            'object_field_name' => array('serviceName'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');

        $init = (isset($args['init'])) ? $args['init'] - 1 : '-1';
        $rpp = (isset($args['rpp']) && $args['rpp'] > 0) ? $args['rpp'] : '15';

        if (isset($args['requestId'])) {
            $where = " WHERE tbl." . $c['requestId'] . " = " . $clientRequestId . "";
        }

        $items = DBUtil::selectExpandedObjectArray('agoraportal_request', $myJoin, $where, $orderby, $init, $rpp);
        return $items;
    }

    /**
     * Get all requests from database
     *
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Aida Regi
     * @param  Filter parameters
     *
     * @return	Array The list of available services. False in case of error.
     */
    public function getAllRequests($args) {
        AgoraPortal_Util::requireUser();

        $pntables = DBUtil::getTables();
        $c = $pntables['agoraportal_request_column'];
        $lcolumn = $pntables['agoraportal_clients_column'];

        $where = '';

        if ((isset($args['service']) && $args['service'] != 0) || (isset($args['state']) && $args['state'] != '-1')) {
            if ($args['service'] != 0) {
                $where .= ( $where != '') ? ' AND ' : '';
                $where .= "tbl.$c[serviceId] = $args[service]";
            }
            if ($args['state'] != '-1') {
                $where .= ( $where != '') ? ' AND ' : '';
                $where .= "tbl.$c[requestStateId] = $args[state]";
            }
        }

        if ((isset($args['search']) && $args['search'] != 0) && $args['searchText'] != '') {
            $where .= ( $where != '') ? ' AND ' : '';
            switch ($args['search']) {
                case '1':
                    $where .= "b.$lcolumn[clientCode]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '2':
                    $where .= "b.$lcolumn[clientName]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '3':
                    $where .= "b.$lcolumn[clientCity]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
            }
        }

        $orderby = 'requestId desc';

        $myJoin[] = array('join_table' => 'users',
            'join_field' => array('uname'),
            'object_field_name' => array('username'),
            'compare_field_table' => 'userId',
            'compare_field_join' => 'uid');
        $myJoin[] = array('join_table' => 'agoraportal_clients',
            'join_field' => array('clientCode', 'clientDNS', 'clientName', 'clientAddress', 'clientCity', 'clientPC', 'clientState'),
            'object_field_name' => array('clientCode', 'dns', 'clientName', 'clientAddress', 'clientCity', 'clientPC', 'clientState'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');
        $myJoin[] = array('join_table' => 'agoraportal_requestStates',
            'join_field' => array('name'),
            'object_field_name' => array('state'),
            'compare_field_table' => 'requestStateId',
            'compare_field_join' => 'requestStateId');
        $myJoin[] = array('join_table' => 'agoraportal_requestTypes',
            'join_field' => array('name'),
            'object_field_name' => array('type'),
            'compare_field_table' => 'requestTypeId',
            'compare_field_join' => 'requestTypeId');
        $myJoin[] = array('join_table' => 'agoraportal_services',
            'join_field' => array('serviceName'),
            'object_field_name' => array('serviceName'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');

        $init = (isset($args['init'])) ? $args['init'] - 1 : '-1';
        $rpp = (isset($args['rpp']) && $args['rpp'] > 0) ? $args['rpp'] : '15';



        if (!isset($args['onlyNumber'])) {
            $args['rpp'] = (isset($args['rpp']) && $args['rpp'] > 0) ? $args['rpp'] : '15';
            $init = (isset($args['init']) && $args['init'] != 0) ? $args['init'] - 1 : '-1';
            $items = DBUtil::selectExpandedObjectArray('agoraportal_request', $myJoin, $where, $orderby, $init, $rpp);
        } else {
            $items = DBUtil::selectExpandedObjectArray('agoraportal_request', $myJoin, $where);
            $items = count($items);
        }


        if ($items === false) {
            // return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        return $items;
    }

    /**
     * Execute SQL commands
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @param  sql
     * @param  serviceName
     * @param  database
     * @param  host
     *
     * @return	Array with success 0 or 1, errorMsg with the error text or '' and values in select commands
     */
    public function executeSQL($args) {
        $sql = $args['sql'];
        $serviceName = $args['serviceName'];
        $database = $args['database'];
        $host = (isset($args['host'])) ? $args['host'] : '';
        $serviceDB = (isset($args['serviceDB'])) ? $args['serviceDB'] : '';

        AgoraPortal_Util::requireAdmin();

        global $agora;

        $dbType = (isset($agora[$serviceName]['dbtype'])) ? $agora[$serviceName]['dbtype'] : 'mysql';

        $connect = ModUtil::apiFunc('Agoraportal', 'user', 'connectExtDB', array('database' => $database,
                    'serviceName' => $serviceName,
                    'host' => $host,
                    'serviceDB' => $serviceDB,
                ));

        if (!$connect) {
            return LogUtil::registerError($this->__('No s\'ha pogut connectar a la base de dades amb ID ' . $database));
        }

        $success = false;
        $errorMsg = '';
        $values = array();

        switch ($dbType) {
            case 'mysql':
                $results = $connect->query($sql);
                if (!$results) {
                    $errorMsg = $connect->error;
                } else {
                    $success = true;
                    if (strtolower(substr(trim($sql), 0, 6)) == 'select') {
                        // return rows
                        while ($row = $results->fetch_assoc()) {
                            $values[] = $row;
                        }
                    }
                }
                $connect->close();
                break;
            case 'oci':
            case 'oci8':
            case 'oci8po':
                if (substr_count(strtolower(trim($sql)), 'insert') > 1
                        || substr_count(strtolower(trim($sql)), 'update') > 1
                        || substr_count(strtolower(trim($sql)), 'delete') > 1) {
                    // for multiple inserts, updates and deletes in Oracle SQL
                    $sql = "BEGIN $sql END;";
                }
                $results = oci_parse($connect, $sql);
                if (!$results) {
                    $error = oci_error($connect);
                    $errorMsg = $error["message"];
                }
                $r = oci_execute($results);
                if (!$r) {
                    $error = oci_error($results);
                    $errorMsg = $error["message"];
                } else {
                    $success = true;
                    if (strtolower(substr(trim($sql), 0, 6)) == 'select') {
                        oci_fetch_all($results, $values, 0, -1, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
                    }
                }
                oci_free_statement($results);
                oci_close($connect);
                break;
        }

        return array('success' => $success,
            'errorMsg' => $errorMsg,
            'values' => $values,
        );
    }

    /**
     * Adds operation to the queue
     * @author Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return  object created
     */
    public function addOperation($args) {

        if(!isset($args['operation']) || empty($args['operation']) ||
            !isset($args['clientId']) || empty($args['clientId'])||
            !isset($args['serviceId']) || empty($args['serviceId'])){
                return false;
        }

        $operation = array();
        $operation['operation'] = $args['operation'];
        $operation['clientId'] = $args['clientId'];
        $operation['serviceId'] = $args['serviceId'];
        $operation['priority'] = isset($args['priority']) ? $args['priority'] : 0;
        $operation['timeCreated'] = time();
        $operation['state'] = 'P';
        if (isset($args['params']) && !empty($args['params']) && is_array($args['params'])) {
            $params = array();
            foreach ($args['params'] as $key => $value) {
                $params[$key] = htmlentities($value);
            }
           $operation['params'] = json_encode($params);
        } else {
            $operation['params'] = "";
        }
        $operation = DBUtil::insertObject($operation, 'agoraportal_queues');
        return $operation;
    }

    public function addExecuteOperation($args){
        AgoraPortal_Util::requireAdmin();
        if(!isset($args['operation']) || empty($args['operation']) ||
            !isset($args['clientId']) || empty($args['clientId'])||
            !isset($args['serviceId']) || empty($args['serviceId'])) {
                return LogUtil::registerError('Falten dades per poder crear la operació');
        }

        $priority = isset($args['priority']) ? $args['priority'] : 0;
        $params =  isset($args['params']) ? $args['params'] : '';
        $operation = ModUtil::apiFunc('Agoraportal', 'admin', 'addOperation',
                array('operation' => $args['operation'],
                    'clientId' => $args['clientId'],
                    'serviceId' => $args['serviceId'],
                    'priority' => $priority,
                    'params' => $params
                ));

        if(!$operation) {
            return false;
        }

        return ModUtil::apiFunc('Agoraportal', 'admin', 'executeOperationId', array('opId' => $operation['id']));
    }

    public static function getOperationParams($params) {
        $params = str_replace("\r", "\\r", $params);
        $params = str_replace("\n", "\\n", $params);
        return json_decode($params, true);
    }

    /**
     * Execute operations to a service
     *
     * @author Pau Ferrer Ocaña (pferre22@xtec.cat)
     *
     * @return  Success
     */
    public function executeOperationId($args) {
        $opId = $args['opId'];

        if (!defined('CLI_SCRIPT') && !AgoraPortal_Util::isAdmin()) {
            throw new Zikula_Exception_Forbidden();
        }

        $operation = DBUtil::selectObjectByID('agoraportal_queues', $opId);

        if ($operation) {
            $operation['timeStart'] = time();
            $operation['state'] = 'L';
            DBUtil::updateObject($operation, 'agoraportal_queues');

            $client = DBUtil::selectObjectByID('agoraportal_clients', $operation['clientId'], 'clientId');
            if ($client) {
                $service = DBUtil::selectObjectByID('agoraportal_services', $operation['serviceId'], 'serviceId');
                if ($service) {
                    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeOperation',
                                    array('clientDNS' => $client['clientDNS'],
                                        'operation' => $operation['operation'],
                                        'serviceName' => $service['serviceName'],
                                        'params' => self::getOperationParams($operation['params'])
                                    ));
                    $success = $result['success'];
                    $message = $result['result'];
                } else {
                    $success = false;
                    $message = 'Service '.$operation['serviceId'].' not found';
                }
            } else {
                $success = false;
                $message = 'Client '.$operation['clientId'].' not found';
            }

            $timeend = time();
            // Record Log
            $log = array();
            $log['content'] = $message;
            $log['timeModified'] = $timeend;
            if ($operation['logId'] > 0) {
                $log['id'] = $operation['logId'];
                DBUtil::updateObject($log, 'agoraportal_queues_log');
            } else {
                $log = DBUtil::insertObject($log, 'agoraportal_queues_log');
            }

            $operation['logId'] = $log['id'];
            $operation['state'] = $success ?  'OK' : 'KO';
            $operation['timeEnd'] = $timeend;
            DBUtil::updateObject($operation, 'agoraportal_queues');

            return array('success' => $success, 'result' => $message);
        }
        return false;
    }

    /**
     * Execute operations to a service
     *
     * @author Pau Ferrer Ocaña (pferre22@xtec.cat)
     *
     * @return  Array with success 0 or 1, errorMsg with the error text or '' and values in select commands
     */
    public function executeOperation($args) {
        $operation = $args['operation'];
        $serviceName = $args['serviceName'];
        $clientDNS = $args['clientDNS'];
        $params = $args['params'];

        if (!defined('CLI_SCRIPT') && !AgoraPortal_Util::isAdmin()) {
            throw new Zikula_Exception_Forbidden();
        }

        $command = "";
        $dirbase = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));

        switch ($serviceName) {
            case 'moodle2':
                $params['ccentre'] = $clientDNS;
                $command = $dirbase.'/moodle2/local/agora/scripts/cli.php -s="'.$operation.'"';
                break;
            case 'nodes':
                $params['ccentre'] = $clientDNS;
                $command = $dirbase.'/wordpress/wp-includes/xtec/scripts/cli.php -s="'.$operation.'"';
                break;
            default:
                return array('success' => false, 'result' => 'Operations are not allowed for this service');
                break;
        }

        set_time_limit(0);
        ini_set('mysql.connect_timeout', self::$operations_timeout);
        ini_set('default_socket_timeout', self::$operations_timeout);

        if ($params && is_array($params)) {
            foreach ($params as $key => $value) {
                $value = str_replace("\r", "<br/>", $value);
                $value = str_replace("\n", "<br/>", $value);
                $command .= ' --'.$key.'="'.html_entity_decode($value).'"';
            }
        }

        $command = 'php '.$command.' > /dev/stdout 2>&1';
        $last = exec($command, $result);

        $success = $last == 'success';
        $result = nl2br(implode("\n", $result));

        if (empty($result)) {
            LogUtil::registerError($command);
            $success = false;
            $result = 'Empty message returned...';
        }

        return array('success' => $success, 'result' => $result);
    }

    public function getOperations($args) {

        AgoraPortal_Util::requireAdmin();
        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_queues_column'];
        $a = $tables['agoraportal_clients_column'];

        $init = !empty($args['startnum']) ? $args['startnum'] : 0;
        $rpp = !empty($args['rpp']) ? $args['rpp'] : 15;
        $orderdir = !empty($args['sortby_dir']) ? $args['sortby_dir'] : '';
        $orderby = !empty($args['sortby']) ? $args['sortby'] : 'timeCreated DESC, priority DESC';
        switch($orderby){
            case 'clientName':
            case 'clientDNS':
                $orderby = "a.$orderby $orderdir";
                break;
            case 'serviceId':
                $orderby = "b.$orderby $orderdir";
                break;
            default:
                $orderby = "tbl.$orderby $orderdir";
                break;
        }


        $wheres = array();
        $joins = array();
        $joins[] = array('join_table' => 'agoraportal_clients',
            'join_field' => array('clientName', 'clientDNS'),
            'object_field_name' => array('clientName', 'clientDNS'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');

        $joins[] = array('join_table' => 'agoraportal_services',
            'join_field' => array('serviceName'),
            'object_field_name' => array('serviceName'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');

        if (!empty($args['operation'])) {
            $wheres[] = "$c[operation] = '$args[operation]'";
        }

        if ($args['priority'] != '-' && $args['priority'] != '') {
            $wheres[] = "$c[priority] = $args[priority]";
        }

        if (!empty($args['service'])) {
            $wheres[] = "tbl.$c[serviceId] = $args[service]";
        }

        if (!empty($args['client'])) {
            switch($args['client_type']){
                case 'clientCode':
                    $wheres[] = "a.$a[clientCode] LIKE '%$args[client]%'";
                    break;
                case 'clientName':
                    $wheres[] = "a.$a[clientName] LIKE '%$args[client]%'";
                    break;
                case 'clientCity':
                    $wheres[] = "a.$a[clientCity] LIKE '%$args[client]%'";
                    break;
                case 'clientDNS':
                    $wheres[] = "a.$a[clientDNS] LIKE '%$args[client]%'";
                    break;
                case 'clientId':
                    $wheres[] = "tbl.$c[clientId] = $args[client]";
                    break;
            }
        }

        if (!empty($args['state'])) {
            $states = explode(',', $args['state']);
            $states_where = array();
            foreach ($states as $state) {
                $states_where[] = "$c[state] = '$state'";
            }
            $wheres[] = '('.implode(' OR ', $states_where).')';
        } else {
            $wheres[] = "$c[state] != 'L'";
        }

        if (!empty($args['from'])) {
            $timestart = strtotime($args['from']);
            $wheres[] = "tbl.$c[timeCreated] >= $timestart";
        }

        if (!empty($args['to'])) {
            $timeend = strtotime($args['to']);
            $wheres[] = "tbl.$c[timeCreated] <= $timeend";
        }

        $where = implode(' AND ', $wheres);
        if (!empty($args['count']) && $args['count'] == 1) {
            $items = DBUtil::selectExpandedObjectArray('agoraportal_queues', $joins,  $where);
            return count($items);
        }
        $items = DBUtil::selectExpandedObjectArray('agoraportal_queues', $joins,  $where, $orderby, $init, $rpp);

        return $items;
    }

    public function timeoutOperations() {
        $executings = DBUtil::selectObjectArray('agoraportal_queues', "state = 'L'");
        if (!empty($executings)) {
            foreach ($executings as $executing) {
                if ($executing['timeStart'] < time() - self::$operations_timeout) { //Timeout after half hour
                    $executing['state'] = 'TO';
                    DBUtil::updateObject($executing, 'agoraportal_queues');
                }
            }
        }
    }

    public function executePendingOperations($args) {

        if (!defined('CLI_SCRIPT') && !AgoraPortal_Util::isAdmin()) {
            throw new Zikula_Exception_Forbidden();
        }
        $dom = ZLanguage::getModuleDomain('Agoraportal');

        $this->timeoutOperations();

        $executings = DBUtil::selectObjectArray('agoraportal_queues', "state = 'L'");
        if (!empty($executings)) {
            print __('There are '.count($executings) .' operations executing!', $dom);
            return 0;
        } else {
            $hour = (int)date('G');
            $where = "state = 'P'";
            if ($hour < 2 || $hour > 6) {
                $where .= ' AND priority >=0';
                $night_runner = false;
            } else {
                $night_runner = true;
            }
            $pending = DBUtil::selectObjectArray('agoraportal_queues', $where, 'priority DESC, timeCreated ASC, ClientId ASC');
            if (empty($pending)) {
                print __('GREAT! No pending operations...', $dom);
                return 1;
            }
            print __('There are '.count($pending) .' pending operations...', $dom);
            echo '<ul>';
            foreach($pending as $operation){
                // Control again the hour to stop at the right time
                if ($night_runner && $operation['priority'] < 0 ) {
                    $hour = (int)date('G');
                    if ($hour < 2 || $hour > 6) {
                        // If it is not night, jumpt it
                        print '<li>Operation id: '.$operation['id'].' Operation: '.$operation['operation'].' Priority: '.$operation['priority']. ' not executing now...';
                        continue;
                    }
                }
                print '<li>Operation id: '.$operation['id'].' Operation: '.$operation['operation'].' Priority: '.$operation['priority'];
                ModUtil::apiFunc('Agoraportal', 'admin', 'executeOperationId', array('opId' => $operation['id']));
            }
            echo '</ul>';
        }

        return 1;
    }

    /**
     * Create random password
     *
     * @author Toni Ginard
     *
     * @return string The password
     */
    public function createRandomPass() {

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
     * Checks if a value is serialized
     *
     * @author Toni Ginard
     *
     * @return boolean true or false
     */
    function is_serialized($data) {
        $data_unserialized = @unserialize($data);
        if ($data === 'b:0;' || $data_unserialized !== false) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Replace string recursively in multidimensional array
     *
     * @param string $search
     * @param string $replace
     * @param string $array
     *
     * @author Toni Ginard
     *
     * @return array
     */
    protected function replaceTree($search = '', $replace = '', $array = false) {

        if (!is_array($array)) {
            // Regular replace
            return str_replace($search, $replace, $array);
        }

        $newArray = array();
        foreach ($array as $k => $v) {
            // Recurse call
            $newArray[$k] = $this->replaceTree($search, $replace, $v);
        }

        return $newArray;
    }

}
