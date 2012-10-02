<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.profileuserlinks.php 69 2009-12-05 10:28:06Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Profile
 */

/**
 * Smarty function to display user links for the Profile module
 *
 * Example
 * <!--[profileuserlinks start='' end='' seperator='|' class='z-menuitem-title']-->
 *
 * @author       Mateo Tibaquira
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $start       start string
 * @param        string      $end         end string
 * @param        string      $seperator   link seperator
 * @param        string      $class       CSS class
 * @param        string      $default     Default content if there are no links to show (default: <hr />)
 * @return       string      the frontend links
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

    if (!pnUserLoggedIn()) {
        return $params['default'];
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    $currentfunc = FormUtil::getPassedValue('func', 'main');

    $currentuser  = pnUserGetVar('uid');
    $currentuname = pnUserGetVar('uname');

    $userlinks  = '';
    $linksarray = array();

    // process the memberlist functions first
    if (in_array($currentfunc, array('viewmembers', 'recentmembers', 'onlinemembers'))) {
        $userlinks = "<div class=\"z-menu\">\n";
        $userlinks .= "<span class=\"$params[class]\">$params[start] ";

        if ($currentuser >= 2) {
            $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('Users')) . '">' . __('User account panel', $dom) . '</a>';
        }
        if ($currentfunc != 'viewmembers') {
            $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('Profile', 'user', 'viewmembers')) . '">' . __('Registered users list', $dom) . '</a>';
        }
        if ($currentfunc != 'recentmembers') {
            $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('Profile', 'user', 'recentmembers')) . '">' . __f('Last %s registered users', pnModGetVar('Profile', 'recentmembersitemsperpage'), $dom) . '</a>';
        }
        if ($currentfunc != 'onlinemembers') {
            $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('Profile', 'user', 'onlinemembers')) . '">' . __('Users currently on-line', $dom) . '</a>';
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
            $smarty->_tpl_vars['uname'] = pnUserGetVar('uname', $smarty->_tpl_vars['uid']);
        } elseif (isset($smarty->_tpl_vars['uname'])) {
            $smarty->_tpl_vars['sameuser'] = ($currentuname == $smarty->_tpl_vars['uname']);
            $smarty->_tpl_vars['uid'] = pnUserGetIDFromName($smarty->_tpl_vars['uname']);
        } else {
            $smarty->_tpl_vars['sameuser'] = false;
        }
    }

    // process the common functions
    if ($smarty->_tpl_vars['ismember'] && $smarty->_tpl_vars['sameuser']) {
        $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('Users')) . '">' . __('User account panel', $dom) . '</a>';
    }

    if ($smarty->_tpl_vars['sameuser'] && $currentfunc != 'modify') {
        $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('Profile', 'user', 'modify')) . '">' . __('Edit personal info', $dom) . '</a>';
    }

    if ($smarty->_tpl_vars['ismember'] && $currentfunc != 'view') {
        $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('Profile', 'user', 'view', array('uid' => $currentuser))) . '">' . __('View personal info', $dom) . '</a>';
    }

    if (!$smarty->_tpl_vars['sameuser']) {
        // check for the messaging module
        $msgmodule = pnConfigGetVar('messagemodule');
        if (isset($smarty->_tpl_vars['uid']) && pnModAvailable($msgmodule)) {
            $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL($msgmodule, 'user', 'newpm', array('uid' => $smarty->_tpl_vars['uid']))) . '">' . __('Send private message', $dom) . '</a>';
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
    if (!$smarty->_tpl_vars['sameuser'] && pnModAvailable('ContactList')) {
        $buddystatus = pnModAPIFunc('ContactList', 'user', 'isBuddy', array('uid1' => $currentuser, 'uid2' => $smarty->_tpl_vars['uid']));

        $linksarray = array(); 

        if (empty($userlinks)) {
            $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('Users')) . '">' . __('User account panel', $dom) . '</a>';
        }
        $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('ContactList', 'user', 'display', array('uid' => $smarty->_tpl_vars['uid']))) . '">' . __f('Show %s\'s contacts', $smarty->_tpl_vars['uname'], $dom) . '</a>';
        if ($buddystatus) {
            $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('ContactList', 'user', 'edit', array('id' => $buddystatus))) . '">' . __('Edit contact', $dom) . '</a>';
        } else {
            $linksarray[] = '<a href="' . DataUtil::formatForDisplayHTML(pnModURL('ContactList', 'user', 'create', array('uid' => $smarty->_tpl_vars['uid']))) . '">' . __('Add as contact', $dom) . '</a>';
        }

        $userlinks .= "<div class=\"z-menu\">\n";
        $userlinks .= "<span class=\"$params[class]\">$params[start] ";
        $userlinks .= implode(" $params[seperator] ", $linksarray);
        $userlinks .= $params['end'] . "</span></div>\n";
    }

    return !empty($userlinks) ? $userlinks : $params['default'];
}
