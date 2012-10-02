<?php
// Load configuration constants
if(!isset($CFG)){
  require_once('../../config.php');
}
require_once($CFG->dirroot . '/pluginwiris/wrs_config.php');
require_once($CFG->dirroot . '/pluginwiris/lib/wrs_lang_inc.php');

// absolute url to the jar directory
$jardirurl = 'http://' . $CFG->wirisservicehost . ':' . $CFG->wirisserviceport . $CFG->wirisservicepath . '/codebase';

// get the character encoding
$charset = get_string("thischarset");
$lang = current_language();
$lang = substr($lang,0, 2);  //ignoring specific country code
?>

<html>
<head>
<title><?php echo wrs_get_string($lang, 'wirisformulaeditor');?></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/pluginwiris/editor/wrs_dialog.css"/>
<script type="text/javascript">
  lang = "<?php echo $lang ?>";
	<?php 
		include('wrs_editor.js'); 
		echo "\n";
	?>
</script>
</head>

<body onload="wrs_initDocument()">

<!-- Outer Table -->
<table class="wirisdialog_outer" width="100%" height="100%" cellpadding="0" cellspacing="0">
<tbody>

<!-- Formula Editor Applet -->
<tr><td class="wirisdialog_applet" colspan="2">
<?php
  $applet = '<applet alt="Wiris Editor" ';
  $applet .= 'name="' . 'FormulaEditor' . '" ';
  $applet .= 'codebase="' . $jardirurl . '" ';
  $applet .= 'archive="' . $CFG->wiriseditorarchive . '" ';
  $applet .= 'code="' . $CFG->wiriseditorclass . '" ';
  $applet .= 'width="' . '100%' . '" ';
  $applet .= 'height="' . '100%' . '"'; 
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
?>
</td></tr>

<!-- Controls -->
<tr><td id="wirisdialog_controls">
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="wirisdialog_controls1">
<!-- <button id="button_Remove"><?php echo wrs_get_string($lang, 'remove');?></button> -->
</td>
<td class="wirisdialog_controls2">
<a id="manualLink" href="http://www.wiris.com/portal/docs/editor-manual" target="_blank">Manual &gt;&gt;</a>
<button id="button_Ok"><?php echo wrs_get_string($lang, 'ok');?></button>
<button id="button_Cancel"><?php echo wrs_get_string($lang, 'cancel');?></button>
</td></tr>
</tbody></table>
</td></tr>
</tbody>
</table>

</body>
</html>