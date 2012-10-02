<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnlayoutapi.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

Loader::requireOnce('modules/content/common.php');

class contentLayoutBase
{
    function getName()
    {
        return 'unknown';
    }
    function getTitle()
    {
        return 'Unknown layout';
    }
    function getDescription()
    {
        return 'This is the base class for layouts - do not use!';
    }
    function getNumberOfContentAreas()
    {
        return 0;
    }
    function getContentAreaTitle($areaIndex)
    {
        return $areaIndex;
    }
}

function &content_layoutapi_getLayoutPlugins($args)
{
    $modules = pnModGetAllMods();
    $plugins = array();
    foreach ($modules as $module) {
        if (pnModAPILoad($module['name'], 'layouttypes')) {
            $dir = "modules/$module[directory]/pnlayouttypesapi";
            if (is_dir($dir) && $dh = opendir($dir)) {
                while (($filename = readdir($dh)) !== false) {
                    if (preg_match('/^([-a-zA-Z0-9_]+).php$/', $filename, $matches)) {
                        $layoutName = $matches[1];
                        if (SecurityUtil::checkPermission('content:plugins:layout', $layoutName . '::', ACCESS_READ))
                            $plugins[] = pnModAPIFunc($module['name'], 'layouttypes', $layoutName);
                    }
                }

                closedir($dh);
            }
        }
    }

    return $plugins;
}

function content_layoutapi_getLayouts($args)
{
    $plugins = content_layoutapi_getLayoutPlugins(array());
    $layouts = array();

    for ($i = 0, $cou = count($plugins); $i < $cou; ++$i) {
        $plugin = &$plugins[$i];
        $layouts[] = array('name' => $plugin->getName(), 'title' => $plugin->getTitle(), 'description' => $plugin->getDescription(), 'numberOfContentAreas' => $plugin->getNumberOfContentAreas());
    }

    return $layouts;
}

function content_layoutapi_getLayoutPlugin($args)
{
    return pnModAPIFunc('content', 'layouttypes', $args['layout']);
}

function content_layoutapi_getLayout($args)
{
    $plugin = content_layoutapi_getLayoutPlugin($args);
    return array('name' => $plugin->getName(), 'title' => $plugin->getTitle(), 'description' => $plugin->getDescription(), 'numberOfContentAreas' => $plugin->getNumberOfContentAreas());
}
