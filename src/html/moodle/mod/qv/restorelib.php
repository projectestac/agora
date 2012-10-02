<?PHP //$Id: restorelib.php,v 1.3 2009/04/01 10:15:16 sarjona Exp $
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
    // Meaning: pk->primary key field of the table
    //          fk->foreign key to link with parent
    //          nt->nested field (recursive data)
    //          CL->course level info
    //          UL->user level info
    //          files->table may have files)
    //
    //-----------------------------------------------------------

    function qv_restore_mods($mod,$restore) {
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

            //Now, build the qv record structure
            $qv->course = $restore->course_id;
            $qv->name = backup_todb($info['MOD']['#']['NAME']['0']['#']);
            $qv->description = backup_todb($info['MOD']['#']['DESCRIPTION']['0']['#']);
            $qv->assessmenturl = backup_todb($info['MOD']['#']['ASSESSMENTURL']['0']['#']);
            $qv->skin = backup_todb($info['MOD']['#']['SKIN']['0']['#']);
            $qv->assessmentlang = backup_todb($info['MOD']['#']['ASSESSMENTLANG']['0']['#']);
            $qv->maxdeliver = backup_todb($info['MOD']['#']['MAXDELIVER']['0']['#']);
            $qv->showcorrection = backup_todb($info['MOD']['#']['SHOWCORRECTION']['0']['#']);
            $qv->showinteraction = backup_todb($info['MOD']['#']['SHOWINTERACTION']['0']['#']);
            $qv->target = backup_todb($info['MOD']['#']['TARGET']['0']['#']);
            $qv->maxgrade = backup_todb($info['MOD']['#']['MAXGRADE']['0']['#']);
            $qv->width = backup_todb($info['MOD']['#']['WIDTH']['0']['#']);
            $qv->height = backup_todb($info['MOD']['#']['HEIGHT']['0']['#']);

            //The structure is equal to the db, so insert the qv
            $newid = insert_record ("qv", $qv);

            //Do some output
            echo "<li>".get_string("modulename","qv")." \"".format_string(stripslashes($qv->name),true)."\"</li>";
            backup_flush(300);

            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,$mod->modtype,
                             $mod->id, $newid);
                //Now check if want to restore user data and do it.
                if ($restore->mods['qv']->userinfo) {
                    //Restore qv assignments
                    $status = qv_assignments_restore_mods($mod->id,$newid,$info,$restore);
                }
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }

        return $status;
    }

    //This function restores the qv assignments
    function qv_assignments_restore_mods($old_qv_id,$new_qv_id,$info,$restore) {
        global $CFG;
        $status = true;

        //Get the assignments array
        $assignments = $info['MOD']['#']['ASSIGNMENTS']['0']['#']['ASSIGNMENT'];

        //Iterate over assignments
        for($i = 0; $i < sizeof($assignments); $i++) {
            $assignment = $assignments[$i];
            //traverse_xmlize($ent_info);                                                                 //Debug
            //print_object ($GLOBALS['traverse_array']);                                                  //Debug
            //$GLOBALS['traverse_array']="";                                                              //Debug

            //Now, build the qv_assignments record structure
            $entry->qvid = $new_qv_id;
            $entry->userid = backup_todb($assignment['#']['USERID']['0']['#']);
            $entry->idnumber = backup_todb($assignment['#']['IDNUMBER']['0']['#']);

            //We have to recode the user_id field
            $user = backup_getid($restore->backup_unique_code,"user",$entry->userid);
            if ($user) {
                $entry->userid = $user->new_id;
            }
            //The structure is equal to the db, so insert the qv_assignments
            $new_assignmentid = insert_record ("qv_assignments",$entry);

            //Get the sections array
            if (array_key_exists('SECTIONS', $assignment['#'])){
                $sections = $assignment['#']['SECTIONS']['0']['#']['SECTION'];
                //Iterate over sections
                for($j = 0; $j < sizeof($sections); $j++) {
                     $section = $sections[$j];
    
                     //Now, build the qv_sections record structure
                     $entry2->assignmentid = $new_assignmentid;
                     $entry2->sectionid = backup_todb($section['#']['SECTIONID']['0']['#']);
                     $entry2->responses = backup_todb($section['#']['RESPONSES']['0']['#']);
                     $entry2->scores = backup_todb($section['#']['SCORES']['0']['#']);
                     $entry2->pending_scores = backup_todb($section['#']['PENDING_SCORES']['0']['#']);
                     $entry2->attempts = backup_todb($section['#']['ATTEMPTS']['0']['#']);
                     $entry2->state = backup_todb($section['#']['STATE']['0']['#']);
                     $entry2->time = backup_todb($section['#']['TIME']['0']['#']);
    
                     //The structure is equal to the db, so insert the qv_sections
                     $new_sectionid = insert_record ("qv_sections",$entry2);
                     
                    //Get the messages array
                    if (array_key_exists('MESSAGES', $section['#'])){
                        $messages = $section['#']['MESSAGES']['0']['#']['MESSAGE'];
                        //Iterate over messages
                        foreach ($messages as $message) {    
                             //Now, build the qv_messages record structure
                             $entry_message->sid = $new_sectionid;
                             $entry_message->itemid = backup_todb($message['#']['ITEMID']['0']['#']);
                             $entry_message->userid = backup_todb($message['#']['USERID']['0']['#']);
                             $entry_message->created = backup_todb($message['#']['CREATED']['0']['#']);
                             $entry_message->message = backup_todb($message['#']['MESSAGE']['0']['#']);
            
                             //The structure is equal to the db, so insert the qv_messages
                             $new_messageid = insert_record ("qv_messages",$entry_message);	    
                        }
        
                        //Get the messages_read array
                        $messages_read = $section['#']['MESSAGES_READ']['0']['#']['MESSAGE_READ'];
                        //Iterate over messages_read
                        foreach ($messages_read as $message_read) {    
                             //Now, build the qv_messages_read record structure
                             $entry_message_read->sid = $new_sectionid;
                             $entry_message_read->userid = backup_todb($message_read['#']['USERID']['0']['#']);
                             $entry_message_read->timereaded = backup_todb($message_read['#']['TIMEREADED']['0']['#']);
            
                             //The structure is equal to the db, so insert the qv_messages
                             $new_messageid = insert_record ("qv_messages_read",$entry_message_read);	    
                        }                    
                    }
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
