<?php
// Load configuration constants
if(!isset($CFG)) {
    require_once('../../../config.php');
}
require_once($CFG->dirroot . '/filter/wiris/wrs_config.php');
require_once($CFG->dirroot . '/filter/wiris/lib/wrs_lang_inc.php');

// absolute url to the jar directory
$jardirurl = 'http://' . $CFG->wirisservicehost . ':' . $CFG->wirisserviceport . $CFG->wirisservicepath . '/codebase';

// get the character encoding
$charset = get_string("thischarset");
$lang = current_language();
$lang = substr($lang,0, 2);  //ignoring specific country code

require_js($CFG->wwwroot . '/filter/wiris/editor/wrs_editor.js.php');

$CFG->stylesheets[] = $CFG->wwwroot . '/filter/wiris/editor/wrs_dialog.css';

// Start the output.
print_header(wrs_get_string($lang, 'wirisformulaeditor'), '', '', '', '', true, '&nbsp;', '', false, 'onload="wrs_initDocument()"', false);

$applet = '<applet id="wirisdialog_applet" alt="Wiris Editor" width="100%" ';
$applet .= 'name="FormulaEditor" ';
$applet .= 'codebase="' . $jardirurl . '" ';
$applet .= 'archive="' . $CFG->wiriseditorarchive . '" ';
$applet .= 'code="' . $CFG->wiriseditorclass . '" ';
$applet .= '>';
$applet .= '<param name="lang" value="' . $lang . '" />';
$applet .= '<param name="menuBar" value="true"/>';

$params = array(
	'identMathvariant' => 'wirisimageidentmathvariant',
	'numberMathvariant' => 'wirisimagenumbermathvariant',
	'fontIdent' => 'wirisimagefontident',
	'fontNumber' => 'wirisimagefontnumber',
	'version' => 'wirisserviceversion'
);

foreach ($params as $key => $value) {
	if (isset($CFG->{$value})) {
		$applet .= '<param name="' . $key . '" value="' . $CFG->{$value} . '" />';
	}
}

if (isset($CFG->wirisimagefontranges)) {
	$wirisimagefontrangesCount = count($CFG->wirisimagefontranges);
	for ($i = 0; $i < $wirisimagefontrangesCount; ++$i) {
		$applet .= '<param name="font' . $i . '" value="' . $CFG->wirisimagefontranges[$i] . '" />';
	}
}

$applet .= '<p>You need JAVA&reg; to use WIRIS tools.<br />FREE download from <a target="_blank" href="http://www.java.com">www.java.com</a></p>';
$applet .= '</applet>';
echo $applet;

echo '
				<div id="wirisdialog_controls">
					<a id="manualLink" href="http://www.wiris.com/portal/docs/editor-manual" target="_blank">Manual &gt;&gt;</a>
					<button id="button_Ok">';
						echo wrs_get_string($lang, 'ok');
					echo'</button>
					<button id="button_Cancel">';
						echo wrs_get_string($lang, 'cancel');
					echo'</button>
				</div>
			</div>
		</div>
	</body>
</html>';