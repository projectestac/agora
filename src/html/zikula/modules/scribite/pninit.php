<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pninit.php 198 2009-12-08 23:00:05Z hilope $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage scribite!
 */

function scribite_init()
{
    $dom = ZLanguage::getModuleDomain('scribite');

    // check for Zikula version, this sversion only works with 1.2.0 and above
    // and create the system init hook
    if (PN_VERSION_NUM < '1.2.0' ) {
        LogUtil::registerError(__('This version of scribite! only works with Zikula 1.2.x and higher. Please upgrade your Zikula version or use scribite! version 2.x or 3.x .', $dom));
        return false;
    }

    if (!DBUtil::createTable('scribite')) {
        return false;
    }

    if (!pnModRegisterHook('zikula', 'systeminit', 'GUI', 'scribite', 'user', 'run')) {
        return LogUtil::registerError(__('Error creating Hook!', $dom));
    }
    pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'scribite'));
    LogUtil::registerStatus(__('<strong>scribite!</strong> was activated as core hook. You can check settings <a href="index.php?module=Modules&type=admin&func=hooks&id=0">here</a>!<br />The template plugin from previous versions of scribite! can be removed from templates.', $dom));

    // create the default data for the module
    scribite_defaultdata();

    // Initialisation successful
    return true;
}

function scribite_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('scribite');

     // check for Zikula version, this sversion only works with 1.2.0 and above
    // and create the system init hook
    if (PN_VERSION_NUM < '1.2.0' ) {
        LogUtil::registerError(__('This version from scribite! only works with Zikula 1.2.x and higher. Please upgrade your Zikula version or use scribite! version 2.x or 3.x .', $dom));
        return false;
    }

    switch($oldversion) {
        case '1.0':
            // no changes made

        case '1.1':
            // delete old paths
            pnModDelVar('scribite', 'xinha_path');
            pnModDelVar('scribite', 'tinymce_path');
            // set new path
            pnModSetVar('scribite', 'editors_path', 'javascript/scribite_editors');

        case '1.2':
            if (!DBUtil::createTable('scribite'))
            {
                return false;
            }
            // create the default data for the module
            scribite_defaultdata();
            // del old module vars
            pnModDelVar('scribite', 'editor');
            pnModDelVar('scribite', 'editor_activemodules');

        case '1.21':
            // create new values
            pnModSetVar('scribite', 'openwysiwyg_barmode', 'full');
            pnModSetVar('scribite', 'openwysiwyg_width', '400');
            pnModSetVar('scribite', 'openwysiwyg_height', '300');
            pnModSetVar('scribite', 'xinha_statusbar', 1);

        case '1.3':
            // create new values
            pnModSetVar('scribite', 'openwysiwyg_barmode', 'full');
            pnModSetVar('scribite', 'openwysiwyg_width', '400');
            pnModSetVar('scribite', 'openwysiwyg_height', '300');
            pnModSetVar('scribite', 'xinha_statusbar', 1);

        case '2.0':
            // create new values
            pnModSetVar('scribite', 'DefaultEditor', '-');
            pnModSetVar('scribite', 'nicedit_fullpanel', 1);
            // fill some vars with defaults
            if (!pnModGetVar('scribite', 'xinha_converturls')) {
                pnModSetVar('scribite', 'xinha_converturls', 1);
            }
            if (!pnModGetVar('scribite', 'xinha_showloading')) {
                pnModSetVar('scribite', 'xinha_showloading', 1);
            }
            if (!pnModGetVar('scribite', 'xinha_activeplugins')) {
                pnModSetVar('scribite', 'xinha_activeplugins', 'a:2:{i:0;s:7:"GetHtml";i:1;s:12:"SmartReplace";}');
            }
            if (!pnModGetVar('scribite', 'tinymce_activeplugins')) {
                pnModSetVar('scribite', 'tinymce_activeplugins', '');
            }
            if (!pnModGetVar('scribite', 'fckeditor_autolang')) {
                pnModSetVar('scribite', 'fckeditor_autolang', 1);
            }
            //create new module vars for crpCalendar
            $item = array('modname'   => 'crpCalendar',
                    'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                    'modareas'  => 'a:1:{i:0;s:22:"crpcalendar_event_text";}',
                    'modeditor' => '-');
            if (!DBUtil::insertObject($item, 'scribite', false, 'mid')) {
                LogUtil::registerError(__('Error! Could not update module configuration.', $dom));
                return '2.0';
            }

        case '2.1':
            //create new module vars for Content
            $record = array(array('modname'   => 'content',
                        'modfuncs'  => 'a:1:{i:0;s:5:"dummy";}',
                        'modareas'  => 'a:1:{i:0;s:5:"dummy";}',
                        'modeditor' => '-'));
            DBUtil::insertObjectArray($record, 'scribite', 'mid');

        case '2.2':
            //create new module vars for Blocks #14
            $record = array(array('modname'   => 'Blocks',
                        'modfuncs'  => 'a:1:{i:0;s:6:"modify";}',
                        'modareas'  => 'a:1:{i:0;s:14:"blocks_content";}',
                        'modeditor' => '-'));
            DBUtil::insertObjectArray($record, 'scribite', 'mid');
            // check for Zikula 1.1.x version
            if (PN_VERSION_NUM < '1.1.0' ) {
                LogUtil::registerError(__('This version from scribite! only works with Zikula 1.1.x and higher. Please upgrade your Zikula version or use scribite! version 2.x .', $dom));
                return '2.2';
            }
            // create systeminit hook - new in Zikula 1.1.0
            if (!pnModRegisterHook('zikula', 'systeminit', 'GUI', 'scribite', 'user', 'run')) {
                LogUtil::registerError(__('Error creating Hook!', $dom));
                return '2.2';
            }
            pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'scribite'));
            LogUtil::registerStatus(__('<strong>scribite!</strong> was activated as core hook. You can check settings <a href="index.php?module=Modules&type=admin&func=hooks&id=0">here</a>!<br />The template plugin from previous versions of scribite! can be removed from templates.', $dom));

        case '3.0':
            //create new module vars for Newsletter and Web_Links
            $record = array(array('modname'   => 'Newsletter',
                                'modfuncs'  => 'a:1:{i:0;s:11:"add_message";}',
                                'modareas'  => 'a:1:{i:0;s:7:"message";}',
                                'modeditor' => '-'),
                            array('modname'   => 'crpVideo',
                                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                                'modareas'  => 'a:1:{i:0;s:13:"video_content";}',
                                'modeditor' => '-'),
                            array('modname'   => 'Web_Links',
                                'modfuncs'  => 'a:3:{i:0;s:8:"linkview";i:1;s:7:"addlink";i:2;s:17:"modifylinkrequest";}',
                                'modareas'  => 'a:1:{i:0;s:11:"description";}',
                                'modeditor' => '-'));
            DBUtil::insertObjectArray($record, 'scribite', 'mid');

            // set vars for YUI Rich Text Editor
            if (!pnModGetVar('scribite', 'yui_type')) {
                pnModSetVar('scribite', 'yui_type', 'Simple');
            }
            if (!pnModGetVar('scribite', 'yui_width')) {
                pnModSetVar('scribite', 'yui_width', 'auto');
            }
            if (!pnModGetVar('scribite', 'yui_height')) {
                pnModSetVar('scribite', 'yui_height', '300');
            }
            if (!pnModGetVar('scribite', 'yui_dombar')) {
                pnModSetVar('scribite', 'yui_dombar', true);
            }
            if (!pnModGetVar('scribite', 'yui_animate')) {
                pnModSetVar('scribite', 'yui_animate', true);
            }
            if (!pnModGetVar('scribite', 'yui_collapse')) {
                pnModSetVar('scribite', 'yui_collapse', true);
            }

        case '3.1':
            // modify Profile module
            $originalconfig = pnModAPIFunc('scribite', 'user', 'getModuleConfig', array('modulename' => "Profile"));
            $newconfig = array('mid'        => $originalconfig['mid'],
                               'modulename' => 'Profile',
                               'modfuncs'   => "modify",
                               'modareas'   => "prop_signature,prop_extrainfo,prop_yinterests",
                               'modeditor'  => $originalconfig['modeditor']);
            $modupdate = pnModAPIFunc('scribite', 'admin', 'editmodule', $newconfig);

        case '3.2':
            // set new editors folder
            pnModSetVar('scribite', 'editors_path', 'modules/scribite/pnincludes');
            LogUtil::registerStatus(__('<strong>Caution!</strong><br />All editors have moved to /modules/scribite/pnincludes in preparation for upcoming features of Zikula. Please check all your settings!<br />If you have adapted files from editors you have to check them too.<br /><br /><strong>Dropped support for FCKeditor and TinyMCE<strong><br />For security reasons these editors will not be supported anymore. Please change editors to an other editor.', $dom));


    }

    // clear the cache folders
    $smarty =& new Smarty;
    $smarty->compile_dir = pnConfigGetVar('temp') . '/pnRender_compiled';
    $smarty->cache_dir = pnConfigGetVar('temp') . '/pnRender_cache';
    $smarty->use_sub_dirs = false;
    $smarty->clear_compiled_tpl();
    $smarty->clear_all_cache();

    return true;
}

function scribite_delete()
{
    $dom = ZLanguage::getModuleDomain('scribite');
    // drop table
    if (!DBUtil::dropTable('scribite')) {
        return false;
    }

    // Delete any module variables
    pnModDelVar('scribite');

    // delete the system init hook
    if (!pnModUnregisterHook('zikula', 'systeminit', 'GUI', 'scribite', 'user', 'run')) {
        return LogUtil::registerError(__('Error deleting Hook!', $dom));
    }
    // Deletion successful
    return true;
}

function scribite_defaultdata()
{
    // Set editor defaults
    pnModSetVar('scribite', 'editors_path', 'modules/scribite/pnincludes');
    pnModSetVar('scribite', 'xinha_language', 'en');
    pnModSetVar('scribite', 'xinha_skin', 'blue-look');
    pnModSetVar('scribite', 'xinha_barmode', 'reduced');
    pnModSetVar('scribite', 'xinha_width', 'auto');
    pnModSetVar('scribite', 'xinha_height', 'auto');
    pnModSetVar('scribite', 'xinha_style', 'modules/scribite/pnconfig/xinha/editor.css');
    pnModSetVar('scribite', 'xinha_statusbar', 1);
    pnModSetVar('scribite', 'xinha_converturls', 1);
    pnModSetVar('scribite', 'xinha_showloading', 1);
    pnModSetVar('scribite', 'xinha_activeplugins', 'a:2:{i:0;s:7:"GetHtml";i:1;s:12:"SmartReplace";}');
/* deprecated editors
    pnModSetVar('scribite', 'tinymce_language', 'en');
    pnModSetVar('scribite', 'tinymce_style', 'modules/scribite/pnconfig/tiny_mce/editor.css');
    pnModSetVar('scribite', 'tinymce_theme', 'simple');
    pnModSetVar('scribite', 'tinymce_width', '75%');
    pnModSetVar('scribite', 'tinymce_height', '400');
    pnModSetVar('scribite', 'tinymce_dateformat', '%Y-%m-%d');
    pnModSetVar('scribite', 'tinymce_timeformat', '%H:%M:%S');
    pnModSetVar('scribite', 'tinymce_activeplugins', '');
    pnModSetVar('scribite', 'fckeditor_language', 'en');
    pnModSetVar('scribite', 'fckeditor_barmode', 'Default');
    pnModSetVar('scribite', 'fckeditor_width', '500');
    pnModSetVar('scribite', 'fckeditor_height', '400');
    pnModSetVar('scribite', 'fckeditor_autolang', 1);
*/
    pnModSetVar('scribite', 'openwysiwyg_barmode', 'full');
    pnModSetVar('scribite', 'openwysiwyg_width', '400');
    pnModSetVar('scribite', 'openwysiwyg_height', '300');
    pnModSetVar('scribite', 'nicedit_fullpanel', 0);
    pnModSetVar('scribite', 'yui_type', 'Simple');
    pnModSetVar('scribite', 'yui_width', 'auto');
    pnModSetVar('scribite', 'yui_height', '300');
    pnModSetVar('scribite', 'yui_dombar', true);
    pnModSetVar('scribite', 'yui_animate', true);
    pnModSetVar('scribite', 'yui_collapse', true);

    // set database module defaults
    $record = array(array('modname'   => 'About',
                'modfuncs'  => 'a:1:{i:0;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:10:"about_info";}',
                'modeditor' => '-'),
            array('modname'   => 'Admin_Messages',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:22:"admin_messages_content";}',
                'modeditor' => '-'),
            array('modname'   => 'Blocks',
                'modfuncs'  => 'a:1:{i:0;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:14:"blocks_content";}',
                'modeditor' => '-'),
            array('modname'   => 'Book',
                'modfuncs'  => 'a:1:{i:0;s:3:"all";}',
                'modareas'  => 'a:1:{i:0;s:7:"content";}',
                'modeditor' => '-'),
            array('modname'   => 'ContentExpress',
                'modfuncs'  => 'a:3:{i:0;s:0:"";i:1;s:10:"newcontent";i:2;s:11:"editcontent";}',
                'modareas'  => 'a:1:{i:0;s:4:"text";}',
                'modeditor' => '-'),
            array('modname'   => 'crpCalendar',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:22:"crpcalendar_event_text";}',
                'modeditor' => '-'),
            array('modname'   => 'crpVideo',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:13:"video_content";}',
                'modeditor' => '-'),
            array('modname'   => 'cotype',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:4:"edit";}',
                'modareas'  => 'a:1:{i:0;s:4:"text";}',
                'modeditor' => '-'),
            array('modname'   => 'content',
                'modfuncs'  => 'a:1:{i:0;s:3:"dummy";}',
                'modareas'  => 'a:1:{i:0;s:4:"dummy";}',
                'modeditor' => '-'),
            array('modname'   => 'element',
                'modfuncs'  => 'a:5:{i:0;s:11:"start_topic";i:1;s:9:"add_topic";i:2;s:10:"edit_topic";i:3;s:10:"view_topic";i:4;s:9:"edit_post";}',
                'modareas'  => 'a:1:{i:0;s:4:"comm";}',
                'modeditor' => '-'),
            array('modname'   => 'eventia',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:26:"eventia_course_description";}',
                'modeditor' => '-'),
            array('modname'   => 'FAQ',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:9:"faqanswer";}',
                'modeditor' => '-'),
            array('modname'   => 'htmlpages',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:17:"htmlpages_content";}',
                'modeditor' => '-'),
            array('modname'   => 'Mailer',
                'modfuncs'  => 'a:1:{i:0;s:10:"testconfig";}',
                'modareas'  => 'a:1:{i:0;s:11:"mailer_body";}',
                'modeditor' => '-'),
            array('modname'   => 'mediashare',
                'modfuncs'  => 'a:3:{i:0;s:8:"addmedia";i:1;s:8:"edititem";i:2;s:8:"addalbum";i:3;s:9:"editalbum";}',
                'modareas'  => 'a:1:{i:0;s:3:"all";}',
                'modeditor' => '-'),
            array('modname'   => 'News',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:2:{i:0;s:13:"news_hometext";i:1;s:13:"news_bodytext";}',
                'modeditor' => '-'),
            array('modname'   => 'Newsletter',
                'modfuncs'  => 'a:1:{i:0;s:11:"add_message";}',
                'modareas'  => 'a:1:{i:0;s:7:"message";}',
                'modeditor' => '-'),
            array('modname'   => 'PagEd',
                'modfuncs'  => 'a:1:{i:0;s:3:"all";}',
                'modareas'  => 'a:1:{i:0;s:5:"PagEd";}',
                'modeditor' => '-'),
            array('modname'   => 'Pages',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:13:"pages_content";}',
                'modeditor' => '-'),
            array('modname'   => 'pagesetter',
                'modfuncs'  => 'a:1:{i:0;s:7:"pubedit";}',
                'modareas'  => 'a:1:{i:0;s:3:"all";}',
                'modeditor' => '-'),
            array('modname'   => 'PhotoGallery',
                'modfuncs'  => 'a:2:{i:0;s:11:"editgallery";i:1;s:9:"editphoto";}',
                'modareas'  => 'a:1:{i:0;s:17:"photogallery_desc";}',
                'modeditor' => '-'),
            array('modname'   => 'pncommerce',
                'modfuncs'  => 'a:1:{i:0;s:8:"itemedit";}',
                'modareas'  => 'a:1:{i:0;s:15:"ItemDescription";}',
                'modeditor' => '-'),
            array('modname'   => 'pnForum',
                'modfuncs'  => 'a:4:{i:0;s:9:"viewtopic";i:1;s:8:"newtopic";i:2;s:8:"editpost";i:3;s:5:"reply";}',
                'modareas'  => 'a:1:{i:0;s:7:"message";}',
                'modeditor' => '-'),
            array('modname'   => 'pnhelp',
                'modfuncs'  => 'a:1:{i:0;s:4:"edit";}',
                'modareas'  => 'a:1:{i:0;s:4:"text";}',
                'modeditor' => '-'),
            array('modname'   => 'pnMessages',
                'modfuncs'  => 'a:2:{i:0;s:5:"newpm";i:1;s:10:"replyinbox";}',
                'modareas'  => 'a:1:{i:0;s:7:"message";}',
                'modeditor' => '-'),
            array('modname'   => 'pnWebLog',
                'modfuncs'  => 'a:2:{i:0;s:10:"addposting";i:1;s:7:"addpage";}',
                'modareas'  => 'a:1:{i:0;s:9:"xinhatext";}',
                'modeditor' => '-'),
            array('modname'   => 'Profile',
                'modfuncs'  => 'a:1:{i:0;s:6:"modify";}',
                'modareas'  => 'a:3:{i:0;s:14:"prop_signature";i:1;s:14:"prop_extrainfo";i:2;s:15:"prop_yinterests";}',
                'modeditor' => '-'),
            array('modname'   => 'PostCalendar',
                'modfuncs'  => 'a:1:{i:0;s:3:"all";}',
                'modareas'  => 'a:1:{i:0;s:11:"description";}',
                'modeditor' => '-'),
            array('modname'   => 'Reviews',
                'modfuncs'  => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:14:"reviews_review";}',
                'modeditor' => '-'),
            array('modname'   => 'ShoppingCart',
                'modfuncs'  => 'a:1:{i:0;s:3:"all";}',
                'modareas'  => 'a:1:{i:0;s:11:"description";}',
                'modeditor' => '-'),
            array('modname'   => 'tFAQ',
                'modfuncs'  => 'a:2:{i:0;s:4:"view";i:1;s:6:"modify";}',
                'modareas'  => 'a:1:{i:0;s:8:"tfanswer";}',
                'modeditor' => '-'),
            array('modname'   => 'Web_Links',
                'modfuncs'  => 'a:3:{i:0;s:8:"linkview";i:1;s:7:"addlink";i:2;s:17:"modifylinkrequest";}',
                'modareas'  => 'a:1:{i:0;s:11:"description";}',
                'modeditor' => '-'));
    DBUtil::insertObjectArray($record, 'scribite', 'mid');

}

