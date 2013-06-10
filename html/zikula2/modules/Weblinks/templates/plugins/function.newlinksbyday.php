<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
function smarty_function_newlinksbyday($params, Zikula_View $view)
{
    if (($params['newlinkshowdays'] != "7" && $params['newlinkshowdays'] != "14" && $params['newlinkshowdays'] != "30") ||
            (!is_numeric($params['newlinkshowdays'])) || (!isset($params['newlinkshowdays']))) {
        $params['newlinkshowdays'] = "7";
    }
    
    $beginning = new DateTime();
    $beginning->setTime(0, 0, 0);
    $end = new DateTime();
    $end->setTime(23, 59, 59);
    
    $em = ServiceUtil::getService('doctrine.entitymanager');
    $counter = 0;
    while ($counter < (int)$params['newlinkshowdays']) {
        $count = $em->getRepository('Weblinks_Entity_Link')->countByDatePeriod($beginning, $end);

        echo "<a href='" . DataUtil::formatForDisplay(ModUtil::url('Weblinks', 'user', 'newlinksdate', array('selectdate' => $beginning->format("Ymd")))) . "'>" . DataUtil::formatForDisplay($beginning->format("M j, Y")) . "</a>&nbsp;(" . DataUtil::formatForDisplay($count) . ")<br />";
        $beginning->modify("-1 day");
        $end->modify("-1 day");
        $counter++;
    }
}