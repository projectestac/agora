<?php

/**
 * Define module tables
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function IWjclic_tables() {
    // Initialise table array
    $table = array();

    // IWjclic table definition
    $table['IWjclic'] = DBUtil::getLimitedTablename('IWjclic');
    $table['IWjclic_column'] = array('jid' => 'iw_jid', //era el camp id a Moodle
        'user' => 'iw_user', //era el course a la taula del Moodle
        'name' => 'iw_name',
        'description' => 'iw_description',
        'url' => 'iw_url',
        'file' => 'iw_file',
        'skin' => 'iw_skin',
        'maxattempts' => 'iw_maxattempts',
        'width' => 'iw_width',
        'height' => 'iw_height',
        'scoreToOptain' => 'iw_scoreToOptain',
        'solvedToOptain' => 'iw_solvedToOptain',
        'active' => 'iw_active',
        'date' => 'iw_date',
        'observations' => 'iw_observations',
        'limitDate' => 'iw_limitDate',
        'initDate' => 'iw_initDate',
        'extended' => 'iw_extended');

    $table['IWjclic_column_def'] = array('jid' => "I NOTNULL AUTO PRIMARY",
        'user' => "I NOTNULL DEFAULT '0'",
        'name' => "C(255) NOTNULL DEFAULT ''",
        'description' => "X NOTNULL",
        'url' => "C(255) NOTNULL DEFAULT ''",
        'file' => "C(30) NOTNULL DEFAULT ''",
        'skin' => "C(20) NOTNULL DEFAULT ''",
        'maxattempts' => "I(3) NOTNULL DEFAULT '0'",
        'width' => "I(5) NOTNULL DEFAULT '600'",
        'height' => "I(5) NOTNULL DEFAULT '400'",
        'scoreToOptain' => "C(5) DEFAULT NULL",
        'solvedToOptain' => "C(5) DEFAULT NULL",
        'active' => "I(1) NOTNULL DEFAULT '0'",
        'date' => "C(20) NOTNULL DEFAULT ''",
        'observations' => "X NOTNULL",
        'limitDate' => "C(20) NOTNULL DEFAULT ''",
        'initDate' => "C(20) NOTNULL DEFAULT ''",
        'extended' => "X NOTNULL");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWjclic_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWjclic_column_def'], 'iw_');

    // IWjclic_activities table definition
    $table['IWjclic_activities'] = DBUtil::getLimitedTablename('IWjclic_activities');
    $table['IWjclic_activities_column'] = array('jaid' => 'iw_jaid', //era el camp id a Moodle
        'session_id' => 'iw_session_id',
        'activity_id' => 'iw_activity_id',
        'activity_name' => 'iw_activity_name',
        'num_actions' => 'iw_num_actions',
        'score' => 'iw_score',
        'activity_solved' => 'iw_activity_solved',
        'qualification' => 'iw_qualification',
        'total_time' => 'iw_total_time',
        'activity_code' => 'iw_activity_code');

    $table['IWjclic_activities_column_def'] = array('jaid' => "I NOTNULL AUTO PRIMARY",
        'session_id' => "C(50) NOTNULL DEFAULT ''",
        'activity_id' => "I(5) NOTNULL DEFAULT '0'",
        'activity_name' => "C(50) NOTNULL DEFAULT ''",
        'num_actions' => "I(4) DEFAULT NULL",
        'score' => "I(4) DEFAULT NULL",
        'activity_solved' => "I(1) DEFAULT NULL",
        'qualification' => "I(3) DEFAULT NULL",
        'total_time' => "I(5) DEFAULT NULL",
        'activity_code' => "C(50) DEFAULT NULL");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWjclic_activities_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWjclic_activities_column_def'], 'iw_');

    // IWjclic_sessions table definition
    $table['IWjclic_sessions'] = DBUtil::getLimitedTablename('IWjclic_sessions');
    $table['IWjclic_sessions_column'] = array('jsid' => 'iw_jsid',
        'jclicid' => 'iw_jclicid',
        'session_id' => 'iw_session_id',
        'user_id' => 'iw_user_id',
        'session_datetime' => 'iw_session_datetime',
        'project_name' => 'iw_project_name',
        'session_key' => 'iw_session_key',
        'session_code' => 'iw_session_code',
        'session_context' => 'iw_session_context');

    $table['IWjclic_sessions_column_def'] = array('jsid' => "I NOTNULL AUTO PRIMARY",
        'jclicid' => "I NOTNULL DEFAULT '0'",
        'session_id' => "C(50) NOTNULL DEFAULT ''",
        'user_id' => "I NOTNULL",
        'session_datetime' => "T DEFDATETIME NOTNULL DEFAULT '1970-01-01 00:00:00'",
        'project_name' => "C(100) NOTNULL DEFAULT ''",
        'session_key' => "C(50) DEFAULT NULL",
        'session_code' => "C(50) DEFAULT NULL",
        'session_context' => "C(50) DEFAULT NULL");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWjclic_sessions_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWjclic_sessions_column_def'], 'iw_');

    // IWjclic_groups table definition
    $table['IWjclic_groups'] = DBUtil::getLimitedTablename('IWjclic_groups');
    $table['IWjclic_groups_column'] = array('jgid' => 'iw_jgid', //era id a Moodle
        'jid' => 'iw_jid',
        'group_id' => 'iw_group_id',
        'group_name' => 'iw_group_name',
        'group_description' => 'iw_group_description',
        'group_icon' => 'iw_group_icon',
        'group_code' => 'iw_group_code',
        'group_keywords' => 'iw_group_keywords');

    $table['IWjclic_groups_column_def'] = array('jgid' => "I NOTNULL AUTO PRIMARY",
        'jid' => "I NOTNULL DEFAULT '0'",
        'group_id' => "I NOTNULL DEFAULT '0'",
        'group_name' => "C(80) NOTNULL DEFAULT ''",
        'group_description' => "C(255) NOTNULL DEFAULT ''",
        'group_icon' => "C(255) NOTNULL DEFAULT ''",
        'group_code' => "C(50) NOTNULL DEFAULT ''",
        'group_keywords' => "C(255) NOTNULL DEFAULT ''");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWjclic_groups_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWjclic_groups_column_def'], 'iw_');

    // IWjclic_users table definition
    $table['IWjclic_users'] = DBUtil::getLimitedTablename('IWjclic_users');
    $table['IWjclic_users_column'] = array('juid' => 'iw_juid',
        'jid' => 'iw_jid',
        'user_id' => 'iw_user_id',
        'group_id' => 'iw_group_id',
        'user_name' => 'iw_user_name',
        'user_pwd' => 'iw_user_pwd',
        'user_icon' => 'iw_user_icon',
        'user_code' => 'iw_user_code',
        'user_keywords' => 'iw_user_keywords',
        'observations' => 'iw_observations',
        'renotes' => 'iw_renotes');

    $table['IWjclic_users_column_def'] = array('juid' => "I NOTNULL AUTO PRIMARY",
        'jid' => "I NOTNULL DEFAULT '0'",
        'user_id' => "I NOTNULL DEFAULT '0'",
        'group_id' => "I NOTNULL DEFAULT '0'",
        'user_name' => "C(80) NOTNULL DEFAULT ''",
        'user_pwd' => "C(255) NOTNULL DEFAULT ''",
        'user_icon' => "C(255) NOTNULL DEFAULT ''",
        'user_code' => "C(50) NOTNULL DEFAULT ''",
        'user_keywords' => "C(255) NOTNULL DEFAULT ''",
        'observations' => "X NOTNULL",
        'renotes' => "X NOTNULL");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWjclic_users_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWjclic_users_column_def'], 'iw_');

    // IWjclic_settings table definition
    $table['IWjclic_settings'] = DBUtil::getLimitedTablename('IWjclic_settings');
    $table['IWjclic_settings_column'] = array('jsid' => 'iw_jsid',
        'setting_key' => 'iw_setting_key',
        'setting_value' => 'iw_setting_value');

    $table['IWjclic_settings_column_def'] = array('jsid' => "I NOTNULL AUTO PRIMARY",
        'setting_key' => "C(255) NOTNULL DEFAULT ''",
        'setting_value' => "C(255) NOTNULL DEFAULT ''");

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWjclic_settings_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWjclic_settings_column_def'], 'iw_');

    //Returns tables information
    return $table;
}
