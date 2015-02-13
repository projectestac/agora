<?php

class IWforms_Api_User extends Zikula_AbstractApi {

    public function getFormDefinition($args) {
        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $sv = (isset($args['sv'])) ? $args['sv'] : null;

        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
                throw new Zikula_Exception_Forbidden();
            }
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $items = DBUtil::selectObjectByID('IWforms_definition', $fid, 'fid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    public function getAllForms($args) {
        $user = (isset($args['user'])) ? $args['user'] : null;
        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $sv = (isset($args['sv'])) ? $args['sv'] : null;

        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
                throw new Zikula_Exception_Forbidden();
            }
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_definition_column'];
        $where = '';
        if ($user != null)
            $where .= "$c[active]=1";
        if ($fid != null)
            $where .= " AND $c[fid]=$fid";

        // get user lang
        $lang = ZLanguage::getLanguageCode();
        if (!isset($args['allLangs'])) {
            $where .= ($where == '') ? "$c[lang]='$lang' OR $c[lang] = ''" : " AND ($c[lang]='$lang' OR $c[lang] = '')";
        }

        $orderby = "$c[formName]";
        $items = DBUtil::selectObjectArray('IWforms_definition', $where, $orderby, '-1', '-1', 'fid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    public function getAllFormFields($args) {
        $whereArray = (isset($args['whereArray'])) ? $args['whereArray'] : null;
        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        $where = '';
        if ($item == false) {
            return LogUtil::registerError($this->__('Could not find form'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_definition_column'];
        if ($whereArray != null) {
            $values = explode('$$', $whereArray);
            foreach ($values as $v) {
                $parts = explode("|", $v);
                $field = $parts[0];
                $value = $parts[1];
                $where .= " AND $c[$field]=$value";
            }
        }
        $orderby = "$c[order]";
        $where = "$c[fid]=$fid " . $where;
        $items = DBUtil::selectObjectArray('IWforms_note_definition', $where, $orderby, '-1', '-1', 'fndid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function getAllGroups($args) {
        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $sv = (isset($args['sv'])) ? $args['sv'] : null;

        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
                throw new Zikula_Exception_Forbidden();
            }
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Get item
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid,
                    'sv' => $sv));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return false;
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_group_column'];

        $orderby = "$c[gfid]";
        $where = "$c[fid]=$fid";

        $items = DBUtil::selectObjectArray('IWforms_group', $where, $orderby, '-1', '-1', 'gfid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function getGroupsUserAccess($args) {
        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $accessGroupsString = (isset($args['accessGroupsString'])) ? $args['accessGroupsString'] : null;
        $sv = (isset($args['sv'])) ? $args['sv'] : null;

        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
                throw new Zikula_Exception_Forbidden();
            }
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid) || $accessGroupsString == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $whereGroup = '';
        $canWrite = 0;
        $canRead = 0;
        $canReadAndWrite = 0;
        $validationNeeded = array();

        $accessGroupsString = substr($accessGroupsString, 2, -1);

        $groups = explode('$$', $accessGroupsString);

        //Get item
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid,
                    'sv' => $sv));
        if ($item == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return false;
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_group_column'];

        //get the access of the user as a group
        //create a where string to select the groups
        foreach ($groups as $group) {
            $whereGroup = "$c[group]=" . $group . ' OR ';
        }
        $whereGroup = substr($whereGroup, 0, '-3');

        $orderby = "$c[accessType] desc";
        $where = "$c[fid]=$fid AND (" . $whereGroup . ")";

        $items = DBUtil::selectObjectArray('IWforms_group', $where, $orderby, '-1', '-1', 'gfid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        foreach ($items as $item) {
            if ($item['accessType'] == 1)
                $canWrite = 1;
            if ($item['accessType'] == 2)
                $canRead = 2;
            if ($item['accessType'] == 3)
                $canReadAndWrite = 3;
        }

        $accessType = $canWrite + $canRead + $canReadAndWrite;
        $accessType = ($accessType > 3) ? 3 : $accessType;

        $orderby = "$c[validationNeeded]";
        $where .= " AND ($c[accessType]=1 OR $c[accessType]=3)";

        //make another request to know if validation is needed for this user
        $items = DBUtil::selectObjectArray('IWforms_group', $where, $orderby, '0', '1', 'gfid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        foreach ($items as $item) {
            $validationNeeded = $item['validationNeeded'];
        }

        // Return the items
        return array('validationNeeded' => $validationNeeded,
            'accessType' => $accessType);
    }

    public function getAllValidators($args) {
        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            return LogUtil::registerError($this->__('Could not find form'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_validator_column'];

        $orderby = "$c[validator]";
        $where = "$c[fid]=$fid";

        $items = DBUtil::selectObjectArray('IWforms_validator', $where, $orderby, '-1', '-1', 'rfid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Check if an user is validator of a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   with the form identity
     * @return:	A value with the validation information
     * 		0 - Can't validate
     * 		1 - Can validate only some fields
     * 		2 - Can validate all the fields
     */
    public function isValidator($args) {
        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $uid = (isset($args['uid'])) ? $args['uid'] : null;
        $sv = (isset($args['sv'])) ? $args['sv'] : null;

        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
                return LogUtil::registerPermissionError();
            }
        } else
            $requestByCron = true;

        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        if (!UserUtil::isLoggedIn())
            return 0;

        if ($uid != UserUtil::getVar('uid') && !$requestByCron)
            return 0;

        //get the fields where there are dependances on this field
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_validator_column'];

        $orderby = "$c[validatorType]";
        $where = "$c[fid]=$fid AND $c[validator]=$uid";

        $items = DBUtil::selectObjectArray('IWforms_validator', $where, $orderby, '0', '1', 'rfid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        $return = 0;
        foreach ($items as $item) {
            $return = ($item['validatorType'] != 0) ? 1 : 2;
        }

        return $return;
    }

    public function getFormField($args) {
        $fndid = (isset($args['fndid'])) ? $args['fndid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fndid == null || !is_numeric($fndid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $items = DBUtil::selectObjectByID('IWforms_note_definition', $fndid, 'fndid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    public function getGroup($args) {

        $gfid = (isset($args['gfid'])) ? $args['gfid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($gfid == null || !is_numeric($gfid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $items = DBUtil::selectObjectByID('IWforms_group', $gfid, 'gfid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    public function getvalidator($args) {

        $rfid = (isset($args['rfid'])) ? $args['rfid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($rfid == null || !is_numeric($rfid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $items = DBUtil::selectObjectByID('IWforms_validator', $rfid, 'rfid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function getFormFieldDependancesTo($args) {
        $fndid = (isset($args['fndid'])) ? $args['fndid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fndid == null || !is_numeric($fndid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormField', array('fndid' => $fndid));
        if ($item == false) {
            return LogUtil::registerError($this->__('Can not find the form field'));
        }

        //get the fields where there are dependances on this field
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_definition_column'];

        $orderby = "$c[fndid]";
        $where = "$c[dependance] like '%$" . $fndid . "$%'";

        $items = DBUtil::selectObjectArray('IWforms_note_definition', $where, $orderby, '-1', '-1', 'fndid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Gets all the categories defined
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the categories information
     */
    public function getAllCategories() {

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_cat_column'];

        $orderby = "$c[catName]";

        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWforms_cat', '', $orderby, '-1', '-1', 'cid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    public function getCategory($args) {

        $cid = (isset($args['cid'])) ? $args['cid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($cid == null || !is_numeric($cid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $items = DBUtil::selectObjectByID('IWforms_cat', $cid, 'cid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function getAllNotesFilter($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $filterValue = (isset($args['filterValue'])) ? $args['filterValue'] : null;
        $filter = (isset($args['filter'])) ? $args['filter'] : null;
        $order = (isset($args['order'])) ? $args['order'] : null;
        $fieldType = (isset($args['fieldType'])) ? $args['fieldType'] : null;
        $userNotes = (isset($args['userNotes'])) ? $args['userNotes'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        $where = '';
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if (!$userNotes == 1 && $access['level'] != 2 && $access['level'] < 3 && !SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('You can not access this form to view the annotations'));
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $pntables = DBUtil::getTables();

        $c = $pntables['IWforms_note_column'];

        if ($fieldType == 6 || $fieldType == 8) {
            $where .= "$c[content] = '$filterValue' AND $c[fndid] = $filter";
        } else {
            $where .= "$c[content] LIKE '%$filterValue%' AND $c[fndid] = $filter";
        }

        $items = DBUtil::selectObjectArray('IWforms_note', $where, '', -1, -1, 'fmid');

        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        return $items;
    }

    /**
     * get all the notes of a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: 	id of the note
     * @return:	An array with the notes information
     */
    public function getAllNotes($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        $init = (isset($args['init'])) ? $args['init'] - 1 : '-1';
        $ipp = (isset($args['ipp'])) ? $args['ipp'] : '-1';
        $filterValue = (isset($args['filterValue'])) ? $args['filterValue'] : null;
        $filter = (isset($args['filter'])) ? $args['filter'] : null;
        $userNotes = (isset($args['userNotes'])) ? $args['userNotes'] : null;
        $order = (isset($args['order'])) ? $args['order'] : null;
        $validate = (isset($args['validate'])) ? $args['validate'] : null;
        $defaultOrderForNotes = (isset($args['defaultOrderForNotes'])) ? $args['defaultOrderForNotes'] : null;

        $orderAscDesc = ($defaultOrderForNotes == 2) ? "asc" : "desc";
        
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if (!$userNotes == 1 && $access['level'] != 2 && $access['level'] < 3 && !SecurityUtil::checkPermission('IWforms::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('You can not access this form to view the annotations'));
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $where = '';
        $pntables = DBUtil::getTables();

        $c = $pntables['IWforms_column'];

        if ($userNotes != null && $userNotes == 1) {
            $where = "$c[user]=" . UserUtil::getVar('uid') . " AND $c[deluser]=0 AND ";
        }

        if ($filterValue != null && $filterValue > 0 && $filter == 0) {
            $where = "$c[user]=" . $filterValue . " AND ";
        }

        $where .= "$c[fid] = $fid";

        if ($validate != null) {
            $where .= " AND $c[validate] = $validate";
        }

        if ($fmid != null && !empty($fmid)) {
            $where .= " AND (";
            foreach ($fmid as $f) {
                $where .= " $c[fmid] = $f OR";
            }
            $where = substr($where, 0, -3);
            $where .= ")";
        }

        switch ($order) {
            case null:
                $orderby = "$c[state], $c[fmid] "  . $orderAscDesc;
                break;
            case "state":
                $orderby = "$c[state], $c[fmid] " . $orderAscDesc;
                break;
            case "time":
                $orderby = "$c[time] " . $orderAscDesc;
                break;
        }

        $items = DBUtil::selectObjectArray('IWforms', $where, $orderby, $init, $ipp, 'fmid');

        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        return $items;
    }

    /**
     * get all the fields contents for a note
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the note id
     * @return:	An array with the fields contents of note
     */
    public function getAllNoteContents($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid) || $fmid == null || !is_numeric($fmid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] < 1) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
        }


        $myJoin = array();

        $myJoin[] = array('join_table' => 'IWforms_note',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'fnid',
            'compare_field_join' => 'fnid');

        $myJoin[] = array('join_table' => 'IWforms_note_definition',
            'join_field' => array('fieldName',
                'fieldType',
                'editable'),
            'object_field_name' => array('fieldName',
                'fieldType',
                'editable'),
            'compare_field_table' => 'fndid',
            'compare_field_join' => 'fndid');

        $pntables = DBUtil::getTables();

        $ocolumn = $pntables['IWforms_note_column'];
        $lcolumn = $pntables['IWforms_note_definition_column'];

        $where = "a.$ocolumn[fmid] = $fmid";

        $orderby = "b.$lcolumn[order]";

        $items = DBUtil::selectExpandedObjectArray('IWforms_note', $myJoin, $where, $orderby, -1, -1, 'fndid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        return $items;
    }

    /**
     * get the contents for a field
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the note id
     * @return:	An array with the fields contents of note
     */
    public function getNoteContent($args) {

        $fnid = (isset($args['fnid'])) ? $args['fnid'] : null;

        $pntable = DBUtil::getTables();

        $myJoin = array();

        $myJoin[] = array('join_table' => 'IWforms_note',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'fnid',
            'compare_field_join' => 'fnid');

        $myJoin[] = array('join_table' => 'IWforms_note_definition',
            'join_field' => array('fieldName',
                'fieldType',
                'editable'),
            'object_field_name' => array('fieldName',
                'fieldType',
                'editable'),
            'compare_field_table' => 'fndid',
            'compare_field_join' => 'fndid');

        $pntables = DBUtil::getTables();

        $ocolumn = $pntables['IWforms_note_column'];
        $lcolumn = $pntables['IWforms_note_definition_column'];

        $where = "a.$ocolumn[fnid] = $fnid";

        $items = DBUtil::selectExpandedObjectArray('IWforms_note', $myJoin, $where, '', '-1', '-1', 'fnid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
        }

        // check if user can access the form is validator
        // get note
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $items[$fnid]['fmid']));
        // check if user can access the form is validator and the note is editable
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
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
    public function getAllUsersNotes($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] < 7) {
            LogUtil::registerError($this->__('You can not access this form to view the annotations'));
            // Redirect to the main site for the user
            return System::redirect(ModUtil::url('IWforms', 'user', 'main'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_column'];

        $where = "$c[fid] = $fid AND $c[annonimous] = 0";

        $items = DBUtil::selectObjectArray('IWforms', $where, '', '-1', '-1', 'user');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function getNote($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fmid == null || !is_numeric($fmid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $items = DBUtil::selectObjectByID('IWforms', $fmid, 'fmid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Desactivate automatically the caducated forms
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	True if success
     */
    public function desactivateForm() {

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $today = date('Y-m-d', time());
        $items = array('active' => 0);
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_definition_column'];
        $where = "$c[caducity] < '$today'  AND $c[caducity] > '0000-00-00'";

        if (!DBUTil::updateObject($items, 'IWforms_definition', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    /**
     * Create a new note in database
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	information of the note that have to be created
     * @return:	Thue if success and false otherwise
     */
    public function createNote($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $validate = (isset($args['validate'])) ? $args['validate'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Get item
        $item = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($item == false) {
            return LogUtil::registerError($this->__('Could not find form'));
        }


        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] != 1 && $access['level'] < 3) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
        }

        $item = array('fid' => $fid,
            'user' => UserUtil::getVar('uid'),
            'validate' => $validate,
            'time' => time(),
            'mark' => '$',
            'viewed' => '$',
            'publicResponse' => $item['publicResponse'],
            'annonimous' => $item['annonimous']);

        if (!DBUtil::insertObject($item, 'IWforms', 'fmid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
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
    public function elementExists($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        $fndid = (isset($args['fndid'])) ? $args['fndid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fmid == null || !is_numeric($fmid) || $fndid == null || !is_numeric($fndid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $uid = UserUtil::getVar('uid');

        //get the fields where there are dependances on this field
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];

        $where = "$c[fndid]=$fndid AND $c[fmid]=$fmid";


        $items = DBUtil::selectObjectArray('IWforms_note', $where, '', '0', '1', 'fnid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        $return = false;
        foreach ($items as $item) {
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
    public function createNoteContent($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        $fndid = (isset($args['fndid'])) ? $args['fndid'] : null;
        $content = (isset($args['content'])) ? $args['content'] : null;
        $validate = (isset($args['validate'])) ? $args['validate'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid) || $fmid == null || !is_numeric($fmid) || $fndid == null || !is_numeric($fndid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] != 1 && $access['level'] < 3) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
        }

        //Get item
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($form == false) {
            return LogUtil::registerError($this->__('Could not find form'));
        }

        //If form is closed it is not possible to add new notes
        if ($form['closeInsert'] == 1) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
        }

        $item = array('fmid' => $fmid,
            'fndid' => $fndid,
            'content' => $content,
            'validate' => $validate);

        if (!DBUtil::insertObject($item, 'IWforms_note', 'fnid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
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
    public function updateNoteContent($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        $fndid = (isset($args['fndid'])) ? $args['fndid'] : null;
        $items = (isset($args['items'])) ? $args['items'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid) || $fmid == null || !is_numeric($fmid) || $fndid == null || !is_numeric($fndid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] != 1 && $access['level'] < 3) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
        }

        //Get item
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($form == false) {
            LogUtil::registerError($this->__('Could not find form'));
            return false;
        }

        //If form is closed it is not possible to add new notes
        if ($form['closeInsert'] == 1) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];
        $where = "$c[fmid]=$fmid AND $c[fndid]=$fndid";

        if (!DBUTil::updateObject($items, 'IWforms_note', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    /**
     * Close/open a form insert
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the fid id
     * @return:	Thue if exists and false otherwise
     */
    public function closeInsert($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] < 3) {
            return LogUtil::registerError($this->__('You can not access this form to send annotations'));
        }

        //Get item
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
        if ($form == false) {
            return LogUtil::registerError($this->__('Could not find form'));
        }

        //If form is closed it is not possible to add new notes
        $value = ($form['closeInsert'] == 1) ? 0 : 1;

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_definition_column'];
        $where = "$c[fid]=$fid";
        $items = array('closeInsert' => $value);

        if (!DBUTil::updateObject($items, 'IWforms_definition', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    /**
     * delete a note
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: 	id of the note
     * @return:	An array with the note information
     */
    public function deleteNote($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;

        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        //Delete the note content
        if (!DBUtil::deleteObjectByID('IWforms_note', $fmid, 'fmid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        //Delete the note
        if (!DBUtil::deleteObjectByID('IWforms', $fmid, 'fmid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

    /**
     * mark o unmark a note
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: 	id of the note
     * @return:	The new state for the note
     */
    public function markNote($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;

        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        //mark or unmark a note
        if (strpos($note['mark'], '$' . UserUtil::getVar('uid') . '$') !== false) {
            //the note is marked
            $mark = str_replace('$' . UserUtil::getVar('uid') . '$', '', $note['mark']);
            $marked = 'unmarked';
        } else {
            //the note is unmarked
            $mark = $note['mark'] . '$' . UserUtil::getVar('uid') . '$';
            $marked = 'marked';
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];
        $where = "$c[fmid]=$fmid";

        $item = array('mark' => $mark);

        if (!DBUTil::updateObject($item, 'IWforms', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return $marked;
    }

    /**
     * set a note as completed or uncompleted
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: 	id of the note
     * @return:	The new state for the note
     */
    public function changeState($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;

        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        $newState = ($note['state'] == 1) ? '' : 1;
        $state = ($note['state'] == 1) ? 'uncompleted' : 'completed';

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];
        $where = "$c[fmid]=$fmid";

        $item = array('state' => $newState);

        if (!DBUTil::updateObject($item, 'IWforms', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return $state;
    }

    /**
     * set a note as validated
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: 	id of the note
     * @return:	true if success or false otherwise
     */
    public function validateNote($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;

        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];
        $where = "$c[fmid]=$fmid";
        $validate = ($note['validate'] == 1) ? 0 : 1;
        $item = array('validate' => $validate);
        if (!DBUTil::updateObject($item, 'IWforms', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    public function submitValue($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        $toDo = (isset($args['toDo'])) ? $args['toDo'] : null;
        $value = $args['value'];

        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];
        $where = "$c[fmid]=$fmid";

        $item = array($toDo => $value);

        if (!DBUTil::updateObject($item, 'IWforms', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    public function submitContentValue($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        $fnid = (isset($args['fnid'])) ? $args['fnid'] : null;
        $toDo = (isset($args['toDo'])) ? $args['toDo'] : null;
        $value = (isset($args['value'])) ? $args['value'] : null;

        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 7) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        // get notecontents
        $noteContent = ModUtil::apiFunc('IWforms', 'user', 'getNoteContent', array('fnid' => $fnid));
        if ($noteContent['editable'] != 1) {
            return LogUtil::registerError($this->__('You can not edit this note.'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];
        $where = "$c[fnid]=$fnid";

        $item = array('content' => $value);

        if (!DBUTil::updateObject($item, 'IWforms_note', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    /**
     * Gets all the forms where there are flagged notes
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the items information
     */
    public function getWhereFlagged() {

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_column'];

        $where = "$c[mark] like '%$" . UserUtil::getVar('uid') . "$%'";
        $orderby = "$c[fmid] desc";

        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWforms', $where, $orderby, '-1', '-1', 'fid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Gets all the forms where there are notes to validate
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the items information
     */
    public function getWhereNeedValidation() {

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_column'];

        $where = "$c[validate] = 0";
        $orderby = "$c[fmid] desc";

        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWforms', $where, $orderby, '-1', '-1', 'fid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function getFlagged($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] < 7) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_column'];

        $where = "$c[mark] like '%$" . UserUtil::getVar('uid') . "$%' AND $c[fid]=$fid";
        $orderby = "$c[fmid] desc";

        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWforms', $where, $orderby, '-1', '-1', 'fmid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function getNewNotes($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $uid = (isset($args['uid'])) ? $args['uid'] : null;
        $sv = (isset($args['sv'])) ? $args['sv'] : null;

        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
                return LogUtil::registerPermissionError();
            }
        } else
            $requestByCron = true;

        $items = array();

        if ($uid != UserUtil::getVar('uid') && !$requestByCron) {
            return $items;
        }

        //check user access to this form
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid,
                    'uid' => $uid,
                    'sv' => $sv));

        if ($access['level'] < 2) {
            return LogUtil::registerError($this->__('You can not access this form to view the annotations'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_column'];

        $where = "$c[viewed] not like '%$" . $uid . "|%' AND $c[fid]=$fid";
        $orderby = "$c[fmid] desc";

        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWforms', $where, $orderby, '-1', '-1', 'fmid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function sended($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;

        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if ($fid == null || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_column'];

        $where = "$c[fid] = $fid AND $c[user] = " . UserUtil::getVar('uid');

        $items = DBUtil::selectObjectArray('IWforms', $where, '', '-1', '-1', 'fid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function setAsViewed($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        $value = (isset($args['value'])) ? $args['value'] : null;

        // Needed argument
        if ($fid == null || !is_numeric($fid) || $fmid == null || !is_numeric($fmid) || $value == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] < 2) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        $time = date('d/m/Y - H.i', time());

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_column'];
        $where = "$c[fmid]=$fmid";

        $item = array('viewed' => $value . '$' . UserUtil::getVar('uid') . '|' . $time . '$');

        if (!DBUTil::updateObject($item, 'IWforms', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * delete a user note
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: 	id of the note
     * @return:	true if success or false otherwise
     */
    public function deleteUserNote($args) {

        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;

        //get the note information
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $fmid));

        if ($note['user'] != UserUtil::getVar('uid')) {
            return LogUtil::registerError($this->__('You do not have access to manage form'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];
        $where = "$c[fmid]=$fmid";

        $item = array('deluser' => 1);

        if (!DBUTil::updateObject($item, 'IWforms', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    /**
     * get all the notes of a form
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: 	id of the note
     * @return:	An array with the notes information
     */
    public function getTotalNotes($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $filterValue = (isset($args['filterValue'])) ? $args['filterValue'] : null;
        $filter = (isset($args['filter'])) ? $args['filter'] : null;
        $userNotes = (isset($args['userNotes'])) ? $args['userNotes'] : null;
        $validate = (isset($args['validate'])) ? $args['validate'] : null;

        $where = '';
        if ($filter == 0) {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWforms_column'];

            if ($userNotes != null && $userNotes == 1) {
                $where = "$c[user]=" . UserUtil::getVar('uid') . " AND $c[deluser]=0 AND ";
            }

            if ($filterValue != null && $filterValue > 0 && $filter == 0) {
                $where = "$c[user]=" . $filterValue . " AND ";
            }

            $where .= "$c[fid] = $fid";

            if ($validate != null) {
                $where .= " AND $c[validate] = $validate";
            }

            $items = DBUtil::selectObjectArray('IWforms', $where, '', '-1', '-1', 'fmid');

            if ($items === false) {
                return LogUtil::registerError($this->__('Error! Could not load items.'));
            }

            // Return the items
            return count($items);
        } else {
            $fmidNotes = ModUtil::apiFunc('IWforms', 'user', 'getAllNotesFilter', array('fid' => $fid,
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
    public function fieldsToCreate($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] < 7) {
            LogUtil::registerError($this->__('You can not access this form to view the annotations'));
            // Redirect to the main site for the user
            return System::redirect(ModUtil::url('IWforms', 'user', 'main'));
        }
        $noteContent = ModUtil::apiFunc('IWforms', 'user', 'getAllNoteContents', array('fid' => $fid,
                    'fmid' => $fmid));
        if (!$noteContent) {
            LogUtil::registerError($this->__('Note content not found'));
            return System::redirect(ModUtil::url('IWforms', 'user', 'manage', array('fid' => $fid,
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
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $fid,
                    'whereArray' => 'active|1'));
        if (!$fields) {
            LogUtil::registerError($this->__('Note fields not found'));
            return System::redirect(ModUtil::url('IWforms', 'user', 'manage', array('fid' => $fid,
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
            if (!DBUtil::insertObject($item, 'IWforms_note', 'fnid')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed during field synchronization.'));
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
    public function fieldsToDelete($args) {

        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        $fmid = (isset($args['fmid'])) ? $args['fmid'] : null;
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        if ($access['level'] < 7) {
            LogUtil::registerError($this->__('You can not access this form to view the annotations'));
            // Redirect to the main site for the user
            return System::redirect(ModUtil::url('IWforms', 'user', 'main'));
        }
        $noteContent = ModUtil::apiFunc('IWforms', 'user', 'getAllNoteContents', array('fid' => $fid,
                    'fmid' => $fmid));
        if (!$noteContent) {
            LogUtil::registerError($this->__('Note content not found'));
            return System::redirect(ModUtil::url('IWforms', 'user', 'manage', array('fid' => $fid,
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
        $fields = ModUtil::apiFunc('IWforms', 'user', 'getAllFormFields', array('fid' => $fid,
                    'whereArray' => 'active|1'));
        if (!$fields) {
            LogUtil::registerError($this->__('Note fields not found'));
            return System::redirect(ModUtil::url('IWforms', 'user', 'manage', array('fid' => $fid,
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
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_note_column'];
        foreach ($toDelete as $delete) {
            $where = "$c[fmid]=$fmid AND $c[fndid]=$delete";
            if (!DBUTil::deleteWhere('IWforms_note', $where)) {
                return LogUtil::registerError($this->__('Error! delete attempt failed during field synchronization.'));
            }
        }
        return false;
    }

    public function getSenders($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforms_column'];

        $where = "$c[fid] = $args[fid]";
        $items = DBUtil::selectObjectArray('IWforms', $where, '', '-1', '-1', 'user', '', '', array('user'));

        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

	$uids = array();
	foreach ($items as $item) {
		$uids[] = $item['user'];
	}

	return $uids;
    }

    public function getlinks($args) {
        $func = (isset($args['func'])) ? $args['func'] : null;
        $fid = (isset($args['fid'])) ? $args['fid'] : null;
        if (!UserUtil::isLoggedIn() && is_numeric($fid)) {
            $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $fid));
            $notexport = $form['unregisterednotexport'];
        } else {
            $notexport = 0;
        }
        //get user permissions for this form
        if ($fid == null && is_numeric($fid)) {
            $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $fid));
        } else {
            $access['level'] = 0;
        }

        $links = array();

        if (SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('IWforms', 'user', 'main'), 'text' => $this->__('Show the forms'), 'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ) && $access['level'] > 2) {
            $links[] = array('url' => ModUtil::url('IWforms', 'user', 'newItem', array('fid' => $fid)), 'text' => $this->__('Send an annotation'), 'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ) && UserUtil::isLoggedIn()) {
            $links[] = array('url' => ModUtil::url('IWforms', 'user', 'sended', array('fid' => $fid)), 'text' => $this->__('Show the notes I sent'), 'class' => 'z-icon-es-preview');
        }
        if (SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ) && $fid != null && $notexport == 0 && $func != 'sended') {
            $links[] = array('url' => ModUtil::url('IWforms', 'user', 'exportForm', array('fid' => $fid)), 'text' => $this->__('Export to CSV'), 'class' => 'z-icon-es-import');
        }

        return $links;
    }

}
