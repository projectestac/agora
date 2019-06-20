<?php

return [
    'stats_api'          => 'Memcached',
    'slabs_api'          => 'Server',
    'items_api'          => 'Memcached',
    'get_api'            => 'Memcached',
    'set_api'            => 'Memcached',
    'delete_api'         => 'Memcached',
    'flush_all_api'      => 'Memcached',
    'connection_timeout' => '1',
    'max_item_dump'      => '100',
    'refresh_rate'       => 5,
    'memory_alert'       => '80',
    'hit_rate_alert'     => '90',
    'eviction_alert'     => '0',
    'file_path'          => 'Temp/',
    'servers'            =>
        [
            'localhost' =>
                [
                    '127.0.0.1:11211' =>
                        [
                            'hostname' => '127.0.0.1',
                            'port'     => '11211',
                        ],
                ],
        ],
];