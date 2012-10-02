<?php
if (!defined('SECURITY_CONSTANT')) exit;

echo '<form action="./install.php" method="POST">';					
echo '<input type="hidden" name="step" value="2" />';
echo '<input type="hidden" name="language" value="', utf8_htmlentities($shortLanguageName), '" />';

include('../version.php');
echo utf8_htmlentities(translate('Your moodle version is') . ' ' . $version . ', ' . translate('release') . ' ' . $release), '<br />';
echo '<p>', utf8_htmlentities(translate('Is it correct?')), '<br /><br />';
echo '<input type="submit" name="option" value="', utf8_htmlentities(translate('Yes')), '" /> <input type="submit" name="option" value="', utf8_htmlentities(translate('No')), '" /></p>';
echo '</form>';
?>