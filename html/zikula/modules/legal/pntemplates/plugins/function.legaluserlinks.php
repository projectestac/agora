<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.legaluserlinks.php 27324 2009-11-01 08:10:59Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package      Zikula_System_Modules
 * @subpackage   legal
 */


/**
 * Smarty function to display admin links for the example module
 * based on the user's permissions
 *
 * Example
 * <!--[legaluserlinks start="[" end="]" seperator="|" class="z-menuitem-title"]-->
 *
 * @author       Mark West
 * @since        24/11/04
 * @see          function.legaluserlinks.php::smarty_function_legaluserlinks()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $start       start string
 * @param        string      $end         end string
 * @param        string      $seperator   link seperator
 * @param        string      $class       CSS class
 * @return       string      the results of the module function
 */
function smarty_function_legaluserlinks($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('legal');
    // set some defaults
    $start     = isset($params['start'])     ? $params['start']     : '[';
    $end       = isset($params['end'])       ? $params['end']       : ']';
    $seperator = isset($params['seperator']) ? $params['seperator'] : '|';
    $class     = isset($params['class'])     ? $params['class']     : 'z-menuitem-title';

    $adminlinks = "<span class=\"$class\">$start ";

    if (SecurityUtil::checkPermission('legal::', 'termsofuse::', ACCESS_OVERVIEW) && pnModGetVar('legal', 'termsofuse')) {
        $adminlinks .= "<a href=\"" . DataUtil::formatForDisplay(pnModURL('legal', 'user', 'termsofuse')) . "\">" . __('Terms of use', $dom) . "</a> ";
    }
    if (SecurityUtil::checkPermission('legal::', 'privacypolicy::', ACCESS_OVERVIEW) && pnModGetVar('legal', 'privacypolicy')) {
        $adminlinks .= "$seperator <a href=\"" . DataUtil::formatForDisplay(pnModURL('legal', 'user', 'privacy')) . "\">" . __('Privacy policy', $dom) . "</a> ";
    }
    if (SecurityUtil::checkPermission('legal::', 'accessibilitystatement::', ACCESS_OVERVIEW) && pnModGetVar('legal', 'accessibilitystatement')) {
        $adminlinks .= "$seperator <a href=\"" . DataUtil::formatForDisplay(pnModURL('legal', 'user', 'accessibilitystatement')) . "\">" . __('Accessibility statement', $dom) . "</a> ";
    }

    $adminlinks .= "$end</span>\n";

    return $adminlinks;
}
