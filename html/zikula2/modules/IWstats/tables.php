<?php

function IWstats_tables() {
    // Initialise table array
    $table = array();

    // Global table
    $table['IWstats'] = DBUtil::getLimitedTablename('IWstats');
    $table['IWstats_column'] = array('statsid' => 'iw_statsid',
        'datetime' => 'iw_datetime',
        'ip' => 'iw_ip',
        'ipForward' => 'iw_ipForward',
        'ipClient' => 'iw_ipClient',
        'userAgent' => 'iw_userAgent',
        'moduleid' => 'iw_moduleid',
        'params' => 'iw_params',
        'uid' => 'iw_uid',
        'isadmin' => 'iw_isadmin',
        'skipped' => 'iw_skipped',
        'skippedModule' => 'iw_skippedModule',
        'summarised' => 'iw_summarised',
    );
    $table['IWstats_column_def'] = array('statsid' => "I NOTNULL AUTO PRIMARY",
        'datetime' => "T DEFDATETIME NOTNULL DEFAULT '1970-01-01 00:00:00'",
        'ip' => "C(15) NOTNULL DEFAULT ''",
        'ipForward' => "C(15) NOTNULL DEFAULT ''",
        'ipClient' => "C(15) NOTNULL DEFAULT ''",
        'userAgent' => "C(255) NOTNULL DEFAULT ''",
        'moduleid' => "I NOTNULL DEFAULT '0'",
        'params' => "C(255) NOTNULL DEFAULT ''",
        'uid' => "I NOTNULL DEFAULT '0'",
        'isadmin' => "I1 NOTNULL DEFAULT '0'",
        'skipped' => "I1 NOTNULL DEFAULT '0'",
        'skippedModule' => "I1 NOTNULL DEFAULT '0'",
        'summarised' => "I1 NOTNULL DEFAULT '0'",
    );

    $table['IWstats_summary'] = DBUtil::getLimitedTablename('IWstats_summary');
    $table['IWstats_summary_column'] = array('summaryid' => 'iw_summaryid',
        'datetime' => 'iw_datetime',
        'nrecords' => 'iw_nrecords',
        'registered' => 'iw_registered',
        'modules' => 'iw_modules',
        'skipped' => 'iw_skipped',
        'skippedModule' => 'iw_skippedModule',
        'isadmin' => 'iw_isadmin',
        'users' => 'iw_users',
        'nips' => 'iw_nips',
    );
    $table['IWstats_summary_column_def'] = array('summaryid' => "I NOTNULL AUTO PRIMARY",
        'datetime' => "T DEFDATETIME NOTNULL DEFAULT '1970-01-01 00:00:00'",
        'nrecords' => "I NOTNULL DEFAULT '0'",
        'registered' => "I NOTNULL DEFAULT '0'",
        'modules' => "X NOTNULL",
        'skipped' => "I NOTNULL DEFAULT '0'",
        'skippedModule' => "I NOTNULL DEFAULT '0'",
        'isadmin' => "I NOTNULL DEFAULT '0'",
        'users' => "X NOTNULL",
        'nips' => "I NOTNULL DEFAULT '0'",
    );


    // Return the table information
    return $table;
}
