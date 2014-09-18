<?php

class IWmain_Controller_User extends Zikula_AbstractController {

    protected function postInitialize() {
        // Set caching to false by default.
        $this->view->setCaching(false);
    }

    /**
     * Show a form for some user configurable parameters
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return: Show the form with the configurable parameters
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmain::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        $uid = UserUtil::getVar('uid');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $blockFlaggedDetails = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'blockFlaggedDetails',
                    'module' => 'IWmain_block_news',
                    'uid' => $uid,
                    'sv' => $sv));

        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $subscribeNews = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'subscribeNews',
                    'module' => 'IWmain_cron',
                    'uid' => $uid,
                    'sv' => $sv));
        //get the last cron successfull response
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $lastCronSuccessfull = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => -100,
                    'name' => 'lastCronSuccessfull',
                    'module' => 'IWmain_cron',
                    'sv' => $sv));
        $lastCronSuccessfullTime = ($lastCronSuccessfull <> '') ? date('M, d Y - H.i', $lastCronSuccessfull) : '';
        $time = time();

        $cronNotWorks = 0;
        if ($lastCronSuccessfullTime == '' || $lastCronSuccessfull < $time - 5 * 24 * 60 * 60) {
            $cronNotWorks = 1;
        }

        //get user mail
        //get the last cron successfull response
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userMail = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => $uid,
                    'sv' => $sv,
                    'info' => 'e'));
        // Checks if module IWagendas is installed. If it exists and the zend functions are available the google options are available
        $modid = ModUtil::getIdFromName('IWagendas');
        $modinfo = ModUtil::getInfo($modid);
        $zendFuncAvailable = ($modinfo['state'] == 3 &&
                $modinfo['version'] > '1.3' &&
                ModUtil::getVar('IWagendas', 'allowGCalendar') == 1 &&
                ModUtil::func('IWagendas', 'user', 'getGdataFunctionsAvailability')) ? true : false;

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $gCalendarUse = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'gCalendarUse',
                    'module' => 'IWagendas',
                    'uid' => $uid,
                    'sv' => $sv));
        //get the last cron successfull response
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $gUserName = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                    'name' => 'gUserName',
                    'module' => 'IWagendas',
                    'sv' => $sv));
        //get the last cron successfull response
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $gRefreshTime = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                    'name' => 'gRefreshTime',
                    'module' => 'IWagendas',
                    'sv' => $sv));

        return $this->view->assign('cronNotWorks', $cronNotWorks)
                        ->assign('zendFuncAvailable', $zendFuncAvailable)
                        ->assign('blockFlaggedDetails', $blockFlaggedDetails)
                        ->assign('gCalendarUse', $gCalendarUse)
                        ->assign('gUserName', $gUserName)
                        ->assign('gRefreshTime', $gRefreshTime)
                        ->assign('subscribeNews', $subscribeNews)
                        ->assign('userMail', $userMail)
                        ->fetch('IWmain_user_main.htm');
    }

    /**
     * Update the user parameters
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return: Return user to form
     */
    public function updateconfig($args) {
        $details = FormUtil::getPassedValue('details', isset($args['details']) ? $args['details'] : null, 'POST');
        $cron = FormUtil::getPassedValue('cron', isset($args['cron']) ? $args['cron'] : null, 'POST');
        $cronWorks = FormUtil::getPassedValue('cronWorks', isset($args['cronWorks']) ? $args['cronWorks'] : null, 'POST');
        $gCalendarUse = FormUtil::getPassedValue('gCalendarUse', isset($args['gCalendarUse']) ? $args['gCalendarUse'] : null, 'POST');
        $gUserName = FormUtil::getPassedValue('gUserName', isset($args['gUserName']) ? $args['gUserName'] : null, 'POST');
        $gUserPass = FormUtil::getPassedValue('gUserPass', isset($args['gUserPass']) ? $args['gUserPass'] : null, 'POST');
        $gRefreshTime = FormUtil::getPassedValue('gRefreshTime', isset($args['gRefreshTime']) ? $args['gRefreshTime'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWmain::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        $uid = UserUtil::getVar('uid');
        if ($details != null) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                        'name' => 'blockFlaggedDetails',
                        'module' => 'IWmain_block_news',
                        'sv' => $sv,
                        'value' => '1'));
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userDelVar', array('uid' => $uid,
                        'name' => 'blockFlaggedDetails',
                        'module' => 'IWmain_block_news',
                        'sv' => $sv));
        }
        if ($gCalendarUse != null) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                        'name' => 'gCalendarUse',
                        'module' => 'IWagendas',
                        'sv' => $sv,
                        'value' => '1'));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                        'name' => 'gUserName',
                        'module' => 'IWagendas',
                        'sv' => $sv,
                        'value' => $gUserName));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                        'name' => 'gRefreshTime',
                        'module' => 'IWagendas',
                        'sv' => $sv,
                        'value' => $gRefreshTime));
            if ($gUserPass != '') {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $result = ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                            'name' => 'gUserPass',
                            'module' => 'IWagendas',
                            'sv' => $sv,
                            'value' => base64_encode($gUserPass)));
            }
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userDelVar', array('uid' => $uid,
                        'name' => 'gCalendarUse',
                        'module' => 'IWagendas',
                        'sv' => $sv));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userDelVar', array('uid' => $uid,
                        'name' => 'gUserName',
                        'module' => 'IWagendas',
                        'sv' => $sv));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userDelVar', array('uid' => $uid,
                        'name' => 'gUserPass',
                        'module' => 'IWagendas',
                        'sv' => $sv));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $result = ModUtil::func('IWmain', 'user', 'userDelVar', array('uid' => $uid,
                        'name' => 'gRefreshTime',
                        'module' => 'IWagendas',
                        'sv' => $sv));
        }
        if ($cronWorks != null) {
            if ($cron != null) {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $result = ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                            'name' => 'subscribeNews',
                            'module' => 'IWmain_cron',
                            'sv' => $sv,
                            'value' => '1'));
            } else {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $result = ModUtil::func('IWmain', 'user', 'userDelVar', array('uid' => $uid,
                            'name' => 'subscribeNews',
                            'module' => 'IWmain_cron',
                            'sv' => $sv));
            }
        }

        if ($errorMsg != '') {
            LogUtil::registerError($errorMsg);
        } else {
            //Successfull
            LogUtil::registerStatus($this->__('The values have changed correctly'));
        }
        //delete flagged block content
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $result = ModUtil::func('IWmain', 'user', 'userDelVar', array('uid' => UserUtil::getVar('uid'),
                    'name' => 'flagged',
                    'module' => 'IWmain_block_flagged',
                    'sv' => $sv));
        return System::redirect(ModUtil::url('IWmain', 'user', 'main'));
    }

    /**
     * Create a thumb image for users avatars
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	image source
     * @param	image destination
     * @param	the width for the new image
     * @return	The module information
     */
    public function thumb($args) {
        $imgSource = FormUtil::getPassedValue('imgSource', isset($args['imgSource']) ? $args['imgSource'] : null, 'POST');
        $imgDest = FormUtil::getPassedValue('imgDest', isset($args['imgDest']) ? $args['imgDest'] : null, 'POST');
        $new_width = FormUtil::getPassedValue('new_width', isset($args['new_width']) ? $args['new_width'] : null, 'POST');
        $deleteOthers = FormUtil::getPassedValue('deleteOthers', isset($args['deleteOthers']) ? $args['deleteOthers'] : null, 'POST');
        $imageName = FormUtil::getPassedValue('imageName', isset($args['imageName']) ? $args['imageName'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWmain::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $msg = ModUtil::func('IWmain', 'user', 'thumbnail', array('sv' => $sv,
                    'imgSource' => $imgSource,
                    'imgDest' => $imgDest,
                    'widthImg' => $new_width,
                    'heightImg' => 0,
                    'imageName' => $imageName));
        if ($msg != '')
            return $msg;
        $avatarName = strtolower(substr(strrchr($imgDest, "/"), 1));
        $avatarName = substr($avatarName, 0, -4);
        //Success. In this case delete possible pictures in others diferents formats
        if (ModUtil::getVar('IWusers', 'avatarChangeValidationNeeded') != 1 || $deleteOthers == 1) {
            ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => $avatarName,
                'extensions' => $formats));
            ModUtil::func('IWusers', 'user', 'deleteAvatar', array('avatarName' => $avatarName . '_s',
                'extensions' => $formats));
        }
        return '';
    }

    /**
     * Save the news that have the user in the different modules iw
     *
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	$where:
     * 			res->All
     * 			fo->Forums
     * 			fu->Forms
     * 			me->Messages
     * 			ta->Noteboard
     * 			ag->Agendas
     * @return	The news prepared for HTML seen
     */
    public function news($args) {
        $where = FormUtil::getPassedValue('where', isset($args['where']) ? $args['where'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            $requestByCron = true;
        }
        if ($uid == null) {
            $uid = UserUtil::getVar('uid');
        }
        $before = '';
        $after = '';
        $newsArray = array();
        $realUid = UserUtil::getVar('uid');
        if ($where != '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $news = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'module' => 'IWmain_block_news',
                        'name' => 'news',
                        'sv' => $sv,
                        'nult' => true));
            $init = '<!---' . $where . '--->';
            $end = '<!---/' . $where . '--->';
            $pos_init = strpos($news, $init);
            $pos_end = ModUtil::func('IWmain', 'user', 'stringrpos', array('sHaystack' => $news,
                        'sNeedle' => $end));
            $calc = strlen($news) - $pos_end;
            $before = substr($news, 0, $pos_init);
            $after = substr($news, - $calc);
        }

        //IWnoteboard
        $modid = ModUtil::getIdFromName('IWnoteboard');
        $modinfo = ModUtil::getInfo($modid);
        //if module is active
        if ($modinfo['state'] == 3 && ($where == 'ta' || $where == '')) {
            //Check that user can access the module
            if (SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_READ) || $requestByCron) {
                //Get news of the user
                if ($uid != $realUid) {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                }
                $noves = ModUtil::apiFunc('IWnoteboard', 'user', 'noves', array('uid' => $uid,
                            'sv' => $sv));
                if ($noves['nombre'] > 0) {
                    $newsArray[] = array('code' => '<!---ta--->');
                    $newsArray[] = array('code' => '',
                        'nNotes' => $noves['nombre'],
                        'url' => ModUtil::getVar('IWmain', 'URLBase') . 'index.php?module=IWnoteboard&func=main',
                        'element' => $this->__('Noteboard notes'),
                        'title' => '');
                    $newsArray[] = array('code' => '<!---/ta--->');
                }
            }
        }

        //IWagendas
        $modid = ModUtil::getIdFromName('IWagendas');
        $modinfo = ModUtil::getInfo($modid);
        //if module is active
        if ($modinfo['state'] == 3 && ($where == 'ag' || $where == '')) {
            //Check that user can access the module
            if (SecurityUtil::checkPermission('IWagendas::', "::", ACCESS_READ) || $requestByCron) {
                if ($uid != $realUid) {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                }
                $noves = ModUtil::apiFunc('IWagendas', 'user', 'newItem', array('uid' => $uid,
                            'sv' => $sv));
                //Get user news in agendas
                if ($noves > 0) {
                    $newsArray[] = array('code' => '<!---ag--->');
                    $newsArray[] = array('code' => '',
                        'nNotes' => $noves,
                        'url' => ModUtil::getVar('IWmain', 'URLBase') . 'index.php?module=IWagendas',
                        'element' => $this->__('Personal agenda'),
                        'title' => '');
                    $newsArray[] = array('code' => '<!---/ag--->');
                }
            }
        }

        //Private messages
        $modid = ModUtil::getIdFromName('IWmessages');
        $modinfo = ModUtil::getInfo($modid);
        //if module is active
        if ($modinfo['state'] == 3 && ($where == 'me' || $where == '')) {
            if (SecurityUtil::checkPermission('IWmessages::', "::", ACCESS_READ) || $requestByCron) {
                if ($uid != $realUid) {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                }
                $noves = ModUtil::apiFunc('IWmessages', 'user', 'countitems', array('uid' => $uid,
                            'unread' => true,
                            'sv' => $sv));
                if ($noves > 0) {
                    $newsArray[] = array('code' => '<!---me--->');
                    $newsArray[] = array('code' => '',
                        'nNotes' => $noves,
                        'url' => ModUtil::getVar('IWmain', 'URLBase') . 'index.php?module=IWmessages&func=main',
                        'element' => $this->__('Private messages'),
                        'title' => '');
                    $newsArray[] = array('code' => '<!---/me--->');
                }
            }
        }

        //IWforums
        $modid = ModUtil::getIdFromName('IWforums');
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3 && ($where == 'fo' || $where == '')) {
            if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) || $requestByCron) {
                if ($uid != $realUid) {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                }
                $registres = ModUtil::apiFunc('IWforums', 'user', 'getall', array('uid' => $uid,
                            'sv' => $sv));
                $newsArray[] = array('code' => '<!---fo--->');
                foreach ($registres as $registre) {
                    if ($uid != $realUid) {
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    }
                    if ($registre['actiu'] == 1 && ModUtil::func('IWforums', 'user', 'access', array('fid' => $registre['fid'],
                                'uid' => $uid, 'sv' => $sv)) > 0) {
                        if ($uid != $realUid) {
                            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        }
                        $noves = ModUtil::apiFunc('IWforums', 'user', 'compta_msg', array('fid' => $registre['fid'],
                                    'tots' => true,
                                    'uid' => $uid,
                                    'sv' => $sv));
                        if ($noves['nollegits'] > 0) {
                            $newsArray[] = array('code' => '',
                                'nNotes' => $noves['nollegits'],
                                'url' => ModUtil::getVar('IWmain', 'URLBase') . 'index.php?module=IWforums&func=forum&fid=' . $registre['fid'],
                                'element' => $this->__('Forum'),
                                'title' => $registre['nom_forum']);
                        }
                    }
                }
                $newsArray[] = array('code' => '<!---/fo--->');
            }
        }

        //IWforms
        $modid = ModUtil::getIdFromName('IWforms');
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3 && ($where == 'fu' || $where == '')) {
            if (SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ) || $requestByCron) {
                //get all the active forms
                if ($uid != $realUid) {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                }
                $forms = ModUtil::apiFunc('IWforms', 'user', 'getAllForms', array('user' => 1,
                            'sv' => $sv));
                //get all the groups of the user
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $userGroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('uid' => $uid,
                            'sv' => $sv));
                foreach ($userGroups as $group) {
                    $userGroupsArray[] = $group['id'];
                }
            }
            foreach ($forms as $form) {
                if ($uid != $realUid) {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                }
                $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $form['fid'],
                            'userGroups' => $userGroupsArray,
                            'uid' => $uid,
                            'sv' => $sv));
                $newsArray[] = array('code' => '<!---fu--->');
                if ($access['level'] > 1) {
                    // get not view user news
                    if ($uid != $realUid) {
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    }
                    $nNotes = ModUtil::apiFunc('IWforms', 'user', 'getNewNotes', array('fid' => $form['fid'],
                                'uid' => $uid,
                                'sv' => $sv));
                    if (count($nNotes) > 0) {
                        // user can read the notes
                        $url = ($access['level'] == 7) ? ModUtil::getVar('IWmain', 'URLBase') . 'index.php?module=IWforms&func=manage&fid=' . $form['fid'] : ModUtil::getVar('IWmain', 'URLBase') . 'index.php?module=IWforms&func=read&fid=' . $form['fid'];
                        $newsArray[] = array('code' => '',
                            'nNotes' => count($nNotes),
                            'url' => $url,
                            'element' => $this->__('Form'),
                            'title' => $form['formName']);
                    }
                }
                $newsArray[] = array('code' => '<!---/fu--->');
            }
        }

        //Change avatar requests
        if (SecurityUtil::checkPermission('IWusers::', '::', ACCESS_ADMIN) && ($where == 'ch' || $where == '')) {
            $avatars = ModUtil::apifunc('IWusers', 'admin', 'getNotValidatedAvatars');
            if (count($avatars) > 0) {
                $newsArray[] = array('code' => '<!---ch--->');
                $newsArray[] = array('code' => '',
                    'nNotes' => count($avatars),
                    'url' => ModUtil::getVar('IWmain', 'URLBase') . 'index.php?module=IWusers&type=admin&func=changeAvatarView',
                    'element' => $this->__('Avatar replacement'),
                    'title' => '');
                $newsArray[] = array('code' => '<!---/ch--->');
            }
        }

        $news = $this->view->assign('newsArray', $newsArray)
                ->fetch('IWmain_block_news.htm');

        $news = $before . $news . $after;
        $news = str_replace('\'', '&acute;', $news);

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
            'name' => 'news',
            'module' => 'IWmain_block_news',
            'sv' => $sv,
            'value' => $news,
            'lifetime' => '700'));

        return true;
    }

    public function stringrpos($args) {
        $sNeedle = FormUtil::getPassedValue('sNeedle', isset($args['sNeedle']) ? $args['sNeedle'] : null, 'POST');
        $sHaystack = FormUtil::getPassedValue('sHaystack', isset($args['sHaystack']) ? $args['sHaystack'] : null, 'POST');
        $i = strlen($sHaystack);
        while (substr($sHaystack, $i, strlen($sNeedle)) != $sNeedle) {
            $i--;
            if ($i < 0) {
                return false;
            }
        }
        return $i;
    }

    /**
     * Save the news that have the user in the different modules iw
     *
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param	$where:
     * 			res->All
     * 			fo->Forums
     * 			fu->Forms
     * 			me->Messages
     * 			ta->Noteboard
     * @return	The news prepared for HTML seen
     */
    public function flagged($args) {
        $where = FormUtil::getPassedValue('where', isset($args['where']) ? $args['where'] : null, 'POST');
        $chars = FormUtil::getPassedValue('chars', isset($args['chars']) ? $args['chars'] : null, 'POST');
        $before = '';
        $after = '';
        $out = '';
        $flaggedArray = array();
        if ($where != '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $flags = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => UserUtil::getVar('uid'),
                        'module' => 'IWmain_block_flagged',
                        'name' => 'flagged',
                        'sv' => $sv,
                        'nult' => true));
            $init = '<!---' . $where . '--->';
            $end = '<!---/' . $where . '--->';
            $pos_init = strpos($flags, $init);
            $pos_end = ModUtil::func('IWmain', 'user', 'stringrposFlagged', array('flags' => $flags,
                        'end' => $end));
            $calc = strlen($flags) - $pos_end;
            $before = substr($flags, 0, $pos_init);
            $after = substr($flags, - $calc);
        }
        $uid = UserUtil::getVar('uid');
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $blockFlaggedDetails = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'blockFlaggedDetails',
                    'module' => 'IWmain_block_news',
                    'uid' => $uid,
                    'sv' => $sv));
        if ($before == '') {
            $out = '<table width="100%">';
        }
        //For each intraweb module check if it is active and if user can access to it. In this case check if user have flagged posts in the module
        //IWnoteboard
        $modid = ModUtil::getIdFromName('IWnoteboard');
        $modinfo = ModUtil::getInfo($modid);
        //if module is active
        if ($modinfo['state'] == 3 && ($where == 'ta' || $where == '')) {
            //Check that user can access the module
            if (SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_READ)) {
                //Get the notes that user has flagged
                $flagged = ModUtil::apiFunc('IWnoteboard', 'user', 'getFlagged');
                // Get the user permissions in noteboard
                $permissions = ModUtil::apiFunc('IWnoteboard', 'user', 'permisos', array('uid' => $uid));
                //Check if user can access the notes
                foreach ($flagged as $registre) {
                    // insert the list of groups that have access to the note into an array
                    $grups_acces = explode('$', $registre['destinataris']);
                    $esta_en_grups_acces = array_intersect($grups_acces, $permissions['grups']);
                    $pos = strpos($registre['no_mostrar'], '$' . $uid . '$');
                    if ((($registre['verifica'] == 1 &&
                            (count($esta_en_grups_acces) >= 1 ||
                            $uid == $registre['informa'])) ||
                            $permissions['potverificar']) &&
                            $pos == 0) {
                        $flaggedArray[] = array('noticia' => trim($this->cutTextFlagged(strip_tags($registre['noticia']), $chars)),
                            'nid' => $registre['nid']);
                    }
                }
                $out .= '<!---ta--->';
                if (count($flaggedArray) > 0) {
                    $out .= '<tr>';
                    $out .= '<td align="left" valign="top">';
                    $out .= '<a href="index.php?module=IWnoteboard&func=main">' . $this->__('Noteboard notes') . '</a>';
                    $out .= '</td>';
                    $out .= '<td align="right" valign="top">';
                    $out .= count($flaggedArray);
                    $out .= '</td>';
                    $out .= '</tr>';
                    if ($blockFlaggedDetails) {
                        foreach ($flaggedArray as $flagged) {
                            $out .= '<tr>';
                            $out .= '<td align="left" valign="top" colspan ="2">';
                            $out .= str_repeat("&nbsp;", 5) . '-&nbsp;<a href="index.php?module=IWnoteboard&nid=' . $flagged['nid'] . '">' . $flagged['noticia'] . '</a>';
                            $out .= '</td>';
                            $out .= '</tr>';
                        }
                    }
                }
                $out .= '<!---/ta--->';
            }
        }
        //Private messages
        $modid = ModUtil::getIdFromName('IWmessages');
        $modinfo = ModUtil::getInfo($modid);
        //if module is active
        if ($modinfo['state'] == 3 && ($where == 'me' || $where == '')) {
            if (SecurityUtil::checkPermission('IWmessages::', "::", ACCESS_READ)) {
                $flagged = ModUtil::apiFunc('IWmessages', 'user', 'getFlagged');
                $flaggedArray = array();
                foreach ($flagged as $flag) {
                    $flaggedArray[] = array('subject' => $flag['subject'],
                        'msgid' => $flag['msg_id']);
                }
                $out .= '<!---me--->';
                if (count($flaggedArray) > 0) {
                    $out .= '<tr>';
                    $out .= '<td align="left" valign="top">';
                    $out .= '<a href="index.php?module=IWmessages">' . $this->__('Private messages') . '</a>';
                    $out .= '</td>';
                    $out .= '<td align="right" valign="top">';
                    $out .= count($flaggedArray);
                    $out .= '</td>';
                    $out .= '</tr>';
                    if ($blockFlaggedDetails) {
                        foreach ($flaggedArray as $flagged) {
                            $out .= '<tr>';
                            $out .= '<td align="left" valign="top" colspan ="2">';
                            $out .= str_repeat("&nbsp;", 5) . '-&nbsp;<a href="index.php?module=IWmessages&func=display&msgid=' . $flagged['msgid'] . '&qui=d">' . $this->cutTextFlagged($flagged['subject'], $chars) . '</a>';
                            $out .= '</td>';
                            $out .= '</tr>';
                        }
                    }
                }
                $out .= '<!---/me--->';
            }
        }
        //IWforums
        $modid = ModUtil::getIdFromName('IWforums');
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3 && ($where == 'fo' || $where == '')) {
            if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ)) {
                //get all forums
                $forumsArray = Array();
                $forums = ModUtil::apiFunc('IWforums', 'user', 'getall', array('filter' => '1'));
                foreach ($forums as $forum) {
                    $n_msg = ModUtil::apiFunc('IWforums', 'user', 'compta_msg', array('fid' => $forum['fid'],
                                'tots' => true));
                    $marcats = $n_msg['marcats'];
                    $forumsArray[] = array('fid' => $forum['fid'],
                        'name' => $forum['nom_forum'],
                        'marcats' => $marcats);
                }
                $out .= '<!---fo--->';
                foreach ($forumsArray as $forum) {
                    if ($forum['marcats'] > 0) {
                        $flagged = ModUtil::apiFunc('IWforums', 'user', 'getFlagged', array('fid' => $forum['fid']));
                        $flaggedArray = array();
                        foreach ($flagged as $registre) {
                            if (ModUtil::func('IWforums', 'user', 'access', array('fid' => $registre['fid']))) {
                                $oid = ($registre['idparent'] == 0) ? $registre['fmid'] : $registre['idparent'];
                                $flaggedArray[] = array('titol' => trim($this->cutTextFlagged(strip_tags($registre['titol']), $chars)),
                                    'fmid' => $registre['fmid'],
                                    'ftid' => $registre['ftid'],
                                    'oid' => $oid,
                                    'fid' => $registre['fid']);
                            }
                        }
                        $out .= '<tr>';
                        $out .= '<td align="left" valign="top">';
                        $out .= '<a href="index.php?module=IWforums&func=forum&fid=' . $forum['fid'] . '">' . $this->__('Forum') . ' - ' . $forum['name'] . '</a>';
                        $out .= '</td>';
                        $out .= '<td align="right" valign="top">';
                        $out .= $forum['marcats'];
                        $out .= '</td>';
                        $out .= '</tr>';
                        if ($blockFlaggedDetails) {
                            foreach ($flaggedArray as $flagged) {
                                $out .= '<tr>';
                                $out .= '<td align="left" valign="top" colspan ="2">';
                                $out .= str_repeat("&nbsp;", 5) . '-&nbsp;<a href="index.php?module=IWforums&func=msg&fmid=' . $flagged['fmid'] . '&ftid=' . $flagged['ftid'] . '&fid=' . $flagged['fid'] . '&oid=' . $flagged['oid'] . '">' . $flagged['titol'] . '</a>';
                                $out .= '</td>';
                                $out .= '</tr>';
                            }
                        }
                    }
                }
                $out .= '<!---/fo--->';
            }
        }
        //IWforms
        $modid = ModUtil::getIdFromName('IWforms');
        $modinfo = ModUtil::getInfo($modid);
        //Si el mòdul està actiu
        if ($modinfo['state'] == 3 && ($where == 'fr' || $where == '')) {
            if (SecurityUtil::checkPermission('IWforms::', "::", ACCESS_READ)) {
                //Get the notes that user has flagged
                $flagged = ModUtil::apiFunc('IWforms', 'user', 'getWhereFlagged');
                $flaggedArray = array();
                $formsArray = array();
                //Check if user can access the forms as validator
                foreach ($flagged as $flag) {
                    //get form information
                    $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $flag['fid']));
                    if ($access['level'] == 7) {
                        $formx = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $flag['fid']));
                        $formsArray[] = array('name' => trim($this->cutTextFlagged(strip_tags($formx['formName']), $chars)),
                            'fid' => $formx['fid']);
                    }
                }
                $out .= '<!---fr--->';
                $usersList = '';
                foreach ($formsArray as $form) {
                    $flaggeds = ModUtil::apiFunc('IWforms', 'user', 'getFlagged', array('fid' => $form['fid']));
                    foreach ($flaggeds as $flagged) {
                        $usersList .= $flagged['user'] . '$$';
                    }
                    $out .= '<tr>';
                    $out .= '<td align="left" valign="top">';
                    $out .= '<a href="index.php?module=IWforms&func=manage&fid=' . $form['fid'] . '">' . $this->__("Form") . ' - ' . $form['name'] . '</a>';
                    $out .= '</td>';
                    $out .= '<td align="right" valign="top">';
                    $out .= count($flaggeds);
                    $out .= '</td>';
                    $out .= '</tr>';
                    if ($blockFlaggedDetails) {
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $usersFullname = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ccn',
                                    'list' => $usersList,
                                    'sv' => $sv));
                        foreach ($flaggeds as $flagged) {
                            $out .= '<tr>';
                            $out .= '<td align="left" valign="top" colspan ="2">';
                            $out .= str_repeat("&nbsp;", 5) . '-&nbsp;<a href="index.php?module=IWforms&func=manage&fid=' . $form['fid'] . '&fmid=' . $flagged['fmid'] . '">' . $this->__("sent at ") . ' ' . date('d/m/Y', $flagged['time']) . ' ' . $this->__("by ") . ' ' . $usersFullname[$flagged['user']] . '</a>';
                            $out .= '</td>';
                            $out .= '</tr>';
                        }
                    }
                }
                $out .= '<!---/fr--->';
            }
        }
        $out = $before . $out . $after;
        $out = str_replace('\'', '&acute;', $out);
        //Si no hi ha novetats no mostrem el bloc
        if (strpos($out, '<tr>') == '0') {
            $out = '';
        } else {
            if ($after == '') {
                $out .= '</table>';
            }
        }
        //Emmagatzemem la variable d'usuari
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => UserUtil::getVar('uid'),
            'name' => 'flagged',
            'module' => 'IWmain_block_flagged',
            'sv' => $sv,
            'value' => $out,
            'lifetime' => '600'));
        return true;
    }

    function stringrposFlagged($args) {
        $i = strlen($args['flags']);
        while (substr($args['flags'], $i, strlen($args['end'])) != $args['end']) {
            $i--;
            if ($i < 0) {
                return false;
            }
        }
        return $i;
    }

    function cutTextFlagged($text, $lenght = 25) {
        $newText = mb_substr($text, 0, $lenght);
        if ($text > $newText) {
            $newText .= '...';
        }
        return $newText;
    }

    /**
     * Get a file from a server folder even it is out of the public html directory
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	name of the file that have to be gotten
     * @return:	The file information
     */
    public function getPhoto($args) {
        // File name with the path
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWmain::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'getFile', array('fileName' => $fileName,
                    'sv' => $sv));
    }

    /**
     * Make sure that the request comes from a real module
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @return: A session var with an encrypted value
     */
    public function genSecurityValue() {
        $rand = rand();
        $value = md5($rand);
        $_SESSION['iwSecure'] = $value;
        return $_SESSION['iwSecure'] = md5($rand);
    }

    /**
     * Check the security value
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the securtity value generated in the module functions
     * @return: 	True if the security value is correct an false in any other case
     */
    public function checkSecurityValue($args) {
        $return = true;
        if (!isset($_SESSION['iwSecure']) || $args['sv'] != $_SESSION['iwSecure'] || $_SESSION['iwSecure'] == '') {
            $return = false;
        }
        // delete the security value
        $_SESSION['iwSecure'] = '';
        return $return;
    }

    /**
     * get the information of all users
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the information needed and the security value.
     * 		Possible values returned:
     * 			'n'	-> Name
     * 			'c1' 	-> 1st surname
     * 			'c2'	-> 2nd surname
     * 			'ncc'	-> Full name
     * 			'nc'	-> Name and 1st surname
     * 			'cn'	-> Fullname with the name at the end
     * 			'ccn'	-> Fullname with the name at the end
     * 			'l'	-> Username
     * @return:	An array with the information of all users where the array key is the
     * 		user identity. If a data is not found returns the username
     */
    public function getAllUsersInfo($args) {
        extract($args);
        $usersName = array();
        $fromArray = (isset($fromArray)) ? $fromArray : array();
        $list = (isset($list)) ? $list : '';
        $users = ModUtil::apiFunc('IWmain', 'user', 'getAllUsers', array('sv' => $sv,
                    'fromArray' => $fromArray,
                    'list' => $list));
        if ($users) {
            foreach ($users as $user) {
                $usersName[$user['uid']] = $user['uname'];
            }
        }
        // Checks if module IWusers is installed. In this case get the users extra information
        $modid = ModUtil::getIdFromName('IWusers');
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3) {
            // Get users extra information because it probably exists
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $extraUsers = ModUtil::apiFunc('IWmain', 'user', 'getUsersExtraInfo', array('sv' => $sv,
                        'fromArray' => $fromArray,
                        'list' => $list));
        }
        $extraUsersArray = array();
        $usersInfo = array();
        if (is_array($args['info'])) {
            foreach ($args['info'] as $item) {
                switch ($item) {
                    case 'ncc':
                        if (isset($extraUsers)) {
                            foreach ($extraUsers as $extraUser) {
                                $extraUsersArray[$extraUser['uid']] = trim($extraUser['nom'] . ' ' . $extraUser['cognom1'] . ' ' . $extraUser['cognom2']);
                            }
                        }
                        if ($users) {
                            foreach ($users as $user) {
                                $usersInfo[$user['uid']][$item] = (isset($extraUsersArray[$user['uid']]) && trim($extraUsersArray[$user['uid']]) != '') ? $extraUsersArray[$user['uid']] : $usersName[$user['uid']];
                            }
                        }
                        break;
                    case 'ccn':
                        if (isset($extraUsers)) {
                            foreach ($extraUsers as $extraUser) {
                                if ($extraUser['cognom2'] != '') {
                                    $extraUsersArray[$extraUser['uid']] = trim($extraUser['cognom1'] . ' ' . $extraUser['cognom2'] . ', ' . $extraUser['nom']);
                                } elseif ($extraUser['cognom1'] != '') {
                                    $extraUsersArray[$extraUser['uid']] = trim($extraUser['cognom1'] . ', ' . $extraUser['nom']);
                                } else {
                                    $extraUsersArray[$extraUser['uid']] = $extraUser['nom'];
                                }
                            }
                        }
                        foreach ($users as $user) {
                            $usersInfo[$user['uid']][$item] = (isset($extraUsersArray[$user['uid']]) && $extraUsersArray[$user['uid']] != '') ? $extraUsersArray[$user['uid']] : $usersName[$user['uid']];
                        }
                        break;
                    case 'e':
                        foreach ($users as $user) {
                            $usersInfo[$user['uid']][$item] = $user['email'];
                        }
                        break;
                    case 'a':
                        if (isset($extraUsers)) {
                            foreach ($extraUsers as $extraUser) {
                                $usersInfo[$extraUser['uid']][$item] = $extraUser['avatar'];
                            }
                        }
                        break;
                    case 'as': // avatar small version
                        if (isset($extraUsers)) {
                            foreach ($extraUsers as $extraUser) {
                                if ($extraUser['avatar'] != '') {
                                    $extension = FileUtil::getExtension($extraUser['avatar']);
                                    $smallAvatar = str_replace('.' . $extension, '', $extraUser['avatar']) . '_s.' . $extension;
                                } else {
                                    $smallAvatar = '';
                                }
                                $usersInfo[$extraUser['uid']][$item] = $smallAvatar;
                            }
                        }
                        break;
                    case 'd':
                        if (isset($extraUsers)) {
                            foreach ($extraUsers as $extraUser) {
                                $usersInfo[$extraUser['uid']][$item] = $extraUser['description'];
                            }
                        }
                        break;
                    case 's':
                        if (isset($extraUsers)) {
                            foreach ($extraUsers as $extraUser) {
                                $usersInfo[$extraUser['uid']][$item] = $extraUser['sex'];
                            }
                        }
                        break;
                    case 'l':
                    default:
                        foreach ($users as $user) {
                            $usersInfo[$user['uid']][$item] = $usersName[$user['uid']];
                        }
                }
            }
        } else {
            switch ($args['info']) {
                case 'ncc':
                    if (isset($extraUsers)) {
                        foreach ($extraUsers as $extraUser) {
                            $extraUsersArray[$extraUser['uid']] = $extraUser['nom'] . ' ' . $extraUser['cognom1'] . ' ' . $extraUser['cognom2'];
                        }
                    }
                    if ($users) {
                        foreach ($users as $user) {
                            $usersInfo[$user['uid']] = (isset($extraUsersArray[$user['uid']]) && trim($extraUsersArray[$user['uid']]) != '') ? $extraUsersArray[$user['uid']] : $usersName[$user['uid']];
                        }
                    }
                    break;
                case 'ccn':
                    if (isset($extraUsers)) {
                        foreach ($extraUsers as $extraUser) {
                            if ($extraUser['cognom2'] != '') {
                                $extraUsersArray[$extraUser['uid']] = $extraUser['cognom1'] . ' ' . $extraUser['cognom2'] . ', ' . $extraUser['nom'];
                            } elseif ($extraUser['cognom1'] != '') {
                                $extraUsersArray[$extraUser['uid']] = $extraUser['cognom1'] . ', ' . $extraUser['nom'];
                            } else {
                                $extraUsersArray[$extraUser['uid']] = $extraUser['nom'];
                            }
                        }
                    }
                    foreach ($users as $user) {
                        $usersInfo[$user['uid']] = (isset($extraUsersArray[$user['uid']]) && $extraUsersArray[$user['uid']] != '') ? $extraUsersArray[$user['uid']] : $usersName[$user['uid']];
                    }
                    break;
                case 'e':
                    foreach ($users as $user) {
                        $usersInfo[$user['uid']] = $user['email'];
                    }
                    break;
                case 'a':
                    foreach ($users as $user) {
                        $usersInfo[$user['uid']] = $user['avatar'];
                    }
                    break;
                case 'as': // avatar small version
                    if (isset($extraUsers)) {
                        foreach ($users as $user) {
                            if ($user['avatar'] != '') {
                                $extension = FileUtil::getExtension($user['avatar']);
                                $smallAvatar = str_replace('.' . $extension, '', $user['avatar']) . '_s.' . $extension;
                            } else {
                                $smallAvatar = '';
                            }
                            $usersInfo[$user['uid']] = $smallAvatar;
                        }
                    }
                    break;
                case 'd':
                    foreach ($extraUsers as $extraUser) {
                        $usersInfo[$user['uid']] = $user['description'];
                    }
                    break;
                case 's':
                    foreach ($extraUsers as $extraUser) {
                        $usersInfo[$user['uid']] = $user['sex'];
                    }
                    break;
                case 'l':
                default:
                    $usersInfo = $usersName;
            }
        }
        return $usersInfo;
    }

    /**
     * get the information of an users
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the information needed and user id and the security value.
     * 		Possible values returned:
     * 			'n'	-> Name
     * 			'c1' 	-> 1st surname
     * 			'c2'	-> 2nd surname
     * 			'ncc'	-> Full name
     * 			'nc'	-> Name and 1st surname
     * 			'cn'	-> Fullname with the name at the end
     * 			'ccn'	-> Fullname with the name at the end
     * 			'l'	-> Username
     * @return:	An array with the information of an users. If a data is not found
     * 		returns the username
     */
    public function getUserInfo($args) {
        $user = ModUtil::apiFunc('IWmain', 'user', 'getUser', array('uid' => $args['uid'],
                    'sv' => $args['sv']));
        // Checks if module IWusers is installed. In this case get the users extra information
        $modid = ModUtil::getIdFromName('IWusers');
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3) {
            // Get users extra information because it probably exists
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userExtraInfo = ModUtil::apiFunc('IWmain', 'user', 'getUserExtraInfo', array('uid' => $args['uid'],
                        'sv' => $sv));
        } else {
            // Force username return
            $args['info'] = 'l';
        }

        if (is_array($args['info'])) {
            foreach ($args['info'] as $item) {
                switch ($item) {
                    case 'ncc':
                        $userInfo[$item] = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['nom'] . ' ' . $userExtraInfo[0]['cognom1'] . ' ' . $userExtraInfo[0]['cognom2'] : $user[0]['uname'];
                        break;
                    case 'n':
                        $userInfo[$item] = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['nom'] : $user[0]['uname'];
                        break;
                    case 'ccn':
                        if ($userExtraInfo[0]['cognom2'] != '') {
                            $userInfo[$item] = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['cognom1'] . ' ' . $userExtraInfo[0]['cognom2'] . ', ' . $userExtraInfo[0]['nom'] : $user[0]['uname'];
                        } elseif ($userExtraInfo[0]['cognom1'] != '') {
                            $userInfo[$item] = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['cognom1'] . ', ' . $userExtraInfo[0]['nom'] : $user[0]['uname'];
                        } else {
                            $userInfo[$item] = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['nom'] : $user[0]['uname'];
                        }
                        break;
                    case 'cn':
                        $userInfo[$item] = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['cognom1'] . ', ' . $userExtraInfo[0]['nom'] : $user[0]['uname'];
                        break;
                    case 'c1':
                        $userInfo[$item] = (isset($userExtraInfo[0]['cognom1'])) ? $userExtraInfo[0]['cognom1'] : '';
                        break;
                    case 'c2':
                        $userInfo[$item] = (isset($userExtraInfo[0]['cognom2'])) ? $userExtraInfo[0]['cognom2'] : '';
                        break;
                    case 'e':
                        $userInfo[$item] = $user[0]['email'];
                        break;
                    case 'a':
                        $userInfo[$item] = (isset($userExtraInfo[0]['avatar'])) ? $userExtraInfo[0]['avatar'] : '';
                        break;
                    case 'as': // avatar small version
                        if (isset($userExtraInfo[0]['avatar'])) {
                            if ($userExtraInfo[0]['avatar'] != '') {
                                $extension = FileUtil::getExtension($userExtraInfo[0]['avatar']);
                                $smallAvatar = str_replace('.' . $extension, '', $userExtraInfo[0]['avatar']) . '_s.' . $extension;
                            } else {
                                $smallAvatar = '';
                            }
                            $userInfo[$item] = $smallAvatar;
                        } else {
                            $userInfo[$item] = '';
                        }
                        break;
                    case 'na':
                        $userInfo[$item] = (isset($userExtraInfo[0]['newavatar'])) ? $userExtraInfo[0]['newavatar'] : '';
                        break;
                    case 'd':
                        $userInfo[$item] = (isset($userExtraInfo[0]['description'])) ? $userExtraInfo[0]['description'] : '';
                        break;
                    case 's':
                        $userInfo[$item] = (isset($userExtraInfo[0]['sex'])) ? $userExtraInfo[0]['sex'] : '';
                        break;
                    case 'l':
                    default:
                        $userInfo[$item] = $user[0]['uname'];
                }
            }
        } else {
            switch ($args['info']) {
                case 'ncc':
                    $userInfo = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['nom'] . ' ' . $userExtraInfo[0]['cognom1'] . ' ' . $userExtraInfo[0]['cognom2'] : $user[0]['uname'];
                    break;
                case 'n':
                    $userInfo = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['nom'] : $user[0]['uname'];
                    break;
                case 'ccn':
                    if ($userExtraInfo[0]['cognom2'] != '') {
                        $userInfo = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['cognom1'] . ' ' . $userExtraInfo[0]['cognom2'] . ', ' . $userExtraInfo[0]['nom'] : $user[0]['uname'];
                    } elseif ($userExtraInfo[0]['cognom1'] != '') {
                        $userInfo = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['cognom1'] . ', ' . $userExtraInfo[0]['nom'] : $user[0]['uname'];
                    } else {
                        $userInfo = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['nom'] : $user[0]['uname'];
                    }
                    break;
                case 'cn':
                    $userInfo = (isset($userExtraInfo[0]['nom']) && $userExtraInfo[0]['nom'] != '') ? $userExtraInfo[0]['cognom1'] . ', ' . $userExtraInfo[0]['nom'] : $user[0]['uname'];
                    break;
                case 'c1':
                    $userInfo = (isset($userExtraInfo[0]['cognom1'])) ? $userExtraInfo[0]['cognom1'] : '';
                    break;
                case 'c2':
                    $userInfo = (isset($userExtraInfo[0]['cognom2'])) ? $userExtraInfo[0]['cognom2'] : '';
                    break;
                case 'e':
                    $userInfo = $user[0]['email'];
                    break;
                case 'a':
                    $userInfo = (isset($userExtraInfo[0]['avatar'])) ? $userExtraInfo[0]['avatar'] : '';
                    break;
                case 'as': // avatar small version
                    if (isset($userExtraInfo[0]['avatar'])) {
                        if ($userExtraInfo[0]['avatar'] != '') {
                            $extension = FileUtil::getExtension($userExtraInfo[0]['avatar']);
                            $smallAvatar = str_replace('.' . $extension, '', $userExtraInfo[0]['avatar']) . '_s.' . $extension;
                        } else {
                            $smallAvatar = '';
                        }
                        $userInfo = $smallAvatar;
                    } else {
                        $userInfo = '';
                    }
                    break;
                case 'na':
                    $userInfo = (isset($userExtraInfo[0]['newavatar'])) ? $userExtraInfo[0]['newavatar'] : '';
                    break;
                case 'd':
                    $userInfo = (isset($userExtraInfo[0]['description'])) ? $userExtraInfo[0]['description'] : '';
                    break;
                case 's':
                    $userInfo = (isset($userExtraInfo[0]['sex'])) ? $userExtraInfo[0]['sex'] : '';
                    break;
                case 'l':
                default:
                    $userInfo = $user[0]['uname'];
            }
        }
        return $userInfo;
    }

    /**
     * get the groups and return them into and array
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the fields plus (additional group), less (not group)
     * 		and the security value
     * @return:	An array with the groups information
     */
    public function getAllGroups($args) {
        $groups = ModUtil::apiFunc('IWmain', 'user', 'getAllGroups', array('sv' => $args['sv']));
        if (!empty($args['plus'])) {
            $items[] = array('id' => 0,
                'name' => $args['plus']);
        }
        $less = (isset($args['less'])) ? $args['less'] : 0;
        foreach ($groups as $group) {
            if ($group['gid'] != $less) {
                $items[$group['gid']] = array('id' => $group['gid'],
                    'name' => $group['name']);
            }
        }
        // return results
        return $items;
    }

    /**
     * get the members of a group and return them into and array
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the group identity, the plus user and the security value
     * @return:	An array with the users information
     */
    public function getMembersGroup($args) {
        extract($args);
        if (!isset($gid) || !is_numeric($gid)) {
            return false;
        }
        $membersArray = array();

        $members = ModUtil::apiFunc('IWmain', 'user', 'getMembersGroup', array('gid' => $gid,
                    'sv' => $sv));
        if (!empty($plus)) {
            $membersArray[] = array('id' => 0,
                'name' => $plus);
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersFullname = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ccn',
                    'sv' => $sv,
                    'fromArray' => $members));
        foreach ($members as $member) {
            $membersArray[] = array('name' => $usersFullname[$member['uid']],
                'id' => $member['uid']);
        }
        // Return values
        return $membersArray;
    }

    /**
     * check if an user is member of a group
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the user and the group identities
     * @return:	True if the user is member of the group and false in any other case
     */
    public function isMember($args) {
        extract($args);
        if (!isset($uid) || !is_numeric($uid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        if (!isset($gid) || !is_numeric($gid)) {
            $gid = 0;
        }
        if (!isset($sgid) || !is_numeric($sgid)) {
            $sgid = 0;
        }
        $isMember = ModUtil::apiFunc('IWmain', 'user', 'isMember', array('uid' => $uid,
                    'gid' => $gid,
                    'sgid' => $sgid,
                    'sv' => $sv));
        // Return values
        return $isMember;
    }

    /**
     * get the information of all the groups
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the security value
     * @return:	An array with the information of all the groups
     */
    public function getAllGroupsInfo($args) {
        extract($args);
        $groupsInfo = array();
        $groups = ModUtil::apiFunc('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));
        if ($groups) {
            foreach ($groups as $group) {
                $groupsInfo[$group['gid']] = $group['name'];
            }
        }
        return $groupsInfo;
    }

    /**
     * get the groups where the user is member
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the groups id
     * @return:	An array with the information of all the groups where the user is member
     */
    public function getAllUserGroups($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!isset($uid) || !is_numeric($uid)) {
            return false;
        }
        $items = array();
        $userGroups = ModUtil::apiFunc('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv,
                    'uid' => $uid));
        foreach ($userGroups as $group) {
            $items[$group['gid']] = array('id' => $group['gid']);
        }
        return $items;
    }

    /**
     * Update a file in the attached folder
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the file parameters, the security value and the folder where the file have to be uploaded
     * @return:	True if the file has been uploaded and a error message in any other case
     */
    public function updateFile($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $folder = FormUtil::getPassedValue('folder', isset($args['folder']) ? $args['folder'] : null, 'POST');
        $file = FormUtil::getPassedValue('file', isset($args['file']) ? $args['file'] : null, 'POST');
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : null, 'POST');
        $fileNameTemp = FormUtil::getPassedValue('fileNameTemp', isset($args['fileNameTemp']) ? $args['fileNameTemp'] : null, 'POST');
        $fileRealName = FormUtil::getPassedValue('fileRealName', isset($args['fileRealName']) ? $args['fileRealName'] : null, 'POST');
        $fileSize = FormUtil::getPassedValue('fileSize', isset($args['fileSize']) ? $args['fileSize'] : null, 'POST');
        $allow = FormUtil::getPassedValue('allow', isset($args['allow']) ? $args['allow'] : null, 'POST');
        $allowOnly = FormUtil::getPassedValue('allowOnly', isset($args['allowOnly']) ? $args['allowOnly'] : null, 'POST');
        $overwrite = FormUtil::getPassedValue('overwrite', isset($args['overwrite']) ? $args['overwrite'] : 0, 'POST');
        $widthImg = FormUtil::getPassedValue('width', isset($args['widthImg']) ? $args['widthImg'] : 0, 'POST');
        $heightImg = FormUtil::getPassedValue('heightImg', isset($args['heightImg']) ? $args['heightImg'] : 0, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        //Check if folder exists. If not returns error.
        if (!file_exists($this->getVar('documentRoot') . '/' . $folder)) {
            return array('msg' => $this->__("The folder for attached files haven't been found."), 'fileName' => '');
        }
        if (!isset($file)) {
            $file['name'] = $fileRealName;
            $file['tmp_name'] = $fileNameTemp;
            $file['size'] = $fileSize;
        }
        //Check if the extension of the file is allowed
        $allowedExtensionsText = ($allowOnly != null) ? $allowOnly : $this->getVar('extensions') . $allow;
        $allowed_extensions = explode('|', $allowedExtensionsText);
        $file_extension = strtolower(substr(strrchr($file['name'], "."), 1));
        if (!in_array($file_extension, $allowed_extensions)) {
            return array('msg' => $this->__('The file extension is not allowed.'), 'fileName' => '');
        }
        //Check if the file size is allowed
        $maxsize = $this->getVar('maxsize');
        if ($file['size'] > $maxsize) {
            return array('msg' => $this->__('File size not allowed.'), 'fileName' => '');
        }
        if (!isset($fileName) || $fileName == '') {
            // Prepare file name
            // Replace spaces with _
            $fileName = str_replace(' ', '_', $file['name']);
            // Check if file name exists into the folder. In this case change the name
            if ($overwrite != 1) {
                $fitxer = $fileName;
                $i = 1;
                while (file_exists($this->getVar('documentRoot') . '/' . $folder . '/' . $fileName)) {
                    $fileName = substr($fitxer, 0, strlen($fitxer) - strlen($file_extension) - (1)) . $i . '.' . $file_extension;
                    $i++;
                }
            }
        }
        $filePath = $this->getVar('documentRoot') . '/' . $folder . '/' . $fileName;
        //Update the file
        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            return array('msg' => $this->__("The attached file haven't been updated because an error."),
                'fileName' => '');
        } else {
            // if a thumbnail is required and it can be done, do it
            if (($widthImg != 0 ||
                    $heightImg != 0) &&
                    ($file_extension == 'gif' || $file_extension == 'jpg' || $file_extension == 'png')) {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::func('IWmain', 'user', 'thumbnail', array('sv' => $sv,
                    'imgSource' => $filePath,
                    'imgDest' => $filePath,
                    'widthImg' => $widthImg,
                    'heightImg' => $heightImg));
            }
        }
        // The file has been updated
        return array('msg' => '',
            'fileName' => $fileName);
    }

    /**
     * create a thumbnail of an image
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param: imgSource => Path of the source of the image
     * @param: imgDest => Path of the destiny of the image
     * @param: widthImg => Maximum width of the image
     * @param: heightImg => Maximum height of the image
     * @return:	True if success and false otherwise
     */
    public function thumbnail($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $imgSource = FormUtil::getPassedValue('imgSource', isset($args['imgSource']) ? $args['imgSource'] : null, 'POST');
        $imgDest = FormUtil::getPassedValue('imgDest', isset($args['imgDest']) ? $args['imgDest'] : null, 'POST');
        $widthImg = FormUtil::getPassedValue('widthImg', isset($args['widthImg']) ? $args['widthImg'] : 0, 'POST');
        $heightImg = FormUtil::getPassedValue('heightImg', isset($args['heightImg']) ? $args['heightImg'] : 0, 'POST');
        $imageName = FormUtil::getPassedValue('imageName', isset($args['imageName']) ? $args['imageName'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to use this functionality.'));
        }
        $errorMsg = '';
        if (($widthImg == 0 && $heightImg == 0) ||
                $imgSource == null ||
                $imgDest == null ||
                !file_exists($imgSource)) {
            return $this->__('Error! The parameters receiver are not correct.');
        }
        // seems that all the parameters required are available and the thumbnail is created
        $fileExtension = ($imageName != numm && $imageName != '') ? FileUtil::getExtension($imageName) : FileUtil::getExtension($imgSource);
        $thumbnailExtensions = array('gif',
            'jpg',
            'jpeg',
            'png');
        if (!in_array(strtolower($fileExtension), $thumbnailExtensions)) {
            return $this->__('Error! Thumbnailing the image file.');
        }
        $format = '';
        if (strtolower($fileExtension) == 'jpg' || strtolower($fileExtension) == 'jpeg') {
            $format = 'image/jpeg';
        } elseif (strtolower($fileExtension) == 'gif') {
            $format = 'image/gif';
        } elseif (strtolower($fileExtension) == 'png') {
            $format = 'image/png';
        }
        // size calculation
        // get original image size
        list($width, $height) = getimagesize($imgSource);
        // set the default vaules like the original
        $newWidth = $width;
        $newHeight = $height;
        // fix the width to the value set in the module configuration (or lower if the image is smaller) and calc the height
        if ($widthImg > 0) {
            // fix the width
            $newWidth = ($width <= $widthImg) ? $width : $widthImg;
            $newHeight = $height * $newWidth / $width;
            if (($newHeight > $heightImg) && $heightImg > 0) {
                $newHeight = $heightImg;
                $newWidth = $width * $newHeight / $height;
            }
        }
        if ($heightImg > 0 && $widthImg == 0) {
            // fix the width
            $newHeight = ($height <= $heightImg) ? $height : $heightImg;
            $newWidth = $width * $newHeight / $height;
        }
        if (!$destimg = imagecreatetruecolor($newWidth, $newHeight)) {
            return $this->__('Error! Thumbnailing the image file.');
        }
        // set alphablending to on
        imagesavealpha($destimg, true);
        imagealphablending($destimg, true);
        // create the image
        switch ($format) {
            case 'image/gif':
                if (!$srcimg = imagecreatefromgif($imgSource)) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                // preserve the transparency
                $transIndex = imagecolortransparent($srcimg);
                if ($transIndex >= 0) {
                    // get transparent colors from the received image
                    $transColor = imagecolorsforindex($srcimg, $transIndex);
                    // allocate the color to the destiny image
                    $transIndex = imagecolorallocate($destimg, $transColor['red'], $transColor['green'], $transColor['blue']);
                    // fills the background of destiny image with the allocated color.
                    imagefill($destimg, 0, 0, $transIndex);
                    // set the background color for destiny image to transparent
                    imagecolortransparent($destimg, $transIndex);
                }
                if (!imagecopyresampled($destimg, $srcimg, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($srcimg), imagesy($srcimg))) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                if (!imagegif($destimg, $imgDest)) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                break;
            case 'image/jpeg':
                if (!$srcimg = imagecreatefromjpeg($imgSource)) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                if (!imagecopyresampled($destimg, $srcimg, 0, 0, 0, 0, $newWidth, $newHeight, ImageSX($srcimg), ImageSY($srcimg))) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                if (!imagejpeg($destimg, $imgDest)) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                break;
            case 'image/png':
                if (!$srcimg = imagecreatefrompng($imgSource)) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                // preserve the transparency
                // turns off transparency blending
                imagealphablending($destimg, false);
                // create a transparent color
                $color = imagecolorallocatealpha($destimg, 0, 0, 0, 127);
                // fills the background of the image with the allocated color.
                imagefill($destimg, 0, 0, $color);
                // turns on transparency blending
                imagesavealpha($destimg, true);
                if (!imagecopyresampled($destimg, $srcimg, 0, 0, 0, 0, $newWidth, $newHeight, ImageSX($srcimg), ImageSY($srcimg))) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                if (!imagepng($destimg, $imgDest)) {
                    return $this->__('Error! Thumbnailing the image file.');
                }
                break;
        }
        // frees image from memory
        imagedestroy($destimg);
        return '';
    }

    /**
     * delete a file
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the file name, the security value and the folder where the file have to be deleted
     * @return:	True if the file has been deleted
     */
    public function deleteFile($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $folder = FormUtil::getPassedValue('folder', isset($args['folder']) ? $args['folder'] : null, 'POST');
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        if (!unlink(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $folder . '/' . $fileName)) {
            return LogUtil::registerError($this->__('Failed to deleted'));
        }
        return true;
    }

    /**
     * delete a file
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the file name, the security value and the folder where the file have to be deleted
     * @return:	True if the file has been deleted
     */
    public function downloadFile($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : null, 'POST');
        $fileNameInServer = FormUtil::getPassedValue('fileNameInServer', isset($args['fileNameInServer']) ? $args['fileNameInServer'] : null, 'POST');
        if (!isset($fileNameInServer)) {
            $fileNameInServer = $fileName;
        }
        $folder = ModUtil::getVar('IWmain', 'documentRoot');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        //Check if file exists. If not returns error.
        if (!file_exists($folder . '/' . $fileNameInServer)) {
            // Create output object
            $view = Zikula_View::getInstance('IWmain', false);
            $view->assign('file', $folder . '/' . $fileName);
            return $view->fetch('IWmain_user_file_not_found.htm');
        }
        // get file size
        $fileSize = filesize($folder . '/' . $fileNameInServer);
        // Get file extension
        $fileExtension = strtolower(substr(strrchr($fileName, "."), 1));
        $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $fileExtension));
        $ctype = $ctypeArray['type'];
        //Begin writing headers
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        //Use the switch-generated Content-Type
        header("Content-Type: $ctype");
        //Force the download
        $header = "Content-Disposition: attachment; filename=" . $fileName . ";";
        header($header);
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $fileSize);
        @readfile($folder . '/' . $fileNameInServer);
        return true;
    }

    /**
     * Get a file from a server folder even it is out of the public html directory
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	name of the file that have to be gotten
     * @return:	The file
     */
    public function getFile($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $args['sv']))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $fileName = ModUtil::getVar('IWmain', 'documentRoot') . '/' . $fileName;
        //Check if file exists. If not returns error.
        if (!file_exists($fileName)) {
            // Create output object
            $view = Zikula_View::getInstance('IWmain', false);
            $view->assign('file', $fileName);
            return $view->fetch('IWmain_user_file_not_found.htm');
        }
        // Get file extension
        $fileExtension = strtolower(substr(strrchr($fileName, "."), 1));
        $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $fileExtension));
        $ctype = $ctypeArray['type'];
        //Use the switch-generated Content-Type
        header("Content-Type: $ctype");
        $chunksize = 1 * (1024 * 1024);
        $buffer = '';
        $cnt = 0;
        $handle = fopen($fileName, 'rb');
        if ($handle === false) {
            return false;
        }
        while (!feof($handle)) {
            @set_time_limit(60 * 60);
            $buffer = fread($handle, $chunksize);
            echo $buffer;
            flush();
            if ($retbytes) {
                $cnt += strlen($buffer);
            }
        }
        $status = fclose($handle);
        exit;
    }

    /**
     * get the list of information about file types based on extensions.
     * @return an array with the list of information about file types based on extensions
     */
    public function getMimetype($args) {
        $extension = FormUtil::getPassedValue('extension', isset($args['extension']) ? $args['extension'] : null, 'POST');
        $mimeTypes = array('xxx' => array('type' => 'document/unknown', 'icon' => 'unknown.gif'),
            '3gp' => array('type' => 'video/quicktime', 'icon' => 'video.gif'),
            'ai' => array('type' => 'application/postscript', 'icon' => 'image.gif'),
            'aif' => array('type' => 'audio/x-aiff', 'icon' => 'audio.gif'),
            'aiff' => array('type' => 'audio/x-aiff', 'icon' => 'audio.gif'),
            'aifc' => array('type' => 'audio/x-aiff', 'icon' => 'audio.gif'),
            'applescript' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'asc' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'asm' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'au' => array('type' => 'audio/au', 'icon' => 'audio.gif'),
            'avi' => array('type' => 'video/x-ms-wm', 'icon' => 'avi.gif'),
            'bmp' => array('type' => 'image/bmp', 'icon' => 'image.gif'),
            'c' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'cct' => array('type' => 'shockwave/director', 'icon' => 'flash.gif'),
            'cpp' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'cs' => array('type' => 'application/x-csh', 'icon' => 'text.gif'),
            'css' => array('type' => 'text/css', 'icon' => 'text.gif'),
            'dv' => array('type' => 'video/x-dv', 'icon' => 'video.gif'),
            'dmg' => array('type' => 'application/octet-stream', 'icon' => 'dmg.gif'),
            'doc' => array('type' => 'application/msword', 'icon' => 'word.gif'),
            'docx' => array('type' => 'application/msword', 'icon' => 'docx.gif'),
            'docm' => array('type' => 'application/msword', 'icon' => 'docm.gif'),
            'dotx' => array('type' => 'application/msword', 'icon' => 'dotx.gif'),
            'dcr' => array('type' => 'application/x-director', 'icon' => 'flash.gif'),
            'dif' => array('type' => 'video/x-dv', 'icon' => 'video.gif'),
            'dir' => array('type' => 'application/x-director', 'icon' => 'flash.gif'),
            'dxr' => array('type' => 'application/x-director', 'icon' => 'flash.gif'),
            'eps' => array('type' => 'application/postscript', 'icon' => 'pdf.gif'),
            'fdf' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
            'flv' => array('type' => 'video/x-flv', 'icon' => 'video.gif'),
            'gpx' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'gif' => array('type' => 'image/gif', 'icon' => 'image.gif'),
            'gtar' => array('type' => 'application/x-gtar', 'icon' => 'zip.gif'),
            'tgz' => array('type' => 'application/g-zip', 'icon' => 'zip.gif'),
            'gz' => array('type' => 'application/g-zip', 'icon' => 'zip.gif'),
            'gzip' => array('type' => 'application/g-zip', 'icon' => 'zip.gif'),
            'h' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'hpp' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'hqx' => array('type' => 'application/mac-binhex40', 'icon' => 'zip.gif'),
            'htc' => array('type' => 'text/x-component', 'icon' => 'text.gif'),
            'html' => array('type' => 'text/html', 'icon' => 'html.gif'),
            'htm' => array('type' => 'text/html', 'icon' => 'html.gif'),
            'ico' => array('type' => 'image/vnd.microsoft.icon', 'icon' => 'image.gif'),
            'java' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'jcb' => array('type' => 'text/xml', 'icon' => 'jcb.gif'),
            'jcl' => array('type' => 'text/xml', 'icon' => 'jcl.gif'),
            'jcw' => array('type' => 'text/xml', 'icon' => 'jcw.gif'),
            'jmt' => array('type' => 'text/xml', 'icon' => 'jmt.gif'),
            'jmx' => array('type' => 'text/xml', 'icon' => 'jmx.gif'),
            'jpe' => array('type' => 'image/jpeg', 'icon' => 'image.gif'),
            'jpeg' => array('type' => 'image/jpeg', 'icon' => 'image.gif'),
            'jpg' => array('type' => 'image/jpeg', 'icon' => 'image.gif'),
            'jqz' => array('type' => 'text/xml', 'icon' => 'jqz.gif'),
            'js' => array('type' => 'application/x-javascript', 'icon' => 'text.gif'),
            'latex' => array('type' => 'application/x-latex', 'icon' => 'text.gif'),
            'm' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'mov' => array('type' => 'video/quicktime', 'icon' => 'video.gif'),
            'movie' => array('type' => 'video/x-sgi-movie', 'icon' => 'video.gif'),
            'm3u' => array('type' => 'audio/x-mpegurl', 'icon' => 'audio.gif'),
            'mp3' => array('type' => 'audio/mp3', 'icon' => 'audio.gif'),
            'mp4' => array('type' => 'video/mp4', 'icon' => 'video.gif'),
            'mpeg' => array('type' => 'video/mpeg', 'icon' => 'video.gif'),
            'mpe' => array('type' => 'video/mpeg', 'icon' => 'video.gif'),
            'mpg' => array('type' => 'video/mpeg', 'icon' => 'video.gif'),
            'odt' => array('type' => 'application/vnd.oasis.opendocument.text', 'icon' => 'odt.gif'),
            'ott' => array('type' => 'application/vnd.oasis.opendocument.text-template', 'icon' => 'odt.gif'),
            'oth' => array('type' => 'application/vnd.oasis.opendocument.text-web', 'icon' => 'odt.gif'),
            'odm' => array('type' => 'application/vnd.oasis.opendocument.text-master', 'icon' => 'odm.gif'),
            'odg' => array('type' => 'application/vnd.oasis.opendocument.graphics', 'icon' => 'odg.gif'),
            'otg' => array('type' => 'application/vnd.oasis.opendocument.graphics-template', 'icon' => 'odg.gif'),
            'odp' => array('type' => 'application/vnd.oasis.opendocument.presentation', 'icon' => 'odp.gif'),
            'otp' => array('type' => 'application/vnd.oasis.opendocument.presentation-template', 'icon' => 'odp.gif'),
            'ods' => array('type' => 'application/vnd.oasis.opendocument.spreadsheet', 'icon' => 'ods.gif'),
            'ots' => array('type' => 'application/vnd.oasis.opendocument.spreadsheet-template', 'icon' => 'ods.gif'),
            'odc' => array('type' => 'application/vnd.oasis.opendocument.chart', 'icon' => 'odc.gif'),
            'odf' => array('type' => 'application/vnd.oasis.opendocument.formula', 'icon' => 'odf.gif'),
            'odb' => array('type' => 'application/vnd.oasis.opendocument.database', 'icon' => 'odb.gif'),
            'odi' => array('type' => 'application/vnd.oasis.opendocument.image', 'icon' => 'odi.gif'),
            'pct' => array('type' => 'image/pict', 'icon' => 'image.gif'),
            'pdf' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
            'php' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'pic' => array('type' => 'image/pict', 'icon' => 'image.gif'),
            'pict' => array('type' => 'image/pict', 'icon' => 'image.gif'),
            'png' => array('type' => 'image/png', 'icon' => 'image.gif'),
            'pps' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'powerpoint.gif'),
            'ppt' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'powerpoint.gif'),
            'pptx' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'pptx.gif'),
            'pptm' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'pptm.gif'),
            'potx' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'potx.gif'),
            'potm' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'potm.gif'),
            'ppam' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'ppam.gif'),
            'ppsx' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'ppsx.gif'),
            'ppsm' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'ppsm.gif'),
            'ps' => array('type' => 'application/postscript', 'icon' => 'pdf.gif'),
            'qt' => array('type' => 'video/quicktime', 'icon' => 'video.gif'),
            'ra' => array('type' => 'audio/x-realaudio', 'icon' => 'audio.gif'),
            'ram' => array('type' => 'audio/x-pn-realaudio', 'icon' => 'audio.gif'),
            'rhb' => array('type' => 'text/xml', 'icon' => 'xml.gif'),
            'rm' => array('type' => 'audio/x-pn-realaudio', 'icon' => 'audio.gif'),
            'rtf' => array('type' => 'text/rtf', 'icon' => 'text.gif'),
            'rtx' => array('type' => 'text/richtext', 'icon' => 'text.gif'),
            'sh' => array('type' => 'application/x-sh', 'icon' => 'text.gif'),
            'sit' => array('type' => 'application/x-stuffit', 'icon' => 'zip.gif'),
            'smi' => array('type' => 'application/smil', 'icon' => 'text.gif'),
            'smil' => array('type' => 'application/smil', 'icon' => 'text.gif'),
            'sqt' => array('type' => 'text/xml', 'icon' => 'xml.gif'),
            'svg' => array('type' => 'image/svg+xml', 'icon' => 'image.gif'),
            'svgz' => array('type' => 'image/svg+xml', 'icon' => 'image.gif'),
            'swa' => array('type' => 'application/x-director', 'icon' => 'flash.gif'),
            'swf' => array('type' => 'application/x-shockwave-flash', 'icon' => 'flash.gif'),
            'swfl' => array('type' => 'application/x-shockwave-flash', 'icon' => 'flash.gif'),
            'sxw' => array('type' => 'application/vnd.sun.xml.writer', 'icon' => 'odt.gif'),
            'stw' => array('type' => 'application/vnd.sun.xml.writer.template', 'icon' => 'odt.gif'),
            'sxc' => array('type' => 'application/vnd.sun.xml.calc', 'icon' => 'odt.gif'),
            'stc' => array('type' => 'application/vnd.sun.xml.calc.template', 'icon' => 'odt.gif'),
            'sxd' => array('type' => 'application/vnd.sun.xml.draw', 'icon' => 'odt.gif'),
            'std' => array('type' => 'application/vnd.sun.xml.draw.template', 'icon' => 'odt.gif'),
            'sxi' => array('type' => 'application/vnd.sun.xml.impress', 'icon' => 'odt.gif'),
            'sti' => array('type' => 'application/vnd.sun.xml.impress.template', 'icon' => 'odt.gif'),
            'sxg' => array('type' => 'application/vnd.sun.xml.writer.global', 'icon' => 'odt.gif'),
            'sxm' => array('type' => 'application/vnd.sun.xml.math', 'icon' => 'odt.gif'),
            'tar' => array('type' => 'application/x-tar', 'icon' => 'zip.gif'),
            'tif' => array('type' => 'image/tiff', 'icon' => 'image.gif'),
            'tiff' => array('type' => 'image/tiff', 'icon' => 'image.gif'),
            'tex' => array('type' => 'application/x-tex', 'icon' => 'text.gif'),
            'texi' => array('type' => 'application/x-texinfo', 'icon' => 'text.gif'),
            'texinfo' => array('type' => 'application/x-texinfo', 'icon' => 'text.gif'),
            'tsv' => array('type' => 'text/tab-separated-values', 'icon' => 'text.gif'),
            'txt' => array('type' => 'text/plain', 'icon' => 'text.gif'),
            'wav' => array('type' => 'audio/wav', 'icon' => 'audio.gif'),
            'wmv' => array('type' => 'video/x-ms-wmv', 'icon' => 'avi.gif'),
            'asf' => array('type' => 'video/x-ms-asf', 'icon' => 'avi.gif'),
            'xdp' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
            'xfd' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
            'xfdf' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
            'xls' => array('type' => 'application/vnd.ms-excel', 'icon' => 'excel.gif'),
            'xlsx' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xlsx.gif'),
            'xlsm' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xlsm.gif'),
            'xltx' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xltx.gif'),
            'xltm' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xltm.gif'),
            'xlsb' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xlsb.gif'),
            'xlam' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xlam.gif'),
            'xml' => array('type' => 'application/xml', 'icon' => 'xml.gif'),
            'xsl' => array('type' => 'text/xml', 'icon' => 'xml.gif'),
            'zip' => array('type' => 'application/zip', 'icon' => 'zip.gif'));
        $return = ($extension != null) ? $mimeTypes[$extension] : false;

        if ($return['type'] == '') {
            $return = $mimeTypes['xxx'];
        }
        return $return;
    }

    /**
     * gets a user picture
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the uname of the user
     * @return:	The picture url
     */
    public function getUserPicture($args) {
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : null, 'POST');
        $small = FormUtil::getPassedValue('small', isset($args['small']) ? $args['small'] : 0, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            return LogUtil::registerError($this->__('You are not allowed to access to some information.'));
        }
        $smallUnderline = ($small == 1) ? '_s' : '';
        $photo = '';
        if (file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $uname . '.gif')) {
            $photo = ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $uname . $smallUnderline . '.gif';
        }
        if ($photo == '' && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $uname . '.png')) {
            $photo = ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $uname . $smallUnderline . '.png';
        }
        if ($photo == '' && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $uname . '.jpg')) {
            $photo = ModUtil::getVar('IWusers', 'usersPictureFolder') . '/' . $uname . $smallUnderline . '.jpg';
        }
        return $photo;
    }

    //***************************************************************************************
    //
    // Function used for the managment of user var variables
    //
    // All this functions are associated with one or more functions in API
    //
    //***************************************************************************************
    /**
     * Get an user variable associate with a module
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible is used
      - name: name of the variable
      - default: default value of the variable if it doesn't exists
      - uid: user id
      - nult: boolean for update de lifetime every time that a user get the vaule. Default false
      - sv: security value
     * @return:	The value of the variable if find it or default if not
     */
    public function userGetVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $default = FormUtil::getPassedValue('default', isset($args['default']) ? $args['default'] : '', 'POST');
        $nult = FormUtil::getPassedValue('nult', isset($args['nult']) ? $args['nult'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        //get the variable value
        $value = ModUtil::apiFunc('IWmain', 'user', 'userGetVar', array('module' => $module,
                    'name' => $name,
                    'uid' => $uid,
                    'sv' => $sv));
        // If a value is returned it's saved the time when it has been readed
        if (count($value) > 0) {
            if (!$nult) {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::apiFunc('IWmain', 'user', 'userUpdateGetVarTime', array('sv' => $sv,
                    'uid' => $uid,
                    'module' => $module,
                    'name' => $name));
            } else {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::apiFunc('IWmain', 'user', 'userUpdateNultVar', array('sv' => $sv,
                    'uid' => $uid,
                    'module' => $module,
                    'name' => $name));
            }
            $value = $value[0]['value'];
        } else {
            //If the value is not returned from the database the default value will be returned
            $value = $default;
        }

        //Delele all the values that not have been readed the time specified in the config values
        //and the variables that have reached the lifetime value. Zero means that the old values never are deleted
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::apiFunc('IWmain', 'user', 'userDeleteOldVars', array('sv' => $sv));
        //return the value required
        return $value;
    }

    /**
     * Set an user variable associate with a module
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible is used
      - name: name of the variable
      - lifetime: date of caducity of the variable
      - uid: user id
      - value: value for the variable
      - sv: security value
     * @return:	The value of the variable if find it or default if not
     */
    public function userSetVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : '', 'POST');
        $lifetime = FormUtil::getPassedValue('lifetime', isset($args['lifetime']) ? $args['lifetime'] : 0, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $lifetime = ($lifetime == 0) ? time() + 24 * 60 * 60 * ModUtil::getVar('IWmain', 'usersvarslife') : $lifetime = time() + $lifetime;
        // Avoid that register of variables for unregistered users
        if ($uid == null) {
            return false;
        }
        //Checks if the value is registered
        $valueExists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('sv' => $sv,
                    'uid' => $uid,
                    'module' => $module,
                    'name' => $name));
        // If the value is registered update it in other case create it
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        if ($valueExists) {
            // The value is updated
            $result = ModUtil::apiFunc('IWmain', 'user', 'updateUserVar', array('sv' => $sv,
                        'uid' => $uid,
                        'module' => $module,
                        'name' => $name,
                        'value' => $value,
                        'lifetime' => $lifetime));
        } else {
            // The value is updated
            $result = ModUtil::apiFunc('IWmain', 'user', 'createUserVar', array('sv' => $sv,
                        'uid' => $uid,
                        'module' => $module,
                        'name' => $name,
                        'value' => $value,
                        'lifetime' => $lifetime));
        }
        return $result;
    }

    /**
     * Init an user variable associate with a module. If variable exists get the value. If not exists create it with the default value
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible is used
      - name: name of the variable
      - lifetime: date of caducity of the variable
      - uid: user id
      - sv: security value
     * @return:	The value of the variable if find it or default if not
     */
    public function userInitVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $default = FormUtil::getPassedValue('default', isset($args['default']) ? $args['default'] : '', 'POST');
        $lifetime = FormUtil::getPassedValue('lifetime', isset($args['lifetime']) ? $args['lifetime'] : ModUtil::getVar('IWmain', 'usersvarslife'), 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if ($lifetime != 0) {
            $lifetime = time() + 24 * 60 * 60 * ModUtil::getVar('IWmain', 'usersvarslife');
        }
        $value = ModUtil::func('IWmain', 'user', 'userGetVar', array('sv' => $sv,
                    'module' => $module,
                    'name' => $name,
                    'uid' => $uid));
        if (count($value) == 0 || $value == '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => $module,
                'name' => $name,
                'value' => $default,
                'uid' => $uid,
                'timelife' => $timelife,
                'sv' => $sv));
            $value = $default;
        }
        return $value;
    }

    /**
     * Delete the variables indicated for all users in a module
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible have to be deleted
      - name: name of the variable that have to be deleted (if name is .* (default) all the users module variables are deleted)
      - sv: security value
     * @return:	True if success and false if not
     */
    public function usersVarsDelModule($args) {
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : '.*', 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        //The variable is deleted
        $result = ModUtil::apiFunc('IWmain', 'user', 'usersVarsDelModule', array('sv' => $sv,
                    'module' => $module,
                    'name' => $name));
        return $result;
    }

    /**
     * Delete the variable indicated for the user in a module
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - module: module where the varible have to be deleted
      - name: name of the variable that have to be deleted (if name is .* (default) all varibles of the user in the module are deleted)
      - uid: user id
      - sv: security value
     * @return:	True if success and false if not
     */
    public function userDelVar($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $module = FormUtil::getPassedValue('module', isset($args['module']) ? $args['module'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : '.*', 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        //The variable is deleted
        $result = ModUtil::apiFunc('IWmain', 'user', 'userDelVar', array('sv' => $sv,
                    'module' => $module,
                    'uid' => $uid,
                    'name' => $name));
        return $result;
    }

    /**
     * Delete all the variables for a user that are temporally. The variables that have got the parameter nult in the value 1
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the elements:
      - uid: user id
      - sv: security value
     * @return:	True if success and false if not
     */
    public function regenBlockNews($args) {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        //The variable is deleted
        $result = ModUtil::apiFunc('IWmain', 'user', 'regenDinamicVars', array('sv' => $sv,
                    'uid' => $uid));
        return System::redirect($_SERVER['HTTP_REFERER']);
    }

    //***************************************************************************************
    //
    // END - Function used for the managment of user var variables
    //
    //***************************************************************************************

    public function getCaptcha() {
        require_once('modules/IWmain/includes/recaptchalib.php');
        $publickey = $this->getVar('captchaPublicCode');
        return recaptcha_get_html($publickey);
    }

    public function checkCaptcha($args) {
        $recaptcha_challenge_field = FormUtil::getPassedValue('recaptcha_challenge_field', isset($args['recaptcha_challenge_field']) ? $args['recaptcha_challenge_field'] : null, 'POST');
        $recaptcha_response_field = FormUtil::getPassedValue('recaptcha_response_field', isset($args['recaptcha_response_field']) ? $args['recaptcha_response_field'] : null, 'POST');

        require_once('modules/IWmain/includes/recaptchalib.php');
        $privatekey = $this->getVar('captchaPrivateCode');

        $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $recaptcha_challenge_field, $recaptcha_response_field);

        if (!$resp->is_valid) {
            return false;
        } else {
            return true;
        }
    }

}
