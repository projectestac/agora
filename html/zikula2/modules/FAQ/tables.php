<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */

/**
 * Populate pntables array for FAQ module
 *
 * This function is called internally by the core whenever the module is
 * loaded. It delivers the table information to the core.
 * It can be loaded explicitly using the ModUtil::dbInfoLoad() API function.
 *
 * @author       Xiaoyu Huang
 * @return       array       The table information.
 */
function FAQ_tables()
{
    // Initialise table array
    $table = array();

    // Full table definition
    $table['faqanswer'] = 'faqanswer';
    $table['faqanswer_column'] = array(
        'faqid' => 'id',
        'question' => 'question',
        'urltitle' => 'urltitle',
        'answer' => 'answer',
        'submittedbyid' => 'submittedbyid',
        'answeredbyid' => 'answeredbyid'
    );
    $table['faqanswer_column_def'] = array(
        'faqid' => 'I NOTNULL AUTO PRIMARY',
        'question' => 'X DEFAULT NULL',
        'urltitle' => "X NOTNULL DEFAULT ''",
        'answer' => 'X',
        'submittedbyid' => "I NOTNULL DEFAULT ''",
        'answeredbyid' => "I NOTNULL DEFAULT ''"
    );

    // Enable categorization services
    $table['faqanswer_db_extra_enable_categorization'] = ModUtil::getVar('FAQ', 'enablecategorization');
    $table['faqanswer_primary_key_column'] = 'faqid';

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition($table['faqanswer_column']);
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['faqanswer_column_def']);

    // old tables for upgrade purposes
    $table['faqcategories'] = DBUtil::getLimitedTablename('faqcategories');

    return $table;
}
