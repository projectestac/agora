<?php

class IWMessages_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Show the modules configurated values and options
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The options forms and values
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $groupsMulti_array = array();
        $groupsUpdate_array = array();

        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is needed. You have to install the IWmain module before installing it.'));
        }

        // Check if the version needed is correct. If not return error
        $versionNeeded = '3.0.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        $groupsCanUpdate = ModUtil::getVar('IWmessages', 'groupsCanUpdate');
        $uploadFolder = ModUtil::getVar('IWmessages', 'uploadFolder');
        $multiMail = ModUtil::getVar('IWmessages', 'multiMail');
        $limitInBox = ModUtil::getVar('IWmessages', 'limitInBox');
        $limitOutBox = ModUtil::getVar('IWmessages', 'limitOutBox');

        $groupsUpdate = explode('$$', substr($groupsCanUpdate, 0, -1));
        array_shift($groupsUpdate);
        sort($groupsUpdate);

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));

        foreach ($groupsUpdate as $update) {
            $names = explode('|', $update);
            $groupsUpdate_array[] = array('id' => $update,
                'name' => $groups[$names[0]]);
        }

        $multiMail = explode('$$', substr($multiMail, 0, -1));
        array_shift($multiMail);
        sort($multiMail);

        foreach ($multiMail as $multi) {
            $names = explode('-', $multi);
            $names1 = explode('|', $names[0]);
            $names2 = explode('|', $names[1]);
            $gn1 = $groups[$names1[0]];
            $gn2 = $groups[$names2[0]];
            if ($gn2 == '') {
                $gn2 = $this->__('All');
            }
            $criteria = $gn1 . ' => ' . $gn2;
            $groupsMulti_array[] = array('id' => $multi,
                'name' => $criteria);
        }

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup')));

        foreach ($groups as $group) {
            // Activate when iw_groups will be avaliable
            if (strpos($groupsCanUpdate, '$' . $group['id'] . '|0$') == 0) {
                $groups_array[] = array('id' => $group['id'] . '|0',
                    'name' => $group['name']);
            }
        }

        foreach ($groups as $group) {
            // Activate when iw_groups will be avaliable
            $groupsAll_array[] = array('id' => $group['id'] . '|0',
                'name' => $group['name']);
        }

        $noFolder = false;
        $noWriteable = false;

        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmessages', 'uploadFolder')) ||
                ModUtil::getVar('IWmessages', 'uploadFolder') == '') {
            $noFolder = true;
        } else {
            if (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmessages', 'uploadFolder'))) {
                $noWriteable = true;
            }
        }
        $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;

        return $this->view->assign('groupsMulti', $groupsMulti_array)
                        ->assign('groupsUpdate', $groupsUpdate_array)
                        ->assign('noFolder', $noFolder)
                        ->assign('noWriteable', $noWriteable)
                        ->assign('multizk', $multizk)
                        ->assign('groupsAll', $groupsAll_array)
                        ->assign('groups', $groups_array)
                        ->assign('uploadFolder', $uploadFolder)
                        ->assign('directoriroot', ModUtil::getVar('IWmain', 'documentRoot'))
                        ->assign('limitInBox', $limitInBox)
                        ->assign('limitOutBox', $limitOutBox)
                        ->assign('dissableSuggest', ModUtil::getVar('IWmessages', 'dissableSuggest'))
                        ->fetch('IWmessages_admin_main.htm');
    }

    /**
     * Delete a group from the list of groups that can update files
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   The group id
     * @return:	Return user to main page
     */
    public function deleteUpdateGroup($args) {
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
        if (!empty($objectid)) {
            $group = $objectid;
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Needed arguments
        if ($group == null) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWmessages', 'admin', 'main'));
        }

        $groupsCanUpdate = ModUtil::getVar('IWmessages', 'groupsCanUpdate');
        $new = str_replace('$' . $group . '$', '', $groupsCanUpdate);

        $lid = ModUtil::setVar('IWmessages', 'groupsCanUpdate', $new);
        if ($lid) {
            LogUtil::registerStatus($this->__('The module configuration has changed'));
        }

        //Enviem a l'usuari a l'administraciï¿œ del mï¿œdul
        return System::redirect(ModUtil::url('IWmessages', 'admin', 'main'));
    }

    /**
     * Define groups policy
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   The groups id
     * @return:	Return user to main page
     */
    public function newMultiGroup($args) {
        $group1 = FormUtil::getPassedValue('group1', isset($args['group1']) ? $args['group1'] : null, 'POST');
        $group2 = FormUtil::getPassedValue('group2', isset($args['group2']) ? $args['group2'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Needed arguments
        if ($group1 == null || $group2 == null) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWmessages', 'admin', 'main'));
        }

        $multiMail = ModUtil::getVar('IWmessages', 'multiMail');
        $new = $multiMail . '$' . $group1 . '-' . $group2 . '$';

        $lid = ModUtil::setVar('IWmessages', 'multiMail', $new);
        if ($lid) {
            LogUtil::registerStatus($this->__('The module configuration has changed'));
        }

        return System::redirect(ModUtil::url('IWmessages', 'admin', 'main'));
    }

    /**
     * Delete groups policy
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   The groups id
     * @return:	Return user to main page
     */
    public function deleteMultiGroup($args) {
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
        if (!empty($objectid)) {
            $group = $objectid;
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Needed arguments
        if ($group == null) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWmessages', 'admin', 'main'));
        }

        $multiMail = ModUtil::getVar('IWmessages', 'multiMail');
        $new = str_replace('$' . $group . '$', '', $multiMail);

        $lid = ModUtil::setVar('IWmessages', 'multiMail', $new);
        if ($lid) {
            LogUtil::registerStatus($this->__('The module configuration has changed'));
        }

        //Enviem a l'usuari a l'administraciï¿œ del mï¿œdul
        return System::redirect(ModUtil::url('IWmessages', 'admin', 'main'));
    }

    /**
     * Add a groups into the list of groups that can update files
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   The group id
     * @return:	Return user to main page
     */
    public function newUpdateGroup($args) {
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');
        if (!empty($objectid)) {
            $group = $objectid;
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $groupsCanUpdate = ModUtil::getVar('IWmessages', 'groupsCanUpdate');

        $new = $groupsCanUpdate . '$' . $group . '$';

        $lid = ModUtil::setVar('IWmessages', 'groupsCanUpdate', $new);
        if ($lid) {
            LogUtil::registerStatus($this->__('The module configuration has changed'));
        }

        //Enviem a l'usuari a l'administraciï¿œ del mï¿œdul
        return System::redirect(ModUtil::url('IWmessages', 'admin', 'main'));
    }

    /**
     * Update module configuration
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   The module options
     * @return:	Return user to main page
     */
    public function confupdate($args) {
        $uploadFolder = FormUtil::getPassedValue('uploadFolder', isset($args['uploadFolder']) ? $args['uploadFolder'] : null, 'POST');
        $limitInBox = FormUtil::getPassedValue('limitInBox', isset($args['limitInBox']) ? $args['limitInBox'] : null, 'POST');
        $limitOutBox = FormUtil::getPassedValue('limitOutBox', isset($args['limitOutBox']) ? $args['limitOutBox'] : null, 'POST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');
        $dissableSuggest = FormUtil::getPassedValue('dissableSuggest', isset($args['dissableSuggest']) ? $args['dissableSuggest'] : null, 'POST');

        if (!empty($objectid)) {
            $uploadFolder = $objectid;
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $lid = ModUtil::setVar('IWmessages', 'uploadFolder', $uploadFolder);
        $lid = ModUtil::setVar('IWmessages', 'limitInBox', $limitInBox);
        $lid = ModUtil::setVar('IWmessages', 'limitOutBox', $limitOutBox);
        $lid = ModUtil::setVar('IWmessages', 'dissableSuggest', $dissableSuggest);

        if ($lid) {
            LogUtil::registerStatus($this->__('The module configuration has changed'));
        }

        return System::redirect(ModUtil::url('IWmessages', 'admin', 'main'));
    }

}