<?php
/////////////////////////////////////////////////////////////////////////////////
///  Code fragment to define the version of rcontent                          //
///  This fragment is called by moodle_needs_upgrading() and /admin/index.php  //
/////////////////////////////////////////////////////////////////////////////////
  

defined('MOODLE_INTERNAL') || die();

 
$module->version   = 2013042200;        // The current plugin version (Date: YYYYMMDDXX)
$module->requires  = 2011033009;        // Requires this Moodle version
$module->component = 'mod_rcontent';    // Full name of the plugin (used for diagnostics)
$module->release   = 'v2.0';            // Human-readable version name
$module->maturity  = MATURITY_RC;       // How stable the plugin is
