<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

class Agoraportal_Controller_User extends Zikula_AbstractController {

    public function postInitialize() {
        $role = AgoraPortal_Util::getRole();
        $this->view->assign('isAdmin', $role == 'admin');
        $this->view->assign('accessLevel', $role);
        $this->view->setCaching(false);
    }

    /**
     * Redirect to the proper initial function
     *
     * @return boolean True if redirect successful, false otherwise.
     */
    public function main() {
        // Security check
        AgoraPortal_Util::requireUser();

        // Redirect to the proper initial function
        if (AgoraPortal_Util::isAdmin()) {
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
        } elseif (AgoraPortal_Util::isClient() || AgoraPortal_Util::isManager()) {
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
    public function myAgora() {
        AgoraPortal_Util::requireClient();

        $clientCode = FormUtil::getPassedValue('clientCode', 0, 'GETPOST');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        if (!$clientCode) {
            return $this->view->assign('noclient', 1)
                ->fetch('agoraportal_user_main.tpl');
        }

        $client = Client::get_by_code($clientCode);

        if (!$client) {
            return LogUtil::registerError($this->__('Error greu. No existeix el client per al codi '.$clientCode.' posseu-vos en contacte amb el SAU'));
        }

        // Load Àgora config (needed later)
        $agora = AgoraPortal_Util::getGlobalAgoraVars();

        $servicetypes = ServiceTypes::get_all();
        $services = $client->get_all_services();

        //Check if the client is pending of change his clientDNS
        //Only for site managers
        $newDNS = false;
        if (AgoraPortal_Util::isManager()) {
            $schooldata = getSchoolFromWS($clientCode);
            // Data for debug (commented)
            // $schooldata['error'] = 0;
            // $schooldata['message'] = 'a8000004$$ceip-platon$$Escola Francesc Platón i Sartí$$c. Salvador Espriu, 3$$Abrera$$08630';
            if ($schooldata['error'] == 1) {
                LogUtil::registerError($schooldata['message']);
            } else {
                // Assume there's info of the school
                $school = explode('$$', $schooldata['message']);
                $returnedDNS = (isset($school[1])) ? $school[1] : '';
                // Keyword equals to '0' means school exists and has no 'nom propi', so an error is shown
                if ($returnedDNS == '0') {
                    return LogUtil::registerError("No s'ha trobat el nom propi del centre. Cal disposar de nom propi per poder sol·licitar serveis d'Àgora");
                }

                if ($returnedDNS != $client->clientDNS) {
                    SessionUtil::setVar('changeDNS_clientCode', $clientCode);
                    SessionUtil::setVar('changeDNS_olddns', $client->clientDNS);
                    SessionUtil::setVar('changeDNS_newdns', $newDNS);
                    $newDNS = $returnedDNS;
                }
            }
        }

        foreach ($services as $key => $service) {
            if (!isset($servicetypes[$key])) {
                unset($services[$key]);
                continue;
            }
        }
        // get client managers
        $managers = $client->get_managers();
        $notsolicitedServices = $client->get_servicestypes_to_request();

        return $this->view->assign('services', $services)
            ->assign('noclient', 0)
            ->assign('client', $client)
            ->assign('servicetypes', $servicetypes)
            ->assign('siteBaseURL', $agora['server']['server'] . $agora['server']['base'])
            ->assign('managers', count($managers))
            ->assign('newDNS', $newDNS)
            ->assign('notsolicitedServices', $notsolicitedServices)
            ->fetch('agoraportal_user_main.tpl');
    }

    /**
     * Allow clients to ask the activation of new services
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	A form with the services available and not solicited
     */
    public function askServices() {
        AgoraPortal_Util::requireManager();

        $acceptUseTerms = FormUtil::getPassedValue('acceptUseTerms', '', 'GETPOST');
        $contactProfile = FormUtil::getPassedValue('contactProfile', '', 'GETPOST');
        $serviceId = FormUtil::getPassedValue('serviceId', 0, 'GETPOST');

        $clientCode = FormUtil::getPassedValue('clientCode', '', 'GETPOST');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        $client = Client::get_by_code($clientCode);

        $templates = ServiceTemplates::get_all();

        // Get not asked services
        $servicetype = $client->can_service_be_requested($serviceId);
        if (!$servicetype) {
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'main', array('clientCode' => $clientCode)));
        }

        return $this->view->assign('service', $servicetype)
                        ->assign('contactName', UserUtil::getVar('uname'))
                        ->assign('contactProfile', $contactProfile)
                        ->assign('acceptUseTerms', $acceptUseTerms)
                        ->assign('client', $client)
                        ->assign('templates', $templates)
                        ->assign('noaccess', false)
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
    public function updateAskService() {
        AgoraPortal_Util::requireManager();

        // Confirm authorisation code
        $this->checkCsrfToken();

        $serviceId = FormUtil::getPassedValue('serviceId', null, 'POST');
        $contactProfile = FormUtil::getPassedValue('contactProfile', null, 'POST');
        $acceptUseTerms = FormUtil::getPassedValue('acceptUseTerms', null, 'POST');
        $clientCode = FormUtil::getPassedValue('clientCode', null, 'POST');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);

        // Check all the required values
        if ($serviceId == null) {
            LogUtil::registerError($this->__('El servei sol·licitat no existeix'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora', array('clientCode' => $clientCode)));
        }

        $serviceName = ServiceType::get_name($serviceId);
        // If service is 'nodes' ensure that the model of service is selected
        if ($serviceName == 'nodes') {
            $plantilla = FormUtil::getPassedValue('template', null, 'POST');
            if (empty($plantilla)) {
                LogUtil::registerError($this->__('No heu indicat indicat quina plantilla voleu per al servei Nodes'));
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'askServices', array(
                                    'serviceId' => $serviceId,
                                    'clientCode' => $clientCode,
                                    'contactProfile' => $contactProfile,
                                    'acceptUseTerms' => $acceptUseTerms)));
            }
        } else {
            $plantilla = "";
        }

        if (empty($contactProfile)) {
            LogUtil::registerError($this->__('No heu indicat el vostre càrrec en el centre'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'askServices', array('serviceId' => $serviceId,
                                    'clientCode' => $clientCode,
                                    'contactProfile' => $contactProfile,
                                    'acceptUseTerms' => $acceptUseTerms)));
        }

        if ($acceptUseTerms == null && !AgoraPortal_Util::isAdmin()) {
            LogUtil::registerError($this->__('No heu acceptat les condicions d\'ús'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'askServices', array('serviceId' => $serviceId,
                                    'clientCode' => $clientCode,
                                    'contactProfile' => $contactProfile,
                                    'acceptUseTerms' => $acceptUseTerms)));
        }

        // Create the new service
        $client = Client::get_by_code($clientCode);
        if (!$client->has_service($serviceId)
            && (!Service::request_service($serviceId, $client->clientId, $contactProfile, $plantilla))) {
                LogUtil::registerError($this->__('S\'ha produït un error en sol·licitar el servei.'));
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora', array('clientCode' => $clientCode)));
        } else {
            LogUtil::registerStatus($this->__('La sol·licitud s\'ha rebut correctament. Quan sigui acceptada o denegada rebreu un missatge de correu electrònic a la vostra bústia de correu XTEC. S\'enviarà una còpia d\'aquest missatge a la bústia del centre.'));
            $client->add_log(ClientLog::CODE_ADD, $this->__f('S\'ha fet la sol·licitud del servei %s', $serviceName));
        }

        return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora', array('clientCode' => $clientCode)));
    }

    /**
     * get the list of sites
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	the client sites list main structure
     */
    public function sitesList() {
        AgoraPortal_Util::requireUser();

        $sitesListContent = ModUtil::func('Agoraportal', 'user', 'sitesListContent');

        $locations = Locations::get_all();
        $types = ClientTypes::get_all();

        // Create output object
        return $this->view->assign('sitesListContent', $sitesListContent)
                            ->assign('locations', $locations)
                            ->assign('types', $types)
                        ->fetch('agoraportal_user_sitesList.tpl');
    }

    /**
     * get the list of sites content
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Filter values
     * @return:	The list of sites content
     */
    public function sitesListContent() {
        AgoraPortal_Util::requireUser();

        $init = FormUtil::getPassedValue('init', -1, 'GETPOST');
        $rpp = FormUtil::getPassedValue('rpp', 10, 'GETPOST');
        $locationId = FormUtil::getPassedValue('location', false, 'GETPOST');
        $typeId =  FormUtil::getPassedValue('typeId', false, 'GETPOST');
        $by =  FormUtil::getPassedValue('search', null, 'GETPOST');
        $search =  FormUtil::getPassedValue('searchText', '', 'GETPOST');

        $clients = Clients::search_with_services_by($by, $search, $locationId, $typeId, $init, $rpp);
        $clientsNumber = Clients::count_with_services_by($by, $search, $locationId, $typeId);

        $pager = ModUtil::func('Agoraportal', 'user', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $clientsNumber,
                    'javascript' => true,
                    'itemsname' => 'centres',
                    'urltemplate' => "sitesList('$typeId', '$locationId', '$by','$search', %%, '$rpp')"));

        // Create output object
        return $this->view->assign('clients', $clients)
                        ->assign('pager', $pager)
                        ->assign('locationId', $locationId)
                        ->assign('typeId', $typeId)
                        ->assign('clientsNumber', $clientsNumber)
                        ->fetch('agoraportal_user_sitesListContent.tpl');
    }

    /**
     * upload big files to the server for moodle courses
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	client code and file to upload
     * @return:	redirect user to the upload form
     */
    public function files() {
        AgoraPortal_Util::requireManager();

        $clientCode = FormUtil::getPassedValue('clientCode', null, 'GET');
        $file = FormUtil::getPassedValue('file', null, 'GET');
        $action = FormUtil::getPassedValue('action', 'uploadFiles', 'GET');

        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        $client = Client::get_by_code($clientCode);

        //TODO: Now the only service that allow to update files is moodle2
        // In the future other services will allow to update files.
        $service = Service::get_by_client_and_servicename($client->clientId, 'moodle2');
        if(!$service) {
            return LogUtil::registerError($this->__('El centre no té el servei Moodle 2 activat'));
        }
        if ($service->diskSpace <= 0) {
            return LogUtil::registerError($this->__('No hi ha espai al disc'));
        }

        // Create output object
        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('service', $service);
        $view->assign('client', $client);
        $view->assign('action', $action);

        $agora = AgoraPortal_Util::getGlobalAgoraVars();

        // upload big file to service folder
        if ($file != null) {
            // send file to folder
            $fileToMove = $agora['server']['ubr_upload'] . $file;
            $destination = $service->getDataDirectory() . $agora['moodle2']['repository_files'];
            if (!file_exists($fileToMove)) {
                LogUtil::registerError($this->__('No s\'ha trobat el directori d\'origen'));
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'files', array('clientCode' => $clientCode)));
            }
            if (!file_exists($destination)) {
                unlink($fileToMove);
                LogUtil::registerError($this->__('No s\'ha trobat el directori de destí ' . $destination));
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'files', array('clientCode' => $clientCode)));
            }
            $moved = rename($fileToMove, $destination . $file);
            if (!$moved) {
                unlink($fileToMove);
                LogUtil::registerError($this->__('S\'ha pujat el fitxer al servidor, però s\'ha produït un error en moure\'l internament en el servidor.'));
            } else {
                LogUtil::registerStatus($this->__f('S\'ha pujat el fitxer <strong>%s</strong> al servidor. El trobareu en el repositori <strong>Fitxers</strong> del vostre Moodle.', $file));
                $size = round(filesize($destination . $file) / 1024);
                $service->diskConsume += $size;
                $service->save();
            }
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'files', array('clientCode' => $clientCode)));
        }

        // Read moodle2 repository folder
        if ($action == 'm2x') {
            $serviceName = $service->servicetype->serviceName;
            $dataDir = $agora['server']['root'] . get_filepath_moodle($service->activedId);
            $folder = $dataDir . $agora[$serviceName]['repository_files'];

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

    public function downloadFile() {
        AgoraPortal_Util::requireManager();

        $clientCode = FormUtil::getPassedValue('clientCode', null, 'GET');
        $filename = FormUtil::getPassedValue('filename', null, 'GET');
        $target = FormUtil::getPassedValue('target', null, 'GET');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);

        //Check if file exists. If not returns error.
        if (!file_exists($filename)) {
            LogUtil::registerError($this->__f('S\'ha produït algun problema en descarregar el fitxer %s', array($filename)));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'files', array('clientCode' => $clientCode,
                                'action' => $target)));
        }

        // get file size
        $fileSize = filesize($filename);

        // Begin writing headers
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        // Force the download
        $header = "Content-Disposition: attachment; filename=" . basename($filename) . ";";
        header($header);
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $fileSize);
        @readfile($filename);
        return true;
    }

    /**
     * Verify the verifyCode sent by the user and change the active nevel if this is correct
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @author     Pau Ferrer (pferre22@xtec.cat)
     * @return:  Error or succeed message
     */
    public function changeDNS() {
        AgoraPortal_Util::requireClient();

        $clientCode = FormUtil::getPassedValue('clientCode', null, 'POST');
        $clientDNS = FormUtil::getPassedValue('clientDNS', null, 'POST');
        $clientOldDNS = FormUtil::getPassedValue('clientOldDNS', null, 'POST');

        // Securize form info
        $changeDNS_clientCode = SessionUtil::getVar('changeDNS_clientCode', false);
        $changeDNS_olddns = SessionUtil::getVar('changeDNS_olddns', false);
        $changeDNS_newdns = SessionUtil::getVar('changeDNS_newdns', false);
        SessionUtil::delVar('changeDNS_clientCode');
        SessionUtil::delVar('changeDNS_olddns');
        SessionUtil::delVar('changeDNS_newdns');

        if (!$clientCode || $clientCode != $changeDNS_clientCode || !$clientDNS || $clientDNS != $changeDNS_newdns || !$clientOldDNS || $clientOldDNS != $changeDNS_olddns) {
            return LogUtil::registerError($this->__('Els paràmetres per al canvi de nom no coincideixen, o bé falten dades'));
        }

        $client = Client::get_by_code($clientCode);
        if ($client) {
            return LogUtil::registerError($this->__('No s\'ha trobat el client'));
        }

        if (!$client->changeDNS($clientOldDNS, $clientDNS)) {
            $client->add_log(ClientLog::CODE_ERROR, $this->__f('No s\'ha pogut canviar el DNS del centre de %1$s a %2$s', array($clientOldDNS, $clientDNS)));
            return LogUtil::registerError($this->__('El DNS antic no coincideix. No s\'ha pogut canviar el nom propi del centre'));
        }

        $text = $this->__f('S\'ha canviat el nom propi del centre a Àgora de <strong>%1$s</strong> a <strong>%2$s</strong>. En aquests moments s\'estan realitzant actualitzacions automàtiques als serveis. Per aquest motiu, és possible que durant els propers 10 minuts mostrin algun error.', array($clientOldDNS, $clientDNS));
        LogUtil::registerStatus($text);
        $client->add_log(ClientLog::CODE_MODIFY, $text);

        return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora', array('clientCode' => $clientCode)));
    }

    /**
     * Show the menu for log parameters selection
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     */
    public function logs($args) {
        AgoraPortal_Util::requireClient();

        $clientCode = FormUtil::getPassedValue('clientCode', 0, 'GETPOST');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        $client = Client::get_by_code($clientCode);

        $logsContent = ModUtil::func('Agoraportal', 'user', 'logsContent', $args);

        return $this->view->assign('logsContent', $logsContent)
                        ->assign('client', $client)
                        ->fetch('agoraportal_user_logs.tpl');
    }

    /**
     * Take the parameters of seletcion and return the logs that satisfy, the number of pages and the actual parameters
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  logs parameters
     * @return: all logs that satisfy the parameters, the number of pages and the actual paramaters
     */
    public function logsContent() {
        AgoraPortal_Util::requireClient();

        $clientCode = FormUtil::getPassedValue('clientCode', 0, 'GETPOST');
        $actionCode = FormUtil::getPassedValue('actionCode', null, 'POST');
        $uname = FormUtil::getPassedValue('uname', null, 'POST');
        $fromDate = FormUtil::getPassedValue('fromDate', null, 'POST');
        $toDate = FormUtil::getPassedValue('toDate', null, 'POST');
        $init = FormUtil::getPassedValue('init', -1, 'POST');

        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        $client = Client::get_by_code($clientCode);

        $search = array('actionCode' => $actionCode,
                        'uname' => $uname,
                        'fromDate' => $fromDate,
                        'toDate' => $toDate);
        $response = $client->get_logs($search, $init);

        $logs = $response['content'];
        $numLogs = $response['numLogs'];

        $rpp = 20;
        $pager = ModUtil::func('Agoraportal', 'user', 'pager',
            array('init' => $init,
                'rpp' => $rpp,
                'total' => $numLogs,
                'itemsname' => 'registres',
                'javascript' => true,
                'urltemplate' => "logs('$clientCode','$actionCode','$fromDate','$toDate','$uname',%%);"));


        return $this->view->assign('logs', $logs)
                        ->assign('pager', $pager)
                        ->assign('numLogs', $numLogs)
                        ->assign('clientCode', $clientCode)
                        ->fetch('agoraportal_user_logsContent.tpl');
    }

    /**
     * Allow to assign users' managers
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The configurable parameters
     * @return: True if success and false otherwise
     */
    public function managers() {
        AgoraPortal_Util::requireClient();

        $clientCode = FormUtil::getPassedValue('clientCode',0, 'GETPOST');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);

        $client = Client::get_by_code($clientCode);
        $managers = Managers::get_client_managers($client->clientCode);
        $can_add_managers = Manager::can_add_managers($client->clientCode);

        return $this->view
                        ->assign('client', $client)
                        ->assign('managers', $managers)
                        ->assign('can_add_managers', $can_add_managers)
                        ->assign('uname', UserUtil::getVar('uname'))
                        ->fetch('agoraportal_user_managers.tpl');
    }

    /**
     * delete a manager for a client
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The managerId
     * @return: True if success and false otherwise
     */
    public function deleteManager() {
        AgoraPortal_Util::requireClient();

        $managerId = FormUtil::getPassedValue('managerId', 0, 'GETPOST');
        $clientCode = FormUtil::getPassedValue('clientCode', 0, 'GETPOST');

        $manager = Manager::get_by_id($managerId);
        // check if user can delete the manager
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        if($clientCode != $manager->clientCode) {
            return LogUtil::registerError($this->__('Els codis de client no coincideixen'));
        }

        $client = Client::get_by_code($clientCode);

        $username = $manager->managerUName;
        // check if the user can delete the manager
        if (UserUtil::getVar('uname') == $username) {
            return LogUtil::registerError($this->__('No et pots esborrar a tu mateix com a gestor'));
        }

        if (!AgoraPortal_Util::remove_user_from_group('Managers', $username)) {
            return LogUtil::registerError($this->__('No s \'ha pogut deshabilitar el gestor'));
        }

        if (!$manager->delete()) {
            return LogUtil::registerError($this->__('No s \'ha pogut eliminar el gestor'));
        }

        LogUtil::registerStatus($this->__('El gestor s\'ha esborrat correctament.'));
        $client->add_log(ClientLog::CODE_DELETE, $this->__f('S\'ha esborrat el gestor amb nom d\'usuari %s', $username));
        return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers', array('clientCode' => $clientCode)));
    }

    /**
     * add a manager for a client
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: The manager information
     * @return: The new manager if success and false otherwise
     */
    public function addManager() {
        AgoraPortal_Util::requireClient();
        // Confirm authorisation code
        $this->checkCsrfToken();

        $managerUName = FormUtil::getPassedValue('managerUName', null, 'POST');
        $confirm = FormUtil::getPassedValue('confirm', false, 'POST');
        $clientCode = FormUtil::getPassedValue('clientCode', null, 'POST');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        $client = Client::get_by_code($clientCode);

        if ($confirm) {
            if (!$client->add_manager($managerUName)) {
                LogUtil::registerError($this->__("No s'ha pogut convertir en gestor l'usuari indicat."));
            } elseif (!AgoraPortal_Util::add_user_to_group('Managers', $managerUName)) {
                LogUtil::registerError($this->__("No s'ha pogut habilitar el gestor"));
            } else {
                LogUtil::registerStatus($this->__("El gestor s'ha creat correctament. Aviseu a l'usuari designat que a partir d'ara podrà gestionar els serveis del centre des d'aquest portal."));
                $client->add_log(ClientLog::CODE_ADD, $this->__f("S'ha afegit un gestor amb nom d'usuari %s", $managerUName));
            }
        } else {
            LogUtil::registerError($this->__('No s\'ha afegit el gestor/a.'));
        }

        return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers', array('clientCode' => $clientCode)));
    }

    /**
     * Show the client requests list
     * @author      Aida Regi Cosculluela (aregi@xtec.cat)
     * @param       Client code
     * @return:     The client requests list
     */
    public function requests() {
        if (!AgoraPortal_Util::isManager()) {
            LogUtil::registerError($this->__("L'accés amb codi de centre només permet modificar els gestors. Les sol·licituds (ampliacions de quota, canvis de contrasenya, etc.) les han de fer els gestors."));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
        }

        // client code is optional
        $clientCode = FormUtil::getPassedValue('clientCode',0 , 'GETPOST');

        // Get client info. If client code is empty, getClientCodeFromUser will use the manager's client code
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        $client = Client::get_by_code($clientCode);

        $types = array();
        $services = ServiceTypes::get_all();
        foreach ($services as $service) {
            $types[$service->serviceId] = RequestTypes::get_service_types($service->serviceId);
        }
        $requests = Requests::get_client_requests($client->clientId);
        $enabledServices = $client->get_enabled_services();

        return $this->view->assign('client', $client)
                        ->assign('services', $services)
                        ->assign('enabledservices', $enabledServices)
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
    public function addRequest() {
        if (!AgoraPortal_Util::isManager()) {
            LogUtil::registerError($this->__("L'accés amb codi de centre només permet modificar els gestors. Les sol·licituds (ampliacions de quota, canvis de contrasenya, etc.) les han de fer els gestors."));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'managers'));
        }

        $serviceIdrequestTypeId = FormUtil::getPassedValue('requestFilter', '', 'GETPOST');
        $split = explode(":", $serviceIdrequestTypeId, 2);
        $serviceId = $split[0];
        $requestTypeId = $split[1];
        $comments = FormUtil::getPassedValue('comments', '', 'GETPOST');

        $clientCode = FormUtil::getPassedValue('clientCode', 0, 'GETPOST');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        $client = Client::get_by_code($clientCode);

        $type = RequestType::get_by_id($requestTypeId);
        if (!$type) {
            LogUtil::registerError($this->__('El tipus de sol·licitud no existeix'.$requestTypeId));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'requests', array('clientCode' => $clientCode)));
        }

        $service = Service::get_by_client_and_service($client->clientId, $serviceId);
        if (!Request::add($service->serviceId, $service->clientId, $requestTypeId, $comments)) {
            LogUtil::registerError($this->__('No s\'ha pogut crear la sol·licitud'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'requests', array('clientCode' => $clientCode)));
        }

        LogUtil::registerStatus($this->__('La sol·licitud s\'ha creat correctament'));

        $client->add_log(ClientLog::CODE_ADD, $this->__f('S\'ha fet la sol·licitud de %s del servei %s', array($type->name, $service->get_servicetype_name())));

        return System::redirect(ModUtil::url('Agoraportal', 'user', 'requests', array('clientCode' => $clientCode)));
    }

    public function recalcConsume() {
        AgoraPortal_Util::requireClient();

        // client code is optional
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', null, 'GET');
        $service = Service::get_by_id($clientServiceId);

        if (Service::calcUsedSpace($service)) {
            LogUtil::registerStatus($this->__('L\'espai consumit s\'ha recalculat correctament.'));
        }

        return System::redirect($_SERVER['HTTP_REFERER']);
    }

    public function servicesTerms() {
        AgoraPortal_Util::requireUser();
        return $this->view->fetch('agoraportal_user_terms.tpl');
    }

    /**
     * Display a pager in the clients and the services lists
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The pager main parameters
     * @return:		The pager code
     */
    public function pager($args) {
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'POST');
        $init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init'] : -1, 'POST');
        $total = FormUtil::getPassedValue('total', isset($args['total']) ? $args['total'] : 0, 'POST');
        $urltemplate = FormUtil::getPassedValue('urltemplate', isset($args['urltemplate']) ? $args['urltemplate'] : null, 'POST');
        $javascript = FormUtil::getPassedValue('javascript', isset($args['javascript']) ? $args['javascript'] : false, 'POST');
        $itemsname = FormUtil::getPassedValue('itemsname', isset($args['itemsname']) ? $args['itemsname'] : '', 'POST');

        $items = AgoraPortal_Util::pager($total, $urltemplate, $init, $rpp, $javascript);
        $init = ($init < 0) ? 0 : $init;

        return $this->view->assign('items', $items)
            ->assign('total', $total)
            ->assign('init', $init)
            ->assign('itemsname', $itemsname)
            ->fetch('agoraportal_user_pager.tpl');
    }
}
