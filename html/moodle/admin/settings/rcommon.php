<?php
//XTEC ************ FITXER AFEGIT - Marsupial menu options
//2011.07.30 @fcasanel


//If site is allowed to use Marsupial
if ( (!isset($CFG->ismarsupial) || $CFG->ismarsupial) && has_capability('moodle/site:config', get_context_instance(CONTEXT_SYSTEM))){
    // Add main category
    $ADMIN->add('root', new admin_category('rcommon', get_string('rcommon','blocks/rcommon')));    
    
    // MARSUPIAL ********** AFEGIT -> Added state page
    // 2011.10.21 @sarjona 
    $ADMIN->add('rcommon', new admin_externalpage('marsupialstate', get_string('marsupialstats', 'blocks/rcommon'), $CFG->wwwroot.'/blocks/rcommon/state/index.php'));
    // ********* FI

    $total_publishers = count_records('rcommon_publisher');
    // Create subcategories
    if ((!isset($CFG->useatria) || $CFG->useatria) && ($total_publishers == 0)){
        $ADMIN->add('rcommon', new admin_externalpage('marsupialusersync', get_string('marsupialusersync','blocks/rcommon'), $CFG->wwwroot . '/atria/getKeys.php'));
    }
    
    // Publishers
    $ADMIN->add('rcommon', new admin_category('marsupialpublisher', get_string('marsupialpublisher','blocks/rcommon')));
    if (!isset($CFG->useatria) || $CFG->useatria){
        $ADMIN->add('marsupialpublisher', new admin_externalpage('marsupialupdate_publisher', get_string('marsupialupdate_publisher','blocks/rcommon'), $CFG->wwwroot . '/atria/admin/getPublisherData.php'));
    }
    $ADMIN->add('marsupialpublisher', new admin_externalpage('marsupialmanage_publisher', get_string('marsupialmanage_publisher','blocks/rcommon'), $CFG->wwwroot . '/blocks/rcommon/publishersManager.php'));
    
    //Get publishers
    $publishers = get_records_select('rcommon_publisher', "urlwsbookstructure<>'".sql_empty()."'", 'name');
    if($publishers){
        $ADMIN->add('rcommon', new admin_category('marsupialcontent', get_string('marsupialcontent','blocks/rcommon')));    
        
        foreach ($publishers as $publisher){
                $ADMIN->add('marsupialcontent', new admin_externalpage($publisher->id, $publisher->name, $CFG->wwwroot . '/blocks/rcommon/getBooks.php?id='.$publisher->id));
        }
    }

    $ADMIN->add('rcommon', new admin_category('marsupialcredentials', get_string('marsupialcredentials','blocks/rcommon')));
    if (!isset($CFG->useatria) || $CFG->useatria){
        $ADMIN->add('marsupialcredentials', new admin_externalpage('marsupialget_credentials', get_string('marsupialget_credentials','blocks/rcommon'), $CFG->wwwroot . '/atria/admin/getKeys.php'));
    }
// MARSUPIAL ********** MODIFICAT -> Changed url to point to rcommon block
// 2011.09.19 @mmartinez 
    $ADMIN->add('marsupialcredentials', new admin_externalpage('marsupialmanage_credentials', get_string('marsupialmanage_credentials','blocks/rcommon'), $CFG->wwwroot . '/blocks/rcommon/keyManager.php'));
// ********** ORIGINAL
    //$ADMIN->add('marsupialcredentials', new admin_externalpage('marsupialmanage_credentials', get_string('marsupialmanage_credentials','blocks/rcommon'), $CFG->wwwroot . '/atria/admin/keyManager.php'));
// ********* FI

// MARSUPIAL ************** AFEGIT -> New functionality to manage credentials
// 2012.06.06 @mmartinez
	$ADMIN->add('marsupialcredentials', new admin_externalpage('marsupial_manage_credentials', get_string('marsupial_manage_credentials','blocks/rcommon'), $CFG->wwwroot . '/blocks/rcommon/keyManager_new.php'));
// ************ FI
}