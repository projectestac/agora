<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnsecauthaction.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Example:
 * <!--[pnsecauthaction realm="0" comp="Stories::" inst=".*" level="ACCESS_ADMIN" assign="auth"]-->
 *
 * true/false will be returned.
 *
 * This file is a plugin for pnRender, the Zikula implementation of Smarty
 * @author       Steffen Voss (ArschMitOhren), http://www.post-nuke.net
 * @since        05/14/2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       boolean     authorized?
 */
function smarty_function_pnsecauthaction($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign'] : null;
    $comp   = isset($params['comp'])   ? $params['comp']   : null;
    $inst   = isset($params['inst'])   ? $params['inst']   : null;
    $level  = isset($params['level'])  ? $params['level']  : null;

    if (!$comp) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_function_pnsecauthaction', 'comp')));
        return false;
    }

    if (!$inst) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_function_pnsecauthaction', 'inst')));
        return false;
    }

    if (!$level) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('smarty_function_pnsecauthaction', 'level')));
        return false;
    }

    $result = SecurityUtil::checkPermission($comp, $inst, constant($level));

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
