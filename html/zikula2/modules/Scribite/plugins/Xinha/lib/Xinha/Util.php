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

class ModulePlugin_Scribite_Xinha_Util
{
    public static function addParameters()
    {
        $useEFM = ModUtil::getVar('moduleplugin.scribite.xinha', 'useEFM');
        if ($useEFM) {
            return array('EFMConfig' => self::getEFMConfig());
        } else {
            return array('EFMConfig' => '');
        }
    }
    
    // load IM/EFM settings for Xinha and pass vars to session
    // not implemented yet ;)
    public static function getEFMConfig()
    {
        require_once 'modules/Scribite/plugins/Xinha/vendor/xinha/contrib/php-xinha.php';

        $zikulaBaseURI = rtrim(System::getBaseUri(), '/');
        $zikulaBaseURI = ltrim($zikulaBaseURI, '/');

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

        $IMConfig['allowed_image_extensions'] = array("jpg", "gif", "png");
        $IMConfig['allowed_link_extensions'] = array("jpg", "gif", "pdf", "ip", "txt",
                "psd", "png", "html", "swf", "xml", "xls");

        xinha_pass_to_php_backend($IMConfig);
        return $IMConfig;
    }
}