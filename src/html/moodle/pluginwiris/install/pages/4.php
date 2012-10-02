<?php
if (!defined('SECURITY_CONSTANT')) exit;

if (parseConfig() == NO_WRITE_PERMISION) {
	echo translate("Plugin WIRIS Installer hasn't write permisions on"), ' ./wrs_config.php<br /><br />';
	echo errorMessage('conf');
}
else {
	echo '<form name="installerForm" action="./install.php" method="POST">';
	echo '<input type="hidden" name="step" value="5" />';
	echo '<input type="hidden" name="language" value="', addSlashesOnDoubleQuotes($shortLanguageName), '" />';
	
	echo translate('Plugin WIRIS installation has been completed.'), '<br /><br />';
	echo translate('Important! Now, you must manually activate WIRIS filter in your moodle setup'), ':<br /><br />';
	echo translate('For'), ' moodle 1.6.5, ', translate('go to'), '<b>Administration &gt; Configuration &gt; Filters</b>.<br />';
	echo translate('For'), ' moodle >= 1.7, ', translate('go to'), '<b>Administration &gt; Modules &gt; Filters</b>.<br /><br />';
	echo translate('Then, check WIRIS filter as like this'), ':<br />';
	echo '<img src="./install/img/filter.jpeg" /><br /><br />';
	echo '<input type="checkbox" id="activated" />', translate("I've just activated WIRIS"), '<br /><br />';
	
	echo '
	<script type="text/javascript">
		function submitForm() {
			if (document.getElementById("activated").checked) {
				document.installerForm.submit();
			}
			else {
				alert("', translate('Important! Now, you must manually activate WIRIS filter in your moodle setup'), '");
			}
		}
	</script>';
	
	echo '<input type="button" value="', addSlashesOnDoubleQuotes(translate('Continue')), '" onclick="submitForm();" />';
}
?>