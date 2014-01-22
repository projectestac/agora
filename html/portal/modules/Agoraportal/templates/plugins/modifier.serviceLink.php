<?php

function smarty_modifier_serviceLink($clientDNS, $serviceName) {
    return ModUtil::func('Agoraportal', 'user', 'getServiceLink', array('serviceName' => $serviceName,
                'clientDNS' => $clientDNS));
}
