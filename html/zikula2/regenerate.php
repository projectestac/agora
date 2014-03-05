<?php

ini_set('mbstring.internal_encoding', 'UTF-8');
ini_set('default_charset', 'UTF-8');
mb_regex_encoding('UTF-8');
ini_set('memory_limit', '64M');
ini_set('max_execution_time', 86400);

include 'lib/bootstrap.php';
$core->init(Zikula_Core::STAGE_ALL);
$eventManager = $core->getEventManager();

ZLoader::addAutoloader('Users', 'system/Users/lib', '_');

include_once __DIR__.'/plugins/Doctrine/Plugin.php';
PluginUtil::loadPlugin('SystemPlugin_Doctrine_Plugin');

// load zikula core
define('_ZINSTALLVER', Zikula_Core::VERSION_NUM);


echo '<p>Starting full regeneration of modules</p>';

$filemodules = ModUtil::apiFunc('Extensions', 'admin', 'getfilemodules');
$results = ModUtil::apiFunc('Extensions', 'admin', 'regenerate', array('filemodules' => $filemodules, 'defaults' => TRUE));

if ($results) {
    echo 'Regeneration completed successfully';
} else {
    echo 'Error: Could not regenerate the modules';
}
