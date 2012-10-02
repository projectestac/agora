<?php
/// Library of functions and constants for module slideshow
//
// name the subdirectories created to store thumbnails and originals of resized images
$slideshow_thumbdir = 'slideshow_thumbs';
$slideshow_ojdir = 'original_imgs';

// ensure reasonable settings if no defaults

if (!isset($CFG->slideshow_maxsize)) {
// Default maximum size for images (k)
    set_config('slideshow_maxsize','60');
}
if (!isset($CFG->slideshow_maxwidth)) {
// Default maximum size for images (px)
    set_config('slideshow_maxwidth','600');
}
if (!isset($CFG->slideshow_maxheight)) {
// Default maximum size for images (px)
    set_config('slideshow_maxheight','400');
}
if (!isset($CFG->slideshow_keeporiginals)) {
// copy original images to moddata
    set_config('slideshow_keeporiginals','1');
}
if (!isset($CFG->slideshow_securepix)) {
// disable right-click and direct link
    set_config('slideshow_securepix','0');
}

// files larger than this (k) will set off a warning
$maxk = $CFG->slideshow_maxsize;
$max_width = $CFG->slideshow_maxwidth;
$max_height = $CFG->slideshow_maxheight;
$keep_oj_img = $CFG->slideshow_keeporiginals;

function slideshow_add_instance($slideshow) {

/// Given an object containing all the necessary data,
/// (defined by the form in mod.html) this function
/// will create a new instance and return the id number
/// of the new instance.
    $slideshow->timemodified = time();
    # May have to add extra stuff in here #
    return insert_record("slideshow", $slideshow);
}
function slideshow_update_instance($slideshow) {
/// Given an object containing all the necessary data,
/// (defined by the form in mod.html) this function
/// will update an existing instance with new data.
    $slideshow->timemodified = time();
    $slideshow->id = $slideshow->instance;
    # May have to add extra stuff in here #
    return update_record("slideshow", $slideshow);
}
 function slideshow_delete_instance($id) {
/// Given an ID of an instance of this module,
/// this function will permanently delete the instance
/// and any data that depends on it.
    if (! $slideshow = get_record("slideshow", "id", "$id")) {
        return false;
    }
    $result = true;
    # Delete any dependent records here #
    $module_id = get_record("modules","name","slideshow");
    $instance_id = get_record("course_modules","instance","$id","module","$module_id->id");
    if (! delete_records("slideshow_captions", "slideshow", "$instance_id->id")) {
        $result = false;
    } else {
        if (! delete_records("slideshow", "id", "$slideshow->id")) {
            $result = false;
        }
    }
    return $result;
}

function slideshow_user_outline($course, $user, $mod, $slideshow) {
/// Return a small object with summary information about what a
/// user has done with a given particular instance of this module
/// Used for user activity reports.
/// $return->time = the time they did it
/// $return->info = a short text description
    return $return;
}
function slideshow_user_complete($course, $user, $mod, $slideshow) {
/// Print a detailed representation of what a  user has done with
/// a given particular instance of this module, for user activity reports.
    return true;
}
function slideshow_print_recent_activity($course, $isteacher, $timestart) {
/// Given a course and a time, this module should find recent activity
/// that has occurred in slideshow activities and print it out.
/// Return true if there was output, or false is there was none.
    global $CFG;
    return false;  //  True if anything was printed, otherwise false
}
function slideshow_cron () {
/// Function to be run periodically according to the moodle cron
/// This function searches for things that need to be done, such
/// as sending out mail, toggling flags etc ...
    global $CFG;
    return true;
}
function slideshow_grades($slideshowid) {
/// Must return an array of grades for a given instance of this module,
/// indexed by user.  It also returns a maximum allowed grade.
///
///    $return->grades = array of grades;
///    $return->maxgrade = maximum allowed grade;
///
///    return $return;
   return NULL;
}
function slideshow_get_participants($slideshowid) {
//Must return an array of user records (all data) who are participants
//for a given instance of slideshow. Must include every user involved
//in the instance, independient of his role (student, teacher, admin...)
//See other modules as example.
    return false;
}
function slideshow_scale_used ($slideshowid,$scaleid) {
//This function returns if a scale is being used by one slideshow
//it it has support for grading and scales. Commented code should be
//modified if necessary. See forum, glossary or journal modules
//as reference.
    $return = false;
    //$rec = get_record("slideshow","id","$slideshowid","scale","-$scaleid");
    //
    //if (!empty($rec)  && !empty($scaleid)) {
    //    $return = true;
    //}
    return $return;
}
//////////////////////////////////////////////////////////////////////////////////////
/// Any other slideshow functions go here.  Each of them must have a name that
/// starts with slideshow_

function slideshow_display_thumbs($filearray){
    global $urlroot,$slideshow_thumbdir,$showdir,$cm,$img_num;
    $this_img = 0;
    $thumb_html_arr = array();
    foreach ($filearray as $filename) {
        if ($this_img == $img_num){
            $bstyle = 'border:3px solid #369';
        } else {
            $bstyle = 'border:2px solid white';
        }
        echo "\n<a href=\"?id=".($cm->id).'&img_num='.$this_img.'">';//#tmb">';
        echo '<img src="'.$urlroot.'/'.$showdir.'/'.$slideshow_thumbdir.'/'.$filename.'" alt="'.$filename.'" title="'.$filename.'" style="'.$bstyle.'">';
        echo '</a> ';
        $this_img++;
    }
}

function slideshow_thumbnail ($coursedir,$myDir,$myThumb){
    global $slideshow_thumbdir;
    $height = 50;
    list($width_orig, $height_orig) = getimagesize($coursedir.'/'.$myDir.'/'.$myThumb);
    $width = ($height / $height_orig) * $width_orig;
    $newImg = imagecreatetruecolor($width, $height);
    
    $thumbstring = $coursedir.'/'.$myDir.'/'.$slideshow_thumbdir.'/'.$myThumb;
    
    if (eregi("\.jpe?g$", $myThumb)){
        $OJImg = imagecreatefromjpeg($coursedir.'/'.$myDir.'/'.$myThumb);
        imagecopyresampled($newImg, $OJImg, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        imagejpeg($newImg, $thumbstring);
    } elseif (eregi("\.png$", $myThumb)) {
        $OJImg = @imagecreatefrompng($coursedir.'/'.$myDir.'/'.$myThumb);
        imagecopyresampled($newImg, $OJImg, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        imagepng($newImg, $thumbstring);
    } elseif (eregi("\.gif$", $myThumb)) {
        $OJImg = @imagecreatefromgif($coursedir.'/'.$myDir.'/'.$myThumb);
        imagecopyresampled($newImg, $OJImg, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        imagegif($newImg, $thumbstring);
    }
  
    imagedestroy($newImg);
    imagedestroy($OJImg);
}

function slideshow_filetidy ($filename){
    return substr($filename, 0, -strlen(strrchr($filename, '.')));
    //return $filename;
}


function slideshow_caption_array($feed){
    $img_array = array();
    if($caption_object_array = get_records('slideshow_captions', 'slideshow', $feed, $sort='', $fields='*', $limitfrom='', $limitnum='')){
        foreach($caption_object_array as $caption_object ){
            foreach($caption_object as $field => $value){
                $this_img_array[$field] = $value;
                if ($field == 'image'){
                    $thisid = $value;
                }
            }
            $img_array[$thisid] = $this_img_array;
        }
    return ($img_array);
    }
}

function slideshow_write_captions($captions){
    delete_records_select('slideshow_captions', 'slideshow = '.$captions['id']);
    //while ($captions['image'.++$i]){ 
    $number_of_captions = (count($captions)-2)/3; // stricter alternative - no likey - NB need to change maths if adding fields to caption table
    for($i=1;$i<=$number_of_captions;$i++){
        $newcaption->slideshow = $captions['id'];
        $newcaption->image = $captions['image'.$i];
        $textlib = textlib_get_instance();
         
        $newcaption->title = $captions['title'.$i];
        $newcaption->caption = $captions['caption'.$i]; 
        
        
        if (!$chapter->id = insert_record('slideshow_captions', $newcaption)) {
            error('Could not insert caption');
        }
    }
    
}
function slideshow_resizer($imagefile){
    list($width_orig, $height_orig) = getimagesize($imagefile);
    list($nuwidth, $nuheight) = slideshow_sizeme(getimagesize($imagefile));
    $newImg = @imagecreatetruecolor($nuwidth, $nuheight)
        or die("Cannot Initialize new GD image stream");
    //@unlink($imagefile);
    if (eregi("\.jpe?g$", $imagefile)){
        $OgImg = imagecreatefromjpeg($imagefile);
        ImageCopyResampled($newImg, $OgImg, 0, 0, 0, 0, $nuwidth, $nuheight, $width_orig, $height_orig);
        imagejpeg($newImg, $imagefile);
    } elseif (eregi("\.png$", $imagefile)) {
        $OgImg = imagecreatefrompng($imagefile);
        ImageCopyResampled($newImg, $OgImg, 0, 0, 0, 0, $nuwidth, $nuheight, $width_orig, $height_orig);
        imagepng($newImg, $imagefile);
    } elseif (eregi("\.gif$", $imagefile)) {
        $OgImg = imagecreatefromgif($imagefile);
        ImageCopyResampled($newImg, $OgImg, 0, 0, 0, 0, $nuwidth, $nuheight, $width_orig, $height_orig);
        imagegif($newImg, $imagefile);
    }
    imagedestroy($newImg);
    imagedestroy($OgImg);
}

function slideshow_sizeme($size){
    global $max_width;
    global $max_height ;
    if ($size[0] > $max_width){
        $size[1] = $size[1]*$max_width/$size[0] ;
        $size[0] = $max_width;
    }
    if ($size[1]> $max_height){
        $size[0] = $size[0]*$max_height/$size[1];
        $size[1] = $max_height;
    }
    return array($size[0],$size[1]);
}


function slideshow_make_thumb_dir($dirpath){
    $pre195datadir = str_replace('slideshow','jpgs_data',$dirpath);
    if(is_dir($pre195datadir)){
        rename($pre195datadir, $dirpath);
    }
    if(!is_dir($dirpath)){
        $path = explode('/', $dirpath);
        $mypath = '';
        foreach($path as $newdir){
            $mypath.=$newdir;
            if(!is_dir($mypath)){
                @mkdir($mypath);
            }
            $mypath.='/';
        }
    }
}

function slideshow_secure_script ($securitylevel){
    if ($securitylevel){
        echo'<script language=JavaScript>
            <!--
            var message="";
            function clickIE() {if (document.all) {(message);return false;}}
            function clickNS(e) {if 
            (document.layers||(document.getElementById&&!document.all)) {
            if (e.which==2||e.which==3) {(message);return false;}}}
            if (document.layers) 
            {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
            else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
            document.oncontextmenu=new Function("return false")
            --> 
            </script>';
    } 
}
?>