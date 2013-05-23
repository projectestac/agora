<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

/**
 * Populate tables array for News module
 * 
 * This function is called internally by the core whenever the module is
 * loaded. It delivers the table information to the core.
 * It can be loaded explicitly using the ModUtil::dbInfoLoad() API function.
 * 
 * @return       array       The table information.
 */
function News_tables()
{
    // Initialise table array
    $tables = array();

    // Full table definition
    $tables['news'] = 'news';
    $tables['news_column'] = array(
        'sid'              => 'sid',
        'title'            => 'title',
        'urltitle'         => 'urltitle',
        'hometext'         => 'hometext',
        'bodytext'         => 'bodytext',
        'counter'          => 'counter',
        'contributor'      => 'contributor',
        'approver'         => 'approver',
        'notes'            => 'notes',
        'displayonindex'   => 'displayonindex',
        'language'         => 'language',
        'allowcomments'    => 'allowcomments',
        'format_type'      => 'format_type',
        'published_status' => 'published_status',
        'from'             => 'ffrom', //not a typo! from is a reserved sql word
        'to'               => 'tto', //not a typo! to is a reserved sql word
        'weight'           => 'weight',
        'pictures'         => 'pictures'
    );
    $tables['news_column_def'] = array(
        'sid'              => 'I NOTNULL AUTO PRIMARY',
        'title'            => 'C(255) DEFAULT NULL',
        'urltitle'         => 'C(255) DEFAULT NULL',
        'hometext'         => 'XL NOTNULL',
        'bodytext'         => 'XL NOTNULL',
        'counter'          => 'I DEFAULT 0',
        'contributor'      => "C(25) NOTNULL DEFAULT ''",
        'approver'         => 'I DEFAULT 0',
        'notes'            => 'X NOTNULL',
        'displayonindex'   => 'I1 NOTNULL DEFAULT 0',
        'language'         => "C(30) NOTNULL DEFAULT ''",
        'allowcomments'    => 'I1 NOTNULL DEFAULT 0',
        'format_type'      => 'I1 NOTNULL DEFAULT 0',
        'published_status' => 'I1 DEFAULT 0',
        'from'             => 'T DEFAULT NULL',
        'to'               => 'T DEFAULT NULL',
        'weight'           => 'I1 DEFAULT 0',
        'pictures'         => 'I DEFAULT 0'
    );

    // Enable categorization services
    $tables['news_db_extra_enable_categorization'] = ModUtil::getVar('News', 'enablecategorization');
    $tables['news_primary_key_column'] = 'sid';

    // Enable attribution services
    $tables['news_db_extra_enable_attribution'] = ModUtil::getVar('News', 'enableattribution');

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition ($tables['news_column']);
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['news_column_def']);

    // old tables for upgrading
    $tables['comments'] = DBUtil::getLimitedTablename('comments');
    $tables['autonews'] = DBUtil::getLimitedTablename('autonews');
    $tables['queue'] = DBUtil::getLimitedTablename('queue');
    $tables['stories'] = DBUtil::getLimitedTablename('stories');
    $tables['stories_cat'] = DBUtil::getLimitedTablename('stories_cat');
    $tables['topics'] = DBUtil::getLimitedTablename('topics');

    return $tables;
}
