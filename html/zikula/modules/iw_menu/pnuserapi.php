<?php
/**
 * Gets from the database all the items in first level menu
 * @author:     Albert Perez Monfort (aperezm@xtec.cat)
 * @return:	And array with the items information
*/
function iw_menu_userapi_getMenuStructure($args){
	$dom=ZLanguage::getModuleDomain('iw_menu');
	$values = array();

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	$uid = is_null(pnUserGetVar('uid'))? '-1' : pnUserGetVar('uid');
	$id = isset($args[id_parent])? $args[id_parent] : 0;
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_menu_column'];
	$where = "$c[id_parent]=$id AND $c[active]=1";
	$orderby = "$c[iorder]";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_menu', $where, $orderby);
	
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	
	if(count($items) <= 0)
		return false;
		
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	
	$iconbase = 'index.php?module=iw_menu&func=getFile&fileName='.pnModGetVar('iw_menu', 'imagedir').'/';
	
	$menuitems = Array();
	$numitem = 0;
	foreach ($items as $item) {
		$groups_vector = explode("$", $item['groups']);
		foreach ($groups_vector as $group) {
			if ($group != '') {
				$gids = explode("|", $group);
				if($uid != '-1'){
					$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
					$isMember = pnModFunc('iw_main', 'user', 'isMember', array('uid' => $uid,
													'gid' => $gids[0],
													'sgid' => $gids[1],
													'sv' => $sv));
				}
				if ($isMember || ($gids[0] == '-1' && $uid == '-1') ) {
					// Put target in detic_portal if available and selected
					unset($menuitem);
						
					$menuitem['text']  = $item['text'];
					
					if(!empty($item['icon']))
						$menuitem['icon']  = $iconbase.$item['icon'];
					
					if($item['target'] == 1){
						$menuitem['url'] = $item['url'];
						$menuitem['target'] = ' target="_blank"';
					}
					else if($item['target'] == 2 && pnModAvailable('iw_webbox')){
						$url = str_replace('?','**',$item['url']);
						$url = str_replace('&','*',$url);
						$menuitem['url'] = 'index.php?module=iw_webbox&url='.$url;
						$menuitem['target'] = '';
					} else{
						$menuitem['url'] = $item['url'];
						$menuitem['target'] = '';
					}
					
					$menuitem['is_parent'] = ($menuitem['children'] = pnModApiFunc('iw_menu','user','getMenuStructure', array('id_parent' => $item['mid']))) ? 1 : 0;
					$menuitems[$numitem] = $menuitem;
					$numitem++;	

					break;
				}
			}
		}
	}	

	// Return the items
	return $menuitems;
}
