<?php
/**
 * Create a new forum in database
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the forum properties
 * @return	true if success
 */
function iw_forums_adminapi_create($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$nom_forum = FormUtil::getPassedValue('nom_forum', isset($args['nom_forum']) ? $args['nom_forum'] : null, 'POST');
	$descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
	$adjunts = FormUtil::getPassedValue('adjunts', isset($args['adjunts']) ? $args['adjunts'] : null, 'POST');
	$msgEditTime = FormUtil::getPassedValue('msgEditTime', isset($args['msgEditTime']) ? $args['msgEditTime'] : null, 'POST');
	$msgDelTime = FormUtil::getPassedValue('msgDelTime', isset($args['msgDelTime']) ? $args['msgDelTime'] : null, 'POST');
	$observacions = FormUtil::getPassedValue('observacions', isset($args['observacions']) ? $args['observacions'] : null, 'POST');
	$actiu = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Needed arguments
	if ((!isset($nom_forum))) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$item = array('nom_forum' => $nom_forum,
			'descriu' => $descriu,
			'adjunts' => $adjunts,
			'observacions' => $observacions,
			'msgEditTime' => $msgEditTime,
			'msgDelTime' => $msgDelTime,
			'actiu' => $actiu);

	if (!DBUtil::insertObject($item, 'iw_forums_def', 'fid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}


	// Let any hooks know that we have created a new item
	pnModCallHooks('item', 'create', $item['fid'], array('module' => 'iw_forums'));

	return $item['fid'];
}

/**
 * Update the forum information in the database
 * @author:   Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	forum identity and values
 * @return:	true if success and false otherwise
*/
function iw_forums_adminapi_update($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Get form information
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (_IWFORMSFORMNOTVALID);
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forums_def_column'];
	$where = "$c[fid] = $fid";

	if (!DBUTil::updateObject ($items, 'iw_forums_def', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * Delete the forum and post in database
 * @author:   Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	forum identity
 * @return:	true if success and false otherwise
*/
function iw_forums_adminapi_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forums');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forums::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Get form information
	$item = pnModAPIFunc('iw_forums', 'user', 'get', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (_IWFORMSFORMNOTVALID);
	}

	$pntables = pnDBGetTables();
	
	//Delete all the posts and attached files associated to the forum
	$adjunts = pnModAPIFunc('iw_forums', 'user', 'get_adjunts', array('fid' => $fid));
/*	
	foreach($adjunts as $adjunt){
		if($adjunt!=''){unlink('documents/forums/'.$adjunt['adjunt']);}		
	}
*/

	$c = $pntables['iw_forums_msg_column'];
	$where = "$c[fid]=$fid";
	if (!DBUtil::deleteWhere ('iw_forums_msg', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	//Delete all the topics associated to the forum
	$c = $pntables['iw_forums_temes_column'];
	$where = "$c[fid]=$fid";
	if (!DBUtil::deleteWhere ('iw_forums_temes', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	//Delete the forum
	if (!DBUtil::deleteObjectByID('iw_forums_def', $fid, 'fid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	return true;
}
