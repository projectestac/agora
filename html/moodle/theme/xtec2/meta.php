<!--[if gte IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->themewww .'/'. current_theme() ?>/styles_ie7.css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->themewww .'/'. current_theme() ?>/styles_ie6.css" />
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo $CFG->themewww .'/'. current_theme() ?>/print.css" media="print" />
<?php
if(file_exists($CFG->dataroot.'/1/theme/styles_personal.css')){
	echo '<link rel="stylesheet" type="text/css" href="'.$CFG->wwwroot.'/file.php/1/theme/styles_personal.css" />';
}
?>


<script type="text/javascript">
	var brow = navigator.userAgent+'';
	if(brow.indexOf("WebKit") !== -1)
		document.write('<link rel="stylesheet" type="text/css" href="<?php echo $CFG->themewww .'/'. current_theme() ?>/styles_webkit.css" />');
	else if(brow.indexOf("Gecko") !== -1)
		document.write('<link rel="stylesheet" type="text/css" href="<?php echo $CFG->themewww .'/'. current_theme() ?>/styles_gecko.css" />');
</script>
