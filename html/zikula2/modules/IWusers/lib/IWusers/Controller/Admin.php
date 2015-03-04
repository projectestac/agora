<?php
include 'vendor/csvImporter/CsvImporter.php';

class IWusers_Controller_Admin extends Zikula_AbstractController {
   /**
     * Post initialise.
     *
     * Run after construction.
     *
     * @return void
     */
    protected function postInitialize() {
       // Disable caching by default.
        $this->view->setCaching(Zikula_View::CACHE_DISABLED);
        //$this->view->setCaching(false);
    }
 
   
    /**
     * Show the list of users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The values for the current view
     * @return:	The list of users
     */
    public function main($args) {

        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $filtre = FormUtil::getPassedValue('filtre', isset($args['filtre']) ? $args['filtre'] : null, 'REQUEST');
        $campfiltre = FormUtil::getPassedValue('campfiltre', isset($args['campfiltre']) ? $args['campfiltre'] : null, 'POST');
        $numitems = FormUtil::getPassedValue('numitems', isset($args['numitems']) ? $args['numitems'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $usersArray = array();
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        if ($inici == null) {
            $inici = ModUtil::func('IWmain', 'user', 'userInitVar', array('sv' => $sv,
                        'module' => 'IWusers',
                        'name' => 'inici',
                        'default' => '0',
                        'lifetime' => '1000'));
        } else {
            ModUtil::func('IWmain', 'user', 'userSetVar', array('sv' => $sv,
                'module' => 'IWusers',
                'name' => 'inici',
                'value' => $inici,
                'lifetime' => '1000'));
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        if ($filtre == null) {
            $filtre = ModUtil::func('IWmain', 'user', 'userInitVar', array('sv' => $sv,
                        'module' => 'IWusers',
                        'name' => 'filtre',
                        'default' => '0',
                        'lifetime' => '1000'));
        } else {
            ModUtil::func('IWmain', 'user', 'userSetVar', array('sv' => $sv,
                'module' => 'IWusers',
                'name' => 'filtre',
                'value' => $filtre,
                'lifetime' => '1000'));
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        if ($campfiltre == null || $campfiltre == '') {
            $campfiltre = ModUtil::func('IWmain', 'user', 'userInitVar', array('sv' => $sv,
                        'module' => 'IWusers',
                        'name' => 'campfiltre',
                        'default' => 'l',
                        'lifetime' => '1000'));
        } else {
            ModUtil::func('IWmain', 'user', 'userSetVar', array('sv' => $sv,
                'module' => 'IWusers',
                'name' => 'campfiltre',
                'value' => $campfiltre,
                'lifetime' => '1000'));
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        if ($numitems == null || $numitems == '') {
            $numitems = ModUtil::func('IWmain', 'user', 'userInitVar', array('sv' => $sv,
                        'module' => 'IWusers',
                        'name' => 'numitems',
                        'default' => '20',
                        'lifetime' => '1000'));
        } else {
            ModUtil::func('IWmain', 'user', 'userSetVar', array('sv' => $sv,
                'module' => 'IWusers',
                'name' => 'numitems',
                'value' => $numitems,
                'lifetime' => '1000'));
        }
        // Get all users in database
        $allUsers = ModUtil::apiFunc('IWusers', 'user', 'getAllUsers');
        // Get all users info
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersUname = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'l',
                    'sv' => $sv));
        // Get all the groups information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));
        
        // Create/delete the users that are in users table but are not in IWusers table
        
        ModUtil::apiFunc($this->name, 'admin', 'sincronize');
        /*** canvi 09/06/2014 ************************************************
        $notExist = array_diff_key($usersUname, $allUsers);
        foreach ($notExist as $key => $value) {
            ModUtil::apiFunc('IWusers', 'admin', 'create', array('uid' => $key));
        }
         * 
         */
        // Count the users for the criteria
        $usersNumber = ModUtil::apiFunc('IWusers', 'user', 'countUsers', array('campfiltre' => $campfiltre,
                    'filtre' => $filtre));
        // Get all users needed
        $users = ModUtil::apiFunc('IWusers', 'user', 'getAll', array('campfiltre' => $campfiltre,
                    'filtre' => $filtre,
                    'inici' => $inici,
                    'numitems' => $numitems));
        $usersList = '$$';
        foreach ($users as $user) {
            $usersList .= $user['uid'] . '$$';
        }
        // Get all users mails
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersMail = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'e',
                    'sv' => $sv,
                    'list' => $usersList));
        $folder = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder');
        // Check all users disponibility in extra database. If user doesn't exists create it
        foreach ($users as $user) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv,
                        'uid' => $user['uid']));
            $userGroups = array();
            foreach ($groups as $group) {
                if ($group['id']) {
                    array_push($userGroups, array('id' => $group['id'],
                        'name' => $groupsInfo[$group['id']]));
                }
            }
            //get the user small photo
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersUname[$user['uid']] . '_s',
                        'sv' => $sv));
            //if the small photo not exists, check if the normal size foto exists. In this case create the small one
            if ($photo_s == '') {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersUname[$user['uid']],
                            'sv' => $sv));
                if ($photo != '' && is_writable($folder)) {
                    //create the small photo and take it
                    $file_extension = strtolower(substr(strrchr($photo, "."), 1));
                    $e = ModUtil::func('IWmain', 'user', 'thumb', array('imgSource' => $folder . '/' . $usersUname[$user['uid']] . '.' . $file_extension,
                                'imgDest' => $folder . '/' . $usersUname[$user['uid']] . '_s.' . $file_extension,
                                'new_width' => 30));
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersUname[$user['uid']] . '_s',
                                'sv' => $sv));
                }
            }
            $usersArray[] = array('uid' => $user['uid'],
                'uname' => $usersUname[$user['uid']],
                'email' => $usersMail[$user['uid']],
                'nom' => $user['nom'],
                'cognom1' => $user['cognom1'],
                'cognom2' => $user['cognom2'],
                'photo' => $photo_s,
                'groups' => $userGroups);
        }
        // Create output object
        $view = Zikula_View::getInstance('IWusers', false);
        $leters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $pager = array('numitems' => $usersNumber,
            'itemsperpage' => $numitems);
        $numitems_MS = array(array('id' => '10',
                'name' => '10'),
            array('id' => '20',
                'name' => '20'),
            array('id' => '30',
                'name' => '30'),
            array('id' => '40',
                'name' => '40'),
            array('id' => '50',
                'name' => '50'),
            array('id' => '60',
                'name' => '60'),
            array('id' => '80',
                'name' => '80'),
            array('id' => '100',
                'name' => '100'));
        $camps = array('l' => $this->__('User name'),
            'n' => $this->__('Name'),
            'c1' => $this->__('1st surname'),
            'c2' => $this->__('2nd surname'));
        $campsfiltre_MS = array(array('id' => 'l',
                'name' => $camps['l']),
            array('id' => 'n',
                'name' => $camps['n']),
            array('id' => 'c1',
                'name' => $camps['c1']),
            array('id' => 'c2',
                'name' => $camps['c2']));
        return $this->view->assign('pager', $pager)
                        ->assign('leters', $leters)
                        ->assign('numitems_MS', $numitems_MS)
                        ->assign('campsfiltre_MS', $campsfiltre_MS)
                        ->assign('inici', $inici)
                        ->assign('filtre', $filtre)
                        ->assign('campfiltre', $campfiltre)
                        ->assign('numitems', $numitems)
                        ->assign('users', $usersArray)
                        ->assign('usersNumber', $usersNumber)
                        ->fetch('IWusers_admin_main.tpl');
    }

    /**
     * Edit the list of users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The identities of the users to edit
     * @return:	The list of the edited users
     */
    public function edit($args) {

        $userId = FormUtil::getPassedValue('userId', isset($args) ? $args : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if ($userId == null) {
            LogUtil::registerError($this->__('No users have chosen'));
            return System::redirect(ModUtil::url('IWusers', 'admin', 'main'));
        }
        // get users registers
        $users = ModUtil::apiFunc('IWusers', 'user', 'get', array('multi' => $userId));
        if ($users == false) {
            LogUtil::registerError($this->__('No users found'));
            return System::redirect(ModUtil::url('IWusers', 'admin', 'main'));
        }
        $usersList = '$$';
        foreach ($users as $user) {
            $usersList .= $user['uid'] . '$$';
        }
        // Get all users info
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersNames = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'l',
                    'sv' => $sv,
                    'list' => $usersList));
        foreach ($users as $user) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersNames[$user['uid']],
                        'sv' => $sv));
            $usersArray [] = array('uname' => $user['uid'],
                'uid' => $user['uid'],
                'nom' => $user['nom'],
                'photo' => $photo,
                'cognom1' => $user['cognom1'],
                'cognom2' => $user['cognom2']);
        }

        $canChangeAvatar = true;
        //Check if the users picture folder exists
        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder')) || ModUtil::getVar('IWusers', 'usersPictureFolder') == '') {
            $canChangeAvatar = false;
        } else {
            if (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder')))
                $canChangeAvatar = false;
        }

        return $this->view->assign('users', $usersArray)
                        ->assign('canChangeAvatar', $canChangeAvatar)
                        ->assign('usersNames', $usersNames)
                        ->fetch('IWusers_admin_edit.htm');
    }

    /**
     * Update the users values
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The users values
     * @return:	Return user to main page
     */
    public function update($args) {

        $uid = FormUtil::getPassedValue('uidp', isset($args) ? $args : null, 'POST');
        $nom = FormUtil::getPassedValue('nom', isset($args) ? $args : null, 'POST');
        $cognom1 = FormUtil::getPassedValue('cognom1', isset($args) ? $args : null, 'POST');
        $cognom2 = FormUtil::getPassedValue('cognom2', isset($args) ? $args : null, 'POST');
        $deleteAvatar = FormUtil::getPassedValue('deleteAvatar', isset($args) ? $args : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        $error = false;
        if (!ModUtil::apiFunc('IWusers', 'admin', 'updateUser', array('uid' => $uid,
                    'nom' => $nom,
                    'cognom1' => $cognom1,
                    'cognom2' => $cognom2))) {
            LogUtil::registerError($this->__('There was some mistake while editing'));
            return System::redirect(ModUtil::url('IWusers', 'admin', 'main'));
        }

        $usersList = '$$';
        foreach ($uid as $u) {
            $usersList .= $u . '$$';
        }

        // Get all users info
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersNames = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'l',
                    'sv' => $sv,
                    'list' => $usersList));

        $folder = ModUtil::getVar('IWmain', 'tempFolder');
		$path = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/';
        //update avatars
        foreach ($uid as $u) {
            if ($deleteAvatar[$u] != 1) {

/* ////TODO Create common functions to avatar managing from user and admin
///////This is the old code (with some problems) and the new one takes the user function way...

                $user = 'avatar_' . $u;
                $nom_fitxer = '';
                $fileName = $_FILES['avatar_' . $u]['name'];
                $file_extension = strtolower(substr(strrchr($fileName, "."), 1));
                if ($fileName != '' && ($file_extension == 'png' || $file_extension == 'gif' || $file_extension == 'jpg')) {
                    // update the attached file to the server
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                                'folder' => $folder,
                                'fileRealName' => $_FILES['avatar_' . $u]['name'],
                                'fileNameTemp' => $_FILES['avatar_' . $u]['tmp_name'],
                                'size' => $_FILES['avatar_' . $u]['size'],
                                'allow' => '|' . $file_extension,
                                'fileName' => $usersNames[$u] . '.' . $file_extension));

                    //the function returns the error string if the update fails and and empty string if success
                    if ($update['msg'] != '') {
                        LogUtil::registerError($update['msg'] . ' ' . $this->__('Probably the note have been sent without the attached file', $dom));
                        $nom_fitxer = '';
                    } else {
                        $nom_fitxer = $update['fileName'];
                    }
                }

                //if the file has uploaded
                if ($nom_fitxer != '') {
                    for ($i = 0; $i < 2; $i++) {
                        $fileAvatarName = $usersNames[$u];
                        $userFileName = ($i == 0) ? $fileAvatarName . '.' . $file_extension : $fileAvatarName . '_s.' . $file_extension;
                        $new_width = ($i == 0) ? 90 : 30;
                        //source and destination
                        $imgSource = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $userFileName;

                        //if success $errorMsg = ''
                        $errorMsg = ModUtil::func('IWmain', 'user', 'thumb', array('imgSource' => $imgSource,
                                    'imgDest' => $imgSource,
                                    'new_width' => $new_width,
                                    'deleteOthers' => 1));
                    }

                    //delete the avatar file in temporal folder
                    unlink(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'tempFolder') . '/' . $nom_fitxer);
///////////////////////
*/
            //gets the attached file array
                $fileName = $_FILES['avatar_' . $u]['name'];
                $file_extension = strtolower(substr(strrchr($fileName, "."), 1));
                if ($file_extension != 'png' && $file_extension != 'gif' && $file_extension != 'jpg' && $fileName != '') {
                    $errorMsg = $this->__('The information has been modified, but the uplaod of the avatar has failed because the file extension is not allowed. The allowed extensions are: png, jpg and gif');
                    $fileName = '';
                }
                // update the attached file to the server
                if ($fileName != '') {
                    for ($i = 0; $i < 2; $i++) {
                        $fileAvatarName = UserUtil::getVar('uname',$u);
                        $userFileName = ($i == 0) ? $fileAvatarName . '.' . $file_extension : $fileAvatarName . '_s.' . $file_extension;
                        $new_width = ($i == 0) ? 90 : 30;
                        //source and destination
                        $imgSource = $_FILES['avatar_' . $u]['tmp_name'];
                        $prevalidated = (ModUtil::getVar('IWusers', 'avatarChangeValidationNeeded') == 1 && !SecurityUtil::checkPermission('IWusers::', "::", ACCESS_ADMIN)) ? '_' : '';
                        $imgDest = $path . $prevalidated . $userFileName;
                        //if success $errorMsg = ''
                        $errorMsg = ModUtil::func('IWmain', 'user', 'thumb', array('imgSource' => $imgSource,
                                'imgDest' => $imgDest,
                                'new_width' => $new_width,
                                'imageName' => $fileName));
                        if ($errorMsg == '') {
                            // save user avatar extension
                            if (!ModUtil::apiFunc('IWusers', 'user', 'changeAvatar', array('avatar' => UserUtil::getVar('uname',$u) . '.' . $file_extension,
                                )))
                            $errorMsg = 'Changing the avatar has failed.';
                        }
                    }
                }
                
            } else {
                ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => $usersNames[$u],
                    'extensions' => array('jpg', 'png', 'gif')));
                ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => $usersNames[$u] . '_s',
                    'extensions' => array('jpg', 'png', 'gif')));
				ModUtil::apiFunc('IWusers', 'user', 'changeAvatar', array('target' => 'avatar', 'uid' => $u,'avatar' => ''));
            }
        }

        LogUtil::registerStatus($this->__('The records have been published successfully'));
        return System::redirect(ModUtil::url('IWusers', 'admin', 'main'));
    }

    /**
     * Show the main configurable parameters needed to configurate the module IWusers
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The form with needed to change the parameters
     */
    public function config() {

        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $noWriteablePictureFolder = false;
        $noPictureFolder = false;
        //Check if the users picture folder exists
        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder')) || ModUtil::getVar('IWusers', 'usersPictureFolder') == '') {
            $noPictureFolder = true;
        } else {
            if (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder'))) {
                $noWriteablePictureFolder = true;
            }
        }

        if (extension_loaded('gd'))
            $gdAvailable = true;

        $friendsSystemAvailable = ModUtil::getVar('IWusers', 'friendsSystemAvailable');
        $invisibleGroupsInList = ModUtil::getVar('IWusers', 'invisibleGroupsInList');
        $usersCanManageName = ModUtil::getVar('IWusers', 'usersCanManageName');
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv));
        foreach ($groups as $group) {
            $checked = false;
            if (strpos($invisibleGroupsInList, '$' . $group['id'] . '$') != false) {
                $checked = true;
            }
            $groupsArray[] = array('id' => $group['id'],
                'name' => $group['name'],
                'checked' => $checked);
        }
        $multizk = (isset($GLOBALS['ZConfig']['Multisites']['multi']) && $GLOBALS['ZConfig']['Multisites']['multi'] == 1) ? 1 : 0;
        return $this->view->assign('friendsSystemAvailable', $friendsSystemAvailable)
                        ->assign('invisibleGroupsInList', $invisibleGroupsInList)
                        ->assign('usersCanManageName', $usersCanManageName)
                        ->assign('groupsArray', $groupsArray)
                        ->assign('allowUserChangeAvatar', ModUtil::getVar('IWusers', 'allowUserChangeAvatar'))
                        ->assign('avatarChangeValidationNeeded', ModUtil::getVar('IWusers', 'avatarChangeValidationNeeded'))
                        ->assign('usersPictureFolder', ModUtil::getVar('IWusers', 'usersPictureFolder'))
                        ->assign('allowUserSetTheirSex', ModUtil::getVar('IWusers', 'allowUserSetTheirSex'))
                        ->assign('allowUserDescribeTheirSelves', ModUtil::getVar('IWusers', 'allowUserDescribeTheirSelves'))
                        ->assign('noPictureFolder', $noPictureFolder)
                        ->assign('noWriteablePictureFolder', $noWriteablePictureFolder)
                        ->assign('gdAvailable', $gdAvailable)
                        ->assign('documentRoot', ModUtil::getVar('IWmain', 'documentRoot'))
                        ->assign('multizk', $multizk)
                        ->fetch('IWusers_admin_config.htm');
    }

    /**
     * Update the module configuration
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Configuration values
     * @return:	The form with needed to change the parameters
     */
    public function updateConf($args) {
        $friendsSystemAvailable = FormUtil::getPassedValue('friendsSystemAvailable', isset($args['friendsSystemAvailable']) ? $args['friendsSystemAvailable'] : 0, 'POST');
        $groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');
        $usersCanManageName = FormUtil::getPassedValue('usersCanManageName', isset($args['usersCanManageName']) ? $args['usersCanManageName'] : null, 'POST');
        $allowUserChangeAvatar = FormUtil::getPassedValue('allowUserChangeAvatar', isset($args['allowUserChangeAvatar']) ? $args['allowUserChangeAvatar'] : 0, 'POST');
        $avatarChangeValidationNeeded = FormUtil::getPassedValue('avatarChangeValidationNeeded', isset($args['avatarChangeValidationNeeded']) ? $args['avatarChangeValidationNeeded'] : 0, 'POST');
        $usersPictureFolder = FormUtil::getPassedValue('usersPictureFolder', isset($args['usersPictureFolder']) ? $args['usersPictureFolder'] : null, 'POST');
        $allowUserSetTheirSex = FormUtil::getPassedValue('allowUserSetTheirSex', isset($args['allowUserSetTheirSex']) ? $args['allowUserSetTheirSex'] : 0, 'POST');
        $allowUserDescribeTheirSelves = FormUtil::getPassedValue('allowUserDescribeTheirSelves', isset($args['allowUserDescribeTheirSelves']) ? $args['allowUserDescribeTheirSelves'] : 0, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $this->checkCsrfToken();
        $groupsString = '$';
        foreach ($groups as $group) {
            $groupsString .= '$' . $group . '$';
        }
        $this->setVar('friendsSystemAvailable', $friendsSystemAvailable)
                ->setVar('invisibleGroupsInList', $groupsString)
                ->setVar('usersPictureFolder', $usersPictureFolder)
                ->setVar('allowUserChangeAvatar', $allowUserChangeAvatar)
                ->setVar('avatarChangeValidationNeeded', $avatarChangeValidationNeeded)
                ->setVar('usersCanManageName', $usersCanManageName)
                ->setVar('allowUserSetTheirSex', $allowUserSetTheirSex)
                ->setVar('allowUserDescribeTheirSelves', $allowUserDescribeTheirSelves);
        LogUtil::registerStatus($this->__('The configuration has changed'));
        return System::redirect(ModUtil::url('IWusers', 'admin', 'config'));
    }

    /**
     * List the users who have asked for a avatar replacement
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:		The list of users
     */
    public function changeAvatarView() {
        // Security check
        if (!SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $avatars = ModUtil::apiFunc('IWusers', 'admin', 'getNotValidatedAvatars');
        if (!$avatars) {
            $avatars = array();
        }
        $path = ModUtil::getVar('IWusers', 'usersPictureFolder') . '/';
        $usersList = '';
        $users = array();

        //print_r($avatars);
        foreach ($avatars as $avatar) {
            $usersList .= $avatar['uid'] . '$$';
            $avatars[$avatar['suid']]['avatarfile'] = $path . $avatar['avatar'];
            $avatars[$avatar['suid']]['newavatarfile'] = $path . '_' . $avatar['newavatar'];
        }
               
        if ($usersList != '') {
            //get all users information
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                        'info' => 'ncc',
                        'list' => $usersList));
        }
        return $this->view->assign('users', $users)
                        ->assign('avatars', $avatars)
                        ->assign('path', $path)
                        ->fetch('IWusers_admin_changeAvatarView.htm');
    }

    /**
     * Import users from CSV file. 
     * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
     * **CSV File header** Allowed fields: uname,new_uname,email,password,forcechgpass,activated,firstname,lastname1,lastname2,birthdate,gender,code,in,out
     * Fields "in" and "out" contains group IDs where the user will be added or removed, separated by "|" char
     * Deletions will be made before insertions.
     * 
     */
    public function import(){
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN));
        // Sincronize tables users & IWUsers 
        ModUtil::apiFunc($this->name, 'admin', 'sincronize');
        $view = Zikula_View::getInstance($this->name);
        
        if ($this->request->isPost()) {
            $this->checkCsrfToken();
            $importFile = $this->request->files->get('importFile', null);
            $delimiter  = $this->request->request->get('delimiter', ';');
            // 1. Validate file: header & structure
            if (is_null($importFile)) {
                LogUtil::registerError($this->__('File error. Probably exceeds max. file size.'));
            } else {
                // Header fields table equivalents
                $headerTrans =array('uname'       => 'uname', 
                                    'new_uname'   => 'new_uname', 
                                    'email'       => 'email',
                                    'code'        => 'code',
                                    'password'    => 'password',
                                    'forcechgpass'=> 'forcechgpass',
                                    'activated'   => 'activated',
                                    'firstname'   => 'nom',
                                    'lastname1'   => 'cognom1',
                                    'lastname2'   => 'cognom2',
                                    'description' => 'description',
                                    'birthdate'   => 'naixement',
                                    'gender'      => 'sex',
                                    'in'          => 'in',
                                    'out'         => 'out'
                    );

                $import = new CsvImporter($importFile['tmp_name'],true, $headerTrans, $delimiter);  
                $header  = $import->getHeader();
                $oHeader = $import->getOriHeader();
                
                $check  = ModUtil::apiFunc($this->name, 'admin', 'checkCsvHeader', $header);
                // Check CSV file header
                if (!$check['correcte']) {
                    // CSV header incorrect
                    LogUtil::registerError($check['msg']);
                } else {
                    // Get CSV file content
                    $data = $import->get();
                    // Initialize 
                    $update = array();
                    $insert = array();
                    $optimizeGroups = ((in_array('in', $header)) || (in_array('out', $header)));
                    $forcechgpass   = in_array('forcechgpass', $header);
                    $iErrors = array();
                    // Check file info
                    foreach ($data as &$line) {
                        $uid = UserUtil::getIdFromName($line['uname']);
                        if ($optimizeGroups) {
                            $res = ModUtil::apiFunc($this->name, 'admin', 'optimizeGroups', array('uid' => $uid, 'data'=> $line));
                            $line['in'] = $res['in'];
                            $line['out'] = $res['out'];                            
                        }                            
                        if ($uid){       
                            $line['uid'] = $uid;
                            // Update
                            if (isset($line['activated'])){
                                if ($line['activated']!=""){
                                    $line['activated'] = $line['activated'] == '0' ? 0 : 1;                                    
                                } else {
                                    // Mantain actual value
                                    $line['activated'] = DBUtil::selectField('users', 'activated', 'uid='.$uid);
                                }                                
                            }
                            $update[] = $line;                                
                        } else {
                            // Insert new user
                            if ($line['uname'] !=""){
                                if (!isset($line['activated']) || (isset($line['activated']) && $line['activated']!='0')) $line['activated'] = 1;
                                $insert[] = $line;
                            } else {
                                // Error. No username 
                                $line['error'] = $this->__('No username.');
                                $iErrors[] = $line;
                            }
                        }                            
                    }
                    // Process file information
                    $allChanges = ModUtil::apiFunc($this->name, 'admin', 'applyCsvValues', array('update' => $update, 'insert' =>$insert));               
                    unset($update); $update = array();
                    unset($insert); $insert = array();
                    foreach ($allChanges as $user){                       
                        switch ($user['action']){
                            case 'm':
                                $update[] = $user;
                                break;
                            default:
                                $insert[] = $user;
                        }
                        if (isset($user['error'])){ 
                            // There are errors
                            $iErrors[] = $user;
                        }
                    }
                    $view->assign('insert', $insert);
                    $view->assign('update', $update);
                    $view->assign('iErrors', $iErrors);
                    $view->assign('header', $oHeader);
                    $view->assign('hc', count($oHeader));
                    return $view->fetch('IWusers_admin_importResults.tpl');        

                } // File header is correct
            } // exist import file                
        } // Is POST
         
        // Get zikula groups name and gid
        $g = UserUtil::getGroups('','name');
        foreach ($g as $key => $value) {
            $groupInfo[] = array_slice($value,0,2);
        }
                
        $view->assign('post_max_size', ini_get('post_max_size'));
        $view->assign('groupInfo', $groupInfo);
        
        return $view->fetch('IWusers_admin_import.tpl');        
    }
        

    public function exporter($args){
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN));
        
        // Sincronize tables users & IWusers
        ModUtil::apiFunc($this->name, 'admin', 'sincronize');
        
        $view = Zikula_View::getInstance($this->name);
        if ($this->request->isPost()) {
            // Returning from a form POST operation. Process the input.
            //$this->checkCsrfToken();
            // Get fields selection
            $d = date('YmdHi') ;
            $defaultFilename  = "exportUsers". $d. '.csv';
            $email        = $this->request->request->get('export_email', 0);
            $activated    = $this->request->request->get('export_activated', 0);
            $iw_nom       = $this->request->request->get('export_firstname', 0);
            $iw_cognom1   = $this->request->request->get('export_lastname1', 0);
            $iw_cognom2   = $this->request->request->get('export_lastname2', 0);
            $iw_naixement = $this->request->request->get('export_birthdate', 0);
            $iw_sex       = $this->request->request->get('export_gender', 0);
            $export_groups= $this->request->request->get('export_groups', 0);
            $filename     = $this->request->request->get('filename','');
            if (!$filename) $filename =  $defaultFilename;
            $delimiter    = $this->request->request->get('delimiter', ';');
            
            // Generate CSV file
            // Get database values
            $optFields = array();
            $optFields =compact("email", 
                                "activated",
                                "iw_nom",
                                "iw_cognom1", 
                                "iw_cognom2",
                                "iw_naixement",
                                "iw_sex",
                                "export_groups");
            // Form fields
            $view->assign('export_email',$email );
            $view->assign('export_activated',$activated );
            $view->assign('export_firstname',$iw_nom );
            $view->assign('export_lastname1',$iw_cognom1);
            $view->assign('export_lastname2',$iw_cognom2 );
            $view->assign('export_birhtdate',$iw_naixement );
            $view->assign('export_gender',$iw_sex );
            $view->assign('export_groups',$export_groups );
                        
            // Get users info CSV file
            $rs = ModUtil::apiFunc($this->name, 'admin', 'exportToCsv', array('optFields' => $optFields, 'filename' => $filename, 'delimiter' => $delimiter));     
        }               
        return $view->fetch('IWusers_admin_export.tpl');          
    }        
    
    /**
     * Display a form to confirm the deletion of one user, and then process the deletion.
     *
     * Parameters passed via GET:
     * --------------------------
     * numeric userid The user id of the user to be deleted.
     * string  uname  The user name of the user to be deleted.
     *
     * Parameters passed via POST:
     * ---------------------------
     * array   userid         The array of user ids of the users to be deleted.
     * boolean process_delete True to process the posted userid list, and delete the corresponding accounts; false or null to confirm first.
     *
     * Parameters passed via SESSION:
     * ------------------------------
     * None.
     *
     * @return string HTML string containing the rendered template.
     *
     * @throws Zikula_Exception_Forbidden Thrown if the current user does not have delete access, or if the method of accessing this function is improper.
     */
        
    public function deleteUsers()
    {
        // check permissions
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWusers::', '::', ACCESS_DELETE));

        $proceedToForm = false;
        $processDelete = false;

        if ($this->request->isPost()) {
            $userid = $this->request->request->get('userId', null);
            $processDelete = $this->request->request->get('process_delete', false);            
            $proceedToForm = !$processDelete;            
        } elseif ($this->request->isGet()) {
            $userid = $this->request->query->get('uid', null);
            $uname  = $this->request->query->get('uname', null);

            // retreive userid from uname
            if (empty($userid) && !empty($uname)) {
                $userid = UserUtil::getIdFromName($users);
            }

            $proceedToForm = true;
        } else {
            throw new Zikula_Exception_Forbidden();
        }

        if (empty($userid)) {            
            $this->registerError($this->__('No users have chosen'));
            $proceedToForm = false;
            $userid = array();
        } elseif (!is_array($userid)) {
            $userid = array($userid);
        } 
                    
        $currentUser = UserUtil::getVar('uid');
        $users = array();  
        foreach ($userid as $key => $uid) {
            if ($uid == 1) {
                $this->registerError($this->__("Error! You can't delete the guest account."));
                $proceedToForm = false;
                $processDelete = false;
            } elseif ($uid == 2) {
                $this->registerError($this->__("Error! You can't delete the primary administrator account."));
                $proceedToForm = false;
                $processDelete = false;
            } elseif ($uid == $currentUser) {
                $this->registerError($this->__("Error! You can't delete the account you are currently logged into."));
                $proceedToForm = false;
                $processDelete = false;
            }

            // get the user vars
            $users[$key] = UserUtil::getVars($uid);

            if (empty($users[$key])) {
                $this->registerError($this->__('Sorry! No such user found.'));
                $proceedToForm = false;
                $processDelete = false;
            }
        }

        if ($processDelete) {      
            $this->checkCsrfToken();
            $valid = true;
            foreach ($userid as $uid) {
                $event = new Zikula_Event('module.users.ui.validate_delete', null, array('id' => $uid), new Zikula_Hook_ValidationProviders());
                $validators = $this->eventManager->notify($event)->getData();

                $hook = new Zikula_ValidationHook('users.ui_hooks.user.validate_delete', $validators);
                $this->notifyHooks($hook);
                $validators = $hook->getValidators();

                if ($validators->hasErrors()) {
                    $valid = false;
                }
            }

            $proceedToForm = false;
            if ($valid) {
                $deleted = ModUtil::apiFunc($this->name, 'admin', 'deleteUser', array('uid' => $userid));

                if ($deleted) {
                    foreach ($userid as $uid) {
                        $event = new Zikula_Event('module.users.ui.process_delete', null, array('id' => $uid));
                        $this->eventManager->notify($event);

                        $hook = new Zikula_ProcessHook('users.ui_hooks.user.process_delete', $uid);
                        $this->notifyHooks($hook);
                    }
                    $count = count($userid);
                    $this->registerStatus($this->_fn('Done! Deleted %1$d user account.', 'Done! Deleted %1$d user accounts.', $count, array($count)));
                }
            }
        }

        if ($proceedToForm) {
            return $this->view->assign('users', $users)
                ->fetch('IWusers_admin_deleteusers.tpl');
        } else {
            $this->redirect(ModUtil::url($this->name, 'admin', 'main'));
        }
    }

}
