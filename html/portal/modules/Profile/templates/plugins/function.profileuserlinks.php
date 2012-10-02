<?php
/**
 * Copyright Zikula Foundation 2009 - Profile module for Zikula
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/GPLv3 (or at your option, any later version).
 * @package Profile
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Smarty function to display user links for the Profile module
 *
 * Example
 * {profileuserlinks start='' end='' seperator='|' class='z-menuitem-title'}
 *
 * Parameters passed in via the $params array:
 * -------------------------------------------
 * string start     Start string.
 * string end       End string.
 * string seperator Link seperator.
 * string class     CSS class.
 * string default   Default content if there are no links to show (default: <hr />).
 * 
 * @param array  $params  All attributes passed to this function from the template.
 * @param object &$smarty Reference to the Zikula_View/Smarty object.
 * 
 * @return string|boolean The results of the module function; empty string if the Profile module is not available; false if error.
 */
function smarty_function_profileuserlinks($params, &$smarty)
{
    // set some defaults
    if (!isset($params['start'])) {
        $params['start'] = '[';
    }
    if (!isset($params['end'])) {
        $params['end'] = ']';
    }
    if (!isset($params['seperator'])) {
        $params['seperator'] = '|';
    }
    if (!isset($params['class'])) {
        $params['class'] = 'z-menuitem-title';
    }
    if (!isset($params['default'])) {
        $params['default'] = '<hr />';
    }

    if (!UserUtil::isLoggedIn()) {
        return $params['default'];
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    $func = FormUtil::getPassedValue('func', 'main', 'GET');
    
    $currentfunc = (isset($func) && !empty($func)) ? $func : 'main';

    $currentuser  = UserUtil::getVar('uid');
    $currentuname = UserUtil::getVar('uname');

    $userlinks  = '';
    $linksarray = array();

    // process the memberlist functions first
    if (in_array($currentfunc, array('viewmembers', 'recentmembers', 'onlinemembers'))) {
        $userlinks = "<div class=\"z-menu\">\n";
        $userlinks .= "<span class=\"$params[class]\">$params[start] ";

        if ($currentuser >= 2) {
            $linksarray[] = '<a href="' . ModUtil::url('Users', 'user', 'main') . '">' . __('User account panel', $dom) . '</a>';
        }
        if ($currentfunc != 'viewmembers') {
            $linksarray[] = '<a href="' . ModUtil::url('Profile', 'user', 'viewmembers') . '">' . __('Registered users list', $dom) . '</a>';
        }
        if ($currentfunc != 'recentmembers') {
            $linksarray[] = '<a href="' . ModUtil::url('Profile', 'user', 'recentmembers') . '">' . __f('Last %s registered users', ModUtil::getVar('Profile', 'recentmembersitemsperpage'), $dom) . '</a>';
        }
        if ($currentfunc != 'onlinemembers') {
            $linksarray[] = '<a href="' . ModUtil::url('Profile', 'user', 'onlinemembers') . '">' . __('Users currently on-line', $dom) . '</a>';
        }

        $userlinks .= implode(" $params[seperator] ", $linksarray);
        $userlinks .= $params['end'] . "</span>\n";
        $userlinks .= "</div>\n";
        
        return $userlinks;
    }

    // default values for essential vars
    if (!isset($smarty->_tpl_vars['ismember'])) {
        $smarty->_tpl_vars['ismember'] = ($currentuser >= 2);
    }
    if (!isset($smarty->_tpl_vars['sameuser'])) {
        if (isset($smarty->_tpl_vars['uid'])) {
            $smarty->_tpl_vars['sameuser'] = ($currentuser == $smarty->_tpl_vars['uid']);
            $smarty->_tpl_vars['uname'] = UserUtil::getVar('uname', $smarty->_tpl_vars['uid']);
        } elseif (isset($smarty->_tpl_vars['uname'])) {
            $smarty->_tpl_vars['sameuser'] = ($currentuname == $smarty->_tpl_vars['uname']);
            $smarty->_tpl_vars['uid'] = UserUtil::getIdFromName($smarty->_tpl_vars['uname']);
        } else {
            $smarty->_tpl_vars['sameuser'] = false;
        }
    }

    // process the common functions
    if ($smarty->_tpl_vars['ismember'] && $smarty->_tpl_vars['sameuser']) {
        $linksarray[] = '<a href="' . ModUtil::url('Users', 'user', 'main') . '">' . __('User account panel', $dom) . '</a>';
    }

    if ($smarty->_tpl_vars['sameuser'] && $currentfunc != 'modify') {
        $linksarray[] = '<a href="' . ModUtil::url('Profile', 'user', 'modify') . '">' . __('Edit personal info', $dom) . '</a>';
    }

    if ($smarty->_tpl_vars['ismember'] && $currentfunc != 'view') {
        $linksarray[] = '<a href="' . ModUtil::url('Profile', 'user', 'view', array('uid' => $currentuser)) . '">' . __('View personal info', $dom) . '</a>';
    }

    if (!$smarty->_tpl_vars['sameuser']) {
        // check for the messaging module
        $msgmodule = System::getVar('messagemodule');
        if (isset($smarty->_tpl_vars['uid']) && ModUtil::available($msgmodule)) {
            $linksarray[] = '<a href="' . ModUtil::url($msgmodule, 'user', 'newpm', array('uid' => $smarty->_tpl_vars['uid'])) . '">' . __('Send private message', $dom) . '</a>';
        }
    }
        
    // build the z-menu if there's an option
    if (!empty($linksarray)) {
        $userlinks = "<div class=\"z-menu\">\n";
        $userlinks .= "<span class=\"$params[class]\">$params[start] ";
        $userlinks .= implode(" $params[seperator] ", $linksarray);
        $userlinks .= $params['end'] . "</span>\n";
        $userlinks .= "</div>\n";
    }

    // ContactList integration
    if (!$smarty->_tpl_vars['sameuser'] && ModUtil::available('ContactList')) {
        $buddystatus = ModUtil::apiFunc('ContactList', 'user', 'isBuddy', array('uid1' => $currentuser, 'uid2' => $smarty->_tpl_vars['uid']));

        $linksarray = array(); 

        if (empty($userlinks)) {
            $linksarray[] = '<a href="' . ModUtil::url('Users', 'user', 'main') . '">' . __('User account panel', $dom) . '</a>';
        }
        $linksarray[] = '<a href="' . ModUtil::url('ContactList', 'user', 'display', array('uid' => $smarty->_tpl_vars['uid'])) . '">' . __f('Show %s\'s contacts', $smarty->_tpl_vars['uname'], $dom) . '</a>';
        if ($buddystatus) {
            $linksarray[] = '<a href="' . ModUtil::url('ContactList', 'user', 'edit', array('id' => $buddystatus)) . '">' . __('Edit contact', $dom) . '</a>';
        } else {
            $linksarray[] = '<a href="' . ModUtil::url('ContactList', 'user', 'create', array('uid' => $smarty->_tpl_vars['uid'])) . '">' . __('Add as contact', $dom) . '</a>';
        }

        $userlinks .= "<div class=\"z-menu\">\n";
        $userlinks .= "<span class=\"$params[class]\">$params[start] ";
        $userlinks .= implode(" $params[seperator] ", $linksarray);
        $userlinks .= $params['end'] . "</span></div>\n";
    }

    return !empty($userlinks) ? $userlinks : $params['default'];
}
