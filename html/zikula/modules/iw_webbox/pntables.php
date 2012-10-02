<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Weebbox
 */

/**
 * Define module tables
 * @author Albert Pérez Monfort (intraweb@xtec.cat)
 * @return module tables information
 */
 
function iw_webbox_pntables()
{
    // Initialise table array
	$pntable = array();
		
	// iw_webbox table definition
	$pntable['iw_webbox'] = DBUtil::getLimitedTablename('iw_webbox');
	$pntable['iw_webbox_column'] = array('pid' => 'iw_pid',
											'url' => 'iw_url',
											'ref' => 'iw_ref',
											'scrolls' => 'iw_scrolls',
											'description' => 'iw_description',
											'width' => 'iw_width',
											'height' => 'iw_height',
											'widthunit' => 'iw_widthunit');

	$pntable['iw_webbox_column_def'] = array('pid' => "INT(11) NOTNULL AUTOINCREMENT KEY",
												'url' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'ref' => "VARCHAR(10) NOTNULL DEFAULT ''",
												'scrolls' => "TINYINT(1) NOTNULL DEFAULT '1'",
												'description' => "VARCHAR(255) NOTNULL DEFAULT ''",
												'width' => "INT(11) NOTNULL DEFAULT '100'",	
												'height' => "INT(11) NOTNULL DEFAULT '600'",
												'widthunit' => "VARCHAR(10) NOTNULL DEFAULT '%'");

	ObjectUtil::addStandardFieldsToTableDefinition ($pntable['iw_webbox_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_webbox_column_def'], 'iw_');

	// Return the table information
	return $pntable;
}
?>