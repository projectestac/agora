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

class ModulePlugin_Scribite_TinyMce_Util {
    /**
     * called near end of loader() before template is fetched
     * @return array 
     */
    public static function addParameters()
    {
        // get plugins for tinymce
        $tinymce_listplugins = ModUtil::getVar('moduleplugin.scribite.tinymce', 'activeplugins');
        $tinymce_buttonmap = array('paste' => 'pastetext,pasteword,selectall',
            'insertdatetime' => 'insertdate,inserttime',
            'table' => 'tablecontrols,table,row_props,cell_props,delete_col,delete_row,col_after,col_before,row_after,row_before,split_cells,merge_cells',
            'directionality' => 'ltr,rtl',
            'layer' => 'moveforward,movebackward,absolute,insertlayer',
            'save' => 'save,cancel',
            'style' => 'styleprops',
            'xhtmlxtras' => 'cite,abbr,acronym,ins,del,attribs',
            'searchreplace' => 'search,replace');

        if (is_array($tinymce_listplugins)) {

            // Buttons/controls: http://www.tinymce.com/wiki.php/Buttons/controls
            // We have some plugins with the button name same as plugin name
            // and a few plugins with custom button names, so we have to check the mapping array.
            $tinymce_buttons = array();
            foreach ($tinymce_listplugins as $tinymce_button) {
                if (array_key_exists($tinymce_button, $tinymce_buttonmap)) {
                    $tinymce_buttons = array_merge($tinymce_buttons, explode(",", $tinymce_buttonmap[$tinymce_button]));
                } else {
                    $tinymce_buttons[] = $tinymce_button;
                }
            }

            // TODO: I really would like to split this into multiple row, but I do not know how
            //    $tinymce_buttons_splitted = array_chunk($tinymce_buttons, 20);
            //    foreach ($tinymce_buttons_splitted as $key => $tinymce_buttonsrow) {
            //        $tinymce_buttonsrows[] = DataUtil::formatForDisplay(implode(',', $tinymce_buttonsrow));
            //    }

            $tinymce_buttons = DataUtil::formatForDisplay(implode(',', $tinymce_buttons));

            return array('buttons' => $tinymce_buttons);
        }
        return array('buttons' => '');
    }

    /**
     * fetch external plugins
     * @return array 
     */
    public static function addExternalPlugins()
    {
        $event = new Zikula_Event('moduleplugin.tinymce.externalplugins', new ModulePlugin_Scribite_TinyMce_EditorPlugin());
        $plugins = EventUtil::getManager()->notify($event)->getSubject()->getPlugins();
        return $plugins;
    }
}