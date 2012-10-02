<?php
require_once('tree.class.php');

$top_menu_active = (isset($CFG->top_menu_active)) ? $CFG->top_menu_active : '1';

if ($top_menu_active){
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
    
    $top_menu_tree = isset($CFG->top_menu_tree) ? unserialize($CFG->top_menu_tree) : '';
    $top_menu_new_window = (isset($CFG->top_menu_new_window)) ? $CFG->top_menu_new_window : '0';

    $parents = ($top_menu_tree) ? $top_menu_tree->GetChild('-1') : '';
    $menu = '';

    if($parents){
        $parents_pos_array = array();

        foreach ($parents as $key=>$parent){
            if($top_menu_content[$parent]['name']){
                $pos = $top_menu_content[$parent]['pos'];
                $parents_pos_array[$parent]=$pos;
            }
        }

        asort($parents_pos_array);

        foreach($parents_pos_array as $parent=>$pos){
            if ($top_menu_content[$parent]['name']){
                $menu .= '<li><div><a href="'.$top_menu_content[$parent]['url'].'"';
                if($top_menu_new_window) $menu .= 'target="_blank"';
                $menu .= '>'.$top_menu_content[$parent]['name'].'</a>';
                $children = $top_menu_tree->GetChild($parent);
                if($children){
                    $menu .= '<ul>';
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
                            $menu .= '<li><a href="'.$top_menu_content[$child]['url'].'"';
                            if($top_menu_new_window) $menu .= 'target="_blank"';
                            $menu .= '>'.$top_menu_content[$child]['name'].'</a></li>';
                        }
                    }
                    $menu .= '</ul>';
                }
                $menu .= '</div></li>';
            }
        }
    }
    if($menu) echo '<div id="top_menu"><ul><li><div><a href="'.$CFG->wwwroot.'/"><div id="home_icon"></div>'./*<img width="18" height="17" src="'.$CFG->httpswwwroot.'/theme/'.current_theme().'/images/menu/home_icon.png" alt=""/>*/'</a></div></li>'.$menu.'</ul></div>';
}
