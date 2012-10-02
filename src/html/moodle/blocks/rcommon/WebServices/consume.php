<?php

require('../../../config.php');

$id = optional_param('id', 0, PARAM_INT);        // course_module ID, or

if ($id !== false) {
    if (($ws = get_record('rcommon_publisher', 'id', $id)) === false) {
        error(get_string('nopublisher','blocks/rcommon'));
    }
}
else {
    error(get_string('nopublisher','blocks/rcommon'));
}

require_login();

$block_name=get_string('rcommon','blocks/rcommon');

$navlinks = array( 
    array(
        'name' => $block_name,
        'link' => '',
        'type' => 'blockinstance'
    )
);
$navigation = build_navigation($navlinks);

$strexit='<a href="'.$CFG->wwwroot.'/" title="'.get_string('exit','blocks/rcommon').'">'.get_string('exit','blocks/rcommon').'</a>';
   
//MARSUPIAL *************** MODIFICAT - To show as admin option
//fcasanel @2011.07.29
require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup($id);
admin_externalpage_print_header();
echo '<h2 class="headingblock header ">'.$ws->name.' - '.get_string('marsupialcontent','blocks/rcommon').'</h2><br/><br/>';
//************** ORIGINAL
/*
 print_header_simple($block_name,'',$navigation,'','',true,$strexit,'');
 print_heading(get_string('consumetitle','blocks/rcommon'));
*/
//************** FI


echo get_string('consumewait','blocks/rcommon')."<br><br>";

/*call to autentification web services*/
require_once($CFG->dirroot.'/blocks/rcommon/WebServices/BooksStructure/get_books_structure.php');

$return = get_all_books_structure($id);

if ($return){
	echo '<br><br><br><b>'.get_string('consumefinish','blocks/rcommon').'</b>';
}else {
    error(get_string('consumeerror','blocks/rcommon'));	
}


//MARSUPIAL *************** MODIFICAT - To show as admin option
//sarjona @2011.09.14
echo '<br/><br/><input type="submit" onclick="document.location.href=\'../getBooks.php?id='.urlencode($id).'\'" value="'.get_string('back').'" />';
admin_externalpage_print_footer();
//*************** ORIGINAL
//print_footer();
//*************** FI 
 
