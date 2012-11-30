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
            throw new Zikula_Exception_Forbidden();
        }

        $gid = FormUtil::getPassedValue('gid', -1, 'GET');
        if ($gid == -1) {
            LogUtil::registerError('no group id');
            AjaxUtil::output();
        }

        // get group members
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup',
                                       array('sv' => $sv,
                                             'gid' => $gid));

        asort($groupMembers);

        if (empty($groupMembers)) {
            LogUtil::registerError('unable to get group members or group is empty for gid=' . DataUtil::formatForDisplay($gid));
        }

        $view = Zikula_View::getInstance('IWforums', false);
        $view->assign('groupMembers', $groupMembers);
        $view->assign('action', 'chgUsers');
        $content = $view->fetch('IWforums_admin_ajax.htm');
        AjaxUtil::output(array('content' => $content));
    }

    /**
     * Change the characteristics of a forum definition
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the forum and the value to change
     * @return:	the new value in database
     */
    public function modifyForum($args) {
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $fid = FormUtil::getPassedValue('fid', -1, 'GET');
        if ($fid == -1) {
            LogUtil::registerError('no forum id');
            AjaxUtil::output();
        }

        $char = FormUtil::getPassedValue('char', -1, 'GET');
        if ($char == -1) {
            LogUtil::registerError('no char defined');
            AjaxUtil::output();
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
            LogUtil::registerError('Error');
            AjaxUtil::output();
        }

        AjaxUtil::output(array('fid' => $fid));
    }

    /**
     * Change the characteristics of a forum definition
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the forum and the value to change
     * @return:	the field row new value in database
     */
    public function changeContent($args) {
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $fid = FormUtil::getPassedValue('fid', -1, 'GET');
        if ($fid == -1) {
            LogUtil::registerError('no fid id');
            AjaxUtil::output();
        }

        $item = ModUtil::func('IWforums', 'admin', 'getCharsContent',
                               array('fid' => $fid));
    //	$item = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        /* 	if ($item == false) {
          AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Forum not found')));
          }
         */
        $view = Zikula_View::getInstance('IWforums', false);
        $view->assign('forum', $item);
        $content = $view->fetch('IWforums_admin_mainChars.htm');

        AjaxUtil::output(array('content' => $content,
                               'fid' => $fid));
    }

    /**
     * Define a message as marked
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the message
     * @return:	Redirect to the user main page
     */
    public function mark($args) {
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (!UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        $fid = FormUtil::getPassedValue('fid', -1, 'GET');
        if ($fid == -1) {
            AjaxUtil::output('no forum id');
        }

        $fmid = FormUtil::getPassedValue('fmid', -1, 'GET');
        if ($fmid == -1) {
            AjaxUtil::output('no message id');
        }

        //get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                                   array('fid' => $fid));
        if ($forum == false) {
            AjaxUtil::output($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            AjaxUtil::output($this->__('You can\'t access the forum'));
        }

        //get message information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                      array('fmid' => $fmid));
        if ($registre == false) {
            AjaxUtil::output($this->__('No messages have been found'));
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
        AjaxUtil::output(array('fmid' => $fmid,
                               'm' => $m,
                               'markText' => $markText,
                               'reloadFlags' => $reloadFlags));
    }

    /**
     * Delete the access to a group in a forum
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the forum and the group id to delete
     * @return:	the new value in database
     */
    public function deleteGroup($args) {
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $fid = FormUtil::getPassedValue('fid', -1, 'GET');
        if ($fid == -1) {
            AjaxUtil::error('no forum id');
        }
        $gid = FormUtil::getPassedValue('gid', -10, 'GET');
        if ($gid == -10) {
            AjaxUtil::error('no group id');
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

        AjaxUtil::output(array('gid' => $gid,
                               'fid' => $fid));
    }

    /**
     * Delete a forum moderator
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the forum and the user id to delete
     * @return:	the new value in database
     */
    public function deleteModerator($args) {
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $fid = FormUtil::getPassedValue('fid', -1, 'GET');
        if ($fid == -1) {
            AjaxUtil::error('no forum id');
        }
        $id = FormUtil::getPassedValue('id', -1, 'GET');
        if ($gid == -1) {
            AjaxUtil::error('no user id');
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

        AjaxUtil::output(array('id' => $id,
                               'fid' => $fid));
    }

    /**
     * Open a msg content
     * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the id of the message
     * @return:	The message content
     */
    public function openMsg($args) {
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $fid = FormUtil::getPassedValue('fid', -1, 'GET');
        if ($fid == -1) {
            AjaxUtil::output('no forum id');
        }

        $fmid = FormUtil::getPassedValue('fmid', -1, 'GET');
        if ($fmid == -1) {
            AjaxUtil::output('no message id');
        }
        $ftid = FormUtil::getPassedValue('ftid', -1, 'GET');
        $u = FormUtil::getPassedValue('u', -1, 'GET');
        $oid = FormUtil::getPassedValue('oid', -1, 'GET');
        $inici = FormUtil::getPassedValue('inici', -1, 'GET');

        //get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                                   array('fid' => $fid));
        if ($forum == false) {
            AjaxUtil::output($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            AjaxUtil::output($this->__('You can\'t access the forum'));
        }

        //get message information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                      array('fmid' => $fmid));
        if ($registre == false) {
            AjaxUtil::output($this->__('No messages have been found'));
        }
        $content = ModUtil::func('IWforums', 'user', 'openMsg',
                                  array('fid' => $fid,
                                        'fmid' => $fmid,
                                        'ftid' => $ftid,
                                        'u' => $u,
                                        'oid' => $oid,
                                        'inici' => $inici));
        AjaxUtil::output(array('fmid' => $fmid,
                               'content' => $content));
    }
}