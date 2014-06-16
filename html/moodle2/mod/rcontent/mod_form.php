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
    $update = optional_param("update",0,PARAM_INT);
    $frame=$CFG->rcontent_frametype;
    $popup=$CFG->rcontent_popup;
    $RCONTENT_WINDOW_OPTIONS = array('resizable'=>$CFG->rcontent_popupresizable, 'scrollbars'=>$CFG->rcontent_popupscrollbars, 'directories'=>$CFG->rcontent_popupdirectories, 'location'=>$CFG->rcontent_popuplocation,
        'menubar'=>$CFG->rcontent_popupmenubar, 'toolbar'=>$CFG->rcontent_popuptoolbar, 'status'=>$CFG->rcontent_popupstatus, 'width'=>$CFG->rcontent_popupwidth, 'height'=>$CFG->rcontent_popupheight);
    // MARSUPIAL *********** MODIFICAT -> Get the yui lib js version moodle 2.x
    // 2012.12.1 @abertranb
    /*$module = array(
     'name'      => 'mod_rcontent_form',
    'fullpath'  => '/mod/rcontent/loadselects_ajax.js',
    'strings'   => array(),
    );

    $PAGE->requires->js_init_call('M.modr_content.rcontent_form.init', array(), true, $module);
    */
    $add_variable_str_moodle_24 = '';
    $add_end_variable_str_moodle_24 = '';
    if ($CFG->branch < 24) {
        $PAGE->requires->yui2_lib(array('json','connection', 'dom', 'event', 'yahoo'));
    }
    else {
        $add_variable_str_moodle_24 = '
        YUI().use(\'yui2-json\', \'yui2-connection\', \'yui2-event\', function(Y) {
                                var YAHOO = Y.YUI2;';
        $add_end_variable_str_moodle_24 =  '});';
    }

    //
    $PAGE->requires->js('/mod/rcontent/loadselects_ajax.js', true);
    /*$PAGE->requires->yui2_lib(array('json','connection', 'dom', 'event', 'yahoo'));
     $PAGE->requires->js('/mod/rcontent/loadselects_ajax.js', true);*/
    // *********** ORIGINAL
    //require_js(array('yui_yahoo', 'yui_event', 'yui_dom', 'yui_connection', 'yui_json'));
    //require_js($CFG->wwwroot . '/mod/rcontent/loadselects_ajax.js');
    // ********** FI


    if(!empty($update)){
        if ($cm = get_coursemodule_from_id('rcontent', $update)) {
            if ($rcontent = $DB->get_record('rcontent', array('id' => $cm->instance))) {
                $frame = $rcontent->frame;
                $popup = $rcontent->popup;
                if(!empty($rcontent->popup_options)){
// MARSUPIAL *********** ADDED -> set default values as void
// 2013.04.09 @abertrab
                    foreach ($RCONTENT_WINDOW_OPTIONS as $key => $value) {
                        $RCONTENT_WINDOW_OPTIONS[$key] = 0;
                    }
// ******** END
                    $popup_options_ar = explode(",",$rcontent->popup_options);
                    foreach($popup_options_ar as $p){
                        $pa = explode("=",$p);
                        if(in_array($pa[0],$RCONTENT_WINDOW_OPTIONS)){
                            $RCONTENT_WINDOW_OPTIONS[$pa[0]]= $pa[1];
                        }
                    }
                }
            }
        }
    }


//set optional parameters to js script
    $ajax_config_settings = array("wwwroot"=>$CFG->wwwroot, "sesskey"=>sesskey(), 'parametererror'=>get_string('parametererror','rcontent'), 'jsonerror'=>get_string('jsonerror','rcontent'), 'ajaxresponseerror'=>get_string('ajaxresponseerror','rcontent'), 'get_string_unit'=>'- '.get_string('unit','rcontent').' -', 'get_string_activity'=>'- '.get_string('activity','rcontent').' -');
    if(!empty($update)){
  	     $ajax_config_settings['cmid']=$update;
    }
// MARSUPIAL *********** MODIFICAT -> Not send output and use the JS yui
// 2013.02.2 @abertranb
    $PAGE->requires->data_for_js('ajax_config', $ajax_config_settings, true);
// ********* ORIGINAL
    /*echo "<script type=\"text/javascript\">//<![CDATA[\n".
    "var ajax_config = " . json_encode($ajax_config_settings) . ";\n".
    "//]]></script>\n";*/
// ********* FI

//-----------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

//name

//MARSUPIAL ********** AFEGIT - Improve name field to have autoload select without ajax
//2011.01.19 @mmartinez
        $mform->addElement('hidden','issubmit');
        $mform->setConstant('issubmit',1);
//********** FI
        $mform->addElement('text', 'name', get_string('name','rcontent'),array('size' => 64));
        $mform->setType('name', PARAM_TEXT);
//MARSUPIAL ************ MODIFICAT - Control when ajax is available or not
//2011.01.19 @mmartinez
         	$mform->addRule('name', null, 'required');
//*********** ORIGINAL
//Level
		$level_list_array=rcontent_level_list();
		if(!empty($update)){
			$mform->setDefault('level',$rcontent->levelid);
		}
        if (ajaxenabled()){
            $attrs = array('onchange' => 'javascript:rcontent_load_isbn_list(this.value)');
        } else{
  	        $attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit();');
        }
        $mform->addElement('select', 'level', get_string('level','rcontent'), $level_list_array, $attrs);
        $mform->setType('level', PARAM_INT);
        $mform->addRule('level', get_string('isbnerror','rcontent'), 'nonzero');
        $mform->addRule('level', null, 'required');

//isbn
        //set isbn select onchange event width ajax and without it
        if (!empty($update)){
        	$level=(isset($_POST['level']))?$_POST['level']:$rcontent->levelid;
        	$isbn_list_array = rcontent_isbn_list($level,'updateform');
        	$mform->setDefault('isbn',$rcontent->bookid);
        }else if(!ajaxenabled()&&isset($_POST['level'])){
  	        $isbn_list_array = rcontent_isbn_list($_POST['level'],'updateform');
        }else{
  	        $isbn_list_array=array('- '.get_string('isbn','rcontent').' -');
        }
        if (ajaxenabled()){
            $attrs = array('onchange' => 'javascript:rcontent_load_unit_list(this.value);');
        } else{
  	        $attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit();');
        }
        $mform->addElement('select', 'isbn', get_string('isbn','rcontent'), $isbn_list_array, $attrs);
        $mform->setType('isbn', PARAM_INT);
        $mform->addRule('isbn', get_string('isbnerror','rcontent'), 'nonzero');
        $mform->addRule('isbn', null, 'required');

//unit
        //load unit select options with ajax and without it
        if(!empty($update)){
  	        $isbn=(isset($_POST['isbn']))?$_POST['isbn']:$rcontent->bookid;
            $unit_list_array = rcontent_unit_list($isbn,'updateform');
            $mform->setDefault('unit',$rcontent->unitid);
        }else if(!ajaxenabled()&&isset($_POST['isbn'])){
  	        $unit_list_array = rcontent_unit_list($_POST['isbn'],'updateform');
        }else{
  	        $unit_list_array=array('- '.get_string('unit','rcontent').' -');
        }
        //set unit select onchange event width aja and without it
        if (ajaxenabled()){
  	        $attrs = array('onchange' => 'javascript:rcontent_load_activity_list(document.getElementById("id_isbn").value,this.value)');
        }else{
  	        $attrs = array('onchange' => 'javascript:this.form.issubmit.value=0;this.form.submit()');
        }
        $mform->addElement('select', 'unit', get_string('unit','rcontent'), $unit_list_array , $attrs);
        $mform->setType('unit', PARAM_INT);

//activity
        //load activity select options width ajax and widthout it
        if(!empty($update)){
  	        $unit=(isset($_POST['unit']))?$_POST['unit']:$rcontent->unitid;
            $activity_list_array = rcontent_activity_list($isbn,$unit,'updateform');
            $mform->setDefault('activity',$rcontent->activityid);
        }else if(!ajaxenabled()&&isset($_POST['isbn'])&&isset($_POST['unit'])){
  	        $activity_list_array = rcontent_activity_list($_POST['isbn'],$_POST['unit'],'updateform');
        }else{
            $activity_list_array=array('- '.get_string('activity','rcontent').' -');
        }
        $mform->addElement('select', 'activity', get_string('activity','rcontent'), $activity_list_array);
        $mform->setType('activity', PARAM_INT);

//summary
        $mform->addElement('htmleditor', 'summary', get_string('summary'));
        $mform->setType('summary', PARAM_RAW);
        $mform->addHelpButton('summary', 'summary');

//-----------------------------------------------------------------------------
//Other settings
        $mform->addElement('header', 'displaysettings', get_string('displaysettings', 'rcontent'));

//forcedownload
        $mform->addElement('checkbox', 'forcedownload', get_string('forcedownload', 'rcontent'));
        $mform->addHelpButton('forcedownload', 'forcedownload', 'rcontent');
        $mform->disabledIf('forcedownload', 'windowpopup', 'eq', 1);

//pagewindow
        $woptions = array(0 => get_string('pagewindow', 'rcontent'), 1 => get_string('newwindow', 'rcontent'));
        $mform->addElement('select', 'windowpopup', get_string('display', 'rcontent'), $woptions);
        $mform->setDefault('windowpopup',$popup);
        $mform->disabledIf('windowpopup', 'forcedownload', 'checked');

//keepnavigationvisibleorno
        $mform->addElement('select', 'framepage', get_string('keepnavigationvisible', 'rcontent'), rcontent_get_frame_type_array());
        $mform->addHelpButton('framepage', 'keepnavigationvisible', 'rcontent');
        $mform->setDefault('framepage', $frame);
        $mform->disabledIf('framepage', 'windowpopup', 'eq', 1);
        $mform->disabledIf('framepage', 'forcedownload', 'checked');
        $mform->setAdvanced('framepage');

//going through all the options popup
        foreach ($RCONTENT_WINDOW_OPTIONS as $option => $o) {
            if ($option == 'height' or $option == 'width') {
                $mform->addElement('text', $option, get_string('new'.$option, 'rcontent'), array('size'=>'4'));
                $mform->setDefault($option,$o );
            } else {
                $mform->addElement('checkbox', $option, get_string('new'.$option, 'rcontent'));
                $mform->setDefault($option, $o);
                $mform->disabledIf($option, 'windowpopup', 'eq', 0);
            }
            $mform->setAdvanced($option);
        }

        // grade Settings
        //XTEC ********** AFEGIT -> Added grading option in the rcontent creation form.
        //18/02/2014 . @naseq
        $this->standard_grading_coursemodule_elements();
        $mform->removeElement('grade');
        /*$mform->addElement('hidden', 'grade', $rcontent->maximumgrade);
        $mform->setType('grade', PARAM_FLOAT);*/

        // What Grade
        $mform->addElement('select', 'whatgrade', get_string('whatgrade', 'rcontent'), rcontent_get_what_grade_array());
        $mform->addHelpButton('whatgrade', 'whatgrade', 'rcontent');
        $mform->setDefault('whatgrade', $CFG->rcontent_whatgrade);
        //$mform->setAdvanced('whatgrade');
        //*********** FI

//-------------------------------------------------------------------------------
// add standard elements, common to all modules
        $features = new stdClass;
        $features->groups = true;
        $features->groupings = true;
        $features->groupmembersonly = true;
        $this->standard_coursemodule_elements($features);

//-------------------------------------------------------------------------------
//buttons
        $this->add_action_buttons();
        //$mform->addElement('submit', 'btnSubmit', 'Submit');

    }

    function validation ($data, $files){

    	$errors = array();

    	if ($data['issubmit'] == 0){
    		$errors['issubmit'] = get_string('required');
    		return $errors;
    	}

    	parent::validation($data, $files);;
    }
}