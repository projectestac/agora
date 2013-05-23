<?php

class IWjclic_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    /**
     * Hide/show the information of an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the activity
     * @return:	the activity id but with hanges in database
     */
    public function hideShow($args) {
        if (!SecurityUtil::checkPermission('IWjclic::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $jid = $this->request->getPost()->get('jid', '');
        if (!$jid) {
            throw new Zikula_Exception_Fatal($this->__('no activity id'));
        }

        // get activity
        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find the allocation requested'));
        }

        $extended = (strpos($jclic['extended'], '$' . UserUtil::getVar('uid') . '$') !== false) ? str_replace('$' . UserUtil::getVar('uid') . '$', '', $jclic['extended']) : $jclic['extended'] . '$' . UserUtil::getVar('uid') . '$';
        $extendedState = (strpos($jclic['extended'], '$' . UserUtil::getVar('uid') . '$') !== false) ? 0 : 1;

        $items = array('extended' => $extended);
        $edited = ModUtil::apiFunc('IWjclic', 'user', 'update', array('jid' => $jid,
                    'items' => $items));
        if (!$edited) {
            throw new Zikula_Exception_Fatal($this->__('There was an error in editing the property'));
        }

        $view = Zikula_View::getInstance('IWjclic', false);
        $activityArray = ModUtil::func('IWjclic', 'user', 'getActivityContent', array('jid' => $jclic['jid']));
        $activityArray['extended'] = $extendedState;
        $view->assign('activity', $activityArray);
        $content = $view->fetch('IWjclic_user_assignedContent.htm');


        return new Zikula_Response_Ajax(array('jid' => $jid,
                    'content' => $content,
                ));
    }

    /**
     * Hide/show the results for an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the activity
     * @return:	the activity id but with hanges in database
     */
    public function results($args) {
        if (!SecurityUtil::checkPermission('IWjclic::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $jid = $this->request->getPost()->get('jid', '');
        if (!$jid) {
            throw new Zikula_Exception_Fatal($this->__('no activity id'));
        }

        $uid = $this->request->getPost()->get('uid', '');
        if (!$uid) {
            $uid = UserUtil::getVar('uid');
            $correct = 0;
        } else {
            $correct = 1;
        }

        if (!is_numeric($uid)) {
            $uid = UserUtil::getVar('uid');
            $correct = 0;
        }

        // get activity
        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find the allocation requested'));
        }

        $view = Zikula_View::getInstance('IWjclic', false);
        $resultsArray = ModUtil::func('IWjclic', 'user', 'results', array('jid' => $jid,
                    'uid' => $uid,
                    'all' => 1,
                    'correct' => $correct,
                    'scoreToOptain' => $jclic['scoreToOptain'],
                    'solvedToOptain' => $jclic['solvedToOptain']));

        $view->assign('results', $resultsArray);
        $view->assign('jid', $jid);
        $view->assign('correct', $correct);
        $view->assign('uid', $uid);
        $content = $view->fetch('IWjclic_user_results.htm');

        return new Zikula_Response_Ajax(array('jid' => $jid,
                    'uid' => $uid,
                    'content' => $content,
                    'correct' => $correct,
                ));
    }

    /**
     * Edit the notes observations or the answares to users who has made activities
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the activity id and user id
     * @return:	Show the observations or renotes contents forms
     */
    public function editCorrectContent($args) {
        if (!SecurityUtil::checkPermission('IWjclic::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $jid = $this->request->getPost()->get('jid', '');
        if (!$jid) {
            throw new Zikula_Exception_Fatal($this->__('no activity id'));
        }

        $uid = $this->request->getPost()->get('uid', '');
        if (!$uid) {
            throw new Zikula_Exception_Fatal($this->__('no user id'));
        }

        $toDo = $this->request->getPost()->get('toDo', '');
        if (!$toDo) {
            throw new Zikula_Exception_Fatal($this->__('no action defined'));
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find the allocation requested'));
        }

        //check user access this assignament
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        //get user session
        $session = ModUtil::apiFunc('IWjclic', 'user', 'getUserSession', array('key' => $jid,
                    'user_id' => $uid));

        if ($session == false) {
            //Create session user
            ModUtil::apiFunc('IWjclic', 'user', 'createUser', array('user_id' => $uid,
                'key' => $jid));
        }

        $view = Zikula_View::getInstance('IWjclic', false);
        $view->assign('do', 'edit');
        $view->assign('uid', $uid);
        $view->assign('jid', $jid);

        if ($toDo == 'observations') {
            $view->assign('content', $session[$uid]['observations']);
            $content = $view->fetch('IWjclic_user_correctObs.htm');
        }
        if ($toDo == 'renotes') {
            $view->assign('content', $session[$uid]['renotes']);
            $content = $view->fetch('IWjclic_user_correctRenotes.htm');
        }

        return new Zikula_Response_Ajax(array('jid' => $jid,
                    'uid' => $uid,
                    'content' => $content,
                    'toDo' => $toDo,
                ));
    }

    /**
     * update the notes observations or the answares to writers
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Change the observations or renotes contents
     */
    public function submitValue($args) {
        if (!SecurityUtil::checkPermission('IWjclic::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }


        $jid = $this->request->getPost()->get('jid', '');
        if (!$jid) {
            throw new Zikula_Exception_Fatal($this->__('no activity id'));
        }

        $uid = $this->request->getPost()->get('uid', '');
        if (!$uid) {
            throw new Zikula_Exception_Fatal($this->__('no user id'));
        }

        $toDo = $this->request->getPost()->get('toDo', '');
        if (!$toDo) {
            throw new Zikula_Exception_Fatal($this->__('no action defined'));
        }

        $value = $this->request->getPost()->get('value', '');
        if (!$value) {
            throw new Zikula_Exception_Fatal($this->__('no value defined'));
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find the allocation requested'));
        }

        //check user access this assignament
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        //submit values
        $submited = ModUtil::apiFunc('IWjclic', 'user', 'submitValue', array('content' => utf8_decode($value),
                    'jid' => $jid,
                    'user_id' => $uid,
                    'toDo' => $toDo));
        if ($submited == false) {
            throw new Zikula_Exception_Fatal($this->__('An error occurred while editing the content'));
        }

        $view = Zikula_View::getInstance('IWjclic', false);
        $view->assign('do', 'print');

        $session['uid'] = $uid;
        $jclic['jid'] = $jid;

        if ($toDo == 'observations') {
            $session['observations'] = utf8_decode($value);
            $view->assign('session', $session);
            $view->assign('jclic', $jclic);
            $content = $view->fetch('IWjclic_user_correctObs.htm');
        }
        if ($toDo == 'renotes') {
            $session['renotes'] = utf8_decode($value);
            $view->assign('session', $session);
            $view->assign('jclic', $jclic);
            $content = $view->fetch('IWjclic_user_correctRenotes.htm');
        }

        return new Zikula_Response_Ajax(array('uid' => $uid,
                    'content' => $content,
                    'toDo' => $toDo,
                ));
    }

    /**
     * Delete all the information about an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	args   Id of the activity
     * @return:	the activity id removed from database
     */
    public function delete($args) {
        if (!SecurityUtil::checkPermission('IWjclic::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $jid = $this->request->getPost()->get('jid', '');
        if (!$jid) {
            throw new Zikula_Exception_Fatal($this->__('no activity id'));
        }

        // get activity
        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            throw new Zikula_Exception_Fatal($this->__('Could not find the allocation requested'));
        }

        //Check if user can delete the assignament
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        //delete all the users
        if (!ModUtil::apiFunc('IWjclic', 'user', 'delUsers', array('jid' => $jid))) {
            throw new Zikula_Exception_Fatal($this->__('Unable to delete users associated with the allocation'));
        }

        //delete all the session
        if (!ModUtil::apiFunc('IWjclic', 'user', 'delSessions', array('jid' => $jid))) {
            throw new Zikula_Exception_Fatal($this->__('Unable to delete sessions related to the allocation'));
        }

        //delete the assignament
        if (!ModUtil::apiFunc('IWjclic', 'user', 'delAssignament', array('jid' => $jid))) {
            throw new Zikula_Exception_Fatal($this->__('Failed to delete the allocation'));
        }

        //if the assignament have an associated file, delete it
        if ($jclic['file'] != '') {
            unlink(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWjclic', 'jclicUpdatedFiles') . '/' . $jclic['file']);
        }

        return new Zikula_Response_Ajax(array('jid' => $jid,
                ));
    }

}