<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.debug_backtrace.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to generate a backtrace for debugging purposes.
 *
 * Available parameters:
 *   - fulltrace        include parts of stack trace after the call to the error handler - 
 *                        by default these are excluded as they're not relevant
 *
 * @author       Mark West
 * @since        08/08/2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The URL
 */
function smarty_function_debug_backtrace($params, &$smarty)
{
    if (!isset($params['fulltrace'])) {
        return prayer(array_slice(debug_backtrace(), 8));
    } else {
        return prayer(debug_backtrace());
    }
}