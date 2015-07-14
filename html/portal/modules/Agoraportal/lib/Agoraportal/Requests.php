<?php

/**
 * Class Requests
 * This class manages bunches of requests
 */
class Requests {

    /**
     * Returns all the request of the Client
     * @param $clientId
     * @return array
     */
    public static function get_client_requests($clientId) {
        $where = "clientId = $clientId";
        $rows = DBUtil::selectObjectArray(Request::TABLE, $where, 'requestId');
        $requests = array();
        foreach ($rows as $key => $row) {
            $request = new Request($row);
            $requests[$request->requestId] = $request;
        }
        return $requests;
    }

    /**
     * Returns all the request of the service
     * @param $serviceId
     * @param $clientId
     * @return array
     */
    public static function get_service_requests($serviceId, $clientId) {
        $where = "clientId = $clientId AND serviceId = $serviceId";
        $rows = DBUtil::selectObjectArray(Request::TABLE, $where, 'requestId');
        $requests = array();
        foreach ($rows as $key => $row) {
            $request = new Request($row);
            $requests[$request->requestId] = $request;
        }
        return $requests;
    }

    /**
     * @return the join info with the Client table
     */
    private static function get_client_join() {
        return array('join_table' => Client::TABLE,
            'join_field' => array('clientId', 'clientCode', 'clientName', 'clientDNS', 'clientPC', 'clientAddress', 'clientCity', 'clientState', 'clientDescription', 'locationId', 'typeId', 'noVisible', 'extraFunc', 'educat'),
            'object_field_name' => array('clientId', 'clientCode', 'clientName', 'clientDNS', 'clientPC', 'clientAddress', 'clientCity', 'clientState', 'clientDescription', 'locationId', 'typeId', 'noVisible', 'extraFunc', 'educat'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');
    }

    /**
     * @return the join info with the RequestType table
     */
    private static function get_requeststype_join() {
        return array('join_table' => RequestType::TABLE,
            'join_field' => array('requestTypeId', 'name', 'description', 'userCommentsText'),
            'object_field_name' => array('requestTypeId', 'name', 'description', 'userCommentsText'),
            'compare_field_table' => 'requestTypeId',
            'compare_field_join' => 'requestTypeId');
    }

    /**
     * @return the join info with the Service table
     */
    private static function get_service_join() {
        return array('join_table' => Service::TABLE,
            'join_field' => array('clientServiceId', 'serviceId', 'clientId', 'serviceDB', 'description','state','activedId','contactName','contactProfile','timeCreated','observations','annotations','diskSpace','timeEdited','timeRequested', 'diskConsume'),
            'object_field_name' => array('clientServiceId', 'serviceId', 'clientId', 'serviceDB', 'description','state','activedId','contactName','contactProfile','timeCreated','observations','annotations','diskSpace','timeEdited','timeRequested', 'diskConsume'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');
    }

    /**
     * @return the join info with the ServiceType table
     */
    private static function get_servicetype_join() {
        return array('join_table' => ServiceType::TABLE,
            'join_field' => array('serviceId', 'serviceName', 'URL', 'description', 'hasDB', 'defaultDiskSpace', 'allowedClients'),
            'object_field_name' => array('serviceId', 'serviceName', 'URL', 'description','hasDB', 'defaultDiskSpace', 'allowedClients'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');
    }

    /**
     * Mounts the search WHERE SQL for the given parameters
     * @param array $search
     * @return string
     */
    private static function get_search_by($search = array()) {

        $wheres = array();

        foreach ($search as $key => $value) {
            switch($key) {
                case 'service':
                    if ($value > 0) {
                        $wheres[] = "serviceId = $value";
                    }
                    break;
                case 'state' :
                    if ($value >= 0) {
                        $wheres[] = "requestStateId = $value";
                    }
                    break;
                case 'clientCode':
                case 'clientName':
                case 'clientCity':
                case 'clientDNS':
                    if (!empty($value)) {
                        $wheres[] = "a.$key" . " LIKE '%" . $value . "%'";
                    }
                    break;
                default:
                    if (!empty($value)) {
                        $wheres[] = "$key" . " LIKE '%" . $value . "%'";
                    }
                    break;
            }
        }
        return implode(' AND ', $wheres);
    }

    /**
     * Search Requests for the given parameters
     * @param $search
     * @param int $init
     * @param int $rpp
     * @return array of Request
     */
    public static function search_by($search, $init = -1, $rpp = 15) {
        $where = self::get_search_by($search);

        $joins = array(self::get_client_join(), self::get_requeststype_join(), self::get_service_join(), self::get_servicetype_join());

        $orderby = 'requestId DESC';
        $rows = DBUtil::selectExpandedObjectArray(Request::TABLE, $joins, $where, $orderby, $init, $rpp);
        $requests = array();
        foreach ($rows as $key => $row) {
            $client = new Client($row);
            $servicetype = new ServiceType($row);

            $classname = 'Service_'.$servicetype->serviceName;
            if (file_exists('modules/Agoraportal/lib/Agoraportal/'.$classname.'.php')) {
                require_once('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php');
            } else {
                $classname = 'Service';
            }

            $service = new $classname($row, $servicetype, $client);

            $requesttype = new RequestType($row);
            $request = new Request($row, $service, $requesttype);
            $requests[$request->requestId] = $request;
        }
        return $requests;
    }

    /**
     * Returns the count of rows for the search with the given parameters
     * @param $search
     * @return int
     */
    public static function count_by($search) {
        $where = self::get_search_by($search);


        $orderby = 'requestId desc';
        $joins = array(self::get_client_join());

        $items = DBUtil::selectExpandedObjectArray(Request::TABLE, $joins, $where, "", -1, -1, "requestId", null, null, null, true);
        return count($items);
    }

    /**
     * @return an array of states with the description texts in Catalan
     */
    public static function get_states() {
        return array(Request::STATE_PENDING => "Pendent",
            Request::STATE_STUDYING => "En estudi",
            Request::STATE_SOLVED => "Solucionada",
            Request::STATE_DENEGATED => "Denegada");
    }

    /**
     * Get the state description text for a given stateid
     * @param $stateid
     * @return mixed
     */
    public static function get_state_title($stateid) {
        $states = self::get_states();
        return $states[$stateid];
    }
}

/**
 * Class Request
 * This class describes a Request made by a client
 */
class Request extends AgoraBase {

    const TABLE = 'agoraportal_request';

    // Avalaible stats for Requests
    const STATE_PENDING = 1;
    const STATE_STUDYING = 2;
    const STATE_SOLVED = 3;
    const STATE_DENEGATED = 4;

    protected $requestId;
    protected $requestTypeId;
    protected $serviceId;
    protected $clientId;
    protected $userId;
    protected $userComments;
    protected $adminComments;
    protected $privateNotes;
    protected $requestStateId;
    protected $timeCreated;
    protected $timeClosed;

    private $service;
    private $type;

    /**
     * Request constructor.
     * @param $array that will load the class
     * @param null $service if known, the service related to the request
     * @param null $requesttype if known, the requesttype related to the request
     */
    public function __construct($array, $service = null, $requesttype = null) {
        $this->set_array($array);
        $this->service = $service;
        $this->type = $requesttype;
    }

    /**
     * Gets a Request by the requestId
     * @param $id
     * @return bool|Request
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'requestId');
        if (!$row) {
            return false;
        }
        return new Request($row);
    }

    /**
     * @return string, the username related to the Request
     */
    public function get_username() {
        return UserUtil::getVar('uname', $this->userId);
    }

    /**
     * @return string, the mail related to the user of the Request
     */
    public function get_useremail() {
        return UserUtil::getVar('email', $this->userId);
    }

    /**
     * @return false|Service the Service object related to the request
     */
    public function get_service() {
        if ($this->service == null) {
            $this->service = Service::get_by_client_and_service($this->clientId, $this->serviceId);
        }
        return $this->service;
    }

    /**
     * @return false|RequestType the RequestType object related to the request
     */
    public function get_type() {
        if ($this->type == null) {
            $this->type = RequestType::get_by_id($this->requestTypeId);
        }
        return $this->type;
    }

    /**
     * @return false|string the Title of the RequestType
     */
    public function get_type_name() {
        if ($this->type == null) {
            $this->type = RequestType::get_by_id($this->requestTypeId);
        }
        return $this->type->name;
    }

    /**
     * Adds a Request to the Database
     * @param $serviceId Service
     * @param $clientId Client
     * @param $typeId RequestType
     * @param $comments Comments
     * @return false|Request created
     */
    public static function add($serviceId, $clientId, $typeId, $comments) {
        // add the request in database
        $item = array('clientId' => $clientId,
            'userId' => UserUtil::getVar('uid'),
            'serviceId' => $serviceId,
            'requestTypeId' => $typeId,
            'userComments' => $comments,
            'requestStateId' => self::STATE_PENDING,
            'timeCreated' => time());

        if (!$obj = DBUtil::insertObject($item, self::TABLE, 'requestId')) {
            return LogUtil::registerError('No s\'ha pogut crear la sol·licitud');
        }

        return self::get_by_id($obj['requestId']);
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save() {
        $where = "requestId = $this->requestId";
        $item = $this->get_array();
        return DBUTil::updateObject($item, self::TABLE, $where);
    }

    /**
     * Delete a Request from the system
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $item = self::get_by_id($id);
        if (!$item) {
            return true;
        }

        // Finally, delete Location
        if (!DBUtil::deleteObjectByID(self::TABLE, $id, 'requestId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de '.self::TABLE);
        }
        return true;
    }
}

/**
 * Class RequestTypes
 * This class manages bunches of requests
 */
class RequestTypes {

    /**
     * Returna all RequesTypes in the database
     * @return array
     */
    public static function get_all() {
        $rows = DBUtil::selectObjectArray(RequestType::TABLE, "", 'requestTypeId');
        $requests = array();
        foreach ($rows as $key => $row) {
            $request = new RequestType($row);
            $requests[$request->requestTypeId] = $request;
        }
        return $requests;
    }

    /**
     * Returns all RequestTypes related to a ServiceType
     * @param $serviceId ServiceType Id
     * @return array
     */
    public static function get_service_types($serviceId) {
        $joins = array();
        $joins[] = array(
            'join_table' => RequestType::TABLE_JOIN,
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'requestTypeId',
            'compare_field_join' => 'requestTypeId');

        $where = "serviceId = $serviceId";
        $rows = DBUtil::selectExpandedObjectArray(RequestType::TABLE, $joins, $where, '');

        $requests = array();
        foreach ($rows as $key => $row) {
            $request = new RequestType($row);
            $requests[$request->requestTypeId] = $request;
        }
        return $requests;
    }
}

/**
 * Class RequestType
 * Describes a RequestType that can be Requested
 */
class RequestType extends AgoraBase {
    const TABLE = 'agoraportal_requestTypes';
    const TABLE_JOIN = 'agoraportal_requestTypesServices';

    protected $requestTypeId;
    protected $name;
    protected $description;
    protected $userCommentsText;

    /**
     * Gets a RequestType by the requestTypeId
     * @param $id
     * @return bool|RequestType
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'requestTypeId');
        if (!$row) {
            return false;
        }
        return new RequestType($row);
    }

    /**
     * Get logos of the service related to the RequestType
     * @return array
     */
    public function get_logos() {
        $where = "requestTypeId = $this->requestTypeId";
        $rows = DBUtil::selectObjectArray(self::TABLE_JOIN, $where, 'serviceId');
        $logos = array();
        foreach ($rows as $key => $row) {
            $service = ServiceType::get_by_id($row['serviceId']);
            if (!$service) {
                continue;
            }
            $logos[$row['serviceId']] = $service->get_logo();
        }
        return $logos;
    }


    /**
     * Creates a new RequestType
     * @param $name
     * @param $description
     * @param $userCommentsText
     * @return false|RequestType
     */
    public static function create($name, $description, $userCommentsText) {
        $row = array('name' => $name, 'description' => $description, 'userCommentsText' => $userCommentsText);
        if (!$obj = DBUtil::insertObject($row, self::TABLE, 'requestTypeId')) {
            return LogUtil::registerError('No s\'ha pogut crear el Tipus de Sol·licitud');
        }

        return self::get_by_id($obj['requestTypeId']);
    }

    /**
     * Assigns a new ServiceType related to the RequestType
     * @param $serviceId
     * @return bool|false
     */
    public function addServiceType($serviceId) {
        $row = array('requestTypeId' => $this->requestTypeId, 'serviceId' => $serviceId);
        if (!DBUtil::insertObject($row, self::TABLE_JOIN)) {
            return LogUtil::registerError('No s\'ha pogut afegir el servei al Tipus de Sol·licitud');
        }
        return true;
    }

    /**
     * Unassigns a ServiceType related to the RequestType
     * @param $serviceId
     * @return bool|false
     */
    public function removeServiceType($serviceId) {
        $where = "requestTypeId = $this->requestTypeId AND serviceId = $serviceId";
        if (!DBUtil::deleteWhere(self::TABLE_JOIN, $where)) {
            return LogUtil::registerError('No s\'ha pogut eliminar el servei del Tipus de Sol·licitud');
        }
        return true;
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save() {
        $where = "requestTypeId = $this->requestTypeId";
        $item = $this->get_array();
        return DBUTil::updateObject($item, self::TABLE, $where);
    }

    /**
     * Delete a RequestType from the system
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $item = self::get_by_id($id);
        if (!$item) {
            return true;
        }

        // Finally, delete Location
        if (!DBUtil::deleteObjectByID(self::TABLE, $id, 'requestTypeId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de '.self::TABLE);
        }
        return true;
    }
}


