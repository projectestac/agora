<?PHP //$Id: restorelib.php,v 1.2 2006/12/12 09:20:29 sarjona Exp $
    //This php script contains all the stuff to backup/restore
    //eoicampus mods

    //This is the "graphical" structure of the eoicampus mod:
    //
    //    eoicampus
    //    (CL, pk->id)
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

    function eoicampus_restore_mods($mod,$restore) {

        global $CFG;

        $status = true;
		if ($CFG->iseoi){
	        //Get record from backup_ids
	        $data = backup_getid($restore->backup_unique_code,$mod->modtype,$mod->id);
	
	        if ($data) {
	            //Now get completed xmlized object
	            $info = $data->info;
	            //traverse_xmlize($info);                                                                     //Debug
	            //print_object ($GLOBALS['traverse_array']);                                                  //Debug
	            //$GLOBALS['traverse_array']="";                                                              //Debug
	
	            //Now, build the eoicampus record structure
	            $eoicampus->course = $restore->course_id;
	            $eoicampus->name = backup_todb($info['MOD']['#']['NAME']['0']['#']);
	            $eoicampus->description = backup_todb($info['MOD']['#']['DESCRIPTION']['0']['#']);
	            $eoicampus->pwlevel = backup_todb($info['MOD']['#']['PWLEVEL']['0']['#']);
	            $eoicampus->pwid = backup_todb($info['MOD']['#']['PWID']['0']['#']);
	
	            //The structure is equal to the db, so insert the eoicampus
	            $newid = insert_record ("eoicampus",$eoicampus);
	
	            //Do some output
	            echo "<li>".get_string("modulename","eoicampus")." \"".format_string(stripslashes($eoicampus->name),true)."\"</li>";
	            backup_flush(300);
	
	            if ($newid) {
	                //We have the newid, update backup_ids
	                backup_putid($restore->backup_unique_code,$mod->modtype,
	                             $mod->id, $newid);
	                //Now check if want to restore user data and do it.
	                if ($restore->mods['eoicampus']->userinfo) {
	                    //Restore eoicampus_sessions
	                }
	            } else {
	                $status = false;
	            }
	        } else {
	            $status = false;
	        }
		}

        return $status;
    }


?>
