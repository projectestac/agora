<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

function smarty_function_AgoraportalMenuLinks($params, &$smarty) {
    global $agora;

    // set some defaults
    if (!isset($params['start'])) {
        $params['start'] = '[';
    }
    if (!isset($params['end'])) {
        $params['end'] = ']';
    }
    if (!isset($params['separator'])) {
        $params['separator'] = '|';
    }
    if (!isset($params['class'])) {
        $params['class'] = 'z-menuitem-title';
    }

    $clientCode = (isset($params['clientCode'])) ? $params['clientCode'] : '';

    // Get the list of services
    $services = ModUtil::apiFunc('Agoraportal', 'user', 'getAllServices');

    $availableServicesNumber = 0;
    foreach ($services as $service) {
        $availableServicesNumber++;
        // Following code is commented in order to allow the 4th service to be asked for
        //  even if there is any service which is not accepting new registers. The problem
        //  appears when an existing service is block for new register.
        /*
        if ($service['allowedClients'] != '') {
            if (!empty($clientCode) && (strpos($service['allowedClients'], $clientCode) !== false)) {
                $availableServicesNumber++;
            }
        } else {
            $availableServicesNumber++;
        }
        */
    }

    if ($service['allowedClients'] != '') {
        if (!empty($clientCode) && (strpos($service['allowedClients'], $clientCode) !== false)) {
            $allowedServices[$service['serviceId']] = $service;
        }
    } else {
        $allowedServices[$service['serviceId']] = $service;
    }

    // Get client services information
    $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getAllClientsAndServices', array('init' => 0,
                'rpp' => 50,
                'service' => 0,
                'state' => array(0, 1),
                'search' => 1,
                'searchText' => $clientCode,
                'clientCode' => $clientCode));

    $numClientServices = count($clientInfo);

    $showRequests = ($numClientServices > 0) ? true : false;

    $AgoraportalMenuLinks = '';

    // Compacted if's don't work as espected here!
    $isClient = AgoraPortal_Util::isClient();
    $isManager = AgoraPortal_Util::isManager();
    $isAdmin = AgoraPortal_Util::isAdmin();

    if (!$isAdmin) {
        $clientInfo = ModUtil::apiFunc('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
    }

    // Decide whether to show files manager on not i MyAgora
    $showFilesManager = false;
    $isMoodle2Enabled = ModUtil::apiFunc('Agoraportal', 'user', 'existsServiceInClient', array('clientCode' => $clientCode,
                'serviceName' => 'moodle2'));
    if ($isMoodle2Enabled) {
        $showFilesManager = true;
    }

    // Administrator menu
    if ($isAdmin) {
        $AgoraportalMenuLinks = '<div>';
        $AgoraportalMenuLinks .= "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'clientsList')) . "\">" . __('Llista de clients') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'newClient')) . "\">" . __('Client nou') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'main')) . "\">" . __('Llista de serveis') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'services')) . "\">" . __('Definició de serveis') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'sql')) . "\">" . __('Execució d\'SQL') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'advices')) . "\">" . __('Enviament d\'avisos') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'stats')) . "\">" . __('Estadístiques') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('fitxers', 'user', 'main')) . "\">" . __('Fitxers') . "</a> " . $params['separator'];
        if ( $agora['server']['enviroment'] != 'PRO' ) {
            $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'createBatch')) . "\">" . __('Creació massiva') . "</a> " . $params['separator'];
        }
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'config')) . "\">" . __('Configuració') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'requestsList')) . "\">" . __('Sol·licituds') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'operations')) . "\">" . __('Operacions') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'queues')) . "\">" . __('Cues') . "</a> ";
        $AgoraportalMenuLinks .= $params['end'] . "</span>\n";
        $AgoraportalMenuLinks .= '</div>';
    }

    // user services view menu
    if ($isClient && !$isAdmin) {
        $AgoraportalMenuLinks .= '<div>';
        $AgoraportalMenuLinks .= "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'myAgora')) . "\">" . __('Serveis') . "</a> ";
        if ($isManager && $showFilesManager) {
            $AgoraportalMenuLinks .= $params['separator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'files')) . "\">" . __('Gestió de fitxers') . "</a> ";
        }
        if ($isManager && $showRequests) {
            $AgoraportalMenuLinks .= $params['separator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'requests')) . "\">" . __('Altres Sol·licituds') . "</a> ";
        }
        $AgoraportalMenuLinks .= $params['separator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'managers')) . "\">" . __('Gestors') . "</a> ";
        $AgoraportalMenuLinks .= $params['separator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'logs')) . "\">" . __('Accions fetes') . "</a> ";
        $AgoraportalMenuLinks .= $params['end'] . "</span>\n";
        $AgoraportalMenuLinks .= '</div>';
    }

    // admin services for users view menu
    if ($isAdmin && isset($params['clientCode'])) {
        $AgoraportalMenuLinks .= '<div>';
        $AgoraportalMenuLinks .= "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('agoraPortal', 'user', 'myAgora', array('clientCode' => $clientCode))) . "\">" . __('Serveis') . "</a> " . $params['separator'];
        if ($showFilesManager) {
            $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('agoraPortal', 'user', 'files', array('clientCode' => $clientCode))) . "\">" . __('Gestió de fitxers') . "</a> " . $params['separator'];
        }
        if ($showRequests) {
            $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'requests', array('clientCode' => $clientCode))) . "\">" . __('Altres Sol·licituds') . "</a> " . $params['separator'];
        }
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('agoraPortal', 'user', 'managers', array('clientCode' => $clientCode))) . "\">" . __('Gestors') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('agoraPortal', 'user', 'logs', array('clientCode' => $clientCode))) . "\">" . __('Accions fetes') . "</a> ";
        $AgoraportalMenuLinks .= $params['end'] . "</span>\n";
        $AgoraportalMenuLinks .= '</div>';
    }

    return $AgoraportalMenuLinks;
}