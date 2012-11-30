<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 */
class Scribite_Api_Admin extends Zikula_AbstractApi
{

// get available admin panel links
    public function getlinks($args)
    {
        $links = array();
        $sublinks = array();

        $links[] = array(
            'url' => ModUtil::url('Scribite', 'admin', 'modules'),
            'text' => $this->__('Module list'),
            'class' => 'z-icon-es-view');

        $links[] = array(
            'url' => ModUtil::url('Scribite', 'admin', 'newmodule'),
            'text' => $this->__('Add module'),
            'class' => 'z-icon-es-new');

        $links[] = array(
            'url' => ModUtil::url('Scribite', 'admin', 'modifyconfig'),
            'text' => $this->__('Settings'),
            'class' => 'z-icon-es-config');

        // check for all supported editors and generate links
        $editors = ModUtil::apiFunc('Scribite', 'user', 'getEditors', array('editorname' => "list"));
        unset($editors['-']);
        foreach ($editors as $key => $editor) {
            $sublinks[] = array(
                'url' => ModUtil::url('Scribite', 'admin', 'modify'.$key),
                'text' => $editor);
        }

        $links[] = array(
            'url' => ModUtil::url('Scribite', 'admin', 'modules'),
            'text' => $this->__('Editor Config'),
            'class' => 'z-icon-es-edit',
            'links' => $sublinks);
        
        // return output
        return $links;
    }

// update module editor
    public function editmoduledirect($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // Argument check
        if (!isset($args)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        if (!DBUtil::updateObject($args, 'scribite', '', 'mid')) {
            return LogUtil::registerError($this->__('Configuration not updated'));
        }
        return true;
    }

// add module config
    public function addmodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // Argument check
        if (!isset($args['modulename']) || !isset($args['modfuncs']) || !isset($args['modareas']) || !isset($args['modeditor'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // add item
        $additem = array('modname' => $args['modulename'],
            'modfuncs' => serialize(explode(',', $args['modfuncs'])),
            'modareas' => serialize(explode(',', $args['modareas'])),
            'modeditor' => $args['modeditor']);

        if (!DBUtil::insertObject($additem, 'scribite', 'mid', false)) {
            return LogUtil::registerError($this->__('Configuration not updated'));
        }
        return true;
    }

    // update module config
    public function editmodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // Argument check
        if (!isset($args['mid']) || !isset($args['modulename']) || !isset($args['modfuncs']) || !isset($args['modareas']) || !isset($args['modeditor'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // update item
        $updateitem = array('mid' => $args['mid'],
            'modname' => $args['modulename'],
            'modfuncs' => serialize(explode(',', $args['modfuncs'])),
            'modareas' => serialize(explode(',', $args['modareas'])),
            'modeditor' => $args['modeditor']);

        if (!DBUtil::updateObject($updateitem, 'scribite', '', 'mid')) {
            return LogUtil::registerError($this->__('Configuration not updated'));
        }
        return true;
    }

// delete module config
    public function delmodule($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // Argument check
        if (!isset($args['mid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // check for existing module
        if (!DBUtil::deleteObjectById('scribite', $args['mid'], 'mid')) {
            return LogUtil::registerError($this->__('Configuration not updated'));
        }
        return true;
    }

// get module name from id
    public function getModuleConfigfromID($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Scribite::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // Argument check
        if (!isset($args['mid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = DBUtil::selectObjectByID('scribite', $args['mid'], 'mid');

        return $item;
    }

// read plugin-folder from xinha and load names into array
    public function getxinhaPlugins($args)
    {
        $path = rtrim($this->getVar('editors_path'), '/');
        $plugins = array();
        $pluginsdir = opendir($path . '/xinha/plugins');
        while (false !== ($f = readdir($pluginsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[.]/', $f)) {
                $plugins[$f] = $f;
            }
        }
        closedir($pluginsdir);
        // sort array
        asort($plugins);

        return $plugins;
    }

// read skins-folder from xinha and load names into array
    public function getxinhaSkins($args)
    {
        $path = rtrim($this->getVar('editors_path'), '/');
        $skins = array();
        $skinsdir = opendir($path . '/xinha/skins');
        while (false !== ($f = readdir($skinsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[.]/', $f)) {
                $skins[$f] = $f;
            }
        }
        closedir($skinsdir);
        // sort array
        asort($skins);

        return $skins;
    }

// read lang-folder from xinha and load names into array
    public function getxinhaLangs($args)
    {
        $path = rtrim($this->getVar('editors_path'), '/');
        $langs = array();
        $langsdir = opendir($path . '/xinha/lang');
        while (false !== ($f = readdir($langsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && preg_match('/[.js]/', $f)) {
                $f = str_replace('.js', '', $f);
                $langs[$f] = $f;
            }
        }
        closedir($langsdir);
        // Add english as default editor language - this not exists as file in xinha
        $langs['en'] = 'en';
        // sort array
        asort($langs);

        return $langs;
    }

    // load names into array
    public function getyuitypes($args)
    {
        $types = array();
        $types['Simple'] = 'Simple';
        $types['Full'] = 'Full';

        return $types;
    }

    // read langs-folder from ckeditor and load names into array
    public function getckeditorLangs($args)
    {
        $path = rtrim($this->getVar('editors_path'), '/');

        $langs = array();
        $langsdir = opendir($path . '/ckeditor/lang');

        while (false !== ($f = readdir($langsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[_]/', $f) && preg_match('/[.js]/', $f)) {
                $f = str_replace('.js', '', $f);
                $langs[$f] = $f;
            }
        }

        closedir($langsdir);
        // sort array
        asort($langs);

        return $langs;
    }

    // read skins-folder from ckeditor and load names into array
    public function getckeditorSkins($args)
    {
        $path = rtrim($this->getVar('editors_path'), '/');

        $skins = array();
        $skinsdir = opendir($path . '/ckeditor/skins');

        while (false !== ($f = readdir($skinsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[.]/', $f)) {
                $skins[$f] = $f;
            }
        }

        closedir($skinsdir);
        // sort array
        asort($skins);

        return $skins;
    }

    // read plugins from ckeditor and load names into array
    public function getckeditorPlugins($args)
    {
        $path = rtrim($this->getVar('editors_path'), '/');

        $plugins = array();
        $pluginsdir = opendir($path . '/ckeditor/plugins');

        while (false !== ($f = readdir($pluginsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[.]/', $f)) {
                $plugins[$f] = $f;
            }
        }

        closedir($pluginsdir);
        // sort array
        asort($plugins);

        return $plugins;
    }

    // load names into array
    public function getckeditorBarmodes($args)
    {
        $barmodes = array();
        $barmodes['Full'] = 'Full';
        $barmodes['Basic'] = 'Basic';

        return $barmodes;
    }

    public function gettinymceLangs($args)
    {
        $path = rtrim($this->getVar('editors_path'), '/');
        $langs = array();
        $langsdir = opendir($path . '/tinymce/langs');

        while (false !== ($f = readdir($langsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && preg_match('/[.js]/', $f)) {
               $f = str_replace('.js', '', $f);
                $langs[$f] = $f;
            }
        }

        closedir($langsdir);
        // sort array
        asort($langs);

        return $langs;
    }

// read themes-folder from tiny_mce and load names into array

    public function gettinymceThemes($args)

    {

        $path = rtrim($this->getVar('editors_path'), '/');
        $themes = array();
        $themesdir = opendir($path . '/tinymce/themes');
        while (false !== ($f = readdir($themesdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[.]/', $f)) {
               $themes[$f] = $f;
           }
        }

       closedir($themesdir);
       // sort array
       asort($themes);

       return $themes;
    }


// read plugins from tiny_mce and load names into array

    public function gettinymcePlugins($args)
    {

     $path = rtrim($this->getVar('editors_path'), '/');

        $plugins = array();

        $pluginsdir = opendir($path . '/tinymce/plugins');
            while (false !== ($f = readdir($pluginsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && $f != '_template' && !preg_match('/[.]/', $f)) {
                $plugins[$f] = $f;
            }
            }
        closedir($pluginsdir);
        asort($plugins);

        return $plugins;
 }

}
