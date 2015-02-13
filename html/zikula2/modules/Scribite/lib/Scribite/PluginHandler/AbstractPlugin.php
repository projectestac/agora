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

abstract class Scribite_PluginHandler_AbstractPlugin extends Zikula_AbstractPlugin implements Zikula_Plugin_ConfigurableInterface
{
    /**
     * Controller configuration getter.
     *
     * @return Scribite_PluginHandler_Controller
     */
    public function getConfigurationController()
    {
        return new Scribite_PluginHandler_Controller($this->serviceManager, $this);
    }
    
    /**
     * Implement to set values in the configure.tpl tempalte for configuration of
     * the plugin
     */
    public static function getOptions()
    {
        return array();
    }
    
    /**
     * Implement to set defalut value in the configuration of the plugin
     */
    public static function getDefaults()
    {
        return array();
    }
}