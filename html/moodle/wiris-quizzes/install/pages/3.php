<?php
if (!defined('SECURITY_CONSTANT')) exit;

$howeverInstall = false;
$tag = null;

if (isset($_POST['restore'])) {
	if (file_exists($CFG->dirroot . '/lib/questionlib.php.old') && file_exists($CFG->dirroot . '/question/question.php.old')){
		if (copy('../lib/questionlib.php.old', '../lib/questionlib.php')) {
			if (copy('../question/question.php.old', '../question/question.php')){
				$howeverInstall = true;
			}
			else{
				echo utf8_htmlentities(translate("WIRIS Quizzes Installer hasn't write permisions on")), ' ../question/question.php<br /><br />';
				$tag = 'acthtml';
			}
		}
		else {
			echo utf8_htmlentities(translate("WIRIS Quizzes Installer hasn't write permisions on")), ' ../lib/questionlib.php<br /><br />';
			$tag = 'acthtml';
		}
	}
	else{
		echo 'Any of backup files /lib/questionlib.php.old or /lib/questionlib.php.old doesn\'t exist, and therefore cannot be restored.';
		$tag = 'acthtml';
	}
}

if ((isset($_POST['option']) and $_POST['option'] == translate('Yes')) or $howeverInstall) {
	if (copyQuestionTypes()){
		/*if(copyLangFiles()){*/
		$response = parseQuestionLib();
		
		if ($response == ALL_WELL) {
			$response = parseQuestion();
			
			if ($response == ALL_WELL) {
				echo '<form action="./install.php" method="POST">';
				echo '<input type="hidden" name="step" value="4" />';
				echo '<input type="hidden" name="language" value="', utf8_htmlentities($shortLanguageName), '" />';

				if (file_exists('./wrsqz_config.php')) {
					include('./wrsqz_config.php');
				}
				else {
					$CFG->wirisquizzes_serverhost = 'services.wiris.com';
					$CFG->wirisquizzes_serverport = 80;
					$CFG->wirisquizzes_serverpath = '/quizzes/qwirisservlet';

					//$CFG->wirisquizzes_extension = 'W';
					//$CFG->wirisquizzes_CAScode = '<session version="2.0" lang="es"><library closed="false"><mtext style="color:#ffc800" xml:lang="es">variables</mtext><group><command><input><math xmlns="http://www.w3.org/1998/Math/MathML"/></input></command></group></library></session>';
					
					$CFG->wirisquizzes_imagedir = 'wiris-quizzes/imagecache';
					
					//Plot images style options.
					$CFG->wirisquizzes_plotborderstyle = 'solid';
					$CFG->wirisquizzes_plotborderwidth = '1px';
					$CFG->wirisquizzes_plotbordercolor = '#8888ff';
					$CFG->wirisquizzes_plotmargin = '5px';
				}
				
				echo '<div class="big_form">';
				echo utf8_htmlentities(translate('Choose your WIRIS Quizzes service server')), '<br/> ';
				
				
				$servers = array();
				$dirList = opendir("./install/servers/");
				
				while ($itemReaded = readdir($dirList)) {
					if ($itemReaded != '.' and $itemReaded != '..' and substr($itemReaded, -4) == '.php') {
						$server= new stdClass();
						include('./install/servers/' . $itemReaded);
						$servers[$server->name]=$server;
					}
				}
				
				closedir($dirList);
				sort($servers);		// Sort by server name, alphabetically, and replaces the index by a integer starting from 0.
				
				foreach ($servers as $code => $server) {
					echo '<input type="hidden" id="'.utf8_htmlentities($code).'.host" value="'.utf8_htmlentities($server->host).'" />';
					echo '<input type="hidden" id="'.utf8_htmlentities($code).'.port" value="'.utf8_htmlentities($server->port).'" />';
					echo '<input type="hidden" id="'.utf8_htmlentities($code).'.path" value="'.utf8_htmlentities($server->path).'" />';
				}
				
				echo '<select name="server" onclick="prepareSelect(this);">';
				
				foreach ($servers as $code => $server) {	
					echo '<option value="', utf8_htmlentities($code), '">', utf8_htmlentities($server->name), '</option>';
				}
				
				echo '<option value="own">', utf8_htmlentities(translate('Use your own server')), '</option>';
				echo '</select>';
				
				echo '<div id="serverForm" class="sub_form" style="display: none;">';
				echo '<label for="host">WIRIS Quizzes server host</label> <input type="text" id="host" name="host" value="', utf8_htmlentities($CFG->wirisquizzes_serverhost), '" /><br />';
				echo '<label for="port">WIRIS Quizzes server port</label> <input type="text" id="port" name="port" value="', utf8_htmlentities($CFG->wirisquizzes_serverport), '" /><br />';
				echo '<label for="path">WIRIS Quizzes server path</label> <input type="text" id="path" name="path" value="', utf8_htmlentities($CFG->wirisquizzes_serverpath), '" /><br />';
				echo '</div>';
				
				echo '</div>';
				
				echo '
				<script type="text/javascript">
					function prepareSelect(selectObject) {
						if (selectObject.value == "own") {
							showDiv("serverForm", true);
						}
						else {
							showDiv("serverForm", false);
							
							hostInput = document.getElementById(selectObject.value + ".host");
							portInput = document.getElementById(selectObject.value + ".port");
							pathInput = document.getElementById(selectObject.value + ".path");
							
							document.getElementById("host").value = hostInput.value;
							document.getElementById("port").value = portInput.value;
							document.getElementById("path").value = pathInput.value;
						}
					}
					
					function showDiv(divID, visible) {
						if (visible) {
							document.getElementById(divID).style.display = "block";
						}
						else {
							document.getElementById(divID).style.display = "none";
						}
					}
					
					var textboxes = document.getElementsByTagName("input");
					
					for (var i = 0; i < textboxes.length; ++i) {
						if (textboxes[i].type == "text") {
							textboxes[i].style.width = "300px";
						}
					}
				</script>
				';

				echo '<input type="submit" value="', utf8_htmlentities(translate('Continue')), '" />';
				
				echo '<div id="information">';
				echo utf8_htmlentities(translate("If you click on 'Continue'")), ':<br />';
				echo '<ul>';
				echo '<li>', utf8_htmlentities(translate('A new')), ' wrsqz_config.php ', utf8_htmlentities(translate('will be created on')), ' ./</li>';
				echo '</ul>';
				echo '</div>';
				
				echo '</form>';
			}
			else if ($response == UNKNOWN_VERSION) {
				echo utf8_htmlentities(translate('Your moodle version is unknown for WIRIS Quizzes Installer. Please, install it manually.')), '<br /><br />';
				echo errorMessage('acthtml');
			}
			else if ($response == NO_WRITE_PERMISION) {
				echo utf8_htmlentities(translate("WIRIS Quizzes Installer hasn't write permisions on")), ' ../question/question.php<br /><br />';
				echo errorMessage('acthtml');
			}
			else if ($response == NO_READ_PERMISION) {
				echo utf8_htmlentities(translate("WIRIS Quizzes Installer hasn't read permisions on")), ' ../question/question.php<br /><br />';
				echo errorMessage('acthtml');
			}
			else if ($response == ALREADY_PARSED) {
				printReinstall();
			}
		}
		else if ($response == UNKNOWN_VERSION) {
			echo utf8_htmlentities(translate('Your moodle version is unknown for WIRIS Quizzes Installer. Please, install it manually.')), '<br /><br />';
			echo errorMessage('acthtml');
		}
		else if ($response == NO_WRITE_PERMISION) {
			echo utf8_htmlentities(translate("WIRIS Quizzes Installer hasn't write permisions on")), ' ../lib/questionlib.php<br /><br />';
			echo errorMessage('acthtml');
		}
		else if ($response == NO_READ_PERMISION) {
			echo utf8_htmlentities(translate("WIRIS Quizzes Installer hasn't read permisions on")), ' ../lib/questionlib.php<br /><br />';
			echo errorMessage('acthtml');
		}
		else if ($response == ALREADY_PARSED) {
			printReinstall();
		}
	
		/*}else {
			echo utf8_htmlentities(translate('Error while copying directories from') . ' ./lang/ ' . translate('to') . translate(' your moodle language directories.')), '<br/>';
			echo errorMessage('req2');
		}*/
	}else {
		echo utf8_htmlentities(translate('Error while copying directories from') . ' ./questiontypes/ ' . translate('to') . ' ../question/type/'), ' Probably the Quizzes WIRIS installer has not write permissions on ../question/type/','<br/>';
		echo errorMessage('req2');
	}
}
else {
	echo errorMessage($tag);
}
function printReinstall(){
	echo '<div align="left">';
	echo '<form action="./install.php" method="POST">';
	echo '<input type="hidden" name="step" value="3" />';
	echo '<input type="hidden" name="language" value="', utf8_htmlentities($shortLanguageName), '" />';
	echo '<br>';
	echo utf8_htmlentities(translate('WIRIS Quizzes is already installed.'));
	echo '<ul><li>';
	echo utf8_htmlentities(translate('If you want to upgrade from a previous version or reinstall it, please click to Reinstall button.')),'<br />';
	
	echo '<div align="center"><br /><input type="submit" name="restore" value="', utf8_htmlentities(translate('Reinstall')), '"><br /><br /></div>';
	echo '</li><li>';
	echo utf8_htmlentities(translate('If you want to uninstall the currently installed WIRIS Quizzes manually, please see the ')),'<a href="http://www.wiris.com/quizzes/docs/install/uninstall">', utf8_htmlentities(translate('uninstall documentation')), '</a>.';
	echo '</li></ul>';
	
	//echo errorMessage('acthtml');
	echo '<br />';
	echo '<div id="information">';
	echo 'If you click to Reinstall button...';
	echo '<ul>';
	echo '<li>../question/question.php.old ', utf8_htmlentities(translate('will be restored to')), ' ../question/question.php</li>';
	echo '<li>../lib/questionlib.php.old ', utf8_htmlentities(translate('will be restored to')), ' ../lib/questionlib.php</li>';
	echo '</ul>';
	echo '</div>';
	echo '</form>';
	echo '</div>';
}
?>