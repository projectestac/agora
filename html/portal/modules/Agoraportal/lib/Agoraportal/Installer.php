<?php

class Agoraportal_Installer extends Zikula_AbstractInstaller {

    /**
     * Create the tables of the module and import data from the ancient adminTools
     * application
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Toni Ginard
     *
     * @return bool true if successful, false otherwise
     */
    public function Install() {
        // create module tables
        if (!DBUtil::createTable('agoraportal_clients'))
            return false;
        if (!DBUtil::createTable('agoraportal_services'))
            return false;
        if (!DBUtil::createTable('agoraportal_client_services'))
            return false;
        if (!DBUtil::createTable('agoraportal_location'))
            return false;
        if (!DBUtil::createTable('agoraportal_client_managers'))
            return false;
        if (!DBUtil::createTable('agoraportal_clientType'))
            return false;
        if (!DBUtil::createTable('agoraportal_requestTypes'))
            return false;
        if (!DBUtil::createTable('agoraportal_requestStates'))
            return false;
        if (!DBUtil::createTable('agoraportal_request'))
            return false;
        if (!DBUtil::createTable('agoraportal_requestTypesServices'))
            return false;
        if (!DBUtil::createTable('agoraportal_modelTypes'))
            return false;
        if (!DBUtil::createTable('agoraportal_logs'))
            return false;
        if (!DBUtil::createTable('agoraportal_queues'))
            return false;
        if (!DBUtil::createTable('agoraportal_queues_log'))
            return false;

        // Do not stop in case of error
        DBUtil::createTable('agoraportal_mysql_comands');
        DBUtil::createTable('agoraportal_moodle_stats_day');
        DBUtil::createTable('agoraportal_moodle_stats_week');
        DBUtil::createTable('agoraportal_moodle_stats_month');
        DBUtil::createTable('agoraportal_moodle2_stats_day');
        DBUtil::createTable('agoraportal_moodle2_stats_week');
        DBUtil::createTable('agoraportal_moodle2_stats_month');
        DBUtil::createTable('agoraportal_intranet_stats_day');
        DBUtil::createTable('agoraportal_nodes_stats_day');
        DBUtil::createTable('agoraportal_nodes_stats_month');

        // indexes creation
        $table = DBUtil::getTables();
        $c = $table['agoraportal_clients_column'];
        DBUtil::createIndex($c['locationId'], 'agoraportal_clients', 'locationId');
        $c = $table['agoraportal_client_services_column'];
        DBUtil::createIndex($c['serviceId'], 'agoraportal_client_services', 'serviceId');
        DBUtil::createIndex($c['clientId'], 'agoraportal_client_services', 'clientId');
        $c = $table['agoraportal_client_managers_column'];
        DBUtil::createIndex($c['clientCode'], 'agoraportal_client_managers', 'clientCode');
        $c = $table['agoraportal_requestTypes_column'];
        DBUtil::createIndex($c['requestTypeId'], 'agoraportal_requestTypes', 'requestTypeId');
        $c = $table['agoraportal_requestStates_column'];
        DBUtil::createIndex($c['requestStateId'], 'agoraportal_requestStates', 'requestStateId');
        $c = $table['agoraportal_request_column'];
        DBUtil::createIndex($c['requestId'], 'agoraportal_request', 'requestId');
        $c = $table['agoraportal_logs_column'];
        DBUtil::createIndex($c['clientCode'], 'agoraportal_logs', 'clientCode');
        $c = $table['agoraportal_moodle_stats_day_column'];
        DBUtil::createIndex('idx_moodle_stats_day', 'agoraportal_moodle_stats_day', array('clientcode', 'date'));
        $c = $table['agoraportal_moodle_stats_month_column'];
        DBUtil::createIndex('idx_moodle_stats_month', 'agoraportal_moodle_stats_month', array('clientcode', 'yearmonth'));
        $c = $table['agoraportal_moodle_stats_week_column'];
        DBUtil::createIndex('idx_moodle_stats_week', 'agoraportal_moodle_stats_week', array('clientcode', 'date'));
        $c = $table['agoraportal_moodle2_stats_day_column'];
        DBUtil::createIndex('idx_moodle2_stats_day', 'agoraportal_moodle2_stats_day', array('clientcode', 'date'));
        $c = $table['agoraportal_moodle2_stats_month_column'];
        DBUtil::createIndex('idx_moodle2_stats_month', 'agoraportal_moodle2_stats_month', array('clientcode', 'yearmonth'));
        $c = $table['agoraportal_moodle2_stats_week_column'];
        DBUtil::createIndex('idx_moodle2_stats_week', 'agoraportal_moodle2_stats_week', array('clientcode', 'date'));
        $c = $table['agoraportal_nodes_stats_day_column'];
        DBUtil::createIndex('idx_nodes_stats_day', 'agoraportal_nodes_stats_day', array('clientcode', 'date'));
        $c = $table['agoraportal_nodes_stats_month_column'];
        DBUtil::createIndex('idx_nodes_stats_month', 'agoraportal_nodes_stats_month', array('clientcode', 'date'));
        // create module vars
        $this->setVar('siteBaseURL', 'http://agora.xtec.cat')
                ->setVar('allowedIpsForCalcDisckConsume', '')
                ->setVar('warningMailsTo', '')
                ->setVar('requestMailsTo', '')
                ->setVar('diskRequestThreshold', '70')
                ->setVar('clientsMailThreshold', '85')
                ->setVar('maxAbsFreeQuota', '2000')
                ->setVar('maxFreeQuotaForRequest', '1000')
                ->setVar('createDB', false)
                ->setVar('URLNodesModelBase', 'http://pwc-int.educacio.intranet/agora/master')
                ->setVar('DBNodesModel', 'usu6, usu7, usu8, usu9, usu10');

        // successful
        return true;
    }

    /**
     * Remove the module and all associate information
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Toni Ginard
     *
     * @return bool true if successful, false otherwise
     */
    public function Uninstall() {
        // Deletion is not possible
        return false;
    }

    /**
     * Make the changes needed for the new version
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Toni Ginard
     *
     * @return bool true if successful, false otherwise
     */
    public function Upgrade($oldversion) {
        switch ($oldversion) {
            case '1.10':
            case '2.0.0':
                if (!DBUtil::createTable('agoraportal_logs'))
                    return false;
                $table = DBUtil::getTables();
                $c = $table['agoraportal_logs_column'];
                DBUtil::createIndex($c['clientCode'], 'agoraportal_logs', 'clientCode');
            case '2.0.1':
                // delete fields clientURL and reportLifeTime
                $sql = "ALTER TABLE `agoraportal_clients` DROP `clientURL`";
                DBUtil::executeSQL($sql);
                $sql = "ALTER TABLE `agoraportal_clients` DROP `reportLifeTime`";
                DBUtil::executeSQL($sql);
            case '2.0.2':
                if (!DBUtil::changeTable('agoraportal_services'))
                    return false;
                // ChangeTable doesn't remove old fields!!
                $sql = "ALTER TABLE `agoraportal_services` DROP `tablesPrefix`";
                DBUtil::executeSQL($sql);
                $sql = "ALTER TABLE `agoraportal_services` DROP `serverFolder`";
                DBUtil::executeSQL($sql);
            case '2.0.3':
                if (!$this->isMoodle2Created()) {
                    $this->AddMoodle2Service();
                }
            case '2.0.4':
                if (!DBUtil::createTable('agoraportal_moodle2_stats_day'))
                    return false;
                $table = DBUtil::getTables();
                $c = $table['agoraportal_moodle2_stats_day_column'];
                DBUtil::createIndex($c['date'], 'agoraportal_moodle2_stats_day', 'date');
                if (!DBUtil::createTable('agoraportal_moodle2_stats_month'))
                    return false;
                $c = $table['agoraportal_moodle2_stats_month_column'];
                DBUtil::createIndex($c['yearmonth'], 'agoraportal_moodle2_stats_month', 'yearmonth');
                if (!DBUtil::createTable('agoraportal_moodle2_stats_week'))
                    return false;
                $c = $table['agoraportal_moodle2_stats_week_column'];
                DBUtil::createIndex($c['date'], 'agoraportal_moodle2_stats_week', 'date');
            case '2.0.5':
                if (!DBUtil::changeTable('agoraportal_moodle2_stats_month'))
                    return false;
                if (!DBUtil::changeTable('agoraportal_moodle_stats_day'))
                    return false;
                if (!DBUtil::changeTable('agoraportal_moodle_stats_month'))
                    return false;
            case '2.0.6':
                if (!DBUtil::changeTable('agoraportal_moodle_stats_day'))
                    return false;
                if (!DBUtil::changeTable('agoraportal_moodle_stats_month'))
                    return false;
            case '2.0.7':
                $this->delVar('tempFolder');
                $this->delVar('serveradr');
                $this->delVar('basedn');
                $this->delVar('bindas');
                $this->delVar('bindpass');
                $this->delVar('searchdn');
                $this->delVar('serverport');
                $this->delVar('allowedUsersAdministration');
                $this->delVar('allowedAccessRequest');
                $this->delVar('sqlSecurityCode');
            case '2.0.8':
                $sql = "ALTER TABLE agoraportal_services DROP currentVersion;";
                DBUtil::executeSQL($sql);
                $sql = "ALTER TABLE agoraportal_services DROP usersNameField;";
                DBUtil::executeSQL($sql);
                $sql = "ALTER TABLE agoraportal_services ADD URL VARCHAR(50) NOT NULL DEFAULT '' AFTER serviceName;";
                DBUtil::executeSQL($sql);
                $sql = "ALTER TABLE agoraportal_services ADD hasDB TINYINT NOT NULL DEFAULT '1' AFTER description;";
                DBUtil::executeSQL($sql);
                if (!$this->isNodesCreated()) {
                    $this->AddNodesService();
                }
                DBUtil::dropTable('agoraportal_client_settings');
                DBUtil::dropTable('agoraportal_ldap_asynchronous');
            case '2.0.9':
                if (!DBUtil::createTable('agoraportal_queues'))
                    return false;
                if (!DBUtil::createTable('agoraportal_queues_log'))
                    return false;
            case '2.0.10':
                if (!DBUtil::createTable('agoraportal_nodes_stats_day'))
                    return false;
                if (!DBUtil::createTable('agoraportal_nodes_stats_month'))
                    return false;
            case '2.0.11':
                if (!DBUtil::createTable('agoraportal_modelTypes'))
                    return false;
            case '2.0.12':
                $this->setVar('createDB', false)
                        ->setVar('URLNodesModelBase', 'http://pwc-int.educacio.intranet/agora/master')
                        ->setVar('DBNodesModel', 'usu6, usu7, usu8, usu9, usu10');
            case '2.0.14':
                if (!DBUtil::changeTable('agoraportal_queues'))
                    return false;
            case '2.0.15':
                $sql = "ALTER TABLE agoraportal_clients DROP educatNetwork;";
                DBUtil::executeSQL($sql);

            /* IMPORTANT: DBUtil::changeTable elimina els índexos. Cal
             * afegir una comprovació amb DBUtil::metaIndexes per saber
             * si s'han de tornar a crear. */
        }
        return true;
    }

    /**
     * Checks if service moodle2 is present
     *
     * @author Toni Ginard
     *
     * @return boolean
     */
    private function isMoodle2Created() {

        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_services_column'];
        $where = "$c[serviceName]='moodle2'";
        $items = DBUtil::selectObjectArray('agoraportal_services', $where);

        if ($items === false) {
            return false;
        }

        if (!empty($items)) {
            return true;
        }

        return false;
    }

    /**
     * Add service moodle2 to table agoraportal_services
     *
     * @author Toni Ginard
     *
     * @return boolean
     */
    private function AddMoodle2Service() {

        $obj = array('serviceName' => 'moodle2',
            'description' => 'Entorn Virtual d\'Aprenentatge (versió nova)',
            'version' => '222',
            'currentVersion' => '222',
            'usersNameField' => '',
            'defaultDiskSpace' => 2000,
            'allowedClients' => 'cap');

        if (!DBUtil::insertObject($obj, 'agoraportal_services')) {
            return false;
        }

        return true;
    }
    /**
     * Checks if service nodes is present
     *
     * @author Toni Ginard
     *
     * @return boolean
     */
    private function isNodesCreated() {

        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_services_column'];
        $where = "$c[serviceName]='nodes'";
        $items = DBUtil::selectObjectArray('agoraportal_services', $where);

        if ($items === false) {
            return false;
        }

        if (!empty($items)) {
            return true;
        }

        return false;
    }

    /**
     * Add service nodes to table agoraportal_services
     *
     * @author Toni Ginard
     *
     * @return boolean
     */
    private function AddNodesService() {

        $obj = array('serviceName' => 'nodes',
            'description' => 'Web de centre fet amb WordPress',
            'version' => '3.9.1',
            'defaultDiskSpace' => 500,
            'allowedClients' => 'cap');

        if (!DBUtil::insertObject($obj, 'agoraportal_services')) {
            return false;
        }

        return true;
    }

}
