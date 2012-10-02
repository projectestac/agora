<?php

/**
 * @package      MyMap
 * @version      $Id: pnuser.php 151 2009-08-16 12:38:44Z quan $
 * @author       Florian Schieï¿œl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
/**
 * the main user function
 * 
 * @return       output
 */
function MyMap_user_main()
{
	// Security check 
	if (!SecurityUtil::checkPermission('MyMap::', '::', ACCESS_COMMENT)) return LogUtil::registerPermissionError();

	// Create output object
	$render = pnRender::getInstance('MyMap');
	$render->assign('maps',pnModAPIFunc('MyMap','user','getMaps',array('uid'=>pnUserGetVar('uid'))));
	return $render->fetch('mymap_user_main.htm');
}

/**
 * route management
 * 
 * @return       output
 */
function MyMap_user_routes()
{
    $dom = ZLanguage::getModuleDomain('MyMap');
	// Get parameters
	$mid = FormUtil::getPassedValue('mid');
	$map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid));
	$uid = pnUserGetVar('uid');

	// Security check 
	if (!SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_COMMENT)) return LogUtil::registerPermissionError();
	if (!(($map['uid']==$uid) || (SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_ADMIN)))) return LogUtil::registerPermissionError();

	// We need some javascript
	pnModAPIFunc('MyMap','user','addMapJS');
	
	// is there an action to do?
	$action = FormUtil::getPassedValue('action');
	// delete all waypoints
	if (isset($action) && (strtolower($action) == 'delete_waypoints')) {
		if (pnModAPIFunc('MyMap','user','deleteWaypoints',array('mid'=>$map['id'])))logUtil::registerStatus(__('All waypoints for this map have been deleted successfully!', $dom));
		else logUtil::registerError(__('Error while deleting waypoints', $dom));
	}
	// delete last waypoint
	else if (isset($action) && (strtolower($action) == 'delete_lastwaypoint')) {
		if (pnModAPIFunc('MyMap','user','deleteLastWaypoint',array('mid'=>$map['id'])))logUtil::registerStatus(__('Waypoint deleted successfully', $dom));
		else logUtil::registerError(__('Error while deleting waypoints', $dom));
	}
	if (isset($action)) pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','routes',array('mid'=>$map['id'])));

	// get the map's center point
	$markers = pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid));
	$waypoints = pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$mid));
	$center = pnModAPIFunc('MyMap','user','getCenter',$waypoints);
	$map['centerlat']=$center['lat'];
	$map['centerlng']=$center['lng'];

	// Create output object
	$render = FormUtil::newpnForm('MyMap');
	$map['url_wps'] = pnmodurl('MyMap','user','loadWaypoints',array('mid'=>$map['id']));
	$render->assign('map',$map);
	$render->assign('markers',$markers);
	$render->assign('waypoints',$waypoints);
	$render->assign('provider',pnModGetVar('MyMap','provider'));
	$render->assign('gpsbabel',pnModGetVar('MyMap','gpsbabel'));
	$render->assign('map_overview','false');
	return $render->pnFormExecute('mymap_user_routes.htm', new mymap_user_routeshandler());
}

/**
 * display a map
 * 
 * @return       output
 */
function MyMap_user_display()
{    
    $dom = ZLanguage::getModuleDomain('MyMap');
	// Security check 
	$mid = FormUtil::getPassedValue('mid');
	if (!SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_READ)){
	     return LogUtil::registerPermissionError();   
	}	       
	// Get the map that should be displayed
	if (isset($mid) && ($mid>0)) $map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$mid));
	if (!isset($mid) || (!($mid>0)) || (empty($map))) {
		logUtil::registerError(__('Map with given ID not found', $dom));
		return pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','main'));
	}
	
	// get the map's center point
	$markers 	= pnModAPIFunc('MyMap','user','getMarkers',array('mid'=>$mid));
	$center 	= pnModAPIFunc('MyMap','user','getCenter',$markers);
	$waypoints 	= pnModAPIFunc('MyMap','user','getWayPoints',array('mid'=>$mid));
	$map['centerlat'] 	= $center['lat'];
	$map['centerlng'] 	= $center['lng'];
	
	// we need this info for ajax waypoints loading
	$map['url_wps'] 	= pnmodurl('MyMap','user','loadWaypoints',array('mid'=>$map['id']));
	
	// is there a delete-action called?
	$command = FormUtil::getPassedValue('command');
	$pid = FormUtil::getPassedValue('pid');
	if (isset($command) && ($command == "delete") && isset($pid) && ($pid>0)) {
		// we need the marker to check the user's permission
		if (!SecurityUtil::confirmAuthKey()) LogUtil::registerAuthIDError();
		else {
			$markerArray = pnModAPIFunc('MyMap','user','getMarkers',array('id'=>$pid));
			$marker=$markerArray[0];
			$uid = pnUserGetVar('uid');
			if ((SecurityUtil::checkPermission('MyMap','$mid::', ACCESS_ADMIN)) || ($map['uid'] == $uid) || ($marker['uid'] == $uid)) {
				if (pnModAPIFunc('MyMap','user','deletePoint',array('id'=>$pid))) LogUtil::registerStatus(__('The markered point was deleted successfully', $dom));
				else LogUtil::registerError(__('An error occured while trying to delete a markered point', $dom));
			}
			else LogUtil::registerError(__('An error occured while trying to delete a markered point', $dom));
		}
		return pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','display',array('mid'=>$mid)));
	}
    
	// We need some javascript
	pnModAPIFunc('MyMap','user','addMapJS');
    
	//and scribite support
	$scribite = pnModGetVar('MyMap','scribite');
	if (pnModAvailable('scribite') && ($scribite == 1)) {
	        $scribite = pnModFunc('scribite','user','loader', array('modname' => 'MyMap',
	                                                                'editor'  => 'xinha', // normally pnModGetVar('MyMap', 'editor')
	                                                                'areas'   => array('text'),
	                                                                'tpl'     => 'mymap_user_display.htm'));
	    PageUtil::AddVar('rawtext', $scribite);
    }
    
	// Create output object
	$render = FormUtil::newpnForm('MyMap');
	$render->assign('map',$map);
	$uid = pnUserGetVar('uid');
	$render->assign('uid',$uid);
	$render->assign('clickzoom','1');
	$render->assign('provider',pnModGetVar('MyMap','provider'));
	$render->assign('uname',pnUserGetVar('uname',$map['uid']));
	$render->assign('markers',$markers);
	$render->assign('waypoints',$waypoints);
	if (pnModGetVar('MyMap','map_overview') == 1) $map_overview='true';
	else $map_overview='false';
	$render->assign('map_overview',$map_overview);
	return $render->pnFormExecute('mymap_user_display.htm', new mymap_user_editpointhandler());
}

/**
 * add or edit a new map
 *
 * @return		output
 */
function MyMap_user_editMap()
{
	// Security check 
	$mid = FormUtil::getPassedValue('mid');
	if (!SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_COMMENT)) return LogUtil::registerPermissionError();

	// Create output object
	$render = FormUtil::newpnForm('MyMap');
	return $render->pnFormExecute('mymap_user_editmap.htm', new mymap_user_editmaphandler());
}

/* ****************************** handler for FormUtil ********************************* */
class mymap_user_editPointHandler
{
	var $id;
	var $mid;
	function initialize(&$render)
	{
		$this->id = (int)FormUtil::getPassedValue('id', 0);
		$this->mid = (int)FormUtil::getPassedValue('mid', 0);
		if ($this->id > 0) {
			$data = DBUtil::selectObjectByID('mymap_markers', $this->id);
			$render->assign($data);
			PageUtil::AddVar('body','onload="javascript:toggledisplay(\'mymap_hiddendiv_addmarkers\',\'indicator_addmarkers\'); return false;"');
		}
		return true;
	}
	function handleCommand(&$render, &$args)
	{
	    $dom = ZLanguage::getModuleDomain('MyMap');
		if ($args['commandName']=='update') {
			// Security check 
			if (!SecurityUtil::checkPermission('MyMap::', '$mid::', ACCESS_COMMENT)) return LogUtil::registerPermissionError();
			$map = pnModAPIFunc('MyMap','user','getMaps',array('id'=>$this->mid));
			$uid = pnUserGetVar('uid');
			if (($map['uid'] != $uid) && ($map['wiki']==0)) return LogUtil::registerPermissionError();

			// We need to check if there is lat and lng submitted or if we have to get the coordinates via webservice
			PageUtil::AddVar('body','onload="javascript:toggledisplay(\'mymap_hiddendiv_addmarkers\',\'indicator_addmarkers\'); return false;"');
			$obj	= $render->pnFormGetValues();
			$id 	= $this->id;
			$uid 	= pnUserGetVar('uid');
			if ($this->id > 0) $obj['id']=$id;
			if (!isset($obj['lng']) || (!isset($obj['lat']))) {
				$coord=pnModAPIFunc('MyMap','user','getCoord',$obj);
				if (!$coord) {
				  	LogUtil::registerError(__('No coordinate was given. Please specify more information like country code, zip code, city name', $dom));
				  	return false;
				}
				srand(microtime()*1000000);
				if (count($coord)==1) {
					$c=$coord[0];
					$obj['postalcode'] 		= $c['postalcode'];
					$obj['placename'] 		= $c['placename'];
					$obj['countrycode'] 	= $c['countrycode'];
					$obj['lat'] 			= (float)$c['lat'];
					$obj['lng'] 			= (float)$c['lng'];
					// shuffle a little bit... lat +- 0.004 lng +- 0.004
					$obj['lat']+=0.00001*(rand(1,800)-400);
					$obj['lng']+=0.00001*(rand(1,800)-400);
					LogUtil::registerStatus(__('Geo information encoded to coordinage', $dom).': LAT ['.$obj['lat'].'] - LNG ['.$obj['lng'].']');
				}
				else {
					foreach ($coord as $c) $coords.=$c['postalcode'].' '.$c['placename'].' ('.$c['countrycode'].', '.$c['adminname1'].'), ';
					$coords.=__('please choose the postalcode and / or the countrycode you need', $dom).'!';
					LogUtil::registerStatus(__('More than one place was found:', $dom).' '.$coords);
					return true;
				}
			}
			if (!$render->pnFormIsValid()) return false;
			$obj['uid']=$uid;
			$obj['mid']=$this->mid;
			// we need to check if a user wants to add a point to an own map or 
			// if another user has the permission to add something to the actual map.
			if (!isset($obj['lng']) || (!isset($obj['lat']))) {
				LogUtil::registerError(__('The longitude and the latitude are missing. Please give us the countrycode and postalcode of your target. Also the name of the place might help us.', $dom));
				return false;
			}
			if ($id>0) {
				$result = DBUtil::updateObject($obj, 'mymap_markers');
				if ($result) {
				  	LogUtil::registerStatus(__('The marker was updated', $dom));
					pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','display',array('mid'=>$obj['mid'])));
				}
			}
			else {
				$obj['id'] = $this->id;
				DBUtil::insertObject($obj, 'mymap_markers');
				LogUtil::registerStatus(__('The marker was added', $dom));
				if (pnModGetVar('MyMap','notify') == 1) {
					if (pnUserGetVar('uid')!=$map['uid']) {
						pnModAPIFunc('MyMap','user','notify',array('map'=>$map,'marker'=>$obj));
						LogUtil::registerStatus(__('A notification Email was sent to the author of the map that you added a new marker', $dom));
					}
				}
				return pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','display',array('mid'=>$obj['mid'])));
			}
		}
		return true;
    }
}

class mymap_user_editMapHandler
{
	var $id;
	function initialize(&$render)
	{
	    $dom = ZLanguage::getModuleDomain('MyMap');
		$items_yesno = array (	array('text' => __('No', $dom), 'value' => 0),
								array('text' => __('Yes', $dom), 'value' => 1) );
		$items_maptype = array (array('text' => __('normal', $dom), 'value' => 'NORMAL'),
								array('text' => __('hybrid', $dom), 'value' => 'HYBRID'),
								array('text' => __('satellite', $dom), 'value' => 'SATELLITE')	 );
		$render->assign('items_wiki',			$items_yesno);
		$render->assign('wiki',					0);
		$render->assign('items_optionaltable',	$items_yesno);
		$render->assign('optionaltable',		1);
		$render->assign('items_maptype',		$items_maptype);
		$render->assign('maptype',				'h');

		$this->id = (int)FormUtil::getPassedValue('id', 0);
		if ($this->id > 0) {
			$data = DBUtil::selectObjectByID('mymap', $this->id);
			$render->assign($data);
		}
		return true;
	}
	function handleCommand(&$render, &$args)
	{
	    $dom = ZLanguage::getModuleDomain('MyMap');
		if ($args['commandName']=='update') {
			if (!$render->pnFormIsValid()) return false;
			$obj 		= $render->pnFormGetValues();
			$obj['id']	= $this->id;
			$obj['uid']	= pnUserGetVar('uid');

			// Should the map be deleted?
			$deleteMap = (int)$obj['deletemap'];
			if ($deleteMap == 1) {
				$delResult = pnModAPIFunc('MyMap','user','deleteMap',array('id'=>$obj['id']));
				if ($delResult) logUtil::registerStatus(__('The map was deleted successfully', $dom));
				else logUtil::registerStatus(__('An error occured while deleting the map', $dom));
				return pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','main'));
			}

			if ($obj['id']>0) {
				DBUtil::updateObject($obj, 'mymap');
				LogUtil::registerStatus(__('The map was updated successfully', $dom));
			}
			else {
				$obj['id'] = $this->id;
				DBUtil::insertObject($obj, 'mymap');
				LogUtil::registerStatus(__('New map was successfully created', $dom));
			}
			return pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','main'));
		}
		return true;
    }
}

class mymap_user_routesHandler
{
    var $id;
    function initialize(&$render)
    {
		$this->id = (int)FormUtil::getPassedValue('mid');
		return true;
    }
    function handleCommand(&$render, &$args)
    {
        $dom = ZLanguage::getModuleDomain('MyMap');
		if ($args['commandName']=='add') {
		    if (!$render->pnFormIsValid()) return false;
		    $obj = $render->pnFormGetValues();

			// first check if coordinates are given as argument
			$lat = (float)$obj['lat'];
			$lng = (float)$obj['lng'];
			if (isset($lat) && isset($lng) && ($lat != '') && ($lng != '')) {
				$obj['mid'] = $this->id;
				if (DBUtil::insertObject($obj,'mymap_waypoints')) logUtil::registerStatus(__('Waypoint added successfully', $dom));
				else logUtil::registerError(_MYMAPWAYPOINTERROR);
			}
			else if (isset($obj['file'])){
				// otherwise we'll use the file import function
				$filename = $obj['file']['tmp_name'];
				$filesize = $obj['file']['size'];
				$fileerror= $obj['file']['error'];
				
				// Error handling
				if (($fileerror != 0) || (!($filesize > 0))) return logUtil::registerError(__('File upload error or empty data submitted', $dom));
	
				if (pnModAPIFunc('MyMap','user','getGPXImport',array('filename'=>$filename,'mid'=>$this->id))) logUtil::registerStatus(__('The file has been imported', $dom));
				else logUtil::registerStatus(__('An error occured while importing the file', $dom));
			}
			return pnRedirect(pnGetBaseURL().pnModURL('MyMap','user','routes',array('mid'=>$this->id)));
		}
		return true;
    }
}


/**
 * get the ajax loaded point overview table
 *
 * @param	int		id			(map_id)
 * @param	int		startnum	
 * @return	output
 */
function MyMap_user_getOverviewTable()
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
 * export map to gpx data
 * 
 * @param	int	FORM(mid)	the map
 * @param	string	FORM(format)	'gpx' or 'kml'
 * @return	xml	data
 */
function MyMap_user_export()
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
 * load waypoints into a map
 *
 * @param	int		$args['mid']	(map_id)
 * @return	output
 */
function MyMap_user_loadWaypoints()
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
?>