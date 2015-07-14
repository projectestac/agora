<?php

/**
 * Class Service_intranet
 * Describes an Intranet Service
 */
class Service_intranet extends Service {

    /**
     * Calculates the activedId and serviceDB (got from twin) or free
     * @return int activedId
     */
    protected function getDBId() {
        $twin = Service::get_by_client_and_servicename($this->clientId, 'nodes');
        if ($twin && $twin->activedId > 0) {
            $this->activedId = $twin->activedId;
            $this->serviceDB = $twin->serviceDB;
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
    public static function getDBConnection($host, $dbid, $createDB = false) {
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
    protected function action_restore_xtecadmin() {
        global $agora;

        $sql = "SELECT uid FROM users WHERE uname='xtecadmin'";
        try {
            $result = $this->executeSQL($sql);
        } catch (Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }

        if ($result[0]["uid"] > 0) {
            //delete all the user groups
            $sql = "DELETE FROM group_membership WHERE `uid`=" . $result['values'][0]["uid"];
            try {
                $result = $this->executeSQL($sql);
            } catch (Exception $e) {
                return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
            }

            //the user exists and delete it
            $sql = "DELETE FROM users WHERE uname = 'xtecadmin'";
            try {
                $result = $this->executeSQL($sql);
            } catch (Exception $e) {
                return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
            }

            LogUtil::registerStatus('S\'ha esborrat l\'usuari xtecadmin del centre');
        }

        //the user doesn't exists and create it
        $sql = "INSERT INTO users (uname, pass, email, activated)
                    VALUES ('xtecadmin','" . '1$$' . $agora['xtecadmin']['password'] . "', '" . $agora['xtecadmin']['mail'] . "',1)";
        try {
            $result = $this->executeSQL($sql);
        } catch (Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }

        $sql = "SELECT uid FROM users WHERE uname='xtecadmin'";
        try {
            $result = $this->executeSQL($sql);
        } catch (Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }

        if ($result['values'][0]["uid"] > 0) {
            //insert the user into admin group
            $sql = "INSERT INTO group_membership (uid, gid) VALUES (" . $result['values'][0]["uid"] . ",2)";
            try {
                $result = $this->executeSQL($sql);
            } catch (Exception $e) {
                return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
            }
        }
        LogUtil::registerStatus('S\'ha creat correctament l\'usuari xtecadmin del centre.');
        return true;
    }

    /**
     * Create the first administrator permission action
     * @return bool succeed
     */
    protected function action_first_permission() {
        // Delete the sequence in the first position
        $sql = "DELETE FROM group_perms WHERE sequence < 1 OR pid = 1";
        try {
            $result = $this->executeSQL($sql);
        } catch (Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }

        $sql = "INSERT INTO group_perms (gid, sequence, component, instance, level, pid) VALUES (2,0,'::','::',800,1)";
        try {
            $result = $this->executeSQL($sql);
        } catch (Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }
        LogUtil::registerStatus('S\'ha creat correctament el primer permís d\'administració.');
        return true;
    }

    /**
     * Disable all the intranet blocks action
     * @return boolt succeed
     */
    protected function action_disable_blocks() {
        $sql = "UPDATE blocks SET active = 0";
        try {
            $result = $this->executeSQL($sql);
        } catch(Exception $e) {
            return LogUtil::registerError('L\'execució de l\'sql ha fallat: ' . $sql . '. Error:' . $e->getMessage());
        }
        LogUtil::registerStatus('S\'ha desactivat els blocs correctament.');
        return true;
    }

    /**
     * Returns the list of available actions for intranet
     * @return array
     */
    public function get_actions() {
        $actions = parent::get_actions();
        $actions['restore_xtecadmin'] = "Restaura l'usuari xtecadmin a la Intranet";
        $actions['first_permission'] = "Crea el primer permís d'administració";
        $actions['disable_blocks'] = "Desactiva tots els blocs del portal (només fer-ho en cas de necessitat extrema)";
        return $actions;
    }
}

