<?php

/**
 * Copyright Scribite Team 2011
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package EasyUpload
 * @link https://github.com/zikula-modules/Scribite
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
class Scribite_FormHandler_ModifyConfig extends Zikula_Form_AbstractHandler
{

    function initialize(Zikula_Form_View $view)
    {
        if (!SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // get all editors
        $editorList = ModUtil::apiFunc('Scribite', 'admin', 'getEditors', array('format' => 'formdropdownlist'));
        $view->assign('editor_list', $editorList);
        $vars = $this->getVars();
        $view->assign($vars);
        $paramsString = '';
        if (isset($vars['defaultparameters'])) {
            foreach ($vars['defaultparameters'] as $param => $value) {
                $paramsString .= "$param:$value,";
            }
        }
        // overwrites previous assignment...
        $view->assign('defaultparameters', rtrim($paramsString, ","));

        return true;
    }

    function handleCommand(Zikula_Form_View $view, &$args)
    {

        $url = ModUtil::url('Scribite', 'admin', 'main');
        if ($args['commandName'] == 'cancel') {
            return $view->redirect($url);
        }


        // check for valid form
        if (!$view->isValid()) {
            return false;
        }

        // get passed args and store to array
        $data = $view->getValues();
        $this->setVars($data);

        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

        return $view->redirect($url);
    }

}
