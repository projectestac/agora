<?php

//$Id: backuplib.php,v 1.0 2011-09-28 14:13:03 jfern343 Exp $
//This php script contains all the stuff to restore geogebra mods
//This is the "graphical" structure of the geogebra mod:
//
//    geogebra
//    (CL, pk->id)
//         |
//         |
//    geogebra_attempts
//    (UL, pk->id, fk->geogebra)
//
// Meaning: pk->primary key field of the table
//          fk->foreign key to link with parent
//          nt->nested field (recursive data)
//          CL->course level info
//          UL->user level info
//          files->table may have files)
//
//-----------------------------------------------------------

function geogebra_restore_mods($mod, $restore) {
    global $CFG;

    $status = true;

    //Get record from backup_ids
    $data = backup_getid($restore->backup_unique_code, $mod->modtype, $mod->id);

    if ($data) {
        //Now get completed xmlized object
        $info = $data->info;
        //traverse_xmlize($info);                                    //Debug
        //print_object ($GLOBALS['traverse_array']);                 //Debug
        //$GLOBALS['traverse_array']="";                             //Debug
        //Now, build the geogebra record structure
        $geogebra->course = $restore->course_id;
        $geogebra->name = backup_todb($info['MOD']['#']['NAME']['0']['#']);
        $geogebra->intro = backup_todb($info['MOD']['#']['INTRO']['0']['#']);
        $geogebra->url = backup_todb($info['MOD']['#']['URL']['0']['#']);
        $geogebra->width = backup_todb($info['MOD']['#']['WIDTH']['0']['#']);
        $geogebra->height = backup_todb($info['MOD']['#']['HEIGHT']['0']['#']);
        $geogebra->showsubmit = backup_todb($info['MOD']['#']['SHOWSUBMIT']['0']['#']);
        $geogebra->grade = backup_todb($info['MOD']['#']['GRADE']['0']['#']);
        $geogebra->maxattempts = backup_todb($info['MOD']['#']['MAXATTEMPTS']['0']['#']);
        $geogebra->autograde = backup_todb($info['MOD']['#']['AUTOGRADE']['0']['#']);
        $geogebra->grademethod = backup_todb($info['MOD']['#']['GRADEMETHOD']['0']['#']);
        $geogebra->timeavailable = backup_todb($info['MOD']['#']['TIMEAVAILABLE']['0']['#']);
        $geogebra->timedue = backup_todb($info['MOD']['#']['TIMEDUE']['0']['#']);
        $geogebra->timecreated = backup_todb($info['MOD']['#']['TIMECREATED']['0']['#']);
        $geogebra->timemodified = backup_todb($info['MOD']['#']['TIMEMODIFIED']['0']['#']);

        //The structure is equal to the db, so insert the geogebra
        $newid = insert_record("geogebra", $geogebra);

        //Do some output
        echo "<li>" . get_string("modulename", "geogebra") . " \"" . format_string(stripslashes($geogebra->name), true) . "\"</li>";
        backup_flush(300);

        if ($newid) {
            //We have the newid, update backup_ids
            backup_putid($restore->backup_unique_code, $mod->modtype, $mod->id, $newid);
            //Now check if want to restore user data and do it.
            if ($restore->mods['geogebra']->userinfo) {
                //Restore geogebra_attempts
                $status = geogebra_attempts_restore_mods($mod->id, $newid, $info, $restore);
            }
        } else {
            $status = false;
        }
    } else {
        $status = false;
    }

    return $status;
}

//This function restores the geogebra attempts
function geogebra_attempts_restore_mods($old_attempt_id, $new_attempt_id, $info, $restore) {
    global $CFG;

    $status = true;

    //Get the attempts array
    $attempts = $info['MOD']['#']['ATTEMPTS']['0']['#']['ATTEMPT'];
    //Iterate over attempts
    for ($i = 0; $i < sizeof($attempts); $i++) {
        $attempt_info = $attempts[$i];
        //traverse_xmlize($entry_info);                                  //Debug
        //print_object ($GLOBALS['traverse_array']);                     //Debug
        //$GLOBALS['traverse_array']="";                                 //Debug
        //We'll need this later!! 
        $oldid = backup_todb($attempt_info['#']['ID']['0']['#']);
        $olduserid = backup_todb($attempt_info['#']['USERID']['0']['#']);

        //Now, build the geogebra_attempt record structure
        $attempt->geogebra = $new_attempt_id;
        $attempt->userid = backup_todb($attempt_info['#']['USERID']['0']['#']);
        $attempt->vars = backup_todb($attempt_info['#']['VARS']['0']['#']);
        $attempt->gradecooment = backup_todb($attempt_info['#']['GRADECOMMENT']['0']['#']);
        $attempt->finished = backup_todb($attempt_info['#']['FINISHED']['0']['#']);
        $attempt->dateteacher = backup_todb($attempt_info['#']['DATETEACHER']['0']['#']);
        $attempt->datestudent = backup_todb($attempt_info['#']['DATESTUDENT']['0']['#']);


        //We have to recode the userid field
        $user = backup_getid($restore->backup_unique_code, "user", $attempt->userid);
        if ($user) {
            $attempt->userid = $user->new_id;
        }


        //The structure is equal to the db, so insert the geogebra attempts
        $newid = insert_record("geogebra_attempts", $attempt);

        //Do some output
        if (($i + 1) % 50 == 0) {
            if (!defined('RESTORE_SILENTLY')) {
                echo ".";
                if (($i + 1) % 1000 == 0) {
                    echo "<br />";
                }
            }
            backup_flush(300);
        }

        if ($newid) {
            //We have the newid, update backup_ids
            backup_putid($restore->backup_unique_code, "geogebra_attempts", $oldid, $newid);
        } else {
            $status = false;
        }
    }
    
    return $status;
}

?>
