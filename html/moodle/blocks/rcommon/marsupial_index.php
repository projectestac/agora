<?php
//XTEC ************ FITXER AFEGIT - Added some useful links to main configuration screens to make easier for the users
//2011.06.20 @sarjona
require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');

require_login();

$pagetitle = get_string('marsupial', 'block_rcommon');
$strmarsupial = get_string('marsupial', 'block_rcommon');
$navlinks = array();
$navlinks[] = array('name' => $strmarsupial,
	'link' =>'#',
	'type' => 'misc');

$prefsbutton = "";
// Print title and header
// TODO: Revise navigation bar
$navigation = build_navigation($navlinks);
$site = get_site();
print_header("$site->shortname: $strmarsupial: $pagetitle", $strmarsupial, $navigation, '', '', true, $prefsbutton, user_login_string($site));

echo '<h2>'. get_string('marsupialtitle', 'block_rcommon').'</h2>';
echo '<ol>';

// Step 1. Sincronize the first user
echo '<li><a href="'.$CFG->wwwroot.'/atria/" target="_blank">'.get_string('atriausersync', 'block_rcommon').'</a><br/>';
echo '<span style="font-size:smaller">'.get_string('atriausersyncdesc', 'block_rcommon').'</span>';
echo '</li><br><br>';


// Step 1. Get the content provider information
echo '<li><a href="'.$CFG->wwwroot.'/atria/admin/getPublisherData.php" target="_blank">'.get_string('publisherkeysync', 'block_rcommon').'</a><br/>';
echo '<span style="font-size:smaller">'.get_string('publisherkeysyncdesc', 'block_rcommon').'</span>';
echo '</li><br><br>';


// Step 2. Download the books structure for each content provider
echo '<li>'.get_string('downloadbookstructurestitle','block_rcommon').'<br/>';
if ($publishers = get_records_select('rcommon_publisher', "urlwsbookstructure<>'".sql_empty()."'")){
    echo '<span style="font-size:smaller">'.get_string('downloadbookstructurespublisher', 'block_rcommon');
    echo '<ul>';
    foreach($publishers as $publisher){
        echo '<li><a href="'.$CFG->wwwroot.'/blocks/rcommon/WebServices/consume.php?id='.$publisher->id.'" target="_blank">'.$publisher->name.'</a></li>';
    }
    echo '</ul>';
    echo '<br/>'.get_string('downloadbookstructurespublisherwait', 'block_rcommon').'</span>';
}
echo '</li><br><br>';


// Step 3. Syncronize users
echo '<li>'.get_string('userkeys', 'block_rcommon').'<br/>';
    echo '<ul>';
    echo '<li><a href="'.$CFG->wwwroot.'/atria/admin/getKeys.php" target="_blank">'.get_string('alluserkeys', 'block_rcommon').'</a></li>';
    echo '<li><a href="'.$CFG->wwwroot.'/atria/admin/keyManager.php" target="_blank">'.get_string('keymanager', 'block_rcommon').'</a></li>';
    echo '</ul>';

echo '</li><br><br>';

echo '</ol>';


print_footer();

