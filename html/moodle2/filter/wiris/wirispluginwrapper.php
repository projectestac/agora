<?php
//
//  Copyright (c) 2011, Maths for More S.L. http://www.wiris.com
//  This file is part of Moodle WIRIS Plugin.
//
//  Moodle WIRIS Plugin is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  Moodle WIRIS Plugin is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with Moodle WIRIS Plugin. If not, see <http://www.gnu.org/licenses/>.
//

defined('MOODLE_INTERNAL') || die();

class WIRISpluginWrapper {
    private $isInit = false;
    private $installed = false;
    private $moodleConfig;
    private $instance;

    public function begin() {
        com_wiris_system_CallWrapper::getInstance()->start();
    }

    public function end() {
        com_wiris_system_CallWrapper::getInstance()->stop();
    }

    public function is_installed() {
        $this->init();
        return $this->installed;
    }

    private function init() {
        if (!$this->isInit) {
            $this->isInit = true;
            
            // Discover location of editor plugin.
            $editor_plugin = WIRISpluginWrapper::get_wiris_plugin();
            
            $this->installed = !empty($editor_plugin);
            // Return if editor plugin is not installed.
            if (!$this->installed) {
                global $COURSE, $PAGE;
                $coursecontext = get_context_instance(CONTEXT_COURSE, $COURSE->id);
                if (has_capability('moodle/site:config', $coursecontext)) {
                    // Display missing WIRIS editor plugin dependency error
                    $PAGE->requires->js('/filter/wiris/js/message.js',false);
                }
                return null;
            }
            
            // Init haxe environment.
            if (!class_exists('com_wiris_system_CallWrapper')) {
                require_once $editor_plugin->path . '/integration/lib/com/wiris/system/CallWrapper.class.php';
            }
            com_wiris_system_CallWrapper::getInstance()->init($editor_plugin->path . '/integration');
            
            // Start haxe environment.
            $this->begin();
            // Create PluginBuilder with Moodle specific configuration.
            require_once 'MoodleConfigurationUpdater.php';
            $this->moodleConfig = new com_wiris_plugin_configuration_MoodleConfigurationUpdater($editor_plugin);
            
            $this->instance = com_wiris_plugin_api_PluginBuilder::getInstance();
            $this->instance->addConfigurationUpdater($this->moodleConfig);
            $this->instance->addConfigurationUpdater(new com_wiris_plugin_web_PhpConfigurationUpdater());
            // Stop haxe environment.
            $this->end();
        }
    }

    public function get_instance() {
        $this->init();
        return $this->instance;
    }

    public function was_cas_enabled() {
        $this->get_instance()->getConfiguration()->getProperty("wiriscasenabled",null); // force configuration load
        return $this->moodleConfig->was_cas_enabled;
    }

    public function was_editor_enabled() {
        $this->get_instance()->getConfiguration()->getProperty("wiriseditorenabled",null); // force configuration load
        return $this->moodleConfig->was_editor_enabled;
    }

    public function clear_folder($folder) {
        $dirStructure = (glob(rtrim($folder, "/").'/*'));
        if (is_array($dirStructure)) {
            foreach ($dirStructure as $dirElement) {
                if (is_file($dirElement)) {
                        unlink($dirElement);
                } else if (is_dir($dirElement)) {
                    $this->clear_folder($dirElement);
                }
            }
        }
       rmdir($folder);
    }

    /**
     * Returns WIRIS plugin data from the plugin installed in the default Moodle
     * HTML editor (or the first available), or false if none found.
     * 
     * Needs the Moodle to be started with $CFG variable defined.
     * 
     * @return object
     *   An object with the following properties:
     *     - url: base url of the WIRIS plugin.
     *     - path: base path of the WIRIS plugin.
     *     - version: version of the WIRIS plugin.
     * */
    public static function get_wiris_plugin() {
        global $CFG;
        // Loop over atto, tinymce in the order defined by the configuration.
        $editors = explode(',', $CFG->texteditors);
        if (!in_array('atto', $editors)) $editors[] = 'atto';
        if (!in_array('tinymce', $editors)) $editors[] = 'tinymce';
        foreach ($editors as $editor) {
            if ($editor == 'atto') {
                $relative_path = '/lib/editor/atto/plugins/wiris';
                if (file_exists($CFG->dirroot . $relative_path . '/VERSION')) {
                    $plugin = new stdClass();
                    $plugin->url = $CFG->wwwroot . $relative_path;
                    $plugin->path = $CFG->dirroot . $relative_path;
                    $plugin->version = get_config('atto_atto_wiris', 'version');
                    return $plugin;
                }
            } else if ($editor == 'tinymce') {
                require_once $CFG->dirroot . '/lib/editor/tinymce/lib.php';
                $tiny = new tinymce_texteditor();
                $tiny_version = $tiny->version;
                if ($CFG->version >= 2012120300) { // Location for Moodle 2.4 onwards
                    $relative_path = '/lib/editor/tinymce/plugins/tiny_mce_wiris/tinymce';
                } else { // Location for Moodle < 2.4
                    $relative_path = '/lib/editor/tinymce/tiny_mce/' . $tiny_version . '/plugins/tiny_mce_wiris';
                } 
                if (!file_exists($CFG->dirroot . $relative_path . '/integration/pluginbuilder.php')) {
                    // WIRIS plugin  >= 3.50 not installed.
                    continue;
                }
                $plugin = new stdClass();
                $plugin->url = $CFG->wwwroot . $relative_path;
                $plugin->path = $CFG->dirroot . $relative_path;
                $plugin->version = get_config('tinymce_tiny_mce_wiris', 'version');
                return $plugin;
            }
        }
        return false;
    }
}