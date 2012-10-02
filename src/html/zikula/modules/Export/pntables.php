<?php 
/**
 * Define module tables
 * 
 * @author		Fèlix Casanellas (felix.casanellas@gmail.com)
 * @return		module tables information
 */

function Export_pntables()
{
    // Initialise table array
    $pntable = array();

    // export_routes table definition
    $pntable['export_routes'] = DBUtil::getLimitedTablename('export_routes');
    $pntable['export_routes_column'] = array (
									  'id'       => 'id',
                                      'module_name'       => 'module_name',
                                      'variable'	=> 'variable',
                                      'root_module'		=> 'root_module',
                                      'root_variable'	=> 'root_variable');

    $pntable['export_routes_column_def'] = array(
										 'id'      => 'I NOTNULL AUTO PRIMARY',
                                         'module_name'      => "C(64) NOTNULL DEFAULT ''",
                                         'variable'		=> "C(64) NOTNULL DEFAULT ''",
                                         'root_module'		=> "C(64) NOTNULL DEFAULT ''",
                                         'root_variable'		=> "C(64) NOTNULL DEFAULT ''");

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition ($pntable['export_routes_column']);
    ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['export_routes_column_def']);
    
    
    $pntable['export_tables'] = DBUtil::getLimitedTablename('export_tables');
    $pntable['export_tables_column'] = array (
									  'id'       => 'id',
                                      'module_name'       => 'module_name',
                                      'table_name'	=> 'table_name');

    $pntable['export_tables_column_def'] = array(
										 'id'      => 'I NOTNULL AUTO PRIMARY',
                                         'module_name'      => "C(64) NOTNULL DEFAULT ''",
                                         'table_name'		=> "C(64) NOTNULL DEFAULT ''");

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition ($pntable['export_tables_column']);
    ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['export_tables_column_def']);

    return $pntable;
}
