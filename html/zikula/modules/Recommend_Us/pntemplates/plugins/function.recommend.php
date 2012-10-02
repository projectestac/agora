<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.recommend.php 338 2009-11-09 09:49:45Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Recommend_Us
 */

/**
 * Smarty function to create a recommend link for an item
 *
 * Example
 * <!--[recommend modname="News" itemid=$sid start="[" end="]"]-->
 *
 * @author       Mark West
 * @since        14/07/04
 * @see          function.recommend.php::smarty_function_recommend()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $modname     the referring module
 * @param        integer     $itemid      the item id to send
 * @param        string      $start       start string
 * @param        string      $end         end string
 * @return       string      the results of the module function
 */
function smarty_function_recommend($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Recommend_Us');
    if (!isset($params['modname'])) {
        $smarty->trigger_error(__('recommend: attribute modname required', $dom));
        return false;
    }

    if (!isset($params['itemid'])) {
        $smarty->trigger_error(__('recommend: attribute itemid required', $dom));
        return false;
    }

    // set some defaults
    if (!isset($params['start'])) {
        $params['start'] = '[';
    }
    if (!isset($params['end'])) {
        $params['end'] = ']';
    }

    $recommendlink = '';

    if (pnModAvailable('Recommend_Us')) {
        $link = DataUtil::formatForDisplay(pnModURL('Recommend_Us', 'user', 'view', array('modname'=> $params['modname'], 'objectid' => $params['itemid'])));
        $recommendlink = $params['start'] . " <a href=\"" . $link . "\"><img src=\"images/global/friend.gif\" title=\"".__('Recommend Us', $dom)."\"  alt=\"".__('Recommend Us', $dom)."\" /></a> " . $params['end'];
    }

    return $recommendlink;
}
