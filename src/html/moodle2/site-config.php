<?php
	
    require_once(INSTALL_BASE.'/html/config/dblib-mysql.php');
	
    $debug_enabled = isset($_GET['debug']) ? $_GET['debug']: 'off';
    define('DEBUG_ENABLED', $debug_enabled);
    xtec_debug("DEBUG ENABLED: $debug_enabled");
    
    $dbsource = isset($_GET['dbsource']) ? $_GET['dbsource']: $agora['dbsource']['defaulttype'];
    xtec_debug("Selected source: $dbsource");
	
    //Get info from cookie if exists
    $centre = $_REQUEST['ccentre'];

    if($centre == null){
        //Envia a una pàgina d'error
        header('location: '.WWWROOT.'error.php?s=moodle2&dns='.$_REQUEST['ccentre']);
        exit(0);
    }

    $school_info = getSchoolInfoFromFile($centre, $dbsource, 'moodle2');
    xtec_debug($school_info['source']);

    if($school_info === false) {
        header('location: '.WWWROOT.'error.php?s=moodle2&dns='.$_REQUEST['ccentre']);
        exit(0);
    }
    
    // Get the correct domain for the school (it's different if the school uses marsupial modules)
    $CFG->ismarsupial = array_key_exists('is_marsupial', $school_info) && $school_info['is_marsupial'];

    if (isset($CFG->ismarsupial) && $CFG->ismarsupial) {
        $moodle_wwwserver = $agora['server']['marsupial'];
    } else {
        $moodle_wwwserver = $agora['server']['server'];    
    }
  
    $moodle_wwwroot = $moodle_wwwserver . $agora['server']['base'];

    // Check if the domain is not the correct one and move if it isn't
    if (endsWith($moodle_wwwserver, $_SERVER['HTTP_HOST']) === false) {
        $location = $moodle_wwwserver.$_SERVER['REQUEST_URI'];
        header ('HTTP/1.1 301 Moved Permanently');
        header ('Location: '.$location);
        exit;
    }

    $moodle_dirroot = getMoodleDirrot($school_info, 'moodle2');
    if (!empty($school_info['new_dns'])) {
         $newadress = $moodle_wwwroot . $school_info['new_dns'] . '/' . $moodle_dirroot;
         header('location: '.$moodle_wwwroot.'error.php?newaddress='.$newadress);
         exit(0);
    }

    if (!isset($school_info['id_moodle2']) || empty($school_info['id_moodle2'])) {
        header('location: '.WWWROOT.'error.php?s=moodle2&dns='.$_REQUEST['ccentre']);
        exit(0);
    }

    $CFG->dbname    = $school_info['database_moodle2'];
    $CFG->dbuser    = $agora['moodle']['username'] . $school_info['id_moodle2'];
    $CFG->wwwroot   = $moodle_wwwroot.$centre . '/' . $moodle_dirroot;
    $CFG->wwwroot19 = $moodle_wwwroot.$centre . '/' . getMoodleDirrot($school_info, 'moodle');
    $CFG->dataroot  = INSTALL_BASE . $agora['moodle2']['datadir'] . $agora['moodle']['username'] . $school_info['id_moodle2'];
    $CFG->dnscentre = $centre;
