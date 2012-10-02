<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.entrypoint.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to return the entry point to the site as configured in the settings
 *
 * This function returns the value of the config var entrypoint
 *
 * Available parameters:
 *   - none
 *
 *
 * @author       Frank Schummertz
 * @since        12.01.2008
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the config var entrypoint
 */
function smarty_function_entrypoint($params, &$smarty)
{
    return pnConfigGetVar('entrypoint', 'index.php');
}
