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

    //This function executes all the backup procedure about this mod
    function rcontent_backup_mods($bf,$preferences) {
        global $CFG;

        $status = true; 

        ////Iterate over rcontent table
        $rcontents = get_records ("rcontent","course",$preferences->backup_course,"id");
        if ($rcontents) {
            foreach ($rcontents as $rcontent) {
                if (backup_mod_selected($preferences,'rcontent',$rcontent->id)) {
                    $status = rcontent_backup_one_mod($bf,$preferences,$rcontent);
                }
            }
        }
        return $status;
    }
   
    function rcontent_backup_one_mod($bf,$preferences,$rcontent) {

        global $CFG;
    
        
        if (is_numeric($rcontent)) {
            $rcontent = get_record('rcontent','id',$rcontent);
        }
        
        $levelcode='';
        $bookisbn='';
        $unitcode='';
        $activitycode='';
        
        if($level=get_record('rcommon_level','id',$rcontent->levelid)){
        	$levelcode=$level->code;
        }else{
        	notify("Level id: $rcontent->levelid not found in bd.");
        }
        if($book=get_record('rcommon_books','id',$rcontent->bookid)){
        	$bookisbn=$book->isbn;
        }else{
        	notify("Book id: $rcontent->bookid not found in bd.");
        }
        if($rcontent->unitid!=0&&$unit=get_record('rcommon_books_units','id',$rcontent->unitid)){
        	$unitcode=$unit->code;
        }
        if($rcontent->activityid!=0&&$activity=get_record('rcommon_books_activities','id',$rcontent->activityid)){
        	$activitycode=$activity->code;
        }
    
        $status = true;

        //Start mod
        fwrite ($bf,start_tag("MOD",3,true));
        //Print assignment data
        fwrite ($bf,full_tag("ID",4,false,$rcontent->id));
        fwrite ($bf,full_tag("MODTYPE",4,false,"rcontent"));
        fwrite ($bf,full_tag("NAME",4,false,$rcontent->name));
        fwrite ($bf,full_tag("SUMMARY",4,false,$rcontent->summary));
        fwrite ($bf,full_tag("LEVELCODE",4,false,$levelcode));
        fwrite ($bf,full_tag("BOOKID",4,false,$bookisbn));
        fwrite ($bf,full_tag("UNITCODE",4,false,$unitcode));
        fwrite ($bf,full_tag("ACTIVITYCODE",4,false,$activitycode));
        fwrite ($bf,full_tag("WHATGRADE",4,false,$rcontent->whatgrade));
        fwrite ($bf,full_tag("POPUP",4,false,$rcontent->popup));
        fwrite ($bf,full_tag("POPUP_OPTIONS",4,false,$rcontent->popup_options));
        fwrite ($bf,full_tag("FRAME",4,false,$rcontent->frame));
        fwrite ($bf,full_tag("WIDTH",4,false,$rcontent->width));
        fwrite ($bf,full_tag("HEIGHT",4,false,$rcontent->height));
        fwrite ($bf,full_tag("TIMECREATED",4,false,$rcontent->timecreated));
        fwrite ($bf,full_tag("TIMEMODIFIED",4,false,$rcontent->timemodified));
        
        //call to rcontent_backup_grade if we have selected to backup user info
        if (backup_userdata_selected($preferences,'rcontent',$rcontent->id)) {
            $status = rcontent_backup_grades($bf,$preferences,$rcontent->id);
            $status = rcontent_backup_grades_details($bf,$preferences,$rcontent->id);
        }
        
        //End mod
        $status = fwrite ($bf,end_tag("MOD",3,true));

        return $status;
    }
	
    //Backup rcontent_grades contents (executed from rcontent_backup_one_mod)
    function rcontent_backup_grades($bf,$preferences,$rcontent){

    	global $CFG;
    	
    	if(!$grades = get_records('rcontent_grades','rcontentid',$rcontent)){
    		return false;
    	}
    	
    	//Start grades
        fwrite ($bf,start_tag("GRADES",4,true));
        
    	foreach($grades as $grade){
    		
    		$unitcode='';
    		$activitycode='';
    		if($grade->unitid!=0){
    			if($unit=get_record('rcommon_books_units','id',$grade->unitid)){
    				$unitcode=$unit->code;
    			}else{
    				$unitcode=$grade->unitid;
    			}
    		}
    		if($grade->unitid!=0&&$grade->activityid!=0){
    			if($activity=get_record('rcommon_books_activities','id',$grade->activityid)){
    				$activitycode=$activity->code;
    			}else{
    				$activitycode=$grade->activityid;
    			}
    		}
    	    
    		//Start grade
    		fwrite ($bf,start_tag("GRADE",5,true));
    		
    		//Print assignment data
            fwrite ($bf,full_tag("ID",6,false,$grade->id));
            fwrite ($bf,full_tag("USERID",6,false,$grade->userid));
            fwrite ($bf,full_tag("UNITCODE",6,false,$unitcode));
            fwrite ($bf,full_tag("ACTIVITYCODE",6,false,$activitycode));
            fwrite ($bf,full_tag("GRADE",6,false,$grade->grade));
            fwrite ($bf,full_tag("MINGRADE",6,false,$grade->mingrade));
            fwrite ($bf,full_tag("MAXGRADE",6,false,$grade->maxgrade));
            fwrite ($bf,full_tag("ATTEMPT",6,false,$grade->attempt));
            fwrite ($bf,full_tag("MAXATTEMPTS",6,false,$grade->maxattempts));
            fwrite ($bf,full_tag("STARTTIME",6,false,$grade->starttime));
            fwrite ($bf,full_tag("TOTALTIME",6,false,$grade->totaltime));
            fwrite ($bf,full_tag("MAXTOTALTIME",6,false,$grade->maxtotaltime));
            fwrite ($bf,full_tag("STATUS",6,false,$grade->status));
            fwrite ($bf,full_tag("COMMENTS",6,false,$grade->comments));
            fwrite ($bf,full_tag("URLVIEWRESULTS",6,false,$grade->urlviewresults));
            fwrite ($bf,full_tag("SUMWEIGHTS",6,false,$grade->sumweights));
            fwrite ($bf,full_tag("TIMECREATED",6,false,$grade->timecreated));
            fwrite ($bf,full_tag("TIMEMODIFIED",6,false,$grade->timemodified));
        
            //End grade
            $status = fwrite ($bf,end_tag("GRADE",5,true));
    	}
    	
    	//End grades
        $status = fwrite ($bf,end_tag("GRADES",4,true));
        
    	return $status;
    }
    
    //Backup rcontent_grades_details contents (executed from rcontent_backup_grades)
    function rcontent_backup_grades_details($bf,$preferences,$rcontent){
    	
    	global $CFG;
    	
    	if(!$grades_details = get_records('rcontent_grades_details','rcontentid',$rcontent)){
    		return false;
    	}
    	
    	//Start grades
        fwrite ($bf,start_tag("GRADES_DETAILS",4,true));
        
    	foreach($grades_details as $grade_detail){
    	    
    	    $unitcode='';
    		$activitycode='';
    		if($grade_detail->unitid!=0){
    			if($unit=get_record('rcommon_books_units','id',$grade_detail->unitid)){
    				$unitcode=$unit->code;
    			}else{
    				$unitcode=$grade_detail->unitid;
    			}
    		}
    		if($grade_detail->unitid!=0&&$grade_detail->activityid!=0){
    			if($activity=get_record('rcommon_books_activities','id',$grade_detail->activityid)){
    				$activitycode=$activity->code;
    			}else{
    				$activitycode=$grade_detail->activityid;
    			}
    		}
    		
    		//Start grade
    		fwrite ($bf,start_tag("GRADE_DETAIL",5,true));
    		
    		//Print assignment data
            fwrite ($bf,full_tag("ID",6,false,$grade_detail->id));
            fwrite ($bf,full_tag("USERID",6,false,$grade_detail->userid));
            fwrite ($bf,full_tag("UNITCODE",6,false,$unitcode));
            fwrite ($bf,full_tag("ACTIVITYCODE",6,false,$activitycode));
            fwrite ($bf,full_tag("DETAILID",6,false,$grade_detail->code));
            fwrite ($bf,full_tag("DETAILTYPEID",6,false,$grade_detail->typeid));
            fwrite ($bf,full_tag("DESCRIPTION",6,false,$grade_detail->description));
            fwrite ($bf,full_tag("GRADE",6,false,$grade_detail->grade));
            fwrite ($bf,full_tag("MINGRADE",6,false,$grade_detail->mingrade));
            fwrite ($bf,full_tag("MAXGRADE",6,false,$grade_detail->maxgrade));
            fwrite ($bf,full_tag("STARTTIME",6,false,$grade_detail->starttime));
            fwrite ($bf,full_tag("TOTALTIME",6,false,$grade_detail->totaltime));
            fwrite ($bf,full_tag("MAXTOTALTIME",6,false,$grade_detail->maxtotaltime));
            fwrite ($bf,full_tag("ATTEMPT",6,false,$grade_detail->attempt));
            fwrite ($bf,full_tag("MAXATTEMPTS",6,false,$grade_detail->maxattempts));
            fwrite ($bf,full_tag("WEIGHT",6,false,$grade_detail->weight));
            fwrite ($bf,full_tag("URLVIEWRESULTS",6,false,$grade_detail->urlviewresults));
            fwrite ($bf,full_tag("TIMECREATED",6,false,$grade_detail->timecreated));
            fwrite ($bf,full_tag("TIMEMODIFIED",6,false,$grade_detail->timemodified));
        
            //End grade
            $status = fwrite ($bf,end_tag("GRADE_DETAIL",5,true));
    	}
    	
    	//End grades
        $status = fwrite ($bf,end_tag("GRADES_DETAILS",4,true));
        
    	return $status;
    }    
    
   ////Return an array of info (name,value)
   function rcontent_check_backup_mods($course,$user_data=false,$backup_unique_code,$instances=null) {
       if (!empty($instances) && is_array($instances) && count($instances)) {
           $info = array();
           foreach ($instances as $id => $instance) {
               $info += rcontent_check_backup_mods_instances($instance,$backup_unique_code);
           }
           return $info;
       }
       //First the course data
       $info[0][0] = get_string("modulenameplural","rcontent");
       if ($ids = rcontent_ids ($course)) {
           $info[0][1] = count($ids);
       } else {
           $info[0][1] = 0;
       }
       
       return $info;
   }

   ////Return an array of info (name,value)
   function rcontent_check_backup_mods_instances($instance,$backup_unique_code) {
       //First the course data
       $info[$instance->id.'0'][0] = $instance->name;
       if ($ids = rcontent_grades_by_instance ($instance->id)) {
           $info[$instance->id.'0'][1] = count($ids);
       } else {
           $info[$instance->id.'0'][1] = 0;
       }
        
       return $info;
    }

    //Return a content encoded to support interactivities linking. Every module
    //should have its own. They are called automatically from the backup procedure.
    function rcontent_encode_content_links ($content,$preferences) {

        global $CFG;

        $base = preg_quote($CFG->wwwroot,"/");

        //Link to the list of rcontents
        $buscar="/(".$base."\/mod\/rcontent\/index.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@rcontentINDEX*$2@$',$content);

        //Link to rcontent view by moduleid
        $buscar="/(".$base."\/mod\/rcontent\/view.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@rcontentVIEWBYID*$2@$',$result);

        //Link to rcontent view by rcontentid
        $buscar="/(".$base."\/mod\/rcontent\/view.php\?r\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@rcontentVIEWBYR*$2@$',$result);

        return $result;
    }

    // INTERNAL FUNCTIONS. BASED IN THE MOD STRUCTURE

    //Returns an array of rcontents id
    function rcontent_ids ($course) {

        global $CFG;
        
        return get_records_sql ("SELECT a.id, a.course
                                 FROM {$CFG->prefix}rcontent a
                                 WHERE a.course = '$course'");
    }
   
    function rcontent_backup_files($bf,$preferences,$rcontent) {
        global $CFG;
        $status = true;

        if (!file_exists($CFG->dataroot.'/'.$preferences->backup_course.'/'.$rcontent->reference)) {
            return true ; // doesn't exist but we don't want to halt the entire process so still return true.
        }
        
        $status = $status && check_and_create_course_files_dir($preferences->backup_unique_code);

        // if this is somewhere deeply nested we need to do all the structure stuff first.....
        $bits = explode('/',$rcontent->reference);
        $newbit = '';
        for ($i = 0; $i< count($bits)-1; $i++) {
            $newbit .= $bits[$i].'/';
            $status = $status && check_dir_exists($CFG->dataroot.'/temp/backup/'.$preferences->backup_unique_code.'/course_files/'.$newbit,true);
        }

        if ($rcontent->reference === '') {
            $status = $status && backup_copy_course_files($preferences); // copy while ignoring backupdata and moddata!!!
        } else if (strpos($rcontent->reference, 'backupdata') === 0 or strpos($rcontent->reference, $CFG->moddata) === 0) {
            // no copying - these directories must not be shared anyway!
        } else {
            $status = $status && backup_copy_file($CFG->dataroot."/".$preferences->backup_course."/".$rcontent->reference,
                                                  $CFG->dataroot."/temp/backup/".$preferences->backup_unique_code."/course_files/".$rcontent->reference);
        }
         
        // now, just in case we check moddata ( going forwards, rcontents should use this )
        $status = $status && check_and_create_moddata_dir($preferences->backup_unique_code);
        $status = $status && check_dir_exists($CFG->dataroot."/temp/backup/".$preferences->backup_unique_code."/".$CFG->moddata."/rcontent/",true);
        
        if ($status) {
            //Only if it exists !! Thanks to Daniel Miksik.
            $instanceid = $rcontent->id;
            if (is_dir($CFG->dataroot."/".$preferences->backup_course."/".$CFG->moddata."/rcontent/".$instanceid)) {
                $status = backup_copy_file($CFG->dataroot."/".$preferences->backup_course."/".$CFG->moddata."/rcontent/".$instanceid,
                                           $CFG->dataroot."/temp/backup/".$preferences->backup_unique_code."/moddata/rcontent/".$instanceid);
            }
        }

        return $status;
    }
    
    //Returns an array of rscorm_scoes id
    function rcontent_grades_by_course ($course) {

        global $CFG;

        return get_records_sql ("SELECT s.id , s.rcontentid
                                 FROM {$CFG->prefix}rcontent_grades s,
                                      {$CFG->prefix}rcontent a
                                 WHERE a.course = '$course' AND
                                       s.rcontentid = a.id");
    }

    //Returns an array of rscorm_scoes id
    function rcontent_grades_by_instance ($instanceid) {

        global $CFG;

        return get_records_sql ("SELECT s.id , s.rcontentid
                                 FROM {$CFG->prefix}rcontent_grades s
                                 WHERE s.rcontentid = $instanceid");
    }

?>
