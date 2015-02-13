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

class ModulePlugin_Scribite_CKEditor_Util
{
    /**
     * fetch external plugins
     * @return array 
     */
    public static function addExternalPlugins()
    {
        $event = new Zikula_Event('moduleplugin.ckeditor.externalplugins', new ModulePlugin_Scribite_CKEditor_EditorPlugin());
        $plugins = EventUtil::getManager()->notify($event)->getSubject()->getPlugins();
        return $plugins;
    }
    
}