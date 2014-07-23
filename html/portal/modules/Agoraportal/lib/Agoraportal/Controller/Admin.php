<?php

class Agoraportal_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Redirect administrators to services list
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:		Redirect user to function servicesList
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
    }

    /**
     * Display the edit form for a service
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The client-service identity and the filter values
     * @return:		The edit form
     */
    public function editService($args) {
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', isset($args['clientServiceId']) ? $args['clientServiceId'] : null, 'GET');
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'GET');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'GET');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GET');
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : 0, 'GET');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : -1, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId));
        $locations = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations');
        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');
        // check module mailer availability
        $modid = ModUtil::getIdFromName('Mailer');
        $modinfo = ModUtil::getInfo($modid);
        $mailer = ($modinfo['state'] == 3) ? true : false;

        if ($client[$clientServiceId]['diskSpace'] == 0) {
            $client[$clientServiceId]['diskSpace'] = $services[$client[$clientServiceId]['serviceId']]['defaultDiskSpace'];
        }

        $client[$clientServiceId]['annotations'] = eregi_replace("[\n|\r|\n\r]", '', $client[$clientServiceId]['annotations']);
        $client[$clientServiceId]['observations'] = eregi_replace("[\n|\r|\n\r]", '', $client[$clientServiceId]['observations']);

        return $this->view->assign('mailer', $mailer)
                        ->assign('client', $client[$clientServiceId])
                        ->assign('services', $services)
                        ->assign('init', $init)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('locations', $locations)
                        ->assign('types', $types)
                        ->assign('service', $service)
                        ->assign('stateFilter', $stateFilter)
                        ->fetch('agoraportal_admin_editService.tpl');
    }

    /**
     * Process the values received from the service edit form
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The main client and service parameters
     * @return:		An error message if fails and redirect user to function servicesList
     */
    public function updateService($args) {
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', isset($args['clientServiceId']) ? $args['clientServiceId'] : null, 'POST');
        $clientId = FormUtil::getPassedValue('clientId', isset($args['clientId']) ? $args['clientId'] : null, 'POST');
        $clientState = FormUtil::getPassedValue('clientState', isset($args['clientState']) ? $args['clientState'] : null, 'POST');
        $clientDescription = FormUtil::getPassedValue('clientDescription', isset($args['clientDescription']) ? $args['clientDescription'] : null, 'POST');
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');
        $clientDNS = FormUtil::getPassedValue('clientDNS', isset($args['clientDNS']) ? $args['clientDNS'] : null, 'POST');
        $clientName = FormUtil::getPassedValue('clientName', isset($args['clientName']) ? $args['clientName'] : null, 'POST');
        $clientAddress = FormUtil::getPassedValue('clientAddress', isset($args['clientAddress']) ? $args['clientAddress'] : null, 'POST');
        $clientCity = FormUtil::getPassedValue('clientCity', isset($args['clientCity']) ? $args['clientCity'] : null, 'POST');
        $clientPC = FormUtil::getPassedValue('clientPC', isset($args['clientPC']) ? $args['clientPC'] : null, 'POST');
        $contactName = FormUtil::getPassedValue('contactName', isset($args['contactName']) ? $args['contactName'] : null, 'POST');
        $contactMail = FormUtil::getPassedValue('contactMail', isset($args['contactMail']) ? $args['contactMail'] : null, 'POST');
        $contactProfile = FormUtil::getPassedValue('contactProfile', isset($args['contactProfile']) ? $args['contactProfile'] : null, 'POST');
        $state = FormUtil::getPassedValue('state', isset($args['state']) ? $args['state'] : null, 'POST');
        $dbHost = FormUtil::getPassedValue('dbHost', isset($args['dbHost']) ? $args['dbHost'] : null, 'POST');
        $serviceDB = FormUtil::getPassedValue('serviceDB', isset($args['serviceDB']) ? $args['serviceDB'] : null, 'POST');
        $observations = FormUtil::getPassedValue('observations', isset($args['observations']) ? $args['observations'] : null, 'POST');
        $annotations = FormUtil::getPassedValue('annotations', isset($args['annotations']) ? $args['annotations'] : null, 'POST');
        $sendMail = FormUtil::getPassedValue('sendMail', isset($args['sendMail']) ? $args['sendMail'] : null, 'POST');
        $onlyClient = FormUtil::getPassedValue('onlyClient', isset($args['onlyClient']) ? $args['onlyClient'] : 0, 'POST');
        $locationId = FormUtil::getPassedValue('locationId', isset($args['locationId']) ? $args['locationId'] : null, 'POST');
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'POST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'POST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'POST');
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : '', 'POST');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : '', 'POST');
        $typeId = FormUtil::getPassedValue('typeId', isset($args['typeId']) ? $args['typeId'] : 0, 'POST');
        $noVisible = FormUtil::getPassedValue('noVisible', isset($args['noVisible']) ? $args['noVisible'] : 0, 'POST');
        $diskSpace = FormUtil::getPassedValue('diskSpace', isset($args['diskSpace']) ? $args['diskSpace'] : 0, 'POST');
        $extraFunc = FormUtil::getPassedValue('extraFunc', isset($args['extraFunc']) ? $args['extraFunc'] : null, 'POST');
        $educat = FormUtil::getPassedValue('educat', isset($args['educat']) ? $args['educat'] : 0, 'POST');
        $educatNetwork = FormUtil::getPassedValue('educatNetwork', isset($args['educatNetwork']) ? $args['educatNetwork'] : 0, 'POST');
        $version = FormUtil::getPassedValue('version', isset($args['version']) ? $args['version'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Load general config vars
        global $agora;

        // Edit client information
        $clientEdited = ModUtil::apiFunc('Agoraportal', 'admin', 'editClient', array('clientId' => $clientId,
                    'items' => array('clientCode' => $clientCode,
                        'clientState' => $clientState,
                        'clientDescription' => $clientDescription,
                        'clientDNS' => $clientDNS,
                        'clientName' => $clientName,
                        'clientAddress' => $clientAddress,
                        'clientCity' => $clientCity,
                        'clientPC' => $clientPC,
                        'locationId' => $locationId,
                        'typeId' => $typeId,
                        'noVisible' => $noVisible,
                        'extraFunc' => $extraFunc,
                        'educat' => $educat,
                        'educatNetwork' => $educatNetwork,
                        )));

        if (!$clientEdited) {
            LogUtil::registerError($this->__('S\'ha produït un error en l\'edició del client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList', array('init' => $init,
                                'search' => $search,
                                'searchText' => $searchText,
                                'service' => $service,
                                'stateFilter' => $stateFilter)));
        }

        // Check if only editing client information (table agoraportal_clients), in that case, we're done
        if ($onlyClient == 1) {
            LogUtil::registerStatus($this->__('El client ha estat editat correctament'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList', array('init' => $init,
                                'search' => $search,
                                'searchText' => $searchText)));
        } else {
            // Get client service info (getAllClientsAndServices returns 1 row)
            $clientService = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId));
            $clientService = $clientService[$clientServiceId];

            // Get the 3 services
            $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

            // Autofill dbHost var with default values
            if ((is_null($dbHost) || empty($dbHost)) && ($services[$clientService['serviceId']]['serviceName'] == 'intranet')) {
                $dbHost = $agora['intranet']['host'];
            }

            // Create a var for admin password where to keep it in order to send it by e-mail
            $password = '';

            // If it is an activation, checks if the service exists. If not create it
            if ($state == 1) {
                if ($clientService['activedId'] == 0) {
                    $serviceName = $services[$clientService['serviceId']]['serviceName'];

                    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'activeService_' . $serviceName,
                                                array('clientServiceId' => $clientServiceId,
                                                      'dbHost' => $dbHost));
                    if (!is_array($result)) {
                        LogUtil::registerError($this->__('S\'ha produït un error en la creació del servei.'));
                        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList', array('init' => $init,
                                            'search' => $search,
                                            'searchText' => $searchText,
                                            'service' => $service,
                                            'stateFilter' => $stateFilter)));
                    } else {
                        $db = $result['db'];
                        $password = $result['password'];
                    }

                    // Get the database value depending on the service requested
                    $serviceDB = '';
                    switch ($services[$clientService['serviceId']]['serviceName']) {
                        case 'intranet':
                            $database = ($db) ? $agora['intranet']['userprefix'] . $db : '';
                            break;
                        case 'nodes':
                            $database = ($db) ? $agora['nodes']['userprefix'] . $db : '';
                            break;
                        case 'moodle2':
                            $database = ModUtil::apiFunc('Agoraportal', 'user', 'calcOracleInstance', array('database' => $db));
                            $serviceDB = $database;
                            break;
                        case 'marsupial':
                            $database = 1;
                            break;
                    }

                    // edit service information
                    $clientServiceEdited = ModUtil::apiFunc('Agoraportal', 'admin', 'editService', array('clientServiceId' => $clientServiceId,
                                'items' => array('serviceDB' => $database,
                                    'timeCreated' => time(),
                                    'activedId' => $db,
                                    'dbHost' => $dbHost,
                                    )));

                    if ($clientServiceEdited) {
                        // insert the action in logs table
                        ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('clientCode' => $clientCode,
                            'actionCode' => 2,
                            'action' => $this->__f('S\'ha aprovat la sol·licitud del servei %s', $services[$clientService['serviceId']]['serviceName'])));
                    } else {
                        LogUtil::registerError($this->__('Error en l\'edició del registre'));
                        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList', array('init' => $init,
                                            'search' => $search,
                                            'searchText' => $searchText,
                                            'service' => $service,
                                            'stateFilter' => $stateFilter,
                                        )));
                    }
                }
            }

            // Deny the new service
            if ($state == -2) {
                // Insert the action in logs table
                ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 2,
                    'action' => $this->__f('S\'ha denegat el servei %s', $services[$clientService['serviceId']]['serviceName'])));
            }

            // Withdraw the service
            if ($state == -3) {
                // edit service information and delete the database assigned
                $clientServiceEdited = ModUtil::apiFunc('Agoraportal', 'admin', 'editService', array('clientServiceId' => $clientServiceId,
                            'items' => array('serviceDB' => '',
                                'activedId' => '')));
                // Insert the action in logs table
                ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 2,
                    'action' => $this->__f('S\'ha donat de baixa el servei %s', $services[$clientService['serviceId']]['serviceName'])));
            }

            // Deactivate the new service
            if ($state == -4) {
                // Insert the action in logs table
                ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 2,
                    'action' => $this->__f('S\'ha desactivat el servei %s', $services[$clientService['serviceId']]['serviceName'])));
            }

            // This call activates the service
            $clientServiceEdited1 = ModUtil::apiFunc('Agoraportal', 'admin', 'editService', array('clientServiceId' => $clientServiceId,
                        'items' => array('state' => $state,
                            'contactName' => $contactName,
                            'contactMail' => $contactMail,
                            'contactProfile' => $contactProfile,
                            'observations' => $observations,
                            'annotations' => $annotations,
                            'dbHost' => $dbHost,
                            'serviceDB' => $serviceDB,
                            'diskSpace' => $diskSpace,
                            'timeEdited' => time(),
                            'version' => $version,
                            )));

            // the activation has failed
            if (!$clientServiceEdited1) {
                LogUtil::registerError($this->__('Error en la modificació de les taules de la base de dades'));
                return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList', array('init' => $init,
                                    'search' => $search,
                                    'searchText' => $searchText,
                                    'service' => $service,
                                    'stateFilter' => $stateFilter)));
            }

            // send informational mail if it is necessary
            // check if module mailer is active
            $modinfo = ModUtil::getInfo(ModUtil::getIdFromName('Mailer'));
            if ($modinfo['state'] == 3 && $sendMail == 1) {
                // We need to know service base URL
                $mailContent = $this->view->assign('baseURL', $agora['server']['server'] . $agora['server']['base'])
                        ->assign('baseURLMarsupial', $agora['server']['marsupial'] . $agora['server']['base'])
                        ->assign('serviceName', $services[$clientService['serviceId']]['serviceName'])
                        ->assign('clientName', $clientName)
                        ->assign('clientDNS', $clientDNS)
                        ->assign('observations', $observations)
                        ->assign('state', $state)
                        ->assign('userName', $contactName)
                        ->assign('password', $password)
                        ->fetch('agoraportal_admin_sendMail.tpl');

                // get client's email (a8000001@xtec.cat)
                $uidClient = UserUtil::getIdFromName($clientCode);
                $clientVars = UserUtil::getVars($uidClient);

                // Send e-mail to client code
                $toUsers = array($clientVars['email']);

                // Get all managers
                $managers = ModUtil::apiFunc('Agoraportal', 'admin', 'getManagers', array('clientCode' => $clientCode));
                // Add managers to destination
                foreach ($managers as $manager) {
                    $toManagers[] = $manager['email'];
                }
                $toUsers = array_merge($toUsers, $toManagers);

                // Send the e-mail (BCC to site e-mail)
                $sendMail = ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array('toname' => array($clientName),
                            'toaddress' => $toUsers,
                            'subject' => __('Estat dels serveis del centre a Àgora'),
                            'bcc' => array(array('address' => System::getVar('adminmail'))),
                            'body' => $mailContent,
                            'html' => 1));

                if ($sendMail) {
                    LogUtil::registerStatus($this->__('S\'ha enviat un missatge informatiu al codi de centre i als gestors'));
                }
            }

            LogUtil::registerStatus($this->__('El client i el servei s\'han modificat correctament'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList', array('init' => $init,
                                'search' => $search,
                                'searchText' => $searchText,
                                'service' => $service,
                                'stateFilter' => $stateFilter)));
        }
    }

    /**
     * Display the edit form for a client
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The main client parameters
     * @return:		The edit form
     */
    public function editClient($args) {
        $clientId = FormUtil::getPassedValue('clientId', isset($args['clientId']) ? $args['clientId'] : null, 'GET');
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'GET');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'GET');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClients', array('clientId' => $clientId));
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }
        $locations = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations');
        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');

        return $this->view->assign('client', $client[$clientId])
                        ->assign('locations', $locations)
                        ->assign('types', $types)
                        ->assign('init', $init)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->fetch('agoraportal_admin_editClient.tpl');
    }

    /**
     * Delete a client and all the services associated with the client
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The client identity
     * @return:		An error message if fails and redirect user to function clientList
     */
    public function deleteClient($args) {
        $clientId = FormUtil::getPassedValue('clientId', isset($args['clientId']) ? $args['clientId'] : null, 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // get client information
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClients', array('clientId' => $clientId));
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }
        if (!$confirm) {
            // get client services
            $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                        'rpp' => 50,
                        'service' => 0,
                        'state' => -1,
                        'search' => 1,
                        'searchText' => $client[$clientId]['clientCode']));
            $activedServices = array();
            foreach ($clientInfo as $info) {
                $activedServices[] = $info['serviceId'];
            }
            //get services
            $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

            return $this->view->assign('client', $client[$clientId])
                            ->assign('services', $services)
                            ->assign('activedServices', $activedServices)
                            ->fetch('agoraportal_admin_deleteClient.tpl');
        }
        // the client deletion has been confirmed
        // Confirm authorisation code
        $this->checkCsrfToken();
        // TODO:
        //CONTINUAR AQUÍ
        // delete client's services
        // delete client's lines in Oracle tables for validation
        // delete client's users table
        // delete client's groups
        // delete client as user
        // delete client files information
        LogUtil::registerStatus($this->__('El client i tota la informació asociada ha estat esborrada'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
    }

    /**
     * Delete a service
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The client-service identity
     * @return:		An error message if fails and redirect user to function servicesList
     */
    public function deleteService($args) {
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', isset($args['clientServiceId']) ? $args['clientServiceId'] : null, 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // get client information
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId));
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el servei'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }
        // get all the services
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        if (!$confirm) {
            return $this->view->assign('client', $client[$clientServiceId])
                            ->assign('services', $services)
                            ->fetch('agoraportal_admin_deleteService.tpl');
        }
        // the client deletion has been confirmed
        // Confirm authorisation code
        $this->checkCsrfToken();

        if (!ModUtil::apiFunc('Agoraportal', 'admin', 'deleteService', array('clientServiceId' => $clientServiceId))) {
            LogUtil::registerError($this->__('L\'esborrament ha fallat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        }
        // insert the action in logs table
        ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('clientCode' => $client[$clientServiceId]['clientCode'],
            'actionCode' => 3,
            'action' => $this->__f('S\'ha esborrat el servei %s', $services[$client[$clientServiceId]['serviceId']]['serviceName'])));
        LogUtil::registerStatus($this->__('El servei ha estat esborrat'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
    }

    /**
     * Display the list of services associated with clients
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		The services list page
     */
    public function servicesList($args) {
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'GETPOST');
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : 0, 'GETPOST');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : 0, 'GETPOST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 0, 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'GETPOST');

        if (SessionUtil::getVar('navState')) {
            $stateArray = unserialize(SessionUtil::getVar('navState'));
            $init = $stateArray['init'];
            $service = $stateArray['service'];
            $stateFilter = $stateArray['stateFilter'];
            $search = $stateArray['search'];
            $searchText = $stateArray['searchText'];
            $rpp = $stateArray['rpp'];
        }

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $servicesListContent = ModUtil::func('Agoraportal', 'admin', 'servicesListContent', array('init' => $init,
                    'search' => $search,
                    'searchText' => trim($searchText),
                    'stateFilter' => $stateFilter,
                    'service' => $service,
                    'rpp' => $rpp,
                ));

        return $this->view->assign('servicesListContent', $servicesListContent)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('service', $service)
                        ->assign('stateFilter', $stateFilter)
                        ->assign('rpp', $rpp)
                        ->fetch('agoraportal_admin_servicesList.tpl');
    }

    /**
     * Get the list of services associated with clients
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		An array with all the clients and services
     */
    public function servicesListContent($args) {
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'POST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'POST');
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : '0', 'POST');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : 0, 'POST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 1, 'POST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : null, 'POST');
        $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : 2, 'POST');

        // Escape special chars
        $searchText = addslashes($searchText);

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => $init,
                    'rpp' => $rpp,
                    'service' => $service,
                    'state' => $stateFilter,
                    'search' => $search,
                    'order' => $order,
                    'searchText' => $searchText));
        foreach ($clients as $client) {
            if ($services[$client['serviceId']]['serviceName'] == 'marsupial') {
                $clients[$client['clientServiceId']]['haveMoodle'] = (ModUtil::apiFunc('Agoraportal', 'user', 'existsServiceInClient', array('clientCode' => $client['clientCode'], 'serviceName' => 'moodle2'))) ? true : false;
            } else {
                $clients[$client['clientServiceId']]['haveMoodle'] = false;
            }
            $clients[$client['clientServiceId']]['diskConsume'] = round($client['diskConsume'] / 1024, 2);
            $clients[$client['clientServiceId']]['diskConsumePerCent'] = ($clients[$client['clientServiceId']]['diskSpace'] > 0) ? round(($clients[$client['clientServiceId']]['diskConsume'] / $clients[$client['clientServiceId']]['diskSpace']) * 100, 2) : 0;
            if ($clients[$client['clientServiceId']]['diskSpace'] > 0) {
                if ($clients[$client['clientServiceId']]['diskConsumePerCent'] < 70) {
                    $color = '#D0FFD0';
                } elseif ($clients[$client['clientServiceId']]['diskConsumePerCent'] >= 70 && $clients[$client['clientServiceId']]['diskConsumePerCent'] < 97) {
                    $color = '#FFFFD0';
                } else {
                    $color = '#FFD0D0';
                }
            } else
                $color = 'none';
            $clients[$client['clientServiceId']]['diskConsumeCellColor'] = $color;
        }

        $clientsArray = $clients;
        $clientsNumber = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('onlyNumber' => 1,
                    'service' => $service,
                    'state' => $stateFilter,
                    'search' => $search,
                    'order' => $order,
                    'searchText' => $searchText));
        $pager = ModUtil::func('Agoraportal', 'admin', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $clientsNumber,
                    'urltemplate' => "javascript:servicesList($service,$stateFilter,$search,'$searchText',$order,%%,$rpp)"));
        $locations = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations');
        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');

        return $this->view->assign('clients', $clientsArray)
                        ->assign('services', $services)
                        ->assign('pager', $pager)
                        ->assign('clientsNumber', $clientsNumber)
                        ->assign('locations', $locations)
                        ->assign('types', $types)
                        ->assign('init', $init)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('service', $service)
                        ->assign('order', $order)
                        ->assign('stateFilter', $stateFilter)
                        ->assign('siteBaseURL', ModUtil::getVar('Agoraportal', 'siteBaseURL'))
                        ->fetch('agoraportal_admin_servicesListContent.tpl');
    }

    /**
     * Display the list of clients
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		The clients' list page
     */
    public function clientsList($args) {
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'GETPOST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientsListContent = ModUtil::func('Agoraportal', 'admin', 'clientsListContent', array('init' => $init,
                    'search' => $search,
                    'searchText' => $searchText));

        return $this->view->assign('clientsListContent', $clientsListContent)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->fetch('agoraportal_admin_clientsList.tpl');
    }

    /**
     * Get the list of services associated with clients
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		An array with all the clients information
     */
    public function clientsListContent($args) {
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'POST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'POST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : null, 'POST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClients', array('init' => $init,
                    'rpp' => $rpp,
                    'search' => $search,
                    'searchText' => $searchText));

        $locations = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations');
        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');
        $clientsNumber = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClients', array('onlyNumber' => 1,
                    'search' => $search,
                    'searchText' => $searchText));
        $pager = ModUtil::func('Agoraportal', 'admin', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $clientsNumber,
                    'urltemplate' => "javascript:clientsList('$search','$searchText',%%)"));



        return $this->view->assign('clients', $clients)
                        ->assign('init', $init)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('pager', $pager)
                        ->assign('clientsNumber', $clientsNumber)
                        ->assign('locations', $locations)
                        ->assign('types', $types)
                        ->fetch('agoraportal_admin_clientsListContent.tpl');
    }

    /**
     * Diplay the form needed to create a new client
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The main client parameters
     * @return:		The form fields
     */
    public function newClient($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GETPOST');
        $clientName = FormUtil::getPassedValue('clientName', isset($args['clientName']) ? $args['clientName'] : null, 'GETPOST');
        $clientDNS = FormUtil::getPassedValue('clientDNS', isset($args['clientDNS']) ? $args['clientDNS'] : null, 'GETPOST');
        $clientAddress = FormUtil::getPassedValue('clientAddress', isset($args['clientAddress']) ? $args['clientAddress'] : null, 'GETPOST');
        $clientCity = FormUtil::getPassedValue('clientCity', isset($args['clientCity']) ? $args['clientCity'] : null, 'GETPOST');
        $clientPC = FormUtil::getPassedValue('clientPC', isset($args['clientPC']) ? $args['clientPC'] : null, 'GETPOST');
        $clientDescription = FormUtil::getPassedValue('clientDescription', isset($args['clientDescription']) ? $args['clientDescription'] : null, 'GETPOST');
        $clientState = FormUtil::getPassedValue('clientState', isset($args['clientState']) ? $args['clientState'] : 0, 'GETPOST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $client = array('clientCode' => $clientCode,
            'clientName' => $clientName,
            'clientDNS' => $clientDNS,
            'clientAddress' => $clientAddress,
            'clientCity' => $clientCity,
            'clientPC' => $clientPC,
            'clientState' => $clientState,
            'clientDescription' => $clientDescription);
        // Create output object
        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('client', $client);
        return $view->fetch('agoraportal_admin_newClient.tpl');
    }

    /**
     * Create a new client using the values received from the form
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The main client parameters
     * @return:		An error message if fails and redirect user to clients' list
     */
    public function createClient($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');
        $clientName = FormUtil::getPassedValue('clientName', isset($args['clientName']) ? $args['clientName'] : null, 'POST');
        $clientDNS = FormUtil::getPassedValue('clientDNS', isset($args['clientDNS']) ? $args['clientDNS'] : null, 'POST');
        $clientAddress = FormUtil::getPassedValue('clientAddress', isset($args['clientAddress']) ? $args['clientAddress'] : null, 'POST');
        $clientCity = FormUtil::getPassedValue('clientCity', isset($args['clientCity']) ? $args['clientCity'] : null, 'POST');
        $clientPC = FormUtil::getPassedValue('clientPC', isset($args['clientPC']) ? $args['clientPC'] : null, 'POST');
        $clientDescription = FormUtil::getPassedValue('clientDescription', isset($args['clientDescription']) ? $args['clientDescription'] : null, 'POST');
        $clientState = FormUtil::getPassedValue('clientState', isset($args['clientState']) ? $args['clientState'] : 0, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // check if all the values are correct
        if ($clientCode == '' || $clientName == '' || $clientDNS == '' || $clientAddress == '' || $clientCity == '' || $clientPC == '') {
            LogUtil::registerError($this->__('Hi ha valors del formulari que no has completat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'newClient', array('clientCode' => $clientCode,
                                'clientName' => $clientName,
                                'clientDNS' => $clientDNS,
                                'clientAddress' => $clientAddress,
                                'clientCity' => $clientCity,
                                'clientPC' => $clientPC,
                                'clientState' => $clientState,
                                'clientDescription' => $clientDescription)));
        }
        // The client code must be a site user
        $uid = UserUtil::getIdFromName($clientCode);
        if (!$uid) {
            LogUtil::registerError($this->__('El codi del client ha de coincidir amb el nom d\'usuari/ària d\'un usuari/ària del portal'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'newClient', array('clientCode' => $clientCode,
                                'clientName' => $clientName,
                                'clientDNS' => $clientDNS,
                                'clientAddress' => $clientAddress,
                                'clientCity' => $clientCity,
                                'clientPC' => $clientPC,
                                'clientState' => $clientState,
                                'clientDescription' => $clientDescription)));
        }

        //create client in database
        $created = ModUtil::apiFunc('Agoraportal', 'admin', 'createClient', array('clientCode' => $clientCode,
                    'clientName' => $clientName,
                    'clientDNS' => $clientDNS,
                    'clientAddress' => $clientAddress,
                    'clientCity' => $clientCity,
                    'clientPC' => $clientPC,
                    'clientState' => $clientState,
                    'clientDescription' => $clientDescription));
        if (!$created) {
            LogUtil::registerError($this->__('La creació del client ha fallat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }
        // success
        LogUtil::registerStatus($this->__('El client s\'ha creat correctament'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
    }

    /**
     * Display the maintain tools available for a given service and proceed to use a tool
     *  Code values for action:
     *      1 - Create or delete Moodle super administrator
     *      2 - Connect Zikula and Moodle
     *      3 - Create or delete Zikula super administrator
     *      4 - Create the first administrator permission
     *      5 - Desactivate all the intranet blocks
     *      6 - Recalculate disk usage for moodle
     *      7 - Recalculate disk usage for intranet
     *
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The client-service identity and the action that must be done
     * @return:		An success message if success and error message if fails. Redirect user to clients' list
     */
    public function serviceTools($args) {
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', isset($args['clientServiceId']) ? $args['clientServiceId'] : null, 'GETPOST');
        $action = FormUtil::getPassedValue('action', isset($args['action']) ? $args['action'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // get client information
        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId));
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el servei'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }

        if ($action == null) {
            $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
            return $this->view->assign('client', $client[$clientServiceId])
                            ->assign('services', $services)
                            ->fetch('agoraportal_admin_serviceTools.tpl');
        }

        //do the action
        if (!ModUtil::apiFunc('Agoraportal', 'admin', 'executeAction', array('clientServiceId' => $clientServiceId,
                    'action' => $action))) {
            LogUtil::registerError($this->__('S\'ha produït un error en executar l\'acció'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'serviceTools', array('clientServiceId' => $clientServiceId)));
        }

        LogUtil::registerStatus($this->__('L\'acció s\'ha executat amb èxit'));

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'serviceTools', array('clientServiceId' => $clientServiceId)));
    }

    /**
     * Display the module configuration form
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:		The form fields
     */
    public function config() {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $locations = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations');
        $schooltypes = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');
        $requesttypes = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes');
        $requesttypesservices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypesServices');

        return $this->view->assign('siteBaseURL', $this->getVar('siteBaseURL'))
                        ->assign('allowedIpsForCalcDisckConsume', $this->getVar('allowedIpsForCalcDisckConsume'))
                        ->assign('warningMailsTo', $this->getVar('warningMailsTo'))
                        ->assign('requestMailsTo', $this->getVar('requestMailsTo'))
                        ->assign('diskRequestThreshold', $this->getVar('diskRequestThreshold'))
                        ->assign('clientsMailThreshold', $this->getVar('clientsMailThreshold'))
                        ->assign('maxAbsFreeQuota', $this->getVar('maxAbsFreeQuota'))
                        ->assign('maxFreeQuotaForRequest', $this->getVar('maxFreeQuotaForRequest'))
                        ->assign('locations', $locations)
                        ->assign('schooltypes', $schooltypes)
                        ->assign('requesttypes', $requesttypes)
                        ->assign('requesttypesservices', $requesttypesservices)
                        ->fetch('agoraportal_admin_config.tpl');
    }

    /**
     * Update the configuration parameters received from the form
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The confurable parameters
     * @return:		A success or an error message and redirect user to clients' list
     */
    public function updateConfig($args) {
        $siteBaseURL = FormUtil::getPassedValue('siteBaseURL', isset($args['siteBaseURL']) ? $args['siteBaseURL'] : null, 'POST');
        $allowedIpsForCalcDisckConsume = FormUtil::getPassedValue('allowedIpsForCalcDisckConsume', isset($args['allowedIpsForCalcDisckConsume']) ? $args['allowedIpsForCalcDisckConsume'] : null, 'POST');
        $warningMailsTo = FormUtil::getPassedValue('warningMailsTo', isset($args['warningMailsTo']) ? $args['warningMailsTo'] : null, 'POST');
        $requestMailsTo = FormUtil::getPassedValue('requestMailsTo', isset($args['requestMailsTo']) ? $args['requestMailsTo'] : null, 'POST');
        $diskRequestThreshold = FormUtil::getPassedValue('diskRequestThreshold', isset($args['diskRequestThreshold']) ? $args['diskRequestThreshold'] : null, 'POST');
        $clientsMailThreshold = FormUtil::getPassedValue('clientsMailThreshold', isset($args['clientsMailThreshold']) ? $args['clientsMailThreshold'] : null, 'POST');
        $maxAbsFreeQuota = FormUtil::getPassedValue('maxAbsFreeQuota', isset($args['maxAbsFreeQuota']) ? $args['maxAbsFreeQuota'] : null, 'POST');
        $maxFreeQuotaForRequest = FormUtil::getPassedValue('maxFreeQuotaForRequest', isset($args['maxFreeQuotaForRequest']) ? $args['maxFreeQuotaForRequest'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $this->setVar('siteBaseURL', $siteBaseURL)
                ->setVar('allowedIpsForCalcDisckConsume', $allowedIpsForCalcDisckConsume)
                ->setVar('warningMailsTo', $warningMailsTo)
                ->setVar('requestMailsTo', $requestMailsTo)
                ->setVar('diskRequestThreshold', $diskRequestThreshold)
                ->setVar('clientsMailThreshold', $clientsMailThreshold)
                ->setVar('maxAbsFreeQuota', $maxAbsFreeQuota)
                ->setVar('maxFreeQuotaForRequest', $maxFreeQuotaForRequest);

        LogUtil::registerStatus($this->__('S\'ha modificat la configuració'));

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Display a pager in the clients and the services lists
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The pager main parameters
     * @return:		The pager code
     */
    public function pager($args) {
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'POST');
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : null, 'POST');
        $total = FormUtil::getPassedValue('total', isset($args['total']) ? $args['total'] : null, 'POST');
        $urltemplate = FormUtil::getPassedValue('urltemplate', isset($args['urltemplate']) ? $args['urltemplate'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        if ($total <= $rpp) {
            return '';
        }
        // Quick check to ensure that we have work to do
        if ($total <= $rpp) {
            //return;
        }
        if (!isset($init) || empty($init)) {
            $init = 1;
        }
        if (!isset($rpp) || empty($rpp)) {
            $rpp = 10;
        }
        // Show startnum link
        if ($init != 1) {
            $url = preg_replace('/%%/', 1, $urltemplate);
            $text = '<a href="' . $url . '"><<</a> | ';
        } else {
            $text = '<< | ';
        }
        $items[] = array('text' => $text);
        // Show following items
        $pagenum = 1;
        for ($curnum = 1; $curnum <= $total; $curnum += $rpp) {
            if (($init < $curnum) || ($init > ($curnum + $rpp - 1))) {
                //mod by marsu - use sliding window for pagelinks
                if ((($pagenum % 10) == 0) // link if page is multiple of 10
                        || ($pagenum == 1) // link first page
                        || (($curnum > ($init - 4 * $rpp)) //link -3 and +3 pages
                        && ($curnum < ($init + 4 * $rpp)))
                ) {
                    // Not on this page - show link
                    $url = preg_replace('/%%/', $curnum, $urltemplate);
                    $text = '<a href="' . $url . '">' . $pagenum . '</a> | ';
                    $items[] = array('text' => $text);
                }
                //end mod by marsu
            } else {
                // On this page - show text
                $text = $pagenum . ' | ';
                $items[] = array('text' => $text);
            }
            $pagenum++;
        }
        if (($curnum >= $rpp + 1) && ($init < $curnum - $rpp)) {
            $url = preg_replace('/%%/', $curnum - $rpp, $urltemplate);
            $text = '<a href="' . $url . '">>></a>';
        } else {
            $text = '>>';
        }
        $items[] = array('text' => $text);

        return $this->view->assign('items', $items)
                        ->assign('total', $total)
                        ->fetch('agoraportal_admin_pager.tpl');
    }

    /**
     * Display a available services
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:		An array with the available services
     */
    public function services() {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        global $agora;
        // get services
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        foreach ($services as $service) {
            $validFolder = false;
            $folder = (isset($agora[$service['serviceName']]['datadir'])) ? $agora[$service['serviceName']]['datadir'] : '';
            $services[$service['serviceId']]['serverFolder'] = $folder;
            if (file_exists('../../' . $folder)) {
                $validFolder = true;
            }
            $services[$service['serviceId']]['validFolder'] = $validFolder;
            $services[$service['serviceId']]['tablesPrefix'] = (isset($agora[$service['serviceName']]['prefix'])) ? $agora[$service['serviceName']]['prefix'] : '';
        }

        return $this->view->assign('services', $services)
                        ->fetch('agoraportal_admin_services.tpl');
    }

    /**
     * Edit a location
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The location identity
     * @return:		An array with the available services
     */
    public function editLocation($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $locationId = FormUtil::getPassedValue('locationId', isset($args['locationId']) ? $args['locationId'] : null, 'GETPOST');
        $locationName = FormUtil::getPassedValue('locationName', isset($args['locationName']) ? $args['locationName'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            $location = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations', array('locationId' => $locationId));
            return $this->view->assign('location', $location[$locationId])
                            ->fetch('agoraportal_admin_editLocation.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'editLocation', array('locationId' => $locationId,
                    'locationName' => $locationName))) {
            LogUtil::registerStatus($this->__('El Servei Territorial s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar el nom del Servei Territorial'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Edit a request type
     * @author:		Aida Regi Cosculluela (aregi@xtec.cat)
     * @param:		The request type information
     * @return:		The request type updated
     */
    public function editRequestType($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', isset($args['requestTypeId']) ? $args['requestTypeId'] : null, 'GETPOST');
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', isset($args['requestTypeId']) ? $args['requestTypeId'] : null, 'GETPOST');
        $requestTypeName = FormUtil::getPassedValue('requestTypeName', isset($args['requestTypeName']) ? $args['requestTypeName'] : null, 'POST');
        $requestTypeDescription = FormUtil::getPassedValue('requestTypeDescription', isset($args['requestTypeDescription']) ? $args['requestTypeDescription'] : null, 'POST');
        $requestTypeUserCommentsText = FormUtil::getPassedValue('requestTypeUserCommentsText', isset($args['requestTypeUserCommentsText']) ? $args['requestTypeUserCommentsText'] : null, 'POST');

        $locationName = FormUtil::getPassedValue('locationName', isset($args['locationName']) ? $args['locationName'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            $requestType = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes', array('requestTypeId' => $requestTypeId));

            $view = Zikula_View::getInstance('Agoraportal', false);
            $view->assign('requestType', $requestType[$requestTypeId]);
            return $view->fetch('agoraportal_admin_editRequestType.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'editRequestType', array('requestTypeId' => $requestTypeId, 'requestTypeName' => $requestTypeName, 'requestTypeDescription' => $requestTypeDescription, 'requestTypeUserCommentsText' => $requestTypeUserCommentsText))) {
            LogUtil::registerStatus($this->__('El tipus de sol·licitud s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar el tipus de sol·lcitud'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Edit a location
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The type identity
     * @return:		An array with the available services
     */
    public function editType($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $typeId = FormUtil::getPassedValue('typeId', isset($args['typeId']) ? $args['typeId'] : null, 'GETPOST');
        $typeName = FormUtil::getPassedValue('typeName', isset($args['typeName']) ? $args['typeName'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            $type = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes', array('typeId' => $typeId));
            $view = Zikula_View::getInstance('Agoraportal', false);
            $view->assign('type', $type[$typeId]);
            return $view->fetch('agoraportal_admin_editType.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'editType', array('typeId' => $typeId,
                    'typeName' => $typeName))) {
            LogUtil::registerStatus($this->__('La tipologia de client s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar el nom de la tipologia'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Create a new location
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The location main values
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewLocation($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $locationName = FormUtil::getPassedValue('locationName', isset($args['locationName']) ? $args['locationName'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            return $this->view->fetch('agoraportal_admin_addNewLocation.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'addNewLocation', array('locationName' => $locationName))) {
            LogUtil::registerStatus($this->__('S\'ha creat un Servei Territorial nou'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en la creació del Servei Territorial'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Create a new relation between a request type and  a service
     * @author:		Aida Regi Cosculluela (aregi@xtec.cat)
     * @param:		Request type and service identifications
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewRequestTypeService($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $serviceid = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : null, 'POST');
        $requesttypeid = FormUtil::getPassedValue('requesttype', isset($args['requesttype']) ? $args['requesttype'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            $requestType = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes');
            $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
            return $this->view->assign('requestType', $requestType)
                            ->assign('services', $services)
                            ->fetch('agoraportal_admin_addNewRequestTypeService.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'addNewRequestTypeService', array('requestTypeId' => $requesttypeid, 'serviceId' => $serviceid))) {
            LogUtil::registerStatus($this->__('S\'ha creat un nou tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en la creació del tipus de sol·licitud'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Create a new request type
     * @author:		Aida Regi Cosculluela (aregi@xtec.cat)
     * @param:		The request type main values
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewRequestType($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $requestTypeName = FormUtil::getPassedValue('requestTypeName', isset($args['requestTypeName']) ? $args['requestTypeName'] : null, 'POST');
        $requestTypeDescription = FormUtil::getPassedValue('requestTypeDescription', isset($args['requestTypeDescription']) ? $args['requestTypeDescription'] : null, 'POST');
        $requestTypeUserCommentsText = FormUtil::getPassedValue('requestTypeUserCommentsText', isset($args['requestTypeUserCommentsText']) ? $args['requestTypeUserCommentsText'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            return $this->view->fetch('agoraportal_admin_addNewRequestType.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'addNewRequestType', array('requestTypeName' => $requestTypeName, 'requestTypeDescription' => $requestTypeDescription, 'requestTypeUserCommentsText' => $requestTypeUserCommentsText))) {
            LogUtil::registerStatus($this->__('S\'ha creat un nou tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en la creació del tipus de sol·licitud'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Create a new client type
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The types main values
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewType($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $typeName = FormUtil::getPassedValue('typeName', isset($args['typeName']) ? $args['typeName'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            return $this->view->fetch('agoraportal_admin_addNewType.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'addNewType', array('typeName' => $typeName))) {
            LogUtil::registerStatus($this->__('S\'ha una tipologia de client nova'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en la creació d\'una tipologia de client'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Delete a given location
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The location identity and name
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function deleteLocation($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $locationId = FormUtil::getPassedValue('locationId', isset($args['locationId']) ? $args['locationId'] : null, 'GETPOST');
        $locationName = FormUtil::getPassedValue('locationName', isset($args['locationName']) ? $args['locationName'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            $location = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations', array('locationId' => $locationId));
            return $this->view->assign('location', $location[$locationId])
                            ->fetch('agoraportal_admin_deleteLocation.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'deleteLocation', array('locationId' => $locationId))) {
            LogUtil::registerStatus($this->__('S\'ha esborrat el Servei Territorial'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el Servei Territorial'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Delete a given relation between a request type and a service
     * @author:		Aida Regi Cosculluela (aregi@xtec.cat)
     * @param:		The request type and service identity 
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function deleteRequestTypeService($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', isset($args['requestTypeId']) ? $args['requestTypeId'] : null, 'GETPOST');
        $serviceid = FormUtil::getPassedValue('serviceId', isset($args['serviceId']) ? $args['serviceId'] : null, 'GETPOST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            $requestType = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypesServices', array('requestTypeId' => $requestTypeId,
                        'serviceId' => $serviceid));
            return $this->view->assign('requestType', $requestType['0'])
                            ->fetch('agoraportal_admin_deleteRequestTypeService.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'deleteRequestTypeService', array('requestTypeId' => $requestTypeId,
                    'serviceId' => $serviceid))) {
            LogUtil::registerStatus($this->__('S\'ha esborrat el tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el tipus de sol·licitud'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Delete a given request type
     * @author:		Aida Regi Cosculluela (aregi@xtec.cat)
     * @param:		The request type identity 
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function deleteRequestType($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', isset($args['requestTypeId']) ? $args['requestTypeId'] : null, 'GETPOST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            $requestType = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes', array('requestTypeId' => $requestTypeId));

            return $this->view->assign('requestType', $requestType[$requestTypeId])
                            ->fetch('agoraportal_admin_deleteRequestType.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'deleteRequestType', array('requestTypeId' => $requestTypeId))) {
            LogUtil::registerStatus($this->__('S\'ha esborrat el tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el tipus de sol·licitud'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Delete a given client type
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The type identity and name
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function deleteType($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $typeId = FormUtil::getPassedValue('typeId', isset($args['typeId']) ? $args['typeId'] : null, 'GETPOST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($confirmation == null) {
            $type = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes', array('typeId' => $typeId));
            return $this->view->assign('type', $type[$typeId])
                            ->fetch('agoraportal_admin_deleteType.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'deleteType', array('typeId' => $typeId))) {
            LogUtil::registerStatus($this->__('S\'ha esborrat la tipologia de client'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar la tipologia'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Display a form that allows you to execute SQL
     * @author  Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param   array clients_sel
     * @param   $which
     * @param   $sqlfunc
     * @param   int service_sel     Id of the selected service
     * @return  Rendering of the page
     */
    public function sql($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $clients_sel = FormUtil::getPassedValue('clients_sel', isset($args['clients_sel']) ? $args['servicesListContent'] : null, 'GETPOST');
        $which = FormUtil::getPassedValue('which', isset($args['which']) ? $args['which'] : "all", 'GETPOST');
        $sqlfunc = FormUtil::getPassedValue('sqlfunction', isset($args['sqlfunction']) ? $args['sqlfunction'] : null, 'GETPOST');
        $service_sel = FormUtil::getPassedValue('service_sel', isset($args['service_sel']) ? $args['service_sel'] : '2', 'GETPOST');

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('which', $which);
        $view->assign('sqlfunc', $sqlfunc);
        $view->assign('service_sel', $service_sel);

        $ask = FormUtil::getPassedValue('ask', isset($args['ask']) ? $args['ask'] : null, 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'GETPOST');
        if (!empty($ask)) {
            $action = 'ask';
        } else if (!empty($confirm)) {
            $action = 'exe';
        }

        if (isset($action) && ( empty($sqlfunc) || ($which == "selected" && empty($clients_sel)) || $service_sel === false)) {
            LogUtil::registerError($this->__('Heu d\'emplenar tots els camps'));
            $action = "show";
        }

        $sqlfunc_low = strtolower($sqlfunc);
        if ((strpos($sqlfunc_low, "delete") !== false || strpos($sqlfunc_low, "update") !== false) && strpos($sqlfunc_low, "where") === false) {
            LogUtil::registerError($this->__('L\'operació necessita la clàusula where'));
            $action = "show";
        }

        $comands = ModUtil::func('Agoraportal', 'admin', 'sqlComandList', array('serviceId' => $service_sel));

        if (isset($action) && ($action == "ask" || $action == "exe")) {
            // Initialization
            $serviceName = '';
            $sqlClients = '';
            
            // Common parts on ask and execute
            if ($service_sel == 0) {
                // Exception for portal. Is not a multisite service
                $serviceName = 'portal';
                // Dummy array. Required by foreach loop
                $sqlClients = array('0' => array('dbHost' => '', 'serviceDB' => ''));
            } else {
                $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
                $serviceName = $services[$service_sel]['serviceName'];

                $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 1, //Default
                            'rpp' => 0, //No pages
                            'service' => $service_sel,
                            'state' => 1, //Active
                        ));

                if ($which == 'selected') {
                    $sqlClients = Array();
                    foreach ($clients_sel as $k => $client_sel) {
                        foreach ($clients as $client) {
                            if ($client['clientId'] == $client_sel) {
                                $sqlClients[$k] = $client;
                                break;
                            }
                        }
                    }
                } else {
                    $sqlClients = $clients;
                }
            }

            $view->assign('serviceName', $serviceName);
            $view->assign('sqlClients', $sqlClients);

            if ($action == "exe") { //Execute SQL
                $results = Array();
                $success = Array();
                $messages = Array();
                $messages_recount = Array();
                $one_result_mode = false;
                foreach ($sqlClients as $i => $client) {
                    //Connected
                    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                'host' => $client['dbHost'],
                                'sql' => $sqlfunc,
                                'serviceName' => $serviceName,
                                'serviceDB' => $client['serviceDB'],
                            ));

                    if (!$result['success']) {
                        $success[$i] = false;
                        $messages[$i] = $this->__('No s\'ha pogut executar la comanda a la base de dades ') . $result['errorMsg'];
                    } else {
                        //PARSE the result
                        if (strpos($sqlfunc_low, "select") !== False || strpos($sqlfunc_low, "show") !== False) {
                            $messages[$i] = count($result['values']);
                            if ($messages[$i] > 0) {
                                $column_names = array();
                                foreach ($result['values'][0] as $k => $v)
                                    $column_names[] = $k;

                                if ($messages[$i] == 1 && count($column_names) == 1) {
                                    //One row and one column
                                    $one_result_mode = true;
                                    $messages[$i] = $v;
                                } else {
                                    //Bigger matrix
                                    foreach ($column_names as $k => $column)
                                        $results[$i][0][$k] = $column;
                                    foreach ($result['values'] as $k => $line)
                                        foreach ($line as $j => $field)
                                            $results[$i][$k + 1][$j] = $field;
                                }
                            }
                        } else
                            $messages[$i] = "OK";
                        $success[$i] = true;
                    }
                }

                if ($one_result_mode) {
                    foreach ($messages as $i => $message) {
                        if (isset($messages_recount[$message])) {
                            $messages_recount[$message]++;
                        } else {
                            $messages_recount[$message] = 1;
                        }
                    }
                }

                global $agora;
                
                if ($serviceName == 'portal') {
                    $view->assign('prefix', $agora['admin']['database']);
                } else {
                    $view->assign('prefix', $agora['server']['userprefix']);
                }
                
                $view->assign('which', $which);
                $view->assign('results', $results);
                $view->assign('success', $success);
                $view->assign('messages', $messages);
                $view->assign('messages_recount', $messages_recount);

                return $view->fetch('agoraportal_admin_sql_exe.tpl');
            }

            // Else ask to execute SQL
            // Check if the SQL comand contain the SQL security code
            if ($this->getVar('sqlSecurityCode') != '') {
                if (strpos($sqlfunc, $this->getVar('sqlSecurityCode'))) {
                    LogUtil::registerError($this->__f('La comanda SQL conté el codi de seguretat "%s". No es recomana seguir amb l\'operació', ModUtil::getVar('Agoraportal', 'sqlSecurityCode')));
                }
            }
            return $view->fetch('agoraportal_admin_sql_ask.tpl');
        }

        //Else  show form
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 0, 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');

        $servicesListContent = ModUtil::func('Agoraportal', 'admin', 'sqlservicesListContent', array('search' => $search,
                    'searchText' => $searchText,
                    'service_sel' => $service_sel,
                    'which' => $which));

        // Create output object
        if ($comands) {
            $view->assign('comands', $comands);
        }
        $view->assign('servicesListContent', $servicesListContent);
        $view->assign('search', $search);
        $view->assign('searchText', $searchText);
        return $view->fetch('agoraportal_admin_sql.tpl');
    }

    /**
     * Changes the advices block content
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return:     Rendering of the page
     */
    public function advices($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $clients_sel = FormUtil::getPassedValue('clients_sel', isset($args['clients_sel']) ? $args['servicesListContent'] : null, 'GETPOST');
        $message = FormUtil::getPassedValue('message', isset($args['message']) ? $args['message'] : null, 'GETPOST');
        $which = FormUtil::getPassedValue('which', isset($args['which']) ? $args['which'] : "all", 'GETPOST');
        $only_admins = FormUtil::getPassedValue('only_admins', isset($args['only_admins']) ? $args['only_admins'] : "0", 'GETPOST');
        $date_start = FormUtil::getPassedValue('date_start', isset($args['date_start']) ? $args['date_start'] : 0, 'GETPOST');
        $date_stop = FormUtil::getPassedValue('date_stop', isset($args['date_stop']) ? $args['date_stop'] : 0, 'GETPOST');
        $service_sel = FormUtil::getPassedValue('service_sel', isset($args['service_sel']) ? $args['service_sel'] : 2, 'GETPOST');

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('message', $message);
        $view->assign('which', $which);
        $view->assign('only_admins', $only_admins);
        $view->assign('date_start', $date_start);
        $view->assign('date_stop', $date_stop);
        $view->assign('service_sel', $service_sel);

        $ask = FormUtil::getPassedValue('ask', isset($args['ask']) ? $args['ask'] : null, 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'GETPOST');
        if (!empty($ask)) {
            $action = 'ask';
        } else if (!empty($confirm)) {
            $action = 'exe';
        }
        if (isset($action) && ($which == "selected" && empty($clients_sel) )) {
            LogUtil::registerError($this->__('Has d\'omplir tots els camps'));
            $action = "show";
        }

        if ($date_stop < $date_start) {
            LogUtil::registerError($this->__('La data d\'inici no pot ser superior a la data de fi'));
            $action = "show";
        }

        if (isset($action) && ($action == "ask" || $action == "exe")) {
            //Common parts on ask and execute

            $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 1, //Default
                        'rpp' => 0, //No pages
                        'service' => $service_sel,
                        'state' => 1, //Active
                    ));

            if ($which == "selected") {
                $sqlClients = Array();
                foreach ($clients_sel as $k => $client_sel) {
                    foreach ($clients as $client) {
                        if ($client['clientId'] == $client_sel) {
                            $sqlClients[$k] = $client;
                            break;
                        }
                    }
                }
            }
            else {
                $sqlClients = $clients;
            }

            $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
            $serviceName = $services[$service_sel]['serviceName'];

            $view->assign('serviceName', $serviceName);
            $view->assign('sqlClients', $sqlClients);

            if ($action == "exe") { //Execute SQL
                $success = Array();
                $messages = Array();
                $ok = 0;
                $error = 0;
                // Get message from session
                $message = unserialize(SessionUtil::getVar('noticeboardMessage'));

                switch ($serviceName) {
                    case 'intranet':
                        //Intraweb
                        // needed to maintain comptability during migration from 1.2.x to 1.3.x
                        $intranetVersion = '128';
                        $compat = ModUtil::apiFunc('Agoraportal', 'admin', 'compat', array('intranetVersion' => $intranetVersion));

                        if ($only_admins) {
                            $content = Array('startTime' => $date_start,
                                'endTime' => $date_stop,
                                'adminNotice' => $message);
                        } else {
                            $content = Array('startTime' => $date_start,
                                'endTime' => $date_stop,
                                'userNotice' => $message,
                                'adminNotice' => $message);
                        }
                        $content = serialize($content);
                        $content = str_replace("'", "''", $content);
                        $date = date("Y-m-d H:i:s");

                        $sqlexists = "SELECT * FROM {$compat['tablePrefix']}blocks WHERE {$compat['fieldsPrefix']}bkey = 'iwNotice'";
                        $sqlactive = "SELECT * FROM {$compat['tablePrefix']}blocks WHERE {$compat['fieldsPrefix']}bkey = 'iwNotice' AND {$compat['fieldsPrefix']}active = '1'";
                        $sqlactivate = "UPDATE {$compat['tablePrefix']}blocks SET {$compat['fieldsPrefix']}active = '1', {$compat['fieldsPrefix']}content = '" . $content . "'  WHERE {$compat['fieldsPrefix']}bkey = 'iwNotice'";
                        $sqlupdate = "UPDATE {$compat['tablePrefix']}blocks SET {$compat['fieldsPrefix']}content = '" . $content . "'  WHERE {$compat['fieldsPrefix']}bkey = 'iwNotice'";
                        $sqlminorder = "SELECT MIN({$compat['fieldsPrefix']}order) FROM {$compat['tablePrefix']}block_placements";
                        break;
                    case 'moodle2':
                        global $agora;
                        $prefix = $agora[$serviceName]['prefix'];
                        //Moodle
                        $message = str_replace("'", "''", $message);
                        if ($only_admins) {
                            $sqlexists = "SELECT * FROM {$prefix}BLOCK_ADVICES WHERE show_only_admins = 1";
                            $sqlupdate = "UPDATE {$prefix}BLOCK_ADVICES SET msg = '" . $message . "', date_start = " . $date_start . ", date_stop = " . $date_stop . " WHERE show_only_admins = 1";
                            $sqlinsert = "INSERT INTO {$prefix}BLOCK_ADVICES (msg,date_start,date_stop,show_only_admins) VALUES ('" . $message . "'," . $date_start . "," . $date_stop . ",1)";
                        } else {
                            $sqlexists = "SELECT * FROM {$prefix}BLOCK_ADVICES WHERE show_only_admins = 0";
                            $sqlupdate = "UPDATE {$prefix}BLOCK_ADVICES SET msg = '" . $message . "', date_start = " . $date_start . ", date_stop = " . $date_stop . " WHERE show_only_admins = 0";
                            $sqlinsert = "INSERT INTO {$prefix}BLOCK_ADVICES (msg,date_start,date_stop,show_only_admins) VALUES ('" . $message . "'," . $date_start . "," . $date_stop . ",0)";
                        }
                        break;
                }

                foreach ($sqlClients as $i => $client) {
                    $result = "";
                    switch ($serviceName) {
                        case 'intranet':
                            //Intraweb
                            //Check if the block exists
                            $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                        'host' => $client['dbHost'],
                                        'sql' => $sqlexists,
                                        'serviceName' => $serviceName));
                            if (!$return['success']) {
                                $success[$i] = false;
                                $messages[$i] = $this->__('Ha fallat la connexió a la base de dades.');
                                $error++;
                            } else {
                                if (count($return['values']) > 0) {
                                    //Exists. Check if it's active
                                    $blockid = $return['values'][0]["{$compat['fieldsPrefix']}bid"];
                                    $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                'host' => $client['dbHost'],
                                                'sql' => $sqlminorder,
                                                'serviceName' => $serviceName));
                                    $minorder = $return['values'][0]["MIN({$compat['fieldsPrefix']}order)"] - 1;
                                    $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                'host' => $client['dbHost'],
                                                'sql' => $sqlactive,
                                                'serviceName' => $serviceName));
                                    if (count($return['values']) > 0) {
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'host' => $client['dbHost'],
                                                    'sql' => $sqlupdate,
                                                    'serviceName' => $serviceName));
                                        if ($return['success']) {
                                            $ok++;
                                            $success[$i] = true;
                                            $messages[$i] = $this->__('El bloc s\'ha actualitzat correctament');
                                            $sql = "UPDATE {$compat['tablePrefix']}block_placements SET {$compat['fieldsPrefix']}pid = '2', {$compat['fieldsPrefix']}order = '" . $minorder . "' WHERE {$compat['fieldsPrefix']}bid = '" . $blockid . "'";
                                            $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                        'host' => $client['dbHost'],
                                                        'sql' => $sql,
                                                        'serviceName' => $serviceName));
                                            if ($return['success']) {
                                                $messages[$i] .= $this->__(' i s\'ha promocionat a la primera posició de la columna dreta');
                                            } else {
                                                $messages[$i] .= $this->__(' però no s\'ha pogut promocionar a la primera posició de la columna dreta');
                                            }
                                        } else {
                                            $error++;
                                            $success[$i] = false;
                                            $messages[$i] = $this->__('El bloc no s\'ha actualitzat correctament.') . $return['errorMsg'];
                                        }
                                    } else {
                                        //It isn't active. Active it, update and promove
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'host' => $client['dbHost'],
                                                    'sql' => $sqlactivate,
                                                    'serviceName' => $serviceName));
                                        if ($return['success']) {
                                            $ok++;
                                            $success[$i] = true;
                                            $messages[$i] = $this->__('El bloc s\'ha activat i actualitzat correctament');
                                            $sql = "UPDATE {$compat['tablePrefix']}block_placements SET {$compat['fieldsPrefix']}pid = '2', {$compat['fieldsPrefix']}order = '" . $minorder . "' WHERE {$compat['fieldsPrefix']}bid = '" . $blockid . "'";
                                            $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                        'host' => $client['dbHost'],
                                                        'sql' => $sql,
                                                        'serviceName' => $serviceName));
                                            if ($return['success']) {
                                                $messages[$i] .= $this->__(' i s\'ha promocionat a la primera posició de la columna dreta');
                                            } else {
                                                $messages[$i] .= $this->__(' però no s\'ha pogut promocionar a la primera posició de la columna dreta');
                                            }
                                        } else {
                                            $error++;
                                            $success[$i] = false;
                                            $messages[$i] = $this->__('El bloc no s\'ha activat correctament.') . $return['errorMsg'];
                                        }
                                    }
                                } else {
                                    //Don't exists, create it.
                                    $sql = "SELECT * FROM {$compat['tablePrefix']}modules WHERE {$compat['fieldsPrefix']}name = '{$compat['intrawebModulePrefix']}main'";
                                    $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                'host' => $client['dbHost'],
                                                'sql' => $sql,
                                                'serviceName' => $serviceName));
                                    $bid = $return['values'][0]["{$compat['fieldsPrefix']}id"];
                                    $sql = "INSERT INTO {$compat['tablePrefix']}blocks ({$compat['fieldsPrefix']}bkey,{$compat['fieldsPrefix']}title,{$compat['fieldsPrefix']}content,{$compat['fieldsPrefix']}url,{$compat['fieldsPrefix']}mid,{$compat['fieldsPrefix']}filter,{$compat['fieldsPrefix']}active,{$compat['fieldsPrefix']}collapsable,{$compat['fieldsPrefix']}defaultstate,{$compat['fieldsPrefix']}refresh,{$compat['fieldsPrefix']}last_update,{$compat['fieldsPrefix']}language)
                                            VALUES('iwNotice','Avisos','" . $content . "','','" . $bid . "','','1','0','1','3600','" . $date . "','')";
                                    $return1 = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                'host' => $client['dbHost'],
                                                'sql' => $sql,
                                                'serviceName' => $serviceName));
                                    if ($return1['success']) {
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'host' => $client['dbHost'],
                                                    'sql' => $sqlexists,
                                                    'serviceName' => $serviceName));
                                        $blockid = $return['values'][0]["{$compat['fieldsPrefix']}bid"];
                                        $sql = "INSERT INTO {$compat['tablePrefix']}block_placements ({$compat['fieldsPrefix']}pid,{$compat['fieldsPrefix']}bid,{$compat['fieldsPrefix']}order) VALUES ('2','" . $blockid . "','" . $minorder . "')";
                                        $return2 = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'host' => $client['dbHost'],
                                                    'sql' => $sql,
                                                    'serviceName' => $serviceName));
                                    }
                                    if ($return1['success'] && $return2['success']) {
                                        $ok++;
                                        $success[$i] = true;
                                        $messages[$i] = $this->__('El bloc s\'ha creat correctament');
                                    } else {
                                        $error++;
                                        $success[$i] = false;
                                        $messages[$i] = $this->__('El bloc no s\'ha creat correctament.') . $return1['errorMsg'] . ' ' . $return2['errorMsg'];
                                    }
                                }
                            }
                            break;

                        case 'moodle2':
                            $prefix = $agora[$serviceName]['prefix'];
                            //See if the block exists in course 1
                            //Get the block id
                            $sql = "SELECT ID FROM {$prefix}BLOCK WHERE name='advices'";
                            $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                        'sql' => $sql,
                                        'serviceName' => $serviceName));
                            if ($return['success'] && count($return['values']) > 0) {
                                $blockid = $return['values'][0]['ID'];
                                $sql = "SELECT * FROM {$prefix}BLOCK_INSTANCES WHERE blockname='advices'";
                                $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                            'sql' => $sql,
                                            'serviceName' => $serviceName));
                                if ($return['success']) {
                                    if (count($return['values']) == 0) {
                                        //INSERT THE BLOCK
                                        $sql = "INSERT INTO {$prefix}BLOCK_INSTANCES (blockname,parentcontextid,showinsubcontexts,pagetypepattern,defaultregion,defaultweight) VALUES ('advices','2',0,'site-index','side-post',-999)";
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'sql' => $sql,
                                                    'serviceName' => $serviceName));
                                        if ($return['success'])
                                            $result = ", bloc afegit";
                                        else
                                            $result = ", tot i que no s'ha pogut afegit el bloc";
                                    }
                                    else {
                                        //MAKE IT VISIBLE
                                        $sql = "UPDATE {$prefix}BLOCK_POSITIONS SET visible = 1 WHERE BLOCKINSTANCEID =" . $return['values'][0]['ID'];
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'sql' => $sql,
                                                    'serviceName' => $serviceName));
                                        if (!$return['success'])
                                            $result = ", tot i que no s'ha pogut fer el bloc visible en cas d'estar invisible";
                                        $sql = "UPDATE {$prefix}BLOCK_INSTANCES SET pagetypepattern='site-index', defaultregion='side-post', defaultweight=-999 WHERE blockname = 'advices'";
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'sql' => $sql,
                                                    'serviceName' => $serviceName));
                                        if (!$return['success'])
                                            $result = ", tot i que no s'ha pogut reiniciarla posició del bloc";
                                    }
                                }

                                //See if the line exists
                                $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                            'sql' => $sqlexists,
                                            'serviceName' => $serviceName));
                                if ($return['success']) {
                                    if (count($return['values']) > 0) //FOUNDED update
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'sql' => $sqlupdate,
                                                    'serviceName' => $serviceName));
                                    else //Not found, insert it
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'sql' => $sqlinsert,
                                                    'serviceName' => $serviceName));
                                }

                                if (!$return) {
                                    $success[$i] = false;
                                    $messages[$i] = $this->__('No s\'ha pogut executar la comanda a la base de dades ') . $return['errorMsg'];
                                    $error++;
                                } else {
                                    $messages[$i] = $this->__('OK' . $result);
                                    $success[$i] = true;
                                    $ok++;
                                }
                            } else {
                                //Module not installed
                                $success[$i] = false;
                                $messages[$i] = $this->__('El mòdul d\'avisos no està instal·lat o actualitzat correctament.') . $return['errorMsg'];
                                $error++;
                            }
                            break;
                    }
                }

                $view->assign('success', $success);
                $view->assign('messages', $messages);
                $view->assign('ok', $ok);
                $view->assign('error', $error);

                return $view->fetch('agoraportal_admin_advices_exe.tpl');
            }

            // Else ask to execute SQL
            // Save message to session
            SessionUtil::setVar('noticeboardMessage', serialize($message));

            return $view->fetch('agoraportal_admin_advices_ask.tpl');
        }

        //Else show form
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 0, 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');

        $servicesListContent = ModUtil::func('Agoraportal', 'admin', 'sqlservicesListContent', array('search' => $search,
                    'searchText' => $searchText,
                    'service_sel' => $service_sel,
                    'which' => $which));

        // Create output object
        $view->assign('servicesListContent', $servicesListContent);
        $view->assign('search', $search);
        $view->assign('searchText', $searchText);

        return $view->fetch('agoraportal_admin_advices.tpl');
    }

    /**
     * Get the list of services associated with clients
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      The filter and pager values
     * @return:     An array with all the clients and services
     */
    public function sqlservicesListContent($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $service_sel = FormUtil::getPassedValue('service_sel', isset($args['service_sel']) ? $args['service_sel'] : 2, 'GETPOST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 1, 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : null, 'GETPOST');
        $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : 1, 'GETPOST');
        $clients_sel = FormUtil::getPassedValue('clients_sel', isset($args['clients_sel']) ? $args['servicesListContent'] : null, 'GETPOST');

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        // remove marsupial service from services array because sql are no necessary in marsupial
        $service = modUtil::apifunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => 'marsupial'));
        unset($services[$service['serviceId']]);

        $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 1, //Default
                    'rpp' => 0, //No pages
                    'service' => $service_sel,
                    'state' => 1, //Active
                    'search' => $search,
                    'order' => $order, //Default
                    'searchText' => $searchText));

        $clientsNumber = count($clients);

        return $this->view->assign('clients', $clients)
                        ->assign('services', $services)
                        ->assign('service_sel', $service_sel)
                        ->assign('clients_sel', $clients_sel)
                        ->assign('clientsNumber', $clientsNumber)
                        ->assign('order', $order)
                        ->fetch('agoraportal_admin_sqlservicesListContent.tpl');
    }

    /**
     * Get the list of SQL comands saved in the database
     * @author:     Fèlix Casanellas (felix.casanellas@gmail.com)
     * @param:      None
     * @return:     An array with all comands and their descriptions
     */
    public function sqlComandList($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $serviceId = FormUtil::getPassedValue('serviceId', isset($args['serviceId']) ? $args['serviceId'] : 2, 'REQUEST');
        $comand_type = FormUtil::getPassedValue('comand_type', isset($args['comand_type']) ? $args['comand_type'] : 0, 'REQUEST');

        if ($comand_type == 0) {
            $where = "WHERE `serviceId`=" . $serviceId;
        } else {
            $where = "WHERE `serviceId`=" . $serviceId . " AND `type`=" . $comand_type;
        }

        $comands = DBUtil::selectObjectArray('agoraportal_mysql_comands', $where);

        return $this->view->assign('comands', $comands)
                        ->fetch('agoraportal_admin_sqlComandList.tpl');
    }

    public function stats($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $which = FormUtil::getPassedValue('which', isset($args['which']) ? $args['which'] : "all", 'GETPOST');
        $stats_sel = FormUtil::getPassedValue('stats_sel', isset($args['stats_sel']) ? $args['stats_sel'] : 0, 'GETPOST');
        $date_start = FormUtil::getPassedValue('date_start', isset($args['date_start']) ? $args['date_start'] : 0, 'GETPOST');
        $date_stop = FormUtil::getPassedValue('date_stop', isset($args['date_stop']) ? $args['date_stop'] : 0, 'GETPOST');
        $clients_sel = FormUtil::getPassedValue('clients_sel', isset($args['clients_sel']) ? $args['clients_sel'] : null, 'GETPOST');

        switch ($stats_sel) {
            case '1':
            case '2':
            case '3':
                $service = 2; // Moodle 1.9
                break;
            case '4':
                $service = 1; // Intranet
                break;
            case '5':
            case '6':
            case '7':
                $service = 4; // Moodle 2
                break;
        }

        //$service = $stats_sel == 4 ? 1 /* Intranet */ : 2 /* Moodle */;
        if ($date_start != 0) {
            $date_start = date("d/m/Y", strtotime($date_start));
        }

        // Get textarea with list of 
        $statsservicesList = ModUtil::func('Agoraportal', 'admin', 'statsservicesListContent', array('search' => '',
                    'searchText' => '',
                    'service' => $service,
                    'which' => $which));

        if ($date_stop < $date_start) {
            LogUtil::registerError($this->__('La data de fi és menor que la d\'inici'));
        }

        return $this->view->assign('which', $which)
                        ->assign('service', $service)
                        ->assign('stats_sel', $stats_sel)
                        ->assign('date_start', $date_start)
                        ->assign('date_stop', $date_stop)
                        ->assign('statsservicesList', $statsservicesList)
                        ->assign('searchText', '')
                        ->assign('resultsContent', '')
                        ->fetch('agoraportal_admin_stats.tpl');
    }

    /**
     * Get the list of services associated with clients
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      The filter and pager values
     * @return:     An array with all the clients and services
     */
    public function statsservicesListContent($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : 2, 'GETPOST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 1, 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : null, 'GETPOST');

        $clients_sel = FormUtil::getPassedValue('clients_sel', isset($args['clients_sel']) ? $args['servicesListContent'] : null, 'GETPOST');

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 1, //Default
                    'rpp' => 0, //No pages
                    'service' => $service,
                    'state' => 1, //Active
                    'search' => $search,
                    'order' => 1, //Default
                    'searchText' => $searchText));

        $clientsNumber = count($clients);

        return $this->view->assign('clients', $clients)
                        ->assign('services', $services)
                        ->assign('service', $service)
                        ->assign('clients_sel', $clients_sel)
                        ->assign('clientsNumber', $clientsNumber)
                        ->fetch('agoraportal_admin_statsservicesListContent.tpl');
    }

    function check_date($yearmonth, $day) {
        list($MMMM, $YYYY) = explode("/", $yearmonth);
        $D = substr($day, 1);
        $hash = $MMMM . $D;

        $valids = array('0229' => '0', '0230' => '0', '0231' => '0', '0431' => '0', '0631' => '0', '0931' => '0', '1131' => '0');

        if (($YYYY == '2012' || $YYYY == '2016' || $YYYY == '2020' || $YYYY == '2024' || $YYYY == '2028' || $YYYY == '2030') && ($D == '29') && ($MMMM == '02'))
            return 1;
        else {
            if ($valids[$hash] == '0')
                return 0;
            else
                return 1;
        }
    }

    function last_day_month($year, $month) {
        if ($month == '01' || $month == '03' || $month == '05' || $month == '07' || $month == '08' || $month == '10' || $month == '12')
            return '31';
        else if (($year == '2012' || $year == '2016' || $year == '2020' || $year == '2024' || $year == '2028' || $year == '2030') && ($month == '02'))
            return '29';
        else if (($year != '2012' && $year != '2016' && $year != '2020' && $year != '2024' && $year != '2028' && $year != '2030') && ($month == '02'))
            return '28';
        else
            return '30';
    }

    public function statsGetStatisticsContent($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $ruta = FormUtil::getPassedValue('ruta', 0, 'GET');
        $stats = FormUtil::getPassedValue('stats', 1, 'GET');
        $which = FormUtil::getPassedValue('which', "all", 'GET');
        $date_start = FormUtil::getPassedValue('date_start', -0, 'GET');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'GET');
        $orderby = FormUtil::getPassedValue('orderby', 'clientDNS', 'GET');

        // data format conversion
        list($DD, $MM, $YY) = explode("/", $date_start);
        list($DDD, $MMM, $YYY) = explode("/", $date_stop);
        $date_start = date('Ymd', strtotime($YY . $MM . $DD));
        $date_stop = date('Ymd', strtotime($YYY . $MMM . $DDD));

        $clients_text = "";
        if ($which == 'selected') {
            $clients = FormUtil::getPassedValue('clients', '', 'GET');
            if (!empty($clients)) {
                $clients_ar = explode(",", $clients);
                $clients_text = "";
                foreach ($clients_ar as $client) {
                    $clients_text .= "tbl.clientDNS = '$client' OR ";
                }
                $clients_text = "(" . substr($clients_text, 0, -4) . ") AND ";
            }
        }

        if ($stats == 1) {
            // Moodle 1.9 Month
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop)
                $dates = "yearmonth = $month_start";
            else
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_month', $joinInfo, $where, (string) $orderby . ', yearmonth');
        }
        else if ($stats == 2) {
            // Moodle 1.9 Week
            if ($date_start == $date_stop)
                $dates = "date = $date_start";
            else
                $dates = "date >= $date_start AND date <= $date_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_week', $joinInfo, $where, (string) $orderby . ', date');
        }
        else if ($stats == 3) {
            // Moodle 1.9 Day
            if ($date_start == $date_stop)
                $dates = "date = $date_start";
            else
                $dates = "date >= $date_start AND date <= $date_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_day', $joinInfo, $where, (string) $orderby . ', date');
        }
        else if ($stats == 4) {
            // Zikula Month
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop)
                $dates = "yearmonth = $month_start";
            else
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_intranet_stats_day', $joinInfo, $where, (string) $orderby . ', yearmonth');
        }
        else if ($stats == 5) {
            // Moodle 2 Month
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop)
                $dates = "yearmonth = $month_start";
            else
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle2_stats_month', $joinInfo, $where, (string) $orderby . ', yearmonth');
        }
        else if ($stats == 6) {
            // Moodle 1.9 Week
            if ($date_start == $date_stop)
                $dates = "date = $date_start";
            else
                $dates = "date >= $date_start AND date <= $date_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle2_stats_week', $joinInfo, $where, (string) $orderby . ', date');
        }
        else if ($stats == 7) {
            // Moodle 1.9 Day
            if ($date_start == $date_stop)
                $dates = "date = $date_start";
            else
                $dates = "date >= $date_start AND date <= $date_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle2_stats_day', $joinInfo, $where, (string) $orderby . ', date');
        }

        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        $results = array();
        $totals = array();

        if (isset($items[0])) {
            $i = 0;
            $results[0] = Array();
            foreach ($items[0] as $k => $item) {
                $results[0][$i] = $k;
                $i++;
            }
        }
        $auxmonth = '0';
        $num_centres = array();
        $u = 0;
        if (count($items) > 0) {
            foreach ($items as $i => $item) {
                foreach ($item as $key => $value) {
                    if ($key == 'clientDNS') {
                        if (in_array($value, $num_centres) != TRUE) {
                            $num_centres[$u] = $value;
                            $u++;
                        }
                    }
                }
            }
            foreach ($items as $i => $item) {
                $results[$i + 1] = $item;
                foreach ($item as $key => $value) {
                    if ($key[0] == 'd' && ((strlen($key) == 2) || (strlen($key) == 3) )) {
                        if (self::check_date($auxmonth, $key) == false) {
                            $results[$i + 1][$key] = ' ';
                        } else {
                            $results[$i + 1][$key] = $value;
                        }
                    }

                    if ($key == 'clientDNS')
                        $totals[$key] = 'Totals (' . count($num_centres) . ' centres)';
                    else if ($key == 'yearmonth') {
                        $totals[$key] = '';
                        $value = $value . "01";
                        $yearmonth = date("Y-m-d", strtotime($value));
                        list($YY, $MM, $DD) = explode("-", $yearmonth);
                        $yearmonth = $MM . "/" . $YY;
                        $auxmonth = $yearmonth;
                        $results[$i + 1][$key] = $yearmonth;
                    } elseif (($key == 'lastaccess') || ($key == 'lastaccess_date') || ($key == 'date') || ($key == 'lastaccess_user')) {
                        $totals[$key] = '';
                        $results[$i + 1][$key] = $value;
                    }
                    else
                        $totals[$key] = $totals[$key] + $value;
                }
            }
        }

        $clientsNumber = count($clients);
        // Create output object
        return $this->view->assign('results', $results)
                        ->assign('totals', $totals)
                        ->assign('stats', $stats)
                        ->fetch('agoraportal_admin_statsStatisticsContent.tpl');
    }

    public function statsGetGraphsContent($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $ruta = FormUtil::getPassedValue('ruta', 0, 'GET');
        $stats = FormUtil::getPassedValue('stats', 1, 'GET');
        $which = FormUtil::getPassedValue('which', "all", 'GET');
        $infotype = FormUtil::getPassedValue('infotype', "all", 'GET');
        $date_start = FormUtil::getPassedValue('date_start', -0, 'GET');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'GET');
        $orderby = FormUtil::getPassedValue('orderby', 'clientDNS', 'GET');
        $datatype = FormUtil::getPassedValue('datatype', 0, 'GET');
        $date = FormUtil::getPassedValue('date', 0, 'GET');

        // data format conversion
        list($DD, $MM, $YY) = explode("/", $date_start);
        list($DDD, $MMM, $YYY) = explode("/", $date_stop);
        $date_start = date('Ymd', strtotime($YY . $MM . $DD));
        $date_stop = date('Ymd', strtotime($YYY . $MMM . $DDD));

        $clients_text = "";
        // if($which == 'selected'){
        $clients = FormUtil::getPassedValue('usuari', "all", 'GET');

        if (!empty($clients)) {
            $clients_ar = explode(",", $clients);
            $clients_text = "";

            foreach ($clients_ar as $client) {

                $clients_text .= "tbl.clientDNS = '$client' OR ";
            }
            $clients_text = "(" . substr($clients_text, 0, -4) . ") AND ";
            //   }
        }
        $tot = 1;
        if ($stats == 1) {
            //Moodle Month
            $est = "Mensuals Moodle";
            if ($date != '*') {
                $infotype = 'accessos';
                if ($date != 'total') {
                    $pos = strpos($clients_text, 'Total');

                    //list($D,$M,$Y) = explode("/",$date_start);
                    list($Mst, $Yst) = explode("/", $date);
                    $thelastday = self::last_day_month($Yst, $Mst);
                    $date_st = date('Ymd', strtotime($Yst . $Mst . '01'));
                    $date_sto = date('Ymd', strtotime("+1 month", strtotime($Yst . $Mst . '01')));
                    $intr_sum = "";
                    $fi_sum = "";

                    if ($pos == FALSE) {
                        $where_t = $clients_text . " " . $date_st . " <=date AND date <= " . $date_sto;
                    } else {
                        $where_t = $date_st . " <=date AND date <= " . $date_sto;
                        $intr_sum = "SUM(";
                        $fi_sum = ")";
                    }
                } else {
                    $where_t = $date_start . " <=date AND date <= " . $date_stop;
                    $intr_sum = "SUM(";
                    $fi_sum = ")";
                }

                $sql = "SELECT tbl.clientDNS,tbl.date," . $intr_sum . "h0+h1+h2+h3+h4+h5+h6+h7+h8+h9+h10+h11+h12+h13+h14+h15+h16+h17+h18+h19+h20+h21+h22+h23" . $fi_sum . " FROM agoraportal_moodle_stats_day AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $where_t . " GROUP BY date ORDER BY  date ASC";
                $ca = array('clientDNS', 'date', 'users');
                $res = DBUtil::executeSQL($sql);
                $items_users = DBUtil::marshallObjects($res, $ca);
            }
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop)
                $dates = "yearmonth = $month_start";
            else
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";

            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            if ($datatype == 'totals') {
                $where = $dates;
                $sql = "SELECT tbl.clientDNS,tbl.yearmonth,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat   FROM agoraportal_moodle_stats_month AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS  WHERE " . $dates . " GROUP BY yearmonth ORDER BY clientDNS DESC, yearmonth";
                $ca = array('clientDNS', 'yearmonth', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                $res = DBUtil::executeSQL($sql);
                $items = DBUtil::marshallObjects($res, $ca);
                $where_totals = $dates;
                $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_month', $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                $tot = 0;
            } else {
                $pos = strpos($clients_text, 'Total');
                if ($pos === false) {
                    $where = $clients_text . $dates;
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_month', $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                    $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_month', $joinInfo, $where, (string) $orderby . ', yearmonth');
                } else {
                    $where = $dates;
                    $sql = "SELECT tbl.clientDNS,tbl.yearmonth,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat   FROM agoraportal_moodle_stats_month AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS  WHERE " . $dates . " GROUP BY yearmonth ORDER BY clientDNS DESC, yearmonth";
                    $ca = array('clientDNS', 'yearmonth', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                    $res = DBUtil::executeSQL($sql);
                    $items = DBUtil::marshallObjects($res, $ca);
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_month', $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                    $tot = 0;
                }
            }
            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)  FROM agoraportal_moodle_stats_month AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates;
            $ca = array('num_centres');
            $res = DBUtil::executeSQL($sql_num_centres);
            $num_centress = DBUtil::marshallObjects($res, $ca);
        } else if ($stats == 2) {
            //Moodle Week
            $est = "Setmanals Moodle";
            if ($date != '*') {

                $infotype = 'accessos';

                if ($date != 'total') {

                    $pos = strpos($clients_text, 'Total');
                    list($D, $M, $Y) = explode("/", $date);
                    $intr_sum = "";
                    $fi_sum = "";
                    $date_st = date('Ymd', strtotime($Y . $M . $D));
                    $date_sto = date('Ymd', strtotime("+1 week", strtotime($Y . $M . $D)));

                    if ($pos == FALSE) {
                        $where_t = $clients_text . " " . $date_st . " <=date AND date <= " . $date_sto;
                    } else {
                        $where_t = $date_st . " <=date AND date <= " . $date_sto;
                        $intr_sum = "SUM(";
                        $fi_sum = ")";
                    }
                } else {
                    $where_t = $date_start . " <=date AND date <= " . $date_stop;
                    $intr_sum = "SUM(";
                    $fi_sum = ")";
                }
                $sql = "SELECT tbl.clientDNS,tbl.date," . $intr_sum . "h0+h1+h2+h3+h4+h5+h6+h7+h8+h9+h10+h11+h12+h13+h14+h15+h16+h17+h18+h19+h20+h21+h22+h23" . $fi_sum . " FROM agoraportal_moodle_stats_day AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $where_t . " GROUP BY date ORDER BY  date ASC";
                $ca = array('clientDNS', 'date', 'users');
                $res = DBUtil::executeSQL($sql);
                $items_users = DBUtil::marshallObjects($res, $ca);
            }
            if ($date_start == $date_stop)
                $dates = "date = $date_start";
            else
                $dates = "date >= $date_start AND date <= $date_stop";

            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            if ($datatype == 'totals') {
                $where = $dates;
                $sql = "SELECT tbl.clientDNS,tbl.date,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat   FROM agoraportal_moodle_stats_week AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates . " GROUP BY date ORDER BY  date ASC";
                $ca = array('clientDNS', 'date', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                $res = DBUtil::executeSQL($sql);
                $items = DBUtil::marshallObjects($res, $ca);
                $where_totals = $dates;
                $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_week', $joinInfo, $where_totals, (string) $orderby . ', date');
                $tot = 0;
            } else {
                $pos = strpos($clients_text, 'Total');

                if ($pos === false) {
                    $where = $clients_text . $dates;
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_week', $joinInfo, $where_totals, (string) $orderby . ', date');
                    $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_week', $joinInfo, $where, (string) $orderby . ',date');
                } else {
                    $where = $dates;
                    $sql = "SELECT tbl.clientDNS,tbl.date,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat   FROM agoraportal_moodle_stats_week AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates . " GROUP BY date ORDER BY clientDNS DESC, date";
                    $ca = array('clientDNS', 'date', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                    $res = DBUtil::executeSQL($sql);
                    $items = DBUtil::marshallObjects($res, $ca);
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_week', $joinInfo, $where_totals, (string) $orderby . ', date');
                    $tot = 0;
                }
            }

            if ($items === false) {
                return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
            }

            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)  FROM agoraportal_moodle_stats_week AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates;
            $ca = array('num_centres');
            $res = DBUtil::executeSQL($sql_num_centres);
            $num_centress = DBUtil::marshallObjects($res, $ca);
        } else if ($stats == 3) {
            //Moodle Day
            $est = "Diàries Moodle";
            if ($date_start == $date_stop)
                $dates = "date = $date_start";
            else
                $dates = "date >= $date_start AND date <= $date_stop";

            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            if ($datatype == 'totals') {
                $where = $dates;
                $sql = "SELECT tbl.clientDNS, tbl.date,sum(h0),sum(h1),sum(h2),sum(h3),sum(h4),sum(h5),sum(h6),sum(h7),sum(h8),sum(h9),sum(h10),sum(h11),sum(h12),sum(h13),sum(h14),sum(h15),sum(h16),sum(h17),sum(h18),sum(h19),sum(h20),sum(h21),sum(h22),sum(h23),total,educat FROM agoraportal_moodle_stats_day AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates . " GROUP BY date ORDER BY clientDNS DESC, date";
                $ca = array('clientDNS', 'date', 'h0', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'h11', 'h12', 'h13', 'h14', 'h15', 'h16', 'h17', 'h18', 'h19', 'h20', 'h21', 'h22', 'h23', 'total', 'educat');
                $res = DBUtil::executeSQL($sql);
                $items = DBUtil::marshallObjects($res, $ca);
                $where_totals = $dates;
                $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_day', $joinInfo, $where_totals, (string) $orderby . ', date');
                $tot = 0;
            } else {
                /* $where = $clients_text.$dates;
                  $where_totals=$dates;
                  $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_day', $joinInfo , $where_totals, (string)$orderby.', date');
                  $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_day', $joinInfo , $where, (string)$orderby.', date');
                 */
                $pos = strpos($clients_text, 'Total');

                if ($pos === false) {
                    $where = $clients_text . $dates;
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_day', $joinInfo, $where_totals, (string) $orderby . ', date');
                    $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_day', $joinInfo, $where, (string) $orderby . ',date');
                } else {
                    $where = $dates;
                    $sql = "SELECT tbl.clientDNS, tbl.date,sum(h0),sum(h1),sum(h2),sum(h3),sum(h4),sum(h5),sum(h6),sum(h7),sum(h8),sum(h9),sum(h10),sum(h11),sum(h12),sum(h13),sum(h14),sum(h15),sum(h16),sum(h17),sum(h18),sum(h19),sum(h20),sum(h21),sum(h22),sum(h23),total,educat FROM agoraportal_moodle_stats_day AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates . " GROUP BY date ORDER BY clientDNS DESC, date";

                    $ca = array('clientDNS', 'date', 'h0', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'h11', 'h12', 'h13', 'h14', 'h15', 'h16', 'h17', 'h18', 'h19', 'h20', 'h21', 'h22', 'h23', 'total', 'educat');
                    $res = DBUtil::executeSQL($sql);
                    $items = DBUtil::marshallObjects($res, $ca);
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_day', $joinInfo, $where_totals, (string) $orderby . ', date');
                    $tot = 0;
                }
            }
            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)  FROM agoraportal_moodle_stats_day AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates;
            $ca = array('num_centres');
            $res = DBUtil::executeSQL($sql_num_centres);
            $num_centress = DBUtil::marshallObjects($res, $ca);
        } else if ($stats == 4) {
            //Zikula Month
            $est = "Mensuals Intranet";
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);

            if ($month_start == $month_stop)
                $dates = "yearmonth = $month_start";
            else
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";

            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            if ($datatype == 'totals') {
                $where = $dates;
            } else {
                $where = $clients_text . $dates;
                $where_totals = $dates;

                $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_intranet_stats_day', $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
            }
            $items = DBUtil::selectExpandedObjectArray('agoraportal_intranet_stats_day', $joinInfo, $where, (string) $orderby . ', yearmonth');

            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)  FROM agoraportal_intranet_stats_day AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates;
            $ca = array('num_centres');
            $res = DBUtil::executeSQL($sql_num_centres);
            $num_centress = DBUtil::marshallObjects($res, $ca);
        } else if ($stats == 5) {   //Moodle 2 Month
            $est = "Mensuals Moodle 2";
            if ($date != '*') {
                $infotype = 'accessos';
                if ($date != 'total') {
                    $pos = strpos($clients_text, 'Total');

                    //list($D,$M,$Y) = explode("/",$date_start);
                    list($Mst, $Yst) = explode("/", $date);
                    $thelastday = self::last_day_month($Yst, $Mst);
                    $date_st = date('Ymd', strtotime($Yst . $Mst . '01'));
                    $date_sto = date('Ymd', strtotime("+1 month", strtotime($Yst . $Mst . '01')));
                    $intr_sum = "";
                    $fi_sum = "";

                    if ($pos == FALSE) {
                        $where_t = $clients_text . " " . $date_st . " <=date AND date <= " . $date_sto;
                    } else {
                        $where_t = $date_st . " <=date AND date <= " . $date_sto;
                        $intr_sum = "SUM(";
                        $fi_sum = ")";
                    }
                } else {
                    $where_t = $date_start . " <=date AND date <= " . $date_stop;
                    $intr_sum = "SUM(";
                    $fi_sum = ")";
                }

                $sql = "SELECT tbl.clientDNS,tbl.date," . $intr_sum . "h0+h1+h2+h3+h4+h5+h6+h7+h8+h9+h10+h11+h12+h13+h14+h15+h16+h17+h18+h19+h20+h21+h22+h23" . $fi_sum . " FROM agoraportal_moodle2_stats_day AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $where_t . " GROUP BY date ORDER BY  date ASC";
                $ca = array('clientDNS', 'date', 'users');
                $res = DBUtil::executeSQL($sql);
                $items_users = DBUtil::marshallObjects($res, $ca);
            }
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop)
                $dates = "yearmonth = $month_start";
            else
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";

            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            if ($datatype == 'totals') {
                $where = $dates;
                $sql = "SELECT tbl.clientDNS,tbl.yearmonth,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat   FROM agoraportal_moodle2_stats_month AS tbl LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS  WHERE " . $dates . " GROUP BY yearmonth ORDER BY clientDNS DESC, yearmonth";
                $ca = array('clientDNS', 'yearmonth', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                $res = DBUtil::executeSQL($sql);
                $items = DBUtil::marshallObjects($res, $ca);
                $where_totals = $dates;
                $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle2_stats_month', $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                $tot = 0;
            } else {
                $pos = strpos($clients_text, 'Total');
                if ($pos === false) {
                    $where = $clients_text . $dates;
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle2_stats_month', $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                    $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle2_stats_month', $joinInfo, $where, (string) $orderby . ', yearmonth');
                } else {
                    $where = $dates;
                    $sql = "SELECT tbl.clientDNS,tbl.yearmonth,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat   FROM agoraportal_moodle2_stats_month AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS  WHERE " . $dates . " GROUP BY yearmonth ORDER BY clientDNS DESC, yearmonth";
                    $ca = array('clientDNS', 'yearmonth', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                    $res = DBUtil::executeSQL($sql);
                    $items = DBUtil::marshallObjects($res, $ca);
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray('agoraportal_moodle2_stats_month', $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                    $tot = 0;
                }
            }
            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)  FROM agoraportal_moodle2_stats_month AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates;
            $ca = array('num_centres');
            $res = DBUtil::executeSQL($sql_num_centres);
            $num_centress = DBUtil::marshallObjects($res, $ca);
        }

        if ($orderby != 'totals') {
            if ($items === false) {
                return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
            }
        }

        $results = array();
        $totals = array();

        if (isset($items[0])) {
            $i = 0;
            $results[0] = Array();
            foreach ($items[0] as $k => $item) {
                $results[0][$i] = $k;
                $i++;
            }
        }
        $num_centres = array();
        $u = 0;
        foreach ($items as $i => $item) {
            foreach ($item as $key => $value) {
                if ($key == 'clientDNS') {
                    if (in_array($value, $num_centres) != TRUE) {
                        $num_centres[$u] = $value;
                        $u++;
                    }
                }
            }
        }

        $date_array = array();
        $kk = 0;
        $yearmonth = 0;
        $auxmonth = '0';
        $k = 0;
        $kkdate = 0;
        $kkdate2 = 0;
        //omplim el vector results i totals per a retornar a la taula
        foreach ($items as $i => $item) {
            $results[$i + 1] = $item;
            foreach ($item as $key => $value) {

                if ($key == 'date' && $date == '*') {

                    $date_array[$kkdate2] = date('Ymd', strtotime($results[$i + 1][$key]));
                    $kkdate2++;
                }

                if ($key[0] == 'd' && ((strlen($key) == 2) || (strlen($key) == 3) )) {
                    if (self::check_date($auxmonth, $key) == false) {
                        $results[$i + 1][$key] = ' ';
                    } else {
                        $results[$i + 1][$key] = $value;
                    }
                }
                $kk++;
                if ($key == 'clientDNS') {
                    $totals[$key] = 'Totals (' . $num_centress[0]['num_centres'] . ' centres)';
                    if ($tot == 0) {
                        $results[$i + 1][$key] = 'Total';
                        $usuari = 'Total';
                    } else if ($datatype == 'totals') {
                        $usuari = 'Total';
                    } else {
                        $usuari = $value;
                    }
                } else if ($key == 'yearmonth') {

                    $value = $value . "01";
                    $totals[$key] = '';
                    $results[$i + 1][$key] = date("Y-m-d", strtotime($value));
                    $yearmonth = date("Y-m-d", strtotime($value));
                    list($YYYY, $MMMM, $DDDD) = explode("-", $yearmonth);
                    $yearmonth = $MMMM . "/" . $YYYY;
                    $auxmonth = $yearmonth;
                    $results[$i + 1][$key] = $yearmonth;
                    $date_array[$kkdate] = date('Ymd', strtotime($YYYY . $MMMM . $DDDD));
                    $kkdate++;
                } elseif (($key == 'lastaccess') || ($key == 'lastaccess_date') || ($key == 'date') || ($key == 'lastaccess_user')) {
                    $totals[$key] = '';
                    $results[$i + 1][$key] = date("d/m/Y", strtotime($value));
                }
                else
                    $totals[$key] = $totals[$key] + $value;
            }
        }

        $j = 0;
        $l = 0;
        $t = 0;
        $kk = 0;
        $dataaux1 = array();
        $dataaux2 = array();
        $dataaux3 = array();
        if ($date != '*') {
            $m = 0;
            $aux = array();

            foreach ($items_users as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    if ($key2 == 'users') {
                        $datay1[$m] = $value2;
                        $m++;
                    } else if ($key2 == 'date') {
                        $date_array[$kk] = date('Ymd', strtotime($value2));
                        $kk++;
                    }
                }
            }
        }
        //omplim el vector datay1 per a passar les dades per a generar els gràfics
        else {
            foreach ($results as $i => $item) {

                foreach ($item as $key => $value) {

                    if ($i != '0' && $value != ' ') {

                        if ($infotype == 'courses') {
                            if ($key == 'courses') {
                                $datay1[$j] = $value;
                                $j++;
                            }
                        } else if ($infotype == 'users') {
                            if ($key == 'users') {
                                $datay1[$l] = $value;
                                $l++;
                            }
                        } else if ($infotype == 'activities') {
                            if ($key == 'activities') {
                                $datay1[$t] = $value;
                                $t++;
                            }
                        } else {
                            if (($key != 'educat') && ($key != 'users') && ($key != 'clientDNS') && ($key != 'total') && ($key != 'yearmonth') && ($key != 'lastaccess') && ($key != 'lastaccess_date') && ($key != 'date') && ($key != 'lastaccess_user')) {
                                $datay1[$j] = $value;
                                $j++;
                            }
                        }
                    }
                }
            }
        }

        //omplim el vector dataytotals1 per a passar les dades per a generar els gràfics amb les dades dels totals
        $j = 0;
        foreach ($totals as $key => $value) {


            if (($key != 'educat') && ($key != 'users') && ($key != 'clientDNS') && ($key != 'total') && ($key != 'yearmonth') && ($key != 'lastaccess') && ($key != 'lastaccess_date') && ($key != 'date') && ($key != 'lastaccess_user')) {
                $dataytotals1[$j] = $value;
                $j++;
            }
        }

        $view = Zikula_View::getInstance('Agoraportal', false);
        if ($datatype != 'totals') {
            //calculate the total values in the table in case that a only user is selected.

            $totals_bis = array();
            $num_centres = array();
            $u = 0;

            foreach ($items as $i => $item) {
                foreach ($item as $key => $value) {
                    if ($key == 'clientDNS') {
                        if (in_array($value, $num_centres) != TRUE) {
                            $num_centres[$u] = $value;
                            $u++;
                        }
                    }
                }
            }

            foreach ($items_totals as $i => $item) {

                foreach ($item as $key => $value) {
                    if ($key == 'clientDNS') {
                        $totals_bis[$key] = 'Totals (' . $num_centress[0]['num_centres'] . ' centres)';
                    } else if ($key == 'yearmonth') {
                        $totals_bis[$key] = '';
                    } elseif (($key == 'lastaccess') || ($key == 'lastaccess_date') || ($key == 'date') || ($key == 'lastaccess_user')) {
                        $totals_bis[$key] = '';
                    }
                    else
                        $totals_bis[$key] = $totals_bis[$key] + $value;
                }
            }
            $view->assign('totals', $totals_bis);
        }
        else {

            $view->assign('totals', $totals);
        }
        //codifiquem les dades que s'envien a la funcio que grafica depenent si cal enviar els totals o les dades en cru
        if (($datatype == 'totals' && $stats == 1) || ($datatype == 'totals' && $stats == 2)) {
            $datay1 = urlencode(serialize($datay1));
        } elseif ($datatype == 'totals' && $stats != 1 && $stats != 2) {
            $datay1 = urlencode(serialize($dataytotals1));
        } else {
            $datay1 = urlencode(serialize($datay1));
        }
        //creem l'array de dates per a mostrar en les etiquetes dels gràfics
        // $date_array=array();

        if ($date != '*') {
            $date_start = $date_st;
            $date_stop = $date_sto;
        } else {
            $date_start = strtotime($YY . $MM . $DD);
            $date_stop = strtotime($YYY . $MMM . $DDD);
        }

        if ($stats == 4) {
            $i = 0;
            $date_sto_aux = strtotime($YYY . $MMM . "31");
            while ($date_sto_aux >= $date_start) {
                $date_array[$i] = date('Ymd', $date_start);
                $date_start = strtotime("+1 day", $date_start);
                $i++;
            }
        }

        $dates = urlencode(serialize($date_array));

        $enllac = "index.php?module=Agoraportal&type=admin&func=statsservicesGraphs&stats=" . $datay1 . "&u=" . $usuari . "&e=" . $est . "&dates=" . $dates . "&yearmonth=" . $yearmonth . "&infotype=" . $infotype . "&datatype=" . $datatype;

        // Create output object
        $view->assign('results', $results);
        $view->assign('enllac', $enllac);
        $view->assign('stats', $stats);


        return $view->fetch('agoraportal_admin_statsStatisticsContent.tpl');
    }

    /**
     * Creates the CSV file and returns the statistics content
     * @author:     Aida Regi Cosculluela (aregi@xtec.cat)
     * @param:      The filter and pager values
     * @return:     A .csv file with the statistics content
     */
    public function statsGetCSVContent($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $stats = FormUtil::getPassedValue('stats_sel', 1, 'POST');
        $which = FormUtil::getPassedValue('which', "all", 'POST');

        $date_start = FormUtil::getPassedValue('date_start', -0, 'POST');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'POST');
        $orderby = FormUtil::getPassedValue('orderby', 'clientDNS', 'POST');


        // data format conversion
        list($DD, $MM, $YY) = explode("/", $date_start);
        list($DDD, $MMM, $YYY) = explode("/", $date_stop);
        $date_start = date('Ymd', strtotime($YY . $MM . $DD));
        $date_stop = date('Ymd', strtotime($YYY . $MMM . $DDD));

        $clients_text = "";
        if ($which == 'selected') {
            $clients = FormUtil::getPassedValue('clients', 'ALL', 'POST');
            if (!empty($clients)) {
                $clients_ar = explode(",", $clients);
                $clients_text = "";
                foreach ($clients_ar as $client) {
                    $clients_text .= "tbl.clientDNS = '$client' OR ";
                }
                $clients_text = "(" . substr($clients_text, 0, -4) . ") AND ";
            }
        }

        if ($stats == 1) {
            //Moodle Month
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop)
                $dates = "yearmonth = $month_start";
            else
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_month', $joinInfo, $where, (string) $orderby . ', yearmonth');
            $_SESSION['items'] = $items;
        }
        else if ($stats == 2) {
            //Moodle Week
            if ($date_start == $date_stop)
                $dates = "date = $date_start";
            else
                $dates = "date >= $date_start AND date <= $date_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_week', $joinInfo, $where, (string) $orderby . ', date');
        }
        else if ($stats == 3) {
            //Moodle Day
            if ($date_start == $date_stop)
                $dates = "date = $date_start";
            else
                $dates = "date >= $date_start AND date <= $date_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_moodle_stats_day', $joinInfo, $where, (string) $orderby . ', date');
        }
        else if ($stats == 4) {
            //Zikula Month
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop)
                $dates = "yearmonth = $month_start";
            else
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_intranet_stats_day', $joinInfo, $where, (string) $orderby . ', yearmonth');
        }

        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        $results = array();
        $totals = array();
        if (isset($items[0])) {
            $i = 0;
            $results[0] = Array();
            foreach ($items[0] as $k => $item) {
                $results[0][$i] = $k;
                $i++;
            }
        }

        global $ZConfig;
        $fp = fopen($ZConfig['System']['temp'] . '/stats.csv', 'w+');

        if (count($items) > 0) {
            foreach ($items as $i => $item) {
                $results[$i + 1] = $item;

                foreach ($item as $key => $value) {
                    if ($key == 'clientDNS')
                        $totals[$key] = 'Totals (' . count($items) . ' centres)';
                    else if ($key == 'yearmonth') {
                        $value = $value . "01";
                        $totals[$key] = '';
                        $yearmonth = date("Y-m-d", strtotime($value));
                        list($YYYY, $MMMM, $DDDD) = explode("-", $yearmonth);
                        $yearmonth = $MMMM . "/" . $YYYY;
                        $results[$i + 1][$key] = $yearmonth;
                    } elseif (($key == 'lastaccess') || ($key == 'lastaccess_date') || ($key == 'date') || ($key == 'lastaccess_user')) {
                        $totals[$key] = '';
                        $results[$i + 1][$key] = date("d/m/Y", strtotime($value));
                    }
                    else
                        $totals[$key] = $totals[$key] + $value;
                }
            }
        }
        foreach ($results as $i) {
            fputcsv($fp, $i);
        }

        fputcsv($fp, $totals);

        fclose($fp);

        $fullPath = $ZConfig['System']['temp'] . '/stats.csv';
        if ($fd = fopen($fullPath, "r")) {
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "csv":
                    header("Content-type: text/csv"); // add here more headers for diff. extensions
                    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\""); // use 'attachment' to force a download
                    break;
                default;
                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
            }
            header("Content-length: $fsize");
            header("Cache-control: private"); //use this to open files directly
            while (!feof($fd)) {
                $buffer = fread($fd, 2048);
                echo $buffer;
            }
        }
        fclose($fd);
        exit;

        // Create output object
        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('results', $results);
        $view->assign('totals', $totals);

        /* CAT:Bubble chart */

        return $view->fetch('agoraportal_admin_statsStatisticsContent.tpl');
    }

    public function statsDownloadCSV() {
        if (!$export_pack = ModUtil::apiFunc('Export', 'admin', 'getExportPack', array('modules_selected' => $modules_selected))) {
            LogUtil::registerError($this->__('It\'s not possible to generate the export pack'));
        } else {
            if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
                throw new Zikula_Exception_Forbidden();
            }
            $fileSize = filesize($export_pack);
            $file = basename($export_pack);
            // begin writing headers
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Type: application/tar");
            // force the download
            $header = "Content-Disposition: attachment; filename=" . $file . ";";
            header($header);
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $fileSize);
            ob_end_clean();
            readfile($export_pack);
            unlink($export_pack);
        }
    }

    public function statsservicesGraphs($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }


        $datayy1 = FormUtil::getPassedValue('stats', 1, 'GET');
        $dates = FormUtil::getPassedValue('dates', 1, 'GET');
        $yearmonth = FormUtil::getPassedValue('yearmonth', 1, 'GET');
        $usuari = FormUtil::getPassedValue('u', 0, 'GET');
        $titol = FormUtil::getPassedValue('e', 0, 'GET');
        $infotype = FormUtil::getPassedValue('infotype', 0, 'GET');
        $datatype = FormUtil::getPassedValue('datatype', 0, 'GET');
        $datayyy1 = stripslashes($datayy1);
        $datay1aux = unserialize(urldecode($datayy1));
        $datesaux = unserialize(urldecode($dates));
        $datay1 = array();
        $datay2 = "";
        $variablesx = "";
        $i = 0;

        foreach ($datay1aux as $indice => $valor) {
            $datay1[$i] = $valor;
            $variablesx[$i] = $indice;
            $i++;
        }

        //echo $data_array;
        $variables = array();
        if ($titol == 'Diàries Moodle') {
            $i = 0;
            foreach ($variablesx as $indice => $valor) {
                $valoraus = (($valor % 24));
                if ($datatype != 'totals')
                    $variables[$indice] = date("d/m/y", strtotime($datesaux[$i])) . " - " . $valoraus . "h.";
                else
                    $variables[$indice] = $valoraus . "h.";
                if (($valor % 24 == 23) && ($indice != 0)) {
                    $i++;
                    ;
                }
            }
            if ($datatype != 'totals')
                $dates = " De " . $variables[0] . " a " . $variables[$indice];
            else {
                $dia = substr($datesaux[sizeof($datesaux) - 1], -2, 2);
                $mes = substr($datesaux[sizeof($datesaux) - 1], -4, 2);
                $any = substr($datesaux[sizeof($datesaux) - 1], 0, 4);
                $datafi = $any . $mes . $dia;
                $dates = " De " . date("d/m/y", strtotime($datesaux[0])) . " a " . date("d/m/y", strtotime($datafi));
            }
        }
        if ($titol == 'Mensuals Moodle') {
            if ($infotype != 'accessos') {
                $i = 0;
                foreach ($variablesx as $indice => $valor) {
                    $yearmont = date("Y-m-d", strtotime($datesaux[$i]));
                    list($YYYY, $MMMM, $DDDD) = explode("-", $yearmont);
                    $yearmont = $MMMM . "/" . $YYYY;
                    $variables[$i] = $yearmont;
                    $i++;
                }
            } else {
                $i = 0;
                foreach ($variablesx as $indice => $valor) {

                    $variables[$indice] = date("d/m/Y", strtotime($datesaux[$i]));
                    $i++;
                    ;
                }
            }
            $dates = " De " . $variables[0] . " a " . $variables[$i - 1];
        }

        if ($titol == 'Setmanals Moodle' || $titol == 'Mensuals Intranet') {
            $i = 0;
            foreach ($variablesx as $indice => $valor) {

                $variables[$indice] = date("d/m/y", strtotime($datesaux[$indice]));

                $i++;
            }
            if ($titol == 'Setmanals Moodle' && $infotype != 'accessos')
                $data_fi = date("d/m/y", strtotime("+7 days", strtotime($datesaux[$i - 1])));
            else
                $data_fi = $variables[$i - 1];
            $dates = " De " . $variables[0] . " a " . $data_fi;
        }

        // content="text/plain; charset=utf-8"
        require_once ('modules/Agoraportal/includes/jpgraph/src/jpgraph.php');
        require_once ('modules/Agoraportal/includes/jpgraph/src/jpgraph_line.php');

        try {
            // Setup the graph
            $graph = new Graph(1200, 500);
            if (sizeof($datay1) == 0 || sizeof($datay1) == 1) {
                throw new JpGraphException('Les dades que has escollit no contenen prou valors');
            }
            $graph->SetScale("textlin", 0, max($datay1) + (max($datay1) / 10));

            $theme_class = new UniversalTheme;

            $graph->SetTheme($theme_class);
            $graph->img->SetAntiAliasing(false);
            $graph->SetBox(false);
            $graph->img->SetMargin(60, 30, 20, 20);
            $graph->img->SetAntiAliasing();

            $graph->yaxis->HideZeroLabel();
            $graph->yaxis->HideLine(false);
            $graph->yaxis->HideTicks(false, false);

            $graph->xgrid->Show();
            $graph->xgrid->SetLineStyle("solid");
            $graph->xaxis->SetTickLabels($variables);
            if ($titol == 'Diàries Moodle') {
                $graph->xaxis->SetLabelAngle(75);
                $graph->xaxis->SetTextLabelInterval(4);
                $graph->xaxis->SetLabelMargin(3);
                $graph->xaxis->title->Set("Hores");
                $graph->yaxis->title->Set("Nombre d'accessos");
                $graph->legend->Pos(0.5, 0.96, "right", "center");
                $nom_titol = $titol . ". " . $dates;
            } elseif ($titol == 'Mensuals Intranet') {
                $graph->xaxis->SetLabelAngle(75);
                $graph->xaxis->SetTextLabelInterval(6);
                $graph->xaxis->SetLabelMargin(3);
                $graph->xaxis->SetLabelMargin(4);
                $graph->xaxis->title->Set("Dia");
                $graph->yaxis->title->Set("Nombre d'accessos");
                $graph->legend->Pos(0.5, 0.96, "right", "center");
                $nom_titol = $titol . $dates;
            } else {
                $graph->xaxis->SetLabelAngle(75);
                $graph->xaxis->SetLabelMargin(4);
                $graph->legend->Pos(0.5, 0.96, "right", "center");
                //$graph->xaxis->SetTextLabelInterval(4);
                if ($infotype == 'courses') {
                    $titoltipus = "Nombre de cursos";
                } elseif ($infotype == 'users') {
                    $titoltipus = "Nombre d'usuaris";
                } elseif ($infotype == 'activities') {
                    $titoltipus = "Nombre d'activitats";
                } elseif ($infotype == 'accessos') {
                    $titoltipus = "Nombre d'accessos";
                    $graph->xaxis->SetLabelAngle(75);
                    $graph->xaxis->SetLabelMargin(3);
                }
                $graph->yaxis->title->Set($titoltipus);
                $nom_titol = $titol . ". " . $titoltipus . "." . $dates;
            }
            $graph->title->Set("Estadístiques " . $nom_titol);
            $graph->yaxis->SetTitleMargin(50);
            $graph->xgrid->SetColor('#E3E3E3');
            $graph->legend->SetLayout(LEGEND_HOR);
            // Create the first line
            $p1 = new LinePlot($datay1);
            $graph->Add($p1);
            $p1->SetColor("#FF1493");
            $p1->SetLegend("$usuari");

            //Create the second line
            /*
              $p2 = new LinePlot($datay2);
              $graph->Add($p2);
              $p2->SetColor("#B22222");
              $p2->SetLegend($usuari);
             */
            // Create the third line
            /* $p3 = new LinePlot($datay3);
              $graph->Add($p3);
              $p3->SetColor("#FF1493");
              $p3->SetLegend('Line 3');
             */
            $graph->legend->SetFrameWeight(1);

            // Output line
            $graph->Stroke();
        } catch (JpGraphException $e) {
            // .. do necessary cleanup
            // Send back error message
            $e->Stroke();
        }
    }

    public function updateDiskUse($args) {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            $allowedIps = ModUtil::getVar('Agoraportal', 'allowedIpsForCalcDisckConsume');
            $allowedIpsArray = explode(',', $allowedIps);

            $requestaddr = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
            if (!in_array($requestaddr, $allowedIpsArray)) {
                LogUtil::registerError($this->__('No teniu accés a executar aquesta funcionalitat'));
                return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
            }
        }

        $debug = FormUtil::getPassedValue('debug', isset($args['debug']) ? true : false, 'GET');

        // Load general config
        global $agora;

        // General vars
        $error = false;
        $errorMsg = '';
        $clientsMailThreshold = ModUtil::getVar('Agoraportal', 'clientsMailThreshold');
        $adminReport = '';
        $adminemails = ModUtil::getVar('Agoraportal', 'warningMailsTo');
        $adminemails = explode(',', $adminemails);

        // Check if Mailer is active
        $modid = ModUtil::getIdFromName('Mailer');
        $modinfo = ModUtil::getInfo($modid);
        $mailerAvailable = ($modinfo['state'] == 3) ? 1 : 0;

        // Build warning message
        $warningMsgTpl = "<p>Benvolgut/da,</p><p>Aquest missatge és per informar-vos de què ###warningMsgForUser###";
        $warningMsgTpl .= " En cas de superar el límit d'espai consumit, els usuaris no hi podran pujar fitxers.";
        $warningMsgTpl .= " Actualment heu consumit el ###diskConsumeValue###% de la quota.</p>";
        $warningMsgTpl .= "<p>Els gestors dels serveis Àgora del centre poden sol·licitar l'ampliació de la quota del servei des de la secció <strong>altres sol·licituds</strong> de l'<a href=\"" . $agora['server']['server'] . $agora['server']['base'] . "portal\">aplicació de gestió dels serveis d'Àgora</a>.</p>";
        $warningMsgTpl .= "<p>Atentament,</p>";
        $warningMsgTpl .= "<p>---<br />L'equip del projecte Àgora</p>";
        $warningMsgTpl .= "<p>P.D.: Aquest missatge s'envia automàticament. Si us plau, no el respongueu.</p>";

        // Get available services (currently: intranet, marsupial, moodle)
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        // Build array with info of the services to check and the path to its file
        foreach ($services as $service) {
            // Marsupial has defaultDiskSpace = 0
            if ($service['defaultDiskSpace'] > 0) {
                $path = $agora['server']['root'] . $agora[$service['serviceName']]['datadir'] . $agora[$service['serviceName']]['diskusagefile'];
                $userprefix = $agora[$service['serviceName']]['userprefix'];

                if (!file_exists($path)) {
                    $errorMsg .= $this->__('No s\'ha trobat el fitxer de consums de disc per al servei: ' . $service['serviceName'] . '<br />');
                    $error = true;
                } else {
                    $noValidFile = false;
                    // TODO: Check if it is a valid file. If not send a warning mail
                    if ($noValidFile) {
                        $errorMsg .= $this->__('El fitxer de consums de disc no és valid per: ' . $service['serviceName'] . '<br />');
                        $error = true;
                    } else {
                        // Add service because usage file is generated correctly
                        $servicesArray[] = array(
                            'serviceName' => $service['serviceName'],
                            'serviceId' => $service['serviceId'],
                            'userprefix' => $userprefix,
                            'path' => $path);
                    }
                }
            }
        }

        // If previous step was successful, proceed with the disk update and the e-mail sending
        if (isset($servicesArray)) {
            // Get info of the structure of the table agoraportal_client_services
            $pntable = DBUtil::getTables();
            $c = $pntable['agoraportal_client_services_column'];

            // For each service, process the disk usage file and send e-mail if necessary
            foreach ($servicesArray as $service) {
                // 2013.11.26 @aginard: Don't send e-mail for Moodle 1.9
                if ($service['serviceName'] == 'moodle') {
                    continue;
                }
                
                if ($debug) {
                    echo '<br/><br/>Servei: ' . strtoupper($service['serviceName']);
                }

                // Get all the clients who have the service activated
                $clientsAndServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array(
                            'key' => 'activedId',
                            'service' => $service['serviceId'],
                            'state' => 1));

                // Parse the file and update the information
                $lines = file($service['path']);
                foreach ($lines as $line_num => $line) {
                    if (preg_match('/^\d+\s+' . $service['userprefix'] . '[1-9]\d*$/', $line)) {
                        // get usage value
                        $usageArray = preg_split('/\s+' . $service['userprefix'] . '/', $line);
                        $usageValue = trim($usageArray[0]);
                        $usageClient = trim($usageArray[1]);

                        // Update database with usage values
                        $where = "$c[activedId] = $usageClient AND $c[serviceId] = $service[serviceId]";
                        $value = array('diskConsume' => $usageValue);
                        if (!DBUtil::updateObject($value, 'agoraportal_client_services', $where)) {
                            $errorMsg .= $this->__('S\'ha produït un error en l\'actualització de l\'espai consumit a la base de dades per: ' . $service['serviceName'] . ' - ' . $userprefix . $usageClient . '<br />');
                            $error = true;
                        }

                        $usageValue = round($usageValue / 1024);
                        $diskConsume = ($clientsAndServices[$usageClient]['diskSpace'] > 0) ? round(($usageValue / $clientsAndServices[$usageClient]['diskSpace']) * 100) : 0;
                        $textColor = 'black';
                        $warningMsgForUser = '';
                        $absDistance = $clientsAndServices[$usageClient]['diskSpace'] - $usageValue;
                        $maxAbsFreeQuota = ModUtil::getVar('Agoraportal', 'maxAbsFreeQuota');

                        if (($diskConsume > $clientsMailThreshold) && ($absDistance < $maxAbsFreeQuota)) {
                            // Send warning message to client managers
                            $warningMsgForUser = ($diskConsume > 100) ? " heu superat el límit d'espai de disc disponible per al servei '" . $service['serviceName'] . "' d'Àgora." : " esteu a prop de superar el límit d'espai de disc disponible per al servei '" . $service['serviceName'] . "' d'Àgora.";
                            $warningMsg = str_replace('###warningMsgForUser###', $warningMsgForUser, $warningMsgTpl);
                            $warningMsg = str_replace('###diskConsumeValue###', $diskConsume, $warningMsg);

                            if ($mailerAvailable) {
                                // Get client managers e-mails'
                                $managers = ModUtil::apiFunc('Agoraportal', 'admin', 'getManagers', array('clientCode' => $clientsAndServices[$usageClient]['clientCode']));
                                $toManagers = array();
                                foreach ($managers as $manager) {
                                    if ($manager['state'] == 1) {
                                        $toManagers[] = $manager['email'];
                                    }
                                }
                                // Add clientCode to e-mail receivers
                                $uid = UserUtil::getIdFromName($clientsAndServices[$usageClient]['clientCode']);
                                $toManagers[] = UserUtil::getVar('email', $uid);

                                // Send the e-mail
                                if (!empty($toManagers)) {
                                    $sendMail = ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array('toname' => UserUtil::getVar('uname', $uid),
                                                'toaddress' => $toManagers,
                                                'subject' => $this->__('Ocupació de disc dels serveis a Àgora'),
                                                'body' => $warningMsg,
                                                'html' => 1));
                                } else {
                                    $errorMsg .= $this->__('No s\'ha enviat l\'avís a cap usuari/ària del centre amb codi ' . $clientsAndServices[$usageClient]['clientCode'] . '<br />');
                                    $error = true;
                                }
                            }

                            // Save error message for admin report
                            $url = ModUtil::Func('Agoraportal', 'user', 'getServiceLink', array('serviceName' => $service['serviceName'],
                                                                                                'clientDNS' => $clientsAndServices[$usageClient]['clientDNS']));
                            $adminReport .= '<h4>' . $clientsAndServices[$usageClient]['clientCode'];
                            $adminReport .= " (<a href=\"$url\" target=\"_blank\">$url</a>): </h4>";
                            $adminReport .= $warningMsg . '<br/><hr/><br/>';

                            // Var for debug
                            $textColor = ($diskConsume > 100) ? 'red' : 'orange';
                        }
                        if ($debug) {
                            if (isset($clientsAndServices[$usageClient]['clientCode'])) {
                                echo '<br><span style="color:' . $textColor . '";>' . $clientsAndServices[$usageClient]['clientCode'] . ': ' . $diskConsume . ' % (' . $usageValue . ' / ' . $clientsAndServices[$usageClient]['diskSpace'] . ')</span>';
                            }
                        } else if (!empty($warningMsgForUser)) {
                            echo '<br><span style="color:' . $textColor . '";>' . $clientsAndServices[$usageClient]['clientCode'] . ': ' . $warningMsgForUser . '</span>';
                        }
                    }
                }
            }
        }

        // Admin report
        if ($mailerAvailable) {
            ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array(
                'toname' => $this->__('Agoraportal admin'),
                'toaddress' => $adminemails,
                'subject' => $this->__('Resum de missatges sobre quotes als usuaris'),
                'body' => $adminReport,
                'html' => 1));
        }

        // Info Agoraportal admins of the presence of errors
        if ($error) {
            echo '<br/><br/>ERRORS:<br/>' . $errorMsg;
            // Send warning message to configured recipients if Mailer is available
            if ($mailerAvailable) {
                // Send the e-mails
                ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array(
                    'toname' => $this->__('Agoraportal admin'),
                    'toaddress' => $adminemails,
                    'subject' => $this->__('Error en el càlcul de consum de disc'),
                    'body' => $this->__('<p>S\'han produït errors en la gestió del consum de disc per part dels centres. Missatge de l\'error:</p><p>' . $errorMsg . '</p>'),
                    'html' => 1));
            }
        }
        return true;
    }

    /**
     * Display the edit form for a request
     * 
     * @author		Aida Regi Cosculluela (aregi@xtec.cat)
     * @param		The request Id and the filter values
     * @return		The edit form
     */
    public function editRequest($args) {
        $requestId = FormUtil::getPassedValue('requestId', isset($args['requestId']) ? $args['requestId'] : null, 'GET');
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'GET');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'GET');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GET');
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : 0, 'GET');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : -1, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $requestsstates = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestsStates');
        $requests = ModUtil::apiFunc('Agoraportal', 'admin', 'getInfodeleteRequest', array('requestId' => $requestId));
        $locations = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations');
        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');

        // Check module Mailer availability
        $modid = ModUtil::getIdFromName('Mailer');
        $modinfo = ModUtil::getInfo($modid);
        $mailer = ($modinfo['state'] == 3) ? true : false;


        return $this->view->assign('mailer', $mailer)
                        ->assign('requestsstates', $requestsstates)
                        ->assign('requests', $requests)
                        ->assign('requestId', $requestId)
                        ->assign('services', $services)
                        ->assign('init', $init)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('locations', $locations)
                        ->assign('types', $types)
                        ->assign('service', $service)
                        ->assign('stateFilter', $stateFilter)
                        ->fetch('agoraportal_admin_editRequest.tpl');
    }

    /**
     * Process the values received from the request edit form
     * 
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @author      Aida Regi
     * @param		The main client and request parameters
     * @return		An error message if fails and redirect user to function requestsList
     */
    public function updateRequest($args) {
        $state = FormUtil::getPassedValue('state', isset($args['state']) ? $args['state'] : null, 'POST');
        $userComments = FormUtil::getPassedValue('userComments', isset($args['userComments']) ? $args['userComments'] : null, 'POST');
        $adminComments = FormUtil::getPassedValue('adminComments', isset($args['adminComments']) ? $args['adminComments'] : null, 'POST');
        $privateNotes = FormUtil::getPassedValue('privateNotes', isset($args['privateNotes']) ? $args['privateNotes'] : null, 'POST');
        $requestId = FormUtil::getPassedValue('requestId', isset($args['requestId']) ? $args['requestId'] : null, 'POST');
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'POST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'POST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'POST');
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : '', 'POST');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : '', 'POST');
        $sendMail = FormUtil::getPassedValue('sendMail', isset($args['sendMail']) ? $args['sendMail'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        // Edit the request
        $requestEdited = ModUtil::apiFunc('Agoraportal', 'admin', 'editRequest', array('requestId' => $requestId,
                    'items' => array('requestStateId' => $state,
                        'userComments' => $userComments,
                        'adminComments' => $adminComments,
                        'privateNotes' => $privateNotes,
                        'timeClosed' => time())));

        // In case of error
        if (!$requestEdited) {
            LogUtil::registerError($this->__('Error en la modificació de les taules de la base de dades'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList', array('init' => $init,
                                'search' => $search,
                                'searchText' => $searchText,
                                'service' => $service,
                                'stateFilter' => $stateFilter)));
        }

        switch ($state) {
            case '1':
                $resolt = 'Pendent';
                break;
            case '2':
                $resolt = 'En estudi';
                break;
            case '3':
                $resolt = 'Solucionada';
                break;
            case '4':
                $resolt = 'Denegada';
                break;
        }

        ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('clientCode' => $clientCode,
            'actionCode' => 2,
            'action' => $this->__f('S\'ha atès la vostra sol·licitud i ha quedat com a <strong>%s</strong>. Podeu trobar més informació <a href="index.php?module=Agoraportal&type=user&func=requests">aquí</a>', $resolt)));

        // Send informational mail if it is necessary
        // check if module mailer is active
        $modid = ModUtil::getIdFromName('Mailer');
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3 && $sendMail) {
            // Get list of requests' states
            $requestsStates = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestsStates');
            // Get description of current state
            $stateDesc = '';
            foreach ($requestsStates as $requestState) {
                if ($state == $requestState['requestStateId']) {
                    $stateDesc = $requestState['name'];
                }
            }
            // We need to know service base URL
            global $agora;
            $view = Zikula_View::getInstance('Agoraportal', false);
            $view->assign('baseURL', $agora['server']['server'] . $agora['server']['base']);
            $view->assign('adminComments', nl2br($adminComments));
            $view->assign('stateDesc', $stateDesc);

            $mailContent = $view->fetch('agoraportal_admin_sendMailRequest.tpl');
            // get client's email (a8000001@xtec.cat)
            $uidClient = UserUtil::getIdFromName($clientCode);
            $clientVars = UserUtil::getVars($uidClient);

            // Send e-mail to client code
            $toUsers = array($clientVars['email']);

            // Get all managers
            $managers = ModUtil::apiFunc('Agoraportal', 'admin', 'getManagers', array('clientCode' => $clientCode));
            // Add managers to destination
            foreach ($managers as $manager) {
                $toManagers[] = $manager['email'];
            }
            $toUsers = array_merge($toUsers, $toManagers);

            // Send the e-mail (BCC to site e-mail)
            $sendMail = ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array('toname' => $clientCode,
                        'toaddress' => $toUsers,
                        'subject' => __('Estat de les sol·licituds a Àgora'),
                        'bcc' => array(array('address' => System::getVar('adminmail'))),
                        'body' => $mailContent,
                        'html' => 1));

            if ($sendMail) {
                LogUtil::registerStatus($this->__('S\'ha enviat un missatge de correu electrònic informatiu al centre i als gestors'));
            }
        }

        LogUtil::registerStatus($this->__('El registre s\'ha editat correctament'));

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList', array('init' => $init,
                            'search' => $search,
                            'searchText' => $searchText,
                            'service' => $service,
                            'stateFilter' => $stateFilter)));
    }

    /**
     * Delete a service
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param		The request identity
     * @param       Aida Regi
     * @return		An error message if fails and redirect user to function servicesList
     */
    public function deleteRequest($args) {
        $requestId = FormUtil::getPassedValue('requestId', isset($args['requestId']) ? $args['requestId'] : null, 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $client = ModUtil::apiFunc('Agoraportal', 'admin', 'getInfodeleteRequest', array('requestId' => $requestId));
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat la sol·licitud'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList'));
        }

        if (!$confirm) {
            return $this->view->assign('requests', $client)
                            ->fetch('agoraportal_admin_deleteRequest.tpl');
        }
        // the client deletion has been confirmed
        // Confirm authorisation code
        $this->checkCsrfToken();
        if (!ModUtil::apiFunc('Agoraportal', 'admin', 'deleteRequest', array('requestId' => $requestId))) {
            LogUtil::registerError($this->__('L\'esborrament ha fallat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList'));
    }

    /**
     * Display the list of services associated with clients
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @author      Aida Regi
     * @param		The filter and pager values
     * @return		The services list page
     */
    public function requestsList($args) {
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'GETPOST');
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : 0, 'GETPOST');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : -1, 'GETPOST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 0, 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'GETPOST');

        if (SessionUtil::getVar('navStateRequests')) {
            $stateArray = unserialize(SessionUtil::getVar('navStateRequests'));
            $init = $stateArray['init'];
            $service = $stateArray['service'];
            $stateFilter = $stateArray['stateFilter'];
            $search = $stateArray['search'];
            $searchText = $stateArray['searchText'];
            $rpp = $stateArray['rpp'];
        }

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $servicesListContent = ModUtil::func('Agoraportal', 'admin', 'requestsListContent', array('init' => $init,
                    'search' => $search,
                    'searchText' => trim($searchText),
                    'stateFilter' => $stateFilter,
                    'service' => $service,
                    'rpp' => $rpp));
        $requestsstates = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestsStates');
        return $this->view->assign('requestListContent', $servicesListContent)
                        ->assign('requestsstates', $requestsstates)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('service', $service)
                        ->assign('stateFilter', $stateFilter)
                        ->assign('rpp', $rpp)
                        ->fetch('agoraportal_admin_requestsList.tpl');
    }

    /**
     * Get the list of requests
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		An array with all the clients and services
     */
    public function requestsListContent($args) {
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'POST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'POST');
        $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : '0', 'POST');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : 0, 'POST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 1, 'POST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : null, 'POST');
        $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : 2, 'POST');

        // Escape special chars
        $searchText = addslashes($searchText);

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        $requests = ModUtil::apiFunc('Agoraportal', 'admin', 'getAllRequests', array('init' => $init,
                    'rpp' => $rpp,
                    'service' => $service,
                    'state' => $stateFilter,
                    'search' => $search,
                    'order' => $order,
                    'searchText' => $searchText));

        $requestsNumber = ModUtil::apiFunc('Agoraportal', 'admin', 'getAllRequests', array('onlyNumber' => 1,
                    'service' => $service,
                    'state' => $stateFilter,
                    'search' => $search,
                    'order' => $order,
                    'searchText' => $searchText));

        $pager = ModUtil::func('Agoraportal', 'admin', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $requestsNumber,
                    'urltemplate' => "javascript:requestsList($service,$stateFilter,$search,'$searchText',$order,%%,$rpp)"));

        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');

        return $this->view->assign('requests', $requests)
                        ->assign('pager', $pager)
                        ->assign('requestsNumber', $requestsNumber)
                        ->assign('services', $services)
                        ->assign('types', $types)
                        ->assign('init', $init)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('service', $service)
                        ->assign('order', $order)
                        ->assign('stateFilter', $stateFilter)
                        ->fetch('agoraportal_admin_requestsListContent.tpl');
    }

    /**
     * List files from moodledata and zkdata
     * 
     * @global array    agora
     * @param string    serviceName
     * @param int       activedId
     * 
     * @return Boolean 
     */
    public function listDataDirs() {

        $serviceName = FormUtil::getPassedValue('serviceName');
        $activedId = FormUtil::getPassedValue('activedId');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            $allowedIps = ModUtil::getVar('Agoraportal', 'allowedIpsForCalcDisckConsume');
            $allowedIpsArray = explode(',', $allowedIps);

            $requestaddr = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
            if (!in_array($requestaddr, $allowedIpsArray)) {
                LogUtil::registerError($this->__('No teniu accés a executar aquesta funcionalitat'));
                return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
            }
        }

        // Load general config
        global $agora;

        if (isset($serviceName) && isset($activedId)) {
            $dataDir = $agora['server']['root'] . $agora[$serviceName]['datadir'] . $agora['server']['userprefix'] . $activedId;
            if (filetype($dataDir) == 'dir') {
                echo '<h3>' . $agora['server']['userprefix'] . $activedId . ': ' . exec("du -skh $dataDir") . '</h3>';
                $dh2 = opendir($dataDir);
                if ($dh2) {
                    while (($subDir = readdir($dh2)) !== false) {
                        if ($subDir != '.' && $subDir != '..') {
                            echo "<strong>$subDir</strong>: " . exec("du -skh $dataDir/$subDir") . "<br />";
                        }
                    }
                    closedir($dh2);
                }
            }
        } else {
            $moodleDataPath = $agora['server']['root'] . $agora['moodle2']['datadir'];
            $zikulaDataPath = $agora['server']['root'] . $agora['intranet']['datadir'];
            $dataDirs = array($moodleDataPath, $zikulaDataPath);

            foreach ($dataDirs as $dataDir) {
                if (is_dir($dataDir)) {
                    $dh = opendir($dataDir);
                    if ($dh) {
                        while (($file = readdir($dh)) !== false) {
                            if (preg_match('/^' . $agora['server']['userprefix'] . '[1-9]\d*$/', $file)) {
                                if (filetype($dataDir . $file) == 'dir') {
                                    echo "<h3>$file: " . exec("du -skh $dataDir$file") . "</h3>";
                                    $dh2 = opendir($dataDir . $file);
                                    if ($dh2) {
                                        while (($subDir = readdir($dh2)) !== false) {
                                            if ($subDir != '.' && $subDir != '..') {
                                                echo "<strong>$subDir</strong>: " . exec("du -skh $dataDir$file/$subDir") . "<br />";
                                            }
                                        }
                                        closedir($dh2);
                                    }
                                }
                            }
                        }
                        closedir($dh);
                        echo '<br /><br /><br />';
                    }
                }
            }
        }

        return true;
    }
}
