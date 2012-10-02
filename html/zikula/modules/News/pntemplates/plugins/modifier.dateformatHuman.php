<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.dateformatHuman.php 75 2009-02-24 04:51:52Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_3rdParty_Modules
 * @subpackage News
*/

/**
 * Smarty modifier to format datetimes in a more Human Readable form 
 * (like tomorow, 4 days from now, 6 hours ago)
 *
 * Example
 * <!--[$futuredate|dateformatHuman:'%x':'2']-->
 *
 * @author   Erik Spaan
 * @since    05/03/09
 * @param    string   $string   input datetime string
 * @param    string   $format   The format of the regular date output (default %x)
 * @param    string   $niceval  [1|2|3|4] Choose the nice value of the output (default 2)
 *                                    1 = full human readable
 *                                    2 = past date > 1 day with dateformat, otherwise human readable
 *                                    3 = within 1 day human readable, otherwise dateformat
 *                                    4 = only use the specified format
 * @return   string   the modified output
 */
function smarty_modifier_dateformatHuman($string, $format='%x', $niceval=2)
{
    $dom = ZLanguage::getModuleDomain('News');

    if (empty($format)) {
        $format = '%x';
    }
    // store the current datetime in a variable
    $now = DateUtil::getDatetime();

    if (empty($string)) {
        return DateUtil::formatDatetime($now, $format);
    }
    if (empty($niceval)) {
        $niceval = 2;
    }

    // now format the date with respect to the current datetime
    $res = '';
    $diff = DateUtil::getDatetimeDiff($now, $string);
    if ($diff['d'] < 0) {
        if ($niceval == 1) {
            $res = _fn('%s day ago', '%s days ago', abs($diff['d']), abs($diff['d']), $dom);
        } elseif ($niceval < 4 && $diff['d'] == -1) {
            $res = __('yesterday', $dom);
        } else {
            $res = DateUtil::formatDatetime($string, $format);
        }
    } elseif ($diff['d'] > 0) {
        if ($niceval > 2) {
            $res = DateUtil::formatDatetime($string, $format);
        } elseif ($diff['d'] == 1) {
            $res = __('tomorrow', $dom);
        } else {
            $res = _fn('%s day from now', '%s days from now', $diff['d'], $diff['d'], $dom);
        }
    } else {
        // no day difference
        if ($diff['h'] < 0) {
            $res = _fn('%s hour ago', '%s hours ago', abs($diff['h']), abs($diff['h']), $dom);
        } elseif ($diff['h'] > 0) {
            $res = _fn('%s hour from now', '%s hours from now', $diff['h'], $diff['h'], $dom);
        } else {
            // no hour difference
            if ($diff['m'] < 0) {
                $res = _fn('%s minute ago', '%s minutes ago', abs($diff['m']), abs($diff['m']), $dom);
            } elseif ($diff['m'] > 0) {
                $res = _fn('%s minute from now', '%s minutes from now', $diff['m'], $diff['m'], $dom);
            } else {
                // no min difference
                if ($diff['s'] < 0) {
                    $res = _fn('%s second ago', '%s seconds ago', abs($diff['s']), abs($diff['s']), $dom);
                } else {
                    $res = _fn('%s second from now', '%s seconds from now', $diff['s'], $diff['s'], $dom);
                }
            }
        }
    }

    return $res;
}
