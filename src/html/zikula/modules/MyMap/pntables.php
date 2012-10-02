<?php
/**
 * @package      MyMap
 * @version      $Id: pntables.php 90 2008-08-24 09:05:08Z quan $
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
/**
 * Populate pntables array for MyMap module
 *
 * @return       array       The table information.
 */
function MyMap_pntables()
{
    // Initialise table array
    $pntable = array();

    // Get the name for the template item table
    $mymap = DBUtil::getLimitedTablename('mymap');
    $mymap_markers = DBUtil::getLimitedTablename('mymap_markers');
    $mymap_waypoints = DBUtil::getLimitedTablename('mymap_waypoints');

    // Set the table name
    $pntable['mymap'] = $mymap;
    $pntable['mymap_markers'] = $mymap_markers;
    $pntable['mymap_waypoints'] = $mymap_waypoints;

    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['mymap_markers_column'] = array(
						'id'			=> 'mymap_id',
						'mid'			=> 'mymap_mid',
						'uid'			=> 'mymap_uid',
						'title'			=> 'mymap_title',
						'text'			=> 'mymap_text',
						'countrycode'	=> 'mymap_countrycode',
						'postalcode'	=> 'mymap_postalcode',
						'placename'		=> 'mymap_placename',
						'lat'			=> 'mymap_lat',
						'lng'			=> 'mymap_lng',
						'date'			=> 'mymap_date'
						);

    $pntable['mymap_markers_column_def'] = array (
						'id'			=>	"I NOTNULL AUTO PRIMARY",
						'mid'			=> 	"I NOTNULL DEFAULT 0",
						'uid'			=> 	"I NOTNULL DEFAULT 0",
						'title'			=>	"XL NOTNULL DEFAULT ''",
						'text'			=>	"XL NOTNULL DEFAULT ''",
						'countrycode'	=>	"C(2)",
						'postalcode' 	=> 	"XL NOTNULL DEFAULT ''",
						'placename'		=>	"XL NOTNULL DEFAULT ''",
						'lat' 			=> 	"F NOTNULL DEFAULT 0",
						'lng' 			=> 	"F NOTNULL DEFAULT 0",
						'date'			=> 	"D"
						);
//    $pntable['mymap_markers_column_idx'] = array (	'postalcode'	=>	'postalcode'
//						);

    $pntable['mymap_waypoints_column'] = array(
						'id'			=> 'mymap_id',
						'mid'			=> 'mymap_mid',
						'lat'			=> 'mymap_lat',
						'lng'			=> 'mymap_lng'
						);

    $pntable['mymap_waypoints_column_def'] = array (
						'id'			=>	"I NOTNULL AUTO PRIMARY",
						'mid'			=> 	"I NOTNULL DEFAULT 0",
						'lat' 			=> 	"F NOTNULL DEFAULT 0",
						'lng' 			=> 	"F NOTNULL DEFAULT 0"
						);
//    $pntable['mymap_waypoints_column_idx'] = array (	'postalcode'	=>	'postalcode'
//						);

    $pntable['mymap_column'] = array(		'id'			=> 'mymap_id',
						'uid'			=> 'mymap_uid',
						'title'			=> 'mymap_title',
						'width'			=> 'mymap_width',
						'height'		=> 'mymap_height',
						'zoomfactor'	=> 'zomfactor',
						'description'	=> 'mymap_description',
						'wiki'			=> 'mymap_wiki',
						'maptype'		=> 'mymap_maptype',
						'optionaltable'	=> 'mymap_optionaltable',
						'date'			=> 'mymap_date'
						);

    $pntable['mymap_column_def'] = array (	'id'		=>	"I NOTNULL AUTO PRIMARY",
						'uid'			=>	"I NOTNULL DEFAULT 0",
						'title' 		=> 	"XL NOTNULL DEFAULT ''",
						'width'			=> 	"I NOTNULL DEFAULT 640",
						'height'		=> 	"I NOTNULL DEFAULT 480",
						'zoomfactor' 	=> 	"I NOTNULL DEFAULT 10",
						'description'	=>	"XL NOTNULL DEFAULT ''",
						'wiki' 			=> 	"I NOTNULL DEFAULT 0",
						'maptype' 		=> 	"XL NOTNULL DEFAULT ''",
						'optionaltable'	=> 	"I NOTNULL DEFAULT 0",
						'date'			=> 	"D"
						);
//    $pntable['mymap_column_idx'] = array (	'id'	=>	'id'
//						);

    // Return the table information
    return $pntable;
}

?>