<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.reviewsuserlinks.php 387 2009-12-11 03:45:28Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Reviews
 */

/**
 * Smarty function to display admin links for the reviews module
 * based on the user's permissions
 *
 * Reviews
 * <!--[reviewsuserlinks start="[" end="]" seperator="|" class="pn-menuitem-title"]-->
 *
 * @author       Mark West
 * @since        23/04/04
 * @see          function.reviewsuserlinks.php::smarty_function_reviewsuserlinks()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $start       start string
 * @param        string      $end         end string
 * @param        string      $seperator   link seperator
 * @param        string      $class       CSS class
 * @return       string      the results of the module function
 */
function smarty_function_reviewsuserlinks($params, &$smarty)
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

    $dom = ZLanguage::getModuleDomain('Reviews');

    $userlinks = array();
    if (SecurityUtil::checkPermission('Reviews::', "::", ACCESS_OVERVIEW)) {
        $userlinks[] = array('url'  => pnModURL('Reviews', 'user'),
                             'text' => __('Reviews index', $dom));
    }
    if (SecurityUtil::checkPermission('Reviews::', "::", ACCESS_OVERVIEW)) {
        $userlinks[] = array('url'  => pnModURL('Reviews', 'user', 'view'),
                             'text' => __('View reviews', $dom));
    }
    if (SecurityUtil::checkPermission('Reviews::', "::", ACCESS_COMMENT)) {
        $userlinks[] = array('url'  => pnModURL('Reviews', 'user', 'new'),
                             'text' => __('Submit a review', $dom));
    }

    if (empty($userlinks)) {
        return '';
    }

    $output = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";
    foreach ($userlinks as $k => $link) {
        $userlinks[$k] = "<a href=\"" . DataUtil::formatForDisplayHTML($link['url']) . "\">$link[text]</a>";
    }
    $output .= implode(" $params[seperator] ", $userlinks);
    $output .= $params['end'] . "</span>\n";

    return $output;
}
