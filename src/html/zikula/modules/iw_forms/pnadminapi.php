<?php
function iw_forms_adminapi_createNewForm($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$formName = FormUtil::getPassedValue('formName', isset($args['formName']) ? $args['formName'] : null, 'POST');
	$description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
	$title = FormUtil::getPassedValue('title', isset($args['title']) ? $args['title'] : null, 'POST');
	$public = FormUtil::getPassedValue('public', isset($args['public']) ? $args['public'] : null, 'POST');
	//$new = FormUtil::getPassedValue('new', isset($args['new']) ? $args['new'] : null, 'POST');
	$new = $args['new'];
	//$caducity = FormUtil::getPassedValue('caducity', isset($args['caducity']) ? $args['caducity'] : null, 'POST');
	$cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
	$caducity = $args['caducity'];
	$annonimous = FormUtil::getPassedValue('annonimous', isset($args['annonimous']) ? $args['annonimous'] : null, 'POST');
	$unique = FormUtil::getPassedValue('unique', isset($args['unique']) ? $args['unique'] : null, 'POST');
	$closeableNotes = FormUtil::getPassedValue('closeableNotes', isset($args['closeableNotes']) ? $args['closeableNotes'] : null, 'POST');
	$closeInsert = FormUtil::getPassedValue('closeInsert', isset($args['closeInsert']) ? $args['closeInsert'] : null, 'POST');
	$closeableInsert = FormUtil::getPassedValue('closeableInsert', isset($args['closeableInsert']) ? $args['closeableInsert'] : null, 'POST');
	$unregisterednotusersview = FormUtil::getPassedValue('unregisterednotusersview', isset($args['unregisterednotusersview']) ? $args['unregisterednotusersview'] : null, 'POST');
	$unregisterednotexport = FormUtil::getPassedValue('unregisterednotexport', isset($args['unregisterednotexport']) ? $args['unregisterednotexport'] : null, 'POST');
	$publicResponse = FormUtil::getPassedValue('publicResponse', isset($args['publicResponse']) ? $args['publicResponse'] : null, 'POST');
	$active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
    $expertMode = FormUtil::getPassedValue('expertMode', isset($args['expertMode']) ? $args['expertMode'] : 0, 'POST');
    $allowComments = FormUtil::getPassedValue('allowComments', isset($args['allowComments']) ? $args['allowComments'] : 0, 'POST');
    $allowCommentsModerated = FormUtil::getPassedValue('allowCommentsModerated', isset($args['allowCommentsModerated']) ? $args['allowCommentsModerated'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($formName)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$item = array('formName' => $formName,
					'title' => $title,
					'description' => $description,
					'public' => $public,
					'new' => $new,
					'cid' => $cid,
					'caducity' => $caducity,
					'annonimous' => $annonimous,
					'unique' => $unique,
					'closeableNotes' => $closeableNotes,
					'closeInsert' => $closeInsert,
					'closeableInsert' => $closeableInsert,
					'unregisterednotusersview' => $unregisterednotusersview,
					'unregisterednotexport' => $unregisterednotexport,
					'publicResponse' => $publicResponse,
					'active' => $active,
					'expertMode' => $expertMode,
					'allowComments' => $allowComments,
					'allowCommentsModerated' => $allowCommentsModerated);
	if (!DBUtil::insertObject($item, 'iw_forms_def', 'fid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $item['fid'];
}

function iw_forms_adminapi_createFormField($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fieldName = FormUtil::getPassedValue('fieldName', isset($args['fieldName']) ? $args['fieldName'] : null, 'POST');
	$fieldType = FormUtil::getPassedValue('fieldType', isset($args['fieldType']) ? $args['fieldType'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !isset($fieldName) || $fieldName == '' || !isset($fieldType) || $fieldType == 0) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$item = array('fid' => $fid,
					'fieldName' => $fieldName,
					'fieldType' => $fieldType);
	if (!DBUtil::insertObject($item, 'iw_forms_note_def', 'fndid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $item['fndid'];
}

function iw_forms_adminapi_createFormFieldSetEnd($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$dependance = FormUtil::getPassedValue('dependance', isset($args['dependance']) ? $args['dependance'] : null, 'POST');
	$fieldName = FormUtil::getPassedValue('fieldName', isset($args['fieldName']) ? $args['fieldName'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$item = array('fid' => $fid,
					'dependance' => '$$'.$dependance.'$',
					'fieldName' => $fieldName,
					'fieldType' => 100);
	if (!DBUtil::insertObject($item, 'iw_forms_note_def', 'fndid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $item['fndid'];
}

function iw_forms_adminapi_addGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
	$accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');
	$validationNeeded = FormUtil::getPassedValue('validationNeeded', isset($args['validationNeeded']) ? $args['validationNeeded'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	// Needed argument
	if (!isset($fid) || !isset($group) || !isset($accessType) || $accessType == 0) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = array('group' => $group,
					'subgroup' => $subgroup,
					'fid' => $fid,
					'accessType' => $accessType,
					'validationNeeded' => $validationNeeded);
	if (!DBUtil::insertObject($items, 'iw_forms_group', 'gfid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $items['gfid'];
}

function iw_forms_adminapi_addValidator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$validator = FormUtil::getPassedValue('validator', isset($args['validator']) ? $args['validator'] : null, 'POST');
	$validatorType = FormUtil::getPassedValue('validatorType', isset($args['validatorType']) ? $args['validatorType'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	// Needed argument
	if (!isset($fid) || !isset($validator)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = array('validator' => $validator,
					'fid' => $fid,
					'validatorType' => $validatorType);
	if (!DBUtil::insertObject($items, 'iw_forms_validator', 'rfid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $items['rfid'];
}

function iw_forms_adminapi_deleteForm()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	if (!DBUtil::deleteObjectByID('iw_forms_def', $fid, 'fid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_forms');
	$pnRender->clear_cache(null, $fid);
	return true;
}

function iw_forms_adminapi_deleteFormFields($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$pntables = pnDBGetTables();
	$c = $pntables['iw_forms_note_def_column'];
	$where = "$c[fid]=$fid";
	if (!DBUtil::deleteWhere ('iw_forms_note_def', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	return true;
}

function iw_forms_adminapi_deleteFormGroups($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$pntables = pnDBGetTables();
	$c = $pntables['iw_forms_note_def_column'];
	$where = "$c[fid]=$fid";
	if (!DBUtil::deleteWhere ('iw_forms_group', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	return true;
}

function iw_forms_adminapi_deleteFormValidators($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$pntables = pnDBGetTables();
	$c = $pntables['iw_forms_validator_column'];
	$where = "$c[fid]=$fid";
	if (!DBUtil::deleteWhere ('iw_forms_validator', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	return true;
}

function iw_forms_adminapi_deleteFormNotes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$notes = pnModAPIFunc('iw_forms', 'user', 'getAllNotes', array('fid' => $fid));
	$pntables = pnDBGetTables();
	$c = $pntables['iw_forms_note_column'];
	foreach($notes as $note){
		//Delete all the notes contents
		$where = "$c[fmid]=".$note['fmid'];
		if (!DBUtil::deleteWhere ('iw_forms_note', $where)) {
			return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
		}
	}
	//delete all the files associated to notes
	//Delete the note main information
	$c = $pntables['iw_forms_column'];
	$where = "$c[fid]=$fid";
	if (!DBUtil::deleteWhere ('iw_forms', $where)) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	return true;
}

function iw_forms_adminapi_deleteFormField($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'REQUEST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fndid) || !is_numeric($fndid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	if (!DBUtil::deleteObjectByID('iw_forms_note_def', $fndid, 'fndid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_forms');
	$pnRender->clear_cache(null, $fndid);
	return true;
}

function iw_forms_adminapi_deleteGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$gfid = FormUtil::getPassedValue('gfid', isset($args['gfid']) ? $args['gfid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($gfid) || !is_numeric($gfid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$itemGroup = pnModAPIFunc('iw_forms', 'user', 'getGroup', array('gfid' => $gfid));
	if ($itemGroup == false) {
		LogUtil::registerError (__('Can not find the group', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
										'action' => 'group')));
	}
	if (!DBUtil::deleteObjectByID('iw_forms_group', $gfid, 'gfid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_forms');
	$pnRender->clear_cache(null, $gfid);
	return true;
}

function iw_forms_adminapi_deleteValidator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$rfid = FormUtil::getPassedValue('rfid', isset($args['rfid']) ? $args['rfid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($rfid) || !is_numeric($rfid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$itemValidator = pnModAPIFunc('iw_forms', 'user', 'getValidator', array('rfid' => $rfid));
	if ($itemValidator == false) {
		LogUtil::registerError (__('Can not find the group', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
										'action' => 'validators')));
	}
	if (!DBUtil::deleteObjectByID('iw_forms_validator', $rfid, 'rfid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_forms');
	$pnRender->clear_cache(null, $rfid);
	return true;
}

/**
 * Update the form main information in the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	form identity and values
 * @return:	true if success and false otherwise
*/
function iw_forms_adminapi_editForm($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get form information
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_def_column'];
	$where = "$c[fid] = $fid";
	if (!DBUTil::updateObject ($items, 'iw_forms_def', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

function iw_forms_adminapi_editFormField($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
	$items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fndid) || !is_numeric($fndid) || !isset($items)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_def_column'];
	if($itemField['fieldType'] == 53){
		$dependancesTo = pnModApiFunc('iw_forms', 'user', 'getFormFieldDependancesTo', array('fndid' => $fndid));
		foreach($dependancesTo as $d){
			$whereDep = " OR $c[fndid]=".$d['fndid'];
		}
	}
	$where = "$c[fndid] = $fndid".$whereDep;
	if (!DBUTil::updateObject ($items, 'iw_forms_note_def', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * Reorder the fields
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the from identity
 * @return:	Redirect user to fields page
*/
function iw_forms_adminapi_reorder($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Get parameters from whatever input we need
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');
	if (!empty($objectid)) {
		$fid = $objectid;
	}
 	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//Get all field information
	$fields = pnModAPIFunc('iw_forms', 'user', 'getAllFormFields', array('fid' => $fid));
	if ($fields == false) {
		//LogUtil::registerError (__('Could not find form', $dom));
		//return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_def_column'];
	// Reorder all the items with the values 0 20 40 60 80...
	foreach($fields as $field){
		$i = $i + 10;
		$where = "$c[fndid] = ".$field['fndid'];
		$items = array('order' => $i);
		if (!DBUTil::updateObject ($items, 'iw_forms_note_def', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}
	return true;
}

/**
 * Create a new category
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	array with the category information
 * @return:	identity of the new record created or false if error
*/
function iw_forms_adminapi_createCat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
    $catName = FormUtil::getPassedValue('catName', isset($args['catName']) ? $args['catName'] : null, 'POST');
    $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if (!isset($catName)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Optional argument
	if (!isset($description)) {
		$description = '';
	}
	$item = array('catName' => $catName,
					'description' => $description);
	if (!DBUtil::insertObject($item, 'iw_forms_cat', 'cid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $item['cid'];
}

/**
 * Delete a category from the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the category
 * @return:	true if success and false if fails
*/
function iw_forms_adminapi_deleteCat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
   	$cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Argument check 
	if (!isset($cid) || !is_numeric($cid)) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Get the item
	$item =  pnModAPIFunc('iw_forms','user','getCategory',array('cid' => $cid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}
	if (!DBUtil::deleteObjectByID('iw_forms_cat', $cid, 'cid')) {
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	// The item has been deleted, so we clear all cached pages of this item.
	$pnRender = pnRender::getInstance('iw_forms');
	$pnRender->clear_cache(null, $cid);
	return true;
}

/**
 * Update a category from the database
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of the category and the information of the category
 * @return:	true if success and false if fails
*/
function iw_forms_adminapi_modifyCat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
   	$cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
   	$catName = FormUtil::getPassedValue('catName', isset($args['catName']) ? $args['catName'] : null, 'POST');
   	$description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Needed argument
	if (!isset($cid) ||  !isset($catName)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Get the item
	$item =  pnModAPIFunc('iw_forms','user','getCategory',array('cid' => $cid));
	if (!$item) {
		return LogUtil::registerError (__('No such item found.', $dom));
	}
	$items = array('catName' => $catName,
					'description' => $description);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_cat_column'];
	$where = "$c[cid]=$cid";
	if (!DBUTil::updateObject ($items, 'iw_forms_cat', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * Change the fields order
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args	The fields identities
 * @return:	true if success and false if fails
*/
function iw_forms_adminapi_changeOrder($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
	$order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fndid) || !is_numeric($fndid) || !isset($order)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
	}
	$items = array('order' => $order);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_def_column'];
	if($itemField['fieldType'] == 53){
		$dependancesTo = pnModApiFunc('iw_forms', 'user', 'getFormFieldDependancesTo', array('fndid' => $fndid));
		foreach($dependancesTo as $d){
			$whereDep = " OR $c[fndid]=".$d['fndid'];
		}
	}
	$where = "$c[fndid] = $fndid".$whereDep;
	if (!DBUTil::updateObject ($items, 'iw_forms_note_def', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * Collapse or extent the view in the fields admin page
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of forum and the expand or collapse value
 * @return:	true if success and false if fails
*/
function iw_forms_adminapi_collexpand($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');
 	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$items = array('collapse' => $value);
	$pntable = pnDBGetTables();
	$c = $pntable['iw_forms_note_def_column'];
	$where = "$c[fid] = $fid";
	if (!DBUTil::updateObject ($items, 'iw_forms_note_def', $where)) {
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	return true;
}

/**
 * Copy a form properties and fields
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args	The id of forum
 * @return:	true if success and false if fails
*/
function iw_forms_adminapi_copy($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
 	// Security check
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//copy form properties
	if (!DBUtil::insertObject($item, 'iw_forms_def', 'fid')) {
		return LogUtil::registerError (_INSERTFAILED);
	}
	//Get all field information
	$fields = pnModAPIFunc('iw_forms', 'user', 'getAllFormFields', array('fid' => $fid));
	if ($fields == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//copy form fields
	foreach($fields as $field){
		$field['fid'] = $item['fid'];
		if (!DBUTil::insertObject ($field, 'iw_forms_note_def', 'fndid')) {
			return LogUtil::registerError (_INSERTFAILED);
		}
	}
	// Return the id of the newly created item to the calling process
	return $item['fid'];
}

function iw_forms_adminapi_createFormFieldExport($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fieldName = FormUtil::getPassedValue('fieldName', isset($args['fieldName']) ? $args['fieldName'] : null, 'POST');
	$fieldType = FormUtil::getPassedValue('fieldType', isset($args['fieldType']) ? $args['fieldType'] : null, 'POST');
	$description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
	$help = FormUtil::getPassedValue('help', isset($args['help']) ? $args['help'] : null, 'POST');
	$feedback = FormUtil::getPassedValue('feedback', isset($args['feedback']) ? $args['feedback'] : null, 'POST');
	$order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : null, 'POST');
	$required = FormUtil::getPassedValue('required', isset($args['required']) ? $args['required'] : null, 'POST');
	$validationNeeded = FormUtil::getPassedValue('validationNeeded', isset($args['validationNeeded']) ? $args['validationNeeded'] : null, 'POST');
	$accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');
	$editable = FormUtil::getPassedValue('editable', isset($args['editable']) ? $args['editable'] : null, 'POST');
	$rfid = FormUtil::getPassedValue('rfid', isset($args['rfid']) ? $args['rfid'] : null, 'POST');
	$active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
	$notify = FormUtil::getPassedValue('notify', isset($args['notify']) ? $args['notify'] : null, 'POST');
	$size = FormUtil::getPassedValue('size', isset($args['size']) ? $args['size'] : null, 'POST');
	$cols = FormUtil::getPassedValue('cols', isset($args['cols']) ? $args['cols'] : null, 'POST');
	$rows = FormUtil::getPassedValue('rows', isset($args['fieldType']) ? $args['rows'] : null, 'POST');
	$editor = FormUtil::getPassedValue('editor', isset($args['editor']) ? $args['editor'] : null, 'POST');
	$publicFile = FormUtil::getPassedValue('publicFile', isset($args['publicFile']) ? $args['publicFile'] : null, 'POST');
	$checked = FormUtil::getPassedValue('checked', isset($args['checked']) ? $args['checked'] : null, 'POST');
	$options = FormUtil::getPassedValue('options', isset($args['options']) ? $args['options'] : null, 'POST');
	$calendar = FormUtil::getPassedValue('calendar', isset($args['calendar']) ? $args['calendar'] : null, 'POST');
	$height = FormUtil::getPassedValue('height', isset($args['height']) ? $args['height'] : null, 'POST');
	$color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'POST');
	$colorf = FormUtil::getPassedValue('colorf', isset($args['colorf']) ? $args['colorf'] : null, 'POST');
	$gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'POST');
	$searchable = FormUtil::getPassedValue('searchable', isset($args['searchable']) ? $args['searchable'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !isset($fieldName) || $fieldName == '' || !isset($fieldType) || $fieldType == 0) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$item = array('fid' => $fid,
					'fieldType' => $fieldType,
					'fieldName' => $fieldName,
					'description' => $description,
					'help' => $help,
					'feedback' => $feedback,
					'order' => $order,
					'required' => $required,
					'validationNeeded' => $validationNeeded,
					'accessType' => $accessType,
					'editable' => $editable,
					'rfid' => $rfid,
					'active' => $active,
					'notify' => $notify,
					'size' => $size,
					'cols' => $cols,
					'rows' => $rows,
					'editor' => $editor,
					'publicFile' => $publicFile,
					'checked' => $checked,
					'options' => $options,
					'calendar' => $calendar,
					'height' => $height,
					'color' => $color,
					'colorf' => $colorf,
					'gid' => $gid,
					'searchable' => $searchable);
	if (!DBUtil::insertObject($item, 'iw_forms_note_def', 'fndid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created item to the calling process
	return $item['fndid'];
}