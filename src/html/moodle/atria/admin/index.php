<?php

require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
	
if(!isadmin()) { exit; }

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
		<h2 class="headingblock header ">'.get_string('atriaadmin', 'atria').'</h2>
		<ul class="unlist">
			<li>
				<div class="coursebox clearfix">
					<div class="info" style="float:none;">
						<div class="name">
							<center><p>'.get_string('allkeysynctext', 'atria').'</p>
							<p style="color:red;">'.get_string('maybeslow', 'atria').'</p>
							<p><center><input onclick="document.location.href=\'getKeys.php\';" type="submit" value="'.get_string('keysyncbtn', 'atria').'" /></center></p>
							</center>
						</div>
					</div>
					<div class="summary"></div>
				</div>
				<div class="coursebox clearfix">
					<div class="info" style="float:none;">
						<div class="name">
							<center><p>'.get_string('publisherkeysync', 'atria').'</p>
							<p><center><input onclick="document.location.href=\'getPublisherData.php\';" type="submit" value="'.get_string('publisherkeysyncbtn', 'atria').'" /></center></p>
							</center>
						</div>
					</div>
					<div class="summary"></div>
				</div>
				<div class="coursebox clearfix">
					<div class="info" style="float:none;">
						<div class="name">
							<center><p>'.get_string('keymanager', 'atria').'</p>
							<p><center><input onclick="document.location.href=\'keyManager.php\';" type="submit" value="'.get_string('keymanagerbtn', 'atria').'" /></center></p>
							</center>
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