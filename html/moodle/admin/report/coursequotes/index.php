<?php

    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->libdir.'/agora.php');
    
    admin_externalpage_setup('coursequotes');
    admin_externalpage_print_header();
    
    if(!get_protected_agora() && is_rush_hour()){
		// Rush hour message
		error(get_string('rush_hour', 'moodle'), $CFG->wwwroot );
				
	}else{  
            if (function_exists('getDiskInfo')){
		//Get diskSpace and diskConsume from portal dataBase
		$diskInfo = getDiskInfo($CFG->dnscentre, 'moodle');
            } else {
                $diskInfo = array ('diskConsume' => 0, 'diskSpace' => 0 );
            }   
            $diskSpace = round($diskInfo['diskSpace']); //In MB
            //$diskConsume = round($diskInfo['diskConsume'] / 1024); //Originally in Kb

            //Get size of every course directory
            $courses = get_courses();
            $categories = get_categories();
            $categories_info = array();

            foreach ($categories as $category){
                    $categories_info[$category->id]['name'] = $category->name;
            }

            //Content for each tab
            $data = get_category_data(0);
            $diskConsume = substr(($data['categorysize'] / 1024),0, strpos($data['categorysize'] / 1024, "."));
            $a = new stdClass;
            $a->diskSpace = $diskSpace;
            $a->diskConsume = $diskConsume;

            $general_content = '';
            if ($diskSpace > 0 ){
                $general_content .= '<p>'.get_string('total_description', 'admin').'</p>';
                $general_content .='<div ><img src="graph.php?diskSpace='.$diskSpace.'&diskConsume='.$diskConsume.'" /></div>';
                $general_content .= '<div ><br>'.get_string('disk_consume_explain', 'admin', $a).'</div>';
            } else{
                $general_content .= '<div ><br>'.get_string('disk_consume_notavailable', 'admin').'</div>';
            }

            $category_data = print_category_data($data); 					 
            $category_content = '<p>'.get_string('category_description', 'admin').'</p>'.$category_data['content'];

            $larger_content = '<p>'.get_string('courses_description', 'admin').'</p>'.
                               print_larger_courses();

            //JavaScript switch
            require_js(array('yui_yahoo', 'yui_event', 'yui_element', 'yui_tabview', 'yui_dom-event'));

            $yui_code = '
                    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/tabview/assets/skins/sam/tabview.css" />

                    <div id="demo" class="yui-navset">
                            <ul class="yui-nav">
                                    <li class="selected"><a href="#tab1"><em>'.get_string('total_data', 'admin').'</em></a></li>
                                    <li><a href="#tab2"><em>'.get_string('category_data', 'admin').'</em></a></li>
                                    <li><a href="#tab3"><em>'.get_string('larger_courses', 'admin').'</em></a></li>
                            </ul>            
                            <div class="yui-content">
                                    <div id="tab1">'.$general_content.'</div>
                                    <div id="tab2">'.$category_content.'</div>
                                    <div id="tab3">'.$larger_content.'</div>
                            </div>
                    </div>
                    <script type="text/javascript">
                            document.body.className += " yui-skin-sam";
                            var tabView = new YAHOO.widget.TabView("demo");
                    </script>
                    ';

            echo $yui_code;
	}
       
       
    
    function get_category_data ($cat_id){
		global $CFG;
		
		$categorysize = 0;
		$data = array( 'id' => $cat_id);	
		if ($subcategories = get_categories($cat_id)){
			// Category have sons
			$data['subcategories'] = array();
			foreach ($subcategories as $cat){
				$cat_data = get_category_data($cat->id);
				$data['subcategories'][] = $cat_data;
			}	
		}
		$courses = get_courses($cat_id);
		$data['courses'] = array();
		foreach ($courses as $course){
			if(file_exists($CFG->dataroot.'/'.$course->id)){
				$directorysize = exec('du -sk '.$CFG->dataroot.'/'.$course->id);
				$directorysize = explode('/', $directorysize);
				$directorysize = $directorysize[0]; //Size in Kbytes
			}else{
				$directorysize = 0;
			}
			$categorysize += $directorysize;
			$data['courses'][] = array(	'id'			=> $course->id,	
										'fullname'		=> $course->fullname,
										'directorysize' => $directorysize);
		}
		$data['categorysize'] = $categorysize;
		return $data;
	}
	
	
	
	function print_category_data ($data){
		global $categories_info;
		$data = $data['subcategories'];
		$content_array = array();
		$content = '';
		$content .= '<ul>';
		
		foreach ($data as $category){
            $categorysize = 0;
			foreach ($category['courses'] as $course){
//				$content .= '<tr>';
//				$content .= '<td>'.$course['fullname'].' -- <b>'.$course['directorysize'].' Kb</b> ('.substr(($course['directorysize'] / 1024),0,4) .' MB)</td></tr>'; 
                $categorysize += $course['directorysize'];
			}
			
			$subcategory_content = '';
			if (!empty($category['subcategories'])){
				foreach ($category['subcategories'] as $subcategory){
					$subcategory_array = print_category_data($category);
					$subcategory_content .= $subcategory_array['content'];
					$categorysize += $subcategory_array['categorysize'];
				}
			}
			
			$content .= '<li class="category_title"><b><a href="../../../course/category.php?id='.$category['id'].'" target="_blank">'.$categories_info[$category['id']]['name'].'</a></b>';
			$content .= ' - '.substr(($categorysize / 1024),0, strpos($categorysize / 1024, ".") + 3) .' MB</li>';
			$content .= $subcategory_content;
		}
		$content .= '</ul>';
		$content_array['content'] = $content;
		$content_array['categorysize'] = $categorysize;
		
		return $content_array;
	}
	
	
	
	function print_larger_courses(){
		global $CFG;
		global $categories_info;
		
		$courses = get_courses();
		$data = array();
		foreach ($courses as $course){
			if(file_exists($CFG->dataroot.'/'.$course->id)){
				$directorysize = exec('du -sk '.$CFG->dataroot.'/'.$course->id);
				$directorysize = explode('/', $directorysize);
				$directorysize = $directorysize[0]; //Size in Kbytes
			}else{
				$directorysize = 0;
			}
			$data[] = array('directorysize' => (int)$directorysize,
							'id'		=> $course->id,	
							'fullname'	=> $course->fullname,
							'category'	=> $course->category);
		}
		
		/* Another way to sort the array
		 * foreach ($data as $key=>$row){
			$size[$key] = (int)$row['directorysize'];
			$id[$key] = $row['id'];
			$fullname[$key] = $row['fullname'];
			$category[$key] = $row['category'];
		}
		
		array_multisort($size, SORT_ASC, $id, SORT_ASC, $fullname, SORT_ASC, $category, SORT_ASC, $data);
		*/
		rsort($data);
		$content = '<table id="larger_courses"><tr><td><b>'.get_string('course_name', 'admin').'</b></td><td><b>'.get_string('category_name', 'admin').'</b></td><td><b>'.get_string('disk_used', 'admin').'</b></td></tr>';
		foreach ($data as $course){			
			$category_name = '';
			if ($course['category'] != 0){
				$categoryrecord = get_record('course_categories', 'id', ($course['category']));
				$categoryrecord = explode("/",($categoryrecord->path));
				foreach ($categoryrecord as $category_id){
					if ($category_id != '') $category_name .= $categories_info[$category_id]['name'].'/';
				}				
			}
			//$category_name = ($course['category'] == 0) ? '' : $categories_info[$course['category']]['name'];
			$content .= '<tr><td><a href="../../../course/view.php?id='.$course['id'].'" target="_blank">'.$course['fullname'].'</a></td>';
                        $content .= '<td><a href="../../../course/category.php?id='.$course['category'].'" target="_blank">'.$category_name.'</a></td>';
                        $content .= '<td>'.substr(($course['directorysize'] / 1024),0, strpos($course['directorysize'] / 1024, ".") + 3) .' MB</td></tr>';
			
		}
		$content .= '</table>';
		return $content;		
	}
	
    
