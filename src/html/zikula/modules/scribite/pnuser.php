<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnuser.php 198 2009-12-08 23:00:05Z hilope $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage scribite!
 */

//  scribite! not offers a user interface - so redirect to index.php
function scribite_user_main()
{
    return pnRedirect('index.php');
}

//  deprecated since Zikula 1.1.x supports systemhooks
function scribite_user_editorheader($args)
{
    return;
}

//  Load scribite! from systemhook
function scribite_user_run($args)
{

    // get the module name
    $args['modulename'] = pnModGetName();
    $module = $args['modulename'];

    // exit if Content module active - to avoid double loadings if user has given ids and functions
    if ($args['modulename'] == 'content') {
        return;
    }

    // Security check if user has COMMENT permission for scribite
    if (!SecurityUtil::checkPermission('scribite::', '$module::', ACCESS_COMMENT)) {
        return;
    }

    // get passed func
    $func = FormUtil::getPassedValue('func', isset($args['func']) ? $args['func'] : null, 'GET');

    // get config for current module
    $modconfig = array();
    $modconfig = pnModAPIFunc('scribite', 'user', 'getModuleConfig', array('modulename' => $args['modulename']));

    // return if module is not supported or editor is not set
    if (!$modconfig['mid'] || $modconfig['modeditor'] == '-') {
        return;
    }

    // check if current func is fine for editors or funcs is empty (or all funcs)
    if (in_array($func, $modconfig['modfuncs']) || $modconfig['modfuncs'][0] == 'all') {
        $args['areas']  = $modconfig['modareas'];
        $args['editor'] = $modconfig['modeditor'];

        $scribite = pnModFunc('scribite','user','loader', array('modulename' => $args['modulename'],
                                    'editor'     => $args['editor'],
                                    'areas'      => $args['areas']));

        // add the scripts to page header
        PageUtil::AddVar('rawtext', $scribite);

    }
}

//  scribite! loader
//  used for direct calls from modules - see dev-docs for use
function scribite_user_loader($args)
{
    $dom = ZLanguage::getModuleDomain('scribite');
    // Argument checks
    if (!isset($args['areas'])) {
        return LogUtil::registerError(__('Error! Could not do what you wanted. Please check your input.', $dom));
    }
    if (!isset($args['modulename'])) {
        $args['modulename'] = pnModGetName();
    }

    $module = $args['modulename'];

    // Security check if user has COMMENT permission for scribite and module
    if (!SecurityUtil::checkPermission('scribite::', '$module::', ACCESS_COMMENT)) {
        return;
    }

    // check for editor argument, if none given the default editor will be used
    if (!$args['editor']) {
        // get default editor from config
        $defaulteditor = pnModGetVar('scribite', 'DefaultEditor');
        if ($defaulteditor == '-') {
            return; // return if no default is set and no arg is given
            // id given editor doesn't exist use default editor
        } else {
            $args['editor'] = $defaulteditor;
        }
    }

    // check if editor argument exists, load default if not given
    if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => $args['editor']))) {

        // set some general parameters
        $postnukeBaseURL        = rtrim(pnGetBaseURL(),'/');
        $postnukeThemeBaseURL   = "$postnukeBaseURL/themes/" . DataUtil::formatForOS(pnUserGetTheme());
        $postnukeBaseURI        = rtrim(pnGetBaseURI(),'/');
        $postnukeBaseURI        = ltrim($postnukeBaseURI,'/');
        $postnukeRoot           = rtrim($_SERVER['DOCUMENT_ROOT'],'/');

        // prepare pnRender instance
        $pnRender = pnRender::getInstance('scribite', false);
        $pnRender->assign(pnModGetVar('scribite'));
        $pnRender->assign('modname', $args['modulename']);
        $pnRender->assign('postnukeBaseURL', $postnukeBaseURL);
        $pnRender->assign('postnukeBaseURI', $postnukeBaseURI);
        $pnRender->assign('postnukeRoot', $postnukeRoot);
        $pnRender->assign('editor_dir', $args['editor']);

        // check for modules installed providing plugins and load specific javascripts
        if (pnModAvailable('photoshare')) {
            PageUtil::AddVar('javascript', 'modules/photoshare/pnjavascript/findimage.js');
        }
        if (pnModAvailable('mediashare')) {
            PageUtil::AddVar('javascript', 'modules/mediashare/pnjavascript/finditem.js');
        }
        if (pnModAvailable('pagesetter')) {
            PageUtil::AddVar('javascript', 'modules/pagesetter/pnjavascript/findpub.js');
        }
        if (pnModAvailable('folder')) {
            PageUtil::AddVar('javascript', 'modules/folder/pnjavascript/selector.js');
        }
        if (pnModAvailable('MediaAttach')) {
            PageUtil::AddVar('javascript', 'modules/MediaAttach/pnjavascript/finditem.js');
        }
        if (pnModAvailable('Files')) {
            PageUtil::AddVar('javascript', 'modules/Files/pnjavascript/getFiles.js');
        }

        // main switch for choosen editor
        switch ($args['editor']) {

            case 'xinha':

                // get xinha config if editor is active

                // get plugins for xinha
                $xinha_listplugins = pnModGetVar('scribite', 'xinha_activeplugins');
                if ($xinha_listplugins != '') {
                        $xinha_listplugins = unserialize($xinha_listplugins);
                    if (in_array('ExtendedFileManager', $xinha_listplugins)) {
                        $pnRender->assign('EFMConfig', true);
                    } else {
                        $pnRender->assign('EFMConfig', false);
                    }
                    $xinha_listplugins = '\'' . DataUtil::formatForDisplay(implode('\', \'', $xinha_listplugins)) . '\'';
                }

                // prepare areas for xinha
                if ($args['areas'][0] == "all") {
                    $modareas = 'all';
                } elseif ($args['areas'][0] == "PagEd") {
                    $modareas = 'PagEd';
                } else {
                    $modareas = '\'' . DataUtil::formatForDisplay(implode('\', \'', $args['areas'])) . '\'';
                }

                // load Prototype
                PageUtil::AddVar('javascript', 'javascript/ajax/prototype.js');

                // set parameters
                $pnRender->assign('modareas', $modareas);
                $pnRender->assign('xinha_listplugins', $xinha_listplugins);

                // end xinha
                break;

            case 'tiny_mce':
                // get TinyMCE config if editor is active

                // get plugins for tiny_mce
                $tinymce_listplugins = pnModGetVar('scribite', 'tinymce_activeplugins');
                if ($tinymce_listplugins != '') {
                    $tinymce_listplugins = unserialize($tinymce_listplugins);
                    $tinymce_listplugins = DataUtil::formatForDisplay(implode(',', $tinymce_listplugins));
                }
                // prepare areas for tiny_mce
                if ($args['areas'][0] == "all") {
                    $modareas = 'all';
                } elseif ($args['areas'][0] == "PagEd") {
                    $modareas = 'PagEd';
                } else {
                    $modareas = DataUtil::formatForDisplay(implode(',', $args['areas']));
                }

                // check for allowed html
                $AllowableHTML = pnConfigGetVar('AllowableHTML');
                $disallowedhtml = array();
                while (list($key, $access) = each($AllowableHTML)) {
                    if ($access == 0) {
                        $disallowedhtml[] = DataUtil::formatForDisplay($key);
                    }
                }

                // pass disallowed html
                $disallowedhtml = implode(',', $disallowedhtml);

                // set parameters
                $pnRender->assign('modareas', $modareas);
                $pnRender->assign('tinymce_listplugins', $tinymce_listplugins);
                $pnRender->assign('disallowedhtml', $disallowedhtml);

                // end tiny_mce
                break;

            case 'fckeditor':
                // get FCKeditor config if editor is active

                // prepare areas for xinha
                if ($args['areas'][0] == "all") {
                    $modareas = 'all';
                } elseif ($args['areas'][0] == "PagEd") {
                    $modareas = 'PagEd';
                } else {
                    $modareas = $args['areas'];
                }

                // check for allowed html
                $AllowableHTML = pnConfigGetVar('AllowableHTML');
                $disallowedhtml = array();
                while (list($key, $access) = each($AllowableHTML)) {
                    if ($access == 0) {
                        $disallowedhtml[] = DataUtil::formatForDisplay($key);
                    }
                }

                // load Prototype
                PageUtil::AddVar('javascript', 'javascript/ajax/prototype.js');

                // set parameters
                $pnRender->assign('modareas', $modareas);
                $pnRender->assign('disallowedhtml', $disallowedhtml);

                // end fckeditor
                break;

            case 'openwysiwyg':
                // get openwysiwyg config if editor is active

                // prepare areas for openwysiwyg
                if ($args['areas'][0] == "all") {
                    $modareas = 'all';
                } else {
                    $modareas = $args['areas'];
                }

                // set parameters
                $pnRender->assign('modareas', $modareas);

                // end openwysiwyg
                break;

            case 'nicedit':
                // get nicEditor config if editor is active

                // prepare areas for nicEditor
                if ($args['areas'][0] == "all") {
                    $modareas = 'all';
                } else {
                    $modareas = $args['areas'];
                }

                // set parameters
                $pnRender->assign('modareas', $modareas);

                // end nicEditor
                break;

            case 'yui':
                // set body class for YUI Editor
                PageUtil::SetVar('body', 'class="yui-skin-sam"');

                // get YUI mode from config
                $yui_type = pnModGetVar('scribite', 'yui_type');

                // type switch
                if ($yui_type == 'Simple') {
                    // load scripts for YUI simple mode
                    PageUtil::AddVar('stylesheet', 'http://yui.yahooapis.com/2.6.0/build/assets/skins/sam/skin.css');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/yahoo-dom-event/yahoo-dom-event.js');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/element/element-beta-min.js');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/container/container_core-min.js');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/editor/simpleeditor-min.js');
                } else {
                    // load scripts for YUI Editor full mode
                    PageUtil::AddVar('stylesheet', 'http://yui.yahooapis.com/2.6.0/build/assets/skins/sam/skin.css');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/yahoo-dom-event/yahoo-dom-event.js');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/element/element-beta-min.js');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/container/container_core-min.js');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/menu/menu-min.js');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/button/button-min.js');
                    PageUtil::AddVar('javascript', 'http://yui.yahooapis.com/2.6.0/build/editor/editor-min.js');
                }

                // prepare areas for YUI
                if ($args['areas'][0] == "all") {
                    $modareas = 'all';
                } else {
                    $modareas = $args['areas'];
                }

                // set parameters
                $pnRender->assign('modareas', $modareas);

                // end yui
                break;

        }

        // pnRender output
        // 1. check if special template is required (from direct module call)
        if (isset($args['tpl']) && $pnRender->template_exists($args['tpl'])) {
            $templatefile = $args['tpl'];
        // 2. check if a module specific template exists
        } elseif ($pnRender->template_exists('scribite_'.$args['editor'].'_'.$args['modulename'].'.htm')) {
            $templatefile = 'scribite_'.$args['editor'].'_'.$args['modulename'].'.htm';
        // 3. if none of the above load default template
        } else {
            $templatefile = 'scribite_'.$args['editor'].'_editorheader.htm';
        }
        $output = $pnRender->fetch($templatefile);
        // end main switch

        return $output;
    }
}
