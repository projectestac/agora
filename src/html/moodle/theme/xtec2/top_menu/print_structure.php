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
$parents = ($top_menu_tree) ? $top_menu_tree->GetChild('-1') : '';
$top_menu = '';

if($parents){
    $parents_pos_array = array();
    foreach ($parents as $key=>$parent){
        if($top_menu_content[$parent]['name']){
            $pos = $top_menu_content[$parent]['pos'];
            $parents_pos_array[$parent]=$pos;
        }
    }

    asort($parents_pos_array);
    $parents_array = array('-1' => get_string('no_parent','theme_config'));
    foreach($parents_pos_array as $parent=>$pos){
        if ($top_menu_content[$parent]['name']){
            $top_menu .= '<div class="group_div">';
            $parents_array[$parent] = $top_menu_content[$parent]['name'];
            $top_menu .= '<b>'.get_string('item_name','theme_config').': </b>';
            $top_menu .= '<input type="text" id="name_item_'.$parent.'" value="'.htmlspecialchars($top_menu_content[$parent]['name']).'" disabled="true" size="15"/>';
            $top_menu .= '<b> '.get_string('item_url','theme_config').': </b>';
            $top_menu .= '<input type="text" id="url_item_'.$parent.'" value="'.htmlspecialchars($top_menu_content[$parent]['url']).'" disabled="true" size="40"/>';
            $top_menu .= '<img alt="Edit item" id="edit_item_'.$parent.'" src="'.$CFG->pixpath.'/i/edit.gif" style="cursor:pointer;cursor:hand" onClick="javascript:allowEdit('.$parent.')" />';
            $top_menu .= '<img alt="Delete item" id="delete_item_'.$parent.'" src="images/menu/eliminar.png" style="cursor:pointer;cursor:hand" onClick="javascript:reallyDelete('.$parent.')" />';
            $top_menu .= '<img alt="Add son" id="add_son_'.$parent.'" src="'.$CFG->pixpath.'/t/useradd.gif" style="cursor:pointer;cursor:hand" onClick="javascript:allowAddSon('.$parent.')" />';
            if($top_menu_content[$parent]['pos']!=min($parents_pos_array)){
                $top_menu .= '<img src="'.$CFG->pixpath.'/t/up.gif" style="cursor:pointer;cursor:hand" onClick="javascript:upItem('.$parent.')" />';
            }
            if($top_menu_content[$parent]['pos']!=max($parents_pos_array)){
                $top_menu .= '<img src="'.$CFG->pixpath.'/t/down.gif" style="cursor:pointer;cursor:hand" onClick="javascript:downItem('.$parent.')" />';
            }
            $top_menu .= '<div class="item_div" id="item_div_'.$parent.'"></div>';

            $children = $top_menu_tree->GetChild($parent);
            if($children){
                $children_pos_array = array();
                foreach ($children as $key=>$child){
                    if($top_menu_content[$child]['name']){
                        $pos = $top_menu_content[$child]['pos'];
                        $children_pos_array[$child]=$pos;
                    }
                }
                asort($children_pos_array);
                foreach ($children_pos_array as $child=>$pos){
                    if ($top_menu_content[$child]['name']){
                        $top_menu .= '<div class="son_div">';
                        $top_menu .= '<img class="son" src="images/menu/breakline_icon.png" />'.get_string('item_name','theme_config').': ';
                        $top_menu .= '<input type="text" id="name_item_'.$child.'" value="'.htmlspecialchars($top_menu_content[$child]['name']).'" disabled="true" size="15"/>';
                        $top_menu .= ' '.get_string('item_url','theme_config').': ';
                        $top_menu .= '<input type="text" id="url_item_'.$child.'" value="'.htmlspecialchars($top_menu_content[$child]['url']).'" disabled="true" size="40"/>';
                        $top_menu .= '<img alt="Edit item" id="edit_item_'.$child.'" src="'.$CFG->pixpath.'/i/edit.gif" style="cursor:pointer;cursor:hand" onClick="javascript:allowEdit('.$child.')" />';
                        $top_menu .= '<img alt="Delete item" id="delete_item_'.$child.'" src="images/menu/eliminar.png" style="cursor:pointer;cursor:hand" onClick="javascript:reallyDelete('.$child.')" />';
                        if($top_menu_content[$child]['pos']!=min($children_pos_array)){
                            $top_menu .= '<img src="'.$CFG->pixpath.'/t/up.gif" style="cursor:pointer;cursor:hand" onClick="javascript:upItem('.$child.')" />';
                        }
                        if($top_menu_content[$child]['pos']!=max($children_pos_array)){
                            $top_menu .= '<img src="'.$CFG->pixpath.'/t/down.gif" style="cursor:pointer;cursor:hand" onClick="javascript:downItem('.$child.')" />';
                        }
                        $top_menu .= '<div class="item_div" id="item_div_'.$child.'"></div>';
                        $top_menu .= '</div>';
                    }
                }
            }
            $top_menu .= '</div>';
        }
    }
}

//New element form
$top_menu .= '<div class="group_div">';
$top_menu .= '<b>'.get_string('item_name','theme_config').': </b>';
$top_menu .= "<input type='text' id='son_name_-1' size='15'/>";
$top_menu .= '<b> '.get_string('item_url','theme_config').': </b>';
$top_menu .= "<input type='text' id='son_url_-1' size='40' value='http://'/>";
$top_menu .= '<img src="'.$CFG->pixpath.'/i/tick_green_big.gif" style="cursor:pointer;cursor:hand" onClick="javascript:addSon(-1)" /><img src="'.$CFG->pixpath.'/i/cross_red_big.gif" style="cursor:pointer;cursor:hand" onClick="javascript:printStructure()" />';

print($top_menu);
