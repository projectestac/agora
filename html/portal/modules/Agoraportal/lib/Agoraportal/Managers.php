<?php

/**
 * Class Managers
 * This class manages bunches of managers
 */
class Managers {

    public static function get_client_managers($clientCode) {
        $where = "clientCode = '$clientCode'";
        $rows = DBUtil::selectObjectArray(Manager::TABLE, $where, 'managerId');
        $managers = array();
        foreach ($rows as $key => $row) {
            $manager = new Manager($row);
            $managers[$manager->managerId] = $manager;
        }
        return $managers;
    }

}

/**
 * Class Manager
 * Describes a Manager
 */
class Manager extends AgoraBase {

    const TABLE = 'agoraportal_client_managers';
    const MANAGERS_LIMIT = 4;

    protected $managerId;
    protected $clientCode;
    protected $managerUName;

    /**
     * Know if there is empty space for more admins
     * @param $clientCode
     * @return bool
     */
    public static function can_add_managers($clientCode) {
        $managers = Managers::get_client_managers($clientCode);
        // If the number of delegated users in lower than 4 and user is manager or client
        if (count($managers) >= self::MANAGERS_LIMIT) {
            return false;
        }
        return true;
    }

    /**
     * Adds a manager to a Client
     * @param string $clientCode of the client to add the manager
     * @param string $managerUName Username of the manager to be added
     * @return bool
     */
    public static function add($clientCode, $managerUName) {

        if (!self::can_add_managers($clientCode)) {
            return LogUtil::registerError('El centre ja té els ' . self::MANAGERS_LIMIT . ' gestors assignats');
        }

        // In case an e-mail address was given, remove text after @
        $pos = strpos($managerUName, '@');
        if ($pos !== false) {
            $managerUName = substr($managerUName, 0, $pos);
        }

        if (is_numeric(substr($managerUName, 1, strlen($managerUName)))) {
            return LogUtil::registerError('No podeu fer gestors a usuaris genèrics');
        }

        // check if the user is manager in another client. A user can only be manager for one client
        $managerInfo = self::get_by_username($managerUName);
        if ($managerInfo) {
            // get school name
            $client = Client::get_by_code($managerInfo->clientCode);
            return LogUtil::registerError("L'usuari/ària ja és gestor/a del centre <strong>$client->clientName ($client->clientCode)</strong>. Una persona no pot ser gestora de dos centres simultàniament.");
        }

        $item = array('clientCode' => $clientCode,
            'managerUName' => $managerUName
        );

        if (!DBUtil::insertObject($item, self::TABLE, 'managerId')) {
            return LogUtil::registerError('No ha estat possible crear el registre a la base de dades');
        }

        return true;
    }

    /**
     * Gets a Manager by the managerId
     * @param $id
     * @return bool|Manager
     */
    public static function get_by_id($id) {
        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'managerId');
        if (!$row) {
            return false;
        }
        return new Manager($row);
    }

    /**
     * Gets a manager searching by username
     * @param $username
     * @return false|Manager
     */
    public static function get_by_username($username) {
        $row = DBUtil::selectObjectByID(self::TABLE, $username, 'managerUName');
        if (!$row) {
            return false;
        }
        return new Manager($row);
    }

    /**
     * Returns the manager mail (if exists)
     * @return mail of the manager
     */
    public function get_useremail() {
        return AgoraPortal_Util::get_user_mail($this->managerUName);
    }

    /**
     * Delete a Manager from the system
     * @param int managerId
     * @return bool
     */
    public function delete() {
        if (!DBUtil::deleteObjectByID(self::TABLE, $this->managerId, 'managerId')) {
            return LogUtil::registerError('No s\'ha pogut esborrar l\'element de '.self::TABLE);
        }
        return true;
    }

}

