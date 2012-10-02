<?php
/**
 * Gets from the database all the items in first level menu
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	And array with the items information
*/
function iw_vhmenu_userapi_getAllMenuItems()
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	$values = array();

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_vhmenu_column'];
	$where = "$c[id_parent]=0 AND $c[active]=1";
	$orderby = "$c[iorder]";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_vhmenu', $where, $orderby);

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Gets from the database all the items in the submenus
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	id parent of the menu which want the submenus
 * @return:	And array with the items information
*/
function iw_vhmenu_userapi_getAllSubMenuItems($args)
{
	$dom=ZLanguage::getModuleDomain('iw_vhmenu');
	$values = array();

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_vhmenu::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_vhmenu_column'];
	$where = "$c[id_parent]=$args[id_parent] AND $c[active]=1";
	$orderby = "$c[iorder]";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_vhmenu', $where, $orderby);

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}
