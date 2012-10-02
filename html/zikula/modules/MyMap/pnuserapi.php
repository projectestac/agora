<?php
/**
 * @package      MyMap
 * @version      $Id: pnuserapi.php 131 2008-11-06 18:08:26Z quan $
 * @author       Florian Schieï¿œl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
/**
 * get all mymap items
 * 
 * @param    int     $args['id']     (optional) item to return
 * @param    int     $args['uid']    (optional) item to return (user-specific)
 * @return   array   
 */
function MyMap_userapi_getMaps($args)
{
	if (isset($args['uid'])) $uid = (int)$args['uid'];
	if (isset($args['id'])) $id = (int)$args['id'];
	if (isset($uid) && ($uid>0)) {
		$pntable = pnDBGetTables();
		$column = $pntable['mymap_column'];
		$where = $column['uid']." = $uid";
		$orderBy = $column['date'];
		return DBUtil::selectObjectArray ('mymap', $where, $orderBy);
	}
	if (isset($id) && ($id>0)) return DBUtil::selectObjectByID('mymap',$id);	// just get one specific map
	else return DBUtil::selectObjectArray('mymap');								// we should get all items otherwise
}

/**
 * get all waypoints for a map
 * 
 * @param    int     $args['mid']    map id
 * @return   array
 */
function MyMap_userapi_getWayPoints($args)
{
	$mid = (int)$args['mid'];
	$offset = isset($args['off']) ? (int)$args['off'] : -1;
	$limit = isset($args['lim']) ? (int)$args['lim'] : -1;
	$pntable = pnDBGetTables();
	$column = $pntable['mymap_waypoints_column'];
	$where = $column['mid']." = $mid";
	$orderBy = $column['id'];
	return DBUtil::selectObjectArray ('mymap_waypoints', $where, $orderBy, $offset, $limit);
}

/**
 * get all mymap items
 * 
 * @param    int     $args['mid']		map id		// one...
 * @param    int     $args['id']		mrker id	// OR the other!
 * @return   array
 */
function MyMap_userapi_getMarkers($args)
{
	if (isset($args['mid'])) $mid = (int)$args['mid'];
	if (isset($args['id'])) $id = (int)$args['id'];
	$offset = isset($args['off']) ? (int)$args['off'] : -1;
	$limit = isset($args['lim']) ? (int)$args['lim'] : -1;
	$pntable = pnDBGetTables();
	$column = $pntable['mymap_markers_column'];
	if ($mid>0) $where = $column['mid']." = $mid";
	else if ($id>0) $where = $column['id']." = $id";
	$orderBy = $column['date'];
	return DBUtil::selectObjectArray ('mymap_markers', $where, $orderBy, $offset, $limit);
}

/**
 * get the latitude und longitude for postalcode / zipcode etc
 *
 * @param	object
 * @return	array
 */
function MyMap_userapi_getCoord($args)
{
	$postalcode = $args['postalcode'];
	$placename = utf8_encode($args['placename']);
	$countrycode = $args['countrycode'];
	$url = 'http://ws.geonames.org/postalCodeSearch?postalcode='.$postalcode.'&country='.$countrycode.'&placename='.str_replace(' ','%20',$placename).'&style=medium&MaxRows=100';
//for debugging only...		print $url;
	$xml = simplexml_load_file($url);		
	$results = (int) $xml->totalResultsCount;
	if ($results == 1) {
		return array (
			array(
			'placename'		=> (string)	$xml->code[0]->name,
			'countrycode'	=> strtolower((string) $xml->code[0]->countryCode),
			'adminname1'	=> (string) $xml->code[0]->adminName1,
			'postalcode'	=> (string)	$xml->code[0]->postalcode,
			'lat'			=> (float)	$xml->code[0]->lat,
			'lng'			=> (float)	$xml->code[0]->lng,
			)	);
	}
	else if ($results > 1) {
		$coords=array();
		for ($i=0;$i<=$results;$i++) {
			if (
				(($placename!="") && (substr_count(strtolower((string)$xml->code[$i]->name), strtolower($args['placename']))>0) && ((string)$xml->code[$i]->postalcode > 0))
					||
				(($postalcode!="") && ($postalcode == $xml->code[$i]->postalcode))
				  ) $coords[]=array(
					'placename'		=> (string)	$xml->code[$i]->name,
					'countrycode'	=> strtolower((string) $xml->code[$i]->countryCode),
					'adminname1'	=> (string)	$xml->code[$i]->adminName1,
					'postalcode'	=> (string)	$xml->code[$i]->postalcode,
					'lat'			=> (float)	$xml->code[$i]->lat,
					'lng'			=> (float)	$xml->code[$i]->lng	);
		}
		return $coords;
	}
	else return false;
}

/**
 * get lat / lng from file import (gpx)
 *
 * @param	$args['filename']	string	filename
 * @return	array
 */
function MyMap_userapi_getGPXimport($args)
{
	$filename = (string) $args['filename'];
	$mid = (int) $args['mid'];
	if (!isset($mid) || (!($mid>0))) return false;
	if (!isset($filename) or (!file_exists($filename))) return false;
	// get path for gpsbabel, a route simplifier script
	$gpsbabel=pnModGetVar('MyMap','gpsbabel');
	if (isset($gpsbabel) && ($gpsbabel != "") && file_exists($gpsbabel)) {
		$error = pnModGetVar('MyMap','gpsbabelerror');
		$cmd = $gpsbabel." -i gpx -f ".$filename." -x simplify,error=".$error." -o gpx -F ".$filename.".simple";
		shell_exec($cmd);
		unlink($filename);
		rename($filename.".simple",$filename);
	}
	// extract information from xml document
	$xml = simplexml_load_file($filename);
	if ( !isset($xml) ) {
		unset($filename);
		return $result;
	}
	$result = true;
	if ( isset($xml->trk) && isset($xml->trk[0]->trkseg) ) {
		foreach ($xml->trk[0]->trkseg[0] as $trkpt) {
			unset($act);
			foreach ($trkpt->attributes() as $name=>$value) {
				$act[utf8_decode((string)$name)] = (float)$value;
			}
			$act['lng'] = (float) $act['lon'];
			$act['mid']  = (int) $mid;
			unset($act['lon']);
			if (($act['lat']!=0) && ($act['lng']!=0))$trkpts[] = $act;
		}
		$result = DBUtil::insertObjectArray($trkpts,'mymap_waypoints');
		if ( !$result ) {
			unset($filename);
			return $result;
		}
	}
	if ( isset($xml->wpt) ) {
		$uid = pnUserGetVar('uid'); 
		foreach ($xml->wpt as $waypt) {
			unset($act);
			foreach ($waypt->attributes() as $name=>$value) {
				$act[utf8_decode((string)$name)] = (float)$value;
			}
			$act['lng'] = (float) $act['lon'];
			$act['mid'] = (int) $mid;
			unset($act['lon']);
			$act['uid'] = $uid;
			if ($waypt->name) $act['title'] = utf8_decode((string)$waypt->name);
			if ($waypt->cmt) $act['text'] = utf8_decode((string)$waypt->cmt);
			if (($act['lat']!=0) && ($act['lng']!=0)) $markers[] = $act;
		}
		if ( count($markers) > 0 ) 
			$result = DBUtil::insertObjectArray($markers,'mymap_markers');
	}

	// delete the uploaded file and save the imported data as we need it
	unset($filename);
	return $result;
}

/**
 * get the latitude und longitude for postalcode / zipcode etc
 *
 * @param	object
 * @return	array
 */
function MyMap_userapi_getCenter($coords)
{
	$i=0;
	$lng=(float)0.0;
	$lat=(float)0.0;
	foreach ($coords as $coord) {
		$lng+=$coord['lng'];
		$lat+=$coord['lat'];
		$i++;
	}
	if ($i==0) return array(
			'lat' => 50, 
			'lng' => 12, 
			'error' => 1
		);
	$lng=$lng/$i;
	$lat=$lat/$i;
	$lat=$lat+0.33;
	// replace , with . if neccesarry
	$lat = str_replace(',','.',$lat);
	$lng = str_replace(',','.',$lng);
	return array ('lat'=>$lat,'lng'=>$lng);
}

/**
 * delete an map
 * 
 * @param    int     $args['id']		id of map
 * @return   boolean	
 */
function MyMap_userapi_deleteMap($args)
{
	$id = (int)$args['id'];
	if (!isset($id) || (!($id > 0))) return false;
	// get the map that should be deleted
	$map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$id));
	$points = pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$map['id']));
	$waypoints = pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$map['id']));
	// delete all markers
	foreach ($points as $point) if (!pnModAPIFunc('MyMap','user','deletePoint',array('id'=>$point['id']))) return false;
	// delete all waypoints
	foreach ($waypoints as $waypoint) if (!pnModAPIFunc('MyMap','user','deleteWayPoint',array('id'=>$waypoint['id']))) return false;
	// delete the map
	return DBUtil::deleteObjectByID('mymap',$id);
}

/**
 * delete a marker
 * 
 * @param    int     $args['id']		id of marker / point
 * @return   boolean	
 */
function MyMap_userapi_deletePoint($args)
{
	$id = (int) $args['id'];
	if (!isset($id) || (!($id>0))) return false;
	return DBUtil::deleteObjectByID('mymap_markers',$id);
}

/**
 * delete all waypoints
 * 
 * @param    int     $args['mid']		map id
 * @return   boolean	
 */
function MyMap_userapi_deleteWayPoints($args)
{
	$mid = (int) $args['mid'];
	if (!isset($mid) || (!($mid>0))) return false;
	$waypoints = pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$mid));
	foreach ($waypoints as $waypoint) if (!pnModAPIFunc('MyMap','user','deleteWaypoint',array('id'=>$waypoint['id']))) return false;
	return true;
}

/**
 * delete last waypoint
 * 
 * @param    int     $args['mid']		map id
 * @return   boolean	
 */
function MyMap_userapi_deleteLastWayPoint($args)
{
	$mid = (int) $args['mid'];
	if (!isset($mid) || (!($mid>0))) return false;
	$waypoints = pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$mid));
	$last['id']=0;
	// delete highest id value
	foreach ($waypoints as $waypoint) if ($waypoint['id']>$last['id']) $last = $waypoint;
	if (pnModAPIFunc('MyMap','user','deleteWaypoint',array('id'=>$last['id']))) return true;
	else return false;
}

/**
 * delete a waypoint
 * 
 * @param    int     $args['id']		id of marker / point
 * @return   boolean	
 */
function MyMap_userapi_deleteWayPoint($args)
{
	$id = (int) $args['id'];
	if (!isset($id) || (!($id>0))) return false;
	return DBUtil::deleteObjectByID('mymap_waypoints',$id);
}

/**
 * add JS for specific Maps
 * 
 * @return   void
 */
function MyMap_userapi_addMapJS()
{
	// some general js code
	PageUtil::AddVar('javascript','javascript/ajax/prototype.js');
	PageUtil::AddVar('stylesheet', ThemeUtil::getModuleStylesheet('MyMap'));
	PageUtil::AddVar('javascript','modules/MyMap/javascript/mymap.js');
	PageUtil::AddVar('javascript','modules/MyMap/javascript/mapstraction.js');
	// specific for the provider
	switch (pnModGetVar('MyMap','provider')) {
		case 'yahoo':
			PageUtil::AddVar('javascript',"http://api.maps.yahoo.com/ajaxymap?v=3.0&appid=".pnModGetVar('MyMap','key_yahoo')."/");
			break;
		case 'google':
			PageUtil::AddVar('javascript',"http://maps.google.com/maps?file=api&v=2&key=".pnModGetVar('MyMap','key_google'));
		case 'openstreetmap':
			PageUtil::AddVar('javascript',"http://maps.google.com/maps?file=api&v=2&key=".pnModGetVar('MyMap','key_google'));
			break;
		case 'microsoft':
			PageUtil::AddVar('javascript','http://dev.virtualearth.net/mapcontrol/v3/mapcontrol.js');
			break;
		case 'map24':
			PageUtil::AddVar('javascript','http://api.maptp.map24.com/ajax?appkey='.pnModGetVar('MyMap','key_map24'));
			break;
		case 'multimap':
			PageUtil::AddVar('javascript','http://developer.multimap.com/API/maps/1.2/'.pnModGetVar('MyMap','key_multimap'));
			break;
		case 'mapquest':
			PageUtil::AddVar('javascript','http://btilelog.access.mapquest.com/tilelog/transaction?transaction=script&key='.pnModGetVar('MyMap','key_mapquest').'&ipr=true&itk=true&v=5.1');
//<script src="mapquest-js/mqcommon.js" type="text/javascript"></script>
//<script src="mapquest-js/mqutils.js" type="text/javascript"></script>
//<script src="mapquest-js/mqobjects.js" type="text/javascript"></script>
//<script src="mapquest-js/mqexec.js" type="text/javascript"></script>
			break;
		case 'freeearth':
			PageUtil::AddVar('javascript','text/javascript" src="http://freeearth.poly9.com/api.js');
			break;
		case 'openlayers':
			PageUtil::AddVar('javascript','http://openlayers.org/api/OpenLayers.js');
			break;
	}

}


/**
 * generate an on-the-fly map
 * 
 * @param	$args['lat']	string		id of lat field
 * @param	$args['lng']	string		id of lng field
 * @param	$args['coords']	array		coordinates
 * @return       output
 */
function MyMap_userapi_generateMap($args)
{
  	$lat 		= $args['lat'];
  	$lng 		= $args['lng'];
	$markers 	= $args['coords'];
	if ($markers == "") unset($markers);

	// maybe there is jsut one marker?
	if (!is_array($markers[0]) && (count($markers) > 0)) $markers = array($markers);

	// set some data for the non existent map
	$center = pnModAPIFunc('MyMap','user','getCenter',$markers);
	$map = array(
			'centerlat'		=> $center['lat'],
			'centerlng'		=> $center['lng'],
			'id'			=> rand(1,999999999),
			'optionaltable'	=> 0,
			'width'			=> $args['width'],
			'height'		=> $args['height'],
			'zoomfactor'	=> $args['zoomfactor'],
			'maptype'		=> $args['maptype']
			);
	// show the whole world if there is no marker
	if ($center['error'] == 1) $map['zoomfactor'] = 13;
	
	// We need some javascript and language files
	pnModAPIFunc('MyMap','user','addMapJS');
	pnModLangLoad('MyMap');
	// Create output object
	$render = pnRender::getInstance('MyMap');
	$render->assign('map',		$map);
	$render->assign('clickzoom','1');
	$render->assign('provider',	pnModGetVar('MyMap','provider'));
	if (!($center['error'] == 1)) $render->assign('markers',	$markers);
	if (pnModGetVar('MyMap','map_overview') == 1) $map_overview = 'true';
	else $map_overview = 'false';
	$render->assign('map_overview',$map_overview);

  	if (isset($lat) && isset($lng) && (strlen($lat) > 0) && (strlen($lng) > 0)) {
  	  	// this part is needed to let mymap know how the input fields are 
		// named where the value should be inserted into
	    $render->assign('lat',	$lat);
	    $render->assign('lng',	$lng);
	}

	// we should add our scripts and stylesheets..
	pnModAPIFunc('MyMap','user','addMapJS');

	$render->assign('onthefly',1);

	//return $render->fetch('mymap_user_display_map_ajax.htm');
	return $render->fetch('mymap_user_display_map.htm');
}

/**
 * sent a notification email
 *
 * @param	map		array		the map
 * @param	marker	array		new marker
 * @return	bool
 */
function MyMap_userapi_notify($args) {
    $dom = ZLanguage::getModuleDomain('MyMap');
	// get arguments
	$map = $args['map'];
	$marker = $args['marker'];
	// some validation checks
	if (empty($map)) return false;
	if (!isset($marker) || empty($marker)) return false;
	// send the email now!
	$render = pnRender::getInstance('MyMap');
	$render->assign('map',$map);
	$render->assign('marker',$marker);
	$body = $render->fetch('mymap_user_notify_newmarker.htm');
	$subject = __('Your map has been modified', $dom);
	$to = pnUserGetVar('email',$map['uid']);
	$headers = array('header' => '\nMIME-Version: 1.0\nContent-type: text/plain');
	$html = false;
	$result = pnMail($to, $subject, $body, $headers, $html);	
}

/**
 * create GPX code for a map's content
 *
 * @param	mapid		integer	
 * @eturn	GPX text
 */
function MyMap_userapi_createGpx($args) {
	if (isset($args['mid'])) $mid = $args['mid'];
	$render = pnRender::getInstance('MyMap');
	$render->assign('mid', $mid);
	$render->assign('map',pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid)));
	$render->assign('waypoints',pnModAPIFunc('MyMap','user','getWaypoints',array('mid'=>$mid)));
	$render->assign('markers',pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid)));
	return $render->fetch('mymap_user_export_gpx.htm');
}

/**
 * create KML code for a map's content
 *
 * @param	mapid		integer	
 * @eturn	KML text
 */
function MyMap_userapi_createKml($args) {
	if (isset($args['mid'])) $mid = (int)$args['mid'];
	$render = pnRender::getInstance('MyMap');
	$render->assign('mid', $mid);
	$render->assign('map',pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid)));
	$render->assign('waypoints',pnModAPIFunc('MyMap','user','getWaypoints',array('mid'=>$mid)));
	$render->assign('markers',pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid)));
	return $render->fetch('mymap_user_export_kml.htm');
}

/** 
 * get code for specific map inclusion and add pagevars
 *
 * @param	$args['id']		map id
 * return	code or false otherwise
 */
function MyMap_userapi_getCodeForMap($args)
{
  	$mid = (int)$args['id'];
  	$map		= pnModAPIFunc('MyMap','user','getMaps',		array('id' 	=> $mid));
  	if (($map['id'] != $mid) && (!($mid > 0))) return false;
	$markers 	= pnModAPIFunc('MyMap','user','getMarkers',		array('mid'	=> $mid));
	$waypoints 	= pnModAPIFunc('MyMap','user','getWaypoints',	array('mid'	=> $mid));
	// set center to the markers not the route!
	$center 	= pnModAPIFunc('MyMap','user','getCenter',array_merge($markers,$waypoints));
	$map['centerlat'] 	= $center['lat'];
	$map['centerlng'] 	= $center['lng'];
	$map['url_wps'] 	= pnmodurl('MyMap','user','loadWaypoints',array('mid'=>$map['id']));
	
    if (pnModGetVar('MyMap','map_overview') == 1) $map_overview = 'true';
    else $map_overview = 'false';
    $render 	= pnRender::getInstance('MyMap');
    $vars = array (
	    	'map'			=> $map,
	    	'uid' 			=> pnUserGetVar('uid'),
			'clickzoom'		=> '0',
			'markers'		=> $markers,
			'waypoints'		=> $waypoints,
			'provider'		=> pnModGetVar('MyMap','provider'),
			'map_overview'	=> $map_overview
		);
    $render->assign($vars);
    $content = $render->fetch('mymap_user_display_map.htm');
    
	// we need to avoid linebreaks to get the needle running with content later...
    $br = array("<br>","<br/>","<br />","\n","\r","\r\n","\n\r");
    $content = str_replace($br,'',$content);
	// add the MyMap specific javascripts
  	pnModAPIFunc('MyMap','user','addMapJS');
  	
  	// return code
  	return $content;
}
?>
