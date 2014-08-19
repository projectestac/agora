<?php
require_once ($CFG->dirroot.'/course/moodleform_mod.php');

defined('MOODLE_INTERNAL') || die;


$PAGE->requires->js('/mod/eoicampus/js/eoicampus.js', true);

class mod_eoicampus_mod_form extends moodleform_mod {

    function definition() {

        global $CFG, $COURSE, $USER;
        global $DB;
        $mform =& $this->_form;
        $strrequired = get_string('required');

        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        $mform->addElement('htmleditor', 'description', get_string('description'));
        $mform->setType('description', PARAM_RAW);
        $mform->addHelpButton('description', 'description', 'eoicampus');


        //get row info if its updating
        if ($id = optional_param("update", false, PARAM_INT)){
        	$cm = $DB->get_record("course_modules", array("id" => $id));
        	$eoidata = $DB->get_record("eoicampus", array("id" => $cm->instance));
        }


        if (groupmode($COURSE)){
        	if ($groups = $DB->get_records('groups', array('courseid' => $COURSE->id), 'id ASC', '*', 0, 1)){
        		$group = current($groups);
        		$course_shortname = $group->name;
        	}
        }
        if (!isset($course_shortname) || empty ($course_shortname)){
        	$course_shortname = $COURSE->shortname;
        }

        //get values
        $selected_pwlevel = substr($course_shortname,2,1);
        $selected_pwlang = substr($course_shortname,3,2);
        $selected_pwprofile = substr($course_shortname,8,2);
        $selected_pwcentre = substr($course_shortname,0,2);
        $selected_pwtype = (!empty($eoidata->pwtype))? $eoidata->pwtype : 'learning';
        $selected_pwid = (!empty($eoidata->pwid))? $eoidata->pwid : "";

        //level
        $mform->addElement('hidden', 'pwslevel', $selected_pwlevel);
        $mform->setType('pwslevel', PARAM_TEXT);
        //lang
        $mform->addElement('hidden', 'pwlang', $selected_pwlang);
        $mform->setType('pwlang', PARAM_TEXT);
         //profile
        $mform->addElement('hidden', 'pwprofile', $selected_pwprofile);
        $mform->setType('pwprofile', PARAM_TEXT);
        //centre
        $mform->addElement('hidden', 'pwcentre', $selected_pwcentre);
        $mform->setType('pwcentre', PARAM_TEXT);
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
        $script = 'getPathways("'.$selected_pwlevel.'", "'.$selected_pwid.'");';
        if(isset($CFG->eoicampus_wsdl_path)){
            $script = "function set_pvars(){
                    setHost('{$CFG->eoicampus_wsdl_path}');
                    setMoodleServer('{$CFG->wwwroot}/mod/eoicampus/action/servlets.php');
                }". $script;
        }
        $mform->addElement('html', '<script type="text/javascript">'.$script.'</script>');

        $this->standard_coursemodule_elements();
        // buttons
        $this->add_action_buttons();
    }


}