<!--
//XTEC ************ FITXER AFEGIT - mod_form.php added to improve edit options
//2011.02.17 @jfern343
-->

<?php

require_once ($CFG->dirroot . '/course/moodleform_mod.php');

class mod_slideshow_mod_form extends moodleform_mod {

    function definition() {

        global $CFG, $COURSE;
        $mform = & $this->_form;

        $strrequired = get_string('required');

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size' => '48'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');


//-------------------------------------------------------------------------------
        $mform->addElement('header', 'header_slideshow', get_string('header_slideshow', 'slideshow'));


        $rawdirs = get_directory_list($CFG->dataroot . '/' . $COURSE->id, array($CFG->moddata), true, true, false);
        $dirs = array();
        $dirs[''] = get_string('maindirectory', 'slideshow');
        foreach ($rawdirs as $rawdir) {
            $dirs[$rawdir] = $rawdir;
        }
        $mform->addElement('select', 'location', get_string('coursepacket', 'slideshow'), $dirs);
        $mform->setHelpButton('location', array('directory', get_string('coursepacket', 'slideshow'), 'slideshow'));

        $options = array(0 => get_string("display_none", "slideshow"),
            1 => get_string('display_over', 'slideshow'),
            2 => get_string('display_under', 'slideshow'),
            3 => get_string('display_right', 'slideshow'));

        $mform->addElement('select', 'filename', get_string('display_filename', 'slideshow'), $options);

        
        $options = array(0 => get_string('display_over', 'slideshow'),
            1 => get_string('display_under', 'slideshow'));

        $mform->addElement('select', 'layout', get_string('thumbnail_layout', 'slideshow'), $options);

        
        $options = array(0 => get_string('no'), 1 => get_string('yes'));
        
  //    $mform->addElement('checkbox', 'centred', get_string('centred', 'slideshow'));
        $mform->addElement('select', 'centred', get_string('centred', 'slideshow'), $options); 

  //    $mform->addElement('checkbox', 'htmlcaptions', get_string('htmlcaptions', 'slideshow'));
        $mform->addElement('select', 'htmlcaptions', get_string('htmlcaptions', 'slideshow'), $options); 
        
  //    $mform->addElement('checkbox', 'autobgcolor', get_string('onblack', 'slideshow'));
        $mform->addElement('select', 'autobgcolor', get_string('onblack', 'slideshow'), $options);
        

        $options = array(0 => get_string('noautoplay', 'slideshow'),
            1 => '1s', 2 => '2s', 3 => '3s', 4 => '4s', 5 => '5s',
            6 => '6s', 7 => '7s', 8 => '8s', 9 => '9s', 10 => '10s',
            15 => '15s', 20 => '20s', 30 => '30s', 40 => '40s',
            60 => '1 min', 300 => '5 min');

        $mform->addElement('select', 'delaytime', get_string('showtime', 'slideshow'), $options);

   
//-------------------------------------------------------------------------------

        $features = new stdClass;
        $features->groups = false;
        $features->groupings = false;
        $features->groupmembersonly = false;
        $this->standard_coursemodule_elements($features);

        // buttons
        $this->add_action_buttons();
    }

}

?>