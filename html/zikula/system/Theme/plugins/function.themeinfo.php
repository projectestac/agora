<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.themeinfo.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the theme info
 *
 * Example
 * <!--[themeinfo]-->
 *
 * @author       Mark West
 * @since        10/11/03
 * @see          function.themeinfo.php::smarty_function_themeinfo()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the themeinfo
 */
function smarty_function_themeinfo($params, &$smarty)
{
    $thistheme = pnUserGetTheme();
    $themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName($thistheme));

    $themecredits = '<!-- ' . __f('Theme: %1$s by %2$s - %3$s', array(DataUtil::formatForDisplay($themeinfo['display']), DataUtil::formatForDisplay($themeinfo['author']), DataUtil::formatForDisplay($themeinfo['contact']))).' -->';

    return $themecredits;
}
