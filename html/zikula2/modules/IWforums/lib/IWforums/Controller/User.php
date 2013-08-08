<?php

class IWforums_Controller_User extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Show the forums where the users can access
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @return		The list of forums where the users have access
     */
    public function main() {
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $forums = array();
        $registres = ModUtil::apiFunc('IWforums', 'user', 'getall', array('filter' => '1'));
        foreach ($registres as $registre) {
            $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $registre['fid']));
            $n_msg = ModUtil::apiFunc('IWforums', 'user', 'compta_msg', array('fid' => $registre['fid'],
                        'tots' => true));
            $n_msg_no_llegits = $n_msg['nollegits'];
            $marcats = $n_msg['marcats'];
            $n_msg = $n_msg['nmsg'];
            $color_no_read = ($n_msg_no_llegits > 0) ? "red" : "black";
            $n_temes = ModUtil::apiFunc('IWforums', 'user', 'compta_temes', array('fid' => $registre['fid']));
            $forums[] = array('fid' => $registre['fid'],
                'nom_forum' => $registre['nom_forum'],
                'descriu' => $registre['descriu'],
                'n_msg_no_llegits' => $n_msg_no_llegits,
                'n_msg' => $n_msg,
                'color_no_read' => $color_no_read,
                'n_temes' => $n_temes,
                'marcats' => $marcats,
                'access' => $access);
        }

        return $this->view->assign('forums', $forums)
                        ->fetch('IWforums_user_main.htm');
    }

    /**
     * Check the user access to a forum
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum
     * @return:	0 - No access
     * 		1 - Read
     * 		2 - Read and Write
     * 		3 - Read, write and topics creation
     * 		4 - Moderate
     */
    public function access($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $requestByCron = false;
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            // security check
            if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
                throw new Zikula_Exception_Forbidden();
            }
        } else {
            $requestByCron = true;
        }
        // needed argument
        if (!is_numeric($fid)) {
            return false;
        }
        // get item
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $item = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid,
                    'sv' => $sv));
        if ($item == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // if forum is not active deny access
        if ($item['actiu'] != 1)
            return 0;

        $uid = (!UserUtil::isLoggedIn() && !$requestByCron) ? '-1' : $uid;
        if ($uid != '-1') {
            if ($uid != UserUtil::getVar('uid') && !$requestByCron)
                return 0;
        }
        // check if the user can access the forum as moderator
        if (strpos($item['mod'], '$' . $uid . '$') !== false)
            return 4;

        // if user is not registered check if can access the forum only in readtable mode
        if ($uid == '-1' && strpos($item['grup'], '$-1|') !== false)
            return 1;

        // check if user can access the forum throug the group
        // get user groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv,
                    'uid' => $uid));
        $accessType = 0;
        foreach ($groups as $group) {
            $pos = strpos($item['grup'], '$' . $group['id'] . '|');
            if ($pos !== false) {
                $access = substr($item['grup'], $pos + 1, strlen($group['id']) + 2);
                $accessArray = explode('|', $access);
                if ($accessType < $accessArray[1])
                    $accessType = $accessArray[1];
            }
        }
        return $accessType;
    }

    /**
     * Show the topics and the messages without topic into a forum
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum
     * @return	The list of topics and messages without topic
     */
    public function forum($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : 0, 'POST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : 1, 'REQUEST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : 0, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        // get the forum
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get the topics of the forum
        $llistatemes = ModUtil::apiFunc('IWforums', 'user', 'get_temes', array('fid' => $fid,
                    'u' => $u));
        $hi_ha_temes = ($llistatemes != false) ? true : false;
        $usersList = '';
        $hi_ha_missatges = false;
        $messages = array();
        foreach ($llistatemes as $tema) {
            $usersList .= $tema['lastuser'] . '$$' . $tema['usuari'] . '$$';
        }
        // get list of messages into the topic
        $listmessages = ModUtil::apiFunc('IWforums', 'user', 'getall_msg', array('ftid' => 0,
                    'fid' => $registre['fid'],
                    'usuari' => $u,
                    'indent' => 0,
                    'idparent' => 0,
                    'inici' => $inici,
                    'rpp' => 10));
        if ($listmessages != false) {
            $hi_ha_missatges = true;
            foreach ($listmessages as $message) {
                $imatge = (strpos($message['llegit'], '$' . UserUtil::getVar('uid') . '$') == 0) ? 'msgNo.gif' : 'msg.gif';
                $marcat = (strpos($message['marcat'], '$' . UserUtil::getVar('uid') . '$') == 0) ? 'res.gif' : 'marcat.gif';
                $m = (strpos($message['marcat'], '$' . UserUtil::getVar('uid') . '$') == 0) ? '1' : '0';
                $textmarca = (strpos($message['marcat'], '$' . UserUtil::getVar('uid') . '$') == 0) ? $this->__("Check the message") : $this->__('Uncheck the message');
                $temps_esborrat = $registre['msgDelTime'];
                $temps_edicio = $registre['msgEditTime'];
                $esborrable = (time() < $message['data'] + 60 * $temps_esborrat && $message['usuari'] == UserUtil::getVar('uid')) ? true : false;
                $editable = (time() < $message['data'] + 60 * $temps_edicio && $message['usuari'] == UserUtil::getVar('uid')) ? true : false;
                $messages[] = array('fmid' => $message['fmid'],
                    'imatge' => $imatge,
                    'title' => $message['titol'],
                    'user' => $message['usuari'],
                    'date' => date('d/m/y', $message['data']),
                    'time' => date('H.i', $message['data']),
                    'adjunt' => $message['adjunt'],
                    'icon' => $message['icon'],
                    'marcat' => $marcat,
                    'm' => $m,
                    'esborrable' => $esborrable,
                    'editable' => $editable,
                    'textmarca' => $textmarca,
                    'indent' => $message['indent'],
                    'oid' => $message['oid'],
                    'onTop' => $message['onTop'],
                );
            }
        }

        $moderator = ($access == 4) ? true : false;

        $adjunts = ($registre['adjunts'] == 1) ? true : false;
        $icons = (ModUtil::getVar('IWforums', 'smiliesActive')) ? true : false;
        $total = ModUtil::apiFunc('IWforums', 'user', 'compta_msg', array('ftid' => $ftid,
                    'fid' => $fid,
                    'u' => $u));
        $pager = ModUtil::func('IWforums', 'user', 'pager', array('inici' => $inici,
                    'total' => $total['nparent'],
                    'rpp' => 10,
                    'urltemplate' => 'index.php?module=IWforums&func=forum&inici=%%&fid=' . $fid . '&ftid=' . $ftid . '&u=' . $u));
        // get list of users who have writed into the forum
        $usuaris_rem = ModUtil::apiFunc('IWforums', 'user', 'getremitents', array('ftid' => 0,
                    'fid' => $registre['fid']));

        foreach ($usuaris_rem as $user) {
            $usersList .= $user['usuari'] . '$$';
        }
        // get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                    'info' => 'ncc',
                    'list' => $usersList));
        $usuaris[] = array('id' => 0,
            'name' => $this->__('Choose the sender...'));
        foreach ($usuaris_rem as $usuari_rem) {
            if ($users[$usuari_rem['usuari']] != '') {
                $usuaris[] = array('id' => $usuari_rem['usuari'],
                    'name' => $users[$usuari_rem['usuari']]);
            }
        }

        return $this->view->assign('users', $users)
                        ->assign('icons', $icons)
                        ->assign('name', $registre['nom_forum'])
                        ->assign('adjunts', $adjunts)
                        ->assign('access', $access)
                        ->assign('hi_ha_temes', $hi_ha_temes)
                        ->assign('hi_ha_missatges', $hi_ha_missatges)
                        ->assign('temes', $llistatemes)
                        ->assign('moderator', $moderator)
                        ->assign('messages', $messages)
                        ->assign('usuaris', $usuaris)
                        ->assign('u', $u)
                        ->assign('fid', $fid)
                        ->assign('ftid', $ftid)
                        ->assign('pager', $pager)
                        ->assign('inici', $inici)
                        ->fetch('IWforums_user_forum.htm');
    }

    /**
     * Show a form for a topics creation
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum, topic title, topic description and first msg information
     * @return	The list of topics and messages without topic
     */
    public function nou_tema($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $titolmsg = FormUtil::getPassedValue('titolmsg', isset($args['titolmsg']) ? $args['titolmsg'] : null, 'POST');
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // check if user can access the forum
        if (ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid)) < 3) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        return $this->view->assign('adjunts', $registre['adjunts'])
                        ->assign('inici', $inici)
                        ->assign('name', $registre['nom_forum'])
                        ->assign('fid', $fid)
                        ->assign('ftid', 0)
                        ->assign('title', '')
                        ->assign('extensions', ModUtil::getVar('IWmain', 'extensions'))
                        ->fetch('IWforums_user_new_tema.htm');
    }

    /**
     * Create a new topic and message
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Values for the topic and message
     * @return	Redirect user to forum init page
     */
    public function crear_tema($args) {
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $titolmsg = FormUtil::getPassedValue('titolmsg', isset($args['titolmsg']) ? $args['titolmsg'] : null, 'POST');
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $adjunt = FormUtil::getPassedValue('adjunt', isset($args['adjunt']) ? $args['adjunt'] : null, 'POST');
        $icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'POST');
        $fileName = $_FILES['adjunt']['name'];
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $this->checkCsrfToken();
        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 3) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // check if user can moderate the forum
        $moderator = ($access == 4) ? true : false;
        // create a new topic
        $lidTema = ModUtil::apiFunc('IWforums', 'user', 'crear_tema', array('fid' => $fid,
                    'titol' => $titol,
                    'descriu' => $descriu));
        if ($lidTema != false) {
            $missatge = $this->__('A new topic has been created.');
            if ($registre['msgDelTime'] > 0 && !$moderator)
                $missatge .= '<br />' . $this->__('During the next ') . $registre['msgDelTime'] . $this->__(' minutes you can delete the topic.');
            LogUtil::registerStatus($missatge);
        } else {
            LogUtil::registerError($this->__('An error has occurred while creating a new topic'));
        }
        // check the needed values
        $nom_fitxer = (empty($fileName)) ? '' : $fileName;
        // update the attached file to the server
        if ($fileName != '') {
            $folder = ModUtil::getVar('IWforums', 'urladjunts');
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                        'folder' => $folder,
                        'file' => $_FILES['adjunt']));
            // the function returns the error string if the update fails and and empty string if success
            if ($update['msg'] != '') {
                LogUtil::registerError($update['msg'] . ' ' . $this->__('An error has occurred in the attachment of the file. The message has been sent without the attached file.'));
                $nom_fitxer = '';
            } else
                $nom_fitxer = $update['fileName'];
        }
        if ($titolmsg != '' && $msg != '') {
            $lid = ModUtil::apiFunc('IWforums', 'user', 'crear_msg', array('fid' => $fid,
                        'ftid0' => $lidTema,
                        'titolmsg' => $titolmsg,
                        'msg' => $msg,
                        'adjunt' => $nom_fitxer,
                        'icon' => $icon));
            if ($lid == false) {
                // error creating message
                LogUtil::registerError($this->__('An error has occurred while creating a new message'));
            }
        }
        return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid)));
    }

    /**
     * Get the list of messages for a topic
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the topic identity
     * @return	An array with the messages information
     */
    public function llista_msg($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : 0, 'REQUEST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        if (!is_numeric($u))
            $u = 0;
        if (!isset($inici) || $inici == '')
            $inici = 1;
        // get the forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        if ($ftid > 0) {
            // get the topic information
            $topic = ModUtil::apiFunc('IWforums', 'user', 'get_tema', array('fid' => $fid,
                        'ftid' => $ftid));
        } else {
            $topic = array('titol' => '');
        }
        // check if user can moderate the forum
        $moderator = ($access == 4) ? true : false;
        // get all the messages to show
        $listmessages = ModUtil::apiFunc('IWforums', 'user', 'getall_msg', array('ftid' => $ftid,
                    'fid' => $registre['fid'],
                    'usuari' => $u,
                    'indent' => 0,
                    'idparent' => 0,
                    'inici' => $inici,
                    'rpp' => 10));
        $messages = array();
        $hi_ha_missatges = false;
        // process the messages
        foreach ($listmessages as $message) {
            if (isset($message))
                $hi_ha_missatges = true;
            $imatge = (strpos($message['llegit'], '$' . UserUtil::getVar('uid') . '$') == 0) ? 'msgNo.gif' : 'msg.gif';
            if (strpos($message['marcat'], '$' . UserUtil::getVar('uid') . '$') == 0) {
                $marcat = 'res.gif';
                $m = 1;
                $textmarca = $this->__('Check the message');
            } else {
                $marcat = 'marcat.gif';
                $m = 0;
                $textmarca = $this->__('Uncheck the message');
            }
            $temps_esborrat = $registre['msgDelTime'];
            $temps_edicio = $registre['msgEditTime'];
            $esborrable = false;
            $editable = false;
            if (time() < $message['data'] + 60 * $temps_esborrat && $message['usuari'] == UserUtil::getVar('uid')) {
                $esborrable = true;
            }
            if (time() < $message['data'] + 60 * $temps_edicio && $message['usuari'] == UserUtil::getVar('uid')) {
                $editable = true;
            }
            $messages[] = array('fmid' => $message['fmid'],
                'imatge' => $imatge,
                'title' => $message['titol'],
                'user' => $message['usuari'],
                'date' => date('d/m/y', $message['data']),
                'time' => date('H.i', $message['data']),
                'adjunt' => $message['adjunt'],
                'icon' => $message['icon'],
                'marcat' => $marcat,
                'm' => $m,
                'esborrable' => $esborrable,
                'editable' => $editable,
                'textmarca' => $textmarca,
                'indent' => $message['indent'],
                'oid' => $message['oid'],
                'onTop' => $message['onTop'],
            );
        }
        // get users who have created a message
        $usuaris_rem = ModUtil::apiFunc('IWforums', 'user', 'getremitents', array('ftid' => $ftid,
                    'fid' => $registre['fid']));
        $usersList = '';
        foreach ($usuaris_rem as $user) {
            $usersList .= $user['usuari'] . '$$';
        }

        $users = array();
        if ($usersList != '') {
            // get all users information
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                        'info' => 'ncc',
                        'list' => $usersList));
        }

        $usuaris[] = array('id' => 0,
            'name' => $this->__('Choose the sender...'));
        foreach ($usuaris_rem as $usuari_rem) {
            if ($users[$usuari_rem['usuari']] != '') {
                $usuaris[] = array('id' => $usuari_rem['usuari'],
                    'name' => $users[$usuari_rem['usuari']]);
            }
        }
        $adjunts = ($registre['adjunts'] == 1) ? true : false;
        $icons = (ModUtil::getVar('IWforums', 'smiliesActive')) ? true : false;
        $total = ModUtil::apiFunc('IWforums', 'user', 'compta_msg', array('ftid' => $ftid,
                    'fid' => $fid,
                    'u' => $u));
        $pager = ModUtil::func('IWforums', 'user', 'pager', array('inici' => $inici,
                    'total' => $total['nparent'],
                    'rpp' => 10,
                    'urltemplate' => 'index.php?module=IWforums&func=llista_msg&inici=%%&fid=' . $fid . '&ftid=' . $ftid . '&u=' . $u));
        return $this->view->assign('name', $registre['nom_forum'])
                        ->assign('icons', $icons)
                        ->assign('topicName', $topic['titol'])
                        ->assign('adjunts', $adjunts)
                        ->assign('users', $users)
                        ->assign('access', $access)
                        ->assign('moderator', $moderator)
                        ->assign('messages', $messages)
                        ->assign('usuaris', $usuaris)
                        ->assign('u', $u)
                        ->assign('fid', $fid)
                        ->assign('ftid', $ftid)
                        ->assign('hi_ha_missatges', $hi_ha_missatges)
                        ->assign('pager', $pager)
                        ->assign('inici', $inici)
                        ->assign('hi_ha_temes', false)
                        ->fetch('IWforums_user_forum.htm');
    }

    /**
     * Show the form for a new message
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the message information in case of error
     * @return	An array with the messages information
     */
    public function nou_msg($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'REQUEST');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'REQUEST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 2) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        $moderator = ($access == 4) ? true : false;

        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // if message have any answare get message information
        if ($fmid != null) {
            $missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
            // get all users information
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userInfo = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                        'uid' => $missatge['usuari'],
                        'info' => 'ncc'));
            if ($missatge == false) {
                LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
                return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
            }
            $titol = (strpos($missatge['titol'], 'RE: ') === false) ? 'RE: ' . $missatge['titol'] : $missatge['titol'];
            // $msg = '[quote=' . $userInfo . ' ' . $this->__("wrote on") . ' ' . date('d/m/Y H.i', $missatge['data']) . ']<br />' . $missatge['missatge'] . '<br />[/quote]';
            $msg = '<fieldset><legend>' . $userInfo . ' ' . $this->__("wrote on") . ' ' . date('d/m/Y H.i', $missatge['data']) . '</legend>' . $missatge['missatge'] . '</fieldset>';
        } else {
            $fmid = 0;
        }
        if (ModUtil::getVar('IWforums', 'smiliesActive')) {
            $icons = ModUtil::apiFunc('IWmain', 'user', 'getAllIcons');
        } else {
            $icons = false;
        }

        return $this->view->assign('icons', $icons)
                        ->assign('fid', $fid)
                        ->assign('ftid', $ftid)
                        ->assign('fmid', $fmid)
                        ->assign('name', $registre['nom_forum'])
                        ->assign('msg', $msg)
                        ->assign('title', $titol)
                        ->assign('adjunts', $registre['adjunts'])
                        ->assign('extensions', ModUtil::getVar('IWmain', 'extensions'))
                        ->assign('u', $u)
                        ->assign('inici', $inici)
                        ->assign('oid', $oid)
                        ->assign('moderator', $moderator)
                        ->fetch('IWforums_user_new_msg.htm');
    }

    /*
      FunciÃ³ que comprova que les dades enviades des del formulari de creaciÃ³ d'un
      missatge s'ajusten al que ha de ser i envia l'ordre de crear el registre
     */

    public function crear_msg($args) {

        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'POST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'POST');
        $adjunt = FormUtil::getPassedValue('adjunt', isset($args['adjunt']) ? $args['adjunt'] : null, 'POST');
        $icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'POST');
        $oldmsg = FormUtil::getPassedValue('oldmsg', isset($args['oldmsg']) ? $args['oldmsg'] : null, 'POST');
        $onTop = FormUtil::getPassedValue('onTop', isset($args['onTop']) ? $args['onTop'] : 0, 'POST');

        // gets the attached file array
        $fileName = $_FILES['adjunt']['name'];
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $this->checkCsrfToken();
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 2) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // check the needed values
        $nom_fitxer = (empty($fileName)) ? '' : $fileName;
        // update the attached file to the server
        if ($fileName != '') {
            $folder = ModUtil::getVar('IWforums', 'urladjunts');
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                        'folder' => $folder,
                        'file' => $_FILES['adjunt']));
            // the function returns the error string if the update fails and and empty string if success
            if ($update['msg'] != '') {
                LogUtil::registerError($update['msg'] . ' ' . $this->__('An error has occurred in the attachment of the file. The message has been sent without the attached file.'));
                $nom_fitxer = '';
            } else {
                $nom_fitxer = $update['fileName'];
            }
        }
        if ($oldmsg != '') {
            $msg .= '<br />' . $oldmsg;
        }
        // create message
        $lid = ModUtil::apiFunc('IWforums', 'user', 'crear_msg', array('fid' => $fid,
                    'ftid' => $ftid,
                    'titol' => $titol,
                    'msg' => $msg,
                    'adjunt' => $nom_fitxer,
                    'icon' => $icon,
                    'idparent' => $fmid,
                    'oid' => $oid,
                    'onTop' => $onTop,
                ));
        // check if user canmoderate the forum
        $moderator = false;
        if ($access == 4)
            $moderator = true;

        if ($lid != false) {
            // message created successfuly
            $missatge = $this->__('A new message has been created.');
            if (ModUtil::getVar('IWforums', 'temps_edicio') > 0 && !$moderator) {
                $missatge .= '<br />' . $this->__('During the next ') . ModUtil::getVar('IWforums', 'temps_edicio') . $this->__(' munutes you can edit the message');
            }
            if (ModUtil::getVar('IWforums', 'temps_esborrat') > 0 && !$moderator) {
                $missatge .= '<br />' . $this->__('During the next ') . ModUtil::getVar('IWforums', 'temps_esborrat') . $this->__(' minutes you can delete the message');
            }
            LogUtil::registerStatus($missatge);
        } else {
            LogUtil::registerError($this->__('An error has occurred while creating a new message'));
        }
        if ($ftid != 0) {
            return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                'ftid' => $ftid,
                                'u' => $u)));
        } else {
            return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid,
                                'u' => $u)));
        }
    }

    /*
      Shows message information
      @param $fmid:	Message id
      @param $ftid:	Topic id
      @param $fid:	Forum id
      @param $oid:	First thread message id
      @return:		Formated message
     */

    public function msg($args) {

        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'REQUEST');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'REQUEST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $uid = UserUtil::getVar('uid');

        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($forum == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get message information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid,
                    'fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userFullName = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                    'info' => 'ncc',
                    'uid' => $registre['usuari']));
        // set user as message reader
        if (strpos($registre['llegit'], '$' . $uid . '$') == 0) {
            $llegit = ModUtil::apiFunc('IWforums', 'user', 'llegit', array('fmid' => $registre['fmid'],
                        'llegit' => $registre['llegit']));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_news',
                'name' => 'have_news',
                'value' => 'fo',
                'sv' => $sv));
        }
        // prepare printing messages
        /*
          $printer = "<table width=100%>";
          $printer .= '<tr><td><font face=Arial color=navy><strong>' . $registre['titol'] . '</font></td></tr>';
          $printer .= '<tr><td>' . $this->__('From: ') . '<font face=Arial color=green><strong>' . $usersName . '</strong></td></tr>';
          $printer .= '<tr><td>' . $this->__('Date') . ': <font face=Arial size=2 color=696969><strong>' . date('d/m/y', $registre['data']) . '</strong></font></td></tr>';
          $printer .= '<tr><td>' . $this->__('Time') . ': <font face=Arial size=2 color=696969><strong>' . date('H.i', $registre['data']) . '</strong></font></td></tr>';
          if ($registre['adjunt'] != "") {
          $printer .= '<tr><td>' . $this->__('Attached file') . ': ' . $registre['adjunt'] . '</td></tr>';
          }
          $printer .= '<tr><td><hr></td></tr>';
          $printer .= '<tr><td>' . ModUtil::func('IWforums', 'user', 'prepara_print',
          array('text' => $registre['missatge'])) . '</td></tr>';
          $printer .= '<tr><td><hr></td></tr>';
          $printer .= "</table><br>";
         */
        $marcatMsg = (strpos($registre['marcat'], '$' . $uid . '$') == 0) ? false : true;
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => UserUtil::getVar('uname', $registre['usuari']),
                    'sv' => $sv));

        // ff user didn't click a first-level message, get the first-level message
        if ($oid != $fmid) {
            // get message information
            $origen = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $oid,
                        'fid' => $fid));
            if ($origen == false) {
                LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
                return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
            }
        }
        else
            $origen = $registre;
        // process the first message
        $imatge = (strpos($origen['llegit'], '$' . $uid . '$') == 0) ? 'msgNo.gif' : 'msg.gif';
        $marcat = (strpos($origen['marcat'], '$' . $uid . '$') == 0) ? 'res.gif' : 'marcat.gif';
        $m = (strpos($origen['marcat'], '$' . $uid . '$') == 0) ? 1 : 0;
        $textmarca = (strpos($origen['marcat'], '$' . $uid . '$') == 0) ? $this->__("Check the message") : $this->__('Uncheck the message');
        $temps_esborrat = $forum['msgDelTime'];
        $temps_edicio = $forum['msgEditTime'];
        $esborrable = (time() < $origen['data'] + 60 * $temps_esborrat && $origen['usuari'] == $uid) ? true : false;
        $editable = (time() < $origen['data'] + 60 * $temps_edicio && $origen['usuari'] == $uid) ? true : false;
        $messages[] = array('fmid' => $origen['fmid'],
            'imatge' => $imatge,
            'title' => $origen['titol'],
            'u' => $origen['usuari'],
            'user' => $userFullName,
            'date' => date('d/m/y', $origen['data']),
            'time' => date('H.i', $origen['data']),
            'adjunt' => $origen['adjunt'],
            'icon' => $origen['icon'],
            'marcat' => $marcat,
            'm' => $m,
            'esborrable' => $esborrable,
            'editable' => $editable,
            'textmarca' => $textmarca,
            'indent' => 0,
            'oid' => $oid);
        // get the messages of the thread where the message belongs
        $listmessages = ModUtil::apiFunc('IWforums', 'user', 'getall_msg', array('ftid' => $ftid,
                    'fid' => $fid,
                    'usuari' => 0,
                    'indent' => 0,
                    'idparent' => $oid,
                    'tots' => 1,
                    'inici' => 0,
                    'rpp' => 10));
        $usersList = $origen['usuari'] . '$$';
        // process the messages
        foreach ($listmessages as $message) {
            if (isset($message))
                $hi_ha_missatges = true;
            $imatge = (strpos($message['llegit'], '$' . $uid . '$') == 0) ? 'msgNo.gif' : 'msg.gif';
            $usersList .= $message['usuari'] . '$$';
            $marcat = (strpos($message['marcat'], '$' . $uid . '$') == 0) ? 'res.gif' : 'marcat.gif';
            $m = (strpos($message['marcat'], '$' . $uid . '$') == 0) ? 1 : 0;
            $textmarca = (strpos($message['marcat'], '$' . $uid . '$') == 0) ? $this->__("Check the message") : $this->__('Uncheck the message');
            $esborrable = (time() < $message['data'] + 60 * $temps_esborrat && $message['usuari'] == $uid) ? true : false;
            $editable = (time() < $message['data'] + 60 * $temps_edicio && $message['usuari'] == $uid) ? true : false;
            $messages[] = array('fmid' => $message['fmid'],
                'imatge' => $imatge,
                'title' => $message['titol'],
                'u' => $message['usuari'],
                'user' => $userFullName,
                'date' => date('d/m/y', $message['data']),
                'time' => date('H.i', $message['data']),
                'adjunt' => $message['adjunt'],
                'icon' => $message['icon'],
                'marcat' => $marcat,
                'm' => $m,
                'esborrable' => $esborrable,
                'editable' => $editable,
                'textmarca' => $textmarca,
                'indent' => $message['indent'] + 30,
                'oid' => $oid);
        }
        // get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                    'info' => 'ncc',
                    'list' => $usersList));
        // get smarticons if module bbsmile is active
        $icons = array();
        if (ModUtil::getVar('IWforums', 'smiliesActive')) {
            $icons = ModUtil::apiFunc('IWmain', 'user', 'getAllIcons');
        }
        $adjunts = ($forum['adjunts'] == 1) ? true : false;
        // get file extension
        $fileExtension = strtolower(substr(strrchr($registre['adjunt'], "."), 1));
        // get file icon
        $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $fileExtension));
        $fileIcon = $ctypeArray['icon'];

        return $this->view->assign('users', $users)
                        ->assign('marcat', $marcatMsg)
                        ->assign('fileIcon', $fileIcon)
                        ->assign('icons', $icons)
                        ->assign('oid', $oid)
                        ->assign('fmid', $fmid)
                        ->assign('messages', $messages)
                        ->assign('origen', $origen)
                        ->assign('ftid', $ftid)
                        ->assign('fid', $fid)
                        ->assign('u', $u)
                        ->assign('inici', $inici)
                        ->assign('avatarsVisible', ModUtil::getVar('IWforums', 'avatarsVisible'))
                        ->assign('title', $registre['titol'])
                        ->assign('message', $registre['missatge'])
                        ->assign('adjunt', $registre['adjunt'])
                        ->assign('adjunts', $adjunts)
                        ->assign('user', $userFullName)
                        ->assign('date', date('d/m/y', $registre['data']))
                        ->assign('time', date('H:i', $registre['data']))
                        ->assign('photo', $photo)
                        ->assign('foto', ModUtil::getVar('IWforums', 'fotos'))
                        ->assign('urladjunts', ModUtil::getVar('IWforums', 'urladjunts'))
                        ->assign('usuari', $registre['usuari'])
                        ->assign('uid', $uid)
                        ->fetch('IWforums_user_msg.htm');
    }

    /*
      Shows message information
      @param $fmid:	Message id
      @param $ftid:	Topic id
      @param $fid:	Forum id
      @param $oid:	First thread message id
      @return:		Formated message
     */

    public function openMsg($args) {

        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'REQUEST');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'REQUEST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($forum == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get message information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid,
                    'fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // set user as message reader
        if (strpos($registre['llegit'], '$' . UserUtil::getVar('uid') . '$') == 0) {
            $llegit = ModUtil::apiFunc('IWforums', 'user', 'llegit', array('fmid' => $registre['fmid'],
                        'llegit' => $registre['llegit']));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_news',
                'name' => 'have_news',
                'value' => 'fo',
                'sv' => $sv));
        }
        // get file extension
        $fileExtension = strtolower(substr(strrchr($registre['adjunt'], "."), 1));
        // get file icon
        $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $fileExtension));
        $fileIcon = $ctypeArray['icon'];

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => UserUtil::getVar('uname', $registre['usuari']) . '_s',
                    'sv' => $sv));

        return $this->view->assign('photo', $photo)
                        ->assign('message', $registre['missatge'])
                        ->assign('adjunt', $registre['adjunt'])
                        ->assign('fileIcon', $fileIcon)
                        ->assign('u', $u)
                        ->assign('inici', $inici)
                        ->assign('fmid', $fmid)
                        ->assign('ftid', $ftid)
                        ->assign('fid', $fid)
                        ->assign('oid', $oid)
                        ->assign('access', $access)
                        ->fetch('IWforums_user_openMsg.htm');
    }

    /**
     * Get a file from a server folder even it is out of the public html directory
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	name of the file that have to be gotten
     * @return:	The file information
     */
    public function getFile($args) {
        // file name with the path
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');
        // security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'getFile', array('fileName' => $fileName,
                    'sv' => $sv));
    }

    /**
     * Download a file
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	name of the file that have to be downloaded
     * @return:	The file required
     */
    public function download($args) {

        // get the parameters
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'GET');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // needed argument
        if (!isset($fileName) || !isset($fmid) || !isset($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You are not allowed to do this action'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $fileNameInServer = ModUtil::getVar('IWforums', 'urladjunts') . '/' . $fileName;
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'downloadFile', array('fileName' => $fileName,
                    'fileNameInServer' => $fileNameInServer,
                    'sv' => $sv));
    }

    /**
     * Flagged or unflagged a message
     * @or:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	main information for the message
     * @return:	Redirect user to main page
     */
    public function marca($args) {

        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'GET');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'GET');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'GET');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'GET');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'GET');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'GET');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($forum == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get message information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
        if ($registre == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $marcat = ($m == 1) ? $registre['marcat'] . '$' . UserUtil::getVar('uid') . '$' : str_replace('$' . UserUtil::getVar('uid') . '$', '', $registre['marcat']);
        $ha_marcat = ModUtil::apiFunc('IWforums', 'user', 'marcat', array('marcat' => $marcat,
                    'fmid' => $fmid));
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_flagged',
            'name' => 'have_flags',
            'value' => 'fo',
            'sv' => $sv));
        if ($ftid != 0) {
            if (isset($msg)) {
                return System::redirect(ModUtil::url('IWforums', 'user', 'msg', array('fid' => $fid,
                                    'u' => $u,
                                    'ftid' => $ftid,
                                    'fmid' => $fmid,
                                    'inici' => $inici,
                                    'oid' => $oid)));
            } else {
                return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                    'u' => $u,
                                    'ftid' => $ftid,
                                    'inici' => $inici,
                                    'oid' => $oid)));
            }
        } else {
            if (isset($msg)) {
                return System::redirect(ModUtil::url('IWforums', 'user', 'msg', array('fid' => $fid,
                                    'u' => $u,
                                    'ftid' => $ftid,
                                    'fmid' => $fmid,
                                    'inici' => $inici,
                                    'oid' => $oid)));
            } else {
                return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid,
                                    'u' => $u,
                                    'inici' => $inici,
                                    'oid' => $oid)));
            }
        }
    }

    /**
     * Get the list of users that has readed a message
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	message, topic and forum identities
     * @return:	Redirect user to readers page
     */
    public function lectors($args) {
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'GET');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'GET');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'GET');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'GET');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get message information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
        if ($registre == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $tema = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($tema == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $lectors = explode('$$', substr($registre['llegit'], 2, -1));
        $usersList = '$$';
        foreach ($lectors as $lector) {
            $usersList .= $lector . '$$';
        }
        // get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersInfo = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                    'info' => 'ccn',
                    'list' => $usersList));
        $readers = array();
        foreach ($lectors as $lector) {
            $readers[] = array('user' => $usersInfo[$lector]);
        }
        sort($readers);

        return $this->view->assign('readers', $readers)
                        ->assign('fid', $fid)
                        ->assign('ftid', $ftid)
                        ->assign('fmid', $fmid)
                        ->assign('oid', $oid)
                        ->assign('u', $u)
                        ->fetch('IWforums_user_readers.htm');
    }

    /**
     * Delete a message
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	message, topic and forum identities
     * @return:	Redirect user to readers page
     */
    public function del($args) {

        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 2) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($forum == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get message information
        $missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
        if ($missatge == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get user information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userInfo = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                    'uid' => $missatge['usuari'],
                    'info' => 'ncc'));
        if ($ftid != 0) {
            // get topic information
            $tema = ModUtil::apiFunc('IWforums', 'user', 'get_tema', array('ftid' => $ftid,
                        'fid' => $fid));
            if ($tema == false) {
                LogUtil::registerError($this->__('No messages have been found'));
                return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
            }
        } else {
            $tema['titol'] = '';
        }
        $moderator = ($access == 4) ? true : false;
        // check if user can delete the message
        if (!$moderator && (time() > $missatge['data'] + 60 * $forum['msgDelTime'] || $missatge['usuari'] != UserUtil::getVar('uid'))) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // check if the message is parent
        if (ModUtil::apiFunc('IWforums', 'user', 'is_parent', array('fmid' => $fmid))) {
            LogUtil::registerError($this->__('The message can not be deleted because have answers. You can move the answers to an other theme or forum.'));
            if ($ftid != 0) {
                return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                    'ftid' => $ftid)));
            } else {
                return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid)));
            }
        }
        // axk of deleteion confirmation
        if (empty($confirmation)) {
            return $this->view->assign('name', $forum['nom_forum'])
                            ->assign('tema', $tema['titol'])
                            ->assign('ftid', $ftid)
                            ->assign('fid', $fid)
                            ->assign('fmid', $fmid)
                            ->assign('msg_title', $missatge['titol'])
                            ->assign('user', $userInfo)
                            ->assign('date', date('d/m/y', $missatge['data']))
                            ->assign('time', date('H.i', $missatge['data']))
                            ->assign('message', $missatge['missatge'])
                            ->fetch('IWforums_user_del_msg.htm');
        }
        $this->checkCsrfToken();
        // delete message
        if (ModUtil::apiFunc('IWforums', 'user', 'del_msg', array('fmid' => $fmid))) {
            // deletion successfuly
            LogUtil::registerStatus($this->__('The message has been deleted.'));
            // delete attached files is exist
            if ($missatge['adjunt'] != '') {
                unlink(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforums', 'urladjunts') . '/' . $missatge['adjunt']);
            }
        }
        // redirect user to the list of messages
        if ($ftid != 0) {
            return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                'ftid' => $ftid)));
        } else {
            return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid)));
        }
    }

    /**
     * Edit a message
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	message, topic and forum identities
     * @return:	Show a form for message edition
     */
    public function edit_msg($args) {

        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 2) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get message information
        $missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
        if ($missatge == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $moderator = ($access == 4) ? true : false;
        if (!$moderator && (time() > $missatge['data'] + 60 * $registre['msgEditTime'] || $missatge['usuari'] != UserUtil::getVar('uid'))) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get smarticons if bbsmile is active
        if (ModUtil::getVar('IWforums', 'smiliesActive')) {
            $icons = ModUtil::apiFunc('IWmain', 'user', 'getAllIcons');
        } else {
            $icons = false;
        }
        // Separate the message from the quotes
        $quotes = stristr($missatge['missatge'], '[quote=');
        $message = ($quotes != '') ? substr($missatge['missatge'], 0, - (strlen($quotes) + 6)) : $missatge['missatge'];
        $missatge['quotes'] = $quotes;
        $missatge['missatge'] = $message;

        return $this->view->assign('icons', $icons)
                        ->assign('fid', $fid)
                        ->assign('ftid', $ftid)
                        ->assign('missatge', $missatge)
                        ->assign('name', $registre['nom_forum'])
                        ->assign('adjunts', $registre['adjunts'])
                        ->assign('extensions', ModUtil::getVar('IWmain', 'extensions'))
                        ->assign('u', $u)
                        ->assign('moderator', $moderator)
                        ->fetch('IWforums_user_edit_msg.htm');
    }

    /**
     * Update a message with the information received from database
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	message information
     * @return:	Return user to messages list
     */
    public function update_msg($args) {

        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'POST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
        $oldmsg = FormUtil::getPassedValue('oldmsg', isset($args['oldmsg']) ? $args['oldmsg'] : null, 'POST');
        $adjunt = FormUtil::getPassedValue('adjunt', isset($args['adjunt']) ? $args['adjunt'] : null, 'POST');
        $icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'POST');
        $fileName = $_FILES['adjunt']['name'];
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $this->checkCsrfToken();

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 2) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get the file name
        $nom_adjunt = (empty($fileName)) ? '' : $fileName;
        if ($oldmsg != null)
            $msg = $oldmsg;
        $moderator = ($access == 4) ? true : false;
        // get message information
        $missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
        if ($missatge == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        if (!$moderator && (time() > $missatge['data'] + 60 * $registre['msgEditTime'] || $missatge['usuari'] != UserUtil::getVar('uid'))) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // update the attached file to the server
        if ($nom_adjunt != '' && $registre['adjunts']) {
            $folder = ModUtil::getVar('IWforums', 'urladjunts');
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                        'folder' => $folder,
                        'file' => $_FILES['adjunt']));
            //the function returns the error string if the update fails and and empty string if success
            if ($update['msg'] != '') {
                LogUtil::registerError($update['msg'] . ' ' . $this->__('Probably the message has been sended without the attached file.'));
                $nom_fitxer = '';
            } else
                $nom_fitxer = $update['fileName'];
        } else
            $nom_fitxer = $missatge['adjunt'];
        $lid = ModUtil::apiFunc('IWforums', 'user', 'update_msg', array('fmid' => $fmid,
                    'titol' => $titol,
                    'msg' => $msg,
                    'fadjunt' => $nom_fitxer,
                    'icon' => $icon));
        if ($lid != false) {
            // creation success
            LogUtil::registerStatus($this->__('The message has been modified'));
        } else {
            LogUtil::registerError($this->__('Error trying to edit the message'));
        }
        if ($ftid != 0) {
            return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                'ftid' => $ftid,
                                'u' => $u)));
        } else {
            return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid,
                                'u' => $u)));
        }
    }

    /**
     * Move a message between topics or and forums
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	message information
     * @return:	Return user to messages list
     */
    public function mou($args) {

        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $moutema = FormUtil::getPassedValue('moutema', isset($args['moutema']) ? $args['moutema'] : null, 'REQUEST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
        $nouforum = FormUtil::getPassedValue('nouforum', isset($args['nouforum']) ? $args['nouforum'] : null, 'POST');
        $noutema = FormUtil::getPassedValue('noutema', isset($args['noutema']) ? $args['noutema'] : null, 'REQUEST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $keepCopy = FormUtil::getPassedValue('keepCopy', isset($args['keepCopy']) ? $args['keepCopy'] : 0, 'POST');

        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 4) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $forumtriat = ($moutema == 1) ? $nouforum : $fid;
        // get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($forum == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get message information
        $missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
        if ($missatge == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        if ($ftid != 0) {
            // get topic information
            $tema = ModUtil::apiFunc('IWforums', 'user', 'get_tema', array('ftid' => $ftid,
                        'fid' => $fid));
            if ($tema == false) {
                LogUtil::registerError($this->__('No messages have been found'));
                return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
            }
        } else {
            $tema['titol'] = '';
        }
        // get moderators list
        $forums = ModUtil::apiFunc('IWforums', 'user', 'getall');
        foreach ($forums as $forumlist) {
            $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $forumlist['fid']));
            if ($access == 4) {
                $modera[] = array('fid' => $forumlist['fid'],
                    'nom_forum' => $forumlist['nom_forum']);
            }
        }
        // get list of topics
        $temes = ModUtil::apiFunc('IWforums', 'user', 'get_temes', array('forumtriat' => $forumtriat));
        // ask for change position
        if ($moutema == "" || $moutema == 1) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userFullName = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                        'info' => 'ncc',
                        'uid' => $missatge['usuari']));

            if (!isset($nouforum))
                $nouforum = $fid;

            return $this->view->assign('modera', $modera)
                            ->assign('name', $forum['nom_forum'])
                            ->assign('tema', $tema['titol'])
                            ->assign('ftid', $ftid)
                            ->assign('fid', $fid)
                            ->assign('nouforum', $nouforum)
                            ->assign('fmid', $fmid)
                            ->assign('msg_title', $missatge['titol'])
                            ->assign('user', $userFullName)
                            ->assign('date', date('d/m/y', $missatge['data']))
                            ->assign('time', date('H.i', $missatge['data']))
                            ->assign('message', $missatge['missatge'])
                            ->assign('temes', $temes)
                            ->assign('u', $u)
                            ->fetch('IWforums_user_move_msg.htm');
        }

        $this->checkCsrfToken();
        // check if user can access the forum as moderator
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $nouforum));
        if ($access < 4) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        ($noutema == -1) ? $noutema = 0 : "";

        if ($keepCopy) {
            // don't move the message and duplicate it in the new forum and topic
            if ($nouforum == $fid && $noutema == $ftid) {
                LogUtil::registerError($this->__('No action done because the source and destiny forum and topic are the same'));
            }
            // send the message to the new topic
            if (ModUtil::apiFunc('IWforums', 'user', 'copy', array('fmid' => $fmid,
                        'noutema' => $noutema,
                        'nouforum' => $nouforum,
                        'fid' => $fid,
                        'ftid' => $ftid))) {
                // success change of position
                LogUtil::registerStatus($this->__('The message has been copied to the new destiny.'));
            } else {
                LogUtil::registerError($this->__('Error triyng to copy the message to the new destiny.'));
            }
        } else {
            // send the message to the new topic
            if (ModUtil::apiFunc('IWforums', 'user', 'mou', array('fmid' => $fmid,
                        'noutema' => $noutema,
                        'nouforum' => $nouforum,
                        'fid' => $fid,
                        'ftid' => $ftid))) {
                // success change of position
                LogUtil::registerStatus($this->__('The message has been transferred'));
            }
        }
        // redirect user to messages list
        if ($ftid != 0) {
            return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                'ftid' => $ftid,
                                'u' => $u)));
        } else {
            return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid,
                                'u' => $u)));
        }
    }

    /**
     * Set as red all the messages in a forum
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the forum identity
     * @return:	Return user to messages list
     */
    public function llegits($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get messages information
        $missatges = ModUtil::apiFunc('IWforums', 'user', 'getall_msg_unread', array('fid' => $fid));
        // mark messages as readed
        foreach ($missatges as $missatge) {
            if (strpos($missatge['llegit'], '$' . UserUtil::getVar('uid') . '$') == 0) {
                ModUtil::apiFunc('IWforums', 'user', 'llegit', array('fmid' => $missatge['fmid'],
                    'llegit' => $missatge['llegit']));
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_news',
                    'name' => 'have_news',
                    'value' => 'fo',
                    'sv' => $sv));
            }
        }
        if ($ftid == null) {
            return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid,
                                'inici' => $inici,
                                'u' => $u)));
        } else {
            return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                'ftid' => $ftid,
                                'inici' => $inici,
                                'u' => $u)));
        }
    }

    /**
     * Get and show all the messages into a forum
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the forum identity
     * @return:	Return the content in all messages
     */
    public function allmsg($args) {

        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 1) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($forum == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get messages information
        $missatges_llista = ModUtil::apiFunc('IWforums', 'user', 'getall_msg', array('fid' => $fid,
                    'ftid' => $ftid,
                    'usuari' => $u,
                    'indent' => 0,
                    'idparent' => 0,
                    'inici' => 1,
                    'rpp' => 100000000));
        if ($missatges_llista == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $usersList = '$$';
        foreach ($missatges_llista as $missatge) {
            $fileIcon = '';
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => UserUtil::getVar('uname', $missatge['usuari']),
                        'sv' => $sv));
            $usersList .= $missatge['usuari'] . '$$';
            if ($missatge['adjunt'] != '') {
                // get file extension
                $fileExtension = strtolower(substr(strrchr($missatge['adjunt'], "."), 1));
                // get file icon
                $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $fileExtension));
                $fileIcon = $ctypeArray['icon'];
            }
            $missatges[] = array('titol' => $missatge['titol'],
                'usuari' => $missatge['usuari'],
                'data' => date('d/m/y', $missatge['data']),
                'hora' => date('H.i', $missatge['data']),
                'fileIcon' => $fileIcon,
                'adjunt' => $missatge['adjunt'],
                'missatge' => $missatge['missatge'],
                'photo' => $photo,
                'fmid' => $missatge['fmid'],
            );
            //set user as messages readed
            if (strpos($missatge['llegit'], '$' . UserUtil::getVar('uid') . '$') == 0) {
                $llegit = ModUtil::apiFunc('IWforums', 'user', 'llegit', array('fmid' => $missatge['fmid'],
                            'llegit' => $missatge['llegit']));
            }
        }
        //get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                    'info' => 'ncc',
                    'list' => $usersList));

        return $this->view->assign('users', $users)
                        ->assign('missatges', $missatges)
                        ->assign('fid', $fid)
                        ->assign('avatarsVisible', ModUtil::getVar('IWforums', 'avatarsVisible'))
                        ->assign('ftid', $ftid)
                        ->fetch('IWforums_user_allmsg.htm');
    }

    /**
     * Delete a topic and all the messages contained in it
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the topic identity
     * @return:	Return user to topics list page
     */
    public function deltema($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 4) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($forum == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $tema = ModUtil::apiFunc('IWforums', 'user', 'get_tema', array('ftid' => $ftid,
                    'fid' => $fid));
        if ($tema == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        if (empty($confirmation)) {

            return $this->view->assign('name', $forum['nom_forum'])
                            ->assign('tema', $tema['titol'])
                            ->assign('ftid', $ftid)
                            ->assign('fid', $fid)
                            ->fetch('IWforums_user_del_tema.htm');
        }
        $this->checkCsrfToken();
        // delete record
        if (ModUtil::apiFunc('IWforums', 'user', 'deltema', array('fid' => $fid,
                    'ftid' => $ftid))) {
            // deletion successful
            LogUtil::registerStatus($this->__('The topic has been deleted.'));
        }
        // redirect user to forums table
        return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid,
                            'ftid' => $ftid)));
    }

    /**
     * Change topic position
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the topic and forum identities
     * @return:	Return user to topics list page
     */
    public function order($args) {

        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'REQUEST');
        $puts = FormUtil::getPassedValue('puts', isset($args['puts']) ? $args['puts'] : null, 'REQUEST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 4) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $tema = ModUtil::apiFunc('IWforums', 'user', 'get_tema', array('ftid' => $ftid,
                    'fid' => $fid));
        if ($tema == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        $ordre = ($puts == '-1') ? $tema['order'] + 3 : $tema['order'] - 3;
        ModUtil::apiFunc('IWforums', 'user', 'put_order', array('ftid' => $ftid,
            'ordre' => $ordre,
            'fid' => $fid));
        // reorder the topics
        ModUtil::func('IWforums', 'user', 'reorder', array('fid' => $fid));
        return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid)));
    }

    /**
     * Reorder the topics into a forum
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the forum identity
     * @return:	Return user to topics list page
     */
    public function reorder($args) {

        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // get topics
        $temes = ModUtil::apiFunc('IWforums', 'user', 'get_temes', array('fid' => $fid));
        if ($temes == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // reorder all elements with the values 0 2 4 6 8...
        foreach ($temes as $tema) {
            $i = $i + 2;
            ModUtil::apiFunc('IWforums', 'user', 'put_order', array('ftid' => $tema['ftid'],
                'ordre' => $i,
                'fid' => $fid));
        }
        // redirect user to forums list
        return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid)));
    }

    /**
     * Delete the attached file in a message in edition mode
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the message main information
     * @return:	Return user to edit page
     */
    public function del_adjunt($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'POST');
        $segur = FormUtil::getPassedValue('segur', isset($args['segur']) ? $args['segur'] : null, 'POST');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 2) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        // get message information
        $dades_missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
        if ($dades_missatge == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 2) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // check if user is moderator and can edit the message
        $moderator = ($access == 4) ? true : false;
        if (!$moderator && (time() > $dades_missatge['data'] + 60 * $registre['msgDelTime'] || $dades_missatge['usuari'] != UserUtil::getVar('uid'))) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        // get smarticons if module bbsmile is active
        if (ModUtil::getVar('IWforums', 'smiliesActive')) {
            $icons = ModUtil::apiFunc('IWmain', 'user', 'getAllIcons');
        } else {
            $icons = false;
        }
        //Procedim a fer l'esborrat del fitxer adjunt al missatge
        if ($segur == 'on') {
            if (ModUtil::apiFunc('IWforums', 'user', 'del_adjunt', array('fmid' => $fmid))) {
                $dades_missatge['adjunt'] = '';
            }
        }
        // get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get', array('fid' => $fid));
        if ($forum == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        $missatge = array('missatge' => $msg,
            'titol' => $titol,
            'fmid' => $fmid,
            'icon' => $dades_missatge['icon'],
            'adjunt' => $dades_missatge['adjunt']);
        // Separate the message from the quotes
        $quotes = stristr($missatge['missatge'], '[quote=');
        $message = ($quotes != '') ? substr($missatge['missatge'], 0, - (strlen($quotes) + 6)) : $missatge['missatge'];
        $missatge['quotes'] = $quotes;
        $missatge['missatge'] = $message;

        return $this->view->assign('icons', $icons)
                        ->assign('fid', $fid)
                        ->assign('ftid', $ftid)
                        ->assign('missatge', $missatge)
                        ->assign('adjunts', $registre['adjunts'])
                        ->assign('extensions', ModUtil::getVar('IWmain', 'extensions'))
                        ->assign('u', $u)
                        ->assign('name', $forum['nom_forum'])
                        ->fetch('IWforums_user_edit_msg.htm');
    }

    /**
     * Generate a pager of messages
     * @author:   Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	the information needed for the pager
     * @return:	A pager navigator
     */
    public function pager($args) {
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'GET');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'GET');
        $total = FormUtil::getPassedValue('total', isset($args['total']) ? $args['total'] : null, 'GET');
        $urltemplate = FormUtil::getPassedValue('urltemplate', isset($args['urltemplate']) ? $args['urltemplate'] : null, 'GET');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // quick check to ensure that we have work to do
        if ($total <= $rpp)
            return;

        if (!isset($inici) || empty($inici))
            $inici = 1;

        if (!isset($rpp) || empty($rpp))
            $rpp = 10;

        // show startnum link
        if ($inici != 1) {
            $url = preg_replace('/%%/', 1, $urltemplate);
            $text = '<a href="' . $url . '"><<</a> | ';
        } else
            $text = '<< | ';

        $items[] = array('text' => $text);
        // show following items
        $pagenum = 1;
        for ($curnum = 1; $curnum <= $total; $curnum += $rpp) {
            if (($inici < $curnum) || ($inici > ($curnum + $rpp - 1))) {
                // mod by marsu - use sliding window for pagelinks
                if ((($pagenum % 10) == 0) // link if page is multiple of 10
                        || ($pagenum == 1) // link first page
                        || (($curnum > ($inici - 4 * $rpp)) //link -3 and +3 pages
                        && ($curnum < ($inici + 4 * $rpp)))
                ) {
                    // Not on this page - show link
                    $url = preg_replace('/%%/', $curnum, $urltemplate);
                    $text = '<a href="' . $url . '">' . $pagenum . '</a> | ';
                    $items[] = array('text' => $text);
                }
                //end mod by marsu
            } else {
                // on this page - show text
                $text = $pagenum . ' | ';
                $items[] = array('text' => $text);
            }
            $pagenum++;
        }
        if (($curnum >= $rpp + 1) && ($inici < $curnum - $rpp)) {
            $url = preg_replace('/%%/', $curnum - $rpp, $urltemplate);
            $text = '<a href="' . $url . '">>></a>';
        } else
            $text = '>>';

        $items[] = array('text' => $text);
        return $this->view->assign('items', $items)
                        ->fetch('IWforums_user_pager.htm');
    }

    /**
     * Set a message as main message and maintain it on top
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	message, topic and forum identities
     * @return:	Redirect user to readers page
     */
    public function onTop($args) {

        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'GET');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'GET');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'GET');
        // security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // check if user can access the forum as moderator
        $access = ModUtil::func('IWforums', 'user', 'access', array('fid' => $fid));
        if ($access < 4) {
            LogUtil::registerError($this->__('You can\'t access the forum'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        // get message information
        $missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg', array('fmid' => $fmid));
        if ($missatge == false) {
            LogUtil::registerError($this->__('No messages have been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }

        // check if the message is parent
        if ($missatge['idparent'] != 0) {
            LogUtil::registerError($this->__('The message can not be set as main message.'));
            if ($ftid != 0) {
                return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                    'ftid' => $ftid)));
            } else {
                return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid)));
            }
        }
        // set message as main message
        if (ModUtil::apiFunc('IWforums', 'user', 'onTop', array('fmid' => $fmid,
                ))) {
            $msg = ($missatge['onTop'] == 1) ? $this->__('The message has been set as not main message.'):$this->__('The message has been set as main message.');
            // success
            LogUtil::registerStatus($msg);
        }

        // redirect user to the list of messages
        if ($ftid != 0) {
            return System::redirect(ModUtil::url('IWforums', 'user', 'llista_msg', array('fid' => $fid,
                                'ftid' => $ftid)));
        } else {
            return System::redirect(ModUtil::url('IWforums', 'user', 'forum', array('fid' => $fid)));
        }
    }

}
