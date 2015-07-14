<?php

/**
 * Class ClientLogs
 * This class manages bunches of logs of the selected clients
 */
class ClientLogs {

    /**
     * Gets a list of client logs of the selected search
     * @param $clientCode to look for
     * @param array $search array of parameters to search with keys and values
     * @param int $init The first log to be shown, per page is set to 20
     * @return array of the logs |false
     */
    public static function get_client_logs($clientCode, $search = array(), $init = -1) {

        $wheres = array("clientCode = '$clientCode'");
        foreach($search as $key => $value) {
            if (!empty($value) && $value != "null") {
                switch ($key) {
                    case 'actionCode':
                        $wheres[] = "$key = $value";
                        break;
                    case 'uname':
                        $wheres[] = "$key = '$value'";
                        break;
                    case 'fromDate':
                        list($year,$month,$day) = explode('-', $value);
                        $value = mktime(0, 0, 0, $month, $day, $year);
                        $wheres[] = "time >= $value";
                        break;
                    case 'toDate':
                        list($year,$month,$day) = explode('-', $value);
                        $value = mktime(23, 59, 59, $month, $day, $year);
                        $wheres[] = "time <= $value";
                        break;
                }
            }
        }

        if (!AgoraPortal_Util::isAdmin()) {
            $wheres[] = "actionCode > 0";
        }

        $where = implode(' AND ', $wheres);

        $orderby = "time DESC";

        $logsContent = DBUtil::selectObjectArray(ClientLog::TABLE, $where, $orderby, $init, 20, 'logId');
        if ($logsContent === false) {
            return LogUtil::registerError('No s\'ha pogut cercar en la taula de logs.');
        }

        $numLogs = DBUtil::selectObjectCount(ClientLog::TABLE, $where);
        if ($numLogs === false) {
            $numLogs = 0;
        }

        $response = array('content' => $logsContent, 'numLogs' => $numLogs);
        return $response;
    }
}

/**
 * Class ClientLog
 * Log entry for a client
 */
class ClientLog extends AgoraBase {

    const TABLE = 'agoraportal_logs';

    // Type of logs
    const CODE_ADMIN = -1; // Only shown to admins
    const CODE_ADD = 1;
    const CODE_MODIFY = 2;
    const CODE_DELETE = 3;
    const CODE_ERROR = 4;

    protected $logId;
    protected $clientCode;
    protected $uname;
    protected $actionCode;
    protected $action;
    protected $time;

    /**
     * Get the ClientLog class searching by id
     * @param $id
     * @return ClientLog|false
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'logId');
        if (!$row) {
            return false;
        }
        return new ClientLog($row);
    }

    /**
     * Add a log entry to the selected client
     * @param $clientCode
     * @param $actionCode Use the class constants
     * @param $text text of the action to be stored
     * @return bool success
     */
    public static function add($clientCode, $actionCode, $text) {
        $uname = DataUtil::formatForStore(UserUtil::getVar('uname'));

        $item = array('clientCode' => $clientCode,
            'uname' => $uname,
            'actionCode' => $actionCode,
            'action' => DataUtil::formatForStore($text),
            'time' => DataUtil::formatForStore(time()),
        );

        if (!DBUTil::insertObject($item, self::TABLE, 'logId')) {
            return LogUtil::registerError('No ha estat possible crear el registre a la base de dades.');
        }

        return true;
    }
}

