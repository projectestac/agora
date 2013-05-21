<?php defined('MOODLE_INTERNAL') || die();
 $configuration = array (
  'siteidentifier' => 'unknown',
  'stores' => 
  array (
    'default_application' => 
    array (
      'name' => 'default_application',
      'plugin' => 'file',
      'configuration' => 
      array (
      ),
      'features' => 6,
      'modes' => 1,
      'default' => true,
      'class' => 'cachestore_file',
      'lock' => 'cachelock_file_default',
    ),
    'default_session' => 
    array (
      'name' => 'default_session',
      'plugin' => 'session',
      'configuration' => 
      array (
      ),
      'features' => 6,
      'modes' => 2,
      'default' => true,
      'class' => 'cachestore_session',
      'lock' => 'cachelock_file_default',
    ),
    'default_request' => 
    array (
      'name' => 'default_request',
      'plugin' => 'static',
      'configuration' => 
      array (
      ),
      'features' => 6,
      'modes' => 4,
      'default' => true,
      'class' => 'cachestore_static',
      'lock' => 'cachelock_file_default',
    ),
    'agora_store' => 
    array (
      'name' => 'agora_store',
      'plugin' => 'file',
      'configuration' => 
      array (
        'path' => '/srv/www/agora/cache_ins',
      ),
      'features' => 6,
      'modes' => 3,
      'mappingsonly' => false,
      'class' => 'cachestore_file',
      'default' => false,
      'lock' => 'cachelock_file_default',
    ),
  ),
  'modemappings' => 
  array (
    0 => 
    array (
      'store' => 'default_request',
      'mode' => 4,
      'sort' => 0,
    ),
    1 => 
    array (
      'store' => 'agora_store',
      'mode' => 2,
      'sort' => 0,
    ),
    2 => 
    array (
      'store' => 'default_application',
      'mode' => 1,
      'sort' => 0,
    ),
  ),
  'definitions' => 
  array (
    'core/string' => 
    array (
      'mode' => 1,
      'simplekeys' => true,
      'simpledata' => true,
      'persistent' => true,
      'persistentmaxsize' => 3,
      'component' => 'core',
      'area' => 'string',
    ),
    'core/databasemeta' => 
    array (
      'mode' => 1,
      'requireidentifiers' => 
      array (
        0 => 'dbfamily',
      ),
      'persistent' => true,
      'persistentmaxsize' => 2,
      'component' => 'core',
      'area' => 'databasemeta',
    ),
    'core/eventinvalidation' => 
    array (
      'mode' => 1,
      'persistent' => true,
      'requiredataguarantee' => true,
      'simpledata' => true,
      'component' => 'core',
      'area' => 'eventinvalidation',
    ),
    'core/questiondata' => 
    array (
      'mode' => 1,
      'simplekeys' => true,
      'requiredataguarantee' => false,
      'datasource' => 'question_finder',
      'datasourcefile' => 'question/engine/bank.php',
      'component' => 'core',
      'area' => 'questiondata',
    ),
    'core/htmlpurifier' => 
    array (
      'mode' => 1,
      'component' => 'core',
      'area' => 'htmlpurifier',
    ),
  ),
  'definitionmappings' => 
  array (
    0 => 
    array (
      'store' => 'agora_store',
      'definition' => 'core/htmlpurifier',
      'sort' => 1,
    ),
    1 => 
    array (
      'store' => 'agora_store',
      'definition' => 'core/string',
      'sort' => 1,
    ),
    2 => 
    array (
      'store' => 'agora_store',
      'definition' => 'core/databasemeta',
      'sort' => 1,
    ),
    3 => 
    array (
      'store' => 'agora_store',
      'definition' => 'core/eventinvalidation',
      'sort' => 1,
    ),
  ),
  'locks' => 
  array (
    'cachelock_file_default' => 
    array (
      'name' => 'cachelock_file_default',
      'type' => 'cachelock_file',
      'dir' => 'filelocks',
      'default' => true,
    ),
  ),
);