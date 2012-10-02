<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.userlinks.php 28118 2010-01-18 14:07:10Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display some user links
 *
 * Example
 * <!--[userlinks start="[" end="]" seperator="|"]-->
 *
 * Two additional defines need adding to a xanthia theme for this plugin
 * _CREATEACCOUNT and _YOURACCOUNT
 *
 * @author       Mark West
 * @since        21/10/03
 * @see          function.userlinks.php::smarty_function_userlinks()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $start       start delimiter
 * @param        string      $end         end delimiter
 * @param        string      $seperator   seperator
 * @return       string      user links
 */
function smarty_function_userlinks($params, &$smarty)
{
    $start     = isset($params['start'])     ? $params['start']    : '[';
    $end       = isset($params['end'])       ? $params['end']      : ']';
    $seperator = isset($params['seperator']) ? $params['seperator']: '|';

    if (pnUserLoggedIn()) {
        $links = "$start ";
        $profileModule = pnConfigGetVar('profilemodule', '');
        if (!empty($profileModule) && pnModAvailable($profileModule)) {
            $links .= "<a href=\"" . DataUtil::formatForDisplay(pnModURL($profileModule)) . '">' . __('Your Account') . "</a> $seperator ";
        }
        $links .= "<a href=\"" . DataUtil::formatForDisplay(pnModURL('Users', 'user', 'logout')) . '">'  . __('Log out') . "</a> $end";

    } else {
        $links = "$start <a href=\"" . DataUtil::formatForDisplay(pnModURL('Users', 'user', 'register')) . '">' . __('Register new account') . "</a> $seperator "
               . "<a href=\"" . DataUtil::formatForDisplay(pnModURL('Users', 'user', 'loginscreen')) . '">' . __('Login') . "</a> $end";
    }

    return DataUtil::formatForDisplayHTML($links);
}
