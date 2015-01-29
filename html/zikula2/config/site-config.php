<?php

    require_once('../config/dblib-mysql.php');

    global $school_info;
    $centre = getSchoolInfo('intranet');

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
        $ZConfig['DBInfo']['databases']['default']['portmigrate'] = 3306;
    }

    $ZConfig['DBInfo']['databases']['default']['host']        = $dbhoststring;
    $ZConfig['DBInfo']['databases']['default']['dbname']      = $database_intranet;
    $ZConfig['System']['temp'] = $agora['server']['root'] . $agora['intranet']['datadir'] . $database_intranet . '/pnTemp';

    $ZConfig['DBInfo']['databases']['moodle2']['dbtabletype'] = $agora['intranet']['moodle_dbtype'];
    $ZConfig['DBInfo']['databases']['moodle2']['dbdriver']    = 'oci8';
    $ZConfig['DBInfo']['databases']['moodle2']['host']        = $agora['moodle2']['dbhost'];
    $ZConfig['DBInfo']['databases']['moodle2']['password']    = $agora['moodle2']['userpwd'];
    $ZConfig['DBInfo']['databases']['moodle2']['dbname']      = $school_info['database_moodle2'];
    $ZConfig['DBInfo']['databases']['moodle2']['user']        = $agora['moodle2']['userprefix'] . $school_info['id_moodle2'];
    $ZConfig['DBInfo']['databases']['moodle2']['charset']     = 'utf8';
    $ZConfig['DBInfo']['databases']['moodle2']['collate']     = 'utf8_general_ci';

    // Needed for SSO with Moodle for salted passwords created in Moodle
    $ZConfig['MoodleSalt'][0] = 'y7a!Eb019n8Z5*43Sl5J&ly4pjJUk-b';
    $ZConfig['centre']['nomPropi'] = $centre;
