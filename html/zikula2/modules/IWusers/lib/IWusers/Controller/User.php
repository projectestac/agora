<?php

class IWusers_Controller_User extends Zikula_AbstractController {

    protected function postInitialize() {
        // Set caching to false by default.
        $this->view->setCaching(false);
    }

    /**
     * Show the list of user groups
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The list of users
     */
    public function main($args) {
        $all = FormUtil::getPassedValue('all', isset($args['all']) ? $args['all'] : null, 'GET');
        if ($all == null) {
            // Security check
            if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_READ)) {
                throw new Zikula_Exception_Forbidden();
            }
        } else {
            // Security check
            if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_COMMENT)) {
                throw new Zikula_Exception_Forbidden();
            }
            $all = true;
        }

        // @aginard: If user is not logged in, redirect to log-in page
        if (is_null(UserUtil::getVar('uid'))) {
            throw new Zikula_Exception_Forbidden();
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userGroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv));
        // Gets the groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $allGroups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv));
        foreach ($allGroups as $group) {
            $groupsNames[$group['id']] = $group['name'];
        }
        if ($all != null)
            $userGroups = $allGroups;
        $invisibleGroupsInList = ModUtil::getVar('IWusers', 'invisibleGroupsInList');
        foreach ($userGroups as $group) {
            if (strpos($invisibleGroupsInList, '$' . $group['id'] . '$') === false) {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $members = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                            'gid' => $group['id']));
                $groups[] = array('gid' => $group['id'],
                    'members' => count($members),
                    'name' => $groupsNames[$group['id']]);
            }
        }
        return $this->view->assign('groups', $groups)
                    ->assign('all', $all)
                    ->fetch('IWusers_user_main.htm');
    }

    public function profile() {
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        $uid = UserUtil::getVar('uid');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => UserUtil::getVar('uname'),
                    'sv' => $sv));
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => '_' . UserUtil::getVar('uname'),
                    'sv' => $sv));
        //Check if gd library is available
        if (extension_loaded('gd') && ModUtil::getVar('IWusers', 'allowUserChangeAvatar') == 1)
            $canChangeAvatar = true;
        //Check if the users picture folder exists
        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder')) || ModUtil::getVar('IWusers', 'usersPictureFolder') == '') {
            $canChangeAvatar = false;
        } else {
            if (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder')))
                $canChangeAvatar = false;
        }
        // checks if user can change their real names
        $modid = ModUtil::getIdFromName('IWusers');
        $modinfo = ModUtil::getInfo($modid);
        $usersCanManageName = (ModUtil::getVar('IWusers', 'usersCanManageName') == 1) ? true : false;
        $allowUserSetTheirSex = (ModUtil::getVar('IWusers', 'allowUserSetTheirSex') == 1) ? true : false;
        $allowUserDescribeTheirSelves = (ModUtil::getVar('IWusers', 'allowUserDescribeTheirSelves') == 1) ? true : false;


        $userSurname1 = '';
        $userSurname2 = '';
        if ($modinfo['state'] == 3) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userInfo = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => UserUtil::getVar('uid'),
                        'info' => array('n', 'c1', 'c2', 'd', 's'),
                        'sv' => $sv));
            $userName = $userInfo['n'];
            $userSurname1 = $userInfo['c1'];
            $userSurname2 = $userInfo['c2'];
            $description = $userInfo['d'];
            $sex = $userInfo['s'];
        }

        return $this->view->assign('avatarChangeValidationNeeded', ModUtil::getVar('IWusers', 'avatarChangeValidationNeeded'))
                        ->assign('photo', $photo)
                        ->assign('photo_s', $photo_s)
                        ->assign('canChangeAvatar', $canChangeAvatar)
                        ->assign('usersCanManageName', $usersCanManageName)
                        ->assign('allowUserSetTheirSex', $allowUserSetTheirSex)
                        ->assign('allowUserDescribeTheirSelves', $allowUserDescribeTheirSelves)
                        ->assign('userName', $userName)
                        ->assign('userSurname1', $userSurname1)
                        ->assign('userSurname2', $userSurname2)
                        ->assign('description', $description)
                        ->assign('sex', $sex)
                        ->fetch('IWusers_user_profile.htm');
    }

    public function updateprofile($args) {
        $deleteAvatar = FormUtil::getPassedValue('deleteAvatar', isset($args['deleteAvatar']) ? $args['deleteAvatar'] : 0, 'POST');
        $userName = FormUtil::getPassedValue('userName', isset($args['userName']) ? $args['userName'] : null, 'POST');
        $userSurname1 = FormUtil::getPassedValue('userSurname1', isset($args['userSurname1']) ? $args['userSurname1'] : null, 'POST');
        $userSurname2 = FormUtil::getPassedValue('userSurname2', isset($args['userSurname2']) ? $args['userSurname2'] : null, 'POST');
        $sex = FormUtil::getPassedValue('sex', isset($args['sex']) ? $args['sex'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        $uid = UserUtil::getVar('uid');
        $path = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/';

        if ($deleteAvatar != 1) {
            //gets the attached file array
            $fileName = $_FILES['avatar']['name'];
            $file_extension = strtolower(substr(strrchr($fileName, "."), 1));
            if ($file_extension != 'png' && $file_extension != 'gif' && $file_extension != 'jpg' && $fileName != '') {
                $errorMsg = $this->__('The information has been modified, but the uplaod of the avatar has failed because the file extension is not allowed. The allowed extensions are: png, jpg and gif');
                $fileName = '';
            }
            // update the attached file to the server
            if ($fileName != '') {
                for ($i = 0; $i < 2; $i++) {
                    $fileAvatarName = UserUtil::getVar('uname');
                    $userFileName = ($i == 0) ? $fileAvatarName . '.' . $file_extension : $fileAvatarName . '_s.' . $file_extension;
                    $new_width = ($i == 0) ? 90 : 30;
                    //source and destination
                    $imgSource = $_FILES['avatar']['tmp_name'];
                    $prevalidated = (ModUtil::getVar('IWusers', 'avatarChangeValidationNeeded') == 1 && !SecurityUtil::checkPermission('IWusers::', "::", ACCESS_ADMIN)) ? '_' : '';
                    $imgDest = $path . $prevalidated . $userFileName;
                    //if success $errorMsg = ''
                    $errorMsg = ModUtil::func('IWmain', 'user', 'thumb', array('imgSource' => $imgSource,
                                'imgDest' => $imgDest,
                                'new_width' => $new_width,
                                'imageName' => $fileName));
                    if ($errorMsg == '') {
                        // save user avatar extension
                        if (!ModUtil::apiFunc('IWusers', 'user', 'changeAvatar', array('avatar' => UserUtil::getVar('uname') . '.' . $file_extension,
                                )))
                            $errorMsg = 'Changing the avatar has failed.';
                    }
                }
            }
        } else {
            // get user avatar and delete avatar file
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userAvatar = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => UserUtil::getVar('uid'),
                        'info' => 'a',
                        'sv' => $sv));
            if (unlink(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $userAvatar)) {
				ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => UserUtil::getVar('uname') . '_s',
                    'extensions' => array('jpg', 'png', 'gif')));
                // delete user avatar extension from database
                ModUtil::apiFunc('IWusers', 'user', 'changeAvatar', array('delete' => true,'avatar' => ''));
            }
        }

        if (ModUtil::getVar('IWusers', 'usersCanManageName') == 1) {
            if (!ModUtil::apiFunc('IWusers', 'user', 'changeRealName', array('userName' => $userName,
                        'userSurname1' => $userSurname1,
                        'userSurname2' => $userSurname2,
                    )))
                $errorMsg = 'Changing the real name has failed.';
        }

        if (ModUtil::getVar('IWusers', 'allowUserSetTheirSex') == 1) {
            if (!ModUtil::apiFunc('IWusers', 'user', 'setSex', array('sex' => $sex,
                    )))
                $errorMsg = 'Changing the real name has failed.';
        }


        if (ModUtil::getVar('IWusers', 'allowUserDescribeTheirSelves') == 1) {
            if (!ModUtil::apiFunc('IWusers', 'user', 'changeDescription', array('description' => $description,
                    )))
                $errorMsg = 'Changing the real name has failed.';
        }

        if ($errorMsg != '') {
            LogUtil::registerError($errorMsg);
        } else {
            //Successfull
            LogUtil::registerStatus($this->__('The values have changed correctly'));
        }

        return System::redirect(ModUtil::url('IWusers', 'user', 'profile'));
    }

    /**
     * Delete the users' avatars
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	avatar name
     * @param	the extensions image files that must be deleted
     * @return	The module information
     */
    public function deleteAvatar($args) {
        $avatarName = FormUtil::getPassedValue('avatarName', isset($args['avatarName']) ? $args['avatarName'] : null, 'POST');
        $extensions = FormUtil::getPassedValue('extensions', isset($args['extensions']) ? $args['extensions'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        $count = 0;
        foreach ($extensions as $extension) {
            $file = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $avatarName . '.' . $extension;
            if (file_exists($file)) {
                if (!unlink($file)) {
                    return false;
                } else {
                    $count++;
                }
            }
        }
        if ($count == 0) {
            return false;
        }
        return true;
    }

    /**
     * Show the list of members in a group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The group identity
     * @return:	The list of users
     */
    public function members($args) {

        $gid = FormUtil::getPassedValue('gid', isset($args['gid']) ? $args['gid'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $usersArray = array();

        //Check if user belongs to the group
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $isMember = ModUtil::func('IWmain', 'user', 'isMember', array('sv' => $sv,
                    'gid' => $gid,
                    'uid' => UserUtil::getVar('uid')));
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_COMMENT) && $isMember != 1 && $gid > 0) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($gid > 0) {
            //get group members
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $members = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                        'gid' => $gid));
        } else {
            if (ModUtil::getVar('IWusers', 'friendsSystemAvailable') != 1) {
                LogUtil::registerError($this->__('Sorry! No authorization to access this module.'));
                return System::redirect(ModUtil::url('IWusers', 'user', 'main'));
            }
            $members = array();
            $membersFriends = ModUtil::apiFunc('IWusers', 'user', 'getAllFriends');
            if (count($membersFriends) > 0) {
                $usersList = '$$';
                foreach ($membersFriends as $friend) {
                    $usersList .= $friend['fuid'] . '$$';
                }
                // Get all users names
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $usersNames = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ncc',
                            'sv' => $sv,
                            'list' => $usersList));
                foreach ($membersFriends as $friend) {
                    $members[] = array('name' => $usersNames[$friend['fuid']],
                        'id' => $friend['fuid']);
                }
            }
        }
        asort($members);
        $usersList = '$$';
        foreach ($members as $member) {
            $usersList .= $member['id'] . '$$';
        }
        // Get all users info
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersNames = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'l',
                    'sv' => $sv,
                    'list' => $usersList));
        // Get groups information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));
        $folder = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder');
        foreach ($members as $member) {
            //get the user small photo
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersNames[$member['id']] . '_s',
                        'sv' => $sv));
            //if the small photo not exists, check if the normal size foto exists. In this case create the small one
            if ($photo_s == '') {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersNames[$member['id']],
                            'sv' => $sv));
                if ($photo != '' && is_writable($folder)) {
                    //create the small photo and take it
                    $file_extension = strtolower(substr(strrchr($photo, "."), 1));
                    $e = ModUtil::func('IWmain', 'user', 'thumb', array('imgSource' => $folder . '/' . $usersNames[$member['id']] . '.' . $file_extension,
                                'imgDest' => $folder . '/' . $usersNames[$member['id']] . '_s.' . $file_extension,
                                'new_width' => 30));
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersNames[$member['id']] . '_s',
                                'sv' => $sv));
                }
            }
            // get user friends
            $friends = ModUtil::apiFunc('IWusers', 'user', 'getAllFriends');
            $isFriend = (array_key_exists($member['id'], $friends)) ? 1 : 0;
            $usersArray[] = array('name' => $member['name'],
                'photo' => $photo_s,
                'uname' => $usersNames[$member['id']],
                'isFriend' => $isFriend,
                'uid' => $member['id']);
        }
        $this->view->assign('members', $usersArray)
                ->assign('gid', $gid);
        if ($gid > 0) {
            $this->view->assign('groupName', $groupsInfo[$gid]);
        }
        $this->view->assign('friendsSystemAvailable', ModUtil::getVar('IWusers', 'friendsSystemAvailable'));
        return $this->view->fetch('IWusers_user_members.htm');
    }

}
