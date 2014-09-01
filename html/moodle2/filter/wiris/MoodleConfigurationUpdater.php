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

class com_wiris_plugin_configuration_MoodleConfigurationUpdater implements com_wiris_plugin_configuration_ConfigurationUpdater {

    public $was_editor_enabled;
    public $was_cas_enabled;
    
    public $editor_plugin;

    public function com_wiris_plugin_configuration_MoodleConfigurationUpdater() {
        $scriptName = explode('/', $_SERVER["SCRIPT_FILENAME"]);
        $scriptName = array_pop($scriptName);
        
        if ($scriptName == 'showimage.php') {
            return;
        }

        global $CFG;

        require_once 'wirispluginwrapper.php';
        $this->editor_plugin = WIRISpluginWrapper::get_wiris_plugin();

    }

    public function init($obj) { }

    private function getLatexStatus() {
        global $CFG;

        $filters = filter_get_globally_enabled();
        // Since Moodle 2.5 key is 'tex' not 'filter/tex'
        $status = ($CFG->version>=2013051400) ? array_key_exists('tex', $filters) : array_key_exists('filter/tex', $filters);
        return $status;
    }

    private function evalParameter($param) {
        return ($param == 1 || $param == "true");
    }

    public function updateConfiguration(&$configuration) {
        global $CFG;

        // Cache folder.
        $configuration['wiriscachedirectory'] = $CFG->dataroot . '/filter/wiris/cache';
        if (!file_exists($configuration['wiriscachedirectory'])) {
            @mkdir($configuration['wiriscachedirectory'], 0755, true);
        }
        // Formulas folder.
        $configuration['wirisformuladirectory'] = $CFG->dataroot . '/filter/wiris/formulas';
        if (!file_exists($configuration['wirisformuladirectory'])) {
            @mkdir($configuration['wirisformuladirectory'], 0755, true);
        }
        $scriptName = explode('/', $_SERVER["SCRIPT_FILENAME"]);
        $scriptName = array_pop($scriptName);

        if ($scriptName == 'showimage.php') { // Minimal conf showing images. 
            if (isset($_GET['refererquery'])) {
                $refererquery = implode('&', explode('/', $_GET['refererquery']));
                $configuration['wirisreferer'] = $CFG->wwwroot . $refererquery;
            }
            return;
        }

        // Enable LaTeX.
        if ($this->getLatexStatus()){
            $configuration['wiriseditorparselatex'] = false;
        }
        // WIRIS editor.
        $filter_enabled = filter_is_enabled('filter/wiris');
        $this->was_editor_enabled = $this->evalParameter($configuration['wiriseditorenabled']);
        if (isset($CFG->filter_wiris_editor_enable)) {
            $configuration['wiriseditorenabled'] = $this->was_editor_enabled && $this->evalParameter($CFG->filter_wiris_editor_enable) && $filter_enabled;
        } else {
            $configuration['wiriseditorenabled'] = false;
        }
        // WIRIS cas.
        $this->was_cas_enabled = $this->evalParameter($configuration['wiriscasenabled']);
        if (isset($CFG->filter_wiris_cas_enable)) {
            $configuration['wiriscasenabled'] = $this->was_cas_enabled && $this->evalParameter($CFG->filter_wiris_cas_enable) && $filter_enabled;
        } else {
            $configuration['wiriscasenabled'] = false;
        }
        // Where is the plugin.
        $configuration['wiriscontextpath'] = $this->editor_plugin->url;
        // Encoded XML
        $configuration['wiriseditorsavemode'] = 'safeXml';
        // Moodle version.
        if ($CFG->version >= 2012120300) { // Moodle 2.4 or superior
            $configuration['wirishostplatform'] = 'moodle2_4';
        } else {
            $configuration['wirishostplatform'] = 'moodle2';
        }
        // Referer.
        global $COURSE;
        $query = '';
        if(isset($COURSE->id)){
            $query .= '?course=' . $COURSE->id;
        }
        if(isset($COURSE->category)) {
            $query .= empty($query) ? '?' : '&';
            $query .= 'category=' . $COURSE->category;
        }

        $configuration['wirisreferer'] = $CFG->wwwroot . $query;

        $moodleproxyenabled = !empty($CFG->proxyhost);
        $proxyportenabled = !empty($CFG->proxyport);
        $proxyuserenabled = !empty($CFG->proxyuser);
        $proxypassenabled = !empty($CFG->proxypassword);

        
        if ($moodleproxyenabled) {
            $configuration['wirisproxy'] = "true";
            $configuration['wirisproxy_host'] = $CFG->proxyhost;
            $configuration['wirisproxy_port'] = $proxyportenabled ? $CFG->proxyport : null;
            $configuration['wirisproxy_user'] = $proxyuserenabled ? $CFG->proxyuser : null;
            $configuration['wirisproxy_pass'] = $proxypassenabled ? $CFG->proxypassword : null;
        }
    }
}
