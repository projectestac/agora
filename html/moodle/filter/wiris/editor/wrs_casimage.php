<?php
require_once('../../../config.php');
require_once($CFG->dirroot . '/filter/wiris/wrs_config.php');

//$xml= $_POST["xml"];
//$var = $_POST["img"];

$xml = optional_param('xml',PARAM_ALPHANUM);
$var = optional_param('img',PARAM_ALPHANUM);

//Create the file name from the wiris xml code
$name=md5($xml).'0';
$var= base64_decode($var);

$image=$name.'.png';
$pathname = $CFG->dataroot.'/'.$CFG->wirisimagedir.'/'.$image;

$fileHandler=fopen($pathname,'wb');

if (!$fileHandler) {
    echo false;
    exit;
}
                
if(fwrite($fileHandler, $var) === false) {
    echo false;
    exit;
}

fclose($fileHandler);

if (@imagecreatefrompng($pathname)) {
// Return image file
    echo $name;
} else {
    unlink($pathname);
    echo false;
}