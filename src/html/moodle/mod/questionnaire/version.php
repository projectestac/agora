<?php // $Id: version.php,v 1.20.10.8 2009/07/09 18:04:07 mchurch Exp $

/////////////////////////////////////////////////////////////////////////////////
///  Code fragment to define the version of NEWMODULE
///  This fragment is called by moodle_needs_upgrading() and /admin/index.php
/////////////////////////////////////////////////////////////////////////////////

//$module->realversion  = 2008060403;  // The current module version (Date: YYYYMMDDXX)
$module->version  = 2009040700;  // The current module version (Date: YYYYMMDDXX)
$module->requires = 2007101000;  // Requires this Moodle version
$module->cron     = 60*60*12;    // Period for cron to check this module (secs)

?>
