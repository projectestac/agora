<?php

class IWforms_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    /**
     * Change the users in select list
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function chgUsers($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $gid = $this->request->getPost()->get('gid', '');
        if (!$gid) {
            throw new Zikula_Exception_Fatal($this->__('no group id'));
        }
        // get group members
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                    'gid' => $gid));
        asort($groupMembers);
        if (empty($groupMembers)) {
            throw new Zikula_Exception_Fatal($this->__('unable to get group members or group is empty for gid=' . DataUtil::formatForDisplay($gid)));
        }
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('groupMembers', $groupMembers);
        $view->assign('action', 'chgUsers');
        $content = $view->fetch('IWforms_admin_ajax.htm');
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * Change the characteristics of a field definition
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the field and the value to change
     * @return:	the field row new value in database
     */
    public function modifyField($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fndid = $this->request->getPost()->get('fndid', '');
        if (!$fndid) {
            throw new Zikula_Exception_Fatal($this->__('no field id'));
        }
        $charx = $this->request->getPost()->get('charx', '');
        if (!$charx) {
            throw new Zikula_Exception_Fatal($this->__('no char defined'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find form'));
        }
        if ($charx == "accessType") {
            $value = $itemField[$charx] + 1;
            if ($value >= 3) {
                $value = 0;
            }
        } else {
            $value = ($itemField[$charx]) ? 0 : 1;
        }
        //change value in database
        $items = array($charx => $value);
        if (!ModUtil::apiFunc('IWforms', 'admin', 'editFormField', array('fndid' => $fndid,
                    'items' => $items))) {
            throw new Zikula_Exception_Fatal($this->__('Error'));
        }
        return new Zikula_Response_Ajax(array('fndid' => $fndid,
                ));
    }

    /**
     * Change the characteristics of a field definition
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the field and the value to change
     * @return:	the field row new value in database
     */
    public function changeContent($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fndid = $this->request->getPost()->get('fndid', '');
        if (!$fndid) {
            throw new Zikula_Exception_Fatal($this->__('no field id'));
        }
        $groupName = '';
        //Get field information
        $field = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($field == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find form'));
        }
        if ($field['gid'] > 0) {
            $group = ModUtil::apiFunc('Groups', 'user', 'get', array('gid' => $field['gid']));
            $groupName = $group['name'];
        }
        $fieldTypeTextArray = ModUtil::func('IWforms', 'admin', 'getFileTypeText');
        $fields_array = array('fndid' => $field['fndid'],
            'fieldName' => $field['fieldName'],
            'feedback' => $field['feedback'],
            'fieldTypePlus' => '-' . $field['fieldType'] . '-',
            'active' => $field['active'],
            'description' => $field['description'],
            'required' => $field['required'],
            'order' => $field['order'],
            'validationNeeded' => $field['validationNeeded'],
            'notify' => $field['notify'],
            'dependance' => str_replace('$$', ',', substr($field['dependance'], 2, -1)),
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
            'searchable' => $field['searchable'],
            'group' => $groupName,
            'extensions' => $field['extensions'],
            'imgWidth' => $field['imgWidth'],
            'imgHeight' => $field['imgHeight']);
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('field', $fields_array);
        $content = $view->fetch('IWforms_admin_form_fieldCharContent.htm');
        return new Zikula_Response_Ajax(array('content' => $content,
                    'fndid' => $fndid,
                ));
    }

    /**
     * Close/open a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the form that must be closed
     * @return:	Form new state
     */
    public function closeForm($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        //Get item
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($form == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find form'));
        }
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] < 7) {
            throw new Zikula_Exception_Fatal($this->__('You do not have access to manage form'));
        }
        $close = ModUtil::apiFunc('IWforms', 'user', 'closeInsert', array('fid' => $fid));
        //check user access to this form
        if ($close == false) {
            throw new Zikula_Exception_Fatal($this->__('There was an error in the modified form'));
        }
        $closeInserValue = ($form['closeInsert'] == 0) ? 1 : 0;
        $form_array = array('formName' => $form['formName'],
            'title' => $form['title'],
            'accessLevel' => $access['level'],
            'closeableInsert' => $form['closeableInsert'],
            'closeInsert' => $closeInserValue,
            'defaultValidation' => $access['defaultValidation'],
            'fid' => $form['fid']);
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('form', $form_array);
        $content = $view->fetch('IWforms_user_mainOptions.htm');
        $text = ($form['closeInsert'] == 0) ? $this->__('Has closed input data on the form') : $this->__('Has opened input data on the form');
        return new Zikula_Response_Ajax(array('content' => $content,
                    'text' => $text,
                    'fid' => $fid,
                ));
    }

    /**
     * Close/open a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the form that must be closed
     * @return:	Form new state
     */
    public function deleteNote($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fmid = $this->request->getPost()->get('fmid', '');
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }
        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));
        //Get form fields
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $note['fid']));
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            throw new Zikula_Exception_Fatal($this->__('You do not have access to manage form'));
        }
        // get form
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $note['fid']));

        foreach ($fields as $field) {
            if ($field['fieldType'] == '7') {
                $noteContent = ModUtil::apiFunc('IWforms', 'user', 'getAllNoteContents', array('fid' => $note['fid'],
                            'fmid' => $note['fmid']));
                if ($noteContent[$field['fndid']]['content'] != '') {
                    if ($form['filesFolder'] == '') {
                        $folder = ($field['publicFile'] != 1) ? ModUtil::getVar('IWforms', 'attached') : ModUtil::getVar('IWforms', 'publicFolder');
                    } else {
                        $folder = ModUtil::getVar('IWforms', 'attached') . '/' . $form['filesFolder'];
                    }
                    $file = ModUtil::getVar('IWmain', 'documentRoot') . '/' . $folder . '/' . $noteContent[$field['fndid']]['content'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            }
        }
        if (!ModUtil::apiFunc('IWforms', 'user', 'deleteNote', array('fmid' => $fmid))) {
            throw new Zikula_Exception_Fatal($this->__('There was an error to remove the annotation'));
        }
        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                ));
    }

    /**
     * Define a note as marked or unmarked
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function markNote($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fmid = $this->request->getPost()->get('fmid', ''); // In this case must be GET otherwise the reloadFlaggedBlock() does not work in response
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }
        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            throw new Zikula_Exception_Fatal($this->__('You do not have access to manage form'));
        }
        //Change the flagged atributes for the user
        $mark = ModUtil::apiFunc('IWforms', 'user', 'markNote', array('fmid' => $fmid));
        //check user access to this form
        if ($mark == false) {
            throw new Zikula_Exception_Fatal($this->__('There was an error in the modified form'));
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_flagged',
            'name' => 'have_flags',
            'value' => 'fr',
            'sv' => $sv));

        //print 'dd';die();

        $userName = ($note['annonimous'] == 0) ? UserUtil::getVar('uname', $note['user']) : '';
        $marked = ($mark == 'marked') ? 1 : 0;

        $modid = ModUtil::getIdFromName('IWmessages');
        $modinfo = ModUtil::getInfo($modid);
        $IWmessages = ($modinfo['state'] != 3) ? false : true;

        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('note', array('fmid' => $fmid,
            'marked' => $marked,
            'state' => $note['state'],
            'userName' => $userName,
            'validate' => $note['validate']));
        $view->assign('IWmessages', $IWmessages);
        $view->assign('fid', $note['fid']);
        $contentOptions = $view->fetch('IWforms_user_manageNoteContentOptions.htm');
        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                    'mark' => $mark,
                    'contentOptions' => $contentOptions,
                ));
    }

    /**
     * Set a note as completed or uncompleted
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function setCompleted($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fmid = $this->request->getPost()->get('fmid', '');
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }
        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            throw new Zikula_Exception_Fatal($this->__('You do not have access to manage form'));
        }
        //Change the flagged atributes for the user
        $state = ModUtil::apiFunc('IWforms', 'user', 'changeState', array('fmid' => $fmid));
        //check user access to this form
        if ($state == false) {
            throw new Zikula_Exception_Fatal($this->__('There was an error in the modified form'));
        }
        $stateValue = ($state == 'completed') ? 1 : 0;
        $note['state'] = $stateValue;
        $userName = ($note['annonimous'] == 0) ? UserUtil::getVar('uname', $note['user']) : '';

        $modid = ModUtil::getIdFromName('IWmessages');
        $modinfo = ModUtil::getInfo($modid);
        $IWmessages = ($modinfo['state'] != 3) ? false : true;

        $marked = (strpos($note['mark'], '$' . UserUtil::getVar('uid') . '$') !== false) ? 1 : 0;
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('note', array('fmid' => $fmid,
            'marked' => $marked,
            'state' => $stateValue,
            'userName' => $userName,
            'validate' => $note['validate']));
        $view->assign('IWmessages', $IWmessages);
        $view->assign('fid', $note['fid']);
        $contentOptions = $view->fetch('IWforms_user_manageNoteContentOptions.htm');
        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                    'color' => ModUtil::func('IWforms', 'user', 'calcColor', array('validate' => $note['validate'],
                        'state' => $note['state'],
                        'viewed' => $note['viewed'])),
                    'contentOptions' => $contentOptions,
                ));
    }

    /**
     * validate a note
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function validateNote($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fmid = $this->request->getPost()->get('fmid', '');
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }
        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            throw new Zikula_Exception_Fatal($this->__('You do not have access to manage form'));
        }
        //Change the flagged atributes for the user
        $state = ModUtil::apiFunc('IWforms', 'user', 'validateNote', array('fmid' => $fmid));
        if ($state == false) {
            throw new Zikula_Exception_Fatal($this->__('There was an error in the modified form'));
        }
        $validate = ($note['validate'] == 1) ? 0 : 1;
        $note['validate'] = $validate;
        $userName = ($note['annonimous'] == 0) ? UserUtil::getVar('uname', $note['user']) : '';
        $marked = (strpos($note['mark'], '$' . UserUtil::getVar('uid') . '$') !== false) ? 1 : 0;
        $view = Zikula_View::getInstance('IWforms', false);
        $modid = ModUtil::getIdFromName('IWmessages');
        $modinfo = ModUtil::getInfo($modid);
        $IWmessages = ($modinfo['state'] != 3) ? false : true;
        $view->assign('note', array('fmid' => $fmid,
            'marked' => $marked,
            'state' => $note['state'],
            'userName' => $userName,
            'validate' => $note['validate']));
        $view->assign('IWmessages', $IWmessages);
        $view->assign('fid', $note['fid']);
        $contentOptions = $view->fetch('IWforms_user_manageNoteContentOptions.htm');
        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                    'color' => ModUtil::func('IWforms', 'user', 'calcColor', array('validate' => $note['validate'],
                        'state' => $note['state'])),
                    'contentOptions' => $contentOptions,
                ));
    }

    /**
     * Edit the notes observations or the answares to writers
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Show the observations or renotes contents forms
     */
    public function editNoteManageContent($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        // in the case of editing the content of a note the parameter fmid refers to fnid
        $fmid = $this->request->getPost()->get('fmid', '');
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }
        $toDo = $this->request->getPost()->get('toDo', '');
        if (!$toDo) {
            throw new Zikula_Exception_Fatal($this->__('no action defined'));
        }
        if ($toDo == 'content') {
            $fnid = $fmid;
            $noteContent = ModUtil::apiFunc('IWforms', 'user', 'getNoteContent', array('fnid' => $fnid));
            if ($noteContent === false) {
                throw new Zikula_Exception_Fatal($this->__('For some reason it is not possible to edit the field\'s content.'));
            }
            if ($noteContent['editable'] != 1) {
                throw new Zikula_Exception_Fatal($this->__('You can not edit this note.'));
            }
            $fmid = $noteContent['fmid'];
        }
        // in the case of editing the content of a note the parameter fmid refers to fnid
        // get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            throw new Zikula_Exception_Fatal($this->__('You do not have access to manage form'));
        }
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('do', 'edit');
        if ($toDo == 'observations') {
            $view->assign('note', $note);
            $content = $view->fetch('IWforms_user_manageNoteContentObs.htm');
        }
        if ($toDo == 'renote') {
            $view->assign('note', $note);
            //get form definition
            $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $note['fid']));
            if ($form == false) {
                LogUtil::registerError($this->__('Could not find form'));
                return false;
            }
            $view->assign('form', $form);
            $content = $view->fetch('IWforms_user_manageNoteContentRenote.htm');
        }
        if ($toDo == 'content') {
            $fmid = $fnid;
            $view->assign('noteContent', $noteContent);
            $content = $view->fetch('IWforms_user_manageNoteContentEdit.htm');
        }

        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                    'content' => $content,
                    'toDo' => $toDo,
                ));
    }

    /**
     * update the notes observations or the answares to writers
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Change the observations or renotes contents
     */
    public function submitValue($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fmid = $this->request->getPost()->get('fmid', '');
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }
        $toDo = $this->request->getPost()->get('toDo', '');
        if (!$toDo) {
            throw new Zikula_Exception_Fatal($this->__('no action defined'));
        }
        $value = FormUtil::getPassedValue('value', -1, 'POST');
        if (!$value) {
            throw new Zikula_Exception_Fatal($this->__('no value defined'));
        }

        // in the case of editing the content of a note the parameter fmid refers to fnid
        if ($toDo == 'content') {
            $fnid = $fmid;
            $noteContent = ModUtil::apiFunc('IWforms', 'user', 'getNoteContent', array('fnid' => $fnid));
            if ($noteContent === false) {
                throw new Zikula_Exception_Fatal($this->__('For some reason it is not possible to edit the field\'s content.'));
            }
            $fmid = $noteContent['fmid'];
        }
        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            throw new Zikula_Exception_Fatal($this->__('You do not have access to manage form'));
        }
        if ($toDo == 'content') {
            $submited = ModUtil::apiFunc('IWforms', 'user', 'submitContentValue', array('value' => $value,
                        'fmid' => $fmid,
                        'fnid' => $fnid,
                        'toDo' => $toDo));
        } else {
            //submit values
            $submited = ModUtil::apiFunc('IWforms', 'user', 'submitValue', array('value' => $value,
                        'fmid' => $fmid,
                        'toDo' => $toDo));
        }
        if ($submited == false) {
            throw new Zikula_Exception_Fatal($this->__('There was an error in the modified form'));
        }

        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('do', 'print');
        if ($toDo == 'observations') {
            $note['observations'] = $value;
            $view->assign('note', $note);
            $content = $view->fetch('IWforms_user_manageNoteContentObs.htm');
        }
        if ($toDo == 'renote') {
            $checked = FormUtil::getPassedValue('checked', -1, 'POST');
            $note['renote'] = $value;
            $view->assign('note', $note);
            $content = $view->fetch('IWforms_user_manageNoteContentRenote.htm');
            $modid = ModUtil::getIdFromName('IWmessages');
            $modinfo = ModUtil::getInfo($modid);
            if ($checked == 'true' && $modinfo['state'] == 3 && $note['annonimous'] == 0) {
                $view->assign('fmid', $fmid);
                $noteOrigen = $view->fetch('IWforms_user_origenNote.htm');

                // set copy whit a private message to user
                ModUtil::apiFunc('IWmessages', 'user', 'create', array('image' => '',
                    'subject' => $this->__('Forms: automatic message'),
                    'to_userid' => $note['user'],
                    'message' => nl2br($note['renote'] . $noteOrigen),
                    'reply' => '',
                    'file1' => '',
                    'file2' => '',
                    'file3' => ''));
            }
        }
        if ($toDo == 'content') {
            $view->assign('value', $value);
            $view->assign('fnid', $fnid);
            $fmid = $fnid;
            $content = $view->fetch('IWforms_user_manageNoteContentEdit.htm');
        }
        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                    'content' => $content,
                    'toDo' => $toDo,
                ));
    }

    /**
     * Change the characteristics of a form definition
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the field and the value to change
     * @return:	the form new value in database
     */
    public function modifyForm($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        $charx = $this->request->getPost()->get('charx', '');
        if (!$charx) {
            throw new Zikula_Exception_Fatal($this->__('no char defined'));
        }
        //Get form information
        $itemForm = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($itemForm == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find form'));
        }
        $value = ($itemForm[$charx]) ? 0 : 1;
        //change value in database
        $items = array($charx => $value);
        if (!ModUtil::apiFunc('IWforms', 'admin', 'editForm', array('fid' => $fid,
                    'items' => $items))) {
            throw new Zikula_Exception_Fatal($this->__('Error'));
        }
        return new Zikula_Response_Ajax(array('fid' => $fid,
                ));
    }

    /**
     * Change the characteristics of a field definition
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the field and the value to change
     * @return:	the field row new value in database
     */
    public function changeFormContent($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        //Get field information
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($form == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find form'));
        }
        $view = Zikula_View::getInstance('IWforms', false);
        $form['new'] = ModUtil::func('IWforms', 'user', 'makeTimeForm', $form['new']);
        $form['caducity'] = ModUtil::func('IWforms', 'user', 'makeTimeForm', $form['caducity']);
        $view->assign('form', $form);
        $content = $view->fetch('IWforms_admin_formChars.htm');
        return new Zikula_Response_Ajax(array('content' => $content,
                    'fid' => $fid,
                ));
    }

    /**
     * set as deleted by user
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function deleteUserNote($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fmid = $this->request->getPost()->get('fmid', '');
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }
        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));
        //check user access to this note
        if ($note['user'] != UserUtil::getVar('uid')) {
            throw new Zikula_Exception_Fatal($this->__('You do not have access to manage form'));
        }
        //Change the deleted atributes for the user
        $state = ModUtil::apiFunc('IWforms', 'user', 'deleteUserNote', array('fmid' => $fmid));
        if ($state == false) {
            throw new Zikula_Exception_Fatal($this->__('There was an error in the modified form'));
        }
        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                ));
    }

    public function changeFilter($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        $filter = $this->request->getPost()->get('filter', '');
        if (!$filter) {
            throw new Zikula_Exception_Fatal($this->__('no filter id'));
        }
        //get form fields
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $fid,
                    'whereArray' => 'active|1$$searchable|1'));
        $filterType = 0;
        switch ($fields[$filter]['fieldType']) {
            case 6:
                $options = explode('-', $fields[$filter]['options']);
                $optionsArray = array();
                foreach ($options as $option) {
                    $optionsArray[$option] = $option;
                }
                if ($fields[$filter]['gid'] > 0) {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $members = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                                'gid' => $fields[$filter]['gid'],
                                'onlyId' => 1));
                    if (count($members) > 0) {
                        $usersList = '$$';
                        foreach ($members as $member) {
                            $usersList .= $member['id'] . '$$';
                        }
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $users1 = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ccn',
                                    'sv' => $sv,
                                    'list' => $usersList));
                        asort($users1);
                        foreach ($users1 as $user) {
                            $optionsArray[$user] = $user;
                        }
                    }
                }
                $items = $optionsArray;
                break;
            case 8:
                $optionsArray[$this->__('No')] = $this->__('No');
                $optionsArray[$this->__('Yes')] = $this->__('Yes');
                $items = $optionsArray;
                break;
            default:
                $filterType = 1;
                $filterValue = $filterValue;
        }
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('items', $optionsArray);
        $view->assign('fid', $fid);
        $view->assign('filter', 1);
        $view->assign('filterType', $filterType);
        $filterContent = $view->fetch('IWforms_user_manageFilter.htm');
        $view->assign('total', 0);
        $content = $view->fetch('IWforms_user_manageAllNotesContent.htm');
        return new Zikula_Response_Ajax(array('filterContent' => $filterContent,
                    'content' => $content,
                    'toDo' => $toDo,
                ));
    }

    public function deleteForm($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        //delete the form fields
        if (!ModUtil::apiFunc('IWforms', 'admin', 'deleteFormFields', array('fid' => $fid))) {
            throw new Zikula_Exception_Fatal($this->__('Has been removed the fields of the form'));
        }
        //delete the form groups
        if (!ModUtil::apiFunc('IWforms', 'admin', 'deleteFormGroups', array('fid' => $fid))) {
            throw new Zikula_Exception_Fatal($this->__('Has been removed the groups of the form'));
        }
        //delete the form validators
        if (!ModUtil::apiFunc('IWforms', 'admin', 'deleteFormValidators', array('fid' => $fid))) {
            throw new Zikula_Exception_Fatal($this->__('Has been removed the validators of the form'));
        }
        //delete the form notes
        if (!ModUtil::apiFunc('IWforms', 'admin', 'deleteFormNotes', array('fid' => $fid))) {
            throw new Zikula_Exception_Fatal($this->__('Dropped the annotations of the form'));
        }
        //delete the form
        if (!ModUtil::apiFunc('IWforms', 'admin', 'deleteForm', array('fid' => $fid))) {
            throw new Zikula_Exception_Fatal($this->__('Has been removed form'));
        }
        return new Zikula_Response_Ajax(array('fid' => $fid,
                ));
    }

    public function deleteFormField($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        $fndid = $this->request->getPost()->get('fndid', '');
        if (!$fndid) {
            throw new Zikula_Exception_Fatal($this->__('no field id'));
        }
        //Check if there are other fields that depens on it. In this case the field can't be deleted
        $dependancesTo = ModUtil::apiFunc('IWforms', 'user', 'getFormFieldDependancesTo', array('fndid' => $fndid));
        if ($dependancesTo) {
            throw new Zikula_Exception_Fatal($this->__('no possible'));
        }
        if (!ModUtil::apiFunc('IWforms', 'admin', 'deleteFormField', array('itemField' => $fndid))) {
            throw new Zikula_Exception_Fatal($this->__('Error'));
        }
        // Reorder the items
        ModUtil::apiFunc('IWforms', 'admin', 'reorder', array('fid' => $fid));

        return new Zikula_Response_Ajax(array('fndid' => $fndid,
                ));
    }

    public function createField($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        $fieldType = $this->request->getPost()->get('fieldType', '');
        if (!$fieldType) {
            throw new Zikula_Exception_Fatal($this->__('no field type'));
        }
        $createField = ModUtil::apiFunc('IWforms', 'admin', 'createFormField', array('fid' => $fid,
                    'fieldType' => $fieldType,
                    'fieldName' => $this->__('Field name')));
        if (!$createField) {
            throw new Zikula_Exception_Fatal($this->__('creation error'));
        }
        ModUtil::apiFunc('IWforms', 'admin', 'reorder', array('fid' => $fid));
        //If field type is fileset create a fieldset end field </fieldset> and edit it
        if ($fieldType == 53) {
            $createFieldSetEnd = ModUtil::apiFunc('IWforms', 'admin', 'createFormFieldSetEnd', array('fid' => $fid,
                        'dependance' => $createField,
                        'fieldName' => $this->__('Final box')));
        }
        $content = ModUtil::func('IWforms', 'admin', 'editField', array('fid' => $fid,
                    'fndid' => $createField));
        return new Zikula_Response_Ajax(array('fid' => $fid,
                    'content' => $content,
                ));
    }

    public function newField($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        $content = ModUtil::func('IWforms', 'admin', 'createField', array('fid' => $fid));
        return new Zikula_Response_Ajax(array('fid' => $fid,
                    'content' => $content,
                ));
    }

    public function actionToDo($args) {
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }
        $action = FormUtil::getPassedValue('action', -1, 'POST');
        if ($action == -1) {
            throw new Zikula_Exception_Fatal($this->__('no action defined id'));
        }
        switch ($action) {
            case 'validators':
                $content = ModUtil::func('IWforms', 'admin', 'validators', array('fid' => $fid));
                $tabContent = ModUtil::func('IWforms', 'admin', 'minitab', array('tab' => 4));
                break;
            case 'group':
                $content = ModUtil::func('IWforms', 'admin', 'groups', array('fid' => $fid));
                $tabContent = ModUtil::func('IWforms', 'admin', 'minitab', array('tab' => 3));
                break;
            case 'field':
                $content = ModUtil::func('IWforms', 'admin', 'field', array('fid' => $fid));
                $tabContent = ModUtil::func('IWforms', 'admin', 'minitab', array('tab' => 2));
                break;
            case 'edit':
                $content = ModUtil::func('IWforms', 'admin', 'edit', array('fid' => $fid));
                $tabContent = ModUtil::func('IWforms', 'admin', 'minitab', array('tab' => 1));
                break;
        }
        return new Zikula_Response_Ajax(array('tabContent' => $tabContent,
                    'content' => $content,
                ));
    }

    /**
     * Change the characteristics of a expert mode edition view
     * @author:  Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   identity of the form
     * @return:	 The expert mode content
     */
    public function expertModeActivation($args) {

        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no form id'));
        }

        $expertMode = $this->request->getPost()->get('expertMode', '');
        $skinByTemplate = $this->request->getPost()->get('skinByTemplate', '');
        
        //Get field information
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($form == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find form'));
        }
        $form['expertMode'] = $expertMode;
        $form['skinByTemplate'] = $skinByTemplate;
        
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('item', $form);
        $content = $view->fetch('IWforms_admin_form_definitionExpertMode.htm');

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

}