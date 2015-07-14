<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

class Agoraportal_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    public function servicesList($args) {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $init = AgoraPortal_Util::getFormVar($args, 'init', -1, 'GET');
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', -1, 'GET');
        $service = AgoraPortal_Util::getFormVar($args, 'service', -1, 'GET');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', -1, 'GET');
        $search = AgoraPortal_Util::getFormVar($args, 'search', -1, 'GET');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', -1, 'GET');
        $order = AgoraPortal_Util::getFormVar($args, 'order', -1, 'GET');

        $args = array('init' => $init,
            'service' => $service,
            'stateFilter' => $stateFilter,
            'order' => $order,
            'search' => $search,
            'searchText' => $searchText,
            'rpp' => $rpp
        );
        SessionUtil::setVar('serviceList', serialize($args));

        $content = ModUtil::func('Agoraportal', 'admin', 'servicesListContent', $args);
        AjaxUtil::output(array('content' => $content));
    }

    public function getServiceActions($args) {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = AgoraPortal_Util::getFormVar($args, 'service', 0, 'GET');
        $content = ModUtil::func('Agoraportal', 'admin', 'getServiceActions', array('service' => $service));
        AjaxUtil::output(array('content' => $content));
    }

    public function getServiceStats($args) {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = AgoraPortal_Util::getFormVar($args, 'service', 0, 'GET');
        $content = Stats::getServiceStats($service);
        AjaxUtil::output(array('content' => $content));
    }

    public function filter_servicesList($args) {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = AgoraPortal_Util::getFormVar($args, 'service', -1, 'GET');
        $serviceName = AgoraPortal_Util::getFormVar($args, 'serviceName', -1, 'GET');
        $search = AgoraPortal_Util::getFormVar($args, 'search', -1, 'GET');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', -1, 'GET');
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1, 'GET');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "selected", 'GET');
        $order = AgoraPortal_Util::getFormVar($args, 'order', 1, 'GET');
        $pilot = AgoraPortal_Util::getFormVar($args, 'pilot', 0, 'GET');
        $include = AgoraPortal_Util::getFormVar($args, 'include', 1, 'GET');
        $clients = AgoraPortal_Util::getFormVar($args, 'clients', '', 'GET');
        $content = ModUtil::func('Agoraportal', 'admin', 'filter_servicesList', array('init' => $init,
                    'service_sel' => $service,
                    'serviceName' => $serviceName,
                    'search' => $search,
                    'searchText' => $searchText,
                    'order' => $order,
                    'pilot' => $pilot,
                    'include' => $include,
                    'clients_sel' => explode(',',$clients)));
        AjaxUtil::output(array('content' => $content));
    }

    public function statsGetStatistics($args) {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $stats = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'GET');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 1, 'GET');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GET');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', 0, 'GET');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GET');
        $clients = AgoraPortal_Util::getFormVar($args, 'clients', '', 'GET');
        $orderby = AgoraPortal_Util::getFormVar($args, 'orderby', '', 'GET');
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
        $stats = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'GET');
        $service = AgoraPortal_Util::getFormVar($args, 'service', 1, 'GET');
        $which = AgoraPortal_Util::getFormVar($args, 'which', "all", 'GET');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', 0, 'GET');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GET');
        $clients = AgoraPortal_Util::getFormVar($args, 'clients', '', 'GET');
        $totals = AgoraPortal_Util::getFormVar($args, 'totals', false, 'GET');
        $column = AgoraPortal_Util::getFormVar($args, 'column', false, 'GET');

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
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1, 'GET');
        $stats = AgoraPortal_Util::getFormVar($args, 'stats', 1, 'GET');
        $which = AgoraPortal_Util::getFormVar($args, 'which', 'all', 'GET');
        $date_start = AgoraPortal_Util::getFormVar($args, 'date_start', 0, 'GET');
        $date_stop = AgoraPortal_Util::getFormVar($args, 'date_stop', 0, 'GET');
        $clients = AgoraPortal_Util::getFormVar($args, 'clients', '', 'GET');
        $orderby = AgoraPortal_Util::getFormVar($args, 'orderby', '', 'GET');

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

        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', 15, 'GET');
        $search = AgoraPortal_Util::getFormVar($args, 'search', "", 'GET');
        $searchText = AgoraPortal_Util::getFormVar($args, 'searchText', "", 'GET');
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1, 'GET');

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
        $serviceId = AgoraPortal_Util::getFormVar($args, 'serviceId', -1, 'GET');
        $servicetype = ServiceType::get_by_id($serviceId);
        if (!$servicetype) {
            AjaxUtil::error('no service found');
        }

        $extra = new StdClass();
        $extra->serverFolder = $servicetype->getDataDirectory();
        $extra->validFolder = is_dir($servicetype->getParentDataDirectory());
        $extra->tablesPrefix = $servicetype->getTablePrefix();

        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('service', $servicetype);
        $view->assign('extra', $extra);
        $content = $view->fetch('config_editServiceRow.tpl');
        AjaxUtil::output(array('serviceId' => $serviceId, 'content' => $content));
    }

    public function updateService($args) {

        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $serviceId = AgoraPortal_Util::getFormVar($args, 'serviceId', -1, 'GET');
        $servicetype = ServiceType::get_by_id($serviceId);
        if (!$servicetype) {
            AjaxUtil::error('Service not found');
        }

        $serviceName = AgoraPortal_Util::getFormVar($args, 'serviceName', false, 'GET');
        if (!$serviceName) {
            AjaxUtil::error('No service name');
        }
        $servicetype->serviceName = $serviceName;
        $servicetype->URL = AgoraPortal_Util::getFormVar($args, 'URL', "", 'GET');
        $servicetype->description = AgoraPortal_Util::getFormVar($args, 'description', "", 'GET');

        $servicetype->hasDB = AgoraPortal_Util::getFormVar($args, 'hasDB', false, 'GET');
        $servicetype->allowedClients = AgoraPortal_Util::getFormVar($args, 'allowedClients', "", 'GET');
        $servicetype->defaultDiskSpace = AgoraPortal_Util::getFormVar($args, 'defaultDiskSpace', 0, 'GET');

        $updated = $servicetype->save();

        if (!$updated) {
            AjaxUtil::error('Error updating service');
        }

        $extra = new StdClass();
        $extra->serverFolder = $servicetype->getDataDirectory();
        $extra->validFolder = is_dir($servicetype->getParentDataDirectory());
        $extra->tablesPrefix = $servicetype->getTablePrefix();

        // reload row table
        $view = Zikula_View::getInstance('Agoraportal', false);
        $view->assign('service', $servicetype);
        $view->assign('extra', $extra);
        $content = $view->fetch('config_serviceRow.tpl');
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
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1, 'GET');
        $actionCode = AgoraPortal_Util::getFormVar($args, 'actionCode', -1, 'GET');
        $fromDate = AgoraPortal_Util::getFormVar($args, 'fromDate', null, 'GET');
        $toDate = AgoraPortal_Util::getFormVar($args, 'toDate', null, 'GET');
        $uname = AgoraPortal_Util::getFormVar($args, 'uname', null, 'GET');
        $pag = AgoraPortal_Util::getFormVar($args, 'pag', 1, 'GET');
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

        $serviceId = AgoraPortal_Util::getFormVar($args, 'serviceId', 2, 'GETPOST');
        $description = AgoraPortal_Util::getFormVar($args, 'description', null, 'GETPOST');
        $comand = AgoraPortal_Util::getFormVar($args, 'comand', null, 'GETPOST');
        $comandId = AgoraPortal_Util::getFormVar($args, 'comandId', null, 'GETPOST');
        $action = AgoraPortal_Util::getFormVar($args, 'action', null, 'GETPOST');
        $comand_type = AgoraPortal_Util::getFormVar($args, 'comand_type', 0, 'GETPOST');

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
    public function sqlCommandsUpdateTab($args) {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $serviceId = AgoraPortal_Util::getFormVar($args, 'serviceId', 2);
        $commandtype = AgoraPortal_Util::getFormVar($args, 'commandtype', 'all');
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
        $commandId = AgoraPortal_Util::getFormVar($args, 'commandId', null, 'GETPOST');
        $action = AgoraPortal_Util::getFormVar($args, 'action', null, 'GETPOST');
        $command = SQLCommand::get_by_id($commandId);

        AjaxUtil::output(array(
            'command' => $command->comand,
            'description' => $command->description,
            'type' => $command->type,
            'commandId' => $commandId,
            'action' => $action));
    }

    /**
     * @author Aida Regi
     * @param type $args
     */
    public function requestsList($args) {
        if (!AgoraPortal_Util::isAdmin()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }
        $service = AgoraPortal_Util::getFormVar($args, 'service', -1, 'GET');
        $stateFilter = AgoraPortal_Util::getFormVar($args, 'stateFilter', -1, 'GET');
        $search = AgoraPortal_Util::getFormVar($args, 'search', -1, 'GET');
        $searchText = trim(AgoraPortal_Util::getFormVar($args, 'searchText', -1, 'GET'));
        $init = AgoraPortal_Util::getFormVar($args, 'init', -1, 'GET');
        $order = AgoraPortal_Util::getFormVar($args, 'order', -1, 'GET');
        $rpp = AgoraPortal_Util::getFormVar($args, 'rpp', -1, 'GET');

        $args = array('init' => $init,
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
        if (!AgoraPortal_Util::isUser()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('No teniu autorització per accedir a aquest mòdul')));
        }

        $serviceId = AgoraPortal_Util::getFormVar($args, 'serviceId', '', 'GET');
        $requestTypeId = AgoraPortal_Util::getFormVar($args, 'requestTypeId', '', 'GET');
        $clientCode = AgoraPortal_Util::getFormVar($args, 'clientCode', '', 'GET');

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
            $service = $client->get_service_by_id($serviceId);
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
        $filename = AgoraPortal_Util::getFormVar($args, 'filename', '', 'GET');
        $basename = basename($filename);

        $clientCode = AgoraPortal_Util::getFormVar($args, 'clientCode', '', 'GET');
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

        $logid = AgoraPortal_Util::getFormVar($args, 'log', -1, 'GET');
        return Agora_Queues_Operation::get_log_by_id($logid);
    }

    public function changeOperationPriority($args) {
        AgoraPortal_Util::requireAdmin();

        $opid = AgoraPortal_Util::getFormVar($args, 'operation', false, 'GET');
        $newpriority = AgoraPortal_Util::getFormVar($args, 'newpriority', false, 'GET');
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
        $opid = AgoraPortal_Util::getFormVar($args, 'operation', -1, 'GET');

        $operation = Agora_Queues_Operation::get_operation_by_id($opid);
        if ($operation) {
            $operation->execute();
            return $operation->get_message();
        }
        return false;
    }

    public function changeStateOperationId($args) {
        AgoraPortal_Util::requireAdmin();

        $opid = AgoraPortal_Util::getFormVar($args, 'operation', -1, 'GET');
        $state = AgoraPortal_Util::getFormVar($args, 'state', false, 'GET');

        $operation = Agora_Queues_Operation::get_operation_by_id($opid);
        if ($operation) {
            return $operation->changeState($state);
        }
        return false;
    }

    public function deleteOperationId($args) {
        AgoraPortal_Util::requireAdmin();

        $opid = AgoraPortal_Util::getFormVar($args, 'operation', -1, 'GET');
        return Agora_Queues_Operation::delete($opid);
    }

}