<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pagerendertime.php 27363 2009-11-02 16:40:08Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the site's page render time
 *
 * available parameters:
 *  - assign      if set, the message will be assigned to this variable
 *  - round       if the, the time will be rounded to this number of decimal places
 *                (optional: default 2)
 *
 * Example
 * <!--[pagerendertime]--> outputs 'Page created in 0.18122792243958 seconds.'
 *
 * <!--[pagerendertime round=2]--> outputs 'Page created in 0.18 seconds.'
 *
 * @author   Mark West
 * @since    08/02/04
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @param    string   $round      format to apply to the number (based on the round php function)
 * @return   string   the page render time in seconds
 */
function smarty_function_pagerendertime($params, &$smarty)
{
    // show time to render
    if ($GLOBALS['PNConfig']['Debug']['pagerendertime']){
        // calcultate time to render
        $mtime = explode(' ',microtime());
        $dbg_endtime = $mtime[1] + $mtime[0];
        $dbg_totaltime = ($dbg_endtime - $GLOBALS['PNRuntime']['dbg_starttime']);

        $round = isset($params['round']) ? $params['round'] : 2;
        $dbg_totaltime = round($dbg_totaltime, $round);

        if (isset($params['assign'])) {
            $smarty->assign('rendertime', $dbg_totaltime);
        } else {
            // load language files
            $message = '<div class="z-sub" style="text-align:center;">' . __f('Page generated in %s seconds.', $dbg_totaltime) . '</div>';
            return $message;
        }
    }
}
