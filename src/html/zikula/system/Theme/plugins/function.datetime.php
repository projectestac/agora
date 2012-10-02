<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.datetime.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the current date and time
 *
 * Example
 * <!--[datetime]-->
 *
 * <!--[datetime format='datebrief']-->
 *
 * <!--[datetime format='%b %d, %Y - %I:%M %p']-->
 *
 * Format:
 * %a - abbreviated weekday name according to the current locale
 * %A = full weekday name according to the current locale
 * %b = abbreviated month name according to the current locale
 * %B = full month name according to the current locale
 * %d = day of the month as a decimal number (range 01 to 31)
 * %D = same as %m/%d/%y
 * %y = year as a decimal number without a century (range 00 to 99)
 * %Y = year as a decimal number including the century
 * %H = hour as a decimal number using a 24-hour clock (range 00 to 23)
 * %I = hour as a decimal number using a 12-hour clock (range 01 to 12)
 * %M = minute as a decimal number
 * %S = second as a decimal number
 * %p = either 'am' or 'pm' according to the given time value, or the corresponding strings for the current locale
 *
 * http://www.php.net/manual/en/function.strftime.php
 *
 * @author       Mark West & Martin Andersen
 * @since        19/10/2003
 * @see          function.datetime.php::smarty_function_datetime()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      format       Date and time format
 * @return       string      current date and time
 */
function smarty_function_datetime($params, &$smarty)
{
    // set some defaults
    $format = isset($params['format']) ? $params['format'] : __('%b %d, %Y - %I:%M %p');

    if (strpos($format, '%') !== false) { // allow the use of conversion specifiers
        return DateUtil::formatDatetime('', $format);
    }

    return DateUtil::formatDatetime('', $format);
}
