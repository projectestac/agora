<?php

class IWforms_Controller_Admin extends Zikula_AbstractController {

    /**
     * Show the forms created
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	A list with the forms that had been created with some options
     */
    public function postInitialize() {
        $this->view->setCaching(false);
    }

    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $catName = array();
        $categories = ModUtil::apiFunc('IWforms', 'user', 'getAllCategories');
        foreach ($categories as $category) {
            $catName[$category['cid']] = $category['catName'];
        }

        //main
        ModUtil::apiFunc('IWforms', 'user', 'desactivateForm');
        $forms = ModUtil::apiFunc('IWforms', 'user', 'getAllForms', array('allLangs' => 1));
        $formsArray = array();
        foreach ($forms as $form) {
            $catNameText = (isset($catName[$form['cid']])) ? $catName[$form['cid']] : '';
            $new = ModUtil::func('IWforms', 'user', 'makeTimeForm', $form['new']);
            $caducity = ModUtil::func('IWforms', 'user', 'makeTimeForm', $form['caducity']);
            $formsArray[] = array('formName' => $form['formName'],
                'title' => $form['title'],
                'catName' => $catNameText,
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
                'new' => $new,
                'lang' => $form['lang'],
            );
        }
        return $this->view->assign('forms', $formsArray)
                        ->fetch('IWforms_admin_main.htm');
    }

    /**
     * Prepare the information necessary to create a new form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The form necessary to create a new form
     */
    public function create() {
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //get all categories
        $categories = ModUtil::apiFunc('IWforms', 'user', 'getAllCategories');

        $filesFolder = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforms', 'attached');

        $languages = ZLanguage::getInstalledLanguages();
        $languagesArray = array();
        foreach ($languages as $lang) {
            $languagesArray[] = array('code' => $lang,
                'name' => ZLanguage::getLanguageName($lang),
            );
        }

        //outputs assignaments
        return $this->view->assign('cats', $categories)
                        ->assign('item', array('expertMode' => ''))
                        ->assign('filesFolder', $filesFolder)
                        ->assign('languages', $languagesArray)
                        ->fetch('IWforms_admin_create.htm');
    }

    /**
     * Submit the information to create a new form in database
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the form information
     * @return:	True if success and false otherwise
     */
    public function submit($args) {
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
        $returnURL = FormUtil::getPassedValue('returnURL', isset($args['returnURL']) ? $args['returnURL'] : '', 'POST');
        $filesFolder = FormUtil::getPassedValue('filesFolder', isset($args['filesFolder']) ? $args['filesFolder'] : '', 'POST');
        $lang = FormUtil::getPassedValue('lang', isset($args['lang']) ? $args['lang'] : '', 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $new = ModUtil::func('IWforms', 'user', 'makeTime', $new . '23:59:00');
        $caducity = ModUtil::func('IWforms', 'user', 'makeTime', $caducity . '23:59:00');
        $create = ModUtil::apiFunc('IWforms', 'admin', 'createNewForm', array('formName' => $formName,
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
                    'skinNoteTemplate' => $skinNoteTemplate,
                    'returnURL' => $returnURL,
                    'filesFolder' => $filesFolder,
                    'lang' => $lang,
                ));
        if ($create != false) {
            // Success
            LogUtil::registerStatus($this->__('The form was created successfully'));
        }
        // Redirect to the main site for the admin
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $create)));
    }

    /**
     * Show the information of a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The form necessary to create a new form
     */
    public function form($args) {
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
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //main
        switch ($action) {
            case 'field':
                switch ($do) {
                    case 'edit':
                        $content = ModUtil::func('IWforms', 'admin', 'editField', array('fid' => $fid,
                                    'fndid' => $fndid));
                        break;
                    case 'add':
                        $content = ModUtil::func('IWforms', 'admin', 'createField', array('fid' => $fid));
                        break;
                    case 'delete':
                        $content = ModUtil::func('IWforms', 'admin', 'deleteField', array('fid' => $fid,
                                    'fndid' => $fndid));
                        break;
                    case 'modifyFieldDependances':
                        $content = ModUtil::func('IWforms', 'admin', 'modifyFieldDependances', array('fid' => $fid,
                                    'fndid' => $fndid));
                        break;
                    case 'addFieldValidator':
                        $content = ModUtil::func('IWforms', 'admin', 'addFieldValidator', array('fid' => $fid,
                                    'fndid' => $fndid));
                        break;
                    default:
                        $content = ModUtil::func('IWforms', 'admin', 'field', array('fid' => $fid));
                }
                $tab = 2;
                break;
            case 'group':
                switch ($do) {
                    case 'add':
                        $content = ModUtil::func('IWforms', 'admin', 'addGroup', array('fid' => $fid));
                        break;
                    case 'delete':
                        $content = ModUtil::func('IWforms', 'admin', 'deleteGroup', array('fid' => $fid,
                                    'gfid' => $gfid,
                                    'aio' => $aio));
                        break;
                    default:
                        $content = ModUtil::func('IWforms', 'admin', 'groups', array('fid' => $fid));
                }
                $tab = 3;
                break;
            case 'validators':
                switch ($do) {
                    case 'add':
                        $content = ModUtil::func('IWforms', 'admin', 'addValidator', array('fid' => $fid,
                                    'group' => $group,
                                    'validator' => $validator,
                                    'validatorType' => $validatorType));
                        break;
                    case 'delete':
                        $content = ModUtil::func('IWforms', 'admin', 'deleteValidator', array('fid' => $fid,
                                    'rfid' => $rfid,
                                    'aio' => $aio));
                        break;
                    default:
                        $content = ModUtil::func('IWforms', 'admin', 'validators', array('fid' => $fid));
                }
                $tab = 4;
                break;
            default:
                switch ($do) {
                    case 'edit':
                        $content = ModUtil::func('IWforms', 'admin', 'edit', array('fid' => $fid,
                                    'aio' => $aio));
                        break;
                    case 'delete':
                        $content = ModUtil::func('IWforms', 'admin', 'delete', array('fid' => $fid));
                        break;
                    default:
                        $content = ModUtil::func('IWforms', 'admin', 'definition', array('fid' => $fid));
                }
                $tab = 1;
        }

        return $this->view->assign('item', $item)
                        ->assign('content', $content)
                        ->assign('tab', $tab)
                        ->fetch('IWforms_admin_form.htm');
    }

    /**
     * show the form definition information
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the fields needed
     * @return:	The validators information
     */
    public function definition($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $adminView = FormUtil::getPassedValue('adminView', isset($args['adminView']) ? $args['adminView'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $category = ($item['cid'] != 0) ? ModUtil::apiFunc('IWforms', 'user', 'getCategory', array('cid' => $item['cid'])) : "---";
        if ($item['skincss'] != '') {
            $url = System::getBaseUrl() . 'index.php?module=IWforms&func=getFile&fileName=' . ModUtil::getVar('IWforms', 'attached') . '/' . $item['skincss'];
            $item['skincssurl'] = '<link rel="stylesheet" href="' . $url . '" type="text/css" />';
        }
        $folderExists = true;
        $folderIsWriteable = true;
        if ($item['filesFolder'] != '') {
            $path = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforms', 'attached') . '/' . $item['filesFolder'];
            $item['filesFolder'] = $path;
            if (!file_exists($path)) {
                $folderExists = false;
            } else {
                if (!is_writeable($path))
                    $folderIsWriteable = false;
            }
        }

        return $this->view->assign('catName', $category['catName'])
                        ->assign('item', $item)
                        ->assign('folderExists', $folderExists)
                        ->assign('folderIsWriteable', $folderIsWriteable)
                        ->assign('new', ModUtil::func('IWforms', 'user', 'makeTimeForm', $item['new']))
                        ->assign('caducity', ModUtil::func('IWforms', 'user', 'makeTimeForm', $item['caducity']))
                        ->fetch('IWforms_admin_form_definition.htm');
    }

    /**
     * Get the validators for a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the fields needed
     * @return:	The validators information
     */
    public function validators($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }

        $validators = ModUtil::apiFunc('IWforms', 'user', 'getAllValidators', array('fid' => $fid));
        $usersList = '';
        $validators_array = array();
        foreach ($validators as $validator) {
            $usersList .= $validator['validator'] . '$$';
            $validatorTypeText = ($validator['validatorType'] == 1) ? _IWFORMSVALIDATEFIELDS : $this->__('Global validator');
            $validators_array[] = array('validator' => $validator['validator'],
                'validatorTypeText' => $validatorTypeText,
                'rfid' => $validator['rfid']);
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ccn',
                    'sv' => $sv,
                    'list' => $usersList));
        return $this->view->assign('validators', $validators_array)
                        ->assign('users', $users)
                        ->assign('item', $item)
                        ->fetch('IWforms_admin_form_validators.htm');
    }

    /**
     * Change the minitab active in forms
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the tab that must to be shown as active
     * @return:	The tabs content
     */
    public function minitab($args) {
        $tab = FormUtil::getPassedValue('tab', isset($args['tab']) ? $args['tab'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        return $this->view->assign('tab', $tab)
                        ->fetch('IWforms_admin_form_minitab.htm');
    }

    /**
     * Get the groups for a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the fields needed
     * @return:	The groups access information
     */
    public function groups($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $adminView = FormUtil::getPassedValue('adminView', isset($args['adminView']) ? $args['adminView'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $groups_array = array();
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }

        $groups = ModUtil::apiFunc('IWforms', 'user', 'getAllGroups', array('fid' => $fid));
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));
        foreach ($groups as $group) {
            $accessText = array('1' => $this->__('Only writing'), '2' => $this->__('Only reading'), '3' => $this->__('Reading and writing'));
            $validation = ($group['validationNeeded']) ? $this->__('Yes') : $this->__('No');
            $groupName = ($group['group'] == 0) ? $this->__('Unregistered users') : $groupsInfo[$group['group']];
            $groups_array[] = array('groupName' => $groupName,
                'accessType' => $accessText[$group['accessType']],
                'validationNeeded' => $validation,
                'gfid' => $group['gfid']);
        }
        return $this->view->assign('groups', $groups_array)
                        ->assign('adminView', $adminView)
                        ->assign('item', $item)
                        ->fetch('IWforms_admin_form_groups.htm');
    }

    /**
     * Get the fields for a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the fields needed
     * @return:	The fields information
     */
    public function field($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $fields_array = array();
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $fid));

        $usersList = '';
        $groupName = '';
        foreach ($fields as $field) {
            // get validators names and prepare them to show
            $usersList .= $field['rfid'] . '$$';
            $validators = explode('$$', substr($field['rfid'], 2, -1));
            $validatorsNames = array();
            foreach ($validators as $validator) {
                if ($validator != '') {
                    $validatorsNames[] = array('id' => $validator);
                }
            }
            if ($field['gid'] > 0) {
                $group = ModUtil::apiFunc('Groups', 'user', 'get', array('gid' => $field['gid']));
                $groupName = $group['name'];
            }
            $fieldTypeTextArray = ModUtil::func('IWforms', 'admin', 'getFileTypeText');
            $fieldTypeText = $fieldTypeTextArray[$field['fieldType']];
            $fields_array[] = array('fndid' => $field['fndid'],
                'fieldName' => $field['fieldName'],
                'fieldTypeText' => $fieldTypeText,
                'feedback' => $field['feedback'],
                'fieldTypePlus' => '-' . $field['fieldType'] . '-',
                'active' => $field['active'],
                'description' => $field['description'],
                'required' => $field['required'],
                'order' => $field['order'],
                'validationNeeded' => $field['validationNeeded'],
                'notify' => $field['notify'],
                'dependance' => str_replace('$$', ',', substr($field['dependance'], 2, -1)),
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

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ccn',
                    'sv' => $sv,
                    'list' => $usersList));
        return $this->view->assign('fields', $fields_array)
                        ->assign('fid', $fid)
                        ->assign('users', $users)
                        ->assign('number', count($fields_array))
                        ->assign('item', $item)
                        ->fetch('IWforms_admin_form_fields.htm');
    }

    /**
     * Collapse or expand all the fields
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the form and the collapse state
     * @return:	Redirect to fields list
     */
    public function collexpand($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'GET');
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        ModUtil::apiFunc('IWforms', 'admin', 'collexpand', array('fid' => $fid,
            'value' => $value));

        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'field')));
    }

    /**
     * Change the fields order
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the field where the order will be changed
     * @return:	Redirect user to admin main page
     */
    public function order($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'GET');
        $puts = FormUtil::getPassedValue('puts', isset($args['puts']) ? $args['puts'] : null, 'GET');
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        // Create output object
        $view = Zikula_View::getInstance('IWforms', false);
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $order = ($puts == '-1') ? $itemField['order'] + 15 : $itemField['order'] - 15;
        $items = array('order' => $order);
        if (ModUtil::apiFunc('IWforms', 'admin', 'editFormField', array('fndid' => $fndid,
                    'items' => $items))) {
            // Success
            LogUtil::registerStatus($this->__('Has changed the order of the fields'));
        }
        // Reorder the items
        ModUtil::apiFunc('IWforms', 'admin', 'reorder', array('fid' => $fid));
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'field')));
    }

    /**
     * Get defined fields for a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the fields needed
     * @return:	The fields information
     */
    public function getFileTypeText($args) {
        $fieldType = FormUtil::getPassedValue('fieldType', isset($args['fieldType']) ? $args['fieldType'] : null, 'POST');
        $types = array('0' => $this->__('Choose a type of field'),
            '1' => $this->__('Text'),
            '2' => $this->__('Text area'),
            '3' => $this->__('URL'),
            '4' => $this->__('Date'),
            '5' => $this->__('Time'),
            '6' => $this->__('List of options'),
            '7' => $this->__('File'),
            '8' => $this->__('Yes/No'),
            '51' => $this->__('Information'),
            '52' => $this->__('Dividing line'),
            '53' => $this->__('Box'),
            '100' => $this->__('Final box'));
        return $types;
    }

    /**
     * Prepare the information necessary to create a new field into a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the field will be created
     * @return:	A form to create a new field
     */
    public function createField($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        return $this->view->assign('item', $item)
                        ->fetch('IWforms_admin_form_fieldAdd.htm');
    }

    /**
     * Submit the information to create a new field for a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the field information
     * @return:	True if success and false otherwise
     */
    public function submitField($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $fieldType = FormUtil::getPassedValue('fieldType', isset($args['fieldType']) ? $args['fieldType'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        if ($fieldType == 0) {
            return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                                'action' => 'field')));
        }
        $createField = ModUtil::apiFunc('IWforms', 'admin', 'createFormField', array('fid' => $fid,
                    'fieldType' => $fieldType,
                    'fieldName' => $this->__('Field name')));
        ModUtil::apiFunc('IWforms', 'admin', 'reorder', array('fid' => $fid));
        if ($createField != false) {
            // Success
            LogUtil::registerStatus($this->__('We have created a new field. Edit the characteristics of the field'));

            //If field type is fileset create a fieldset end field </fieldset> and edit it
            if ($fieldType == 53) {
                $createFieldSetEnd = ModUtil::apiFunc('IWforms', 'admin', 'createFormFieldSetEnd', array('fid' => $fid,
                            'dependance' => $createField,
                            'fieldName' => $this->__('Final box')));
            }
        }
        // Reorder the items
        ModUtil::apiFunc('IWforms', 'admin', 'reorder', array('fid' => $fid));
        //Redirect user to edit field form
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('action' => 'field',
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
    public function deleteFieldValidator($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'GET');
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Delete validator on validators string
        $validatorsString = str_replace('$' . $id . '$', '', $itemField['rfid']);
        $items = array('rfid' => $validatorsString);
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userFullname = ModUtil::func('IWmain', 'user', 'getUserInfo', array('info' => 'ccn',
                    'uid' => $id,
                    'sv' => $sv));
        if (ModUtil::apiFunc('IWforms', 'admin', 'editFormField', array('fndid' => $fndid,
                    'items' => $items))) {
            // Success
            LogUtil::registerStatus($this->__('Deleted validator') . ' ' . $userFullname);
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'field')));
    }

    /**
     * Prepare the information necessary to create a new validator for the form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the manager will be created
     * @return:	A form to create a new manager
     */
    public function addFieldValidator($args) {
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $validator = FormUtil::getPassedValue('validator', isset($args['validator']) ? $args['validator'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        if (!$confirm) {
            $validators = ModUtil::apiFunc('IWforms', 'user', 'getAllValidators', array('fid' => $fid));
            foreach ($validators as $validator) {
                $usersList .= $validator['validator'] . '$$';
                $validators_array[] = array('validatorUserId' => $validator['validator']);
            }
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ccn',
                        'sv' => $sv,
                        'list' => $usersList));
            return $this->view->assign('validators', $validators_array)
                            ->assign('users', $users)
                            ->assign('item', $item)
                            ->assign('itemField', $itemField)
                            ->fetch('IWforms_admin_form_addFieldValidator.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        //Add validator into validators string
        $validatorsString = $itemField['rfid'] . '$' . $validator . '$';
        $items = array('rfid' => $validatorsString);
        if (ModUtil::apiFunc('IWforms', 'admin', 'editFormField', array('fndid' => $fndid,
                    'items' => $items))) {
            // Success
            LogUtil::registerStatus($this->__('Added validator') . ' ' . $usersFullname[$validator]);
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'field')));
    }

    /**
     * Prepare the information necessary to create a new group with access to the form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the group will be created
     * @return:	A form to create a new group
     */
    public function addGroup($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');
        $validationNeeded = FormUtil::getPassedValue('validationNeeded', isset($args['validationNeeded']) ? $args['validationNeeded'] : null, 'POST');
        $aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'REQUEST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                        'plus' => $this->__('Unregistered'),
                        'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));
            return $this->view->assign('groups', $groups)
                            ->assign('item', $item)
                            ->assign('aio', $aio)
                            ->fetch('IWforms_admin_form_addGroup.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        //Save the group in database
        if (ModUtil::apiFunc('IWforms', 'admin', 'addGroup', array('fid' => $fid,
                    'group' => $group,
                    'accessType' => $accessType,
                    'validationNeeded' => $validationNeeded))) {
            // Success
            LogUtil::registerStatus($this->__('Added a group of access to the form'));
        }
        if (isset($aio) && $aio == 1) {
            return System::redirect(ModUtil::url('IWforms', 'admin', 'infoForm', array('fid' => $fid)));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'group')));
    }

    /**
     * Prepare the information necessary to create a new validator for the form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form where the group will be created
     * @return:	A form to add a new validator
     */
    public function addValidator($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $validator = FormUtil::getPassedValue('validator', isset($args['validator']) ? $args['validator'] : null, 'POST');
        $validatorType = FormUtil::getPassedValue('validatorType', isset($args['validatorType']) ? $args['validatorType'] : null, 'POST');
        $aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'REQUEST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $confirm = (!isset($validator) || $validator == 0) ? 0 : 1;
        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                        'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                        'gid' => $group));
            return $this->view->assign('groupselect', $group)
                            ->assign('groups', $groups)
                            ->assign('groupMembers', $groupMembers)
                            ->assign('item', $item)
                            ->assign('aio', $aio)
                            ->fetch('IWforms_admin_form_addValidator.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        //Save the group in database
        if (ModUtil::apiFunc('IWforms', 'admin', 'addValidator', array('fid' => $fid,
                    'validator' => $validator,
                    'validatorType' => $validatorType))) {
            // Success
            LogUtil::registerStatus($this->__('Has added a new validator'));
        }
        if (isset($aio) && $aio == 1) {
            return System::redirect(ModUtil::url('IWforms', 'admin', 'infoForm', array('fid' => $fid)));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'validators')));
    }

    /**
     * Delete a form completelly. It delete to field, groups, managers and notes content
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the form identity
     * @return:	True if success and false otherwise
     */
    public function deleteNotes($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        if (!$confirm) {
            return $this->view->assign('item', $item)
                            ->fetch('IWforms_admin_form_deleteNotes.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        //delete the form notes
        if (ModUtil::apiFunc('IWforms', 'admin', 'deleteFormNotes', array('fid' => $fid))) {
            LogUtil::registerStatus($this->__('Dropped the annotations of the form'));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
    }

    /**
     * Delete the validator of a group to a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the validator identity
     * @return:	True if success and false otherwise
     */
    public function deleteValidator($args) {
        $rfid = FormUtil::getPassedValue('rfid', isset($args['rfid']) ? $args['rfid'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get validator information
        $itemValidator = ModUtil::apiFunc('IWforms', 'user', 'getValidator', array('rfid' => $rfid));
        if ($itemValidator == false) {
            LogUtil::registerError($this->__('Not Found validator'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                                'action' => 'validators')));
        }
        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userName = ModUtil::func('IWmain', 'user', 'getUserInfo', array('info' => 'ccn',
                        'uid' => $itemValidator['validator'],
                        'sv' => $sv));

            return $this->view->assign('item', $item)
                            ->assign('validatorId', $rfid)
                            ->assign('userName', $userName)
                            ->assign('aio', $aio)
                            ->fetch('IWforms_admin_form_validatorDelete.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        if (ModUtil::apiFunc('IWforms', 'admin', 'deleteValidator', array('rfid' => $rfid))) {
            LogUtil::registerStatus($this->__('Has deleted a validator'));
        }
        if (isset($aio) && $aio == 1) {
            return System::redirect(ModUtil::url('IWforms', 'admin', 'infoForm', array('fid' => $fid)));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'validators')));
    }

    /**
     * Delete access of a group to a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the group identity
     * @return:	True if success and false otherwise
     */
    public function deleteGroup($args) {
        $gfid = FormUtil::getPassedValue('gfid', isset($args['gfid']) ? $args['gfid'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get field information
        $itemGroup = ModUtil::apiFunc('IWforms', 'user', 'getGroup', array('gfid' => $gfid));
        if ($itemGroup == false) {
            LogUtil::registerError($this->__('Can not find the group'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                                'action' => 'group')));
        }
        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));
            $groupName = ($itemGroup['group'] == 0) ? $this->__('Unregistered users') : $groupsInfo[$itemGroup['group']];
            return $this->view->assign('item', $item)
                            ->assign('itemGroup', $itemGroup)
                            ->assign('groupId', $itemGroup['gfid'])
                            ->assign('groupName', $groupName)
                            ->assign('aio', $aio)
                            ->fetch('IWforms_admin_form_groupDelete.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        if (ModUtil::apiFunc('IWforms', 'admin', 'deleteGroup', array('gfid' => $gfid))) {
            LogUtil::registerStatus($this->__('Has been cleared access to the group'));
        }
        if (isset($aio) && $aio == 1) {
            return System::redirect(ModUtil::url('IWforms', 'admin', 'infoForm', array('fid' => $fid)));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'group')));
    }

    /**
     * Delete the field of a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the field identity
     * @return:	True if success and false otherwise
     */
    public function deleteField($args) {
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Check if there are other fields that depens on it. In this case the field can't be deleted
        $dependancesTo = ModUtil::apiFunc('IWforms', 'user', 'getFormFieldDependancesTo', array('fndid' => $fndid));
        if (!$confirm) {
            $fieldTypeTextArray = ModUtil::func('IWforms', 'admin', 'getFileTypeText');
            $fieldTypeText = $fieldTypeTextArray[$itemField['fieldType']];
            return $this->view->assign('item', $item)
                            ->assign('itemField', $itemField)
                            ->assign('dependancesTo', $dependancesTo)
                            ->assign('fieldTypeText', $fieldTypeText)
                            ->fetch('IWforms_admin_form_fieldDelete.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        if (ModUtil::apiFunc('IWforms', 'admin', 'deleteFormField', array('itemField' => $fndid))) {
            LogUtil::registerStatus($this->__('Has been deleted the field'));
        }
        /*
          //if field is a fieldset delete too the fieldset end
          if ($itemField['fieldType'] == 53) {
          $dependances = ModUtil::apiFunc('IWforms', 'user', 'getFormFieldDependancesTo',
          array('fndid' => $fndid));
          foreach ($dependances as $dependance) {
          $d = (int)$dependance['fndid'];
          }
          ModUtil::apiFunc('IWforms', 'admin', 'deleteFormField',
          array('itemField' => $d));
          }
         */
        // Reorder the items
        ModUtil::apiFunc('IWforms', 'admin', 'reorder', array('fid' => $fid));
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'field')));
    }

    /**
     * Modify the dependences of a field
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the field identity
     * @return:	A form needed to change the dependances
     */
    public function modifyFieldDependances($args) {
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $dep = FormUtil::getPassedValue('dep', isset($args['dep']) ? $args['dep'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get all field information
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $fid));
        if ($fields == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        if (!$confirm) {
            //put the field dependances into an array
            $dependances = explode('$$', substr($itemField['dependance'], 2, -1));
            foreach ($fields as $field) {
                $checked = (in_array($field['fndid'], $dependances)) ? 1 : 0;
                if ($field['fieldType'] != '8' &&
                        $field['fieldType'] <= '50') {
                    $fields_array[] = array('fieldName' => $field['fieldName'],
                        'fndid' => $field['fndid'],
                        'checked' => $checked);
                }
            }
            return $this->view->assign('item', $item)
                            ->assign('itemField', $itemField)
                            ->assign('fields', $fields_array)
                            ->fetch('IWforms_admin_form_fieldModifyDependances.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        $dependances = '$';
        foreach ($dep as $d) {
            $dependances .= '$' . $d . '$';
        }
        $items = array('dependance' => $dependances);
        if (ModUtil::apiFunc('IWforms', 'admin', 'editFormField', array('fndid' => $fndid, 'items' => $items))) {
            // Success
            LogUtil::registerStatus($this->__('Have changed the dependencies'));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'field')));
    }

    /**
     * edit the main information of a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the form identity
     * @return:	A form necessary to modify the form
     */
    public function edit($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $aio = FormUtil::getPassedValue('aio', isset($args['aio']) ? $args['aio'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //get all categories
        $categories = ModUtil::apiFunc('IWforms', 'user', 'getAllCategories');
        global $Intraweb;
        $multizk = (isset($GLOBALS['ZConfig']['Multisites']['multi']) && $GLOBALS['ZConfig']['Multisites']['multi'] == 1) ? 1 : 0;

        $filesFolder = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforms', 'attached');

        $languages = ZLanguage::getInstalledLanguages();
        $languagesArray = array();
        foreach ($languages as $lang) {
            $languagesArray[] = array('code' => $lang,
                'name' => ZLanguage::getLanguageName($lang),
            );
        }

        return $this->view->assign('cats', $categories)
                        ->assign('aio', $aio)
                        ->assign('item', $item)
                        ->assign('multizk', $multizk)
                        ->assign('filesFolder', $filesFolder)
                        ->assign('new', ModUtil::func('IWforms', 'user', 'makeTimeForm', $item['new']))
                        ->assign('caducity', ModUtil::func('IWforms', 'user', 'makeTimeForm', $item['caducity']))
                        ->assign('languages', $languagesArray)
                        ->fetch('IWforms_admin_form_definitionEdit.htm');
    }

    /**
     * update the form modifications
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the new information from the edition form
     * @return:	True if success and false otherwise
     */
    public function update($fid) {
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
        $returnURL = FormUtil::getPassedValue('returnURL', isset($args['returnURL']) ? $args['returnURL'] : '', 'POST');
        $filesFolder = FormUtil::getPassedValue('filesFolder', isset($args['filesFolder']) ? $args['filesFolder'] : '', 'POST');
        $lang = FormUtil::getPassedValue('lang', isset($args['lang']) ? $args['lang'] : '', 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        if ($new != "00/00/00" || $new == '') {
            $new = ModUtil::func('IWforms', 'user', 'makeTime', $new . '23:59:00');
        } else {
            $new = 0;
        }
        if ($caducity != "00/00/00" || $caducity == '') {
            $caducity = ModUtil::func('IWforms', 'user', 'makeTime', $caducity . '23:59:00');
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
            'allowCommentsModerated' => $allowCommentsModerated,
            'returnURL' => $returnURL,
            'filesFolder' => $filesFolder,
            'lang' => $lang,
        );
        if (ModUtil::apiFunc('IWforms', 'admin', 'editForm', array('fid' => $fid,
                    'items' => $items))) {
            // Success
            LogUtil::registerStatus($this->__('The main points of the form have been published successfully'));
        }
        if ($aio != null) {
            return System::redirect(ModUtil::url('IWforms', 'admin', 'infoForm', array('fid' => $fid)));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid)));
    }

    /**
     * edit the main information of a field
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the field identity
     * @return:	A form necessary to modify the field
     */
    public function editField($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'REQUEST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $fieldTypeTextArray = ModUtil::func('IWforms', 'admin', 'getFileTypeText');
        $fieldTypeText = $fieldTypeTextArray[$itemField['fieldType']];
        $publicFileURL = '<strong>' . System::getBaseUrl() . 'file.php?<br />file=' . ModUtil::getVar('IWforms', 'publicFolder') . '/<br />' . $this->__('Name_field') . '</strong>';
        $groups = array();
        if ($itemField['fieldType'] == 6) {
            //get all groups
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                        'plus' => $this->__('Choose a group...')));
        }
        return $this->view->assign('groups', $groups)
                        ->assign('item', $item)
                        ->assign('itemField', $itemField)
                        ->assign('fieldTypePlus', '-' . $itemField['fieldType'] . '-')
                        ->assign('fieldTypeText', $fieldTypeText)
                        ->assign('publicFileURL', $publicFileURL)
                        ->fetch('IWforms_admin_form_fieldEdit.htm');
    }

    /**
     * edit the main information of a field
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the field identity
     * @return:	A form necessary to modify the field
     */
    public function updateField($fid) {
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
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
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
        if (ModUtil::apiFunc('IWforms', 'admin', 'editFormField', array('fndid' => $fndid,
                    'items' => $items))) {
            // Success
            LogUtil::registerStatus($this->__('The field of the form has been published successfully'));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'field')));
    }

    /**
     * edit the module configuration
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	True if success and false otherwise
     */
    public function conf() {
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $attached = ModUtil::getVar('IWforms', 'attached');
        $directoriroot = ModUtil::getVar('IWmain', 'documentRoot');
        $newsColor = ModUtil::getVar('IWforms', 'newsColor');
        $viewedColor = ModUtil::getVar('IWforms', 'viewedColor');
        $completedColor = ModUtil::getVar('IWforms', 'completedColor');
        $validatedColor = ModUtil::getVar('IWforms', 'validatedColor');
        $fieldsColor = ModUtil::getVar('IWforms', 'fieldsColor');
        $contentColor = ModUtil::getVar('IWforms', 'contentColor');
        $publicFolder = ModUtil::getVar('IWforms', 'publicFolder');
        $noFolder = false;
        $noWriteable = false;
        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforms', 'attached')) ||
                ModUtil::getVar('IWforms', 'attached') == '') {
            $noFolder = true;
        } else {
            $noWriteable = (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforms', 'attached'))) ? true : false;
        }
        $noPublicFolder = false;
        $noPublicFolderWriteable = false;
        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforms', 'publicFolder')) ||
                ModUtil::getVar('IWforms', 'publicFolder') == '') {
            $noPublicFolder = true;
        } else {
            $noPublicFolderWriteable = (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforms', 'publicFolder')) ||
                    file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforms', 'publicFolder') . '/.locked')) ? true : false;
        }
        //get all categories
        $categories = ModUtil::apiFunc('IWforms', 'user', 'getAllCategories');
        $multizk = (isset($GLOBALS['ZConfig']['Multisites']['multi']) && $GLOBALS['ZConfig']['Multisites']['multi'] == 1) ? 1 : 0;
        return $this->view->assign('multizk', $multizk)
                        ->assign('noWriteable', $noWriteable)
                        ->assign('noPublicFolder', $noPublicFolder)
                        ->assign('noPublicFolderWriteable', $noPublicFolderWriteable)
                        ->assign('cats', $categories)
                        ->assign('attached', $attached)
                        ->assign('directoriroot', $directoriroot)
                        ->assign('newsColor', $newsColor)
                        ->assign('viewedColor', $viewedColor)
                        ->assign('completedColor', $completedColor)
                        ->assign('validatedColor', $validatedColor)
                        ->assign('fieldsColor', $fieldsColor)
                        ->assign('contentColor', $contentColor)
                        ->assign('publicFolder', $publicFolder)
                        ->assign('noFolder', $noFolder)
                        ->fetch('IWforms_admin_conf.htm');
    }

    /**
     * update the module options
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   with the new information from the edition form
     * @return:	True if success and false otherwise
     */
    public function updateConf($args) {
        $attached = FormUtil::getPassedValue('attached', isset($args['attached']) ? $args['attached'] : null, 'POST');
        $newsColor = FormUtil::getPassedValue('newsColor', isset($args['newsColor']) ? $args['newsColor'] : null, 'POST');
        $viewedColor = FormUtil::getPassedValue('viewedColor', isset($args['viewedColor']) ? $args['viewedColor'] : null, 'POST');
        $completedColor = FormUtil::getPassedValue('completedColor', isset($args['completedColor']) ? $args['completedColor'] : null, 'POST');
        $validatedColor = FormUtil::getPassedValue('validatedColor', isset($args['validatedColor']) ? $args['validatedColor'] : null, 'POST');
        $fieldsColor = FormUtil::getPassedValue('fieldsColor', isset($args['fieldsColor']) ? $args['fieldsColor'] : null, 'POST');
        $contentColor = FormUtil::getPassedValue('contentColor', isset($args['contentColor']) ? $args['contentColor'] : null, 'POST');
        $publicFolder = FormUtil::getPassedValue('publicFolder', isset($args['publicFolder']) ? $args['publicFolder'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        if (substr(ModUtil::getVar('IWmain', 'documentRoot'), strrpos(ModUtil::getVar('IWmain', 'documentRoot'), '/') + 1, strlen(ModUtil::getVar('IWmain', 'documentRoot'))) == $publicFolder) {
            LogUtil::registerError($this->__('The name of the directory of the files public is not valid because it matches the name of the home directory of files on the site.'));
            $publicFolder = '';
        }
        $this->setVar('attached', $attached)
                ->setVar('newsColor', $newsColor)
                ->setVar('viewedColor', $viewedColor)
                ->setVar('completedColor', $completedColor)
                ->setVar('validatedColor', $validatedColor)
                ->setVar('fieldsColor', $fieldsColor)
                ->setVar('contentColor', $contentColor)
                ->setVar('publicFolder', $publicFolder);
        LogUtil::registerStatus($this->__('Has changed the configuration of the module'));
        return System::redirect(ModUtil::url('IWforms', 'admin', 'conf'));
    }

    /**
     * show the all the form information
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   id of the form
     * @return:	The form information
     */
    public function infoForm($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }

        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }

        //get the form view
        $formView = ModUtil::func('IWforms', 'user', 'newItem', array('fid' => $fid,
                    'adminView' => 1));

        //get the form features
        $formDefinition = ModUtil::func('IWforms', 'admin', 'definition', array('fid' => $fid,
                    'adminView' => 1));

        //get the form groups
        $formGroups = ModUtil::func('IWforms', 'admin', 'groups', array('fid' => $fid,
                    'adminView' => 1));
        //get the form validators
        $formValidators = ModUtil::func('IWforms', 'admin', 'validators', array('fid' => $fid,
                    'adminView' => 1));

        return $this->view->assign('item', $item)
                        ->assign('formView', $formView)
                        ->assign('formDefinition', $formDefinition)
                        ->assign('formGroups', $formGroups)
                        ->assign('formValidators', $formValidators)
                        ->fetch('IWforms_admin_infoForm.htm');
    }

    /**
     * Show a form needed to create a new category
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return	The form category fields
     */
    public function addCat() {
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        return $this->view->fetch('IWforms_admin_addCat.htm');
    }

    /**
     * Create a new category
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the category information
     * @return	redirect the user to the configuration admin page
     */
    public function submitCat($args) {
        // get the parameters sended from the form
        $catName = FormUtil::getPassedValue('catName', isset($args['catName']) ? $args['nomtema'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        // create the new category
        $cid = ModUtil::apiFunc('IWforms', 'admin', 'createCat', array('catName' => $catName,
                    'description' => $description));
        if ($cid != false) {
            // Success
            LogUtil::registerStatus($this->__('New category created'));
        }
        // Redirect to the main site for the admin
        return System::redirect(ModUtil::url('IWforms', 'admin', 'conf'));
    }

    /**
     * Delete a category
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   with the group identity
     * @return:	True if success and false otherwise
     */
    public function deleteCat($args) {
        $cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getCategory', array('cid' => $cid));
        if ($item == false) {
            LogUtil::registerError($this->__('No such category found'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'conf'));
        }
        if (!$confirm) {
            return $this->view->assign('item', $item)
                            ->fetch('IWforms_admin_form_catDelete.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        if (ModUtil::apiFunc('IWforms', 'admin', 'deleteCat', array('cid' => $cid))) {
            LogUtil::registerStatus($this->__('Has deleted the category'));
        }
        return System::redirect(ModUtil::url('IWforms', 'admin', 'conf'));
    }

    /**
     * Give access to a form from where the category information can be edited
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the category id
     * @return	The category edit form
     */
    public function editCat($args) {
        // Get parameters from whatever input we need
        $cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
        if (!empty($objectid))
            $cid = $objectid;
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $item = ModUtil::apiFunc('IWforms', 'user', 'getCategory', array('cid' => $cid));
        if ($item == false) {
            LogUtil::registerError($this->__('No such category found'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'conf'));
        }
        return $this->view->assign('item', $item)
                        ->fetch('IWforms_admin_editCat.htm');
    }

    /**
     * Update a category information
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the arguments needed
     * @return	Redirect the user to the admin configuration page
     */
    public function updateCat($args) {
        // Get parameters from whatever input we need
        $cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
        $catName = FormUtil::getPassedValue('catName', isset($args['catName']) ? $args['catName'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        $updated = ModUtil::apiFunc('IWforms', 'admin', 'modifyCat', array('cid' => $cid,
                    'catName' => $catName,
                    'description' => $description));
        if ($updated != false) {
            // Success
            LogUtil::registerStatus($this->__('Has changed the category'));
        }
        // Return to admin pannel
        return System::redirect(ModUtil::url('IWforms', 'admin', 'conf'));
    }

    /**
     * Update a category information
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the arguments needed
     * @return	Redirect the user to the admin configuration page
     */
    public function changeOrder($args) {
        $f = FormUtil::getPassedValue('f', isset($args['f']) ? $args['f'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        foreach ($f as $key => $value) {
            $items = array('order' => $value);
            ModUtil::apiFunc('IWforms', 'admin', 'changeOrder', array('fndid' => $key,
                'order' => $value));
        }
        // Reorder the items
        ModUtil::apiFunc('IWforms', 'admin', 'reorder', array('fid' => $fid));
        return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                            'action' => 'field')));
    }

    /**
     * Copy a form definition and fields
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		form identity
     * @return:		Add a new form copied from another form. Redirect user to the new form edition
     */
    public function copy($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $newFormId = ModUtil::apiFunc('IWforms', 'admin', 'copy', array('fid' => $fid));
        if ($newFormId) {
            LogUtil::registerStatus($this->__('Has made a copy of the form. Edit the characteristics that create appropriate'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('do' => 'edit',
                                'fid' => $newFormId)));
        } else {
            LogUtil::registerError($this->__('There was an error in the copy of the forum'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
    }

    /**
     * Export a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		form identity
     * @return:		Create a file XML with the form characteristics
     */
    public function exportForm($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        // checks if the form have a folder directori and it is writeeable
        $filesFolder = ModUtil::getVar('IWmain', 'documentRoot') . "/" . ModUtil::getVar('IWforms', 'attached');
        if (!file_exists($filesFolder)) {
            LogUtil::registerError($this->__('Error! It is not possible to create the export file because the form folder defined in the module settings does not exist.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        if (!is_writable($filesFolder)) {
            LogUtil::registerError($this->__('Error! It is not possible to create the export file because the form folder defined in the module settings is not writable.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        // Gets module information
        $modid = ModUtil::getIdFromName('IWforms');
        $moduleInfo = ModUtil::getInfo($modid);
        $version = $moduleInfo['version'];
        // Get user
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userFullname = ModUtil::func('IWmain', 'user', 'getUserInfo', array('info' => 'ccn',
                    'uid' => UserUtil::getVar('uid'),
                    'sv' => $sv));
        //get form information
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($form == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $fid));
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
        $data = $dom->createCDATASection(System::getVar('sitename'));
        $item->appendChild($data);
        $item = $dom->createElement("sourceURL");
        $package->appendChild($item);
        $data = $dom->createTextNode(System::getBaseUrl());
        $item->appendChild($data);
        $item = $dom->createElement("creationDate");
        $package->appendChild($item);
        $data = $dom->createTextNode(date('d/m/Y - H.i', time()));
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
                if ($key == 'active')
                    $value = 0;
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
        $file = $filesFolder . '/exportForm' . date('dmY') . '.xml';
        $save = $dom->save($file);

        //Check that file has been created correctly
        if (!is_file($file)) {
            LogUtil::registerError($this->__('Error exporting file'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
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
        header($header);
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
    public function import($args) {
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if (!$confirm) {
            //Load the form to update the file
            // Create output object
            $view = Zikula_View::getInstance('IWforms', false);
            return $view->fetch('IWforms_admin_import.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        //gets the attached file array
        $fileName = $_FILES['import']['name'];
        $file_extension = strtolower(substr(strrchr($fileName, "."), 1));
        if ($file_extension != 'xml') {
            LogUtil::registerError($this->__('The import file is not correct. It need the xml extension'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //update file to the server
        // update the attached file to the server
        if ($fileName != '') {
            $folder = ModUtil::getVar('IWmain', 'tempFolder');
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                        'folder' => $folder,
                        'allow' => '|xml',
                        'file' => $_FILES['import'],
                        'fileName' => $fileName));
            //the function returns the error string if the update fails and and empty string if success
            if ($update['msg'] != '') {
                LogUtil::registerError($this->__('Error updating the import file to the server'));
                return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
            } else {
                $nom_fitxer = $update['fileName'];
            }
        }
        $xmlFile = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmain', 'tempFolder') . '/' . $nom_fitxer;
        //Create a dom instance
        $doc = new DOMDocument();
        if (!$doc->load($xmlFile)) {
            LogUtil::registerError($this->__('Error loading xml document.'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
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
        $create = ModUtil::apiFunc('IWforms', 'admin', 'createNewForm', array('formName' => $formName,
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
            LogUtil::registerError($this->__('The form creation has failt'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
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
            $createField = ModUtil::apiFunc('IWforms', 'admin', 'createFormFieldExport', array('fid' => $create,
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
                LogUtil::registerError($this->__('The form creation has failt'));
                return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
            }
        }
        LogUtil::registerStatus($this->__('The form has been imported correcty'));
        return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
    }

}