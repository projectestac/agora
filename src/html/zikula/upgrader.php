<?php
// Set high values, just in case
ini_set('max_execution_time', 86400);
ini_set('memory_limit', '128M');

print 'Actualitzaci&oacute; del Zikula a la versi&oacute; 1.2.8. <br /><br />Aquest proc&eacute;s pot trigar alguns minuts...<br /><br />Si us plau, espereu a que finalitzi.';
ob_flush();
flush();

// Inform the core this is an installer
define('_PNINSTALLVER', '1.2.8');
define('_PN_MINUPGVER', '1.2.0');

// Load API
require_once 'includes/pnAPI.php';

// Initialize the zikula core
pnInit(PN_CORE_ALL & ~PN_CORE_AJAX);

// Regenerate modules list
pnModAPIFunc('Modules', 'admin', 'regenerate', array('defaults' => true));

// Activate IWstats module
$modinfo = pnModGetInfo(pnModGetIDFromName('IWstats'));
if ($modinfo['state'] == PNMODULE_STATE_UNINITIALISED) {
    // Initialise and activate
    pnModAPIFunc('Modules', 'admin', 'initialise', array('id' => $modinfo['id']));
    // Adding pn_url info to DB. Zikula doesn't insert it from upgrade.php (Maybe a bug?)
    $sql = 'UPDATE zk_modules set `pn_url` = \'iwstats\' WHERE `pn_id` = '.$modinfo['id'];
    DBUtil::executeSQL($sql);
}

// Activate advMailer module
$modinfo = pnModGetInfo(pnModGetIDFromName('advMailer'));
if ($modinfo['state'] == PNMODULE_STATE_UNINITIALISED) {
    // Initialise and activate
    pnModAPIFunc('Modules', 'admin', 'initialise', array('id' => $modinfo['id']));
    // Adding pn_url info to DB. Zikula doesn't insert it from upgrade.php (Maybe a bug?)
    $sql = 'UPDATE zk_modules set `pn_url` = \'advmailer\' WHERE `pn_id` = '.$modinfo['id'];
    DBUtil::executeSQL($sql);
}

// Extra job: update new version number in a config var
pnConfigSetVar('Version_Num', PN_VERSION_NUM);

// Extra job: empty temporary files
pnModAPIFunc('pnRender', 'user', 'clear_compiled');
pnModAPIFunc('pnRender', 'user', 'clear_cache');
pnModAPIFunc('Theme', 'user', 'clear_compiled');
pnModAPIFunc('Theme', 'user', 'clear_cache');

print '<div style="color:green;"><br /><br /><br />El proc&eacute;s ha finalitzat correctament.</div>';
print '<div style="color:green;"><a href="index.php">V&eacute;s a la intranet</a></div>';

