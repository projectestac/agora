<?PHP //$Id: backuplib.php,v 1.4 2011-05-25 12:13:03 sarjona Exp $
    //This php script contains all the stuff to backup/restore
    //jclic mods

    //This is the "graphical" structure of the jclic mod:
    //
    //    jclic
    //    (CL, pk->id)
    //    |
    //    |
    //    jclic_sessions
    //    (UL, pk->id, fk->jclicid)
    //    |
    //    |
    //    jclic_activities
    //    (pk->id, fk->session_id)
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

    function jclic_backup_mods($bf,$preferences) {
        global $CFG;

        $status = true;

        ////Iterate over jclic table
        if ($jclics = get_records ("jclic","course", $preferences->backup_course, "id")) {
            foreach ($jclics as $jclic) {
                if (jclic_backup_mod_selected($preferences,'jclic',$jclic->id)) {
                    $status = jclic_backup_one_mod($bf,$preferences,$jclic);
                }
			}
		}

        return $status;
    }


    function jclic_backup_one_mod($bf,$preferences,$jclic) {
    
        global $CFG;
        
        if (is_numeric($jclic)) {
            $jclic = get_record('jclic','id',$jclic);
        }
        $instanceid = $jclic->id;
        
        $status = true;
        
		//Start mod
		fwrite ($bf,start_tag("MOD",3,true));
		//Print jclic data
		fwrite ($bf,full_tag("ID",4,false,$jclic->id));
		fwrite ($bf,full_tag("MODTYPE",4,false,"jclic"));
		fwrite ($bf,full_tag("NAME",4,false,$jclic->name));
		fwrite ($bf,full_tag("DESCRIPTION",4,false,$jclic->description));
		fwrite ($bf,full_tag("URL",4,false,$jclic->url));
		fwrite ($bf,full_tag("SKIN",4,false,$jclic->skin));
		fwrite ($bf,full_tag("MAXATTEMPTS",4,false,$jclic->maxattempts));
		fwrite ($bf,full_tag("WIDTH",4,false,$jclic->width));
		fwrite ($bf,full_tag("HEIGHT",4,false,$jclic->height));
		fwrite ($bf,full_tag("AVALUATION",4,false,$jclic->avaluation));
		fwrite ($bf,full_tag("MAXGRADE",4,false,$jclic->maxgrade));

        //if we've selected to backup users info, then execute backup_jclic_sessions 
        if (jclic_backup_userdata_selected($preferences,'jclic',$jclic->id)) {
            $status = backup_jclic_sessions($bf,$preferences,$jclic->id);
        }

		//End mod
		 fwrite ($bf,end_tag("MOD",3,true));
		
  
        return $status;
    }

    //Backup jclic_sessions contents (executed from jclic_backup_mods)
    function backup_jclic_sessions ($bf,$preferences,$jclic) {
        global $CFG;

        $status = true;
	
        $sessions = get_records("jclic_sessions","jclicid",$jclic,"id");
        //If there are sessions
        if ($sessions) {
            //Write start tag
            $status =fwrite ($bf,start_tag("SESSIONS",4,true));
            //Iterate over each sessions
            foreach ($sessions as $session) {
                //Entry start
                $status =fwrite ($bf,start_tag("SESSION",5,true));

                fwrite ($bf,full_tag("ID",6,false,$session->id));
                fwrite ($bf,full_tag("USER_ID",6,false,$session->user_id));
                fwrite ($bf,full_tag("SESSION_ID",6,false,$session->session_id));
                fwrite ($bf,full_tag("SESSION_DATETIME",6,false,$session->session_datetime));
                fwrite ($bf,full_tag("PROJECT_NAME",6,false,$session->project_name));
                fwrite ($bf,full_tag("SESSION_KEY",6,false,$session->session_key));
                fwrite ($bf,full_tag("SESSION_CODE",6,false,$session->session_code));
                fwrite ($bf,full_tag("SESSION_CONTEXT",6,false,$session->session_context));
		
				//$activities = get_records("jclic_activities","session_id",$session,"session_id");
				$activities = get_records("jclic_activities","session_id",$session->session_id);
				
				//If there are activities
				if ($activities) {
				//Write start tag
				$status =fwrite ($bf,start_tag("ACTIVITIES",6,true));
				//Iterate over each activity
				foreach ($activities as $activity) {
					//Entry start
					$status =fwrite ($bf,start_tag("ACTIVITY",7,true));
			
					fwrite ($bf,full_tag("ID",8,false,$activity->id));
					fwrite ($bf,full_tag("SESSION_ID",8,false,$activity->session_id));
					fwrite ($bf,full_tag("ACTIVITY_ID",8,false,$activity->activity_id));
					fwrite ($bf,full_tag("ACTIVITY_NAME",8,false,$activity->activity_name));
					fwrite ($bf,full_tag("NUM_ACTIONS",8,false,$activity->num_actions));
					fwrite ($bf,full_tag("SCORE",8,false,$activity->score));
					fwrite ($bf,full_tag("ACTIVITY_SOLVED",8,false,$activity->activity_solved));
					fwrite ($bf,full_tag("QUALIFICATION",8,false,$activity->qualification));
					fwrite ($bf,full_tag("TOTAL_TIME",8,false,$activity->total_time));
					fwrite ($bf,full_tag("ACTIVITY_CODE",8,false,$activity->activity_code));
			
					//Entry end
					$status =fwrite ($bf,end_tag("ACTIVITY",7,true));
				}
				//Write end tag
				$status =fwrite ($bf,end_tag("ACTIVITIES",6,true));
				}

                //Entry end
                $status =fwrite ($bf,end_tag("SESSION",5,true));
            }
            //Write end tag
            $status =fwrite ($bf,end_tag("SESSIONS",4,true));
        }

        return $status;
    }



    function jclic_check_backup_mods_instances($instance,$backup_unique_code) {
        $info[$instance->id.'0'][0] = '<b>'.$instance->name.'</b>';
        $info[$instance->id.'0'][1] = '';
        if (!empty($instance->userdata)) {
			//Sessions
            $info[$instance->id.'1'][0] = get_string("sessions","jclic");
            if ($ids = jclic_session_ids_by_instance ($instance->id)) {
                $info[$instance->id.'1'][1] = count($ids);
            } else {
                $info[$instance->id.'1'][1] = 0;
            }
        }
        return $info;
    }

    //Backup jclic files because we've selected to backup user info
    //and files are user info's level
    function backup_jclic_files_instance($bf,$preferences,$instanceid) {
        global $CFG;

        $status = true;

        //First we check to moddata exists and create it as necessary
        //in temp/backup/$backup_code  dir
        $status = check_and_create_moddata_dir($preferences->backup_unique_code);
        $status = check_dir_exists($CFG->dataroot."/temp/backup/".$preferences->backup_unique_code."/moddata/jclic/",true);
        //Now copy the jclic dir
        if ($status) {
            //Only if it exists !!
            if (is_dir($CFG->dataroot."/".$preferences->backup_course."/".$CFG->moddata."/jclic/".$instanceid)) {
                $status = backup_copy_file($CFG->dataroot."/".$preferences->backup_course."/".$CFG->moddata."/jclic/".$instanceid,
                                           $CFG->dataroot."/temp/jclic/".$preferences->backup_unique_code."/moddata/jclic/".$instanceid);
            }
        }

        return $status;

    }

   ////Return an array of info (name,value)
   function jclic_check_backup_mods($course,$user_data=false,$backup_unique_code,$instances=null) {
       if (!empty($instances) && is_array($instances) && count($instances)) {
           $info = array();
           foreach ($instances as $id => $instance) {
               $info += jclic_check_backup_mods_instances($instance,$backup_unique_code);
           }
           return $info;
       }
        //First the course data
        $info[0][0] = get_string("modulenameplural","jclic");
        if ($ids = jclic_ids ($course)) {
            $info[0][1] = count($ids);
        } else {
            $info[0][1] = 0;
        }

        //Now, if requested, the user_data
        if ($user_data) {
            //Sessions
            $info[1][0] = get_string("sessions","jclic");
            if ($ids = jclic_session_ids_by_course ($course)) {
                $info[1][1] = count($ids);
            } else {
                $info[1][1] = 0;
            }
        }
        return $info;
    }


    //Return a content encoded to support interactivities linking. Every module
    //should have its own. They are called automatically from the backup procedure.
    function jclic_encode_content_links ($content,$preferences) {

        global $CFG;

        $base = preg_quote($CFG->wwwroot,"/");

        //Link to the list of jclics
        $buscar="/(".$base."\/mod\/jclic\/index.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@JCLICINDEX*$2@$',$content);

        //Link to jclic view by moduleid
        $buscar="/(".$base."\/mod\/jclic\/view.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@JCLICVIEWBYID*$2@$',$result);

        return $result;
    }
	
	
    // INTERNAL FUNCTIONS. BASED IN THE MOD STRUCTURE

    //Returns an array of jclic id
    function jclic_ids ($course) {
        global $CFG;
        return get_records_sql ("SELECT j.id, j.course
                                 FROM {$CFG->prefix}jclic j
                                 WHERE j.course = '$course'");
    }

    //Returns an array of jclic sessions id
    function jclic_session_ids_by_course ($course) {
        global $CFG;
        
        return get_records_sql ("SELECT js.id , js.jclicid
                                 FROM {$CFG->prefix}jclic j,
                                      {$CFG->prefix}jclic_sessions js
                                 WHERE j.course = '$course' AND
                                       js.jclicid = j.id");
    }

    //Returns an array of jclic sessions id 
    function jclic_session_ids_by_instance($instanceid) {
 
        global $CFG;
        
        return get_records_sql ("SELECT js.id , js.jclicid
                                 FROM {$CFG->prefix}jclic_sessions js
                                 WHERE js.jclicid = $instanceid");
    }

/* Functions from Moodle 1.6 added for compatibility with 1.5 */
    
    function jclic_backup_mod_selected($preferences,$modname,$modid) {
        return ((empty($preferences->mods[$modname]->instances)
                 && !empty($preferences->mods[$modname]->backup)) 
                || (is_array($preferences->mods[$modname]->instances) 
                    && array_key_exists($modid,$preferences->mods[$modname]->instances)
                    && !empty($preferences->mods[$modname]->instances[$modid]->backup)));
    }
    
    
    function jclic_backup_userdata_selected($preferences,$modname,$modid) {
        return ((empty($preferences->mods[$modname]->instances)
                 && !empty($preferences->mods[$modname]->userinfo)) 
                || (is_array($preferences->mods[$modname]->instances) 
                    && array_key_exists($modid,$preferences->mods[$modname]->instances)
                    && !empty($preferences->mods[$modname]->instances[$modid]->userinfo)));
    }


?>
