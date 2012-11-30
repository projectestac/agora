<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 */
class Scribite_Installer extends Zikula_AbstractInstaller
{

    public function install()
    {
        ModUtil::loadApi('Scribite', 'user', true);
        ModUtil::loadApi('Scribite', 'admin', true);

        if (!DBUtil::createTable('scribite')) {
            return false;
        }

        EventUtil::registerPersistentModuleHandler('Scribite', 'core.postinit', array('Scribite_Listeners', 'coreinit'));

        // create the default data for the module
        $this->defaultdata();

        // Initialisation successful
        return true;
    }

    public function upgrade($oldversion)
    {
        switch ($oldversion) {
            case '1.0':
            // no changes made

            case '1.1':
                // delete old paths
                $this->delVar('xinha_path');
                $this->delVar('tinymce_path');
                // set new path
                $this->setVar('editors_path', 'javascript/scribite_editors');

            case '1.2':
                if (!DBUtil::createTable('scribite')) {
                    return false;
                }
                // create the default data for the module
                scribite_defaultdata();
                // del old module vars
                $this->delVar('editor');
                $this->delVar('editor_activemodules');

            case '1.21':
                // create new values
                $this->setVar('openwysiwyg_barmode', 'full');
                $this->setVar('openwysiwyg_width', '400');
                $this->setVar('openwysiwyg_height', '300');
                $this->setVar('xinha_statusbar', 1);

            case '1.3':
                // create new values
                $this->setVar('openwysiwyg_barmode', 'full');
                $this->setVar('openwysiwyg_width', '400');
                $this->setVar('openwysiwyg_height', '300');
                $this->setVar('xinha_statusbar', 1);

            case '2.0':
                // create new values
                $this->setVar('DefaultEditor', '-');
                $this->setVar('nicedit_fullpanel', 1);
                // fill some vars with defaults
                if (!$this->getVar('xinha_converturls')) {
                    $this->setVar('xinha_converturls', 1);
                }
                if (!$this->getVar('xinha_showloading')) {
                    $this->setVar('xinha_showloading', 1);
                }
                if (!$this->getVar('xinha_activeplugins')) {
                    $this->setVar('xinha_activeplugins', 'a:2:{i:0;s:7:"GetHtml";i:1;s:12:"SmartReplace";}');
                }
                if (!$this->getVar('tinymce_activeplugins')) {
                    $this->setVar('tinymce_activeplugins', '');
                }
                if (!$this->getVar('fckeditor_autolang')) {
                    $this->setVar('fckeditor_autolang', 1);
                }
                //create new module vars for crpCalendar
                $item = array('modname' => 'crpCalendar',
                        'modfuncs' => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                        'modareas' => 'a:1:{i:0;s:22:"crpcalendar_event_text";}',
                        'modeditor' => '-');
                if (!DBUtil::insertObject($item, 'scribite', false, 'mid')) {
                    LogUtil::registerError($this->__('Error! Could not update module configuration.'));
                    return '2.0';
                }

            case '2.1':
                //create new module vars for Content
                $record = array(array('modname' => 'content',
                                'modfuncs' => 'a:1:{i:0;s:5:"dummy";}',
                                'modareas' => 'a:1:{i:0;s:5:"dummy";}',
                                'modeditor' => '-'));
                DBUtil::insertObjectArray($record, 'scribite', 'mid');

            case '2.2':
                //create new module vars for Blocks #14
                $record = array(array('modname' => 'Blocks',
                                'modfuncs' => 'a:1:{i:0;s:6:"modify";}',
                                'modareas' => 'a:1:{i:0;s:14:"blocks_content";}',
                                'modeditor' => '-'));
                DBUtil::insertObjectArray($record, 'scribite', 'mid');
                // check for Zikula 1.1.x version
                if (Zikula_Core::VERSION_NUM < '1.1.0') {
                    LogUtil::registerError($this->__('This version from Scribite only works with Zikula 1.1.x and higher. Please upgrade your Zikula version or use Scribite version 2.x .'));
                    return '2.2';
                }
                // create systeminit hook - new in Zikula 1.1.0
                if (!ModUtil::registerHook('zikula', 'systeminit', 'GUI', 'Scribite', 'user', 'run')) {
                    LogUtil::registerError($this->__('Error creating Hook!'));
                    return '2.2';
                }
                ModUtil::apiFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'Scribite'));
                LogUtil::registerStatus($this->__('<strong>Scribite</strong> was activated as core hook. You can check settings <a href="index.php?module=Modules&type=admin&func=hooks&id=0">here</a>!<br />The template plugin from previous versions of Scribite can be removed from templates.'));

            case '3.0':
                //create new module vars for Newsletter and Web_Links
                $record = array(array('modname' => 'Newsletter',
                                'modfuncs' => 'a:1:{i:0;s:11:"add_message";}',
                                'modareas' => 'a:1:{i:0;s:7:"message";}',
                                'modeditor' => '-'),
                        array('modname' => 'crpVideo',
                                'modfuncs' => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                                'modareas' => 'a:1:{i:0;s:13:"video_content";}',
                                'modeditor' => '-'),
                        array('modname' => 'Web_Links',
                                'modfuncs' => 'a:3:{i:0;s:8:"linkview";i:1;s:7:"addlink";i:2;s:17:"modifylinkrequest";}',
                                'modareas' => 'a:1:{i:0;s:11:"description";}',
                                'modeditor' => '-'));
                DBUtil::insertObjectArray($record, 'scribite', 'mid');

                // set vars for YUI Rich Text Editor
                if (!$this->getVar('yui_type')) {
                    $this->setVar('yui_type', 'Simple');
                }
                if (!$this->getVar('yui_width')) {
                    $this->setVar('yui_width', 'auto');
                }
                if (!$this->getVar('yui_height')) {
                    $this->setVar('yui_height', '300');
                }
                if (!$this->getVar('yui_dombar')) {
                    $this->setVar('yui_dombar', true);
                }
                if (!$this->getVar('yui_animate')) {
                    $this->setVar('yui_animate', true);
                }
                if (!$this->getVar('yui_collapse')) {
                    $this->setVar('yui_collapse', true);
                }

            case '3.1':
                // modify Profile module
                $originalconfig = ModUtil::apiFunc('Scribite', 'user', 'getModuleConfig', array('modulename' => "Profile"));
                $newconfig = array('mid' => $originalconfig['mid'],
                        'modulename' => 'Profile',
                        'modfuncs' => "modify",
                        'modareas' => "prop_signature,prop_extrainfo,prop_yinterests",
                        'modeditor' => $originalconfig['modeditor']);
                $modupdate = ModUtil::apiFunc('Scribite', 'admin', 'editmodule', $newconfig);

            case '3.2':
                // set new editors folder
                $this->setVar('editors_path', 'modules/Scribite/pnincludes');
                LogUtil::registerStatus($this->__('<strong>Caution!</strong><br />All editors have moved to /modules/Scribite/pnincludes in preparation for upcoming features of Zikula. Please check all your settings!<br />If you have adapted files from editors you have to check them too.<br /><br /><strong>Dropped support for FCKeditor and TinyMCE</strong><br />For security reasons these editors will not be supported anymore. Please change editors to an other editor.'));

            case '4.0':

            case '4.1':

            case '4.2':
                $this->setVar('nicedit_xhtml', 1);

            case '4.2.1':
                if (!$this->getVar('ckeditor_language')) {
                    $this->setVar('ckeditor_language', 'en');
                }
                if (!$this->getVar('ckeditor_barmode')) {
                    $this->setVar('ckeditor_barmode', 'Full');
                }
                if (!$this->getVar('ckeditor_maxheight')) {
                    $this->setVar('ckeditor_maxheight', '400');
                }

            case '4.2.2':
                // this renames the table and the columns per new z1.3.0 standards
                $this->renameColumns();
                EventUtil::registerPersistentModuleHandler('Scribite', 'core.postinit', array('Scribite_Listeners', 'coreinit'));
                $this->setVar('editors_path', 'modules/Scribite/includes');
                LogUtil::registerStatus($this->__('<strong>Caution!</strong><br />All editors have moved to /modules/Scribite/includes.<br />If you have adapted files from editors you have to check them too.'));
            case '4.2.3':
                 
                //set vars for markitup
                if (!$this->getVar('markitup_width')) {
                    $this->setVar('markitup_width', '65%');
                }
                if (!$this->getVar('markitup_height')) {
                    $this->setVar('markitup_height', '400px');
                }

                // remove fckeditor (was deprecated in 4.1)
                $this->delVar('fckeditor_language');
                $this->delVar('fckeditor_barmode');
                $this->delVar('fckeditor_width');
                $this->delVar('fckeditor_maxheight');
                $this->delVar('fckeditor_autolang');
                // update module assignments to correct removed and deprecated editors
                $dbtable = DBUtil::getTables();
                $columns = $dbtable['scribite_column'];
                $sql = "UPDATE `$dbtable[scribite]` SET `$columns[modeditor]`='-' WHERE `$columns[modeditor]`='fckeditor' OR `$columns[modeditor]`='tinymce' OR `$columns[modeditor]`='openwysiwyg'";
                DBUtil::executeSQL($sql);
                // reset modules
                $this->resetModuleConfig('Downloads');
                $this->resetModuleConfig('FAQ');
                $this->resetModuleConfig('News');
                $this->resetModuleConfig('Pages');
                $this->resetModuleConfig('ContentExpress');
                $this->resetModuleConfig('Mediashare');
                // correct possible serialized data corruption
                if (!DataUtil::is_serialized($this->getVar('xinha_activeplugins'))) {
                    $this->delVar('xinha_activeplugins');
                }
                // relocate xinha styles
                $this->setVar('xinha_style', 'modules/Scribite/style/xinha/editor.css');
                $this->setVar('xinha_style_dynamiccss', 'modules/Scribite/style/xinha/DynamicCSS.css');
                $this->setVar('xinha_style_stylist', 'modules/Scribite/style/xinha/stylist.css');
                $this->setVar('ckeditor_style_editor', 'modules/Scribite/style/ckeditor/content.css');
                $this->setVar('ckeditor_skin', 'kama');
                
                // remove content settings
                DBUtil::deleteObjectById('scribite', 'content', 'modname');
            case '4.3.0':
                // future updates
                // notice - remove openwysiwyg vars @>4.3.0			
        }

        return true;
    }

    public function uninstall()
    {
        // drop table
        if (!DBUtil::dropTable('scribite')) {
            return false;
        }

        // Delete any module variables
        $this->delVars();

        EventUtil::unregisterPersistentModuleHandler('Scribite', 'core.postinit', array('Scribite_Listeners', 'coreinit'));
        // Deletion successful
        return true;
    }

    protected function defaultdata()
    {
        // Set editor defaults
        $this->setVar('editors_path', 'modules/Scribite/includes');
        $this->setVar('DefaultEditor', '-');

        // xinha
        $this->setVar('xinha_language', 'en');
        $this->setVar('xinha_skin', 'blue-look');
        $this->setVar('xinha_barmode', 'reduced');
        $this->setVar('xinha_width', 'auto');
        $this->setVar('xinha_height', 'auto');
        $this->setVar('xinha_style', 'modules/Scribite/style/xinha/editor.css');
        $this->setVar('xinha_style_dynamiccss', 'modules/Scribite/style/xinha/DynamicCSS.css');
        $this->setVar('xinha_style_stylist', 'modules/Scribite/style/xinha/stylist.css');
        $this->setVar('xinha_statusbar', 1);
        $this->setVar('xinha_converturls', 1);
        $this->setVar('xinha_showloading', 1);
        $this->setVar('xinha_activeplugins', 'a:2:{i:0;s:7:"GetHtml";i:1;s:12:"SmartReplace";}');

        // nicedit
        $this->setVar('nicedit_xhtml', 0);

        // yui
        $this->setVar('yui_type', 'Simple');
        $this->setVar('yui_width', 'auto');
        $this->setVar('yui_height', '300px');
        $this->setVar('yui_dombar', true);
        $this->setVar('yui_animate', true);
        $this->setVar('yui_collapse', true);

        // markitup
        $this->setVar('markitup_width', '65%');
        $this->setVar('markitup_height', '400px');

        // TinyMCE
        $this->setVar('tinymce_language', 'en');
        $this->setVar('tinymce_style', 'modules/Scribite/style/tinymce/style.css');
        $this->setVar('tinymce_theme', 'advanced');
        $this->setVar('tinymce_width', '65%');
        $this->setVar('tinymce_height', '400px');
        $this->setVar('tinymce_dateformat', '%Y-%m-%d');
        $this->setVar('tinymce_timeformat', '%H:%M:%S');
        $this->setVar('tinymce_activeplugins', '');

        // ckeditor
        $this->setVar('ckeditor_language', 'en');
        $this->setVar('ckeditor_barmode', 'Full');
        $this->setVar('ckeditor_maxheight', '400px');
        $this->setVar('ckeditor_style_editor', 'modules/Scribite/style/ckeditor/content.css');
        $this->setVar('ckeditor_skin', 'kama');

        // set database module defaults
        $record = $this->getDefaultModuleConfig();
        DBUtil::insertObjectArray($record, 'scribite', 'mid');
    }

    protected function renameColumns()
    {
        $prefix = $this->serviceManager['prefix'];
        $sqlStatements = array();
        $sqlStatements[] = 'RENAME TABLE ' . $prefix . '_scribite' . " TO `scribite`";
        $sqlStatements[] = "ALTER TABLE  `scribite` 
CHANGE  `pn_mid`  `mid` INT( 11 ) NOT NULL AUTO_INCREMENT ,
CHANGE  `pn_modname`  `modname` VARCHAR( 64 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  '',
CHANGE  `pn_modfunc`  `modfuncs` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE  `pn_modareas`  `modareas` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE  `pn_modeditor`  `modeditor` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  '0'";

        $connection = Doctrine_Manager::getInstance()->getConnection('default');
        foreach ($sqlStatements as $sql) {
            $stmt = $connection->prepare($sql);
            try {
                $stmt->execute();
            } catch (Exception $e) {
                LogUtil::registerError($e->getMessage());
            }   
        }
    }
    
    /**
     * reset module to (possibly new) defaults
     * @param type $modname 
     */
    private function resetModuleConfig($modname)
    {
        $originalconfig = ModUtil::apiFunc('Scribite', 'user', 'getModuleConfig', array('modulename' => $modname));
        $default = $this->getDefaultModuleConfig($modname);
        $newconfig = array('mid' => $originalconfig['mid'],
                'modulename' => $modname,
                'modfuncs' => implode(',', unserialize($default['modfuncs'])),
                'modareas' => implode(',', unserialize($default['modareas'])),
                'modeditor' => $originalconfig['modeditor']);
        $modupdate = ModUtil::apiFunc('Scribite', 'admin', 'editmodule', $newconfig);
    }

    /**
     * Default funcs/areas for each module
     * @param type $modname
     * @return array 
     */
    private function getDefaultModuleConfig($modname = null)
    {
        $defaults = array(
                'Blocks' => array('modname' => 'Blocks',
                        'modfuncs' => 'a:1:{i:0;s:6:"modify";}',
                        'modareas' => 'a:1:{i:0;s:14:"blocks_content";}',
                        'modeditor' => '-'),
                'Book' => array('modname' => 'Book',
                        'modfuncs' => 'a:1:{i:0;s:3:"all";}',
                        'modareas' => 'a:1:{i:0;s:7:"content";}',
                        'modeditor' => '-'),
                'ContentExpress' => array('modname' => 'ContentExpress',
                        'modfuncs' => 'a:2:{i:0;s:10:"newcontent";i:1;s:11:"editcontent";}',
                        'modareas' => 'a:1:{i:0;s:4:"text";}',
                        'modeditor' => '-'),
                'crpCalendar' => array('modname' => 'crpCalendar',
                        'modfuncs' => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                        'modareas' => 'a:1:{i:0;s:22:"crpcalendar_event_text";}',
                        'modeditor' => '-'),
                'crpVideo' => array('modname' => 'crpVideo',
                        'modfuncs' => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                        'modareas' => 'a:1:{i:0;s:13:"video_content";}',
                        'modeditor' => '-'),
                'Downloads' => array('modname' => 'Downloads',
                        'modfuncs' => 'a:1:{i:0;s:4:"edit";}',
                        'modareas' => 'a:1:{i:0;s:11:"description";}',
                        'modeditor' => '-'),
                'FAQ' => array('modname' => 'FAQ',
                        'modfuncs' => 'a:2:{i:0;s:6:"newfaq";i:1;s:6:"modify";}',
                        'modareas' => 'a:1:{i:0;s:9:"faqanswer";}',
                        'modeditor' => '-'),
                'htmlpages' => array('modname' => 'htmlpages',
                        'modfuncs' => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                        'modareas' => 'a:1:{i:0;s:17:"htmlpages_content";}',
                        'modeditor' => '-'),
                'Mailer' => array('modname' => 'Mailer',
                        'modfuncs' => 'a:1:{i:0;s:10:"testconfig";}',
                        'modareas' => 'a:1:{i:0;s:11:"mailer_body";}',
                        'modeditor' => '-'),
                'Mediashare' => array('modname' => 'Mediashare',
                        'modfuncs' => 'a:4:{i:0;s:8:"addmedia";i:1;s:8:"edititem";i:2;s:8:"addalbum";i:3;s:9:"editalbum";}',
                        'modareas' => 'a:1:{i:0;s:3:"all";}',
                        'modeditor' => '-'),
                'News' => array('modname' => 'News',
                        'modfuncs' => 'a:2:{i:0;s:7:"newitem";i:1;s:6:"modify";}',
                        'modareas' => 'a:2:{i:0;s:13:"news_hometext";i:1;s:13:"news_bodytext";}',
                        'modeditor' => '-'),
                'Newsletter' => array('modname' => 'Newsletter',
                        'modfuncs' => 'a:1:{i:0;s:11:"add_message";}',
                        'modareas' => 'a:1:{i:0;s:7:"message";}',
                        'modeditor' => '-'),
                'PagEd' => array('modname' => 'PagEd',
                        'modfuncs' => 'a:1:{i:0;s:3:"all";}',
                        'modareas' => 'a:1:{i:0;s:5:"PagEd";}',
                        'modeditor' => '-'),
                'Pages' => array('modname' => 'Pages',
                        'modfuncs' => 'a:2:{i:0;s:7:"newitem";i:1;s:6:"modify";}',
                        'modareas' => 'a:1:{i:0;s:13:"pages_content";}',
                        'modeditor' => '-'),
                'Clip' => array('modname' => 'Clip',
                        'modfuncs' => 'a:1:{i:0;s:7:"pubedit";}',
                        'modareas' => 'a:1:{i:0;s:3:"all";}',
                        'modeditor' => '-'),
                'PhotoGallery' => array('modname' => 'PhotoGallery',
                        'modfuncs' => 'a:2:{i:0;s:11:"editgallery";i:1;s:9:"editphoto";}',
                        'modareas' => 'a:1:{i:0;s:17:"photogallery_desc";}',
                        'modeditor' => '-'),
                'Profile' => array('modname' => 'Profile',
                        'modfuncs' => 'a:1:{i:0;s:6:"modify";}',
                        'modareas' => 'a:3:{i:0;s:14:"prop_signature";i:1;s:14:"prop_extrainfo";i:2;s:15:"prop_yinterests";}',
                        'modeditor' => '-'),
                'PostCalendar' => array('modname' => 'PostCalendar',
                        'modfuncs' => 'a:1:{i:0;s:3:"all";}',
                        'modareas' => 'a:1:{i:0;s:11:"description";}',
                        'modeditor' => '-'),
                'Reviews' => array('modname' => 'Reviews',
                        'modfuncs' => 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}',
                        'modareas' => 'a:1:{i:0;s:14:"reviews_review";}',
                        'modeditor' => '-'),
                'ShoppingCart' => array('modname' => 'ShoppingCart',
                        'modfuncs' => 'a:1:{i:0;s:3:"all";}',
                        'modareas' => 'a:1:{i:0;s:11:"description";}',
                        'modeditor' => '-'),
        );
        if (isset($modname)) {
            return $defaults[$modname];
        } else {
            return $defaults;
        }
    }
}
