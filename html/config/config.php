<?php

    // Params common in all environments

    // Params for Moodle 2
    $agora['moodle2']['dbtype']            = 'pgsql';                         // oci (Oracle), mysql, pgsql
    $agora['moodle2']['prefix']            = 'm2';                            // Moodle 2.x tables prefix (only 2 chars)
    $agora['moodle2']['dbhost']            = '';                              // Set dynamically
    $agora['moodle2']['port']              = '5432';                          // Default value
    $agora['moodle2']['username']          = $agora['server']['userprefix'];
    $agora['moodle2']['diskusagefile']     = 'diskUsageMdl2.txt';
    $agora['moodle2']['repository_files']  = '/repository/files/';                      // Folder for uploading big files
    $agora['moodle2']['userprefix']        = $agora['server']['userprefix'];            // All services need to have the same variable name
    $agora['moodle2']['localmuc']          = $agora['server']['localdatadir'] . 'localmuc';  // MUC elements in web server (not shared)

    // Params for Zikula (pending removal)
    $agora['intranet']['dbtype']           = 'mysql';
    $agora['intranet']['adminuser']        = 'adminagora';
    $agora['intranet']['prefix']           = '';
    $agora['intranet']['diskusagefile']    = 'diskUsageZk.txt';
    $agora['intranet']['moodle_dbtype']    = 'oci8';               // Tipus de BBDD del Moodle. El Zikula no accepta oci8po.
    $agora['intranet']['userprefix']       = $agora['server']['userprefix'];

    // Params for WordPress
    $agora['nodes']['dbtype']              = 'mysql';
    $agora['nodes']['prefix']              = 'wp';
    $agora['nodes']['userprefix']          = $agora['server']['userprefix'];
    $agora['nodes']['diskusagefile']       = 'diskUsageWp.txt';

    // General vars
    switch($agora['server']['enviroment']) {
        case 'INT':
            $agora['server']['school_information'] = 'https://integracio.aplicacions.ensenyament.gencat.cat/pls/xtec/agora_dades_centre?p_codi_centre=';
            break;
        case 'ACC':
        case 'PRE':
            $agora['server']['school_information'] = 'https://preproduccio.aplicacions.ensenyament.gencat.cat/pls/xtec/agora_dades_centre?p_codi_centre=';
            break;
        case 'PRO':
        default:
            $agora['server']['school_information'] = 'https://aplicacions.ensenyament.gencat.cat/pls/xtec/agora_dades_centre?p_codi_centre=';
            break;
    }

    $agora['server']['html']               = $agora['server']['server'] . $agora['server']['base'];
    $agora['server']['cookie']             = 'agoraSchool' . $agora['server']['enviroment'];
    $agora['server']['uploads']            = $agora['server']['root'] . $agora['server']['datadir'] . 'uploads/'; // Directori temporal per la pujada de fitxers grans. Després es mouran a cada usu.

    // Fitxer amb les CA reconegudes
    $agora['server']['ca_bundle']          = $agora['server']['root'] . 'html/config/ca-bundle.crt';

    // Database config info source
    $agora['dbsource']['defaulttype']      = 1; // 1.- allSchools.php  2.- Database
    $agora['dbsource']['dir']              = $agora['server']['root'] . $agora['server']['localdatadir'] . 'syncdata/';

    // xtecadmin
    $agora['xtecadmin']['mail']            = 'agora@xtec.invalid';

    // Proxy settings
    $agora['proxy']['host']                = '';
    $agora['proxy']['port']                = '';
    $agora['proxy']['user']                = '';
    $agora['proxy']['pass']                = '';

    // Constants used elsewhere
    define('WWWROOT', $agora['server']['server'] . $agora['server']['base']);

    $agora['iseoi'] = false;

    $agora['recaptchapublickey'] = '6LddJgoTAAAAAFCT6LwNkKU2YR2qNMG7fQgIXse8';
    $agora['recaptchaprivatekey'] = '6LddJgoTAAAAAKs-yBghGgTZmAB1oPLQlldWYKAh';
    $agora['google_api_key'] = 'AIzaSyAxh4zWTv9TEdDcxec9L2I2BmaiqG_g44U'; // API key for Google Calendar

    define('SERVEI_EDUCATIU_ID', 5);
    define('PROJECTES_TYPE_ID', 12);

/*
    // Codi dels talls de servei
    if (!strpos($_SERVER['REQUEST_URI'], "analytics1") &&
        !strpos($_SERVER['REQUEST_URI'], "analytics2") &&
        !strpos($_SERVER['REQUEST_URI'], "analytics3") &&
        !strpos($_SERVER['REQUEST_URI'], "aroga") &&
        !strpos($_SERVER['REQUEST_URI'], "analytics4")) {

        // Intervals de tall
        $talls = array( array('inici' => strtotime("22 Jul 2013 9 hours"), 'final' => strtotime("22 Jul 2013 17 hours")),
                        array('inici' => strtotime("23 Jul 2013 9 hours"), 'final' => strtotime("23 Jul 2013 17 hours")),
                        array('inici' => strtotime("24 Jul 2013 9 hours"), 'final' => strtotime("24 Jul 2013 17 hours")) );

        foreach ($talls as $tall) {

            $ara = time();

            // Es mira si el moment de carrega de la pagina esta dins d'algun interval de tall
            if ($ara > $tall['inici'] && $ara < $tall['final']) {
                 header("Location: https://sites.google.com/a/xtec.cat/agora/anuncis/manteniment");
           }
        }
    }
*/
