<?php

// $Id: pnuser.php,v 1.33 2005/08/06 08:40:54 landseer Exp $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
/**
 * Messages Module
 *
 * Purpose of file:  user display functions --
 *                   This file contains all user GUI functions for the module
 *
 * @package      PostNuke_Miscellaneous_Modules
 * @subpackage   Messages
 * @version      $Id: pnuser.php,v 1.33 2005/08/06 08:40:54 landseer Exp $
 * @author       Mark West
 * @author       Richard Tirtadji
 * @link         http://www.postnuke.com  The PostNuke Home Page
 * @copyright    Copyright (C) 2002 by the PostNuke Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * the main user function
 *
 * This function is the default function, and is called whenever the module is
 * initiated without defining arguments.  As such it can be used for a number
 * of things, but most commonly it either just shows the module menu and
 * returns or calls whatever the module designer feels should be the default
 * function (often this is the view() function)
 *
 * @author       The PostNuke Development Team
 * @return       output       The main module page
 */
class IWmessages_Controller_User extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    public function main() {
        // Security check - important to do this as early as possible to avoid
        // potential security holes or just too much wasted processing.  For the
        // main function we want to check that the user has at least overview
        // privilege for some item within this component, or else they won't be
        // able to see anything and so we refuse access altogether.  The lowest
        // level of access for administration depends on the particular module, but
        // it is generally either 'overview' or 'read'
        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_OVERVIEW) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        return $this->view->assign('main', ModUtil::func('IWmessages', 'user', 'view'))
                ->fetch('IWmessages_user_main.htm');
    }

    /**
     * view items
     *
     * This is a standard function to provide an overview of all of the items
     * available from the module.
     *
     * @author       The PostNuke Development Team
     * @Modified by  Albert PÃ©rez Monfort
     * @param        integer      $startnum    (optional) The number of the start item
     * @return       output       The overview page
     */
    public function view($args) {
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'POST');
        $inicisend = FormUtil::getPassedValue('inicisend', isset($args['inicisend']) ? $args['inicisend'] : null, 'REQUEST');
        $rppsend = FormUtil::getPassedValue('rppsend', isset($args['rppsend']) ? $args['rppsend'] : null, 'POST');
        $filtersend = FormUtil::getPassedValue('filtersend', isset($args['filtersend']) ? $args['filtersend'] : null, 'POST');
        $filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : null, 'POST');

        // Security check - important to do this as early as possible to avoid
        // potential security holes or just too much wasted processing
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_OVERVIEW) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        $uid = UserUtil::getVar('uid');
        $usersList = '';

        if ($rpp == '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $rpp = ModUtil::func('IWmain', 'user', 'userGetVar',
                            array('uid' => $uid,
                                'name' => 'rpp',
                                'module' => 'IWmessages',
                                'sv' => $sv));
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('uid' => $uid,
                                'name' => 'rpp',
                                'module' => 'IWmessages',
                                'sv' => $sv,
                                'value' => $rpp));
        }

        if ($inici == '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $inici = ModUtil::func('IWmain', 'user', 'userGetVar',
                            array('uid' => $uid,
                                'name' => 'inici',
                                'module' => 'IWmessages',
                                'sv' => $sv));
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('uid' => $uid,
                                'name' => 'inici',
                                'module' => 'IWmessages',
                                'sv' => $sv,
                                'value' => $inici));
        }

        if ($rppsend == '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $rppsend = ModUtil::func('IWmain', 'user', 'userGetVar',
                            array('uid' => $uid,
                                'name' => 'rppsend',
                                'module' => 'IWmessages',
                                'sv' => $sv));
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('uid' => $uid,
                                'name' => 'rppsend',
                                'module' => 'IWmessages',
                                'sv' => $sv,
                                'value' => $rppsend));
        }

        if ($inicisend == '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $inicisend = ModUtil::func('IWmain', 'user', 'userGetVar',
                            array('uid' => $uid,
                                'name' => 'inicisend',
                                'module' => 'IWmessages',
                                'sv' => $sv));
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('uid' => $uid,
                                'name' => 'inicisend',
                                'module' => 'IWmessages',
                                'sv' => $sv,
                                'value' => $inicisend));
        }

        if ($filtersend == '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $filtersend = ModUtil::func('IWmain', 'user', 'userGetVar',
                            array('uid' => $uid,
                                'name' => 'filtersend',
                                'module' => 'IWmessages',
                                'sv' => $sv));
            if ($filtersend == '') {
                $filtersend = '-1';
            }
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('uid' => $uid,
                                'name' => 'filtersend',
                                'module' => 'IWmessages',
                                'sv' => $sv,
                                'value' => $filtersend));
        }

        if ($filter == '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $filter = ModUtil::func('IWmain', 'user', 'userGetVar',
                            array('uid' => $uid,
                                'name' => 'filter',
                                'module' => 'IWmessages',
                                'sv' => $sv));
            if ($filter == '') {
                $filter = '-1';
            }
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('uid' => $uid,
                                'name' => 'filter',
                                'module' => 'IWmessages',
                                'sv' => $sv,
                                'value' => $filter));
        }

        if ($rpp <= 0)
            $rpp = 10;

        if ($inicisend <= 0)
            $inicisend = 0;

        if ($rppsend <= 0)
            $rppsend = 10;

        if ($inici <= 0)
            $inici = 0;

        // The API function is called.  The arguments to the function are passed in
        // as their own arguments array
        $items = ModUtil::apiFunc('IWmessages', 'user', 'getall',
                        array('uid' => $uid,
                            'inici' => $inici,
                            'numitems' => $rpp,
                            'filter' => $filter));
        $items1 = ModUtil::apiFunc('IWmessages', 'user', 'getallsend',
                        array('uid' => $uid,
                            'inicisend' => $inicisend,
                            'numitems' => $rppsend,
                            'filtersend' => $filtersend));

        // Create output object - this object will store all of our output so that
        // we can return it easily when required
        $view = Zikula_View::getInstance('IWmessages', false);

        //Count the number of messages in boxs
        $messagecount = ModUtil::apiFunc('IWmessages', 'user', 'countitems',
                        array('uid' => UserUtil::getVar('uid')));
        $messagecountsend = ModUtil::apiFunc('IWmessages', 'user', 'countitemssend',
                        array('uid' => UserUtil::getVar('uid')));
        $view->assign('messagecount', $messagecount);
        $view->assign('messagecountsend', $messagecountsend);

        // calc the use percentage
        $limitInBox = ModUtil::getVar('IWmessages', 'limitInBox');
        $limitOutBox = ModUtil::getVar('IWmessages', 'limitOutBox');

        if ($limitInBox != 0) {
            $limitInBox100 = round($messagecount * 100 / $limitInBox, 2);
            //Check if the user come over the maximum number of messeges
            //Only some times, randomly, a advertissement is showed
            if ($limitInBox100 > 100) {
                $view->assign('inComeOver', true);
            }
            $view->assign('limitInBox100', $limitInBox100);
            $imgInWidth = (194 * $limitInBox100 / 100 > 194) ? 194 : 194 * $limitInBox100 / 100;
            $view->assign('imgInWidth', number_format($imgInWidth, 2, '.', ''));
        }

        if ($limitOutBox != 0) {
            $limitOutBox100 = round($messagecountsend * 100 / $limitOutBox, 2);
            //Check if the user come over the maximum number of messeges
            //Only some times, randomly, a advertissement is showed
            if ($limitOutBox100 > 100) {
                $view->assign('outComeOver', true);
            }
            $view->assign('limitOutBox100', $limitOutBox100);
            $imgOutWidth = (194 * $limitOutBox100 / 100 > 194) ? 194 : 194 * $limitOutBox100 / 100;
            $view->assign('imgOutWidth', number_format($imgOutWidth, 2, '.', ''));
        }
        $month_long = explode(' ', $this->__('January February March April May June July August September October November December'));
        $messages = array();

        if (is_array($items)) {
            foreach ($items as $item) {
                $usersList .= $item['from_userid'] . '$$';

                // get a Unix timestamp for this date/time  -- Alarion :: 08/21/2001
                $item['msg_time'] = mktime(substr($item['msg_time'], 11, 2), // hour
                                substr($item['msg_time'], 14, 2), // minute
                                '0', // second
                                substr($item['msg_time'], 5, 2), // month
                                substr($item['msg_time'], 8, 2), // day
                                substr($item['msg_time'], 0, 4));     // year

                $item['posterdata'] = UserUtil::getVars($item['from_userid']);
                if ($item['from_userid'] == 1) {
                    // anonymous user
                    $item['posterdata']['name'] = $item['posterdata']['uname'];
                }

                $userTime = $item['msg_time'];
                $item['messagetime'] = date('d/', $userTime) . $month_long[date('m', $userTime) - 1] . date('/Y - H.i', $userTime);

                $messages[] = $item;
            }
        }

        $view->assign('messages', $messages);

        $month_long = explode(' ', $this->__('January February March April May June July August September October November December'));

        $messagessend = array();
        if (is_array($items1)) {
            foreach ($items1 as $item1) {
                $usersList .= $item1['to_userid'] . '$$';
                $item1['posterdata'] = UserUtil::getVars($item1['to_userid']);
                if ($item1['to_userid'] == 1) {
                    // anonymous user
                    $item1['posterdata']['name'] = $item1['posterdata']['uname'];
                }

                $item1['msg_time'] = mktime(substr($item1['msg_time'], 11, 2), // hour
                                substr($item1['msg_time'], 14, 2), // minute
                                '0', // second
                                substr($item1['msg_time'], 5, 2), // month
                                substr($item1['msg_time'], 8, 2), // day
                                substr($item1['msg_time'], 0, 4)); // year

                $userTime = $item1['msg_time'];
                $item1['messagetime'] = date('d/', $userTime) . $month_long[date('m', $userTime) - 1] . date('/Y - H.i', $userTime);

                if ($item1['msg_readtime'] != "") {
                    $item1['msg_readtime'] = mktime(substr($item1['msg_readtime'], 11, 2), // hour
                                    substr($item1['msg_readtime'], 14, 2), // minute
                                    '0', // second
                                    substr($item1['msg_readtime'], 5, 2), // month
                                    substr($item1['msg_readtime'], 8, 2), // day
                                    substr($item1['msg_readtime'], 0, 4)); // year
                    $userTime = $item1['msg_readtime'];
                    $item1['messagetimeread'] = date('d/', $userTime) . $month_long[date('m', $userTime) - 1] . date('/Y - H.i', $userTime);
                } else {
                    $item1['messagetimeread'] = $this->__('Not read');
                }

                $messagessend[] = $item1;
            }
        }
        if ($inici > $messagecount) {
            //Ho poso per si s'esborren les darreres anotacions de l'ï¿œltima pï¿œgina
            System::redirect(ModUtil::url('IWmessages', 'user', 'main',
                                    array('inici' => 0,
                                        'rpp' => $rpp,
                                        'inicisend' => $inicisend,
                                        'rppsend' => $rppsend)));
        }

        if ($inicisend > $messagecountsend) {
            //Ho poso per si s'esborren les darreres anotacions de l'ï¿œltima pï¿œgina
            System::redirect(ModUtil::url('IWmessages', 'user', 'main',
                                    array('inici' => $inici,
                                        'rpp' => $rpp,
                                        'inicisend' => 0,
                                        'rppsend' => $rppsend)));
        }

        $pager = ModUtil::func('IWmessages', 'user', 'pager',
                        array('inici' => $inici,
                            'rpp' => $rpp,
                            'total' => $messagecount,
                            'urltemplate' => "javascript:view(%%,$rpp,$inicisend,$rppsend)"));

        $pagersend = ModUtil::func('IWmessages', 'user', 'pager', array('inici' => $inicisend,
                    'rpp' => $rppsend,
                    'total' => $messagecountsend,
                    'urltemplate' => "javascript:view($inici,$rpp,%%,$rppsend)"));
        $filtersend_MS = array(array('id' => '-1',
                'name' => $this->__('All')),
            array('id' => 1,
                'name' => $this->__('Only not readed')));
        $filter_MS = array(array('id' => '-1',
                'name' => $this->__('All')),
            array('id' => 1,
                'name' => $this->__('Only marked messages')));
        $rpp_MS = array(array('id' => 10,
                'name' => 10),
            array('id' => 20,
                'name' => 20),
            array('id' => 50,
                'name' => 50));

        //get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo',
                        array('sv' => $sv,
                            'info' => 'ncc',
                            'list' => $usersList));

        $view->assign('inici', $inici);
        $view->assign('inicisend', $inicisend);
        $view->assign('filter_MS', $filter_MS);
        $view->assign('filter', $filter);
        $view->assign('users', $users);
        $view->assign('filtersend_MS', $filtersend_MS);
        $view->assign('filtersend', $filtersend);
        $view->assign('rpp_MS', $rpp_MS);
        $view->assign('rpp', $rpp);
        $view->assign('rppsend', $rppsend);
        $view->assign('pager', $pager);
        $view->assign('pagersend', $pagersend);
        $view->assign('messagessend', $messagessend);

        return $view->fetch('IWmessages_user_view.htm');
    }

    /**
     * display item
     *
     * This is a standard function to provide detailed informtion on a single item
     * available from the module.
     *
     * @author       The PostNuke Development Team
     * @param        integer      $tid     the ID of the item to display
     * @return       output       The item detail page
     */
    public function display($args) {
        $msgid = FormUtil::getPassedValue('msgid', isset($args['msgid']) ? $args['msgid'] : null, 'REQUEST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : 1, 'REQUEST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : 10, 'POST');
        $inicisend = FormUtil::getPassedValue('inicisend', isset($args['inicisend']) ? $args['inicisend'] : 1, 'REQUEST');
        $rppsend = FormUtil::getPassedValue('rppsend', isset($args['rppsend']) ? $args['rppsend'] : 10, 'POST');
        $filtersend = FormUtil::getPassedValue('filtersend', isset($args['filtersend']) ? $args['filtersend'] : -1, 'POST');
        $filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : -1, 'POST');

        $uid = UserUtil::getVar('uid');

        // The API function is called.  The arguments to the function are passed in
        // as their own arguments array
        $item = ModUtil::apiFunc('IWmessages', 'user', 'get',
                        array('uid' => $uid,
                            'msgid' => $msgid));

        // The return value of the function is checked here, and if the function
        // suceeded then an appropriate message is posted.  Note that if the
        // function did not succeed then the API function should have already
        // posted a failure message so no action is required
        if (!$item) {
            LogUtil::registerError($this->__('Message not found'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'main'));
        }

        $item['msg_time'] = mktime(substr($item['msg_time'], 11, 2), // hour
                        substr($item['msg_time'], 14, 2), // minute
                        '0', // second
                        substr($item['msg_time'], 5, 2), // month
                        substr($item['msg_time'], 8, 2), // day
                        substr($item['msg_time'], 0, 4));     // year
        // update the read count
        if ($item['read_msg'] == 0) {
            ModUtil::apiFunc('IWmessages', 'user', 'setreadstatus',
                            array('msgid' => $item['msg_id']));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('module' => 'IWmain_block_news',
                                'name' => 'have_news',
                                'value' => 'me',
                                'sv' => $sv));
        }

        $month_long = explode(' ', $this->__('January February March April May June July August September October November December'));
        $userTime = $item['msg_time'];
        $i = date('d/', $userTime) . $month_long[date('m', $userTime) - 1] . date('/Y - H.i', $userTime);

        $view = Zikula_View::getInstance('IWmessages', false);

        $view->cache_id = $uid . $msgid;

        if (!is_array($item)) {
            $view->assign('errormsg', $this->__('You don\'t have any messages'));
        } else {
            $message = array();
            $item['posterdata'] = UserUtil::getVars($item['from_userid']);

            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $item['posterdata']['uname'] = ModUtil::func('IWmain', 'user', 'getUserInfo',
                            array('uid' => $item['posterdata']['uid'],
                                'sv' => $sv));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $item['posterdata']['userFullName'] = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => $item['posterdata']['uid'],
                        'sv' => $sv,
                        'info' => 'ncc'));

            $userTime = $item['msg_time'];
            $item['messagetime'] = date('d/', $userTime) . $month_long[date('m', $userTime) - 1] . date('/Y - H.i', $userTime);

            // bit of a cheat here .. greg.
            $item['message'] = ModUtil::apiFunc('IWmessages', 'user', 'replacesignature',
                            array('message' => $item['msg_text']));

            $item['reply'] = $item['reply'];

            for ($i = 1; $i < 4; $i++) {
                // Get file extension
                $fileExtension = strtolower(substr(strrchr($item['file' . $i], "."), 1));

                // get file icon
                $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype',
                                array('extension' => $fileExtension));
                $item['fileIcon' . $i] = $ctypeArray['icon'];
            }
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $photo = ModUtil::func('IWmain', 'user', 'getUserPicture',
                        array('uname' => $item['posterdata']['uname'],
                            'sv' => $sv));
        $item['qui'] = "d";

        $view->assign('uploadFolder', ModUtil::getVar('IWmessages', 'uploadFolder'));
        $view->assign('message', $item);
        $view->assign('photo', $photo);
        //$view->assign('authkey', SecurityUtil::generateAuthKey());
        $view->assign('inici', $inici);
        $view->assign('inicisend', $inicisend);
        $view->assign('filter', $filter);
        $view->assign('filtersend', $filtersend);
        $view->assign('rpp', $rpp);
        $view->assign('rppsend', $rppsend);

        return $view->fetch('IWmessages_user_display.htm');
    }

    /**
     * displaysend item send
     *
     * This function allow users to read send messages
     *
     * @param        integer      $tid     the ID of the item to display
     * @return       output       The item detail page
     */
    public function displaysend($args) {
        $msgid = FormUtil::getPassedValue('msgid', isset($args['msgid']) ? $args['msgid'] : 0, 'GET');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : 0, 'GET');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'POST');
        $inicisend = FormUtil::getPassedValue('inicisend', isset($args['inicisend']) ? $args['inicisend'] : null, 'REQUEST');
        $rppsend = FormUtil::getPassedValue('rppsend', isset($args['rppsend']) ? $args['rppsend'] : null, 'POST');
        $filtersend = FormUtil::getPassedValue('filtersend', isset($args['filtersend']) ? $args['filtersend'] : null, 'POST');
        $filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : null, 'POST');

        // The API function is called.  The arguments to the function are passed in
        // as their own arguments array
        $item = ModUtil::apiFunc('IWmessages', 'user', 'get',
                        array('uid' => $uid,
                            'msgid' => $msgid));


        // The return value of the function is checked here, and if the function
        // suceeded then an appropriate message is posted.  Note that if the
        // function did not succeed then the API function should have already
        // posted a failure message so no action is required
        if (!$item) {
            LogUtil::registerError($this->__('Message not found'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'main'));
        }
        //Security check
        if (UserUtil::getVar('uid') != $item['from_userid']) {
            LogUtil::registerError($this->__('Message not found'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'main'));
        }

        $item['msg_time'] = mktime(substr($item['msg_time'], 11, 2), // hour
                        substr($item['msg_time'], 14, 2), // minute
                        '0', // second
                        substr($item['msg_time'], 5, 2), // month
                        substr($item['msg_time'], 8, 2), // day
                        substr($item['msg_time'], 0, 4));     // year
        $view = Zikula_View::getInstance('IWmessages', false);
        $view->cache_id = $uid . $msgid;
        $month_long = explode(' ', $this->__('January February March April May June July August September October November December'));

        if (!is_array($item)) {
            $view->assign('errormsg', $this->__('You don\'t have any messages'));
        } else {
            $message = array();
            $item['posterdata'] = UserUtil::getVars($item['to_userid']);
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $item['posterdata']['uname'] = ModUtil::func('IWmain', 'user', 'getUserInfo',
                            array('uid' => $item['posterdata']['uid'],
                                'sv' => $sv));

            $userTime = $item['msg_time'];
            $item['messagetime'] = date('d/', $userTime) . $month_long[date('m', $userTime) - 1] . date('/Y - H.i', $userTime);

            // bit of a cheat here .. greg.
            $item['message'] = ModUtil::apiFunc('IWmessages', 'user', 'replacesignature',
                            array('message' => $item['msg_text']));
            for ($i = 1; $i < 4; $i++) {
                // Get file extension
                $fileExtension = strtolower(substr(strrchr($item['file' . $i], "."), 1));

                // get file icon
                $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype',
                                array('extension' => $fileExtension));
                $item['fileIcon' . $i] = $ctypeArray['icon'];
            }
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $photo = ModUtil::func('IWmain', 'user', 'getUserPicture',
                        array('uname' => $item['posterdata']['uname'],
                            'sv' => $sv));

        $item['qui'] = "r";
        $view->assign('send', '1');
        $view->assign('message', $item);
        $view->assign('photo', $photo);
        //$view->assign('authkey', SecurityUtil::generateAuthKey());
        $view->assign('inici', $inici);
        $view->assign('inicisend', $inicisend);
        $view->assign('filter', $filter);
        $view->assign('filtersend', $filtersend);
        $view->assign('rpp', $rpp);
        $view->assign('rppsend', $rppsend);
        return $view->fetch('IWmessages_user_display.htm');
    }

    /**
     * Get a file from a server folder even it is out of the public html directory
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	name of the file that have to be gotten
     * @return:	The file information
     */
    public function getFile($args) {
        // File name with the path
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', "::", ACCESS_OVERVIEW) || !UserUtil::isLoggedIn()) {
            return LogUtil::registerError($this->__('Sorry! No authorization to access this module.'), 403);
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'getFile',
                array('fileName' => $fileName,
                    'sv' => $sv));
    }

    /**
     * delete item
     *
     * @author       The PostNuke Development Team
     * @param        integer      $tid     the ID of the item to display
     * @return       output       The item detail page
     */
    public function delete($args) {
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_COMMENT) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        $msg_id = FormUtil::getPassedValue('msg_id', isset($args['msg_id']) ? $args['msg_id'] : null, 'REQUEST');
        $total_messages = FormUtil::getPassedValue('total_messages', isset($args['total_messages']) ? $args['total_messages'] : null, 'POST');
        $qui = FormUtil::getPassedValue('qui', isset($args['qui']) ? $args['qui'] : null, 'REQUEST');
        if (empty($msg_id)) {
            LogUtil::registerError($this->__('No message(s) selected'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
        }
        $status = false;
        $uid = UserUtil::getVar('uid');
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar',
                        array('uid' => $uid,
                            'name' => 'rpp',
                            'module' => 'IWmessages',
                            'sv' => $sv,
                            'value' => $rpp));
        if (is_array($msg_id)) {
            // delete multiple messages from a list
            for ($i = 0; $i < $total_messages; $i++) {
                if (isset($msg_id[$i])) {
                    $status = ModUtil::apiFunc('IWmessages', 'user', 'delete',
                                    array('msgid' => $msg_id[$i],
                                        'uid' => $uid,
                                        'qui' => $qui));
                    if (!$status) {
                        return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
                    }
                }
            }
        } else {
            $status = ModUtil::apiFunc('IWmessages', 'user', 'delete',
                            array('msgid' => $msg_id,
                                'uid' => $uid,
                                'qui' => $qui));
            if (!$status) {
                return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
            }
        }
        if ($status) {
            $this->view->clear_cache(null, $uid);
            LogUtil::registerStatus($this->__('Your message has been deleted.'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
        }
    }

    /**
     * compose a message
     *
     * @author       The PostNuke Development Team
     * @param        integer      $tid     the ID of the item to display
     * @return       output       The item detail page
     */
    public function compose($args) {
        $reply = FormUtil::getPassedValue('reply', isset($args['reply']) ? $args['reply'] : 0, 'GETPOST');
        $replied = FormUtil::getPassedValue('replied', isset($args['replied']) ? $args['replied'] : 0, 'POST');
        $send = FormUtil::getPassedValue('send', isset($args['send']) ? $args['send'] : null, 'POST');
        $msg_id = FormUtil::getPassedValue('msg_id', isset($args['msg_id']) ? $args['msg_id'] : null, 'REQUEST');
        $uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : null, 'REQUEST');
        $message = FormUtil::getPassedValue('message', isset($args['message']) ? $args['message'] : null, 'POST');
        $touser = FormUtil::getPassedValue('touser', isset($args['touser']) ? $args['touser'] : null, 'POST');
        $to_group = FormUtil::getPassedValue('to_group', isset($args['to_group']) ? $args['to_group'] : null, 'POST');
        $image = FormUtil::getPassedValue('image', isset($args['image']) ? $args['image'] : null, 'POST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'REQUEST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'REQUEST');
        $inicisend = FormUtil::getPassedValue('inicisend', isset($args['inicisend']) ? $args['inicisend'] : null, 'REQUEST');
        $rppsend = FormUtil::getPassedValue('rppsend', isset($args['rppsend']) ? $args['rppsend'] : null, 'REQUEST');
        $filtersend = FormUtil::getPassedValue('filtersend', isset($args['filtersend']) ? $args['filtersend'] : null, 'REQUEST');
        $filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : null, 'REQUEST');
        if (!SecurityUtil::checkPermission('IWmessages::', $uname . '::', ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $groupsMulti_array = array();
        $canUpdate = '';
        $subject = '';
        $icons = false;
        $touser = '';
        $toUserFixed = false;
        $fromuser = '';

        if (isset($uname) && $uname != '')
            $touser = $uname;

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo',
                        array('sv' => $sv));
        $month_long = explode(' ', $this->__('January February March April May June July August September October November December'));
        if ($reply == 1) {
            $replied = $msg_id;
            // The API function is called.  The arguments to the function are passed in
            // as their own arguments array
            $item = ModUtil::apiFunc('IWmessages', 'user', 'get',
                            array('uid' => UserUtil::getVar('uid'),
                                'msgid' => $msg_id));
            $fromuserdata = UserUtil::getVars($item['from_userid']);
            $touserdata = UserUtil::getVars($item['to_userid']);
            $user_id = UserUtil::getVar('uid');
            if (UserUtil::isLoggedIn() && ($user_id != $touserdata['uid'])) {
                LogUtil::registerError($this->__('You can\'t reply to that message. It wasn\'t sent to you.'));
                return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
            }
            $fromuser = $fromuserdata['uname'];
            if (strpos($item['subject'], 'Re:') === false) {
                $reText = $this->__('Re') . ': ';
            }
            $subject = $reText . $item['subject'];

            if (!empty($uname)) {
                $view->assign('touser', $uname);
            }
            $text = preg_replace('/(<br[ \/]*?>)/i', '', $item['msg_text']);
            $text = DataUtil::formatForDisplayHTML($text);
            $text = eregi_replace('\[addsig]', '', $text);
            $text = nl2br($text);

            $row['msg_time'] = mktime(substr($item['msg_time'], 11, 2), // hour
                            substr($item['msg_time'], 14, 2), // minute
                            '0', // second
                            substr($item['msg_time'], 5, 2), // month
                            substr($item['msg_time'], 8, 2), // day
                            substr($item['msg_time'], 0, 4)); // year
            $userTime = $row['msg_time'];
            $reply = "[quote=$fromuserdata[uname] " . $this->__('wrote') . ' ' . $this->__('on') . ' ' . date('d/', $userTime) . $month_long[date('m', $userTime) - 1] . date('/Y - H.i', $userTime) . "]<br />" . '<div class="messageBody">' . $text . "</div><br />[/quote]<br />" . $item['reply'];
        } else {
            $reply = false;
        }
        if (ModUtil::available('bbsmile') && ModUtil::isHooked('bbsmile', 'IWmessages')) {
            $icons = ModUtil::apiFunc('bbsmile', 'user', 'getall');
        }
        // assign the username if both present and valid
        if (!empty($uname)) {
            // we call the API to check if the uname is valid
            $uid = UserUtil::getIdFromName($uname);
            if (isset($uid)) {
                $toUserFixed = true;
                $touser = $uname;
            }
        }
        if (empty($msg_id)) {
            $msg_id = '';
        }
        //Check if the user can upload files
        $groupsCanUpdate = ModUtil::getVar('IWmessages', 'groupsCanUpdate');
        $multiMail = ModUtil::getVar('IWmessages', 'multiMail');
        $groupsUpdate = explode('$$', substr($groupsCanUpdate, 0, -1));
        array_shift($groupsUpdate);

        foreach ($groupsUpdate as $update) {
            $names = explode('|', $update);

            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $isMember = ModUtil::func('IWmain', 'user', 'isMember',
                            array('uid' => UserUtil::getVar('uid'),
                                'gid' => $names[0],
                                'sgid' => $names[1],
                                'sv' => $sv));
            if ($isMember) {
                $canUpdate = true;
                break;
            }
        }
        //Check if the user can send mails to multi users
        $multiMail = explode('$$', substr($multiMail, 0, -1));
        array_shift($multiMail);
        sort($multiMail);
        $allGroups = false;
        foreach ($multiMail as $multi) {
            $names = explode('-', $multi);
            $names1 = explode('|', $names[0]);
            $names2 = explode('|', $names[1]);
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $isMember = ModUtil::func('IWmain', 'user', 'isMember',
                            array('uid' => UserUtil::getVar('uid'),
                                'gid' => $names1[0],
                                'sgid' => $names1[1],
                                'sv' => $sv));
            if ($isMember) {
                if ($names2[0] == 0 && $names2[1] == 0) {
                    $allGroups = true;
                    break;
                }
                $gn2 = $groupsInfo[$names2[0]];
                $groupsMulti_array[] = array('id' => $names2[0] . '|' . $names2[1],
                    'name' => $gn2);
            }
        }
        if ($allGroups) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $grups = ModUtil::func('IWmain', 'user', 'getAllGroups',
                            array('sv' => $sv));
            $groupsMulti_array = array();
            $groupsMulti_array[] = array('id' => "0|0",
                'name' => $this->__('To all users'));
            foreach ($grups as $grup) {
                $groupsMulti_array[] = array('id' => $grup['id'] . '|0',
                    'name' => $grup['name']);
            }
        }
        $canMulti = (count($groupsMulti_array) > 0) ? true : false;
        $photosFolder = ModUtil::getVar('IWmessages', 'photosFolder');
        $multiMail = ModUtil::getVar('IWmessages', 'multiMail');

        return $this->view->assign('replied', $replied)
                ->assign('groupsMulti', $groupsMulti_array)
                ->assign('canUpdate', $canUpdate)
                ->assign('canMulti', $canMulti)
                ->assign('msgid', $msg_id)
                ->assign('extensions', ModUtil::getVar('IWmain', 'extensions'))
                ->assign('message', $message)
                ->assign('touser', $touser)
                ->assign('to_group', $to_group)
                ->assign('image', $image)
                ->assign('inici', $inici)
                ->assign('inicisend', $inicisend)
                ->assign('filter', $filter)
                ->assign('filtersend', $filtersend)
                ->assign('rpp', $rpp)
                ->assign('subject', $subject)
                ->assign('rppsend', $rppsend)
                ->assign('dissableSuggest', ModUtil::getVar('IWmessages', 'dissableSuggest'))
                ->assign('reply', $reply)
                ->assign('reply1', htmlspecialchars($reply))
                ->assign('icons', $icons)
                ->assign('touser', $touser)
                ->assign('toUserFixed', $toUserFixed)
                ->assign('fromuser', $fromuser)
                ->fetch('IWmessages_user_new.htm');
    }

    /**
     * submit a message
     *
     * @author       The PostNuke Development Team
     * @param        integer      $tid     the ID of the item to display
     * @return       output       The item detail page
     */
    public function submit($args) {
        $image = FormUtil::getPassedValue('image', isset($args['image']) ? $args['image'] : null, 'POST');
        $subject = FormUtil::getPassedValue('subject', isset($args['subject']) ? $args['subject'] : null, 'POST');
        $to_user = FormUtil::getPassedValue('to_user', isset($args['to_user']) ? $args['to_user'] : null, 'POST');
        $message = FormUtil::getPassedValue('message', isset($args['message']) ? $args['message'] : null, 'POST');
        $reply = FormUtil::getPassedValue('reply', isset($args['reply']) ? $args['reply'] : null, 'POST');
        $replied = FormUtil::getPassedValue('replied', isset($args['replied']) ? $args['replied'] : 0, 'POST');
        $file1 = FormUtil::getPassedValue('file1', isset($args['file1']) ? $args['file1'] : null, 'POST');
        $file2 = FormUtil::getPassedValue('file2', isset($args['file2']) ? $args['file2'] : null, 'POST');
        $file3 = FormUtil::getPassedValue('file3', isset($args['file3']) ? $args['file3'] : null, 'POST');
        $multi = FormUtil::getPassedValue('multi', isset($args['multi']) ? $args['multi'] : null, 'POST');
        if (!SecurityUtil::checkPermission('IWmessages::', $to_user . '::', ACCESS_COMMENT)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        if (empty($to_user) && (!isset($multi) || $multi == '0')) {
            LogUtil::registerError($this->__('Not user especified.'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
        }
        if (empty($message)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
        }
        $message = nl2br($message);
        if (empty($subject)) {
            $subject = $this->__('No subject');
        }
        if (UserUtil::isLoggedIn()) {
            $message .= "[addsig]";
        }
        //Create an array with the names of all the persons who are going to receipt the message
        $usersName = array();

        //parse the users for the message
        if (strpos($to_user, ',') != 0) {
            //More than a user separeted by ,
            $users = explode(',', $to_user);
            foreach ($users as $user) {
                if ($user != '') {
                    $usersName[] = $user;
                }
            }
        } else {
            //an alone user
            if ($to_user != '') {
                $usersName[] = $to_user;
            }
        }

        //Create an array with the ids of all the persons who are going to receipt the message
        $usersId = array();
        //For each user check if is a valid one.
        $noValidUser = '';
        foreach ($usersName as $userName) {
            // get the user id
            $to_userid = UserUtil::getIdFromName($userName);
            if (!$to_userid) {
                $noValidUser .= $userName . ' - ';
            } else {
                $usersId[] = $to_userid;
            }
        }
        if ($noValidUser != '') {
            $noValidUser = substr($noValidUser, 0, -3);
            LogUtil::registerError($this->__('Some of the users writed into the field A: are not correct. The incorrect users are: ') . $noValidUser);
            return System::redirect((UserUtil::isLoggedIn()) ? ModUtil::url('IWmessages', 'user', 'compose',
                                    array('touser' => $to_user,
                                        'subject' => $subject,
                                        'message' => str_replace('[addsig]', '', $message),
                                        'reply' => $reply,
                                        'to_group' => $multi,
                                        'image' => $image)) : 'index.php');
        }
        $groupsCanUpdate = ModUtil::getVar('IWmessages', 'groupsCanUpdate');
        $groupsUpdate = explode('$$', substr($groupsCanUpdate, 0, -1));
        array_shift($groupsUpdate);
        foreach ($groupsUpdate as $update) {
            $names = explode('|', $update);
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $isMember = ModUtil::func('IWmain', 'user', 'isMember',
                            array('uid' => UserUtil::getVar('uid'),
                                'gid' => $names[0],
                                'sgid' => $names[1],
                                'sv' => $sv));
            if ($isMember) {
                $canUpdate = true;
                break;
            }
        }
        $multiMail = ModUtil::getVar('IWmessages', 'multiMail');

        //Check if the user can really send multiple mails to the grups especified
        $canMultiMail = false;
        //Get the group of the user who send the message
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userGroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups',
                        array('uid' => UserUtil::getVar('uid'),
                            'sv' => $sv));
        foreach ($userGroups as $userGroup) {
            $multip = explode('|', $multi);
            if (strpos($multiMail, '$' . $userGroup['id'] . '|0-0|0$') != 0 ||
                    strpos($multiMail, '$' . $userGroup['id'] . '|0-' . $multi . '$') != 0 ||
                    strpos($multiMail, '$' . $userGroup['id'] . '|0-' . $multip[0] . '|0$') != 0) {
                //The user can send to everybody
                $canMultiMail = true;
                break;
            }
        }
        //Add the user in the array of user who send the message
        if ($canMultiMail) {
            if ($multi == '0|0') {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $allUsers = ModUtil::func('IWmain', 'user', 'getAllUsersInfo',
                                array('sv' => $sv));
                foreach ($allUsers as $user) {
                    $usersId[] = UserUtil::getIdFromName($user);
                }
            } else {
                if ($multi != '0') {
                    $members = explode('|', $multi);
                    if ($members[1] == 0) {
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $membersList = ModUtil::func('IWmain', 'user', 'getMembersGroup',
                                        array('sv' => $sv,
                                            'gid' => $members[0]));
                    } else {
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $membersList = ModUtil::func('IWmain', 'user', 'getMembersGroup',
                                        array('sv' => $sv,
                                            'gid' => $members[1]));
                    }
                    foreach ($membersList as $member) {
                        $usersId[] = $member['id'];
                    }
                }
            }
        }

        if (count($usersId) == 0) {
            LogUtil::registerError(_MESSAGESUSERNOTINDB . ', ' . $this->__('Please check that the name of the user you are sending a message to is a real user and known by this system.'));
        } else {
            if ($canUpdate) {
                //Update the attached files to the server
                for ($i = 1; $i < 4; $i++) {
                    $update = array();
                    $file = 'file' . $i;
                    $$file = str_replace(' ', '_', $_FILES['file' . $i]['name']);
                    if ($$file != '') {
                        $folder = ModUtil::getVar('IWmessages', 'uploadFolder');
                        $fileName = md5($$file . UserUtil::getVar('uid'));
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $update = ModUtil::func('IWmain', 'user', 'updateFile',
                                        array('sv' => $sv,
                                            'folder' => $folder,
                                            'fileNameTemp' => $_FILES['file' . $i]['tmp_name'],
                                            'fileRealName' => $_FILES['file' . $i]['name'],
                                            'fileSize' => $_FILES['file' . $i]['size'],
                                            'fileName' => $fileName));
                        //the function returns the error string if the update fails and empty string if success
                        if ($update['msg'] != '') {
                            LogUtil::registerError($update['msg'] . ' ' . $this->__('Probably the message has been sent without the attached file'));
                            $$file = '';
                        }
                    }
                }
            } else {
                $file1 = '';
                $file2 = '';
                $file3 = '';
            }

            foreach ($usersId as $userId) {
                if (ModUtil::apiFunc('IWmessages', 'user', 'create',
                                array('image' => $image,
                                    'subject' => $subject,
                                    'to_userid' => $userId,
                                    'message' => $message,
                                    'reply' => $reply,
                                    'file1' => str_replace(' ', '_', $file1),
                                    'file2' => str_replace(' ', '_', $file2),
                                    'file3' => str_replace(' ', '_', $file3)))) {
                    $this->view->clear_cache(null, $to_userid);
                    $sended++;
                } else {
                    $error++;
                }
            }
        }
        if ($sended > 0) {
            $sendedText = ($sended > 1) ? $this->__('Number of sent messages:') . ' ' . $sended : '';
            LogUtil::registerStatus($this->__('Your message has been posted.') . ' ' . $sendedText);
            if ($replied > 0) {
                //Set a message as replied
                ModUtil::apiFunc('IWmessages', 'user', 'setreplied',
                                array('msgid' => $replied));
            }
        }
        if ($error > 0) {
            $errorText = ($error > 1) ? $this->__('Errors number:') . ' ' . $error : '';
            LogUtil::registerError($this->__('Error! Creation attempt failed.') . ' ' . $errorText);
        }
        return System::redirect((UserUtil::isLoggedIn()) ? ModUtil::url('IWmessages', 'user', 'view') : 'index.php');
    }

    /**
     * delete item
     *
     * @author       The PostNuke Development Team
     * @param        integer      $tid     the ID of the item to display
     * @return       output       The item detail page
     */
    public function check($args) {
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_OVERVIEW) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        $msg_id = FormUtil::getPassedValue('msg_id', isset($args['msg_id']) ? $args['msg_id'] : null, 'POST');
        $total_messages = FormUtil::getPassedValue('total_messages', isset($args['total_messages']) ? $args['total_messages'] : null, 'POST');

        if (empty($msg_id)) {
            LogUtil::registerError($this->__('No message(s) selected'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
        }

        $status = false;
        $uid = UserUtil::getVar('uid');

        if (is_array($msg_id)) {
            // delete multiple messages for a list
            for ($i = 0; $i < $total_messages; $i++) {
                if (isset($msg_id[$i])) {
                    $status = ModUtil::apiFunc('IWmessages', 'user', 'check',
                                    array('msgid' => $msg_id[$i],
                                        'uid' => $uid));
                    if (!$status) {
                        return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
                    }
                }
            }
        } else {
            $status = ModUtil::apiFunc('IWmessages', 'user', 'delete',
                            array('msgid' => $msg_id,
                                'uid' => $uid));
            if (!$status) {
                return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
            }
        }
        if ($status) {
            $this->view->clear_cache(null, $uid);
            LogUtil::registerStatus($this->__('Marked/unmarked messages'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'view'));
        }
    }

    /**
     * download file
     *
     * This function downloads the files attached to messages available.
     * @param        integer      $msg_id     the ID of the message
     * @param        integer      $file     the number of the file to download
     * @return       file         The file request
     */
    public function download($args) {
        // Get the parameters
        $msg_id = FormUtil::getPassedValue('msg_id', isset($args['msg_id']) ? $args['msg_id'] : null, 'GET');
        $file = FormUtil::getPassedValue('file', isset($args['file']) ? $args['file'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_OVERVIEW) ||
                !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        // Needed arguments
        if (!isset($file) || !isset($msg_id) || !is_numeric($msg_id) || !is_numeric($file)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $uid = UserUtil::getVar('uid');
        // The API function is called.  The arguments to the function are passed in
        // as their own arguments array
        $item = ModUtil::apiFunc('IWmessages', 'user', 'get',
                        array('uid' => $uid,
                            'msgid' => $msg_id));
        // The return value of the function is checked here, and if the function
        // suceeded then an appropriate message is posted.  Note that if the
        // function did not succeed then the API function should have already
        // posted a failure message so no action is required
        if (!$item || ($item['to_userid'] != $uid && $item['from_userid'] != $uid)) {
            LogUtil::registerError($this->__('Message not found'));
            return System::redirect(ModUtil::url('IWmessages', 'user', 'main'));
        }
        switch ($file) {
            case 1: $file = $item['file1'];
                break;
            case 2: $file = $item['file2'];
                break;
            case 3: $file = $item['file3'];
                break;
        }

        //Create the name of the file to search in the server
        $fileNameInServer = md5($file . $item['from_userid']);

        $fileNameInServer = ModUtil::getVar('IWmessages', 'uploadFolder') . '/' . $fileNameInServer;

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'downloadFile', array('fileName' => $file,
            'fileNameInServer' => $fileNameInServer,
            'sv' => $sv));
    }

    public function pager($args) {
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'POST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
        $total = FormUtil::getPassedValue('total', isset($args['total']) ? $args['total'] : null, 'POST');
        $urltemplate = FormUtil::getPassedValue('urltemplate', isset($args['urltemplate']) ? $args['urltemplate'] : null, 'POST');

        //Security check
        if (!SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_OVERVIEW) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        // Quick check to ensure that we have work to do
        if ($total <= $rpp) {
            return;
        }

        if (!isset($inici) || empty($inici)) {
            $inici = 1;
        }

        if (!isset($rpp) || empty($rpp)) {
            $rpp = 10;
        }

        // Show startnum link
        if ($inici != 1) {
            $url = preg_replace('/%%/', 1, $urltemplate);
            $text = '<a href="' . $url . '"><<</a> | ';
        } else {
            $text = '<< | ';
        }
        $items[] = array('text' => $text);

        // Show following items
        $pagenum = 1;

        for ($curnum = 1; $curnum <= $total; $curnum += $rpp) {
            if (($inici < $curnum) || ($inici > ($curnum + $rpp - 1))) {
                //mod by marsu - use sliding window for pagelinks
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
                // On this page - show text
                $text = $pagenum . ' | ';
                $items[] = array('text' => $text);
            }
            $pagenum++;
        }

        if (($curnum >= $rpp + 1) && ($inici < $curnum - $rpp)) {
            $url = preg_replace('/%%/', $curnum - $rpp, $urltemplate);
            $text = '<a href="' . $url . '">>></a>';
        } else {
            $text = '>>';
        }
        $items[] = array('text' => $text);

        return $this->view->assign('items', $items)
                ->fetch('IWmessages_user_pager.htm');
    }

}