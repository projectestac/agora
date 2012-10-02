<?PHP  // $Id: preview_jclic.php,v 1.4 2011-05-25 12:13:03 sarjona Exp $
/// This page prints jclic activity

    require_once("../../../config.php");
    require_once("../lib.php");
    $id = required_param('id', PARAM_INT);             // Course Module ID
    $jclic_project = required_param('project');  // JClic URL
    $jclic_name = str_replace('\\\'', '\'', (optional_param('name', 'JClic')));
    $jclic_width = optional_param('width', '600');  
    $jclic_height = optional_param('height', '400');  
    
    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }
    
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
    
        if (! $jclic = get_record("jclic", "id", $cm->instance)) {
            error("Course module is incorrect");
        }
    } 
    require_login($course->id);  
    print_header("$course->shortname: $jclic_name", "$jclic_name", "");

    echo "<script language=\"JavaScript\" src=\"$CFG->jclic_jclicpluginjs\" type=\"text/javascript\"></script>";
    echo '<div style="text-align:center;padding-top:10px;">';
    echo '<script language="JavaScript">';
    echo "setSkin('$jclic->skin');";
    echo "writePlugin('".$jclic_project."', '$jclic_width', '$jclic_height');";
    echo "</script>";
    echo '</div>';

	
?>		
