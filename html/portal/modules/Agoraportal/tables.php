<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Define module tables
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function Agoraportal_tables() {
    // Initialise table array
    $table = array();

    // agoraportal_clients table definition
    $table['agoraportal_clients'] = DBUtil::getLimitedTablename('agoraportal_clients');
    $table['agoraportal_clients_column'] = array('clientId' => 'clientId',
        'clientCode' => 'clientCode',
        'clientDNS' => 'clientDNS',
        'clientOldDNS' => 'clientOldDNS',
        'clientName' => 'clientName',
        'clientAddress' => 'clientAddress',
        'clientCity' => 'clientCity',
        'clientPC' => 'clientPC',
        'clientCountry' => 'clientCountry',
        'clientDescription' => 'clientDescription',
        'clientState' => 'clientState',
        'locationId' => 'locationId',
        'typeId' => 'typeId',
        'noVisible' => 'noVisible',
        'extraFunc' => 'extraFunc',
        'educat' => 'educat',
    );

    $table['agoraportal_clients_column_def'] = array('clientId' => "I NOTNULL AUTO PRIMARY",
        'clientCode' => "C(15) NOTNULL DEFAULT ''",
        'clientDNS' => "C(50) NOTNULL DEFAULT ''",
        'clientOldDNS' => "C(50) NOTNULL DEFAULT ''",
        'clientName' => "C(150) NOTNULL DEFAULT ''",
        'clientAddress' => "C(150) NOTNULL DEFAULT ''",
        'clientCity' => "C(50) NOTNULL DEFAULT ''",
        'clientPC' => "C(5) NOTNULL DEFAULT ''",
        'clientCountry' => "C(3) NOTNULL DEFAULT 'cat'",
        'clientDescription' => "C(255) NOTNULL DEFAULT ''",
        'clientState' => "I(1) NOTNULL DEFAULT '0'",
        'locationId' => "I NOTNULL",
        'typeId' => "I(1) NOTNULL DEFAULT 0",
        'noVisible' => "I(1) NOTNULL DEFAULT '0'",
        'extraFunc' => "C(15) NOTNULL DEFAULT ''",
        'educat' => "I(1) NOTNULL DEFAULT 0",
    );

    // agoraportal_services table definition
    $table['agoraportal_services'] = DBUtil::getLimitedTablename('agoraportal_services');
    $table['agoraportal_services_column'] = array('serviceId' => 'serviceId',
        'serviceName' => 'serviceName',
        'URL' => 'URL',
        'description' => 'description',
        'hasDB' => 'hasDB',
        'defaultDiskSpace' => 'defaultDiskSpace',
        'allowedClients' => 'allowedClients',
        );

    $table['agoraportal_services_column_def'] = array('serviceId' => "I NOTNULL AUTO PRIMARY",
        'serviceName' => "C(150) NOTNULL DEFAULT ''",
        'URL' => "C(50) NOTNULL DEFAULT ''",
        'description' => "C(255) NOTNULL DEFAULT ''",
        'hasDB' => 'I(1) NOTNULL DEFAULT 0',
        'defaultDiskSpace' => "I(6) NOTNULL DEFAULT 0",
        'allowedClients' => "X NOTNULL",
        );

    // agoraportal_client_services table definition
    $table['agoraportal_client_services'] = DBUtil::getLimitedTablename('agoraportal_client_services');
    $table['agoraportal_client_services_column'] = array('clientServiceId' => 'clientServiceId',
        'serviceId' => 'serviceId',
        'clientId' => 'clientId',
        'serviceDB' => 'serviceDB',
        'dbHost' => 'dbHost',
        'description' => 'description',
        'state' => 'state',
        'activedId' => 'activedId',
        'contactName' => 'contactName',
        'contactProfile' => 'contactProfile',
        'timeCreated' => 'timeCreated',
        'observations' => 'observations',
        'annotations' => 'annotations',
        'diskSpace' => 'diskSpace',
        'timeEdited' => 'timeEdited',
        'timeRequested' => 'timeRequested',
        'diskConsume' => 'diskConsume',
    );

    $table['agoraportal_client_services_column_def'] = array('clientServiceId' => "I NOTNULL AUTO PRIMARY",
        'serviceId' => "I NOTNULL",
        'clientId' => "I NOTNULL",
        'serviceDB' => "C(20) NOTNULL DEFAULT ''",
        'dbHost' => "C(25) NOTNULL DEFAULT ''",
        'description' => "C(255) NOTNULL DEFAULT ''",
        'state' => "I(1) NOTNULL DEFAULT '0'",
        'activedId' => "I NOTNULL DEFAULT '0'",
        'contactName' => "C(150) NOTNULL DEFAULT ''",
        'contactProfile' => "C(50) NOTNULL DEFAULT ''",
        'timeCreated' => "C(25) NOTNULL DEFAULT ''",
        'observations' => "C(255) NOTNULL DEFAULT ''",
        'annotations' => "C(255) NOTNULL DEFAULT ''",
        'diskSpace' => "I NOTNULL DEFAULT 0",
        'timeEdited' => "C(25) NOTNULL DEFAULT ''",
        'timeRequested' => "C(25) NOTNULL DEFAULT ''",
        'diskConsume' => "C(15) NOTNULL DEFAULT ''",
    );

    // agoraportal_location table definition
    $table['agoraportal_location'] = DBUtil::getLimitedTablename('agoraportal_location');
    $table['agoraportal_location_column'] = array('locationId' => 'locationId',
        'locationName' => 'locationName');

    $table['agoraportal_location_column_def'] = array('locationId' => "I NOTNULL AUTO PRIMARY",
        'locationName' => "C(100) NOTNULL DEFAULT ''");

    // agoraportal_clientType table definition
    $table['agoraportal_clientType'] = DBUtil::getLimitedTablename('agoraportal_clientType');
    $table['agoraportal_clientType_column'] = array('typeId' => 'typeId',
        'typeName' => 'typeName');

    $table['agoraportal_clientType_column_def'] = array('typeId' => "I NOTNULL AUTO PRIMARY",
        'typeName' => "C(100) NOTNULL DEFAULT ''");

    // agoraportal_clientSettings table definition
    $table['agoraportal_client_settings'] = DBUtil::getLimitedTablename('agoraportal_client_settings');
    $table['agoraportal_client_settings_column'] = array('settingsId' => 'settingsId',
        'clientCode' => 'clientCode',
        'parameter' => 'parameter',
        'value' => 'value');

    $table['agoraportal_client_settings_column_def'] = array('settingsId' => "I NOTNULL AUTO PRIMARY",
        'clientCode' => "C(15) NOTNULL DEFAULT ''",
        'parameter' => "C(100) NOTNULL DEFAULT ''",
        'value' => "X NOTNULL");
    // agoraportal_ldap_asynchronous table definition
    $table['agoraportal_ldap_asynchronous'] = DBUtil::getLimitedTablename('agoraportal_ldap_asynchronous');
    $table['agoraportal_ldap_asynchronous_column'] = array('ldapId' => 'ldapId',
        'clientCode' => 'clientCode',
        'actionType' => 'actionType',
        'actionResult' => 'actionResult',
        'valuesLDAP' => 'valuesLDAP',
        'managerId' => 'managerId',
        'dateAdded' => 'dateAdded',
        'lastAttempt' => 'lastAttempt');
    $table['agoraportal_ldap_asynchronous_column_def'] = array('ldapId' => "I NOTNULL AUTO PRIMARY",
        'clientCode' => "C(15) NOTNULL DEFAULT ''",
        'actionType' => "C(15) NOTNULL DEFAULT ''",
        'actionResult' => "I NOTNULL",
        'valuesLDAP' => "X NOTNULL",
        'managerId' => "I NOTNULL",
        'dateAdded' => "C(20) NOTNULL DEFAULT ''",
        'lastAttempt' => "C(20) NOTNULL DEFAULT ''");

    // agoraportal_client_managers table definition
    $table['agoraportal_client_managers'] = DBUtil::getLimitedTablename('agoraportal_client_managers');
    $table['agoraportal_client_managers_column'] = array('managerId' => 'managerId',
        'clientCode' => 'clientCode',
        'managerUName' => 'managerUName');
    $table['agoraportal_client_managers_column_def'] = array('managerId' => "I NOTNULL AUTO PRIMARY",
        'clientCode' => "C(15) NOTNULL DEFAULT ''",
        'managerUName' => "C(15) NOTNULL DEFAULT ''");
    //agoraportal_mysql_comands table definition
    $table['agoraportal_mysql_comands'] = DBUtil::getLimitedTablename('agoraportal_mysql_comands');
    $table['agoraportal_mysql_comands_column'] = array('comandId' => 'comandId',
        'serviceId' => 'serviceId',
        'comand' => 'comand',
        'description' => 'description',
        'type' => 'type');
    $table['agoraportal_mysql_comands_column_def'] = array('comandId' => "I NOTNULL AUTO PRIMARY",
        'serviceId' => "I NOTNULL",
        'comand' => "X NOTNULL DEFAULT ''",
        'description' => "X NOTNULL DEFAULT ''",
        'type' => "I(1) NOTNULL DEFAULT '0'");

    //Statistics
    $table['agoraportal_moodle_stats_day'] = DBUtil::getLimitedTablename('agoraportal_moodle_stats_day');
    $table['agoraportal_moodle_stats_day_column'] = array('clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'date' => 'date',
        'h0' => 'h0',
        'h1' => 'h1',
        'h2' => 'h2',
        'h3' => 'h3',
        'h4' => 'h4',
        'h5' => 'h5',
        'h6' => 'h6',
        'h7' => 'h7',
        'h8' => 'h8',
        'h9' => 'h9',
        'h10' => 'h10',
        'h11' => 'h11',
        'h12' => 'h12',
        'h13' => 'h13',
        'h14' => 'h14',
        'h15' => 'h15',
        'h16' => 'h16',
        'h17' => 'h17',
        'h18' => 'h18',
        'h19' => 'h19',
        'h20' => 'h20',
        'h21' => 'h21',
        'h22' => 'h22',
        'h23' => 'h23',
        'total' => 'total',
        'usersconfnodel' => 'usersconfnodel',
        'usersactive' => 'usersactive',
        'usersactivelast90days' => 'usersactivelast90days',
        'usersactivelast30days' => 'usersactivelast30days',
        'diskConsume' => 'diskConsume',
        );
    $table['agoraportal_moodle_stats_day_column_def'] = array('clientcode' => 'C(10) NOT NULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL DEFAULT \'\'',
        'date' => 'INT(8) NOTNULL',
        'h0' => 'I DEFAULT 0',
        'h1' => 'I DEFAULT 0',
        'h2' => 'I DEFAULT 0',
        'h3' => 'I DEFAULT 0',
        'h4' => 'I DEFAULT 0',
        'h5' => 'I DEFAULT 0',
        'h6' => 'I DEFAULT 0',
        'h7' => 'I DEFAULT 0',
        'h8' => 'I DEFAULT 0',
        'h9' => 'I DEFAULT 0',
        'h10' => 'I DEFAULT 0',
        'h11' => 'I DEFAULT 0',
        'h12' => 'I DEFAULT 0',
        'h13' => 'I DEFAULT 0',
        'h14' => 'I DEFAULT 0',
        'h15' => 'I DEFAULT 0',
        'h16' => 'I DEFAULT 0',
        'h17' => 'I DEFAULT 0',
        'h18' => 'I DEFAULT 0',
        'h19' => 'I DEFAULT 0',
        'h20' => 'I DEFAULT 0',
        'h21' => 'I DEFAULT 0',
        'h22' => 'I DEFAULT 0',
        'h23' => 'I DEFAULT 0',
        'total' => 'I DEFAULT 0',
        'usersconfnodel' => 'I DEFAULT 0',
        'usersactive' => 'I DEFAULT 0',
        'usersactivelast90days' => 'I DEFAULT 0',
        'usersactivelast30days' => 'I DEFAULT 0',
        'diskConsume' => "C(15) NOTNULL DEFAULT '0'",
        );
    $table['agoraportal_moodle2_stats_day'] = DBUtil::getLimitedTablename('agoraportal_moodle2_stats_day');
    $table['agoraportal_moodle2_stats_day_column'] = array('clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'date' => 'date',
        'h0' => 'h0',
        'h1' => 'h1',
        'h2' => 'h2',
        'h3' => 'h3',
        'h4' => 'h4',
        'h5' => 'h5',
        'h6' => 'h6',
        'h7' => 'h7',
        'h8' => 'h8',
        'h9' => 'h9',
        'h10' => 'h10',
        'h11' => 'h11',
        'h12' => 'h12',
        'h13' => 'h13',
        'h14' => 'h14',
        'h15' => 'h15',
        'h16' => 'h16',
        'h17' => 'h17',
        'h18' => 'h18',
        'h19' => 'h19',
        'h20' => 'h20',
        'h21' => 'h21',
        'h22' => 'h22',
        'h23' => 'h23',
        'total' => 'total',
        'userstotal' => 'userstotal',
        'usersnodelsus' => 'usersnodelsus',
        'usersactive' => 'usersactive',
        'usersactivelast90days' => 'usersactivelast90days',
        'usersactivelast30days' => 'usersactivelast30days',
        'diskConsume' => 'diskConsume',
        );
    $table['agoraportal_moodle2_stats_day_column_def'] = array('clientcode' => 'C(10) NOT NULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL DEFAULT \'\'',
        'date' => 'INT(8) NOTNULL',
        'h0' => 'I DEFAULT 0',
        'h1' => 'I DEFAULT 0',
        'h2' => 'I DEFAULT 0',
        'h3' => 'I DEFAULT 0',
        'h4' => 'I DEFAULT 0',
        'h5' => 'I DEFAULT 0',
        'h6' => 'I DEFAULT 0',
        'h7' => 'I DEFAULT 0',
        'h8' => 'I DEFAULT 0',
        'h9' => 'I DEFAULT 0',
        'h10' => 'I DEFAULT 0',
        'h11' => 'I DEFAULT 0',
        'h12' => 'I DEFAULT 0',
        'h13' => 'I DEFAULT 0',
        'h14' => 'I DEFAULT 0',
        'h15' => 'I DEFAULT 0',
        'h16' => 'I DEFAULT 0',
        'h17' => 'I DEFAULT 0',
        'h18' => 'I DEFAULT 0',
        'h19' => 'I DEFAULT 0',
        'h20' => 'I DEFAULT 0',
        'h21' => 'I DEFAULT 0',
        'h22' => 'I DEFAULT 0',
        'h23' => 'I DEFAULT 0',
        'total' => 'I DEFAULT 0',
        'userstotal' => 'I DEFAULT 0',
        'usersnodelsus' => 'I DEFAULT 0',
        'usersactive' => 'I DEFAULT 0',
        'usersactivelast90days' => 'I DEFAULT 0',
        'usersactivelast30days' => 'I DEFAULT 0',
        'diskConsume' => "C(15) NOTNULL DEFAULT '0'",
        );

    $table['agoraportal_moodle_stats_month'] = DBUtil::getLimitedTablename('agoraportal_moodle_stats_month');
    $table['agoraportal_moodle_stats_month_column'] = array('clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'yearmonth' => 'yearmonth',
        'usersactive' => 'usersactive',
        'usersactivelast30days' => 'usersactivelast30days',
        'courses' => 'courses',
        'activities' => 'activities',
        'lastaccess' => 'lastaccess',
        'lastaccess_date' => 'lastaccess_date',
        'lastaccess_user' => 'lastaccess_user',
        'total_access' => 'total_access',
        'diskConsume' => 'diskConsume',
        );
    $table['agoraportal_moodle_stats_month_column_def'] = array('clientcode' => 'C(10) NOT NULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL',
        'yearmonth' => 'INT(6) NOT NULL',
        'usersactive' => 'I DEFAULT 0',
        'usersactivelast30days' => 'I DEFAULT 0',
        'courses' => 'I DEFAULT 0',
        'activities' => 'I DEFAULT 0',
        'lastaccess' => 'C(50) DEFAULT \'\'',
        'lastaccess_date' => 'C(50) DEFAULT \'\'',
        'lastaccess_user' => 'C(50) DEFAULT \'\'',
        'total_access' => 'I DEFAULT 0',
        'diskConsume' => "C(15) NOTNULL DEFAULT '0'",
        );

    $table['agoraportal_moodle2_stats_month'] = DBUtil::getLimitedTablename('agoraportal_moodle2_stats_month');
    $table['agoraportal_moodle2_stats_month_column'] = array('clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'yearmonth' => 'yearmonth',
        'usersactive' => 'usersactive',
        'usersactivelast30days' => 'usersactivelast30days',
        'courses' => 'courses',
        'activities' => 'activities',
        'lastaccess' => 'lastaccess',
        'lastaccess_date' => 'lastaccess_date',
        'lastaccess_user' => 'lastaccess_user',
        'total_access' => 'total_access',
        'diskConsume' => 'diskConsume',
        );
    $table['agoraportal_moodle2_stats_month_column_def'] = array('clientcode' => 'C(10) NOT NULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL',
        'yearmonth' => 'INT(6) NOT NULL',
        'usersactive' => 'I DEFAULT 0',
        'usersactivelast30days' => 'I DEFAULT 0',
        'courses' => 'I DEFAULT 0',
        'activities' => 'I DEFAULT 0',
        'lastaccess' => 'C(50) DEFAULT \'\'',
        'lastaccess_date' => 'C(50) DEFAULT \'\'',
        'lastaccess_user' => 'C(50) DEFAULT \'\'',
        'total_access' => 'I DEFAULT 0',
        'diskConsume' => "C(15) NOTNULL DEFAULT '0'",
        );

    $table['agoraportal_moodle_stats_week'] = DBUtil::getLimitedTablename('agoraportal_moodle_stats_week');
    $table['agoraportal_moodle_stats_week_column'] = array('clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'date' => 'date',
        'usersactive' => 'usersactive',
        'courses' => 'courses',
        'activities' => 'activities',
        'lastaccess' => 'lastaccess',
        'lastaccess_date' => 'lastaccess_date',
        'lastaccess_user' => 'lastaccess_user',
        'total_access' => 'total_access',
        );
    $table['agoraportal_moodle_stats_week_column_def'] = array('clientcode' => 'C(10) NOT NULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL',
        'date' => 'I(8) NOT NULL',
        'usersactive' => 'I DEFAULT 0',
        'courses' => 'I DEFAULT 0',
        'activities' => 'I DEFAULT 0',
        'lastaccess' => 'C(50) DEFAULT \'\'',
        'lastaccess_date' => 'C(50) DEFAULT \'\'',
        'lastaccess_user' => 'C(50) DEFAULT \'\'',
        'total_access' => 'I DEFAULT 0',
        );

    $table['agoraportal_moodle2_stats_week'] = DBUtil::getLimitedTablename('agoraportal_moodle2_stats_week');
    $table['agoraportal_moodle2_stats_week_column'] = array('clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'date' => 'date',
        'usersactive' => 'usersactive',
        'courses' => 'courses',
        'activities' => 'activities',
        'lastaccess' => 'lastaccess',
        'lastaccess_date' => 'lastaccess_date',
        'lastaccess_user' => 'lastaccess_user',
        'total_access' => 'total_access',
        );
    $table['agoraportal_moodle2_stats_week_column_def'] = array('clientcode' => 'C(10) NOT NULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL',
        'date' => 'I(8) NOT NULL',
        'usersactive' => 'I DEFAULT 0',
        'courses' => 'I DEFAULT 0',
        'activities' => 'I DEFAULT 0',
        'lastaccess' => 'C(50) DEFAULT \'\'',
        'lastaccess_date' => 'C(50) DEFAULT \'\'',
        'lastaccess_user' => 'C(50) DEFAULT \'\'',
        'total_access' => 'I DEFAULT 0',
        );

    $table['agoraportal_intranet_stats_month'] = DBUtil::getLimitedTablename('agoraportal_intranet_stats_month');
    $table['agoraportal_intranet_stats_month_column'] = array('clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'yearmonth' => 'yearmonth',
        'd1' => 'd1',
        'd2' => 'd2',
        'd3' => 'd3',
        'd4' => 'd4',
        'd5' => 'd5',
        'd6' => 'd6',
        'd7' => 'd7',
        'd8' => 'd8',
        'd9' => 'd9',
        'd10' => 'd10',
        'd11' => 'd11',
        'd12' => 'd12',
        'd13' => 'd13',
        'd14' => 'd14',
        'd15' => 'd15',
        'd16' => 'd16',
        'd17' => 'd17',
        'd18' => 'd18',
        'd19' => 'd19',
        'd20' => 'd20',
        'd21' => 'd21',
        'd22' => 'd22',
        'd23' => 'd23',
        'd24' => 'd24',
        'd25' => 'd25',
        'd26' => 'd26',
        'd27' => 'd27',
        'd28' => 'd28',
        'd29' => 'd29',
        'd30' => 'd30',
        'd31' => 'd31',
        'total' => 'total',
        'usersactive' => 'usersactive',
        );
    $table['agoraportal_intranet_stats_month_column_def'] = array('clientcode' => 'C(10) NOT NULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL DEFAULT \'\'',
        'yearmonth' => 'INT(6) NOTNULL',
        'd1' => 'I DEFAULT 0',
        'd2' => 'I DEFAULT 0',
        'd3' => 'I DEFAULT 0',
        'd4' => 'I DEFAULT 0',
        'd5' => 'I DEFAULT 0',
        'd6' => 'I DEFAULT 0',
        'd7' => 'I DEFAULT 0',
        'd8' => 'I DEFAULT 0',
        'd9' => 'I DEFAULT 0',
        'd10' => 'I DEFAULT 0',
        'd11' => 'I DEFAULT 0',
        'd12' => 'I DEFAULT 0',
        'd13' => 'I DEFAULT 0',
        'd14' => 'I DEFAULT 0',
        'd15' => 'I DEFAULT 0',
        'd16' => 'I DEFAULT 0',
        'd17' => 'I DEFAULT 0',
        'd18' => 'I DEFAULT 0',
        'd19' => 'I DEFAULT 0',
        'd20' => 'I DEFAULT 0',
        'd21' => 'I DEFAULT 0',
        'd22' => 'I DEFAULT 0',
        'd23' => 'I DEFAULT 0',
        'd24' => 'I DEFAULT 0',
        'd25' => 'I DEFAULT 0',
        'd26' => 'I DEFAULT 0',
        'd27' => 'I DEFAULT 0',
        'd28' => 'I DEFAULT 0',
        'd29' => 'I DEFAULT 0',
        'd30' => 'I DEFAULT 0',
        'd31' => 'I DEFAULT 0',
        'total' => 'I DEFAULT 0',
        'usersactive' => 'I DEFAULT 0',
        );

    // agoraportal_requestTypes table definition
    $table['agoraportal_requestTypes'] = DBUtil::getLimitedTablename('agoraportal_requestTypes');
    $table['agoraportal_requestTypes_column'] = array('requestTypeId' => 'requestTypeId',
        'name' => 'name',
        'description' => 'description',
        'userCommentsText' => 'userCommentsText');

    $table['agoraportal_requestTypes_column_def'] = array('requestTypeId' => "I NOTNULL AUTO PRIMARY",
        'name' => "C(200) NOTNULL DEFAULT ''",
        'description' => "X NOTNULL DEFAULT ''",
        'userCommentsText' => "X NOTNULL DEFAULT ''");


    // agoraportal_modelTypes table definition
    $table['agoraportal_modelTypes'] = DBUtil::getLimitedTablename('agoraportal_modelTypes');
    $table['agoraportal_modelTypes_column'] = array('modelTypeId' => 'modelTypeId',
        'shortcode' => 'shortcode',
        'description' => 'description',
        'url' => 'url',
        'dbHost' => 'dbHost'
        );

    $table['agoraportal_modelTypes_column_def'] = array('modelTypeId' => "I NOTNULL AUTO PRIMARY",
        'shortcode' => "C(50) NOTNULL DEFAULT ''",
        'description' => "C(255) NOTNULL DEFAULT ''",
        'url' => "C(255) NOTNULL DEFAULT ''",
        'dbHost' => "C(50) NOTNULL DEFAULT ''"
        );


    // agoraportal_requestTypesServices table definition
    $table['agoraportal_requestTypesServices'] = DBUtil::getLimitedTablename('agoraportal_requestTypesServices');
    $table['agoraportal_requestTypesServices_column'] = array('requestTypeId' => 'requestTypeId',
        'serviceId' => 'serviceId');

    $table['agoraportal_requestTypesServices_column_def'] = array('requestTypeId' => "I NOTNULL",
        'serviceId' => "I NOTNULL");

    // agoraportal_request table definition
    $table['agoraportal_request'] = DBUtil::getLimitedTablename('agoraportal_request');
    $table['agoraportal_request_column'] = array('requestId' => 'requestId',
        'requestTypeId' => 'requestTypeId',
        'serviceId' => 'serviceId',
        'clientId' => 'clientId',
        'userId' => 'userId',
        'userComments' => 'userComments',
        'adminComments' => 'adminComments',
        'privateNotes' => 'privateNotes',
        'requestStateId' => 'requestStateId',
        'timeCreated' => 'timeCreated',
        'timeClosed' => 'timeClosed');

    $table['agoraportal_request_column_def'] = array('requestId' => "I NOTNULL AUTO PRIMARY",
        'requestTypeId' => "I NOTNULL",
        'serviceId' => "I NOTNULL",
        'clientId' => "I NOTNULL",
        'userId' => "I NOTNULL",
        'userComments' => "X NOTNULL DEFAULT ''",
        'adminComments' => "X NOTNULL DEFAULT ''",
        'privateNotes' => "X NOTNULL DEFAULT ''",
        'requestStateId' => "I NOTNULL",
        'timeCreated' => "C(25) NOTNULL DEFAULT ''",
        'timeClosed' => "C(25) NOTNULL DEFAULT ''");

    // agoraportal_request table definition
    $table['agoraportal_logs'] = DBUtil::getLimitedTablename('agoraportal_logs');
    $table['agoraportal_logs_column'] = array('logId' => 'logId',
        'clientCode' => 'clientCode',
        'uname' => 'uname',
        'actionCode' => 'actionCode',
        'action' => 'action',
        'time' => 'time',
    );

    $table['agoraportal_logs_column_def'] = array('logId' => "I NOTNULL AUTO PRIMARY",
        'clientCode' => "C(15) NOTNULL DEFAULT ''",
        'uname' => "C(25) NOTNULL DEFAULT ''",
        'actionCode' => "I(1) NOTNULL DEFAULT '0'",
        'action' => "C(255) NOTNULL DEFAULT ''",
        'time' => "C(20) NOTNULL DEFAULT ''",
    );

    // agoraportal_queues definition
    $table['agoraportal_queues'] = DBUtil::getLimitedTablename('agoraportal_queues');
    $table['agoraportal_queues_column'] = array(
        'id' => 'id',
        'operation' => 'operation',
        'clientId' => 'clientId',
        'serviceId' => 'serviceId',
        'priority' => 'priority',
        'state' => 'state',
        'timeCreated' => 'timeCreated',
        'timeStart' => 'timeStart',
        'timeEnd' => 'timeEnd',
        'params' => 'params',
        'logId' => 'logId'
    );

    $table['agoraportal_queues_column_def'] = array(
        'id' => "I NOTNULL AUTO PRIMARY",
        'operation' => "C(100) NOTNULL",
        'clientId' => "I NOTNULL",
        'serviceId' => "I NOTNULL",
        'priority' => "I(25) NOTNULL DEFAULT '0'",
        'state' => "C(2) NOTNULL DEFAULT 'P'",
        'timeCreated' => "I(20)",
        'timeStart' => "I(20)",
        'timeEnd' => "I(20)",
        'params' => "X NOTNULL DEFAULT ''",
        'logId' => "I NOTNULL DEFAULT '0'"
    );

    // agoraportal_queues_log definition
    $table['agoraportal_queues_log'] = DBUtil::getLimitedTablename('agoraportal_queues_log');
    $table['agoraportal_queues_log_column'] = array(
        'id' => 'id',
        'content' => 'content',
        'timeModified' => 'timeModified'
    );

    $table['agoraportal_queues_log_column_def'] = array(
        'id' => "I NOTNULL AUTO PRIMARY",
        'content' => "X NOTNULL DEFAULT ''",
        'timeModified' => "C(20) NOTNULL DEFAULT ''"
    );

    $table['agoraportal_nodes_stats_day'] = DBUtil::getLimitedTablename('agoraportal_nodes_stats_day');
    $table['agoraportal_nodes_stats_day_column'] = array(
        'clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'date' => 'date',
        'total' => 'total',
        'posts' => 'posts',
        'userstotal' => 'userstotal',
        'usersactive' => 'usersactive',
        'usersactivelast30days' => 'usersactivelast30days',
        'usersactivelast90days' => 'usersactivelast90days',
        'diskConsume' => 'diskConsume',
        );
    $table['agoraportal_nodes_stats_day_column_def'] = array(
        'clientcode' => 'C(10) NOTNULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL default \'\'',
        'date' => 'I NOTNULL DEFAULT 0',
        'total' => 'I NOTNULL DEFAULT 0',
        'posts' => 'I NOTNULL DEFAULT 0',
        'userstotal' => 'I NOTNULL DEFAULT 0',
        'usersactive' => 'I NOTNULL DEFAULT 0',
        'usersactivelast30days' => 'I NOTNULL DEFAULT 0',
        'usersactivelast90days' => 'I NOTNULL DEFAULT 0',
        'diskConsume' => 'I NOTNULL DEFAULT 0',
        );

    $table['agoraportal_nodes_stats_month'] = DBUtil::getLimitedTablename('agoraportal_nodes_stats_month');
    $table['agoraportal_nodes_stats_month_column'] = array(
        'clientcode' => 'clientcode',
        'clientDNS' => 'clientDNS',
        'yearmonth' => 'yearmonth',
        'total' => 'total',
        'posts' => 'posts',
        'userstotal' => 'userstotal',
        'usersactive' => 'usersactive',
        'lastactivity' => 'lastactivity',
        'diskConsume' => 'diskConsume',
        );
    $table['agoraportal_nodes_stats_month_column_def'] = array(
        'clientcode' => 'C(10) NOTNULL default \'\'',
        'clientDNS' => 'C(50) NOTNULL default \'\'',
        'yearmonth' => 'I NOTNULL DEFAULT 0',
        'total' => 'I NOTNULL DEFAULT 0',
        'posts' => 'I NOTNULL DEFAULT 0',
        'userstotal' => 'I NOTNULL DEFAULT 0',
        'usersactive' => 'I NOTNULL DEFAULT 0',
        'lastactivity' => 'T NOTNULL DEFAULT \'1970-01-01 00:00:00\'',
        'diskConsume' => 'I NOTNULL DEFAULT 0',
        );

    // agoraportal_queues definition
    $table['agoraportal_enable_service_log'] = DBUtil::getLimitedTablename('agoraportal_enable_service_log');
    $table['agoraportal_enable_service_log_column'] = array(
        'id' => 'id',
        'clientId' => 'clientId',
        'clientCode' => 'clientCode',
        'serviceId' => 'serviceId',
        'clientServiceId' => 'clientServiceId',
        'password' => 'password',
        'clientDNS' => 'clientDNS',
        'timeCreated' => 'timeCreated'
    );

    $table['agoraportal_enable_service_log_column_def'] = array(
        'id' => "I NOTNULL AUTO PRIMARY",
        'clientId' => "I NOTNULL",
        'clientCode' => "C(50) NOTNULL DEFAULT ''",
        'serviceId' => "I NOTNULL",
        'clientServiceId' => "I NOTNULL",
        'password' => "C(50) NOTNULL DEFAULT ''",
        'clientDNS' => "C(50) NOTNULL DEFAULT ''",
        'timeCreated' => "I(20)"
    );

    return $table;
}

