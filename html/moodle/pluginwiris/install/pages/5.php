<?php
if (!defined('SECURITY_CONSTANT')) exit;

echo '<form action="./install.php" method="POST">';
echo '<input type="hidden" name="step" value="6" />';
echo '<input type="hidden" name="language" value="', addSlashesOnDoubleQuotes($shortLanguageName), '" />';

echo translate('Please, check that your Plugin WIRIS works well.'), '<br /><br />';
echo translate('Go to'), ' <a href=".." target="_blank">', translate('your'), ' moodle (', translate('this link will open it in new window'), ')</a> ', translate('and write a post in a forum, add a curse or make a personal page.'), '<br /><br />';
echo translate('When you are writting a post, you should see these buttons'), ':<br />';
echo '<img src="./install/img/toolbar.png"><br /><br />';
echo translate('Click in Formula Editor Button'), ' (<img src="./install/img/editorbutton.png">). ', translate('A new window should appear.'), '<br /><br />';
echo '<img src="./install/img/editor.png"><br /><br />';
echo translate("Write a formula and click 'Accept'."), '<br />';
echo '<img src="./install/img/htmlarea.png"><br /><br />';
echo translate('Does Plugin WIRIS work well?'), '<br /><br />';
echo '<input type="submit" name="option" value="', addSlashesOnDoubleQuotes(translate('Yes')), '" /> <input type="submit" name="option" value="' . addSlashesOnDoubleQuotes(translate('No')) . '" />';

echo '</form>';
?>