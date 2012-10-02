<?php
/**
 * Show the forms created
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	A list with the forms that had been created with some options
*/
function iw_forms_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$categories = pnModApiFunc('iw_forms', 'user', 'getAllCategories');
	foreach ($categories as $category) {
		$catName[$category['cid']] = $category['catName'];
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	//main
	pnModApiFunc('iw_forms', 'user', 'desactivateForm');
	$forms = pnModAPIFunc('iw_forms','user','getAllForms');
	foreach ($forms as $form) {
		$new = pnModFunc('iw_forms', 'user', 'makeTimeForm', $form['new']);
		$caducity = pnModFunc('iw_forms', 'user', 'makeTimeForm', $form['caducity']);
		$formsArray[] = array('formName' => $form['formName'],
								'title' => $form['title'],
								'catName' => $catName[$form['cid']],
								'description' => $form['description'],
								'annonimous' => $form['annonimous'],
								'unique' => $form['unique'],
								'closeableNotes' => $form['closeableNotes'],
								'closeInsert' => $form['closeInsert'],
								'closeableInsert' => $form['closeableInsert'],
								'unregisterednotusersview' => $form['unregisterednotusersview'],
								'unregisterednotexport' => $form['unregisterednotexport'],
								'publicResponse' => $form['publicResponse'],
								'fid' => $form['fid'],
								'active' => $form['active'],
                                'expertMode' => $form['expertMode'],
                                'allowComments' => $form['allowComments'],
								'caducity' => $caducity,
								'new' => $new);
	}
	$pnRender->assign('forms',$formsArray);
	return $pnRender->fetch('iw_forms_admin_main.htm');
}

/**
 * Prepare the information necessary to create a new form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	The form necessary to create a new form
*/
function iw_forms_admin_create()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//get all categories
	$categories = pnModApiFunc('iw_forms', 'user', 'getAllCategories');
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	//outputs assignaments
	$pnRender->assign('cats', $categories);
	return $pnRender->fetch('iw_forms_admin_create.htm');
}

/**
 * Submit the information to create a new form in database
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the form information
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_submit($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$formName = FormUtil::getPassedValue('formName', isset($args['formName']) ? $args['formName'] : null, 'POST');
	$description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
	$title = FormUtil::getPassedValue('title', isset($args['title']) ? $args['title'] : null, 'POST');
	$cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
	$new = FormUtil::getPassedValue('new', isset($args['new']) ? $args['new'] : null, 'POST');
	$caducity = FormUtil::getPassedValue('caducity', isset($args['caducity']) ? $args['caducity'] : null, 'POST');
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
    $skinByTemplate = FormUtil::getPassedValue('skinByTemplate', isset($args['skinByTemplate']) ? $args['skinByTemplate'] : 0, 'POST');
    $skinFormTemplate = FormUtil::getPassedValue('skinFormTemplate', isset($args['skinFormTemplate']) ? $args['skinFormTemplate'] : null, 'POST');
    $skinTemplate = FormUtil::getPassedValue('skinTemplate', isset($args['skinTemplate']) ? $args['skinTemplate'] : null, 'POST');
    $skinNoteTemplate = FormUtil::getPassedValue('skinNoteTemplate', isset($args['skinNoteTemplate']) ? $args['skinNoteTemplate'] : null, 'POST');
    // Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'main'));
	}
	$new = pnModFunc('iw_forms', 'user', 'makeTime', $new.'23:59:00');
	$caducity = pnModFunc('iw_forms', 'user', 'makeTime', $caducity.'23:59:00');
	$create = pnModAPIFunc('iw_forms', 'admin', 'createNewForm',
                            array('formName' => $formName,
								  'description' => $description,
								  'title' => $title,
								  'new' => $new,
								  'caducity' => $caducity,
								  'cid' => $cid,
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
                                  'allowCommentsModerated' => $allowCommentsModerated,
                            	  'skinByTemplate' => $skinByTemplate,
                            	  'skinFormTemplate' => $skinFormTemplate,
                            	  'skinTemplate' => $skinTemplate,
                            	  'skinNoteTemplate' => $skinNoteTemplate));
	if ($create != false) {
		// Success
		LogUtil::registerStatus (__('The form was created successfully', $dom));		
	}
	// Redirect to the main site for the admin
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $create)));
}

/**
 * Show the information of a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	The form necessary to create a new form
*/
function iw_forms_admin_form($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$action = FormUtil::getPassedValue('action', isset($args['action']) ? $args['action'] : null, 'GET');
	$do = FormUtil::getPassedValue('do', isset($args['do']) ? $args['do'] : null, 'GET');	
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'GET');
	$gfid = FormUtil::getPassedValue('gfid', isset($args['gfid']) ? $args['gfid'] : null, 'GET');
	$aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'GET');
	//Only needed for validators addition
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
	$validator = FormUtil::getPassedValue('validator', isset($args['validator']) ? $args['validator'] : null, 'POST');
	$validatorType = FormUtil::getPassedValue('validatorType', isset($args['validatorType']) ? $args['validatorType'] : null, 'POST');
	$rfid = FormUtil::getPassedValue('rfid', isset($args['rfid']) ? $args['rfid'] : null, 'GET');
	//--- End
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$pnRender ->assign('item',$item);
	//main
	switch ($action) {
		case 'field':
			switch ($do) {
				case 'edit':
					$content = pnModFunc('iw_forms', 'admin', 'editField', array('fid' => $fid,
																					'fndid' => $fndid));
					break;
				case 'add':
					$content = pnModFunc('iw_forms','admin','createField',array('fid' => $fid));
					break;
				case 'delete':
					$content = pnModFunc('iw_forms', 'admin', 'deleteField', array('fid' => $fid,
																					'fndid' => $fndid));
					break;
				case 'modifyFieldDependances':
					$content = pnModFunc('iw_forms', 'admin', 'modifyFieldDependances', array('fid' => $fid,
																								'fndid' => $fndid));
					break;
				case 'addFieldValidator':
					$content = pnModFunc('iw_forms','admin','addFieldValidator',array('fid' => $fid,
																						'fndid' => $fndid));
					break;
				default:
					$content = pnModFunc('iw_forms','admin','field',array('fid' => $fid));
			}
			$tab = 2;
			break;
		case 'group':
			switch ($do) {
				case 'add':
					$content = pnModFunc('iw_forms','admin','addGroup', array('fid' => $fid));
					break;
				case 'delete':
					$content = pnModFunc('iw_forms','admin','deleteGroup', array('fid' => $fid,
																					'gfid' => $gfid,
																					'aio' => $aio));
					break;
				default:
					$content = pnModFunc('iw_forms','admin','groups',array('fid' => $fid));
			}
			$tab = 3;
			break;
		case 'validators':
			switch($do) {
				case 'add':
					$content = pnModFunc('iw_forms','admin','addValidator', array('fid' => $fid,
																					'group' => $group,
																					'validator' => $validator,
																					'validatorType' => $validatorType));
					break;
				case 'delete':
					$content = pnModFunc('iw_forms','admin','deleteValidator', array('fid' => $fid,
																						'rfid' => $rfid,
																						'aio' => $aio));
					break;
				default:
					$content = pnModFunc('iw_forms', 'admin', 'validators', array('fid' => $fid));
			}
			$tab = 4;
			break;
		default:
			switch ($do) {
				case 'edit':
					$content = pnModFunc('iw_forms','admin','edit', array('fid' => $fid,
																			'aio' => $aio));
					break;
				case 'delete':
					$content = pnModFunc('iw_forms','admin','delete', array('fid' => $fid));
					break;
				default:
					$content = pnModFunc('iw_forms','admin','definition', array('fid' => $fid));
			}
			$tab = 1;
	}
	//outputs assignments
	$pnRender ->assign('content', $content);
	$pnRender ->assign('tab',$tab);
	return $pnRender->fetch('iw_forms_admin_form.htm');
}

/**
 * show the form definition information
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the fields needed
 * @return:	The validators information
*/
function iw_forms_admin_definition($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$adminView = FormUtil::getPassedValue('adminView', isset($args['adminView']) ? $args['adminView'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$category = ($item['cid'] != 0) ? pnModApiFunc('iw_forms', 'user', 'getCategory', array('cid' => $item['cid'])) : "---";
	if ($item['skincss'] != '') {
		$url = pnGetBaseURL() . 'index.php?module=iw_forms&func=getFile&fileName=' . pnModGetVar('iw_forms','attached') . '/' . $item['skincss'];
		$item['skincssurl'] = '<link rel="stylesheet" href="' . $url . '" type="text/css" />';
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$pnRender->assign('catName', $category['catName']);
	$pnRender->assign('item', $item);
	$pnRender->assign('new', pnModFunc('iw_forms', 'user', 'makeTimeForm', $item['new']));
	$pnRender->assign('caducity', pnModFunc('iw_forms', 'user', 'makeTimeForm', $item['caducity']));
	return $pnRender->fetch('iw_forms_admin_form_definition.htm');
}

/**
 * Get the validators for a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the fields needed
 * @return:	The validators information
*/
function iw_forms_admin_validators($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$validators = pnModAPIFunc('iw_forms', 'user', 'getAllValidators', array('fid' => $fid));
	foreach ($validators as $validator) {
		$usersList .= $validator['validator'].'$$';
		$validatorTypeText = ($validator['validatorType'] == 1) ? _IWFORMSVALIDATEFIELDS : __('Global validator', $dom);
		$validators_array[] = array('validator' => $validator['validator'],
									'validatorTypeText' => $validatorTypeText,
									'rfid' => $validator['rfid']);
	}
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$users = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'ccn',
																	'sv' => $sv,
																	'list' => $usersList));
	$pnRender->assign('validators', $validators_array);
	$pnRender->assign('users', $users);
	$pnRender->assign('item', $item);
	return $pnRender->fetch('iw_forms_admin_form_validators.htm');
}

/**
 * Change the minitab active in forms
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	the tab that must to be shown as active
 * @return:	The tabs content
*/
function iw_forms_admin_minitab($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$tab = FormUtil::getPassedValue('tab', isset($args['tab']) ? $args['tab'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$pnRender->assign('tab', $tab);
	return $pnRender->fetch('iw_forms_admin_form_minitab.htm');
}

/**
 * Get the groups for a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the fields needed
 * @return:	The groups access information
*/
function iw_forms_admin_groups($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$adminView = FormUtil::getPassedValue('adminView', isset($args['adminView']) ? $args['adminView'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$groups = pnModAPIFunc('iw_forms', 'user', 'getAllGroups', array('fid' => $fid));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
	foreach ($groups as $group) {
		$accessText = array('1' => __('Only writing', $dom), '2' => __('Only reading', $dom), '3' =>__('Reading and writing', $dom));
		$validation = ($group['validationNeeded']) ? __('Yes', $dom): __('No', $dom);
		$groupName = ($group['group'] == 0) ? __('Unregistered users', $dom) : $groupsInfo[$group['group']];
		$groups_array[] = array('groupName' => $groupName,
					'accessType' => $accessText[$group['accessType']],
					'validationNeeded' => $validation,
					'gfid' => $group['gfid']);
	}
	$pnRender->assign('groups', $groups_array);
	$pnRender->assign('adminView', $adminView);
	$pnRender->assign('item', $item);
	return $pnRender->fetch('iw_forms_admin_form_groups.htm');
}

/**
 * Get the fields for a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the fields needed
 * @return:	The fields information
*/
function iw_forms_admin_field($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$fields = pnModAPIFunc('iw_forms', 'user', 'getAllFormFields', array('fid' => $fid));
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	foreach ($fields as $field) {
		// get validators names and prepare them to show
		$usersList .= $field['rfid'].'$$';
		$validators = explode('$$', substr($field['rfid'],2,-1));
		$validatorsNames = array();
		foreach ($validators as $validator) {
			if ($validator != '') {
				$validatorsNames[] = array('id' => $validator);
			}
		}
		if ($field['gid'] > 0) {
			$group = pnModAPIFunc('Groups','user','get',array('gid' => $field['gid']));
			$groupName = $group['name'];
		}
		$fieldTypeTextArray = pnModFunc('iw_forms', 'admin', 'getFileTypeText');
		$fieldTypeText = $fieldTypeTextArray[$field['fieldType']];
		$fields_array[] = array('fndid' => $field['fndid'],
								'fieldName' => $field['fieldName'],
								'fieldTypeText' => $fieldTypeText,
								'feedback' => $field['feedback'],
								'fieldTypePlus' => '-'.$field['fieldType'].'-',
								'active' => $field['active'],
								'description' => $field['description'],
								'required' => $field['required'],
								'order' => $field['order'],
								'validationNeeded' => $field['validationNeeded'],
								'notify' => $field['notify'],
								'dependance' => str_replace('$$',',',substr($field['dependance'],2,-1)),
								'validatorsNames' => $validatorsNames,
								'accessType' => $field['accessType'],
								'editable' => $field['editable'],
								'size' => $field['size'],
								'cols' => $field['cols'],
								'rows' => $field['rows'],
								'editor' => $field['editor'],
								'publicFile' => $field['publicFile'],
								'checked' => $field['checked'],
								'options' => $field['options'],
								'calendar' => $field['calendar'],
								'height' => $field['height'],
								'color' => $field['color'],
								'colorf' => $field['colorf'],
								'collapse' => $field['collapse'],
								'group' => $groupName,
								'searchable' => $field['searchable'],
								'gid' => $field['gid'],
								'extensions' => $field['extensions'],
								'imgWidth' => $field['imgWidth'],
								'imgHeight' => $field['imgHeight']);
	}
	
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$users = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
						array('info' => 'ccn',
							  'sv' => $sv,
						      'list' => $usersList));
	$pnRender->assign('fields', $fields_array);
	$pnRender->assign('fid', $fid);
	$pnRender->assign('users', $users);
	$pnRender->assign('number', count($fields_array));
	$pnRender->assign('item', $item);
	return $pnRender->fetch('iw_forms_admin_form_fields.htm');
}


/**
 * Collapse or expand all the fields
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the form and the collapse state
 * @return:	Redirect to fields list
*/
function iw_forms_admin_collexpand($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	$value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'GET');
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	pnModAPIFunc('iw_forms', 'admin', 'collexpand', array('fid' => $fid,
															'value' => $value));

	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'field')));
}

/**
 * Change the fields order
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the field where the order will be changed
 * @return:	Redirect user to admin main page
*/
function iw_forms_admin_order($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'GET');
    $puts = FormUtil::getPassedValue('puts', isset($args['puts']) ? $args['puts'] : null, 'GET');
	if (!SecurityUtil::checkPermission( 'iw_forms::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition', array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$order = ($puts == '-1') ? $itemField['order'] + 15 : $itemField['order'] - 15;
	$items = array('order' => $order);
	if (pnModApiFunc('iw_forms', 'admin', 'editFormField', array('fndid' => $fndid,
																'items' => $items))) {
		// Success
		LogUtil::registerStatus (__('Has changed the order of the fields', $dom));
	}
	// Reorder the items
	pnModAPIFunc('iw_forms', 'admin', 'reorder', array('fid' => $fid));
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'field')));
}

/**
 * Get defined fields for a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the fields needed
 * @return:	The fields information
*/
function iw_forms_admin_getFileTypeText($args) {
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fieldType = FormUtil::getPassedValue('fieldType', isset($args['fieldType']) ? $args['fieldType'] : null, 'POST');
	$types = array('0' => __('Choose a type of field', $dom),
					'1' => __('Text', $dom),
					'2' => __('Text area', $dom),
					'3' => __('URL', $dom),
					'4' => __('Date', $dom),
					'5' => __('Time', $dom),
					'6' => __('List of options', $dom),
					'7' => __('File', $dom),
					'8' => __('Yes/No', $dom),
					'51' => __('Information', $dom),
					'52' => __('Dividing line', $dom),
					'53' => __('Box', $dom),
					'100' => __('Final box', $dom));
	return $types;
}

/**
 * Prepare the information necessary to create a new field into a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the field will be created
 * @return:	A form to create a new field
*/
function iw_forms_admin_createField($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$pnRender = pnRender::getInstance('iw_forms',false);
	$pnRender->assign ('item',array('fid' => $fid));
	return $pnRender->fetch('iw_forms_admin_form_fieldAdd.htm');
}

/**
 * Submit the information to create a new field for a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the field information
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_submitField($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fieldType = FormUtil::getPassedValue('fieldType', isset($args['fieldType']) ? $args['fieldType'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
												'action' => 'field')));
	}
	if ($fieldType == 0) {
		return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																		'action' => 'field')));
	}
	$createField = pnModAPIFunc('iw_forms', 'admin', 'createFormField', array('fid' => $fid,
																				'fieldType' => $fieldType,
																				'fieldName' => __('Field name', $dom)));
	pnModAPIFunc('iw_forms', 'admin', 'reorder', array('fid' => $fid));
	if ($createField != false) {
		// Success
		LogUtil::registerStatus (__('We have created a new field. Edit the characteristics of the field', $dom));

		//If field type is fileset create a fieldset end field </fieldset> and edit it
		if ($fieldType == 53) {
			$createFieldSetEnd = pnModAPIFunc('iw_forms', 'admin', 'createFormFieldSetEnd', array('fid' => $fid,
																									'dependance' => $createField,
																									'fieldName' => __('Final box', $dom)));
		}
	}
	// Reorder the items
	pnModAPIFunc('iw_forms', 'admin', 'reorder', array('fid' => $fid));
	//Redirect user to edit field form
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('action' => 'field',
																	'do' => 'edit',
																	'fid' => $fid,
																	'fndid' => $createField)));
}

/**
 * Delete a validator of a field
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the field id, the form id and the userid
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_deleteFieldValidator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'GET');
	$id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'GET');
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
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//Delete validator on validators string
	$validatorsString = str_replace('$'.$id.'$','',$itemField['rfid']);
	$items = array('rfid' => $validatorsString);
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userFullname = pnModFunc('iw_main', 'user', 'getUserInfo', array('info' => 'ccn',
																		'uid' => $id,
																		'sv' => $sv));
	if (pnModApiFunc('iw_forms', 'admin', 'editFormField', array('fndid' => $fndid,
									'items' => $items))) {
		// Success
		LogUtil::registerStatus (__('Deleted validator', $dom).' '.$userFullname);
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
									'action' => 'field')));
}

/**
 * Prepare the information necessary to create a new validator for the form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the manager will be created
 * @return:	A form to create a new manager
*/
function iw_forms_admin_addFieldValidator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$validator = FormUtil::getPassedValue('validator', isset($args['validator']) ? $args['validator'] : null, 'POST');
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
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	if (!$confirm) {
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$validators = pnModAPIFunc('iw_forms', 'user', 'getAllValidators', array('fid' => $fid));
		foreach ($validators as $validator) {
			$usersList .= $validator['validator'].'$$';
			$validators_array[] = array('validatorUserId' => $validator['validator']);
		}
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$users = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'ccn',
																		'sv' => $sv,
																		'list' => $usersList));
		$pnRender->assign('validators', $validators_array);
		$pnRender->assign ('users',$users);
		$pnRender->assign ('item',$item);
		$pnRender->assign ('itemField',$itemField);
		return $pnRender->fetch('iw_forms_admin_form_addFieldValidator.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
												'action' => 'field')));
	}
	//Add validator into validators string
	$validatorsString = $itemField['rfid'].'$'.$validator.'$';
	$items = array('rfid' => $validatorsString);
	if (pnModApiFunc('iw_forms', 'admin', 'editFormField', array('fndid' => $fndid, 'items' => $items))) {
		// Success
		LogUtil::registerStatus (__('Added validator', $dom).' '.$usersFullname[$validator]);
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'field')));
}

/**
 * Prepare the information necessary to create a new group with access to the form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the group will be created
 * @return:	A form to create a new group
*/
function iw_forms_admin_addGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
	$accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');
	$validationNeeded = FormUtil::getPassedValue('validationNeeded', isset($args['validationNeeded']) ? $args['validationNeeded'] : null, 'POST');
	$aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'REQUEST');
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
	if (!$confirm) {
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																		'plus' => __('Unregistered', $dom),
																		'less' => pnModGetVar('iw_myrole', 'rolegroup')));
		$pnRender->assign ('groups',$groups);
		$pnRender->assign ('item',$item);
		$pnRender->assign ('aio',$aio);
		return $pnRender->fetch('iw_forms_admin_form_addGroup.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																							'action' => 'group')));
	}
	//Save the group in database
	if (pnModApiFunc('iw_forms', 'admin', 'addGroup', array('fid' => $fid,
															'group' => $group,
															'accessType' => $accessType,
															'validationNeeded' => $validationNeeded))) {
		// Success
		LogUtil::registerStatus (__('Added a group of access to the form', $dom));
	} 
	if (isset($aio)  && $aio == 1) {
		return pnRedirect(pnModURL('iw_forms', 'admin', 'infoForm', array('fid' => $fid)));
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'group')));
}

/**
 * Prepare the information necessary to create a new validator for the form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form where the group will be created
 * @return:	A form to add a new validator
*/
function iw_forms_admin_addValidator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
	$validator = FormUtil::getPassedValue('validator', isset($args['validator']) ? $args['validator'] : null, 'POST');
	$validatorType = FormUtil::getPassedValue('validatorType', isset($args['validatorType']) ? $args['validatorType'] : null, 'POST');
	$aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'REQUEST');
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
	$confirm = (!isset($validator) || $validator == 0) ? 0 : 1;
	if (!$confirm) {
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																		'less' => pnModGetVar('iw_myrole', 'rolegroup')));
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groupMembers = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
																				'gid' => $group));
		$pnRender->assign ('groupselect',$group);
		$pnRender->assign ('groups',$groups);
		$pnRender->assign ('groupMembers',$groupMembers);
		$pnRender->assign ('item',$item);
		$pnRender->assign ('aio',$aio);
		return $pnRender->fetch('iw_forms_admin_form_addValidator.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																							'action' => 'validators')));
	}
	//Save the group in database
	if (pnModApiFunc('iw_forms', 'admin', 'addValidator', array('fid' => $fid,
																'validator' => $validator,
																'validatorType' => $validatorType))) {
		// Success
		LogUtil::registerStatus (__('Has added a new validator', $dom));
	}
	if (isset($aio) && $aio == 1) {
		return pnRedirect(pnModURL('iw_forms', 'admin', 'infoForm', array('fid' => $fid)));
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'validators')));
}

/**
 * Delete a form completelly. It delete to field, groups, managers and notes content
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the form identity
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_deleteNotes($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
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
	if (!$confirm) {
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$pnRender->assign ('item',$item);
		return $pnRender->fetch('iw_forms_admin_form_deleteNotes.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																							'action' => 'field')));
	}
	//delete the form notes
	if (pnModAPIFunc('iw_forms', 'admin', 'deleteFormNotes', array('fid' => $fid))) {
		LogUtil::registerStatus (__('Dropped the annotations of the form', $dom));
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
}

/**
 * Delete the validator of a group to a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the validator identity
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_deleteValidator($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$rfid = FormUtil::getPassedValue('rfid', isset($args['rfid']) ? $args['rfid'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'POST');
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
	//Get validator information
	$itemValidator = pnModAPIFunc('iw_forms', 'user', 'getValidator', array('rfid' => $rfid));
	if ($itemValidator == false) {
		LogUtil::registerError (__('Not Found validator', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																		'action' => 'validators')));
	}
	if (!$confirm) {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$userName = pnModFunc('iw_main', 'user', 'getUserInfo', array('info' => 'ccn',
																		'uid' => $itemValidator['validator'],
																		'sv' => $sv));
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$pnRender->assign ('item',$item);
		$pnRender->assign ('validatorId',$rfid);
		$pnRender->assign ('userName',$userName);
		$pnRender->assign ('aio',$aio);
		return $pnRender->fetch('iw_forms_admin_form_validatorDelete.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																							'action' => 'validators')));
	}
	if (pnModAPIFunc('iw_forms', 'admin', 'deleteValidator', array('rfid' => $rfid))) {
		LogUtil::registerStatus (__('Has deleted a validator', $dom));
	}
	if (isset($aio) && $aio == 1) {
		return pnRedirect(pnModURL('iw_forms', 'admin', 'infoForm', array('fid' => $fid)));	
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'validators')));
}

/**
 * Delete access of a group to a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the group identity
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_deleteGroup($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$gfid = FormUtil::getPassedValue('gfid', isset($args['gfid']) ? $args['gfid'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'POST');
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
	//Get field information
	$itemGroup = pnModAPIFunc('iw_forms', 'user', 'getGroup', array('gfid' => $gfid));
	if ($itemGroup == false) {
		LogUtil::registerError (__('Can not find the group', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
										'action' => 'group')));
	}
	if (!$confirm) {
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$groupName = ($itemGroup['group'] == 0) ? __('Unregistered users', $dom) : $groupsInfo[$itemGroup['group']];
		$pnRender->assign ('item',$item);
		$pnRender->assign ('itemGroup',$itemGroup);
		$pnRender->assign ('groupId',$itemGroup['gfid']);
		$pnRender->assign ('groupName',$groupName);
		$pnRender->assign ('aio',$aio);			
		return $pnRender->fetch('iw_forms_admin_form_groupDelete.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
												'action' => 'group')));
	}
	if (pnModAPIFunc('iw_forms', 'admin', 'deleteGroup', array('gfid' => $gfid))) {
		LogUtil::registerStatus (__('Has been cleared access to the group', $dom));
	}
	if (isset($aio)  && $aio == 1) {
		return pnRedirect(pnModURL('iw_forms', 'admin', 'infoForm', array('fid' => $fid)));	
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'group')));
}

/**
 * Delete the field of a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the field identity
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_deleteField($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
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
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//Check if there are other fields that depens on it. In this case the field can't be deleted
	$dependancesTo = pnModAPIFunc('iw_forms', 'user', 'getFormFieldDependancesTo', array('fndid' => $fndid));
	if (!$confirm) {
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$pnRender->assign ('item',$item);
		$pnRender->assign ('itemField',$itemField);
		$pnRender->assign ('dependancesTo',$dependancesTo);
		$fieldTypeTextArray = pnModFunc('iw_forms', 'admin', 'getFileTypeText');
		$fieldTypeText = $fieldTypeTextArray[$itemField['fieldType']];
		$pnRender->assign('fieldTypeText', $fieldTypeText);
		return $pnRender->fetch('iw_forms_admin_form_fieldDelete.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																							'action' => 'field')));
	}
	if (pnModAPIFunc('iw_forms', 'admin', 'deleteFormField', array('itemField' => $fndid))) {
		LogUtil::registerStatus (__('Has been deleted the field', $dom));
	}
/*
	//if field is a fieldset delete too the fieldset end
	if ($itemField['fieldType'] == 53) {
		$dependances = pnModAPIFunc('iw_forms', 'user', 'getFormFieldDependancesTo', array('fndid' => $fndid));
		foreach ($dependances as $dependance) {
			$d = (int)$dependance['fndid'];
		}
		pnModAPIFunc('iw_forms', 'admin', 'deleteFormField', array('itemField' => $d));
	}
*/
	// Reorder the items
	pnModAPIFunc('iw_forms', 'admin', 'reorder', array('fid' => $fid));
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'field')));
}

/**
 * Modify the dependences of a field
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the field identity
 * @return:	A form needed to change the dependances
*/
function iw_forms_admin_modifyFieldDependances($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	$dep = FormUtil::getPassedValue('dep', isset($args['dep']) ? $args['dep'] : null, 'POST');
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
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField', array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//Get all field information
	$fields = pnModAPIFunc('iw_forms', 'user', 'getAllFormFields', array('fid' => $fid));
	if ($fields == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	if (!$confirm) {
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$pnRender->assign ('item',$item);
		$pnRender->assign ('itemField',$itemField);
		//put the field dependances into an array
		$dependances = explode('$$',substr($itemField['dependance'],2,-1));
		foreach ($fields as $field) {
			$checked = (in_array($field['fndid'],$dependances)) ? 1:0;
			if ($field['fieldType'] != '8' &&
				$field['fieldType'] <= '50') {
				$fields_array[] = array('fieldName' => $field['fieldName'],
								'fndid' => $field['fndid'],
								'checked' => $checked);
			}
		}
		$pnRender->assign ('fields',$fields_array);
		return $pnRender->fetch('iw_forms_admin_form_fieldModifyDependances.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																							'action' => 'field')));
	}
	$dependances = '$';
	foreach ($dep as $d) {
		$dependances .= '$'.$d.'$';
	}
	$items = array('dependance' => $dependances);
	if (pnModApiFunc('iw_forms', 'admin', 'editFormField', array('fndid' => $fndid, 'items' => $items))) {
		// Success
		LogUtil::registerStatus (__('Have changed the dependencies', $dom));
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form', array('fid' => $fid,
																	'action' => 'field')));
}

/**
 * edit the main information of a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the form identity
 * @return:	A form necessary to modify the form
*/
function iw_forms_admin_edit($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'POST');
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
	//get all categories
	$categories = pnModApiFunc('iw_forms', 'user', 'getAllCategories');
	global $Intraweb;
	$multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$pnRender->assign('cats', $categories);
	$pnRender->assign('aio', $aio);
	$pnRender->assign('item', $item);
	$pnRender->assign('multizk', $multizk);
	$pnRender->assign('new', pnModFunc('iw_forms', 'user', 'makeTimeForm', $item['new']));
	$pnRender->assign('caducity', pnModFunc('iw_forms', 'user', 'makeTimeForm', $item['caducity']));
	return $pnRender->fetch('iw_forms_admin_form_definitionEdit.htm');
}

/**
 * update the form modifications
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the new information from the edition form
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_update($fid)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$formName = FormUtil::getPassedValue('formName', isset($args['formName']) ? $args['formName'] : null, 'POST');
	$description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
	$title = FormUtil::getPassedValue('title', isset($args['title']) ? $args['title'] : null, 'POST');
	$cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
	$new = FormUtil::getPassedValue('new', isset($args['new']) ? $args['new'] : null, 'POST');
	$caducity = FormUtil::getPassedValue('caducity', isset($args['caducity']) ? $args['caducity'] : null, 'POST');
	$annonimous = FormUtil::getPassedValue('annonimous', isset($args['annonimous']) ? $args['annonimous'] : null, 'POST');
	$unique = FormUtil::getPassedValue('unique', isset($args['unique']) ? $args['unique'] : null, 'POST');
	$closeableNotes = FormUtil::getPassedValue('closeableNotes', isset($args['closeableNotes']) ? $args['closeableNotes'] : null, 'POST');
	$closeInsert = FormUtil::getPassedValue('closeInsert', isset($args['closeInsert']) ? $args['closeInsert'] : null, 'POST');
	$closeableInsert = FormUtil::getPassedValue('closeableInsert', isset($args['closeableInsert']) ? $args['closeableInsert'] : null, 'POST');
	$unregisterednotusersview = FormUtil::getPassedValue('unregisterednotusersview', isset($args['unregisterednotusersview']) ? $args['unregisterednotusersview'] : null, 'POST');
	$unregisterednotexport = FormUtil::getPassedValue('unregisterednotexport', isset($args['unregisterednotexport']) ? $args['unregisterednotexport'] : null, 'POST');
   	$publicResponse = FormUtil::getPassedValue('publicResponse', isset($args['publicResponse']) ? $args['publicResponse'] : null, 'POST');	
	$active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
	$aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'POST');
	$skin = FormUtil::getPassedValue('skin', isset($args['skin']) ? $args['skin'] : null, 'POST');
	$skinForm = FormUtil::getPassedValue('skinForm', isset($args['skinForm']) ? $args['skinForm'] : null, 'POST');
	$skinNote = FormUtil::getPassedValue('skinNote', isset($args['skinNote']) ? $args['skinNote'] : null, 'POST');
	$skincss = FormUtil::getPassedValue('skincss', isset($args['skincss']) ? $args['skincss'] : null, 'POST');
	$showFormName = FormUtil::getPassedValue('showFormName', isset($args['showFormName']) ? $args['showFormName'] : 0, 'POST');
	$showNotesTitle = FormUtil::getPassedValue('showNotesTitle', isset($args['showNotesTitle']) ? $args['showNotesTitle'] : 0, 'POST');
    $expertMode = FormUtil::getPassedValue('expertMode', isset($args['expertMode']) ? $args['expertMode'] : 0, 'POST');
    $skinByTemplate = FormUtil::getPassedValue('skinByTemplate', isset($args['skinByTemplate']) ? $args['skinByTemplate'] : 0, 'POST');
    $skinFormTemplate = FormUtil::getPassedValue('skinFormTemplate', isset($args['skinFormTemplate']) ? $args['skinFormTemplate'] : null, 'POST');
    $skinTemplate = FormUtil::getPassedValue('skinTemplate', isset($args['skinTemplate']) ? $args['skinTemplate'] : null, 'POST');
    $skinNoteTemplate = FormUtil::getPassedValue('skinNoteTemplate', isset($args['skinNoteTemplate']) ? $args['skinNoteTemplate'] : null, 'POST');
    $allowComments = FormUtil::getPassedValue('allowComments', isset($args['allowComments']) ? $args['allowComments'] : 0, 'POST');
    $allowCommentsModerated = FormUtil::getPassedValue('allowCommentsModerated', isset($args['allowCommentsModerated']) ? $args['allowCommentsModerated'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form',
													   array('fid' => $fid)));
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition',
						  array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	if ($new != "00/00/00" || $new == '') {
		$new = pnModFunc('iw_forms', 'user', 'makeTime', $new.'23:59:00');
	} else {
		$new = 0;
	}
	if ($caducity != "00/00/00" || $caducity == '') {
		$caducity = pnModFunc('iw_forms', 'user', 'makeTime', $caducity.'23:59:00');
	} else {
		$caducity = 0;
	}
	// keep the mode expert information in case the mode expert were desactivated
	if ($expertMode == 0) {
		$skinForm = $item['skinForm'];
		$skin = $item['skin'];
		$skinNote = $item['skinNote'];
		$skinFormTemplate = $item['skinFormTemplate'];
		$skinTemplate = $item['skinTemplate'];
		$skinNoteTemplate = $item['skinNoteTemplate'];
		$skincss = $item['skincss'];
		$showFormName = $item['showFormName'];
		$showNotesTitle = $item['showNotesTitle'];
	} else {
		if ($skinByTemplate) {
			$skinForm = $item['skinForm'];
			$skin = $item['skin'];
			$skinNote = $item['skinNote'];
			$skincss = $item['skincss'];
			$showFormName = $item['showFormName'];
			$showNotesTitle = $item['showNotesTitle'];
		} else {
			$skinFormTemplate = $item['skinFormTemplate'];
			$skinTemplate = $item['skinTemplate'];
			$skinNoteTemplate = $item['skinNoteTemplate'];
		}
	}
	$items = array('formName' => $formName,
				   'description' => $description,
				   'title' => $title,
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
				   'skin' => $skin,
				   'skincss' => $skincss,
				   'showFormName' => $showFormName,
				   'showNotesTitle' => $showNotesTitle,
				   'skinForm' => $skinForm,
				   'skinNote' => $skinNote,
                   'expertMode' => $expertMode,
                   'skinByTemplate' => $skinByTemplate,
                   'skinFormTemplate' => $skinFormTemplate,
                   'skinTemplate' => $skinTemplate,
                   'skinNoteTemplate' => $skinNoteTemplate,
				   'allowComments' => $allowComments,
				   'allowCommentsModerated' => $allowCommentsModerated);
	if (pnModApiFunc('iw_forms', 'admin', 'editForm',
                      array('fid' => $fid,
							'items' => $items))) {
		// Success
		LogUtil::registerStatus (__('The main points of the form have been published successfully', $dom));
	}
	if ($aio != null) {
		return pnRedirect(pnModURL('iw_forms', 'admin', 'infoForm',
                                    array('fid' => $fid)));
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form',
                                array('fid' => $fid)));
}

/**
 * edit the main information of a field
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the field identity
 * @return:	A form necessary to modify the field
*/
function iw_forms_admin_editField($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'REQUEST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition',
                          array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField',
                               array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$fieldTypeTextArray = pnModFunc('iw_forms', 'admin', 'getFileTypeText');
	$fieldTypeText = $fieldTypeTextArray[$itemField['fieldType']];
	$publicFileURL = '<strong>' . pngetbaseurl() . 'file.php?<br />file=' . pnModGetVar('iw_forms','publicFolder') . '/<br />' . __('Name_field', $dom) . '</strong>';
	$pnRender = pnRender::getInstance('iw_forms',false);
	if ($itemField['fieldType'] == 6) {
		//get all groups
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$groups = pnModFunc('iw_main', 'user', 'getAllGroups',
                             array('sv' => $sv,
								   'plus' => __('Choose a group...', $dom)));
		$pnRender->assign('groups', $groups);
	}
	// Create output object
	$pnRender->assign('item', $item);
	$pnRender->assign('itemField', $itemField);
	$pnRender->assign('fieldTypePlus', '-'.$itemField['fieldType'].'-');
	$pnRender->assign('fieldTypeText', $fieldTypeText);
	$pnRender->assign('publicFileURL', $publicFileURL);
	return $pnRender->fetch('iw_forms_admin_form_fieldEdit.htm');
}

/**
 * edit the main information of a field
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   with the field identity
 * @return:	A form necessary to modify the field
*/
function iw_forms_admin_updateField($fid)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	$fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
	$fieldName = FormUtil::getPassedValue('fieldName', isset($args['fieldName']) ? $args['fieldName'] : null, 'POST');
	$description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
	$help = FormUtil::getPassedValue('help', isset($args['help']) ? $args['help'] : null, 'POST');
	$feedback = FormUtil::getPassedValue('feedback', isset($args['feedback']) ? $args['feedback'] : null, 'POST');
	$required = FormUtil::getPassedValue('required', isset($args['required']) ? $args['required'] : null, 'POST');
	$validationNeeded = FormUtil::getPassedValue('validationNeeded', isset($args['validationNeeded']) ? $args['validationNeeded'] : null, 'POST');
	$active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
	$notify = FormUtil::getPassedValue('notify', isset($args['notify']) ? $args['notify'] : null, 'POST');
	$accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');
	$editable = FormUtil::getPassedValue('editable', isset($args['editable']) ? $args['editable'] : null, 'POST');
	$size = FormUtil::getPassedValue('size', isset($args['size']) ? $args['size'] : null, 'POST');
	$cols = FormUtil::getPassedValue('cols', isset($args['cols']) ? $args['cols'] : null, 'POST');
	$rows = FormUtil::getPassedValue('rows', isset($args['rows']) ? $args['rows'] : null, 'POST');
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
	$extensions = FormUtil::getPassedValue('extensions', isset($args['extensions']) ? $args['extensions'] : null, 'POST');
	$imgWidth = FormUtil::getPassedValue('imgWidth', isset($args['imgWidth']) ? $args['imgWidth'] : 0, 'POST');
	$imgHeight = FormUtil::getPassedValue('imgHeight', isset($args['imgHeight']) ? $args['imgHeight'] : 0, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition',
                          array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//Get field information
	$itemField = pnModAPIFunc('iw_forms', 'user', 'getFormField',
                               array('fndid' => $fndid));
	if ($itemField == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'form',
                                                       array('fid' => $fid,
															 'action' => 'field')));
	}
	$rfid = ($validationNeeded) ? $itemField['rfid'] : '$';
	$items = array('fieldName' => $fieldName,
				   'description' => $description,
				   'help' => $help,
				   'feedback' => $feedback,
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
				   'searchable' => $searchable,
				   'extensions' => $extensions,
				   'imgWidth' => $imgWidth,
				   'imgHeight' => $imgHeight);
	if (pnModApiFunc('iw_forms', 'admin', 'editFormField',
                      array('fndid' => $fndid,
							'items' => $items))) {
		// Success
		LogUtil::registerStatus (__('The field of the form has been published successfully', $dom));
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form',
                                array('fid' => $fid,
									  'action' => 'field')));
}

/**
 * edit the module configuration
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_conf()
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$attached = pnModGetVar('iw_forms','attached');
	$directoriroot = pnModGetVar('iw_main','documentRoot');
	$newsColor = pnModGetVar('iw_forms','newsColor');
	$viewedColor = pnModGetVar('iw_forms','viewedColor');
	$completedColor = pnModGetVar('iw_forms','completedColor');
	$validatedColor = pnModGetVar('iw_forms','validatedColor');
	$fieldsColor = pnModGetVar('iw_forms','fieldsColor');
	$contentColor = pnModGetVar('iw_forms','contentColor');
	$publicFolder = pnModGetVar('iw_forms','publicFolder');
	if (!file_exists(pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_forms', 'attached')) ||
        pnModGetVar('iw_forms', 'attached') == '') {
		$pnRender->assign('noFolder', true);
	} else {
		if (!is_writeable(pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_forms','attached'))) $pnRender->assign('noWriteable', true);
	}
	if (!file_exists(pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_forms', 'publicFolder')) ||
        pnModGetVar('iw_forms', 'publicFolder') == '') {
		$pnRender->assign('noPublicFolder', true);
	} else {
		if (!is_writeable(pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_forms', 'publicFolder')) ||
            file_exists(pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_forms', 'publicFolder') . '/.locked')) $pnRender->assign('noPublicFolderWriteable', true);
	}
	//check if module dpCaptcha is installed
	if (!pnModAvailable('dpCaptcha')) {
		$pnRender->assign('nodpCaptchaAvailable', true);
	} else {
		//check if iw_forms is hooked with dpCaptcha
		if (!pnModIsHooked('dpCaptcha', 'iw_forms')) $pnRender->assign('nodpCaptchaHooked', true);
	}
	//get all categories
	$categories = pnModApiFunc('iw_forms', 'user', 'getAllCategories');
    $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
	$pnRender->assign('multizk', $multizk);
	$pnRender->assign('cats', $categories);
	$pnRender->assign('attached', $attached);
	$pnRender->assign('directoriroot', $directoriroot);
	$pnRender->assign('newsColor', $newsColor);
	$pnRender->assign('viewedColor', $viewedColor);
	$pnRender->assign('completedColor', $completedColor);
	$pnRender->assign('validatedColor', $validatedColor);
	$pnRender->assign('fieldsColor', $fieldsColor);
	$pnRender->assign('contentColor', $contentColor);
	$pnRender->assign('publicFolder', $publicFolder);
	return $pnRender->fetch('iw_forms_admin_conf.htm');
}

/**
 * update the module options
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   with the new information from the edition form
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_updateConf($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$attached = FormUtil::getPassedValue('attached', isset($args['attached']) ? $args['attached'] : null, 'POST');
	$newsColor = FormUtil::getPassedValue('newsColor', isset($args['newsColor']) ? $args['newsColor'] : null, 'POST');
	$viewedColor = FormUtil::getPassedValue('viewedColor', isset($args['viewedColor']) ? $args['viewedColor'] : null, 'POST');
	$completedColor = FormUtil::getPassedValue('completedColor', isset($args['completedColor']) ? $args['completedColor'] : null, 'POST');
	$validatedColor = FormUtil::getPassedValue('validatedColor', isset($args['validatedColor']) ? $args['validatedColor'] : null, 'POST');
	$fieldsColor = FormUtil::getPassedValue('fieldsColor', isset($args['fieldsColor']) ? $args['fieldsColor'] : null, 'POST');
	$contentColor = FormUtil::getPassedValue('contentColor', isset($args['contentColor']) ? $args['contentColor'] : null, 'POST');
	$publicFolder = FormUtil::getPassedValue('publicFolder', isset($args['publicFolder']) ? $args['publicFolder'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError(pnModURL('iw_forms', 'admin', 'main'));
	}
	if (substr(pnModGetVar('iw_main', 'documentRoot'), strrpos(pnModGetVar('iw_main', 'documentRoot'), '/') + 1, strlen(pnModGetVar('iw_main', 'documentRoot'))) == $publicFolder) {
		LogUtil::registerError (__('The name of the directory of the files public is not valid because it matches the name of the home directory of files on the site.', $dom));
		$publicFolder = '';
	}
	pnModSetVar('iw_forms', 'attached', $attached);
	pnModSetVar('iw_forms','newsColor', $newsColor);
	pnModSetVar('iw_forms','viewedColor', $viewedColor);
	pnModSetVar('iw_forms','completedColor', $completedColor);
	pnModSetVar('iw_forms','validatedColor', $validatedColor);
	pnModSetVar('iw_forms','fieldsColor', $fieldsColor);
	pnModSetVar('iw_forms','contentColor', $contentColor);
	pnModSetVar('iw_forms','publicFolder', $publicFolder);
	LogUtil::registerStatus (__('Has changed the configuration of the module', $dom));
	return pnRedirect(pnModURL('iw_forms', 'admin', 'conf'));
}

/**
 * Show the module information
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_forms_admin_module() {
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$module = pnModFunc('iw_main', 'user', 'module_info',
                         array('module_name' => 'iw_forms',
							   'type' => 'admin'));
	$pnRender->assign('module', $module);
	return $pnRender->fetch('iw_forms_admin_module.htm');
}

/**
 * show the all the form information
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the form
 * @return:	The form information
*/
function iw_forms_admin_infoForm($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition',
                          array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//get the form view
	$formView = pnModFunc('iw_forms', 'user', 'new',
                           array('fid' => $fid,
								 'adminView' => 1));
	//get the form features
	$formDefinition = pnModFunc('iw_forms', 'admin', 'definition',
                                 array('fid' => $fid,
									   'adminView' => 1));
	//get the form groups
	$formGroups = pnModFunc('iw_forms', 'admin', 'groups',
                             array('fid' => $fid,
								   'adminView' => 1));
	//get the form validators
	$formValidators = pnModFunc('iw_forms', 'admin', 'validators',
                                 array('fid' => $fid,
									   'adminView' => 1));
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	$pnRender ->assign('item',$item);
	$pnRender ->assign('formView',$formView);
	$pnRender ->assign('formDefinition',$formDefinition);
	$pnRender ->assign('formGroups',$formGroups);
	$pnRender ->assign('formValidators',$formValidators);
	return $pnRender->fetch('iw_forms_admin_infoForm.htm');
}

/**
 * Show a form needed to create a new category
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @return	The form category fields
 */
function iw_forms_admin_addCat() {
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms',false);
	return $pnRender->fetch('iw_forms_admin_addCat.htm');
}

/**
 * Create a new category
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the category information
 * @return	redirect the user to the configuration admin page
 */
function iw_forms_admin_submitCat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// get the parameters sended from the form
	$catName = FormUtil::getPassedValue('catName', isset($args['catName']) ? $args['nomtema'] : null, 'POST');	
	$description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');	
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'conf'));
	}
	// create the new category
	$cid = pnModAPIFunc('iw_forms','admin','createCat',
                         array('catName' => $catName,
							   'description' => $description));
	if ($cid != false) {
		// Success
		LogUtil::registerStatus (__('New category created', $dom));
	}
	// Redirect to the main site for the admin
	return pnRedirect(pnModURL('iw_forms', 'admin', 'conf'));
}

/**
 * Delete a category
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	args   with the group identity
 * @return:	True if success and false otherwise
*/
function iw_forms_admin_deleteCat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'REQUEST');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	//Get item
	$item = pnModAPIFunc('iw_forms', 'user', 'getCategory',
                          array('cid' => $cid));
	if ($item == false) {
		LogUtil::registerError (__('No such category found', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'conf'));
	}
	if (!$confirm) {
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms',false);
		$pnRender->assign ('item',$item);
		return $pnRender->fetch('iw_forms_admin_form_catDelete.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'conf'));
	}
	if (pnModAPIFunc('iw_forms', 'admin', 'deleteCat',
                      array('cid' => $cid))) {
		LogUtil::registerStatus (__('Has deleted the category', $dom));
	}
	return pnRedirect(pnModURL('iw_forms', 'admin', 'conf'));
}

/**
 * Give access to a form from where the category information can be edited
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the category id
 * @return	The category edit form
 */
function iw_forms_admin_editCat($args) {
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Get parameters from whatever input we need
    $cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'GET');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
	if (!empty($objectid)) $cid = $objectid;
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	$item = pnModAPIFunc('iw_forms', 'user', 'getCategory',
                          array('cid' => $cid));
	if ($item == false) {
		LogUtil::registerError (__('No such category found', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'conf'));
	}
	// Create output object
	$pnRender = pnRender::getInstance('iw_forms', false);
	$pnRender->assign('item', $item);
	return $pnRender->fetch('iw_forms_admin_editCat.htm');
}

/**
 * Update a category information
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the arguments needed
 * @return	Redirect the user to the admin configuration page
 */
function iw_forms_admin_updateCat($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	// Get parameters from whatever input we need
	$cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
	$catName = FormUtil::getPassedValue('catName', isset($args['catName']) ? $args['catName'] : null, 'POST');
	$description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'conf'));
	}
	$updated = pnModAPIFunc('iw_forms', 'admin', 'modifyCat',
                             array('cid' => $cid,
								   'catName' => $catName,
								   'description' => $description));
	if ($updated != false) {
		// Success
		LogUtil::registerStatus (__('Has changed the category', $dom));
	}
	// Return to admin pannel
	return pnRedirect(pnModURL('iw_forms', 'admin', 'conf'));
}

/**
 * Update a category information
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the arguments needed
 * @return	Redirect the user to the admin configuration page
 */
function iw_forms_admin_changeOrder($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$f = FormUtil::getPassedValue('f', isset($args['f']) ? $args['f'] : null, 'POST');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return pnRedirect(pnModURL('iw_forms', 'admin', 'form',
                                    array('fid' => $fid,
										  'action' => 'field')));
	}
	$item = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition',
                          array('fid' => $fid));
	if ($item == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	foreach ($f as $key => $value) {
		$items = array('order' => $value);
		pnModApiFunc('iw_forms', 'admin', 'changeOrder',
                      array('fndid' => $key,
							'order' => $value));
	}
	// Reorder the items
	pnModAPIFunc('iw_forms', 'admin', 'reorder', array('fid' => $fid));
	return pnRedirect(pnModURL('iw_forms', 'admin', 'form',
                                array('fid' => $fid,
									  'action' => 'field')));
}

/**
 * Copy a form definition and fields
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:		form identity
 * @return:		Add a new form copied from another form. Redirect user to the new form edition
*/
function iw_forms_admin_copy($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$newFormId = pnModAPIFunc('iw_forms', 'admin', 'copy',
                               array('fid' => $fid));
	if ($newFormId) {
		LogUtil::registerStatus (__('Has made a copy of the form. Edit the characteristics that create appropriate', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'form',
                                    array('do' => 'edit',
										  'fid' => $newFormId)));		
	} else {
		LogUtil::registerError (__('There was an error in the copy of the forum', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));		
	}
}

/**
 * Export a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:		form identity
 * @return:		Create a file XML with the form characteristics
*/
function iw_forms_admin_export($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Needed argument
	if (!isset($fid) || !is_numeric($fid)) {
		LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	// Gets module information
	$modid = pnModGetIDFromName('iw_forms');
	$moduleInfo = pnModGetInfo($modid);
	$version = $moduleInfo['version'];
	// Get user
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userFullname = pnModFunc('iw_main', 'user', 'getUserInfo',
                               array('info' => 'ccn',
									 'uid' => pnUserGetVar('uid'),
									 'sv' => $sv));
	//get form information
	$form = pnModAPIFunc('iw_forms', 'user', 'getFormDefinition',
                          array('fid' => $fid));
	if ($form == false) {
		LogUtil::registerError (__('Could not find form', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$fields = pnModAPIFunc('iw_forms', 'user', 'getAllFormFields',
                            array('fid' => $fid));
	// create doctype
	//$dom = new DOMDocument("1.0", "ISO-8859-1");
	$dom = new DOMDocument();
	// we want a nice output
	$dom->formatOutput = true;
	// display document in browser as plain text
	// for readability purposes
	header("Content-Type: text/plain");
	// create root element
	$root = $dom->createElement("IntrawebForm");
	$dom->appendChild($root);
	// create attribute node
	$param = $dom->createAttribute("name");
	$root->appendChild($param);
	$value = $dom->createTextNode("name");
	$param->appendChild($value);
	// create attribute node
	$param = $dom->createAttribute("version");
	$root->appendChild($param);
	$value = $dom->createTextNode($version);
	$param->appendChild($value);
	$package = $dom->createElement("package");
	$root->appendChild($package);
	$item = $dom->createElement("author");
	$package->appendChild($item);
	$data = $dom->createTextNode($userFullname);
	$item->appendChild($data);
	$item = $dom->createElement("source");
	$package->appendChild($item);
	$data = $dom->createCDATASection(pnConfigGetVar('sitename'));
	$item->appendChild($data);
	$item = $dom->createElement("sourceURL");
	$package->appendChild($item);
	$data = $dom->createTextNode(pngetbaseurl());
	$item->appendChild($data);
	$item = $dom->createElement("creationDate");
	$package->appendChild($item);
	$data = $dom->createTextNode(date('d/m/Y - H.i',time()));
	$item->appendChild($data);
	$formDefinition = $dom->createElement("formDefinition");
	$root->appendChild($formDefinition);
	$discartArray = array('fid',
						  'new',
						  'cid',
						  'caducity',
						  'answare',
						  'characters',
						  'obj_status',
						  'cr_date',
						  'cr_uid',
						  'lu_date',
						  'lu_uid');
	$dataSections = array('formName',
						  'description',
						  'skin',
						  'skinForm',
						  'skinNote',
						  'title');
	foreach ($form as $key => $value) {
		if (!in_array($key, $discartArray)) {
			if ($key == 'active') $value = 0;
			$item = $dom->createElement($key);
			$formDefinition->appendChild($item);
			$data = (in_array($key, $dataSections)) ? $dom->createCDATASection($value) : $dom->createTextNode($value);
			$item->appendChild($data);	
		}
	}
	//Create a new element in root
	$formDefinition = $dom->createElement("formFields");
	$root->appendChild($formDefinition);
	$discartArray = array('fndid',
						  'fid',
						  //******* maybe should be removed in future versions
						  'dependance',
						  'rfid',
						  'validationNeeded',
						  'notify',
						  'accessType',
					      //*******
					      'collapse',
						  'gid',
						  'obj_status',
					  	  'cr_date',
					  	  'cr_uid',
					  	  'lu_date',
					  	  'lu_uid');
	$dataSections = array('description',
						  'fieldName',
						  'options',
						  'help');
	foreach ($fields as $fieldx) {
		$field = $dom->createElement("field");
		$formDefinition->appendChild($field);
		foreach ($fieldx as $key => $value) {
			if (!in_array($key, $discartArray)) {
				$item = $dom->createElement($key);
				$field->appendChild($item);
				$data = (in_array($key, $dataSections)) ? $dom->createCDATASection($value) : $dom->createTextNode($value);
				$item->appendChild($data);	
			}
		}
	}
	$file = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_main', 'tempFolder') . '/exportForm' . date('dmY') . '.xml';	
	$save = $dom->save($file);
	//Check that file has been created correctly
	if (!is_file($file)) {
		LogUtil::registerError (__('Error exporting file', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//Gather relevent info about file
	$len = filesize($file);
	$filename = basename($file);
	$ctype = "XML/XML";
	//Begin writing headers
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	//Use the switch-generated Content-Type
	header("Content-Type: $ctype");
	//Force the download
	$header = "Content-Disposition: attachment; filename=" . $filename . ";";
	header($header );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: " . $len);
	@readfile($file);
	//Delete file from servar folder
	unlink($file);
	exit;
}

/**
 * Import a form
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:		Create a new form from a XML file
*/
function iw_forms_admin_import($args)
{
	$dom = ZLanguage::getModuleDomain('iw_forms');
	$confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission('iw_forms::', "::", ACCESS_ADMIN)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if (!$confirm) {
		//Load the form to update the file
		// Create output object
		$pnRender = pnRender::getInstance('iw_forms', false);
		return $pnRender->fetch('iw_forms_admin_import.htm');
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_forms', 'admin', 'main'));
	}
	//gets the attached file array
	$fileName = $_FILES['import']['name'];
	$file_extension = strtolower(substr(strrchr($fileName,"."),1));
	if ($file_extension != 'xml') {
		LogUtil::registerError (__('The import file is not correct. It need the xml extension', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	//update file to the server
	// update the attached file to the server
	if ($fileName != '') {
		$folder = pnModGetVar('iw_main', 'tempFolder');
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$update = pnModFunc('iw_main', 'user', 'updateFile',
                             array('sv' => $sv,
								   'folder' => $folder,
								   'allow' => '|xml',
								   'file' => $_FILES['import'],
								   'fileName' => $fileName));
		//the function returns the error string if the update fails and and empty string if success
		if ($update['msg'] != '') {
			LogUtil::registerError (__('Error updating the import file to the server', $dom));
			return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
		} else {
			$nom_fitxer = $update['fileName'];
		}
  	}
	$xmlFile = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_main', 'tempFolder') . '/' . $nom_fitxer;
	//Create a dom instance
	$doc = new DOMDocument();
	if (!$doc->load($xmlFile)) {
		LogUtil::registerError (__('Error loading xml document.', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$items = $doc->getElementsByTagName("formDefinition");
	foreach ($items as $item) {
		$formName = $item->getElementsByTagName('formName')->item(0)->nodeValue;
		$description = $item->getElementsByTagName('description')->item(0)->nodeValue;
		$title = $item->getElementsByTagName('title')->item(0)->nodeValue;
		$annonimous = $item->getElementsByTagName('annonimous')->item(0)->nodeValue;
		$unique = $item->getElementsByTagName('unique')->item(0)->nodeValue;
		$closeableNotes = $item->getElementsByTagName('closeableNotes')->item(0)->nodeValue;
		$closeInsert = $item->getElementsByTagName('closeInsert')->item(0)->nodeValue;
		$closeableInsert = $item->getElementsByTagName('closeableInsert')->item(0)->nodeValue;
		$unregisterednotusersview = $item->getElementsByTagName('unregisterednotusersview')->item(0)->nodeValue;
		$unregisterednotexport = $item->getElementsByTagName('unregisterednotexport')->item(0)->nodeValue;
		$publicResponse = $item->getElementsByTagName('publicResponse')->item(0)->nodeValue;
		$skin = $item->getElementsByTagName('skin')->item(0)->nodeValue;
		$skincss = $item->getElementsByTagName('skincss')->item(0)->nodeValue;
		$showFormName = $item->getElementsByTagName('showFormName')->item(0)->nodeValue;
		$showNotesTitle = $item->getElementsByTagName('showNotesTitle')->item(0)->nodeValue;
		$skinForm = $item->getElementsByTagName('skinForm')->item(0)->nodeValue;
		$expertMode = $item->getElementsByTagName('expertMode')->item(0)->nodeValue;
		$skinByTemplate = $item->getElementsByTagName('skinByTemplate')->item(0)->nodeValue;
		$skinFormTemplate = $item->getElementsByTagName('skinFormTemplate')->item(0)->nodeValue;
		$skinTemplate = $item->getElementsByTagName('skinTemplate')->item(0)->nodeValue;
		$skinNoteTemplate = $item->getElementsByTagName('skinNoteTemplate')->item(0)->nodeValue;
		$allowComments = $item->getElementsByTagName('allowComments')->item(0)->nodeValue;
		$allowCommentsModerated = $item->getElementsByTagName('allowCommentsModerated')->item(0)->nodeValue;
	}
	$create = pnModAPIFunc('iw_forms', 'admin', 'createNewForm',
                            array('formName' => $formName,
								  'description' => $description,
								  'title' => $title,
								  'annonimous' => $annonimous,
								  'unique' => $unique,
								  'closeableNotes' => $closeableNotes,
								  'closeInsert' => $closeInsert,
								  'closeableInsert' => $closeableInsert,
								  'unregisterednotusersview' => $unregisterednotusersview,
								  'unregisterednotexport' => $unregisterednotexport,
								  'publicResponse' => $publicResponse,
								  'active' => 0,
								  'skin' => $skin,
								  'skincss' => $skincss,
								  'showFormName' => $showFormName,
								  'showNotesTitle' => $showNotesTitle,
								  'skinForm' => $skinForm,
								  'skinNote' => $skinNote,
                            	  'expertMode' => $expertMode,
                            	  'skinByTemplate' => $skinByTemplate,
                            	  'skinFormTemplate' => $skinFormTemplate,
	                              'skinTemplate' => $skinTemplate,
	                              'skinNoteTemplate' => $skinNoteTemplate,
	                              'allowComments' => $allowComments,
	                              'allowCommentsModerated' => $allowCommentsModerated));
	if (!$create) {
		LogUtil::registerError (__('The form creation has failt', $dom));
		return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
	}
	$items = $doc->getElementsByTagName("field");
	foreach ($items as $item) {
		$fieldType = $item->getElementsByTagName('fieldType')->item(0)->nodeValue;
		$required = $item->getElementsByTagName('required')->item(0)->nodeValue;
		$description = $item->getElementsByTagName('description')->item(0)->nodeValue;
		$fieldName = $item->getElementsByTagName('fieldName')->item(0)->nodeValue;
		$feedback = $item->getElementsByTagName('feedback')->item(0)->nodeValue;
		$order = $item->getElementsByTagName('order')->item(0)->nodeValue;
		$active = $item->getElementsByTagName('active')->item(0)->nodeValue;
		$dependance = $item->getElementsByTagName('dependance')->item(0)->nodeValue;
		$rfid = $item->getElementsByTagName('rfid')->item(0)->nodeValue;
		$validationNeeded = $item->getElementsByTagName('validationNeeded')->item(0)->nodeValue;
		$notify = $item->getElementsByTagName('notify')->item(0)->nodeValue;
		$size = $item->getElementsByTagName('size')->item(0)->nodeValue;
		$cols = $item->getElementsByTagName('cols')->item(0)->nodeValue;
		$rows = $item->getElementsByTagName('rows')->item(0)->nodeValue;
		$editor = $item->getElementsByTagName('editor')->item(0)->nodeValue;
		$checked = $item->getElementsByTagName('checked')->item(0)->nodeValue;
		$options = $item->getElementsByTagName('options')->item(0)->nodeValue;
		$calendar = $item->getElementsByTagName('calendar')->item(0)->nodeValue;
		$height = $item->getElementsByTagName('height')->item(0)->nodeValue;
		$color = $item->getElementsByTagName('color')->item(0)->nodeValue;
		$colorf = $item->getElementsByTagName('colorf')->item(0)->nodeValue;
		$accessType = $item->getElementsByTagName('accessType')->item(0)->nodeValue;
		$editable = $item->getElementsByTagName('editable')->item(0)->nodeValue;
		$collapse = $item->getElementsByTagName('collapse')->item(0)->nodeValue;
		$publicFile = $item->getElementsByTagName('publicFile')->item(0)->nodeValue;
		$help = $item->getElementsByTagName('help')->item(0)->nodeValue;
		$gid = $item->getElementsByTagName('gid')->item(0)->nodeValue;
		$searchable = $item->getElementsByTagName('searchable')->item(0)->nodeValue;
		$createField = pnModAPIFunc('iw_forms', 'admin', 'createFormFieldExport',
                                     array('fid' => $create,
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
										   'gid' => 0,
										   'searchable' => $searchable));
		if (!$createField) {
			LogUtil::registerError (__('The form creation has failt', $dom));
			return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));
		}
	}
	LogUtil::registerStatus (__('The form has been imported correcty', $dom));
	return pnRedirect(pnModURL('iw_forms', 'admin', 'main'));		
}