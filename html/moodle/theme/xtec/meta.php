<!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie7.css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie6.css" />
<![endif]-->

<?php

if(file_exists($CFG->dataroot.'/1/theme/styles_layout.css')){
	echo '<link rel="stylesheet" type="text/css" href="'.$CFG->wwwroot.'/file.php/1/theme/styles_layout.css" />';
}
if(file_exists($CFG->dataroot.'/1/theme/styles_fonts.css')){
	echo '<link rel="stylesheet" type="text/css" href="'.$CFG->wwwroot.'/file.php/1/theme/styles_fonts.css" />';
}
if(file_exists($CFG->dataroot.'/1/theme/styles_color.css')){
	echo '<link rel="stylesheet" type="text/css" href="'.$CFG->wwwroot.'/file.php/1/theme/styles_color.css" />';
}

?>
