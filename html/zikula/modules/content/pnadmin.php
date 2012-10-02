<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnadmin.php 371 2010-01-05 16:15:52Z herr.vorragend $
 * @license See license.txt
 */

Loader::requireOnce('modules/content/common.php');
Loader::requireOnce('includes/pnForm.php');

function content_admin_main()
{
    if (!SecurityUtil::checkPermission('content::', '::', ACCESS_ADMIN))
        return LogUtil::registerPermissionError();

    $dom = ZLanguage::getModuleDomain('content');

    $render = & pnRender::getInstance('content');

    return $render->fetch('content_admin_main.html');
}

class content_admin_settingsHandler extends pnFormHandler
{
    function initialize(&$render)
    {
        if (!SecurityUtil::checkPermission('content::', '::', ACCESS_ADMIN))
            return $render->pnFormRegisterError(LogUtil::registerPermissionError());

        // Assign all module vars
        $render->assign('config', pnModGetVar('Content'));

        return true;
    }

    function handleCommand(&$render, &$args)
    {
        $dom = ZLanguage::getModuleDomain('content');
        if ($args['commandName'] == 'save') {
            if (!$render->pnFormIsValid())
                return false;

            $data = $render->pnFormGetValues();

            if (!pnModSetVars('content', $data['config']))
                return $render->pnFormSetErrorMsg('Failed to set configuration variables');

            LogUtil::registerStatus(__('Done! Saved module configuration.', $dom));
        } else if ($args['commandName'] == 'cancel') {
        }

        $url = pnModUrl('content', 'admin', 'main');

        return $render->pnFormRedirect($url);
    }
}

function content_admin_settings()
{
    $render = FormUtil::newpnForm('content');
    return $render->pnFormExecute('content_admin_settings.html', new content_admin_settingsHandler($args));
}

