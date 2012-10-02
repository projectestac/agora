<?php

require_once('../config.php');
require_once($CFG->dirroot.'/course/lib.php');

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
print_header("$site->shortname: $stratria: $pagetitle", $stratria, $navigation,
	'', '', true, $prefsbutton, user_login_string($site));

//key synchronization
echo '<center><br />
		<div>
			<h2 class="headingblock header ">'.get_string('keysync', 'atria').'</h2>
			<ul class="unlist">
				<li>
					<div class="coursebox clearfix">
						<div class="info" style="float:none;">
							<div class="name">
								<p>'.get_string('keysynctext', 'atria').'</p>
								<p><center><input onclick="document.location.href=\'getKeys.php\';" type="submit" value="'.get_string('keysyncbtn', 'atria').'" /></center></p>
							</div>
						</div>
						<div class="summary"></div>
					</div>
				</li>
			</ul>
		</div>
		</center>
		';

print_footer();

?>