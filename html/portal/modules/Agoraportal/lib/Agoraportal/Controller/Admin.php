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
     * Set default function
     *
     * @author: Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	Redirect user to function listServices
     */
    public function main() {
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
    }

    /**
     * Display the edit form for a service
     * @param:		The client-service identity and the filter values
     * @return:		The edit form
     */
    public function editService() {
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', null, 'GET');

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
     * @param:		The main client and service parameters
     * @return:		An error message if fails and redirect user to function listServices
     */
    public function updateService() {

        $this->checkCsrfToken(); // Confirm authorisation code

        $clientServiceId = FormUtil::getPassedValue('clientServiceId', null, 'POST');
        $extraFunc = FormUtil::getPassedValue('extraFunc', null, 'POST');
        $dbHost = FormUtil::getPassedValue('dbHost', null, 'POST');
        $serviceDB = FormUtil::getPassedValue('serviceDB', null, 'POST');
        $observations = FormUtil::getPassedValue('observations', null, 'POST');
        $annotations = FormUtil::getPassedValue('annotations', null, 'POST');
        $diskSpace = FormUtil::getPassedValue('diskSpace', 0, 'POST');
        $state = FormUtil::getPassedValue('state', null, 'POST');
        $sendMail = FormUtil::getPassedValue('sendMail', false, 'POST');

        global $agora;

        $clientService = Service::get_by_id($clientServiceId);
        if (!$clientService) {
            LogUtil::registerError($this->__('No s\'ha trobat el servei'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
        }

        $client = $clientService->get_client();

        // Get the definition of the services
        $service = $clientService->get_servicetype();
        $serviceName = $service->serviceName;
        if ($serviceName == 'nodes') {
            $client->extraFunc = $extraFunc;
            $success = $client->save();
            if (!$success) {
                LogUtil::registerError($this->__('S\'ha produït un error en l\'edició del client'));
                return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
            }
        }

        $clientService->serviceDB = $serviceDB;
        $clientService->observations = $observations;
        $clientService->annotations = $annotations;
        $clientService->diskSpace = $diskSpace;

        // If dbHost is not set, autofill it with a default value. This is a guess. dbHost should come from web form.
        if ((is_null($dbHost) || empty($dbHost)) && (($serviceName == 'intranet') || ($serviceName == 'nodes'))) {
            $clientService->dbHost = $agora['intranet']['host'];
        } else {
            $clientService->dbHost = $dbHost;
        }

        // Create a var for admin password where to keep it in order to send it by e-mail
        $password = '';

        $result = $clientService->changeState($state);
        if (!$result) {
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
        } else if ($result !== true) {
            $password = $result;
        }
        $clientService->save();

        // Send information mail if it is necessary
        if($sendMail && ($state < -1 || $state == 1)) {
            // We need to know service base URL
            $mailContent = $this->view
                ->assign('baseURL', $agora['server']['server'] . $agora['server']['base'])
                ->assign('password', $password)
                ->assign('client', $client)
                ->assign('service', $clientService)
                ->assign('servicetype', $service)
                ->fetch('agoraportal_admin_mail_updateService.tpl');
            $client->send_mail( __('Estat dels serveis del centre a Àgora'), $mailContent);
        }

        LogUtil::registerStatus($this->__('El client i el servei s\'han modificat correctament'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
    }

    /**
     * Delete a service
     * @param:		The client-service identity
     * @return:		An error message if fails and redirect user to function listServices
     */
    public function deleteService() {
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', null, 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', false, 'POST');

        $service = Service::get_by_id($clientServiceId);
        if (!$service) {
            LogUtil::registerError($this->__('No s\'ha trobat el servei'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
        }

        $servicetype = $service->get_servicetype();

        $client = $service->get_client();
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
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

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
    }

    /**
     * Display the list of services associated with clients
     * @param:		The filter and pager values
     * @return:		The services list page
     */
    public function listServices($args) {
        if (SessionUtil::getVar('serviceList')) {
            $args = unserialize(SessionUtil::getVar('serviceList'));
            $service = $args['service'];
            $stateFilter = $args['stateFilter'];
            $search = $args['search'];
            $searchText = $args['searchText'];
            $order = $args['order'];
            $rpp = $args['rpp'];
        } else {
            $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'GETPOST');
            $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : 0, 'GETPOST');
            $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : 0, 'GETPOST');
            $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'GETPOST');
            $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');
            $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : 2, 'GETPOST');
        }

        $args = array (
            'rpp' => $rpp,
            'service' => $service,
            'stateFilter' => $stateFilter,
            'search' => $search,
            'searchText' => $searchText,
            'order' => $order
        );

        if (SessionUtil::getVar('execOper')) {
            $execOper = SessionUtil::getVar('execOper');
            SessionUtil::delVar('execOper');
        } else {
            $execOper = false;
        }

        $listServicesContent = ModUtil::func('Agoraportal', 'admin', 'listServicesContent', $args);

        return $this->view->assign('listServicesContent', $listServicesContent)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('service', $service)
                        ->assign('stateFilter', $stateFilter)
                        ->assign('rpp', $rpp)
                        ->assign('order', $order)
                        ->assign('execOper', $execOper)
                        ->fetch('agoraportal_admin_listServices.tpl');
    }

    /**
     * Get the list of services associated with clients
     * @param:		The filter and pager values
     * @return:		An array with all the clients and services
     */
    public function listServicesContent($args) {
        $init = FormUtil::getPassedValue('init', -1, 'GETPOST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'GETPOST');
        $serviceId = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : 0, 'GETPOST');
        $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : 0, 'GETPOST');
        $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');
        $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : 1, 'GETPOST');

        // Escape special chars
        $searchText = addslashes($searchText);
        $servicetypes = ServiceTypes::get_all();

        $searchargs = array('state' => $stateFilter, 'serviceId' => $serviceId);
        if (!empty($search) && !empty($searchText)) {
            $searchargs[$search] = $searchText;
        }

        $services = Services::search($searchargs, $order, $init, $rpp);
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
            array(
                'init' => $init,
                'rpp' => $rpp,
                'total' => $clientsNumber,
                'itemsname' => 'serveis',
                'javascript' => true,
                'urltemplate' => "listServices('$serviceId','$stateFilter','$search','$searchText','$order',%%,'$rpp');"
            )
        );

        return $this->view->assign('services', $services)
                        ->assign('disks', $disks)
                        ->assign('servicetypes', $servicetypes)
                        ->assign('pager', $pager)
                        ->fetch('agoraportal_admin_listServicesContent.tpl');
    }

    /**
     * Get the list of actions associated with services
     * @author:     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:      Service
     * @return:     Json of actions
     */
    public function getServiceActions() {
        $serviceid = FormUtil::getPassedValue('service', 0, 'GET');

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
     * Display the form to create a new client
     * @param:		The main client parameters
     * @return:		Render the form
     */
    public function newClient() {
        $clientCode = FormUtil::getPassedValue('clientCode', '', 'GETPOST');
        $clientName = FormUtil::getPassedValue('clientName', '', 'GETPOST');
        $clientDNS = FormUtil::getPassedValue('clientDNS', '', 'GETPOST');
        $clientAddress = FormUtil::getPassedValue('clientAddress', '', 'GETPOST');
        $clientCity = FormUtil::getPassedValue('clientCity', '', 'GETPOST');
        $clientPC = FormUtil::getPassedValue('clientPC', '', 'GETPOST');
        $clientDescription = FormUtil::getPassedValue('clientDescription', '', 'GETPOST');
        $clientState = FormUtil::getPassedValue('clientState', 0, 'GETPOST');

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
        return $view->fetch('agoraportal_admin_client_new.tpl');
    }

    /**
     * Create a new client using the values received from the form
     * @param:		The main client parameters
     * @return:		An error message if fails and redirect user to clients' list
     */
    public function createClient() {
        $clientCode = FormUtil::getPassedValue('clientCode', '', 'POST');
        $clientName = FormUtil::getPassedValue('clientName', '', 'POST');
        $clientDNS = FormUtil::getPassedValue('clientDNS', '', 'POST');
        $clientOldDNS = FormUtil::getPassedValue('clientOldDNS', '', 'POST');
        $clientAddress = FormUtil::getPassedValue('clientAddress', '', 'POST');
        $clientCity = FormUtil::getPassedValue('clientCity', '', 'POST');
        $clientPC = FormUtil::getPassedValue('clientPC', '', 'POST');
        $clientDescription = FormUtil::getPassedValue('clientDescription', '', 'POST');
        $clientState = FormUtil::getPassedValue('clientState', 0, 'POST');

        // Security check
        if (!AgoraPortal_Util::isAdmin()) {
            return LogUtil::registerPermissionError();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        // check if all the values are correct
        if ($clientCode == '' || $clientName == '' || $clientDNS == '' || $clientAddress == '' || $clientCity == '' || $clientPC == '') {
            LogUtil::registerError($this->__('Hi ha valors del formulari que no has completat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'newClient', array(
                'clientCode' => $clientCode,
                'clientName' => $clientName,
                'clientDNS' => $clientDNS,
                'clientOldDNS' => $clientOldDNS,
                'clientAddress' => $clientAddress,
                'clientCity' => $clientCity,
                'clientPC' => $clientPC,
                'clientState' => $clientState,
                'clientDescription' => $clientDescription
            )));
        }

        // The client code must be a site user
        $uid = UserUtil::getIdFromName($clientCode);
        if (!$uid) {
            LogUtil::registerError($this->__('El codi del client ha de coincidir amb el nom d\'usuari/ària d\'un usuari/ària del portal'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'newClient', array(
                'clientCode' => $clientCode,
                'clientName' => $clientName,
                'clientDNS' => $clientDNS,
                'clientOldDNS' => $clientOldDNS,
                'clientAddress' => $clientAddress,
                'clientCity' => $clientCity,
                'clientPC' => $clientPC,
                'clientState' => $clientState,
                'clientDescription' => $clientDescription
            )));
        }

        // Create client in database
        $client = Client::create(array(
            'clientCode' => $clientCode,
            'clientName' => $clientName,
            'clientDNS' => $clientDNS,
            'clientOldDNS' => $clientOldDNS,
            'clientAddress' => $clientAddress,
            'clientCity' => $clientCity,
            'clientPC' => $clientPC,
            'clientState' => $clientState,
            'clientDescription' => $clientDescription
        ));

        if (!$client) {
            LogUtil::registerError($this->__('La creació del client ha fallat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }
        // success
        LogUtil::registerStatus($this->__('El client s\'ha creat correctament'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
    }

    /**
     * Display the edit form for a client
     * @param:		The main client parameters
     * @return:		The edit form
     */
    public function editClient() {
        $clientId = FormUtil::getPassedValue('clientId', null, 'GET');
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
            ->fetch('agoraportal_admin_client_edit.tpl');
    }

    /**
     * Process the values received from the client edit form
     * @author:		Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param:		The main client parameters
     * @return:		An error message if fails and redirect user to function listServices
     */
    public function updateClient() {
        $this->checkCsrfToken();

        $clientId = FormUtil::getPassedValue('clientId', null, 'POST');
        $client = Client::get_by_id($clientId);

        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
        }

        $client->clientName = FormUtil::getPassedValue('clientName', '', 'POST');
        $client->URLType = FormUtil::getPassedValue('URLType', '', 'POST');
        $client->URLHost = FormUtil::getPassedValue('URLHost', '', 'POST');
        $client->OldURLHost = FormUtil::getPassedValue('OldURLHost', '', 'POST');
        $client->clientDescription = FormUtil::getPassedValue('clientDescription', '', 'POST');
        $client->clientDNS = FormUtil::getPassedValue('clientDNS', '', 'POST');
        $client->clientOldDNS = FormUtil::getPassedValue('clientOldDNS', '', 'POST');
        $client->clientAddress = FormUtil::getPassedValue('clientAddress', '', 'POST');
        $client->clientCity = FormUtil::getPassedValue('clientCity', '', 'POST');
        $client->clientPC = FormUtil::getPassedValue('clientPC', '', 'POST');
        $client->locationId = FormUtil::getPassedValue('locationId', '', 'POST');
        $client->typeId = FormUtil::getPassedValue('typeId', 0, 'POST');
        $client->noVisible = FormUtil::getPassedValue('noVisible', 0, 'POST');
        $client->extraFunc = FormUtil::getPassedValue('extraFunc', '', 'POST');
        $client->educat = FormUtil::getPassedValue('educat', 0, 'POST');
        $client->clientState = FormUtil::getPassedValue('clientState', '', 'POST');

        $success = $client->save();

        if (!$success) {
            LogUtil::registerError($this->__('S\'ha produït un error en l\'edició del client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }

        // Check if only editing client information (table agoraportal_clients), in that case, we're done
        LogUtil::registerStatus($this->__('S\'ha editat el client correctament'));
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
    }

    /**
     * Delete a client and all the services associated with the client
     * @param:		The client identity
     * @return:		An error message if fails and redirect user to function clientsList
     */
    public function deleteClient() {
        $clientId = FormUtil::getPassedValue('clientId', null, 'POST');

        $client = Client::get_by_id($clientId);
        if (!$client) {
            LogUtil::registerError($this->__('No s\'ha trobat el client'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'clientsList'));
        }

        $confirm = FormUtil::getPassedValue('confirm', null, 'POST');
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
     * Display the list of clients
     * @param:		The filter and pager values
     * @return:		The clients' list page
     */
    public function clientsList($args) {

        if (SessionUtil::getVar('clientsList')) {
            $args = unserialize(SessionUtil::getVar('clientsList'));
            $rpp = $args['rpp'];
            $search = $args['search'];
            $searchText = $args['searchText'];
        } else {
            $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'GETPOST');
            $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'GETPOST');
            $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');
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
     * @param:		The filter and pager values
     * @return:		An array with all the clients information
     */
    public function clientsListContent($args) {
        $init = isset($args['init']) ? $args['init'] : -1;
        $rpp = isset($args['rpp']) ? $args['rpp'] : 15;
        $by = isset($args['search']) ? $args['search'] : '';
        $search = isset($args['searchText']) ? $args['searchText'] : '';

        $clients = Clients::search_by($by, $search, $init, $rpp);
        $clientsNumber = Clients::count_by($by, $search);

        $pager = ModUtil::func('Agoraportal', 'user', 'pager', array(
            'init' => $init,
            'rpp' => $rpp,
            'total' => $clientsNumber,
            'javascript' => true,
            'itemsname' => 'clients',
            'urltemplate' => "clientsList('$by','$search', %%, '$rpp')"
        ));

        return $this->view->assign('clients', $clients)
                        ->assign('pager', $pager)
                        ->fetch('agoraportal_admin_clientsListContent.tpl');
    }

    /**
     * Display the module configuration form
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
                        ->fetch('agoraportal_admin_config.tpl');
    }

    /**
     * Update the configuration parameters received from the form
     * @return:		A success or an error message and redirect user to clients' list
     */
    public function updateConfig() {
        $siteBaseURL = FormUtil::getPassedValue('siteBaseURL', null, 'POST');
        $warningMailsTo = FormUtil::getPassedValue('warningMailsTo', null, 'POST');
        $requestMailsTo = FormUtil::getPassedValue('requestMailsTo', null, 'POST');
        $diskRequestThreshold = FormUtil::getPassedValue('diskRequestThreshold', null, 'POST');
        $clientsMailThreshold = FormUtil::getPassedValue('clientsMailThreshold', null, 'POST');
        $maxAbsFreeQuota = FormUtil::getPassedValue('maxAbsFreeQuota', null, 'POST');
        $maxFreeQuotaForRequest = FormUtil::getPassedValue('maxFreeQuotaForRequest', null, 'POST');
        $createDB = FormUtil::getPassedValue('createDB', false, 'POST');

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
     * @param:		The location main values
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewLocation() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        $locationName = FormUtil::getPassedValue('locationName', null, 'POST');

        if ($confirmation == null) {
            return $this->view->fetch('agoraportal_admin_config_location_add.tpl');
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
     * @param:		The location identity
     * @return:		An array with the available services
     */
    public function editLocation() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        $locationId = FormUtil::getPassedValue('locationId', '', 'GETPOST');
        $locationName = FormUtil::getPassedValue('locationName', null, 'POST');

        $location = Location::get_by_id($locationId);
        if (!$location) {
            return LogUtil::registerError($this->__('No s\'ha trobat el Servei Territorial'));
        }

        if (!$confirmation) {
            return $this->view->assign('location', $location)
                ->fetch('agoraportal_admin_config_location_edit.tpl');
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
     * @param:		The location identity and name
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function deleteLocation() {
        $locationId = FormUtil::getPassedValue('locationId', 0, 'GETPOST');

        if (Location::delete($locationId)) {
            LogUtil::registerStatus($this->__('S\'ha esborrat el Servei Territorial'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el Servei Territorial'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Create a new request type
     * @param:		The request type main values
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewRequestType() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        $requestTypeName = FormUtil::getPassedValue('requestTypeName', null, 'POST');
        $requestTypeDescription = FormUtil::getPassedValue('requestTypeDescription', null, 'POST');
        $requestTypeUserCommentsText = FormUtil::getPassedValue('requestTypeUserCommentsText', null, 'POST');

        if ($confirmation == null) {
            return $this->view->fetch('agoraportal_admin_config_requesttype_add.tpl');
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
     * @param:		The request type information
     * @return:		The request type updated
     */
    public function editRequestType() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', 0, 'GETPOST');

        $requestType = RequestType::get_by_id($requestTypeId);
        if (!$requestType) {
            return LogUtil::registerError($this->__('No s\'ha trobat el tipus de sol·licitud'));
        }

        if (!$confirmation) {
            return $this->view->assign('requestType', $requestType)
                ->fetch('agoraportal_admin_config_requesttype_edit.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $requestType->name = FormUtil::getPassedValue('requestTypeName', null, 'POST');
        $requestType->description = FormUtil::getPassedValue('requestTypeDescription', null, 'POST');
        $requestType->userCommentsText = FormUtil::getPassedValue('requestTypeUserCommentsText', null, 'POST');
        if ($requestType->save()) {
            LogUtil::registerStatus($this->__('El tipus de sol·licitud s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar el tipus de sol·lcitud'));
        }

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Delete a given request type
     * @param:		The request type identity
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function deleteRequestType() {
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', 0, 'GETPOST');

        if (RequestType::delete($requestTypeId)) {
            LogUtil::registerStatus($this->__('S\'ha esborrat el tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el tipus de sol·licitud'));
        }

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Create a new relation between a request type and  a service
     * @param:		Request type and service identifications
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewRequestTypeService() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');

        if (!$confirmation) {
            $requestType = RequestTypes::get_all();
            $services = ServiceTypes::get_all();
            return $this->view->assign('requestType', $requestType)
                ->assign('services', $services)
                ->fetch('agoraportal_admin_config_requesttype_assignservice.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $requesttypeid = FormUtil::getPassedValue('requesttype', null, 'POST');
        $requestType = RequestType::get_by_id($requesttypeid);
        if (!$requestType) {
            return LogUtil::registerError($this->__('No s\'ha trobat el tipus de sol·licitud'));
        }

        $serviceid = FormUtil::getPassedValue('service', null, 'POST');
        if ($requestType->addServiceType($serviceid)) {
            LogUtil::registerStatus($this->__('S\'ha assignat el servei al tipus de sol·licitud'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en l\'assignació del servei i el tipus de sol·licitud'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Delete a given relation between a request type and a service
     * @param:		The request type and service identity
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function deleteRequestTypeService() {
        $requesttypeid = FormUtil::getPassedValue('requestTypeId', 0, 'GETPOST');
        $serviceid = FormUtil::getPassedValue('serviceId', 0, 'GETPOST');

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
     * @param:		The types main values
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function addNewType() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        $typeName = FormUtil::getPassedValue('typeName', null, 'POST');

        if ($confirmation == null) {
            return $this->view->fetch('agoraportal_admin_config_clienttype_add.tpl');
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
     * @param:		The type identity
     * @return:		An array with the available services
     */
    public function editType() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        $typeId = FormUtil::getPassedValue('typeId', 0, 'GETPOST');

        $type = ClientType::get_by_id($typeId);
        if (!$type) {
            return LogUtil::registerError($this->__('No s\'ha trobat la tipologia de client'));
        }

        if ($confirmation == null) {

            return $this->view->assign('type', $type)
                ->fetch('agoraportal_admin_config_clienttype_edit.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $type->typeName = FormUtil::getPassedValue('typeName', null, 'POST');
        if ($type->save()) {
            LogUtil::registerStatus($this->__('La tipologia de client s\'ha editat correctament'));
        } else {
            LogUtil::registerError($this->__('S\'ha produït un error en editar el nom de la tipologia'));
        }
        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Delete a given client type
     * @param:		The type identity and name
     * @return:		An success message if success and error message if fails. Redirect user to the configuration page
     */
    public function deleteType() {
        $typeId = FormUtil::getPassedValue('typeId', 0, 'GETPOST');

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
    public function addNewModelType() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');

        // Show the form or save the data?
        if ($confirmation == null) {
            return $this->view->fetch('agoraportal_admin_config_servicetemplate_add.tpl');
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        $shortcode = FormUtil::getPassedValue('shortcode', null, 'POST');
        $description = FormUtil::getPassedValue('description', null, 'POST');
        $url = FormUtil::getPassedValue('url', null, 'POST');
        $dbHost = FormUtil::getPassedValue('dbHost', null, 'POST');

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
    public function editModelType() {
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        $modelTypeId = FormUtil::getPassedValue('modelTypeId', 0, 'GETPOST');

        $model = ServiceTemplate::get_by_id($modelTypeId);
        if (!$model) {
            return LogUtil::registerError($this->__('No s\'ha trobat la plantilla de nodes'));
        }

        if ($confirmation == null) {
            return $this->view->assign('model', $model)
                ->fetch('agoraportal_admin_config_servicetemplate_edit.tpl');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $model->shortcode = FormUtil::getPassedValue('shortcode', null, 'POST');
        $model->description = FormUtil::getPassedValue('description', null, 'POST');
        $model->url = FormUtil::getPassedValue('url', null, 'POST');
        $model->dbHost = FormUtil::getPassedValue('dbHost', null, 'POST');
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
    public function deleteModelType() {
        $modelTypeId = FormUtil::getPassedValue('modelTypeId', 0, 'GETPOST');

        if (!ServiceTemplate::delete($modelTypeId)) {
            LogUtil::registerError($this->__('S\'ha produït un error en esborrar el registre de la plantilla'));
        } else {
            LogUtil::registerStatus($this->__('S\'ha esborrat el registre de la plantilla'));
        }

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'config'));
    }

    /**
     * Display a form that allows you to execute SQL
     *
     * @author  Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param   array clients_sel
     * @param   $which
     * @param   $sqlfunc
     * @param   int service_sel     Id of the selected service
     * @return  Page rendered
     */
    public function sql() {
        $clients_sel = FormUtil::getPassedValue('clients_sel', array(), 'GETPOST'); // Clients selected
        $service_sel = FormUtil::getPassedValue('service_sel', -1, 'GETPOST'); // Service selected (moodle2, nodes, portal)
        $which = FormUtil::getPassedValue('which', 'all', 'GETPOST');
        $sqlfunc = trim(FormUtil::getPassedValue('sqlfunction', '', 'GETPOST'));
        $ask = FormUtil::getPassedValue('ask', '', 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', '', 'GETPOST');

        if ($service_sel < 0) {
            $defaultservice = ServiceType::get_by_name('moodle2');
            $service_sel = $defaultservice->serviceId;
        }

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('which', $which);
        $view->assign('sqlfunc', $sqlfunc);
        $view->assign('service_sel', $service_sel);

        if (!empty($ask)) {
            $action = 'ask';
        } else if (!empty($confirm)) {
            $action = 'exe';
        }

        if (isset($action) && ( empty($sqlfunc) || ($which == 'selected' && empty($clients_sel)) || $service_sel === false)) {
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
                $results = $success = $messages = $messages_recount = Array();
                $one_result_mode = $columns = false;

                ini_set('mysql.connect_timeout', 1800);
                ini_set('default_socket_timeout', 1800);
                foreach ($clients as $i => $client) {
                    try {
                        $result = $client->executeSQL($sqlfunc, true);
                    } catch(Exception $e) {
                        $success[$i] = false;
                        $messages[$i] = $this->__('No s\'ha pogut executar la comanda a la base de dades: ') . $e->getMessage();
                        continue;
                    }

                    $success[$i] = true;
                    // PARSE the result
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
                        $messages[$i] = 'OK';
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

                return $view->fetch('agoraportal_admin_sql_exe.tpl');
            }

            // Else ask to execute SQL
            // Check if the SQL command contain the SQL security code
            if ($this->getVar('sqlSecurityCode') != '') {
                if (strpos($sqlfunc, $this->getVar('sqlSecurityCode'))) {
                    LogUtil::registerError($this->__f('La comanda SQL conté el codi de seguretat "%s". No es recomana seguir amb l\'operació', ModUtil::getVar('Agoraportal', 'sqlSecurityCode')));
                }
            }
            return $view->fetch('agoraportal_admin_sql_confirm.tpl');
        }

        $this->view->assign('services', ServiceTypes::get_with_db(true));

        $commands = ModUtil::func('Agoraportal', 'admin', 'sqlComandList', array('serviceId' => $service_sel));
        if ($commands) {
            $view->assign('comands', $commands);
        }

        $filter_content = $this->filter_listServices(array(
            '$clients_sel' => $clients_sel,
            'service_sel' => $service_sel
        ));

        $view->assign('actiononchangeservice', 'sqlComandsUpdateTab(\'all\');')
             ->assign('listServicesContent', $filter_content);

        return $view->fetch('agoraportal_admin_sql.tpl');
    }

    /**
     * Show a textarea populated with a list of the clients that have a given service active
     *
     * @author: Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @param: Array The filter and pager values
     * @return: string HTML code of the textarea
     */
    public function filter_listServices($args) {
        $service_sel = isset($args['service_sel']) ? $args['service_sel'] : array();
        $clients_sel = isset($args['clients_sel']) ? $args['clients_sel'] : array();
        $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : 1, 'GETPOST');
        $searchby = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : 0, 'GETPOST');
        $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');
        $pilot = FormUtil::getPassedValue('pilot', isset($args['pilot']) ? $args['pilot'] : 0, 'GETPOST');
        $include = FormUtil::getPassedValue('include', isset($args['include']) ? $args['include'] : 1, 'GETPOST');

        if ($service_sel < 0) {
            $serviceName = FormUtil::getPassedValue('serviceName', '', 'GETPOST');
            if (empty($serviceName)) {
                $serviceName = 'moodle2';
            }
            $service = ServiceType::get_by_name($serviceName);
        } else {
            $service = ServiceType::get_by_id($service_sel);
        }

        $search = array();

        switch ($order) {
            case 1:
                $search['orderby'] = "clientName, clientDNS";
                break;
            case 2:
                $search['orderby'] = "state asc, timeEdited desc,clientServiceId desc";
                break;
            case 3:
                $search['orderby'] = "a.activedId";
                break;
            case 4:
                $search['orderby'] = "clientCode";
                break;
            case 5:
                $search['orderby'] = "clientDNS";
                break;
            default:
                $search['orderby'] = $order;
        }

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
            }
            $search['searchby'] = array();
            $search['searchby'][$searchby] = $searchText;
        }
        $search['searchby']['state'] = 1;

        if (!empty($pilot)) {
            $search['searchby'][$pilot] = $include;
        }
        $clients = Clients::search_by_service_params($service->serviceId, $search);
        $clientsNumber = count($clients);

        return $this->view->assign('clients', $clients)
            ->assign('service_sel', $service_sel)
            ->assign('clients_sel', $clients_sel)
            ->assign('service', $service)
            ->assign('clientsNumber', $clientsNumber)
            ->assign('order', $order)
            ->assign('pilot', $pilot)
            ->assign('include', $include)
            ->assign('search', $search)
            ->assign('searchText', $searchText)
            ->fetch('agoraportal_admin_service_filter_content.tpl');
    }

    /**
     * Get the list of SQL comands saved in the database
     * @param:      None
     * @return:     An array with all comands and their descriptions
     */
    public function sqlComandList($args) {
        $serviceId = FormUtil::getPassedValue('serviceId', isset($args['serviceId']) ? $args['serviceId'] : 2, 'GETPOST');
        $command_type = FormUtil::getPassedValue('comand_type', isset($args['comand_type']) ? $args['comand_type'] : 0, 'GETPOST');

        $commands = SQLCommands::getCommands($serviceId, $command_type);

        return $this->view->assign('commands', $commands)
                        ->fetch('agoraportal_admin_sql_commandList.tpl');
    }

    public function stats() {
        // Initial values
        $clients_sel = array();
        $which = 'all';
        $stats = 1;
        $start = date("Y-m-d");
        $stop = date("Y-m-d");

        $defaultservice = ServiceType::get_by_name('moodle2');
        $service_sel = $defaultservice->serviceId;

        $filter_content = $this->filter_listServices(array(
            '$clients_sel' => $clients_sel,
            'service_sel' => $service_sel
        ));

        $this->view->assign('services', ServiceTypes::get_with_db(false))
            ->assign('listServicesContent', $filter_content);

        if (strtotime($stop) < strtotime($start)) {
            LogUtil::registerError($this->__('La data de fi és menor que la d\'inici'));
        }

        return $this->view->assign('which', $which)
                        ->assign('stats_sel', $stats)
                        ->assign('date_start', $start)
                        ->assign('date_stop', $stop)
                        ->assign('searchText', '')
                        ->assign('resultsContent', '')
                        ->assign('actiononchangeservice', 'getServiceStats();')
                        ->fetch('agoraportal_admin_stats.tpl');
    }

    public function statsGetStatisticsContent($args) {
        $stats = isset($args['stats']) ? $args['stats'] : 1;
        $service = isset($args['service']) ? $args['service'] : 1;
        $start = isset($args['date_start']) ? $args['date_start'] : date("Y-m-d");
        $stop = isset($args['date_stop']) ? $args['date_stop'] : date("Y-m-d");
        $orderby = isset($args['orderby']) ? $args['orderby'] : 'clientDNS';
        $clients = isset($args['clients']) ? $args['clients'] : '';

        if (strtotime($stop) < strtotime($start)) {
            return $this->view->assign('error', 'La data de fi és anterior a la d\'inici')->fetch('agoraportal_admin_stats_table.tpl');
        }

        $items = Stats::getResults($service, $stats, $start, $stop, $orderby, $clients);
        if ($items === false) {
            return $this->view->assign('error', 'S\'ha produït un error en carregar elements')->fetch('agoraportal_admin_stats_table.tpl');
        }

        if(count($items['results']) <= 0) {
            return $this->view->assign('error', 'No hi ha dades')
                ->fetch('agoraportal_admin_stats_table.tpl');
        }

        $show_access_button = isset($items['results'][0]['d1']) || isset($items['results'][0]['h1']);

        return $this->view->assign('columns', $items['columns'])
                    ->assign('results', $items['results'])
                    ->assign('totals', $items['totals'])
                    ->assign('stats', $stats)
                    ->assign('show_access_button', $show_access_button)
                    ->fetch('agoraportal_admin_stats_table.tpl');
    }

    /**
     * Creates the CSV from the stats demmanded
     * @author:     Pau Ferrer Ocaña (aregi@xtec.cat)
     * @param:      The filter and pager values
     */
    public function statsGetCSVContent() {
        $stats = FormUtil::getPassedValue('stats', 1, 'POST');
        $service_sel = FormUtil::getPassedValue('service_sel', 1, 'POST');
        $which = FormUtil::getPassedValue('which', 'all', 'POST');
        $start = FormUtil::getPassedValue('date_start', date("Y-m-d"), 'POST');
        $stop = FormUtil::getPassedValue('date_stop', date("Y-m-d"), 'POST');
        $orderby = FormUtil::getPassedValue('orderby', 'clientDNS', 'POST');

        if (strtotime($stop) < strtotime($start)) {
            return LogUtil::registerError($this->__('La data de fi és menor que la d\'inici'));
        }

        $clients = '';
        if ($which == 'selected') {
            $clients = implode(',', FormUtil::getPassedValue('clients_sel', array(), 'POST')); // Format expected by Stats::getResults()
        }

        $items = Stats::getResults($service_sel, $stats, $start, $stop, $orderby, $clients);
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
        $csv = '';
        while ($csvrow= fgets($fp)) {
            $csv .= $csvrow;
        }

        fclose($fp);

        $servicetype = ServiceType::get_by_id($service_sel);
        $filename = 'stats_'.$servicetype->serviceName.'_'.$stats.'_'.str_replace('-',"",$start).'-'.str_replace('-',"",$stop);
        header("Content-type: text/csv"); // add here more headers for diff. extensions
        header('Content-Disposition: attachment; filename="'.$filename.'.csv"'); // use 'attachment' to force a download
        header("Content-length: $fsize");
        header("Cache-control: private"); //use this to open files directly
        echo $csv;
        exit;
    }

    public function statsGetGraphsContent() {
        $stat = FormUtil::getPassedValue('stats', 1, 'GET');
        $service = FormUtil::getPassedValue('service', 1, 'GET');
        $date_start = FormUtil::getPassedValue('date_start', 0, 'GET');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'GET');
        $column = FormUtil::getPassedValue('column', false, 'GET');
        $show_totals = FormUtil::getPassedValue('totals', false, 'GET');
        $clients = FormUtil::getPassedValue('clients', '', 'GET');

        $servicetype = ServiceType::get_by_id($service);
        $columns = Stats::getGraphColumns($service, $stat, $column, $show_totals);
        if(!$columns) {
            return $this->view->assign('error', 'No hi ha columnes per mostrar')->fetch('agoraportal_admin_stats_graph.tpl');
        }

        $items = Stats::getStats($service, $stat, $date_start, $date_stop, 'clientDNS', $clients, $columns, $show_totals);
        if (!$items) {
            return $this->view->assign('error', 'S\'ha produït un error en carregar elements')->fetch('agoraportal_admin_stats_graph.tpl');
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

        $title = '';
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
        $subtitle = '';
        if ($show_totals) {
            $subtitle .= 'Totals ';
        } else {
            $subtitle .= $clients . ' ';
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
            ->fetch('agoraportal_admin_stats_graph.tpl');
    }

    public function updateDiskUse() {
       // Security check
        if (!AgoraPortal_Util::isAdmin() && !defined('CLI_SCRIPT')) {
            LogUtil::registerError($this->__('No teniu accés a executar aquesta funcionalitat'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
        }

        $debug = FormUtil::getPassedValue('debug', false, 'GET');

        // Load general config
        global $agora;

        // General vars
        $errorMsg = '';
        $adminReport = '';

        // Check if Mailer is active
        $modid = ModUtil::getIdFromName('Mailer');
        $modinfo = ModUtil::getInfo($modid);
        $mailerAvailable = ($modinfo['state'] == 3) ? 1 : 0;

        // E-mail addresses of agoraportal administrators
        $adminemails = explode(',', ModUtil::getVar('Agoraportal', 'warningMailsTo'));

        // Build warning message
        $warningMsgTpl = "<p>Benvolgut/da,</p><p>Aquest missatge és per informar-vos de què ###warningMsgForUser###";
        $warningMsgTpl .= " En cas de superar el límit d'espai consumit, els usuaris no hi podran pujar fitxers.";
        $warningMsgTpl .= " Actualment heu consumit el ###diskConsumeValue###% de la quota.</p>";
        $warningMsgTpl .= "<p>Els gestors dels serveis Àgora del centre poden sol·licitar l'ampliació de la quota del servei des de la secció <strong>altres sol·licituds</strong> de l'<a href=\"" . $agora['server']['server'] . $agora['server']['base'] . "portal\">aplicació de gestió dels serveis d'Àgora</a>.</p>";
        $warningMsgTpl .= "<p>Atentament,</p>";
        $warningMsgTpl .= "<p>---<br />L'equip del projecte Àgora</p>";
        $warningMsgTpl .= "<p>P.D.: Aquest missatge s'envia automàticament. Si us plau, no el respongueu.</p>";

        // Get available services with db flag set (currently: intranet, moodle2, nodes)
        $servicetypes = ServiceTypes::get_with_db();

        // Build array with info of the services to check and the path to its file
        foreach ($servicetypes as $servicetype) {

            $agoravars = $agora[$servicetype->serviceName];
            $path = $agora['server']['root'] . $agoravars['datadir'] . $agoravars['diskusagefile'];

            if (!file_exists($path)) {
                $errorMsg .= $servicetype->serviceName. ': No s\'ha trobat el fitxer de consums de disc següent: ' . $path . '<br />';
                continue;
            }

            $userprefix = $agoravars['userprefix'];

            if ($debug) {
                $adminReport .= '<h4>Servei: ' . strtoupper($servicetype->serviceName) . '</h4>';
            }

            $services = Services::get_enabled_by_serviceid($servicetype->serviceId, 'activedId');

            // Parse the file and update the information
            $lines = file($path);
            foreach ($lines as $line_num => $line) {
                if (!preg_match('/^\d+\s+' . $userprefix . '[1-9]\d*$/', $line)) {
                    continue;
                }

                // Get usage value
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

                if ($mailerAvailable) {
                    $percentage = $service->get_disk_percentage();
                    $consume = round($service->diskConsume / 1024);

                    if ($warning) {
                        // Send warning message to client managers
                        $warningMsgForUser = ($percentage > 100) ? " heu superat el límit d'espai de disc disponible per al servei '" . $servicetype->serviceName . "' d'Àgora." : " esteu a prop de superar el límit d'espai de disc disponible per al servei '" . $servicetype->serviceName . "' d'Àgora.";
                        $warningMsg = str_replace('###warningMsgForUser###', $warningMsgForUser, $warningMsgTpl);
                        $warningMsg = str_replace('###diskConsumeValue###', $percentage, $warningMsg);

                        // Send the e-mail
                        $subject = $this->__('Ocupació de disc dels serveis a Àgora');
                        $sendMail = $client->send_mail($subject, $warningMsg, true, true, false);

                        if (!$sendMail) {
                            $errorMsg .= $servicetype->serviceName. ': No s\'ha enviat l\'avís a cap usuari/ària del centre amb codi ' . $client->clientCode . '<br />';
                        }

                        // Save error message for admin report
                        $url = $service->get_url();
                        $textColor = ($percentage > 100) ? 'red' : 'orange';
                        $adminReport .= '<div style="color:' . $textColor . '";>'
                            . $servicetype->serviceName . ' - ' . $client->clientCode . ': ' . $percentage . ' % (' . $consume . ' / ' . $service->diskSpace . ')'
                            . ' (<a href="' . $url . '" target="_blank">' . $url . '</a>)'
                            . '</div>';

                    } else if ($debug) {
                        // Save error message for admin report
                        $url = $service->get_url();
                        $textColor = 'green';
                        $adminReport .= '<div style="color:' . $textColor . '";>'
                            . $servicetype->serviceName . ' - ' . $client->clientCode . ': ' . $percentage . ' % (' . $consume . ' / ' . $service->diskSpace . ')'
                            . ' (<a href="' . $url . '" target="_blank">' . $url . '</a>)'
                            . '</div>';
                    }
                }
            }
        }

        if ($debug) {
            echo $adminReport;
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

        // Tell agoraportal admins that one or more errors occurred
        if (!empty($errorMsg)) {
            echo '<br/><br/>ERRORS:<br/>' . $errorMsg;

            // Send warning message to configured recipients if Mailer is available
            if ($mailerAvailable) {
                $content = $this->__('<p>S\'han produït errors en la gestió del consum de disc per part dels centres. Missatge de l\'error:</p><p>' . $errorMsg . '</p>');

                ModUtil::apiFunc( 'Mailer', 'user', 'sendmessage', array(
                    'toname' => $this->__( 'Agoraportal admin' ),
                    'toaddress' => $adminemails,
                    'subject' => $this->__( 'Error en el càlcul de consum de disc' ),
                    'body' => $content,
                    'html' => 1 ) );
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
     * @param		The request Id and the filter values
     * @return		The edit form
     */
    public function editRequest() {
        $requestId = FormUtil::getPassedValue('requestId', null, 'GET');

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
     * @param		The main client and request parameters
     * @return		An error message if fails and redirect user to function requestsList
     */
    public function updateRequest() {
        $state = FormUtil::getPassedValue('state', null, 'POST');
        $adminComments = FormUtil::getPassedValue('adminComments', null, 'POST');
        $privateNotes = FormUtil::getPassedValue('privateNotes', null, 'POST');
        $requestId = FormUtil::getPassedValue('requestId', null, 'POST');
        $clientCode = FormUtil::getPassedValue('clientCode', null, 'POST');
        $sendMail = FormUtil::getPassedValue('sendMail', null, 'POST');

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

            $mailContent = $view->fetch('agoraportal_admin_mail_updateRequest.tpl');

            $client->send_mail(__('Estat de les sol·licituds a Àgora'), $mailContent);
        }

        LogUtil::registerStatus($this->__('El registre s\'ha editat correctament'));

        return System::redirect(ModUtil::url('Agoraportal', 'admin', 'requestsList'));
    }

    /**
     * Delete a service
     * @param		The request identity
     * @param       Aida Regi
     * @return		An error message if fails and redirect user to function listServices
     */
    public function deleteRequest() {
        $requestId = FormUtil::getPassedValue('requestId', 0, 'GETPOST');

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
     * @param		The filter and pager values
     * @return		The services list page
     */
    public function requestsList($args) {

        if (SessionUtil::getVar('requestsList')) {
            $args = unserialize(SessionUtil::getVar('requestsList'));
            $service = $args['service'];
            $stateFilter = $args['stateFilter'];
            $search = $args['search'];
            $searchText = $args['searchText'];
            $rpp = $args['rpp'];
            $order = $args['order'];
        } else {
            $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 15, 'GETPOST');
            $service = FormUtil::getPassedValue('service', isset($args['service']) ? $args['service'] : 0, 'GETPOST');
            $stateFilter = FormUtil::getPassedValue('stateFilter', isset($args['stateFilter']) ? $args['stateFilter'] : -1, 'GETPOST');
            $search = FormUtil::getPassedValue('search', isset($args['search']) ? $args['search'] : '', 'GETPOST');
            $searchText = FormUtil::getPassedValue('searchText', isset($args['searchText']) ? $args['searchText'] : '', 'GETPOST');
            $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : 2, 'GETPOST');
        }

        $listServicesContent = ModUtil::func('Agoraportal', 'admin', 'requestsListContent', $args);
        $requestsstates = Requests::get_states();
        $servicetypes = ServiceTypes::get_all();

        return $this->view->assign('requestListContent', $listServicesContent)
                        ->assign('requestsstates', $requestsstates)
                        ->assign('search', $search)
                        ->assign('searchText', $searchText)
                        ->assign('service', $service)
                        ->assign('servicetypes', $servicetypes)
                        ->assign('stateFilter', $stateFilter)
                        ->assign('rpp', $rpp)
                        ->assign('order', $order)
                        ->fetch('agoraportal_admin_requestsList.tpl');
    }

    /**
     * Get the list of requests
     * @param:		The filter and pager values
     * @return:		An array with all the clients and services
     */
    public function requestsListContent($args) {
        $init = isset($args['init']) ? $args['init'] : -1;
        $service = isset($args['service']) ? $args['service'] : 0;
        $stateFilter = isset($args['stateFilter']) ? $args['stateFilter'] : -1;
        $search = isset($args['search']) ? $args['search'] : 0;
        $searchText = isset($args['searchText']) ? $args['searchText'] : '';
        $rpp = isset($args['rpp']) ? $args['rpp'] : 15;
        $order = isset($args['order']) ? $args['order'] : 2;

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
     * List data files of a service
     *
     * @param string serviceName
     * @param int activedId
     *
     * @return Boolean
     */
    public function listDataDirs() {
        // Security check
        if (!AgoraPortal_Util::isAdmin() && !defined('CLI_SCRIPT')) {
            LogUtil::registerError($this->__('No teniu autorització per accedir a la llista de fitxers'));
            return System::redirect(ModUtil::url('Agoraportal', 'admin', 'listServices'));
        }

        $serviceName = FormUtil::getPassedValue('serviceName', '', 'GET');
        $activedId = FormUtil::getPassedValue('activedId', '', 'GET');

        // Creates an object of the service and calls its function to show the content of the directory of data
        $service = Service::get_by_servicename_and_activeid($serviceName, $activedId);
        $service->getDataDirectoryList();

        return true;
    }

    /**
     * Display a form that allows you to execute commands
     *  - $action false: Initial form
     *  - $action 'ask': Ask for confirmation
     *  - $action 'confirm': Show operations programmed
     *
     * @author Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @author Toni Ginard
     * @return Page rendered
     */
    public function operations() {
        global $agora;

        $clients_sel = FormUtil::getPassedValue('clients_sel', 0, 'GETPOST');
        $service_sel = FormUtil::getPassedValue('service_sel', -1,'GETPOST');
        $which = FormUtil::getPassedValue('which', 'all', 'GETPOST');
        $order = FormUtil::getPassedValue('order', 1, 'GETPOST');
        $actionselect = FormUtil::getPassedValue('actionselect', false, 'GETPOST');
        $priority = FormUtil::getPassedValue('priority', 0, 'GETPOST');
        $queue = FormUtil::getPassedValue('queue', '', 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', '', 'GETPOST');

        // If there's no previous selected service, select Moodle
        if ($service_sel < 0) {
            $defaultservice = ServiceType::get_by_name('moodle2');
            $service_sel = $defaultservice->serviceId;
        }

        // Set the action
        if (!empty($queue)) {
            $action = 'ask';
        } else if (!empty($confirm)) {
            $action = 'confirm';
        }
        if (isset($action) && (empty($actionselect) || ($which == 'selected' && empty($clients_sel)) || $service_sel === false)) {
            LogUtil::registerError($this->__('Heu d\'emplenar tots els camps'));
        }

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('which', $which);
        $view->assign('service_sel', $service_sel);
        $view->assign('order', $order);
        $view->assign('actionselect', $actionselect);

        if (isset($action)) { // 'ask' or 'confirm'
            $view->assign('priority', $priority);

            $serviceName = ServiceType::get_name($service_sel);
            $services = Services::get_enabled_by_serviceid_full($service_sel);
            // In case that some services are selected, keep only the selected
            if ($which == 'selected') {
                $services = array_intersect_key($services, array_flip($clients_sel));
            }

            // Get params
            $params = array();
            foreach ($_POST as $key => $value) {
                if (strpos($key,'parm_') === 0 && !empty($value)) {
                    $key_ret = substr($key, 5);
                    $params[$key_ret] = FormUtil::getPassedValue($key, null, 'POST');
                }
            }

            $view->assign('params', $params);
            $view->assign('serviceName', $serviceName);
            $view->assign('services', $services);

            if ($action == 'confirm') { // Execute Operation
                $success = Array();
                foreach ($services as $i => $service) {
                    $operation = Agora_Queues_Operation::add($actionselect, $service->clientId, $service->serviceId, $params, $priority);
                    $success[$i] = $operation ? true : false;
                }
                return $view->assign('success', $success)
                    ->assign('prefix', $agora['server']['userprefix'])
                    ->fetch('agoraportal_admin_operations_exe.tpl');
            }
            else {
                return $view->fetch('agoraportal_admin_operations_confirm.tpl');
            }
        }

        $filter_content = $this->filter_listServices(array(
            '$clients_sel' => $clients_sel,
            'service_sel' => $service_sel
        ));

        $this->view->assign('services', ServiceTypes::get_with_db())
            ->assign('actiononchangeservice', 'getServiceActions();')
            ->assign('listServicesContent', $filter_content);

       $priority_values = array();
        for ($i = -10; $i <= 10; $i++) {
            $priority_values[$i] = $i;
        }
        $view->assign('priority_values', $priority_values);

        return $view->fetch('agoraportal_admin_operations.tpl');
    }

    /**
     * Display the queue management table
     * @author  Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return  Rendering of the page
     */
    public function queues() {
        $view = Zikula_View::getInstance('Agoraportal', false);

        $search = array();
        $search['operation'] = FormUtil::getPassedValue('operation_filter', '', 'GETPOST');
        $view->assign('operation_filter', $search['operation']);

        $search['client_type'] = FormUtil::getPassedValue('client_type', '', 'GETPOST');
        $view->assign('client_type', $search['client_type']);

        $search['client'] = FormUtil::getPassedValue('client_filter', '', 'GETPOST');
        $view->assign('client_filter', $search['client']);

        $search['priority'] = FormUtil::getPassedValue('priority_filter', '-', 'GETPOST');
        $view->assign('priority_filter', $search['priority']);

        $search['service'] = FormUtil::getPassedValue('service_filter', '', 'GETPOST');
        $view->assign('service_filter', $search['service']);

        $search['state'] = FormUtil::getPassedValue('state_filter', '', 'GETPOST');
        $view->assign('state_filter', $search['state']);

        $search['from'] = FormUtil::getPassedValue('date_start', date('Y-m-d', strtotime('-3 days')).' 00:00', 'GETPOST');
        $view->assign('date_start', $search['from']);

        $search['to'] = FormUtil::getPassedValue('date_stop', date('Y-m-d', strtotime('+1 day')).' 00:00', 'GETPOST');
        $view->assign('date_stop', $search['to']);

        $search['sortby_dir'] = FormUtil::getPassedValue('sortby_dir', 'ASC', 'GETPOST');
        $view->assign('sortby_dir', $search['sortby_dir']);

        $search['sortby'] = FormUtil::getPassedValue('sortby_filter', 'timeStart', 'GETPOST');
        $view->assign('sortby_filter', $search['sortby']);

        $startnum = FormUtil::getPassedValue('startnum', 0, 'GETPOST');
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
    public function createBatch() {
        $schoolCodes = FormUtil::getPassedValue('schoolCodes', null, 'POST');
        $service_sel = FormUtil::getPassedValue('service_sel', 5, 'POST');
        $dbHost = FormUtil::getPassedValue('dbHost', null, 'POST');
        $serviceDB = FormUtil::getPassedValue('serviceDB', null, 'POST');
        $template = FormUtil::getPassedValue('template', null, 'POST');
        $createClient = FormUtil::getPassedValue('createClient', null, 'POST');

        $services = ServiceTypes::get_with_db();
        $templates = ServiceTemplates::get_all();

        return $this->view->assign('schoolCodes', $schoolCodes)
            ->assign('service_sel', $service_sel)
            ->assign('services', $services)
            ->assign('dbHost', $dbHost)
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

        $schoolCodes = FormUtil::getPassedValue('schoolCodes', null, 'POST');
        $service_sel = FormUtil::getPassedValue('service_sel', 0, 'POST');
        $dbHost = FormUtil::getPassedValue('dbHost', null, 'POST');
        $serviceDB = FormUtil::getPassedValue('serviceDB', null, 'POST');
        $template = FormUtil::getPassedValue('template', null, 'POST');
        $createClient = FormUtil::getPassedValue('createClient', null, 'POST');

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
            LogUtil::registerError('No s\'ha de trobat el servei '.$service_sel);
            return $this->createBatch($args);
        }

        $serviceTypeId = $servicetype->serviceId;
        $serviceName = $servicetype->serviceName;

        if ($serviceName == 'nodes' && empty($template)) {
            LogUtil::registerError('S\'ha de seleccionar una plantilla en el cas de nodes');
            return $this->createBatch($args);
        }

        // Autofill dbHost var with default value. This is a guess. dbHost should come from web form.
        if ((is_null($dbHost) || empty($dbHost)) && (($serviceName == 'intranet') || ($serviceName == 'nodes'))) {
            $dbHost = $agora['intranet']['host'];
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
                $clientName = 'form'.substr($clientCode, -3); // formxxx (three numbers)

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
                    'clientAddress' => '',
                    'clientCity' => '',
                    'clientPC' => '',
                    'clientState' => 1,
                    'clientDescription' => 'Alta automàtica'
                    ), false);
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
            $service = Service::get_by_client_and_service($client->clientId, $serviceTypeId); // Should return false!
            if ($service) {
                $results[$clientCode] = "El centre <strong>$client->clientName</strong> ja disposa del servei $serviceName. Per tant, no es crearà.";
                $error++;
                continue;
            }

            // Pas 3: Crear el Servei
            if (Service::get_by_client_and_service($client->clientId, $serviceTypeId)) {
                echo "El centre <strong>$client->clientDNS</strong> ja té el servei <strong>$serviceName</strong>";
                $error++;
                continue;
            } elseif (!Service::request_service($serviceTypeId, $client->clientId, 'Alta automàtica', $template)) {
                echo "No s'ha pogut crear el servei $serviceName per al centre <strong>$client->clientDNS</strong>";
                $error++;
                continue;
            }

            if ($serviceName == 'nodes') {
                $client->set_extraFunc($template);
                $client->save();
            }

            $service = Service::get_by_client_and_service($client->clientId, $serviceTypeId); // Get the object of the service created in step 3
            $service->dbHost = $dbHost;
            $service->serviceDB = $serviceDB;
            $service->observations = 'Alta automàtica';
            $service->diskSpace = $servicetype->defaultDiskSpace;
            $service->save(); // Update values

            // Pas 4: Activar el Servei
            try {
                $password = $service->changeState(Service::STATUS_ENABLED);
            } catch (Exception $e){
                // If it fails, delete the record created in agoraportal_client_services
                $service->delete($service->clientServiceId);
                $results[$clientCode] = "No s'ha pogut activar el servei: " . $e->getMessage();
                $error++;
                continue;
            }
            $service->save();

            $results[$clientCode] = "S'ha creat el servei per al centre <strong>$clientCode</strong> i password <strong>$password</strong>";
            $success[$clientCode] = true;
        }

        return $this->view->assign('schoolCodes', $schoolCodes)
            ->assign('logo', $servicetype->get_logo())
            ->assign('results', $results)
            ->assign('success', $success)
            ->assign('error', $error)
            ->assign('dbHost', $dbHost)
            ->assign('serviceDB', $serviceDB)
            ->assign('template', $template)
            ->assign('createClient', $createClient)
            ->fetch('agoraportal_admin_createBatch_exec.tpl');
    }

    /**
     * Entry point to call the function to restore xtecadmin in each service
     *
     * @return bool
     * @throws Zikula_Exception_Forbidden
     */
    public function restoreXtecadmin() {
        // client code is optional
        $clientServiceId = FormUtil::getPassedValue('clientServiceId', '', 'GET');

        if (is_numeric($clientServiceId) && ($clientServiceId > 0)) {
            $service = Service::get_by_id($clientServiceId);
        }

        if ($service->restoreXtecadmin()) {
            LogUtil::registerStatus($this->__('S\'ha restaurat correctament l\'usuari xtecadmin'));
        }

        return System::redirect($_SERVER['HTTP_REFERER']);
    }

}
