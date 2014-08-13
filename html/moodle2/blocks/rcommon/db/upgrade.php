<?php
//Migrating from block_rcommon to local_rcommon
function xmldb_block_rcommon_upgrade($oldversion) {
    global $DB, $OUTPUT;

    if ($oldversion < 2014070300) {
    	$local_version = $DB->get_field('config_plugins', 'value', array('name'=>'version', 'plugin'=>'local_rcommon'));
    	if(!$local_version){
    		//Local not installed
    		try{
	    		$version = $DB->get_field('block', 'version',array('name'=>'rcommon'));
	    	} catch (Exception $e){
	    		$version = false;
	    	}

	    	if(!$version){
	    		$version = $DB->get_field('config_plugins', 'value',array('name'=>'version', 'plugin' => 'block_rcommon'));
	    	}

	    	if($version){
	    		$new_version = new StdClass();
	    		$new_version->name = 'version';
	    		$new_version->plugin = 'local_rcommon';
	    		$new_version->value = $version;
	    		$DB->insert_record('config_plugins', $new_version);
	    	}
	    }
        // Savepoint reached.
        upgrade_block_savepoint(true, 2014070300, 'rcommon');
    }
    echo $OUTPUT->notification('Now you can uninstall block/rcommon by erasing the directory', 'notifysuccess');

    return true;
}
