<?php

/**
 * Intraweb
 *
 * @copyright  (c) 2011, Intraweb Development Team
 * @link       http://code.zikula.org/intraweb/
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package    Intraweb_Modules
 * @subpackage IWAgendas
 */
class IWagendas_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Admin main page
     *
     * @return string List of the agendas available
     */
    public function main() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        // Get the info about the shared agendas
        $agendas = ModUtil::apiFunc('IWagendas', 'user', 'getAllAgendas', array('onlyShared' => 1));

        //get all groups information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));
        $groupsInfo['-1'] = $this->__('Unregistered');
        //get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersInfo = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                    'info' => 'ncc'));

        $agendasArray = array();
        foreach ($agendas as $agenda) {
            $groupsArray = array();
            $groups = explode('$$', substr($agenda['grup'], 2, -1));
            foreach ($groups as $group) {
                if ($group != '') {
                    $vals = explode('|', $group);
                    $groupsArray[] = array('id' => $group,
                        'groupName' => $groupsInfo[$vals[0]],
                        'accessType' => $vals[1]);
                }
            }
            $managersArray = array();
            $managers = explode('$$', substr($agenda['resp'], 2, -1));
            foreach ($managers as $manager) {
                if ($manager != '') {
                    $managersArray[] = array('uid' => $manager,
                        'userName' => $usersInfo[$manager]);
                }
            }
            $agendasArray[] = array('daid' => $agenda['daid'],
                'nom_agenda' => $agenda['nom_agenda'],
                'descriu' => $agenda['descriu'],
                'activa' => $agenda['activa'],
                'groups' => $groupsArray,
                'managers' => $managersArray,
                'adjunts' => $agenda['adjunts'],
                'protegida' => $agenda['protegida'],
                'color' => $agenda['color']);
        }

        return $this->view->assign('agendas', $agendasArray)
                        ->fetch('IWagendas_admin_main.htm');
    }

    /**
     * get the characteristics content of an agenda
     *
     * @param array $args The agenda identity
     *
     * @return The agenda information
     */
    public function getCharsContent($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');

        // Get field information
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));

        if ($item == false) {
            LogUtil::registerError($this->__('The agenda was not found'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }

        return $item;
    }

    /**
     * Show the form needed to create a new agenda
     *
     * @return The creation form
     */
    public function newItem() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $nomcamp = array($this->__('Nota name'),
            $this->__('Secondary field') . ' 1',
            $this->__('Secondary field') . ' 2',
            $this->__('Secondary field') . ' 3',
            $this->__('Secondary field') . ' 4',
            $this->__('Secondary field') . ' 5');

        // Define the possible types of fields
        $camps0 = array(array('id' => 1,
                'name' => $this->__('Text')),
            array('id' => 2,
                'name' => $this->__('Text area')));
        $camps1 = array(array('id' => 1,
                'name' => $this->__('Text')),
            array('id' => 2,
                'name' => $this->__('Text area')),
            array('id' => 3,
                'name' => $this->__('Event author')),
            array('id' => 4,
                'name' => $this->__('Event date')),
            array('id' => 5,
                'name' => $this->__('Selection')));

        for ($i = 0; $i < 6; $i++) {
            $camps = ($i == 0) ? $camps0 : $camps1;
            $fielsArray[] = array('nomcamp' => $nomcamp[$i],
                'camps' => $camps,
                'order' => $i + 1);
        }

        return $this->view->assign('fields', $fielsArray)
                        ->fetch('IWagendas_admin_newItem.htm');
    }

    /**
     * Get the information from the form of creation of an agenda
     *
     * @param  array $args Array with the information from the form
     *
     * @return Redirect the user to main page
     */
    public function create($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $nom_agenda = FormUtil::getPassedValue('nom_agenda', isset($args['nom_agenda']) ? $args['nom_agenda'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $activa = FormUtil::getPassedValue('activa', isset($args['activa']) ? $args['activa'] : null, 'POST');

        $c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
        $c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
        $c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
        $c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
        $c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
        $c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');

        $tc1 = FormUtil::getPassedValue('tc1', isset($args['tc1']) ? $args['tc1'] : null, 'POST');
        $tc2 = FormUtil::getPassedValue('tc2', isset($args['tc2']) ? $args['tc2'] : null, 'POST');
        $tc3 = FormUtil::getPassedValue('tc3', isset($args['tc3']) ? $args['tc3'] : null, 'POST');
        $tc4 = FormUtil::getPassedValue('tc4', isset($args['tc4']) ? $args['tc4'] : null, 'POST');
        $tc5 = FormUtil::getPassedValue('tc5', isset($args['tc5']) ? $args['tc5'] : null, 'POST');
        $tc6 = FormUtil::getPassedValue('tc6', isset($args['tc6']) ? $args['tc6'] : null, 'POST');
        $op2 = FormUtil::getPassedValue('op2', isset($args['op2']) ? $args['op2'] : null, 'POST');
        $op3 = FormUtil::getPassedValue('op3', isset($args['op3']) ? $args['op3'] : null, 'POST');
        $op4 = FormUtil::getPassedValue('op4', isset($args['op4']) ? $args['op4'] : null, 'POST');
        $op5 = FormUtil::getPassedValue('op5', isset($args['op5']) ? $args['op5'] : null, 'POST');
        $op6 = FormUtil::getPassedValue('op6', isset($args['op6']) ? $args['op6'] : null, 'POST');

        $adjunts = FormUtil::getPassedValue('adjunts', isset($args['adjunts']) ? $args['adjunts'] : null, 'POST');
        $protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
        $color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'POST');

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($nom_agenda) || $nom_agenda == '') {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }

        //if field type is different to list set list options as ''
        if ($tc2 != 5)
            $op2 = '';
        if ($tc3 != 5)
            $op3 = '';
        if ($tc4 != 5)
            $op4 = '';
        if ($tc5 != 5)
            $op5 = '';
        if ($tc6 != 5)
            $op6 = '';

        //Check if defined agenda's field are consecutive
        for ($i = 1; $i < 7; $i++) {
            $c = 'c' . $i;
            if (empty($$c)) {
                $buit = true;
            } else {
                if (isset($buit) && $buit) {
                    LogUtil::registerError($this->__('Defined fields must be consecutive'));
                    return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
                }
                $buit = false;
            }
        }

        //Update the agenda
        $lid = ModUtil::apiFunc('IWagendas', 'admin', 'create', array('nom_agenda' => $nom_agenda,
                    'descriu' => $descriu,
                    'activa' => $activa,
                    'c1' => $c1,
                    'c2' => $c2,
                    'c3' => $c3,
                    'c4' => $c4,
                    'c5' => $c5,
                    'c6' => $c6,
                    'op2' => $op2,
                    'op3' => $op3,
                    'op4' => $op4,
                    'op5' => $op5,
                    'op6' => $op6,
                    'tc1' => $tc1,
                    'tc2' => $tc2,
                    'tc3' => $tc3,
                    'tc4' => $tc4,
                    'tc5' => $tc5,
                    'tc6' => $tc6,
                    'adjunts' => $adjunts,
                    'protegida' => $protegida,
                    'color' => $color));
        if ($lid != false) {
            //success
            LogUtil::registerStatus($this->__('New agenda created'));
        }

        //redirect the user to main page
        return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
    }

    /**
     * Delete an agenda
     *
     * @param array $args Array with the identity of the agenda
     *
     * @return Redirect the user to main page
     */
    public function delete($args) {
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        // Get item
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getagenda', array('daid' => $daid));
        if ($item == false) {
            LogUtil::registerError($this->__('The agenda was not found'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }

        if (!$confirm) {
            return $this->view->assign('item', $item)
                            ->fetch('IWagendas_admin_delete.htm');
        }

        $this->checkCsrfToken();

        if (ModUtil::apiFunc('IWagendas', 'admin', 'delete', array('daid' => $daid))) {
            // Success
            LogUtil::registerStatus($this->__('The agenda has been deleted'));
        }

        return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
    }

    /**
     * Show the form needed to edit an agenda
     *
     * @param array $args Array with the identity of the agenda
     *
     * @return The creation form
     */
    public function edit($args) {
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'GET');

        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        //Get field information
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
        if ($item == false) {
            LogUtil::registerError($this->__('The agenda was not found'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }

        $nomcamp = array($this->__('Nota name'),
            $this->__('Secondary field') . ' 1',
            $this->__('Secondary field') . ' 2',
            $this->__('Secondary field') . ' 3',
            $this->__('Secondary field') . ' 4',
            $this->__('Secondary field') . ' 5');

        //Define the possible types of fields
        $camps0 = array(array('id' => 1,
                'name' => $this->__('Text')),
            array('id' => 2,
                'name' => $this->__('Text area')));
        $camps1 = array(array('id' => 1,
                'name' => $this->__('Text')),
            array('id' => 2,
                'name' => $this->__('Text area')),
            array('id' => 3,
                'name' => $this->__('Event author')),
            array('id' => 4,
                'name' => $this->__('Event date')),
            array('id' => 5,
                'name' => $this->__('Selection')));

        $msgUsers = ModUtil::getVar('IWagendas', 'msgUsersDefault');
        $msgUsersResp = ModUtil::getVar('IWagendas', 'msgUsersRespDefault');

        $this->view->assign('msgUsers', $msgUsers);
        $this->view->assign('msgUsersResp', $msgUsersResp);
        for ($i = 0; $i < 6; $i++) {
            $camps = ($i == 0) ? $camps0 : $camps1;
            $j = $i + 1;
            $op = (isset($item['op' . $j])) ? $item['op' . $j] : '';
            $fielsArray[] = array('nomcamp' => $nomcamp[$i],
                'camps' => $camps,
                'order' => $i + 1,
                'value' => $item['c' . $j],
                'type' => $item['tc' . $j],
                'option' => $op,
            );
        }
        $this->view->assign('fields', $fielsArray);
        $this->view->assign('item', $item);

        return $this->view->fetch('IWagendas_admin_edit.htm');
    }

    /**
     * Check the information of an edited agenda
     *
     * @param array $args Array with the information of the agenda
     *
     * @return Redirect user to main admin page
     */
    public function update($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $nom_agenda = FormUtil::getPassedValue('nom_agenda', isset($args['nom_agenda']) ? $args['nom_agenda'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $activa = FormUtil::getPassedValue('activa', isset($args['activa']) ? $args['activa'] : null, 'POST');
        $c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
        $c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
        $c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
        $c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
        $c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
        $c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
        $tc1 = FormUtil::getPassedValue('tc1', isset($args['tc1']) ? $args['tc1'] : null, 'POST');
        $tc2 = FormUtil::getPassedValue('tc2', isset($args['tc2']) ? $args['tc2'] : null, 'POST');
        $tc3 = FormUtil::getPassedValue('tc3', isset($args['tc3']) ? $args['tc3'] : null, 'POST');
        $tc4 = FormUtil::getPassedValue('tc4', isset($args['tc4']) ? $args['tc4'] : null, 'POST');
        $tc5 = FormUtil::getPassedValue('tc5', isset($args['tc5']) ? $args['tc5'] : null, 'POST');
        $tc6 = FormUtil::getPassedValue('tc6', isset($args['tc6']) ? $args['tc6'] : null, 'POST');
        $op2 = FormUtil::getPassedValue('op2', isset($args['op2']) ? $args['op2'] : null, 'POST');
        $op3 = FormUtil::getPassedValue('op3', isset($args['op3']) ? $args['op3'] : null, 'POST');
        $op4 = FormUtil::getPassedValue('op4', isset($args['op4']) ? $args['op4'] : null, 'POST');
        $op5 = FormUtil::getPassedValue('op5', isset($args['op5']) ? $args['op5'] : null, 'POST');
        $op6 = FormUtil::getPassedValue('op6', isset($args['op6']) ? $args['op6'] : null, 'POST');
        $adjunts = FormUtil::getPassedValue('adjunts', isset($args['adjunts']) ? $args['adjunts'] : null, 'POST');
        $protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
        $color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'POST');

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($nom_agenda) || $nom_agenda == '') {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        //if field type is different to list set list options as ''
        if ($tc2 != 5)
            $op2 = '';
        if ($tc3 != 5)
            $op3 = '';
        if ($tc4 != 5)
            $op4 = '';
        if ($tc5 != 5)
            $op5 = '';
        if ($tc6 != 5)
            $op6 = '';

        //Check if defined agenda's field are consecutive
        for ($i = 1; $i < 7; $i++) {
            $c = 'c' . $i;
            if (empty($$c)) {
                $buit = true;
            } else {
                if ($buit) {
                    LogUtil::registerError($this->__('Defined fields must be consecutive'));
                    return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
                }
                $buit = false;
            }
        }
        $items = array('nom_agenda' => $nom_agenda,
            'descriu' => $descriu,
            'activa' => $activa,
            'c1' => $c1,
            'c2' => $c2,
            'c3' => $c3,
            'c4' => $c4,
            'c5' => $c5,
            'c6' => $c6,
            'tc1' => $tc1,
            'tc2' => $tc2,
            'tc3' => $tc3,
            'tc4' => $tc4,
            'tc5' => $tc5,
            'tc6' => $tc6,
            'op2' => $op2,
            'op3' => $op3,
            'op4' => $op4,
            'op5' => $op5,
            'op6' => $op6,
            'adjunts' => $adjunts,
            'protegida' => $protegida,
            'color' => $color);
        $lid = ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $daid,
                    'items' => $items));
        if ($lid != false) {
            LogUtil::registerStatus($this->__('Agenda updated'));
        }
        return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
    }

    /**
     * Add a group with access to the agenda
     *
     * @param array $args Array with the group identity
     *
     * @return Redirect user to main admin page
     */
    public function addGroup($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');
        $msgUsers = FormUtil::getPassedValue('msgUsers', isset($args['msgUsers']) ? $args['msgUsers'] : ModUtil::getVar('IWagendas', 'msgUsersDefault'), 'POST');
        $msgUsersDefault = FormUtil::getPassedValue('msgUsersDefault', isset($args['msgUsersDefault']) ? $args['msgUsersDefault'] : null, 'POST');

        //Get item
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getagenda', array('daid' => $daid));
        if ($item == false) {
            LogUtil::registerError($this->__('The agenda was not found'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        if (!$confirm || $group == 0) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                        'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));


            //check if iwmessages module is active
            $modid = ModUtil::getIdFromName('IWmessages');
            $modinfo = ModUtil::getInfo($modid);
            $messagesActive = ($modinfo['state'] == 3) ? true : false;
            $this->view->assign('messagesActive', $messagesActive);
            $this->view->assign('msgUsers', $msgUsers);
            $this->view->assign('groups', $groups);
            $this->view->assign('item', $item);
            return $this->view->fetch('IWagendas_admin_addGroup.htm');
        }

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($group) || !is_numeric($group) || $group == 0) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        if ($group == '-1') {
            $accessType = 1;
            $msgUsersDefault = '';
        }
        $groupString = ($item['grup'] == '') ? '$' : $item['grup'];
        $groupString .= '$' . $group . '|' . $accessType . '$';
        $items = array('grup' => $groupString);
        //add the group in database and send automatic message if it is necessary
        if (ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $daid,
                    'items' => $items))) {
            if ($msgUsersDefault) {
                ModUtil::setVar('IWagendas', 'msgUsersDefault', $msgUsers);
            }
            //Success
            LogUtil::registerStatus($this->__('A group has been added'));
            //check if iwmessages module is active
            $modid = ModUtil::getIdFromName('IWmessages');
            $modinfo = ModUtil::getInfo($modid);
            if ($modinfo['state'] == 3) {
                //Send a private mail to users with access to the agenda
                if ($msgUsers != '' && $item['activa']) {
                    //Get members of the group
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $members = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                                'gid' => $group));
                    foreach ($members as $member) {
                        ModUtil::apiFunc('IWmessages', 'user', 'create', array('to_userid' => $member['id'],
                            'subject' => $this->__('Agendas module - Automatic message'),
                            'message' => $msgUsers));
                    }
                }
            }
        }

        return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
    }

    /**
     * Add a manager in the agenda
     *
     * @param array $args Array with the manager identity
     *
     * @return Redirect user to main admin page
     */
    public function addManager($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
        $msgUsersResp = FormUtil::getPassedValue('msgUsersResp', isset($args['msgUsersResp']) ? $args['msgUsersResp'] : ModUtil::getVar('IWagendas', 'msgUsersRespDefault'), 'POST');
        $msgUsersRespDefault = FormUtil::getPassedValue('msgUsersRespDefault', isset($args['msgUsersRespDefault']) ? $args['msgUsersRespDefault'] : null, 'POST');

        //Get item
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getagenda', array('daid' => $daid));
        if ($item == false) {
            LogUtil::registerError($this->__('The agenda was not found'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        $confirm = (!isset($uid) || !is_numeric($uid) || $uid == 0) ? 0 : 1;
        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                        'plus' => $this->__('Choose a group...'),
                        'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                        'gid' => $group));


            //check if iwmessages module is active
            $modid = ModUtil::getIdFromName('IWmessages');
            $modinfo = ModUtil::getInfo($modid);
            $messagesActive = ($modinfo['state'] == 3) ? true : false;
            $this->view->assign('messagesActive', $messagesActive);
            $this->view->assign('msgUsersResp', $msgUsersResp);
            $this->view->assign('groupselect', $group);
            $this->view->assign('groups', $groups);
            $this->view->assign('groupMembers', $groupMembers);
            $this->view->assign('item', $item);
            return $this->view->fetch('IWagendas_admin_addManager.htm');
        }

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($uid) || !is_numeric($uid) || $uid == 0) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        $respString = ($item['resp'] == '') ? '$' : $item['resp'];
        $respString .= '$' . $uid . '$';
        $items = array('resp' => $respString);
        //add the group in database and send automatic message if it is necessary
        if (ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $daid,
                    'items' => $items))) {
            if ($msgUsersRespDefault) {
                ModUtil::setVar('IWagendas', 'msgUsersRespDefault', $msgUsersResp);
            }
            //Success
            LogUtil::registerStatus($this->__('A manager has been added'));
            //check if iwmessages module is active
            $modid = ModUtil::getIdFromName('IWmessages');
            $modinfo = ModUtil::getInfo($modid);
            if ($modinfo['state'] == 3) {
                //Send a private mail to users with access to the agenda
                if ($msgUsersResp != '' && $item['activa']) {
                    ModUtil::apiFunc('IWmessages', 'user', 'create', array('to_userid' => $uid,
                        'subject' => $this->__('Agendas module - Automatic message'),
                        'message' => $msgUsersResp));
                }
            }
        }

        return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
    }

    /**
     * Delete a group with access to the agenda
     *
     * @param array $args The information of the group that have to be deleted
     *
     * @return Redirect user to main admin page
     */
    public function deleteGroup($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

        //Get item
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getagenda', array('daid' => $daid));
        if ($item == false) {
            LogUtil::registerError($this->__('The agenda was not found'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        if (!$confirm) {
            //gets the group name
            $vals = explode('|', $id);
            //get all groups information
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));
            $groupName = $groupsInfo[$vals[0]];


            $this->view->assign('groupName', $groupName);
            $this->view->assign('item', $item);
            $this->view->assign('id', $id);
            return $this->view->fetch('IWagendas_admin_deleteGroup.htm');
        }

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($id) || $id == '') {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        $groupString = str_replace('$' . $id . '$', '', $item['grup']);
        $items = array('grup' => $groupString);
        if (ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $daid,
                    'items' => $items))) {
            //Success
            LogUtil::registerStatus($this->__('A group has been deleted'));
        }
        return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
    }

    /**
     * Delete a manager of the agenda
     *
     * @param array $args The information of the manager who is going to be deleted
     *
     * @return Redirect user to main admin page
     */
    public function deleteManager($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');

        //Get item
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getagenda', array('daid' => $daid));
        if ($item == false) {
            LogUtil::registerError($this->__('The agenda was not found'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        if (!$confirm) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userName = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                        'uid' => $id,
                        'info' => 'ncc'));
            $this->view->assign('userName', $userName);
            $this->view->assign('item', $item);
            $this->view->assign('id', $id);
            return $this->view->fetch('IWagendas_admin_deleteManager.htm');
        }

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($id) || $id == '') {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        $respString = str_replace('$' . $id . '$', '', $item['resp']);
        $items = array('resp' => $respString);
        if (ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $daid,
                    'items' => $items))) {
            //Success
            LogUtil::registerStatus($this->__('A manager has been deleted'));
        }

        return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
    }

    /**
     * Modify the configuration of the agenda
     *
     * @return Page settings
     */
    public function configura() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        //memoritzem en un array els noms dels mesos de l'any
        $nom_mes = array($this->__('January'),
            $this->__('February'),
            $this->__('March'),
            $this->__('April'),
            $this->__('May'),
            $this->__('June'),
            $this->__('July'),
            $this->__('August'),
            $this->__('September'),
            $this->__('October'),
            $this->__('November'),
            $this->__('December'));
        //Memoritzem un array amb els dies de la setmana
        $day_names_abbr = array($this->__('Mo'),
            $this->__('Tu'),
            $this->__('We'),
            $this->__('Th'),
            $this->__('Fr'),
            $this->__('Sa'),
            $this->__('Su'));
        //Set mounhts and colours configuration into arrays
        $nom_mes_article = array($this->__('January of'),
            $this->__('February of'),
            $this->__('March of'),
            $this->__('April of'),
            $this->__('May of'),
            $this->__('June of'),
            $this->__('July of'),
            $this->__('August of'),
            $this->__('September of'),
            $this->__('October of'),
            $this->__('November of'),
            $this->__('December of'));
        $confcolors = array($this->__('Title background'),
            $this->__('Month link background'),
            $this->__('Header background'),
            $this->__('Header text'),
            $this->__('Table background'),
            $this->__('Days link'),
            $this->__('Bank holidays link'),
            $this->__('Table border'),
            $this->__('Bank holidays background'),
            $this->__('Working days background'),
            $this->__('Present day background'),
            $this->__('New events background'),
            $this->__('Seen events background'),
            $this->__('Text background'),
            $this->__('Completed background'),
            $this->__('Text'));
        //get the configuration dates
        $inicicurs = ModUtil::getVar('IWagendas', 'inicicurs');
        $calendariescolar = ModUtil::getVar('IWagendas', 'calendariescolar');
        $comentaris = ModUtil::getVar('IWagendas', 'comentaris');
        $llegenda = ModUtil::getVar('IWagendas', 'llegenda');
        $infos = ModUtil::getVar('IWagendas', 'infos');
        $vista = ModUtil::getVar('IWagendas', 'vista');
        $colorsconf = ModUtil::getVar('IWagendas', 'colors');
        $maxnotes = ModUtil::getVar('IWagendas', 'maxnotes');
        $adjuntspersonals = ModUtil::getVar('IWagendas', 'adjuntspersonals');
        $caducadies = ModUtil::getVar('IWagendas', 'caducadies');
        $urladjunts = ModUtil::getVar('IWagendas', 'urladjunts');
        $allowGCalendar = ModUtil::getVar('IWagendas', 'allowGCalendar');
        $zendGdataFuncAvailable = ModUtil::func('IWagendas', 'user', 'getGdataFunctionsAvailability');
        if ($vista == -1)
            $vista = 0;
        //Creem matrius per a les diferents dades de configuraciï¿œ
        $festiussempre = explode('$$', substr(ModUtil::getVar('IWagendas', 'festiussempre'), 0, strlen(ModUtil::getVar('IWagendas', 'festiussempre')) - 1));
        array_shift($festiussempre);
        $festiussempreArray = array();
        foreach ($festiussempre as $festiu) {
            $dia = substr($festiu, 0, 2);
            if (substr($dia, 0, 1) == '0')
                $dia = substr($dia, 1, 1);
            $mes = $nom_mes_article[substr($festiu, 2, 2) - 1];
            $festiussempreArray[] = array('date' => $dia . ' ' . substr($mes, 0, strlen($mes) - 3),
                'label' => substr($festiu, 5),
                'optionText' => substr($festiu, 0, 2) . substr($festiu, 2, 2),
                'festiu' => $festiu);
        }
        $altresfestius = explode('$$', substr(ModUtil::getVar('IWagendas', 'altresfestius'), 0, strlen(ModUtil::getVar('IWagendas', 'altresfestius')) - 1));
        array_shift($altresfestius);
        $altresfestiusArray = array();
        foreach ($altresfestius as $altrefestiu) {
            $dia = substr($altrefestiu, 0, 2);
            if (substr($dia, 0, 1) == '0') {
                $dia = substr($dia, 1, 1);
            }
            $any = substr($altrefestiu, 4, 4);
            $altresfestiusArray[] = array('date' => $dia . ' ' . $nom_mes_article[substr($altrefestiu, 2, 2) - 1] . ' ' . $any,
                'label' => substr($altrefestiu, 9),
                'optionText' => substr($altrefestiu, 0, 2) . substr($altrefestiu, 2, 2) . $any,
                'festiu' => $altrefestiu);
        }
        $informacions = explode('$$', substr(ModUtil::getVar('IWagendas', 'informacions'), 0, strlen(ModUtil::getVar('IWagendas', 'informacions')) - 1));
        array_shift($informacions);
        $informacionsArray = array();
        foreach ($informacions as $informacio) {
            $dia = substr($informacio, 0, 2);
            if (substr($dia, 0, 1) == '0') {
                $dia = substr($dia, 1, 1);
            }
            $any = substr($informacio, 4, 4);
            $informacionsArray[] = array('date' => $dia . ' ' . $nom_mes_article[substr($informacio, 2, 2) - 1] . ' ' . $any,
                'label' => substr($informacio, 9),
                'optionText' => $dia . substr($informacio, 2, 2) . $any,
                'festiu' => $informacio);
        }
        $periodes = explode('$$', substr(ModUtil::getVar('IWagendas', 'periodes'), 0, strlen(ModUtil::getVar('IWagendas', 'periodes')) - 1));
        array_shift($periodes);
        $periodesArray = array();
        foreach ($periodes as $periode) {
            $dia = substr($periode, 0, 2);
            if (substr($dia, 0, 1) == '0') {
                $dia = substr($dia, 1, 1);
            }
            $any = substr($periode, 4, 4);
            $init = $dia . ' ' . $nom_mes_article[substr($periode, 2, 2) - 1] . ' ' . $any;
            $dia = substr($periode, 8, 2);
            if (substr($dia, 0, 1) == '0') {
                $dia = substr($dia, 1, 1);
            }
            $any = substr($periode, 12, 4);
            $end = $dia . ' ' . $nom_mes_article[substr($periode, 10, 2) - 1] . ' ' . $any;
            $periodesArray[] = array('init' => $init,
                'end' => $end,
                'label' => substr($periode, 17, -7),
                'color' => substr($periode, -7),
                'optionText' => substr($periode, 0, 2) . substr($periode, 2, 2) . substr($periode, 4, 4) . substr($periode, 8, 2) . substr($periode, 10, 2) . substr($periode, 12, 4),
                'festiu' => str_replace('#', '$', $periode));
        }
        $colors = explode('|', $colorsconf);
        // Get the month and the year
        if (isset($_REQUEST['mes'])) {
            $month = DataUtil::formatForOS($_REQUEST['mes']);
            $year = DataUtil::formatForOS($_REQUEST['any']);
            if ($month == 0) {
                $month = 12;
                $year = $year - 1;
            }
            if ($month == 13) {
                $month = 1;
                $year = $year + 1;
            }
        } else {
            $month = date('m');
            $year = date('Y');
        }
        // Calculate the number of days of the month (28 to 31)
        $days_month = date("t", mktime(0, 0, 0, $month, 1, $year));
        // Numeric representation of the first day of the month in the week: 0 (for Sunday) through 6 (for Saturday)
        $first_day = date("w", mktime(0, 0, 0, $month, 1, $year));
        // The Sunday must be number 7 (for us, Sunday is the last day of the week, not the first)
        if ($first_day == 0) {
            $first_day = 7;
        }
        // Get the info of the days (one iteration per day)
        for ($i = 1; $i <= $days_month; $i++) {
            $days[$i]['color'] = $colors[5];
            $days[$i]['bgcolor'] = $colors[9]; // Default color (background color of the table)
            $days[$i]['label'] = $this->__('There are no events on this date');
            // Check whether it's a non-working day
            $festiu = ModUtil::func('IWagendas', 'user', 'festiu', array('dia' => $i, 'mes' => $month, 'any' => $year));
            // Change the color and the label if necessary
            if ($festiu['festiu']) {
                $days[$i]['bgcolor'] = $colors[8];
                $days[$i]['color'] = $colors[6];
                $days[$i]['label'] = $festiu['etiqueta'];
            }
            // Check whether it's weekend
            $day_of_the_week = date("w", mktime(0, 0, 0, $month, $i, $year));
            // Change the color if necessary
            if ($day_of_the_week == 6 || $day_of_the_week == 0) {
                $days[$i]['color'] = $colors[6];
                $days[$i]['bgcolor'] = $colors[8];
            }
            // Check whether the day is today
            if (date('d') == $i && date('m') == $month && date('Y') == $year) {
                $days[$i]['bgcolor'] = $colors[10];
            }
            // Check whether there's any info associated to this day
            $information = ModUtil::func('IWagendas', 'user', 'info', array('dia' => $i,
                        'mes' => $month,
                        'any' => $year));
            if ($information != '')
                $days[$i]['info'] = $information;
        }
        $directoriroot = ModUtil::getVar('IWmain', 'documentRoot');
        $noWriteable = false;
        $noFolder = false;
        if (!file_exists($directoriroot . '/' . $urladjunts) || $urladjunts == '') {
            $noFolder = true;
        } else {
            if (!is_writeable($directoriroot . '/' . $urladjunts))
                $noWriteable = true;
        }
        $multizk = (isset($GLOBALS['ZConfig']['Multisites']['multi']) && $GLOBALS['ZConfig']['Multisites']['multi'] == 1) ? 1 : 0;
        $this->view->assign('multizk', $multizk);
        $this->view->assign('directoriroot', $directoriroot);
        $this->view->assign('vista', $vista);
        $this->view->assign('maxnotes', $maxnotes);
        $this->view->assign('adjuntspersonals', $adjuntspersonals);
        $this->view->assign('caducadies', $caducadies);
        $this->view->assign('urladjunts', $urladjunts);
        $this->view->assign('festiussempre', $festiussempreArray);
        $this->view->assign('altresfestius', $altresfestiusArray);
        $this->view->assign('confcolors', $confcolors);
        $this->view->assign('colors', $colors);
        $this->view->assign('noFolder', $noFolder);
        $this->view->assign('noWriteable', $noWriteable);
        $this->view->assign('month_name', $nom_mes[(int) date('m') - 1]);
        $this->view->assign('year', date('Y'));
        $this->view->assign('day_names_abbr', $day_names_abbr);
        $this->view->assign('days', $days);
        $this->view->assign('zendGdataFuncAvailable', $zendGdataFuncAvailable);
        $this->view->assign('allowGCalendar', $allowGCalendar);
        // Pass the data to the template
        $this->view->assign('first_day', $first_day);
        $this->view->assign('days_month', $days_month);
        if (checkdate(1, 1, $inicicurs)) {
            $this->view->assign('inicicurs', $inicicurs);
            $this->view->assign('inicicurs1', $inicicurs + 1);
        } else {
            return $this->view->fetch('IWagendas_admin_conf.htm');
        }
        $this->view->assign('calendariescolar', $calendariescolar);
        $this->view->assign('periodes', $periodesArray);
        $this->view->assign('informacions', $informacionsArray);
        $this->view->assign('comentaris', $comentaris);
        $this->view->assign('llegenda', $llegenda);
        $this->view->assign('infos', $infos);

        return $this->view->fetch('IWagendas_admin_conf.htm');
    }

    /**
     * Update the module vars
     *
     * @param array $args Module vars values
     *
     * @return Redirect user to configuration page
     */
    public function conf_modifica($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $this->checkCsrfToken();

        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
        $ce = FormUtil::getPassedValue('ce', isset($args['ce']) ? $args['ce'] : null, 'POST');
        $comentaris = FormUtil::getPassedValue('comentaris', isset($args['comentaris']) ? $args['comentaris'] : null, 'POST');
        $llegenda = FormUtil::getPassedValue('llegenda', isset($args['llegenda']) ? $args['llegenda'] : null, 'POST');
        $infos = FormUtil::getPassedValue('infos', isset($args['infos']) ? $args['infos'] : null, 'POST');
        $vista = FormUtil::getPassedValue('vista', isset($args['vista']) ? $args['vista'] : null, 'POST');
        $submit = FormUtil::getPassedValue('submit', isset($args['submit']) ? $args['submit'] : null, 'POST');
        $colors = FormUtil::getPassedValue('colors', isset($args['colors']) ? $args['colors'] : null, 'POST');
        $maxnotes = FormUtil::getPassedValue('maxnotes', isset($args['maxnotes']) ? $args['maxnotes'] : null, 'POST');
        $adjuntspersonals = FormUtil::getPassedValue('adjuntspersonals', isset($args['adjuntspersonals']) ? $args['adjuntspersonals'] : null, 'POST');
        $caducadies = FormUtil::getPassedValue('caducadies', isset($args['caducadies']) ? $args['caducadies'] : null, 'POST');
        $urladjunts = FormUtil::getPassedValue('urladjunts', isset($args['urladjunts']) ? $args['urladjunts'] : null, 'POST');
        $allowGCalendar = FormUtil::getPassedValue('allowGCalendar', isset($args['allowGCalendar']) ? $args['allowGCalendar'] : null, 'POST');

        if ($submit == $this->__('Restore')) {
            $posa_colors = "DBD4A6|555555|FFCC66|FFFFFF|E1EBFF|669ACC|FFFFFF|FFFFFF|FF8484|FFFFFF|DBD4A6|66FF66|3F6F3E|FFFFCC|BBBBBB|000000";
        } else {
            foreach ($colors as $color) {
                $posa_colors .= $color . '|';
            }
        }
        if (!checkdate(1, 1, $inici)) {
            LogUtil::registerError($this->__('Date given as initial year is incorrect'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'main'));
        }
        //Set the values of the module vars
        if (!isset($vista))
            $vista = -1;
        $this->setVar('inicicurs', $inici)
                ->setVar('calendariescolar', $ce)
                ->setVar('comentaris', $comentaris)
                ->setVar('llegenda', $llegenda)
                ->setVar('infos', $infos)
                ->setVar('vista', $vista)
                ->setVar('colors', $posa_colors)
                ->setVar('maxnotes', $maxnotes)
                ->setVar('adjuntspersonals', $adjuntspersonals)
                ->setVar('caducadies', $caducadies)
                ->setVar('urladjunts', $urladjunts)
                ->setVar('allowGCalendar', $allowGCalendar);

        LogUtil::registerStatus($this->__('Agenda configuration updated'));

        return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
    }

    /**
     * Output a form necessary to create a new element
     *
     * @param array $args Index of the element to create
     *
     * @return Redirect user to form page
     */
    public function nouallista($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $index = FormUtil::getPassedValue('index', isset($args['index']) ? $args['index'] : null, 'REQUEST');
        $dada = FormUtil::getPassedValue('dada', isset($args['dada']) ? $args['dada'] : null, 'REQUEST');
        $dia1 = FormUtil::getPassedValue('dia1', isset($args['dia1']) ? $args['dia1'] : null, 'POST');
        $dia2 = FormUtil::getPassedValue('dia2', isset($args['dia2']) ? $args['dia2'] : null, 'POST');
        $mes1 = FormUtil::getPassedValue('mes1', isset($args['mes1']) ? $args['mes1'] : null, 'POST');
        $mes2 = FormUtil::getPassedValue('mes2', isset($args['mes2']) ? $args['mes2'] : null, 'POST');
        $any1 = FormUtil::getPassedValue('any1', isset($args['any1']) ? $args['any1'] : null, 'POST');
        $any2 = FormUtil::getPassedValue('any2', isset($args['any2']) ? $args['any2'] : null, 'POST');
        $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
        $color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : "#", 'POST');

        if ($dia1 == null) {
            switch ($index) {
                case '1':
                    $dia1 = substr($dada, 0, 2);
                    $mes1 = substr($dada, 2, 2);
                    $text = substr($dada, 5);
                    break;
                case '2':
                    $dia1 = substr($dada, 0, 2);
                    $any1 = substr($dada, 4, 4);
                    $mes1 = substr($dada, 2, 2);
                    $text = substr($dada, 9);
                    break;
                case '3':
                    //Agafem les dades de la cadena
                    $color = '#' . substr($dada, -6);
                    $dia1 = substr($dada, 0, 2);
                    $any1 = substr($dada, 4, 4);
                    $mes1 = substr($dada, 2, 2);
                    $dia2 = substr($dada, 8, 2);
                    $any2 = substr($dada, 12, 4);
                    $mes2 = substr($dada, 10, 2);
                    $text = substr($dada, 17, -7);
                    break;
                case '4':
                    $dia1 = substr($dada, 0, 2);
                    $any1 = substr($dada, 4, 4);
                    $mes1 = substr($dada, 2, 2);
                    $text = substr($dada, 9);
                    break;
            }
        }
        if (empty($any1)) {
            $any1 = date('Y');
        }
        if (empty($any2)) {
            $any2 = date('Y');
        }
        //Omplim un multiselect amb els dies del mes
        for ($i = 1; $i < 32; $i++) {
            $dies_MS[] = array('id' => $i,
                'name' => $i);
        }
        //Creem un array preparat per un MultiSelect amb els noms dels mesos
        $mesos_MS = array(array('id' => 1,
                'name' => $this->__('January')),
            array('id' => 2,
                'name' => $this->__('February')),
            array('id' => 3,
                'name' => $this->__('March')),
            array('id' => 4,
                'name' => $this->__('April')),
            array('id' => 5,
                'name' => $this->__('May')),
            array('id' => 6,
                'name' => $this->__('June')),
            array('id' => 7,
                'name' => $this->__('July')),
            array('id' => 8,
                'name' => $this->__('August')),
            array('id' => 9,
                'name' => $this->__('September')),
            array('id' => 10,
                'name' => $this->__('October')),
            array('id' => 11,
                'name' => $this->__('November')),
            array('id' => 12,
                'name' => $this->__('December')));
        //Omplim un multiselect amb els anys disponibles. Sï¿œn l'any donat com d'inici del curs i l'any segï¿œent
        $anys_MS[] = array('id' => ModUtil::getVar('IWagendas', 'inicicurs'),
            'name' => ModUtil::getVar('IWagendas', 'inicicurs'));
        $anys_MS[] = array('id' => ModUtil::getVar('IWagendas', 'inicicurs') + 1,
            'name' => ModUtil::getVar('IWagendas', 'inicicurs') + 1);
        switch ($index) {
            case 1:
                $title = $this->__('Create a new bank holiday repeated every year');
                $title1 = $this->__('Date of bank holiday repeated every year');
                break;
            case 2:
                $title = $this->__('Create a bank holiday');
                $title1 = $this->__('Bank holiday');
                break;
            case 3:
                $title = $this->__('Create a new period');
                $title1 = $this->__('Date of the beginning of the period');
                break;
            case 4:
                $title = $this->__('Create a new information icon');
                $title1 = $this->__('Date to show the information icon');
                break;
        }
        return $this->view->assign('title', $title)
                        ->assign('title1', $title1)
                        ->assign('index', $index)
                        ->assign('dada', $dada)
                        ->assign('dies_MS', $dies_MS)
                        ->assign('mesos_MS', $mesos_MS)
                        ->assign('anys_MS', $anys_MS)
                        ->assign('dia1', $dia1)
                        ->assign('dia2', $dia2)
                        ->assign('mes1', $mes1)
                        ->assign('mes2', $mes2)
                        ->assign('any1', $any1)
                        ->assign('any2', $any2)
                        ->assign('text', $text)
                        ->assign('color', $color)
                        ->fetch('IWagendas_admin_newElement.htm');
    }

    /**
     * Get the values from the form and chenge them
     *
     * @param array $args Index of the element to create
     *
     * @return Redirect user to configuration page
     */
    public function modifica_llistes($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $index = FormUtil::getPassedValue('index', isset($args['index']) ? $args['index'] : null, 'REQUEST');
        $dada = FormUtil::getPassedValue('dada', isset($args['dada']) ? $args['dada'] : null, 'REQUEST');
        $dia1 = FormUtil::getPassedValue('dia1', isset($args['dia1']) ? $args['dia1'] : null, 'POST');
        $dia2 = FormUtil::getPassedValue('dia2', isset($args['dia2']) ? $args['dia2'] : null, 'POST');
        $mes1 = FormUtil::getPassedValue('mes1', isset($args['mes1']) ? $args['mes1'] : null, 'POST');
        $mes2 = FormUtil::getPassedValue('mes2', isset($args['mes2']) ? $args['mes2'] : null, 'POST');
        $any1 = FormUtil::getPassedValue('any1', isset($args['any1']) ? $args['any1'] : null, 'POST');
        $any2 = FormUtil::getPassedValue('any2', isset($args['any2']) ? $args['any2'] : null, 'POST');
        $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
        $color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : "#", 'POST');

        //if the entry is from a edit action delete the parameters edited in the list
        if (isset($dada) && $dada != "") {
            $dada = str_replace('$', '#', $dada);
            $dada = '$' . $dada . '$';
            switch ($index) {
                case '1':
                    $festiussempre = ModUtil::getVar('IWagendas', 'festiussempre');
                    $festiussempre = str_replace($dada, '', $festiussempre);
                    ModUtil::setVar('IWagendas', 'festiussempre', $festiussempre);
                    break;
                case '2':
                    $altresfestius = ModUtil::getVar('IWagendas', 'altresfestius');
                    $altresfestius = str_replace($dada, '', $altresfestius);
                    ModUtil::setVar('IWagendas', 'altresfestius', $altresfestius);
                    break;
                case '3':
                    $periodes = ModUtil::getVar('IWagendas', 'periodes');
                    $periodes = str_replace($dada, '', $periodes);
                    ModUtil::setVar('IWagendas', 'periodes', $periodes);
                    break;
                case '4':
                    $informacions = ModUtil::getVar('IWagendas', 'informacions');
                    $informacions = str_replace($dada, '', $informacions);
                    ModUtil::setVar('IWagendas', 'informacions', $informacions);
                    break;
            }
            $dada = '';
        }

        $this->checkCsrfToken();

        //Check needed arguments
        if (empty($text)) {
            LogUtil::registerError($this->__('Label text is empty'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
        }
        //check the first date
        if ($index == 1) {
            $any1 = date('Y');
        }
        if (!checkdate($mes1, $dia1, $any1)) {
            LogUtil::registerError($this->__('Incorrect date'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
        }
        //Check if dates of holadays are repeated
        if ($index == 1 || $index == 2) {
            //Comprovem que la data del festiu ï¿œs ï¿œnica
            $festiussempre = explode('$$', substr(ModUtil::getVar('IWagendas', 'festiussempre'), 0, strlen(ModUtil::getVar('IWagendas', 'festiussempre')) - 1));
            array_shift($festiussempre);
            $altresfestius = explode('$$', substr(ModUtil::getVar('IWagendas', 'altresfestius'), 0, strlen(ModUtil::getVar('IWagendas', 'altresfestius')) - 1));
            array_shift($altresfestius);
            //Comprovem que no estigui a la llista dels festius que es repeteixen sempre
            foreach ($festiussempre as $festiu) {
                if (mktime(1, 1, 1, substr($festiu, 2, 2), substr($festiu, 0, 2), 2000) == mktime(1, 1, 1, $mes1, $dia1, 2000)) {
                    $repetit = true;
                }
            }
            //comprovem que no estigui a la llista dels altres festius
            foreach ($altresfestius as $festiu) {
                if (mktime(1, 1, 1, substr($festiu, 2, 2), substr($festiu, 0, 2), substr($festiu, 4, 4)) == mktime(1, 1, 1, $mes1, $dia1, $any1)) {
                    $repetit = true;
                }
            }
            //El festiu estï¿œ repetit
            if ($repetit) {
                LogUtil::registerError($this->__('Date repeated. Only one date per bank holiday allowed'));
                return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
            }
        }
        //if we are defining a period check the second date
        if ($index == 3) {
            if (!checkdate($mes2, $dia2, $any2)) {
                LogUtil::registerError($this->__('Incorrect date'));
                return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
            }
            //Check if period is correct
            if (mktime(1, 1, 1, $mes1, $dia1, $any1) >= mktime(1, 1, 1, $mes2, $dia2, $any2)) {
                LogUtil::registerError($this->__('Incorrect selected period'));
                return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
            }
            //Check that period didn't over other period
            $periodes = explode('$$', substr(ModUtil::getVar('IWagendas', 'periodes'), 0, strlen(ModUtil::getVar('IWagendas', 'periodes')) - 1));
            array_shift($periodes);
            foreach ($periodes as $periode) {
                //CAL FER-HO;
            }
            //Check the colour
            if (strlen($color) != 7) {
                $colorerror = true;
            }
            //if colour is incorrect
            if ($colorerror) {
                LogUtil::registerError($this->__('Incorrect selected colour for the period '));
                return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
            }
        }
        //preparem les dates per posar-les en les variable
        if (strlen($dia1) == 1)
            $dia1 = '0' . $dia1;
        if (strlen($mes1) == 1)
            $mes1 = '0' . $mes1;
        if (strlen($dia2) == 1)
            $dia2 = '0' . $dia2;
        if (strlen($mes2) == 1)
            $mes2 = '0' . $mes2;
        //Modifiquem la variable del mï¿œdul segons convingui depenent de l'ï¿œndex enviat
        switch ($index) {
            case 1: //Un festiu sempre
                //Ordenem les dates
                foreach ($festiussempre as $festiu) {
                    $data = mktime(1, 1, 1, substr($festiu, 2, 2), substr($festiu, 0, 2), 2000);
                    $festius[$data] = $festiu;
                }
                //Agefim el nou element a l'array
                $data = mktime(1, 1, 1, $mes1, $dia1, 2000);
                $festius[$data] = $dia1 . $mes1 . '|' . $text;
                //Ordenem l'array que acabem de fabricar segons el seu ï¿œndex
                ksort($festius);
                //Construï¿œm la nova variable del mï¿œdul
                $dada = '$';
                foreach ($festius as $a) {
                    $dada .= '$' . $a . '$';
                }
                //Entrem el valor de la nova variable a la base de dades
                ModUtil::setVar('IWagendas', 'festiussempre', $dada);
                break;
            case 2: //Un festiu d'un dia
                //Ordenem les dates
                foreach ($altresfestius as $festiu) {
                    $data = mktime(1, 1, 1, substr($festiu, 2, 2), substr($festiu, 0, 2), substr($festiu, 4, 4));
                    $festius[$data] = $festiu;
                }
                //Agefim el nou element a l'array
                $data = mktime(1, 1, 1, $mes1, $dia1, $any1);
                $festius[$data] = $dia1 . $mes1 . $any1 . '|' . $text;
                //Ordenem l'array que acabem de fabricar segons el seu ï¿œndex
                ksort($festius);
                //Construï¿œm la nova variable del mï¿œdul
                $dada = '$';
                foreach ($festius as $a) {
                    $dada .= '$' . $a . '$';
                }
                //Entrem el valor de la nova variable a la base de dades
                ModUtil::setVar('IWagendas', 'altresfestius', $dada);
                break;
            case 3: //Un nou perï¿œode
                //Ordenem les dates segons l'inici del perï¿œode
                foreach ($periodes as $periode) {
                    $data = mktime(1, 1, 1, substr($periode, 2, 2), substr($periode, 0, 2), substr($periode, 4, 4));
                    $periode1[$data] = $periode;
                }
                //Agefim el nou element a l'array
                //str_replace('#','',$color);
                $data = mktime(1, 1, 1, $mes1, $dia1, $any1);
                $periode1[$data] = $dia1 . $mes1 . $any1 . $dia2 . $mes2 . $any2 . '|' . $text . $color;
                //Ordenem l'array que acabem de fabricar segons el seu ï¿œndex
                ksort($periode1);
                //Construï¿œm la nova variable del mï¿œdul
                $dada = '$';
                foreach ($periode1 as $a) {
                    $dada .= '$' . $a . '$';
                }
                //Entrem el valor de la nova variable a la base de dades
                ModUtil::setVar('IWagendas', 'periodes', $dada);
                break;
            case 4: //Una icona informativa
                $informacions = explode('$$', substr(ModUtil::getVar('IWagendas', 'informacions'), 0, strlen(ModUtil::getVar('IWagendas', 'informacions')) - 1));
                array_shift($informacions);
                //Ordenem les dates
                foreach ($informacions as $info) {
                    $data = mktime(1, 1, 1, substr($info, 2, 2), substr($info, 0, 2), substr($info, 4, 4));
                    $infos[$data] = $info;
                }
                //Agefim el nou element a l'array
                $data = mktime(1, 1, 1, $mes1, $dia1, $any1);
                $infos[$data] = $dia1 . $mes1 . $any1 . '|' . $text;
                //Ordenem l'array que acabem de fabricar segons el seu ï¿œndex
                ksort($infos);
                //Construï¿œm la nova variable del mï¿œdul
                $dada = '$';
                foreach ($infos as $a) {
                    $dada .= '$' . $a . '$';
                }
                //Entrem el valor de la nova variable a la base de dades
                ModUtil::setVar('IWagendas', 'informacions', $dada);
                break;
        }
        return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
    }

    /**
     * Delete a value
     *
     * @param array $args Value that have to be deleted
     *
     * @return Redirect user to configuration page
     */
    public function esborra($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $index = FormUtil::getPassedValue('index', isset($args['index']) ? $args['index'] : null, 'REQUEST');
        $dada = FormUtil::getPassedValue('dada', isset($args['dada']) ? $args['dada'] : null, 'REQUEST');

        //Check that the value to delete has arrived
        if (empty($dada)) {
            LogUtil::registerError($this->__('Data not found'));
            return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
        }
        //Modifiquem la variable del mï¿œdul segons convingui depenent de l'ï¿œndex enviat
        switch ($index) {
            case 1: //Un festiu sempre
                $festiussempre = explode('$$', substr(ModUtil::getVar('IWagendas', 'festiussempre'), 0, strlen(ModUtil::getVar('IWagendas', 'festiussempre')) - 1));
                array_shift($festiussempre);
                //recorrem l'array i elimimem la dada rebuda
                foreach ($festiussempre as $festiu) {
                    if ($dada != substr($festiu, 0, 4)) {
                        $data = mktime(1, 1, 1, substr($festiu, 2, 2), substr($festiu, 0, 2), 2000);
                        $festius[$data] = $festiu;
                    }
                }
                //Ordenem l'array que acabem de fabricar segons el seu ï¿œndex
                ksort($festius);
                //Construï¿œm la nova variable del mï¿œdul
                $dada = '$';
                foreach ($festius as $a) {
                    $dada .= '$' . $a . '$';
                }
                //Entrem el valor de la nova variable a la base de dades
                ModUtil::setVar('IWagendas', 'festiussempre', $dada);
                break;
            case 2: //Un festiu d'un dia
                $altresfestius = explode('$$', substr(ModUtil::getVar('IWagendas', 'altresfestius'), 0, strlen(ModUtil::getVar('IWagendas', 'altresfestius')) - 1));
                array_shift($altresfestius);
                foreach ($altresfestius as $festiu) {
                    if ($dada != substr($festiu, 0, 8)) {
                        $data = mktime(1, 1, 1, substr($festiu, 2, 2), substr($festiu, 0, 2), substr($festiu, 4, 4));
                        $festius[$data] = $festiu;
                    }
                }
                //Ordenem l'array que acabem de fabricar segons el seu ï¿œndex
                ksort($festius);
                //Construï¿œm la nova variable del mï¿œdul
                $dada = '$';
                foreach ($festius as $a) {
                    $dada .= '$' . $a . '$';
                }
                //Entrem el valor de la nova variable a la base de dades
                ModUtil::setVar('IWagendas', 'altresfestius', $dada);
                break;
            case 3: //Un nou perï¿œode
                $periodes = explode('$$', substr(ModUtil::getVar('IWagendas', 'periodes'), 0, strlen(ModUtil::getVar('IWagendas', 'periodes')) - 1));
                array_shift($periodes);
                foreach ($periodes as $periode) {
                    if ($dada != substr($periode, 0, 16)) {
                        $data = mktime(1, 1, 1, substr($periode, 2, 2), substr($periode, 0, 2), substr($periode, 4, 4));
                        $periode1[$data] = $periode;
                    }
                }
                //Ordenem l'array que acabem de fabricar segons el seu ï¿œndex
                ksort($periode1);
                //Construï¿œm la nova variable del mï¿œdul
                $dada = '$';
                foreach ($periode1 as $a) {
                    $dada .= '$' . $a . '$';
                }
                //Entrem el valor de la nova variable a la base de dades
                ModUtil::setVar('IWagendas', 'periodes', $dada);
                break;
            case 4: //Una icona informativa
                $informacions = explode('$$', substr(ModUtil::getVar('IWagendas', 'informacions'), 0, strlen(ModUtil::getVar('IWagendas', 'informacions')) - 1));
                array_shift($informacions);
                //Ordenem les dates
                foreach ($informacions as $info) {
                    if ($dada != substr($info, 0, 8)) {
                        $data = mktime(1, 1, 1, substr($info, 2, 2), substr($info, 0, 2), substr($info, 4, 4));
                        $infos[$data] = $info;
                    }
                }
                //Ordenem l'array que acabem de fabricar segons el seu ï¿œndex
                ksort($infos);
                //Construï¿œm la nova variable del mï¿œdul
                $dada = '$';
                foreach ($infos as $a) {
                    $dada .= '$' . $a . '$';
                }
                //Entrem el valor de la nova variable a la base de dades
                ModUtil::setVar('IWagendas', 'informacions', $dada);
                break;
        }

        return System::redirect(ModUtil::url('IWagendas', 'admin', 'configura'));
    }

}
