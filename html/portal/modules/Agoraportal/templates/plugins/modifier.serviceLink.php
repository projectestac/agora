<?php

function smarty_modifier_serviceLink($clientDNS, $serviceName) {
    $service = ServiceType::get_by_name($serviceName);
    return ModUtil::getVar('Agoraportal', 'siteBaseURL') . $clientDNS . '/' . $service->URL;
}
