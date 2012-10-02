<?php

function smarty_modifier_serviceLink($clientDNS, $serviceName = 'moodle', $clientDNS, $clientCode) {
    $link = ModUtil::func('Agoraportal', 'user', 'getServiceLink', array('serviceName' => $serviceName,
                'clientDNS' => $clientDNS,
                'clientCode' => $clientCode));

    return $link;
}