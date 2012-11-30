<?php

class IWforums_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Show the manage module site
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return		The configuration information
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        //Cridem la funcié API anomenada getall i que retornaré la informacié de tots els férums creats
        $forums = ModUtil::apiFunc('IWforums', 'user', 'getall');
        $moderators = '';
        foreach ($forums as $forum) {
            //prepare moderators
            $moderators .= $forum['mod'];
        }

        //get all groups information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo',
                        array('sv' => $sv));

        //get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersInfo = ModUtil::func('IWmain', 'user', 'getAllUsersInfo',
                        array('sv' => $sv,
                            'info' => 'ncc',
                            'list' => $moderators));
        $forumsArray = array();
        foreach ($forums as $forum) {
            //prepare groups
            $groups = explode('$$', substr($forum['grup'], 0, -1));
            array_shift($groups);
            $groupsArray = array();
            foreach ($groups as $group) {
                $group1 = explode('|', $group);
                $groupName = ($group1[0] == '-1') ? $this->__("Unregistered") : $groupsInfo[$group1[0]];
                $groupsArray[] = array('id' => $group,
                    'groupName' => $groupName,
                    'accessType' => $group1[1]);
            }

            //prepare moderators
            $moderators = explode('$$', substr($forum['mod'], 0, -1));
            array_shift($moderators);
            $moderatorsArray = array();
            foreach ($moderators as $moderator) {
                $moderatorsArray[] = array('id' => $moderator,
                    'name' => $usersInfo[$moderator]);
            }

            $forumsArray[] = array('nom_forum' => $forum['nom_forum'],
                'descriu' => $forum['descriu'],
                'adjunts' => $forum['adjunts'],
                'actiu' => $forum['actiu'],
                'observacions' => $forum['observacions'],
                'msgDelTime' => $forum['msgDelTime'],
                'msgEditTime' => $forum['msgEditTime'],
                'groups' => $groupsArray,
                'mods' => $moderatorsArray,
                'fid' => $forum['fid']);
        }

        return $this->view->assign('forums', $forumsArray)
                ->fetch('IWforums_admin_main.htm');
    }

    /**
     * Show a form to create a new forum
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return	The forum creation form
     */
    public function newItem($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $forum = array('fid' => '',
            'nom_forum' => '',
            'descriu' => '',
            'msgEditTime' => '',
            'msgDelTime' => '',
            'observacions' => '',
            'adjunts' => '',
            'actiu' => '',
        );

        if ($m != null && ($m == "e" || $m == "c") && is_numeric($fid)) {
            //get forum information
            $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                            array('fid' => $fid));
            if ($forum == false) {
                LogUtil::registerError($this->__('Forum not found'));
                return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
            }
        }
        return $this->view->assign('forum', $forum)
                ->assign('m', $m)
                ->fetch('IWforums_admin_newItem.htm');
    }

    /**
     * Create a new forum
     * @autor	Albert Pérez Monfort
     * @param	main values for the forum
     * @return	Redirect the user to the administration main page
     */
    public function create($args) {
        $nom_forum = FormUtil::getPassedValue('nom_forum', isset($args['nom_forum']) ? $args['nom_forum'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $adjunts = FormUtil::getPassedValue('adjunts', isset($args['adjunts']) ? $args['adjunts'] : null, 'POST');
        $msgEditTime = FormUtil::getPassedValue('msgEditTime', isset($args['msgEditTime']) ? $args['msgEditTime'] : null, 'POST');
        $msgDelTime = FormUtil::getPassedValue('msgDelTime', isset($args['msgDelTime']) ? $args['msgDelTime'] : null, 'POST');
        $observacions = FormUtil::getPassedValue('observacions', isset($args['observacions']) ? $args['observacions'] : null, 'POST');
        $actiu = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'POST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        if (!is_numeric($msgEditTime))
            $msgEditTime = 0;

        if (!is_numeric($msgDelTime))
            $msgDelTime = 0;

        switch ($m) {
            case 'e':
                $items = array('nom_forum' => $nom_forum,
                    'descriu' => $descriu,
                    'actiu' => $actiu,
                    'observacions' => $observacions,
                    'adjunts' => $adjunts,
                    'msgDelTime' => $msgDelTime,
                    'msgEditTime' => $msgEditTime);
                if (ModUtil::apiFunc('IWforums', 'admin', 'update',
                                array('items' => $items,
                                    'fid' => $fid))) {
                    //modified successfully
                    LogUtil::registerStatus($this->__('The forum has been modified'));
                }
                break;
            default:
                if (ModUtil::apiFunc('IWforums', 'admin', 'create',
                                array('nom_forum' => $nom_forum,
                                    'descriu' => $descriu,
                                    'actiu' => $actiu,
                                    'observacions' => $observacions,
                                    'adjunts' => $adjunts,
                                    'msgDelTime' => $msgDelTime,
                                    'msgEditTime' => $msgEditTime))) {
                    //created successfully
                    LogUtil::registerStatus($this->__('A new forum has been created'));
                }
        }

        return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
    }

    /**
     * Add a group with access to the forum
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	array with the group identity
     * @return	Redirect user to main admin page
     */
    public function addGroup($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Get item
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                        array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Forum not found'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groups = ModUtil::func('IWmain', 'user', 'getAllGroups',
                            array('sv' => $sv,
                                'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));

            return $this->view->assign('groups', $groups)
                    ->assign('item', $item)
                    ->fetch('IWforums_admin_addGroup.htm');
        }

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($group) || !is_numeric($group) || $group == 0) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        if ($group == '-1')
            $accessType = 1;

        $groupString = ($item['grup'] == '') ? '$' : $item['grup'];
        $groupString .= '$' . $group . '|' . $accessType . '$';

        $items = array('grup' => $groupString);

        //add the group in database and send automatic message if it is necessary
        if (ModUtil::apiFunc('IWforums', 'admin', 'update',
                        array('fid' => $fid,
                            'items' => $items))) {
            //Success
            LogUtil::registerStatus($this->__('Group added'));
        }

        return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
    }

    /**
     * Delete a group with access to the forum
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	the information of the group that have to be deleted
     * @return	Redirect user to main admin page
     */
    public function deleteGroup($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Get item
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                        array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Forum not found'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        if (!$confirm) {
            //gets the group name
            $vals = explode('|', $id);

            //get all groups information
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));

            $groupName = ($vals[0] != '-1') ? $groupsInfo[$vals[0]] : $this->__('Unregistered');

            return $this->view->assign('groupName', $groupName)
                    ->assign('item', $item)
                    ->assign('id', $id)
                    ->fetch('IWforums_admin_deleteGroup.htm');
        }

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($id) || $id == '') {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        $groupString = str_replace('$' . $id . '$', '', $item['grup']);

        $items = array('grup' => $groupString);

        if (ModUtil::apiFunc('IWforums', 'admin', 'update',
                        array('fid' => $fid,
                            'items' => $items))) {
            //Success
            LogUtil::registerStatus($this->__('The access has been deleted'));
        }

        return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
    }

    /**
     * Add a moderator in the forum
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	array with the manager identity
     * @return	Redirect user to main admin page
     */
    public function addModerator($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Get item
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                        array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Forum not found'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        $confirm = (!isset($uid) || !is_numeric($uid) || $uid == 0) ? 0 : 1;

        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groups = ModUtil::func('IWmain', 'user', 'getAllGroups',
                            array('sv' => $sv,
                                'plus' => $this->__('Choose a gruop...'),
                                'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));


            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup',
                            array('sv' => $sv,
                                'gid' => $group));

            return $this->view->assign('groupselect', $group)
                    ->assign('groups', $groups)
                    ->assign('groupMembers', $groupMembers)
                    ->assign('item', $item)
                    ->fetch('IWforums_admin_addModerator.htm');
        }

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($uid) || !is_numeric($uid) || $uid == 0) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        $respString = ($item['mod'] == '') ? '$' : $item['mod'];
        $respString .= '$' . $uid . '$';

        $items = array('mod' => $respString);

        //add the group in database and send automatic message if it is necessary
        if (ModUtil::apiFunc('IWforums', 'admin', 'update',
                        array('fid' => $fid,
                            'items' => $items))) {
            //Success
            LogUtil::registerStatus($this->__('Moderador added'));
        }

        return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
    }

    /**
     * Delete the moderator of a forum
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	the information of the manager who is going to be deleted
     * @return	Redirect user to main admin page
     */
    public function deleteModerator($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Get item
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                        array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Forum not found'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userName = ModUtil::func('IWmain', 'user', 'getUserInfo',
                            array('sv' => $sv,
                                'uid' => $id,
                                'info' => 'ncc'));

            return $this->view->assign('userName', $userName)
                    ->assign('item', $item)
                    ->assign('id', $id)
                    ->fetch('IWforums_admin_deleteModerator.htm');
        }

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($id) || $id == '') {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        $respString = str_replace('$' . $id . '$', '', $item['resp']);

        $items = array('mod' => $respString);
        if (ModUtil::apiFunc('IWforums', 'admin', 'update',
                        array('fid' => $fid,
                            'items' => $items))) {
            //Success
            LogUtil::registerStatus($this->__("Moderator deleted,$dom"));
        }

        return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
    }

    /**
     * Delete a forum
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	the information of the forum that is going to be deleted
     * @return	Redirect user to main admin page
     */
    public function delete($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Get item
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                        array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Forum not found'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }

        if (!$confirm) {
            return $this->view->assign('item', $item)
                    ->fetch('IWforums_admin_delete.htm');
        }

        $this->checkCsrfToken();

        if (ModUtil::apiFunc('IWforums', 'admin', 'delete',
                        array('fid' => $fid))) {
            //Success
            LogUtil::registerStatus($this->__('The forum has been deleted'));
        }

        return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
    }

    /**
     * Show a form with the module confirable parameters
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return	The new configurable parameters
     */
    public function conf() {
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $noFolder = false;
        $noWriteable = false;
        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforums', 'urladjunts')) || ModUtil::getVar('IWforums', 'urladjunts') == '') {
            $noFolder = true;
        } else {
            if (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforums', 'urladjunts'))) {
                $noWriteable = true;
            }
        }
        $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;

        return $this->view->assign('noFolder', $noFolder)
                ->assign('noWriteable', $noWriteable)
                ->assign('multizk', $multizk)
                ->assign('urladjunts', ModUtil::getVar('IWforums', 'urladjunts'))
                ->assign('directoriroot', ModUtil::getVar('IWmain', 'documentRoot'))
                ->assign('avatarsVisible', ModUtil::getVar('IWforums', 'avatarsVisible'))
                ->fetch('IWforums_admin_configura.htm');
    }

    /**
     * Update the configurable options of a form
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	The form parameter values
     * @return	Redirect user to admin main page
     */
    public function update_conf($args) {
        $urladjunts = FormUtil::getPassedValue('urladjunts', isset($args['urladjunts']) ? $args['urladjunts'] : null, 'POST');
        $avatarsVisible = FormUtil::getPassedValue('avatarsVisible', isset($args['avatarsVisible']) ? $args['avatarsVisible'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        $this->setVar('urladjunts', $urladjunts)
                ->setVar('avatarsVisible', $avatarsVisible);

        LogUtil::registerStatus($this->__('The configuration of the module has been modified'));

        return System::redirect(ModUtil::url('IWforums', 'admin', 'conf'));
    }

    /**
     * get the characteristics content of a forum
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	The forum identity
     * @return	The forum information
     */
    public function getCharsContent($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Get field information
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                        array('fid' => $fid));
        if ($item == false) {
            LogUtil::registerError($this->__('Forum not found'));
            return System::redirect(ModUtil::url('IWforums', 'admin', 'main'));
        }
        return $item;
    }

}