<?php

include_once dirname(dirname(dirname(__FILE__))) . '/env-config.php';

$app = [];
$session = [];

foreach (explode("\n", $agora['moodle2']['memcache_servers']) as $value) {
    $app[trim($value)] = [
        'hostname' => trim($value),
        'port' => '11211',
    ];
}

if (!empty($agora['moodle2']['memcached_session_servers'])) {
    foreach (explode("\n", $agora['moodle2']['memcached_session_servers']) as $value) {
        $session[trim($value)] = [
            'hostname' => trim($value),
            'port' => '11211',
        ];
    }
}

return [
    'stats_api' => 'Server',
    'slabs_api' => 'Server',
    'items_api' => 'Server',
    'get_api' => 'Server',
    'set_api' => 'Server',
    'delete_api' => 'Server',
    'flush_all_api' => 'Server',
    'connection_timeout' => '1',
    'max_item_dump' => '100',
    'refresh_rate' => 2,
    'memory_alert' => '80',
    'hit_rate_alert' => '90',
    'eviction_alert' => '0',
    'file_path' => '/tmp/',
    'servers' => [
        'Application' => $app,
        'Session' => $session,
    ],
];
