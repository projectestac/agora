<?php

    require_once('../config/dblib-mysql.php');

    // Debug code
    $debug_enabled = isset($_GET['debug']) ? $_GET['debug']: 'off';
    define ('DEBUG_ENABLED', $debug_enabled);
    xtec_debug("DEBUG ENABLED: $debug_enabled");
    
    $dbsource = isset($_GET['dbsource']) ? $_GET['dbsource'] : $agora['dbsource']['defaulttype'];
    xtec_debug("Selected: $dbsource");
    // End debug

    // Get info from cookie if exists
    $centre = $_REQUEST['ccentre'];

    if ($centre == null){
        // Envia a una pàgina d'error
        header('location: '.WWWROOT.'error.php?s=intranet&dns='.$_REQUEST['ccentre']);
        exit(0);
    }

    /**
     * Configurar si llegir les dades de connexió des de l'allSchools o de la base de dades
     * 1 = Des del fitxer allSchools (predefinit)
     * 2 = Des de la base de dades
     **/
     
    $school_info = getSchoolInfoFromFile($centre, $dbsource, 'intranet');

    // Debug code
    xtec_debug ($school_info['source']);

    if ($school_info === false) {
        header('location: '.WWWROOT.'error.php?s=intranet&dns='.$_REQUEST['ccentre']);
        exit(0);
    }

    if (!empty($school_info['new_dns'])) {
        $newadress = WWWROOT . $school_info['new_dns'].'/intranet';
        header('location: '.WWWROOT.'error.php?newaddress='.$newadress);
        exit(0);
    }

    if (!isset($school_info['id_intranet']) || empty($school_info['id_intranet'])) {
        header('location: '.WWWROOT.'error.php?s=intranet&dns='.$_REQUEST['ccentre']);
        exit(0);
    }

    global $PNConfig;

    // Zikula doesn't use serviceDB param cause duplicates activedId param. serviceDB is
    //  necessary when using Oracle DDBB.
    $database_intranet = $agora['intranet']['userprefix'] . $school_info['id_intranet'];

    $PNConfig['Multisites']['multi']           = '1';
    $PNConfig['Multisites']['siteDNS']         = $agora['server']['base'] . $centre . '/intranet';
    $PNConfig['Multisites']['mainSiteURL']     = $agora['server']['base'] . $centre . '/intranet';
    $PNConfig['Multisites']['filesRealPath']   = $agora['server']['root'] . $agora['intranet']['datadir'] . $database_intranet;
    $PNConfig['Multisites']['siteFilesFolder'] = 'data';

    $PNConfig['DBInfo']['default']['dbhost']   = $school_info['dbhost_intranet'];
    $PNConfig['DBInfo']['default']['dbname']   = $database_intranet;
    $PNConfig['System']['temp']                = $agora['server']['root'] . $agora['intranet']['datadir'] . $database_intranet . '/pnTemp';

    $PNConfig['DBInfo']['moodle']['dbtype']    = $agora['intranet']['moodle_dbtype'];
    $PNConfig['DBInfo']['moodle']['dbhost']    = $agora['moodle']['dbhost'];
    $PNConfig['DBInfo']['moodle']['dbpass']    = $agora['moodle']['userpwd'];
    $PNConfig['DBInfo']['moodle']['dbname']    = $school_info['database_moodle'];
    $PNConfig['DBInfo']['moodle']['dbuname']   = $agora['moodle']['username'] . $school_info['id_moodle'];
    $PNConfig['DBInfo']['moodle']['encoded']   = 0;
    $PNConfig['DBInfo']['moodle']['pconnect']  = 1;

    $PNConfig['DBInfo']['moodle2']['dbtype']    = $agora['intranet']['moodle_dbtype'];
    $PNConfig['DBInfo']['moodle2']['dbhost']    = $agora['moodle']['dbhost'];
    $PNConfig['DBInfo']['moodle2']['dbpass']    = $agora['moodle']['userpwd'];
    $PNConfig['DBInfo']['moodle2']['dbname']    = $school_info['database_moodle'];
    $PNConfig['DBInfo']['moodle2']['dbuname']   = $agora['moodle']['username'] . $school_info['id_moodle'];
    $PNConfig['DBInfo']['moodle2']['encoded']   = 0;
    $PNConfig['DBInfo']['moodle2']['pconnect']  = 1;
