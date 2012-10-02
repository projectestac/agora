<?php
// Load configuration constants
if(!isset($CFG)){
  require_once('../../config.php');
}
require_once($CFG->dirroot . '/pluginwiris/wrs_config.php');
require_once($CFG->dirroot . '/pluginwiris/lib/wrs_lang_inc.php');

// get the character encoding
$charset = get_string("thischarset");
// language list

$s = trim($CFG->wiriscaslang);
if($s)
{
  $list = explode(",", $s);
  $langlist = array();
  foreach($list as $i=>$value)
  {
    $v = trim($value);
    if($v)
    {
      $langlist[$i] = $v;
    }
  }
}
else
{
  $langlist = array();
}
?>

<html>
<head>
<title>Wiris CAS</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/pluginwiris/editor/wrs_dialog.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/pluginwiris/editor/wrs_casdialog.css"/>
<script type="text/javascript">
	<?php include('wrs_cas.js.php');?>
	
</script>

<body onload="wrs_initDocument()">

<!-- Outer Table -->
<table class="wirisdialog_outer" width="100%" height="100%" cellpadding="0" cellspacing="0"><tbody>

<!-- Applet -->
<tr><td id="appletcontainer" class="wirisdialog_applet" colspan="2">

</td></tr>

<!-- Options -->
<tr><td id="wirisdialog_options">
<form name="optionForm">
<table cellpadding="0" cellspacing="0"><tbody><tr>
	<!-- Dimension -->
	<td id="dimensionpane">
	<table cellpadding="0" cellspacing="0"><tbody>
	<tr><td id="width_label"><?php echo wrs_get_string($lang, 'width');?></td><td id="width_value"><input type="text" name="width"></td></tr>
	<tr><td id="height_label"><?php echo wrs_get_string($lang, 'height');?></td><td id="height_value"><input type="text" name="height"></td></tr>
	</tbody></table>
	</td>
<?php if($langlist && count($langlist) > 1) { ?>
	<!-- Language -->
	<td id="langpane">
	<table cellpadding="0" cellspacing="0"><tbody>
	<tr><td id="lang_label"><?php echo wrs_get_string($lang, 'language');?></td></tr>
	<tr><td id="lang_value">
		<select name="language">
<?php
		foreach($langlist as $i)
		{
		  echo('<option value="' . $i . '">' . $i . '</option>');
		}
?>
		</select>
	</td></tr>
	</tbody></table>
	</td>
<?php }	else { ?>
	  <td id="langpane">&nbsp;</td>
<?php } ?>
	<!-- params -->
	<td id="paramspane">
	<table cellpadding="0" cellspacing="0"><tbody>
	<tr>
	<td><input type="checkbox" name="executeonload"><?php echo wrs_get_string($lang, 'executeonload');?></td>
	<td><input type="checkbox" name="toolbar"><?php echo wrs_get_string($lang, 'showtoolbar');?></td>
	</tr><tr>
	<td><input type="checkbox" name="focusonload"><?php echo wrs_get_string($lang, 'focusonload');?></td>
	<td><input type="checkbox" name="level"><?php echo wrs_get_string($lang, 'elementarymode');?></td>
	</tr>
	</tbody></table>
	</td>
</tr></tbody></table>
</form>
</td></tr> 

<!-- Controls -->
<tr><td id="wirisdialog_controls">
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="wirisdialog_controls1">
<button id="button_Apply"><?php echo wrs_get_string($lang, 'apply');?></button>
<!-- <button id="button_Remove"><?php echo wrs_get_string($lang, 'remove');?></button> -->
</td>
<td class="wirisdialog_controls2">
<button id="button_Ok"><?php echo wrs_get_string($lang, 'ok');?></button>
<button id="button_Cancel"><?php echo wrs_get_string($lang, 'cancel');?></button>
</td></tr>
</tbody></table>
</td></tr>

</tbody></table>
</td></tr>
</html>