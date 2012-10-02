<?PHP //$Id: backuplib.php,v 1.2 2006/12/12 09:20:28 sarjona Exp $
    //This php script contains all the stuff to backup/restore
    //eoicampus mods

    //This is the "graphical" structure of the eoicampus mod:
    //
    //    eoicampus
    //    (CL, pk->id)
    //
    // Meaning: pk->primary key field of the table
    //          fk->foreign key to link with parent
    //          nt->nested field (recursive data)
    //          CL->course level info
    //          UL->user level info
    //          files->table may have files)
    //
    //-----------------------------------------------------------

    function eoicampus_backup_mods($bf,$preferences) {
        global $CFG;

        $status = true;

        ////Iterate over eoicampus table
        if ($eoicampuss = get_records ("eoicampus","course", $preferences->backup_course, "id")) {
            foreach ($eoicampuss as $eoicampus) {
                if (eoicampus_backup_mod_selected($preferences,'eoicampus',$eoicampus->id)) {
                    $status = eoicampus_backup_one_mod($bf,$preferences,$eoicampus);
                }
			}
		}

        return $status;
    }


    function eoicampus_backup_one_mod($bf,$preferences,$eoicampus) {
    
        global $CFG;
        
        if (is_numeric($eoicampus)) {
            $eoicampus = get_record('eoicampus','id',$eoicampus);
        }
        $instanceid = $eoicampus->id;
        
        $status = true;
        
        //Start mod
        fwrite ($bf,start_tag("MOD",3,true));
        //Print eoicampus data
        fwrite ($bf,full_tag("ID",4,false,$eoicampus->id));
        fwrite ($bf,full_tag("MODTYPE",4,false,"eoicampus"));
        fwrite ($bf,full_tag("NAME",4,false,$eoicampus->name));
        fwrite ($bf,full_tag("DESCRIPTION",4,false,$eoicampus->description));
        fwrite ($bf,full_tag("PWLEVEL",4,false,$eoicampus->pwlevel));
        fwrite ($bf,full_tag("PWID",4,false,$eoicampus->pwid));
		    //End mod
        fwrite ($bf,end_tag("MOD",3,true));
		
  
        return $status;
    }


    function eoicampus_check_backup_mods_instances($instance,$backup_unique_code) {
        $info[$instance->id.'0'][0] = '<b>'.$instance->name.'</b>';
        $info[$instance->id.'0'][1] = '';
        return $info;
    }

    //Backup eoicampus files because we've selected to backup user info
    //and files are user info's level
    function backup_eoicampus_files_instance($bf,$preferences,$instanceid) {
        global $CFG;

        $status = true;

        //First we check to moddata exists and create it as necessary
        //in temp/backup/$backup_code  dir
        $status = check_and_create_moddata_dir($preferences->backup_unique_code);
        $status = check_dir_exists($CFG->dataroot."/temp/backup/".$preferences->backup_unique_code."/moddata/eoicampus/",true);
        //Now copy the eoicampus dir
        if ($status) {
            //Only if it exists !!
            if (is_dir($CFG->dataroot."/".$preferences->backup_course."/".$CFG->moddata."/eoicampus/".$instanceid)) {
                $status = backup_copy_file($CFG->dataroot."/".$preferences->backup_course."/".$CFG->moddata."/eoicampus/".$instanceid,
                                           $CFG->dataroot."/temp/eoicampus/".$preferences->backup_unique_code."/moddata/eoicampus/".$instanceid);
            }
        }

        return $status;

    }

   ////Return an array of info (name,value)
   function eoicampus_check_backup_mods($course,$user_data=false,$backup_unique_code,$instances=null) {
       if (!empty($instances) && is_array($instances) && count($instances)) {
           $info = array();
           foreach ($instances as $id => $instance) {
               $info += eoicampus_check_backup_mods_instances($instance,$backup_unique_code);
           }
           return $info;
       }
        //First the course data
        $info[0][0] = get_string("modulenameplural","eoicampus");
        if ($ids = eoicampus_ids ($course)) {
            $info[0][1] = count($ids);
        } else {
            $info[0][1] = 0;
        }

        //Now, if requested, the user_data
        if ($user_data) {
        }
        return $info;
    }


    //Return a content encoded to support interactivities linking. Every module
    //should have its own. They are called automatically from the backup procedure.
    function eoicampus_encode_content_links ($content,$preferences) {

        global $CFG;

        $base = preg_quote($CFG->wwwroot,"/");

        //Link to the list of eoicampuss
        $buscar="/(".$base."\/mod\/eoicampus\/index.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@eoicampusINDEX*$2@$',$content);

        //Link to eoicampus view by moduleid
        $buscar="/(".$base."\/mod\/eoicampus\/view.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@eoicampusVIEWBYID*$2@$',$result);

        return $result;
    }
	
	
    // INTERNAL FUNCTIONS. BASED IN THE MOD STRUCTURE

    //Returns an array of eoicampus id
    function eoicampus_ids ($course) {
        global $CFG;
        return get_records_sql ("SELECT j.id, j.course
                                 FROM {$CFG->prefix}eoicampus j
                                 WHERE j.course = '$course'");
    }


/* Functions from Moodle 1.6 added for compatibility with 1.5 */
    
    function eoicampus_backup_mod_selected($preferences,$modname,$modid) {
        return ((empty($preferences->mods[$modname]->instances)
                 && !empty($preferences->mods[$modname]->backup)) 
                || (is_array($preferences->mods[$modname]->instances) 
                    && array_key_exists($modid,$preferences->mods[$modname]->instances)
                    && !empty($preferences->mods[$modname]->instances[$modid]->backup)));
    }
    
    
    function eoicampus_backup_userdata_selected($preferences,$modname,$modid) {
        return ((empty($preferences->mods[$modname]->instances)
                 && !empty($preferences->mods[$modname]->userinfo)) 
                || (is_array($preferences->mods[$modname]->instances) 
                    && array_key_exists($modid,$preferences->mods[$modname]->instances)
                    && !empty($preferences->mods[$modname]->instances[$modid]->userinfo)));
    }


?>
