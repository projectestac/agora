<?php

/**
 * Class ServiceTypes
 * This class manages bunches of ServiceTypes
 */
class ServiceTypes {

    /**
     * Returns all the ServiceTypes available
     * @param bool|false $add_portal (if portal is has to be added to the list)
     * @return array
     */
    public static function get_all($add_portal = false) {
        $rows = DBUtil::selectObjectArray(ServiceType::TABLE);
        $servicetypes = array();
        if ($add_portal) {
            require_once('modules/Agoraportal/lib/Agoraportal/Service_portal.php');
            $servicetypes[0] = new ServiceType_portal();
        }
        foreach ($rows as $row) {
            $servicetype = new ServiceType($row);
            $servicetypes[$servicetype->serviceId] = $servicetype;
        }
        return $servicetypes;
    }

    /**
     * Returns the ServiceTypes that have database
     * @param bool|false $add_portal (if portal is has to be added to the list)
     * @return array
     */
    public static function get_with_db($add_portal = false) {
        $rows = DBUtil::selectObjectArray(ServiceType::TABLE);
        $servicetypes = array();
        if ($add_portal) {
            require_once('modules/Agoraportal/lib/Agoraportal/Service_portal.php');
            $servicetypes[0] = new ServiceType_portal();
        }
        foreach ($rows as $row) {
            $servicetype = new ServiceType($row);
            if ($servicetype->hasDB) {
                $servicetypes[$servicetype->serviceId] = $servicetype;
            }
        }
        return $servicetypes;
    }
}

/**
 * Class ServiceType
 * Descripbe a Service Type and its properties
 */
class ServiceType extends AgoraBase {

    const TABLE = 'agoraportal_services';

    protected $serviceId;
    protected $serviceName;
    protected $URL; // The directory where is located the service in the URL
    protected $description; // Human readable description
    protected $hasDB; // If has a databse
    protected $defaultDiskSpace; // Disk space to use when creating a new service
    protected $allowedClients; // CSV of the allowed clientCodes (used for piloting

    /**
     * Gets a ServiceType by the serviceId
     * @param $id
     * @return bool|ServiceType
     */
    public static function get_by_id($id) {
        // Exception for "portal" which is not a real service
        if ($id < 1) {
            return false;
        }

        $row = DBUtil::selectObjectByID(self::TABLE, $id, 'serviceId');
        if (!$row) {
            return false;
        }

        return new ServiceType($row);
    }

    /**
     * Gets a ServiceType by its serviceName
     * @param $name
     * @return bool|ServiceType
     */
    public static function get_by_name($name) {
        $row = DBUtil::selectObjectByID(self::TABLE, $name, 'serviceName');
        if (!$row) {
            return false;
        }
        return new ServiceType($row);
    }

    /**
     * Returns the name of a serviceId
     * @param $id
     * @return bool
     */
    public static function get_name($id) {
        $service = self::get_by_id($id);
        if(!$service) {
            return false;
        }
        return $service->serviceName;
    }

    /**
     * Updates the instance info
     * @return int if succeeded
     */
    public function save()  {
        $where = "serviceId = $this->serviceId";
        $item = $this->get_array();
        return DBUTil::updateObject($item, self::TABLE, $where);
    }

    /**
     * Returns all the enabled Services related to the ServiceType
     * @return array|bool
     */
    public function get_enabled_services() {
        return Services::get_enabled_by_serviceid($this->serviceId);
    }

    /**
     * Returns the logo of the Service
     * @param string|false $link if needed, the URI to link the logo
     * @return string
     */
    public function get_logo($link = false) {
        $logo = '<img src="modules/Agoraportal/images/' . $this->serviceName . '.gif" alt="' . $this->serviceName . '" title="' . $this->serviceName . '" />';
        if ($this->hasDB && $link) {
            return '<a href="' . $link . '" target="_blank" class="serviceLogo">' . $logo . '</a>';
        }
        return '<span class="serviceLogo">' . $logo . '</span>';
    }

    /**
     * Returns the support URL of the
     * @return bool|string
     */
    public function get_support_url() {
        switch ($this->serviceName) {
            case 'moodle2':
                return 'http://agora.xtec.cat/moodle/moodle/mod/forum/view.php?id=181';
            case 'nodes':
                return 'http://agora.xtec.cat/moodle/moodle/mod/forum/view.php?id=1721';
            case 'intranet':
                return 'http://agora.xtec.cat/moodle/moodle/mod/forum/view.php?id=1161';
        }
        return false;
    }

    /**
     * Returns the Table prefix for the service
     * @return bool
     */
    public function getTablePrefix() {
        if ($this->hasDB) {
            return $this->getAgoraVars('prefix');
        }
        return false;
    }

    /**
     * Returns if the clientCode is allowed to use the service
     * @param $clientCode
     * @return bool
     */
    public function isClientCodeAllowed($clientCode) {
        if (empty($this->allowedClients)) {
            return true;
        }
        if (strpos($this->allowedClients, $clientCode) !== false) {
            return true;
        }
        return false;
    }

    /**
     * Returns a particular variable of the $agora global for the service
     * @param bool|false $var
     * @return bool
     */
    private function getAgoraVars($var = false) {
        global $agora;
        if (isset($agora[$this->serviceName])) {
            if (!$var) {
                return $agora[$this->serviceName];
            }
            if (isset($agora[$this->serviceName][$var])) {
                return $agora[$this->serviceName][$var];
            }
        }
        return false;
    }

    /**
     * Returns the operation command script for the service
     * @return bool|string
     */
    public function get_operations_command() {
        $dirbase = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));

        switch ($this->serviceName) {
            case 'moodle2':
                return $dirbase.'/moodle2/local/agora/scripts/cli.php';
            case 'nodes':
                return $dirbase.'/wordpress/wp-includes/xtec/scripts/cli.php';
        }
        return false;
    }

    /**
     * Returns the operation list command script for the service
     * @return bool|string
     */
    public function get_operations_list_command() {

        switch ($this->serviceName) {
            case 'moodle2':
                return '/local/agora/scripts/list.php';
            case 'nodes':
                return '/wp-includes/xtec/scripts/list.php';
        }
        return false;
    }

    /**
     * Connect to a particular service for testing purposes
     * @param $host
     * @param $dbid
     * @param bool|false $createDB
     * @return bool|false
     */
    public function testConnection($host, $serviceDB, $dbid, $createDB = false) {
        $classname = 'Service_'.$this->serviceName;
        if (!file_exists('modules/Agoraportal/lib/Agoraportal/'.$classname.'.php')) {
            return false;
        }

        require_once('modules/Agoraportal/lib/Agoraportal/' . $classname . '.php');
        $createDB = $createDB && $this->serviceName == 'nodes';

        $connect = $classname::getDBConnection($host, $serviceDB, $dbid, $createDB);
        $works = false;
        if ($connect) {
            $works = true;
            $classname::disconnectDB($connect);
        }

        if (!$works) {
            LogUtil::registerError(__f("getDBConnection: No s'ha pogut connectar al servei <strong>%s</strong>. Paràmetres de depuració: host: %s, dbid: %s", array($this->serviceName, $host, $dbid)));
        }

        return $works;
    }
}