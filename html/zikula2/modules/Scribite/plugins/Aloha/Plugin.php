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
class ModulePlugin_Scribite_Aloha_Plugin extends Scribite_PluginHandler_AbstractPlugin
{

    /**
     * Provide plugin meta data.
     *
     * @return array Meta data.
     */
    protected function getMeta()
    {
        return array('displayname' => $this->__('Aloha'),
            'description' => $this->__('Aloha editor.'),
            'version' => '1.0.0', // technically not the vendor version because latest lib always loaded from CDN
            'url' => 'http://aloha-editor.org/',
            'license' => 'GPL-2.0+',
            'dependencies' => 'jQuery',
        );
    }

}
