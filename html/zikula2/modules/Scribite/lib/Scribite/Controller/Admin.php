<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 */
class Scribite_Controller_Admin extends Zikula_AbstractController
{

    public function postInitialize()
    {
        PageUtil::AddVar('javascript', 'prototype');
        //PageUtil::AddVar('javascript', 'javascript/ajax/scriptaculous.js');
        $this->view->setCaching(false);
    }

    // main function
    public function main()
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $this->redirect(ModUtil::url('Scribite', 'admin', 'modules'));
    }

    // modify Scribite configuration
    public function modifyconfig($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // load all editors
        $this->view->assign('editor_list', ModUtil::apiFunc('Scribite', 'user', 'getEditors', array('editorname' => 'list')));

        return $this->view->fetch('admin/modifyconfig.tpl');
    }

    // display modules
    public function modules($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $this->view->assign('editor_list', ModUtil::apiFunc('Scribite', 'user', 'getEditors', array('editorname' => 'list')));
        $modules = ModUtil::apiFunc('Scribite', 'user', 'getModuleConfig', array('modulename' => "list"));
        foreach ($modules as $key => $module) {
            $modules[$key]['modfunclist'] = implode(", ", unserialize($module['modfuncs']));
            $modules[$key]['modarealist'] = implode(", ", unserialize($module['modareas']));
            $modules[$key]['modeditortitle'] = ModUtil::apiFunc('Scribite', 'user', 'getEditorTitle', array('editorname' => $modules[$key]['modeditor']));
        }
        $this->view->assign('modconfig', $modules);

        return $this->view->fetch('admin/modules.tpl');
    }

    public function updateconfig($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        $vars['editors_path'] = FormUtil::getPassedValue('editors_path', 'modules/Scribite/pnincludes', 'POST');
        $vars['DefaultEditor'] = FormUtil::getPassedValue('DefaultEditor', '-', 'POST');

        if (!$this->setVars($vars)) {
            LogUtil::registerError($this->__('Error: Configuration not updated'));
        } else {
            LogUtil::registerStatus($this->__('Done! Module configuration updated.'));
        }
        $this->redirect(ModUtil::url('Scribite', 'admin', 'modifyconfig'));
    }

    // add new module config to Scribite
    public function newmodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get all editors
        $this->view->assign('editor_list', ModUtil::apiFunc('Scribite', 'user', 'getEditors', array('editorname' => 'list')));
        return $this->view->fetch('admin/addmodule.tpl');
    }

    // add new module to database
    public function addmodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // get args from template
        $modulename = FormUtil::getPassedValue('modulename', null, 'POST');
        $modfuncs = FormUtil::getPassedValue('modfuncs', null, 'POST');
        $modareas = FormUtil::getPassedValue('modareas', null, 'POST');
        $modeditor = FormUtil::getPassedValue('modeditor', null, 'POST');

        // create new module in db
        $mid = ModUtil::apiFunc('Scribite', 'admin', 'addmodule', array('modulename' => $modulename,
                    'modfuncs' => $modfuncs,
                    'modareas' => $modareas,
                    'modeditor' => $modeditor));

        // Error tracking
        if ($mid != false) {
            // Success
            LogUtil::registerStatus($this->__('Done! Module configuration added.'));
        } else {
            // Error
            LogUtil::registerError($this->__('Error: Module configuration not added'));
        }

        // return to main form
        $this->redirect(ModUtil::url('Scribite', 'admin', 'modules'));
    }

    // edit module config
    public function modifymodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get passed args
        $mid = FormUtil::getPassedValue('mid', null, 'GET');

        // get config for current module
        $modconfig = ModUtil::apiFunc('Scribite', 'admin', 'getModuleConfigfromID', array('mid' => $mid));

        $modules = ModUtil::getAllMods();

        // get all editors
        $this->view->assign('editor_list', ModUtil::apiFunc('Scribite', 'user', 'getEditors', array('editorname' => 'list')));
        $this->view->assign('mid', $modconfig['mid']);
        $this->view->assign('modulename', $modconfig['modname']);
        $this->view->assign('modfuncs', implode(',', unserialize($modconfig['modfuncs'])));
        $this->view->assign('modareas', implode(',', unserialize($modconfig['modareas'])));
        $this->view->assign('modeditor', $modconfig['modeditor']);

        return $this->view->fetch('admin/modifymodule.tpl');
    }

    // update module config in database
    public function updatemodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // get passed args and store to array
        $modconfig['mid'] = FormUtil::getPassedValue('mid', null, 'POST');
        $modconfig['modulename'] = FormUtil::getPassedValue('modulename', null, 'POST');
        $modconfig['modfuncs'] = FormUtil::getPassedValue('modfuncs', null, 'POST');
        $modconfig['modareas'] = FormUtil::getPassedValue('modareas', null, 'POST');
        $modconfig['modeditor'] = FormUtil::getPassedValue('modeditor', null, 'POST');

        $mod = ModUtil::apiFunc('Scribite', 'admin', 'editmodule', $modconfig);

        // error tracking
        if ($mod != false) {
            // Success
            LogUtil::registerStatus($this->__('Done! Module configuration updated.'));
        } else {
            // Error
            LogUtil::registerStatus($this->__('Configuration not updated'));
        }

        $this->redirect(ModUtil::url('Scribite', 'admin', 'modules'));
    }

    public function delmodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get module id
        $mid = FormUtil::getPassedValue('mid', null, 'GET');

        // get module config and name from id
        $modconfig = ModUtil::apiFunc('Scribite', 'admin', 'getModuleConfigfromID', array('mid' => $mid));

        // create smarty instance
        $this->view->assign('mid', $mid);
        $this->view->assign('modulename', $modconfig['modname']);
        return $this->view->fetch('admin/delmodule.tpl');
    }

    // del module config in database
    public function removemodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        $this->checkCsrfToken();

        // get passed args
        $args['mid'] = FormUtil::getPassedValue('mid', null, 'POST');

        // remove module entry from Scribite table
        $mod = ModUtil::apiFunc('Scribite', 'admin', 'delmodule', array('mid' => $args['mid']));

        if ($mod != false) {
            // Success
            LogUtil::registerStatus($this->__('Done! Module configuration updated.'));
        }

        // return to main page
        $this->redirect(ModUtil::url('Scribite', 'admin', 'main'));
    }

    public function modifyxinha($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // create smarty instance
        $this->view->assign($this->getVars());
        $this->view->assign('xinha_langlist', ModUtil::apiFunc('Scribite', 'admin', 'getxinhaLangs'));
        $this->view->assign('xinha_skinlist', ModUtil::apiFunc('Scribite', 'admin', 'getxinhaSkins'));
        $this->view->assign('xinha_allplugins', ModUtil::apiFunc('Scribite', 'admin', 'getxinhaPlugins'));
        return $this->view->fetch('admin/modifyxinha.tpl');
    }

    public function updatexinha($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get passed args
        $xinha_language = FormUtil::getPassedValue('xinha_language', 'en', 'POST');
        $xinha_skin = FormUtil::getPassedValue('xinha_skin', 'blue-look', 'POST');
        $xinha_barmode = FormUtil::getPassedValue('xinha_barmode', 'reduced', 'POST');
        $xinha_width = FormUtil::getPassedValue('xinha_width', 'auto', 'POST');
        $xinha_height = FormUtil::getPassedValue('xinha_height', 'auto', 'POST');
        $xinha_style = FormUtil::getPassedValue('xinha_style', 'modules/Scribite/style/xinha/editor.css', 'POST');
        $xinha_style_dynamiccss = FormUtil::getPassedValue('xinha_style_dynamiccss', 'modules/Scribite/style/xinha/DynamicCSS.css', 'POST');
        $xinha_style_stylist = FormUtil::getPassedValue('xinha_style_stylist', 'modules/Scribite/style/xinha/stylist.css', 'POST');
        $xinha_converturls = FormUtil::getPassedValue('xinha_converturls', '0', 'POST');
        $xinha_showloading = FormUtil::getPassedValue('xinha_showloading', '0', 'POST');
        $xinha_statusbar = FormUtil::getPassedValue('xinha_statusbar', 0, 'POST');
        $xinha_activeplugins = FormUtil::getPassedValue('xinha_activeplugins', null, 'POST');

        $this->checkCsrfToken();

        if (!$this->setVar('xinha_language', $xinha_language)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('xinha_skin', $xinha_skin)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('xinha_barmode', $xinha_barmode)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        $xinha_width = rtrim($xinha_width, 'px');
        if (!$this->setVar('xinha_width', $xinha_width)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        $xinha_height = rtrim($xinha_height, 'px');
        if (!$this->setVar('xinha_height', $xinha_height)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        $xinha_style = ltrim($xinha_style, '/');
        if (!$this->setVar('xinha_style', $xinha_style)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        $xinha_style_dynamiccss = ltrim($xinha_style_dynamiccss, '/');
        if (!$this->setVar('xinha_style_dynamiccss', $xinha_style_dynamiccss)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        $xinha_style_stylist = ltrim($xinha_style_stylist, '/');
        if (!$this->setVar('xinha_style_stylist', $xinha_style_stylist)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('xinha_converturls', $xinha_converturls)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('xinha_showloading', $xinha_showloading)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('xinha_statusbar', $xinha_statusbar)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!empty($xinha_activeplugins)) {
            $xinha_activeplugins = serialize($xinha_activeplugins);
        }
        if (!$this->setVar('xinha_activeplugins', $xinha_activeplugins)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }

        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));
        $this->redirect(ModUtil::url('Scribite', 'admin', 'modifyxinha'));
    }

    public function modifynicedit($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // create smarty instance
        $this->view->assign($this->getVars());

        return $this->view->fetch('admin/modifynicedit.tpl');
    }

    public function updatenicedit($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get passed args
        $nicedit_fullpanel = FormUtil::getPassedValue('nicedit_fullpanel', 0, 'POST');
        $nicedit_xhtml = FormUtil::getPassedValue('nicedit_xhtml', 0, 'POST');

        $this->checkCsrfToken();

        if (!$this->setVar('nicedit_fullpanel', $nicedit_fullpanel)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('nicedit_xhtml', $nicedit_xhtml)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }

        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

        $this->redirect(ModUtil::url('Scribite', 'admin', 'modifynicedit'));
    }

    public function modifyyui($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // create smarty instance
        $this->view->assign($this->getVars());

        // Get yui types
        $this->view->assign('yui_types', ModUtil::apiFunc('Scribite', 'admin', 'getyuitypes'));

        return $this->view->fetch('admin/modifyyui.tpl');
    }

    public function updateyui($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get passed args
        $yui_type = FormUtil::getPassedValue('yui_type', 'Simple', 'POST');
        $yui_width = FormUtil::getPassedValue('yui_width', 'auto', 'POST');
        $yui_height = FormUtil::getPassedValue('yui_height', 'auto', 'POST');
        $yui_dombar = FormUtil::getPassedValue('yui_dombar', false, 'POST');
        $yui_animate = FormUtil::getPassedValue('yui_animate', false, 'POST');
        $yui_collapse = FormUtil::getPassedValue('yui_collapse', false, 'POST');

        $this->checkCsrfToken();

        if (!$this->setVar('yui_type', $yui_type)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('yui_width', $yui_width)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('yui_height', $yui_height)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('yui_dombar', $yui_dombar)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('yui_animate', $yui_animate)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('yui_collapse', $yui_collapse)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

        $this->redirect(ModUtil::url('Scribite', 'admin', 'modifyyui'));
    }

    // CKEditor
    public function modifyckeditor($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get passed args
        $this->view->assign($this->getVars());
        $this->view->assign('ckeditor_barmodelist', ModUtil::apiFunc('Scribite', 'admin', 'getckeditorBarmodes'));
        $this->view->assign('ckeditor_langlist', ModUtil::apiFunc('Scribite', 'admin', 'getckeditorLangs'));
        $this->view->assign('ckeditor_skinlist', ModUtil::apiFunc('Scribite', 'admin', 'getckeditorSkins'));
        return $this->view->fetch('admin/modifyckeditor.tpl');
    }

    public function updateckeditor($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get passed args
        $ckeditor_language = FormUtil::getPassedValue('ckeditor_language', 'en', 'POST');
        $ckeditor_barmode = FormUtil::getPassedValue('ckeditor_barmode', 'Full', 'POST');
        $ckeditor_maxheight = FormUtil::getPassedValue('ckeditor_maxheight', '400', 'POST');
        $ckeditor_style_editor = FormUtil::getPassedValue('ckeditor_style_editor', 'modules/Scribite/style/ckeditor/content.css', 'POST');
        $ckeditor_skin = FormUtil::getPassedValue('ckeditor_skin', 'kama', 'POST');

        $this->checkCsrfToken();

        if (!$this->setVar('ckeditor_language', $ckeditor_language)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('ckeditor_barmode', $ckeditor_barmode)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('ckeditor_skin', $ckeditor_skin)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        $ckeditor_maxheight = rtrim($ckeditor_maxheight, 'px');
        if (!$this->setVar('ckeditor_maxheight', $ckeditor_maxheight)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        $ckeditor_style_editor = ltrim($ckeditor_style_editor, '/');
        if (!$this->setVar('ckeditor_style_editor', $ckeditor_style_editor)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

        $this->redirect(ModUtil::url('Scribite', 'admin', 'modifyckeditor'));
    }

    //markitup
    public function modifymarkitup($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // create smarty instance
        $this->view->assign($this->getVars());

        // Get markitup types
        $this->view->assign('markitup_types', ModUtil::apiFunc('Scribite', 'admin', 'getmarkituptypes'));

        return $this->view->fetch('admin/modifymarkitup.tpl');
    }

    public function updatemarkitup($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // get passed args
        $markitup_width = FormUtil::getPassedValue('markitup_width', 'auto', 'POST');
        $markitup_height = FormUtil::getPassedValue('markitup_height', 'auto', 'POST');

        $this->checkCsrfToken();

        if (!$this->setVar('markitup_width', $markitup_width)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        if (!$this->setVar('markitup_height', $markitup_height)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }
        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

        $this->redirect(ModUtil::url('Scribite', 'admin', 'modifymarkitup'));
    }

    public function modifytinymce($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());
        // create smarty instance
        $this->view->assign($this->getVars());
        $this->view->assign('tinymce_langlist', ModUtil::apiFunc('Scribite', 'admin', 'gettinymceLangs'));
        $this->view->assign('tinymce_themelist', ModUtil::apiFunc('Scribite', 'admin', 'gettinymceThemes'));
        $this->view->assign('tinymce_allplugins', ModUtil::apiFunc('Scribite', 'admin', 'gettinymcePlugins'));
        return $this->view->fetch('admin/modifytinymce.tpl');
    }

    public function updatetinymce($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());
        // get passed args
        $tinymce_language = FormUtil::getPassedValue('tinymce_language', 'en', 'POST');
        $tinymce_style = FormUtil::getPassedValue('tinymce_style', 'modules/Scribite/style/tinymce/style.css', 'POST');
        $tinymce_theme = FormUtil::getPassedValue('tinymce_theme', 'advanced', 'POST');
        $tinymce_width = FormUtil::getPassedValue('tinymce_width', '75%', 'POST');
        $tinymce_height = FormUtil::getPassedValue('tinymce_height', '400', 'POST');
        $tinymce_activeplugins = FormUtil::getPassedValue('tinymce_activeplugins', 'en', 'POST');
        $tinymce_dateformat = FormUtil::getPassedValue('tinymce_dateformat', '%Y-%m-%d', 'POST');
        $tinymce_timeformat = FormUtil::getPassedValue('tinymce_timeformat', '%H:%M:%S', 'POST');
        $this->checkCsrfToken();

        if (!$this->setVar('tinymce_language', $tinymce_language)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }

        $tinymce_style = ltrim($tinymce_style, '/');
        if (!$this->setVar('tinymce_style', $tinymce_style)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }

        if (!$this->setVar('tinymce_theme', $tinymce_theme)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }

        $tinymce_width = rtrim($tinymce_width, 'px');
        if (!$this->setVar('tinymce_width', $tinymce_width)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }

        $tinymce_height = rtrim($tinymce_height, 'px');
        if (!$this->setVar('tinymce_height', $tinymce_height)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }

        if (!empty($tinymce_activeplugins)) {
            $tinymce_activeplugins = serialize($tinymce_activeplugins);
        }

        if (!$this->setVar('tinymce_activeplugins', $tinymce_activeplugins)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
            return false;
        }

        if (!$this->setVar('tinymce_dateformat', $tinymce_dateformat)) {
            LogUtil::registerStatus($this->__('Configuration not updated'));
           return false;
        }

       if (!$this->setVar('tinymce_timeformat', $tinymce_timeformat)) {
           LogUtil::registerStatus($this->__('Configuration not updated'));
           return false;
        }


       // the module configuration has been updated successfuly
       LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

       $this->redirect(ModUtil::url('Scribite', 'admin', 'modifytinymce'));
    }
}
