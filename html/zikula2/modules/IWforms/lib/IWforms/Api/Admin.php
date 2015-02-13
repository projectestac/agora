<?php

class IWforms_Api_Admin extends Zikula_AbstractApi {

    public function createNewForm($args) {
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
        $returnURL = FormUtil::getPassedValue('returnURL', isset($args['returnURL']) ? $args['returnURL'] : '', 'POST');
        $filesFolder = FormUtil::getPassedValue('filesFolder', isset($args['filesFolder']) ? $args['filesFolder'] : '', 'POST');
        $lang = $args['lang'];
        $defaultNumberOfNotes = $args['defaultNumberOfNotes'];
        $defaultOrderForNotes = $args['defaultOrderForNotes'];

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($formName)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
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
            'allowCommentsModerated' => $allowCommentsModerated,
            'returnURL' => $returnURL,
            'filesFolder' => $filesFolder,
            'lang' => $lang,
            'defaultNumberOfNotes' => $defaultNumberOfNotes,
            'defaultOrderForNotes' => $defaultOrderForNotes,
        );
        if (!DBUtil::insertObject($item, 'IWforms_definition', 'fid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return $item['fid'];
    }

    public function createFormField($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $fieldName = FormUtil::getPassedValue('fieldName', isset($args['fieldName']) ? $args['fieldName'] : null, 'POST');
        $fieldType = FormUtil::getPassedValue('fieldType', isset($args['fieldType']) ? $args['fieldType'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !isset($fieldName) || $fieldName == '' || !isset($fieldType) || $fieldType == 0) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $item = array('fid' => $fid,
            'fieldName' => $fieldName,
            'fieldType' => $fieldType,
        );
        if (!DBUtil::insertObject($item, 'IWforms_note_definition', 'fndid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return $item['fndid'];
    }

    public function createFormFieldSetEnd($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $dependance = FormUtil::getPassedValue('dependance', isset($args['dependance']) ? $args['dependance'] : null, 'POST');
        $fieldName = FormUtil::getPassedValue('fieldName', isset($args['fieldName']) ? $args['fieldName'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $item = array('fid' => $fid,
            'dependance' => '$$' . $dependance . '$',
            'fieldName' => $fieldName,
            'fieldType' => 100);
        if (!DBUtil::insertObject($item, 'IWforms_note_definition', 'fndid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return $item['fndid'];
    }

    public function addGroup($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');
        $validationNeeded = FormUtil::getPassedValue('validationNeeded', isset($args['validationNeeded']) ? $args['validationNeeded'] : null, 'POST');
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
        // Needed argument
        if (!isset($fid) || !isset($group) || !isset($accessType) || $accessType == 0) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $items = array('group' => $group,
            'subgroup' => $subgroup,
            'fid' => $fid,
            'accessType' => $accessType,
            'validationNeeded' => $validationNeeded);
        if (!DBUtil::insertObject($items, 'IWforms_group', 'gfid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return $items['gfid'];
    }

    public function addValidator($args) {

        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $validator = FormUtil::getPassedValue('validator', isset($args['validator']) ? $args['validator'] : null, 'POST');
        $validatorType = FormUtil::getPassedValue('validatorType', isset($args['validatorType']) ? $args['validatorType'] : null, 'POST');
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
        // Needed argument
        if (!isset($fid) || !isset($validator)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $items = array('validator' => $validator,
            'fid' => $fid,
            'validatorType' => $validatorType);
        if (!DBUtil::insertObject($items, 'IWforms_validator', 'rfid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return $items['rfid'];
    }

    public function deleteForm() {

        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        if (!DBUtil::deleteObjectByID('IWforms_definition', $fid, 'fid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWforms');
        $view->clear_cache(null, $fid);
        return true;
    }

    public function deleteFormFields($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $pntables = DBUtil::getTables();
        $c = $pntables['IWforms_note_definition_column'];
        $where = "$c[fid]=$fid";
        if (!DBUtil::deleteWhere('IWforms_note_definition', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    public function deleteFormGroups($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $pntables = DBUtil::getTables();
        $c = $pntables['IWforms_note_definition_column'];
        $where = "$c[fid]=$fid";
        if (!DBUtil::deleteWhere('IWforms_group', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    public function deleteFormValidators($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $pntables = DBUtil::getTables();
        $c = $pntables['IWforms_validator_column'];
        $where = "$c[fid]=$fid";
        if (!DBUtil::deleteWhere('IWforms_validator', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    public function deleteFormNotes($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $notes = ModUtil::apiFunc('IWforms', 'user', 'getAllNotes', array('fid' => $fid));
        $pntables = DBUtil::getTables();
        $c = $pntables['IWforms_note_column'];
        foreach ($notes as $note) {
            //Delete all the notes contents
            $where = "$c[fmid]=" . $note['fmid'];
            if (!DBUtil::deleteWhere('IWforms_note', $where)) {
                return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
            }
        }
        //delete all the files associated to notes
        //Delete the note main information
        $c = $pntables['IWforms_column'];
        $where = "$c[fid]=$fid";
        if (!DBUtil::deleteWhere('IWforms', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    public function deleteFormField($args) {
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'REQUEST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fndid) || !is_numeric($fndid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        if (!DBUtil::deleteObjectByID('IWforms_note_definition', $fndid, 'fndid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWforms');
        $view->clear_cache(null, $fndid);
        return true;
    }

    public function deleteGroup($args) {
        $gfid = FormUtil::getPassedValue('gfid', isset($args['gfid']) ? $args['gfid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($gfid) || !is_numeric($gfid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $itemGroup = ModUtil::apiFunc('IWforms', 'user', 'getGroup', array('gfid' => $gfid));
        if ($itemGroup == false) {
            LogUtil::registerError($this->__('Can not find the group'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                                'action' => 'group')));
        }
        if (!DBUtil::deleteObjectByID('IWforms_group', $gfid, 'gfid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWforms');
        $view->clear_cache(null, $gfid);
        return true;
    }

    public function deleteValidator($args) {
        $rfid = FormUtil::getPassedValue('rfid', isset($args['rfid']) ? $args['rfid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($rfid) || !is_numeric($rfid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $itemValidator = ModUtil::apiFunc('IWforms', 'user', 'getValidator', array('rfid' => $rfid));
        if ($itemValidator == false) {
            LogUtil::registerError($this->__('Can not find the group'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'form', array('fid' => $fid,
                                'action' => 'validators')));
        }
        if (!DBUtil::deleteObjectByID('IWforms_validator', $rfid, 'rfid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWforms');
        $view->clear_cache(null, $rfid);
        return true;
    }

    /**
     * Update the form main information in the database
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	form identity and values
     * @return:	true if success and false otherwise
     */
    public function editForm($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get form information
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_definition_column'];
        $where = "$c[fid] = $fid";
        if (!DBUTil::updateObject($items, 'IWforms_definition', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    public function editFormField($args) {
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
        $items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fndid) || !is_numeric($fndid) || !isset($items)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_definition_column'];
        $whereDep = '';
        if ($itemField['fieldType'] == 53) {
            $dependancesTo = ModUtil::apiFunc('IWforms', 'user', 'getFormFieldDependancesTo', array('fndid' => $fndid));
            foreach ($dependancesTo as $d) {
                $whereDep = " OR $c[fndid]=" . $d['fndid'];
            }
        }
        $where = "$c[fndid] = $fndid" . $whereDep;
        if (!DBUTil::updateObject($items, 'IWforms_note_definition', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * Reorder the fields
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the from identity
     * @return:	Redirect user to fields page
     */
    public function reorder($args) {
        // Get parameters from whatever input we need
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');
        if (!empty($objectid)) {
            $fid = $objectid;
        }
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get all field information
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $fid));
        if ($fields == false) {
            //LogUtil::registerError ($this->__('Could not find form'));
            //return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_definition_column'];
        $i = 0;
        // Reorder all the items with the values 0 20 40 60 80...
        foreach ($fields as $field) {
            $i = $i + 10;
            $where = "$c[fndid] = " . $field['fndid'];
            $items = array('order' => $i);
            if (!DBUTil::updateObject($items, 'IWforms_note_definition', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
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
    public function createCat($args) {
        $catName = FormUtil::getPassedValue('catName', isset($args['catName']) ? $args['catName'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        // Needed argument
        if (!isset($catName)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        // Optional argument
        if (!isset($description))
            $description = '';

        $item = array('catName' => $catName,
            'description' => $description);
        if (!DBUtil::insertObject($item, 'IWforms_cat', 'cid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
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
    public function deleteCat($args) {
        $cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        // Argument check
        if (!isset($cid) || !is_numeric($cid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        // Get the item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getCategory', array('cid' => $cid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }
        if (!DBUtil::deleteObjectByID('IWforms_cat', $cid, 'cid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWforms');
        $view->clear_cache(null, $cid);
        return true;
    }

    /**
     * Update a category from the database
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args	The id of the category and the information of the category
     * @return:	true if success and false if fails
     */
    public function modifyCat($args) {
        $cid = FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'POST');
        $catName = FormUtil::getPassedValue('catName', isset($args['catName']) ? $args['catName'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        // Needed argument
        if (!isset($cid) || !isset($catName)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        // Get the item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getCategory', array('cid' => $cid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }
        $items = array('catName' => $catName,
            'description' => $description);
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_cat_column'];
        $where = "$c[cid]=$cid";
        if (!DBUTil::updateObject($items, 'IWforms_cat', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * Change the fields order
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args	The fields identities
     * @return:	true if success and false if fails
     */
    public function changeOrder($args) {
        $fndid = FormUtil::getPassedValue('fndid', isset($args['fndid']) ? $args['fndid'] : null, 'POST');
        $order = FormUtil::getPassedValue('order', isset($args['order']) ? $args['order'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fndid) || !is_numeric($fndid) || !isset($order)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get field information
        $itemField = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($itemField == false) {
            LogUtil::registerError($this->__('Could not find form'));
        }
        $items = array('order' => $order);
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_definition_column'];
        if ($itemField['fieldType'] == 53) {
            $dependancesTo = ModUtil::apiFunc('IWforms', 'user', 'getFormFieldDependancesTo', array('fndid' => $fndid));
            foreach ($dependancesTo as $d) {
                $whereDep = " OR $c[fndid]=" . $d['fndid'];
            }
        }
        $where = "$c[fndid] = $fndid" . $whereDep;
        if (!DBUTil::updateObject($items, 'IWforms_note_definition', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * Collapse or extent the view in the fields admin page
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args	The id of forum and the expand or collapse value
     * @return:	true if success and false if fails
     */
    public function collexpand($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        $items = array('collapse' => $value);
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_definition_column'];
        $where = "$c[fid] = $fid";
        if (!DBUTil::updateObject($items, 'IWforms_note_definition', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * Copy a form properties and fields
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args	The id of forum
     * @return:	true if success and false if fails
     */
    public function copy($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //Get all field information
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $fid));
        if ($fields == false) {
            LogUtil::registerError($this->__('Could not find form fields, then it is not possible to copy the form'));
            return System::redirect(ModUtil::url('IWforms', 'admin', 'main'));
        }
        //copy form properties
        if (!DBUtil::insertObject($item, 'IWforms_definition', 'fid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        //copy form fields
        foreach ($fields as $field) {
            $field['fid'] = $item['fid'];
            if (!DBUTil::insertObject($field, 'IWforms_note_definition', 'fndid')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
        }
        // Return the id of the newly created item to the calling process
        return $item['fid'];
    }

    public function createFormFieldExport($args) {
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
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if (!isset($fid) || !isset($fieldName) || $fieldName == '' || !isset($fieldType) || $fieldType == 0) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
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
        if (!DBUtil::insertObject($item, 'IWforms_note_definition', 'fndid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return $item['fndid'];
    }

    public function getlinks($args) {
        $links = array();
        if (SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWforms', 'admin', 'create'), 'text' => $this->__('Create a new form'), 'id' => 'iwforms_create', 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('IWforms', 'admin', 'main'), 'text' => $this->__('Show the forms'), 'id' => 'iwforms_view', 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('IWforms', 'admin', 'import'), 'text' => $this->__('Import a form'), 'id' => 'iwforms_import', 'class' => 'z-icon-es-import');
            $links[] = array('url' => ModUtil::url('IWforms', 'admin', 'conf'), 'text' => $this->__('Configure the module'), 'id' => 'iwforms_conf', 'class' => 'z-icon-es-config');
        }
        return $links;
    }

}
