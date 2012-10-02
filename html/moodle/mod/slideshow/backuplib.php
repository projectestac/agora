<?php 
    //This php script contains all the stuff to backup/restore
    //slideshow mods

    //This is the "graphical" structure of the slideshow mod:
    //
    //                       slideshow
    //                    (CL,pk->id)             
    //                        |
    //                        |
    //                        |
    //                   slideshow_captions 
    //               (UL,pk->id, fk->slideshowid)
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
    function slideshow_backup_mods($bf,$preferences) {
    
        global $CFG;

        $status = true;
        
        //
        //Iterate over slideshow table
        $slideshows = get_records ("slideshow","course",$preferences->backup_course,"id");
        if ($slideshows) {
            foreach ($slideshows as $slideshow) {
                if (backup_mod_selected($preferences,'slideshow',$slideshow->id)) {
                    $status = slideshow_backup_one_mod($bf,$preferences,$slideshow);
                }
            }
        }
        return $status;  
    }

    function slideshow_backup_one_mod($bf,$preferences,$slideshow) {
        foreach ($preferences->slideshow_instances as $arr){
            if ($arr->id == $slideshow){
                $myinstance = $arr->coursemodule;
            }
        }
        global $CFG;
        if (is_numeric($slideshow)) {
            $slideshow = get_record('slideshow','id',$slideshow);
        }
        
        $slideshow->instance = $myinstance;
    //
        $status = true;

        //Start mod
        fwrite ($bf,start_tag("MOD",3,true));
        //Print slideshow data
        fwrite ($bf,full_tag("ID",4,false,$slideshow->id));
        fwrite ($bf,full_tag("MODTYPE",4,false,"slideshow"));
        fwrite ($bf,full_tag("NAME",4,false,$slideshow->name));
        fwrite ($bf,full_tag("LOCATION",4,false,$slideshow->location));
        fwrite ($bf,full_tag("LAYOUT",4,false,$slideshow->layout));
        fwrite ($bf,full_tag("FILENAME",4,false,$slideshow->filename));
        fwrite ($bf,full_tag("DELAYTIME",4,false,$slideshow->delaytime));
        fwrite ($bf,full_tag("CENTRED",4,false,$slideshow->centred));
        fwrite ($bf,full_tag("AUTOBGCOLOR",4,false,$slideshow->autobgcolor));
        fwrite ($bf,full_tag("HTMLCAPTIONS",4,false,$slideshow->htmlcaptions));
        fwrite ($bf,full_tag("TIMEMODIFIED",4,false,$slideshow->timemodified));
        
        backup_slideshow_captions ($bf,$preferences,$slideshow);
        //End mod
        $status =fwrite ($bf,end_tag("MOD",3,true));

        return $status;
    }

    //Backup slideshow_captions (executed from slideshow_backup_mods)
    function backup_slideshow_captions ($bf,$preferences,$slideshow) {
        global $CFG;
        $status = true;

        $slideshow_captions = get_records("slideshow_captions","slideshow",$slideshow->instance);
        //If there is captions
        if ($slideshow_captions) {
            //Write start tag
            $status =fwrite ($bf,start_tag("CAPTIONS",4,true));
            //Iterate over each caption
            foreach ($slideshow_captions as $sli_cap) {
                //Start caption
                $status =fwrite ($bf,start_tag("CAPTION",5,true));
                //Print caption contents  
                fwrite ($bf,full_tag("ID",6,false,$sli_cap->id));       
                fwrite ($bf,full_tag("SLIDESHOW",6,false,$sli_cap->slideshow));       
                fwrite ($bf,full_tag("IMAGE",6,false,$sli_cap->image)); 
                fwrite ($bf,full_tag("TITLE",6,false,$sli_cap->title));       
                fwrite ($bf,full_tag("CAPTION",6,false,$sli_cap->caption));       
                //End submission
                $status =fwrite ($bf,end_tag("CAPTION",5,true));
            }
            //Write end tag
            $status =fwrite ($bf,end_tag("CAPTIONS",4,true));
        } 
        return $status;
    }

    //Return an array of info (name,value)
    function slideshow_check_backup_mods($course,$user_data=false,$backup_unique_code,$instances=null) {
        if (!empty($instances) && is_array($instances) && count($instances)) {
            $info = array();
            foreach ($instances as $id => $instance) {
                $info += slideshow_check_backup_mods_instances($instance,$backup_unique_code);
            }
            return $info;
        }
        //First the course data
        $info[0][0] = get_string("modulenameplural","slideshow");
        if ($ids = slideshow_ids ($course)) {
            $info[0][1] = count($ids);
        } else {
            $info[0][1] = 0;
        }


        return $info;
    }

    //Return an array of info (name,value)
    function slideshow_check_backup_mods_instances($instance,$backup_unique_code) {
        //First the course data
        $info[$instance->id.'0'][0] = '<b>'.$instance->name.'</b>';
        $info[$instance->id.'0'][1] = '';

        return $info;
    }

    //Return a content encoded to support interactivities linking. Every module
    //should have its own. They are called automatically from the backup procedure.
    function slideshow_encode_content_links ($content,$preferences) {

        global $CFG;

        $base = preg_quote($CFG->wwwroot,"/");

        //Link to the list of slideshows
        $buscar="/(".$base."\/mod\/slideshow\/index.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@slideshowINDEX*$2@$',$content);

        //Link to slideshow view by moduleid
        $buscar="/(".$base."\/mod\/slideshow\/view.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@slideshowVIEWBYID*$2@$',$result);

        return $result;
    }

    // INTERNAL FUNCTIONS. BASED IN THE MOD STRUCTURE

    //Returns an array of slideshows id 
    function slideshow_ids ($course) {

        global $CFG;

        return get_records_sql ("SELECT c.id, c.course
                                 FROM {$CFG->prefix}slideshow c
                                 WHERE c.course = '$course'");
    }
    
    //Returns an array of assignment_submissions id
    function slideshow_caption_ids_by_course ($course) {

        global $CFG;

        return get_records_sql ("SELECT m.id , m.slideshowid
                                 FROM {$CFG->prefix}slideshow_captions m,
                                      {$CFG->prefix}slideshow c
                                 WHERE c.course = '$course' AND
                                       m.slideshowid = c.id");
    }

    //Returns an array of slideshow id
    function slideshow_caption_ids_by_instance ($instanceid) {

        global $CFG;

        return get_records_sql ("SELECT m.id , m.slideshowid
                                 FROM {$CFG->prefix}slideshow_captions m
                                 WHERE m.slideshowid = $instanceid");
    }
?>