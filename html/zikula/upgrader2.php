<?php

print 'Desactivaci&oacute; del m&ograve;dul Stats.<br /><br />Aquest proc&eacute;s pot trigar alguns minuts...<br /><br />Si us plau, espereu a que finalitzi.';
ob_flush();
flush();

// Inform the core this is an installer
define('_PNINSTALLVER', '1.2.7');
define('_PN_MINUPGVER', '1.2.0');

// Load API
require_once 'includes/pnAPI.php';

// Initialize the zikula core
pnInit(PN_CORE_ALL & ~PN_CORE_AJAX);

// Regenerate modules list
pnModAPIFunc('Modules', 'admin', 'regenerate', array('defaults' => true));

// Get Stats module ID
$modinfo = pnModGetInfo(pnModGetIDFromName('Stats'));

// Deactivate Stats module
if ($modinfo['state'] == PNMODULE_STATE_ACTIVE) {
    pnModAPIFunc('Modules', 'admin', 'setstate', array('id' => $modinfo['id'], 'state' => PNMODULE_STATE_INACTIVE));
}

print '<div style="color:green;"><br /><br /><br />El proc&eacute;s ha finalitzat correctament.</div>';
print '<div style="color:green;"><a href="index.php">V&eacute;s a la intranet</a></div>';
