<?php

function IWusers_tables() {
    // Initialise table array
    $tables = array();
    // IWusers table definition
    $tables['IWusers'] = DBUtil::getLimitedTablename('IWusers');
    $tables['IWusers_column'] = array(
        'suid'        => 'iw_suid',
        'uid'         => 'iw_uid',
        'id'          => 'iw_id',
        'nom'         => 'iw_nom',
        'cognom1'     => 'iw_cognom1',
        'cognom2'     => 'iw_cognom2',
        'naixement'   => 'iw_naixement',
        'code'        => 'iw_code',
        'sex'         => 'iw_sex',
        'accio'       => 'iw_accio',
        'description' => 'iw_description',
        'avatar'      => 'iw_avatar',
        'newavatar'   => 'iw_newavatar',
    );

    $tables['IWusers_column_def'] = array(
        'suid'        => "I NOTNULL AUTO PRIMARY",
        'uid'         => "I NOTNULL DEFAULT '0'",
        'id'          => "C(50) NOTNULL DEFAULT ''",
        'nom'         => "C(25) NOTNULL DEFAULT ''",
        'cognom1'     => "C(25) NOTNULL DEFAULT ''",
        'cognom2'     => "C(25) NOTNULL DEFAULT ''",
        'naixement'   => "C(8) NOTNULL DEFAULT ''",
        'accio'       => "I(1) NOTNULL DEFAULT '0'",
        'code'        => "C(5)",
        'sex'         => "C(1) NOTNULL DEFAULT ''",
        'description' => "X NOTNULL",
        'avatar'      => "C(50) NOTNULL DEFAULT ''",
        'newavatar'   => "C(50) NOTNULL DEFAULT ''",
    );

    // IWusers table definition
    $tables['IWusers_friends'] = DBUtil::getLimitedTablename('IWusers_friends');
    $tables['IWusers_friends_column'] = array('fid' => 'iw_fid',
        'uid' => 'iw_uid',
        'fuid' => 'iw_fuid');

    $tables['IWusers_friends_column_def'] = array('fid' => "I NOTNULL AUTO PRIMARY",
        'uid' => "I NOTNULL DEFAULT '0'",
        'fuid' => "I NOTNULL DEFAULT '0'");

    // Return the table information
    return $tables;
}
