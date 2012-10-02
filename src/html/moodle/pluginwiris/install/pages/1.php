<?php
if (!defined('SECURITY_CONSTANT')) exit;

echo '<form action="./install.php" method="POST">';					
echo '<input type="hidden" name="step" value="2" />';
echo '<input type="hidden" name="language" value="', addSlashesOnDoubleQuotes($shortLanguageName), '" />';

include('../version.php');
echo translate('Your moodle version is'), ' ', $version, ', ', translate('release'), ' ', $release, '<br />';
echo '<p>', translate('Is it correct?'), '<br /><br />';
echo '<input type="submit" name="option" value="', addSlashesOnDoubleQuotes(translate('Yes')), '" /> <input type="submit" name="option" value="', addSlashesOnDoubleQuotes(translate('No')), '" /></p>';
echo '</form>';
?>