<?php
if (!defined('SECURITY_CONSTANT')) exit;

echo '<br /><b>Welcome to WIRIS Quizzes installation.</b><br /><br />';
echo '<form method="POST" action="./install.php">';
echo '<input type="hidden" name="step" value="1" />';
echo 'Select installation language: <select name="language">';

// Loading language list. Each language file has setted "$languageName" variable.
echo '<option value="en">English</option>';
$languageFileList = opendir('./install/lang/');

while (($languageFile = readdir($languageFileList)) !== false) {
	if ($languageFile != '.' and $languageFile != '..' and substr($languageFile, strlen($languageFile) - 4, 4) == '.php') {
		include('./install/lang/' . $languageFile);
		$shortLanguageName = substr($languageFile, 0, strlen($languageFile) - 4);
		echo '<option value="', utf8_htmlentities($shortLanguageName), '">', $languageName, '</option>';
	}
}

closedir($languageFileList);
echo '</select>';

//---------------

echo '<br /><br />';
echo '<input type="submit" value="Continue" />';
echo '</form>';

?>