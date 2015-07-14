<?php

function smarty_function_AgoraportalMenuLinks($params, &$smarty) {
    require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

    global $agora;

    // set some defaults
    $clientCode = (isset($params['clientCode'])) ? $params['clientCode'] : "";

    // Compacted if's don't work as expected here!
    $isClient = AgoraPortal_Util::isClient();
    $isManager = AgoraPortal_Util::isManager();
    $isAdmin = AgoraPortal_Util::isAdmin();
    if (!$isAdmin && !$isManager && !$isClient) {
        throw new Zikula_Exception_Forbidden();
    }

    $menu = "";

    // Administrator menu
    if ($isAdmin) {
        $menu = '<ul class="nav nav-pills">';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'main')) . '"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> ' . __('Llista de serveis') . '</a> ';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'clientsList')) . '"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> ' . __('Llista de clients') . '</a> ';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'requestsList')) . '"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span> ' . __('Sol·licituds') . '</a> ';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'stats')) . '"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> ' . __('Estadístiques') . '</a> ';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Files', 'user', 'main')) . '"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> ' . __('Fitxers') . '</a> ';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'sql')) . '"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> ' . __('Execució d\'SQL') . '</a> ';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'advices')) . '"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> ' . __('Enviament d\'avisos') . '</a> ';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'operations')) . '"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span> ' . __('Operacions') . '</a> ';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'queues')) . '"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> ' . __('Cues') . '</a> ';
        if ( $agora['server']['enviroment'] != 'PRO' ) {
            $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'createBatch')) . '"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> ' . __('Creació massiva') . '</a> ';
        }
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'config')) . '"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> ' . __('Configuració') . '</a> ';
        $menu .= '</ul>';
    }

    // Get client services information
    if (!$isAdmin || $clientCode) {
        $clientCode = AgoraPortal_Util::getClientCodeFromUser($clientCode);
        if ($isAdmin) {
            $params = array('clientCode' => $clientCode);
        } else {
            $params = array();
        }

        $menu .= '<ul class="nav nav-pills">';
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'myAgora', $params)) . '"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> ' . __('Serveis') . "</a> ";

        if ($isManager || $isAdmin) {
            $client = Client::get_by_code($clientCode);
            $services = $client->get_enabled_services();
            $numClientServices = count($services);
            // Get the list of services
            $servicetypes = ServiceTypes::get_all();
            $availableServicesNumber = count($servicetypes);

            $showAskServices = $availableServicesNumber > $numClientServices;
            $showRequests = $numClientServices > 0;

            // Decide whether to show files manager on not i MyAgora
            $showFilesManager = false;
            foreach ($services as $service) {
                if ($service->get_servicetype_name() == 'moodle2') {
                    $showFilesManager = true;
                    break;
                }
            }

            if ($showFilesManager) {
                $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'files', $params)) . '"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> ' . __('Gestió de fitxers') . "</a> ";
            }
            if ($showRequests) {
                $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'requests', $params)) . '"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span> ' . __('Sol·licituds') . "</a> ";
            }
        }
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'managers', $params)) . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . __('Gestors') . "</a> ";
        $menu .= ' <li role="presentation"><a href="' . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'logs', $params)) . '"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ' . __('Accions fetes') . "</a> ";
        $menu .= '</ul>';
    }

    return $menu;
}