<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
function smarty_function_categorynewlinkgraphic($params, Zikula_View $view)
{
    $dom = ZLanguage::getModuleDomain('Weblinks');

    if (!isset($params['cat']) || !is_numeric($params['cat'])) {
        return LogUtil::registerArgsError();
    }

    $em = ServiceUtil::getService('doctrine.entitymanager');
    $lastLink = $em->getRepository('Weblinks_Entity_Link')->getLinks(Weblinks_Entity_Link::ACTIVE, ">=", $params['cat'], 'date', 'DESC', 1);
    
    if (!isset($lastLink[0])) {
        return;
    } else {
        $lastTime = $lastLink[0]['date'];
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
}