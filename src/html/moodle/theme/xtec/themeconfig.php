<?php
require_once("../../config.php");
require_once($CFG->libdir.'/adminlib.php');
require_once('themeconfig_form.php');
 
admin_externalpage_setup('themeconfig');
admin_externalpage_print_header('themeconfig');

$mform = new themeconfig_form();
//default 'action' for form is strip_querystring(qualified_me())
if ($fromform = $mform->get_data()){
	
	//Save colors
	if (set_config("font_size", $fromform->font_size)) {
		
		
		$themedir = $CFG->dataroot."/1/theme/";
		
		@mkdir($themedir);
		
		//Save Image
		if($fromform->image_header == 1){
			//Erase image
			if(file_exists($themedir."logo.jpg")) unlink($themedir."logo.jpg");
			if(file_exists($themedir."logo.png")) unlink($themedir."logo.png");
				
		}
		else if($fromform->image_header == 2){
			//Save new image
			
			$tempdir = $themedir."temp/";
			
			$mform->save_files($tempdir);
    		$newfilename = $tempdir.$mform->get_new_filename();
    		
    		if($imageattr = getimagesize($newfilename)){
				//Test the height
				$height = $imageattr[1];
				if($height <= 300){
					
					//Test the mime
					$mime = $imageattr['mime'];
					if($mime == "image/png"){
						if(file_exists($themedir."logo.jpg")) unlink($themedir."logo.jpg");
						if(file_exists($themedir."logo.png")) unlink($themedir."logo.png");
						rename($newfilename, $themedir."logo.png");
					}
					else if($mime == "image/jpeg"){
						if(file_exists($themedir."logo.jpg")) unlink($themedir."logo.jpg");
						if(file_exists($themedir."logo.png")) unlink($themedir."logo.png");
						rename($newfilename, $themedir."logo.jpg");
					}
					else{
						unlink($newfilename);
    					error("The image must be a png or jpg");
					}
					
				}
				else{
					unlink($newfilename);
					error("The image must be 112px height or less");
				}
			}
    		else{
				unlink($newfilename);
    			error("The file selected must be an image");
			}
			rmdir($tempdir);
		}
		
		//Save Personalized CSS files
		if(!empty($fromform->layout_style)){
			$text = str_replace  ("''"  , "'"  , $fromform->layout_style);
			$file = fopen ($themedir."styles_layout.css", "w");
			fwrite($file, $text);
			fclose ($file);
		}
		else if(file_exists($themedir."styles_layout.css")){
			unlink($themedir."styles_layout.css");
		}
		
		if(!empty($fromform->fonts_style)){
			$text = str_replace  ("''"  , "'"  , $fromform->fonts_style);
			$file = fopen ($themedir."styles_fonts.css", "w");
			fwrite($file, $text);
			fclose ($file);
		}
		else if(file_exists($themedir."styles_fonts.css")){
			unlink($themedir."styles_fonts.css");
		}
		
		if(!empty($fromform->color_style)){
			$text = str_replace  ("''"  , "'"  , $fromform->layout_style);
			$file = fopen ($themedir."styles_color.css", "w");
			fwrite($file, $text);
			fclose ($file);
		}
		else if(file_exists($themedir."styles_color.css")){
			unlink($themedir."styles_color.css");
		}
		
		print_heading(get_string("stylesaved","theme_config"));

		print_continue("$CFG->wwwroot/");
	
	} else {
		error("Could not set the style!");
	}
 
} else {
	// this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
	// or on the first display of the form.
    //setup strings for heading
    print_heading(get_string("style_config","theme_config"));
    //notice use of $mform->focus() above which puts the cursor 
    //in the first form field or the first field with an error.
 
    //call to print_heading_with_help or print_heading? then :
    $mform->display();
}

admin_externalpage_print_footer();

?>
