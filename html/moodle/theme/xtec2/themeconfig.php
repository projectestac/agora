<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once('themeconfig_form.php');
require_once('top_menu/tree.class.php');
 
admin_externalpage_setup('themeconfig');
admin_externalpage_print_header('themeconfig');

    echo '<script type="text/javascript" src="'.$CFG->wwwroot.'/lib/jscolor/jscolor.js"></script>';
	?>
		<script type="text/javascript">
		function changeColors(){
			colorProfile = document.getElementById("id_colorSelector").selectedIndex;
			if(colorProfile == 1){
				document.getElementById("id_theme_color1").value = "#AC2013";
				document.getElementById("id_theme_color2").value = "#AC2013";
				document.getElementById("id_theme_color3").value = "#303030";
				document.getElementById("id_theme_color4").value = "#AC2013";
				document.getElementById("id_theme_color5").value = "#D0D0D0";
				//document.getElementById("id_theme_color6").value = "#D0D0D0";
                                document.getElementById("id_theme_color7").value = "#FFFFFF";
			}
			else if(colorProfile == 2){
				document.getElementById("id_theme_color1").value = "#FF0011";
				document.getElementById("id_theme_color2").value = "#FF4444";
				document.getElementById("id_theme_color3").value = "#00BBBB";
				document.getElementById("id_theme_color4").value = "#008888";
				document.getElementById("id_theme_color5").value = "#BBEEEE";
				//document.getElementById("id_theme_color6").value = "#BBEEEE";
                                document.getElementById("id_theme_color7").value = "#000000";
			}
			else if(colorProfile == 3){
				document.getElementById("id_theme_color1").value = "#CC7000";
				document.getElementById("id_theme_color2").value = "#E99B00";
				document.getElementById("id_theme_color3").value = "#0B3D41";
				document.getElementById("id_theme_color4").value = "#145C61";
				document.getElementById("id_theme_color5").value = "#87BDC1";
				//document.getElementById("id_theme_color6").value = "#87BDC1";
                                document.getElementById("id_theme_color7").value = "#3B2C15";
			}
			else if(colorProfile == 4){
				document.getElementById("id_theme_color1").value = "#74AB00";
				document.getElementById("id_theme_color2").value = "#5A6E31";
				document.getElementById("id_theme_color3").value = "#333333";
				document.getElementById("id_theme_color4").value = "#000000";
				document.getElementById("id_theme_color5").value = "#FFEDBA";
				//document.getElementById("id_theme_color6").value = "#FFEDBA";
                                document.getElementById("id_theme_color7").value = "#DEF5BF";
			}
			else if(colorProfile == 5){
				document.getElementById("id_theme_color1").value = "#CD6000";
				document.getElementById("id_theme_color2").value = "#E68804";
				document.getElementById("id_theme_color3").value = "#344D00";
				document.getElementById("id_theme_color4").value = "#4E7104";
				document.getElementById("id_theme_color5").value = "#B3CD7B";
				//document.getElementById("id_theme_color6").value = "#B3CD7B";
                                document.getElementById("id_theme_color7").value = "#543414";
			}
			else if(colorProfile == 6){
				document.getElementById("id_theme_color1").value = "#457FB9";
				document.getElementById("id_theme_color2").value = "#457FB9";
				document.getElementById("id_theme_color3").value = "#457FB9";
				document.getElementById("id_theme_color4").value = "#457FB9";
				document.getElementById("id_theme_color5").value = "#B3CADB";
				//document.getElementById("id_theme_color6").value = "#B3CADB";
                                document.getElementById("id_theme_color7").value = "#E6E4E3";
			}
			document.getElementById("id_theme_color1").style.backgroundColor = document.getElementById("id_theme_color1").value;
			document.getElementById("id_theme_color2").style.backgroundColor = document.getElementById("id_theme_color2").value;
			document.getElementById("id_theme_color3").style.backgroundColor = document.getElementById("id_theme_color3").value;
			document.getElementById("id_theme_color4").style.backgroundColor = document.getElementById("id_theme_color4").value;
			document.getElementById("id_theme_color5").style.backgroundColor = document.getElementById("id_theme_color5").value;
			//document.getElementById("id_theme_color6").style.backgroundColor = document.getElementById("id_theme_color6").value;
                        document.getElementById("id_theme_color7").style.backgroundColor = document.getElementById("id_theme_color7").value;
			
		}
		function changeToPersonalized(){
			document.getElementById("id_colorSelector").selectedIndex = 0;
		}
		</script>
	<?php

$mform = new themeconfig_form();
//default 'action' for form is strip_querystring(qualified_me())
if ($fromform = $mform->get_data()){
	
	//Save colors
	if (set_config("colorSelector", $fromform->colorSelector)
		&& set_config("theme_color1", $fromform->theme_color1)
		&& set_config("theme_color2", $fromform->theme_color2)
		&& set_config("theme_color3", $fromform->theme_color3)
		&& set_config("theme_color4", $fromform->theme_color4)
		&& set_config("theme_color5", $fromform->theme_color5)
		//&& set_config("theme_color6", $fromform->theme_color6)
                && set_config("theme_color7", $fromform->theme_color7)
		&& set_config("font_size", $fromform->font_size)
		&& set_config("custompix", $fromform->default_icons)
                && set_config("font_style", $fromform->font_style)) {
                
		
		
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
				if($height <= 112){
					
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
		
		//Save Personalized CSS file
		if(!empty($fromform->pers_style)){
			$text = str_replace  ("''"  , "'"  , $fromform->pers_style);
			$file = fopen ($themedir."styles_personal.css", "w");
			fwrite($file, $text);
			fclose ($file);
		}
		else if(file_exists($themedir."styles_personal.css")){
			unlink($themedir."styles_personal.css");
		}

                //Save top menu parameters
                $top_menu_active = (isset($fromform->top_menu_active)) ? '1' : '0';
                set_config("top_menu_active", $top_menu_active);
                $top_menu_new_window = (isset($fromform->top_menu_new_window)) ? '1' : '0';
                set_config("top_menu_new_window", $top_menu_new_window);
		
		print_heading(get_string("stylesaved","theme_config"));
                echo '<p align="center">'.get_string('cache_warning','theme_config').'</p>';

		print_continue("$CFG->wwwroot/");
		
	} else {
		error("Could not set the style!");
	}
 
} else {
	// this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
	// or on the first display of the form.
    //setup strings for heading
    print_heading_with_help(get_string("style_config","theme_config"), "params", "theme_config");
    //notice use of $mform->focus() above which puts the cursor 
    //in the first form field or the first field with an error.
 
    //call to print_heading_with_help or print_heading? then :
    $mform->display();
}

admin_externalpage_print_footer();

?>
