<?php

class IWmessages_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    /**
     * Define a note as mached
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function marca($args) {
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }
        if (!UserUtil::isLoggedIn()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('You are not allowed to do this action')));
        }
        $ids = FormUtil::getPassedValue('ids', -1, 'GET');
        if ($ids == -1) {
            AjaxUtil::error('no block id');
        }
        $ids_array = explode('$', $ids);
        foreach ($ids_array as $id) {
            if ($id != '') {
                // get a message information
                $note = ModUtil::apiFunc('IWmessages', 'user', 'get',
                                array('msgid' => $id,
                                    'uid' => UserUtil::getVar('uid')));
                if ($note == false) {
                    LogUtil::registerError('unable to get message info for msgid=' . DataUtil::formatForDisplay($id));
                    AjaxUtil::output();
                }
                //Change the note flag in database
                $status = ModUtil::apiFunc('IWmessages', 'user', 'check',
                                array('msgid' => $id,
                                    'uid' => UserUtil::getVar('uid')));
                if (!$status) {
                    LogUtil::registerError('unable check/uncheck message for msgid=' . DataUtil::formatForDisplay($id));
                } else {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    ModUtil::func('IWmain', 'user', 'userSetVar',
                                    array('module' => 'IWmain_block_flagged',
                                        'name' => 'have_flags',
                                        'value' => 'me',
                                        'sv' => $sv));
                }
            }
        }
        AjaxUtil::output(array('ids' => $ids));
    }

    /**
     * Define a note as mached
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function mark($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }
        if (!UserUtil::isLoggedIn()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('You are not allowed to do this action')));
        }
        $msg_id = FormUtil::getPassedValue('msg_id', -1, 'GET');
        if ($msg_id == -1) {
            AjaxUtil::error('no msg id');
        }
        // get a message information
        $note = ModUtil::apiFunc('IWmessages', 'user', 'get',
                        array('msgid' => $msg_id,
                            'uid' => UserUtil::getVar('uid')));
        if ($note == false) {
            AjaxUtil::error('unable to get message info for msgid=' . DataUtil::formatForDisplay($msg_id));
        }
        //Change the note flag in database
        $status = ModUtil::apiFunc('IWmessages', 'user', 'check',
                        array('msgid' => $msg_id,
                            'uid' => UserUtil::getVar('uid')));
        if (!$status) {
            AjaxUtil::error('unable check/uncheck message for msgid=' . DataUtil::formatForDisplay($msg_id));
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('module' => 'IWmain_block_flagged',
                                'name' => 'have_flags',
                                'value' => 'me',
                                'sv' => $sv));
        }
        AjaxUtil::output(array('msg_id' => $msg_id));
    }

    /**
     * Delete a message
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note, the topic that is viewing the user and the information of the saved mode
     * @return:	Thue if success
     */
    public function delete($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }
        if (!UserUtil::isLoggedIn()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('You are not allowed to do this action')));
        }
        $ids = FormUtil::getPassedValue('ids', -1, 'GET');
        $qui = FormUtil::getPassedValue('qui', -1, 'GET');
        if ($ids == -1 || $qui == -1) {
            AjaxUtil::error('no id');
        }
        $ids_array = explode('$', $ids);
        foreach ($ids_array as $id) {
            if ($id != '') {
                // get a message information
                $note = ModUtil::apiFunc('IWmessages', 'user', 'get',
                                array('msgid' => $id,
                                    'uid' => UserUtil::getVar('uid')));
                if ($note == false) {
                    AjaxUtil::error('unable to get message info for msgid=' . DataUtil::formatForDisplay($id));
                }
                //Change the note flag in database
                $status = ModUtil::apiFunc('IWmessages', 'user', 'delete',
                                array('msgid' => $id,
                                    'uid' => UserUtil::getVar('uid'),
                                    'qui' => $qui));
                if (!$status) {
                    AjaxUtil::error('unable delete message for msgid=' . DataUtil::formatForDisplay($id));
                }
            }
        }
        AjaxUtil::output(array('ids' => $ids));
    }

    /**
     * get the users who have the first leter like the parameter
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   value to search for
     * @return:	A list of users
     */
    public function autocompleteUser($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }
        if (!UserUtil::isLoggedIn()) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('You are not allowed to do this action')));
        }
        $value = FormUtil::getPassedValue('value', -1, 'GET');
        $pos = strrpos($value, ',');
        $newValue = ($pos > 0) ? substr($value, $pos - strlen($value) + 1) : $value;
        $usersString = '';
        if ($newValue != '') {
            $users = ModUtil::apiFunc('IWmessages', 'user', 'getUsers',
                            array('value' => $newValue));
            $usersList = '$$';
            foreach ($users as $user) {
                $usersList .= $user['uid'] . '$$';
            }
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $usersNames = ModUtil::func('IWmain', 'user', 'getAllUsersInfo',
                            array('sv' => $sv,
                                'info' => 'ncc',
                                'list' => $usersList));
            foreach ($users as $user) {
                $userName = substr($user['uname'], strlen($newValue), strlen($user['uname']));
                $usersString .= "<div><a style=\"cursor: pointer;\" onclick=\"add('" . $value . $userName . "')\">" . $user['uname'] . " - " . $usersNames[$user['uid']] . "</a></div>";
            }
        }
        AjaxUtil::output(array('users' => $usersString));
    }

    public function view($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }
        $inici = FormUtil::getPassedValue('inici', -1, 'GET');
        $rpp = FormUtil::getPassedValue('rpp', -1, 'GET');
        $inicisend = FormUtil::getPassedValue('inicisend', -1, 'GET');
        $rppsend = FormUtil::getPassedValue('rppsend', -1, 'GET');
        $filtersend = FormUtil::getPassedValue('filtersend', -1, 'GET');
        $filter = FormUtil::getPassedValue('filter', -1, 'GET');
        $content = ModUtil::func('IWmessages', 'user', 'view',
                        array('inici' => $inici,
                            'rpp' => $rpp,
                            'inicisend' => $inicisend,
                            'rppsend' => $rppsend,
                            'filtersend' => $filtersend,
                            'filter' => $filter));
        AjaxUtil::output(array('content' => $content));
    }

    public function display($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }
        $msgid = FormUtil::getPassedValue('msgid', -1, 'GET');
        if ($msgid == -1) {
            AjaxUtil::error('no msg id');
        }

        $qui = FormUtil::getPassedValue('qui', -1, 'GET');
        if ($qui == -1) {
            AjaxUtil::error('no who value');
        }
        $inici = FormUtil::getPassedValue('inici', -1, 'GET');
        $rpp = FormUtil::getPassedValue('rpp', -1, 'GET');
        $inicisend = FormUtil::getPassedValue('inicisend', -1, 'GET');
        $rppsend = FormUtil::getPassedValue('rppsend', -1, 'GET');
        $filtersend = FormUtil::getPassedValue('filtersend', -1, 'GET');
        $filter = FormUtil::getPassedValue('filter', -1, 'GET');
        $content = ModUtil::func('IWmessages', 'user', 'display',
                        array('msgid' => $msgid,
                            'uid' => $qui,
                            'inici' => $inici,
                            'rpp' => $rpp,
                            'inicisend' => $inicisend,
                            'rppsend' => $rppsend,
                            'filtersend' => $filtersend,
                            'filter' => $filter));

        AjaxUtil::output(array('content' => $content));
    }

    public function displaysend($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }
        $msgid = FormUtil::getPassedValue('msgid', -1, 'GET');
        if ($msgid == -1) {
            AjaxUtil::error('no msg id');
        }
        $qui = FormUtil::getPassedValue('qui', -1, 'GET');
        if ($qui == -1) {
            AjaxUtil::error('no who value');
        }
        $uid = FormUtil::getPassedValue('uid', -1, 'GET');
        if ($uid == -1) {
            AjaxUtil::error('no user id');
        }
        $inici = FormUtil::getPassedValue('inici', -1, 'GET');
        $rpp = FormUtil::getPassedValue('rpp', -1, 'GET');
        $inicisend = FormUtil::getPassedValue('inicisend', -1, 'GET');
        $rppsend = FormUtil::getPassedValue('rppsend', -1, 'GET');
        $filtersend = FormUtil::getPassedValue('filtersend', -1, 'GET');
        $filter = FormUtil::getPassedValue('filter', -1, 'GET');
        $content = ModUtil::func('IWmessages', 'user', 'displaysend',
                        array('msgid' => $msgid,
                            'qui' => $qui,
                            'uid' => $uid,
                            'inici' => $inici,
                            'rpp' => $rpp,
                            'inicisend' => $inicisend,
                            'rppsend' => $rppsend,
                            'filtersend' => $filtersend,
                            'filter' => $filter));
        AjaxUtil::output(array('content' => $content));
    }

}