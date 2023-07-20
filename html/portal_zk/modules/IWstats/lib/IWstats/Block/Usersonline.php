<?php

class IWstats_Block_Usersonline extends Zikula_Controller_AbstractBlock {

    public function init() {
        SecurityUtil::registerPermissionSchema("IWstats:usersonlineblock:", "::");
    }

    public function info() {
        return array('text_type' => 'UsersOnLine',
            'module' => 'IWstats',
            'text_type_long' => $this->__('Display the users on line'),
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
    public function display($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWstats:usersonlineblock:", "::", ACCESS_READ)) {
            return;
        }

        // Check if the module is available
        if (!ModUtil::available('IWstats')) {
            return;
        }

        $uid = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : '-1';

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'usersonlineblock',
                    'module' => 'IWstats',
                    'uid' => $uid,
                    'sv' => $sv));

        //$exists = false;

        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'usersonlineblock',
                        'module' => 'IWstats',
                        'sv' => $sv,
                        'nult' => true));

            // Create output object
            $view = Zikula_View::getInstance('IWstats', false);
            $blockinfo['content'] = $s;
            return BlockUtil::themesideblock($blockinfo);
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

        $records = ModUtil::apiFunc('IWstats', 'user', 'getAllRecords', array('rpp' => -1,
                    'init' => -1,
                    'fromDate' => $fromDate,
                    'toDate' => $toDate,
                    'all' => 1,
                    'timeIncluded' => 1,
                ));

        $users = array();
        $ipArray = array();
        $usersArray = array();
        $usersList = '';

        // get the number of validated users and the number of different Ips detected
        foreach ($records as $record) {
            if (!in_array($record['ip'], $ipArray)) {
                $ipArray[] = $record['ip'];
            }
            if (!in_array($record['uid'], $usersArray) && $record['uid'] > 0) {
                $usersArray[] = $record['uid'];
                $usersList .= $record['uid'] . '$$';
            }
        }

        $online = count($ipArray) - count($usersArray);

        $seeunames = ($unsee == 1 || $uid > 0) ? 1 : 0;

        if ($seeunames && count($usersArray) > 0) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ncc',
                        'sv' => $sv,
                        'list' => $usersList));
        }

        // create output object
        $view = Zikula_View::getInstance('IWstats', false);
        $view->assign('seeunames', $seeunames);
        $view->assign('users', $users);
        $view->assign('online', $online);
        $view->assign('validated', count($usersArray));

        $s = $view->fetch('IWstats_block_usersonline.htm');
        // copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
            'name' => 'usersonlineblock',
            'module' => 'IWstats',
            'sv' => $sv,
            'value' => $s,
            'lifetime' => $refreshtime));
        // Populate block info and pass to theme
        $blockinfo['content'] = $s;
        return BlockUtil::themesideblock($blockinfo);
    }

    function update($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWstats:usersonlineblock:", "::", ACCESS_ADMIN)) {
            return;
        }

        $refreshtime = (int) FormUtil::getPassedValue('refreshtime', 100, 'POST');
        $sessiontime = (int) FormUtil::getPassedValue('sessiontime', 100, 'POST');
        $unsee = (int) FormUtil::getPassedValue('unsee', 0, 'POST');

        // default values in case they are not correct
        $refreshtime = (!is_numeric($refreshtime) || $refreshtime > 100) ? $refreshtime : 100;
        $sessiontime = (!is_numeric($sessiontime) || $sessiontime < 10 || $sessiontime > 120) ? 100 : $sessiontime;
        $unsee = ($unsee != 1) ? 0 : 1;

        // Get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // alter the corresponding variable
        $vars['refreshtime'] = $refreshtime;
        $vars['sessiontime'] = $sessiontime;
        $vars['unsee'] = $unsee;

        // write back the new contents
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        return $blockinfo;
    }

    function modify($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWstats:usersonlineblock:", "::", ACCESS_ADMIN)) {
            return;
        }

        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        $refreshtime = (!isset($vars['refreshtime'])) ? 100 : $vars['refreshtime'];
        $sessiontime = (!isset($vars['sessiontime'])) ? 100 : $vars['sessiontime'];
        $unsee = (!isset($vars['unsee'])) ? 0 : $vars['unsee'];

        // create output object
        $view = Zikula_View::getInstance('IWstats', false);
        $view->assign('refreshtime', $refreshtime);
        $view->assign('sessiontime', $sessiontime);
        $view->assign('unsee', $unsee);
        return $view->fetch('IWstats_block_editusersonline.htm');
    }

}
