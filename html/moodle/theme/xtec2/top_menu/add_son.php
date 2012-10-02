<?php

require_once('../../../config.php');
require_once('tree.class.php');
global $CFG;

$top_menu_content = isset($CFG->top_menu_content) ? $CFG->top_menu_content : '';
$top_menu_tree = isset($CFG->top_menu_tree) ? unserialize($CFG->top_menu_tree) : '';

//Build content
$i=1;
$content = 'top_menu_content_'.$i;
$extension = (isset($CFG->$content)) ? true : false;

while($extension){
	$top_menu_content .= $CFG->$content;
	$i++;
	$content = 'top_menu_content_'.$i;
	$extension = (isset($CFG->$content)) ? true : false;
} 

$top_menu_content = unserialize($top_menu_content);

$url = stripslashes($_POST['url']);
$url = ($url=='http://') ? '' : $url;

$name = stripslashes($_POST['name']);
$item = stripslashes($_POST['item']);

if($top_menu_content && $top_menu_tree){
    //Isn't the first item
    $id = max(array_keys($top_menu_content))+1;
    $parent = $item;
    $top_menu_content[$id] = array('name' => $name,
                                   'url'=>  $url,
                                    'pos'=> $id);
    $top_menu_tree->AddNode($id,$parent);
}else{
    //Is the first item
    $top_menu_tree = new Tree;
    $top_menu_content = array();
    $top_menu_content[0] = array('name' => $name,
                                 'url'=>  $url,
                                 'pos'=>  '0');
    $top_menu_tree->AddNode('0','-1');
}

$content_array = str_split(serialize($top_menu_content),4000);
set_config("top_menu_content", $content_array[0]);

//Make extensions if it's necessary
$i = 1;
while (isset($content_array[$i])){
	set_config('top_menu_content_'.$i, $content_array[$i]);
	$i++;
}

set_config("top_menu_tree", serialize($top_menu_tree));




