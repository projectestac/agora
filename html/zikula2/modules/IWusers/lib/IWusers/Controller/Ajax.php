<?php

class IWusers_Controller_Ajax extends Zikula_Controller_AbstractAjax {
    
    public function orderGroupInfo($args) {
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('No teniu autorització per accedir a aquesta informació.'));
        }       

        $orderBy = $this->request->request->get('orderBy', '');
        if ($orderBy=='') $orderBy = "gid";
        
        $gi = UserUtil::getGroups('',$orderBy);
        foreach ($gi as $key => $value) {
            $groupInfo[] = array_slice($value,0,2);
        }
       
        $view = Zikula_View::getInstance($this->name);
        $view->assign('groupInfo', $groupInfo);
        
        $content = $view->fetch('IWusers_groupsTable.tpl');
        return new Zikula_Response_Ajax(array('content' => $content));
    }

    public function addContact($args) {

        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $gid = FormUtil::getPassedValue('gid', -2, 'GET');
        if ($gid == -2) {
            AjaxUtil::error('no group id');
        }
        $fuid = FormUtil::getPassedValue('fuid', -1, 'GET');
        if ($fuid == -1) {
            AjaxUtil::error('no user id');
        }
        $action = FormUtil::getPassedValue('action', -1, 'GET');
        if ($action == -1) {
            AjaxUtil::error('no action defined');
        }
        $view = Zikula_View::getInstance('IWusers', false);
        if ($action == 'add') {
            if (!ModUtil::apiFunc('IWusers', 'user', 'addContant', array('fuid' => $fuid))) {
                AjaxUtil::error('error');
            }
            $view->assign('add', true);
        }
        if ($action == 'delete') {
            if (!ModUtil::apiFunc('IWusers', 'user', 'deleteContant', array('fuid' => $fuid))) {
                AjaxUtil::error('error');
            }
            $view->assign('add', false);
        }
        $view->assign('fuid', $fuid);
        $view->assign('gid', $gid);
        $vars = UserUtil::getVars($fuid);
        $view->assign('uname', $vars['uname']);
        $content = $view->fetch('IWusers_user_members_optionsContent.htm');
        AjaxUtil::output(array('fuid' => $fuid,
            'content' => $content,
            'gid' => $gid));
    }

    public function delUserGroup($args) {

        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $uid = FormUtil::getPassedValue('uid', -1, 'GET');
        if ($uid == -1) {
            AjaxUtil::error('no user id');
        }
        $gid = FormUtil::getPassedValue('gid', -1, 'GET');
        if ($gid == -1) {
            AjaxUtil::error('no group id');
        }
        if (!ModUtil::apiFunc('groups', 'admin', 'removeuser', array('uid' => $uid,
                    'gid' => $gid))) {
            AjaxUtil::error('error deleting group');
        }
        AjaxUtil::output(array('uid' => $uid,
            'gid' => $gid));
    }
    
    public function addUserGroup($args) {

        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $uid = FormUtil::getPassedValue('uid', -1, 'GET');
        if ($uid == -1) {
            AjaxUtil::error('no user id');
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $allGroups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv));
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userGroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv,
                    'uid' => $uid));
        $usersGroupsArray = array();
        foreach ($allGroups as $group) {
            if (!array_key_exists($group['id'], $userGroups)) {
                $userGroupsArray[] = array('id' => $group['id'],
                    'name' => $group['name']);
            }
        }
        // Create output object
        $view = Zikula_View::getInstance('IWusers', false);
        $view->assign('groups', $userGroupsArray);
        $view->assign('uid', $uid);
        $view->assign('list', true);
        $content = $view->fetch('IWusers_admin_addGroupForm.htm');
        AjaxUtil::output(array('uid' => $uid,
            'content' => $content));
    }

    public function addGroupProceed($args) {

        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $uid = FormUtil::getPassedValue('uid', -1, 'GET');
        if ($uid == -1) {
            AjaxUtil::error('no user id');
        }
        $gid = FormUtil::getPassedValue('gid', -1, 'GET');
        if ($gid == -1) {
            AjaxUtil::error('no group id');
        }
        if (!ModUtil::apiFunc('groups', 'admin', 'adduser', array('uid' => $uid,
                    'gid' => $gid))) {
            AjaxUtil::error('error adding group');
        }
        // Get all the groups information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv,
                    'uid' => $uid));
        $userGroups = array();
        foreach ($groups as $group) {
            if ($group['id']) {
                array_push($userGroups, array('id' => $group['id'],
                    'name' => $groupsInfo[$group['id']]));
            }
        }
        $view = Zikula_View::getInstance('IWusers', false);
        $view->assign('user', array('groups' => $userGroups,
            'uid' => $uid));
        $content = $view->fetch('IWusers_admin_userGroupsList.htm');
        $content1 = $view->fetch('IWusers_admin_addGroupForm.htm');
        AjaxUtil::output(array('uid' => $uid,
            'content' => $content,
            'content1' => $content1));
    }

    public function change($args) {
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }

        $uid = FormUtil::getPassedValue('uid', -1, 'GET');
        if ($uid == -1)
            AjaxUtil::error('no change user id');

        // get user information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userAvatar = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => $uid,
                    'info' => 'na',
                    'sv' => $sv));

        $toDo = FormUtil::getPassedValue('toDo', -1, 'GET');
        if ($toDo == -1)
            AjaxUtil::error('no action defined');
        $chid = '_' . $userAvatar;
        $error = '';
        $path = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/';

        if ($toDo == 'del') {
            //delete the file
            if (!ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => substr($chid, 0, -4),
                        'extensions' => array('jpg',
                            'png',
                            'gif')))) {
                $error = $this->__('Error deleting avatar');
            }

            //delete the small picture
            ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => substr($chid, 0, -4) . '_s',
                'extensions' => array('jpg',
                    'png',
                    'gif')));
            if (!ModUtil::apiFunc('IWusers', 'user', 'changeAvatar', array('avatar' => '',
                        'target' => 'newavatar',
                        'uid' => $uid,
                    )))
                $error = $this->__('Changing the avatar has failed.');
        } else {
            $file_extension = strtolower(substr(strrchr($chid, "."), 1));
            $formats = '$jpg$$png$$gif$';
            $formats = str_replace('$' . $file_extension . '$', '', $formats);
            $len = strlen($formats) - 2;
            $formatsArray = explode('$$', substr($formats, 1, $len));

            //change file name
            $changed = rename($path . $chid, $path . substr($chid, 1, strlen($chid)));
            if ($changed) {
                ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => substr($chid, 1, -4),
                    'extensions' => $formatsArray));
            } else {
                $error = $this->__('Error changing avatar');
            }

            //Change small pictures
            $chid_s = substr($chid, 0, -4) . '_s.' . $file_extension;
            rename($path . $chid_s, $path . substr($chid_s, 1, strlen($chid_s)));
            ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => substr($chid_s, 1, -4),
                'extensions' => $formatsArray));

            if (!ModUtil::apiFunc('IWusers', 'user', 'changeAvatar', array('avatar' => '',
                        'target' => 'newavatar',
                        'uid' => $uid,
                    )))
                $error = $this->__('Changing the avatar has failed.');
            if (!ModUtil::apiFunc('IWusers', 'user', 'changeAvatar', array('avatar' => $userAvatar,
                        'uid' => $uid,
                    )))
                $error = $this->__('Changing the avatar has failed.');
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_news',
            'name' => 'have_news',
            'value' => 'ch',
            'sv' => $sv));


        AjaxUtil::output(array('chid' => $userAvatar,
            'error' => $error));
    }

}