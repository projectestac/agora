<?php
	
    require_once(INSTALL_BASE.'/html/config/dblib-mysql.php');
	
    //Per configurar l'acces de la site
    /*TO ERASE 5*/
    $debug_enabled = isset($_GET['debug']) ? $_GET['debug']: 'off';
    define('DEBUG_ENABLED', $debug_enabled);
    xtec_debug("DEBUG ENABLED: $debug_enabled");
    
    $dbsource = isset($_GET['dbsource']) ? $_GET['dbsource']: $agora['dbsource']['defaulttype'];
    xtec_debug("Selected source: $dbsource");
	
    //Get info from cookie if exists
    $centre = $_REQUEST['ccentre'];

    if($centre == null){
        //Envia a una pàgina d'error
        header('location: '.WWWROOT.'error.php?s=moodle&dns='.$_REQUEST['ccentre']);
        exit(0);
    }

     $school_info = getSchoolInfoFromFile($centre, $dbsource, 'moodle');
     /*TO ERASE*/
     xtec_debug($school_info['source']);

    if($school_info === false) {
        header('location: '.WWWROOT.'error.php?s=moodle&dns='.$_REQUEST['ccentre']);
        exit(0);
    }
    
    // Get the correct domain for the school (it's different if the school uses marsupial modules)
    //$CFG->ismarsupial = $school_info['type']=='MARSUPIAL';
    $CFG->ismarsupial = array_key_exists('is_marsupial', $school_info) && $school_info['is_marsupial'];
    $moodle_wwwserver = $agora['server']['server'];
    if (isset($CFG->ismarsupial) && $CFG->ismarsupial ){
        $moodle_wwwserver = $agora['server']['marsupial'];
    }
    $moodle_wwwroot = $moodle_wwwserver.$agora['server']['base'];
   
    // Check if the domain is not the correct one and move if it isn't
    if (endsWith($moodle_wwwserver, $_SERVER['HTTP_HOST']) === FALSE){
        $location = $moodle_wwwserver.$_SERVER['REQUEST_URI'];
        header ('HTTP/1.1 301 Moved Permanently');
        header ('Location: '.$location);
        exit;    
    }

    $moodle_dirroot = getMoodleDirrot($school_info, 'moodle');
    if(!empty($school_info['new_dns'])){
         $newadress = $moodle_wwwroot . $school_info['new_dns'] . '/'.$moodle_dirroot;
         header('location: '.$moodle_wwwroot.'error.php?newaddress='.$newadress);
         exit(0);
    }

    if (!isset($school_info['id_moodle']) || empty($school_info['id_moodle'])) {
        header('location: '.WWWROOT.'error.php?s=moodle&dns='.$_REQUEST['ccentre']);
        exit(0);
    } else {
        $currenthour = date('G');
        if ($agora['server']['enviroment'] == 'FRM') {
            // Change id for usu1 for training environment if is an odd hour (usu1 regenerates every odd hour)
            if ($school_info['id_moodle2'] == 1 && $currenthour % 2 != 0) {
                $school_info['id_moodle2'] = 10000;
            }
        }
    }
    
    //New definition in moodle/site-config.php
    $CFG->dbname    = $school_info['database_moodle'];
    $CFG->dbuser    = $agora['moodle']['username'].$school_info['id_moodle'];
//    $CFG->wwwroot   = $moodle_wwwroot.$centre.'/'.MOODLE_DIRROOT;
    $CFG->wwwroot   = $moodle_wwwroot.$centre.'/'.$moodle_dirroot;
    $CFG->dataroot  = INSTALL_BASE.$agora['moodle']['datadir'].$agora['moodle']['username'].$school_info['id_moodle'];
    $CFG->dnscentre = $centre;
    
//    if ($agora['server']['enviroment'] == 'FOR'){

        // Show maintenance file if exists
        $climaintenancefile = $CFG->dataroot.'/climaintenance.html';
        if (file_exists ($climaintenancefile)){
            // Open file
            $file = fopen($climaintenancefile, 'rb');
            if ($file) {
                // Send file to screen in small chunks for efficience
                while (!feof($file)) {
                        echo fread($file, 8192);
                }
                // Close file
                fclose($file);
                die();            
            }
        }
        
//    }

    