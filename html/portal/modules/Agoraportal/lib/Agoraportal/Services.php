<?php

/**
 * Class Services
 * This class manages bunches of services
 */
class Services {
    /**
     * Retrieves all activeId for the selected serviceId's
     * @param $serviceId
     * @return array
     */
    public static function get_activeId_by_serviceid($serviceId) {
        if (is_array($serviceId)) {
            $serviceselect = "serviceId IN (" . implode(',', $serviceId) . ")";
        } else {
            $serviceselect = "serviceId = $serviceId";
        }

        $where = "$serviceselect AND activedId != 0 ";
        return DBUtil::selectFieldArray(Service::TABLE, 'activedId', $where, 'activedId', true);
    }

    /**
     * Get all ENABLED Services related to the client requested
     * @param $clientId
     * @return array
     */
    public static function get_enabled_client_services($clientId): array {
        $where = "clientId = $clientId AND state = 1";
        $rows = DBUtil::selectObjectArray(Service::TABLE, $where, 'serviceId');
        $services = array();
        foreach ($rows as $key => $row) {
            $service = Service::get_subclass($row);
            $services[$service->clientServiceId] = $service;
        }
        return $services;
    }

    /**
     * Get ALL Services related to the client requested
     * @param $clientId
     * @return array
     */
    public static function get_all_client_services($clientId) {
        $where = "clientId = $clientId";
        $rows = DBUtil::selectObjectArray(Service::TABLE, $where);
        $services = array();
        foreach ($rows as $key => $row) {
            $service = Service::get_subclass($row);
            $services[$service->clientServiceId] = $service;
        }
        return $services;
    }

    /**
     * Get all ENABLED and PENDING Services related to the client requested
     * @param $clientId
     * @return array
     */
    public static function get_requested_client_services($clientId) {
        $where = "clientId = $clientId AND (state = 1 OR state = 0)";
        $rows = DBUtil::selectObjectArray(Service::TABLE, $where, 'serviceId');
        $services = array();
        foreach ($rows as $key => $row) {
            $service = new Service($row);
            $services[$service->serviceId] = $service;
        }
        return $services;
    }

    /**
     * Returns the ServicePortal Fake Class
     * @return bool|Service_portal
     */
    public static function get_portal_service() {
        $classname = 'Service_portal';
        if (file_exists('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php')) {
            require_once('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php');
        } else {
            return false;
        }
        return new Service_portal();
    }

    /**
     * Returns all active services related to a ServiceType
     *
     * @param $serviceId
     * @param string $index, which field must be the key of the array
     * @return array|bool
     */
    public static function get_enabled_by_serviceid($serviceId, $index = 'clientServiceId') {
        $servicetype = ServiceType::get_by_id($serviceId);
        if (!$servicetype) {
            return false;
        }

        $classname = 'Service_' . $servicetype->serviceName;
        if (file_exists('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php')) {
            require_once('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php');
        } else {
            $classname = 'Service';
        }

        $where = "serviceId = $serviceId AND state = 1";
        $rows = DBUtil::selectObjectArray(Service::TABLE, $where, 'activedId');
        $services = array();
        foreach ($rows as $key => $row) {
            $service = new $classname($row, $servicetype);
            $services[$service->$index] = $service;
        }
        return $services;
    }

    /**
     * Returns all ENABLED services related to a ServiceType with the client and the ServiceType information
     * @param $serviceId
     * @return array|bool
     */
    public static function get_enabled_by_serviceid_full($serviceId) {
        $servicetype = ServiceType::get_by_id($serviceId);
        if (!$servicetype) {
            return false;
        }

        $classname = 'Service_' . $servicetype->serviceName;
        if (file_exists('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php')) {
            require_once('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php');
        } else {
            $classname = 'Service';
        }

        $joins = array(self::get_client_join());

        $where = "serviceId = $serviceId AND state = 1";
        $rows = DBUtil::selectExpandedObjectArray(Service::TABLE, $joins, $where, 'activedId', -1, -1, 'clientId');
        $services = array();
        foreach ($rows as $key => $row) {
            $client = new Client($row);
            $service = new $classname($row, $servicetype, $client);
            $services[$service->clientId] = $service;
        }
        return $services;
    }

    /**
     * @return  the join info with Clients table
     */
    private static function get_client_join() {
        return array('join_table' => Client::TABLE,
            'join_field' => array('clientId', 'clientCode', 'clientName', 'clientDNS', 'clientPC', 'clientAddress', 'clientCity', 'clientState', 'clientDescription', 'locationId', 'typeId', 'noVisible', 'extraFunc', 'educat'),
            'object_field_name' => array('clientId', 'clientCode', 'clientName', 'clientDNS', 'clientPC', 'clientAddress', 'clientCity', 'clientState', 'clientDescription', 'locationId', 'typeId', 'noVisible', 'extraFunc', 'educat'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');
    }

    /**
     * @return  the join info with ServiceType table
     */
    private static function get_servicetype_join() {
        return array('join_table' => ServiceType::TABLE,
            'join_field' => array('serviceId', 'serviceName', 'URL', 'description', 'hasDB', 'defaultDiskSpace', 'allowedClients'),
            'object_field_name' => array('serviceId', 'serviceName', 'URL', 'description', 'hasDB', 'defaultDiskSpace', 'allowedClients'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');
    }

    /**
     * Construct the where sentence for the given search
     * @param array $search
     * @return string
     */
    private static function get_search_full($search = array()) {

        $wheres = array();

        if (!AgoraPortal_Util::isAdmin()) {
            $wheres[] = "noVisible = 0";
            $wheres[] = "clientState = 1";
        }

        foreach ($search as $key => $value) {
            switch ($key) {
                case 'state':
                    if ($value != -1) {
                        $wheres[] = "$key = $value";
                    }
                    break;
                case 'serviceId' :
                    $key = 'tbl.' . $key;
                case 'locationId':
                case 'typeId':
                    if ($value != 0) {
                        $wheres[] = "$key = $value";
                    }
                    break;
                case 'educat':
                    $wheres[] = "$key = $value";
                    break;
                default:
                    $wheres[] = "$key" . " LIKE '%" . $value . "%'";
                    break;
            }
        }
        return implode(' AND ', $wheres);
    }


    /**
     * Performs a Service search on the DB, it will return Client and ServiceType info as well
     * @param array $search
     * @param $orderby
     * @param int $init
     * @param int $rpp
     * @return array
     */
    public static function search($search = array(), $orderby, $init = -1, $rpp = 15) {

        $where = self::get_search_full($search);
        $joins = array(self::get_client_join(), self::get_servicetype_join());

        switch ($orderby) {
            case 1:
                $orderby = "a.clientName, a.clientDNS, tbl.serviceId";
                break;
            case 2: //Used to order by edit time
                $orderby = "tbl.state asc, tbl.timeEdited desc, tbl.clientServiceId desc";
                break;
            case 3: //Used to order by activedId
                $orderby = "tbl.activedId";
                break;
            case 4: //Used to order by clientCode
                $orderby = "a.clientCode";
                break;
            case 5: //Used to order by clientCode
                $orderby = "a.clientDNS";
                break;
        }

        $rows = DBUtil::selectExpandedObjectArray(Service::TABLE, $joins, $where, $orderby, $init, $rpp, 'clientServiceId');

        $services = array();
        foreach ($rows as $key => $row) {
            $client = new Client($row);
            $servicetype = new ServiceType($row);

            $classname = 'Service_' . $servicetype->serviceName;
            if (file_exists('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php')) {
                require_once('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php');
            } else {
                $classname = 'Service';
            }

            $service = new $classname($row, $servicetype, $client);
            $services[$service->clientServiceId] = $service;
        }
        return $services;
    }

    /**
     * Returns the count of the search
     * @param $search
     * @return int
     */
    public static function count_by($search) {
        $where = self::get_search_full($search);
        $joins = array(self::get_client_join(), self::get_servicetype_join());

        $rows = DBUtil::selectExpandedObjectArray(Service::TABLE, $joins, $where, "", -1, -1, "clientServiceId", null, null, null, true);
        return count($rows);
    }
}

/**
 * Class Service
 * Describe a Service
 */
class Service extends AgoraBase {

    const TABLE = 'agoraportal_client_services';

    // Available Service States
    const STATUS_ENABLED = 1;
    const STATUS_TOREVISE = 0;
    const STATUS_DENIED = -2;
    const STATUS_WITHDRAWN = -3;
    const STATUS_DISABLED = -4;
    const STATUS_MIGRATING = -5;
    const STATUS_MIGRATED = -6;
    const STATUS_SATURATED = -7;

    protected $clientServiceId; // Id
    protected $serviceId; // ServiceTypeId
    protected $clientId;
    protected $dbHost;
    protected $serviceDB;
    protected $description;
    protected $state;
    protected $activedId; // ID of the database or schema to connect
    protected $contactName; // Username of the contact that requested the service
    protected $contactProfile; // Profile of the contact that requested the service
    protected $observations;
    protected $annotations;
    protected $diskSpace;
    protected $timeCreated;
    protected $timeEdited;
    protected $timeRequested;
    protected $diskConsume;

    // Related objects
    private $servicetype;
    private $client;
    // Connection to the DB
    private $connect;

    /**
     * Service constructor.
     * @param $array that will load the class
     * @param null $servicetype if known, the servicetype related to the Service
     * @param null $client if known, the Client related to the Service
     */
    public function __construct($array, $servicetype = null, $client = null) {
        $this->set_array($array);
        $this->servicetype = $servicetype;
        $this->client = $client;
    }

    /**
     * Disconnects the DB when destructing the object
     */
    public function __destruct() {
        // $this->disconnectDB($this->connect);
    }

    /**
     * Retrieves the subclass with the corresponding serviceType
     * @param $row that will load the class
     * @return false|Service subclass
     */
    public static function get_subclass($row) {
        if (!$row) {
            return false;
        }
        $service = ServiceType::get_by_id($row['serviceId']);
        $classname = 'Service_' . $service->serviceName;
        if (file_exists('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php')) {
            require_once('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php');
            return new $classname($row, $service);
        }
        return new Service($row);
    }

    /**
     * Gets a Service by the clientServiceId
     * @param $id
     * @return bool|Service
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'clientServiceId');
        return self::get_subclass($row);
    }

    /**
     * Retrieves the Service seeking by ClientId and ServiceTypeId
     * @param $client clientId to look for
     * @param $service servicetypeid to look for
     * @param null $state Whether the service is active, pending, etc. Must be a number
     * @return false|Service
     */
    public static function get_by_client_and_service($client, $service, $state = null) {
        $where = "clientId = $client AND serviceId = $service";

        if (!is_null($state)) {
            $where .= " AND state = $state";
        }

        $row = DBUtil::selectObject(self::TABLE, $where);

        return self::get_subclass($row);
    }

    /**
     * Retrieves the Service seeking by servicename and activeid
     * @param $servicename
     * @param $activeid
     * @return false|Service
     */
    public static function get_by_servicename_and_activeid($servicename, $activeid) {
        $service = ServiceType::get_by_name($servicename);
        if (!$service) {
            return false;
        }

        $where = "serviceId = $service->serviceId AND activedId = $activeid";
        $row = DBUtil::selectObject(self::TABLE, $where);
        return self::get_subclass($row);
    }

    /**
     * Retrieves the Service seeking by ClientId and ServiceName
     *
     * @param $client
     * @param $servicename
     * @param null $state Whether the service is active, pending, etc. Must be a number
     * @return false|Service
     */
    public static function get_by_client_and_servicename($client, $servicename, $state = null) {
        $service = ServiceType::get_by_name($servicename);
        if (!$service) {
            return false;
        }
        return self::get_by_client_and_service($client, $service->serviceId, $state);
    }

    /**
     * Returns the related Client
     * @return false|Client
     */
    public function get_client() {
        if ($this->client == null) {
            $this->client = Client::get_by_id($this->clientId);
        }
        return $this->client;
    }

    /**
     * Returns the client DNS
     * @return false|string
     */
    public function get_client_dns() {
        $client = $this->get_client();
        if (!$client) {
            return false;
        }
        return $client->clientDNS;
    }

    /**
     * Returns the related ServiceType
     * @return false|ServiceType
     */
    public function get_servicetype() {
        if ($this->servicetype == null) {
            $this->servicetype = ServiceType::get_by_id($this->serviceId);
        }
        return $this->servicetype;
    }

    /**
     * Returns the ServiceType name
     * @return false|string
     */
    public function get_servicetype_name() {
        $service = $this->get_servicetype();
        if (!$service) {
            return false;
        }
        return $service->serviceName;
    }

    /**
     * Returns the user email related to the contactName that requested the service
     * @return false|string
     */
    public function get_useremail() {
        return AgoraPortal_Util::get_user_mail($this->contactName);
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save($updateTime = true) {
        $where = "clientServiceId = $this->clientServiceId";

        if ($updateTime == true) {
            $this->timeEdited = time();
        }

        $item = $this->get_array();

        return DBUtil::updateObject($item, self::TABLE, $where, $this->clientServiceId);
    }

    /**
     * Delete a Service from the system
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $item = self::get_by_id($id);
        if (!$item) {
            return true;
        }

        if (!DBUtil::deleteObjectByID(self::TABLE, $id, 'clientServiceId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de ' . self::TABLE);
        }
        return true;
    }

    /**
     * Returns if the quota is in warning
     * @return bool
     */
    public function is_quota_warning() {
        // Get Thresholds
        $clientsMailThreshold = ModUtil::getVar('Agoraportal', 'clientsMailThreshold');
        $maxAbsFreeQuota = ModUtil::getVar('Agoraportal', 'maxAbsFreeQuota');

        $diskConsume = $this->get_disk_percentage();
        $absDistance = $this->diskSpace - round($this->diskConsume / 1024);

        return $diskConsume > $clientsMailThreshold && $absDistance < $maxAbsFreeQuota;
    }

    /**
     * Returns if the quota has exceeded
     * @return bool
     */
    public function is_quota_exceeded() {
        // Get Thresholds
        $diskRequestThreshold = ModUtil::getVar('Agoraportal', 'diskRequestThreshold');
        $maxFreeQuotaForRequest = ModUtil::getVar('Agoraportal', 'maxFreeQuotaForRequest');

        // Check if quota usage exceeds disk request threshold
        $maxDiskSpaceMB = $this->diskSpace;
        $diskConsumeMB = $this->diskConsume / 1024;
        $diskConsume = $this->get_disk_percentage();

        return ($diskConsume > $diskRequestThreshold) && ($diskConsumeMB + $maxFreeQuotaForRequest > $maxDiskSpaceMB);
    }

    /**
     * Returns the diskpercentage ocupied
     * @return float
     */
    public function get_disk_percentage() {
        // diskSpace is in MB and diskConsume in KB
        $this->diskSpace = (is_numeric($this->diskSpace)) ? (int)$this->diskSpace : 0;

        return ($this->diskSpace > 0) ? round(($this->diskConsume * 100) / ($this->diskSpace * 1024), 2) : 0;
    }

    /**
     * Returns the state of the disk quota
     * @return string
     */
    public function get_disk_alert_class() {
        if ((int)$this->diskSpace > 0) {

            if (!$this->is_quota_exceeded()) {
                return 'success';
            }

            $percent = $this->get_disk_percentage();
            if ($percent < 97) {
                return 'warning';
            }

            return 'danger';
        }
        return '';
    }

    /**
     * Prints a resume of du -skh command over the datadir of the service
     * @return bool
     */
    public function printDataDir($dataDir) {
        global $agora;

        if (filetype($dataDir) == 'dir') {
            echo '<h3>' . $agora['server']['userprefix'] . $this->activedId . ': ' . exec("du -skh $dataDir") . '</h3>';
            if ($dh2 = opendir($dataDir)) {
                while ($subDir = readdir($dh2)) {
                    if ($subDir != '.' && $subDir != '..') {
                        echo "<strong>$subDir</strong>: " . exec("du -skh $dataDir/$subDir") . "<br />";
                    }
                }
                closedir($dh2);
            }
            return true;
        }
        return false;
    }

    /**
     * Returns the url of the service
     * @return string
     */
    public function get_url() {
        $service = $this->get_servicetype();
        $client = $this->get_client();

        return ModUtil::getVar('Agoraportal', 'siteBaseURL') . $client->clientDNS . '/' . $service->URL;
    }

    /**
     * Returns HTML with the logo linked to the url of the service
     * @return string
     */
    public function get_logo_with_link() {
        $servicetype = $this->get_servicetype();
        $link = false;
        if ($servicetype->hasDB && $this->state == self::STATUS_ENABLED) {
            $link = $this->get_url();
        }

        return $servicetype->get_logo($link);
    }

    /**
     * Returns HTML with a link to the service with the clientName
     * @return string
     */
    public function get_link() {
        $servicetype = $this->get_servicetype();
        $client = $this->get_client();
        if (!$servicetype->hasDB) {
            return $client->clientName;
        }
        $link = $this->get_url();
        return '<a href="' . $link . '" target="_blank">' . $client->clientName . '</a>';
    }

    /**
     * Executes command du -sk to get the used space and saves it
     * @return bool|mixed
     */
    public static function calcUsedSpace($service) {
        $dir = $service->getDataDirectory();
        if (!is_dir($dir)) {
            LogUtil::registerError('No s\'ha trobat el directori ' . $dir);
            return false;
        }

        $sum = exec("du -sk " . $dir);
        preg_match("/^[0-9]*/", $sum, $sumString);
        $service->diskConsume = reset($sumString);
        $service->save();

        return $service->diskConsume;
    }

    /**
     * Add log to the client
     * @param $code
     * @param $action
     * @return bool
     */
    public function add_log($code, $action) {
        $client = $this->get_client();
        return $client->add_log($code, $action);
    }

    /**
     * Creates a new service with the needed data
     *
     * @param        $serviceId      ServiceType requested
     * @param        $clientId       Client Requested
     * @param        $contactProfile Contact profile (from form)
     * @param string $template       In case of nodes, the name of the template
     *
     * @return bool
     * @throws Exception
     */
    public static function request_service($serviceId, $clientId, $contactProfile, $template = '') {
        // Check for nodes
        $serviceName = ServiceType::get_name($serviceId);
        if ($serviceName == 'nodes') {
            $observations = ServiceTemplates::get_template_description($template);
        } else {
            $observations = '';
        }

        // Insert service in database
        $item = [
            'serviceId' => $serviceId,
            'contactName' => UserUtil::getVar('uname'),
            'contactProfile' => $contactProfile,
            'clientId' => $clientId,
            'state' => self::STATUS_TOREVISE,
            'dbHost' => '',
            'activedId' => 0,
            'serviceDB' => '',
            'annotations' => '',
            'description' => '',
            'timeCreated' => '',
            'timeEdited' => '',
            'diskConsume' => 0,
            'timeRequested' => time(),
            'observations' => $observations
        ];

        if (!DBUtil::insertObject($item, self::TABLE, 'clientServiceId')) {
            return false;
        }
        return true;
    }

    /**
     * Changes the state of the service and performs the needed actions
     * @param $newState
     * @return bool|false|string
     */
    public function changeState($newState) {
        if ($this->state == $newState) {
            return true;
        }
        $serviceName = $this->get_servicetype_name();

        $return = true;
        switch ($newState) {
            case self::STATUS_TOREVISE:
                $this->state = $newState;
                break;
            case self::STATUS_ENABLED:
                if ($this->activedId == 0) {
                    $return = $this->enable();
                    if ($return) {
                        $this->add_log(ClientLog::CODE_MODIFY, 'S\'ha aprovat la sol·licitud d\'alta del servei ' . $serviceName);
                    }
                } else {
                    // If the service has an activedId, only change the state
                    $this->state = $newState;
                }
                break;
            case Service::STATUS_DENIED:
                $this->state = $newState;
                $this->add_log(ClientLog::CODE_MODIFY, 'S\'ha denegat el servei ' . $serviceName);
                break;
            case Service::STATUS_WITHDRAWN:
                $this->activedId = 0;
                $this->state = $newState;
                $this->add_log(ClientLog::CODE_MODIFY, 'S\'ha donat de baixa el servei ' . $serviceName);
                break;
            case Service::STATUS_DISABLED:
                $this->state = $newState;
                $this->add_log(ClientLog::CODE_MODIFY, 'S\'ha desactivat el servei ' . $serviceName);
                break;
            case Service::STATUS_MIGRATING:
                $this->state = $newState;
                $this->add_log(ClientLog::CODE_MODIFY, 'S\'ha marcat el servei ' . $serviceName . ' com a en migració');
                break;
            case Service::STATUS_MIGRATED:
                $this->state = $newState;
                $this->add_log(ClientLog::CODE_MODIFY, 'S\'ha marcat el servei ' . $serviceName . ' com a migrat');
                break;
            case Service::STATUS_SATURATED:
                $this->state = $newState;
                $this->add_log(ClientLog::CODE_MODIFY, 'S\'ha marcat el servei ' . $serviceName . ' com a en saturació');
                break;
        }
        return $return;
    }

    /**
     * Enables a service
     * @return bool|string with the password
     */
    private function enable() {
        $previous = $this->get_array();

        // Get the Id for the new service
        $dbid = $this->getDBId();

        if (!$dbid) {
            $this->activedId = $previous['activedId'];
            $this->save();
            return false;
        } else {
            // Get info of the service from its ID
            $service = $this->get_servicetype(); // Service description
            $createDB = ModUtil::getVar('Agoraportal', 'createDB');
            $connects = $service->testConnection($this->dbHost, $this->serviceDB, $dbid, $createDB);

            if (!$connects) {
                LogUtil::registerError('No s\'ha pogut connectar a la base de dades. '
                    . 'Paràmetres passats a testConnection: database: '
                    . $dbid . ', dbHost: ' . $this->dbHost . ', serviceDB: ' . $this->serviceDB);
                return false;
            }
        }

        $this->activedId = $dbid;
        $this->state = self::STATUS_ENABLED;
        $this->timeCreated = time();

        if (!$this->save()) {
            return LogUtil::registerError('Error en l\'edició del registre');
        }

        $password = AgoraPortal_Util::createRandomPass();
        $result = $this->enable_service($password);

        if (!$result) {
            // Fallback (put it to the previous state)
            $this->state = $previous['state'];
            $this->timeCreated = $previous['timeCreated'];
            $this->activedId = $previous['activedId'];
            $this->save();
            return false;
        }

        $this->add_log(ClientLog::CODE_ADMIN, 'Contrasenya d\'administració per ' . $this->get_servicetype_name() . ': ' . $password);

        return $password;
    }

    /**
     * Replaces the DNS of the service, it needs to be overwritten
     * @param $oldDNS
     * @param $newDNS
     * @return bool
     */
    public function replaceDNS($oldDNS, $newDNS) {
        return true;
    }

    /**
     * Returns the DB identifier, needs to be overwritten
     * @return bool
     */
    protected function getDBId() {
        return true;
    }

    /**
     * It performs the service enabling into the database and filesystem of the service
     * It needs to be overwritten
     * @param $password
     * @return bool
     */
    protected function enable_service($password) {
        return true;
    }

    /**
     * Retrieves the connection to the database
     * @return bool
     * @throws Exception
     */
    public function connectDB() {
        if (!$this->servicetype->hasDB) {
            return false;
        }

        if ($this->connect) {
            return $this->connect;
        }

        $this->connect = $this->getDBConnection($this->dbHost, $this->serviceDB, $this->activedId);
        if (!$this->connect) {
            $servicename = $this->servicetype->serviceName;
            throw new Exception("No s'ha pogut connectar al servei <strong>$servicename</strong>. Paràmetres de depuració: dbHost: $this->dbHost, serviceDB: $this->serviceDB, dbid: $this->activedId");
        }

        return $this->connect;
    }

    /**
     * Executes a SQL into the service database
     * @param $sql
     * @param bool|false $keepalive
     * @return array|bool
     * @throws Exception
     */
    public function executeSQL($sql, $keepalive = false) {
        $connect = $this->connectDB();
        $values = $this->sql($sql, $connect);

        if (!$keepalive) {
            $this->disconnectDB($connect);
        }

        return $values;
    }

    /**
     * Executes a sql into the connection given (static method)
     * @param $sql
     * @param bool|false $connect
     * @return array|bool
     * @throws Exception
     */
    public static function sql($sql, $connect = false) {
        if (!$connect) {
            return false;
        }

        $results = $connect->query($sql);
        if (!$results) {
            throw new Exception($connect->error);
        }

        $values = array();
        if (strtolower(substr(trim($sql), 0, 6)) == 'select') {
            // Rows to return
            while ($row = $results->fetch_assoc()) {
                $values[] = $row;
            }
        }

        return $values;
    }

    /**
     * Retrieves the dbConnection, needs to be overwritten
     * @param $host
     * @param $dbid
     * @param $host
     * @param $serviceDB
     * @param bool|false $createDB if the database does not exists, created it
     * @return bool
     */
    public static function getDBConnection($host, $serviceDB, $dbid, $createDB = false) {
        return false;
    }

    // Operations
    /**
     * Returns the scripts available to execute through operations
     * @return bool|string
     */
    public function get_operations_command() {
        $servicetype = $this->get_servicetype();
        return $servicetype->get_operations_command();
    }

    /**
     * Adds a new operation to be executed on the service
     * @param $name
     * @param string $params
     * @param int $priority
     * @return Agora_Queues_Operation|false
     */
    public function addOperation($name, $params = '', $priority = 0) {
        return Agora_Queues_Operation::add($name, $this->clientId, $this->serviceId, $params, $priority);
    }

    /**
     * Adds a new operation to be executed on the service and executes it immediately
     * @param $name
     * @param string $params
     * @param int $priority
     * @return Agora_Queues_Operation|bool|false
     */
    public function addExecuteOperation($name, $params = '', $priority = 0) {
        return Agora_Queues_Operation::addExecute($name, $this->clientId, $this->serviceId, $params, $priority);
    }

    /**
     * Execute an action into the service (it needs a 3rd function)
     * @param $action
     * @return false
     */
    public function execute_action($action) {
        if (empty($action)) {
            return LogUtil::registerError('Acció buida');
        }
        $method = 'action_' . $action;
        if (!method_exists($this, $method)) {
            return LogUtil::registerError('Acció no vàlida: ' . $action);
        }
        return $this->$method();
    }

    /**
     * Action available for all services with quota, calculates the disk space
     * @return bool|mixed
     */
    protected function action_calc_disk_space() {
        if ($this->diskSpace > 0) {
            return $this->calcUsedSpace();
        }
        return false;
    }

    /**
     * Retrieves the list of actions that can be executed
     * @return array
     */
    public function get_actions() {
        $actions = array();
        if ($this->diskSpace > 0) {
            $actions['calc_disk_space'] = "Recalcula l'espai consumit";
        }
        return $actions;
    }

    /**
     * Calculates the following free database
     * @return bool|int
     */
    public function calcFreeDatabase() {

        $databaseIds = Services::get_activeId_by_serviceid($this->serviceId);

        // Cast types to integer to avoid errors in later comparison.
        $firstID = (int) ModUtil::getVar('Agoraportal', 'firstID', 1);

        $i = $firstID;
        $free = false;

        // First, look for a free database (a gap in the list)
        foreach ($databaseIds as $activeId) {
            $activeId = (int) $activeId;

            // Discard activeId's that are lower than firstID.
            if ($activeId >= $firstID) {
                if ($activeId !== $i) {
                    $free = $i;
                    break;
                }
                $i++;
            }
        }

        // No luck, so let's try the following ID
        if (!$free) {
            $free = $i;
        }

        return $free;
    }
}

