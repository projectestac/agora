<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

class Agoraportal_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        AgoraPortal_Util::requireAdmin();
        $this->view->assign('isAdmin', true);
        $this->view->assign('accessLevel', 'admin');
        $this->view->setCaching(false);
    }

    /**
     * Redirect administrators to services list
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:		Redirect user to function servicesList
     */
    public function main() {
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
    }

    /**
     * Display the edit form for a service
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The client-service identity and the filter values
     * @return:		The edit form
     */
    public function editService($args) {
        $clientServiceId = AgoraPortal_Util::getFormVar($args, 'clientServiceId', null, 'GET');

        $service = Service::get_by_id($clientServiceId);
        $client = $service->get_client();
        $servicetype = $service->get_servicetype();

        if ($servicetype->serviceName == 'nodes') {
            $templates = ServiceTemplates::get_all();
            $this->view->assign('templates', $templates);
        }

        // check module mailer availability
        $mailer = AgoraPortal_Util::isMailerAvalaible();

        if ($service->diskSpace == 0) {
            $service->diskSpace = $servicetype->defaultDiskSpace;
        }

        $service->annotations = preg_replace("[\n|\r|\n\r]", "", $service->annotations);
        $service->observations = preg_replace("[\n|\r|\n\r]", "", $service->observations);

        return $this->view->assign('mailer', $mailer)
                        ->assign('serviceName', $servicetype->serviceName)
                        ->assign('service', $service)
                        ->assign('client', $client)
                        ->fetch('agoraportal_admin_editService.tpl');
    }

    /**
     * Process the values received from the service edit form
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The main client and service parameters
     * @return:		An error message if fails and redirect user to function servicesList
     */
    public function updateService($args) {
        global $agora;

        $this->checkCsrfToken(); // Confirm authorisation code

        $clientServiceId = AgoraPortal_Util::getFormVar($args, 'clientServiceId', false, 'POST');
        $clientService = Service::get_by_id($clientServiceId);
        if (!$clientService) {
            LogUtil::registerError($this->__('No s\'ha trobat el servei'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        }

        $client = $clientService->get_client();
        // Get the definition of the services
        $service = $clientService->get_servicetype();
        $serviceName = $service->serviceName;
        if ($serviceName == 'nodes') {
            $client->extraFunc = AgoraPortal_Util::getFormVar($args, 'extraFunc', null, 'POST');
            $success = $client->save();
            if (!$success) {
                LogUtil::registerError($this->__('S\'ha produït un error en l\'edició del client'));
                return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
            }
        }

        $clientService->serviceDB = AgoraPortal_Util::getFormVar($args, 'serviceDB', null, 'POST');
        $clientService->observations = AgoraPortal_Util::getFormVar($args, 'observations', null, 'POST');
        $clientService->annotations = AgoraPortal_Util::getFormVar($args, 'annotations', null, 'POST');
        $clientService->diskSpace = AgoraPortal_Util::getFormVar($args, 'diskSpace', 0, 'POST');

        // Autofill serviceDB var with default value. This is a guess. serviceDB should come from web form.
        if ((is_null($clientService->serviceDB) || empty($clientService->serviceDB)) && (($serviceName == 'intranet') || ($serviceName == 'nodes'))) {
            $clientService->serviceDB = $agora['intranet']['host'];
        }

        // Create a var for admin password where to keep it in order to send it by e-mail
        $password = "";

        $state = AgoraPortal_Util::getFormVar($args, 'state', null, 'POST');
        $result = $clientService->changeState($state);
        if (!$result) {
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        } else if ($result !== true) {
            $password = $result;
        }
        $clientService->save();

        // send informational mail if it is necessary
        // check if module mailer is active

        $sendMail = AgoraPortal_Util::getFormVar($args, 'sendMail', false, 'POST');
        if($sendMail && ($state < -1 || $state == 1)) {
            // We need to know service base URL
            $mailContent = $this->view
                ->assign('baseURL', $agora['server']['server'] . $agora['server']['base'])
                ->assign('password', $password)
                ->assign('client', $client)
                ->assign('service', $clientService)
                ->assign('servicetype', $service)
                ->fetch('mail_updateService.tpl');
            $client->send_mail( __('Estat dels serveis del centre a Àgora'), $mailContent);
        }

        LogUtil::registerStatus($this->__('El client i el servei s\'han modificat correctament'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
    }

    /**
     * Display the edit form for a client
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The main client parameters
     * @return:		The edit form
     */
    public function editClient($args) {
        $clientId = AgoraPortal_Util::getFormVar($args, 'clientId', null, 'GET');
        $client = Client::get_by_id($clientId);
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }
        $locations = Locations::get_all();
        $types = ClientTypes::get_all();
        $templates = ServiceTemplates::get_all();

        return $this->view->assign('client', $client)
                        ->assign('locations', $locations)
                        ->assign('types', $types)
                        ->assign('templates', $templates)
                        ->fetch('agoraportal_admin_editClient.tpl');
    }

    /**
     * Process the values received from the client edit form
     * @author:		Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:		The main client parameters
     * @return:		An error message if fails and redirect user to function servicesList
     */
    public function updateClient($args) {
        $this->checkCsrfToken(); // Confirm authorisation code

        $clientId = AgoraPortal_Util::getFormVar($args, 'clientId', null, 'POST');
        $client = Client::get_by_id($clientId);

        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        }

        $client->clientState = AgoraPortal_Util::getFormVar($args, 'clientState', null, 'POST');
        $client->clientDescription = AgoraPortal_Util::getFormVar($args, 'clientDescription', null, 'POST');
        $client->clientDNS = AgoraPortal_Util::getFormVar($args, 'clientDNS', null, 'POST');
        $client->clientName = AgoraPortal_Util::getFormVar($args, 'clientName', null, 'POST');
        $client->clientAddress = AgoraPortal_Util::getFormVar($args, 'clientAddress', null, 'POST');
        $client->clientCity = AgoraPortal_Util::getFormVar($args, 'clientCity', null, 'POST');
        $client->clientPC = AgoraPortal_Util::getFormVar($args, 'clientPC', null, 'POST');
        $client->locationId = AgoraPortal_Util::getFormVar($args, 'locationId', null, 'POST');
        $client->typeId = AgoraPortal_Util::getFormVar($args, 'typeId', 0, 'POST');
        $client->noVisible = AgoraPortal_Util::getFormVar($args, 'noVisible', 0, 'POST');
        $client->extraFunc = AgoraPortal_Util::getFormVar($args, 'extraFunc', null, 'POST');
        $client->educat = AgoraPortal_Util::getFormVar($args, 'educat', 0, 'POST');
        $success = $client->save();
        if (!$success) {
            LogUtil::registerError($this->__('S\'ha produït un error en l\'edició del client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }

        // Check if only editing client information (table agoraportal_clients), in that case, we're done
        LogUtil::registerStatus($this->__('El client ha estat editat correctament'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
    }

    /**
     * Delete a client and all the services associated with the client
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The client identity
     * @return:		An error message if fails and redirect user to function clientsList
     */
    public function deleteClient($args) {
        $clientId = AgoraPortal_Util::getFormVar($args, 'clientId');

        $client = Client::get_by_id($clientId);
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }

        $confirm = AgoraPortal_Util::getFormVar($args, 'confirm', null, 'POST');
        if (!$confirm) {
            $services = $client->get_all_services();

            return $this->view->assign('client', $client)
                            ->assign('services', $services)
                            ->fetch('agoraportal_admin_deleteClient.tpl');
        }

        // The client deletion has been confirmed
        $this->checkCsrfToken();

        if(Client::delete($clientId)) {
            LogUtil::registerStatus($this->__('El client i tota la informació asociada ha estat esborrada'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
    }

    /**
     * Delete a service
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The client-service identity
     * @return:		An error message if fails and redirect user to function servicesList
     */
    public function deleteService($args) {
        $clientServiceId = AgoraPortal_Util::getFormVar($args, 'clientServiceId');
        $confirm = AgoraPortal_Util::getFormVar($args, 'confirm', null, 'POST');

        $service = Service::get_by_id($clientServiceId);
        if (!$service) {
            LogUtil::registerError($this->__('No s\'ha trobat el servei'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        }
        $servicetype = $service->get_servicetype();

        $client = $service->get_client();
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        }

        // Get all the services
        if (!$confirm) {
            return $this->view->assign('client', $client)
                            ->assign('service', $service)
                            ->assign('servicetype', $servicetype)
                            ->fetch('agoraportal_admin_deleteService.tpl');
        }
        $this->checkCsrfToken();

        if (Service::delete($clientServiceId)) {
            // insert the action in logs table
            $client->add_log(ClientLog::CODE_DELETE, $this->__f('S\'ha esborrat el servei %s', $servicetype->serviceName));
            LogUtil::registerStatus($this->__('El servei ha estat esborrat'));
        }

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
    }

    /**
     * Display the list of services associated with clients
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		The services list page
     */
    public function servicesList($args) {
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15);
        $service = AgoraPortal_Util::getFormVar($args, 'service', '0');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', 0);
        $search = AgoraPortal_Util::getFormVar($args, 'search', "");
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', "");
        $order = AgoraPortal_Util::getFormVar($args, 'order', 2);

        if (SessionUtil::getVar('serviceList')) {
            $args = unserialize(SessionUtil::getVar('serviceList'));
            $service = $args['service'];
            $stateFilter = $args['stateFilter'];
            $search = $args['search'];
            $searchText = $args['searchText'];
            $order = $args['order'];
        }

        if (SessionUtil::getVar('execOper')) {
            $execOper = SessionUtil::getVar('execOper');
            SessionUtil::delVar('execOper');
        } else {
            $execOper = false;
        }

        $servicesListContent = ModUtil::func('Agoraportal', 'admin', 'servicesListContent', $args);

        return $this->view->assign('servicesListContent', $servicesListContent)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('service', $service)
                        ->assign('stateFilter', $stateFilter)
                        ->assign('rpp', $rpp)
                        ->assign('order', $order)
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
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1);
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15);
        $serviceId = AgoraPortal_Util::getFormVar($args, 'service', '0');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', 0);
        $search = AgoraPortal_Util::getFormVar($args, 'search', "");
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', "");
        $order = AgoraPortal_Util::getFormVar($args, 'order', 2);

        // Escape special chars
        $searchText = addslashes($searchText);
        $servicetypes = ServiceTypes::get_all();

        $searchargs = array('state' => $stateFilter, 'serviceId' => $serviceId);
        if (!empty($search) && !empty($searchText)) {
            $searchargs[$search] = $searchText;
        }
        $services = Services::search_by_full($searchargs, $order, $init, $rpp);
        $disks = array();
        foreach ($services as $clientServiceId => $service) {
            $disk = new StdClass();
            $disk->percent = $service->get_disk_percentage();
            $class = $service->get_disk_alert_class();
            $color = $class ? $class.' text-'.$class : "";
            $disk->color = $color;
            $disks[$clientServiceId] = $disk;
        }

        $clientsNumber = Services::count_by($searchargs);
        $pager = ModUtil::func('Agoraportal', 'user', 'pager',
            array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $clientsNumber,
                    'itemsname' => 'serveis',
                    'javascript' => true,
                    'urltemplate' => "servicesList('$serviceId','$stateFilter','$search','$searchText','$order',%%,'$rpp');"));

        return $this->view->assign('services', $services)
                        ->assign('disks', $disks)
                        ->assign('servicetypes', $servicetypes)
                        ->assign('pager', $pager)
                        ->fetch('agoraportal_admin_servicesListContent.tpl');
    }

    /**
     * Get the list of actions associated with services
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      Service
     * @return:     Json of actions
     */
    public function getServiceActions($args) {
        $serviceid = AgoraPortal_Util::getFormVar($args, 'service', '0', 'POST');

        if (!$serviceid) {
            return $this->getServiceActions_noaction('No hi ha accions disponibles pel servei Portal');
        }

        $servicetype = ServiceType::get_by_id($serviceid);

        $post_url = $servicetype->get_operations_list_command();
        if(!$post_url) {
            return $this->getServiceActions_noaction('No hi ha accions disponibles pel servei '.$servicetype->serviceName);
        }

        $services = $servicetype->get_enabled_services();
        if (empty($services)) {
            return $this->getServiceActions_noaction('No hi ha cap client amb el servei ' . $servicetype->serviceName);
        }

        $url = false;
        foreach ($services as $service) {
            $url = $service->get_url();
            if ($url) {
                break;
            }
        }

        if (!$url) {
            return $this->getServiceActions_noaction('Error calculant la URL');
        }

        $url .= $post_url;
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
        $actions = curl_exec($curl_handle);
        curl_close($curl_handle);

        if (json_decode($actions)) {
            return $actions;
        }

        return $this->getServiceActions_noaction('La URL '.$url.' no ha retornat cap acció');
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
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15);
        $search = AgoraPortal_Util::getFormVar($args, 'search', "");
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', "");

        if (SessionUtil::getVar('clientsList')) {
            $args = unserialize(SessionUtil::getVar('clientsList'));
            $rpp = $args['rpp'];
            $search = $args['search'];
            $searchText = $args['searchText'];
        }

        $clientsListContent = ModUtil::func('Agoraportal', 'admin', 'clientsListContent', $args);
        return $this->view->assign('clientsListContent', $clientsListContent)
                        ->assign('rpp', $rpp)
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
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1);
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15);
        $by = AgoraPortal_Util::getFormVar($args, 'search');
        $search = AgoraPortal_Util::getFormVar($args, 'searchText');

        $clients = Clients::search_by($by, $search, $init, $rpp);
        $clientsNumber = Clients::count_by($by, $search);

        $pager = ModUtil::func('Agoraportal', 'user', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $clientsNumber,
                    'javascript' => true,
                    'itemsname' => 'clients',
                    'urltemplate' => "clientsList('$by','$search', %%, '$rpp')"));

        return $this->view->assign('clients', $clients)
                        ->assign('pager', $pager)
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

        // Create client in database
        $client = Client::create(array('clientCode' => $clientCode,
                                        'clientName' => $clientName,
                                        'clientDNS' => $clientDNS,
                                        'clientAddress' => $clientAddress,
                                        'clientCity' => $clientCity,
                                        'clientPC' => $clientPC,
                                        'clientState' => $clientState,
                                        'clientDescription' => $clientDescription));

        if (!$client) {
            LogUtil::registerError($this->__('La creació del client ha fallat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }
        // success
        LogUtil::registerStatus($this->__('El client s\'ha creat correctament'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
    }

    /**
     * Display the maintain tools available for a given service and proceed to use a tool
     *
     * @author:		Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:		The client-service identity and the action that must be done
     * @return:		An success message if success and error message if fails. Redirect user to clients' list
     */
    public function serviceTools($args) {
        $clientServiceId = AgoraPortal_Util::getFormVar($args, 'clientServiceId');
        $action = AgoraPortal_Util::getFormVar($args, 'action', null, 'GET');

        // get client information
        $service = Service::get_by_id($clientServiceId);
        if (!$service) {
            LogUtil::registerError($this->__('No s\'ha trobat el servei'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }

        if (!$service->execute_action($action)) {
            LogUtil::registerError($this->__('S\'ha produït un error en executar l\'acció'));
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora', array('clientCode' => $service->client->clientCode)));
        }

        LogUtil::registerStatus($this->__('L\'acció s\'ha executat amb èxit'));
        return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora', array('clientCode' => $service->client->clientCode)));
    }

    /**
     * Display the module configuration form
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:		The form fields
     */
    public function config() {
        $locations = Locations::get_all();
        $schooltypes = ClientTypes::get_all();
        $requesttypes = RequestTypes::get_all();
        $templates = ServiceTemplates::get_full_info();

        $servicetypes = ServiceTypes::get_all();
        $extraInfo = array();
        foreach ($servicetypes as $id => $servicetype) {
            $extra = new StdClass();
            $extra->serverFolder = $servicetype->getDataDirectory();
            $extra->validFolder = is_dir($servicetype->getParentDataDirectory());
            $extra->tablesPrefix = $servicetype->getTablePrefix();
            $extraInfo[$id] = $extra;
        }

        return $this->view->assign('siteBaseURL', $this->getVar('siteBaseURL'))
                        ->assign('warningMailsTo', $this->getVar('warningMailsTo'))
                        ->assign('requestMailsTo', $this->getVar('requestMailsTo'))
                        ->assign('diskRequestThreshold', $this->getVar('diskRequestThreshold'))
                        ->assign('clientsMailThreshold', $this->getVar('clientsMailThreshold'))
                        ->assign('maxAbsFreeQuota', $this->getVar('maxAbsFreeQuota'))
                        ->assign('maxFreeQuotaForRequest', $this->getVar('maxFreeQuotaForRequest'))
                        ->assign('services', $servicetypes)
                        ->assign('extras', $extraInfo)
                        ->assign('locations', $locations)
                        ->assign('schooltypes', $schooltypes)
                        ->assign('requesttypes', $requesttypes)
                        ->assign('templates', $templates)
                        ->assign('createDB', $this->getVar('createDB'))
                        ->fetch('config.tpl');
    }

    /**
     * Update the configuration parameters received from the form
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The confurable parameters
     * @return:		A success or an error message and redirect user to clients' list
     */
    public function updateConfig($args) {
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
     * Create a new location
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The location main values
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewLocation($args) {
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $locationName = AgoraPortal_Util::getFormVar($args, 'locationName', null, 'POST');

        if ($confirmation == null) {
            return $this->view->fetch('config_location_add.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        if (Location::create($locationName)) {
            LogUtil::registerStatus($this->__('S\'ha creat un Servei Territorial nou'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en la creació del Servei Territorial'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Edit a location
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The location identity
     * @return:		An array with the available services
     */
    public function editLocation($args) {
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $locationId = AgoraPortal_Util::getFormVar($args, 'locationId');
        $locationName = AgoraPortal_Util::getFormVar($args, 'locationName', null, 'POST');

        $location = Location::get_by_id($locationId);
        if (!$location) {
            return LogUtil::registerError($this->__('No s\'ha trobat el Servei Territorial'));
        }

        if (!$confirmation) {
            return $this->view->assign('location', $location)
                ->fetch('config_location_edit.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $location->locationName = $locationName;

        if ($location->save()) {
            LogUtil::registerStatus($this->__('El Servei Territorial s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar el nom del Servei Territorial'));
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
        $locationId = AgoraPortal_Util::getFormVar($args, 'locationId');

        if (Location::delete($locationId)) {
            LogUtil::registerStatus($this->__('S\'ha esborrat el Servei Territorial'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el Servei Territorial'));
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
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $requestTypeName = AgoraPortal_Util::getFormVar($args, 'requestTypeName', null, 'POST');
        $requestTypeDescription = AgoraPortal_Util::getFormVar($args, 'requestTypeDescription', null, 'POST');
        $requestTypeUserCommentsText = AgoraPortal_Util::getFormVar($args, 'requestTypeUserCommentsText', null, 'POST');

        if ($confirmation == null) {
            return $this->view->fetch('config_requesttype_add.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // editing the record
        if (RequestType::create($requestTypeName, $requestTypeDescription, $requestTypeUserCommentsText)) {
            LogUtil::registerStatus($this->__('S\'ha creat un tipus de sol·licitud nou'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en la creació del tipus de sol·licitud'));
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
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $requestTypeId = AgoraPortal_Util::getFormVar($args, 'requestTypeId');

        $requestType = RequestType::get_by_id($requestTypeId);
        if (!$requestType) {
            return LogUtil::registerError($this->__('No s\'ha trobat el tipus de sol·licitud'));
        }

        if (!$confirmation) {
            return $this->view->assign('requestType', $requestType)
                ->fetch('config_requesttype_edit.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $requestType->name = AgoraPortal_Util::getFormVar($args, 'requestTypeName', null, 'POST');
        $requestType->description = AgoraPortal_Util::getFormVar($args, 'requestTypeDescription', null, 'POST');
        $requestType->userCommentsText = AgoraPortal_Util::getFormVar($args, 'requestTypeUserCommentsText', null, 'POST');
        if ($requestType->save()) {
            LogUtil::registerStatus($this->__('El tipus de sol·licitud s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar el tipus de sol·lcitud'));
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
        $requestTypeId = AgoraPortal_Util::getFormVar($args, 'requestTypeId');

        if (RequestType::delete($requestTypeId)) {
            LogUtil::registerStatus($this->__('S\'ha esborrat el tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el tipus de sol·licitud'));
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
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');

        if (!$confirmation) {
            $requestType = RequestTypes::get_all();
            $services = ServiceTypes::get_all();
            return $this->view->assign('requestType', $requestType)
                ->assign('services', $services)
                ->fetch('config_requesttype_assignservice.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $requesttypeid = AgoraPortal_Util::getFormVar($args, 'requesttype', null, 'POST');
        $requestType = RequestType::get_by_id($requesttypeid);
        if (!$requestType) {
            return LogUtil::registerError($this->__('No s\'ha trobat el tipus de sol·licitud'));
        }

        $serviceid = AgoraPortal_Util::getFormVar($args, 'service', null, 'POST');
        if ($requestType->addServiceType($serviceid)) {
            LogUtil::registerStatus($this->__('S\'ha assignat el servei al tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en l\'assignació del servei i el tipus de sol·licitud'));
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
        $requesttypeid = AgoraPortal_Util::getFormVar($args, 'requestTypeId');
        $serviceid = AgoraPortal_Util::getFormVar($args, 'serviceId');

        $requestType = RequestType::get_by_id($requesttypeid);
        if (!$requestType) {
            return LogUtil::registerError($this->__('No s\'ha trobat el tipus de sol·licitud'));
        }

        if ($requestType->removeServiceType($serviceid)) {
            LogUtil::registerStatus($this->__('S\'ha desassignat el servei del tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en desassignar el servei del tipus de sol·licitud'));
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
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $typeName = AgoraPortal_Util::getFormVar($args, 'typeName', null, 'POST');

        if ($confirmation == null) {
            return $this->view->fetch('config_clienttype_add.tpl');
        }

        $this->checkCsrfToken();
        if (ClientType::create($typeName)) {
            LogUtil::registerStatus($this->__('S\'ha creat una tipologia de client nova'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en la creació d\'una tipologia de client'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Edit a client type
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The type identity
     * @return:		An array with the available services
     */
    public function editType($args) {
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $typeId = AgoraPortal_Util::getFormVar($args, 'typeId');

        $type = ClientType::get_by_id($typeId);
        if (!$type) {
            return LogUtil::registerError($this->__('No s\'ha trobat la tipologia de client'));
        }

        if ($confirmation == null) {

            return $this->view->assign('type', $type)
                ->fetch('config_clienttype_edit.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $type->typeName = AgoraPortal_Util::getFormVar($args, 'typeName', null, 'POST');
        if ($type->save()) {
            LogUtil::registerStatus($this->__('La tipologia de client s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar el nom de la tipologia'));
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
        $typeId = AgoraPortal_Util::getFormVar($args, 'typeId');

        if (ClientType::delete($typeId)) {
            LogUtil::registerStatus($this->__('S\'ha esborrat la tipologia de client'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar la tipologia de client'));
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
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');

        // Show the form or save the data?
        if ($confirmation == null) {
            return $this->view->fetch('config_servicetemplate_add.tpl');
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        $shortcode = AgoraPortal_Util::getFormVar($args, 'shortcode', null, 'POST');
        $description = AgoraPortal_Util::getFormVar($args, 'description', null, 'POST');
        $url = AgoraPortal_Util::getFormVar($args, 'url', null, 'POST');
        $dbHost = AgoraPortal_Util::getFormVar($args, 'dbHost', null, 'POST');

        if (ServiceTemplate::get_by_shortcode($shortcode)) {
            return LogUtil::registerError($this->__('Ja existeix una plantilla amb el nom curt '.$shortcode));
        }

        // Save the record
        $item = array(
            'shortcode' => $shortcode,
            'description' => $description,
            'url' => $url,
            'dbHost' => $dbHost
        );
        if (ServiceTemplate::create($item)) {
            LogUtil::registerStatus($this->__('S\'ha registrat una plantilla de nodes nova'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en crear una plantilla de nodes nova'));
        }

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Edit a model type
     * @author:		Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:		The model identity
     */
    public function editModelType($args) {
        $confirmation = AgoraPortal_Util::getFormVar($args, 'confirmation', null, 'POST');
        $modelTypeId = AgoraPortal_Util::getFormVar($args, 'modelTypeId');

        $model = ServiceTemplate::get_by_id($modelTypeId);
        if (!$model) {
            return LogUtil::registerError($this->__('No s\'ha trobat la plantilla de nodes'));
        }

        if ($confirmation == null) {
            return $this->view->assign('model', $model)
                ->fetch('config_servicetemplate_edit.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $model->shortcode = AgoraPortal_Util::getFormVar($args, 'shortcode', null, 'POST');
        $model->description = AgoraPortal_Util::getFormVar($args, 'description', null, 'POST');
        $model->url = AgoraPortal_Util::getFormVar($args, 'url', null, 'POST');
        $model->dbHost = AgoraPortal_Util::getFormVar($args, 'dbHost', null, 'POST');
        if ($model->save()) {
            LogUtil::registerStatus($this->__('La plantilla de nodes s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar la plantilla de nodes'));
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
        $modelTypeId = AgoraPortal_Util::getFormVar($args, 'modelTypeId');

        if (!ServiceTemplate::delete($modelTypeId)) {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el registre de la plantilla'));
        } else {
            LogUtil::registerStatus($this->__('S\'ha esborrat el registre de la plantilla'));
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
        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GETPOST');
        $sqlfunc = AgoraPortal_Util::getFormVar($args, 'sqlfunction');
        $sqlfunc = trim($sqlfunc);
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', -1,'GETPOST');
        if ($service_sel < 0) {
            $defaultservice = ServiceType::get_by_name('moodle2');
            $service_sel = $defaultservice->serviceId;
        }

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

        if (isset($action) && ($action == "ask" || $action == "exe")) {
            if ($service_sel > 0) {
                $servicetype = ServiceType::get_by_id($service_sel);
                $clients = array();
                if ($action == "exe") {
                    $clients = Services::get_enabled_by_serviceid_full($servicetype->serviceId);
                    if ($which == 'selected') {
                        $clients = array_intersect_key($clients, array_flip($clients_sel));
                    }
                } else {
                    if ($which == 'selected') {
                        $clients = Clients::get_by_service_params($servicetype->serviceId, array('state' => 1));
                        $clients = array_intersect_key($clients, array_flip($clients_sel));
                    }
                }
            } else {
                // Special portal case
                $portal = Services::get_portal_service();
                $servicetype = $portal->get_servicetype();
                // Dummy array. Required by foreach loop
                $clients = array($portal);
                $which = 'all';
                $view->assign('which', $which);
            }

            $view->assign('servicetype', $servicetype);
            $view->assign('sqlClients', $clients);

            if($action == 'exe') {
                $results = Array();
                $success = Array();
                $messages = Array();
                $messages_recount = Array();
                $one_result_mode = false;
                $columns = false;

                ini_set('mysql.connect_timeout', 1800);
                ini_set('default_socket_timeout', 1800);
                foreach ($clients as $i => $client) {
                    try {
                        $result = $client->executeSQL($sqlfunc);
                    } catch(Exception $e) {
                        $success[$i] = false;
                        $messages[$i] = $this->__('No s\'ha pogut executar la comanda a la base de dades: ') . $e->getMessage();
                        continue;
                    }

                    $success[$i] = true;
                    //PARSE the result
                    if (strpos($sqlfunc_low, "select") !== False || strpos($sqlfunc_low, "show") !== False) {
                        $messages[$i] = count($result);
                        if ($messages[$i] > 0) {
                            $columns = array_keys(reset($result));
                            if ($messages[$i] == 1 && count($columns) == 1) {
                                //One row and one column
                                $one_result_mode = true;
                                $messages[$i] = reset(reset($result));
                            } else {
                                $results[$i] = $result;
                            }
                        }
                    } else {
                        $messages[$i] = "OK";
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

                if ($service_sel == 0) {
                    $view->assign('prefix', $agora['admin']['database']);
                } else {
                    $view->assign('prefix', $agora['server']['userprefix']);
                }

                $view->assign('which', $which);
                $view->assign('columns', $columns);
                $view->assign('results', $results);
                $view->assign('success', $success);
                $view->assign('messages', $messages);
                $view->assign('messages_recount', $messages_recount);

                return $view->fetch('admin_sql_exe.tpl');
            }

            // Else ask to execute SQL
            // Check if the SQL command contain the SQL security code
            if ($this->getVar('sqlSecurityCode') != '') {
                if (strpos($sqlfunc, $this->getVar('sqlSecurityCode'))) {
                    LogUtil::registerError($this->__f('La comanda SQL conté el codi de seguretat "%s". No es recomana seguir amb l\'operació', ModUtil::getVar('Agoraportal', 'sqlSecurityCode')));
                }
            }
            return $view->fetch('admin_sql_confirm.tpl');
        }

        $this->view->assign('services', ServiceTypes::get_with_db(true));

        // Create output object
        $commands = ModUtil::func('Agoraportal', 'admin', 'sqlComandList', array('serviceId' => $service_sel));
        if ($commands) {
            $view->assign('comands', $commands);
        }
        $view->assign('actiononchangeservice', 'sqlComandsUpdate(0);');
        $view->assign('servicesListContent', $this->filter_servicesList($args));
        return $view->fetch('admin_sql.tpl');
    }

    /**
     * Changes the advices block content
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return:     Rendering of the page
     */
    public function advices($args) {
        global $agora;

        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');
        $message = AgoraPortal_Util::getFormVar($args, 'message');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GETPOST');
        $only_admins = AgoraPortal_Util::getFormVar($args, 'only_admins', "0", 'GETPOST');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', 0, 'GETPOST');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GETPOST');

        $servicetype = ServiceType::get_by_name('intranet');
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', $servicetype->serviceId,'GETPOST');

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
            LogUtil::registerError($this->__('Heu d\'emplenar tots els camps'));
            $action = "show";
        }

        if ($date_stop && $date_start && $date_stop < $date_start) {
            LogUtil::registerError($this->__('La data d\'inici no pot ser superior a la data de fi'));
            $action = "show";
        }

        if (isset($action) && $service_sel != $servicetype->serviceId) {
            LogUtil::registerError($this->__('Només està preparat per funcionar amb Intranet'));
            $action = "show";
        }

        if (isset($action) && ($action == "ask" || $action == "exe")) {
            //Common parts on ask and execute

            $clients = Services::get_enabled_by_serviceid_full($servicetype->serviceId);
            if ($which == 'selected') {
                $clients = array_intersect_key($clients, array_flip($clients_sel));
            }

            $view->assign('serviceName', $servicetype->serviceName);
            $view->assign('sqlClients', $clients);

            if ($action == "exe") { //Execute SQL

                $view->assign('prefix', $agora['server']['userprefix']);

                $success = Array();
                $messages = Array();
                $ok = 0;
                $error = 0;
                // Get message from session
                $message = unserialize(SessionUtil::getVar('noticeboardMessage'));

                $startTime = $date_start ? str_replace('-',"", $date_start) : 0;
                $endTime = $date_stop ? str_replace('-',"", $date_stop) : 0;
                if ($only_admins) {
                    $content = Array('startTime' => $startTime,
                        'endTime' => $endTime,
                        'adminNotice' => $message);
                } else {
                    $content = Array('startTime' => $startTime,
                        'endTime' => $endTime,
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

                foreach ($clients as $i => $client) {
                    try {
                        $return = $client->executeSQL($sqlexists, true);
                        if (count($return) > 0) {
                            // Block exists. Check if it's active
                            $blockid = $return[0]['bid'];
                            $return = $client->executeSQL($sqlminorder, true);

                            $minorder = $return[0]['ordre'] - 1;
                            $return = $client->executeSQL($sqlactive, true);

                            if (count($return) > 0) {
                                // The block exists and it's active
                                $client->executeSQL($sqlupdate, true);
                                // Check if block placement exists
                                $sql = "SELECT pid FROM block_placements WHERE bid = '" . $blockid . "'";
                                $return = $client->executeSQL($sql, true);

                                if (count($return) > 0) {
                                    // The block placement exists
                                    $sql = "UPDATE block_placements SET pid = '2', sortorder = '" . $minorder . "' WHERE bid = '" . $blockid . "'";
                                } else{
                                    // The block placement doesn't exist
                                    $sql = "INSERT INTO block_placements SET bid = '" . $blockid . "', pid = '2', sortorder = '" . $minorder . "'";
                                }
                                $client->executeSQL($sql);

                                $messages[$i] = $this->__('El bloc s\'ha actualitzat correctament i s\'ha promocionat a la primera posició de la columna dreta');
                            } else {
                                // The block exists but isn't active. Active it, update it and promote it
                                $client->executeSQL($sqlactivate, true);

                                $sql = "UPDATE block_placements SET pid = '2', sortorder = '" . $minorder . "' WHERE bid = '" . $blockid . "'";
                                $client->executeSQL($sql);

                                $messages[$i] = $this->__('El bloc s\'ha activat i actualitzat correctament i s\'ha promocionat a la primera posició de la columna dreta');
                            }
                        } else {
                            // It doesn't exist. Create it
                            $sql = "SELECT id FROM modules WHERE name = 'IWmain'";
                            $return = $client->executeSQL($sql, true);

                            $mid = $return[0]['id'];
                            $sql = "INSERT INTO blocks (bkey, title, content, url, mid, filter, active, collapsable, defaultstate, refresh, last_update, language)
                                    VALUES('IWnotice', 'Avisos', '" . $content . "', '', '" . $mid . "', 'a:0:{}', '1', '0', '1', '3600', '" . $date . "', '')";
                            $client->executeSQL($sql, true);

                            // Add the block to the right column in first position
                            $return = $client->executeSQL($sqlexists, true);
                            $blockid = $return[0]["bid"];

                            $return = $client->executeSQL($sqlminorder, true);
                            $minorder = $return[0]['ordre'] - 1;

                            $sql = "INSERT INTO block_placements (pid, bid, sortorder) VALUES ('2', '" . $blockid . "', '" . $minorder . "')";
                            $client->executeSQL($sql);

                            $messages[$i] = $this->__('El bloc s\'ha creat correctament');
                        }
                        $ok++;
                        $success[$i] = true;

                    } catch(Exception $e) {
                        $success[$i] = false;
                        $messages[$i] = $this->__('No s\'ha pogut executar la comanda a la base de dades: ') . $e->getMessage();
                        $error++;
                        continue;
                    }
                }

                $view->assign('success', $success);
                $view->assign('messages', $messages);
                $view->assign('ok', $ok);
                $view->assign('error', $error);

                return $view->fetch('admin_advices_exe.tpl');
            }

            // Else ask to execute SQL
            // Save message to session
            SessionUtil::setVar('noticeboardMessage', serialize($message));

            return $view->fetch('admin_advices_confirm.tpl');
        }

        $this->view->assign('services', array($servicetype->serviceId => $servicetype));
        $this->view->assign('service_sel', $service_sel);

        // Create output object
        $args['service_sel'] = $service_sel;
        $view->assign('servicesListContent', $this->filter_servicesList($args));

        return $view->fetch('admin_advices.tpl');
    }

    /**
     * Get the list of services associated with clients
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      The filter and pager values
     * @return:     An array with all the clients and services
     */
    public function filter_servicesList($args) {
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', -1,'GETPOST');
        if ($service_sel < 0) {
            $serviceName = AgoraPortal_Util::getFormVar($args, 'serviceName', -1,'GETPOST');
            if ($serviceName < 0) {
                $serviceName = 'moodle2';
            }
            $service = ServiceType::get_by_name($serviceName);
        } else {
            $service = ServiceType::get_by_id($service_sel);
        }

        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');

        // Sorting and filtering data
        $order = AgoraPortal_Util::getFormVar($args, 'order', 1, 'GETPOST');
        $searchby = AgoraPortal_Util::getFormVar($args, 'search', 0, 'GETPOST');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', '', 'GETPOST');
        $pilot = AgoraPortal_Util::getFormVar($args, 'pilot', 0, 'GETPOST');
        $include = AgoraPortal_Util::getFormVar($args, 'include', 1, 'GETPOST');

        $search = array();

        switch ($order) {
            case 1:
                $search['orderby'] = "clientName, clientDNS";
                break;
            case 2: //Used to order by edit time
                $search['orderby'] = "state asc, timeEdited desc,clientServiceId desc";
                break;
            case 3: //Used to order by activedId
                $search['orderby'] = "activedId";
                break;
            case 4: //Used to order by clientCode
                $search['orderby'] = "clientCode";
                break;
            case 5: //Used to order by clientDNS
                $search['orderby'] = "clientDNS";
                break;
            default:
                $search['orderby'] = $order;
                break;
        }

        $search['searchby'] = array();
        if ($searchby) {
            switch ($searchby) {
                case '1':
                    $searchby = 'clientCode';
                    break;
                case '2':
                    $searchby = 'clientName';
                    break;
                case '3':
                    $searchby = 'clientCity';
                    break;
                case '4':
                    $searchby = 'clientDNS';
                    break;
                case '5':
                    $searchby = 'activedId';
                    break;
            }
            $search['searchby'][$searchby] = $searchText;
        }
        $search['searchby']['state'] = 1;
        if (!empty($pilot)) {
            $search['searchby'][$pilot] = $include;
        }
        $clients = Clients::search_by_service_params($service->serviceId, $search);
        $clientsNumber = count($clients);

        return $this->view->assign('clients', $clients)
                        ->assign('service', $service)
                        ->assign('clients_sel', $clients_sel)
                        ->assign('clientsNumber', $clientsNumber)
                        ->assign('order', $order)
                        ->assign('pilot', $pilot)
                        ->assign('include', $include)
                        ->fetch('agoraportal_admin_service_filter_content.tpl');
    }

    /**
     * Get the list of SQL comands saved in the database
     * @author:     Fèlix Casanellas (felix.casanellas@gmail.com)
     * @param:      None
     * @return:     An array with all comands and their descriptions
     */
    public function sqlComandList($args) {
        $serviceId = AgoraPortal_Util::getFormVar($args, 'serviceId', 2);
        $command_type = AgoraPortal_Util::getFormVar($args, 'comand_type', 0);

        $comands = SQLCommands::getCommands($serviceId,$command_type);

        return $this->view->assign('commands', $comands)
                        ->fetch('admin_sql_commandList.tpl');
    }

    public function stats($args) {
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GETPOST');
        $stats = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'GET');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 1, 'GET');
        $start = AgoraPortal_Util::getFormVar($args, 'date_start', date("Y-m-d"), 'GETPOST');
        $stop = AgoraPortal_Util::getFormVar($args, 'date_stop', date("Y-m-d"), 'GETPOST');

        $serviceid = 0;
        if (isset($service)) {
            $servicetype = ServiceType::get_by_id($service);
            if ($servicetype) {
                $serviceid = $servicetype->serviceId;
            }
        }

        $this->view->assign('services', ServiceTypes::get_all());
        $this->view->assign('service_sel', $serviceid);
        $args['service_sel'] = $serviceid;
        $this->view->assign('servicesListContent', $this->filter_servicesList($args));

        if (strtotime($stop) < strtotime($start)) {
            LogUtil::registerError($this->__('La data de fi és menor que la d\'inici'));
        }

        return $this->view->assign('which', $which)
                        ->assign('service', $serviceid)
                        ->assign('stats_sel', $stats)
                        ->assign('date_start', $start)
                        ->assign('date_stop', $stop)
                        ->assign('searchText', '')
                        ->assign('resultsContent', '')
                        ->assign('actiononchangeservice', 'getServiceStats();')
                        ->fetch('admin_stats.tpl');
    }

    public function statsGetStatisticsContent($args) {
        $stats = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'GET');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 1, 'GET');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GET');
        $start = AgoraPortal_Util::getFormVar($args, 'date_start', date("Y-m-d"), 'GETPOST');
        $stop = AgoraPortal_Util::getFormVar($args, 'date_stop', date("Y-m-d"), 'GETPOST');
        $orderby = AgoraPortal_Util::getFormVar($args, 'orderby', 'clientDNS', 'GET');

        if (strtotime($stop) < strtotime($start)) {
            return $this->view->assign('error', 'La data de fi és menor que la d\'inici')->fetch('admin_stats_table.tpl');
        }

        $clients = "";

        if ($which == 'selected') {
            $clients = AgoraPortal_Util::getFormVar($args, 'clients', '', 'GET');
        }

        $items = Stats::getResults($service, $stats, $start, $stop, $orderby, $clients);
        if ($items === false) {
            return $this->view->assign('error', 'S\'ha produït un error en carregar elements')->fetch('admin_stats_table.tpl');
        }

        if(count($items['results']) <= 0) {
            return $this->view->assign('error', 'No hi ha dades')->fetch('admin_stats_table.tpl');
        }

        $show_access_button = isset($items['results'][0]['d1']) || isset($items['results'][0]['h1']);

        return $this->view->assign('columns', $items['columns'])
                    ->assign('results', $items['results'])
                    ->assign('totals', $items['totals'])
                    ->assign('stats', $stats)
                    ->assign('show_access_button', $show_access_button)
                    ->fetch('admin_stats_table.tpl');
    }


    /**
     * Creates the CSV from the stats demmanded
     * @author:     Pau Ferrer Ocaña (aregi@xtec.cat)
     * @param:      The filter and pager values
     */
    public function statsGetCSVContent($args) {
        $stats = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'POST');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 1, 'POST');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'POST');
        $start = AgoraPortal_Util::getFormVar($args, 'date_start', date("Y-m-d"), 'GETPOST');
        $stop = AgoraPortal_Util::getFormVar($args, 'date_stop', date("Y-m-d"), 'GETPOST');
        $orderby = AgoraPortal_Util::getFormVar($args, 'orderby', 'clientDNS', 'GET');

        if (strtotime($stop) < strtotime($start)) {
            return LogUtil::registerError($this->__('La data de fi és menor que la d\'inici'));
        }

        $clients = "";
        if ($which == 'selected') {
            $clients = AgoraPortal_Util::getFormVar($args, 'clients', '', 'GET');
        }

        $items = Stats::getResults($service, $stats, $start, $stop, $orderby, $clients);
        if ($items === false) {
            return LogUtil::registerError($this->__('S\'ha produït un error en carregar elements'));
        }

        $fp = fopen('php://temp', 'r+');
        fputcsv($fp, $items['columns']);
        foreach ($items['results'] as $row) {
            fputcsv($fp, $row);
        }
        fputcsv($fp, $items['totals']);

        $fstats = fstat($fp);
        $fsize = $fstats['size'];

        rewind($fp);
        $csv = "";
        while ($csvrow= fgets($fp)) {
            $csv .= $csvrow;
        }

        fclose($fp);

        $servicetype = ServiceType::get_by_id($service);
        $filename = 'stats_'.$servicetype->serviceName.'_'.$stats.'_'.str_replace('-',"",$start).'-'.str_replace('-',"",$stop);
        header("Content-type: text/csv"); // add here more headers for diff. extensions
        header('Content-Disposition: attachment; filename="'.$filename.'.csv"'); // use 'attachment' to force a download
        header("Content-length: $fsize");
        header("Cache-control: private"); //use this to open files directly
        echo $csv;
        exit;
    }

    public function statsGetGraphsContent($args) {
        $stat = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'GET');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 1, 'GET');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GET');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', 0, 'GET');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GET');
        $column = AgoraPortal_Util::getFormVar($args, 'column', false, 'GET');
        $show_totals = AgoraPortal_Util::getFormVar($args, 'totals', false, 'GET');
        $clients = AgoraPortal_Util::getFormVar($args, 'clients', '', 'GET');

        $servicetype = ServiceType::get_by_id($service);
        $columns = Stats::getGraphColumns($service, $stat, $column, $show_totals);
        if(!$columns) {
            return $this->view->assign('error', 'No hi ha columnes per mostrar')->fetch('admin_stats_graph.tpl');
        }

        $items = Stats::getStats($service, $stat, $date_start, $date_stop, 'clientDNS', $clients, $columns, $show_totals);
        if (!$items) {
            return $this->view->assign('error', 'S\'ha produït un error en carregar elements')->fetch('admin_stats_graph.tpl');
        }

        if (count($items) <= 1) {
            return $this->view->assign('error', 'Les dades que has escollit no contenen prou valors per mostrar un gràfic');
        }

        $results = array();
        $labels = array();
        if ($show_totals) {
            if ($column) {
                $values = array();
                foreach ($items as $row) {
                    $values[$row['clientDNS']] = $row[$column];
                    $labels[$row['clientDNS']] = $row['clientDNS'];
                }
                $results[$column] = $values;
            } else {
                foreach ($items as $row) {
                    $clientDNS = $row['clientDNS'];
                    $values = array();
                    foreach ($row as $key => $value) {
                        if (($key[0] == 'd' || $key[0] == 'h') && strlen($key) <= 3) {
                            if($key[0] == 'd') {
                                $data = 'dia '.str_replace('d',"", $key);
                            } else {
                                $data = str_replace('h',"", $key).'h';
                            }
                            $values[$data] = $value;
                            $labels[$data] = $data;
                        }
                    }
                    $results[$clientDNS] = $values;
                }
            }
        } else {
            if ($column) {
                foreach ($items as $row) {
                    $clientDNS = $row['clientDNS'];
                    $date = $row['date'];
                    if (strlen($date) <= 6) {
                        $date = date("m/Y", strtotime($date . '01'));
                    } else {
                        $date = date("d/m/Y", strtotime($date));
                    }
                    if (!isset($results[$clientDNS])) {
                        $results[$clientDNS] = array();
                    }
                    $results[$clientDNS][$date] = $row[$column];
                    $labels[$date] = $date;
                }
            } else {
                $values = array();
                foreach ($items as $row) {
                    $clientDNS = $row['clientDNS'];
                    $date = $row['date'];
                    if (strlen($date) <= 6) {
                        $date = date("m/Y", strtotime($date . '01'));
                    } else {
                        $date = date("d/m/Y", strtotime($date));
                    }

                    foreach ($row as $key => $value) {
                        if (($key[0] == 'd' || $key[0] == 'h') && strlen($key) <= 3) {
                            if($key[0] == 'd') {
                                $data = str_replace('d',"", $key).'/'.$date;
                            } else {
                                $data = $date. ' '. str_replace('h',"", $key).'h';
                            }
                            $values[$data] = $value;
                            $labels[$data] = $data;
                        }
                    }
                }
                $results[$clientDNS] = $values;
            }
        }

        $charttype = 'line';
        if ($show_totals && $column) {
            $charttype = 'bar';
        }

        $title = "";
        switch($stat) {
            case 'month':
                $title = 'Mensuals ';
                break;
            case 'week':
                $title = 'Setmanals ';
                break;
            case 'day':
                $title = 'Diàries ';
                break;
        }
        $title .= $servicetype->serviceName;
        $subtitle = "";
        if ($show_totals) {
            $subtitle .= 'Totals ';
        } else {
            $subtitle .= $clients.' ';
        }
        $subtitle .= $column? $column : "Accessos repartits";
        $title .= " ($subtitle)";

        $chartdata = new StdClass();
        $chartdata->labels = array_keys($labels);
        $chartdata->datasets = array();
        foreach($results as $label => $result) {
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);
            $dataset = new StdClass();
            $dataset->label = $label;
            $dataset->fillColor = "rgba($red,$green,$blue,0.2)";
            $dataset->strokeColor = "rgba($red,$green,$blue,1)";
            $dataset->pointColor = "rgba($red,$green,$blue,1)";
            $dataset->pointStrokeColor = "#fff";
            $dataset->pointHighlightFill = "#fff";
            $dataset->pointHighlightStroke = "rgba(220,220,220,1)";
            $dataset->data = array_values($result);
            $chartdata->datasets[] = $dataset;
        }

        return $this->view->assign('graph_title', $title)
                    ->assign('charttype', $charttype)
                    ->assign('chartdata', $chartdata)
            ->fetch('admin_stats_graph.tpl');
    }

    public function updateDiskUse($args) {
       // Security check
        if (!AgoraPortal_Util::isAdmin() && !defined('CLI_SCRIPT')) {
            LogUtil::registerError($this->__('No teniu accés a executar aquesta funcionalitat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        }

        $debug = AgoraPortal_Util::getFormVar($args, 'debug', isset($args['debug']) ? true : false, 'GET');

        // Load general config
        global $agora;

        // General vars
        $errorMsg = "";
        $adminReport = "";

        // Build warning message
        $warningMsgTpl = "<p>Benvolgut/da,</p><p>Aquest missatge és per informar-vos de què ###warningMsgForUser###";
        $warningMsgTpl .= " En cas de superar el límit d'espai consumit, els usuaris no hi podran pujar fitxers.";
        $warningMsgTpl .= " Actualment heu consumit el ###diskConsumeValue###% de la quota.</p>";
        $warningMsgTpl .= "<p>Els gestors dels serveis Àgora del centre poden sol·licitar l'ampliació de la quota del servei des de la secció <strong>altres sol·licituds</strong> de l'<a href=\"" . $agora['server']['server'] . $agora['server']['base'] . "portal\">aplicació de gestió dels serveis d'Àgora</a>.</p>";
        $warningMsgTpl .= "<p>Atentament,</p>";
        $warningMsgTpl .= "<p>---<br />L'equip del projecte Àgora</p>";
        $warningMsgTpl .= "<p>P.D.: Aquest missatge s'envia automàticament. Si us plau, no el respongueu.</p>";

        // Get available services (currently: intranet, marsupial, moodle)
        $servicetypes = ServiceTypes::get_all();

        // Build array with info of the services to check and the path to its file
        foreach ($servicetypes as $servicetype) {
            // Marsupial has defaultDiskSpace = 0
            if ($servicetype->defaultDiskSpace > 0) {
                $agoravars = $agora[$servicetype->serviceName];
                $path = $agora['server']['root'] . $agoravars['datadir'] . $agoravars['diskusagefile'];

                if (!file_exists($path)) {
                    $errorMsg .= $servicetype->serviceName. ': No s\'ha trobat el fitxer de consums de disc següent: ' . $path . '<br />';
                    continue;
                }

                $userprefix = $agoravars['userprefix'];

                $services = Services::get_enabled_by_serviceid($servicetype->serviceId, 'activedId');

                // Parse the file and update the information
                $lines = file($path);
                foreach ($lines as $line_num => $line) {
                    if (!preg_match('/^\d+\s+' . $userprefix . '[1-9]\d*$/', $line)) {
                        continue;
                    }

                    // get usage value
                    $usageArray = preg_split('/\s+' . $userprefix . '/', $line);
                    $activedId = trim($usageArray[1]);

                    $service = $services[$activedId];
                    if (!$service) {
                        $errorMsg .= $servicetype->serviceName. ': No s\'ha trobat el servei ' . $userprefix . $activedId . '<br />';
                        continue;
                    }
                    $client = $service->get_client();

                    $service->diskConsume = trim($usageArray[0]);

                    if (!$service->save()) {
                        $errorMsg .= $servicetype->serviceName. ': Error en l\'actualització de l\'espai consumit a la base de dades per: ' . $client->clientCode . '<br />';
                    }

                    $warning = $service->is_quota_warning();
                    if ($warning) {
                        $percentatge = $service->get_disk_percentage();
                        // Send warning message to client managers
                        $warningMsgForUser = ($percentatge > 100) ? " heu superat el límit d'espai de disc disponible per al servei '" . $servicetype->serviceName . "' d'Àgora." : " esteu a prop de superar el límit d'espai de disc disponible per al servei '" . $servicetype->serviceName . "' d'Àgora.";
                        $warningMsg = str_replace('###warningMsgForUser###', $warningMsgForUser, $warningMsgTpl);
                        $warningMsg = str_replace('###diskConsumeValue###', $service->diskConsume, $warningMsg);

                        // Send the e-mail
                        $subject = $this->__('Ocupació de disc dels serveis a Àgora');
                        $sendMail = $client->send_mail($subject, $warningMsg, true, true, false);
                        if (!$sendMail) {
                            $errorMsg .= $servicetype->serviceName. ': No s\'ha enviat l\'avís a cap usuari/ària del centre amb codi ' . $client->clientCode . '<br />';
                        }

                        // Save error message for admin report
                        $url = $service->get_url();
                        $textColor = ($percentatge > 100) ? 'red' : 'orange';
                        $consume = round($service->diskConsume/1024);
                        $adminReport .= '<h4>' . $client->clientCode . ' (<a href="'.$url.'" target="_blank">'.$url.'</a>): </h4>';
                        $adminReport .= '<div style="color:' . $textColor . '";>' .$servicetype->serviceName. ' - '. $client->clientCode . ': ' . $percentatge . ' % (' . $consume  . ' / ' . $service->diskSpace . ')</div>';
                        $adminReport .= $warningMsg . '<hr/>';
                    } else if($debug) {
                        // Save error message for admin report
                        $url = $service->get_url();
                        $textColor = 'green';
                        $consume = round($service->diskConsume/1024);
                        $adminReport .= '<h4>' . $client->clientCode . ' (<a href="'.$url.'" target="_blank">'.$url.'</a>): </h4>';
                        $adminReport .= '<div style="color:' . $textColor . '";>' .$servicetype->serviceName. ' - '. $client->clientCode . ': ' . $percentatge . ' % (' . $consume  . ' / ' . $service->diskSpace . ')</div>';
                        $adminReport .= '<hr/>';
                    }
                }
            }
        }

        if ($debug) {
            echo $adminReport;
        }

        // Admin report
        if (!empty($adminReport)) {
            AgoraPortal_Util::send_mail_to_admins($this->__('Resum de missatges sobre quotes als usuaris'), $adminReport);
        }

        // Info Agoraportal admins of the presence of errors
        if (!empty($errorMsg)) {
            echo '<br/><br/>ERRORS:<br/>' . $errorMsg;
            // Send warning message to configured recipients if Mailer is available
            $content = $this->__('<p>S\'han produït errors en la gestió del consum de disc per part dels centres. Missatge de l\'error:</p><p>' . $errorMsg . '</p>');
            AgoraPortal_Util::send_mail_to_admins($this->__('Error en el càlcul de consum de disc'), $content);
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
        $requestId = AgoraPortal_Util::getFormVar($args, 'requestId', null, 'GET');

        $request = Request::get_by_id($requestId);
        $service = Service::get_by_client_and_service($request->clientId, $request->serviceId);
        $client = $service->get_client();
        $servicetype = $service->get_servicetype();

        $requestsstates = Requests::get_states();
        $requesttype = RequestType::get_by_id($request->requestId);

        // Check module Mailer availability
        $mailer = AgoraPortal_Util::isMailerAvalaible();

        return $this->view->assign('mailer', $mailer)
                        ->assign('requestsstates', $requestsstates)
                        ->assign('client', $client)
                        ->assign('request', $request)
                        ->assign('type', $requesttype)
                        ->assign('service', $service)
                        ->assign('servicetype', $servicetype)
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
        $state = AgoraPortal_Util::getFormVar($args, 'state', null, 'POST');
        $adminComments = AgoraPortal_Util::getFormVar($args, 'adminComments', null, 'POST');
        $privateNotes = AgoraPortal_Util::getFormVar($args, 'privateNotes', null, 'POST');
        $requestId = AgoraPortal_Util::getFormVar($args, 'requestId', null, 'POST');
        $clientCode = AgoraPortal_Util::getFormVar($args, 'clientCode', null, 'POST');
        $sendMail = AgoraPortal_Util::getFormVar($args, 'sendMail', null, 'POST');

        // Confirm authorisation code
        $this->checkCsrfToken();

        $request = Request::get_by_id($requestId);
        if (!$request) {
            return LogUtil::registerError($this->__('No s\'ha trobat la petició'));
        }

        $request->requestStateId = $state;
        $request->adminComments = $adminComments;
        $request->privateNotes = $privateNotes;
        $request->timeClosed = time();

        // In case of error
        if (!$request->save()) {
            LogUtil::registerError($this->__('No s\'ha pogut modificar la petició'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList'));
        }

        $resolt = Requests::get_state_title($state);
        $client = Client::get_by_code($clientCode);
        $client->add_log(ClientLog::CODE_MODIFY, $this->__f('S\'ha atès la vostra sol·licitud i ha quedat com a <strong>%s</strong>. Podeu trobar més informació <a href="index.php?module=Agoraportal&type=user&func=requests">aquí</a>', $resolt));

        // Send informational mail if it is necessary
        if ($sendMail) {
            // We need to know service base URL
            global $agora;
            $view = Zikula_View::getInstance('Agoraportal', false);
            $view->assign('baseURL', $agora['server']['server'] . $agora['server']['base']);
            $view->assign('adminComments', nl2br($adminComments));
            $view->assign('stateDesc', $resolt);

            $mailContent = $view->fetch('mail_updateRequest.tpl');

            $client->send_mail(__('Estat de les sol·licituds a Àgora'), $mailContent);
        }

        LogUtil::registerStatus($this->__('El registre s\'ha editat correctament'));

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList'));
    }

    /**
     * Delete a service
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param		The request identity
     * @param       Aida Regi
     * @return		An error message if fails and redirect user to function servicesList
     */
    public function deleteRequest($args) {
        $requestId = AgoraPortal_Util::getFormVar($args, 'requestId');

        $request = Request::get_by_id($requestId);
        if (!$request) {
            LogUtil::registerError($this->__('No s\'ha trobat la sol·licitud'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList'));
        }

        if (!Request::delete($requestId)) {
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
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1);
        $service = AgoraPortal_Util::getFormVar($args, 'service', 0);
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', -1);
        $search = AgoraPortal_Util::getFormVar($args, 'search', 0);
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', "");
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15);
        $order = AgoraPortal_Util::getFormVar($args, 'order', 2);

        if (SessionUtil::getVar('requestsList')) {
            $args = unserialize(SessionUtil::getVar('requestsList'));
            $init = $args['init'];
            $service = $args['service'];
            $stateFilter = $args['stateFilter'];
            $search = $args['search'];
            $searchText = $args['searchText'];
            $rpp = $args['rpp'];
        }

        $servicesListContent = ModUtil::func('Agoraportal', 'admin', 'requestsListContent', $args);
        $requestsstates = Requests::get_states();

        return $this->view->assign('requestListContent', $servicesListContent)
                        ->assign('requestsstates', $requestsstates)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('service', $service)
                        ->assign('stateFilter', $stateFilter)
                        ->assign('rpp', $rpp)
                        ->assign('order', $order)
                        ->fetch('agoraportal_admin_requestsList.tpl');
    }

    /**
     * Get the list of requests
     * @author:		Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The filter and pager values
     * @return:		An array with all the clients and services
     */
    public function requestsListContent($args) {
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1);
        $service = AgoraPortal_Util::getFormVar($args, 'service', 0);
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', -1);
        $search = AgoraPortal_Util::getFormVar($args, 'search', 0);
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', "");
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15);
        $order = AgoraPortal_Util::getFormVar($args, 'order', 2);

        // Escape special chars
        $searchText = addslashes($searchText);

        $searchargs = array('service' => $service, 'state' => $stateFilter);
        if (!empty($search) && !empty($searchText)) {
            $searchargs[$search] = $searchText;
        }
        $requests = Requests::search_by($searchargs, $init, $rpp);
        $requestsNumber = Requests::count_by($searchargs);

        $pager = ModUtil::func('Agoraportal', 'user', 'pager', array('init' => $init,
                    'rpp' => $rpp,
                    'total' => $requestsNumber,
                    'javascript' => true,
                    'itemsname' => 'sol·licituds',
                    'urltemplate' => "requestsList('$service','$stateFilter','$search','$searchText','$order',%%,'$rpp')"));

        return $this->view->assign('requests', $requests)
                        ->assign('pager', $pager)
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
    public function listDataDirs($args) {
        // Security check
        if (!AgoraPortal_Util::isAdmin() && !defined('CLI_SCRIPT')) {
            LogUtil::registerError($this->__('No teniu accés a executar aquesta funcionalitat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        }

        $serviceName = AgoraPortal_Util::getFormVar($args, 'serviceName');
        $activedId = AgoraPortal_Util::getFormVar($args, 'activedId');
        $service = Service::get_by_servicename_and_activeid($serviceName, $activedId);
        if (!$service) {
            LogUtil::registerError($this->__('El servei no existeix'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'servicesList'));
        }

        return $service->printDataDirs();
    }

    /**
     * Display a form that allows you to execute commands
     * @author  Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return  Rendering of the page
     */
    public function operations($args) {
        global $agora;
        $clients_sel = AgoraPortal_Util::getFormVar($args, 'clients_sel');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GETPOST');
        $order = AgoraPortal_Util::getFormVar($args, 'order', 1, 'GETPOST');
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', -1,'GETPOST');
        if ($service_sel < 0) {
            $defaultservice = ServiceType::get_by_name('moodle2');
            $service_sel = $defaultservice->serviceId;
        }
        $actionselect = AgoraPortal_Util::getFormVar($args, 'actionselect', false, 'GETPOST');
        $priority = AgoraPortal_Util::getFormVar($args, 'priority', false, 'GETPOST');

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('which', $which);
        $view->assign('service_sel', $service_sel);
        $view->assign('order', $order);
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
        } else if (isset($action) && $service_sel == 0) {
            LogUtil::registerError($this->__('No està preparat pel portal'));
            $action = "show";
        }

        if (isset($action) && $action != "show") {
            $view->assign('priority', $priority);

            // Common parts on ask and execute
            $servicetype = ServiceType::get_by_id($service_sel);
            $serviceName = $servicetype->serviceName;

            $clients = array();
            if ($action == "exe") {
                $clients = Services::get_enabled_by_serviceid_full($servicetype->serviceId);
                if ($which == 'selected') {
                    $clients = array_intersect_key($clients, array_flip($clients_sel));
                }
            } else {
                if ($which == 'selected') {
                    $clients = Clients::get_by_service_params($servicetype->serviceId, array('state' => 1));
                    $clients = array_intersect_key($clients, array_flip($clients_sel));
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
            $view->assign('clients', $clients);

            if ($action == "confirm") { //Execute Operation
                $success = Array();
                foreach ($clients as $i => $client) {
                    //Connected
                    $operation = $client->addOperation($actionselect, $params, $priority);
                    $success[$i] = $operation ? true : false;
                }
                $view->assign('which', $which);
                $view->assign('success', $success);
                $view->assign('prefix', $agora['server']['userprefix']);
                return $view->fetch('admin_operations_exe.tpl');
            }

            return $view->fetch('admin_operations_confirm.tpl');
        }

        $this->view->assign('services', ServiceTypes::get_with_db());
        $view->assign('actiononchangeservice', 'getServiceActions();');
        $view->assign('servicesListContent', $this->filter_servicesList($args));

        $priority_values = array();
        $i = -10;
        while ($i <= 10) {
            $priority_values["$i"] = $i;
            $i++;
        }
        $view->assign('priority_values', $priority_values);

        return $view->fetch('admin_operations.tpl');
    }

    /**
     * Display the queue management table
     * @author  Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return  Rendering of the page
     */
    public function queues($args) {
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

        $operations = Agora_Queues::get_operations($search);
        foreach($operations as $k => $op) {
            $operations[$k]['params'] = Agora_Queues_Operation::parse_params_html($op['params']);
        }
        $view->assign('rows', $operations);

        $exec_operations = Agora_Queues::get_operations_by_state(Agora_Queues_Operation::LOADING);
        foreach($exec_operations as $k => $op) {
            $exec_operations[$k]['params'] = Agora_Queues_Operation::parse_params_html($op['params']);
        }
        $view->assign('exec_rows', $exec_operations);

        $operations_number = Agora_Queues::get_operations($search, true);
        $view->assign('rowsNumber', $operations_number);

        $view->assign('pager', array('numitems' => $operations_number, 'itemsperpage' => $rpp));
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

        $services = ServiceTypes::get_with_db();
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
        $schoolCodes = AgoraPortal_Util::getFormVar($args, 'schoolCodes', null, 'POST');
        $service = AgoraPortal_Util::getFormVar($args, 'service_sel', 0, 'POST');
        $serviceDB = AgoraPortal_Util::getFormVar($args, 'serviceDB', null, 'POST');
        $template = AgoraPortal_Util::getFormVar($args, 'template', null, 'POST');
        $createClient = AgoraPortal_Util::getFormVar($args, 'createClient', null, 'POST');

        $services = ServiceTypes::get_with_db();
        $templates = ServiceTemplates::get_all();

        return $this->view->assign('schoolCodes', $schoolCodes)
                        ->assign('service', $service)
                        ->assign('services', $services)
                        ->assign('serviceDB', $serviceDB)
                        ->assign('template', $template)
                        ->assign('createClient', $createClient)
                        ->assign('templates', $templates)
                        ->fetch('agoraportal_admin_createBatch.tpl');
    }

    /**
     * Creates services in batch mode
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      The list of services to create
     * @return:     The edit form
     */
    public function createBatch_exec($args) {
        global $agora;

        $schoolCodes = AgoraPortal_Util::getFormVar($args, 'schoolCodes', null, 'POST');
        $service_sel = AgoraPortal_Util::getFormVar($args, 'service_sel', 0, 'POST');
        $serviceDB = AgoraPortal_Util::getFormVar($args, 'serviceDB', null, 'POST');
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

        $servicetype = ServiceType::get_by_id($service_sel);
        if (!$servicetype) {
            LogUtil::registerError('No s\'ha de troabat el servei '.$service_sel);
            return $this->createBatch($args);
        }

        $serviceId = $servicetype->serviceId;
        $serviceName = $servicetype->serviceName;

        if ($serviceName == 'nodes' && empty($template)) {
            LogUtil::registerError('S\'ha de seleccionar una plantilla en el cas de nodes');
            return $this->createBatch($args);
        }

        // Autofill serviceDB var with default value. This is a guess. serviceDB should come from web form.
        if ((is_null($serviceDB) || empty($serviceDB)) && (($serviceName == 'intranet') || ($serviceName == 'nodes'))) {
            $serviceDB = $agora['intranet']['host'];
        }

        $clientCodes = explode(',', $schoolCodes);
        $results = array();
        $success = array();
        $error = 0;
        foreach ($clientCodes as $code) {
            // Check code validity
            $clientCode = AgoraPortal_Util::checkCode($code);
            if (!$clientCode) {
                $results[$code] = "El codi <strong>$code</strong> no és vàlid.";
                $error++;
                continue;
            }

            // Pas 1: Obtenir les dades del client (taula clients)
            $client = Client::get_by_code($clientCode);
            if (!$client && $createClient) {
                $clientName = 'form'.substr($clientCode, -3);

                $client_exists = Client::get_by_dns($clientName);
                if ($client_exists) {
                    $results[$clientCode] = "El centre amb DNS <strong>$clientName</strong> ja existeix, no es pot crear el client";
                    $error++;
                    continue;
                }

                $client = Client::create(array(
                    'clientCode' => $clientCode,
                    'clientName' => $clientName,
                    'clientDNS' => $clientName,
                    'clientAddress' => "",
                    'clientCity' => "",
                    'clientPC' => "",
                    'clientState' => 1,
                    'clientDescription' => 'Alta automàtica'), false);
                if (!$client) {
                    $results[$clientCode] = "El centre amb codi <strong>$clientCode</strong> no està donat d'alta. I la seva creació ha fallat.";
                    $error++;
                    continue;
                }
            }

            if (!$client) {
                $results[$clientCode] = "El centre amb codi <strong>$clientCode</strong> no està donat d'alta. Per tant, no es crea el seu servei.";
                $error++;
                continue;
            }

            // Pas 2: Comprovar que el centre encara no té el servei
            $ClientService = $client->get_service_by_id($serviceId);
            if ($ClientService) {
                $results[$clientCode] = "El centre <strong>$client->clientName</strong> ja disposa del servei $serviceName. Per tant, no es crearà.";
                $error++;
                continue;
            }

            // Pas 3: Crear el Servei
            if (!$client->request_service($serviceId, 'Alta automàtica', $template)) {
                echo "No s'ha pogut crear el servei $serviceName per al centre <strong>$client->clientDNS</strong>";
                $error++;
                continue;
            }

            if ($serviceName == 'nodes') {
                $client->set_extraFunc($template);
            }

            $clientService = $client->get_service_by_id($serviceId);
            $clientService->serviceDB = $serviceDB;
            $clientService->observations = 'Alta automàtica';
            $clientService->diskSpace = $servicetype->defaultDiskSpace;
            $clientService->save();

            // Pas 4: Activar el Servei
            $password = $clientService->changeState(Service::STATUS_ENABLED);
            if (!$password) {
                // If it fails, delete the recently created agoraportal_client_services
                Service::delete($clientService->clientServiceId);
                $results[$clientCode] = "No s'ha pogut activar el servei";
                $error++;
                continue;
            }
            $clientService->save();

            $results[$clientCode] = "S'ha creat el servei per al centre <strong>$clientCode</strong> i password <strong>$password</strong>";
            $success[$clientCode] = true;
        }

        return $this->view->assign('schoolCodes', $schoolCodes)
                        ->assign('servicetype', $servicetype)
                        ->assign('results', $results)
                        ->assign('success', $success)
                        ->assign('error', $error)
                        ->assign('serviceDB', $serviceDB)
                        ->assign('template', $template)
                        ->assign('createClient', $createClient)
                        ->fetch('agoraportal_admin_createBatch_exec.tpl');
    }
}
