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
 * GeoGebra grade form
 *
 * @package    mod
 * @subpackage geogebra
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die('Direct access to this script is forbidden.');


/** Include formslib.php */
require_once ($CFG->libdir.'/formslib.php');
/** Include locallib.php */
require_once($CFG->dirroot . '/mod/geogebra/locallib.php');
/** Required for advanced grading */
require_once('HTML/QuickForm/input.php');
require_once($CFG->dirroot .'/rating/lib.php');


class mod_geogebra_grade_form extends moodleform {
    /** @var geogebra $geogebra */
    private $geogebra;

    /**
     * Define the form - called by parent constructor
     */
    function definition() {
        global $CFG;
        
        $mform = $this->_form;
        
        list($geogebra, $data, $params) = $this->_customdata;
        // visible elements
        $this->geogebra = $geogebra;        
        
        $attemptelement = $mform->addElement('text', 'attempt', get_string('attempt', 'geogebra'), array('style' => 'border:none'));
        $attemptelement->freeze();

        $durationelement = $mform->addElement('text', 'duration', get_string('duration', 'geogebra'), array('style' => 'border:none'));
        $durationelement->freeze();

        
        if ($geogebra->grade > 0) {
            $gradingelement = $mform->addElement('text', 'grade', get_string('grade', 'geogebra'));
            $mform->setType('grade', PARAM_TEXT);
        } else {
            $grademenu = make_grades_menu($geogebra->grade);
            if (count($grademenu) > 0) {
                $grademenu = array(RATING_UNSET_RATING => get_string('rate', 'rating').'...') + $grademenu;
                $gradingelement = $mform->addElement('select', 'grade', get_string('grade').':', $grademenu);

                // The grade is already formatted with format_float so it needs to be converted back to an integer.
                if (!empty($data->grade)) {
                    $data->grade = (int)unformat_float($data->grade);
                }
                $mform->setType('grade', PARAM_INT);
            }
        }

        $mform->addElement('editor', 'comment_editor', get_string('comment', 'geogebra'), null, null); 
        $mform->setType('comment_editor', PARAM_RAW);        
        
        // Hidden parameters
        $mform->addElement('hidden', 'id', $data->id);
        $mform->setType('id', PARAM_INT);
        $mform->addElement('hidden', 'student', $data->student);
        $mform->setType('student', PARAM_INT);
        $mform->addElement('hidden', 'attemptid', $data->attemptid);
        $mform->setType('attemptid', PARAM_INT);
        $mform->addElement('hidden', 'action', 'submitgrade');
        $mform->setType('action', PARAM_ALPHA);

        // Buttons
        $buttonarray=array();
        $buttonarray[] = $mform->createElement('submit', 'savegrade', get_string('savechanges', 'assign'));
        $buttonarray[] = $mform->createElement('cancel', 'cancelbutton', get_string('cancel'));
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
        $buttonarray=array();

        if (!empty($buttonarray)) {
            $mform->addGroup($buttonarray, 'navar', '', array(' '), false);
        }
        
        if ($data) {
            $this->set_data($data);
        }
    }

    /**
     * Perform minimal validation on the grade form
     * @param array $data
     * @param array $files
     */
    function validation($data, $files) {
        global $DB;
        $errors = parent::validation($data, $files);
        // advanced grading
        if (!array_key_exists('grade', $data)) {
            return $errors;
        }

        //TODO: Review to add validation

        if ($this->geogebra->grade > 0) {
            if (unformat_float($data['grade']) === null && (!empty($data['grade']))) {
                $errors['grade'] = get_string('invalidfloatforgrade', 'assign', $data['grade']);
            } else if (unformat_float($data['grade']) > $this->geogebra->grade) {
                $errors['grade'] = get_string('gradeabovemaximum', 'assign', $this->geogebra->grade);
            } else if (unformat_float($data['grade']) < 0) {
                $errors['grade'] = get_string('gradebelowzero', 'assign');
            }
        } else {
            // this is a scale
            if ($scale = $DB->get_record('scale', array('id'=>-($this->geogebra->grade)))) {
                $scaleoptions = make_menu_from_list($scale->scale);
                if (!array_key_exists((int)$data['grade'], $scaleoptions)) {
                    $errors['grade'] = get_string('invalidgradeforscale', 'assign');
                }
            }
        }
        
        return $errors;
    }

}
