<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnuserapi.php 122 2009-01-30 22:31:10Z hilope $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage scribite!
 */

// load module config from db into array or list all modules with config
function scribite_userapi_getModuleConfig($args)
{
    if (!isset($args['modulename'])) {
        $args['modulename'] = pnModGetName();
    }

    $modconfig = array();
    if ($args['modulename'] == 'list') {
        $modconfig = DBUtil::selectObjectArray('scribite');
    } else {
        $pntable = pnDBGetTables();
        $scribitecolumn = $pntable['scribite_column'];
        $where = "$scribitecolumn[modname] = '".$args['modulename']."'";
        $item = DBUtil::selectObjectArray('scribite', $where);

        if ($item == false) {
            return;
        }

        $modconfig['mid'] = $item[0]['mid'];
        $modconfig['modulename'] = $item[0]['modname'];
        if (!is_int($item[0]['modfuncs'])) {
            $modconfig['modfuncs'] = unserialize($item[0]['modfuncs']);
        }
        if (!is_int($item[0]['modareas'])) {
            $modconfig['modareas'] = unserialize($item[0]['modareas']);
        }
        $modconfig['modeditor'] = $item[0]['modeditor'];
    }
    return $modconfig;
}

// read editors folder and load names into array
// has to be changed with args!!
function scribite_userapi_getEditors($args)
{
    $editorname = $args['editorname'];
    $editors = array();
    $path = rtrim(pnModGetVar('scribite', 'editors_path'),'/');
    $editorsdir = opendir($path);
    while (false !== ($f = readdir($editorsdir))) {
        if ($f != '.' && $f != '..' && $f != 'CVS' && !ereg('[.]', $f)) {
            $editors[$f] = $f;
        }
    }
    closedir($editorsdir);
    // Add "-" as default for no editor
    $editors['-'] = '-';
    // Add YUI as editor - files are loaded from Yahoo server, so no check is needed
    $editors['yui'] = 'yui';
    asort($editors);

    // list will give a full list of installed editors
    if ($editorname == 'list') {
        return $editors;
    }
    else { // check if given editorname is available
        if (in_array($editorname, $editors)) {
            $editor_active = 1;
        } else {
            $editor_active = 0;
        }
    return $editor_active;
    }

}

// load IM/EFM settings for Xinha and pass vars to session
// not implemented yet ;)
function scribite_userapi_getEFMConfig($args)
{
    // get editors path and load xinha scripts
    $editors_path = pnModGetVar('scribite', 'editors_path');
    Loader::requireOnce($editors_path . '/xinha/contrib/php-xinha.php');

    $postnukeBaseURI = rtrim(pnGetBaseURI(),'/');
    $postnukeBaseURI = ltrim($postnukeBaseURI,'/');
    $postnukeRoot = rtrim($_SERVER['DOCUMENT_ROOT'],'/');

    // define backend configuration for the plugin
    $IMConfig = array();
    $IMConfig['images_dir'] = '/files/';
    $IMConfig['images_url'] = 'files/';
    $IMConfig['files_dir'] = '/files/';
    $IMConfig['files_url'] = 'files';
    $IMConfig['thumbnail_prefix'] = 't_';
    $IMConfig['thumbnail_dir'] = 't';
    $IMConfig['resized_prefix'] = 'resized_';
    $IMConfig['resized_dir'] = '';
    $IMConfig['tmp_prefix'] = '_tmp';
    $IMConfig['max_filesize_kb_image'] = 2000;
    // maximum size for uploading files in 'insert image' mode (2000 kB here)

    $IMConfig['max_filesize_kb_link'] = 5000;
    // maximum size for uploading files in 'insert link' mode (5000 kB here)

    // Maximum upload folder size in Megabytes.
    // Use 0 to disable limit
    $IMConfig['max_foldersize_mb'] = 0;

    $IMConfig['allowed_image_extensions'] = array("jpg","gif","png");
    $IMConfig['allowed_link_extensions'] = array("jpg","gif","pdf","ip","txt",
                            "psd","png","html","swf",
                            "xml","xls");

    xinha_pass_to_php_backend($IMConfig);
    return $IMConfig;
}
