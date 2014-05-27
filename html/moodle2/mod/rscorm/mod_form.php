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

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'/mod/rscorm/locallib.php');
//MARSUPIAL ********** AFEGIT - load instance when update
if ($CFG->branch < 24) {
    $PAGE->requires->yui2_lib(array('json','connection', 'dom', 'event', 'yahoo'));
}
$PAGE->requires->js('/mod/rscorm/loadselects_ajax.js', true);
//********** FI
class mod_rscorm_mod_form extends moodleform_mod {

    function definition() {
        global $CFG, $COURSE, $OUTPUT, $DB;
        $cfg_scorm = get_config('rscorm');

        $mform = $this->_form;

        if (!$CFG->slasharguments) {
            $mform->addElement('static', '', '', $OUTPUT->notification(get_string('slashargs', 'rscorm'), 'notifyproblem'));
        }
//MARSUPIAL ********** AFEGIT - load instance when update
        $update = optional_param("update",0,PARAM_INT);

        if(!empty($update)){
        	if ($cm = get_coursemodule_from_id('rscorm', $update)) {
        		if (!$rscorm = $DB->get_record('rscorm', array('id' => $cm->instance))) {
        			rscorm_insert_error_log('errorloadinstancebd',$update);
        		}
        	}else{
        		rscorm_insert_error_log('errorloadcoursebd',$update);
        	}
        }
//********** FI
        //-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Name
//MARSUPIAL ********** AFEGIT - Improve name field to have autoload select without ajax
        $mform->addElement('hidden','issubmit');
        $mform->setConstant('issubmit',1);
//********** FI
        $mform->addElement('text', 'name', get_string('name'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');

//MARSUPIAL ********** AFEGIT - Put select fields to choose the isbn, unit and activity
        $ajax_config_settings = array("wwwroot"=>$CFG->wwwroot, "sesskey"=>sesskey(), 'parametererror'=>get_string('parametererror','rscorm'), 'jsonerror'=>get_string('jsonerror','rscorm'), 'ajaxresponseerror'=>get_string('ajaxresponseerror','rscorm'), 'get_string_unit'=>'- '.get_string('unit','rscorm').' -', 'get_string_activity'=>'- '.get_string('activity','rscorm').' -');
        if(!empty($update)){
        	$ajax_config_settings['cmid']=$update;
        }
// MARSUPIAL *********** MODIFICAT -> Not send output and use the JS yui
// 2013.02.2 @abertranb
        global $PAGE;
        $PAGE->requires->data_for_js('ajax_config', $ajax_config_settings, true);
// ********* ORIGINAL
        /*echo "<script type=\"text/javascript\">//<![CDATA[\n".
        		"var ajax_config = " . json_encode($ajax_config_settings) . ";\n".
        		"//]]></script>\n";*/
// ********* FI

        //Level
        $level_list_array=rscorm_level_list();
        if(!empty($update)){
        	$mform->setDefault('level',$rscorm->levelid);
        }
        if (ajaxenabled()){
        	$attrs = array('onchange' => 'javascript:rscorm_load_isbn_list(this.value)');
        } else{
        	$attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit();');
        }
        $mform->addElement('select', 'level', get_string('level','rscorm'), $level_list_array, $attrs);
        $mform->setType('level', PARAM_INT);

        // Isbn
        //set isbn select onchange event width ajax and without it
        if (!empty($update)){
        	$level=(isset($_POST['level']))?$_POST['level']:$rscorm->levelid;
        	$isbn_list_array = rscorm_isbn_list($level,'updateform');
        	$mform->setDefault('isbn',$rscorm->bookid);
        }else if(!ajaxenabled()&&isset($_POST['level'])){
        	$isbn_list_array = rscorm_isbn_list($_POST['level'],'updateform');
        }else{
        	$isbn_list_array=array('- '.get_string('isbn','rscorm').' -');
        }
        //echo var_dump($isbn_list_array);
        if (ajaxenabled()){
        	$attrs = array('onchange' => 'javascript:rscorm_load_unit_list(this.value);');
        } else{
        	$attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit();');
        }
        $mform->addElement('select', 'isbn', get_string('isbn','rscorm'), $isbn_list_array, $attrs);
        $mform->setType('isbn', PARAM_INT);
        $mform->addRule('isbn', get_string('isbnerror','rscorm'), 'nonzero', null, 'client');

        // Unit
        //loetHelpButton() is deprecad unit select options with ajax and without it
        if(!empty($update)){
        	$isbn=(isset($_POST['isbn']))?$_POST['isbn']:$rscorm->bookid;
        	$unit_list_array = rscorm_unit_list($isbn,'updateform');
        	$mform->setDefault('unit',$rscorm->unitid);
        }else if(!ajaxenabled()&&isset($_POST['isbn'])){
        	$unit_list_array = rscorm_unit_list($_POST['isbn'],'updateform');
        }else{
        	$unit_list_array=array('- '.get_string('unit','rscorm').' -');
        }
        //set unit select onchange event width aja and without it
        if (ajaxenabled()){
        	$attrs = array('onchange' => 'javascript:rscorm_load_activity_list(document.getElementById("id_isbn").value,this.value)');
        }else{
        	$attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit()');
        }
        $mform->addElement('select', 'unit', get_string('unit','rscorm'), $unit_list_array , $attrs);
        $mform->setType('unit', PARAM_INT);

        // Activity
        //load activity select options width ajax and widthout it
        if(!empty($update)){
        	$unit=(isset($_POST['unit']))?$_POST['unit']:$rscorm->unitid;
        	$activity_list_array = rscorm_activity_list($isbn,$unit,'updateform');
        	$mform->setDefault('activity',$rscorm->activityid);
        }else if(!ajaxenabled()&&isset($_POST['isbn'])&&isset($_POST['unit'])){
        	$activity_list_array = rscorm_activity_list($_POST['isbn'],$_POST['unit'],'updateform');
        }else{
        	$activity_list_array=array('- '.get_string('activity','rscorm').' -');
        }
        $mform->addElement('select', 'activity', get_string('activity','rscorm'), $activity_list_array);
        $mform->setType('activity', PARAM_INT);
        //********** FI

        // Summary
/*        $mform->addElement('htmleditor', 'summary', get_string('summary'));
        $mform->setType('summary', PARAM_RAW);
        / * $mform->addRule('summary', get_string('required'), 'required', null, 'client');* /
        $mform->addHelpButton('summary', 'summary');

  */      //MARSUPIAL ********** ELIMINAT - Take out reference field
        /*// Reference
         $mform->addElement('choosecoursefileorimsrepo', 'reference', get_string('package','rscorm'));
        $mform->setType('reference', PARAM_RAW);  // We need to find a better PARAM
        $mform->addRule('reference', get_string('required'), 'required');
        $mform->setHelpButton('reference',array('package', get_string('package', 'rscorm'), 'rscorm'));
        */
        //********** FI

        // Summary
        $this->add_intro_editor(true);

        // Scorm types
        $scormtypes = array(RSCORM_TYPE_LOCAL => get_string('typelocal', 'rscorm'));

        if ($cfg_scorm->allowtypeexternal) {
            $scormtypes[RSCORM_TYPE_EXTERNAL] = get_string('typeexternal', 'rscorm');
        }

        if ($cfg_scorm->allowtypelocalsync) {
            $scormtypes[RSCORM_TYPE_LOCALSYNC] = get_string('typelocalsync', 'rscorm');
        }

        if (!empty($CFG->repositoryactivate) and $cfg_scorm->allowtypeimsrepository) {
            $scormtypes[RSCORM_TYPE_IMSREPOSITORY] = get_string('typeimsrepository', 'rscorm');
        }

        if ($cfg_scorm->allowtypeexternalaicc) {
            $scormtypes[RSCORM_TYPE_AICCURL] = get_string('typeaiccurl', 'rscorm');
        }
        if (count($scormtypes) > 1) {
            $mform->addElement('select', 'scormtype', get_string('scormtype', 'rscorm'), $scormtypes);
            $mform->addHelpButton('scormtype', 'scormtype', 'rscorm');
            $mform->addElement('text', 'packageurl', get_string('packageurl', 'rscorm'), array('size'=>60));
            $mform->setType('packageurl', PARAM_RAW);
            $mform->addHelpButton('packageurl', 'packageurl', 'rscorm');
            $mform->disabledIf('packageurl', 'scormtype', 'eq', RSCORM_TYPE_LOCAL);
        } else {
            $mform->addElement('hidden', 'scormtype', RSCORM_TYPE_LOCAL);
        }
//MARSUPIAL ********** ELIMINAT - Take out package file

     //   New local package upload
//        $maxbytes = get_max_upload_file_size($CFG->maxbytes, $COURSE->maxbytes);
//        $mform->setMaxFileSize($maxbytes);
//        $mform->addElement('filepicker', 'packagefile', get_string('package', 'rscorm'));
//        $mform->addHelpButton('packagefile', 'package', 'rscorm');
//         $mform->disabledIf('packagefile', 'scormtype', 'noteq', RSCORM_TYPE_LOCAL);
// FI **************+
        //-------------------------------------------------------------------------------
        // Time restrictions
        $mform->addElement('header', 'timerestricthdr', get_string('timerestrict', 'rscorm'));

        $mform->addElement('date_time_selector', 'timeopen', get_string("rscormopen", "rscorm"), array('optional' => true));
        $mform->addElement('date_time_selector', 'timeclose', get_string("rscormclose", "rscorm"), array('optional' => true));
        //-------------------------------------------------------------------------------
        // display Settings
        $mform->addElement('header', 'displaysettings', get_string('displaysettings', 'rscorm'));
        // Framed / Popup Window
        $mform->addElement('select', 'popup', get_string('display', 'rscorm'), rscorm_get_popup_display_array());
        $mform->setDefault('popup', $cfg_scorm->popup);
        $mform->setAdvanced('popup', $cfg_scorm->popup_adv);

        // Width
        $mform->addElement('text', 'width', get_string('width', 'rscorm'), 'maxlength="5" size="5"');
        $mform->setDefault('width', $cfg_scorm->framewidth);
        $mform->setType('width', PARAM_INT);
        $mform->setAdvanced('width', $cfg_scorm->framewidth_adv);
        $mform->disabledIf('width', 'popup', 'eq', 0);

        // Height
        $mform->addElement('text', 'height', get_string('height', 'rscorm'), 'maxlength="5" size="5"');
        $mform->setDefault('height', $cfg_scorm->frameheight);
        $mform->setType('height', PARAM_INT);
        $mform->setAdvanced('height', $cfg_scorm->frameheight_adv);
        $mform->disabledIf('height', 'popup', 'eq', 0);

        // Window Options
        $winoptgrp = array();
        foreach (rscorm_get_popup_options_array() as $key => $value) {
            $winoptgrp[] = &$mform->createElement('checkbox', $key, '', get_string($key, 'rscorm'));
            $mform->setDefault($key, $value);
        }
        $mform->addGroup($winoptgrp, 'winoptgrp', get_string('options', 'rscorm'), '<br />', false);
        $mform->disabledIf('winoptgrp', 'popup', 'eq', 0);
        $mform->setAdvanced('winoptgrp', $cfg_scorm->winoptgrp_adv);

        // Skip view page
        $skipviewoptions = rscorm_get_skip_view_array();
        if ($COURSE->format == 'rscorm') { // Remove option that would cause a constant redirect.
            unset($skipviewoptions[RSCORM_SKIPVIEW_ALWAYS]);
            if ($cfg_scorm->skipview == RSCORM_SKIPVIEW_ALWAYS) {
                $cfg_scorm->skipview = RSCORM_SKIPVIEW_FIRST;
            }
        }
        $mform->addElement('select', 'skipview', get_string('skipview', 'rscorm'), $skipviewoptions);
        $mform->addHelpButton('skipview', 'skipview', 'rscorm');
        $mform->setDefault('skipview', $cfg_scorm->skipview);
        $mform->setAdvanced('skipview', $cfg_scorm->skipview_adv);

        // Hide Browse
        $mform->addElement('selectyesno', 'hidebrowse', get_string('hidebrowse', 'rscorm'));
        $mform->addHelpButton('hidebrowse', 'hidebrowse', 'rscorm');
        $mform->setDefault('hidebrowse', $cfg_scorm->hidebrowse);
        $mform->setAdvanced('hidebrowse', $cfg_scorm->hidebrowse_adv);

        // Display course structure
        $mform->addElement('selectyesno', 'displaycoursestructure', get_string('displaycoursestructure', 'rscorm'));
        $mform->addHelpButton('displaycoursestructure', 'displaycoursestructure', 'rscorm');
        $mform->setDefault('displaycoursestructure', $cfg_scorm->displaycoursestructure);
        $mform->setAdvanced('displaycoursestructure', $cfg_scorm->displaycoursestructure_adv);

        // Toc display
        $mform->addElement('select', 'hidetoc', get_string('hidetoc', 'rscorm'), rscorm_get_hidetoc_array());
        $mform->addHelpButton('hidetoc', 'hidetoc', 'rscorm');
        $mform->setDefault('hidetoc', $cfg_scorm->hidetoc);
        $mform->setAdvanced('hidetoc', $cfg_scorm->hidetoc_adv);

        // Hide Navigation panel
        $mform->addElement('selectyesno', 'hidenav', get_string('hidenav', 'rscorm'));
        $mform->setDefault('hidenav', $cfg_scorm->hidenav);
        $mform->setAdvanced('hidenav', $cfg_scorm->hidenav_adv);
        $mform->disabledIf('hidenav', 'hidetoc', 'noteq', 0);

        //-------------------------------------------------------------------------------
        // grade Settings
        //XTEC ********** AFEGIT -> Added grading option in the rcontent creation form.
        //18/02/2014 . @naseq
        $this->standard_grading_coursemodule_elements();
        //*********** FI

        // Grade Method
        $mform->addElement('select', 'grademethod', get_string('grademethod', 'rscorm'), rscorm_get_grade_method_array());
        $mform->addHelpButton('grademethod', 'grademethod', 'rscorm');
        $mform->setDefault('grademethod', $cfg_scorm->grademethod);
        $mform->setAdvanced('grademethod', $cfg_scorm->grademethod_adv);

        // Maximum Grade
        for ($i=0; $i<=100; $i++) {
            $grades[$i] = "$i";
        }
        $mform->addElement('select', 'maxgrade', get_string('maximumgrade'), $grades);
        $mform->setDefault('maxgrade', $cfg_scorm->maxgrade);
        $mform->disabledIf('maxgrade', 'grademethod', 'eq', RGRADESCOES);
        $mform->setAdvanced('maxgrade', $cfg_scorm->maxgrade_adv);

        //XTEC ********** AFEGIT -> Added grading option in the rcontent creation form.
        //18/02/2014 . @naseq
        $mform->removeElement('grade');
        /*$mform->addElement('hidden', 'grade', $cfg_scorm->maxgrade);
        $mform->setType('grade', PARAM_FLOAT);*/
        //*********** FI

        $mform->addElement('header', 'othersettings', get_string('othersettings', 'rscorm'));

        // Max Attempts
        $mform->addElement('select', 'maxattempt', get_string('maximumattempts', 'rscorm'), rscorm_get_attempts_array());
        $mform->addHelpButton('maxattempt', 'maximumattempts', 'rscorm');
        $mform->setDefault('maxattempt', $cfg_scorm->maxattempt);
        $mform->setAdvanced('maxattempt', $cfg_scorm->maxattempt_adv);

        // What Grade
        $mform->addElement('select', 'whatgrade', get_string('whatgrade', 'rscorm'),  rscorm_get_what_grade_array());
        $mform->disabledIf('whatgrade', 'maxattempt', 'eq', 1);
        $mform->addHelpButton('whatgrade', 'whatgrade', 'rscorm');
        $mform->setDefault('whatgrade', $cfg_scorm->whatgrade);
        $mform->setAdvanced('whatgrade', $cfg_scorm->whatgrade_adv);

        // Display attempt status
        $mform->addElement('selectyesno', 'displayattemptstatus', get_string('displayattemptstatus', 'rscorm'));
        $mform->addHelpButton('displayattemptstatus', 'displayattemptstatus', 'rscorm');
        $mform->setDefault('displayattemptstatus', $cfg_scorm->displayattemptstatus);
        $mform->setAdvanced('displayattemptstatus', $cfg_scorm->displayattemptstatus_adv);

        // Force completed
        $mform->addElement('selectyesno', 'forcecompleted', get_string('forcecompleted', 'rscorm'));
        $mform->addHelpButton('forcecompleted', 'forcecompleted', 'rscorm');
        $mform->setDefault('forcecompleted', $cfg_scorm->forcecompleted);
        $mform->setAdvanced('forcecompleted', $cfg_scorm->forcecompleted_adv);

        // Force new attempt
        $mform->addElement('selectyesno', 'forcenewattempt', get_string('forcenewattempt', 'rscorm'));
        $mform->addHelpButton('forcenewattempt', 'forcenewattempt', 'rscorm');
        $mform->setDefault('forcenewattempt', $cfg_scorm->forcenewattempt);
        $mform->setAdvanced('forcenewattempt', $cfg_scorm->forcenewattempt_adv);

        // Last attempt lock - lock the enter button after the last available attempt has been made
        $mform->addElement('selectyesno', 'lastattemptlock', get_string('lastattemptlock', 'rscorm'));
        $mform->addHelpButton('lastattemptlock', 'lastattemptlock', 'rscorm');
        $mform->setDefault('lastattemptlock', $cfg_scorm->lastattemptlock);
        $mform->setAdvanced('lastattemptlock', $cfg_scorm->lastattemptlock_adv);

        // Activation period
/*        $mform->addElement('static', '', '' ,'<hr />');
        $mform->addElement('static', 'activation', get_string('activation','scorm'));
        $datestartgrp = array();
        $datestartgrp[] = &$mform->createElement('date_time_selector', 'startdate');
        $datestartgrp[] = &$mform->createElement('checkbox', 'startdisabled', null, get_string('disable'));
        $mform->addGroup($datestartgrp, 'startdategrp', get_string('from'), ' ', false);
        $mform->setDefault('startdate', 0);
        $mform->setDefault('startdisabled', 1);
        $mform->disabledIf('startdategrp', 'startdisabled', 'checked');

        $dateendgrp = array();
        $dateendgrp[] = &$mform->createElement('date_time_selector', 'enddate');
        $dateendgrp[] = &$mform->createElement('checkbox', 'enddisabled', null, get_string('disable'));
        $mform->addGroup($dateendgrp, 'dateendgrp', get_string('to'), ' ', false);
        $mform->setDefault('enddate', 0);
        $mform->setDefault('enddisabled', 1);
        $mform->disabledIf('dateendgrp', 'enddisabled', 'checked');
*/

        // Autocontinue
        $mform->addElement('selectyesno', 'auto', get_string('autocontinue', 'rscorm'));
        $mform->addHelpButton('auto', 'autocontinue', 'rscorm');
        $mform->setDefault('auto', $cfg_scorm->auto);
        $mform->setAdvanced('auto', $cfg_scorm->auto_adv);

        if (count($scormtypes) > 1) {
            // Update packages timing
            $mform->addElement('select', 'updatefreq', get_string('updatefreq', 'rscorm'), rscorm_get_updatefreq_array());
            $mform->setDefault('updatefreq', $cfg_scorm->updatefreq);
            $mform->setAdvanced('updatefreq', $cfg_scorm->updatefreq_adv);
            $mform->addHelpButton('updatefreq', 'updatefreq', 'rscorm');
            $mform->disabledIf('updatefreq', 'scormtype', 'eq', RSCORM_TYPE_LOCAL);
        } else {
            $mform->addElement('hidden', 'updatefreq', 0);
        }
        //-------------------------------------------------------------------------------
        // Hidden Settings
        $mform->addElement('hidden', 'datadir', null);
        $mform->setType('datadir', PARAM_RAW);
        $mform->addElement('hidden', 'pkgtype', null);
        $mform->setType('pkgtype', PARAM_RAW);
        $mform->addElement('hidden', 'launch', null);
        $mform->setType('launch', PARAM_RAW);
        $mform->addElement('hidden', 'redirect', null);
        $mform->setType('redirect', PARAM_RAW);
        $mform->addElement('hidden', 'redirecturl', null);
        $mform->setType('redirecturl', PARAM_RAW);
        //-------------------------------------------------------------------------------
        $this->standard_coursemodule_elements();
        //-------------------------------------------------------------------------------
        // buttons
        $this->add_action_buttons();
    }

    function data_preprocessing(&$default_values) {
        global $COURSE;

        if (isset($default_values['popup']) && ($default_values['popup'] == 1) && isset($default_values['options'])) {
            if (!empty($default_values['options'])) {
                $options = explode(',', $default_values['options']);
                foreach ($options as $option) {
                    list($element, $value) = explode('=', $option);
                    $element = trim($element);
                    $default_values[$element] = trim($value);
                }
            }
        }
        if (isset($default_values['grademethod'])) {
            $default_values['grademethod'] = intval($default_values['grademethod']);
        }
        if (isset($default_values['width']) && (textlib::strpos($default_values['width'], '%') === false) && ($default_values['width'] <= 100)) {
            $default_values['width'] .= '%';
        }
        if (isset($default_values['width']) && (textlib::strpos($default_values['height'], '%') === false) && ($default_values['height'] <= 100)) {
            $default_values['height'] .= '%';
        }
        $scorms = get_all_instances_in_course('rscorm', $COURSE);
        $coursescorm = current($scorms);
//MARSUPIAL ********** ELIMINAT - Take out package file
//         $draftitemid = file_get_submitted_draft_itemid('packagefile');
//         file_prepare_draft_area($draftitemid, $this->context->id, 'mod_rscorm', 'package', 0);
//         $default_values['packagefile'] = $draftitemid;
// FI **********************+
        if (($COURSE->format == 'rscorm') && ((count($scorms) == 0) || ($default_values['instance'] == $coursescorm->id))) {
            $default_values['redirect'] = 'yes';
            $default_values['redirecturl'] = '../course/view.php?id='.$default_values['course'];
        } else {
            $default_values['redirect'] = 'no';
            $default_values['redirecturl'] = '../mod/rscorm/view.php?id='.$default_values['coursemodule'];
        }
        if (isset($default_values['version'])) {
            $default_values['pkgtype'] = (substr($default_values['version'], 0, 5) == 'RSCORM') ? 'rscorm':'aicc';
        }
        if (isset($default_values['instance'])) {
            $default_values['datadir'] = $default_values['instance'];
        }
        if (empty($default_values['timeopen'])) {
            $default_values['timeopen'] = 0;
        }
        if (empty($default_values['timeclose'])) {
            $default_values['timeclose'] = 0;
        }

        // Set some completion default data
        if (!empty($default_values['completionstatusrequired']) && !is_array($default_values['completionstatusrequired'])) {
            // Unpack values
            $cvalues = array();
            foreach (rscorm_status_options() as $key => $value) {
                if (($default_values['completionstatusrequired'] & $key) == $key) {
                    $cvalues[$key] = 1;
                }
            }

            $default_values['completionstatusrequired'] = $cvalues;
        }

        if (!isset($default_values['completionscorerequired']) || !textlib::strlen($default_values['completionscorerequired'])) {
            $default_values['completionscoredisabled'] = 1;
        }

    }

    function validation($data, $files) {
        global $CFG;
        $errors = parent::validation($data, $files);

        $type = $data['scormtype'];
//MARSUPIAL ********** ELIMINAT - Take out package file

 //       if ($type === RSCORM_TYPE_LOCAL) {
//             if (!empty($data['update'])) {
//                 //ok, not required

//             } else if (empty($data['packagefile'])) {
//                 $errors['packagefile'] = get_string('required');

//             } else {
//                 $files = $this->get_draft_files('packagefile');
//                 if (count($files)<1) {
//                     $errors['packagefile'] = get_string('required');
//                     return $errors;
//                 }
//                 $file = reset($files);
//                 $filename = $CFG->tempdir.'/rscormimport/rscrom_'.time();
//                 make_temp_directory('scormimport');
//                 $file->copy_content_to($filename);

//                 $packer = get_file_packer('application/zip');

//                 $filelist = $packer->list_files($filename);
//                 if (!is_array($filelist)) {
//                     $errors['packagefile'] = 'Incorrect file package - not an archive'; //TODO: localise
//                 } else {
//                     $manifestpresent = false;
//                     $aiccfound       = false;
//                     foreach ($filelist as $info) {
//                         if ($info->pathname == 'imsmanifest.xml') {
//                             $manifestpresent = true;
//                             break;
//                         }
//                         if (preg_match('/\.cst$/', $info->pathname)) {
//                             $aiccfound = true;
//                             break;
//                         }
//                     }
//                     if (!$manifestpresent and !$aiccfound) {
//                         $errors['packagefile'] = 'Incorrect file package - missing imsmanifest.xml or AICC structure'; //TODO: localise
//                     }
//                 }
//                 unlink($filename);
//             }

//         } else if ($type === RSCORM_TYPE_EXTERNAL) {
//             $reference = $data['packageurl'];
//             if (!preg_match('/(http:\/\/|https:\/\/|www).*\/imsmanifest.xml$/i', $reference)) {
//                 $errors['packageurl'] = get_string('invalidurl', 'rscorm');
//             }

//         } else if ($type === 'packageurl') {
//             $reference = $data['reference'];
//             if (!preg_match('/(http:\/\/|https:\/\/|www).*(\.zip|\.pif)$/i', $reference)) {
//                 $errors['packageurl'] = get_string('invalidurl', 'rscorm');
//             }

//         } else if ($type === RSCORM_TYPE_IMSREPOSITORY) {
//             $reference = $data['packageurl'];
//             if (stripos($reference, '#') !== 0) {
//                 $errors['packageurl'] = get_string('invalidurl', 'rscorm');
//             }
//         } else if ($type === RSCORM_TYPE_AICCURL) {
//             $reference = $data['packageurl'];
//             if (!preg_match('/(http:\/\/|https:\/\/|www).*/', $reference)) {
//                 $errors['packageurl'] = get_string('invalidurl', 'rscorm');
//             }
//         }
// FI ********** ELIMINAT - Take out package file
        return $errors;
    }

    //need to translate the "options" and "reference" field.
    function set_data($default_values) {
        $default_values = (array)$default_values;

        if (isset($default_values['scormtype']) and isset($default_values['reference'])) {
            switch ($default_values['scormtype']) {
                case RSCORM_TYPE_LOCALSYNC :
                case RSCORM_TYPE_EXTERNAL:
                case RSCORM_TYPE_IMSREPOSITORY:
                case RSCORM_TYPE_AICCURL:
                    $default_values['packageurl'] = $default_values['reference'];
            }
        }
        unset($default_values['reference']);

        if (!empty($default_values['options'])) {
            $options = explode(',', $default_values['options']);
            foreach ($options as $option) {
                $opt = explode('=', $option);
                if (isset($opt[1])) {
                    $default_values[$opt[0]] = $opt[1];
                }
            }
        }

        $this->data_preprocessing($default_values);
        parent::set_data($default_values);
    }

    function add_completion_rules() {
        $mform =& $this->_form;
        $items = array();

        // Require score
        $group = array();
        $group[] =& $mform->createElement('text', 'completionscorerequired', '', array('size' => 5));
        $group[] =& $mform->createElement('checkbox', 'completionscoredisabled', null, get_string('disable'));
        $mform->setType('completionscorerequired', PARAM_INT);
        $mform->addGroup($group, 'completionscoregroup', get_string('completionscorerequired', 'rscorm'), '', false);
        $mform->addHelpButton('completionscoregroup', 'completionscorerequired', 'rscorm');
        $mform->disabledIf('completionscorerequired', 'completionscoredisabled', 'checked');
        $mform->setDefault('completionscorerequired', 0);

        $items[] = 'completionscoregroup';


        // Require status
        $first = true;
        $firstkey = null;
        foreach (rscorm_status_options(true) as $key => $value) {
            $name = null;
            $key = 'completionstatusrequired['.$key.']';
            if ($first) {
                $name = get_string('completionstatusrequired', 'rscorm');
                $first = false;
                $firstkey = $key;
            }
            $mform->addElement('checkbox', $key, $name, $value);
            $mform->setType($key, PARAM_BOOL);
            $items[] = $key;
        }
        $mform->addHelpButton($firstkey, 'completionstatusrequired', 'rscorm');

        return $items;
    }

    function completion_rule_enabled($data) {
        $status = !empty($data['completionstatusrequired']);
        $score = empty($data['completionscoredisabled']) && textlib::strlen($data['completionscorerequired']);

        return $status || $score;
    }

    function get_data($slashed = true) {
        $data = parent::get_data($slashed);

        if (!$data) {
            return false;
        }

        // Turn off completion settings if the checkboxes aren't ticked
        $autocompletion = !empty($data->completion) && $data->completion == COMPLETION_TRACKING_AUTOMATIC;

        if (isset($data->completionstatusrequired) && is_array($data->completionstatusrequired)) {
            $total = 0;
            foreach (array_keys($data->completionstatusrequired) as $state) {
                $total |= $state;
            }

            $data->completionstatusrequired = $total;
        }

        if (!$autocompletion) {
            $data->completionstatusrequired = null;
        }

        if (!empty($data->completionscoredisabled) || !$autocompletion) {
            $data->completionscorerequired = null;
        }

        return $data;
    }
}
