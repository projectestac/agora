<?php

/**
 * Get a DB connection for the specified service
 *
 * @param string $service accepted values: admin, nodes, moodle/moodle2
 * @param string $schoolid id of the school
 * @param string $host host to connect
 *
 * @return resource|false Created connection already connected
 * @throws Exception
 */
function get_dbconnection(string $service, string $schoolid = '', string $host = '') {

    require_once 'env-config.php';

    global $agora;

    static $con = [];

    if (empty($service)) {
        return false;
    }

    if ($service == 'admin') {
        $schoolid = 'admin';
    } else if (empty($host)) {
        return false;
    }

    if (empty($schoolid)) {
        return false;
    }

    if (!isset($con[$service])) {
        $con[$service] = [];
    }

    if (!isset($con[$service][$schoolid])) {

        switch ($service) {

            case 'nodes':
                $parts = explode(':', $host, 2);
                $host = $parts[0];
                $port = $parts[1] ?? '';
                $user = $agora['nodes']['username'];
                $password = $agora['nodes']['userpwd'];
                $database = $agora['nodes']['userprefix'] . $schoolid;
                $con[$service][$schoolid] = new agora_dbmanager($host, $user, $password, $database, $port);
                break;

            case 'admin':
                $schoolid = 'admin';
                $host = $agora['admin']['host'];
                $port = $agora['admin']['port'];
                $user = $agora['admin']['username'];
                $password = $agora['admin']['userpwd'];
                $database = $agora['admin']['database'];
                $con[$service][$schoolid] = new agora_dbmanager($host, $user, $password, $database, $port);
                break;

            case 'moodle':
            case 'moodle2':
                $parts = explode(':', $host, 2);
                $host = $parts[0];
                $port = $parts[1] ?? $agora['moodle2']['port'];
                $user = $agora['moodle2']['userprefix'] . $schoolid;
                $database = $agora['moodle2']['userprefix'] . $schoolid;
                $password = $agora['moodle2']['userpwd'];
                $con[$service][$schoolid] = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
                break;

            default:
                return false;
        }
    }

    return $con[$service][$schoolid];
}

/**
 * MySQL Manager, construction has to be done though get_dbconnection
 */
class agora_dbmanager {

    private $connection = false;
    private $host, $user, $password, $database, $port;

    /**
     * @throws Exception
     */
    public function __construct($host, $user, $password, $database, $port = false) {
        if (empty($host)) {
            $host = null; // localhost
        }
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
        try {
            $this->connect();
        } catch (Exception $e) {
            // throw new Exception($e->getMessage()); //DEBUG
            throw new Exception('Cannot connect to ' . $database);
        }
    }

    /**
     * Connect to the DB
     *
     * @return void
     * @throws Exception
     */
    private function connect() {
        if ($this->connection) {
            return;
        }

        if ($this->port) {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);
        } else {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        }

        if ($this->connection->connect_error) {
            $error = $this->connection->connect_error;
            $this->connection = false;
            throw new Exception ($error);
        }
    }

    /**
     * Rows selected in an array of objects
     *
     * @param string $sql to execute
     * @return array|false
     * @throws Exception
     */
    public function get_rows(string $sql) {
        $result = $this->execute_query($sql);
        if (!$result) {
            return false;
        }

        $results = array();
        while ($obj = $result->fetch_object()) {
            $results[] = $obj;
        }
        $result->close();

        return $results;
    }

    /**
     * Get a row in the database
     *
     * @param string $sql to execute
     * @return false|object
     * @throws Exception
     */
    public function get_row($sql) {
        $rows = $this->get_rows($sql);
        if ($rows && $data = array_shift($rows)) {
            return $data;
        }
        return false;
    }

    /**
     * Get a field in the database
     *
     * @param string $sql to execute
     * @param string $fieldname to get
     * @return mixed value of false
     * @throws Exception
     */
    public function get_field(string $sql, string $fieldname) {
        $data = $this->get_row($sql);
        if ($data && isset($data->$fieldname)) {
            return $data->$fieldname;
        }
        return false;
    }

    /**
     * Number of rows on the query
     *
     * @param string $sql to execute
     * @return int Number of rows returned
     * @throws Exception
     */
    public function count_rows(string $sql) {
        $rows = $this->execute_query($sql);
        if (!$rows) {
            return false;
        }
        return $rows->num_rows;
    }

    /**
     * Executes a raw query (for inserts and updates)
     *
     * @param string $sql query
     * @return object|false
     * @throws Exception
     */
    public function execute_query(string $sql) {
        try {
            $this->connect();
        } catch (Exception $e) {
            return false;
        }

        if (!$result = $this->connection->query($sql)) {
            return false;
        }

        return $result;
    }

    /**
     * Get last error from db query
     *
     * @return string with error
     */
    public function get_error() {
        return $this->connection->error;
    }

    /**
     * Close DB connection
     */
    public function close() {
        if ($this->connection) {
            $this->connection->close();
            $this->connection = false;
        }
    }
}

/**
 * Get rows from Admin database
 *
 * @param string $sql to execute
 * @return Array|false false with the rows returned in objects
 */
function get_rows_from_db(string $sql) {
    try {
        $db = get_dbconnection('admin');
        $results = $db->get_rows($sql);
        $db->close();
        return $results;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Open a connection to the specified Moodle instance and return it
 *
 * @param $school Array with the school information (id and database)
 *
 * @return resource|false handler or FALSE on error.
 */
function connect_moodle(array $school) {
    try {
        return get_dbconnection('moodle2', $school['id'], $school['dbhost']);
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Close specified Moodle connection
 *
 * @param $con resource The Moodle database connection
 *
 * @return boolean TRUE on success or FALSE on failure.
 */
function disconnect_moodle($con): bool {
    return pg_close($con);
}

/**
 * Open a connection to the specified Nodes database and return it
 *
 * @param $school Array with the school information (database)
 *
 * @return resource|false handler
 */
function connect_nodes(array $school) {
    try {
        return get_dbconnection('nodes', $school['id'], $school['dbhost']);
    } catch (Exception $e) {
        return false;
    }
}
