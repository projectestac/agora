<?php

require_once('../../../config.php');
require_once('tree.class.php');
global $CFG;

$top_menu_content = isset($CFG->top_menu_content) ? $CFG->top_menu_content : '';
$top_menu_tree = isset($CFG->top_menu_tree) ? unserialize($CFG->top_menu_tree) : '';

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

//Values are deleted but structure tree structure is maintained. Another solution is necessary

if($top_menu_content){
    $item = $_POST['item'];

    //Delete item sons
    $children = $top_menu_tree->GetChild($item);
    if($children){
        foreach ($children as $key=>$child){
            unset($top_menu_content[$child]);
            $top_menu_tree->DelNode($child);
        }
    }
    
    unset($top_menu_content[$item]);
    $top_menu_tree->DelNode($item);
    
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
	
	set_config('top_menu_tree', serialize($top_menu_tree));
    return true;
}else{
    return false;
}




