<?php

function IWstats_usersonlineblock_init() {
    pnSecAddSchema("IWstats:usersonlineblock:", "::");
}

function IWstats_usersonlineblock_info() {
    $dom = ZLanguage::getModuleDomain('IWstats');
    return array('text_type' => 'UsersOnLine',
        'func_edit' => 'usersonline_edit',
        'func_update' => 'usersonline_update',
        'module' => 'IWstats',
        'text_type_long' => __('Display the users on line', $dom),
        'allow_multiple' => true,
        'form_content' => false,
        'form_refresh' => false,
        'show_preview' => true);
}

/**
 * Show the list of forms for choosed categories
 * @autor:	Albert Pérez Monfort
 * return:	The list of forms
 */
function IWstats_usersonlineblock_display($blockinfo) {
    // Security check
    if (!pnSecAuthAction(0, "IWstats:usersonlineblock:", "::", ACCESS_READ)) {
        return;
    }

    // Check if the module is available
    if (!pnModAvailable('IWstats')) {
        return;
    }

    $uid = (pnUserLoggedIn()) ? pnUserGetVar('uid') : '-1';

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'usersonlineblock',
        'module' => 'IWstats',
        'uid' => $uid,
        'sv' => $sv));

    //$exists = false;

    if ($exists) {
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $s = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
            'name' => 'usersonlineblock',
            'module' => 'IWstats',
            'sv' => $sv,
            'nult' => true));

        // Create output object
        $pnRender = pnRender::getInstance('IWstats', false);
        $blockinfo['content'] = $s;
        return themesideblock($blockinfo);
    }

    // get block parameters
    $content = unserialize($blockinfo['content']);
    $sessiontime = $content['sessiontime'];
    $refreshtime = $content['refreshtime'];
    $unsee = $content['unsee'];

    $time = time();
    $time0 = $time - $sessiontime * 60;

    $fromDate = date('d-m-Y H:i:s', $time0);
    $toDate = date('d-m-Y H:i:s', $time);
    
    $records = pnModAPIFunc('IWstats', 'user', 'getAllRecords', array('rpp' => -1,
        'init' => -1,
        'fromDate' => $fromDate,
        'toDate' => $toDate,
        'all' => 1,
        'timeIncluded' => 1,
            ));
    
    $users = array();
    $ipArray = array();
    $usersArray = array();
    // get the number of validated users and the number of different Ips detected
    foreach ($records as $record) {
        if (!in_array($record['ip'], $ipArray)) {
            $ipArray[] = $record['ip'];
        }
        if (!array_key_exists($record['uid'], $usersArray) && $record['uid'] > 0) {
            $usersArray[$record['uid']] = array('uid' => $record['uid']);
        }
    }

    $online = count($ipArray) - count($usersArray);

    $seeunames = ($unsee == 1 || $uid > 0) ? 1 : 0;

    if ($seeunames && count($usersArray) > 0) {
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $users = pnModFunc('iw_main', 'user', 'getAllUsersInfo', array('info' => 'ncc',
            'sv' => $sv,
            'fromArray' => $usersArray));
    }
    
    // create output object
    $pnRender = pnRender::getInstance('IWstats', false);
    $pnRender->assign('seeunames', $seeunames);
    $pnRender->assign('users', $users);
    $pnRender->assign('online', $online);
    $pnRender->assign('validated', count($usersArray));
    
    $s = $pnRender->fetch('IWstats_block_usersonline.htm');
    // copy the block information into user vars
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
        'name' => 'usersonlineblock',
        'module' => 'IWstats',
        'sv' => $sv,
        'value' => $s,
        'lifetime' => $refreshtime));
    // Populate block info and pass to theme
    $blockinfo['content'] = $s;
    return themesideblock($blockinfo);
}

function usersonline_update($blockinfo) {
    // Security check
    if (!pnSecAuthAction(0, "IWstats:usersonlineblock:", $blockinfo['url'] . "::", ACCESS_ADMIN)) {
        return;
    }

    // default values in case they are not correct
    $refreshtime = (!is_numeric($blockinfo['refreshtime']) || $blockinfo['refreshtime'] > 100) ? $blockinfo['refreshtime'] : 100;
    $sessiontime = (!is_numeric($blockinfo['sessiontime']) || $blockinfo['sessiontime'] < 10 || $blockinfo['sessiontime'] < 120) ? $blockinfo['sessiontime'] : 100;
    $unsee = ($blockinfo['unsee'] != 1) ? 0 : 1;
    $blockinfo['content'] = serialize(array('refreshtime' => $refreshtime,
        'unsee' => $unsee,
        'sessiontime' => $sessiontime,
            ));

    return $blockinfo;
}

function usersonline_edit($blockinfo) {
    // Security check
    if (!pnSecAuthAction(0, "IWstats:usersonlineblock:", "::", ACCESS_ADMIN)) {
        return;
    }

    $content = unserialize($blockinfo['content']);

    $refreshtime = (!isset($content['refreshtime'])) ? 100 : $content['refreshtime'];
    $sessiontime = (!isset($content['sessiontime'])) ? 100 : $content['sessiontime'];
    $unsee = (!isset($content['unsee'])) ? 0 : $content['unsee'];

    // create output object
    $pnRender = pnRender::getInstance('IWstats', false);
    $pnRender->assign('refreshtime', $refreshtime);
    $pnRender->assign('sessiontime', $sessiontime);
    $pnRender->assign('unsee', $unsee);
    return $pnRender->fetch('IWstats_block_editusersonline.htm');
}