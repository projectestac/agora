<?php
/**
 * Gets all the users depending on the filters
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   rang of users
 * @return:	And array with the users
*/
function iw_users_userapi_getAll($args)
{
	$inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
	$filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'POST');
	$campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'POST');
	$numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	if($filtre == '0'){$filtre = '';}
	$myJoin = array();
	$myJoin[] = array('join_table' => 'users',
					 'join_field' => array('uid'),
					 'object_field_name' => array('uid'),
					 'compare_field_table' => 'uid',
					 'compare_field_join' => 'uid');
	$myJoin[] = array('join_table' => 'iw_users',
					 'join_field' => array(),
					 'object_field_name' => array(),
					 'compare_field_table' => 'uid',
					 'compare_field_join' => 'uid');
	$pntables = pnDBGetTables();
	$ccolumn   = $pntables['users_column'];
	$ocolumn   = $pntables['iw_users_column'];
	switch($campfiltre){
		case 'n':
			$where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[nom]<>'' AND b.$ocolumn[nom] like '".$filtre."%'";
			$orderby = "order by b.$ocolumn[nom]";
			break;
		case 'c1':
			$where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[cognom1]<>'' AND b.$ocolumn[cognom1] like '".$filtre."%'";
			$orderby = "order by b.$ocolumn[cognom1]";
			break;
		case 'c2':
			$where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[cognom2]<>'' AND b.$ocolumn[cognom2] like '".$filtre."%'";
			$orderby = "order by b.$ocolumn[cognom2]";
			break;
		default:
			$where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND a.$ccolumn[uname] like '".$filtre."%'";
			$orderby = "order by a.$ccolumn[uname]";
	}
	$items = DBUtil::selectExpandedObjectArray('iw_users', $myJoin, $where, $orderby, $inici, $numitems, 'uid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (_SELECTFAILED);
	}
	return $items;
}

/**
 * Gets all the users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	And array with the users
*/
function iw_users_userapi_getAllUsers()
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	if($filtre == '0'){$filtre = '';}
	$myJoin = array();
	$myJoin[] = array('join_table' => 'users',
				'join_field' => array('uid'),
				'object_field_name' => array('uid'),
				'compare_field_table' => 'uid',
				'compare_field_join' => 'uid');
	$myJoin[] = array('join_table' => 'iw_users',
				'join_field' => array(),
				'object_field_name' => array(),
				'compare_field_table' => 'uid',
				'compare_field_join' => 'uid');
	$pntables = pnDBGetTables();
	$ccolumn   = $pntables['users_column'];
	$ocolumn   = $pntables['iw_users_column'];
	$where = "b.$ocolumn[uid] = a.$ccolumn[uid]";
	$items = DBUtil::selectExpandedObjectArray('iw_users', $myJoin, $where, '', '-1', '-1', 'uid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (_SELECTFAILED);
	}
	return $items;
}

/**
 * Get an user by id or by uname
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   the id of the user or the username
 * @return:	The user information
*/
function iw_users_userapi_get($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
	$id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'POST');
	$multi = FormUtil::getPassedValue('multi', isset($args['multi']) ? $args['multi'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if (!isset($uid) && !isset($id) && !isset($multi)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_users_column'];
	$where = "";
	if($multi != null){
		foreach($multi as $simple){
			$where .= "$c[uid]=$simple OR ";
		}
		$where = substr($where,0,-3);
		$orderby = "$c[uid]";
	}else{
		$where = (isset($id)) ? "$c[id]='$id'" : "$c[uid]=$uid";
		$orderby = '';
	}
	$items = DBUtil::selectObjectArray('iw_users', $where, $orderby, '-1', '-1', 'suid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Count the number of users for a specific filter
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   filter values
 * @return:	The number of users
*/
function iw_users_userapi_countUsers($args)
{
	$filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'POST');
	$campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	if($filtre == '0'){$filtre = '';}
	$myJoin = array();
	$myJoin[] = array('join_table' => 'users',
						'join_field' => array('uid'),
						'object_field_name' => array('uid'),
						'compare_field_table' => 'uid',
						'compare_field_join' => 'uid');
	$myJoin[] = array('join_table' => 'iw_users',
						'join_field' => array(),
						'object_field_name' => array(),
						'compare_field_table' => 'uid',
						'compare_field_join' => 'uid');
	$pntables = pnDBGetTables();
	$ccolumn   = $pntables['users_column'];
	$ocolumn   = $pntables['iw_users_column'];
	switch($campfiltre){
		case 'n':
			$where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[nom]<>'' AND b.$ocolumn[nom] like '".$filtre."%'";
			$orderby = "order by b.$ocolumn[nom]";
			break;
		case 'c1':
			$where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[cognom1]<>'' AND b.$ocolumn[cognom1] like '".$filtre."%'";
			$orderby = "order by b.$ocolumn[cognom1]";
			break;
		case 'c2':
			$where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND b.$ocolumn[cognom2]<>'' AND b.$ocolumn[cognom2] like '".$filtre."%'";
			$orderby = "order by b.$ocolumn[cognom2]";
			break;
		default:
			$where = "b.$ocolumn[uid] = a.$ccolumn[uid] AND a.$ccolumn[uname] like '".$filtre."%'";
			$orderby = "order by a.$ccolumn[uname]";
	}
	$items = DBUtil::selectExpandedObjectArray('iw_users', $myJoin, $where, $orderby, '-1', '-1', 'uid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (_SELECTFAILED);
	}
	return count($items);
}

/**
 * get all user's contacts
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	An array with the users
*/
function iw_users_userapi_getAllFriends()
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_users_friends_column'];
	$where = "$c[uid]=" . pnUserGetVar('uid');
	
	$items = DBUtil::selectObjectArray('iw_users_friends', $where, '', '-1', '-1', 'fuid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * add a contact into user's list
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param: fuid identity of the user to add
 * @return:	An array with the users
*/
function iw_users_userapi_addContant($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$items = array('uid' => pnUserGetVar('uid'),
					'fuid' => $args['fuid']);
	if (!DBUtil::insertObject($items, 'iw_users_friends', 'fud')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created user to the calling process
	return $items['fuid'];
}

/**
 * delete a contact from user's list
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param: fuid identity of the user to delete
 * @return:	true if success and false otherwise
*/
function iw_users_userapi_deleteContant($args)
{
	$dom=ZLanguage::getModuleDomain('iw_users');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$pntables = pnDBGetTables();
	$c   = $pntables['iw_users_friends_column'];
	$where    = "WHERE $c[uid]=" .  pnUserGetVar('uid') . " AND $c[fuid]=" . $args['fuid'];
	if (!DBUtil::deleteObject(array(),'iw_users_friends', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	return true;
}