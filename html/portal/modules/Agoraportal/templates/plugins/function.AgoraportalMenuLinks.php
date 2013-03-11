<?php

function smarty_function_AgoraportalMenuLinks($params, &$smarty) {
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
        if ($service['allowedClients'] != '') {
            if (!empty($clientCode) && (strpos($service['allowedClients'], $clientCode) !== false)) {
                $availableServicesNumber++;
            }
        } else {
            $availableServicesNumber++;
        }
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

    $showAskServices = ($availableServicesNumber > $numClientServices) ? true : false;
    $showRequests = ($numClientServices > 0) ? true : false;

    $AgoraportalMenuLinks = '';

    // Compacted if's don't work as espected here!
    if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT)) {
        $isClient = true;
    } else {
        $isClient = false;
    }
    if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD)) {
        $isManager = true;
    } else {
        $isManager = false;
    }
    if (SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
        $isAdmin = true;
    } else {
        $isAdmin = false;
    }

    if (!$isAdmin) {
        $clientInfo = ModUtil::func('Agoraportal', 'user', 'getRealClientCode', array('clientCode' => $clientCode));
        $clientCode = $clientInfo['clientCode'];
    }

    $isMoodleEnabled = ModUtil::apiFunc('Agoraportal', 'user', 'existsServiceInClient', array('clientCode' => $clientCode,
                'serviceName' => 'moodle'));

    $allowedUsersAdministration = ModUtil::func('Agoraportal', 'user', 'allowedUsersAdministration', array('clientCode' => $clientCode));
    // Administrator menu
    if ($isAdmin) {
        $AgoraportalMenuLinks = '<div>';
        $AgoraportalMenuLinks .= "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'clientsList')) . "\">" . __('Llista de clients') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'newClient')) . "\">" . __('Creació de clients') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'main')) . "\">" . __('Llista de serveis') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'services')) . "\">" . __('Definició de serveis') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'sql')) . "\">" . __('Execució d\'SQL') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'advices')) . "\">" . __('Enviament d\'avisos') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'stats')) . "\">" . __('Estadístiques') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'config')) . "\">" . __('Configuració') . "</a> " . $params['separator'];
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'admin', 'requestsList')) . "\">" . __('Sol·licituds') . "</a> ";
        $AgoraportalMenuLinks .= $params['end'] . "</span>\n";
        $AgoraportalMenuLinks .= '</div>';
    }

    // user services view menu
    if ($isClient && !$isAdmin) {
        $AgoraportalMenuLinks .= '<div>';
        $AgoraportalMenuLinks .= "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";
        $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'myAgora')) . "\">" . __('Serveis') . "</a> ";
        if ($isManager && $isMoodleEnabled) {
            $AgoraportalMenuLinks .= $params['separator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'files')) . "\">" . __('Gestió de fitxers') . "</a> ";
        }
        if ($isManager && $showAskServices) {
            $AgoraportalMenuLinks .= $params['separator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('Agoraportal', 'user', 'askServices')) . "\">" . __('Sol·licitud de serveis') . "</a> ";
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
        if ($isMoodleEnabled) {
            $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('agoraPortal', 'user', 'files', array('clientCode' => $clientCode))) . "\">" . __('Gestió de fitxers') . "</a> " . $params['separator'];
        }
        if ($showAskServices) {
            $AgoraportalMenuLinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(ModUtil::url('agoraPortal', 'user', 'askServices', array('clientCode' => $clientCode))) . "\">" . __('Sol·licitud de serveis') . "</a> " . $params['separator'];
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