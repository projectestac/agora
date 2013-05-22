<?php
/**
 * Zikula Application Framework
 * @copyright  (c) Zikula Development Team
 * @license    GNU/GPL
 *
 * Get Quotes table array
 * @return       array with table information.
*/
function Quotes_tables()
{
	// initialise table array
	$tables = array();

	// full table definition
	$tables['quotes'] = 'quotes';
	$tables['quotes_column'] = array('qid'    => 'qid',
									  'quote'  => 'quote',
									  'author' => 'author',
									  'status' => 'status');
	$tables['quotes_column_def'] = array('qid'    => 'I4 NOTNULL AUTO PRIMARY',
										  'quote'  => 'X',
										  'author' => 'C(150) NOTNULL',
										  'status'   => "I1 DEFAULT '1'");

	// enable categorization services
	$tables['quotes_db_extra_enable_categorization'] = ModUtil::getVar('Quotes', 'enablecategorization', true);
	$tables['quotes_primary_key_column'] = 'qid';

	// add standard data fields
	ObjectUtil::addStandardFieldsToTableDefinition($tables['quotes_column'], '');
	ObjectUtil::addStandardFieldsToTableDataDefinition($tables['quotes_column_def']);

	// return table information
	return $tables;
}
