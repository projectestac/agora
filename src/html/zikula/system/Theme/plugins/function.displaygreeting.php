<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.displaygreeting.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display a greeting to the user with the number of private messages received.
 *
 * This function displays a welcome message: welcome and the number of private
 * messages for a registered user or welcome and a signup link for an anonymous user.
 *
 * Examples (with Admin having 5 messages total, 1 unread):
 * <!--[displaygreeting]-->  or
 * <!--[displaygreeting displayMsgs=true]-->
 * Returns
 * Welcome [username]! You have 1 new message.
 * or
 * Welcome [username]! You have no new messages.
 *
 * <!--[displaygreeting class="welcome" displayMsgs=false]-->
 * Returns
 * Welcome [username]!
 * styled with the class "welcome"
 *
 * <!--[displaygreeting multiline=true displayAllMsgs=true]-->
 * Returns
 * Welcome [username]!
 * You have 5 private messages, 1 unread.
 *
 * <!--[displaygreeting displayAllMsgs=false class="messages"]-->
 * Returns
 * Welcome [username]! You have 1 unread message.
 * or
 * Welcome [username]! You have no unread messages.
 *
 * If not logged in, returns
 * Unregistered? <a href="user.php">Register for a user account</a>.
 *
 * @author       Mark West, Martin St�r Andersen
 * @since        19/10/2003
 * @see          function.displaygreeting.php::smarty_function_displaygreeting()
 * @param        array       $params         All attributes passed to this function from the template
 * @param        object      &$smarty        Reference to the Smarty object
 * @param        string      class           CSS class for string
 * @param        string      displayMsgs     Set to false (or any value) to turn off display of Private Messages
 * @param        string      displayAllMsgs  Set to false (or any value) to only display unread Messages
 * @param        string      multiline       Set to true to show Welcome and Messages on two lines (with Break).
 * @param        boolean     unameclickable  If set to true the user name is linked to the overview page of the used profile module
 * @return       string      the welcome message
 */
function smarty_function_displaygreeting($params, &$smarty)
{
    // set some defaults
    $class = isset($params['class']) ? ' class="'.$params['class'].'"' : '';

    // Turn on message display if not explicitly set or set true, or Display All is set
    $displayMsgs    = !isset($params['displayMsgs']) || $params['displayMsgs'] || isset($params['displayAllMsgs']) ? true : false;
    $displayAllMsgs = isset($params['displayAllMsgs']) && $params['displayAllMsgs'] ? true : false;
    $multiline      = isset($params['multiline']) && $params['multiline'] ? true : false;
    $unameclickable = isset($params['unameclickable']) && $params['unameclickable'] ? true : false;

    if (pnUserLoggedIn()) {
        $greeting = '<span' . $class . '>';
        if ($unameclickable) {
            $profileModule = pnConfigGetVar('profilemodule', '');
            if (!empty($profileModule) && pnModAvailable($profileModule)) {
                $greeting .= __f('Welcome, %s!', '<a href="' . pnModURL($profileModule) . '">' . pnUserGetVar('uname') . '</a>');
            } else {
                $greeting .= __f('Welcome, %s!', pnUserGetVar('uname'));
            }
        } else {
            $greeting .= __f('Welcome, %s!', pnUserGetVar('uname'));
        }

        $msgmodule = pnConfigGetVar('messagemodule', '');
        if (pnModAvailable($msgmodule) && ($displayMsgs || $displayAllMsgs)) {
            $messages = pnModAPIFunc($msgmodule, 'user', 'getmessagecount');
            $inboxurl = DataUtil::formatForDisplay(pnModURL($msgmodule, 'user', 'inbox'));
            if ($multiline) {
                $greeting .= "<br />\n";
            } else {
                $greeting .= '&nbsp;';
            }
            if ($displayAllMsgs) {
                if ($messages['totalin'] > 0) {
                    $greeting .= __f('You have %1$s <a href="%2$s">message(s)</a>, %3$s unread', array($messages['totalin'], $messages['unread'], $inboxurl));
                } else {
                    $greeting .= __f('You have no <a href="%s">messages</a>', $inboxurl);
                }
            } else {
                if ($messages['unread'] > 0) {
                    $greeting .= __f('You have %1$s <a href="%2$s">new message(s)</a>', array($messages['unread'], $inboxurl));
                } else {
                    $greeting .= __f('You have no <a href="%s">new messages</a>', $inboxurl);
                }
            }
        }
        $greeting .="</span>\n";

    } else {
        // If not logged in, show login link, ask them to register
        $greeting = '<span'.$class.'>'.__('New account')."</span>\n";
    } // end login and private messages

    return $greeting;
}
