<?php
	
    require_once(INSTALL_BASE.'/html/config/dblib-mysql.php');
	
    // Debug code
    $debug_enabled = isset($_GET['debug']) ? $_GET['debug']: 'off';
    define('DEBUG_ENABLED', $debug_enabled);
    xtec_debug("DEBUG ENABLED: $debug_enabled");
    
    $dbsource = isset($_GET['dbsource']) ? $_GET['dbsource']: $agora['dbsource']['defaulttype'];
    xtec_debug("Selected source: $dbsource");
    // End debug
	
    //Get info from cookie if exists
    $centre = $_REQUEST['ccentre'];

    if($centre == null){
        //Envia a una pàgina d'error
        header('location: '.WWWROOT.'error.php?s=moodle&dns='.$_REQUEST['ccentre']);
        exit(0);
    }

    $school_info = getSchoolInfoFromFile($centre, $dbsource, 'moodle');
    xtec_debug($school_info['source']);

    if($school_info === false) {
        header('location: '.WWWROOT.'error.php?s=moodle&dns='.$_REQUEST['ccentre']);
        exit(0);
    }

    // Check to disconnect usu1
    $disconnectfile = INSTALL_BASE . $agora['moodle']['datadir'] . $agora['moodle']['userprefix'] . '2/1/usu1off.txt';

    // Check if logs are on. There's no database at this stage, so an alternative control system is mandatory.
    if (($school_info['id_moodle'] == 1) && file_exists($disconnectfile)) {
		$gestor = fopen($disconnectfile, 'rb');
		if ($gestor) {
			// Send file to screen in small chunks for efficience
			while (!feof($gestor)) {
				echo fread($gestor, 8192);
			}
			fclose($gestor);
		} else {
            echo '<html><body>';
            echo '<div style="text-align:center; font-size:large; border-width:1px; '.
                 '    border-color:#CCC; border-style:solid; border-radius: 20px; border-collapse: collapse; '.
                 '    -moz-border-radius:20px; padding:15px; margin: 200px 100px 0px 100px;">';
            echo '<h2>Aturada per manteniment</h2>';
            echo '<p>El portal de suport d\'Àgora està en procés d\'actualització i es troba fora de servei. El portal es tornarà obrir en unes hores.</p>';
            echo '<p style="font-size:medium">Preguem disculpeu les molèsties.</p>';
            echo '</div></body></html>';
        }
        exit(0);
    }

    // Get the correct domain for the school (it's different if the school uses marsupial modules)
    $CFG->ismarsupial = array_key_exists('is_marsupial', $school_info) && $school_info['is_marsupial'];
    $moodle_wwwserver = $agora['server']['server'];
    if (isset($CFG->ismarsupial) && $CFG->ismarsupial){
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
    $CFG->dbuser    = $agora['moodle']['userprefix'].$school_info['id_moodle'];
//    $CFG->wwwroot   = $moodle_wwwroot.$centre.'/'.MOODLE_DIRROOT;
    $CFG->wwwroot   = $moodle_wwwroot.$centre.'/'.$moodle_dirroot;
    $CFG->dataroot  = INSTALL_BASE.$agora['moodle']['datadir'].$agora['moodle']['userprefix'].$school_info['id_moodle'];
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

    