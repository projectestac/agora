<?php
/**
 * @package      MyMap
 * @version      $Id: pnadmin.php 90 2008-08-24 09:05:08Z quan $
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
function MyMap_admin_main()
{
    // Security check 
    if (!SecurityUtil::checkPermission('MyMap::', '::', ACCESS_ADMIN)) return LogUtil::registerPermissionError();

    // Create output object
	$render = FormUtil::newpnForm('MyMap');
    return $render->pnFormExecute('mymap_admin_main.htm', new mymap_admin_editconfighandler());
}

/* ****************************** handler for FormUtil ********************************* */
class mymap_admin_editConfigHandler
{
    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('MyMap');
		$items_provider = array (	
								array('text' => __('Google', $dom), 'value' => 'google'),
								array('text' => __('yahoo!', $dom), 'value' => 'yahoo'),
								array('text' => __('Microsoft', $dom), 'value' => 'microsoft'),
								array('text' => __('OpenStreetMap', $dom), 'value' => 'openstreetmap'),
								array('text' => __('Map24', $dom), 'value' => 'map24'),
								array('text' => __('MapQuest', $dom), 'value' => 'mapquest'),
								array('text' => __('MultiMap', $dom), 'value' => 'multimap'),
								array('text' => __('FreeEarth', $dom), 'value' => 'freeearth'),
								array('text' => __('OpenLayers', $dom), 'value' => 'openlayers')
								);
		$render->assign('items_provider',$items_provider);
		$items_gpsbabelerror = array (	
								array('text' => '10m', 'value' => '0.01k'),
								array('text' => '20m', 'value' => '0.02k'),
								array('text' => '30m', 'value' => '0.03k'),
								array('text' => '40m', 'value' => '0.04k'),
								array('text' => '50m', 'value' => '0.05k'),
								array('text' => '60m', 'value' => '0.06k'),
								array('text' => '70m', 'value' => '0.07k'),
								array('text' => '80m', 'value' => '0.08k'),
								array('text' => '90m', 'value' => '0.09k'),
								array('text' => '100m', 'value' => '0.10k'),
								array('text' => '110m', 'value' => '0.11k'),
								array('text' => '120m', 'value' => '0.12k'),
								array('text' => '130m', 'value' => '0.13k'),
								array('text' => '140m', 'value' => '0.14k'),
								array('text' => '150m', 'value' => '0.15k'),
								array('text' => '160m', 'value' => '0.16k'),
								);
		$render->assign('items_gpsbabelerror',	$items_gpsbabelerror);
		$render->assign('provider',				pnModGetVar('MyMap','provider'));
		$render->assign('gpsbabel',				pnModGetVar('MyMap','gpsbabel'));
		$render->assign('gpsbabelerror',		pnModGetVar('MyMap','gpsbabelerror'));
		$render->assign('key_google',			pnModGetVar('MyMap','key_google'));
		$render->assign('key_yahoo',			pnModGetVar('MyMap','key_yahoo'));
		$render->assign('key_multimap',			pnModGetVar('MyMap','key_multimap'));
		$render->assign('key_map24',			pnModGetVar('MyMap','key_map24'));
		$render->assign('key_mapquest',			pnModGetVar('MyMap','key_mapquest'));
		$render->assign('key_freeearth',		pnModGetVar('MyMap','key_freeearth'));
		$render->assign('notify',				pnModGetVar('MyMap','notify'));
		$render->assign('map_overview',			pnModGetVar('MyMap','map_overview'));
		return true;
    }
    function handleCommand(&$render, &$args)
    {
        $dom = ZLanguage::getModuleDomain('MyMap');
		if ($args['commandName']=='update') {
		    if (!$render->pnFormIsValid()) return false;
		    $obj = $render->pnFormGetValues();
		    pnModDelVar('MyMap');
		    pnModSetVar('MyMap',	'provider',			$obj['provider']);
		    pnModSetVar('MyMap',	'gpsbabel',			$obj['gpsbabel']);
		    pnModSetVar('MyMap',	'gpsbabelerror',	$obj['gpsbabelerror']);
		    pnModSetVar('MyMap',	'ownmaps',			$obj['ownmaps']);
		    pnModSetVar('MyMap',	'key_google',		$obj['key_google']);
		    pnModSetVar('MyMap',	'key_yahoo',		$obj['key_yahoo']);
		    pnModSetVar('MyMap',	'key_multimap',		$obj['key_multimap']);
		    pnModSetVar('MyMap',	'key_map24',		$obj['key_map24']);
		    pnModSetVar('MyMap',	'key_mapquest',		$obj['key_mapquest']);
		    pnModSetVar('MyMap',	'key_freeearth',	$obj['key_freeearth']);
		    pnModSetVar('MyMap',	'notify',			$obj['notify']);
		    pnModSetVar('MyMap',	'map_overview',		$obj['map_overview']);
		    LogUtil::registerStatus(__('Configuration was successfully updated', $dom));
			return pnRedirect(pnModURL('MyMap','admin','main'));
		}
		return true;
    }
}
?>