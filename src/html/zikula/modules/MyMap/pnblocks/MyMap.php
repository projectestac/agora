<?php
if (strpos($_SERVER['PHP_SELF'], 'online.php')) {
	die ("You can't access directly to this block");
}

/**
 * initialise block
 *
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 */
function MyMap_MyMapblock_init()
{
	//Sent�ncia de seguretat
	pnSecAddSchema('MyMapBlock::', 'Block title::');
}

/**
 * get information on block
 *
 * @author       Albert P�rez Monfort (aperezm@xtec.cat)
 * @return       array       The block information
 */
function MyMap_MyMapblock_info()
{
    $dom = ZLanguage::getModuleDomain('MyMap');
	//Values
	return array('text_type' => 'MyMap',
			'module' => 'MyMap',
			'text_type_long' => __('Show a map into a block', $dom),
			'func_edit' => 'MyMap_MyMapblock_edit',
			'func_update' => 'MyMap_MyMapblock_update',
			'allow_multiple' => true,
			'form_content' => false,
			'form_refresh' => false,
			'show_preview' => true);
}

/**
 * Gets map information
 *
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 */
function MyMap_MyMapblock_display($row)
{
	// Security check
	if (!SecurityUtil::checkPermission('MyMapBlock::', $row['title']."::", ACCESS_READ)) {
		return false;
	}

	// Check if the module is available
	if(!pnModAvailable('MyMap')){
		return;
	}

	// Get current content
	$vars = pnBlockVarsFromContent($row['content']);

	$pnRender = pnRender::getInstance('MyMap');    

	// create map
	$coords[] = array('lat'	=> $vars['lat'],
				'lng' => $vars['lng'],
				'title'	=> $vars['maptitle'],
				'text'	=> $vars['text']);

	$mapcode = MyMap_MyMapblock_generateMap(array('coords' => $coords,
							'maptype' => $vars['maptype'],
							'width'	=> $vars['width'],
							'height' => $vars['height'],
							'zoomfactor' => $vars['zoomfactor'],
							'map_overview' => $vars['map_overview'],
							'show_controls' => $vars['show_controls']));

	$pnRender -> assign('card_html_code', $mapcode);

	$s = $pnRender -> fetch('mymap_block_map.htm');

	$row['content'] = $s;
	return themesideblock($row);	
}

/**
 * Edit the block characteristics
 *
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 */
function MyMap_MyMapblock_edit($row)
{
	// Get current content
	$vars = pnBlockVarsFromContent($row['content']);

	if (!empty($vars['lat'])) {
		$mymap['lat'] = $vars['lat'];
		$mymap['lng'] = $vars['lng'];
		$mymap['maptitle'] = $vars['maptitle'];
		$mymap['text'] = $vars['text'];
		$mymap['maptype'] = $vars['maptype'];
		$mymap['width'] = $vars['width'];
		$mymap['height'] = $vars['height'];
		$mymap['zoomfactor'] = $vars['zoomfactor'];
		$mymap['map_overview'] = $vars['map_overview'];
		$mymap['show_controls'] = $vars['show_controls'];
	} else {
		$mymap['lat'] = '';
		$mymap['lng'] = '';
		$mymap['maptitle'] = '';
		$mymap['text'] = '';
		$mymap['maptype'] = 'NORMAL';
		$mymap['width'] = 200;
		$mymap['height'] = 200;
		$mymap['zoomfactor'] = 13;
		$mymap['map_overview'] = 0;
		$mymap['show_controls'] = 0;
	}

	$pnRender = pnRender::getInstance('MyMap');

	$zoomfactors = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
	$pnRender -> assign('zoomfactors',$zoomfactors);
	$pnRender -> assign($mymap);
	
	// get the block output from the template
	$blockinfo['content'] = $pnRender -> fetch('mymap_block_edit.htm');

	// return the rendered block
	return pnBlockThemeBlock($blockinfo);
}

/**
 * Update the block characteristics
 *
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 */
function MyMap_MyMapblock_update($row)
{
    $vars['lat'] = FormUtil::getPassedValue('lat', 0, 'POST');
    $vars['lng'] = FormUtil::getPassedValue('lng', 0, 'POST');
    $vars['maptitle'] = FormUtil::getPassedValue('maptitle', '', 'POST');
    $vars['text'] = FormUtil::getPassedValue('text', '', 'POST');
    $vars['maptype'] = FormUtil::getPassedValue('maptype', 'NORMAL', 'POST');
    $vars['width'] = FormUtil::getPassedValue('width', 200, 'POST');
    $vars['height'] = FormUtil::getPassedValue('height', 200, 'POST');
    $vars['zoomfactor'] = FormUtil::getPassedValue('zoomfactor', 1, 'POST');
    $vars['map_overview'] = FormUtil::getPassedValue('map_overview', 0, 'POST');
    $vars['show_controls'] = FormUtil::getPassedValue('show_controls', 0, 'POST');

    $row['content'] = pnBlockVarsToContent($vars);
    return $row;
}

/**
 * generate an on-the-fly map
 * 
 * @return       output
 */
function MyMap_MyMapblock_generateMap($args)
{
	$markers = $args['coords'];
	
	// set some data for the non existent map
	$center = pnModAPIFunc('MyMap','user','getCenter',$markers);
	$map = array('centerlat'	=> $center['lat'],
			'centerlng' => $center['lng'],
			'id' => 0,
			'optionaltable'	=> 0,
			'width'	=> $args['width'],
			'height' => $args['height'],
			'zoomfactor' => $args['zoomfactor'],
			'maptype' => $args['maptype']);
	
	// We need some javascript and language files
	pnModAPIFunc('MyMap','user','addMapJS');
	pnModLangLoad('MyMap');

	// Create output object
	$render = pnRender::getInstance('MyMap');
	$render -> assign('map',$map);
	$render -> assign('clickzoom','1');
	$render -> assign('provider',pnModGetVar('MyMap','provider'));
	$render -> assign('markers',$markers);
	
	$map_overview = ($args['map_overview'] == 1) ? 'true' : 'false';

	$show_controls = ($args['show_controls'] == 1) ? 'true' : 'false';

	$render -> assign('show_controls', $show_controls);
	$render -> assign('map_overview',$map_overview);
	return $render -> fetch('mymap_block_display_map.htm');
}
