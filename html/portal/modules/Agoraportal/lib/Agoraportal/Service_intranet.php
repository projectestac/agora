<?php

/**
 * Class Service_intranet
 * Describes an Intranet Service
 */
class Service_intranet extends Service {

    /**
     * Calculates the activedId and dbHost (got from twin) or free
     * @return int activedId
     */
    protected function getDBId() {
        $twin = Service::get_by_client_and_servicename($this->clientId, 'nodes');
        if ($twin && $twin->activedId > 0) {
            $this->activedId = $twin->activedId;
            $this->dbHost = $twin->dbHost;
            return $this->activedId;
        }

        $this->activedId = $this->calcFreeDatabase();
        return $this->activedId;
    }

    /**
     * Execute the SQL to correctly enable the service
     * @param $password for admin
     * @return bool
     */
    protected function enable_service($password) {
        global $agora;

        $client = $this->get_client();
        // Generate a password for Intraweb admin user
        $passwordEnc = '1$$' . md5($password);

        $username = $agora['intranet']['userprefix'] . $this->activedId;

        $sql = array();

        $clientName = DataUtil::formatForStore(serialize($client->clientName));
        $sql[] = "UPDATE module_vars set value='$clientName' WHERE modname='ZConfig' AND name='sitename'";
        $sql[] = "UPDATE module_vars set value='$clientName' WHERE modname='ZConfig' AND name='defaultpagetitle'";

        $value = DataUtil::formatForStore(serialize($client->clientCode . '@xtec.cat'));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='adminmail'";

        $value = DataUtil::formatForStore(serialize('ZKSID' . $this->activedId));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='sessionname'";

        $value = DataUtil::formatForStore(serialize(''));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='slogan'";

        $value = DataUtil::formatForStore(serialize('Intranet de ' . $client->clientName));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='defaultmetadescription'";

        $value = DataUtil::formatForStore(serialize(date('m/Y', time())));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='ZConfig' AND name='startdate'";

        $sql[] = "UPDATE users set pass='$passwordEnc', email='" . $client->clientCode . "@xtec.cat' WHERE uname='admin'";

        $value = DataUtil::formatForStore(serialize($agora['server']['root'] . $agora['intranet']['datadir'] . $username . '/data'));
        $sql[] = "UPDATE module_vars set value='$value' WHERE modname='IWmain' AND name='documentRoot'";

        foreach ($sql as $currentSQL) {
            try {
                $this->executeSQL($currentSQL, true);
            } catch (Exception $e) {
                return LogUtil::registerError(__f('L\'execució de l\'sql ha fallat: ' . $currentSQL . '. Error: ' . $e->getMessage()));
            }
        }

        return true;
    }

    /**
     * Connects to intranet database and returns the connection
     * @param $host
     * @param $dbid
     * @param bool|false $createDB
     * @return false|mysqli
     */
    public static function getDBConnection($host, $serviceDB, $dbid, $createDB = false) {
        global $agora;

        $parts = explode(':', $host, 2);
        $host = $parts[0];
        $port = isset($parts[1]) ? $parts[1]: "";

        $db = $agora['intranet']['userprefix'] . $dbid;
        $username = $agora['intranet']['username'];
        $password = $agora['intranet']['userpwd'];
        $connect = new mysqli($host, $username, $password, $db, (int)$port);
        if ($connect->connect_error) {
            $error = $connect->connect_error;
            return LogUtil::registerError($error);
        }

        $connect->set_charset('utf8');
        return $connect;
    }

    //Actions
    /**
     * Restore XTECAdmin action
     * @return bool succeed
     */
    public function restoreXtecadmin() {
        global $agora;

        $sql = "SELECT uid FROM users WHERE uname = 'xtecadmin'";
        try {
            $result = $this->executeSQL($sql, true);
        } catch (Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }

        $uid = $result[0]['uid'];

        if ($uid > 0) {
            // Remove the user from all groups
            $sql = "DELETE FROM group_membership WHERE uid = $uid";
            try {
                $result = $this->executeSQL($sql, true);
            } catch (Exception $e) {
                return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
            }

            // The user exists. Delete it
            $sql = "DELETE FROM users WHERE uid = $uid";
            try {
                $result = $this->executeSQL($sql, true);
            } catch (Exception $e) {
                return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
            }

            LogUtil::registerStatus('S\'ha esborrat l\'usuari xtecadmin del centre');
        }

        // The user doesn't exist. Create it
        $sql = "INSERT INTO users (uname, pass, email, activated)
                    VALUES ('xtecadmin','" . '1$$' . $agora['xtecadmin']['password'] . "', '" . $agora['xtecadmin']['mail'] . "',1)";
        try {
            $result = $this->executeSQL($sql, true);
        } catch (Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }

        $sql = "SELECT uid FROM users WHERE uname='xtecadmin'";
        try {
            $result = $this->executeSQL($sql, true);
        } catch (Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }

        $uid = $result[0]['uid'];

        if ($uid > 0) {
            // Add the user to the admin group
            $sql = "INSERT INTO group_membership (uid, gid) VALUES ($uid, 2)";
            try {
                $result = $this->executeSQL($sql, false);
            } catch (Exception $e) {
                return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
            }
        }

        LogUtil::registerStatus('S\'ha creat correctament l\'usuari xtecadmin del centre.');
        return true;
    }

    /**
     * Show the list of files of the data directory
     *
     * @author Toni Ginard
     */
    public function getDataDirectory() {
        $agora = AgoraPortal_Util::getGlobalAgoraVars();
        $serviceName = $this->servicetype->serviceName;

        return $agora['server']['root'] . $agora[$serviceName]['datadir'] . $agora[$serviceName]['userprefix'] . $this->activedId;
    }

    /**
     * Show the list of files of the data directory
     *
     * @author Toni Ginard
     */
    public function getDataDirectoryList() {
        $dataDir = $this->getDataDirectory();

        $this->printDataDir($dataDir);
    }
}

