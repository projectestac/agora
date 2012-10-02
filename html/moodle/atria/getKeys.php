<?php
require_once('../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/atria/atria.php');

if(!$site = get_site()) {
    redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

require_login();
if(!$site = get_site()) {
    redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

require_login();

$pagetitle = get_string('atriasync', 'atria');

$stratria = get_string('atria', 'atria');
$navlinks = array();
$navlinks[] = array('name' => $stratria,
	'link' =>'#',
	'type' => 'misc');

$prefsbutton = "";
// Print title and header
$navigation = build_navigation($navlinks);

//ATRIA *************** MODIFICAT - To show as admin option
//sarjona @2011.09.15
if(isadmin()){
    require_once($CFG->libdir.'/adminlib.php');
    admin_externalpage_setup('marsupialget_credentials');
    admin_externalpage_print_header();    
} else{
    print_header("$site->shortname: $stratria: $pagetitle", $stratria, $navigation, '', '', true, $prefsbutton, user_login_string($site));
}
//**************** ORIGINAL
/*
print_header("$site->shortname: $stratria: $pagetitle", $stratria, $navigation,
	'', '', true, $prefsbutton, user_login_string($site));
 */
//**************** FI


atriaSync($CFG->wwwroot.'/atria/getKeys.php');
//atriaSync($CFG->wwwroot.'/atria/getKeys.php', '', 'isbn_here');
echo '<div>
				<h2 class="headingblock header ">'.get_string('keysync', 'atria').'</h2>
				<ul class="unlist">
					<li>
						<div class="coursebox clearfix">
							<div class="info" style="float:none;">
								<div class="name">
									<p>'.get_string('atriasyncok', 'atria').'</p>
								</div>
							</div>
							<div class="summary"></div>
						</div>
					</li>
				</ul>
			</div>';

print_footer();
?>