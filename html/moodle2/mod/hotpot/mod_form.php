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
 * The main hotpot configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package   mod-hotpot
 * @copyright 2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/moodleform_mod.php');
require_once(dirname(__FILE__) . '/locallib.php');
require_once($CFG->libdir . '/filelib.php');

/**
 * mod_hotpot_mod_form
 *
 * @copyright 2010 Gordon Bateson
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since     Moodle 2.0
 */
class mod_hotpot_mod_form extends moodleform_mod {

    /**
     * Detects if we are adding a new HotPot activity
     * as opposed to updating an existing one
     *
     * Note: we could use any of the following to detect add:
     *   - empty($this->_instance | _cm)
     *   - empty($this->current->add | id | coursemodule | instance)
     *
     * @return bool True if we are adding an new activity instance, false otherwise
     */
    public function is_add() {
        if (empty($this->current->instance)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Detects if we are updating a new HotPot activity
     * as opposed to adding an new one
     *
     * @return bool True if we are adding an new activity instance, false otherwise
     */
    public function is_update() {
        if (empty($this->current->instance)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Detects if the current activity instance has a grade item in the Moodle gradebook
     *
     * Note: could make this general purpose, if we use $this->_cm->modname for 'itemmodule'
     *
     * @return bool True if the current activity has a grade item, false otherwise
     */
    protected function has_grade_item() {
        global $DB;
        if ($this->is_add()) {
            return false;
        } else {
            return $DB->record_exists('grade_items', array('itemtype'=>'mod', 'itemmodule'=>'hotpot', 'iteminstance'=>$this->current->instance));
        }
    }

    /**
     * return a field value from the original record
     * this function is useful to see if a value has changed
     *
     * @return bool the field value if it exists, false otherwise
     */
    public function get_original_value($fieldname, $default) {
        if (isset($this->current) && isset($this->current->$fieldname)) {
            return $this->current->$fieldname;
        } else {
            return $default;
        }
    }

    /**
     * Defines the hotpot instance configuration form
     *
     * @return void
     */
    function definition() {

        global $CFG;
        $hotpotconfig = get_config('hotpot');
        $mform = $this->_form;

        // General --------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));
        //-----------------------------------------------------------------------------

        // Hotpot name
        if ($this->is_add()) {
            $elements = array(
                $mform->createElement('select', 'namesource', '', hotpot::available_namesources_list()),
                $mform->createElement('text', 'name', '', array('size' => '40'))
            );
            $mform->addGroup($elements, 'name_elements', get_string('name'), array(' '), false);
            $mform->disabledIf('name_elements', 'namesource', 'ne', hotpot::TEXTSOURCE_SPECIFIC);
            $mform->setDefault('namesource', get_user_preferences('hotpot_namesource', hotpot::TEXTSOURCE_FILE));
            $mform->addHelpButton('name_elements', 'nameadd', 'hotpot');
        } else {
            $mform->addElement('text', 'name', get_string('name'), array('size' => '40'));
            $mform->addElement('hidden', 'namesource', hotpot::TEXTSOURCE_SPECIFIC);
            $mform->addHelpButton('name', 'nameedit', 'hotpot');
            $mform->addRule('name', null, 'required', null, 'client');
            $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        }
        $mform->setType('namesource', PARAM_INT);
        if (empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_CLEAN);
        } else {
            $mform->setType('name', PARAM_TEXT);
        }

        // Reference
        // $mform->addElement('filepicker', 'sourceitemid', get_string('sourcefile', 'hotpot'));
        // $mform->addRule('sourceitemid', null, 'required', null, 'client');
        // $mform->addHelpButton('sourceitemid', 'sourcefile', 'hotpot');
        $options = array('subdirs' => 1, 'maxbytes' => 0, 'maxfiles' => -1, 'mainfile' => true, 'accepted_types' => '*');
        $mform->addElement('filemanager', 'sourceitemid', get_string('sourcefile', 'hotpot'), null, $options);
        $mform->addRule('sourceitemid', null, 'required', null, 'client');
        $mform->addHelpButton('sourceitemid', 'sourcefile', 'hotpot');

        // legacy field from Moodle 1.9 - it will probably be removed someday
        $mform->addElement('hidden', 'sourcelocation', isset($this->current->sourcelocation) ? $this->current->sourcelocation : 0);

        // Add quiz chain (this setting is not implemented in Moodle 2.0)
        $mform->addElement('hidden', 'quizchain', 0);
        //if ($this->is_add()) {
        //    $mform->addElement('selectyesno', 'quizchain', get_string('addquizchain', 'hotpot'));
        //    $mform->setDefault('quizchain', get_user_preferences('hotpot_add_quizchain', 0));
        //    $mform->addHelpButton('quizchain', 'addquizchain', 'hotpot');
        //    $mform->setAdvanced('quizchain');
        //} else {
        //    $mform->addElement('hidden', 'quizchain', 0);
        //}

        // Entry page -----------------------------------------------------------------
        $mform->addElement('header', 'entrypagehdr', get_string('entrypagehdr', 'hotpot'));
        //-----------------------------------------------------------------------------

        // Entry page text editor
        $this->add_hotpot_text_editor('entry');

        // Entry page options
        $elements = array(
            $mform->createElement('checkbox', 'entry_title', '', get_string('title', 'hotpot')),
            $mform->createElement('checkbox', 'entry_grading', '', get_string('entry_grading', 'hotpot')),
            $mform->createElement('checkbox', 'entry_dates', '', get_string('entry_dates', 'hotpot')),
            $mform->createElement('checkbox', 'entry_attempts', '', get_string('entry_attempts', 'hotpot'))
        );
        $mform->addGroup($elements, 'entryoptions_elements', get_string('entryoptions', 'hotpot'), html_writer::empty_tag('br'), false);
        $mform->setAdvanced('entryoptions_elements');
        $mform->addHelpButton('entryoptions_elements', 'entryoptions', 'hotpot');
        $mform->disabledIf('entryoptions_elements', 'entrypage', 'ne', 1);

        // Exit page ------------------------------------------------------------------
        $mform->addElement('header', 'exitpagehdr', get_string('exitpagehdr', 'hotpot'));
        //-----------------------------------------------------------------------------

        // Exit page text editor
        $this->add_hotpot_text_editor('exit');

        // Exit page options (feedback)
        $elements = array(
            $mform->createElement('checkbox', 'exit_title', '', get_string('title', 'hotpot')),
            $mform->createElement('checkbox', 'exit_encouragement', '', get_string('exit_encouragement', 'hotpot')),
            $mform->createElement('checkbox', 'exit_attemptscore', '', get_string('exit_attemptscore', 'hotpot', '...')),
            $mform->createElement('checkbox', 'exit_hotpotgrade', '', get_string('exit_hotpotgrade', 'hotpot', '...'))
        );
        $mform->addGroup($elements, 'exit_feedback', get_string('exit_feedback', 'hotpot'), html_writer::empty_tag('br'), false);
        $mform->setAdvanced('exit_feedback');
        $mform->disabledIf('exit_feedback', 'exitpage', 'ne', 1);
        $mform->addHelpButton('exit_feedback', 'exit_feedback', 'hotpot');

        // Exit page options (links)
        $elements = array(
            $mform->createElement('checkbox', 'exit_retry', '', get_string('exit_retry', 'hotpot').': '.get_string('exit_retry_text', 'hotpot')),
            $mform->createElement('checkbox', 'exit_index', '', get_string('exit_index', 'hotpot').': '.get_string('exit_index_text', 'hotpot')),
            $mform->createElement('checkbox', 'exit_course', '', get_string('exit_course', 'hotpot').': '.get_string('exit_course_text', 'hotpot')),
            $mform->createElement('checkbox', 'exit_grades', '', get_string('exit_grades', 'hotpot').': '.get_string('exit_grades_text', 'hotpot')),
        );
        $mform->addGroup($elements, 'exit_links', get_string('exit_links', 'hotpot'), html_writer::empty_tag('br'), false);
        $mform->setAdvanced('exit_links');
        $mform->disabledIf('exit_links', 'exitpage', 'ne', 1);
        $mform->addHelpButton('exit_links', 'exit_links', 'hotpot');

        // Next activity
        $this->add_activity_list('exit');

        // Display --------------------------------------------------------------------
        $mform->addElement('header', 'displayhdr', get_string('display', 'form'));
        //-----------------------------------------------------------------------------

        // Output format
        if (empty($this->current->sourcetype)) {
            $sourcetype = ''; // add
        } else {
            $sourcetype = $this->current->sourcetype;
        }
        $mform->addElement('select', 'outputformat', get_string('outputformat', 'hotpot'), hotpot::available_outputformats_list($sourcetype));
        $mform->setDefault('outputformat', get_user_preferences('hotpot_outputformat', ''));
        $mform->addHelpButton('outputformat', 'outputformat', 'hotpot');

        // Navigation
        $mform->addElement('select', 'navigation', get_string('navigation', 'hotpot'), hotpot::available_navigations_list());
        $mform->setDefault('navigation', get_user_preferences('hotpot_navigation', hotpot::NAVIGATION_MOODLE));
        $mform->addHelpButton('navigation', 'navigation', 'hotpot');

        // Title
        $mform->addElement('select', 'title', get_string('title', 'hotpot'), hotpot::available_titles_list());
        $mform->setDefault('title', get_user_preferences('hotpot_title', hotpot::TEXTSOURCE_SPECIFIC));
        $mform->addHelpButton('title', 'title', 'hotpot');
        $mform->setAdvanced('title');

        // Show stop button
        $options = array(
            'hotpot_giveup' => get_string('giveup', 'hotpot'),
            'specific' => get_string('stopbutton_specific', 'hotpot')
        );
        $elements = array(
            $mform->createElement('selectyesno', 'stopbutton_yesno', ''),
            $mform->createElement('select', 'stopbutton_type', '', $options),
            $mform->createElement('text', 'stopbutton_text', '', array('size' => '20'))
        );
        $mform->addGroup($elements, 'stopbutton_elements', get_string('stopbutton', 'hotpot'), ' ', false);
        $mform->addHelpButton('stopbutton_elements', 'stopbutton', 'hotpot');
        $mform->setAdvanced('stopbutton_elements');

        $mform->setType('stopbutton_yesno', PARAM_INT);
        $mform->setType('stopbutton_type', PARAM_ALPHAEXT);
        $mform->setType('stopbutton_text', PARAM_TEXT);

        $mform->disabledIf('stopbutton_elements', 'stopbutton_yesno', 'ne', '1');
        $mform->disabledIf('stopbutton_text', 'stopbutton_type', 'ne', 'specific');

        // Use filters
        $mform->addElement('selectyesno', 'usefilters', get_string('usefilters', 'hotpot'));
        $mform->setType('usefilters', PARAM_INT);
        $mform->setDefault('usefilters', get_user_preferences('hotpot_quiz_usefilters', 1));
        $mform->addHelpButton('usefilters', 'usefilters', 'hotpot');
        $mform->setAdvanced('usefilters');

        // Use glossary
        $mform->addElement('selectyesno', 'useglossary', get_string('useglossary', 'hotpot'));
        $mform->setType('useglossary', PARAM_INT);
        $mform->setDefault('useglossary', get_user_preferences('hotpot_quiz_useglossary', 1));
        $mform->addHelpButton('useglossary', 'useglossary', 'hotpot');
        $mform->setAdvanced('useglossary');

        // Use media filters
        $mform->addElement('select', 'usemediafilter', get_string('usemediafilter', 'hotpot'), hotpot::available_mediafilters_list());
        $mform->setType('usemediafilter', PARAM_SAFEDIR); // [a-zA-Z0-9_-]
        $mform->setDefault('usemediafilter', get_user_preferences('hotpot_quiz_usemediafilter', 'moodle'));
        $mform->addHelpButton('usemediafilter', 'usemediafilter', 'hotpot');
        $mform->setAdvanced('usemediafilter');

        // Student feedback
        $elements = array(
            $mform->createElement('select', 'studentfeedback', '', hotpot::available_feedbacks_list()),
            $mform->createElement('text', 'studentfeedbackurl', '', array('size'=>'40'))
        );
        $mform->addGroup($elements, 'studentfeedback_elements', get_string('studentfeedback', 'hotpot'), array(' '), false);
        $mform->disabledIf('studentfeedback_elements', 'studentfeedback', 'eq', hotpot::FEEDBACK_NONE);
        $mform->disabledIf('studentfeedback_elements', 'studentfeedback', 'eq', hotpot::FEEDBACK_MOODLEFORUM);
        $mform->disabledIf('studentfeedback_elements', 'studentfeedback', 'eq', hotpot::FEEDBACK_MOODLEMESSAGING);
        $mform->addHelpButton('studentfeedback_elements', 'studentfeedback', 'hotpot');
        $mform->setAdvanced('studentfeedback_elements');
        $mform->setType('studentfeedback', PARAM_INT);
        $mform->setType('studentfeedbackurl', PARAM_URL);

        // Access control -------------------------------------------------------------
        $mform->addElement('header', 'accesscontrolhdr', get_string('accesscontrol', 'lesson'));
        //-----------------------------------------------------------------------------

        // Previous activity
        $this->add_activity_list('entry');

        // Open time
        $mform->addElement('date_time_selector', 'timeopen', get_string('timeopen', 'hotpot'), array('optional' => true));
        $mform->addHelpButton('timeopen', 'timeopenclose', 'hotpot');
        $mform->setAdvanced('timeopen');

        // Close time
        $mform->addElement('date_time_selector', 'timeclose', get_string('timeclose', 'hotpot'), array('optional' => true));
        $mform->addHelpButton('timeclose', 'timeopenclose', 'hotpot');
        $mform->setAdvanced('timeclose');

        // Time limit
        $options = array(
            hotpot::TIME_SPECIFIC => get_string('timelimitspecific', 'hotpot'),
            hotpot::TIME_TEMPLATE => get_string('timelimittemplate', 'hotpot'),
            hotpot::TIME_DISABLE  => get_string('disable')
        );
        $elements = array(
            $mform->createElement('static', '', '', get_string('timelimitsummary', 'hotpot')),
            $mform->createElement('static', '', '', html_writer::empty_tag('br')),
            $mform->createElement('select', 'timelimit', '', $options),
            $mform->createElement('duration', 'timelimitspecific', '', array('optional'=>0, 'defaultunit'=>1))
        );
        $mform->addGroup($elements, 'timelimit_elements', get_string('timelimit', 'hotpot'), '', false);
        $mform->addHelpButton('timelimit_elements', 'timelimit', 'hotpot');
        $mform->setAdvanced('timelimit_elements');
        $mform->setType('timelimit', PARAM_INT);
        $mform->disabledIf('timelimitspecific[number]', 'timelimit', 'ne', hotpot::TIME_SPECIFIC);
        $mform->disabledIf('timelimitspecific[timeunit]', 'timelimit', 'ne', hotpot::TIME_SPECIFIC);

        // Delay 1
        $elements = array(
            $mform->createElement('static', '', '', get_string('delay1summary', 'hotpot')),
            $mform->createElement('static', '', '', html_writer::empty_tag('br')),
            $mform->createElement('duration', 'delay1', '', array('optional'=>1, 'defaultunit'=>1))
        );
        $mform->addGroup($elements, 'delay1_elements', get_string('delay1', 'hotpot'), '', false);
        $mform->addHelpButton('delay1_elements', 'delay1', 'hotpot');
        $mform->setAdvanced('delay1_elements');
        // the standard disabledIf for the "enable" checkbox doesn't work because we are in group, so ...
        $mform->disabledIf('delay1[number]', 'delay1[enabled]', 'notchecked', '');
        $mform->disabledIf('delay1[timeunit]', 'delay1[enabled]', 'notchecked', '');

        // Delay 2
        $elements = array(
            $mform->createElement('static', '', '', get_string('delay2summary', 'hotpot')),
            $mform->createElement('static', '', '', html_writer::empty_tag('br')),
            $mform->createElement('duration', 'delay2', '', array('optional'=>1, 'defaultunit'=>1))
        );
        $mform->addGroup($elements, 'delay2_elements', get_string('delay2', 'hotpot'), '', false);
        $mform->addHelpButton('delay2_elements', 'delay2', 'hotpot');
        $mform->setAdvanced('delay2_elements');
        // the standard disabledIf for the "enable" checkbox doesn't work because we are in group, so ...
        $mform->disabledIf('delay2[number]', 'delay2[enabled]', 'notchecked', '');
        $mform->disabledIf('delay2[timeunit]', 'delay2[enabled]', 'notchecked', '');

        // Delay 3
        $options = array(
            hotpot::TIME_SPECIFIC => get_string('delay3specific', 'hotpot'),
            hotpot::TIME_TEMPLATE => get_string('delay3template', 'hotpot'),
            hotpot::TIME_AFTEROK  => get_string('delay3afterok', 'hotpot'),
            hotpot::TIME_DISABLE  => get_string('delay3disable', 'hotpot')
        );
        $elements = array(
            $mform->createElement('static', '', '', get_string('delay3summary', 'hotpot')),
            $mform->createElement('static', '', '', html_writer::empty_tag('br')),
            $mform->createElement('select', 'delay3', '', $options),
            $mform->createElement('duration', 'delay3specific', '', array('optional'=>0, 'defaultunit'=>1))
        );
        $mform->addGroup($elements, 'delay3_elements', get_string('delay3', 'hotpot'), '', false);
        $mform->addHelpButton('delay3_elements', 'delay3', 'hotpot');
        $mform->setAdvanced('delay3_elements');
        $mform->setType('delay3', PARAM_INT);
        $mform->disabledIf('delay3specific[number]', 'delay3', 'ne', hotpot::TIME_SPECIFIC);
        $mform->disabledIf('delay3specific[timeunit]', 'delay3', 'ne', hotpot::TIME_SPECIFIC);

        // Allow review?
        $mform->addElement('selectyesno', 'allowreview', get_string('allowreview', 'hotpot'));
        $mform->setDefault('allowreview', get_user_preferences('hotpot_review', 1));
        $mform->addHelpButton('allowreview', 'allowreview', 'hotpot');
        $mform->setAdvanced('allowreview');

        // Security -------------------------------------------------------------------
        $mform->addElement('header', 'security', get_string('extraattemptrestrictions', 'quiz'));
        //-----------------------------------------------------------------------------

        // Maximum number of attempts
        $mform->addElement('select', 'attemptlimit', get_string('attemptsallowed', 'quiz'), hotpot::available_attemptlimits_list());
        $mform->setDefault('attemptlimit', get_user_preferences('hotpot_attempts', 0)); // 0=unlimited
        $mform->setAdvanced('attemptlimit');
        $mform->addHelpButton('attemptlimit', 'attemptlimit', 'hotpot');

        // Password
        $mform->addElement('text', 'password', get_string('requirepassword', 'quiz'));
        $mform->setType('password', PARAM_TEXT);
        $mform->addHelpButton('password', 'requirepassword', 'quiz');
        $mform->setAdvanced('password');

        // IP address.
        $mform->addElement('text', 'subnet', get_string('requiresubnet', 'quiz'));
        $mform->setType('subnet', PARAM_TEXT);
        $mform->addHelpButton('subnet', 'requiresubnet', 'quiz');
        $mform->setAdvanced('subnet');

        // Grades ---------------------------------------------------------------------
        $mform->addElement('header', 'gradeshdr', get_string('grades', 'grades'));
        //-----------------------------------------------------------------------------

        // Grading method
        $mform->addElement('select', 'grademethod', get_string('grademethod', 'hotpot'), hotpot::available_grademethods_list());
        $mform->setDefault('grademethod', get_user_preferences('hotpot_grademethod', hotpot::GRADEMETHOD_HIGHEST));
        $mform->addHelpButton('grademethod', 'grademethod', 'hotpot');
        // $mform->setAdvanced('grademethod');

        // Grade weighting
        $mform->addElement('select', 'gradeweighting', get_string('gradeweighting', 'hotpot'), hotpot::available_gradeweightings_list());
        $mform->setDefault('gradeweighting', get_user_preferences('hotpot_gradeweighting', 100));
        $mform->addHelpButton('gradeweighting', 'gradeweighting', 'hotpot');
        $mform->setAdvanced('gradeweighting');

        // Remove grade item
        if ($this->is_add() || ! $this->has_grade_item()) {
            $mform->addElement('hidden', 'removegradeitem', 0);
            $mform->setType('removegradeitem', PARAM_INT);
        } else {
            $mform->addElement('selectyesno', 'removegradeitem', get_string('removegradeitem', 'hotpot'));
            $mform->addHelpButton('removegradeitem', 'removegradeitem', 'hotpot');
            $mform->setType('removegradeitem', PARAM_INT);
            $mform->setAdvanced('removegradeitem');
            // this element is only available if gradeweighting==0
            $mform->disabledIf('removegradeitem', 'gradeweighting', 'selected', 0);
        }

        // Standard settings (groups etc), common to all modules ----------------------
        $this->standard_coursemodule_elements();

        // Standard buttons, common to all modules ------------------------------------
        $this->add_action_buttons();
    }

    /**
     * add_hotpot_text_editor
     *
     * @param xxx $type
     */
    function add_hotpot_text_editor($type)  {

        $mform = $this->_form;

        if ($this->is_add()) {
            $options = array(
                hotpot::TEXTSOURCE_FILE => get_string('textsourcefile', 'hotpot'),
                hotpot::TEXTSOURCE_SPECIFIC => get_string('textsourcespecific', 'hotpot')
            );
            $elements = array(
                $mform->createElement('selectyesno', $type.'page'),
                $mform->createElement('select', $type.'textsource', '', $options)
            );
            $mform->addGroup($elements, $type.'page_elements', get_string($type.'page', 'hotpot'), array(' '), false);
            $mform->setDefault($type.'page', get_user_preferences('hotpot_'.$type.'page', 0));
            $mform->setAdvanced($type.'page_elements');
            $mform->addHelpButton($type.'page_elements', $type.'page', 'hotpot');
            $mform->disabledIf($type.'page_elements', $type.'page', 'ne', 1);
        } else {
            $mform->addElement('selectyesno', $type.'page', get_string($type.'page', 'hotpot'));
            $mform->setType($type.'page', PARAM_INT);
            $mform->addHelpButton($type.'page', $type.'page', 'hotpot');
            $mform->addElement('hidden', $type.'textsource', hotpot::TEXTSOURCE_SPECIFIC);
        }
        $mform->setType($type.'page', PARAM_INT);
        $mform->setType($type.'textsource', PARAM_INT);

        $options = hotpot::text_editors_options($this->context);
        $mform->addElement('editor', $type.'editor', get_string($type.'text', 'hotpot'), null, $options);
        $mform->setType($type.'editor', PARAM_RAW); // no XSS prevention here, users must be trusted
        $mform->setAdvanced($type.'editor');

        $mform->disabledIf($type.'editor[text]', $type.'page', 'ne', 1);
        $mform->disabledIf($type.'editor[format]', $type.'page', 'ne', 1);

        if ($this->is_add()) {
            $mform->disabledIf($type.'editor[text]', $type.'textsource', 'ne', hotpot::TEXTSOURCE_SPECIFIC);
            $mform->disabledIf($type.'editor[format]', $type.'textsource', 'ne', hotpot::TEXTSOURCE_SPECIFIC);
        }
    }

    /**
     * add_activity_list
     *
     * @param xxx $type
     */
    function add_activity_list($type)  {
        global $PAGE;

        // if activity name is longer than $namelength, it will be truncated
        // to first $headlength chars + " ... " + last $taillength chars
        $namelength = 40;
        $headlength = 16;
        $taillength = 16;

        $mform = $this->_form;

        $optgroups = array(
            get_string('none') => array(
                hotpot::ACTIVITY_NONE => get_string('none')
            ),
            get_string($type=='entry' ? 'previous' : 'next') => array(
                hotpot::ACTIVITY_COURSE_ANY     => get_string($type.'cmcourse', 'hotpot'),
                hotpot::ACTIVITY_SECTION_ANY    => get_string($type.'cmsection', 'hotpot'),
                hotpot::ACTIVITY_COURSE_HOTPOT  => get_string($type.'hotpotcourse', 'hotpot'),
                hotpot::ACTIVITY_SECTION_HOTPOT => get_string($type.'hotpotsection', 'hotpot')
            )
        );

        if ($modinfo = get_fast_modinfo($PAGE->course)) {

            // we may need textlib to truncate activity names
            $textlib = hotpot_get_textlib();

            switch ($PAGE->course->format) {
                case 'weeks': $strsection = get_string('strftimedateshort'); break;
                case 'topics': $strsection = get_string('topic'); break;
                default: $strsection = get_string('section');
            }
            $sectionnum = -1;
            foreach ($modinfo->cms as $cmid=>$mod) {
                if ($mod->modname=='label') {
                    continue; // ignore labels
                }
                if ($type=='entry' && $mod->modname=='resource') {
                    continue; // ignore resources as entry activities
                }
                if (isset($form->update) && $form->update==$cmid) {
                    continue; // ignore this hotpot
                }
                if ($sectionnum==$mod->sectionnum) {
                    // do nothing (same section)
                } else {
                    // start new optgroup for this course section
                    $sectionnum = $mod->sectionnum;
                    if ($sectionnum==0) {
                        $optgroup = get_string('activities');
                    } else if ($PAGE->course->format=='weeks') {
                        $date = $PAGE->course->startdate + 7200 + ($sectionnum * 604800);
                        $optgroup = userdate($date, $strsection).' - '.userdate($date + 518400, $strsection);
                    } else {
                        $optgroup = $strsection.': '.$sectionnum;
                    }
                    if (empty($options[$optgroup])) {
                        $options[$optgroup] = array();
                    }
                }

                $name = format_string($mod->name);
                $strlen = $textlib->strlen($name);
                if ($strlen > $namelength) {
                    $head = $textlib->substr($name, 0, $headlength);
                    $tail = $textlib->substr($name, $strlen - $taillength, $taillength);
                    $name = $head.' ... '.$tail;
                }
                $optgroups[$optgroup][$cmid] = $name;
            }
        }

        $options = array();
        for ($i=100; $i>=0; $i--) {
            $options[$i] = $i.'%';
        }
        $elements = array(
            $mform->createElement('selectgroups', $type.'cm', '', $optgroups),
            $mform->createElement('select', $type.'grade', '', $options)
        );
        $mform->addGroup($elements, $type.'cm_elements', get_string($type.'cm', 'hotpot'), array(' '), false);
        $mform->addHelpButton($type.'cm_elements', $type.'cm', 'hotpot');
        if ($type=='entry') {
            $defaultcm = hotpot::ACTIVITY_NONE;
            $defaultgrade = 100;
        } else {
            $defaultcm = hotpot::ACTIVITY_SECTION_HOTPOT;
            $defaultgrade = 0;
        }
        $mform->setDefault($type.'cm', get_user_preferences('hotpot_'.$type.'cm', $defaultcm));
        $mform->setDefault($type.'grade', get_user_preferences('hotpot_'.$type.'grade', $defaultgrade));
        $mform->disabledIf($type.'cm_elements', $type.'cm', 'eq', 0);
        if ($type=='entry') {
            $mform->setAdvanced($type.'cm_elements');
        }

        // add module icons, if possible
        if ($modinfo) {
            $element = reset($mform->getElement($type.'cm_elements')->getElements());
            for ($i=0; $i<count($element->_optGroups); $i++) {
                $optgroup = &$element->_optGroups[$i];
                for ($ii=0; $ii<count($optgroup['options']); $ii++) {
                    $option = &$optgroup['options'][$ii];
                    if (isset($option['attr']['value']) && $option['attr']['value']>0) {
                        $cmid = $option['attr']['value'];
                        $url = $PAGE->theme->pix_url('icon', $modinfo->cms[$cmid]->modname)->out();
                        $option['attr']['style'] = "background-image: url($url); background-repeat: no-repeat; background-position: 1px 2px; min-height: 20px;";
                    }
                }
            }
        }
    }

    /**
     * Prepares the form before data are set
     *
     * Additional wysiwyg editors are prepared here
     * along with the stopbutton switch, type and text
     *
     * @param array $data to be set
     * @return void
     */
    function data_preprocessing(&$data) {

        // Note: if you call "file_prepare_draft_area()" without setting itemid
        // (the first argument), then it will be assigned automatically, and the files
        // for this context will be transferred automatically, which is what we want
        $data['sourceitemid'] = 0;
        if ($this->is_add()) {
            $contextid = null;
        } else {
            $contextid = $this->context->id;
        }
        $options = hotpot::sourcefile_options(); // array('subdirs' => 1, 'maxbytes' => 0, 'maxfiles' => -1);
        file_prepare_draft_area($data['sourceitemid'], $contextid, 'mod_hotpot', 'sourcefile', 0, $options);

        if ($this->is_add()) {
            // set fields from user preferences, where possible
            foreach (hotpot::user_preferences_fieldnames() as $fieldname) {
                if (! isset($data[$fieldname])) {
                    $data[$fieldname] = get_user_preferences('hotpot_'.$fieldname, '');
                }
            }
        }

        // set entry/exit page settings
        foreach (hotpot::text_page_types() as $type) {

            // extract boolean switches for page options
            foreach (hotpot::text_page_options($type) as $name => $mask) {
                $data[$type.'_'.$name] = $data[$type.'options'] & $mask;
            }

            // setup custom wysiwyg editor
            $draftitemid = 0;
            if ($this->is_add()) {
                // adding a new hotpot instance
                $data[$type.'editor'] = array(
                    'text'   => file_prepare_draft_area($draftitemid, $contextid, 'mod_hotpot', $type, 0),
                    'format' => editors_get_preferred_format(),
                    'itemid' => file_get_submitted_draft_itemid($type)
                );
            } else {
                // editing an existing hotpot
                $data[$type.'editor'] = array(
                    'text'   => file_prepare_draft_area($draftitemid, $contextid, 'mod_hotpot', $type, 0, $options, $data[$type.'text']),
                    'format' => $data[$type.'format'],
                    'itemid' => file_get_submitted_draft_itemid($type)
                );
            }
        }

        // timelimit
        if ($data['timelimit']>0) {
            $data['timelimitspecific'] = $data['timelimit'];
            $data['timelimit'] = hotpot::TIME_SPECIFIC;
        } else {
            $data['timelimitspecific'] = 0;
        }

        // delay3
        if ($data['delay3']>0) {
            $data['delay3specific'] = $data['delay3'];
            $data['delay3'] = hotpot::TIME_SPECIFIC;
        } else {
            $data['delay3specific'] = 0;
        }

        // set stopbutton options
        switch ($data['stopbutton']) {
            case hotpot::STOPBUTTON_SPECIFIC:
                $data['stopbutton_yesno'] = 1;
                $data['stopbutton_type'] = 'specific';
                $data['stopbutton_text'] = $data['stoptext'];
                break;
            case hotpot::STOPBUTTON_LANGPACK:
                $data['stopbutton_yesno'] = 1;
                $data['stopbutton_type'] = $data['stoptext'];
                $data['stopbutton_text'] = '';
                break;
            case hotpot::STOPBUTTON_NONE:
            default:
                $data['stopbutton_yesno'] = 0;
                $data['stopbutton_type'] = '';
                $data['stopbutton_text'] = '';
        }
    }

    /**
     * validation
     *
     * @param xxx $data
     * @return xxx
     */
    function validation($data, $files)  {
        global $USER;

        // http://docs.moodle.org/en/Development:lib/formslib.php_Validation
        // Note: see "lang/en/error.php" for a list of common messages
        $errors = array();

        // get the $files specified in the form
        $usercontext = get_context_instance(CONTEXT_USER, $USER->id);
        $fs = get_file_storage();
        $files = $fs->get_area_files($usercontext->id, 'user', 'draft', $data['sourceitemid'], 'sortorder, id', 0); // files only, no dirs

        // check we have at least one file
        // (and set mainfile marker, if necessary)
        if (empty($files)) {
            $errors['sourceitemid'] = get_string('required');
            // $errors['sourceitemid'] = get_string('nofile', 'error');
        } else {
            $mainfile = false;
            foreach ($files as $file) {
                if ($file->get_sortorder()==1) {
                    $mainfile = true;
                    break;
                }
            }
            if (! $mainfile) {
                $file = reset($files); // first file in the list
                file_set_sortorder($file->get_contextid(), $file->get_component(), $file->get_filearea(), $file->get_itemid(), $file->get_filepath(), $file->get_filename(), 1);
            }
        }

        // studentfeedbackurl
        if ($data['studentfeedback']==hotpot::FEEDBACK_WEBPAGE || $data['studentfeedback']==hotpot::FEEDBACK_FORMMAIL) {
            if (empty($data['studentfeedbackurl']) || ! preg_match('/^https?:\/\/.+/', $data['studentfeedbackurl'])) {
                // empty or invalid url
                $errors['studentfeedback_elements']= get_string('invalidurl', 'error');
            }
        }

        return $errors;
    }
}
