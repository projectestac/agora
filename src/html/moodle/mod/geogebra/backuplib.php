<?php

//$Id: backuplib.php,v 1.0 2011-09-28 14:13:03 jfern343 Exp $
//This php script contains all the stuff to backup flahapplet mods
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

//backs up all instances of your module 
function geogebra_backup_mods($bf, $preferences) {
    global $CFG;

    $status = true;

    ////Iterate over geogebra table
    if ($geogebras = get_records("geogebra", "course", $preferences->backup_course, "id")) {
        foreach ($geogebras as $geogebra) {
            if (backup_mod_selected($preferences, 'geogebra', $geogebra->id)) {
                $status = geogebra_backup_one_mod($bf, $preferences, $geogebra);
            }
        }
    }

    return $status;
}

//backs up a single instance of your module 
function geogebra_backup_one_mod($bf, $preferences, $geogebra) {
    global $CFG;

    if (is_numeric($geogebra)) {
        $geogebra = get_record('geogebra', 'id', $geogebra);
    }

    $status = true;

    //Start mod
    fwrite($bf, start_tag("MOD", 3, true));
    //Print geogebra data
    fwrite($bf, full_tag("ID", 4, false, $geogebra->id));
    fwrite($bf, full_tag("MODTYPE", 4, false, "geogebra"));
    fwrite($bf, full_tag("NAME", 4, false, $geogebra->name));
    fwrite($bf, full_tag("INTRO", 4, false, $geogebra->intro));
    fwrite($bf, full_tag("URL", 4, false, $geogebra->url));
    fwrite($bf, full_tag("WIDTH", 4, false, $geogebra->width));
    fwrite($bf, full_tag("HEIGHT", 4, false, $geogebra->height));
    fwrite($bf, full_tag("SHOWSUBMIT", 4, false, $geogebra->showsubmit));
    fwrite($bf, full_tag("GRADE", 4, false, $geogebra->grade));
    fwrite($bf, full_tag("MAXATTEMPTS", 4, false, $geogebra->maxattempts));
    fwrite($bf, full_tag("AUTOGRADE", 4, false, $geogebra->autograde));
    fwrite($bf, full_tag("GRADEMETHOD", 4, false, $geogebra->grademethod));
    fwrite($bf, full_tag("TIMEAVAILABLE", 4, false, $geogebra->timeavailable));
    fwrite($bf, full_tag("TIMEDUE", 4, false, $geogebra->timedue));
    fwrite($bf, full_tag("TIMECREATED", 4, false, $geogebra->timecreated));
    fwrite($bf, full_tag("TIMEMODIFIED", 4, false, $geogebra->timemodified));

    //if we've selected to backup users info, then execute backup_geogebra_attempts 
    if (backup_userdata_selected($preferences, 'geogebra', $geogebra->id)) {
        $status = backup_geogebra_attempts($bf, $preferences, $geogebra->id);
    }

    //End mod
    fwrite($bf, end_tag("MOD", 3, true));


    return $status;
}

//Backup geogebra_attempts contents (executed from geogebra_backup_mods)
function backup_geogebra_attempts($bf, $preferences, $geogebra) {
    global $CFG;

    $status = true;

    $geogebra_attempts = get_records("geogebra_attempts", "geogebra", $geogebra, "id");

    //If there are attempts
    if ($geogebra_attempts) {
        //Write start tag
        $status = fwrite($bf, start_tag("ATTEMPTS", 4, true));
        //Iterate over each entry
        foreach ($geogebra_attempts as $attempt) {
            //Start entry
            $status = fwrite($bf, start_tag("ATTEMPT", 5, true));
            //Print geogebra_attempts contents
            fwrite($bf, full_tag("ID", 6, false, $attempt->id));
            fwrite($bf, full_tag("USERID", 6, false, $attempt->userid));
            fwrite($bf, full_tag("VARS", 6, false, $attempt->vars));
            fwrite($bf, full_tag("GRADECOMMENT", 6, false, $attempt->gradecomment));
            fwrite($bf, full_tag("FINISHED", 6, false, $attempt->finished));
            fwrite($bf, full_tag("DATETEACHER", 6, false, $attempt->dateteacher));
            fwrite($bf, full_tag("DATESTUDENT", 6, false, $attempt->datestudent));
            //End entry
            $status = fwrite($bf, end_tag("ATTEMPT", 5, true));
        }
        //Write end tag
        $status = fwrite($bf, end_tag("ATTEMPTS", 4, true));
    }
    return $status;
}

/*
 * generates an array of course and user data information used to select
 * which instances to backup (and whether to include user data or not).
 * This includes details at [0][0] and [0][1] about the course module name
 * and number of instances for the course and at [1][0] and [1][1] with the
 * module name and count of user information. 
 */

function geogebra_check_backup_mods($course, $user_data=false, $backup_unique_code, $instances=null) {
    if (!empty($instances) && is_array($instances) && count($instances)) {
        $info = array();
        foreach ($instances as $id => $instance) {
            $info += geogebra_check_backup_mods_instances($instance, $backup_unique_code);
        }
        return $info;
    }
    //First the course data
    $info[0][0] = get_string("modulenameplural", "geogebra");
    if ($ids = geogebra_ids($course)) {
        $info[0][1] = count($ids);
    } else {
        $info[0][1] = 0;
    }

    //Now, if requested, the user_data
    if ($user_data) {
        $info[1][0] = get_string("attempts", "geogebra");
        if ($ids = geogebra_attempt_ids_by_course($course)) {
            $info[1][1] = count($ids);
        } else {
            $info[1][1] = 0;
        }
    }
    return $info;
}

//generates an array of course and user data information for a specific instance.
function geogebra_check_backup_mods_instances($instance, $backup_unique_code) {
    //First the course data
    $info[$instance->id . '0'][0] = '<b>' . $instance->name . '</b>';
    $info[$instance->id . '0'][1] = '';
    //Now, if requested, the user_data
    if (!empty($instance->userdata)) {
        //Sessions
        $info[$instance->id . '1'][0] = get_string("attempts", "geogebra");
        if ($ids = geogebra_attempt_ids_by_instance($instance->id)) {
            $info[$instance->id . '1'][1] = count($ids);
        } else {
            $info[$instance->id . '1'][1] = 0;
        }
    }
    return $info;
}

//recode links to ensure they work when reimported. 
function geogebra_encode_content_links($content, $preferences) {
        global $CFG;

        $base = preg_quote($CFG->wwwroot,"/");

        //Link to the list of geogebras
        $buscar="/(".$base."\/mod\/geogebra\/index.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@GEOGEBRAINDEX*$2@$',$content);

        //Link to geogebra view by moduleid
        $buscar="/(".$base."\/mod\/geogebra\/view.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@GEOGEBRAVIEWBYID*$2@$',$result);

        return $result;
}

// INTERNAL FUNCTIONS. BASED IN THE MOD STRUCTURE
//Returns an array of geogebra id
function geogebra_ids($course) {
    global $CFG;
    return get_records_sql("SELECT g.id, g.course
                                 FROM {$CFG->prefix}geogebra g
                                 WHERE g.course = '$course'");
}

//Returns an array of geogebra attempts id
function geogebra_attempt_ids_by_course($course) {
    global $CFG;

    return get_records_sql("SELECT ga.id , ga.geogebra
                                 FROM {$CFG->prefix}geogebra g,
                                      {$CFG->prefix}geogebra_attempts ga
                                 WHERE g.course = '$course' AND
                                       ga.geogebra = g.id");
}

//Returns an array of geogebra attempts id 
function geogebra_attempt_ids_by_instance($instanceid) {

    global $CFG;

    return get_records_sql("SELECT ga.id , ga.geogebra
                                 FROM {$CFG->prefix}geogebra_attempts ga
                                 WHERE ga.geogebra = $instanceid");
}

?>
