<?php
/**
 * Gets all the items created in the menu
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id_parent
 * @return:	And array with the items information
*/
function iw_vhmenu_adminapi_getall($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	
	extract($args);

	// Needed arguments.
	if(isset($id_parent)){$id = $id_parent;}
	(!isset($id)) ? $id_parent = 0 : $id_parent = $id;
	
	if(isset($active)){
		$active = " AND active=$active ";
	}else{
		$active = "";
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_vhmenu_column'];
	if($id_parent == '-1'){
		$where = "$active";
	}else{
		$where = "$c[id_parent]=$id_parent $active";
	}
	$orderby = "$c[iorder]";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_vhmenu', $where, $orderby, '-1', '-1', 'mid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Create a new menu item
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   array with the values that have to be created
 * @return:	The identity of the record created
*/
function iw_vhmenu_adminapi_create($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	
	extract($args);

	// Optional arguments.
	if (!isset($args['descriu'])) {
		$descriu = '';
	}


	// Needed arguments.
	if (!isset($args['text'])) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}


	$item = array('text' => $args['text'],
					'url' => $args['url'],
					'bg_image' => $args['bg_image'],
					'height' => $args['height'],
					'width' => $args['width'],
					'id_parent' => $args['id_parent'],
					'groups' => $args['groups'],
					'active' => $args['active'],
					'target' => $args['target'],
					'descriu' => $args['descriu'],
					'grafic' => $args['grafic'],
					'image1' => $args['image1'],
					'image2' => $args['image2']);

	if (!DBUtil::insertObject($item, 'iw_vhmenu', 'mid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}

	// Let any hooks know that we have created a new item.
	pnModCallHooks('item', 'create', $item['mid'], array('module' => 'iw_vhmenu'));

	// Return the id of the newly created item to the calling process
	return $item['mid'];
}

/**
 * Create a new submenu item
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   array with the values that have to be created
 * @return:	The identity of the record created
*/
function iw_vhmenu_adminapi_create_sub($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	
	extract($args);

	// Optional arguments.
	if (!isset($args['descriu'])) {
		$descriu = '';
	}


	// Needed arguments.
	if (!isset($args['text']) || !isset($args['mid'])) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$item = array('mid' => $args['mid'],
					'text' => $args['text'],
					'url' => $args['url'],
					'bg_image' => $args['bg_image'],
					'height' => $args['height'],
					'width' => $args['width'],
					'id_parent' => $args['id_parent'],
					'groups' => $args['groups'],
					'active' => $args['active'],
					'target' => $args['target'],
					'descriu' => $args['descriu'],
					'grafic' => $args['grafic'],
					'image1' => $args['image1'],
					'image2' => $args['image2']);

	if (!DBUtil::insertObject($item, 'iw_vhmenu', 'mid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}

	// Let any hooks know that we have created a new item.
	pnModCallHooks('item', 'create', $item['mid'], array('module' => 'iw_vhmenu'));

	// Return the id of the newly created item to the calling process
	return $item['mid'];
}

/**
 * Gets a menu item
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:		id of the item to get
 * @return:		An array with the item information
*/
function iw_vhmenu_adminapi_get($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	
	// Needed arguments.
	if (!isset($args['mid'])) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	// get the objects from the db
	$items = DBUtil::selectObjectByID ('iw_vhmenu', $args['mid'], 'mid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Delete a menu item and all the submenus items associated with it
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the item to delete
 * @return:	True if success
*/
function iw_vhmenu_adminapi_delete($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	$submenusId = FormUtil::getPassedValue('submenusId', isset($args['submenusId']) ? $args['submenusId'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Needed arguments.
	if (!isset($submenusId)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$submenusId_array = explode(',',$submenusId);

	foreach($submenusId_array as $mid){
		//Cridem la funciÃ³ get que retorna les dades
		$item = pnModAPIFunc('iw_vhmenu','admin','get',array('mid' => $mid));
		if (!$item) {
			return LogUtil::registerError (__('No such item found.', $dom));
		}

		// Delete the item and check the return value for error
		if (!DBUtil::deleteObjectByID ('iw_vhmenu', $mid, 'mid')) {
			return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
		}

		// Let any hooks know that we have deleted an item.
		pnModCallHooks('item', 'delete', $mid, array('module' => 'iw_vhmenu'));
	}
	// Let the calling process know that we have finished successfully
	return true;
}

/**
 * Update a menu item
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the item to update
 * @return:	True if success
*/
function iw_vhmenu_adminapi_update($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	
	extract($args);

	// Needed arguments.
	if (!isset($args['mid']) || !isset($text)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Cridem la funciÃ³ get que retorna les dades
	$item = pnModAPIFunc('iw_vhmenu','admin','get',array('mid' => $mid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	$items = array('text' => $args['text'],
					'url' => $args['url'],
					'bg_image' => $args['bg_image'],
					'height' => $args['height'],
					'width' => $args['width'],
					'active' => $args['active'],
					'target' => $args['target'],
					'descriu' => $args['descriu'],
					'grafic' => $args['grafic'],
					'image1' => $args['image1'],
					'image2' => $args['image2']);

	$pntable =& pnDBGetTables();

	$c = $pntable['iw_vhmenu_column'];
	$where = "$c[mid]=$mid";

	if (!DBUtil::updateObject($items, 'iw_vhmenu', $where, 'mid')) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	// Let any hooks know that we have updated an item.
	pnModCallHooks('item', 'update', $items['mid'], array('module' => 'iw_vhmenu'));

    	// Let the calling process know that we have finished successfully
	return true;
}

/**
 * Change the position of a menu item
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the item to move and new position
 * @return:	True if success
*/
function iw_vhmenu_adminapi_put_order($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	
	extract($args);

	// Needed arguments.
	if (!isset($args['mid']) || !isset($iorder)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Cridem la funciÃ³ get que retorna les dades
	$item = pnModAPIFunc('iw_vhmenu','admin','get',array('mid' => $mid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	$items = array('iorder' => $args['iorder']);

	$pntable =& pnDBGetTables();

	$c = $pntable['iw_vhmenu_column'];
	$where = "$c[mid]=$mid";

	if (!DBUtil::updateObject($items, 'iw_vhmenu', $where, 'mid')) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	// Let any hooks know that we have updated an item.
	pnModCallHooks('item', 'update', $item['mid'], array('module' => 'iw_vhmenu'));

    	// Let the calling process know that we have finished successfully
	return true;
}

/**
 * Delete the access of a group to a menu or submenu
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the item to move and the group to delete
 * @return:	True if success
*/
function iw_vhmenu_adminapi_modify_grup($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	
	extract($args);

	// Needed arguments.
	if (!isset($args['mid']) || !isset($groups)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Cridem la funciÃ³ get que retorna les dades
	$item = pnModAPIFunc('iw_vhmenu','admin','get',array('mid' => $mid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	$items = array('groups' => $args['groups']);

	$pntable =& pnDBGetTables();

	$c = $pntable['iw_vhmenu_column'];
	$where = "$c[mid]=$mid";

	if (!DBUtil::updateObject($items, 'iw_vhmenu', $where, 'mid')) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	// Let any hooks know that we have updated an item.
	pnModCallHooks('item', 'update', $item['mid'], array('module' => 'iw_vhmenu'));

    	// Let the calling process know that we have finished successfully
	return true;
}

/**
 * Change the level of a menu item
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the item to move
 * @return:	True if success
*/
function iw_vhmenu_adminapi_move_level($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	// Get parameters
	$id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'POST');
	$mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Needed arguments.
	if (!isset($mid) || !isset($id_parent)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Cridem la funciÃ³ get que retorna les dades
	$item = pnModAPIFunc('iw_vhmenu','admin','get',array('mid' => $mid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}

	$items = array('iorder' => '0',
			'id_parent' => $id_parent);

	$pntable =& pnDBGetTables();

	$c = $pntable['iw_vhmenu_column'];
	$where = "$c[mid]=$mid";

	if (!DBUtil::updateObject($items, 'iw_vhmenu', $where, 'mid')) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	// Let any hooks know that we have updated an item.
	pnModCallHooks('item', 'update', $mid, array('module' => 'iw_vhmenu'));

    	// Let the calling process know that we have finished successfully
	return true;
}
