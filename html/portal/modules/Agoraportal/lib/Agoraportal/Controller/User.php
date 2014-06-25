<?php

class Agoraportal_Controller_User extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * shows the clients and services list
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The list of available services
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT) && !SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'user', 'sitesList'));
    }

    /**
     * show the services available for a client
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The client Code
     * @return:	The list of available services
     */
    public function myAgora($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GETPOST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $isAdmin = (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) ? true : false;

        // check user access level in Àgora
        $accessLevel = (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) ? 'add' : 'comment';

        // Load Àgora config (needed later)
        global $agora;

        $clientCode = $clientInfo['clientCode'];
        $client = $clientInfo['client'];
        $clientarray = $client[$clientCode];
        $clientOldDNS = $clientarray['clientDNS'];
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        //get client services information
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => -1,
                    'search' => 1,
                    'searchText' => $clientCode,
                    'clientCode' => $clientCode));

        //Check if the client is pending of change his clientDNS
        //Only for site managers
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            $clientDNS = $clientOldDNS;
        } else {
            // Build URL for the web service (initial letters are changed to numbers)
            $uname = str_replace('a', '0', $clientCode);
            $uname = str_replace('b', '1', $uname);
            $uname = str_replace('c', '2', $uname);
            $uname = str_replace('e', '4', $uname);
            $url = $agora['server']['school_information'] . $uname;

            // Get info from web service
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $url);
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            $siteDNS = curl_exec($curl_handle);
            curl_close($curl_handle);

            // Web service provides school info using charset iso-8859
            if (!empty($siteDNS)) {
                $siteDNS = utf8_encode($siteDNS);
            }

            // Assume there's info of the school
            $school = explode('$$', $siteDNS);
            $clientDNS = (isset($school[1])) ? $school[1] : '';
            // Keyword equals to '0' means school exists and has no 'nom propi', so an error is shown
            if ($clientDNS == '0') {
                return LogUtil::registerError("No s'ha trobat el nom propi del centre. Cal disposar de nom propi per poder sol·licitar serveis d'Àgora");
            }
        }

        //get client services
        $clientInfoArray = $clientInfo;
        foreach ($clientInfoArray as $oneService) {
            $maxDiskSpace = $oneService['diskSpace'] * 1024;
            $percentage = ($maxDiskSpace > 0) ? round($oneService['diskConsume'] * 100 / $maxDiskSpace) : 0;
            $widthUsage = ($percentage > 100) ? 100 : $percentage;
            $alertspace = 0;
            if (ModUtil::apiFunc('Agoraportal', 'user', 'checkDiskRequestThreshold', array('serviceId' => $oneService['serviceId'],
                        'clientCode' => $clientCode))) {
                $alertspace = 1;
            }
            $clientInfoArray[$oneService['clientServiceId']]['usageArray'] = array('maxDiskSpace' => $maxDiskSpace,
                'percentage' => $percentage,
                'totalDiskSpace' => round($maxDiskSpace / 1024),
                'usedDiskSpace' => round($oneService['diskConsume'] / 1024),
                'widthUsage' => $widthUsage,
                'alert' => $alertspace);
        }
        // get client managers
        $managers = ModUtil::apiFunc('Agoraportal', 'user', 'getManagers', array('clientCode' => $clientCode));

        return $this->view->assign('client', $client[$clientCode])
                        ->assign('clientArray', $clientInfoArray)
                        ->assign('services', $services)
                        ->assign('clientCode', $clientCode)
                        ->assign('siteBaseURL', $agora['server']['server'] . $agora['server']['base'])
                        ->assign('isAdmin', $isAdmin)
                        ->assign('managers', count($managers))
                        ->assign('clientOldDNS', $clientOldDNS)
                        ->assign('clientDNS', $clientDNS)
                        ->assign('accessLevel', $accessLevel)
                        ->fetch('agoraportal_user_main.tpl');
    }

    /**
     * Allow clients to ask the activation of new services
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	A form with the services available and not solicited
     */
    public function askServices($args) {
        $acceptUseTerms = FormUtil::getPassedValue('acceptUseTerms', isset($args['acceptUseTerms']) ? $args['acceptUseTerms'] : null, 'GETPOST');
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GETPOST');
        $contactProfile = FormUtil::getPassedValue('contactProfile', isset($args['contactProfile']) ? $args['contactProfile'] : null, 'GETPOST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }
        $allowedServices = array();
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $isAdmin = (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) ? true : false;
        $clientCode = $clientInfo['clientCode'];
        $client = $clientInfo['client'];
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
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
        $clientServices = array();
        $haveMoodle = false;
        foreach ($clientInfo as $info) {
            if ($services[$info['serviceId']]['serviceName'] == 'moodle2')
                $haveMoodle = true;
            $clientServices[$info['serviceId']] = $info['serviceId'];
        }

        // Get not asked services
        $notsolicitedServices = array_diff_key($allowedServices, $clientServices);

        if (empty($notsolicitedServices)) {
            if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'main', array('clientCode' => $clientCode)));
            }
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'main'));
        }

        foreach ($notsolicitedServices as $notsolicited) {
            $notsolicitedServices[$notsolicited['serviceId']]['disabled'] = (!$haveMoodle && $notsolicited['serviceName'] == 'marsupial') ? 1 : 0;
        }

        return $this->view->assign('notsolicitedServices', $notsolicitedServices)
                        ->assign('contactName', UserUtil::getVar('uname'))
                        ->assign('contactProfile', $contactProfile)
                        ->assign('acceptUseTerms', $acceptUseTerms)
                        ->assign('clientCode', $clientCode)
                        ->assign('isAdmin', $isAdmin)
                        ->assign('client', $client[$clientCode])
                        ->fetch('agoraportal_user_askServices.tpl');
    }

    /**
     * Update client information for service ask
     * 
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @author: Toni Ginard
     * 
     * @return:	Redirect user to the ask services information
     */
    public function updateAskService($args) {
        $serviceId = FormUtil::getPassedValue('serviceId', isset($args['serviceId']) ? $args['serviceId'] : null, 'POST');
        $nodes = FormUtil::getPassedValue('nodes', isset($args['nodes']) ? $args['nodes'] : null, 'POST');
        $contactProfile = FormUtil::getPassedValue('contactProfile', isset($args['contactProfile']) ? $args['contactProfile'] : null, 'POST');
        $acceptUseTerms = FormUtil::getPassedValue('acceptUseTerms', isset($args['acceptUseTerms']) ? $args['acceptUseTerms'] : null, 'POST');
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();
        
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];

        // Check all the required values
        if ($serviceId == null) {
            LogUtil::registerError($this->__('No heu marcat cap servei'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'askServices', array('clientCode' => $clientCode,
                                'contactProfile' => $contactProfile,
                                'acceptUseTerms' => $acceptUseTerms)));
        }
        
        // Get service name
        $service = ModUtil::apiFunc('Agoraportal', 'user', 'getService', array('serviceId' => $serviceId));
        $serviceName = $service['serviceName'];

        // If service is 'nodes' ensure that the model of service is selected
        if (is_null($nodes)) {
            if ($serviceName == 'nodes') {
                LogUtil::registerError($this->__('No heu indicat indicat quina maqueta voleu per al servei Nodes'));
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'askServices', array('clientCode' => $clientCode,
                                    'contactProfile' => $contactProfile,
                                    'acceptUseTerms' => $acceptUseTerms)));
            } else {
                $nodes = '';
            }
        } elseif ($nodes == 0) {
            $nodes = 'Maqueta primària';
        } elseif ($nodes == 1) {
            $nodes = 'Maqueta secundària';
        }

        if ($contactProfile == '') {
            LogUtil::registerError($this->__('No heu indicat el vostre càrrec en el centre'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'askServices', array('clientCode' => $clientCode,
                                'contactProfile' => $contactProfile,
                                'acceptUseTerms' => $acceptUseTerms)));
        }
        
        if ($acceptUseTerms == null && !SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            LogUtil::registerError($this->__('No heu acceptat les condicions d\'ús'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'askServices', array('clientCode' => $clientCode,
                                'contactProfile' => $contactProfile,
                                'acceptUseTerms' => $acceptUseTerms)));
        }
        
        // Create the new service
        if (!ModUtil::apiFunc('Agoraportal', 'user', 'updateAskService', array('clientCode' => $clientCode,
                    'serviceId' => $serviceId,
                    'contactProfile' => $contactProfile,
                    'observations' => $nodes))) {
            LogUtil::registerError($this->__('S\'ha produït un error en la creació del servei.'));
            if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'main', array('clientCode' => $clientCode)));
            }
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'main'));
        } else {
            LogUtil::registerStatus($this->__('La sol·licitud s\'ha rebut correctament. Quan sigui acceptada o denegada rebreu un missatge de correu electrònic a la vostra bústia de correu XTEC. S\'enviarà una còpia d\'aquest missatge a la bústia del centre.'));
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 1,
                'action' => $this->__f('S\'ha fet la sol·licitud del servei %s', $serviceName)));
        }
        
        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora', array('clientCode' => $clientCode)));
        }
        
        return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora'));
    }

    /**
     * Check if user can access to do the action
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  The code of the client
     * @return:	Real client information
     */
    public function getRealClientCode($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GETPOST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($clientCode == null) {
            // check if user is a manager for a client
            $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerUName' => UserUtil::getVar('uname')));
            if ($manager['state'] == 1) {
                $clientCode = $manager['clientCode'];
            }
        }
        if ($clientCode == null) {
            // perhaps who is connected is a schoool, so client code is the its username
            if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                $clientCode = UserUtil::getVar('uname');
            }
        }
        if ($clientCode == null) {
            if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                //LogUtil::registerError($this->__('No s'ha trobat el client'));
                return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
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
            if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                LogUtil::registerError($this->__('No s\'ha trobat el client'));
                return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
            } else {
                LogUtil::registerError("No tens accés a cap servei. Això pot ser degut a un error.");
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'sitesList'));
            }
        }
        return array('client' => $client,
            'clientCode' => $clientCode);
    }

    /**
     * get the list of sites
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	the client sites list main structure
     */
    public function sitesList() {
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $sitesListContent = ModUtil::func('Agoraportal', 'user', 'sitesListContent');
        // Create output object
        return $this->view->assign('sitesListContent', $sitesListContent)
                        ->fetch('agoraportal_user_sitesList.tpl');
    }

    /**
     * get the list of sites content
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Filter values
     * @return:	The list of sites content
     */
    public function sitesListContent($args) {
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'POST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 10, 'POST');
        $location = FormUtil::getPassedValue('location', isset($args['location']) ? $args['location'] : '0', 'POST');
        $typeId = FormUtil::getPassedValue('typeId', isset($args['typeId']) ? $args['typeId'] : '0', 'POST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : null, 'POST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $locations = ModUtil::apiFunc('Agoraportal', 'user', 'getAllLocations');
        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllTypes');
        $sites = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServicesForSitesList', array('init' => $init,
                    'rpp' => $rpp,
                    'location' => $location,
                    'typeId' => $typeId,
                    'search' => $search,
                    'searchText' => $searchText));
        $sitesNumber = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServicesForSitesList', array('onlyNumber' => 1,
                    'location' => $location,
                    'typeId' => $typeId,
                    'search' => $search,
                    'searchText' => $searchText));
        $sitesArray = array();

        // Obtain base URL: https://pwc-acc.xtec.cat/agora/
        //global $agora;

        //$siteBaseURL = $agora['server']['server'] . $agora['server']['base'];

        if (count($sites) > 0) {
            foreach ($sites as $site) {
                if (!isset($site['serviceId'])) {
                    $site['serviceId'] = 0;
                }
                $class = ($site['serviceId'] > 0) ? $services[$site['serviceId']]['serviceName'] : '';
                $logos = '';

                if ($site['serviceId'] > 0) {
                    // Exception for marsupial service
                    if ($services[$site['serviceId']]['serviceName'] == 'intranet' || $services[$site['serviceId']]['serviceName'] == 'moodle2') {
                        $logos = '<div style="float:left;width:70px;" class="' . $class . '"><a href="' .
                                ModUtil::func('Agoraportal', 'user', 'getServiceLink', array('clientDNS' => $site['clientDNS'], 'serviceName' => $services[$site['serviceId']]['serviceName'])) .
                                '">' . '<img src="modules/Agoraportal/images/' .
                                $services[$site['serviceId']]['serviceName'] .
                                '.gif" alt="' .
                                $services[$site['serviceId']]['serviceName'] .
                                '" title="' .
                                $services[$site['serviceId']]['serviceName'] .
                                '"/></a></div>';
                    } elseif ($services[$site['serviceId']]['serviceName'] == 'marsupial') {
                        $logos = '<div style="float:left;width:70px;" class="' . $class . '"><img src="modules/Agoraportal/images/' .
                                $services[$site['serviceId']]['serviceName'] .
                                '.gif" alt="' .
                                $services[$site['serviceId']]['serviceName'] .
                                '" title="' .
                                $services[$site['serviceId']]['serviceName'] .
                                '"/></div>';
                    }
                }
                if (!array_key_exists($site['clientDNS'], $sitesArray)) {
                    $sitesArray[$site['clientDNS']] = array('clientName' => $site['clientName'],
                        'clientId' => $site['clientId'],
                        'typeId' => $site['typeId'],
                        'locationId' => $site['locationId'],
                        'clientCity' => $site['clientCity'],
                        'clientDNS' => $site['clientDNS'],
                        'serviceId' => $site['serviceId'],
                        'educat' => $site['educat'],
                        'logos' => $logos);
                } else {
                    $sitesArray[$site['clientDNS']]['logos'] .= $logos;
                }
            }
        }
        $pager = ModUtil::func('Agoraportal', 'admin', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $sitesNumber,
                    'urltemplate' => "javascript:sitesList($typeId,$location,'$search','$searchText',%%,$rpp)"));

        // Create output object
        return $this->view->assign('sites', $sitesArray)
                        ->assign('locations', $locations)
                        ->assign('types', $types)
                        ->assign('pager', $pager)
                        ->assign('sitesNumber', $sitesNumber)
                        ->fetch('agoraportal_user_sitesListContent.tpl');
    }

    /**
     * upload big files to the server for moodle courses
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	client code and file to upload
     * @return:	redirect user to the upload form
     */
    public function files($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GET');
        $file = FormUtil::getPassedValue('file', isset($args['file']) ? $args['file'] : null, 'GET');
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', isset($args['clientServiceId']) ? $args['clientServiceId'] : null, 'GET');
        $action = FormUtil::getPassedValue('action', isset($args['action']) ? $args['action'] : 'uploadFiles', 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $isAdmin = (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) ? true : false;
        $clientCode = $clientInfo['clientCode'];
        $client = $clientInfo['client'];
        // get all services
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        //print_r($services);
        //get client services information
        $clientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => -1,
                    'rpp' => -1,
                    'service' => 0,
                    'state' => 1,
                    'search' => 1,
                    'searchText' => $clientCode,
                    'clientCode' => $clientCode,
                ));
        // Create output object
        $view = Zikula_View::getInstance('Agoraportal', false);
        foreach ($clientServices as $clientService) {
            if ($services[$clientService['serviceId']]['serviceName'] == 'moodle2') {
                if ($action == 'uploadFiles') {
                    if ($clientService['diskSpace'] > 0) {
                        //TODO: Now the only service that allow to update files is moodle. In the future other services will allow to update files.
                        //Then several changes in the cgi update script will be necessary
                        $usedDiskSpace = $clientService['diskConsume'];
                        $maxDiskSpace = $clientService['diskSpace'] * 1024;
                        $percentage = round($usedDiskSpace * 100 / $maxDiskSpace);
                        $widthUsage = ($percentage > 100) ? 100 : $percentage;
                        $usageArray[$clientService['serviceId']] = array('serviceName' => $services[$clientService['serviceId']]['serviceName'],
                            'maxDiskSpace' => $maxDiskSpace,
                            'percentage' => $percentage,
                            'totalDiskSpace' => round($maxDiskSpace / 1024),
                            'usedDiskSpace' => round($usedDiskSpace / 1024),
                            'widthUsage' => $widthUsage,
                            'clientServiceId' => $clientService['clientServiceId'],
                        );
                        $actived[$clientService['serviceId']] = $clientService['activedId'];
                    }
                    $view->assign('usageArray', $usageArray);
                }
            }
            $activedServicesNames[] = $services[$clientService['serviceId']]['serviceName'];
        }
        if (count($services) > count($clientServices)) {
            $view->assign('askServices', true);
        }
        $view->assign('isAdmin', $isAdmin);
        $view->assign('client', $client[$clientCode]);
        $view->assign('action', $action);
        $view->assign('activedServicesNames', $activedServicesNames);

        global $agora;
        // upload big file to service folder
        if ($file != null) {
            // send file to folder
            $fileToMove = $agora['server']['ubr_upload'] . $file;
            $serviceName = $services[$clientServices[$clientServiceId]['serviceId']]['serviceName'];
            $folder = $agora['moodle2']['repository_files'];
            $destination = $agora['server']['root'] . $agora[$serviceName]['datadir'] . $agora[$serviceName]['username'] . $clientServices[$clientServiceId]['activedId'] . $folder;
            if (!file_exists($fileToMove)) {
                LogUtil::registerError($this->__('No s\'ha trobat el directori d\'origen'));
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'main', array('clientCode' => $clientCode)));
            }
            if (!file_exists($destination)) {
                unlink($fileToMove);
                LogUtil::registerError($this->__('No s\'ha trobat el directori de destí ' . $destination));
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'main', array('clientCode' => $clientCode)));
            }
            $moved = rename($fileToMove, $destination . $file);
            if (!$moved) {
                unlink($fileToMove);
                LogUtil::registerError($this->__('S\'ha pujat el fitxer al servidor, però s\'ha produït un error en moure\'l internament en el servidor.'));
            } else {
                LogUtil::registerStatus($this->__f('S\'ha pujat el fitxer <strong>%s</strong> al servidor. El trobareu en el repositori <strong>Fitxers</strong> del vostre Moodle.', $file));
                $size = round(filesize($destination . $file) / 1024);
                $diskConsume = $clientServices[$clientServiceId]['diskConsume'] + $size;
                ModUtil::apiFunc('Agoraportal', 'user', 'saveDiskConsume', array('clientServiceId' => $clientServiceId,
                    'diskConsume' => $diskConsume,
                ));
            }
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'files', array('clientCode' => $clientCode)));
        }

        include('modules/Agoraportal/upload/ubr_default_config.php');
        $view->assign('cgi_script', $agora['server']['cgi_script']);

        // read moodle2 repository folder
        if (in_array('moodle2', $activedServicesNames) && $action == 'm2x') {
            $clientService = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientInfo['client'][$clientCode]['clientId'], 'serviceName' => 'moodle2'));
            $folder = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle2']['userprefix'] . $clientService['activedId'] . '/repository/files/';

            if (is_dir($folder)) {
                $moodle2RepoFiles = array();
                $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder), RecursiveIteratorIterator::SELF_FIRST);
                foreach ($objects as $name => $object) {
                    if (substr($name, -2) != '/.' && substr($name, -3) != '/..') {
                        $filename = DataUtil::formatForDisplay($name);
                        $basedir = substr($name, strlen($folder));
                        $file_object = array('name' => DataUtil::formatForDisplay($basedir),
                            'filename' => DataUtil::formatForDisplay($filename),
                            'size' => round((filesize($filename) / 1024) / 1024, 2),
                            'type' => filetype($filename),
                            'time' => date("j F Y, H:i", filemtime($filename)),
                        );
                        $moodle2RepoFiles[] = $file_object;
                    }
                }
            } else {
                LogUtil::registerError($this->__('No s\'ha trobat el directori utilitzat pel repositori del Moodle 2'));
            }

            $view->assign('moodle2RepoFiles', $moodle2RepoFiles);
        }

        return $view->fetch('agoraportal_user_files.tpl');
    }

    public function downloadFile($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GET');
        $filename = FormUtil::getPassedValue('filename', isset($args['filename']) ? $args['filename'] : null, 'GET');
        $courseId = FormUtil::getPassedValue('courseId', isset($args['courseId']) ? $args['courseId'] : 0, 'GET');
        $target = FormUtil::getPassedValue('target', isset($args['target']) ? $args['target'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];

        global $agora;
        $folder = $agora['moodle2']['repository_files'];

        $clientService = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientInfo['client'][$clientCode]['clientId'], 'serviceName' => 'moodle2'));
        $folder = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle2']['userprefix'] . $clientService['activedId'] . $folder;

        //Check if file exists. If not returns error.
        if (!file_exists($filename)) {
            LogUtil::registerError($this->__f('S\'ha produït algun problema en descarregar el fitxer %s', array($filename)));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'files', array('clientCode' => $clientCode,
                                'action' => $target)));
        }

        // get file size
        $fileSize = filesize($filename);
        // Get file extension
        $fileExtension = strtolower(substr(strrchr($filename, "."), 1));

        //Begin writing headers
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        //Force the download
        $header = "Content-Disposition: attachment; filename=" . basename($filename) . ";";
        header($header);
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $fileSize);
        @readfile($filename);
        return true;
    }

    /**
     * calc the space used for a client and a service
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	service id
     * @return:	The use of disk for the given service
     */
    public function calcUsedSpace($args) {
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', isset($args['clientServiceId']) ? $args['clientServiceId'] : null, 'GETPOST');

        $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId,
                    'clientServiceId' => $clientServiceId));
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

        //calc the folder use
        global $agora;

        $serviceName = $services[$client[$clientServiceId]['serviceId']]['serviceName'];
        
        // Get absolute path to usage file
        $dir = $agora['server']['root'] . $agora[$serviceName]['datadir'] . $agora[$serviceName]['userprefix'] . $client[$clientServiceId]['activedId'];

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

// Deprecated
    /**
     * can be used in case of exec functions fails
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Filter values
     * @return:	The disk consumed
     */
/*
    public function getSumatori($args) {
        $dir = FormUtil::getPassedValue('dir', isset($args['dir']) ? $args['dir'] : null, 'POST');
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }
        $handle = opendir($dir);
        if ($handle) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    if ($dir . "/" . $file) {
                        $array_items += filesize($dir . "/" . $file);
                        $file = $dir . "/" . $file;
                        $array_items = $array_items + ModUtil::func('Agoraportal', 'user', 'getSumatori', array('dir' => $file));
                    }
                }
            }
            closedir($handle);
        }
        return $array_items;
    }
*/

    /**
     * Verify the verifyCode sent by the user and change the active nevel if this is correct
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param: verifyCode of the user and clientCode
     * @return:  Error or succed message
     */
    public function changeDNS($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');
        $clientDNS = FormUtil::getPassedValue('clientDNS', isset($args['clientDNS']) ? $args['clientDNS'] : null, 'POST');
        $clientOldDNS = FormUtil::getPassedValue('clientOldDNS', isset($args['clientOldDNS']) ? $args['clientOldDNS'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (ModUtil::apiFunc('Agoraportal', 'user', 'apiChangeDNS', array('clientCode' => $clientCode,
                    'clientDNS' => $clientDNS,
                    'clientOldDNS' => $clientOldDNS))) {
            LogUtil::registerStatus($this->__('S\ha canviat el nom propi del centre satisfactoriament'));
            //Resgister log 
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('action' => $this->__f('S\'ha canviat el DNS del centre de %1$s a %2$s', array($clientOldDNS, $clientDNS)),
                'actionCode' => 1,
                'clientCode' => $clientCode));
        } else {
            LogUtil::registerError($this->__('No s\'ha pogut canviar el nom propi del centre'));
            //Resgister log 
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('action' => $this->__f('No s\'ha pogut canviar el DNS del centre de %1$s a %2$s', array($clientOldDNS, $clientDNS)),
                'actionCode' => 3,
                'clientCode' => $clientCode));
        }

        return System::redirect();
    }

    /**
     * Verify the verifyCode sent by the user and change the active nevel if this is correct
     * 
     * @author Fèlix Casanellas (fcasanel@xtec.cat)
     * @param string clientCode
     * @param string verifyCode of the user and clientCode
     * @return Error or succed message
     */
    public function managerChoose($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');
        $verifyCode = FormUtil::getPassedValue('verifyCode', isset($args['verifyCode']) ? $args['verifyCode'] : null, 'POST');
        $answer = FormUtil::getPassedValue('answer', isset($args['answer']) ? $args['answer'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $uname = UserUtil::getVar('uname');
        $uid = UserUtil::getVar('uid');

        if ($answer == 1) {
            //Check Verify Code
            //Change manager state in manager table and change level of access of the user
            if (!ModUtil::apiFunc('Agoraportal', 'user', 'managerAccept', array('clientCode' => $clientCode,
                        'verifyCode' => $verifyCode,
                        'uname' => $uname,
                        'uid' => $uid))) {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'sitesList'));
            }

            LogUtil::registerStatus($this->__('La validació s\'ha realitzat correctament'));

            //Write the action in the client log
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('action' => $this->__f('L\'usuari/ària %s ha acceptat la funció de gestor/a del centre', $uname),
                'actionCode' => 2,
                'clientCode' => $clientCode));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora'));
        } elseif ($answer == 0) {
            ModUtil::apiFunc('Agoraportal', 'user', 'managerRefuse', array('clientCode' => $clientCode,
                'verifyCode' => $verifyCode,
                'uname' => $uname,
                'uid' => $uid));

            LogUtil::registerStatus($this->__('La cancel·lació s\'ha realitzat correctament'));
            //Write the action in the client log
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('action' => $this->__f('L\'usuari/ària %s ha rebutjat la funció de gestor/a del centre', $uname),
                'actionCode' => 3,
                'clientCode' => $clientCode));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'sitesList'));
        } else {
            throw new Zikula_Exception_Forbidden();
        }
    }

    /**
     * Show the menu for log parameters selection
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     */
    public function logs($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        $isAdmin = (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) ? true : false;
        $client = $clientInfo['client'];
        $logsContent = ModUtil::func('Agoraportal', 'user', 'logsContent');
        // get client services information
        $clientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => -1,
                    'search' => 1,
                    'searchText' => $clientCode));
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $askServices = (count($services) > count($clientServices)) ? true : false;
        return $this->view->assign('askServices', $askServices)
                        ->assign('logsContent', $logsContent)
                        ->assign('isAdmin', $isAdmin)
                        ->assign('client', $client[$clientCode])
                        ->fetch('agoraportal_user_logs.tpl');
    }

    /**
     * Take the parameters of seletcion and return the logs that satisfy, the number of pages and the actual parameters
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  logs parameters
     * @return: all logs that satisfy the parameters, the number of pages and the actual paramaters
     */
    public function logsContent($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : 1, 'POST');
        $actionCode = FormUtil::getPassedValue('actionCode', isset($args['actionCode']) ? $args['actionCode'] : null, 'POST');
        $uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : null, 'POST');
        $fromDate = FormUtil::getPassedValue('fromDate', isset($args['fromDate']) ? $args['fromDate'] : null, 'POST');
        $toDate = FormUtil::getPassedValue('toDate', isset($args['toDate']) ? $args['toDate'] : null, 'POST');
        $pag = FormUtil::getPassedValue('pag', isset($args['pag']) ? $args['pag'] : 1, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        $factor = 20;

        $response = ModUtil::apiFunc('Agoraportal', 'user', 'getLogsContent', array('init' => $init,
                    'clientCode' => $clientCode,
                    'actionCode' => $actionCode,
                    'uname' => $uname,
                    'fromDate' => $fromDate,
                    'toDate' => $toDate,
                    'pag' => $pag,
                    'factor' => $factor));

        $logs = $response['content'];
        $numLogs = $response['numLogs'];
        $numPags = $response['numPags'];
        
        $pags = array();
        for ($i = 1; $i <= $numPags; $i++) {
            $pags[$i] = $i;
        }
        
        $config = array('init' => $init,
            'actionCode' => $actionCode,
            'uname' => $uname,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'pag' => $pag);

        $isAdmin = (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) ? true : false;

        return $this->view->assign('logs', $logs)
                        ->assign('pags', $pags)
                        ->assign('config', $config)
                        ->assign('numLogs', $numLogs)
                        ->assign('isAdmin', $isAdmin)
                        ->fetch('agoraportal_user_logsContent.tpl');
    }

    /**
     * Extract the services available for a client
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The client services array
     * @return:  And array with the client services
     */
    public function getActiveServices($args) {
        $clientServices = FormUtil::getPassedValue('clientServices', isset($args['clientServices']) ? $args['clientServices'] : null, 'POST');
        foreach ($clientServices as $service) {
            if ($service['state'] == 1) {
                $returnServices[$service['serviceId']] = $service;
            }
        }
        return $returnServices;
    }

    /**
     * Allow to assign users' managers
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The configurable parameters
     * @return: True if success and false otherwise
     */
    public function managers($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GETPOST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        $isAdmin = (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) ? true : false;
        $client = $clientInfo['client'];
        // check user access level in Àgora
        $accessLevel = 'none';
        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            $accessLevel = 'comment';
        }

        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            $accessLevel = 'add';
        }

        // get client managers
        $managers = ModUtil::apiFunc('Agoraportal', 'user', 'getManagers', array('clientCode' => $clientCode));
        $canDelegate = ModUtil::func('Agoraportal', 'user', 'canDelegate', array('clientCode' => $clientCode));
        // get client services information
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => -1,
                    'search' => 1,
                    'searchText' => $clientCode));
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $askServices = (count($services) > count($clientInfo)) ? true : false;

        return $this->view->assign('askServices', $askServices)
                        ->assign('isAdmin', $isAdmin)
                        ->assign('client', $client[$clientCode])
                        ->assign('managers', $managers)
                        ->assign('canDelegate', $canDelegate)
                        ->assign('accessLevel', $accessLevel)
                        ->assign('uname', UserUtil::getVar('uname'))
                        ->fetch('agoraportal_user_managers.tpl');
    }

    /**
     * check if a user can delegate others to manage services and users
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The client code
     * @return: True if the user can and false otherwise
     */
    public function canDelegate($args) {
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        // get client managers
        $managers = ModUtil::apiFunc('Agoraportal', 'user', 'getManagers', array('clientCode' => $clientCode));
        // if the number of delegated users in lower than 3 and user have add permissions
        if (count($managers) < 3 && SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
            return true;
        }
        $assigned = false;
        foreach ($managers as $manager) {
            if ($manager['state'] == 1) {
                $assigned = true;
            }
        }
        // The user is the client but nobody has been delegated yet
        if (UserUtil::getVar('uname') == $clientCode && !$assigned && count($managers) == 0) {
            return true;
        }
        return false;
    }

    /**
     * delete a manager for a client
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The managerId
     * @return: True if success and false otherwise
     */
    public function deleteManager($args) {
        $managerId = FormUtil::getPassedValue('managerId', isset($args['managerId']) ? $args['managerId'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        // get manager information
        $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerId' => $managerId));
        $clientCode = $manager['clientCode'];
        // check if user can delete the manager
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];

        // get client managers
        $managers = ModUtil::apiFunc('Agoraportal', 'user', 'getManagers', array('clientCode' => $clientCode));
        $assigned = false;
        foreach ($managers as $manager) {
            if ($manager['state'] == 1) {
                $assigned = true;
            }
        }
        // get a particular manager
        $thisManager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerId' => $managerId));
        // check if realy the user can delete de manager
        if ($clientCode != $thisManager['clientCode'] || (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD) && $assigned)) {
            LogUtil::registerError($this->__('No pots esborrar el gestor/a.'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
        }
        // check if realy the user can delete de manager
        if (UserUtil::getVar('uname') == $thisManager['managerUName']) {
            LogUtil::registerError($this->__('No et pots esborrar a tu mateix/a com a gestor/a.'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
        }
        // the use can delete the manager
        if (!ModUtil::apiFunc('Agoraportal', 'user', 'deleteManager', array('managerId' => $managerId))) {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el gestor/a.'));
        } else {
            LogUtil::registerStatus($this->__('El gestor/a s\'ha esborrat correctament.'));
            // insert the action in logs table
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 3,
                'action' => $this->__f('S\'ha esborrat el gestor amb nom d\'usuari/ària %s', $thisManager['managerUName'])));
        }
        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers', array('clientCode' => $clientCode)));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
    }

    /**
     * add a manager for a client
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The manager information
     * @return: The new manager if success and false otherwise
     */
    public function addManager($args) {
        $managerUName = FormUtil::getPassedValue('managerUName', isset($args['managerUName']) ? $args['managerUName'] : null, 'POST');
        $verifyCode = FormUtil::getPassedValue('verifyCode', isset($args['verifyCode']) ? $args['verifyCode'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        // check if user can add a new manager
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array());
        $clientCode = $clientInfo['clientCode'];
        // Confirm authorisation code
        $this->checkCsrfToken();
        $canDelegate = ModUtil::func('Agoraportal', 'user', 'canDelegate', array('clientCode' => $clientCode));
        if (!$canDelegate) {
            LogUtil::registerError($this->__('No pots crear gestors.'));
            if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers', array('clientCode' => $clientCode)));
            }
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
        }

        // In case an e-mail address was given, remove text after @
        $pos = strpos($managerUName, '@');
        if ($pos !== false) {
            $managerUName = substr($managerUName, 0, $pos);
        }

        // the user delegated can't have a code username
        if (is_numeric(substr($managerUName, 1, strlen($managerUName)))) {
            LogUtil::registerError($this->__('No pots assignar a usuaris genèrics la gestió.'));
            if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers', array('clientCode' => $clientCode)));
            }
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
        }
        // check if the user is manager in another client. A user can only be manager for one client
        $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerUName' => $managerUName));
        if ($manager) {
            // get school name
            $clientMainInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getClientMainInfo', array('clientCode' => $manager['clientCode']));
            LogUtil::registerError($this->__f('L\'usuari/ària ja és gestor/a del centre <strong>%s</strong>. Una mateixa persona no pot ser gestora de dos centres simultàniament.', $clientMainInfo));
            if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers', array('clientCode' => $clientCode)));
            }
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
        }
        // the use can add the manager
        if (!ModUtil::apiFunc('Agoraportal', 'user', 'addManager', array('clientCode' => $clientCode,
                    'managerUName' => $managerUName,
                    'verifyCode' => $verifyCode))) {
            LogUtil::registerError($this->__('No s\'ha pogut crear el gestor/a.'));
        } else {
            LogUtil::registerStatus($this->__('El gestor/a s\'ha creat correctament.'));
            // insert the action in logs table
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 1,
                'action' => $this->__f('S\'ha afegit un gestor amb nom d\'usuari/ària %s', $managerUName)));

            // Send an e-mail to the manager
            // 1.- Check module mailer availability
            $modinfo = ModUtil::getInfo(ModUtil::getIdFromName('Mailer'));

            if ($modinfo['state'] == 3) {
                global $agora;

                // We need to know service base URL
                $mailContent = $this->view->assign('baseURL', $agora['server']['server'] . $agora['server']['base'])
                        ->assign('clientCode', $clientCode)
                        ->assign('managerUName', $managerUName)
                        ->fetch('agoraportal_user_sendMailToNewManager.tpl');

                // get client's email (a8000001@xtec.cat)
                $uidClient = UserUtil::getIdFromName($clientCode);
                $clientVars = UserUtil::getVars($uidClient);

                // Set destination
                $toUsers = array($clientVars['email'], $managerUName . '@xtec.cat');

                // Send the e-mail (BCC to site e-mail)
                $sendMail = ModUtil::apiFunc('Mailer', 'user', 'sendmessage', array('toname' => $clientName,
                            'toaddress' => $toUsers,
                            'subject' => __('Gestió dels serveis Àgora'),
                            'bcc' => System::getVar('adminmail'),
                            'body' => $mailContent,
                            'html' => 1));

                if ($sendMail) {
                    LogUtil::registerStatus($this->__('S\'ha enviat un missatge informatiu'));
                }
            }



        }
        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers', array('clientCode' => $clientCode)));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
    }

    /**
     * Show the client requests list
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param       Client code
     * @return:     The client requests list
     */
    public function requests($args) {
        // client code is optional
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GETPOST');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get client info. If client code is empty, getRealClientCode will use the manager's client code
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        $client = $clientInfo['client'];

        // check user access level in Àgora
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => -1,
                    'search' => 1,
                    'searchText' => $clientCode,
                    'clientCode' => $clientCode));

        $clientInfoArray = $clientInfo;

        foreach ($clientInfoArray as $oneService) {
            $maxDiskSpace = $oneService['diskSpace'] * 1024;
            $percentage = ($maxDiskSpace > 0) ? round($oneService['diskConsume'] * 100 / $maxDiskSpace) : 100;
            $widthUsage = ($percentage > 100) ? 100 : $percentage;
            ($percentage >= 70) ? $alertspace = 1 : $alertspace = 0;
            $clientInfoArray[$oneService['clientServiceId']]['usageArray'] = array('alert' => $alertspace);
        }

        // Get the list of services (intranet, moodle, marsupial)
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $requests = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequests', array('client' => $client[$clientCode]));
        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes');

        return $this->view->assign('client', $client[$clientCode])
                        ->assign('clientArray', $clientInfoArray)
                        ->assign('services', $services)
                        ->assign('clientCode', $clientCode)
                        ->assign('requests', $requests)
                        ->assign('types', $types)
                        ->fetch('agoraportal_user_requests.tpl');
    }

    /**
     * Add a new request
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param       Client and request information
     * @return:     The new request if success and error message otherwise
     */
    public function addRequest($args) {
        $service = FormUtil::getPassedValue('requestMenuServices', isset($args['requestMenuServices']) ? $args['requestMenuServices'] : null, 'GETPOST');
        $typeId = FormUtil::getPassedValue('requestFilter', isset($args['requestFilter']) ? $args['requestFilter'] : null, 'GETPOST');
        $clientId = FormUtil::getPassedValue('clientId', isset($args['clienId']) ? $args['clientId'] : null, 'GETPOST');
        $clientCode = FormUtil::getPassedValue('clientCode', isset($args['clientCode']) ? $args['clientCode'] : null, 'GETPOST');
        $comments = FormUtil::getPassedValue('comments', isset($args['comments']) ? $args['comments'] : null, 'GETPOST');
        $managerid = UserUtil::getVar('uid');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }

        // the user can add the request
        if (!ModUtil::apiFunc('Agoraportal', 'user', 'addRequest', array('clientId' => $clientId,
                    'service' => $service,
                    'typeId' => $typeId,
                    'comments' => $comments,
                    'managerId' => $managerid))) {
            LogUtil::registerError($this->__('No s\'ha pogut crear la sol·licitud'));
        }

        $serviceId = $service;
        $service = ModUtil::apiFunc($this->name, 'user', 'getService', array('serviceId' => $serviceId));
        $types = ModUtil::apiFunc('Agoraportal', 'user', 'getAllRequestTypes');

        LogUtil::registerStatus($this->__('La sol·licitud s\'ha creat correctament'));

        ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('actionCode' => 1,
            'action' => $this->__f('S\'ha fet la sol·licitud de %s del servei %s', array($types[$typeId]['name'],
                $service['serviceName']))));

        return System::redirect(ModUtil::url('Agoraportal', 'user', 'requests', array('clientCode' => $clientCode)));
    }

    /**
     * Get the services associated to a requestType which are active services
     *  of the client associated to the current logged user (which is supposed 
     *  to be a manager)
     * 
     * @author Toni Ginard
     * @author Aida Regi
     * 
     * @param int requestTypeId
     * 
     * @return array Services that meet the conditions
     */
    public function getRequestServices($args) {
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', isset($args['requestTypeId']) ? $args['requestTypeId'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get clientCode of the client associated to the user currently logged in Zikula
        $userLogged = UserUtil::getVar('uname');
        $manager = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerUName' => $userLogged));
        $clientCode = $manager['clientCode'];

        // Get client active services
        $clientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getClientServices', array('clientCode' => $clientCode));

        // Get services allowed for the requestType
        $requestTypesServices = ModUtil::apiFunc('Agoraportal', 'user', 'getRequestTypesServices', array('requestTypeId' => $requestTypeId));

        // Determine which services will be shown in the dropdown menu. Only
        //  allowed services of the active services of the client will be shown.
        foreach ($clientServices as $clientService) {
            foreach ($requestTypesServices as $requestTypesService) {
                if ($clientService['serviceId'] == $requestTypesService['serviceId']) {
                    $allowedServices[$clientService['serviceId']] = $clientService['serviceId'];
                }
            }
        }

        if (count($allowedServices) > 0) {
            // Get the service names
            foreach ($allowedServices as $allowedService) {
                $service = ModUtil::apiFunc('Agoraportal', 'user', 'getService', array('serviceId' => $allowedService));
                $allowedServices[$allowedService] = ucfirst($service['serviceName']);
            }
        }

        return $allowedServices;
    }

    public function getServiceLink($args) {
        $serviceName = FormUtil::getPassedValue('serviceName', isset($args['serviceName']) ? $args['serviceName'] : null, 'POST');
        $clientDNS = FormUtil::getPassedValue('clientDNS', isset($args['clientDNS']) ? $args['clientDNS'] : null, 'POST');
        
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getServiceByName', array('serviceName' => $serviceName));

        return ModUtil::getVar('Agoraportal', 'siteBaseURL') . $clientDNS . '/' . $services['URL'];
    }

    public function recalcConsume($args) {
        // client code is optional
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', isset($args['clientServiceId']) ? $args['clientServiceId'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            $client = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('clientServiceId' => $clientServiceId,
                        'clientServiceId' => $clientServiceId));

            // Get client info. If client code is empty, getRealClientCode will use the manager's client code
            $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $client['clientCode']));
            $clientCode = $clientInfo['clientCode'];

            // for security. The managers only can recalc the quotes of their services
            if ($client[$clientServiceId]['clientCode'] != $clientCode) {
                throw new Zikula_Exception_Forbidden();
            }
        }
        ModUtil::func('Agoraportal', 'user', 'calcUsedSpace', array('clientServiceId' => $clientServiceId));

        LogUtil::registerStatus($this->__('L\'espai consumit s\'ha recalculat correctament.'));
        return System::redirect($_SERVER['HTTP_REFERER']);
    }

    public function servicesTerms() {
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        return $this->view->fetch('agoraportal_user_terms.tpl');
    }

}