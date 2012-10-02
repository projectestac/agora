<?php
/*
 * This file replaces the moodle/help.php for wiris quizzes help pages. This is
 * done so that we can mantain help files inside moodle/wiris-quizzes/ folder.
 */
    require_once('../config.php');
    require_once('wrsqz_config.php');
    require_once($CFG->dirroot . '/lib/moodlelib.php');
    
    $file   = optional_param('file', '', PARAM_PATH);
    $module = optional_param('module', 'moodle', PARAM_TEXT);
    $lang = optional_param('forcelang','',PARAM_TEXT);

    print_header(get_string('help'));
    print_box_start();
    if($lang == ''){
        $lang = current_language();
    }
    $lang = substr($lang,0,2) . '_utf8'; //ignore derived languages (like es_es_utf8)
    if (file_exists($CFG->dirroot . '/wiris-quizzes/lang/' . $lang . '/help/'. $file)){
        //display language specific file
        include($CFG->dirroot . '/wiris-quizzes/lang/' . $lang . '/help/'. $file);
    }else if(file_exists($CFG->dirroot . '/wiris-quizzes/lang/en_utf8/help/'. $file)){
        //display english file
        include($CFG->dirroot . '/wiris-quizzes/lang/en_utf8/help/'. $file);
    }else{//file not found. Return default help
        echo 'This is a WIRIS quizzes feature. Please go to '.
		'<a href="http://www.wiris.com/quizzes/docs/manual"> WIRIS quizzes user manual</a> for more information.';
    }
    
    print_box_end();
    close_window_button();
    //print_footer('none');

?>
