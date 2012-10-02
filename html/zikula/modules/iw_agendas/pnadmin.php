<?php

/**
 * Admin main page
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return		List of the agendas available
 */
function iw_agendas_admin_main() {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    // Get the info about the shared agendas
    $agendas = pnModAPIFunc('iw_agendas', 'user', 'getAllAgendas', array('onlyShared' => 1));
    //get all groups information
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
    //get all users information
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('sv' => $sv,
        'info' => 'ncc'));
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
    // Create output object
    $pnRender = pnRender::getInstance('iw_agendas', false);
    $pnRender->assign('agendas', $agendasArray);
    return $pnRender->fetch('iw_agendas_admin_main.htm');
}

/**
 * Show the module information
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_agendas_admin_module() {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    // Create output object
    $pnRender = pnRender::getInstance('iw_agendas', false);
    $module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_agendas', 'type' => 'admin'));
    $pnRender->assign('module', $module);
    return $pnRender->fetch('iw_agendas_admin_module.htm');
}

/**
 * get the characteristics content of an agenda
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	The agenda identity
 * @return	The agenda information
 */
function iw_agendas_admin_getCharsContent($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //Get field information
    $item = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $daid));
    if ($item == false) {
        LogUtil::registerError(__('The agenda was not found', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    return $item;
}

/**
 * Show the form needed to create a new agenda
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return	The creation form
 */
function iw_agendas_admin_new() {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    $nomcamp = array(__('Nota name', $dom),
        __('Secondary field', $dom) . ' 1',
        __('Secondary field', $dom) . ' 2',
        __('Secondary field', $dom) . ' 3',
        __('Secondary field', $dom) . ' 4',
        __('Secondary field', $dom) . ' 5');
    //Define the possible types of fields
    $camps0 = array(array('id' => 1,
            'name' => __('Text', $dom)),
        array('id' => 2,
            'name' => __('Text area', $dom)));
    $camps1 = array(array('id' => 1,
            'name' => __('Text', $dom)),
        array('id' => 2,
            'name' => __('Text area', $dom)),
        array('id' => 3,
            'name' => __('Event author', $dom)),
        array('id' => 4,
            'name' => __('Event date', $dom)),
        array('id' => 5,
            'name' => __('Selection', $dom)));
    // Create output object
    $pnRender = pnRender::getInstance('iw_agendas', false);
    for ($i = 0; $i < 6; $i++) {
        $camps = ($i == 0) ? $camps0 : $camps1;
        $fielsArray[] = array('nomcamp' => $nomcamp[$i],
            'camps' => $camps,
            'order' => $i + 1);
    }
    $pnRender->assign('fields', $fielsArray);
    return $pnRender->fetch('iw_agendas_admin_new.htm');
}

/**
 * Get the information from the form of creation of an agenda
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	Array with the information from the form
 * @return	redirect the user to main page
 */
function iw_agendas_admin_create($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
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
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'main'));
    }
    // Needed argument
    if (!isset($nom_agenda) || $nom_agenda == '') {
        LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    //if field type is different to list set list options as ''
    if ($tc2 != 5) {
        $op2 = '';
    }
    if ($tc3 != 5) {
        $op3 = '';
    }
    if ($tc4 != 5) {
        $op4 = '';
    }
    if ($tc5 != 5) {
        $op5 = '';
    }
    if ($tc6 != 5) {
        $op6 = '';
    }
    //Check if defined agenda's field are consecutive
    for ($i = 1; $i < 7; $i++) {
        $c = 'c' . $i;
        if (empty($$c)) {
            $buit = true;
        } else {
            if ($buit) {
                LogUtil::registerError(__('Defined fields must be consecutive', $dom));
                return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
            }
            $buit = false;
        }
    }
    //Update the agenda
    $lid = pnModAPIFunc('iw_agendas', 'admin', 'create', array('nom_agenda' => $nom_agenda,
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
        LogUtil::registerStatus(__('New agenda created', $dom));
    }
    //redirect the user to main page
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
}

/**
 * delete an agenda
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	Array with the identity of the agenda
 * @return	redirect the user to main page
 */
function iw_agendas_admin_delete($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
    $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //Get item
    $item = pnModAPIFunc('iw_agendas', 'user', 'getagenda', array('daid' => $daid));
    if ($item == false) {
        LogUtil::registerError(__('The agenda was not found', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    if (!$confirm) {
        // Create output object
        $pnRender = pnRender::getInstance('iw_agendas', false);
        $pnRender->assign('item', $item);
        return $pnRender->fetch('iw_agendas_admin_delete.htm');
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'main'));
    }
    if (pnModAPIFunc('iw_agendas', 'admin', 'delete', array('daid' => $daid))) {
        //Success
        LogUtil::registerStatus(__('The agenda has been deleted', $dom));
    }
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
}

/**
 * Show the form needed to edit an agenda
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	array with the identity of the agenda
 * @return	The creation form
 */
function iw_agendas_admin_edit($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'GET');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //Get field information
    $item = pnModAPIFunc('iw_agendas', 'user', 'getAgenda', array('daid' => $daid));
    if ($item == false) {
        LogUtil::registerError(__('The agenda was not found', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    $nomcamp = array(__('Nota name', $dom),
        __('Secondary field', $dom) . ' 1',
        __('Secondary field', $dom) . ' 2',
        __('Secondary field', $dom) . ' 3',
        __('Secondary field', $dom) . ' 4',
        __('Secondary field', $dom) . ' 5');
    //Define the possible types of fields
    $camps0 = array(array('id' => 1,
            'name' => __('Text', $dom)),
        array('id' => 2,
            'name' => __('Text area', $dom)));
    $camps1 = array(array('id' => 1,
            'name' => __('Text', $dom)),
        array('id' => 2,
            'name' => __('Text area', $dom)),
        array('id' => 3,
            'name' => __('Event author', $dom)),
        array('id' => 4,
            'name' => __('Event date', $dom)),
        array('id' => 5,
            'name' => __('Selection', $dom)));
    $msgUsers = pnModGetVar('iw_agendas', 'msgUsersDefault');
    $msgUsersResp = pnModGetVar('iw_agendas', 'msgUsersRespDefault');
    // Create output object
    $pnRender = pnRender::getInstance('iw_agendas', false);
    $pnRender->assign('msgUsers', $msgUsers);
    $pnRender->assign('msgUsersResp', $msgUsersResp);
    for ($i = 0; $i < 6; $i++) {
        $camps = ($i == 0) ? $camps0 : $camps1;
        $j = $i + 1;
        $fielsArray[] = array('nomcamp' => $nomcamp[$i],
            'camps' => $camps,
            'order' => $i + 1,
            'value' => $item['c' . $j],
            'type' => $item['tc' . $j],
            'option' => $item['op' . $j]);
    }
    $pnRender->assign('fields', $fielsArray);
    $pnRender->assign('item', $item);
    return $pnRender->fetch('iw_agendas_admin_edit.htm');
}

/**
 * Check the information of an edited agenda 
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	array with the information of the agenda
 * @return	Redirect user to main admin page
 */
function iw_agendas_admin_update($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
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
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'main'));
    }
    // Needed argument
    if (!isset($nom_agenda) || $nom_agenda == '') {
        LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    //if field type is different to list set list options as ''
    if ($tc2 != 5) {
        $op2 = '';
    }
    if ($tc3 != 5) {
        $op3 = '';
    }
    if ($tc4 != 5) {
        $op4 = '';
    }
    if ($tc5 != 5) {
        $op5 = '';
    }
    if ($tc6 != 5) {
        $op6 = '';
    }
    //Check if defined agenda's field are consecutive
    for ($i = 1; $i < 7; $i++) {
        $c = 'c' . $i;
        if (empty($$c)) {
            $buit = true;
        } else {
            if ($buit) {
                LogUtil::registerError(__('Defined fields must be consecutive', $dom));
                return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
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
    $lid = pnModAPIFunc('iw_agendas', 'admin', 'editAgenda', array('daid' => $daid,
        'items' => $items));
    if ($lid != false) {
        LogUtil::registerStatus(__('Agenda updated', $dom));
    }
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
}

/**
 * Add a group with access to the agenda
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	array with the group identity
 * @return	Redirect user to main admin page
 */
function iw_agendas_admin_addGroup($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
    $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
    $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
    $accessType = FormUtil::getPassedValue('accessType', isset($args['accessType']) ? $args['accessType'] : null, 'POST');
    $msgUsers = FormUtil::getPassedValue('msgUsers', isset($args['msgUsers']) ? $args['msgUsers'] : pnModGetVar('iw_agendas', 'msgUsersDefault'), 'POST');
    $msgUsersDefault = FormUtil::getPassedValue('msgUsersDefault', isset($args['msgUsersDefault']) ? $args['msgUsersDefault'] : null, 'POST');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //Get item
    $item = pnModAPIFunc('iw_agendas', 'user', 'getagenda', array('daid' => $daid));
    if ($item == false) {
        LogUtil::registerError(__('The agenda was not found', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    if (!$confirm || $group == 0) {
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
            'less' => pnModGetVar('iw_myrole', 'rolegroup')));
        // Create output object
        $pnRender = pnRender::getInstance('iw_agendas', false);
        //check if iwmessages module is active
        $modid = pnModGetIDFromName('iw_messages');
        $modinfo = pnModGetInfo($modid);
        if ($modinfo['state'] == 3) {
            $pnRender->assign('messagesActive', true);
        }
        $pnRender->assign('msgUsers', $msgUsers);
        $pnRender->assign('groups', $groups);
        $pnRender->assign('item', $item);
        return $pnRender->fetch('iw_agendas_admin_addGroup.htm');
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'main'));
    }
    // Needed argument
    if (!isset($group) || !is_numeric($group) || $group == 0) {
        LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    if ($group == '-1') {
        $accessType = 1;
        $msgUsersDefault = '';
    }
    $groupString = ($item['grup'] == '') ? '$' : $item['grup'];
    $groupString .= '$' . $group . '|' . $accessType . '$';
    $items = array('grup' => $groupString);
    //add the group in database and send automatic message if it is necessary
    if (pnModAPIFunc('iw_agendas', 'admin', 'editAgenda', array('daid' => $daid,
                'items' => $items))) {
        if ($msgUsersDefault) {
            pnModSetVar('iw_agendas', 'msgUsersDefault', $msgUsers);
        }
        //Success
        LogUtil::registerStatus(__('A group has been added', $dom));
        //check if iwmessages module is active
        $modid = pnModGetIDFromName('iw_messages');
        $modinfo = pnModGetInfo($modid);
        if ($modinfo['state'] == 3) {
            //Send a private mail to users with access to the agenda
            if ($msgUsers != '' && $item['activa']) {
                //Get members of the group
                $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
                $members = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
                    'gid' => $group));
                foreach ($members as $member) {
                    pnModApiFunc('iw_messages', 'user', 'create', array('to_userid' => $member['id'],
                        'subject' => __('Agendas module - Automatic message', $dom),
                        'message' => $msgUsers));
                }
            }
        }
    }
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
}

/**
 * Add a manager in the agenda
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	array with the manager identity
 * @return	Redirect user to main admin page
 */
function iw_agendas_admin_addManager($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
    $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : null, 'POST');
    $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
    $msgUsersResp = FormUtil::getPassedValue('msgUsersResp', isset($args['msgUsersResp']) ? $args['msgUsersResp'] : pnModGetVar('iw_agendas', 'msgUsersRespDefault'), 'POST');
    $msgUsersRespDefault = FormUtil::getPassedValue('msgUsersRespDefault', isset($args['msgUsersRespDefault']) ? $args['msgUsersRespDefault'] : null, 'POST');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //Get item
    $item = pnModAPIFunc('iw_agendas', 'user', 'getagenda', array('daid' => $daid));
    if ($item == false) {
        LogUtil::registerError(__('The agenda was not found', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    $confirm = (!isset($uid) || !is_numeric($uid) || $uid == 0) ? 0 : 1;
    if (!$confirm) {
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $groups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
            'plus' => __('Choose a group...', $dom),
            'less' => pnModGetVar('iw_myrole', 'rolegroup')));
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $groupMembers = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv,
            'gid' => $group));
        // Create output object
        $pnRender = pnRender::getInstance('iw_agendas', false);
        //check if iwmessages module is active
        $modid = pnModGetIDFromName('iw_messages');
        $modinfo = pnModGetInfo($modid);
        if ($modinfo['state'] == 3) {
            $pnRender->assign('messagesActive', true);
        }
        $pnRender->assign('msgUsersResp', $msgUsersResp);
        $pnRender->assign('groupselect', $group);
        $pnRender->assign('groups', $groups);
        $pnRender->assign('groupMembers', $groupMembers);
        $pnRender->assign('item', $item);
        return $pnRender->fetch('iw_agendas_admin_addManager.htm');
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'main'));
    }
    // Needed argument
    if (!isset($uid) || !is_numeric($uid) || $uid == 0) {
        LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    $respString = ($item['resp'] == '') ? '$' : $item['resp'];
    $respString .= '$' . $uid . '$';
    $items = array('resp' => $respString);
    //add the group in database and send automatic message if it is necessary
    if (pnModAPIFunc('iw_agendas', 'admin', 'editAgenda', array('daid' => $daid,
                'items' => $items))) {
        if ($msgUsersRespDefault) {
            pnModSetVar('iw_agendas', 'msgUsersRespDefault', $msgUsersResp);
        }
        //Success
        LogUtil::registerStatus(__('A manager has been added', $dom));
        //check if iwmessages module is active
        $modid = pnModGetIDFromName('iw_messages');
        $modinfo = pnModGetInfo($modid);
        if ($modinfo['state'] == 3) {
            //Send a private mail to users with access to the agenda
            if ($msgUsersResp != '' && $item['activa']) {
                pnModApiFunc('iw_messages', 'user', 'create', array('to_userid' => $uid,
                    'subject' => __('Agendas module - Automatic message', $dom),
                    'message' => $msgUsersResp));
            }
        }
    }
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
}

/**
 * Delete a group with access to the agenda
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	the information of the group that have to be deleted
 * @return	Redirect user to main admin page
 */
function iw_agendas_admin_deleteGroup($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
    $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
    $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //Get item
    $item = pnModAPIFunc('iw_agendas', 'user', 'getagenda', array('daid' => $daid));
    if ($item == false) {
        LogUtil::registerError(__('The agenda was not found', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    if (!$confirm) {
        //gets the group name
        $vals = explode('|', $id);
        //get all groups information
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $groupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));
        $groupName = $groupsInfo[$vals[0]];
        // Create output object
        $pnRender = pnRender::getInstance('iw_agendas', false);
        $pnRender->assign('groupName', $groupName);
        $pnRender->assign('item', $item);
        $pnRender->assign('id', $id);
        return $pnRender->fetch('iw_agendas_admin_deleteGroup.htm');
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'main'));
    }
    // Needed argument
    if (!isset($id) || $id == '') {
        LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    $groupString = str_replace('$' . $id . '$', '', $item['grup']);
    $items = array('grup' => $groupString);
    if (pnModAPIFunc('iw_agendas', 'admin', 'editAgenda', array('daid' => $daid,
                'items' => $items))) {
        //Success
        LogUtil::registerStatus(__('A group has been deleted', $dom));
    }
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
}

/**
 * Delete a manager of the agenda
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param	the information of the manager who is going to be deleted
 * @return	Redirect user to main admin page
 */
function iw_agendas_admin_deleteManager($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
    $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : null, 'POST');
    $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'REQUEST');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //Get item
    $item = pnModAPIFunc('iw_agendas', 'user', 'getagenda', array('daid' => $daid));
    if ($item == false) {
        LogUtil::registerError(__('The agenda was not found', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    if (!$confirm) {
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $userName = pnModFunc('iw_main', 'user', 'getUserInfo', array('sv' => $sv,
            'uid' => $id,
            'info' => 'ncc'));
        // Create output object
        $pnRender = pnRender::getInstance('iw_agendas', false);
        $pnRender->assign('userName', $userName);
        $pnRender->assign('item', $item);
        $pnRender->assign('id', $id);
        return $pnRender->fetch('iw_agendas_admin_deleteManager.htm');
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'main'));
    }
    // Needed argument
    if (!isset($id) || $id == '') {
        LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    $respString = str_replace('$' . $id . '$', '', $item['resp']);
    $items = array('resp' => $respString);
    if (pnModAPIFunc('iw_agendas', 'admin', 'editAgenda', array('daid' => $daid,
                'items' => $items))) {
        //Success
        LogUtil::registerStatus(__('A manager has been deleted', $dom));
    }
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
}

/**
 * Modify the configuration of the agenda
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return	page settings
 */
function iw_agendas_admin_configura() {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //memoritzem en un array els noms dels mesos de l'any
    $nom_mes = array(__('January', $dom), __('February', $dom), __('March', $dom), __('April', $dom), __('May', $dom), __('June', $dom), __('July', $dom), __('August', $dom), __('September', $dom), __('October', $dom), __('November', $dom), __('December', $dom));
    //Memoritzem un array amb els dies de la setmana
    $day_names_abbr = array(__('Mo', $dom), __('Tu', $dom), __('We', $dom), __('Th', $dom), __('Fr', $dom), __('Sa', $dom), __('Su', $dom));
    //Set mounhts and colours configuration into arrays
    $nom_mes_article = array(__('January of', $dom), __('February of', $dom), __('March of', $dom), __('April of', $dom), __('May of', $dom), __('June of', $dom), __('July of', $dom), __('August of', $dom), __('September of', $dom), __('October of', $dom), __('November of', $dom), __('December of', $dom));
    $confcolors = array(__('Title background', $dom), __('Month link background', $dom), __('Header background', $dom), __('Header text', $dom), __('Table background', $dom), __('Days link', $dom), __('Bank holidays link', $dom), __('Table border', $dom), __('Bank holidays background', $dom), __('Working days background', $dom), __('Present day background', $dom), __('New events background', $dom), __('Seen events background', $dom), __('Text background', $dom), __('Completed background', $dom), __('Text', $dom));
    //get the configuration dates
    $inicicurs = pnModGetVar('iw_agendas', 'inicicurs');
    $calendariescolar = pnModGetVar('iw_agendas', 'calendariescolar');
    $comentaris = pnModGetVar('iw_agendas', 'comentaris');
    $llegenda = pnModGetVar('iw_agendas', 'llegenda');
    $infos = pnModGetVar('iw_agendas', 'infos');
    $vista = pnModGetVar('iw_agendas', 'vista');
    $colorsconf = pnModGetVar('iw_agendas', 'colors');
    $maxnotes = pnModGetVar('iw_agendas', 'maxnotes');
    $adjuntspersonals = pnModGetVar('iw_agendas', 'adjuntspersonals');
    $caducadies = pnModGetVar('iw_agendas', 'caducadies');
    $urladjunts = pnModGetVar('iw_agendas', 'urladjunts');
    $allowGCalendar = pnModGetVar('iw_agendas', 'allowGCalendar');
    $zendGdataFuncAvailable = pnModFunc('iw_agendas', 'user', 'getGdataFunctionsAvailability');
    if ($vista == -1) {
        $vista = 0;
    }
    //Creem matrius per a les diferents dades de configuraciï¿œ
    $festiussempre = explode('$$', substr(pnModGetVar('iw_agendas', 'festiussempre'), 0, strlen(pnModGetVar('iw_agendas', 'festiussempre')) - 1));
    array_shift($festiussempre);
    foreach ($festiussempre as $festiu) {
        $dia = substr($festiu, 0, 2);
        if (substr($dia, 0, 1) == '0') {
            $dia = substr($dia, 1, 1);
        }
        $mes = $nom_mes_article[substr($festiu, 2, 2) - 1];
        $festiussempreArray[] = array('date' => $dia . ' ' . substr($mes, 0, strlen($mes) - 3),
            'label' => substr($festiu, 5),
            'optionText' => substr($festiu, 0, 2) . substr($festiu, 2, 2),
            'festiu' => $festiu);
    }
    $altresfestius = explode('$$', substr(pnModGetVar('iw_agendas', 'altresfestius'), 0, strlen(pnModGetVar('iw_agendas', 'altresfestius')) - 1));
    array_shift($altresfestius);
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
    $informacions = explode('$$', substr(pnModGetVar('iw_agendas', 'informacions'), 0, strlen(pnModGetVar('iw_agendas', 'informacions')) - 1));
    array_shift($informacions);
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
    $periodes = explode('$$', substr(pnModGetVar('iw_agendas', 'periodes'), 0, strlen(pnModGetVar('iw_agendas', 'periodes')) - 1));
    array_shift($periodes);
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
        $month = pnVarPrepForOS($_REQUEST['mes']);
        $year = pnVarPrepForOS($_REQUEST['any']);
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
        $days[$i]['label'] = __('There are no events on this date', $dom);
        // Check whether it's a non-working day
        $festiu = pnModFunc('iw_agendas', 'user', 'festiu', array('dia' => $i, 'mes' => $month, 'any' => $year));
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
        $information = pnModFunc('iw_agendas', 'user', 'info', array('dia' => $i, 'mes' => $month, 'any' => $year));
        if ($information != '') {
            $days[$i]['info'] = $information;
        }
        // Build the date to be shown in the caption of the popup window
        $days[$i]['caption'] = $day_names[$day_of_the_week - 1] . "&nbsp;&nbsp;$i/$month/$year";
    }
    $directoriroot = pnModGetVar('iw_main', 'documentRoot');
    // Create output object
    $pnRender = pnRender::getInstance('iw_agendas', false);
    if (!file_exists($directoriroot . '/' . $urladjunts) || $urladjunts == '') {
        $pnRender->assign('noFolder', true);
    } else {
        if (!is_writeable($directoriroot . '/' . $urladjunts)) {
            $pnRender->assign('noWriteable', true);
        }
    }
    $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
    $pnRender->assign('multizk', $multizk);
    $pnRender->assign('directoriroot', $directoriroot);
    $pnRender->assign('vista', $vista);
    $pnRender->assign('maxnotes', $maxnotes);
    $pnRender->assign('adjuntspersonals', $adjuntspersonals);
    $pnRender->assign('caducadies', $caducadies);
    $pnRender->assign('urladjunts', $urladjunts);
    $pnRender->assign('festiussempre', $festiussempreArray);
    $pnRender->assign('altresfestius', $altresfestiusArray);
    $pnRender->assign('confcolors', $confcolors);
    $pnRender->assign('colors', $colors);
    $pnRender->assign('month_name', $nom_mes[(int) date('m') - 1]);
    $pnRender->assign('year', date('Y'));
    $pnRender->assign('day_names_abbr', $day_names_abbr);
    $pnRender->assign('days', $days);
    $pnRender->assign('zendGdataFuncAvailable', $zendGdataFuncAvailable);
    $pnRender->assign('allowGCalendar', $allowGCalendar);
    // Pass the data to the template
    $pnRender->assign('first_day', $first_day);
    $pnRender->assign('days_month', $days_month);
    if (checkdate(1, 1, $inicicurs)) {
        $pnRender->assign('inicicurs', $inicicurs);
        $pnRender->assign('inicicurs1', $inicicurs + 1);
    } else {
        return $pnRender->fetch('iw_agendas_admin_conf.htm');
    }
    $pnRender->assign('calendariescolar', $calendariescolar);
    $pnRender->assign('periodes', $periodesArray);
    $pnRender->assign('informacions', $informacionsArray);
    $pnRender->assign('comentaris', $comentaris);
    $pnRender->assign('llegenda', $llegenda);
    $pnRender->assign('infos', $infos);
    return $pnRender->fetch('iw_agendas_admin_conf.htm');
}

/**
 * Update the module vars
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	Module vars values
 * @return	Redirect user to configuration page
 */
function iw_agendas_admin_conf_modifica($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
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
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'main'));
    }
    if ($submit == __('Restore', $dom)) {
        $posa_colors = "DBD4A6|555555|FFCC66|FFFFFF|E1EBFF|669ACC|FFFFFF|FFFFFF|FF8484|FFFFFF|DBD4A6|66FF66|3F6F3E|FFFFCC|BBBBBB|000000";
    } else {
        foreach ($colors as $color) {
            $posa_colors .= $color . '|';
        }
    }
    if (!checkdate(1, 1, $inici)) {
        LogUtil::registerError(__('Date given as initial year is incorrect', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'main'));
    }
    //Set the values of the module vars
    pnModSetVar('iw_agendas', 'inicicurs', $inici);
    pnModSetVar('iw_agendas', 'calendariescolar', $ce);
    pnModSetVar('iw_agendas', 'comentaris', $comentaris);
    pnModSetVar('iw_agendas', 'llegenda', $llegenda);
    pnModSetVar('iw_agendas', 'infos', $infos);
    if (!isset($vista)) {
        $vista = -1;
    }
    pnModSetVar('iw_agendas', 'vista', $vista);
    pnModSetVar('iw_agendas', 'colors', $posa_colors);
    pnModSetVar('iw_agendas', 'maxnotes', $maxnotes);
    pnModSetVar('iw_agendas', 'adjuntspersonals', $adjuntspersonals);
    pnModSetVar('iw_agendas', 'caducadies', $caducadies);
    pnModSetVar('iw_agendas', 'urladjunts', $urladjunts);
    pnModSetVar('iw_agendas', 'allowGCalendar', $allowGCalendar);
    LogUtil::registerStatus(__('Agenda configuration updated', $dom));
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
}

/**
 * Output a form necessary to create a new element
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	index of the element to create
 * @return	Redirect user to form page
 */
function iw_agendas_admin_nouallista($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
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
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
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
            'name' => __('January', $dom)),
        array('id' => 2,
            'name' => __('February', $dom)),
        array('id' => 3,
            'name' => __('March', $dom)),
        array('id' => 4,
            'name' => __('April', $dom)),
        array('id' => 5,
            'name' => __('May', $dom)),
        array('id' => 6,
            'name' => __('June', $dom)),
        array('id' => 7,
            'name' => __('July', $dom)),
        array('id' => 8,
            'name' => __('August', $dom)),
        array('id' => 9,
            'name' => __('September', $dom)),
        array('id' => 10,
            'name' => __('October', $dom)),
        array('id' => 11,
            'name' => __('November', $dom)),
        array('id' => 12,
            'name' => __('December', $dom)));
    //Omplim un multiselect amb els anys disponibles. Sï¿œn l'any donat com d'inici del curs i l'any segï¿œent
    $anys_MS[] = array('id' => pnModGetVar('iw_agendas', 'inicicurs'),
        'name' => pnModGetVar('iw_agendas', 'inicicurs'));
    $anys_MS[] = array('id' => pnModGetVar('iw_agendas', 'inicicurs') + 1,
        'name' => pnModGetVar('iw_agendas', 'inicicurs') + 1);
    switch ($index) {
        case 1:
            $title = __('Create a new bank holiday repeated every year', $dom);
            $title1 = __('Date of bank holiday repeated every year', $dom);
            break;
        case 2:
            $title = __('Create a bank holiday', $dom);
            $title1 = __('Bank holiday', $dom);
            break;
        case 3:
            $title = __('Create a new period', $dom);
            $title1 = __('Date of the beginning of the period', $dom);
            break;
        case 4:
            $title = __('Create a new information icon', $dom);
            $title1 = __('Date to show the information icon', $dom);
            break;
    }
    // Create output object
    $pnRender = pnRender::getInstance('iw_agendas', false);
    $pnRender->assign('title', $title);
    $pnRender->assign('title1', $title1);
    $pnRender->assign('index', $index);
    $pnRender->assign('dada', $dada);
    $pnRender->assign('dies_MS', $dies_MS);
    $pnRender->assign('mesos_MS', $mesos_MS);
    $pnRender->assign('anys_MS', $anys_MS);
    $pnRender->assign('dia1', $dia1);
    $pnRender->assign('dia2', $dia2);
    $pnRender->assign('mes1', $mes1);
    $pnRender->assign('mes2', $mes2);
    $pnRender->assign('any1', $any1);
    $pnRender->assign('any2', $any2);
    $pnRender->assign('text', $text);
    $pnRender->assign('color', $color);
    return $pnRender->fetch('iw_agendas_admin_newElement.htm');
}

/**
 * Get the values from the form and chenge them
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	index of the element to create
 * @return	Redirect user to configuration page
 */
function iw_agendas_admin_modifica_llistes($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
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
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //if the entry is from a edit action delete the parameters edited in the list
    if (isset($dada) && $dada != "") {
        $dada = str_replace('$', '#', $dada);
        $dada = '$' . $dada . '$';
        switch ($index) {
            case '1':
                $festiussempre = pnModGetVar('iw_agendas', 'festiussempre');
                $festiussempre = str_replace($dada, '', $festiussempre);
                pnModSetVar('iw_agendas', 'festiussempre', $festiussempre);
                break;
            case '2':
                $altresfestius = pnModGetVar('iw_agendas', 'altresfestius');
                $altresfestius = str_replace($dada, '', $altresfestius);
                pnModSetVar('iw_agendas', 'altresfestius', $altresfestius);
                break;
            case '3':
                $periodes = pnModGetVar('iw_agendas', 'periodes');
                $periodes = str_replace($dada, '', $periodes);
                pnModSetVar('iw_agendas', 'periodes', $periodes);
                break;
            case '4':
                $informacions = pnModGetVar('iw_agendas', 'informacions');
                $informacions = str_replace($dada, '', $informacions);
                pnModSetVar('iw_agendas', 'informacions', $informacions);
                break;
        }
        $dada = '';
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_agendas', 'admin', 'configura'));
    }
    //Check needed arguments
    if (empty($text)) {
        LogUtil::registerError(__('Label text is empty', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
    }
    //check the first date
    if ($index == 1) {
        $any1 = date('Y');
    }
    if (!checkdate($mes1, $dia1, $any1)) {
        LogUtil::registerError(__('Incorrect date', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
    }
    //Check if dates of holadays are repeated
    if ($index == 1 || $index == 2) {
        //Comprovem que la data del festiu ï¿œs ï¿œnica
        $festiussempre = explode('$$', substr(pnModGetVar('iw_agendas', 'festiussempre'), 0, strlen(pnModGetVar('iw_agendas', 'festiussempre')) - 1));
        array_shift($festiussempre);
        $altresfestius = explode('$$', substr(pnModGetVar('iw_agendas', 'altresfestius'), 0, strlen(pnModGetVar('iw_agendas', 'altresfestius')) - 1));
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
            LogUtil::registerError(__('Date repeated. Only one date per bank holiday allowed', $dom));
            return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
        }
    }
    //if we are defining a period check the second date
    if ($index == 3) {
        if (!checkdate($mes2, $dia2, $any2)) {
            LogUtil::registerError(__('Incorrect date', $dom));
            return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
        }
        //Check if period is correct
        if (mktime(1, 1, 1, $mes1, $dia1, $any1) >= mktime(1, 1, 1, $mes2, $dia2, $any2)) {
            LogUtil::registerError(__('Incorrect selected period', $dom));
            return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
        }
        //Check that period didn't over other period
        $periodes = explode('$$', substr(pnModGetVar('iw_agendas', 'periodes'), 0, strlen(pnModGetVar('iw_agendas', 'periodes')) - 1));
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
            LogUtil::registerError(__('Incorrect selected colour for the period ', $dom));
            return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
        }
    }
    //preparem les dates per posar-les en les variable
    if (strlen($dia1) == 1) {
        $dia1 = '0' . $dia1;
    }
    if (strlen($mes1) == 1) {
        $mes1 = '0' . $mes1;
    }
    if (strlen($dia2) == 1) {
        $dia2 = '0' . $dia2;
    }
    if (strlen($mes2) == 1) {
        $mes2 = '0' . $mes2;
    }
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
            pnModSetVar('iw_agendas', 'festiussempre', $dada);
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
            pnModSetVar('iw_agendas', 'altresfestius', $dada);
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
            pnModSetVar('iw_agendas', 'periodes', $dada);
            break;
        case 4: //Una icona informativa
            $informacions = explode('$$', substr(pnModGetVar('iw_agendas', 'informacions'), 0, strlen(pnModGetVar('iw_agendas', 'informacions')) - 1));
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
            pnModSetVar('iw_agendas', 'informacions', $dada);
            break;
    }
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
}

/**
 * Delete a value
 * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param	value that have to be deleted
 * @return	Redirect user to configuration page
 */
function iw_agendas_admin_esborra($args) {
    $dom = ZLanguage::getModuleDomain('iw_agendas');
    $index = FormUtil::getPassedValue('index', isset($args['index']) ? $args['index'] : null, 'REQUEST');
    $dada = FormUtil::getPassedValue('dada', isset($args['dada']) ? $args['dada'] : null, 'REQUEST');
    // Security check
    if (!SecurityUtil::checkPermission('iw_agendas::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }
    //Check that the value to delete has arrived
    if (empty($dada)) {
        LogUtil::registerError(__('Data not found', $dom));
        return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
    }
    //Modifiquem la variable del mï¿œdul segons convingui depenent de l'ï¿œndex enviat
    switch ($index) {
        case 1: //Un festiu sempre
            $festiussempre = explode('$$', substr(pnModGetVar('iw_agendas', 'festiussempre'), 0, strlen(pnModGetVar('iw_agendas', 'festiussempre')) - 1));
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
            pnModSetVar('iw_agendas', 'festiussempre', $dada);
            break;
        case 2: //Un festiu d'un dia
            $altresfestius = explode('$$', substr(pnModGetVar('iw_agendas', 'altresfestius'), 0, strlen(pnModGetVar('iw_agendas', 'altresfestius')) - 1));
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
            pnModSetVar('iw_agendas', 'altresfestius', $dada);
            break;
        case 3: //Un nou perï¿œode
            $periodes = explode('$$', substr(pnModGetVar('iw_agendas', 'periodes'), 0, strlen(pnModGetVar('iw_agendas', 'periodes')) - 1));
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
            pnModSetVar('iw_agendas', 'periodes', $dada);
            break;
        case 4: //Una icona informativa
            $informacions = explode('$$', substr(pnModGetVar('iw_agendas', 'informacions'), 0, strlen(pnModGetVar('iw_agendas', 'informacions')) - 1));
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
            pnModSetVar('iw_agendas', 'informacions', $dada);
            break;
    }
    return pnRedirect(pnModURL('iw_agendas', 'admin', 'configura'));
}