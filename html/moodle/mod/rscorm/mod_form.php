<?php
require_once ($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'/mod/rscorm/locallib.php');
require_js(array('yui_yahoo', 'yui_event', 'yui_dom', 'yui_connection', 'yui_json'));
require_js($CFG->wwwroot . '/mod/rscorm/loadselects_ajax.js');

class mod_rscorm_mod_form extends moodleform_mod {

    function definition() {

        global $CFG, $COURSE;
        $mform    =& $this->_form;
        if (isset($CFG->slasharguments) && !$CFG->slasharguments) {
            $mform->addElement('static', '', '',notify(get_string('slashargs', 'rscorm'), 'notifyproblem', 'center', true));
        }
        $zlib = ini_get('zlib.output_compression'); //check for zlib compression - if used, throw error because of IE bug. - SEE MDL-16185
        if (isset($zlib) && $zlib) {
            $mform->addElement('static', '', '',notify(get_string('zlibwarning', 'rscorm'), 'notifyproblem', 'center', true));
        }

//MARSUPIAL ********** AFEGIT - load instance when update
        $update = optional_param("update",0);
        if(!empty($update)){
            if ($cm = get_coursemodule_from_id('rscorm', $update)) {
                if (!$rscorm = get_record('rscorm', 'id', $cm->instance)) {
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
            $mform->setType('name', PARAM_CLEAN);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        
//MARSUPIAL ********** AFEGIT - Put select fields to choose the isbn, unit and activity
        $ajax_config_settings = array("wwwroot"=>$CFG->wwwroot, "sesskey"=>sesskey(), 'parametererror'=>get_string('parametererror','rscorm'), 'jsonerror'=>get_string('jsonerror','rscorm'), 'ajaxresponseerror'=>get_string('ajaxresponseerror','rscorm'), 'get_string_unit'=>'- '.get_string('unit','rscorm').' -', 'get_string_activity'=>'- '.get_string('activity','rscorm').' -');
        if(!empty($update)){
        	$ajax_config_settings['cmid']=$update;
        }
        echo "<script type=\"text/javascript\">//<![CDATA[\n".
        "var ajax_config = " . json_encode($ajax_config_settings) . ";\n".
        "//]]></script>\n";
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
        if (ajaxenabled()){
            $attrs = array('onchange' => 'javascript:rscorm_load_unit_list(this.value);');
        } else{
  	        $attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit();');
        }
        $mform->addElement('select', 'isbn', get_string('isbn','rscorm'), $isbn_list_array, $attrs); 
        $mform->setType('isbn', PARAM_INT);
        $mform->addRule('isbn', get_string('isbnerror','rscorm'), 'nonzero', null, 'client');

// Unit
        //load unit select options with ajax and without it
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
  	        $attrs = array('onchange' => 'javascript:rscorm_load_activity_list(YAHOO.util.Dom.get("id_isbn").value,this.value)');
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
        $mform->addElement('htmleditor', 'summary', get_string('summary'));
        $mform->setType('summary', PARAM_RAW);
        /*$mform->addRule('summary', get_string('required'), 'required', null, 'client');*/
        $mform->setHelpButton('summary', array('writing', 'questions', 'richtext'), false, 'editorhelpbutton');

//MARSUPIAL ********** ELIMINAT - Take out reference field
/*// Reference
        $mform->addElement('choosecoursefileorimsrepo', 'reference', get_string('package','rscorm'));
        $mform->setType('reference', PARAM_RAW);  // We need to find a better PARAM
        $mform->addRule('reference', get_string('required'), 'required');
        $mform->setHelpButton('reference',array('package', get_string('package', 'rscorm'), 'rscorm'));
*/
//********** FI

//-------------------------------------------------------------------------------
// Other Settings
        $mform->addElement('header', 'advanced', get_string('othersettings', 'form'));

// Grade Method
        $mform->addElement('select', 'grademethod', get_string('grademethod', 'rscorm'), rscorm_get_grade_method_array());
        $mform->setHelpButton('grademethod', array('grademethod',get_string('grademethod', 'rscorm'),'rscorm'));
        $mform->setDefault('grademethod', $CFG->rscorm_grademethod);

// Maximum Grade
        for ($i=0; $i<=100; $i++) {
          $grades[$i] = "$i";
        }
        $mform->addElement('select', 'maxgrade', get_string('maximumgrade'), $grades);
        $mform->setDefault('maxgrade', $CFG->rscorm_maxgrade);
        $mform->disabledIf('maxgrade', 'grademethod','eq',RSCORM_GRADESCOES);

// Attempts
        $mform->addElement('static', '', '' ,'<hr />');

// Max Attempts
        $mform->addElement('select', 'maxattempt', get_string('maximumattempts', 'rscorm'), rscorm_get_attempts_array());
        $mform->setHelpButton('maxattempt', array('maxattempt',get_string('maximumattempts', 'rscorm'), 'rscorm'));
        $mform->setDefault('maxattempt', $CFG->rscorm_maxattempts);

// What Grade
        $mform->addElement('select', 'whatgrade', get_string('whatgrade', 'rscorm'), rscorm_get_what_grade_array());
        $mform->disabledIf('whatgrade', 'maxattempt','eq',1);
        $mform->setHelpButton('whatgrade', array('whatgrade',get_string('whatgrade', 'rscorm'), 'rscorm'));
        $mform->setDefault('whatgrade', $CFG->rscorm_whatgrade);
        $mform->setAdvanced('whatgrade');

// Activation period
/*        $mform->addElement('static', '', '' ,'<hr />');
        $mform->addElement('static', 'activation', get_string('activation','rscorm'));
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
// Stage Size
        $mform->addElement('static', '', '' ,'<hr />');
        $mform->addElement('static', 'stagesize', get_string('stagesize','rscorm'));
        $mform->setHelpButton('stagesize', array('stagesize',get_string('stagesize', 'rscorm'), 'rscorm'));
// Width
        $mform->addElement('text', 'width', get_string('width','rscorm'),'maxlength="5" size="5"');
        $mform->setDefault('width', $CFG->rscorm_framewidth);
        $mform->setType('width', PARAM_INT);
        
// Height
        $mform->addElement('text', 'height', get_string('height','rscorm'),'maxlength="5" size="5"');
        $mform->setDefault('height', $CFG->rscorm_frameheight);
        $mform->setType('height', PARAM_INT);

// Framed / Popup Window
        $mform->addElement('select', 'popup', get_string('display','rscorm'), rscorm_get_popup_display_array());
        $mform->setDefault('popup', $CFG->rscorm_popup);
        $mform->setAdvanced('popup');

// Window Options
        $winoptgrp = array();
        foreach(rscorm_get_popup_options_array() as $key => $value){
            $winoptgrp[] = &$mform->createElement('checkbox', $key, '', get_string($key, 'rscorm'));
            $mform->setDefault($key, $value);
        }
        $mform->addGroup($winoptgrp, 'winoptgrp', get_string('options','rscorm'), '<br />', false);
        $mform->setAdvanced('winoptgrp');
        $mform->disabledIf('winoptgrp', 'popup', 'eq', 0);

// Skip view page
        $mform->addElement('select', 'skipview', get_string('skipview', 'rscorm'), rscorm_get_skip_view_array());
        $mform->setHelpButton('skipview', array('skipview',get_string('skipview', 'rscorm'), 'rscorm'));
        $mform->setDefault('skipview', $CFG->rscorm_skipview);
        $mform->setAdvanced('skipview');

// Hide Browse
        $mform->addElement('selectyesno', 'hidebrowse', get_string('hidebrowse', 'rscorm'));
        $mform->setHelpButton('hidebrowse', array('hidebrowse',get_string('hidebrowse', 'rscorm'), 'rscorm'));
        $mform->setDefault('hidebrowse', $CFG->rscorm_hidebrowse);
        $mform->setAdvanced('hidebrowse');

// Toc display
        $mform->addElement('select', 'hidetoc', get_string('hidetoc', 'rscorm'), rscorm_get_hidetoc_array());
        $mform->setDefault('hidetoc', $CFG->rscorm_hidetoc);
        $mform->setAdvanced('hidetoc');

// Hide Navigation panel
        $mform->addElement('selectyesno', 'hidenav', get_string('hidenav', 'rscorm'));
        $mform->setDefault('hidenav', $CFG->rscorm_hidenav);
        $mform->setAdvanced('hidenav');

// Autocontinue
        $mform->addElement('selectyesno', 'auto', get_string('autocontinue', 'rscorm'));
        $mform->setHelpButton('auto', array('autocontinue',get_string('autocontinue', 'rscorm'), 'rscorm'));
        $mform->setDefault('auto', $CFG->rscorm_auto);
        $mform->setAdvanced('auto');

// Update packages timing
        $mform->addElement('select', 'updatefreq', get_string('updatefreq', 'rscorm'), rscorm_get_updatefreq_array());
        $mform->setDefault('updatefreq', $CFG->rscorm_updatefreq);
        $mform->setAdvanced('updatefreq');

//-------------------------------------------------------------------------------
// Hidden Settings
        $mform->addElement('hidden', 'datadir', null);
        $mform->addElement('hidden', 'pkgtype', null);
        $mform->addElement('hidden', 'launch', null);
        $mform->addElement('hidden', 'redirect', null);
        $mform->addElement('hidden', 'redirecturl', null);

//-------------------------------------------------------------------------------
        $features = new stdClass;
        $features->groups = false;
        $features->groupings = true;
        $features->groupmembersonly = true;
        $this->standard_coursemodule_elements($features);
        
//-------------------------------------------------------------------------------
        // buttons
        $this->add_action_buttons();

    }

    function data_preprocessing(&$default_values) {
        global $COURSE;
		
        if (isset($default_values['popup']) && ($default_values['popup'] == 1) && isset($default_values['options'])) {
            if (!empty($default_values['options'])) {
                $options = explode(',',$default_values['options']);
                foreach ($options as $option) {
                    list($element,$value) = explode('=',$option);
                    $element = trim($element);
                    $default_values[$element] = trim($value); 
                }
            }
        }
        if (isset($default_values['grademethod'])) {
            $default_values['whatgrade'] = intval($default_values['grademethod'] / 10);
            $default_values['grademethod'] = $default_values['grademethod'] % 10;
        }
        if (isset($default_value['width']) && (strpos($default_value['width'],'%') === false) && ($default_value['width'] <= 100)) {
            $default_value['width'] .= '%';
        }
        if (isset($default_value['height']) && (strpos($default_value['height'],'%') === false) && ($default_value['height'] <= 100)) {
            $default_value['height'] .= '%';
        }
        $scorms = get_all_instances_in_course('rscorm', $COURSE);
        $coursescorm = current($scorms);
        if (($COURSE->format == 'rscorm') && ((count($scorms) == 0) || ($default_values['instance'] == $coursescorm->id))) {
            $default_values['redirect'] = 'yes';
            $default_values['redirecturl'] = '../course/view.php?id='.$default_values['course'];    
        } else {
            $default_values['redirect'] = 'no';
            $default_values['redirecturl'] = '../mod/rscorm/view.php?id='.$default_values['coursemodule'];
        }
        if (isset($default_values['version'])) {
            $default_values['pkgtype'] = (substr($default_values['version'],0,5) == 'rscorm') ? 'rscorm':'aicc';
        }
        if (isset($default_values['instance'])) {
            $default_values['datadir'] = $default_values['instance'];
        }
    }

    function validation($data, $files) { 
    	
        $errors = array();
    	
    	if ($data['issubmit'] == 0){
    		$errors['issubmit'] = get_string('required');
    		return $errors;
    	}
    	
        $errors = parent::validation($data, $files);

        $validate = rscorm_validate($data);

        if (!$validate->result) {
            $errors = $errors + $validate->errors;
        }
		
        return $errors;
    }
    
    //need to translate the "options" field.
    function set_data($default_values) {
        if (is_object($default_values)) {
            if (!empty($default_values->options)) {
                $options = explode(',', $default_values->options);
                foreach ($options as $option) {
                    $opt = explode('=', $option);
                    if (isset($opt[1])) {
                        $default_values->$opt[0] = $opt[1];
                    }
                }
            }
            $default_values = (array)$default_values;
        }
        $this->data_preprocessing($default_values);
        parent::set_data($default_values); //never slashed for moodleform_mod
       
    }
}
?>
