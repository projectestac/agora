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

class com_wiris_plugin_configuration_MoodleConfigurationUpdater implements com_wiris_plugin_configuration_ConfigurationUpdater {

    
    
    public function com_wiris_plugin_configuration_MoodleConfigurationUpdater() {
    }
    
    public function init() {
    }

    private function getLatexStatus(){
        $filters = filter_get_globally_enabled();
        $status = array_key_exists('filter/tex', $filters);
        return $status;
    }

    private function evalParameter($param){
        if ($param == 1)
            return true;
        else
            return false;
    }
	
    public function updateConfiguration(&$configuration) {
        global $CFG;

        $configuration['wirisformulaeditorenabled'] = true;
        $configuration['wiriscasenabled'] = true;
        if (isset($configuration['wirisaccessibilityenabled']) && $configuration['wirisaccessibilityenabled'] == 'true'){
                $configuration['wirisaccessibilityenabled'] = true;
        }else{
                $configuration['wirisaccessibilityenabled'] = false;		
        }        
        $configuration['wiriscachedirectory'] = $CFG->dataroot . '/filter/wiris/cache';
        $configuration['wirisformuladirectory'] = $CFG->dataroot . '/filter/wiris/formulas';
        $configuration['wirisparselatex'] = !$this->getLatexStatus();
        $filter_enabled = filter_is_enabled('filter/wiris');
		
        if (isset($CFG->filter_wiris_editor_enable)) {
            $configuration['wirisformulaeditoractive'] = $configuration['wirisformulaeditorenabled'] && $this->evalParameter($CFG->filter_wiris_editor_enable) && $filter_enabled;
        }else{
            $configuration['wirisformulaeditoractive'] = false;
        }
        
        if (isset($CFG->filter_wiris_cas_enable)) {
            $configuration['wiriscasactive'] = $configuration['wiriscasenabled'] && $this->evalParameter($CFG->filter_wiris_cas_enable) && $filter_enabled;
        }else{
            $configuration['wiriscasactive'] = false;
        }
    }
}
?>