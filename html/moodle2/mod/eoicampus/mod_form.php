<?php //$Id: mod_form.php,v 1.1 2009/09/08 09:33:32 sarjona Exp $
require_once ($CFG->dirroot.'/course/moodleform_mod.php');
//IECISA *********** MODIFIED -> Deprecated functions on Moodle 2.2
//2012.10.25 @abertranb
defined('MOODLE_INTERNAL') || die;

//XTEC ************ ELIMINAT - yui2 to yui 2in3 conversion. No "requires" required.
//2013.01.14 @aginard
/*
$PAGE->requires->yui2_lib('yahoo');
$PAGE->requires->yui2_lib('event');
$PAGE->requires->yui2_lib('dom');
$PAGE->requires->yui2_lib('connection');
$PAGE->requires->yui2_lib('json');
*/
//************ FI

$PAGE->requires->js('/mod/eoicampus/js/eoicampus.js', true);
//********* ORIGINAL
/*require_js(array('yui_yahoo', 'yui_event', 'yui_dom', 'yui_connection', 'yui_json'));
require_js($CFG->wwwroot . '/mod/eoicampus/js/eoicampus.js');*/
//********* FI

class mod_eoicampus_mod_form extends moodleform_mod {

    function definition() {

        global $CFG, $COURSE, $USER;
        global $DB;
        $mform =& $this->_form;
        $strrequired = get_string('required');

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        $mform->addElement('htmleditor', 'description', get_string('description'));
        $mform->setType('description', PARAM_RAW);
// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
// 2012.11.08 @abertranb
        $mform->addHelpButton('description', 'description', 'eoicampus');
// ********** ORIGINAL        
        //$mform->setHelpButton('description', array('writing', 'questions', 'text'), false, 'editorhelpbutton');        
// ********** FI
//IECISA *********** ADDED -> Fields for level, type, pathway
//2011.07.18 @mmartinez
        //extra info
        echo "<script>
            function set_pvars(){
	            setHost('{$CFG->eoicampus_wsdl_path}');
	            setMoodleServer('{$CFG->wwwroot}/mod/eoicampus/action/servlets.php');
            }
        </script>";
        
        //get row info if its updating
        if (isset($_GET['update']) && $id = optional_param("update", false, PARAM_INT)){
        	// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
        	// 2012.10.23 @abertranb
        	$cm = $DB->get_record("course_modules", array("id" => $id));
        	$eoidata = $DB->get_records("eoicampus", array("id" => $cm->instance));
        	// ********** ORIGINAL
        	//$cm = get_record("course_modules", "id", $id);
        	//$eoidata = get_records("eoicampus", "id", $cm->instance);
        	// ********** FI
        	$eoidata = end($eoidata);
        } else {
        	
        }
        
// XTEC ********** AFEGIT -> Check if there are groups and take info from the first one
// 2011.09.22 @mmartinez
        if (groupmode($COURSE)){
        	// XTEC *********** MODIFIED -> Change deprecated code in Moodle 2.2
        	// 2012.10.23 @abertranb
        	if ($groups = $DB->get_records('groups', array('courseid' => $COURSE->id), 'id ASC', '*', 0, 1)){
        	// ********** ORIGINAL
        	//if ($groups = get_records('groups', 'courseid', $COURSE->id, 'id ASC', '*', 0, 1)){
        	// ********** FI
        		$group = current($groups);
        		$course_shortname = $group->name;
        	}
        }
        if (!isset($course_shortname) || empty ($course_shortname)){
        	$course_shortname = $COURSE->shortname;
        }
// *********** FI

        //get values
// XTEC ********** MODIFICAT -> Use the new variable $course_shortname
// 2011.09.22 @mmartinez
        $selected_pwlevel = substr($course_shortname,2,1); 
        $selected_pwlang = substr($course_shortname,3,2);
        $selected_pwprofile = substr($course_shortname,8,2);
        $selected_pwcentre = substr($course_shortname,0,2);
// ********** ORIGINAL
        /*$selected_pwlevel = substr($COURSE->shortname,2,1); 
        $selected_pwlang = substr($COURSE->shortname,3,2);
        $selected_pwprofile = substr($COURSE->shortname,8,2);
        $selected_pwcentre = substr($COURSE->shortname,0,2);*/
// ********** FI

        $selected_pwtype = (!empty($eoidata->pwtype))? $eoidata->pwtype : 'learning';
        $selected_pwid = (!empty($eoidata->pwid))? $eoidata->pwid : "";
        
        //level
        $mform->addElement('hidden', 'pwslevel', $selected_pwlevel);        
        //lang
        $mform->addElement('hidden', 'pwlang', $selected_pwlang);        
         //profile
        $mform->addElement('hidden', 'pwprofile', $selected_pwprofile);        
        //centre
        $mform->addElement('hidden', 'pwcentre', $selected_pwcentre);        
        //type
        $opts  = array('additional' => get_string('additional', 'eoicampus'), "learning" => get_string("learning", "eoicampus"), "strategic" => get_string("strategic", "eoicampus"), "testing" => get_string("testing", "eoicampus"));
        $attrs = array ('onchange' => 'javascript:changeType(this)');
        $mform->addElement('select', 'pwtype', get_string("type", "eoicampus"), $opts, $attrs);
        $mform->setDefault('pwtype', $selected_pwtype);        
        //pathway
        $opts  = array(0 => 'Loading...');
        for ($i = 1; $i < 9999; $i++){
        	$opts[$i] = $i;
        }
        $mform->addElement('select', 'pwid', get_string("pathway", "eoicampus"), $opts);
        $html = '<script type="text/javascript">getPathways("'.$selected_pwlevel.'", "'.$selected_pwid.'");</script>'; 
        $mform->addElement('html', $html);
//********** FI
        
//-------------------------------------------------------------------------------
        $this->standard_coursemodule_elements();
        // buttons
        $this->add_action_buttons();
    }


}
?>
