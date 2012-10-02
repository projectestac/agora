<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.securityutil_checkpermission.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Example:
 * <!--[securityutil_checkpermission component='Users::' instance='.*' level='ACCESS_ADMIN' assign='auth']-->
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
function smarty_function_securityutil_checkpermission($params, &$smarty)
{
    if (!isset($params['component'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('securityutil_checkpermission', 'component')));
        return false;
    }

    if (!isset($params['instance'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('securityutil_checkpermission', 'instance')));
        return false;
    }

    if (!isset($params['level'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('securityutil_checkpermission', 'level')));
        return false;
    }

    $result = SecurityUtil::checkPermission($params['component'], $params['instance'], constant($params['level']));

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $result);
    } else {
        return $result;
    }
}
