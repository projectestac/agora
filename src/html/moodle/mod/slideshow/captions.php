<?php

/// This page prints a form to edit captions and titles for the images in the slideshow folder

    require_once("../../config.php");
    require_once("lib.php");

    $id = optional_param('id',0,PARAM_INT);
    $a = optional_param('a',0,PARAM_INT);
    $img_num = optional_param('img_num',0,PARAM_INT);
    

    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }

        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }

        if (! $slideshow = get_record("slideshow", "id", $cm->instance)) {
            error("Course module is incorrect");
        }

    } else {
        if (! $slideshow = get_record("slideshow", "id", $a)) {
            error("Course module is incorrect");
        }
        if (! $course = get_record("course", "id", $slideshow->course)) {
            error("Course is misconfigured");
        }
        if (! $cm = get_coursemodule_from_instance("slideshow", $slideshow->id, $course->id)) {
            error("Course Module ID was incorrect");
        }
    }

    require_login($course->id);
    add_to_log($course->id, "slideshow", "captions", "captions.php?id=$cm->id", "$slideshow->id");
    
/// Print header.
    $strslideshows = get_string("modulenameplural", "slideshow");
    if (@function_exists(build_navigation)){ //qualify for moodle >1.8
        $navlinks = array();
        $navlinks[] = array('name' => get_string("edit_captions", "slideshow"), 'type' => 'title');
        $navigation = build_navigation($navlinks, $cm);
    } else {
        $navigation = "<a href=\"index.php?id=$course->id\">$strslideshows</a> ->  <a href=\"view.php?id=$cm->id\">".format_string($slideshow->name)."</a>";
    }
    print_header_simple(format_string($slideshow->name), "",
                $navigation, "", "", true, "", navmenu($course, $cm));


/// Print the main part of the page

    $course_dir = $CFG->dataroot.'/'.$course->id;
    $showdir = $slideshow->location;
    // debug //echo '<br>$course_dir: '.$course_dir.'<br>$showdir: '.$showdir;
    $img_count = 0;
    if($_POST){
        echo '<div align="center">';
        if(isteacher($course->id)){
            if (!confirm_sesskey()) {
                error('bad sesskey');
            }
            slideshow_write_captions($_POST);
            echo'<p>'.get_string('saved','slideshow');
        }
        echo '<p><form method = "post" action = "view.php?id='.$cm->id.'">
        <input type = "submit" value = "'.get_string('continue','slideshow').'"></form></div>';
    } else {
        if(isteacher($course->id)){
            echo '<p style="margin-left : 5px">'.get_string('captiontext', 'slideshow');
        }
        if ($dh = opendir($course_dir.'/'.$showdir)){
            $img_count = 0;
            $mythumbdir = $course_dir.'/'.$showdir.'/'.$slideshow_thumbdir;
            if ($CFG->slasharguments) {
                $slashroot = '/file.php/'.$course->id;
            } else {
                $slashroot = '/file.php?file=/'.$course->id;
            }
            $urlroot = $CFG->wwwroot.$slashroot;
            $baseurl = $urlroot.'/'.$showdir;
            $caption_array = slideshow_caption_array($cm->id);
            //
            // display caption form:
            echo '<form name="form" method="post">';
            echo '<input type = "hidden" name="id" value="'.$cm->id.'">
                  <input type="hidden" name="sesskey" value="'.sesskey().'" />';
            if (extension_loaded('gd') || extension_loaded('gd2')) {
	            echo '<p> <table cellpadding = 5>'."\n";
                //
                // build and order image array $filearray
                while ($filename = readdir($dh)){   
                    if (  eregi("\.jpe?g$", $filename) || eregi("\.gif$", $filename) || eregi("\.png$", $filename)){
                        $filearray[$img_count] = $filename;
                        if(!file_exists($mythumbdir.'/'.$filename)) {
                            slideshow_thumbnail($course_dir,$showdir,$filename);
                        }
                        $img_count ++;
                    }
                }
                sort($filearray);
                $img_count = 0;
                $popheight = $CFG->slideshow_maxheight +30;
                $popwidth = $CFG->slideshow_maxwidth+30; 
                //
                //  iterate over images in folder
                foreach ($filearray as $filename){
                    if(!file_exists($mythumbdir.'/'.$filename)) {
                        slideshow_thumbnail($course_dir,$slideshow->location,$filename);
                    }
                    
                    $currentimage = slideshow_filetidy($filename);
                    if (isset($caption_array[$currentimage])){
                        $captionstring =  $caption_array[$currentimage]['caption'];
                        $titlestring = str_replace('"','&quot;',$caption_array[$currentimage]['title']);
                    } else {
                        $captionstring = $currentimage;
                        $titlestring = '';
                    }
                    //
                    // show thumbnail, link to popup of main image
                    echo '<tr><td align = "right" valign="top"><a target="popup" href="'.$baseurl.'/'.$filename
                        ."\" onclick=\"return openpopup('".$slashroot."/".$showdir.'/'.$filename
                        ."', 'popup', 'menubar=0,location=0,scrollbars,resizable,width=$popwidth,height=$popheight', 0);\">"
                        ."<img src=\"".$urlroot.'/'.$slideshow->location.'/'.$slideshow_thumbdir.'/'.$filename
                        .'" alt="'.$filename."\" border=0></a></td>\n<td>";
                    //
                    // show caption/title edit area
                    if(isteacher($course->id)){
                        echo '<input type = "hidden" name="image'.++$img_count.'" value="'.slideshow_filetidy($filename).'"> '."\n";
                        echo get_string('title', 'slideshow')
                             .':<br><input type = "text" name="title'.$img_count.'" value="'.$titlestring.'" size="40">';
                        echo '<br>'.get_string('caption', 'slideshow').':<br>';
                        if($slideshow->htmlcaptions){
                            print_textarea($CFG->htmleditor, 25,60, 630, 400, 'caption'.$img_count
                                , $captionstring);
                        } else {
                            echo '<TEXTAREA name="caption'.$img_count.'" rows="5" cols="80">'.$captionstring.'</TEXTAREA>';
                        }
                    } else {
                        //  student has found this page!
                        if($titlestring){
                            echo '<h1>'.$titlestring.'</h1>';
                        }
                        echo $captionstring;
                    }
                    echo '</td></tr>'."\n";
                    echo '<tr><td colspan=2><hr></td></tr>';
                }
                echo '</table>';
                
            } else {
                // NO GD! ///////////////////////////////////////
                // NO GO!
                error(get_string("no_GD_no_thumbs","slideshow"));
            }
            if(isteacher($course->id)){
                use_html_editor();
                echo '<input type = "hidden" name="captions" value="captions">';
                echo '<p><input type = "submit" value="'.get_string('save_changes', 'slideshow').'">';
            }
            echo '</form>';
        } else {
            error(get_string('dir_problem', 'slideshow'));
        }
    }

/// Finish the page
    print_footer($course);


?>