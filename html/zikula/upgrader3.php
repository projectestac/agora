<?php

print 'Actualitzaci&oacute; del M&ograve;dul IWstats';
ob_flush();
flush();

// Inform the core this is an installer
define('_PNINSTALLVER', '1.2.9');
define('_PN_MINUPGVER', '1.2.0');

// Load API
require_once 'includes/pnAPI.php';

// Initialize the zikula core
pnInit(PN_CORE_ALL & ~PN_CORE_AJAX);

// Regenerate modules list
pnModAPIFunc('Modules', 'admin', 'regenerate', array('defaults' => true));

// Get Stats module ID
$modinfo = pnModGetInfo(pnModGetIDFromName('IWstats'));

// Deactivate Stats module
if ($modinfo['state'] == PNMODULE_STATE_UPGRADED) {
    pnModAPIFunc('Modules', 'admin', 'upgrade', array('id' => $modinfo['id']));
}

print '<div style="color:green;"><br /><br /><br />El proc&eacute;s ha finalitzat correctament.</div>';
print '<div style="color:green;"><a href="index.php">V&eacute;s a la intranet</a></div>';
