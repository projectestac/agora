<?php
/**
 * pages table information
*/
function Pages_tables()
{
    // Initialise table array
    $table = array();

    // Full table definition
    $table['pages'] = 'pages';
    $table['pages_column'] = array ('pageid'         => 'pageid',
                                      'title'          => 'title',
                                      'metadescription'   => 'metadescription',
                                      'metakeywords'      => 'metakeywords',
                                      'urltitle'       => 'urltitle',
                                      'content'        => 'content',
                                      'counter'        => 'counter',
                                      'displaywrapper' => 'displaywrapper',
                                      'displaytitle'   => 'displaytitle',
                                      'displaycreated' => 'displaycreated',
                                      'displayupdated' => 'displayupdated',
                                      'displaytextinfo' => 'displaytextinfo',
                                      'displayprint'   => 'displayprint',
                                      'language'       => 'language');
    $table['pages_column_def'] = array('pageid'         => 'I AUTOINCREMENT PRIMARY',
                                         'title'          => "X NOTNULL DEFAULT ''",
                                         'metadescription'   => "X NOTNULL DEFAULT ''",
                                         'metakeywords'      => "X NOTNULL DEFAULT ''",
                                         'urltitle'       => "X NOTNULL DEFAULT ''",
                                         'content'        => "X NOTNULL DEFAULT ''",
                                         'counter'        => "I NOTNULL DEFAULT '0'",
                                         'displaywrapper' => "I1 NOTNULL DEFAULT '1'",
                                         'displaytitle'   => "I1 NOTNULL DEFAULT '1'",
                                         'displaycreated' => "I1 NOTNULL DEFAULT '1'",
                                         'displayupdated' => "I1 NOTNULL DEFAULT '1'",
                                         'displaytextinfo' => "I1 NOTNULL DEFAULT '1'",
                                         'displayprint'   => "I1 NOTNULL DEFAULT '1'",
                                         'language'       => "C(30) NOTNULL DEFAULT ''");

    // Enable categorization services
    $table['pages_db_extra_enable_categorization'] = ModUtil::getVar('Pages', 'enablecategorization');
    $table['pages_primary_key_column'] = 'pageid';

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition($table['pages_column']);
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['pages_column_def']);

    // old tables for upgrade/renaming purposes
    $table['seccont']  = DBUtil::getLimitedTablename('seccont');
    $table['sections'] = DBUtil::getLimitedTablename('sections');

    return $table;
}