<?php

/**
 * Class Clients
 * This class manages bunches of clients
 */
class Clients {

    /**
     * Gets a list of clients of the selected search
     * @param string $by key to search for
     * @param string $search text to be search
     * @param int $init first row to be shown
     * @param int $rpp rows per page to show
     * @return array of clients
     */
    public static function search_by($by = "", $search = "", $init = -1, $rpp = 15) {
        $where = self::get_search_where($by, $search);

        $rows = DBUtil::selectObjectArray(Client::TABLE, $where, 'clientName', $init, $rpp);
        $clients = array();
        foreach ($rows as $key => $row) {
            $client = new Client($row);
            $clients[$client->clientId] = $client;
        }
        return $clients;
    }

    /**
     * Count the number of total rows of the search
     * @param string $by key to search for
     * @param string $search text to be search
     * @return int with the count
     */
    public static function count_by($by, $search) {
        $where = self::get_search_where($by, $search);
        return DBUtil::selectObjectCount(Client::TABLE, $where);
    }

    /**
     * Gets a list of client of the selected search.
     * Search can be done by related services that HAVE TO BE ENABLED
     * @param string $by key to search for
     * @param string $search text to be search
     * @param bool|false $locationId
     * @param bool|false $typeId
     * @param int $init first row to be shown
     * @param int $rpp rows per page to show
     * @return array of services
     */
    public static function search_with_services_by($by = "", $search = "", $locationId = false, $typeId = false, $init = -1, $rpp = 15) {
        $where = self::get_search_where($by, $search, $locationId, $typeId);
        $where .= (empty($where)? "" : ' AND ') . 'a.state = '.Service::STATUS_ENABLED;

        $joins = array();
        $joins[] = array('join_table' => Service::TABLE,
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');

        $rows = DBUtil::selectExpandedObjectArray(Client::TABLE, $joins, $where, 'clientName', $init, $rpp, "", null, null, null, true);
        $clients = array();
        foreach ($rows as $key => $row) {
            $client = new Client($row);
            $clients[$client->clientId] = $client;
        }
        return $clients;
    }

    /**
     * Count the number of total rows of the search
     * Search can be done by related services that HAVE TO BE ENABLED
     * @param string $by key to search for
     * @param string $search text to be search
     * @param bool|false $locationId
     * @param bool|false $typeId
     * @return int with the count
     */
    public static function count_with_services_by($by = "", $search = "", $locationId = false, $typeId = false) {
        $where = self::get_search_where($by, $search, $locationId, $typeId);
        $where .= (empty($where)? "" : ' AND ') . 'a.state = '.Service::STATUS_ENABLED;

        $joins = array();
        $joins[] = array('join_table' => Service::TABLE,
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');

        $rows = DBUtil::selectExpandedObjectArray(Client::TABLE, $joins, $where, 'clientName', -1, -1, "", null, null, null, true);
        return count($rows);
    }


    /**
     * Generates the where sentence to search
     * @param string $by key to look
     * @param string $search value to look for
     * @param bool|false $locationId
     * @param bool|false $typeId
     * @return string, where sentence
     */
    private static function get_search_where($by = "", $search = "", $locationId = false, $typeId = false) {
        $wheres = array();
        if (!empty($by) && !empty($search)) {
            $wheres[] = "$by LIKE '%$search%'";
        }

        if (!AgoraPortal_Util::isAdmin()) {
            $wheres[] = "noVisible = 0";
            $wheres[] = "clientState = 1";
        }

        if (!empty($locationId)) {
            $wheres[] = "locationId = $locationId";
        }

        if (!empty($typeId)) {
            $wheres[] = "typeId = $typeId";
        }
        return implode(' AND ', $wheres);
    }

    /**
     * Performs a search by params with the related services
     * @param $serviceId Service to look for
     * @param $search array of key values to search
     * @return bool|array of objects
     */
    public static function search_by_service_params($serviceId, $search) {
        if ($serviceId == 0) {
            return false;
        }

        $searchby = (isset($search['searchby'])) ? $search['searchby'] : array();

        $joins = array();
        $joins[] = array('join_table' => Service::TABLE,
            'join_field' => array('activedId'),
            'object_field_name' => array('activedId'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');

        $where = "serviceId = $serviceId";

        if (!AgoraPortal_Util::isAdmin()) {
            $where = " AND noVisible = 0 AND clientState = 1";
        }

        foreach ($searchby as $key => $value) {
            if(!empty($key) && !empty($value)) {
                switch ($key) {
                    case 'state':
                        if (is_array($value) && !empty($value)) {
                            $tmp = array();
                            foreach ($value as $rowstate) {
                                if ($rowstate != '-1') {
                                    $tmp[] = "$key = $rowstate";
                                }
                            }
                            $where .= ' AND (' . implode(' OR ', $tmp) . ')';
                        } else {
                            $where .= " AND $key = $value";
                        }
                        break;
                    case 'locationId':
                    case 'typeId':
                        if ($value != 0) {
                            $where .= " AND $key = $value";
                        }
                        break;
                    case 'educat':
                        $where .= " AND $key = $value";
                        break;
                    default:
                        $where .= " AND $key" . " LIKE '%" . $value . "%'";
                        break;
                }
            }
        }

        // Pagination and order
        $rpp = (isset($search['rpp']) && $search['rpp'] > 0) ? $search['rpp'] : '-1';
        $init = (isset($search['init']) && $search['init'] != 0) ? $search['init'] - 1 : '-1';
        $orderby = (isset($search['orderby']) && !empty($search['orderby'])) ? $search['orderby'] : "clientId";
        return DBUtil::selectExpandedObjectArray(Client::TABLE, $joins, $where, $orderby, $init, $rpp, 'clientId');
    }

    /**
     * Performs a search by params with the related services
     * @param $serviceId Service to look for
     * @param $search array of key values to search
     * @return bool|array of Client
     */
    public static function get_by_service_params($serviceId, $search) {
        $rows = self::search_by_service_params($serviceId, $search);
        $clients = array();
        foreach ($rows as $key => $row) {
            $client = new Client($row);
            $clients[$client->clientId] = $client;
        }
        return $clients;
    }


}

/**
 * Class Client
 * Entity that owns the services
 */
class Client extends AgoraBase {

    const TABLE = 'agoraportal_clients';

    protected $clientId;
    // Unique code related to Departament
    protected $clientCode;
    // Unique name to form the URL
    protected $clientDNS;
    // Previous name stored to redirect the URL
    protected $clientOldDNS;

    protected $clientName;
    protected $clientAddress;
    protected $clientCity;
    protected $clientPC;
    protected $clientCountry;
    protected $clientDescription;
    protected $clientState;
    protected $locationId;
    protected $typeId;
    protected $noVisible;
    // Stores the name of the template in case of nodes Services
    protected $extraFunc;
    // If the client is using the educat1x1 network
    protected $educat;

    /**
     * Gets a Client by clientCode
     * @param $code the clientCode to search
     * @return bool|Client
     */
    public static function get_by_code($code) {
        $row = DBUtil::selectObjectByID(self::TABLE, $code, 'clientCode');
        if (!$row) {
            return false;
        }
        return new Client($row);
    }

    /**
     * Gets a Client by the clientId
     * @param $id
     * @return bool|Client
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'clientId');
        if (!$row) {
            return false;
        }
        return new Client($row);
    }

    /**
     * Gets a Client by ClientDNS
     * @param $dns
     * @return bool|Client
     */
    public static function get_by_dns($dns) {
        $row = DBUtil::selectObjectByID(self::TABLE, $dns, 'clientDNS');
        if (!$row) {
            return false;
        }
        return new Client($row);
    }

    /**
     * Creates a new Client
     * @param $row array with the related info
     * @param bool $addtogroup if true, adds the client related user (clientCode) to the Clients group
     * @return false|Client
     */
    public static function create($row, $addtogroup = true) {
        if (!isset($row['clientName']) || !isset($row['clientDNS']) || !isset($row['clientCode'])
            || empty($row['clientName']) || empty($row['clientDNS']) || empty($row['clientCode'])) {
            return LogUtil::registerError('Falten dades del obligatòries del client. Reviseu les dades');
        }

        if (Client::get_by_dns($row['clientDNS']) || Client::get_by_code($row['clientCode'])) {
            return LogUtil::registerError('Aquest client ja existeix. El DNS i el codi de client han de ser únics');
        }

        if (!$obj = DBUtil::insertObject($row, self::TABLE, 'clientId')) {
            return LogUtil::registerError('No s\'ha pogut crear el client');
        }

        if ($addtogroup) {
            AgoraPortal_Util::add_user_to_group('Clients', $row['clientCode']);
        }

        return self::get_by_id($obj['clientId']);
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save() {
        $where = "clientId = $this->clientId";
        $item = $this->get_array();
        return DBUTil::updateObject($item, self::TABLE, $where);
    }

    /**
     * Performs security checks and the change of the DNS
     * It also executes the replaceDNS operation on all its services
     * @param $olddns Old DNS to be replace (security)
     * @param $newdns New DNS
     * @return bool
     */
    public function changeDNS($olddns, $newdns) {
        // Old DNS does not match
        if ($olddns != $this->clientDNS) {
            return false;
        }

        $this->clientOldDNS = $this->clientDNS;
        $this->clientDNS = $this->$newdns;
        if (!$this->save()) {
            return false;
        }

        $services = $this->get_enabled_services();
        foreach ($services as $service) {
            $service->replaceDNS($this->clientOldDNS, $this->clientDNS);
        }
        return true;
    }

    /**
     * Gets and array of requests related to the client
     * @return array of requests
     */
    public function get_requests() {
        return Requests::get_client_requests($this->clientId);
    }

    /**
     * Shortcut to the the Client type name form the typeId
     * @return string with the Client Type name
     */
    public function get_type_name() {
        if (!$this->typeId) {
            return "";
        }
        return ClientTypes::get_type_name($this->typeId);
    }

    /**
     * Shortcut to the the Client location name form the locationId
     * @return string with the Client location name
     */
    public function get_location_name() {
        if (!$this->locationId) {
            return "";
        }
        return Locations::get_location_name($this->locationId);
    }

    /**
     * Shortcut to the the Nodes template name form the extraFunc
     * @return string with the Nodes template name
     */
    public function get_template_name() {
        if (!$this->extraFunc) {
            return "";
        }
        return ServiceTemplates::get_template_description($this->extraFunc);
    }

    // MANAGERS RELATED FUNCTIONS

    /**
     * Gets the list of managers related to the client
     * @return array
     */
    public function get_managers() {
        return Managers::get_client_managers($this->clientCode);
    }

    /**
     * Adds a manager to the list of managers of the client
     * @param $username of the manager to be added
     * @return bool success
     */
    public function add_manager($username) {
        return Manager::add($this->clientCode, $username);
    }

    /**
     * Returns if there are empty spaces to add a manager
     * @return bool
     */
    public function can_add_managers() {
        return Manager::can_add_managers($this->clientCode);
    }

    // SERVICES RELATED FUNCTIONS

    /**
     * Returns if the client has a service enabled
     * @param $serviceId
     * @return bool
     */
    public function has_service($serviceId) {
        return Service::get_by_client_and_service($this->clientId, $serviceId) ? true : false;
    }

    /**
     * Adds a service to the client
     * @param $serviceId
     * @param $contactProfile
     * @param string $observations
     * @return bool
     */
    public function request_service($serviceId, $contactProfile, $observations = "") {
        if (!$this->has_service($serviceId)) {
            return Service::request_service($serviceId, $this->clientId, $contactProfile, $observations);
        }
        return true;
    }

    /**
     * Returns if a service can be requested, if is allowed by clientCode
     * If true, it returns the servicetype
     * @param $serviceId
     * @return bool|ServiceType
     */
    public function can_service_be_requested($serviceId) {
        $servicetype = ServiceType::get_by_id($serviceId);
        if (!$servicetype || !$servicetype->isClientCodeAllowed($this->clientCode)) {
            return false;
        }

        // Get active client services
        $service = Service::get_by_client_and_service($this->clientId, $serviceId);
        if ($service) {
            if ($service->state == 0 || $service->state == 1) {
                return false;
            }
        }
        return $servicetype;
    }

    /**
     * Get the list of services that can be requested (free)
     * @return array
     */
    public function get_servicestypes_to_request() {
        $servicetypes = ServiceTypes::get_all();
        $allowedServices = array();
        foreach ($servicetypes as $servicetype) {
            if ($servicetype->isClientCodeAllowed($this->clientCode)) {
                $allowedServices[$servicetype->serviceId] = $servicetype;
            }
        }

        // Get active client services
        $services = Services::get_requested_client_services($this->clientId);
        foreach ($services as $service) {
            unset($allowedServices[$service->serviceId]);
        }

        // Get not asked services
        return $allowedServices;
    }

    /**
     * Get all enabled services
     * @return array
     */
    public function get_enabled_services() {
        return Services::get_enabled_client_services($this->clientId);
    }

    /**
     * Get the related service by serviceId
     * @param $serviceId
     * @return bool|Service
     */
    public function get_service_by_id($serviceId) {
        return Service::get_by_client_and_service($this->clientId, $serviceId);
    }

    /**
     * Get all services related to the client, enabled or not
     * @return array
     */
    public function get_all_services() {
        return Services::get_all_client_services($this->clientId);
    }

    // LOGS RELATED FUNCTIONS
    /**
     * Add a log to the client
     * @param $actionCode, use ClientLogs constants
     * @param $text of the action to be stored
     * @return bool
     */
    public function add_log($actionCode, $text) {
        return ClientLog::add($this->clientCode, $actionCode, $text);
    }

    /**
     * Get related client logs
     * @param $search search to be performed
     * @param $pag first row to be shown
     * @return array
     */
    public function get_logs($search, $init) {
        return ClientLogs::get_client_logs($this->clientCode, $search, $init);
    }

    /**
     * Get logos of the enabled services with its link
     * @return string HMTL
     */
    public function get_logos() {
        $services = Services::get_enabled_client_services($this->clientId);
        $logos = "";
        foreach($services as $service) {
            $logos .= $service->get_logo_with_link();
        }
        return $logos;
    }

    /**
     * Get client e-mail
     * @return bool
     */
    public function get_client_mail() {
        return AgoraPortal_Util::get_user_mail($this->clientCode);
    }

    /**
     * Send mail to a client, choose who will receive it
     * @param $subject
     * @param $mailContent
     * @param bool|true $sendtoclient
     * @param bool|true $sendtomanagers
     * @param bool|true $adminbcc
     * @return bool
     */
    public function send_mail($subject, $mailContent, $sendtoclient = true, $sendtomanagers = true, $adminbcc = true) {

        $mailer = self::isMailerAvalaible();
        if(!$mailer) {
            return true;
        }

        $who = "";
        $toUsers = array();
        if ($sendtoclient) {
            // Send e-mail to client code (a8000001@xtec.cat)
            $toUsers[] = $this->get_client_mail();
            $who = 'al centre';
        }

        if ($sendtomanagers) {
            // Get all managers
            $managers = $this->get_managers();
            // Add managers to destination
            foreach ($managers as $manager) {
                $toUsers[] = $manager->useremail;
            }

            $toUsers = array_unique($toUsers);
            if(!empty($who)) {
                $who .= ' i ';
            }
            $who .= 'als gestors';
        }

        $bccUsers = array();
        if ($adminbcc) {
            // BCC to site e-mail
            $bccUsers[] = array('address' => System::getVar('adminmail'));
        }

        // Send the e-mail
        $sendMail = self::send_mail($subject, $mailContent, $this->clientCode, $toUsers, $bccUsers);
        if ($sendMail) {
            LogUtil::registerStatus(__('S\'ha enviat un missatge de correu electrònic informatiu '.$who));
        }
        return $sendMail;
    }

    /**
     * Delete a client from the system. NOT IMPLEMENTED
     * @notimplemented
     * @param $id
     * @return bool|false
     */
    public static function delete($id) {
        $item = self::get_by_id($id);
        if (!$item) {
            return true;
        }

        return LogUtil::registerError('No implementat');

        // Delete client's services
        $services = $item->get_all_services();
        foreach($services as $service) {
            if (!Service::delete($service->clientServiceId)) {
                return false;
            }
        }

        // TODO:
        // delete client's lines in Oracle tables for validation
        // delete client's users table
        // delete client's groups
        // delete client's as user
        // delete client's files information
        // delete client's requests

        // Finally, delete Client
        if (!DBUtil::deleteObjectByID(self::TABLE, $id, 'clientId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de '.self::TABLE);
        }
        return true;
    }

}