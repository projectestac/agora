<?php

require_once("../../../config.php");
global $CFG;

$top_menu_content = isset($CFG->top_menu_content) ? $CFG->top_menu_content : '';

//Build content
$extension = false;
$i = 1;
if (isset($CFG->top_menu_content_1)) $extension = true;

while($extension){
	$content = 'top_menu_content_'.$i;
	$top_menu_content .= $CFG->$content;
	$i++;
	$content = 'top_menu_content_'.$i;
	$extension = (isset($CFG->$content)) ? true : false;
} 

$top_menu_content = unserialize($top_menu_content);

if($top_menu_content){
    $item = $_POST['item'];
    $top_menu_content[$item]['name'] = stripslashes($_POST['name']);
    $top_menu_content[$item]['url'] = $_POST['url'];
    
    //Clean all config variables to create only necessary extensions
    unset_config("top_menu_content");
    $i=1;
    $content = 'top_menu_content_'.$i;
    $extension = (isset($CFG->$content)) ? true : false;
    
    while($extension){
		unset_config($content); 
		$i++;
		$content = 'top_menu_content_'.$i;
		$extension = (isset($CFG->$content)) ? true : false;
	}
    
    $content_array = str_split(serialize($top_menu_content),4000);
	set_config("top_menu_content", $content_array[0]);

	//Make extensions if it's necessary
	$i = 1;
	while (isset($content_array[$i])){
		set_config('top_menu_content_'.$i, $content_array[$i]);
		$i++;
	}
    return true;
}else{
    return false;
}




