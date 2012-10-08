<?php
require_once('../../config.php');
require_once('lib.php');

$id = optional_param('id', 0, PARAM_INT);        // course_module ID, or
$a = optional_param('a', 0, PARAM_INT);          // rcontent instance ID
$frameset = optional_param('frameset','');

if ($id !== false) {
    if (($cm = get_coursemodule_from_id('rcontent', $id)) === false) {
        error('Course Module ID was incorrect');
    }
    
    if (($course = get_record('course', 'id', $cm->course)) === false) {
        error('Course is misconfigured');
    }
    
    if (($rcontent = get_record('rcontent', 'id', $cm->instance)) === false) {
        error('Course module is incorrect');
    }
}
else if ($a !== false) {
    if (($rcontent = get_record('rcontent', 'id', $a)) === false) {
        error('Course module is incorrect');
    }
    
    if (($course = get_record('course', 'id', $rcontent->course)) === false) {
        error('Course is misconfigured');
    }
    
    if (($cm = get_coursemodule_from_instance('rcontent', $rcontent->id, $course->id)) === false) {
        error('Course Module ID was incorrect');
    }
}
else {
    error('You must specify a course_module ID or an instance ID');
}

require_login();

$navlinks = array(
    array(
        'name' => $course->fullname,
        'link' => $CFG->wwwroot . '/course/view.php?id=' . $course->id,
        'type' => 'activity'
    ),
    array(
        'name' => get_string('modulenameplural', 'rcontent'),
        'link' => $CFG->wwwroot . '/mod/rcontent/index.php?id=' . $course->id,
        'type' => 'activity'
    ),
    array(
        'name' => format_string($rcontent->name),
        'link' => '',
        'type' => 'activityinstance'
    )
);

$navigation = build_navigation($navlinks);

//call to autentification web services
require_once($CFG->dirroot.'/blocks/rcommon/WebServices/Authentication/AuthenticateContent.php');
$rcontent->module='rcontent';
$rcontent->cmid=$cm->id; 
$return = AuthenticateUserContent($rcontent);

// MARSUPIAL ************* AFEGIT -> Added extra control for response errors
// 2012.09.18 @mmartinez
if ($return->AutenticarUsuarioContenidoResult->Codigo <= 0 || !isset($return->AutenticarUsuarioContenidoResult->URL) || empty($return->AutenticarUsuarioContenidoResult->URL)){
	error(get_string('error_authentication','blocks/rcommon').$return->AutenticarUsuarioContenidoResult->Codigo.', '.$return->AutenticarUsuarioContenidoResult->Descripcion);
}
// ************** FI

$url = $return->AutenticarUsuarioContenidoResult->URL;
require_js(array('yui_utilities'));
require_js(array('yui_container'));
require_js(array('yui_dom-event'));
require_js(array('yui_dom'));

$strexit=get_string('exitactivity','rcontent');
$exitlink = '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$rcontent->course.'" target="_parent" title="'.$strexit.'">'.$strexit.'</a> ';
	    
if($rcontent->popup == 1 ){
    print_header_simple( format_string($rcontent->name),'',$navigation,'','',true,$exitlink.update_module_button($cm->id, $course->id, get_string('modulename', 'rcontent')),navmenu($course,$cm));   
    $link = "<a onclick=\"window.open('$url','popup','$rcontent->popup_options');return false;\" href='#'>".get_string('popupblockedlinkname','rcontent')."</a>";
    print_simple_box(get_string('popupblocked','rcontent',$link),'center');
    
    //echo "<div ><br /> This resource should appear in a popup window. If it didn't, click here: <a onclick=\"window.open('$url','popup','$rcontent->popup_options');return false;\" href='#'>$rcontent->name</a></div>"; 
    
    echo "<script type='text/javascript'>";
    echo "window.open('$url','popup','$rcontent->popup_options')";
    echo "</script>";
 
}elseif($rcontent->frame == 1){
    if(empty($frameset)){   
        echo '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head><frameset rows="'.$CFG->rcontent_framesize.',*"><frame src="view.php?id='.$cm->id.'&amp;frameset=1" title="Resource"/><frame src="'.$url.'" title="Resource"/></frameset></html>';
    }
    if(!empty($frameset)){
	    
        print_header_simple(
        format_string($rcontent->name),
        '',
        $navigation,
        '',
        '',
        true,
        $exitlink.update_module_button($cm->id, $course->id, get_string('modulename', 'rcontent')),
        navmenu($course,$cm));
    
    }
}elseif($rcontent->popup == 0 and $rcontent->frame == 2 ){
    
    print_header_simple(format_string($rcontent->name),'',$navigation,'','',true,$exitlink.update_module_button($cm->id, $course->id, get_string('modulename', 'rcontent')),navmenu($course,$cm));

    echo "<br /><iframe  id='embeddedhtml' width='100%' height='600' src='$url' frameborder='0' ></iframe>";

    echo'<script type="text/javascript">
                             //<![CDATA[
                             function resizeEmbeddedHtml() {
                             //calculate new embedded html height size  
            objectheight =  YAHOO.util.Dom.getViewportHeight() - 130;
      //the object tag cannot be smaller than a human readable size
             if (objectheight < 200) {
                 objectheight = 200;
             }
             //resize the embedded html object
             YAHOO.util.Dom.setStyle("embeddedhtml", "height", objectheight+"px");
             YAHOO.util.Dom.setStyle("embeddedhtml", "width", "100%");
          }
          resizeEmbeddedHtml();
          YAHOO.widget.Overlay.windowResizeEvent.subscribe(resizeEmbeddedHtml);
          //]]>
       </script>
    ';
}else
{
 redirect($url,'',-1);   
}

// MARSUPIAL ********** AFEGIT -> To save view rcontent action to the Moodle log
// 2011.09.27 @sarjona
if(empty($frameset)){
    add_to_log($course->id, 'rcontent', 'view', "view.php?id=$cm->id", "$rcontent->id", $cm->id);   
}
// ********* FI

