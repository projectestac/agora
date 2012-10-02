<?PHP //$Id: restorelib.php,v 1.5 2011-05-25 12:13:03 sarjona Exp $
    //This php script contains all the stuff to backup/restore
    //jclic mods

    //This is the "graphical" structure of the jclic mod:
    //
    //    jclic
    //    (CL, pk->id)
    //
    //    jclic_sessions
    //    (UL, pk->id, fk->jclicid)
    //
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

    function jclic_restore_mods($mod,$restore) {

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

            //Now, build the JClic record structure
            $jclic->course = $restore->course_id;
            $jclic->name = backup_todb($info['MOD']['#']['NAME']['0']['#']);
            $jclic->description = backup_todb($info['MOD']['#']['DESCRIPTION']['0']['#']);
            $jclic->url = backup_todb($info['MOD']['#']['URL']['0']['#']);
            $jclic->skin = backup_todb($info['MOD']['#']['SKIN']['0']['#']);
            $jclic->maxattempts = backup_todb($info['MOD']['#']['MAXATTEMPTS']['0']['#']);
            $jclic->width = backup_todb($info['MOD']['#']['WIDTH']['0']['#']);
            $jclic->height = backup_todb($info['MOD']['#']['HEIGHT']['0']['#']);
            $jclic->avaluation = backup_todb($info['MOD']['#']['AVALUATION']['0']['#']);
            $jclic->maxgrade = backup_todb($info['MOD']['#']['MAXGRADE']['0']['#']);

            //The structure is equal to the db, so insert the jclic
            $newid = insert_record ("jclic",$jclic);

            //Do some output
            echo "<li>".get_string("modulename","jclic")." \"".format_string(stripslashes($jclic->name),true)."\"</li>";
            backup_flush(300);

            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,$mod->modtype,
                             $mod->id, $newid);
                //Now check if want to restore user data and do it.
                if ($restore->mods['jclic']->userinfo) {
                    //Restore jclic_sessions
                    $status = jclic_sessions_restore_mods($mod->id,$newid,$info,$restore);
                }
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }

        return $status;
    }

    //This function restores the jclic_sessions
    function jclic_sessions_restore_mods($old_jclic_id,$new_jclic_id,$info,$restore) {

        global $CFG;
        $status = true;

        //Get the sessions array
        $sessions = array();
        if (array_key_exists('SESSIONS', $info['MOD']['#']))
            $sessions = $info['MOD']['#']['SESSIONS']['0']['#']['SESSION'];

        //Iterate over sessions
        for($i = 0; $i < sizeof($sessions); $i++) {
            $session = $sessions[$i];
            //traverse_xmlize($ent_info);                                                                 //Debug
            //print_object ($GLOBALS['traverse_array']);                                                  //Debug
            //$GLOBALS['traverse_array']="";                                                              //Debug

            //Now, build the jclic_sessions record structure
            $entry->jclicid = $new_jclic_id;
            //$entry->session_id = backup_todb($session['#']['SESSION_ID']['0']['#']);
            $entry->user_id = backup_todb($session['#']['USER_ID']['0']['#']);
            $entry->session_datetime = backup_todb($session['#']['SESSION_DATETIME']['0']['#']);
            $entry->project_name = backup_todb($session['#']['PROJECT_NAME']['0']['#']);
            $entry->session_key = backup_todb($session['#']['SESSION_KEY']['0']['#']);
            $entry->session_code = backup_todb($session['#']['SESSION_CODE']['0']['#']);
            $entry->session_context = backup_todb($session['#']['SESSION_CONTEXT']['0']['#']);
			
            //We have to recode the user_id field
            $user = backup_getid($restore->backup_unique_code,"user",$entry->user_id);
            if ($user) {
                $entry->user_id = $user->new_id;
            }
			$microtime_arr=split(' ',microtime());
            $entry->session_id = $entry->user_id."_".$microtime_arr[1].substr($microtime_arr[0],2);
            //The structure is equal to the db, so insert the jclic_sessions
			$newid = insert_record ("jclic_sessions",$entry);

            //Get the activities array
            $activities = array();
            if (array_key_exists('ACTIVITIES', $session['#']))
                $activities = $session['#']['ACTIVITIES']['0']['#']['ACTIVITY'];
            //Iterate over activities
            for($j = 0; $j < sizeof($activities); $j++) {
                 $activity = $activities[$j];

                 //Now, build the jclic_activities record structure
                 $entry2->session_id = $entry->session_id;
                 $entry2->activity_id = backup_todb($activity['#']['ACTIVITY_ID']['0']['#']);
                 $entry2->activity_name = backup_todb($activity['#']['ACTIVITY_NAME']['0']['#']);
                 $entry2->num_actions = backup_todb($activity['#']['NUM_ACTIONS']['0']['#']);
                 $entry2->score = backup_todb($activity['#']['SCORE']['0']['#']);
                 $entry2->activity_solved = backup_todb($activity['#']['ACTIVITY_SOLVED']['0']['#']);
                 $entry2->qualification = backup_todb($activity['#']['QUALIFICATION']['0']['#']);
                 $entry2->total_time = backup_todb($activity['#']['TOTAL_TIME']['0']['#']);
                 $entry2->activity_code = backup_todb($activity['#']['ACTIVITY_CODE']['0']['#']);
				
                 //The structure is equal to the db, so insert the jclic_activities
                 $newid2 = insert_record ("jclic_activities",$entry2);				 

                 //Do some output
                 if (($j+1) % 50 == 0) {
                     echo ".";
                     if (($j+1) % 1000 == 0) {
                         echo "<br />";
                     }
                     backup_flush(300);
                 }
	    }
            //Do some output
            if (($i+1) % 50 == 0) {
                echo ".";
                if (($i+1) % 1000 == 0) {
                    echo "<br />";
                }
                backup_flush(300);
            }
        }
        return $status;
    }

?>
