<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.pndate_format.php 27241 2009-10-28 12:33:02Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Dateformat modifier
 * Include the shared.make_timestamp.php plugin
 *
 * Example:
 * <!--[$timestamp|pndate_format:'%a, %d %b %Y']-->
 * Saturday, 12 Dec 2009
 *
 * <!--[$timestamp|pndate_format:'%a, %d %b %Y':$defaultimestamp]-->
 * If $timestamp is empty the $defaultimestamp will be used
 */
require_once $smarty->_get_plugin_filepath('shared', 'make_timestamp');

/**
 * Smarty modifier to format datestamps via strftime according to
 * locale setting in Zikula
 *
 * @author   Frank Schummertz
 * @author   Steffen Voss
 * @since    15. Jan. 2004
 * @param    string   $string         input date string
 * @param    string   format          strftime format for output
 * @param    string   default_date    default date if $string is empty
 * @return   string   the modified output
 * @uses     smarty_make_timestamp()
 */
function smarty_modifier_pndate_format($string, $format = 'datebrief', $default_date = null)
{
    if (empty($format)) {
        $format = 'datebrief';
    }

    if (!empty($string)) {
        return DateUtil::formatDatetime($string, $format);
    } elseif (!empty($default_date)) {
        return DateUtil::formatDatetime($default_date, $format);
    }

    return '';
}
