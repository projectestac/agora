<?php 
require_once("$CFG->libdir/formslib.php");
 
class themeconfig_form extends moodleform {
 
    function definition() {
        global $CFG;
 
        $mform =& $this->_form; // Don't forget the underscore! 
 		
		$themedir = $CFG->dataroot."/1/theme/";
		
		$mform->addElement('html', '<br/><br/><h3>'.get_string('header','theme_config').'</h3>');
		$imagearray=array();
		if(file_exists($themedir."logo.png")){
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_actual_image','theme_config'), 0);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_title_text','theme_config'), 1);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_selected_image','theme_config'), 2);
		
			$separators = array(
			0=> '<br/><img src="'.$CFG->wwwroot."/file.php/1/theme/logo.png".'"  height="70px" border=1><div style="width:800px;height:2px;">&nbsp;</div>',
			1=> ': <b>'.get_site()->fullname.'</b><div style="width:800px;height:2px;">&nbsp;</div>',
			2=> '');	
		}
		else if(file_exists($themedir."logo.jpg")){
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_actual_image','theme_config'), 0);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_title_text','theme_config'), 1);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_selected_image','theme_config'), 2);
		
			$separators = array(
			0=> '<br/><img src="'.$CFG->wwwroot."/file.php/1/theme/logo.jpg".'"  height="70px" border=1><div style="width:800px;height:2px;">&nbsp;</div>',
			1=> ': <b>'.get_site()->fullname.'</b><div style="width:800px;height:2px;">&nbsp;</div>',
			2=> '');	
		}
		else{
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_title_text','theme_config'), 0);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_selected_image','theme_config'), 2);
			$separators = array(
			0=> ': <b>'.get_site()->fullname.'</b><div style="width:800px;height:2px;">&nbsp;</div>',
			2=> '');
		}
		
		$mform->addGroup($imagearray, 'image_header', '', $separators, false);		
			
		$this->set_upload_manager(new upload_manager('header_image', true, false, 1, false, 0, true, false, false));	
		$mform->addElement('file', 'header_image', get_string('max_height','theme_config').': 300px<br/>');
		$mform->disabledIf('header_image', 'image_header', 'neq', '2');

       
		$mform->addElement('html', '<br/><br/><h3>'.get_string('font_size','theme_config').'</h3>');
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:90%;">'.get_string('tiny','theme_config').'</span>', 90);
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:95%;">'.get_string('small','theme_config').'</span>', 95);
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:100%;">'.get_string('medium','theme_config').'</span>', 100);
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:105%;">'.get_string('big','theme_config').'</span>', 105);
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:110%;">'.get_string('huge','theme_config').'</span>', 110);
		$mform->setDefault('font_size', isset($CFG->font_size) ? $CFG->font_size: 100);        
		$mform->addGroup($fontsizearray, 'font_size', '', '<div style="width:800px;height:2px;">&nbsp;</div>', false);	
 		
        
		$mform->addElement('html', '<br/><h3>'.get_string('pers_style','theme_config').'</h3>');
		$mform->addElement('html', '<h4>'.get_string('layout_style','theme_config').'</h4>');
		$mform->addElement('textarea', 'layout_style', '', 'wrap="virtual" rows="20" cols="75" style="margin-left:-250px" ');
		if(file_exists($CFG->dataroot."/1/theme/styles_layout.css")){
			$output="";
			$file = fopen($CFG->dataroot."/1/theme/styles_layout.css", "r");
			while(!feof($file)) {
			  //read file line by line into variable
			  $output .= fgets($file, 4096);
			}
			fclose ($file);
			$mform->setDefault('layout_style', $output);
		}
		
		$mform->addElement('html', '<br/><h4>'.get_string('fonts_style','theme_config').'</h4>');
		$mform->addElement('textarea', 'fonts_style', '', 'wrap="virtual" rows="20" cols="75" style="margin-left:-250px" ');
		if(file_exists($CFG->dataroot."/1/theme/styles_fonts.css")){
			$output="";
			$file = fopen($CFG->dataroot."/1/theme/styles_fonts.css", "r");
			while(!feof($file)) {
			  //read file line by line into variable
			  $output .= fgets($file, 4096);
			}
			fclose ($file);
			$mform->setDefault('fonts_style', $output);
		}
		
		$mform->addElement('html', '<br/><h4>'.get_string('color_style','theme_config').'</h4>');
		$mform->addElement('textarea', 'color_style', '', 'wrap="virtual" rows="20" cols="75" style="margin-left:-250px" ');
		if(file_exists($CFG->dataroot."/1/theme/styles_color.css")){
			$output="";
			$file = fopen($CFG->dataroot."/1/theme/styles_color.css", "r");
			while(!feof($file)) {
			  //read file line by line into variable
			  $output .= fgets($file, 4096);
			}
			fclose ($file);
			$mform->setDefault('color_style', $output);
		}

		//normally you use add_action_buttons instead of this code
        $buttonarray=array();
        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', get_string('savechanges'));
        $buttonarray[] = &$mform->createElement('reset', 'resetbutton', get_string('revert'));
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
		
	}
}


?>
