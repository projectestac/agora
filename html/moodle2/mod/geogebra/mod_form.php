<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The main geogebra configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package    mod
 * @subpackage geogebra
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once('locallib.php');

/**
 * Module instance settings form
 */
class mod_geogebra_mod_form extends moodleform_mod {

    /**
     * Defines forms elements
     */
    public function definition() {
        global $CFG;
        
        $mform = $this->_form;

        //-------------------------------------------------------------------------------
        // Adding the "general" fieldset, where all the common settings are showed
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Adding the standard "name" field
        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEAN);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        //$mform->addHelpButton('name', 'name', 'geogebra');
        
        // Adding the standard "intro" and "introformat" fields
        $this->add_intro_editor();
        
        
        $mform->addElement('date_time_selector', 'timeavailable', get_string('availabledate', 'geogebra'), array('optional'=>true));
        $mform->addElement('date_time_selector', 'timedue', get_string('duedate', 'geogebra'), array('optional'=>true));
        
        //-------------------------------------------------------------------------------
        // Adding the rest of geogebra settings, spreeading all them into this fieldset
        $mform->addElement('header', 'header_geogebra', get_string('header_geogebra', 'geogebra'));

        $mform->addElement('select', 'filetype', get_string('filetype', 'geogebra'), geogebra_get_file_types());
        $mform->addHelpButton('filetype', 'filetype', 'geogebra');
        $mform->addElement('text', 'geogebraurl', get_string('geogebraurl', 'geogebra'), array('size'=>60));
        $mform->setType('geogebraurl', PARAM_RAW);
        $mform->addHelpButton('geogebraurl', 'geogebraurl', 'geogebra');
        $mform->disabledIf('geogebraurl', 'filetype', 'eq', GEOGEBRA_FILE_TYPE_LOCAL);
        
        $mform->addElement('filemanager', 'geogebrafile', get_string('geogebrafile', 'geogebra'), array('optional'=>false), geogebra_get_filemanager_options());   
        $mform->addHelpButton('geogebrafile', 'urledit', 'geogebra');
        $mform->disabledIf('geogebrafile', 'filetype', 'noteq', GEOGEBRA_FILE_TYPE_LOCAL);
        
        $options = geogebra_get_languages();
        $mform->addElement('select', 'language', get_string('language', 'geogebra'), $options);
        $mform->setDefault('language', substr($CFG->lang, 0, -5));

        $mform->addElement('text', 'width', get_string('width', 'geogebra'), array('size'=>'5'));
        $mform->setType('width', PARAM_INT);
        $mform->setDefault('width', '800');
        
        $mform->addElement('text', 'height', get_string('height', 'geogebra'), array('size'=>'5'));
        $mform->setType('height', PARAM_INT);
        $mform->setDefault('height', '600');
        
        $functionalityoptionsgrp = array();
        $functionalityoptionsgrp[] = &$mform->createElement('checkbox', 'enableRightClick', '', get_string('enableRightClick', 'geogebra'));
        $functionalityoptionsgrp[] = &$mform->createElement('checkbox', 'enableLabelDrags', '', get_string('enableLabelDrags', 'geogebra'));
        $functionalityoptionsgrp[] = &$mform->createElement('checkbox', 'showResetIcon', '', get_string('showResetIcon', 'geogebra'));
        $mform->addGroup($functionalityoptionsgrp, 'functionalityoptionsgrp', get_string('functionalityoptionsgrp', 'geogebra'), "<br>", false);
        $mform->setDefault('enableRightClick', 0);
        $mform->setDefault('enableLabelDrags', 0);
        $mform->setDefault('showResetIcon', 0);
        $mform->setAdvanced('functionalityoptionsgrp');

        $interfaceoptionsgrp = array();
        $interfaceoptionsgrp[] = &$mform->createElement('checkbox', 'showMenuBar', '', get_string('showMenuBar', 'geogebra'));
        $interfaceoptionsgrp[] = &$mform->createElement('checkbox', 'showToolBar', '', get_string('showToolBar', 'geogebra'));
        $interfaceoptionsgrp[] = &$mform->createElement('checkbox', 'showToolBarHelp', '', get_string('showToolBarHelp', 'geogebra'));
        //$interfaceoptionsgrp[] = &$mform->createElement('checkbox', 'showAlgebraInput', '', get_string('showAlgebraInput', 'geogebra'));
        $mform->addGroup($interfaceoptionsgrp, 'interfaceoptionsgrp', get_string('interfaceoptionsgrp', 'geogebra'), "<br>", false);
        $mform->setDefault('showMenuBar', 0);
        $mform->setDefault('showToolBar', 0);
        $mform->setDefault('showToolBarHelp', 0);
        //$mform->setDefault('showAlgebraInput', 0);
        $mform->setAdvanced('interfaceoptionsgrp');
        
        //-------------------------------------------------------------------------------
        $mform->addElement('header', 'header_score', get_string('header_score', 'geogebra'));

        $options = array(-1 => get_string('unlimited'), 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 10 => 10);
        $mform->addElement('select', 'maxattempts', get_string('maxattempts', 'geogebra'), $options);
        $mform->setDefault('maxattempts', '-1');
        
        $options = array(
            GEOGEBRA_AVERAGE_GRADE => get_string('average', 'geogebra'),
            GEOGEBRA_HIGHEST_GRADE => get_string('highestattempt', 'geogebra'),
            GEOGEBRA_LOWEST_GRADE => get_string('lowestattempt', 'geogebra'),
            GEOGEBRA_FIRST_GRADE => get_string('firstattempt', 'geogebra'),
            GEOGEBRA_LAST_GRADE => get_string('lastattempt', 'geogebra'));
        $mform->addElement('select', 'grademethod', get_string('grademethod', 'geogebra'), $options);
        $mform->setDefault('grademethod', '-1');

        $mform->addElement('advcheckbox', 'autograde', get_string('autograde', 'geogebra'));
        $mform->setDefault('autograde', 0);
        
        //-------------------------------------------------------------------------------

        $this->standard_grading_coursemodule_elements();
        
        // add standard elements, common to all modules
        $this->standard_coursemodule_elements();
        //-------------------------------------------------------------------------------
        // add standard buttons, common to all modules
        $this->add_action_buttons();
    }
    
    function data_preprocessing(&$default_values) {
        if ($this->current->instance) {
            $draftitemid = file_get_submitted_draft_itemid('geogebrafile');
            file_prepare_draft_area($draftitemid, $this->context->id, 'mod_geogebra', 'content', 0, geogebra_get_filemanager_options());
            $default_values['geogebrafile'] = $draftitemid;
        } 
    }
    
    public function validation($data, $files) {
        global $USER; 
        
        $errors = parent::validation($data, $files);

        // Check open and close times are consistent.
        if ($data['timeavailable'] != 0 && $data['timedue'] != 0 &&
            $data['timedue'] < $data['timeavailable']) {
            $errors['timedue'] = get_string('closebeforeopen', 'geogebra');
        }
        
        $type = $data['filetype'];
        if ($type === GEOGEBRA_FILE_TYPE_LOCAL) {
            $usercontext = get_context_instance(CONTEXT_USER, $USER->id);
            $fs = get_file_storage();
            if (!$files = $fs->get_area_files($usercontext->id, 'user', 'draft', $data['geogebrafile'], 'sortorder, id', false)) {
                $errors['geogebrafile'] = get_string('required');
            } else{
                $file = reset($files);
                $filename = $file->get_filename();
                if (!geogebra_is_valid_file($filename)){
                    $errors['geogebrafile'] = get_string('invalidgeogebrafile', 'geogebra');
                }
            }
        } else if ($type === GEOGEBRA_FILE_TYPE_EXTERNAL) {
            $reference = $data['geogebraurl'];
            if (!geogebra_is_valid_external_url($reference)) {
                $errors['geogebraurl'] = get_string('invalidurl', 'geogebra');
            }
        }

        return $errors;
    }    
    
    function set_data($default_values) {
        $default_values = (array)$default_values;

        if (isset($default_values['url'])) {
            // Need to translate the "url" field
            if (geogebra_is_valid_external_url($default_values['url'])) {
                $default_values['filetype'] = GEOGEBRA_FILE_TYPE_EXTERNAL;
                $default_values['geogebraurl'] = $default_values['url'];
            } else{
                $default_values['filetype'] = GEOGEBRA_FILE_TYPE_LOCAL;
                $default_values['geogebrafile'] = $default_values['url'];            
            }
            
            // Load attributes
            parse_str($default_values['attributes'], $attributes);
            $default_values['enableRightClick'] = isset($attributes['enableRightClick']) ? $attributes['enableRightClick'] : 0;
            $default_values['enableLabelDrags'] = isset($attributes['enableLabelDrags']) ? $attributes['enableLabelDrags'] : 0;
            $default_values['showResetIcon'] = isset($attributes['showResetIcon']) ? $attributes['showResetIcon'] : 0;
            $default_values['showMenuBar'] = isset($attributes['showMenuBar']) ? $attributes['showMenuBar'] : 0;
            $default_values['showToolBar'] = isset($attributes['showToolBar']) ? $attributes['showToolBar'] : 0;
            $default_values['showToolBarHelp'] = isset($attributes['showToolBarHelp']) ? $attributes['showToolBarHelp'] : 0;
        }
        unset($default_values['url']);
        
        
        
        $this->data_preprocessing($default_values);
        parent::set_data($default_values);
    }
    
    function completion_rule_enabled($data) {
        return !empty($data['completionsubmit']);
    }
    
    
}
