<?php  // $Id: report.php,v 1.46.2.12 2009/03/27 01:48:14 danmarsden Exp $

// This script uses installed report plugins to print quiz reports

    

    require_once("../../config.php");
    require_once('locallib.php');
    
    $id         = optional_param('id', '', PARAM_INT);    // Course Module ID, or
    $a          = optional_param('a', '', PARAM_INT);     // Book Id
    $b          = optional_param('b', '', PARAM_INT);     // Unit Id
    $c          = optional_param('c', '', PARAM_INT);     // Activity Id
    $user       = optional_param('user', '', PARAM_INT);  // User ID
    $attempt    = optional_param('attempt', '1', PARAM_INT);  // attempt number
    $action     = optional_param('action', '', PARAM_ALPHA);
    $attemptids = optional_param('attemptid', array(), PARAM_RAW); //get array of responses to delete.
    $update     = optional_param('update', '', PARAM_INT);
// MARSUPIAL ********** AFEGIT -> Filter by status, get parameter with the filterby
// 2011.08.30 @mmartinez
    $filterby   = optional_param('filterby', '', PARAM_RAW);
// ********** FI

    if (!empty($id)) {
        if (! $cm = get_coursemodule_from_id('rcontent', $id)) {
            error('Course Module ID was incorrect');
        }
        if (! $course = get_record('course', 'id', $cm->course)) {
            error('Course is misconfigured');
        }
        if (! $rcontent = get_record('rcontent', 'id', $cm->instance)) {
            error('Course module is incorrect');
        }
    } else {
        if (!empty($a)) {
            if (! $rcontent = get_record('rcontent', 'id', $a)) {
                error('Course module is incorrect');
            }
            if (! $course = get_record('course', 'id', $rcontent->course)) {
                error('Course is misconfigured');
            }
            if (! $cm = get_coursemodule_from_instance('rcontent', $rcontent->id, $course->id)) {
                error('Course Module ID was incorrect');
            }
        }
    }

    require_login($course->id, false, $cm);

    $contextmodule = get_context_instance(CONTEXT_MODULE,$cm->id);

    require_capability('mod/rcontent:viewreport', $contextmodule);

    add_to_log($course->id, 'rcontent', 'report', 'report.php?id='.$cm->id, $rcontent->id, $cm->id);

    if (!empty($user)) {
        $userdata = rcontent_get_user_data($user);
    } else {
        $userdata = null;
    }

    if (!isset($action) || ($action!="update" && $action!="saveupdate")){
	/// Print the page header
	    if (empty($noheader)) {
	
	        $strscorms = get_string('modulenameplural', 'rcontent');
	        $strscorm  = get_string('modulename', 'rcontent');
	        $strreport  = get_string('report', 'rcontent');
	        $strattempt  = get_string('attempt', 'rcontent');
	        $strname  = get_string('name');
	        if($bookname=get_record_select('rcommon_books',"id=$rcontent->bookid",'name')){
			    $bookname=$bookname->name;
			}else{
				$bookname=get_string('book','rcontent').": ".$rcontent->bookid;
			}
			$heading=format_string($rcontent->name);
			if(empty($c)){
		        if (empty($b)) {
		            if (empty($a)) {
		                $navigation = build_navigation($strreport, $cm);
		                print_header("$course->shortname: ".format_string($rcontent->name), $course->fullname, $navigation,
		                             '', '', true);
// MARSUPIAL ********** AFEGIT -> Filter by status, set select options url destination
// 2011.08.30 @mmartinez
		                $optionsurl = "report.php?id=$cm->id";
// ********** FI
		            } else {
		
		                $navlinks = array();
		                $navlinks[] = array('name' => $strreport, 'link' => "report.php?id=$cm->id", 'type' => 'title');
		                $navlinks[] = array('name' => $bookname, 'link' => '', 'type' => 'title');
		                $navigation = build_navigation($navlinks, $cm);
		
		                print_header("$course->shortname: ".format_string($rcontent->name), $course->fullname,
		                             $navigation, '', '', true);
		                             
		                $heading.=" > ".$bookname;
// MARSUPIAL ********** AFEGIT -> Filter by status, set select options url destination
// 2011.08.30 @mmartinez
		                $optionsurl = "report.php?a=$a&amp;user=$user&amp;attempt=$attempt";
// ********** FI
		            }
		        } else {
		
		            $navlinks = array();
		            $navlinks[] = array('name' => $strreport, 'link' => "report.php?id=$cm->id", 'type' => 'title');
		            $navlinks[] = array('name' => $bookname, 'link' => "report.php?a=$a&amp;user=$user&amp;attempt=$attempt", 'type' => 'title');
		            if($unitname=get_record_select('rcommon_books_units',"bookid=$rcontent->bookid AND id=$b",'name')){
						   $unitname=$unitname->name;
					}else{
						$unitname=get_string('unit','rcontent').": ".$b;
					}
		            $navlinks[] = array('name' => $unitname, 'link' => '', 'type' => 'title');
		            $navigation = build_navigation($navlinks, $cm);
		
		            print_header("$course->shortname: ".format_string($rcontent->name), $course->fullname, $navigation,
		                     '', '', true);
		            
		            $heading.=" > ".$bookname." > ".$unitname;
// MARSUPIAL ********** AFEGIT -> Filter by status, set select options url destination
// 2011.08.30 @mmartinez
		            $optionsurl = "report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt";
// ********** FI
		        }
			}else{
				$navlinks = array();
		        $navlinks[] = array('name' => $strreport, 'link' => "report.php?id=$cm->id", 'type' => 'title');
		        $navlinks[] = array('name' => $bookname, 'link' => "report.php?a=$a&amp;user=$user&amp;attempt=$attempt", 'type' => 'title');
		        if($unitname=get_record_select('rcommon_books_units',"bookid=$rcontent->bookid AND id=$b",'name')){
					$unitname=$unitname->name;
				}else{
				    $unitname=get_string('unit','rcontent').": ".$b;
				}	
		        $navlinks[] = array('name' => $unitname, 'link' => "report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt", 'type' => 'title');
			    if($activityname=get_record_select('rcommon_books_activities',"bookid=$rcontent->bookid AND unitid=$b AND id=$c",'name')){
					$activityname=$activityname->name;
				}else{
				    $activityname=get_string('activity','rcontent').": ".$c;
				}
				$navlinks[] = array('name' => $activityname, 'link' => '', 'type' => 'title');
		        $navigation = build_navigation($navlinks, $cm);
		
		        print_header("$course->shortname: ".format_string($rcontent->name), $course->fullname, $navigation,
		             '', '', true);
		        
		        $heading.=" > ".$bookname." > ".$unitname." > ".$activityname;
// MARSUPIAL ********** AFEGIT -> Filter by status, set select options url destination
// 2011.08.30 @mmartinez
		        $optionsurl = "report.php?a=$a&amp;b=$b&amp;c=$c&amp;user=$user&amp;attempt=$attempt";
// ********** FI
			}
// MARSUPIAL ********** AFEGIT -> Filter by status, add select field
// 2011.08.30 @mmartinez
            $optionsparam       = '&amp;filterby=';
            $optionsurlandparam = $filterbyindex = $optionsurl.$optionsparam;
            $filterbyindex     .= $filterby;
            $optionsparam       = ($filterby != '')? $optionsparam.$filterby : '';
            
            $menu = array();
            $menu[$optionsurl]  = get_string('all', 'rcontent');
            $menu[$optionsurlandparam.'NO_INICIADO']  = get_string('NO_INICIADO', 'rcontent');
            $menu[$optionsurlandparam.'INCOMPLETO']   = get_string('INCOMPLETO', 'rcontent');
            $menu[$optionsurlandparam.'FINALIZADO']   = get_string('FINALIZADO', 'rcontent');
            $menu[$optionsurlandparam.'POR_CORREGIR'] = get_string('POR_CORREGIR', 'rcontent');
            $menu[$optionsurlandparam.'CORREGIDO']    = get_string('CORREGIDO', 'rcontent');
            
			popup_form('', $menu, 'choosestatefilter', $filterbyindex, get_string('chooseaction', 'rcontent'), '', '', false, 'self');
// ********** FI

	        print_heading($heading);
	    }
		
	    if ($action == 'delete' && has_capability('mod/rcontent:deleteresponses',$contextmodule)) {
	       if (rcontent_delete_responses($attemptids, $rcontent->id)) { //delete responses.
	            notify(get_string('responsedeleted', 'rcontent'), 'notifysuccess');
	        }
	    }
//MARSUPIAL *********** AFEGIT -> In case that the user is a student in course context load from db just his registries
//2011.05.19 @mmartinez
        $user_rol=array_values(get_user_roles($contextmodule));
//************ FI	    
	    if (empty($c)){
		    if (empty($b)) {
		        if (empty($a)) {
// No options, show the global report
		            if (!empty($CFG->enablegroupings) && !empty($cm->groupingid)) {
		                $sql = "SELECT st.userid, st.rcontentid
		                    FROM {$CFG->prefix}rcontent_grades st
		                    INNER JOIN {$CFG->prefix}groups_members gm ON st.userid = gm.userid
		                    INNER JOIN {$CFG->prefix}groupings_groups gg ON gm.groupid = gg.groupid
		                    WHERE st.rcontentid = {$rcontent->id} AND gg.groupingid = {$cm->groupingid}";
		                
//MARSUPIAL *********** AFEGIT -> In case that the user is a student in course context load from db just his registries
//2011.05.19 @mmartinez
                        if ($user_rol[0]->shortname=='student'){
                            $sql .= " AND userid = ".$USER->id;
                        }
//*********** FI
		                $sql .= "GROUP BY st.userid, st.rcontentid";
		            } else {
		                $sql = "SELECT st.userid, st.attempt
		                    FROM {$CFG->prefix}rcontent_grades st
		                    WHERE st.rcontentid = {$rcontent->id}";
		                
//MARSUPIAL *********** AFEGIT -> In case that the user is a student in course context load from db just his registries
//2011.05.19 @mmartinez
                        if ($user_rol[0]->shortname == 'student'){
                            $sql .= " AND userid = ".$USER->id;
                        }
//*********** FI
		                $sql .= " GROUP BY st.userid,st.attempt";
		                //echo $sql.'<br>';  //debug mode
		            }
		            global $USER;
		            $rcontentusersatempts  = array();
		            if ($rcontentusers = get_records_sql($sql)) { 
		                //echo "<hr>Users with grades: "; print_r($rcontentusers); echo "<hr>"; //just for debug mode
		            	
		                foreach($rcontentusers as $rcontentus){
		                	//load all user data
		                	$sql = "SELECT rg.* FROM {$CFG->prefix}rcontent_grades rg WHERE rg.rcontentid=$rcontent->id AND rg.userid=$rcontentus->userid AND rg.attempt=$rcontentus->attempt";
		                    $rcontentus = get_record_sql($sql, true);
			                //echo "<hr>All data for user $rcontentus->userid: "; print_r($rcontentus); echo "<hr>";  //just for debug mode
			                
			                //reload data by attempt
				            $attempt = rcontent_get_last_attempt($rcontent->id,$rcontentus->userid);
				            for ($at = 1; $at<=$attempt; $at++) {
					            //test if min values are the same that we are going to show, if not change it with min ones
// MARSUPIAL *********** MODIFICAT -> Fixed bug in min unit and activity search, first search min unit and then search min activity for the searched unit
// 2012.01.09 @mmartinez
			                    $rcontentusermin = get_record_select('rcontent_grades',"rcontentid=$rcontent->id AND userid=$rcontentus->userid AND attempt=$at",'MIN(unitid) AS min_unit');
			                    $rcontentusermin = get_record_select('rcontent_grades',"rcontentid=$rcontent->id AND userid=$rcontentus->userid AND attempt=$at AND unitid = {$rcontentusermin->min_unit}",'MIN(unitid) AS min_unit, MIN(activityid) AS min_activity');
// ********** ORIGINAL
								//$rcontentusermin = get_record_select('rcontent_grades',"rcontentid=$rcontent->id AND userid=$rcontentus->userid AND attempt=$at",'MIN(unitid) AS min_unit, MIN(activityid) AS min_activity');
// ********** FI
			                    //echo "<hr>Min unit and activity values: "; print_r($rcontentusermin); echo "<hr>";  //just for debug mode
//MARSUPIAL *********** ELIMINAT -> Now the comprovation is done in the sql statment
//2011.05.19 @mmartinez		                	
			                	 //if($user_rol[0]->shortname!='student'||($user_rol[0]->shortname=='student'&&$rcontentuser->userid==$USER->id)){
//************ FI

			                    if($rcontent->unitid == 0 && $rcontent->activityid == 0){
			                		$tempb=0;
			                		$tempc=0;
			                	}elseif($rcontent->unitid !=0 && $rcontent->activityid == 0){
					            	$tempb=$rcontentus->unitid;
					            	$tempc=0;
			                	}else{
			                		$tempb=$rcontentus->unitid;
					            	$tempc=$rcontentus->activityid;
			                	}
			                	
			                	//reload all the data but with min unit and activity values
			                	$sql = "rcontentid=$rcontent->id AND userid=$rcontentus->userid AND attempt=$at AND unitid=$rcontentusermin->min_unit AND activityid=$rcontentusermin->min_activity";
// MARSUPIAL ********** AFEGIT -> Filter by status, set filter by sql
// 2011.08.30 @mmartinez
		                        if ($filterby != ''){
		                            $sql .= " AND (status = '".$filterby."' OR EXISTS (SELECT * FROM {$CFG->prefix}rcontent_grades u WHERE u.rcontentid={$rcontent->id} AND u.userid=$rcontentus->userid AND u.attempt=$at AND u.unitid <> 0 AND u.status='{$filterby}' AND u.attempt={$at}";
		                         	if ($user_rol[0]->shortname=='student'){
		                                $sql .= " AND u.userid = ".$USER->id;
		                         	}
		                         	$sql .= "))";
		                        }
// *********** FI
					            if(!$rcontentuserat = get_records_select('rcontent_grades', $sql, 'timecreated ASC')){
		                            //echo '<hr>Reloaded data sql: '.$sql.'<hr>'; //just for debug
					            	continue;
					            }
					            //$rcontentuserat = current($rcontentuserat);
					            //echo "Reloaded data with min values ($sql): "; print_r($rcontentuserat); echo "<br><br>"; //just for debug mode
					            foreach ($rcontentuserat as $rcontentuserattemp){    	
		                            $rcontentusersatempts[] = $rcontentuserattemp;
		                            //echo "<hr>Data added: "; print_r($rcontentuserattemp); echo "<br>"; //just for debug
					            }
//MARSUPIAL *********** ELIMINAT -> Now the comprovation is done in the sql statment
//2011.05.19 @mmartinez
       			                	//}
//*********** fi
		            
				            }

		                }
		                //echo "Data to be displayed: "; print_r($rcontentusersatempts); echo "<br><br>"; //just for debug mode
//MARSUPIAL *********** ELIMINAT -> Now the comprovation is done in the sql statment
//2011.05.19 @mmartinez
		            	//if($user_rol=array_values(get_user_roles($contextmodule))){
//************ FI
			            $showhreffield=false;
			            $table = new stdClass();
//MARSUPIAL *********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                        $page        = optional_param("page",0);
                        $limit       = $CFG->rcontent_registersperreportpage;
                        $count       = count($rcontentusersatempts);
                        $startindex  = ($limit*$page);
                        $range       = "";
                        $maxattempts = "";
		            	//set array pointer to the first array position
                        if ($startindex > 0){
                          	for ($i=0;$i<$startindex;$i++){
                          		$tmp = next($rcontentusersatempts);
                          	}
                        }
                        //go over the registres of the current page
//************ FI

			                //first set the tbody to have the info for the theader
//MARSUPIAL ********** MODIFICAT -> Just show the registers of one page
//2011.05.18 @mmatinez
                        for($i = $startindex; $i < ($startindex+$limit); $i++) {
//********** ORIGINAL
			            //foreach($rcontentusers as $rcontentuser){
//*********** FI

//MARSUPIAL ********** AFEGIT -> Get the next value of the array
//2011.05.19 @mmartinez
						if ($i > count($rcontentusersatempts)-1){
						    break;
						}
                        if ($i == $startindex){
							$rcontentuser = current($rcontentusersatempts);
                        } else {
							$rcontentuser = next($rcontentusersatempts);
						}
//************ FI
                        //echo "Showing values: "; print_r($rcontentuser); echo "<br><br>"; //just for debug mode
                        
					    $userdata = rcontent_get_user_data($rcontentuser->userid);
				        $row = array();
				        if (has_capability('mod/rcontent:deleteresponses',$contextmodule)) {
				            $row[] = '<input type="checkbox" name="attemptid[]" value="'. $rcontentuser->userid . ':' . $rcontentuser->attempt . '" />';
				        }
				        $row[] = print_user_picture($rcontentuser->userid, $course->id, $userdata->picture, false, true);
				        $row[] = '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$rcontentuser->userid.'&amp;course='.$course->id.'">'.
				                 fullname($userdata).'</a>';
				                            
				        //set href depends on the granularity of the activity
				        $href = '<a href="report.php?a='.$rcontent->id;
				        $select = ' AND unitid<>0';
				        if ($tempb != 0){
				           	$href .= '&amp;b='.$rcontentuser->unitid;
				           	$select = ' AND unitid='.$tempb.' AND activityid<>0';
				           	if($tempc !=0 ){
				           		$href .= '&amp;c='.$rcontentuser->activityid;
				           		$select = ' AND unitid='.$tempb.' AND activityid='.$tempc;
				           	}
				           	//if there arent smalle grades but there are details go direct to details
				         }
				                        
				         if(!get_records_select('rcontent_grades',"rcontentid='$rcontentuser->rcontentid' AND userid='$rcontentuser->userid' AND attempt='$rcontentuser->attempt'".$select)&&
				             get_records_select('rcontent_grades_details',"rcontentid=$rcontentuser->rcontentid AND userid=$rcontentuser->userid AND attempt=$rcontentuser->attempt AND unitid=$rcontentuser->unitid AND activityid=$rcontentuser->activityid")){
				         	 $href.='&amp;action=details';
				         }
// MARSUPIAL *********** AFEGIT -> Filter by status, set filterby to the url link
// 2011.08.30 @mmartinez
                         $href .= '&amp;user='.$rcontentuser->userid.'&amp;attempt='.$rcontentuser->attempt.$optionsparam.'">'.$rcontentuser->attempt.'</a>';
// ********** ORIGINAL
				         //$href.='&amp;user='.$rcontentuser->userid.'&amp;attempt='.$rcontentuser->attempt.'">'.$rcontentuser->attempt.'</a>';
// ********** FI
				         $row[] = $href;				         
//MARSUPIAL *********** MODIFICAT -> Show info directly
//2011.05.20 @mmartinez
						 //set max attempts
						 $maxattempts = '('.$rcontentuser->maxattempts.')';
                         //show start date
// MARSUPIAL ************ MODIFICAT -> Fixed bug when startime is empty
// 2011.10.31 @mmartinez
                         if (!empty($rcontentuser->starttime) && $rcontentuser->starttime > 0){
                         	$row[] = userdate($rcontentuser->starttime, get_string('strftimedaydatetime'));
                         } else {
                         	$row[] = "";
                         }
// *********** ORIGINAL
                         //$row[] = userdate($rcontentuser->starttime, get_string('strftimedaydatetime'));
// *********** FI

				         //show attempt runtime
                         if ($rcontentuser->totaltime != '') {
					         $segundos   = $rcontentuser->totaltime;
					         $horas      = intval($segundos/3600);
					         $segundos   = $segundos-($horas*3600);
					         $horas      = ($horas<10)?'0'.$horas:$horas;
					         $minutos    = intval($segundos/60);
					         $minutos    = ($minutos<10)?'0'.$minutos:$minutos;
					         $segundos   = $segundos-($minutos*60);
					         $segundos   = ($segundos<10)?'0'.$segundos:$segundos;
					         $totaltime = $horas.":".$minutos.":".$segundos;
					     }
					     else {
					         $totaltime = '00:00:00';        
					     }
				         $row[] = $totaltime;
				         //show status
                         $status = rcontent_grade_calculate_status($rcontent->id, $rcontentuser->userid, $rcontentuser->attempt, $tempb, $tempc);
						 if ($status[0]!=''){
						     $row[] = get_string($status[0],'rcontent');
						 } else {
						     $row[] = '';
						 }
						 //show grade
						 $row[] = '<div id="rcontent_grade_'.$rcontentuser->userid.'_'.$rcontentuser->id.'">'.$rcontentuser->grade.'</div>';
						 //set grade range
						 $range = "($rcontentuser->mingrade-$rcontentuser->maxgrade)";
						 //show comments
						 $comments = '<div id="rcontent_comments_'.$rcontentuser->userid.'_'.$rcontentuser->id.'">';
						 if(strlen($rcontentuser->comments) > 30){
			        	     $comments .= '<span title="'.$rcontentuser->comments.'">'.substr($rcontentuser->comments,0,27).'...</span>';
			        	     $justcomments='<span title="'.$rcontentuser->comments.'">'.substr($rcontentuser->comments,0,27).'...</span>';	
			        	 }else{
			        		$comments.=$rcontentuser->comments;
			        		$justcomments=$rcontentuser->comments;
			        	 }
			        	 $comments .='</div>';
			        	 $row[] = $comments;
			        	 //show view resolved activity link
			        	 //added capabilities to control when students can view report
			        	 $href='';
                         if($rcontentuser->urlviewresults != "" && has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
                             $httptest = '';
				        	 if (strpos($rcontentuser->urlviewresults,'http://') === false){
				        	     $httptest = 'http://';
				        	 }
				             $href .= '<a href="'.$httptest.$rcontentuser->urlviewresults.'" target="_blank">'.get_string('view','rcontent').'</a> &middot;';
				             $justhref = '<a href="'.$httptest.$rcontentuser->urlviewresults.'" target="_blank">'.get_string('view','rcontent').'</a>';
				             $showhreffield=true;
				         }
				         //show update activity link
//********** ORIGINAL
				         /*$timetracks = rcontent_get_attempt_runtime($rcontent->id, $rcontentuser->userid, $rcontentuser->attempt, $tempb, $tempc);
                         $row[] = $timetracks->start;
                         $row[] = $timetracks->finish;
                         $grade = rcontent_grade_user_attempt($rcontent->id, $rcontentuser->userid, $rcontentuser->attempt, $tempb, $tempc);
						 if ($grade->status[0]!=''){
						     $row[] = get_string($grade->status[0],'rcontent');
						 } else {
						     $row[] = '';
						 }
						 $row[] = $grade->grade;
						 $row[] = $grade->comments;
						 //added capabilities to control when students can view report
				         $href='';
				         if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
				             $href.= $grade->url;
				             $showhreffield=true;
				         }*/
//********** FI

				         if(has_capability('mod/rcontent:updatescore', get_context_instance(CONTEXT_MODULE, $cm->id))){
				             if($tempb == $rcontentuser->unitid && $tempc == $rcontentuser->activityid){
				                 $popuphref = '/mod/rcontent/report.php?a='.$rcontent->id;				                            
				                 if ($tempb != 0){
				                     $popuphref .= '&amp;b='.$tempb;
				                     if($tempc != 0){
				                         $popuphref .= '&amp;c='.$tempc;
				                     }
				                 }
					             $popuphref .= '&amp;user='.$rcontentuser->userid.'&amp;attempt='.$rcontentuser->attempt.'&amp;action=update&amp;update='.$rcontentuser->id;
					             $href .= ' '.link_to_popup_window ($popuphref,'grade'.$rcontentuser->userid, get_string('update'), 600, 780, get_string('update'), 'none', true, 
					                    'button'.$rcontentuser->userid);
					             $showhreffield = true;
				             }
				         }
				         if($showhreffield){
				             $row[] = $href;
				         }
// MARSUPIAL ********** AFEGIR -> Filter by status
// 2011.09.06 @mmartinez
				         if ($filterby != '' && $status[0] != $filterby || $status[1] == ''){
// MARSUPIAL *********** MODIFICAT -> Fix bug when show report for student
// 2012.01.05 @mmartinez
                             $realstat = ($status[0] != '')? get_string($status[0], 'rcontent') : '';
                             $stat = ($filterby != '')? get_string($filterby, 'rcontent') : $realstat;
// XTEC ************ MODIFICAT -> Fixed bug in the report interface
// 2012.03.02 @mmartinez
                             $fieldstoreset = (strpos($row[0], '<input') === false)? array(3 => "", 4 => "", 5 => $stat, 6 => "", 7 => "", 8 => "") : array(4 => "", 5 => "", 6 => $stat, 7 => "", 8 => "", 9 => "");
// ************ ORIGINAL
							//$fieldstoreset = ($user_rol[0]->shortname == 'student')? array(3 => "", 4 => "", 5 => $stat, 6 => "", 7 => "", 8 => "") : array(4 => "", 5 => "", 6 => $stat, 7 => "", 8 => "", 9 => "");
// ************ FI
				         	 foreach ($fieldstoreset as $key => $val){
				         	 	$row[$key] = $val;
				         	 }				         	 
// ********** ORIGINAL 	 
				         	 /*$row[4] = "4";
				         	 $row[5] = "5";
				         	 if ($filterby != ''){
				         	     $row[6] = get_string($filterby, 'rcontent');				         	 
				         	 }
				         	 $row[7] = "7";
				         	 $row[8] = "8";
				         	 $row[9] = "9";*/
// ********** FI
				         }
// *********** FI
				         $table->data[] = $row;
//MARSUPIAL *********** AFEGIT -> If original status is POR_CORREGIR set background to red
//2011.05.18 @mmartinez
						 if ($status[1] == "POR_CORREGIR"){
						     $table->rowclass[] = 'uuerror';
						 } else {
						     $table->rowclass[] = '';
						 }
//*********** FI
 
			         }
			         
			         if (isset($table->data) && count($table->data) > 0){
//MARSUPIAL *********** ELIMINAT -> Deleted innecessary comprovations
//2011.05.20 @mmartinez
				         /*if(!isset($grade)){
				             $grade=new stdClass();
				             $grade->maxattempts='';
				             $grade->range='';
				         }*/
//************* FI
				         //now the theader
				         $table->head = array();
				         $table->width = '100%';
				         if (has_capability('mod/rcontent:deleteresponses',$contextmodule)) {
				             $table->head[]  = '&nbsp;';
				             $table->align[] = 'center';
				             $table->wrap[]  = 'nowrap';
				             $table->size[]  = '10';
				         }
				
				         $table->head[]  = '&nbsp;';
				         $table->align[] = 'center';
				         $table->wrap[]  = 'nowrap';
				         $table->size[]  = '10';
				
				         $table->head[]  = get_string('name');
				         $table->align[] = 'left';
				         $table->wrap[]  = 'nowrap';
				         $table->size[]  = '*';
				
	                     $table->head[]= get_string('attempt','rcontent').' '.$maxattempts;
				         $table->align[] = 'center';
				         $table->wrap[] = 'nowrap';
				         $table->size[] = '*';
				
				         $table->head[]= get_string('started','rcontent');
				         $table->align[] = 'center';
				         $table->wrap[] = 'nowrap';
				         $table->size[] = '*';
				
				         $table->head[]= get_string('time','rcontent');
				         $table->align[] = 'center';
				         $table->wrap[] = 'nowrap';
				         $table->size[] = '*';
				                
				         $table->head[]= get_string('status','rcontent');
				         $table->align[] = 'center';
				         $table->wrap[] = 'nowrap';
				         $table->size[] = '*';
				
				         $table->head[]= get_string('score','rcontent').' '.$range;
				         $table->align[] = 'center';
				         $table->wrap[] = 'nowrap';
				         $table->size[] = '*';
				                
				         $table->head[]= get_string('comments','rcontent');
				         $table->align[] = 'center';
				         $table->wrap[] = 'nowrap';
				         $table->size[] = '*';
				              
				         if($showhreffield){
				             $table->head[]= '';
				             $table->align[] = 'center';
				             $table->wrap[] = 'nowrap';
				             $table->size[] = '*';
				         }
					
				         echo '<div id="scormtablecontainer">';
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                    	 print_paging_bar($count, $page, $limit, "report.php?id=".$id.$optionsparam."&amp;", "page", false);
//********** FI
				         if (has_capability('mod/rcontent:deleteresponses',$contextmodule)) {
				             echo '<form id="attemptsform" method="post" action="'.$_SERVER['REQUEST_URI'].'" onsubmit="var menu = document.getElementById(\'menuaction\'); return (menu.options[menu.selectedIndex].value == \'delete\' ? \''.addslashes_js(get_string('deleteattemptcheck','quiz')).'\' : true);">';
				             echo '<input type="hidden" name="id" value="'.$id.'">';
				             print_table($table);
				             echo '<a href="javascript:select_all_in(\'DIV\',null,\'scormtablecontainer\');">'.get_string('selectall', 'quiz').'</a> / ';
				             echo '<a href="javascript:deselect_all_in(\'DIV\',null,\'scormtablecontainer\');">'.get_string('selectnone', 'quiz').'</a> ';
				             echo '&nbsp;&nbsp;';
				             $options = array('delete' => get_string('delete'));
				             echo choose_from_menu($options, 'action', '', get_string('withselected', 'quiz'), 'if(this.selectedIndex > 0) submitFormById(\'attemptsform\');', '', true);
				             echo '<noscript id="noscriptmenuaction" style="display: inline;">';
				             echo '<div>';
				             echo '<input type="submit" value="'.get_string('go').'" /></div></noscript>';
				             echo '<script type="text/javascript">'."\n<!--\n".'document.getElementById("noscriptmenuaction").style.display = "none";'."\n-->\n".'</script>';
				             echo '</form>';
				         } else {
				             print_table($table);
				         }
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                         print_paging_bar($count, $page, $limit, "report.php?id=".$id.$optionsparam."&amp;", "page", false);
//********** FI

//MARSUPIAL *********** ELIMINAT -> Now the comprovation is done in the sql statment
//2011.05.19 @mmartinez
			            /*}else{
			            	notice(ges_string('norole','rcontent'));
			            }*/
//*********** FI
			            } else {
		            	    notice(get_string('nousers', 'rcontent'));
		                }
			        } else {
			            notice(get_string('nousersdata', 'rcontent'));
			        }
		            
//---------------------------------------------------------------------------------------------------------------------------------------
		        } else {
			        if (!empty($user)) {
// Units/Book details report for a given book, attempt and user
			            if (!empty($userdata)) {
			                $showhreffield=false; 	
			                //first print the general information
			              	print_simple_box_start('center');
			                echo $bookname.'<br><br>';
			                $table=new stdClass();
			                	                       
			                $row = array();       
			                $row[] = print_user_picture($user, $course->id, $userdata->picture, false, true);
			                $row[] = '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$user.'&amp;course='.$course->id.'">'.
			                         fullname($userdata).'</a>';
			                $row[] = $attempt;
			                $timetracks = rcontent_get_attempt_runtime($a, $user, $attempt);
				            $row[] = $timetracks->start;
			                $row[] = $timetracks->finish;
			                $grade = rcontent_grade_user_attempt($a, $user, $attempt);
//MARSUPIAL ********** MODIFICAT -> Take status value from the 1st position of the array
//2011.05.18 @mmartinez
						    if ($grade->status[0]!=''){
					            $row[] = get_string($grade->status[0],'rcontent');
//********** ORIGINAL
							/*if ($grade->status[0]!=''){
					            $row[] = get_string($grade->status[0],'rcontent');*/
//********** FI
					        } else {
					        	$row[] = '';
					        }
			                $row[] = $grade->justgrade;
			                $row[] = $grade->justcomments;
			                //added capabilities to control when students can view report
		                    if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
		                        $row[] = $grade->justurl;
		                        $showhreffield=true;
		                    }
// MARSUPIAL ************ AFEGIT -> Filter by status
// 2011.09.06 @mmartinez
                            if ($filterby != '' && $grade->status[0] != $filterby){
                            	$row[3] = "";
                            	$row[4] = "";
                            	$row[5] = get_string($filterby, 'rcontent');
                            	$row[6] = "";
                            	$row[7] = "";
                            	$row[8] = "";
                            	$row[9] = "";
                            }
// *********** FI
			                $table->data[] = $row;
//MARSUPIAL *********** AFEGIT -> If original status is POR_CORREGIR set background to red
//2011.05.18 @mmartinez
				            if ($grade->status[1] == "POR_CORREGIR"){
						        $table->rowclass[] = 'uuerror';
						    } else {
						        $table->rowclass[] = '';
						    }
//*********** FI
			                
			                $table->head=array('', 
			                    get_string('name'),
			                    get_string('attempt','rcontent').' '.$grade->maxattempts,
			                    get_string('started','rcontent'),
			                	get_string('time','rcontent'),
			                	get_string('status','rcontent'),
			                  	get_string('score','rcontent').' '.$grade->range,
			                  	get_string('comments','rcontent'));
			                if($showhreffield){  	
			                  	$table->head[]=get_string('url','rcontent');
			                }
			                $table->align=array('center','center','center','center','center','center','center','center','center');
			                $table->wrap = array('nowrap', 'nowrap','nowrap','nowrap','nowrap','nowrap','nowrap','nowrap','nowrap');
			                $table->size = array('*', '*', '*', '*', '*', '*', '*', '*', '*');
			                $table->width="100%";
			                        
			                print_table($table);
			                print_simple_box_end();
			                
			                //do bd search now to know how to set tab
	                        $sql="SELECT DISTINCT rg.unitid, rg.*, rbu.sortorder as sorto FROM {$CFG->prefix}rcontent_grades rg 
	                            INNER JOIN {$CFG->prefix}rcommon_books_units rbu ON rbu.id=rg.unitid
	                            WHERE rg.rcontentid='$rcontent->id' AND rg.userid=$user AND rg.attempt=$attempt 
	                            AND rg.unitid<>0";
// MARSUPIAL *********** AFEGIT -> Filter by statuss
// 2011.08.30 @mmartinez
			                if ($filterby != ''){
		                       	$sql .= " AND (rg.status = '{$filterby}' OR EXISTS (SELECT * FROM {$CFG->prefix}rcontent_grades u WHERE u.rcontentid={$rcontent->id} AND u.userid=$user AND u.attempt=$attempt AND u.unitid = rg.unitid AND u.activityid <> 0 AND u.status='{$filterby}' AND u.attempt=rg.attempt";
		                       	if ($user_rol[0]->shortname=='student'){
		                           	$sql .= " AND U.userid = ".$USER->id;
		                        }
		                       	$sql .= "))";
		                    }
// *********** FI
	                        $sql .= " ORDER BY sorto ASC, rg.activityid DESC";
	                        //echo $sql."<br><br>"; //just for debug mode
	                        
	                        $activate=array();
	                        $tabs=array(0=>array());
// MARSUPIAL *********** MODIFICAT -> Filter by status
// 2011.08.30 @mmartinez
				            $tabs[0][]=new tabobject('units', "$CFG->wwwroot/mod/rcontent/report.php?a=$a&amp;user=$user&amp;attempt=$attempt".$optionsparam, get_string('units','rcontent'));
// ********* ORIGINAL
				            //if(count_records_sql($sql)>0){
                                //$tabs[0][]=new tabobject('units', "$CFG->wwwroot/mod/rcontent/report.php?a=$a&amp;user=$user&amp;attempt=$attempt", get_string('units','rcontent'));
			                //}
// ********* FI				            
	                        if ($details = get_records_select('rcontent_grades_details',"rcontentid='$rcontent->id' AND userid=$user AND attempt=$attempt AND unitid=0 AND activityid=0 ORDER BY id")) {
// MARSUPIAL ********** MODIFICAT -> Filter by status
// 2011.08.30 @mmartinez
	                        	$tabs[0][]=new tabobject('details',"$CFG->wwwroot/mod/rcontent/report.php?a=$a&amp;user=$user&amp;attempt=$attempt&amp;action=details".$optionsparam, get_string('details','rcontent'));
// ********* ORIGINAL
                                //$tabs[0][]=new tabobject('details',"$CFG->wwwroot/mod/rcontent/report.php?a=$a&amp;user=$user&amp;attempt=$attempt&amp;action=details", get_string('details','rcontent'));
// ********* FI
	                        }
				            $tabs[1][]=new tabobject('', '', '');
				            $activate[]=(empty($action))?'units':'details';
				            print_tabs($tabs, '', array(), $activate);
				            echo "<p style = 'page-break-after: always;'></p>";
				                        
			                if (empty($action)){
//Units
			                  	if ($units = get_records_sql($sql)) {
			                  	    //echo "Units: "; print_r($units); echo "<br><br>";  //just for debug mode
			                  	    
				                    // Print units data
				                    $showhreffield=false;
				                    $table = new stdClass();
//MARSUPIAL *********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                    $page       = optional_param("page",0);
                                    $limit      = $CFG->rcontent_registersperreportpage;
                                    $count      = count($units);
                                    $startindex = ($limit*$page);
		            	            //set array pointer to the first array position
                                    if ($startindex > 0){
                             	        for ($i=0;$i<$startindex;$i++){
                             		        $tmp = next($units);
                             	        }
                                    }
                                    //go over the registres of the current page
//************ FI

			                        //first set the tbody to have the info for the theader
			                        $activities  = "";
			                        $unitdetails = "";
//MARSUPIAL ********** MODIFICAT -> Just show the registers of one page
//2011.05.18 @mmatinez
                                    for($i = $startindex; $i < ($startindex+$limit); $i++) {
//********** ORIGINAL
                                    //foreach ($units as $unit) {
//*********** FI
//MARSUPIAL ********** AFEGIT -> Get the next value of the array
//2011.05.19 @mmartinez
				     			        if ($i > count($units)-1){ 	
								            break;
								        }
								        if ($i == $startindex){
								 	        $unit = current($units);
								        } else {
								 	        $unit = next($units);
								        }
//************ FI
				                        $row = array();
										if($unitname=get_record_select('rcommon_books_units',"bookid=$rcontent->bookid AND id=$unit->unitid",'name')){
											$unitname=$unitname->name;
										}else{
											$unitname=$unit->unitid;
										}
				                        $row[]=$unitname;
				                        $timetracks = rcontent_get_attempt_runtime($a, $user, $attempt, $unit->unitid, '', $unit->starttime);
				                        $row[] = $timetracks->start;
				                        $row[] = $timetracks->finish;
				                        $grade=rcontent_grade_user_attempt($a, $user, $attempt, $unit->unitid, '', '', $unit->starttime);
//MARSUPIAL ********** MODIFICAT -> Take status value from the 1st position of the array
//2011.05.18 @mmartinez
									    if ($grade->status[0]!=''){
								            $row[] = get_string($grade->status[0],'rcontent');
//********** ORIGINAL
										/*if ($grade->status[0]!=''){
								            $row[] = get_string($grade->status[0],'rcontent');*/
//********** FI
								        } else {
								        	$row[] = '';
								        }
				                        $row[] = $grade->grade.' '.$grade->range;
				                        $row[] = $grade->comments;
				                        //added capabilities to control when students can view report
		                                $href='';
		                                if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
		                                    $href.= $grade->url;
		                                    $showhreffield=true;
		                                }
		                                if(has_capability('mod/rcontent:updatescore', get_context_instance(CONTEXT_MODULE, $cm->id))){
		                                	if(get_records_select('rcontent_grades',"rcontentid=$unit->rcontentid AND userid=$unit->userid AND unitid=$unit->unitid AND activityid=0 AND attempt=$unit->attempt")){
		                        	            $href.=' '.link_to_popup_window ('/mod/rcontent/report.php?a='.$a.'&amp;b='.$unit->unitid.'&amp;user='.$unit->userid.'&amp;attempt='.$attempt.'&amp;action=update', 
		                                            'grade'.$unit->userid, get_string('update'), 600, 780, get_string('update'), 'none', true, 
		                                            'button'.$unit->userid);
		                                	}
		                        	        $showhreffield=true;
		                                }
		                                if($showhreffield){
		                                    $row[] = $href;
		                                }
		                                //test if there are activities or details to show the link or no
		                                $href='';
		                                $unitdetails=get_records_select('rcontent_grades_details',"rcontentid='$rcontent->id' AND userid=$user AND attempt=$attempt AND unitid=$unit->unitid AND activityid=0 ORDER BY id");
		                                $activities=get_records_select('rcontent_grades',"rcontentid='$rcontent->id' AND userid=$user AND attempt=$attempt AND unitid=$unit->unitid AND activityid<>0 ORDER BY id");
		                                
		                                if($activities){
// MARSUPIAL ********** MODIFICAT -> Filter by status
// 2011.08.30 @mmartinez
		                                	$href = '<a href="'.$CFG->wwwroot.'/mod/rcontent/report.php?a='.$a.'&amp;b='.$unit->unitid.'&amp;user='.$user.'&amp;attempt='.$attempt.$optionsparam.'">'.get_string('viewactivities','rcontent').'</a>';
// ********* ORIGINAL 
                                            //$href = '<a href="'.$CFG->wwwroot.'/mod/rcontent/report.php?a='.$a.'&amp;b='.$unit->unitid.'&amp;user='.$user.'&amp;attempt='.$attempt.'">'.get_string('viewactivities','rcontent').'</a>';
// ********* FI
		                                }else if ($unitdetails){
// MARSUPIAL ********** MODIFICAT -> Filter by status
// 2011.08.30 @mmartinez
		                                    $href = '<a href="'.$CFG->wwwroot.'/mod/rcontent/report.php?a='.$a.'&amp;b='.$unit->unitid.'&amp;user='.$user.'&amp;attempt='.$attempt.'&amp;action=details'.$optionsparam.'">'.get_string('viewdetails','rcontent').'</a>';
// ********* ORIGINAL
                                            //$href = '<a href="'.$CFG->wwwroot.'/mod/rcontent/report.php?a='.$a.'&amp;b='.$unit->unitid.'&amp;user='.$user.'&amp;attempt='.$attempt.'&amp;action=details'.'">'.get_string('viewdetails','rcontent').'</a>';
// ********* FI	
		                                }
		                                if ($activities || $unitdetails){
		                                    $row[]=$href;
		                                }          
// MARSUPIAL ********** AFEGIT -> Filter by status
// 2011.08.20 @mmartinez
				                         if ($filterby != '' && $grade->status[0] != $filterby){
				                         	$row[1] = "";
			                            	$row[2] = "";
			                            	$row[3] = get_string($filterby, 'rcontent');
			                            	$row[4] = "";
			                            	$row[5] = "";
				                         }
// ********** FI   
				                        $table->data[] = $row;
//MARSUPIAL *********** AFEGIT -> If original status is POR_CORREGIR set background to red
//2011.05.18 @mmartinez
							            if ($grade->status[1] == "POR_CORREGIR"){
									        $table->rowclass[] = 'uuerror';
									    } else {
									        $table->rowclass[] = '';
									    }
//*********** FI
				                    }
				                    
				                    $table->head = array(get_string('unit','rcontent'), 
				                        get_string('started','rcontent'), 
				                        get_string('time','rcontent'),
				                        get_string('status','rcontent'), 
				                        get_string('score','rcontent'), 
				                        get_string('comments','rcontent'));
				                    if($showhreffield){
				                        $table->head[] = '';
				                    }
				                    if ($activities || $unitdetails){
				                        $table->head[] = get_string('activity','rcontent');
				                    }
				                    $table->align = array('center', 'center','center','center','center','center','center','center');
				                    $table->wrap = array('nowrap', 'nowrap','nowrap','nowrap','nowrap','nowrap','nowrap','nowrap');
				                    $table->size = array('*', '*', '*', '*', '*', '*', '*', '*');
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                    print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;user=$user&amp;attempt=$attempt".$optionsparam."&amp;", "page", false);
//********** FI

				                    print_table($table);
				                    
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                    print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;user=$user&amp;attempt=$attempt".$optionsparam."&amp;", "page", false);
//********** FI
			                    }else{
			             	        notice(get_string('nounits','rcontent'));
			                    }
			                }else if($action=="details"){
//Books details
			                	if ($details) {
			                		// Print details data
			                		$showhreffield=false;
				                    $table = new stdClass();
//MARSUPIAL *********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                    $page       = optional_param("page",0);
                                    $limit      = $CFG->rcontent_registersperreportpage;
                                    $count      = count($details);
                                    $startindex = ($limit*$page);
		            	            //set array pointer to the first array position
                                    if ($startindex > 0){
                             	        for ($i=0;$i<$startindex;$i++){
                             		        $tmp = next($details);
                             	        }
                                    }
                                    //go over the registres of the current page
//************ FI

//MARSUPIAL ********** MODIFICAT -> Just show the registers of one page
//2011.05.18 @mmatinez
                                    for($i = $startindex; $i < ($startindex+$limit); $i++) {
//********** ORIGINAL
				                    //foreach ($details as $detail) {
//********** FI

//MARSUPIAL ********** AFEGIT -> Get the next value of the array
//2011.05.19 @mmartinez
				     			        if ($i > count($details)-1){	
								            break;
								        }
								        if ($i == $startindex){
								 	        $detail = current($details);
								        } else {
								 	        $detail = next($details);
								        }
//************ FI
				                    	
				                        $row = array();
				                        $grade=rcontent_grade_details_user_attempt($detail->id, $a, $user, $attempt);
				                        $row[] = $grade->description;
				                        $timetracks = rcontent_details_get_attempt_runtime($detail->id);
				                        $row[] = $timetracks->start;
				                        $row[] = $timetracks->finish;
				                        $row[] = $grade->grade.' '.$grade->range;
				                        $row[] = $grade->weight;
				                        //added capabilities to control when students can view report
				                        if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
				                            $row[] = $grade->url;
				                            $showhreffield=true;
				                        }			                                                    
				                        $table->data[] = $row;
				                    }
				                        
				                    $table->head = array(get_string('description','rcontent'),get_string('started','rcontent'), get_string('time','rcontent'), 
				                        get_string('score','rcontent'),get_string('weight','rcontent').' '.$grade->totalweight);
				                    if($showhreffield){
				                        $table->head[]=get_string('url','rcontent');
				                    }
				                    $table->align = array('center','center','center','center','center','center');
				                    $table->wrap = array('nowrap','nowrap','nowrap','nowrap','nowrap','nowrap');
				                    $table->size = array('*', '*', '*', '*', '*', '*');
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                    print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;user=$user&amp;attempt=$attempt&amp;action=$action".$optionsparam."&amp;", "page", false);
//********** FI
				                    print_table($table);
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                    print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;user=$user&amp;attempt=$attempt&amp;action=$action".$optionsparam."&amp;", "page", false);
//********** FI
			                	}else{
			                		notice(get_string('nodetails','rcontent'));
			                	}
		                    }
			            }else {
		                    notice(get_string('nousersdata','rcontent'));
		                }
			        } else {
			            notice(get_string('nousers','rcontent'));
			        }
		        }
//---------------------------------------------------------------------------------------------------------------------------------
		    } else {
// Activities/Unit details report for a given book, unit, attempt and user 
		        if (!empty($user)) {
			        if (!empty($userdata)) {
			            $showhreffield=false; 
			            //first print the general information
			          	print_simple_box_start('center');
			            echo $unitname.'<br><br>';  
			            $table=new stdClass();
			                        
			            $row = array();		                       
			            $row[] = print_user_picture($user, $course->id, $userdata->picture, false, true);
			            $row[] = '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$user.'&amp;course='.$course->id.'">'.
			                         fullname($userdata).'</a>';
			            $row[] = $attempt;
			            $timetracks = rcontent_get_attempt_runtime($a, $user, $attempt, $b);
			            $row[] = $timetracks->start;
			            $row[] = $timetracks->finish;
			            $grade = rcontent_grade_user_attempt($a, $user, $attempt, $b);
//MARSUPIAL ********** MODIFICAT -> Take status value from the 1st position of the array
//2011.05.18 @mmartinez
					    if ($grade->status[0]!=''){
				            $row[] = get_string($grade->status[0],'rcontent');
//********** ORIGINAL
						/*if ($grade->status[0]!=''){
				            $row[] = get_string($grade->status[0],'rcontent');*/
//********** FI
				        } else {
				        	$row[] = '';
				        }
			            $row[] = $grade->justgrade;
			            $row[] = $grade->justcomments;
			            //added capabilities to control when students can view report
			            if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
			                $row[] = $grade->justurl;
			                $showhreffield=true;
			            }	
// MARSUPIAL ************ AFEGIT -> Filter by status
// 2011.09.06 @mmartinez
                        if ($filterby != '' && $grade->status[0] != $filterby){
                            $row[3] = "";
                            $row[4] = "";
                            $row[5] = get_string($filterby, 'rcontent');
                            $row[6] = "";
                            $row[7] = "";
                            $row[8] = "";
                            $row[9] = "";
                        }
// *********** FI	                       
			            $table->data[] = $row; 
//MARSUPIAL *********** AFEGIT -> If original status is POR_CORREGIR set background to red
//2011.05.18 @mmartinez
			            if ($grade->status[1] == "POR_CORREGIR"){
					        $table->rowclass[] = 'uuerror';
					    } else {
					        $table->rowclass[] = '';
					    }
//*********** FI
			                       
			            $table->head=array('',get_string('name'),get_string('attempt','rcontent').' '.$grade->maxattempts, get_string('started','rcontent'),
			            	get_string('time','rcontent'),get_string('status','rcontent'),get_string('score','rcontent').' '.$grade->range,
			               	get_string('comments','rcontent'));
			            if($showhreffield){
			            	$table->head[]=get_string('url','rcontent');
			            }
			            $table->align=array('center','center','center','center','center','center','center','center','center');
			            $table->wrap = array('nowrap', 'nowrap','nowrap','nowrap','nowrap','nowrap','nowrap','nowrap','nowrap');
			            $table->size = array('*', '*', '*', '*', '*', '*', '*', '*', '*');
			            $table->width="100%";
			                        
			            print_table($table);
			            print_simple_box_end();
			            
			            
			            $sql="SELECT rg.* FROM {$CFG->prefix}rcontent_grades rg 
	                                INNER JOIN {$CFG->prefix}rcommon_books_activities rba ON rba.id=rg.activityid
	                                WHERE rg.rcontentid='$rcontent->id' AND rg.userid=$user AND rg.attempt=$attempt 
	                                AND rg.unitid=$b AND rg.activityid<>0";
// MARSUPIAL *********** AFEGIT -> Filter by statuss
// 2011.08.30 @mmartinez
			            if ($filterby != ''){
		                    $sql .= " AND rg.status = '".$filterby."'";
		                }
// *********** FI
//MARSUPIAL ************ MODIFICAT -> Fixed bug in load activities sql statment
//2011.10.25 @mmartinez
			            $sql .= " ORDER BY rba.sortorder ASC, rg.starttime ASC";
//*********** ORIGINAL
                        //$sql .= "ORDER BY rba.sortorder ASC";
//*********** FI
			            
			            
			            $activate=array();
			            $tabs=array(0=>array());			            
// MARSUPIAL ********* MODIFICAT -> Filter by statuss
// 2011.08.30 @mmartinez
			            $tabs[0][]=new tabobject('activities', "$CFG->wwwroot/mod/rcontent/report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt".$optionsparam, get_string('activities','rcontent'));	
// ********* ORIGINAL
			            //if (count_records_sql($sql)>0){
                            //$tabs[0][]=new tabobject('activities', "$CFG->wwwroot/mod/rcontent/report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt", get_string('activities','rcontent'));
			            //}
// ********* FI			            		            
			            if ($details = get_records_select('rcontent_grades_details',"rcontentid='$rcontent->id' AND userid=$user AND attempt=$attempt AND unitid=$b AND activityid=0 ORDER BY id")){
// MARSUPIAL *********** MODIFICAT -> Filter by statuss
// 2011.08.30 @mmartinez
			              	$tabs[0][]=new tabobject('details',"$CFG->wwwroot/mod/rcontent/report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt&amp;action=details".$optionsparam, get_string('details','rcontent'));
// ********** ORIGINAL
                            //$tabs[0][]=new tabobject('details',"$CFG->wwwroot/mod/rcontent/report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt&amp;action=details",get_string('details','rcontent'));
// ********** FI
			            }
				        $tabs[1][]=new tabobject('', '', '');
				        $activate[]=(empty($action))?'activities':'details';
				        print_tabs($tabs, '', array(), $activate);
				        echo "<p style = 'page-break-after: always;'></p>";
				                        
			            if (empty($action)){
//Activities
			              	if ($activities = get_records_sql($sql)) {
				                // Print units data
				                $showhreffield=false;
				                $table = new stdClass();
//MARSUPIAL *********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                $page       = optional_param("page",0);
                                $limit      = $CFG->rcontent_registersperreportpage;
                                $count      = count($activities);
                                $startindex = ($limit*$page);
		          	            //set array pointer to the first array position
                                if ($startindex > 0){
                           	        for ($i=0;$i<$startindex;$i++){
                           		        $tmp = next($activities);
                         	        }
                                }
                                //go over the registres of the current page
//************ FI

//MARSUPIAL ********** MODIFICAT -> Just show the registers of one page
//2011.05.18 @mmatinez
                                for($i = $startindex; $i < ($startindex+$limit); $i++) {
//********** ORIGINAL
				                //foreach ($activities as $activity) {
//********** FI

//MARSUPIAL ********** AFEGIT -> Get the next value of the array
//2011.05.19 @mmartinez
				    		        if ($i > count($activities)-1){	
							            break;
							        }
							        if ($i == $startindex){
							 	        $activity = current($activities);
							        } else {
							 	        $activity = next($activities);
				    		        }
//************ FI
				                    $row = array();
				                    
				                    if($activityname=get_record_select('rcommon_books_activities',"bookid=$rcontent->bookid AND unitid=$b AND id=$activity->activityid",'name')){
									    $activityname=$activityname->name;
									}else{
										$activityname=$activity->activityid;
									}
				                    $row[]=$activityname;
				                    $timetracks = rcontent_get_attempt_runtime($a, $user, $attempt, $b, $activity->activityid, $activity->starttime);
				                    $row[] = $timetracks->start;
				                    $row[] = $timetracks->finish;
				                    $grade=rcontent_grade_user_attempt($a, $user, $attempt, $b, $activity->activityid, $activity->id, $activity->starttime);
//MARSUPIAL ********** MODIFICAT -> Take status value from the 1st position of the array
//2011.05.18 @mmartinez
				                    if ($grade->status[0]!=''){
			                            $row[] = get_string($grade->status[0],'rcontent');
//********** ORIGINAL
									/*if ($grade->status[0]!=''){
			                            $row[] = get_string($grade->status[0],'rcontent');*/
//********** FI	
			                        } else {
			        	                $row[] = '';
			                        }
				                    $row[] = $grade->grade.' '.$grade->range;
				                    $row[] = $grade->comments;
				                    //added capabilities to control when students can view report
		                            $href='';
		                            if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
		                                $href.= $grade->url;
		                                $showhreffield=true;
		                            }
		                            if(has_capability('mod/rcontent:updatescore', get_context_instance(CONTEXT_MODULE, $cm->id))){
		                        	    $href.=' '.link_to_popup_window ('/mod/rcontent/report.php?a='.$a.'&amp;b='.$b.'&amp;c='.$activity->activityid.'&amp;user='.$activity->userid.'&amp;attempt='.$attempt.'&amp;action=update', 
		                                    'grade'.$activity->userid, get_string('update'), 600, 780, get_string('update'), 'none', true, 
		                                    'button'.$activity->userid);
		                        	    $showhreffield=true;
		                            }
		                            if($showhreffield){
		                                $row[] = $href;
		                            }
				                    //test if there are activities or details to show the link or no
				                    $href='';
		                            $activitiesdetails=get_records_select('rcontent_grades_details',"rcontentid='$a' AND userid=$user AND attempt=$attempt AND unitid=$b AND activityid=$activity->activityid ORDER BY id");
		                            if($activitiesdetails){
		                             	$href = '<a href="'.$CFG->wwwroot.'/mod/rcontent/report.php?a='.$a.'&amp;b='.$b.'&amp;c='.$activity->activityid.'&amp;user='.$user.'&amp;attempt='.$attempt.'">'.get_string('viewdetails','rcontent').'</a>';
		                             	$row[]=$href;
		                            }
				                    //print_r($row); echo "<br><br>";
				                    $table->data[] = $row; 
//MARSUPIAL *********** AFEGIT -> If original status is POR_CORREGIR set background to red
//2011.05.18 @mmartinez
				                    if ($grade->status[1] == "POR_CORREGIR"){ 
				                        $table->rowclass[] = 'uuerror';
				                    } else {
				                        $table->rowclass[] = '';
				                    }
//************ FI
				                }
				                        
				                $table->head = array(get_string('activity','rcontent'), get_string('started','rcontent'), get_string('time','rcontent'),
				                    get_string('status','rcontent'), get_string('score','rcontent'), 
				                    get_string('comments','rcontent'));
				                if($showhreffield){
				                	$table->head[]='';
				                }
				                if($href!=''){
				                    $table->head[]=get_string('details','rcontent');
				                }
				                $table->align = array('center', 'center','center','center','center','center','center','center');
				                $table->wrap = array('nowrap', 'nowrap','nowrap','nowrap','nowrap','nowrap','nowrap','nowrap');
				                $table->size = array('*', '*', '*', '*', '*', '*', '*', '*');
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt".$optionsparam."&amp;", "page", false);
//********** FI
				                print_table($table);
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt".$optionsparam."&amp;", "page", false);
//********** FI
			                }else{
			         	        notice(get_string('noactivities','rcontent'));
			                }
			            }else if($action=="details"){
//Unit details                    

			            	if ($details = get_records_select('rcontent_grades_details',"rcontentid='$rcontent->id' AND userid=$user AND attempt=$attempt AND unitid=$b AND activityid=0 ORDER BY id")) {
			            		// Print details data
			            		$showhreffield=false;
				                $table = new stdClass();
//MARSUPIAL *********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                $page       = optional_param("page",0);
                                $limit      = $CFG->rcontent_registersperreportpage;
                                $count      = count($details);
                                $startindex = ($limit*$page);
		          	            //set array pointer to the first array position
                                if ($startindex > 0){
                           	        for ($i=0;$i<$startindex;$i++){
                           		        $tmp = next($details);
                         	        }
                                }
                                //go over the registres of the current page
//************ FI

//MARSUPIAL ********** MODIFICAT -> Just show the registers of one page
//2011.05.18 @mmatinez
                                for($i = $startindex; $i < ($startindex+$limit); $i++) {
//********** ORIGINAL
				                //foreach ($details as $detail) {
//********** FI

//MARSUPIAL ********** AFEGIT -> Get the next value of the array
//2011.05.19 @mmartinez
				    		        if ($i > count($details)-1){	
							            break;
							        }
							        if ($i == $startindex){
							 	        $detail = current($details);
							        } else {
							 	        $detail = next($details);
				    		        }
//************ FI
				                    $row = array();			
				                    $grade=rcontent_grade_details_user_attempt($detail->id, $a, $user, $attempt, false, $b);  //bug: saca siempre el mismo valor
				                    $row[]=$grade->description;
				                    $timetracks = rcontent_details_get_attempt_runtime($detail->id);   //bug: saca siempre el mismo valor
				                    $row[] = $timetracks->start;
				                    $row[] = $timetracks->finish;
				                    $row[] = $grade->grade.' '.$grade->range;
				                    $row[] = $grade->weight;
				                    //added capabilities to control when students can view report
				                    if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
				                        $row[] = $grade->url;
				                        $showhreffield=true;
				                    }			                                                    
				                    $table->data[] = $row;
				                }
				                        
				                $table->head = array(get_string('description','rcontent'),get_string('started','rcontent'), get_string('time','rcontent'), 
				                get_string('score','rcontent'),get_string('weight','rcontent').' '.$grade->totalweight);
				                if($showhreffield){
				                	$table->head[]=get_string('url','rcontent');
				                }
				                $table->align = array('center','center','center','center','center','center');
				                $table->wrap = array('nowrap','nowrap','nowrap','nowrap','nowrap','nowrap');
				                $table->size = array('*', '*', '*', '*', '*', '*');
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt&amp;action=$action".$optionsparam."&amp;", "page", false);
//********** FI				                
				                print_table($table);
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                                print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;b=$b&amp;user=$user&amp;attempt=$attempt&amp;action=$action".$optionsparam."&amp;", "page", false);
//********** FI
			            	}else{
			            		notice(get_string('nodetails','rcontent'));
			            	}
		                }
			        }else {
		                notice(get_string('nousersdata.','rcontent'));
		            }
			    } else {
			        notice(get_string('nousers.','rcontent'));
			    }
		    }
//--------------------------------------------------------------------------------------------------------------------------------	        
	    }else{
//activity details
	        if (!empty($user)) {
		        if (!empty($userdata)) {
			                 	
		            //first print the general information
			        print_simple_box_start('center');
			        
			        echo $activityname.'<br><br>';
			        
			        $showhreffield=false;
			        $table=new stdClass();
			                       
			        $row = array();              
			        $row[] = print_user_picture($user, $course->id, $userdata->picture, false, true);
			        $row[] = '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$user.'&amp;course='.$course->id.'">'.
			             fullname($userdata).'</a>';
			        $row[] = $attempt;
			        $timetracks = rcontent_get_attempt_runtime($a, $user, $attempt, $b, $c);
			        $row[] = $timetracks->start;
			        $row[] = $timetracks->finish;
			        $grade = rcontent_grade_user_attempt($a, $user, $attempt, $b, $c);
//MARSUPIAL ********** MODIFICAT -> Take status value from the 1st position of the array
//2011.05.18 @mmartinez
				    if ($grade->status[0]!=''){
			            $row[] = get_string($grade->status[0],'rcontent');
//********** ORIGINAL
					/*if ($grade->status[0]!=''){
			            $row[] = get_string($grade->status[0],'rcontent');*/
//********** FI
			        } else {
			        	$row[] = '';
			        }
			        $row[] = $grade->justgrade;
			        $row[] = $grade->justcomments;
			        //added capabilities to control when students can view report
			        if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
			            $row[] = $grade->justurl;
			            $showhreffield=true;
			        }    
			        $table->data[] = $row;
//MARSUPIAL *********** AFEGIT -> If original status is POR_CORREGIR set background to red
//2011.05.18 @mmartinez
		            if ($grade->status[1] == "POR_CORREGIR"){
				        $table->rowclass[] = 'uuerror';
				    } else {
				        $table->rowclass[] = '';
				    }
//*********** FI            
			        $table->head=array('',get_string('name'),get_string('attempt','rcontent').' '.$grade->maxattempts, get_string('started','rcontent'),
			        	get_string('time','rcontent'),get_string('status','rcontent'),get_string('score','rcontent').' '.$grade->range, 
			        	get_string('comments','rcontent'));
			        if($showhreffield){
			        	$table->head[]=get_string('url','rcontent');
			        }
			        $table->align=array('center','center','center','center','center','center','center','center','center');
			        $table->wrap = array('nowrap', 'nowrap','nowrap','nowrap','nowrap','nowrap','nowrap','nowrap','nowrap');
			        $table->size = array('*', '*', '*', '*', '*', '*', '*', '*', '*');
			        $table->width="100%";
			                        
			        print_table($table);
			                        
			        print_simple_box_end();
	                //print the details of the activity
			        if ($details = get_records_select('rcontent_grades_details',"rcontentid='$rcontent->id' AND userid=$user AND attempt=$attempt AND unitid=$b AND activityid=$c ORDER BY id")) {
			            // Print details data
			            $showhreffield=false;
				        $table = new stdClass();
//MARSUPIAL *********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                        $page       = optional_param("page",0);
                        $limit      = $CFG->rcontent_registersperreportpage;
                        $count      = count($details);
                        $startindex = ($limit*$page);
		                //set array pointer to the first array position
                        if ($startindex > 0){
                   	        for ($i=0;$i<$startindex;$i++){
                   		        $tmp = next($details);
                   	        }
                        }
                        //go over the registres of the current page
//************ FI

//MARSUPIAL ********** MODIFICAT -> Just show the registers of one page
//2011.05.18 @mmatinez
                        for($i = $startindex; $i < ($startindex+$limit); $i++) {
//********** ORIGINAL
				        //foreach ($details as $detail) {
//********** FI

//MARSUPIAL ********** AFEGIT -> Get the next value of the array
//2011.05.19 @mmartinez
				            if ($i > count($details)-1){	
					            break;
					        }
					        if ($i == $startindex){
					 	        $detail = current($details);
					        } else {
				     	        $detail = next($details);
				 	        }
//************ FI
				            $row = array();			
			                $grade=rcontent_grade_details_user_attempt($detail->id, $a, $user, $attempt, false, $b, $c);
			                $row[]=$grade->description;
			                $timetracks = rcontent_details_get_attempt_runtime($detail->id);
			                $row[] = $timetracks->start;
			                $row[] = $timetracks->finish;
			                $row[] = $grade->grade.' '.$grade->range;
			                $row[] = $grade->weight;
			                //added capabilities to control when students can view report
			                if(has_capability('mod/rcontent:viewresult', get_context_instance(CONTEXT_MODULE, $cm->id))){
			                    $row[] = $grade->url;
			                    $showhreffield=true;
			                }			                                                    
			                $table->data[] = $row;
			            }
				                        
				        $table->head = array(get_string('description','rcontent'),get_string('started','rcontent'), get_string('time','rcontent'), 
				        get_string('score','rcontent'), get_string('weight','rcontent').' '.$grade->totalweight);
				        if($showhreffield){
				        	$table->head[]=get_string('url','rcontent');
				        }
				        $table->align = array('center','center','center','center','center','center');
				        $table->wrap = array('nowrap','nowrap','nowrap','nowrap','nowrap','nowrap');
				        $table->size = array('*', '*', '*', '*', '*', '*');
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                        print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;b=$b&amp;c=$c&amp;user=$user&amp;attempt=$attempt".$optionsparam."&amp;", "page", false);
//********** FI		
			            print_table($table);
//MARSUPIAL ********** AFEGIT -> Add pagination
//2011.05.19 @mmartinez
                        print_paging_bar($count, $page, $limit, "report.php?a=$a&amp;b=$b&amp;c=$c&amp;user=$user&amp;attempt=$attempt".$optionsparam."&amp;", "page", false);
//********** FI	
		            }else{
		                notice(get_string('nodetails','rcontent'));
		            }
		                    
		        }else {
		            notice(get_string('nousersdata','rcontent'));
		        }
		    } else {
		        notice(get_string('nousers','rcontent'));
		    }
	    }
        if (empty($noheader)) {
	       print_footer($course);
	    }
    }else{
//Popup to update a user grade info
		if ($action=='update'){
			if(empty($b)){
				if(empty($a)){
					$rcontentid=$rcontent->id;
					$unitid='';
					$activityid='';
				}else{
					$rcontentid=$a;
					$unitid=$b;
					$activityid='';
				}
			}else{
				$rcontentid=$a;
				$unitid=$b;
				$activityid=$c;
			}
//MARSUPIAL ********** MODIFICAT -> Add parameter idgrade to the loader data
//2011.05.20 @mmartinez
			if ($grade=rcontent_grade_user_attempt($rcontentid,$user,$attempt,$unitid,$activityid, $update)){
//********* ORIGINAL
			//if ($grade=rcontent_grade_user_attempt($rcontentid,$user,$attempt,$unitid,$activityid)){
//********* FI
				
			    global $USER;
		        $teacher = $USER;
			    // Set up things for a HTML editor if it's needed
				if ($usehtmleditor = can_use_html_editor()) {
				    $defaultformat = FORMAT_HTML;
				} else {
				    $defaultformat = FORMAT_MOODLE;
				}
				
				//set strings
				$struserfullname=fullname($userdata, true);
				
				print_header(get_string('feedback', 'rcontent').':'.$struserfullname.':'.format_string($rcontent->name));
				
				echo '<table cellspacing="0" class="feedback assignmentold" >';
				    echo '<tr><td class="picture teacher">';
		            
		            print_user_picture($teacher, $course->id, $teacher->picture);
		            echo '</td>';
		            echo '<td class="content">';
			        echo '<form id="submitform" action="report.php?action=saveupdate" method="post">';
			            echo '<input type="hidden" name="rcontentid" value="'.$rcontent->id.'">';
			            if (empty($id)){
			            	$id=$cm->id;
			            }
//MARSUPIAL *********** AFEGIT -> Control when idgrade is received
//2011.05.20 @mmartinez
			            if (empty($update)){
			            	$update = $grade->id;
			            }
//*********** FI
			            echo '<input type="hidden" name="id" value="'.$id.'">';
			            echo '<input type="hidden" name="user" value="'.$user.'">';
			            echo '<input type="hidden" name="course" value="'.$course->id.'">';
//MARSUPIAL ********** MODIFICAT -> Set the getted idgrade
//2011.05.20 @mmartinez
			            echo '<input type="hidden" name="idgrade" value="'.$update.'">';
//********** ORIGINAL
                        //echo '<input type="hidden" name="idgrade" value="'.$grade->id.'">';
//********** FI
				        if(isset($a)){
				    	    echo '<input type="hidden" name="a" value="'.$a.'">';
				        }
			            if(isset($b)){
				    	    echo '<input type="hidden" name="b" value="'.$b.'">';
				        }
			            if(isset($c)){
				    	    echo '<input type="hidden" name="c" value="'.$c.'">';
				        }
				        
				        //print student info
				        echo '<div class="from">';
				        echo '<div class="fullname">'.fullname($teacher, true).'</div>';
				        echo '<br>';
				        echo '</div>';
				        
				        //print editable fields
				        echo '<label for="txtgrade">'.get_string('score','rcontent').'</label> <input type="text" id="txtgrade" name="txtgrade" value="'.$grade->justgrade.'" size="3">';
				        print_textarea($usehtmleditor, 14, 58, 0, 0, 'submissioncomment', $grade->fullcomments, $course->id);
					    if ($usehtmleditor) {
			                echo '<input type="hidden" name="format" value="'.FORMAT_HTML.'" />';
			            } else {
			                echo '<div class="format">';
			                choose_from_menu(format_text_menu(), "format", 1, "");
			                helpbutton("textformat", get_string("helpformatting"));
			                echo '</div>';
			            }
			            
			            // Print Buttons in Single Vie
				        echo '<div class="buttons">';
				        echo '<input type="submit" name="submit" value="'.get_string('savechanges').'" onclick = "document.getElementById(\'submitform\').menuindex.value = document.getElementById(\'submitform\').grade.selectedIndex" />';
				        echo '<input type="submit" name="cancel" value="'.get_string('cancel').'" />';
				        echo '</div>';
			            
				        echo '</form>';
				    echo '</td></tr>';
		
		            ///End of teacher info row, Start of student info row
		            echo '<tr>';
		            echo '<td class="picture user">';
		            print_user_picture($user, $course->id, $userdata->picture);
		            echo '</td>';
		            echo '<td class="topic">';
		            echo '<div class="from">';
	                echo '<div class="fullname">'.$struserfullname.'</div>';
	                echo '</div></div>';
		            echo '</td>';
		            echo '</tr>';
				echo '</table>';
			    if ($usehtmleditor) {
                    use_html_editor();
                }
			}else{
				notice(get_string('nodetails','rcontent'));
			}
		    if (empty($noheader)) {
	           print_footer($course);
	        }
		}else if($action=='saveupdate'){
			//save data in bd
		    if (rcontent_update_grade_instance()){
			    //IE needs proper header with encoding
                print_header(get_string('feedback', 'rcontent').':'.format_string($rcontent->name));
                print_heading(get_string('changessaved'));
		    }
            close_window();
		}
        
    }
    
?>
