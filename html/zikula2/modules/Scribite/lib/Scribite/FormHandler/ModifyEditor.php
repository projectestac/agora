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
class Scribite_FormHandler_ModifyEditor extends Zikula_Form_AbstractHandler
{

    /**
     * The name of the editor plugin (not the full classname)
     * @var string 
     */
    private $editor;

    function initialize(Zikula_Form_View $view)
    {
        $view->addPluginDir('system/Admin/Resources/views/plugins'); // for Core 1.3.6+
        $view->addPluginDir('system/Admin/templates/plugins'); // for Core 1.3.5
        $this->editor = $view->getPluginName();

        $classname = 'ModulePlugin_Scribite_' . $this->editor . '_Plugin';

        if (method_exists($classname, 'getOptions')) {
            $options = $classname::getOptions();
            if (!empty($options)) {
                $view->assign($options);
            }
        }

        $view->assign(ModUtil::getVar("moduleplugin.scribite." . strtolower($this->editor)));

        return true;
    }

    function handleCommand(Zikula_Form_View $view, &$args)
    {
        if ($args['commandName'] == 'cancel') {
            $url = ModUtil::url('Scribite', 'admin', 'main');
            return $view->redirect($url);
        } else if ($args['commandName'] == 'restore') {
            $classname = 'ModulePlugin_Scribite_' . $this->editor . '_Plugin';
            if (method_exists($classname, 'getDefaults')) {
                $defaults = $classname::getDefaults();
                if (!empty($defaults)) {
                    ModUtil::setVars("moduleplugin.scribite." . strtolower($this->editor), $defaults);
                    LogUtil::registerStatus('Defaults succesfully restored.');
                }
            }
            return true;
        }

        // check for valid form
        if (!$view->isValid()) {
            return false;
        }

        $data = $view->getValues();
        ModUtil::setVars("moduleplugin.scribite." . strtolower($this->editor), $data);

        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

        return true;
    }

}