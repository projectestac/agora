<?php
class IWforums_Controller_Ajax extends Zikula_Controller_AbstractAjax {
    /**
     * Change the users in select list
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the note
     * @return:	Redirect to the user main page
     */
    public function chgUsers($args) {
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $gid = $this->request->getPost()->get('gid', '');
        if (!$gid) {
            throw new Zikula_Exception_Fatal($this->__('no group id'));
        }

        // get group members
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup',
                                       array('sv' => $sv,
                                             'gid' => $gid));

        asort($groupMembers);

        if (empty($groupMembers)) {
            AjaxUtil::error($this->__('unable to get group members or group is empty for gid=') . DataUtil::formatForDisplay($gid));
        }

        $view = Zikula_View::getInstance('IWforums', false);
        $view->assign('groupMembers', $groupMembers);
        $view->assign('action', 'chgUsers');
        $content = $view->fetch('IWforums_admin_ajax.htm');
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * Change the characteristics of a forum definition
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the forum and the value to change
     * @return:	the new value in database
     */
    public function modifyForum($args) {
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no forum id'));
        }

        $char = $this->request->getPost()->get('character', '');
        if (!$char) {
            throw new Zikula_Exception_Fatal($this->__('no char defined'));
        }

        //Get agenda information
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                                  array('fid' => $fid));
        if ($item == false) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Forum not found')));
        }

        $value = ($item[$char]) ? 0 : 1;

        //change value in database
        $items = array($char => $value);

        if (!ModUtil::apiFunc('IWforums', 'admin', 'update',
                               array('fid' => $fid,
                    'items' => $items))) {
            LogUtil::registerError($this->__('Error'));
            AjaxUtil::output();
        }

        return new Zikula_Response_Ajax(array('fid' => $fid,
                ));
    }

    /**
     * Change the characteristics of a forum definition
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the forum and the value to change
     * @return:	the field row new value in database
     */
    public function changeContent($args) {
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no forum id'));
        }

        $item = ModUtil::func('IWforums', 'admin', 'getCharsContent',
                               array('fid' => $fid));

        $view = Zikula_View::getInstance('IWforums', false);
        $view->assign('forum', $item);
        $content = $view->fetch('IWforums_admin_mainChars.htm');

        return new Zikula_Response_Ajax(array('content' => $content,
                'fid' => $fid,
                ));
    }

    /**
     * Define a message as marked
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the message
     * @return:	Redirect to the user main page
     */
    public function mark($args) {
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        if (!UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Fatal();
        }

        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no forum id'));
        }

        $fmid = $this->request->getPost()->get('fmid', '');
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no message idd'));
        }

        //get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                                   array('fid' => $fid));
        if ($forum == false) {
            AjaxUtil::error($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            AjaxUtil::error($this->__('You can\'t access the forum'));
        }

        //get message information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                      array('fmid' => $fmid));
        if ($registre == false) {
            AjaxUtil::error($this->__('No messages have been found'));
        }

        $marcat = (strpos($registre['marcat'], '$' . UserUtil::getVar('uid') . '$') === false) ? $registre['marcat'] . '$' . UserUtil::getVar('uid') . '$' : str_replace('$' . UserUtil::getVar('uid') . '$', '', $registre['marcat']);

        $m = (strpos($registre['marcat'], '$' . UserUtil::getVar('uid') . '$') === false) ? 1 : 0;

        $ha_marcat = ModUtil::apiFunc('IWforums', 'user', 'marcat',
                                       array('marcat' => $marcat,
                                             'fmid' => $fmid));
        ;
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar',
                       array('module' => 'IWmain_block_flagged',
                             'name' => 'have_flags',
                             'value' => 'fo',
                             'sv' => $sv));

        $markText = ($m == 0) ? $this->__("Check the message") : $this->__('Uncheck the message');

        $markText = "<span style=\"cursor: pointer;\" id=\"markText\"><a onclick=\"javascript:mark(" . $fid . "," . $fmid . ")\">" . $markText . "</a></span>";
        $modid = ModUtil::getIdFromName('IWmain');
        $blocks = ModUtil::apiFunc('Blocks', 'user', 'getall',
                                    array('modid' => $modid));
        if (!empty($blocks)) {
            $reloadFlags = ($blocks[0]['active'] == 1) ? true : false;
        } else {
            $reloadFlags = false;
        }

        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                'm' => $m,
                'markText' => $markText,
                'reloadFlags' => $reloadFlags,
                ));
    }

    /**
     * Delete the access to a group in a forum
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the forum and the group id to delete
     * @return:	the new value in database
     */
    public function deleteGroup($args) {
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no forum id'));
        }

        $gid = $this->request->getPost()->get('gid', '');
        if (!$gid) {
            throw new Zikula_Exception_Fatal($this->__('no group id'));
        }

        //Get item
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                                  array('fid' => $fid));
        if ($item == false) {
            AjaxUtil::error($this->__('Forum not found'));
        }

        $groupString = str_replace('$' . $gid . '$', '', $item['grup']);

        $items = array('grup' => $groupString);
        if (!ModUtil::apiFunc('IWforums', 'admin', 'update',
                               array('fid' => $fid,
                                     'items' => $items))) {
            AjaxUtil::error('error deleting group');
        }

        return new Zikula_Response_Ajax(array('gid' => $gid,
                'fid' => $fid,
                ));
    }

    /**
     * Delete a forum moderator
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the forum and the user id to delete
     * @return:	the new value in database
     */
    public function deleteModerator($args) {
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no forum id'));
        }

        $id = $this->request->getPost()->get('id', '');
        if (!$id) {
            throw new Zikula_Exception_Fatal($this->__('no user id'));
        }

        //Get item
        $item = ModUtil::apiFunc('IWforums', 'user', 'get',
                                  array('fid' => $fid));
        if ($item == false) {
            AjaxUtil::error($this->__('Forum not found'));
        }

        $respString = str_replace('$' . $id . '$', '', $item['mod']);

        $items = array('mod' => $respString);
        if (!ModUtil::apiFunc('IWforums', 'admin', 'update',
                               array('fid' => $fid,
                                     'items' => $items))) {
            AjaxUtil::error('error deleting moderator');
        }

        return new Zikula_Response_Ajax(array('id' => $id,
                'fid' => $fid,
                ));
    }

    /**
     * Open a msg content
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the message
     * @return:	The message content
     */
    public function openMsg($args) {
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no forum id'));
        }

        $fmid = $this->request->getPost()->get('fmid', '');
        if (!$fmid) {
            throw new Zikula_Exception_Fatal($this->__('no message id'));
        }

        $ftid = $this->request->getPost()->get('ftid', '');
        $u = $this->request->getPost()->get('u', '');
        $oid = $this->request->getPost()->get('oid', '');
        $inici = $this->request->getPost()->get('inici', '');

        //get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                                   array('fid' => $fid));
        if ($forum == false) {
            AjaxUtil::error($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            AjaxUtil::error($this->__('You can\'t access the forum'));
        }

        //get message information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                      array('fmid' => $fmid));
        if ($registre == false) {
            AjaxUtil::error($this->__('No messages have been found'));
        }
        $content = ModUtil::func('IWforums', 'user', 'openMsg',
                                  array('fid' => $fid,
                                        'fmid' => $fmid,
                                        'ftid' => $ftid,
                                        'u' => $u,
                                        'oid' => $oid,
                                        'inici' => $inici));

        return new Zikula_Response_Ajax(array('fmid' => $fmid,
                'content' => $content,
                ));
    }
}
