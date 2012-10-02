<?php //$Id: restorelib.php,v 1.1.2.2 2010/09/01 21:00:00 arborrow Exp $
    //This php script contains all the stuff to backup/restore
    //slideshow mods

    //This function executes all the restore procedure about this mod
    function slideshow_restore_mods($mod,$restore) {

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
            // if necessary, write to restorelog and adjust date/time fields
            
            
            //Now, build the SLIDESHOW record structure
            $slideshow->course = $restore->course_id;
            $slideshow->name = backup_todb($info['MOD']['#']['NAME']['0']['#']);
            $slideshow->location = backup_todb($info['MOD']['#']['LOCATION']['0']['#']);
            $slideshow->layout = backup_todb($info['MOD']['#']['LAYOUT']['0']['#']);
            $slideshow->filename = backup_todb($info['MOD']['#']['FILENAME']['0']['#']);
            $slideshow->delaytime = backup_todb($info['MOD']['#']['DELAYTIME']['0']['#']);
            $slideshow->centred = backup_todb($info['MOD']['#']['CENTRED']['0']['#']);
            $slideshow->autobgcolor = backup_todb($info['MOD']['#']['AUTOBGCOLOR']['0']['#']);
            $slideshow->htmlcaptions = backup_todb($info['MOD']['#']['HTMLCAPTIONS']['0']['#']);
            $slideshow->timemodified = backup_todb($info['MOD']['#']['TIMEMODIFIED']['0']['#']);
            
            //The structure is equal to the db, so insert the slideshow
            $newid = insert_record ("slideshow",$slideshow);

            //Do some output     
            if (!defined('RESTORE_SILENTLY')) {
                echo "<li>".get_string("modulename","slideshow")." \"".format_string(stripslashes($slideshow->name),true)."\"</li>";
            }
            backup_flush(300);

            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,$mod->modtype,$mod->id, $newid);
                //
                // need new instance id of slideshow for captions:
                $rec = backup_getid($restore->backup_unique_code,"course_modules",$info['MOD']['#']['CAPTIONS']['0']['#']['CAPTION']['3']['#']['SLIDESHOW']['0']['#']);                
                
                //Restore slideshow_captions
                $status = slideshow_captions_restore_mods ($mod->id, $rec->new_id,$info,$restore);
                //
                
            
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }

        return $status;
    }

    //This function restores the slideshow_captions
    //
    function slideshow_captions_restore_mods($old_slideshow_id, $new_slideshow_id,$info,$restore) {

        global $CFG;
        
        $status = true;

        //Get the captions array 
        $captions = $info['MOD']['#']['CAPTIONS']['0']['#']['CAPTION'];

        //Iterate over captions
        for($i = 0; $i < sizeof($captions); $i++) {
            $cap_info = $captions[$i];
            //traverse_xmlize($cap_info);                                                                 //Debug
            //print_object ($GLOBALS['traverse_array']);                                                  //Debug
            //$GLOBALS['traverse_array']="";                                                              //Debug

            //We'll need this later!!
            $oldid = backup_todb($cap_info['#']['ID']['0']['#']);
            $olduserid = backup_todb($cap_info['#']['USERID']['0']['#']);

            //Now, build the SLIDESHOW_MESSAGES record structure
            
            $caption->slideshow = $new_slideshow_id;
            $caption->image = backup_todb($cap_info['#']['IMAGE']['0']['#']);
            $caption->title = backup_todb($cap_info['#']['TITLE']['0']['#']);
            $caption->caption = backup_todb($cap_info['#']['CAPTION']['0']['#']);


            //The structure is equal to the db, so insert the slideshow_message
            $newid = insert_record ("slideshow_captions",$caption);

            //Do some output
            if (($i+1) % 50 == 0) {
                if (!defined('RESTORE_SILENTLY')) {
                    echo ".";
                    if (($i+1) % 1000 == 0) {
                        echo "<br />";
                    }
                }
                backup_flush(300);
            }
        }
        return $status;
    }

    //Return a content decoded to support interactivities linking. Every module
    //should have its own. They are called automatically from
    //slideshow_decode_content_links_caller() function in each module
    //in the restore process
    function slideshow_decode_content_links ($content,$restore) {
            
        global $CFG;
            
        $result = $content;
                
        //Link to the list of slideshows
                
        $searchstring='/\$@(SLIDESHOWINDEX)\*([0-9]+)@\$/';
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
                $searchstring='/\$@(SLIDESHOWINDEX)\*('.$old_id.')@\$/';
                //If it is a link to this course, update the link to its new location
                if($rec->new_id) {
                    //Now replace it
                    $result= preg_replace($searchstring,$CFG->wwwroot.'/mod/slideshow/index.php?id='.$rec->new_id,$result);
                } else { 
                    //It's a foreign link so leave it as original
                    $result= preg_replace($searchstring,$restore->original_wwwroot.'/mod/slideshow/index.php?id='.$old_id,$result);
                }
            }
        }

        //Link to slideshow view by moduleid

        $searchstring='/\$@(SLIDESHOWVIEWBYID)\*([0-9]+)@\$/';
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
                $searchstring='/\$@(SLIDESHOWVIEWBYID)\*('.$old_id.')@\$/';
                //If it is a link to this course, update the link to its new location
                if($rec->new_id) {
                    //Now replace it
                    $result= preg_replace($searchstring,$CFG->wwwroot.'/mod/slideshow/view.php?id='.$rec->new_id,$result);
                } else {
                    //It's a foreign link so leave it as original
                    $result= preg_replace($searchstring,$restore->original_wwwroot.'/mod/slideshow/view.php?id='.$old_id,$result);
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
    function slideshow_decode_content_links_caller($restore) {
        global $CFG;
        $status = true;
        
        if ($slideshows = get_records_sql ("SELECT c.id, c.intro
                                   FROM {$CFG->prefix}slideshow c
                                   WHERE c.course = $restore->course_id")) {
                                               //Iterate over each slideshow->intro
            $i = 0;   //Counter to send some output to the browser to avoid timeouts
            foreach ($slideshows as $slideshow) {
                //Increment counter
                $i++;
                $content = $slideshow->intro;
                $result = restore_decode_content_links_worker($content,$restore);
                if ($result != $content) {
                    //Update record
                    $slideshow->intro = addslashes($result);
                    $status = update_record("slideshow",$slideshow);
                    if (debugging()) {
                        if (!defined('RESTORE_SILENTLY')) {
                            echo '<br /><hr />'.s($content).'<br />changed to<br />'.s($result).'<hr /><br />';
                        }
                    }
                }
                //Do some output
                if (($i+1) % 5 == 0) {
                    if (!defined('RESTORE_SILENTLY')) {
                        echo ".";
                        if (($i+1) % 100 == 0) {
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
    function slideshow_restore_logs($restore,$log) {

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
        case "talk":
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
        case "report":
            if ($log->cmid) {
                //Get the new_id of the module (to recode the info field)
                $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                if ($mod) {
                    $log->url = "report.php?id=".$log->cmid;
                    $log->info = $mod->new_id;
                    $status = true;
                }
            }
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
?>