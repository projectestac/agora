<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pndebugenvironment.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get all session variables
 *
 * This function gets all session vars from the Zikula system assigns the names and
 * values to two array. This is being used in pndebug to show them.
 *
 * Example
 *   <!--[pndebugenvironment]-->
 *
 *
 * @author       Frank Schummertz
 * @since        23/08/2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       nothing
 */
function smarty_function_pndebugenvironment($params, &$smarty)
{
    global $HTTP_SESSION_VARS;

    $allvars = $HTTP_SESSION_VARS;
    $smarty->assign('_pnsession_keys', array_keys($allvars) );
    $smarty->assign('_pnsession_vals', array_values($allvars) );

    $smarty->assign('_smartyversion', $smarty->_version);
    $_pnrender = pnModGetInfo(pnModGetIDFromName('pnRender'));
    $smarty->assign('_pnrenderversion', $_pnrender['version']);
    $_theme = pnModGetInfo(pnModGetIDFromName('Theme'));
    $smarty->assign('_themeversion', $_theme['version']);

    $smarty->assign('_force_compile', (pnModGetVar('pnRender', 'force_compile')) ? __('On') : __('Off'));
    $smarty->assign('_compile_check', (pnModGetVar('pnRender', 'compile_check')) ? __('On') : __('Off'));

    $smarty->assign('_baseurl', pnGetBaseURL());
    $smarty->assign('_baseuri', pnGetBaseURI());

    $smarty->assign('template', $smarty->_plugins['function']['pndebug'][1]);
    $smarty->assign('_path',    $smarty->get_template_path($smarty->_plugins['function']['pndebug'][1]));
    $smarty->assign('_line',    $smarty->_plugins['function']['pndebug'][2]);
}
