<?php

/*
 * The form to set up or update an instance of the rcontent module
 */

require_once($CFG->dirroot . '/course/moodleform_mod.php');
require_once("$CFG->dirroot/mod/rcontent/locallib.php");


class mod_rcontent_mod_form extends moodleform_mod {

    function definition() {

        global $CFG, $DB, $PAGE;
        $mform    =& $this->_form;
        $update = optional_param("update", 0, PARAM_INT);
        $rcontentconfig = get_config('rcontent');
        $frame = $rcontentconfig->frametype;
        $popup = $rcontentconfig->popup;
        $RCONTENT_WINDOW_OPTIONS = array(
            'resizable' => $rcontentconfig->popupresizable,
            'scrollbars' => $rcontentconfig->popupscrollbars,
            'directories' => $rcontentconfig->popupdirectories,
            'location' => $rcontentconfig->popuplocation,
            'menubar' => $rcontentconfig->popupmenubar,
            'toolbar' => $rcontentconfig->popuptoolbar,
            'status' => $rcontentconfig->popupstatus,
            'width' => $rcontentconfig->popupwidth,
            'height' => $rcontentconfig->popupheight);

        $PAGE->requires->js('/mod/rcontent/loadselects_ajax.js', true);

        if (!empty($update)) {
            if ($cm = get_coursemodule_from_id('rcontent', $update)) {
                if ($rcontent = $DB->get_record('rcontent', array('id' => $cm->instance))) {
                    $frame = $rcontent->frame;
                    $popup = $rcontent->popup;
                    if (!empty($rcontent->popup_options)) {
                        foreach ($RCONTENT_WINDOW_OPTIONS as $key => $value) {
                            $RCONTENT_WINDOW_OPTIONS[$key] = 0;
                        }
                        $popup_options_ar = explode(",", $rcontent->popup_options);
                        foreach ($popup_options_ar as $p) {
                            $pa = explode("=", $p);
                            if(in_array($pa[0], $RCONTENT_WINDOW_OPTIONS)){
                                $RCONTENT_WINDOW_OPTIONS[$pa[0]] = $pa[1];
                            }
                        }
                    }
                }
            }
        }

        //set optional parameters to js script
        $ajax_config_settings = array(
            'wwwroot' => $CFG->wwwroot,
            'sesskey' => sesskey(),
            'parametererror' => get_string('parametererror', 'rcontent'),
            'jsonerror' => get_string('jsonerror', 'rcontent'),
            'ajaxresponseerror' => get_string('ajaxresponseerror', 'rcontent'),
            'get_string_unit' => '- '.get_string('unit', 'rcontent').' -',
            'get_string_activity' => '- '.get_string('activity', 'rcontent').' -');
        if (!empty($update)) {
            $ajax_config_settings['cmid'] = $update;
        }
        $PAGE->requires->data_for_js('ajax_config', $ajax_config_settings, true);

        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('hidden', 'issubmit');
        $mform->setConstant('issubmit', 1);
        $mform->setType('issubmit', PARAM_BOOL);

        $mform->addElement('text', 'name', get_string('name', 'rcontent'), array('size' => 64));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required');

        if (!empty($update)) {
            $level = optional_param('level', $rcontent->levelid, PARAM_INT);
            $isbn = optional_param('isbn', $rcontent->bookid, PARAM_INT);
            $unit = optional_param('unit', $rcontent->unitid, PARAM_INT);
            $activity = optional_param('activity', $rcontent->activityid, PARAM_INT);
        } else {
            $level = optional_param('level', false, PARAM_INT);
            $isbn = optional_param('isbn', false, PARAM_INT);
            $unit = optional_param('unit', false, PARAM_INT);
            $activity = optional_param('activity', false, PARAM_INT);
        }

        // Level
		$levellistarray = rcontent_level_list();
        if (ajaxenabled()) {
            $attrs = array('onchange' => 'javascript:rcontent_load_isbn_list(this.value)');
        } else {
  	        $attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit();');
        }
        $mform->addElement('select', 'level', get_string('level', 'rcontent'), $levellistarray, $attrs);
        $mform->setType('level', PARAM_INT);
        $mform->addRule('level', get_string('isbnerror', 'rcontent'), 'nonzero');
        $mform->addRule('level', null, 'required');
        $mform->setDefault('level', $level);

        // ISBN
        // Set isbn select onchange event width ajax and without it
        if (!empty($level)) {
  	        $isbnlistarray = rcontent_isbn_list($level, 'updateform');
            $selecttype = 'selectgroups';
        } else {
  	        $isbnlistarray = array('- '.get_string('isbn', 'rcontent').' -');
            $selecttype = 'select';
        }
        if (ajaxenabled()) {
            $attrs = array('onchange' => 'javascript:rcontent_load_unit_list(this.value);');
        } else {
  	        $attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit();');
        }
        $mform->addElement($selecttype, 'isbn', get_string('isbn', 'rcontent'), $isbnlistarray, $attrs);
        $mform->setType('isbn', PARAM_INT);
        $mform->addRule('isbn', get_string('isbnerror', 'rcontent'), 'nonzero');
        $mform->addRule('isbn', null, 'required');
        $mform->setDefault('isbn', $isbn);

        // Unit
        // Load unit select options with ajax and without it
        if (!empty($isbn)) {
  	        $unitlistarray = rcontent_unit_list($isbn, 'updateform');
        } else {
  	        $unitlistarray = array('- '.get_string('unit', 'rcontent').' -');
        }
        // Set unit select onchange event width aja and without it
        if (ajaxenabled()) {
  	        $attrs = array('onchange' => 'javascript:rcontent_load_activity_list(document.getElementById("id_isbn").value,this.value)');
        } else {
  	        $attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit()');
        }
        $mform->addElement('select', 'unit', get_string('unit', 'rcontent'), $unitlistarray , $attrs);
        $mform->setType('unit', PARAM_INT);
        $mform->setDefault('unit', $unit);

        // Activity
        // Load activity select options width ajax and widthout it
        if (!empty($isbn) && !empty($unit)) {
  	        $activitylistarray = rcontent_activity_list($isbn, $unit, 'updateform');
        } else {
            $activitylistarray = array('- '.get_string('activity', 'rcontent').' -');
        }
        $mform->addElement('select', 'activity', get_string('activity', 'rcontent'), $activitylistarray);
        $mform->setType('activity', PARAM_INT);
        $mform->setDefault('activity', $activity);

        // Summary
        $mform->addElement('htmleditor', 'summary', get_string('summary'));
        $mform->setType('summary', PARAM_RAW);
        $mform->addHelpButton('summary', 'summary');

        // Other settings
        $mform->addElement('header', 'displaysettings', get_string('displaysettings', 'rcontent'));

        // Forcedownload
        $mform->addElement('checkbox', 'forcedownload', get_string('forcedownload', 'rcontent'));
        $mform->addHelpButton('forcedownload', 'forcedownload', 'rcontent');
        $mform->disabledIf('forcedownload', 'windowpopup', 'eq', 1);

        // Pagewindow
        $woptions = array(0 => get_string('pagewindow', 'rcontent'), 1 => get_string('newwindow', 'rcontent'));
        $mform->addElement('select', 'windowpopup', get_string('display', 'rcontent'), $woptions);
        $mform->setDefault('windowpopup', $popup);
        $mform->disabledIf('windowpopup', 'forcedownload', 'checked');

        // Keepnavigationvisibleorno
        $mform->addElement('select', 'framepage', get_string('keepnavigationvisible', 'rcontent'), rcontent_get_frame_type_array());
        $mform->addHelpButton('framepage', 'keepnavigationvisible', 'rcontent');
        $mform->setDefault('framepage', $frame);
        $mform->disabledIf('framepage', 'windowpopup', 'eq', 1);
        $mform->disabledIf('framepage', 'forcedownload', 'checked');
        $mform->setAdvanced('framepage');

        // Going through all the options popup
        foreach ($RCONTENT_WINDOW_OPTIONS as $option => $o) {
            if ($option == 'height' or $option == 'width') {
                $mform->addElement('text', $option, get_string('new'.$option, 'rcontent'), array('size' => '4'));
                $mform->setDefault($option, $o);
                $mform->setType($option, PARAM_INT);
            } else {
                $mform->addElement('checkbox', $option, get_string('new'.$option, 'rcontent'));
                $mform->setDefault($option, $o);
                $mform->disabledIf($option, 'windowpopup', 'eq', 0);
            }
            $mform->setAdvanced($option);
        }

        // Grade Settings
        //XTEC ********** AFEGIT -> Added grading option in the rcontent creation form.
        //18/02/2014 . @naseq
        $this->standard_grading_coursemodule_elements();
        $mform->removeElement('grade');
        /*$mform->addElement('hidden', 'grade', $rcontent->maximumgrade);
        $mform->setType('grade', PARAM_FLOAT);*/

        // What Grade
        $mform->addElement('select', 'whatgrade', get_string('whatgrade', 'rcontent'), rcontent_get_what_grade_array());
        $mform->addHelpButton('whatgrade', 'whatgrade', 'rcontent');
        $mform->setDefault('whatgrade',  $rcontentconfig->whatgrade);
        // $mform->setAdvanced('whatgrade');
        //*********** FI

        // Add standard elements, common to all modules
        $features = new stdClass;
        $features->groups = true;
        $features->groupings = true;
        $features->groupmembersonly = true;
        $this->standard_coursemodule_elements($features);

        //Buttons
        $this->add_action_buttons();
    }

    function validation ($data, $files){

    	$errors = array();

    	if ($data['issubmit'] == 0) {
    		$errors['issubmit'] = get_string('required');
    		return $errors;
    	}

    	parent::validation($data, $files);;
    }
}
