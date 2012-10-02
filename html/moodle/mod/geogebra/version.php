<?php

// To avoid 1.9 Notice
if (!defined('MATURITY_RC')) {
    define('MATURITY_RC', 150);
}

$module->version   = 2012082100;      // The current module version (Date: YYYYMMDDXX)
$module->requires  = 2007101512;      // Requires this Moodle version
$module->cron      = 0;               // Period for cron to check this module (secs)
$module->component = 'mod_geogebra';  // To check on upgrade, that module sits in correct place
$module->release   = 'v1.1.0';        // Human-readable version name
$module->maturity  = MATURITY_RC;     // How stable the plugin is
