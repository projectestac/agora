<?php
function iw_forms_userapi_getFormDefinition($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
			return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
		}
	}
	
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$items = DBUtil::selectObjectByID('iw_forms_def', $fid, 'fid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

function iw_forms_userapi_getAllForms($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$user = FormUtil::getPassedValue('user', isset($args['user']) ? $args['user'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');

	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
			return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
		}
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_def_column'];

	$where = '';
	if($user != null){
		$where .= "$c[active]=1";
	}
	
	if($fid != null){
		$where .= " AND $c[fid]=$fid";
	}
	
	$orderby = "$c[formName]";

	$items = DBUtil::selectObjectArray('iw_forms_def', $where, $orderby, '-1', '-1', 'fid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

function iw_forms_userapi_getAllFormFields($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$whereArray = FormUtil::getPassedValue('whereArray', isset($args['whereArray']) ? $args['whereArray'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		return LogUtil::registerError (__('Could not find form', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_def_column'];
	if($whereArray != null){
		$values = explode('$$',$whereArray);
		foreach($values as $v){
			$parts = explode("|",$v);
			$field = $parts[0];
			$value = $parts[1];
			$where .= " AND $c[$field]=$value";
		}
	}
	$orderby = "$c[order]";
	$where = "$c[fid]=$fid " . $where;
	$items = DBUtil::selectObjectArray('iw_forms_note_def', $where, $orderby, '-1', '-1', 'fndid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * get all the groups that can access to the form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args	Array with the form identity
 * @return:	An array with the groups information
*/
function iw_forms_userapi_getAllGroups($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');

	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
			return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
		}
	}
	
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Get item
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid,
																		'sv' => $sv));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return false;
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_group_column'];

	$orderby = "$c[gfid]";
	$where = "$c[fid]=$fid";

	$items = DBUtil::selectObjectArray('iw_forms_group', $where, $orderby, '-1', '-1', 'gfid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;


}

/**
 * get all the groups that can access to the form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args	Array with the form identity
 * @return:	The user access of an user as a member of a group
*/
function iw_forms_userapi_getGroupsUserAccess($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$accessGroupsString = FormUtil::getPassedValue('accessGroupsString', isset($args['accessGroupsString']) ? $args['accessGroupsString'] : null, 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');

	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
			return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
		}
	}
	
	// Needed argument
	if (!isset($fid) || !is_numeric($fid) || !isset($accessGroupsString)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}


	$accessGroupsString = substr($accessGroupsString,2,-1);

	$groups = explode('$$',$accessGroupsString);

	//Get item
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid,
																		'sv' => $sv));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return false;
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_group_column'];

	//get the access of the user as a group
	//create a where string to select the groups
	foreach($groups as $group){
		$whereGroup .= "$c[group]=".$group.' OR ';
	}
	$whereGroup = substr($whereGroup, 0, '-3');

	$orderby = "$c[accessType] desc";
	$where = "$c[fid]=$fid AND (".$whereGroup.")";

	$items = DBUtil::selectObjectArray('iw_forms_group', $where, $orderby, '-1', '-1', 'gfid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	foreach($items as $item){
		if($item['accessType'] == 1){$canWrite = 1;}
		if($item['accessType'] == 2){$canRead = 2;}
		if($item['accessType'] == 3){$canReadAndWrite = 3;}
	}

	$accessType = $canWrite + $canRead + $canReadAndWrite;
	$accessType = ($accessType > 3) ? 3 : $accessType;

	$orderby = "$c[validationNeeded]";
	$where .= " AND ($c[accessType]=1 OR $c[accessType]=3)";

	//make another request to know if validation is needed for this user
	$items = DBUtil::selectObjectArray('iw_forms_group', $where, $orderby, '0', '1', 'gfid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	foreach($items as $item){
		$validationNeeded = $item['validationNeeded'];
	}

	// Return the items
	return array('validationNeeded' => $validationNeeded,
			'accessType' => $accessType);
}

function iw_forms_userapi_getAllValidators($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		return LogUtil::registerError (__('Could not find form', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_validator_column'];

	$orderby = "$c[validator]";
	$where = "$c[fid]=$fid";

	$items = DBUtil::selectObjectArray('iw_forms_validator', $where, $orderby, '-1', '-1', 'rfid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Check if an user is validator of a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the form identity
 * @return:	A value with the validation information
 *		0 - Can't validate
 *		1 - Can validate only some fields
 *		2 - Can validate all the fields
*/
function iw_forms_userapi_isValidator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : pnUserGetVar('uid'), 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');

	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	}else{
		$requestByCron = true;
	}
	
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	if(!pnUserLoggedIn()){
		return 0;
	}
	
	if($uid != pnUserGetVar('uid') && !$requestByCron){
		return 0;
	}

	//get the fields where there are dependances on this field
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_validator_column'];

	$orderby = "$c[validatorType]";
	$where = "$c[fid]=$fid AND $c[validator]=$uid";


	$items = DBUtil::selectObjectArray('iw_forms_validator', $where, $orderby, '0', '1', 'rfid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	$return = 0;
	foreach($items as $item){
		$return = ($item['validatorType'] != 0) ? 1 : 2;
	}

	return $return;
}

function iw_forms_userapi_getFormField($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fndid) || !is_numeric($fndid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$items = DBUtil::selectObjectByID('iw_forms_note_def', $fndid, 'fndid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

function iw_forms_userapi_getGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$gfid = FormUtil::getPassedValue('gfid', isset($args['gfid']) ? $args['gfid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($gfid) || !is_numeric($gfid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$items = DBUtil::selectObjectByID('iw_forms_group', $gfid, 'gfid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

function iw_forms_userapi_getvalidator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$rfid = FormUtil::getPassedValue('rfid', isset($args['rfid']) ? $args['rfid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($rfid) || !is_numeric($rfid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$items = DBUtil::selectObjectByID('iw_forms_validator', $rfid, 'rfid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Get the dependences for a field in other fields
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the field identity where needs to know which other fields have as dependent
 * @return:	An array with the dependences.
*/
function iw_forms_userapi_getFormFieldDependancesTo($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fndid) || !is_numeric($fndid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($item == false) {
		return LogUtil::registerError (__('Can not find the form field', $dom));
	}
	
	//get the fields where there are dependances on this field
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_def_column'];

	$orderby = "$c[fndid]";
	$where = "$c[dependance] like '%$".$fndid."$%'";

	$items = DBUtil::selectObjectArray('iw_forms_note_def', $where, $orderby, '-1', '-1', 'fndid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Gets all the categories defined
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the categories information
*/
function iw_forms_userapi_getAllCategories()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_cat_column'];

	$orderby = "$c[catName]";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_forms_cat', '', $orderby, '-1', '-1', 'cid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

function iw_forms_userapi_getCategory($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($cid) || !is_numeric($cid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$items = DBUtil::selectObjectByID('iw_forms_cat', $cid, 'cid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}


/**
 * get all the notes of a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	An array with the notes information
*/
function iw_forms_userapi_getAllNotesFilter($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$filterValue = FormUtil::getPassedValue('filterValue', isset($args['filterValue']) ? $args['filterValue'] : null, 'POST');
	$filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : null, 'POST');
	$order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : null, 'POST');
	$fieldType = FormUtil::getPassedValue('fieldType', isset($args['fieldType']) ? $args['fieldType'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if(!$userNotes == 1 && $access['level'] != 2 && $access['level'] < 3 && !SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)){
		return LogUtil::registerError (__('You can not access this form to view the annotations', $dom));	
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	
	$pntables = pnDBGetTables();

	$c   = $pntables['iw_forms_note_column'];

	if($fieldType == 6 || $fieldType == 8){
		$where .= "$c[content] = '$filterValue' AND $c[fndid] = $filter";
	}else{
		$where .= "$c[content] LIKE '%$filterValue%' AND $c[fndid] = $filter";
	}
	
	$items = DBUtil::selectObjectArray('iw_forms_note', $where, $orderby, -1, -1, 'fmid');

	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	return $items;
}

/**
 * get all the notes of a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	An array with the notes information
*/
function iw_forms_userapi_getAllNotes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$init = FormUtil::getPassedValue('init', isset($args['init']) ? $args['init']-1 : '-1', 'POST');
	$ipp = FormUtil::getPassedValue('ipp', isset($args['ipp']) ? $args['ipp'] : '-1', 'POST');
	$filterValue = FormUtil::getPassedValue('filterValue', isset($args['filterValue']) ? $args['filterValue'] : null, 'POST');
	$filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : null, 'POST');
	$userNotes = FormUtil::getPassedValue('userNotes', isset($args['userNotes']) ? $args['userNotes'] : null, 'POST');
	$order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : null, 'POST');
	$validate = FormUtil::getPassedValue('validate', isset($args['validate']) ? $args['validate'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if(!$userNotes == 1 && $access['level'] != 2 && $access['level'] < 3 && !SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)){
		return LogUtil::registerError (__('You can not access this form to view the annotations', $dom));	
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	
	$pntables = pnDBGetTables();

	$c   = $pntables['iw_forms_column'];

	if($userNotes != null && $userNotes == 1){
		$where = "$c[user]=".pnUserGetVar('uid')." AND $c[deluser]=0 AND ";
	}

	if($filterValue != null && $filterValue > 0 && $filter == 0){
		$where = "$c[user]=".$filterValue." AND ";
	}

	$where .= "$c[fid] = $fid";

	if($validate != null){
		$where .= " AND $c[validate] = $validate";
	}

	if ($fmid != null && !empty($fmid)) {
		$where .= " AND (";
		foreach($fmid as $f){
			$where .= " $c[fmid] = $f OR";
		}
		$where = substr($where,0,-3);
		$where .= ")";
	}

	switch($order){
		case null:
			$orderby = "$c[state], $c[fmid] desc";
			break;
		case "state":
			$orderby = "$c[state], $c[fmid] desc";
			break;
		case "time":
			$orderby = "$c[time] desc";
			break;
	}
	
	$items = DBUtil::selectObjectArray('iw_forms', $where, $orderby, $init, $ipp, 'fmid');
	
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	return $items;
}

/**
 * get all the fields contents for a note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	the note id
 * @return:	An array with the fields contents of note
*/
function iw_forms_userapi_getAllNoteContents($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid) || !isset($fmid) || !is_numeric($fmid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if($access['level'] < 1){
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));	
	}


	$myJoin = array();

	$myJoin[] = array('join_table' => 'iw_forms_note',
						'join_field' => array(),
						'object_field_name' => array(),
						'compare_field_table' => 'fnid',
						'compare_field_join' => 'fnid');

	$myJoin[] = array('join_table' => 'iw_forms_note_def',
						'join_field' => array('fieldName','fieldType','editable'),
						'object_field_name' => array('fieldName','fieldType','editable'),
						'compare_field_table' => 'fndid',
						'compare_field_join' => 'fndid');

	$pntables = pnDBGetTables();

	$ocolumn   = $pntables['iw_forms_note_column'];
	$lcolumn   = $pntables['iw_forms_note_def_column'];

	$where = "a.$ocolumn[fmid] = $fmid";

	$orderby = "b.$lcolumn[order]";

	$items = DBUtil::selectExpandedObjectArray('iw_forms_note', $myJoin, $where, $orderby, $init, $rpp, 'fndid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	return $items;
}

/**
 * get the contents for a field
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	the note id
 * @return:	An array with the fields contents of note
*/
function iw_forms_userapi_getNoteContent($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fnid = FormUtil::getPassedValue('fnid', isset($args['fnid']) ? $args['fnid'] : null, 'POST');
	$pntable = pnDBGetTables();

	$myJoin = array();

	$myJoin[] = array('join_table' => 'iw_forms_note',
						'join_field' => array(),
						'object_field_name' => array(),
						'compare_field_table' => 'fnid',
						'compare_field_join' => 'fnid');

	$myJoin[] = array('join_table' => 'iw_forms_note_def',
						'join_field' => array('fieldName','fieldType','editable'),
						'object_field_name' => array('fieldName','fieldType','editable'),
						'compare_field_table' => 'fndid',
						'compare_field_join' => 'fndid');

	$pntables = pnDBGetTables();

	$ocolumn   = $pntables['iw_forms_note_column'];
	$lcolumn   = $pntables['iw_forms_note_def_column'];

	$where = "a.$ocolumn[fnid] = $fnid";

	$items = DBUtil::selectExpandedObjectArray('iw_forms_note', $myJoin, $where, '', '-1', '-1', 'fnid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));
	}

	// check if user can access the form is validator
	// get note
	$note = pnModAPIFunc('iw_forms', 'user', 'getNote',
						  array('fmid' => $items[$fnid]['fmid']));
	// check if user can access the form is validator and the note is editable
	$access = pnModFunc('iw_forms', 'user', 'access',
						 array('fid' => $note['fid']));
	if ($access['level'] < 7) {
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));
	}

	// Return the items
	return array('content' => $items[$fnid]['content'],
				 'fmid' => $items[$fnid]['fmid'],
				 'fnid' => $items[$fnid]['fnid'],
				 'editable' => $items[$fnid]['editable']);
}

/**
 * get the users that have sended a note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the form
 * @return:	An array with the users information
*/
function iw_forms_userapi_getAllUsersNotes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if($access['level'] < 7){
		LogUtil::registerError (__('You can not access this form to view the annotations', $dom));
		// Redirect to the main site for the user
		return pnRedirect(pnModURL('iw_forms', 'user', 'main'));	
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_column'];

	$where = "$c[fid] = $fid AND $c[annonimous] = 0";

	$items = DBUtil::selectObjectArray('iw_forms', $where, '', '-1', '-1', 'user');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * get a note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	An array with the note information
*/
function iw_forms_userapi_getNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fmid) || !is_numeric($fmid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$items = DBUtil::selectObjectByID('iw_forms', $fmid, 'fmid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;

}

/**
 * Desactivate automatically the caducated forms
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	True if success
*/
function iw_forms_userapi_desactivateForm()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	$today = date('Y-m-d', time());
	$items = array('active' => 0);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_def_column'];
	$where = "$c[caducity] < '$today'  AND $c[caducity] > '0000-00-00'";

	if (!DBUTil::updateObject ($items, 'iw_forms_def', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * Create a new note in database
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	information of the note that have to be created
 * @return:	Thue if success and false otherwise
*/
function iw_forms_userapi_createNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$validate = FormUtil::getPassedValue('validate', isset($args['validate']) ? $args['validate'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		return LogUtil::registerError (__('Could not find form', $dom));
	}
	

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if($access['level'] != 1 && $access['level'] < 3){
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));	
	}

	$item = array('fid' => $fid,
			'user' => pnUserGetVar('uid'),
			'validate' => $validate,
			'time' => time(),
			'mark' => '$',
			'viewed' => '$',
			'publicResponse' => $item['publicResponse'],
			'annonimous' => $item['annonimous']);

	if (!DBUtil::insertObject($item, 'iw_forms', 'fmid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}

	// Return the id of the newly created item to the calling process
	return $item['fmid'];

}

/**
 * Check if a note content for a field exists
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	the field id and the note content id
 * @return:	Thue if exists and false otherwise
*/
function iw_forms_userapi_elementExists($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fmid) || !is_numeric($fmid) || !isset($fndid) || !is_numeric($fndid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$uid = pnUserGetVar('uid');

	//get the fields where there are dependances on this field
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];

	$where = "$c[fndid]=$fndid AND $c[fmid]=$fmid";


	$items = DBUtil::selectObjectArray('iw_forms_note', $where, '', '0', '1', 'fnid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	$return = false;
	foreach($items as $item){
		$return = true;
	}

	return $return;
}

/**
 * Create the content for a note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	the field id and the note content id
 * @return:	Thue if exists and false otherwise
*/
function iw_forms_userapi_createNoteContent($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
	$content = FormUtil::getPassedValue('content', isset($args['content']) ? $args['content'] : null, 'POST');
	$validate = FormUtil::getPassedValue('validate', isset($args['validate']) ? $args['validate'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid) || !isset($fmid) || !is_numeric($fmid) || !isset($fndid) || !is_numeric($fndid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if($access['level'] != 1 && $access['level'] < 3){
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));
	}

	//Get item
	$form = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($form == false) {
		return LogUtil::registerError (__('Could not find form', $dom));
	}

	//If form is closed it is not possible to add new notes
	if($form['closeInsert'] == 1){
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));
	}

	$item = array('fmid' => $fmid,
			'fndid' => $fndid,
			'content' => $content,
			'validate' => $validate);

	if (!DBUtil::insertObject($item, 'iw_forms_note', 'fnid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}

	// Return the id of the newly created item to the calling process
	return $item['fnid'];
}

/**
 * Update a note content
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	the field id and the note content
 * @return:	Thue if exists and false otherwise
*/
function iw_forms_userapi_updateNoteContent($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid) || !isset($fmid) || !is_numeric($fmid) || !isset($fndid) || !is_numeric($fndid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if($access['level'] != 1 && $access['level'] < 3){
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));	
	}

	//Get item
	$form = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($form == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return false;
	}

	//If form is closed it is not possible to add new notes
	if($form['closeInsert'] == 1){
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];
	$where = "$c[fmid]=$fmid AND $c[fndid]=$fndid";

	if (!DBUTil::updateObject ($items, 'iw_forms_note', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * Close/open a form insert
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	the fid id
 * @return:	Thue if exists and false otherwise
*/
function iw_forms_userapi_closeInsert($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if($access['level'] < 3){
		return LogUtil::registerError (__('You can not access this form to send annotations', $dom));	
	}

	//Get item
	$form = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($form == false) {
		return LogUtil::registerError (__('Could not find form', $dom));
	}

	//If form is closed it is not possible to add new notes
	$value = ($form['closeInsert'] == 1) ? 0 : 1;

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_def_column'];
	$where = "$c[fid]=$fid";
	$items = array('closeInsert' => $value);

	if (!DBUTil::updateObject ($items, 'iw_forms_def', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * delete a note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	An array with the note information
*/
function iw_forms_userapi_deleteNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');

	//get the note information
	$note = pnModAPIFunc('iw_forms','user','getNote',array('fmid' => $fmid));

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $note['fid']));
	if($access['level'] < 7){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}

	//Delete the note content
	if (!DBUtil::deleteObjectByID('iw_forms_note', $fmid, 'fmid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	//Delete the note
	if (!DBUtil::deleteObjectByID('iw_forms', $fmid, 'fmid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}

	return true;
}

/**
 * mark o unmark a note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	The new state for the note
*/
function iw_forms_userapi_markNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');

	//get the note information
	$note = pnModAPIFunc('iw_forms','user','getNote',array('fmid' => $fmid));

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $note['fid']));
	if($access['level'] < 7){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}

	//mark or unmark a note
	if(strpos($note['mark'],'$'.pnUserGetVar('uid').'$') !== false){
		//the note is marked
		$mark = str_replace('$'.pnUserGetVar('uid').'$','',$note['mark']);
		$marked = 'unmarked';
	}else{
		//the note is unmarked
		$mark = $note['mark'].'$'.pnUserGetVar('uid').'$';
		$marked = 'marked';
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];
	$where = "$c[fmid]=$fmid";

	$item = array('mark' => $mark);

	if (!DBUTil::updateObject ($item, 'iw_forms', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return $marked;
}

/**
 * set a note as completed or uncompleted
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	The new state for the note
*/
function iw_forms_userapi_changeState($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');

	//get the note information
	$note = pnModAPIFunc('iw_forms','user','getNote',array('fmid' => $fmid));

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $note['fid']));
	if($access['level'] < 7){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}

	$newState = ($note['state'] == 1) ? '' : 1;
	$state = ($note['state'] == 1) ? 'uncompleted' : 'completed';

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];
	$where = "$c[fmid]=$fmid";

	$item = array('state' => $newState);

	if (!DBUTil::updateObject ($item, 'iw_forms', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return $state;
}

/**
 * set a note as validated
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	true if success or false otherwise
*/
function iw_forms_userapi_validateNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');

	//get the note information
	$note = pnModAPIFunc('iw_forms', 'user', 'getNote',
                          array('fmid' => $fmid));

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access',
                         array('fid' => $note['fid']));
	if($access['level'] < 7){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];
	$where = "$c[fmid]=$fmid";
    $validate = ($note['validate'] == 1) ? 0 : 1;
	$item = array('validate' => $validate);
	if (!DBUTil::updateObject ($item, 'iw_forms', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

function iw_forms_userapi_submitValue($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$toDo = FormUtil::getPassedValue('toDo', isset($args['toDo']) ? $args['toDo'] : null, 'POST');
	$value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');

	//get the note information
	$note = pnModAPIFunc('iw_forms','user','getNote',
						  array('fmid' => $fmid));

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access',
						 array('fid' => $note['fid']));
	if($access['level'] < 7){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];
	$where = "$c[fmid]=$fmid";

	$item = array($toDo => $value);

	if (!DBUTil::updateObject ($item, 'iw_forms', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

function iw_forms_userapi_submitContentValue($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$fnid = FormUtil::getPassedValue('fnid', isset($args['fnid']) ? $args['fnid'] : null, 'POST');
	$toDo = FormUtil::getPassedValue('toDo', isset($args['toDo']) ? $args['toDo'] : null, 'POST');
	$value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');

	//get the note information
	$note = pnModAPIFunc('iw_forms','user','getNote',
						  array('fmid' => $fmid));

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access',
						 array('fid' => $note['fid']));
	if($access['level'] < 7){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}

	// get notecontents
	$noteContent = pnModAPIFunc('iw_forms', 'user', 'getNoteContent',
								array('fnid' => $fnid));
	if($noteContent['editable'] != 1){
		return LogUtil::registerError (__('You can not edit this note.', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];
	$where = "$c[fnid]=$fnid";

	$item = array('content' => $value);

	if (!DBUTil::updateObject ($item, 'iw_forms_note', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * Gets all the forms where there are flagged notes
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the items information
*/
function iw_forms_userapi_getWhereFlagged()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_column'];

	$where = "$c[mark] like '%$".pnUserGetVar('uid')."$%'";
	$orderby = "$c[fmid] desc";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_forms', $where, $orderby, '-1', '-1', 'fid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Gets all the forms where there are notes to validate
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	And array with the items information
*/
function iw_forms_userapi_getWhereNeedValidation()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_column'];

	$where = "$c[validate] = 0";
	$orderby = "$c[fmid] desc";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_forms', $where, $orderby, '-1', '-1', 'fid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Gets all the notes that are flagged
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Form id
 * @return:	And array with the items information
*/
function iw_forms_userapi_getFlagged($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if($access['level'] < 7){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_column'];

	$where = "$c[mark] like '%$".pnUserGetVar('uid')."$%' AND $c[fid]=$fid";
	$orderby = "$c[fmid] desc";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_forms', $where, $orderby, '-1', '-1', 'fmid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Gets all the notes that the users not has viewed
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Form id
 * @return:	And array with the items information
*/
function iw_forms_userapi_getNewNotes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : pnUserGetVar('uid'), 'POST');
	$sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
	
	if(!pnModFunc('iw_main', 'user', 'checkSecurityValue', array('sv' => $sv))){
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
			return LogUtil::registerPermissionError();
		}
	}else{
		$requestByCron = true;
	}
	
	$items = array();
	
	if($uid != pnUserGetVar('uid') && !$requestByCron){
		return $items;
	}
	
	//check user access to this form
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid,
															'uid' => $uid,
															'sv' => $sv));
	
	if($access['level'] < 2){
		return LogUtil::registerError (__('You can not access this form to view the annotations', $dom));
	}
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_column'];

	$where = "$c[viewed] not like '%$".$uid."|%' AND $c[fid]=$fid";
	$orderby = "$c[fmid] desc";

	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_forms', $where, $orderby, '-1', '-1', 'fmid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Check if an user has sended a note in a unique form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	form id
 * @return:	And array with the items information
*/
function iw_forms_userapi_sended($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_column'];

	$where = "$c[fid] = $fid AND $c[user] = ".pnUserGetVar('uid');

	$items = DBUtil::selectObjectArray('iw_forms', $where,'' , '-1', '-1', 'fid');

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}

	// Return the items
	return $items;
}

/**
 * Set notes as viewed by user who can manage them
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:		form id
 * @return:		True if success and false otherwise
*/
function iw_forms_userapi_setAsViewed($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	$value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');

	// Needed argument
	if ($fid == null || !is_numeric($fid) || $fmid == null || !is_numeric($fmid) || $value == null) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access', array('fid' => $fid));
	if($access['level'] < 2){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}
	
	$time = date('d/m/Y - H.i',time());
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_column'];
	$where = "$c[fmid]=$fmid";

	$item = array('viewed' => $value.'$'.pnUserGetVar('uid').'|'.$time.'$');

	if (!DBUTil::updateObject ($item, 'iw_forms', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}	
	return true;
}

/**
 * delete a user note
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	true if success or false otherwise
*/
function iw_forms_userapi_deleteUserNote($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');

	//get the note information
	$note = pnModAPIFunc('iw_forms','user','getNote',array('fmid' => $fmid));

	if($note['user'] != pnUserGetVar('uid')){
		return LogUtil::registerError (__('You do not have access to manage form', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];
	$where = "$c[fmid]=$fmid";

	$item = array('deluser' => 1);

	if (!DBUTil::updateObject ($item, 'iw_forms', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	return true;
}

/**
 * get all the notes of a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note
 * @return:	An array with the notes information
*/
function iw_forms_userapi_getTotalNotes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	//$userNotes = FormUtil::getPassedValue('userNotes', isset($args['userNotes']) ? $args['userNotes'] : null, 'POST');
	$filterValue = FormUtil::getPassedValue('filterValue', isset($args['filterValue']) ? $args['filterValue'] : null, 'POST');
	//$validate = FormUtil::getPassedValue('validate', isset($args['validate']) ? $args['validate'] : null, 'POST');
	$filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : null, 'POST');
	$filterValue = FormUtil::getPassedValue('filterValue', isset($args['filterValue']) ? $args['filterValue'] : null, 'POST');

	if($filter == 0){
		$pntable = pnDBGetTables();
		$c = $pntable['iw_forms_column'];
	
		if($userNotes != null && $userNotes == 1){
			$where = "$c[user]=".pnUserGetVar('uid')." AND $c[deluser]=0 AND ";
		}
	
		if($filterValue != null && $filterValue > 0 && $filter == 0){
			$where = "$c[user]=".$filterValue." AND ";
		}
	
		$where .= "$c[fid] = $fid";
	
		if($validate != null){
			$where .= " AND $c[validate] = $validate";
		}
	
		$items = DBUtil::selectObjectArray('iw_forms', $where, '', '-1', '-1', 'fmid');
		
		if ($items === false) {
			return LogUtil::registerError (__('Error! Could not load items.', $dom));
		}
		
		// Return the items
		return count($items);
	}else{
		$fmidNotes = pnModAPIFunc('iw_forms', 'user', 'getAllNotesFilter', array('fid' => $fid,
																					'filter' => $filter,
																					'filterValue' => $filterValue));
		
		return count($fmidNotes);
	}
}

/**
 * create the fields necessary for synchronization
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note, id of the form and ids of the needed fields
 * @return:	 True if success and false otherwise
*/
function iw_forms_userapi_fieldsToCreate($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access',
						 array('fid' => $fid));
	if ($access['level'] < 7) {
		LogUtil::registerError (__('You can not access this form to view the annotations', $dom));
		// Redirect to the main site for the user
		return pnRedirect(pnModURL('iw_forms', 'user', 'main'));	
	}
	$noteContent = pnModAPIFunc('iw_forms', 'user', 'getAllNoteContents',
							 	 array('fid' => $fid,
								   	   'fmid' => $fmid));
	if (!$noteContent) {
		LogUtil::registerError (__('Note content not found', $dom));
		return pnRedirect(pnModURL('iw_forms', 'user', 'manage',
									array('fid' => $fid,
										  'order' => $order,
										  'ipp' => $ipp,
										  'init' => $init,
										  'filterValue' => $filterValue,
										  'filter' => $filter)));
	}
	$fieldsIdsNoteArray = array();
	foreach ($noteContent as $noteContentId) {
		$fieldsIdsNoteArray[] = $noteContentId['fndid'];
	}
	//get form fields
	$fields = pnModAPIFunc('iw_forms', 'user', 'getAllFormFields',
							array('fid' => $fid,
								 'whereArray' => 'active|1'));
	if (!$fields) {
		LogUtil::registerError (__('Note fields not found', $dom));
		return pnRedirect(pnModURL('iw_forms', 'user', 'manage',
									array('fid' => $fid,
										  'order' => $order,
										  'ipp' => $ipp,
										  'init' => $init,
										  'filterValue' => $filterValue,
										  'filter' => $filter)));
	}
	foreach ($fields as $field) {
		if ($field['fieldType'] < 10) {
			$fieldsIdsArray[] = $field['fndid'];
		}
	}
	// get the fields that must be created
	$toCreate = array_diff($fieldsIdsArray, $fieldsIdsNoteArray);
	foreach ($toCreate as $create) {
		$item = array();
		$item = array('fmid' => $fmid,
					   'fndid' => $create,
					   'content' => '',
					   'validate' => 1);
		if (!DBUtil::insertObject($item, 'iw_forms_note', 'fnid')) {
			return LogUtil::registerError (__('Error! Creation attempt failed during field synchronization.', $dom));
		}
	}

	return true;
}

/**
 * create the fields necessary for synchronization
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param: 	id of the note, id of the form and ids of the needed fields
 * @return:	 True if success and false otherwise
*/
function iw_forms_userapi_fieldsToDelete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_READ)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//check user access to this form
	$access = pnModFunc('iw_forms', 'user', 'access',
						 array('fid' => $fid));
	if ($access['level'] < 7) {
		LogUtil::registerError (__('You can not access this form to view the annotations', $dom));
		// Redirect to the main site for the user
		return pnRedirect(pnModURL('iw_forms', 'user', 'main'));	
	}
	$noteContent = pnModAPIFunc('iw_forms', 'user', 'getAllNoteContents',
							 	 array('fid' => $fid,
								   	   'fmid' => $fmid));
	if (!$noteContent) {
		LogUtil::registerError (__('Note content not found', $dom));
		return pnRedirect(pnModURL('iw_forms', 'user', 'manage',
									array('fid' => $fid,
										  'order' => $order,
										  'ipp' => $ipp,
										  'init' => $init,
										  'filterValue' => $filterValue,
										  'filter' => $filter)));
	}
	$fieldsIdsNoteArray = array();
	foreach ($noteContent as $noteContentId) {
		$fieldsIdsNoteArray[] = $noteContentId['fndid'];
	}
	//get form fields
	$fields = pnModAPIFunc('iw_forms', 'user', 'getAllFormFields',
							array('fid' => $fid,
								 'whereArray' => 'active|1'));
	if (!$fields) {
		LogUtil::registerError (__('Note fields not found', $dom));
		return pnRedirect(pnModURL('iw_forms', 'user', 'manage',
									array('fid' => $fid,
										  'order' => $order,
										  'ipp' => $ipp,
										  'init' => $init,
										  'filterValue' => $filterValue,
										  'filter' => $filter)));
	}
	foreach ($fields as $field) {
		if ($field['fieldType'] < 10) {
			$fieldsIdsArray[] = $field['fndid'];
		}
	}
	// get the fields that must be deleted
	$toDelete = array_diff($fieldsIdsNoteArray, $fieldsIdsArray);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_column'];
	foreach ($toDelete as $delete) {
		$where = "$c[fmid]=$fmid AND $c[fndid]=$delete";
		if (!DBUTil::deleteWhere('iw_forms_note', $where)) {
			return LogUtil::registerError (__('Error! delete attempt failed during field synchronization.', $dom));
		}
	}
	return false;
}