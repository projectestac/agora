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
        return new Zikula_Response_Ajax(array('content' => $content));
    }
    
    /**
     * Reorder forum topics list or delete topic and then repaint
     * @param fid Forum id
     * @param ftid Topic id
     */
    public function reorderTopics($args){
        $fid = $this->request->getPost()->get('fid', '');
        $ftid = $this->request->getPost()->get('ftid', '');
        $delete = $this->request->getPost()->get('deleteTopic', false);
        $strTopicsOrder = $this->request->getPost()->get('ordre', '');   
        // Prepare strTopicsOrder like row[]=2&row[]=5&row[]=1 into order array
        $nordre = preg_replace ('/row\[\]=/' , '' ,$strTopicsOrder );       
        $arrTopicsOrder = explode("&", $nordre);
        
        $files = ModUtil::apiFunc('IWforums', 'user', 'get_adjunts', array('fid' => $fid));
        //AjaxUtil::error(DataUtil::formatForDisplayHTML(var_dump($files)));
        
        $count = 1;
        if (is_array($arrTopicsOrder)) {
            foreach ($arrTopicsOrder as $topic) {                
                $resu = ModUtil::apiFunc($this->name, 'user', 'put_order', array( 'fid' => $fid, 'ftid' => $topic, 'ordre' => $count));
                $count++;
            }
        }        
        if ($delete) {
            ModUtil::apiFunc($this->name, 'user', 'deltema', array( 'fid' => $fid, 'ftid' => $ftid));
        }
        // Get new order topics list 
        $topics = ModUtil::apiFunc($this->name, 'user', 'get_temes', array('fid' => $fid));
        // Get users info
        $usersList ='';
        foreach ($topics as $tema) {            
            $usersList .= $tema['lastuser'] . '$$' . $tema['usuari'] . '$$';
        }        
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                    'info' => 'ncc',
                    'list' => $usersList));
        
        $hi_ha_temes = count($topics);
        // Get user access rights
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));        
        $moderator = ($access == 4) ? true : false;
            
        $view = Zikula_View::getInstance('IWforums', false);
        $view->assign('users', $users);
        $view->assign('hi_ha_temes', $hi_ha_temes);
        $view->assign('temes', $topics);
        $view->assign('fid', $fid);
        $view->assign('ftid', $ftid);
        $view->assign('moderator', $moderator);        
        $view->assign('userid', UserUtil::getVar('uid'));
        $view->assign('files', $files);
        
        $content = $view->fetch('user/IWforums_user_topicsList.tpl');         
        return new Zikula_Response_Ajax(array('content' => $content));        
    }
    
    /**
     * Delete message attached file
     * @author Josep Ferràndiz Farré (jferran6@xtec.cat)
     * @param args Array with fmid (message id) where the file is attached
     *  
     */
    public function delAttachment($args){
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        
        $fid = $this->request->getPost()->get('fid', '');
        $fmid = $this->request->getPost()->get('fmid', '');
        
        $missatge = ModUtil::ApiFunc('IWforums', 'user', 'del_adjunt', array('fmid' => $fmid, 'fid' => $fid ));
        $missatge['adjunt']="";
        $view = Zikula_View::getInstance('IWforums', false);
        $view->assign('missatge', $missatge);
        $content = $view->fetch('ajax/IWforums_ajax_attachment.tpl');
        return new Zikula_Response_Ajax(array('content' => $content, 'btnMsg' => $this->__('Browse...')));
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

    /*
     * Edit a forum fields title, long description and brief description
     */
    
    public function editForumDesc($args){
        
        $fid = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('no forum id'));
        }
        
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 4) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to edit content forum.'));
        }
        
        // Get forum fields
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                                  array('fid' => $fid));
             
        if ($forum == false) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Forum not found')));
        }
        
        $view = Zikula_View::getInstance('IWforums', false);
        //$view->assign('fid', $fid);
        $view->assign('nom_forum', $forum['nom_forum']);
        $view->assign('descriu', $forum['descriu']);
        $view->assign('lDesc', $forum['longDescriu']);
        $view->assign('observacions', $forum['observacions']);
        $view->assign('forum', $forum);
        $view->assign('mode', 'edit');

        $content = $view->fetch('user/IWforums_user_forumDesc.tpl');
        
        return new Zikula_Response_Ajax(array('content' => $content));
    }
    
    /*
     * Edit a topic fields title and description
     */
    
    public function editTopic($args){
         if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $fid  = $this->request->getPost()->get('fid', '');
        $ftid = $this->request->getPost()->get('ftid', '');
        
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        //$editAllowed = ModUtil::apiFunc($this->name, 'IWforums', 'canEdit', array('fid' => $fid, 'ftid'=>$ftid));
        if ($access < 1) {
            AjaxUtil::error($this->__('You can\'t access the forum'));
        }
        
        //$sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        // get forum info
        //$forum = ModUtil::apiFunc($this->name, 'user','get', array('fid' => $fid, 'sv'=>$sv));
        // get topic info
        $topic = ModUtil::apiFunc($this->name, 'user', 'get_tema', array('fid' => $fid, 'ftid'=>$ftid));

        $view = Zikula_View::getInstance('IWforums', false);
        $view->assign('fid', $fid);
        $view->assign('ftid', $ftid);
        $view->assign('titol', $topic['titol']);
        $view->assign('descriu', $topic['descriu']);

        $content = $view->fetch('ajax/IWforums_ajax_editTopic.tpl');

        return new Zikula_Response_Ajax(array('content' => $content,
                'id' => $ftid,
                ));
    }
    
    /*
     * Show topic info 
     */
    public function getTopic($args){
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
      
        $fid  = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('No forum id'));
        }
        $ftid = $this->request->getPost()->get('ftid', '');
         if (!$ftid) {
            throw new Zikula_Exception_Fatal($this->__('No topic id'));
        }  

        $content = ModUtil::func($this->name, 'user', 'getTopic', array('fid' => $fid, 'ftid' => $ftid));
        return new Zikula_Response_Ajax(array('content' => $content,
                'id' => $ftid,
                ));
    }
    
    /*
     * Set forum changes
     */
    public function setForum($args){
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $item = array();
        $item['fid']  = $this->request->getPost()->get('fid', '');
        if (!$item['fid']) {
            throw new Zikula_Exception_Fatal($this->__('No forum id'));
        }
        
        $item['nom_forum']    = $this->request->getPost()->get('nom_forum', '');
        $item['longDescriu']  = $this->request->getPost()->get('longDescriu', '');
        $item['descriu']      = $this->request->getPost()->get('descriu', '');
        $item['observacions'] = $this->request->getPost()->get('observacions', '');
                
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $item['fid']));
        
        $moderator = ($access == 4) ? true : false;
        // Set topic changes
        $result = ModUtil::apiFunc($this->name, 'user', 'setForum', $item);
        $forum = ModUtil::apiFunc($this->name, 'user', 'get', array('fid' => $item['fid']));
        
        $view = Zikula_View::getInstance($this->name, false);
        
        $view->assign('name', $forum['nom_forum'])
             ->assign('descriu', $forum['descriu'])
             ->assign('observacions', $forum['observacions'])
             ->assign('lDesc', $forum['longDescriu'])
             ->assign('moderator', $moderator)
             ->assign('topicsPage', $this->request->getPost()->get('topicsPage', 0))
             ->assign('fid', $forum['fid']);

        $content = $view->fetch('user/IWforums_user_forumDesc.tpl');
        if(ModUtil::available('Scribite')) {
            $modScId = ModUtil::getIdFromName('Scribite');
            $modScInfo = ModUtil::getInfo($modScId);
            if ($modScInfo['version'] < '5.0.0') {
                $moduleSc = 'old';
            }else{
                $moduleSc = 'new';
            }
        }else{
            $moduleSc = false;
        }
        return new Zikula_Response_Ajax(array('content' => $content, 'moduleSc' => $moduleSc));
    }
    
    /*
     * Set topic changes
     */
    public function setTopic($args){
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
      
        $fid  = $this->request->getPost()->get('fid', '');
        if (!$fid) {
            throw new Zikula_Exception_Fatal($this->__('No forum id'));
        }
        $ftid = $this->request->getPost()->get('ftid', '');
        if (!$ftid) {
            throw new Zikula_Exception_Fatal($this->__('No topic id'));
        }

        $titol    = $this->request->getPost()->get('titol', '');
        $descriu  = $this->request->getPost()->get('descriu', '');
                
        if ($titol == "") {
            throw new Zikula_Exception_Fatal($this->__('No topic title'));
        }
        $content = "";
        
        // Set topic changes
        $result = ModUtil::apiFunc($this->name, 'user', 'setTopic', 
                            array('fid'     => $fid,
                                  'ftid'    => $ftid,
                                  'titol'   => $titol,
                                  'descriu' => $descriu));
        
        $content = ModUtil::func($this->name, 'user', 'getTopic', array('fid' => $fid, 'ftid' => $ftid));
        
        return new Zikula_Response_Ajax(array('content' => $content,'id' => $ftid));
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
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
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
            throw new Zikula_Exception_Fatal($this->__('no message id'));
        }

        //get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                                   array('fid' => $fid));
        if ($forum == false) {
            AjaxUtil::error($this->__('The forum upon which the action had to be carried out hasn\'t been found'));
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
        
        $ofMarkText = $markText;
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
                'ofMarkText' => $ofMarkText,
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
