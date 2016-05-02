<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
            'join_field' => array('clientId', 'clientCode', 'clientName', 'clientDNS', 'clientPC', 'clientAddress', 'clientCity', 'clientState', 'clientDescription', 'locationId', 'typeId', 'noVisible', 'extraFunc', 'educat'),
            'object_field_name' => array('clientId', 'clientCode', 'clientName', 'clientDNS', 'clientPC', 'clientAddress', 'clientCity', 'clientState', 'clientDescription', 'locationId', 'typeId', 'noVisible', 'extraFunc', 'educat'),
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
            if (!AgoraPortal_Util::isAdmin()) {
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

            // Filter that that have marsupial
            if ($pilot == 'marsupial') {
                foreach($items as $i => $item) {
                    $args = array();
                    $args['clientCode'] = $item['clientCode'];
                    $args['serviceName'] = 'marsupial';
                    $havemarsu = $this->existsServiceInClient($args);
                    if (($include && !$havemarsu) || (!$include && $havemarsu)) {
                        unset($items[$i]);
                    }
                }
            }

            if ($items === false) {
                return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
            }
        } else {
            //$items = DBUtil::selectExpandedObjectCount('agoraportal_client_services', $myJoin, $where);
            $items = DBUtil::selectExpandedObjectArray('agoraportal_client_services', $myJoin, $where);

            // Filter that that have marsupial
            if ($pilot == 'marsupial') {
                foreach($items as $i => $item) {
                    $args = array();
                    $args['clientCode'] = $item['clientCode'];
                    $args['serviceName'] = 'marsupial';
                    $havemarsu = $this->existsServiceInClient($args);
                    if (($include && !$havemarsu) || (!$include && $havemarsu)) {
                        unset($items[$i]);
                    }
                }
            }
            $items = count($items);
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

    public function getServicesToRequest($args) {
        $clientCode = AgoraPortal_Util::getFormVar($args, 'clientCode');

        $isAdmin = AgoraPortal_Util::isAdmin();

        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        $client = $clientInfo['client'];

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $allowedServices = array();
        foreach ($services as $service) {
            if ($service['allowedClients'] != '') {
                if (strpos($service['allowedClients'], $clientCode) !== false) {
                    $allowedServices[$service['serviceId']] = $service;
                }
            } else {
                $allowedServices[$service['serviceId']] = $service;
            }
        }

        // Get active client services
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => array(0, 1),
                    'search' => 1,
                    'searchText' => $clientCode,
                    'clientCode' => $clientCode,
                ));

        foreach ($clientInfo as $info) {
            unset($allowedServices[$info['serviceId']]);
        }

        // Get not asked services
        return $allowedServices;
    }

    /**
     * get all client services information from sites list
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of available services
     */
    public function getAllClientsAndServicesForSitesList($args) {
        AgoraPortal_Util::requireUser();

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
        if (!AgoraPortal_Util::isAdmin() && $args['searchText'] != $clientCode) {
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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
     * Insert a new service in database
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  The service information
     * @return:	True if success and false otherwise
     */
    public function updateAskService($args) {
        AgoraPortal_Util::requireManager();

        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $args['clientCode']));
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

        $serviceId = $args['serviceId'];
        // Check if the service has been created for security reasons
        if (!in_array($serviceId, $clientServices)) {
            // Check for nodes
            $service = ModUtil::apiFunc('Agoraportal', 'user', 'getService', array('serviceId' => $serviceId));
            $serviceName = $service['serviceName'];
            $obs = ($serviceName == 'nodes') ? $args['observations'] : "";

            // Insert service in database
            $item = array('serviceId' => $serviceId,
                'contactName' => UserUtil::getVar('uname'),
                'contactMail' => UserUtil::getVar('email'),
                'contactProfile' => $args['contactProfile'],
                'clientId' => $clientId,
                'state' => 0,
                'activedId' => 0,
                'timeRequested' => time(),
                'observations' => $obs);

            if (!DBUtil::insertObject($item, 'agoraportal_client_services', 'clientServiceId')) {
                return LogUtil::registerError($this->__('No s\'ha pogut desar la sol·licitud del servei ' . $serviceName));
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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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

        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getClientById', array('clientId' => $record['clientId']));
        if(!$client) {
            $client = array();
        }
        return array_merge($client, $record);
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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $args['clientCode']));
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
     * @author     Pau Ferrer (pferre22@xtec.cat)
     * @param      The clientCode
     * @return     True if the delete succed and false otherwise
     */
    public function apiChangeDNS($args) {
        AgoraPortal_Util::requireClient();

        global $agora;

        $clientCode = $args['clientCode'];
        $oldDNS = $args['clientOldDNS'];
        $newDNS = $args['clientDNS'];
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));

        $pntable = DBUtil::getTables();
        $c = $pntable['agoraportal_clients_column'];
        $where = "WHERE " . $c['clientCode'] . " = '" . $clientCode . "'";
        $items = array('clientOldDNS' => $oldDNS, 'clientDNS' => $newDNS);

        if (!DBUtil::updateObject($items, 'agoraportal_clients', $where)) {
            return false;
        }

        $clientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
            'rpp' => 50,
            'service' => 0,
            'state' => -1,
            'search' => 1,
            'searchText' => $clientCode,
            'clientCode' => $clientCode));

        if ($clientServices) {
            $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
            foreach ($clientServices as $service) {
                $serviceId = $service['serviceId'];
                if ($services[$serviceId]['serviceName'] == 'moodle2') {
                    $urlbase = $agora['server']['server'] . $agora['server']['base'];
                    $urlbase = str_replace('http://', '://', $urlbase);
                    $urlbase = str_replace('https://', '://', $urlbase);
                    $params = array();
                    $params['origintext'] = $urlbase . $oldDNS . '/moodle';
                    $params['targettext'] = $urlbase . $newDNS . '/moodle';
                    $operation = ModUtil::apiFunc('Agoraportal', 'admin', 'addOperation',
                        array(
                            'operation' => 'script_replace_database_text',
                            'clientId' => $service['clientId'],
                            'serviceId' => $service['serviceId'],
                            'params' => $params
                        ));
                } else if ($services[$serviceId]['serviceName'] == 'nodes') {
                    $urlbase = $agora['server']['html'];
                    $urlbase = str_replace('http://', '://', $urlbase);
                    $urlbase = str_replace('https://', '://', $urlbase);
                    $params = array();
                    $params['origin_url'] = $urlbase . $oldDNS . '/';
                    $operation = ModUtil::apiFunc('Agoraportal', 'admin', 'addOperation',
                        array(
                            'operation' => 'script_replace_url',
                            'clientId' => $service['clientId'],
                            'serviceId' => $service['serviceId'],
                            'params' => $params
                        ));
                }
            }
        }

        return true;
    }

    /**
     * Confirm a Manager adding it to the managers group
     * @author     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return     True if the confirmation succeed and redirect
     */
    public function managerConfirm($args) {

        $groupid = UserUtil::getGroupIdList("name='Managers'");
        $users = UserUtil::getUsersForGroup($groupid);
        $userid = UserUtil::getVar('uid');
        if (in_array($userid, $users)) {
            return true;
        }

        // Security check
        if (!AgoraPortal_Util::isUser()) {
            return false;
        }

        $username = UserUtil::getVar('uname');

        $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerUName' => $username));
        // Check if the user is in the Agoraportal_client_managers table
        if (!$manager) {
            return false;
        }

        $items = array('gid' => $groupid, 'uid' => $userid);
        if (!DBUtil::insertObject($items, 'group_membership')) {
            // TODO: This message is not showing!
            return LogUtil::registerError($this->__('No s \'ha pogut habilitar el gestor'));
        }

        // TODO: This message is not showing!
        LogUtil::registerStatus($this->__('Has estat assignat com a gestor del centre '. $manager['clientCode']));
        return true;
    }

    /**
     * Select from the data base the logs that satisfy the parameters and count in how pages it'll be shown.
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  logs parameters and the number of logs per page
     * @return: all logs that satisfy the parameters, the number of logs and the number of pags
     */
    public function getLogsContent($args) {
        AgoraPortal_Util::requireClient();

        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $args['clientCode']));
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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireClient();

        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $args['clientCode']));
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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireClient();

        // get manager information
        $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerId' => $args['managerId']));
        $clientCode = $manager['clientCode'];
        // check if user can delete the manager
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        // get client managers
        $managers = ModUtil::apiFunc('Agoraportal', 'user', 'getManagers', array('clientCode' => $clientCode));

        // check if realy the user can delete de manager
        if ((!AgoraPortal_Util::isClient()) || UserUtil::getVar('uname') == $manager['managerUName']) {
            return LogUtil::registerError($this->__('No pots esborrar el gestor.'));
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
        AgoraPortal_Util::requireClient();

        $managerUName = (isset($args['managerUName'])) ? $args['managerUName'] : null;
        $clientCode = (isset($args['clientCode'])) ? $args['clientCode'] : null;

        // check if user can add a new manager
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        $canDelegate = ModUtil::apiFunc('Agoraportal', 'user', 'canDelegate', array('clientCode' => $clientCode));
        if (!$canDelegate) {
            return LogUtil::registerError($this->__('No pots crear gestors.'));
        }
        // the user delegated can't have a code username
        if (is_numeric(substr($managerUName, 1, strlen($managerUName)))) {
            return LogUtil::registerError($this->__('No pots assignar a usuaris genèrics la gestió.'));
        }
        // add the user in database
        $item = array('clientCode' => $clientCode, 'managerUName' => $managerUName);
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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireClient();

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
        AgoraPortal_Util::requireClient();

        $service = isset($args['service']) ? $args['service'] : null;
        $clientId = isset($args['clientId']) ? $args['clientId'] : null;
        $typeId = isset($args['typeId']) ? $args['typeId'] : null;
        $comments = isset($args['comments']) ? $args['comments'] : null;
        $managerid = isset($args['managerId']) ? $args['managerId'] : null;

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

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
     * Get model data
     *
     * @author Toni Ginard
     * @param int modelTypeId (optional)
     * @return array Information of the model/s
     */
    public function getModelTypes($args) {
        AgoraPortal_Util::requireUser();

        // Get optional param
        $modelTypeId = isset($args['modelTypeId']) ? $args['modelTypeId'] : '';
        $keyword = isset($args['keyword']) ? $args['keyword'] : '';

        $tables = DBUtil::getTables();
        $c = $tables['agoraportal_modelTypes_column'];

        $where = (!empty($modelTypeId)) ? " WHERE $c[modelTypeId] = $modelTypeId " : (!empty($keyword)) ? " WHERE $c[keyword] = '$keyword' " : '';

        $items = DBUtil::selectObjectArray($tables['agoraportal_modelTypes'], $where, 'shortcode', -1, -1, 'modelTypeId');

        if ($items === false) {
            return LogUtil::registerError($this->__("No s'ha pogut obtenir la informació de la taula " . $tables['agoraportal_modelTypes']));
        }

        return $items;
    }

    /**
     * Get requests description
     *
     * @author Toni Ginard
     * @param int requestTypeId (optional)
     * @return array Information of the request/s
     */
    public function getRequestTypes($args) {
        AgoraPortal_Util::requireUser();

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
        AgoraPortal_Util::requireUser();

        // Get params
        $serviceId = isset($args['serviceId']) ? $args['serviceId'] : '';
        $clientCode = isset($args['clientCode']) ? $args['clientCode'] : '';

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
     * Calculate Oracle database instance for Moodle
     *
     * @author  Toni Ginard
     * @param   int database number
     * @return  string instance name
     */
    public function calcOracleInstance($args) {
        AgoraPortal_Util::requireClient(); // Might be no necessary

        global $agora;

        $dbNumber = (int) $agora['moodle2']['dbnumber'];
        $database = (int) $args['database'];

        // If $dbNumber is not set or it is an empty string, at this point its value
        //   will be 0. In that case, no offset is applied to $agora['moodle2']['database']
        if (empty($dbNumber)) {
            return $agora['moodle2']['database'];
        }

        $offset = floor($database / 200) + (($database % 200) == 0 ? ($dbNumber - 1) : $dbNumber);
        if ($offset > 1) {
            $offset = (string) $offset; // Ensure there will not be cast issues
        } else {
            $offset = '';
        }
        return $agora['moodle2']['database'] . $offset;
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
        AgoraPortal_Util::requireClient();

        $host = isset($args['host']) ? $args['host'] : null;
        $database = isset($args['database']) ? $args['database'] : null;
        $serviceName = isset($args['serviceName']) ? $args['serviceName'] : 'intranet';
        $serviceDB = isset($args['serviceDB']) ? $args['serviceDB'] : '';
        $forceCreateDB = isset($args['forceCreateDB']) ? $args['forceCreateDB'] : 'false';

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
                $host = $agora['admin']['host'];
                $port = $agora['admin']['port'];
                $username = $agora['admin']['username'];
                $password = $agora['admin']['userpwd'];
                $connect = new mysqli($host, $username, $password, $databaseName, $port);
                if ($connect->connect_error) {
                    $error = $connect->connect_error;
                    $connect = false;
                    LogUtil::registerError($error);
                } else {
                    $connect->set_charset('utf8');
                }
                break;
            case 'intranet':
                $databaseName = $agora['intranet']['userprefix'] . $database;
                if ($clientService != false) {
                    $host = $clientService[0]['dbHost'];
                }
                $parts = explode(':', $host, 2);
                $host = $parts[0];
                $port = isset($parts[1]) ? $parts[1]: "";
                $username = $agora['intranet']['username'];
                $password = $agora['intranet']['userpwd'];
                $connect = new mysqli($host, $username, $password, $databaseName, (int)$port);
                if ($connect->connect_error) {
                    $error = $connect->connect_error;
                    $connect = false;
                    LogUtil::registerError($error);
                } else {
                    $connect->set_charset('utf8');
                }
                break;
            case 'nodes':
                $databaseName = $agora['nodes']['userprefix'] . $database;
                if ($clientService != false) {
                    $host = $clientService[0]['dbHost'];
                }
                $parts = explode(':', $host, 2);
                $host = $parts[0];
                $port = isset($parts[1]) ? $parts[1]: "";
                $username = $agora['nodes']['username'];
                $password = $agora['nodes']['userpwd'];
                $connect = new mysqli($host, $username, $password, '', (int)$port);
                if ($connect->connect_error) {
                    $error = $connect->connect_error;
                    $connect = false;
                    LogUtil::registerError($error);
                } else {
                    $connect->set_charset('utf8');
                }

                if (!$connect->select_db($databaseName)) {
                    $createDB = $this->getVar('createDB');
                    if ($forceCreateDB && $createDB) {
                        $sql = "CREATE DATABASE IF NOT EXISTS $databaseName DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
                        if (!$connect->query($sql)) {
                            LogUtil::registerError($this->__("No s'ha pogut crear la base de dades $databaseName en el servidor $host amb l'usuari " . $agora['nodes']['username']));
                            LogUtil::registerError($this->__("SQL que ha fallat: $sql"));
                            return false;
                        }
                        if (!$connect->select_db($databaseName)) {
                            LogUtil::registerError($this->__("S'ha creat la base de dades $databaseName en el servidor $host amb l'usuari " . $agora['nodes']['username'] . " però no s'ha pogut seleccionar."));
                            return false;
                        }
                    } else {
                        LogUtil::registerError($this->__("No s'ha pogut seleccionar la base de dades $databaseName en el servidor $host amb l'usuari " . $agora['nodes']['username'] . " i no s'ha intentat crear la base de dades."));
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
        AgoraPortal_Util::requireUser();

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

    /**
     * Check correct format value of school code
     *
     * @param string $clientCode
     * @return string $clientCode or bool false
     */
    public static function checkCode($code) {
        $code = trim($code);
        $pattern = '/^[abce]\d{7}$/'; // Matches a1234567
        if (preg_match($pattern, $code)) {
            return $code;
        }
        return false;
    }

    /**
     * Check if user can access to do the action
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  The code of the client
     * @return:	Real client information
     */
    public function getRealClientCode($args) {
        AgoraPortal_Util::requireUser();

        $clientCode = isset($args['clientCode']) ? $args['clientCode'] : null;

        $isAdmin = AgoraPortal_Util::isAdmin();

        if ($clientCode == null) {
            // check if user is a manager for a client
            $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerUName' => UserUtil::getVar('uname')));
            $clientCode = $manager['clientCode'];
        }

        if ($clientCode == null) {
            // Perhaps who is connected is a schoool, so client code is the username
            if (!$isAdmin) {
                $clientCode = UserUtil::getVar('uname');
            }
        }

        if ($clientCode == null) {
            if ($isAdmin) {
                return LogUtil::registerError($this->__('No s\'ha trobat el client'));
            } else {
                throw new Zikula_Exception_Forbidden();
            }
        }

        // get client for security reasons
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClients', array('init' => 0,
                    'rpp' => 50,
                    'search' => 1,
                    'returnClientCodeKey' => 1,
                    'searchText' => $clientCode));

        if (!$client) {
            if ($isAdmin) {
                return LogUtil::registerError($this->__('No s\'ha trobat el client'));
            } else {
                return LogUtil::registerError("No teniu accés a cap servei");
            }
        }

        return array('client' => $client, 'clientCode' => $clientCode);
    }

    /**
     * check if a user can delegate others to manage services and users
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The client code
     * @return: True if the user can and false otherwise
     */
    public function canDelegate($args) {
        AgoraPortal_Util::requireClient();

        $clientCode = isset($args['clientCode']) ? $args['clientCode'] : null;

        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        // get client managers
        $managers = ModUtil::apiFunc('Agoraportal', 'user', 'getManagers', array('clientCode' => $clientCode));
        // if the number of delegated users in lower than 4 and user is manager or client
        if (count($managers) < 4 && AgoraPortal_Util::isClient()) {
            return true;
        }
        // The user is the client but nobody has been delegated yet
        if (UserUtil::getVar('uname') == $clientCode && count($managers) == 0) {
            return true;
        }
        return false;
    }

    /**
     * calc the space used for a client and a service
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  service id
     * @return: The use of disk for the given service
     */
    public function calcUsedSpace($args) {
        $clientServiceId = isset($args['clientServiceId']) ? $args['clientServiceId'] : null;

        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId,
            'clientServiceId' => $clientServiceId));
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        //calc the folder use
        global $agora;

        $serviceName = $services[$client[$clientServiceId]['serviceId']]['serviceName'];

        // Get absolute path to usage file
        //$dir = $agora['server']['root'] . $agora[$serviceName]['datadir'] . $agora[$serviceName]['userprefix'] . $client[$clientServiceId]['activedId'];
        if ($serviceName == 'moodle2') {
            $dir = $agora['server']['root'] . get_filepath_moodle($client[$clientServiceId]['activedId']);
        } else {
            $dir = $agora['server']['root'] . $agora[$serviceName]['datadir'] . $agora[$serviceName]['userprefix'] . $client[$clientServiceId]['activedId'];
        }
        if (!is_dir($dir)) {
            LogUtil::registerError($this->__('No s\'ha trobat el directori ' . $dir));
            return false;
        }

        $sumatory = exec("du -sk " . $dir);
        $sumatoryString = '';
        $i = 0;
        while (is_numeric(substr($sumatory, $i, 1))) {
            $sumatoryString .= substr($sumatory, $i, 1);
            $i++;
        }

        // save value in database
        ModUtil::apiFunc('Agoraportal', 'user', 'saveDiskConsume', array('clientServiceId' => $clientServiceId,
            'diskConsume' => $sumatoryString,
        ));

        return $sumatoryString;
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
