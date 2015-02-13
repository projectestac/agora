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
class ModulePlugin_Scribite_YUI_Plugin extends Scribite_PluginHandler_AbstractPlugin
{

    /**
     * Provide plugin meta data.
     *
     * @return array Meta data.
     */
    protected function getMeta()
    {
        return array('displayname' => $this->__('YUI'),
            'description' => $this->__('YUI editor.'),
            'version' => '2.9.0', // autoloaded from CDN
            'url' => 'http://developer.yahoo.com/yui/editor/',
            'license' => 'BSD',
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
            'toolbartype' => 'Simple',
            'width' => 'auto',
            'height' => '300px',
            'dombar' => true,
            'animate' => true,
            'collapse' => true
        );
    }

    public static function getOptions()
    {
        return array('types' => self::getTypes());
    }

    // load names into array
    public static function getTypes()
    {
        $types = array();
        $types[0] = array(
            'text' => 'Simple',
            'value' => 'Simple'
        );
        $types[1] = array(
            'text' => 'Full',
            'value' => 'Full'
        );
        return $types;
    }

}
