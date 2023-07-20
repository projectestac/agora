<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

class Agoraportal_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    public function listServices() {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $rpp = FormUtil::getPassedValue('rpp', -1, 'GET');
        $service = FormUtil::getPassedValue('service', -1, 'GET');
        $stateFilter = FormUtil::getPassedValue('stateFilter', -1, 'GET');
        $search = FormUtil::getPassedValue('search', -1, 'GET');
        $searchText = FormUtil::getPassedValue('searchText', -1, 'GET');
        $order = FormUtil::getPassedValue('order', -1, 'GET');

        $args = array('init' => $init,
            'service' => $service,
            'stateFilter' => $stateFilter,
            'order' => $order,
            'search' => $search,
            'searchText' => $searchText,
            'rpp' => $rpp
        );

        SessionUtil::setVar('serviceList', serialize($args));
        $content = ModUtil::func('Agoraportal', 'admin', 'listServicesContent', $args);

        AjaxUtil::output(array('content' => $content));
    }

    public function getServiceActions() {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = FormUtil::getPassedValue('service', 0, 'GET');
        $content = ModUtil::func('Agoraportal', 'admin', 'getServiceActions', array('service' => $service));
        AjaxUtil::output(array('content' => $content));
    }

    public function getServiceStats() {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = FormUtil::getPassedValue('service', 0, 'GET');
        $content = Stats::getServiceStats($service);
        AjaxUtil::output(array('content' => $content));
    }

    public function filter_listServices() {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $service = FormUtil::getPassedValue('service', 4, 'GET');
        $serviceName = FormUtil::getPassedValue('serviceName', '', 'GET');
        $search = FormUtil::getPassedValue('search', -1, 'GET');
        $searchText = FormUtil::getPassedValue('searchText', -1, 'GET');
        $which = FormUtil::getPassedValue('which', "selected", 'POST');
        $order = FormUtil::getPassedValue('order', 1, 'GET');
        $pilot = FormUtil::getPassedValue('pilot', 0, 'GET');
        $include = FormUtil::getPassedValue('include', 1, 'GET');
        $clients = FormUtil::getPassedValue('clients', '', 'GET');

        $content = ModUtil::func('Agoraportal', 'admin', 'filter_listServices', array(
            'init' => $init,
            'service_sel' => $service,
            'serviceName' => $serviceName,
            'search' => $search,
            'searchText' => $searchText,
            'which' => $which,
            'order' => $order,
            'pilot' => $pilot,
            'include' => $include,
            'clients_sel' => explode(',', $clients)
            )
        );

        AjaxUtil::output(array('content' => $content));
    }

    public function statsGetStatistics() {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $stats = FormUtil::getPassedValue('stats', 1, 'GET');
        $service = FormUtil::getPassedValue('service', 1, 'GET');
        $which = FormUtil::getPassedValue('which', "all", 'GET');
        $date_start = FormUtil::getPassedValue('date_start', 0, 'GET');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'GET');
        $clients = FormUtil::getPassedValue('clients', '', 'GET');
        $orderby = FormUtil::getPassedValue('orderby', '', 'GET');
        $content = ModUtil::func('Agoraportal', 'admin', 'statsGetStatisticsContent', array(
                    'stats' => $stats,
                    'service' => $service,
                    'which' => $which,
                    'date_start' => $date_start,
                    'date_stop' => $date_stop,
                    'clients' => $clients,
                    'orderby' => $orderby));
        AjaxUtil::output(array('content' => $content));
    }

    public function statsGetGraphs($args) {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $stats = FormUtil::getPassedValue('stats', 1, 'GET');
        $service = FormUtil::getPassedValue('service', 1, 'GET');
        $which = FormUtil::getPassedValue('which', "all", 'GET');
        $date_start = FormUtil::getPassedValue('date_start', 0, 'GET');
        $date_stop = FormUtil::getPassedValue('date_stop', 0, 'GET');
        $clients = FormUtil::getPassedValue('clients', '', 'GET');
        $totals = FormUtil::getPassedValue('totals', false, 'GET');
        $column = FormUtil::getPassedValue('column', false, 'GET');

        $content = ModUtil::func('Agoraportal', 'admin', 'statsGetGraphsContent', array(
                    'stats' => $stats,
                    'service' => $service,
                    'which' => $which,
                    'date_start' => $date_start,
                    'date_stop' => $date_stop,
                    'clients' => $clients,
                    'totals' => $totals,
                    'column' => $column));

        AjaxUtil::output(array('content' => $content));
    }

    public function statsGetCSV($args) {

        if (!AgoraPortal_Util::isAdmin()) {
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
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $rpp = FormUtil::getPassedValue('rpp', 15, 'GET');
        $search = FormUtil::getPassedValue('search', "", 'GET');
        $searchText = FormUtil::getPassedValue('searchText', "", 'GET');
        $init = FormUtil::getPassedValue('init', -1, 'GET');

        $args = array('init' => $init,
            'search' => $search,
            'searchText' => $searchText,
            'rpp' => $rpp
        );
        SessionUtil::setVar('clientsList', serialize($args));

        $content = ModUtil::func('Agoraportal', 'admin', 'clientsListContent', $args);
        AjaxUtil::output(array('content' => $content));
    }

    public function editService($args) {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $serviceId = FormUtil::getPassedValue('serviceId', -1, 'GET');
        $servicetype = ServiceType::get_by_id($serviceId);
        if (!$servicetype) {
            AjaxUtil::error('no service found');
        }

        $extra = new StdClass();
        $extra->tablesPrefix = $servicetype->getTablePrefix();

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('service', $servicetype);
        $view->assign('extra', $extra);
        $content = $view->fetch('agoraportal_admin_config_editServiceRow.tpl');
        AjaxUtil::output(array('serviceId' => $serviceId, 'content' => $content));
    }

    public function updateService($args) {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $serviceId = FormUtil::getPassedValue('serviceId', -1, 'GET');
        $servicetype = ServiceType::get_by_id($serviceId);
        if (!$servicetype) {
            AjaxUtil::error('Service not found');
        }

        $serviceName = FormUtil::getPassedValue('serviceName', false, 'GET');
        if (!$serviceName) {
            AjaxUtil::error('No service name');
        }
        $servicetype->serviceName = $serviceName;
        $servicetype->URL = FormUtil::getPassedValue('URL', "", 'GET');
        $servicetype->description = FormUtil::getPassedValue('description', "", 'GET');

        $servicetype->hasDB = FormUtil::getPassedValue('hasDB', false, 'GET');
        $servicetype->allowedClients = FormUtil::getPassedValue('allowedClients', "", 'GET');
        $servicetype->defaultDiskSpace = FormUtil::getPassedValue('defaultDiskSpace', 0, 'GET');

        $updated = $servicetype->save();

        if (!$updated) {
            AjaxUtil::error('Error updating service');
        }

        $extra = new StdClass();
        $extra->tablesPrefix = $servicetype->getTablePrefix();

        // reload row table
        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('service', $servicetype);
        $view->assign('extra', $extra);
        $content = $view->fetch('agoraportal_admin_config_serviceRow.tpl');
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

        if (!AgoraPortal_Util::isUser()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $content = ModUtil::func('Agoraportal', 'user', 'sitesListContent', $args);
        AjaxUtil::output(array('content' => $content));
    }

    /**
     * take all parameters from javascript function and launch "logsContent" PHP function
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  logs parameters
     * @return: all logs that satisfy the parameters
     */
    public function logs($args) {
        if (!AgoraPortal_Util::isClient()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $init = FormUtil::getPassedValue('init', -1, 'GET');
        $actionCode = FormUtil::getPassedValue('actionCode', -1, 'GET');
        $fromDate = FormUtil::getPassedValue('fromDate', null, 'GET');
        $toDate = FormUtil::getPassedValue('toDate', null, 'GET');
        $uname = FormUtil::getPassedValue('uname', null, 'GET');
        $pag = FormUtil::getPassedValue('pag', 1, 'GET');
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

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $serviceId = FormUtil::getPassedValue('serviceId', 2, 'GETPOST');
        $description = FormUtil::getPassedValue('description', null, 'GETPOST');
        $comand = FormUtil::getPassedValue('comand', null, 'GETPOST');
        $comandId = FormUtil::getPassedValue('comandId', null, 'GETPOST');
        $action = FormUtil::getPassedValue('action', null, 'GETPOST');
        $comand_type = FormUtil::getPassedValue('comand_type', 0, 'GETPOST');

        $msg = "";
        switch($action) {
            case 'insert':

                $obj = array('serviceId' => $serviceId,
                    'comand' => $comand,
                    'description' => $description,
                    'type' => $comand_type);
                $sql = SQLCommand::create($obj);
                if (!$sql) {
                    $msg = '<span class="alert alert-danger">' . $this->__('No s\'ha pogut desar la nova comanda') . '</span>';
                } else {
                    $msg = '<span class="alert alert-success">' . $this->__('S\'ha desat correctament la nova comanda') . '</span>';
                }
                break;
            case 'delete':
                if (!SQLCommand::delete($comandId)) {
                    $msg = '<span class="alert alert-danger">' . $this->__('No s\'ha pogut eliminar la comanda') . '</span>';
                } else {
                    $msg = '<span class="alert alert-success">' . $this->__('La comanda s\'ha eliminat correctament') . '</span>';
                }
                break;
            case 'update':
                $sql = SQLCommand::get_by_id($comandId);
                if (!$sql) {
                    $msg = '<span class="alert alert-danger">' . $this->__('La comanda no existeix') . ' </span > ';
                } else {
                    $sql->comand = $comand;
                    $sql->description = $description;
                    $sql->type = $comand_type;
                    if (!$sql->save()) {
                        $msg = ' < span class="alert alert-danger" > ' . $this->__('No s\'ha pogut modificat la comanda') . '</span>';
                    } else {
                        $msg = '<span class="alert alert-success">' . $this->__('La comanda s\'ha modificat correctament') . '</span>';
                    }
                }
                break;
        }

        $comands = ModUtil::func('Agoraportal', 'admin', 'sqlComandList', array('serviceId' => $serviceId, 'comand_type' => $comand_type));

        AjaxUtil::output(array('content' => $comands,
            'action' => $action,
            'msg' => $msg,
            'comand_type' => $comand_type));
    }

    /**
     * Save, overwrite or delete SQL comands in the database
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  comand, description and action
     * @return: result of the action
     */
    public function sqlCommandsUpdateTab() {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $serviceId = FormUtil::getPassedValue('serviceId', 2, 'GETPOST');
        $commandtype = FormUtil::getPassedValue('commandtype', 'all', 'GETPOST');
        $args = array('serviceId' => $serviceId, 'comand_type' => $commandtype);
        $content = ModUtil::func('Agoraportal', 'admin', 'sqlComandList', $args);

        AjaxUtil::output(array('content' => $content, 'commandtype' => $commandtype));
    }

    /**
     * update the SQL comand form with the value of the selected option
     * @author: Fèlix Casanellas (fcasanel@xtec.cat)
     * @param:  comand ID
     * @return: content of the form
     */
    public function sqlFunctionUpdate($args) {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $commandId = FormUtil::getPassedValue('commandId', null, 'GETPOST');
        $action = FormUtil::getPassedValue('action', null, 'GETPOST');
        $command = SQLCommand::get_by_id($commandId);

        AjaxUtil::output(array(
            'command' => $command->comand,
            'description' => $command->description,
            'type' => $command->type,
            'commandId' => $commandId,
            'action' => $action));
    }

    public function requestsList() {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = FormUtil::getPassedValue('service', -1, 'GETPOST');
        $stateFilter = FormUtil::getPassedValue('stateFilter', -1, 'GETPOST');
        $search = FormUtil::getPassedValue('search', -1, 'GETPOST');
        $searchText = trim(FormUtil::getPassedValue('searchText', -1, 'GETPOST'));
        $init = FormUtil::getPassedValue('init', -1, 'GETPOST');
        $order = FormUtil::getPassedValue('order', -1, 'GETPOST');
        $rpp = FormUtil::getPassedValue('rpp', -1, 'GETPOST');

        $args = array(
            'init' => $init,
            'service' => $service,
            'stateFilter' => $stateFilter,
            'search' => $search,
            'searchText' => $searchText,
            'order' => $order,
            'rpp' => $rpp);

        SessionUtil::setVar('requestsList', serialize($args));
        $content = ModUtil::func('Agoraportal', 'admin', 'requestsListContent', $args);

        AjaxUtil::output(array('content' => $content));
    }

    /**
     * Get HTML to be shown to user. It can be a message for the user or a part of a form
     *
     * @param int serviceId
     * @param int requestId
     * @param string clientCode
     *
     * @throws Zikula_Exception_Forbidden
     * @author Toni Ginard
     */
    public function getRequestMessage($args) {
        if (!AgoraPortal_Util::isUser()) {
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
        $requestType = RequestType::get_by_id($requestTypeId);
        $view->assign('info', $requestType);

        // Process request (1 = quota)
        if ($requestTypeId == '1') {
            $client = Client::get_by_code($clientCode);
            // Get service data
            $service = $client->get_service_by_id($serviceId, 1);
            // Check if quota usage exceeds disk request threshold
            $thresholdExceeded = $service->is_quota_exceeded();

            $view->assign('thresholdExceeded', $thresholdExceeded);
            $view->assign('diskRequestThreshold', $this->getVar('diskRequestThreshold'));
            $view->assign('maxFreeQuotaForRequest', $this->getVar('maxFreeQuotaForRequest'));
        }

        $content = $view->fetch('agoraportal_user_requestsUserMessage.tpl');

        AjaxUtil::output(array('content' => $content));
    }

    public function deleteFileM2x($args) {
        if (!AgoraPortal_Util::isClient()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $filename = FormUtil::getPassedValue('filename', '', 'GET');
        $basename = basename($filename);

        $clientCode = FormUtil::getPassedValue('clientCode', '', 'GET');
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        if(!$clientCode) {
            throw new Zikula_Exception_Forbidden();
        }

        $client = Client::get_by_code($clientCode);
        // Removal of file or dir
        if (is_dir($filename)) {
            if ($this->is_dir_empty($filename)) {
                rmdir($filename);
                // Register log
                $client->add_log(ClientLog::CODE_DELETE, $this->__f('S\'ha esborrat el directori \'%s\' del repository \'Fitxers\' de Moodle', array($basename)));
            } else {
                AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No es pot esborrar aquesta carpeta perquè no està buida.')));
            }
        } else {
            unlink($filename);
            $client->add_log(ClientLog::CODE_DELETE, $this->__f('S\'ha esborrat el fitxer \'%s\' del repository \'Fitxers\' de Moodle', array($basename)));
        }

        AjaxUtil::output(array('name' => $basename));
    }

    private function is_dir_empty($dir) {
        if (!is_readable($dir)) {
            return null;
        }
        return (count(scandir($dir)) == 2);
    }

    public function showOperationLog($args) {
        AgoraPortal_Util::requireAdmin();

        $logid = FormUtil::getPassedValue('log', -1, 'GET');
        return Agora_Queues_Operation::get_log_by_id($logid);
    }

    public function changeOperationPriority($args) {
        AgoraPortal_Util::requireAdmin();

        $opid = FormUtil::getPassedValue('operation', false, 'GET');
        $newpriority = FormUtil::getPassedValue('newpriority', false, 'GET');
        if($opid === false || $newpriority === false) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No s\'han rebut dades')));
        }

        $operation = Agora_Queues_Operation::get_operation_by_id($opid);
        if (!$operation) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No s\'han trobat la operació')));
        }

        $newpriority = $operation->changePriority($newpriority);
        if ($newpriority === false) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('La operació no està en Pendent')));
        }

        return $newpriority;
    }

    public function executeOperationId($args) {
        AgoraPortal_Util::requireAdmin();
        $opid = FormUtil::getPassedValue('operation', -1, 'GET');

        $operation = Agora_Queues_Operation::get_operation_by_id($opid);
        if ($operation) {
            $operation->execute();
            return $operation->get_message();
        }
        return false;
    }

    public function changeStateOperationId($args) {
        AgoraPortal_Util::requireAdmin();

        $opid = FormUtil::getPassedValue('operation', -1, 'GET');
        $state = FormUtil::getPassedValue('state', false, 'GET');

        $operation = Agora_Queues_Operation::get_operation_by_id($opid);
        if ($operation) {
            return $operation->changeState($state);
        }
        return false;
    }

    public function deleteOperationId($args) {
        AgoraPortal_Util::requireAdmin();

        $opid = FormUtil::getPassedValue('operation', -1, 'GET');
        return Agora_Queues_Operation::delete($opid);
    }

}