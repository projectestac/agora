<?
/**
 * @package      MyMap
 * @version      $Id: pnajax.php 121 2008-10-10 09:30:02Z quan $
 * @author       Florian Schieï¿œl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 

/**
 * get the ajax loaded point overview table
 *
 * @param	int		id			(map_id)
 * @param	int		startnum	
 * @return	output
 */

/**
 * This function is replicated in pnuser.php since the version 1.6 of the module
 */ 
function MyMap_ajax_getOverviewTable()
{
	$render = pnRender::getInstance('MyMap');
	$mid = FormUtil::getPassedValue('mid');
	$markers = pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid));
	$i=2;
	$pagerlimit=10;
	$startnum = FormUtil::getPassedValue('startnum');
	if (!isset($startnum) || (!($startnum>0))) $startnum=1;
	foreach ($markers as $marker) {
		if (($i>$startnum) && ($i<=($startnum+$pagerlimit))) $selection[]=$marker;
		$i++;
	}
	// we also need the map data for the edit or delete links
	$render->assign('map',pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid)));
	// some data for the pager
	$render->assign('markerscounter',count($markers));
	$render->assign('limit',$pagerlimit);
	$render->assign('markers',$selection);
	$render->assign('uid',pnUserGetVar('uid'));
	$output = $render->fetch('mymap_ajax_display_markeroverview.htm');
	echo DataUtil::convertToUTF8($output);
	return true;
}

/**
 * load waypoints into a map
 *
 * @param	int		$args['mid']	(map_id)
 * @return	output
 */
function MyMap_ajax_loadWaypoints()
{
	$mid = (int)FormUtil::getPassedValue('mid');
	// Security check 
	if (!SecurityUtil::checkPermission('MyMap::', '.$mid', ACCESS_READ)) return LogUtil::registerPermissionError();
	$render = pnRender::getInstance('MyMap');
	$render->assign('waypoints',pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$mid)));
	$render->assign('mid',$mid);
	$output = $render->fetch('mymap_ajax_display_waypoints.htm');
	echo DataUtil::convertToUTF8($output);
	return true;
}

/**
 * export map to gpx data
 * 
 * @param	int	FORM(mid)	the map
 * @param	string	FORM(format)	'gpx' or 'kml'
 * @return	xml	data
 */

/**
 * This function is replicated in pnuser.php since the version 1.6 of the module
 */
function MyMap_ajax_export()
{
    $dom = ZLanguage::getModuleDomain('MyMap');
	// Security check 
	if (!SecurityUtil::checkPermission('MyMap::', '::', ACCESS_READ)) return LogUtil::registerPermissionError();

	// Get the map that should be displayed
	$mid = (int)FormUtil::getPassedValue('mid');
	$format = (string)FormUtil::getPassedValue('format');
	if (!isset($format) || ( strtolower($format) != 'gpx' && strtolower($format) != 'kml' ) ) {
		logUtil::registerError(_MYMAPMAPUNKNOWNTYPE);
	}
	if (isset($mid) && ($mid>0)) $map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid));
	if (!isset($mid) || (!($mid>0)) || (empty($map))) {
		logUtil::registerError(__('Map with given ID not found', $dom));
		return pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','main'));
	}
	
	$render = pnRender::getInstance('MyMap');
	$render->assign('map',$map);
	if ( $format == 'gpx' ) {
		$render->assign('xmltext',pnModAPIFunc('MyMap','user','createGpx',array('mid'=>$mid)));
	} else if ( $format == 'kml' ) {
		$render->assign('xmltext',pnModAPIFunc('MyMap','user','createKml',array('mid'=>$mid)));
	} else {
		$render->assign('xmltext', "Unknown format: $format");
	}
	$output = $render->fetch('mymap_user_export.htm');
	echo DataUtil::convertToUTF8($output);
	return true;
}

/**
 * Get map information as JSON data
 * 
 * @param	int	FORM(mid)	the map
 * @param	int	FORM(mk)	dump makrers
 * @param	int	FORM(wp)	dump trackpoints
 * @param	int	FORM(off)	offset for repeated loading
 * @return	JSON			data
 */

/**
 * This function is replicated in pnuser.php since the version 1.6 of the module
 */
function MyMap_ajax_JSONmap()
{
    $dom = ZLanguage::getModuleDomain('MyMap');
	// Security check 
	if (!SecurityUtil::checkPermission('MyMap::', '::', ACCESS_READ)) {
		LogUtil::registerPermissionError();
		AjaxUtil::error();
	}

	// Get the map that should be displayed
	$mid = (int)FormUtil::getPassedValue('mid', '-1');
	$getwaypoints = (int)FormUtil::getPassedValue('wp', '0');
	$getmarkers = (int)FormUtil::getPassedValue('mk', '0');
	$offset = (int)FormUtil::getPassedValue('off', '-1');
	$limit = 50;
	if (isset($mid) && ($mid>0))
		$map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid));

	if (!isset($mid) || (!($mid>0)) || (empty($map))) {
		LogUtil::registerError(__('Map with given ID not found', $dom));
		AjaxUtil::error(__('Map with given ID not found', $dom));
	}
	$data = array(
		'title' => $map['title'],
		'description' => $map['description'],
		'waypoints' => array(),
		'markers' => array(),
		'newoffset' => ( $offset >= 0 ? $offset + $limit : $limit ) + 1,
	);
	
	if ( $getwaypoints ) {
		$waypoints = pnModAPIFunc('MyMap','user','getWaypoints',
			array('mid'=>$mid, 'off'=>$offset, 'lim'=>$limit
			));
		foreach ( $waypoints as $waypoint ) {
			array_push($data['waypoints'],array(
				'lat' => $waypoint['lat'], 'lng' => $waypoint['lng']
			));
		}
	}
	if ( $getmarkers ) {
		$markers = pnModAPIFunc('MyMap','user','getMarkers',
			array('mid'=>$mid, 'off'=>$offset, 'lim'=>$limit));
		foreach ( $markers as $marker ) {
			array_push($data['markers'],array(
				'title' => $marker['title'],
				'text' => $marker['text'],
				'placename' => $marker['placename'],
				'postalcode' => $marker['postalcode'],
				'countrycode' => $marker['countrycode'],
				'lat' => $marker['lat'],
				'lng' => $marker['lng']
			));
		}
	}
	if ( count($data['markers']) < $limit and count($data['waypoints']) < $limit )
		$data['newoffset'] = -1;
	AjaxUtil::output(array('data' => $data), true, true);
}

?>
