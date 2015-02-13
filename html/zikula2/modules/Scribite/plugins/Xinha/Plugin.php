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
class ModulePlugin_Scribite_Xinha_Plugin extends Scribite_PluginHandler_AbstractPlugin
{

    /**
     * Provide plugin meta data.
     *
     * @return array Meta data.
     */
    protected function getMeta()
    {
        return array('displayname' => $this->__('Xinha'),
            'description' => $this->__('Xinha editor.'),
            'version' => '0.96.1', // May 12, 2010
            'url' => 'http://trac.xinha.org',
            'license' => 'htmlArea based on BSD',
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

    public static function getDefaults()
    {
        return array(
            'language' => 'en',
            'skin' => 'blue-look',
            'barmode' => 'reduced',
            'width' => 'auto',
            'height' => 'auto',
            'style' => 'modules/Scribite/Plugins/Xinha/style/editor.css',
            'style_dynamiccss' => 'modules/Scribite/Plugins/Xinha/style/DynamicCSS.css',
            'style_stylist' => 'modules/Scribite/Plugins/Xinha/style/stylist.css',
            'statusbar' => 1,
            'converturls' => 1,
            'showloading' => 1,
            'useEFM' => false,
            'activeplugins' => array('GetHtml', 'SmartReplace'),
        );
    }

    public static function getOptions()
    {
        return array(
            'skinlist' => self::getSkins(),
            'allplugins' => self::getPlugins(),
            'barmodes' => self::getBarmodes()
        );
    }

// read plugin-folder from xinha and load names into array
    public static function getPlugins()
    {
        $plugins = array();
        $pluginsdir = opendir('modules/Scribite/plugins/Xinha/vendor/xinha/plugins');
        while (false !== ($f = readdir($pluginsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[.]/', $f)) {
                $plugins[] = array(
                    'text' => $f,
                    'value' => $f
                );
            }
        }
        closedir($pluginsdir);
        // sort array
        asort($plugins);

        return $plugins;
    }

    // read skins-folder from xinha and load names into array
    public static function getSkins()
    {
        $skins = array();
        $skinsdir = opendir('modules/Scribite/plugins/Xinha/vendor/xinha/skins');
        while (false !== ($f = readdir($skinsdir))) {
            if ($f != '.' && $f != '..' && $f != 'CVS' && !preg_match('/[.]/', $f)) {
                $skins[] = array(
                    'text' => $f,
                    'value' => $f
                );
            }
        }
        closedir($skinsdir);
        // sort array
        asort($skins);

        return $skins;
    }

    // read lang-folder from xinha and load names into array
    public static function getLangs()
    {
        $langs = array();
        $langsdir = opendir('modules/Scribite/plugins/Xinha/vendor/xinha/lang');
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
        // Add english as default editor language - this not exists as file in xinha
        $langs[] = array(
            'text' => 'en',
            'value' => 'en'
        );
        // sort array
        asort($langs);

        return $langs;
    }

    public static function getBarmodes()
    {
        return array(
            0 => array(
                'text' => 'reduced',
                'value' => 'reduced',
            ),
            1 => array(
                'text' => 'full',
                'value' => 'full',
            ),
            2 => array(
                'text' => 'mini',
                'value' => 'mini',
            )
        );
    }

}
