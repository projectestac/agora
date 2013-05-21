<?php

require('../../../config.php');
require_login();

$id = optional_param('id', 0, PARAM_INT);        // course_module ID, or

if ($id !== false) {
    if (($ws = $DB->get_record('rcommon_publisher', array('id' => $id))) === false) {
        print_error(get_string('nopublisher','block_rcommon'));
    }
}
else {
    print_error(get_string('nopublisher','block_rcommon'));
}

$block_name=get_string('rcommon','block_rcommon');

$navlinks = array( 
    array(
        'name' => $block_name,
        'link' => '',
        'type' => 'blockinstance'
    )
);
$navigation = build_navigation($navlinks);

$strexit='<a href="'.$CFG->wwwroot.'/" title="'.get_string('exit','block_rcommon').'">'.get_string('exit','block_rcommon').'</a>';
   
//MARSUPIAL *************** MODIFICAT - To show as admin option
//fcasanel @2011.07.29
require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup($id);
//admin_externalpage_print_header();

$PAGE->set_title($block_name);
$PAGE->set_heading(get_string('consumetitle','block_rcommon'));

$url = new moodle_url('/blocks/rcommon/WebServices/consume.php', array('id' => $id)); // Base URL
$PAGE->set_url($url);
//************** ORIGINAL
/*
 print_header_simple($block_name,'',$navigation,'','',true,$strexit,'');
 print_heading(get_string('consumetitle','block_rcommon'));
*/
//************** FI

// MARSUPIAL ************ AFEGIT -> Adding header
// 2012.11.17 @abertranb
echo $OUTPUT->header();
// ************ FI
echo '<h2 class="headingblock header ">'.$ws->name.' - '.get_string('marsupialcontent','block_rcommon').'</h2><br/><br/>';

echo get_string('consumewait','block_rcommon')."<br><br>";

/*call to autentification web services*/
require_once($CFG->dirroot.'/blocks/rcommon/WebServices/BooksStructure/get_books_structure.php');

$return = get_all_books_structure($id);

if ($return){
	echo '<br><br><br><b>'.get_string('consumefinish','block_rcommon').'</b>';
}else {
    print_error(get_string('consumeerror','block_rcommon'));	
}


//MARSUPIAL *************** MODIFICAT - To show as admin option
//sarjona @2011.09.14
echo '<br/><br/><input type="submit" onclick="document.location.href=\'../getBooks.php?id='.urlencode($id).'\'" value="'.get_string('back').'" />';
// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
// 2012.11.17 @abertranb
echo $OUTPUT->footer();
// ************ MODIFICAT
//admin_externalpage_print_footer();
// ************ FI
//*************** ORIGINAL
//print_footer();
//*************** FI 
 
