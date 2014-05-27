<?php
//MARSUPIAL ************ FITXER AFEGIT - Marsupial menu options

//MARSUPIAL ************ AFEGIT - speedup for non-admins, add all caps used on this page
//2012.11.12 @abertranb
if ($hassiteconfig) {
// ************ FI

//If site is allowed to use Marsupial
//MARSUPIAL ************ AFEGIT - Check if block rcommon exists
//2013.02.05 @abertranb
	if ($DB->record_exists('block', array('name'=>'rcommon')) && (!isset($CFG->ismarsupial) || $CFG->ismarsupial)) {
// ************ FI
	if ( has_capability('moodle/site:config', context_system::instance())){
		// Add main category
		    $ADMIN->add('root', new admin_category('rcommon', get_string('rcommon','block_rcommon')));    
		    
		    // MARSUPIAL ********** AFEGIT -> Added state page
		    // 2011.10.21 @sarjona 
		    $ADMIN->add('rcommon', new admin_externalpage('marsupialstate', get_string('marsupialstats', 'block_rcommon'), $CFG->wwwroot.'/blocks/rcommon/state/index.php'));
		    // ********* FI
		
		// MARSUPIAL ************ MODIFICAT -> Migrating to 2.x Moodle
		// 2012.11.12 @abertranb
		    $total_publishers = $DB->count_records('rcommon_publisher');
		//************ ORIGINAL
		//    $total_publishers = count_records('rcommon_publisher');
		//************ FI
		    // Create subcategories
		// MARSUPIAL ************ DELETED -> Take out links to Atria
		// 2012.08.30 @mmartinez
		    /*if ((!isset($CFG->useatria) || $CFG->useatria) && ($total_publishers == 0)){
		        $ADMIN->add('rcommon', new admin_externalpage('marsupialusersync', get_string('marsupialusersync','block_rcommon'), $CFG->wwwroot . '/atria/getKeys.php'));
		    }*/
		// ************ FI
		    
		    // Publishers
		    $ADMIN->add('rcommon', new admin_category('marsupialpublisher', get_string('marsupialpublisher','block_rcommon')));
		// MARSUPIAL ************ DELETED -> Take out links to Atria
		// 2012.08.30 @mmartinez
		    /*if (!isset($CFG->useatria) || $CFG->useatria){
		        $ADMIN->add('marsupialpublisher', new admin_externalpage('marsupialupdate_publisher', get_string('marsupialupdate_publisher','block_rcommon'), $CFG->wwwroot . '/atria/admin/getPublisherData.php'));
		    }*/
		// ************* FI
		    $ADMIN->add('marsupialpublisher', new admin_externalpage('marsupialmanage_publisher', get_string('marsupialmanage_publisher','block_rcommon'), $CFG->wwwroot . '/blocks/rcommon/publishersManager.php'));
		    
		    //Get publishers
		// MARSUPIAL ************ MODIFICAT -> Migrating to 2.x Moodle
		// 2012.11.12 @abertranb
		    $publishers = $DB->get_records_select('rcommon_publisher', "urlwsbookstructure<>'".$DB->sql_empty()."'", array(), 'name');
		//************ ORIGINAL
		    //$publishers = get_records_select('rcommon_publisher', "urlwsbookstructure<>'".sql_empty()."'", 'name');
		//************ FI    
		    if($publishers){
		        $ADMIN->add('rcommon', new admin_category('marsupialcontent', get_string('marsupialcontent','block_rcommon')));    
		        
		        foreach ($publishers as $publisher){
		                $ADMIN->add('marsupialcontent', new admin_externalpage($publisher->id, $publisher->name, $CFG->wwwroot . '/blocks/rcommon/getBooks.php?id='.$publisher->id));
		        }
		    }
		
		    $ADMIN->add('rcommon', new admin_category('marsupialcredentials', get_string('marsupialcredentials','block_rcommon')));
		// MARSUPIAL ************ DELETED -> Take out links to Atria
		// 2012.08.30 @mmartinez
		    /*if (!isset($CFG->useatria) || $CFG->useatria){
		        $ADMIN->add('marsupialcredentials', new admin_externalpage('marsupialget_credentials', get_string('marsupialget_credentials','block_rcommon'), $CFG->wwwroot . '/atria/admin/getKeys.php'));
		    }*/
		// ************** FI
		// MARSUPIAL ********** MODIFICAT -> Changed url to point to rcommon block
		// 2011.09.19 @mmartinez 
		    $ADMIN->add('marsupialcredentials', new admin_externalpage('marsupialmanage_credentials', get_string('marsupialmanage_credentials','block_rcommon'), $CFG->wwwroot . '/blocks/rcommon/keyManager.php'));
		// ********** ORIGINAL
		    //$ADMIN->add('marsupialcredentials', new admin_externalpage('marsupialmanage_credentials', get_string('marsupialmanage_credentials','block_rcommon'), $CFG->wwwroot . '/atria/admin/keyManager.php'));
		// ********* FI
		
		// MARSUPIAL ************** AFEGIT -> New functionality to manage credentials
		// 2012.06.06 @mmartinez
			$ADMIN->add('marsupialcredentials', new admin_externalpage('marsupial_manage_credentials', get_string('marsupial_manage_credentials','block_rcommon'), $CFG->wwwroot . '/blocks/rcommon/keyManager_new.php'));
		// ************ FI
	}
}


//MARSUPIAL ************ AFEGIT - speedup for non-admins, add all caps used on this page
//2012.11.12 @abertranb
}
// ************ FI
