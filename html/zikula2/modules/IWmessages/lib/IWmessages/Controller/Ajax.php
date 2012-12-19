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
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        if (!UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Fatal($this->__('You are not allowed to do this action'));
        }
        $ids = $this->request->getPost()->get('ids', '');
        if (!$ids) {
            throw new Zikula_Exception_Fatal($this->__('no block id'));
        }
        $ids_array = explode('$', $ids);
        foreach ($ids_array as $id) {
            if ($id != '') {
                // get a message information
                $note = ModUtil::apiFunc('IWmessages', 'user', 'get', array('msgid' => $id,
                            'uid' => UserUtil::getVar('uid')));
                if ($note == false) {
                    throw new Zikula_Exception_Fatal($this->__('unable to get message info for msgid=') . DataUtil::formatForDisplay($id));
                }
                //Change the note flag in database
                $status = ModUtil::apiFunc('IWmessages', 'user', 'check', array('msgid' => $id,
                            'uid' => UserUtil::getVar('uid')));
                if (!$status) {
                    throw new Zikula_Exception_Fatal($this->__('unable check/uncheck message for msgid=') . DataUtil::formatForDisplay($id));
                } else {
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_flagged',
                        'name' => 'have_flags',
                        'value' => 'me',
                        'sv' => $sv));
                }
            }
        }
        return new Zikula_Response_Ajax(array('ids' => $ids));
    }

    /**
     * Define a note as mached
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function mark($args) {
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        if (!UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Fatal($this->__('You are not allowed to do this action'));
        }
        $msg_id = $this->request->getPost()->get('msg_id', '');
        if (!$msg_id) {
            throw new Zikula_Exception_Fatal($this->__('no msg id'));
        }
        // get a message information
        $note = ModUtil::apiFunc('IWmessages', 'user', 'get', array('msgid' => $msg_id,
                    'uid' => UserUtil::getVar('uid')));
        if ($note == false) {
            throw new Zikula_Exception_Fatal($this->__('unable to get message info for msgid=') . DataUtil::formatForDisplay($msg_id));
        }
        //Change the note flag in database
        $status = ModUtil::apiFunc('IWmessages', 'user', 'check', array('msgid' => $msg_id,
                    'uid' => UserUtil::getVar('uid')));
        if (!$status) {
            throw new Zikula_Exception_Fatal($this->__('unable check/uncheck message for msgid=') . DataUtil::formatForDisplay($msg_id));
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_flagged',
                'name' => 'have_flags',
                'value' => 'me',
                'sv' => $sv));
        }
        return new Zikula_Response_Ajax(array('msg_id' => $msg_id));
    }

    /**
     * Delete a message
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note, the topic that is viewing the user and the information of the saved mode
     * @return:	Thue if success
     */
    public function delete($args) {
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        if (!UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Fatal($this->__('You are not allowed to do this action'));
        }
        $ids = $this->request->getPost()->get('ids', '');
        $qui = $this->request->getPost()->get('qui', '');
        if (!$ids || !$qui) {
            throw new Zikula_Exception_Fatal($this->__('no id'));
        }
        $ids_array = explode('$', $ids);
        foreach ($ids_array as $id) {
            if ($id != '') {
                // get a message information
                $note = ModUtil::apiFunc('IWmessages', 'user', 'get', array('msgid' => $id,
                            'uid' => UserUtil::getVar('uid')));
                if ($note == false) {
                    throw new Zikula_Exception_Fatal($this->__('unable to get message info for msgid=') . DataUtil::formatForDisplay($id));
                }
                //Change the note flag in database
                $status = ModUtil::apiFunc('IWmessages', 'user', 'delete', array('msgid' => $id,
                            'uid' => UserUtil::getVar('uid'),
                            'qui' => $qui));
                if (!$status) {
                    throw new Zikula_Exception_Fatal($this->__('unable to get message info for msgid=') . DataUtil::formatForDisplay($id));
                }
            }
        }
        return new Zikula_Response_Ajax(array('ids' => $ids));
    }

    /**
     * get the users who have the first leter like the parameter
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   value to search for
     * @return:	A list of users
     */
    public function autocompleteUser($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        if (!UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Fatal($this->__('You are not allowed to do this action'));
        }
        $value = $this->request->getPost()->get('value', '');

        $pos = strrpos($value, ',');
        $newValue = ($pos > 0) ? substr($value, $pos - strlen($value) + 1) : $value;
        $usersString = '';
        if ($newValue != '') {
            $users = ModUtil::apiFunc('IWmessages', 'user', 'getUsers', array('value' => $newValue));
            $usersList = '$$';
            foreach ($users as $user) {
                $usersList .= $user['uid'] . '$$';
            }
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $usersNames = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                        'info' => 'ncc',
                        'list' => $usersList));
            foreach ($users as $user) {
                $userName = substr($user['uname'], strlen($newValue), strlen($user['uname']));
                $usersString .= "<div><a style=\"cursor: pointer;\" onclick=\"add('" . $value . $userName . "')\">" . $user['uname'] . " - " . $usersNames[$user['uid']] . "</a></div>";
            }
        }
        return new Zikula_Response_Ajax(array('users' => $usersString));
    }

    public function view($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $inici = $this->request->getPost()->get('inici', '');
        $rpp = $this->request->getPost()->get('rpp', '');
        $inicisend = $this->request->getPost()->get('inicisend', '');
        $rppsend = $this->request->getPost()->get('rppsend', '');
        $filtersend = $this->request->getPost()->get('filtersend', '');
        $filter = $this->request->getPost()->get('filter', '');

        $content = ModUtil::func('IWmessages', 'user', 'view', array('inici' => $inici,
                    'rpp' => $rpp,
                    'inicisend' => $inicisend,
                    'rppsend' => $rppsend,
                    'filtersend' => $filtersend,
                    'filter' => $filter));
        return new Zikula_Response_Ajax(array('content' => $content));
    }

    public function display($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $msgid = $this->request->getPost()->get('msgid', '');
        if (!$msgid) {
            throw new Zikula_Exception_Fatal($this->__('no msg id'));
        }

        $qui = $this->request->getPost()->get('qui', '');
        if (!$qui) {
            throw new Zikula_Exception_Fatal($this->__('no who value'));
        }

        $inici = $this->request->getPost()->get('inici', '');
        $rpp = $this->request->getPost()->get('rpp', '');
        $inicisend = $this->request->getPost()->get('inicisend', '');
        $rppsend = $this->request->getPost()->get('rppsend', '');
        $filtersend = $this->request->getPost()->get('filtersend', '');
        $filter = $this->request->getPost()->get('filter', '');

        $content = ModUtil::func('IWmessages', 'user', 'display', array('msgid' => $msgid,
                    'uid' => $qui,
                    'inici' => $inici,
                    'rpp' => $rpp,
                    'inicisend' => $inicisend,
                    'rppsend' => $rppsend,
                    'filtersend' => $filtersend,
                    'filter' => $filter));

        return new Zikula_Response_Ajax(array('content' => $content));
    }

    public function displaysend($args) {

        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $msgid = $this->request->getPost()->get('msgid', '');
        if (!$msgid) {
            throw new Zikula_Exception_Fatal($this->__('no msg id'));
        }

        $qui = $this->request->getPost()->get('qui', '');
        if (!$qui) {
            throw new Zikula_Exception_Fatal($this->__('no who value'));
        }
        $uid = $this->request->getPost()->get('uid', '');
        if (!$uid) {
            throw new Zikula_Exception_Fatal($this->__('no user id'));
        }

        $inici = $this->request->getPost()->get('inici', '');
        $rpp = $this->request->getPost()->get('rpp', '');
        $inicisend = $this->request->getPost()->get('inicisend', '');
        $rppsend = $this->request->getPost()->get('rppsend', '');
        $filtersend = $this->request->getPost()->get('filtersend', '');
        $filter = $this->request->getPost()->get('filter', '');

        $content = ModUtil::func('IWmessages', 'user', 'displaysend', array('msgid' => $msgid,
                    'qui' => $qui,
                    'uid' => $uid,
                    'inici' => $inici,
                    'rpp' => $rpp,
                    'inicisend' => $inicisend,
                    'rppsend' => $rppsend,
                    'filtersend' => $filtersend,
                    'filter' => $filter));

        return new Zikula_Response_Ajax(array('content' => $content));
    }

}