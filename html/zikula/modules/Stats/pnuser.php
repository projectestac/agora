<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuser.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

/**
 * display the main stats page
 *
 */
function stats_user_main()
{
    // Security check
    if (!SecurityUtil::checkPermission('Stats::', '::', ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

    // create the output object
    $pnRender = pnRender::getInstance('Stats');

    // assign the main site stats
    $pnRender->assign(pnModAPIFunc('Stats', 'user', 'getmain'));

    // assign the site start date
    $pnRender->assign('startdate', pnConfigGetVar('startdate'));

    // generate and assign the day and month names
    for ($i = 1; $i <= 12; $i++) {
        $monthnames[] = gmstrftime('%B', gmmktime(0,0,0,$i,1,'1970'));
    }
    $pnRender->assign('months', $monthnames);
    // loop counter starts as 4 since 4th Jan 1970 is a sunday; the first day of the week
    for ($i = 4; $i <= 11; $i++) {
        $weekdaynames[] = gmstrftime('%A', gmmktime(0,0,0,1,$i,'1970'));
    }
    $pnRender->assign('weekdays', $weekdaynames);

    // assign the browser and os stats
    $browserandos = pnModAPIFunc('Stats', 'user', 'getbrowseros');
    $pnRender->assign($browserandos);

    return $pnRender->fetch('stats_user_main.htm');
}
