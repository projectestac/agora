<?php
require_once('../../../config.php');
require_once('./math_filter.php');

global $TAGS;
global $CFG;
//$var = $_POST["var"];

$var = optional_param('var',PARAM_ALPHANUM);

//We can not do urldecode because it will transform '+' simbols
//$var=urldecode($var);

WF_initmathfilter();

//require_once($CFG->libdir . '/textlib.class.php');
//$convertor = textlib_get_instance();
//$var = $convertor->convert($var,'utf-8',$TAGS->lcharset);

//transforms the mathml to a html image

//$var = WF_filter_math($var,true);

$var= WF_math_image($var,true);
echo $var;