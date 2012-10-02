<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnadminapi.php 198 2009-12-08 23:00:05Z hilope $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage scribite!
 */

// get available admin panel links
function scribite_adminapi_getlinks($args)
{
    $dom = ZLanguage::getModuleDomain('scribite');
    $links = array();
    $links[] = array('url' => pnModURL('scribite', 'admin', 'modifyconfig'), 'text' => __('Settings', $dom));

    // check for all supported editors and generate links
    if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'xinha'))) {
        $links[] = array('url' => pnModURL('scribite', 'admin', 'modifyxinha'), 'text' => __('Xinha', $dom));
    }
    if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'tiny_mce'))) {
        $links[] = array('url' => pnModURL('scribite', 'admin', 'modifytinymce'), 'text' => __('TinyMCE', $dom));
    }
    if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'fckeditor'))) {
        $links[] = array('url' => pnModURL('scribite', 'admin', 'modifyfckeditor'), 'text' => __('FCKeditor', $dom));
    }
    if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'openwysiwyg'))) {
        $links[] = array('url' => pnModURL('scribite', 'admin', 'modifyopenwysiwyg'), 'text' => __('openWYSIWYG', $dom));
    }
    if (pnModAPIFunc('scribite', 'user', 'getEditors', array('editorname' => 'nicedit'))) {
        $links[] = array('url' => pnModURL('scribite', 'admin', 'modifynicedit'), 'text' => __('NicEdit', $dom));
    }
    // add YUI page
    $links[] = array('url' => pnModURL('scribite', 'admin', 'modifyyui'), 'text' => __('YUI Editor', $dom));
    // return output
    return $links;

}

// update module editor
function scribite_adminapi_editmoduledirect($args)
{
    $dom = ZLanguage::getModuleDomain('scribite');
    // Security check
    if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // Argument check
    if (!isset($args)) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    if (!DBUtil::updateObject($args, 'scribite', '', 'mid')) {
        return LogUtil::registerError (__('Configuration not updated', $dom));
    }
    return true;

}

// add module config
function scribite_adminapi_addmodule($args)
{
    $dom = ZLanguage::getModuleDomain('scribite');
    // Security check
    if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }
    // Argument check
    if (!isset($args['modulename']) || !isset($args['modfuncs']) || !isset($args['modareas']) || !isset($args['modeditor'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // add item
    $additem =   array('modname'   => $args['modulename'],
            'modfuncs'  => serialize(explode(',', $args['modfuncs'])),
            'modareas'  => serialize(explode(',', $args['modareas'])),
            'modeditor' => $args['modeditor']);

    if (!DBUtil::insertObject($additem, 'scribite', false, 'mid')) {
        return LogUtil::registerError (__('Configuration not updated', $dom));
    }
    return true;

}

// update module config
function scribite_adminapi_editmodule($args)
{
    $dom = ZLanguage::getModuleDomain('scribite');
    // Security check
    if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // Argument check
    if (!isset($args['mid']) || !isset($args['modulename']) || !isset($args['modfuncs']) || !isset($args['modareas'])  || !isset($args['modeditor'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // update item
    $updateitem = array('mid'       => $args['mid'],
            'modname'   => $args['modulename'],
            'modfuncs'  => serialize(explode(',', $args['modfuncs'])),
            'modareas'  => serialize(explode(',', $args['modareas'])),
            'modeditor' => $args['modeditor']);

    if (!DBUtil::updateObject($updateitem, 'scribite', '', 'mid')) {
        return LogUtil::registerError (__('Configuration not updated', $dom));
    }
    return true;

}


// delete module config
function scribite_adminapi_delmodule($args)
{
    $dom = ZLanguage::getModuleDomain('scribite');
    // Security check
    if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }
    // Argument check
    if (!isset($args['mid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // check for existing module
    if (!DBUtil::deleteObjectById('scribite', $args['mid'], 'mid')) {
        return LogUtil::registerError (__('Configuration not updated', $dom));
    }
    return true;

}

// get module name from id
function scribite_adminapi_getModuleConfigfromID($args)
{
    $dom = ZLanguage::getModuleDomain('scribite');
    // Security check
    if (!SecurityUtil::checkPermission( 'scribite::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }
    // Argument check
    if (!isset($args['mid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $item = DBUtil::selectObjectByID('scribite', $args['mid'], 'mid');

    return $item;

}

// read plugin-folder from xinha and load names into array
function scribite_adminapi_getxinhaPlugins($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $plugins = array();
    $pluginsdir = opendir($path . '/xinha/plugins');
    while (false !== ($f = readdir($pluginsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
            $plugins[$f] = $f;
        }
    }
    closedir($pluginsdir);
    // sort array
    asort($plugins);

    return $plugins;

}

// read skins-folder from xinha and load names into array
function scribite_adminapi_getxinhaSkins($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $skins = array();
    $skinsdir = opendir($path . '/xinha/skins');
    while (false !== ($f = readdir($skinsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
            $skins[$f] = $f;
        }
    }
    closedir($skinsdir);
    // sort array
    asort($skins);

    return $skins;

}

// read lang-folder from xinha and load names into array
function scribite_adminapi_getxinhaLangs($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $langs = array();
    $langsdir = opendir($path . '/xinha/lang');
    while (false !== ($f = readdir($langsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && ereg('[.js]', $f)) {
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

// read langs-folder from tiny_mce and load names into array
function scribite_adminapi_gettinymceLangs($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $langs = array();
    $langsdir = opendir($path . '/tiny_mce/langs');
    while (false !== ($f = readdir($langsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && ereg('[.js]', $f)) {
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
function scribite_adminapi_gettinymceThemes($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $themes = array();
    $themesdir = opendir($path . '/tiny_mce/themes');
    while (false !== ($f = readdir($themesdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
            $themes[$f] = $f;
        }
    }
    closedir($themesdir);
    // sort array
    asort($themes);

    return $themes;

}
// read plugins from tiny_mce and load names into array
function scribite_adminapi_gettinymcePlugins($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $plugins = array();
    $pluginsdir = opendir($path . '/tiny_mce/plugins');
    while (false !== ($f = readdir($pluginsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && $f != '_template' && !ereg('[.]', $f))     {
            $plugins[$f] = $f;
        }
    }
    closedir($pluginsdir);
    // sort array
    asort($plugins);

    return $plugins;

}
// read langs-folder from fckeditor and load names into array
function scribite_adminapi_getfckeditorLangs($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $langs = array();
    $langsdir = opendir($path . '/fckeditor/editor/lang');
    while (false !== ($f = readdir($langsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[_]', $f)  && ereg('[.js]', $f))     {
            $f = str_replace('.js', '', $f);
            $langs[$f] = $f;
        }
    }
    closedir($langsdir);
    // sort array
    asort($langs);

    return $langs;

}
// read skins-folder from fckeditor and load names into array
function scribite_adminapi_getfckeditorSkins($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $skins = array();
    $skinsdir = opendir($path . '/fckeditor/editor/skins');
    while (false !== ($f = readdir($skinsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
            $skins[$f] = $f;
        }
    }
    closedir($skinsdir);
    // sort array
    asort($skins);

    return $skins;

}
// read plugins from fckeditor and load names into array
function scribite_adminapi_getfckeditorPlugins($args)
{
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $plugins = array();
    $pluginsdir = opendir($path . '/fckeditor/editor/plugins');
    while (false !== ($f = readdir($pluginsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
            $plugins[$f] = $f;
        }
    }
    closedir($pluginsdir);
    // sort array
    asort($plugins);

    return $plugins;

}
// load names into array
function scribite_adminapi_getfckeditorBarmodes($args)
{
    $barmodes = array();
    $barmodes['Default'] = 'Default';
    $barmodes['Basic']   = 'Basic';

    return $barmodes;

}

// load names into array
function scribite_adminapi_getyuitypes($args)
{
    $types = array();
    $types['Simple'] = 'Simple';
    $types['Full']   = 'Full';

    return $types;

}
