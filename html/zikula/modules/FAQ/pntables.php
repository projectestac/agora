<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 44 2009-12-20 07:38:08Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */

/**
 * Populate pntables array for FAQ module
 *
 * This function is called internally by the core whenever the module is
 * loaded. It delivers the table information to the core.
 * It can be loaded explicitly using the pnModDBInfoLoad() API function.
 *
 * @author       Xiaoyu Huang
 * @return       array       The table information.
 */
function FAQ_pntables()
{
    // Initialise table array
    $pntable = array();

    // Full table definition
    $pntable['faqanswer'] = DBUtil::getLimitedTablename('faqanswer');
    $pntable['faqanswer_column'] = array(
        'faqid'         => 'pn_id',
        'question'      => 'pn_question',
        'urltitle'      => 'pn_urltitle',
        'answer'        => 'pn_answer',
        'submittedbyid' => 'pn_submittedbyid',
        'answeredbyid'  => 'pn_answeredbyid'
    );
    $pntable['faqanswer_column_def'] = array(
        'faqid'           => 'I NOTNULL AUTO PRIMARY',
        'question'        => 'X DEFAULT NULL',
        'urltitle'        => "X NOTNULL DEFAULT ''",
        'answer'          => 'X',
        'submittedbyid'   => 'I NOTNULL',
        'answeredbyid'    => 'I NOTNULL'
    );

    // Enable categorization services
    $pntable['faqanswer_db_extra_enable_categorization'] = pnModGetVar('FAQ', 'enablecategorization');
    $pntable['faqanswer_primary_key_column'] = 'faqid';

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition($pntable['faqanswer_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['faqanswer_column_def']);

    // old tables for upgrade purposes
    $pntable['faqcategories'] = DBUtil::getLimitedTablename('faqcategories');

    return $pntable;
}
