<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 358 2009-11-11 13:46:21Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Quotes
*/

/**
 * Get Quotes pntable array
 * @author The Zikula Development Team
 * @return array
 */
function Quotes_pntables()
{
    // initialise table array
    $pntable = array();

    // full table definition
    $pntable['quotes'] = DBUtil::getLimitedTablename('quotes');
    $pntable['quotes_column'] = array('qid'    => 'pn_qid',
                                      'quote'  => 'pn_quote',
                                      'author' => 'pn_author');
    $pntable['quotes_column_def'] = array('qid'    => 'I4 NOTNULL AUTO PRIMARY',
                                          'quote'  => 'X',
                                          'author' => 'C(150) NOTNULL');

    // enable categorization services
    $pntable['quotes_db_extra_enable_categorization'] = pnModGetVar('Quotes', 'enablecategorization', true);
    $pntable['quotes_primary_key_column'] = 'qid';

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition($pntable['quotes_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['quotes_column_def']);

    // return table information
    return $pntable;
}
