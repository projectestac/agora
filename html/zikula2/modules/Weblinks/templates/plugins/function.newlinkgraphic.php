<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
function smarty_function_newlinkgraphic($params, Zikula_View $view)
{
    $dom = ZLanguage::getModuleDomain('Weblinks');
    
    $lastTime = $params['time'];
    $today = new DateTime();
    $diff = $lastTime->diff($today);
    $days = (int)$diff->format('%a');

    if ($days <= 1) {
        echo " <img src='modules/Weblinks/images/newred.gif' width='34' height='15' alt='" . DataUtil::formatForDisplay(__('New today', $dom)) . "' title='" . DataUtil::formatForDisplay(__('New today', $dom)) . "' />";
    }
    if ($days <= 3 && $days > 1) {
        echo " <img src='modules/Weblinks/images/newgreen.gif' width='34' height='15' alt='" . DataUtil::formatForDisplay(__('New during last 3 days', $dom)) . "' title='" . DataUtil::formatForDisplay(__('New during last 3 days', $dom)) . "' />";
    }
    if ($days <= 7 && $days > 3) {
        echo " <img src='modules/Weblinks/images/newblue.gif' width='34' height='15' alt='" . DataUtil::formatForDisplay(__('New this week', $dom)) . "' title='" . DataUtil::formatForDisplay(__('New this week', $dom)) . "' />";
    }

    return;
}