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
 * Bulk course upload forms
 *
 * @package    tool
 * @subpackage uploadcoursecategory
 * @copyright  2007 Dan Poltawski
 * @copyright  2012 Piers Harding
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once $CFG->libdir.'/formslib.php';


/**
 * Upload a file CVS file with course information.
 *
 * @copyright  2007 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class admin_uploadcoursecategory_form1 extends moodleform {
    function definition () {
        $mform = $this->_form;

        $mform->addElement('header', 'settingsheader', get_string('upload'));

        $mform->addElement('filepicker', 'coursefile', get_string('file'));
        $mform->addRule('coursefile', null, 'required');

        $choices = csv_import_reader::get_delimiter_list();
        $mform->addElement('select', 'delimiter_name', get_string('csvdelimiter', 'tool_uploadcoursecategory'), $choices);
        if (array_key_exists('cfg', $choices)) {
            $mform->setDefault('delimiter_name', 'cfg');
        } else if (get_string('listsep', 'langconfig') == ';') {
            $mform->setDefault('delimiter_name', 'semicolon');
        } else {
            $mform->setDefault('delimiter_name', 'comma');
        }

        $choices = textlib::get_encodings();
        $mform->addElement('select', 'encoding', get_string('encoding', 'tool_uploadcoursecategory'), $choices);
        $mform->setDefault('encoding', 'UTF-8');

        $choices = array('10'=>10, '20'=>20, '100'=>100, '1000'=>1000, '100000'=>100000);
        $mform->addElement('select', 'previewrows', get_string('rowpreviewnum', 'tool_uploadcoursecategory'), $choices);
        $mform->setType('previewrows', PARAM_INT);

        $this->add_action_buttons(false, get_string('uploadcoursecategories', 'tool_uploadcoursecategory'));
    }
}


/**
 * Specify course upload details
 *
 * @copyright  2007 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class admin_uploadcoursecategory_form2 extends moodleform {
    function definition () {
        global $CFG, $COURSE, $DB;

        $mform   = $this->_form;
        $columns = $this->_customdata['columns'];
        $data    = $this->_customdata['data'];
        $courseconfig = get_config('moodlecourse');

        // I am the template course, why should it be the administrator? we have roles now, other ppl may use this script ;-)
        $templatecourse = $COURSE;

        // upload settings and file
        $mform->addElement('header', 'settingsheader', get_string('settings'));

        $choices = array(CC_COURSE_ADDNEW     => get_string('ccoptype_addnew', 'tool_uploadcoursecategory'),
                         CC_COURSE_ADDINC     => get_string('ccoptype_addinc', 'tool_uploadcoursecategory'),
                         CC_COURSE_ADD_UPDATE => get_string('ccoptype_addupdate', 'tool_uploadcoursecategory'),
                         CC_COURSE_UPDATE     => get_string('ccoptype_update', 'tool_uploadcoursecategory'));
        $mform->addElement('select', 'cctype', get_string('ccoptype', 'tool_uploadcoursecategory'), $choices);

        $choices = array(CC_UPDATE_NOCHANGES    => get_string('nochanges', 'tool_uploadcoursecategory'),
                         CC_UPDATE_FILEOVERRIDE => get_string('ccupdatefromfile', 'tool_uploadcoursecategory'),
                         CC_UPDATE_ALLOVERRIDE  => get_string('ccupdateall', 'tool_uploadcoursecategory'),
                         CC_UPDATE_MISSING      => get_string('ccupdatemissing', 'tool_uploadcoursecategory'));
        $mform->addElement('select', 'ccupdatetype', get_string('ccupdatetype', 'tool_uploadcoursecategory'), $choices);
        $mform->setDefault('ccupdatetype', CC_UPDATE_NOCHANGES);
        $mform->disabledIf('ccupdatetype', 'cctype', 'eq', CC_COURSE_ADDNEW);
        $mform->disabledIf('ccupdatetype', 'cctype', 'eq', CC_COURSE_ADDINC);

        $mform->addElement('selectyesno', 'ccallowrenames', get_string('allowrenames', 'tool_uploadcoursecategory'));
        $mform->setDefault('ccallowrenames', 0);
        $mform->disabledIf('ccallowrenames', 'cctype', 'eq', CC_COURSE_ADDNEW);
        $mform->disabledIf('ccallowrenames', 'cctype', 'eq', CC_COURSE_ADDINC);

        $mform->addElement('selectyesno', 'ccallowdeletes', get_string('allowdeletes', 'tool_uploadcoursecategory'));
        $mform->setDefault('ccallowdeletes', 0);
        $mform->disabledIf('ccallowdeletes', 'cctype', 'eq', CC_COURSE_ADDNEW);
        $mform->disabledIf('ccallowdeletes', 'cctype', 'eq', CC_COURSE_ADDINC);


        $mform->addElement('selectyesno', 'ccstandardnames', get_string('ccstandardnames', 'tool_uploadcoursecategory'));
        $mform->setDefault('ccstandardnames', 1);

//        $choices = array(CC_BULK_NONE    => get_string('no'),
//                         CC_BULK_NEW     => get_string('ccbulknew', 'tool_uploadcoursecategory'),
//                         CC_BULK_UPDATED => get_string('ccbulkupdated', 'tool_uploadcoursecategory'),
//                         CC_BULK_ALL     => get_string('ccbulkall', 'tool_uploadcoursecategory'));
//        $mform->addElement('select', 'ccbulk', get_string('ccbulk', 'tool_uploadcoursecategory'), $choices);
//        $mform->setDefault('ccbulk', 0);


        // default values
        $mform->addElement('header', 'defaultheader', get_string('defaultvalues', 'tool_uploadcoursecategory'));
        $mform->addElement('text', 'ccname', get_string('ccnametemplate', 'tool_uploadcoursecategory'), 'maxlength="100" size="20"');
        $mform->addHelpButton('ccname', 'namecoursecategory', 'tool_uploadcoursecategory');
        $mform->disabledIf('ccname', 'cctype', 'eq', CC_COURSE_ADD_UPDATE);
        $mform->disabledIf('ccname', 'cctype', 'eq', CC_COURSE_UPDATE);

        $mform->addElement('text','ccidnumber', get_string('ccidnumbertemplate', 'tool_uploadcoursecategory'),'maxlength="100"  size="10"');
        $mform->addHelpButton('ccidnumber', 'idnumbercoursecategory');
        $mform->disabledIf('ccidnumber', 'cctype', 'eq', CC_COURSE_ADD_UPDATE);
        $mform->disabledIf('ccidnumber', 'cctype', 'eq', CC_COURSE_UPDATE);

        if (!empty($CFG->allowcategorythemes)) {
            $themeobjects = get_list_of_themes();
            $themes=array();
            $themes[''] = get_string('forceno');
            foreach ($themeobjects as $key=>$theme) {
                if (empty($theme->hidefromselector)) {
                    $themes[$key] = get_string('pluginname', 'theme_'.$theme->name);
                }
            }
            $mform->addElement('select', 'theme', get_string('forcetheme'), $themes);
        }

//--------------------------------------------------------------------------------
        $mform->addElement('header','', get_string('availability'));

        $choices = array();
        $choices['0'] = get_string('coursecategoryavailablenot', 'tool_uploadcoursecategory');
        $choices['1'] = get_string('coursecategoryavailable', 'tool_uploadcoursecategory');
        $mform->addElement('select', 'visible', get_string('availability'), $choices);
        $mform->addHelpButton('visible', 'coursecategoryavailability', 'tool_uploadcoursecategory');
        $mform->setDefault('visible', $courseconfig->visible);

        // hidden fields
        $mform->addElement('hidden', 'iid');
        $mform->setType('iid', PARAM_INT);

        $mform->addElement('hidden', 'previewrows');
        $mform->setType('previewrows', PARAM_INT);

        $this->add_action_buttons(true, get_string('uploadcoursecategories', 'tool_uploadcoursecategory'));

        $this->set_data($data);
    }

    /**
     * Form tweaks that depend on current data.
     */
    function definition_after_data() {
        $mform   = $this->_form;
        $columns = $this->_customdata['columns'];

        foreach ($columns as $column) {
            if ($mform->elementExists($column)) {
                $mform->removeElement($column);
            }
        }

    }

    /**
     * Server side validation.
     */
    function validation($data, $files) {
        global $DB;

        $errors = parent::validation($data, $files);
        $columns = $this->_customdata['columns'];
        $optype  = $data['cctype'];


        // look for other required data
        if ($optype != CC_COURSE_UPDATE) {
            if (!in_array('name', $columns)) {
               $errors['cctype'] = get_string('missingfield', 'error', 'name');
            }
            if (!in_array('description', $columns)) {
                if (isset($errors['cctype'])) {
                    $errors['cctype'] .= ' ';
                }
                $errors['cctype'] .= get_string('missingfield', 'error', 'description');
            }
        }
        if (!empty($data['templatename']) && $data['templatename'] != 'none') {
            if (!$template = $DB->get_record('course', array('name' => $data['templatename']))) {
                $errors['templatename'] = get_string('missingtemplate', 'tool_uploadcoursecategory');
            }
        }

        return $errors;
    }

    /**
     * Used to reformat the data from the editor component
     *
     * @return stdClass
     */
    function get_data() {
        $data = parent::get_data();

        if ($data !== null and isset($data->description)) {
            $data->descriptionformat = $data->description['format'];
            $data->description = $data->description['text'];
        }

        return $data;
    }
}
