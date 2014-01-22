<?php

class Agoraportal_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    public function servicesList($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = FormUtil::getPassedValue('service', -1, 'GET');
        $stateFilter = FormUtil::getPassedValue('stateFilter', -1, 'GET');
        $search = FormUtil::getPassedValue('search', -1, 'GET');
        $searchText = trim(FormUtil::getPassedValue('searchText', -1, 'GET'));
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $order = FormUtil::getPassedValue('order', -1, 'GET');
        $rpp = FormUtil::getPassedValue('rpp', -1, 'GET');

        $stateString = serialize(array('init' => $init,
            'service' => $service,
            'stateFilter' => $stateFilter,
            'search' => $search,
            'searchText' => $searchText,
            'rpp' => $rpp,
                ));
        SessionUtil::setVar('navState', $stateString);

        $content = ModUtil::func('Agoraportal', 'admin', 'servicesListContent', array('init' => $init,
                    'service' => $service,
                    'stateFilter' => $stateFilter,
                    'search' => $search,
                    'order' => $order,
                    'searchText' => $searchText,
                    'rpp' => $rpp,
                ));
        AjaxUtil::output(array('content' => $content));
    }

    public function sqlservicesList($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = FormUtil::getPassedValue('service', -1, 'GET');
        $search = FormUtil::getPassedValue('search', -1, 'GET');
        $searchText = FormUtil::getPassedValue('searchText', -1, 'GET');
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $which = FormUtil::getPassedValue('which', "selected", 'GET');
        $order = FormUtil::getPassedValue('order', 1, 'GET');
        $content = ModUtil::func('Agoraportal', 'admin', 'sqlservicesListContent', array('init' => $init,
                    'service_sel' => $service,
                    'search' => $search,
                    'searchText' => $searchText,
                    'order' => $order));
        AjaxUtil::output(array('content' => $content));
    }

    public function statsservicesList($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = FormUtil::getPassedValue('service', -1, 'GET');
        $search = FormUtil::getPassedValue('search', -1, 'GET');
        $searchText = FormUtil::getPassedValue('searchText', -1, 'GET');
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $which = FormUtil::getPassedValue('which', "selected", 'GET');
        $content = ModUtil::func('Agoraportal', 'admin', 'statsservicesListContent', array('init' => $init,
                    'service_sel' => $service,
                    'search' => $search,
                    'searchText' => $searchText));
        AjaxUtil::output(array('content' => $content));
    }

    public function statsGetStatistics($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $stats = FormUtil::getPassedValue('stats', 1, 'GET');
        $which = FormUtil::getPassedValue('which', "all", 'GET');
        $date_start = FormUtil::getPassedValue('date_start', 0, 'GET');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'GET');
        $clients = FormUtil::getPassedValue('clients', '', 'GET');
        $orderby = FormUtil::getPassedValue('orderby', '', 'GET');
        $content = ModUtil::func('Agoraportal', 'admin', 'statsGetStatisticsContent', array('init' => $init,
                    'stats' => $stats,
                    'which' => $which,
                    'date_start' => $date_start,
                    'date_stop' => $date_stop,
                    'clients' => $clients,
                    'orderby' => $orderby));
        AjaxUtil::output(array('content' => $content));
    }

    public function statsGetGraphs($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $stats = FormUtil::getPassedValue('stats', 1, 'GET');
        $which = FormUtil::getPassedValue('which', "all", 'GET');
        $date_start = FormUtil::getPassedValue('date_start', 0, 'GET');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'GET');
        $clients = FormUtil::getPassedValue('clients', '', 'GET');
        $usuari = FormUtil::getPassedValue('usuari', '', 'GET');
        $orderby = FormUtil::getPassedValue('orderby', '', 'GET');
        $infotype = FormUtil::getPassedValue('infotype', 'all', 'GET');
        $date = FormUtil::getPassedValue('date', 'all', 'GET');

        $content = ModUtil::func('Agoraportal', 'admin', 'statsGetGraphsContent', array('init' => $init,
                    'stats' => $stats,
                    'which' => $which,
                    'date_start' => $date_start,
                    'date_stop' => $date_stop,
                    'clients' => $clients,
                    'usuari' => $usuari,
                    'orderby' => $orderby,
                    'orderby' => $infotype,
                    'date' => $date));

        AjaxUtil::output(array('content' => $content));
    }

    public function statsGetCSV($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $stats = FormUtil::getPassedValue('stats', 1, 'GET');
        $which = FormUtil::getPassedValue('which', 'all', 'GET');
        $date_start = FormUtil::getPassedValue('date_start', 0, 'GET');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'GET');
        $clients = FormUtil::getPassedValue('clients', '', 'GET');
        $orderby = FormUtil::getPassedValue('orderby', '', 'GET');

        $content = ModUtil::func('Agoraportal', 'admin', 'statsGetCSVContent', array('init' => $init,
                    'stats' => $stats,
                    'which' => $which,
                    'date_start' => $date_start,
                    'date_stop' => $date_stop,
                    'clients' => $clients,
                    'orderby' => $orderby));

        AjaxUtil::output(array('content' => $content));
    }

    public function clientsList($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $search = FormUtil::getPassedValue('search', -1, 'GET');
        $searchText = FormUtil::getPassedValue('searchText', -1, 'GET');
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $content = ModUtil::func('Agoraportal', 'admin', 'clientsListContent', array('init' => $init,
                    'search' => $search,
                    'searchText' => $searchText));
        AjaxUtil::output(array('content' => $content));
    }

    public function editUserRow($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADD)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $userRow = FormUtil::getPassedValue('userRow', -1, 'GET');
        if ($userRow == -1) {
            AjaxUtil::error('no user found');
        }
        $uname = FormUtil::getPassedValue('uname', -1, 'GET');
        if ($uname == -1) {
            AjaxUtil::error('no user found');
        }
        $clientCode = FormUtil::getPassedValue('clientCode', -1, 'GET');
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        // get user
        $users = ModUtil::apiFunc('Agoraportal', 'user', 'getUsersToCreate', array('clientCode' => $clientCode,
                    'action' => 1,
                    'uname' => $uname));
        $user = $users[$uname];
        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            $isAdmin = true;
        }
        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('user', $user);
        $view->assign('userRow', $userRow);
        $view->assign('clientCode', $clientCode);
        $view->assign('isAdmin', $isAdmin);
        $content = $view->fetch('agoraportal_user_importCreateUsersEditRow.tpl');
        AjaxUtil::output(array('userRow' => $userRow,
            'content' => $content));
    }
/*
    public function updateUserRow($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADD)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $userRow = FormUtil::getPassedValue('userRow', -1, 'GET');
        if ($userRow == -1) {
            AjaxUtil::error($this->__('no user found'));
        }
        $uname = FormUtil::getPassedValue('uname', -1, 'GET');
        if ($uname == -1) {
            AjaxUtil::error($this->__('no user found'));
        }
        $password = FormUtil::getPassedValue('password', -1, 'GET');
        if ($password == -1) {
            AjaxUtil::error($this->__('no password'));
        }
        $name = FormUtil::getPassedValue('name', -1, 'GET');
        if ($name == -1) {
            AjaxUtil::error($this->__('no user name'));
        }
        $surname = FormUtil::getPassedValue('surname', -1, 'GET');
        $surname2 = FormUtil::getPassedValue('surname2', -1, 'GET');
        $mail = FormUtil::getPassedValue('mail', -1, 'GET');
        if ($mail == -1) {
            AjaxUtil::error($this->__('no user mail'));
        }
        if (!System::varValidate($mail, 'email')) {
            AjaxUtil::error($this->__('El format del correu electrònic no és vàlid'));
        }
        $clientCode = FormUtil::getPassedValue('clientCode', -1, 'GET');
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            $isAdmin = true;
        }
        $user = array('uname' => $uname,
            'password' => $password,
            'name' => $name,
            'surname' => $surname,
            'surname2' => $surname2,
            'mail' => $mail);
        // get client services information only for menu porposes
        $clientServices = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                    'rpp' => 50,
                    'service' => 0,
                    'state' => -1,
                    'search' => 1,
                    'searchText' => $clientCode));
        $activeServices = ModUtil::func('Agoraportal', 'user', 'getActiveServices', array('clientServices' => $clientServices));
        $servicesArray = array();
        // get the users for each service that are active users
        foreach ($clientServices as $service) {
            if ($service['state'] == 1 && $service['serviceDB'] != '') {
                $servicesArray[$service['clientServiceId']] = $service['serviceId'];
            }
        }
        // get all services
        $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');
        $view = Zikula_View::getInstance('Agoraportal', false);
        foreach ($servicesArray as $service) {
            if ($services[$service]['serviceName'] == 'moodle') {
                $view->assign('moodle', 1);
            }
            if ($services[$service]['serviceName'] == 'intranet') {
                $view->assign('intranet', 1);
            }
        }
        $view->assign('user', $user);
        $view->assign('userRow', $userRow);
        $view->assign('clientCode', $clientCode);
        $view->assign('isAdmin', $isAdmin);
        $content = $view->fetch('agoraportal_user_importCreateUsersUpdateRow.tpl');
        AjaxUtil::output(array('userRow' => $userRow,
            'content' => $content));
    }
*/
    /**
     * get all users list
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of users for a client
     */
/*
     public function usersList($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_COMMENT)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $clientCode = FormUtil::getPassedValue('clientCode', -1, 'GET');
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            $isAdmin = true;
        }
        $letter = FormUtil::getPassedValue('letter', -1, 'GET');
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $content = ModUtil::func('Agoraportal', 'user', 'usersListContent', array('init' => $init,
                    'clientCode' => $clientCode,
                    'letter' => $letter));
        AjaxUtil::output(array('content' => $content));
    }

    public function deleteUser($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADD)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $clientCode = FormUtil::getPassedValue('clientCode', -1, 'GET');
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        $uid = FormUtil::getPassedValue('uid', -1, 'GET');
        if ($uid == -1) {
            AjaxUtil::error('no user found');
        }
        // get user
        $user = ModUtil::apiFunc('Agoraportal', 'user', 'getUser', array('clientCode' => $clientCode,
                    'userId' => $uid));
        if ($user) {
//		return false;
        }
        //TODO: delete users from services
        // get client services
        // delete user from services
        // delete user from users database
        ModUtil::apiFunc('Agoraportal', 'user', 'deleteUser', array('userId' => $uid,
            'clientCode' => $clientCode));
        // log the user deletion
        ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('clientCode' => $clientCode,
            'actionCode' => 2,
            'action' => __f('S\'ha deixat l\'usuari/ària %s com a desconnectat', $user['uname'])));

        AjaxUtil::output(array('uid' => $uid));
    }
*/
    public function editService($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $serviceId = FormUtil::getPassedValue('serviceId', -1, 'GET');
        if ($serviceId == -1) {
            AjaxUtil::error('no service found');
        }
        // get service
        $service = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices', array('serviceId' => $serviceId));

        global $agora;
        $service[$serviceId]['tablesPrefix'] = (isset($agora[$service[$serviceId]['serviceName']]['prefix'])) ? $agora[$service[$serviceId]['serviceName']]['prefix'] : '';
        $service[$serviceId]['serverFolder'] = (isset($agora[$service[$serviceId]['serviceName']]['datadir'])) ? $agora[$service[$serviceId]['serviceName']]['datadir'] : '';


        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('service', $service[$serviceId]);
        $content = $view->fetch('agoraportal_admin_editServiceRow.tpl');
        AjaxUtil::output(array('serviceId' => $serviceId,
            'content' => $content));
    }

    public function updateService($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $serviceId = FormUtil::getPassedValue('serviceId', -1, 'GET');
        if ($serviceId == -1)
            AjaxUtil::error('no service found');
        $serviceName = FormUtil::getPassedValue('serviceName', -1, 'GET');
        if ($serviceName == -1)
            AjaxUtil::error('no service name');
        $description = FormUtil::getPassedValue('description', -1, 'GET');
        $version = FormUtil::getPassedValue('version', -1, 'GET');
        if ($version == -1)
            AjaxUtil::error('no service version');
        $allowedClients = FormUtil::getPassedValue('allowedClients', -1, 'GET');
        $defaultDiskSpace = FormUtil::getPassedValue('defaultDiskSpace', -1, 'GET');
        $service = array('serviceName' => $serviceName,
            'description' => $description,
            'version' => $version,
            'allowedClients' => $allowedClients,
            'defaultDiskSpace' => $defaultDiskSpace);
        // update information in database
        $updated = ModUtil::apiFunc('Agoraportal', 'admin', 'updateService', array('serviceId' => $serviceId,
                    'service' => $service));
        if (!$updated) {
            AjaxUtil::error('error updating service');
        }
        global $agora;
        $service['tablesPrefix'] = (isset($agora[$service['serviceName']]['prefix'])) ? $agora[$service['serviceName']]['prefix'] : '';
        $service['serverFolder'] = (isset($agora[$service['serviceName']]['datadir'])) ? $agora[$service['serviceName']]['datadir'] : '';

        // reload row table
        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('service', $service);
        $view->assign('serviceId', $serviceId);
        $content = $view->fetch('agoraportal_admin_updateServiceRow.tpl');
        AjaxUtil::output(array('serviceId' => $serviceId,
            'content' => $content));
    }

    /**
     * get all services list
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:  Filer parameters
     * @return:	The list of available services
     */
    public function sitesList($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $typeId = FormUtil::getPassedValue('typeId', -1, 'GET');
        $location = FormUtil::getPassedValue('location', -1, 'GET');
        $search = FormUtil::getPassedValue('search', -1, 'GET');
        $searchText = FormUtil::getPassedValue('searchText', -1, 'GET');
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $rpp = FormUtil::getPassedValue('rpp', -1, 'GET');
        $content = ModUtil::func('Agoraportal', 'user', 'sitesListContent', array('init' => $init,
                    'location' => $location,
                    'typeId' => $typeId,
                    'search' => $search,
                    'searchText' => $searchText,
                    'rpp' => $rpp));
        AjaxUtil::output(array('content' => $content));
    }

    /**
     * get the clients who have the three first leters like the parameter
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   value to search for
     * @return:	A list of clients
     */
    public function autocompleteClient($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
        }
        $value = FormUtil::getPassedValue('value', -1, 'GET');
        $clientsString = '';

        //Get the client Name
        $clients = ModUtil::apiFunc('Agoraportal', 'user', 'getClientMainInfo', array('clientDNS' => $value));
        foreach ($clients as $client) {
            $clientsString .= "<div><a style=\"cursor: pointer;\" onclick=\"addClient('" . $client['clientDNS'] . "')\">" . $client['clientDNS'] . "</a></div>";
        }

        AjaxUtil::output(array('clients' => $clientsString));
    }

    /**
     * take all parameters from javascript function and launch "logsContent" PHP function
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  logs parameters
     * @return: all logs that satisfy the parameters
     */
    public function logs($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_COMMENT)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $actionCode = FormUtil::getPassedValue('actionCode', -1, 'GET');
        $fromDate = FormUtil::getPassedValue('fromDate', isset($args['fromDate']) ? $args['fromDate'] : null, 'GET');
        $toDate = FormUtil::getPassedValue('toDate', isset($args['toDate']) ? $args['toDate'] : null, 'GET');
        $uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : null, 'GET');
        $pag = FormUtil::getPassedValue('pag', isset($args['pag']) ? $args['pag'] : 1, 'GET');
        $content = ModUtil::func('Agoraportal', 'user', 'logsContent', array('init' => $init,
                    'actionCode' => $actionCode,
                    'fromDate' => $fromDate,
                    'toDate' => $toDate,
                    'uname' => $uname,
                    'pag' => $pag));

        AjaxUtil::output(array('content' => $content));
    }

    /**
     * Save, overwrite or delete SQL comands in the database
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  comand, description and action
     * @return: result of the action
     */
    public function sqlComandsUpdate($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $serviceId = FormUtil::getPassedValue('serviceId', isset($args['serviceId']) ? $args['serviceId'] : 2, 'GETPOST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'GETPOST');
        $comand = FormUtil::getPassedValue('comand', isset($args['comand']) ? $args['comand'] : null, 'GETPOST');
        $comandId = FormUtil::getPassedValue('comandId', isset($args['comandId']) ? $args['comandId'] : null, 'GETPOST');
        $action = FormUtil::getPassedValue('action', isset($args['action']) ? $args['action'] : null, 'GETPOST');
        $comand_type = FormUtil::getPassedValue('comand_type', isset($args['comand_type']) ? $args['comand_type'] : 0, 'GETPOST');

        $where = "WHERE `comandId`=" . $comandId;

        if ($action == '1') {
            $obj = array('serviceId' => $serviceId,
                'comand' => $comand,
                'description' => $description,
                'type' => $comand_type);
            if (!DBUtil::insertObject($obj, 'agoraportal_mysql_comands')) {
                $msg = '<span style="color:red;">' . $this->__('No s\'ha pogut desar la nova comanda') . '</span>';
            } else {
                $msg = '<span style="color:green;">' . $this->__('S\'ha desat correctament la nova comanda') . '</span>';
            }
        } else if ($action == '2') {
            if (!DBUtil::deleteWhere('agoraportal_mysql_comands', $where)) {
                $msg = '<span style="color:red;">' . $this->__('No s\'ha pogut eliminar la comanda') . '</span>';
            } else {
                $msg = '<span style="color:green;">' . $this->__('La comanda s\'ha eliminat correctament') . '</span>';
            }
        } else if ($action == '3') {
            $obj = array('comand' => $comand,
                'description' => $description,
                'type' => $comand_type);
            if (!DBUtil::updateObject($obj, 'agoraportal_mysql_comands', $where)) {
                $msg = '<span style="color:red;">' . $this->__('No s\'ha pogut modificat la comanda') . '</span>';
            } else {
                $msg = '<span style="color:green;">' . $this->__('La comanda s\'ha modificat correctament') . '</span>';
            }
        }

        $comands = ModUtil::func('Agoraportal', 'admin', 'sqlComandList', array('serviceId' => $serviceId,
                    'comand_type' => $comand_type));

        AjaxUtil::output(array('content' => $comands,
            'action' => $action,
            'msg' => $msg,
            'comand_type' => $comand_type));
    }

    /**
     * update the SQL comand form with the value of the selected option
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  comand ID
     * @return: content of the form
     */
    public function sqlFunctionUpdate($args) {

        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $action = FormUtil::getPassedValue('action', isset($args['action']) ? $args['action'] : null, 'GETPOST');
        $comandId = FormUtil::getPassedValue('comandId', isset($args['comandId']) ? $args['comandId'] : null, 'GETPOST');
        $where = 'WHERE `comandId`=' . $comandId;
        $content = DBUtil::selectObjectArray('agoraportal_mysql_comands', $where);
        $comand = $content['0']['comand'];
        $description = $content['0']['description'];
        $comand_type = $content['0']['type'];

        AjaxUtil::output(array('comand' => $comand,
            'description' => $description,
            'comand_type' => $comand_type,
            'action' => $action,
            'comandId' => $comandId));
    }

    /**
     * Build a dropdown menu with the services the client has
     * 
     * @author Aida Regi
     * @param int $requestTypeId
     */
    public function getRequestServices($args) {
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', -1, 'GET');

        $services = ModUtil::func('Agoraportal', 'user', 'getRequestServices', array('requestTypeId' => $requestTypeId));

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('services', $services);

        $content = $view->fetch('agoraportal_user_requestsMenuServices.tpl');

        AjaxUtil::output(array('content' => $content));
    }

    /**
     * @author Aida Regi
     * @param type $args 
     */
    public function requestsList($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = FormUtil::getPassedValue('service', -1, 'GET');
        $stateFilter = FormUtil::getPassedValue('stateFilter', -1, 'GET');
        $search = FormUtil::getPassedValue('search', -1, 'GET');
        $searchText = trim(FormUtil::getPassedValue('searchText', -1, 'GET'));
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $order = FormUtil::getPassedValue('order', -1, 'GET');
        $rpp = FormUtil::getPassedValue('rpp', -1, 'GET');

        $stateString = serialize(array('init' => $init,
            'service' => $service,
            'stateFilter' => $stateFilter,
            'search' => $search,
            'searchText' => $searchText,
            'rpp' => $rpp));

        SessionUtil::setVar('navStateRequests', $stateString);

        $content = ModUtil::func('Agoraportal', 'admin', 'requestsListContent', array('init' => $init,
                    'service' => $service,
                    'stateFilter' => $stateFilter,
                    'search' => $search,
                    'order' => $order,
                    'searchText' => $searchText,
                    'rpp' => $rpp));

        AjaxUtil::output(array('content' => $content));
    }

    /**
     * Get HTML to be shown to user. It can be a message for the user or a part
     *   of a form
     * 
     * @author Toni Ginard
     * 
     * @param int serviceId
     * @param int requestId
     * @param string clientCode
     * 
     */
    public function getRequestMessage($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $serviceId = FormUtil::getPassedValue('serviceId', '', 'GET');
        $requestTypeId = FormUtil::getPassedValue('requestTypeId', '', 'GET');
        $clientCode = FormUtil::getPassedValue('clientCode', '', 'GET');

        if (empty($serviceId) || empty($requestTypeId) || empty($clientCode)) {
            return false;
        }

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('requestTypeId', $requestTypeId);

        // Get info about the type of request
        $requestTypes = ModUtil::apiFunc('Agoraportal', 'user', 'getRequestTypes', array('requestTypeId' => $requestTypeId));

        // Process request (1 = quota, 2 = admin pass)
        switch ($requestTypeId) {
            case '1':
                // Check if user has exceeded disk request threshold
                $thresholdExceeded = ModUtil::apiFunc('Agoraportal', 'user', 'checkDiskRequestThreshold', array('serviceId' => $serviceId,
                            'clientCode' => $clientCode));
                $view->assign('thresholdExceeded', $thresholdExceeded);
                $view->assign('diskRequestThreshold', $this->getVar('diskRequestThreshold'));
                $view->assign('maxFreeQuotaForRequest', $this->getVar('maxFreeQuotaForRequest'));

            default :
                $view->assign('info', $requestTypes['0']);
                break;
        }

        $content = $view->fetch('agoraportal_user_requestsUserMessage.tpl');

        AjaxUtil::output(array('content' => $content));
    }

    public function deleteFileM2x($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_COMMENT)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $filename = FormUtil::getPassedValue('filename', '', 'GET');
        $clientCode = FormUtil::getPassedValue('clientCode', '', 'GET');
        
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
        // remove file
        global $agora;
        $activedId = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientInfo['client'][$clientCode]['clientId'], 'serviceName' => 'moodle2'));
        $folder = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle2']['username'] . $activedId['activedId'] . '/repository/files/';
        if (unlink($folder . $filename)) {
            // create log in action table
            //Resgister log 
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('action' => $this->__f('S\'ha esborrat el fitxer \'%s\' del repository \'Fitxers\' de Moodle', array($filename)),
                'actionCode' => 3,
                'clientCode' => $clientCode));
        }
        AjaxUtil::output(array('filename' => $filename));
    }

    public function deleteFileM19($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_COMMENT)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $filename = FormUtil::getPassedValue('filename', '', 'GET');
        $courseId = FormUtil::getPassedValue('courseId', '', 'GET');
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode');
        $clientCode = $clientInfo['clientCode'];
        // remove file
        global $agora;
        $activedId = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientInfo['client'][$clientCode]['clientId'], 'serviceName' => 'moodle'));
        $folder = $agora['server']['root'] . $agora['moodle']['datadir'] . $agora['moodle']['username'] . $activedId['activedId'] . '/' . $courseId . '/backupdata/';

        if (unlink($folder . $filename)) {
            // create log in action table
            //Resgister log 
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('action' => $this->__f('S\'ha esborrat el fitxer \'%s\' de Moodle', array($filename)),
                'actionCode' => 3,
                'clientCode' => $clientCode));
        }
        AjaxUtil::output(array('filename' => $filename,
            'courseId' => $courseId));
    }

    public function moveFileToM2x($args) {
        if (!SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_COMMENT)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $filename = FormUtil::getPassedValue('filename', '', 'GET');
        $courseId = FormUtil::getPassedValue('courseId', '', 'GET');
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode');
        $clientCode = $clientInfo['clientCode'];
        // remove file
        global $agora;
        $clientService = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientInfo['client'][$clientCode]['clientId'], 'serviceName' => 'moodle'));
        $clientService2 = ModUtil::apiFunc('Agoraportal', 'user', 'getClientService', array('clientId' => $clientInfo['client'][$clientCode]['clientId'], 'serviceName' => 'moodle2'));
        $origin = $agora['server']['root'] . $agora['moodle']['datadir'] . $agora['moodle']['username'] . $clientService['activedId'] . '/' . $courseId . '/backupdata/';
        $destination = $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle2']['username'] . $clientService2['activedId'] . '/repository/files/';

        $moved = rename($origin . $filename, $destination . $filename);
        if ($moved) {
            // create log in action table
            //Resgister log 
            ModUtil::apiFunc('Agoraportal', 'user', 'addLog', array('action' => $this->__f('S\'ha mogut el fitxer \'%s\' de Moodle 1.9 a Moodle 2.x', array($filename)),
                'actionCode' => 3,
                'clientCode' => $clientCode));
            $result = 'Mogut';
        } else {
            $result = 'Error';
            
        }
        AjaxUtil::output(array('filename' => $filename,
            'courseId' => $courseId,
            'result' =>$result,
        ));
    }

}