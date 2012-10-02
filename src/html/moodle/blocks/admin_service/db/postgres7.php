<?PHP  //$Id: postgres7.php,v 1.1 2004/04/19 04:30:54 paca70 Exp $
//
// This file keeps track of upgrades to Moodle's
// blocks system.
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installtion to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// Versions are defined by backup_version.php
//
// This file is tailored to PostgreSQL

function admin_service_upgrade($oldversion=0) {

    global $CFG;
    
    $result = true;
	/*
	 * S'ha de poder adaptar les consultes al DATA
	 * Per fer-ho s'ha de poder fer la sequente SQL per posar el camp DATA
	 * 	ALTER TABLE mdl_analytics_sessions
	 *		ADD COLUMN time_executed2 timestamp with time zone DEFAULT now();
	 */
    if ($oldversion < 2009102200 and $result) {
        $result = execute_sql("ALTER TABLE {$CFG->prefix}analytics_sessions
        							ADD COLUMN time_executed2 timestamp with time zone DEFAULT now();",false);
											
    	//$result = true; //Nothing to do
    }

    //Finally, return result
    return $result;
}
