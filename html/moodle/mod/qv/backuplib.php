<?PHP //$Id: backuplib.php,v 1.2 2009/04/01 10:15:16 sarjona Exp $
    //This php script contains all the stuff to backup/restore
    //qv mods

    //This is the "graphical" structure of the qv mod:
    //
    //    qv
    //    (CL, pk->id)
    //    |
    //    |
    //    qv_assignments
    //    (UL, pk->id, fk->qvid)
    //    |
    //    |
    //    qv_sections
    //    (pk->id, fk->assignmentid)
    //
    //
    // Meaning: pk->primary key field of the table
    //          fk->foreign key to link with parent
    //          nt->nested field (recursive data)
    //          CL->course level info
    //          UL->user level info
    //          files->table may have files)
    //
    //-----------------------------------------------------------

    function qv_backup_mods($bf,$preferences) {
        global $CFG;
        $status = true;
        ////Iterate over qv table
        if ($qvs = get_records ("qv","course", $preferences->backup_course, "id")) {
            foreach ($qvs as $qv) {
                if (qv_backup_mod_selected($preferences,'qv',$qv->id)) {
                    $status = qv_backup_one_mod($bf,$preferences,$qv);
                }
            }        
        }
        return $status;
    }


    function qv_backup_one_mod($bf,$preferences,$qv) {    
        global $CFG;
        $status = true;
        
        if (is_numeric($qv)) {
            $qv = get_record('qv','id',$qv);
        }
        $instanceid = $qv->id;
        
        
        //Start mod
        fwrite ($bf,start_tag("MOD",3,true));
        //Print qv data
        fwrite ($bf,full_tag("ID",4,false,$qv->id));
        fwrite ($bf,full_tag("MODTYPE",4,false,"qv"));
        fwrite ($bf,full_tag("NAME",4,false,$qv->name));
        fwrite ($bf,full_tag("DESCRIPTION",4,false,$qv->description));
        fwrite ($bf,full_tag("ASSESSMENTURL",4,false,$qv->assessmenturl));
        fwrite ($bf,full_tag("SKIN",4,false,$qv->skin));
        fwrite ($bf,full_tag("ASSESSMENTLANG",4,false,$qv->assessmentlang));
        fwrite ($bf,full_tag("MAXDELIVER",4,false,$qv->maxdeliver));
        fwrite ($bf,full_tag("SHOWCORRECTION",4,false,$qv->showcorrection));
        fwrite ($bf,full_tag("SHOWINTERACTION",4,false,$qv->showinteraction));
        fwrite ($bf,full_tag("TARGET",4,false,$qv->target));
        fwrite ($bf,full_tag("MAXGRADE",4,false,$qv->maxgrade));
        fwrite ($bf,full_tag("WIDTH",4,false,$qv->width));
        fwrite ($bf,full_tag("HEIGHT",4,false,$qv->height));

        //if we've selected to backup users info, then execute backup_qv_assignments 
        if (qv_backup_userdata_selected($preferences,'qv',$qv->id)) {
            $status = backup_qv_assignments($bf,$preferences,$qv->id);
        }

        //End mod
        fwrite ($bf,end_tag("MOD",3,true));
    
        return $status;
    }

    //Backup qv_assignments contents (executed from qv_backup_mods)
    function backup_qv_assignments ($bf,$preferences,$qvid) {
        global $CFG;

        $status = true;
        $assignments = get_records("qv_assignments","qvid",$qvid,"id");
        //If there are assignments
        if ($assignments) {
            //Write start tag
            $status =fwrite ($bf,start_tag("ASSIGNMENTS",4,true));
            //Iterate over each assignment
            foreach ($assignments as $assignment) {
                //Entry start
                $status =fwrite ($bf,start_tag("ASSIGNMENT",5,true));

                fwrite ($bf,full_tag("ID",6,false,$assignment->id));
                fwrite ($bf,full_tag("USERID",6,false,$assignment->userid));
                fwrite ($bf,full_tag("IDNUMBER",6,false,$assignment->idnumber));
                $sections = get_records("qv_sections","assignmentid",$assignment->id);

                //If there are sections
                if ($sections) {
                  //Write start tag
                  $status =fwrite ($bf,start_tag("SECTIONS",6,true));
                  //Iterate over each section
                  foreach ($sections as $section) {
                    //Entry start
                    $status =fwrite ($bf,start_tag("SECTION",7,true));
                
                    fwrite ($bf,full_tag("ID",8,false,$section->id));
                    fwrite ($bf,full_tag("SECTIONID",8,false,$section->sectionid));
                    fwrite ($bf,full_tag("RESPONSES",8,false,$section->responses));
                    fwrite ($bf,full_tag("SCORES",8,false,$section->scores));
                    fwrite ($bf,full_tag("PENDING_SCORES",8,false,$section->pending_scores));
                    fwrite ($bf,full_tag("ATTEMPTS",8,false,$section->attempts));
                    fwrite ($bf,full_tag("STATE",8,false,$section->state));
                    fwrite ($bf,full_tag("TIME",8,false,$section->time));
                    
                    $messages = get_records("qv_messages","sid",$section->id);
                    //If there are messages
                    if ($messages) {
                      //Write start tag
                      $status =fwrite ($bf,start_tag("MESSAGES",8,true));
                      //Iterate over each message
                      foreach ($messages as $message) {
                        //Entry start
                        $status =fwrite ($bf,start_tag("MESSAGE",9,true));
                    
                        fwrite ($bf,full_tag("ITEMID",10,false,$message->itemid));
                        fwrite ($bf,full_tag("USERID",10,false,$message->userid));
                        fwrite ($bf,full_tag("CREATED",10,false,$message->created));
                        fwrite ($bf,full_tag("MESSAGE",10,false,$message->message));
                        //Entry end
                        $status =fwrite ($bf,end_tag("MESSAGE",9,true));
                      }
                      //Write end tag
                      $status =fwrite ($bf,end_tag("MESSAGES",8,true));
                    }
                    $messages_read = get_records("qv_messages_read","sid",$section->id);
                    //If there are messages_read
                    if ($messages_read) {
                      //Write start tag
                      $status =fwrite ($bf,start_tag("MESSAGES_READ",8,true));
                      //Iterate over each read message
                      foreach ($messages_read as $message_read) {
                        //Entry start
                        $status =fwrite ($bf,start_tag("MESSAGE_READ",9,true));
                    
                        fwrite ($bf,full_tag("USERID",10,false,$message_read->userid));
                        fwrite ($bf,full_tag("TIMEREADED",10,false,$message_read->timereaded));
                        //Entry end
                        $status =fwrite ($bf,end_tag("MESSAGE_READ",9,true));
                      }
                      //Write end tag
                      $status =fwrite ($bf,end_tag("MESSAGES_READ",8,true));
                    }
                    
                    //Entry end
                    $status =fwrite ($bf,end_tag("SECTION",7,true));
                  }
                  //Write end tag
                  $status =fwrite ($bf,end_tag("SECTIONS",6,true));
                }

                //Entry end
                $status =fwrite ($bf,end_tag("ASSIGNMENT",5,true));
            }
            //Write end tag
            $status =fwrite ($bf,end_tag("ASSIGNMENTS",4,true));
        }

        return $status;
    }


    function qv_check_backup_mods_instances($instance,$backup_unique_code) {
        $info[$instance->id.'0'][0] = '<b>'.$instance->name.'</b>';
        $info[$instance->id.'0'][1] = '';
        if (!empty($instance->userdata)) {
			//Assignments
            $info[$instance->id.'1'][0] = get_string("assignments","qv");
            if ($ids = qv_assignment_ids_by_instance ($instance->id)) {
                $info[$instance->id.'1'][1] = count($ids);
            } else {
                $info[$instance->id.'1'][1] = 0;
            }
        }
        return $info;
    }

    //Backup qv files because we've selected to backup user info
    //and files are user info's level
    function backup_qv_files_instance($bf,$preferences,$instanceid) {
        global $CFG;

        $status = true;

        //First we check to moddata exists and create it as necessary
        //in temp/backup/$backup_code  dir
        $status = check_and_create_moddata_dir($preferences->backup_unique_code);
        $status = check_dir_exists($CFG->dataroot."/temp/backup/".$preferences->backup_unique_code."/moddata/qv/",true);
        //Now copy the qv dir
        if ($status) {
            //Only if it exists !!
            if (is_dir($CFG->dataroot."/".$preferences->backup_course."/".$CFG->moddata."/qv/".$instanceid)) {
                $status = backup_copy_file($CFG->dataroot."/".$preferences->backup_course."/".$CFG->moddata."/qv/".$instanceid,
                                           $CFG->dataroot."/temp/qv/".$preferences->backup_unique_code."/moddata/qv/".$instanceid);
            }
        }

        return $status;

    }

   ////Return an array of info (name,value)
   function qv_check_backup_mods($course,$user_data=false,$backup_unique_code,$instances=null) {
       if (!empty($instances) && is_array($instances) && count($instances)) {
           $info = array();
           foreach ($instances as $id => $instance) {
               $info += qv_check_backup_mods_instances($instance,$backup_unique_code);
           }
           return $info;
       }
        //First the course data
        $info[0][0] = get_string("modulenameplural","qv");
        if ($ids = qv_ids ($course)) {
            $info[0][1] = count($ids);
        } else {
            $info[0][1] = 0;
        }

        //Now, if requested, the user_data
        if ($user_data) {
            //Assignments
            $info[1][0] = get_string("assignments","qv");
            if ($ids = qv_assignment_ids_by_course ($course)) {
                $info[1][1] = count($ids);
            } else {
                $info[1][1] = 0;
            }
        }
        return $info;
    }


    //Return a content encoded to support interactivities linking. Every module
    //should have its own. They are called automatically from the backup procedure.
    function qv_encode_content_links ($content,$preferences) {

        global $CFG;

        $base = preg_quote($CFG->wwwroot,"/");

        //Link to the list of qvs
        $buscar="/(".$base."\/mod\/qv\/index.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@QVINDEX*$2@$',$content);

        //Link to qv view by moduleid
        $buscar="/(".$base."\/mod\/qv\/view.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@QVVIEWBYID*$2@$',$result);

        return $result;
    }
	
	
    // INTERNAL FUNCTIONS. BASED IN THE MOD STRUCTURE

    //Returns an array of qv id
    function qv_ids ($course) {
//        return get_records("qv","course",$course);
        global $CFG;
        return get_records_sql ("SELECT q.id, q.course
                                 FROM {$CFG->prefix}qv q
                                 WHERE q.course = '$course'");
    }

    //Returns an array of qv assignment id
    function qv_assignment_ids_by_course ($course) {
        global $CFG;
        
        return get_records_sql ("SELECT qa.id , qa.qvid
                                 FROM {$CFG->prefix}qv q,
                                      {$CFG->prefix}qv_assignments qa
                                 WHERE q.course = '$course' AND
                                       qa.qvid = q.id");
    }

    //Returns an array of qv assignment id 
    function qv_assignment_ids_by_instance($instanceid) {
        //return get_records("qv_assignments","qvid",$instanceid);
        global $CFG;
        
        return get_records_sql ("SELECT qa.id , qa.qvid
                                 FROM {$CFG->prefix}qv_assignments qa
                                 WHERE qa.qvid = $instanceid");
    }

/* Functions from Moodle 1.6 added for compatibility with 1.5 */
    
    function qv_backup_mod_selected($preferences,$modname,$modid) {
        return ((empty($preferences->mods[$modname]->instances)
                 && !empty($preferences->mods[$modname]->backup)) 
                || (is_array($preferences->mods[$modname]->instances) 
                    && array_key_exists($modid,$preferences->mods[$modname]->instances)
                    && !empty($preferences->mods[$modname]->instances[$modid]->backup)));
    }
    
    
    function qv_backup_userdata_selected($preferences,$modname,$modid) {
        return ((empty($preferences->mods[$modname]->instances)
                 && !empty($preferences->mods[$modname]->userinfo)) 
                || (is_array($preferences->mods[$modname]->instances) 
                    && array_key_exists($modid,$preferences->mods[$modname]->instances)
                    && !empty($preferences->mods[$modname]->instances[$modid]->userinfo)));
    }


?>
