<?php

/**
 * Define module tables
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return module tables information
 */
function IWforms_tables() {
    // Initialise table array
    $tables = array();

    // IWforms_def table definition
    $tables['IWforms_definition'] = DBUtil::getLimitedTablename('IWforms_definition');
    $tables['IWforms_definition_column'] = array('fid' => 'iw_fid',
        'formName' => 'iw_formName',
        'description' => 'iw_description',
        'active' => 'iw_active',
        'title' => 'iw_title',
        'new' => 'iw_new',
        'cid' => 'iw_cid',
        'caducity' => 'iw_caducity',
        'annonimous' => 'iw_annonimous',
        'unique' => 'iw_unique',
        'answare' => 'iw_answare',
        'characters' => 'iw_characters',
        'closeableNotes' => 'iw_closeableNotes',
        'closeInsert' => 'iw_closeInsert',
        'closeableInsert' => 'iw_closeableInsert',
        'unregisterednotusersview' => 'iw_unregisterednotusersview',
        'unregisterednotexport' => 'iw_unregisterednotexport',
        'publicResponse' => 'iw_publicResponse',
        'skin' => 'iw_skin',
        'skincss' => 'iw_skincss',
        'showFormName' => 'iw_showFormName',
        'showNotesTitle' => 'iw_showNotesTitle',
        'skinForm' => 'iw_skinForm',
        'skinNote' => 'iw_skinNote',
        'expertMode' => 'iw_expertMode',
        'skinByTemplate' => 'iw_skinByTemplate',
        'skinFormTemplate' => 'iw_skinFormTemplate',
        'skinTemplate' => 'iw_skinTemplate',
        'skinNoteTemplate' => 'iw_skinNoteTemplate',
        'allowComments' => 'iw_allowComments',
        'allowCommentsModerated' => 'iw_allowCommentsModerated',
        'returnURL' => 'iw_returnURL',
        'filesFolder' => 'iw_filesFolder',
        'lang' => 'iw_lang',
        'defaultNumberOfNotes' => 'iw_defaultNumberOfNotes',
        'defaultOrderForNotes' => 'iw_defaultOrderForNotes',
        'orderFormField' => 'iw_orderFormField',
    );

    $tables['IWforms_definition_column_def'] = array('fid' => "I NOTNULL AUTO PRIMARY",
        'formName' => "C(70) NOTNULL DEFAULT ''",
        'description' => "C(255) NOTNULL DEFAULT ''",
        'active' => "I(1) NOTNULL DEFAULT '0'",
        'title' => "C(255) NOTNULL DEFAULT ''",
        'new' => "T NOTNULL",
        'cid' => "I NOTNULL DEFAULT '0'",
        'caducity' => "T NOTNULL",
        'annonimous' => "I(1) NOTNULL DEFAULT '0'",
        'unique' => "I(1) NOTNULL DEFAULT '0'",
        'answare' => "X NOTNULL",
        'characters' => "I(3) NOTNULL DEFAULT '0'",
        'closeableNotes' => "I(1) NOTNULL DEFAULT '0'",
        'closeInsert' => "I(1) NOTNULL DEFAULT '0'",
        'closeableInsert' => "I(1) NOTNULL DEFAULT '0'",
        'unregisterednotusersview' => "I(1) NOTNULL DEFAULT '1'",
        'unregisterednotexport' => "I(1) NOTNULL DEFAULT '1'",
        'publicResponse' => "I(1) NOTNULL DEFAULT '0'",
        'skin' => "X NOTNULL",
        'skincss' => "C(150) NOTNULL DEFAULT ''",
        'showFormName' => "I(1) NOTNULL DEFAULT '1'",
        'showNotesTitle' => "I(1) NOTNULL DEFAULT '1'",
        'skinForm' => "X NOTNULL",
        'skinNote' => "X NOTNULL",
        'expertMode' => "I(1) NOTNULL DEFAULT '0'",
        'skinByTemplate' => "I(1) NOTNULL DEFAULT '0'",
        'skinFormTemplate' => "C(70) NOTNULL DEFAULT 'IWforms_user_new.tpl'",
        'skinTemplate' => "C(70) NOTNULL DEFAULT 'IWforms_user_read.tpl'",
        'skinNoteTemplate' => "C(70) NOTNULL DEFAULT 'IWforms_user_read.tpl'",
        'allowComments' => "I(1) NOTNULL DEFAULT '0'",
        'allowCommentsModerated' => "I(1) NOTNULL DEFAULT '0'",
        'returnURL' => "C(150) NOTNULL DEFAULT ''",
        'filesFolder' => "C(25) NOTNULL DEFAULT ''",
        'lang' => "C(2) NOTNULL DEFAULT ''",
        'defaultNumberOfNotes' => "I(1) NOTNULL DEFAULT '0'",
        'defaultOrderForNotes' => "I(1) NOTNULL DEFAULT '0'",
        'orderFormField' => "I NOTNULL DEFAULT '0'",
    );

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforms_definition_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforms_definition_column_def'], 'iw_');

    // IWforms_def table definition
    $tables['IWforms_cat'] = DBUtil::getLimitedTablename('IWforms_cat');
    $tables['IWforms_cat_column'] = array('cid' => 'iw_cid',
        'catName' => 'catName',
        'description' => 'iw_description');

    $tables['IWforms_cat_column_def'] = array('cid' => "I NOTNULL AUTO PRIMARY",
        'catName' => "C(70) NOTNULL DEFAULT ''",
        'description' => "C(255) NOTNULL DEFAULT ''");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforms_cat_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforms_cat_column_def'], 'iw_');


    // IWforms table definition
    $tables['IWforms'] = DBUtil::getLimitedTablename('IWforms');
    $tables['IWforms_column'] = array('fmid' => 'iw_fmid',
        'user' => 'iw_user',
        'observations' => 'iw_observations',
        'renote' => 'iw_renote',
        'state' => 'iw_state',
        'time' => 'iw_time',
        'validate' => 'iw_validate',
        'fid' => 'iw_fid',
        'annonimous' => 'iw_annonimous',
        'mark' => 'iw_mark',
        'deluser' => 'iw_deluser',
        'viewed' => 'iw_viewed',
        'closed' => 'iw_closed',
        'publicResponse' => 'iw_publicResponse');

    $tables['IWforms_column_def'] = array('fmid' => "I NOTNULL AUTO PRIMARY",
        'user' => "C(20) NOTNULL DEFAULT ''",
        'observations' => "X NOTNULL",
        'renote' => "X NOTNULL",
        'state' => "I(1) NOTNULL DEFAULT '0'",
        'time' => "C(20) NOTNULL DEFAULT ''",
        'validate' => "I(1) NOTNULL DEFAULT '0'",
        'fid' => "I NOTNULL DEFAULT '0'",
        'annonimous' => "I(1) NOTNULL DEFAULT '0'",
        'mark' => "X NOTNULL",
        'deluser' => "I(1) NOTNULL DEFAULT '0'",
        'viewed' => "X NOTNULL",
        'closed' => "I(1) NOTNULL DEFAULT '0'",
        'publicResponse' => "I(1) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforms_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforms_column_def'], 'iw_');

    // IWforms_note table definition
    $tables['IWforms_note'] = DBUtil::getLimitedTablename('IWforms_note');
    $tables['IWforms_note_column'] = array('fnid' => 'iw_fnid',
        'fmid' => 'iw_fmid',
        'fndid' => 'iw_fndid',
        'content' => 'iw_content',
        'validate' => 'iw_validate');

    $tables['IWforms_note_column_def'] = array('fnid' => "I NOTNULL AUTO PRIMARY",
        'fmid' => "I NOTNULL DEFAULT '0'",
        'fndid' => "I NOTNULL DEFAULT '0'",
        'content' => "X NOTNULL",
        'validate' => "I(1) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforms_note_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforms_note_column_def'], 'iw_');

    // IWforms_note_def table definition
    $tables['IWforms_note_definition'] = DBUtil::getLimitedTablename('IWforms_note_definition');
    $tables['IWforms_note_definition_column'] = array('fndid' => 'iw_fndid',
        'fid' => 'iw_fid',
        'fieldType' => 'iw_fieldType',
        'required' => 'iw_required',
        'description' => 'iw_description',
        'fieldName' => 'iw_fieldName',
        'feedback' => 'iw_feedback',
        'order' => 'iw_order',
        'active' => 'iw_active',
        'dependance' => 'iw_dependance', //id of the dependance
        'rfid' => 'iw_rfid', //ids of the managers validators
        'validationNeeded' => 'iw_validationNeeded', //id of the manager validator
        'notify' => 'iw_notify',
        'size' => 'iw_size', //Only for text fields
        'cols' => 'iw_cols', //only fot textarea fields
        'rows' => 'iw_rows', //only for textarea fields
        'editor' => 'iw_editor', //only for textarea fields
        'checked' => 'iw_checked', //only for checkbox fields
        'options' => 'iw_options', //only for list fields
        'calendar' => 'iw_calendar', //only for date fields
        'height' => 'iw_height', // only for line fields
        'color' => 'iw_color', // only for line fields
        'colorf' => 'iw_colorf', // only for line fields
        'accessType' => 'iw_accessType',
        'editable' => 'iw_editable',
        'collapse' => 'iw_collapse',
        'publicFile' => 'iw_publicFile',
        'help' => 'iw_help',
        'gid' => 'iw_gid',
        'searchable' => 'iw_searchable',
        'extensions' => 'iw_extensions',
        'imgWidth' => 'iw_imgWidth',
        'imgHeight' => 'iw_imgHeight');

    $tables['IWforms_note_definition_column_def'] = array('fndid' => "I NOTNULL AUTO PRIMARY",
        'fid' => "I NOTNULL DEFAULT '0'",
        'fieldType' => "I(1) NOTNULL DEFAULT '0'",
        'required' => "I(1) NOTNULL DEFAULT '0'",
        'description' => "C(255) NOTNULL DEFAULT ''",
        'fieldName' => "X NOTNULL",
        'feedback' => "I(1) NOTNULL DEFAULT '0'",
        'order' => "I NOTNULL DEFAULT '1000'",
        'active' => "I(1) NOTNULL DEFAULT '0'",
        'dependance' => "C(50) NOTNULL DEFAULT '$'",
        'rfid' => "C(50) NOTNULL DEFAULT '$'",
        'validationNeeded' => "I(1) NOTNULL DEFAULT '0'",
        'notify' => "I(1) NOTNULL DEFAULT '0'",
        'size' => "C(3) NOTNULL DEFAULT '25'",
        'cols' => "C(3) NOTNULL DEFAULT '30'",
        'rows' => "C(3) NOTNULL DEFAULT '5'",
        'editor' => "I(1) NOTNULL DEFAULT '0'",
        'checked' => "I(1) NOTNULL DEFAULT '0'",
        'options' => "X NOTNULL",
        'calendar' => "I(1) NOTNULL DEFAULT '0'",
        'height' => "C(2) NOTNULL DEFAULT '1'",
        'color' => "C(7) NOTNULL DEFAULT '#DDDDDD'",
        'colorf' => "C(7) NOTNULL DEFAULT '#FFFFFF'",
        'accessType' => "I(1) NOTNULL DEFAULT '0'",
        'editable' => "I(1) NOTNULL DEFAULT '0'",
        'collapse' => "I(1) NOTNULL DEFAULT '0'",
        'publicFile' => "I(1) NOTNULL DEFAULT '0'",
        'help' => "X NOTNULL",
        'gid' => "I NOTNULL DEFAULT '0'",
        'searchable' => "I(1) NOTNULL DEFAULT '0'",
        'extensions' => "C(30) NOTNULL DEFAULT ''",
        'imgWidth' => "I(4) NOTNULL DEFAULT '0'",
        'imgHeight' => "I(4) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforms_note_definition_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforms_note_definition_column_def'], 'iw_');

    // IWforms_resp table definition
    $tables['IWforms_validator'] = DBUtil::getLimitedTablename('IWforms_validator');
    $tables['IWforms_validator_column'] = array('rfid' => 'iw_rfid',
        'fid' => 'iw_fid',
        'validator' => 'iw_validator',
        'validatorType' => 'iw_validatorType'); //0 global - 1 note only

    $tables['IWforms_validator_column_def'] = array('rfid' => "I NOTNULL AUTO PRIMARY",
        'fid' => "I NOTNULL DEFAULT '0'",
        'validator' => "I NOTNULL DEFAULT '0'",
        'validatorType' => "I(1) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforms_resp_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforms_resp_column_def'], 'iw_');

    // IWforms_resp table definition
    $tables['IWforms_group'] = DBUtil::getLimitedTablename('IWforms_group');
    $tables['IWforms_group_column'] = array('gfid' => 'iw_gfid',
        'fid' => 'iw_fid',
        'group' => 'iw_group',
        'accessType' => 'iw_accessType',
        'validationNeeded' => 'iw_validationNeeded');

    $tables['IWforms_group_column_def'] = array('gfid' => "I NOTNULL AUTO PRIMARY",
        'fid' => "I NOTNULL DEFAULT '0'",
        'group' => "I NOTNULL DEFAULT '0'",
        'accessType' => "I(1) NOTNULL DEFAULT '0'",
        'validationNeeded' => "I(1) NOTNULL DEFAULT '0'");

    ObjectUtil::addStandardFieldsToTableDefinition($tables['IWforms_group_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['IWforms_group_column_def'], 'iw_');

    //Returns tables information
    return $tables;
}
