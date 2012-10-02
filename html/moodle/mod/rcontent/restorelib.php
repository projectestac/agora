<?php 
    //This php script contains all the stuff to backup/restore
    //rcontent mods

    //This is the "graphical" structure of the rcontent mod:
    //
    //                    rcontent            rcontent_grades_details                     
    //                   (CL,pk->id)---------(UL,pk->id,fk->rcontentid)
    //                        |                                         
    //                        |                                         
    //                        | 
    //                 rcontent_grades
    //             (UL,pk->id,fk->rcontentid)
    //
    // Meaning: pk->primary key field of the table
    //          fk->foreign key to link with parent
    //          nt->nested field (recursive data)
    //          CL->course level info
    //          UL->user level info
    //          files->table may have files)
    //
    //-----------------------------------------------------------

    //This function executes all the restore procedure about this mod
    function rcontent_restore_mods($mod,$restore) {

        global $CFG;

        $status = true;

        //Get record from backup_ids
        $data = backup_getid($restore->backup_unique_code,$mod->modtype,$mod->id);

        if ($data) {
            //Now get completed xmlized object
            $info = $data->info;
            //traverse_xmlize($info);                                                                     //Debug
            //print_object ($GLOBALS['traverse_array']);                                                  //Debug
            //$GLOBALS['traverse_array']="";                                                              //Debug
          
            //Now, build the rcontent record structure
            $rcontent->course = $restore->course_id;
            $rcontent->name = backup_todb($info['MOD']['#']['NAME']['0']['#']);
            $rcontent->summary = backup_todb($info['MOD']['#']['SUMMARY']['0']['#']);
            
            //search if isset level, book, units and activities in bd
            $levelid=backup_todb($info['MOD']['#']['LEVELCODE']['0']['#']);
            if(!$level=get_record('rcommon_level','code',$levelid)){
            	//mostramos mensaje de error
            	notify("Level code: $levelid not found in bd for activity name: $rcontent->name!");
            }else{
            	$levelid=$level->id;
            }
            $rcontent->levelid = $levelid;
            
            $booktype='isbn';
            $bookid=backup_todb($info['MOD']['#']['BOOKID']['0']['#']);
            if(!$book=get_record('rcommon_books','isbn',$bookid)){
            	//mostramos mensaje de error
            	notify("Book $booktype: $bookid not found in bd for activity name: $rcontent->name");
            }else{
            	$booktype='id';
            	$bookid=$book->id;
            }
            $rcontent->bookid = $bookid;
            
            $unittype='code';
            $unitid=backup_todb($info['MOD']['#']['UNITCODE']['0']['#']);
            if($unitid!=''){
            	if(!$unit=get_record('rcommon_books_units','bookid',$bookid,'code',$unitid)){
            		//mostramos mensaje de error
            		notify("Unit $unittype: $unitid not found in bd for book $booktype: $bookid on activity name: $rcontent->name!");
            	}else{
            		$unittype='id';
            		$unitid=$unit->id;
            	}
            	           	
            }
            $rcontent->unitid = $unitid;
            
            $activityid=backup_todb($info['MOD']['#']['ACTIVITYCODE']['0']['#']);
            if($activityid!=''&&$unitid!=''){
            	if(!$activity=get_record('rcommon_books_activities','bookid',$bookid,'unitid',$unitid,'code',$activityid)){
            		//mostramos mensaje de error
            		notify("Activity code: $activityid not found in bd for book $booktype: $bookid and unit $unittype: $unitid on activity name: $rcontent->name!");
            	}else{
            		
            		$activityid=$activity->id;
            	}
            	
            }
            $rcontent->activityid = $activityid;
            
            $rcontent->whatgrade = backup_todb($info['MOD']['#']['WHATGRADE']['0']['#']);
            $rcontent->popup = backup_todb($info['MOD']['#']['POPUP']['0']['#']);
            $rcontent->popup_options = backup_todb($info['MOD']['#']['POPUP_OPTIONS']['0']['#']);           
            $rcontent->frame = backup_todb($info['MOD']['#']['FRAME']['0']['#']);
            $rcontent->width = backup_todb($info['MOD']['#']['WIDTH']['0']['#']);
            $rcontent->heigth = backup_todb($info['MOD']['#']['HEIGHT']['0']['#']);
            $rcontent->timecreated = backup_todb($info['MOD']['#']['TIMECREATED']['0']['#']);
            $rcontent->timemodified = time();
 
            //The structure is equal to the db, so insert the rcontent
            $newid = insert_record ("rcontent",$rcontent);

            //Show notification with error if it isset
            
            
            //Do some output     
            if (!defined('RESTORE_SILENTLY')) {
                echo "<li>".get_string("modulename","rcontent")." \"".format_string(stripslashes($rcontent->name),true)."\"</li>";
            }
            backup_flush(300);

            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,$mod->modtype,$mod->id, $newid);
                
                //Now check if want to restore user data and do it.
                if (restore_userdata_selected($restore,'rcontent',$mod->id)) {
                    //restore any user data content
                    $status=rcontent_grades_restore_mods($newid,$info['MOD']['#'],$restore);
                    $status=rcontent_grades_details_restore_mod($newid,$info['MOD']['#'],$restore);
                }
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }

        return $status;
    }
    
    //restore rcontent_grades contents (executed from rcontent_restore_mods)
    function rcontent_grades_restore_mods($rcontent_id,$info,$restore){
    	
    	global $CFG;

        $status = true;
        
    	//Get the discussions array
        $objectives = array();
        
        if (!empty($info['GRADES']['0']['#']['GRADE'])) {
        	
            $objectives = $info['GRADES']['0']['#']['GRADE'];
        }
        
        //Iterate over discussions
        for($i = 0; $i < sizeof($objectives); $i++) {
            
        	$obj_info = $objectives[$i];
        	
        	//We'll need this later!!
            $oldid = backup_todb($obj_info['#']['ID']['0']['#']);
            //Now, build the RCONTENT_GRADES record structure
            $objective->userid = backup_todb($obj_info['#']['USERID']['0']['#']);
            // MARSUPIAL ********** AFEGIT -> Fixed problem when restoring courses with user data
            // 2012.05.15 @sarjona            
            $user = backup_getid($restore->backup_unique_code,"user",$objective->userid);
            if ($user) {
                $objective->userid = $user->new_id;
            }
            // ********** FI
            $objective->rcontentid = $rcontent_id;
            
            //search if isset units and activities in bd
            $rcontent=get_record('rcontent','id',$rcontent_id);
            
            $unittype='code';
            $unitid=backup_todb($obj_info['#']['UNITCODE']['0']['#']);
            if($unitid!=''){
            	if(!$unit=get_record('rcommon_books_units','bookid',$rcontent->bookid,'code',$unitid)){
            		//mostramos mensaje de error
            		notify("Grades. Unit $unittype: $unitid not found in bd for book id: $rcontent->bookid on activity name: $rcontent->name!");
            	}else{
            		$unittype='id';
            		$unitid=$unit->id;
            	}         	
            }
            $objective->unitid = $unitid;
            
            $activityid=backup_todb($obj_info['#']['ACTIVITYCODE']['0']['#']);
            if($activityid!=''&&$unitid!=''){
            	if(!$activity=get_record('rcommon_books_activities','bookid',$rcontent->bookid,'unitid',$unitid,'code',$activityid)){
            		//mostramos mensaje de error
            		notify("Grades. Activity code: $activityid not found in bd for book id: $rcontent->bookid and unit $unittype: $unitid on activity name: $rcontent->name!");
            	}else{
            		
            		$activityid=$activity->id;
            	}
            }
            $objective->activityid = $activityid;
            
            $objective->grade = backup_todb($obj_info['#']['GRADE']['0']['#']);
            $objective->mingrade = backup_todb($obj_info['#']['MINGRADE']['0']['#']);
            $objective->maxgrade = backup_todb($obj_info['#']['MAXGRADE']['0']['#']);
            $objective->attempt = backup_todb($obj_info['#']['ATTEMPT']['0']['#']);
            $objective->maxattempts = backup_todb($obj_info['#']['MAXATTEMPTS']['0']['#']);
            $objective->starttime = backup_todb($obj_info['#']['STARTTIME']['0']['#']);
            $objective->totaltime = backup_todb($obj_info['#']['TOTALTIME']['0']['#']);
            $objective->maxtotaltime = backup_todb($obj_info['#']['MAXTOTALTIME']['0']['#']);
            $objective->status = backup_todb($obj_info['#']['STATUS']['0']['#']);
            $objective->comments = backup_todb($obj_info['#']['COMMENTS']['0']['#']);
            $objective->urlviewresults = backup_todb($obj_info['#']['URLVIEWRESULTS']['0']['#']);
            $objective->sumweights = backup_todb($obj_info['#']['SUMWEIGHTS']['0']['#']);
            $objective->timecreated = backup_todb($obj_info['#']['TIMECREATED']['0']['#']);
            $objective->timemodified = backup_todb($obj_info['#']['TIMEMODIFIED']['0']['#']);
        	
        	//The structure is equal to the db, so insert the forum_discussions
            $newid = insert_record ("rcontent_grades",$objective);
            
            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,"rcontent_grades", $oldid, $newid);
            } else {
                $status = false;
            }
        }
        
        return $status;
    
    }
    
    //restore rcontent_grades_details contents (executed from rcontent_restore_mods)
    function rcontent_grades_details_restore_mod($rcontent_id,$info,$restore){
    	
    	global $CFG;

        $status = true;
        
    	//Get the discussions array
        $objectives = array();
        
        if (!empty($info['GRADES_DETAILS']['0']['#']['GRADE_DETAIL'])) {
        	
            $objectives = $info['GRADES_DETAILS']['0']['#']['GRADE_DETAIL'];
        }
        
        //Iterate over discussions
        for($i = 0; $i < sizeof($objectives); $i++) {
        	
        	$obj_info = $objectives[$i];
        	
        	
        	//We'll need this later!!
            $oldid = backup_todb($obj_info['#']['ID']['0']['#']);
            //Now, build the RCONTENT_GRADES_DETAILS record structure
            $objective->userid = backup_todb($obj_info['#']['USERID']['0']['#']);
            // MARSUPIAL ********** AFEGIT -> Fixed problem when restoring courses with user data
            // 2012.05.15 @sarjona            
            $user = backup_getid($restore->backup_unique_code,"user",$objective->userid);
            if ($user) {
                $objective->userid = $user->new_id;
            }
            // ********** FI
            $objective->rcontentid = $rcontent_id;
            
            //search if isset units and activities in bd
            $rcontent=get_record('rcontent','id',$rcontent_id);
            
            $unittype='code';
            $unitid=backup_todb($obj_info['#']['UNITCODE']['0']['#']);
            if($unitid!=''){
            	if(!$unit=get_record('rcommon_books_units','bookid',$rcontent->bookid,'code',$unitid)){
            		//mostramos mensaje de error
            		notify("Grades details. Unit $unittype: $unitid not found in bd for book id: $rcontent->bookid on activity name: $rcontent->name!");
            	}else{
            		$unittype='id';
            		$unitid=$unit->id;
            	}         	
            }
            $objective->unitid = $unitid;
            
            $activityid=backup_todb($obj_info['#']['ACTIVITYCODE']['0']['#']);
            if($activityid!=''&&$unitid!=''){
            	if(!$activity=get_record('rcommon_books_activities','bookid',$rcontent->bookid,'unitid',$unitid,'code',$activityid)){
            		//mostramos mensaje de error
            		notify("Grades details. Activity code: $activityid not found in bd for book id: $rcontent->bookid and unit $unittype: $unitid on activity name: $rcontent->name!");
            	}else{
            		$activityid=$activity->id;
            	}
            }
            $objective->activityid = $activityid;
            
            $objective->code = backup_todb($obj_info['#']['DETAILID']['0']['#']);
            $objective->typeid = backup_todb($obj_info['#']['DETAILTYPEID']['0']['#']);
            $objective->description = backup_todb($obj_info['#']['DESCRIPTION']['0']['#']);
            $objective->grade = backup_todb($obj_info['#']['GRADE']['0']['#']);
            $objective->mingrade = backup_todb($obj_info['#']['MINGRADE']['0']['#']);
            $objective->maxgrade = backup_todb($obj_info['#']['MAXGRADE']['0']['#']);
            $objective->starttime = backup_todb($obj_info['#']['STARTTIME']['0']['#']);
            $objective->totaltime = backup_todb($obj_info['#']['TOTALTIME']['0']['#']);
            $objective->maxtotaltime = backup_todb($obj_info['#']['MAXTOTALTIME']['0']['#']);
            $objective->attempt = backup_todb($obj_info['#']['ATTEMPT']['0']['#']);
            $objective->maxattempts = backup_todb($obj_info['#']['MAXATTEMPTS']['0']['#']);
            $objective->weight = backup_todb($obj_info['#']['WEIGHT']['0']['#']);
            $objective->urlviewresults = backup_todb($obj_info['#']['URLVIEWRESULTS']['0']['#']);
            $objective->timecreated = backup_todb($obj_info['#']['TIMECREATED']['0']['#']);
            $objective->timemodified = backup_todb($obj_info['#']['TIMEMODIFIED']['0']['#']);           
            
        	//The structure is equal to the db, so insert the forum_discussions
            $newid = insert_record ("rcontent_grades_details",$objective);
            
            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,"rcontent_grades_details", $oldid, $newid);
            } else {
                $status = false;
            }
        }
        
        return $status;
        
    }

    //Return a content decoded to support interactivities linking. Every module
    //should have its own. They are called automatically from
    //rcontent_decode_content_links_caller() function in each module
    //in the restore process
    function rcontent_decode_content_links ($content,$restore) {
            
        global $CFG;
            
        $result = $content;
                
        //Link to the list of rcontents
                
        $searchstring='/\$@(rcontentINDEX)\*([0-9]+)@\$/';
        //We look for it
        preg_match_all($searchstring,$content,$foundset);
        //If found, then we are going to look for its new id (in backup tables)
        if ($foundset[0]) {
            //print_object($foundset);                                     //Debug
            //Iterate over foundset[2]. They are the old_ids
            foreach($foundset[2] as $old_id) {
                //We get the needed variables here (course id)
                $rec = backup_getid($restore->backup_unique_code,"course",$old_id);
                //Personalize the searchstring
                $searchstring='/\$@(rcontentINDEX)\*('.$old_id.')@\$/';
                //If it is a link to this course, update the link to its new location
                if (!empty($rec->new_id)) {
                    //Now replace it
                    $result= preg_replace($searchstring,$CFG->wwwroot.'/mod/rcontent/index.php?id='.$rec->new_id,$result);
                } else { 
                    //It's a foreign link so leave it as original
                    $result= preg_replace($searchstring,$restore->original_wwwroot.'/mod/rcontent/index.php?id='.$old_id,$result);
                }
            }
        }

        //Link to rcontent view by moduleid

        $searchstring='/\$@(rcontentVIEWBYID)\*([0-9]+)@\$/';
        //We look for it
        preg_match_all($searchstring,$result,$foundset);
        //If found, then we are going to look for its new id (in backup tables)
        if ($foundset[0]) {
            //print_object($foundset);                                     //Debug
            //Iterate over foundset[2]. They are the old_ids
            foreach($foundset[2] as $old_id) {
                //We get the needed variables here (course_modules id)
                $rec = backup_getid($restore->backup_unique_code,"course_modules",$old_id);
                //Personalize the searchstring
                $searchstring='/\$@(rcontentVIEWBYID)\*('.$old_id.')@\$/';
                //If it is a link to this course, update the link to its new location
                if (!empty($rec->new_id)) {
                    //Now replace it
                    $result= preg_replace($searchstring,$CFG->wwwroot.'/mod/rcontent/view.php?id='.$rec->new_id,$result);
                } else {
                    //It's a foreign link so leave it as original
                    $result= preg_replace($searchstring,$restore->original_wwwroot.'/mod/rcontent/view.php?id='.$old_id,$result);
                }
            }
        }

        //Link to rcontent view by rcontentid

        $searchstring='/\$@(rcontentVIEWBYR)\*([0-9]+)@\$/';
        //We look for it
        preg_match_all($searchstring,$result,$foundset);
        //If found, then we are going to look for its new id (in backup tables)
        if ($foundset[0]) {
            //print_object($foundset);                                     //Debug
            //Iterate over foundset[2]. They are the old_ids
            foreach($foundset[2] as $old_id) {
                //We get the needed variables here (forum id)
                $rec = backup_getid($restore->backup_unique_code,"rcontent",$old_id);
                //Personalize the searchstring
                $searchstring='/\$@(rcontentVIEWBYR)\*('.$old_id.')@\$/';
                //If it is a link to this course, update the link to its new location
                if($rec->new_id) {
                    //Now replace it
                    $result= preg_replace($searchstring,$CFG->wwwroot.'/mod/rcontent/view.php?r='.$rec->new_id,$result);
                } else {
                    //It's a foreign link so leave it as original
                    $result= preg_replace($searchstring,$restore->original_wwwroot.'/mod/rcontent/view.php?r='.$old_id,$result);
                }
            }
        }

        return $result;
    }

    //This function makes all the necessary calls to xxxx_decode_content_links()
    //function in each module, passing them the desired contents to be decoded
    //from backup format to destination site/course in order to mantain inter-activities
    //working in the backup/restore process. It's called from restore_decode_content_links()
    //function in restore process
    function rcontent_decode_content_links_caller($restore) {
        
        $status = true;

        return $status;
    }

    //This function converts texts in FORMAT_WIKI to FORMAT_MARKDOWN for
    //some texts in the module
    function rcontent_restore_wiki2markdown ($restore) {

        global $CFG;

        $status = true;

        //Convert rcontent->alltext
        if ($records = get_records_sql ("SELECT r.id, r.alltext, r.options
                                         FROM {$CFG->prefix}rcontent r,
                                              {$CFG->prefix}backup_ids b
                                         WHERE r.course = $restore->course_id AND
                                               options = ".FORMAT_WIKI. " AND
                                               b.backup_code = $restore->backup_unique_code AND
                                               b.table_name = 'rcontent' AND
                                               b.new_id = r.id")) {
            foreach ($records as $record) {
                //Rebuild wiki links
                $record->alltext = restore_decode_wiki_content($record->alltext, $restore);
                //Convert to Markdown
                $wtm = new WikiToMarkdown();
                $record->alltext = $wtm->convert($record->alltext, $restore->course_id);
                $record->options = FORMAT_MARKDOWN;
                $status = update_record('rcontent', addslashes_object($record));
                //Do some output
                $i++;
                if (($i+1) % 1 == 0) {
                    if (!defined('RESTORE_SILENTLY')) {
                        echo ".";
                        if (($i+1) % 20 == 0) {
                            echo "<br />";
                        }
                    }
                    backup_flush(300);
                }
            }

        }
        return $status;
    }


    //This function returns a log record with all the necessay transformations
    //done. It's used by restore_log_module() to restore modules log.
    function rcontent_restore_logs($restore,$log) {
                    
        $status = false;
                    
        //Depending of the action, we recode different things
        switch ($log->action) {
        case "add":
            if ($log->cmid) {
                //Get the new_id of the module (to recode the info field)
                $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                if ($mod) {
                    $log->url = "view.php?id=".$log->cmid;
                    $log->info = $mod->new_id;
                    $status = true;
                }
            }
            break;
        case "update":
            if ($log->cmid) {
                //Get the new_id of the module (to recode the info field)
                $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                if ($mod) {
                    $log->url = "view.php?id=".$log->cmid;
                    $log->info = $mod->new_id;
                    $status = true;
                }
            }
            break;
        case "view":
            if ($log->cmid) {
                //Get the new_id of the module (to recode the info field)
                $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                if ($mod) {
                    $log->url = "view.php?id=".$log->cmid;
                    $log->info = $mod->new_id;
                    $status = true;
                }
            }
            break;
        case "view all":
            $log->url = "index.php?id=".$log->course;
            $status = true;
            break;
        default:
            if (!defined('RESTORE_SILENTLY')) {
                echo "action (".$log->module."-".$log->action.") unknown. Not restored<br />";                 //Debug
            }
            break;
        }

        if ($status) {
            $status = $log;
        }
        return $status;
    }   

    /*function rcontent_restore_files($oldid,$newid,$rcontent,$restore) {
        global $CFG;

        $status = true;
        $status = check_dir_exists($CFG->dataroot."/".$restore->course_id,true);

        // we need to do anything referenced by $rcontent->reference and anything in moddata/rcontent/instance

        // do referenced files/dirs first.
        $temp_path = $CFG->dataroot."/temp/backup/".$restore->backup_unique_code.'/course_files/'.$rcontent->reference;
        if (file_exists($temp_path)) { // ok, it was backed up, restore it.
            $new_path = $CFG->dataroot.'/'.$restore->course_id.'/'.$rcontent->reference;
        
            // if this is somewhere deeply nested we need to do all the structure stuff first.....
            $bits = explode('/',$rcontent->reference);
            $newbit = '';
            for ($i = 0; $i< count($bits)-1; $i++) {
                $newbit .= $bits[$i].'/';
                $status = $status && check_dir_exists($CFG->dataroot.'/'.$restore->course_id.'/'.$newbit,true);
            }
            $status = $status && backup_copy_file($temp_path,$new_path);
        }

        // and now for moddata.
        $temp_path = $CFG->dataroot."/temp/backup/".$restore->backup_unique_code.
            "/moddata/rcontent/".$oldid;
        if (file_exists($temp_path)) { // there's something to back up, restore it.
            $new_path = $CFG->dataroot."/".$restore->course_id."/".$CFG->moddata;
            $status = $status && check_dir_exists($new_path,true);
            $new_path .= '/rcontent';
            $status = $status && check_dir_exists($new_path,true);
            $new_path .= '/'.$newid;
            $status = $status && backup_copy_file($temp_path,$new_path);
        }
        return $status;
    }*/

?>
