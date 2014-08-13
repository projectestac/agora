<?php
require_once('../../config.php');
require_once('lib.php');

$id = optional_param('id', 0, PARAM_INT);        // course_module ID, or
$a = optional_param('a', 0, PARAM_INT);          // rcontent instance ID

if ($id !== false) {
    if (($cm = get_coursemodule_from_id('rcontent', $id)) === false) {
        print_error('Course Module ID was incorrect');
    }
    if (($course = $DB->get_record('course', array('id' => $cm->course))) === false) {
        print_error('Course is misconfigured');
    }

    if (($rcontent = $DB->get_record('rcontent', array('id' => $cm->instance))) === false) {
        print_error('Course module is incorrect');
    }
}
else if ($a !== false) {
    if (($rcontent = $DB->get_record('rcontent', array('id' => $a))) === false) {
        print_error('Course module is incorrect');
    }

    if (($course = $DB->get_record('course', array('id' => $rcontent->course))) === false) {
        print_error('Course is misconfigured');
    }

    if (($cm = get_coursemodule_from_instance('rcontent', $rcontent->id, $course->id)) === false) {
        print_error('Course Module ID was incorrect');
    }
}
else {
    print_error('You must specify a course_module ID or an instance ID');
}

require_login($course);

$PAGE->set_title($rcontent->name);
$PAGE->set_heading($course->fullname);
$url = new moodle_url('/mod/rcontent/view.php', array('id' => $id)); // Base URL
$PAGE->set_focuscontrol('');
$PAGE->set_cacheable(true);

$PAGE->navbar->add(get_string('modulenameplural', 'rcontent'), new moodle_url('/mod/rcontent/index.php', array('id'=>$course->id)));
$PAGE->navbar->add($rcontent->name);
// Auth
$PAGE->set_url($url);
//call to autentification web services
require_once($CFG->dirroot.'/local/rcommon/WebServices/AuthenticateContent.php');
$rcontent->module = 'rcontent';
$rcontent->cmid = $cm->id;
$return = AuthenticateUserContent($rcontent);

if ($return->AutenticarUsuarioContenidoResult->Codigo <= 0 || !isset($return->AutenticarUsuarioContenidoResult->URL) || empty($return->AutenticarUsuarioContenidoResult->URL)){
	print_error(get_string('error_authentication','local_rcommon').$return->AutenticarUsuarioContenidoResult->Codigo.', '.$return->AutenticarUsuarioContenidoResult->Descripcion);
}

$url = $return->AutenticarUsuarioContenidoResult->URL;
$strexit=get_string('exitactivity','rcontent');
$exitlink = '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$rcontent->course.'" target="_parent" title="'.$strexit.'">'.$strexit.'</a> ';
$PAGE->set_button($exitlink.update_module_button($cm->id, $course->id, get_string('modulename', 'rcontent')));

if ($CFG->branch < 24) {
    $PAGE->requires->yui2_lib(array('utilities','container','dom-event','dom'));
}
$PAGE->requires->css('/mod/rcontent/iframe.css');


if($rcontent->popup == 1 ){
	$options = $rcontent->popup_options;

    if (textlib::strpos($options, ',height')!==false) {
        $options = textlib::substr($options, 0, textlib::strpos($options, ',height'));
    }
    $PAGE->requires->data_for_js('rcontentplayerdata', array('cwidth'=>str_replace('%','',$rcontent->width),
                                                              'cheight'=>str_replace('%','',$rcontent->height),
                                                              'popupoptions' => $options,
                                                              'courseid' => $rcontent->course,
                                                              'launch' => true,
                                                              'launch_url' => $url), true);
    echo $OUTPUT->header();
    $content = '<div class="rcontent-center"><a target="_blank" href="'.$url.'">'.get_string('popupblockedlinkname','rcontent').'</a></div>';
    echo $OUTPUT->box(get_string('popupblocked','rcontent',$content));

    $PAGE->requires->js('/mod/rcontent/view.js');
    $PAGE->requires->js_init_call('M.mod_rcontentform.init');

} else if($rcontent->frame == 1) {
	echo $OUTPUT->header();
	echo '<iframe height="'.$CFG->rcontent_framesize.'px" width="100%" src="'.$url.'" id="rcontent_iframe"> <a href="'.$url.'" target="_blank">Resource</a></iframe>';
	echo'<script type="text/javascript">
								 //<![CDATA[
								 function resizeEmbeddedHtml() {
								 //calculate new embedded html height size
								 objectheight = yui_getViewportHeight() - 130;
		  //the object tag cannot be smaller than a human readable size
				 if (objectheight < 200) {
					 objectheight = 200;
				 }
				 //resize the embedded html object
				 yui_setStyle("rcontent_iframe", "height", objectheight+"px");
				 yui_setStyle("rcontent_iframe", "width", "100%");
			  }

			  function yui_getViewportHeight(){
				if(typeof YAHOO != "undefined") {
					// Up to Moodle 2.3
					objectheight =  YAHOO.util.Dom.getViewportHeight();
				} else {
					YUI().use("node", function (Y) {
						objectheight = Y.one(document).get("winHeight");
					});
				}
				return objectheight;
			  }

			  function yui_setStyle (element, name, value){
				if(typeof YAHOO != "undefined") {
					// Up to Moodle 2.3
					YAHOO.util.Dom.setStyle(element, name, value);
				} else {
					YUI().use("node", function (Y) {
						var myNode = Y.one(document.getElementById(element));
						myNode.setStyle(name, value);
					});
				}
			  }

			  resizeEmbeddedHtml();
			  if(typeof YAHOO != "undefined") {
				  // Up to Moodle 2.3
				  YAHOO.widget.Overlay.windowResizeEvent.subscribe(resizeEmbeddedHtml);
			  } else {
				  YUI().use("event", function (Y) {
					Y.on("windowresize", resizeEmbeddedHtml);
				  });
			  }

			  //]]>
		   </script>';

} else if($rcontent->popup == 0 and $rcontent->frame == 2 ) {

    echo $OUTPUT->header();

    echo "<br /><iframe  id='embeddedhtml' width='100%' height='600' src='$url' frameborder='0' ></iframe>";

    echo'<script type="text/javascript">
                                 //<![CDATA[
                                 function resizeEmbeddedHtml() {
                                 //calculate new embedded html height size
                                 objectheight = yui_getViewportHeight() - 130;
          //the object tag cannot be smaller than a human readable size
                 if (objectheight < 200) {
                     objectheight = 200;
                 }
                 //resize the embedded html object
                 yui_setStyle("embeddedhtml", "height", objectheight+"px");
                 yui_setStyle("embeddedhtml", "width", "100%");
              }

              function yui_getViewportHeight(){
                if(typeof YAHOO != "undefined") {
                    // Up to Moodle 2.3
                    objectheight =  YAHOO.util.Dom.getViewportHeight();
                } else {
                    YUI().use("node", function (Y) {
                        objectheight = Y.one(document).get("winHeight");
                    });
                }
                return objectheight;
              }

              function yui_setStyle (element, name, value){
                if(typeof YAHOO != "undefined") {
                    // Up to Moodle 2.3
                    YAHOO.util.Dom.setStyle(element, name, value);
                } else {
                    YUI().use("node", function (Y) {
                        var myNode = Y.one(document.getElementById(element));
                        myNode.setStyle(name, value);
                    });
                }
              }

              resizeEmbeddedHtml();
              if(typeof YAHOO != "undefined") {
                  // Up to Moodle 2.3
                  YAHOO.widget.Overlay.windowResizeEvent.subscribe(resizeEmbeddedHtml);
              } else {
                  YUI().use("event", function (Y) {
                    Y.on("windowresize", resizeEmbeddedHtml);
                  });
              }

              //]]>
           </script>
        ';

} else {
 redirect($url,'',-1);
}

add_to_log($course->id, 'rcontent', 'view', "view.php?id=$cm->id", "$rcontent->id", $cm->id);

echo $OUTPUT->footer();
