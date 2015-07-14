<?php

/**
 * Class Agora_Queues
 * This class manages the queues
 */
class Agora_Queues {

    // Timeout that makes operation to be timedout
    const TIMEOUT = 1800; ///Half an hour

    /**
     * @return the date of last execution of the queues
     */
    public static function get_last_execution() {
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        //-100 really is not a user but represents the system user
        return  ModUtil::func('IWmain', 'user', 'userGetVar',
            array('uid' => -100,
                'name' => 'lastCronSuccessfull',
                'module' => 'Queues_cron',
                'sv' => $sv));
    }

    /**
     * Sets the date of the last execution of the queues
     * @param $content response of the cron
     */
    public static function set_last_execution_now($content) {
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        //-100 really is not a user but represents the system user
        ModUtil::func('IWmain', 'user', 'userSetVar',
            array('uid' => -100,
                'name' => 'lastCronSuccessfull',
                'module' => 'Queues_cron',
                'lifetime' => 1000 * 24 * 60 * 60,
                'sv' => $sv,
                'value' => time()));

        ModUtil::func('IWmain', 'user', 'userSetVar',
            array('uid' => -100,
                'name' => 'cronResponse',
                'module' => 'Queues_cron',
                'lifetime' => 1000 * 24 * 60 * 60,
                'sv' => $sv,
                'value' => $content));
    }

    /**
     * Execute the pending operations in the queues
     * @return bool
     */
    public static function execute_pending_operations() {

        self::timeout_operations();

        $loading = self::get_operations_by_state(Agora_Queues_Operation::LOADING, true);
        if (!empty($loading)) {
            print 'There are ' . $loading . ' operations executing!';
            return false;
        }

        $pendingnum = self::get_operations_to_run();
        if (!$pendingnum) {
            print 'GREAT! No pending operations...';
            return true;
        }
        print 'There are ' . $pendingnum . ' pending operations...';

        print '<ul>';
        while ($operation = self::get_next_operation()) {
            print '<li>Operation id: ' . $operation->id . ' Operation: ' . $operation->operation . ' Priority: ' . $operation->priority;
            $operation->execute();
            print ' -> Done.';
        }
        print '</ul>';

        return true;
    }

    /**
     * @return The next operation to be executed
     */
    public static function get_next_operation() {
        $ops = self::get_operations_to_run();
        if (!empty($ops)) {
            $op = reset($ops);

            if (isset($op->id)) {
                return Agora_Queues_Operation::get_operation_by_id($op->id);
            }
        }
        return false;
    }

    public static function get_operations_to_run($count = false) {
        $hour = (int)date('G');
        $where = "state = '".Agora_Queues_Operation::PENDING."'";
        if ($hour < 2 || $hour > 6) {
            // Day runner
            $where .= ' AND priority >=0';
        }
        if ($count) {
            return DBUtil::selectObjectCount(Agora_Queues_Operation::TABLE, $where);
        }
        return DBUtil::selectObjectArray(Agora_Queues_Operation::TABLE, $where, 'priority DESC, timeCreated ASC, ClientId ASC', -1, 1);
    }

    /**
     * Test the time that is being executed one operation and change State if is greater than TIMEOUT
     */
    public static function timeout_operations() {
        $loading = self::get_operations_by_state(Agora_Queues_Operation::LOADING);
        if (!empty($loading)) {
            foreach ($loading as $executing) {
                // Timeout after half hour
                if ($executing['timeStart'] < time() - self::TIMEOUT) {
                    $executing['state'] = Agora_Queues_Operation::TIMEOUT;
                    DBUtil::updateObject($executing, Agora_Queues_Operation::TABLE);
                }
            }
        }
    }

    /**
     * Get operations for a given state
     * @param $state to filter
     * @param bool|false $count if a count is needed
     * @return array|int
     */
    public static function get_operations_by_state($state, $count = false) {
        if ($count) {
            return DBUtil::selectObjectCount(Agora_Queues_Operation::TABLE, "state = '".$state."'");
        }
        return DBUtil::selectObjectArray(Agora_Queues_Operation::TABLE, "state = '".$state."'");
    }

    /**
     * Returns the operations for a given search
     * @param $search to be performed
     * @param bool|false $count if a count is needed
     * @return array|int
     */
    public static function get_operations($search, $count = false) {
        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_queues_column'];
        $a = $tables['agoraportal_clients_column'];

        $init = !empty($search['startnum']) ? $search['startnum'] : 0;
        $rpp = !empty($search['rpp']) ? $search['rpp'] : 15;
        $orderdir = !empty($search['sortby_dir']) ? $search['sortby_dir'] : '';
        $orderby = !empty($search['sortby']) ? $search['sortby'] : 'timeCreated DESC, priority DESC';

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
            'join_field' => array('clientName', 'clientDNS', 'clientCode'),
            'object_field_name' => array('clientName', 'clientDNS', 'clientCode'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');

        $joins[] = array('join_table' => 'agoraportal_services',
            'join_field' => array('serviceName'),
            'object_field_name' => array('serviceName'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');

        if (!empty($search['operation'])) {
            $operation = $search['operation'];
            if (substr($operation, 0, 7) != 'script_') {
                $operation = 'script_'.$operation;
            }
            $wheres[] = "$c[operation] = '$operation'";
        }

        if ($search['priority'] != '-' && $search['priority'] != '') {
            $wheres[] = "$c[priority] = $search[priority]";
        }

        if (!empty($search['service'])) {
            $wheres[] = "tbl.$c[serviceId] = $search[service]";
        }

        if (!empty($search['client'])) {
            switch($search['client_type']){
                case 'clientCode':
                    $wheres[] = "a.$a[clientCode] LIKE '%$search[client]%'";
                    break;
                case 'clientName':
                    $wheres[] = "a.$a[clientName] LIKE '%$search[client]%'";
                    break;
                case 'clientCity':
                    $wheres[] = "a.$a[clientCity] LIKE '%$search[client]%'";
                    break;
                case 'clientDNS':
                    $wheres[] = "a.$a[clientDNS] LIKE '%$search[client]%'";
                    break;
                case 'clientId':
                    $wheres[] = "tbl.$c[clientId] = $search[client]";
                    break;
            }
        }

        if (!empty($search['state'])) {
            $states = explode(',', $search['state']);
            $states_where = array();
            foreach ($states as $state) {
                $states_where[] = "$c[state] = '$state'";
            }
            $wheres[] = '('.implode(' OR ', $states_where).')';
        } else {
            $wheres[] = "$c[state] != 'L'";
        }

        if (!empty($search['from'])) {
            $timestart = strtotime($search['from']);
            $wheres[] = "tbl.$c[timeCreated] >= $timestart";
        }

        if (!empty($search['to'])) {
            $timeend = strtotime($search['to']);
            $wheres[] = "tbl.$c[timeCreated] <= $timeend";
        }

        $where = implode(' AND ', $wheres);
        if ($count) {
            $items = DBUtil::selectExpandedObjectArray(Agora_Queues_Operation::TABLE, $joins,  $where);
            return count($items);
        }

        $items = DBUtil::selectExpandedObjectArray(Agora_Queues_Operation::TABLE, $joins,  $where, $orderby, $init, $rpp);
        return $items;
    }
}

/**
 * Class Agora_Queues_Operation
 * Define an operation
 */
class Agora_Queues_Operation {

    const TABLE = 'agoraportal_queues';
    const LOG_TABLE = 'agoraportal_queues_log';

    // Operation states and its meaning
    const PENDING = 'P';
    const OK = 'OK';
    const KO = 'KO';
    const LOADING = 'L';
    const TIMEOUT = 'TO';

    private $id;
    private $operation;
    private $clientId;
    private $serviceId;
    private $priority;
    private $state;
    private $timeCreated;
    private $timeStart;
    private $timeEnd;
    private $params;
    private $logId;

    private $log;

    /**
     * Retrieve an operation from the database
     * Agora_Queues_Operation
     * @param $id to retrieve
     */
    private function __construct($id) {
        $operation = DBUtil::selectObjectByID(self::TABLE, $id);
        $this->id = $operation['id'];
        $this->operation = $operation['operation'];
        $this->clientId = $operation['clientId'];
        $this->serviceId = $operation['serviceId'];
        $this->priority = $operation['priority'];
        $this->state = $operation['state'];
        $this->timeCreated = $operation['timeCreated'];
        $this->timeStart = $operation['timeStart'];
        $this->timeEnd = $operation['timeEnd'];
        $this->params = $operation['params'];
        $this->logId = $operation['logId'];

        $this->log = "";
        if ($this->logId) {
            $log = DBUtil::selectObjectByID(self::LOG_TABLE, $this->logId);
            if ($log) {
                $this->log = $log['content'];
            }
        }
    }

    /**
     * Retrieves and operation from database
     * @param $id of the operation
     * @return Agora_Queues_Operation|false
     */
    public static function get_operation_by_id($id) {
        if ($id > 0) {
            try {
                return new Agora_Queues_Operation($id);
            } catch (Exception $e) {
            }
        }
        return false;
    }

    /**
     * Returns the log content of the operation
     * @param $logid
     * @return string
     */
    public static function get_log_by_id($logid) {
        $log = DBUtil::selectObjectByID(self::LOG_TABLE, $logid);
        if ($log) {
            return $log['content'];
        }
        return 'No hi ha registre';
    }


    /**
     * PHP overloading magic
     *
     * @param string $name property name
     * @return mixed
     * @throws Exception
     */
    public function __get($name) {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            throw new Exception('Unknown property ' . $name . ' of Agora_Queues_Operation');
        }
    }

    /**
     * Adds an opeartion to the database
     * @param $operation
     * @param $clientId
     * @param $serviceId
     * @param string $params
     * @param int $priority
     * @return Agora_Queues_Operation|false
     */
    public static function add($operation, $clientId, $serviceId, $params = "", $priority = 0) {
        $op = array();
        $op['operation'] = $operation;
        $op['clientId'] = $clientId;
        $op['serviceId'] = $serviceId;
        $op['priority'] = $priority;
        $op['timeCreated'] = time();
        $op['state'] = self::PENDING;

        if (!empty($params) && is_array($params)) {
            $params_aux = array();
            foreach ($params as $key => $value) {
                $params_aux[$key] = htmlentities($value);
            }
            $op['params'] = json_encode($params_aux);
        } else {
            $op['params'] = "";
        }

        $op = DBUtil::insertObject($op, self::TABLE);
        return Agora_Queues_Operation::get_operation_by_id($op['id']);
    }

    /**
     * Delete a Operation from the system
     * @param $id
     * @return bool
     */
    public static function delete($id) {
        $operation = self::get_operation_by_id($id);
        if ($operation && $operation->state == self::PENDING) {
            DBUtil::deleteObjectByID(self::TABLE, $id);
            return true;
        }
        return false;
    }

    /**
     * Adds an operation to the database and executes it immediatelly
     * @param $operation
     * @param $clientId
     * @param $serviceId
     * @param string $params
     * @param int $priority
     * @return Agora_Queues_Operation|bool|false
     */
    public static function addExecute($operation, $clientId, $serviceId, $params = "", $priority = 0) {
        $op = self::add($operation, $clientId, $serviceId, $params, $priority);
        if (!$op) {
            return false;
        }

        $op->execute();
        return $op;
    }

    /**
     * Changes state of the operation (some states are not admited)
     * @param $newstate
     * @return bool
     */
    public function changeState($newstate) {
        if ($newstate == self::OK || $newstate == self::KO || $newstate == self::PENDING) {
            $this->state = $newstate;
            $array = get_object_vars($this);
            DBUtil::updateObject($array, self::TABLE);
            return $this->state;
        }
        return false;
    }

    /**
     * Changes the priority of the operation
     * @param $newpriority
     * @return bool
     */
    public function changePriority($newpriority) {
        if ($this->state == self::PENDING) {
            $this->priority = $newpriority;
            $array = get_object_vars($this);
            DBUtil::updateObject($array, self::TABLE);
            return $this->priority;
        }
        return false;
    }

    /**
     * Returns the parameters of the operation
     * @return array|mixed|string
     */
    public function getParams() {
        return self::parse_params($this->params);
    }

    /**
     * Decodes json of parameters
     * @param $params
     * @return array|mixed|string
     */
    public static function parse_params($params) {
        if (empty($params)) {
            return "";
        }
        $params = str_replace("\r", "\\r", $params);
        $params = str_replace("\n", "\\n", $params);
        return json_decode($params, true);
    }

    /**
     * Parse parameter to be shown in HTML
     * @param $params
     * @return string
     */
    public static function parse_params_html($params) {
        if (empty($params)) {
            return "";
        }
        $params = self::parse_params($params);
        $html = "";
        foreach($params as $key => $value) {
            $value = str_replace("\r", "<br/>", $value);
            $value = str_replace("\n", "<br/>", $value);
            $value = str_replace("'", "\\'", $value);
            $html .= $key.' = '.html_entity_decode($value).'<br/>';
        }
        return $html;
    }

    /**
     * Executes an operation
     * @return Array|bool
     */
    public function execute() {

        $this->timeStart = time();
        $this->state = self::LOADING;
        $array = get_object_vars($this);
        DBUtil::updateObject($array, self::TABLE);

        $service = Service::get_by_client_and_service($this->clientId, $this->serviceId);
        if ($service) {
            $success = $this->do_execute($service);
        } else {
            $success = false;
            $this->log = 'Client Service not found';
        }

        $timeend = time();

        // Record Log
        $log = array();
        $log['content'] = $this->log;
        $log['timeModified'] = $timeend;
        if ($this->logId > 0) {
            $log['id'] = $this->logId;
            DBUtil::updateObject($log, self::LOG_TABLE);
        } else {
            $log = DBUtil::insertObject($log, self::LOG_TABLE);
        }

        $this->logId = $log['id'];
        $this->state = $success ? self::OK : self::KO;
        $this->timeEnd = $timeend;
        $array = get_object_vars($this);
        DBUtil::updateObject($array, self::TABLE);

        return $success;
    }

    /**
     * @return if the operation is executed and succeeded
     */
    public function has_succeeded() {
        return $this->state == self::OK;
    }

    /**
     * @return the log message content
     */
    public function get_message() {
        return $this->log;
    }

    /**
     * Execute operations to a service
     * @author Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return  Array with success 0 or 1, errorMsg with the error text or '' and values in select commands
     */
    private function do_execute($service) {

        $command = $service->get_operations_command();
        if (!$command) {
            $this->log = 'Operations are not allowed for this service';
            return false;
        }

        $command .= ' -s="'.$this->operation.'" --ccentre="'.$service->get_client_dns().'"';

        $params = $this->getParams();
        if ($params && is_array($params)) {
            foreach ($params as $key => $value) {
                $value = str_replace("\r", "<br/>", $value);
                $value = str_replace("\n", "<br/>", $value);
                $command .= ' --'.$key.'="'.html_entity_decode($value).'"';
            }
        }

        $command = 'php '.$command.' > /dev/stdout 2>&1';

        set_time_limit(0);
        ini_set('mysql.connect_timeout', self::TIMEOUT);
        ini_set('default_socket_timeout', self::TIMEOUT);
        $last = exec($command, $result);

        $success = $last == 'success';
        $this->log = nl2br(implode("\n", $result));

        if (empty($this->log)) {
            LogUtil::registerError($command);
            $success = false;
            $this->log = 'Empty message returned...';
        }

        return $success;
    }
}