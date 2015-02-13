<?php

/**
 * Copyright Scribite Team 2011
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package EasyUpload
 * @link https://github.com/zikula-modules/Scribite
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

class Scribite_PluginHandler_Controller extends Zikula_Controller_AbstractPlugin
{

    /**
     * Configuration screen.
     *
     * @return string Plugin configuration output.
     */
    public function configure()
    {
        // Create form 
        $form = FormUtil::newForm($this->pluginName, $this);
        $form->setCompileId($this->pluginName);
        return $form->execute('configure.tpl', new Scribite_FormHandler_ModifyEditor());
    }

}
