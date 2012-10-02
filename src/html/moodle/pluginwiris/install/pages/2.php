<?php
if (!defined('SECURITY_CONSTANT')) exit;

if (isset($_POST['option']) and $_POST['option'] == translate('Yes')) {
	echo '<form action="./install.php" method="POST">';
	echo '<input type="hidden" name="step" value="3" />';
	echo '<input type="hidden" name="language" value="', addSlashesOnDoubleQuotes($shortLanguageName), '" />';
	
	echo translate('Do you want to install Plugin WIRIS in your moodle?'), '<br /><br />';
	echo '<input type="submit" name="option" value="', addSlashesOnDoubleQuotes(translate('Yes')), '" /> <input type="submit" name="option" value="', addSlashesOnDoubleQuotes(translate('No')), '" /><br />';
	
	// Proxy connection
	echo '<div class="big_form">';
	echo '<input type="checkbox" id="enableProxy" name="proxy" onclick="showDiv(\'proxyForm\', this.checked);" /> ', translate('Use proxy connection.');
	echo '<div id="proxyForm" class="sub_form" style="display: none;">';
	echo '<label for="proxy_host">Host:</label>';
	echo '<input type="text" name="proxy_host" /><br />';
	echo '<label for="proxy_port">', translate('Port'), ':</label>';
	echo '<input type="text" name="proxy_port" /><br /><br />';
	echo '</div>';
	
	echo '
	<script type="text/javascript">
		
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
			if (textboxes[i].type == "text" || textboxes[i].type == "password") {
				textboxes[i].style.width = "300px";
			}
		}
		
		showDiv("proxyForm", document.getElementById("enableProxy").checked);
	</script>
	';
	echo '</div>';
	
	echo '<div id="information">';
	
	echo translate('If you click on "Yes"'), ':';
	echo '<ul>';
	echo '<li>wiriseditor.zip ', translate('will be downloaded on'), ' ./editor/jar/</li>';
	echo '<li>wiriseditor.zip ', translate('will be extracted on'), ' ./editor/jar/</li>';
	echo '<li>../lib/weblib.php ', translate('will be backuped to'), ' ../lib/weblib.php.old</li>';
	echo '<li>../lib/weblib.php ', translate('will be modified'), '</li>';
	echo '</ul>';
	
	echo translate('If you click no "No"'), ':';
	echo '<ul>';
	echo '<li>', translate('Manual installation will be able'), '</li>';
	echo '</ul>';
	
	echo '</div>';
}
else {
	echo errorMessage();
}
?>