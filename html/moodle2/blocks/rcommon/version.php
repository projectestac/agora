<?php

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2014070300;        // The current plugin version (Date: YYYYMMDDXX)
$plugin->requires  = 2011033009;        // Requires this Moodle version
$plugin->component = 'block_rcommon';   // Full name of the plugin (used for diagnostics)
$plugin->dependencies = array(
    'local_rcommon' => 2014061000 // The Bar enrolment plugin version 2014020300 or higher must be present.
);