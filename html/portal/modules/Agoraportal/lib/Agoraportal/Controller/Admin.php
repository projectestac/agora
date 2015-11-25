<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

class Agoraportal_Controller_Admin extends Zikula_AbstractController {

    const STATUS_ENABLED = 1;
    const STATUS_TOREVISE = 0;
    const STATUS_DENIED = -2;
    const STATUS_WITHDRAWN = -3;
    const STATUS_DISABLED = -4;

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Redirect administrators to services list
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:		Redirect user to function servicesList
     */
    public function main() {
        AgoraPortal_Util::requireAdmin();
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
    }

    /**
     * Display the edit form for a service
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The client-service identity and the filter values
     * @return:		The edit form
     */
    public function editService($args) {
        AgoraPortal_Util::requireAdmin();

        $clientServiceId = AgoraPortal_Util::getFormVar($args, 'clientServiceId', null, 'GET');
        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'GET');
        $search = AgoraPortal_Util::getFormVar($args, 'search', '', 'GET');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'GET');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 0, 'GET');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', -1, 'GET');

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
        AgoraPortal_Util::requireAdmin();

        $clientServiceId = AgoraPortal_Util::getFormVar($args, 'clientServiceId', null, 'POST');
        $clientId = AgoraPortal_Util::getFormVar($args, 'clientId', null, 'POST');
        $clientState = AgoraPortal_Util::getFormVar($args, 'clientState', null, 'POST');
        $clientDescription = AgoraPortal_Util::getFormVar($args, 'clientDescription', null, 'POST');
        $clientCode = AgoraPortal_Util::getFormVar($args, 'clientCode', null, 'POST');
        $clientDNS = AgoraPortal_Util::getFormVar($args, 'clientDNS', null, 'POST');
        $clientName = AgoraPortal_Util::getFormVar($args, 'clientName', null, 'POST');
        $clientAddress = AgoraPortal_Util::getFormVar($args, 'clientAddress', null, 'POST');
        $clientCity = AgoraPortal_Util::getFormVar($args, 'clientCity', null, 'POST');
        $clientPC = AgoraPortal_Util::getFormVar($args, 'clientPC', null, 'POST');
        $contactName = AgoraPortal_Util::getFormVar($args, 'contactName', null, 'POST');
        $contactMail = AgoraPortal_Util::getFormVar($args, 'contactMail', null, 'POST');
        $contactProfile = AgoraPortal_Util::getFormVar($args, 'contactProfile', null, 'POST');
        $state = AgoraPortal_Util::getFormVar($args, 'state', null, 'POST');
        $dbHost = AgoraPortal_Util::getFormVar($args, 'dbHost', null, 'POST');
        $serviceDB = AgoraPortal_Util::getFormVar($args, 'serviceDB', null, 'POST');
        $observations = AgoraPortal_Util::getFormVar($args, 'observations', null, 'POST');
        $annotations = AgoraPortal_Util::getFormVar($args, 'annotations', null, 'POST');
        $sendMail = AgoraPortal_Util::getFormVar($args, 'sendMail', null, 'POST');
        $onlyClient = AgoraPortal_Util::getFormVar($args, 'onlyClient', 0, 'POST');
        $locationId = AgoraPortal_Util::getFormVar($args, 'locationId', null, 'POST');
        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'POST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', '', 'POST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'POST');
        $service = AgoraPortal_Util::getFormVar($args, 'service', '', 'POST');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', '', 'POST');
        $typeId = AgoraPortal_Util::getFormVar($args, 'typeId', 0, 'POST');
        $noVisible = AgoraPortal_Util::getFormVar($args, 'noVisible', 0, 'POST');
        $diskSpace = AgoraPortal_Util::getFormVar($args, 'diskSpace', 0, 'POST');
        $extraFunc = AgoraPortal_Util::getFormVar($args, 'extraFunc', null, 'POST');
        $educat = AgoraPortal_Util::getFormVar($args, 'educat', 0, 'POST');
        $version = AgoraPortal_Util::getFormVar($args, 'version', null, 'POST');

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

            // Get the definition of the services
            $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

            $serviceName = $services[$clientService['serviceId']]['serviceName'];
            $serviceURL = $services[$clientService['serviceId']]['URL'];

            // Autofill dbHost var with default value. This is a guess. dbHost should come from web form.
            if ((is_null($dbHost) || empty($dbHost)) && (($serviceName == 'intranet') || ($serviceName == 'nodes'))) {
                $dbHost = $agora['intranet']['host'];
            }

            // Create a var for admin password where to keep it in order to send it by e-mail
            $password = '';

            // If it is an activation, checks if the service exists. If not create it
            if ($state == self::STATUS_ENABLED) {
                if ($clientService['activedId'] == 0) {
                    $result = ModUtil::apiFunc('Agoraportal', 'admin', 'activeService',
                                                array('clientServiceId' => $clientServiceId,
                                                      'dbHost' => $dbHost,
                                                      'serviceName' => $serviceName));
                    if (!$result) {
                        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList', array('init' => $init,
                                            'search' => $search,
                                            'searchText' => $searchText,
                                            'service' => $service,
                                            'stateFilter' => $stateFilter)));
                    } else {
                        $serviceDB = $result['serviceDB'];
                        $password = $result['password'];
                    }
                }
            }

            // Deny the new service
            if ($state == self::STATUS_DENIED) {
                // Insert the action in logs table
                ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 2,
                    'action' => $this->__f('S\'ha denegat el servei %s', $serviceName)));
            }

            // Withdraw the service
            if ($state == self::STATUS_WITHDRAWN) {
                // edit service information and delete the database assigned
                $clientServiceEdited = ModUtil::apiFunc('Agoraportal', 'admin', 'editService', array('clientServiceId' => $clientServiceId,
                            'items' => array('serviceDB' => '',
                                'activedId' => '')));
                // Insert the action in logs table
                ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 2,
                    'action' => $this->__f('S\'ha donat de baixa el servei %s', $serviceName)));
            }

            // Deactivate the new service
            if ($state == self::STATUS_DISABLED) {
                // Insert the action in logs table
                ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 2,
                    'action' => $this->__f('S\'ha desactivat el servei %s', $serviceName)));
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
                        ->assign('serviceName', $serviceName)
                        ->assign('serviceURL', $serviceURL)
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
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList', array(
                        'init' => $init,
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
        AgoraPortal_Util::requireAdmin();

        $clientId = AgoraPortal_Util::getFormVar($args, 'clientId', null, 'GET');
        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'GET');
        $search = AgoraPortal_Util::getFormVar($args, 'search', '', 'GET');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'GET');

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
        AgoraPortal_Util::requireAdmin();

        $clientId = AgoraPortal_Util::getFormVar($args, 'clientId');
        $confirm = AgoraPortal_Util::getFormVar($args, 'confirm', null, 'POST');
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
        AgoraPortal_Util::requireAdmin();

        $clientServiceId = AgoraPortal_Util::getFormVar($args, 'clientServiceId');
        $confirm = AgoraPortal_Util::getFormVar($args, 'confirm', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'GETPOST');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 0, 'GETPOST');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', 0, 'GETPOST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', 0, 'GETPOST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'GETPOST');
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15, 'GETPOST');

        if (SessionUtil::getVar('navState')) {
            $stateArray = unserialize(SessionUtil::getVar('navState'));
            $init = $stateArray['init'];
            $service = $stateArray['service'];
            $stateFilter = $stateArray['stateFilter'];
            $search = $stateArray['search'];
            $searchText = $stateArray['searchText'];
            $rpp = $stateArray['rpp'];
        }

        if (SessionUtil::getVar('execOper')) {
            $execOper = SessionUtil::getVar('execOper');
            SessionUtil::delVar('execOper');
        } else {
            $execOper = false;
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
                        ->assign('execOper', $execOper)
                        ->fetch('agoraportal_admin_servicesList.tpl');
    }

    /**
     * Get the list of services associated with clients
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		An array with all the clients and services
     */
    public function servicesListContent($args) {
        AgoraPortal_Util::requireAdmin();

        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'POST');
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15, 'POST');
        $service = AgoraPortal_Util::getFormVar($args, 'service', '0', 'POST');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', 0, 'POST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', 1, 'POST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', null, 'POST');
        $order = AgoraPortal_Util::getFormVar($args, 'order', 2, 'POST');

        // Escape special chars
        $searchText = addslashes($searchText);

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
        $clientsNumber = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array(
                    'onlyNumber' => 1,
                    'service' => $service,
                    'state' => $stateFilter,
                    'search' => $search,
                    'searchText' => $searchText));
        $pager = ModUtil::func('Agoraportal', 'admin', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $clientsNumber,
                    'javascript' => true,
                    'urltemplate' => "servicesList($service,$stateFilter,$search,'$searchText',$order,%%,$rpp);"));
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
     * Get the list of actions associated with services
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      Service
     * @return:     Josn of actions
     */
    public function getServiceActions($args) {
        AgoraPortal_Util::requireAdmin();

        $service = AgoraPortal_Util::getFormVar($args, 'service', '0', 'POST');

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $serviceName = $services[$service]['serviceName'];

        $sites = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('service' => $service, 'state' => 1));
        switch ($serviceName) {
            case 'moodle2':
                $post_url = '/local/agora/scripts/list.php';
                break;
            case 'nodes':
                $post_url = '/wp-includes/xtec/scripts/list.php';
                break;
            default:
                return $this->getServiceActions_noaction('No hi ha accions disponibles pel servei '.$serviceName);
                break;
        }

        $url = false;
        if (count($sites) > 0) {
            foreach ($sites as $site) {
                if (!isset($site['serviceId'])) {
                    continue;
                }
                if ($services[$site['serviceId']]['serviceName'] != $serviceName) {
                    continue;
                }
                $url = ModUtil::func('Agoraportal', 'user', 'getServiceLink', array('clientDNS' => $site['clientDNS'], 'serviceName' => $serviceName));
                if ($url) {
                    break;
                }
            }
        } else {
            return $this->getServiceActions_noaction('No hi ha cap client amb el servei '.$serviceName);
        }

        if ($url) {
            $url .= $post_url;
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $url);
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
            $actions = curl_exec($curl_handle);
            curl_close($curl_handle);
            if (json_decode($actions)) {

                return $actions;
            } else {
                return $this->getServiceActions_noaction('La URL '.$url.' no ha retornat cap acció');
            }
        } else {
            return $this->getServiceActions_noaction('Error calculant la URL');
        }
        return $this->getServiceActions_noaction('No hi ha operacions disponibles');
    }

    private function getServiceActions_noaction($text){
        $actions = array();
        $noaction = new StdClass();
        $noaction->action = '';
        $noaction->title = $text;
        $noaction->description = $text;
        $actions[] = $noaction;
        return json_encode($actions);
    }

    /**
     * Display the list of clients
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		The clients' list page
     */
    public function clientsList($args) {
        AgoraPortal_Util::requireAdmin();

        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'GETPOST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', '', 'GETPOST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'GETPOST');

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
        AgoraPortal_Util::requireAdmin();

        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'POST');
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15, 'POST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', null, 'POST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', null, 'POST');

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
                    'javascript' => true,
                    'urltemplate' => "clientsList('$search','$searchText',%%)"));



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
        $clientCode = AgoraPortal_Util::getFormVar($args, 'clientCode');
        $clientName = AgoraPortal_Util::getFormVar($args, 'clientName');
        $clientDNS = AgoraPortal_Util::getFormVar($args, 'clientDNS');
        $clientAddress = AgoraPortal_Util::getFormVar($args, 'clientAddress');
        $clientCity = AgoraPortal_Util::getFormVar($args, 'clientCity');
        $clientPC = AgoraPortal_Util::getFormVar($args, 'clientPC');
        $clientDescription = AgoraPortal_Util::getFormVar($args, 'clientDescription');
        $clientState = AgoraPortal_Util::getFormVar($args, 'clientState', 0, 'GETPOST');

        // Security check
        if (!AgoraPortal_Util::isAdmin()) {
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
        $clientCode = AgoraPortal_Util::getFormVar($args, 'clientCode', null, 'POST');
        $clientName = AgoraPortal_Util::getFormVar($args, 'clientName', null, 'POST');
        $clientDNS = AgoraPortal_Util::getFormVar($args, 'clientDNS', null, 'POST');
        $clientAddress = AgoraPortal_Util::getFormVar($args, 'clientAddress', null, 'POST');
        $clientCity = AgoraPortal_Util::getFormVar($args, 'clientCity', null, 'POST');
        $clientPC = AgoraPortal_Util::getFormVar($args, 'clientPC', null, 'POST');
        $clientDescription = AgoraPortal_Util::getFormVar($args, 'clientDescription', null, 'POST');
        $clientState = AgoraPortal_Util::getFormVar($args, 'clientState', 0, 'POST');
        // Security check
        if (!AgoraPortal_Util::isAdmin()) {
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
        AgoraPortal_Util::requireAdmin();

        $clientServiceId = AgoraPortal_Util::getFormVar($args, 'clientServiceId');
        $action = AgoraPortal_Util::getFormVar($args, 'action', null, 'GET');


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
        AgoraPortal_Util::requireAdmin();

        $locations = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations');
        $schooltypes = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');
        $requesttypes = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes');
        $requesttypesservices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypesServices');
        $modeltypes = ModUtil::apiFunc('Agoraportal', 'user', 'getModelTypes');

        return $this->view->assign('siteBaseURL', $this->getVar('siteBaseURL'))
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
                        ->assign('modeltypes', $modeltypes)
                        ->assign('createDB', $this->getVar('createDB'))
                        ->fetch('agoraportal_admin_config.tpl');
    }

    /**
     * Update the configuration parameters received from the form
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The confurable parameters
     * @return:		A success or an error message and redirect user to clients' list
     */
    public function updateConfig($args) {
        AgoraPortal_Util::requireAdmin();

        $siteBaseURL = AgoraPortal_Util::getFormVar($args, 'siteBaseURL', null, 'POST');
        $warningMailsTo = AgoraPortal_Util::getFormVar($args, 'warningMailsTo', null, 'POST');
        $requestMailsTo = AgoraPortal_Util::getFormVar($args, 'requestMailsTo', null, 'POST');
        $diskRequestThreshold = AgoraPortal_Util::getFormVar($args, 'diskRequestThreshold', null, 'POST');
        $clientsMailThreshold = AgoraPortal_Util::getFormVar($args, 'clientsMailThreshold', null, 'POST');
        $maxAbsFreeQuota = AgoraPortal_Util::getFormVar($args, 'maxAbsFreeQuota', null, 'POST');
        $maxFreeQuotaForRequest = AgoraPortal_Util::getFormVar($args, 'maxFreeQuotaForRequest', null, 'POST');
        $createDB = AgoraPortal_Util::getFormVar($args, 'createDB', false, 'POST');

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Convert 'on' value of checkbox to boolean
        $createDB = ($createDB == 'on') ? true : false;

        $this->setVar('siteBaseURL', $siteBaseURL)
                ->setVar('warningMailsTo', $warningMailsTo)
                ->setVar('requestMailsTo', $requestMailsTo)
                ->setVar('diskRequestThreshold', $diskRequestThreshold)
                ->setVar('clientsMailThreshold', $clientsMailThreshold)
                ->setVar('maxAbsFreeQuota', $maxAbsFreeQuota)
                ->setVar('maxFreeQuotaForRequest', $maxFreeQuotaForRequest)
                ->setVar('createDB', $createDB);

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
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', null, 'POST');
        $init = AgoraPortal_Util::getFormVar($args, 'init', null, 'POST');
        $total = AgoraPortal_Util::getFormVar($args, 'total', null, 'POST');
        $urltemplate = AgoraPortal_Util::getFormVar($args, 'urltemplate', null, 'POST');
        $javascript = AgoraPortal_Util::getFormVar($args, 'javascript', false, 'POST');

        // Security check
        if (!AgoraPortal_Util::isUser()) {
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

        if ($javascript) {
            $prelink = 'href="#" onclick';
        } else {
            $prelink = 'href';
        }
        // Show startnum link
        if ($init != 1) {
            $url = preg_replace('/%%/', 1, $urltemplate);
            $text = '<a '.$prelink.'="' . $url . '"><<</a> | ';
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
                    $text = '<a '.$prelink.'="' . $url . '">' . $pagenum . '</a> | ';
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
            $text = '<a '.$prelink.'="' . $url . '">>></a>';
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
        AgoraPortal_Util::requireAdmin();

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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $locationId = AgoraPortal_Util::getFormVar($args, 'locationId');
        $locationName = AgoraPortal_Util::getFormVar($args, 'locationName', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $requestTypeId = AgoraPortal_Util::getFormVar($args, 'requestTypeId');
        $requestTypeId = AgoraPortal_Util::getFormVar($args, 'requestTypeId');
        $requestTypeName = AgoraPortal_Util::getFormVar($args, 'requestTypeName', null, 'POST');
        $requestTypeDescription = AgoraPortal_Util::getFormVar($args, 'requestTypeDescription', null, 'POST');
        $requestTypeUserCommentsText = AgoraPortal_Util::getFormVar($args, 'requestTypeUserCommentsText', null, 'POST');

        $locationName = AgoraPortal_Util::getFormVar($args, 'locationName', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $typeId = AgoraPortal_Util::getFormVar($args, 'typeId');
        $typeName = AgoraPortal_Util::getFormVar($args, 'typeName', null, 'POST');
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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $locationName = AgoraPortal_Util::getFormVar($args, 'locationName', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $serviceid = AgoraPortal_Util::getFormVar($args, 'service', null, 'POST');
        $requesttypeid = AgoraPortal_Util::getFormVar($args, 'requesttype', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $requestTypeName = AgoraPortal_Util::getFormVar($args, 'requestTypeName', null, 'POST');
        $requestTypeDescription = AgoraPortal_Util::getFormVar($args, 'requestTypeDescription', null, 'POST');
        $requestTypeUserCommentsText = AgoraPortal_Util::getFormVar($args, 'requestTypeUserCommentsText', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $typeName = AgoraPortal_Util::getFormVar($args, 'typeName', null, 'POST');

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
     * Show form to add a new model type or saves it to data base
     *
     * @author Toni Ginard
     * @param int confirmation
     * @param string shortcode
     * @param string keyword
     * @return redirect to config
     * @throws Zikula_Exception_Forbidden
     */
    public function addNewModelType($args) {
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $shortcode = AgoraPortal_Util::getFormVar($args, 'shortcode', null, 'POST');
        $keyword = AgoraPortal_Util::getFormVar($args, 'keyword', null, 'POST');
        $description = AgoraPortal_Util::getFormVar($args, 'description', null, 'POST');
        $url = AgoraPortal_Util::getFormVar($args, 'url', null, 'POST');
        $dbHost = AgoraPortal_Util::getFormVar($args, 'dbHost', null, 'POST');

        // Show the form or save the data?
        if ($confirmation == null) {
            return $this->view->fetch('agoraportal_admin_addNewModelType.tpl');
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Save the record
        $modelId = ModUtil::apiFunc('Agoraportal', 'admin', 'addNewModelType', array('shortcode' => $shortcode, 'keyword' => $keyword, 'description' => $description, 'url' => $url, 'dbHost' => $dbHost));

        if ($modelId) {
            LogUtil::registerStatus($this->__('S\'ha registrat un tipus nou de maqueta'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en desar el tipus nou de maqueta'));
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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $locationId = AgoraPortal_Util::getFormVar($args, 'locationId');
        $locationName = AgoraPortal_Util::getFormVar($args, 'locationName', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $requestTypeId = AgoraPortal_Util::getFormVar($args, 'requestTypeId');
        $serviceid = AgoraPortal_Util::getFormVar($args, 'serviceId');

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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $requestTypeId = AgoraPortal_Util::getFormVar($args, 'requestTypeId');

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
     * Delete a given model type
     *
     * @author Toni Ginard
     * @param int confirmation
     * @param int modelTypeId
     * @return redirect to config
     * @throws Zikula_Exception_Forbidden
     */
    public function deleteModelType($args) {
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $modelTypeId = AgoraPortal_Util::getFormVar($args, 'modelTypeId');

        if ($confirmation == null) {
            $modelType = ModUtil::apiFunc('Agoraportal', 'user', 'getModelTypes', array('modelTypeId' => $modelTypeId));

            return $this->view->assign('modelType', $modelType[$modelTypeId])
                            ->fetch('agoraportal_admin_deleteModelType.tpl');
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Remove the record
        if (ModUtil::apiFunc('Agoraportal', 'admin', 'deleteModelType', array('modelTypeId' => $modelTypeId))) {
            LogUtil::registerStatus($this->__('S\'ha esborrat el registre de la maqueta'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el registre de la maqueta'));
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
        AgoraPortal_Util::requireAdmin();

        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $typeId = AgoraPortal_Util::getFormVar($args, 'typeId');

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
        AgoraPortal_Util::requireAdmin();

        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GETPOST');
        $sqlfunc = AgoraPortal_Util::getFormVar($args, 'sqlfunction');
        $sqlfunc = trim($sqlfunc);
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', '4', 'GETPOST');

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('which', $which);
        $view->assign('sqlfunc', $sqlfunc);
        $view->assign('service_sel', $service_sel);

        $ask = AgoraPortal_Util::getFormVar($args, 'ask');
        $confirm = AgoraPortal_Util::getFormVar($args, 'confirm');
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

                ini_set('mysql.connect_timeout', 1800);
                ini_set('default_socket_timeout', 1800);
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

        // Create output object
        if ($comands) {
            $view->assign('comands', $comands);
        }
        $view->assign('servicesListContent', $this->sqlservicesListContent($args));
        return $view->fetch('agoraportal_admin_sql.tpl');
    }

    /**
     * Changes the advices block content
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return:     Rendering of the page
     */
    public function advices($args) {
        AgoraPortal_Util::requireAdmin();

        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');
        $message = AgoraPortal_Util::getFormVar($args, 'message');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GETPOST');
        $only_admins = AgoraPortal_Util::getFormVar($args, 'only_admins', "0", 'GETPOST');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', 0, 'GETPOST');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GETPOST');
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', 4, 'GETPOST');

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('message', $message);
        $view->assign('which', $which);
        $view->assign('only_admins', $only_admins);
        $view->assign('date_start', $date_start);
        $view->assign('date_stop', $date_stop);
        $view->assign('service_sel', $service_sel);

        $ask = AgoraPortal_Util::getFormVar($args, 'ask');
        $confirm = AgoraPortal_Util::getFormVar($args, 'confirm');

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

                if ($serviceName == 'intranet') {
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

                    $sqlexists = "SELECT * FROM blocks WHERE bkey = 'IWnotice'";
                    $sqlactive = "SELECT * FROM blocks WHERE bkey = 'IWnotice' AND active = '1'";
                    $sqlactivate = "UPDATE blocks SET active = '1', content = '" . $content . "'  WHERE bkey = 'IWnotice'";
                    $sqlupdate = "UPDATE blocks SET content = '" . $content . "'  WHERE bkey = 'IWnotice'";
                    $sqlminorder = "SELECT MIN(sortorder) as ordre FROM block_placements";
                }

                foreach ($sqlClients as $i => $client) {
                    $result = "";
                    switch ($serviceName) {
                        case 'intranet':
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
                                    // Block exists. Check if it's active
                                    $blockid = $return['values'][0]['bid'];
                                    $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                'host' => $client['dbHost'],
                                                'sql' => $sqlminorder,
                                                'serviceName' => $serviceName));
                                    $minorder = $return['values'][0]['ordre'] - 1;
                                    $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                'host' => $client['dbHost'],
                                                'sql' => $sqlactive,
                                                'serviceName' => $serviceName));
                                    if (count($return['values']) > 0) {
                                        // The block exists and it's active
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'host' => $client['dbHost'],
                                                    'sql' => $sqlupdate,
                                                    'serviceName' => $serviceName));
                                        if ($return['success']) {
                                            $ok++;
                                            $success[$i] = true;
                                            $messages[$i] = $this->__('El bloc s\'ha actualitzat correctament');
                                            // Check if block placement exists
                                            $sql = "SELECT pid FROM block_placements WHERE bid = '" . $blockid . "'";
                                            $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                        'host' => $client['dbHost'],
                                                        'sql' => $sql,
                                                        'serviceName' => $serviceName));
                                            if (count($return['values']) > 0) {
                                                // The block placement exists
                                                $sql = "UPDATE block_placements SET pid = '2', sortorder = '" . $minorder . "' WHERE bid = '" . $blockid . "'";
                                                $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                            'host' => $client['dbHost'],
                                                            'sql' => $sql,
                                                            'serviceName' => $serviceName));
                                            } else{
                                                // The block placement doesn't exist
                                                $sql = "INSERT INTO block_placements SET bid = '" . $blockid . "', pid = '2', sortorder = '" . $minorder . "'";
                                                $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                            'host' => $client['dbHost'],
                                                            'sql' => $sql,
                                                            'serviceName' => $serviceName));
                                            }
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
                                        // The block exists but isn't active. Active it, update it and promote it
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'host' => $client['dbHost'],
                                                    'sql' => $sqlactivate,
                                                    'serviceName' => $serviceName));
                                        if ($return['success']) {
                                            $ok++;
                                            $success[$i] = true;
                                            $messages[$i] = $this->__('El bloc s\'ha activat i actualitzat correctament');
                                            $sql = "UPDATE block_placements SET pid = '2', sortorder = '" . $minorder . "' WHERE bid = '" . $blockid . "'";
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
                                    // It doesn't exist. Create it
                                    $sql = "SELECT * FROM modules WHERE name = 'IWmain'";
                                    $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                'host' => $client['dbHost'],
                                                'sql' => $sql,
                                                'serviceName' => $serviceName));

                                    $mid = $return['values'][0]['id'];
                                    $sql = "INSERT INTO blocks (bkey, title, content, url, mid, filter, active, collapsable, defaultstate, refresh, last_update, language)
                                            VALUES('IWnotice', 'Avisos', '" . $content . "', '', '" . $mid . "', 'a:0:{}', '1', '0', '1', '3600', '" . $date . "', '')";
                                    $return1 = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                'host' => $client['dbHost'],
                                                'sql' => $sql,
                                                'serviceName' => $serviceName));

                                    // Add the block to the right column in first position
                                    if ($return1['success']) {
                                        $return = ModUtil::apiFunc('Agoraportal', 'admin', 'executeSQL', array('database' => $client['activedId'],
                                                    'host' => $client['dbHost'],
                                                    'sql' => $sqlexists,
                                                    'serviceName' => $serviceName));
                                        $blockid = $return['values'][0]["bid"];

                                        $sql = "INSERT INTO block_placements (pid, bid, sortorder) VALUES ('2', '" . $blockid . "', '" . $minorder . "')";
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
                            $params = array();
                            $params['text'] = $message;
                            $params['inici'] = $date_start;
                            $params['final'] = $date_stop;
                            $params['admins'] = $only_admins ? '1' : '0';
                            $operation = ModUtil::apiFunc('Agoraportal', 'admin', 'addOperation',
                                    array('operation' => 'script_advices',
                                        'clientId' => $client['clientId'],
                                        'serviceId' => $service_sel,
                                        'priority' => 3,
                                        'params' => $params
                                    ));

                            if (!$operation) {
                                $success[$i] = false;
                                $messages[$i] = 'No s\'ha pogut afegir la operació script_advices';
                                $error++;
                            } else {
                                $messages[$i] =  'S\'ha afegit la operació script_advices';
                                $success[$i] = true;
                                $ok++;
                            }
                            break;
                    }
                }

                $view->assign('success', $success);
                $view->assign('messages', $$messages);
                $view->assign('ok', $ok);
                $view->assign('error', $error);

                return $view->fetch('agoraportal_admin_advices_exe.tpl');
            }

            // Else ask to execute SQL
            // Save message to session
            SessionUtil::setVar('noticeboardMessage', serialize($message));

            return $view->fetch('agoraportal_admin_advices_ask.tpl');
        }

        // Create output object
        $view->assign('servicesListContent', $this->sqlservicesListContent($args));
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
        AgoraPortal_Util::requireAdmin();

        // Form usefull data
        $service = modUtil::apifunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => 'moodle2'));
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', $service['serviceId'], 'GETPOST');
        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');

        // Sorting and filtering data
        $order = AgoraPortal_Util::getFormVar($args, 'order', 1, 'GETPOST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', 0, 'GETPOST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'GETPOST');
        $pilot = AgoraPortal_Util::getFormVar($args, 'pilot', 0, 'GETPOST');
        $include = AgoraPortal_Util::getFormVar($args, 'include', 1, 'GETPOST');

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        // remove marsupial service from services array because sql are no necessary in marsupial
        $service = modUtil::apifunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => 'marsupial'));
        unset($services[$service['serviceId']]);

        $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices',
                array('init' => 1, //Default
                    'rpp' => 0, //No pages
                    'service' => $service_sel,
                    'state' => 1, //Active
                    'search' => $search,
                    'order' => $order, //Default
                    'searchText' => $searchText,
                    'pilot' => $pilot,
                    'include' => $include));

        $clientsNumber = count($clients);

        return $this->view->assign('clients', $clients)
                        ->assign('services', $services)
                        ->assign('service_sel', $service_sel)
                        ->assign('clients_sel', $clients_sel)
                        ->assign('clientsNumber', $clientsNumber)
                        ->assign('order', $order)
                        ->assign('pilot', $pilot)
                        ->assign('include', $include)
                        ->fetch('agoraportal_admin_sqlservicesListContent.tpl');
    }

    /**
     * Get the list of SQL comands saved in the database
     * @author:     Fèlix Casanellas (felix.casanellas@gmail.com)
     * @param:      None
     * @return:     An array with all comands and their descriptions
     */
    public function sqlComandList($args) {
        AgoraPortal_Util::requireAdmin();

        $serviceId = AgoraPortal_Util::getFormVar($args, 'serviceId', 2, 'REQUEST');
        $comand_type = AgoraPortal_Util::getFormVar($args, 'comand_type', 0, 'REQUEST');

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
        AgoraPortal_Util::requireAdmin();

        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GETPOST');
        $stats_sel = AgoraPortal_Util::getFormVar($args, 'stats_sel', 0, 'GETPOST');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', 0, 'GETPOST');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GETPOST');
        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');

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
        AgoraPortal_Util::requireAdmin();

        $serviceName = AgoraPortal_Util::getFormVar($args, 'serviceName', 'moodle2', 'GETPOST');
        $service = ModUtil::apiFunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => $serviceName));
        $search = AgoraPortal_Util::getFormVar($args, 'search', 1, 'GETPOST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText');

        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 1, //Default
                    'rpp' => 0, //No pages
                    'service' => $service['serviceId'],
                    'state' => 1, //Active
                    'search' => $search,
                    'order' => 1, //Default
                    'searchText' => $searchText));

        $clientsNumber = count($clients);

        return $this->view->assign('clients', $clients)
                        ->assign('services', $services)
                        ->assign('service', $service['serviceId'])
                        ->assign('clients_sel', $clients_sel)
                        ->assign('clientsNumber', $clientsNumber)
                        ->fetch('agoraportal_admin_statsservicesListContent.tpl');
    }

    function check_date($yearmonth, $day) {
        list($month, $year) = explode("/", $yearmonth);
        $D = substr($day, 1);

        $last = self::last_day_month($year, $month);
        return $D <= $last;
    }

    static function last_day_month($year, $month) {
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }

    public function statsGetStatisticsContent($args) {
        AgoraPortal_Util::requireAdmin();

        $ruta = AgoraPortal_Util::getFormVar($args, 'ruta', 0, 'GET');
        $stats = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'GET');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GET');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', -0, 'GET');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GET');
        $orderby = AgoraPortal_Util::getFormVar($args, 'orderby', 'clientDNS', 'GET');

        // data format conversion
        list($DD, $MM, $YY) = explode("/", $date_start);
        list($DDD, $MMM, $YYY) = explode("/", $date_stop);
        $date_start = date('Ymd', strtotime($YY . $MM . $DD));
        $date_stop = date('Ymd', strtotime($YYY . $MMM . $DDD));

        $clients_text = "";
        if ($which == 'selected') {
            $clients = AgoraPortal_Util::getFormVar($args, 'clients', '', 'GET');
            if (!empty($clients)) {
                $clients_ar = explode(",", $clients);
                $clients_text = "";
                foreach ($clients_ar as $client) {
                    $clients_text .= "tbl.clientDNS = '$client' OR ";
                }
                $clients_text = "(" . substr($clients_text, 0, -4) . ") AND ";
            }
        }

        if ($stats == 1 || $stats == 5) {
            // Moodle Month
            if ($stats == 1) { //1.9
                $table = 'agoraportal_moodle_stats_month';
            } else { // 2.X
                $table = 'agoraportal_moodle2_stats_month';
            }

            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop) {
                $dates = "yearmonth = $month_start";
            } else {
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', yearmonth');
        } else if ($stats == 2 || $stats == 6) {
            // Moodle Week
            if ($stats == 1) { //1.9
                $table = 'agoraportal_moodle_stats_week';
            } else { // 2.X
                $table = 'agoraportal_moodle2_stats_week';
            }

            if ($date_start == $date_stop) {
                $dates = "date = $date_start";
            } else {
                $dates = "date >= $date_start AND date <= $date_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');
        } else if ($stats == 3 || $stats == 7) {
            // Moodle Day
            if ($stats == 1) { //1.9
                $table = 'agoraportal_moodle_stats_day';
            } else { // 2.X
                $table = 'agoraportal_moodle2_stats_day';
            }

            if ($date_start == $date_stop) {
                $dates = "date = $date_start";
            } else {
                $dates = "date >= $date_start AND date <= $date_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');
        }
        else if ($stats == 4) {
            // Zikula Month
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop) {
                $dates = "yearmonth = $month_start";
            } else {
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray('agoraportal_intranet_stats_day', $joinInfo, $where, (string) $orderby . ', yearmonth');
        } else if ($stats == 8) { // Nodes Day
            $table = 'agoraportal_nodes_stats_day';
            if ($date_start == $date_stop) {
                $dates = "date = $date_start";
            } else {
                $dates = "date >= $date_start AND date <= $date_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');
        } else if ($stats == 9) { // Nodes Month
            $table = 'agoraportal_nodes_stats_month';
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);

            if ($month_start == $month_stop) {
                $dates = "date = $month_start";
            } else {
                $dates = "date >= $month_start AND date <= $month_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');
        }

        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        $results = array();
        $totals = array();

        if (isset($items[0])) {
            $results[0] = Array();
            foreach ($items[0] as $k => $item) {
                $results[0][] = $k;
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

                    if ($key == 'clientDNS') {
                        $totals['clientDNS'] = 'Totals (' . count($num_centres) . ' centres)';
                        $totals['clientcode'] = '';
                    } else if ($key == 'yearmonth') {
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
                    } else {
                        $totals[$key] += $value;
                    }
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
        AgoraPortal_Util::requireAdmin();

        $ruta = AgoraPortal_Util::getFormVar($args, 'ruta', 0, 'GET');
        $stats = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'GET');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GET');
        $infotype = AgoraPortal_Util::getFormVar($args, 'infotype', "all", 'GET');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', -0, 'GET');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GET');
        $orderby = AgoraPortal_Util::getFormVar($args, 'orderby', 'clientDNS', 'GET');
        $datatype = AgoraPortal_Util::getFormVar($args, 'datatype', 0, 'GET');
        $date = AgoraPortal_Util::getFormVar($args, 'date', 0, 'GET');

        // data format conversion
        list($DD, $MM, $YY) = explode("/", $date_start);
        list($DDD, $MMM, $YYY) = explode("/", $date_stop);
        $date_start = date('Ymd', strtotime($YY . $MM . $DD));
        $date_stop = date('Ymd', strtotime($YYY . $MMM . $DDD));

        $clients_text = "";
        // if($which == 'selected'){
        $clients = AgoraPortal_Util::getFormVar($args, 'usuari', "all", 'GET');

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
        if ($stats == 1 || $stats == 5) {
            //Moodle Month
            if ($stats == 1) {
                $est = "Mensuals Moodle";
                $daystatstable = 'agoraportal_moodle_stats_day';
                $monthstatstable = 'agoraportal_moodle_stats_month';
            } else {
                $est = "Mensuals Moodle 2";
                $daystatstable = 'agoraportal_moodle2_stats_day';
                $monthstatstable = 'agoraportal_moodle2_stats_month';
            }
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

                $sql = "SELECT tbl.clientDNS,tbl.date, $intr_sum h0+h1+h2+h3+h4+h5+h6+h7+h8+h9+h10+h11+h12+h13+h14+h15+h16+h17+h18+h19+h20+h21+h22+h23 $fi_sum
                        FROM $daystatstable AS tbl
                        LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                        WHERE $where_t
                        GROUP BY date ORDER BY  date ASC";
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
                $sql = "SELECT tbl.clientDNS,tbl.yearmonth,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat
                    FROM $monthstatstable AS tbl
                    LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                    WHERE $dates
                    GROUP BY yearmonth
                    ORDER BY clientDNS DESC, yearmonth";
                $ca = array('clientDNS', 'yearmonth', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                $res = DBUtil::executeSQL($sql);
                $items = DBUtil::marshallObjects($res, $ca);
                $where_totals = $dates;
                $items_totals = DBUtil::selectExpandedObjectArray($monthstatstable, $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                $tot = 0;
            } else {
                $pos = strpos($clients_text, 'Total');
                if ($pos === false) {
                    $where = $clients_text . $dates;
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray($monthstatstable, $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                    $items = DBUtil::selectExpandedObjectArray($monthstatstable, $joinInfo, $where, (string) $orderby . ', yearmonth');
                } else {
                    $where = $dates;
                    $sql = "SELECT tbl.clientDNS,tbl.yearmonth,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat
                        FROM $monthstatstable AS tbl
                        LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                        WHERE $dates
                        GROUP BY yearmonth
                        ORDER BY clientDNS DESC, yearmonth";
                    $ca = array('clientDNS', 'yearmonth', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                    $res = DBUtil::executeSQL($sql);
                    $items = DBUtil::marshallObjects($res, $ca);
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray($monthstatstable, $joinInfo, $where_totals, (string) $orderby . ', yearmonth');
                    $tot = 0;
                }
            }
            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)
                FROM $monthstatstable AS tbl
                LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                WHERE " . $dates;
            $ca = array('num_centres');
            $res = DBUtil::executeSQL($sql_num_centres);
            $num_centress = DBUtil::marshallObjects($res, $ca);
        } else if ($stats == 2 || $stats == 6) {
            //Moodle Week
            if ($stats == 2) {
                $est = "Setmanals Moodle";
                $daystatstable = 'agoraportal_moodle_stats_day';
                $weekstatstable = 'agoraportal_moodle_stats_week';
            } else {
                $est = "Setmanals Moodle 2";
                $daystatstable = 'agoraportal_moodle2_stats_day';
                $weekstatstable = 'agoraportal_moodle2_stats_week';
            }
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
                $sql = "SELECT tbl.clientDNS,tbl.date, $intr_sum h0+h1+h2+h3+h4+h5+h6+h7+h8+h9+h10+h11+h12+h13+h14+h15+h16+h17+h18+h19+h20+h21+h22+h23 $fi_sum
                    FROM $daystatstable AS tbl
                    LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                    WHERE $where_t
                    GROUP BY date ORDER BY  date ASC";
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
                $sql = "SELECT tbl.clientDNS,tbl.date,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat
                    FROM $weekstatstable AS tbl
                    LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                    WHERE $dates
                    GROUP BY date
                    ORDER BY  date ASC";
                $ca = array('clientDNS', 'date', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                $res = DBUtil::executeSQL($sql);
                $items = DBUtil::marshallObjects($res, $ca);
                $where_totals = $dates;
                $items_totals = DBUtil::selectExpandedObjectArray($weekstatstable, $joinInfo, $where_totals, (string) $orderby . ', date');
                $tot = 0;
            } else {
                $pos = strpos($clients_text, 'Total');

                if ($pos === false) {
                    $where = $clients_text . $dates;
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray($weekstatstable, $joinInfo, $where_totals, (string) $orderby . ', date');
                    $items = DBUtil::selectExpandedObjectArray($weekstatstable, $joinInfo, $where, (string) $orderby . ',date');
                } else {
                    $where = $dates;
                    $sql = "SELECT tbl.clientDNS,tbl.date,sum(tbl.users),sum(tbl.courses),sum(tbl.activities) ,tbl.lastaccess ,tbl.lastaccess_date ,tbl.lastaccess_user ,tbl.total_access , a.educat
                        FROM $weekstatstable AS tbl
                        LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                        WHERE $dates
                        GROUP BY date
                        ORDER BY clientDNS DESC, date";
                    $ca = array('clientDNS', 'date', 'users', 'courses', 'activities', 'lastaccess', 'lastaccess_date', 'lastaccess_user', 'total_access', 'educat');
                    $res = DBUtil::executeSQL($sql);
                    $items = DBUtil::marshallObjects($res, $ca);
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray($weekstatstable, $joinInfo, $where_totals, (string) $orderby . ', date');
                    $tot = 0;
                }
            }

            if ($items === false) {
                return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
            }

            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)
                FROM $weekstatstable AS tbl
                LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                WHERE $dates";
            $ca = array('num_centres');
            $res = DBUtil::executeSQL($sql_num_centres);
            $num_centress = DBUtil::marshallObjects($res, $ca);
        } else if ($stats == 3 || $stats == 7) {
            //Moodle Day
            if ($stats == 3) {
                $est = "Diàries Moodle";
                $daystatstable = 'agoraportal_moodle_stats_day';
            } else {
                $est = "Diàries Moodle 2";
                $daystatstable = 'agoraportal_moodle2_stats_day';
            }

            if ($date_start == $date_stop) {
                $dates = "date = $date_start";
            } else {
                $dates = "date >= $date_start AND date <= $date_stop";
            }

            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            if ($datatype == 'totals') {
                $where = $dates;
                $sql = "SELECT tbl.clientDNS, tbl.date,sum(h0),sum(h1),sum(h2),sum(h3),sum(h4),sum(h5),sum(h6),sum(h7),sum(h8),sum(h9),sum(h10),sum(h11),sum(h12),sum(h13),sum(h14),sum(h15),sum(h16),sum(h17),sum(h18),sum(h19),sum(h20),sum(h21),sum(h22),sum(h23),total,educat
                    FROM $daystatstable AS tbl
                    LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                    WHERE $dates
                    GROUP BY date
                    ORDER BY clientDNS DESC, date";
                $ca = array('clientDNS', 'date', 'h0', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'h11', 'h12', 'h13', 'h14', 'h15', 'h16', 'h17', 'h18', 'h19', 'h20', 'h21', 'h22', 'h23', 'total', 'educat');
                $res = DBUtil::executeSQL($sql);
                $items = DBUtil::marshallObjects($res, $ca);
                $where_totals = $dates;
                $items_totals = DBUtil::selectExpandedObjectArray($daystatstable, $joinInfo, $where_totals, (string) $orderby . ', date');
                $tot = 0;
            } else {
                /* $where = $clients_text.$dates;
                  $where_totals=$dates;
                  $items_totals = DBUtil::selectExpandedObjectArray($daystatstable, $joinInfo , $where_totals, (string)$orderby.', date');
                  $items = DBUtil::selectExpandedObjectArray($daystatstable, $joinInfo , $where, (string)$orderby.', date');
                 */
                $pos = strpos($clients_text, 'Total');

                if ($pos === false) {
                    $where = $clients_text . $dates;
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray($daystatstable, $joinInfo, $where_totals, (string) $orderby . ', date');
                    $items = DBUtil::selectExpandedObjectArray($daystatstable, $joinInfo, $where, (string) $orderby . ',date');
                } else {
                    $where = $dates;
                    $sql = "SELECT tbl.clientDNS, tbl.date,sum(h0),sum(h1),sum(h2),sum(h3),sum(h4),sum(h5),sum(h6),sum(h7),sum(h8),sum(h9),sum(h10),sum(h11),sum(h12),sum(h13),sum(h14),sum(h15),sum(h16),sum(h17),sum(h18),sum(h19),sum(h20),sum(h21),sum(h22),sum(h23),total,educat
                        FROM $daystatstable AS tbl
                        LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                        WHERE " . $dates . "
                        GROUP BY date
                        ORDER BY clientDNS DESC, date";

                    $ca = array('clientDNS', 'date', 'h0', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'h11', 'h12', 'h13', 'h14', 'h15', 'h16', 'h17', 'h18', 'h19', 'h20', 'h21', 'h22', 'h23', 'total', 'educat');
                    $res = DBUtil::executeSQL($sql);
                    $items = DBUtil::marshallObjects($res, $ca);
                    $where_totals = $dates;
                    $items_totals = DBUtil::selectExpandedObjectArray($daystatstable, $joinInfo, $where_totals, (string) $orderby . ', date');
                    $tot = 0;
                }
            }
            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)
                FROM $daystatstable AS tbl
                LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS
                WHERE $dates";
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

        } else if ($stats == 8) {
            // Nodes Day
            $est = "Diàries Nodes";
            $table = 'agoraportal_nodes_stats_day';
            if ($date_start == $date_stop) {
                $dates = "date = $date_start";
            } else {
                $dates = "date >= $date_start AND date <= $date_stop";
            }

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

                $items_totals = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where_totals, (string) $orderby . ', date');
            }
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');

            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)  FROM $table AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates;
            $ca = array('num_centres');
            $res = DBUtil::executeSQL($sql_num_centres);
            $num_centress = DBUtil::marshallObjects($res, $ca);
        } else if ($stats == 9) {
            // Nodes Month
            $est = "Mensuals Nodes";
            $table = 'agoraportal_nodes_stats_month';
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);

            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');

            if ($month_start == $month_stop) {
                $dates = "date = $month_start";
            } else {
                $dates = "date >= $month_start AND date <= $month_stop";
            }
            if ($datatype == 'totals') {
                $where = $dates;
            } else {
                $where = $clients_text . $dates;
                $where_totals = $dates;

                $items_totals = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where_totals, (string) $orderby . ', date');
            }
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');

            $sql_num_centres = "SELECT count(distinct tbl.clientDNS)  FROM $table AS tbl   LEFT JOIN agoraportal_clients a ON a.clientDNS = tbl.clientDNS WHERE " . $dates;
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
        $yearmonth = 0;
        $auxmonth = '0';
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

                if ($key == 'clientDNS' || $key == 'clientcode') {
                    $totals['clientDNS'] = 'Totals (' . $num_centress[0]['num_centres'] . ' centres)';
                    if(isset($item['clientcode'])) {
                        $totals['clientcode'] = "";
                    }
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
                } else {
                    $totals[$key] = $totals[$key] + $value;
                }
            }
        }

        if ($date != '*') {
            foreach ($items_users as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    if ($key2 == 'users') {
                        $datay1[] = $value2;
                    } else if ($key2 == 'date') {
                        $date_array[] = date('Ymd', strtotime($value2));
                    }
                }
            }
        } else {
            //omplim el vector datay1 per a passar les dades per a generar els gràfics
            foreach ($results as $i => $item) {
                foreach ($item as $key => $value) {
                    if ($i != '0' && $value != ' ') {
                        if ($infotype == 'courses') {
                            if ($key == 'courses') {
                                $datay1[] = $value;
                            }
                        } else if ($infotype == 'users') {
                            if ($key == 'users') {
                                $datay1[] = $value;
                            }
                        } else if ($infotype == 'activities') {
                            if ($key == 'activities') {
                                $datay1[] = $value;
                            }
                        } else {
                            if (($key != 'educat') && ($key != 'users') && ($key != 'clientcode') && ($key != 'clientDNS') && ($key != 'total') && ($key != 'yearmonth') && ($key != 'lastaccess') && ($key != 'lastaccess_date') && ($key != 'date') && ($key != 'lastaccess_user')) {
                                $datay1[] = $value;
                            }
                        }
                    }
                }
            }
        }

        //omplim el vector dataytotals1 per a passar les dades per a generar els gràfics amb les dades dels totals
        foreach ($totals as $key => $value) {
            if (($key != 'educat') && ($key != 'users') && ($key != 'clientDNS') && ($key != 'total') && ($key != 'yearmonth') && ($key != 'lastaccess') && ($key != 'lastaccess_date') && ($key != 'date') && ($key != 'lastaccess_user')) {
                $dataytotals1[] = $value;
            }
        }

        $view = Zikula_View::getInstance('Agoraportal', false);
        if ($datatype != 'totals') {
            //calculate the total values in the table in case that a only user is selected.

            $totals_bis = array();
            $num_centres = array();
            foreach ($items as $i => $item) {
                foreach ($item as $key => $value) {
                    if ($key == 'clientDNS') {
                        if (in_array($value, $num_centres) != TRUE) {
                            $num_centres[] = $value;
                        }
                    }
                }
            }

            foreach ($items_totals as $i => $item) {

                foreach ($item as $key => $value) {
                    if(isset($results[1][$key])) {
                        if ($key == 'clientDNS') {
                            $totals_bis['clientDNS'] = 'Totals (' . $num_centress[0]['num_centres'] . ' centres)';
                        } else if ($key == 'clientcode') {
                            if(!isset($results[1]['clientDNS'])) {
                                $totals_bis['clientcode'] = 'Totals (' . $num_centress[0]['num_centres'] . ' centres)';
                            } else {
                                $totals_bis['clientcode'] = "";
                            }
                        } else if ($key == 'yearmonth') {
                            $totals_bis[$key] = '';
                        } elseif (($key == 'lastaccess') || ($key == 'lastaccess_date') || ($key == 'date') || ($key == 'lastaccess_user')) {
                            $totals_bis[$key] = '';
                        } else {
                            $totals_bis[$key] += $value;
                        }
                    }
                }
            }
            $view->assign('totals', $totals_bis);
        } else {
            $view->assign('totals', $totals);
        }
        //codifiquem les dades que s'envien a la funcio que grafica depenent si cal enviar els totals o les dades en cru
        if ($datatype == 'totals' && $stats != 1 && $stats != 2 && $stats != 5 && $stats != 6) {
            $datay1 = $dataytotals1;
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
            $date_sto_aux = strtotime($YYY . $MMM . "31");
            while ($date_sto_aux >= $date_start) {
                $date_array[] = date('Ymd', $date_start);
                $date_start = strtotime("+1 day", $date_start);
            }
        }

        // Create output object
        $view->assign('results', $results);
        $view->assign('stats', $stats);
        $args = array(
            'stats'=> $datay1,
            'usuari' => $usuari,
            'titol' => $est,
            'data_labels' => $date_array,
            'infotype' => $infotype,
            'datatype' => $datatype);
        $this->statsservicesNewGraphs($view, $args);


        return $view->fetch('agoraportal_admin_statsStatisticsContent.tpl');
    }

    /**
     * Creates the CSV file and returns the statistics content
     * @author:     Aida Regi Cosculluela (aregi@xtec.cat)
     * @param:      The filter and pager values
     * @return:     A .csv file with the statistics content
     */
    public function statsGetCSVContent($args) {
        AgoraPortal_Util::requireAdmin();

        $stats = AgoraPortal_Util::getFormVar($args, 'stats_sel', 1, 'POST');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'POST');

        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', -0, 'POST');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'POST');
        $orderby = AgoraPortal_Util::getFormVar($args, 'orderby', 'clientDNS', 'POST');


        // data format conversion
        list($DD, $MM, $YY) = explode("/", $date_start);
        list($DDD, $MMM, $YYY) = explode("/", $date_stop);
        $date_start = date('Ymd', strtotime($YY . $MM . $DD));
        $date_stop = date('Ymd', strtotime($YYY . $MMM . $DDD));

        $clients_text = "";
        if ($which == 'selected') {
            $clients = AgoraPortal_Util::getFormVar($args, 'clients', 'ALL', 'POST');
            if (!empty($clients)) {
                $clients_ar = explode(",", $clients);
                $clients_text = "";
                foreach ($clients_ar as $client) {
                    $clients_text .= "tbl.clientDNS = '$client' OR ";
                }
                $clients_text = "(" . substr($clients_text, 0, -4) . ") AND ";
            }
        }

        if ($stats == 1 || $stats == 5) {
            // Moodle Month
            if ($stats == 1) { //1.9
                $table = 'agoraportal_moodle_stats_month';
            } else { // 2.X
                $table = 'agoraportal_moodle2_stats_month';
            }
            $month_start = substr($date_start, 0, 6);
            $month_stop = substr($date_stop, 0, 6);
            if ($month_start == $month_stop) {
                $dates = "yearmonth = $month_start";
            } else {
                $dates = "yearmonth >= $month_start AND yearmonth <= $month_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', yearmonth');
            $_SESSION['items'] = $items;
        } else if ($stats == 2 || $stats == 6) {
            // Moodle Week
            if ($stats == 1) { //1.9
                $table = 'agoraportal_moodle_stats_week';
            } else { // 2.X
                $table = 'agoraportal_moodle2_stats_week';
            }
            if ($date_start == $date_stop) {
                $dates = "date = $date_start";
            } else {
                $dates = "date >= $date_start AND date <= $date_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');
        } else if ($stats == 3 || $stats == 7) {
            // Moodle Day
            if ($stats == 1) { //1.9
                $table = 'agoraportal_moodle_stats_day';
            } else { // 2.X
                $table = 'agoraportal_moodle2_stats_day';
            }

            if ($date_start == $date_stop) {
                $dates = "date = $date_start";
            } else {
                $dates = "date >= $date_start AND date <= $date_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');
        } else if ($stats == 4) {
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
        }else if ($stats ==8 ) { // Nodes day
            $table = 'agoraportal_nodes_stats_day';
            if ($date_start == $date_stop) {
                $dates = "date = $date_start";
            } else {
                $dates = "date >= $date_start AND date <= $date_stop";
            }
            $where = $clients_text . $dates;
            $joinInfo = array();
            $joinInfo[] = array('join_table' => 'agoraportal_clients',
                'join_field' => array('educat'),
                'object_field_name' => array('educat'),
                'compare_field_table' => 'clientDNS',
                'compare_field_join' => 'clientDNS');
            $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');

            } else if ($stats ==9 ) {// Nodes Month
                $table = 'agoraportal_nodes_stats_month';
                $month_start = substr($date_start, 0, 6);
                $month_stop = substr($date_stop, 0, 6);
                if ($month_start == $month_stop) {
                    $dates = "date = $month_start";
                } else {
                    $dates = "date >= $month_start AND date <= $month_stop";
                }
                $where = $clients_text . $dates;
                $joinInfo = array();
                $joinInfo[] = array('join_table' => 'agoraportal_clients',
                    'join_field' => array('educat'),
                    'object_field_name' => array('educat'),
                    'compare_field_table' => 'clientDNS',
                    'compare_field_join' => 'clientDNS');
                $items = DBUtil::selectExpandedObjectArray($table, $joinInfo, $where, (string) $orderby . ', date');
                $_SESSION['items'] = $items;
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
                    if ($key == 'clientDNS') {
                        $totals[$key] = 'Totals (' . count($items) . ' centres)';
                    } else if ($key == 'yearmonth') {
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
        AgoraPortal_Util::requireAdmin();

        if (!$export_pack = ModUtil::apiFunc('Export', 'admin', 'getExportPack', array('modules_selected' => $modules_selected))) {
            LogUtil::registerError($this->__('It\'s not possible to generate the export pack'));
        } else {
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

    public function statsservicesNewGraphs($view, $args) {
        $stats = $args['stats'];
        $datesaux = $args['data_labels'];
        $usuari = $args['usuari'];
        $titol = $args['titol'];
        $infotype = $args['infotype'];
        $datatype = $args['datatype'];

        if (count($stats) == 0 || count($stats) == 1) {
            $view->assign('error', 'Les dades que has escollit no contenen prou valors');
            return;
        }

        $variables = array();
        switch($titol) {
            case 'Diàries Moodle':
            case 'Diàries Moodle 2':
                $i = 0;
                foreach ($stats as $valor => $notused) {
                    $valoraus = $valor % 24;
                    if ($datatype != 'totals') {
                        $variables[] = date("d/m/y", strtotime($datesaux[$i])) . " - " . $valoraus . "h.";
                        if ($valoraus == 23) {
                            $i++;
                        }
                    } else {
                        $variables[] = $valoraus . "h.";
                    }
                }
                if ($datatype != 'totals') {
                    $dates_titol = " De " . $variables[0] . " a " . $variables[count($variables) - 1];
                } else {
                    $last_data = $datesaux[count($datesaux) - 1];
                    $dia = substr($last_data, -2, 2);
                    $mes = substr($last_data, -4, 2);
                    $any = substr($last_data, 0, 4);
                    $datafi = $any . $mes . $dia;
                    $dates_titol = " De " . date("d/m/y", strtotime($datesaux[0])) . " a " . date("d/m/y", strtotime($datafi));
                }
                break;
            case 'Mensuals Moodle':
            case 'Mensuals Moodle 2':
                if ($infotype != 'accessos') {
                    foreach ($datesaux as $data) {
                        $variables[] = date("m/Y", strtotime($data));
                    }
                } else {
                    foreach ($datesaux as $data) {
                        $variables[] = date("d/m/Y", strtotime($data));
                    }
                }
                $dates_titol = " De " . $variables[0] . " a " . $variables[count($variables) - 1];
                break;
            case 'Setmanals Moodle':
            case 'Setmanals Moodle 2':
            case 'Mensuals Intranet':
                foreach ($datesaux as $data) {
                    $variables[] = date("d/m/y", strtotime($data));
                }
                if (($titol == 'Setmanals Moodle' || $titol == 'Setmanals Moodle 2') && $infotype != 'accessos') {
                    $data_fi = date("d/m/y", strtotime("+7 days", strtotime($datesaux[count($datesaux) - 1])));
                } else {
                    $data_fi = $variables[count($datesaux) - 1];
                }
                $dates_titol = " De " . $variables[0] . " a " . $data_fi;
                break;
        }

        if ($titol == 'Diàries Moodle' || $titol == 'Diàries Moodle 2') {
            $datalabel = "Nombre d'accessos (per hores)";
        } elseif ($titol == 'Mensuals Intranet') {
            $datalabel = "Nombre d'accessos (per dia)";
        } else {
            if ($infotype == 'courses') {
                $datalabel = "Nombre de cursos";
            } elseif ($infotype == 'users') {
                $datalabel = "Nombre d'usuaris";
            } elseif ($infotype == 'activities') {
                $datalabel = "Nombre d'activitats";
            } elseif ($infotype == 'accessos') {
                $datalabel = "Nombre d'accessos";
            }
        }

        $view->assign('graph_title', "Estadístiques " . $titol);
        $view->assign('graph_dates', $dates_titol);
        // Setup the graph
        $view->assign('graph_data', $stats);
        $view->assign('datalabel', $datalabel);
        $view->assign('xlabels', $variables);
        $view->assign('graph_legend', $usuari);
    }

    public function updateDiskUse($args) {
       // Security check
        if (!AgoraPortal_Util::isAdmin()) {
            if (!defined('CLI_SCRIPT')) {
                LogUtil::registerError($this->__('No teniu accés a executar aquesta funcionalitat'));
                return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
            }
        }

        $debug = AgoraPortal_Util::getFormVar($args, 'debug', isset($args['debug']) ? true : false, 'GET');

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
        if ($mailerAvailable && !empty($adminReport)) {
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
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => -100,
                'name' => 'lastCron_updatedisk',
                'module' => 'updateDiskUse_cron',
                'lifetime' => 1000 * 24 * 60 * 60,
                'sv' => $sv,
                'value' => time()));
            if (!defined('CLI_SCRIPT')) {
                echo '<br /><br />';
            }
            echo "ok\n";
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
        AgoraPortal_Util::requireAdmin();

        $requestId = AgoraPortal_Util::getFormVar($args, 'requestId', null, 'GET');
        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'GET');
        $search = AgoraPortal_Util::getFormVar($args, 'search', '', 'GET');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'GET');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 0, 'GET');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', -1, 'GET');

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
        AgoraPortal_Util::requireAdmin();

        $state = AgoraPortal_Util::getFormVar($args, 'state', null, 'POST');
        $userComments = AgoraPortal_Util::getFormVar($args, 'userComments', null, 'POST');
        $adminComments = AgoraPortal_Util::getFormVar($args, 'adminComments', null, 'POST');
        $privateNotes = AgoraPortal_Util::getFormVar($args, 'privateNotes', null, 'POST');
        $requestId = AgoraPortal_Util::getFormVar($args, 'requestId', null, 'POST');
        $clientCode = AgoraPortal_Util::getFormVar($args, 'clientCode', null, 'POST');
        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'POST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', '', 'POST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'POST');
        $service = AgoraPortal_Util::getFormVar($args, 'service', '', 'POST');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', '', 'POST');
        $sendMail = AgoraPortal_Util::getFormVar($args, 'sendMail', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $requestId = AgoraPortal_Util::getFormVar($args, 'requestId');
        $confirm = AgoraPortal_Util::getFormVar($args, 'confirm', null, 'POST');

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
        AgoraPortal_Util::requireAdmin();

        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'GETPOST');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 0, 'GETPOST');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', -1, 'GETPOST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', 0, 'GETPOST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'GETPOST');
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15, 'GETPOST');

        if (SessionUtil::getVar('navStateRequests')) {
            $stateArray = unserialize(SessionUtil::getVar('navStateRequests'));
            $init = $stateArray['init'];
            $service = $stateArray['service'];
            $stateFilter = $stateArray['stateFilter'];
            $search = $stateArray['search'];
            $searchText = $stateArray['searchText'];
            $rpp = $stateArray['rpp'];
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
        AgoraPortal_Util::requireAdmin();

        $init = AgoraPortal_Util::getFormVar($args, 'init', 1, 'POST');
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15, 'POST');
        $service = AgoraPortal_Util::getFormVar($args, 'service', '0', 'POST');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', 0, 'POST');
        $search = AgoraPortal_Util::getFormVar($args, 'search', 1, 'POST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', null, 'POST');
        $order = AgoraPortal_Util::getFormVar($args, 'order', 2, 'POST');

        // Escape special chars
        $searchText = addslashes($searchText);

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
                    'searchText' => $searchText));

        $pager = ModUtil::func('Agoraportal', 'admin', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $requestsNumber,
                    'javascript' => true,
                    'urltemplate' => "requestsList($service,$stateFilter,$search,'$searchText',$order,%%,$rpp)"));

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

        $serviceName = AgoraPortal_Util::getFormVar($args, 'serviceName');
        $activedId = AgoraPortal_Util::getFormVar($args, 'activedId');

        // Security check
        if (!AgoraPortal_Util::isAdmin()) {
            if (!defined('CLI_SCRIPT')) {
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

    /**
     * Display a form that allows you to execute commands
     * @author  Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return  Rendering of the page
     */
    public function operations($args) {
        AgoraPortal_Util::requireAdmin();

        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GETPOST');
        $order = AgoraPortal_Util::getFormVar($args, 'order', 1, 'GETPOST');
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', '4', 'GETPOST');
        $actionselect = AgoraPortal_Util::getFormVar($args, 'actionselect', false, 'GETPOST');
        $priority = AgoraPortal_Util::getFormVar($args, 'priority', false, 'GETPOST');

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('which', $which);
        $view->assign('service_sel', $service_sel);
        $view->assign('order', $order);
        $view->assign('serviceSQL', 'getServiceActions();');
        $view->assign('actionselect', $actionselect);

        $exe = AgoraPortal_Util::getFormVar($args, 'exe');
        $queue = AgoraPortal_Util::getFormVar($args, 'queue');
        $confirm = AgoraPortal_Util::getFormVar($args, 'confirm');
        if (!empty($queue)) {
            $action = 'ask';
        } else if (!empty($confirm)) {
            $action = 'confirm';
        }

        if (isset($action) && (empty($actionselect) || ($which == "selected" && empty($clients_sel)) || $service_sel === false)) {
            LogUtil::registerError($this->__('Heu d\'emplenar tots els camps'));
            $action = "show";
        }

        $comands = ModUtil::func('Agoraportal', 'admin', 'sqlComandList', array('serviceId' => $service_sel));

        if (isset($action) && $action != "show") {
            // Initialization
            $serviceName = '';
            $sqlClients = '';

            $view->assign('priority', $priority);

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
            //Get params
            $args = '';
            $params = array();
            foreach ($_POST as $key => $value) {
                if (strpos($key,'parm_') === 0 && !empty($value)) {
                    $key_ret = substr($key, 5);
                    $params[$key_ret] = AgoraPortal_Util::getFormVar($args, $key, null, 'POST');
                }
            }
            $view->assign('params', $params);


            $view->assign('serviceName', $serviceName);
            $view->assign('clients', $sqlClients);

            if ($action == "confirm") { //Execute SQL
                $results = Array();
                $success = Array();
                $messages = Array();
                foreach ($sqlClients as $i => $client) {
                    //Connected
                    $operation = ModUtil::apiFunc('Agoraportal', 'admin', 'addOperation',
                            array('operation' => $actionselect,
                                'clientId' => $client['clientId'],
                                'serviceId' => $service_sel,
                                'priority' => $priority,
                                'params' => $params
                            ));

                    $success[$i] = $operation ? true : false;
                }
                $view->assign('which', $which);
                $view->assign('success', $success);

                global $agora;
                if ($serviceName == 'portal') {
                    $view->assign('prefix', $agora['admin']['database']);
                } else {
                    $view->assign('prefix', $agora['server']['userprefix']);
                }


                return $view->fetch('agoraportal_admin_operations_exe.tpl');
            }

            return $view->fetch('agoraportal_admin_operations_ask_exe.tpl');
        }

        $view->assign('servicesListContent', $this->sqlservicesListContent($args));

        $priority_values = array();
        $i = -10;
        while ($i <= 10) {
            $priority_values["$i"] = $i;
            $i++;
        }
        $view->assign('priority_values', $priority_values);

        return $view->fetch('agoraportal_admin_operations.tpl');
    }

    /**
     * Display the queue management table
     * @author  Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return  Rendering of the page
     */
    public function queues($args) {
        AgoraPortal_Util::requireAdmin();

        $view = Zikula_View::getInstance('Agoraportal', false);

        $search = array();
        $search['operation'] = AgoraPortal_Util::getFormVar($args, 'operation_filter', '', 'GETPOST');
        $view->assign('operation_filter', $search['operation']);

        $search['client_type'] = AgoraPortal_Util::getFormVar($args, 'client_type', '', 'GETPOST');
        $view->assign('client_type', $search['client_type']);

        $search['client'] = AgoraPortal_Util::getFormVar($args, 'client_filter', '', 'GETPOST');
        $view->assign('client_filter', $search['client']);

        $search['priority'] = AgoraPortal_Util::getFormVar($args, 'priority_filter', '-', 'GETPOST');
        $view->assign('priority_filter', $search['priority']);

        $search['service'] = AgoraPortal_Util::getFormVar($args, 'service_filter', '', 'GETPOST');
        $view->assign('service_filter', $search['service']);

        $search['state'] = AgoraPortal_Util::getFormVar($args, 'state_filter', '', 'GETPOST');
        $view->assign('state_filter', $search['state']);

        $search['from'] = AgoraPortal_Util::getFormVar($args, 'date_start', date('Y-m-d', strtotime('-3 days')).' 00:00', 'GETPOST');
        $view->assign('date_start', $search['from']);

        $search['to'] = AgoraPortal_Util::getFormVar($args, 'date_stop', date('Y-m-d', strtotime('+1 day')).' 00:00', 'GETPOST');
        $view->assign('date_stop', $search['to']);

        $search['sortby_dir'] = AgoraPortal_Util::getFormVar($args, 'sortby_dir', 'ASC', 'GETPOST');
        $view->assign('sortby_dir', $search['sortby_dir']);

        $search['sortby'] = AgoraPortal_Util::getFormVar($args, 'sortby_filter', 'timeStart', 'GETPOST');
        $view->assign('sortby_filter', $search['sortby']);

        $startnum = AgoraPortal_Util::getFormVar($args, 'startnum', 0, 'GETPOST');
        $search['startnum'] = $startnum;

        $rpp = 50;
        $search['rpp'] = $rpp;

        $operations = ModUtil::apiFunc('Agoraportal', 'admin', 'getOperations', $search);

        if (!$search['state']) {
            $exec_operations = ModUtil::apiFunc('Agoraportal', 'admin', 'getOperations', array('state'=>'L'));
            $operations = array_merge($exec_operations, $operations);
        }
        foreach($operations as $k => $op) {
            if (!empty($op['params'])) {
                $params = "";
                $op['params'] = str_replace("\r", "\\r", $op['params']);
                $op['params'] = str_replace("\n", "\\n", $op['params']);
                $opparams = json_decode($op['params']);
                foreach($opparams as $key => $value) {
                    $value = str_replace("\r", "<br/>", $value);
                    $value = str_replace("\n", "<br/>", $value);
                    $params .= $key.' = '.html_entity_decode($value).'<br/>';
                }
                $operations[$k]['params'] = $params;
            }
        }
        $view->assign('rows', $operations);

        $search['count'] = 1;
        $operations_number = ModUtil::apiFunc('Agoraportal', 'admin', 'getOperations', $search);
        $view->assign('rowsNumber', $operations_number);

        $view->assign('pager', array('numitems' => $operations_number,
                                           'itemsperpage' => $rpp));
        $priority_filter_values = array();
        $priority_filter_values['-'] = '-';
        $i = -10;
        while ($i <= 10) {
            $priority_filter_values["$i"] = $i;
            $i++;
        }
        $view->assign('priority_filter_values', $priority_filter_values);

        $change_priority_values = array();
        $i = -10;
        while ($i <= 10) {
            $change_priority_values["$i"] = $i;
            $i++;
        }
        $view->assign('change_priority_values', $change_priority_values);

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $view->assign('services', $services);

        return $view->fetch('agoraportal_admin_queues.tpl');
    }

    /**
     * Creates services in batch mode
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      The list of services to create
     * @return:     The edit form
     */
    public function createBatch($args) {
        AgoraPortal_Util::requireAdmin();

        $schoolCodes = AgoraPortal_Util::getFormVar($args, 'schoolCodes', null, 'POST');
        $service = AgoraPortal_Util::getFormVar($args, 'service_sel', 0, 'POST');
        $dbHost = AgoraPortal_Util::getFormVar($args, 'dbHost', null, 'POST');
        $template = AgoraPortal_Util::getFormVar($args, 'template', null, 'POST');
        $createClient = AgoraPortal_Util::getFormVar($args, 'createClient', null, 'POST');

        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        return $this->view->assign('schoolCodes', $schoolCodes)
                        ->assign('service', $service)
                        ->assign('services', $services)
                        ->assign('dbHost', $dbHost)
                        ->assign('template', $template)
                        ->assign('createClient', $createClient)
                        ->fetch('agoraportal_admin_createBatch.tpl');
    }

    /**
     * Creates services in batch mode
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      The list of services to create
     * @return:     The edit form
     */
    public function createBatch_exec($args) {
        AgoraPortal_Util::requireAdmin();

        global $agora;

        $schoolCodes = AgoraPortal_Util::getFormVar($args, 'schoolCodes', null, 'POST');
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', 0, 'POST');
        $dbHost = AgoraPortal_Util::getFormVar($args, 'dbHost', null, 'POST');
        $template = AgoraPortal_Util::getFormVar($args, 'template', null, 'POST');
        $createClient = AgoraPortal_Util::getFormVar($args, 'createClient', null, 'POST');

        if (empty($schoolCodes)) {
            LogUtil::registerError('La llista de codis de centre no pot estar buida');
            return $this->createBatch($args);
        }

        if (empty($service_sel)) {
            LogUtil::registerError('S\'ha de seleccionar un servei');
            return $this->createBatch($args);
        }

        $service = modUtil::apifunc('Agoraportal', 'user', 'getService', array('serviceId' => $service_sel));
        if (!$service) {
            LogUtil::registerError('No s\'ha de troabat el servei '.$service_sel);
            return $this->createBatch($args);
        }

        $serviceId = $service['serviceId'];
        $serviceName = $service['serviceName'];

        if ($serviceName == 'nodes' && empty($template)) {
            LogUtil::registerError('S\'ha de seleccionar una plantilla en el cas de nodes');
            return $this->createBatch($args);
        }

        // Autofill dbHost var with default value. This is a guess. dbHost should come from web form.
        if ((is_null($dbHost) || empty($dbHost)) && (($serviceName == 'intranet') || ($serviceName == 'nodes'))) {
            $dbHost = $agora['intranet']['host'];
        }

        $pntable = DBUtil::getTables();
        $clientCodes = explode(',', $schoolCodes);
        $results = array();
        $success = array();
        $error = 0;
        foreach ($clientCodes as $code) {
            // Check code validity
            $clientCode = Agoraportal_Api_User::checkCode($code);
            if (!$clientCode) {
                $results[$code] = "El codi <strong>$code</strong> no és vàlid.";
                $error++;
                continue;
            }

            // Pas 1: Obtenir les dades del client (taula clients)
            $client = ModUtil::apiFunc('Agoraportal', 'user', 'getClient', array('clientCode' => $clientCode));
            if (!$client && $createClient) {
                $clientName = 'form'.substr($clientCode, -3);

                $c = $pntable['agoraportal_clients_column'];
                $where = "$c[clientDNS]='$clientName'";
                $client_exists = DBUtil::selectObject('agoraportal_clients', $where);
                if ($client_exists) {
                    $results[$clientCode] = "El centre amb DNS <strong>$clientName</strong> ja existeix, no es pot crear el client";
                    $error++;
                    continue;
                }

                $clientId = ModUtil::apiFunc('Agoraportal', 'admin', 'createClient', array(
                    'clientCode' => $clientCode,
                    'clientName' => $clientName,
                    'clientDNS' => $clientName,
                    'clientAddress' => "",
                    'clientCity' => "",
                    'clientPC' => "",
                    'clientState' => "",
                    'clientState' => 1,
                    'clientDescription' => 'Alta automàtica'));
                if (!$clientId) {
                    $results[$clientCode] = "El centre amb codi <strong>$clientCode</strong> no està donat d'alta. I la seva creació ha fallat.";
                    $error++;
                    continue;
                }
                $client = ModUtil::apiFunc('Agoraportal', 'user', 'getClientById', array('clientId' => $clientId));
            }

            if (!$client) {
                $results[$clientCode] = "El centre amb codi <strong>$clientCode</strong> no està donat d'alta. Per tant, no es crea el seu servei.";
                $error++;
                continue;
            }

            $clientId = $client['clientId'];
            $clientDNS = $client['clientDNS'];
            $clientName = $client['clientName'];
            $clientAddress = $client['clientAddress'];
            $clientCity = $client['clientCity'];

            // Pas 2: Comprovar que el centre encara no té el servei
            $ClientService = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientId, 'serviceId' => $serviceId));
            if ($ClientService) {
                $results[$clientCode] = "El centre <strong>$clientName</strong> ja disposa del servei. Per tant, no es crearà.";
                $error++;
                continue;
            }

            // Pas 3: Crear el Servei
            $item = array('serviceId' => $serviceId,
                'clientId' => $clientId,
                'contactName' => UserUtil::getVar('uname'),
                'contactMail' => UserUtil::getVar('email'),
                'contactProfile' => 'Alta automàtica',
                'state' => self::STATUS_TOREVISE,
                'timeRequested' => time(),
                'diskSpace' => 2000,
                'observations' => 'Alta automàtica');


            if (!$clientService = DBUtil::insertObject($item, 'agoraportal_client_services', 'clientServiceId')) {
                echo "No s'ha pogut crear el servei Moodle 2 per al centre <strong>$clientDNS</strong>";
                $error++;
                continue;
            }

            $clientServiceId = $clientService['clientServiceId'];

            if ($serviceName == 'nodes') {
                $c = $pntable['agoraportal_clients_column'];
                $where = "$c[clientId] = $clientId";
                $item = array('extraFunc' => $template);
                DBUTil::updateObject($item, 'agoraportal_clients', $where);
            }

            // Pas 4: Activar el Servei
            $result = ModUtil::apiFunc('Agoraportal', 'admin', 'activeService', array(
                'clientServiceId' => $clientServiceId,
                'serviceName' => $serviceName,
                'dbHost' => $dbHost));
            if (!$result) {
                // If it fails, delete the recently created agoraportal_client_services
                ModUtil::apiFunc('Agoraportal', 'admin', 'deleteService', array(
                    'clientServiceId' => $clientServiceId));
                $results[$clientCode] = "No s'ha pogut activar el servei";
                $error++;
                continue;
            }
            $serviceDB = $result['serviceDB'];
            $password = $result['password'];

            // This call activates the service
            ModUtil::apiFunc('Agoraportal', 'admin', 'editService', array('clientServiceId' => $clientServiceId,
                        'items' => array('state' =>  self::STATUS_ENABLED,
                        'dbHost' => $dbHost,
                        'serviceDB' => $serviceDB,
                        'timeEdited' => time())));

            $results[$clientCode] = "S'ha creat el servei per al centre <strong>$clientCode</strong> i password <strong>$password</strong>";
            $success[$clientCode] = true;
        }

        return $this->view->assign('schoolCodes', $schoolCodes)
                        ->assign('service', $service)
                        ->assign('services', $services)
                        ->assign('results', $results)
                        ->assign('success', $success)
                        ->assign('error', $error)
                        ->assign('dbHost', $dbHost)
                        ->assign('template', $template)
                        ->assign('serviceName', $serviceName)
                        ->assign('createClient', $createClient)
                        ->fetch('agoraportal_admin_createBatch_exec.tpl');
    }

    public function changeStateOperationId($args) {
        $operationid = AgoraPortal_Util::getFormVar($args, 'operation', -1, 'GET');
        $state = AgoraPortal_Util::getFormVar($args, 'state', false, 'GET');

        $result = ModUtil::apiFunc('Agoraportal', 'admin', 'changeStateOperationId', array('opId' => $operationid, 'state' => $state));

        return $result;
    }

    public function deleteOperationId($args) {
        $operationid = AgoraPortal_Util::getFormVar($args, 'operation', -1, 'GET');

        $result = ModUtil::apiFunc('Agoraportal', 'admin', 'deleteOperationId', array('opId' => $operationid));

        return $result;
    }
}
