<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadmin.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage  pnRender
 */

/**
 * Main administration function
 *
 * This function provides the main administration interface
 *
 * @author       Joerg Napp
 * @return       output   the admin interface
 */
function pnRender_admin_main()
{
    // security check
    if (!SecurityUtil::checkPermission('pnRender::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // create pnRender object
    $pnRender = & pnRender::getInstance('pnRender', false);

    // assign the module vars
    $pnRender->assign(pnModGetVar('pnRender'));

    // register the pnrender object allow access to various smarty values
    $pnRender->register_object('pnrender', $pnRender);

    // fetch and return the output
    return $pnRender->fetch('pnrender_admin_modifyconfig.htm');
}


/**
 * Update the settings
 *
 * This is the function that is called with the results of the
 * form supplied by pnRender_admin_main to alter the admin settings
 *
 * @author       Joerg Napp
 * @param        settings   the options in an array
 */
function pnRender_admin_updateconfig($args)
{
    // security check
    if (!SecurityUtil::checkPermission('pnRender::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // confirm the auth key
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('pnRender','admin','main'));
    }

    // get the form input
    $settings = (array)FormUtil::getPassedValue('settings', array(), 'POST');

    $settings = isset($args['settings']) ? $args['settings'] : $settings;

    // check our input and set some defaults
    if (!isset($settings['lifetime']) || !is_numeric($settings['lifetime']) || $settings['lifetime'] < -1) {
        $settings['lifetime'] = 3600;
    }

    // set the variables
    pnModSetVar('pnRender', 'compile_check',   isset($settings['compile_check']) ? true : false);
    pnModSetVar('pnRender', 'force_compile',   isset($settings['force_compile']) ? true : false);
    pnModSetVar('pnRender', 'cache',           isset($settings['cache']) ? true : false);
    pnModSetVar('pnRender', 'expose_template', isset($settings['expose_template']) ? true : false);
    pnModSetVar('pnRender', 'lifetime',        (int)$settings['lifetime']);

    // Let any other modules know that the modules configuration has been updated
    pnModCallHooks('module','updateconfig','pnRender', array('module' => 'pnRender'));

    // the module configuration has been updated successfuly
    LogUtil::registerStatus(__('Done! Saved module configuration.'));

    return pnRedirect(pnModURL('pnRender', 'admin', 'main'));
}


/**
 * Clear compiled templates
 *
 * Using this function, the admin can clear all compiled templates for
 * the system.
 *
 * @author       Joerg Napp
 */
function pnRender_admin_clear_compiled($args)
{
    // security check
    if (!SecurityUtil::checkPermission('pnRender::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('pnRender','admin','main'));
    }

    pnModAPIFunc('pnRender', 'user', 'clear_compiled');

    LogUtil::registerStatus(__('Done! Deleted rendering engine compiled templates.'));
    return pnRedirect(pnModURL('pnRender', 'admin', 'main'));
}

/**
 * Clear cached pages
 *
 * Using this function, the admin can clear all cached templates for
 * the system.
 *
 * @author       Joerg Napp
 */
function pnRender_admin_clear_cache($args)
{
    if (!SecurityUtil::checkPermission('pnRender::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('pnRender','admin','main'));
    }

    pnModAPIFunc('pnRender', 'user', 'clear_cache');

    LogUtil::registerStatus(__('Done! Deleted rendering engine cached pages.'));
    return pnRedirect(pnModURL('pnRender', 'admin', 'main'));
}
