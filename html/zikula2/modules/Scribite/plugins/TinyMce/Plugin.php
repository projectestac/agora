<?php

/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license MIT
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Plugin definition class.
 */
class ModulePlugin_Scribite_TinyMce_Plugin extends Scribite_PluginHandler_AbstractPlugin
{

    /**
     * Provide plugin meta data.
     *
     * @return array Meta data.
     */
    protected function getMeta()
    {
        return array('displayname' => $this->__('TinyMCE'),
            'description' => $this->__('TinyMCE has the ability to convert HTML <textarea> fields and other HTML elements to editor instances.'),
            'version' => '4.0.26',
            'url' => 'http://www.tinymce.com/',
            'license' => 'LGPL-2.1',
        );
    }

    public function install()
    {
        ModUtil::setVars($this->serviceId, $this->getDefaults());
        return true;
    }

    public function uninstall()
    {
        ModUtil::delVar($this->serviceId);
        return true;
    }

    public static function getOptions()
    {
        return array(
            'langlist' => self::getLangs(),
            'themelist' => self::getThemes(),
            'allplugins' => self::getPlugins()
        );
    }

    public static function getLangs()
    {
        $langs = array();
        $langs[] = array('text' => 'en', 'value' => 'en'); // default language
        $langsdir = opendir('modules/Scribite/plugins/TinyMce/vendor/tinymce/langs');

        while (false !== ($f = readdir($langsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && preg_match('/[.js]/', $f)) {
                $f = str_replace('.js', '', $f);
                $langs[] = array(
                    'text' => $f,
                    'value' => $f
                );
            }
        }

        closedir($langsdir);
        // sort array
        asort($langs);

        return $langs;
    }

    // read themes-folder from tinymce and load names into array
    public static function getThemes()
    {
        $themes = array();
        $themesdir = opendir('modules/Scribite/plugins/TinyMce/vendor/tinymce/themes');
        while (false !== ($f = readdir($themesdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[.]/', $f)) {
                $themes[] = array(
                    'text' => $f,
                    'value' => $f
                );
            }
        }

        closedir($themesdir);
        // sort array
        asort($themes);

        return $themes;
    }

    // read plugins from tinymce and load names into array
    public static function getPlugins()
    {
        $plugins = array();

        $pluginsdir = opendir('modules/Scribite/plugins/TinyMce/vendor/tinymce/plugins');
        while (false !== ($f = readdir($pluginsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && $f != '_template' && !preg_match('/[.]/', $f)) {
                $plugins[] = array(
                    'text' => $f,
                    'value' => $f
                );
            }
        }
        closedir($pluginsdir);
        asort($plugins);

        return $plugins;
    }
    
    public static function getDefaults()
    {
        return array(
            'language' => 'en',
            'style' => 'modules/Scribite/plugins/TinyMce/style/style.css',
            'theme' => 'modern',
            'width' => '100%',
            'height' => '400px',
            'dateformat' => '%Y-%m-%d',
            'timeformat' => '%H:%M:%S',
            'activeplugins' => array(
                'autoresize',
                'code',
                'fullscreen',
                'insertdatetime',
                'link',
                'preview',
                'print',
                'wordcount'
            )
        );
    }
}
