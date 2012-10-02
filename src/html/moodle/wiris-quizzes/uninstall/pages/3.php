<?php
require_once($CFG->dirroot . '/lib/ddllib.php');
require_once($CFG->dirroot . '/wiris-quizzes/wrsqz_config.php');
if (!defined('SECURITY_CONSTANT')) exit;
$ok = true;    
echo '<div align="left">';  
if (isset($_POST['uninstall']) and ($_POST['uninstall'] == 'true')) {
	echo '<br /><br />';
	echo '<b>'.utf8_htmlentities(translate('Uninstalling WIRIS Quizzes...')).'</b>';
	echo '<ul><li>'.utf8_htmlentities(translate('Removing question types: '));
	$ok= wrsqz_printSuccess(wrsqz_removeQuestionTypes());
	echo '</li><li>'.utf8_htmlentities(translate('Removing language files: '));
	$ok= wrsqz_printSuccess(wrsqz_removeLangFiles()) and $ok;
	echo '</li><li>'.utf8_htmlentities(translate('Restoring patched files: '));
	$ok= wrsqz_printSuccess(wrsqz_restoreMoodleFiles()) and $ok;
	echo '</li><li>'.utf8_htmlentities(translate('Removing moodledata files: '));
	$ok = wrsqz_printSuccess(wrsqz_removeMoodledataFiles()) and $ok;
    echo '</li></ul><br /><br/>';

}
if (isset($_POST['deletetables']) and $_POST['deletetables']=='true'){
	echo '<b>'.utf8_htmlentities(translate('Modifying database...')).'</b>';
	echo '<ul><li>'.utf8_htmlentities(translate('Deleting tables: '));
	$ok=wrsqz_printSuccess(wrsqz_deleteTables()) and $ok;
	echo '</li></ul><br /><br/>';
}
if (isset($_POST['deletefiles']) and $_POST['deletefiles']=='true'){
	echo '<b>'.utf8_htmlentities(translate('Deleting WIRIS Quizzes files...')).'</b>';
	echo '<ul><li>'.utf8_htmlentities(translate('Deleting /wiris-quizzes folder: '));
	$ok=wrsqz_printSuccess(wrsqz_deleteFiles()) and $ok;
	echo '</li></ul><br /><br/>';
}
echo '</div>';

if (!$ok){
	echo '<b>'.utf8_htmlentities(translate('There were problems during the uninstall process. Please uninstall WIRIS Quizzes manually. See the ')).'<a href="http://www.wiris.com/quizzes/docs/install/uninstall">'.utf8_htmlentities(translate('uninstall documentation')).'</a>.</b>';
}else{
	echo '<b>'.utf8_htmlentities(translate('WIRIS Quizzes successfully uninstalled')).'</b><br /><br />';
	echo '<div align="center"><a href="' . $CFG->wwwroot . '">' . utf8_htmlentities(translate('Return to Moodle')).'</a></div>';
}


function wrsqz_printSuccess($success){
	if($success) {
		echo '<font color="green" >'.utf8_htmlentities(translate('OK')). '</font>';
	} else {
		echo '<font color="red" >'.utf8_htmlentities(translate('FAIL')).'</font>';
	}
	return $success;
}
function wrsqz_removeQuestionTypes(){
	global $CFG;
	$wirisTypes = array(
		'shortanswerwiris', 
		'truefalsewiris', 
		'matchwiris', 
		'multichoicewiris', 
		'essaywiris',
        'multianswerwiris'
	);
	$ok=true;
	foreach($wirisTypes as $type){
		if($ok and !deleteDirectory($CFG->dirroot .'/question/type/'.$type)){
			$ok=false;
		}
	}
	return $ok;
}
function wrsqz_removeLangFiles(){
	global $CFG;
	
	$ok=true;
	if (is_dir($CFG->dirroot .'/lang')){
		$dirList = opendir($CFG->dirroot .'/lang');
		while (($itemReaded = readdir($dirList))!==false) {
			if ($itemReaded != '.' and $itemReaded != '..'){
				$langDir = $CFG->dirroot .'/lang/'.$itemReaded.'/help/wiris-quizzes';
				if (is_dir($langDir)){
					$ok= deleteDirectory($langDir) and $ok;
				}
			}
		}
	}
	
	if (is_dir($CFG->dataroot .'/lang')){
		$dirList = opendir($CFG->dataroot .'/lang');
		while (($itemReaded = readdir($dirList))!==false) {
			if ($itemReaded != '.' and $itemReaded != '..'){
				$langDir = $CFG->dataroot .'/lang/'.$itemReaded.'/help/wiris-quizzes';
				if (is_dir($langDir)){
					$ok= deleteDirectory($langDir) and $ok;
				}
			}
		}
	}
	
	return $ok;
}

function wrsqz_restoreMoodleFiles(){
	global $CFG;
	
	$patchedFiles=array( 
		$CFG->dirroot .'/question/question.php', 
		$CFG->dirroot .'/lib/questionlib.php'
	);
	
	$ok=true;
	foreach($patchedFiles as $file){
		if (file_exists($file.'.old')){
			$ok= copy($file.'.old', $file) and $ok;
			if ($ok){
				unlink($file.'.old');
			}
		}else{
			$ok=false;
		}
	}
	return $ok;
}

//Delete folder
function deleteDirectory($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir) || is_link($dir)) return unlink($dir);
    foreach (scandir($dir) as $item) {
		if ($item == '.' || $item == '..') continue;
        //chmod($dir . "/" . $item, 0777);
        deleteDirectory($dir . "/" . $item);
    }
    return rmdir($dir);
}

function wrsqz_deleteTables(){
	global $CFG;
	$tables = array(
		'question_shortanswerwiris',
		'question_matchwiris',
		'question_multichoicewiris',
		'question_essaywiris',
		'question_truefalsewiris',
        'question_multianswerwiris',
		'question_wessaprom',
		'question_wmatprom',
		'question_wmultiprom',
		'question_wshanprom',
		'question_wtrflsprom',
        'question_wmansprom'
	);
	$ok=true;
	foreach($tables as $table){
		$xmldbtable=new XMLDBTable($table);
		if(table_exists($xmldbtable)){
			if(!drop_table($xmldbtable, true, false)){
				$ok=false;
			}
		}
	}
	return $ok;
}
function wrsqz_deleteFiles(){
	global $CFG;
	return deleteDirectory($CFG->dirroot. '/wiris-quizzes');
}
function wrsqz_removeMoodledataFiles(){
    global $CFG;
    return deleteDirectory($CFG->dataroot . '/' . $CFG->wirisquizzes_imagedir);
}
?>