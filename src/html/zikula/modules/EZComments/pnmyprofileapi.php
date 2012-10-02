<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pnmyprofileapi.php 652 2009-12-20 18:25:42Z mateo $
 * @license See license.txt
 */

/**
 * This function returns the name of the tab
 *
 * @return string
 */
function EZComments_myprofileapi_getTitle($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');
    $uid = (int) FormUtil::getPassedValue('uid');

    $settings = pnModAPIFunc('MyProfile', 'user', 'getSettings', array('uid' => $uid));
    if ($settings['nocomments'] == 1) {
        // Show no tab header
        return false;
    } else {
        return __("User's pinboard", $dom);
    }
}

/**
 * This function returns additional options that should be added to the plugin url
 *
 * @return array
 */
function EZComments_myprofileapi_getURLAddOn($args)
{
    return array('order' => 1);
}

/**
 * This function shows the content of the main MyProfile tab
 *
 * @return output
 */
function EZComments_myprofileapi_tab($args)
{
    // is ezcomment hook activated for myprofile module?
    $dom = ZLanguage::getModuleDomain('EZComments');

    $result = pnModIsHooked('EZComments', 'MyProfile');
    if (!$result) {
        if (!pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'MyProfile', 'hookmodname' => 'EZComments'))) {
            return LogUtil::registerError(__('Registering EZComments hook for MyProfile module failed', $dom));
        }
    }

    // generate output
    $render = & pnRender::getInstance('EZComments');

    $render->assign('uid', (int) $args['uid']);
    $render->assign('viewer_uid', pnUserGetVar('uid'));
    $render->assign('uname', pnUserGetVar('uname', (int) $args['uid']));
    $render->assign('settings', pnModAPIFunc('MyProfile', 'user', 'getSettings', array('uid' => $args['uid'])));

    return $render->fetch('ezcomments_myprofile_tab.htm');
}

/**
 * This function returns 1 if Ajax should not be used loading the plugin
 *
 * @return string
 */
function EZComments_myprofileapi_noAjax($args)
{
    return true;
}
