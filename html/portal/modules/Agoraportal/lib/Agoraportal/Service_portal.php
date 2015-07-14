<?php

/**
 * Class ServiceType_portal
 * Describes a Fake Portal ServiceType
 */
class ServiceType_portal extends ServiceType {

    /**
     * Construct the portal serviceType
     * ServiceType_portal constructor.
     * @param bool|false $array
     */
    public function __construct($array = false) {
        $array = array('serviceId' => 0, 'serviceName' => 'portal', 'hasDB' => true);
        parent::__construct($array);
    }

    /**
     * Returns Logo (image not available so, returns text)
     * @return string
     */
    public function get_logo() {
        return 'Portal';
    }
}

/**
 * Class Client_portal
 * Describes a Fake Portal Client
 */
class Client_portal extends Client {

    /**
     * Client_portal constructor.
     * @param array $array
     */
    public function __construct($array = array()) {
        parent::__construct($array);
    }
}

/**
 * Class Service_portal
 * Describes a Fake Portal Service
 */
class Service_portal extends Service {

    // Connection
    private $connect;

    /**
     * Overwrites the Service constructor just to get control over servicetype and client
     * Service_portal constructor.
     * @param array $array
     * @param null $servicetype
     * @param null $client
     */
    public function __construct($array = array(), $servicetype = null, $client= null) {
        $servicetype = new ServiceType_portal();
        $client = new Client_portal();
        parent::__construct($array, $servicetype, $client);
        $this->connect = false;
    }

    /**
     * Connects to portal Database and returns the connection
     * @param bool|false $host
     * @param bool|false $dbid
     * @param bool|false $createDB
     * @return false|mysqli
     */
    public static function getDBConnection($host = false, $dbid = false, $createDB = false) {
        global $agora;

        $databaseName = $agora['admin']['database'];
        $host = $agora['admin']['host'];
        $port = $agora['admin']['port'];
        $username = $agora['admin']['username'];
        $password = $agora['admin']['userpwd'];
        $connect = new mysqli($host, $username, $password, $databaseName, (int)$port);

        if ($connect->connect_error) {
            $error = $connect->connect_error;
            return LogUtil::registerError($error);
        }

        $connect->set_charset('utf8');
        return $connect;
    }

    /**
     * Executes a SQL into the portal database
     * @param $sql
     * @param bool|true $keepalive
     * @return array|bool
     * @throws Exception
     */
    public function executeSQL($sql, $keepalive = true) {
        $connect = $this->connectDB();
        return $this->sql($sql, $connect, true);
    }
}
