<?php

/**
 * Get the active services of a client. If clientId is present, uses this param
 *  to get the service info. If clientId is not present but clientCode is
 *  present, uses client code to get the info.
 *
 * @author Toni Ginard
 * @param int clientId
 * @param int clientCode
 *
 * @return array The services of the client
 */
class Agoraportal_Api_User extends Zikula_AbstractApi {

    public function getClientServices($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get required params (only one needed)
        $clientId = (isset($args['clientId'])) ? $args['clientId'] : '';
        $clientCode = (isset($args['clientCode'])) ? $args['clientCode'] : '';

        // If required params are left, show an error
        if (empty($clientId) && empty($clientCode)) {
            return LogUtil::registerError($this->__('No s\'ha indicat ni l\'Id ni el codi del client'), 404);
        }

        // If clientCode passed, get the clientId associated to the clientCode
        if (empty($clientId)) {
            $client = ModUtil::apiFunc('Agoraportal', 'user', 'getClient', array('clientCode' => $clientCode));
            $clientId = $client['clientId'];
        }

        // Get the services associated to the clientId
        $tables = DBUtil::getTables();
        $column = $tables['agoraportal_client_services_column'];

        $where = "$column[clientId] = '$clientId' AND $column[state] = '1'";

        $services = DBUtil::selectObjectArray('agoraportal_client_services', $where);

        return $services;
    }

    /**
     * Get the client info from its clientCode
     *
     * @author Toni Ginard
     * @param int clientCode
     *
     * @return array information of the client in table agoraportal_clients
     */
    public function getClient($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get required param
        $clientCode = (isset($args['clientCode'])) ? $args['clientCode'] : '';

        // If required param is left, show an error
        if (empty($clientCode)) {
            return LogUtil::registerError($this->__('No s\'ha indicat el codi del client'), 404);
        }

        // Get the clientId
        $tables = DBUtil::getTables();
        $column = $tables['agoraportal_clients_column'];

        $where = "$column[clientCode] = '$clientCode'";

        $client = DBUtil::selectObject('agoraportal_clients', $where);

        return $client;
    }

    /**
     * Get the client info from its clientCode
     *
     * @author Toni Ginard
     * @param int ClientId
     *
     * @return array information of the client in table agoraportal_clients
     */
    public function getClientById($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get required param
        $clientId = (isset($args['clientId'])) ? $args['clientId'] : '';

        // If required param is left, show an error
        if (empty($clientId)) {
            return LogUtil::registerError($this->__('No s\'ha indicat l\'Id del client'), 404);
        }

        // Get the clientId
        $tables = DBUtil::getTables();
        $column = $tables['agoraportal_clients_column'];
        $where = "$column[clientId] = '$clientId'";

        $client = DBUtil::selectObject('agoraportal_clients', $where);

        return $client;
    }

    /**
     * Get the serviceId's allowed for a given requestType
     *
     * @author Toni Ginard
     * @param int requestTypeId
     *
     * @return array services allowed for the request type
     */
    public function getRequestTypesServices($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get required param
        $requestTypeId = (isset($args['requestTypeId'])) ? $args['requestTypeId'] : '';

        // If required param is left, show an error
        if (empty($requestTypeId)) {
            return LogUtil::registerError($this->__('No s\'ha indicat l\'Id del tipus de petició'), 404);
        }

        // Get the clientId
        $tables = DBUtil::getTables();
        $column = $tables['agoraportal_requestTypesServices_column'];

        $where = "$column[requestTypeId] = '$requestTypeId'";

        $typeServices = DBUtil::selectObjectArray('agoraportal_requestTypesServices', $where);

        return $typeServices;
    }

    /**
     * get all client services information from database
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of available services
     */
    public function getAllClientsAndServices($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $clientCode = (!isset($args['clientCode'])) ? 0 : $args['clientCode'];
        $key = (!isset($args['key'])) ? 'clientServiceId' : $args['key'];
        $clientServiceId = (isset($args['clientServiceId'])) ? $args['clientServiceId'] : false;
        $service = (isset($args['service'])) ? $args['service'] : false;
        $state = (isset($args['state'])) ? $args['state'] : false;
        $pilot = (isset($args['pilot'])) ? $args['pilot'] : false;
        $include = (isset($args['include'])) ? $args['include'] : true;

        $myJoin = array();
        $myJoin[] = array('join_table' => 'agoraportal_client_services',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'clientServiceId',
            'compare_field_join' => 'clientServiceId');
        $myJoin[] = array('join_table' => 'agoraportal_clients',
            'join_field' => array('clientId', 'clientCode', 'clientName', 'clientDNS', 'clientPC', 'clientAddress', 'clientCity', 'clientState', 'clientDescription', 'locationId', 'typeId', 'noVisible', 'extraFunc', 'educat', 'educatNetwork'),
            'object_field_name' => array('clientId', 'clientCode', 'clientName', 'clientDNS', 'clientPC', 'clientAddress', 'clientCity', 'clientState', 'clientDescription', 'locationId', 'typeId', 'noVisible', 'extraFunc', 'educat', 'educatNetwork'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');
        $tables = DBUtil::getTables();
        $ocolumn = $tables['agoraportal_client_services_column'];
        $lcolumn = $tables['agoraportal_clients_column'];
        $where = '';
        if ($clientServiceId) {
            $where = "a.$ocolumn[clientServiceId] = $args[clientServiceId]";
        } else {
            // filter no visible sites
            if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                $where = "(b.$lcolumn[noVisible] = 0 || b.$lcolumn[clientCode] = '$clientCode')";
            }
        }

        if ($service || (is_numeric($state) && $state != '-1') || is_array($state)) {
            if (is_numeric($service) && ($service != 0)) {
                $where .= ( $where != '') ? ' AND ' : '';
                $where .= "a.$ocolumn[serviceId] = $args[service]";
            }
            // Check if there are several desired states
            if (is_array($state)) {
                $tmp = array();
                foreach ($state as $rowstate) {
                    if ($rowstate != '-1') {
                        $tmp[] = "a.$ocolumn[state] = $rowstate";
                    }
                }
                $where .= ( $where != '') ? ' AND ' : '';
                $where .= '(' . implode(' OR ', $tmp) . ')';
            } else {
                if ($state != '-1') {
                    $where .= ( $where != '') ? ' AND ' : '';
                    $where .= "a.$ocolumn[state] = $state";
                }
            }
        }

        if (isset($args['location']) && $args['location'] != 0) {
            $where .= ( $where != '') ? ' AND ' : '';
            if ($args['location'] != 0) {
                $where .= "b.$lcolumn[locationId] = $args[location]";
            }
        }

        if (isset($args['type']) && $args['type'] != 0) {
            $where .= ( $where != '') ? ' AND ' : '';
            if ($args['type'] != 0) {
                $where .= "b.$lcolumn[typeId] = $args[type]";
            }
        }

        if ((isset($args['search']) && $args['search'] != 0) && $args['searchText'] != '') {
            $where .= ( $where != '') ? ' AND ' : '';
            switch ($args['search']) {
                case '1':
                    $where .= "b.$lcolumn[clientCode]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '2':
                    $where .= "b.$lcolumn[clientName]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '3':
                    $where .= "b.$lcolumn[clientCity]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '4':
                    $where .= "b.$lcolumn[clientDNS]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '5':
                    $where .= "a.$ocolumn[activedId]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
            }
        }

        if (is_string($pilot)) {
            switch ($pilot) {
                case 'educat':
                    $where .= ( !empty($where) ) ? ' AND ' : '';
                    if($include){
                        $where .= "b.$lcolumn[educat]" . " = 1";
                    } else {
                        $where .= "b.$lcolumn[educat]" . " = 0";
                    }
                    break;
                case 'educatNetwork':
                    $where .= ( !empty($where) ) ? ' AND ' : '';
                    if($include){
                        $where .= "b.$lcolumn[educatNetwork]" . " = 1";
                    } else {
                        $where .= "b.$lcolumn[educatNetwork]" . " = 0";
                    }
                    break;
            }
        }

        if (isset($args['order'])) {
            switch ($args['order']) {
                case 1:
                    $orderby = "b.$lcolumn[clientName], b.$lcolumn[clientDNS], a.$ocolumn[serviceId]";
                    break;
                case 2: //Used to order by edit time
                    $orderby = "a.$ocolumn[state] asc, a.$ocolumn[timeEdited] desc, a.$ocolumn[clientServiceId] desc";
                    break;
                case 3: //Used to order by activedId
                    $orderby = "a.$ocolumn[activedId]";
                    break;
                case 4: //Used to order by clientCode
                    $orderby = "b.$lcolumn[clientCode]";
                    break;
                case 5: //Used to order by clientCode
                    $orderby = "b.$lcolumn[clientDNS]";
                    break;
            }
        } else {
            $orderby = '';
        }

        if (!isset($args['onlyNumber'])) {
            $args['rpp'] = (isset($args['rpp']) && $args['rpp'] > 0) ? $args['rpp'] : '-1';
            $init = (isset($args['init']) && $args['init'] != 0) ? $args['init'] - 1 : '-1';
            $items = DBUtil::selectExpandedObjectArray('agoraportal_client_services', $myJoin, $where, $orderby, $init, $args['rpp'], $key);
            if ($items === false) {
                return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
            }
        } else {
            $items = DBUtil::selectExpandedObjectCount('agoraportal_client_services', $myJoin, $where, $key);
        }

        // Return the items
        return $items;
    }

    /**
     * Gets the list of services, owned by current client (identified by its
     *  manager), that are active for a given request type.
     *
     * @author Toni Ginard
     * @author Aida Regi
     * @param
     * @return
     */
    public function getClientRequestServices($args) {
        $typeId = $args['requestTypeId'];

        //Get item
        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_requestTypesServices_column'];
        $orderby = '';
        $where = '';

        $myJoin[] = array('join_table' => 'agoraportal_services',
            'join_field' => array('serviceName', 'serviceId'),
            'object_field_name' => array('serviceName', 'serviceId'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');

        if (isset($args['requestTypeId'])) {
            $where = " WHERE tbl." . $c['requestTypeId'] . " = " . $typeId;
        }

        $items = DBUtil::selectExpandedObjectArray('agoraportal_requestTypesServices', $myJoin, $where, $orderby);

        return $items;
    }

    /**
     * get all client services information from sites list
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of available services
     */
    public function getAllClientsAndServicesForSitesList($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $myJoin = array();
        $myJoin[] = array('join_table' => 'agoraportal_clients',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');
        $tables = DBUtil::getTables();
        $ocolumn = $tables['agoraportal_clients_column'];
        $where = "a.$ocolumn[noVisible] = 0";
        if (isset($args['location']) && $args['location'] != 0) {
            if ($args['location'] != 0) {
                $where .= " AND a.$ocolumn[locationId] = $args[location]";
            }
        }
        if (isset($args['typeId']) && $args['typeId'] != 0) {
            if ($args['typeId'] != 0) {
                $where .= " AND a.$ocolumn[typeId] = $args[typeId]";
            }
        }
        if (isset($args['type']) && $args['type'] != 0) {
            if ($args['type'] != 0) {
                $where .= " AND a.$ocolumn[typeId] = $args[type]";
            }
        }
        if ($args['search'] != 0 && $args['searchText'] != '') {
            switch ($args['search']) {
                case '1':
                    $where .= " AND a.$ocolumn[clientCode]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '2':
                    $where .= " AND a.$ocolumn[clientName]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '3':
                    $where .= " AND a.$ocolumn[clientCity]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
            }
        }
        $orderby = "a.$ocolumn[clientName]";
        if (!isset($args['onlyNumber'])) {
            $rpp = (isset($args['rpp']) && $args['rpp'] > 0) ? $args['rpp'] : 15;
            $clients = DBUtil::selectExpandedObjectArray('agoraportal_clients', $myJoin, $where, $orderby, $args['init'] - 1, $rpp, 'clientDNS');
        } else {
            return DBUtil::selectExpandedObjectCount('agoraportal_clients', $myJoin, $where, 'clientId');
        }
        if ($clients === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }
        foreach ($clients as $client) {
            $conditions[] = 'b.' . "$ocolumn[clientId]=$client[clientId]";
        }

        if (count($clients) > 0) {
            $conditionsString = '(' . implode(' OR ', $conditions) . ')';
            $myJoin = array();
            $myJoin[] = array('join_table' => 'agoraportal_client_services',
                'join_field' => array(),
                'object_field_name' => array(),
                'compare_field_table' => 'clientServiceId',
                'compare_field_join' => 'clientServiceId');
            $myJoin[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('clientName', 'clientDNS', 'clientCity', 'locationId', 'typeId', 'educat', 'clientCode'),
                'object_field_name' => array('clientName', 'clientDNS', 'clientCity', 'locationId', 'typeId', 'educat', 'clientCode'),
                'compare_field_table' => 'clientId',
                'compare_field_join' => 'clientId');
            $ocolumn = $tables['agoraportal_client_services_column'];
            $lcolumn = $tables['agoraportal_clients_column'];
            $where = $conditionsString . " AND a.$ocolumn[state]=1";
            $orderby = "a.$ocolumn[serviceId]";
            $items = DBUtil::selectExpandedObjectArray('agoraportal_client_services', $myJoin, $where, $orderby, -1, -1, 'clientServiceId');
            if ($items === false) {
                return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
            }
            // include the clients that haven't any service active in order to complete the list
            $clientsArray = array();
            foreach ($items as $item) {
                if (!in_array($item['clientDNS'], $clientsArray)) {
                    $clientsArray[$item['clientDNS']] = $item['clientDNS'];
                }
            }
            $withoutServices = array_diff_key($clients, $clientsArray);
            foreach ($withoutServices as $without) {
                $items[] = $without;
            }
        }
        order::orderBy($items, 'clientName, serviceId ASC');
        // Return the items
        return $items;
    }

    /**
     * get all client information from database
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of available services
     */
    public function getAllClients($args) {
        // check if user is a manager for a client
        $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerUName' => UserUtil::getVar('uname')));
        $clientCode = ($manager) ? $manager['clientCode'] : UserUtil::getVar('uname');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN) && $args['searchText'] != $clientCode) {
            throw new Zikula_Exception_Forbidden();
        }
        $key = (isset($args['returnClientCodeKey'])) ? 'clientCode' : 'clientId';
        $myJoin = array();
        $myJoin[] = array('join_table' => 'agoraportal_clients',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');
        $tables = DBUtil::getTables();
        $ocolumn = $tables['agoraportal_clients_column'];
        $where = '';
        if (isset($args['clientId'])) {
            $where = "a.$ocolumn[clientId] = $args[clientId]";
        }
        if ($where == '' && $args['search'] != 0 && $args['searchText'] != '') {
            switch ($args['search']) {
                case '1':
                    $where = "a.$ocolumn[clientCode]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
                case '2':
                    $where = "a.$ocolumn[clientName]" . " LIKE '%" . $args['searchText'] . "%'";
                    break;
            }
        }
        $orderby = "a.$ocolumn[clientName]";
        $rpp = (isset($args['rpp']) && $args['rpp'] > 0) ? $args['rpp'] : '15';
        $init = (isset($args['init'])) ? $args['init'] - 1 : '-1';
        if (!isset($args['onlyNumber'])) {
            $items = DBUtil::selectExpandedObjectArray('agoraportal_clients', $myJoin, $where, $orderby, $init, $rpp, $key);
        } else {
            $items = DBUtil::selectExpandedObjectCount('agoraportal_clients', $myJoin, $where, 'clientId');
        }
        if ($items === false) {
            //return LogUtil::registerError ($this->__('S'ha produït un error en carregar elements'));
        }
        // Return the items
        return $items;
    }

    /**
     * get all services information from database
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of available services
     */
    public function getAllServices($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_services_column'];

        $where = '';
        $orderby = '';
        if (isset($args['serviceId'])) {
            $where = " WHERE $c[serviceId] = $args[serviceId]";
        }
        $items = DBUtil::selectObjectArray('agoraportal_services', $where, $orderby, '-1', '-1', 'serviceId');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }
        // Return the items
        return $items;
    }

    /**
     * get a services information from database
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Service identity
     * @return:	The service information
     */
    public function getService($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // @aginard: This func name is in conflict with inherited func name from lib/Zikula/AbstractBase.php,
        //  so a check for a needed arg is required!
        if (!is_array($args)) {
            return false;
        }
        $item = DBUtil::selectObjectByID('agoraportal_services', $args['serviceId'], 'serviceId');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($item === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en obtenir el servei'));
        }
        // Return the items
        return $item;
    }

    /**
     * get a service information from database from the service name
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Service identity
     * @return:	The service information
     */
    public function getServiceByName($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_services_column'];
        $where = "$c[serviceName] = '$args[serviceName]'";
        $item = DBUtil::selectObject('agoraportal_services', $where);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($item === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en obtenir el servei'));
        }
        // Return the items
        return $item;
    }

    /**
     * insert a new service in data base
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  The service information
     * @return:	True if success and false otherwise
     */
    public function updateAskService($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        // get client services information
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => array(0, 1),
                    'search' => 1,
                    'searchText' => $clientCode));
        // get client values in case don't have any actived service
        if (empty($clientInfo)) {
            $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClients', array('searchText' => $clientCode,
                        'search' => 1));
        }
        $clientServices = array();
        foreach ($clientInfo as $info) {
            $clientServices[$info['serviceId']] = $info['serviceId'];
            $clientId = $info['clientId'];
        }
        // create services that have been asked
        foreach ($args['serviceId'] as $service) {
            //check if the service has been created for security reasons
            if (!in_array($service, $clientServices)) {
                //insert service in database
                $item = array('serviceId' => $service,
                    'contactName' => UserUtil::getVar('uname'),
                    'contactMail' => UserUtil::getVar('email'),
                    'contactProfile' => $args['contactProfile'],
                    'clientId' => $clientId,
                    'state' => 0,
                    'activedId' => 0,
                    'timeRequested' => time(),
                    'observations' => $args['observations']);

                if (!DBUtil::insertObject($item, 'agoraportal_client_services', 'clientServiceId')) {
                    return LogUtil::registerError($this->__('L\'intent de creació ha fallat'));
                }
            }
        }
        return true;
    }

    /**
     * get all locations information from database
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of available locations
     */
    public function getAllLocations($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_location_column'];
        $where = '';
        $orderby = $c['locationName'];
        if (isset($args['locationId'])) {
            $where = " WHERE $c[locationId] = $args[locationId]";
        }
        $items = DBUtil::selectObjectArray('agoraportal_location', $where, $orderby, '-1', '-1', 'locationId');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }
        // Return the items
        return $items;
    }

    /**
     * get all types information from database
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of available types
     */
    public function getAllTypes($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_clientType_column'];
        $where = '';
        $orderby = $c['typeName'];
        if (isset($args['typeId'])) {
            $where = " WHERE $c[typeId] = $args[typeId]";
        }
        $items = DBUtil::selectObjectArray('agoraportal_clientType', $where, $orderby, '-1', '-1', 'typeId');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get the activedId (data base ID) for a given client and service
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Toni Ginard
     *
     * @param int clientId
     * @param int serviceId (not needed if serviceName is present)
     * @param string serviceName (not needed if serviceId is present)
     *
     * @return array service information combined with client information
     */
    public function getClientService($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get the service ID
        if (isset($args['serviceId'])) {
            $serviceId = $args['serviceId'];
        } else {
            $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
            foreach ($services as $service) {
                if ($service['serviceName'] == $args['serviceName']) {
                    $serviceId = $service['serviceId'];
                }
            }
        }

        if (!$serviceId) {
            return false;
        }

        // get user service id
        $tables = DBUtil::getTables();
        $column = $tables['agoraportal_client_services_column'];
        $where = "$column[clientId] = $args[clientId] AND $column[serviceId] = $serviceId";
        $item = DBUtil::selectObjectArray('agoraportal_client_services', $where, '', '-1', '-1', 'serviceId');

        if ($item === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        return $item[$serviceId];
    }

    /**
     * Get the client-service record by its Id
     *
     * @author Toni Ginard
     *
     * @param int clientServiceId
     *
     * @return Array Client-service record
     */
    public function getClientServiceById($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $clientServiceId = (isset($args['clientServiceId'])) ? $args['clientServiceId'] : false;

        if (!$clientServiceId) {
            LogUtil::registerError($this->__('No s\'ha especificat el clientServiceId a la funció getClientServiceById'));
            return false;
        }

        // get user service id
        $tables = DBUtil::getTables();
        $column = $tables['agoraportal_client_services_column'];
        $where = "$column[clientServiceId] = $clientServiceId";
        $record = DBUtil::selectObject('agoraportal_client_services', $where);

        if ($record === false) {
            LogUtil::registerError($this->__('S\'ha produït un error en fer una consulta a la taula client_services'));
            return false;
        }

        return $record;
    }

    /**
     * Get the all the client_service info given a serviceName and activedId
     *
     * @author Toni Ginard
     *
     * @param string serviceName (intranet, moodle, moodle2)
     * @param int    activedId
     *
     * @return Array Register of table client_services
     */
    public function getClientServiceFull($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $serviceName = $args['serviceName'];
        $activedId = $args['activedId'];

        // Check for mandatory params
        if (!isset($serviceName) || !isset($activedId) || empty($serviceName) || empty($activedId)) {
            return LogUtil::registerError($this->__('Falta un o més paràmetres requerits a getClientServiceFull()'));
        }

        // Get serviceId
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        foreach ($services as $service) {
            if ($service['serviceName'] == $serviceName) {
                $serviceId = $service['serviceId'];
            }
        }

        // Get register from database
        $tables = DBUtil::getTables();
        $column = $tables['agoraportal_client_services_column'];
        $where = "$column[serviceId] = $serviceId AND $column[activedId] = $activedId";
        $item = DBUtil::selectObjectArray('agoraportal_client_services', $where, '', '-1', '-1', '');

        if ($item === false) {
            return LogUtil::registerError($this->__('No s\'ha pogut executar la consulta a la taula client_services a la funció getClientServiceFull()'));
        } else {
            return $item;
        }
    }

    /**
     * checks if a client exists
     * @author      Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The clientCode
     * @return     True if the client exists and false otherwise
     */
    public function clientExists($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $tables = DBUtil::getTables();
        $column = $tables['agoraportal_clients_column'];
        $item = DBUtil::selectObjectByID('agoraportal_clients', $args['clientCode'], 'clientCode');
        if ($item === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }
        if (count($item) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * insert a new record in clients log table
     * @author      Albert Pérez Monfort (aperezm@xtec.cat)
     * @param      The clientCode and the log information
     * @return     True if success and false otherwise
     */
    public function addLog($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $args['clientCode']));
        $clientCode = $clientInfo['clientCode'];
        $uname = DataUtil::formatForStore(UserUtil::getVar('uname'));
        $uid = DataUtil::formatForStore(UserUtil::getVar('uid'));

        $item = array('clientCode' => $clientCode,
            'uname' => $uname,
            'uid' => 'uid',
            'action' => DataUtil::formatForStore($args['action']),
            'actionCode' => DataUtil::formatForStore($args['actionCode']),
            'time' => DataUtil::formatForStore(time()),
        );

        $newLog = DBUTil::insertObject($item, 'agoraportal_logs', 'logId');
        if (!$newLog) {
            return LogUtil::registerError($this->__('No ha estat possible crear el registre a la base de dades.'));
        }

        return $newLog['logId'];
    }

    /**
     * Change the clientDNS in the database and save the changed name in OldDNS field
     * @author     Fèlix Casanellas (fcasanel@xtec.cat)
     * @param      The clientCode
     * @return     True if the delete succed and false otherwise
     */
    public function apiChangeDNS($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $args['clientCode']));

        $clientCode = $clientInfo['clientCode'];
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_clients_column'];
        $where = "WHERE " . $c['clientCode'] . " = '" . $clientCode . "'";

        $items = array('clientOldDNS' => $args['clientOldDNS'],
            'clientDNS' => $args['clientDNS']);

        if (!DBUtil::updateObject($items, 'agoraportal_clients', $where)) {
            return false;
        }

        return true;
    }

    /**
     * Verify if the verifyCode proposed by the user is correct, then convert the user to clientManager
     * @author     Fèlix Casanellas (fcasanel@xtec.cat)
     * @param      The clientCode, verifyCode, uname
     * @return     True if the delete succed and error otherwise
     */
    public function managerAccept($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $clientCode = $args['clientCode'];

        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_client_managers_column'];
        $where = "WHERE " . $c['clientCode'] . " = '" . $clientCode . "' AND " . $c['managerUName'] . " = '" . $args['uname'] . "'";

        if (!$objArray = DBUtil::selectObjectArray('agoraportal_client_managers', $where)) {
            return LogUtil::registerError($this->__('No s \'ha trobat l\'usuari a la taula de gestors'));
        }

        if ($objArray[0]['verifyCode'] != $args['verifyCode']) {
            return LogUtil::registerError($this->__('La paraula clau de confirmació no coincideix amb la proporcionada pel centre. Assegura\'t de que està ben escrita i, en cas que els problemes persisteixin, contacta amb el gestor/a del centre.'));
        }

//        $where = "WHERE " . $c['clientCode'] . " = '" . $clientCode . "' AND " . $c['managerUName'] . " = '" . $args['uname'] . "'";
        $items = array('state' => 1);
        if (!DBUtil::updateObject($items, 'agoraportal_client_managers', $where)) {
            return LogUtil::registerError($this->__('No s \'ha pogut habilitar el gestor'));
        }

        $items = array('gid' => 4, 'uid' => $args['uid']);
        if (!DBUtil::insertObject($items, 'group_membership')) {
            return LogUtil::registerError($this->__('No s \'ha pogut habilitar el gestor'));
        }

        return true;
    }

    /**
     * Change the client state in client_managers table to -1 (refused)
     * @author     Fèlix Casanellas (fcasanel@xtec.cat)
     * @param      The clientCode and the uname
     * @return     True if the delete succed and error otherwise
     */
    public function managerRefuse($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $clientCode = $args['clientCode'];

        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_client_managers_column'];
        $where = "WHERE " . $c['clientCode'] . " = '" . $clientCode . "' AND " . $c['managerUName'] . " = '" . $args['uname'] . "'";
        $items = array('state' => -1);
        if (!DBUTil::updateObject($items, 'agoraportal_client_managers', $where)) {
            return LogUtil::registerError($this->__('No s \'ha pogut fer la cancel·lació'));
        }

        return true;
    }

    /**
     * Select from the data base the logs that satisfy the parameters and count in how pages it'll be shown.
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  logs parameters and the number of logs per page
     * @return: all logs that satisfy the parameters, the number of logs and the number of pags
     */
    public function getLogsContent($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $args['clientCode']));
        $clientCode = $clientInfo['clientCode'];

        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_logs_column'];

        $where = '';
        if (!$args['init']) {
            if ($args['actionCode']) {
                $where = "$c[actionCode]=$args[actionCode]";
            }
            if ($args['uname'] && ($args['uname'] != 'null')) {
                $and = ($where != '') ? ' AND ' : '';
                $where .= $and . "$c[uname]='$args[uname]'";
            }
            if ($args['fromDate'] && ($args['fromDate'] != 'null')) {
                $args['fromDate'] = mktime(0, 0, 0, substr($args['fromDate'], 3, 2), substr($args['fromDate'], 0, 2), substr($args['fromDate'], 6, 4));
                $and = ($where != '') ? ' AND ' : '';
                $where .= $and . "$c[time]>='" . $args['fromDate'] . "'";
            }
            if ($args['toDate'] && ($args['toDate'] != 'null')) {
                $args['toDate'] = mktime(23, 59, 0, substr($args['toDate'], 3, 2), substr($args['toDate'], 0, 2), substr($args['toDate'], 6, 4));
                $and = ($where != '') ? ' AND ' : '';
                $where .= $and . "$c[time]<='" . $args['toDate'] . "'";
            }
        }

        $and = ($where != '') ? ' AND ' : '';
        $where .= $and . "$c[clientCode]='$clientCode'";

        $pag = $args['pag'] - 1;
        $orderby = "$c[time] desc";

        $logsContent = DBUtil::selectObjectArray('agoraportal_logs', $where, $orderby, $pag * $args['factor'], $args['factor'], 'logId');

        if ($logsContent === false) {
            return LogUtil::registerError($this->__('No s\'ha pogut cercar en la taula de logs.'));
        }

        $numLogs = DBUtil::selectObjectCount('agoraportal_logs', $where);
        if ($numLogs === false) {
            return LogUtil::registerError($this->__('No s\'ha pogut cercar en la taula de logs.'));
        }

        $numPags = $numLogs / $args['factor'];
        if ($numLogs % $args['factor'])
            $numPags++;

        $response = array('content' => $logsContent,
            'numPags' => $numPags,
            'numLogs' => $numLogs);
        return $response;
    }

    /**
     * Check if the clientCode has activated specified serviceName
     * @author    Sara Arjona Téllez
     * @param     clientCode and serviceName
     * @return    True if the clientCode has activated specified serviceName; false otherwise
     */
    public function existsServiceInClient($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $allServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $clientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => -1,
                    'search' => 1,
                    'searchText' => $args['clientCode'],
                    'clientCode' => $args['clientCode'],
                ));

        $serviceName = $args['serviceName'];
        // Get serviceId
        foreach ($allServices as $service) {
            if ($service['serviceName'] == $serviceName) {
                $serviceId = $service['serviceId'];
                break;
            }
        }

        // Search serviceId in clientServices array
        $serviceFound = false;
        foreach ($clientServices as $clientService) {
            if ($clientService['serviceId'] == $serviceId) {
                $serviceFound = true;
                break;
            }
        }
        return $serviceFound;
    }

    /**
     * Get all the managers for a client
     * @author      Albert Pérez Monfort (aperezm@xtec.cat)
     * @param       The client code
     * @return:     An array with the managers for a client
     */
    public function getManagers($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $args['clientCode']));
        $clientCode = $clientInfo['clientCode'];

        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_client_managers_column'];
        $where = "$c[clientCode] = '$clientCode'";
        $orderby = '';
        $items = DBUtil::selectObjectArray('agoraportal_client_managers', $where, $orderby, '-1', '-1', 'managerId');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get a manager
     * @author      Albert Pérez Monfort (aperezm@xtec.cat)
     * @param       Manager identity
     * @return:     An array with the manager information
     */
    public function getManager($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $key = (isset($args['managerUName'])) ? 'managerUName' : 'managerId';
        $item = DBUtil::selectObjectByID('agoraportal_client_managers', $args[$key], $key);
        if ($item == false) {
            return false;
        }
        return $item;
    }

    /**
     * Delete a manager
     * @author      Albert Pérez Monfort (aperezm@xtec.cat)
     * @param       Manager identity
     * @return:     True if success and false otrerwise
     */
    public function deleteManager($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        // get manager information
        $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerId' => $args['managerId']));
        $clientCode = $manager['clientCode'];
        // check if user can delete the manager
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        // get client managers
        $managers = ModUtil::apiFunc('Agoraportal', 'user', 'getManagers', array('clientCode' => $clientCode));
        $assigned = false;
        foreach ($managers as $managerOne) {
            if ($managerOne['state'] == 1)
                $assigned = true;
        }
        // check if realy the user can delete de manager
        if ($clientCode != $manager['clientCode'] || (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD) && $assigned) || UserUtil::getVar('uname') == $manager['managerUName']) {
            return LogUtil::registerError($this->__('No pots esborrar el gestor/a.'));
        }
        // user can delete the manager and it is deleted from data base
        $deleted = DBUtil::deleteObjectById('agoraportal_client_managers', $args['managerId'], 'managerId');
        if (!$deleted) {
            return LogUtil::registerError($this->__('S\'ha produït un error a l\'esborrament.'));
        }
        // the user is deleted from groups managers
        $tables = DBUtil::getTables();
        $column = $tables['group_membership_column'];
        $uid = UserUtil::getIdFromName($manager['managerUName']);
        if ($uid) {
            $where = "$column[uid]=" . $uid . " AND $column[gid]=4";
            DBUtil::deleteWhere('group_membership', $where);
        }
        return true;
    }

    /**
     * Add a new manager
     * @author      Albert Pérez Monfort (aperezm@xtec.cat)
     * @param       Manager name and verify key for security
     * @return:     The new manager identity if success and false otrerwise
     */
    public function addManager($args) {
        $managerUName = (isset($args['managerUName'])) ? $args['managerUName'] : null;
        $verifyCode = (isset($args['verifyCode'])) ? $args['verifyCode'] : null;
        $clientCode = (isset($args['clientCode'])) ? $args['clientCode'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        // check if user can add a new manager
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        $canDelegate = ModUtil::func('Agoraportal', 'user', 'canDelegate', array('clientCode' => $clientCode));
        if (!$canDelegate) {
            return LogUtil::registerError($this->__('No pots crear gestors.'));
        }
        // the user delegated can't have a code username
        if (is_numeric(substr($managerUName, 1, strlen($managerUName)))) {
            return LogUtil::registerError($this->__('No pots assignar a usuaris genèrics la gestió.'));
        }
        // add the user in database
        $item = array('clientCode' => $clientCode,
            'managerUName' => $managerUName,
            'verifyCode' => $verifyCode);
        $newId = DBUtil::insertObject($item, 'agoraportal_client_managers', 'managerId');
        if (!$newId) {
            return LogUtil::registerError($this->__('L\'intent de creació ha fallat'));
        }
        return $newId;
    }

    /**
     * Get diferent clients information depending on the parameters sended
     * @author     Fèlix Casanellas (fcasanel@xtec.cat)
     * @param      The clientCode
     * @return     True if the delete succed and false otherwise
     */
    public function getClientMainInfo($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_clients_column'];

        if (isset($args['clientCode'])) {
            $where = "WHERE " . $c['clientCode'] . " = '" . $args['clientCode'] . "'";
        }
        if (isset($args['clientDNS'])) {
            $where = "WHERE " . $c['clientDNS'] . " LIKE '" . $args['clientDNS'] . "%'";
        }
        if (!$items = DBUtil::selectObjectArray('agoraportal_clients', $where)) {
            return false;
        }
        if (isset($args['clientCode'])) {
            return $items[0]['clientName'];
        }
        if (isset($args['clientDNS'])) {
            $clientsArray = array();
            foreach ($items as $item) {
                $clientsArray[$item['clientDNS']] = array('clientDNS' => $item['clientDNS'],
                    'clientName' => $item['clientName'],
                    'clientCode' => $item ['clientCode']);
            }
            return $clientsArray;
        }
    }

    public function saveDiskConsume($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_client_services_column'];
        $where = "WHERE  $c[clientServiceId] = " . $args['clientServiceId'];

        $items = array('diskConsume' => $args['diskConsume'],
        );
        if (!DBUtil::updateObject($items, 'agoraportal_client_services', $where)) {
            return false;
        }
    }

    /**
     * Add a new request
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param       Client Id, manager Id and request information
     * @return      The new request identity if success and error message otherwise
     */
    public function addRequest($args) {
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : null, 'GETPOST');
        $clientId = FormUtil::getPassedValue('clientId', isset($args['clientId']) ? $args['clientId'] : null, 'GETPOST');
        $typeId = FormUtil::getPassedValue('typeId', isset($args['typeId']) ? $args['typeId'] : null, 'GETPOST');
        $comments = FormUtil::getPassedValue('comments', isset($args['comments']) ? $args['comments'] : null, 'GETPOST');
        $managerid = FormUtil::getPassedValue('managerId', isset($args['managerId']) ? $args['managerId'] : null, 'GETPOST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        // add the request in database
        $item = array('clientId' => $clientId,
            'userId' => $managerid,
            'serviceId' => $service,
            'requestTypeId' => $typeId,
            'userComments' => $comments,
            'requestStateId' => '1',
            'timeCreated' => time());

        $newId = DBUtil::insertObject($item, 'agoraportal_request', 'requestId');

        if (!$newId) {
            return LogUtil::registerError($this->__('L\'intent de creació ha fallat'));
        }

        return $newId;
    }

    /**
     *
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param
     * @return
     */
    public function getAllRequests($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_request_column'];

        $where = '';
        $orderby = '';
        $client = $args['client'];
        $clientid = $client['clientId'];

        $myJoin[] = array('join_table' => 'users',
            'join_field' => array('uname'),
            'object_field_name' => array('username'),
            'compare_field_table' => 'userId',
            'compare_field_join' => 'uid');

        $myJoin[] = array('join_table' => 'agoraportal_clients',
            'join_field' => array('clientDNS'),
            'object_field_name' => array('dns'),
            'compare_field_table' => 'clientId',
            'compare_field_join' => 'clientId');

        $myJoin[] = array('join_table' => 'agoraportal_requestStates',
            'join_field' => array('name'),
            'object_field_name' => array('state'),
            'compare_field_table' => 'requestStateId',
            'compare_field_join' => 'requestStateId');

        $myJoin[] = array('join_table' => 'agoraportal_requestTypes',
            'join_field' => array('name'),
            'object_field_name' => array('type'),
            'compare_field_table' => 'requestTypeId',
            'compare_field_join' => 'requestTypeId');

        $myJoin[] = array('join_table' => 'agoraportal_services',
            'join_field' => array('serviceName'),
            'object_field_name' => array('serviceName'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');

        if (isset($args['client'])) {
            $where = " WHERE tbl." . $c['clientId'] . " = " . $clientid . "";
        }

        $items = DBUtil::selectExpandedObjectArray('agoraportal_request', $myJoin, $where, $orderby);

        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        return $items;
    }

    /**
     *
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param
     * @return
     */
    public function getAllRequestTypes($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_requestTypes_column'];

        $where = '';
        if (isset($args['requestTypeId'])) {
            $where = " WHERE $c[requestTypeId] = $args[requestTypeId]";
        }
        $orderby = '';
        $myJoin = array();

        $items = DBUtil::selectExpandedObjectArray('agoraportal_requestTypes', $myJoin, $where, $orderby, '-1', '-1', 'requestTypeId');

        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        return $items;
    }

    /**
     *
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param
     * @return
     */
    public function getAllRequestsStates($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_requestStates_column'];

        $where = '';

        $orderby = '';
        $myJoin = array();

        $items = DBUtil::selectExpandedObjectArray('agoraportal_requestStates', $myJoin, $where, $orderby);

        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        return $items;
    }

    /**
     *
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param
     * @return
     */
    public function getAllRequestTypesServices($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_requestTypesServices_column'];

        $where = '';
        if (isset($args['requestTypeId']) && isset($args['serviceId'])) {
            $where = " WHERE tbl.$c[requestTypeId] = $args[requestTypeId] AND tbl.$c[serviceId] = $args[serviceId] ";
        }
        $orderby = '';
        $myJoin = array();

        $myJoin[] = array('join_table' => 'agoraportal_requestTypes',
            'join_field' => array('name', 'requestTypeId'),
            'object_field_name' => array('type', 'requestTypeIdtype'),
            'compare_field_table' => 'requestTypeId',
            'compare_field_join' => 'requestTypeId');

        $myJoin[] = array('join_table' => 'agoraportal_services',
            'join_field' => array('serviceName', 'serviceId'),
            'object_field_name' => array('serviceName', 'serviceId'),
            'compare_field_table' => 'serviceId',
            'compare_field_join' => 'serviceId');

        $items = DBUtil::selectExpandedObjectArray('agoraportal_requestTypesServices', $myJoin, $where, $orderby);

        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        return $items;
    }

    /**
     * Get requests description
     *
     * @author Toni Ginard
     *
     * @param int requestTypeId (optional)
     *
     * @return array Information of the request/s
     */
    public function getRequestTypes($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get optional param
        $requestTypeId = isset($args['requestTypeId']) ? $args['requestTypeId'] : '';

        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_requestTypes_column'];
        $where = (!empty($requestTypeId)) ? "WHERE $c[requestTypeId] = $requestTypeId" : '';

        $orderby = '';
        $myJoin = array();

        $items = DBUtil::selectExpandedObjectArray('agoraportal_requestTypes', $myJoin, $where, $orderby);

        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        return $items;
    }

    /**
     * Check if a service of a given client has crossed the disk request threshold
     *
     * @author Toni Ginard
     *
     * @param int serviceId
     * @param string clientCode
     *
     * @return boolean true if threshold is crossed, false if not.
     */
    public function checkDiskRequestThreshold($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get params
        $serviceId = FormUtil::getPassedValue('serviceId', isset($args['serviceId']) ? $args['serviceId'] : '', 'GETPOST');
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : '', 'GETPOST');

        // Check for required params
        if (empty($serviceId) || empty($clientCode)) {
            return LogUtil::registerError($this->__('No s\'ha pogut comprovar la quota del servei perquè falten un o més paràmetres requerits'));
        }

        // Get Thresholds
        $diskRequestThreshold = ModUtil::getVar('Agoraportal', 'diskRequestThreshold');
        $maxFreeQuotaForRequest = ModUtil::getVar('Agoraportal', 'maxFreeQuotaForRequest');

        // Get the clientId from the clientCode
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getClient', array('clientCode' => $clientCode));
        $clientId = $client['clientId'];

        // Get service data
        $service = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientId, 'serviceId' => $serviceId));

        // Check if quota usage exceeds disk request threshold
        $maxDiskSpaceMB = $service['diskSpace'];
        $maxDiskSpaceKB = $service['diskSpace'] * 1024;
        $diskConsumeMB = $service['diskConsume'] / 1024;
        $diskConsume = ($maxDiskSpaceKB > 0) ? round($service['diskConsume'] * 100 / $maxDiskSpaceKB) : 0;

        if (($diskConsume > $diskRequestThreshold) && ($diskConsumeMB + $maxFreeQuotaForRequest > $maxDiskSpaceMB)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Execute SQL commands. It is the same function as in admin api but only the select commands are allowed
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @param  sql
     * @param  serviceName
     * @param  database
     * @param  host
     *
     * @return	Array with success 0 or 1, errorMsg with the error text or '' and values in select commands
     */
/*
     public function executeSQL($args) {
        $sql = $args['sql'];
        $serviceName = $args['serviceName'];
        $database = $args['database'];
        $host = (isset($args['host'])) ? $args['host'] : '';
        $serviceDB = (isset($args['serviceDB'])) ? $args['serviceDB'] : '';

        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (strtolower(substr(trim($sql), 0, 6)) != 'select') {
            throw new Zikula_Exception_Forbidden();
        }

        global $agora;

        $connect = ModUtil::apiFunc('Agoraportal', 'user', 'connectExtDB', array('database' => $database,
                    'serviceName' => $serviceName,
                    'host' => $host,
                    'serviceDB' => $serviceDB,
                ));

        if (!$connect) {
            return LogUtil::registerError($this->__('No s\'ha pogut connectar a la base de dades amb ID ' . $database));
        }

        $success = false;
        $errorMsg = '';
        $values = array();

        $return = array('success' => $success,
            'errorMsg' => $errorMsg,
            'values' => $values,
        );

        $dbType = (isset($agora[$serviceName]['dbtype'])) ? $agora[$serviceName]['dbtype'] : 'mysql';

        switch ($dbType) {
            case 'mysql':
                $results = mysql_query($sql, $connect);
                if (!$results) {
                    $errorMsg = mysql_error();
                } else {
                    $success = true;
                    if (strtolower(substr(trim($sql), 0, 6)) == 'select') {
                        // return rows
                        while ($row = mysql_fetch_assoc($results)) {
                            $values[] = $row;
                        }
                    }
                }
                mysql_close($connect);
                break;
            case 'oci8':
            case 'oci8po':
                if (substr_count(strtolower(trim($sql)), 'insert') > 1) {
                    // for multiple inserts in Oracle SQL
                    $sql = "BEGIN $sql END;";
                }
                $results = oci_parse($connect, $sql);

                if (!$results) {
                    $error = oci_error($connect);
                    $errorMsg = $error["message"];
                }
                $r = oci_execute($results);
                if (!$r) {
                    $error = oci_error($results);
                    $errorMsg = $error["message"];
                } else {
                    $success = true;
                    if (strtolower(substr(trim($sql), 0, 6)) == 'select') {
                        while ($row = oci_fetch_assoc($results)) {
                            $values[] = $row;
                        }
                    }
                }
                oci_close($connect);
                break;
        }

        return array('success' => $success,
            'errorMsg' => $errorMsg,
            'values' => $values,
        );
    }
*/
    /**
     * Calculate Oracle database instance for Moodle
     *
     * @author  Toni Ginard
     * @param   int database number
     * @return  string instance name
     */
    public function calcOracleInstance($args) {
        // Security check (might be no necessary)
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        global $agora;

        $dbNumber = (int) $agora['moodle2']['dbnumber'];
        $database = (int) $args['database'];

        // If $dbNumber is not set or it is an empty string, at this point its value
        //   will be 0. In that case, no offset is applied to $agora['moodle2']['database']
        if (empty($dbNumber)) {
            return $agora['moodle2']['database'];
        } else {
            $offset = floor($database / 200) + (($database % 200) == 0 ? ($dbNumber - 1) : $dbNumber);
            if ($offset > 1) {
                $offset = (string) $offset; // Ensure there will not be cast issues
            } else {
                $offset = '';
            }
            return $agora['moodle2']['database'] . $offset;
        }
    }

    /**
     * Open a database connexion with specified user id
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param   int	database ActivedId
     * @param   string serviceName. Default intranet
     * @param   string host database host name
     * @param   string serviceDB database name (for Oracle)
     * @return 	database connexion
     */
    public function connectExtDB($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        $host = FormUtil::getPassedValue('host', (isset($args['host']) && (!empty($args['host']))) ? $args['host'] : null, 'GETPOST');
        $database = FormUtil::getPassedValue('database', isset($args['database']) ? $args['database'] : null, 'GETPOST');
        $serviceName = FormUtil::getPassedValue('serviceName', isset($args['serviceName']) ? $args['serviceName'] : 'intranet', 'GETPOST');
        $serviceDB = FormUtil::getPassedValue('serviceDB', isset($args['serviceDB']) ? $args['serviceDB'] : '', 'GETPOST');
        $forceCreateDB = FormUtil::getPassedValue('forceCreateDB', isset($args['forceCreateDB']) ? $args['forceCreateDB'] : 'false', 'GETPOST');

        // Needed argument
        if ($serviceName == 'moodle2' && (!isset($database) || !is_numeric($database))) {
            return LogUtil::registerError($this->__('La variable $database té un valor incorrecte: ' . $database));
        }

        // Ensure dbhost is set in intranet (MySQL) and serviceDB is set in Moodle (Oracle)
        $clientService = false;
        if (((($serviceName == 'intranet') || ($serviceName == 'nodes')) && (is_null($host) || empty($host)))
           || ($serviceName == 'moodle2' && (is_null($serviceDB) || empty($serviceDB))) ) {
                // Get all client_service info. This function is quite heavy so is worth trying to avoid it.
                $clientService = ModUtil::apiFunc('Agoraportal', 'user', 'getClientServiceFull', array('serviceName' => $serviceName,
                            'activedId' => $database));
        }

        // Load general config and Zikula config
        global $agora;
        global $ZConfig;

        switch ($serviceName) {
            case 'portal':
                $databaseName = $agora['admin']['database'];
                $host = $agora['admin']['host'] . ':' . $agora['admin']['port'];
                $connect = mysql_connect($host, $agora['admin']['username'], $agora['admin']['userpwd']);
                mysql_set_charset('utf8', $connect);
                if (!mysql_select_db($databaseName, $connect)) {
                    return false;
                }
                break;
            case 'intranet':
                $databaseName = $agora['intranet']['userprefix'] . $database;
                if ($clientService != false) {
                    $host = $clientService[0]['dbHost'];
                }
                $connect = mysql_connect($host, $agora['intranet']['username'], $agora['intranet']['userpwd']);
                mysql_set_charset('utf8', $connect);
                if (!mysql_select_db($databaseName, $connect)) {
                    return false;
                }
                break;
            case 'nodes':
                $databaseName = $agora['nodes']['userprefix'] . $database;
                if ($clientService != false) {
                    $host = $clientService[0]['dbHost'];
                }
                $connect = mysql_connect($host, $agora['nodes']['username'], $agora['nodes']['userpwd']);
                mysql_set_charset('utf8', $connect);
                if (!mysql_select_db($databaseName, $connect)) {
                    if ($forceCreateDB){
                        $sql = 'CREATE DATABASE IF NOT EXISTS '.$databaseName;
                        if (mysql_query($sql, $connect) && !mysql_select_db($databaseName, $connect)) {
                            return false;
                        }
                    } else {
                       return false;
                    }
                }
                break;
            case 'moodle2':
                $user = $agora['moodle2']['userprefix'] . $database;
                if ($clientService != false) {
                    $databaseName = $clientService[0]['serviceDB'];
                } else {
                    if (!empty($serviceDB)) {
                        $databaseName = $serviceDB;
                    } else {
                        $databaseName = ModUtil::apiFunc('Agoraportal', 'user', 'calcOracleInstance', array('database' => $database));
                    }
                }
                if ($ZConfig['System']['oci_pconnect']) {
                    $connect = oci_pconnect($user, $agora['moodle2']['userpwd'], $databaseName);
                } else {
                    $connect = oci_connect($user, $agora['moodle2']['userpwd'], $databaseName);
                }
                if (!$connect) {
                    $e = oci_error();
                    LogUtil::registerError(htmlentities($e['message']));
                }
                break;
        }

        if (!$connect) {
            return LogUtil::registerError($this->__f('connectExtDB: No s\'ha pogut connectar al servei <strong>%s</strong>. Paràmetres de depuració: host: %s, dbname: %s, user: %s', array($serviceName, $host, $databaseName, $user)));
        }

        return $connect;
    }

    /**
     * Check if the clientCode has activated specified serviceName
     * @author    Albert Pérez Monfort
     * @param     clientCode and serviceName
     * @return    True if the clientCode has activated specified serviceName; false otherwise
     */
    public function serviceClientIsActive($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $allServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $clientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => -1,
                    'search' => 1,
                    'searchText' => $args['clientCode'],
                    'clientCode' => $args['clientCode'],
                ));

        $serviceName = $args['serviceName'];
        // Get serviceId
        foreach ($allServices as $service) {
            if ($service['serviceName'] == $serviceName) {
                $serviceId = $service['serviceId'];
                break;
            }
        }

        // Search serviceId in clientServices array
        $serviceActive = false;
        foreach ($clientServices as $clientService) {
            if ($clientService['serviceId'] == $serviceId && $clientService['state'] == 1) {
                $serviceActive = true;
                break;
            }
        }
        return $serviceActive;
    }

}

class order {
    /*
     * @param array $ary the array we want to sort
     * @param string $clause a string specifying how to sort the array similar to SQL ORDER BY clause
     * @param bool $ascending that default sorts fall back to when no direction is specified
     * @return null
     */

    public static function orderBy(&$ary, $clause, $ascending = true) {
        $clause = str_ireplace('order by', '', $clause);
        $clause = preg_replace('/\s+/', ' ', $clause);
        $keys = explode(',', $clause);
        $dirMap = array('desc' => 1, 'asc' => -1);
        $def = $ascending ? -1 : 1;

        $keyAry = array();
        $dirAry = array();
        foreach ($keys as $key) {
            $key = explode(' ', trim($key));
            $keyAry[] = trim($key[0]);
            if (isset($key[1])) {
                $dir = strtolower(trim($key[1]));
                $dirAry[] = $dirMap[$dir] ? $dirMap[$dir] : $def;
            } else {
                $dirAry[] = $def;
            }
        }

        $fnBody = '';
        for ($i = count($keyAry) - 1; $i >= 0; $i--) {
            $k = $keyAry[$i];
            $t = $dirAry[$i];
            $f = -1 * $t;
            $aStr = '$a[\'' . $k . '\']';
            $bStr = '$b[\'' . $k . '\']';
            if (strpos($k, '(') !== false) {
                $aStr = '$a->' . $k;
                $bStr = '$b->' . $k;
            }

            if ($fnBody == '') {
                $fnBody .= "if({$aStr} == {$bStr}) { return 0; }\n";
                $fnBody .= "return ({$aStr} < {$bStr}) ? {$t} : {$f};\n";
            } else {
                $fnBody = "if({$aStr} == {$bStr}) {\n" . $fnBody;
                $fnBody .= "}\n";
                $fnBody .= "return ({$aStr} < {$bStr}) ? {$t} : {$f};\n";
            }
        }
        if ($fnBody && is_array($ary)) {
            $sortFn = create_function('$a,$b', $fnBody);
            usort($ary, $sortFn);
        }
    }

}

