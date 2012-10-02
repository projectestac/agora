<?PHP  
/// This page prints a particular instance of slideshow

    require_once("../../config.php");
    require_once("lib.php");

    $id = optional_param('id',0,PARAM_INT);
    $a = optional_param('a',0,PARAM_INT);
    $autoshow = optional_param('autoshow',0,PARAM_INT);
    $img_num = optional_param('img_num',0,PARAM_INT);
    $recompress = optional_param('recompress',0,PARAM_INT);
    $pause = optional_param('pause',0,PARAM_INT);

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
    //if (!isset($_GET['img_num'])){    // qualifies add_to_log, otherwise every slide view increments log - has to test $_GET otherwise defaults
    //
    // preferred - but does it work?
    if (optional_param('img_num',-1,PARAM_INT)<0){    // qualifies add_to_log, otherwise every slide view increments log
        $img_num = 0;
        add_to_log($course->id, "slideshow", "view", "view.php?id=$cm->id", "$slideshow->id",$cm->id);
    }
    

/// Print header.
    $strslideshows = get_string("modulenameplural", "slideshow");
    $navigation = "<a href=\"index.php?id=$course->id\">$strslideshows</a> ->";
    if ($autoshow){ // auto progress of images, no crumb trail
        print_header();
        $slideshow->layout = 9; //layout 9 prevents thumbnails being created
        if (!$pause){
            if(!($autodelay = $slideshow->delaytime)>0){     // set seconds wait for auto popup progress
                $pause = true;                               // if time 0 then pause...
            } 
        } 
        if ($slideshow->autobgcolor){ // include style to make background black in popup ... 
            echo '<STYLE type="text/css">body {
                background-color:black ! important; background-image : none ! important; color : #ccc ! important} 
                p,td,h1,h2,h3,h4,h5,h6 { color: #ccc ! important ; background-color: #000 ! important;} 
                A:link, A:visited{color : #06c}A:hover{color : #0c3}
                </STYLE>';
        }
    } else { // normal page header
        if (@function_exists(build_navigation)){ //qualify for moodle <1.9
            $navigation = build_navigation('', $cm);
        } else {
            $navigation = "<a href=\"index.php?id=$course->id\">$strslideshows</a> -> ".format_string($slideshow->name);
        }
        
        $buttontext = update_module_button($cm->id, $course->id, get_string("modulename", "slideshow"));
        print_header_simple(format_string($slideshow->name), "",
            $navigation, "", "", true, $buttontext, navmenu($course, $cm));
    }
   
/// Print the main part of the page
    $course_dir = $CFG->dataroot.'/'.$course->id;
    $showdir = $slideshow->location;
    slideshow_secure_script($CFG->slideshow_securepix); // prints javascript ("open image in new window" also conditional on $CFG->slideshow_securepix)
    
    //echo '<a name="tmb"><p style="margin-left : 5px"></a>';
    
    if ($dh = opendir($course_dir.'/'.$showdir)){
        $img_count = 0;
        $mythumbdir = $course_dir.'/'.$showdir.'/'.$slideshow_thumbdir;
        if ($CFG->slasharguments) {
            $urlroot = $CFG->wwwroot.'/file.php/'.$course->id;
        } else {
            $urlroot = $CFG->wwwroot.'/file.php?file=/'.$course->id;
        }
        $baseurl = $urlroot.'/'.$showdir;
        //
        // OK, let's look at the pictures in the folder ...
        if (extension_loaded('gd') || extension_loaded('gd2')) {
        // make sure we have destination dir for thumbnails
            slideshow_make_thumb_dir($mythumbdir);
            $toobig = array();
            $caption_array = slideshow_caption_array($cm->id);
            //  iterate and process images in directory $filearray
            while ($filename = readdir($dh)){
                if (  eregi("\.jpe?g$", $filename) || eregi("\.gif$", $filename) || eregi("\.png$", $filename)){
                    $filearray[$img_count] = $filename;
                    //
                    // if userlevel >= teacher compare pre-existence of thumbnail and store if too big
                    if(isteacher($course->id)){
                        if (filesize ($course_dir.'/'.$showdir.'/'.$filename)/1024 > $maxk && (!file_exists($mythumbdir.'/'.$filename) || ($recompress))){
                            $toobig[]=$filename;
                        }
                    }
                    // ensure existence of thumbnail
                    if(!file_exists($mythumbdir.'/'.$filename)) {
                        slideshow_thumbnail($course_dir,$showdir,$filename);
                    }
                    $img_count ++;
                }
            }
            closedir($dh);
            // echo '<br>count '.$img_count.' imgs: caption:'.$slideshow->filename.' - layout '.$slideshow->layout.'<br>';    // debug
            if ($img_count > 0){
                sort($filearray);
            }
        } else {
        // NO GD ////////////////////////////////////////
        //
        //  Get a less pikey server ...
            error(get_string("no_GD_no_thumbs","slideshow"));
        }
        ////////////////////////////////////////////////
        
        if ($slideshow->centred){
            echo'<div align="center">';
        }

        if($img_count){
            //
            // $slideshow->layout defines thumbnail position - 0 is on top, 1 is bottom
            // $slideshow->filename defines the position of captions. 1 is on top, 2 is bottom, 3 is on the right
            //
            if ($slideshow->layout == 0){
                // print thumbnail row
                slideshow_display_thumbs($filearray);
            }
            list($width_orig, $height_orig) = slideshow_sizeme(getimagesize($course_dir.'/'.$showdir.'/'.$filearray[$img_num]));
            echo"\n";
            // process caption text
            $currentimage = slideshow_filetidy($filearray[$img_num]);
            
            if (isset($caption_array[$currentimage])){
                $captionstring =  $caption_array[$currentimage]['caption'];
                $titlestring = $caption_array[$currentimage]['title'];
            } else {
                $captionstring = $currentimage;
                $titlestring='';
            }
            //
            // if there is a title, show it!
            if($titlestring){
                echo format_text('<h1>'.$titlestring.'</h1>');
            }
            // NB not redundant str_replace - adds space before stripping tags to separate e.g. <p> : i.e. '<' <> ' <' ... 
            $plainsearch = array('<','&nbsp;',"\r\n");
            $plainreplace = array(' <',' ','');
            
            $plaintext = substr(htmlspecialchars(strip_tags(str_replace($plainsearch,$plainreplace,$captionstring))),0,250);
            echo '<p style="margin-left : 5px">';
            if ($slideshow->filename == 1){
                echo format_text ('<p>'.$captionstring.'<p>');
            } else if ($slideshow->filename == 3){
                echo format_text ("\n<table cellpadding = 5>\n<tr><td valign=\"top\">");
            }
            // display main picture, with link to next page and plain text for alt and title tags
            echo '<a name="pic" href="?id='.($cm->id).'&img_num='.fmod($img_num+1,$img_count).'&autoshow='.$autoshow.'">';
            echo '<img src="'.$baseurl.'/'.$filearray[$img_num].'" alt="'.$plaintext
            .'" title="'.$plaintext.'" height = '.round($height_orig).' width = '.round($width_orig).'>';
            echo "</a><br>\n";
            if ($slideshow->filename == 2){
                echo format_text('<p>'.$captionstring.'<p>');
            } else if ($slideshow->filename == 3){
                echo format_text('</td><td valign="top"><p>'.$captionstring.'</td></tr></table>');
            }
            
            if ($slideshow->layout == 1){
                // print thumbnail row
                slideshow_display_thumbs($filearray);
            }
            
            //
            // these files are too big!
            if (count($toobig) > 0){
                $big_originals_dir = "$course_dir/moddata/$slideshow_ojdir/$showdir";
                echo '<h3>'.get_string('warning', 'slideshow').'</h3>';
                echo'<p>'.get_string('files_too_big', 'slideshow').$maxk.'k<ul>';
                if (extension_loaded('gd') || extension_loaded('gd2')) {
                    if(!is_dir($big_originals_dir)&& ($keep_oj_img == 1)){
                        
                        
          //XTEC ************ AFEGIT - Warning removed    
          //2011.02.16 @jfern343
                        mkdir("$course_dir/moddata/$slideshow_ojdir");
          //************ FI

                        mkdir($big_originals_dir);
                    }
                    foreach($toobig as $bigfile){
                        echo '<li>/'.$showdir.'/'.$bigfile;
                        if (file_exists($big_originals_dir.'/'.$bigfile)){
                            echo ' ('.get_string('original_exists','slideshow')."/moddata/$slideshow_ojdir/$showdir)";
                        } else {
                            if (copy ($course_dir.'/'.$showdir.'/'.$bigfile, $big_originals_dir.'/'.$bigfile)){
                                echo' ('.get_string('original_moved','slideshow')."/moddata/$slideshow_ojdir/$showdir)";
                            } else {
                                echo' ('.get_string('original_deleted','slideshow').')';
                            }
                        }
                        echo '</li>';
                        slideshow_resizer($course_dir.'/'.$showdir.'/'.$bigfile);
                    }
                } else {
                    foreach($toobig as $bigfile){
                        echo '<li>/'.$showdir.'/'.$bigfile.'</li>';
                    }
                }
                echo '</ul></p>';
            }
            if (!$autoshow){
                // set up regular navigation options (autopoup, image in new window, teacher options)
                $popheight = $CFG->slideshow_maxheight +100;
                $popwidth = $CFG->slideshow_maxwidth +100;
                echo"\n".'<p style="text-align : right"><a target="popup" href="?id='
                .($cm->id)."&autoshow=1\" onclick=\"return openpopup('/mod/slideshow/view.php?id="
                .($cm->id)."&autoshow=1', 'popup', 'menubar=0,location=0,scrollbars,resizable,width=$popwidth,height=$popheight', 0);\">"
                .get_string('autopopup','slideshow')."</a>";
                if(!$CFG->slideshow_securepix){
                    echo"\n".'<br><a href="'.$baseurl.'/'.$filearray[$img_num].'" target="_blank">'.get_string('open_new', 'slideshow').'</a>';
                }                                                                                                                                    
                if (isteacher($course->id)){
                    //  add teacher options
                    echo "\n".'<br><a href="?id='.$cm->id.'&recompress=1">'.get_string('recompress', 'slideshow').' &gt; '
                    .$CFG->slideshow_maxsize.'k ('.$CFG->slideshow_maxwidth.'x'.$CFG->slideshow_maxheight.'px)</a>';
                    echo "\n".'<br><a href="captions.php?id='.$cm->id.'">'.get_string('edit_captions', 'slideshow').'</a></p>';
                }
            } else {
                //
                // set up autoplay navigation (< || >)
                echo "\n<p><a href=\"?id=".($cm->id).'&img_num='.fmod($img_count+$img_num-1,$img_count).'&autoshow='.$autoshow."\">&lt;&lt;</a> \n";
                if (!$pause){
                    echo '<a href="?id='.($cm->id).'&img_num='.$img_num.'&autoshow='.$autoshow."&pause=1\">||</a>\n";
                        echo '<meta http-equiv="Refresh" content="'.$autodelay.'; url=?id='
                        .($cm->id).'&img_num='.fmod($img_num+1,$img_count)."&autoshow=1\">\n";
                } else {
                    echo "||\n";
                }
                echo '<a href="?id='.($cm->id).'&img_num='.fmod($img_num+1,$img_count).'&autoshow='.$autoshow."\">&gt;&gt;</a></p>\n";
            }
        } else {
            echo '<p>'.get_string('none_found', 'slideshow').'<b>'.$showdir.'</b>';
            rmdir($mythumbdir);
        }
    } else {
        error(get_string('dir_problem', 'slideshow'));
    }
    if ($slideshow->centred){
        echo'</div>';
    }
/// Finish the page
if ($autoshow == 1){
        echo'</body></html>';
    } else {
        print_footer($course);
    }

?>