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
 * Wysihtml5 definition class.
 */
class ModulePlugin_Scribite_Wysihtml5_Plugin extends Scribite_PluginHandler_AbstractPlugin
{

    /**
     * Provide plugin meta data.
     *
     * @return array Meta data.
     */
    protected function getMeta()
    {
        return array('displayname' => $this->__('wysihtml5'),
            'description' => $this->__('Wysihtml5 is an lightweight HTML5 WYSIWYG editor. It is provided under the MIT license.'),
            'version' => '0.3.0',
            'license' => 'MIT',
            'homepage' => 'http://xing.github.com/wysihtml5',
        );
    }

}
