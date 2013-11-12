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

    global $ZConfig;

    // Zikula doesn't use serviceDB param cause duplicates activedId param. serviceDB is
    //  necessary when using Oracle DDBB.
    $database_intranet = $agora['intranet']['userprefix'] . $school_info['id_intranet'];

    $ZConfig['Multisites']['multi']           = '1';
    $ZConfig['Multisites']['siteDNS']         = $agora['server']['base'] . $centre . '/intranet';
    $ZConfig['Multisites']['mainSiteURL']     = $agora['server']['base'] . $centre . '/intranet';
    $ZConfig['Multisites']['filesRealPath']   = $agora['server']['root'] . $agora['intranet']['datadir'] . $database_intranet;
    $ZConfig['Multisites']['siteFilesFolder'] = 'data';

    // Special process of dbhost due to specifics of Doctrine
    $dbhost = explode(':', $school_info['dbhost_intranet']);
    if (!empty($dbhost[1])) {
        $dbhoststring = $dbhost[0] . ';port=' . $dbhost[1];
        // hostmigrate and portmigrate are used by Zikula's migrations and by IWmoodle
        $ZConfig['DBInfo']['databases']['default']['hostmigrate'] = $dbhost[0];
        $ZConfig['DBInfo']['databases']['default']['portmigrate'] = $dbhost[1];
    } else {
        $dbhoststring = $dbhost[0];
        // hostmigrate and portmigrate are used by Zikula's migrations and by IWmoodle
        $ZConfig['DBInfo']['databases']['default']['hostmigrate'] = $school_info['dbhost_intranet'];
        $ZConfig['DBInfo']['databases']['default']['portmigrate'] = '';
    }
    
    $ZConfig['DBInfo']['databases']['default']['host']        = $dbhoststring;
    $ZConfig['DBInfo']['databases']['default']['dbname']      = $database_intranet;
    $ZConfig['System']['temp'] = $agora['server']['root'] . $agora['intranet']['datadir'] . $database_intranet . '/pnTemp';

    $ZConfig['DBInfo']['databases']['moodle2']['dbtabletype'] = $agora['intranet']['moodle_dbtype'];
    $ZConfig['DBInfo']['databases']['moodle2']['dbdriver']    = 'oci8';
    $ZConfig['DBInfo']['databases']['moodle2']['host']        = $agora['moodle']['dbhost'];
    $ZConfig['DBInfo']['databases']['moodle2']['password']    = $agora['moodle']['userpwd'];
    $ZConfig['DBInfo']['databases']['moodle2']['dbname']      = $school_info['database_moodle2'];
    $ZConfig['DBInfo']['databases']['moodle2']['user']        = $agora['moodle']['username'] . $school_info['id_moodle2'];
    $ZConfig['DBInfo']['databases']['moodle2']['charset']     = 'utf8';
    $ZConfig['DBInfo']['databases']['moodle2']['collate']     = 'utf8_general_ci';

    // Needed for SSO with Moodle for salted passwords created in Moodle
    $ZConfig['MoodleSalt'][0] = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';
    $ZConfig['centre']['nomPropi'] = $centre;	