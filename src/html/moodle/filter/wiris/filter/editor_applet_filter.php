<?php
require_once('../../../config.php');
require_once('./applet_filter.php');

global $TAGS;
global $CFG;
//$var = $_POST["var"];

$var = optional_param('var',PARAM_ALPHANUM);

//transforms the xml to a html image
$var = WF_applet_md5($var);
echo $var;

function WF_applet_md5($var) {
    return md5($var).'0';
}