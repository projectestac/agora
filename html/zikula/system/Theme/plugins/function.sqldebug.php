<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pagerendertime.php 19408 2006-07-13 13:20:58Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the site's page render time
 *
 * available parameters:
 *  - assign      if set, the messages will be assigned to this variable
 *  - round       if the, the time will be rounded to this number of decimal places 
 *                (optional: default 2)
 *
 * Example
 * <!--[sqldebug]-->
 *
 * @author   Mark West
 * @since    08/02/04
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @param    string   $round      format to apply to the number (based on the round php function)
 * @return   string   the page render time in seconds
 * @todo change to ML as language is hardcoded (as per .726).
 */
function smarty_function_sqldebug ($params, &$smarty)
{
    // show time to render
    $messages = array();

    global $PNConfig;
    global $PNRuntime;

    // determine log output generation
    $logDest = isset($PNConfig['Log']['log_dest']) ? $PNConfig['Log']['log_dest'] : '';
    if (isset($PNConfig['Log']['log_level_dest']['DB']) && $PNConfig['Log']['log_level_dest']['DB']) {
        $logDest = $PNConfig['Log']['log_level_dest']['DB'];
    }
    // generate count message
    $countRequest = 1;
    if ($PNConfig['Debug']['sql_count']) {
        $count      = (int)$PNRuntime['sql_count_request'];
        if ($logDest == 'PRINT') {
            $messages[] = '<div class="z-sub" style="text-align:center;">' . "Count: $count SQL statements" . '</div>';
        }
        else {
            $messages[] = "Count: $count SQL statements";
        }
    }

    // generate sql trace messages 
    if ($PNConfig['Debug']['sql_time'] || $PNConfig['Debug']['sql_detail']) {
        $time  = $PNRuntime['sql_time_request'];
        $count = $PNRuntime['sql_count_request'];
        $avg   = $time / ($count ? $count : 1);

        $round = isset($params['round']) ? $params['round'] : 3;
        $time  = round($time, $round);
        $avg   = round($avg, $round);

        if ($logDest == 'PRINT') {
            $messages[] = '<div class="z-sub" style="text-align:center;">' . "SQL Exec Time: $time (total), $avg (avg) seconds" . '</div>';
            $line = '<div class="z-sub" style="text-align:left;">';
        } else {
            $messages[] = "SQL Exec Time: $time (total), $avg (avg) seconds.";
            $line = '';
        }

        $br = ($logDest == 'PRINT' ? '<br />' : '');
        $c  = 1;

        foreach ($PNRuntime['sql'] as $sql)
        {
            $clean = str_replace ("\n", '', $sql['stmt']);
            $clean = str_replace ('  ', ' ', $clean);
            $line .= "SQL Stmt #$c $br\n";
            $line .= "- $clean $br\n";

            if (isset($sql['limit'])) {
              $line .= "-- Limit: $sql[limit]$br\n";
            }

            $line .= "-- Rows Affected: $sql[rows_affected] $br\n";
            if (isset($sql['rows_marshalled'])) {
                $line .= "-- Rows Marshalled: $sql[rows_marshalled] $br\n";
            }

            $line .= "-- Time: $sql[time] $br\n";

            if (isset($sql['rows'])) {
                $ct = 1;
                foreach($sql['rows'] as $row) {
                    $line .= "--- Row $ct: " . implode ('|', $row) . "$br\n";
                    $ct++;
                }
            }

            $line .= "$br\n";
            $c++;
        }

        if ($logDest == 'PRINT') {
            $line .= '</div>';
        }

        $messages[] = $line;
    }

    $output = implode ("\n", $messages);

    if ($logDest == 'PRINT') {
        return $output;
    }

    LogUtil::log ($output, 'DB');

    return '';
}
